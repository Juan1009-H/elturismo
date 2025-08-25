<?php
include 'configurar.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM estudiantes WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Registro eliminado correctamente. <a href='listar.php'>Volver</a>";
    } else {
        echo "Error al eliminar: " . $conn->error;
    }
}
$conn->close();
?>
