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
    // Esto simula la obtención del correo del usuario de la sesión
    $correo_usuario = htmlspecialchars($_SESSION['usuario']['Correo'] ?? 'Invitado');
    ?>

    <header id="cabecera-principal">

        <div class="logo">
            <h1>Mi Restaurante</h1>
        </div>

        <div class="info-usuario">
            <span>
                Usuario: **<?php echo $correo_usuario; ?>**
            </span>
        </div>

        <nav class="menu-navegacion">
            <a href="categorias.php">Home (Catálogo)</a>
            <a href="carrito.php" class="enlace-carrito">
                Ver carrito (0) 🛒 </a>
            <a href="logout.php" class="enlace-logout">Cerrar sesión</a>
        </nav>
        
    </header>
    </body>

</html>