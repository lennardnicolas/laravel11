docker compose up -d

php artisan migrate --force
php artisan db:seed
php artisan storage:link
php artisan serve