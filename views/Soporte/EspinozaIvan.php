<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="description" content="Soporte" />
    <meta name="keywords" content="videojuegos,catalogo,juegos" />
    <link rel="stylesheet" href="../../assets/css/master.css" />
    <link rel="shortcut icon" href="../../assets/img/logo.svg">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" />
    <title>Soporte - ArkGames</title>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Source+Sans+3&display=swap");

        * {
            font-family: "Source Sans 3", sans-serif;
            text-decoration: none;
            list-style: none;
            margin: 0px;
            padding: 0px;
            outline: none;
            height: auto;
            min-width: 0px;
        }

        header {
            width: 100%;
            display: table;
            background-color: #1c1c1c;
            position: fixed;
            left: 0;
            top: 0;
            z-index: 100;
        }

        iframe {
            border-width: 0px;
        }

        /* Fuente general en el body*/
        body {
            margin: 100px 0px 0px 0px;
            padding: 0px;
            /*font-family: 'Open Sans', sans-serif;*/
            background-color: rgb(104, 99, 99);
            background-image: url("../../assets/img/fondo_Arkgames.svg")
        }

        section {
            width: 100%;
            max-width: 1343px;
            margin: 0px auto;
            display: table;
            position: relative;
        }

        /*Estilo del Logo */
        #logo_page {
            float: left;
            font-size: 24px;
            text-transform: uppercase;
            padding: 12px 0px;
            height: 85px;
            /* [disabled]width: 0vmax; */
        }

        /* Menú Cabecera*/
        nav {
            width: auto;
            float: right;
        }

        nav ul {
            display: table;
            float: right;
        }

        nav ul li {
            float: left;
            margin: 10px 0;
        }

        nav ul li a {
            color: #e7e7e7;
            font-size: 18px;
            padding: 20px 10px;
            margin: 0 10px;
            display: inline-block;
            transition: all 0.5s ease 0s;
        }

        nav ul li a:hover {
            background-color: #945aaf;
            color: white;
            border-radius: 10px;
            transition: all 0.5s ease 0s;
        }

        nav ul li a:hover img {
            color: white;
            transition: all 0.5s ease 0s;
        }

        nav ul li a img {
            padding-right: 10px;
            color: #ffffff;
            transition: all 0.5s ease 0s;
        }

        /*******************************************/

        /* Iconos SVG */
        .menu_icon {
            filter: invert(80%);
            padding-right: 2px;
            height: 20px;
        }

        .footer_icon {
            filter: invert(80%);
            padding: 20px;
            height: 30px;
            padding: 6px;
        }

        /*******************************************/

        /*Footer*/
        footer {
            display: table;
            background-color: #1c1c1c;
            color: white;
            padding-bottom: 10px;
            width: 100%;
        }

        .footer_social {
            display: table;
            margin-top: 5px;
            margin-bottom: 5px;
            margin-left: auto;
            margin-right: auto;
        }

        .footer_social li {
            float: left;
            /*width: 50px;
              height: 50px;*/
            padding: 0px 10px;
        }

        .footer_social li a {
            transition: all 0.5s ease 0s;
            display: table;
            /*width: 40px;
              height: 40px;*/
        }

        .footer_social li a:hover {
            background-color: #1d1d1d;
            border-radius: 3px;
            transition: all 0.5s ease 0s;
        }

        address {
            text-align: center;
        }

        #derechos_reserv {
            text-align: center;
            font-style: italic;
        }

        .contenedor {
            margin-top: 50px;
            float: left;
            width: 70%;
            margin-left: 5%;
        }

        h1 {
            color: white;
            font-weight: bolder;
            font-size: 38px;
        }

        h2 {
            color: black;
            font-weight: bolder;
            font-size: 26px;
        }

        h3 {
            color: black;
            font-weight: bolder;
            font-size: 26px;
            margin-left: 15px;
        }

        .p {
            text-align: center;
            width: 30%;
            height: 140px;
            border: solid 2px lightblue;
            margin-right: 20px;
            float: left;
            padding: 20px;
            margin-bottom: 10px
        }

        .aside {
            float: left;
            width: 20%;
            height: 470px;
            margin-left: 40px;
            margin-top: 120px;
            padding: 50px;
            padding-bottom: 170px;
            border-radius: 20px;
            box-shadow: 0px 10px 10px -6px black;
            background-color: white;
        }

        .bloque_ayuda {
            float: left;
            width: 20%;
            height: 200px;
            margin-left: 40px;
            margin-top: 50px;
            padding: 50px;
            padding-bottom: 170px;
            border-radius: 20px;
            box-shadow: 0px 10px 10px -6px black;
            background-color: white;
        }

        article {
            background: white;
            float: left;
            min-height: 500px;
            padding: 20px;
            text-align: justify;
            width: 93%;
        }

        .busqueda {
            width: 70%;
            margin: 4%;
            padding: 2%;
            border-radius: 20px;
            background-color: #1C1C1C;
            color: white;
        }

        .barra {
            padding-top: 20px;
            margin-bottom: 10px;
        }

        .campo_busqueda {
            padding: 15px 320px;
        }
    </style>
