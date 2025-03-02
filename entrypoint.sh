#!/bin/bash

# Esperar a que MySQL esté listo antes de ejecutar migraciones
echo "Esperando a que MySQL esté disponible..."
until nc -z -v -w30 crud_escuelas_alumnos_db 3306
do
  echo "Esperando MySQL..."
  sleep 5
done

echo "MySQL está listo. Ejecutando Laravel..."

# Asegúrate de que los directorios de almacenamiento y caché tengan los permisos correctos
echo "Ajustando permisos en los directorios de storage y bootstrap/cache..."
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Laravel utiliza un sistema de cifrado para datos sensibles y para la sesión, y la clave de cifrado se encuentra en la variable APP_KEY de tu archivo .env. La longitud de la clave debe ser de 32 caracteres.
php artisan key:generate

# Ejecutar migraciones
php artisan migrate --force

# Iniciar Apache
exec apache2-foreground
