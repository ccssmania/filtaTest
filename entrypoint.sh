#!/bin/sh

# Run Composer install
composer install --optimize-autoloader --no-interaction

# Install npm dependencies
npm install

# Build assets
npm run build

# link the storage to public
php artisan storage:link

php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Run database migrations
php artisan migrate:fresh --seed

# Start the PHP FPM server
php-fpm