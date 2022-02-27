<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Página de noticas ArkGames" />
    <meta name="keywords" content="formulario,noticias,suscripción" />
    <link rel="stylesheet" href="../../assets/css/master2.css" />
    <link rel="shortcut icon" href="../../assets/img/logo.svg">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Suscripción - Noticias ArkGames</title>
    <style>
        h3 {
            margin: 20px;
        }

        .contenedor-formulario {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 10px;
        }

        .contenedor-formulario div {
            text-align: center;
            width: 50%;
            background-color: gray;
            margin: 10px;
        }

        #form_suscripcion {
            display: flex;
            flex-direction: column;
            text-align: center;
        }

        .grupo_datos {
            align-self: center;
            text-align: center;
            padding: 10px;
            width: 100%;
        }

        .grupo_datos div {
            text-align: left;
            width: 100%;
        }

        #email {
            width: 100%;
        }

        #btnListo {
            width: 50%;
            height: 30px;
        }
    </style>
</head>

<body>
    <!-------------------------------------------------MENU---------------------------------------->
    <?php
        include_once '../Templates/menu.php';
    ?>
    <!------------------------------------------------------------------------------------------>
    
    <div class="contenedor-formulario">
        <div>
            <h3 style="padding-left: 10px;">Suscripción a nuestra newsletter</h3>
            <form id="form_suscripcion" method="post">
                <div class="grupo_datos">
                    <label for="email">Correo electrónico:</label><br>
                    <div>
                        <input id="email" class="formItem" type="email" name="txtemail" /> <br>
                    </div>
                </div>
                <div class="grupo_datos">
                    <label>Tipo de correo que deseo leer:</label><br>
                    <div>
                        <input class="formItem tema" type="checkbox" name="chkbtema[]" value="Novedades"/> Novedades <br>
                        <input class="formItem tema" type="checkbox" name="chkbtema[]" value="Eventos"/> Eventos <br>
                        <input class="formItem tema" type="checkbox" name="chkbtema[]" value="Descuentos"/> Descuentos <br>
                        <input class="formItem tema" type="checkbox" name="chkbtema[]" value="Torneos"/> Torneos <br>
                        <input class="formItem tema" type="checkbox" name="chkbtema[]" value="Análisis"/> Análisis <br>
                        <input class="formItem tema" type="checkbox" name="chkbtema[]" value="Trucos"/> Trucos <br>
                    </div>
                </div>
                <div class="grupo_datos">
                    <label>Sección:</label> <br>
                    <div>
                        <input class="formItem dispositivo" type="checkbox" name="chkbdispositivo[]" value="PC"/> PC <br>
                        <input class="formItem dispositivo" type="checkbox" name="chkbdispositivo[]" value="PS2 - PS3 - PS4 - PS5"/> PS2 - PS3 - PS4 - PS5 <br>
                        <input class="formItem dispositivo" type="checkbox" name="chkbdispositivo[]" value="XBox"/> XBox <br>
                        <input class="formItem dispositivo" type="checkbox" name="chkbdispositivo[]" value="Wii"/> Wii <br>
                        <input class="formItem dispositivo" type="checkbox" name="chkbdispositivo[]" value="Android"/> Android <br>
                    </div>
                </div>
                <div class="grupo_datos">
                    <label>¿Cada cuánto desea recibir nuestros correos?</label> <br>
                    <div>
                        <input class="formItem frecuencia" type="radio" name="rdbfrecuencia" value="diario" />Diario <br>
                        <input class="formItem frecuencia" type="radio" name="rdbfrecuencia" value="semanal">Semanal(Las noticias más detacadas, todos los sábados)<br>
                    </div>
                </div>
                <div class="grupo_datos">
                    <label>¿Desea unirse a nuestro servidor de Discord?</label> <br>
                    <div>
                        <input class="formItem discord" type="radio" name="rdbdiscord" value="Sí" />Sí <br>
                        <input class="formItem discord" type="radio" name="rdbdiscord" value="No" />No <br>
                    </div>
                </div>
                <div class="grupo_datos">
                    <input id="btnListo" type="submit" value="Listo" />
                </div>
            </form>
        </div>
    </div>
    <?php
        require_once '../../config/conexionPDO.php';
        //var_dump($_POST);
        if (!empty($_POST['txtemail']) && isset($_POST['chkbtema'])  &&
        isset($_POST['chkbdispositivo']) && isset($_POST['rdbfrecuencia']) && isset($_POST['rdbdiscord'])) {
  
            $email = htmlentities($_POST['txtemail']);
            $temas = implode(', ', $_POST['chkbtema']);
            //print $temas;
            $dispositivos = implode(', ', $_POST['chkbdispositivo']);
            $frecuencia = htmlentities($_POST['rdbfrecuencia']);
            $discord = htmlentities($_POST['rdbdiscord']);

            $data = [
                'email' => $email,
                'temas' => $temas,
                'disps' => $dispositivos,
                'frec' => $frecuencia,
                'discord' =>$discord
            ];
            $sql = "insert into suscripcion(email, temas, dispositivos, frecuencia, discord) values(:email, :temas, :disps, :frec, :discord)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute($data);

            if ($stmt->rowCount() > 0) {// rowCount() permite conocer el numero de filas afectadas
                header("location:listar_noticias.php");
            }
        }    
    ?>
    <!-------------------------------------------------FOOTER---------------------------------------->
    <?php
    include_once '../Templates/footer.php'
    ?>
    <!----------------------------------------------------------------------------------------------->
    <!--<script type="text/javascript" src="../../assets/js/Validacion_Noticias.js"></script>-->
</body>

</html>