<?php
session_start();

// Verificar si los datos de sesión existen

if (isset($_SESSION['usuario'])) {
    $nombre = $_SESSION['usuario'];
    //$email = $_SESSION['email'];
} else {
    // Si no existen los datos de sesión, redirigir al formulario de registro
    //header("Location: registrar.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>

    <link rel="stylesheet" href="../enviarCorreo/CSS/style-perfil.css">
</head>
<body>
    

   <div class="columna">
        <img src="../img/fondoregistro.jpg" alt="Tu imagen" class="imagen">
        <div class="texto">
            <h1>BIENVENIDA/O A VIBES: <?php echo $nombre?></h1>
            <hr>
            <h2 class="nombre">Nombre: <?php echo $nombre; ?></h2>
        </div>
    </div>
</body>
</html>