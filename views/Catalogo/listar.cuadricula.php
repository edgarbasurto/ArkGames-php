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
                            <a class="btn btn-secondary" href="index.php?c=productos&a=index_cuadricula"><i class="fa-solid fa-circle-plus"></i> Cuadricula</a>
                        </div>
                        <div class="col">
                            <a class="btn btn-secondary" href="index.php"><i class="fa-solid fa-circle-plus"></i> Tabla</a>
                        </div>
                        <div class="col">
                            <a class="btn btn-primary" href="agregar.producto.php"><i class="fa-solid fa-circle-plus"></i> Agregar nuevo</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body card-deck row">

                <?php
                foreach ($resultados as $producto) {
                ?>
                    <div class="col-lg-4 col-md-12 mb-4 mb-lg-0 my-4">
                        <div class="card shadow" id="<?php echo $producto->id_producto ?>">
                            <div style="height: 450px; overflow: hidden;">
                                <img class="card-img-top" src="data:image/jpg;base64,<?php echo base64_encode($producto->url_imagen) ?>" alt="<?php echo $producto->nombre ?>">
                            </div>
                            <div class="card-body">
                                <h2 class="card-title"><?php echo $producto->nombre ?></h2>
                                <p class="card-text text-muted"><?php echo $producto->categoria->nombre_categoria ?></p>
                            </div>

                            <div class="card-footer">
                                <div class="row">
                                    <div class="col">
                                        <span class="precio2"><b>$<?php echo $producto->precio ?></b></span>
                                    </div>
                                    <div class="col text-end">
                                        <a href="index.php?c=productos$a=edit&id=<?php echo $producto->id_producto ?>" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a href="index.php?c=productos&a=delete&id=<?php echo $producto->id_producto ?>" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>


                <?php } ?>

                <div class="paginador row" id="paginador">
                    <div class="col"><label class="col-form-label">Registros por pagina:</label></div>
                    <div class="col"> <select name="regitrospagina" class="form-select" id="cantreg">
                            <option value="0">Todos</option>
                            <option value="3">3</option>
                            <option value="6">6</option>
                            <option value="9">9</option>
                        </select></div>
                    <div class="col"><a href="javascript:void(0)" class="btn btn-primary" id="firstPage">«</a></div>
                    <div class="col"><a href="javascript:void(0)" class="btn btn-primary" id="previousPage">❮</a></div>
                    <div class="col"><select name="numpagina" class="form-select" id="numpagina">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select></div>
                    <div class="col"> <a href="javascript:void(0)" class="btn btn-primary" id="nextPage">❯</a></div>
                    <div class="col"><a href="javascript:void(0)" class="btn btn-primary" id="lastPage">»</a></div>

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