

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exito pedido</title>
    <link rel="stylesheet" href="../css/cssExito.css">
</head>

<body>
    <div class="divGeneral">
    <?php

        require_once 'sesiones.php';

        echo '<div class="mensajeExito">Pedido realizado con exito</div>' ;

    ?>

        <div class="botonVolver">
            <a href="categorias.php">Volver</a>
        </div>
    </div>
    

</body>

</html>