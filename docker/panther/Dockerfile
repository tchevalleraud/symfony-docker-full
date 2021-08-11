FROM php:7.4.3-fpm-alpine

RUN apk update
RUN apk add build-base shadow

ENV PANTHER_NO_SANDBOX 1
ENV PANTHER_CHROME_ARGUMENTS='--disable-dev-shm-usage'
ENV PANTHER_CHROME_DRIVER_BINARY /usr/lib/chromium/chromedriver

RUN apk add --no-cache \
        unzip \
        chromium \
        chromium-chromedriver

RUN docker-php-ext-install mysqli pdo_mysql

RUN apk --update --no-cache add autoconf g++ make && \
    pecl install -f xdebug && \
    docker-php-ext-enable xdebug && \
    apk del --purge autoconf g++ make

ADD ./xdebug.ini /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
ADD ./error_reporting.ini /usr/local/etc/php/conf.d/error_reporting.ini

ARG USER_ID
ARG GROUP_ID

RUN groupadd -f --gid $GROUP_ID user
RUN useradd -u $USER_ID -ms /bin/bash -g user user
USER user

WORKDIR /var/www