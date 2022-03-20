<?php require_once VIEW_PATH . 'Templates/HeadBootstrap.php' ?>

<title>Ark Games</title>

<!-- <style>
    .container {
        padding: 20px;
    }

    .table {
        width: 65%;
        float: left;
    }

    .shipAddr {
        width: 30%;
        float: left;
        margin-left: 30px;
    }

    .footBtn {
        width: 95%;
        float: left;
    }

    .orderBtn {
        float: right;
    }
</style> -->
</head>

<body id="bodyTemp">

    <!--     NavBar Menu     -->
    <?php require_once VIEW_PATH . 'Templates/navBarBootstrap.php' ?>


    <main class="container my-5">
        <div class="container-fluid">
            <div class="card shadow">
                <div class="card-header">

                    <h1><?php echo $titleOrdenes; ?></h1>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-8">
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
            <!--Panek cierra-->
            <!-------------------------------------------------FOOTER---------------------------------------->
        </div>
    </main>

    <?php
    require_once VIEW_PATH . 'Templates/footerBootstrap.php'
    ?>

    <!-- <script type="text/javascript" src="assets/js/funcionesAjax.js"></script> -->
    <!----------------------------------------------------------------------------------------------->

</body>

</html>