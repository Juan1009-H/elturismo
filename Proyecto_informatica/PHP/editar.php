<?php
include 'configurar.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM estudiantes WHERE id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Estudiante</title>
    <link rel="stylesheet" href="../CSS/styles.css">
</head>
<body>
<header>
    <h1>Editar Estudiante</h1>
</header>
<main>
    <form class="formulario" action="actualizar.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <label>Nombre:
            <input type="text" name="nombre" value="<?php echo $row['nombre']; ?>" required>
        </label>
        <label>Apellido:
            <input type="text" name="apellido" value="<?php echo $row['apellido']; ?>" required>
        </label>
        <label>Documento:
            <input type="number" name="documento" value="<?php echo $row['documento']; ?>" required>
        </label>
        <label>Fecha de nacimiento:
            <input type="date" name="fecha_nacimiento" value="<?php echo $row['fecha_nacimiento']; ?>" required>
        </label>
        <label>Dirección:
            <input type="text" name="direccion" value="<?php echo $row['direccion']; ?>" required>
        </label>
        <label>Teléfono:
            <input type="number" name="telefono" value="<?php echo $row['telefono']; ?>" required>
        </label>
        <label>Correo:
            <input type="email" name="correo" value="<?php echo $row["correo"]; ?>" required>
        </label>
        <label>Curso:
            <input type="text" name="curso_id" value="<?php echo $row['curso_id']; ?>">
        </label>
        <button type="submit">Actualizar</button>
    </form>
</main>
</body>
</html>