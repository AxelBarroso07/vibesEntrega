<?php
include('db/conexion_db.php');
include("redimensionarImg.php");

if (isset($_POST['registrar'])) {
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $cantidad_stock = $_POST['cantidad_stock'];
    $informacion = $_POST['informacion'];
    $talles = $_POST['talles'];

    if (is_uploaded_file($_FILES['imagen']['tmp_name'])) {
        move_uploaded_file($_FILES['imagen']['tmp_name'], $_FILES['imagen']['name']);
        $imagen = redimensionarImg($_FILES['imagen']['name'], 200, 300);
        unlink($_FILES['imagen']['name']);
    }

    $sql_insert = "INSERT INTO productos (imagen, nombre, precio, cantidad_stock, informacion, talles) VALUES ('$imagen', '$nombre', '$precio', '$cantidad_stock', '$informacion', '$talles')";
    $insertar = mysqli_query($conexion, $sql_insert);
    print("<script> window.location='crud_productos.php' </script>");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Productos - VibesAdmin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../css/style-Crud.css">
</head>

<body>
    <div class="boton">
        <a href="vibesAdmin.php"> <h2>Volver atras</h2></a>
    </div>
    

    <div class="productos">
    <h1>CRUD - PRODUCTOS</h1>
        <h2>Productos listados</h2>
        <?php
        $sql_select = "SELECT * FROM productos";
        $consulta = mysqli_query($conexion, $sql_select);
        if (mysqli_num_rows($consulta) == 0) {
            echo 'No hay productos registrados';
        } else {
            while ($registro = mysqli_fetch_assoc($consulta)) {
                echo '
                    <div class="producto">
                        <img src="../img/productos/' . $registro['imagen'] . '" alt="producto">
                        <div class="datos">
                            <p>Nombre: ' . $registro['nombre'] . '</p>
                            <p>Precio: ' . $registro['precio'] . '</p>
                            <p>Stock: ' . $registro['cantidad_stock'] . '</p>
                            <p>Información: ' . $registro['informacion'] . '</p>
                            <p>Talles: ' . $registro['talles'] . '</p>
                            <div class="buttons">
                                <a href="crud_productos.php?id_editar=' . $registro['id_producto'] . '&&nombre=' . $registro['nombre'] . '&&precio=' . $registro['precio'] . '&&cantidad_stock=' . $registro['cantidad_stock'] . '"><button><i class="fa-solid fa-pen-to-square"></i></button></a>
                                <a href="crud_productos.php?id_eliminar=' . $registro['id_producto'] . '"><button><i class="fa-solid fa-trash"></i></button></a>
                            </div>
                        </div>
                    </div>';
            }
        }
        ?>
    </div>
    
    <div class="formulario">
        <h2>Agregar productos</h2>
            <form action="" method="post" enctype="multipart/form-data">
                <label for="nombre">Nombre: </label>
                <input type="text" name="nombre" id="nombre">
                <label for="precio">Precio: </label>
                <input type="number" name="precio" id="precio">
                <label for="cantidad_stock">Cantidad de stock: </label>
                <input type="number" name="cantidad_stock" id="cantidad_stock">
                <label for="informacion">Información: </label>
                <textarea name="informacion" id="informacion" rows="4"></textarea>
                <label for="talles">Talles: </label>
                <select name="talles" id="talles">
                    <option value="S">S</option>
                    <option value="M">M</option>
                    <option value="L">L</option>
                    <option value="XL">XL</option>
                </select>
                <label for="imagen">Imagen del producto: </label>
                <input type="file" name="imagen" id="imagen" accept="image/*" required>
                <input type="submit" value="Subir nuevo producto" name="registrar">
            </form>
    </div>
    

    <?php
    if (isset($_GET['id_editar'])) {
        $id_editar = $_GET['id_editar'];
        $sql_selectEditado = "SELECT * FROM productos WHERE id_producto='$id_editar'";
        $consulta_e = mysqli_query($conexion, $sql_selectEditado);
        $registro_e = mysqli_fetch_assoc($consulta_e);
        echo '<h2>EDITAR PRODUCTO: ' . $registro_e['nombre'] . '</h2>';
        echo '<form action="" method="post" enctype="multipart/form-data">
        <label for="nombre_e">Nombre: </label>
        <input type="text" name="nombre" id="nombre_e" value="' . $registro_e['nombre'] . '">
        <label for="precio_e">Precio: </label>
        <input type="number" name="precio" id="precio_e" value="' . $registro_e['precio'] . '">
        <label for="cantidad_stock_e">Cantidad de stock: </label>
        <input type="number" name="cantidad_stock" id="cantidad_stock_e" value="' . $registro_e['cantidad_stock'] . '">
        <label for="informacion_e">Información: </label>
        <textarea name="informacion" id="informacion_e" rows="4">' . $registro_e['informacion'] . '</textarea>
        <label for="talles_e">Talles: </label>
        <select name="talles" id="talles_e">
            <option value="S" ' . ($registro_e['talles'] == 'S' ? 'selected' : '') . '>S</option>
            <option value="M" ' . ($registro_e['talles'] == 'M' ? 'selected' : '') . '>M</option>
            <option value="L" ' . ($registro_e['talles'] == 'L' ? 'selected' : '') . '>L</option>
            <option value="XL" ' . ($registro_e['talles'] == 'XL' ? 'selected' : '') . '>XL</option>
        </select>
        <label for="imagen_e">Imagen del producto: </label>
        <input type="file" name="imagen" id="imagen_e" accept="image/*">
        <input type="hidden" name="foto_previa" value="' . $registro_e['imagen'] . '">
        <input type="submit" value="Actualizar producto" name="actualizar">
        </form>';
    }

    if (isset($_POST['actualizar'])) {
        $nombre_editar = $_POST['nombre'];
        $precio_editar = $_POST['precio'];
        $cantidad_editar = $_POST['cantidad_stock'];
        $informacion_editar = $_POST['informacion'];
        $tallas_editar = $_POST['talles'];
        $foto_previa = $_POST['foto_previa'];

        if (is_uploaded_file($_FILES['imagen']['tmp_name'])) {
            move_uploaded_file($_FILES['imagen']['tmp_name'], $_FILES['imagen']['name']);
            $imagen = redimensionarImg($_FILES['imagen']['name'], 200, 200);
            unlink('../img/productos/' . $foto_previa);
        } else {
            $imagen = $foto_previa;
        }

        $sql_update = "UPDATE productos SET nombre='$nombre_editar', precio='$precio_editar', cantidad_stock='$cantidad_editar', informacion='$informacion_editar', talles='$tallas_editar', imagen='$imagen' WHERE id_producto='$id_editar'";
        $actualizar = mysqli_query($conexion, $sql_update) ? print("<script>alert('Producto editado');window.location='crud_productos.php'</script>") : print("<script>alert('Error al editar');window.location='crud_productos.php'</script>");
    }

    if (isset($_GET['id_eliminar'])) {
        $id_eliminar = $_GET['id_eliminar'];

        $sql_selectBorrar = "SELECT * FROM productos WHERE id_producto='$id_eliminar'";
        $consulta_eliminare = mysqli_query($conexion, $sql_selectBorrar);
        $registro_eliminare = mysqli_fetch_assoc($consulta_eliminare);

        unlink('../img/productos/' . $registro_eliminare['imagen']);
        // BORRAR LA FOTO DE LA CARPETA IMAGENES

        $sql_borrar = "DELETE FROM productos WHERE id_producto='$id_eliminar'";
        $eliminar = mysqli_query($conexion, $sql_borrar) ? print("<script>alert('Producto eliminado');window.location='crud_productos.php'</script>") : print("<script>alert('Error al borrar');window.location='crud_productos.php'</script>");
    }
    ?>
</body>

</html>