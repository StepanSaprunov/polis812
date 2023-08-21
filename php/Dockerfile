FROM php:7.4.23-apache

ENV COMPOSER_ALLOW_SUPERUSER=1

COPY --from=composer:2.5.8 /usr/bin/composer /usr/local/bin/composer

RUN apt-get update && apt-get install -y \
    zlib1g-dev \
    libzip-dev \
    unzip

ENV APACHE_DOCUMENT_ROOT=/var/www/html/src
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

WORKDIR /var/www/html

COPY ./composer.* ./

RUN composer install --prefer-dist --no-scripts --no-dev --no-progress --no-interaction

COPY ./src .

RUN composer dump-autoload --optimize