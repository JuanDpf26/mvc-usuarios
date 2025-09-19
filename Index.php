<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>MVC App - Gestión de Usuarios</title>
 <link rel="stylesheet" href="estilos.css">
</head>
<body>
<header>
  <h1>✨ MVC App - Gestión de Usuarios</h1>
  <nav>
    <a href="Index.php">🏠 Inicio</a>
    <a href="../MVC/view/lista.php">👥 Lista de usuarios</a>
    <a href="../MVC/view/formulario.php">➕ Registrar usuario</a>
    <?php if (isset($_SESSION['usuario'])): ?>
        <a href="controller/loginController.php?logout=1">🚪 Cerrar sesión</a>
    <?php else: ?>
        <a href="/MVC/view/login.php">🔑 Login</a>
    <?php endif; ?>
  </nav>
</header>

<main>
  <h2>Bienvenido/a</h2>
  <?php if (isset($_SESSION['usuario'])): ?>
      <p>Hola <strong><?= htmlspecialchars($_SESSION['usuario']['nombre']); ?></strong>, estás conectado 🎉</p>
  <?php else: ?>
      <p>Esta es la parte estática del sitio publicada en <strong>GitHub Pages</strong>.</p>
      <p>El CRUD de usuarios y el login están disponibles en el backend <strong>PHP</strong>.</p>
  <?php endif; ?>
</main>

<footer>
  <p>© 2025 - Proyecto MVC | Desarrollado con ❤️ en PHP & MySQL</p>
</footer>
</body>
</html>

