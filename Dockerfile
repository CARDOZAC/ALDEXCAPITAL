# Usamos la imagen oficial de PHP 8.2 con Apache integrado
FROM php:8.2-apache

# Habilitamos mod_rewrite de Apache (crucial para URLs limpias y enrutamiento)
RUN a2enmod rewrite

# Copiamos todo el código fuente del proyecto al directorio web de Apache
COPY . /var/www/html/

# Configuramos los permisos adecuados para los archivos
RUN chown -R www-data:www-data /var/www/html

# Exponemos el puerto 80
EXPOSE 80

# Ajustamos la configuración de Apache para que escuche en el puerto dinámico que asigna Render ($PORT)
CMD sed -i "s/80/$PORT/g" /etc/apache2/ports.conf /etc/apache2/sites-available/000-default.conf && apache2-foreground