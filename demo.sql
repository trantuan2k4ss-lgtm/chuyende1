/*M!999999\- enable the sandbox mode */ 
-- MariaDB dump 10.19-11.8.2-MariaDB, for osx10.18 (arm64)
--
-- Host: localhost    Database: shop_fashion
-- ------------------------------------------------------
-- Server version	11.8.2-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*M!100616 SET @OLD_NOTE_VERBOSITY=@@NOTE_VERBOSITY, NOTE_VERBOSITY=0 */;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `cache` VALUES
('laravel-cache-cc@gmail.com|127.0.0.1','i:1;',1776679655),
('laravel-cache-cc@gmail.com|127.0.0.1:timer','i:1776679655;',1776679655);
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_locks_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
set autocommit=0;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `status` enum('hien','an') NOT NULL DEFAULT 'hien',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `categories` VALUES
(10,'Vợt Pickleball','vot-pickleball','VỢT PICKLEBALL','hien','2026-04-21 03:25:46','2026-04-21 03:26:02'),
(11,'Bóng Pickleball','bong-pickleball','Bóng Pickleball','hien','2026-04-21 03:26:15','2026-04-21 03:26:15'),
(12,'Túi Pickleball','tui-pickleball','Túi Pickleball','hien','2026-04-21 03:26:20','2026-04-21 03:26:20'),
(13,'Phụ kiện','phu-kien','Phụ kiện','hien','2026-04-21 03:26:28','2026-04-21 03:26:28'),
(14,'Adidas','adidas','Thương hiệu adidas','an','2026-04-21 03:36:08','2026-04-21 03:36:27');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
set autocommit=0;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
set autocommit=0;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
set autocommit=0;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `migrations` VALUES
(1,'0001_01_01_000000_create_users_table',1),
(2,'0001_01_01_000001_create_cache_table',1),
(3,'0001_01_01_000002_create_jobs_table',1),
(4,'2026_04_09_171754_create_categories_table',1),
(5,'2026_04_09_171858_create_products_table',1),
(6,'2026_04_09_171918_create_product_images_table',1),
(7,'2026_04_09_171939_create_vouchers_table',1),
(8,'2026_04_09_171952_create_orders_table',1),
(9,'2026_04_09_172007_create_order_items_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `order_items` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` bigint(20) unsigned NOT NULL,
  `product_id` bigint(20) unsigned NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `size` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cost_price` decimal(10,2) NOT NULL DEFAULT 0.00,
  PRIMARY KEY (`id`),
  KEY `order_items_order_id_foreign` (`order_id`),
  KEY `order_items_product_id_foreign` (`product_id`),
  CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_items`
--

LOCK TABLES `order_items` WRITE;
/*!40000 ALTER TABLE `order_items` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `order_items` VALUES
(7,8,5,1,8900000.00,NULL,NULL,'2026-04-21 03:58:23','2026-04-21 03:58:23',0.00),
(8,8,9,1,9999999.00,NULL,NULL,'2026-04-21 03:58:23','2026-04-21 03:58:23',0.00),
(9,8,14,1,1499999.00,NULL,NULL,'2026-04-21 03:58:23','2026-04-21 03:58:23',0.00),
(10,9,13,2,12000000.00,NULL,NULL,'2026-04-21 04:15:20','2026-04-21 04:15:20',0.00),
(11,9,14,1,1499999.00,NULL,NULL,'2026-04-21 04:15:20','2026-04-21 04:15:20',0.00),
(12,10,14,1,1499999.00,NULL,NULL,'2026-04-21 04:18:46','2026-04-21 04:18:46',0.00),
(13,11,13,50,12000000.00,NULL,NULL,'2026-04-21 04:28:37','2026-04-21 04:28:37',0.00),
(14,13,14,1,1499999.00,NULL,NULL,'2026-04-21 04:33:53','2026-04-21 04:33:53',0.00),
(15,14,14,1,1499999.00,NULL,NULL,'2026-04-21 04:34:24','2026-04-21 04:34:24',0.00),
(16,15,6,1,10000000.00,NULL,NULL,'2026-04-23 00:23:29','2026-04-23 00:23:29',0.00),
(17,16,14,1,1499999.00,NULL,NULL,'2026-04-23 00:25:00','2026-04-23 00:25:00',0.00),
(18,17,6,200,10000000.00,NULL,NULL,'2026-04-23 00:28:14','2026-04-23 00:28:14',0.00),
(19,18,14,1,1499999.00,NULL,NULL,'2026-04-23 00:42:16','2026-04-23 00:42:16',0.00),
(20,19,14,1,1499999.00,NULL,NULL,'2026-04-23 00:44:21','2026-04-23 00:44:21',0.00),
(21,20,14,4,1499999.00,NULL,NULL,'2026-04-23 00:59:44','2026-04-23 00:59:44',0.00);
/*!40000 ALTER TABLE `order_items` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `voucher_id` bigint(20) unsigned DEFAULT NULL,
  `receiver_name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `total_price` decimal(15,2) DEFAULT NULL,
  `discount_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `status` enum('cho_xac_nhan','da_xac_nhan','dang_giao','hoan_thanh','da_huy') NOT NULL DEFAULT 'cho_xac_nhan',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `payment_method` enum('cod','bank') DEFAULT 'cod',
  PRIMARY KEY (`id`),
  KEY `orders_user_id_foreign` (`user_id`),
  KEY `orders_voucher_id_foreign` (`voucher_id`),
  CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `orders_voucher_id_foreign` FOREIGN KEY (`voucher_id`) REFERENCES `vouchers` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `orders` VALUES
(1,1,NULL,'Nguyen Van A','0123456789','Ha Noi',0.00,0.00,'hoan_thanh','2026-04-16 08:52:33','2026-04-16 09:06:27','cod'),
(2,1,NULL,'t','0338022004','1',249000.00,0.00,'da_huy','2026-04-20 01:07:27','2026-04-20 02:53:41','cod'),
(3,1,NULL,'trần văn hiểu','0338022004','xuân phương',897000.00,0.00,'dang_giao','2026-04-20 02:55:37','2026-04-21 01:05:02','cod'),
(4,3,NULL,'trần văn hiểu','0338022004','cccc',299000.00,0.00,'cho_xac_nhan','2026-04-20 03:20:54','2026-04-20 03:20:54','cod'),
(5,2,NULL,'trần văn hiểu','0338022004','gn',249000.00,0.00,'da_huy','2026-04-20 03:43:53','2026-04-20 17:51:13','cod'),
(6,4,NULL,'Trần Văn Hiểu','0338022004','nam từ liêm',249000.00,0.00,'cho_xac_nhan','2026-04-20 18:00:27','2026-04-20 18:00:27','cod'),
(7,4,NULL,'Trần Văn Hiểu','0338022004','nam từ liêm',259000.00,0.00,'da_xac_nhan','2026-04-21 01:03:04','2026-04-21 01:05:05','cod'),
(8,1,NULL,'trần văn hiểu','0338022004','v',20399998.00,0.00,'cho_xac_nhan','2026-04-21 03:58:23','2026-04-21 03:58:23','cod'),
(9,1,NULL,'Trần Văn Hiểu','0879970472','vn',25499999.00,0.00,'cho_xac_nhan','2026-04-21 04:15:20','2026-04-21 04:15:20','cod'),
(10,1,NULL,'cc','2','cc',1499999.00,0.00,'cho_xac_nhan','2026-04-21 04:18:46','2026-04-21 04:18:46','cod'),
(11,1,NULL,'cc','cc','cc',6000000.00,0.00,'cho_xac_nhan','2026-04-21 04:28:37','2026-04-21 04:28:37','cod'),
(13,1,NULL,'cc','cc','cc',-13350001.00,0.00,'cho_xac_nhan','2026-04-21 04:33:53','2026-04-21 04:33:53','cod'),
(14,1,NULL,'z','zz','zzz',1499999.00,0.00,'cho_xac_nhan','2026-04-21 04:34:24','2026-04-21 04:34:24','cod'),
(15,2,NULL,'Trần Văn Hiểu','0338022004','HN',10000000.00,0.00,'dang_giao','2026-04-23 00:23:29','2026-04-23 00:24:04','cod'),
(16,2,NULL,'ok','0338022004','HN',14999.99,0.00,'cho_xac_nhan','2026-04-23 00:25:00','2026-04-23 00:25:00','cod'),
(17,1,NULL,'cc','0338022004','cc',2000000000.00,0.00,'da_huy','2026-04-23 00:28:14','2026-04-23 00:34:16','cod'),
(18,2,NULL,'Trần Văn Hiểu','0338022004','HN',1499999.00,0.00,'da_huy','2026-04-23 00:42:16','2026-04-23 00:44:35','cod'),
(19,2,NULL,'Trần Văn Hiểu','0338022004','HN',1499999.00,0.00,'hoan_thanh','2026-04-23 00:44:21','2026-04-23 00:44:28','cod'),
(20,2,NULL,'Trần Văn Hiểu','0338022004','HN',5999996.00,0.00,'hoan_thanh','2026-04-23 00:59:44','2026-04-23 01:00:24','cod');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
set autocommit=0;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `product_images`
--

DROP TABLE IF EXISTS `product_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_images` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) unsigned NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_images_product_id_foreign` (`product_id`),
  CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=104 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_images`
--

LOCK TABLES `product_images` WRITE;
/*!40000 ALTER TABLE `product_images` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `product_images` VALUES
(6,5,'products/anYnUVLE8b6fS7a7qeJtsCvqAToYU1M6U3rZw1J5.jpg','2026-04-21 03:28:50','2026-04-21 03:28:50'),
(7,5,'products/mIbkCEe1Hw8zJfReOrt3PD8NRRvnL8rUgcU0tUCh.jpg','2026-04-21 03:28:50','2026-04-21 03:28:50'),
(8,5,'products/oDRj9TKdF2FtdbeL0iP50e5KuIJY3hVF1va6Mi6Z.jpg','2026-04-21 03:28:50','2026-04-21 03:28:50'),
(9,5,'products/7nWcmfPE4aBAXCMO0FwHGgJSgbFe9OEjgQyp4RCh.png','2026-04-21 03:28:50','2026-04-21 03:28:50'),
(10,5,'products/vjTALs4pTUzCZdMIYdS8MHBG3yOvDvzmYVS9fy7Z.png','2026-04-21 03:28:50','2026-04-21 03:28:50'),
(11,5,'products/RrMkFmxqEe13FaSibStyFi0evqnJCgH2veoxCj5S.png','2026-04-21 03:28:50','2026-04-21 03:28:50'),
(12,6,'products/LnSETTJUA8YvSetP9JnLivZfTaNOgQvMXOQUGrC1.jpg','2026-04-21 03:31:37','2026-04-21 03:31:37'),
(13,6,'products/n7aN4SFTnNDyeS6u3RiM2UgtAqAQiM7jDNhJcEbJ.jpg','2026-04-21 03:31:37','2026-04-21 03:31:37'),
(14,6,'products/wItERo1U1vFeV95C2JmxTSsMyapJ24043sXMETgr.jpg','2026-04-21 03:31:37','2026-04-21 03:31:37'),
(15,6,'products/zOsVt2tSqtdg6cBMYybDXVfFZ28Fw3yHUgAiXrME.jpg','2026-04-21 03:31:37','2026-04-21 03:31:37'),
(16,6,'products/gimyfGXiF5uKBrzXg0Cs7DX0vWaW4s8hWbCqln8w.jpg','2026-04-21 03:31:37','2026-04-21 03:31:37'),
(30,8,'products/5QhitgtMEgM5wdvWcOhEhYnwipAZN59epjlmZt53.jpg','2026-04-21 03:35:27','2026-04-21 03:35:27'),
(31,8,'products/cfVMSt2ARn4soZZFsE3x5TBzljVG57PgBWWfC2En.jpg','2026-04-21 03:35:27','2026-04-21 03:35:27'),
(32,8,'products/gx4EzCCbxOML72R4xdAKJUoWpgWdOIf46ZmveT4S.jpg','2026-04-21 03:35:27','2026-04-21 03:35:27'),
(33,8,'products/tBhZbbIaeM7NjhjBSIxyi6lbuisDWiUDeXxgBx2I.jpg','2026-04-21 03:35:27','2026-04-21 03:35:27'),
(34,8,'products/tmV4Ih2li37SgSJF6Xn2DRQG8nHBcNHvgim0gzQQ.jpg','2026-04-21 03:35:27','2026-04-21 03:35:27'),
(35,8,'products/mqvFokyyxzW6nDAZLAaMqWbOo7pYTXNgkye01AaW.jpg','2026-04-21 03:35:28','2026-04-21 03:35:28'),
(36,9,'products/V7xDBJutVAPIuAuD3S4N10So41AUBQ5pTPDJ253S.jpg','2026-04-21 03:45:54','2026-04-21 03:45:54'),
(37,9,'products/mKwZ5gQZFIJokso96OhSrmMuQMiJZfD9jIFxRrRu.jpg','2026-04-21 03:45:54','2026-04-21 03:45:54'),
(38,9,'products/wUm07OZNaXJ7xH9UoNWUhctfjRM2GtQ6tXGYEkpC.jpg','2026-04-21 03:45:54','2026-04-21 03:45:54'),
(39,9,'products/mcgE0NfvFXRpmX1jp5SO1Z7Ow6KxGZOBtInxlc47.jpg','2026-04-21 03:45:54','2026-04-21 03:45:54'),
(40,9,'products/rgYKrXZRPMWLnwPYzqzqhdcmimCK8UAITT9HFrM3.jpg','2026-04-21 03:45:54','2026-04-21 03:45:54'),
(41,9,'products/bgPCC0STIv1HKwXqBYWMUAVH72rfHfIKI6DAh8yk.jpg','2026-04-21 03:45:54','2026-04-21 03:45:54'),
(42,9,'products/oS93fvgEtPEPWYmA862L9vtcqP6CwoHuaMY8ct2j.jpg','2026-04-21 03:45:54','2026-04-21 03:45:54'),
(43,10,'products/F3dfP713JT77DlJHhEz4lxgnmA6hvetwERx9HIr6.jpg','2026-04-21 03:47:49','2026-04-21 03:47:49'),
(44,10,'products/HmlxOVooBpSc7FFF1yUVxnLflr1xdC2lWAQt8typ.jpg','2026-04-21 03:47:49','2026-04-21 03:47:49'),
(45,10,'products/RDwez60ud5RTYRgMMNPIiEuBKIBuUbZBOKGiLj6Z.jpg','2026-04-21 03:47:49','2026-04-21 03:47:49'),
(46,10,'products/BvdT4bwnHLtVMibqSR65EuhbWwuJGJbvP4dCLi1Y.jpg','2026-04-21 03:47:49','2026-04-21 03:47:49'),
(47,10,'products/k0LYnELh0UIRtI1CTfDV4xPW6qXEuoLrQ4SwMe0Q.jpg','2026-04-21 03:47:49','2026-04-21 03:47:49'),
(48,10,'products/wexxst0VdZEV6Uk2oZ10Y3DSJ01C81L2r6UAXETO.jpg','2026-04-21 03:47:49','2026-04-21 03:47:49'),
(49,11,'products/d2FeuEDYexiXGnkWUfgBwSNrIxJdFVaa2qgqX9IJ.jpg','2026-04-21 03:48:48','2026-04-21 03:48:48'),
(50,11,'products/BTlkUVRWUu2pTVYPJj1vRIHNGvKR6a4tCeBd59NG.jpg','2026-04-21 03:48:48','2026-04-21 03:48:48'),
(51,11,'products/zuRMAR4yL5r5SMZyBB2ZaU1AEF1DkWp9ePW7syma.jpg','2026-04-21 03:48:48','2026-04-21 03:48:48'),
(52,11,'products/3hovcrRX6naZTeLeIzRNJdm3xQY3I1AljWwVht08.jpg','2026-04-21 03:48:48','2026-04-21 03:48:48'),
(53,11,'products/w7sF3OEq4wJwp0uCzWIupCcbHFQZZbiuC4CJOcru.jpg','2026-04-21 03:48:48','2026-04-21 03:48:48'),
(54,11,'products/rduzBu973VrkesFiaOvm6JnClgUZBBUsI7SWitkY.jpg','2026-04-21 03:48:48','2026-04-21 03:48:48'),
(55,11,'products/5VFJiWRPN3NEnMN7dIyRdV9SniveceiQb6UnCRgj.jpg','2026-04-21 03:48:48','2026-04-21 03:48:48'),
(56,12,'products/btH79JvP4UKsUqWA2FJCThtQcqjVG3TIMviR6RUs.jpg','2026-04-21 03:50:03','2026-04-21 03:50:03'),
(57,12,'products/8gT8fVK4shjzA6IhC2lrh5U9VGKCx38g9qnZtAex.jpg','2026-04-21 03:50:03','2026-04-21 03:50:03'),
(58,12,'products/l8XNwIEWQogqqgxb3VJbMSU89aQYP1xxVDVhvmCj.jpg','2026-04-21 03:50:03','2026-04-21 03:50:03'),
(59,12,'products/O9BNADXBehW1xnR0ckYJ6V3iDD9y8SST4XOoUUV2.jpg','2026-04-21 03:50:03','2026-04-21 03:50:03'),
(60,12,'products/1K56uotKCDwNnBTihxGSqAgiVOdvaILPz2ZvBqNk.jpg','2026-04-21 03:50:03','2026-04-21 03:50:03'),
(61,12,'products/BTqj8cYkvZoOfiBKKw6REzrB9T0X54Vd5MmSDBwn.jpg','2026-04-21 03:50:03','2026-04-21 03:50:03'),
(62,13,'products/b8ND6anyenV1rOYVt10AG55MMjveM6GwrqdWda33.jpg','2026-04-21 03:53:32','2026-04-21 03:53:32'),
(63,13,'products/nXGoN48GOpNr3rkhNQLWTohvDfMoE7JXhYSt9XfV.jpg','2026-04-21 03:53:32','2026-04-21 03:53:32'),
(64,13,'products/zgO4vPclDALkAm9zRSRQZaJbvnSkQMnQvM14Kde2.jpg','2026-04-21 03:53:32','2026-04-21 03:53:32'),
(65,13,'products/Mb4Vqbc6ZPIZQIaegj90aCUQ9AFC2BUCHFOTybMQ.jpg','2026-04-21 03:53:32','2026-04-21 03:53:32'),
(66,13,'products/hwly7JWgmggX30DGFSXIf5BmMbNOhjahbQ3JOSNl.jpg','2026-04-21 03:53:32','2026-04-21 03:53:32'),
(67,13,'products/jTfMmmJvkCytgRLbNuQmT3lTu70cHUClZgevTqX2.jpg','2026-04-21 03:53:32','2026-04-21 03:53:32'),
(68,14,'products/KO56df5Qm9wO56sWj22vb5C1U9DajAdCNNImBDwE.png','2026-04-21 03:57:00','2026-04-21 03:57:00'),
(69,14,'products/hIrjcnZzn4PbkAReZPsQ79vNJu95xpyhkKXkyZCm.png','2026-04-21 03:57:00','2026-04-21 03:57:00'),
(70,14,'products/VobJ008cua3RmVYB0GmwWnBVVH7P3jxEBLToE5ID.png','2026-04-21 03:57:00','2026-04-21 03:57:00'),
(71,14,'products/jyj47amgvYWR2HRm2Sgx7jsR2uMDdh12qOCRTF8j.png','2026-04-21 03:57:00','2026-04-21 03:57:00'),
(72,14,'products/AwHFMtSkpDRAtcWc9xZ6iRALJfB5YAodKiv3SMx7.png','2026-04-21 03:57:00','2026-04-21 03:57:00'),
(73,14,'products/9vD4Z6kADjFHtQRQ9idZVLZuwxFEwd0hzzSgjnfV.png','2026-04-21 03:57:00','2026-04-21 03:57:00'),
(74,16,'products/Vb0rmXMggZYIwLxh9GNT8ErgQOrDCoHXdJt8fsR4.webp','2026-04-23 01:03:42','2026-04-23 01:03:42'),
(75,16,'products/BDdSGrJybLfvFhc1TQweBkLJhzIBxtu09VU5DgGE.webp','2026-04-23 01:03:42','2026-04-23 01:03:42'),
(76,16,'products/LXlmXUHPaV3uwBPjieaEHfrWYxdI0gxplGuE3ioA.jpg','2026-04-23 01:03:42','2026-04-23 01:03:42'),
(77,16,'products/FvLtXny8GWP1VbEM06UsgtC6ZrnaGvvFFVmkz7u5.webp','2026-04-23 01:03:42','2026-04-23 01:03:42'),
(78,16,'products/wR5rXdDQtENgZo8r7MRGWkCiGDRkoHGViw4X0SCD.jpg','2026-04-23 01:03:42','2026-04-23 01:03:42'),
(79,16,'products/rabk7n4Nn7KqzeUMgOMWAsLn7Wo5pypYpqh4pzNV.webp','2026-04-23 01:03:42','2026-04-23 01:03:42'),
(80,17,'products/HREjJTK8YiaeLf4PXL6oBV70CmBgopoilj11XuXa.jpg','2026-04-23 01:04:45','2026-04-23 01:04:45'),
(81,17,'products/afiZWCSEtLRpgVnYtMo3EJtKuN3EzZlvW33fferR.jpg','2026-04-23 01:04:45','2026-04-23 01:04:45'),
(82,17,'products/lv29cgrftWL5eSOdCXlsT8yeEKQXfByWFsvgjD98.jpg','2026-04-23 01:04:45','2026-04-23 01:04:45'),
(83,17,'products/YxF8bUQIGXV90ShoEMgFTO17z79vLR9fcZGLtJxU.jpg','2026-04-23 01:04:45','2026-04-23 01:04:45'),
(84,17,'products/61QKDXoztvvae6FC6qUkJyE4bdEHiWEkQCnJNMxk.jpg','2026-04-23 01:04:45','2026-04-23 01:04:45'),
(85,17,'products/aG1zWv43OFoa16JK3YUSro2xAtCHZY2ibzV6gOjZ.jpg','2026-04-23 01:04:45','2026-04-23 01:04:45'),
(86,18,'products/Emehc7kHmwe0zGUYp2GLzTzM0KlMhZIH1mbSLIiZ.webp','2026-04-23 01:06:56','2026-04-23 01:06:56'),
(87,18,'products/Fxw9suZZai2WzuaIIPJLW6fBNriQ7AVKgKhwFoGP.jpg','2026-04-23 01:06:56','2026-04-23 01:06:56'),
(88,18,'products/Gd2BWUfj3HOQ7dnHwtHZxwzeWaYt3THUIt2E3hev.jpg','2026-04-23 01:06:56','2026-04-23 01:06:56'),
(89,18,'products/s2SfTFakLa4KKtPswGjaKb8MR4gsJlRRosi7Yi8J.webp','2026-04-23 01:06:56','2026-04-23 01:06:56'),
(90,18,'products/yEcOFxE3f1DkT1f6KQYurMQH8QPUZl5sXYkvlKuk.webp','2026-04-23 01:06:56','2026-04-23 01:06:56'),
(91,18,'products/EqawRqAYbStuP2qXSmG0Bu0MJ1eL9qNgpURRk7WC.webp','2026-04-23 01:06:56','2026-04-23 01:06:56'),
(92,19,'products/kBP6LsbYjObnjUoYalaEGfO27pTfL7fFWfjA4VFD.jpg','2026-04-23 01:11:26','2026-04-23 01:11:26'),
(93,19,'products/gxIk9ZaB4A0hWRhfN18hCaeibHM1jDEf6UxahQRk.jpg','2026-04-23 01:11:26','2026-04-23 01:11:26'),
(94,19,'products/gDfzbaNFoO3jll9lhQZkHaar1GeVn48ocA9sTBut.jpg','2026-04-23 01:11:26','2026-04-23 01:11:26'),
(95,19,'products/5w1jWPD1JMZqM7aanjnVMoXnSddFY6a4DXFpHqHR.jpg','2026-04-23 01:11:26','2026-04-23 01:11:26'),
(96,19,'products/i6MVvzX61Fl1GpYbKk0VCcvYKr3TloNPeIPGLhT5.jpg','2026-04-23 01:11:26','2026-04-23 01:11:26'),
(97,19,'products/8X3sopGYxHR36Nz79T0om4eYKaqfDJSSEw6LuNUk.jpg','2026-04-23 01:11:26','2026-04-23 01:11:26'),
(98,20,'products/SYFkngHNSRo5lUf9zxnv9Am8TCI8BSl0m04H4Mmx.jpg','2026-04-23 01:12:29','2026-04-23 01:12:29'),
(99,20,'products/xY6bkufWiP1X8n3UZDQGqBMbFjKbcJ17tzAcD9GK.jpg','2026-04-23 01:12:29','2026-04-23 01:12:29'),
(100,20,'products/bMiQfWiZcohewup8oEtVM4NiYoveI5T8GBEPaSRp.jpg','2026-04-23 01:12:29','2026-04-23 01:12:29'),
(101,20,'products/N7zV6rWEE3jT4B5qUApD34LEqhvUN2HxanBi182D.jpg','2026-04-23 01:12:29','2026-04-23 01:12:29'),
(102,20,'products/51nfQ1you6xjqsjKpf5mS59zet8YoCbihbzHWk1U.jpg','2026-04-23 01:12:29','2026-04-23 01:12:29'),
(103,20,'products/gAEScEU1F1R3GGoTtlV1LiMmpyIX0Epvi6vH4tPW.jpg','2026-04-23 01:12:29','2026-04-23 01:12:29');
/*!40000 ALTER TABLE `product_images` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `cost_price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `sale_price` decimal(10,2) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `gender` enum('nam','nu','tre_em') NOT NULL DEFAULT 'nam',
  `size` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `stock` int(11) NOT NULL DEFAULT 0,
  `status` enum('hien','an') NOT NULL DEFAULT 'hien',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `products_slug_unique` (`slug`),
  KEY `products_category_id_foreign` (`category_id`),
  CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `products` VALUES
(5,10,'Vợt Pickleball Holbrook ARMA T Metallic 14mm','vot-pickleball-holbrook-arma-t-metallic-14mm-1776742130',12499999.00,0.00,8900000.00,'Vợt pickleball Holbrook ARMA T Metallic 14mm là lựa chọn hàng đầu cho người chơi tìm kiếm sự kết hợp giữa tầm với vượt trội, khả năng tạo xoáy mạnh mẽ, và sức mạnh bùng nổ trong từng cú đánh. Đây là mẫu vợt có tay cầm dài nhất và thiết kế thân dài nhất trong dòng ARMA, rất lý tưởng cho các tay vợt thích đánh từ cuối sân và kiểm soát khu vực lưới.','products/ZITsGqJcgjeMnZp5Al3W8d9TFOqyWWBIzw42xeLl.png','nam',NULL,NULL,100,'hien','2026-04-21 03:28:50','2026-04-21 03:28:50'),
(6,10,'Vợt Pickleball ProXR Signature Series 13mm','vot-pickleball-proxr-signature-series-13mm-1776742297',15000000.00,0.00,10000000.00,'Vợt Pickleball ProXR Signature Series 13mm Carbon\r\nĐược thiết kế để tạo lực, độ bật và tầm với, Vợt  ProXR Signature Series 13mm giúp người chơi dễ dàng cất bóng và có độ phủ ấn tượng. Hình dạng thuôn dài cung cấp cho chúng tôi bề mặt đánh bằng sợi carbon thô 10,5” x 7,5”. Bề mặt này kết hợp độ cứng và kết cấu tự nhiên để tăng khả năng tạo độ xoáy thông qua thời gian dừng và ma sát. Thời gian dừng kéo dài này cũng thúc đẩy khả năng kiểm soát thêm một chút để toàn bộ lực của vợt không bị lãng phí.\r\n\r\nSức mạnh và độ bật mà chúng tôi đề cập là một tính năng nổi bật trong Vợt bóng chày ProXR Signature Series 13mm đến từ sự kết hợp của các vật liệu lõi. Lõi Polypropylene Honeycomb dày 13mm với chu vi bọt chống sốc kết hợp để tạo phản ứng đàn hồi và độ bật lại phía sau bóng, điểm ngọt mở rộng để đánh bóng liên tục và khả năng cày xuyên qua khi chúng tôi đánh bóng gần mép. Mặt khác, tầm với được thể hiện rõ ở tay cầm bọc tiêu chuẩn dài 6” cực dài.','products/4e9KIRJs0DfysiYlPcJHzYPM5XuYwqGRTdj4mmeD.jpg','nam',NULL,NULL,799,'hien','2026-04-21 03:31:37','2026-04-23 00:28:14'),
(8,10,'Vợt Pickleball Adidas ADIPOWER PRO Edition CTRL 16mm','vot-pickleball-adidas-adipower-pro-edition-ctrl-16mm-1776742527',14999999.00,0.00,8999999.00,'ADIPOWER PRO CTRL 16mm sử dụng mặt carbon thô (Raw Carbon Face) mang lại khả năng tạo xoáy tự nhiên và cảm giác chạm bóng chân thực. Kết hợp cùng lõi PB Honeycomb LD được đệm bởi TriFoam, cây vợt giúp giảm rung tối đa, tăng độ êm khi tiếp bóng nhưng vẫn giữ được độ phản hồi chính xác.\r\n\r\nThiết kế chiều dài tiêu chuẩn 16 inch và mặt rộng 8 inch tạo điểm ngọt lớn – giúp người chơi dễ dàng phòng thủ, chặn bóng và điều hướng cú đánh một cách ổn định.','products/TyZ31YjnoPIBzYIFDIdIVRFfiyRSgV3vAcHW3p0W.jpg','nam',NULL,NULL,1000,'hien','2026-04-21 03:35:27','2026-04-21 03:35:27'),
(9,10,'Vợt Pickleball JOOLA Pro V Kosmos','vot-pickleball-joola-pro-v-kosmos-1776743154',13999999.00,0.00,9999999.00,'Vợt Pickleball JOOLA Pro V Kosmos\\nmang đến một thiết kế\\nhybrid hoàn toàn mới\\n, kết hợp tầm với của Perseus với sweet spot rộng của Scorpeus. Đây là lựa chọn lý tưởng cho người chơi muốn\\ndrive mạnh từ baseline, phản công nhanh ở kitchen và chuyển trạng thái mượt mà lên lưới\\n.\\nKosmos Pro V được trang bị công nghệ\\nKineticFrame (patent-pending)\\ngiúp vợt linh hoạt lưu trữ năng lượng khi vung và giải phóng đúng thời điểm khi tiếp xúc bóng – tăng độ chính xác mà không làm mất kiểm soát.','products/jKybspKONpSI6IL1MQPMhg50hJAqzFIvgwisdKe5.jpg','nam',NULL,NULL,100,'hien','2026-04-21 03:45:54','2026-04-21 03:45:54'),
(10,10,'Vợt Pickleball Proton Series 1 Type A Square 15mm','vot-pickleball-proton-series-1-type-a-square-15mm-1776743269',23999999.00,0.00,15999999.00,'Vợt Pickleball Proton Series 1 Type A Square 15mm \r\nKiểm soát, kiểm soát, kiểm soát, Vợt  Proton  Series One Type A Square 15mm được thiết kế để cung cấp cho chúng ta độ chính xác sẵn sàng cho giải đấu để chúng ta có thể giữ đối thủ mất thăng bằng và không vào lưới. Lõi Polypropylene Honeycomb 15mm nằm ở trung tâm của khả năng kiểm soát này. Lõi độc quyền này không chỉ hấp thụ rung động để tạo cảm giác mềm mại giúp chúng ta thực hiện các cú đánh chính xác mà còn giúp kéo dài điểm ngọt từ cạnh bảo vệ này sang cạnh bảo vệ khác để có những cú đánh nhất quán trên toàn bộ mặt vợt.\r\n\r\nNói về mặt vợt, Vợt  Proton  Series One Type A Square 15mm tự hào có bề mặt đánh bằng sợi carbon cấp hàng không vũ trụ 10,5” x 8,25” với kết cấu NanoTac tích hợp. Kết cấu này được tích hợp vĩnh viễn vào sợi carbon để có độ bền và tuổi thọ ấn tượng, phù hợp với độ bám hàng đầu. Kết cấu này giữ chặt bóng khi bóng nằm trên bề mặt đánh cứng để chúng ta có thể dễ dàng thực hiện các cú giao bóng xoáy, cắt bóng có kiểm soát và đánh bóng xoáy lên. Tay cầm 5,25” giữ cho bàn tay của chúng ta gần với điểm ngọt ngào để có những cú đánh nhất quán và nạp đạn ngắn gọn trong các trận chiến tay trên lưới.','products/dWAn6Az1dSJ9TJxsMvkSzoOPGHDty3ei7Rs0ANXR.jpg','nam',NULL,NULL,100,'hien','2026-04-21 03:47:49','2026-04-21 03:47:49'),
(11,10,'Vợt Pickleball Proton Series 2','vot-pickleball-proton-series-2-1776743328',18999999.00,0.00,14999999.00,'Nếu bạn tập trung vào việc giành chiến thắng trong các trận đấu tay đôi với khả năng nạp đạn nhanh và khả năng điều khiển ấn tượng, thì Proton Series 2  không cạnh sẽ chứng minh là một công cụ tuyệt vời dành cho bạn. Chiếc vợt có hình dạng lai này tự hào có bề mặt đánh bằng sợi carbon cấp hàng không vũ trụ dài 11” x 7.375”. Được phủ một lớp kết cấu nhám, bề mặt đánh này cung cấp thời gian dừng thông qua độ cứng và nhiều vòng quay thông qua tac, để chúng ta có thể thực hiện tất cả các cú đánh mà trò chơi hiện đại yêu cầu. Mặt vợt này trải dài đến tận hai cạnh nhờ thiết kế không cạnh giúp tăng cường tốc độ tay và nạp đạn của chúng ta để chúng ta có thể chiếm ưu thế trên lưới.','products/5wIqlw86Lo6SqfyUGEOqOH1P74CAMaeM4UxfnzVf.jpg','nam',NULL,NULL,100,'hien','2026-04-21 03:48:48','2026-04-21 03:48:48'),
(12,10,'Vợt Pickleball VERSIX Vector XL','vot-pickleball-versix-vector-xl-1776743433',15000000.00,0.00,15000000.00,'Thiết Kế Dài – Mở Rộng Khả Năng Tấn Công & Phòng Thủ\\nVERSIX Vector XL sở hữu chiều dài 16.5 inch, mang đến lợi thế vượt trội trong các pha đánh gần lưới cũng như những cú smash đầy uy lực. Mặt vợt mở rộng giúp bạn có tầm với xa hơn, dễ dàng thực hiện các cú đập bóng mạnh và chính xác.\\nCông Nghệ Thermoformed – Tăng Cường Độ Bền & Sự Ổn Định\\nCấu trúc thermoformed nguyên khối kết nối chặt chẽ giữa tay cầm dài 5.75 inch và bề mặt vợt 10.75 x 7.5 inch, tạo nên sự chắc chắn và bền bỉ. Điều này giúp người chơi cảm nhận được sự ổn định khi xử lý bóng và tăng khả năng kiểm soát trong từng pha đánh.\\nMặt Vợt T700 Toray Raw Carbon – Kiểm Soát Bóng & Tạo Xoáy Tuyệt Vời\\nVERSIX Vector XL được trang bị mặt vợt từ sợi carbon T700 Toray Raw, nổi bật với:\\n✔ Kết cấu dệt cứng cáp: Tăng cường độ bền, cải thiện cảm giác đánh bóng.\\n✔ Bề mặt nhám tự nhiên: Giúp bóng bám lâu hơn, tối ưu khả năng tạo xoáy và thực hiện các kỹ thuật như dink, spin và slice dễ dàng.','products/rQy206Xf2VkuKQV8Elzfm1IivkaNFDJzH0yNCZAK.jpg','nam',NULL,NULL,0,'hien','2026-04-21 03:50:03','2026-04-21 03:50:33'),
(13,10,'Vợt Pickleball Proton Series 3 Peacock 15mm Elongated','vot-pickleball-proton-series-3-peacock-15mm-elongated-1776743612',15000000.00,0.00,12000000.00,'Vợt Pickleball Proton Series 3 Peacock 15mm Elongated\\nlà lựa chọn hàng đầu cho người chơi yêu thích\\nsự mềm mại, kiểm soát cao và độ ổn định tối đa\\ntrong từng pha bóng. Với lõi foam hiệu suất cao\\nGen 4 – 15mm\\n, paddle mang đến thời gian lưu bóng lâu hơn (dwell time), giúp người chơi dễ dàng\\ndink mềm, drop gọn, reset chính xác\\n, và vẫn\\ntạo lực mạnh mẽ\\nkhi cần tấn công.\\nThiết kế\\nelongated 16.5 inch\\nmang lại tầm với vượt trội, hỗ trợ tuyệt vời trong các pha phòng thủ, counter hoặc overhead. Mặt carbon thô tăng cường texture giúp tạo spin tự nhiên và ổn định – triển khai topspin, slice hay roll đều mượt mà.\\nĐây là paddle dành cho người chơi thiên về\\nkiểm soát nhưng vẫn cần đòn bẩy để tấn công\\n, đặc biệt phù hợp người chơi thi đấu hoặc người đang chuyển từ dòng core poly lên foam thế hệ mới.','products/tY5smmyttCRecjICkS1a1GcnqOkcajCXAFLGUth1.png','nam',NULL,NULL,0,'hien','2026-04-21 03:53:32','2026-04-21 04:28:37'),
(14,12,'Túi Pickleball Tote CRBN Club','tui-pickleball-tote-crbn-club-1776905819',2000000.00,1000000.00,1499999.00,'Được thiết kế dành cho những người chơi hay di chuyển , những chuyến đi và cuộc sống thường nhật, túi Tote CRBN Club kết hợp giữa tính tiện dụng và hiệu năng với sự sang trọng tinh tế.\r\n\r\nKiểu dáng chắc chắn và đường nét gọn gàng tạo nên vẻ ngoài hiện đại, tinh tế, trong khi chất liệu da PU Ý cao cấp và phụ kiện kim loại sang trọng nâng tầm vẻ ngoài vượt xa những chiếc túi đựng vợt thông thường. Mọi chi tiết đều được tính toán kỹ lưỡng. Mọi tính năng đều có mục đích.\r\n\r\nĐây là chiếc túi đựng trò chơi của bạn và mọi thứ liên quan.','products/S285iHjTgOOm2wAGaqYVUlH8LzTM3N6aquBqHquS.png','nam',NULL,NULL,0,'hien','2026-04-21 03:57:00','2026-04-23 00:59:44'),
(16,12,'Balo Pickleball CRBN Pro Team','balo-pickleball-crbn-pro-team-1776906222',3600000.00,1500000.00,2700000.00,'Balo Pickleball CRBN Pro Team\\nlà chiếc balo đa năng, nhỏ gọn phù hợp với cả khi bạn ra sân hay dùng hàng ngày với ngăn đựng máy tính riêng biệt và thiết kế mọi thứ thông minh\\n– Balo được làm bằng vật liệu rất cao cấp với 2 tone màu đen và xám kết hợp với nhau. Lớp trên bằng Polyester 50D và lớp dưới bằng vải bạt chống thấm nước\\n– Ngăn đựng đồ chính có thể lấy từ 2 hướng trên hoặc phía trước rất linh hoạt khi lấy ra hay cất vật dụng vào bên trong\\n– Túi có khoá kéo bên hông cũng được lót lớp cách nhiệt để đựng bóng hay những chai nước nhỏ. Ngăn đựng giày riêng biệt với các đồ khác cực sạch sẽ và có lỗ thoáng không bị bí mùi\\n– Dây đeo balo có tích hợp lưới thoáng khí, ngăn đựng máy tính xách tay riêng biệt (vừa với chiếc Macbook Pro 14″ hoặc iPad Pro 12.9). Phụ kiện balo như khoá đều là hiệu YKK cao cấp và rất bền\\n– Balo có tích hợp 2 móc treo vào hàng rào rất tiện khi mang theo lên sân','products/Jjp6kTeUuTcha2fzENAWj1TL8BIBFBkhscthxv50.jpg','nam',NULL,NULL,100,'hien','2026-04-23 01:03:42','2026-04-23 01:03:42'),
(17,11,'Bóng Pickleball LT Pro 48','bong-pickleball-lt-pro-48-1776906285',500000.00,100000.00,350000.00,'LT Pro 48\\nlà quả bóng pickleball chính thức được sử dụng trong\\nPPA Tour\\n– giải đấu pickleball chuyên nghiệp hàng đầu thế giới. Được phát triển bởi Life Time, LT Pro 48 mang đến trải nghiệm thi đấu nhanh, ổn định và bền bỉ, được cả các tay vợt chuyên nghiệp lẫn người chơi phong trào đánh giá cao.\\n48 lỗ độc đáo đầu tiên trong ngành\\n: Thiết kế tối ưu cho đường bay ổn định và độ chính xác cao.\\nTrọng lượng 26g tiêu chuẩn\\n: Giúp người chơi tự tin với cảm giác quen thuộc khi thi đấu.\\nMàu xanh neon nổi bật\\n: Dễ nhìn thấy trong mọi điều kiện ánh sáng.\\nCấu trúc 2 mảnh ép phun (Injection Molded)\\n: Tăng độ bền, hạn chế nứt vỡ trong quá trình chơi.\\nĐược các vận động viên PPA tin dùng\\n: Từ những pha rally tốc độ cao cho đến những cú drop tinh tế.','products/lYudOUFPFot6bgYqSrQ40Pmywbkea0jDUh1JFzTu.jpg','nam',NULL,NULL,1000,'hien','2026-04-23 01:04:45','2026-04-23 01:04:45'),
(18,13,'Kính Bảo Vệ Pickleball Kitchen Blockers','kinh-bao-ve-pickleball-kitchen-blockers-1776906416',2500000.00,900000.00,1900000.00,'Bạn có biết? Nghiên cứu cho thấy\\n47% người chơi Pickleball từng bị bóng va chạm vào mắt hoặc vùng mặt\\n. Với\\nKitchen Blockers\\n, bạn sẽ được bảo vệ tối đa đôi mắt mà vẫn giữ nguyên hiệu suất thi đấu cao nhất. Thiết kế\\nkhông tròng kính\\ngiúp loại bỏ hoàn toàn hiện tượng khúc xạ ánh sáng, chống mờ sương, không trầy xước, không hấp thụ mồ hôi, mang lại\\ntầm nhìn toàn cảnh trên sân đấu\\n.\\nHãy để khuôn mặt của bạn trở thành\\n“vùng an toàn”\\n, với sản phẩm chuyên dụng cho Pickleball – được thiết kế bởi chính những người chơi Pickleball!','products/GgFHNzZxzn2E1P8nfkhzE5pKq6X5Bh61hO5694Ua.webp','nam',NULL,NULL,500,'hien','2026-04-23 01:06:56','2026-04-23 01:06:56'),
(19,13,'Quấn đầu Gearbox Headband','quan-dau-gearbox-headband-1776906686',350000.00,100000.00,250000.00,'Quấn đầu ngăn mồ hôi và chính hãng từ Gearbox, hàng này bên mình nhập từ US nên các bác không an tâm hàng nhái nhé. Quấn này rất mềm mại và thoải mái, không bị khó chịu khi chơi Pickleball. Chất liệu do giãn mang lại cảm giác vừa vặn với nhiều size đầu.','products/VteKVBXQDr80Fad7zWY7NrqkNsb7JOCDxSqOP855.jpg','nam',NULL,NULL,1000,'hien','2026-04-23 01:11:26','2026-04-23 01:11:26'),
(20,12,'Gearbox Core Ally Pickleball Bag','gearbox-core-ally-pickleball-bag-1776906749',3300000.00,2000000.00,2900000.00,'Thiết Kế Đa Dụng – Đáp Ứng Mọi Nhu Cầu\\nGearbox Core Ally sở hữu\\nnhiều ngăn chứa rộng rãi\\n, bao gồm:\\n✔\\nNgăn chính lớn:\\nĐựng được nhiều cây vợt pickleball, quần áo và phụ kiện.\\n✔\\nNgăn riêng cho giày:\\nGiữ giày sạch sẽ, tách biệt với các vật dụng khác.\\n✔\\nNgăn cách nhiệt:\\nGiúp bảo vệ vợt khỏi nhiệt độ cao, duy trì hiệu suất tốt nhất.\\n✔\\nNgăn nhỏ tiện lợi:\\nLưu trữ điện thoại, chìa khóa, ví và các vật dụng cá nhân an toàn','products/u7mn91p3FzhNhlwy5fm7IPdmT43Mz4rmjZKiCY9b.jpg','nam',NULL,NULL,100,'hien','2026-04-23 01:12:29','2026-04-23 01:12:29');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `sessions` VALUES
('EQIIoUuIBmpC1lT6FleiHauX5mzJuDO2Dmb2vJBq',2,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36','YTo1OntzOjY6Il90b2tlbiI7czo0MDoieTNmekVPTFpiVjYyTUZZdHY0SFAwdUIwcENVb1EwYkYxaExUYjdnSyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbiI7czo1OiJyb3V0ZSI7czoxNToiYWRtaW4uZGFzaGJvYXJkIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MjtzOjQ6ImNhcnQiO2E6MTp7aToxODthOjU6e3M6MjoiaWQiO2k6MTg7czo0OiJuYW1lIjtzOjQ0OiJLw61uaCBC4bqjbyBW4buHIFBpY2tsZWJhbGwgS2l0Y2hlbiBCbG9ja2VycyI7czo1OiJwcmljZSI7czoxMDoiMTkwMDAwMC4wMCI7czo1OiJpbWFnZSI7czo1NDoicHJvZHVjdHMvR2dGSE56Wnh6bjJFMVA4bmZraHpFNXBLcTZYNUJoNjFoTzU2OTRVYS53ZWJwIjtzOjg6InF1YW50aXR5IjtpOjE7fX19',1776908097),
('yfWy6MNCSaZ8lKFQQ600cAXpxgIib9vk8n69rl7Z',3,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36','YTo1OntzOjY6Il90b2tlbiI7czo0MDoiNVlhT0FtTXZFSVFpalY1Ukc3V25SUUxMSWpaNzgxUWE1UFNiRXVsdSI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjI6e3M6MzoidXJsIjtzOjcyOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvcHJvZHVjdC92b3QtcGlja2xlYmFsbC12ZXJzaXgtdmVjdG9yLXhsLTE3NzY3NDM0MzMiO3M6NToicm91dGUiO3M6MTQ6InByb2R1Y3QuZGV0YWlsIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Mzt9',1776904443);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `role` enum('admin','customer') NOT NULL DEFAULT 'customer',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `users` VALUES
(1,'Admin','admin@gmail.com','$2y$12$xz2/IDjZqe.qRcbkIeRPvuZQ9m4Q0i6XeEjvfLFYFpfHtwrHTATve','0338022004',NULL,'admin','2026-04-16 08:43:00','2026-04-21 01:05:34'),
(2,'Trần Văn Hiểu','hieutran18204@gmail.com','$2y$12$J3jH0iclwNjL4emQJOJxR.wMr27kcqSD9T796zLENpRV3kf2wNTRi','0338022004','HN','admin','2026-04-16 09:18:27','2026-04-23 00:21:59'),
(3,'Trần Văn Hiểu','hieuquahay0@gmail.com','$2y$12$99QWVhxcXmO/W7bzITgr2ewf/OYtIaGrHiCryb4filK0b3OmYKn8q',NULL,NULL,'customer','2026-04-20 03:20:19','2026-04-20 03:20:19'),
(4,'Trần Văn Hiểu','admin1@gmail.com','$2y$12$Ux4gqKyBDb9QaBweezLqP.sTDyOxzbLPmwHMvgwGAG6Uk0AhAODoG','0338022004','nam từ liêm','customer','2026-04-20 17:57:19','2026-04-20 18:00:14'),
(5,'Trần Văn Hiểu','admin@admin.com','$2y$12$1XALvgHe3jNIP3md6xsMReVL8R.ADHV4QXfW0M93Ix3yMJb1TA4JG',NULL,NULL,'customer','2026-04-23 00:19:11','2026-04-23 00:19:11');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `vouchers`
--

DROP TABLE IF EXISTS `vouchers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `vouchers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` enum('percent','fixed') NOT NULL,
  `value` decimal(10,2) NOT NULL,
  `min_order` decimal(10,2) DEFAULT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status` enum('hien','an') NOT NULL DEFAULT 'hien',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `vouchers_code_unique` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vouchers`
--

LOCK TABLES `vouchers` WRITE;
/*!40000 ALTER TABLE `vouchers` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `vouchers` VALUES
(1,'MUAHE2026','Mùa hè 2026','fixed',100000.00,500000.00,1000,'2026-04-16','2026-05-16','hien','2026-04-16 09:12:29','2026-04-16 09:12:54'),
(2,'NEWK200','Khách hàng mới','percent',99.00,338999.00,10000,'2026-04-18','2027-04-18','hien','2026-04-17 17:29:58','2026-04-21 04:23:52'),
(3,'SSON799','End Of Season 2026','fixed',1000000.00,7990000.00,10000,'2026-03-18','2027-04-17','hien','2026-04-17 17:31:23','2026-04-20 02:52:27');
/*!40000 ALTER TABLE `vouchers` ENABLE KEYS */;
UNLOCK TABLES;
commit;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*M!100616 SET NOTE_VERBOSITY=@OLD_NOTE_VERBOSITY */;

-- Dump completed on 2026-04-23  8:49:02
