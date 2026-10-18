/**
 * Leitformat – Lead-Sheet (Google Apps Script, Web-App).
 * Einrichten: Google Sheet anlegen → Erweiterungen → Apps Script → diesen Code einfügen.
 * Projekteinstellungen → Script-Eigenschaften: SECRET = gleicher Wert wie LF_LEAD_SECRET in wp-config.php.
 * Bereitstellen → Neue Bereitstellung → Web-App, Ausführen als: ich, Zugriff: Jeder → URL = LF_LEAD_WEBHOOK.
 */
const SPALTEN = ['datum', 'vorhaben', 'firma', 'name', 'email', 'telefon', 'nachricht', 'seite',
  'utm_source', 'utm_medium', 'utm_campaign', 'utm_term', 'utm_content', 'gclid'];

function doPost(e) {
  const daten = JSON.parse(e.postData.contents || '{}');
  const secret = PropertiesService.getScriptProperties().getProperty('SECRET');
  if (!secret || daten.secret !== secret) {
    return ContentService.createTextOutput(JSON.stringify({ ok: false })).setMimeType(ContentService.MimeType.JSON);
  }
  const blatt = SpreadsheetApp.getActive().getSheetByName('Anfragen') || SpreadsheetApp.getActive().insertSheet('Anfragen');
  if (blatt.getLastRow() === 0) blatt.appendRow(SPALTEN);
  // Formeln verhindern: Werte, die mit = + - @ beginnen, als Text speichern.
  blatt.appendRow(SPALTEN.map((k) => { const v = String(daten[k] || ''); return /^[=+\-@]/.test(v) ? "'" + v : v; }));
  return ContentService.createTextOutput(JSON.stringify({ ok: true })).setMimeType(ContentService.MimeType.JSON);
}
