-- MySQL dump 10.16  Distrib 10.1.48-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: yourhost.dominion   Database: your_database_name_here
-- ------------------------------------------------------
-- Server version	5.7.40-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `cpf_cnpj` varchar(11) NOT NULL,
  `birthdate` datetime NOT NULL,
  `address` varchar(255) NOT NULL,
  `hood` varchar(100) NOT NULL,
  `zip_code` varchar(8) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(2) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `mobile` varchar(13) NOT NULL,
  `ie` varchar(15) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customers`
--

LOCK TABLES `customers` WRITE;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` VALUES (3,'ads','32647467890','1917-11-11 00:00:00','adsfhjg, 236','safdhfjg','315614','asdfjd,jhdksj','UF','82391300765','12345876389','DE','2022-09-21 01:45:18','2022-12-11 13:16:13'),(11,'Edith','25364576879','1968-06-27 00:00:00','6576tyh, ghcjkhjlkçl','sasdk,gjhkll','24586970','sasdfghhlçjk','SP','35465768078','543675687980','ED','2022-11-27 16:14:26','2022-11-30 03:25:37'),(12,'SaaS','12345678902','1932-06-28 00:00:00','SaaS','SaaS','12345678','SaaS','ES','12345678903','12345678902','1234567890','2022-11-30 18:08:13','2022-12-08 23:01:11'),(14,'Dave','13556798099','1999-06-11 00:00:00','rua do Dave, 259','jardim','35465768','São Paulo','SP','2334568978094','2314325645787','dfaa','2022-12-11 13:18:18','2022-12-11 13:42:06'),(15,'José','12345678910','0000-00-00 00:00:00','Rua do José, 209','Central','14576879','Sorocaba','SP','2435465678970','2457708976523','ssd','2022-12-11 13:20:51','2022-12-11 17:41:33'),(17,'teste 2','10976541234','1998-06-25 00:00:00','sdfghj, 3456 fghjk','dfghjkvc, fghjk','23456789','sdfghjk','DC','3456789009876','9876523456789','sdfghjkjh','2022-12-11 13:56:09','2022-12-11 13:56:09');
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `filmes`
--

DROP TABLE IF EXISTS `filmes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `filmes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(50) NOT NULL,
  `diretor` varchar(40) NOT NULL,
  `ano` int(11) NOT NULL,
  `datacad` datetime NOT NULL,
  `foto` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `filmes`, make it with your own information (images at least)
--

LOCK TABLES `filmes` WRITE;
/*!40000 ALTER TABLE `filmes` DISABLE KEYS */;
INSERT INTO `filmes` VALUES (15,'Homem de Ferro','Jon Favreau',2008,'2022-12-04 17:56:48','tAcDOFXDxyQRM.jpg'),(16,'Transformers','Michael Bay',2007,'2022-11-28 17:58:32','Transformers.jpg'),(20,'Vingadores: Guerra Infinita','Anthony Russo e Joe Russo',2018,'2022-11-28 18:05:03','Vingadores3.jpg'),(21,'X-Men: Dias de um Futuro Esquecido','Charles Xavier',2014,'2022-11-30 17:45:49','alternativo.jpg'),(22,'Avatar','James Cameron',2009,'2022-11-30 18:02:23','OIP.jpg'),(24,'Teste Sem Imagem','Testando',6790,'2022-12-11 12:19:12',''),(25,'Teste Gif','Testando',1969,'2022-12-11 12:35:26','R.gif'),(26,'Logan','James Mangold',2017,'2022-12-11 14:42:25','Logan-Logado-Linha-Limão-1.jpg'),(27,'lalala','lala',2010,'2022-12-19 16:52:04','avengers_ps4.jpg');
/*!40000 ALTER TABLE `filmes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_carro` another option of theme.
--

DROP TABLE IF EXISTS `tb_carro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_carro` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `marca` varchar(50) NOT NULL,
  `modelo` varchar(50) NOT NULL,
  `ano` int(11) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_carro`
--

LOCK TABLES `tb_carro` WRITE;
/*!40000 ALTER TABLE `tb_carro` DISABLE KEYS */;
INSERT INTO `tb_carro` VALUES (1,'chevrolet','celta',2004),(2,'ford','ka',2002),(3,'fiat','uno',2009),(4,'volkswagen','fusca',1975);
/*!40000 ALTER TABLE `tb_carro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `user` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `foto` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`, make it with your own information (images at least)
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (6,'Tony','Tony','$2a$08$CflfilePArKlBJomM0F6a.yB4AJ75edq.2CT46qHFt5npaZtZphKe','IW.jpg'),(8,'IA','IA@','$2a$08$CflfilePArKlBJomM0F6a.J9LUBM/3JehCjCy/rCQIwlZ4DaZYXwm','Portada.jpg'),(13,'Mercúrio é velocista','Mercúrio é','$2a$08$CflfilePArKlBJomM0F6a.mpjO7pcNWJULASm0DgbT33W7M0VumsG','giphy.gif'),(14,'El Max','El Max','$2a$08$CflfilePArKlBJomM0F6a.AbMRBEQtxofPWcu.0k4n59P7EIwEKAO','16475125.jpg'),(17,'José Lisboa','José','$2a$08$CflfilePArKlBJomM0F6a.XWFSfvm3Rm6/bFisDz5yus8FKs3lphm','300px-Shockwavearealldead.jpg'),(18,'Administrador','admin','$2a$08$CflfilePArKlBJomM0F6a.iCkNYz44pJOiXUMfycn2MgpTEeuQ5my','MicrosoftTeams-image.png'),(20,'ads','ads','$2a$08$CflfilePArKlBJomM0F6a.1VfrKYg.8Vu9StsKzpVV.JYrAEwY1QS','unnamed.jpg'),(22,'Nick','nickester','$2a$08$CflfilePArKlBJomM0F6a.uED5zLt.8hdHhZIFV1bEEZOF..Vy7Re','J.jpg'),(28,'usuario','usuario','$2a$08$CflfilePArKlBJomM0F6a.T6nbJaOaHMETVe5HV4d6OI9LnQ//.Ni','usuario-silueta-png-2.png'),(32,'teste','teste','$2a$08$CflfilePArKlBJomM0F6a.rcxF.ErGOOtOlcW.oW8l.bSYPpcQldO','cadeira_gamer_profissional.jpg');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'your_database_name_here'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

