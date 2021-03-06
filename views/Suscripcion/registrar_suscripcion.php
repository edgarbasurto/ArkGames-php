<?php require_once VIEW_PATH . 'Templates/HeadBootstrap.php' ?>


<meta name="description" content="Página de noticas ArkGames" />
<meta name="keywords" content="formulario,noticias,suscripción" />

<title>Suscripción - Noticias ArkGames</title>
</head>

<body id="bodyTemp">
    <?php require_once VIEW_PATH . 'Templates/navBarBootstrap.php'?>

    <main class="container my-5">

        <div class="container px-5">
            <div class="container card shadow bg-dark text-white">

                <form id="form_suscripcion" method="POST" action="index.php?c=suscripcion&a=guardar">
                    <div class="card-header row my-3">
                        <h3 class="title text-center">Suscripción a nuestra newsletter</h3>
                    </div>
                    <div class="card-body">
                        <div class="row my-4">
                            <div class="col-sm-3 text-end">
                                <label class="form-label" for="email">Correo electrónico:</label>
                            </div>
                            <div class="col-sm-8">
                                <input id="email" class="form-control" type="email" name="txtemail">
                            </div>
                        </div>
                        <div class="row my-4 py-3">
                            <div class="col-sm-1"></div>
                            <div class="col-sm-5">
                                <label class="form-label">Tipo de correo que deseo leer:</label>
                                <div>
                                    <div class="form-check">
                                        <input class="form-check-input tema" type="checkbox" name="chkbtema[]" value="Novedades" id="Novedades">
                                        <label class="form-check-label" for="Novedades">Novedades</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input tema" type="checkbox" name="chkbtema[]" value="Eventos" id="Eventos">
                                        <label class="form-check-label" for="Eventos">Eventos</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input tema" type="checkbox" name="chkbtema[]" value="Descuentos" id="Descuentos">
                                        <label class="form-check-label" for="Descuentos">Descuentos</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input tema" type="checkbox" name="chkbtema[]" value="Torneos" id="Torneos">
                                        <label class="form-check-label" for="Torneos">Torneos</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input tema" type="checkbox" name="chkbtema[]" value="Análisis" id="Análisis">
                                        <label class="form-check-label" for="Análisis">Análisis</label>
                                    </div>
                                    <div id="tema" class="form-check">
                                        <input class="form-check-input tema" type="checkbox" name="chkbtema[]" value="Trucos" id="Trucos">
                                        <label class="form-check-label" for="Trucos">Trucos</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <label class="form-label">Sección:</label> <br>
                                <div>
                                    <div class="form-check">
                                        <input class="form-check-input dispositivo" type="checkbox" name="chkbdispositivo[]" value="PC">
                                        <label class="form-check-label" for="PC">PC</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input dispositivo" type="checkbox" name="chkbdispositivo[]" value="PS4 - PS5">
                                        <label class="form-check-label" for="PS4 - PS5 ">PS4 - PS5 </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input dispositivo" type="checkbox" name="chkbdispositivo[]" value="Xbox">
                                        <label class="form-check-label" for="Xbox">Xbox</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input dispositivo" type="checkbox" name="chkbdispositivo[]" value="Wii">
                                        <label class="form-check-label" for="Wii">Wii</label>
                                    </div>
                                    <div id="dispositivo" class="form-check">
                                        <input class="form-check-input dispositivo" type="checkbox" name="chkbdispositivo[]" value="Android">
                                        <label class="form-check-label" for="Android">Android</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-1"></div>
                        </div>

                        <div class="row my-2">
                            <div class="col-sm-1"></div>
                            <div class="col-sm-5">
                                <label class="form-label">¿Cada cuánto desea recibir nuestros correos?</label> <br>
                                <div>
                                    <input class="formItem frecuencia" type="radio" name="rdbfrecuencia" value="diario" />Diario <br>
                                    <input class="formItem frecuencia" type="radio" name="rdbfrecuencia" value="semanal">Semanal(Las noticias más detacadas, todos los sábados)<br>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <label class="form-label">¿Desea unirse a nuestro servidor de Discord?</label> <br>
                                <div>
                                    <input class="formItem discord" type="radio" name="rdbdiscord" value="Si" />Sí <br>
                                    <input class="formItem discord" type="radio" name="rdbdiscord" value="No" />No <br>
                                </div>
                            </div>
                            <div class="col-sm-1"></div>
                        </div>
                    </div>


                    <div class="card-footer row ">
                        <div class="text-end">
                            <a href="?c=noticias&a=index_noticias" class="btn btn-secondary"><i class="fa-solid fa-right-from-bracket"></i> Salir</a>
                            <button class="btn btn-primary" id="btnListo" type="submit" value="guardar">Listo</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <!-------------------------------------------------FOOTER---------------------------------------->

    <?php
    require_once VIEW_PATH . 'Templates/footerBootstrap.php'
    ?>

    <!----------------------------------------------------------------------------------------------->

    <script type="text/javascript" src="../../assets/js/Validacion_Suscrip.js"></script>

</body>

</html>