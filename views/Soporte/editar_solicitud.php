<?php require_once VIEW_PATH . 'Templates/HeadDashboardBootstrap.php' ?>

<title>Editar - Solicitud de soporte ArkGames</title>
</head>

    <?php require_once VIEW_PATH . 'Templates/MenuDashboardBootstrap.php'?>
    
    <main class="main p-5 mx-3">
        <div class="container px-5">
            <div class="container card shadow">
                <form id="form_solicitud" method="POST" action="index.php?c=soporte&a=guardar&id=<?php echo $soporte->id_solicitud == null ? '' : $soporte->id_solicitud; ?>" enctype="multipart/form-data">
                    <div class="card-header row">
                        <h3 class="title text-center">Editar una solicitud de soporte</h3>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-sm-2 text-end">
                                <label class="form-label" for="id">ID:</label>
                            </div>
                            <div class="col-sm-1">
                                <input id="id" class="form-control" type="<?php echo $soporte->id_solicitud != null ? 'text' : 'hidden'; ?>" name="txtid" readonly value="<?php echo $soporte->id_solicitud?>" /> <br>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-2 text-end">
                                <label class="form-label" for="usuario">Usuario:</label>
                            </div>
                            <div class="col-sm-8">
                                <input id="usuario" class="form-control" type="text" name="txtusuario" value="<?php echo $soporte->usuario?>" >
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-2 text-end">
                                <label class="form-label" for="email">E-Mail:</label>
                            </div>
                            <div class="col-sm-8">
                                <input id="email" class="form-control" type="text" name="txtemail" value="<?php echo $soporte->email?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-2 text-end">
                                <label class="form-label" for="telefono">Telefono:</label>
                            </div>
                            <div class="col-sm-8">
                                <input id="telefono" class="form-control" type="text" name="telefono" value="<?php echo $soporte->telefono ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-6">
                                <div class="row">
                                    <label class="col-sm-4 col-form-label text-end">Servicios:</label>
                                    <div class="col-sm-8">
                                        <select id="servicio" class="form-select form-control-sm" aria-label=".form-select-sm example" name="servicio" required>
                                            <option value="0" disabled selected> --Seleccione un servicio-- </option>
                                            <option value="Cuentas" <?php if($soporte->servicio == "Cuentas"){ echo " selected"; }?>>Cuentas</option>
                                            <option value="Pagos" <?php if($soporte->servicio == "Pagos"){ echo " selected"; }?>>Pagos</option>
                                            <option value="Creadores" <?php if($soporte->servicio == "Creadores"){ echo " selected"; }?>>Creadores</option>
                                            <option value="Compatibilidad" <?php if($soporte->servicio == "Compatibilidad"){ echo " selected"; }?>>Compatibilidad</option>
                                            <option value="Otros" <?php if($soporte->servicio == "Otros"){ echo " selected"; }?>>Otros</option>
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
                                            <option value="Apex Legends" <?php if($soporte->producto == "Apex Legends"){ echo " selected"; }?>>Apex Legends</option>
                                            <option value="Genshin Impact" <?php if($soporte->producto == "Genshin Impact"){ echo " selected"; }?>>Genshin Impact</option>
                                            <option value="Fall Guys" <?php if($soporte->producto == "Fall Guys"){ echo " selected"; }?>>Fall Guys</option>
                                            <option value="Fortnite" <?php if($soporte->producto == "Fortnite"){ echo " selected"; }?>>Fortnite</option>
                                            <option value="Otros" <?php if($soporte->producto == "Otros"){ echo " selected"; }?>>Otros</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        <div class="row mb-3">
                            <div class="col-sm-2 text-end">
                                <label class="form-label" for="descripcion">Descripcion del problema:</label>
                            </div>
                            <div class="col-sm-8">
                                <textarea id="descripcion" class="form-control" type="text" name="txtdescripcion" style="resize: none; height: 250px"><?php echo htmlspecialchars($soporte->descripcion_problema); ?></textarea>
                            </div>
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
    <?php require_once VIEW_PATH . 'Templates/FootDashboardBootstrap.php'?>
    <!----------------------------------------------------------------------------------------------->
    <script type="text/javascript" src="assets/js/Validaciones_frmSoporte.js"></script>
    <?php require_once VIEW_PATH . 'Templates/EndDashboardBootstrap.php' ?>

