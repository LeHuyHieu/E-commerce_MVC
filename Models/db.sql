-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.31 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.6.0.6765
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for shop
CREATE DATABASE IF NOT EXISTS `shop` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `shop`;

-- Dumping structure for table shop.banner
CREATE TABLE IF NOT EXISTS `banner` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `event` varchar(255) DEFAULT NULL,
  `background` varchar(255) DEFAULT NULL,
  `starting_at` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table shop.banner: 9 rows
DELETE FROM `banner`;
/*!40000 ALTER TABLE `banner` DISABLE KEYS */;
INSERT INTO `banner` (`id`, `title`, `event`, `background`, `starting_at`, `created_at`, `updated_at`) VALUES
	(1, 'Giảm giá cực sốc trong sự kiện Black Friday', 'Black Friday', '1.jpg', 1000000, '2023-12-11 15:02:53', '2023-12-11 15:06:18'),
	(2, 'Giảm giá cuối tuần sả hàng khủng', '-10% Off', '2.jpg', 2000000, '2023-12-11 15:02:53', '2023-12-11 15:17:02'),
	(3, 'Giảm giá cuối năm sả hàng tồn kho siêu khủng', '-99% Off', '3.jpg', 500000, '2023-12-11 15:02:53', '2023-12-11 15:17:57'),
	(4, 'Giảm giá cuối tháng sả hàng tồn kho siêu khủng', '-30% Off', '4.jpg', 900000, '2023-12-11 15:02:53', '2023-12-11 15:18:10'),
	(5, 'Giảm giá cực sốc trong sự kiện Black Friday', '-10% Off', '5.jpg', 1500000, '2023-12-11 15:02:53', '2023-12-11 15:18:39'),
	(6, 'Giảm giá cuối tuần sả hàng khủng', '-10% Off', '6.jpg', 1000000, '2023-12-11 15:02:53', '2023-12-11 15:18:37'),
	(7, 'Giảm giá cuối tuần sả hàng khủng', '-30% Off', '7.jpg', 6490000, '2023-12-11 15:02:53', '2023-12-11 15:18:42'),
	(8, 'Giảm giá cuối năm sả hàng tồn kho siêu khủng', '79% Off', '8.jpg', 999000, '2023-12-11 15:02:53', '2023-12-11 15:18:34'),
	(9, 'Giảm giá cuối tuần sả hàng khủng', '-30% Off', '9.jpg', 700000, '2023-12-11 15:02:53', '2023-12-11 15:18:43');
/*!40000 ALTER TABLE `banner` ENABLE KEYS */;

