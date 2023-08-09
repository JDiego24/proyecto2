FROM php:8.0.25-apache

COPY . /var/www/html

WORKDIR /var/www/html

RUN docker-php-ext-install mysqli

RUN docker-php-ext-install mysqli pdo pdo_mysql

EXPOSE 80
EXPOSE 3306

CMD ["apache2-foreground"]
