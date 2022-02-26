<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../assets/css/master2.css" />
        <title>Document</title>
    </head>
    <body>

        <?php
        include_once '../templates/header.php';

       require_once '../conexion.php';

        if (!empty($_GET['id'])) {
            $data = ['id' => htmlentities($_GET['id'])];
            $sql = "select * from usuarios where id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute($data);

            $filas = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($filas as $fila) {
                ?>
                <div>
                    <form method="post">
                        <!-- <input type="hidden" name="txtid" value=""> -->
                        <label>Id:</label><input type="text" name="txtid" readonly="" value="<?php echo $fila['id'] ?>">
                        <label>Usuario:</label><input type="text" name="txtusuario" value="<?php echo $fila['username'] ?>">
                       <!--<label>Passwd:</label><input type="text" name="txtpasswd" value="">
                       <label>Usuario:</label><input type="text" name="txtnombre" value=""> -->
                        <input type="submit" value="Eliminar">
                    </form>

                </div>
            <?php
            }
        }
        ?>
        <?php
        if (isset($_POST['txtid'])) {
            $data = ['id' => htmlentities($_POST['txtid'])];
            $sql = "delete from usuarios where id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute($data);

            if ($stmt->rowCount() > 0) {// rowCount() permite conocer el numero de filas afectadas
                header("location:presentar.php");
            } else {
                echo 'NO se pudo eliminar el registro';
            }
        }
        ?>


    </body>
</html>