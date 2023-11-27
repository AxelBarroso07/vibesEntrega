<?php
include 'db/conexion_db.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse a Vibes</title>
    <link rel="stylesheet" href="../css/style-registrar.css">

</head>

<body>
    <section class="validacion">
  
    

    <?php

    if (isset($_GET['send'])) {
        if ($_GET['send'] == 1) {
            echo '<div class="texto"> Correo enviado, por favor validelo para ingresar a Vibes </div>';
        } else {
            echo '<div class="texto"> Error al enviar el correo de validacion </div>';
        }
    }
    if (isset($_GET['token'])) {
        session_start();
        $token = $_GET['token'];
        $sql = "SELECT * FROM usuarios WHERE token= '$token'";
        $consulta = mysqli_query($conexion, $sql);
        $registro = mysqli_fetch_assoc($consulta);
        if (mysqli_num_rows($consulta) > 0) {
            $_SESSION['usuario'] = $registro['Nbr_u'];
            $sql = "UPDATE usuarios SET token= 1 WHERE token = '$token'";
            $actualizar = mysqli_query($conexion, $sql);
            echo 'usuario enviado';
            header("location: ../index.php");
            echo $_SESSION['usuario'];
        } else {
            echo 'ERROR - el token no existe';
            session_destroy();
            header("location:../form_registro.php");
        }
    }
    ?>

</section>
</body>

</html>