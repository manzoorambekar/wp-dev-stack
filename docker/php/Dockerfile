FROM php:8.2.27-apache

RUN apt-get update \
  && apt-get install -y libzip-dev libpng-dev libjpeg-dev libfreetype6-dev libonig-dev libxml2-dev \
  && docker-php-ext-configure gd --with-freetype --with-jpeg \
  && docker-php-ext-install mysqli zip gd \
  && a2enmod rewrite \
  && rm -rf /var/lib/apt/lists/*

RUN chown -R www-data:www-data /var/www

COPY docker/php/apache/000-default.conf /etc/apache2/sites-available/000-default.conf
COPY docker/php/conf.d/*.ini /usr/local/etc/php/conf.d/