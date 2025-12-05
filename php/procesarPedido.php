<?php

require_once 'sesiones.php';
require_once 'bd.php';

$codRes = $_SESSION['usuario']['CodRes'];

$carrito = $_SESSION['carrito'];


$codPed = 0;
$conn = database();

try {
    $conn->beginTransaction();

    $codPed = insertarPedido($codRes, $pesoTotal);

    $conn->commit();

    enviarConfirmacionPedido($codPed, $carrito, $codRes);

    unset($_SESSION['carrito']);

    header('Location: exitoPedido.php');

} catch (PDOException $e) {
    if ($conn->inTransaction()) {
        $conn->rollBack();
    }
}

?>