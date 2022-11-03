# Revisar los helpers de laravel php
https://laravel.com/docs/9.x/helpers

# artisan
Es el cli de laravel(ya viene agregado), cuenta con scripts con los que podemos crear controladores y vistas.
Artisan es un comando que nos permite crear controladores, modelos, migraciones, etc.
Desde la consola
sail artisan      ----    # Muestra los comandos de artisan

make - crea un recurso (controlador, modelo, migración, etc.)
# Crear un controlador 
sail artisan make:controller RegisterController
# crear controlador en una carpeta especifica
sail artisan make:controller Admin/RegisterController

Los contrladores se crean en la carpeta app/Http/Controllers