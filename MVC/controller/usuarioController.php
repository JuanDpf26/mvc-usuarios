<?php
session_start();
include(__DIR__ . "/../model/conexión.php");
include(__DIR__ . "/../model/usuarioModel.php");

$model = new UsuarioModel($conexion);

// Crear usuario
if (isset($_POST['accion']) && $_POST['accion'] === 'crear') {
    $nombre = $_POST['nombre'];
    $password = $_POST['password'];
    $model->crear($nombre, $password);
    header("Location: ../view/lista.php");
    exit;
}

// Actualizar usuario
if (isset($_POST['accion']) && $_POST['accion'] === 'editar') {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $model->actualizar($id, $nombre);
    header("Location: ../view/lista.php");
    exit;
}

// Eliminar usuario
if (isset($_GET['accion']) && $_GET['accion'] === 'eliminar') {
    $id = $_GET['id'];
    $model->eliminar($id);
    header("Location: ../view/lista.php");
    exit;
}
?>

