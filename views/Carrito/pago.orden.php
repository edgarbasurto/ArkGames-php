<?php
// include database configuration file
// include 'Configuracion.php';

// initializ shopping cart class
// include 'La-carta.php';
// $cart = new Cart;

// redirect to home if cart is empty
// if ($cart->total_items() <= 0) {
//    header("Location: index.php");
// } 

// // set customer ID in session
// $_SESSION['sessCustomerID'] = 1;

// // get customer details by session customer ID
// $query = $db->query("SELECT * FROM clientes WHERE id = " . $_SESSION['sessCustomerID']);
// $custRow = $query->fetch_assoc();
?>
<?php require_once VIEW_PATH . 'Templates/HeadBootstrap.php' ?>


<title>Ark Games</title>



<style>
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
</style>
</head>

<body id="bodyTemp">

    <!--     NavBar Menu     -->
    <?php require_once VIEW_PATH . 'Templates/navBarBootstrap.php' ?>


    <main class="container my-5">
        <div class="container-fluid">
            <div class="card shadow">
                <div class="card-header">

                    <ul class="nav nav-pills">
                        <li role="presentation"><a href="index.php">Inicio</a></li>
                        <li role="presentation"><a href="VerCarta.php">Ver Carta</a></li>
                        <li role="presentation" class="active"><a href="Pagos.php">Pagos</a></li>
                    </ul>
                </div>

                <div class="card-body">
                    <h1>Vista previa de la Orden</h1>
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
                    <div class="shipAddr">
                        <h4>Detalles del Cliente</h4>
                        
                        <p><strong>Nombre: </strong><?php echo $custRow[0]->NombreCompleto ?></p>
                        <p><strong>Email: </strong><?php echo $custRow[0]->Email ?></p>
                        <p><strong>NickName: </strong><?php echo $custRow[0]->NickName ?></p>
                    </div>
                    <div class="footBtn">
                        <a href="?c=productos&a=index_cuadricula" class="btn btn-warning"><i class="glyphicon glyphicon-menu-left"></i> Continue Comprando</a>
                        <a href="index.php?c=ordenes&a=placeOrder" class="btn btn-success orderBtn">Realizar pedido <i class="glyphicon glyphicon-menu-right"></i></a>
                    </div>
                </div>
            </div>
            <!--Panek cierra-->
        </div>
    </main>

</body>

</html>