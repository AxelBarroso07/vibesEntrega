<?php
include('db/conexion_db.php');
include("redimensionarImg.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial de Ventas</title>

</head>

<body>

    <section class="general">
        <div class="button-back">
            <a href="vibesAdmin.php">Volver</a>
        </div>
        <h1 class="title">Historial de Ventas</h1>
        <?php
        $sql = "SELECT * FROM orders ORDER BY Date_order DESC";
        $consulta = mysqli_query($conexion, $sql);

        if (mysqli_num_rows($consulta) > 0) {
            while ($registro = mysqli_fetch_assoc($consulta)) {
                $id_usuario = $registro['ID_user'];
                $sql2 = "SELECT * FROM usuarios WHERE id_u ='$id_usuario'";
                $consulta2 = mysqli_query($conexion, $sql2);
                $reg_usuario = mysqli_fetch_assoc($consulta2);
                /* muestro Nro de orden y Fecha */
                echo '<details>
            <summary>Nro. de Orden: ' . $registro['ID_order'] . ' | Fecha: ' . $registro['Date_order'] . ' | ID de Usuario: ' . $registro['ID_user'] . '</summary>';


                /*convierto el campor Article nuevamente en un vector utilizando la funcion explode() */
                $articulos = explode(' ', $registro['articles']);

                $total = 0;
                for ($x = 1; $x < count($articulos); $x++) {
                    /*utilizando nuevamente la funcion explote() generos las variables para guardar el id_prod, el precio y la cantidad */
                    list($id, $precio, $cant) = explode('/', $articulos[$x]);

                    /*Con el $id traigo imagen y nombre de producto */
                    $sql3 = "SELECT nombre, imagen FROM productos WHERE id_producto='$id'";
                    $consulta3 = mysqli_query($conexion, $sql3);
                    $reg_art = mysqli_fetch_assoc($consulta3);

                    /* muestro detalle de pedido */
                    echo '
                    <div class="detalle">
                        <div class="img"> <img src="../img/productos/' . $reg_art['imagen'] . '" alt="producto"></div>
                        <div class="datos">
                            <span>' . $reg_art['nombre'] . '</span>
                            <span> $' . number_format($precio, 2, ",", ".") . '</span>
                            <span> Cantidad:' . $cant . '</span>
                            <span> Subtotal: $' . number_format($precio * $cant, 2, ",", ".") . '</span>
                        </div>
                    </div>
                    ';
                    $total = $total + ($precio * $cant);
                }
                echo '
            <div class="total">
            <span> Usuario: ' . $reg_usuario['Nbr_u'] . '</span>
            <span> Mail de usuario: ' . $reg_usuario['email'] . '</span>
            <span> TOTAL: $' . number_format($total, 2, ",", ".") . '</span>
            </div>
            ';
                echo '</details>';
            }
        } else {
            echo 'No hay ventas';
        }
        ?>
    </section>

</body>

</html>