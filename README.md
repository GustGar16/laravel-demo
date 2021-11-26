## Acerca del modulo

Se cuenta con 3 CRUD realizados con Livewire:

- Usuarios
- Clientes
- Ciudades

Cada uno de estos cuenta con su migración y seeder correspondiente

## Usuario test

Se hizo la carga de un usuario de prueba:
- email: user@test.com
- password: password

## Correr Migraciones y Seeder

Se integró un comando especial para correr las migraciones y seeders: 
- php artisan run:schedule_db

### Extra

- Al agregar un usuario desde el modulo se hara el envio de un correo electronico para la confirmación de cuenta.
- Se hizo validación de una sola activación de cuenta, si la cuenta ya esta activa arrojará un error 404.

