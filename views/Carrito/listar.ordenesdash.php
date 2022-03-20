<?php
require_once DTO_PATH . 'Enumeradores.php';
require_once VIEW_PATH . 'Templates/HeadDashboardBootstrap.php'
?>
<meta name="description" content="ArkGames" />
<meta name="keywords" content="videojuegos,catalogo,juegos" />
<meta name="author" content="erlarrea" />
</head>

<?php require_once VIEW_PATH . 'Templates/MenuDashboardBootstrap.php' ?>




<main>

    <div class="container-fluid px-4  my-2">
        <div class="card mb-4 ">

            <div class="card-header font-weight-bold text-primary align-middle">
                <div class="row">
                    <div class="col text-first align-middle">
                        <h3 class="fw-bold" style="margin-top:.5rem"><?php echo $titleOrdenes; ?></h3>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover align-middle" id="dtTabla" width="100%" cellspacing="0">

                        <thead class="table-light">
                            <th class="text-center" scope="col">Id</th>
                            <?php if ($modulo == 'store') //&&  TIENE_PERMISO(PERMISOS::PUEDE_VISUALIZAR_VENTAS)) 
                            {
                                echo '<th class="text-center" scope="col">Registrado a</th>';
                            } ?>
                            <th class="text-center" scope="col">Valor</th>
                            <th class="text-center" scope="col">Fecha</th>
                            <th class="text-center" scope="col">Estado</th>
                            <th style="width: 10%; " class="text-center" scope="col">--</th>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($lista as $registro) {
                            ?>
                                <tr>
                                    <th class="align-middle text-center fw-light" scope="row"> Transac# <?php echo $registro->Id ?></th>
                                    <?php if ($modulo == 'store' &&  TIENE_PERMISO(PERMISOS::PUEDE_VISUALIZAR_VENTAS) == true) {
                                        echo '<td class="align-middle text-center fw-light">' . $registro->NombreUsuario . '</td>';
                                    } ?>

                                    <td class="align-middle text-center fw-light">$<?php echo $registro->total_price ?></td>
                                    <td class="align-middle text-center fw-light"><?php
                                                                                    $date  = date_create($registro->created);
                                                                                    echo date_format($date, "d/m/Y");
                                                                                    ?>
                                    </td>
                                    <td class="align-middle text-center fw-light"><?php echo $registro->status == 1 ? "Compra Finalizada" : "Activo"; ?></td>
                                    <td class="align-middle text-center fw-light " style="width: 10%; ">
                                        <a href="index.php?c=ordenes&a=show&id=<?php echo $registro->Id ?>" class="btn btn-primary"><i class="fa-solid fa-download"></i></a>
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
    function notificarMensaje() {
        let autoMensaje = document.getElementById('autoMensaje')
        let toast = new bootstrap.Toast(autoMensaje)
        toast.show()
    }
    window.addEventListener('DOMContentLoaded', event => {
        const dtTabla = document.getElementById('dtTabla');
        if (dtTabla) {
            new simpleDatatables.DataTable(dtTabla);
        }
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
<?php require_once VIEW_PATH . 'Templates/EndDashboardBootstrap.php' ?>