-- MySQL dump 10.16  Distrib 10.1.37-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: mada_db
-- ------------------------------------------------------
-- Server version	10.1.37-MariaDB-0+deb9u1

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
-- Current Database: `mada_db`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `mada_db` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `mada_db`;

--
-- Table structure for table `userstb`
--

DROP TABLE IF EXISTS `userstb`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `userstb` (
  `username` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `initialcode` varchar(50) NOT NULL,
  `landline` varchar(50) NOT NULL,
  `Add_day` varchar(50) NOT NULL,
  `Add_time` varchar(50) NOT NULL,
  `id` int(3) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `userstb`
--

LOCK TABLES `userstb` WRITE;
/*!40000 ALTER TABLE `userstb` DISABLE KEYS */;
INSERT INTO `userstb` VALUES ('معاذ يوسف حسن كفاية','0597350874','02','2901952','17-04-2019','02:17:08 PM',1),('طارق محاميد','0597350891','02','2904587','18-04-2019','11:32:12 AM',2),('Ahmad Khatib','0563214587','02','2901958','18-04-2019','12:22:53 PM',3),('معاذ كفاية','0598746321','04','2806521','18-04-2019','03:22:15 PM',4),('طارق حامد جابر التكروري','0546898745','02','2901254','20-04-2019','03:38:08 PM',5),('شادي خليل','0597843125','02','2901547','21-04-2019','02:34:49 PM',6),('طارق النشاشيبي','0564781243','04','2424578','21-04-2019','05:44:45 PM',7);
/*!40000 ALTER TABLE `userstb` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-04-21 11:04:18
