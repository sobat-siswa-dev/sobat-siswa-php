-- MySQL dump 10.13  Distrib 5.5.62, for Win64 (AMD64)
--
-- Host: localhost    Database: sobatedu
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.19-MariaDB

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
-- Table structure for table `adm_alumn`
--

DROP TABLE IF EXISTS `adm_alumn`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `adm_alumn` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `adm_alumn`
--

LOCK TABLES `adm_alumn` WRITE;
/*!40000 ALTER TABLE `adm_alumn` DISABLE KEYS */;
/*!40000 ALTER TABLE `adm_alumn` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `adm_class`
--

DROP TABLE IF EXISTS `adm_class`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `adm_class` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `adm_class`
--

LOCK TABLES `adm_class` WRITE;
/*!40000 ALTER TABLE `adm_class` DISABLE KEYS */;
INSERT INTO `adm_class` VALUES (1,'Kelas 10-A',1,1,'2021-07-06 07:22:00','2021-07-06 07:22:00','K10A',NULL),(2,'Kelas 11-A',1,1,'2021-07-10 00:43:13','2021-07-10 00:43:13','K11A',NULL);
/*!40000 ALTER TABLE `adm_class` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `adm_class_group`
--

DROP TABLE IF EXISTS `adm_class_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `adm_class_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `adm_class_group`
--

LOCK TABLES `adm_class_group` WRITE;
/*!40000 ALTER TABLE `adm_class_group` DISABLE KEYS */;
/*!40000 ALTER TABLE `adm_class_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `adm_rule`
--

DROP TABLE IF EXISTS `adm_rule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `adm_rule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `poin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `adm_rule`
--

LOCK TABLES `adm_rule` WRITE;
/*!40000 ALTER TABLE `adm_rule` DISABLE KEYS */;
INSERT INTO `adm_rule` VALUES (1,'A1','Menggunakan perangkat selular dalam KBM','10',1,1,'2021-07-06 07:23:16','2021-07-06 07:23:16');
/*!40000 ALTER TABLE `adm_rule` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `adm_school`
--

DROP TABLE IF EXISTS `adm_school`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `adm_school` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fax` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `adm_school`
--

LOCK TABLES `adm_school` WRITE;
/*!40000 ALTER TABLE `adm_school` DISABLE KEYS */;
INSERT INTO `adm_school` VALUES (1,'SMK Tunas Bangsa','Jalan Kemerdekaan 75','dev.id.acc@gmail.com','021-0123456789','021-0123456789','Zulfahmi Ardiansah','dev.id.acc@gmail.com','smk-tunas-bangsa','2021-07-06 07:21:30','2021-07-06 07:21:30',NULL);
/*!40000 ALTER TABLE `adm_school` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `adm_student`
--

DROP TABLE IF EXISTS `adm_student`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `adm_student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nis` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_birth` date DEFAULT NULL,
  `place_birth` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picture` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `alumn_id` int(11) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `father_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_work` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_work` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vice_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vice_work` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `adm_student`
--

LOCK TABLES `adm_student` WRITE;
/*!40000 ALTER TABLE `adm_student` DISABLE KEYS */;
INSERT INTO `adm_student` VALUES (1,'00001','Baskara Putra Arjuna','2003-01-02','DKI Jakarta','L',1,'Jalan Kemerdekaan 75','baskara@sample.com','021-123456789',NULL,1,NULL,'$2y$10$kXNgyB8fs/f48lXsvHfyqehiKWqlHcEzUeGFwvHR5RqC1o2EETYEW','2021-07-06 07:22:49','2021-07-06 07:22:49',NULL,1,'Direktur',NULL,'Pengajar',NULL,'-',NULL);
/*!40000 ALTER TABLE `adm_student` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `adm_teacher`
--

DROP TABLE IF EXISTS `adm_teacher`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `adm_teacher` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `structural_pos` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `adm_teacher`
--

LOCK TABLES `adm_teacher` WRITE;
/*!40000 ALTER TABLE `adm_teacher` DISABLE KEYS */;
INSERT INTO `adm_teacher` VALUES (1,'Zulfahmi Ardiansah','dev.id.acc@gmail.com','$2y$10$RtoP.ldJFw0cD1fA9ynzKe.8Yk/lRCjikM//Zme9Jhe.S336WNNXO',1,'2021-07-06 07:21:30','2021-07-06 07:21:30',NULL,0,1,NULL,NULL);
/*!40000 ALTER TABLE `adm_teacher` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `beh_trophy`
--

DROP TABLE IF EXISTS `beh_trophy`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `beh_trophy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `get_at` date NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `attch` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `beh_trophy`
--

LOCK TABLES `beh_trophy` WRITE;
/*!40000 ALTER TABLE `beh_trophy` DISABLE KEYS */;
INSERT INTO `beh_trophy` VALUES (1,'Kejuaraan Robotika Dunia','2021-07-06','-','Internasional',1,'storage/files/attch-trophy/2021-07-06/142403_sample.pdf','2021-07-06 07:24:03','2021-07-06 07:24:03');
/*!40000 ALTER TABLE `beh_trophy` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `beh_violation`
--

DROP TABLE IF EXISTS `beh_violation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `beh_violation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `get_at` date NOT NULL,
  `rule_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `poin` int(11) DEFAULT NULL,
  `attch` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `beh_violation`
--

LOCK TABLES `beh_violation` WRITE;
/*!40000 ALTER TABLE `beh_violation` DISABLE KEYS */;
INSERT INTO `beh_violation` VALUES (1,'2021-07-12',1,1,1,'A1','Menggunakan perangkat selular dalam KBM',10,'storage/files/attch-violation/2021-07-11/173311_sample.pdf','2021-07-11 10:28:54','2021-07-11 10:33:11');
/*!40000 ALTER TABLE `beh_violation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2021_03_16_171854_create_adm_alumn_table',1),(2,'2021_03_16_171854_create_adm_class_group_table',1),(3,'2021_03_16_171854_create_adm_class_table',1),(4,'2021_03_16_171854_create_adm_rule_table',1),(5,'2021_03_16_171854_create_adm_school_table',1),(6,'2021_03_16_171854_create_adm_student_table',1),(7,'2021_03_16_171854_create_adm_teacher_table',1),(8,'2021_07_06_141412_create_beh_trophy_table',1),(9,'2021_07_06_143037_create_beh_violation_table',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'sobatedu'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-07-12  0:46:30
