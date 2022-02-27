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
        include_once '../templates/menu.php';

       require_once '../assets/config/conexionPDO.php';

        if (!empty($_GET['id'])) {
            $data = ['id' => htmlentities($_GET['id'])];
            $sql = "select * from suscripcion where id_suscripcion = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute($data);

            $filas = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($filas as $fila) {
                ?>
                <div>
                    <form id="form_suscripcion" method="post">
                        <div class="grupo_datos">
                            <label for="id">ID:</label>
                            <input id="id" class="formItem" type="number" name="txtid" readonly style="width: 50px;"/> <br>
                        </div>
                        <div class="grupo_datos">
                            <label for="email">Correo electrónico:</label>
                            <input id="email" class="formItem" type="email" name="txtemail" value="<?php echo $fila['email'] ?>"/> <br>
                        </div>
                        <div class="grupo_datos">
                            <label>Tipo de correo que deseo leer:</label><br>
                            <div>
                                <input class="formItem tema" type="checkbox" name="chkbtema[]" value="<?php echo $fila['temas'] ?>" 
                        checked="<?php echo ($fila['temas']==1)?'checked':'' ?>"/> Novedades <br>
                                <input class="formItem tema" type="checkbox" name="chkbtema[]" value="<?php echo $fila['temas'] ?>" 
                        checked="<?php echo ($fila['temas']==1)?'checked':'' ?>"/> Eventos <br>
                                <input class="formItem tema" type="checkbox" name="chkbtema[]" value="<?php echo $fila['temas'] ?>" 
                        checked="<?php echo ($fila['temas']==1)?'checked':'' ?>"/> Descuentos <br>
                                <input class="formItem tema" type="checkbox" name="chkbtema[]" value="<?php echo $fila['temas'] ?>" 
                        checked="<?php echo ($fila['temas']==1)?'checked':'' ?>"/> Torneos <br>
                                <input class="formItem tema" type="checkbox" name="chkbtema[]" value="<?php echo $fila['temas'] ?>" 
                        checked="<?php echo ($fila['temas']==1)?'checked':'' ?>"/> Análisis <br>
                                <input class="formItem tema" type="checkbox" name="chkbtema[]" value="<?php echo $fila['temas'] ?>" 
                        checked="<?php echo ($fila['temas']==1)?'checked':'' ?>"/> Trucos <br>
                            </div>
                        </div>
                        <div class="grupo_datos">
                            <label>Sección:</label> <br>
                            <div>
                                <input class="formItem dispositivo" type="checkbox" name="chkbdispositivo[]" value="<?php echo $fila['dispositivos'] ?>" 
                        checked="<?php echo ($fila['dispositivos']==1)?'checked':'' ?>"/> PC <br>
                                <input class="formItem dispositivo" type="checkbox" name="chkbdispositivo[]" value="<?php echo $fila['dispositivos'] ?>" 
                        checked="<?php echo ($fila['dispositivos']==1)?'checked':'' ?>"/> PS2 - PS3 - PS4 - PS5 <br>
                                <input class="formItem dispositivo" type="checkbox" name="chkbdispositivo[]" value="<?php echo $fila['dispositivos'] ?>" 
                        checked="<?php echo ($fila['dispositivos']==1)?'checked':'' ?>"/> XBox <br>
                                <input class="formItem dispositivo" type="checkbox" name="chkbdispositivo[]" value="<?php echo $fila['dispositivos'] ?>" 
                        checked="<?php echo ($fila['dispositivos']==1)?'checked':'' ?>"/> Wii <br>
                                <input class="formItem dispositivo" type="checkbox" name="chkbdispositivo[]" value="<?php echo $fila['dispositivos'] ?>" 
                        checked="<?php echo ($fila['dispositivos']==1)?'checked':'' ?>"/> Android <br>
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
                            <input id="btnListo" type="submit" value="Eliminar" />
                        </div>
                    </form>
                </div>
            <?php
            }
        }
        ?>
        <?php
        if (isset($_POST['txtid'])) {
            $data = ['id' => htmlentities($_POST['txtid'])];
            $sql = "delete from suscrpcion where id_suscripcion = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute($data);

            if ($stmt->rowCount() > 0) {// rowCount() permite conocer el numero de filas afectadas
                header("location:listar_noticias.php");
            } else {
                echo 'NO se pudo eliminar el registro';
            }
        }
        ?>


    </body>
</html>