# AUFTRAG-02 – Startseite, Pilotfolge, Preise

Ziel: Die Startseite steht komplett als Block-Pattern, dazu /pilotfolge/ (Ads-Landingpage, noindex dauerhaft) und /preise/. Texte und Reihenfolge kommen 1:1 aus `design/Main.dc.html` – die Datei ist die Vorlage, nicht nur eine Skizze. Wo im Design `[ZAHL]` oder `[…]` steht, bleibt ein sichtbarer Platzhalter bis AUFTRAG-05.

## Pattern (Kategorie `leitformat`, je eins pro Abschnitt des Designs)

| Pattern | Design-Abschnitt | Hinweise |
| --- | --- | --- |
| `lf/hero` | `<!-- Hero -->` | Eyebrow mit rotem Punkt, H1, Unterzeile, zwei Buttons (primary + secondary), Kennzahlen-Zeile (85+ / 1.250+ / 33 / Berlin), rechts Video-Platzhalter 16:9 mit Play-Button und Unterzeile. Video: `<video>` mit `poster`, Play per JS (`assets/js/video.js`), Datei kommt in 05. Pattern-Varianten über Block-Attribute: Überschrift, Unterzeile, Button-Texte und -Ziele editierbar. |
| `lf/logoleiste` | `<!-- Logoleiste -->` | Reihenfolge aus `daten/medien-alte-seite.md`; bis Logos da sind, Wortmarken in `#8A8E96`. Kein Karussell – statisches Grid, umbrechend. |
| `lf/ausspielungen` | `<!-- Ein Dreh, fünf Ausspielungen -->` | Fünf Karten; Bildflächen sind Platzhalter für echte Standbilder/Clips aus Kundenfolgen (05). |
| `lf/pakete` | `<!-- Pakete -->` | Pilotfolge als dunkle breite Karte, darunter drei Paketkarten (Unternehmen hervorgehoben mit 2-px-Rahmen), Vergleichssatz zu Podcastmania darunter. Preise aus `daten/preislogik-alte-seite.md` (Paket-Tabelle). |
| `lf/ablauf` | `<!-- Ablauf -->` | Fünf Schritte mit Fristen, 2-px-Linie oben, rote Frist-Labels. |
| `lf/referenzen` | `<!-- Referenzen -->` | H2, Raster mit 8 Kacheln (1:1, Tinte, Name + Unterzeile), darunter Video-Testimonial Gegenbauer mit Zitat. Kacheln verlinken auf `/referenzen/<slug>/`. |
| `lf/wolfgang` | `<!-- Wolfgang -->` | Dunkler Block, Foto 4:5 links, Text rechts, Zitat Eva Martin, LinkedIn-Link `https://www.linkedin.com/in/wolfgang-patz/`. |
| `lf/vergleich` | `<!-- Vergleich -->` | Tabelle in `overflow-x: auto`-Box, erste Datenspalte fett. |
| `lf/kundenstimmen` | `<!-- Kundenstimmen -->` | Drei Karten + Fußzeile mit „33 Bewertungen auf Google" als Link auf das Google-Unternehmensprofil (URL von Erik). |
| `lf/faq` | `<!-- FAQ -->` | Acht Fragen, zweispaltig. Als `<details>`-Liste umsetzen (klappbar), FAQPage-Schema aus denselben Texten erzeugen. |
| `lf/anfrage` | `<!-- Anfrage -->` | Formular links (Markup jetzt, Funktion in 04), rechts Calendly-Platzhalter 320 px hoch, darunter Telefon. ID `anfrage`, Calendly-Container ID `termin`. |

Header und Footer kommen aus AUFTRAG-01. Der Sticky-CTA (`lf/sticky-cta`) wird im `page.html`-Template eingebunden, nicht in jedes Pattern.

## Seiten

**Startseite `/`** – Template `front-page.html` mit allen Pattern in Design-Reihenfolge. Title „Video-Podcast-Agentur für Unternehmen – Leitformat". Meta-Description: „Video-Podcasts, die bei Entscheidern ankommen. Konzept, Studio Berlin, Clips in 48 Stunden, Preise ab 2.400 € im Monat. Seit 2018 für DKB, thyssenkrupp, Weleda." H1 bleibt der Hero-Satz.

