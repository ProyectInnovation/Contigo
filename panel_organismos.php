<?php
include 'include/database.php';
include 'include/funciones_organismos.php';

// Conexión a la base de datos
$conn = conectarBD();

$error = "";
$mostrar_formulario = "";

// Procesar el formulario para agregar
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['agregar'])) {
   $tipo = $_POST['tipo'] ?? "";
   $nombre = trim($_POST['nombre'] ?? "");
   $descripcion = trim($_POST['descripcion'] ?? "");
   $direccion = trim($_POST['direccion'] ?? "");

   if ($nombre === "") {
      $error = "El nombre es obligatorio.";
      $mostrar_formulario = $tipo;
   } else {
      $resultado = insertarOrganismo($conn, $tipo, $nombre, $descripcion, $direccion);
      if ($resultado) {
         header("Location: panel_organismos.php");
         exit;
      } else {
         $error = "Error al insertar el organismo.";
         $mostrar_formulario = $tipo;
      }
   }
}

// Obtener datos
$organismos_salud = obtenerOrganismos($conn, "organismos_salud");
$organismos_judiciales = obtenerOrganismos($conn, "organismos_judiciales");
$organismos_psicologicos = obtenerOrganismos($conn, "organismos_psicologicos");
?>
<!DOCTYPE html>
<html lang="es">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Panel Organismos</title>
   <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body class="bg-light">

   <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
         <a class="navbar-brand" href="#">Panel Organismos</a>
         <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
               <li class="nav-item">
                  <a class="nav-link" href="contact.php">Cerrar sesión</a>
               </li>
            </ul>
         </div>
      </div>
   </nav>

   <div class="container mt-4">
      <h2 class="text-center mb-4">Gestión de Organismos</h2>

      <!-- Botones -->
      <div class="mb-4 text-center">
         <button class="btn btn-success me-2" onclick="mostrarFormulario('salud')">Agregar Salud</button>
         <button class="btn btn-primary me-2" onclick="mostrarFormulario('judicial')">Agregar Judicial</button>
         <button class="btn btn-warning" onclick="mostrarFormulario('psicologico')">Agregar Psicológico</button>
      </div>

      <!-- Formularios -->
      <?php
      $tipos = ['salud' => 'Salud', 'judicial' => 'Judicial', 'psicologico' => 'Psicológico'];
      $colores = ['salud' => 'success', 'judicial' => 'primary', 'psicologico' => 'warning'];

      foreach ($tipos as $tipo_key => $tipo_nombre):
         ?>
         <div id="form-<?= $tipo_key ?>" style="display: <?= ($mostrar_formulario == $tipo_key) ? 'block' : 'none' ?>;"
            class="card mb-4">
            <div
               class="card-header bg-<?= $colores[$tipo_key] ?> text-<?= ($tipo_key == 'psicologico') ? 'dark' : 'white' ?>">
               Agregar Organismo de <?= $tipo_nombre ?>
            </div>
            <div class="card-body">
               <?php if ($mostrar_formulario == $tipo_key && $error): ?>
                  <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
               <?php endif; ?>
               <form method="post">
                  <input type="hidden" name="tipo" value="<?= $tipo_key ?>">
                  <input type="hidden" name="agregar" value="1">
                  <div class="mb-3">
                     <label class="form-label">Nombre</label>
                     <input type="text" name="nombre" class="form-control" required>
                  </div>
                  <div class="mb-3">
                     <label class="form-label">Descripción</label>
                     <input type="text" name="descripcion" class="form-control">
                  </div>
                  <div class="mb-3">
                     <label class="form-label">Dirección</label>
                     <input type="text" name="direccion" class="form-control">
                  </div>
                  <button type="submit" class="btn btn-<?= $colores[$tipo_key] ?>">Agregar <?= $tipo_nombre ?></button>
               </form>
            </div>
         </div>
      <?php endforeach; ?>

      <!-- Tablas -->
      <?php
      $listas = [
         'salud' => $organismos_salud,
         'judicial' => $organismos_judiciales,
         'psicologico' => $organismos_psicologicos
      ];

      foreach ($tipos as $tipo_key => $tipo_nombre):
         ?>
         <div class="card mb-4">
            <div
               class="card-header bg-<?= $colores[$tipo_key] ?> text-<?= ($tipo_key == 'psicologico') ? 'dark' : 'white' ?>">
               Organismos de <?= $tipo_nombre ?>
            </div>
            <div class="card-body">
               <?php if (count($listas[$tipo_key]) > 0): ?>
                  <table class="table table-striped">
                     <thead>
                        <tr>
                           <th>Nombre</th>
                           <th>Descripción</th>
                           <th>Dirección</th>
                           <th>Acciones</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php foreach ($listas[$tipo_key] as $org): ?>
                           <tr>
                              <td><?= htmlspecialchars($org['nombre']) ?></td>
                              <td><?= htmlspecialchars($org['descripcion']) ?></td>
                              <td><?= htmlspecialchars($org['direccion']) ?></td>
                              <td>
                                 <a href="include/editarOrganismo.php?tipo=<?= $tipo_key ?>&id=<?= $org['id'] ?>"
                                    class="btn btn-sm btn-warning">Editar</a>
                                 <a href="include/eliminarOrganismo.php?tipo=<?= $tipo_key ?>&id=<?= $org['id'] ?>"
                                    class="btn btn-sm btn-danger"
                                    onclick="return confirm('¿Seguro que deseas eliminar este organismo?');">Eliminar</a>

                              </td>
                           </tr>
                        <?php endforeach; ?>
                     </tbody>
                  </table>
               <?php else: ?>
                  <p>No hay organismos de <?= strtolower($tipo_nombre) ?> registrados.</p>
               <?php endif; ?>
            </div>
         </div>
      <?php endforeach; ?>

   </div>

   <script>
      function mostrarFormulario(tipo) {
         ['salud', 'judicial', 'psicologico'].forEach(t => {
            document.getElementById('form-' + t).style.display = 'none';
         });
         document.getElementById('form-' + tipo).style.display = 'block';
      }
   </script>

   <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>