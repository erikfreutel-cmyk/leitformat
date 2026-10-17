#!/usr/bin/env bash
# Deployt theme/leitformat/ nach leitformat.de und leert den Cache.
set -euo pipefail

HOST="ssh-w01eedfd@w01eedfd.kasserver.com"
WEBROOT="/www/htdocs/w01eedfd/leitformat.de"
TARGET="$WEBROOT/wp-content/themes/leitformat/"
DIR="$(cd "$(dirname "$0")" && pwd)"

rsync -avz --delete \
  --exclude '.git' --exclude '.DS_Store' \
  "$DIR/theme/leitformat/" "$HOST:$TARGET"

ssh "$HOST" "/usr/bin/wp --path=$WEBROOT cache flush"
