FROM php:8.0-fpm-alpine

ADD ./php/www.conf /usr/local/etc/php-fpm.d/www.conf

RUN addgroup -g 1000 corg-api && adduser -G corg-api -g corg-api -s /bin/sh -D corg-api

RUN mkdir -p /var/www/html

RUN chown corg-api:corg-api /var/www/html

WORKDIR /var/www/html

RUN docker-php-ext-install pdo pdo_mysql
