FROM php:8.3.3-apache

WORKDIR /root

ADD https://github.com/ufoscout/docker-compose-wait/releases/download/2.7.3/wait /wait
RUN chmod +x /wait

RUN sed -ri -e 's!/var/www/html!/var/www/laravel/public!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!AllowOverride None!AllowOverride All!g' /etc/apache2/apache2.conf

RUN curl -sS https://getcomposer.org/installer > composer-setup.php
RUN php composer-setup.php
RUN mv composer.phar /bin/composer

RUN apt update

RUN apt install -y acl git vim default-mysql-client libcurl4-openssl-dev libzip-dev zlib1g-dev libpng-dev libicu-dev libsqlite3-dev libxml2 libonig-dev libgd-dev libmcrypt-dev
RUN apt install -y libcurl4-openssl-dev libzip-dev zlib1g-dev libicu-dev libsqlite3-dev libxml2 libxml2-dev libjpeg-dev libjpeg62-turbo-dev jpegoptim optipng pngquant gifsicle

RUN apt-get clean && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-configure gd --enable-gd --with-freetype --with-jpeg
RUN docker-php-ext-install pdo pdo_mysql curl mbstring exif pcntl bcmath gd iconv intl pdo_sqlite xml zip

RUN a2enmod rewrite

WORKDIR /var/www/laravel

COPY composer*.json .

COPY . .

RUN chown -R www-data:www-data /var/www/laravel

RUN composer install

ARG AUTORUN

CMD /wait; \
    /bin/bash -i /var/www/laravel/docker_setup/developer/only-laravel/enterpoint.sh; \
    /bin/sh -c "exec /usr/sbin/apache2ctl -D FOREGROUND;"
