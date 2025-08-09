FROM php:8.3-cli

RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"
RUN echo "memory_limit=1G" >> "$PHP_INI_DIR/php.ini"
RUN echo "intl.default_locale = de-AT" >> "$PHP_INI_DIR/php.ini"

RUN apt-get -y update \
    && apt-get install -y libicu-dev zlib1g-dev libzip-dev \
    && docker-php-ext-configure intl \
    && docker-php-ext-install intl

RUN apt-get install -y libfreetype6-dev libjpeg-dev libjpeg62-turbo-dev libpng-dev
RUN docker-php-ext-configure gd --with-freetype --with-jpeg

RUN docker-php-ext-install \
    gettext \
    fileinfo \
    gd \
    intl \
    mysqli \
    opcache \
    pdo \
    pdo_mysql \
    zip \
    bcmath

RUN openssl req -x509 -nodes -days 365 -newkey rsa:2048 -keyout /etc/ssl/private/ssl-cert-snakeoil.key -out /etc/ssl/certs/ssl-cert-snakeoil.pem -subj "/C=AT/ST=Vienna/L=Vienna/O=Security/OU=Development/CN=example.com"

RUN curl --silent --show-error https://getcomposer.org/installer | php
RUN pecl install xdebug-3.3.1 && docker-php-ext-enable xdebug
RUN pecl install apcu && docker-php-ext-enable apcu

RUN mkdir -p /usr/share/man/man1/ \
    && apt-get -y update \
    && apt-get -y install default-mysql-client default-jre
