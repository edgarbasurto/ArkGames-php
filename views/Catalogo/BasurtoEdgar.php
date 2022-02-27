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

<body>
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="home" viewBox="0 0 16 16">
            <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5z" />
        </symbol>
        <symbol id="speedometer2" viewBox="0 0 16 16">
            <path d="M8 4a.5.5 0 0 1 .5.5V6a.5.5 0 0 1-1 0V4.5A.5.5 0 0 1 8 4zM3.732 5.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707zM2 10a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 10zm9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5zm.754-4.246a.389.389 0 0 0-.527-.02L7.547 9.31a.91.91 0 1 0 1.302 1.258l3.434-4.297a.389.389 0 0 0-.029-.518z" />
            <path fill-rule="evenodd" d="M0 10a8 8 0 1 1 15.547 2.661c-.442 1.253-1.845 1.602-2.932 1.25C11.309 13.488 9.475 13 8 13c-1.474 0-3.31.488-4.615.911-1.087.352-2.49.003-2.932-1.25A7.988 7.988 0 0 1 0 10zm8-7a7 7 0 0 0-6.603 9.329c.203.575.923.876 1.68.63C4.397 12.533 6.358 12 8 12s3.604.532 4.923.96c.757.245 1.477-.056 1.68-.631A7 7 0 0 0 8 3z" />
        </symbol>
        <symbol id="table" viewBox="0 0 16 16">
            <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm15 2h-4v3h4V4zm0 4h-4v3h4V8zm0 4h-4v3h3a1 1 0 0 0 1-1v-2zm-5 3v-3H6v3h4zm-5 0v-3H1v2a1 1 0 0 0 1 1h3zm-4-4h4V8H1v3zm0-4h4V4H1v3zm5-3v3h4V4H6zm4 4H6v3h4V8z" />
        </symbol>
        <symbol id="people-circle" viewBox="0 0 16 16">
            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
        </symbol>
        <symbol id="grid" viewBox="0 0 16 16">
            <path d="M1 2.5A1.5 1.5 0 0 1 2.5 1h3A1.5 1.5 0 0 1 7 2.5v3A1.5 1.5 0 0 1 5.5 7h-3A1.5 1.5 0 0 1 1 5.5v-3zM2.5 2a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zm6.5.5A1.5 1.5 0 0 1 10.5 1h3A1.5 1.5 0 0 1 15 2.5v3A1.5 1.5 0 0 1 13.5 7h-3A1.5 1.5 0 0 1 9 5.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zM1 10.5A1.5 1.5 0 0 1 2.5 9h3A1.5 1.5 0 0 1 7 10.5v3A1.5 1.5 0 0 1 5.5 15h-3A1.5 1.5 0 0 1 1 13.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zm6.5.5A1.5 1.5 0 0 1 10.5 9h3a1.5 1.5 0 0 1 1.5 1.5v3a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 9 13.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3z" />
        </symbol>
    </svg>
    <!-------------------------------------------------MENU---------------------------------------->
    <header>
        <!-- <section>

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">
                        <img src="../../assets/img/logo-icon-text.svg" id="logo_page" alt="ArkGames" width="30" height="24" class="d-inline-block align-text-top" />
                    </a>
                    <ul>
                        <li><a href="../../index.html"><img src="../../assets/img/home-solid.svg" alt="Home" class="menu_icon">
                                Home</a></li>
                        <li><a href="../Catalogo/BasurtoEdgar.php"><img src="../../assets/img/store-solid.svg" alt="Tienda" class="menu_icon">Tienda</a></li>
                        <li><a href="../Noticias/BernalHelen.php"><img src="../../assets/img/newspaper-solid.svg" alt="Noticias" class="menu_icon">Noticias</a></li>
                        <li><a href="../Soporte/EspinozaIvan.php"><img src="../../assets/img/tools-solid.svg" alt="Soporte" class="menu_icon">Soporte</a></li>
                        <li><a href="../Contacto/GualeEvelyn.php"><img src="../../assets/img/id-badge-solid.svg" alt="Contacto" class="menu_icon">Contacto</a></li>
                    </ul>
                </div>
            </nav>
        </section> -->
    </header>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="../../assets/img/logo-icon-text.svg" alt="ArkGames" height="50" class="d-inline-block align-text-top" />
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>


            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex justify-content-end">

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../../index.html">
                            <svg class="bi d-inline-block align-text-top mx-auto mb-1" width="24" style="color:white" height="24">
                                <use xlink:href="#home" />
                            </svg>
                            Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active text white" aria-current="page" href="../Catalogo/BasurtoEdgar.php">
                            <svg class="bi d-inline-block align-text-top mx-auto mb-1" width="24" height="24">
                                <use xlink:href="#grid" />
                            </svg>
                            Tienda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../Noticias/BernalHelen.php">
                            <svg class="bi d-inline-block align-text-top mx-auto mb-1" width="24" height="24">
                                <use xlink:href="#table" />
                            </svg>
                            Noticias</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../Soporte/EspinozaIvan.php">
                            <svg class="bi d-inline-block align-text-top mx-auto mb-1" width="24" height="24">
                                <use xlink:href="#speedometer2" />
                            </svg>
                            Soporte</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../Contacto/GualeEvelyn.php">
                            <svg class="bi d-inline-block align-text-top mx-auto mb-1" width="24" height="24">
                                <use xlink:href="#people-circle" />
                            </svg>
                            Contacto</a>
                    </li>

                    <!-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li> -->

                </ul>
                <!-- <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form> -->
            </div>
        </div>
    </nav>



    <!------------------------------------------------------------------------------------------>

    <main class="contenedor">

        <div class="bloque-izq">


            <div class="top">
                <h1 class="title">Catálogo de ArkGames</h1>
                <div>
                    <a class="btnCompra" href="frm_BasurtoEdgar.php">Confirmar compra</a>
                </div>
            </div>

