FROM alpine:latest

ENV TIMEZONE America/Santiago
ENV PHP_MEMORY_LIMIT 512M
ENV MAX_UPLOAD 50M
ENV PHP_MAX_FILE_UPLOAD 200
ENV PHP_MAX_POST 100M

RUN apk add --update php-cli \
php-curl \
php-dom \
php-gd \
php-fpm \
php-json \
php-mcrypt \
php-pdo_sqlite \
php-phar \
bash

RUN sed -i -e "s/;daemonize\s*=\s*yes/daemonize = no/g" /etc/php/php-fpm.conf && \
	sed -i -e "s/listen\s*=\s*127.0.0.1:9000/listen = 9000/g" /etc/php/php-fpm.conf && \
	sed -i "s|;date.timezone =.*|date.timezone = ${TIMEZONE}|" /etc/php/php.ini && \
	sed -i "s|memory_limit =.*|memory_limit = ${PHP_MEMORY_LIMIT}|" /etc/php/php.ini && \
    sed -i "s|upload_max_filesize =.*|upload_max_filesize = ${MAX_UPLOAD}|" /etc/php/php.ini && \
    sed -i "s|max_file_uploads =.*|max_file_uploads = ${PHP_MAX_FILE_UPLOAD}|" /etc/php/php.ini && \
    sed -i "s|post_max_size =.*|max_file_uploads = ${PHP_MAX_POST}|" /etc/php/php.ini && \
    sed -i "s/;cgi.fix_pathinfo=1/cgi.fix_pathinfo=0/" /etc/php/php.ini

RUN rm /var/cache/apk/*

EXPOSE 9000
CMD ["php-fpm"]
