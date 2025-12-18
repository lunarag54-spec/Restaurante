<?php
require_once 'sesiones.php';
require_once 'bd.php';
$categorias = getCategorias();
require_once 'cabecera.php';
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorías - NASÜ</title>
    <link rel="stylesheet" href="../css/cssCategorias.css">
</head>

<body>

    <main class="contenido-catalogo">
        <section class="contenedor-categorias">

            <?php foreach ($categorias as $categ):
                $nombre_categ = htmlspecialchars($categ['Nombre']);
                $cod_categ = htmlspecialchars($categ['CodCat']);
                $desc_completa = htmlspecialchars($categ['Descripcion']);

                // Inicialización segura
                $img = "../Image/default.png";
                $alt = "Categoría";

                switch ($cod_categ) {
                    case '1':
                        $img = "../Image/bac.png";
                        $alt = "Bebidas con Alcohol";
                        $desc_completa = "Nuestra selección de cervezas artesanales, vinos y sakes premium, perfectos para acompañar tus platos.";
                        break;

                    case '2':
                        $img = "../Image/bsc.png";
                        $alt = "Bebidas sin Alcohol";
                        $desc_completa = "Refrescos, zumos naturales, tés japoneses y nuestra exclusiva agua mineral, opciones frescas y ligeras.";
                        break;

                    case '3':
                        $img = "../Image/com.png";
                        $alt = "Comida";
                        $desc_completa = "Explora nuestra carta completa: Sushi, Ramen, Gyoza y deliciosos postres japoneses, preparados con ingredientes frescos.";
                        break;
                }
                ?>

                <a href="productos.php?categoria=<?php echo $cod_categ; ?>" class="card-categoria">
                    <div class="card-contenido">
                        <div class="card-info">
                            <h2 class="card-titulo"><?php echo $nombre_categ; ?></h2>
                            <p class="card-descripcion"><?php echo $desc_completa; ?></p>
                            <div class="card-acceso">Acceder al Menú</div>
                        </div>
                        <img src="<?php echo $img; ?>" alt="<?php echo $alt; ?>" class="card-imagen">
                    </div>
                </a>

            <?php endforeach; ?>

        </section>
    </main>

</body>

</html>