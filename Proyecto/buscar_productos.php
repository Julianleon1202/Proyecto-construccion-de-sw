<?php
function buscarProducto($conn) {
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];

    // Consulta SQL para buscar el producto por nombre
    $sql = "SELECT * FROM `productos` WHERE nombre = '$nombre'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {
            // Imprimir los datos del producto
            echo "Nombre: " . $row["nombre"] . "<br>";
            echo "Código: " . $row["codigo"] . "<br>";
            echo "Proveedor: " . $row["proveedor"] . "<br>";
            echo "Precio de compra: " . $row["compra"] . "<br>";
            echo "Precio de venta: " . $row["venta"] . "<br>";
            echo "Descripción: " . $row["descripcion"] . "<br>";
        }
    } else {
        echo "No se encontró ningún producto con ese nombre";
    }
}
}
?>
