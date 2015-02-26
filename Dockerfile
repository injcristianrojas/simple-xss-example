FROM usertaken/nginx-php

RUN apt-get update && apt-get install vim nano emacs23-nox php5-sqlite -y --no-install-recommends && rm -rf /var/lib/apt/lists/*

WORKDIR /var/www
ADD app/ /var/www