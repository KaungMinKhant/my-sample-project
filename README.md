# my-sample-project

# Requirements

- Laravel Platform
- Composer
- MySQL
- PHP

# Introduction

This project is a sample application to control the entire web application from the admin panel.

# Setting Up Dev Environment

Refers https://laravel.com/docs/5.8 for installing laravel in your computer.

Clone my repository.

Create an empty database in MySql server.
Edit the .env file to connect with your empty database.
For the mail configuration, if you want to use my mail configuration, please send an email to phenomenalkaung@gmail.com 
If you want to do it by yourself, please refer https://www.itsolutionstuff.com/post/laravel-58-email-verification-exampleexample.html However, I feel like there may be problem if your email is not two factor authenicated and your password is not randomly generated 16-characters string. I am not sure about this. Feel free to try...

Open the repository directory in the terminal.

Run the following commands; 
-	composer install
-	npm install
-	php artisan key:generate
-	php artisan migrate --seed
-	npm run watch

Open another terminal and run
-	php artisan serve

Open your browser and run at http://localhost:8000



