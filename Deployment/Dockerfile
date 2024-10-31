# PHP image with necessary extensions
FROM php:8.0-fpm

# Install system dependencies and extensions
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy application files
COPY . /var/www

# Install PHP dependencies
RUN composer install

# Set up Laravel environment and generate key
RUN cp .env.example.docker .env && \
    php artisan key:generate && \
    php artisan migrate --force && \
    php artisan db:seed --force

# Set permissions for Laravel
RUN chown -R www-data:www-data /var/www && chmod -R 755 /var/www/storage

# Expose port
EXPOSE 8000
EXPOSE 8001

# Start Laravel server
CMD php artisan serve --host=0.0.0.0 --port=8000 & php artisan serve --host=0.0.0.0 --port=8001
