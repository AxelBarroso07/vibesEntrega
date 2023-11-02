<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>     
    <link rel="stylesheet" href="../css/style-login.css">
</head>
<body>
    
<?php

include 'db/conexion_db.php';

         if (isset($_POST['ingresar'])) {

            session_start();
    $contrasenia = $_POST['contrasenia'];
    $usuario = $_POST['usuario'];

    $sql = "SELECT * FROM usuarios WHERE Nbr_u = '$usuario' AND token = 1";
    $consulta = mysqli_query($conexion,$sql);    
    if(mysqli_num_rows($consulta)>0){
        $registro = mysqli_fetch_assoc($consulta);
    if(password_verify($contrasenia, $registro['Pass_u'])){
        $_SESSION['usuario'] = $usuario;
        header("location:../index.php");
        echo $_SESSION['usuario'];
    }else{
        echo 'contraseña incorrecta';
    }
    }else{
        echo '<div class="envoltura"><div class ="texto"el usuario no existe o no valido el correo</div></div>';
        session_destroy();
    }

    
        
    

}

    ?>
</body>
</html>