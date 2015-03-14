FROM usertaken/nginx-php

RUN apt-get update && apt-get install vim nano emacs23-nox php5-sqlite sqlite3 -y --no-install-recommends && rm -rf /var/lib/apt/lists/*

VOLUME /var/www
COPY app/ /var/www/
