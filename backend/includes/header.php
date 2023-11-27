<?php



?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Header</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <link rel="stylesheet" href="css/style-index.css">
</head>

<body>
  <div class="nav-complete">
  <nav class="navbar">
  <h1 id="vibesHeader">VIBES</h1>
    
    <div class="login-buttons">
    <?php
if (isset($_SESSION['usuario'])) {
  echo '<a href="backend/perfil.php"><span">' . $_SESSION['usuario'] . '</span></a>';
    echo '<a href="backend/carrito.php">Carrito</a>';
  


   
} else if (isset($_SESSION['usuarioAdmin'])) {
    echo '<a href="backend/vibesAdmin.php"> <i class="fa-solid fa-gear"></i> </a>';
    echo '<span ">Bienvenido admin ' . $_SESSION['usuarioAdmin'] . '</span>';

    echo '  <form action="backend/logout.php" method="post">
    <button type="submit" class="logout-button">Cerrar Sesión</button>
</form>';
} else {
    $loginText = (basename($_SERVER['PHP_SELF']) == 'form_login.php') ? '¿No tienes cuenta?' : 'Iniciar sesión';
    $loginLink = (basename($_SERVER['PHP_SELF']) == 'form_login.php') ? './form_registro.php' : './form_login.php';
    
    echo '<a href="' . $loginLink . '">' . $loginText . '</a> ';
    echo '<a href="./backend/carrito.php">Carrito</a>';
}
?>


    </div>
  </nav>
  </div>




 

</body>

</html>