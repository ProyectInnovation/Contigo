<?php
require_once "database.php";

header('Content-Type: application/json'); // Para que devuelva JSON

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['accion']) && $_POST['accion'] === "registro") {
        $requiredUser = ['nombre', 'edad', 'fecha_nacimiento', 'curp', 'correo', 'password', 'tipo_sangre'];
        foreach ($requiredUser as $field) {
            if (empty($_POST[$field])) {
                echo json_encode(['status' => 'error', 'message' => "Por favor llenar el campo $field."]);
                exit;
            }
        }
        $requiredContact = ['em_nombre', 'em_telefono', 'em_parentesco'];
        foreach ($requiredContact as $field) {
            if (empty($_POST[$field])) {
                echo json_encode(['status' => 'error', 'message' => "Falta el campo $field de contacto"]);
                exit;
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

        if (substr($curp, 10, 1) !== "M") {
            echo json_encode(['status' => 'error', 'message' => 'El CURP ingresado no corresponde con los requisitos de la plataforma.']);
            exit;
        }

        $sqlUser = "INSERT INTO registro (nombre, edad, fecha_nacimiento, curp, correo, password, tipo_sangre, salud)
                    VALUES ('$nombre', $edad, '$fecha_nacimiento', '$curp', '$correo', '$password', '$tipo_sangre', '$salud')";

        if (!$conexion->query($sqlUser)) {
            echo json_encode(['status' => 'error', 'message' => 'Error al registrar usuario: ' . $conexion->error]);
            exit;
        }

        $em_nombre = $_POST['em_nombre'];
        $em_telefono = $_POST['em_telefono'];
        $em_parentesco = $_POST['em_parentesco'];

        $sqlContact = "INSERT INTO contactos_emergencia (em_nombre, em_telefono, em_parentesco)
                       VALUES ('$em_nombre', '$em_telefono', '$em_parentesco')";

        if (!$conexion->query($sqlContact)) {
            echo json_encode(['status' => 'error', 'message' => 'Error al registrar contacto de emergencia: ' . $conexion->error]);
            exit;
        }

        $conexion->close();
        echo json_encode(['status' => 'success', 'message' => '¡Registro exitoso!', 'redirect' => '/contigo/contact.php']);
        exit;
    }


    if (isset($_POST['accion']) && $_POST['accion'] === "login") {
        $correo = $_POST['correo'];
        $password = $_POST['password'];

        // ADMIN
        if ($correo === "Contigo@gmail.com" && $password === "equipo") {
            session_start();
            $_SESSION["cliente"] = "Administrador";
            $_SESSION["admin"] = true;
            echo json_encode([
                'status' => 'success',
                'message' => '💼 Bienvenido Administrador 👑',
                'redirect' => '/contigo/panel_organismos.php'
            ]);
            exit;
        }

        // USUARIO NORMAL
        $conexion = conectarBD();
        $sql = "SELECT * FROM registro WHERE correo = '$correo'";
        $resultado = mysqli_query($conexion, $sql);

        if (mysqli_num_rows($resultado) > 0) {
            $row = mysqli_fetch_assoc($resultado);

            if (password_verify($password, $row['password'])) {
                session_start();
                $_SESSION["cliente"] = $row["nombre"];
                echo json_encode([
                    'status' => 'success',
                    'message' => '👋 Bienvenido, ' . $row["nombre"],
                    'redirect' => '/contigo/index.html'
                ]);
            } else {
                echo json_encode([
                    'status' => 'error',
                    'message' => 'Contraseña incorrecta'
                ]);
            }
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'Correo no registrado'
            ]);
        }

        $conexion->close();
        exit;
    }
}
?>