FROM php:8.2-apache

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Install PDO MySQL extension
RUN docker-php-ext-install pdo pdo_mysql

# Copy project files to /var/www/html
COPY . /var/www/html

# Set working directory
WORKDIR /var/www/html

# Set document root to public
RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/public|g' /etc/apache2/sites-available/000-default.conf

# Set recommended PHP settings
COPY ./php.ini /usr/local/etc/php/

EXPOSE 80
