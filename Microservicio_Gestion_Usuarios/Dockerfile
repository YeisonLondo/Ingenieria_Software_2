# Imagen base oficial de PHP con FPM y extensiones necesarias para Laravel
FROM php:8.2-fpm

# Instalar dependencias del sistema y extensiones PHP requeridas por Laravel
RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Instalar Composer (desde imagen oficial)
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Crear directorio de trabajo
WORKDIR /var/www

# Copiar todo el proyecto dentro del contenedor
COPY . .

# Instalar dependencias PHP del proyecto
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Permisos para almacenamiento y cache
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# Exponer el puerto del servidor
EXPOSE 8000

# Comando de inicio de Laravel
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
