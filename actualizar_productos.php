<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];

    // Consulta SQL para buscar el producto por nombre
    $sql = "SELECT * FROM productos WHERE nombre = '$nombre'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        // Actualizar los campos del producto con los valores recibidos del formulario
        $codigo = $_POST["codigo"];
        $proveedor = $_POST["proveedor"];
        $compra = $_POST["compra"];
        $venta = $_POST["venta"];
        $descripcion = $_POST["descripcion"];

        // Consulta SQL para actualizar el producto
        $sql = "UPDATE productos SET codigo = '$codigo', proveedor = '$proveedor', compra = '$compra', venta = '$venta', descripcion = '$descripcion'
                WHERE nombre = '$nombre'";

        if ($conn->query($sql) === TRUE) {
            echo "Producto actualizado correctamente";
        } else {
            echo "Error al actualizar el producto: " . $conn->error;
        }
    } else {
        echo "No se encontró ningún producto con ese nombre";
    }
}
?>
