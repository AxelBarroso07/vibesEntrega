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

</head>

<body>

    <section id="productos">
        <?php include '../includes/header.php'; ?>
 
    
        <?php
          
        $sql_select = "SELECT * FROM productos";
        $consulta = mysqli_query($conexion, $sql_select);

        if (mysqli_num_rows($consulta) == 0) {
            echo '<div class="mensaje-error">No hay productos registrados </div>';
        } else {
            echo '<div class="image-container">';
           
            while ($registro = mysqli_fetch_assoc($consulta)) {

                echo '<div class="grid-container">
               <a href="detalles_producto.php?id=' . $registro['id_producto'] . '">
                        <img src="../img/productos/' . $registro['imagen'] . '" alt="producto">
                    </a>
            
                  </div>';
            }
            echo '</div>';
        }
        ?>
        
    </section>
</body>

</html>