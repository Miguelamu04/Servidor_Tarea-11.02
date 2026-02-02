<?php
require_once "mConexion.php";

class mDeporte {

    private $conexion;

    public function __construct() {
        $this->conexion = new mConexion();
    }

    // Devuelve todos los deportes en un array
    public function obtenerDeportes() {
        $sql = "SELECT * FROM deportes";
        $resultado = $this->conexion->getConexion()->query($sql);

        $deportes = [];
        while ($fila = $resultado->fetch_assoc()) {
            $deportes[] = $fila;
        }

        return $deportes;
    }

    // Devuelve el total de deportes con alumnos inscritos
    public function totalDeportesConAlumnos() {
        $sql = "
            SELECT COUNT(DISTINCT idDeporte) AS total
            FROM usuarios_deportes
        ";

        $resultado = $this->conexion->getConexion()->query($sql);
        $fila = $resultado->fetch_assoc();

        return $fila['total'];
    }

    // Devuelve cada deporte con el número de usuarios inscritos
    public function deportesConUsuarios() {

        $sql = "
            SELECT 
                deportes.nombreDep,
                COUNT(usuarios_deportes.idUsuario) AS totalUsuarios
            FROM deportes
            LEFT JOIN usuarios_deportes
                ON deportes.idDeporte = usuarios_deportes.idDeporte
            GROUP BY deportes.nombreDep
        ";

        $resultado = $this->conexion->getConexion()->query($sql);

        $datos = [];
        while ($fila = $resultado->fetch_assoc()) {
            $datos[] = $fila;
        }

        return $datos;
    }


}
