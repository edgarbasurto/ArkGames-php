<?php require_once VIEW_PATH . 'Templates/HeadBootstrap.php' ?>
    <meta name="description" content="Página de noticas ArkGames" />
    <meta name="keywords" content="videojuegos,noticias,novedades" />
    <link rel="stylesheet" href="assets/css/Noticias.css" />
    <title>Noticias - ArkGames</title>
</head>

<body id="bodyTemp">
    <!-------------------------------------------------MENU---------------------------------------->
    <header>
        <?php
        require_once VIEW_PATH . 'Templates/navBarBootstrap.php'
        ?>
    </header>
    <!------------------------------------------------------------------------------------------>
    <main class="main p-3">
        <img id="flecha_arriba" src="assets/img/flecha_arriba.svg" alt="flecha" />
        <div class="container-fluid row">
            <div class="col-md-9">
                <h1>Últimas noticias de ArkGames</h1>
                <?php
                foreach ($resultados as $noticia) {
                ?>
                <div class="previa_noticia">
                    <img class="image_notice" src="assets/img/noticias/<?php echo $noticia->url_imagen ?>" alt="<?php echo $id ?>" />
                    <div class="bloque_texto_noticia">
                        <h3><?php echo $noticia->titulo ?></h3>
                        <p><time><?php echo $noticia->fecha ?></time><?php echo '/'. $noticia->tema->nombre_tema. ' - '. $noticia->dispositivo->nombre_dispositivo ?><br>
                        <?php echo $noticia->descripcion ?>
                        <br><a class="ver_mas" href="#">Ver más &rarr;</a></p>
        
                    </div>
                </div>
                <?php } ?>
            </div>
            <aside class="col-md-3">
                <div class="row mx-auto suscribete" style="justify-content: center;">
                    <a class="btn btn-primary btn-rounded btn-lg btn-block" href="index.php?c=suscripcion&a=nuevo" >Suscríbete para más noticias<br>AQUÍ </a>
                </div>
                <div class="aside_componente row mx-auto">
                    <h3 id="titulo_categoria">Categorías</h3>
                    <div class="lista_categorias" >
                        <ul style="list-style: none;">
                            <?php
                            foreach ($lista1 as $tema) {
                            ?>
                            <li><a class="temas_aside" href="index.php?c=noticias&a=buscar&busqueda=<?php echo $tema->id_tema ?>&op=1"><?php echo $tema->nombre_tema ?></a></li>
                            <?php } ?>
                            <?php
                            foreach ($lista2 as $dispositivo) {
                            ?>
                            <li><a class="temas_aside" href="index.php?c=noticias&a=buscar&busqueda=<?php echo $dispositivo->id_dispositivo ?>&op=2"><?php echo $dispositivo->nombre_dispositivo ?></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <div id="aside_nuevo" class="aside_componente row mx-auto">
                    <a class="titulo_nuevo" onclick="mostrarBloque()">⇒ Juego Destacado del Mes ⇐</a>
                    <img id="juego_destacado" src="../../assets/img/god_war.jfif" alt="anuncio3" style="height: 300px;" />
                </div>
                <div id="aside_slider" class="aside_componente row mx-auto">
                    <div id="container_slider">
                        <div class="slider" id="slider">
                            <div class="slider_section">
                                <img class="slider_img" src="assets/img/anuncio1.png" alt="anuncio1" />
                            </div>
                            <div class="slider_section">
                                <img class="slider_img" src="assets/img/anuncio2.png" alt="anuncio2" />
                            </div>
                            <div class="slider_section">
                                <img class="slider_img" src="assets/img/anuncio3.png" alt="anuncio3" />
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
    require_once VIEW_PATH . 'Templates/footerBootstrap.php'
    ?>
    <!----------------------------------------------------------------------------------------------->
    <script type="text/javascript" src="assets/js/Bernal_Helen.js"></script>
</body>

</html>