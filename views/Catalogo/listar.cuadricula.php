<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="description" content="Catalogo" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="videojuegos,catalogo,juegos" />
    <link rel="stylesheet" href="../../assets/css/master3.css" />
    <link rel="stylesheet" href="../../assets/css/BasurtoEdgar.css" />
    <link rel="icon" href="../../assets/img/logo.svg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css");

        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <title>Catálogo - ArkGames</title>
</head>

<body class="container py-5 my-5">

    <!-------------------------------------------------MENU---------------------------------------->


    <?php

    require_once '../Templates/navBarBoostrap.php'
    ?>




    <!------------------------------------------------------------------------------------------>



    <main class="contenedor">

        <div class="container-fluid card shadow">


            <div class="row card-header">
                <div class="col-6">
                    <h1 class="title">Catálogo de ArkGames</h1>
                </div>
                <div class="col-6">
                    <div class="row d-flex justify-content-around">
                        <div class="col">
                            <a class="btn btn-secondary" href="listar.cuadricula.php"><i class="fa-solid fa-circle-plus"></i> Cuadricula</a>
                        </div>
                        <div class="col">
                            <a class="btn btn-secondary" href="listar.tabla.php"><i class="fa-solid fa-circle-plus"></i> Tabla</a>
                        </div>
                        <div class="col">
                            <a class="btn btn-primary" href="agregar.producto.php"><i class="fa-solid fa-circle-plus"></i> Agregar nuevo</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body card-deck row">

                <?php
                require_once '../../controller/ProductosControlador.php';

                $cont = new ProductosControlador();
                $lista = $cont->index();

                foreach ($lista as $producto) {
                ?>

                    <div class="card col-4 my-2" id="<?php echo $producto->Id_producto ?>">
                        <div class="card-img-top mt-3">
                        <img class="img-cuadricula" src="<?php echo $producto->Url_imagen ?>" alt="<?php echo $producto->Nombre ?>">
                        </div>

                        <div class="card-body">
                            <h2 class="card-title"><?php echo $producto->Nombre ?></h2>
                            <p class="card-text text-muted"><?php echo $producto->Categoria->Nombre_categoria ?></p>
                        </div>

                        <div class="card-footer row">
                            <!-- <div class="box-precio"> -->
                            <span class="precio2 col-7"><b>$<?php echo $producto->Precio ?></b></span>

                            <!-- <a class="icon-buy" href="#"><img class="icon-buy" src="../../assets/img/cart_icon.svg" alt="icono de compra"></a> -->
                            <div class="col-5">
                                <a href="editar.php?id=<?php echo $producto->Id_producto ?>" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a href="eliminar.php?id=<?php echo $producto->Id_producto ?>" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></a>
                            </div>
                            <!-- </div> -->
                        </div>
                    </div>


                <?php } ?>

                <div class="paginador" id="paginador">
                    <label>Registros por pagina:</label>
                    <select name="regitrospagina" class="cantreg" id="cantreg">
                        <option value="0">Todos</option>
                        <option value="3">3</option>
                        <option value="6">6</option>
                        <option value="9">9</option>
                    </select>
                    <a href="javascript:void(0)" class="firstPage" id="firstPage">«</a>
                    <a href="javascript:void(0)" class="previousPage" id="previousPage">❮</a>
                    <select name="numpagina" class="numpagina" id="numpagina">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
                    <a href="javascript:void(0)" class="nextPage" id="nextPage">❯</a>
                    <a href="javascript:void(0)" class="lastPage" id="lastPage">»</a>
                </div>
            </div>
        </div>
    </main>


    <!-------------------------------------------------FOOTER---------------------------------------->


    <?php
    require_once '../Templates/footerBoostrap.php'
    ?>


    <!----------------------------------------------------------------------------------------------->



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../../assets/js/BasurtoEdgar.js"></script>
    <script src="https://kit.fontawesome.com/2008d37923.js" crossorigin="anonymous"></script>
</body>

</html>