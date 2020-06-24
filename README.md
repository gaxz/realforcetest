# Installation
Clone project

    cd projectDir
    git clone https://github.com/gaxz/realforcetest.git .

Then build

    docker-compose build

Run containers

    docker-compose up -d

Install dependencies

    docker-compose exec php-fpm composer install

Apply migrations

    docker-compose exec php-fpm php yii migrate

# Running

http://localhost:8080/

# Testing

Apply migrations to test database

    docker-compose exec php-fpm php tests/bin/yii migrate

Run tests

    docker-compose exec php-fpm php vendor/bin/codecept run
