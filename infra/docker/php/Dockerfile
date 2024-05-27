FROM php:7.4.3-fpm-alpine AS base

WORKDIR /workspace

# timezone environment
ENV TZ=UTC \
  # locale
  LANG=en_US.UTF-8 \
  LANGUAGE=en_US:en \
  LC_ALL=en_US.UTF-8 \
  # composer environment
  COMPOSER_HOME=/composer

ARG UID=1000
ARG GID=1000

COPY --from=composer:2.7 /usr/bin/composer /usr/bin/composer

RUN apk update && \
    apk add --no-cache \
    git \
    unzip \
    libzip-dev \
    icu-dev \
    oniguruma-dev \
    mysql-client && \
    docker-php-ext-install \
    intl \
    pdo_mysql \
    zip \
    bcmath && \
    # permission denied bind mount in Linux environment
    addgroup -g $GID phper && \
    adduser -D -u $UID -G phper phper && \
    mkdir /composer && \
    mkdir -p /home/phper/.config/psysh && \
    chown phper:phper /composer && \
    chown phper:phper /workspace && \
    chown phper:phper /home/phper/.config/psysh

FROM base AS development

COPY ./infra/docker/php/php.development.ini /usr/local/etc/php/php.ini

USER phper

FROM base AS development-xdebug

RUN pecl install xdebug && \
    docker-php-ext-enable xdebug

COPY ./infra/docker/php/xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini

USER phper

FROM base AS deploy

COPY ./infra/docker/php/php.deploy.ini /usr/local/etc/php/php.ini
COPY --chown=phper:phper ./src /workspace

USER phper

RUN composer install --quiet --no-interaction --no-ansi --no-dev --no-scripts --no-progress --prefer-dist && \
    composer dump-autoload --optimize && \
    chmod -R 777 storage bootstrap/cache && \
    php artisan optimize:clear && \
    php artisan optimize