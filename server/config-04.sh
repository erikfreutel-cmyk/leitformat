#!/usr/bin/env bash
# Schreibt die AUFTRAG-04-Werte aus ../.env.local als Konstanten in wp-config.php (nichts davon ins Repo).
# Erwartete Variablen in .env.local (leere werden übersprungen):
#   LF_GTM_ID  LF_CALENDLY_URL  LF_LEAD_WEBHOOK  LF_LEAD_SECRET
#   LF_SMTP_HOST  LF_SMTP_PORT  LF_SMTP_USER  LF_SMTP_PASS  LF_MAIL_FROM  LF_MAIL_TO
set -euo pipefail
DIR="$(cd "$(dirname "$0")" && pwd)"
# shellcheck disable=SC1091
source "$DIR/../.env.local"
HOST="ssh-w01eedfd@w01eedfd.kasserver.com"
WP="/usr/bin/wp --path=/www/htdocs/w01eedfd/leitformat.de"
CMDS=""
for k in LF_GTM_ID LF_CALENDLY_URL LF_LEAD_WEBHOOK LF_LEAD_SECRET LF_SMTP_HOST LF_SMTP_PORT LF_SMTP_USER LF_SMTP_PASS LF_MAIL_FROM LF_MAIL_TO; do
  v="${!k:-}"
  [ -z "$v" ] && continue
  v_esc=$(printf '%s' "$v" | sed "s/'/'\\\\''/g")
  CMDS+="$WP config set $k '$v_esc' --type=constant --quiet && echo '$k gesetzt'"$'\n'
done
[ -z "$CMDS" ] && { echo "Keine Werte in .env.local"; exit 1; }
# Werte gehen per Standardeingabe, nicht als Befehlszeile auf dem lokalen Rechner.
ssh "$HOST" 'bash -s' <<<"$CMDS"
ssh "$HOST" "$WP cache flush --quiet"
