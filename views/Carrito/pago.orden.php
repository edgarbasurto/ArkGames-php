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

                    <h1>Vista previa de la Orden</h1>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-8">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Producto</th>
                                        <th>Pricio</th>
                                        <th>Cantidad</th>
                                        <th>Sub total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($cart->total_items() > 0) {
                                        //get cart items from session
                                        $cartItems = $cart->contents();
                                        foreach ($cartItems as $item) {
                                    ?>
                                            <tr>
                                                <td><?php echo $item["name"]; ?></td>
                                                <td><?php echo '$' . $item["price"] . ' USD'; ?></td>
                                                <td><?php echo $item["qty"]; ?></td>
                                                <td><?php echo '$' . $item["subtotal"] . ' USD'; ?></td>
                                            </tr>
                                        <?php }
                                    } else { ?>
                                        <tr>
                                            <td colspan="4">
                                                <p>No hay articulos en tu carta......</p>
                                            </td>
                                        <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="3"></td>
                                        <?php if ($cart->total_items() > 0) { ?>
                                            <td class="text-center"><strong>Total <?php echo '$' . $cart->total() . ' USD'; ?></strong></td>
                                        <?php } ?>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                        <div class="col-4">
                            <h4>Detalles del Cliente</h4>

                            <p><strong>Nombre: </strong><?php echo $custRow[0]->NombreCompleto ?></p>
                            <p><strong>Email: </strong><?php echo $custRow[0]->Email ?></p>
                            <p><strong>NickName: </strong><?php echo $custRow[0]->NickName ?></p>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-6">
                            <a href="?c=productos&a=index_cuadricula" class="btn btn-warning text-start"><i class="fa-solid fa-backward"></i> Continue Comprando</a>
                        </div>
                        <div class="col-6 text-end">
                            <a href="index.php?c=ordenes&a=placeOrder" class="btn btn-success text-end">Finalizar compra <i class="fa-solid fa-circle-check"></i></a>
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