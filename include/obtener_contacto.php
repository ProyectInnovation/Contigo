<?php
session_start();
require_once "database.php";

$conexion = conectarBD();

//  Validar que exista sesión
if (!isset($_SESSION["cliente"])) {
    echo json_encode(null);
    exit;
}


$sql = "SELECT em_nombre, em_telefono, em_parentesco 
        FROM contactos_emergencia 
        ORDER BY id DESC 
        LIMIT 1";


$resultado = $conexion->query($sql);

if ($fila = $resultado->fetch_assoc()) {
    echo json_encode($fila);
} else {
    echo json_encode(null);
}

$conexion->close();
?>
