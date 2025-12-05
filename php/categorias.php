<?php
require_once 'sesiones.php';
require_once 'bd.php';
$categorias = getCategorias();
require_once 'cabecera.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorias</title>
    </head>

<body>
    <table border="1px" align="center">
        <caption>Lista de categorias</caption>
        <tr>
            <th>Nombre</th>
            <th>Descripcion</th>
        </tr>
        <?php foreach ($categorias as $categ): ?>
            <tr>
                <td>
                    <a href="productos.php?categoria=<?php echo htmlspecialchars($categ['CodCat']); ?>">
                        <?php echo htmlspecialchars($categ['Nombre']); ?></a>
                </td>
                <td>
                    (<?php echo htmlspecialchars($categ['Descripcion']); ?>)
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

</body>

</html>