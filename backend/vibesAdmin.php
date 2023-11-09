<?php
session_start();
include 'db/conexion_db.php';

if (isset($_SESSION['usuarioAdmin'])) {
    $nombre = $_SESSION['usuarioAdmin'];
    $email = $_SESSION['emailAdmin'];
} else {
    // Si no existen los datos de sesión, redirigir al formulario de registro
    header("Location: ../index.php");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style-Admin.css">
    <title>Vibes Admin</title>
</head>
<body>
    <?php echo '<h1>BIENVENIDO ADMIN:<br> ' . $nombre . '</h1> '; ?>

    <div class="links">
        <a href="crud_productos.php"><h2>ADMINISTRAR PRODUCTOS DE LA TIENDA <hr></h2></a>
        <a href=""><h2>HISTORIAL DE VENTAS<hr></h2></a>
        <a href="../index.php"><h2>VOLVER A VIBES<hr></h2></a>
    </div>

</body>
</html>