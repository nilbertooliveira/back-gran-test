#!/bin/bash

# Executar migrations
docker-compose exec app php artisan migrate --database=testing

# Executar seeds
docker-compose exec app php artisan db:seed --class=DatabaseSeeder --database=testing
