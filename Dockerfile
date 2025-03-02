# Usamos una imagen base de PHP con Apache
FROM php:8.2-apache-buster

# Instalar dependencias necesarias
RUN apt-get update && apt-get install -y \
    netcat \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libxml2-dev \
    unzip \
    vim \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql \
    && docker-php-ext-enable pdo_mysql

# Habilitar módulos de Apache
RUN a2enmod rewrite

# Copiar el archivo de configuración personalizado
COPY laravel-site.conf /etc/apache2/sites-available/laravel-site.conf

# Habilitar el sitio de Laravel
RUN a2ensite laravel-site.conf

# Deshabilitar el sitio por defecto de Apache
RUN a2dissite 000-default.conf

# Establecer el directorio de trabajo en /var/www/html (donde se encuentra Laravel)
WORKDIR /var/www/html

# Copiar el archivo composer.json y composer.lock para instalar las dependencias de Composer
COPY composer.json composer.lock ./ 

# Instalar Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Instalar las dependencias del proyecto
RUN composer install

# Copiar el resto del proyecto al contenedor
COPY . .

# Exponer el puerto 80 (puerto por defecto de Apache)
EXPOSE 80

COPY entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh

CMD ["/entrypoint.sh"]

