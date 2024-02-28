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

echo "Checking mysql connection";

while ! mysqladmin ping -h"mysql" --silent; do
    echo "Waiting for mysql connection...";
    sleep 1;
done

php artisan migrate;
php artisan db:seed;

echo "Finished";
