<?php
function actualizarProducto($conn) {
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $codigo = $_POST["codigo"];

    // Consulta SQL para buscar el producto por nombre
    $sql = "SELECT * FROM `productos` WHERE codigo = '$codigo'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        // Actualizar los campos del producto con los valores recibidos del formulario
        $nombre = $_POST["nombre"];
        $proveedor = $_POST["proveedor"];
        $compra = $_POST["compra"];
        $venta = $_POST["venta"];
        $descripcion = $_POST["descripcion"];

        // Consulta SQL para actualizar el producto
        $sql = "UPDATE `productos` SET nombre = '$nombre', proveedor = '$proveedor', compra = '$compra', venta = '$venta', descripcion = '$descripcion'
                WHERE codigo = '$codigo'";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('El producto ha sido actualizado correctamente.');</script>";
        } else {
            echo "Error al actualizar el producto: " . $conn->error;
        }
    } else {
        echo "<script>alert('No se encontró ningún producto con ese código.');</script>";;
    }
}
}
?>
