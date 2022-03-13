<?php require_once VIEW_PATH . 'Templates/HeadBootstrap.php' ?>

<meta name="description" content="ArkGames" />
<meta name="keywords" content="videojuegos,catalogo,juegos" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="author" content="erlarrea" />
<!-- <link rel="stylesheet" href="assets/css/master.css" />
<link rel="stylesheet" href="assets/css/LarreaRafael.css" /> -->
<title>Ark Games</title>

</head>

<body id="bodyTemp">
	<?php require_once VIEW_PATH . 'Templates/navBarBootstrap.php' ?>

	<header>
		<div id="slider" class="carousel slide" data-bs-ride="carousel">
			<div class="carousel-indicators">
				<button type="button" data-bs-target="#slider" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
				<button type="button" data-bs-target="#slider" data-bs-slide-to="1" aria-label="Slide 2"></button>
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
	<div class="main">

	</div>
	<?php
	require_once VIEW_PATH . 'Templates/footerBootstrap.php'
	?>
</body>

</html>