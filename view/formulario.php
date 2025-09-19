<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Registrar Usuario</title>
  <link rel="stylesheet" href="/MVC/estilos.css">
</head>
<body>
<div class="container">
  <form action="../controller/usuarioController.php" method="POST">
    <h2>➕ Registrar Nuevo Usuario</h2>
    <input type="hidden" name="accion" value="crear">

    <label class="required">Nombre:</label>
    <input type="text" name="nombre" required>

    <label class="required">Contraseña:</label>
    <input type="password" name="password" required>

    <button type="submit" class="btn btn-primary">Registrar</button>
    <a href="../public/Index.php" class="btn btn-secondary">Regresar</a>
  </form>
</div>
</body>
</html>

