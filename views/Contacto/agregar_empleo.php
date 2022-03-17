<?php require_once VIEW_PATH . 'Templates/HeadDashboardBootstrap.php' ?>

<title>Contacto - Solicitud de empleo ArkGames</title>
</head>

    <?php require_once VIEW_PATH . 'Templates/MenuDashboardBootstrap.php'?>

    <main class="main p-5 mx-3">
        <div class="container px-5">
            <div class="container card shadow">

                <form id="solicitudEmpleo" method="POST" action="index.php?c=empleo&a=guardar" enctype="multipart/form-data">
                    <div class="card-header row">
                        <h3 class="title text-center">Solicitud de Empleo</h3>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-sm-2 text-end">
                                <label class="form-label" for="nombre">Nombre:</label>
                            </div>
                            <div class="col-sm-8">
                                <input id="nombre" class="form-control" type="text" name="txtnombre">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-2 text-end">
                                <label class="form-label" for="apellido">Apeliido:</label>
                            </div>
                            <div class="col-sm-8">
                                <input id="apellido" class="form-control" type="text" name="txtapellido">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-2 text-end">
                                <label class="form-label" for="edad">Edad:</label>
                            </div>
                            <div class="col-sm-8">
                                <input id="edad" class="form-control" type="text" name="txtedad">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-2 text-end">
                                <label class="form-label" for="telefono">Telefono:</label>
                            </div>
                            <div class="col-sm-8">
                                <input id="telefono" class="form-control" type="text" name="txtTelefono">
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
                            <div class="col-sm-6">
                                <div class="row">
                                    <label class="col-sm-4 col-form-label text-end">Vacante:</label>
                                    <div class="col-sm-8">
                                        <select id="vacante" class="form-select form-control-sm" aria-label=".form-select-sm example" name="selectVacante" required>
                                            <option value="0" disabled selected> --Seleccione una vacante-- </option>
                                            <?php
                                            
                                            foreach ($lista as $vacante) {
                                            ?>
                                                <option value="<?php echo $vacante->id_vacante ?>"><?php echo $vacante->nombre_vacante ?></option>
                                        
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>                
                        <div class="row mb-3">
                            <div class="col-sm-2 text-end">
                                <label class="form-label" for="descripcion">Agrege experiencias previas del trabajo:</label>
                            </div>
                            <div class="col-sm-8">
                                <textarea id="experiencia" class="form-control" type="text" name="txtExperiencia" style="resize: none; height: 250px"></textarea>
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
    <script type="text/javascript" src="assets/js/validacion_frmEmpleo.js"></script>
    <?php require_once VIEW_PATH . 'Templates/EndDashboardBootstrap.php' ?>

