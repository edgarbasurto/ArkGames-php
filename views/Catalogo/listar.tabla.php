<?php require_once '../../views/Templates/HeadBootstrap.php' ?>

<meta name="keywords" content="videojuegos,catalogo,juegos" />
<link rel="stylesheet" href="../../assets/css/BasurtoEdgar.css" />
<meta name="description" content="Catalogo" />

<title>Catálogo - ArkGames</title>
</head>

<body id="bodyTemp">

    <!-------------------------------------------------MENU---------------------------------------->

    <?php

    require_once '../Templates/navBarBootstrap.php'
    ?>

    <!------------------------------------------------------------------------------------------>

    <main class="main p-5 mx-3">

        <div class="container-fluid card shadow">

            <div class="row card-header">
                <div class="col-6">
                    <h1 class="title">Catálogo de ArkGames</h1>
                </div>
                <div class="col-6">
                    <div class="row text-end py-2">
                        <div class="col">
                            <a class="btn btn-secondary" href="listar.cuadricula.php"><i class="fa-solid fa-circle-plus"></i> Cuadricula</a>
                        </div>
                        <div class="col">
                            <a class="btn btn-secondary" href="listar.tabla.php"><i class="fa-solid fa-circle-plus"></i> Tabla</a>
                        </div>
                        <div class="col">
                            <a class="btn btn-primary" href="agregar.producto.php"><i class="fa-solid fa-circle-plus"></i> Agregar nuevo</a>
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
                            <th scope="col">-</th>
                        </thead>
                        <tbody>
                            <?php
                            require_once '../../controller/ProductosControlador.php';

                            $cont = new ProductosControlador();
                            $lista = $cont->index();

                            foreach ($lista as $producto) {
                            ?>

                                <tr>
                                    <th scope="row"><?php echo $producto->Id_producto ?></th>
                                    <td><img style="height:50px" src="<?php echo $producto->Url_imagen ?>" alt="<?php echo $producto->Nombre ?>"></td>
                                    <td><?php echo $producto->Nombre ?></td>
                                    <td>$<?php echo $producto->Precio ?></td>
                                    <td><?php echo $producto->Categoria->Nombre_categoria ?></td>
                                    <td><a href="editar.php?id=<?php echo $producto->Id_producto ?>" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a href="eliminar.php?id=<?php echo $producto->Id_producto ?>" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></a>
                                    </td>

                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </main>


    <!-------------------------------------------------FOOTER---------------------------------------->


    <?php
    require_once '../Templates/footerBootstrap.php'
    ?>


    <!----------------------------------------------------------------------------------------------->


</body>

</html>