# Leitformat – Briefing für Claude Code

Stand: 17.10.2026 · Auftraggeber: Erik Freutel (NextGen Media GmbH) · Fachlich: Wolfgang Patz

## Worum es geht

NextGen Podcast (nextgen-podcast.de, B2B-Podcast-Agentur, Berlin, seit 2018) bekommt eine neue Marke: **Leitformat** (leitformat.de, .com → .de). Video-Podcast-Agentur für Unternehmen, Pakete mit Preisen, Pilotfolge zum Festpreis als Einstieg. Die neue Seite wird zuerst nur für Google Ads bespielt (A/B-Test gegen die alte Seite, 8 Wochen). Gewinnt sie, zieht alles um (AUFTRAG-06).

Lies zuerst `docs/strategie.md` (Markt, Wettbewerb, Positionierung, Pakete, Seitenaufbau, Kampagne, Tracking, Marke, Roadmap). Das Design liegt in `design/Main.dc.html` (Startseite, kompletter Text und Layout) und `design/Logo.dc.html` (Logo, Variante A ist entschieden). Die alte Seite wurde vollständig gelesen; die Essenz steht in `daten/`.

## Prüfen und widersprechen

Erik will, dass du vor dem Bau alles prüfst und eine eigene Meinung hast. Konkret:

- Recherchiere die Wettbewerber aus `docs/strategie.md` Abschnitt 3 nach, wenn du zweifelst.
- Prüfe die Pakete und Preise (Abschnitt 5) gegen die Preislogik der alten Seite (`daten/preislogik-alte-seite.md`). Wenn etwas nicht aufgeht, sag es in `auftraege/RUECKFRAGEN.md`, bevor du die Preisseite baust.
- Prüfe Keyword-Zuordnung und Sitemap (Abschnitte 6 und 7 plus SEO-Abschnitt) gegen die alten URLs (`daten/alte-urls.txt`).
- Wenn du im Design etwas für konvertierungsschädlich hältst, bau es trotzdem erst wie entworfen und lege den Gegenvorschlag als Pattern-Variante daneben. Erik entscheidet am Entwurf, nicht am Argument.

## Was fest entschieden ist (nicht wieder aufmachen)

- Name Leitformat, Logo Variante A (Kleinbuchstaben, roter i-Punkt), Farben und Schriften aus `CLAUDE.md`.
- Durchgängig **Sie**. Keine Agentur-Adjektive, kein KI-Vokabular (Regeln in `CLAUDE.md`).
- Preise sichtbar: Pilotfolge 2.900 €, Experte ab 2.400 €/Monat, Unternehmen ab 3.900 €/Monat, Konzern ab 8.500 €/Monat, Studio 200/300/400/600 €, Audit 199/499/ab 1.200 €. Alles netto.
- Kein Kostenrechner (der alte war nie fertig und bleibt weg).
- DKB darf gezeigt werden. Die fünf noindex-Referenzen der alten Seite (thyssenkrupp, Müller, Gegenbauer, Myra, KlimaBauern) waren ein Versehen und werden indexiert.
- Kundenzitate, die „NextGen Podcast" sagen, bleiben wörtlich; darunter ein Satz: „Aufgenommen, als wir noch NextGen Podcast hießen."
- Gegenbauer wurde verkauft: Tom Kalányos wird als „damals Marketingleiter Gegenbauer" geführt.
- Google-Bewertungen: 33 (nicht 30+, nicht 125+). Keine Views/Downloads-Kennzahl (unbekannt).
- „Seit 2018" (GmbH-Gründung). Nicht 2015, nicht 2019.
- Footer: „Leitformat ist eine Marke der NextGen Media GmbH, Berlin – seit 2018 Corporate Podcasts für DKB, thyssenkrupp und Weleda (ehemals NextGen Podcast)."

## Wo gebaut wird

Direkt auf All-Inkl (leitformat.de, noindex), kein lokales WordPress. Begründung: Der Workflow Git + SSH + `deploy.sh` läuft bei insidetrading.de und malliss-schule.de bereits, die Seite ist im Bau unsichtbar, und Medien von der alten Seite lassen sich auf dem Server direkt per `wp media import <URL>` holen. Lokal liegt nur das Repo (Theme, Aufträge, Doku).

- KAS `w01eedfd`, SSH `ssh-w01eedfd@w01eedfd.kasserver.com`, Webroot `/www/htdocs/w01eedfd/leitformat.de`, PHP 8.3
- WP-CLI: `/usr/bin/wp`; in der SSH-Shell ist `HOME=/`; `.htaccess` von Hand
- Repo `erikfreutel-cmyk/leitformat`, Remote per SSH (nicht HTTPS – Push aus Claude Code scheiterte bei der Schule daran)
- Lokal: `~/Documents/Projekte/leitformat`

## Reihenfolge

| Auftrag | Inhalt | Wann |
| --- | --- | --- |
| AUFTRAG-01 | Fundament: WP, Theme-Gerüst, Tokens, Schriften, Logo, Header/Footer, Repo, Deploy | Woche 1 |
| AUFTRAG-02 | Startseite, /pilotfolge/, /preise/ als Block-Pattern aus `design/Main.dc.html` | Woche 2 |
| AUFTRAG-03 | Studio-Landingpage (Priorität!), Corporate, Interview-Podcast, Video-Podcast, Podcast-Produktion, Referenzen, Über uns, Kontakt, Rechtliches, Wiki-Hub | Woche 2–3 |
| AUFTRAG-04 | Formular, Calendly, Danke-Seite, GTM, Conversions, Consent Mode | Woche 3 |
| AUFTRAG-05 | Medien von der alten Seite, Inhalte, QA, Go-Live, Ads-Experiment | Woche 4 |
| AUFTRAG-06 | Umzug nextgen-podcast.de → leitformat.de (nur nach gewonnenem Test) | später |
| WOLFGANG-01/02 | Hero-Video und Cases – Aufträge an Wolfgang, nicht an dich | parallel |

Jeder Auftrag endet mit einer Abnahme-Liste. Erledigtes in `auftraege/STATUS.md` eintragen, Rückfragen in `auftraege/RUECKFRAGEN.md`.

## Links (nur für Erik, nicht abrufbar aus Claude Code)

- Strategie-Doc: https://claude.ai/code/artifact/885a1ac0-2ecc-4899-b3a9-4a23f7e63b99 (Tab „Bestandsaufnahme alte Seite" enthält die vollständige Lesung aller 155 URLs)
- Design: https://claude.ai/artifact/HfH2efnuv4LGyjk7cRDdha
