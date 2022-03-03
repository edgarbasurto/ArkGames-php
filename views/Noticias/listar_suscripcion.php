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
        <div class="row mt-5 mx-5">
            <div class="col-md-11">
                <h2>Consultar Suscripciones a Newsletter</h2>
            </div>
            <div class="col-md-1"><a class="btn btn-success justify-center" href="frm_BernalHelen.php">Agregar<i class="fa-solid fa-circle-plus fa-lg p-2"></i></a></div>
        </div>
        <div class="table-responsive mx-5 mt-2 mb-5">
            <table class="table table-light table-striped table-bordered">
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
                                <a class="btn btn-primary m-2" href="editar_noticias.php?id=<?php echo $fila['id_suscripcion'] ?>"><i class="fa-solid fa-pen-to-square fa-xl"></i></a>
                                <a class="btn btn-danger m-2" href="eliminar_noticias.php?id=<?php echo $fila['id_suscripcion'] ?>"><i class="fa-solid fa-trash-can fa-xl"></i></a>
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