<?php require_once VIEW_PATH . 'Templates/HeadBootstrap.php' ?>


<meta name="description" content="Página de contactos-comentarios ArkGames" />
<meta name="keywords" content="formulario,contacto,comentario" />

<title>CRUD Comentarios</title>

<body id="bodyTemp">
    <header>
        <?php
        require_once VIEW_PATH . 'Templates/navBarBootstrap.php'
        ?>
    </header>

    <?php
    require_once 'config/conexionPDO.php';
    if (!empty($_GET['id'])) {
        $data = ['id' => htmlentities($_GET['id'])];
        $sql = "select * from comentario where id_comentario = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute($data);
        $filas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($filas as $fila) {
        }
    }
    ?>

    <div>
        <div>
            <form id="comentario" method="post">

                <div class="frm_campos">
                    <p>Id:</p>
                    <input class="controls_2" type="number" name="txtid" readonly value="<?php echo $fila['id_comentario'] ?>">
                </div>

                <div>
                    <p>Nombre:</p>
                    <input class="controls_2" type="text" name="txtnombre" readonly id="nombre" value="<?php echo $fila['nombre'] ?>">
                </div>

                <div>
                    <p>Apellido:</p>
                    <input class="controls_2" type="text" name="txtapellido" readonly id="apellido" value="<?php echo $fila['apellido'] ?>">
                </div>

                <div>
                    <p>Teléfono</p>
                    <input class="controls_2" type="tel" id="phone" name="telefono" readonly value="<?php echo $fila['telefono'] ?>">
                </div>

                <div>
                    <p>ciudad:</p>
                    <select class="controls_2" id="ciudad" name="ciudad" disabled>
                        <option value="0">Seleccione...</option>
                        <option value="Guayaquil" <?php if ($fila['ciudad'] == "Guayaquil") {
                                                        echo " selected";
                                                    } ?>>Guayaquil</option>
                        <option value="Quito" <?php if ($fila['ciudad'] == "Quito") {
                                                    echo " selected";
                                                } ?>>Quito</option>
                        <option value="Portiviejo" <?php if ($fila['Portiviejo'] == "Portiviejo") {
                                                        echo " selected";
                                                    } ?>>Portiviejo</option>
                        <option value="Loja" <?php if ($fila['ciudad'] == "Loja") {
                                                    echo " selected";
                                                } ?>>Loja</option>
                        <option value="Otros" <?php if ($fila['ciudad'] == "Otros") {
                                                    echo " selected";
                                                } ?>>Otros</option>
                    </select>
                </div>

                <div>
                    <p>E-mail:</p>
                    <input class="controls_2" type="email" name="txtemail" readonly id="correo" value="<?php echo $fila['email'] ?>">
                </div>

                <div>
                    <p>Comentario:</p>
                    <textarea name="txtcomentario" cols="60" rows="10" disabled><?php echo htmlspecialchars($fila['comentario_descripcion']); ?></textarea>
                </div>

                <div>
                    <input class="boton" type="submit" value="Eliminar">
                </div>
            </form>
        </div>
    </div>

    <?php
    if (isset($_POST['txtid'])) {
        $data = ['id' => htmlentities($_POST['txtid'])];
        $sql = "delete from comentario where id_comentario = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute($data);

        if ($stmt->rowCount() > 0) { // rowCount() permite conocer el numero de filas afectadas
            echo '<script>window.location="presentar_comentario.php"</script>';
        } else {
            echo 'NO se pudo eliminar el registro';
        }
    }
    ?>


    <!-------------------------------------------------FOOTER---------------------------------------->
    <?php
    require_once VIEW_PATH . 'Templates/footerBootstrap.php';
    ?>

</body>

</html>