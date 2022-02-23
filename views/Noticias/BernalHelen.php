<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="description" content="Página de noticas ArkGames" />
    <meta name="keywords" content="videojuegos,noticias,novedades" />
    <link rel="stylesheet" href="../../assets/css/master.css" />
    <link rel="stylesheet" href="../../assets/css/BernalHelen.css" />
    <link rel="shortcut icon" href="../../assets/img/logo.svg">
    <title>Noticias - ArkGames</title>
</head>

<body>
    <!-------------------------------------------------MENU---------------------------------------->
    <?php
    include_once '../Templates/navBar.php'
    ?>
    <!------------------------------------------------------------------------------------------>
    <img id="flecha_arriba" src="../../assets/img/flecha_arriba.svg" alt="flecha" />
    <div class="noticias">
        <section class="contenedor">
            <h1>Últimas noticias de ArkGames</h1>
            <!------------------------NOTICIA 1----------------------------------->
            <div class="previa_noticia">
                <img class="image_notice" src="../../assets/img/noticia1.jpg" alt="Ultimos juegos" />
                <div class="bloque_texto_noticia">
                    <h3>Próximos lanzamientos y últimos juegos</h3>
                    <p><time datetime="2021-12-14">14-12-2021</time> /PS3, PSP, PC<br>¿Quieres saber cuáles son los próximos y últimos lanzamientos en videojuegos este año?
                        Aquí encontrarás el calendario con las fechas de lanzamiento de todos los juegos de las
                        diferentes plataformas actualizadas día a día.<br><a class="ver_mas" href="#">Ver más &rarr;</a></p>

                </div>
            </div>
            <!------------------------NOTICIA 2----------------------------------->
            <div class="previa_noticia">
                <img class="image_notice" src="../../assets/img/noticia2.jpg" alt="PS5 novedades" />
                <div class="bloque_texto_noticia">
                    <h3>Un vistazo a las características de la versión para PS5</h3>
                    <p><time datetime="2021-12-02">02-12-2021</time> /PS3, PSP, PC<br>
                        El 4 de marzo de 2022 se pone a la venta en PS4 y PS5 Gran Turismo 7, y obviamente,
                        la superior calidad técnica de la consola más potente permite la implementación de algunas
                        mejoras técnicas, o el uso del mando Dualsense para la vibración y los gatillos<br>
                        <a class="ver_mas" href="#">Ver más &rarr;</a>
                    </p>

                </div>
            </div>
            <!------------------------NOTICIA 3----------------------------------->
            <div class="previa_noticia">
                <img class="image_notice" src="../../assets/img/noticia3.jpg" alt="Fortnite navideño" />
                <div class="bloque_texto_noticia">
                    <h3>Disfruta de las fiestas en Fornite</h3>
                    <p><time datetime="2021-11-29">29-11-2021</time> /PS3, PSP, PC<br>
                        Desde el 16 de diciembre de 2021 a las 15:00h CET hasta el 6 de enero de 2022 a esa
                        misma hora se celebra el evento Festival de Invierno 2021 en Fortnite Battle Royale. Tendremos
                        nuevos desafíos y misiones que completar, además de 14 regalos gratis entre los que se incluyen dos skins.<br>
                        <a class="ver_mas" href="#">Ver más &rarr;</a>
                    </p>

                </div>
            </div>
            <!------------------------NOTICIA 4----------------------------------->
            <div class="previa_noticia">
                <img class="image_notice" src="../../assets/img/noticia4.jpg" alt="Genshin Impact sin gacha" />
                <div class="bloque_texto_noticia">
                    <h3>Novedades de la nueva versión de Genshin Impact</h3>
                    <p><time datetime="2021-11-28">28-11-2021</time> /PS3, PSP, PC<br>Los jugadores de Genshin Impact pronto
                        podrán desbloquear nuevos personajes y armas sin tener que usar Protogemas en los banner de gacha del juego.
                        Según se informa, se está trabajando en un nuevo método para obtener personajes sin gacha para su lanzamiento
                        en 2022.<br><a class="ver_mas" href="#">Ver más &rarr;</a></p>

                </div>
            </div>
        </section>
        <aside>
            <div id="aside_suscribe" class="aside_componente">
                <p><a id="suscribete" href="frm_BernalHelen.php">Suscríbete para más noticias<br>AQUÍ </a></p>
            </div>
            <div id="aside_categorias" class="aside_componente">
                <h3 id="titulo_categoria">Categorías</h3>
                <div class="lista_categorias">
                    <ul>
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
            <div id="aside_nuevo" class="aside_componente">
                <a class="titulo_nuevo" onclick="mostrarBloque()">⇒ Juego Destacado del Mes ⇐</a>
                <img id="juego_destacado" src="../../assets/img/god_war.jfif" alt="anuncio3" />
            </div>
            <div id="aside_slider" class="aside_componente">
                <div id="container_slider">
                    <div class="slider" id="slider">
                        <div class="slider_section">
                            <img class="slider_img" src="../../assets/img/anuncio1.svg" alt="anuncio1" />
                        </div>
                        <div class="slider_section">
                            <img class="slider_img" src="../../assets/img/anuncio2.svg" alt="anuncio2" />
                        </div>
                        <div class="slider_section">
                            <img class="slider_img" src="../../assets/img/anuncio3.svg" alt="anuncio3" />
                        </div>
                    </div>
                    <div class="slider_btn slider_btn--right" id="btn-right">&#62;</div>
                    <div class="slider_btn slider_btn--left" id="btn-left">&#60;</div>
                </div>
            </div>
        </aside>
    </div>
    <!-------------------------------------------------FOOTER---------------------------------------->
    <?php
    include_once '../Templates/footer.php'
    ?>
    <!----------------------------------------------------------------------------------------------->
    <script type="text/javascript" src="../../assets/js/Bernal_Helen.js"></script>
</body>

</html>