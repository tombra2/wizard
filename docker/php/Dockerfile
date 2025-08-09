FROM php:8.3-apache

RUN a2enmod rewrite

RUN apt-get -y update \
    && apt-get install -y libicu-dev zlib1g-dev libzip-dev libpng-dev \
    && pecl install apcu \
    && docker-php-ext-configure intl \
    && docker-php-ext-install intl pdo pdo_mysql mysqli intl fileinfo gettext zip gd opcache \
    && docker-php-ext-enable apcu \
    && pecl clear-cache

RUN openssl req -x509 -nodes -days 365 -newkey rsa:2048 -keyout /etc/ssl/private/ssl-cert-snakeoil.key -out /etc/ssl/certs/ssl-cert-snakeoil.pem -subj "/C=AT/ST=Vienna/L=Vienna/O=Security/OU=Development/CN=example.com"
RUN a2enmod autoindex ssl expires headers http2
#RUN a2dismod mpm_prefork && a2enmod mpm_event
RUN a2ensite default-ssl