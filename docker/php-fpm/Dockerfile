FROM php:8-fpm

RUN apt-get update && \
   docker-php-ext-install pdo pdo_mysql

RUN pecl install xdebug-3.0.3 && docker-php-ext-enable xdebug

COPY php.ini $PHP_INI_DIR

EXPOSE 9003

WORKDIR /var/www

CMD ["php-fpm"]
