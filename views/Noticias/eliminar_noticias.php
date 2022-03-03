<?php require_once '../../views/Templates/HeadBootstrap.php' ?>


<meta name="description" content="Página de noticas ArkGames" />
<meta name="keywords" content="formulario,noticias,suscripción" />

<title>CRUD</title>
</head>

<body id="bodyTemp">
    <header>
        <?php
        require_once '../Templates/navBarBootstrap.php'
        ?>
    </header>

    <?php
    require_once '../../config/conexionPDO.php';
    if (!empty($_GET['id'])) {
        $data = ['id' => htmlentities($_GET['id'])];
        $sql = "select * from suscripcion where id_suscripcion = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute($data);

        $filas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($filas as $fila) {
    ?>
            <div class="contenedor-formulario">
                <div>
                    <h3 style="padding-left: 10px;">Eliminar Suscripción</h3>
                    <form id="form_suscripcion" method="post">
                        <div class="grupo_datos">
                            <label for="id">ID:</label>
                            <input id="id" class="formItem" type="number" name="txtid" readonly style="width: 50px;" value="<?php echo $fila['id_suscripcion'] ?>" /> <br>
                        </div>
                        <div class="grupo_datos">
                            <label for="email">Correo electrónico:</label>
                            <input id="email" class="formItem" type="email" name="txtemail" readonly value="<?php echo $fila['email'] ?>" /> <br>
                        </div>
                        <div class="grupo_datos">
                            <label>Tipo de correo que deseo leer:</label> <br>
                            <?php
                            $temas_array = explode(", ", $fila['temas']);
                            foreach ($temas_array as $tema) {
                                $checked = "";
                                if (str_contains($fila['temas'], $tema)) {
                                    $checked = "checked";
                                }
                                echo '<input class="formItem tema" type="checkbox" name="chkbtema[]" disabled value= ' . $tema . ' 
                                        ' . $checked . '/> ' . $tema . '<br>';
                            }
                            ?>
                        </div>
                        <div class="grupo_datos">
                            <label>Sección:</label> <br>
                            <?php
                            $disps_array = explode(", ", $fila['dispositivos']);
                            foreach ($disps_array as $dispositivo) {
                                $checked = "";
                                if (str_contains($fila['dispositivos'], $dispositivo)) {
                                    $checked = "checked";
                                }
                                echo '<input class="formItem dispositivo" type="checkbox" name="chkbdispositivo[]" disabled value= ' . $dispositivo . ' 
                                        ' . $checked . '/> ' . $dispositivo . '<br>';
                            }
                            ?>
                        </div>
                        <div class="grupo_datos">
                            <label>¿Cada cuánto desea recibir nuestros correos?</label> <br>
                            <div>
                                <input class="formItem frecuencia" type="radio" name="rdbfrecuencia" disabled value="diario" <?php echo ($fila['frecuencia'] == 'diario') ?  "checked" : "";  ?> />Diario <br>
                                <input class="formItem frecuencia" type="radio" name="rdbfrecuencia" disabled value="semanal" <?php echo ($fila['frecuencia'] == 'semanal') ?  "checked" : "";  ?>>Semanal(Las noticias más detacadas, todos los sábados)<br>
                            </div>
                        </div>
                        <div class="grupo_datos">
                            <label>¿Desea unirse a nuestro servidor de Discord?</label> <br>
                            <div>
                                <input class="formItem discord" type="radio" name="rdbdiscord" disabled value="Sí" <?php echo ($fila['discord'] == 'Si') ?  "checked" : "";  ?> />Sí <br>
                                <input class="formItem discord" type="radio" name="rdbdiscord" disabled value="No" <?php echo ($fila['discord'] == 'No') ?  "checked" : "";  ?> />No <br>
                            </div>
                        </div>
                        <div class="grupo_datos">
                            <input id="btnListo" type="submit" value="Eliminar" />
                        </div>
                    </form>
                </div>
            </div>
    <?php
        }
    }
    ?>
    <?php
    if (isset($_POST['txtid'])) {
        $data = ['id' => htmlentities($_POST['txtid'])];
        $sql = "delete from suscripcion where id_suscripcion = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute($data);

        if ($stmt->rowCount() > 0) { // rowCount() permite conocer el numero de filas afectadas
            echo '<script>window.location="listar_suscripcion.php"</script>';
        } else {
            echo 'NO se pudo eliminar el registro';
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