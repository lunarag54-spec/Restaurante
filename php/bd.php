<?php
// bd.php

function database()
{
    $host = 'localhost';
    $db = 'restaurante';
    $user = 'alex';
    $pass = '1234';
    $charset = 'utf8mb4';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ];

    try {
        $pdo = new PDO($dsn, $user, $pass, $options);
        return $pdo;
    } catch (\PDOException $e) {
        error_log("Error de conexión a la base de datos: " . $e->getMessage());
        return false;
    }
}

function buscarUsuario($correo, $clave)
{
    $conn = database();
    if (!$conn) {
        return false;
    }

    try {
        $sql = "SELECT CodRes, Correo FROM restaurantes WHERE Correo = :correo AND Clave = :clave";
        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':correo', $correo);
        $stmt->bindParam(':clave', $clave);

        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("Error en buscarUsuario: " . $e->getMessage());
        return false;
    }
}

function getCategorias()
{
    $conn = database();
    if (!$conn) {
        return false;
    }

    try {
        $sql = "SELECT * FROM categorias ORDER BY Nombre";
        $stmt = $conn->query($sql);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("Error en getCategorias: " . $e->getMessage());
        return false;
    }
}

function getProductosPorCategoria($codCat)
{
    $conn = database();
    if (!$conn) {
        return false;
    }

    try {
        $sql = "SELECT * FROM productos Where Categoria = :codCat ";
        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':codCat', $codCat, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("Error en getCategorias: " . $e->getMessage());
        return false;
    }
}

function getProducto($codProd): array|false
{
    $conn = database();
    if (!$conn) {
        return false;
    }

    try {
        $sql = "SELECT CodProd, Nombre, Descripcion, Peso FROM productos WHERE CodProd = :codProd";

        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':codProd', $codProd, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("Error en getProducto: " . $e->getMessage());
        return false;
    }
}

function insertarPedido($codRes, $pesoTotal)
{
    $conn = database();
    if (!$conn) {
        return false;
    }

    try {
        $sql = "INSERT INTO pedidos (CodRes, Fecha, Enviado, PesoTotal)
                VALUES (:codRes, NOW(), 0, :pesoTotal)";

        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':codRes', $codRes, PDO::PARAM_INT);
        $stmt->bindParam(':pesoTotal', $pesoTotal, PDO::PARAM_STR);

        $stmt->execute();

        return $conn->lastInsertId();
    } catch (PDOException $e) {
        error_log("Error en insertarPedido: " . $e->getMessage());
        return false;
    }
}

function insertarPedidoProducto(int $codPed, int $codProd, int $unidades): bool
{
    $conn = database();
    if (!$conn) {
        return false;
    }

    try {
        $sql = "INSERT INTO pedidosproductos (Pedido, Producto, Unidades)
                VALUES (:codPed, :codProd, :unidades)";

        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':codPed', $codPed, PDO::PARAM_INT);
        $stmt->bindParam(':codProd', $codProd, PDO::PARAM_INT);
        $stmt->bindParam(':unidades', $unidades, PDO::PARAM_INT);

        $stmt->execute();

        return true;
    } catch (PDOException $e) {
        error_log("Error en insertarPedidoProducto: " . $e->getMessage());
        return false;
    }
}

function enviarConfirmacionPedido($codPed, $carrito, $codRes)
{
    $destino = "pedrogamerlol37@gmail.com";

    $asunto = "Nuevo Pedido Confirmado #{$codPed}";

    $mensaje = "¡Se ha registrado un nuevo pedido en el sistema!\\n\\n";
    $mensaje .= "ID del Pedido: {$codPed}\\n";
    $mensaje .= "Restaurante: {$codRes}\\n";
    $mensaje .= "Detalle de Ítems:\\n";

    foreach ($carrito as $item) {
        $mensaje .= "- {$item['Nombre']} x {$item['Unidades']} unidades.\\n";
    }

    $mensaje .= "\\n--\\nFin del reporte automático.";

    $cabeceras = 'From: dfsdsg592@gmail.com';

    return mail($destino, $asunto, $mensaje, $cabeceras);
}