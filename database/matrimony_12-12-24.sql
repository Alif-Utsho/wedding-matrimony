-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 12, 2024 at 10:40 AM
-- Server version: 5.7.33
-- PHP Version: 8.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `matrimony`
--

-- --------------------------------------------------------

--
-- Table structure for table `accesses`
--

CREATE TABLE `accesses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accesses`
--

INSERT INTO `accesses` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'profile-view', '2024-10-29 05:52:31', '2024-10-29 05:52:43'),
(2, 'send-interest', '2024-10-29 05:52:46', '2024-10-29 05:52:48'),
(3, 'send-message', '2024-10-29 05:52:49', '2024-10-29 05:52:51'),
(4, 'visitor-list', '2024-12-01 06:59:58', '2024-12-01 07:00:02'),
(5, 'all-images', '2024-12-12 06:59:58', '2024-12-12 07:00:02');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `role_id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 1, 'Superadmin', 'superadmin@gmail.com', '$2y$10$NI5ZrdTV/ntKnnNYhppLreaWQj3PB5FiIJ4fErBS4vsQKQnrlPqoC', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'frontend/images/ban-bg.jpg', 1, '2024-10-16 09:43:09', '2024-11-25 01:32:13'),
(2, 'frontend/images/banner.jpg', 1, '2024-10-16 09:43:09', '2024-10-16 09:43:09');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(200) NOT NULL,
  `description` text,
  `image` varchar(200) NOT NULL,
  `tag` varchar(100) DEFAULT NULL,
  `short_description` varchar(250) DEFAULT NULL,
  `author_image` varchar(200) DEFAULT NULL,
  `author_name` varchar(100) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `front_page` tinyint(1) NOT NULL DEFAULT '0',
  `trending` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `category_id`, `title`, `description`, `image`, `tag`, `short_description`, `author_image`, `author_name`, `date`, `front_page`, `trending`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Wedding arrangements', NULL, 'frontend/images/blog/1.jpg', 'Wedding - Johnny', 'It is a long established fact that a reader will be distracted by the readable\r\n                                        content.', 'frontend/images/user/2.jpg', 'Steefan Ann', '2024-08-15', 1, 0, 1, '2024-10-15 11:32:38', '2024-10-15 11:32:38'),
(2, 1, 'Wedding arrangements', NULL, 'frontend/images/blog/2.jpg', 'Wedding - Johnny', 'It is a long established fact that a reader will be distracted by the readable\r\n                                        content.', 'frontend/images/user/2.jpg', 'Steefan Ann', '2024-05-28', 1, 0, 1, '2024-10-15 11:32:38', '2024-10-15 11:32:38'),
(3, 4, 'Invitation cards', NULL, 'frontend/images/blog/3.jpg', 'Wedding - Johnny', 'It is a long established fact that a reader will be distracted by the readable\r\n                                        content.', 'frontend/images/user/2.jpg', 'Steefan Ann', '2023-12-06', 1, 0, 1, '2024-10-15 11:32:38', '2024-10-15 11:32:38'),
(4, 2, '6 Things You Need To Prepare For Your Wedding Day', '<h2>The Ultimate Wedding Planning Checklist</h2>\n                                    <p>It is a long established fact that a reader will be distracted by the readable\n                                        content of a page when looking at its layout. The point of using Lorem Ipsum is\n                                        that it has a more-or-less normal distribution of letters, as opposed to using\n                                        \'Content here, content here\', making it look like readable English. Many desktop\n                                        publishing packages and web page editors now use Lorem Ipsum as their default\n                                        model text, and a search for \'lorem ipsum\' will uncover many web sites still in\n                                        their infancy. Various versions have evolved over the years, sometimes by\n                                        accident, sometimes on purpose (injected humour and the like).</p>\n                                    <h3>Where does it come from?</h3>\n                                    <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots\n                                        in a piece of classical Latin literature from 45 BC, making it over 2000 years\n                                        old. Richard McClintock, a Latin professor at Hampden-Sydney College in\n                                        Virginia, looked up one of the more obscure Latin words, consectetur, from a\n                                        Lorem Ipsum passage, and going through the cites of the word in classical\n                                        literature, discovered the undoubtable source. Lorem Ipsum comes from sections\n                                        1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and\n                                        Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of\n                                        ethics, very popular during the Renaissance. The first line of Lorem Ipsum,\n                                        \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>\n                                    <p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for\n                                        those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et\n                                        Malorum\" by Cicero are also reproduced in their exact original form, accompanied\n                                        by English versions from the 1914 translation by H. Rackham.</p>\n                                    <h4>Why do we use it?</h4>\n                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem\n                                        Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an\n                                        unknown printer took a galley of type and scrambled it to make a type specimen\n                                        book. It has survived not only five centuries, but also the leap into electronic\n                                        typesetting, remaining essentially unchanged. It was popularised in the 1960s\n                                        with the release of Letraset sheets containing Lorem Ipsum passages, and more\n                                        recently with desktop publishing software like Aldus PageMaker including\n                                        versions of Lorem Ipsum.</p>\n                                    <h3>Where does it come from?</h3>\n                                    <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots\n                                        in a piece of classical Latin literature from 45 BC, making it over 2000 years\n                                        old. Richard McClintock, a Latin professor at Hampden-Sydney College in\n                                        Virginia, looked up one of the more obscure Latin words, consectetur, from a\n                                        Lorem Ipsum passage, and going through the cites of the word in classical\n                                        literature, discovered the undoubtable source. Lorem Ipsum comes from sections\n                                        1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and\n                                        Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of\n                                        ethics, very popular during the Renaissance. The first line of Lorem Ipsum,\n                                        \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>', 'frontend/images/couples/9.jpg', NULL, 'The remote island nation of Kiribati has gone into lockdown after passengers on the first international', 'frontend/images/user/2.jpg', 'Steefan Ann', '2024-01-13', 0, 1, 1, '2024-10-22 04:48:51', '2024-11-24 21:57:14'),
(7, 1, 'Test 5', 'asdfadsf', 'uploads/blogs/1732170774_1.jpg', NULL, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi expedita eveniet consectetur, voluptates voluptatum, sit excepturi earum. Veniam eius amet, accusantium, deserunt officia, quos qui debitis laboriosam velit quis autem!', 'uploads/blogs/1732170708_6.jpg', 'adfadsf', '2024-11-05', 0, 1, 1, '2024-11-19 04:24:42', '2024-11-21 00:52:07');

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Wedding Planning', 'wedding-planning', 1, '2024-10-22 05:41:48', '2024-11-19 01:48:21'),
(2, 'Lifestyle', 'lifestyle', 1, '2024-10-22 05:41:48', '2024-10-22 05:41:48'),
(3, 'Catering services', 'catering-services', 1, '2024-10-22 05:41:48', '2024-10-22 05:41:48'),
(4, 'Wedding Decorations', 'wedding-decorations', 1, '2024-10-22 05:41:48', '2024-10-22 05:41:48'),
(5, 'Wedding Halls', 'wedding-halls', 1, '2024-10-22 05:41:48', '2024-10-22 05:41:48'),
(6, 'The Ceremony', 'the-ceremony', 1, '2024-10-22 05:41:48', '2024-10-22 05:41:48'),
(7, 'Photography', 'photography', 1, '2024-10-22 05:41:48', '2024-10-22 05:41:48');

-- --------------------------------------------------------

--
-- Table structure for table `blog_tags`
--

CREATE TABLE `blog_tags` (
  `id` int(11) NOT NULL,
  `blog_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_tags`
--

INSERT INTO `blog_tags` (`id`, `blog_id`, `tag_id`) VALUES
(1, 4, 1),
(2, 4, 2),
(3, 4, 3),
(4, 2, 1),
(5, 1, 2),
(6, 1, 1),
(7, 2, 2),
(8, 7, 3);

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `division_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `division_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Dhaka', 1, 1, '2024-10-20 04:59:14', '2024-11-23 22:03:41'),
(2, 'Chittagong', 2, 1, '2024-10-20 04:59:14', '2024-10-20 04:59:14'),
(3, 'Rajshahi', 6, 1, '2024-10-20 04:59:14', '2024-10-20 04:59:14'),
(4, 'Khulna', 3, 1, '2024-10-20 04:59:14', '2024-10-20 04:59:14'),
(5, 'Barishal', 4, 1, '2024-10-20 04:59:14', '2024-10-20 04:59:14'),
(6, 'Sylhet', 5, 1, '2024-10-20 04:59:14', '2024-10-20 04:59:14'),
(7, 'Mymensingh', 8, 1, '2024-10-20 04:59:14', '2024-10-20 04:59:14'),
(8, 'Rangpur', 7, 1, '2024-10-20 04:59:14', '2024-10-20 04:59:14');

-- --------------------------------------------------------

--
-- Table structure for table `contactinfos`
--

CREATE TABLE `contactinfos` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `bio` varchar(250) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `whatsapp` varchar(20) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(200) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contactinfos`
--

