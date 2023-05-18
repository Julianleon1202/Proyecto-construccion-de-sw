<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registro de productos</title>
    <link rel="stylesheet" href="style.css">

    <!-- <script>
        function validarFormulario() {
            // Validación del campo Nombre
            var nombre = document.getElementById("nombre").value;
            if (nombre === "") {
                alert("Por favor, ingrese el nombre del producto.");
                return false;
            }
            if (!/^[a-zA-Z\s]+$/.test(nombre)) {
                alert("El nombre del producto solo puede contener letras y espacios.");
                return false;
            }

            // Validación del campo Código
            var codigo = document.getElementById("codigo").value;
            if (codigo === "") {
                alert("Por favor, ingrese el código del producto.");
                return false;
            }
            if (!/^\d{1,5}$/.test(codigo)) {
                alert("El código del producto debe ser un número de máximo 5 dígitos.");
                return false;
            }

            // Validación del campo Proveedor
            var proveedor = document.getElementById("proveedor").value;
            if (proveedor === "") {
                alert("Por favor, ingrese el proveedor del producto.");
                return false;
            }
            if (!/^[a-zA-Z\s]+$/.test(proveedor)) {
                alert("El proveedor del producto solo puede contener letras y espacios.");
                return false;
            }

            // Validación del campo Precio de compra
            var compra = document.getElementById("compra").value;
            if (compra === "") {
                alert("Por favor, ingrese el precio de compra del producto.");
                return false;
            }
            if (!/^\d+(\.\d{1,2})?$/.test(compra)) {
                alert("El precio de compra del producto debe ser un número válido.");
                return false;
            }

            // Validación del campo Precio de venta
            var venta = document.getElementById("venta").value;
            if (venta === "") {
                alert("Por favor, ingrese el precio de venta del producto.");
                return false;
            }
            if (!/^\d+(\.\d{1,2})?$/.test(venta)) {
                alert("El precio de venta del producto debe ser un número válido.");
                return false;
            }

            // Validación del campo Descripción
            var descripcion = document.getElementById("descripcion").value;
            if (descripcion === "") {
                alert("Por favor, ingrese la descripción del producto.");
                return false;
            }

            // Si todas las validaciones son exitosas, se envía el formulario
            return true;
        }
    </script> -->

</head>
<body>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" onsubmit="return validarFormulario();">
        <div class="titulo">
        <h2>Ingrese los datos del producto</h2>
        </div>
        <br>
        <div class="input-container">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" placeholder="Ingrese el nombre del producto">
        </div>

        <div class="input-container">
            <label for="codigo">Código:</label>
            <input type="text" id="codigo" name="codigo" placeholder="Ingrese el código del producto">
        </div>

        <div class="input-container">
            <label for="proveedor">Proveedor:</label>
            <input type="text" id="proveedor" name="proveedor" placeholder="Ingrese el proveedor del producto">
        </div>

        <div class="input-container">
            <label for="compra">Precio de compra:</label>
            <input type="text" id="compra" name="compra" placeholder="Ingrese el precio de compra del producto">
        </div>

        <div class="input-container">
            <label for="venta">Precio de venta:</label>
            <input type="text" id="venta" name="venta" placeholder="Ingrese el precio de venta del producto">
        </div>

        <div class="input-container">
            <label for="descripcion">Descripción:</label>
            <input type="text" id="descripcion" name="descripcion" placeholder="Descripción del producto">
        </div>

        <div class="botones">
        <button type="submit" name="submit" id="agregar" value= "Agregar">Agregar</button>
        <button type="submit" name="submit" id="actualizar" value= "Actualizar">Actualizar</button>
        <button type="submit" name="submit" id="eliminar" value= "Eliminar">Eliminar</button>
        <button type="submit" name="submit" id="buscar" value= "Buscar">Buscar</button>
        <button type="submit" name="submit" id="listar" value= "Listar productos">Listar Productos</button>
        </div>

        <img src="droguería.jpg" alt="Imagen de droguería">
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
         } elseif ($submitValue === "Buscar") {
             include("buscar_productos.php");
             buscarProducto($conn);
         } elseif ($submitValue === "Listar Productos") {
             include("listar_productos.php");
         }
    }
    ?>

</body>
</html>