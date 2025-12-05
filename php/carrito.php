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
</head>

<body>
    <?php require_once 'cabecera.php'; ?>

    <table border="1px" align="center">
        <caption>Tu Carrito de Pedido</caption>
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
                            echo number_format($pesoParcial, 2);
                            ?>
                        </td>
                        <td>
                            <a href="eliminar.php?cod=<?php echo htmlspecialchars($codProd); ?>" class="remove-link">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5">Tu carrito está vacío.</td>
                </tr>
            <?php endif; ?>
        </tbody>
        <tr class="total-row">
            <td colspan="3" style="text-align: right;">PESO TOTAL DEL PEDIDO:</td>
            <td><?php echo number_format($pesoTotal, 2); ?></td>
            <td></td>
        </tr>
    </table>

    <div class="action-buttons">
        <a href="categorias.php" class="back">Seguir comprando</a>
        <a href="procesar_pedido.php" class="finish">FINALIZAR PEDIDO</a>
    </div>

    <p><a href="categorias.php">Volver al catálogo</a></p>
</body>

</html>