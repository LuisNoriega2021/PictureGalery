# Galeria de Fotografia
 
  
Este proyecto pretende demostrar los conocimientos adquiridos durante el curso de capacitacion de laravel, utilizando un base de datos y endpoints integrados en el proyecto asi como la IU necesaria.

El presente proyecto consta de:
- Base de datos: galerydb
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=galerydb
    DB_USERNAME=root
    DB_PASSWORD=2QmYM6MKNEMKpiAbqgBv
- servicios API
    CollectionsController = endpoints CRUD de las galerias
    ImagenesController = endpoints CRUD de las imagenes

- trazabilidad de las acciones
    contiene una tabla logs en la cual se va registrando las actividades del usuario.
    contiene el servicio de login, envio de texto y restablecer contraseña
  
## Instalación

1. Clona este repositorio: `git clone https://github.com/LuisNoriega2021/PictureGalery.git`
2. Accede al directorio del proyecto: `cd picture-galery`
3. Instala las dependencias: `composer install`
3. Instala las dependencias: `npm install`
4. Instala las dependencias: `npm install bootstrap`
5. Genera la clave de la aplicación: `php artisan key:generate`
6. Ejecuta las migraciones: `npm run dev`
7. Ejecuta el servidor local: `php artisan serve`
8. usuario de ingreso: `prueba@gmail.com`
9. contraseña: `asd123456.`

## Tecnologías

- Laravel
- PHP
- MySQL
- HTML
- CSS
- JavaScript
 
