<?php
function mostrarProductos(){
    include('db/conexion_db.php');
    $sql="SELECT * FROM articles";
    $consulta=mysqli_query($conexion, $sql);
    while($registro=mysqli_fetch_assoc($consulta)){
        echo '<div class="card">
            <img src="images/'.$registro['Img_art'].'" alt="">
            <p class="art">'.$registro['Name_art'].'</p>
            <p class="cost">$'.number_format($registro['Price_art'],2,",",".").'</p>
            <p class="stock">disponibilidad: '.$registro['Stock_art'].'</p>
            <a href="carrito.php?ID_prod='.$registro['ID_art'].'"><i class="fa-solid fa-cart-plus"></i> Agregar</a>
        </div>';
    };
}


    function mostrarCarrito(){
        $carrito = $_SESSION['carrito'];
        $total=0;
        echo '<div class="carrito">';
        foreach ($carrito as $indice => $producto) {
            echo '<div class="producto">
                    
                    <img src="../img/productos/'.$producto['img_prod'].'" alt="">
                    <p>'.$producto['nbr_prod'].'</p>
                    <p>Cantidad:<a href="carrito.php?id_restar='.$producto['ID_prod'].'"><br><i class="fa-regular fa-square-minus"></i></a> | '.$producto['cantidad'].' | <a href="carrito.php?id_sumar='.$producto['ID_prod'].'"><i class="fa-regular fa-square-plus"></i></a> </p>
                    <p>Precio Unit: $'.$producto['precio_prod'].'</p>
                    <p class="SubTotal">Subtotal: $'.$producto['cantidad'] * $producto['precio_prod'].'</p>
                </div>';
            $total = $total + $producto['cantidad'] * $producto['precio_prod'];
        }
        echo '<p class="total">Total:$'.$total.'</p>
            <a href="carrito.php?finCompra" class="comprar" onClick="return confirm(\'Seguro desea proceder a comprar\')">Finalizar Compra</a>
            <div class="link">
        <a href="carrito.php?id_borrar='.$producto['ID_prod'].'">eliminar</a>
                <a href="carrito.php?vaciarCarrito">Vaciar Carrito</a>
                <a href="../index.php">Seguir Comprando</a>
            </div>
        </div>';
    }

function mostrarCarritoVacio(){
    echo '
    <div class="vacio">
    <div class="error">Carrito vacio</div>
    <a class="ir-tienda" href="../index.php">Ir a Tienda</a>
    </div>';
}

function agregarProdCarrito($ID_prod){
    include('db/conexion_db.php');
    $sql="SELECT * FROM productos WHERE id_producto = '$ID_prod'";
    $consulta=mysqli_query($conexion, $sql);
    $registro=mysqli_fetch_assoc($consulta);
    if(!isset($_SESSION['carrito'])){
        $primer_prod[]= array(
                    'ID_prod'=>$registro['id_producto'],
                    'img_prod'=> $registro['imagen'],
                    'nbr_prod'=>$registro['nombre'],
                    'precio_prod'=>$registro['precio'],
                    'cantidad' => 1,
                    'stock' =>$registro['cantidad_stock']
                    );
        $_SESSION['carrito'] = $primer_prod;
    }else{
        $carrito = $_SESSION['carrito'];

        if(!ExisteYaProdEnCarrito($ID_prod)){

        $nuevo_prod= array(
                    'ID_prod'=>$registro['id_producto'],
                    'img_prod'=> $registro['imagen'],
                    'nbr_prod'=>$registro['nombre'],
                    'precio_prod'=>$registro['precio'],
                    'cantidad' => 1,
                    'stock' =>$registro['cantidad_stock']
                    );
        array_push($carrito, $nuevo_prod);
        $_SESSION['carrito'] = $carrito;
                }else{
                    sumarCantProd($ID_prod);
                }
        }
    
}

function ExisteYaProdEnCarrito($ID_prod){
    $carrito = $_SESSION['carrito'];
    foreach ($carrito as $indice => $producto) {
        if($producto['ID_prod']== $ID_prod){
            return true;
        }
    }
}



function borrarProdCarrito($id_borrar){
    $carrito = $_SESSION['carrito'];
    foreach ($carrito as $indice => $producto) {
        if($producto['ID_prod']== $id_borrar){
            unset($carrito[$indice]);
        }
    }
    if(count($carrito)>0){
        $_SESSION['carrito'] = $carrito;
    }else{
        unset($_SESSION['carrito']);
    }
}

function vaciarCarrito(){
    unset($_SESSION['carrito']);
}

function sumarCantProd($id_sumar){
    $carrito = $_SESSION['carrito'];
    foreach ($carrito as $indice => $producto) {
        if($producto['ID_prod'] == $id_sumar){
            if($producto['cantidad'] < $producto['stock']){
            $carrito[$indice]['cantidad']++;
            }
        }
    }
    $_SESSION['carrito'] = $carrito;
}

function restarCantProd($id_restar){
    $carrito = $_SESSION['carrito'];
    foreach ($carrito as $indice => $producto) {
        if($producto['ID_prod'] == $id_restar){
            if($producto['cantidad'] >= 2){
            $carrito[$indice]['cantidad']--;
            $_SESSION['carrito'] = $carrito;
            }else{
                borrarProdCarrito($id_restar);
            }
        }   
    }
}


