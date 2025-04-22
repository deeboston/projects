-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.25-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.2.0.6576
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para mi_formulario_db
CREATE DATABASE IF NOT EXISTS `mi_formulario_db` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `mi_formulario_db`;

-- Volcando estructura para tabla mi_formulario_db.formulario
CREATE TABLE IF NOT EXISTS `formulario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `mensaje` text DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `usuario` varchar(100) NOT NULL,
  `contraseña` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuario` (`usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla mi_formulario_db.formulario: ~12 rows (aproximadamente)
INSERT INTO `formulario` (`id`, `nombre`, `correo`, `mensaje`, `fecha`, `usuario`, `contraseña`) VALUES
	(1, 'Dandre', 'dandreboston707@gmail.com', 'bye', '2025-02-20 00:12:29', 'dandre', '$2y$10$oP0X7iZudqJ2Q31mX3TaO.Vavc4FlbmleJ3.7U6VIe3B6vbP8HJKq'),
	(3, 'david', 'david707@gmail.com', 'hello', '2025-02-20 00:15:40', 'david101', '$2y$10$BBJAgOCvAuDZ8cIMtmTxnunDM5Llt/4eVV4Rocm9Vr7etmJ3x/lUK'),
	(4, 'kate', 'kate@gmail.com', '123\r\n', '2025-02-20 00:40:51', 'kate123', '$2y$10$stz09J6WzpqCMEJnnflvu.cqxJTij5gg7o4k1EOSeyNEz2r1LR.ci'),
	(5, 'angie', 'angie@gmail.com', NULL, '2025-03-05 23:27:23', 'angie1', '$2y$10$pHpkHvta9SWMwgG2QAH9Wu7c5CUaATqfnEiwzKVabyHOGEwNx/VPW'),
	(6, 'maria', 'maria@gmail.com', NULL, '2025-03-05 23:58:43', 'maria', '$2y$10$zxWzh/unzaNrZrpFSxLA.uoVEpEQL/MeMZpQd7lHpI9EKFGCH07QG'),
	(7, 'fabian', 'fabian@hotmail.com', NULL, '2025-03-06 00:03:34', 'fab', '$2y$10$ndeEQLdP2GH0he5XvcbR5.dnJTbNltAd/DW0RfMqMU2A4OAxDtrZy'),
	(8, 'johana', 'johan@gmail.com', NULL, '2025-03-06 00:06:11', 'jojo', '$2y$10$xW8y5Q5qeDSu0Mnzx9gIIOtQHWMnkhmgZYyZ0G9VuzfD.b1vRJcSC'),
	(9, 'bob', 'bob@gmail.com', NULL, '2025-03-06 00:15:29', 'bob', '$2y$10$W8lByDHNxTu9PpS7w40s7.zwyGvNoah5F4kdXiyRq7ER2DekBHAou'),
	(10, 'cristian', 'cristian@gmail.com', NULL, '2025-03-06 00:28:55', 'cristian2', '$2y$10$fzFuCUDbbxExpdNx61DID.gKaan8gamcWp8Rs5S1Yttd3AdNDWLA6'),
	(11, 'esteban', 'estaban@gmail.com', NULL, '2025-03-06 00:49:55', 'este', '$2y$10$aX9J7traUckbrfWXgXjTTOtHhJtlKTRGUY/1CstfHIKOD52w21AXS'),
	(12, 'CASSIANI', 'cassi@gmail.com', NULL, '2025-03-12 23:15:41', 'casi', '$2y$10$05F1x2h0GcmB1BwLoz7K1.cGosRGPzVgVLx18rqsy1RW/HxBZnAjy'),
	(13, 'brenda', 'brenda@gmail.com', NULL, '2025-03-12 23:21:57', 'brenda', '$2y$10$UXZ4NjSEXP8MUXEc3RXqM.55RaKy5R5fN5YTeMYhaSZiMUYIYsR5u');

-- Volcando estructura para tabla mi_formulario_db.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla mi_formulario_db.users: ~0 rows (aproximadamente)


-- Volcando estructura de base de datos para mysql
CREATE DATABASE IF NOT EXISTS `mysql` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `mysql`;

-- Volcando estructura para desconocido, nunca debería aparecer mysql.
CREATE DATABASE IF NOT EXISTS `mysql` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;


-- Volcando estructura de base de datos para mordisco_virtual
CREATE DATABASE IF NOT EXISTS `mordisco_virtual` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `mordisco_virtual`;

-- Volcando estructura para desconocido, nunca debería aparecer mordisco_virtual.
CREATE DATABASE IF NOT EXISTS `mordisco_virtual` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;


-- Volcando estructura de base de datos para mi_formulario_db
CREATE DATABASE IF NOT EXISTS `mi_formulario_db` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `mi_formulario_db`;

-- Volcando estructura para desconocido, nunca debería aparecer mi_formulario_db.
CREATE DATABASE IF NOT EXISTS `mi_formulario_db` /*!40100 DEFAULT CHARACTER SET latin1 */;


-- Volcando estructura de base de datos para information_schema
CREATE DATABASE IF NOT EXISTS `information_schema` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `information_schema`;

-- Volcando estructura para desconocido, nunca debería aparecer information_schema.
CREATE DATABASE IF NOT EXISTS `information_schema` /*!40100 DEFAULT CHARACTER SET utf8 */;


-- Volcando estructura de base de datos para formulario
CREATE DATABASE IF NOT EXISTS `formulario` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `formulario`;

-- Volcando estructura para desconocido, nunca debería aparecer formulario.
CREATE DATABASE IF NOT EXISTS `formulario` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
