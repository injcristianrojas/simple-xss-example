FROM usertaken/nginx-php

RUN apk add -U php-pdo_sqlite && rm -rf /var/cache/apk/*

VOLUME /var/www
COPY app/ /var/www/
