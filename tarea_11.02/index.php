<?php
session_start();
require_once 'Servidor/config/rutas.php';

// Controlador por defecto
if(!isset($_GET['c'])) $_GET['c'] = CONTROLADOR_USUARIO;

// Método por defecto
if(!isset($_GET['m'])) $_GET['m'] = METODO_PREDETERMINADO;

// Incluimos el controlador solicitado
$rutaControlador = RUTA_CONTROLADORES . $_GET['c'] . '.php';
require_once $rutaControlador;

// Instancia del controlador
$controlador = $_GET['c'];
$objControlador = new $controlador();

// Ejecutar método
if(method_exists($objControlador, $_GET['m'])){
    $datos = $objControlador->{$_GET['m']}();

}

// Mostrar vista
if($objControlador->nombreVista != ''){
    require_once RUTA_VISTAS . $objControlador->nombreVista . '.php';
}
?>
