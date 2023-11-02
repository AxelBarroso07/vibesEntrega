<?php
include 'db/conexion_db.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>vibes - Recuperar Contraseña</title>
    <script
  src="https://code.jquery.com/jquery-3.7.0.min.js"
  integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g="
  crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../css/style-recuperar.css">
</head>

<body>
<a href="../index.php">
        <div class="svg">
        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512">
            <style>svg{fill:#ffffff; width:50px; height:30px; padding:30px;}</style>
            <path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/></svg>
        </div>
    </a>
    <div class="caja">
        <h2>Recuperar contraseña</h2>
        <div class="form">
            <form action="" method="post">
                <div class="email">
            <input type="email" name="correo" id="1" placeholder="email">
                </div>
            <div class="boton">
                <input type="submit" name="Recuperar" value="Recuperar">
            </div>  
            
        </form>
    </div>


</body>

</html>


<?php
if (isset($_POST['Recuperar'])) {

    $correo = $_POST['correo'];

    $sql = "SELECT * FROM usuarios WHERE email = '$correo'";
    $consulta = mysqli_query($conexion, $sql);
    if (mysqli_num_rows($consulta) > 0) {
        $token = time();
        $registro = mysqli_fetch_assoc($consulta);
        $sqlUpdate = "UPDATE usuarios SET token = '$token' WHERE email = '$correo'";
        $actualizarToken = mysqli_query($conexion, $sqlUpdate);
?>
        <script>
            let url_final = 'https://formsubmit.co/ajax/<?php echo $correo; ?>'
            let usuario = '<?php $registro['Nbr_u']; ?>';
            let mensaje = 'Recupere su contraseña: https://localhost/vibesEntrega/backend/nuevaContrasenia.php?token=<?php echo $token; ?>';


            $.ajax({
                method: 'POST',
                url: url_final,
                dataType: 'json',
                accepts: 'application/json',
                data:{
                    name: usuario,
                    message: mensaje,
                },
                success: (data) => document.write('Correo enviado, revise su casilla de correos</h1>'), 
                error: (err) => document.write('Error al enviar el correo: ' + err),
            });
        </script>
<?php
    } else {
        echo '<p class="texto">el correo no existe</p>';
    }
}


?>