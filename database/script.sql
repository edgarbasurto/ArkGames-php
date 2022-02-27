/*!40101 SET NAMES utf8 */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET SQL_NOTES=0 */;
CREATE DATABASE
/*!32312 IF NOT EXISTS*/
/*2022-02-26 @Rafael1108 Corrijo nombre de BD por manejo de estandar del proyecto*/
ArkgamesBD
/*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE ArkgamesBD;
/*TABLAS SUSCRIPCIÓN NOTICIAS --- HELEN*/
DROP TABLE IF EXISTS suscripcion;
CREATE TABLE `suscripcion` (
  `id_suscripcion` int NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `temas` varchar(200) NOT NULL,
  `dispositivos` varchar(200) NOT NULL,
  `frecuencia` varchar(10) NOT NULL,
  `discord` varchar(10) NOT NULL,
  PRIMARY KEY (`id_suscripcion`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb3;
<<<<<<< HEAD
INSERT INTO
  suscripcion(email, temas, dispositivos, frecuencia, discord)
VALUES
  ('sara@gmail.com', 'Eventos', 'PC', 'diario', 'No'),
  (
    'jose@gmail.com',
    'Eventos, Descuentos, Análisis',
    'PS2 - PS3 - PS4 - PS5',
    'semanal',
    'S&iacute;'
  ),
  (
    'julieta@gmail.com',
    'Torneos, Trucos',
    'XBox, Wii',
    'semanal',
    'No'
  ),
  (
    'yuya@hotmail.com',
    'Eventos, Descuentos, Torneos',
    'PC, XBox, Android',
    'diario',
    'S&iacute;'
  ),
  (
    'isa@gmail.com',
    'Novedades, Descuentos',
    'XBox, Wii',
    'semanal',
    'S&iacute;'
  ),
  (
    'helen@gmail.com',
    'Eventos, Torneos',
    'PC, PS2 - PS3 - PS4 - PS5',
    'semanal',
    'S&iacute;'
  );
=======


-- TABLA DE CATEGORIAS DE JUEGOS 
-- EDGAR BASURTO

DROP TABLE IF EXISTS `categorias`;

CREATE TABLE `categorias` (
  `id_categoria` int NOT NULL,
  `nombre_categoria` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;


LOCK TABLES `categorias` WRITE;

INSERT INTO `categorias` VALUES (1,'Acción'),(2,'Arcade/aventura'),(3,'Deportivo'),(4,'Estrategia'),(5,'Simulación'),(6,'Juegos de mesa/cartas'),(7,'Juegos musicales');

UNLOCK TABLES;


-- TABLA DE PRODUCTOS
-- EDGAR BASURTO

DROP TABLE IF EXISTS `productos`;

CREATE TABLE `productos` (
  `id_producto` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `precio` decimal(6,2) NOT NULL,
  `url_imagen` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `id_categoria` int NOT NULL,
  `prod_estado` int NOT NULL,
  PRIMARY KEY (`id_producto`),
  KEY `id_categoria_idx` (`id_categoria`),
  CONSTRAINT `id_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;

LOCK TABLES `productos` WRITE;

INSERT INTO `productos` VALUES (1,'Hitman 3',30.00,'../../assets/img/posters/Hitman3_poster.jpg',1,1),(2,'Back 4 Blood',35.00,'../../assets/img/posters/Back4Blood_poster.jpg',3,1),(3,'Deathloop',25.00,'../../assets/img/posters/Deathloop_poster.jpg',2,1),(4,'FIFA 22',60.75,'../../assets/img/posters/FIFA_22_Poster.jpg',5,1),(5,'Fornite',23.99,'../../assets/img/posters/fornite_poster.jpg',2,1),(6,'Forza Horison',45.60,'../../assets/img/posters/Forza-Horizon-poster.jpg',7,1),(7,'Guadians Galaxy',34.65,'../../assets/img/posters/GuardiansoftheGalaxy_poster.jpg',6,1),(8,'Halo Infinite',54.23,'../../assets/img/posters/halo-infinite_poster.jpg',4,1),(9,'It Takes 2',76.56,'../../assets/img/posters/ItTakesTwo_poster.jpg',7,1),(10,'Kena Bridge',12.43,'../../assets/img/posters/KenaBridgeOfSpirits_poster.jpg',2,1),(11,'Little Night',14.65,'../../assets/img/posters/LittleNightmares2_poster.jpg',5,1),(12,'Psychonauts',27.43,'../../assets/img/posters/Psychonauts2_poster.jpg',4,1),(13,'Resident Evil',102.85,'../../assets/img/posters/ResidentEvilVillage_poster.jpg',1,1),(14,'Returnal',41.89,'../../assets/img/posters/returnal_poster.jpeg',1,1),(15,'The Medium',63.05,'../../assets/img/posters/TheMedium_poster.jpg',1,1);

UNLOCK TABLES;
>>>>>>> c82d8e32a1cfd2cbe7ec9ca194cfe67c0a8fa02b
