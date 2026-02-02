<?php
require_once "config/configdb.php";

class mConexion {

    private $conexion;

    // Crea la conexión con la base de datos
    public function __construct() {
        $this->conexion = new mysqli(SERVIDOR, USUARIO, CLAVE, NOMBRE_BD);
    }

    // Devuelve la conexión para usarla en los modelos
    public function getConexion() {
        return $this->conexion;
    }
}
