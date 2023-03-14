-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2023 at 01:58 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog_machine_minar`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$KUKwWKxOW27Df5qs2.B8nOt0R40n2DqRHDliouyXd/o.LYkAZPPrW', NULL, '2023-03-10 04:31:07', '2023-03-10 04:31:07'),
(2, 'admin2', 'admin2@gmail.com', NULL, '$2y$10$HxEoWaF0z6ZtSmrPr2Lg6.uPXVgq3CmaxfhRI1JLdNjpXWUyOXgjq', NULL, '2023-03-10 05:03:15', '2023-03-10 05:03:15');

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '191',
  `meta_keyword` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `custom_date` date NOT NULL,
  `author_id` int(11) NOT NULL,
  `is_featured` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_premium` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tags` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `read_minutes` int(11) NOT NULL,
  `references` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `co_authors` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `secondary_categories` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hits` bigint(20) DEFAULT NULL,
  `smily_yes` int(11) DEFAULT NULL,
  `smily_no` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `category_id`, `slug`, `meta_keyword`, `meta_description`, `page_title`, `thumbnail`, `custom_date`, `author_id`, `is_featured`, `is_premium`, `tags`, `read_minutes`, `references`, `co_authors`, `secondary_categories`, `hits`, `smily_yes`, `smily_no`, `created_at`, `updated_at`) VALUES
(2, 'First Article', '3', 'first-article', 'First keyword, Second keyword, Third keyword', 'Various versions have evolved over the years, sometimes by accident, sometimes on purpose injected humour and the like.', 'Men\'s Fashion', '1678683713.png', '2023-03-13', 2, '1', '0', 'First tag, Second tag, Third tag', 10, 'https://www.lipsum.com/', '[\"3\",\"4\"]', '[\"3\"]', NULL, NULL, NULL, '2023-03-12 23:01:53', '2023-03-12 23:01:53');

-- --------------------------------------------------------

--
-- Table structure for table `article_contents`
--

CREATE TABLE `article_contents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `article_id` bigint(20) NOT NULL,
  `content_subtitle` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_type` enum('text','quote','image','subheadline','intro','list-content','left-text-video','right-text-video') COLLATE utf8mb4_unicode_ci NOT NULL,
  `layout` enum('full_width','left','right','center') COLLATE utf8mb4_unicode_ci NOT NULL,
  `layout_width` smallint(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `article_contents`
--

INSERT INTO `article_contents` (`id`, `article_id`, `content_subtitle`, `content_type`, `layout`, `layout_width`, `created_at`, `updated_at`) VALUES
(4, 2, 'First content sub title', 'text', 'full_width', 12, '2023-03-13 00:26:40', '2023-03-13 00:26:40'),
(5, 2, 'Second content title', 'quote', 'full_width', 12, '2023-03-13 03:18:57', '2023-03-13 03:18:57'),
(6, 2, 'Third content title', 'image', 'left', 6, '2023-03-13 05:19:29', '2023-03-13 05:19:29'),
(7, 2, 'Content fourth title', 'image', 'right', 6, '2023-03-13 23:21:56', '2023-03-13 23:21:56'),
(8, 2, 'Fifth Content title', 'subheadline', 'full_width', 12, '2023-03-13 23:23:04', '2023-03-13 23:23:04'),
(9, 2, 'Six sub content title', 'list-content', 'full_width', 12, '2023-03-14 00:18:44', '2023-03-14 00:18:44'),
(10, 2, 'Seventh content sub title', 'left-text-video', 'full_width', 12, '2023-03-14 05:02:52', '2023-03-14 05:02:52'),
(11, 2, 'Eight content title', 'right-text-video', 'full_width', 12, '2023-03-14 06:15:11', '2023-03-14 06:15:11');

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `author_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `author_name`, `created_at`, `updated_at`) VALUES
(2, 'First Author', '2023-03-12 04:25:00', '2023-03-12 04:25:00'),
(3, 'Second Author', '2023-03-12 04:25:22', '2023-03-12 04:25:22'),
(4, 'Third Author', '2023-03-12 04:25:36', '2023-03-12 04:25:36');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cat_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '191',
  `meta_keyword` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumbnail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured_image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cat_name`, `parent_id`, `slug`, `meta_keyword`, `meta_description`, `page_title`, `thumbnail`, `featured_image`, `created_at`, `updated_at`) VALUES
(3, 'Fashion', 1, 'fashion', 'fashion', 'oasdfkjasiod', 'Men\'s Fashion', '1678603445.png', '1678603445.png', '2023-03-12 00:44:05', '2023-03-12 00:44:05');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `article_id` bigint(20) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `comment` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('pending','approved','rejected') COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('first','reply') COLLATE utf8mb4_unicode_ci NOT NULL,
  `reply_comment_id` bigint(20) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hit_counters`
--

CREATE TABLE `hit_counters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `article_id` bigint(20) NOT NULL,
  `ip_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `staying_time` smallint(6) DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `image_contents`
--

CREATE TABLE `image_contents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `article_id` bigint(20) NOT NULL,
  `article_content_id` bigint(20) NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `image_contents`
