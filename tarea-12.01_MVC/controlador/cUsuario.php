<?php
require_once "modelo/mUsuario.php";

class cUsuario {

    public $nombreVista = "";
    private $modeloUsuario;

    public function __construct() {
        $this->modeloUsuario = new mUsuario();
    }

    // Muestra usuarios con sus deportes
    public function usuariosDeportes() {
        $datos = $this->modeloUsuario->usuariosConDeportes();
        $this->nombreVista = "usuariosDeportes";
        return $datos;
    }

    public function mostrarMenuAdmin(){
        $this->nombreVista = "menuAdmin";
    }
}
