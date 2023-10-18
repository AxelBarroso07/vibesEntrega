<?php

session_start(); 

if(isset($_SESSION['usuario'])){

    echo $_SESSION['usuario'];
   
  echo '<a href="../form_registro.html">Salir</a>';
}else{
   echo '<a href="../login.html">Ingresar</a>';
}


?>