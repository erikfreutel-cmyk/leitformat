# DESIGN-01 – Design-Pass vor dem Ads-Start

Stand 18.10.2026, nach Sichtprüfung der Live-Seiten (Startseite, Studio, Preise, Über uns, Kontakt; 375 px und 800 px). Prüfer: Claude (Chat) mit dem Design-Skill, Blick eines Design-Leads. Erik: „Das Design ist noch sehr roh.“ Das stimmt, aus zwei Gründen, die getrennt behandelt werden:

1. **Es fehlen die echten Inhalte**, und das Design lebt von ihnen: Hero-Video, Studio- und Teamfotos, Wolfgangs Porträt, Kundenlogos als Grafik, Podcast-Cover auf der Startseite, echte Standbilder in „Ein Dreh, fünf Ausspielungen“. Dunkle Platzhalterkästen machen jede Seite roh. Das löst AUFTRAG-05 und WOLFGANG-01 – nichts davon ist ein Designfehler.
2. **Das Designsystem selbst ist generisch.** Der Entwurf (`design/Main.dc.html`) nutzt Muster, die KI-generierte Seiten gerade alle haben: cremefarbener Hintergrund mit Schwarz und einem Rotton, Versal-Eyebrows über jeder Überschrift („● VIDEO-PODCAST-AGENTUR, BERLIN“, „FORMAT EXPERTE“, „EINSTIEG“, „WER DAS MACHT“), Metazeilen mit Mittelpunkten („Setup 2.900 € = Pilotfolge · Laufzeit 6 Monate“), alles in gleichen abgerundeten Karten. Das ist mein Entwurf, und er sieht aus wie jeder andere. Erik hatte beim Logo denselben Eindruck („sieht nach KI aus“). Dieser Teil wird jetzt korrigiert, bevor Geld in Anzeigen fließt.

Die Positionierung bleibt: Video-first, Preise sichtbar, Pilotfolge als Einstieg. Es ändert sich, wie die Seite aussieht, nicht, was sie sagt. `design/Main.dc.html` ist damit überholt; die Live-Seite ist die Referenz.

## Leitidee: Regieraum

Leitformat verkauft Video. Die Seite soll aussehen wie das, was sie verkauft: ein Studio mit drei Kameras und einem Regieplatz. Konkret:

