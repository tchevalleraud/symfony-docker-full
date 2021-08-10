FROM php:7.4.3-fpm-alpine

WORKDIR /srv/app/

RUN apk update
RUN echo "extension=pdo_mysql" >> /usr/local/etc/php/php.ini-development
RUN docker-php-ext-install -j$(nproc) pdo_mysql

# php-redis
ENV PHPREDIS_VERSION 5.0.2

RUN docker-php-source extract \
    && curl -L -o /tmp/redis.tar.gz https://github.com/phpredis/phpredis/archive/$PHPREDIS_VERSION.tar.gz \
    && tar xfz /tmp/redis.tar.gz \
    && rm -r /tmp/redis.tar.gz \
    && mv phpredis-$PHPREDIS_VERSION /usr/src/php/ext/redis \
    && docker-php-ext-install redis \
    && docker-php-source delete

RUN apk add --no-cache \
        unzip \
        chromium \
        chromium-chromedriver

ENV PANTHER_CHROME_DRIVER_BINARY /usr/lib/chromium/chromedriver

RUN docker-php-ext-install opcache
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer