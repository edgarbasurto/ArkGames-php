<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../assets/css/master2.css" />
        <link rel="shortcut icon" href="../../assets/img/logo.svg">
        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <title>CRUD</title>
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
    <?php
    include_once '../Templates/menu.php';

    require_once '../../config/conexionPDO.php';

    if (isset($_GET['id'])) {
        $data = ['id' => htmlentities($_GET['id'])];
        $sql = "select * from suscripcion where id_suscripcion = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute($data);

        $filas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($filas as $fila) 
        {
            ?>
            <div class="contenedor-formulario">
                <div>
                <h3 style="padding-left: 10px;">Editar Suscripción</h3>
                    <form id="form_suscripcion" method="post">
                        <div class="grupo_datos">
                            <label for="id">ID:</label>
                            <input id="id" class="formItem" type="number" name="txtid" readonly style="width: 50px;" value="<?php echo $fila['id_suscripcion'] ?>"/> <br>
                        </div>
                        <div class="grupo_datos">
                            <label for="email">Correo electrónico:</label>
                            <input id="email" class="formItem" type="email" name="txtemail" value="<?php echo $fila['email'] ?>"/> <br>
                        </div>
                        <div class="grupo_datos">
                            <label>Tipo de correo que deseo leer:</label> <br>
                            <?php
                                $temas = ["Novedades", "Eventos", "Descuentos", "Torneos","Análisis","Trucos"];
                                //$temas_devueltos = explode(", ", $fila['temas']);
                                foreach ($temas as $tema) 
                                {
                                    $checked = (str_contains($fila['temas'], $tema)) ? "checked":"";
                                    echo '<input class="formItem tema" type="checkbox" name="chkbtema[]" value= '.$tema.' 
                                    '.$checked.'/> '.$tema.'<br>'; 
                                    ?>
                                    <?php
                                    
                                }
                            ?>
                        </div>
                        <div class="grupo_datos">
                            <label>Sección:</label> <br>
                            <?php
                                $dispositivos = ["PC", "PS2 - PS3 - PS4 - PS5", "XBox", "Wii","Android"];
                                //$temas_devueltos = explode(", ", $fila['temas']);
                                foreach ($dispositivos as $dispositivo) 
                                {
                                    $checked = (str_contains($fila['dispositivos'], $dispositivo)) ? "checked":"";
                                    echo '<input class="formItem tema" type="checkbox" name="chkbtema[]" value= '.$dispositivo.' 
                                    '.$checked.'/> '.$dispositivo.'<br>'; 
                                    ?>
                                    <?php
                                    
                                }
                            ?>
                        </div>
                        <div class="grupo_datos">
                            <label>¿Cada cuánto desea recibir nuestros correos?</label> <br>
                            <div>
                                <input class="formItem frecuencia" type="radio" name="rdbfrecuencia" value="diario" <?php echo ($fila['frecuencia']== 'diario') ?  "checked" : "" ;  ?>/>Diario <br>
                                <input class="formItem frecuencia" type="radio" name="rdbfrecuencia" value="semanal" <?php echo ($fila['frecuencia']== 'semanal') ?  "checked" : "" ;  ?>>Semanal(Las noticias más detacadas, todos los sábados)<br>
                            </div>
                        </div>
                        <div class="grupo_datos">
                            <label>¿Desea unirse a nuestro servidor de Discord?</label> <br>
                            <div>
                                <input class="formItem discord" type="radio" name="rdbdiscord" value="Sí" <?php echo ($fila['discord']== 'Sí') ?  "checked" : "" ;  ?>/>Sí <br>
                                <input class="formItem discord" type="radio" name="rdbdiscord" value="No" <?php echo ($fila['discord']== 'No') ?  "checked" : "" ;  ?>/>No <br>
                            </div>
                        </div>
                        <div class="grupo_datos">
                            <input id="btnListo" type="submit" value="Actualizar" />
                        </div>
                    </form>
                </div>
            </div>
        <?php
        }
    }
    ?>
    <?php
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
        $sql = "update suscripcion set email =:email, temas = :temas, dispositivos = :disps, frecuencia=:frec, discord=:discord"
                . " where id_suscripcion=:id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute($data);

        if ($stmt->rowCount() > 0) {// rowCount() permite conocer el numero de filas afectadas
            header("location:listar_noticias.php");
        } else {
            echo 'NO se pudo eliminar el registro';
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
