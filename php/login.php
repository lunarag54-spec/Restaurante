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
    <?php

    if ($error == true) {
        echo 'Error en el login :( Vuelve a intentarlo!';
    }

    ?>
    <form method="POST">
        <label>Correo</label>
        <br>
        <input name="Correo" type="email" required placeholder="Coreo@dominio.extension">
        <br>
        <label>Clave</label>
        <br>
        <input name="Clave" type="text" required placeholder="Clave">
        <br>
        <br>
        <button type="submit">Entrar</button>
    </form>
</body>

</html>