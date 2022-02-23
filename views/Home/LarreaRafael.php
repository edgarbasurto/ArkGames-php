<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8" />
	<meta name="description" content="ArkGames" />
	<meta name="keywords" content="videojuegos,catalogo,juegos" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="erlarrea" />
	<link rel="stylesheet" href="../../assets/css/master.css" />
	<link rel="stylesheet" href="../../assets/css/LarreaRafael.css" />
	<link rel="icon" href="../../assets/img/logo.svg">
	<title>ArkGames</title>
	<style>
		main {
			width: 1343px;
			position: absolute;
		}
	</style>
</head>
<!-------------------------------------------------MENU---------------------------------------->
<?php
include_once '../Templates/navBar.php'
?>
<!------------------------------------------------------------------------------------------>

<div class="main">
	<div class="barraflotante" onmouseover="show_popup()">
		<span class="popupText" id="autopopup">Juega Ya!</span>
		<a href="frm_LarreaRafael.php"><img src="../../assets/img/joystick.svg" style="width:45px; height:45px;" alt="LogIn">
			<h4>Log In</h4>
		</a>
	</div>
	<div class="div_slider">
		<ul class="slider">
			<li id="slide1"><img src="../../assets/img/carrogaleria/fortnite1920x500.png" alt="bnn1"></li>
			<li id="slide2"><img src="../../assets/img/carrogaleria/dota1920x500.png" alt="bnn1"></li>
			<li id="slide3"><img src="../../assets/img/carrogaleria/banner1920x500.png" alt="bnn1"></li>
			<li id="slide4"><img src="../../assets/img/carrogaleria/genshin1920x500.png" alt="bnn1"></li>
			<li id="slide5"><img src="../../assets/img/carrogaleria/rocket1920x500.png" alt="bnn1"></li>
		</ul>
	</div>
	<!-- Seccion Galeria -->
	<section class="seccion_index" id="sec_galeria">
		<!--  Contenido generado dinamicamente      -->
	</section>
	<!-- Lanzamientos -->

	<section class="seccion_index" id="sec_lanzamientos">
		<article class="lanzamientos_contenido">

			<blockquote class="left_news" cite="/BernalHelen.php">
				<h2>Un vistazo a las características de la versión para PS5</h2>


				<p>El 4 de marzo de 2022 se pone a la venta en PS4 y PS5 Gran Turismo 7, y obviamente, la superior calidad técnica de la consola más potente permite la implementación de algunas mejoras técnicas, o el uso del mando Dualsense para la vibración y los gatillos</p>
				<a class="myurl" href="/BernalHelen.php" target="_blank">Leer más!</a>

			</blockquote>
			<aside class="right_news">
				<img src="../../assets/img/noticia2.jpg" alt="" />
			</aside>
		</article>
		<article class="lanzamientos_contenido">

			<blockquote class="left_news" cite="https://www.ubisoft.com/en-us/game/assassins-creed/valhalla">
				<h2>Assassin's Creed Unity</h2>
				<h3>CONSTRUYE TU PROPIO LEYENDA VIKINGA</h3>
				<p>Conviértete en Eivor, un poderoso asaltante vikingo y lleva a tu clan desde las duras costas de Noruega a un nuevo hogar en medio de las exuberantes tierras de cultivo de la Inglaterra del siglo IX. Explora un hermoso y misterioso mundo abierto donde te enfrentarás a enemigos brutales, asaltarás fortalezas, construirás el nuevo asentamiento de tu clan y forjarás alianzas para ganar la gloria y ganar un lugar en Valhalla.</p>
				<a class="myurl" href="https://www.ubisoft.com/en-us/game/assassins-creed/valhalla" target="_blank">Sitio Oficial!</a>

			</blockquote>
			<aside class="right_news">
				<img src="../../assets/img/assasins_news.PNG" alt="" />
			</aside>
		</article>

	</section>
	<section class="seccion_index" id="sec_video">
		<iframe class="video" src="https://www.youtube.com/embed/rH634tJuwOw?start=5" title="Assiants - Muy Pronto" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
		<iframe class="video" src="https://www.youtube.com/embed/zdVk4hHQTn0?start=15" title="Call of Duty - Muy Pronto" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
		<iframe class="video" src="https://www.youtube.com/embed/eS-ZrijCiPk?start=25" title="Battlefield" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
	</section>

</div>
<!-------------------------------------------------FOOTER---------------------------------------->
<?php
include_once '../Templates/footer.php'
?>
<!----------------------------------------------------------------------------------------------->
<script language="javascript" type="text/javascript" src="../../assets/js/LarreaRafael.js"></script>
<script language="javascript" type="text/javascript">
	function show_popup() {
		var popup = document.getElementById("autopopup");
		popup.classList.toggle("showpopup");
	}
</script>
</body>

</html>