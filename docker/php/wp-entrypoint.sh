#!/bin/sh
set -e

if [ "${WP_FIX_PERMS:-1}" = "1" ] && [ -d /var/www/html ]; then
  chown -R www-data:www-data /var/www/html
fi

exec docker-php-entrypoint apache2-foreground
