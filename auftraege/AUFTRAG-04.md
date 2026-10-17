# AUFTRAG-04 – Formular, Calendly, Tracking, Consent

Ziel: Jede Anfrage wird gezählt, einmal, gleich auf allen Seiten, und landet bei Wolfgang und im Lead-Sheet. Ohne abgenommenes Tracking startet kein Ads-Experiment (Gate 1 der Roadmap).

## 1. Formular

- Endpoint `/anfrage-senden/` als eigener Request-Handler im Theme (`inc/form.php`, Hook `template_redirect`), kein Formular-Plugin.
- Felder: Name, Unternehmen (Pflicht), E-Mail (Pflicht, Format prüfen), Telefon (optional), „Was planen Sie?" (Select: Pilotfolge / Format für unser Unternehmen / Konzernprojekt / Studio buchen / Noch unklar), Nachricht (optional, auf /kontakt/). Honeypot-Feld + Zeitstempel gegen Spam (kein Captcha).
- Nonce, Server-Validierung, Fehler zurück auf die Seite mit Ankerlink und Feldmarkierung.
- Erfolg: Mail an kontakt@leitformat.de (SMTP über KAS-Postfach, Plugin `wp-mail-smtp` oder eigener PHPMailer-Hook; Absender noreply@leitformat.de, Reply-To = Absender), Webhook POST ans Lead-Sheet (Google Apps Script Web-App, URL in `wp-config.php` als `LF_LEAD_WEBHOOK`; Felder: Datum, Seite, Vorhaben, Firma, Name, E-Mail, Telefon, UTM-Parameter aus Cookie/Query, gclid), dann `wp_safe_redirect('/danke/?src=form&v=<vorhaben>')`.
- UTM und gclid beim ersten Seitenaufruf in ein First-Party-Cookie (30 Tage) schreiben (`assets/js/attribution.js`), beim Absenden als Hidden-Felder mitschicken.
- Datenschutz-Hinweis unter dem Button (Text aus dem Design), keine Pflicht-Checkbox (B2B, berechtigtes Interesse + Hinweis genügt; Erik entscheidet final).

## 2. Calendly

- Erik benennt den bestehenden Event-Typ um; URL kommt in `wp-config.php` als `LF_CALENDLY_URL`. Einbettung als Inline-Widget in `lf/anfrage` (Container `#termin`) und auf /danke/, lazy nach Consent oder Klick („Termin wählen" lädt das Widget).
- UTM anhängen: `?utm_source=leitformat&utm_medium=website&utm_campaign=<seite>`; `name` und `email` vorbefüllen, wenn aus dem Formular kommend (`/danke/?src=form` → aus Session).
- Calendly-Event `calendly.event_scheduled` abfangen (postMessage-Listener in `assets/js/calendly.js`) → `dataLayer.push({event: 'lf_termin'})`.

## 3. GTM und Conversions

- GTM-Container: Erik gibt die ID (bestehender Container oder neuer). `LF_GTM_ID` in `wp-config.php`, Ausgabe über AUFTRAG-01-Hook. Kein zweites Tag-Snippet im Theme.
- Conversion-Aktionen in Google Ads (Erik legt an, Namen exakt): `LF – Anfrage` (Seitenaufruf `/danke/`, eine je Klick, Wert 300), `LF – Erstgespräch` (Event `lf_termin`, eine je Klick, Wert 600), `LF – Anruf` (Anrufverfolgung über Anruferweiterung, ab 60 s, Wert 300). Alte Conversion-Aktionen auf „sekundär".
- GTM-Tags: Google-Ads-Conversion-Tag für Anfrage (Trigger Page View `/danke/`), für Erstgespräch (Trigger Custom Event `lf_termin`); erweiterte Conversions aktiv (E-Mail aus dem dataLayer: Formular pusht `lf_anfrage` mit gehashter E-Mail vor dem Redirect, oder auf /danke/ aus Session). GA4-Konfiguration mit denselben Events. Nur Beobachtung: `tel:`-Klick, Video-Play (Hero), Scroll 75 %.
- Keine doppelte Zählung: Conversion-Tags nur im GTM, nirgends im Theme; `/danke/` setzt einen Session-Marker, sodass ein Reload nicht erneut feuert (Tag-Trigger prüft `dataLayer`-Flag `lf_once`).

## 4. Consent Mode v2

- Banner selbst gebaut (kein CMP-Abo): zwei Buttons gleichwertig („Alle akzeptieren", „Nur notwendige"), Link auf Datenschutz, Auswahl in Cookie 6 Monate, Einstellung im Footer wieder aufrufbar.
- Vor Einwilligung: `gtag('consent','default',{ad_storage:'denied',analytics_storage:'denied',ad_user_data:'denied',ad_personalization:'denied'})` im `<head>` vor GTM; nach Klick `consent update`. Conversion-Modeling bleibt damit möglich.
- Vimeo/YouTube/Calendly laden erst nach Klick auf das Vorschaubild oder nach Consent (Zwei-Klick-Lösung), Platzhalter mit Hinweis.

## 5. Testprotokoll (das ist Gate 1)

- [ ] Formular auf Startseite, /pilotfolge/, /preise/, Studio-Seite, /kontakt/ einmal mit Testdaten abschicken: Mail kommt an, Zeile im Lead-Sheet, Redirect auf /danke/, Conversion `LF – Anfrage` im Google-Ads-Konto sichtbar (Tag Assistant + Konto-Diagnose), genau eine je Absenden
- [ ] Calendly-Testbuchung → `lf_termin` im dataLayer → `LF – Erstgespräch` gezählt, genau einmal
- [ ] Reload von /danke/ zählt nicht erneut
- [ ] Consent abgelehnt: kein Cookie außer Consent-Cookie, keine Vimeo/YouTube/Calendly-Requests vor Klick; Consent erteilt: Tags feuern
- [ ] UTM/gclid aus einem Test-Klick landen im Lead-Sheet
- [ ] Honeypot blockt ein automatisiertes Submit
- [ ] Spam-Test: Formular ohne Firma oder mit ungültiger Mail zeigt Fehler, sendet nichts
- [ ] Datenschutz-Text nennt alle eingesetzten Dienste
- [ ] STATUS.md: „Tracking abgenommen am …" mit Screenshot der Google-Ads-Diagnose in `auftraege/abnahmen/`
