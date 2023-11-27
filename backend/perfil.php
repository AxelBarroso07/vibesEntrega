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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style-perfil.css">
    <title>Document</title>
  <style>
  .datos, .pedidos {
    display: none;
}
</style>
</head>

<body>

    <section class="perfil">
       
        
        <form action="logout.php" method="post">
        <h1 class="nombre">Hola <?php echo $nombre; ?></h1>
            <button type="submit" class="logout-button">Cerrar Sesión</button>
            </div>
        </form>
        <button onclick="mostrarDatosPersonales()">Mostrar Datos Personales</button>
        <button onclick="mostrarMisPedidos()">Mostrar Mis Pedidos</button>

        <div class="datos">
            <h2>Datos Personales</h2>
            <h3 class="nombre">Usuario: <?php echo $nombre; ?></h3>
            <h3 class="nombre">E-mail: <?php echo $email; ?></h3>
            </div>

        <div class="pedidos">
            <h1>Mis pedidos:</h1>
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
