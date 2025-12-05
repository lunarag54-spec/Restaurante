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
        <caption>Tu Carrito de Pedidos</caption>
        <tr>
            <th>Producto</th>
            <th>Unidades</th>
            <th>Peso Unitario (kg)</th>
            <th>Peso Total (kg)</th>
            <th>Acción</th>
        </tr>
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
                        echo $pesoParcial;
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
        <tr>
            <td colspan="3" style="text-align: right;">PESO TOTAL DEL PEDIDO:</td>
            <td><?php echo $pesoTotal; ?></td>
            <td></td>
        </tr>
    </table>

    <a href="categorias.php" class="back">Seguir comprando</a>

    <a href="procesarPedido.php" class="finish">FINALIZAR PEDIDO</a>

    <p><a href="categorias.php">Volver al catálogo</a></p>
</body>

</html>