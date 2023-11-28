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
    <link rel="stylesheet" href="./css/style-header.css">
    <title>Registrarse a Vibes</title>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
</head>

<body>
    <section id="registro">
        <?php include 'includes/header.php';?>
        <div class="container">
            <form action="" method="post" class="registro-form">
            
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
                let mensaje = 'valide su correo: http://localhost/vibesEntrega/backend/registrar.php?token=<?php echo $token; ?>';

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
    </section>
</body>

</html>