FROM php:8.3.3-cli

WORKDIR /var/www/html
COPY . /var/www/html

RUN apt-get update -y && apt-get install -y \
    libzip-dev \
    unzip

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install Node.js
RUN apt-get install -y nodejs npm
RUN npm install

RUN composer install

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_mysql

# Expose port 8000 for PHP built-in server
EXPOSE 8000

# Command to run Laravel's built-in server
CMD php artisan serve --host=0.0.0.0 --port=8000
