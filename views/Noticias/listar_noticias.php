<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../assets/css/master2.css" />
        <link rel="shortcut icon" href="../../assets/img/logo.svg">
        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <title>CRUD</title>
        <style>
            .contenedor-table{
                margin-left: 20px;
            }
            footer{
                position: absolute;
            }
            table {
                border: #b2b2b2 1px solid;
                background-color: #b2b2b2;
            }
            td, th {
                border: black 1px solid;
                padding: 10px;
            }</style>
    </head>
    <body>
        <?php
        require_once '../Templates/menu.php';
        require_once '../../config/conexionPDO.php';


        $sql = "select * from suscripcion ";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        ?>

        <div class="contenedor-table">
            <h1>Noticias</h1>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Email</th>
                        <th>Temas</th>
                        <th>Dispositivos</th>
                        <th>Frecuencia</th>
                        <th>Discord</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $filas = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($filas as $fila) {
                        $id = $fila['id_suscripcion'];
                        ?>
                        <tr>
                            <td><?php echo $id?></td>
                            <td><?php echo $fila['email'] ?></td>
                            <td><?php echo $fila['temas']?></td>
                            <td><?php echo $fila['dispositivos']?></td>
                            <td><?php echo $fila['frecuencia'] ?></td>
                            <td><?php echo $fila['discord'] ?></td>
                            <td>
                                <a href="editar_noticias.php?id=<?php echo $fila['id_suscripcion'] ?>">Editar</a>
                                <a href="eliminar_noticias.php?id=<?php echo $fila['id_suscripcion'] ?>">Eliminar</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <a href="agregar_noticias.php">Agregar</a>
        </div>
        <?php
            include_once '../Templates/footer.php'
        ?>
    </body>
</html>