-- Dumping structure for table shop.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `parent_id` int NOT NULL DEFAULT '0',
  `name` varchar(255) DEFAULT NULL,
  `banner_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=218 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table shop.categories: 217 rows
DELETE FROM `categories`;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`id`, `parent_id`, `name`, `banner_image`, `created_at`, `updated_at`) VALUES
	(1, 0, 'Laptops', './Public/images/banner/1_1.jpg', '2023-12-11 12:08:50', '2023-12-26 16:39:18'),
	(2, 1, 'Laptop theo thương hiệu', NULL, '2023-12-11 12:16:35', '2023-12-11 12:16:36'),
	(3, 2, 'Apple (Macbook)', NULL, '2023-12-11 12:16:36', '2023-12-11 12:16:36'),
	(4, 2, 'Acer', NULL, '2023-12-11 12:16:36', '2023-12-11 12:16:37'),
	(5, 2, 'ASUS', NULL, '2023-12-11 12:16:37', '2023-12-11 12:17:06'),
	(6, 2, 'Dell', NULL, '2023-12-11 12:16:37', '2023-12-11 12:17:06'),
	(7, 2, 'HP', NULL, '2023-12-11 12:16:37', '2023-12-11 12:17:06'),
	(8, 2, 'Lenovo', NULL, '2023-12-11 12:16:37', '2023-12-11 12:17:06'),
	(9, 2, 'LG', NULL, '2023-12-11 12:16:37', '2023-12-11 12:17:06'),
	(10, 1, 'Laptop theo cấu hình', NULL, '2023-12-11 12:19:27', '2023-12-11 12:19:28'),
	(11, 10, 'RTX 30 Series', NULL, '2023-12-11 12:19:27', '2023-12-11 12:19:27'),
	(12, 10, 'RTX 40 Series', NULL, '2023-12-11 12:19:27', '2023-12-11 12:19:27'),
	(13, 10, 'RTX 50 Series', NULL, '2023-12-11 12:19:27', '2023-12-20 06:17:45'),
	(14, 10, 'Intel Pentium/Celeron', NULL, '2023-12-11 12:19:27', '2023-12-11 12:20:33'),
	(15, 10, 'Intel Core i3', NULL, '2023-12-11 12:19:27', '2023-12-11 12:20:51'),
	(16, 10, 'Intel Core i5', NULL, '2023-12-11 12:19:27', '2023-12-11 12:20:51'),
	(17, 10, 'Intel Core i7', NULL, '2023-12-11 12:19:27', '2023-12-11 12:20:51'),
	(18, 10, 'Intel Core i9', NULL, '2023-12-11 12:19:27', '2023-12-11 12:20:51'),
	(19, 10, 'AMD Ryzen3', NULL, '2023-12-11 12:19:27', '2023-12-11 12:20:51'),
	(20, 1, 'Laptop theo kích thước', NULL, '2023-12-11 12:19:27', '2023-12-11 12:22:16'),
	(21, 20, 'Dưới 13inch', NULL, '2023-12-11 12:19:27', '2023-12-11 12:22:41'),
	(22, 20, '13-15 inch', NULL, '2023-12-11 12:19:27', '2023-12-11 12:23:24'),
	(23, 20, 'Trên 15 inch', NULL, '2023-12-11 12:19:27', '2023-12-11 12:23:31'),
	(24, 20, '13 inch', NULL, '2023-12-11 12:19:27', '2023-12-11 12:23:31'),
	(25, 20, '14 inch', NULL, '2023-12-11 12:19:27', '2023-12-11 12:23:31'),
	(26, 20, '15.6 inch', NULL, '2023-12-11 12:19:27', '2023-12-11 12:23:31'),
	(27, 20, '16 inch', NULL, '2023-12-11 12:19:27', '2023-12-11 12:23:31'),
	(28, 20, '17 inch', NULL, '2023-12-11 12:19:27', '2023-12-11 12:23:31'),
	(29, 1, 'Laptop theo nhu cầu', NULL, '2023-12-11 12:19:27', '2023-12-11 12:23:31'),
	(30, 29, 'Laptop sinh viên', NULL, '2023-12-11 12:19:27', '2023-12-11 12:25:16'),
	(31, 29, 'Laptop Gaming', NULL, '2023-12-11 12:19:27', '2023-12-11 12:25:16'),
	(32, 29, 'Laptop Văn phòng', NULL, '2023-12-11 12:19:27', '2023-12-11 12:25:16'),
	(33, 29, 'Laptop cảm ứng', NULL, '2023-12-11 12:19:27', '2023-12-11 12:25:16'),
	(34, 29, 'Laptop đồ họa', NULL, '2023-12-11 12:19:27', '2023-12-11 12:25:16'),
	(35, 29, 'Laptop mỏng nhẹ', NULL, '2023-12-11 12:19:27', '2023-12-11 12:25:16'),
	(36, 0, 'PC - Màn hình máy tính', './Public/images/banner/1_2.jpg', '2023-12-11 12:19:27', '2023-12-26 16:39:37'),
	(37, 36, 'Theo thương hiệu', NULL, '2023-12-11 12:19:27', '2023-12-11 12:25:16'),
	(38, 37, 'Acer', NULL, '2023-12-11 12:19:27', '2023-12-13 02:43:15'),
	(39, 37, 'ASUS', NULL, '2023-12-11 12:19:27', '2023-12-13 02:43:24'),
	(40, 37, 'Dell', NULL, '2023-12-11 12:19:27', '2023-12-13 02:43:24'),
	(41, 37, 'HP', NULL, '2023-12-11 12:19:27', '2023-12-13 02:43:24'),
	(42, 37, 'Lenovo', NULL, '2023-12-11 12:19:27', '2023-12-13 02:43:24'),
	(43, 37, 'LG', NULL, '2023-12-11 12:19:27', '2023-12-13 02:43:24'),
	(44, 36, 'Tần số quét', NULL, '2023-12-11 12:19:27', '2023-12-13 02:43:24'),
	(45, 44, '60hz', NULL, '2023-12-11 12:19:27', '2023-12-13 02:43:24'),
	(46, 44, '75hz', NULL, '2023-12-11 12:19:27', '2023-12-13 02:43:24'),
	(47, 44, '100hz', NULL, '2023-12-11 12:19:27', '2023-12-13 02:43:24'),
	(48, 44, '144hz', NULL, '2023-12-11 12:19:27', '2023-12-13 02:43:24'),
	(49, 44, '165hz', NULL, '2023-12-11 12:19:27', '2023-12-13 02:43:24'),
	(50, 44, '170hz', NULL, '2023-12-11 12:19:27', '2023-12-13 02:43:24'),
	(51, 44, '204hz', NULL, '2023-12-11 12:19:27', '2023-12-13 02:43:24'),
	(52, 36, 'Theo giá', NULL, '2023-12-11 12:19:27', '2023-12-13 02:43:24'),
	(53, 52, 'Dưới 3tr', NULL, '2023-12-11 12:19:27', '2023-12-13 02:46:27'),
	(54, 52, '3 đến 5 triệu', NULL, '2023-12-11 12:19:27', '2023-12-13 02:46:27'),
	(55, 52, '5 đến 10 triệu', NULL, '2023-12-11 12:19:27', '2023-12-13 02:46:27'),
	(56, 52, '10 đến 15 triệu', NULL, '2023-12-11 12:19:27', '2023-12-13 02:46:27'),
	(57, 52, '15 đến 20 triệu', NULL, '2023-12-11 12:19:27', '2023-12-13 02:46:27'),
	(58, 52, 'Trên 20 triệu', NULL, '2023-12-11 12:19:27', '2023-12-13 02:46:27'),
	(59, 36, 'Theo nhu cầu', NULL, '2023-12-11 12:19:27', '2023-12-13 02:46:27'),
	(60, 59, 'Màn hình gaming', NULL, '2023-12-11 12:19:27', '2023-12-13 02:48:18'),
	(61, 59, 'Màn hình thiết kế', NULL, '2023-12-11 12:19:27', '2023-12-13 02:48:18'),
	(62, 59, 'Màn hình cong ', NULL, '2023-12-11 12:19:27', '2023-12-13 02:48:18'),
	(63, 59, 'Màn hình văn phòng', NULL, '2023-12-11 12:19:27', '2023-12-13 02:48:18'),
	(64, 36, 'Độ phân giải', NULL, '2023-12-11 12:19:27', '2023-12-13 02:49:19'),
	(65, 64, 'Hd 720p', NULL, '2023-12-11 12:19:27', '2023-12-13 02:49:19'),
	(66, 64, 'Full hd 1080p', NULL, '2023-12-11 12:19:27', '2023-12-13 02:49:19'),
	(67, 64, '2k - QHD', NULL, '2023-12-11 12:19:27', '2023-12-13 02:49:19'),
	(68, 64, '4k - UHD', NULL, '2023-12-11 12:19:27', '2023-12-13 02:49:19'),
	(69, 0, 'Điện thoại & phụ kiện', './Public/images/banner/1_3.jpg', '2023-12-11 12:19:27', '2023-12-26 16:39:44'),
	(70, 69, 'Điện thoại', NULL, '2023-12-11 12:19:27', '2023-12-13 02:49:19'),
	(71, 70, 'Iphone', NULL, '2023-12-11 12:19:27', '2023-12-13 02:49:19'),
	(72, 70, 'Samsung', NULL, '2023-12-11 12:19:27', '2023-12-13 02:49:19'),
	(73, 70, 'Asus', NULL, '2023-12-11 12:19:27', '2023-12-13 02:49:19'),
	(74, 70, 'Xaomi', NULL, '2023-12-11 12:19:27', '2023-12-13 02:49:19'),
	(75, 70, 'Nubia', NULL, '2023-12-26 15:11:11', '2023-12-26 15:11:12'),
	(76, 69, 'Máy tính bảng', NULL, '2023-12-26 15:11:28', '2023-12-26 15:11:29'),
	(77, 76, 'Apple', NULL, '2023-12-26 15:11:28', '2023-12-26 15:11:29'),
	(78, 76, 'Samsung', NULL, '2023-12-26 15:11:28', '2023-12-26 15:11:29'),
	(79, 76, 'Xaomi', NULL, '2023-12-26 15:11:28', '2023-12-26 15:11:29'),
	(80, 76, 'Lenovo', NULL, '2023-12-26 15:11:28', '2023-12-26 15:11:29'),
	(81, 76, 'Oppo', NULL, '2023-12-26 15:11:28', '2023-12-26 15:11:29'),
	(82, 69, 'Đồng hồ thông minh', NULL, '2023-12-26 15:13:41', '2023-12-26 15:13:42'),
	(83, 82, 'Apple', NULL, '2023-12-26 15:13:41', '2023-12-26 15:14:37'),
	(84, 82, 'Samsung', NULL, '2023-12-26 15:13:41', '2023-12-26 15:14:39'),
	(85, 82, 'Garmin', NULL, '2023-12-26 15:13:41', '2023-12-26 15:14:41'),
	(86, 82, 'Fitbit', NULL, '2023-12-26 15:13:41', '2023-12-26 15:14:41'),
	(87, 82, 'Xaomi', NULL, '2023-12-26 15:13:41', '2023-12-26 15:14:41'),
	(88, 0, 'Thiết bị âm thanh', './Public/images/banner/1_4.jpg', '2023-12-26 15:16:11', '2023-12-26 16:39:54'),
	(89, 88, 'Tai nghe', NULL, '2023-12-26 15:16:11', '2023-12-26 15:16:44'),
	(90, 89, 'Apple', NULL, '2023-12-26 15:16:11', '2023-12-26 15:17:25'),
	(91, 89, 'Sony', NULL, '2023-12-26 15:16:11', '2023-12-26 15:17:38'),
	(92, 89, 'Asus', NULL, '2023-12-26 15:16:11', '2023-12-26 15:17:50'),
	(93, 89, 'Xaomi', NULL, '2023-12-26 15:16:11', '2023-12-26 15:18:07'),
	(94, 89, 'Razer', NULL, '2023-12-26 15:16:11', '2023-12-26 15:18:13'),
	(95, 88, 'Loa nghe nhạc', NULL, '2023-12-26 15:18:38', '2023-12-26 15:18:39'),
	(96, 95, 'Bose', NULL, '2023-12-26 15:18:38', '2023-12-26 15:18:39'),
	(97, 95, 'LG', NULL, '2023-12-26 15:18:38', '2023-12-26 15:18:39'),
	(98, 95, 'Sony', NULL, '2023-12-26 15:18:38', '2023-12-26 15:18:39'),
	(99, 95, 'Microlab', NULL, '2023-12-26 15:18:38', '2023-12-26 15:20:02'),
	(100, 95, 'Remax', NULL, '2023-12-26 15:18:38', '2023-12-26 15:20:02'),
	(101, 88, 'MicroPhone', NULL, '2023-12-26 15:20:46', '2023-12-26 15:20:47'),
	(102, 101, 'Boya', NULL, '2023-12-26 15:20:46', '2023-12-26 15:20:47'),
	(103, 101, 'Senic', NULL, '2023-12-26 15:20:46', '2023-12-26 15:20:47'),
	(104, 101, 'Razer', NULL, '2023-12-26 15:20:46', '2023-12-26 15:20:47'),
	(105, 101, 'Saler', NULL, '2023-12-26 15:20:46', '2023-12-26 15:20:47'),
	(106, 101, 'Akg', NULL, '2023-12-26 15:20:46', '2023-12-26 15:20:47'),
	(107, 88, 'Loại tai nghe', NULL, '2023-12-26 15:22:27', '2023-12-26 15:22:28'),
	(108, 107, 'Tai nghe blutooth', NULL, '2023-12-26 15:22:27', '2023-12-26 15:22:28'),
	(109, 107, 'Tai nghe không dây', NULL, '2023-12-26 15:22:27', '2023-12-26 15:22:28'),
	(110, 107, 'Tai nghe gaming', NULL, '2023-12-26 15:22:27', '2023-12-26 15:22:28'),
	(111, 107, 'Tai nghe có dây', NULL, '2023-12-26 15:22:27', '2023-12-26 15:22:28'),
	(112, 88, 'Các loại loa', NULL, '2023-12-26 15:24:06', '2023-12-26 15:24:07'),
	(113, 112, 'Loa vi tính', NULL, '2023-12-26 15:24:06', '2023-12-26 15:24:07'),
	(114, 112, 'Loa kéo', NULL, '2023-12-26 15:24:06', '2023-12-26 15:24:07'),
	(115, 112, 'Loa blutooth', NULL, '2023-12-26 15:24:06', '2023-12-26 15:24:07'),
	(116, 112, 'Loa mini', NULL, '2023-12-26 15:24:06', '2023-12-26 15:24:07'),
	(117, 0, 'Phụ kiện', './Public/images/banner/1_5.jpg', '2023-12-26 15:26:12', '2023-12-26 16:40:04'),
	(118, 117, 'Phụ kiện laptop', NULL, '2023-12-26 15:26:12', '2023-12-26 15:27:13'),
	(119, 118, 'Giá đở', NULL, '2023-12-26 15:26:12', '2023-12-26 15:27:27'),
	(120, 118, 'Đế tản nhiệt', NULL, '2023-12-26 15:26:12', '2023-12-26 15:38:02'),
	(121, 118, 'Balo túi chống sốc', NULL, '2023-12-26 15:26:12', '2023-12-26 15:38:09'),
	(122, 118, 'Ốp lưng', NULL, '2023-12-26 15:26:12', '2023-12-26 15:38:13'),
	(123, 118, 'Dán màn hình', NULL, '2023-12-26 15:26:12', '2023-12-26 15:38:15'),
	(124, 118, 'Miếng lót bàn phím', NULL, '2023-12-26 15:26:12', '2023-12-26 15:38:22'),
	(125, 117, 'Linh kiện laptop', NULL, '2023-12-26 15:26:12', '2023-12-26 15:39:50'),
	(126, 125, 'Bàn phím laptop', NULL, '2023-12-26 15:26:12', '2023-12-26 15:39:52'),
	(127, 125, 'Sạc laptop', NULL, '2023-12-26 15:26:12', '2023-12-26 15:39:55'),
	(128, 125, 'Pin laptop', NULL, '2023-12-26 15:26:12', '2023-12-26 15:39:58'),
	(129, 125, 'Ram laptop', NULL, '2023-12-26 15:26:12', '2023-12-26 15:40:03'),
	(130, 125, 'Bộ cấp nguồn', NULL, '2023-12-26 15:26:12', '2023-12-26 15:40:15'),
	(131, 125, 'LCD laptop', NULL, '2023-12-26 15:26:12', '2023-12-26 15:40:28'),
	(132, 117, 'Phụ kiện di động', NULL, '2023-12-26 15:26:12', '2023-12-26 15:40:42'),
	(133, 132, 'Bao da -Ốp lưng', NULL, '2023-12-26 15:26:12', '2023-12-26 15:40:45'),
	(134, 132, 'Pin sạc dự phòng', NULL, '2023-12-26 15:26:12', '2023-12-26 15:41:14'),
	(135, 132, 'Cáp sạc', NULL, '2023-12-26 15:26:12', '2023-12-26 15:41:16'),
	(136, 132, 'Cục sạc', NULL, '2023-12-26 15:26:12', '2023-12-26 15:41:19'),
	(137, 132, 'Giá đở', NULL, '2023-12-26 15:26:12', '2023-12-26 15:41:22'),
	(138, 132, 'Thẻ cào', NULL, '2023-12-26 15:26:12', '2023-12-26 15:41:26'),
	(139, 0, 'Game & Stream', './Public/images/banner/1_1.jpg', '2023-12-26 15:26:12', '2023-12-26 16:41:54'),
	(140, 139, 'Màn hình gaming', NULL, '2023-12-26 15:26:12', '2023-12-26 15:42:12'),
	(141, 140, 'LG', NULL, '2023-12-26 15:26:12', '2023-12-26 15:42:32'),
	(142, 140, 'HP', NULL, '2023-12-26 15:26:12', '2023-12-26 15:42:34'),
	(143, 140, 'Dell', NULL, '2023-12-26 15:26:12', '2023-12-26 15:42:38'),
	(144, 140, 'Asus', NULL, '2023-12-26 15:26:12', '2023-12-26 15:42:38'),
	(145, 140, 'Samsung', NULL, '2023-12-26 15:26:12', '2023-12-26 15:42:38'),
	(146, 139, 'Chuột gaming', NULL, '2023-12-26 15:26:12', '2023-12-26 15:43:27'),
	(147, 146, 'Logistech', NULL, '2023-12-26 15:26:12', '2023-12-26 15:44:04'),
	(148, 146, 'Asus', NULL, '2023-12-26 15:26:12', '2023-12-26 15:44:08'),
	(149, 146, 'Razer', NULL, '2023-12-26 15:26:12', '2023-12-26 15:44:18'),
	(150, 146, 'Zowie', NULL, '2023-12-26 15:26:12', '2023-12-26 15:44:37'),
	(151, 146, 'Akko', NULL, '2023-12-26 15:26:12', '2023-12-26 15:45:25'),
	(152, 139, 'Bàn phím gaming', NULL, '2023-12-26 15:26:12', '2023-12-26 15:45:25'),
	(153, 152, 'Asus', NULL, '2023-12-26 15:26:12', '2023-12-26 15:46:19'),
	(154, 152, 'Logistech', NULL, '2023-12-26 15:26:12', '2023-12-26 15:46:28'),
	(155, 152, 'Razer', NULL, '2023-12-26 15:26:12', '2023-12-26 15:46:36'),
	(156, 152, 'Akko', NULL, '2023-12-26 15:26:12', '2023-12-26 15:46:50'),
	(157, 152, 'Zowie', NULL, '2023-12-26 15:26:12', '2023-12-26 15:46:52'),
	(158, 0, 'Thiết bị văn phòng', './Public/images/banner/1_2.jpg', '2023-12-26 15:26:12', '2023-12-26 16:42:03'),
	(159, 158, 'Thiết bị văn phòng', NULL, '2023-12-26 15:26:12', '2023-12-26 15:46:52'),
	(160, 159, 'Mực in & giấy in', NULL, '2023-12-26 15:26:12', '2023-12-26 15:48:40'),
	(161, 159, 'Mực in laser', NULL, '2023-12-26 15:26:12', '2023-12-26 15:49:09'),
	(162, 159, 'Mực in phun ', NULL, '2023-12-26 15:26:12', '2023-12-26 15:49:17'),
	(163, 159, 'Mực in máy Fax', NULL, '2023-12-26 15:26:12', '2023-12-26 15:49:32'),
	(164, 159, 'Drum', NULL, '2023-12-26 15:26:12', '2023-12-26 15:49:36'),
	(165, 159, 'Giấy in', NULL, '2023-12-26 15:26:12', '2023-12-26 15:49:36'),
	(166, 158, 'Thiết bị an ninh', NULL, '2023-12-26 15:26:12', '2023-12-26 15:49:36'),
	(167, 166, 'Xiaomi', NULL, '2023-12-26 15:26:12', '2023-12-26 15:49:36'),
	(168, 166, 'Camera an ninh', NULL, '2023-12-26 15:26:12', '2023-12-26 15:50:59'),
	(169, 166, 'Camera wifi', NULL, '2023-12-26 15:26:12', '2023-12-26 15:51:08'),
	(170, 166, 'Đầu ghi hình', NULL, '2023-12-26 15:26:12', '2023-12-26 15:51:20'),
	(171, 166, 'Ezviz', NULL, '2023-12-26 15:26:12', '2023-12-26 15:51:46'),
	(172, 166, 'Questek', NULL, '2023-12-26 15:26:12', '2023-12-26 15:52:19'),
	(173, 158, 'Thiết bị mạng', NULL, '2023-12-26 15:26:12', '2023-12-26 15:52:19'),
	(174, 173, 'TP-link', NULL, '2023-12-26 15:26:12', '2023-12-26 15:52:19'),
	(175, 173, 'Tenda', NULL, '2023-12-26 15:26:12', '2023-12-26 15:54:10'),
	(176, 173, 'Cisco', NULL, '2023-12-26 15:26:12', '2023-12-26 15:54:20'),
	(177, 173, 'Router wifi', NULL, '2023-12-26 15:26:12', '2023-12-26 15:54:39'),
	(178, 173, 'USB wifi', NULL, '2023-12-26 15:26:12', '2023-12-26 15:54:51'),
	(179, 173, 'Card mạng', NULL, '2023-12-26 15:26:12', '2023-12-26 15:54:56'),
	(180, 0, 'Gaming', './Public/images/banner/1_3.jpg', '2023-12-26 15:55:46', '2023-12-26 16:42:14'),
	(181, 180, 'Laptop gaming', NULL, '2023-12-26 15:55:46', '2023-12-26 15:55:46'),
	(182, 181, 'Asus', NULL, '2023-12-26 15:55:46', '2023-12-26 15:56:44'),
	(183, 181, 'Dell', NULL, '2023-12-26 15:55:46', '2023-12-26 15:57:17'),
	(184, 181, 'HP', NULL, '2023-12-26 15:55:46', '2023-12-26 15:57:21'),
	(185, 181, 'Acer', NULL, '2023-12-26 15:55:46', '2023-12-26 15:57:25'),
	(186, 181, 'Lenovo', NULL, '2023-12-26 15:55:46', '2023-12-26 15:57:27'),
	(187, 180, 'Ghế gaming', NULL, '2023-12-26 15:55:46', '2023-12-26 15:57:27'),
	(188, 187, 'Corsair', NULL, '2023-12-26 15:55:46', '2023-12-26 15:57:27'),
	(189, 187, 'DXRacer', NULL, '2023-12-26 15:55:46', '2023-12-26 15:58:57'),
	(190, 187, 'E-Dra', NULL, '2023-12-26 15:55:46', '2023-12-26 15:59:12'),
	(191, 187, 'MSI', NULL, '2023-12-26 15:55:46', '2023-12-26 15:59:23'),
	(192, 187, 'Warrior', NULL, '2023-12-26 15:55:46', '2023-12-26 15:59:35'),
	(193, 180, 'Thiết bị livestream', NULL, '2023-12-26 15:55:46', '2023-12-26 15:59:35'),
	(194, 193, 'Capture Card', NULL, '2023-12-26 15:55:46', '2023-12-26 15:59:35'),
	(195, 193, 'Webcam', NULL, '2023-12-26 15:55:46', '2023-12-26 16:01:26'),
	(196, 193, 'Micro', NULL, '2023-12-26 15:55:46', '2023-12-26 16:01:30'),
	(197, 193, 'Stream Deck', NULL, '2023-12-26 15:55:46', '2023-12-26 16:01:30'),
	(198, 193, 'Key light', NULL, '2023-12-26 15:55:46', '2023-12-26 16:01:30'),
	(199, 0, 'PC - Linh kiện máy tính', './Public/images/banner/1_4.jpg', '2023-12-26 16:30:29', '2023-12-26 16:42:33'),
	(200, 199, 'Case - Thùng máy tính', NULL, '2023-12-26 16:30:29', '2023-12-26 16:30:30'),
	(201, 200, 'Deepcool', NULL, '2023-12-26 16:30:29', '2023-12-26 16:30:30'),
	(202, 200, 'Phong vũ', NULL, '2023-12-26 16:30:29', '2023-12-26 16:30:30'),
	(203, 200, 'Cooler master', NULL, '2023-12-26 16:30:29', '2023-12-26 16:30:30'),
	(204, 200, 'Asus', NULL, '2023-12-26 16:30:29', '2023-12-26 16:30:30'),
	(205, 200, 'Sama', NULL, '2023-12-26 16:30:29', '2023-12-26 16:30:30'),
	(206, 199, 'Ổ cứng', NULL, '2023-12-26 16:30:29', '2023-12-26 16:30:30'),
	(207, 206, 'Ổ HDD', NULL, '2023-12-26 16:30:29', '2023-12-26 16:30:30'),
	(208, 206, 'Ổ SSH', NULL, '2023-12-26 16:30:29', '2023-12-26 16:30:30'),
	(209, 206, 'Ổ cứng di động', NULL, '2023-12-26 16:30:29', '2023-12-26 16:30:30'),
	(210, 206, 'Intel', NULL, '2023-12-26 16:30:29', '2023-12-26 16:30:30'),
	(211, 206, 'Seagrate', NULL, '2023-12-26 16:30:29', '2023-12-26 16:30:30'),
	(212, 199, 'CPU - Bộ vi sử lý', NULL, '2023-12-26 16:30:29', '2023-12-26 16:35:48'),
	(213, 212, 'Pentium', NULL, '2023-12-26 16:30:29', '2023-12-26 16:35:48'),
	(214, 212, 'Core i3', NULL, '2023-12-26 16:30:29', '2023-12-26 16:35:48'),
	(215, 212, 'Core i5', NULL, '2023-12-26 16:30:29', '2023-12-26 16:36:37'),
	(216, 212, 'Core i7', NULL, '2023-12-26 16:30:29', '2023-12-26 16:36:37'),
	(217, 212, 'Core i9', NULL, '2023-12-26 16:30:29', '2023-12-26 16:36:37');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;

-- Dumping structure for table shop.color
CREATE TABLE IF NOT EXISTS `color` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table shop.color: 10 rows
DELETE FROM `color`;
/*!40000 ALTER TABLE `color` DISABLE KEYS */;
INSERT INTO `color` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'Xám', '2023-12-12 09:52:37', '2023-12-12 09:52:37'),
	(2, 'Đen', '2023-12-12 09:52:38', '2023-12-12 09:52:38'),
	(3, 'Hồng', '2023-12-12 09:52:38', '2023-12-12 09:52:39'),
	(4, 'Xanh dương', '2023-12-12 09:52:39', '2023-12-12 09:52:39'),
	(5, 'Xanh lá', '2023-12-12 09:52:39', '2023-12-12 09:52:40'),
	(6, 'Vàng', '2023-12-12 09:52:40', '2023-12-12 09:52:40'),
	(7, 'Cam', '2023-12-12 09:52:41', '2023-12-12 09:52:41'),
	(8, 'Tím', '2023-12-12 09:52:41', '2023-12-12 09:52:41'),
	(9, 'Đỏ', '2023-12-12 09:52:42', '2023-12-12 09:52:42'),
	(10, 'Trắng', '2023-12-12 09:52:42', '2023-12-12 09:52:42');
/*!40000 ALTER TABLE `color` ENABLE KEYS */;

-- Dumping structure for table shop.comments
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `comment` text,
  `comment_id` int DEFAULT '0',
  `user_id` int DEFAULT '0',
  `product_id` int DEFAULT '0',
  `rating` tinyint DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table shop.comments: 3 rows
DELETE FROM `comments`;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` (`id`, `comment`, `comment_id`, `user_id`, `product_id`, `rating`, `created_at`, `updated_at`) VALUES
	(1, 'sản phẩm đẹp', 0, 1, 4, 5, '2024-01-03 20:11:20', '2024-01-03 20:11:20'),
	(2, '@Lê Huy Hiệu không đẹp', 1, 2, 4, 0, '2024-01-03 20:12:36', '2024-01-03 20:12:36'),
	(3, 'Sản phẩm xấu', 0, 2, 4, 1, '2024-01-03 20:12:56', '2024-01-03 20:12:56');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;

