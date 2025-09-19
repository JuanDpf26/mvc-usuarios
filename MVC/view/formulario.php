<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Registrar Usuario</title>
  <link rel="stylesheet" href="../public/estilos.css">
</head>
<body>
  <h2>Registrar Nuevo Usuario</h2>
  <form action="../controller/usuarioController.php" method="POST">
    <input type="hidden" name="accion" value="crear">
    <label>Nombre:</label>
    <input type="text" name="nombre" required>
    <label>Contraseña:</label>
    <input type="password" name="password" required>
    <button type="submit">Registrar</button>
  </form>
</body>
</html>

