# CLAUDE.md – Leitformat

Repo für leitformat.de (WordPress-Block-Theme `leitformat` + Aufträge + Doku). Lies `README.md` zuerst, dann den aktuellen Auftrag in `auftraege/`.

## Arbeitsweise

- Ein Auftrag = eine Datei `auftraege/AUFTRAG-XX.md`. Abarbeiten, Abnahme-Liste prüfen, Ergebnis in `auftraege/STATUS.md` eintragen (Datum, was gebaut, was offen). Rückfragen und Widerspruch in `auftraege/RUECKFRAGEN.md`, nicht im Chat verlieren.
- Deploy: `./deploy.sh` (rsync `theme/leitformat/` → `/www/htdocs/w01eedfd/leitformat.de/wp-content/themes/leitformat/`, danach `wp cache flush` per SSH). Keine FTP-Uploads.
- Commit nach jedem abgeschlossenen Schritt, Push per SSH-Remote. Commit-Message auf Deutsch, erste Zeile unter 70 Zeichen.
- Keine Page-Builder, keine Theme-Frameworks, keine jQuery-Abhängigkeit. Block-Theme mit `theme.json`, Patterns, Template Parts. Vanilla-JS nur, wo nötig (Mobilmenü, Formular-Webhook, Video-Play).
- Zugangsdaten nur in `.env.local` (gitignored) und `wp-config.php` auf dem Server. Nie ins Repo, nie in Aufträge.

## All-Inkl-Eigenheiten

- WP-CLI: `/usr/bin/wp` (PHP 8.3). In der SSH-Shell ist `HOME=/` – absolute Pfade benutzen.
- `.htaccess` wird von Hand gepflegt (WordPress darf sie nicht überschreiben: `define('DISALLOW_FILE_MODS', false)` bleibt, aber Rewrite-Block manuell).
- Let's Encrypt über KAS, HTTPS erzwungen.
- Mail-Versand über wp_mail funktioniert bei All-Inkl nur mit SMTP-Plugin oder PHP-Mail mit Absender aus der Domain; für das Formular SMTP über KAS-Postfach einrichten (AUFTRAG-04).

## Design-Tokens (aus design/Main.dc.html)

| Token | Wert | Verwendung |
| --- | --- | --- |
| `--lf-ink` | `#15171C` | Text, dunkle Flächen |
| `--lf-paper` | `#F6F3EE` | Seitenhintergrund |
| `--lf-white` | `#FFFFFF` | Karten, helle Abschnitte |
| `--lf-signal` | `#D7261E` | Logo-Punkt, Primärbutton, Markierungen. Nie als Fläche. |
| `--lf-panel` | `#1C1F26` | Video-Platzhalter, dunkle Kacheln |
| `--lf-text-2` | `#3A3D44` | Fließtext auf hell |
| `--lf-grey` | `#5E626A` | Nebentext, Labels |
| `--lf-grey-2` | `#B8BBC0` | Nebentext auf dunkel, Rahmen Inputs |
| `--lf-line` | `#DAD6CE` | Linien, Kartenrahmen |
| `--lf-logo-grey` | `#8A8E96` | Kundenlogos in Grau |

Schriften (lokal gehostet, woff2, `font-display: swap`): **Bricolage Grotesque** 500/700/800 für Headlines, Zahlen, Preise · **Instrument Sans** 400/500/600 für Text. Headlines `letter-spacing: -0.02em`, `line-height: 1.05`. Body 17 px mobil / 18 px Desktop, Zeilenlänge max. 65 Zeichen. Container 1200 px, Seitenrand 20/32 px, Section-Padding 56/72 px. Radius 8 px Buttons, 12–14 px Karten. Buttons min. 48 px hoch, auf Mobil volle Breite.

Logo: Variante A aus `design/Logo.dc.html` – „leitformat" in Kleinbuchstaben, Bricolage Grotesque 800, i-Punkt als roter Kreis. Als SVG mit Pfaden (keine Schriftabhängigkeit). Favicon: roter Punkt auf Tinte.

## Sprache und Ton (gilt für jeden Text auf der Seite)

- Sie-Ansprache, durchgängig. Kein „ihr", kein „du".
- Jede Headline nennt ein Ergebnis oder eine Frist, nie ein Gefühl.
- Verboten: kreativ, leidenschaftlich, maßgeschneidert, ganzheitlich, innovativ, Full Service, 360°, „Stimme" als Metapher.
- Kein KI-Vokabular (KI, AI, smart, automatisiert). Was KI im Prozess leistet, steht als Frist: „Clips in 48 Stunden".
- Keine Zahl ohne Quelle oder Herkunft. Erlaubte Zahlen: 85+ Projekte, 1.250+ Episoden, 33 Google-Bewertungen, seit 2018, Studio 4×5 m / 3 Kameras / bis 4 Personen, Lieferzeiten (14 Tage Pilotfolge, 48 h Clips, 5 Werktage Folge), Marktzahlen nur mit Quelle aus docs/strategie.md Abschnitt 2.
- Kundenzitate wörtlich aus `daten/kundenstimmen.md`, nie umformulieren.
- Kurze Sätze. Keine Floskeln („Wir freuen uns", „gerne", „einfach").

## Technik-Regeln

- Ladezeit mobil unter 2 s, Lighthouse Performance ≥ 90 auf jeder Seite. Bilder WebP, `loading="lazy"` außer Hero, Alt-Texte beschreibend (nie Dateinamen).
- Hero-Video selbst gehostet (MP4 + Poster, kein Autoplay mit Ton); Folgen auf Referenzseiten als `youtube-nocookie` oder Vimeo mit Vorschaubild und Klick-Consent.
- Ein H1 je Seite mit dem Keyword der Seite (Zuordnung in docs/strategie.md, Abschnitt SEO). Title-Muster „Keyword – Leitformat". Schema: Organization (alternateName NextGen Podcast), LocalBusiness für das Studio, FAQPage auf Preis- und Startseite, VideoObject auf Referenzen.
- Bis Go-Live: `blog_public 0` (noindex), robots.txt erlaubt `AdsBot-Google`.
- Jede Landingpage hat einen festen Mobil-Button „Anfragen" am unteren Rand (Pattern `lf/sticky-cta`, nur < 768 px).
- Formular: zwei Pflichtfelder (Firma, E-Mail), Server-Redirect auf /danke/ (Conversion zählt auf Seitenaufruf), Webhook ins Lead-Sheet.
