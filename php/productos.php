<?php
require_once 'sesiones.php';
require_once 'bd.php';


$codCat = $_GET['categoria'] ?? null;

if (!$codCat) {
    header("Location: categorias.php");
    exit;
}

$productos = getProductosPorCategoria($codCat);

require_once 'cabecera.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos - NASÜ</title>
    <link rel="stylesheet" href="../css/cssProductos.css">
</head>
<body>

<main class="contenedor-productos">
    <h1 style="color: #e75463; text-align: center;">Menú Selección</h1>

    <?php if ($productos && count($productos) > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Peso</th>
                    <th>Stock</th>
                    <th>Añadir al Carrito</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($productos as $prod): 
                    $nombre = $prod['Nombre'] ?? $prod['nombre'] ?? 'Producto';
                    $desc = $prod['Descripcion'] ?? $prod['descripcion'] ?? '';
                    $peso = $prod['Peso'] ?? $prod['peso'] ?? '0';
                    $stock = $prod['Stock'] ?? $prod['stock'] ?? '0';
                    $codP = $prod['CodProd'] ?? $prod['cod'] ?? $prod['id'] ?? '0';
                ?>
                <tr>
                    <td><strong><?php echo htmlspecialchars($nombre); ?></strong></td>
                    <td><?php echo htmlspecialchars($desc); ?></td>
                    <td><?php echo htmlspecialchars($peso); ?> kg</td>
                    <td><?php echo htmlspecialchars($stock); ?> uds</td>
                    <td>
                        <form action="anadir.php" method="POST">
                            <input type="hidden" name="cod" value="<?php echo htmlspecialchars($codP); ?>">
                            <input type="hidden" name="categoria_anterior" value="<?php echo htmlspecialchars($codCat); ?>">
                            
                            <input type="number" name="unidades" value="1" min="1" required class="input-unidades">
                            <button type="submit" class="btn-anadir">Añadir</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p style="text-align: center; padding: 20px;">No hay productos disponibles en esta categoría.</p>
    <?php endif; ?>

    <p style="text-align: center; margin-top: 20px;">
        <a href="categorias.php" style="color: #e75463; font-weight: bold; text-decoration: none;">← Volver al catálogo</a>
    </p>
</main>

</body>
</html>