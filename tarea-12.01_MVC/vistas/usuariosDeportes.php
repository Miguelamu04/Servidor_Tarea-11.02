<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Usuarios y Deportes</h2>

    <table>
        <tr>
            <th>Usuario</th>
            <th>Deporte</th>
        </tr>

        <?php foreach ($datos as $fila) { ?>
            <tr>
                <td><?= $fila['nombreUsuario'] ?></td>
                <td><?= $fila['nombreDep'] ?></td>
            </tr>
        <?php } ?>
    </table>

<br>
<a href="index.php?c=cUsuario&m=mostrarMenuAdmin">Volver</a>
</body>
</html>