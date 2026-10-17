# AUFTRAG-06 – Umzug nextgen-podcast.de → leitformat.de (nur nach gewonnenem Test)

Skizze. Wird ausgearbeitet, wenn das Experiment entschieden ist. Vorher nichts davon umsetzen.

## Vorbereitung (vor dem Stichtag, ohne Wirkung nach außen)

- Search Console und GA4 der alten Domain: Klicks, Impressionen und Backlinks je URL der letzten 12 Monate exportieren. Das entscheidet 301 gegen 410 beim Wiki.
- WordPress-Export der alten Seite (Werkzeuge → Daten exportieren, alle Inhalte) + Medien-Ordner per SFTP sichern.
- 301-Tabelle als `redirects/301.csv` (alt, neu, Typ) – rund 200 Zeilen:
  - 22 statische Seiten → neue Entsprechung (Mapping in Strategie-Doc, Tab Bestandsaufnahme, Abschnitt Seiten)
  - 42 Referenzen → 11 Einzelseiten, 2 Dubletten auf ihre Zwillinge, 29 auf die sechs Sammelseiten (Anker auf den jeweiligen Abschnitt)
  - 91 Wiki-Artikel → 32 bleiben (gleicher Slug unter /wiki/), 51 auf ihren Pillar, 6 löschen (410, wenn keine Klicks/Backlinks)
  - /podcast-wiki/, /category/podcast-wiki/ (9 Seiten), 26 Buchstaben-Kategorien, 9 Alias-/tote Links → /wiki/ bzw. korrektes Ziel
  - Keine Sammelweiterleitung auf die Startseite.
- Wiki-Artikel schreiben: 15 Einzelartikel neu (Sie-Form, aktualisiert, Links auf Leistungsseiten), 17 Pillar-Artikel aus den zusammengelegten Texten (Liste im Strategie-Doc, Tab Bestandsaufnahme, Abschnitt Wiki). Alle unter `/wiki/<slug>/` als CPT `wiki` mit Hub-Seite und Kategorien (Produktion, Strategie, Technik, Recht, Reichweite, Plattformen).

## Umzugstag

1. noindex auf leitformat.de entfernen (`blog_public 1`), robots.txt öffnen, Sitemap einreichen.
2. Auf nextgen-podcast.de: `.htaccess` mit der 301-Tabelle (RewriteMap oder einzelne Regeln), alte WordPress-Instanz bleibt für Medien-URLs erreichbar, bis alle Medien auf leitformat.de liegen; danach 301 auch für `/wp-content/uploads/…`.
3. Search Console: Adressänderung melden. Alte Domain mindestens 12 Monate weiterleiten (Domain nicht kündigen).
4. Google-Unternehmensprofil umbenennen (nicht neu anlegen – 33 Bewertungen bleiben), Website-URL ändern.
5. LinkedIn-Unternehmensseite umbenennen, Wolfgangs Profil-Titel, E-Mail-Signaturen, Calendly-Name, Impressum der alten Domain (falls sie noch Inhalte zeigt).
6. Dr.-Web-Ranking, Sortlist, ensun und weitere Verzeichnisse auf Leitformat umschreiben lassen; business-on.de-Artikel bleibt (verlinkt die alte Domain – 301 fängt das).
7. Kundenzitate und Logos bleiben unter der Marke Leitformat (Freigabe liegt vor); Satz „Aufgenommen, als wir noch NextGen Podcast hießen" bleibt ein Jahr.

## Nachlauf

- Wöchentlich 404-Report (Search Console, Server-Log) → Tabelle ergänzen.
- Nach 4 Wochen: Rankings der 32 Wiki-URLs und 11 Referenzen vergleichen (alt vs. neu).
- Ads-Experiment beenden, Kampagne komplett auf leitformat.de umstellen, /pilotfolge/ bleibt noindex.
