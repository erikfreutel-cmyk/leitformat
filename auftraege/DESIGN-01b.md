# DESIGN-01b – Korrekturen nach Eriks Durchsicht (18.10., abends)

Acht Punkte von Erik am Desktop-Screenshot, mit Lösung. Vor der Abnahme durch Wolfgang am 19.10. umsetzen. Reihenfolge wie hier. Danach wie bei P1: Lighthouse, 375 px, Screenshots nach `auftraege/screenshots/`.

## 1. Logostreifen: alle Logos der alten Startseite

Nicht fünf, sondern alle elf: DKB, thyssenkrupp, Weleda, Müller, Techniker Krankenkasse, Johanniter, Konrad-Adenauer-Stiftung, Wikimedia Deutschland, NH Hotels, Globus, hy Consulting. Quellen (weiße PNGs, für den Hellgrund invertieren und auf #5E626A einfärben, wie die fünf vorhandenen):
`/wp-content/uploads/2026/03/Weleda-white.png`, `/2026/01/Mueller-weiss.png`, `/2025/11/TK.png`, `/2025/11/JH.png`, `/2026/01/Konrad-Adenauer-weiss.png`, `/2025/11/WM.png`, `/2025/11/NH.png`, `/2026/01/Globus-weiss.png`, `/2025/11/HY-e1772224599672.png` auf nextgen-podcast.de. Gegenbauer (`/2025/11/GB-1.png`) weglassen – verkauft, steht als Kundenstimme.
Darstellung: gleiche Kappenhöhe 22 px, Abstand 48 px, Desktop zwei Zeilen (6 + 5), ab 768 px eine horizontal scrollbare Zeile wie jetzt. Keine Bewegung.

## 2. Ausspielungen: Icons zurück, aber klein

Je Ausspielung ein Strich-Icon 28 px, 1,5 px Linie, Farbe #15171C, links über dem Titel (nicht in einer Kachel). Selbst gezeichnet als Inline-SVG, ein Stil: Video-Folge = Rechteck 16:9 mit Play-Dreieck; Audio-Folge = fünf Wellenform-Balken; Clips = drei Hochformat-Rechtecke nebeneinander; Zitatkarten = Anführungszeichen in einem Quadrat; Newsletter = Umschlag. Keine Icon-Bibliothek, keine Füllfarbe.

## 3. Ablauf: Hintergrund dunkler

Token `panel` von #F2F3F5 auf #E8EAEE. Gilt für alle Hellgrau-Sektionen (Ablauf, Pakete, Studio-Fakten), damit der Rhythmus Weiß / Grau / Weiß sichtbar wird. Innenabstand der grauen Sektionen oben und unten 96 px (Mobil 64 px), wie bei den weißen.

## 4. Referenzen: Luft

Raster-Abstand 24 px statt 16, zwischen Cover und Titel 12 px, Titel 20 px / Kunde 15 px grau. Zwischen Raster und Gegenbauer-Kundenstimme 72 px. Sektion oben und unten 96 px. Gleiche Abstandsskala überall: 8 / 16 / 24 / 40 / 64 / 96 – andere Werte raus.

## 5. Kundenstimmen: eine Linie

Drei Spalten als Flex-Spalten mit gleicher Höhe: Zitat oben in Bricolage 21 px (Zeilenabstand 1,35), Namensblock mit `margin-top:auto` – damit stehen alle drei Namen auf einer Höhe. Links an jeder Spalte eine 2-px-Linie in #D9DCE1 über die volle Höhe (die rote Linie bleibt allein dem Wolfgang-Zitat). Namensblock: Name fett, Firma, Leistung – drei Zeilen, bei allen gleich.
Der Satz „Aufgenommen, als wir noch NextGen Podcast hießen.“ kommt nicht mehr unter einzelne Zitate (macht die Spalten ungleich), sondern einmal unter die Sektion: „Alle drei Stimmen aus der Zeit, als wir noch NextGen Podcast hießen. Die Menschen dahinter sind dieselben: 33 Bewertungen auf Google.“ Gilt auch auf /preise/ und /pilotfolge/. (Ändert die RUECKFRAGEN-Entscheidung vom 18.10. „unter jedem Zitat“ – Erik.)

## 6. Anfrage: rechte Spalte füllen

Rechts ist Leere, weil Calendly erst mit AUFTRAG-04 kommt. Bis dahin steht rechts ein echter Block auf `panel`-Grau, Innenabstand 32 px, Radius 12 px:
- Wolfgangs Porträt rund, 64 px (Quelle `/2026/04/wolfgang-patz-ngp.png`, bis das neue Foto da ist)
- „Erstgespräch mit Wolfgang Patz“ (H3), darunter: „30 Minuten, Video-Call, kostenlos.“
- Drei Zeilen, was im Gespräch passiert: Ziel und Zielgruppe · passendes Format und Paket · Termin für die Pilotfolge (als Liste, keine Punkte-Zeichen)
- Button schwarz „Termin wählen“ → Calendly-Link von der alten /kontakt/-Seite (öffnet in neuem Tab, `rel="noopener"`), bis das Embed mit Einwilligung in 04 kommt
- Darunter: „Lieber telefonieren? +49 30 20 63 49 03, Montag bis Freitag 9 bis 18 Uhr.“
Spalten 7/12 Formular, 5/12 Block; auf Mobil Block unter dem Formular.

## 7. /pilotfolge/: Hero umbauen

Das Bild hängt rechts in der Mitte neben vier Zeilen Headline. Neu: Bild oben über die volle Containerbreite (16:9, max. Höhe 520 px, Studio-Totale, später das Video), darunter links die Headline in zwei Zeilen „Ihre erste Video-Folge in 14 Tagen.“ (56 px) und darunter in 28 px Bricolage 600 „Festpreis 2.900 €, alles inklusive.“, dann Unterzeile, Button, Zahlenzeile. Mobil gleiche Reihenfolge.

## 8. Menü: überall und sticky

- Menü auf allen Seiten, auch /pilotfolge/ und /danke/ (Erik-Entscheidung; die reduzierte Landingpage-Kopfzeile entfällt). Auf /pilotfolge/ bleibt rechts zusätzlich die Telefonnummer.
- Header `position: sticky; top: 0`, Hintergrund Weiß mit 94 % Deckung und `backdrop-filter: blur(8px)`, 1 px Linie #D9DCE1 unten, Höhe 72 px, beim Scrollen 64 px (nur Padding, keine Animation außer 150 ms). Auf dunklen Seiten (keine) nichts Besonderes.
- Unter 1024 px Burger statt umbrechender Links – im Browserfenster bei 800 px bricht „Pakete & Preise“ gerade zweizeilig um.
- Sticky-CTA auf Mobil bleibt, kollidiert nicht (Header oben, CTA unten).

## Abnahme

Screenshots der sechs Stellen (Logos, Ausspielungen, Ablauf, Referenzen, Kundenstimmen, Anfrage) plus /pilotfolge/-Hero und Header beim Scrollen, 1440 und 375 px, in `auftraege/screenshots/01b-*.jpg`. Erik entscheidet am Bild.
