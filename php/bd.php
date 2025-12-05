<?php
// bd.php

function database()
{
    $host = 'localhost';
    $db = 'restaurante';
    $user = 'root';
    $pass = '';
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

function getProducto(int $codProd): array|false
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
