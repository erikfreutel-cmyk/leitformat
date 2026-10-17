# AUFTRAG-05 – Medien, Inhalte, QA, Go-Live des Tests

Ziel: Alle Platzhalter sind durch echte Medien und Texte ersetzt, die Seite ist auf drei Geräten geprüft, das Ads-Experiment läuft ab Start-Datum (geplant 9.11.2026, Entscheidung 15.1.2027).

## 1. Medien von der alten Seite holen

Auf dem Server, nicht lokal. Liste in `daten/medien-alte-seite.md`.

```
# Beispiel – alte Bild-URLs aus dem Quelltext der jeweiligen Seite ziehen:
curl -s https://nextgen-podcast.de/podcast-studio-berlin/ | grep -o 'https://nextgen-podcast.de/wp-content/uploads/[^"]*\.\(jpg\|jpeg\|png\|webp\)' | sort -u > /tmp/studio-bilder.txt
# dann je Datei:
/usr/bin/wp media import "<URL>" --title="Podcast-Studio Berlin, Kamera 1" --alt="Studio von Leitformat in Berlin-Lichtenberg, Blick auf Kamera 1 und Tisch" --skip-copy=false
```

- Nur die größte Variante je Bild (ohne `-300x200`-Suffix). Nach Import WebP-Varianten erzeugen (WordPress 6.5+ macht das bei `image/webp`-Unterstützung automatisch; sonst `wp media regenerate`).
- Dateinamen umbenennen, bevor der alte Markenname in der Mediathek landet (`--title` setzt nur den Titel; Datei per `--file-name` oder vorher lokal umbenennen).
- Referenz-Cover (41) von /referenzen/ holen, als Beitragsbild der Referenz-Einträge setzen.
- Logos: nach Möglichkeit SVG; wo nur PNG, als PNG mit transparentem Hintergrund und in Grau eingefärbt per CSS-Filter (`filter: grayscale(1) opacity(.6)`).
- Videos bleiben extern (Vimeo/YouTube), außer Hero-MP4 von Wolfgang (WOLFGANG-01): als MP4 H.264 1080p, max. 8 MB, plus Poster-JPG; Upload nach `wp-content/uploads/video/`.

## 2. Inhalte einpflegen

- Hero-Video (WOLFGANG-01) und drei Cases mit Zahlen (WOLFGANG-02) in Startseite, /referenzen/<slug>/ und die passenden Landingpages.
- Kundenstimmen wörtlich aus `daten/kundenstimmen.md`; Volltexte der gekürzten Stimmen von den alten Referenzseiten holen.
- Presse-Links von Wolfgang in /ueber-uns/.
- Alle `[ZAHL]`- und `[…]`-Platzhalter suchen (grep über Theme und Inhalte): keiner darf bleiben. Was Wolfgang nicht geliefert hat, wird gestrichen, nicht geschätzt.
- Lead-Sheet-Spalten „Arm (alt/neu)", „qualifiziert", „Auftragswert" anlegen (für Wolfgang nach jedem Gespräch).

## 3. QA

- Geräte: iPhone (Safari), Android (Chrome), Desktop (Chrome, Firefox). Jede Seite: Layout, Formular, Menü, Video-Klick, Calendly.
- Lighthouse mobil je Seite: Performance ≥ 90, Accessibility 100, Best Practices ≥ 95. Ladezeit unter 2 s (WebPageTest, Berlin, 4G).
- Rechtschreibung und Du/Sie-Grep. Alle Links (Screaming Frog oder `wget --spider`): keine 404, keine `#`-Platzhalter.
- Schema-Validierung je Seite (Organization, LocalBusiness, FAQPage, VideoObject).
- Kontrastprüfung: Nebentext `#5E626A` auf `#F6F3EE` ≥ 4,5:1 (prüfen, sonst abdunkeln).
- OG-Bilder je Seite (Default aus AUFTRAG-01, Studio und Referenzen mit eigenem Bild).

## 4. Ads-Experiment anlegen (Erik im Konto, Claude Code liefert Listen und Texte)

- Struktur aus `docs/strategie.md` Abschnitt 7 inklusive der Korrektur (Anzeigengruppe 5 Studio → /podcast-studio-berlin/, Gruppe 6 Interview → /interview-podcast/; „mieten", „stunde", „stundenweise", „"podcast studio mieten"" aus der Negativliste streichen). Keyword- und Negativlisten als Textdateien `ads/keywords-gruppe-1…6.txt`, `ads/negativ.txt` (eine je Zeile, Match-Type-Notation), Anzeigentexte `ads/rsa-gruppe-1…6.md` (12 Titel, 4 Beschreibungen je Gruppe, ohne KI-Vokabular, mit Preis und Frist).
- Experiment: bestehende Kampagne duplizieren, Final-URLs und Anzeigentexte auf leitformat.de, 50/50-Split, nur Suche, Display in beiden Armen aus, 40 €/Tag je Arm, manueller CPC max. 12 € für vier Wochen.
- Erweiterungen: Sitelinks (Preise, Studio Berlin, Referenzen, Pilotfolge), Callouts, Snippets, Anruferweiterung mit Anrufverfolgung, Preiserweiterung (Pilotfolge 2.900 €, Experte ab 2.400 €, Unternehmen ab 3.900 €).

## 5. Go-Live-Checkliste

- [ ] Gate 1 (AUFTRAG-04 Testprotokoll) abgenommen
- [ ] Alle Platzhalter weg, alle Medien da, alle Links grün
- [ ] noindex bleibt (Test läuft ohne Google-Index), AdsBot erreicht alle Landingpages (Google-Ads-Landingpage-Bericht zeigt keine Fehler)
- [ ] Search Console für leitformat.de angelegt (Property, noch keine Sitemap einreichen)
- [ ] Backup-Routine auf All-Inkl (KAS-Backup täglich) aktiv; `wp db export` vor jedem größeren Auftrag
- [ ] Experiment gestartet, Startdatum in STATUS.md; wöchentlicher Termin: Suchbegriffe prüfen, Negativliste pflegen, Lead-Sheet lesen
- [ ] Entscheidungsregel notiert: Umzug, wenn der neue Arm je qualifizierter Anfrage ≥ 20 % günstiger ist bei ≥ 40 Anfragen je Arm; Stichtag 15.1.2027
