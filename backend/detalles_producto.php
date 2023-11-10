<?php
session_start();
include('db/conexion_db.php');

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
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }





        button,
        select {
            font-size: 18px;
            background-color: #fff;
            color: #000;
            border: 2px solid #000;
            padding: 10px 20px;
            cursor: pointer;
            margin: 10px;
        }

        #product-img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>

<body>
    <?php
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
            echo '<img id="product-img" src="../img/productos/' . $imagen . '" alt="' . $nombre . '">';
            echo '<div class="product-info">';
            echo '<h1>' . $nombre . '</h1>';
            echo '<p>Precio: ' . $precio . '</p>';
            echo '<p style="font-weight: bold;">Información sobre la prenda:</p>';
            echo '<p>' . $informacion . '</p>';
            echo '<select name="size">';
            echo '<option value="S">S</option>';
            echo '<option value="M">M</option>';
            echo '<option value="L">L</option>';
            echo '<option value="XL">XL</option>';
            echo '</select>';
            echo '<a href="carrito.php?ID_prod='.$id.'"><button>Comprar</button></a>';
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