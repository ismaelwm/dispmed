/*
SQLyog Ultimate v9.63 
MySQL - 5.1.37 : Database - dispmedico
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`dispmedico` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `dispmedico`;

/*Table structure for table `medicamento` */

DROP TABLE IF EXISTS `medicamento`;

CREATE TABLE `medicamento` (
  `idMedicamento` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(15) NOT NULL,
  `tipoFarmaco` varchar(15) NOT NULL,
  `Marca` varchar(15) NOT NULL,
  `cantidad` int(50) NOT NULL,
  `ubicacion` varchar(100) NOT NULL,
  PRIMARY KEY (`idMedicamento`),
  KEY `Nombre` (`Nombre`),
  KEY `medicamento_ibfk_1` (`ubicacion`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `medicamento` */

insert  into `medicamento`(`idMedicamento`,`Nombre`,`tipoFarmaco`,`Marca`,`cantidad`,`ubicacion`) values (12,'MEPROLOL 100','Capsula','CUANTICA',123,'Tramo 2 Estante H Celda 2'),(13,'PONSTAN','Capsula','UNITEX',89,'Tramo 1 Estante B Celda 23');

/*Table structure for table `medico` */

DROP TABLE IF EXISTS `medico`;

CREATE TABLE `medico` (
  `idMedico` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(25) NOT NULL,
  `Cedula` varchar(15) NOT NULL,
  `Tanda` varchar(15) NOT NULL,
  `Especialidad` varchar(20) NOT NULL,
  `Estado` varchar(10) NOT NULL,
  PRIMARY KEY (`idMedico`),
  UNIQUE KEY `Cedula` (`Cedula`),
  KEY `Nombre` (`Nombre`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

/*Data for the table `medico` */

insert  into `medico`(`idMedico`,`Nombre`,`Cedula`,`Tanda`,`Especialidad`,`Estado`) values (17,'ESTEBAN JOSE DE LA ROSA','40224258364','Matutina','PEDIATRA','Activo'),(29,'CARLOS MOENTEROS','40123458760','Vespertina','ORTOPEDA','Inactivo'),(28,'JHON SMITH','40124259801','Vespertina','ODONTOLOGO','Activo');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`id`,`username`,`password`) values (1,'esteban','12345'),(2,'luis','12345'),(3,'virdis','12345');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
