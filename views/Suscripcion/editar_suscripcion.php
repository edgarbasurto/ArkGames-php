<?php require_once VIEW_PATH . 'Templates/HeadDashboardBootstrap.php' ?>


<meta name="description" content="Página de noticas ArkGames" />
<meta name="keywords" content="formulario,noticias,suscripción" />

<title>Suscripción - Noticias ArkGames</title>
</head>

<?php require_once VIEW_PATH . 'Templates/MenuDashboardBootstrap.php'?>
        <main class="main p-5 mx-3">
            <div class="container px-5">
                <div class="container card shadow">
                    <form id="form_suscripcion" method="POST" action="index.php?c=suscripcion&a=guardar&id=<?php echo $suscripcion->id_suscripcion == null ? '' : $suscripcion->id_suscripcion; ?>">
                        <div class="card-header row">
                            <h3 class="title text-center">Editar Suscripción</h3>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-1 text-end">
                                    <label class="form-label" for="id">ID:</label>
                                </div>
                                <div class="col-sm-1">
                                    <input id="id" class="form-control" type="number" name="txtid" readonly value="<?php echo $suscripcion->id_suscripcion ?>" /> <br>
                                </div>

                                <div class="col-sm-4 text-end">
                                    <label class="form-label" for="email">Correo electrónico:</label>
                                </div>
                                <div class="col-sm-6">
                                    <input id="email" class="form-control" type="email" name="txtemail" value="<?php echo $suscripcion->email ?>" /> <br>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-1"></div>
                                <div class="col-sm-5">
                                    <label class="form-label">Tipo de correo que deseo leer:</label>
                                    <div>
                                        <div class="form-check">
                                            <input class="form-check-input tema" type="checkbox" name="chkbtema[]" value="Novedades" <?php if (str_contains($suscripcion->temas, "Novedades")) echo 'checked'; ?> /> Novedades <br>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input tema" type="checkbox" name="chkbtema[]" value="Eventos" <?php if (str_contains($suscripcion->temas, "Eventos")) echo 'checked'; ?> /> Eventos <br>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input tema" type="checkbox" name="chkbtema[]" value="Descuentos" <?php if (str_contains($suscripcion->temas, "Descuentos")) echo 'checked'; ?> /> Descuentos <br>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input tema" type="checkbox" name="chkbtema[]" value="Torneos" <?php if (str_contains($suscripcion->temas, "Torneos")) echo 'checked'; ?> /> Torneos <br>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input tema" type="checkbox" name="chkbtema[]" value="Análisis" <?php if (str_contains($suscripcion->temas, "Análisis")) echo 'checked'; ?> /> Análisis <br>
                                        </div>
                                        <div id="tema" class="form-check">
                                            <input class="form-check-input tema" type="checkbox" name="chkbtema[]" value="Trucos" <?php if (str_contains($suscripcion->temas, "Trucos")) echo 'checked'; ?> /> Trucos <br>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-5">
                                    <label class="form-label">Sección:</label> <br>
                                    <div>
                                        <div class="form-check">
                                            <input class="form-check-input dispositivo" type="checkbox" name="chkbdispositivo[]" value="PC" <?php if (str_contains($suscripcion->dispositivos, "PC")) echo 'checked'; ?> /> PC <br>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input dispositivo" type="checkbox" name="chkbdispositivo[]" value="PS4 - PS5" <?php if (str_contains($suscripcion->dispositivos, "PS4 - PS5")) echo 'checked'; ?> /> PS4 - PS5 <br>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input dispositivo" type="checkbox" name="chkbdispositivo[]" value="XBox" <?php if (str_contains($suscripcion->dispositivos, "XBox")) echo 'checked'; ?> /> XBox <br>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input dispositivo" type="checkbox" name="chkbdispositivo[]" value="Wii" <?php if (str_contains($suscripcion->dispositivos, "Wii")) echo 'checked'; ?> /> Wii <br>
                                        </div>
                                        <div id="dispositivo" class="form-check">
                                            <input class="form-check-input dispositivo" type="checkbox" name="chkbdispositivo[]" value="Android" <?php if (str_contains($suscripcion->dispositivos, "Android")) echo 'checked'; ?> /> Android <br>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-1"></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-1"></div>
                                <div class="col-sm-5"> 
                                    <label class="form-label">¿Cada cuánto desea recibir nuestros correos?</label> <br>
                                    <div>
                                        <input class="formItem frecuencia" type="radio" name="rdbfrecuencia" value="diario" <?php echo ($suscripcion->frecuencia == 'diario') ?  "checked" : "";  ?> />Diario <br>
                                        <input class="formItem frecuencia" type="radio" name="rdbfrecuencia" value="semanal" <?php echo ($suscripcion->frecuencia == 'semanal') ?  "checked" : "";  ?>>Semanal(Las noticias más detacadas, todos los sábados)<br>
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <label class="form-label">¿Desea unirse a nuestro servidor de Discord?</label> <br>
                                    <div>
                                        <input class="formItem discord" type="radio" name="rdbdiscord" value="Si" <?php echo ($suscripcion->discord == 'Si') ?  "checked" : "";  ?> />Sí <br>
                                        <input class="formItem discord" type="radio" name="rdbdiscord" value="No" <?php echo ($suscripcion->discord == 'No') ?  "checked" : "";  ?> />No <br>
                                    </div>
                                </div>
                                <div class="col-sm-1"></div>
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
    <script type="text/javascript" src="../../assets/js/Validacion_Noticias.js"></script>
    <?php require_once VIEW_PATH . 'Templates/EndDashboardBootstrap.php' ?>
