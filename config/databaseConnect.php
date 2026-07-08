<?php
// Datos de conexión a la base de datos
$servername = "mysql";
$database = "rhombus_color";
$username = "root";
$password = getenv('MYSQL_ROOT_PASSWORD');

// Crear conexión a la base de datos
$conn = mysqli_connect($servername, $username, $password, $database);

// Comprobar la conexión
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>