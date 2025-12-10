<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cabecera de Navegación</title>

    <style>
        #cabecera-principal {
            border-bottom: 2px solid #333;
            padding: 10px 20px;
            margin-bottom: 20px;
            background-color: #e75463;
            font-family: Arial, sans-serif;
            font-size: 14px;
            display: flex;
            align-items: center;
            flex-wrap: wrap;
        }

        #cabecera-principal span {
            font-weight: bold;
            color: #0056b3;
            margin-right: 15px;
            padding-right: 15px;
            border-right: 1px solid #ccc;
            white-space: nowrap;
        }

        #cabecera-principal span:last-child {
            border-right: none;
        }

        #cabecera-principal a {
            text-decoration: none;
            color: #333;
            padding: 5px 10px;
            border-radius: 3px;
            transition: background-color 0.2s, color 0.2s;
            margin: 0 5px;
        }

        #cabecera-principal a:hover {
            background-color: #e0e0e0;
            color: #000;
        }

        #cabecera-principal a[href="logout.php"] {
            color: #c0392b;
            font-weight: bold;
        }

        #cabecera-principal a[href="logout.php"]:hover {
            background-color: #c0392b;
            color: #ffffff;
        }
    </style>
</head>

<body>

    <?php
    $correo_usuario = htmlspecialchars($_SESSION['usuario']['Correo'] ?? 'Invitado');
    ?>

    <div id="cabecera-principal">

        <span>
            Usuario: <?php echo $correo_usuario; ?>
        </span>

        <a href="categorias.php">Home (Catálogo)</a>

        <a href="carrito.php">Ver carrito</a>

        <a href="logout.php">Cerrar sesión</a>
    </div>

</body>

</html>