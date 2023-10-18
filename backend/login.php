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
        header("location:inicio.php");
        echo $_SESSION['usuario'];
    }else{
        echo 'contraseña incorrecta';
    }
    }else{
        echo 'el usuario no existe o no valido el correo';
        session_destroy();
    }

    
        
    

}

    ?>
</body>
</html>