<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Deckology - Pantalla de Login</title>
    <link rel="stylesheet" href="Servidor/css/estilo.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="contenedor-principal-login">
        <a id="volver-atras" href="index.php"> ⬅ Volver a inicio</a>
        <form id="formLogin" class="formulario-base" action="index.php?c=Cusuario&m=login" method="post">
            <h2>Iniciar Sesión</h2>
            <p>Accede a tu cuenta de Deckology</p>
            <label for="email">Correo Electrónico:</label>
            <input type="text" name="email" id="email" required>
            <div id="errorEmail" class="errorFormulario"></div>

            <label for="password">Contraseña:</label>
            <div class="contenedor-password">
                <input type="password" name="password" id="password" required>
                <span id="iconoContrasena">🔒</span>
            </div>
            <div id="errorPassword" class="errorFormulario"></div>
            <?php
            if (isset($datos['error'])) {
                echo "<div class='errorFormulario'>" . $datos['error'] . "</div>";
            }
            ?>
            <div class="division-con-flex">
                <button type="submit" class="boton enviar" id="enviar">Iniciar Sesión</button>
            </div>
            <p class="texto-ayuda">
                ¿No tienes una cuenta?
                <a href="index.php?c=Cusuario&m=mostrarRegistro">Regístrate aquí</a>
            </p>
        </form>
    </div>
</body>
</html>