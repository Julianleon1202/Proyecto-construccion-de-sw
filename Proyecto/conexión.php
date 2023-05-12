<?php
// Datos de conexión a la base de datos
$servername = "localhost"; // Nombre del servidor
$username = "nombre_usuario"; // Nombre de usuario de la base de datos
$password = "contraseña"; // Contraseña de la base de datos
$dbname = "droguería"; // Nombre de la base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Error al conectar a la base de datos: " . $conn->connect_error);
}
?>
