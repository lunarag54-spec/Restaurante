<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cabecera del Restaurante</title>
    <link rel="stylesheet" href="../css/cssCabecera.css"> 
</head>

<body>
    <?php
    $correo_usuario = htmlspecialchars($_SESSION['usuario']['Correo'] ?? 'Invitado');
    ?>

    <header id="cabecera-principal">

        <div class="logo">
            <img src="..\Image/Gemini_Generated_Image_sbzxh8sbzxh8sbzx.png" alt="Icono de Restaurante" class="logo-icon">
        </div>
        
        <div class="header-right-group">

            <nav class="menu-navegacion">
                <a href="categorias.php" class="enlace-nav">Home (Catálogo)</a>
            </nav>

            <div class="utilidades-usuario">
                
                <a href="carrito.php" class="enlace-carrito">
                    <img src="..\Image/carro1.png" alt="Icono de Carrito normal" class="carrito-icon carrito-base">
    
                    <img src="..\Image/carro2.png" alt="Icono de Carrito al pasar el ratón" class="carrito-icon carrito-hover">

                    <span class="carrito-texto"> (<span id="contador-carrito">0</span>)</span>
                </a>

                <div class="info-usuario">
                    <span>
                        Usuario: **<?php echo $correo_usuario; ?>**
                    </span>
                </div>

                <a href="logout.php" class="enlace-logout">Cerrar sesión</a>
            </div>

        </div>
        
    </header>
    </body>
</html>