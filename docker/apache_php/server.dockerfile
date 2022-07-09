FROM php:8.1-apache

ARG DOCKER_GROUP_ID

RUN addgroup -gid $DOCKER_GROUP_ID laravel && adduser -gid $DOCKER_GROUP_ID -shell /bin/sh -disabled-login laravel

RUN docker-php-ext-install pdo pdo_mysql

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY . /var/www/html

RUN ls -la /var/www/html

RUN a2enmod rewrite && service apache2 restart

COPY ./docker/apache_php/apache_config.prod.conf /etc/apache2/sites-enabled/000-default.conf

COPY ./docker/apache_php/php.ini /usr/local/etc/php/php.ini

COPY ./docker/apache_php/run.sh /var/www/html/run.sh

WORKDIR /var/www/html

RUN chown -R www-data:www-data /var/www/html

USER laravel