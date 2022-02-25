CREATE DATABASE
/*!32312 IF NOT EXISTS*/
ArkgamesBD
/*2022-02-26 @Rafael1108 Corrijo nombre de BD por manejo de estandar del proyecto*/
USE ArkgamesBD;
/*TABLAS SUSCRIPCIÓN NOTICIAS --- HELEN*/
DROP TABLE IF EXISTS suscripcion;
CREATE TABLE `suscripcion` (
  `id_suscripcion` int NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `temas` varchar(200) NOT NULL,
  `dispositivos` varchar(200) NOT NULL,
  `frecuencia` varchar(10) NOT NULL,
  `discord` varchar(2) NOT NULL,
  PRIMARY KEY (`id_suscripcion`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb3;