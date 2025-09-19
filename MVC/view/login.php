<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link rel="stylesheet" href="../public/estilos.css">
</head>
<body>
  <h2>Iniciar Sesión</h2>
  <?php if (isset($_SESSION['error'])): ?>
    <p style="color:red"><?= $_SESSION['error']; unset($_SESSION['error']); ?></p>
  <?php endif; ?>
  <form action="../controller/loginController.php" method="POST">
    <label>Nombre:</label>
    <input type="text" name="nombre" required>
    <label>Contraseña:</label>
    <input type="password" name="password" required>
    <button type="submit">Ingresar</button>
  </form>
</body>
</html>
