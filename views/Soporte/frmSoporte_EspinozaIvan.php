<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="description" content="Soporte" />
    <meta name="keywords" content="videojuegos,catalogo,juegos" />
    <link rel="stylesheet" href="../../assets/css/master.css" />
    <link rel="shortcut icon" href="../../assets/img/logo.svg">
    <link rel="stylesheet" href="../../assets/css/EspinozaIvan.css" />
    <title>Soporte - ArkGames</title>
    <style>
        #frm_soporte {
            display: flex;
            flex-direction: column;
            width: 400px;
            background: darkgray;
            padding: 15px;
            margin: auto;
            margin-top: 100px;
            margin-bottom: 20px;
            border-radius: 4px;
            color: white;
            font-size: large;
            box-shadow: 7px 13px 37px #000;
        }

        .frm_campos {
            padding: 10px;
        }

        .controls {
            width: 1px;
            margin-left: 4px;
            padding-right: 5px;
        }

        .controls_2 {
            width: 60%;
            padding: 4px;
            border-radius: 3px;
            margin-bottom: 13px;
            margin-left: 2px;

        }

        .boton {
            width: 100%;
            background: black;
            padding: 12px;
            color: white;
            font-size: 16px;
        }

        .mensajeError {
            color: red;
            font-size: 14px;
        }
    </style>

    <script>
        function inicioSesion() {
            location.href = 'frm_LarreaRafael.php';
        }
    </script>

</head>

<body>
    <!-------------------------------------------------MENU---------------------------------------->
    <?php
    include_once '../Templates/navBar.php'
    ?>
    <!------------------------------------------------------------------------------------------>
    <div>
        <div id="frm_soporte">
            <form id="Soporte">
                <fieldset>
                    <legend style="color:darkslategray; font-weight: bold;">¡Estamos aquí para ayudarte!</legend>
                    <div>
                        <input class="boton" type="button" value="Inicie sesión en su cuenta de ArkGames" onclick="inicioSesion()">
                    </div>
                    <p class="frm_campos" style="text-align: center; font-size: 22px">Obtén ayuda de Soporte Técnico de ArkGames</p>

                    <div class="frm_campos">

                        <div>
                            <p>Usuario:</p>
                            <input class="controls_2" type="text" id="usuario">
                        </div>

                        <div>
                            <p>E-mail:</p>
                            <input class="controls_2" type="email" id="correo">
                        </div>

                        <div>
                            <p>Número de teléfono</p>
                            <input class="controls_2" type="tel" id="phone" placeholder="099-999-9999">
                        </div>

                        <div>
                            <p>Servicios:</p>
                            <select class="controls_2" id="servicios">
                                <option value="0">Seleccione...</option>
                                <option value="1">Cuentas</option>
                                <option value="2">Pagos</option>
                                <option value="3">Creadores</option>
                                <option value="4">Compatibilidad</option>
                                <option value="5">Otros</option>
                            </select>
                        </div>

                        <div>
                            <p>Producto:</p>
                            <select class="controls_2" id="juegos">
                                <option value="0">Seleccione...</option>
                                <option value="1">Apex Legends</option>
                                <option value="2">Genshin Impact</option>
                                <option value="3">Fall Guys</option>
                                <option value="4">Fortnite</option>
                                <option value="5">Otros</option>
                            </select>
                        </div>

                        <div>
                            <p>Describa su problema:</p>
                            <textarea name="mensaje" placeholder="Escriba aqui su solicitud de soporte" cols="60" rows="10"></textarea>
                        </div>

                        <div>
                            <input class="boton" type="submit" value="ENVIAR">
                        </div>

                    </div>

                </fieldset>
            </form>

        </div>

    </div>
    <!-------------------------------------------------FOOTER---------------------------------------->
    <?php
    include_once '../Templates/footer.php'
    ?>
    <!----------------------------------------------------------------------------------------------->
    <script type="text/javascript" src="../../assets/js/Validaciones_frmSoporte.js"> </script>
</body>

</html>