</head>

<body>
    <!-------------------------------------------------MENU---------------------------------------->
    <?php
    include_once '../Templates/navBar.php'
    ?>
    <!------------------------------------------------------------------------------------------>
    <div id=contenedor>
        <section class="contenedor">
            <h1>Bienvenido al centro de Soporte técnico de ArkGames</h1>
            <div class="barra">
                <input type="search" class="campo_busqueda" placeholder="BUSCAR" aria-label="BUSCAR">
            </div>
            <section>
                <article>
                    <h2>Preguntas frecuentes</h2>
                    <div class="row">
                        <div class="p col-3">
                            ¿Qué es la autenticación de dos factores y cómo se activa?<br>
                            <a onmouseover="style.color='red'" onmouseout="style.color='#0d6efd'" href="#"><b>Leer más &rarr;</b></a>
                        </div>

                        <div class="p col-3">
                            <a>Cambiar correo electrónico de tu cuenta de Ark Games</a><br>
                            <a onmouseover="style.color='red'" onmouseout="style.color='#0d6efd'" href="#"><b>Leer más &rarr;</b></a>
                        </div>

                        <div class="p col-3">
                            <a>¿Cómo corregir errores y problemas técnicos de Fortnite?</a><br>
                            <a onmouseover="style.color='red'" onmouseout="style.color='#0d6efd'" href="#"><b>Leer más &rarr;</b></a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="p col-3">
                            <a>¿Cómo vinculo una cuenta de consola a mi cuenta de Ark Games?</a><br>
                            <a onmouseover="style.color='red'" onmouseout="style.color='#0d6efd'" href="#"><b>Leer más &rarr;</b></a>
                        </div>

                        <div class="p col-3">
                            <a>Resolución de problemas del iniciador de Ark Games</a><br>
                            <a onmouseover="style.color='red'" onmouseout="style.color='#0d6efd'" href="#"><b>Leer más &rarr;</b></a>
                        </div>

                        <div class="p col-3">
                            <a>¿Cómo cambiar tu nombre en pantalla de Ark Games?</a><br>
                            <a onmouseover="style.color='red'" onmouseout="style.color='#0d6efd'" href="#"><b>Leer más &rarr;</b></a>
                        </div>
                    </div>

                    <h2>¿Con qué producto podemos ayudarlo?</h2>
                    <div class="row">
                        <div class="col-md-6">
                            <img onmouseover="cambioImg(this)" onmouseout="normalImg(this)" style="margin-bottom: 10px;width:380px;height:200px;border: solid 2px black;" src="../../assets/img/fortnite.jpg" alt="fortnite" />
                        </div>
                        <div class="col-md-6">
                            <img onmouseover="cambioImg(this)" onmouseout="normalImg(this)" style="margin-bottom: 10px;width:380px;height:200px;border: solid 2px black;" src="../../assets/img/genshin.jpg" alt="genshin" />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <img onmouseover="cambioImg(this)" onmouseout="normalImg(this)" style="margin-bottom: 10px;width:380px;height:200px;border: solid 2px black;" src="../../assets/img/rocket.jpg" alt="rocket" />
                        </div>
                        <div class="col-md-6">
                            <img onmouseover="cambioImg(this)" onmouseout="normalImg(this)" style="margin-bottom: 10px;width:380px;height:200px;border: solid 2px black;" src="../../assets/img/fall.jpeg" alt="fall" />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <img onmouseover="cambioImg2(this)" onmouseout="normalImg2(this)" style="width:785px;height:330px;border: solid 2px black;" src="../../assets/img/apex.jpg" alt="apex" />
                        </div>
                    </div>
                </article>
            </section>
        </section>

        <div class="aside">
            <h3>Ayuda</h3>
            <ul id="categorias">
                <li><a href="#">Cuentas</a></li>
                <li><a href="#">Pagos</a></li>
                <li><a href="#">Ark Games Store</a></li>
                <li><a href="#">Técnico</a></li>
                <li><a href="#">Comunidad</a></li>
                <li><a href="#">Cliente Ark Games</a></li>
                <li><a href="#">Intecambios</a></li>
                <li><a href="#">Hardware</a></li>
                <li><a href="#">Software</a></li>
            </ul>
        </div>

        <div class="bloque_ayuda">
            <h3>¿No puedes encontrar lo que buscas?</h3>
            <ul id="ayuda">
                <li><a href="frmSoporte_EspinozaIvan.php">Obtén ayuda personalizada</a></li>
            </ul>
        </div>
    </div>
    <!-------------------------------------------------FOOTER---------------------------------------->
    <?php
    include_once '../Templates/footer.php'
    ?>
    <!----------------------------------------------------------------------------------------------->
    <script type="text/javascript" src="../../assets/js/EspinozaIvan.js"> </script>
</body>

</html>