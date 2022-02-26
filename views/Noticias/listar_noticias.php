<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../assets/css/master2.css" />
        <link rel="stylesheet" href="../../assets/css/BernalHelen.css" />
        <link rel="shortcut icon" href="../../assets/img/logo.svg">
        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <title>CRUD</title>
        <style>
            table {
                margin: 50px 10px 0 10px;
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
        include_once '../Templates/header.php';
        require_once '../../config/conexionPDO.php';


        $sql = "select * from suscripcion ";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        $sql2 = 'CALL SP_TEMAS(?)';
        $stmt2 = $pdo->prepare($sql2);

        $sql3 = "Call SP_DISPOSITIVOS(?)";
        $stmt3 = $pdo->prepare($sql3);
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
                            <td>
                                <?php 
                                $stmt2->bindParam(1,$id, PDO::PARAM_INT, 100);
                                $stmt2->execute();
                                $param = $stmt2->fetch();
                                echo $param[1]; 
                                $stmt2->closeCursor(); 
                                ?>
                            </td>
                            <td>
                                <?php 
                                $stmt3->bindParam(1,$id, PDO::PARAM_INT, 100);
                                $stmt3->execute();
                                $param2 = $stmt3->fetch();
                                echo $param2[1]; 
                                $stmt3->closeCursor();
                                ?>
                            </td>
                            <td><?php echo $fila['frecuencia'] ?></td>
                            <td><?php echo $fila['discord'] ?></td>
                            <td>
                                <a href="editar.php?id=<?php echo $fila['id_suscripcion'] ?>">Editar</a>
                                <a href="eliminar.php?id=<?php echo $fila['id_suscripcion'] ?>">Eliminar</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <a href="agregar.php">Agregar</a>
        </div>

    </body>
</html>