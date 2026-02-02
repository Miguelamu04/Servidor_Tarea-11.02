<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Deportes y número de usuarios</h2>
    <table>
        <tr>
            <th>Deporte</th>
            <th>Nº Usuarios</th>
        </tr>
        <?php foreach ($datos as $fila) { ?>
            <tr>
                <td><?php echo $fila['nombreDep']; ?></td>
                <td><?php echo $fila['totalUsuarios']; ?></td>
            </tr>
        <?php } ?>
    </table>
<br>
<a href="index.php?c=cUsuario&m=mostrarMenuAdmin">Volver</a>
</body>
</html>