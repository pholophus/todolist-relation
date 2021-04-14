#Clone the repo locally:

> git clone https://github.com/pholophus/todolist-relation.git 

> cd pingcrm-vuetify

##Install PHP dependencies:
> composer install

##Install NPM dependencies:
> npm ci

##Build assets:
> npm run dev

##Setup configuration:
> cp .env.example .env

##Generate application key:
> php artisan key:generate

##Run database migrations:
> php artisan migrate

##Serving Laravel:
> php artisan serve
