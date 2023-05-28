<?php

class ListarProductos {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function execute() {
        $sql = "SELECT * FROM `productos`";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<html>";
            echo "<head>";
            echo "<title>Listado de Productos</title>";
            echo "<style>";
            echo "table {";
            echo "    width: 100%;";
            echo "    border-collapse: collapse;";
            echo "}";

            echo "table th, table td {";
            echo "    border: 1px solid black;";
            echo "    padding: 8px;";
            echo "}";

            echo "</style>";
            echo "</head>";
            echo "<body>";

            echo "<h2>Listado de Productos</h2>";
            echo "<table>";
            echo "<tr><th>Nombre</th><th>Código</th><th>Proveedor</th><th>Precio de compra</th><th>Precio de venta</th><th>Descripción</th></tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["nombre"] . "</td>";
                echo "<td>" . $row["codigo"] . "</td>";
                echo "<td>" . $row["proveedor"] . "</td>";
                echo "<td>" . $row["compra"] . "</td>";
                echo "<td>" . $row["venta"] . "</td>";
                echo "<td>" . $row["descripcion"] . "</td>";
                echo "</tr>";
            }

            echo "</table>";
            echo '<meta http-equiv="refresh" content="15; url=../view/index.php" />';

            echo "</body>";
            echo "</html>";
        } else {
            echo "No se encontraron productos";
        }
    }
}

class ListarProductosFactory {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function create() {
        return new ListarProductos($this->conn);
    }
}

return new ListarProductosFactory($conn);


?>
