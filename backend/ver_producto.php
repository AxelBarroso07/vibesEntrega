


<?php
include('db/conexion_db.php');
include("redimensionarImg.php");

$sql_select = "SELECT * FROM productos";
$consulta = mysqli_query($conexion, $sql_select);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Productos</title>
    <link rel="stylesheet" href="../css/style-ver-productos.css">
</head>
<body>
    <section class="mostrarProductos">
        <?php
        while ($registro = mysqli_fetch_assoc($consulta)) {
            echo '<div class="producto">
            <div class="image"><img src="../img/productos/'. $registro['imagen'] .'" alt="producto"></div>
                    <div class="descripcion">
                        <p class="nombre">' . $registro['nombre'] . '</p>
                        <p class="price">Precio: ' . $registro['precio'] . '</p>
                        <p class="talles">Talles: ' . $registro['talles'] . '</p>
                    </div>
                    <div class="buttons">
                    <a href="ver_producto.php?id_editar=' . $registro['id_producto'] . '&&nombre=' . $registro['nombre'] . '&&precio=' . $registro['precio'] . '&&cantidad_stock=' . $registro['cantidad_stock'] . '&&talles=' . $registro['talles'].'"><button class="editar">Editar</button></a>
                    <a href="ver_producto.php?id_eliminar=' . $registro['id_producto'] . '"><button class="eliminar">Eliminar</button></a>
                    </div>
                  </div>';
        }

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
            $actualizar = mysqli_query($conexion, $sql_update) ? print("<script>alert('Producto editado');window.location='ver_producto.php'</script>") : print("<script>alert('Error al editar');window.location='ver_producto.php'</script>");
        }
    
        if (isset($_GET['id_eliminar'])) {
            $id_eliminar = $_GET['id_eliminar'];
    
            $sql_selectBorrar = "SELECT * FROM productos WHERE id_producto='$id_eliminar'";
            $consulta_eliminare = mysqli_query($conexion, $sql_selectBorrar);
            $registro_eliminare = mysqli_fetch_assoc($consulta_eliminare);
    
            unlink('../img/productos/' . $registro_eliminare['imagen']);
            // BORRAR LA FOTO DE LA CARPETA IMAGENES
    
            $sql_borrar = "DELETE FROM productos WHERE id_producto='$id_eliminar'";
            $eliminar = mysqli_query($conexion, $sql_borrar) ? print("<script>alert('Producto eliminado');window.location='ver_producto.php'</script>") : print("<script>alert('Error al borrar');window.location='ver_producto.php'</script>");
        }
        ?>
    </section>
</body>
</html>
