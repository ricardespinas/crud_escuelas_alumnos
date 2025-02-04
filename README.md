# CRUD Escuelas / Alumnos

Este proyecto es una aplicación CRUD (Crear, Leer, Actualizar, Eliminar) para gestionar **Escuelas** y **Alumnos**. A continuación se detallan los pasos completos para configurarlo en tu entorno local.


### 1. Crear un .env apartir del .env.example

    Puedes usar este comando de bash des del directorio raíz de tu proyecto: 
    
    cp .env.example .env

### 2. Laravel necesita una clave única de la aplicación para cifrar los datos. Puedes generar esta clave ejecutando el siguiente comando:

    php artisan key:generate

### 3. Ejecutar desde la consola en el directorio raíz de tu proyecto

    Puedes usar este comando de bash des del directorio raíz de tu proyecto: 

    composer install

### 3. Abre tu cliente de MySQL o usa un cliente de base de datos como phpMyAdmin y crea una base de datos que se llame igual que el que aparece en el .env en la variable:     

    .env
    DB_DATABASE=nombredelabasededatos

    mysql command
    CREATE DATABASE nombredelabasededatos;

### 5. Ejecutar las migracions y seed de Laravel que precargará unos registros de inicio necesarios para el correcto funcionamiento, como el usuario de login.

    Puedes usar este comando de bash des del directorio raíz de tu proyecto: 

    php artisan migrate --seed

### 6. Acceder a http://localhost

    Yo lo he hecho con Apache pero se puede usar artisan también que iniciará el servidor de Laravel:

        php artisan serve




### ----------------------------------------------- ###


    Existen una serie de archivos que se han mantenido en el repositorio para posibles ampliaciones:

        .editorconfig
