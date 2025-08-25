<?php
include 'configurar.php';

// 🔹 Capturar el curso si se selecciona desde el filtro
$curso = isset($_GET['curso']) ? $_GET['curso'] : '';

// 🔹 Consulta SQL según el filtro
if ($curso != '') {
    $sql = "SELECT * FROM estudiantes WHERE curso_id='$curso' ORDER BY apellido, nombre";
} else {
    $sql = "SELECT * FROM estudiantes ORDER BY curso_id, apellido, nombre";
}
$result = $conn->query($sql);
?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Estudiantes</title>
    <link rel="stylesheet" href="../CSS/styles.css">
</head>
<body>
<header>
    <h1>Lista de Estudiantes</h1>
    <nav>
        <a href="index.html">Inicio</a>
        <a href="registro.html">Registrar Estudiante</a>
    </nav>
</header>
<main>
        <form method="GET" action="listar.php">
        <label>Seleccionar curso:</label>
        <select name="curso">
            <option value="">Todos</option>
            <option value="1" <?php if($curso=='1') echo 'selected'; ?>>1°</option>
            <option value="2" <?php if($curso=='2') echo 'selected'; ?>>2°</option>
            <option value="3" <?php if($curso=='3') echo 'selected'; ?>>3°</option>
            <option value="4" <?php if($curso=='4') echo 'selected'; ?>>4°</option>
            <option value="5" <?php if($curso=='5') echo 'selected'; ?>>5°</option>
            <option value="6" <?php if($curso=='6') echo 'selected'; ?>>6°</option>
            <option value="7" <?php if($curso=='7') echo 'selected'; ?>>7°</option>
            <option value="8" <?php if($curso=='8') echo 'selected'; ?>>8°</option>
            <option value="9" <?php if($curso=='9') echo 'selected'; ?>>9°</option>
            <option value="10" <?php if($curso=='10') echo 'selected'; ?>>10°</option>
            <option value="11" <?php if($curso=='11') echo 'selected'; ?>>11°</option>
        </select>
        <button type="submit">Filtrar</button>
    </form>

    <?php
    $curso_actual = "";
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            // Si cambia el curso, creamos un bloque nuevo
            if ($curso_actual != $row["curso_id"]) {
                if ($curso_actual != "") {
                    echo "</tbody></table>";
                }
                $curso_actual = $row["curso_id"];
            echo "<h2>Curso: " . $curso_actual . "</h2>";
            echo "<table border='1'>
                    <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Documento</th>
                <th>Fecha de nacimiento</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>Correo Electronico</th>
                <th>Curso</th>
                <th>Acciones</th>
                    </tr>";
        }
        echo "<tr>
                    <td>".$row["id"]."</td>
                    <td>".$row["nombre"]."</td>
                    <td>".$row["apellido"]."</td>
                    <td>".$row["documento"]."</td>
                    <td>".$row["fecha_nacimiento"]."</td>
                    <td>".$row["direccion"]."</td>
                    <td>".$row["telefono"]."</td>
                    <td>".$row["correo"]."</td>
                    <td>".$row["curso_id"]."</td>
                <td>
                    <a href='editar.php?id=".$row["id"]."'>Editar</a> | 
                    <a href='eliminar.php?id=".$row["id"]."'>Eliminar</a>
                </td>
            </tr>";
    }
    echo "</table>";
} else {
    echo "No hay estudiantes registrados.";
}
    ?>
        </tbody>
    </table>
</main>
</body>
</html>
<?php $conn->close(); ?>