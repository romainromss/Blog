-- MySQL dump 10.16  Distrib 10.2.11-MariaDB, for osx10.13 (x86_64)
--
-- Host: 127.0.0.1    Database: blog
-- ------------------------------------------------------
-- Server version	10.2.11-MariaDB

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
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(10) NOT NULL,
  `author` varchar(255) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `comment_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (1,1,'romain','ddeddededededde','2017-12-18 09:31:06'),(2,2,'vff','ccc','2017-12-27 20:39:09'),(3,2,'romain','ertz','2017-12-27 20:39:20'),(4,1,'Xennef','Pas mal cet article, je connaissais  pas l\'histoire.','2017-12-27 23:22:34'),(5,4,'Charlie','comprends rien a ce qu\'il y a écrit','2017-12-28 09:10:01'),(6,4,'test','test2','2017-12-28 14:07:10'),(7,1,'qwee','ddfdd','2017-12-28 15:22:22'),(8,1,'eeeee','eerer','2017-12-28 16:43:15'),(9,1,'test 4 ','rrererer','2017-12-28 18:23:19');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `chapo` varchar(250) DEFAULT 'NULL',
  `content` longtext DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `creation_date` datetime DEFAULT NULL,
  `img` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (1,'L\'histoire de la Cryptomonnaie','L\'histoire de la cryptomonnaie est en fait assez courte. Oui, nous avons eu des systèmes de monnaie numérique avant que ces cryptomonnaies existaient,mais ils ne sont pas la même chose.\n','Les anciennes versions de monnaies numériques étaient strictement centralisée, alors que ces nouvelles formes de crypto-monnaie,\ncomme Bitcoin et Ethereum, sont décentralisées dans leur nature.\nMaintenant, ce qui est vraiment intéressant dans les cryptomonnaies est qu\'ils ont jamais été destinées à inventer comme ils sont connus aujourd\'hui.\nTout cela a commencé avec le Bitcoin tristement célèbre et un homme nommé Satoshi Nakamoto.\n\nL\'objectif de Nakamoto au commencement était rien de plus que de créer un système informatique de trésorerie pairs à pairs (P2P) .\nLes gens avaient longtemps essayé de créer une sorte de système de l\'argent numérique en ligne, mais avaient toujours échoué en raison des problèmes avec la centralisation.\nSatoshi Nakamoto savait qu\'une autre tentative de construction d\'un système de trésorerie centralisé en ligne ne ferait qu\'un échec de plus,\nil a donc décidé de créer un système de trésorerie numérique qui avait pas d\'autorité centralisée.\n\nEt ainsi vint la naissance du Bitcoin.\nOui, Satoshi Nakamoto a inventé le Bitcoin, la première forme décentralisée de l\'argent numérique qui n\'avait pas d\'administration centrale ou d\'un organisme de contrôle.\nBitcoin devait être la propriété de l\'ensemble de la communauté Bitcoin. (source: Prizm, steemit)','Romain','2017-11-29 14:25:27','/img/bitcoin.jpg'),(2,'Article 2','test 2','Ut vitae nibh vel neque maximus interdum. Curabitur in felis nec felis efficitur porta. Nulla laoreet imperdiet purus et maximus. Cras id elementum ante. Pellentesque sed arcu mollis, cursus justo nec, dignissim felis. Nullam eleifend diam sit amet nunc sollicitudin, sodales ornare orci consequat. Duis blandit massa tellus, id vulputate tortor. ','Albert','2017-11-29 14:25:47','/img/home-bg.jpg'),(3,'Article 3',NULL,'Nam molestie pretium dictum. Nullam volutpat ac mauris ut convallis. Phasellus rhoncus metus vitae consectetur dictum. Aliquam fringilla ut purus at tempor. Sed ultricies erat et nisl tristique efficitur. Aliquam euismod tortor in ornare tempor. Aliquam ultricies velit sit amet nisi ullamcorper placerat. Fusce facilisis libero augue, at feugiat dui fringilla a. ','Georges','2017-11-29 14:25:50',NULL),(4,'Article 4',NULL,'Maecenas in ante nec ante faucibus sollicitudin vel eget erat. Nunc nisl nisl, varius eget eros a, convallis vestibulum lorem. Ut scelerisque ut nibh pharetra molestie. Maecenas finibus id nunc id dignissim. Ut sollicitudin viverra volutpat. Vivamus urna tortor, vulputate fermentum elit in, rhoncus feugiat diam.','Julie','2017-12-23 13:10:01',NULL),(5,'Article 5',NULL,'sit amet ex pharetra tincidunt. Praesent et luctus ligula, sed fermentum est. Pellentesque nec magna in ligula tincidunt hendrerit id vitae nulla. Aenean vitae lectus quis ante hendrerit lobortis. Quisque ut cursus odio. Ut efficitur, metus vel iaculis eleifend, nisl leo tempus magna, pharetra pulvinar sem ipsum eget lectus. ','Laure','2017-12-23 13:16:03',NULL);
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_token` varchar(255) DEFAULT NULL,
  `register_at` datetime NOT NULL,
  `connection_at` datetime DEFAULT NULL,
  `rank` tinyint(3) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','$2y$12$NZpQdPRMISGpUwPyZGT7JeEGlndr1p3TlH7wERDJ9A01AEDNLn5iq','admin@local.forum',NULL,'2017-12-29 14:42:04',NULL,3),(2,'test','$2y$12$KO4j7Ezi3HXq/IM3fpjtAegw4w23/U4fFskZS5.du/nWhgIqYtP2W','test@local.forum',NULL,'2017-12-29 14:42:04',NULL,1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-12-30 15:42:31
