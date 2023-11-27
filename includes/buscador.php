<?php
include('../backend/db/conexion_db.php');
    if(!empty($_POST['buscar'])){
        $sql = "SELECT * FROM productos WHERE Nombre LIKE '%".$_POST['buscar']."%' ";
        }else{
        $sql="SELECT * FROM productos";
    }
    $consulta = mysqli_query($conexion, $sql);
    while($registro=mysqli_fetch_assoc($consulta)){
        echo '<div class="card">
            <img src="images/'.$registro['imagen'].'" alt="">
            <p class="art">'.$registro['nombre'].'</p>
            <p class="cost">$'.number_format($registro['precio'],2,",",".").'</p>
            <p class="stock">disponibilidad: '.$registro['cantidad_stock'].'</p>
            <a href="carrito.php?ID_prod='.$registro['id_producto'].'"><i class="fa-solid fa-cart-plus"></i> Agregar</a>
            </div>';
    };

?>