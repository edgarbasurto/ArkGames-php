<?php require_once '../../views/Templates/HeadBootstrap.php' ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/BernalHelen.css" />
    <link rel="shortcut icon" href="../../assets/img/logo.svg">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>CRUD</title>
</head>
<body>
    <header>
        <?php
            require_once '../Templates/navBarBootstrap.php'
        ?>
    </header>
        <?php
        include_once '../../config/conexionPDO.php';
        $sql = "select * from suscripcion ";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        ?>
        <div class="row m-5">
            <div class="col-md-11">
                <h2>Consultar Suscripciones a Newsletter</h2>
            </div>
            <div class='btnAgregar col-md-1'><a class="justify-content-center" href="frm_BernalHelen.php">Agregar</a></div>
        </div>
        <div class="table-responsive m-5">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Email</th>
                        <th>Temas</th>
                        <th>Dispositivos</th>
                        <th>Frecuencia</th>
                        <th>Discord</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $filas = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($filas as $fila) {
                        $id = $fila['id_suscripcion'];
                        ?>
                        <tr>
                            <td><?php echo $id?></td>
                            <td><?php echo $fila['email'] ?></td>
                            <td><?php echo $fila['temas']?></td>
                            <td><?php echo $fila['dispositivos']?></td>
                            <td><?php echo $fila['frecuencia'] ?></td>
                            <td><?php echo $fila['discord'] ?></td>
                            <td>
                                <a href="editar_noticias.php?id=<?php echo $fila['id_suscripcion'] ?>">Editar</a>
                                <a href="eliminar_noticias.php?id=<?php echo $fila['id_suscripcion'] ?>">Eliminar</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <?php
            require_once '../Templates/footerBootstrap.php'
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>