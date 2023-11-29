<?php
include './db/conexion_db.php';
?>
<?php
include './db/conexion_db.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style-productos-section.css">
    <link rel="stylesheet" href="../css/style-header.css">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function () {
            $('.categoria-producto').on('click', function () {
                var categoria = $(this).data('categoria');
                if (categoria === 'todos') {
                    $('.grid-container').show();
                } else {
                    $('.grid-container').hide();
                    $('.' + categoria).show();
                }
            });
        });
    </script>
</head>

<body>

    <section id="productos">
        <?php include 'includes/header.php'; ?>

        <div class="search-container">
            <details>
                <summary>Categorías</summary>
                <ul>
                    <li><a href="#" class="categoria-producto" data-categoria="todos">Todos</a></li>
                    <li><a href="#" class="categoria-producto" data-categoria="remera">Remeras</a></li>
                    <li><a href="#" class="categoria-producto" data-categoria="pantalon">Pantalones</a></li>
                    <li><a href="#" class="categoria-producto" data-categoria="buzo">Buzos</a></li>
                    <li><a href="#" class="categoria-producto" data-categoria="accesorio">Accesorios</a></li>
                </ul>
            </details>
        </div>

        <div class="image-container">
            <?php
            $sql_select = "SELECT * FROM productos";
            $consulta = mysqli_query($conexion, $sql_select);

            if (mysqli_num_rows($consulta) == 0) {
                echo '<div class="mensaje-error">No hay productos registrados </div>';
            } else {
                while ($registro = mysqli_fetch_assoc($consulta)) {
                    echo '<div class="grid-container ' . $registro['categoria'] . '">
                            <a href="detalles_producto.php?id=' . $registro['id_producto'] . '">
                                <img src="../img/productos/' . $registro['imagen'] . '" alt="producto">
                            </a>
                        </div>';
                }
            }
            ?>
        </div>

    </section>

</body>

</html>
