## First time setup
- In terminal `docker-compose up -d --build`
- Access php: `docker exec -it php_nedhelps bash`
- Inside php container: 
  - `cp .env.example .env`
  - `php artisan key:generate`
  - `composer install`
  - `php artisan migrate --seed`
  - `php artisan migrate --env=testing`
- Running tests: 
  - `vendor/bin/phpunit tests`

## Core info
- php: localhost:8000
- phpmyadmin: localhost:8080 [user: `root`, password: `password`]

## Endpoints
Examples:
- `/api/loans` GET - fetch all loans
- `/api/loans/{your number}` GET - fetch specific loan
- `/api/loans/{your number}`, `{"amount": 1000}` PATCH - Update loan
- `/api/loans`, `{"amount": 1000, "interestRate": 0, "duration" : 1}` POST - Update loan
- `/api/loans/{your number}` DELETE - delete specific loan

## Edge cases
Sometimes there are permission issues on storage. Run these commands outside php container:
- `sudo chmod -R 775 storage`
- `sudo chmod -R ugo+rw storage`


