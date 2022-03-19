<?php require_once VIEW_PATH . 'Templates/HeadDashboardBootstrap.php' ?>

<title>CRUD</title>
</head>
    <?php require_once VIEW_PATH . 'Templates/MenuDashboardBootstrap.php'?>
    <main class="main p-5 mx-3">

        <div class="container-fluid card shadow">

            <div class="card-header row">
                <div class="col-md-7">
                    <h2>Solicitudes de Soporte</h2>
                </div>
                <div class="col-md-5 text-end"><a class="btn btn-success justify-center" href="?c=soporte&a=nuevo">Agregar <i class="fa-solid fa-circle-plus fa-lg"></i></a></div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-light table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Usuario</th>
                                <th>Email</th>
                                <th>Telefono</th>
                                <th>Servicio</th>
                                <th>Producto</th>
                                <th>Descripcion del problema</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($resultados as $soporte) {
                                $id = $soporte->id_solicitud;
                            ?>
                                <tr>
                                <td><?php echo $id ?></td>
                                <td><?php echo $soporte->usuario ?></td>
                                <td><?php echo $soporte->email ?></td>
                                <td><?php echo $soporte->telefono ?></td>
                                <td><?php echo $soporte->servicio ?></td>
                                <td><?php echo $soporte->producto ?></td>
                                <td><?php echo $soporte->descripcion_problema ?></td>
                                    <td class="mx-5">
                                        <div class="col" style="width: 100px;">
                                            <div class="row-mx-2 my-2">
                                                <a class="btn btn-primary" href="?c=soporte&a=nuevo&id=<?php echo $id ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                                            </div>
                                            <div class="row-mx-2 my-2">
                                                <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=soporte&a=delete&id=<?php echo $id?>" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </main>
    <?php require_once VIEW_PATH . 'Templates/FootDashboardBootstrap.php'?>
    <?php require_once VIEW_PATH . 'Templates/EndDashboardBootstrap.php' ?>

