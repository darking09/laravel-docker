#!/bin/sh

if [ ! -f .env ] ; then
    cp .env.example .env;
else
    echo ".env FILE ALREADY EXISTS. Skipping copy from .env.example";
fi

if [ ! -d vendor ] ; then
    echo "Running: composer install";
    composer install;
else
    echo "vendor FOLDER ALEADY EXISTS. Skipping composer install";

fi

MYSQL_INSTALLED=$(echo "select * from users"|mysql -u${DB_USERNAME} -p${DB_PASSWORD} -h${DB_HOST} ${DB_DATABASE}|wc -l);

echo "MYSQL_INSTALLED: $MYSQL_INSTALLED";

echo "Checking mysql connection";

if ! mysqladmin ping -h"${DB_HOST}" --silent; then
    echo "Connection failed. Please check your .env file";
else
    php artisan migrate;
    php artisan db:seed;
fi

echo "Finished";
