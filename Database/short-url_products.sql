-- MySQL dump 10.13  Distrib 8.0.29, for Linux (x86_64)
--
-- Host: localhost    Database: short-url
-- ------------------------------------------------------
-- Server version	8.0.29-0ubuntu0.20.04.3

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `category_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `products_category_id_foreign` (`category_id`),
  CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,2,'Iphone 13','Review my Code and suggest me necessary tips to improve my skills in Laravel.',133000.00,'1654977231_71173613.jpg','2022-06-11 13:34:38','2022-06-11 13:53:51'),(2,4,'Member1','Hello',120.00,'1654977259_1339769163.png','2022-06-11 13:35:13','2022-06-11 13:54:19'),(3,4,'Member2','',100.00,'1654977271_1386644317.png','2022-06-11 13:35:31','2022-06-11 13:54:31'),(4,4,'Member3','Some Information',80.00,'1654977279_802507407.png','2022-06-11 13:35:54','2022-06-11 13:54:39'),(5,4,'Member4','',50.00,'1654977285_184130716.png','2022-06-11 13:36:10','2022-06-11 13:54:45'),(6,3,'Product1','',1500.00,'1654977300_930891438.jpg','2022-06-11 13:36:49','2022-06-11 13:55:00'),(7,3,'Product2','',1300.00,'1654977306_1267152166.jpg','2022-06-11 13:37:05','2022-06-11 13:55:06'),(8,3,'Product3','',1100.00,'1654985949_1549914899.jpg','2022-06-11 13:37:23','2022-06-11 16:19:09'),(9,3,'Product4','',1000.00,'1654985961_1515602726.jpg','2022-06-11 13:37:36','2022-06-11 16:19:21'),(10,1,'Blog1','',100.00,'1654977340_1105965076.jpg','2022-06-11 13:38:01','2022-06-11 13:55:40'),(11,1,'Blog2','',80.00,'1654977346_930197816.jpg','2022-06-11 13:38:16','2022-06-11 13:55:46'),(12,1,'Blog3','',50.00,'1654977944_336176732.jpg','2022-06-11 13:38:35','2022-06-11 14:05:44');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-06-12  4:25:48
