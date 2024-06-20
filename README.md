# laravel11

Laravel11 app is an web app allowing visitor to create an account to become member and see the posts who are managed by the administrator.

## Prerequisite

You need to have docker installed

## Setup

- You may want to change the MARIADB_PASS value in the [docker .env file](./.env)
- You may want to change the BASE_ADMIN_EMAIL, BASE_ADMIN_PASS, BASE_ADMIN_NAME value in the [laravel .env file](./laravel11/.env)

## Starting the application for the first time

Run these differents commands in the order :

```
docker compose up -d
```

```
docker exec -it laravel11-laravel-1 php artisan migrate --force
```

```
docker exec -it laravel11-laravel-1 php artisan db:seed
```

```
docker exec -it laravel11-laravel-1 php artisan storage:link
```

You can now visit [http://127.0.0.1:8000](http://127.0.0.1:8000) to see your web app

## Stopping the app

```
docker compose down
```

## Starting again the app

```
docker compose up -d
```
