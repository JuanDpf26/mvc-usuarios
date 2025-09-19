<?php
include_once(__DIR__ . "/conexión.php");

class UsuarioModel {
    private $db;

    public function __construct($conexion) {
        $this->db = $conexion;
    }

    public function crear($nombre, $password) {
        $stmt = $this->db->prepare("INSERT INTO usuarios(nombre, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $nombre, $password);
        return $stmt->execute();
    }

    public function listar() {
        $result = $this->db->query("SELECT * FROM usuarios");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function obtenerPorId($id) {
        $stmt = $this->db->prepare("SELECT * FROM usuarios WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function actualizar($id, $nombre, $password = null) {
        if (!empty($password)) {
            $stmt = $this->db->prepare("UPDATE usuarios SET nombre=?, password=? WHERE id=?");
            $stmt->bind_param("ssi", $nombre, $password, $id);
        } else {
            $stmt = $this->db->prepare("UPDATE usuarios SET nombre=? WHERE id=?");
            $stmt->bind_param("si", $nombre, $id);
        }
        return $stmt->execute();
    }

    public function eliminar($id) {
        $stmt = $this->db->prepare("DELETE FROM usuarios WHERE id=?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    public function autenticar($nombre, $password) {
        $stmt = $this->db->prepare("SELECT * FROM usuarios WHERE nombre=? AND password=?");
        $stmt->bind_param("ss", $nombre, $password);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
}
?>
