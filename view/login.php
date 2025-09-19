<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link rel="stylesheet" href="/MVC/estilos.css">
</head>
<body>
<div class="container">
  <form action="../controller/loginController.php" method="POST">
    <h2>🔑 Iniciar Sesión</h2>

    <?php if (isset($_SESSION['error'])): ?>
      <div class="error-msg"><?= $_SESSION['error']; unset($_SESSION['error']); ?></div>
    <?php endif; ?>

    <label class="required">Nombre:</label>
    <input type="text" name="nombre" required>

    <label class="required">Contraseña:</label>
    <input type="password" name="password" required>

    <button type="submit" class="btn btn-primary">Ingresar</button>
  </form>
</div>
</body>
</html>

