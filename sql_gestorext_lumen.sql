/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 5.7.33 : Database - gestorext_lumen
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`gestorext_lumen` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `gestorext_lumen`;

/*Table structure for table `empleados` */

DROP TABLE IF EXISTS `empleados`;

CREATE TABLE `empleados` (
  `empl_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `empl_documento` int(11) NOT NULL,
  `empl_nombres` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `empl_apellidos` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `empl_cargo` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `empl_salario` double DEFAULT NULL,
  `empl_correo` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `empl_fecha_ingeso` date DEFAULT NULL,
  `empl_estado` int(11) DEFAULT '1',
  PRIMARY KEY (`empl_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_documento` int(10) unsigned NOT NULL,
  `user_email` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `user_name` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `user_password` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `user_api_token` varchar(200) COLLATE latin1_general_ci DEFAULT NULL,
  `esus_id` int(11) DEFAULT NULL,
  `tius_id` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`,`user_documento`,`user_email`),
  KEY `user_documento` (`user_documento`),
  KEY `user_email` (`user_email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
