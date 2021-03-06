<?php

require_once VIEW_PATH . 'Templates/HeadDashboardBootstrap.php'
?>

<link rel="stylesheet" href="assets/css/BasurtoEdgar.css" />
<meta name="keywords" content="videojuegos,catalogo,juegos" />
<meta name="description" content="Catalogo" />

<title>Catálogo - ArkGames</title>
</head>

<?php require_once VIEW_PATH . 'Templates/MenuDashboardBootstrap.php' ?>

<main class="main p-5 mx-3 mb-2">
    <div class="card">
        <div class="card-header">
            <h2 class="title my-2">
                Nuevo Registro
            </h2>
        </div>


        <form method="post" action="index.php?c=productos&a=guardar&id_producto=0" enctype="multipart/form-data">
            <div class="card-body">
                <div class="row px-4">
                    <div class="col-sm-6 px-5">
                        <div class="mb-4 row text-end">
                            <label class="col-sm-3 col-form-label d-none">ID:</label>
                            <div class="col-sm-9">
                                <input disabled class="form-control form-control-sm" type="hidden" name="txtId" value="0">
                            </div>
                        </div>

                        <div class="mb-4 row text-end">
                            <label class="col-sm-3 col-form-label">Nombre:</label>
                            <div class="col-sm-9">
                                <input required class="form-control form-control-sm" type="text" value="" name="txtNombre" placeholder="Ingrese nombre del producto" data-validacion-tipo="requerido|min:3">
                            </div>
                        </div>

                        <div class="mb-4 row text-end">
                            <label class="col-sm-3 col-form-label">Precio:</label>
                            <div class="col-sm-9">
                                <input required value="" class="form-control form-control-sm" type="number" placeholder="0.0" step="0.01" min="0" max="1000" name="txtPrecio">
                            </div>
                        </div>

                        <div class="mb-4 row text-end">
                            <label class="col-sm-3 col-form-label">Añadir imagen:</label>
                            <div class="col-sm-9">
                                <input required class="form-control form-control-sm" name="archivo" id="seleccionArchivos" type="file" />
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
                                <img style="max-height:280px; width: auto;" id="imagenPrevisualizacion" src="" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-end">
                <a href="index.php?c=productos" class="btn btn-secondary"><i class="fa-solid fa-right-from-bracket"></i> Salir</a>
                <button class="btn btn-primary my-3" type="submit" value="guardar">Guardar</button>
            </div>
        </form>


    </div>

</main>

<!-------------------------------------------------FOOTER---------------------------------------->

<?php require_once VIEW_PATH . 'Templates/FootDashboardBootstrap.php' ?>

<script src="assets/js/vistaprevia.js"></script>
<?php require_once VIEW_PATH . 'Templates/EndDashboardBootstrap.php' ?>
<!----------------------------------------------------------------------------------------------->



</body>

</html>