--

INSERT INTO `image_contents` (`id`, `article_id`, `article_content_id`, `image`, `created_at`, `updated_at`) VALUES
(3, 2, 6, '1678770804.jpg', '2023-03-13 23:13:24', '2023-03-13 23:13:24'),
(4, 2, 7, '1678771336.jpg', '2023-03-13 23:22:16', '2023-03-13 23:22:16');

-- --------------------------------------------------------

--
-- Table structure for table `left_text_videos`
--

CREATE TABLE `left_text_videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `article_id` int(11) NOT NULL,
  `article_content_id` bigint(20) NOT NULL,
  `content_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_text` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `left_text_videos`
--

INSERT INTO `left_text_videos` (`id`, `article_id`, `article_content_id`, `content_title`, `content_text`, `video_url`, `created_at`, `updated_at`) VALUES
(3, 2, 10, 'IELTS Speaking Test Part 1 Solution', 'Content text', 'https://www.youtube.com/embed/YgbIC4ovBsk', '2023-03-14 06:06:26', '2023-03-14 06:06:26');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_11_07_060438_create_categories_table', 1),
(6, '2022_11_07_061341_create_articles_table', 1),
(7, '2022_11_07_062543_create_article_contents_table', 1),
(8, '2022_11_07_064501_create_text_contents_table', 1),
(9, '2022_11_07_065209_create_image_contents_table', 1),
(10, '2022_11_07_065649_create_video_contents_table', 1),
(11, '2022_11_07_070330_create_comments_table', 1),
(12, '2022_11_07_071523_create_ratings_table', 1),
(13, '2022_11_07_072320_create_hit_counters_table', 1),
(14, '2022_11_07_072812_create_quizzes_table', 1),
(15, '2022_11_07_084512_create_quiz_passages_table', 1),
(16, '2022_11_07_084802_create_quiz_questions_table', 1),
(17, '2022_11_16_045132_create_modules_table', 1),
(18, '2022_11_24_105544_create_right_text_videos_table', 2),
(19, '2022_11_24_110002_create_left_text_videos_table', 2),
(21, '2022_12_23_123552_create_social_settings_table', 2),
(22, '2022_12_23_123641_create_widget_settings_table', 3),
(23, '2023_03_10_100903_create_admins_table', 4),
(24, '2023_03_12_094726_create_authors_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '191',
  `meta_keyword` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quizzes`
--

CREATE TABLE `quizzes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `article_id` bigint(20) NOT NULL DEFAULT 0,
  `quiz_type` enum('reading','listening','general') COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quiz_passages`
--

CREATE TABLE `quiz_passages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quiz_id` bigint(20) NOT NULL DEFAULT 0,
  `title` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quiz_questions`
--

CREATE TABLE `quiz_questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quiz_id` bigint(20) NOT NULL,
  `question` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `question_type` enum('multipe_choice','True_false','True_false_not_given','fill_blank','drop_down','radio','re_order','drag_to_fill','drag_drop') COLLATE utf8mb4_unicode_ci NOT NULL,
  `marks` smallint(6) NOT NULL,
  `time_limit` smallint(6) NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `article_id` bigint(20) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `rating` smallint(6) NOT NULL,
  `status` enum('pending','approved','rejected') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `right_text_videos`
--

CREATE TABLE `right_text_videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `article_id` int(11) NOT NULL,
  `article_content_id` bigint(20) NOT NULL,
  `content_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_text` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `right_text_videos`
--

INSERT INTO `right_text_videos` (`id`, `article_id`, `article_content_id`, `content_title`, `content_text`, `video_url`, `created_at`, `updated_at`) VALUES
(3, 2, 11, 'IELTS Band 9 Speaking | Cambridge IELTS Speaking Test', 'COntent test 2', 'https://www.youtube.com/embed/IB9r7HduK00', '2023-03-14 06:53:54', '2023-03-14 06:53:54');

-- --------------------------------------------------------

--
-- Table structure for table `rolled_users`
--

