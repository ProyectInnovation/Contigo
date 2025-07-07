<?php
include 'database.php';
include 'funciones_organismos.php';

$conn = conectarBD();

$tipo = $_GET['tipo'] ?? "";
$id = intval($_GET['id'] ?? 0);

if (!$tipo || !$id) {
    die("Tipo o ID inválido.");
}

$eliminado = eliminarOrganismo($conn, $tipo, $id);

if ($eliminado) {
    header("Location: ../panel_organismos.php");
    exit;
} else {
    die("Error al eliminar el organismo.");
}
