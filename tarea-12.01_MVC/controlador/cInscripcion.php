<?php
require_once "modelo/mDeporte.php";
require_once "modelo/mUsuario.php";

class cInscripcion {

    public $nombreVista = "";
    private $modeloDeporte;
    private $modeloUsuario;

    public function __construct() {
        $this->modeloDeporte = new mDeporte();
        $this->modeloUsuario = new mUsuario();
    }

    // Muestra el formulario
    public function mostrarFormulario() {
        $datos = $this->modeloDeporte->obtenerDeportes();
        $this->nombreVista = "formularioInscripcion";
        return $datos;
    }

    // Procesa la inscripción
    public function procesarInscripcion() {

        // 1. Comprobar condiciones
        if (!isset($_POST['condiciones'])) {
            $this->nombreVista = "formularioInscripcion";
            return $this->modeloDeporte->obtenerDeportes();
        }

        // 2. Recoger datos del formulario
        $nombre   = $_POST['nombreUsuario'];
        $password = $_POST['password'];
        $correo   = $_POST['correo'];
        $telefono = $_POST['telefono'];
        $perfil   = 'u'; 

        // 3. Insertar usuario
        $idUsuario = $this->modeloUsuario->insertarUsuario(
            $nombre,
            $password,
            $correo,
            $telefono,
            $perfil
        );

        // 4. Insertar deportes seleccionados
        if (isset($_POST['deportes'])) {
            foreach ($_POST['deportes'] as $idDeporte) {
                $this->modeloUsuario->insertarUsuarioDeporte($idUsuario, $idDeporte);
            }
        }

        // 5. Volver al inicio
        $this->nombreVista = "inicio";
        return null;
    }
}
