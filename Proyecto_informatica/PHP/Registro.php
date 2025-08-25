<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Estudiante</title>
    <link rel="stylesheet" href="../CSS/styles.css">
</head>
<body>
<header>
    <h1>Registrar Estudiante</h1>
    <nav>
        <a href="index.php">Inicio</a>
        <a href="listar.php">Ver Estudiantes</a>
    </nav>
</header>
<main>
    <form class="formulario" action="procesar_registro.php" method="POST">
        <label>Nombre:
            <input type="text" name="nombre" required>
        </label>
        <label>Apellido:
            <input type="text" name="apellido" required>
        </label>
        <label>Documento:
            <input type="number" name="documento" required>
        </label>
        <label>Fecha de nacimiento:
            <input type="date" name="fecha_nacimiento" required>
        </label>
        <label>Género:
            <select name="genero" required>
                <option value="Masculino">Masculino</option>
                <option value="Femenino">Femenino</option>
                <option value="Otro">Otro</option>
            </select>
        </label>
        <label>Dirección:
            <input type="text" name="direccion" required>
        </label>
        <label>Teléfono:
            <input type="number" name="telefono" required>
        </label>
        <label>Correo:
            <input type="email" name="correo" required>
        </label>
        <label>Curso:
            <input type="text" name="curso" required>
        </label>
        <button type="submit">Registrar</button>
    </form>
</main>
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
</body>
</html>