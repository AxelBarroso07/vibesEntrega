<?php
include 'db/conexion_db.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva Contraseña</title>
</head>

<body>
    <?php
    if (isset($_GET['token'])) {

    ?>
        <h2>Cambiar contraseña</h2>
        <form action="" method="post">
            <label for="1">Ingrese su nueva contraseña: </label>
            <input type="text" name="contrasenia" id="1">
            <input type="submit" value="Actualizar" name="Actualizar">
        </form>

    <?php
    }

    ?>
</body>

</html>

<?php
if (isset($_POST['Actualizar'])){
    $token = $_GET['token'];
$nuevaContrasenia = $_POST['contrasenia'];
$Pass_u = password_hash($nuevaContrasenia, PASSWORD_DEFAULT);
$sql = "SELECT * FROM usuarios WHERE token= '$token'";
$consulta = mysqli_query($conexion, $sql);
if (mysqli_num_rows($consulta) > 0) {
    $sqlUpdate = "UPDATE usuarios SET token= 1, Pass_u= '$Pass_u' WHERE token = '$token'";
    $actualizar = mysqli_query($conexion, $sqlUpdate);
    echo 'Contraseña actualizada correctamente.';
    echo '<a href="../index.php">Volver al inicio</a>';
} else {
    echo 'el token no existe';
    echo '<a href="../index.php">Volver al inicio</a>';
}
}

?>