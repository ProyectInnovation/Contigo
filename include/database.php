<?php
function conectarBD()
{
    $host = "sql7.freesqldatabase.com";
    $usuario = "sql7792463";
    $password = "Proyecto_1001";
    $database = "sql7792463";

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$database;charset=utf8", $usuario, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        die("Error de conexión: " . $e->getMessage());
    }
}
?>
