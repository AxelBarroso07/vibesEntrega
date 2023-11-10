<?php
session_start();
require_once('db/conexion_db.php');
require_once('includes/functionCart.php');
?>
<?php
if (isset($_SESSION['usuario'])) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <title>Carrito de Vibes</title>
    </head>

    <body>
        <!-- <header>
            <?php include('includes/header.php'); ?>
        </header> -->
        <section>

            <p class="title">Carrito</p>

            <?php
            if (isset($_GET['ID_prod'])) {
                // Agregar producto a carrito
                agregarProdCarrito($_GET['ID_prod']);
            }

            if (isset($_GET['id_borrar'])) {
                borrarProdCarrito($_GET['id_borrar']);
            }

            if (isset($_GET['id_sumar'])) {
                sumarCantProd($_GET['id_sumar']);
            }

            if (isset($_GET['id_restar'])) {
                restarCantProd($_GET['id_restar']);
            }

            if (isset($_GET['vaciarCarrito'])) {
                vaciarCarrito();
            }

            if (isset($_GET['finCompra'])) {
                finalizarCompra();
            }

            if (isset($_SESSION['carrito'])) {
                mostrarCarrito();
            } else {
                mostrarCarritoVacio();
            }
            ?>

        </section>
    </body>

    </html>
<?php
} else {
    header('location:../form_login.php?senial=1');
}
?>