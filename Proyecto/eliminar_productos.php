<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];

    // Consulta SQL para eliminar el producto por nombre
    $sql = "DELETE FROM productos WHERE nombre = '$nombre'";

    if ($conn->query($sql) === TRUE) {
        echo "Producto eliminado correctamente";
    } else {
        echo "Error al eliminar el producto: " . $conn->error;
    }
}
?>
