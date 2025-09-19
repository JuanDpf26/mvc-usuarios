<?php
session_start();
include(__DIR__ . "/../model/conexión.php");
include(__DIR__ . "/../model/usuarioModel.php");

$model = new UsuarioModel($conexion);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $password = $_POST['password'];

    $usuario = $model->autenticar($nombre, $password);

    if ($usuario) {
        $_SESSION['usuario'] = $usuario['nombre'];
        header("Location: ../view/lista.php");
        exit;
    } else {
        $_SESSION['error'] = "Usuario o contraseña incorrectos";
        header("Location: ../view/login.php");
        exit;
    }
}

// Logout
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: ../view/login.php");
    exit;
}
?>

