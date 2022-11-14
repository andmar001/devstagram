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

cuando colocamos nuestra ruta como un post tenemos acceso a la directiva csrf la cual nos ayuda a evitar los ataques csrf

->remember nos ayuda a recordar la sesión del usuario, esta para cuando el usuario se loguea y cierra el navegador, al volver a ingresar, no tenga que volver a loguearse. 
Una vez que agregamos este método, tenemos que agregar la directiva @csrf en el formulario para que el token sea enviado al servidor.


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

# El campo del modelo fillable, es para indicar que campos se pueden llenar desde el formulario, si no se indica, no se podra llenar el campo desde el formulario.

# hash de contraseñas -facades
Hash::make($request->password)
Los facades son clases que nos permiten acceder a métodos estáticos de clases sin necesidad de instanciarlas.

# helpers de laravel
- lower 
La funcion lower de laravel, nos permite convertir una cadena a minusculas
- slug
La funcion slug de laravel, nos permite convertir una cadena a minusculas y remplazar los espacios por guiones (tony tolver) pasa a  (tony-tolver)
sin embargo slug no valida registros duplicados.


- revertir la ultima migracion
$ sail php artisan migrate:rollback --step=1
- agregar de nuevo los cambios
$ sail php artisan migrate

# refrescar la base de datos, eliminar todos los datos y volver a crearlos, limpia la base de datos y la vuelve a crear
-  sail php artisan migrate:refresh

el atributo unique dontro de la migracion, es para indicar que el campo debe ser unico, es decir, no se puede repetir en la tabla.
por ejemplo los usuarios de twitter, no pueden tener el mismo nombre de usuario.


# Autenticación
auth()->user()  # nos devuelve el usuario autenticado, se ejcuta una vez que hacemos el post del login, el objeto "attributes" contiene los datos del usuario autenticado

dd() es una funcion de laravel que nos permite ver el contenido de una variable, es como un var_dump() de php 

# route model binding
- laravel nos permite pasar el modelo como parametro en la ruta, y laravel lo busca en la base de datos y lo pasa como parametro al controlador
La ruta se asocia a un modelo, y laravel busca el modelo en la base de datos y lo pasa como parametro al controlador

## Crear modelo
 sail artisan make:model Post

## Crear migración
sail artisan make:migration create_posts_table

# creacion de modelo, migracion, controlador y factory
sail artisan make:model --migration --controller --factory Post

# realizar la migracion
sail artisan migrate

# factory
sail artisan make:factory PruebaFactory
- El factory nos permite crear registros de prueba
- podemos verificar que el tipo de dato sea el correcto

- realizar la prueba
# sail artisan tinker               --> nos permite ejecutar codigo php, como editor nano
 
salida de la prueba 
>>> $usuario = User::find(5);                         ------> ingresar un usuario existente
=> App\Models\User {#4665
     id: 5,
     name: "Lord Java",
     email: "react@gmail.com",
     email_verified_at: null,
     #password: "$2y$10$nuwk4EE6jLhNKhcfDPdvSeaUfabXYRW.EbU4GJqt1657tFFUXAl4i",
     #remember_token: null,
     created_at: "2022-11-04 02:58:17",
     updated_at: "2022-11-04 02:58:17",
     username: "react-boss",
   }

# ejecucion de la prueba del post factory

>>> Post::factory()->times(200);             ---> crea 200 registros de prueba


// sentence crea un enunciado aleatorio
// ejemplo
- colocar id de usuario existente para realizar las pruebas
// tony@DESKTOP-TONYMONTANA:/mnt/c/php/devstagram$ sail artisan tinker
// Psy Shell v0.11.8 (PHP 8.1.12 — cli) by Justin Hileman
// >>> Post::factory()->times(200)->create();
// [!] Aliasing 'Post' to 'App\Models\Post' for this Tinker session.
// => Illuminate\Database\Eloquent\Collection {#3715
//      all: [
//        App\Models\Post {#3744
//          titulo: "Explicabo aperiam expedita fugiat dolores amet.",
//          descripcion: "Inventore facere aspernatur quia qui nulla quas est eum ipsa assumenda et harum eligendi dicta voluptatem sunt autem consequuntur et officiis iusto ipsa unde.",
//          imagen: "16903384-7972-3a85-87fd-29713b57d5d1.jpg",
//          user_id: 4,
//          updated_at: "2022-11-14 02:43:41",
//          created_at: "2022-11-14 02:43:41",
//          id: 20,
//        },
//        App\Models\Post {#3738
//          titulo: "Expedita consequatur sit fugit.",
//          descripcion: "Impedit maxime voluptas aut et nobis et rerum vel dolor aut enim nostrum sunt tempora et officiis quia rerum non accusamus.",
//          imagen: "ad01e585-5cec-3da3-8a1a-acc8dc07a838.jpg",
//          user_id: 8,
//          updated_at: "2022-11-14 02:43:41",
//          created_at: "2022-11-14 02:43:41",
//          id: 21,
//        },}

- notas usar factory solo en entornos de desarrollo, no en produccion ya que los servicio cobran por el uso de la base de datos

# Con esta instrucion llenamos nuestra base de datos con 200 registros de prueba, realizando la union entre las tablas de usuarios y posts

- si deseamos revertir la migracion por algun error en la creacion de los registros de prueba, podemos ejecutar el siguiente comando
sail artisan migrate:rollback --step=1