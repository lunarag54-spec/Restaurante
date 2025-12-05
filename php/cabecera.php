<?php
$correo_usuario = htmlspecialchars($_SESSION['usuario']['Correo'] ?? 'ERROR');

?>
<div id="cabecera-principal"
    style="border-bottom: 2px solid #333; padding: 10px 0; margin-bottom: 20px; background-color: #f4f4f4;">

    <span style="font-weight: bold; margin-right: 15px;">
        Usuario: <?php echo $correo_usuario; ?>
    </span>

    | &nbsp;

    <a href="categorias.php">Home (Catálogo)</a>

    &nbsp; | &nbsp;

    <a href="carrito.php">Ver carrito</a>

    &nbsp; | &nbsp;

    <a href="logout.php">Cerrar sesión</a>

    &nbsp; |

</div>