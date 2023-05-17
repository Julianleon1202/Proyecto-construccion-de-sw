<?php
function agregarProducto($conn) {
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["submit"])) {
        $nombre = $_POST["nombre"];
        $codigo = $_POST["codigo"];
        $proveedor = $_POST["proveedor"];
        $compra = $_POST["compra"];
        $venta = $_POST["venta"];
        $descripcion = $_POST["descripcion"];

        // Verificar si el producto ya existe en la base de datos
        $sql = "SELECT * FROM `productos` WHERE `codigo` = '$codigo'";
        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
           // echo "El producto ya existe en la base de datos";
        } else {
            // Consulta SQL para insertar un nuevo producto
            $sql = "INSERT INTO `productos` (`nombre`, `codigo`, `proveedor`, `compra`, `venta`, `descripcion`)
                    VALUES ('$nombre', '$codigo', '$proveedor', '$compra', '$venta', '$descripcion')";

            if ($conn->query($sql) === TRUE) {
                echo "Producto agregado correctamente";
            } else {
                echo "Error al agregar el producto: " . $conn->error;
            }
        }
    }
}

// Llamar a la función para agregar el producto
agregarProducto($conn);
?>