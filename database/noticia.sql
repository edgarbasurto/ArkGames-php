DROP TABLE IF EXISTS `noticia`;
CREATE TABLE noticia(
  id_noticia int NOT NULL AUTO_INCREMENT,
  titulo_noticia VARCHAR(70) NOT NULL,
  descripcion_noticia VARCHAR(350) NOT NULL,
  imagen_noticia longblob NOT NULL,
  id_tema int NOT NULL,
  id_dispositivo int NOT NULL,
  noti_estado int NOT NULL DEFAULT 1,
  creacion_fecha DATETIME NOT NULL,
  PRIMARY KEY (`id_noticia`),
  CONSTRAINT `id_tema` FOREIGN KEY (`id_tema`) REFERENCES `tema` (`id_tema`),
  CONSTRAINT `id_dispositivo` FOREIGN KEY (`id_dispositivo`) REFERENCES `dispositivo` (`id_dispositivo`)
) DEFAULT CHARSET UTF8 COMMENT '';
CREATE TABLE tema(
  id_tema int NOT NULL AUTO_INCREMENT,
  nombre_tema VARCHAR(70) NOT NULL,
  PRIMARY KEY (`id_tema`)
) DEFAULT CHARSET UTF8 COMMENT '';
CREATE TABLE dispositivo(
  id_dispositivo int NOT NULL AUTO_INCREMENT,
  nombre_dispositivo VARCHAR(70) NOT NULL,
  PRIMARY KEY (`id_dispositivo`)
) DEFAULT CHARSET UTF8 COMMENT '';
INSERT INTO
  tema(nombre_tema)
VALUES
  ('Novedades'),('Eventos'),('Descuentos'),('Torneos'),('Análisis'),('Trucos');
INSERT INTO
  dispositivo(nombre_dispositivo)
VALUES
  ('PC'),('PS3'),('PS4'),('PS5'),('Xbox'),('Wii'),('Android');