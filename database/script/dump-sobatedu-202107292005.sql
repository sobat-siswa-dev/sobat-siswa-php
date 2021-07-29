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
  `level` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `adm_class`
--

LOCK TABLES `adm_class` WRITE;
/*!40000 ALTER TABLE `adm_class` DISABLE KEYS */;
INSERT INTO `adm_class` VALUES (1,'Kelas 10-A IPA',1,1,'2021-07-06 07:22:00','2021-07-29 09:15:58','K10A-IPA',1,10),(2,'Kelas 11-A IPA',1,1,'2021-07-10 00:43:13','2021-07-29 08:51:42','K11A-IPA',NULL,11);
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `adm_class_group`
--

LOCK TABLES `adm_class_group` WRITE;
/*!40000 ALTER TABLE `adm_class_group` DISABLE KEYS */;
INSERT INTO `adm_class_group` VALUES (1,'IPA',1,1,'2021-07-29 08:51:52','2021-07-29 08:51:52'),(2,'IPS',1,1,'2021-07-29 08:51:58','2021-07-29 08:51:58');
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `adm_rule`
--

LOCK TABLES `adm_rule` WRITE;
/*!40000 ALTER TABLE `adm_rule` DISABLE KEYS */;
INSERT INTO `adm_rule` VALUES (1,'A1','Menggunakan perangkat selular dalam KBM','10',1,1,'2021-07-06 07:23:16','2021-07-06 07:23:16'),(2,'B1','Menggunakan seragam yang tidak sesuai','15',1,1,'2021-07-15 09:22:26','2021-07-15 09:22:26');
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
INSERT INTO `adm_school` VALUES (1,'SMK Tunas Bangsa','Jalan Kemerdekaan 75','dev.id.acc@gmail.com','021-0123456789','021-0123456789','Zulfahmi Ardiansah','dev.id.acc@gmail.com','smk-tunas-bangsa','2021-07-06 07:21:30','2021-07-18 03:22:58','storage/files/attch-school/2021-07-18/102258_6f25f-tutwurihandayani.png');
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `adm_student`
--

