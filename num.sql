-- MySQL dump 10.13  Distrib 5.1.56, for Win32 (ia32)
--
-- Host: localhost    Database: numerology
-- ------------------------------------------------------
-- Server version	5.1.56-community

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
-- Table structure for table `num_appinfo`
--

DROP TABLE IF EXISTS `num_appinfo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `num_appinfo` (
  `AppID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `AppVersion` varchar(20) DEFAULT NULL,
  `ScreenWidth` int(10) unsigned DEFAULT NULL,
  `ScreenHeight` int(10) unsigned DEFAULT NULL,
  `AppOS` varchar(20) DEFAULT NULL,
  `AppExitStatus` char(1) DEFAULT NULL,
  PRIMARY KEY (`AppID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `num_appinfo`
--

LOCK TABLES `num_appinfo` WRITE;
/*!40000 ALTER TABLE `num_appinfo` DISABLE KEYS */;
INSERT INTO `num_appinfo` VALUES (1,NULL,NULL,NULL,NULL,'0'),(2,NULL,NULL,NULL,NULL,'1'),(3,NULL,NULL,NULL,NULL,'1'),(4,NULL,NULL,NULL,NULL,'0'),(5,NULL,NULL,NULL,NULL,'1'),(6,NULL,NULL,NULL,NULL,'1'),(7,NULL,NULL,NULL,NULL,'1');
/*!40000 ALTER TABLE `num_appinfo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `num_dailytext`
--

DROP TABLE IF EXISTS `num_dailytext`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `num_dailytext` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `displayText` varchar(20) DEFAULT NULL,
  `displayImage` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `num_dailytext`
--

LOCK TABLES `num_dailytext` WRITE;
/*!40000 ALTER TABLE `num_dailytext` DISABLE KEYS */;
INSERT INTO `num_dailytext` VALUES (4,'<p>Random Text</p>','http://kamkash.com/images/image009.png');
/*!40000 ALTER TABLE `num_dailytext` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `num_guru`
--

DROP TABLE IF EXISTS `num_guru`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `num_guru` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `guruName` varchar(20) DEFAULT NULL,
  `guruPhoto` varchar(20) DEFAULT NULL,
  `guruDescription` text,
  `guruCity` varchar(20) DEFAULT NULL,
  `guruCountry` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `num_guru`
--

LOCK TABLES `num_guru` WRITE;
/*!40000 ALTER TABLE `num_guru` DISABLE KEYS */;
INSERT INTO `num_guru` VALUES (1,'Guru1','guru1.png','Desc1','Birmingham','UK'),(2,'Guru2','guru2.png','Desc2','Bangalore','India');
/*!40000 ALTER TABLE `num_guru` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `num_purchaseinfo`
--

DROP TABLE IF EXISTS `num_purchaseinfo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `num_purchaseinfo` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `userId` int(10) unsigned DEFAULT NULL,
  `purchaseRef` int(10) unsigned DEFAULT NULL,
  `osPurchase` varchar(20) DEFAULT NULL,
  `guruID` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `num_purchaseinfo_FKIndex1` (`id`),
  KEY `num_purchaseinfo_ibfk_1` (`userId`),
  CONSTRAINT `num_purchaseinfo_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `num_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `num_purchaseinfo`
--

LOCK TABLES `num_purchaseinfo` WRITE;
/*!40000 ALTER TABLE `num_purchaseinfo` DISABLE KEYS */;
INSERT INTO `num_purchaseinfo` VALUES (1,1,34556,'ios',1);
/*!40000 ALTER TABLE `num_purchaseinfo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `num_user`
--

DROP TABLE IF EXISTS `num_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `num_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `personName` varchar(20) DEFAULT NULL,
  `personDay` char(2) DEFAULT NULL,
  `personMonth` char(2) DEFAULT NULL,
  `personYear` char(4) DEFAULT NULL,
  `emailAdd` varchar(30) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `num_user`
--

LOCK TABLES `num_user` WRITE;
/*!40000 ALTER TABLE `num_user` DISABLE KEYS */;
INSERT INTO `num_user` VALUES (1,'abcd','22','10','1980','sms@india.com','934049');
/*!40000 ALTER TABLE `num_user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-10-24  9:54:10
