<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}

include(__DIR__ . "/../model/conexión.php");
include(__DIR__ . "/../model/usuarioModel.php");

$model = new UsuarioModel($conexion);
$usuarios = $model->listar();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Usuarios Registrados</title>
  <link rel="stylesheet" href="/MVC/estilos.css">
</head>
<body>
<div class="container">
  <h2>👥 Usuarios Registrados</h2>
  <div style="margin-bottom: 1rem;">
    <a href="formulario.php" class="btn btn-primary">➕ Registrar nuevo</a>
    <a href="../controller/loginController.php?logout=1" class="btn btn-secondary">🚪 Cerrar sesión</a>
  </div>

  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($usuarios as $u): ?>
        <tr>
          <td><?= $u['id'] ?></td>
          <td><?= $u['nombre'] ?></td>
          <td>
            <a href="editar.php?id=<?= $u['id'] ?>" class="btn btn-secondary">✏️ Editar</a>
            <a href="../controller/usuarioController.php?accion=eliminar&id=<?= $u['id'] ?>" 
               class="btn btn-danger"
               onclick="return confirm('¿Seguro que deseas eliminar este usuario?')">🗑 Eliminar</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
</body>
</html>


