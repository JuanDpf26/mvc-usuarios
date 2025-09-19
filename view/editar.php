<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}

include(__DIR__ . "/../model/conexión.php");
include(__DIR__ . "/../model/usuarioModel.php");

$model = new UsuarioModel($conexion);

// Validar ID recibido
if (!isset($_GET['id'])) {
    header("Location: lista.php");
    exit;
}

$id = intval($_GET['id']);
$usuario = $model->obtenerPorId($id);

if (!$usuario) {
    header("Location: lista.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Editar Usuario</title>
  <link rel="stylesheet" href="/MVC/estilos.css">
</head>
<body>
<div class="container">
  <form action="../controller/usuarioController.php" method="POST">
    <h2>✏️ Editar Usuario</h2>
    <input type="hidden" name="accion" value="editar">
    <input type="hidden" name="id" value="<?= $usuario['id'] ?>">

    <label class="required">Nombre:</label>
    <input type="text" name="nombre" value="<?= htmlspecialchars($usuario['nombre']) ?>" required>

    <label>Nueva Contraseña (opcional):</label>
    <input type="password" name="password" placeholder="Dejar en blanco para no cambiar">

    <button type="submit" class="btn btn-primary">Actualizar</button>
    <a href="lista.php" class="btn btn-secondary">Regresar</a>
  </form>
</div>
</body>
</html>
