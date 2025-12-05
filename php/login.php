<?php

session_start();

require_once 'bd.php';

$error = false;

if (isset($_SESSION['usuario'])) {
    header('Location: categorias.php');
    exit;
}

//if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//    echo "Número de campos enviados en POST: " . count($_POST) . "<br>";
//    echo "<pre>";
//    print_r($_POST);
//    echo "</pre>";
//}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $correo = $_POST['Correo'];
    $Clave = $_POST['Clave'];

    $user = buscarUsuario($correo, $Clave);

    if ($user) {
        $_SESSION['usuario'] = [
            'CodRes' => $user['CodRes'],
            'Correo' => $user['Correo']
        ];

        header('Location: categorias.php');
        exit;
    } else {
        $error = true;
    }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="../css/csspresentacion.css">
</head>

<body>
    <div class="contenedor-global">
        <div class="imagen-login">
            <img src="../Image/ibmoon-kim-74zxMOAE_HM-unsplash.webp" alt="Login Image">
        </div>
        
        <div class="div-form-login">
            <form method="POST" class="login-form">
                <h2 class="titulo-login">Login</h2>
                
                <?php
                if ($error == true) {
                    echo '<p class="error-mensaje">USUARIO O CONTRASEÑA INCORRECTOS</p>';
                }
                ?>

                <div class="div-input">
                    <input class="correo" name="Correo" type="email" required placeholder="Email">
                </div>

                <div class="div-input">
                    <input class="clave" name="Clave" type="password" required placeholder="Contraseña">
                </div>

                <button type="submit" class="boton-login">Login</button>
            </form>
        </div>
    </div>
</body>

</html>