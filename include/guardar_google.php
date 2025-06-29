<?php
require_once "database.php";

// Recibe los datos
$data = json_decode(file_get_contents("php://input"), true);

if (isset($data["nombre"], $data["correo"])) {
    $conexion = conectarBD();

    $nombre = $data["nombre"];
    $correo = $data["correo"];
    $foto = $data["foto"];

    // Verifica si ya está registrado
    $sqlCheck = "SELECT * FROM registro WHERE correo = '$correo'";
    $result = $conexion->query($sqlCheck);

    if ($result->num_rows === 0) {
        // Si no existe, lo inserta (puedes ajustar según tu estructura)
        $sqlInsert = "INSERT INTO registro (nombre, correo) VALUES ('$nombre', '$correo')";
        if ($conexion->query($sqlInsert)) {
            echo "Registro exitoso con Google";
        } else {
            echo "Error al guardar: " . $conexion->error;
        }
    } else {
        echo "Bienvenido de nuevo $nombre";
    }

    session_start();
    $_SESSION["registro"] = $nombre;

    $conexion->close();
} else {
    echo "Datos incompletos";
}
