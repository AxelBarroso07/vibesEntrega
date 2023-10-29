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
    <link href="https://fonts.googleapis.com/css2?family=Days+One&family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="css/style-index.css">
    <title>Document</title>
</head>

<body>




    <header>
        <?php include('./includes/header.php'); ?>
    </header>
    <section id="home" class="contenido">

    </section>

    <section id="productos" class="productos">
        <?php
        $sql_select = "SELECT * FROM productos";
        $consulta = mysqli_query($conexion, $sql_select);
        if (mysqli_num_rows($consulta) == 0) {
            echo 'No hay productos registrados';
        } else {
            while ($registro = mysqli_fetch_assoc($consulta)) {
                echo '
                         <div class="container">
                            <div>
                             <img src="img/productos/' . $registro['imagen'] . '" alt="producto">
                                 <p>Nombre: ' . $registro['nombre'] . '</p>
                                 <p>Precio: ' . $registro['precio'] . '</p>
                                 <p>Stock: ' . $registro['cantidad_stock'] . '</p>
                            </div>
                         </div>';
            }
        }
        ?>
    </section>

    <section id="contacto" class="contacto">
        <?php include('./includes/contacto.html'); ?>
    </section>


    <script src="script.js"></script>
</body>

</html>