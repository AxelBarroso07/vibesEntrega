<?php
session_start();
include 'db/conexion_db.php';
require_once('includes/functionCart.php');

if (isset($_SESSION['usuario'])) {
    $nombre = $_SESSION['usuario'];
    $mail = $_SESSION['email'];

} else {
    // Si no existen los datos de sesión, redirigir al formulario de registro
    //header("Location: registrar.php");
    exit;
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Su perfil de Vibes</title>
    <link rel="stylesheet" href="../css/style-perfil.css">
    <link rel="stylesheet" href="../css/style-header.css">
    

</head>

<body>

        <?php include('includes/header.php'); ?>
   
    <section class="perfil">
    <form action="logout.php" method="post">
        <button type="submit" class="logout-button">Cerrar Sesión</button>
    </form>
    <div class="container-details">
        <div class="botones-container">
            <button onclick="mostrarDatosPersonales()">Mostrar Datos Personales</button>
            <button onclick="mostrarMisPedidos()">Mostrar Mis Pedidos</button>
        </div>

        <div class="datos">
            <h3 class="nombre">Usuario: <?php echo $nombre; ?></h3>
            <h3 class="nombre">Mail: <?php echo $mail; ?></h3>
        </div>

        <div class="pedidos">
            <?php mostrarPedidos($_SESSION['ID_user']); ?>
        </div>
    </div>
    </section>
    <script>
        function mostrarDatosPersonales() {
            document.querySelector('.datos').style.display = 'block';
            document.querySelector('.pedidos').style.display = 'none';
        }

        function mostrarMisPedidos() {
            document.querySelector('.datos').style.display = 'none';
            document.querySelector('.pedidos').style.display = 'block';
        }
    </script>
</body>

</html>
