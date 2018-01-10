# cevideo

Pasos de instalación:

1.- Configurar servidor con ubuntu 16.04

2.- Seguir todos los pasos del tutorial: https://www.digitalocean.com/community/tutorials/how-to-install-linux-apache-mysql-php-lamp-stack-on-ubuntu-16-04
En este se instalan:
* Apache
* MySQL
* PHP 

3.- Instalar github y clonar repositorio https://github.com/oscardaniel88/cevideo

4.- Entrar a mysql, crear usuario aplicat8_cevideo con contraseña V4adnx&2)GdT con permisos,  crear una base de datos que se llame aplicat8_cevideo y correr en orden comandos del archivo sql.sql en orden.

5.- Modificar el archivo sudo nano /etc/php/7.0/apache2/php.ini
y poner: 
memory_limit = 512M
upload_max_filesize = 500M
post_max_size = 512M

6.- Correr estos comandos:
sudo apt-get update
sudo apt-get install ffmpeg
