#!/bin/sh

# Run Composer install
composer install --optimize-autoloader --no-interaction

# Install npm dependencies
npm install

# Build assets
npm run build

# Start the PHP FPM server
php-fpm