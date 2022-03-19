<?php
// initializ shopping cart class
require_once DAO_PATH . 'CarritoDAO.php';
$cart = new CarritoDAO;

?>
<?php require_once VIEW_PATH . 'Templates/HeadBootstrap.php' ?>

<meta charset="utf-8">
<!-- <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
<!-- <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->

<title>Ark Games</title>




<style>
    .container {
        padding: 20px;
    }

    input[type="number"] {
        width: 20%;
    }
</style>
<script>
    function updateCartItem(obj, id) {
        $.get("cartAction.php", {
            action: "updateCartItem",
            id: id,
            qty: obj.value
        }, function(data) {
            if (data == 'ok') {
                location.reload();
            } else {
                alert('Cart update failed, please try again.');
            }
        });
    }
</script>
</head>


<body id="bodyTemp">
 
        <!--     NavBar Menu     -->
        <?php require_once VIEW_PATH . 'Templates/navBarBootstrap.php' ?>
  

    <main class="container my-5">
    <div class="container-fluid">
        <div class="card shadow">
            <div class="card-header">

                <ul class="nav nav-pills">
                    <li role="presentation"><a href="index.php?c=productos&a=index_cuadricula">Catalogo</a></li>
                    <li role="presentation" class="active"><a href="index.php?c=carrito">Ver Carrito</a></li>
                    <li role="presentation"><a href="Pagos.php">Pagos</a></li>
                </ul>
            </div>

            <div class="card-body">


                <h1>Carrito de compras</h1>
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
                                    <td><?php echo $item["name"]; ?></td>
                                    <td><?php echo '$' . $item["price"] . ' USD'; ?></td>
                                    <td><input type="number" class="form-control text-center" value="<?php echo $item["qty"]; ?>" onchange="updateCartItem(this, '<?php echo $item["rowid"]; ?>')"></td>
                                    <td><?php echo '$' . $item["subtotal"] . ' USD'; ?></td>
                                    <td>
                                        <a href="AccionCarta.php?action=removeCartItem&id=<?php echo $item["rowid"]; ?>" class="btn btn-danger" onclick="return confirm('Confirma eliminar?')"><i class="glyphicon glyphicon-trash"></i></a>
                                    </td>
                                </tr>
                            <?php }
                        } else { ?>
                            <tr>
                                <td colspan="5">
                                    <p>Tu carta esta vacia.....</p>
                                </td>
                            <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td><a href="index.php?c=productos&a=index_cuadricula" class="btn btn-warning"><i class="glyphicon glyphicon-menu-left"></i> Continue Comprando</a></td>
                            <td colspan="2"></td>
                            <?php if ($cart->total_items() > 0) { ?>
                                <td class="text-center"><strong>Total <?php echo '$' . $cart->total() . ' USD'; ?></strong></td>
                                <td><a href="Pagos.php" class="btn btn-success btn-block">Pagos <i class="glyphicon glyphicon-menu-right"></i></a></td>
                            <?php } ?>
                        </tr>
                    </tfoot>
                </table>

            </div>
            <div class="card-footer">BaulPHP</div>
        </div>
        <!--Panek cierra-->

        <!-------------------------------------------------FOOTER---------------------------------------->
    </div>
    </main>

    <?php
    require_once VIEW_PATH . 'Templates/footerBootstrap.php'
    ?>


    <!----------------------------------------------------------------------------------------------->

</body>

</html>