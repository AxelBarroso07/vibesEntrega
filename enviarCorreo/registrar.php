
<?php
include 'conexion_db.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script
  src="https://code.jquery.com/jquery-3.7.0.min.js"
  integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g="
  crossorigin="anonymous"></script>
</head>
<body>

<?php

if (isset($_POST['registrar'])) {
    $Nbr_u = $_POST['usuario'];
    $contrasenia = $_POST['contrasenia'];
    $email = $_POST['email'];
    $token = time();

    $Pass_u = password_hash($contrasenia, PASSWORD_DEFAULT);

   $sql = "INSERT INTO usuarios (Nbr_u, Pass_u, email, token) VALUES ('$Nbr_u', '$Pass_u', '$email', '$token')";
  $insertar = mysqli_query($conexion, $sql)?print('ok'):print('error');


?>
<script>


    let url_final = 'https://formsubmit.co/ajax/<?php echo $email; ?>'
    let usuario = '<?php echo $Nbr_u; ?>';
    let mensaje = 'valide su correo: https://localhost/vibesEntrega/enviarCorreo/registrar.php?token=<?php echo $token; ?>';


$.ajax({
    method: 'POST',
    url: url_final,
    dataType: 'json',
    accepts: 'application/json',
    data: {
        name: usuario,
        message: mensaje,
    },
    success: (data) => window.location = 'registrar.php?send=1',
    error: (err) => window.location = 'registrar.php?send=0',
});
</script>
<?php 
}
?>
<?php

if(isset($_GET['send'])){
    if($_GET['send']== 1){
        echo 'Correo enviado, por favor valide';
    }else{
        echo 'error al enviar el correro de validacion';
    }
}
if(isset($_GET['token'])){
    session_start();
    $token = $_GET['token'];
    $sql = "SELECT * FROM usuarios WHERE token= '$token'";
    $consulta = mysqli_query($conexion, $sql);
    if(mysqli_num_rows($consulta)>0){
        $_SESSION['usuario']= $registro['Nbr_u'];
        $sql= "UPDATE usuarios SET token= 1 WHERE token = '$token'";
        $actualizar=mysqli_query($conexion, $sql);
        echo 'usuario enviado, ya puede session';
        header("location:inicio.php");
        
    }else{
        echo 'el token no existe';
        session_destroy();
        header("location:form_registro.html");
    }
}
?>



</body>
</html>



