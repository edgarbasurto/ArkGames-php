<?php require_once '../../views/Templates/HeadBootstrap.php' ?>
    <meta name="description" content="Página de noticas ArkGames" />
    <meta name="keywords" content="videojuegos,noticias,novedades" />
    <link rel="stylesheet" href="../../assets/css/Noticias.css" />
    <title>Noticias - ArkGames</title>
</head>

<body id="bodyTemp">
    <!-------------------------------------------------MENU---------------------------------------->
    <header>
        <?php
        require_once '../Templates/navBarBootstrap.php'
        ?>
    </header>
    <!------------------------------------------------------------------------------------------>
    <main class="main p-3">
        <img id="flecha_arriba" src="data:image/jpg;base64,<?php echo base64_encode($noticia->url_imagen) ?>" alt="<?php echo $id ?>"/>
        <div class="container-fluid row">
            <div class="col-md-9">
                <h1>Últimas noticias de ArkGames</h1>
                <?php
                foreach ($resultados as $noticia) {
                ?>
                <div class="previa_noticia">
                    <img class="image_notice" src="../../assets/img/noticia1.jpg" alt="Ultimos juegos" />
                    <div class="bloque_texto_noticia">
                        <h3><?php echo $noticia->titulo ?></h3>
                        <p><time><?php echo $noticia->fecha ?></time><?php echo '/'. $noticia->tema->nombre_tema. '-'. $noticia->dispositivo->nombre_dispositivo ?><br>
                        <?php echo $noticia->descripcion ?>
                        <br><a class="ver_mas" href="#">Ver más &rarr;</a></p>
        
                    </div>
                </div>
                <?php } ?>
            </div>
            <aside class="col-md-3">
                <!--<div id="aside_suscribe" class="aside_componente">-->
                <div class="row mx-auto suscribete" style="justify-content: center;">
                    <button class="btn btn-primary btn-rounded btn-lg btn-block" type="submit">Suscríbete para más noticias<br>AQUÍ </button>
                </div>
                <div class="aside_componente row mx-auto">
                    <h3 id="titulo_categoria">Categorías</h3>
                    <div class="lista_categorias" >
                        <ul style="list-style: none;">
                            <li><a class="temas_aside" href="#">Eventos</a></li>
                            <li><a class="temas_aside" href="#">Novedades</a></li>
                            <li><a class="temas_aside" href="#">Ofertas</a></li>
                            <li><a class="temas_aside" href="#">PC</a></li>
                            <li><a class="temas_aside" href="#">PS2</a></li>
                            <li><a class="temas_aside" href="#">PS3</a></li>
                            <li><a class="temas_aside" href="#">PS4</a></li>
                            <li><a class="temas_aside" href="#">PS5</a></li>
                            <li><a class="temas_aside" href="#">XBox</a></li>
                        </ul>
                    </div>
                </div>
                <div id="aside_nuevo" class="aside_componente row mx-auto">
                    <a class="titulo_nuevo" onclick="mostrarBloque()">⇒ Juego Destacado del Mes ⇐</a>
                    <img id="juego_destacado" src="../../assets/img/god_war.jfif" alt="anuncio3" />
                </div>
                <div id="aside_slider" class="aside_componente row mx-auto">
                    <div id="container_slider">
                        <div class="slider" id="slider">
                            <div class="slider_section">
                                <img class="slider_img" src="../../assets/img/anuncio1.png" alt="anuncio1" />
                            </div>
                            <div class="slider_section">
                                <img class="slider_img" src="../../assets/img/anuncio2.png" alt="anuncio2" />
                            </div>
                            <div class="slider_section">
                                <img class="slider_img" src="../../assets/img/anuncio3.png" alt="anuncio3" />
                            </div>
                        </div>
                        <div class="slider_btn slider_btn--right" id="btn-right">&#62;</div>
                        <div class="slider_btn slider_btn--left" id="btn-left">&#60;</div>
                    </div>
                </div>
            </aside>
        </div>
    </main>
    <!-------------------------------------------------FOOTER---------------------------------------->
    <?php
    require_once '../Templates/footerBootstrap.php'
    ?>
    <!----------------------------------------------------------------------------------------------->
    <script type="text/javascript" src="../../assets/js/Bernal_Helen.js"></script>
</body>

</html>