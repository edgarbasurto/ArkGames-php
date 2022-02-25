<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CRUD</title>
        <style>table {
                border: #b2b2b2 1px solid;
            }
            td, th {
                border: #b2b2b2 1px solid;
            }</style>
    </head>
    <body>
        <h1>Usuarios</h1>

        <?php
        include_once '../templates/header.php';

       require_once '../conexion.php';


        $sql = "select * from usuarios ";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        ?>

        <div>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>USUARIO</th>
                        <th>NOMBRE</th>
                        <th>APELLIDOS</th>
                        <th>EMAIL</th>
                        <th>ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $filas = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($filas as $fila) {
                        ?>
                        <tr>
                            <td><?php echo $fila['id'] ?></td>
                            <td><?php echo $fila['username'] ?></td>
                            <td><?php echo $fila['nombre'] ?></td>
                            <td><?php echo $fila['apellidos'] ?></td>
                            <td><?php echo $fila['email'] ?></td>
                            <td>
                                <a href="editar.php?id=<?php echo $fila['id'] ?>">Editar</a>
                                <a href="eliminar.php?id=<?php echo $fila['id'] ?>">Eliminar</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <a href="agregar.php">Agregar</a>
        </div>

    </body>
</html>