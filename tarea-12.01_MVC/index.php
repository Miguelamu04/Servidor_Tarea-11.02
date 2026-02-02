<?php
    require_once 'config/rutas.php';

    // Si no se indica controlador por la URL, se usa el controlador por defecto
    if(!isset($_GET['c'])) $_GET['c'] = CONTROLADOR_USUARIO;
    
    // Si no se indica método por la URL, se usa el método por defecto
    if(!isset($_GET['m'])) $_GET['m'] = METODO_PREDETERMINADO;

    // Se forma la ruta completa al archivo del controlador que se necesita cargar
    $rutaControlador = RUTA_CONTROLADORES . $_GET['c'] . '.php';

    require_once $rutaControlador;

    // Se crea un objeto de la clase del controlador solicitado
    $controlador = $_GET['c'];
    $objControlador = new $controlador();

    // Variable que almacenará posibles datos enviados a la vista
    $datos = [];

    // Si el método solicitado existe dentro del controlador, lo ejecutamos
    if(method_exists($objControlador, $_GET['m'])){
        // Ejecuta el método indicado y captura los datos que devuelve si los hay
        $datos = $objControlador->{$_GET['m']}(); 
    }

    // Si el controlador indica qué vista cargar, la cargamos
    if($objControlador->nombreVista != ''){
        // Se carga la vista correspondiente usando el nombre indicado por el controlador
        require_once RUTA_VISTAS . $objControlador->nombreVista . '.php';
    }
?>
