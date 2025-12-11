<?php
// categorias.php (Versión con bucle y estructura de tarjetas)
require_once 'sesiones.php';
require_once 'bd.php';
$categorias = getCategorias(); // Obtiene CodCat, Nombre, Descripcion
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
            
            <?php 
            $contador = 0;
            foreach ($categorias as $categ): 
                $contador++;
                $clase_par_impar = ($contador % 2 == 0) ? 'item-par' : 'item-impar';
                
                $nombre_categ = htmlspecialchars($categ['Nombre']);
                $cod_categ = htmlspecialchars($categ['CodCat']);
                $desc_corta = htmlspecialchars($categ['Descripcion']);
                $desc_completa = $desc_corta; 
                $imagen_src = '/Image/patron.jpg'; // Imagen por defecto
                
                // --- Bloque para asignar Imagen y Descripción Larga (AJUSTA LAS RUTAS Y NOMBRES) ---
                switch ($cod_categ) {
                    case 'BAC': 
                        $desc_completa = "Nuestra selección de cervezas artesanales, vinos y sakes premium, perfectos para acompañar tus platos.";
                        // Ajusta la ruta a donde tengas la imagen de alcohol
                        $imagen_src = 'Image\vinoAlcohol.png'; 
                        break;
                    case 'BSC': 
                        $desc_completa = "Refrescos, zumos naturales, tés japoneses y nuestra exclusiva agua mineral, opciones frescas y ligeras.";
                        // Ajusta la ruta a donde tengas la imagen de bebidas sin alcohol
                        $imagen_src = '/Image/botellaAgua.png'; 
                        break;
                    case 'COM': 
                        $desc_completa = "Explora nuestra carta completa: Sushi, Ramen, Gyoza y deliciosos postres japoneses, preparados con ingredientes frescos.";
                        // Ajusta la ruta a donde tengas la imagen de comida
                        $imagen_src = '/Image/sushi.png'; 
                        break;
                }
                // --- Fin del bloque de asignación ---
            ?>

            <a href="productos.php?categoria=<?php echo $cod_categ; ?>" 
               class="card-categoria <?php echo $clase_par_impar; ?>">
                
                <div class="card-imagen-contenedor">
                    <img src="<?php echo $imagen_src; ?>" alt="<?php echo $nombre_categ; ?>" class="card-imagen">
                </div>
                
                <div class="card-info">
                    <h2 class="card-titulo"><?php echo $nombre_categ; ?></h2>
                    <p class="card-descripcion"><?php echo $desc_completa; ?></p>
                    <div class="card-acceso">Acceder al Menú</div>
                </div>
                
            </a>

            <?php endforeach; ?>
            
        </section>

    </main>

</body>

</html>