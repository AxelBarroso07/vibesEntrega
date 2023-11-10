<?php
include 'db/conexion_db.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Days+One&family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="../css/style-index.css">
</head>

<body>
    <nav class="navbar">
        <a href="../index.php">
            <h1>vibes</h1>
        </a>
        <div class="login-buttons">
        <a href="carrito.php"><i class="fa-solid fa-cart-shopping"></i></a>
            <?php
            if (isset($_SESSION['usuario'])) {
                echo '<a href="perfil.php"> <i class="fa-regular fa-user"></i> </a>';
                echo '<span style="color: white;">Bienvenido ' . $_SESSION['usuario'] . '</span>';

                echo '  <form action="logout.php" method="post">
    <button type="submit" class="logout-button">Cerrar Sesión</button>
</form>';
            } else {
                echo '<a href="./form_login.php" style="color: white;">INICIO SESION</a> <span style="color: white;">/</span> <a href="./form_registro.php" style="color: white;">REGISTRO</a>';
            }
            ?>
        </div>
    </nav>
</body>

</html>