CREATE TABLE `rolled_users` (
  `user_id` bigint(20) DEFAULT 1,
  `role_name` varchar(255) NOT NULL,
  `role_privilleges` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rolled_users`
--

INSERT INTO `rolled_users` (`user_id`, `role_name`, `role_privilleges`, `created_at`) VALUES
(1, 'admin', 'nothing', '2023-03-10 05:41:59');

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

CREATE TABLE `site_settings` (
  `logo_file` varchar(255) NOT NULL,
  `homepage_title` varchar(255) NOT NULL DEFAULT 'Home page Title',
  `homepage_description` varchar(255) NOT NULL DEFAULT 'Home page description',
  `site_email` varchar(255) NOT NULL DEFAULT 'tariq.barc@gmail.com',
  `featured_post_count` smallint(6) NOT NULL,
  `pagination_post_count` smallint(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `social_settings`
--

CREATE TABLE `social_settings` (
  `social_icon` varchar(255) NOT NULL,
  `social_name` varchar(255) NOT NULL,
  `social_url` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `text_contents`
--

CREATE TABLE `text_contents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `article_id` bigint(20) NOT NULL,
  `article_content_id` bigint(20) NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `font` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `font_size` smallint(6) DEFAULT NULL,
  `content_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `text_contents`
--

INSERT INTO `text_contents` (`id`, `article_id`, `article_content_id`, `content`, `font`, `font_size`, `content_type`, `created_at`, `updated_at`) VALUES
(3, 2, 4, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque pulvinar ante sem, in tincidunt nisi lobortis eget. Aenean felis tellus, vulputate ac lectus sit amet, luctus euismod eros. Vivamus semper pulvinar sagittis. Ut eget metus in est lobortis pharetra ut sed tortor. Aliquam non tortor fermentum, congue orci non, vulputate nibh. Vestibulum sagittis mollis massa, vel varius velit ultrices sit amet. Vivamus feugiat volutpat enim. Maecenas ullamcorper nibh in lorem efficitur tincidunt. Pellentesque egestas iaculis pulvinar.</p>', 'sans-serif', 14, 'text', '2023-03-13 03:17:02', '2023-03-13 04:09:53'),
(4, 2, 5, '<p>&#39;&#39;Suspendisse varius odio ac tellus ultricies placerat. Donec aliquet aliquet lorem ac imperdiet. Interdum et malesuada fames ac ante ipsum primis in faucibus. Cras faucibus, metus in euismod venenatis, nisi magna consequat justo, nec commodo nibh nibh eget leo. Pellentesque tincidunt porttitor rutrum.&#39;&#39;</p>', NULL, NULL, 'quote', '2023-03-13 03:57:51', '2023-03-13 03:57:51'),
(5, 2, 8, '<p>In the first step, we will download a new simple copy source code of Laravel App project</p>', 'Roboto', 25, 'subheadline', '2023-03-14 00:05:16', '2023-03-14 00:05:42'),
(6, 2, 9, '[\"The feedback provided by a system is not very informative. It\\u2019s not clear how a system request or what exactly happens with the information.\",\"The feedback provided by a system is not very informative. It\\u2019s not clear how a system request or what exactly happens with the information.\",\"Notun add kora hoiche\"]', 'san', 20, 'list-content', '2023-03-14 01:04:43', '2023-03-14 03:54:45');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `avatar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` smallint(6) NOT NULL DEFAULT 2,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `avatar`, `role_id`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'user', 'user@gmail.com', NULL, '1668753072.png', 1, '$2y$10$u4AgdhvNxARatwyAoKkFHeyL/TL3U5kbjsyKiIyxaoE9f.GcG3k2.', NULL, '2022-11-18 00:31:12', '2022-11-18 00:31:12'),
(2, 'Minar', 'minar@gmail.com', NULL, NULL, 2, '$2y$10$iA7l48ZwaSkF9SM2GyguKeErPth7Qtf/SOGZJJ3eJYGiYHNyE4iU6', NULL, '2023-03-10 05:03:43', '2023-03-10 05:03:43');

-- --------------------------------------------------------

--
-- Table structure for table `video_contents`
--

CREATE TABLE `video_contents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `article_id` bigint(20) NOT NULL,
  `article_content_id` bigint(20) NOT NULL,
  `video_url` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `video_contents`
--

INSERT INTO `video_contents` (`id`, `article_id`, `article_content_id`, `video_url`, `video_title`, `created_at`, `updated_at`) VALUES
(1, 0, 1, 'hello.png', 'hello', '2022-11-24 10:22:31', '2022-11-24 10:22:31');

-- --------------------------------------------------------

--
-- Table structure for table `widget_settings`
--

CREATE TABLE `widget_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `widget_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `widget_code` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort_order` smallint(6) DEFAULT 0,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `type` enum('default','custom') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'custom',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `article_contents`
--
ALTER TABLE `article_contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `hit_counters`
--
ALTER TABLE `hit_counters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image_contents`
--
ALTER TABLE `image_contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `left_text_videos`
--
ALTER TABLE `left_text_videos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_passages`
--
ALTER TABLE `quiz_passages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_questions`
--
ALTER TABLE `quiz_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ratings_user_id_foreign` (`user_id`);

--
-- Indexes for table `right_text_videos`
--
ALTER TABLE `right_text_videos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `text_contents`
--
ALTER TABLE `text_contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `video_contents`
--
ALTER TABLE `video_contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `widget_settings`
--
ALTER TABLE `widget_settings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `article_contents`
--
ALTER TABLE `article_contents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hit_counters`
--
ALTER TABLE `hit_counters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `image_contents`
--
ALTER TABLE `image_contents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `left_text_videos`
--
ALTER TABLE `left_text_videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quiz_passages`
--
ALTER TABLE `quiz_passages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quiz_questions`
--
ALTER TABLE `quiz_questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `right_text_videos`
--
ALTER TABLE `right_text_videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `text_contents`
--
ALTER TABLE `text_contents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `video_contents`
--
ALTER TABLE `video_contents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `widget_settings`
--
ALTER TABLE `widget_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
