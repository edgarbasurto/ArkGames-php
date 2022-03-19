<?php require_once VIEW_PATH . 'Templates/HeadBootstrap.php' ?>


<title>Ark Games</title>




<style>
   
    input[type="number"] {
        width: 20%;
    }
</style>

</head>


<body id="bodyTemp">

    <!--     NavBar Menu     -->
    <?php require_once VIEW_PATH . 'Templates/navBarBootstrap.php' ?>


    <main class="container my-5">
        <div class="container-fluid">
            <div class="card shadow">
                <div class="card-header">
                <h1>Carrito de compras</h1>
                    <!-- <ul class="nav">
                        <li role="presentation" class="nav-item">
                            <a class="nav-link text-black" href="index.php?c=productos&a=index_cuadricula">Catalogo</a>
                        </li>
                        <li role="presentation" class="active nav-item">
                            <a class="nav-link active" href="index.php?c=carrito">Ver Carrito</a>
                        </li>
                        <li role="presentation" class="nav-item">
                            <a class="nav-link" href="Pagos.php">Pagos</a>
                        </li>
                    </ul> -->
                </div>

                <div class="card-body">


                    
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Precio</th>
                                <th>Cantidad</th>
                                <th>Sub total</th>
                                <th>&nbsp;</th>
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
                                        <td><?php echo $item['name']; ?></td>
                                        <td><?php echo '$' . $item['price'] . ' USD'; ?></td>
                                        <td><input type="number" min="1" step="1" class="form-control text-center" value="<?php echo $item["qty"]; ?>" onchange="updateCartItem(this, '<?php echo $item['rowid']; ?>')"> </td>
                                        <td id="subtotal_carrito"><?php echo '$' . $item['subtotal'] . ' USD'; ?></td>
                                        <td>
                                            <a href="?c=carrito&a=removeCartItem&id=<?php echo $item["rowid"]; ?>" class="btn btn-danger" onclick="return confirm('Confirma eliminar?')"><i class="fa-solid fa-trash-can"></i></a>
                                        </td>
                                    </tr>
                                <?php }
                            } else { ?>
                                <tr>
                                    <td colspan="5">
                                        <p>Tu carta esta vacía.....</p>
                                    </td>
                                <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td><a href="index.php?c=productos&a=index_cuadricula" class="btn btn-warning"><i class="fa-solid fa-backward"></i> Continue Comprando</a></td>
                                <td colspan="2"></td>
                                <?php if ($cart->total_items() > 0) { ?>
                                    <td class="text-center" id="total_carrito"><strong>Total <?php echo '$' . $cart->total() . ' USD'; ?></strong></td>
                                    <td><a href="index.php?c=ordenes&a=pagar" class="btn btn-success btn-block">Pagar <i class="fa-solid fa-money-bill-1-wave"></i></a></td>
                                <?php } ?>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <!--Panek cierra-->
               
            <!-------------------------------------------------FOOTER---------------------------------------->
        </div>
    </main>

    <?php
    require_once VIEW_PATH . 'Templates/footerBootstrap.php'
    ?>

<script type="text/javascript" src="assets/js/funcionesAjax.js"></script>
    <!----------------------------------------------------------------------------------------------->

</body>

</html>