LOCK TABLES `adm_student` WRITE;
/*!40000 ALTER TABLE `adm_student` DISABLE KEYS */;
INSERT INTO `adm_student` VALUES (1,'00001','Baskara Putra Arjuna','2003-01-02','DKI Jakarta','L',1,'Jalan Kemerdekaan 75','baskara@sample.com','021-123456789',NULL,1,NULL,'$2y$10$14sNsqNlJOpNlcMyFe6M7OeUC.9MUVHqNxYrx58otOPLtis/JLfom','2021-07-06 07:22:49','2021-07-16 07:05:37',NULL,1,'Direktur',NULL,'Pengajar',NULL,'-',NULL),(2,'00002','Bima Garuda','2001-01-01','DKI Jakarta','L',1,'-',NULL,NULL,NULL,2,NULL,'$2y$10$/7LwVGYb.BM.vhhj20ePT.m3.4DOQfnTdvxjaJGiancWjcwEtx.oC','2021-07-13 08:10:54','2021-07-13 08:14:49',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `adm_student` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `adm_subject`
--

DROP TABLE IF EXISTS `adm_subject`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `adm_subject` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `adm_subject`
--

LOCK TABLES `adm_subject` WRITE;
/*!40000 ALTER TABLE `adm_subject` DISABLE KEYS */;
INSERT INTO `adm_subject` VALUES (2,'Bahasa Indonesia','MP-BI',NULL,1,1,'2021-07-28 12:24:23','2021-07-28 12:24:23'),(4,'Matematika','MP-MTK',NULL,1,1,'2021-07-29 06:43:39','2021-07-29 06:43:39'),(5,'Bahasa Inggris','MP-BING',NULL,1,1,'2021-07-29 06:43:56','2021-07-29 06:43:56'),(6,'Fisika','IPA-FK',1,1,1,'2021-07-29 08:52:16','2021-07-29 08:52:16'),(7,'Biologi','IPA-BI',1,1,1,'2021-07-29 08:52:41','2021-07-29 08:52:41'),(8,'Sejarah','IPS-SJ',2,1,1,'2021-07-29 08:53:01','2021-07-29 08:53:01');
/*!40000 ALTER TABLE `adm_subject` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `adm_subject_ex`
--

DROP TABLE IF EXISTS `adm_subject_ex`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `adm_subject_ex` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `adm_subject_ex`
--

LOCK TABLES `adm_subject_ex` WRITE;
/*!40000 ALTER TABLE `adm_subject_ex` DISABLE KEYS */;
INSERT INTO `adm_subject_ex` VALUES (1,'Taekwondo',NULL,NULL,1,1,'2021-07-29 12:15:29','2021-07-29 12:15:29'),(2,'Karate',NULL,NULL,1,1,'2021-07-29 12:15:47','2021-07-29 12:15:47');
/*!40000 ALTER TABLE `adm_subject_ex` ENABLE KEYS */;
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
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whatsapp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `adm_teacher`
--

LOCK TABLES `adm_teacher` WRITE;
/*!40000 ALTER TABLE `adm_teacher` DISABLE KEYS */;
INSERT INTO `adm_teacher` VALUES (1,'Zulfahmi Ardiansah','dev.id.acc@gmail.com','$2y$10$RtoP.ldJFw0cD1fA9ynzKe.8Yk/lRCjikM//Zme9Jhe.S336WNNXO',1,'2021-07-06 07:21:30','2021-07-18 03:40:46',NULL,1,1,'Staff IT','000000','021-123456789','DKI Jakarta','08924924823');
/*!40000 ALTER TABLE `adm_teacher` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `adm_token`
--

DROP TABLE IF EXISTS `adm_token`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `adm_token` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `student_id` int(11) DEFAULT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expired_at` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `adm_token`
--

LOCK TABLES `adm_token` WRITE;
/*!40000 ALTER TABLE `adm_token` DISABLE KEYS */;
INSERT INTO `adm_token` VALUES (3,1,NULL,'$2y$10$jV0zkKh9DvNNvJ2TeMGe5uznqLb8QhNKTQZ9XH58gHLcSSnV4Kui2','2021-07-29 15:58:07','2021-07-27 11:08:55','2021-07-28 08:58:07',1);
/*!40000 ALTER TABLE `adm_token` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `beh_counseling`
--

DROP TABLE IF EXISTS `beh_counseling`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `beh_counseling` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `held_date` date NOT NULL,
  `place` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `problem` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `solution` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `attch` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `beh_counseling`
--

LOCK TABLES `beh_counseling` WRITE;
/*!40000 ALTER TABLE `beh_counseling` DISABLE KEYS */;
INSERT INTO `beh_counseling` VALUES (1,'2021-07-14','Ruang BK','Sulit mengendalikan amarah ketika di sudutkan.','Diberikan bimbingan mengenai pengendalian emosi serta memahami psikis siswa.',1,1,'storage/files/attch-counseling/2021-07-15/121831_173311_sample.pdf','2021-07-15 05:16:47','2021-07-15 05:20:04');
/*!40000 ALTER TABLE `beh_counseling` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `beh_violation`
--

LOCK TABLES `beh_violation` WRITE;
/*!40000 ALTER TABLE `beh_violation` DISABLE KEYS */;
INSERT INTO `beh_violation` VALUES (3,'2021-07-14',1,2,2,'A1','Menggunakan perangkat selular dalam KBM',10,NULL,'2021-07-14 08:11:38','2021-07-14 08:11:38'),(4,'2021-07-16',1,2,2,'A1','Menggunakan perangkat selular dalam KBM',10,NULL,'2021-07-14 08:11:59','2021-07-14 08:11:59'),(5,'2021-06-15',1,1,1,'A1','Menggunakan perangkat selular dalam KBM',10,NULL,'2021-07-15 09:21:35','2021-07-15 09:21:35'),(6,'2021-06-18',2,2,2,'B1','Menggunakan seragam yang tidak sesuai',15,NULL,'2021-07-15 09:22:52','2021-07-15 09:22:52');
/*!40000 ALTER TABLE `beh_violation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kbm_announcement`
--

DROP TABLE IF EXISTS `kbm_announcement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kbm_announcement` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attch` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `creator_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kbm_announcement`
--

LOCK TABLES `kbm_announcement` WRITE;
/*!40000 ALTER TABLE `kbm_announcement` DISABLE KEYS */;
INSERT INTO `kbm_announcement` VALUES (1,'Lomba Hari Pendidikan Nasional','<h2><strong>Pengumuman</strong></h2><p>Sehubungan dengan diadakannya acara peringatan Hari Pendidikan Nasional 2021, maka pihak sekolah berencana untuk mengadakan berbagai rangkaian acara untuk peringatan hari tersebut. Beberapa rangkaian acara yang akan diselenggarakan adalah sebagai berikut :</p><p>1. Lomba Cepat Tepat (LCT) antar kelas<br>2. Lomba Pidato Bahasa Indonesia, Arab, Perancis, dan Inggris.<br>3. Lomba Karya Tulis Ilmiah<br>4. Lomba Cipta dan Baca Puisi<br>5. Lomba Cipta dan Baca Cerpen<br>6. Lomba Menulis Esai (Tema Pendidikan)</p><p>Beberapa rangkaian acara lomba tersebut akan dimulai pada tanggal 02 Mei 2021 sampai 04 Mei 2021. Diwajibkan kepada setiap kelas untuk mengajukan siswa-siswi sebagai perwakilan lomba. Bagi kelas yang tidak mengajukan delegasi perwakilan, maka akan dikenakan sanksi khusus sebagaimana yang telah disepakati oleh dewan guru dan OSIS. Untuk ketentuan dan tata cara pendaftaran lomba akan diberitahuan sesegera mungkin melalui surat edaran kepada ketua kelas masing-masing.</p><p>Demikian pengumuman ini kami sampaikan agar dapat ditaati dengan sebaik-baiknya. Atas perhatian dan kerja samanya kami ucapkan terima kasih.</p>','storage/files/attch-announcement/2021-07-18/135747_sample.pdf',1,'Zulfahmi Ardiansah',1,'2021-07-18 06:32:00','2021-07-18 06:57:47');
/*!40000 ALTER TABLE `kbm_announcement` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kbm_report`
--

DROP TABLE IF EXISTS `kbm_report`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kbm_report` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `attch` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `student_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  `semester` int(11) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `mark_total` decimal(8,2) DEFAULT NULL,
  `mark_rate` decimal(8,2) DEFAULT NULL,
  `get_at` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `year_learn` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_subject` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kbm_report`
--

LOCK TABLES `kbm_report` WRITE;
/*!40000 ALTER TABLE `kbm_report` DISABLE KEYS */;
INSERT INTO `kbm_report` VALUES (7,'storage/files/attch-report/2021-07-29/193420_173311_sample.pdf','Baskara Putra Arjuna','Kelas 10-A IPA',1,1,1,2,1,448.50,89.70,'2021-07-29','2021-07-29 12:34:20','2021-07-29 12:34:20','2020/2021',5);
/*!40000 ALTER TABLE `kbm_report` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kbm_report_det`
--

DROP TABLE IF EXISTS `kbm_report_det`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kbm_report_det` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `mark_knowledge` decimal(8,2) DEFAULT NULL,
  `mark_practice` decimal(8,2) DEFAULT NULL,
  `mark_total` decimal(8,2) DEFAULT NULL,
  `mark_limit` decimal(8,2) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `report_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kbm_report_det`
--

LOCK TABLES `kbm_report_det` WRITE;
/*!40000 ALTER TABLE `kbm_report_det` DISABLE KEYS */;
INSERT INTO `kbm_report_det` VALUES (13,88.00,88.00,88.00,75.00,2,7,'2021-07-29 12:34:20','2021-07-29 12:34:20'),(14,89.00,89.00,89.00,75.00,5,7,'2021-07-29 12:34:20','2021-07-29 12:34:20'),(15,94.00,94.00,94.00,75.00,4,7,'2021-07-29 12:34:20','2021-07-29 12:34:20'),(16,90.00,90.00,90.00,75.00,6,7,'2021-07-29 12:34:20','2021-07-29 12:34:20'),(17,87.50,87.50,87.50,75.00,7,7,'2021-07-29 12:34:20','2021-07-29 12:34:20');
/*!40000 ALTER TABLE `kbm_report_det` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kbm_report_det_ex`
--

DROP TABLE IF EXISTS `kbm_report_det_ex`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kbm_report_det_ex` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `mark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject_ex_id` int(11) DEFAULT NULL,
  `report_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kbm_report_det_ex`
--

LOCK TABLES `kbm_report_det_ex` WRITE;
/*!40000 ALTER TABLE `kbm_report_det_ex` DISABLE KEYS */;
INSERT INTO `kbm_report_det_ex` VALUES (1,'B',2,7,'2021-07-29 12:34:20','2021-07-29 12:34:20'),(2,'A',1,7,'2021-07-29 12:34:20','2021-07-29 12:34:20');
/*!40000 ALTER TABLE `kbm_report_det_ex` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2021_03_16_171854_create_adm_alumn_table',1),(2,'2021_03_16_171854_create_adm_class_group_table',1),(3,'2021_03_16_171854_create_adm_class_table',1),(4,'2021_03_16_171854_create_adm_rule_table',1),(5,'2021_03_16_171854_create_adm_school_table',1),(6,'2021_03_16_171854_create_adm_student_table',1),(7,'2021_03_16_171854_create_adm_teacher_table',1),(8,'2021_07_06_141412_create_beh_trophy_table',1),(9,'2021_07_06_143037_create_beh_violation_table',2),(10,'2021_07_14_165649_create_beh_counseling',3),(11,'2021_07_18_121422_create_kbm_announcement',4),(12,'2021_07_18_193837_create_adm_token',5),(13,'2021_07_28_175548_create_adm_subject',6),(16,'2021_07_28_193442_create_kbm_report',7),(17,'2021_07_28_193458_create_kbm_report_det',7),(18,'2021_07_29_191134_create_adm_subject_ex',8),(19,'2021_07_29_191918_create_kbm_report_det_ex',9);
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

-- Dump completed on 2021-07-29 20:05:03
