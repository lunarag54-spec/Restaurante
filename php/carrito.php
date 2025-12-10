<?php
require_once 'sesiones.php';
require_once 'bd.php';

$pesoTotal = 0;
$carrito = $_SESSION['carrito'] ?? [];
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito</title>
    <link rel="stylesheet" href="../css/cssCarrito.css">
</head>

<body>
    <?php require_once 'cabecera.php'; ?>

    <div class="container-carrito">
        <h2 class="titulo-carrito">Tu Carrito de Pedidos</h2>

        <table class="tabla-carrito">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Unidades</th>
                    <th>Peso Unitario (kg)</th>
                    <th>Peso Total (kg)</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($carrito)): ?>
                    <?php foreach ($carrito as $codProd => $item): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($item['Nombre']); ?></td>
                            <td><?php echo htmlspecialchars($item['Unidades']); ?></td>
                            <td><?php echo htmlspecialchars($item['Peso']); ?></td>
                            <td>
                                <?php
                                $pesoUnitario = (float) ($item['Peso'] ?? 0);
                                $cantidad = (int) ($item['Unidades'] ?? 0);
                                $pesoParcial = $pesoUnitario * $cantidad;
                                $pesoTotal += $pesoParcial;
                                echo number_format($pesoParcial, 2); // Formateamos a 2 decimales para mayor claridad
                                ?>
                            </td>
                            <td>
                                <a href="eliminar.php?cod=<?php echo htmlspecialchars($codProd); ?>" class="remove-link">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="carrito-vacio">Tu carrito está vacío.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3" class="total-label">PESO TOTAL DEL PEDIDO:</td>
                    <td class="total-peso"><?php echo number_format($pesoTotal, 2); ?></td>
                    <td></td>
                </tr>
            </tfoot>
        </table>

        <div class="acciones-carrito">
            <a href="procesarPedido.php" class="finish-button">FINALIZAR PEDIDO</a>
            <a href="categorias.php" class="back-button">Seguir comprando</a>
        </div>

        <p class="volver-link"><a href="categorias.php">Volver al catálogo</a></p>
    </div>

</body>

</html>