<!DOCTYPE html>
<html lang="es">

<head>
    <title>Carrito de compras</title>
    <meta charset="utf-8">
    <?php require_once VIEW_PATH . 'Templates/HeadBootstrap.php' ?>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <?php
    require_once VIEW_PATH . '../config/conexionPDO.php';
    ?>
    
    <?php
    require_once VIEW_PATH . 'Templates/navBarBootstrap.php'
    ?>
    
    
    <style>
        .container {
            padding: 20px;
        }

        .cart-link {
            width: 100%;
            text-align: right;
            display: block;
            font-size: 22px;
        }
    </style>
</head>
</head>

<body>
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">

                <ul class="nav nav-pills">
                    <li role="presentation" class="active"><a href="Carro.php">Inicio</a></li>
                    <li role="presentation"><a href="VisualizarCarro.php">Ver Carrito</a></li>
                    <li role="presentation"><a href="#">Pagos</a></li>
                </ul>
            </div>

            <div class="panel-body">
                <h1>Videojuegos</h1>
                <a href="VisualizarCarro.php" class="cart-link" title="Ver Carrito"><i class="glyphicon glyphicon-shopping-cart"></i></a>
                <div id="products" class="col-lg-16">
                    <?php
                    //get rows query
                    $query = $pdo->query("SELECT * FROM productos");
                    if ($query->rowCount() > 0) {
                        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                            <div class="item col-lg-4">
                                <div class="thumbnail">
                                    <div class="caption">
                                        <h4 class="list-group-item-heading"><?php echo $row["nombre"]; ?></h4>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p class="lead"><?php echo '$' . $row["precio"] . ' USD'; ?></p>
                                            </div>
                                            <div class="col-md-6">
                                                <a class="btn btn-success" href="AccionCarta.php?action=addToCart&id=<?php echo $row["id_producto"]; ?>">Agregar al carrito</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php }
                    } else { ?>
                        <p>Producto(s) no existe.....</p>
                    <?php } ?>
                </div>
            </div>
            <div class="panel-footer">ArkGames</div>
        </div>

    </div>
    <?php
    require_once VIEW_PATH . 'Templates/footerBootstrap.php'
    ?>
    
</body>

</html>

