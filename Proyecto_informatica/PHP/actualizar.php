<?php
include 'configurar.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $documento = $_POST['documento'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $curso = $_POST['curso_id'];

    $sql = "UPDATE estudiantes SET nombre='$nombre', apellido='$apellido', documento='$documento', fecha_nacimiento='$fecha_nacimiento',direccion='$direccion',telefono='$telefono', correo='$correo', curso_id='$curso' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Registro actualizado correctamente. <a href='listar.php'>Volver</a>";
    } else {
        echo "Error: " . $conn->error;
    }
}
$conn->close();
?>