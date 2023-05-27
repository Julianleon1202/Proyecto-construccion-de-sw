<?php
function eliminarProducto($conn) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $codigo = $_POST["codigo"];

        // Consulta SQL para eliminar el producto por código
        $sql = "DELETE FROM `productos` WHERE codigo = '$codigo'";

        if ($conn->query($sql) === TRUE) {
            if ($conn->affected_rows > 0) {
                echo "<script>alert('El producto ha sido eliminado de la base de datos.');</script>";
            } else {
                echo "<script>alert('No se encontró ningún producto con ese código.');</script>";
            }
        } else {
            echo "Error al eliminar el producto: " . $conn->error;
        }
    }
}
?>