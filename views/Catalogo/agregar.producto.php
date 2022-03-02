<?php require_once '../../views/Templates/HeadBootstrap.php' ?>


<link rel="stylesheet" href="../../assets/css/BasurtoEdgar.css" />
<meta name="keywords" content="videojuegos,catalogo,juegos" />
<meta name="description" content="Catalogo" />

<title>Catálogo - ArkGames</title>
</head>

<body id="bodyTemp">

    <!-------------------------------------------------MENU---------------------------------------->


    <?php

    require_once '../Templates/navBarBootstrap.php'
    ?>

    <!------------------------------------------------------------------------------------------>

    <main class="main p-5 mx-3 mb-2">
        <div class="card">
            <div class="card-header">
                <h2 class="title my-2">Agregar Producto</h2>
            </div>


            <form method="post" action="index.php?c=productos&a=guardar" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="row px-4">
                        <div class="col-sm-6 px-5">

                            <input class="form-control form-control-sm" type="hidden" name="txtId" value="0">


                            <div class="mb-4 row text-end">
                                <label class="col-sm-3 col-form-label">Nombre:</label>
                                <div class="col-sm-9">
                                    <input class="form-control form-control-sm" type="text" name="txtNombre">
                                </div>
                            </div>

                            <div class="mb-4 row text-end">
                                <label class="col-sm-3 col-form-label">Precio:</label>
                                <div class="col-sm-9">
                                    <input class="form-control form-control-sm" type="number" placeholder="0.0" step="0.01" min="0" max="1000" name="txtPrecio">
                                </div>
                            </div>

                            <div class="mb-4 row text-end">
                                <label class="col-sm-3 col-form-label">Añadir imagen:</label>
                                <div class="col-sm-9">
                                    <input class="form-control form-control-sm" name="archivo" id="seleccionArchivos" type="file" />
                                </div>

                            </div>


                            <div class="mb-4 row text-end">
                                <label class="col-sm-3 col-form-label">Categoría:</label>
                                <div class="col-sm-9">
                                    <select class="form-select form-control-sm mb-3" aria-label=".form-select-sm example" name="selectCategoria" required>
                                        <option disabled selected> --Seleccione una categoria-- </option>
                                        <?php
                                       
                                        foreach ($lista as $categoria) {
                                        ?>
                                            <option value="<?php echo $categoria->id_categoria ?>"><?php echo $categoria->nombre_categoria ?></option>

                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 px-5">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="title"> Vista previa </h5>
                                </div>
                                <div class="card-body text-center" style="height: 300px;">
                                    <img style="max-height:280px; width: auto;" id="imagenPrevisualizacion">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-end">
                    <a href="index.php" class="btn btn-secondary"><i class="fa-solid fa-right-from-bracket"></i> Salir</a>
                    <button class="btn btn-primary my-3" type="submit" value="guardar">Guardar</button>
                </div>
            </form>


        </div>

    </main>

    <!-------------------------------------------------FOOTER---------------------------------------->

    <?php
    require_once '../Templates/footerBootstrap.php';
    ?>

    <!----------------------------------------------------------------------------------------------->

    <script src="../../assets/js/vistaprevia.js"></script>

</body>

</html>