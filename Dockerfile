FROM webdevops/php-nginx:8.3-alpine

WORKDIR /app

COPY .docker/nginx/default.conf /etc/nginx/conf.d/default.conf
COPY .docker/nginx/vhost.conf /opt/docker/etc/nginx/vhost.conf

COPY ./public /app
COPY ./config /app
COPY ./api /app
COPY ./index.html /app/index.html

RUN chown -R www-data:www-data /app

EXPOSE 80
