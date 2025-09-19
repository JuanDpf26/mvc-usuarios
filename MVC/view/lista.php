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
  <title>Lista de Usuarios</title>
  <link rel="stylesheet" href="../public/estilos.css">
</head>
<body>
  <h2>Usuarios Registrados</h2>
  <a href="formulario.php">Registrar nuevo</a>
  <a href="../controller/loginController.php?logout=1">Cerrar sesión</a>
  <table border="1" cellpadding="10">
    <tr>
      <th>ID</th>
      <th>Nombre</th>
      <th>Acciones</th>
    </tr>
    <?php foreach ($usuarios as $u): ?>
      <tr>
        <td><?= $u['id'] ?></td>
        <td><?= $u['nombre'] ?></td>
        <td>
          <a href="login.php?id=<?= $u['id'] ?>">Editar</a> | 
          <a href="../controller/usuarioController.php?accion=eliminar&id=<?= $u['id'] ?>" onclick="return confirm('¿Seguro que deseas eliminar este usuario?')">Eliminar</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </table>
</body>
</html>

