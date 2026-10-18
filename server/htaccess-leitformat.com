# Ziel: /www/htdocs/w01eedfd/leitformat.com/.htaccess
# Nicht mehr nötig: .com zeigt im KAS seit 18.10.2026 auf /leitformat.de/. Nur als Rückfall.
RewriteEngine On
RewriteRule ^(.*)$ https://leitformat.de/$1 [R=301,L]
