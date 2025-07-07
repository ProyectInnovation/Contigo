<?php

require_once "database.php";


function insertarOrganismo($conn, $tipo, $nombre, $descripcion, $direccion)
{
    $tabla = obtenerTabla($tipo);
    if (!$tabla)
        return false;

    $stmt = $conn->prepare("INSERT INTO $tabla (nombre, descripcion, direccion) VALUES (?, ?, ?)");
    if (!$stmt) {
        error_log("Error en prepare insertarOrganismo: " . $conn->error);
        return false;
    }

    if (!$stmt->bind_param("sss", $nombre, $descripcion, $direccion)) {
        error_log("Error en bind_param insertarOrganismo: " . $stmt->error);
        return false;
    }

    if (!$stmt->execute()) {
        error_log("Error en execute insertarOrganismo: " . $stmt->error);
        return false;
    }

    $stmt->close();
    return true;
}


function obtenerOrganismos($conn, $tabla)
{
    $datos = [];
    $resultado = $conn->query("SELECT id, nombre, descripcion, direccion, latitud, longitud FROM $tabla ORDER BY nombre");
    if ($resultado) {
        while ($row = $resultado->fetch_assoc()) {
            $datos[] = $row;
        }
        $resultado->free();
    }
    return $datos;
}



function eliminarOrganismo($conn, $tipo, $id)
{
    $tabla = obtenerTabla($tipo);
    if (!$tabla)
        return false;

    $stmt = $conn->prepare("DELETE FROM $tabla WHERE id = ?");
    if (!$stmt) {
        error_log("Error en prepare eliminarOrganismo: " . $conn->error);
        return false;
    }

    if (!$stmt->bind_param("i", $id)) {
        error_log("Error en bind_param eliminarOrganismo: " . $stmt->error);
        return false;
    }

    if (!$stmt->execute()) {
        error_log("Error en execute eliminarOrganismo: " . $stmt->error);
        return false;
    }

    $stmt->close();
    return true;
}

function actualizarOrganismo($conn, $tipo, $id, $nombre, $descripcion, $direccion, $latitud, $longitud)
{
    $tabla = obtenerTabla($tipo);
    if (!$tabla)
        return false;

    $stmt = $conn->prepare("UPDATE $tabla SET nombre = ?, descripcion = ?, direccion = ?, latitud = ?, longitud = ? WHERE id = ?");
    if (!$stmt) {
        error_log("Error en prepare actualizarOrganismo: " . $conn->error);
        return false;
    }

    if (!$stmt->bind_param("ssssdi", $nombre, $descripcion, $direccion, $latitud, $longitud, $id)) {
        error_log("Error en bind_param actualizarOrganismo: " . $stmt->error);
        return false;
    }

    if (!$stmt->execute()) {
        error_log("Error en execute actualizarOrganismo: " . $stmt->error);
        return false;
    }

    $stmt->close();
    return true;
}


function obtenerTabla($tipo)
{
    return match ($tipo) {
        'salud' => 'organismos_salud',
        'judicial' => 'organismos_judiciales',
        'psicologico' => 'organismos_psicologicos',
        default => false,
    };
}
?>