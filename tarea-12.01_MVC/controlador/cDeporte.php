<?php
require_once 'modelo/mDeporte.php';

class cDeporte {

    public $nombreVista = '';
    private $modeloDeporte;

    // Constructor: inicializa el modelo
    public function __construct() {
        $this->modeloDeporte = new mDeporte();
    }

    // Muestra el total de deportes con alumnos
    public function totalDeportes() {
        $datos = $this->modeloDeporte->totalDeportesConAlumnos();
        $this->nombreVista = "totalDeportes";
        return $datos;
    }

    // Muestra deportes con número de usuarios
    public function deportesUsuarios() {
        $datos = $this->modeloDeporte->deportesConUsuarios();
        $this->nombreVista = "deportesUsuarios";
        return $datos;
    }
}
