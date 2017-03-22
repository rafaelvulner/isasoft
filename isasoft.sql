# Host: localhost  (Version: 5.7.14)
# Date: 2017-03-22 20:21:20
# Generator: MySQL-Front 5.3  (Build 4.234)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "categoria"
#

DROP TABLE IF EXISTS `categoria`;
CREATE TABLE `categoria` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_categoria` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

#
# Data for table "categoria"
#

/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` VALUES (1,'Bebidas'),(2,'Lanches'),(3,'Porções');
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;

#
# Structure for table "comanda"
#

DROP TABLE IF EXISTS `comanda`;
CREATE TABLE `comanda` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `data` date DEFAULT NULL,
  `total` double(10,2) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

#
# Data for table "comanda"
#

/*!40000 ALTER TABLE `comanda` DISABLE KEYS */;
INSERT INTO `comanda` VALUES (41,'2017-03-22',0.00),(42,'2017-03-22',0.00),(43,'2017-03-22',0.00),(44,'2017-03-22',0.00),(45,'2017-03-22',0.00),(46,'2017-03-22',0.00),(47,'2017-03-22',0.00),(48,'2017-03-22',0.00),(49,'2017-03-22',0.00),(50,'2017-03-22',0.00),(51,'2017-03-22',0.00),(52,'2017-03-22',0.00),(53,'2017-03-22',0.00),(54,'2017-03-22',0.00),(55,'2017-03-22',0.00),(56,'2017-03-22',0.00),(57,'2017-03-22',0.00);
/*!40000 ALTER TABLE `comanda` ENABLE KEYS */;

#
# Structure for table "comanda_produto"
#

DROP TABLE IF EXISTS `comanda_produto`;
CREATE TABLE `comanda_produto` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `id_produto` int(11) NOT NULL DEFAULT '0',
  `id_comanda` int(11) NOT NULL DEFAULT '0',
  `qtd_produto` int(10) NOT NULL DEFAULT '0',
  `qtd_pessoas` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

#
# Data for table "comanda_produto"
#

/*!40000 ALTER TABLE `comanda_produto` DISABLE KEYS */;
INSERT INTO `comanda_produto` VALUES (38,3,41,1,2),(39,2,41,2,2),(40,3,41,1,2),(41,3,42,2,2),(42,2,42,2,2),(43,2,42,2,2),(44,2,41,15,50),(45,2,41,1,2),(46,2,43,2,4),(47,2,44,1,1),(48,3,44,2,2),(49,2,45,2,2),(50,3,45,2,2),(51,2,46,1,1),(52,2,47,2,2),(53,2,48,2,2),(54,2,49,1,2),(55,2,50,2,2),(56,2,51,2,2),(57,2,52,2,2),(58,2,53,2,2),(59,2,54,2,2),(60,2,55,2,2),(61,2,56,2,2),(62,3,57,2,2),(63,2,57,2,3);
/*!40000 ALTER TABLE `comanda_produto` ENABLE KEYS */;

#
# Structure for table "mesa"
#

DROP TABLE IF EXISTS `mesa`;
CREATE TABLE `mesa` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `num_mesa` int(11) NOT NULL DEFAULT '0',
  `id_comanda` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

#
# Data for table "mesa"
#

/*!40000 ALTER TABLE `mesa` DISABLE KEYS */;
INSERT INTO `mesa` VALUES (7,1,NULL),(8,2,NULL),(9,3,NULL),(10,4,NULL);
/*!40000 ALTER TABLE `mesa` ENABLE KEYS */;

#
# Structure for table "produto"
#

DROP TABLE IF EXISTS `produto`;
CREATE TABLE `produto` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_prod` varchar(255) NOT NULL DEFAULT '',
  `id_categoria` int(11) NOT NULL DEFAULT '0',
  `preco_prod` double(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

#
# Data for table "produto"
#

/*!40000 ALTER TABLE `produto` DISABLE KEYS */;
INSERT INTO `produto` VALUES (2,'coca-cola',1,3.50),(3,'cachorro quente',2,5.00);
/*!40000 ALTER TABLE `produto` ENABLE KEYS */;