<?php

require_once '../Catalogo/listar.tabla.php'

?>





        </div>
        <!-- <div class="bloque-derecha">
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
        </div> -->
    </main>

    <!-------------------------------------------------FOOTER---------------------------------------->
    <footer>
        <div class="row justify-content-center mt-0 pt-0 row-1 mb-0 px-sm-3 px-2 bg-dark">
            <div class="col-12">
                <div class="row my-0 row-1 no-gutters">
                    <div class="col-sm-3 col-auto text-center">

                        <address>Guayaquil, Ecuador </address>

                    </div>
                    <div class="col-md-3 mb-0 col-auto">
                        <p id="derechos_reserv">Derechos Reservados &copy; 2021-2022</p>
                    </div>

                    <div class="col-md-6 my-auto text-md-left text-right ">
                        <span><a href="https://twitter.com/" target="_blank">
                                <img src="../../assets/img/twitter.svg" alt="Twitter" class="footer_icon"></a></span>
                        <span><a href="https://www.facebook.com/" target="_blank">
                                <img src="../../assets/img/facebook.svg" alt="Facebook" class="footer_icon"></a></span>
                        <span><a href="https://www.linkedin.com/" target="_blank">
                                <img src="../../assets/img/linkedin.svg" alt="LinkedIn" class="footer_icon"></a></span>
                        <span><a href="https://www.pinterest.com/" target="_blank">
                                <img src="../../assets/img/pinterest.svg" alt="Pinterest" class="footer_icon"></a></span>
                        <span><a href="https://plus.google.com/" target="_blank">
                                <img src="../../assets/img/google.svg" alt="Google" class="footer_icon"></a></span>
                        <span><a href="https://www.instagram.com/" target="_blank">
                                <img src="../../assets/img/instagram.svg" alt="Instagram" class="footer_icon"></a></span>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!----------------------------------------------------------------------------------------------->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>