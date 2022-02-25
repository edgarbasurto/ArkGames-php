/*!40101 SET NAMES utf8 */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET SQL_NOTES=0 */;
CREATE DATABASE
/*!32312 IF NOT EXISTS*/
arkgamesbd
/*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE arkgamesbd;
/*TABLAS SUSCRIPCIÓN NOTICIAS --- HELEN*/
DROP TABLE IF EXISTS suscripcion;
CREATE TABLE `suscripcion` (
  `id_suscripcion` int NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `id_tema` int NOT NULL,
  `id_dispositivo` int NOT NULL,
  `frecuencia` varchar(10) NOT NULL,
  `discord` varchar(2) NOT NULL,
  PRIMARY KEY (`id_suscripcion`),
  KEY `id_tema` (`id_tema`),
  KEY `id_dispositivo` (`id_dispositivo`),
  CONSTRAINT `suscripcion_ibfk_1` FOREIGN KEY (`id_tema`) REFERENCES `tema` (`id_tema`),
  CONSTRAINT `suscripcion_ibfk_2` FOREIGN KEY (`id_dispositivo`) REFERENCES `dispositivo` (`id_dispositivo`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb3;
DROP TABLE IF EXISTS tema;
CREATE TABLE `tema` (
  `id_tema` int NOT NULL AUTO_INCREMENT,
  `nombre_tema` varchar(50) NOT NULL,
  PRIMARY KEY (`id_tema`)
) ENGINE = InnoDB AUTO_INCREMENT = 7 DEFAULT CHARSET = utf8mb3;
DROP TABLE IF EXISTS dispositivo;
CREATE TABLE `dispositivo` (
  `id_dispositivo` int NOT NULL AUTO_INCREMENT,
  `nombre_dispositivo` varchar(50) NOT NULL,
  PRIMARY KEY (`id_dispositivo`)
) ENGINE = InnoDB AUTO_INCREMENT = 6 DEFAULT CHARSET = utf8mb3;
DROP TABLE IF EXISTS suscripcion_tema;
CREATE TABLE `suscripcion_tema` (
  `id_susc_tema` int NOT NULL AUTO_INCREMENT,
  `id_suscripcion` int NOT NULL,
  `id_tema` int NOT NULL,
  PRIMARY KEY (`id_susc_tema`),
  CONSTRAINT `susc_tema_ibfk_1` FOREIGN KEY (`id_suscripcion`) REFERENCES `suscripcion` (`id_suscripcion`),
  CONSTRAINT `susc_tema_ibfk_2` FOREIGN KEY (`id_tema`) REFERENCES `tema` (`id_tema`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb3;
DROP TABLE IF EXISTS suscripcion_disp;
CREATE TABLE `suscripcion_disp` (
  `id_susc_disp` int NOT NULL AUTO_INCREMENT,
  `id_suscripcion` int NOT NULL,
  `id_dispositivo` int NOT NULL,
  PRIMARY KEY (`id_susc_tema`),
  CONSTRAINT `susc_tema_ibfk_1` FOREIGN KEY (`id_suscripcion`) REFERENCES `suscripcion` (`id_suscripcion`),
  CONSTRAINT `susc_tema_ibfk_2` FOREIGN KEY (`id_dispositivo`) REFERENCES `dispositivo` (`id_dispositivo`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb3;
INSERT INTO
  tema(id_tema, nombre_tema)
VALUES(1, 'Novedades'),(2, 'Eventos'),(3, 'Descuentos'),(4, 'Torneos'),(5, 'Análisis'),(6, 'Trucos');
INSERT INTO
  dispositivo(id_dispositivo, nombre_dispositivo)
VALUES(1, 'PC'),(2, 'PS2 - PS3 - PS4 - PS5'),(3, 'XBox'),(4, 'Wii'),(5, 'Android');
INSERT INTO
  tema(id_tema, nombre_tema)
VALUES(1, 'Novedades'),(2, 'Eventos'),(3, 'Descuentos'),(4, 'Torneos'),(5, 'Análisis'),(6, 'Trucos');