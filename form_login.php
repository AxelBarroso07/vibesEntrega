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
    <link rel="stylesheet" href="./css/style-header.css">
    <title>Iniciar sesión</title>
</head>

<body>

  <section id="login">
<?Php include 'backend/includes/header.php';?>
  <div class="container">
        <form method="post" action="" class="inicio-sesion">
        
            <input type="text" name="usuario" placeholder="usuario" required>
            <input type="password" name="contrasenia" placeholder="Contraseña" required>
            <input type="submit" name="ingresar" value="iniciar sesion">
            <a href="backend/form_recuperar.php"> Olvidé mi contraseña </a>
        </form>
       
        <?php
        if (isset($_GET['senial'])) {
            echo '<div class="parrafo">Para utilizar el carrito debe ingresar al sistema</div>';
        }

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
                    echo 'Contraseña incorrecta';
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
                    } else {
                        echo 'Contraseña incorrecta';
                    }
                } else {
                    echo '<div class="message-error">El usuario no existe o no ha validado el correo </div>';
                    session_destroy();
                }
            }
        }
        ?>
        </div>

    </section>
</body>

</html>