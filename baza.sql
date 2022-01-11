/*
SQLyog Community v13.1.6 (64 bit)
MySQL - 8.0.18 : Database - covidbaza
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`covidbaza` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `covidbaza`;

/*Table structure for table `proizvodjac` */

DROP TABLE IF EXISTS `proizvodjac`;

CREATE TABLE `proizvodjac` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `proizvodjac` */

insert  into `proizvodjac`(`id`,`naziv`) values 
(1,'Pfizer'),
(2,'AstraZeneca'),
(3,'China National Pharmaceutical '),
(4,'Gamaleya Institute'),
(5,'Moderna'),
(6,'Janssen Pharmaceuticals');

/*Table structure for table `vakcina` */

DROP TABLE IF EXISTS `vakcina`;

CREATE TABLE `vakcina` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(30) DEFAULT NULL,
  `proizvodjac` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `proizvodjac` (`proizvodjac`),
  CONSTRAINT `proizvodjac_ibfk_1` FOREIGN KEY (`proizvodjac`) REFERENCES `proizvodjac` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `vakcina` */

insert  into `vakcina`(`id`,`naziv`,`proizvodjac`) values 
(1,'Pfizer-BioNTech',1),
(2,'The Oxford/AstraZeneca',2),
(3,'Sinopharm',3),
(4,'Sputnik V',4),
(5,'Moderna',5),
(6,'Johnson & Johnsons Janssen',6);

/*Table structure for table `vakcinacije` */

DROP TABLE IF EXISTS `vakcinacije`;

CREATE TABLE `vakcinacije` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `vakcina` bigint(20) NOT NULL,
  `ime` varchar(20) DEFAULT NULL,
  `prezime` varchar(20) DEFAULT NULL,
  `doza` int(3) DEFAULT NULL,
  `datum` date DEFAULT NULL,
  PRIMARY KEY (`id`,`vakcina`),
  KEY `vakcina` (`vakcina`),
  CONSTRAINT `vakcinacija_ibfk_1` FOREIGN KEY (`vakcina`) REFERENCES `vakcina` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `vakcinacije` */

insert  into `vakcinacije`(`id`,`vakcina`,`ime`,`prezime`,`doza`,`datum`) values 
(1,1,'Marko','Petrovic',1,'2022-02-24'),
(2,1,'Ivan','Jankovic',3,'2022-01-20'),
(3,4,'Marija','Ivanovic',2,'2022-01-15'),
(4,2,'Jovan','Bozilovic',1,'2022-03-03'),
(5,3,'Dragan','Tadic',3,'2022-04-04');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
