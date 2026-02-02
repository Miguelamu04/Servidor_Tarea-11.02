<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Inscripción</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>

<div class="form-container">
    <h2>Formulario:</h2>

    <form action="index.php?c=cInscripcion&m=procesarInscripcion" method="post">

    <div class="input-group">
        <label>Apellidos y Nombre:</label>
        <input type="text" name="nombreUsuario" required>
    </div>

    <div class="input-group">
        <label>Contraseña:</label>
        <input type="password" name="password" required>
    </div>

    <div class="input-group">
        <label>Correo:</label>
        <input type="email" name="correo" required>
    </div>

    <div class="input-group">
        <label>Teléfono:</label>
        <input type="tel" name="telefono">
    </div>

    <div class="checkbox-section">
        <p>Deportes:</p>

        <?php foreach ($datos as $deporte) { ?>
            <label>
                <input type="checkbox" name="deportes[]" value="<?= $deporte['idDeporte'] ?>">
                <?= $deporte['nombreDep'] ?>
            </label><br>
        <?php } ?>
    </div>

    <div class="footer-terms">
        <label>
            <input type="checkbox" name="condiciones" value="1">
            Acepto las condiciones
        </label>
    </div>
    <input type="submit" value="Enviar">
    <a href="index.php?c=cInicio&m=mostrarInicio">Volver</a>
    </form>
</div>
</body>
</html>
