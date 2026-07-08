# Instrucciones de instalación y ejecución del proyecto en Windows
## 📋 Requisitos Previos

Antes de ejecutar el proyecto, deberá de tener instalado lo siguiente:

* **PHP:** Versión 8.0 o superior.
* **Servidor Web:** Apache (XAMPP, WAMP, etc.).
* **Base de Datos:** MySQL.

## Instalación
### 1. Descargar el proyecto
Copia la carpeta del proyecto dentro del directorio raíz de tu servidor web.

* **Ejemplo para XAMPP:** `C:\xampp\htdocs\color-change-log`

### 2. Crear la base de datos
1. Accede a tu gestor de base de datos (por ejemplo: phpMyAdmin o MySQL Workbench).
2. Crear una base de datos con el nombre `rhombus_color`.
3. Importar o ejecutar el SQL: `rhombus_color_logs_rhombus.sql`.

### 3. Configurar la conexión
Editar el archivo: config/databaseConnect.php y configurar con las credenciales correspondientes de tu servidor.

## Iniciar los servicios
Desde el panel de control de XAMPP o la herramienta utilizada iniciar los siguientes dos servicios:
**Apache**
**MySQL**

## Ejecución
Abrir el navegador y acceder a: http://localhost/color-change-log/
