<?php
include './db/conexion_db.php';
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style-productos-section.css">
    <link rel="stylesheet" href="../css/style-header.css">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>

<body>

    <section id="productos">
    <?php include 'includes/header.php'; ?>


        <div class="search-container">
      
        <div id="buscador">
        <input type="text"  class="search" placeholder ="buscar productos" name="buscar_prod" id="buscar" onkeyup="buscar_prod($('#buscar').val());" >
        </div>
   
        <div id="datos_buscador"></div>
       
        </div>

        <div class="image-container">
            <?php
            $sql_select = "SELECT * FROM productos";
            $consulta = mysqli_query($conexion, $sql_select);

            if (mysqli_num_rows($consulta) == 0) {
                echo '<div class="mensaje-error">No hay productos registrados </div>';
            } else {
                while ($registro = mysqli_fetch_assoc($consulta)) {
                    echo '<div class="grid-container">
                            <a href="detalles_producto.php?id=' . $registro['id_producto'] . '">
                                <img src="../img/productos/' . $registro['imagen'] . '" alt="producto">
                            </a>
                        </div>';
                }
            }
            ?>
        </div>

    </section>
    <script src="../js/buscador.js"></script>
</body>

</html>
