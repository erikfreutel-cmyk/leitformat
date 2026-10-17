#!/usr/bin/env bash
# Einmalig: WordPress auf leitformat.de installieren (AUFTRAG-01, Schritt 2).
# Liest DB-Zugang und Admin-Mail aus ../.env.local:
#   LF_DB_NAME=…  LF_DB_USER=…  LF_DB_PASS=…  LF_ADMIN_EMAIL=…
set -euo pipefail

DIR="$(cd "$(dirname "$0")" && pwd)"
# shellcheck disable=SC1091
source "$DIR/../.env.local"
: "${LF_DB_NAME:?}" "${LF_DB_USER:?}" "${LF_DB_PASS:?}" "${LF_ADMIN_EMAIL:?}"

HOST="ssh-w01eedfd@w01eedfd.kasserver.com"
WEBROOT="/www/htdocs/w01eedfd/leitformat.de"
WP="/usr/bin/wp --path=$WEBROOT"

ssh "$HOST" bash -s <<REMOTE
set -euo pipefail
export HOME=/www/htdocs/w01eedfd
cd "$WEBROOT"
[ -f index.htm ] && mv index.htm index.htm.kas-platzhalter
[ -f wp-load.php ] || $WP core download --locale=de_DE
[ -f wp-config.php ] || $WP config create --dbname='$LF_DB_NAME' --dbuser='$LF_DB_USER' --dbpass='$LF_DB_PASS' --dbhost=localhost --locale=de_DE --extra-php <<'PHP'
define('DISALLOW_FILE_EDIT', true);
define('WP_POST_REVISIONS', 10);
define('LF_GTM_ID', '');            // AUFTRAG-04
PHP
$WP core is-installed || $WP core install --url=https://leitformat.de --title="Leitformat" --admin_user=erik --admin_email='$LF_ADMIN_EMAIL' --skip-email
$WP option update blog_public 0
$WP option update timezone_string Europe/Berlin
$WP option update permalink_structure '/%postname%/'
$WP option update blogdescription "Video-Podcasts, die bei Entscheidern ankommen."
$WP plugin delete akismet hello || true
REMOTE

# Theme, .htaccess, robots.txt
"$DIR/../deploy.sh"
scp "$DIR/htaccess-leitformat.de" "$HOST:$WEBROOT/.htaccess"
scp "$DIR/robots.txt" "$HOST:$WEBROOT/robots.txt"
scp "$DIR/htaccess-leitformat.com" "$HOST:/www/htdocs/w01eedfd/leitformat.com/.htaccess"
ssh "$HOST" "$WP theme activate leitformat && $WP theme delete twentytwentythree twentytwentyfour twentytwentyfive || true; $WP rewrite flush; $WP cache flush"
echo "Fertig. Admin-Passwort setzen: ssh $HOST \"$WP user update erik --user_pass=…\" (nicht ins Repo)."
