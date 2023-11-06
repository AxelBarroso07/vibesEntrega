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
    <title>Vibes Admin</title>
</head>
<body>
    <?php echo '<h1>BIENVENIDO ADMIN ' . $nombre . '</h1>'; ?>
    <a href="crud_productos.php"><h2>ADMINISTRAR PRODUCTOS DE LA TIENDA</h2></a>
    <a href=""><h2>HISTORIAL DE VENTAS</h2></a>
    <a href="../index.php"><h2>VOLVER A VIBES</h2></a>
</body>
</html>