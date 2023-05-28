<?php

class AgregarProductoFactory {
    public function create($conn) {
        return new AgregarProducto($conn);
    }
}

class AgregarProducto {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function execute() {
        $nombre = $_POST["nombre"];
        $codigo = $_POST["codigo"];
        $proveedor = $_POST["proveedor"];
        $compra = $_POST["compra"];
        $venta = $_POST["venta"];
        $descripcion = $_POST["descripcion"];

        if (empty($nombre) || empty($codigo) || empty($proveedor) || empty($compra) || empty($venta) || empty($descripcion)) {
            echo "<script>alert('Debe rellenar todos los campos.');</script>";
            return;
        }

        // Verificar si el producto ya existe en la base de datos
        $sql = "SELECT * FROM `productos` WHERE `codigo` = '$codigo'";
        $result = $this->conn->query($sql);

        if ($result && $result->num_rows > 0) {
            echo "<script>alert('El producto ya existe en la base de datos.');</script>";
        } else {
            // Consulta SQL para insertar un nuevo producto
            $sql = "INSERT INTO `productos` (`nombre`, `codigo`, `proveedor`, `compra`, `venta`, `descripcion`)
                    VALUES ('$nombre', '$codigo', '$proveedor', '$compra', '$venta', '$descripcion')";

            if ($this->conn->query($sql) === true) {
                echo "<script>alert('El producto ha sido agregado a la base de datos.');</script>";
            } else {
                echo "Error al agregar el producto: " . $this->conn->error;
            }
        }
    }
}

return new AgregarProductoFactory();
?>