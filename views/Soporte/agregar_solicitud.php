<?php require_once VIEW_PATH . 'Templates/HeadDashboardBootstrap.php' ?>

<title>Agregar - Solicitud de soporte ArkGames</title>
</head>

    <?php require_once VIEW_PATH . 'Templates/MenuDashboardBootstrap.php'?>
    
    <main class="main p-5 mx-3">
        <div class="container px-5">
            <div class="container card shadow">

                <form id="solicitud" method="POST" action="index.php?c=soporte&a=guardar" enctype="multipart/form-data">
                    <div class="card-header row">
                        <h3 class="title text-center">Agrega una solicitud de soporte</h3>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-sm-2 text-end">
                                <label class="form-label" for="usuario">Usuario:</label>
                            </div>
                            <div class="col-sm-8">
                                <input id="usuario" class="form-control" type="text" name="txtusuario">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-2 text-end">
                                <label class="form-label" for="email">E-Mail:</label>
                            </div>
                            <div class="col-sm-8">
                                <input id="email" class="form-control" type="text" name="txtemail">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-2 text-end">
                                <label class="form-label" for="telefono">Telefono:</label>
                            </div>
                            <div class="col-sm-8">
                                <input id="telefono" class="form-control" type="text" name="telefono">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-6">
                                <div class="row">
                                    <label class="col-sm-4 col-form-label text-end">Servicios:</label>
                                    <div class="col-sm-8">
                                        <select id="servicio" class="form-select form-control-sm" aria-label=".form-select-sm example" name="servicio" required>
                                            <option value="0" disabled selected> --Seleccione un servicio-- </option>
                                            <option value="Cuentas">Cuentas</option>
                                            <option value="Pagos">Pagos</option>
                                            <option value="Creadores">Creadores</option>
                                            <option value="Compatibilidad">Compatibilidad</option>
                                            <option value="Otros">Otros</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label text-end">Producto:</label>
                                    <div class="col-sm-8">
                                        <select id="producto" class="form-select form-control-sm" aria-label=".form-select-sm example" name="producto" required>
                                            <option value="0" disabled selected> --Seleccione un producto-- </option>
                                            <option value="Apex Legends">Apex Legends</option>
                                            <option value="Genshin Impact">Genshin Impact</option>
                                            <option value="Fall Guys">Fall Guys</option>
                                            <option value="Fortnite">Fortnite</option>
                                            <option value="Otros">Otros</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        <div class="row mb-3">
                            <div class="col-sm-2 text-end">
                                <label class="form-label" for="descripcion">Descripcion del problema:</label>
                            </div>
                            <div class="col-sm-8">
                                <textarea id="descripcion" class="form-control" type="text" name="txtdescripcion" style="resize: none; height: 250px"></textarea>
                            </div>
                        </div>                          
                        </div>
                    </div>
                    <div class="card-footer row ">
                        <div class="text-end">
                            <a href="index.php" class="btn btn-secondary"><i class="fa-solid fa-right-from-bracket"></i> Salir</a>
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
    <script type="text/javascript" src="assets/js/Validaciones_frmSoporte.js"></script>
    <?php require_once VIEW_PATH . 'Templates/EndDashboardBootstrap.php' ?>

