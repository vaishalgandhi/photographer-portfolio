# photographer-portfolio

## Introduction
* This is a web based photographer portfolio website which is built using HTML, CSS, JS and PHP. This project is also comes with api as a backend but api is just developed not implemented in frontend.
* This project used Laravel Lumen 8.0 framework to build blazing fast api.

## Installation

Please check the official laravel lumen installation guide for server requirements before you start. [Official Documentation](https://lumen.laravel.com/docs/8.x#installation)


Clone the repository

    git clone https://github.com/vaishalgandhi/photographer-portfolio.git

Switch to the repository folder

    cd photographer-portfolio

Switch to the api folder

    cd api

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Install all the dependencies using composer

    composer install

Generate a new application key

   As laravel lumen **does not support php artisan key:generate** command, Set your application key to a random 32 character long string to your .env file.

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Run the database seeders

    php artisan db:seed

Start the local development server

    php -S localhost:8000 -t public

You can now access the server at http://localhost:8000

**TL;DR command list**

    git clone https://github.com/vaishalgandhi/photographer-portfolio.git
    cd photographer-portfolio
    cd api
    cp .env.example .env
    composer install
    php artisan migrate
    php artisan db:seed
    php -S localhost:8000 -t public


If you come across any issues please report them [here](https://github.com/viralsolani/laravel-adminpanel/issues).