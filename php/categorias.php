<?php
// categorias.php (Versión HTML Fija y Simple)
require_once 'sesiones.php';
require_once 'bd.php';
// Solo requerimos las funciones, no iteramos sobre los resultados
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
            
            <a href="productos.php?categoria=BAC" 
               class="card-categoria item-impar">
                
                <div class="card-imagen-contenedor">
                    <img src="../Image/vinoAlcohol.png" alt="Bebidas con Alcohol" class="card-imagen">
                </div>
                
                <div class="card-info">
                    <h2 class="card-titulo">BEBIDAS CON ALCOHOL</h2>
                    <p class="card-descripcion">Nuestra selección de cervezas artesanales, vinos y sakes premium, perfectos para acompañar tus platos.</p>
                    <div class="card-acceso">Acceder al Menú</div>
                </div>
                
            </a>

            <a href="productos.php?categoria=BSC" 
               class="card-categoria item-par">
                
                <div class="card-imagen-contenedor">
                    <img src="../Image/botellaAgua.png" alt="Bebidas sin Alcohol" class="card-imagen">
                </div>
                
                <div class="card-info">
                    <h2 class="card-titulo">BEBIDAS SIN ALCOHOL</h2>
                    <p class="card-descripcion">Refrescos, zumos naturales, tés japoneses y nuestra exclusiva agua mineral, opciones frescas y ligeras.</p>
                    <div class="card-acceso">Acceder al Menú</div>
                </div>
                
            </a>

            <a href="productos.php?categoria=COM" 
               class="card-categoria item-impar">
                
                <div class="card-imagen-contenedor">
                    <img src="../Image/sushi.png" alt="Comida" class="card-imagen">
                </div>
                
                <div class="card-info">
                    <h2 class="card-titulo">COMIDA</h2>
                    <p class="card-descripcion">Explora nuestra carta completa: Sushi, Ramen, Gyoza y deliciosos postres japoneses, preparados con ingredientes frescos.</p>
                    <div class="card-acceso">Acceder al Menú</div>
                </div>
                
            </a>

            </section>

    </main>

</body>

</html>