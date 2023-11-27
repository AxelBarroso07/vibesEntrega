


<?php
include('db/conexion_db.php');

$sql_select = "SELECT * FROM productos";
$consulta = mysqli_query($conexion, $sql_select);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Productos</title>
    <link rel="stylesheet" href="../css/style-ver-productos.css">
</head>
<body>
    <section class="mostrarProductos">
        <?php
        while ($registro = mysqli_fetch_assoc($consulta)) {
            echo '<div class="producto">
            <div class="image"><img src="../img/productos/'. $registro['imagen'] .'></div>
                    <div class="descripcion">
                        <p class="nombre">' . $registro['nombre'] . '</p>
                        <p class="price">Precio: ' . $registro['precio'] . '</p>
                        <p class="talles">Talles: ' . $registro['talles'] . '</p>
                    </div>
                    <div class="buttons">
                        <button class="editar">Editar</button>
                        <button class="eliminar">Eliminar</button>
                    </div>
                  </div>';
        }
        ?>
    </section>
</body>
</html>
