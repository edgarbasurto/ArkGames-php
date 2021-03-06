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
/*TABLA SUSCRIPCIÓN NOTICIAS --- HELEN BERNAL*/
DROP TABLE IF EXISTS suscripcion;
CREATE TABLE `suscripcion` (
  `id_suscripcion` int NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `temas` varchar(200) NOT NULL,
  `dispositivos` varchar(200) NOT NULL,
  `frecuencia` varchar(10) NOT NULL,
  `discord` varchar(2) NOT NULL,
  `susp_estado` int NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_suscripcion`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb3;
INSERT INTO
  suscripcion(email, temas, dispositivos, frecuencia, discord)
VALUES
  (
    'sara@gmail.com',
    'Eventos',
    'PC',
    'diario',
    'No'
  ),
  (
    'jose@gmail.com',
    'Eventos, Descuentos, Análisis',
    'PS2 - PS3 - PS4 - PS5',
    'semanal',
    'Si'
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
    'Si'
  ),
  (
    'isa@gmail.com',
    'Novedades, Descuentos',
    'XBox, Wii',
    'semanal',
    'Si'
  ),
  (
    'helen@gmail.com',
    'Eventos, Torneos',
    'PC, PS2 - PS3 - PS4 - PS5',
    'semanal',
    'Si'
  );
DROP TABLE IF EXISTS `tema`;
CREATE TABLE tema(
    id_tema int NOT NULL AUTO_INCREMENT,
    nombre_tema VARCHAR(70) NOT NULL,
    PRIMARY KEY (`id_tema`)
  ) DEFAULT CHARSET UTF8 COMMENT '';
DROP TABLE IF EXISTS `dispositivo`;
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
DROP TABLE IF EXISTS `noticia`;
CREATE TABLE `noticia` (
    `id_noticia` int NOT NULL AUTO_INCREMENT,
    `titulo_noticia` varchar(70) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
    `descripcion_noticia` varchar(350) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
    `imagen_noticia` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
    `id_tema` int NOT NULL,
    `id_dispositivo` int NOT NULL,
    `noti_estado` int NOT NULL DEFAULT '1',
    `creacion_fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id_noticia`),
    KEY `id_tema` (`id_tema`),
    KEY `id_dispositivo` (`id_dispositivo`),
    CONSTRAINT `id_dispositivo` FOREIGN KEY (`id_dispositivo`) REFERENCES `dispositivo` (`id_dispositivo`),
    CONSTRAINT `id_tema` FOREIGN KEY (`id_tema`) REFERENCES `tema` (`id_tema`)
  ) ENGINE = InnoDB AUTO_INCREMENT = 0 DEFAULT CHARSET = utf8mb3 COLLATE = utf8_spanish_ci;
INSERT INTO
  `noticia`
VALUES
  (
    1,
    'Próximos lanzamientos y últimos juegos',
    '¿Quieres saber cuáles son los próximos y últimos lanzamientos en videojuegos este año? Aquí encontrarás el calendario con las fechas de lanzamiento de todos los juegos de las diferentes plataformas actualizadas día a día.',
    '2022-03-14/noticia1.jpg',
    1,
    1,
    1,
    '2022-03-14 13:56:35'
  ),(
    2,
    'Un vistazo a las características de la versión para PS5',
    'El 4 de marzo de 2022 se pone a la venta en PS4 y PS5 Gran Turismo 7, y obviamente, la superior calidad técnica de la consola más potente permite la implementación de algunas mejoras técnicas, o el uso del mando Dualsense para la vibración y los gatillos.',
    '2022-03-14/noticia2.jpg',
    1,
    4,
    1,
    '2022-03-14 13:57:26'
  ),(
    3,
    'Disfruta de las fiestas en Fornite',
    'Desde el 16 de diciembre de 2021 a las 15:00h CET hasta el 6 de enero de 2022 a esa misma hora se celebra el evento Festival de Invierno 2021 en Fortnite Battle Royale. Tendremos nuevos desafíos y misiones que completar, además de 14 regalos gratis entre los que se incluyen dos skins.',
    '2022-03-14/noticia3.jpg',
    2,
    1,
    1,
    '2022-03-14 13:58:02'
  ),(
    4,
    'Novedades de la nueva versión de Genshin Impact',
    'Los jugadores de Genshin Impact pronto podrán desbloquear nuevos personajes y armas sin tener que usar Protogemas en los banner de gacha del juego. Según se informa, se está trabajando en un nuevo método para obtener personajes sin gacha para su lanzamiento en 2022.',
    '2022-03-14/noticia4.jpg',
    1,
    1,
    1,
    '2022-03-14 13:58:34'
  );
-- TABLA DE CATEGORIAS DE JUEGOS
  -- EDGAR BASURTO
  DROP TABLE IF EXISTS `categorias`;
CREATE TABLE `categorias` (
    `id_categoria` int NOT NULL,
    `nombre_categoria` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
    PRIMARY KEY (`id_categoria`)
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb3 COLLATE = utf8_spanish_ci;
LOCK TABLES `categorias` WRITE;
INSERT INTO
  `categorias`
VALUES
  (1, 'Acción'),
  (2, 'Arcade/aventura'),
  (3, 'Deportivo'),
  (4, 'Estrategia'),
  (5, 'Simulación'),
  (6, 'Juegos de mesa/cartas'),
  (7, 'Juegos musicales');
UNLOCK TABLES;
-- TABLA DE PRODUCTOS
  -- EDGAR BASURTO
  --
  -- Table structure for table `productos`
  --
  DROP TABLE IF EXISTS `productos`;
CREATE TABLE `productos` (
    `id_producto` int NOT NULL AUTO_INCREMENT,
    `nombre` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
    `precio` decimal(6, 2) NOT NULL,
    `url_imagen` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
    `id_categoria` int NOT NULL,
    `prod_estado` int NOT NULL,
    PRIMARY KEY (`id_producto`),
    KEY `id_categoria_idx` (`id_categoria`),
    CONSTRAINT `id_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`)
  ) ENGINE = InnoDB AUTO_INCREMENT = 33 DEFAULT CHARSET = utf8mb3 COLLATE = utf8_spanish_ci;
--
  -- data for table `productos`
  --
  LOCK TABLES `productos` WRITE;
INSERT INTO
  `productos`
VALUES
  (1, 'Hitman 3', 45.00, 'Hitman3_poster.jpg', 1, 1),
  (
    2,
    'Back 4 Blood',
    35.00,
    'Back4Blood_poster.jpg',
    3,
    1
  ),
  (
    3,
    'Deathloop',
    25.00,
    'Deathloop_poster.jpg',
    2,
    1
  ),
  (4, 'FIFA 22', 60.75, 'FIFA_22_Poster.jpg', 5, 1),
  (5, 'Fornite', 23.99, 'fornite_poster.jpg', 2, 1),
  (
    6,
    'Forza Horison',
    45.60,
    'Forza-Horizon-poster.jpg',
    7,
    1
  ),
  (
    7,
    'Guadians Galaxy',
    34.65,
    'GuardiansoftheGalaxy_poster.jpg',
    6,
    1
  ),
  (
    8,
    'Halo Infinite',
    54.23,
    'halo-infinite_poster.jpg',
    4,
    1
  ),
  (
    9,
    'It Takes 2',
    76.56,
    'ItTakesTwo_poster.jpg',
    7,
    1
  ),
  (
    10,
    'Kena Bridge',
    12.43,
    'KenaBridgeOfSpirits_poster.jpg',
    2,
    1
  ),
  (
    11,
    'Little Night',
    14.65,
    'LittleNightmares2_poster.jpg',
    5,
    1
  ),
  (
    12,
    'Psychonauts',
    27.43,
    'Psychonauts2_poster.jpg',
    4,
    1
  ),
  (
    13,
    'Resident Evil',
    102.85,
    'ResidentEvilVillage_poster.jpg',
    1,
    1
  ),
  (
    14,
    'Returnal',
    41.89,
    'returnal_poster.jpeg',
    1,
    1
  ),
  (
    15,
    'The Medium',
    63.05,
    'TheMedium_poster.jpg',
    1,
    1
  );
UNLOCK TABLES;
DROP TABLE IF EXISTS `soporte`;
  /*TABLA SOPORTE --- ESPINOZA IVAN*/
  CREATE TABLE `soporte` (
    `id_solicitud` INT(10) NOT NULL AUTO_INCREMENT,
    `usuario` VARCHAR(20) NOT NULL,
    `email` VARCHAR(30) NOT NULL,
    `telefono` VARCHAR(10) NOT NULL,
    `servicio` VARCHAR(20) NOT NULL,
    `producto` VARCHAR(20) NOT NULL,
    `descripcion_problema` VARCHAR(100) NOT NULL,
    PRIMARY KEY (`id_solicitud`)
  ) ENGINE = InnoDB;
INSERT INTO
  `soporte` (
    `id_solicitud`,
    `usuario`,
    `email`,
    `telefono`,
    `servicio`,
    `producto`,
    `descripcion_problema`
  )
VALUES
  (
    '1',
    'IvanEspiM',
    'ivanespinoza2499@gmail.com',
    '0928346534',
    'Pagos',
    'Apex Legends',
    'Videojuego no recibido luego de pago.'
  ),
  (
    '2',
    'DanielR',
    'dani98@gmail.com',
    '0928346412',
    'Cuentas',
    'Fall Guys',
    'Contrasenia perdida de cuenta en Fall Guys.'
  );
  /* TABLA USUARIOS
                                                   * -- RAFAEL LARREA
                                                   * -- @Rafael1108
                                                  */
  DROP TABLE IF EXISTS `usuarios`;
  /*!40101 SET @saved_cs_client     = @@character_set_client */;
  /*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
    `Id` bigint unsigned NOT NULL AUTO_INCREMENT,
    `IdRol` enum('0', '1', '2', '3') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tipos de Roles (0=> Invitado, 1=>Administrador, 2=>Jugador, 3=>Mantenimiento)',
    `IdServidor` int NOT NULL DEFAULT '0',
    `NickName` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
    `Email` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT '',
    `NombreCompleto` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
    `Genero` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N',
    `FechaNacimiento` timestamp NOT NULL,
    `PasswordHASH` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
    `Activo` tinyint(1) NOT NULL DEFAULT '1',
    `UsuarioActualizacion` bigint unsigned NOT NULL DEFAULT '0',
    `FechaCreacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `FechaActualizacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`Id`)
  ) ENGINE = InnoDB AUTO_INCREMENT = 5 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
  /*!40101 SET character_set_client = @saved_cs_client */;
--
  -- Dumping data for table `usuarios`
  --
  LOCK TABLES `usuarios` WRITE;
  /*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO
  `usuarios`
VALUES
  (
    1,
    '1',
    0,
    'admin',
    'administrador@dominio.com',
    'Administrador del Sitio',
    'N',
    '1990-08-11 15:00:00',
    '$2y$10$ZgQQCHJo1F7zullxUv4c9OLJXLOBDyNrXK1NkO4YLcajCqQhpK2lS',
    1,
    0,
    '2022-03-04 18:12:48',
    '2022-03-04 13:35:22'
  ),(
    2,
    '3',
    0,
    'mantener',
    'mantenimiento@dominio.com',
    'Usuario Mantenimiento',
    'N',
    '1990-08-11 05:00:00',
    '$2y$10$ZgQQCHJo1F7zullxUv4c9OLJXLOBDyNrXK1NkO4YLcajCqQhpK2lS',
    1,
    0,
    '2022-03-04 18:12:48',
    '2022-03-19 04:38:14'
  ),(
    3,
    '2',
    0,
    'erlarrea',
    'edwin.larreab@ug.edu.ec',
    'Edwin Rafael Larrea Buste',
    'M',
    '1990-08-11 15:00:00',
    '$2y$10$ZgQQCHJo1F7zullxUv4c9OLJXLOBDyNrXK1NkO4YLcajCqQhpK2lS',
    1,
    0,
    '2022-03-04 18:12:48',
    '2022-03-04 13:35:22'
  ),(
    4,
    '0',
    0,
    'acevallos',
    'acevallos@hotmm.com',
    'Marta Alenjandra Andrade Cevallos',
    'F',
    '1993-01-01 12:00:00',
    '$2y$10$ZgQQCHJo1F7zullxUv4c9OLJXLOBDyNrXK1NkO4YLcajCqQhpK2lS',
    1,
    0,
    '2022-03-04 13:34:39',
    '2022-03-04 13:36:03'
  );
  /*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `comentario`;
-- TABLA DE COMENTARIOS
  -- EVELYN GUALE
  CREATE TABLE `comentario` (
    `id_comentario` INT(10) NOT NULL AUTO_INCREMENT,
    `nombre` varchar(30) NOT NULL,
    `apellido` varchar(30) NOT NULL,
    `genero` varchar(10) NOT NULL,
    `telefono` varchar(10) NOT NULL,
    `ciudad` varchar(20) NOT NULL,
    `email` varchar(30) NOT NULL,
    `comentario` varchar(200) NOT NULL,
    PRIMARY KEY (`id_comentario`)
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb3;
INSERT INTO
  `comentario` (
    `id_comentario`,
    `nombre`,
    `apellido`,
    `genero`,
    `telefono`,
    `ciudad`,
    `email`,
    `comentario`
  )
VALUES
  (
    '1',
    'Evelyn',
    'Guale',
    'femenino',
    '044547178',
    'Guayaquil',
    'gualerEvelyn@gamil.com',
    'recomiendo que deberian tener una tendencia de juegos .'
  ),
  (
    '2',
    'Pedro',
    'Escalante',
    'masculino',
    '042663344',
    'Guayaquil',
    'escalantePed@gmail.com',
    'muy buena pagina!.'
  );
DROP TABLE IF EXISTS `vacante`;
CREATE TABLE vacante(
    id_vacante int NOT NULL AUTO_INCREMENT,
    nombre_vacante VARCHAR(50) NOT NULL,
    PRIMARY KEY (`id_vacante`)
  ) DEFAULT CHARSET UTF8 COMMENT '';
INSERT INTO
  vacante(nombre_vacante)
VALUES
  ('Ventas'),('Atencion al cliente'),('Desarrollo de Juegos'),('Soporte Tecnico'),('Administracion');
DROP TABLE IF EXISTS `empleo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `empleo` (
  `id_solictudEmpleo` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `edad` int NOT NULL,
  `telefono` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `id_vacante` int NOT NULL,
  `experiencia` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  `estado` int NOT NULL,
  PRIMARY KEY (`id_solictudEmpleo`),
  KEY `id_vacante` (`id_vacante`),
  CONSTRAINT `id_vacante` FOREIGN KEY (`id_vacante`) REFERENCES `vacante` (`id_vacante`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empleo`
--

LOCK TABLES `empleo` WRITE;
/*!40000 ALTER TABLE `empleo` DISABLE KEYS */;
INSERT INTO `empleo` VALUES (1,'Marcos','Jimenez',32,'0985703056','marcos32j@gmail.com',3,'dessarrolo de videojuegos con experiencia de mas de 3 años',1),(2,'Julian','Lopez',29,'0945373056','jlopez09j@gmail.com',2,'Cuento con 4 años de experiencia en atentencion al cliente asumiendo mis responsabilidades con la empresa ',1),(3,'EDGAR','BASURTO',45,'0994915345','ed_basurto@hotmail.com',2,'dfsgwfd',0),(4,'DAYANNA','LOPEZ',23,'0987654321','yayi@dominio.com',3,'RDGSDF',0),(5,'DANIEL','LOOR',34,'1234567890','usuario@dominio.com',3,'43asdfasd',0);
/*!40000 ALTER TABLE `empleo` ENABLE KEYS */;
UNLOCK TABLES;
  /* TABLA accesos
                                                   * -- RAFAEL LARREA
                                                   * -- @Rafael1108
                                                  */
  DROP TABLE IF EXISTS `accesos`;
CREATE TABLE `accesos` (
    `Id` varchar(50) NOT NULL DEFAULT 'UUID()',
    `IdUsuario` bigint unsigned NOT NULL,
    `FechaHoraAcceso` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `NombreNavegador` varchar(25) NOT NULL DEFAULT 'No registrado',
    `IP` varchar(17) NOT NULL DEFAULT '255.255.255.0',
    `Activo` tinyint(1) NOT NULL DEFAULT '1',
    PRIMARY KEY (`Id`),
    UNIQUE KEY `acceso_id_unique` (`Id`)
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci;
DROP TABLE IF EXISTS `orden`;
CREATE TABLE `orden` (
    `id` int NOT NULL AUTO_INCREMENT,
    `user_id` bigint unsigned NOT NULL,
    `total_price` float(10, 2) NOT NULL,
    `created` datetime NOT NULL,
    `modified` datetime NOT NULL,
    `status` enum('1', '0') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
    PRIMARY KEY (`id`),
    KEY `user_id` (`user_id`),
    CONSTRAINT `orden_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `usuarios` (`Id`) ON DELETE CASCADE
  ) ENGINE = InnoDB AUTO_INCREMENT = 9 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci;
--
  -- Table structure for table `orden_articulos`
  --
  DROP TABLE IF EXISTS `orden_articulos`;
CREATE TABLE `orden_articulos` (
    `id` int NOT NULL AUTO_INCREMENT,
    `order_id` int NOT NULL,
    `product_id` int NOT NULL,
    `quantity` int NOT NULL,
    PRIMARY KEY (`id`),
    KEY `order_id` (`order_id`),
    CONSTRAINT `orden_articulos_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orden` (`id`) ON DELETE CASCADE
  ) ENGINE = InnoDB AUTO_INCREMENT = 8 DEFAULT CHARSET = utf8mb3 COLLATE = utf8_unicode_ci;