# AUFTRAG-04 – Einrichtung durch Erik (Konten, Container, Zugänge)

Das Theme ist fertig: Formular, Consent Mode v2, Banner, Calendly-Einbettung, dataLayer-Ereignisse. Was fehlt, sind Werte und Einstellungen in Konten, die nur Erik hat. Reihenfolge wie unten; danach läuft `./server/config-04.sh`, dann das Testprotokoll (Gate 1).

## 1. Werte in `.env.local` (nie ins Repo)

```
LF_GTM_ID=GTM-XXXXXXX
LF_CALENDLY_URL=https://calendly.com/<konto>/<event>
LF_LEAD_WEBHOOK=https://script.google.com/macros/s/<id>/exec
LF_LEAD_SECRET=<zufällige Zeichenkette, gleich wie im Apps Script>
LF_SMTP_HOST=w01eedfd.kasserver.com
LF_SMTP_PORT=587
LF_SMTP_USER=noreply@leitformat.de
LF_SMTP_PASS=<Passwort des KAS-Postfachs>
LF_MAIL_FROM=noreply@leitformat.de
LF_MAIL_TO=kontakt@leitformat.de
```

Danach: `./server/config-04.sh` (schreibt die Werte als Konstanten in die `wp-config.php` auf dem Server).

## 2. KAS

- Postfach `noreply@leitformat.de` anlegen (nur Versand), Passwort in `.env.local`.
- `kontakt@leitformat.de` anlegen, Weiterleitung an Wolfgangs Postfach.
- DNS: SPF (`v=spf1 include:spf.kasserver.com ~all` – im KAS unter DNS prüfen, oft vorbelegt) und DKIM für leitformat.de aktivieren.

## 3. Lead-Sheet

- Google Sheet „Leitformat – Anfragen“ anlegen → Erweiterungen → Apps Script → Inhalt von `server/lead-sheet.gs` einfügen.
- Projekteinstellungen → Script-Eigenschaften: `SECRET` = Wert von `LF_LEAD_SECRET`.
- Bereitstellen → Neue Bereitstellung → Typ Web-App, Ausführen als „Ich“, Zugriff „Jeder“ → URL als `LF_LEAD_WEBHOOK`.
- Google Workspace: Data Processing Terms in der Admin-Konsole akzeptiert (Datenschutz nennt den AV-Vertrag).

## 4. Calendly

- Event-Typ umbenennen („Erstgespräch Leitformat – 30 Minuten“), Link als `LF_CALENDLY_URL`.
- Unter Einbetten: keine Domain-Sperre nötig. Der Kalender lädt erst per Klick oder nach Einwilligung.

## 5. Google Ads – Conversion-Aktionen (Namen exakt)

| Name | Quelle | Zählung | Wert | Primär |
| --- | --- | --- | --- | --- |
| LF – Anfrage | Website (GTM) | Eine | 300 € | ja |
| LF – Erstgespräch | Website (GTM) | Eine | 600 € | ja |
| LF – Anruf | Anrufe über Anzeigen, ab 60 s | Eine | 300 € | ja |

Alte Conversion-Aktionen auf „sekundär“. Für „LF – Anfrage“ erweiterte Conversions aktivieren (Google Tag Manager als Methode). Conversion-ID und die beiden Labels notieren – sie kommen in GTM.

## 6. GTM-Container

**Variablen (benutzerdefiniert)**

| Name | Typ | Wert |
| --- | --- | --- |
| DLV – lf_once | Datenschichtvariable | `lf_once` |
| DLV – lf_vorhaben | Datenschichtvariable | `lf_vorhaben` |
| DLV – E-Mail-Hash | Datenschichtvariable | `user_data.sha256_email_address` |
| UPD – Anfrage | Vom Nutzer bereitgestellte Daten, manuell | E-Mail (SHA-256): `{{DLV – E-Mail-Hash}}` |
| Ads – Conversion-ID | Konstante | `AW-…` |

**Trigger**

| Name | Typ | Bedingung |
| --- | --- | --- |
| CE – lf_danke einmal | Benutzerdefiniertes Ereignis `lf_danke` | `DLV – lf_once` gleich `true` |
| CE – lf_termin | Benutzerdefiniertes Ereignis `lf_termin` | – |
| CE – lf_video_play | Benutzerdefiniertes Ereignis `lf_video_play` | – |
| Klick – Telefon | Nur Links | Click URL beginnt mit `tel:` |
| Scroll 75 % | Scrolltiefe vertikal 75 % | – |

Wichtig: Die Anfrage-Conversion hängt am Ereignis `lf_danke` mit `lf_once = true`, **nicht** am Seitenaufruf `/danke/`. Das Theme setzt `lf_once` nur beim ersten Aufruf nach einem echten Formularversand. Neuladen, direkte Aufrufe und Bot-Versuche ergeben `lf_once = false`.

**Tags**

| Name | Typ | Trigger | Einstellungen |
| --- | --- | --- | --- |
| Conversion-Verknüpfung | Conversion Linker | All Pages | – |
| Google-Tag GA4 | Google-Tag | Initialisierung – All Pages | Mess-ID `G-…` |
| Ads – Anfrage | Google Ads Conversion Tracking | CE – lf_danke einmal | ID + Label „LF – Anfrage“, Wert 300, EUR; erweiterte Conversions: `UPD – Anfrage` |
| Ads – Erstgespräch | Google Ads Conversion Tracking | CE – lf_termin | ID + Label „LF – Erstgespräch“, Wert 600, EUR |
| GA4 – generate_lead | GA4-Ereignis | CE – lf_danke einmal | Parameter `vorhaben` = `{{DLV – lf_vorhaben}}` |
| GA4 – termin | GA4-Ereignis | CE – lf_termin | – |
| GA4 – telefon | GA4-Ereignis | Klick – Telefon | – |
| GA4 – video_play | GA4-Ereignis | CE – lf_video_play | – |
| GA4 – scroll_75 | GA4-Ereignis | Scroll 75 % | – |

Einwilligung: Container-Einstellungen → „Übersicht über die Einwilligung aktivieren“. Google-Tags nutzen den integrierten Consent-Check; das Theme setzt den Standard (alles abgelehnt) vor GTM und aktualisiert nach der Auswahl im Banner. Keine zusätzliche Einwilligungsanforderung an den Google-Tags nötig.

Veröffentlichen, Container-ID als `LF_GTM_ID`.

## 7. Danach (Gate 1, mit Claude Code)

Testprotokoll aus AUFTRAG-04, Abschnitt 5: je ein Test-Absenden auf Startseite, /pilotfolge/, /preise/, Studio-Seite, /kontakt/ (Mail, Sheet-Zeile, Conversion genau einmal), Calendly-Testbuchung, Reload, Consent abgelehnt/erteilt, UTM/gclid, Honeypot, Fehlerfälle. Screenshot der Google-Ads-Diagnose nach `auftraege/abnahmen/`.
