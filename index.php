<?php
include('backend/db/conexion_db.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Tu código para head -->
</head>

<body>
    <header>
        <?php include('./includes/header.php'); ?>
    </header>
    <section id="home" class="contenido">
        <!-- Contenido de la sección de inicio si es necesario -->
    </section>

    <section id="productos" class="productos">
        <?php
        $sql_select = "SELECT * FROM productos";
        $consulta = mysqli_query($conexion, $sql_select);
        if (mysqli_num_rows($consulta) == 0) {
            echo 'No hay productos registrados';
        } else {
            while ($registro = mysqli_fetch_assoc($consulta)) {
                // Envuelve la imagen en un enlace
                echo '
                <div class="container">
                    <div>
                        <a href="./backend/detalles_producto.php?id=' . $registro['id_producto'] . '">
                            <img src="img/productos/' . $registro['imagen'] . '" alt="producto">
                        </a>
                        <p>Nombre: ' . $registro['nombre'] . '</p>
                        <p>Precio: ' . $registro['precio'] . '</p>
                    </div>
                </div>';
            }
        }
        ?>
    </section>

    <section id="contacto" class="contacto">
        <?php include('./includes/contacto.html'); ?>
    </section>

    <script src="script.js"></script>
</body>

</html>
