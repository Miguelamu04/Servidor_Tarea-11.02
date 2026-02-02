<?php
require_once "modelo/mUsuario.php";

class cLogin {

    public $nombreVista = "";
    private $modeloUsuario;

    public function __construct() {
        $this->modeloUsuario = new mUsuario();
    }

    // Muestra el formulario de login
    public function mostrarLogin() {
        $this->nombreVista = "login";
        return null;
    }

    // Procesa el login
    public function procesarLogin() {

        $nombre = $_POST['nombreUsuario'];
        $password = $_POST['password'];

        $usuario = $this->modeloUsuario->login($nombre, $password);

        if ($usuario == null) {
            // Login incorrecto
            $this->nombreVista = "login";
            return "Usuario o contraseña incorrectos";
        }

        // Login correcto → decidir vista según perfil
        if ($usuario['perfil'] == 'c') {
            $this->nombreVista = "menuAdmin";
        } else {
            $this->nombreVista = "loginCorrecto";
        }
        return $usuario;
    }
}
