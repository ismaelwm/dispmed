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
  `usuario` varchar(15) NOT NULL,
  `Nombre` varchar(15) NOT NULL,
  `tipoFarmaco` varchar(15) NOT NULL,
  `Marca` varchar(15) NOT NULL,
  `cantidad` int(50) NOT NULL,
  `ubicacion` varchar(100) NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`idMedicamento`),
  KEY `Nombre` (`Nombre`),
  KEY `medicamento_ibfk_1` (`ubicacion`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

/*Data for the table `medicamento` */

insert  into `medicamento`(`idMedicamento`,`usuario`,`Nombre`,`tipoFarmaco`,`Marca`,`cantidad`,`ubicacion`,`fecha`) values (12,'admin','MEPROLOL 100','Capsula','CUANTICA',123,'Tramo 2 Estante H Celda 2','2015-03-01'),(13,'esteban','PONSTAN','Capsula','UNITEX',89,'Tramo 1 Estante B Celda 23','2015-03-02'),(14,'admin','ALBERTIN','Capsula','7UP',12,'Tramo 1 Estante B Celda 24','2015-03-05'),(20,'admin','MEPROMILANOL','Jarabe','SUPTABROL',12,'Tramo 5 Estante K Celda 2','2015-03-06'),(21,'esteban','SENTIMANOL','Jarabe','UTAX',19,'Tramo 5 Estante J Celda 1','2015-03-08'),(22,'esteban','CERIMAROX','Comprimido','123LISTO',20,'Tramo 5 Estante P Celda 1','2015-03-10'),(23,'esteban','MEMOCAIL','Comprimido','JUIX',126,'Tramo 1 Estante B Celda 3','2015-03-11');

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
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

/*Data for the table `medico` */

insert  into `medico`(`idMedico`,`Nombre`,`Cedula`,`Tanda`,`Especialidad`,`Estado`) values (32,'ALBERT FELIZ GARO','40224258365','Vespertina','PEDIATRA','Inactivo'),(17,'ESTEBAN JOSE DE LA ROSA','40224258364','Matutina','PEDIATRA','Activo'),(29,'CARLOS MOENTEROS','40123458760','Vespertina','ORTOPEDA','Inactivo'),(28,'JHON SMITH','40124259801','Vespertina','ODONTOLOGO','Activo');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(41) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`id`,`username`,`password`,`tipo`) values (1,'admin','9b26f1dd5d52d047b42600149fc92627f0acf947','admin'),(12,'esteban','2943261b5736316aeae18608646471475e55a9bb','usuario');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
