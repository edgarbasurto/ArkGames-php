<?php require_once VIEW_PATH . 'Templates/HeadDashboardBootstrap.php' ?>


<meta name="description" content="Página de noticas ArkGames" />
<meta name="keywords" content="formulario,noticias,suscripción" />

<title>Suscripción - Noticias ArkGames</title>
</head>

    <?php require_once VIEW_PATH . 'Templates/MenuDashboardBootstrap.php' ?>
</header>
    <main class="main p-5 mx-3">
        <div class="container px-5">
            <div class="container card shadow">
                <form id="form_noticia" method="POST" action="index.php?c=noticias&a=guardar&id=<?php echo $noticia->id_noticia == null ? '' : $noticia->id_noticia; ?>" enctype="multipart/form-data">
                    <div class="card-header row">
                        <h3 class="title text-center">Editar Noticia</h3>
                    </div>

                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-sm-2 text-end">
                                <label class="form-label" for="id">ID:</label>
                            </div>
                            <div class="col-sm-1">
                                <input id="id" class="form-control" type="number" name="txtid" readonly value="<?php echo $noticia->id_noticia ?>" /> <br>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-2 text-end">
                                <label class="form-label" for="titulo">Título:</label>
                            </div>
                            <div class="col-sm-8">
                                <input id="titulo" class="form-control" type="text" name="txtTitulo" value="<?php echo $noticia->titulo ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-5">
                                <div class="row">
                                    <label class="col-sm-5 col-form-label text-end">Sección:</label>
                                    <div class="col-sm-6">
                                        <select id="tema" class="form-select form-control-sm" aria-label=".form-select-sm example" name="selectTema" required>
                                            <option value="0" disabled selected> --Seleccione una sección-- </option>
                                            <?php
                                            
                                            foreach ($lista1 as $tema) {
                                            ?>
                                                <option <?php echo $tema->id_tema == $noticia->tema->id_tema ? "selected" : "" ?> value="<?php echo $tema->id_tema ?>"><?php echo $tema->nombre_tema ?></option>
                                        
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="row mb-3">
                                    <label class="col-sm-4 col-form-label text-end">Tecnología:</label>
                                    <div class="col-sm-6">
                                        <select id="dispositivo" class="form-select form-control-sm" aria-label=".form-select-sm example" name="selectDispositivo" required>
                                            <option disabled selected> --Seleccione un dispositivo-- </option>
                                            <?php
                                        
                                            foreach ($lista2 as $dispositivo) {
                                            ?>
                                                <option <?php echo $dispositivo->id_dispositivo == $noticia->dispositivo->id_dispositivo ? "selected" : "" ?> value="<?php echo $dispositivo->id_dispositivo ?>"><?php echo $dispositivo->nombre_dispositivo ?></option>
                                    
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
                                <textarea id="descripcion" class="form-control" type="text" name="txtDescripcion" style="resize: none; height: 250px"><?php echo $noticia->descripcion ?></textarea>                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-4 text-end">
                                    <img class="col" style="height:100px" src="assets/img/noticias/<?php echo $noticia->url_imagen ?>" alt="<?php echo $id ?>">
                                </div>
                                <div class="col-sm-6">
                                    <label class="row-sm-2 col-form-label">Cambiar imagen:</label>
                                    <input class="form-control form-control-sm-6 text-end" name="archivo" id="seleccionArchivo" type="file" accept="image/png, .jpeg, .jpg"/>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 "></label>
                                    <p class="col-sm-6 help-block">.png o .jpg o .jpeg</p> 
                                </div>                   
                            </div>
                        </div>
                        <div class="card-footer row ">
                            <div class="text-end">
                                <a href="index.php" class="btn btn-secondary"><i class="fa-solid fa-right-from-bracket"></i> Salir</a>
                                <button class="btn btn-primary" id="btnListo" type="submit" value="guardar">Actualizar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    <!-------------------------------------------------FOOTER---------------------------------------->
    <?php require_once VIEW_PATH . 'Templates/FootDashboardBootstrap.php' ?>
    
    <!----------------------------------------------------------------------------------------------->
    <script type="text/javascript" src="assets/js/Validacion_Noticias.js"></script>
    <?php require_once VIEW_PATH . 'Templates/EndDashboardBootstrap.php' ?>
