
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


DROP DATABASE IF EXISTS `strix`;
CREATE DATABASE IF NOT EXISTS `strix` /*!40100 DEFAULT CHARACTER SET utf8 */;
CREATE USER 'strix'@'localhost' IDENTIFIED BY 'strix';
GRANT ALL PRIVILEGES ON strix.* TO 'strix'@'localhost';
FLUSH PRIVILEGES;

USE `strix`;

DROP TABLE IF EXISTS `trips`;
CREATE TABLE IF NOT EXISTS `trips` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `measure_interval` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DELETE FROM `trips`;
/*!40000 ALTER TABLE `trips` DISABLE KEYS */;
INSERT INTO `trips` (`id`, `name`, `measure_interval`) VALUES
	(1, 'Trip 1', 15),
	(2, 'Trip 2', 20),
	(3, 'Trip 3', 12);
/*!40000 ALTER TABLE `trips` ENABLE KEYS */;

DROP TABLE IF EXISTS `trip_measures`;
CREATE TABLE IF NOT EXISTS `trip_measures` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `trip_id` int(11) DEFAULT NULL,
  `distance` decimal(5,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_F8DB2F45A5BC2E0E` (`trip_id`),
  CONSTRAINT `FK_F8DB2F45A5BC2E0E` FOREIGN KEY (`trip_id`) REFERENCES `trips` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DELETE FROM `trip_measures`;
/*!40000 ALTER TABLE `trip_measures` DISABLE KEYS */;
INSERT INTO `trip_measures` (`id`, `trip_id`, `distance`) VALUES
	(1, 1, 0.00),
	(2, 1, 0.19),
	(3, 1, 0.50),
	(4, 1, 0.75),
	(5, 1, 1.00),
	(6, 1, 1.25),
	(7, 1, 1.50),
	(8, 1, 1.75),
	(9, 1, 2.00),
	(10, 1, 2.25),
	(11, 2, 0.00),
	(12, 2, 0.23),
	(13, 2, 0.46),
	(14, 2, 0.69),
	(15, 2, 0.92),
	(16, 2, 1.15),
	(17, 2, 1.38),
	(18, 2, 1.61),
	(19, 3, 0.00),
	(20, 3, 0.11),
	(21, 3, 0.22),
	(22, 3, 0.33),
	(23, 3, 0.44),
	(24, 3, 0.65),
	(25, 3, 1.08),
	(26, 3, 1.26),
	(27, 3, 1.68),
	(28, 3, 1.89),
	(29, 3, 2.10),
	(30, 3, 2.31),
	(31, 3, 2.52),
	(32, 3, 3.25);
/*!40000 ALTER TABLE `trip_measures` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
