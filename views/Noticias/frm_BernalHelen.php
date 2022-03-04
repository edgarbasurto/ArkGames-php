<?php require_once '../../views/Templates/HeadBootstrap.php' ?>


<meta name="description" content="Página de noticas ArkGames" />
<meta name="keywords" content="formulario,noticias,suscripción" />

<title>Suscripción - Noticias ArkGames</title>
</head>

<body id="bodyTemp">
    <header>
        <?php
        require_once '../Templates/navBarBootstrap.php'
        ?>
    </header>

    <main class="main p-5 mx-3">

        <div class="container px-5">
            <div class="container card shadow">

                <form id="form_suscripcion" method="post">
                    <div class="card-header row">
                        <h3 class="title text-center">Suscripción a nuestra newsletter</h3>
                    </div>


                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3 text-end">
                                <label class="form-label" for="email">Correo electrónico:</label>
                            </div>
                            <div class="col-sm-8">
                                <input id="email" class="form-control" type="email" name="txtemail">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-1"></div>
                            <div class="col-sm-5">
                                <label class="form-label">Tipo de correo que deseo leer:</label>
                                <div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="chkbtema[]" value="Novedades" id="Novedades">
                                        <label class="form-check-label" for="Novedades">Novedades</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="chkbtema[]" value="Eventos" id="Eventos">
                                        <label class="form-check-label" for="Eventos">Eventos</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="chkbtema[]" value="Descuentos" id="Descuentos">
                                        <label class="form-check-label" for="Descuentos">Descuentos</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="chkbtema[]" value="Torneos" id="Torneos">
                                        <label class="form-check-label" for="Torneos">Torneos</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="chkbtema[]" value="Análisis" id="Análisis">
                                        <label class="form-check-label" for="Análisis">Análisis</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="chkbtema[]" value="Trucos" id="Trucos">
                                        <label class="form-check-label" for="Trucos">Trucos</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <label class="form-label">Sección:</label> <br>
                                <div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="chkbdispositivo[]" value="PC">
                                        <label class="form-check-label" for="PC">PC</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="chkbdispositivo[]" value="PS2 - PS3 - PS4 - PS5">
                                        <label class="form-check-label" for="PS2 - PS3 - PS4 - PS5 ">PS2 - PS3 - PS4 - PS5 </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="chkbdispositivo[]" value="XBox">
                                        <label class="form-check-label" for="XBox">XBox</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="chkbdispositivo[]" value="Wii">
                                        <label class="form-check-label" for="Wii">Wii</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="chkbdispositivo[]" value="Android">
                                        <label class="form-check-label" for="Android">Android</label>
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
                            <a href="listar_suscripcion.php" class="btn btn-secondary"><i class="fa-solid fa-right-from-bracket"></i> Salir</a>
                            <button class="btn btn-primary" id="btnListo" type="submit" value="Listo">Listo</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <?php
    require_once '../../config/conexionPDO.php';
    var_dump($_POST);
    if (
        !empty($_POST['txtemail']) && isset($_POST['chkbtema'])  &&
        isset($_POST['chkbdispositivo']) && isset($_POST['rdbfrecuencia']) && isset($_POST['rdbdiscord'])
    ) {

        $email = htmlentities($_POST['txtemail']);
        $temas = implode(', ', $_POST['chkbtema']);
        print $temas;
        $dispositivos = implode(', ', $_POST['chkbdispositivo']);
        $frecuencia = htmlentities($_POST['rdbfrecuencia']);
        $discord = htmlentities($_POST['rdbdiscord']);

        $data = [
            'email' => $email,
            'temas' => $temas,
            'disps' => $dispositivos,
            'frec' => $frecuencia,
            'discord' => $discord
        ];
        $sql = "insert into suscripcion(email, temas, dispositivos, frecuencia, discord) values(:email, :temas, :disps, :frec, :discord)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute($data);

        if ($stmt->rowCount() > 0) { // rowCount() permite conocer el numero de filas afectadas
            //header('location:listar_noticias.php');
            echo '<script>window.location="listar_suscripcion.php"</script>';
        }
    }
    ?>
    <!-------------------------------------------------FOOTER---------------------------------------->

    <?php
    require_once '../Templates/footerBootstrap.php'
    ?>

    <!----------------------------------------------------------------------------------------------->

    <script type="text/javascript" src="../../assets/js/Validacion_Noticias.js"></script>

</body>

</html>