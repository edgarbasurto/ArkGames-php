<?php require_once '../../views/Templates/HeadBootstrap.php' ?>


<link rel="stylesheet" href="../../assets/css/BasurtoEdgar.css" />
<meta name="keywords" content="videojuegos,catalogo,juegos" />
<meta name="description" content="Catalogo" />

<!-- <style>
    @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css");

    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }

    .bi {
        vertical-align: -.125em;
        fill: currentColor;
    }

    .panelFormulario {
        padding: 20px 5%;
        margin: 50px auto;
        border-radius: 10px;
    }
</style> -->
<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css"> -->

<title>Catálogo - ArkGames</title>
</head>

<body id="bodyTemp">

    <!-------------------------------------------------MENU---------------------------------------->


    <?php

    require_once '../Templates/navBarBootstrap.php'
    ?>

    <!------------------------------------------------------------------------------------------>

    <main class="main p-5 mx-3">
        <div class="card">
            <div class="card-header">
                <h2 class="title my-2">Agregar Producto</h2>
            </div>


            <form method="post" action="../../controller/ProductosControlador.php">
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-sm-8">

                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Nombre:</label>
                                <div class="col-sm-9">
                                    <input class="form-control form-control-sm" type="text" name="txtNombre">
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Precio:</label>
                                <div class="col-sm-9">
                                    <input class="form-control form-control-sm" type="number" placeholder="0.0" step="0.01" min="0" max="1000" name="txtPrecio">
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Añadir imagen:</label>
                                <div class="col-sm-9">
                                    <input class="form-control form-control-sm" name="archivo" id="archivo" type="file" />
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Categoría:</label>
                                <div class="col-sm-9">
                                    <select class="form-select form-control-sm mb-3" aria-label=".form-select-sm example" name="selectCategoria" required>
                                        <option disabled selected> --Seleccione una categoria-- </option>
                                        <?php
                                        require_once '../../controller/CategoriasController.php';

                                        $cont = new CategoriasController();
                                        $lista = $cont->index();

                                        foreach ($lista as $categoria) {
                                        ?>
                                            <option value="<?php echo $categoria->Id_categoria ?>"><?php echo $categoria->Nombre_categoria ?></option>

                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 border rounded">
                            <div>VISTA PREVIA</div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-end">
                    <a href="../../views/Catalogo/BasurtoEdgar.php" class="btn btn-secondary"><i class="fa-solid fa-right-from-bracket"></i> Salir</a>
                    <button class="btn btn-primary my-3" type="submit">Agregar</button>
                </div>
            </form>


        </div>

    </main>
    <!-------------------------------------------------FOOTER---------------------------------------->

    <?php
    require_once '../Templates/footerBootstrap.php'
    ?>

    <!----------------------------------------------------------------------------------------------->

</body>

</html>