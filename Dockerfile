FROM php:8.2-apache

# Instala extensiones mysqli y pdo_mysql
RUN docker-php-ext-install mysqli pdo pdo_mysql

COPY . /var/www/html/

EXPOSE 80
