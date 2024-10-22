-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 22, 2024 at 09:56 AM
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
(1, 'ALif', 'alif', 'alif@gmail.com', '01770900478', '$2y$10$swFxnKOV9jurnx/y49SN/e3P.GC5lsvpF3fTLC3abUO8/vCVlpQua', 'EhEJSs6pcusW8vQttBORA4WNX31FsxCIfTLasWtwrRqxA8rDNueDc1VIlLg0', 1, '2024-10-17 04:04:03', '2024-10-17 04:04:03'),
(2, 'Spider Man', 'spider-man', 'spiderman@gmail.com', '01456325874', '$2y$10$9mMXSdWEcPeC2eDPlSRJHe6DicyCoR67Yi44T6OaaGYzF7I80N89e', NULL, 1, '2024-10-20 02:49:40', '2024-10-20 02:49:40'),
(3, 'Siam Khan', 'siam-khan', 'siam@gmail.com', '01571767287', '$2y$10$7k6xxvLjy2b2PRRZgMSHvuWHhgyo3wJO06oHAFnydyyHPNlzIaTqO', NULL, 1, '2024-10-20 23:56:36', '2024-10-20 23:56:36');

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
(2, 2, 3, 'Jobless', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-10-20 03:02:32', '2024-10-20 03:02:32');

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
(3, 2, 'frontend/images/profiles/12.jpg', 'Male', 2, '1999-10-22', 24, '170', '70', 'Alvah', 'Kassandra Russel', 'Khilkhet, Dhaka', 1, '2024-10-20 03:02:31', '2024-10-20 03:02:31');

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
(6, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-10-20 03:02:33', '2024-10-20 03:02:33');

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
-- Indexes for table `ourteams`
--
ALTER TABLE `ourteams`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `ourteams`
--
ALTER TABLE `ourteams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_careers`
--
ALTER TABLE `user_careers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_hobbies`
--
ALTER TABLE `user_hobbies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `user_images`
--
ALTER TABLE `user_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user_profiles`
--
ALTER TABLE `user_profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_socialmedia`
--
ALTER TABLE `user_socialmedia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
