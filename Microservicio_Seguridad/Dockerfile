FROM php:8.1-fpm-alpine

RUN apk add --no-cache \
    libzip-dev \
    oniguruma-dev \
    nginx \
    zip \
    unzip \
    && docker-php-ext-install pdo_mysql zip

WORKDIR /var/www/html

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY . .

RUN composer install --no-dev --optimize-autoloader

RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

COPY ./docker/nginx.conf /etc/nginx/nginx.conf

CMD php-fpm -D & nginx -g 'daemon off;'
