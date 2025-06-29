<?php
require_once "database.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['accion']) && $_POST['accion'] === "registro") {
        // Validar campos obligatorios
        $requiredUser = ['nombre', 'edad', 'fecha_nacimiento', 'curp', 'correo', 'password', 'tipo_sangre'];
        foreach ($requiredUser as $field) {
            if (empty($_POST[$field])) {
                echo "<script>alert('Por fvor llenar el campo $field.'); history.back();</script>";
            }
        }
        $requiredContact = ['em_nombre', 'em_telefono', 'em_parentesco'];
        foreach ($requiredContact as $field) {
            if (empty($_POST[$field])) {
                die("Falta el campo $field de contacto");
            }
        }

        $conexion = conectarBD();

        $nombre = $_POST['nombre'];
        $edad = (int) $_POST['edad'];
        $fecha_nacimiento = $_POST['fecha_nacimiento'];
        $curp = strtoupper($_POST['curp']);
        $correo = $_POST['correo'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $tipo_sangre = $_POST['tipo_sangre'];
        $salud = isset($_POST['salud']) ? $_POST['salud'] : '';


        // Validar que CURP sea mujer
        if (substr($curp, 10, 1) !== "M") {
            echo "<script>alert('Solo se permite el registro de mujeres.'); history.back();</script>";
            exit;
        }

        // Insertar usuario
        $sqlUser = "INSERT INTO registro (nombre, edad, fecha_nacimiento, curp, correo, password, tipo_sangre, salud)
                    VALUES ('$nombre', $edad, '$fecha_nacimiento', '$curp', '$correo', '$password', '$tipo_sangre', '$salud')";

        if (!$conexion->query($sqlUser)) {
            die("Error al registrar usuario: " . $conexion->error);
        }

        // Insertar contacto emergencia
        $em_nombre = $_POST['em_nombre'];
        $em_telefono = $_POST['em_telefono'];
        $em_parentesco = $_POST['em_parentesco'];


        $sqlContact = "INSERT INTO contactos_emergencia (em_nombre, em_telefono, em_parentesco)
                       VALUES ('$em_nombre', '$em_telefono', '$em_parentesco')";

        if (!$conexion->query($sqlContact)) {
            die("Error al registrar contacto de emergencia: " . $conexion->error);
        }

        echo "<script>alert('¡Registro exitoso!'); window.location.href='/contigo/contact.php';</script>";


        $conexion->close();
    }


    if (isset($_POST['accion']) && $_POST['accion'] === "login") {
        $correo = $_POST['correo'];
        $password = $_POST['password'];

        // ADMIN (correo y contraseña vacíos)
        if ($correo === "" && $password === "") {
            session_start();
            $_SESSION["cliente"] = "Administrador";
            $_SESSION["admin"] = true;
            echo "<script>alert('Inicio como administrador'); window.location.href='admin.php';</script>";
            exit;
        }

        // Conexión
        $conexion = conectarBD();

        $sql = "SELECT * FROM registro WHERE correo = '$correo'";
        $resultado = mysqli_query($conexion, $sql);

        if (mysqli_num_rows($resultado) > 0) {
            $row = mysqli_fetch_assoc($resultado);

            if (password_verify($password, $row['password'])) {
                session_start();
                $_SESSION["cliente"] = $row["nombre"];
                echo "<script>alert('Inicio de sesión exitoso'); window.location.href='/contigo/index.html';</script>";
            } else {
                echo "<script>alert('Contraseña incorrecta'); history.back();</script>";
            }
        } else {
            echo "<script>alert('Correo no registrado'); history.back();</script>";
        }

        $conexion->close();
    }
}
?>