<?php
include 'backend/db/conexion_db.php';

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Days+One&family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="./css/style-registro.css">
    <title>Registrarse a Vibes</title>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
    
        <div class="columna">
        
            <div class="background-color"></div>
            
    <div class="svg">
        <a href="index.php">
        <svg xmlns="http://www.w3.org/2000/svg" height="25" width="25" viewBox="0 0 448 512">
       <!-- <polygon points="0,50 100,50 100,60 120,50 100,40 100,50" fill="#000" /> -->
        <path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/></svg>
        </a>
    </div>

            <form action="" method="post" class="form">
            
                <input type="text" name="usuario" placeholder="Usuario" required>
                <input type="password" name="contrasenia" placeholder="Contraseña" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="submit" name="registrar" value="registrar">
            </form>

            <?php
            if (isset($_POST['registrar'])) {
                $email = $_POST['email'];
                $emailQuery = "Select * from usuarios where email = \"$email\"";
                $emailInUse = mysqli_num_rows(mysqli_query($conexion, $emailQuery));
                if ($emailInUse >= 1) {
                    echo '<p class="texto"> Email ya en uso, utilize otro. </p>';
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
                            success: (data) => window.location = 'backend/registrar.php?send=1',
                            error: (err) => window.location = 'backend/registrar.php?send=0',
                        });
                    </script>
            <?php
                }
            }
            ?>


        </div>
        <div class="columna">
            <img src="./img/fondoregistro.jpg" alt="Tu imagen" class="imagen">
        </div>
    </div>

    <?php


    ?>
</body>

</html>