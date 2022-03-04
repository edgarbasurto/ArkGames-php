<?php require_once '../../views/Templates/HeadBootstrap.php' ?>

<link rel="stylesheet" href="../../assets/css/GualeEvelyn.css" />

<title>CRUD Comentarios</title>

<body id="bodyTemp">
    <header>
        <?php
        require_once '../Templates/navBarBootstrap.php'
        ?>
    </header>

    <?php
        include_once '../../config/conexionPDO.php';
        $sql = "select * from comentario ";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
    ?>

    <main class="main p-5 mx-3">

        <div class="container-fluid card shadow">
            <div class="card-header row">
                <div class="col-md-7">
                    <h1 class="title"> Comentarios</h1>
                </div>
                <div class="col-md-5 text-end"><a class="btn btn-success justify-center" href="frm_comentariosGualeEvelyn.php">Agregar <i class="fa-solid fa-circle-plus fa-lg"></i></a></div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-light table-striped table-bordered">

                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>NOMBRE</th>
                                    <th>APELLIDO</th>
                                    <th>GENERO</th>
                                    <th>TELEFONO</th>
                                    <th>CIUDAD</th>
                                    <th>CORREO</th>
                                    <th>COMENTARIO</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $filas = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($filas as $fila) {
                                        $id = $fila['id_comentario'];
                                        ?>
                                    <tr>
                                        <td><?php echo  $id?></td>
                                        <td><?php echo $fila['nombre'] ?></td>
                                        <td><?php echo $fila['apellido'] ?></td>
                                        <td><?php echo $fila['genero'] ?></td>
                                        <td><?php echo $fila['telefono'] ?></td>
                                        <td><?php echo $fila['ciudad'] ?></td>
                                        <td><?php echo $fila['email'] ?></td>
                                        <td><?php echo $fila['comentario'] ?></td>
                                        <td>
                                            <div class="row">
                                                <div class="col">
                                                    <a class="btn btn-primary" href="editar_comentario.php?id=<?php echo $fila['id_comentario'] ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                                                </div>
                                                <div class="col">
                                                    <a class="btn btn-danger" href="eliminar_comentario.php?id=<?php echo $fila['id_comentario'] ?>"><i class="fa-solid fa-trash-can"></i></a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                         </table>

                    </div>
                </div>

            </div>
           
        </div>

        
    </main>
    
     <!-------------------------------------------------FOOTER---------------------------------------->
    <?php
        require_once '../Templates/footerBootstrap.php'
    ?>
</body>

</html>