-- Dumping structure for table shop.discounts
CREATE TABLE IF NOT EXISTS `discounts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `description` text,
  `discount_percent` decimal(20,6) DEFAULT '0.000000',
  `active` tinyint DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table shop.discounts: 5 rows
DELETE FROM `discounts`;
/*!40000 ALTER TABLE `discounts` DISABLE KEYS */;
INSERT INTO `discounts` (`id`, `name`, `description`, `discount_percent`, `active`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Mã giảm giá', 'Giảm giá 40% mọi sản phẩm', 40.000000, 1, '2023-12-12 03:54:45', '2023-12-12 03:55:22', NULL),
	(2, 'Mã giảm giá', 'Giảm giá 7% mọi sản phẩm', 7.000000, 1, '2023-12-12 03:54:45', '2023-12-12 09:57:33', NULL),
	(3, 'Mã giảm giá', 'Giảm giá 6% mọi sản phẩm', 6.000000, 1, '2023-12-12 03:54:45', '2023-12-12 09:57:28', NULL),
	(4, 'Mã giảm giá', 'Giảm giá 99% mọi sản phẩm', 99.000000, 1, '2023-12-12 03:54:45', '2023-12-12 09:57:23', NULL),
	(5, 'Mã giảm giá', 'Giảm giá 1% mọi sản phẩm', 1.000000, 1, '2023-12-12 03:54:45', '2023-12-12 10:04:40', NULL);
/*!40000 ALTER TABLE `discounts` ENABLE KEYS */;

-- Dumping structure for table shop.products
CREATE TABLE IF NOT EXISTS `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `category_id` int DEFAULT '0',
  `product_hot` tinyint DEFAULT '0',
  `title` varchar(255) DEFAULT NULL,
  `images` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `description` text,
  `price` int DEFAULT '0',
  `quantity` int DEFAULT '0',
  `discount_id` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  KEY `title` (`title`(250)),
  KEY `price` (`price`)
) ENGINE=MyISAM AUTO_INCREMENT=203 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table shop.products: 202 rows
DELETE FROM `products`;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` (`id`, `category_id`, `product_hot`, `title`, `images`, `description`, `price`, `quantity`, `discount_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 1, 0, 'Điện thoại di động iPhone 13 Pro', '["./Public/images/product/large-size/1.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'iPhone 13 Pro với màn hình Super Retina XDR, camera tiên tiến và hiệu suất mạnh mẽ.', 25000000, 10, 1, '2023-12-11 15:57:33', '2023-12-20 05:44:06', NULL),
	(2, 2, 0, 'Laptop Dell XPS 15', '["./Public/images/product/large-size/2.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Laptop siêu mỏng với màn hình InfinityEdge 4K và hiệu suất đa nhiệm cao.', 39000000, 10, 2, '2023-12-11 15:57:33', '2023-12-20 05:44:06', NULL),
	(3, 3, 0, 'TV QLED Samsung 4K 55 inch', '["./Public/images/product/large-size/3.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'TV 4K với công nghệ Quantum Dot mang đến hình ảnh sắc nét và màu sắc rực rỡ.', 15900000, 10, 5, '2023-12-11 15:57:33', '2023-12-20 05:44:08', NULL),
	(4, 4, 0, 'Máy ảnh DSLR Canon EOS 90D', '["./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Máy ảnh chuyên nghiệp với cảm biến 32.5MP và khả năng quay video 4K.', 9900000, 10, 4, '2023-12-11 15:57:33', '2023-12-20 05:44:10', NULL),
	(5, 5, 0, 'Apple Watch Series 7', '["./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Đồng hồ thông minh với màn hình lớn, tính năng đo sức khỏe và đa dạng ứng dụng.', 7500000, 10, 5, '2023-12-11 15:57:33', '2023-12-20 05:44:11', NULL),
	(6, 6, 0, 'Máy giặt Panasonic 10kg', '["./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Máy giặt tiết kiệm nước, có nhiều chương trình giặt linh hoạt.', 1500000, 10, 2, '2023-12-11 15:57:33', '2023-12-20 05:44:12', NULL),
	(7, 7, 0, 'Bếp từ Electrolux EHF96547XK', '["./Public/images/product/large-size/7.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Bếp từ điều khiển cảm ứng, an toàn và tiết kiệm điện năng', 6200000, 10, 3, '2023-12-11 15:57:33', '2023-12-20 05:44:14', NULL),
	(8, 8, 1, 'Máy chơi game mini', '["./Public/images/product/large-size/8.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Máy chơi game mini phù hợp chiến nhiều loại game', 300000, 10, 3, '2023-12-11 15:57:33', '2023-12-20 05:44:15', NULL),
	(10, 9, 1, 'Loa Bluetooth JBL Flip 5', '["./Public/images/product/large-size/7.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Loa di động chất lượng cao, âm thanh rõ ràng và pin lâu bền.', 30000000, 10, 3, '2023-12-11 15:57:33', '2023-12-20 05:44:16', NULL),
	(9, 10, 1, 'Laptop Dell XPS 13', '["./Public/images/product/large-size/10.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Laptop siêu mỏng, màn hình InfinityEdge 13.3 inch, hiệu suất cao và thiết kế ', 30000000, 10, 0, '2023-12-11 15:57:33', '2023-12-20 05:44:19', NULL),
	(11, 11, 1, 'Máy tính bảng iPad Air (2022)', '["./Public/images/product/large-size/11.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'iPad mỏng nhẹ, màn hình Retina 10.9 inch, bộ vi xử lý mạnh mẽ và hỗ trợ ', 30000000, 10, 0, '2023-12-11 15:57:33', '2023-12-20 05:44:20', NULL),
	(12, 12, 1, 'Màn hình LG 50 inch siêu nét', '["./Public/images/product/large-size/12.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Màn hình cong phun Hd phù hợp xem phim chơi game ,... và phục vụ nhiều nhu cầu ..', 30000000, 10, 0, '2023-12-11 15:57:33', '2023-12-20 05:44:21', NULL),
	(13, 13, 1, 'Máy chơi game mini', '["./Public/images/product/large-size/7.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Máy chơi game mini phù hợp chiến nhiều loại game', 300000, 10, 0, '2023-12-11 15:57:33', '2023-12-24 11:37:49', NULL),
	(14, 14, 1, 'Điện thoại Samsung Galaxy S21 Ultra', '["./Public/images/product/large-size/1.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Điện thoại cao cấp, màn hình Dynamic AMOLED 6.8 inch, camera chất lượng cao và hỗ trợ bút S Pen.', 27900000, 10, 3, '2023-12-11 15:57:33', '2023-12-20 05:44:23', NULL),
	(15, 15, 1, 'Máy ảnh mirrorless Sony Alpha a7 III', '["./Public/images/product/large-size/2.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Máy ảnh full-frame, cảm biến 24.2MP, khả năng quay video 4K và ổn định hình ảnh tốt.', 36900000, 10, 3, '2023-12-11 15:57:33', '2023-12-24 12:04:35', NULL),
	(16, 16, 1, 'Tai nghe không dây Apple AirPods Pro', '["./Public/images/product/large-size/3.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Tai nghe true wireless, chống ồn hiệu quả, âm thanh rõ ràng và tính năng chuyển đổi thông minh.', 5999000, 10, 3, '2023-12-11 15:57:33', '2023-12-20 05:44:25', NULL),
	(17, 17, 1, 'Máy chơi game mini', '["./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Máy chơi game mini phù hợp chiến nhiều loại game', 300000, 10, 3, '2023-12-11 15:57:33', '2023-12-20 05:44:26', NULL),
	(18, 18, 0, 'Màn hình gaming 32 inch phun HD chiến mọi loại game', '["./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Màn hình cong phun Hd phù hợp xem phim chơi game ,... và phục vụ nhiều nhu cầu ..', 6200000, 10, 3, '2023-12-11 15:57:33', '2023-12-20 05:44:27', NULL),
	(19, 19, 0, 'Laptop Acer Nitro 16 Phoenix AN16-41-R5M4', '["./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Bạn là một game thủ chuyên nghiệp, luôn muốn có những trải nghiệm chơi game tốt nhất? Bạn cũng là một người có nhiều công việc và học tập, cần một chiếc laptop đa năng và hiệu quả? Bạn còn là một người yêu thích sự đẹp đẽ và thời trang, muốn có một chiếc laptop có thiết kế ấn tượng và tiện lợi? Nếu bạn có tất cả những yêu cầu trên, thì bạn không thể bỏ qua Laptop Gaming ACER NITRO 16 PHOENIX - chiếc laptop gaming quốc dân của ACER, được Phong Vũ giới thiệu với laptop acer giá rẻ hợp lý. Laptop Gaming ACER NITRO 16 PHOENIX sẽ làm hài lòng bạn với những tính năng dưới đây, cùng Phong Vũ tìm hiểu ở bài viết dưới đây nhé!', 32000000, 10, 2, '2023-12-12 11:26:28', '2023-12-20 05:44:28', NULL),
	(20, 20, 1, 'Smartwatch Garmin Venu 2', '["./Public/images/product/large-size/7.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Đồng hồ thông minh với màn hình AMOLED, cảm biến sức khỏe, GPS và nhiều tính năng theo dõi hoạt động.', 7200000, 10, 2, '2023-12-12 11:26:28', '2023-12-30 13:37:54', NULL),
	(21, 21, 0, 'Máy in laser màu HP Color LaserJet Pro M283fdw', '["./Public/images/product/large-size/8.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Máy in đa chức năng, in laser màu nhanh chóng, kết nối đa nền tảng và chất lượng in cao.', 9820000, 10, 2, '2023-12-12 11:26:28', '2023-12-20 05:44:30', NULL),
	(22, 22, 0, 'Ổ cứng di động SSD SanDisk Extreme Pro 1TB', '["./Public/images/product/large-size/9.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Ổ cứng di động chống sốc, tốc độ truy xuất cao và dung lượng lớn.', 5200000, 10, 2, '2023-12-12 11:26:28', '2023-12-20 05:44:33', NULL),
	(23, 23, 0, 'Máy chơi game Sony PlayStation 5', '["./Public/images/product/large-size/10.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Console chơi game next-gen, đồ họa cao cấp, tốc độ xử lý nhanh và hỗ trợ đồng thời 4K.', 13000000, 10, 2, '2023-12-12 11:26:28', '2023-12-20 05:44:34', NULL),
	(24, 24, 0, 'Camera an ninh thông minh Arlo Pro 4', '["./Public/images/product/large-size/11.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Camera an ninh không dây, chất lượng video 2K, chống nước và hỗ trợ tính năng AI.', 5890000, 10, 2, '2023-12-12 11:26:28', '2023-12-20 05:44:34', NULL),
	(25, 25, 0, 'Ổ cứng di động SSD SanDisk Extreme Pro 1TB', '["./Public/images/product/large-size/12.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Bạn là một game thủ chuyên nghiệp, luôn muốn có những trải nghiệm chơi game tốt nhất? Bạn cũng là một người có nhiều công việc và học tập, cần một chiếc laptop đa năng và hiệu quả? Bạn còn là một người yêu thích sự đẹp đẽ và thời trang, muốn có một chiếc laptop có thiết kế ấn tượng và tiện lợi? Nếu bạn có tất cả những yêu cầu trên, thì bạn không thể bỏ qua Laptop Gaming ACER NITRO 16 PHOENIX - chiếc laptop gaming quốc dân của ACER, được Phong Vũ giới thiệu với laptop acer giá rẻ hợp lý. Laptop Gaming ACER NITRO 16 PHOENIX sẽ làm hài lòng bạn với những tính năng dưới đây, cùng Phong Vũ tìm hiểu ở bài viết dưới đây nhé!', 32000000, 10, 2, '2023-12-12 11:26:28', '2023-12-20 05:44:39', NULL),
	(26, 26, 0, 'Laptop Acer Nitro 16 Phoenix AN16-41-R5M4', '["./Public/images/product/large-size/7.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Bạn là một game thủ chuyên nghiệp, luôn muốn có những trải nghiệm chơi game tốt nhất? Bạn cũng là một người có nhiều công việc và học tập, cần một chiếc laptop đa năng và hiệu quả? Bạn còn là một người yêu thích sự đẹp đẽ và thời trang, muốn có một chiếc laptop có thiết kế ấn tượng và tiện lợi? Nếu bạn có tất cả những yêu cầu trên, thì bạn không thể bỏ qua Laptop Gaming ACER NITRO 16 PHOENIX - chiếc laptop gaming quốc dân của ACER, được Phong Vũ giới thiệu với laptop acer giá rẻ hợp lý. Laptop Gaming ACER NITRO 16 PHOENIX sẽ làm hài lòng bạn với những tính năng dưới đây, cùng Phong Vũ tìm hiểu ở bài viết dưới đây nhé!', 32000000, 10, 0, '2023-12-12 11:26:28', '2023-12-26 18:25:47', NULL),
	(27, 27, 0, 'Laptop Acer Nitro 16 Phoenix AN16-41-R5M4', '["./Public/images/product/large-size/1.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Bạn là một game thủ chuyên nghiệp, luôn muốn có những trải nghiệm chơi game tốt nhất? Bạn cũng là một người có nhiều công việc và học tập, cần một chiếc laptop đa năng và hiệu quả? Bạn còn là một người yêu thích sự đẹp đẽ và thời trang, muốn có một chiếc laptop có thiết kế ấn tượng và tiện lợi? Nếu bạn có tất cả những yêu cầu trên, thì bạn không thể bỏ qua Laptop Gaming ACER NITRO 16 PHOENIX - chiếc laptop gaming quốc dân của ACER, được Phong Vũ giới thiệu với laptop acer giá rẻ hợp lý. Laptop Gaming ACER NITRO 16 PHOENIX sẽ làm hài lòng bạn với những tính năng dưới đây, cùng Phong Vũ tìm hiểu ở bài viết dưới đây nhé!', 32000000, 10, 2, '2023-12-12 11:26:28', '2023-12-20 05:45:04', NULL),
	(28, 28, 0, 'Máy nghe nhạc MP3 Sony Walkman NW-A105', '["./Public/images/product/large-size/3.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Máy nghe nhạc chất lượng cao, hỗ trợ phát nhạc hi-res, kết nối Bluetooth và thiết kế bền bỉ.', 6200000, 10, 3, '2023-12-11 15:57:33', '2023-12-20 05:45:05', NULL),
	(29, 29, 0, 'Ổ cứng SSD Samsung T7 Touch 2TB', '["./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', ' Ổ cứng di động bảo mật vân tay, tốc độ truy xuất nhanh và dung lượng lớn.', 6200000, 10, 0, '2023-12-11 15:57:33', '2023-12-26 18:25:47', NULL),
	(30, 30, 0, 'Đèn thông minh Philips Hue Starter Kit', '["./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', ' Bộ đèn thông minh điều khiển qua app, đổi màu sắc, điều chỉnh độ sáng và tính năng hẹn giờ.', 6200000, 10, 3, '2023-12-11 15:57:33', '2023-12-20 05:45:01', NULL),
	(31, 31, 0, 'Màn hình gaming 32 inch phun HD chiến mọi loại game', '["./Public/images/product/large-size/3.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Màn hình cong phun Hd phù hợp xem phim chơi game ,... và phục vụ nhiều nhu cầu ..', 6200000, 10, 3, '2023-12-11 15:57:33', '2023-12-20 05:44:57', NULL),
	(32, 32, 0, 'Máy tính xách tay gaming ASUS ROG Zephyrus G14', '["./Public/images/product/large-size/7.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Laptop gaming nhẹ nhàng, màn hình 14 inch, card đồ họa NVIDIA GeForce RTX và hiệu suất ổn định.', 38000000, 10, 0, '2023-12-11 15:57:33', '2023-12-26 18:25:48', NULL),
	(33, 33, 0, 'Loa thông minh Amazon Echo Dot (4th Gen)', '["./Public/images/product/large-size/11.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Loa thông minh có trợ lý ảo Alexa, phát nhạc, điều khiển thiết bị thông minh và trò chuyện.', 6200000, 10, 3, '2023-12-11 15:57:33', '2023-12-20 05:44:48', NULL),
	(34, 34, 0, 'Tai nghe Gaming SteelSeries Arctis Pro Wireless', '["./Public/images/product/large-size/3.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Tai nghe chơi game không dây, âm thanh không lẫn vào nhau, mic chất lượng và kết nối đa nền tảng.', 6200000, 10, 3, '2023-12-11 15:57:33', '2023-12-20 05:44:53', NULL),
	(35, 42, 0, 'Máy chiếu mini Anker Nebula Capsule II', '["./Public/images/product/large-size/8.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Máy chiếu cầm tay, hỗ trợ độ phân giải HD, Android TV và pin lâu bền.', 6200000, 10, 0, '2023-12-11 15:57:33', '2023-12-26 18:25:50', NULL),
	(36, 43, 0, 'Router Wi-Fi Mesh TP-Link Deco X60', '["./Public/images/product/large-size/3.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', ' Hệ thống Wi-Fi Mesh, phủ sóng mạnh mẽ, tốc độ cao và quản lý mạng dễ dàng qua ứng dụng.', 6200000, 10, 0, '2023-12-11 15:57:33', '2023-12-26 18:25:51', NULL),
	(37, 102, 0, 'Màn hình gaming 32 inch phun HD chiến mọi loại game', '["./Public/images/product/large-size/7.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Màn hình cong phun Hd phù hợp xem phim chơi game ,... và phục vụ nhiều nhu cầu ..', 6200000, 10, 0, '2023-12-11 15:57:33', '2023-12-26 18:25:50', NULL),
	(38, 45, 0, 'Smart TV Sony Bravia XR A80J 65 inch', '["./Public/images/product/large-size/1.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'TV 4K HDR, công nghệ động hình XR, âm thanh Dolby Atmos và điều khiển bằng giọng nói.', 6200000, 10, 0, '2023-12-11 15:57:33', '2023-12-26 18:25:49', NULL),
	(39, 46, 0, 'Máy rửa chén Bosch Serie 6', '["./Public/images/product/large-size/10.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Máy rửa chén thông minh, tiết kiệm nước và năng lượng, nhiều chế độ rửa linh hoạt.', 6200000, 10, 0, '2023-12-11 15:57:33', '2023-12-26 18:25:54', NULL),
	(40, 47, 0, 'Smart TV Sony Bravia XR A80J 65 inch', '["./Public/images/product/large-size/3.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'TV 4K HDR, công nghệ động hình XR, âm thanh Dolby Atmos và điều khiển bằng giọng nói.', 6200000, 10, 3, '2023-12-11 15:57:33', '2023-12-20 05:44:42', NULL),
	(41, 48, 0, 'Màn hình gaming 32 inch phun HD chiến mọi loại game', '["./Public/images/product/large-size/3.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Màn hình cong phun Hd phù hợp xem phim chơi game ,... và phục vụ nhiều nhu cầu ..', 6200000, 10, 3, '2023-12-11 15:57:33', '2023-12-20 05:45:08', NULL),
	(42, 101, 0, 'Màn hình gaming 32 inch phun HD chiến mọi loại game', '["./Public/images/product/large-size/7.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Màn hình cong phun Hd phù hợp xem phim chơi game ,... và phục vụ nhiều nhu cầu ..', 6200000, 10, 0, '2023-12-11 15:57:33', '2023-12-26 18:26:51', NULL),
	(43, 50, 0, 'Máy rửa chén Bosch Serie 6', '["./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Máy rửa chén thông minh, tiết kiệm nước và năng lượng, nhiều chế độ rửa linh hoạt.', 6200000, 10, 3, '2023-12-11 15:57:33', '2023-12-24 11:38:43', NULL),
	(44, 11, 0, 'Laptop Acer Nitro 16 Phoenix AN16-41-R5M4', '["./Public/images/product/large-size/1.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Bạn là một game thủ chuyên nghiệp, luôn muốn có những trải nghiệm chơi game tốt nhất? Bạn cũng là một người có nhiều công việc và học tập, cần một chiếc laptop đa năng và hiệu quả? Bạn còn là một người yêu thích sự đẹp đẽ và thời trang, muốn có một chiếc laptop có thiết kế ấn tượng và tiện lợi? Nếu bạn có tất cả những yêu cầu trên, thì bạn không thể bỏ qua Laptop Gaming ACER NITRO 16 PHOENIX - chiếc laptop gaming quốc dân của ACER, được Phong Vũ giới thiệu với laptop acer giá rẻ hợp lý. Laptop Gaming ACER NITRO 16 PHOENIX sẽ làm hài lòng bạn với những tính năng dưới đây, cùng Phong Vũ tìm hiểu ở bài viết dưới đây nhé!', 32000000, 10, 2, '2023-12-12 11:26:28', '2023-12-24 11:38:31', NULL),
	(45, 11, 0, 'Loa thông minh Amazon Echo Dot (4th Gen)', '["./Public/images/product/large-size/11.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Loa thông minh có trợ lý ảo Alexa, phát nhạc, điều khiển thiết bị thông minh và trò chuyện.', 32000000, 10, 2, '2023-12-12 11:26:28', '2023-12-20 05:45:20', NULL),
	(46, 11, 0, 'Laptop Acer Nitro 16 Phoenix AN16-41-R5M4', '["./Public/images/product/large-size/12.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Bạn là một game thủ chuyên nghiệp, luôn muốn có những trải nghiệm chơi game tốt nhất? Bạn cũng là một người có nhiều công việc và học tập, cần một chiếc laptop đa năng và hiệu quả? Bạn còn là một người yêu thích sự đẹp đẽ và thời trang, muốn có một chiếc laptop có thiết kế ấn tượng và tiện lợi? Nếu bạn có tất cả những yêu cầu trên, thì bạn không thể bỏ qua Laptop Gaming ACER NITRO 16 PHOENIX - chiếc laptop gaming quốc dân của ACER, được Phong Vũ giới thiệu với laptop acer giá rẻ hợp lý. Laptop Gaming ACER NITRO 16 PHOENIX sẽ làm hài lòng bạn với những tính năng dưới đây, cùng Phong Vũ tìm hiểu ở bài viết dưới đây nhé!', 32000000, 10, 0, '2023-12-12 11:26:28', '2023-12-26 18:25:57', NULL),
	(47, 35, 1, 'Máy tính xách tay gaming ASUS ROG Zephyrus G14', '["./Public/images/product/large-size/9.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Laptop gaming nhẹ nhàng, màn hình 14 inch, card đồ họa NVIDIA GeForce RTX và hiệu suất ổn định.', 30000000, 10, 3, '2023-12-11 15:57:33', '2023-12-20 05:45:22', NULL),
	(48, 36, 1, 'Tai nghe Gaming SteelSeries Arctis Pro Wireless', '["./Public/images/product/large-size/11.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Tai nghe chơi game không dây, âm thanh không lẫn vào nhau, mic chất lượng và kết nối đa nền tảng.', 30000000, 10, 0, '2023-12-11 15:57:33', '2023-12-26 18:25:58', NULL),
	(49, 37, 1, 'Router Wi-Fi Mesh TP-Link Deco X60', '["./Public/images/product/large-size/8.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', ' Hệ thống Wi-Fi Mesh, phủ sóng mạnh mẽ, tốc độ cao và quản lý mạng dễ dàng qua ứng dụng.', 30000000, 10, 3, '2023-12-11 15:57:33', '2023-12-24 11:39:03', NULL),
	(50, 38, 1, 'Màn hình LG 50 inch siêu nét', '["./Public/images/product/large-size/9.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Màn hình cong phun Hd phù hợp xem phim chơi game ,... và phục vụ nhiều nhu cầu ..', 30000000, 10, 3, '2023-12-11 15:57:33', '2023-12-20 05:45:28', NULL),
	(51, 39, 1, 'Máy chơi game mini', '["./Public/images/product/large-size/1.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Máy chơi game mini phù hợp chiến nhiều loại game', 300000, 10, 0, '2023-12-11 15:57:33', '2023-12-20 05:45:29', NULL),
	(52, 40, 1, 'Smart TV Sony Bravia XR A80J 65 inch', '["./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'TV 4K HDR, công nghệ động hình XR, âm thanh Dolby Atmos và điều khiển bằng giọng nói.', 300000, 10, 0, '2023-12-11 15:57:33', '2023-12-20 05:45:29', NULL),
	(53, 41, 1, 'Máy rửa chén Bosch Serie 6', '["./Public/images/product/large-size/3.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Máy rửa chén thông minh, tiết kiệm nước và năng lượng, nhiều chế độ rửa linh hoạt.', 300000, 10, 0, '2023-12-11 15:57:33', '2023-12-20 05:45:30', NULL),
	(54, 42, 1, 'Loa thông minh Amazon Echo Dot (4th Gen)', '["./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Loa thông minh có trợ lý ảo Alexa, phát nhạc, điều khiển thiết bị thông minh và trò chuyện.', 300000, 10, 0, '2023-12-11 15:57:33', '2023-12-20 05:45:31', NULL),
	(55, 73, 1, 'Máy chơi game mini', '["./Public/images/product/large-size/2.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Máy chơi game mini phù hợp chiến nhiều loại game', 300000, 10, 0, '2023-12-11 15:57:33', '2023-12-26 18:12:12', NULL),
	(56, 44, 0, 'Màn hình gaming 32 inch phun HD chiến mọi loại game', '["./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Màn hình cong phun Hd phù hợp xem phim chơi game ,... và phục vụ nhiều nhu cầu ..', 1500000, 10, 2, '2023-12-11 15:57:33', '2023-12-20 05:45:35', NULL),
	(57, 45, 0, 'Máy giặt Panasonic 10kg', '["./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Máy giặt tiết kiệm nước, có nhiều chương trình giặt linh hoạt.', 1500000, 10, 0, '2023-12-11 15:57:33', '2023-12-26 18:26:01', NULL),
	(58, 46, 0, 'Laptop Acer Nitro 16 Phoenix AN16-41-R5M4', '["./Public/images/product/large-size/7.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Bạn là một game thủ chuyên nghiệp, luôn muốn có những trải nghiệm chơi game tốt nhất? Bạn cũng là một người có nhiều công việc và học tập, cần một chiếc laptop đa năng và hiệu quả? Bạn còn là một người yêu thích sự đẹp đẽ và thời trang, muốn có một chiếc laptop có thiết kế ấn tượng và tiện lợi? Nếu bạn có tất cả những yêu cầu trên, thì bạn không thể bỏ qua Laptop Gaming ACER NITRO 16 PHOENIX - chiếc laptop gaming quốc dân của ACER, được Phong Vũ giới thiệu với laptop acer giá rẻ hợp lý. Laptop Gaming ACER NITRO 16 PHOENIX sẽ làm hài lòng bạn với những tính năng dưới đây, cùng Phong Vũ tìm hiểu ở bài viết dưới đây nhé!', 1500000, 10, 2, '2023-12-11 15:57:33', '2023-12-20 05:45:37', NULL),
	(59, 1, 0, 'Màn hình gaming 32 inch phun HD chiến mọi loại game', '["./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Màn hình cong phun Hd phù hợp xem phim chơi game ,... và phục vụ nhiều nhu cầu ..', 1500000, 10, 2, '2023-12-11 15:57:33', '2023-12-20 05:45:41', NULL),
	(60, 47, 0, 'Màn hình LG 50 inch siêu nét', '["./Public/images/product/large-size/9.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Màn hình cong phun Hd phù hợp xem phim chơi game ,... và phục vụ nhiều nhu cầu ..', 1500000, 10, 0, '2023-12-11 15:57:33', '2023-12-26 18:26:02', NULL),
	(61, 48, 0, 'Laptop Dell XPS 15', '["./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Laptop siêu mỏng với màn hình InfinityEdge 4K và hiệu suất đa nhiệm cao.', 1500000, 10, 2, '2023-12-11 15:57:33', '2023-12-20 05:45:43', NULL),
	(62, 49, 0, 'Màn hình gaming 32 inch phun HD chiến mọi loại game', '["./Public/images/product/large-size/3.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Màn hình cong phun Hd phù hợp xem phim chơi game ,... và phục vụ nhiều nhu cầu ..', 6200000, 10, 3, '2023-12-11 15:57:33', '2023-12-20 05:45:43', NULL),
	(63, 50, 0, 'Điện thoại di động iPhone 13 Pro', '["./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'iPhone 13 Pro với màn hình Super Retina XDR, camera tiên tiến và hiệu suất mạnh mẽ.', 6200000, 10, 3, '2023-12-11 15:57:33', '2023-12-20 05:45:44', NULL),
	(64, 92, 0, 'TV QLED Samsung 4K 55 inch', '["./Public/images/product/large-size/8.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'TV 4K với công nghệ Quantum Dot mang đến hình ảnh sắc nét và màu sắc rực rỡ.', 6200000, 10, 0, '2023-12-11 15:57:33', '2023-12-26 18:26:04', NULL),
	(65, 52, 0, 'Máy chơi game mini', '["./Public/images/product/large-size/11.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Màn hình cong phun Hd phù hợp xem phim chơi game ,... và phục vụ nhiều nhu cầu ..', 6200000, 10, 3, '2023-12-11 15:57:33', '2023-12-20 05:45:48', NULL),
	(66, 53, 0, 'Máy chơi game mini', '["./Public/images/product/large-size/11.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Màn hình cong phun Hd phù hợp xem phim chơi game ,... và phục vụ nhiều nhu cầu ..', 6200000, 10, 3, '2023-12-11 15:57:33', '2023-12-20 05:45:50', NULL),
	(67, 1, 0, 'Điện thoại di động iPhone 13 Pro', '["./Public/images/product/large-size/1.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'iPhone 13 Pro với màn hình Super Retina XDR, camera tiên tiến và hiệu suất mạnh mẽ.', 25000000, 10, 0, '2023-12-11 15:57:33', '2023-12-26 18:26:03', NULL),
	(68, 3, 0, 'Điện thoại di động iPhone 13 Pro', '["./Public/images/product/large-size/1.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'iPhone 13 Pro với màn hình Super Retina XDR, camera tiên tiến và hiệu suất mạnh mẽ.', 25000000, 10, 1, '2023-12-11 15:57:33', '2023-12-26 18:10:47', NULL),
	(69, 2, 0, 'Điện thoại di động iPhone 13 Pro', '["./Public/images/product/large-size/1.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'iPhone 13 Pro với màn hình Super Retina XDR, camera tiên tiến và hiệu suất mạnh mẽ.', 25000000, 10, 0, '2023-12-11 15:57:33', '2023-12-26 18:26:03', NULL),
	(70, 55, 0, 'Điện thoại di động iPhone 13 Pro', '["./Public/images/product/large-size/1.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'iPhone 13 Pro với màn hình Super Retina XDR, camera tiên tiến và hiệu suất mạnh mẽ.', 25000000, 10, 1, '2023-12-11 15:57:33', '2023-12-26 18:10:51', NULL),
	(71, 54, 0, 'Điện thoại di động iPhone 13 Pro', '["./Public/images/product/large-size/1.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'iPhone 13 Pro với màn hình Super Retina XDR, camera tiên tiến và hiệu suất mạnh mẽ.', 25000000, 10, 1, '2023-12-11 15:57:33', '2023-12-26 18:10:53', NULL),
	(72, 29, 0, 'Điện thoại di động iPhone 13 Pro', '["./Public/images/product/large-size/1.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'iPhone 13 Pro với màn hình Super Retina XDR, camera tiên tiến và hiệu suất mạnh mẽ.', 25000000, 10, 1, '2023-12-11 15:57:33', '2023-12-26 18:11:05', NULL),
	(73, 70, 0, 'Điện thoại di động iPhone 13 Pro', '["./Public/images/product/large-size/1.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'iPhone 13 Pro với màn hình Super Retina XDR, camera tiên tiến và hiệu suất mạnh mẽ.', 25000000, 10, 0, '2023-12-11 15:57:33', '2023-12-26 18:26:08', NULL),
	(74, 111, 0, 'Điện thoại di động iPhone 13 Pro', '["./Public/images/product/large-size/1.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'iPhone 13 Pro với màn hình Super Retina XDR, camera tiên tiến và hiệu suất mạnh mẽ.', 25000000, 10, 1, '2023-12-11 15:57:33', '2023-12-26 18:11:11', NULL),
	(75, 123, 0, 'Điện thoại di động iPhone 13 Pro', '["./Public/images/product/large-size/1.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'iPhone 13 Pro với màn hình Super Retina XDR, camera tiên tiến và hiệu suất mạnh mẽ.', 25000000, 10, 0, '2023-12-11 15:57:33', '2023-12-26 18:26:09', NULL),
	(76, 89, 0, 'Điện thoại di động iPhone 13 Pro', '["./Public/images/product/large-size/1.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'iPhone 13 Pro với màn hình Super Retina XDR, camera tiên tiến và hiệu suất mạnh mẽ.', 25000000, 10, 1, '2023-12-11 15:57:33', '2023-12-26 18:11:17', NULL),
	(77, 99, 0, 'Điện thoại di động iPhone 13 Pro', '["./Public/images/product/large-size/1.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'iPhone 13 Pro với màn hình Super Retina XDR, camera tiên tiến và hiệu suất mạnh mẽ.', 25000000, 10, 1, '2023-12-11 15:57:33', '2023-12-26 18:11:20', NULL),
	(78, 66, 0, 'TV QLED Samsung 4K 55 inch', '["./Public/images/product/large-size/8.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'TV 4K với công nghệ Quantum Dot mang đến hình ảnh sắc nét và màu sắc rực rỡ.', 6200000, 10, 3, '2023-12-11 15:57:33', '2023-12-26 18:11:27', NULL),
	(79, 51, 0, 'TV QLED Samsung 4K 55 inch', '["./Public/images/product/large-size/8.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'TV 4K với công nghệ Quantum Dot mang đến hình ảnh sắc nét và màu sắc rực rỡ.', 6200000, 10, 0, '2023-12-11 15:57:33', '2023-12-26 18:26:07', NULL),
	(80, 58, 0, 'TV QLED Samsung 4K 55 inch', '["./Public/images/product/large-size/8.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'TV 4K với công nghệ Quantum Dot mang đến hình ảnh sắc nét và màu sắc rực rỡ.', 6200000, 10, 3, '2023-12-11 15:57:33', '2023-12-26 18:11:35', NULL),
	(81, 77, 0, 'TV QLED Samsung 4K 55 inch', '["./Public/images/product/large-size/8.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'TV 4K với công nghệ Quantum Dot mang đến hình ảnh sắc nét và màu sắc rực rỡ.', 6200000, 10, 3, '2023-12-11 15:57:33', '2023-12-26 18:11:41', NULL),
	(82, 95, 1, 'Máy chơi game mini', '["./Public/images/product/large-size/2.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Máy chơi game mini phù hợp chiến nhiều loại game', 300000, 10, 0, '2023-12-11 15:57:33', '2023-12-26 18:12:03', NULL),
	(83, 43, 1, 'Máy chơi game mini', '["./Public/images/product/large-size/2.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Máy chơi game mini phù hợp chiến nhiều loại game', 300000, 10, 0, '2023-12-11 15:57:33', '2023-12-24 11:39:35', NULL),
	(84, 85, 1, 'Máy chơi game mini', '["./Public/images/product/large-size/2.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Máy chơi game mini phù hợp chiến nhiều loại game', 300000, 10, 0, '2023-12-11 15:57:33', '2023-12-26 18:12:07', NULL),
	(85, 100, 1, 'Máy tính xách tay gaming ASUS ROG Zephyrus G14', '["./Public/images/product/large-size/9.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Laptop gaming nhẹ nhàng, màn hình 14 inch, card đồ họa NVIDIA GeForce RTX và hiệu suất ổn định.', 30000000, 10, 0, '2023-12-11 15:57:33', '2023-12-26 18:26:15', NULL),
	(86, 115, 1, 'Máy tính xách tay gaming ASUS ROG Zephyrus G14', '["./Public/images/product/large-size/9.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Laptop gaming nhẹ nhàng, màn hình 14 inch, card đồ họa NVIDIA GeForce RTX và hiệu suất ổn định.', 30000000, 10, 3, '2023-12-11 15:57:33', '2023-12-26 18:12:36', NULL),
	(87, 130, 1, 'Máy tính xách tay gaming ASUS ROG Zephyrus G14', '["./Public/images/product/large-size/9.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Laptop gaming nhẹ nhàng, màn hình 14 inch, card đồ họa NVIDIA GeForce RTX và hiệu suất ổn định.', 30000000, 10, 0, '2023-12-11 15:57:33', '2023-12-26 18:26:14', NULL),
	(88, 155, 1, 'Máy tính xách tay gaming ASUS ROG Zephyrus G14', '["./Public/images/product/large-size/9.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Laptop gaming nhẹ nhàng, màn hình 14 inch, card đồ họa NVIDIA GeForce RTX và hiệu suất ổn định.', 30000000, 10, 3, '2023-12-11 15:57:33', '2023-12-26 18:13:05', NULL),
	(89, 200, 1, 'Máy tính xách tay gaming ASUS ROG Zephyrus G14', '["./Public/images/product/large-size/9.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Laptop gaming nhẹ nhàng, màn hình 14 inch, card đồ họa NVIDIA GeForce RTX và hiệu suất ổn định.', 30000000, 10, 0, '2023-12-11 15:57:33', '2023-12-26 18:26:13', NULL),
	(90, 188, 1, 'Máy tính xách tay gaming ASUS ROG Zephyrus G14', '["./Public/images/product/large-size/9.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Laptop gaming nhẹ nhàng, màn hình 14 inch, card đồ họa NVIDIA GeForce RTX và hiệu suất ổn định.', 30000000, 10, 3, '2023-12-11 15:57:33', '2023-12-26 18:12:56', NULL),
	(91, 150, 1, 'Máy tính xách tay gaming ASUS ROG Zephyrus G14', '["./Public/images/product/large-size/9.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Laptop gaming nhẹ nhàng, màn hình 14 inch, card đồ họa NVIDIA GeForce RTX và hiệu suất ổn định.', 30000000, 10, 3, '2023-12-11 15:57:33', '2023-12-26 18:13:01', NULL),
	(92, 217, 0, 'Bếp từ Electrolux EHF96547XK', '["./Public/images/product/large-size/7.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Bếp từ điều khiển cảm ứng, an toàn và tiết kiệm điện năng', 6200000, 10, 0, '2023-12-11 15:57:33', '2023-12-26 18:26:12', NULL),
	(93, 215, 0, 'Bếp từ Electrolux EHF96547XK', '["./Public/images/product/large-size/7.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Bếp từ điều khiển cảm ứng, an toàn và tiết kiệm điện năng', 6200000, 10, 3, '2023-12-11 15:57:33', '2023-12-26 18:13:30', NULL),
	(94, 145, 0, 'Bếp từ Electrolux EHF96547XK', '["./Public/images/product/large-size/7.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Bếp từ điều khiển cảm ứng, an toàn và tiết kiệm điện năng', 6200000, 10, 3, '2023-12-11 15:57:33', '2023-12-26 18:13:48', NULL),
	(95, 132, 0, 'Bếp từ Electrolux EHF96547XK', '["./Public/images/product/large-size/7.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Bếp từ điều khiển cảm ứng, an toàn và tiết kiệm điện năng', 6200000, 10, 0, '2023-12-11 15:57:33', '2023-12-26 18:26:12', NULL),
	(96, 174, 0, 'Bếp từ Electrolux EHF96547XK', '["./Public/images/product/large-size/7.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Bếp từ điều khiển cảm ứng, an toàn và tiết kiệm điện năng', 6200000, 10, 3, '2023-12-11 15:57:33', '2023-12-26 18:13:39', NULL),
	(97, 111, 0, 'TV QLED Samsung 4K 55 inch', '["./Public/images/product/large-size/3.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'TV 4K với công nghệ Quantum Dot mang đến hình ảnh sắc nét và màu sắc rực rỡ.', 15900000, 10, 0, '2023-12-11 15:57:33', '2023-12-26 18:26:11', NULL),
	(98, 122, 0, 'TV QLED Samsung 4K 55 inch', '["./Public/images/product/large-size/3.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'TV 4K với công nghệ Quantum Dot mang đến hình ảnh sắc nét và màu sắc rực rỡ.', 15900000, 10, 5, '2023-12-11 15:57:33', '2023-12-26 18:14:11', NULL),
	(99, 109, 0, 'TV QLED Samsung 4K 55 inch', '["./Public/images/product/large-size/3.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'TV 4K với công nghệ Quantum Dot mang đến hình ảnh sắc nét và màu sắc rực rỡ.', 15900000, 10, 0, '2023-12-11 15:57:33', '2023-12-26 18:26:20', NULL),
	(100, 158, 0, 'TV QLED Samsung 4K 55 inch', '["./Public/images/product/large-size/3.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'TV 4K với công nghệ Quantum Dot mang đến hình ảnh sắc nét và màu sắc rực rỡ.', 15900000, 10, 5, '2023-12-11 15:57:33', '2023-12-26 18:14:18', NULL),
	(101, 102, 0, 'TV QLED Samsung 4K 55 inch', '["./Public/images/product/large-size/3.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'TV 4K với công nghệ Quantum Dot mang đến hình ảnh sắc nét và màu sắc rực rỡ.', 15900000, 10, 0, '2023-12-11 15:57:33', '2023-12-26 18:26:18', NULL),
	(102, 102, 0, 'Máy in laser màu HP Color LaserJet Pro M283fdw', '["./Public/images/product/large-size/8.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Máy in đa chức năng, in laser màu nhanh chóng, kết nối đa nền tảng và chất lượng in cao.', 9820000, 10, 0, '2023-12-12 11:26:28', '2023-12-26 18:26:17', NULL),
	(103, 88, 0, 'Máy in laser màu HP Color LaserJet Pro M283fdw', '["./Public/images/product/large-size/8.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Máy in đa chức năng, in laser màu nhanh chóng, kết nối đa nền tảng và chất lượng in cao.', 9820000, 10, 2, '2023-12-12 11:26:28', '2023-12-26 18:14:59', NULL),
	(104, 77, 0, 'Máy in laser màu HP Color LaserJet Pro M283fdw', '["./Public/images/product/large-size/8.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Máy in đa chức năng, in laser màu nhanh chóng, kết nối đa nền tảng và chất lượng in cao.', 9820000, 10, 2, '2023-12-12 11:26:28', '2023-12-26 18:15:02', NULL),
	(105, 190, 0, 'Máy in laser màu HP Color LaserJet Pro M283fdw', '["./Public/images/product/large-size/8.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Máy in đa chức năng, in laser màu nhanh chóng, kết nối đa nền tảng và chất lượng in cao.', 9820000, 10, 0, '2023-12-12 11:26:28', '2023-12-26 18:26:17', NULL),
	(106, 199, 0, 'Máy in laser màu HP Color LaserJet Pro M283fdw', '["./Public/images/product/large-size/8.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Máy in đa chức năng, in laser màu nhanh chóng, kết nối đa nền tảng và chất lượng in cao.', 9820000, 10, 2, '2023-12-12 11:26:28', '2023-12-26 18:15:11', NULL),
	(107, 197, 0, 'Máy in laser màu HP Color LaserJet Pro M283fdw', '["./Public/images/product/large-size/8.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Máy in đa chức năng, in laser màu nhanh chóng, kết nối đa nền tảng và chất lượng in cao.', 9820000, 10, 0, '2023-12-12 11:26:28', '2023-12-26 18:26:16', NULL),
	(108, 183, 0, 'Máy in laser màu HP Color LaserJet Pro M283fdw', '["./Public/images/product/large-size/8.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Máy in đa chức năng, in laser màu nhanh chóng, kết nối đa nền tảng và chất lượng in cao.', 9820000, 10, 0, '2023-12-12 11:26:28', '2023-12-26 18:26:30', NULL),
	(109, 187, 0, 'Máy in laser màu HP Color LaserJet Pro M283fdw', '["./Public/images/product/large-size/8.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Máy in đa chức năng, in laser màu nhanh chóng, kết nối đa nền tảng và chất lượng in cao.', 9820000, 10, 0, '2023-12-12 11:26:28', '2023-12-26 18:26:28', NULL),
	(110, 112, 0, 'Ổ cứng di động SSD SanDisk Extreme Pro 1TB', '["./Public/images/product/large-size/12.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Bạn là một game thủ chuyên nghiệp, luôn muốn có những trải nghiệm chơi game tốt nhất? Bạn cũng là một người có nhiều công việc và học tập, cần một chiếc laptop đa năng và hiệu quả? Bạn còn là một người yêu thích sự đẹp đẽ và thời trang, muốn có một chiếc laptop có thiết kế ấn tượng và tiện lợi? Nếu bạn có tất cả những yêu cầu trên, thì bạn không thể bỏ qua Laptop Gaming ACER NITRO 16 PHOENIX - chiếc laptop gaming quốc dân của ACER, được Phong Vũ giới thiệu với laptop acer giá rẻ hợp lý. Laptop Gaming ACER NITRO 16 PHOENIX sẽ làm hài lòng bạn với những tính năng dưới đây, cùng Phong Vũ tìm hiểu ở bài viết dưới đây nhé!', 32000000, 10, 0, '2023-12-12 11:26:28', '2023-12-26 18:26:27', NULL),
	(111, 125, 0, 'Ổ cứng di động SSD SanDisk Extreme Pro 1TB', '["./Public/images/product/large-size/12.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Bạn là một game thủ chuyên nghiệp, luôn muốn có những trải nghiệm chơi game tốt nhất? Bạn cũng là một người có nhiều công việc và học tập, cần một chiếc laptop đa năng và hiệu quả? Bạn còn là một người yêu thích sự đẹp đẽ và thời trang, muốn có một chiếc laptop có thiết kế ấn tượng và tiện lợi? Nếu bạn có tất cả những yêu cầu trên, thì bạn không thể bỏ qua Laptop Gaming ACER NITRO 16 PHOENIX - chiếc laptop gaming quốc dân của ACER, được Phong Vũ giới thiệu với laptop acer giá rẻ hợp lý. Laptop Gaming ACER NITRO 16 PHOENIX sẽ làm hài lòng bạn với những tính năng dưới đây, cùng Phong Vũ tìm hiểu ở bài viết dưới đây nhé!', 32000000, 10, 2, '2023-12-12 11:26:28', '2023-12-26 18:15:44', NULL),
	(112, 149, 0, 'Ổ cứng di động SSD SanDisk Extreme Pro 1TB', '["./Public/images/product/large-size/12.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Bạn là một game thủ chuyên nghiệp, luôn muốn có những trải nghiệm chơi game tốt nhất? Bạn cũng là một người có nhiều công việc và học tập, cần một chiếc laptop đa năng và hiệu quả? Bạn còn là một người yêu thích sự đẹp đẽ và thời trang, muốn có một chiếc laptop có thiết kế ấn tượng và tiện lợi? Nếu bạn có tất cả những yêu cầu trên, thì bạn không thể bỏ qua Laptop Gaming ACER NITRO 16 PHOENIX - chiếc laptop gaming quốc dân của ACER, được Phong Vũ giới thiệu với laptop acer giá rẻ hợp lý. Laptop Gaming ACER NITRO 16 PHOENIX sẽ làm hài lòng bạn với những tính năng dưới đây, cùng Phong Vũ tìm hiểu ở bài viết dưới đây nhé!', 32000000, 10, 0, '2023-12-12 11:26:28', '2023-12-26 18:26:26', NULL),
	(113, 142, 0, 'Ổ cứng di động SSD SanDisk Extreme Pro 1TB', '["./Public/images/product/large-size/12.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Bạn là một game thủ chuyên nghiệp, luôn muốn có những trải nghiệm chơi game tốt nhất? Bạn cũng là một người có nhiều công việc và học tập, cần một chiếc laptop đa năng và hiệu quả? Bạn còn là một người yêu thích sự đẹp đẽ và thời trang, muốn có một chiếc laptop có thiết kế ấn tượng và tiện lợi? Nếu bạn có tất cả những yêu cầu trên, thì bạn không thể bỏ qua Laptop Gaming ACER NITRO 16 PHOENIX - chiếc laptop gaming quốc dân của ACER, được Phong Vũ giới thiệu với laptop acer giá rẻ hợp lý. Laptop Gaming ACER NITRO 16 PHOENIX sẽ làm hài lòng bạn với những tính năng dưới đây, cùng Phong Vũ tìm hiểu ở bài viết dưới đây nhé!', 32000000, 10, 2, '2023-12-12 11:26:28', '2023-12-26 18:15:52', NULL),
	(114, 132, 0, 'Ổ cứng di động SSD SanDisk Extreme Pro 1TB', '["./Public/images/product/large-size/12.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Bạn là một game thủ chuyên nghiệp, luôn muốn có những trải nghiệm chơi game tốt nhất? Bạn cũng là một người có nhiều công việc và học tập, cần một chiếc laptop đa năng và hiệu quả? Bạn còn là một người yêu thích sự đẹp đẽ và thời trang, muốn có một chiếc laptop có thiết kế ấn tượng và tiện lợi? Nếu bạn có tất cả những yêu cầu trên, thì bạn không thể bỏ qua Laptop Gaming ACER NITRO 16 PHOENIX - chiếc laptop gaming quốc dân của ACER, được Phong Vũ giới thiệu với laptop acer giá rẻ hợp lý. Laptop Gaming ACER NITRO 16 PHOENIX sẽ làm hài lòng bạn với những tính năng dưới đây, cùng Phong Vũ tìm hiểu ở bài viết dưới đây nhé!', 32000000, 10, 0, '2023-12-12 11:26:28', '2023-12-26 18:26:25', NULL),
	(115, 122, 0, 'Ổ cứng di động SSD SanDisk Extreme Pro 1TB', '["./Public/images/product/large-size/12.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Bạn là một game thủ chuyên nghiệp, luôn muốn có những trải nghiệm chơi game tốt nhất? Bạn cũng là một người có nhiều công việc và học tập, cần một chiếc laptop đa năng và hiệu quả? Bạn còn là một người yêu thích sự đẹp đẽ và thời trang, muốn có một chiếc laptop có thiết kế ấn tượng và tiện lợi? Nếu bạn có tất cả những yêu cầu trên, thì bạn không thể bỏ qua Laptop Gaming ACER NITRO 16 PHOENIX - chiếc laptop gaming quốc dân của ACER, được Phong Vũ giới thiệu với laptop acer giá rẻ hợp lý. Laptop Gaming ACER NITRO 16 PHOENIX sẽ làm hài lòng bạn với những tính năng dưới đây, cùng Phong Vũ tìm hiểu ở bài viết dưới đây nhé!', 32000000, 10, 2, '2023-12-12 11:26:28', '2023-12-26 18:15:57', NULL),
	(116, 102, 0, 'Ổ cứng di động SSD SanDisk Extreme Pro 1TB', '["./Public/images/product/large-size/12.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Bạn là một game thủ chuyên nghiệp, luôn muốn có những trải nghiệm chơi game tốt nhất? Bạn cũng là một người có nhiều công việc và học tập, cần một chiếc laptop đa năng và hiệu quả? Bạn còn là một người yêu thích sự đẹp đẽ và thời trang, muốn có một chiếc laptop có thiết kế ấn tượng và tiện lợi? Nếu bạn có tất cả những yêu cầu trên, thì bạn không thể bỏ qua Laptop Gaming ACER NITRO 16 PHOENIX - chiếc laptop gaming quốc dân của ACER, được Phong Vũ giới thiệu với laptop acer giá rẻ hợp lý. Laptop Gaming ACER NITRO 16 PHOENIX sẽ làm hài lòng bạn với những tính năng dưới đây, cùng Phong Vũ tìm hiểu ở bài viết dưới đây nhé!', 32000000, 10, 0, '2023-12-12 11:26:28', '2023-12-26 18:26:25', NULL),
	(117, 165, 0, 'Máy tính xách tay gaming ASUS ROG Zephyrus G14', '["./Public/images/product/large-size/7.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Laptop gaming nhẹ nhàng, màn hình 14 inch, card đồ họa NVIDIA GeForce RTX và hiệu suất ổn định.', 38000000, 10, 3, '2023-12-11 15:57:33', '2023-12-26 18:16:21', NULL),
	(118, 127, 0, 'Máy tính xách tay gaming ASUS ROG Zephyrus G14', '["./Public/images/product/large-size/7.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Laptop gaming nhẹ nhàng, màn hình 14 inch, card đồ họa NVIDIA GeForce RTX và hiệu suất ổn định.', 38000000, 10, 0, '2023-12-11 15:57:33', '2023-12-26 18:26:24', NULL),
	(119, 126, 0, 'Máy tính xách tay gaming ASUS ROG Zephyrus G14', '["./Public/images/product/large-size/7.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Laptop gaming nhẹ nhàng, màn hình 14 inch, card đồ họa NVIDIA GeForce RTX và hiệu suất ổn định.', 38000000, 10, 3, '2023-12-11 15:57:33', '2023-12-26 18:16:31', NULL),
	(120, 159, 0, 'Máy tính xách tay gaming ASUS ROG Zephyrus G14', '["./Public/images/product/large-size/7.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Laptop gaming nhẹ nhàng, màn hình 14 inch, card đồ họa NVIDIA GeForce RTX và hiệu suất ổn định.', 38000000, 10, 3, '2023-12-11 15:57:33', '2023-12-26 18:16:46', NULL),
	(121, 183, 0, 'Máy tính xách tay gaming ASUS ROG Zephyrus G14', '["./Public/images/product/large-size/7.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Laptop gaming nhẹ nhàng, màn hình 14 inch, card đồ họa NVIDIA GeForce RTX và hiệu suất ổn định.', 38000000, 10, 0, '2023-12-11 15:57:33', '2023-12-26 18:26:23', NULL),
	(122, 128, 0, 'Máy tính xách tay gaming ASUS ROG Zephyrus G14', '["./Public/images/product/large-size/7.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Laptop gaming nhẹ nhàng, màn hình 14 inch, card đồ họa NVIDIA GeForce RTX và hiệu suất ổn định.', 38000000, 10, 3, '2023-12-11 15:57:33', '2023-12-26 18:16:55', NULL),
	(123, 138, 0, 'Máy tính xách tay gaming ASUS ROG Zephyrus G14', '["./Public/images/product/large-size/7.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Laptop gaming nhẹ nhàng, màn hình 14 inch, card đồ họa NVIDIA GeForce RTX và hiệu suất ổn định.', 38000000, 10, 0, '2023-12-11 15:57:33', '2023-12-26 18:26:33', NULL),
	(124, 119, 0, 'Máy tính xách tay gaming ASUS ROG Zephyrus G14', '["./Public/images/product/large-size/7.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Laptop gaming nhẹ nhàng, màn hình 14 inch, card đồ họa NVIDIA GeForce RTX và hiệu suất ổn định.', 38000000, 10, 5, '2023-12-11 15:57:33', '2023-12-26 18:27:55', NULL),
	(125, 115, 0, 'Máy chiếu mini Anker Nebula Capsule II', '["./Public/images/product/large-size/8.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Máy chiếu cầm tay, hỗ trợ độ phân giải HD, Android TV và pin lâu bền.', 6200000, 10, 3, '2023-12-11 15:57:33', '2023-12-26 18:17:26', NULL),
	(126, 11, 0, 'Máy chiếu mini Anker Nebula Capsule II', '["./Public/images/product/large-size/8.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Máy chiếu cầm tay, hỗ trợ độ phân giải HD, Android TV và pin lâu bền.', 6200000, 10, 0, '2023-12-11 15:57:33', '2023-12-26 18:26:20', NULL),
	(127, 190, 0, 'Máy chiếu mini Anker Nebula Capsule II', '["./Public/images/product/large-size/8.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Máy chiếu cầm tay, hỗ trợ độ phân giải HD, Android TV và pin lâu bền.', 6200000, 10, 3, '2023-12-11 15:57:33', '2023-12-26 18:17:35', NULL),
	(128, 152, 0, 'Máy chiếu mini Anker Nebula Capsule II', '["./Public/images/product/large-size/8.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Máy chiếu cầm tay, hỗ trợ độ phân giải HD, Android TV và pin lâu bền.', 6200000, 10, 3, '2023-12-11 15:57:33', '2023-12-26 18:17:57', NULL),
	(129, 162, 0, 'Máy chiếu mini Anker Nebula Capsule II', '["./Public/images/product/large-size/8.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Máy chiếu cầm tay, hỗ trợ độ phân giải HD, Android TV và pin lâu bền.', 6200000, 10, 0, '2023-12-11 15:57:33', '2023-12-26 18:26:32', NULL),
	(130, 172, 0, 'Máy chiếu mini Anker Nebula Capsule II', '["./Public/images/product/large-size/8.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Máy chiếu cầm tay, hỗ trợ độ phân giải HD, Android TV và pin lâu bền.', 6200000, 10, 3, '2023-12-11 15:57:33', '2023-12-26 18:17:41', NULL),
	(131, 92, 0, 'Máy chiếu mini Anker Nebula Capsule II', '["./Public/images/product/large-size/8.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Máy chiếu cầm tay, hỗ trợ độ phân giải HD, Android TV và pin lâu bền.', 6200000, 10, 0, '2023-12-11 15:57:33', '2023-12-26 18:26:40', NULL),
	(132, 82, 0, 'Máy chiếu mini Anker Nebula Capsule II', '["./Public/images/product/large-size/8.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Máy chiếu cầm tay, hỗ trợ độ phân giải HD, Android TV và pin lâu bền.', 6200000, 10, 0, '2023-12-11 15:57:33', '2023-12-26 18:26:39', NULL),
	(133, 98, 0, 'Smart TV Sony Bravia XR A80J 65 inch', '["./Public/images/product/large-size/1.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'TV 4K HDR, công nghệ động hình XR, âm thanh Dolby Atmos và điều khiển bằng giọng nói.', 6200000, 10, 3, '2023-12-11 15:57:33', '2023-12-26 18:18:37', NULL),
	(134, 97, 0, 'Smart TV Sony Bravia XR A80J 65 inch', '["./Public/images/product/large-size/1.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'TV 4K HDR, công nghệ động hình XR, âm thanh Dolby Atmos và điều khiển bằng giọng nói.', 6200000, 10, 0, '2023-12-11 15:57:33', '2023-12-26 18:26:38', NULL),
	(135, 64, 0, 'Smart TV Sony Bravia XR A80J 65 inch', '["./Public/images/product/large-size/1.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'TV 4K HDR, công nghệ động hình XR, âm thanh Dolby Atmos và điều khiển bằng giọng nói.', 6200000, 10, 0, '2023-12-11 15:57:33', '2023-12-26 18:26:35', NULL),
	(136, 208, 0, 'Smart TV Sony Bravia XR A80J 65 inch', '["./Public/images/product/large-size/1.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'TV 4K HDR, công nghệ động hình XR, âm thanh Dolby Atmos và điều khiển bằng giọng nói.', 6200000, 10, 3, '2023-12-11 15:57:33', '2023-12-26 18:19:01', NULL),
	(137, 96, 0, 'Smart TV Sony Bravia XR A80J 65 inch', '["./Public/images/product/large-size/1.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'TV 4K HDR, công nghệ động hình XR, âm thanh Dolby Atmos và điều khiển bằng giọng nói.', 6200000, 10, 3, '2023-12-11 15:57:33', '2023-12-26 18:18:52', NULL),
	(138, 100, 0, 'Smart TV Sony Bravia XR A80J 65 inch', '["./Public/images/product/large-size/1.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'TV 4K HDR, công nghệ động hình XR, âm thanh Dolby Atmos và điều khiển bằng giọng nói.', 6200000, 10, 0, '2023-12-11 15:57:33', '2023-12-26 18:26:37', NULL),
	(139, 203, 0, 'Màn hình gaming 32 inch phun HD chiến mọi loại game', '["./Public/images/product/large-size/7.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Màn hình cong phun Hd phù hợp xem phim chơi game ,... và phục vụ nhiều nhu cầu ..', 6200000, 10, 0, '2023-12-11 15:57:33', '2023-12-26 18:26:34', NULL),
	(140, 210, 0, 'Màn hình gaming 32 inch phun HD chiến mọi loại game', '["./Public/images/product/large-size/7.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Màn hình cong phun Hd phù hợp xem phim chơi game ,... và phục vụ nhiều nhu cầu ..', 6200000, 10, 3, '2023-12-11 15:57:33', '2023-12-26 18:19:16', NULL),
	(141, 154, 0, 'Màn hình gaming 32 inch phun HD chiến mọi loại game', '["./Public/images/product/large-size/7.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Màn hình cong phun Hd phù hợp xem phim chơi game ,... và phục vụ nhiều nhu cầu ..', 6200000, 10, 0, '2023-12-11 15:57:33', '2023-12-26 18:27:01', NULL),
	(142, 164, 0, 'Màn hình gaming 32 inch phun HD chiến mọi loại game', '["./Public/images/product/large-size/7.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Màn hình cong phun Hd phù hợp xem phim chơi game ,... và phục vụ nhiều nhu cầu ..', 6200000, 10, 2, '2023-12-11 15:57:33', '2023-12-26 18:27:03', NULL),
	(143, 194, 0, 'Màn hình gaming 32 inch phun HD chiến mọi loại game', '["./Public/images/product/large-size/7.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Màn hình cong phun Hd phù hợp xem phim chơi game ,... và phục vụ nhiều nhu cầu ..', 6200000, 10, 0, '2023-12-11 15:57:33', '2023-12-26 18:26:56', NULL),
	(144, 194, 0, 'Màn hình gaming 32 inch phun HD chiến mọi loại game', '["./Public/images/product/large-size/7.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Màn hình cong phun Hd phù hợp xem phim chơi game ,... và phục vụ nhiều nhu cầu ..', 6200000, 10, 1, '2023-12-11 15:57:33', '2023-12-26 18:27:04', NULL),
	(145, 168, 0, 'Máy rửa chén Bosch Serie 6', '["./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Máy rửa chén thông minh, tiết kiệm nước và năng lượng, nhiều chế độ rửa linh hoạt.', 6200000, 10, 0, '2023-12-11 15:57:33', '2023-12-26 18:26:58', NULL),
	(146, 201, 0, 'Máy rửa chén Bosch Serie 6', '["./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Máy rửa chén thông minh, tiết kiệm nước và năng lượng, nhiều chế độ rửa linh hoạt.', 6200000, 10, 0, '2023-12-11 15:57:33', '2023-12-26 18:26:56', NULL),
	(147, 156, 0, 'Máy rửa chén Bosch Serie 6', '["./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Máy rửa chén thông minh, tiết kiệm nước và năng lượng, nhiều chế độ rửa linh hoạt.', 6200000, 10, 3, '2023-12-11 15:57:33', '2023-12-26 18:20:17', NULL),
	(148, 102, 0, 'Máy rửa chén Bosch Serie 6', '["./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Máy rửa chén thông minh, tiết kiệm nước và năng lượng, nhiều chế độ rửa linh hoạt.', 6200000, 10, 3, '2023-12-11 15:57:33', '2023-12-26 18:20:11', NULL),
	(149, 209, 0, 'Máy rửa chén Bosch Serie 6', '["./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Máy rửa chén thông minh, tiết kiệm nước và năng lượng, nhiều chế độ rửa linh hoạt.', 6200000, 10, 0, '2023-12-11 15:57:33', '2023-12-26 18:26:57', NULL),
	(150, 89, 0, 'Màn hình gaming 32 inch phun HD chiến mọi loại game', '["./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Màn hình cong phun Hd phù hợp xem phim chơi game ,... và phục vụ nhiều nhu cầu ..', 1500000, 10, 0, '2023-12-11 15:57:33', '2023-12-26 18:27:30', NULL),
	(151, 62, 0, 'Màn hình gaming 32 inch phun HD chiến mọi loại game', '["./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Màn hình cong phun Hd phù hợp xem phim chơi game ,... và phục vụ nhiều nhu cầu ..', 1500000, 10, 0, '2023-12-11 15:57:33', '2023-12-26 18:27:29', NULL),
	(152, 68, 0, 'Màn hình gaming 32 inch phun HD chiến mọi loại game', '["./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Màn hình cong phun Hd phù hợp xem phim chơi game ,... và phục vụ nhiều nhu cầu ..', 1500000, 10, 0, '2023-12-11 15:57:33', '2023-12-26 18:27:29', NULL),
	(153, 20, 0, 'Màn hình gaming 32 inch phun HD chiến mọi loại game', '["./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Màn hình cong phun Hd phù hợp xem phim chơi game ,... và phục vụ nhiều nhu cầu ..', 1500000, 10, 2, '2023-12-11 15:57:33', '2023-12-26 18:21:04', NULL),
	(154, 23, 0, 'TV QLED Samsung 4K 55 inch', '["./Public/images/product/large-size/8.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'TV 4K với công nghệ Quantum Dot mang đến hình ảnh sắc nét và màu sắc rực rỡ.', 6200000, 10, 1, '2023-12-11 15:57:33', '2023-12-26 18:27:08', NULL),
	(155, 65, 0, 'TV QLED Samsung 4K 55 inch', '["./Public/images/product/large-size/8.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'TV 4K với công nghệ Quantum Dot mang đến hình ảnh sắc nét và màu sắc rực rỡ.', 6200000, 10, 3, '2023-12-11 15:57:33', '2023-12-26 18:21:22', NULL),
	(156, 73, 0, 'TV QLED Samsung 4K 55 inch', '["./Public/images/product/large-size/8.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'TV 4K với công nghệ Quantum Dot mang đến hình ảnh sắc nét và màu sắc rực rỡ.', 6200000, 10, 1, '2023-12-11 15:57:33', '2023-12-26 18:27:05', NULL),
	(157, 173, 0, 'TV QLED Samsung 4K 55 inch', '["./Public/images/product/large-size/8.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'TV 4K với công nghệ Quantum Dot mang đến hình ảnh sắc nét và màu sắc rực rỡ.', 6200000, 10, 0, '2023-12-11 15:57:33', '2023-12-26 18:27:28', NULL),
	(158, 48, 0, 'Máy giặt Panasonic 10kg', '["./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Máy giặt tiết kiệm nước, có nhiều chương trình giặt linh hoạt.', 1500000, 10, 0, '2023-12-11 15:57:33', '2023-12-26 18:27:27', NULL),
	(159, 68, 0, 'Máy giặt Panasonic 10kg', '["./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Máy giặt tiết kiệm nước, có nhiều chương trình giặt linh hoạt.', 1500000, 10, 0, '2023-12-11 15:57:33', '2023-12-26 18:27:26', NULL),
	(160, 52, 0, 'Máy giặt Panasonic 10kg', '["./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Máy giặt tiết kiệm nước, có nhiều chương trình giặt linh hoạt.', 1500000, 10, 0, '2023-12-11 15:57:33', '2023-12-26 18:27:32', NULL),
	(161, 92, 0, 'Máy giặt Panasonic 10kg', '["./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Máy giặt tiết kiệm nước, có nhiều chương trình giặt linh hoạt.', 1500000, 10, 0, '2023-12-11 15:57:33', '2023-12-26 18:27:33', NULL),
	(162, 103, 0, 'Máy giặt Panasonic 10kg', '["./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Máy giặt tiết kiệm nước, có nhiều chương trình giặt linh hoạt.', 1500000, 10, 2, '2023-12-11 15:57:33', '2023-12-26 18:22:40', NULL),
	(163, 106, 1, 'Loa Bluetooth JBL Flip 5', '["./Public/images/product/large-size/7.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Loa di động chất lượng cao, âm thanh rõ ràng và pin lâu bền.', 30000000, 10, 0, '2023-12-11 15:57:33', '2023-12-26 18:27:31', NULL),
	(164, 197, 1, 'Loa Bluetooth JBL Flip 5', '["./Public/images/product/large-size/7.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Loa di động chất lượng cao, âm thanh rõ ràng và pin lâu bền.', 30000000, 10, 3, '2023-12-11 15:57:33', '2023-12-26 18:22:57', NULL),
	(165, 158, 1, 'Loa Bluetooth JBL Flip 5', '["./Public/images/product/large-size/7.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Loa di động chất lượng cao, âm thanh rõ ràng và pin lâu bền.', 30000000, 10, 0, '2023-12-11 15:57:33', '2023-12-26 18:27:38', NULL),
	(166, 183, 1, 'Loa Bluetooth JBL Flip 5', '["./Public/images/product/large-size/7.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Loa di động chất lượng cao, âm thanh rõ ràng và pin lâu bền.', 30000000, 10, 0, '2023-12-11 15:57:33', '2023-12-26 18:27:37', NULL),
	(167, 175, 1, 'Loa Bluetooth JBL Flip 5', '["./Public/images/product/large-size/7.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Loa di động chất lượng cao, âm thanh rõ ràng và pin lâu bền.', 30000000, 10, 0, '2023-12-11 15:57:33', '2023-12-26 18:27:39', NULL),
	(168, 164, 1, 'Điện thoại Samsung Galaxy S21 Ultra', '["./Public/images/product/large-size/1.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Điện thoại cao cấp, màn hình Dynamic AMOLED 6.8 inch, camera chất lượng cao và hỗ trợ bút S Pen.', 27900000, 10, 0, '2023-12-11 15:57:33', '2023-12-26 18:27:36', NULL),
	(169, 142, 1, 'Điện thoại Samsung Galaxy S21 Ultra', '["./Public/images/product/large-size/1.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Điện thoại cao cấp, màn hình Dynamic AMOLED 6.8 inch, camera chất lượng cao và hỗ trợ bút S Pen.', 27900000, 10, 0, '2023-12-11 15:57:33', '2023-12-26 18:27:36', NULL),
	(170, 172, 1, 'Điện thoại Samsung Galaxy S21 Ultra', '["./Public/images/product/large-size/1.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Điện thoại cao cấp, màn hình Dynamic AMOLED 6.8 inch, camera chất lượng cao và hỗ trợ bút S Pen.', 27900000, 10, 3, '2023-12-11 15:57:33', '2023-12-26 18:23:37', NULL),
	(171, 181, 1, 'Điện thoại Samsung Galaxy S21 Ultra', '["./Public/images/product/large-size/1.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Điện thoại cao cấp, màn hình Dynamic AMOLED 6.8 inch, camera chất lượng cao và hỗ trợ bút S Pen.', 27900000, 10, 0, '2023-12-11 15:57:33', '2023-12-26 18:27:42', NULL),
	(172, 127, 1, 'Điện thoại Samsung Galaxy S21 Ultra', '["./Public/images/product/large-size/1.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Điện thoại cao cấp, màn hình Dynamic AMOLED 6.8 inch, camera chất lượng cao và hỗ trợ bút S Pen.', 27900000, 10, 3, '2023-12-11 15:57:33', '2023-12-26 18:23:48', NULL),
	(173, 123, 0, 'Smartwatch Garmin Venu 2', '["./Public/images/product/large-size/7.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Đồng hồ thông minh với màn hình AMOLED, cảm biến sức khỏe, GPS và nhiều tính năng theo dõi hoạt động.', 7200000, 10, 0, '2023-12-12 11:26:28', '2023-12-26 18:27:34', NULL),
	(174, 176, 0, 'Smartwatch Garmin Venu 2', '["./Public/images/product/large-size/7.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Đồng hồ thông minh với màn hình AMOLED, cảm biến sức khỏe, GPS và nhiều tính năng theo dõi hoạt động.', 7200000, 10, 0, '2023-12-12 11:26:28', '2023-12-26 18:27:41', NULL),
	(175, 132, 0, 'Smartwatch Garmin Venu 2', '["./Public/images/product/large-size/7.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Đồng hồ thông minh với màn hình AMOLED, cảm biến sức khỏe, GPS và nhiều tính năng theo dõi hoạt động.', 7200000, 10, 2, '2023-12-12 11:26:28', '2023-12-26 18:24:11', NULL),
	(176, 195, 0, 'Smartwatch Garmin Venu 2', '["./Public/images/product/large-size/7.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Đồng hồ thông minh với màn hình AMOLED, cảm biến sức khỏe, GPS và nhiều tính năng theo dõi hoạt động.', 7200000, 10, 0, '2023-12-12 11:26:28', '2023-12-26 18:27:40', NULL),
	(177, 130, 0, 'Smartwatch Garmin Venu 2', '["./Public/images/product/large-size/7.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Đồng hồ thông minh với màn hình AMOLED, cảm biến sức khỏe, GPS và nhiều tính năng theo dõi hoạt động.', 7200000, 10, 0, '2023-12-12 11:26:28', '2023-12-26 18:27:43', NULL),
	(178, 3, 1, 'Tai nghe Gaming SteelSeries Arctis Pro Wireless', '["./Public/images/product/large-size/11.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Tai nghe chơi game không dây, âm thanh không lẫn vào nhau, mic chất lượng và kết nối đa nền tảng.', 30000000, 10, 0, '2023-12-11 15:57:33', '2023-12-26 18:27:48', NULL),
	(179, 4, 0, 'Tai nghe Gaming SteelSeries Arctis Pro Wireless', '["./Public/images/product/large-size/11.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Tai nghe chơi game không dây, âm thanh không lẫn vào nhau, mic chất lượng và kết nối đa nền tảng.', 30000000, 10, 3, '2023-12-11 15:57:33', '2024-01-04 03:18:14', NULL),
	(180, 5, 0, 'Tai nghe Gaming SteelSeries Arctis Pro Wireless', '["./Public/images/product/large-size/11.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Tai nghe chơi game không dây, âm thanh không lẫn vào nhau, mic chất lượng và kết nối đa nền tảng.', 30000000, 10, 0, '2023-12-11 15:57:33', '2024-01-04 03:18:12', NULL),
	(181, 6, 0, 'Tai nghe Gaming SteelSeries Arctis Pro Wireless', '["./Public/images/product/large-size/11.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Tai nghe chơi game không dây, âm thanh không lẫn vào nhau, mic chất lượng và kết nối đa nền tảng.', 30000000, 10, 0, '2023-12-11 15:57:33', '2024-01-04 03:18:13', NULL),
	(182, 7, 1, 'Tai nghe Gaming SteelSeries Arctis Pro Wireless', '["./Public/images/product/large-size/11.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Tai nghe chơi game không dây, âm thanh không lẫn vào nhau, mic chất lượng và kết nối đa nền tảng.', 30000000, 10, 0, '2023-12-11 15:57:33', '2023-12-26 18:27:46', NULL),
	(183, 77, 1, 'Tai nghe Gaming SteelSeries Arctis Pro Wireless', '["./Public/images/product/large-size/11.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Tai nghe chơi game không dây, âm thanh không lẫn vào nhau, mic chất lượng và kết nối đa nền tảng.', 30000000, 10, 0, '2023-12-11 15:57:33', '2024-01-04 03:16:30', NULL),
	(184, 38, 0, 'Tai nghe Gaming SteelSeries Arctis Pro Wireless', '["./Public/images/product/large-size/11.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Tai nghe chơi game không dây, âm thanh không lẫn vào nhau, mic chất lượng và kết nối đa nền tảng.', 30000000, 10, 0, '2023-12-11 15:57:33', '2024-01-04 03:18:10', NULL),
	(185, 52, 0, 'Tai nghe Gaming SteelSeries Arctis Pro Wireless', '["./Public/images/product/large-size/11.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Tai nghe chơi game không dây, âm thanh không lẫn vào nhau, mic chất lượng và kết nối đa nền tảng.', 30000000, 10, 0, '2023-12-11 15:57:33', '2024-01-04 03:18:15', NULL),
	(186, 12, 1, 'Tai nghe Gaming SteelSeries Arctis Pro Wireless', '["./Public/images/product/large-size/11.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Tai nghe chơi game không dây, âm thanh không lẫn vào nhau, mic chất lượng và kết nối đa nền tảng.', 30000000, 10, 0, '2023-12-11 15:57:33', '2024-01-04 03:15:56', NULL),
	(187, 181, 0, 'Tai nghe Gaming SteelSeries Arctis Pro Wireless', '["./Public/images/product/large-size/11.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Tai nghe chơi game không dây, âm thanh không lẫn vào nhau, mic chất lượng và kết nối đa nền tảng.', 30000000, 10, 0, '2023-12-11 15:57:33', '2024-01-04 03:18:09', NULL),
	(188, 82, 0, 'Tai nghe Gaming SteelSeries Arctis Pro Wireless', '["./Public/images/product/large-size/11.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Tai nghe chơi game không dây, âm thanh không lẫn vào nhau, mic chất lượng và kết nối đa nền tảng.', 30000000, 10, 0, '2023-12-11 15:57:33', '2024-01-04 03:18:09', NULL),
	(189, 1, 0, 'Tai nghe Gaming SteelSeries Arctis Pro Wireless', '["./Public/images/product/large-size/11.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Tai nghe chơi game không dây, âm thanh không lẫn vào nhau, mic chất lượng và kết nối đa nền tảng.', 30000000, 10, 0, '2023-12-11 15:57:33', '2024-01-04 03:18:11', NULL),
	(190, 148, 1, 'Tai nghe Gaming SteelSeries Arctis Pro Wireless', '["./Public/images/product/large-size/11.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Tai nghe chơi game không dây, âm thanh không lẫn vào nhau, mic chất lượng và kết nối đa nền tảng.', 30000000, 10, 0, '2023-12-11 15:57:33', '2024-01-04 03:16:49', NULL),
	(191, 151, 0, 'Tai nghe Gaming SteelSeries Arctis Pro Wireless', '["./Public/images/product/large-size/11.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Tai nghe chơi game không dây, âm thanh không lẫn vào nhau, mic chất lượng và kết nối đa nền tảng.', 30000000, 10, 0, '2023-12-11 15:57:33', '2024-01-04 03:18:17', NULL),
	(192, 191, 0, 'Tai nghe Gaming SteelSeries Arctis Pro Wireless', '["./Public/images/product/large-size/11.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Tai nghe chơi game không dây, âm thanh không lẫn vào nhau, mic chất lượng và kết nối đa nền tảng.', 30000000, 10, 0, '2023-12-11 15:57:33', '2024-01-04 03:18:27', NULL),
	(193, 147, 0, 'Tai nghe Gaming SteelSeries Arctis Pro Wireless', '["./Public/images/product/large-size/11.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Tai nghe chơi game không dây, âm thanh không lẫn vào nhau, mic chất lượng và kết nối đa nền tảng.', 30000000, 10, 0, '2023-12-11 15:57:33', '2024-01-04 03:18:08', NULL),
	(194, 101, 1, 'Tai nghe Gaming SteelSeries Arctis Pro Wireless', '["./Public/images/product/large-size/11.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Tai nghe chơi game không dây, âm thanh không lẫn vào nhau, mic chất lượng và kết nối đa nền tảng.', 30000000, 10, 0, '2023-12-11 15:57:33', '2024-01-04 03:17:18', NULL),
	(195, 111, 0, 'Tai nghe Gaming SteelSeries Arctis Pro Wireless', '["./Public/images/product/large-size/11.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Tai nghe chơi game không dây, âm thanh không lẫn vào nhau, mic chất lượng và kết nối đa nền tảng.', 30000000, 10, 0, '2023-12-11 15:57:33', '2024-01-04 03:18:08', NULL),
	(196, 129, 1, 'Tai nghe Gaming SteelSeries Arctis Pro Wireless', '["./Public/images/product/large-size/11.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Tai nghe chơi game không dây, âm thanh không lẫn vào nhau, mic chất lượng và kết nối đa nền tảng.', 30000000, 10, 0, '2023-12-11 15:57:33', '2024-01-04 03:17:34', NULL),
	(197, 192, 0, 'Tai nghe Gaming SteelSeries Arctis Pro Wireless', '["./Public/images/product/large-size/11.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Tai nghe chơi game không dây, âm thanh không lẫn vào nhau, mic chất lượng và kết nối đa nền tảng.', 30000000, 10, 0, '2023-12-11 15:57:33', '2024-01-04 03:18:07', NULL),
	(198, 200, 1, 'Tai nghe Gaming SteelSeries Arctis Pro Wireless', '["./Public/images/product/large-size/11.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Tai nghe chơi game không dây, âm thanh không lẫn vào nhau, mic chất lượng và kết nối đa nền tảng.', 30000000, 10, 0, '2023-12-11 15:57:33', '2024-01-04 03:18:00', NULL),
	(199, 100, 0, 'Tai nghe Gaming SteelSeries Arctis Pro Wireless', '["./Public/images/product/large-size/11.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Tai nghe chơi game không dây, âm thanh không lẫn vào nhau, mic chất lượng và kết nối đa nền tảng.', 30000000, 10, 0, '2023-12-11 15:57:33', '2024-01-04 03:18:19', NULL),
	(200, 172, 0, 'Tai nghe Gaming SteelSeries Arctis Pro Wireless', '["./Public/images/product/large-size/11.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Tai nghe chơi game không dây, âm thanh không lẫn vào nhau, mic chất lượng và kết nối đa nền tảng.', 30000000, 10, 0, '2023-12-11 15:57:33', '2024-01-04 03:18:17', NULL),
	(201, 137, 0, 'Tai nghe Gaming SteelSeries Arctis Pro Wireless', '["./Public/images/product/large-size/11.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Tai nghe chơi game không dây, âm thanh không lẫn vào nhau, mic chất lượng và kết nối đa nền tảng.', 30000000, 10, 0, '2023-12-11 15:57:33', '2024-01-04 03:18:20', NULL),
	(202, 119, 1, 'Tai nghe Gaming SteelSeries Arctis Pro Wireless', '["./Public/images/product/large-size/11.jpg","./Public/images/product/large-size/4.jpg","./Public/images/product/large-size/5.jpg","./Public/images/product/large-size/6.jpg","./Public/images/product/large-size/7.jpg"]', 'Tai nghe chơi game không dây, âm thanh không lẫn vào nhau, mic chất lượng và kết nối đa nền tảng.', 30000000, 10, 0, '2023-12-11 15:57:33', '2024-01-04 03:17:38', NULL);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;

-- Dumping structure for table shop.product_color
CREATE TABLE IF NOT EXISTS `product_color` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL DEFAULT '0',
  `color_id` int NOT NULL DEFAULT '0',
  `quantity` int NOT NULL DEFAULT '0',
  `image_product` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `color_id` (`color_id`),
  KEY `product_id` (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table shop.product_color: 40 rows
DELETE FROM `product_color`;
/*!40000 ALTER TABLE `product_color` DISABLE KEYS */;
INSERT INTO `product_color` (`id`, `product_id`, `color_id`, `quantity`, `image_product`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, 10, './Public/images/product/large-size/7.jpg', '2023-12-12 09:53:26', '2023-12-12 09:53:27'),
	(2, 1, 2, 10, './Public/images/product/large-size/8.jpg', '2023-12-12 09:53:26', '2023-12-12 09:53:27'),
	(3, 1, 3, 10, './Public/images/product/large-size/1.jpg', '2023-12-12 09:53:26', '2023-12-12 09:53:27'),
	(4, 2, 4, 10, './Public/images/product/large-size/2.jpg', '2023-12-12 09:53:26', '2023-12-12 09:53:27'),
	(5, 2, 5, 10, './Public/images/product/large-size/3.jpg', '2023-12-12 09:53:26', '2023-12-12 09:53:27'),
	(6, 2, 6, 10, './Public/images/product/large-size/4.jpg', '2023-12-12 09:53:26', '2023-12-12 09:53:27'),
	(7, 5, 7, 10, './Public/images/product/large-size/5.jpg', '2023-12-12 09:53:26', '2023-12-12 09:53:27'),
	(8, 5, 8, 10, './Public/images/product/large-size/6.jpg', '2023-12-12 09:53:26', '2023-12-12 09:53:27'),
	(9, 5, 9, 10, './Public/images/product/large-size/7.jpg', '2023-12-12 09:53:26', '2023-12-12 09:53:27'),
	(10, 9, 10, 10, './Public/images/product/large-size/9.jpg', '2023-12-12 09:53:26', '2023-12-12 09:53:27'),
	(11, 9, 1, 10, './Public/images/product/large-size/8.jpg', '2023-12-12 09:53:26', '2023-12-12 09:53:27'),
	(12, 9, 2, 10, './Public/images/product/large-size/10.jpg', '2023-12-12 09:53:26', '2023-12-12 09:53:27'),
	(13, 19, 3, 10, './Public/images/product/large-size/11.jpg', '2023-12-12 09:53:26', '2023-12-12 09:53:27'),
	(14, 19, 4, 10, './Public/images/product/large-size/1.jpg', '2023-12-12 09:53:26', '2023-12-12 09:53:27'),
	(15, 19, 5, 10, './Public/images/product/large-size/2.jpg', '2023-12-12 09:53:26', '2023-12-12 09:53:27'),
	(16, 25, 6, 10, './Public/images/product/large-size/3.jpg', '2023-12-12 09:53:26', '2023-12-12 09:53:27'),
	(17, 25, 7, 10, './Public/images/product/large-size/4.jpg', '2023-12-12 09:53:26', '2023-12-12 09:53:27'),
	(18, 25, 8, 10, './Public/images/product/large-size/5.jpg', '2023-12-12 09:53:26', '2023-12-12 09:53:27'),
	(19, 30, 9, 10, './Public/images/product/large-size/6.jpg', '2023-12-12 09:53:26', '2023-12-12 09:53:27'),
	(20, 30, 10, 10, './Public/images/product/large-size/7.jpg', '2023-12-12 09:53:26', '2023-12-12 09:53:27'),
	(21, 30, 1, 10, './Public/images/product/large-size/8.jpg', '2023-12-12 09:53:26', '2023-12-12 09:53:27'),
	(22, 32, 2, 10, './Public/images/product/large-size/9.jpg', '2023-12-12 09:53:26', '2023-12-12 09:53:27'),
	(23, 32, 3, 10, './Public/images/product/large-size/10.jpg', '2023-12-12 09:53:26', '2023-12-12 09:53:27'),
	(24, 32, 4, 10, './Public/images/product/large-size/11.jpg', '2023-12-12 09:53:26', '2023-12-12 09:53:27'),
	(25, 40, 5, 10, './Public/images/product/large-size/12.jpg', '2023-12-12 09:53:26', '2023-12-12 09:53:27'),
	(26, 40, 6, 10, './Public/images/product/large-size/1.jpg', '2023-12-12 09:53:26', '2023-12-12 09:53:27'),
	(27, 40, 7, 10, './Public/images/product/large-size/2.jpg', '2023-12-12 09:53:26', '2023-12-12 09:53:27'),
	(28, 50, 8, 10, './Public/images/product/large-size/3.jpg', '2023-12-12 09:53:26', '2023-12-12 09:53:27'),
	(29, 50, 9, 10, './Public/images/product/large-size/4.jpg', '2023-12-12 09:53:26', '2023-12-12 09:53:27'),
	(30, 50, 10, 10, './Public/images/product/large-size/5.jpg', '2023-12-12 09:53:26', '2023-12-12 09:53:27'),
	(31, 55, 1, 10, './Public/images/product/large-size/6.jpg', '2023-12-12 09:53:26', '2023-12-12 09:53:27'),
	(32, 55, 2, 10, './Public/images/product/large-size/7.jpg', '2023-12-12 09:53:26', '2023-12-12 09:53:27'),
	(33, 55, 3, 10, './Public/images/product/large-size/8.jpg', '2023-12-12 09:53:26', '2023-12-12 09:53:27'),
	(34, 57, 4, 10, './Public/images/product/large-size/9.jpg', '2023-12-12 09:53:26', '2023-12-12 09:53:27'),
	(35, 57, 5, 10, './Public/images/product/large-size/10.jpg', '2023-12-12 09:53:26', '2023-12-12 09:53:27'),
	(36, 57, 6, 10, './Public/images/product/large-size/11.jpg', '2023-12-12 09:53:26', '2023-12-12 09:53:27'),
	(37, 60, 7, 10, './Public/images/product/large-size/1.jpg', '2023-12-12 09:53:26', '2023-12-12 09:53:27'),
	(38, 60, 8, 10, './Public/images/product/large-size/2.jpg', '2023-12-12 09:53:26', '2023-12-12 09:53:27'),
	(39, 60, 9, 10, './Public/images/product/large-size/3.jpg', '2023-12-12 09:53:26', '2023-12-12 09:53:27'),
	(40, 60, 10, 10, './Public/images/product/large-size/7.jpg', '2023-12-12 09:53:26', '2023-12-12 09:53:27');
/*!40000 ALTER TABLE `product_color` ENABLE KEYS */;

-- Dumping structure for table shop.product_sale
CREATE TABLE IF NOT EXISTS `product_sale` (
  `id` int NOT NULL AUTO_INCREMENT,
  `time_sale` date DEFAULT NULL,
  `product_id` int DEFAULT '0',
  `active` tinyint DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table shop.product_sale: 21 rows
DELETE FROM `product_sale`;
/*!40000 ALTER TABLE `product_sale` DISABLE KEYS */;
INSERT INTO `product_sale` (`id`, `time_sale`, `product_id`, `active`, `created_at`, `updated_at`) VALUES
	(1, '2024-02-20', 1, 1, '2023-12-12 03:59:23', '2023-12-27 10:11:57'),
	(2, '2024-02-20', 2, 1, '2023-12-12 03:59:23', '2023-12-27 10:11:57'),
	(3, '2024-02-20', 3, 1, '2023-12-12 03:59:23', '2023-12-27 10:11:57'),
	(4, '2024-02-20', 4, 1, '2023-12-12 03:59:23', '2023-12-27 10:11:57'),
	(5, '2024-02-20', 5, 1, '2023-12-12 03:59:23', '2023-12-27 10:11:57'),
	(6, '2024-02-20', 6, 1, '2023-12-12 03:59:23', '2023-12-27 10:11:57'),
	(7, '2024-02-20', 7, 1, '2023-12-12 03:59:23', '2023-12-27 10:11:57'),
	(8, '2024-02-20', 28, 1, '2023-12-12 03:59:23', '2023-12-27 10:11:57'),
	(9, '2024-02-20', 40, 1, '2023-12-12 03:59:23', '2023-12-27 10:11:57'),
	(10, '2024-02-20', 45, 1, '2023-12-12 03:59:23', '2023-12-27 10:11:57'),
	(11, '2024-02-20', 60, 1, '2023-12-12 03:59:23', '2023-12-27 10:11:57'),
	(12, '2024-02-20', 36, 1, '2023-12-12 03:59:23', '2023-12-27 10:11:57'),
	(13, '2024-02-20', 37, 1, '2023-12-12 03:59:23', '2023-12-27 10:11:57'),
	(14, '2024-02-20', 12, 1, '2023-12-12 03:59:23', '2023-12-27 10:11:57'),
	(15, '2024-02-20', 11, 1, '2023-12-12 03:59:23', '2023-12-27 10:11:57'),
	(16, '2024-02-20', 19, 1, '2023-12-12 03:59:23', '2023-12-27 10:11:57'),
	(17, '2024-02-20', 29, 1, '2023-12-12 03:59:23', '2023-12-27 10:11:57'),
	(18, '2024-02-20', 18, 1, '2023-12-12 03:59:23', '2023-12-27 10:11:57'),
	(19, '2024-02-20', 25, 1, '2023-12-12 03:59:23', '2023-12-27 10:11:57'),
	(20, '2024-02-20', 67, 1, '2023-12-12 03:59:23', '2023-12-27 10:11:57'),
	(21, '2024-02-20', 99, 1, '2023-12-12 03:59:23', '2023-12-27 10:11:57');
/*!40000 ALTER TABLE `product_sale` ENABLE KEYS */;

-- Dumping structure for table shop.product_size
CREATE TABLE IF NOT EXISTS `product_size` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL DEFAULT '0',
  `size_id` tinyint NOT NULL DEFAULT '0',
  `price` int NOT NULL DEFAULT '0',
  `quantity` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  KEY `size_id` (`size_id`),
  KEY `price` (`price`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table shop.product_size: 28 rows
DELETE FROM `product_size`;
/*!40000 ALTER TABLE `product_size` DISABLE KEYS */;
INSERT INTO `product_size` (`id`, `product_id`, `size_id`, `price`, `quantity`, `created_at`, `updated_at`) VALUES
	(1, 5, 1, 8000000, 20, '2023-12-12 09:54:15', '2023-12-18 14:36:17'),
	(2, 5, 2, 12000000, 20, '2023-12-12 09:54:15', '2023-12-18 14:36:18'),
	(3, 5, 3, 4000000, 20, '2023-12-12 09:54:15', '2023-12-18 14:36:20'),
	(4, 5, 4, 4000000, 20, '2023-12-12 09:54:15', '2023-12-18 14:36:20'),
	(5, 7, 6, 4000000, 20, '2023-12-12 09:54:15', '2023-12-18 14:36:44'),
	(6, 7, 7, 4000000, 20, '2023-12-12 09:54:15', '2023-12-18 14:36:45'),
	(7, 7, 8, 4000000, 20, '2023-12-12 09:54:15', '2023-12-18 14:36:47'),
	(8, 7, 5, 4000000, 20, '2023-12-12 09:54:15', '2023-12-18 14:36:53'),
	(9, 9, 1, 4000000, 20, '2023-12-12 09:54:15', '2023-12-18 14:37:03'),
	(10, 9, 2, 4000000, 20, '2023-12-12 09:54:15', '2023-12-18 14:37:04'),
	(11, 9, 3, 4000000, 20, '2023-12-12 09:54:15', '2023-12-18 14:37:06'),
	(12, 15, 4, 4000000, 20, '2023-12-12 09:54:15', '2023-12-18 14:37:14'),
	(13, 15, 5, 4000000, 20, '2023-12-12 09:54:15', '2023-12-18 14:37:27'),
	(14, 15, 6, 4000000, 20, '2023-12-12 09:54:15', '2023-12-18 14:37:30'),
	(15, 20, 6, 4000000, 20, '2023-12-12 09:54:15', '2023-12-18 14:37:47'),
	(16, 20, 7, 4000000, 20, '2023-12-12 09:54:15', '2023-12-18 14:37:49'),
	(17, 20, 8, 4000000, 20, '2023-12-12 09:54:15', '2023-12-18 14:37:51'),
	(18, 12, 1, 4000000, 20, '2023-12-12 09:54:15', '2023-12-18 14:38:04'),
	(19, 12, 2, 4000000, 20, '2023-12-12 09:54:15', '2023-12-18 14:38:05'),
	(20, 12, 3, 4000000, 20, '2023-12-12 09:54:15', '2023-12-18 14:38:06'),
	(21, 12, 4, 4000000, 20, '2023-12-12 09:54:15', '2023-12-18 14:38:02'),
	(22, 1, 5, 4000000, 20, '2023-12-12 09:54:15', '2023-12-18 14:38:25'),
	(23, 1, 6, 4000000, 20, '2023-12-12 09:54:15', '2023-12-18 14:38:26'),
	(24, 1, 7, 4000000, 20, '2023-12-12 09:54:15', '2023-12-18 14:38:28'),
	(25, 1, 8, 4000000, 20, '2023-12-12 09:54:15', '2023-12-18 14:38:30'),
	(26, 30, 1, 4000000, 20, '2023-12-12 09:54:15', '2023-12-18 14:38:42'),
	(27, 30, 2, 4000000, 20, '2023-12-12 09:54:15', '2023-12-18 14:38:43'),
	(28, 30, 3, 4000000, 20, '2023-12-12 09:54:15', '2023-12-18 14:38:44');
/*!40000 ALTER TABLE `product_size` ENABLE KEYS */;

-- Dumping structure for table shop.size
CREATE TABLE IF NOT EXISTS `size` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table shop.size: 12 rows
DELETE FROM `size`;
/*!40000 ALTER TABLE `size` DISABLE KEYS */;
INSERT INTO `size` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, '30x60mm', '2023-12-18 14:34:11', '2023-12-18 14:34:12'),
	(2, '60x90mm', '2023-12-18 14:34:11', '2023-12-18 14:34:32'),
	(3, '90x120mm', '2023-12-18 14:34:11', '2023-12-18 14:34:38'),
	(4, '120x150mm', '2023-12-18 14:34:11', '2023-12-18 14:34:46'),
	(5, '20x40mm', '2023-12-18 14:34:11', '2023-12-18 14:34:57'),
	(6, '40x60mm', '2023-12-18 14:34:11', '2023-12-18 14:35:00'),
	(7, '60x80mm', '2023-12-18 14:34:11', '2023-12-18 14:35:06'),
	(8, '100x120mm', '2023-12-18 14:34:11', '2023-12-18 14:35:11'),
	(9, 'S', '2023-12-18 14:34:11', '2023-12-18 15:20:20'),
	(10, 'M', '2023-12-18 14:34:11', '2023-12-18 15:20:26'),
	(11, 'L', '2023-12-18 14:34:11', '2023-12-18 15:20:28'),
	(12, 'XL', '2023-12-18 14:34:11', '2023-12-18 15:20:32');
/*!40000 ALTER TABLE `size` ENABLE KEYS */;

-- Dumping structure for table shop.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `confirm_email` tinyint DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `username` (`username`(250)),
  KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table shop.users: 2 rows
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `username`, `email`, `fullname`, `password`, `confirm_email`, `created_at`, `updated_at`) VALUES
	(1, 'lehuyhieu', 'lehuyhieupro06182@gmail.com', 'Lê Huy Hiệu', '392aabdf08177c0e4b5423158679fb87', 1, '2023-12-27 19:06:02', '2023-12-28 02:06:27'),
	(2, 'lehuyhieu123', 'lehuyhieu.dev.fontend@gmail.com', 'User', '392aabdf08177c0e4b5423158679fb87', 1, '2023-12-29 00:57:49', '2024-01-04 03:11:59');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
