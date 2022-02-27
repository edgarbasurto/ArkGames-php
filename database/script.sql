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
  `temas` varchar(200) NOT NULL,
  `dispositivos` varchar(200) NOT NULL,
  `frecuencia` varchar(10) NOT NULL,
  `discord` varchar(10) NOT NULL,
  PRIMARY KEY (`id_suscripcion`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb3;
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