<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $codigo = $_POST["codigo"];
    $proveedor = $_POST["proveedor"];
    $compra = $_POST["compra"];
    $venta = $_POST["venta"];
    $descripcion = $_POST["descripcion"];

    // Consulta SQL para insertar un nuevo producto
    $sql = "INSERT INTO productos (nombre, codigo, proveedor, compra, venta, descripcion)
            VALUES ('$nombre', '$codigo', '$proveedor', '$compra', '$venta', '$descripcion')";

    if ($conn->query($sql) === TRUE) {
        echo "Producto agregado correctamente";
    } else {
        echo "Error al agregar el producto: " . $conn->error;
    }
}
?>