INSERT INTO `contactinfos` (`id`, `title`, `bio`, `phone`, `whatsapp`, `email`, `address`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Bibaha.com', 'Most Trusted and premium Matrimony Service in the World.', '+8801678337722', '#', 'messageappsis@gmail.com', 'SIS Media, Level # 9, Suite # 10-A, Razzak Plaza, 383 Boro Moghbazar, Dhaka, Bangladesh', 1, '2024-10-16 04:53:54', '2024-11-24 00:46:33');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `short_name`, `code`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Bangladesh', 'BD', '880', 1, '2024-11-27 04:38:22', '2024-11-27 04:38:22'),
(2, 'United States', 'US', '1', 1, '2024-11-27 04:38:22', '2024-11-27 04:38:22'),
(3, 'India', 'IN', '91', 1, '2024-11-27 04:38:22', '2024-11-27 04:38:22'),
(4, 'United Kingdom', 'UK', '44', 1, '2024-11-27 04:38:22', '2024-11-27 04:38:22'),
(5, 'Australia', 'AU', '61', 1, '2024-11-27 04:38:22', '2024-11-27 04:38:22'),
(6, 'Canada', 'CA', '1', 1, '2024-11-27 04:38:22', '2024-11-27 04:38:22'),
(7, 'Germany', 'DE', '49', 1, '2024-11-27 04:38:22', '2024-11-27 04:38:22'),
(8, 'France', 'FR', '33', 1, '2024-11-27 04:38:22', '2024-11-27 04:38:22'),
(9, 'Japan', 'JP', '81', 1, '2024-11-27 04:38:22', '2024-11-27 04:38:22'),
(10, 'China', 'CN', '86', 1, '2024-11-27 04:38:22', '2024-11-27 04:38:22');

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `name`, `country_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Dhaka', 1, 1, '2024-11-27 04:52:07', '2024-11-27 04:52:07'),
(2, 'Chittagong', 1, 1, '2024-11-27 04:52:07', '2024-11-27 04:52:07'),
(3, 'Khulna', 1, 1, '2024-11-27 04:52:07', '2024-11-27 04:52:07'),
(4, 'Barisal', 1, 1, '2024-11-27 04:52:07', '2024-11-27 04:52:07'),
(5, 'Sylhet', 1, 1, '2024-11-27 04:52:07', '2024-11-27 04:52:07'),
(6, 'Rajshahi', 1, 1, '2024-11-27 04:52:07', '2024-11-27 04:52:07'),
(7, 'Rangpur', 1, 1, '2024-11-27 04:52:07', '2024-11-27 04:52:07'),
(8, 'Mymensingh', 1, 1, '2024-11-27 04:52:07', '2024-11-27 04:52:07');

-- --------------------------------------------------------

--
-- Table structure for table `enquiries`
--

CREATE TABLE `enquiries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `enquiries`
--

INSERT INTO `enquiries` (`id`, `name`, `email`, `phone`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Test', 'test@gmail.com', '01770900478', 'test message', '2024-11-09 21:59:05', '2024-11-09 21:59:05');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `general_settings`
--

CREATE TABLE `general_settings` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` text,
  `logo` varchar(250) NOT NULL,
  `favicon` varchar(250) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `general_settings`
--

INSERT INTO `general_settings` (`id`, `name`, `description`, `logo`, `favicon`, `status`, `created_at`, `updated_at`) VALUES
(1, 'BIBAHA.COM', 'Best Wedding Matrimony lacinia viverra lectus. Fusce imperdiet ullamcorper metus eu fringilla.Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'uploads/general_settings/1731997492_logoo.png', 'uploads/general_settings/1731997343_fav.ico', 1, '2024-10-16 05:12:35', '2024-11-19 00:24:52');

-- --------------------------------------------------------

--
-- Table structure for table `hobbies`
--

CREATE TABLE `hobbies` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` tinytext NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hobbies`
--

INSERT INTO `hobbies` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Modelling', 1, '2024-10-17 17:59:02', '2024-10-17 11:59:02'),
(2, 'Watching', 1, '2024-10-17 17:59:02', '2024-10-17 11:59:02'),
(3, 'Movies', 1, '2024-10-17 17:59:02', '2024-10-17 11:59:02'),
(4, 'Playing', 1, '2024-10-17 17:59:02', '2024-10-17 11:59:02'),
(5, 'Volleyball', 1, '2024-10-17 17:59:02', '2024-10-17 11:59:02'),
(6, 'Hangout with family', 1, '2024-10-17 17:59:02', '2024-10-17 11:59:02'),
(7, 'Adventure travel', 1, '2024-10-17 17:59:02', '2024-10-17 11:59:02'),
(8, 'Books reading', 1, '2024-10-17 17:59:02', '2024-10-17 11:59:02'),
(9, 'Music', 1, '2024-10-17 17:59:02', '2024-10-17 11:59:02'),
(10, 'Cooking', 1, '2024-10-17 17:59:02', '2024-10-17 11:59:02'),
(11, 'Yoga', 1, '2024-10-17 17:59:02', '2024-10-17 11:59:55');

-- --------------------------------------------------------

--
-- Table structure for table `invitations`
--

CREATE TABLE `invitations` (
  `id` int(11) NOT NULL,
  `sent_from` int(11) NOT NULL,
  `sent_to` int(11) NOT NULL,
  `status` tinyint(1) DEFAULT NULL COMMENT 'null=requested, 0=deny, 1=accepted',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invitations`
--

INSERT INTO `invitations` (`id`, `sent_from`, `sent_to`, `status`, `created_at`, `updated_at`) VALUES
(39, 2, 1, 1, '2024-10-24 05:08:38', '2024-10-24 05:08:45'),
(40, 1, 1, NULL, '2024-12-12 04:34:27', '2024-12-12 04:34:27');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(250) DEFAULT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `sender_id`, `receiver_id`, `message`, `file`, `is_read`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'Hello', NULL, 0, 1, '2024-10-27 23:04:38', '2024-10-27 23:04:38'),
(2, 2, 1, 'Hii', NULL, 1, 1, '2024-10-27 23:05:14', '2024-10-28 02:55:56'),
(3, 1, 2, 'How are you?', NULL, 0, 1, '2024-10-27 23:05:36', '2024-10-27 23:05:36'),
(4, 1, 2, 'Hey I like SpiderMan? My childhood SUPERHERO', NULL, 0, 1, '2024-10-27 23:06:27', '2024-10-27 23:06:27'),
(5, 1, 2, 'Hello', NULL, 0, 1, '2024-10-27 23:23:34', '2024-10-27 23:23:34'),
(6, 1, 2, 'Hello', NULL, 0, 1, '2024-10-27 23:28:34', '2024-10-27 23:28:34'),
(7, 1, 2, 'Hello', NULL, 0, 1, '2024-10-27 23:29:38', '2024-10-27 23:29:38'),
(8, 1, 2, 'Hey', NULL, 0, 1, '2024-10-27 23:37:11', '2024-10-27 23:37:11'),
(9, 1, 2, 'Hey hello  Hey I like SpiderMan? My childhood SUPERHERO', NULL, 0, 1, '2024-10-27 23:37:59', '2024-10-27 23:37:59'),
(10, 1, 2, 'Hey hello  Hey I like SpiderMan? My childhood SUPERHERO Hey I like SpiderMan? My childhood SUPERHERO Hey I like SpiderMan? My childhood SUPERHERO', NULL, 0, 1, '2024-10-27 23:38:03', '2024-10-27 23:38:03'),
(11, 1, 2, 'Hey hello  Hey I like SpiderMan? My childhood SUPERHERO Hey I like SpiderMan? My childhood SUPERHERO Hey I like SpiderMan? My childhood SUPERHERO', NULL, 0, 1, '2024-10-27 23:38:19', '2024-10-27 23:38:19'),
(12, 2, 2, 'Hey this is me', NULL, 0, 1, '2024-10-27 23:58:36', '2024-10-28 02:55:56'),
(13, 1, 2, 'Hello', NULL, 0, 1, '2024-10-28 00:19:31', '2024-10-28 00:19:31'),
(14, 1, 2, 'Hey', NULL, 0, 1, '2024-10-28 00:20:18', '2024-10-28 00:20:18'),
(15, 1, 2, 'Why?', NULL, 0, 1, '2024-10-28 00:20:31', '2024-10-28 00:20:31'),
(16, 1, 2, 'Test message', NULL, 0, 1, '2024-10-28 00:28:24', '2024-10-28 00:28:24'),
(17, 2, 1, 'Hey whassup?', NULL, 1, 1, '2024-10-28 00:32:00', '2024-10-28 03:13:39'),
(18, 1, 2, 'Fine, What about you?', NULL, 0, 1, '2024-10-28 00:32:41', '2024-10-28 00:32:41'),
(19, 2, 1, 'Hii', NULL, 1, 1, '2024-10-28 03:01:49', '2024-10-29 23:02:10'),
(20, 1, 5, 'Arreee Siam Bhaaaaaii', NULL, 0, 1, '2024-10-28 03:02:50', '2024-10-28 03:02:50'),
(21, 1, 5, 'Hello', NULL, 0, 1, '2024-11-11 22:31:40', '2024-11-11 22:31:40'),
(22, 1, 5, 'Hey', NULL, 0, 1, '2024-11-11 22:32:32', '2024-11-11 22:32:32'),
(23, 1, 5, 'Hurrr mia', NULL, 0, 1, '2024-12-03 01:31:19', '2024-12-03 01:31:19'),
(24, 1, 1, 'Hello', NULL, 0, 1, '2024-12-12 04:30:26', '2024-12-12 04:30:26'),
(25, 1, 1, 'Hello', NULL, 0, 1, '2024-12-12 04:30:51', '2024-12-12 04:30:51');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2024_10_26_125450_create_banners_table', 1),
(5, '2024_10_26_125524_create_blogs_table', 1),
(6, '2024_10_26_125534_create_blog_categories_table', 1),
(7, '2024_10_26_125544_create_blog_tags_table', 1),
(8, '2024_10_26_125552_create_cities_table', 1),
(9, '2024_10_26_125607_create_contactinfos_table', 1),
(10, '2024_10_26_125617_create_general_settings_table', 1),
(11, '2024_10_26_125624_create_hobbies_table', 1),
(12, '2024_10_26_125632_create_invitations_table', 1),
(13, '2024_10_26_125642_create_ourteams_table', 1),
(14, '2024_10_26_125650_create_services_table', 1),
(15, '2024_10_26_125656_create_tags_table', 1),
(16, '2024_10_26_125706_create_testimonials_table', 1),
(17, '2024_10_26_125713_create_users_table', 1),
(18, '2024_10_26_125721_create_user_careers_table', 1),
(19, '2024_10_26_125730_create_user_hobbies_table', 1),
(20, '2024_10_26_125738_create_user_images_table', 1),
(21, '2024_10_26_125745_create_user_profiles_table', 1),
(23, '2024_10_26_125758_create_user_socialmedia_table', 2),
(24, '2024_10_26_125806_create_weddings_table', 2),
(25, '2024_10_26_125815_create_wedding_galleries_table', 2),
(26, '2024_10_26_125919_create_wedding_steps_table', 2),
(27, '2024_10_26_125925_create_wedding_stories_table', 2),
(28, '2024_10_28_035957_create_messages_table', 2),
(29, '2024_10_29_045238_create_permission_tables', 3),
(30, '2024_10_29_052846_create_packages_table', 4),
(31, '2024_10_29_054813_create_accesses_table', 5),
(32, '2024_10_29_055112_create_package_accesses_table', 6),
(33, '2024_10_29_055736_create_user_packages_table', 7),
(34, '2024_10_30_092602_create_package_payments_table', 8),
(35, '2024_11_06_054058_create_profile_views_table', 9),
(36, '2024_11_06_060259_create_profile_likes_table', 10),
(37, '2024_11_06_085156_create_profile_clicks_table', 11),
(38, '2024_11_10_034932_create_enquiries_table', 12),
(39, '2024_11_17_040528_create_admins_table', 13),
(41, '2024_11_27_042303_create_countries_table', 14),
(42, '2024_11_27_044604_create_divisions_table', 15),
(43, '2024_12_02_071221_create_user_verifications_table', 16),
(44, '2024_12_05_051214_create_user_preferences_table', 17),
(45, '2024_12_12_091428_create_push_subscriptions_table', 18);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ourteams`
--

CREATE TABLE `ourteams` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `designation` varchar(50) DEFAULT NULL,
  `image` varchar(200) NOT NULL,
  `advisor` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ourteams`
--

INSERT INTO `ourteams` (`id`, `title`, `designation`, `image`, `advisor`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Ashley Jen', 'Marketing Manager', 'frontend/images/profiles/6.jpg', 0, 1, '2024-10-15 10:17:27', '2024-10-15 10:17:27'),
(2, 'Ashley Jen', 'Marketing Manager', 'frontend/images/profiles/7.jpg', 0, 1, '2024-10-15 10:17:27', '2024-10-15 10:17:27'),
(3, 'Emily Arrov', 'Creative Manager', 'frontend/images/profiles/8.jpg', 1, 1, '2024-10-15 10:18:03', '2024-10-15 10:18:03'),
(4, 'Julia sear', 'Client Coordinator', 'frontend/images/profiles/9.jpg', 0, 1, '2024-10-15 10:18:03', '2024-11-23 23:01:14');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `old_price` int(11) DEFAULT NULL,
  `duration` int(11) NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci,
  `popular` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `name`, `price`, `old_price`, `duration`, `details`, `popular`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Free', 0, NULL, 200, '<ol>\r\n                                    <li><i class=\"fa fa-close close\" aria-hidden=\"true\"></i> 5 Premium Profiles view /mo\r\n                                    </li>\r\n                                    <li><i class=\"fa fa-check\" aria-hidden=\"true\"></i>Free user profile can view</li>\r\n                                    <li><i class=\"fa fa-close close\" aria-hidden=\"true\"></i>View contact details</li>\r\n                                    <li><i class=\"fa fa-close close\" aria-hidden=\"true\"></i>Send interest</li>\r\n                                    <li><i class=\"fa fa-close close\" aria-hidden=\"true\"></i>Start Chat</li>\r\n                                </ol>', 0, 1, '2024-10-09 06:54:56', '2024-11-26 01:29:11'),
(2, 'Gold', 349, 500, 30, '<ol>\r\n                                    <li><i class=\"fa fa-check\" aria-hidden=\"true\"></i> 20 Premium Profiles view /mo</li>\r\n                                    <li><i class=\"fa fa-check\" aria-hidden=\"true\"></i>Free user profile can view</li>\r\n                                    <li><i class=\"fa fa-check\" aria-hidden=\"true\"></i>View contact details</li>\r\n                                    <li><i class=\"fa fa-check\" aria-hidden=\"true\"></i>Send interest</li>\r\n                                    <li><i class=\"fa fa-check\" aria-hidden=\"true\"></i>Start Chat</li>\r\n                                </ol>', 1, 1, '2024-10-15 06:55:02', '2024-12-02 00:38:49'),
(3, 'Platinum', 549, 750, 90, '<ol>\r\n                                    <li><i class=\"fa fa-check\" aria-hidden=\"true\"></i> 50 Premium Profiles view /mo</li>\r\n                                    <li><i class=\"fa fa-check\" aria-hidden=\"true\"></i>Free user profile can view</li>\r\n                                    <li><i class=\"fa fa-check\" aria-hidden=\"true\"></i>View contact details</li>\r\n                                    <li><i class=\"fa fa-check\" aria-hidden=\"true\"></i>Send interest</li>\r\n                                    <li><i class=\"fa fa-check\" aria-hidden=\"true\"></i>Start Chat</li>\r\n                                </ol>', 0, 1, '2024-10-23 06:55:06', '2024-12-02 00:38:29');

-- --------------------------------------------------------

--
-- Table structure for table `package_accesses`
--

CREATE TABLE `package_accesses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `package_id` int(11) NOT NULL,
  `access_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `package_accesses`
--

INSERT INTO `package_accesses` (`id`, `package_id`, `access_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2024-10-29 05:53:25', '2024-10-29 05:53:27'),
(2, 2, 1, '2024-10-29 05:54:11', '2024-10-29 05:54:12'),
(3, 2, 2, '2024-10-29 05:54:14', '2024-10-29 05:54:15'),
(4, 3, 1, '2024-10-29 05:53:45', '2024-10-29 05:53:45'),
(5, 3, 2, '2024-10-29 05:53:45', '2024-10-29 05:53:45'),
(6, 3, 3, '2024-10-29 05:53:45', '2024-10-29 05:53:45'),
(7, 3, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `package_payments`
--

CREATE TABLE `package_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `package_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `duration` int(11) NOT NULL,
  `expired_at` date NOT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `package_payments`
--

INSERT INTO `package_payments` (`id`, `user_id`, `transaction_id`, `package_name`, `amount`, `duration`, `expired_at`, `status`, `created_at`, `updated_at`) VALUES
(1, 6, NULL, 'Platinum', 549, 90, '2024-10-29', 'Paid', '2024-07-30 04:05:12', '2024-07-30 04:05:12'),
(2, 6, NULL, 'Platinum', 549, 90, '2025-01-28', 'Paid', '2024-10-30 04:07:21', '2024-10-30 04:07:21'),
(3, 1, NULL, 'Platinum', 549, 90, '2025-01-28', 'Paid', '2024-10-30 04:21:36', '2024-10-30 04:21:36'),
(4, 5, NULL, 'Gold', 349, 30, '2024-12-11', 'Paid', '2024-11-11 03:48:01', '2024-11-11 03:48:01'),
(5, 1, NULL, 'Gold', 349, 30, '2024-12-12', 'Paid', '2024-11-11 23:26:41', '2024-11-11 23:26:41'),
(6, 1, NULL, 'Platinum', 549, 90, '2025-02-10', 'Paid', '2024-11-11 23:35:19', '2024-11-11 23:35:19');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'profile-view', 'web', '2024-10-28 23:05:25', '2024-10-28 23:05:25'),
(2, 'send-message', 'web', '2024-10-28 23:05:26', '2024-10-28 23:05:26'),
(3, 'send-interest', 'web', '2024-10-28 23:05:26', '2024-10-28 23:05:26');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profile_clicks`
--

CREATE TABLE `profile_clicks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `clicker_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profile_clicks`
--

INSERT INTO `profile_clicks` (`id`, `user_id`, `clicker_id`, `created_at`, `updated_at`) VALUES
(1, 1, 5, '2024-11-06 02:55:45', '2024-11-06 02:55:45'),
(2, 1, 5, '2024-11-06 02:55:57', '2024-11-06 02:55:57'),
(3, 1, 5, '2024-11-06 02:56:04', '2024-11-06 02:56:04'),
(4, 1, 5, '2024-11-06 02:56:07', '2024-11-06 02:56:07'),
(5, 1, 5, '2024-11-06 02:56:12', '2024-11-06 02:56:12'),
(6, 1, 5, '2024-11-06 02:56:19', '2024-11-06 02:56:19'),
(7, 6, 1, '2024-11-06 03:44:37', '2024-11-06 03:44:37'),
(8, 6, 1, '2024-11-06 03:45:09', '2024-11-06 03:45:09'),
(9, 5, 6, '2024-11-06 22:44:38', '2024-11-06 22:44:38'),
(10, 2, 6, '2024-11-06 22:44:42', '2024-11-06 22:44:42'),
(11, 1, 6, '2024-11-06 22:44:52', '2024-11-06 22:44:52'),
(12, 2, 5, '2024-11-06 22:45:25', '2024-11-06 22:45:25'),
(13, 2, 5, '2024-11-06 22:45:37', '2024-11-06 22:45:37'),
(14, 2, 5, '2024-11-06 22:46:04', '2024-11-06 22:46:04'),
(15, 1, 5, '2024-11-06 22:46:11', '2024-11-06 22:46:11'),
(16, 6, 5, '2024-11-06 22:53:24', '2024-11-06 22:53:24'),
(17, 6, 5, '2024-11-06 22:53:50', '2024-11-06 22:53:50'),
(18, 6, 5, '2024-11-06 22:54:16', '2024-11-06 22:54:16'),
(19, 6, 5, '2024-11-06 23:28:53', '2024-11-06 23:28:53'),
(20, 6, 5, '2024-11-06 23:44:04', '2024-11-06 23:44:04'),
(21, 6, 1, '2024-11-07 00:29:17', '2024-11-07 00:29:17'),
(22, 6, 1, '2024-11-07 00:31:54', '2024-11-07 00:31:54'),
(23, 6, 1, '2024-11-07 00:32:07', '2024-11-07 00:32:07'),
(24, 6, 1, '2024-11-07 00:33:41', '2024-11-07 00:33:41'),
(25, 6, 1, '2024-11-07 00:34:12', '2024-11-07 00:34:12'),
(26, 6, 1, '2024-11-07 00:34:35', '2024-11-07 00:34:35'),
(27, 6, 1, '2024-11-07 00:37:00', '2024-11-07 00:37:00'),
(28, 6, 1, '2024-11-07 00:37:48', '2024-11-07 00:37:48'),
(29, 6, 1, '2024-11-07 00:38:11', '2024-11-07 00:38:11'),
(30, 6, 1, '2024-11-07 00:40:06', '2024-11-07 00:40:06'),
(31, 6, 1, '2024-11-07 00:40:25', '2024-11-07 00:40:25'),
(32, 6, 1, '2024-11-07 00:40:47', '2024-11-07 00:40:47'),
(33, 6, 1, '2024-11-07 00:41:02', '2024-11-07 00:41:02'),
(34, 6, 5, '2024-11-07 00:42:07', '2024-11-07 00:42:07'),
(35, 6, 5, '2024-11-07 00:42:18', '2024-11-07 00:42:18'),
(36, 6, 1, '2024-11-07 00:42:57', '2024-11-07 00:42:57'),
(37, 6, 1, '2024-11-07 00:43:18', '2024-11-07 00:43:18'),
(38, 6, 1, '2024-11-07 00:49:47', '2024-11-07 00:49:47'),
(39, 1, 6, '2024-11-07 03:43:21', '2024-11-07 03:43:21'),
(40, 1, 6, '2024-11-07 03:43:50', '2024-11-07 03:43:50'),
(41, 6, 1, '2024-11-09 22:05:24', '2024-11-09 22:05:24'),
(42, 6, 1, '2024-11-10 00:11:20', '2024-11-10 00:11:20'),
(43, 6, 1, '2024-11-10 00:11:58', '2024-11-10 00:11:58'),
(44, 2, 1, '2024-11-10 00:12:06', '2024-11-10 00:12:06'),
(45, 2, 1, '2024-11-10 00:13:37', '2024-11-10 00:13:37'),
(46, 2, 1, '2024-11-10 00:14:15', '2024-11-10 00:14:15'),
(47, 2, 1, '2024-11-10 00:14:31', '2024-11-10 00:14:31'),
(48, 2, 1, '2024-11-10 00:14:38', '2024-11-10 00:14:38'),
(49, 5, 1, '2024-11-11 00:28:57', '2024-11-11 00:28:57'),
(50, 1, 1, '2024-11-11 00:48:54', '2024-11-11 00:48:54'),
(51, 1, 1, '2024-11-11 00:56:05', '2024-11-11 00:56:05'),
(52, 2, 1, '2024-11-11 00:56:18', '2024-11-11 00:56:18'),
(53, 2, 1, '2024-11-11 00:57:01', '2024-11-11 00:57:01'),
(54, 2, 1, '2024-11-11 00:58:09', '2024-11-11 00:58:09'),
(55, 6, 1, '2024-11-11 01:00:16', '2024-11-11 01:00:16'),
(56, 2, 1, '2024-11-11 01:01:58', '2024-11-11 01:01:58'),
(57, 2, 5, '2024-11-11 01:07:50', '2024-11-11 01:07:50'),
(58, 6, 5, '2024-11-11 01:07:56', '2024-11-11 01:07:56'),
(59, 2, 5, '2024-11-11 01:11:19', '2024-11-11 01:11:19'),
(60, 2, 5, '2024-11-11 01:13:34', '2024-11-11 01:13:34'),
(61, 1, 5, '2024-11-11 01:15:16', '2024-11-11 01:15:16'),
(62, 1, 5, '2024-11-11 01:19:36', '2024-11-11 01:19:36'),
(63, 1, 5, '2024-11-11 01:19:40', '2024-11-11 01:19:40'),
(64, 1, 5, '2024-11-11 01:20:06', '2024-11-11 01:20:06'),
(65, 1, 5, '2024-11-11 01:31:28', '2024-11-11 01:31:28'),
(66, 1, 5, '2024-11-11 01:32:06', '2024-11-11 01:32:06'),
(67, 1, 5, '2024-11-11 01:32:12', '2024-11-11 01:32:12'),
(68, 1, 1, '2024-11-11 02:43:54', '2024-11-11 02:43:54'),
(69, 1, 1, '2024-11-11 02:44:56', '2024-11-11 02:44:56'),
(70, 2, 1, '2024-11-11 03:13:45', '2024-11-11 03:13:45'),
(71, 6, 1, '2024-11-11 03:13:54', '2024-11-11 03:13:54'),
(72, 6, 1, '2024-11-11 03:14:07', '2024-11-11 03:14:07'),
(73, 6, 1, '2024-11-11 03:33:30', '2024-11-11 03:33:30'),
(74, 1, 6, '2024-11-11 03:46:35', '2024-11-11 03:46:35'),
(75, 1, 5, '2024-11-11 03:47:29', '2024-11-11 03:47:29'),
(76, 1, 5, '2024-11-11 03:48:08', '2024-11-11 03:48:08'),
(77, 1, 5, '2024-11-11 03:49:41', '2024-11-11 03:49:41'),
(78, 1, 5, '2024-11-11 03:49:51', '2024-11-11 03:49:51'),
(79, 1, 5, '2024-11-11 03:50:05', '2024-11-11 03:50:05'),
(80, 1, 5, '2024-11-11 03:50:42', '2024-11-11 03:50:42'),
(81, 1, 5, '2024-11-11 03:54:53', '2024-11-11 03:54:53'),
(82, 1, 1, '2024-12-01 01:22:38', '2024-12-01 01:22:38'),
(83, 1, 1, '2024-12-01 01:25:15', '2024-12-01 01:25:15'),
(84, 1, 1, '2024-12-01 01:26:08', '2024-12-01 01:26:08'),
(85, 1, 1, '2024-12-01 22:43:16', '2024-12-01 22:43:16'),
(86, 7, 1, '2024-12-01 22:46:57', '2024-12-01 22:46:57'),
(87, 7, 1, '2024-12-01 23:07:30', '2024-12-01 23:07:30'),
(88, 7, 1, '2024-12-01 23:07:52', '2024-12-01 23:07:52'),
(89, 7, 1, '2024-12-01 23:08:16', '2024-12-01 23:08:16'),
(90, 1, 1, '2024-12-01 23:08:19', '2024-12-01 23:08:19'),
(91, 1, 1, '2024-12-01 23:27:51', '2024-12-01 23:27:51'),
(92, 1, 1, '2024-12-02 00:07:52', '2024-12-02 00:07:52'),
(93, 1, 1, '2024-12-02 00:16:40', '2024-12-02 00:16:40'),
(94, 1, 1, '2024-12-02 00:21:28', '2024-12-02 00:21:28'),
(95, 1, 1, '2024-12-02 00:22:13', '2024-12-02 00:22:13'),
(96, 1, 1, '2024-12-02 00:23:01', '2024-12-02 00:23:01'),
(97, 7, 1, '2024-12-04 22:02:52', '2024-12-04 22:02:52'),
(98, 7, 1, '2024-12-04 22:03:42', '2024-12-04 22:03:42'),
(99, 1, 5, '2024-12-04 22:12:33', '2024-12-04 22:12:33'),
(100, 7, 1, '2024-12-11 23:21:44', '2024-12-11 23:21:44'),
(101, 1, 1, '2024-12-11 23:22:51', '2024-12-11 23:22:51');

-- --------------------------------------------------------

--
-- Table structure for table `profile_likes`
--

CREATE TABLE `profile_likes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `liker_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profile_likes`
--

INSERT INTO `profile_likes` (`id`, `user_id`, `liker_id`, `created_at`, `updated_at`) VALUES
(2, 6, 1, '2024-11-06 00:54:20', '2024-11-06 00:54:20'),
(8, 1, 6, '2024-11-06 01:14:13', '2024-11-06 01:14:13'),
(9, 1, 5, '2024-11-06 01:16:26', '2024-11-06 01:16:26'),
(12, 5, 1, '2024-11-12 01:10:23', '2024-11-12 01:10:23');

-- --------------------------------------------------------

--
-- Table structure for table `profile_views`
--

CREATE TABLE `profile_views` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `viewer_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profile_views`
--

INSERT INTO `profile_views` (`id`, `user_id`, `viewer_id`, `created_at`, `updated_at`) VALUES
(2, 1, 6, '2024-11-05 23:51:44', '2024-11-05 23:51:44'),
(3, 5, 6, '2024-11-05 23:57:01', '2024-11-05 23:57:01'),
(4, 2, 6, '2024-11-05 23:57:08', '2024-11-05 23:57:08'),
(5, 5, 1, '2024-11-06 00:48:34', '2024-11-06 00:48:34'),
(6, 1, 5, '2024-11-06 02:55:45', '2024-11-06 02:55:45'),
(7, 6, 1, '2024-11-06 03:44:36', '2024-11-06 03:44:36'),
(8, 2, 5, '2024-11-06 22:45:25', '2024-11-06 22:45:25'),
(9, 6, 5, '2024-11-06 22:53:24', '2024-11-06 22:53:24'),
(10, 2, 1, '2024-11-10 00:12:06', '2024-11-10 00:12:06'),
(11, 1, 1, '2024-11-11 00:48:54', '2024-11-11 00:48:54'),
(12, 7, 1, '2024-12-01 22:46:57', '2024-12-01 22:46:57');

-- --------------------------------------------------------

--
-- Table structure for table `push_subscriptions`
--

CREATE TABLE `push_subscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `subscription_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `push_subscriptions`
--

INSERT INTO `push_subscriptions` (`id`, `user_id`, `subscription_id`, `created_at`, `updated_at`) VALUES
(2, 1, '8bdbc8a0-650e-428e-82bd-2cca75181235', '2024-12-12 03:35:58', '2024-12-12 03:54:44');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Free', 'web', '2024-10-28 23:05:25', '2024-10-28 23:05:25'),
(2, 'Gold', 'web', '2024-10-28 23:05:25', '2024-10-28 23:05:25'),
(3, 'Platinum', 'web', '2024-10-28 23:05:25', '2024-10-28 23:05:25');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(2, 2),
(1, 3),
(2, 3),
(3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `image` varchar(200) NOT NULL,
  `icon` varchar(200) DEFAULT NULL,
  `link` varchar(250) NOT NULL DEFAULT '#',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `title`, `image`, `icon`, `link`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Browse Profiles', '1200+ Profiles', 'frontend/images/couples/1.jpg', 'frontend/images/icon/user.png', 'all-profile', 1, '2024-10-15 07:22:42', '2024-10-15 07:22:42'),
(2, 'Wedding', '1200+ Profiles', 'frontend/images/couples/2.jpg', 'frontend/images/icon/gate.png', '#', 1, '2024-10-15 07:24:59', '2024-10-15 07:24:59'),
(3, 'All Services', '1200+ Profiles', 'frontend/images/couples/3.jpg', 'frontend/images/icon/couple.png', '#', 1, '2024-10-15 08:44:39', '2024-10-15 08:44:39'),
(4, 'Join Now', 'Start for free', 'frontend/images/couples/4.jpg', 'frontend/images/icon/hall.png', 'plans', 1, '2024-10-15 08:46:20', '2024-10-15 08:46:20'),
(5, 'Photo gallery', '1200+ Profiles', 'frontend/images/couples/5.jpg', 'frontend/images/icon/photo-camera.png', '#', 1, '2024-10-15 08:47:40', '2024-10-15 08:47:40'),
(6, 'Blog & Articles', 'Start for free', 'frontend/images/couples/6.jpg', 'frontend/images/icon/cake.png', 'blogs', 1, '2024-10-15 08:48:18', '2024-10-15 08:48:18');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Wedding', 1, '2024-10-22 04:15:51', '2024-10-22 04:15:51'),
(2, 'Events', 1, '2024-10-22 04:15:51', '2024-10-22 04:15:51'),
(3, 'Decoration', 1, '2024-10-22 04:15:51', '2024-10-22 04:15:51'),
(4, 'Bridal', 1, '2024-10-22 04:15:51', '2024-10-22 04:15:51');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` text,
  `image` varchar(200) NOT NULL,
  `location` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `title`, `description`, `image`, `location`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Jack danial', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem\r\n                                        Ipsum has been the industry\'s standard dummy text ever since the 1500s', 'frontend/images/user/1.jpg', 'New york', 1, '2024-10-15 09:19:15', '2024-10-15 09:19:15'),
(2, 'Jack danial', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem\r\n                                        Ipsum has been the industry\'s standard dummy text ever since the 1500s', 'frontend/images/user/2.jpg', 'New york', 1, '2024-10-15 09:19:15', '2024-10-15 09:19:15'),
(3, 'Jack danial', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem\r\n                                        Ipsum has been the industry\'s standard dummy text ever since the 1500s', 'frontend/images/user/3.jpg', 'New york', 1, '2024-10-15 09:19:15', '2024-10-15 09:19:15'),
(4, 'Jack danial', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem\r\n                                        Ipsum has been the industry\'s standard dummy text ever since the 1500s', 'frontend/images/user/4.jpg', 'New york', 1, '2024-10-15 09:19:15', '2024-10-15 09:19:15'),
(5, 'Jack danial', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem\r\n                                        Ipsum has been the industry\'s standard dummy text ever since the 1500s', 'frontend/images/user/5.jpg', 'New york', 1, '2024-10-15 09:19:15', '2024-10-15 09:19:15'),
(6, 'Test aaa', 'asdfadfadfaf', 'uploads/testimonials/1732428478_7.jpg', 'adfadf', 1, '2024-11-24 00:07:58', '2024-11-24 00:10:09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `email` varchar(250) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `verified` tinyint(1) DEFAULT NULL,
  `profile_for` varchar(50) DEFAULT NULL,
  `profile_visibility` varchar(20) DEFAULT 'all',
  `interest_request_access` varchar(20) DEFAULT 'all',
  `password` varchar(250) NOT NULL,
  `last_active` timestamp NULL DEFAULT NULL,
  `active_status` tinyint(1) NOT NULL DEFAULT '1',
  `remember_token` varchar(200) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `slug`, `email`, `phone`, `verified`, `profile_for`, `profile_visibility`, `interest_request_access`, `password`, `last_active`, `active_status`, `remember_token`, `status`, `created_at`, `updated_at`) VALUES
(1, 'ALif', 'alif', 'alif@gmail.com', '01770900478', 1, NULL, 'all', 'all', '$2y$10$swFxnKOV9jurnx/y49SN/e3P.GC5lsvpF3fTLC3abUO8/vCVlpQua', '2024-12-12 04:34:27', 1, 'kQaMarbRNU9zV8Myw1QDJ5Rt6b85ZxaskAfVhc8mcPUGa3hgk53xdB1HLA0b', 1, '2024-10-17 04:04:03', '2024-12-12 04:34:27'),
(2, 'Spider Man', 'spider-man', 'spiderman@gmail.com', '01456325874', NULL, NULL, 'all', 'all', '$2y$10$9mMXSdWEcPeC2eDPlSRJHe6DicyCoR67Yi44T6OaaGYzF7I80N89e', '2024-12-04 22:30:26', 0, NULL, 1, '2024-10-20 02:49:40', '2024-12-04 22:30:26'),
(3, 'Siam Khan', 'siam-khan', 'siam@gmail.com', '01571767287', NULL, NULL, 'all', 'all', '$2y$10$7k6xxvLjy2b2PRRZgMSHvuWHhgyo3wJO06oHAFnydyyHPNlzIaTqO', '2024-12-04 22:30:26', 0, NULL, 1, '2024-10-20 23:56:36', '2024-12-04 22:30:26'),
(4, 'Amin Mahmud Sayef', 'amin-mahmud-sayef', 'saifmahmud727@gmail.com', '01955249001', NULL, NULL, 'all', 'all', '$2y$10$ojVllyPrPvrpaWCjEDIdWeweRmwQkZXTdxXltMnRCjvS..OReV1PK', '2024-12-04 22:30:26', 0, NULL, 1, '2024-10-28 02:19:19', '2024-12-04 22:30:26'),
(5, 'MD Siam Ahmed', 'md-siam-ahmed', 'siam123@gmail.com', '01768553823', NULL, NULL, 'all', 'all', '$2y$10$ayPIKfbNhyPYTwN9aBveP.lmOLfpm2jijIoBVZTXLxHytlTP.aeeO', '2024-12-05 02:54:05', 0, NULL, 1, '2024-10-28 02:41:17', '2024-12-05 02:56:24'),
(6, 'Elizabeth Taylor', 'elizabeth-taylor', 'taylor@gmail.com', '01770900477', NULL, NULL, 'all', 'all', '$2y$10$riH9aoaMb2qYbWBHUTOyouB28iawXThg.SgGIw8mVDAIn9x5QryBS', '2024-12-04 22:30:26', 0, NULL, 1, '2024-10-30 00:33:59', '2024-12-04 22:30:26'),
(7, 'ALif', 'alif-2', 'test@gmail.com', NULL, NULL, NULL, 'all', 'all', '$2y$10$UG04tsK1ZIdUiqF4Jaj8f.EeacXM2EG1lM4mIB4IhXbZMAzogdI82', '2024-12-04 22:30:26', 0, NULL, 1, '2024-11-17 04:13:22', '2024-12-04 22:30:26'),
(12, 'Test 2', 'test-2', 'test2@gmail.com', NULL, NULL, 'Myself', 'all', 'all', '$2y$10$9RKIbVu/lGy.KilKSV8pK.qs0fiNWCWSWLyztYBlcdXmQqPb5Neti', '2024-12-04 22:30:26', 0, NULL, 1, '2024-11-24 03:06:03', '2024-12-04 22:30:26');

-- --------------------------------------------------------

--
-- Table structure for table `user_careers`
--

CREATE TABLE `user_careers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_profile_id` int(11) NOT NULL,
  `type` varchar(30) NOT NULL,
  `company_name` varchar(200) DEFAULT NULL,
  `salary` varchar(20) DEFAULT NULL,
  `experience` varchar(20) DEFAULT NULL,
  `degree` varchar(100) DEFAULT NULL,
  `college` varchar(200) DEFAULT NULL,
  `school` varchar(200) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_careers`
--

INSERT INTO `user_careers` (`id`, `user_id`, `user_profile_id`, `type`, `company_name`, `salary`, `experience`, `degree`, `college`, `school`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'Employee', 'AIUB', '5000 USD', '2 Years', 'BSc. in Computer Science & Engineering', 'Collectorate School and College, Rangpur', 'Haragach M/L High School', 1, '2024-10-19 23:50:54', '2024-11-18 23:08:46'),
(2, 2, 3, 'Jobless', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-10-20 03:02:32', '2024-10-20 03:02:32'),
(3, 5, 4, 'Jobless', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-10-28 02:48:37', '2024-10-28 02:48:37'),
(4, 6, 5, 'Jobless', NULL, NULL, NULL, 'BSc.', NULL, NULL, 1, '2024-10-30 00:36:35', '2024-10-30 00:36:35'),
(5, 7, 6, 'Business', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-11-17 04:13:22', '2024-11-17 04:13:22'),
(6, 8, 7, 'Business', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-11-17 04:16:18', '2024-11-17 04:16:18'),
(7, 9, 8, 'Business', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-11-17 04:17:41', '2024-11-17 04:17:41'),
(8, 13, 9, 'Jobless', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-11-27 00:45:53', '2024-11-27 00:45:53'),
(9, 14, 10, 'Employee', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-11-27 01:00:35', '2024-11-27 01:00:35');

-- --------------------------------------------------------

--
-- Table structure for table `user_hobbies`
--

CREATE TABLE `user_hobbies` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_profile_id` int(11) NOT NULL,
  `hobby_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_hobbies`
--

INSERT INTO `user_hobbies` (`id`, `user_id`, `user_profile_id`, `hobby_id`, `status`, `created_at`, `updated_at`) VALUES
(75, 9, 8, 7, 1, '2024-11-18 23:22:40', '2024-11-18 23:22:40'),
(78, 5, 4, 8, 1, '2024-11-26 23:45:32', '2024-11-26 23:45:32'),
(79, 5, 4, 1, 1, '2024-11-26 23:45:32', '2024-11-26 23:45:32'),
(86, 1, 2, 3, 1, '2024-12-01 23:21:28', '2024-12-01 23:21:28'),
(87, 1, 2, 9, 1, '2024-12-01 23:21:28', '2024-12-01 23:21:28');

-- --------------------------------------------------------

--
-- Table structure for table `user_images`
--

CREATE TABLE `user_images` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_profile_id` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_images`
--

INSERT INTO `user_images` (`id`, `user_id`, `user_profile_id`, `image`, `status`, `created_at`, `updated_at`) VALUES
(13, 1, 2, 'frontend/uploads/userimages/1729589789_9.jpg', 1, '2024-10-22 03:36:29', '2024-10-22 03:36:29'),
(14, 1, 2, 'frontend/uploads/userimages/1729589789_men2.jpg', 1, '2024-10-22 03:36:29', '2024-10-22 03:36:29'),
(19, 1, 2, 'frontend/uploads/userimages/1729590259_men1.jpg', 1, '2024-10-22 03:44:19', '2024-10-22 03:44:19'),
(20, 1, 2, 'frontend/uploads/userimages/1729590259_men3.jpg', 1, '2024-10-22 03:44:19', '2024-10-22 03:44:19');

-- --------------------------------------------------------

--
-- Table structure for table `user_packages`
--

CREATE TABLE `user_packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `payment_id` int(11) DEFAULT NULL,
  `expired_at` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_packages`
--

INSERT INTO `user_packages` (`id`, `user_id`, `package_id`, `payment_id`, `expired_at`, `created_at`, `updated_at`) VALUES
(1, 1, 2, NULL, '2024-11-25', NULL, NULL),
(2, 6, 3, 2, '2025-01-28', '2024-10-30 04:07:21', '2024-10-30 04:07:21'),
(3, 1, 3, 3, '2025-01-28', '2024-10-30 04:21:36', '2024-10-30 04:21:36'),
(4, 5, 2, 4, '2024-12-11', '2024-11-11 03:48:01', '2024-11-11 03:48:01'),
(5, 1, 2, 5, '2024-12-12', '2024-11-11 23:26:42', '2024-11-11 23:26:42'),
(6, 1, 3, 6, '2025-02-10', '2024-11-11 23:35:19', '2024-11-11 23:35:19');

-- --------------------------------------------------------

--
-- Table structure for table `user_preferences`
--

CREATE TABLE `user_preferences` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `min_age` int(11) DEFAULT NULL,
  `max_age` int(11) DEFAULT NULL,
  `min_height` int(11) DEFAULT NULL,
  `max_height` int(11) DEFAULT NULL,
  `marital_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `religion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jobtype` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `min_salary` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `max_salary` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_preferences`
--

INSERT INTO `user_preferences` (`id`, `user_id`, `min_age`, `max_age`, `min_height`, `max_height`, `marital_status`, `religion`, `language`, `city_id`, `jobtype`, `min_salary`, `max_salary`, `created_at`, `updated_at`) VALUES
(1, 1, 25, 35, 155, 180, 'Never Married', 'Muslim', 'Bangla', '8', NULL, NULL, NULL, '2024-12-05 00:07:47', '2024-12-05 00:09:26');

-- --------------------------------------------------------

--
-- Table structure for table `user_profiles`
--

CREATE TABLE `user_profiles` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `image` varchar(200) DEFAULT NULL,
  `bio` text,
  `marital_status` varchar(100) DEFAULT NULL,
  `gender` varchar(10) NOT NULL,
  `religion` varchar(20) DEFAULT NULL,
  `language` varchar(20) DEFAULT NULL,
  `city_id` int(11) NOT NULL,
  `birth_date` date NOT NULL,
  `age` int(20) NOT NULL,
  `height` varchar(50) DEFAULT NULL,
  `weight` varchar(50) DEFAULT NULL,
  `fathers_name` varchar(100) DEFAULT NULL,
  `mothers_name` varchar(100) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_profiles`
--

INSERT INTO `user_profiles` (`id`, `user_id`, `image`, `bio`, `marital_status`, `gender`, `religion`, `language`, `city_id`, `birth_date`, `age`, `height`, `weight`, `fathers_name`, `mothers_name`, `address`, `status`, `created_at`, `updated_at`) VALUES
(2, 1, 'frontend/uploads/profile/1729590388_men1.jpg', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.\n\nMany desktop publishing packages and web page editors now use Lorem Ipsum as their default model text.', 'Single', 'Male', 'Muslim', 'Bangla', 8, '1997-12-01', 27, '170', '70', 'Alta', 'Branson Bartell', 'Khilkhet, Dhaka', 1, '2024-10-19 23:33:10', '2024-12-01 23:21:27'),
(3, 2, 'frontend/images/profiles/12.jpg', NULL, NULL, 'Male', NULL, NULL, 2, '1999-10-22', 24, '170', '70', 'Alvah', 'Kassandra Russel', 'Khilkhet, Dhaka', 1, '2024-10-20 03:02:31', '2024-10-20 03:02:31'),
(4, 5, 'frontend/uploads/profile/1730105502_b4eab1bb-bded-4dec-b046-d39a5d31ec4f.jpg', NULL, NULL, 'Male', 'Muslim', 'Russian', 5, '1990-02-28', 34, '170', '54', 'Alvah', 'Kassandra Russel', 'sdf', 1, '2024-10-28 02:48:36', '2024-11-26 23:45:32'),
(5, 6, 'frontend/uploads/profile/1730887538_12.jpg', NULL, NULL, 'Female', 'Muslim', NULL, 8, '2000-06-15', 24, '155', '55', 'Alvah', 'Kassandra Russel', 'Dhaka', 1, '2024-10-30 00:36:35', '2024-11-10 00:10:05'),
(6, 7, 'frontend/uploads/profile/1731838402_2.jpg', NULL, NULL, 'Male', 'Muslim', NULL, 1, '1997-12-01', 26, '170', '70', 'Alvah', 'Lonnie Trantow', 'Khilkhet, Dhaka', 1, '2024-11-17 04:13:22', '2024-11-17 04:13:22'),
(7, 8, 'frontend/uploads/profile/1731838578_2.jpg', NULL, NULL, 'Male', 'Muslim', NULL, 1, '1997-12-01', 26, '170', '70', 'Leo', 'Andres Runte', 'Khilkhet, Dhaka', 1, '2024-11-17 04:16:18', '2024-11-17 04:16:18'),
(8, 9, 'frontend/uploads/profile/1731993760_7.jpg', NULL, NULL, 'Male', 'Muslim', NULL, 1, '1997-12-01', 26, '170', '70', 'Leo', 'Andres Runte', 'Khilkhet, Dhaka', 1, '2024-11-17 04:17:41', '2024-11-18 23:22:40');

-- --------------------------------------------------------

--
-- Table structure for table `user_socialmedia`
--

CREATE TABLE `user_socialmedia` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_profile_id` int(11) NOT NULL,
  `whatsApp` varchar(200) DEFAULT NULL,
  `facebook` varchar(200) DEFAULT NULL,
  `instagram` varchar(200) DEFAULT NULL,
  `x` varchar(200) DEFAULT NULL,
  `youtube` varchar(200) DEFAULT NULL,
  `linkedin` varchar(200) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_socialmedia`
--

INSERT INTO `user_socialmedia` (`id`, `user_id`, `user_profile_id`, `whatsApp`, `facebook`, `instagram`, `x`, `youtube`, `linkedin`, `status`, `created_at`, `updated_at`) VALUES
(5, 1, 2, '#', '#', '#', '#', '#', '#', 1, '2024-10-20 00:39:13', '2024-11-10 03:33:44'),
(6, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-10-20 03:02:33', '2024-10-20 03:02:33'),
(7, 5, 4, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-10-28 02:48:37', '2024-10-28 02:48:37'),
(8, 6, 5, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-10-30 00:36:36', '2024-10-30 00:36:36'),
(9, 7, 6, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-11-17 04:13:22', '2024-11-17 04:13:22'),
(10, 8, 7, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-11-17 04:16:18', '2024-11-17 04:16:18'),
(11, 9, 8, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-11-17 04:17:41', '2024-11-17 04:17:41'),
(12, 13, 9, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-11-27 00:45:53', '2024-11-27 00:45:53'),
(13, 14, 10, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-11-27 01:00:35', '2024-11-27 01:00:35');

-- --------------------------------------------------------

--
-- Table structure for table `user_verifications`
--

CREATE TABLE `user_verifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `image` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_back` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_verifications`
--

INSERT INTO `user_verifications` (`id`, `name`, `user_id`, `image`, `image_back`, `status`, `created_at`, `updated_at`) VALUES
(11, 'NID', 1, 'uploads/verification/1733210094_1.jpg', 'uploads/verification/1733210094_3.jpg', 1, '2024-12-03 01:14:54', '2024-12-03 01:21:09');

-- --------------------------------------------------------

--
-- Table structure for table `weddings`
--

CREATE TABLE `weddings` (
  `id` int(11) NOT NULL,
  `couple_name` varchar(100) NOT NULL,
  `couple_image` varchar(200) NOT NULL,
  `description` text,
  `location` varchar(50) DEFAULT NULL,
  `video_based` tinyint(1) NOT NULL DEFAULT '0',
  `thumbnail` varchar(200) DEFAULT NULL,
  `video` text,
  `image1` varchar(250) DEFAULT NULL,
  `image2` varchar(250) DEFAULT NULL,
  `image3` varchar(250) DEFAULT NULL,
  `date` date NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `weddings`
--

INSERT INTO `weddings` (`id`, `couple_name`, `couple_image`, `description`, `location`, `video_based`, `thumbnail`, `video`, `image1`, `image2`, `image3`, `date`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Dany & July', 'frontend/images/couples/7.jpg', 'Lakhs of peoples have found their life partner at Wedding Matrimony!', 'New York', 1, 'frontend/images/couples/20.jpg', '<iframe src=\"https://www.youtube.com/embed/P9iKATG9BW4\" title=\"Wedding marriage: Wedding marriage\"\r\n                                allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\"\r\n                                allowfullscreen></iframe>', NULL, NULL, NULL, '2024-10-06', 1, '2024-10-16 06:08:27', '2024-10-16 06:08:27'),
(2, 'Michael & Jessica', 'frontend/images/couples/6.jpg', 'Lakhs of peoples have found their life partner at Wedding Matrimony!', 'New York', 0, NULL, NULL, 'frontend/images/couples/1.jpg', 'frontend/images/couples/5.jpg', 'frontend/images/couples/9.jpg', '2024-08-19', 1, '2024-10-16 06:41:36', '2024-10-16 06:41:36'),
(5, 'Test', 'uploads/weddings/1732514988_1.jpg', 'adsf adfawr aaf fasdfa adfa afg  a', 'Dhaka', 0, NULL, NULL, 'uploads/weddings/1732515124_11.jpg', 'uploads/weddings/1732515151_4.jpg', 'uploads/weddings/1732515151_5.jpg', '2024-11-07', 1, '2024-11-25 00:09:48', '2024-11-25 00:12:31');

-- --------------------------------------------------------

--
-- Table structure for table `wedding_galleries`
--

CREATE TABLE `wedding_galleries` (
  `id` int(11) NOT NULL,
  `wedding_id` int(11) NOT NULL,
  `image` varchar(250) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wedding_galleries`
--

INSERT INTO `wedding_galleries` (`id`, `wedding_id`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'frontend/images/gallery/1.jpg', 1, '2024-10-16 08:44:15', '2024-10-16 08:44:15'),
(2, 1, 'frontend/images/gallery/9.jpg', 1, '2024-10-16 08:44:15', '2024-10-16 08:44:15'),
(3, 1, 'frontend/images/gallery/3.jpg', 1, '2024-10-16 08:44:15', '2024-10-16 08:44:15'),
(4, 1, 'frontend/images/gallery/4.jpg', 1, '2024-10-16 08:44:15', '2024-10-16 08:44:15'),
(5, 1, 'frontend/images/gallery/5.jpg', 1, '2024-10-16 08:44:15', '2024-10-16 08:44:15'),
(6, 1, 'frontend/images/gallery/6.jpg', 1, '2024-10-16 08:44:15', '2024-10-16 08:44:15'),
(7, 1, 'frontend/images/gallery/7.jpg', 1, '2024-10-16 08:44:15', '2024-10-16 08:44:15'),
(8, 1, 'frontend/images/gallery/8.jpg', 1, '2024-10-16 08:44:15', '2024-10-16 08:44:15'),
(9, 1, 'frontend/images/gallery/9.jpg', 1, '2024-10-16 08:44:15', '2024-10-16 08:44:15'),
(10, 1, 'frontend/images/couples/11.jpg', 1, '2024-10-16 08:44:15', '2024-10-16 08:44:15'),
(11, 2, 'frontend/images/gallery/1.jpg', 1, '2024-10-16 08:44:15', '2024-10-16 08:44:15'),
(12, 2, 'frontend/images/gallery/9.jpg', 1, '2024-10-16 08:44:15', '2024-11-25 21:58:32'),
(13, 2, 'frontend/images/gallery/3.jpg', 1, '2024-10-16 08:44:15', '2024-10-16 08:44:15'),
(14, 2, 'frontend/images/gallery/4.jpg', 1, '2024-10-16 08:44:15', '2024-10-16 08:44:15'),
(15, 2, 'frontend/images/gallery/5.jpg', 1, '2024-10-16 08:44:15', '2024-10-16 08:44:15'),
(16, 2, 'frontend/images/gallery/6.jpg', 1, '2024-10-16 08:44:15', '2024-10-16 08:44:15'),
(17, 2, 'frontend/images/gallery/7.jpg', 1, '2024-10-16 08:44:15', '2024-10-16 08:44:15'),
(18, 2, 'frontend/images/gallery/8.jpg', 1, '2024-10-16 08:44:15', '2024-10-16 08:44:15'),
(19, 2, 'frontend/images/gallery/9.jpg', 1, '2024-10-16 08:44:15', '2024-10-16 08:44:15'),
(20, 2, 'frontend/images/couples/11.jpg', 1, '2024-10-16 08:44:15', '2024-10-16 08:44:15');

-- --------------------------------------------------------

--
-- Table structure for table `wedding_steps`
--

CREATE TABLE `wedding_steps` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(200) NOT NULL,
  `time` varchar(50) DEFAULT NULL,
  `wedding_id` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wedding_steps`
--

INSERT INTO `wedding_steps` (`id`, `title`, `description`, `image`, `time`, `wedding_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Register', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.\r\n                                            Lorem Ipsum has been the industry\'s standard dummy text ever.', 'frontend/images/icon/rings.png', NULL, NULL, 1, '2024-10-15 09:50:32', '2024-10-15 09:50:32'),
(2, 'Find your Match', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.\r\n                                            Lorem Ipsum has been the industry\'s standard dummy text ever.', 'frontend/images/icon/wedding-2.png', NULL, NULL, 1, '2024-10-15 09:50:32', '2024-10-15 09:50:32'),
(3, 'Send Interest', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.\r\n                                            Lorem Ipsum has been the industry\'s standard dummy text ever.', 'frontend/images/icon/love-birds.png', NULL, NULL, 1, '2024-10-15 09:50:32', '2024-11-26 00:21:39'),
(4, 'Get Profile Information', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.\r\n                                            Lorem Ipsum has been the industry\'s standard dummy text ever.', 'frontend/images/icon/network.png', NULL, NULL, 1, '2024-10-15 09:50:32', '2024-10-15 09:50:32'),
(5, 'Start Meetups', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.\r\n                                            Lorem Ipsum has been the industry\'s standard dummy text ever.', 'frontend/images/icon/chat.png', NULL, NULL, 1, '2024-10-15 09:50:32', '2024-10-15 09:50:32'),
(6, 'Getting Marriage', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.\r\n                                            Lorem Ipsum has been the industry\'s standard dummy text ever.', 'frontend/images/icon/wedding-couple.png', NULL, NULL, 1, '2024-10-15 09:50:32', '2024-11-26 00:32:48');

-- --------------------------------------------------------

--
-- Table structure for table `wedding_stories`
--

CREATE TABLE `wedding_stories` (
  `id` int(11) NOT NULL,
  `wedding_id` int(11) NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `image` varchar(250) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wedding_stories`
--

INSERT INTO `wedding_stories` (`id`, `wedding_id`, `title`, `date`, `image`, `status`, `created_at`, `updated_at`) VALUES
(4, 1, 'The day we meet', '2024-07-22', 'frontend/images/couples/9.jpg', 1, '2024-10-16 08:33:52', '2024-10-16 08:33:52'),
(5, 1, 'The day we meet', '2024-06-03', 'frontend/images/couples/7.jpg', 1, '2024-10-16 08:33:52', '2024-10-16 08:33:52'),
(6, 1, 'The day we meet', '2024-08-15', 'frontend/images/couples/6.jpg', 1, '2024-10-16 08:33:52', '2024-10-16 08:33:52'),
(7, 2, 'The day we meet', '2024-07-22', 'frontend/images/couples/9.jpg', 1, '2024-10-16 08:33:52', '2024-10-16 08:33:52'),
(8, 2, 'The day we meet', '2024-06-03', 'frontend/images/couples/7.jpg', 1, '2024-10-16 08:33:52', '2024-10-16 08:33:52'),
(9, 2, 'The day we meet', '2024-08-15', 'frontend/images/couples/6.jpg', 1, '2024-10-16 08:33:52', '2024-10-16 08:33:52'),
(10, 5, 'Test story ed', '2024-10-28', 'uploads/wedding_stories/1732598649_5.jpg', 1, '2024-11-25 23:20:00', '2024-11-25 23:24:09'),
(11, 5, 'aaa', NULL, 'uploads/wedding_stories/1732598860_4.jpg', 1, '2024-11-25 23:27:40', '2024-11-25 23:36:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accesses`
--
ALTER TABLE `accesses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_tags`
--
ALTER TABLE `blog_tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactinfos`
--
ALTER TABLE `contactinfos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enquiries`
--
ALTER TABLE `enquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `general_settings`
--
ALTER TABLE `general_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hobbies`
--
ALTER TABLE `hobbies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invitations`
--
ALTER TABLE `invitations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `ourteams`
--
ALTER TABLE `ourteams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package_accesses`
--
ALTER TABLE `package_accesses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package_payments`
--
ALTER TABLE `package_payments`
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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `profile_clicks`
--
ALTER TABLE `profile_clicks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile_likes`
--
ALTER TABLE `profile_likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile_views`
--
ALTER TABLE `profile_views`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `push_subscriptions`
--
ALTER TABLE `push_subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `push_subscriptions_subscription_id_unique` (`subscription_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_careers`
--
ALTER TABLE `user_careers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_hobbies`
--
ALTER TABLE `user_hobbies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_images`
--
ALTER TABLE `user_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_packages`
--
ALTER TABLE `user_packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_preferences`
--
ALTER TABLE `user_preferences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_profiles`
--
ALTER TABLE `user_profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_socialmedia`
--
ALTER TABLE `user_socialmedia`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_verifications`
--
ALTER TABLE `user_verifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `weddings`
--
ALTER TABLE `weddings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wedding_galleries`
--
ALTER TABLE `wedding_galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wedding_steps`
--
ALTER TABLE `wedding_steps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wedding_stories`
--
ALTER TABLE `wedding_stories`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accesses`
--
ALTER TABLE `accesses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `blog_tags`
--
ALTER TABLE `blog_tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `contactinfos`
--
ALTER TABLE `contactinfos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `enquiries`
--
ALTER TABLE `enquiries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `general_settings`
--
ALTER TABLE `general_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hobbies`
--
ALTER TABLE `hobbies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `invitations`
--
ALTER TABLE `invitations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `ourteams`
--
ALTER TABLE `ourteams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `package_accesses`
--
ALTER TABLE `package_accesses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `package_payments`
--
ALTER TABLE `package_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profile_clicks`
--
ALTER TABLE `profile_clicks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `profile_likes`
--
ALTER TABLE `profile_likes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `profile_views`
--
ALTER TABLE `profile_views`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `push_subscriptions`
--
ALTER TABLE `push_subscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_careers`
--
ALTER TABLE `user_careers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_hobbies`
--
ALTER TABLE `user_hobbies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `user_images`
--
ALTER TABLE `user_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user_packages`
--
ALTER TABLE `user_packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_preferences`
--
ALTER TABLE `user_preferences`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_profiles`
--
ALTER TABLE `user_profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_socialmedia`
--
ALTER TABLE `user_socialmedia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_verifications`
--
ALTER TABLE `user_verifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `weddings`
--
ALTER TABLE `weddings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `wedding_galleries`
--
ALTER TABLE `wedding_galleries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `wedding_steps`
--
ALTER TABLE `wedding_steps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `wedding_stories`
--
ALTER TABLE `wedding_stories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
