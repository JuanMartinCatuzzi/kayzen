<p> Instalación: </p>
<p> Ejecutar el comando composer install.
Modificar el nombre del archivo .env.example a .env, ejecutar "php artisan key:generate", y conectar con la db.
Correr migraciones con "php artisan migrate"</p>
<p>Al crear un usuario, para ser administrador, modificar el dato 'role' en la tabla users de 'OPERATOR' a 'ADMIN'</p>
