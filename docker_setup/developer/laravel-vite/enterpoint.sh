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

if ! mysqladmin ping -h"${DB_HOST}" --silent; then
    echo "Connection failed. Please check your .env file";
else
    php artisan migrate;
    php artisan db:seed;
fi

if [ ! -d node_modules ] ; then
    echo "Running: npm install";
    npm install -g mrm
    npm install --loglevel verbose;
else
    echo "node_modules FOLDER ALEADY EXISTS. Skipping npm install";
fi

export NODE_OPTIONS=--max_old_space_size=8172;

npm run dev;

echo "Finished";
