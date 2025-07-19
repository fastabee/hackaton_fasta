FROM php:8.2-apache


RUN apt-get update && apt-get install -y \
    libpq-dev \
    libzip-dev \
    libicu-dev \
    unzip \
    && docker-php-ext-install pgsql pdo_pgsql zip intl

RUN a2enmod rewrite


COPY . /var/www/html


WORKDIR /var/www/html


RUN chown -R www-data:www-data /var/www/html/writable

EXPOSE 80
