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
    
    <div class="svg">
       <a href="index.php">
       <svg xmlns="http://www.w3.org/2000/svg" height="25" width="25" viewBox="0 0 448 512">
       <!-- <polygon points="0,50 100,50 100,60 120,50 100,40 100,50" fill="#000" /> -->
        <path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/></svg>
        </a>
    </div>
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
            $sqlAdmin = "SELECT * FROM usuarios WHERE Nbr_u = '$usuario' AND token = 2";
            $consultaAdmin = mysqli_query($conexion, $sqlAdmin);
            if (mysqli_num_rows($consultaAdmin) > 0) {
                $registroAdmin = mysqli_fetch_assoc($consultaAdmin);
                if ($contrasenia == $registroAdmin['Pass_u']) {
                    $_SESSION['usuarioAdmin'] = $usuario;
                    $_SESSION['emailAdmin'] = $registroAdmin['email'];
                    header("location:backend/vibesAdmin.php");
                }
                else{
                    echo '<div class="envoltura"><div class="texto">Contraseña incorrecta</div></div>';
                }
            }
            else {
                echo '<div class="envoltura"><div class ="texto"> El usuario no existe o no valido el correo </div></div>';
                session_destroy();
            }
        }
    }
    ?>

</body>