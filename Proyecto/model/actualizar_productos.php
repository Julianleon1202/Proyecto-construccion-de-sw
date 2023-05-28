<?php

class ProductoUpdater {
    private static $instance;
    private $conn;

    private function __construct($conn) {
        $this->conn = $conn;
    }

    public static function getInstance($conn) {
        if (self::$instance === null) {
            self::$instance = new self($conn);
        }
        return self::$instance;
    }

    public function actualizarProducto() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $codigo = $_POST["codigo"];

            // Verificar si se ingresó un código
            if (empty($codigo)) {
                echo "<script>alert('Por favor, ingresa el código del producto, con los campos que se desean actualizar.');</script>";
                return; // Detener la ejecución del código
            }

            // Consulta SQL para buscar el producto por código
            $sql = "SELECT * FROM `productos` WHERE codigo = '$codigo'";
            $result = $this->conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();

                // Obtener los valores actuales de los campos del producto
                $nombreActual = $row["nombre"];
                $proveedorActual = $row["proveedor"];
                $compraActual = $row["compra"];
                $ventaActual = $row["venta"];
                $descripcionActual = $row["descripcion"];

                // Obtener los nuevos valores de los campos del formulario
                $nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : $nombreActual;
                $proveedor = isset($_POST["proveedor"]) ? $_POST["proveedor"] : $proveedorActual;
                $compra = isset($_POST["compra"]) ? $_POST["compra"] : $compraActual;
                $venta = isset($_POST["venta"]) ? $_POST["venta"] : $ventaActual;
                $descripcion = isset($_POST["descripcion"]) ? $_POST["descripcion"] : $descripcionActual;

                // Consulta SQL para actualizar el producto
                $sql = "UPDATE `productos` SET nombre = IF('$nombre' <> '', '$nombre', nombre), proveedor = IF('$proveedor' <> '', '$proveedor', proveedor), compra = IF('$compra' <> '', '$compra', compra), venta = IF('$venta' <> '', '$venta', venta), descripcion = IF('$descripcion' <> '', '$descripcion', descripcion)
                        WHERE codigo = '$codigo'";

                if ($this->conn->query($sql) === TRUE) {
                    echo "<script>alert('El producto ha sido actualizado correctamente.');</script>";
                } else {
                    echo "Error al actualizar el producto: " . $this->conn->error;
                }
            } else {
                echo "<script>alert('No se encontró ningún producto con ese código.');</script>";
            }
        }
    }
}

class ActualizarProductoFactory {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function create() {
        $conn = $this->conn;

        return function () use ($conn) {
            $updater = ProductoUpdater::getInstance($conn);
            $updater->actualizarProducto();
        };
    }
}

// ...

return new ActualizarProductoFactory($conn);
?>
