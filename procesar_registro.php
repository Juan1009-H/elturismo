<?php
include 'configurar.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $documento = $_POST['documento'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $genero = $_POST['genero'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $curso = $_POST['curso'];

    $sql = "INSERT INTO estudiantes (nombre, apellido, documento, fecha_nacimiento, genero, direccion, telefono, correo, curso_id)
            VALUES ('$nombre', '$apellido', '$documento', '$fecha_nacimiento', '$genero', '$direccion', '$telefono', '$correo', '$curso')";

    if ($conn->query($sql) === TRUE) {
        echo "Estudiante registrado correctamente. <a href='listar.php'>Ver lista</a>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>
