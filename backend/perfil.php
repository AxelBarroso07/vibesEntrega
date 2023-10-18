<?php
session_start();

// Verificar si los datos de sesión existen

if (isset($_SESSION['usuario'])) {
    $nombre = $_SESSION['usuario'];
    //$email = $_SESSION['email'];
} else {
    // Si no existen los datos de sesión, redirigir al formulario de registro
    //header("Location: registrar.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <style>
        *{
            padding:0;
            margin: 0;
            
        }
        body{
            /* background-image: url('../img/fondoregistro.jpg');
            background-repeat: no-repeat; */
            
            /* background-color:#; */
            color:#fff;
            min-height:100vh;
        }
        h1, h2{ 
            text-align:center;
        }
        h2{
            opacity: 1;
            /* background-color:#aaa6; */
            border-radius:5px;
            max-width:400px;
            margin: auto;
        }
        .columna {
        padding: 20px;
        overflow: hidden;
        display: flex;
        justify-content:space-between;
        align-items: center;}

        .texto{
            padding: 1rem;
            color:#fefefe;
            margin-right: 5rem;
            display:flex;
            flex-direction:column;
            align-self:center;
            gap:2rem;
            background-color:gray;
            border-radius:8px;
        }

.imagen {
    width: 50%;
    height: calc(100vh - 45px);
    object-fit: cover;
}

    </style>
    <!-- <link rel="stylesheet" href="../enviarCorreo/CSS/styles2.css"> -->
</head>
<body>
    

   <div class="columna">
        <img src="../img/fondoregistro.jpg" alt="Tu imagen" class="imagen">
        <div class="texto">
            <h1>BIENVENIDA/O A VIBES: <?php echo $nombre?></h1>
            <hr>
            <h2 class="nombre">Nombre: <?php echo $nombre; ?></h2>
        </div>
    </div>
</body>
</html>