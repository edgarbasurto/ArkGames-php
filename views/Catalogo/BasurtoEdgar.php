<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="description" content="Catalogo" />
    <meta name="keywords" content="videojuegos,catalogo,juegos" />
    <link rel="stylesheet" href="../../assets/css/master.css" />
    <link rel="stylesheet" href="../../assets/css/BasurtoEdgar.css" />
    <link rel="icon" href="../../assets/img/logo.svg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Catálogo - ArkGames</title>
</head>

<body>
    <!-------------------------------------------------MENU---------------------------------------->
    <?php
    include_once '../Templates/navBar.php'
    ?>
    <!------------------------------------------------------------------------------------------>

    <main class="contenedor">

        <div class="bloque-izq">


            <div class="top">
                <h1 class="title">Catálogo de ArkGames</h1>
                <div>
                    <a class="btnCompra" href="frm_BasurtoEdgar.html">Confirmar compra</a>
                </div>
            </div>

            <div class="cuadricula-juegos">


                <div class="cuadricula" id="1">
                    <div class="imagen-card">
                        <img class="img-cuadricula" src="../../assets/img/Hitman3_poster.jpg" alt="Hitman3">
                    </div>

                    <div class="informacion">
                        <h2>Hitman 3</h2>
                        <p class="descripcion">Aventura</p>
                    </div>
                    <div class="footer-box">
                        <div class="box-precio">
                            <span class="precio1"><em>$35,00</em></span>
                            <span class="precio2"><b>$30,00</b></span>
                        </div>
                        <a class="icon-buy" href="frm_BasurtoEdgar.html"><img class="icon-buy" src="../../assets/img/cart_icon.svg" alt="icono de compra"></a>
                    </div>
                </div>

                <div class="cuadricula" id="2">

                    <div class="imagen-card">
                        <img class="img-cuadricula" src="../../assets/img/fornite_poster.jpg" alt="Fornite">
                    </div>

                    <div class="informacion">
                        <h2>Fornite</h2>
                        <p class="descripcion">Aventura</p>
                    </div>

                    <div class="footer-box">
                        <div class="box-precio">
                            <span class="precio1"><em>$25,00</em></span>
                            <span class="precio2"><b>$19,99</b></span>
                        </div>
                        <a class="a-icon-buy" href="frm_BasurtoEdgar.html"><img class="icon-buy" src="../../assets/img/cart_icon.svg" alt="icono de compra"></a>
                    </div>
                </div>

                <div class="cuadricula" id="3">
                    <div class="imagen-card">
                        <img class="img-cuadricula" src="../../assets/img/returnal_poster.jpeg" alt="Returnal">
                    </div>

                    <div class="informacion">
                        <h2>Returnal</h2>
                        <p class="descripcion">Aventura</p>
                    </div>

                    <div class="footer-box">
                        <div class="box-precio">
                            <span class="precio1"><em>$65,00</em></span>
                            <span class="precio2"><b>$43,50</b></span>
                        </div>
                        <a class="a-icon-buy" href="#"><img class="icon-buy" src="../../assets/img/cart_icon.svg" alt="icono de compra"></a>
                    </div>
                </div>

                <div class="cuadricula" id="4">

                    <div class="imagen-card">
                        <img class="img-cuadricula" src="../../assets/img/posters/TheMedium_poster.jpg" alt="TheMedium_poster">
                    </div>

                    <div class="informacion">
                        <h2>The Medium</h2>
                        <p class="descripcion">Aventura</p>
                    </div>

                    <div class="footer-box">
                        <div class="box-precio">
                            <span class="precio1"><em>$15,00</em></span>
                            <span class="precio2"><b>$12,99</b></span>
                        </div>
                        <a class="a-con-buy" href="#"><img class="icon-buy" src="../../assets/img/cart_icon.svg" alt="icono de compra"></a>
                    </div>
                </div>

                <div class="cuadricula" id="5">

                    <div class="imagen-card">
                        <img class="img-cuadricula" src="../../assets/img/posters/Back4Blood_poster.jpg" alt="Black 4 blood">
                    </div>

                    <div class="informacion">
                        <h2>Black 4 Blood</h2>
                        <p class="descripcion">Aventura</p>
                    </div>

                    <div class="footer-box">
                        <div class="box-precio">
                            <span class="precio1"><em>$35,00</em></span>
                            <span class="precio2"><b>$30,00</b></span>
                        </div>
                        <a class="a-con-buy" href="#"><img class="icon-buy" src="../../assets/img/cart_icon.svg" alt="icono de compra"></a>
                    </div>
                </div>

                <div class="cuadricula" id="6">

                    <div class="imagen-card">
                        <img class="img-cuadricula" src="../../assets/img/posters/Deathloop_poster.jpg" alt="Deathloop_poster">
                    </div>

                    <div class="informacion">
                        <h2>Deathloop</h2>
                        <p class="descripcion">Aventura</p>
                    </div>

                    <div class="footer-box">
                        <div class="box-precio">
                            <span class="precio1"><em>$35,00</em></span>
                            <span class="precio2"><b>$30,00</b></span>
                        </div>
                        <a class="a-con-buy" href="#"><img class="icon-buy" src="../../assets/img/cart_icon.svg" alt="icono de compra"></a>
                    </div>
                </div>

                <div class="cuadricula" id="7">

                    <div class="imagen-card">
                        <img class="img-cuadricula" src="../../assets/img/posters/FIFA_22_Poster.jpg" alt="FIFA_22_Poster">
                    </div>

                    <div class="informacion">
                        <h2>FIFA 22</h2>
                        <p class="descripcion">Deportes</p>
                    </div>

                    <div class="footer-box">
                        <div class="box-precio">
                            <span class="precio1"><em>$35,00</em></span>
                            <span class="precio2"><b>$30,00</b></span>
                        </div>
                        <a class="a-con-buy" href="#"><img class="icon-buy" src="../../assets/img/cart_icon.svg" alt="icono de compra"></a>
                    </div>
                </div>

                <div class="cuadricula" id="8">

                    <div class="imagen-card">
                        <img class="img-cuadricula" src="../../assets/img/posters/Forza-Horizon-poster.jpg" alt="Forza-Horizon-poster">
                    </div>

                    <div class="informacion">
                        <h2>Forza Horizon</h2>
                        <p class="descripcion">Aventura</p>
                    </div>

                    <div class="footer-box">
                        <div class="box-precio">
                            <span class="precio1"><em>$35,00</em></span>
                            <span class="precio2"><b>$30,00</b></span>
                        </div>
                        <a class="a-con-buy" href="#"><img class="icon-buy" src="../../assets/img/cart_icon.svg" alt="icono de compra"></a>
                    </div>
                </div>

                <div class="cuadricula" id="9">

                    <div class="imagen-card">
                        <img class="img-cuadricula" src="../../assets/img/posters/GuardiansoftheGalaxy_poster.jpg" alt="GuardiansoftheGalaxy_poster">
                    </div>

                    <div class="informacion">
                        <h2>Guardians of the Galaxy</h2>
                        <p class="descripcion">Aventura</p>
                    </div>

                    <div class="footer-box">
                        <div class="box-precio">
                            <span class="precio1"><em>$35,00</em></span>
                            <span class="precio2"><b>$30,00</b></span>
                        </div>
                        <a class="a-con-buy" href="#"><img class="icon-buy" src="../../assets/img/cart_icon.svg" alt="icono de compra"></a>
                    </div>
                </div>

                <div class="cuadricula" id="10">

                    <div class="imagen-card">
                        <img class="img-cuadricula" src="../../assets/img/posters/halo-infinite_poster.jpg" alt="halo-infinite_poster">
                    </div>

                    <div class="informacion">
                        <h2>Halo infinite</h2>
                        <p class="descripcion">Aventura</p>
                    </div>

                    <div class="footer-box">
                        <div class="box-precio">
                            <span class="precio1"><em>$35,00</em></span>
                            <span class="precio2"><b>$30,00</b></span>
                        </div>
                        <a class="a-con-buy" href="#"><img class="icon-buy" src="../../assets/img/cart_icon.svg" alt="icono de compra"></a>
                    </div>
                </div>

                <div class="cuadricula" id="11">

                    <div class="imagen-card">
                        <img class="img-cuadricula" src="../../assets/img/posters/ItTakesTwo_poster.jpg" alt="ItTakesTwo_poster">
                    </div>

                    <div class="informacion">
                        <h2>It Takes Two</h2>
                        <p class="descripcion">Aventura</p>
                    </div>

                    <div class="footer-box">
                        <div class="box-precio">
                            <span class="precio1"><em>$35,00</em></span>
                            <span class="precio2"><b>$30,00</b></span>
                        </div>
                        <a class="a-con-buy" href="#"><img class="icon-buy" src="../../assets/img/cart_icon.svg" alt="icono de compra"></a>
                    </div>
                </div>

                <div class="cuadricula" id="12">

                    <div class="imagen-card">
                        <img class="img-cuadricula" src="../../assets/img/posters/KenaBridgeOfSpirits_poster.jpg" alt="KenaBridgeOfSpirits_poster">
                    </div>

                    <div class="informacion">
                        <h2>Kena</h2>
                        <p class="descripcion">Bridge of Spirits</p>
                    </div>

                    <div class="footer-box">
                        <div class="box-precio">
                            <span class="precio1"><em>$35,00</em></span>
                            <span class="precio2"><b>$30,00</b></span>
                        </div>
                        <a class="a-con-buy" href="#"><img class="icon-buy" src="../../assets/img/cart_icon.svg" alt="icono de compra"></a>
                    </div>
                </div>

                <div class="cuadricula" id="13">

                    <div class="imagen-card">
                        <img class="img-cuadricula" src="../../assets/img/posters/LittleNightmares2_poster.jpg" alt="LittleNightmares2_poster">
                    </div>

                    <div class="informacion">
                        <h2>Little Nightmares 2</h2>
                        <p class="descripcion">Aventura</p>
                    </div>

                    <div class="footer-box">
                        <div class="box-precio">
                            <span class="precio1"><em>$35,00</em></span>
                            <span class="precio2"><b>$30,00</b></span>
                        </div>
                        <a class="a-con-buy" href="#"><img class="icon-buy" src="../../assets/img/cart_icon.svg" alt="icono de compra"></a>
                    </div>
                </div>

                <div class="cuadricula" id="14">

                    <div class="imagen-card">
                        <img class="img-cuadricula" src="../../assets/img/posters/Psychonauts2_poster.jpg" alt="Psychonauts2_poster">
                    </div>

                    <div class="informacion">
                        <h2>Psychonauts 2</h2>
                        <p class="descripcion">Aventura</p>
                    </div>

                    <div class="footer-box">
                        <div class="box-precio">
                            <span class="precio1"><em>$35,00</em></span>
                            <span class="precio2"><b>$30,00</b></span>
                        </div>
                        <a class="a-con-buy" href="#"><img class="icon-buy" src="../../assets/img/cart_icon.svg" alt="icono de compra"></a>
                    </div>
                </div>

                <div class="cuadricula" id="15">

                    <div class="imagen-card">
                        <img class="img-cuadricula" src="../../assets/img/posters/ResidentEvilVillage_poster.jpg" alt="ResidentEvilVillage_poster">
                    </div>

                    <div class="informacion">
                        <h2>Resident Evil Village</h2>
                        <p class="descripcion">Aventura</p>
                    </div>

                    <div class="footer-box">
                        <div class="box-precio">
                            <span class="precio1"><em>$35,00</em></span>
                            <span class="precio2"><b>$30,00</b></span>
                        </div>
                        <a class="a-con-buy" href="#"><img class="icon-buy" src="../../assets/img/cart_icon.svg" alt="icono de compra"></a>
                    </div>
                </div>

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

    <script type="text/javascript" src="../../assets/js/BasurtoEdgar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>