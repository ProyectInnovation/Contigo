<!DOCTYPE html>
<html>
<head>
    <title>Datos desde CURP</title>
</head>
<body>

<h2>Obtener datos desde la CURP</h2>

<form method="post">
    <label for="curp">CURP:</label>
    <input type="text" name="curp" id="curp" maxlength="18" required>
    <button type="submit">Consultar</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $curp = strtoupper(trim($_POST["curp"]));

    if (strlen($curp) >= 18) {
        $fecha = substr($curp, 4, 6); // YYMMDD
        $sexo = $curp[10];
        $entidad = substr($curp, 11, 2);

        // Convertir fecha YYMMDD → YYYY-MM-DD
        $anio = intval(substr($fecha, 0, 2));
        $anio += ($anio >= 0 && $anio <= 24) ? 2000 : 1900; // Ajuste por siglo
        $mes = substr($fecha, 2, 2);
        $dia = substr($fecha, 4, 2);
        $fecha_nacimiento = "$anio-$mes-$dia";

        // Catálogo de entidades federativas según RENAPO
        $estados = [
            'AS' => 'Aguascalientes', 'BC' => 'Baja California',
            'BS' => 'Baja California Sur', 'CC' => 'Campeche',
            'CL' => 'Coahuila', 'CM' => 'Colima', 'CS' => 'Chiapas',
            'CH' => 'Chihuahua', 'DF' => 'Ciudad de México',
            'DG' => 'Durango', 'GT' => 'Guanajuato', 'GR' => 'Guerrero',
            'HG' => 'Hidalgo', 'JC' => 'Jalisco', 'MC' => 'Estado de México',
            'MN' => 'Michoacán', 'MS' => 'Morelos', 'NT' => 'Nayarit',
            'NL' => 'Nuevo León', 'OC' => 'Oaxaca', 'PL' => 'Puebla',
            'QT' => 'Querétaro', 'QR' => 'Quintana Roo', 'SP' => 'San Luis Potosí',
            'SL' => 'Sinaloa', 'SR' => 'Sonora', 'TC' => 'Tabasco',
            'TS' => 'Tamaulipas', 'TL' => 'Tlaxcala', 'VZ' => 'Veracruz',
            'YN' => 'Yucatán', 'ZS' => 'Zacatecas', 'NE' => 'Extranjero'
        ];

        $estado = $estados[$entidad] ?? 'Desconocido';

        echo "<h3>Datos extraídos:</h3>";
        echo "<p><strong>Fecha de nacimiento:</strong> $fecha_nacimiento</p>";
        echo "<p><strong>Sexo:</strong> " . ($sexo === 'M' ? 'Mujer' : 'Hombre') . "</p>";
        echo "<p><strong>Estado de nacimiento:</strong> $estado</p>";
    } else {
        echo "<p>⚠️ La CURP debe tener al menos 18 caracteres.</p>";
    }
}
?>

</body>
</html>
