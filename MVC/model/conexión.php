<?php
$conexion = new mysqli("localhost", "root", "", "web2");

if ($conexion->connect_errno) {
    echo "Error de conexión: " . $conexion->connect_error;
    exit();
}
?>
