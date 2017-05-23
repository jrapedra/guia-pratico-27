-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: automoveis
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.21-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `automoveis`
--

DROP TABLE IF EXISTS `automoveis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `automoveis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `modelo_id` int(11) DEFAULT NULL,
  `cor_id` int(11) DEFAULT NULL,
  `disponibilidade` tinyint(1) DEFAULT NULL,
  `matricula` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk-model_idx` (`modelo_id`),
  KEY `fk-color_idx` (`cor_id`),
  CONSTRAINT `fk-color` FOREIGN KEY (`cor_id`) REFERENCES `cores` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk-model` FOREIGN KEY (`modelo_id`) REFERENCES `modelos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `automoveis`
--

LOCK TABLES `automoveis` WRITE;
/*!40000 ALTER TABLE `automoveis` DISABLE KEYS */;
INSERT INTO `automoveis` VALUES (1,15,2,0,'45-45-BF'),(2,8,1,0,'98-59-GR'),(3,1,3,1,'14-71-RC'),(4,13,7,0,'12-21-GH'),(5,4,4,1,'45-54-BD'),(6,1,6,0,'13-13-BN'),(7,9,4,1,'14-14-BN'),(8,1,3,1,'15-15-BN'),(9,6,4,0,'16-15-BN'),(10,8,4,1,'17-15-BN'),(11,4,1,1,'18-15-BN'),(12,7,5,1,'46-15-BN'),(13,4,7,1,'47-15-BN'),(14,2,6,0,'48-15-BN'),(15,13,1,1,'49-15-BN'),(16,14,1,0,'50-15-BN'),(17,7,2,1,'51-15-BN'),(18,2,3,0,'52-15-BN'),(19,1,7,1,'53-15-BN'),(20,8,4,0,'54-15-BN'),(21,3,7,0,'55-15-BN'),(22,5,5,1,'56-15-BN'),(23,11,1,1,'57-15-BN'),(24,8,6,0,'58-15-BN'),(25,7,5,0,'59-15-BN'),(26,14,5,0,'60-15-BN'),(27,3,3,1,'61-15-BN'),(28,10,3,0,'62-15-BN'),(29,11,2,1,'63-15-BN'),(30,13,7,0,'64-15-BN'),(31,1,4,1,'65-15-BN'),(32,15,4,1,'66-15-BN'),(33,12,7,0,'67-15-BN'),(34,6,3,1,'68-15-BN'),(35,8,7,1,'69-15-BN'),(36,14,4,1,'70-15-BN'),(37,5,3,1,'71-15-BN'),(38,14,5,1,'72-15-BN'),(39,13,3,1,'73-15-BN'),(40,7,4,0,'74-15-BN'),(41,1,5,1,'75-15-BN'),(42,15,6,0,'76-15-BN'),(43,15,5,0,'77-15-BN'),(44,12,7,0,'78-15-BN'),(45,9,7,1,'79-15-BN'),(46,3,2,0,'80-15-BN'),(47,1,2,1,'81-15-BN'),(48,2,2,1,'82-15-BN'),(49,4,2,1,'83-15-BN'),(50,3,3,1,'84-15-BN'),(51,8,4,1,'85-15-BN'),(52,14,5,0,'86-15-BN'),(53,1,4,0,'87-15-BN'),(54,4,7,0,'88-15-BN'),(55,5,6,1,'89-15-BN'),(56,1,7,1,'90-15-BN'),(57,6,2,0,'91-15-BN'),(58,15,5,1,'92-15-BN'),(59,11,7,1,'93-15-BN'),(60,1,3,1,'94-15-BN'),(61,12,5,0,'95-15-BN'),(62,10,5,1,'96-15-BN'),(63,9,4,0,'97-15-BN'),(64,1,2,1,'98-15-BN'),(65,4,3,1,'99-15-BN'),(66,3,6,0,'65-15-BN'),(67,14,4,1,'66-15-BN'),(68,15,6,0,'67-16-BN'),(69,12,4,0,'68-16-BN'),(70,8,4,0,'69-16-BN'),(71,3,4,0,'70-16-BN'),(72,14,7,1,'71-16-BN'),(73,15,3,0,'72-16-BN'),(74,2,7,0,'73-16-BN'),(75,4,4,0,'74-16-BN'),(76,14,5,0,'75-16-BN'),(77,15,4,1,'76-16-BN'),(78,3,3,0,'77-16-BN'),(79,6,7,0,'78-16-BN'),(80,3,7,1,'79-16-BN'),(81,3,3,1,'80-16-BN'),(82,4,5,0,'81-16-BN'),(83,12,7,1,'82-16-BN'),(84,4,3,0,'83-16-BN'),(85,12,7,0,'84-16-BN'),(86,12,7,1,'85-16-BN'),(87,10,4,1,'86-16-BN'),(88,9,6,0,'87-16-BN'),(89,7,4,1,'88-16-BN'),(90,1,4,1,'89-16-BN'),(91,5,5,1,'90-16-BN'),(92,7,2,0,'91-16-BN'),(93,3,6,0,'92-16-BN'),(94,12,4,0,'93-16-BN'),(95,11,2,0,'94-16-BN'),(96,13,3,1,'95-16-BN'),(97,5,2,0,'96-16-BN'),(98,3,1,0,'97-16-BN'),(99,4,2,0,'98-16-BN'),(100,14,5,0,'99-16-BN');
/*!40000 ALTER TABLE `automoveis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cores`
--

DROP TABLE IF EXISTS `cores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cores`
--

LOCK TABLES `cores` WRITE;
/*!40000 ALTER TABLE `cores` DISABLE KEYS */;
INSERT INTO `cores` VALUES (1,'vermelho'),(2,'verde'),(3,'preto'),(4,'branco'),(5,'cinzento'),(6,'azul'),(7,'amarelo');
/*!40000 ALTER TABLE `cores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fabricantes`
--

DROP TABLE IF EXISTS `fabricantes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fabricantes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fabricantes`
--

LOCK TABLES `fabricantes` WRITE;
/*!40000 ALTER TABLE `fabricantes` DISABLE KEYS */;
INSERT INTO `fabricantes` VALUES (1,'Alfa Romeo'),(2,'BMW'),(3,'Audi'),(4,'Ford'),(5,'Fiat'),(6,'Nissan'),(7,'Peugeot'),(8,'Mercedes'),(9,'Toyota');
/*!40000 ALTER TABLE `fabricantes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `modelos`
--

DROP TABLE IF EXISTS `modelos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `modelos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  `fabricante-id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk-fabricante_idx` (`fabricante-id`),
  CONSTRAINT `fk-fabricante` FOREIGN KEY (`fabricante-id`) REFERENCES `fabricantes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modelos`
--

LOCK TABLES `modelos` WRITE;
/*!40000 ALTER TABLE `modelos` DISABLE KEYS */;
INSERT INTO `modelos` VALUES (1,'Gulieta',1),(2,'320',2),(3,'120',2),(4,'A3',3),(5,'A4',3),(6,'Escort',4),(7,'Uno',5),(8,'Qashqai',6),(9,'Micra',6),(10,'106',7),(11,'308',7),(12,'Classe A',8),(13,'GLA',8),(14,'Corolla',9),(15,'Yaris',9);
/*!40000 ALTER TABLE `modelos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-05-17  0:30:16
