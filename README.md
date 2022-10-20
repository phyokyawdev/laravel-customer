# Laravel Test Api

### System specification
PHP 8.0 <br />
Laravel Framework 8.83.25 <br />
mysql Ver 8.0

### Running

1. Clone repository
2. cd to repository
3. Run composer install
4. Run cp .env.example .env and update env variables accordingly
5. Run php artisan key:generate
6. Run php artisan passport:install
7. Run php artisan migrate --seed
8. Run php artisan serve
9. Go to link localhost:8000

### Exposed routes
#### Passport
login with username and password <br />
/api/login

#### User CRUD
/api/users

#### City CRUD
/api/cities

#### Zone CRUD
/api/zones

#### Customer CRUD
/api/customers
