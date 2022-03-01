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

            <div class="card-body card-deck row">

                <?php
                require_once '../../controller/ProductosControlador.php';

                $cont = new ProductosControlador();
                $lista = $cont->index();

                foreach ($lista as $producto) {
                ?>
                    <div class="col-lg-4 col-md-12 mb-4 mb-lg-0 my-4">
                        <div class="card shadow" id="<?php echo $producto->Id_producto ?>">
                            <div style="height: 450px; overflow: hidden;" >
                            <img class="card-img-top" src="<?php echo $producto->Url_imagen ?>" alt="<?php echo $producto->Nombre ?>">
                            </div>
                            <div class="card-body">
                                <h2 class="card-title"><?php echo $producto->Nombre ?></h2>
                                <p class="card-text text-muted"><?php echo $producto->Categoria->Nombre_categoria ?></p>
                            </div>

                            <div class="card-footer">
                                <div class="row">
                                    <div class="col">
                                        <span class="precio2"><b>$<?php echo $producto->Precio ?></b></span>
                                    </div>
                                    <div class="col text-end">
                                        <a href="editar.php?id=<?php echo $producto->Id_producto ?>" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a href="eliminar.php?id=<?php echo $producto->Id_producto ?>" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></a>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>


                <?php } ?>

                <div class="paginador" id="paginador">
                    <label>Registros por pagina:</label>
                    <select name="regitrospagina" class="cantreg" id="cantreg">
                        <option value="0">Todos</option>
                        <option value="3">3</option>
                        <option value="6">6</option>
                        <option value="9">9</option>
                    </select>
                    <a href="javascript:void(0)" class="firstPage" id="firstPage">«</a>
                    <a href="javascript:void(0)" class="previousPage" id="previousPage">❮</a>
                    <select name="numpagina" class="numpagina" id="numpagina">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
                    <a href="javascript:void(0)" class="nextPage" id="nextPage">❯</a>
                    <a href="javascript:void(0)" class="lastPage" id="lastPage">»</a>
                </div>
            </div>
        </div>
    </main>


    <!-------------------------------------------------FOOTER---------------------------------------->


    <?php
    require_once '../Templates/footerBootstrap.php'
    ?>


    <!----------------------------------------------------------------------------------------------->

    <script type="text/javascript" src="../../assets/js/BasurtoEdgar.js"></script>
</body>

</html>