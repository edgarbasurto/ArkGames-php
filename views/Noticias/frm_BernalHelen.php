<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Página de noticas ArkGames" />
    <meta name="keywords" content="formulario,noticias,suscripción" />
    <link rel="stylesheet" href="../../assets/css/master2.css" />
    <link rel="stylesheet" href="../../assets/css/BernalHelen.css" />
    <link rel="shortcut icon" href="../../assets/img/logo.svg">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Suscripción - Noticias ArkGames</title>
    <style>
        h3 {
            margin: 20px;
        }

        .suscripcion {
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 100px 20px;
            padding: 10px;
            width: 100%;
        }

        .suscripcion div {
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
    include_once '../Templates/header.php'
    ?>
    <!------------------------------------------------------------------------------------------>
    
    <div class="suscripcion">
        <div>
            <h3 style="padding-left: 10px;">Suscripción a nuestra newsletter</h3>
            <form id="form_suscripcion">
                <div class="grupo_datos">
                    <label for="email">Correo electrónico:</label><br>
                    <div>
                        <input id="email" class="formItem" type="email" name="correo" /> <br>
                    </div>
                </div>
                <div class="grupo_datos">
                    <label>Tipo de correo que deseo leer:</label><br>
                    <div>
                        <input class="formItem tema" type="checkbox" name="casilla1" /> Novedades <br>
                        <input class="formItem tema" type="checkbox" name="casilla2" /> Eventos <br>
                        <input class="formItem tema" type="checkbox" name="casilla2" /> Descuentos <br>
                        <input class="formItem tema" type="checkbox" name="casilla3" /> Torneos <br>
                        <input class="formItem tema" type="checkbox" name="casilla4" /> Análisis <br>
                        <input class="formItem tema" type="checkbox" name="casilla5" /> Trucos <br>
                    </div>
                </div>
                <div class="grupo_datos">
                    <label>Sección:</label> <br>
                    <div>
                        <input class="formItem dispositivo" type="checkbox" name="casilla1" /> PC <br>
                        <input class="formItem dispositivo" type="checkbox" name="casilla2" /> PS2 - PS3 - PS4 - PS5 <br>
                        <input class="formItem dispositivo" type="checkbox" name="casilla3" /> XBox <br>
                        <input class="formItem dispositivo" type="checkbox" name="casilla4" /> Wii <br>
                        <input class="formItem dispositivo" type="checkbox" name="casilla5" /> Android <br>
                    </div>
                </div>
                <div class="grupo_datos">
                    <label>¿Cada cuánto desea recibir nuestros correos?</label> <br>
                    <div>
                        <input class="formItem frecuencia" type="radio" name="frecuencia" value="d" />Diario <br>
                        <input class="formItem frecuencia" type="radio" name="frecuencia" value="s">Semanal(Las noticias más detacadas, todos los sábados)<br>
                    </div>
                </div>
                <div class="grupo_datos">
                    <label>¿Desea unirse a nuestro servidor de Discord?</label> <br>
                    <div>
                        <input class="formItem discord" type="radio" name="discord" value="s" />Sí <br>
                        <input class="formItem discord" type="radio" name="discord" value="n" />No <br>
                    </div>
                </div>
                <div class="grupo_datos">
                    <input id="btnListo" type="submit" value="Listo" />
                </div>
            </form>
        </div>
    </div>
    <!-------------------------------------------------FOOTER---------------------------------------->
    <?php
    include_once '../Templates/footer.php'
    ?>
    <!----------------------------------------------------------------------------------------------->
    <script type="text/javascript" src="../../assets/js/Validacion.js"></script>
</body>

</html>