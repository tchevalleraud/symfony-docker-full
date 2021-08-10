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

#RUN docker-php-ext-install pdo
RUN docker-php-ext-install mysqli pdo_mysql

ARG USER_ID
ARG GROUP_ID

RUN groupadd -f --gid $GROUP_ID user
RUN useradd -u $USER_ID -ms /bin/bash -g user user
USER user

WORKDIR /var/www