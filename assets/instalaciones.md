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