**/pilotfolge/** – Ads-Landingpage, `noindex, follow` dauerhaft (auch nach Go-Live), kein Header-Menü (nur Logo und Telefon), kein Footer-Menü (nur Rechtliches). Reihenfolge: Hero-Variante (H1 „Ihre erste Video-Folge in 14 Tagen. Festpreis 2.900 €.", Unterzeile: Formatgespräch, Aufnahme Studio Berlin oder remote, Schnitt Video + Audio, 6 Clips im Hochformat, Thumbnail, Shownotes; Button primary „Pilotfolge anfragen" → `#anfrage`), Logoleiste, Pilotfolge-Karte (was drin ist, als Liste mit Häkchen; Satz „Wer danach ein Format bucht, bekommt die 2.900 € auf das Setup angerechnet"), Ablauf (Tag 0 / Tag 7 / Tag 14 / +48 h), Video-Testimonial Gegenbauer, Kundenstimmen, FAQ (4 Fragen: Was ist drin? Studio oder remote? Wem gehören die Rechte? Was, wenn uns das Ergebnis nicht gefällt? – Antwort: zwei Korrekturrunden inklusive, danach Gespräch), Anfrage mit Vorauswahl „Pilotfolge" im Dropdown. Kein Calendly, nur Formular (Cluster „produzieren lassen" kauft über Formular).

**/preise/** – Title „Was kostet ein Video-Podcast? Preise – Leitformat". H1 „Pakete und Preise." Reihenfolge: Intro (2 Sätze: alle Preise netto, Einstieg ohne Jahresvertrag), `lf/pakete`, Zusatzmodule als Liste, Studio-Preise (200/300/400/600 €, Storno) als Tabelle mit Link auf `/podcast-studio-berlin/`, Audit-Preise (199/499/ab 1.200 €) als drei Karten, Vergleich mit Marktpreisen (Podcastmania ab 2.300 € je Folge ohne Video, Studio36 730 € nur Audio, IntoTheMinds 750 € Video ohne Clips – mit Quelle und Datum, aus `docs/strategie.md` Abschnitt 2), Video-Testimonial Gegenbauer, FAQ zu Kosten (6 Fragen: Was kostet eine Folge? Gibt es Rabatt bei Jahresbuchung? Was kostet der Dreh vor Ort? Sind Musik-Lizenzen enthalten? Was passiert nach der Laufzeit? Wie wird abgerechnet?), Anfrage. FAQPage-Schema.

## Technik

- Jedes Pattern ist ein `php`-Pattern in `patterns/` mit `Title`, `Slug lf/…`, `Categories leitformat`, Inhalt als Block-Markup mit `className`-Hooks (`lf-hero`, `lf-pakete` …), Styles in `assets/css/patterns.css` (eine Datei, Mobile first, Breakpoints 600 / 900 / 1200).
- Keine Inline-Styles im Block-Markup; alles über Klassen und theme.json-Presets.
- Bilder über `core/image` mit Platzhalter-SVG aus `assets/img/placeholder-*.svg`, damit das Layout ohne Medien steht.
- Formular jetzt nur Markup (`<form method="post" action="/anfrage-senden/">` mit den Feldern aus dem Design); Funktion in AUFTRAG-04.
- FAQ-Antworten und Paket-Inhalte in Pattern-Dateien, nicht in Optionen – Änderungen laufen über Aufträge.

## Abnahme

- [ ] Startseite entspricht `design/Main.dc.html` in Reihenfolge, Texten und Hierarchie; Abweichungen in RUECKFRAGEN.md begründet
- [ ] /pilotfolge/ und /preise/ stehen mit allen Abschnitten
- [ ] Mobil (375 px): keine horizontale Scrollbar, Buttons volle Breite, Tabellen in Scroll-Box, Sticky-CTA sichtbar nach Scroll
- [ ] Lighthouse mobil ≥ 90 Performance, 100 Accessibility auf allen drei Seiten
- [ ] FAQPage-Schema validiert (Rich-Results-Test), ein H1 je Seite
- [ ] Alle Links zeigen auf existierende Ziele oder sind als `#`-Platzhalter in RUECKFRAGEN.md gelistet
- [ ] STATUS.md aktualisiert
