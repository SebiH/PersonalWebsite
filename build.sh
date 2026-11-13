#!/bin/bash
set -e
cd "$(dirname "$0")"
docker run --rm --volume="$PWD:/app" --workdir=/app --user "$(id -u):$(id -g)" \
    -e npm_config_cache=/tmp/.npm node:26-slim sh -c "npm ci && npm run build"
