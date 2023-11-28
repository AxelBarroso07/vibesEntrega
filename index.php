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
    <link rel="stylesheet" href="css/style-header.css">
    <title>Vibes</title>
    
</head>

<body>

    <section id="home" class="contenido">
        <?php
        include 'includes/header.php';
        ?>
    </section>
  

<?php
        if(isset($_GET['finCompra'])){
            finalizarCompra();
        }
    // mostrarProductos();
   
    ?>

<section id="contacto" class="contacto">
    <?php include('./includes/contacto.html'); ?>
</section>







<script src="js/buscador.js"></script>
</body>

</html>






