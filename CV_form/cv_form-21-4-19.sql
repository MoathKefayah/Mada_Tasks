-- MySQL dump 10.16  Distrib 10.1.37-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: cv_form
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
-- Current Database: `cv_form`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `cv_form` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `cv_form`;

--
-- Table structure for table `applicant_experience`
--

DROP TABLE IF EXISTS `applicant_experience`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `applicant_experience` (
  `applicant_name` varchar(50) NOT NULL,
  `company` varchar(50) NOT NULL,
  `position_title` varchar(50) NOT NULL,
  `years` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `applicant_experience`
--

LOCK TABLES `applicant_experience` WRITE;
/*!40000 ALTER TABLE `applicant_experience` DISABLE KEYS */;
INSERT INTO `applicant_experience` VALUES ('moath kefayah','Asal','software engineer trainee','1'),('ahmad khatib','Asal','front end development','1'),('ahmad khatib','mada','System admin','2'),('طارق النشاشيبي','اكزلت','softwar engineer','2'),('طارق النشاشيبي','هاري ','نتويرك','1');
/*!40000 ALTER TABLE `applicant_experience` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `applicant_info`
--

DROP TABLE IF EXISTS `applicant_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `applicant_info` (
  `applicant_name` varchar(255) NOT NULL,
  `university_name` varchar(255) NOT NULL,
  `grad_school` varchar(255) NOT NULL,
  `gpa` float NOT NULL,
  `landline` varchar(255) NOT NULL,
  `current_date` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `have_experience` varchar(255) NOT NULL,
  `specialization` varchar(255) NOT NULL,
  `resume_path` varchar(255) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `applicant_info`
--

LOCK TABLES `applicant_info` WRITE;
/*!40000 ALTER TABLE `applicant_info` DISABLE KEYS */;
INSERT INTO `applicant_info` VALUES ('moath kefayah','berzeit','Nour alhuda',96.4,'022901952','20/04/2019','option2','yes','CSE','resumes/moath_kefayah-1555776600246-Resume.pdf',1),('ahmad khatib','AlQuds','Alhashimyah',94.2,'022901963','21/04/2019','option2','yes','CS','resumes/ahmad_khatib-1555843653973-debian_commands.pdf',2),('معاذ كفاية','بيرزيت','نور الهدى التطبيقية',96.4,'022901952','21/04/2019','option2','no','هندسة انظمة حاسوب','resumes/معاذ_كفاية-1555844336760-Resume.pdf',3),('محمد تحسين النوباني','النجاح','الامير حسن الثانوية',80.5,'022906578','21/04/2019','option5','no','هندسة حاسوب','resumes/محمد_تحسين_النوباني-1555848467142-debian-reference.en.pdf',4),('طارق النشاشيبي','بيرزيت','بيتونيا الثانوية',91.3,'022498764','21/04/2019','option3','yes','علم حاسوب','resumes/طارق_النشاشيبي-1555857397509-debian-reference.en.pdf',5);
/*!40000 ALTER TABLE `applicant_info` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-04-21 10:38:20
