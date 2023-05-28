<?php
include("../controller/conexion.php");

function buscarProducto($conn) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $codigo = $_POST["codigo"];

        $query = "SELECT * FROM `productos` WHERE codigo = '$codigo'";
        $result = mysqli_query($conn, $query);

        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                
                echo "<html>";
                echo "<head>";
                echo "<title>Resultado de búsqueda</title>";
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
                
                echo "<h1>Resultado de búsqueda</h1>";
                echo "<table>";
                echo "<tr>";
                echo "<th>Código</th>";
                echo "<th>Nombre</th>";
                echo "<th>Proveedor</th>";
                echo "<th>Precio de compra</th>";
                echo "<th>Precio de venta</th>";
                echo "<th>Descripción</th>";
                echo "</tr>";

                echo "<tr>";
                echo "<td>" . $row['codigo'] . "</td>";
                echo "<td>" . $row['nombre'] . "</td>";
                echo "<td>" . $row['proveedor'] . "</td>";
                echo "<td>" . $row['compra'] . "</td>";
                echo "<td>" . $row['venta'] . "</td>";
                echo "<td>" . $row['descripcion'] . "</td>";
                echo "</tr>";

                echo "</table>";
                
                echo "</body>";
                echo "</html>";
                
                echo '<meta http-equiv="refresh" content="5; url=../view/index.php?codigo=' . $row['codigo'] . '&nombre=' . $row['nombre'] . '&proveedor=' . $row['proveedor'] . '&compra=' . $row['compra'] . '&venta=' . $row['venta'] . '&descripcion=' . $row['descripcion'] . '" />';
                echo '<br/>';
                echo '<br/>';
                echo '<br/>';
                echo 'En 5 segundos, será redireccionado a la página principal...';
            } else {
                echo "No se encontraron productos con el código: " . $codigo;
                echo '<meta http-equiv="refresh" content="5; url=../view/index.php" />';
                echo '<br/>';
                echo '<br/>';
                echo '<br/>';
                echo 'En 5 segundos, será redireccionado a la página principal...';
            }
        } else {
            echo "Error en la consulta: " . mysqli_error($conn);
        }
    }
}
$buscarProducto = buscarProducto($conn);

class BuscarProductoFactory {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function create() {
        return function() {
            buscarProducto($this->conn);
        };
    }
}

return new BuscarProductoFactory($conn);

?>
