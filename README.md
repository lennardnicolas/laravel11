# laravel11

Laravel11 app is an web app allowing visitor to create an account to become member and see the posts who are managed by the administrator.

## Prerequisite

Your machine need to have :
- Docker
- PHP
- Composer

## Setup

- You may want to change the MARIADB_PASS value in the [docker .env file](./.env)
- You may want to change the BASE_ADMIN_EMAIL, BASE_ADMIN_PASS, BASE_ADMIN_NAME, DB_PASSWORD value in the [laravel .env file](./laravel11/.env)

## Starting the application

Run these differents commands in the order :

```
docker compose up -d
```

```
cd laravel11
```

```
composer install
```

```
php artisan migrate --force
```

```
php artisan db:seed
```

```
php artisan storage:link
```

```
php artisan serve
```

You can now visit [http://127.0.0.1:8000](http://127.0.0.1:8000) to see your web app
