<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="description" content="Catalogo" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="videojuegos,catalogo,juegos" />
    <link rel="stylesheet" href="../../assets/css/master.css" />
    <link rel="stylesheet" href="../../assets/css/BasurtoEdgar.css" />
    <link rel="icon" href="../../assets/img/logo.svg">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    -->

    <title>Catálogo - ArkGames</title>
</head>

<body>
    <!-------------------------------------------------MENU---------------------------------------->
    <?php
    include_once '../Templates/navBar.php'
    // require_once '../../config/Conexion.php';
    
    // $sql = "select * from productos p, categorias c where p.id_categoria = c.id_categoria and prod_estado=1";
    // // $sql = "select * from usuarios ";
    // $stmt = $pdo->prepare($sql);
    // $stmt->execute();

    ?>
    <!------------------------------------------------------------------------------------------>

    <main class="contenedor">

        <div class="bloque-izq">


            <div class="top">
                <h1 class="title">Catálogo de ArkGames</h1>
                <div>
                    <a class="btnCompra" href="frm_BasurtoEdgar.php">Confirmar compra</a>
                </div>
            </div>

            <div class="cuadricula-juegos">
                
                <?php
                //  $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach ($productos as $producto) {
                ?>

                    <div class="cuadricula" id="<?php echo $producto['id_producto'] ?>">
                        <div class="imagen-card">
                            <img class="img-cuadricula" src="<?php echo $producto['url_imagen'] ?>" alt="<?php echo $producto['nombre'] ?>">
                        </div>

                        <div class="informacion">
                            <h2><?php echo $producto['nombre'] ?></h2>
                            <p class="descripcion"><?php echo $producto['nombre_categoria'] ?></p>
                        </div>
                        <div class="footer-box">
                            <div class="box-precio">
                                
                                <span class="precio2"><b><?php echo $producto['precio'] ?></b></span>
                            </div>
                            <a class="icon-buy" href="#"><img class="icon-buy" src="../../assets/img/cart_icon.svg" alt="icono de compra"></a>
                            <a href="editar.php?id=<?php echo $producto['id_producto'] ?>">Editar</a>
                            <a href="eliminar.php?id=<?php echo $producto['id_producto'] ?>">Eliminar</a>
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
        <div class="bloque-derecha">
            <aside>
                <div class="titulo">
                    <h3>Más contenido:</h3>
                </div>
                <section>
                    <h2>Noticias</h2>
                    <blockquote>
                        <p>En esta seccion podrás encontrar noticias relacionadas con juegos...</p>
                    </blockquote>
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/CaPZqDiYHaw" title="YouTube video player" allow="accelerometer; autoplay;
                     clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </section>

                <section>
                    <h2>Ofertas</h2>
                    <blockquote>
                        <p>Aprovecha nuestras ofertas en los lanzamientos de juegos del 2022...</p>
                    </blockquote>

                </section>

                <section>
                    <h2>Deportes</h2>
                    <blockquote>
                        <p>Juegos relacionados con los deportes (futbol, racing, beisbol, etc.)...</p>
                    </blockquote>

                </section>

                <section>
                    <h2>Aventura</h2>
                    <blockquote>
                        <p>Juegos relacionado con la aventura y la acción</p>
                    </blockquote>

                </section>
            </aside>
        </div>
    </main>

    <!-------------------------------------------------FOOTER---------------------------------------->
    <?php
    include_once '../Templates/footer.php'
    ?>
    <!----------------------------------------------------------------------------------------------->

    <!-- <script type="text/javascript" src="../../assets/js/BasurtoEdgar.js"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->

</body>

</html>