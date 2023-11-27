<?php
include('backend/db/conexion_db.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="css/style-index.css">
    <title>Vibes</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>

<body>

    <section id="home" class="contenido">
        <?php
        include 'includes/header.php';
        ?>
    </section>
    <section id="productos" >

    <div class="search-container">
    <form action="#" method="get">
    <div class="search-container">
        <input type="search" placeholder="Search products" class="search" name="buscar_prod" id="buscar_prod" onkeyup="buscar_prod($('#buscar_prod').val());">
        <div id="datos_buscador"></div>
    </div>
    </form>
    <details>
        <summary>Categoria</summary>
        <ul>
            <li>
                <input type="checkbox" id="opcion1" name="categorias[]" value="buzos">
                <label for="opcion1">Buzos</label>
            </li>
            <li>
                <input type="checkbox" id="opcion2" name="categorias[]" value="pantalones">
                <label for="opcion2">Pantalones</label>
            </li>
            <!-- Puedes agregar más checkboxes y etiquetas aquí -->
        </ul>
    </details>

        </div>

      
    <?php

$sql_select = "SELECT * FROM productos";

$consulta = mysqli_query($conexion, $sql_select);

if (mysqli_num_rows($consulta) == 0) {

    echo '<div class="mensaje-error">No hay productos registrados </div>';

} else {

    

    while ($registro = mysqli_fetch_assoc($consulta)) {


        echo '

        <div class="image-container">

                <a href="./backend/detalles_producto.php?id=' . $registro['id_producto'] . '">

                    <img src="img/productos/' . $registro['imagen'] . '" alt="producto">

                </a>

                </div>
                ';
    }



}

?>


   
</section>

<section id="contacto" class="contacto">
    <?php include('./includes/contacto.html'); ?>
</section>







<script src="js/buscador.js"></script>
</body>

</html>






