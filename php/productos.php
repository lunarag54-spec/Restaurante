<?php
require_once 'sesiones.php';
require_once 'bd.php';

// Validamos que exista la categoría en la URL para evitar errores
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
    <link rel="stylesheet" href="../css/cssCategorias.css"> <style>
        /* Estilos específicos para la tabla de productos */
        .contenedor-productos {
            width: 95%;
            max-width: 1100px;
            margin: 40px auto;
            background: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th {
            background-color: #e75463;
            color: white;
            padding: 15px;
            text-align: left;
        }
        td {
            padding: 15px;
            border-bottom: 1px solid #f9caca;
        }
        tr:hover {
            background-color: rgba(249, 202, 202, 0.2);
        }
        .btn-anadir {
            background-color: #e75463;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 20px;
            cursor: pointer;
            font-weight: bold;
        }
        .input-unidades {
            width: 50px;
            padding: 5px;
            border: 1px solid #e75463;
            border-radius: 5px;
        }
    </style>
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
                    // Verificación de seguridad para los nombres de las columnas
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