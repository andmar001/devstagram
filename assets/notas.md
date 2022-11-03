# Revisar los helpers de laravel php
https://laravel.com/docs/9.x/helpers

# ruta para acceder a los proyectos de laravel
tony@DESKTOP-TONYMONTANA:/mnt/c/php/devstagram$

# artisan
Es el cli de laravel(ya viene agregado), cuenta con scripts con los que podemos crear controladores y vistas.
Artisan es un comando que nos permite crear controladores, modelos, migraciones, etc.
Desde la consola
sail artisan      ----    # Muestra los comandos de artisan

# controladores
https://laravel.com/docs/9.x/controllers#actions-handled-by-resource-controller

make - crea un recurso (controlador, modelo, migración, etc.)
# Crear un controlador 
sail artisan make:controller RegisterController
# crear controlador en una carpeta especifica
sail artisan make:controller Admin/RegisterController

Los contrladores se crean en la carpeta app/Http/Controllers

- ataques cross-site request forgery (CSRF)
Son ataques que se realizan a través de sitios web legítimos en los que el usuario está autenticado. El atacante se hace pasar por el usuario y, por lo tanto, puede realizar acciones en nombre del usuario autenticado. Por ejemplo, el atacante puede enviar un mensaje en nombre del usuario autenticado o realizar una transferencia bancaria.
#csrf 
Es un token que se genera en cada petición y se envía al servidor, el servidor lo valida y si es correcto, se ejecuta la petición.


