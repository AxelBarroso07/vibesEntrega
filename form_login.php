<?php

include 'backend/db/conexion_db.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Days+One&family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="./css/style-login.css">
    <title>Iniciar sesion</title>
</head>

<body>

    <form method="post" action="">
        <h1>Iniciar sesión</h1>
        <input type="text" name="usuario" placeholder="usuario" required>
        <input type="password" name="contrasenia" placeholder="Contraseña" required>
        <input type="submit" name="ingresar" value="ingresar">
        <a href="backend/form_recuperar.php" style="color: white; text-decoration: none; font-family: 'Poppins', sans-serif;"> Olvidé mi contraseña </a>
    </form>

    <?php
    if (isset($_POST['ingresar'])) {

        session_start();
        $contrasenia = $_POST['contrasenia'];
        $usuario = $_POST['usuario'];

        $sql = "SELECT * FROM usuarios WHERE Nbr_u = '$usuario' AND token = 1";
        $consulta = mysqli_query($conexion, $sql);
        if (mysqli_num_rows($consulta) > 0) {
            $registro = mysqli_fetch_assoc($consulta);
            if (password_verify($contrasenia, $registro['Pass_u'])) {
                $_SESSION['usuario'] = $usuario;
                $_SESSION['email'] = $registro['email'];
                header("location:index.php");
            } else {
                echo '<div class="envoltura"><div class="texto">Contraseña incorrecta</div></div>';
            }
        } else {
            echo '<div class="envoltura"><div class ="texto"> El usuario no existe o no valido el correo </div></div>';
            session_destroy();
        }
    }

    ?>

</body>