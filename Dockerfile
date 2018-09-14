FROM php:7.1

ADD vhost.conf /etc/nginx/conf.d/default.conf
COPY src/public /var/www/public

RUN docker-php-ext-install pdo pdo_mysql && docker-php-ext-enable pdo pdo_mysql

WORKDIR /src/public

EXPOSE 8087