#!/bin/bash
set -e
cd "$(dirname "$0")"
docker build -t site-jekyll .
docker run --rm -it --volume="$PWD:/srv/jekyll" --user "$(id -u):$(id -g)" site-jekyll jekyll build
