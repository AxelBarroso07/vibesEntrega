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

        <div class="titulo">
            <h1>BIENVENIDA/O A VIBES:</h1>
        </div>
        <div class="texto">
            <h2>Datos Personales</h2>
            <hr>
            <h3 class="nombre"> Username: <?php echo $nombre; ?></h3>
            <h3 class="nombre"> Mail: <?php echo $email; ?></h3>

        <div class="pedidos">
            <h1>Mis pedidos:</h1>
            <hr>
        </div>
        </div>

        
    </div>

    <section id="contacto" class="contacto">
        <?php include('../includes/contacto.html'); ?>
    <div class="formulario">
        <form action="" target="_blank">
                <fieldset>
                <h3>Información personal</h3>

                <hr>

                <label for="nombre">Nombre: </label><input type="text" name="nombre" id="nombre"><br><br>
                <label>Mail: </label><input type="text" name="mail"><br><br>

                <br><input type="submit" value="Enviar información"><br><br>
                </fieldset>

            </form>
    </div>
    
    </section>
</body>

</html>