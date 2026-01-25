<?php
require_once __DIR__ . '/../modelo/Musuario.php';

class Cusuario {
    public $nombreVista = "";
    private $modelo;

    public function __construct() {
        $this->modelo = new Usuario();
    }

    public function mostrarLogin() {
        $this->nombreVista = "login";
    }

    public function mostrarAcceso() {
        $this->nombreVista = "acceso";
    }

    public function mostrarRegistro() {
        $this->nombreVista = "registro";
    }

    public function mostrarInicioCorrecto(){
        $this->nombreVista = "inicioCorrecto";
    }

    /* ======== REGISTRAR USUARIO (VULNERABLE) ======== */
    public function registrar() {
        // Recogida de datos directa del $_POST sin sanitizar
        $nombre = $_POST['usuario'];
        $email = $_POST['email'];
        $pass = $_POST['password'];

        // Enviamos los datos "sucios" al modelo
        $this->modelo->insertar($nombre, $email, $pass);

        $this->nombreVista = "login";
        return ["mensaje" => "Usuario registrado (Prueba de inyección realizada)"];
    }

    /* ======== LOGIN (PUNTO CRÍTICO DE LA PRÁCTICA) ======== */
    public function login() {
        // Recogemos el email que contendrá la carga de SQL Injection
        $email = $_POST['email'];
        // El password se ignora en el bypass de login ' OR '1'='1
        $password = $_POST['password']; 

        // Llamada al modelo vulnerable
        $usuario = $this->modelo->login($email);

        if ($usuario) {
            // Si el ataque funciona, $usuario tendrá datos y entrará aquí
            $this->nombreVista = "inicioCorrecto";
            return ["mensaje" => "Inicio de sesión exitoso. Bienvenido: " . $usuario['Nombre']];
        } else {
            $this->nombreVista = "login";
            return ["mensaje" => "Error de acceso"];
        }
    }
    public function cerrarSesion() {
        $this->nombreVista = "login";
    }
}