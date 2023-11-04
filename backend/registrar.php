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
    <a href="../index.php">
        <div class="svg">
            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512">
                <style>
                    svg {
                        fill: #ffffff;
                        width: 50px;
                        height: 30px;
                        padding: 30px;
                    }
                </style>
                <path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z" />
            </svg>
        </div>
    </a>

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


</body>

</html>