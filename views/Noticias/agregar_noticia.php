<?php require_once VIEW_PATH . 'Templates/HeadDashboardBootstrap.php' ?>

<title>Agregar - Noticias ArkGames</title>
</head>

    <?php require_once VIEW_PATH . 'Templates/MenuDashboardBootstrap.php'?>
    
    <main class="main p-5 mx-3">

        <div class="container px-5">
            <div class="container card shadow">

                <form id="form_noticia" method="POST" action="index.php?c=noticias&a=guardar" enctype="multipart/form-data">
                    <div class="card-header row">
                        <h3 class="title text-center">Agrega una noticia</h3>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-sm-2 text-end">
                                <label class="form-label" for="titulo">Título:</label>
                            </div>
                            <div class="col-sm-8">
                                <input id="titulo" class="form-control" type="text" name="txtTitulo">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-6">
                                <div class="row">
                                    <label class="col-sm-4 col-form-label text-end">Sección:</label>
                                    <div class="col-sm-8">
                                        <select id="tema" class="form-select form-control-sm" aria-label=".form-select-sm example" name="selectTema" required>
                                            <option value="0" disabled selected> --Seleccione una sección-- </option>
                                            <?php
                                            
                                            foreach ($lista1 as $tema) {
                                            ?>
                                                <option value="<?php echo $tema->id_tema ?>"><?php echo $tema->nombre_tema ?></option>
                                        
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label text-end">Tecnología:</label>
                                    <div class="col-sm-8">
                                        <select id="dispositivo" class="form-select form-control-sm" aria-label=".form-select-sm example" name="selectDispositivo" required>
                                            <option value="0" disabled selected> --Seleccione un dispositivo-- </option>
                                            <?php
                                        
                                            foreach ($lista2 as $dispositivo) {
                                            ?>
                                                <option value="<?php echo $dispositivo->id_dispositivo ?>"><?php echo $dispositivo->nombre_dispositivo ?></option>
                                    
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-2 text-end">
                                <label class="form-label" for="descripcion">Descripcion:</label>
                            </div>
                            <div class="col-sm-8">
                                <textarea id="descripcion" class="form-control" type="text" name="txtDescripcion" style="resize: none; height: 250px"></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label text-end">Añadir imagen:</label>
                            <div class="col-sm-8">
                                <input class="form-control form-control-sm" name="archivo" id="seleccionArchivos" type="file" />
                            </div>
                            <div class="row">
                                <label class="col-sm-2 "></label>
                                <p class="col-sm-8 help-block">.png o .jpg o .jpeg</p> 
                            </div>                   
                        </div>
                    </div>
                    <div class="card-footer row ">
                        <div class="text-end">
                            <a href="?c=noticias" class="btn btn-secondary"><i class="fa-solid fa-right-from-bracket"></i> Salir</a>
                            <button class="btn btn-primary" id="btnListo" type="submit" value="guardar">Listo</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <!-------------------------------------------------FOOTER---------------------------------------->
    <?php require_once VIEW_PATH . 'Templates/FootDashboardBootstrap.php'?>
    <!----------------------------------------------------------------------------------------------->
    <script type="text/javascript" src="assets/js/Validacion_Noticias.js"></script>
    <?php require_once VIEW_PATH . 'Templates/EndDashboardBootstrap.php' ?>