- **Das Bild trägt, nicht die Dekoration.** Jede Sektion bekommt ihr Gewicht aus einem echten Standbild, Cover, Clip oder Foto. Wo kein Bild da ist, steht Text auf Weiß – kein grauer Platzhalterkasten, kein Icon in einer Kachel.
- **Rot ist das REC-Signal.** Rot (#D7261E) erscheint nur dort, wo etwas passiert: der i-Punkt im Logo, der primäre Button, der aktive Filter, ein laufendes Video. Nicht als Eyebrow-Punkt, nicht als Tabellenspalte, nicht als Zwischenüberschrift.
- **Weiß und Schwarz statt Creme.** Hintergrund #FFFFFF, Flächen #F2F3F5 (kühles Hellgrau, wie ein Studiopanel), Text #15171C. Die dunklen Sektionen (#15171C) bleiben als „Studio“-Blöcke, aber nur mit echtem Bild darin.
- **Eine Schrift macht die Marke.** Bricolage Grotesque bleibt die Headline-Schrift und wird größer und enger gesetzt (Hero 56–72 px Desktop, Zeilenabstand 0,95, Laufweite −0,02em); Zahlen (85+, 2.900 €) in derselben Schrift, optische Größe wie Headlines. Instrument Sans für Fließtext bleibt. Keine dritte Schrift, kein Monospace für Labels.

## Was weg muss (Tells)

| Muster | Wo | Ersatz |
| --- | --- | --- |
| Versal-Eyebrow mit rotem Punkt über Überschriften | Hero, Pakete (EINSTIEG, FORMAT EXPERTE …), Wolfgang-Block (WER DAS MACHT), Kundenstimme, Studio-Fakten (TECHNIK UND RAUM, TERMINE UND ANFAHRT) | Weg. Wo die Information nötig ist, als normaler Satz in Kleinschreibung: „Format Experte“ wird zur Kartenüberschrift (H3), „Einstieg“ entfällt. Einzige Ausnahme: Paket-Kartentitel. |
| Metazeilen mit „·“ | Paketkarten, Video-Captions („Tom Kalányos, Gegenbauer · 0:26“), Referenzkacheln („Wikimedia Deutschland · Audio“) | Ganze Sätze oder zwei Zeilen: „Setup 2.900 €, das ist die Pilotfolge. Laufzeit 6 Monate.“ / „Tom Kalányos, Gegenbauer, 26 Sekunden“. |
| Alles in Karten mit gleichem Radius und gleichem Schatten | Ausspielungen, Pakete, Audit-Stufen, Referenz-Raster, Kundenstimmen | Karten nur noch für die vier Pakete (Radius 12 px, 1 px Linie #DAD6CE → #D9DCE1, kein Schatten; das hervorgehobene Paket mit 2 px Rand in Schwarz, nicht Rot). Alles andere: Bild + Text ohne Rahmen, Abstand statt Kasten, Trennlinien 1 px nur zwischen Tabellenzeilen und Ablaufschritten. |
| Grauer Textwolken-Logostreifen | Startseite, Studio | Bis die Logo-Grafiken da sind (05): eine Zeile, fünf Namen (DKB, thyssenkrupp, Weleda, Müller, Techniker Krankenkasse), Rest ausgeblendet; auf Mobil horizontal scrollbar, nicht umbrechend. Mit Grafiken: monochrome Logos, gleiche Kappenhöhe 22 px, eine Zeile, Marquee nur auf Mobil. |
| Dunkle Platzhalterkacheln | Hero-Video, Ausspielungen, Referenz-Raster Startseite, Wolfgang-Porträt, Regie-Foto | Bis die Medien da sind: Hero → Studio-Totale (liegt vor) als Bild mit Play-Overlay erst, wenn das Video existiert; Ausspielungen → nur Text in fünf Spalten; Referenzen → die vorhandenen Cover aus der Mediathek (liegen seit AUFTRAG-03 vor); Wolfgang → Block ohne Bildfläche, Zitat links, Text rechts; Regie → Kachel weglassen, Galerie 3 statt 4 Bilder. |
| Reveal-Animationen beim Scrollen, Hover-Hebeeffekte auf Karten | falls vorhanden | Entfernen. Bewegung nur als Antwort auf Klick (Akkordeon, Filter, Video-Start). `prefers-reduced-motion` respektieren. |

## Was bleibt

Hero-Satz, Reihenfolge der Sektionen, Paketlogik, Preistabellen, Ablauf (ist eine echte Sequenz, die Tag-Marker dürfen bleiben), Vergleichstabelle, FAQ-Akkordeon, Formular, Sticky-CTA auf Mobil, Lighthouse-Stand. Keine neue Struktur, kein neuer Text außer den Metazeilen.

## Sektion für Sektion (Startseite)

1. **Hero.** Desktop zweispaltig bleibt, aber rechts kein dunkler Kasten mehr: das Studio-Foto (Totale) randlos bis zum rechten Seitenrand, 16:9, darauf später das Video. Links Headline in 64 px, Unterzeile 20 px, zwei Buttons. Die vier Zahlen als eine Zeile unter den Buttons, Zahl 32 px Bricolage, Label daneben in einer Zeile („85+ Podcast-Projekte · …“ ohne Punkte, als vier Paare mit 40 px Abstand); auf Mobil 2×2 mit gleicher Zahlengröße (aktuell sind „33“ und „Berlin“ unterschiedlich groß und versetzt). Eyebrow weg. Mobil: Caption des Videos nie über dem Play-Button (aktuell überlagert), Caption unter das Bild.
2. **Logostreifen.** Siehe Tabelle. Überschrift „Wir produzieren für“ als Satzanfang in derselben Zeile, 14 px grau.
3. **Ein Dreh, fünf Ausspielungen.** Fünf Spalten, kein Rahmen. Oben je ein echtes Bild im passenden Format (16:9 Standbild, Wellenform-Bild der Folge, 9:16 Clip-Still, Zitatkarte 1:1, Newsletter-Ausschnitt), unten Titel und ein Satz. Bis AUFTRAG-05 liefert: nur Titel und Satz, Bildflächen weglassen.
4. **Pakete.** Die einzigen Karten der Seite. Pilotfolge als breite Karte oben (bleibt dunkel, weil sie das Produkt ist – aber mit dem Studio-Foto als Hintergrund, abgedunkelt, statt reinem Schwarz). Darunter drei Karten, „Unternehmen“ mit schwarzem 2-px-Rand, Preis 40 px, Setup-Satz in zwei Zeilen, Liste, Button.
5. **Ablauf.** Bleibt, Tag-Marker in Schwarz statt Rot (Rot nur für „+ 48 Stunden“, das ist das Versprechen).
6. **Referenzen.** Raster 4×2 mit den echten Covern, Titel und Kunde unter dem Cover (nicht im Bild), Cover sind die einzige Farbe der Sektion. Kundenstimme Gegenbauer: Video links, Zitat rechts, kein Kasten, Zitat 28 px Bricolage.
7. **Wolfgang.** Dunkle Sektion, Porträt links randlos (sobald da; bis dahin kein Platzhalter), Text rechts, Wikimedia-Zitat darunter mit roter Linie links (einzige rote Linie der Seite).
8. **Vergleichstabelle.** Bleibt; „Leitformat“-Spalte schwarz und fett statt rot.
9. **Anfrage.** Formular auf Weiß, Calendly daneben, eine Linie darüber. Keine Karte.

## Mobil-Fehler (jetzt, unabhängig vom Rest)

- Hero: Video-Caption liegt über dem Play-Button.
- Hero-Zahlen: 2×2-Raster, „Berlin“ und „33“ sind unterschiedlich groß und versetzt; Labels werden abgeschnitten.
- Sticky-CTA erscheint auch bei 800 px (Tablet) und verdeckt dort Buttons; nur unter 768 px zeigen.
- Logostreifen füllt einen ganzen Bildschirm.

## Reihenfolge und Aufwand

- **P1 (vor Ads-Start, ca. ein Tag):** Tokens (Weiß/Hellgrau statt Creme), Eyebrows und Mittelpunkte raus, Karten reduzieren, Platzhalterflächen entfernen, Mobil-Fehler, Logostreifen auf fünf Namen, Hero mit Studio-Foto. Danach Lighthouse und 375-px-Check wie gehabt.
- **P2 (mit AUFTRAG-05, sobald Medien da sind):** echte Bilder in Ausspielungen, Logos als Grafik, Cover-Raster, Wolfgang-Porträt, Hero-Video.
- **P3 (nach dem Test):** Unterseiten nachziehen, die P1 nicht automatisch erfasst (Studio-Galerie, Referenz-Einzelseiten, Über uns).

Abnahme P1: Screenshots Startseite und Studio-LP bei 375 px und 1440 px in `auftraege/screenshots/` ablegen, Erik entscheidet am Bild.
