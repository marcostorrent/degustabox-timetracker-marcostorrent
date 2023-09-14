FROM php:8.2-fpm-alpine
RUN apk --no-cache add curl git unzip
RUN apk --no-cache add \
    libzip-dev \
    unzip
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN docker-php-ext-install pdo pdo_mysql
RUN apk add --no-cache bash
RUN apk add --no-cache nodejs npm && npm install -g npm
WORKDIR /var/www/html
ENV COMPOSER_ALLOW_SUPERUSER=1
RUN composer update && composer install
RUN npm install bootstrap
RUN php artisan key:generate
RUN php artisan migrate
RUN php artisan storage:link
RUN php artisan config:cache
RUN php artisan route:cache