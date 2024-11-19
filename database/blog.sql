-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 19, 2024 at 09:10 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('356a192b7913b04c54574d18c28d46e6395428ab', 'i:1;', 1732002082),
('356a192b7913b04c54574d18c28d46e6395428ab:timer', 'i:1732002082;', 1732002082),
('77de68daecd823babbb58edb1c8e14d7106e83bb', 'i:1;', 1732003631),
('77de68daecd823babbb58edb1c8e14d7106e83bb:timer', 'i:1732003631;', 1732003631);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `slug`, `color`, `created_at`, `updated_at`) VALUES
(1, 'Technology', 'uploads/category/1731829522.jpg', 'technology', '#916b03', '2024-11-06 18:40:24', '2024-11-17 07:45:22'),
(2, 'Health', 'uploads/category/1731829504.jpg', 'health', '#4d39b1', '2024-11-07 13:43:28', '2024-11-17 07:45:05'),
(3, 'Entertainment', 'uploads/category/1732001156.jpg', 'entertainment', '#9b2012', '2024-11-11 13:57:48', '2024-11-19 07:25:56'),
(4, 'Science', 'uploads/category/1731829468.jpg', 'science', '#bf5712', '2024-11-11 19:06:41', '2024-11-17 07:44:28'),
(6, 'Nigeria', 'uploads/category/1731947767.jpeg', 'nigeria', '#31bd1f', '2024-11-17 06:32:30', '2024-11-18 16:36:07'),
(7, 'Politics', 'uploads/category/1731939403.jpeg', 'politics', '#1f4cd1', '2024-11-18 14:16:44', '2024-11-18 14:16:44');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

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
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_10_22_102035_create_roles_table', 1),
(5, '2024_10_22_102055_create_permissions_table', 1),
(6, '2024_10_22_142228_create_roles_permissions_table', 1),
(7, '2024_10_24_153626_create_categories_table', 1),
(8, '2024_10_25_073826_create_posts_table', 1),
(17, '2024_10_27_071454_create_user_details_table', 2),
(20, '2024_10_28_054158_create_user_logins_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'view-users', '2024-11-06 18:29:45', '2024-11-06 18:29:45'),
(2, 'create-users', '2024-11-06 18:29:45', '2024-11-06 18:29:45'),
(3, 'edit-users', '2024-11-06 18:29:45', '2024-11-06 18:29:45'),
(4, 'delete-users', '2024-11-06 18:29:45', '2024-11-06 18:29:45'),
(5, 'view-posts', '2024-11-06 18:29:45', '2024-11-06 18:29:45'),
(6, 'create-posts', '2024-11-06 18:29:45', '2024-11-06 18:29:45'),
(7, 'edit-posts', '2024-11-06 18:29:45', '2024-11-06 18:29:45'),
(8, 'delete-posts', '2024-11-06 18:29:45', '2024-11-06 18:29:45'),
(9, 'publish-posts', '2024-11-06 18:29:45', '2024-11-06 18:29:45'),
(10, 'unpublish-posts', '2024-11-06 18:29:45', '2024-11-06 18:29:45'),
(11, 'view-categories', '2024-11-06 18:29:45', '2024-11-06 18:29:45'),
(12, 'create-categories', '2024-11-06 18:29:45', '2024-11-06 18:29:45'),
(13, 'edit-categories', '2024-11-06 18:29:45', '2024-11-06 18:29:45'),
(14, 'delete-categories', '2024-11-06 18:29:45', '2024-11-06 18:29:45'),
(15, 'view-comments', '2024-11-06 18:29:45', '2024-11-06 18:29:45'),
(16, 'delete-comments', '2024-11-06 18:29:45', '2024-11-06 18:29:45'),
(17, 'view-settings', '2024-11-06 18:29:45', '2024-11-06 18:29:45'),
(18, 'edit-settings', '2024-11-06 18:29:45', '2024-11-06 18:29:45');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `views` int(255) NOT NULL DEFAULT 0,
  `image` varchar(255) NOT NULL,
  `tags` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`tags`)),
  `published` tinyint(1) NOT NULL DEFAULT 0,
  `published_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `category_id`, `user_id`, `title`, `slug`, `content`, `views`, `image`, `tags`, `published`, `published_at`, `created_at`, `updated_at`) VALUES
(3, 2, 3, 'Cupiditate ut dicta ', 'cupiditate-ut-dicta', 'Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque Exercitation itaque ', 5, 'uploads/posts/1730999780.jpg', '[\"hello\"]', 1, '2024-11-18 10:42:27', '2024-11-07 18:16:20', '2024-11-19 05:16:29'),
(4, 2, 1, 'Hello World', 'hello-world', 'Hic vitae dolorem nuHic vitae dolorem nuHic vitae dolorem nuHic vitae dolorem nuHic vitae dolorem nuHic vitae dolorem nuHic vitae dolorem nuHic vitae dolorem nuHic vitae dolorem nuHic vitae dolorem nuHic vitae dolorem nuHic vitae dolorem nuHic vitae dolorem nuHic vitae dolorem nuHic vitae dolorem nuHic vitae dolorem nuHic vitae dolorem nuHic vitae dolorem nuHic vitae dolorem nuHic vitae dolorem nuHic vitae dolorem nuHic vitae dolorem nuHic vitae dolorem nuHic vitae dolorem nuHic vitae dolorem nuHic vitae dolorem nuHic vitae dolorem nuHic vitae dolorem nuHic vitae dolorem nuHic vitae dolorem nuHic vitae dolorem nuHic vitae dolorem nuHic vitae dolorem nuHic vitae dolorem nuHic vitae dolorem nuHic vitae dolorem nuHic vitae dolorem nuHic vitae dolorem nuHic vitae dolorem nuHic vitae dolorem nuHic vitae dolorem nuHic vitae dolorem nuHic vitae dolorem nuHic vitae dolorem nuHic vitae dolorem nuHic vitae dolorem nuHic vitae dolorem nuHic vitae dolorem nuHic vitae dolorem nuHic vitae dolorem nuHic vitae dolorem nuHic vitae dolorem nuHic vitae dolorem nuHic vitae dolorem nuHic vitae dolorem nuHic vitae dolorem nuHic vitae dolorem nuHic vitae dolorem nuHic vitae dolorem nuHic vitae dolorem nuHic vitae dolorem nuHic vitae dolorem nuHic vitae dolorem nuHic vitae dolorem nuHic vitae dolorem nuHic vitae dolorem nuHic vitae dolorem nuHic vitae dolorem nuHic vitae dolorem nuHic vitae dolorem nuHic vitae dolorem nuHic vitae dolorem nuHic vitae dolorem nuHic vitae dolorem nuHic vitae dolorem nuHic vitae dolorem nuHic vitae dolorem nuHic vitae dolorem nuHic vitae dolorem nuHic vitae dolorem nuHic vitae dolorem nuHic vitae dolorem nuHic vitae dolorem nuHic vitae dolorem nuHic vitae dolorem nuHic vitae dolorem nuHic vitae dolorem nuHic vitae dolorem nuHic vitae dolorem nuHic vitae dolorem nuHic vitae dolorem nuHic vitae dolorem nuHic vitae dolorem nuHic vitae dolorem nuHic vitae dolorem nuHic vitae dolorem nuHic vitae dolorem nuHic vitae dolorem nuHic vitae dolorem nuHic vitae dolorem nuHic vitae dolorem nuHic vitae dolorem nuHic vitae dolorem nuHic vitae dolorem nuHic vitae dolorem nu', 5, 'uploads/posts/1731327027.jpg', '[\"hello\"]', 1, '2024-11-18 10:42:26', '2024-11-11 12:10:27', '2024-11-18 16:15:27'),
(5, 3, 1, 'BusinessOutdoor Photo Shooting With Sexy And Beautiful', 'businessoutdoor-photo-shooting-with-sexy-and-beautiful', 'Mauris mattis auctor cursus. Phasellus tellus tellus, imperdiet ut imperdiet eu, iaculis a sem. Donec vehicula luctus nunc in laoreet. Aliquam erat volutpat. Suspendisse vulputate porttitor condimentum. Proin viverra orci a leo suscipit placerat. Sed feugiat posuere semper. Cras vitae mi erat, posuere mollis arcu. Pellentesque iaculis gravida nulla ac hendrerit. Vestibulum faucibus neque at lacus tristique eu ultrices ipsum mollis. Phasellus venenatis, lacus in malesuada pellentesque, nisl ipsum faucibus velit, et eleifend velit nulla a mi. Praesent pharetra semper purus, a vehicula massa interdum in. Nulla a magna at diam consequat semper eu vitae elit. In hac habitasse platea dictumst.\n\nLorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.\n\nMauris mattis auctor cursus. Phasellus tellus tellus, imperdiet ut imperdiet eu, iaculis a sem. Donec vehicula luctus nunc in laoreet. Aliquam erat volutpat. Suspendisse vulputate porttitor condimentum. Proin viverra orci a leo suscipit placerat. Sed feugiat posuere semper. Cras vitae mi erat, posuere mollis arcu. Pellentesque iaculis gravida nulla ac hendrerit. Vestibulum faucibus neque at lacus tristique eu ultrices ipsum mollis. Phasellus venenatis, lacus in malesuada pellentesque, nisl ipsum faucibus velit, et eleifend velit nulla a mi. Praesent pharetra semper purus, a vehicula massa interdum in. Nulla a magna at diam consequat semper eu vitae elit. In hac habitasse platea dictumst.\n\nMauris mattis auctor cursus. Phasellus tellus tellus, imperdiet ut imperdiet eu, iaculis a sem. Donec vehicula luctus nunc in laoreet. Aliquam erat volutpat. Suspendisse vulputate porttitor condimentum. Proin viverra orci a leo suscipit placerat. Sed feugiat posuere semper. Cras vitae mi erat, posuere mollis arcu. Pellentesque iaculis gravida nulla ac hendrerit. Vestibulum faucibus neque at lacus tristique eu ultrices ipsum mollis. Phasellus venenatis, lacus in malesuada pellentesque, nisl ipsum faucibus velit, et eleifend velit nulla a mi. Praesent pharetra semper purus, a vehicula massa interdum in. Nulla a magna at diam consequat semper eu vitae elit. In hac habitasse platea dictumst. Mauris mattis auctor cursus. Phasellus tellus tellus, imperdiet ut imperdiet eu, iaculis a sem.\n\nDonec vehicula luctus nunc in laoreet. Aliquam erat volutpat. Suspendisse vulputate porttitor condimentum. Proin viverra orci a leo suscipit placerat. Sed feugiat posuere semper. Cras vitae mi erat, posuere mollis arcu. Pellentesque iaculis gravida nulla ac hendrerit. Vestibulum faucibus neque at lacus tristique eu ultrices ipsum mollis. Phasellus venenatis, lacus in malesuada pellentesque, nisl ipsum faucibus velit, et eleifend velit nulla a mi. Praesent pharetra semper purus, a vehicula massa interdum in.\n\n\n\nIn hac habitasse platea dictumst. Mauris mattis auctor cursus. Phasellus tellus tellus, imperdiet ut imperdiet eu, iaculis a sem. Donec vehicula luctus nunc in laoreet. Aliquam erat volutpat. Suspendisse vulputate porttitor condimentum. Proin viverra orci a leo suscipit placerat. Sed feugiat posuere semper. Cras vitae mi erat, posuere mollis arcu. Pellentesque iaculis gravida nulla ac hendrerit. Vestibulum faucibus neque at lacus tristique eu ultrices ipsum mollis. Phasellus venenatis, lacus in malesuada pellentesque, nisl ipsum faucibus velit, et eleifend velit nulla a mi. Praesent pharetra semper purus, a vehicula massa interdum in. Nulla a magna at diam consequat semper eu vitae elit. In hac habitasse platea dictumst.', 1, 'uploads/posts/1731333679.jpg', '[\"business\",\"jobs\"]', 1, '2024-11-18 10:42:25', '2024-11-11 14:01:19', '2024-11-18 14:00:42'),
(6, 1, 1, 'Quo lorem vero anim ', 'quo-lorem-vero-anim', 'Mollit rem sit dolorMollit rem sit dolorMollit rem sit dolorMollit rem sit dolorMollit rem sit dolorMollit rem sit dolorMollit rem sit dolorMollit rem sit dolorMollit rem sit dolorMollit rem sit dolorMollit rem sit dolorMollit rem sit dolorMollit rem sit dolorMollit rem sit dolorMollit rem sit dolorMollit rem sit dolorMollit rem sit dolorMollit rem sit dolorMollit rem sit dolorMollit rem sit dolorMollit rem sit dolorMollit rem sit dolorMollit rem sit dolorMollit rem sit dolorMollit rem sit dolorMollit rem sit dolorMollit rem sit dolorMollit rem sit dolorMollit rem sit dolorMollit rem sit dolorMollit rem sit dolorMollit rem sit dolorMollit rem sit dolorMollit rem sit dolorMollit rem sit dolorMollit rem sit dolorMollit rem sit dolorMollit rem sit dolorMollit rem sit dolorMollit rem sit dolorMollit rem sit dolorMollit rem sit dolorMollit rem sit dolorMollit rem sit dolorMollit rem sit dolorMollit rem sit dolorMollit rem sit dolorMollit rem sit dolorMollit rem sit dolorMollit rem sit dolorMollit rem sit dolorMollit rem sit dolorMollit rem sit dolorMollit rem sit dolorMollit rem sit dolorMollit rem sit dolorMollit rem sit dolorMollit rem sit dolorMollit rem sit dolorMollit rem sit dolorMollit rem sit dolorMollit rem sit dolorMollit rem sit dolorMollit rem sit dolorMollit rem sit dolorMollit rem sit dolor', 0, 'uploads/posts/1731349943.jpg', '[\"testing\",\"testing1\"]', 1, '2024-11-19 08:59:25', '2024-11-11 18:32:23', '2024-11-19 07:59:25'),
(7, 4, 1, 'ScienceThis is a great photo and nice for shooting', 'sciencethis-is-a-great-photo-and-nice-for-shooting', 'Mauris mattis auctor cursus. Phasellus tellus tellus, imperdiet ut imperdiet eu, iaculis a sem. Donec vehicula luctus nunc in laoreet. Aliquam erat volutpat. Suspendisse vulputate porttitor condimentum. Proin viverra orci a leo suscipit placerat. Sed feugiat posuere semper. Cras vitae mi erat, posuere mollis arcu. Pellentesque iaculis gravida nulla ac hendrerit. Vestibulum faucibus neque at lacus tristique eu ultrices ipsum mollis. Phasellus venenatis, lacus in malesuada pellentesque, nisl ipsum faucibus velit, et eleifend velit nulla a mi. Praesent pharetra semper purus, a vehicula massa interdum in. Nulla a magna at diam consequat semper eu vitae elit. In hac habitasse platea dictumst.\n\nLorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.\n\nMauris mattis auctor cursus. Phasellus tellus tellus, imperdiet ut imperdiet eu, iaculis a sem. Donec vehicula luctus nunc in laoreet. Aliquam erat volutpat. Suspendisse vulputate porttitor condimentum. Proin viverra orci a leo suscipit placerat. Sed feugiat posuere semper. Cras vitae mi erat, posuere mollis arcu. Pellentesque iaculis gravida nulla ac hendrerit. Vestibulum faucibus neque at lacus tristique eu ultrices ipsum mollis. Phasellus venenatis, lacus in malesuada pellentesque, nisl ipsum faucibus velit, et eleifend velit nulla a mi. Praesent pharetra semper purus, a vehicula massa interdum in. Nulla a magna at diam consequat semper eu vitae elit. In hac habitasse platea dictumst.\n\n\nThis is caption for image in post\n\nMauris mattis auctor cursus. Phasellus tellus tellus, imperdiet ut imperdiet eu, iaculis a sem. Donec vehicula luctus nunc in laoreet. Aliquam erat volutpat. Suspendisse vulputate porttitor condimentum. Proin viverra orci a leo suscipit placerat. Sed feugiat posuere semper. Cras vitae mi erat, posuere mollis arcu. Pellentesque iaculis gravida nulla ac hendrerit. Vestibulum faucibus neque at lacus tristique eu ultrices ipsum mollis. Phasellus venenatis, lacus in malesuada pellentesque, nisl ipsum faucibus velit, et eleifend velit nulla a mi. Praesent pharetra semper purus, a vehicula massa interdum in. Nulla a magna at diam consequat semper eu vitae elit. In hac habitasse platea dictumst.\n\nDonec vehicula luctus nunc in laoreet. Aliquam erat volutpat. Suspendisse vulputate porttitor condimentum. Proin viverra orci a leo suscipit placerat. Sed feugiat posuere semper. Cras vitae mi erat, posuere mollis arcu. Pellentesque iaculis gravida nulla ac hendrerit. Vestibulum faucibus neque at lacus tristique eu ultrices ipsum mollis. Phasellus venenatis, lacus in malesuada pellentesque, nisl ipsum faucibus velit, et eleifend velit nulla a mi. Praesent pharetra semper purus, a vehicula massa interdum in.\n\n\nThis is caption for image in post\n\nIn hac habitasse platea dictumst. Mauris mattis auctor cursus. Phasellus tellus tellus, imperdiet ut imperdiet eu, iaculis a sem. Donec vehicula luctus nunc in laoreet. Aliquam erat volutpat. Suspendisse vulputate porttitor condimentum. Proin viverra orci a leo suscipit placerat. Sed feugiat posuere semper. Cras vitae mi erat, posuere mollis arcu. Pellentesque iaculis gravida nulla ac hendrerit. Vestibulum faucibus neque at lacus tristique eu ultrices ipsum mollis. Phasellus venenatis, lacus in malesuada pellentesque, nisl ipsum faucibus velit, et eleifend velit nulla a mi. Praesent pharetra semper purus, a vehicula massa interdum in. Nulla a magna at diam consequat semper eu vitae elit. In hac habitasse platea dictumst.', 4, 'uploads/posts/1731352053.jpg', '[\"gaming\",\"inspiration\"]', 1, '2024-11-18 10:42:23', '2024-11-11 19:07:34', '2024-11-18 15:18:42'),
(8, 6, 1, 'Quia alias dolorem a', 'quia-alias-dolorem-a', 'Sequi fugiat inventoSequi fugiat inventoSequi fugiat inventoSequi fugiat inventoSequi fugiat inventoSequi fugiat inventoSequi fugiat inventoSequi fugiat inventoSequi fugiat inventoSequi fugiat inventoSequi fugiat inventoSequi fugiat inventoSequi fugiat inventoSequi fugiat inventoSequi fugiat inventoSequi fugiat inventoSequi fugiat inventoSequi fugiat inventoSequi fugiat inventoSequi fugiat inventoSequi fugiat inventoSequi fugiat inventoSequi fugiat inventoSequi fugiat inventoSequi fugiat inventoSequi fugiat inventoSequi fugiat inventoSequi fugiat inventoSequi fugiat inventoSequi fugiat inventoSequi fugiat inventoSequi fugiat inventoSequi fugiat inventoSequi fugiat inventoSequi fugiat inventoSequi fugiat inventoSequi fugiat inventoSequi fugiat inventoSequi fugiat inventoSequi fugiat inventoSequi fugiat inventoSequi fugiat inventoSequi fugiat inventoSequi fugiat inventoSequi fugiat inventoSequi fugiat inventoSequi fugiat inventoSequi fugiat inventoSequi fugiat inventoSequi fugiat inventoSequi fugiat inventoSequi fugiat invento', 9, 'uploads/posts/1731829238.jpg', '[\"Qui culpa et conseq\"]', 1, '2024-11-18 10:42:11', '2024-11-17 07:03:50', '2024-11-18 16:06:16'),
(9, 3, 1, 'Best inspire dark photo in the winter season', 'best-inspire-dark-photo-in-the-winter-season', 'Mauris mattis auctor cursus. Phasellus tellus tellus, imperdiet ut imperdiet eu, iaculis a sem. Donec vehicula luctus nunc in laoreet. Aliquam erat volutpat. Suspendisse vulputate porttitor condimentum. Proin viverra orci a leo suscipit placerat. Sed feugiat posuere semper. Cras vitae mi erat, posuere mollis arcu. Pellentesque iaculis gravida nulla ac hendrerit. Vestibulum faucibus neque at lacus tristique eu ultrices ipsum mollis. Phasellus venenatis, lacus in malesuada pellentesque, nisl ipsum faucibus velit, et eleifend velit nulla a mi. Praesent pharetra semper purus, a vehicula massa interdum in. Nulla a magna at diam consequat semper eu vitae elit. In hac habitasse platea dictumst.\n\nLorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.\n\nMauris mattis auctor cursus. Phasellus tellus tellus, imperdiet ut imperdiet eu, iaculis a sem. Donec vehicula luctus nunc in laoreet. Aliquam erat volutpat. Suspendisse vulputate porttitor condimentum. Proin viverra orci a leo suscipit placerat. Sed feugiat posuere semper. Cras vitae mi erat, posuere mollis arcu. Pellentesque iaculis gravida nulla ac hendrerit. Vestibulum faucibus neque at lacus tristique eu ultrices ipsum mollis. Phasellus venenatis, lacus in malesuada pellentesque, nisl ipsum faucibus velit, et eleifend velit nulla a mi. Praesent pharetra semper purus, a vehicula massa interdum in. Nulla a magna at diam consequat semper eu vitae elit. In hac habitasse platea dictumst.\n\nMauris mattis auctor cursus. Phasellus tellus tellus, imperdiet ut imperdiet eu, iaculis a sem. Donec vehicula luctus nunc in laoreet. Aliquam erat volutpat. Suspendisse vulputate porttitor condimentum. Proin viverra orci a leo suscipit placerat. Sed feugiat posuere semper. Cras vitae mi erat, posuere mollis arcu. Pellentesque iaculis gravida nulla ac hendrerit. Vestibulum faucibus neque at lacus tristique eu ultrices ipsum mollis. Phasellus venenatis, lacus in malesuada pellentesque, nisl ipsum faucibus velit, et eleifend velit nulla a mi. Praesent pharetra semper purus, a vehicula massa interdum in. Nulla a magna at diam consequat semper eu vitae elit. In hac habitasse platea dictumst. Mauris mattis auctor cursus. Phasellus tellus tellus, imperdiet ut imperdiet eu, iaculis a sem.\n\nDonec vehicula luctus nunc in laoreet. Aliquam erat volutpat. Suspendisse vulputate porttitor condimentum. Proin viverra orci a leo suscipit placerat. Sed feugiat posuere semper. Cras vitae mi erat, posuere mollis arcu. Pellentesque iaculis gravida nulla ac hendrerit. Vestibulum faucibus neque at lacus tristique eu ultrices ipsum mollis. Phasellus venenatis, lacus in malesuada pellentesque, nisl ipsum faucibus velit, et eleifend velit nulla a mi. Praesent pharetra semper purus, a vehicula massa interdum in.\n\n\n\nIn hac habitasse platea dictumst. Mauris mattis auctor cursus. Phasellus tellus tellus, imperdiet ut imperdiet eu, iaculis a sem. Donec vehicula luctus nunc in laoreet. Aliquam erat volutpat. Suspendisse vulputate porttitor condimentum. Proin viverra orci a leo suscipit placerat. Sed feugiat posuere semper. Cras vitae mi erat, posuere mollis arcu. Pellentesque iaculis gravida nulla ac hendrerit. Vestibulum faucibus neque at lacus tristique eu ultrices ipsum mollis. Phasellus venenatis, lacus in malesuada pellentesque, nisl ipsum faucibus velit, et eleifend velit nulla a mi. Praesent pharetra semper purus, a vehicula massa interdum in. Nulla a magna at diam consequat semper eu vitae elit. In hac habitasse platea dictumst.', 7, 'uploads/posts/1731916487.jpg', '[\"testing\",\"business test\"]', 1, '2024-11-18 10:42:22', '2024-11-18 07:54:47', '2024-11-18 16:06:05'),
(10, 7, 1, 'Obasanjo Calls For Sack of INEC Chairman Mahmood Yakubu, Gives Reason', 'obasanjo-calls-for-sack-of-inec-chairman-mahmood-yakubu-gives-reason', 'Former President Olusegun Obasanjo has called for the dismissal of Mahmood Yakubu, the Chairman of the Independent National Electoral Commission (INEC), and other electoral leaders, following what he described as a “travesty” in the 2023 general elections. Speaking at the Chinua Achebe Leadership Forum at Yale University, Obasanjo emphasized the need for comprehensive electoral reforms, focusing on the removal of partisan officials and ensuring a more rigorous vetting process for INEC leaders.\n\nObasanjo criticized INEC for its failure to utilize technological tools, like the Bimodal Voter Accreditation System (BVAS) and the INEC Election Result Viewing Portal (IReV), which were touted to ensure transparent and credible elections. He argued that this neglect led to widespread irregularities during the election, undermining public trust in the process.\n\nObasanjo\'s remarks echoed long-standing concerns about INEC’s credibility, citing previous elections under his administration as also deeply flawed. Despite this, he called for the appointment of a non-partisan and incorruptible INEC leadership, both at the federal and local levels.\n\nThe call for reform comes amid ongoing criticism of INEC\'s conduct in recent elections, including the controversial 2023 presidential race and the Edo State governorship election. Obasanjo’s appeal for electoral change is seen as a continued push to restore trust in Nigeria’s democratic process. The former president’s remarks also coincide with discussions on leadership in Africa, where intellectuals and politicians have gathered to address the continent\'s political challenges', 22, 'uploads/posts/1731939727.jpeg', '[\"obasanjo\",\"olusegun\",\"yakubu\",\"inec\"]', 1, '2024-11-19 08:54:44', '2024-11-18 14:22:07', '2024-11-19 07:54:44'),
(11, 6, 1, 'Tinubu’s FG to Spend N6.5tn for Payment, MTEF Report Gives Breakdown', 'tinubus-fg-to-spend-n65tn-for-payment-mtef-report-gives-breakdown', 'The Nigerian government, under President Bola Tinubu, has outlined ambitious fiscal plans for 2024, with a proposed N6.5 trillion set aside for personnel and pension expenses. This figure, representing a major part of the government’s financial blueprint, is part of a broader budget proposal totaling N27.5 trillion. The focus of the expenditure is largely on covering salaries, pensions, and other related costs, amounting to N6.48 trillion, which accounts for over 96% of the total allocation. This is a significant increase compared to the previous year\'s expenditure.\n\nThe government is also making strides to boost the nation\'s infrastructure, with significant funding directed toward projects in transportation, housing, and other critical sectors. A key goal of the 2024 budget is to stimulate economic growth and address structural challenges faced by the country. Among the major projects expected to receive attention are road and railway construction, as well as efforts to improve affordable housing for Nigerians.\n\nIn terms of revenue generation, the government is targeting N10.4 trillion from various sources, including taxes, state-owned enterprise dividends, and other fiscal activities. The government is aiming to balance capital expenditure with recurrent spending, ensuring that essential sectors like education, defense, and healthcare are well-funded.\n\nAdditionally, there is a significant push for social investment programs, with over N534 billion allocated to poverty alleviation, education, and health initiatives. These efforts aim to provide much-needed relief to Nigerians, particularly in the face of rising living costs and global economic pressures.\n\nDespite the challenging global economic environment, the government’s focus is on long-term growth and stability, with a strong emphasis on reducing Nigeria’s infrastructure gap. However, the budget also projects a substantial deficit, estimated at N9.18 trillion, which highlights the need for careful management of resources to ensure sustainable development in the coming years.', 9, 'uploads/posts/1731948133.jpeg', '[\"minimum wage\",\"tinubu\",\"president\",\"nigeria\"]', 1, '2024-11-18 17:42:13', '2024-11-18 16:42:13', '2024-11-19 07:43:27'),
(12, 3, 1, 'Wizkid Shares Tracklist of Morayo Ahead of Friday Release', 'wizkid-shares-tracklist-of-morayo-ahead-of-friday-release', 'Afrobeats sensation Wizkid has released the official tracklist for his highly anticipated album Morayo, which is set to drop on Friday, November 22, 2024. The project is a deeply personal tribute to his late mother, Mrs. Ayo Balogun, whose influence is central to the album\'s theme. The title Morayo, meaning \"I have seen joy\" in Yoruba, reflects a journey of love, resilience, and cultural pride.\n\nThe album features 12 tracks, blending Wizkid’s signature Afrobeat sound with new creative directions. Collaborations with artists like Asake and Anaïs add a dynamic touch to the album, heightening fan excitement. With songs that promise to capture both dancefloor energy and introspective moments, Morayo is poised to showcase Wizkid\'s artistic growth.\n\nSocial media platforms are abuzz with fans expressing their eagerness, with many declaring the release day a \"public holiday.\" The cover art, a tribute to his mother, features a striking image of her, further highlighting the album’s sentimental value. Fans have praised Wizkid for not only honoring his roots but also for continuing to elevate African music on the global stage​\n\nThis release follows his pattern of dropping impactful projects that resonate across cultures, and Morayo is expected to continue that legacy. As fans count down to the release date, the anticipation is at an all-time high. Stay tuned for what promises to be a groundbreaking album!', 6, 'uploads/posts/1732002067.jpeg', '[\"music\",\"big wiz\",\"wizkid\",\"album\",\"morayo\"]', 1, '2024-11-19 09:01:57', '2024-11-19 07:41:08', '2024-11-19 08:09:29'),
(13, 6, 3, 'Jubilation as Nigerian Gov Approves N75,000 New Minimum Wage Read more', 'jubilation-as-nigerian-gov-approves-n75000-new-minimum-wage-read-more', 'There’s a wave of excitement across Nigeria as the government has approved a new minimum wage of N75,000 for civil servants. This decision comes as a much-needed relief in the face of tough economic conditions, particularly as workers have been grappling with rising living costs. Governor Francis Nwifuru of Ebonyi State confirmed the implementation of the new wage structure, emphasizing the government’s commitment to easing the financial burden on public sector employees.\n\nUnder the revised structure, workers at Grade Level 2 will receive the full N75,000 minimum wage, while those on Grade Level 3 and above will see an increment of N40,000 in their salaries. The rollout began on Monday, October 28, 2024, signaling the government\'s resolve to prioritize the welfare of its workforce. This move follows a thorough review of Nigeria\'s economic challenges, with the aim of making life more manageable for civil servants and their families​.\n.\n\nThe announcement has been met with widespread jubilation. Workers have expressed their appreciation for what many see as a bold and timely intervention. The government, in turn, has urged civil servants to remain dedicated and productive as it seeks to implement additional measures to stabilize the economy.\n\nThis approval is not just about numbers—it reflects the government\'s recognition of the critical role civil servants play in national development. Many hope this will inspire further policies aimed at reducing economic hardships for all Nigerians.', 1, 'uploads/posts/1732003706.jpeg', '[\"minimum wage\",\"Nigeria fg\",\"N75,000\",\"nigeria\"]', 1, '2024-11-19 09:08:55', '2024-11-19 08:08:26', '2024-11-19 08:09:12');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2024-11-06 18:29:35', '2024-11-06 18:29:35'),
(2, 'editor', '2024-11-06 18:29:35', '2024-11-06 18:29:35'),
(3, 'author', '2024-11-06 18:29:35', '2024-11-06 18:29:35'),
(4, 'subscriber', '2024-11-06 18:29:35', '2024-11-06 18:29:35');

-- --------------------------------------------------------

--
-- Table structure for table `roles_permissions`
--

CREATE TABLE `roles_permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles_permissions`
--

INSERT INTO `roles_permissions` (`id`, `role_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2024-11-06 18:37:13', '2024-11-06 18:37:13'),
(2, 1, 4, '2024-11-06 18:37:13', '2024-11-06 18:37:13'),
(3, 1, 7, '2024-11-06 18:37:13', '2024-11-06 18:37:13'),
(4, 1, 10, '2024-11-06 18:37:13', '2024-11-06 18:37:13'),
(5, 1, 13, '2024-11-06 18:37:13', '2024-11-06 18:37:13'),
(6, 1, 2, '2024-11-06 18:37:13', '2024-11-06 18:37:13'),
(7, 1, 5, '2024-11-06 18:37:13', '2024-11-06 18:37:13'),
(8, 1, 8, '2024-11-06 18:37:13', '2024-11-06 18:37:13'),
(9, 1, 11, '2024-11-06 18:37:13', '2024-11-06 18:37:13'),
(10, 1, 14, '2024-11-06 18:37:13', '2024-11-06 18:37:13'),
(11, 1, 17, '2024-11-06 18:37:13', '2024-11-06 18:37:13'),
(12, 1, 16, '2024-11-06 18:37:13', '2024-11-06 18:37:13'),
(13, 1, 3, '2024-11-06 18:37:13', '2024-11-06 18:37:13'),
(14, 1, 6, '2024-11-06 18:37:13', '2024-11-06 18:37:13'),
(15, 1, 9, '2024-11-06 18:37:13', '2024-11-06 18:37:13'),
(16, 1, 12, '2024-11-06 18:37:13', '2024-11-06 18:37:13'),
(17, 1, 15, '2024-11-06 18:37:13', '2024-11-06 18:37:13'),
(18, 1, 18, '2024-11-06 18:37:13', '2024-11-06 18:37:13'),
(25, 2, 1, '2024-11-07 18:15:20', '2024-11-07 18:15:20'),
(26, 2, 10, '2024-11-07 18:15:20', '2024-11-07 18:15:20'),
(27, 2, 5, '2024-11-07 18:15:20', '2024-11-07 18:15:20'),
(28, 2, 8, '2024-11-07 18:15:20', '2024-11-07 18:15:20'),
(29, 2, 11, '2024-11-07 18:15:20', '2024-11-07 18:15:20'),
(30, 2, 6, '2024-11-07 18:15:20', '2024-11-07 18:15:20'),
(31, 2, 9, '2024-11-07 18:15:20', '2024-11-07 18:15:20'),
(32, 3, 7, '2024-11-07 18:15:40', '2024-11-07 18:15:40'),
(33, 3, 5, '2024-11-07 18:15:40', '2024-11-07 18:15:40'),
(34, 3, 8, '2024-11-07 18:15:40', '2024-11-07 18:15:40'),
(35, 3, 6, '2024-11-07 18:15:40', '2024-11-07 18:15:40');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('97SW8nh3OUEWd2E1AcY2sPTlfh1yLWixbKosscMn', 1, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiUENSbHdPTFowbkpuMlpCVEJ5MTFRTEE1eDJIQVV2V0RDMU51Z0t6QyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo5MzoiaHR0cDovL2xvY2FsaG9zdDo4MDAwL2VudGVydGFpbm1lbnQvd2l6a2lkLXNoYXJlcy10cmFja2xpc3Qtb2YtbW9yYXlvLWFoZWFkLW9mLWZyaWRheS1yZWxlYXNlIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1732003769),
('m9q6Q1ZVwnlnc3uNT3Vbgm1ZzVjYuNwreUw8gMLk', 3, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiVnRZYmZWMG9uWmpMOFVzNmtLRVpzUG1UbHZFVng5WFpNV05yOWh3aCI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozMzoiaHR0cDovL2xvY2FsaG9zdDo4MDAwL2FkbWluL3Bvc3RzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Mzt9', 1732003834);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` int(11) NOT NULL COMMENT '1=admin,2=editor,3=author,4=subscriber',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin@gmail.com', 1, NULL, '$2y$12$9YTm9KX7bgZKNkVBWIOj..AsGEfS.gTXBgUzSdhjkBthjrjMPQccO', NULL, '2024-11-06 18:29:26', '2024-11-06 18:29:26'),
(2, 'Olagunju alameen ', 'harliarmeen@gmail.com', 4, NULL, '$2y$12$HfkHEqyp5WDGbyop30S.2uLnHdtdTiLJSYilhB7aGmNMd8wPYzFzq', NULL, '2024-11-06 18:37:39', '2024-11-07 13:43:12'),
(3, 'James Daniel', 'niel2264@gmail.com', 3, NULL, '$2y$12$u/tUbY.4pUBtFyvh1PB8ZOz.Cu6ugkmrADc9rUccp/nJ1uWX3yDCq', NULL, '2024-11-07 13:10:51', '2024-11-07 18:16:34');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `phone_no` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `user_id`, `image`, `phone_no`, `gender`, `address`, `state`, `country`, `facebook`, `instagram`, `twitter`, `created_at`, `updated_at`) VALUES
(1, 1, 'uploads/profile/1731946195.jpg', NULL, NULL, NULL, NULL, NULL, 'https://www.facebook.com', NULL, NULL, '2024-11-07 15:14:07', '2024-11-18 16:09:55'),
(2, 3, 'uploads/profile/1730989039.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-07 15:17:19', '2024-11-07 15:17:19');

