<?php

require_once VIEW_PATH . 'Templates/HeadDashboardBootstrap.php'
?>
<meta name="description" content="ArkGames" />
<meta name="keywords" content="videojuegos,catalogo,juegos" />
<meta name="author" content="" />

<meta name="keywords" content="videojuegos,catalogo,juegos" />
<!-- <link rel="stylesheet" href="assets/css/BasurtoEdgar.css" />
<link rel="stylesheet" href="assets/css/BernalHelen.css" /> -->

<meta name="description" content="Catalogo" />

<title>Productos - ArkGames</title>




</head>

<?php require_once VIEW_PATH . 'Templates/MenuDashboardBootstrap.php' ?>
<main>
    <div class="container-fluid">
        <!-- <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Bienvenido</li>
        </ol> -->
        <div class="main p-5 mx-3">

            <div class="container-fluid card shadow">

                <div class="row card-header">
                    <div class="col-8">
                        <h1 class="title">Productos</h1>
                    </div>
                    <div class="col-4">
                        <div class="row text-end py-2">
                            <div class="col text-center">
                                <div class="row">
                                    <!-- <div class="col text-end">
                                        <a class="btn btn-secondary my-auto" href="?c=productos&a=index_cuadricula" data-toggle="tooltip" data-placement="top" title="Listar cuadricula">
                                            <i class="fa-solid fa-border-all"></i></a>
                                    </div>

                                    <div class="col text-start">
                                        <a class="btn btn-secondary my-auto" href="index.php?c=productos" data-toggle="tooltip" data-placement="top" title="Listar tabla">
                                            <i class="fa-solid fa-align-justify"></i></a>
                                    </div> -->
                                </div>
                            </div>
                            <div class="col text-center">
                                <a class="btn btn-success my-auto" href="?c=productos&a=nuevo">
                                     Agregar <i class="fa-solid fa-circle-plus"></i></a>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-striped table-light table-bordered table-hover" width="100%" cellspacing="0">

                            <thead class="table-light">
                                <th scope="col">Id</th>
                                <th scope="col">Imagen</th>
                                <th scope="col">Producto</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Categoría</th>
                                <th scope="col"></th>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($resultados as $producto) {
                                ?>

                                    <tr>
                                        <th scope="row"><?php echo $producto->id_producto ?></th>
                                        <td><img style="height:50px" src="assets/img/posters/<?php echo $producto->url_imagen ?>" alt="<?php echo $producto->nombre ?>"></td>

                                        <td><?php echo $producto->nombre ?></td>
                                        <td>$<?php echo $producto->precio ?></td>
                                        <td><?php echo $producto->categoria->nombre_categoria ?></td>
                                        <td>
                                            <div class="row text-center">
                                                <div class="col text-end">
                                                    <a href="?c=productos&a=nuevo&id=<?php echo $producto->id_producto ?>" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                                                </div>
                                                <div class="col text-start">
                                                    <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=productos&a=delete&id=<?php echo $producto->id_producto ?>" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></a>
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





        </div>
    </div>
</main>
<?php require_once VIEW_PATH . 'Templates/FootDashboardBootstrap.php' ?>
<script>

</script>
<?php require_once VIEW_PATH . 'Templates/EndDashboardBootstrap.php' ?>