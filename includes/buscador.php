<?php
include '../db/conexion.php';
    if(!empty($_POST['buscar'])){
        $sql = "SELECT * FROM articulos WHERE nombre LIKE '%".$_POST['buscar']."%' ";
        }else{
        $sql="SELECT * FROM nombre";
    }
    $consulta = mysqli_query($conexion, $sql);
    while($registro=mysqli_fetch_assoc($consulta)){
        echo '<div class="card">
            <img src="images/'.$registro['imagen'].'" alt="">
            <p class="art">'.$registro['nombre'].'</p>
            <p class="cost">$'.number_format($registro['precio'],2,",",".").'</p>
            <p class="stock">disponibilidad: '.$registro['Stock_art'].'</p>
            <a href="carrito.php?ID_prod='.$registro['ID_art'].'"><i class="fa-solid fa-cart-plus"></i> Agregar</a>
            </div>';
    };

?>