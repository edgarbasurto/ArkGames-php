<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php require_once VIEW_PATH . 'Templates/HeadBootstrap.php' ?>
        <title>CRUD</title>
        <style>
            .contenedor-table{
                margin-top: 80px;
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
    <header>
        <?php
        require_once VIEW_PATH . 'Templates/navBarBootstrap.php'
        ?>
    </header>
        <h1>Soporte</h1>

        <div class="contenedor-table">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Usuario</th>
                        <th>Email</th>
                        <th>Telefono</th>
                        <th>Servicio</th>
                        <th>Producto</th>
                        <th>Descripcion</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($resultados as $soporte) {
                        ?>
                        <tr>
                            <td><?php echo $soporte->id_solicitud ?></td>
                            <td><?php echo $soporte->usuario ?></td>
                            <td><?php echo $soporte->email ?></td>
                            <td><?php echo $soporte->telefono ?></td>
                            <td><?php echo $soporte->servicio ?></td>
                            <td><?php echo $soporte->producto ?></td>
                            <td><?php echo $soporte->descripcion_problema ?></td>
                            <td>
                                <a href="editar_solicitud.php?id=<?php echo $soporte->id_solicitud ?>">Editar</a>
                                <a href="eliminar_solicitud.php?id=<?php echo $soporte->id_solicitud ?>">Eliminar</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <a href="frmSoporte_EspinozaIvan.php">Agregar</a>
        </div>
    <?php
    require_once VIEW_PATH . 'Templates/footerBootstrap.php'
    ?>
    </body>
</html>