-- --------------------------------------------------------

--
-- Table structure for table `user_logins`
--

CREATE TABLE `user_logins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `browser` varchar(255) DEFAULT NULL,
  `device` varchar(255) DEFAULT NULL,
  `last_login` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_logins`
--

INSERT INTO `user_logins` (`id`, `user_id`, `browser`, `device`, `last_login`, `created_at`, `updated_at`) VALUES
(1, 3, 'Edge on Linux', 'WebKit', '2024-11-19 04:47:36', '2024-11-19 04:47:36', '2024-11-19 04:47:36'),
(2, 1, 'Edge on Linux', 'WebKit', '2024-11-19 05:17:47', '2024-11-19 05:17:47', '2024-11-19 05:17:47'),
(3, 1, 'Chrome on AndroidOS', 'WebKit', '2024-11-19 05:25:22', '2024-11-19 05:25:22', '2024-11-19 05:25:22'),
(4, 3, 'Chrome on Linux', 'WebKit', '2024-11-19 08:04:02', '2024-11-19 08:04:02', '2024-11-19 08:04:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_category_id_foreign` (`category_id`),
  ADD KEY `posts_user_id_foreign` (`user_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles_permissions`
--
ALTER TABLE `roles_permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `roles_permissions_role_id_foreign` (`role_id`),
  ADD KEY `roles_permissions_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_details_user_id_foreign` (`user_id`);

--
-- Indexes for table `user_logins`
--
ALTER TABLE `user_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_logins_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `roles_permissions`
--
ALTER TABLE `roles_permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_logins`
--
ALTER TABLE `user_logins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `roles_permissions`
--
ALTER TABLE `roles_permissions`
  ADD CONSTRAINT `roles_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `roles_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_details`
--
ALTER TABLE `user_details`
  ADD CONSTRAINT `user_details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_logins`
--
ALTER TABLE `user_logins`
  ADD CONSTRAINT `user_logins_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
