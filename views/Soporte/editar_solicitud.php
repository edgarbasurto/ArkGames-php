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


    <!-------------------------------------------------MENU---------------------------------------->
    <?php
    include_once '../Templates/navBar.php'
    ?>
    <!------------------------------------------------------------------------------------------>
 <?php
require_once '../../config/conexionPDO.php';
 
if (isset($_GET['id'])) {

    $data = ['id' => htmlentities($_GET['id'])];
    $sql = "select * from soporte where id_solicitud = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute($data);
    $filas = $stmt->fetchAll(PDO::FETCH_ASSOC);
       
    foreach ($filas as $fila) {
    ?>
    <div>
        <div id="frm_soporte">
            <form id="Soporte" method="post">
                <fieldset>
                    <legend style="color:darkslategray; font-weight: bold;">¡Estamos aquí para ayudarte!</legend>
                    <p class="frm_campos" style="text-align: center; font-size: 22px">Obtén ayuda de Soporte Técnico de ArkGames</p>

                    <div class="frm_campos">
                        <div>
                            <p>Id:</p>
                            <input class="controls_2" type="number" name="txtid" readonly value="<?php echo $fila['id_solicitud'] ?>">
                        </div>
                                
                        <div>
                            <p>Usuario:</p>
                            <input class="controls_2" type="text" name="txtusuario" id="usuario" value="<?php echo $fila['usuario'] ?>">
                        </div>

                        <div>
                            <p>E-mail:</p>
                            <input class="controls_2" type="email" name="txtemail" id="correo" value="<?php echo $fila['email'] ?>">
                        </div>

                        <div>
                            <p>Número de teléfono</p>
                            <input class="controls_2" type="tel" id="phone" name="telefono" value="<?php echo $fila['telefono'] ?>">
                        </div>

                        <div>
                            <p>Servicios:</p>
                            <select class="controls_2" id="servicios" name="servicio">
                                <option value="0">Seleccione...</option>
                                <option value="Cuentas" <?php if($fila['servicio'] == "Cuentas"){ echo " selected"; }?>>Cuentas</option>
                                <option value="Pagos" <?php if($fila['servicio'] == "Pagos"){ echo " selected"; }?>>Pagos</option>
                                <option value="Creadores" <?php if($fila['servicio'] == "Creadores"){ echo " selected"; }?>>Creadores</option>
                                <option value="Compatibilidad" <?php if($fila['servicio'] == "Compatibilidad"){ echo " selected"; }?>>Compatibilidad</option>
                                <option value="Otros" <?php if($fila['servicio'] == "Otros"){ echo " selected"; }?>>Otros</option>
                            </select>
                        </div>

                        <div>
                            <p>Producto:</p>
                            <select class="controls_2" id="juegos" name="producto">
                                <option value="0">Seleccione...</option>
                                <option value="Apex Legends" <?php if($fila['producto'] == "Apex Legends"){ echo " selected"; }?>>Apex Legends</option>
                                <option value="Genshin Impact" <?php if($fila['producto'] == "Genshin Impact"){ echo " selected"; }?>>Genshin Impact</option>
                                <option value="Fall Guys" <?php if($fila['producto'] == "Fall Guys"){ echo " selected"; }?>>Fall Guys</option>
                                <option value="Fortnite" <?php if($fila['producto'] == "Fortnite"){ echo " selected"; }?>>Fortnite</option>
                                <option value="Otros" <?php if($fila['producto'] == "Otros"){ echo " selected"; }?>>Otros</option>
                            </select>
                        </div>

                        <div>
                            <p>Describa su problema:</p>
                            <textarea name="txtdescripcion" cols="60" rows="10" ><?php echo htmlspecialchars($fila['descripcion_problema']); ?></textarea>
                        </div>

                        <div>
                            <input class="boton" type="submit" value="Actualizar">
                        </div>

                    </div>

                </fieldset>
            </form>

        </div>

    </div>
        <?php
    }
}
?>
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
                'id' => htmlentities($_POST['txtid']),
                'user' => $usuario,
                'email' => $email,
                'tel' => $telefono,
                'serv' => $servicio,
                'producto' =>$producto,
                'desc' =>$descripcion   
            ];
            $sql = "update soporte set usuario =:user, email = :email, telefono = :tel, servicio=:serv, producto=:producto, descripcion_problema=:desc"
            . " where id_solicitud=:id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute($data);
            if ($stmt->rowCount() > 0) { // rowCount() permite conocer el numero de filas afectadas
                echo '<script>window.location="presentar_solicitud.php"</script>';
            } else {
                echo 'NO se pudo editar el registro';
            }
        }    
    ?>
    <!-------------------------------------------------FOOTER---------------------------------------->
    <?php
    include_once '../Templates/footer.php'
    ?>
    <!----------------------------------------------------------------------------------------------->
    <script type="text/javascript" src="../../assets/js/Validaciones_frmSoporte.js"> </script>


</html>

