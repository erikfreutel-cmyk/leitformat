# AUFTRAG-03 – Studio-Landingpage und alle weiteren Seiten

## Nachtrag 18.10.2026 (gilt vor allem Folgenden)

1. **Reihenfolge:** Zuerst /kontakt/ (mit `#termin`, Calendly-Platzhalter aus 02), /impressum/, /datenschutz/, /agb/ – damit Header-CTA und Footer-Links nicht mehr auf 404 laufen. Bis /kontakt/ steht, zeigt der Header-Button auf `#anfrage` (ohne `#anfrage` auf der Seite: `/#anfrage`). Danach die Studio-Landingpage, dann der Rest wie unten.
2. **Rechtsseiten:** Impressum mit den Angaben der NextGen Media GmbH von der alten Seite plus „Leitformat ist eine Marke der NextGen Media GmbH". Datenschutz: alte Erklärung als Basis, ergänzt um Google Tag Manager, Google Ads (Conversion-Tracking, erweiterte Conversions), Consent Mode v2, Calendly, Vimeo (dnt), Kontaktformular mit Webhook, Hosting All-Inkl; kein Google-Fonts-Abschnitt (Schriften lokal). AGB von der alten Seite übernehmen, Firmierung prüfen. Alle drei `noindex, follow`.
3. **Jahreszahlen:** „gegründet 2018" nur für die GmbH, „Podcasts seit 2020" für die Agentur. H1 Referenzen: „85 Podcast-Projekte." (ohne Jahr), H1 Über uns: „Sechs Leute, ein Studio in Berlin." Zeitstrahl: 2015 Blog → 2018 NextGen Media GmbH → 2020 Hauptstadt-Podcast → Gegenbauer als Startpunkt der Podcast-Agentur (Jahr nach WOLFGANG-03) → 2026 Leitformat.
4. **Hauptstadt-Podcast:** „seit 2020", ohne Folgenzahl – „200+ Folgen" an allen Stellen streichen, bis Wolfgang die Zahl aus dem Feed bestätigt (WOLFGANG-03, C1).
5. **Preise auf allen Seiten:** Unternehmen ab 4.400 €, Experte Setup 2.900 €, Clips je Paket (Pilot 6, Experte 3 je Folge, Unternehmen 5 je Folge), Rabatt nur bei Vorauszahlung (10 %). Stand in `README.md` und `daten/preislogik-alte-seite.md`. Studio-LP Satz unter der Preistabelle bleibt: „ab 450 € je Video-Folge".
6. **Zusagen:** Bis Wolfgang WOLFGANG-03 beantwortet hat, die vorsichtigen Fassungen aus RUECKFRAGEN (18.10., „Zusagen prüfen") verwenden – auch auf den neuen Seiten.

Ziel: Alle Seiten der Sitemap stehen. Priorität 1 ist die Studio-Landingpage – sie bekommt eine eigene Anzeigengruppe und ist die beste Seite der alten Website. Texte der alten Seite dürfen als Rohstoff dienen (URLs in `daten/alte-urls.txt`), werden aber durchgängig auf Sie umgeschrieben und nach den Tonregeln in `CLAUDE.md` gekürzt. Jede Seite nutzt die Pattern aus AUFTRAG-02 plus die hier genannten neuen.

## 1. /podcast-studio-berlin/ – Priorität

Keyword: podcast studio berlin, podcast studio mieten berlin, video podcast studio berlin. Title „Podcast-Studio Berlin mieten – Video & Audio, ab 200 € – Leitformat". H1 „Podcast-Studio in Berlin: drei Kameras, ein Ansprechpartner, ab 200 €."

Reihenfolge:
1. Hero: H1, Unterzeile „4×5 m in Berlin-Lichtenberg, drei Sony-4K-Kameras, drei Shure SM7B, Platz für vier Personen. Immer ein Techniker im Raum, Rohdaten am selben Tag." Buttons: primary „Studio anfragen" → `#anfrage`, secondary „Preise ansehen" → `#preise`. Rechts Studio-Foto (Totale, von der alten Studio-Seite).
2. Galerie: drei Kamera-Ansichten + Regie (Fotos der alten Seite), als Grid 2×2, Bildunterschriften mit Technik.
3. Technik und Raum (neues Pattern `lf/fakten`): zweispaltige Faktenliste – Raum 4×5 m, bis 4 Personen, 3× Sony 4K, 3× Shure SM7B, 2× Amaran-Licht, getrennte Tonspur je Person, Remote-Gäste zuschaltbar, Regie im Studio, Mo–Fr 8–18 Uhr, Tram/Bus/Ringbahn, Gratisparkplätze, Tiefgarage hinter dem Edeka (Kosten übernommen). Adresse Franz-Jacob-Straße 2c, 10369 Berlin.
4. Preise (`id="preise"`, neues Pattern `lf/preistabelle`): Einzelstunde 200 €, Session bis 120 Min 300 €, Halbtag bis 4 Std 400 €, Ganztag bis 8 Std 600 €, netto zzgl. USt. Darunter Storno (kostenfrei bis 48 h, 50 % bis 24 h, danach 100 %) und der Satz: „Schnitt, Clips und Veröffentlichung buchen Sie dazu – ab 450 € je Video-Folge – oder als Paket" mit Link auf /preise/.
5. Ablauf: Anfrage → Vorgespräch (15 Min) → Aufnahme → Übergabe am selben Tag (Pattern `lf/ablauf`, vier Schritte).
6. Case: IVD Berlin-Brandenburg (Moderator, zwei Gäste, drei Kameras, Clips) – Text von der alten Studio-Seite, gekürzt, plus Kundenstimme Myra Security (Studio Berlin).
7. Karte: statischer OSM-Ausschnitt als Bild (wie bei der Schule), Link auf Google Maps.
8. FAQ (9 Fragen der alten Seite übernehmen und kürzen: Kann ich das Studio ohne Agentur mieten? Wie viele Personen? Remote-Gäste? Bringe ich eigene Technik mit? Wer bedient die Kameras? Bekomme ich Rohdaten? Wie buche ich? Parken? Was kostet Schnitt dazu?). FAQPage-Schema.
9. Anfrage mit Vorauswahl „Studio buchen" im Dropdown; Calendly daneben.

Schema `LocalBusiness` (name „Leitformat Podcast-Studio Berlin", address, geo, openingHours Mo–Fr 08:00–18:00, telephone, priceRange „200–600 €", image). Fester Mobil-Button „Studio anfragen".

## 2. /corporate-podcast-agentur/

Keyword: corporate podcast agentur, unternehmenspodcast, interner podcast. Title „Corporate-Podcast-Agentur für Konzerne – Leitformat". H1 „Corporate Podcasts, die Ihre Zielkunden erreichen – nicht nur Ihre Mitarbeiter."

Rohstoff: alte /corporate-podcast/ (Prozess 4 Schritte, 2–6 Wochen bis Folge 1, 24 Logos, Vimeo 1127602118) und die Positionierung aus `docs/strategie.md` Abschnitt 4 (Account-Based Podcasting). Reihenfolge: Hero (Video Vimeo 1127602118 rechts, nach Prüfung des Inhalts), Logoleiste mit allen Konzernlogos, drei Versprechen (Format statt Folge / Ein Dreh, fünf Ausspielungen / Messbar bis zur Pipeline), Paket Konzern oben + Unternehmen daneben, Account-Based erklärt (neues Pattern `lf/schritte-3`: Zielkontenliste → Gäste aus Zielkunden → Reporting, wer zugesehen und angefragt hat), interne Formate als eigener Abschnitt (thyssenkrupp, Müller DE/EN/PL, NH Talks, Flurfunk aus Herne – Employer Branding, Intranet, Freigabeprozesse, Mehrsprachigkeit), Kundenstimmen thyssenkrupp + Müller, Ablauf mit Fristen (Kennenlernen → Konzept Tag 7 → Pilotfolge Tag 21 → Staffelplan Woche 6), FAQ (Freigaben, Datenschutz, mehrsprachig, Rechte, Vertraulichkeit, Reporting), Anfrage – Calendly mit Wolfgang zuerst, Formular daneben. Sie-Ansprache ist hier besonders streng.

## 3. /interview-podcast/

Keyword: interview podcast, b2b podcast, podcast für vertrieb, thought leadership podcast. Title „Interview-Podcast als Vertriebssystem – Leitformat". H1 „Der Interview-Podcast, in dem Ihre Wunschkunden die Gäste sind."

Rohstoff: alte /interview-podcast/ (duzt – komplett auf Sie umschreiben), Porsche-Story mit Vimeo 1169274184, Wert-Rechner (Folgen im Jahr × Anteil echter Beziehungen × Abschlussquote × Kundenwert). Den Wert-Rechner übernehmen – er rechnet Nutzen, nicht Kosten – als kleines Vanilla-JS-Widget mit vier Eingaben und einem Ergebnis, Hinweis „Rechenbeispiel, keine Garantie". Reihenfolge: Hero, „Sie brauchen nur einen Tisch" (Gast → Zugang → Gespräch → Kontakt halten, Pattern `lf/schritte-4`), Porsche-Story mit Video, Wert-Rechner, Für wen (Solo-Experten, Mittelstand, Konzerne – je ein Satz und das passende Paket), Pakete Experte + Unternehmen, Kundenstimme hy Consulting (Return on Innovation, 35 Folgen), FAQ (6 der alten Seite, auf Sie), Anfrage. Hauptstadt-Podcast als Beleg: „200+ Interview-Folgen seit 2020 im eigenen Format".

## 4. /video-podcast/

Keyword: video podcast produzieren, videopodcast agentur, podcast clips. Title „Video-Podcast produzieren lassen: Folge, Clips, LinkedIn – Leitformat". H1 „Ein Dreh. Video-Folge, Audio-Folge, Clips, Newsletter."

Rohstoff: alte /content-verwertung/ (9 Bausteine, 2–4 Clips je Folge, 5 Werktage) und Wiki-Artikel /video-podcast/ (1.200 Wörter, bester Ratgeber der alten Seite – als Fließtext-Teil unten, gekürzt, Sie-Form). Reihenfolge: Hero, Ausspielungen-Raster mit echten Beispielen, Marktzahlen mit Quelle (52 % bevorzugen Video, LinkedIn 81 % primäre B2B-Videoplattform – aus docs/strategie.md Abschnitt 2, mit Link), Ablauf Dienstag Aufnahme → Donnerstag Clips, Pakete, Kundenstimmen Theo Müller + Rheinische Notarkammer (beide Video), Ratgeber-Abschnitt, FAQ, Anfrage.

## 5. /podcast-produktion/

SEO-Seite für podcast produktion, podcast produzieren lassen, podcast erstellen lassen (die Ads-Landingpage für denselben Cluster bleibt /pilotfolge/). Title „Podcast-Produktion für Unternehmen: Audio und Video – Leitformat". H1 „Podcast-Produktion, die bei Folge 9 noch läuft."

Rohstoff: alte /podcast-produktion/ (12 Bausteine, Lieferzeit 5 Werktage, 1–2 Korrekturrunden, Einzelfolge ohne Bindung, 6 typische Herausforderungen) und /strategie-beratung/ (9 Beratungsbausteine, Audit-Report in 5 Werktagen). Reihenfolge: Hero, 12 Bausteine als Raster, Studio/remote/vor Ort (drei Karten mit Link auf Studio-Seite), Pilotfolge-Karte, „Warum die meisten Podcasts nach zehn Folgen aufhören" (6 Gründe der alten Startseite – stärkster Text, übernehmen und straffen; mit der 39-%-Zahl aus docs/strategie.md Abschnitt 2 als Quelle), Beratung und Audit (drei Audit-Stufen mit Preisen, Link /preise/), Ablauf, Kundenstimmen, FAQ, Anfrage.

## 6. /referenzen/ und Unterseiten

**Übersicht:** H1 „85 Podcast-Projekte seit 2018." Filter (Vanilla-JS, Buttons): Alle, Video-Podcast, Interner Podcast, Employer Branding, Interview, Öffentliche Hand. Raster aus Kacheln mit Cover, Kunde, Format, ein Satz Ergebnis. Reihenfolge: die acht Hero-Referenzen zuerst (Gegenbauer, Müller, thyssenkrupp, hy Consulting, Myra Security, KlimaBauern, Abgeordnetenhaus Berlin, Wikimedia), dann die übrigen.

**Elf Einzelseiten** `/referenzen/<slug>/` (Custom Post Type `referenz`, Template `single-referenz.html`): gegenbauer, mueller-gruppe, thyssenkrupp, return-on-innovation, myra-minds, klimabauern, abgeordnetenhaus-berlin, wikimove, pluscast, besiegelt, johanniter. Aufbau je Seite: H1 „[Podcast-Name] – [Kunde]", Eyebrow Branche + Format, Hero-Bild (Cover oder Standbild), Fakten-Zeile (Format, Rhythmus, Laufzeit, Leistungen), Ausgangslage – Format – Ergebnis (drei Absätze, Inhalt von der alten Referenzseite, Zahlen nur, wo sie dort stehen; Lücken als Platzhalter für WOLFGANG-02), eingebettete Folge (Spotify/Vimeo/YouTube mit Klick-Consent), Clips falls vorhanden, Kundenzitat, Link „Ähnliches Format anfragen" → Anfrage. VideoObject-Schema, wenn ein Video eingebettet ist. Alle elf `index, follow`.

**Sechs Sammelseiten** (Seiten, nicht CPT): `/referenzen/interne-formate/` (NH Talks, IDEXX, Flurfunk aus Herne, FU Berlin, Madame Tussauds, MCI Live, JTL), `/referenzen/immobilien/` (Loan to Value, Immo Insider, Renting or Buying, Die Haus-Meister), `/referenzen/medizin/` (ACARE, UCARE, Mit Haut & Haar, HerGrowth, Psychotherapie einfach erklärt, Schmetterlings-Effekte), `/referenzen/beratung-und-training/` (KN:IX talks, Berliner Team, Energieagentur RLP, ibbf), `/referenzen/schnitt-und-lieferung/` (DIHK, ESV, Erlenbacher, Arolsen Archives), `/referenzen/business/` (Change Management Rockstars, Berg & Macher, Kenjo). Je ein Abschnitt pro Projekt mit Cover, drei Sätzen und Player. Fehler der alten Seite nicht übernehmen (falsche Zitate auf berg-macher und arolsen, Vorlagentexte „noch in Entstehung", Tippfehler – Liste in `daten/kundenstimmen.md`).

## 7. /ueber-uns/

H1 „Sechs Leute, ein Studio, seit 2018." Reihenfolge: Gründungsgeschichte als Zeitstrahl (2015 Blog mit 400.000 Seitenaufrufen im Monat → 2018 NextGen Media GmbH → 2020 Hauptstadt-Podcast, 200+ Folgen → Gegenbauer als Startpunkt der Podcast-Agentur → 2026 Leitformat), Wolfgang groß (Foto, Werdegang in vier Sätzen: Fleischer, Führungspositionen, Agentur, eigener Podcast; Zitat-H2 „Ein Podcast ist die authentischste Content-Quelle eines Unternehmens."), Team-Raster (Wolfgang – Gründer & Geschäftsführer, Strategie, Kundenkommunikation, Formate · Erik – Mitgründer, Formatentwicklung, Konzepte, Google Ads · Lenny – Aufnahme, Produktion, Qualitätssicherung · Andreas – Schnitt, Sounddesign, Postproduktion · Clemens – Veröffentlichung, Distribution, Plattformen · Sophia – ohne Rolle, mit Wolfgang klären, ob sie bleibt), Presse (sechs Einträge der alten /presse/ mit echten Medien und Links – von Wolfgang; Comenius-EduMedia-Siegel 2024; business-on.de-Artikel), Google-Bewertungen (33, Link), „Ehemals NextGen Podcast" als eigener kurzer Absatz (Warum der neue Name: Video, Formate, dieselben Menschen), Anfrage. Hauptstadt-Podcast hier verlinken, nicht in den Referenzen.

## 8. /kontakt/, /danke/, Rechtliches, Wiki-Hub

**/kontakt/:** H1 „Sagen Sie uns, was Sie planen." Formular links, Calendly rechts (`id="termin"`), Telefon, Mail, Adresse, Karte. Keine weiteren Inhalte.
**/danke/:** `noindex`. H1 „Ihre Anfrage ist angekommen." Satz: Antwort am selben Werktag von Wolfgang Patz. Calendly direkt eingebettet („Wählen Sie jetzt einen Termin, dann geht es schneller"). Darunter drei Teaser: Gegenbauer-Video, Porsche-Story, YouTube „Warum Podcasts scheitern". Conversion zählt auf diesen Seitenaufruf (AUFTRAG-04).
**/impressum/:** NextGen Media GmbH, Franz-Jacob-Straße 2c, 10369 Berlin; Geschäftsführer Wolfgang Patz, Erik Freutel; HRB 200440 B, Amtsgericht Charlottenburg; USt-ID DE321500250; kontakt@leitformat.de; Verantwortlich nach § 18 Abs. 2 MStV: beide Geschäftsführer; Hinweis „Leitformat ist eine Marke der NextGen Media GmbH"; § 5 DDG statt TMG; Streitschlichtung B2B-Hinweis. `noindex`.
**/datenschutz/:** Vorlage der alten Seite (Stand 06/2026) übernehmen und ergänzen: All-Inkl als Hoster (statt netcup), Google Tag Manager, Google Ads Conversion mit erweiterten Conversions, GA4, Calendly, Vimeo, YouTube-nocookie, Consent-Banner, Formular (Verarbeitung, Speicherdauer, Webhook ins Google Sheet), kein SalesViewer, kein TrustIndex. `noindex`. Erik prüft den Text vor Go-Live.
**/agb/:** alte AGB §§ 1–11 übernehmen, ergänzen: Pilotfolge (Festpreis, Anrechnung auf Setup), Studio-Storno (wie auf der Studio-Seite), Laufzeiten der Pakete, Referenznennung weiterhin nur mit Zustimmung (§ 7). `noindex`.
**/wiki/:** Hub-Seite mit H1 „Podcast-Wiki" und Intro (zwei Sätze), noch ohne Artikel. Artikel kommen mit AUFTRAG-06. Bis dahin `noindex`.

## Abnahme

- [ ] Alle Seiten aus der Sitemap (docs/strategie.md Abschnitt 6 + SEO) existieren und sind im Header/Footer verlinkt
- [ ] Studio-Seite: LocalBusiness-Schema validiert, Preistabelle, Karte, Galerie; Lighthouse mobil ≥ 90
- [ ] Jede Seite: ein H1 mit Keyword, Title nach Muster, Meta-Description, FAQPage-Schema wo FAQ
- [ ] Kein „du/ihr" auf der gesamten Seite (grep über alle Pattern und Seiteninhalte)
- [ ] Keine Zahl ohne Quelle außer den in CLAUDE.md erlaubten
- [ ] Referenz-CPT mit elf Einträgen und sechs Sammelseiten, Filter funktioniert ohne Reload
- [ ] RUECKFRAGEN.md: alle Stellen, an denen Inhalt von Wolfgang fehlt (Presse-Links, Sophia, Fakten je Referenz)
- [ ] STATUS.md aktualisiert
