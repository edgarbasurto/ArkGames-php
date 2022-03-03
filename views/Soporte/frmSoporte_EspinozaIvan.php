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


</head>

<body>
    <!-------------------------------------------------MENU---------------------------------------->
    <?php
    include_once '../Templates/navBar.php'
    ?>
    <!------------------------------------------------------------------------------------------>
    <div>
        <div id="frm_soporte">
            <form id="Soporte" method="post">
                <fieldset>
                    <legend style="color:darkslategray; font-weight: bold;">¡Estamos aquí para ayudarte!</legend>
                    <p class="frm_campos" style="text-align: center; font-size: 22px">Obtén ayuda de Soporte Técnico de ArkGames</p>

                    <div class="frm_campos">

                        <div>
                            <p>Usuario:</p>
                            <input class="controls_2" type="text" name="txtusuario" id="usuario">
                        </div>

                        <div>
                            <p>E-mail:</p>
                            <input class="controls_2" type="email" name="txtemail" id="correo">
                        </div>

                        <div>
                            <p>Número de teléfono</p>
                            <input class="controls_2" type="tel" id="phone" name="telefono" placeholder="099-999-9999">
                        </div>

                        <div>
                            <p>Servicios:</p>
                            <select class="controls_2" id="servicios" name="servicio">
                                <option value="0">Seleccione...</option>
                                <option value="Cuentas">Cuentas</option>
                                <option value="Pagos">Pagos</option>
                                <option value="Creadores">Creadores</option>
                                <option value="Compatibilidad">Compatibilidad</option>
                                <option value="Otros">Otros</option>
                            </select>
                        </div>

                        <div>
                            <p>Producto:</p>
                            <select class="controls_2" id="juegos" name="producto">
                                <option value="0">Seleccione...</option>
                                <option value="Apex Legends">Apex Legends</option>
                                <option value="Genshin Impact">Genshin Impact</option>
                                <option value="Fall Guys">Fall Guys</option>
                                <option value="Fortnite">Fortnite</option>
                                <option value="Otros">Otros</option>
                            </select>
                        </div>

                        <div>
                            <p>Describa su problema:</p>
                            <textarea name="txtdescripcion" placeholder="Escriba aqui su solicitud de soporte" cols="60" rows="10"></textarea>
                        </div>

                        <div>
                            <input class="boton" type="submit" value="ENVIAR">
                        </div>

                    </div>

                </fieldset>
            </form>

        </div>

    </div>
        <?php
        require_once '../../config/conexionPDO.php';
        //var_dump($_POST);
        if (!empty($_POST['txtusuario']) && !empty($_POST['txtemail']) && 
            !empty($_POST['telefono']) && !empty($_POST['servicio'])
            && !empty($_POST['producto']) && !empty($_POST['txtdescripcion'])) {
  
            $usuario = htmlentities($_POST['txtusuario']);
            $email = htmlentities($_POST['txtemail']);
            $telefono = htmlentities($_POST['telefono']);
            $servicio = htmlentities($_POST['servicio']);
            $producto = htmlentities($_POST['producto']);
            $descripcion = htmlentities($_POST['txtdescripcion']);

            $data = [
                'user' => $usuario,
                'email' => $email,
                'tel' => $telefono,
                'serv' => $servicio,
                'producto' =>$producto,
                'desc' =>$descripcion   
            ];
            $sql = "insert into soporte(usuario, email, telefono, servicio, producto, descripcion_problema) values(:user, :email, :tel, :serv, :producto, :desc)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute($data);
            if ($stmt->rowCount() > 0) {// rowCount() permite conocer el numero de filas afectadas
                echo '<script>window.location="presentar_solicitud.php"</script>';
            }
        }    
    ?>
    <!-------------------------------------------------FOOTER---------------------------------------->
    <?php
    include_once '../Templates/footer.php'
    ?>
    <!----------------------------------------------------------------------------------------------->
</body>

</html>