<?php
session_start();
include 'db/conexion_db.php';

if (isset($_SESSION['usuario'])) {
    $nombre = $_SESSION['usuario'];
    $email = $_SESSION['email'];
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
</head>

<body>
    <header>
        <?php include('./includes/header.php'); ?>
    </header>

    <div class="columna">
        <img src="../img/fondoregistro.jpg" alt="Tu imagen" class="imagen">
        <div class="texto">
            <h1>BIENVENIDA/O A VIBES:</h1>
            <hr>
            <h2 class="nombre"> Nombre de usuario: <?php echo $nombre; ?></h2>
            <h2 class="nombre"> Correo: <?php echo $email; ?></h2>
        </div>

        <div class="texto">
            <h1>Mis pedidos:</h1>
            <hr>
        </div>
    </div>

    <section id="contacto" class="contacto">
        <?php include('../includes/contacto.html'); ?>
    </section>
</body>

</html>