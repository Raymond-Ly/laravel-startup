FROM nginx:1.19.6-alpine

ADD ./nginx/nginx.conf /etc/nginx/nginx.conf
ADD ./nginx/default.conf /etc/nginx/conf.d/default.conf

RUN mkdir -p /var/www/html

RUN addgroup -g 1000 corg-api && adduser -G corg-api -g corg-api -s /bin/sh -D corg-api

RUN chown corg-api:corg-api /var/www/html
