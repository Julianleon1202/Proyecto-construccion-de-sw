<?php
// Consulta SQL para obtener todos los productos
$sql = "SELECT * FROM productos";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Imprimir una tabla con los productos encontrados
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
} else {
    echo "No se encontraron productos";
}
?>
