<?php
$servername = "localhost";
$username = "root"; // Cambiar si tienes otro usuario
$password = ""; // Coloca tu contraseña de MySQL si aplica
$dbname = "registro_estudiantes";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
