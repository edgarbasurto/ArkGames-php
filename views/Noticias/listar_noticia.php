<?php require_once VIEW_PATH . 'Templates/HeadDashboardBootstrap.php' ?>

<title>CRUD</title>
</head>

<body id="bodyTemp">
    <header>
        <?php
        require_once VIEW_PATH . 'Templates/MenuDashboardBootstrap.php'
        ?>
    </header>
    <main class="main p-5 mx-3">

        <div class="container-fluid card shadow">

            <div class="card-header row">
                <div class="col-md-7">
                    <h2>Historial de Noticias</h2>
                </div>
                <div class="col-md-5 text-end"><a class="btn btn-success justify-center" href="?c=noticias&a=nuevo">Agregar <i class="fa-solid fa-circle-plus fa-lg"></i></a></div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-light table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Título</th>
                                <th>Sección</th>
                                <th>Dispositivo</th>
                                <th>Fecha</th>
                                <th>Descripción</th>
                                <th>Imagen</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($resultados as $noticia) {
                                $id = $noticia->id_noticia;
                            ?>
                                <tr>
                                    <td><?php echo $id ?></td>
                                    <td><?php echo $noticia->titulo ?></td>
                                    <td><?php echo $noticia->tema->nombre_tema ?></td>
                                    <td><?php echo $noticia->dispositivo->nombre_dispositivo ?></td>
                                    <td><?php echo $noticia->fecha ?></td>
                                    <td><?php echo $noticia->descripcion ?></td>
                                    <td><img style="height:50px" src="assets/img/noticias/<?php echo $noticia->url_imagen ?>" alt="<?php echo $id ?>"></td>
                                    <td class="mx-5">
                                        <div class="col" style="width: 100px;">
                                            <div class="row-mx-2 my-2">
                                                <a class="btn btn-primary" href="?c=noticias&a=nuevo&id=<?php echo $id ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                                            </div>
                                            <div class="row-mx-2 my-2">
                                                <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=noticias&a=delete&id=<?php echo $id?>" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></a>
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
    <?php
    require_once VIEW_PATH . 'Templates/FootDashboardBootstrap.php'
    ?>
    <?php require_once VIEW_PATH . 'Templates/EndDashboardBootstrap.php' ?>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script> -->
</body>

</html>