FROM usertaken/nginx-php
RUN apt-get update && apt-get install vim nano php5-sqlite -y --no-install-recommends && rm -rf /var/lib/apt/lists/*
COPY app/ /var/www/
