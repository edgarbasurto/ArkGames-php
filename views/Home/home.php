<?php require_once VIEW_PATH . 'Templates/HeadBootstrap.php' ?>

<meta name="description" content="ArkGames" />
<meta name="keywords" content="videojuegos,catalogo,juegos" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="author" content="erlarrea" />
<link rel="stylesheet" href="assets/css/home.css" />
<!-- <link rel="stylesheet" href="assets/css/master.css" />
<link rel="stylesheet" href="assets/css/LarreaRafael.css" /> -->
<title>Ark Games</title>

</head>

<body id="bodyTemp">
	<?php require_once VIEW_PATH . 'Templates/navBarBootstrap.php' ?>
	<div class="barraflotante" onmouseover="show_popup()">
		<span class="popupText" id="autopopup">Juega Ya!</span>
		<a href="index.php?c=Session"><img src="assets/img/joystick.svg" style="width:45px; height:45px;" alt="LogIn">
			<h5>Log In</h5>
		</a>
	</div>

	<header>
		<div id="slider" class="carousel slide" data-bs-ride="carousel">
			<div class="carousel-indicators">
				<button type="button" data-bs-target="#slider" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
				<button type="button" data-bs-target="#slider" data-bs-slide-to="1" aria-label="Slide 2"><i class="fab fa-android"></i></button>
				<button type="button" data-bs-target="#slider" data-bs-slide-to="2" aria-label="Slide 3"></button>
				<button type="button" data-bs-target="#slider" data-bs-slide-to="3" aria-label="Slide 4"></button>
				<button type="button" data-bs-target="#slider" data-bs-slide-to="4" aria-label="Slide 5"></button>
			</div>
			<div class="carousel-inner">
				<div class="carousel-item active" data-bs-interval="4000">
					<img src="assets/img/carrogaleria/fortnite1920x500.png" alt="fortnite">
				</div>
				<div class="carousel-item" data-bs-interval="4000">
					<img src="assets/img/carrogaleria/dota1920x500.png" alt="dota">
				</div>
				<div class="carousel-item" data-bs-interval="4000">
					<img src="assets/img/carrogaleria/banner1920x500.png" alt="baner">
				</div>
				<div class="carousel-item" data-bs-interval="4000">
					<img src="assets/img/carrogaleria/genshin1920x500.png" alt="genshin">
				</div>
				<div class="carousel-item" data-bs-interval="4000">
					<img src="assets/img/carrogaleria/rocket1920x500.png" alt="rocket">
				</div>
			</div>
			<button class="carousel-control-prev" type="button" data-bs-target="#slider" data-bs-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="visually-hidden">Anterior</span>
			</button>
			<button class="carousel-control-next" type="button" data-bs-target="#slider" data-bs-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="visually-hidden">Siguiente</span>
			</button>
		</div>
	</header>
	<section class="row row-cols-1 row-cols-md-2 g-2" id="sec_galeria">
		<!--  Contenido generado dinamicamente      -->

	</section>
	<section class="px-5">
		<?php foreach ($noticias as $noticia) { ?>
			<div class="row gx-5 m-2 rounded" style=" background-color: rgba(255, 255, 255, 0.781);">
				<div class="col-md-6 mb-4 py-5">
					<div class="bg-image hover-overlay ripple shadow-2-strong rounded-5" data-mdb-ripple-color="light">
						<img src="assets/img/noticias/<?php echo $noticia->url_imagen; ?>" class="img-fluid" />
					</div>
				</div>

				<div class="col-md-6 mb-4 py-5">
					<span class="badge bg-danger px-2 py-1 shadow-1-strong mb-3"><?php echo $noticia->tema->nombre_tema; ?></span>
					<h4><strong><?php echo $noticia->titulo; ?></strong></h4>
					<p class="text-muted">
						<?php echo $noticia->descripcion; ?>
					</p>
					<a href="index.php?c=noticias" class="btn btn-primary">Leer más!</a>
				</div>
			</div>
		<?php } ?>

	</section>

	<section class="px-5 align-middle text-center">
		<iframe class="video" src="https://www.youtube.com/embed/rH634tJuwOw?start=5" title="Assiants - Muy Pronto" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
		<iframe class="video" src="https://www.youtube.com/embed/zdVk4hHQTn0?start=15" title="Call of Duty - Muy Pronto" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
		<iframe class="video" src="https://www.youtube.com/embed/eS-ZrijCiPk?start=25" title="Battlefield" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
	</section>

	<script language="javascript" type="text/javascript">
		function show_popup() {
			var popup = document.getElementById("autopopup");
			popup.classList.toggle("showpopup");
		}

		"use strict";

		var catalogo_Intervalos, catalogo_TiempoIntervalo = 3000;

		function iniciar() {
			catalogo_Disparador();
			catalogo_Timer();
		};

		function randmon(limite) {
			return Math.floor(Math.random() * limite);
		}

		function removeAllChildNodes(parent) {
			while (parent.firstChild) {
				parent.removeChild(parent.firstChild);
			}
		}

		/***Inicio código control catalogo dinámico ***/
		class Catalogo {
			#nombre;
			#precio;
			#img_uri;
			constructor(id, nombre, img_uri, precio) {
				this.id = id;
				this.#nombre = nombre;
				this.#precio = precio;
				this.#img_uri = img_uri;
			}

			getSeccion() {
				const div_col = document.createElement("div");
				div_col.className = "col mx-3";
				div_col.style.width = "14rem";
				div_col.id = "store" + this.id;
				// div_col.innerHTML = ' <div class="card h-100 text-center"><img   style="margin:1% width: 12rem;  height: 18rem;" src="data:image/jpg;base64,' + this.#img_uri + '" class="card-img-top" alt="' + this.#nombre + '"><div class="card-body "><h5 class="card-title fw-bold">' + this.#nombre + '</h5><h4 class="text-primary fw-bold"> $ ' + this.#precio + '</h4><div> <a href="index.php?c=productos&a=show&id=' + this.id + '" class="btn btn-success mx-1"><i class="fas fa-eye"></i> </a><a href="index.php?c=productos&a=car&id=' + this.id + '" class="btn btn-primary"><i class="fa-solid fa-cart-shopping"></i></a></div></div></div>';
				div_col.innerHTML = ' <div class="card h-100 text-center"><img   style="margin:1% width: 12rem;  height: 18rem;" src="' + this.#img_uri + '" class="card-img-top" alt="' + this.#nombre + '"><div class="card-body "><h5 class="card-title fw-bold">' + this.#nombre + '</h5><h4 class="text-primary fw-bold"> $ ' + this.#precio + '</h4><div> <a href="index.php?c=productos&a=show&id=' + this.id + '" class="btn btn-success mx-1"><i class="fas fa-eye"></i> </a><a href="index.php?c=productos&a=car&id=' + this.id + '" class="btn btn-primary"><i class="fa-solid fa-cart-shopping"></i></a></div></div></div>';
				return div_col;
			}
		}

		var libCatalogo = new Array(
			<?php

			foreach ($catalogo as $pro) {

				$strprecio = number_format($pro->precio, 2);
				// echo 'new Catalogo(' . $pro->id_producto . ',"' . $pro->nombre  . '","' . base64_encode($pro->url_imagen) . '","' . $strprecio . '" ),';

				echo 'new Catalogo(' . $pro->id_producto . ',"' . $pro->nombre  . '","assets/img/posters/' .   $pro->url_imagen . '","' . $strprecio . '" ),';
			}
			?>
		);

		var arrayCatalogoActual = catalogo_inicializar(5);

		function catalogo_inicializar(tamano) {
			let retorno = new Array(tamano);
			for (let i = 0; i < tamano; i++) {
				retorno[i] = libCatalogo[i];
			}
			return retorno;
		};

		function catalogo_ValidarRepetido(idRegistro) {
			var valorEncontrado = arrayCatalogoActual.find(function(_catalogo) {
				return _catalogo.id === idRegistro;
			});
			return valorEncontrado;
		}

		function catalogo_GetRandom() {
			let tmp = randmon(14);
			var valorEncontrado = libCatalogo.find(function(_catalogo) {
				return _catalogo.id == tmp;
			});
			return valorEncontrado;
		}

		function catalogo_Cambiar() {
			let index_PanelCambiar = randmon(5);

			let objCambiar = catalogo_GetRandom();
			while (catalogo_ValidarRepetido(objCambiar.id)) {
				objCambiar = catalogo_GetRandom();
			}
			arrayCatalogoActual[index_PanelCambiar] = objCambiar;

			catalogo_Disparador();
		}

		function catalogo_Timer() {
			clearInterval(catalogo_Intervalos);
			catalogo_Intervalos = setInterval(() => {
				catalogo_Cambiar();
			}, catalogo_TiempoIntervalo);
		}

		function catalogo_Disparador() {
			let secgaleria = document.getElementById('sec_galeria');
			removeAllChildNodes(secgaleria);
			const fragment = document.createDocumentFragment();

			arrayCatalogoActual.forEach(item => {
				fragment.appendChild(item.getSeccion());
			});

			secgaleria.appendChild(fragment);
		}

		/***Fin código control catalogo dinámico ***/

		iniciar();
	</script>
	<?php
	require_once VIEW_PATH . 'Templates/footerBootstrap.php'
	?>
</body>

</html>