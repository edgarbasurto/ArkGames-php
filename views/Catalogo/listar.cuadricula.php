<?php require_once VIEW_PATH . 'Templates/HeadBootstrap.php' ?>

<meta name="keywords" content="videojuegos,catalogo,juegos" />
<link rel="stylesheet" href="assets/css/BasurtoEdgar.css" />
<meta name="description" content="Catalogo" />

<title>Catálogo - ArkGames</title>
</head>

<body id="bodyTemp">

    <!-------------------------------------------------MENU---------------------------------------->


    <?php
    require_once VIEW_PATH . 'Templates/navBarBootstrap.php'
    ?>

    <!------------------------------------------------------------------------------------------>

    <main class="container my-5">

        <div class="container-fluid card shadow" style="background-color:rgba(0,0,0,0.6);">

            <div class="row card-header">
                <div class="col-8">
                    <h1 class="title text-white">Catálogo de ArkGames</h1>
                </div>
                <div class="col-4">
                    <div class="row text-end py-2">
                        
                    </div>
                </div>
            </div>

            <div class="card-body card-deck row">

                <?php
                foreach ($resultados as $producto) {
                ?>
                    <div class="col-lg-3 col-md-6 mb-4 mb-lg-0 my-4">
                        <div class="card shadow text-white" style="background: rgb(0,0,0); background: linear-gradient(0deg, rgba(0,0,0,1) 0%, rgba(9,9,121,1) 50%, rgba(0,212,255,1) 100%);" id="<?php echo $producto->id_producto ?>">
                            <div style="height: 320px; overflow: hidden; ">
                                <img class="card-img-top" src="assets/img/posters/<?php echo ($producto->url_imagen) ?>" alt="<?php echo $producto->nombre ?>">
                            </div>
                            <div class="card-body">
                                <h2 class="card-title"><?php echo $producto->nombre ?></h2>
                                <p class="card-text text-muted"><?php echo $producto->categoria->nombre_categoria ?></p>
                            </div>

                            <div class="card-footer">
                                <div class="row">
                                    <div class="col">
                                        <span class="precio2"><b>$<?php echo $producto->precio ?></b></span>
                                    </div>
                                    <div class="col text-end">
                                        <a href="index.php?c=carrito&a=addToCart&id=<?php echo $producto->id_producto ?>" class="btn btn-info text-white"><i class="fa-solid fa-cart-plus"></i></a>
                                        
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>


                <?php } ?>

            </div>
        </div>
    </main>


    <!-------------------------------------------------FOOTER---------------------------------------->


    <?php
    require_once VIEW_PATH . 'Templates/footerBootstrap.php'
    ?>


    <!----------------------------------------------------------------------------------------------->

    <!-- <script type="text/javascript" src="assets/js/BasurtoEdgar.js"></script> -->
</body>

</html>