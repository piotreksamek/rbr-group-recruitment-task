FROM php:8.2-fpm

WORKDIR /var/www/html

RUN apt-get update && apt-get install -y libicu-dev git libzip-dev zip libpng-dev\
    && apt-get install -y librabbitmq-dev \
    && apt-get install -y npm \
    && docker-php-ext-install intl opcache pdo pdo_mysql zip gd pcntl

COPY --from=composer/composer:2.5.4 /usr/bin/composer /usr/bin/composer

RUN usermod -u 1000 www-data

RUN mkdir -p /var/www/.npm && chown -R www-data:www-data /var/www/.npm

USER www-data
