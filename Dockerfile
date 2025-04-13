FROM php:8.2-fpm

# Install dependencies
RUN apt-get update && apt-get install -y \
    zip unzip curl git libonig-dev libzip-dev libxml2-dev \
    && docker-php-ext-install pdo_mysql mbstring zip exif pcntl

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

COPY src/ ./

RUN if [ ! -f .env ]; then cp .env.example .env; fi

# Install dependencies Laravel
RUN composer install --no-interaction --optimize-autoloader

# Generate application key
RUN php artisan key:generate

# Set permission
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache
