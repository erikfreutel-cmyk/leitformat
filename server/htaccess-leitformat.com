# Ziel: /www/htdocs/w01eedfd/leitformat.com/.htaccess
# Nur nötig, solange leitformat.com im KAS ein eigenes Verzeichnis hat.
RewriteEngine On
RewriteRule ^(.*)$ https://leitformat.de/$1 [R=301,L]
