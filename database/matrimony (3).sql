-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 29, 2024 at 09:05 AM
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
(3, 'send-message', '2024-10-29 05:52:49', '2024-10-29 05:52:51');

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
(1, 'frontend/images/ban-bg.jpg', 1, '2024-10-16 09:43:09', '2024-10-16 09:43:09'),
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
(4, 2, '6 Things You Need To Prepare For Your Wedding Day', '<h2>The Ultimate Wedding Planning Checklist</h2>\n                                    <p>It is a long established fact that a reader will be distracted by the readable\n                                        content of a page when looking at its layout. The point of using Lorem Ipsum is\n                                        that it has a more-or-less normal distribution of letters, as opposed to using\n                                        \'Content here, content here\', making it look like readable English. Many desktop\n                                        publishing packages and web page editors now use Lorem Ipsum as their default\n                                        model text, and a search for \'lorem ipsum\' will uncover many web sites still in\n                                        their infancy. Various versions have evolved over the years, sometimes by\n                                        accident, sometimes on purpose (injected humour and the like).</p>\n                                    <h3>Where does it come from?</h3>\n                                    <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots\n                                        in a piece of classical Latin literature from 45 BC, making it over 2000 years\n                                        old. Richard McClintock, a Latin professor at Hampden-Sydney College in\n                                        Virginia, looked up one of the more obscure Latin words, consectetur, from a\n                                        Lorem Ipsum passage, and going through the cites of the word in classical\n                                        literature, discovered the undoubtable source. Lorem Ipsum comes from sections\n                                        1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and\n                                        Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of\n                                        ethics, very popular during the Renaissance. The first line of Lorem Ipsum,\n                                        \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>\n                                    <p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for\n                                        those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et\n                                        Malorum\" by Cicero are also reproduced in their exact original form, accompanied\n                                        by English versions from the 1914 translation by H. Rackham.</p>\n                                    <h4>Why do we use it?</h4>\n                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem\n                                        Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an\n                                        unknown printer took a galley of type and scrambled it to make a type specimen\n                                        book. It has survived not only five centuries, but also the leap into electronic\n                                        typesetting, remaining essentially unchanged. It was popularised in the 1960s\n                                        with the release of Letraset sheets containing Lorem Ipsum passages, and more\n                                        recently with desktop publishing software like Aldus PageMaker including\n                                        versions of Lorem Ipsum.</p>\n                                    <h3>Where does it come from?</h3>\n                                    <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots\n                                        in a piece of classical Latin literature from 45 BC, making it over 2000 years\n                                        old. Richard McClintock, a Latin professor at Hampden-Sydney College in\n                                        Virginia, looked up one of the more obscure Latin words, consectetur, from a\n                                        Lorem Ipsum passage, and going through the cites of the word in classical\n                                        literature, discovered the undoubtable source. Lorem Ipsum comes from sections\n                                        1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and\n                                        Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of\n                                        ethics, very popular during the Renaissance. The first line of Lorem Ipsum,\n                                        \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>', 'frontend/images/couples/9.jpg', NULL, 'The remote island nation of Kiribati has gone into lockdown after passengers on the first international', 'frontend/images/user/2.jpg', 'Steefan Ann', '2024-01-13', 0, 1, 1, '2024-10-22 04:48:51', '2024-10-22 04:48:51');

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
(1, 'Wedding Planning', 'wedding-planning', 1, '2024-10-22 05:41:48', '2024-10-22 05:41:48'),
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
(7, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Dhaka', 1, '2024-10-20 04:59:14', '2024-10-20 04:59:14'),
(2, 'Chittagong', 1, '2024-10-20 04:59:14', '2024-10-20 04:59:14'),
(3, 'Rajshahi', 1, '2024-10-20 04:59:14', '2024-10-20 04:59:14'),
(4, 'Khulna', 1, '2024-10-20 04:59:14', '2024-10-20 04:59:14'),
(5, 'Barishal', 1, '2024-10-20 04:59:14', '2024-10-20 04:59:14'),
(6, 'Sylhet', 1, '2024-10-20 04:59:14', '2024-10-20 04:59:14'),
(7, 'Mymensingh', 1, '2024-10-20 04:59:14', '2024-10-20 04:59:14'),
(8, 'Rangpur', 1, '2024-10-20 04:59:14', '2024-10-20 04:59:14');

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
(1, 'Bibaha.com', 'Most Trusted and premium Matrimony Service in the World.', '+8801678337722', '#', 'messageappsis@gmail.com', 'SIS Media, Level # 9, Suite # 10-A, Razzak Plaza, 383 Boro Moghbazar, Dhaka, Bangladesh', 1, '2024-10-16 04:53:54', '2024-10-16 04:53:54');

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
(1, 'BIBAHA.COM', 'Best Wedding Matrimony lacinia viverra lectus. Fusce imperdiet ullamcorper metus eu fringilla.Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'frontend/images/logoo.png', 'frontend/images/fav.ico', 1, '2024-10-16 05:12:35', '2024-10-16 05:12:35');

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
(1, 'Modelling', 1, '', '2024-10-17 11:59:02'),
(2, 'Watching', 1, '', '2024-10-17 11:59:02'),
(3, 'Movies', 1, '', '2024-10-17 11:59:02'),
(4, 'Playing', 1, '', '2024-10-17 11:59:02'),
(5, 'Volleyball', 1, '', '2024-10-17 11:59:02'),
(6, 'Hangout with family', 1, '', '2024-10-17 11:59:02'),
(7, 'Adventure travel', 1, '', '2024-10-17 11:59:02'),
(8, 'Books reading', 1, '', '2024-10-17 11:59:02'),
(9, 'Music', 1, '', '2024-10-17 11:59:02'),
(10, 'Cooking', 1, '', '2024-10-17 11:59:02'),
(11, 'Yoga', 1, '', '2024-10-17 11:59:55');

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
(39, 2, 1, 1, '2024-10-24 05:08:38', '2024-10-24 05:08:45');

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
(19, 2, 1, 'Hii', NULL, 0, 1, '2024-10-28 03:01:49', '2024-10-28 03:44:57'),
(20, 1, 5, 'Arreee Siam Bhaaaaaii', NULL, 0, 1, '2024-10-28 03:02:50', '2024-10-28 03:02:50');

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
(33, '2024_10_29_055736_create_user_packages_table', 7);

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
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ourteams`
--

INSERT INTO `ourteams` (`id`, `title`, `designation`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Ashley Jen', 'Marketing Manager', 'frontend/images/profiles/6.jpg', 1, '2024-10-15 10:17:27', '2024-10-15 10:17:27'),
(2, 'Ashley Jen', 'Marketing Manager', 'frontend/images/profiles/7.jpg', 1, '2024-10-15 10:17:27', '2024-10-15 10:17:27'),
(3, 'Emily Arrov', 'Creative Manager', 'frontend/images/profiles/8.jpg', 1, '2024-10-15 10:18:03', '2024-10-15 10:18:03'),
(4, 'Julia sear', 'Client Coordinator', 'frontend/images/profiles/9.jpg', 1, '2024-10-15 10:18:03', '2024-10-15 10:18:03');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
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

INSERT INTO `packages` (`id`, `name`, `price`, `duration`, `details`, `popular`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Free', 0, 200, '<ol>\r\n                                    <li><i class=\"fa fa-close close\" aria-hidden=\"true\"></i> 5 Premium Profiles view /mo\r\n                                    </li>\r\n                                    <li><i class=\"fa fa-check\" aria-hidden=\"true\"></i>Free user profile can view</li>\r\n                                    <li><i class=\"fa fa-close close\" aria-hidden=\"true\"></i>View contact details</li>\r\n                                    <li><i class=\"fa fa-close close\" aria-hidden=\"true\"></i>Send interest</li>\r\n                                    <li><i class=\"fa fa-close close\" aria-hidden=\"true\"></i>Start Chat</li>\r\n                                </ol>', 0, 1, NULL, NULL),
(2, 'Gold', 349, 30, '<ol>\r\n                                    <li><i class=\"fa fa-check\" aria-hidden=\"true\"></i> 20 Premium Profiles view /mo</li>\r\n                                    <li><i class=\"fa fa-check\" aria-hidden=\"true\"></i>Free user profile can view</li>\r\n                                    <li><i class=\"fa fa-check\" aria-hidden=\"true\"></i>View contact details</li>\r\n                                    <li><i class=\"fa fa-check\" aria-hidden=\"true\"></i>Send interest</li>\r\n                                    <li><i class=\"fa fa-check\" aria-hidden=\"true\"></i>Start Chat</li>\r\n                                </ol>', 1, 1, NULL, NULL),
(3, 'Platinum', 549, 90, '<ol>\r\n                                    <li><i class=\"fa fa-check\" aria-hidden=\"true\"></i> 50 Premium Profiles view /mo</li>\r\n                                    <li><i class=\"fa fa-check\" aria-hidden=\"true\"></i>Free user profile can view</li>\r\n                                    <li><i class=\"fa fa-check\" aria-hidden=\"true\"></i>View contact details</li>\r\n                                    <li><i class=\"fa fa-check\" aria-hidden=\"true\"></i>Send interest</li>\r\n                                    <li><i class=\"fa fa-check\" aria-hidden=\"true\"></i>Start Chat</li>\r\n                                </ol>', 0, 1, NULL, NULL);

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
(6, 3, 3, '2024-10-29 05:53:45', '2024-10-29 05:53:45');

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
(5, 'Jack danial', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem\r\n                                        Ipsum has been the industry\'s standard dummy text ever since the 1500s', 'frontend/images/user/5.jpg', 'New york', 1, '2024-10-15 09:19:15', '2024-10-15 09:19:15');

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
  `password` varchar(250) NOT NULL,
  `remember_token` varchar(200) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `slug`, `email`, `phone`, `password`, `remember_token`, `status`, `created_at`, `updated_at`) VALUES
(1, 'ALif', 'alif', 'alif@gmail.com', '01770900478', '$2y$10$swFxnKOV9jurnx/y49SN/e3P.GC5lsvpF3fTLC3abUO8/vCVlpQua', 'pMmsMX5dvrkGuAIR7R3SLcgKK78CqoRZRnDRGYfv5mrE64ppPOXWMRclWjR3', 1, '2024-10-17 04:04:03', '2024-10-17 04:04:03'),
(2, 'Spider Man', 'spider-man', 'spiderman@gmail.com', '01456325874', '$2y$10$9mMXSdWEcPeC2eDPlSRJHe6DicyCoR67Yi44T6OaaGYzF7I80N89e', NULL, 1, '2024-10-20 02:49:40', '2024-10-20 02:49:40'),
(3, 'Siam Khan', 'siam-khan', 'siam@gmail.com', '01571767287', '$2y$10$7k6xxvLjy2b2PRRZgMSHvuWHhgyo3wJO06oHAFnydyyHPNlzIaTqO', NULL, 1, '2024-10-20 23:56:36', '2024-10-20 23:56:36'),
(4, 'Amin Mahmud Sayef', 'amin-mahmud-sayef', 'saifmahmud727@gmail.com', '01955249001', '$2y$10$ojVllyPrPvrpaWCjEDIdWeweRmwQkZXTdxXltMnRCjvS..OReV1PK', NULL, 1, '2024-10-28 02:19:19', '2024-10-28 02:19:19'),
(5, 'MD Siam Ahmed', 'md-siam-ahmed', 'siam123@gmail.com', '01768553823', '$2y$10$ayPIKfbNhyPYTwN9aBveP.lmOLfpm2jijIoBVZTXLxHytlTP.aeeO', NULL, 1, '2024-10-28 02:41:17', '2024-10-28 02:41:17');

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
(1, 1, 2, 'Employee', 'AIUB', '5000 USD', '2 Years', 'BSc. in Computer Science & Engineering', 'Collectorate School and College, Rangpur', 'Haragach M/L High School', 1, '2024-10-19 23:50:54', '2024-10-21 01:40:35'),
(2, 2, 3, 'Jobless', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-10-20 03:02:32', '2024-10-20 03:02:32'),
(3, 5, 4, 'Jobless', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-10-28 02:48:37', '2024-10-28 02:48:37');

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
(40, 1, 2, 8, 1, '2024-10-22 03:46:28', '2024-10-22 03:46:28'),
(41, 1, 2, 1, 1, '2024-10-22 03:46:28', '2024-10-22 03:46:28');

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
(1, 1, 2, NULL, '2024-11-29', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_profiles`
--

CREATE TABLE `user_profiles` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `image` varchar(200) DEFAULT NULL,
  `gender` varchar(10) NOT NULL,
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

INSERT INTO `user_profiles` (`id`, `user_id`, `image`, `gender`, `city_id`, `birth_date`, `age`, `height`, `weight`, `fathers_name`, `mothers_name`, `address`, `status`, `created_at`, `updated_at`) VALUES
(2, 1, 'frontend/uploads/profile/1729590388_men1.jpg', 'Male', 8, '1997-01-27', 27, '170', '70', 'Alta', 'Branson Bartell', 'Khilkhet, Dhaka', 1, '2024-10-19 23:33:10', '2024-10-22 03:46:28'),
(3, 2, 'frontend/images/profiles/12.jpg', 'Male', 2, '1999-10-22', 24, '170', '70', 'Alvah', 'Kassandra Russel', 'Khilkhet, Dhaka', 1, '2024-10-20 03:02:31', '2024-10-20 03:02:31'),
(4, 5, 'frontend/uploads/profile/1730105502_b4eab1bb-bded-4dec-b046-d39a5d31ec4f.jpg', 'Male', 5, '1990-02-28', 34, '170', '54', 'Alvah', 'Kassandra Russel', 'sdf', 1, '2024-10-28 02:48:36', '2024-10-28 02:51:42');

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
(5, 1, 2, '#', '#', NULL, NULL, NULL, NULL, 1, '2024-10-20 00:39:13', '2024-10-20 01:18:07'),
(6, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-10-20 03:02:33', '2024-10-20 03:02:33'),
(7, 5, 4, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-10-28 02:48:37', '2024-10-28 02:48:37');

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
  `thumbnail` varchar(200) DEFAULT NULL,
  `video` text,
  `image1` varchar(250) DEFAULT NULL,
  `image2` varchar(250) DEFAULT NULL,
  `image3` varchar(250) DEFAULT NULL,
  `date` date NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `video_based` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `weddings`
--

INSERT INTO `weddings` (`id`, `couple_name`, `couple_image`, `description`, `location`, `thumbnail`, `video`, `image1`, `image2`, `image3`, `date`, `status`, `created_at`, `updated_at`, `video_based`) VALUES
(1, 'Dany & July', 'frontend/images/couples/7.jpg', 'Lakhs of peoples have found their life partner at Wedding Matrimony!', 'New York', 'frontend/images/couples/20.jpg', '<iframe src=\"https://www.youtube.com/embed/P9iKATG9BW4\" title=\"Wedding marriage: Wedding marriage\"\r\n                                allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\"\r\n                                allowfullscreen></iframe>', NULL, NULL, NULL, '2024-10-06', 1, '2024-10-16 06:08:27', '2024-10-16 06:08:27', 1),
(2, 'Michael & Jessica', 'frontend/images/couples/6.jpg', 'Lakhs of peoples have found their life partner at Wedding Matrimony!', 'New York', NULL, NULL, 'frontend/images/couples/1.jpg', 'frontend/images/couples/5.jpg', 'frontend/images/couples/9.jpg', '2024-08-19', 1, '2024-10-16 06:41:36', '2024-10-16 06:41:36', 0);

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
(12, 2, 'frontend/images/gallery/9.jpg', 1, '2024-10-16 08:44:15', '2024-10-16 08:44:15'),
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
(3, 'Send Interest', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.\r\n                                            Lorem Ipsum has been the industry\'s standard dummy text ever.', 'frontend/images/icon/love-birds.png', NULL, NULL, 1, '2024-10-15 09:50:32', '2024-10-15 09:50:32'),
(4, 'Get Profile Information', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.\r\n                                            Lorem Ipsum has been the industry\'s standard dummy text ever.', 'frontend/images/icon/network.png', NULL, NULL, 1, '2024-10-15 09:50:32', '2024-10-15 09:50:32'),
(5, 'Start Meetups', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.\r\n                                            Lorem Ipsum has been the industry\'s standard dummy text ever.', 'frontend/images/icon/chat.png', NULL, NULL, 1, '2024-10-15 09:50:32', '2024-10-15 09:50:32'),
(6, 'Getting Marriage', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.\r\n                                            Lorem Ipsum has been the industry\'s standard dummy text ever.', 'frontend/images/icon/wedding-couple.png', NULL, NULL, 1, '2024-10-15 09:50:32', '2024-10-15 09:50:32');

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
(9, 2, 'The day we meet', '2024-08-15', 'frontend/images/couples/6.jpg', 1, '2024-10-16 08:33:52', '2024-10-16 08:33:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accesses`
--
ALTER TABLE `accesses`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `blog_tags`
--
ALTER TABLE `blog_tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_careers`
--
ALTER TABLE `user_careers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_hobbies`
--
ALTER TABLE `user_hobbies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `user_images`
--
ALTER TABLE `user_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user_packages`
--
ALTER TABLE `user_packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_profiles`
--
ALTER TABLE `user_profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_socialmedia`
--
ALTER TABLE `user_socialmedia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `weddings`
--
ALTER TABLE `weddings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
