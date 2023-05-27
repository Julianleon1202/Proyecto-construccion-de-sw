<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registro de productos</title>
    <link rel="stylesheet" href="style.css">

    <script>
        function botonBuscar() {
            var codigo = prompt("Código:");
            if (codigo !== null) {
                document.getElementById('codigo_buscar').value = codigo;
                document.getElementById('formBuscar').submit();
            }
        }

        function limpiarCampos() {
        document.getElementById("codigo").value = "";
        document.getElementById("nombre").value = "";
        document.getElementById("proveedor").value = "";
        document.getElementById("compra").value = "";
        document.getElementById("venta").value = "";
        document.getElementById("descripcion").value = "";
        }
    </script>

</head>
<body>
    <form method="post" action="buscar_productos.php" id="formBuscar">
        <input type="hidden" name="codigo" id="codigo_buscar" value="">
    </form>

    <?php
        $codigoEncontrado = isset($_GET['codigo']) ? $_GET['codigo'] : '';
        $nombreEncontrado = isset($_GET['nombre']) ? $_GET['nombre'] : '';
        $proveedorEncontrado = isset($_GET['proveedor']) ? $_GET['proveedor'] : '';
        $compraEncontrado = isset($_GET['compra']) ? $_GET['compra'] : '';
        $ventaEncontrado = isset($_GET['venta']) ? $_GET['venta'] : '';
        $descripcionEncontrado = isset($_GET['descripcion']) ? $_GET['descripcion'] : '';
    ?>

    <form method="post" action="" id="validaciones">
        <div class="titulo">
            <h2>Ingrese los datos del producto</h2>
        </div>
        <br>
        <div class="input-container">
        <label for="nombre">Nombre:</label>
        <input type="text" pattern="^[A-Za-z\s]+$" title="Ingrese solo letras" id="nombre" name="nombre" placeholder="Ingrese el nombre del producto" value="<?php echo isset($_GET['nombre']) ? $_GET['nombre'] : ''; ?>">
    </div>

    <div class="input-container">
        <label for="codigo">Código:</label>
        <input type="text" pattern="^[0-9]+$" title="Ingrese solo números" id="codigo" name="codigo" placeholder="Ingrese el código del producto" value="<?php echo isset($_GET['codigo']) ? $_GET['codigo'] : ''; ?>">
    </div>

    <div class="input-container">
        <label for="proveedor">Proveedor:</label>
        <input type="text" pattern="^[A-Za-z\s]+$" title="Ingrese solo letras" id="proveedor" name="proveedor" placeholder="Ingrese el proveedor del producto" value="<?php echo isset($_GET['proveedor']) ? $_GET['proveedor'] : ''; ?>">    </div>

    <div class="input-container">
        <label for="compra">Precio de compra:</label>
        <input type="text" pattern="\d{1,5},\d{2}" title="Ingrese un precio válido" id="compra" name="compra" placeholder="Ingrese el precio de compra del producto" onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode === 44 || event.charCode === 46" value="<?php echo isset($_GET['compra']) ? $_GET['compra'] : ''; ?>">
    </div>

    <div class="input-container">
        <label for="venta">Precio de venta:</label>
        <input type="text" pattern="\d{1,5},\d{2}" id="venta" name="venta" placeholder="Ingrese el precio de venta del producto" title="Ingrese un precio válido" onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode === 44 || event.charCode === 46" value="<?php echo isset($_GET['venta']) ? $_GET['venta'] : ''; ?>">
    </div>

    <div class="input-container">
        <label for="descripcion">Descripción:</label>
        <input type="text" maxlength="256" id="descripcion" name="descripcion" placeholder="Ingrese la descripción del producto" value="<?php echo isset($_GET['descripcion']) ? $_GET['descripcion'] : ''; ?>">
    </div>

        <div class="botones">
            <button type="submit" name="submit" id="agregar" value="Agregar">Agregar</button>
            <button type="submit" name="submit" id="actualizar" value="Actualizar">Actualizar</button>
            <button type="submit" name="submit" id="eliminar" value="Eliminar">Eliminar</button>
            <button type="button" name="submit" id="buscar" value="Buscar" onclick="botonBuscar()">Buscar</button>
            <button type="submit" name="submit" id="listar" value="Listar productos">Listar Productos</button>
            <button type="button" onclick="limpiarCampos()" class="limpiar">Limpiar</button>

            <img src="droguería.jpg" alt="Imagen de droguería">
        </div>
    </form>

    <div id="productos"></div>

    <?php

    
    include("conexion.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
        $submitValue = $_POST["submit"];
        if ($submitValue === "Agregar") {
            include("agregar_productos.php");
            agregarProducto($conn);
        } elseif ($submitValue === "Actualizar") {
            include("actualizar_productos.php");
            actualizarProducto($conn);
        } elseif ($submitValue === "Eliminar") {
            include("eliminar_productos.php");
            eliminarProducto($conn);
        } elseif ($submitValue === "Listar productos") {
             include("listar_productos.php");
             listarProductos($conn);
     }
}
    ?>
</body>
</html>
