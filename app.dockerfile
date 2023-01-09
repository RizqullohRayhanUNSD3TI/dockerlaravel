FROM php:8.1.6-fpm

RUN apt-get update && apt-get install -y libmcrypt-dev default-mysql-client \
    && pecl install mcrypt-1.0.5 && docker-php-ext-install pdo_mysql && docker-php-ext-enable mcrypt

WORKDIR /var/www