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

    <?php
    require_once '../../config/conexionPDO.php';

    if (isset($_GET['id'])) {
        $data = ['id' => htmlentities($_GET['id'])];
        $sql = "select * from suscripcion where id_suscripcion = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute($data);

        $filas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($filas as $fila) { ?>


            <main class="main p-5 mx-3">

                <div class="container px-5">
                    <div class="container card shadow">

                        <form id="form_suscripcion" method="post">
                            <div class="card-header row">
                                <h3 class="title text-center">Editar Suscripción</h3>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-1 text-end">
                                        <label class="form-label" for="id">ID:</label>
                                    </div>
                                    <div class="col-sm-1">
                                        <input id="id" class="form-control" type="number" name="txtid" readonly style="width: 50px;" value="<?php echo $fila['id_suscripcion'] ?>" /> <br>
                                    </div>

                                    <div class="col-sm-4 text-end">
                                        <label class="form-label" for="email">Correo electrónico:</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <input id="email" class="form-control" type="email" name="txtemail" value="<?php echo $fila['email'] ?>" /> <br>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-1"></div>
                                    <div class="col-sm-5">
                                        <label class="form-label">Tipo de correo que deseo leer:</label>
                                        <div>

                                            <?php
                                            $temas_devueltos = explode(", ", $fila['temas']);
                                            //$temas = ["Novedades", "Eventos", "Descuentos", "Torneos","Análisis","Trucos"];
                                            ?>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="chkbtema[]" value="Novedades" <?php if (str_contains($fila['temas'], "Novedades")) echo 'checked'; ?> /> Novedades <br>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="chkbtema[]" value="Eventos" <?php if (str_contains($fila['temas'], "Eventos")) echo 'checked'; ?> /> Eventos <br>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="chkbtema[]" value="Descuentos" <?php if (str_contains($fila['temas'], "Descuentos")) echo 'checked'; ?> /> Descuentos <br>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="chkbtema[]" value="Torneos" <?php if (str_contains($fila['temas'], "Torneos")) echo 'checked'; ?> /> Torneos <br>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="chkbtema[]" value="Análisis" <?php if (str_contains($fila['temas'], "Análisis")) echo 'checked'; ?> /> Análisis <br>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="chkbtema[]" value="Trucos" <?php if (str_contains($fila['temas'], "Trucos")) echo 'checked'; ?> /> Trucos <br>
                                            </div>
                                            <!--<?php
                                                //$temas = ["Novedades", "Eventos", "Descuentos", "Torneos","Análisis","Trucos"];
                                                //$temas_devueltos = explode(", ", $fila['temas']);
                                                //foreach ($temas as $tema) 
                                                //{
                                                //    $checked = (str_contains($fila['temas'], $tema)) ? "checked":"";
                                                //    echo '<input class="formItem tema" type="checkbox" name="chkbtema[]" value= '.$tema.' 
                                                //    '.$checked.'/> '.$tema.'<br>'; 
                                                //    
                                                ?>
                                                 //    <?php

                                                        //}
                                                        ?>-->

                                        </div>
                                    </div>

                                    <div class="col-sm-5">
                                        <label class="form-label">Sección:</label> <br>
                                        <div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="chkbdispositivo[]" value="PC" <?php if (str_contains($fila['dispositivos'], "PC")) echo 'checked'; ?> /> PC <br>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="chkbdispositivo[]" value="PS2 - PS3 - PS4 - PS5" <?php if (str_contains($fila['dispositivos'], "PS2 - PS3 - PS4 - PS5")) echo 'checked'; ?> /> PS2 - PS3 - PS4 - PS5 <br>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="chkbdispositivo[]" value="XBox" <?php if (str_contains($fila['dispositivos'], "XBox")) echo 'checked'; ?> /> XBox <br>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="chkbdispositivo[]" value="Wii" <?php if (str_contains($fila['dispositivos'], "Wii")) echo 'checked'; ?> /> Wii <br>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="chkbdispositivo[]" value="Android" <?php if (str_contains($fila['dispositivos'], "Android")) echo 'checked'; ?> /> Android <br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-1"></div>
                                </div>

                                <!--<?php
                                    //    $dispositivos = ["PC", "PS2 - PS3 - PS4 - PS5", "XBox", "Wii","Android"];
                                    //$temas_devueltos = explode(", ", $fila['temas']);
                                    //    foreach ($dispositivos as $dispositivo) 
                                    //    {
                                    //        $checked = (str_contains($fila['dispositivos'], $dispositivo)) ? "checked":"";
                                    //        echo '<input class="formItem dispositivo" type="checkbox" name="chkdispositivo[]" value= '.$dispositivo.' 
                                    //        '.$checked.'/> '.$dispositivo.'<br>'; 
                                    //        
                                    ?>
                                            //        <?php

                                                        //    }
                                                        ?>-->
                                <div class="row">
                                    <div class="col-sm-1"></div>
                                    <div class="col-sm-5">
                                        <label class="form-label">¿Cada cuánto desea recibir nuestros correos?</label> <br>
                                        <div>
                                            <input class="formItem frecuencia" type="radio" name="rdbfrecuencia" value="diario" <?php echo ($fila['frecuencia'] == 'diario') ?  "checked" : "";  ?> />Diario <br>
                                            <input class="formItem frecuencia" type="radio" name="rdbfrecuencia" value="semanal" <?php echo ($fila['frecuencia'] == 'semanal') ?  "checked" : "";  ?>>Semanal(Las noticias más detacadas, todos los sábados)<br>
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <label class="form-label">¿Desea unirse a nuestro servidor de Discord?</label> <br>
                                        <div>
                                            <input class="formItem discord" type="radio" name="rdbdiscord" value="Si" <?php echo ($fila['discord'] == 'Si') ?  "checked" : "";  ?> />Sí <br>
                                            <input class="formItem discord" type="radio" name="rdbdiscord" value="No" <?php echo ($fila['discord'] == 'No') ?  "checked" : "";  ?> />No <br>
                                        </div>
                                    </div>
                                    <div class="col-sm-1"></div>
                                </div>
                            </div>


                            <div class="card-footer row ">
                                <div class="text-end">
                                <a href="listar_suscripcion.php" class="btn btn-secondary"><i class="fa-solid fa-right-from-bracket"></i> Salir</a>
                                    <button class="btn btn-primary" id="btnListo" type="submit" value="Actualizar">Actualizar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </main>

    <?php
        }
    }
    ?>
    <?php
    if (
        !empty($_POST['txtid']) && !empty($_POST['txtemail']) && isset($_POST['chkbtema'])  &&
        isset($_POST['chkbdispositivo']) && isset($_POST['rdbfrecuencia']) && isset($_POST['rdbdiscord'])
    ) {
        $email = htmlentities($_POST['txtemail']);
        $temas = implode(', ', $_POST['chkbtema']);
        //print $temas;
        $dispositivos = implode(', ', $_POST['chkbdispositivo']);
        $frecuencia = htmlentities($_POST['rdbfrecuencia']);
        $discord = htmlentities($_POST['rdbdiscord']);

        $data = [
            'id' => htmlentities($_POST['txtid']),
            'email' => $email,
            'temas' => $temas,
            'disps' => $dispositivos,
            'frec' => $frecuencia,
            'discord' => $discord
        ];
        $sql = "update suscripcion set email =:email, temas = :temas, dispositivos = :disps, frecuencia=:frec, discord=:discord"
            . " where id_suscripcion=:id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute($data);

        if ($stmt->rowCount() > 0) { // rowCount() permite conocer el numero de filas afectadas
            echo '<script>window.location="listar_suscripcion.php"</script>';
        } else {
            echo 'NO se pudo editar el registro';
        }
    }
    ?>
    <!-------------------------------------------------FOOTER---------------------------------------->
    <?php
    require_once '../Templates/footerBootstrap.php'
    ?>
    <!----------------------------------------------------------------------------------------------->
    <!--<script type="text/javascript" src="../../assets/js/Validacion_Noticias.js"></script>-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>

</html>