<?php
session_start();
include('./db/conexion_db.php');

if (isset($_SESSION['usuario'])) {
    $nombre = $_SESSION['usuario'];
    $email = $_SESSION['email'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title>Detalles del Producto</title>
    <link rel="stylesheet" href="../css/style-index.css">
    <link rel="stylesheet" href="../css/style-productos.css">
   </head>

<body>

    <?php
    include 'includes/header.php';
    if (isset($_GET['id'])) {
        $producto_id = $_GET['id'];

        $sql_select = "SELECT * FROM productos WHERE id_producto = $producto_id";
        $consulta = mysqli_query($conexion, $sql_select);

        if (mysqli_num_rows($consulta) == 1) {
            $producto = mysqli_fetch_assoc($consulta);
            $id = $producto['id_producto'];
            $nombre = $producto['nombre'];
            $precio = $producto['precio'];
            $imagen = $producto['imagen'];
            $informacion = $producto['informacion'];
            echo '<div class="container">';
            echo '<div class="product-info">';
            // echo '<h3 class="nombre-prenda">"' . $nombre . '"</h3>';

            echo '<select>';
            echo '<option value="S">TALLE: S</option>';
            echo '<option value="M">TALLE: M</option>';
            echo '<option value="L">TALLE: L</option>';
            echo '<option value="XL">TALLE: XL</option>';
            echo '</select>'; 
            echo '<a href="carrito.php?ID_prod=' . $id . '"><button class="comprar-btn">COMPRAR</button></a>';
            echo '<p class ="info">Precio: ' . $precio . '</p>';
            echo '<p style="font-weight: bold;">Información sobre la prenda:</p>';
            echo '<p class ="info">' . $informacion . '</p>';
           
           
            echo '</div>';
            echo '<div class="container-image-title">';
            // Ajusta el ancho y alto según tus necesidades
            echo '<img id="product-img" src="../img/productos/' . $imagen . '" alt="' . $nombre . '" width="400" height="500">';
            echo '<h3 class="nombre-prenda">"' . $nombre . '"</h3>';
            echo '</div>';

           
           
            echo '</div>';
       
        } else {
            echo 'Producto no encontrado.';
        }
    } else {
        echo 'ID del producto no proporcionado.';
    }
    ?>
</body>

</html>