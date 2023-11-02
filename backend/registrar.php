<?php
include 'db/conexion_db.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
<!-- <link rel="stylesheet" href="../vibesEntrega/css/style-registrar.css"> -->
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<link rel="stylesheet" href="../css/style-registrar.css">    
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
</head>

<body>
<!-- <div class="mensaje-enviado">Correo enviado, por favor valide</div> -->
    <a href="../index.php">
        <div class="svg">
        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512">
            <style>svg{fill:#ffffff; width:50px; height:30px; padding:30px;}</style>
            <path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/></svg>
        </div>
    </a>
    
    <?php

    if (isset($_POST['registrar'])) {
        $email = $_POST['email'];
        $emailQuery = "Select * from usuarios where email = \"$email\"";
        $emailInUse = mysqli_num_rows(mysqli_query($conexion, $emailQuery));
        if ($emailInUse >= 1) {
            echo '<p class="texto">Email ya en uso, utilize otro. <a href="../form_registro.html"></a></p>';
        } else {
            $Nbr_u = $_POST['usuario'];
            $contrasenia = $_POST['contrasenia'];
            $token = time();

            $Pass_u = password_hash($contrasenia, PASSWORD_DEFAULT);

            $sql = "INSERT INTO usuarios (Nbr_u, Pass_u, email, token) VALUES ('$Nbr_u', '$Pass_u', '$email', '$token')";
            $insertar = mysqli_query($conexion, $sql);


    ?>
            <script>
                let url_final = 'https://formsubmit.co/ajax/<?php echo $email; ?>'
                let usuario = '<?php echo $Nbr_u; ?>';
                let mensaje = 'valide su correo: https://localhost/vibesEntrega/backend/registrar.php?token=<?php echo $token; ?>';


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
    }

    if (isset($_GET['send'])) {
        if ($_GET['send'] == 1) {
            echo '<div class ="envoltura"><div class="texto">correo enviado, por favor valide</div></div>';
        } else {
            echo '<div class="texto">error al enviar el correro de validacion</div>';
        }
    }
    if (isset($_GET['token'])) {
        session_start();
        $token = $_GET['token'];
        $sql = "SELECT * FROM usuarios WHERE token= '$token'";
        $consulta = mysqli_query($conexion, $sql);
        if (mysqli_num_rows($consulta) > 0) {
            $_SESSION['usuario'] = $registro['Nbr_u'];
            $sql = "UPDATE usuarios SET token= 1 WHERE token = '$token'";
            $actualizar = mysqli_query($conexion, $sql);
            echo 'usuario enviado, ya puede session';
            header("location:inicio.php");
        } else {
            echo 'el token no existe';
            session_destroy();
            header("location:../form_registro.html");
        }
    }
    ?>

    <!-- <script>
        const text = "Correo enviado, por favor valide";

        let textIndex = 0;
        Array.from(text).forEach(letter => {
            textIndex++;
            setTimeout(() => {
                document.querySelector(".texto").textContent += letter;
            }, 100*textIndex);
        })
    </script> -->


</body>

</html>
