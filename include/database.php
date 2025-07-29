<?php

function conectarBD()
{
$host = "sql7.freesqldatabase.com";
$usuario = "sql7792463";
$password = "Proyecto_1001"; // reemplaza por tu contraseña real
$database = "sql7792463";

    $con = mysqli_connect($host, $usuario, $password, $database);

    if (!$con) {
        die("Fallo la conexión: " . mysqli_connect_error());
    }
    return $con;
}

// Prueba directa
$conexion = conectarBD();
echo "¡Conexión exitosa a db4free.net!";
?>