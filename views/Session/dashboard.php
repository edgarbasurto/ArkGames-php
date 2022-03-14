<?php

if (!isset($_SESSION)) {
    session_start();
};

require_once VIEW_PATH . 'Templates/HeadDashboardBootstrap.php'
?>
<meta name="description" content="ArkGames" />
<meta name="keywords" content="videojuegos,catalogo,juegos" />
<meta name="author" content="" />
</head>

<?php require_once VIEW_PATH . 'Templates/MenuDashboardBootstrap.php' ?>
<main>

    <div class="container-fluid px-4  my-2">
        <div class="card mb-4 ">

            <div class="card-header font-weight-bold text-primary align-middle">
                <div class="row">
                    <div class="col text-first align-middle">
                        <h3 class="fw-bold" style="margin-top:.5rem">Usuarios</h3>
                    </div>
                    <div class="col text-end align-middle">
                        <a href="index.php?c=usuarios&a=new" class="btn btn-primary"><i class="fas fa-plus-square"></i> Nuevo Usuario</a>
                    </div>
                </div>
            </div>

            <div class="card-body">

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
<?php require_once VIEW_PATH . 'Templates/FootDashboardBootstrap.php' ?>
<script>

</script>
<?php require_once VIEW_PATH . 'Templates/EndDashboardBootstrap.php' ?>