<?php
require_once "mConexion.php";

class mUsuario {

    private $conexion;

    public function __construct() {
        $this->conexion = new mConexion();
    }

    // Inserta un usuario y devuelve su id
    public function insertarUsuario($nombre, $password, $correo, $telefono, $perfil) {
        $sql = "
            INSERT INTO usuarios (nombreUsuario, password, correo, telefono, perfil)
            VALUES ('$nombre', '$password', '$correo', '$telefono', '$perfil')
        ";
        $this->conexion->getConexion()->query($sql);

        return $this->conexion->getConexion()->insert_id;
    }

    // Inserta un deporte asociado a un usuario
    public function insertarUsuarioDeporte($idUsuario, $idDeporte) {
        $sql = "
            INSERT INTO usuarios_deportes (idUsuario, idDeporte)
            VALUES ($idUsuario, $idDeporte)
        ";
        $this->conexion->getConexion()->query($sql);
    }

    // Comprueba usuario y contraseña
public function login($nombre, $password) {
    $sql = "
        SELECT *
        FROM usuarios
        WHERE nombreUsuario = '$nombre'
        AND password = '$password'
    ";
    $resultado = $this->conexion->getConexion()->query($sql);

    if ($resultado->num_rows == 1) {
        return $resultado->fetch_assoc();
    }

    return null;
}

// Devuelve los usuarios con sus deportes
public function usuariosConDeportes() {
    $sql = "SELECT usuarios.nombreUsuario, deportes.nombreDep
        FROM usuarios
        INNER JOIN usuarios_deportes ON usuarios.idUsuario = usuarios_deportes.idUsuario
        INNER JOIN deportes ON deportes.idDeporte = usuarios_deportes.idDeporte
        ORDER BY usuarios.nombreUsuario
    ";

    $resultado = $this->conexion->getConexion()->query($sql);

    $datos = [];
    while ($fila = $resultado->fetch_assoc()) {
        $datos[] = $fila;
    }

    return $datos;
}


}
