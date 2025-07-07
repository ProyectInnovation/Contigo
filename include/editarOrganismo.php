<?php
include 'database.php';
include 'funciones_organismos.php';

$conn = conectarBD();

$error = "";
$tipo = $_GET['tipo'] ?? "";
$id = intval($_GET['id'] ?? 0);

if (!$tipo || !$id) {
    die("Tipo o ID inválido.");
}

$tabla = obtenerTabla($tipo);
if (!$tabla) {
    die("Tipo inválido.");
}

$resultado = $conn->query("SELECT * FROM $tabla WHERE id = $id");
if (!$resultado || $resultado->num_rows === 0) {
    die("Registro no encontrado.");
}
$organismo = $resultado->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['editar'])) {
    $nombre = trim($_POST['nombre'] ?? "");
    $descripcion = trim($_POST['descripcion'] ?? "");
    $direccion = trim($_POST['direccion'] ?? "");
    $latitud = trim($_POST['latitud'] ?? "");
    $longitud = trim($_POST['longitud'] ?? "");

    if ($nombre === "") {
        $error = "El nombre es obligatorio.";
    } elseif (!is_numeric($latitud) || !is_numeric($longitud)) {
        $error = "Latitud y longitud deben ser números válidos.";
    } else {
        $actualizado = actualizarOrganismo($conn, $tipo, $id, $nombre, $descripcion, $direccion, $latitud, $longitud);
        if ($actualizado) {
            header("Location: ../panel_organismos.php");
            exit;
        } else {
            $error = "Error al actualizar el organismo.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Editar Organismo</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
</head>
<body class="bg-light">
<div class="container mt-4">
    <h2>Editar Organismo <?= htmlspecialchars($tipo) ?></h2>
    <?php if ($error): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>
    <form method="post">
        <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input type="text" name="nombre" class="form-control" required value="<?= htmlspecialchars($organismo['nombre']) ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Descripción</label>
            <input type="text" name="descripcion" class="form-control" value="<?= htmlspecialchars($organismo['descripcion']) ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Dirección</label>
            <input type="text" name="direccion" class="form-control" value="<?= htmlspecialchars($organismo['direccion']) ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Latitud</label>
            <input type="text" name="latitud" class="form-control" value="<?= htmlspecialchars($organismo['latitud']) ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Longitud</label>
            <input type="text" name="longitud" class="form-control" value="<?= htmlspecialchars($organismo['longitud']) ?>" required>
        </div>
        <button type="submit" name="editar" class="btn btn-primary">Guardar Cambios</button>
        <a href="../panel_organismos.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
<script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>
