<?php

if (!isset($_SESSION)) {
    session_start();
};

require_once '../../models/dto/Enumeradores.php';
require_once '../../views/Templates/HeadBootstrap.php'
?>
<meta name="description" content="ArkGames" />
<meta name="keywords" content="videojuegos,catalogo,juegos" />
<title>Demostración Métodos CRUD - USUARIO</title>
</head>

<body id="bodyTemp">
    <?php require_once '../../views/Templates/navBarBootstrap.php' ?>
    <header>
    </header>
    <main class="main p-5 mx-3">

        <div class="card shadow  ">
            <div class="card-header row font-weight-bold text-primary align-middle">
                <div class="col text-first align-middle">
                    <h3 class="fw-bold" style="margin-top:.5rem">Usuarios</h3>
                </div>
                <div class="col text-end align-middle">
                    <a href="../../views/Usuarios/index.php?c=usuarios&a=new" class="btn btn-primary"><i class="fas fa-plus-square"></i> Nuevo Usuario</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover align-middle" width="100%" cellspacing="0">

                        <thead class="table-light">
                            <th class="text-center" scope="col">Id</th>
                            <th class="text-center" scope="col">Perfil</th>
                            <th class="text-center" scope="col">Usuario</th>
                            <th class="text-center" scope="col">Email</th>
                            <th class="text-center" scope="col">Nombre</th>
                            <th class="text-center" scope="col">Género</th>
                            <th style="width: 14%; " class="text-center" scope="col">--</th>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($lista as $registro) {
                            ?>
                                <tr>
                                    <th class="text-center" scope="row"><?php echo $registro->Id ?></th>
                                    <td class="text-center"><?php echo TipoRol::getName($registro->IdRol) ?></td>
                                    <td class="text-center"><?php echo $registro->NickName ?></td>
                                    <td class="text-center"><?php echo $registro->Email ?></td>
                                    <td class="text-center"><?php echo $registro->NombreCompleto ?></td>
                                    <td class="text-center"><?php echo Genero::getName($registro->Genero) ?></td>
                                    <td class="text-center">
                                        <a href="../../views/Usuarios/index.php?c=usuarios&a=show&id=<?php echo $registro->Id ?>" class="btn btn-success"><i class="fas fa-eye"></i></a>
                                        <a href="../../views/Usuarios/index.php?c=usuarios&a=edit&id=<?php echo $registro->Id ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                        <a href="../../views/Usuarios/index.php?c=usuarios&a=delete&id=<?php echo $registro->Id ?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="position-fixed bottom-0 end-0 p-3 " style="z-index: 11">
            <div id="autoMensaje" class="toast align-items-center text-white <?php
                                                                                if (isset($_SESSION['color'])) {

                                                                                    echo
                                                                                    $_SESSION['color'];
                                                                                };

                                                                                ?> border-0" role="aler" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body ">
                        <h5 class="align-middle my-0"> <i class="fa-solid <?php
                                                                            if (isset($_SESSION['color'])) {
                                                                                echo $_SESSION['color'] == 'bg-info' ? ' fa-thumbs-up ' : ' fa-triangle-exclamation ';
                                                                            }
                                                                            ?> "></i>

                            <?php if (isset($_SESSION['mensaje'])) {
                                echo  $_SESSION['mensaje'];
                            } ?></h5>
                    </div>
                </div>
            </div>
        </div>
    </main>


    <!-- Colocar aquí script js personalizados -->
    <script>
        function notificarMensaje() {
            let autoMensaje = document.getElementById('autoMensaje')
            let toast = new bootstrap.Toast(autoMensaje)
            toast.show()
        }
    </script>

    <!-- Cierre de script js personalizados -->
    <?php
    require_once '../Templates/footerBootstrap.php'
    ?>
</body>

</html>