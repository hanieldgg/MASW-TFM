# Use the official PHP image
FROM php:8.2-cli

# Install system dependencies and PHP extensions
RUN apt-get update && apt-get install -y libpng-dev libjpeg-dev libfreetype6-dev libzip-dev libonig-dev git unzip libxml2-dev libcurl4-openssl-dev

# Install PHP extensions
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd \
    && docker-php-ext-install mysqli pdo pdo_mysql zip curl

# Set the working directory
WORKDIR /var/www/html

# Copy the Laravel application code
COPY . /var/www/html

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Install Laravel dependencies
RUN composer update
RUN composer install

# Expose port 8000 for PHP Artisan Serve
EXPOSE 8000

# Command to run Laravel
CMD ["php", "artisan", "serve", "--host=0.0.0.0"]
