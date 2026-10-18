#!/usr/bin/env python3
"""Einfaches Markdown (#, ##, Absätze, - Listen, **fett**, [Text](URL), Zeilenumbruch) -> Gutenberg-Block-Markup.
Ergebnis: ein Abschnitt lf-section lf-legal mit Textspalte. Aufruf: md2blocks.py datei.md > datei.html"""
import sys, re, html

def inline(s):
    s = html.escape(s, quote=False)
    s = re.sub(r'\*\*(.+?)\*\*', r'<strong>\1</strong>', s)
    def link(m):
        t, u = m.group(1), m.group(2)
        ext = u.startswith('http') and 'leitformat.de' not in u
        return f'<a href="{u}"' + (' rel="noopener"' if ext else '') + f'>{t}</a>'
    return re.sub(r'\[(.+?)\]\((.+?)\)', link, s)

def p(text): return f'<!-- wp:paragraph -->\n<p>{text}</p>\n<!-- /wp:paragraph -->'

out = []
for block in re.split(r'\n\s*\n', open(sys.argv[1], encoding='utf-8').read().strip()):
    lines = [l for l in block.strip().split('\n') if not l.startswith('[//]:')]
    if not lines:
        continue
    if lines[0].startswith('# '):
        out.append(f'<!-- wp:heading {{"level":1}} -->\n<h1 class="wp-block-heading">{inline(lines[0][2:])}</h1>\n<!-- /wp:heading -->')
    elif lines[0].startswith('## '):
        out.append(f'<!-- wp:heading -->\n<h2 class="wp-block-heading">{inline(lines[0][3:])}</h2>\n<!-- /wp:heading -->')
        if len(lines) > 1: out.append(p('<br>'.join(inline(l) for l in lines[1:])))
    elif all(l.startswith('- ') for l in lines):
        items = ''.join(f'<!-- wp:list-item -->\n<li>{inline(l[2:])}</li>\n<!-- /wp:list-item -->\n' for l in lines)
        out.append(f'<!-- wp:list -->\n<ul class="wp-block-list">{items}</ul>\n<!-- /wp:list -->')
    else:
        out.append(p('<br>'.join(inline(l) for l in lines)))

inner = '\n\n'.join(out)
print('<!-- wp:group {"tagName":"section","className":"lf-section lf-legal","layout":{"type":"default"}} -->\n'
      '<section class="wp-block-group lf-section lf-legal"><!-- wp:group {"className":"lf-container lf-prose","layout":{"type":"default"}} -->\n'
      f'<div class="wp-block-group lf-container lf-prose">\n{inner}\n</div>\n<!-- /wp:group --></section>\n<!-- /wp:group -->')
