<?php
require_once 'sesiones.php';
require_once 'bd.php';

$codProd = (int) ($_POST['cod'] ?? 0);
$unidades = (int) ($_POST['unidades'] ?? 0);

$producto = getProducto($codProd);

if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}

if (isset($_SESSION['carrito'][$codProd])) {
    $_SESSION['carrito'][$codProd]['Unidades'] += $unidades;
} else {
    $_SESSION['carrito'][$codProd] = [
        'Nombre' => $producto['Nombre'],
        'Peso' => (float) $producto['Peso'],
        'Unidades' => $unidades,
        'codProd' => $codProd,
    ];
}

header('Location: categorias.php');
exit;
?>