# CRUD Escuelas (Schools) / Alumnos (Students)

This project is a CRUD (Create, Read, Update, Delete) application for managing Schools and Students. Below are the complete steps to set it up in your local environment.


### 1. Create a .env file from .env.example

    You can use this Bash command from the root directory of your project:
    
    cp .env.example .env

### 2. Laravel requires a unique application key to encrypt data. You can generate this key by running the following command:

    php artisan key:generate

### 3. Run the following command from the console in the root directory of your project

    You can use this Bash command from the root directory of your project:

    composer install

### 4. Open your MySQL client or use a database client like phpMyAdmin and create a database with the same name as specified in the .env file under the variable:     

    .env
    DB_DATABASE=database_name

    mysql command
    CREATE DATABASE database_name;

### 5. Run Laravel migrations and seeders, which will preload necessary initial records required for proper functionality, such as the login user

    You can use this Bash command from the root directory of your project:

    php artisan migrate --seed

### 6. Acces http://localhost

    I used Apache, but you can also use Laravel's built-in server with:

        php artisan serve

### 7. Log in

    Check the file \database\seeders\UserSeeder.php. The login credentials can be found there.




### -------------- Additional Notes ------------ ###


    Some files have been kept in the repository for potential future extensions like:

        .editorconfig
