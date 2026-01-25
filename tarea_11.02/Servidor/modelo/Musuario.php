<?php
require_once __DIR__ . '/../config/configbd.php';

class Usuario {
    private $conexion;

    public function __construct() {
        // Conexión usando mysqli según tu código original
        $this->conexion = new mysqli(SERVIDOR, USUARIO, CLAVE, NOMBRE_BD);
    }

    /* ======== REGISTRO VULNERABLE ======== */
    public function insertar($nombre, $email, $pass) {
        // Concatenación directa de variables sin saneamiento
        $sql = "INSERT INTO usuario (Nombre, Contrasena, Email, Puntuacion, tipoRol)
                VALUES ('$nombre', '$pass', '$email', 0, 'usuario')";
        
        // Mostramos la consulta en pantalla para la práctica
        echo "<div style='border:2px solid black; padding:10px; margin:10px;'>";
        echo "<strong>SQL SELECT Ejecutada:</strong> " . $sql;
        echo "</div>";

        return $this->conexion->query($sql);
    }

    /* ======== LOGIN VULNERABLE (Punto 3 y 4 de la tarea) ======== */
    public function login($email) {
        // Inyección permitida mediante la variable $email
        $sql = "SELECT * FROM usuario WHERE Email = '$email'";
        
        // Mostramos la consulta en pantalla para las capturas del documento
        echo "<div style='border:2px solid black; padding:10px; margin:10px;'>";
        echo "<strong>SQL SELECT Ejecutada:</strong> " . $sql;
        echo "</div>";

        $resultado = $this->conexion->query($sql);
        
        // Retorna la primera fila encontrada
        return $resultado->fetch_assoc();
    }
}