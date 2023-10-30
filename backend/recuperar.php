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
  <style>
    *{
        margin:0;
        padding:0;
        /* background-color:black; */
        
    }
    body{
        background-color:black;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }
    h2{
        display:flex;
        justify-content:center;
        margin:10px;
        color:white;
        font-weight:bold;
    }
    .form{
        display:flex;
        justify-content:center;
        color:white;
        cursor:pointer;
    }
    label{
        color:white;
        font-weight:bold;
    }
    input{
        background-color:#fff;
        color:black;
        font-weight:bold;
        cursor:pointer;
        border-radius:5px;
    }
    input:hover{
        cursor:pointer;
        background-color:#1DFC03;
        font-weight:bold;
    }
    .boton{
        display:flex;
        justify-content:center;
        margin:20px;
    }
    .caja{
        width: 300px;
        padding: 20px;
        border: 1px solid #ccc;
        background-color: #f9f9f9;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    border-radius: 5px;
        background-color:#333;
        border-radius:5px;
    }
    h1 {
        background: red;
        background-color: #4CAF50; 
        color: white;
        font-weight:bold; 
        padding: 10px; 
        text-align: center; 
        font-size: 20px;
        margin:250px;
    }
  </style>
</head>

<body>
    <div class="caja">
        <h2>Recuperar contraseña</h2>
        <div class="form">
            <form action="" method="post">
            <label for="1">Correo:</label>
            <input type="email" name="correo" id="1">
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
                success: (data) => document.write('<style type="text/css"> body {background-color:black;} h1 {display:flex; justify-content:center; color: red; font-weight:bold;} </style><h1 id="texto">Correo enviado, revise su casilla de correos</h1>'), 
                error: (err) => document.write('Error al enviar el correo: ' + err),
            });
        </script>
<?php
    } else {
        echo '<p class="texto">el correo no existe</p>';
    }
}


?>