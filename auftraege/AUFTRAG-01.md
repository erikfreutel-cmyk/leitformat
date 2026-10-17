# AUFTRAG-01 – Fundament leitformat.de

Ziel: WordPress läuft auf https://leitformat.de mit dem eigenen Block-Theme `leitformat` (Tokens, Schriften, Logo, Header, Footer, Button-System, Pattern-Kategorie), noindex für Google, erreichbar für AdsBot. Repo und Deploy funktionieren. Inhalte kommen in AUFTRAG-02.

## Voraussetzungen (Erik im KAS, vorher)

- [ ] leitformat.de im KAS anlegen, Webroot `/www/htdocs/w01eedfd/leitformat.de`, PHP 8.3
- [ ] leitformat.com im KAS anlegen, gleiches Webroot (Weiterleitung macht die .htaccess)
- [ ] SSL (Let's Encrypt) für beide Domains, HTTPS erzwingen
- [ ] MySQL-Datenbank anlegen, Zugangsdaten in `~/Documents/Projekte/leitformat/.env.local` (nicht ins Repo)
- [ ] GitHub-Repo `erikfreutel-cmyk/leitformat` leer anlegen, SSH-Key von Claude Code als Deploy-Key mit Schreibrecht hinterlegen

## 1. Repo

```
~/Documents/Projekte/leitformat/
  CLAUDE.md, README.md
  auftraege/            (diese Dateien, STATUS.md, RUECKFRAGEN.md)
  design/               (Main.dc.html, Logo.dc.html – Referenz, nicht deployen)
  daten/, docs/
  theme/leitformat/     (wird nach wp-content/themes/leitformat deployt)
  deploy.sh
  .gitignore            (.env.local, node_modules, *.zip, .DS_Store)
```

Remote per SSH: `git@github.com:erikfreutel-cmyk/leitformat.git`. `deploy.sh`: rsync `theme/leitformat/` nach `/www/htdocs/w01eedfd/leitformat.de/wp-content/themes/leitformat/` (mit `--delete`, exclude `.git`), danach `ssh … "/usr/bin/wp --path=/www/htdocs/w01eedfd/leitformat.de cache flush"`.

## 2. WordPress auf dem Host

```
cd /www/htdocs/w01eedfd/leitformat.de
/usr/bin/wp core download --locale=de_DE
/usr/bin/wp config create --dbname=… --dbuser=… --dbpass=… --dbhost=localhost --extra-php <<'PHP'
define('DISALLOW_FILE_EDIT', true);
define('WP_POST_REVISIONS', 10);
define('LF_GTM_ID', '');            // AUFTRAG-04
PHP
/usr/bin/wp core install --url=https://leitformat.de --title="Leitformat" --admin_user=erik --admin_email=… --skip-email
/usr/bin/wp option update blog_public 0
/usr/bin/wp option update timezone_string Europe/Berlin
/usr/bin/wp option update permalink_structure '/%postname%/'
/usr/bin/wp option update blogdescription "Video-Podcasts, die bei Entscheidern ankommen."
/usr/bin/wp plugin delete akismet hello
/usr/bin/wp theme delete twentytwentythree twentytwentyfour twentytwentyfive
```

`.htaccess` von Hand:

```
RewriteEngine On
RewriteCond %{HTTP_HOST} ^(www\.)?leitformat\.com$ [NC]
RewriteRule ^(.*)$ https://leitformat.de/$1 [R=301,L]
RewriteCond %{HTTP_HOST} ^www\.leitformat\.de$ [NC]
RewriteRule ^(.*)$ https://leitformat.de/$1 [R=301,L]
RewriteBase /
RewriteRule ^index\.php$ - [L]
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule . /index.php [L]
```

`robots.txt` im Webroot (AdsBot muss die Landingpages trotz noindex lesen):

```
User-agent: AdsBot-Google
Allow: /
User-agent: *
Disallow: /
```

## 3. Theme `leitformat`

Block-Theme, Struktur wie bei `schule-malliss`: `style.css`, `theme.json`, `functions.php`, `templates/`, `parts/`, `patterns/`, `assets/fonts/`, `assets/css/`, `assets/js/`, `assets/img/`.

**theme.json:** Farben, Schriften, Abstände, Radius exakt aus `CLAUDE.md`. Slugs `lf-ink`, `lf-paper`, `lf-signal` usw. Keine Verläufe, keine Duotones. `layout.contentSize 720px`, `wideSize 1200px`.

**Schriften lokal:** Auf dem Mac `npm pack @fontsource/bricolage-grotesque @fontsource/instrument-sans`, nur die woff2 nach `assets/fonts/` (Bricolage 500/700/800 latin, Instrument Sans 400/500/600 latin). `@font-face` mit `font-display: swap` in `assets/css/fonts.css`, über `theme.json` `fontFamilies` eingebunden. Prüfung: Netzwerk-Tab zeigt keinen Request an fonts.googleapis.com.

**parts/header.html:** Logo links (Variante A als Inline-SVG, 30 px hoch), Navigation: Pilotfolge, Pakete & Preise, Studio Berlin, Referenzen, Über uns; rechts Button `dark` „Erstgespräch buchen" → `/kontakt/#termin`. Mobil (< 900 px): Burger, Menü als Overlay, 20 Zeilen Vanilla-JS in `assets/js/nav.js`, Fokus-Falle, Esc schließt.

**parts/footer.html:** Logo klein, Satz „Leitformat ist eine Marke der NextGen Media GmbH, Berlin – seit 2018 Corporate Podcasts für DKB, thyssenkrupp und Weleda (ehemals NextGen Podcast).", Spalten: Leistungen (Pilotfolge, Pakete & Preise, Studio Berlin, Interview-Podcast, Corporate Podcast), Agentur (Referenzen, Über uns, Presse, Wiki), Kontakt (Festnetz +49 30 20 63 49 03, Mobil +49 160 78 49 590, kontakt@leitformat.de, Franz-Jacob-Straße 2c, 10369 Berlin, LinkedIn Wolfgang Patz), Rechtliches (Impressum, Datenschutz, AGB).

**Button-System** als Block-Styles für `core/button`: `lf-primary` (Signal, weiß), `lf-secondary` (Outline Tinte), `lf-dark` (Tinte, weiß), `lf-light` (weiß auf dunkel). Min. Höhe 48 px, Desktop-Hero 52 px, mobil volle Breite.

**Pattern-Kategorie `leitformat`** anlegen; die Pattern selbst kommen in AUFTRAG-02/03. Jetzt nur `lf/sticky-cta` (fester Mobil-Button „Anfragen" → `#anfrage`, nur < 768 px, erscheint nach 600 px Scroll).

**templates/:** `index.html`, `page.html` (Header, Inhalt in `wideSize`, Footer), `front-page.html` (leer bis AUFTRAG-02), `single.html`, `404.html` (Tinte-Fläche, „Diese Seite gibt es nicht", zwei Buttons: Startseite, Erstgespräch).

**functions.php:** Theme-Support (editor-styles, post-thumbnails, html5), Block-Styles registrieren, Pattern-Kategorie, Fonts-CSS enqueue, Emoji-Script, oEmbed-Discovery, RSD-Link, WP-Version und `wp-block-library`-Inline-Styles für nicht genutzte Blocks entfernen; `wp_head`: GTM-Container, wenn `LF_GTM_ID` gesetzt (AUFTRAG-04); `wp_body_open`: noscript-Iframe dazu. Schema `Organization` (name Leitformat, alternateName NextGen Podcast, legalName NextGen Media GmbH, address, telephone, sameAs LinkedIn) als JSON-LD auf jeder Seite.

## 4. Logo

Aus `design/Logo.dc.html`, Variante A: Wortmarke „leitformat" in Bricolage Grotesque 800, Kleinbuchstaben, Letter-Spacing −0.03em, der i-Punkt als Kreis in `#D7261E`, Kreisdurchmesser ≈ 0,17 em, mittig über dem i-Stamm. Erzeugen: Text in Pfade wandeln (z. B. mit `opentype.js` oder Inkscape auf dem Mac), i ohne Punkt setzen (ı, U+0131) und den Kreis als `<circle>` ergänzen.

Dateien in `assets/img/`: `logo.svg` (Tinte), `logo-weiss.svg` (weiß, Punkt bleibt rot), `favicon.svg` (roter Kreis auf Tinte-Quadrat, Radius 8 px), `favicon.ico` 32 px, `apple-touch-icon.png` 180 px, `og-default.png` 1200×630 (Tinte, Logo weiß, Claim „Video-Podcasts, die bei Entscheidern ankommen.").

## 5. Abnahme

- [ ] https://leitformat.de zeigt Header, leere Startseite mit Claim, Footer – HTTPS, kein Mixed Content
- [ ] https://leitformat.com, https://www.leitformat.de → 301 auf https://leitformat.de
- [ ] `<meta name="robots" content="noindex">` im Quelltext, robots.txt erlaubt AdsBot-Google
- [ ] Schriften lokal, kein Google-Fonts-Request
- [ ] Lighthouse mobil Performance ≥ 95 auf der leeren Seite, keine Konsolenfehler
- [ ] Mobilmenü öffnet, schließt, Tab-Reihenfolge korrekt
- [ ] `./deploy.sh` deployt; `git push` aus Claude Code funktioniert
- [ ] Erik hat Admin-Login (Passwort per 1Password-Link, nicht im Repo)
- [ ] STATUS.md: Eintrag AUFTRAG-01 mit Datum

Nicht Teil dieses Auftrags: Inhalte (02/03), Formular und Tracking (04), Medien (05).
