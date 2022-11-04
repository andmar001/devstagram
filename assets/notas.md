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

# Migraciones 
Las migraciones se les conoce como el esquema de la base de datos, es decir, las tablas y sus columnas.
Si se desea agregar una columna a una tabla, se debe crear una migración y ejecutarla, 
Si la migracion no fue correcta se puede revertir
# Crear migración
sail php artisan migrate
sail artisan migrate
# Revertir migración
sail artisan migrate:rollback
# si muchas migraciones se pueden revertir con
sail artisan migrate:rollback --step=5

# otras formas de migrar campos en especifico	
sail artisan make:migration agregar_imagen_user

- las migraciones las encontramos en la carpeta database/migrations
- laravel nos crea por default una tabla llamada 'user' que es la tabla de usuarios
proceso de la creacion 
1. Crear migración
sail artisan migrate
2. Revisar en el mys de dockers con el comando
sail mysql -u
-> show databases;
-> use devstagram;
-> show tables;
-> describe users;
3. Revertir migración
sail php artisan migrate:rollback
-> show tables;    vemos q esta vacia

- primer migracion
sail artisan make:migration add_username_to_user_table

para la creacion de una nueva migracion laravel nos crea la migracion acorde al nombre que le demos, en este caso 'add_username_to_user_table' y nos crea un metodo up() y un metodo down(), donde hara referencia a users.

- Importante correr la migracion, para ver los cambios en la base de datos
sail artisan migrate

# Crear conexión a la base de datos
Los datos de conexión a la base de datos se encuentran en el archivo .env

