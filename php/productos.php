<?php
require_once 'sesiones.php';
require_once 'bd.php';

$codCat = $_GET['categoria'];

$productos = getProductosPorCategoria($codCat);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
</head>

<body>

    <?php require_once 'cabecera.php'; ?>

    <?php if ($productos): ?>
        <table border="1px">
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Peso (kg)</th>
                <th>Stock</th>
                <th>Añadir al Carrito</th>
            </tr>
            <tr>
                <?php foreach ($productos as $prod): ?>
                <tr>
                    <td><?php echo htmlspecialchars($prod['Nombre']); ?></td>
                    <td><?php echo htmlspecialchars($prod['Descripcion']); ?></td>
                    <td><?php echo htmlspecialchars($prod['Peso']); ?></td>
                    <td><?php echo htmlspecialchars($prod['Stock']); ?></td>
                    <td>
                        <form action="anadir.php" method="POST">
                            <input type="hidden" name="cod" value="<?php echo htmlspecialchars($prod['CodProd']); ?>">

                            <input type="hidden" name="categoria_anterior" value="<?php echo htmlspecialchars($codCat); ?>">

                            <label for="unidades_<?php echo $prod['CodProd']; ?>">Unidades:</label>
                            <input type="number" name="unidades" id="unidades_<?php echo $prod['CodProd']; ?>" value="1" min="1"
                                required class="input-unidades">

                            <button type="submit">Añadir</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tr>
        </table>
    <?php endif; ?>

    <p><a href="categorias.php">Volver al catálogo</a></p>

</body>

</html>