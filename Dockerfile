FROM php:8.2-apache

RUN apt-get update \
  && apt-get install -y libzip-dev libpng-dev libjpeg-dev libfreetype6-dev libonig-dev libxml2-dev \
  && docker-php-ext-configure gd --with-freetype --with-jpeg \
  && docker-php-ext-install mysqli zip gd
