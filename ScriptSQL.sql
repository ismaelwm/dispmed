CREATE DATABASE `dispmedico`;
USE `dispmedico`;


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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

insert  into `medicamento`(`idMedicamento`,`usuario`,`Nombre`,`tipoFarmaco`,`Marca`,`cantidad`,`ubicacion`,`fecha`) values (1,'admin','MEPROLOL 100','Capsula','CUANTICA',123,'Tramo 2 Estante H Celda 2','2015-03-01'),(2,'esteban','PONSTAN','Capsula','UNITEX',89,'Tramo 1 Estante B Celda 23','2015-03-02'),(3,'admin','ALBERTIN','Capsula','7UP',12,'Tramo 1 Estante B Celda 24','2015-03-05'),(4,'admin','MEPROMILANOL','Jarabe','SUPTABROL',12,'Tramo 5 Estante K Celda 2','2015-03-06'),(5,'esteban','SENTIMANOL','Jarabe','UTAX',19,'Tramo 5 Estante J Celda 1','2015-03-08'),(6,'esteban','CERIMAROX','Comprimido','123LISTO',20,'Tramo 5 Estante P Celda 1','2015-03-10'),(7,'esteban','MEMOCAIL','Comprimido','JUIX',126,'Tramo 1 Estante B Celda 3','2015-03-11');


DROP TABLE IF EXISTS `medico`;

CREATE TABLE `medico` (
  `idMedico` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(15) NOT NULL,
  `Nombre` varchar(25) NOT NULL,
  `Cedula` varchar(15) NOT NULL,
  `Tanda` varchar(15) NOT NULL,
  `Especialidad` varchar(20) NOT NULL,
  `Estado` varchar(10) NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`idMedico`),
  UNIQUE KEY `Cedula` (`Cedula`),
  KEY `Nombre` (`Nombre`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

insert  into `medico`(`idMedico`,`usuario`,`Nombre`,`Cedula`,`Tanda`,`Especialidad`,`Estado`,`fecha`) values (32,'admin','ALBERT FELIZ GARO','40224258365','Vespertina','PEDIATRA','Inactivo','2015-03-01'),(17,'admin','ESTEBAN JOSE DE LA ROSA','40224258364','Matutina','PEDIATRA','Activo','2015-03-03'),(29,'esteban','CARLOS MOENTEROS','40123458760','Vespertina','ORTOPEDA','Inactivo','2015-03-05'),(28,'esteban','JHON SMITH','40124259801','Vespertina','ODONTOLOGO','Activo','2015-03-08'),(37,'admin','JUAN PABLO GARCIA','40228763091','Matutina','GINECOLOGO','Activo','2015-03-16');



DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(41) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

insert  into `users`(`id`,`username`,`password`,`tipo`) values (1,'admin','9b26f1dd5d52d047b42600149fc92627f0acf947','admin'),(12,'esteban','2943261b5736316aeae18608646471475e55a9bb','usuario');

