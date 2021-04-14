Clone the repo locally:

git clone https://github.com/xalunda/inertiajs-laravel-vuetify.git pingcrm-vuetify
cd pingcrm-vuetify
Install PHP dependencies:

composer install
Install NPM dependencies:

npm ci
Build assets:

npm run dev
Setup configuration:

cp .env.example .env
Generate application key:

php artisan key:generate
Create an SQLite database. You can also use another database (MySQL, Postgres), simply update your configuration accordingly.

touch database/database.sqlite
Run database migrations:

php artisan migrate
Run database seeder:

php artisan db:seed
Serving Laravel:

php artisan serve
