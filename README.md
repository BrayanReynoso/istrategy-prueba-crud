# Proyecto CRUD de Usuarios con Inicio de Sesión

Este proyecto es una aplicación web sencilla que permite la gestión de usuarios mediante un CRUD (Crear, Leer, Actualizar, Eliminar). Además, incluye la funcionalidad de inicio de sesión para controlar el acceso de los usuarios registrados. La aplicación está desarrollada utilizando PHP para el backend y Bootstrap para el frontend.

## Características

- **Gestión de Usuarios:**
  - Crear nuevos usuarios.
  - Leer la lista de usuarios.
  - Actualizar la información de usuarios existentes.
  - Eliminar usuarios de la base de datos.
  
- **Autenticación:**
  - Inicio de sesión para usuarios registrados.
  - Control de acceso basado en sesiones.
  
## Tecnologías Utilizadas

- **Backend:** PHP (con PDO para la conexión a la base de datos).
- **Frontend:** Bootstrap 4 para el diseño y la interfaz de usuario.
- **Base de Datos:** MySQL para almacenar la información de los usuarios.
  
## Requisitos Previos

Asegúrate de tener instalados los siguientes componentes en tu entorno de desarrollo:

- PHP >= 7.0
- MySQL
- Servidor Web (como Apache o Nginx)

## Instalación

1. **Clonar el repositorio:**

   ```bash
   git clone https://github.com/BrayanReynoso/istrategy-prueba-crud.git
   cd istrategy-prueba-crud
   
## Configuración 

   **Configurar el Archivo de Configuración:**
     configurar la base de datos:

     - Crea una base de datos en MySQL llamada db_istrategy (o el nombre que prefieras).
     - Importa el archivo create_table.sql para crear la tabla de usuarios. Este archivo contiene la estructura necesaria de la base de datos.
  
  **Configurar la conexión a la base de datos:**

    - Algunos archivos como login_process.php requieren que la modificación directa de las KEY para la conexiona la base de datos.
    - Edita el archivo config/db_conexion.php y ajusta los valores de conexión a la base de datos según tu entorno:

    - Ejemplo de KEY´S:

      $servername = "localhost";
      $username = "root";
      $password = "tu_contraseña";
      $dbname = "db_istrategy";
    

### Uso

```markdown
## Uso

1. **Pantalla principal:**

   - Accede a la página principal en `http://localhost/prueba-Istrategy/public/` para acceder a la pantalla principal index.

2. **Inicio de Sesión:**

   - Accede a la página de inicio de sesión en `http://localhost/prueba-Istrategy/public/pages/login.php` para iniciar sesión en tu cuenta.

3. **Gestión de Usuarios:**

   - No requiere de inico de sesión, accede a `http://localhost/prueba-Istrategy/public/pages/home.php` para gestionar los usuarios existentes (crear, leer, actualizar, eliminar).

3. **Ingresar a tu perfil:**

   - No se puede visualizar el perfil sin una sesión previa.

   - Accede mediante correo y contraseña en `http://localhost/prueba-istrategy/public/pages/profile.php` para iniciar sesión en tu cuenta.
