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
        <h1>Soporte</h1>

        <?php
        
       require_once '../../config/conexion.php';

        $sql = "select * from soporte ";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        ?>

        <div>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>USUARIO</th>
                        <th>EMAIL</th>
                        <th>TELEFONO</th>
                        <th>SERVICIO</th>
                        <th>PRODUCTO</th>
                        <th>DESCRIPCION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $filas = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($filas as $fila) {
                        ?>
                        <tr>
                            <td><?php echo $fila['id_solicitud'] ?></td>
                            <td><?php echo $fila['usuario'] ?></td>
                            <td><?php echo $fila['email'] ?></td>
                            <td><?php echo $fila['telefono'] ?></td>
                            <td><?php echo $fila['producto'] ?></td>
                            <td><?php echo $fila['servicio'] ?></td>
                            <td><?php echo $fila['descripcion_problema'] ?></td>
                            <td>
                                <a href="editar.php?id=<?php echo $fila['id_solicitud'] ?>">Editar</a>
                                <a href="eliminar.php?id=<?php echo $fila['id_solicitud'] ?>">Eliminar</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <a href="agregar.php">Agregar</a>
        </div>

    </body>
</html>

