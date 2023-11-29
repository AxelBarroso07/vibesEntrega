<?php
include('db/conexion_db.php');
include("redimensionarImg.php");

if (isset($_POST['registrar'])) {
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $cantidad_stock = $_POST['cantidad_stock'];
    $informacion = $_POST['informacion'];
    $talles = $_POST['talles'];
    $categoria = $_POST['categoria'];

    if (is_uploaded_file($_FILES['imagen']['tmp_name'])) {
        move_uploaded_file($_FILES['imagen']['tmp_name'], $_FILES['imagen']['name']);
        $imagen = redimensionarImg($_FILES['imagen']['name'], 200, 300);
        unlink($_FILES['imagen']['name']);
    }

    $sql_insert = "INSERT INTO productos (imagen, nombre, precio, cantidad_stock, informacion, talles, categoria) VALUES ('$imagen', '$nombre', '$precio', '$cantidad_stock', '$informacion', '$talles', '$categoria')";
    $insertar = mysqli_query($conexion, $sql_insert);
    print("<script> window.location='crud_productos.php' </script>");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos - Vibes Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="../css/style-Crud.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>

<body>

    <section class="general">
        <div class="button-back">
            <a href="vibesAdmin.php">Volver</a>
        </div>
        <div class="producto">
            <div class="container">
                <div class="descripcion">
                    <h1 class="title">Subida de productos</h1>
                    <form action="" method="post" class="formulario" enctype="multipart/form-data">
                        <input type="text" name="nombre" id="nombre" class="area-nombre" placeholder="Nombre del producto">
                        <input type="number" name="precio" id="precio" class="area-precio" placeholder="Precio">
                        <input type="number" name="cantidad_stock" id="cantidad_stock" class="area-stock" placeholder="Cantidad de stock">
                        <textarea name="informacion" id="informacion" placeholder="Descripción del producto"></textarea>
                        <select name="talles" id="talles">
                            <option value="S">S</option>
                            <option value="M">M</option>
                            <option value="L">L</option>
                            <option value="XL">XL</option>
                        </select>
                        <!-- Nuevo campo de categoría como un select -->
                        <select name="categoria" id="categoria">
                            <option value="remera">Remera</option>
                            <option value="pantalon">Pantalón</option>
                            <option value="buzo">Buzo</option>
                            <option value="accesorio">Accesorio</option>
                            <!-- Agrega más opciones según sea necesario -->
                        </select>
                        <input type="file" class="image-file" name="imagen" id="imagen" accept="image/*" required>
                        <div class="enviar">
                            <input type="submit" class="enviar" value="Enviar" name="registrar">
                        </div>
                    </form>
                    <div class="button-stock">
                        <button class="button-ver-stock"><a class="link" href="ver_producto.php"><span>Ver stock</span></a></button>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>

</html>
