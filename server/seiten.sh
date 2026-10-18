#!/usr/bin/env bash
# Seiten auf dem Server anlegen/aktualisieren: ./server/seiten.sh [slug,slug]
set -euo pipefail
DIR="$(cd "$(dirname "$0")" && pwd)"
HOST="ssh-w01eedfd@w01eedfd.kasserver.com"
TMP="/www/htdocs/w01eedfd/lf-seiten-tmp"
for f in "$DIR"/inhalte/*.md; do python3 -I "$DIR/md2blocks.py" "$f" > "${f%.md}.html"; done
ssh "$HOST" "mkdir -p $TMP/inhalte"
scp -q "$DIR"/seiten-auftrag-0*.php "$HOST:$TMP/"
scp -q "$DIR"/inhalte/*.html "$HOST:$TMP/inhalte/"
for s in "$DIR"/seiten-auftrag-0*.php; do
  ssh "$HOST" "/usr/bin/wp --path=/www/htdocs/w01eedfd/leitformat.de eval-file $TMP/$(basename "$s") ${1:-} 2>&1 | grep -v HTTP_HOST" || true
done
ssh "$HOST" "rm -rf $TMP; /usr/bin/wp --path=/www/htdocs/w01eedfd/leitformat.de cache flush --quiet"
