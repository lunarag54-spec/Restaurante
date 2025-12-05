<?php

require_once 'sesiones.php';
require_once 'bd.php';

$cod = $_GET['cod'];

if(isset($_SESSION['carrito'][$cod])){
    unset($_SESSION['carrito'][$cod]);
}else{
    header ('Location: carrito.php');
}

header ('Location: carrito.php');

?>