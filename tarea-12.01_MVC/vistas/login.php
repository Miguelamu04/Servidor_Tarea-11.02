<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <main>
        <section>
            <form action="index.php?c=cLogin&m=procesarLogin" method="post">
                <div class="bloques">
                    <label>Usuario: </label>
                    <input type="text" name="nombreUsuario" required>
                </div>

                <div class="bloques">
                    <label>Contraseña: </label>
                    <input type="password" name="password" required>
                </div>

                <div id="botones">
                    <input type="submit" value="Enviar">
                    <a href="index.php?c=cInicio&m=mostrarInicio">Volver</a>
                </div>
            </form>
        </section>
    </main>
</body>
</html>

