# repo
https://github.com/codigoconjuan/devstagram
# nota importante 
Siempre ir a la carpeta de devstagram una vez que ingresas al wsl

# instalacion de taildwind   ->> Las instalaciones las podemos hallar en "package.json" 
./vendor/bin/sail npm install -D tailwindcss postcss autoprefixer
- Ejecutar taildwind
./vendor/bin/sail npx tailwindcss init -p

Esta instruccion crea el archivo de tailwind config

En el archivo de tailwind es donde configuramos donde queremos aplicar los esltilos de la librería

arrancamos los estilos de tailwind  (desde otra terminal)
- sail npm run dev

# validaciones para el formulario de registro
laradevs
laravel-valdiation-en-español - https://github.com/MarcoGomesr/laravel-validation-en-espanol
clonar en la carpeta de resources/lang/es
git clone https://github.com/MarcoGomesr/laravel-validation-en-espanol.git resources/lang/es

En el controlador la opcion width es para que se muestre el error en el formulario
De controlador a vista (controller - blade.php)

- para configurar a español vamos a "config/app.php" y cambiamos el locale a "es"

novalidate - para que no valide el formulario, para que sea desde le servidor

password_confirmation - para que el usuario confirme la contraseña
la validacion para confirmar la contraseña se agrega como "confirmed".

# Controladores
sail php artisan make:controller PostController
sail php artisan make:controller LoginController

# iconos
heroiicons.com