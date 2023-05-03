-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2023 at 10:39 AM
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
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$10$KUKwWKxOW27Df5qs2.B8nOt0R40n2DqRHDliouyXd/o.LYkAZPPrW', NULL, '2023-03-10 04:31:07', '2023-03-10 04:31:07'),
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
  `is_trending` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
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

INSERT INTO `articles` (`id`, `title`, `category_id`, `slug`, `meta_keyword`, `meta_description`, `page_title`, `thumbnail`, `custom_date`, `author_id`, `is_featured`, `is_trending`, `tags`, `read_minutes`, `references`, `co_authors`, `secondary_categories`, `hits`, `smily_yes`, `smily_no`, `created_at`, `updated_at`) VALUES
(6, 'IELTS Online Mock Test', '5', 'ielts-online-mock-test', 'IELTS Online Mock Test, Online Mock Test, Mock Test', 'IELTS preparation can be challenging, but there are several online resources available that can help individuals prepare for the exam, including free online mock tests that use a computer-based system.', 'Take your IELTS preparation to the next level with our IELTS Online Mock Test', '1681812923.webp', '2023-04-11', 5, '1', '1', '2', 20, NULL, 'null', 'null', NULL, NULL, NULL, '2023-04-11 04:21:38', '2023-04-18 04:15:23'),
(7, 'IELTS Listening Guide', '4', 'ielts-listening-guide', 'IELTS listening test, Listening test', 'Struggling with the IELTS Listening Test as a non-native speaker? You\'re not alone! As a non-native speaker myself, I understand that the IELTS Listening test can be a daunting experience for us.', 'Listen Up! A Comprehensive Guide to Preparing for the IELTS Listening Test', '1682835208.webp', '2023-04-27', 8, '1', '1', '3', 15, NULL, 'null', 'null', NULL, NULL, NULL, '2023-04-27 00:13:15', '2023-04-30 00:13:29'),
(8, 'Multiple-choice mayhem: IELTS listening test', '4', 'multiple-choice-mayhem-ielts-listening-test', 'Multiple-choice mayhem, IELTS listening test, Listening test', 'Struggling to Crack MCQs in IELTS Listening test? Make Mistakes No More! To nail the MCQ section, first, you need to select the right plan of action. And to do that you have to develop experience through taking practice tests', 'Mastering the Multiple-choice mayhem: IELTS listening test', '1682851873.webp', '2023-04-27', 8, '1', '1', '3', 15, NULL, 'null', 'null', NULL, NULL, NULL, '2023-04-27 03:01:02', '2023-04-30 04:51:13'),
(9, 'Completion Questions', '4', 'completion-questions', 'Form Completion Questions, Sentence Completion', 'Form completion questions are a type of question commonly found in the IELTS Listening test. In this type of question, you will be given an incomplete form, such as a registration form, application form, or survey form, and you will be asked to complete the missing information by listening to a recording.', 'What are form completion questions?', '1682852411.webp', '2023-04-28', 8, '1', '1', '3', 15, NULL, 'null', 'null', NULL, NULL, NULL, '2023-04-27 23:13:00', '2023-04-30 05:00:12'),
(10, 'Cracking the IELTS Reading Code', '9', 'cracking-the-ielts-reading-code', 'Insider Tips, Strategies, Reading Code', 'Ready to conquer the IELTS reading test and show off your English proficiency? Look no further! This blog post is your ultimate guide to acing the test and achieving your dream scores. Whether you\'re a non-native speaker or simply looking to improve your reading skills, these valuable tips and strategies will help you succeed.', 'Cracking the IELTS Reading Code: Insider Tips and Strategies for a High Score', '1682848200.webp', '2023-04-28', 8, '1', '1', '4', 20, NULL, 'null', 'null', NULL, NULL, NULL, '2023-04-27 23:51:31', '2023-04-30 03:50:00');

-- --------------------------------------------------------

--
-- Table structure for table `article_contents`
--

CREATE TABLE `article_contents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `article_id` bigint(20) NOT NULL,
  `content_subtitle` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_type` enum('text','quote','image','subheadline','list-content','left-text-video','right-text-video','video-content','audio-content') COLLATE utf8mb4_unicode_ci NOT NULL,
  `layout` enum('full_width','left','right','center') COLLATE utf8mb4_unicode_ci NOT NULL,
  `layout_width` smallint(6) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `article_contents`
--

INSERT INTO `article_contents` (`id`, `article_id`, `content_subtitle`, `content_type`, `layout`, `layout_width`, `created_at`, `updated_at`) VALUES
(27, 6, 'text', 'text', 'full_width', 12, '2023-04-18 04:19:28', '2023-04-18 04:19:28'),
(28, 6, 'subheadline', 'subheadline', 'full_width', 12, '2023-04-18 04:22:39', '2023-04-18 04:22:39'),
(29, 6, 'text', 'text', 'full_width', 12, '2023-04-18 04:35:28', '2023-04-18 04:35:28'),
(30, 6, 'subheadline', 'subheadline', 'full_width', 12, '2023-04-18 04:37:03', '2023-04-18 04:37:03'),
(31, 6, 'image', 'image', 'full_width', 12, '2023-04-18 04:38:04', '2023-04-18 04:38:04'),
(32, 6, 'text', 'text', 'full_width', 12, '2023-04-18 04:48:13', '2023-04-18 04:49:56'),
(33, 6, 'list-content', 'list-content', 'full_width', 12, '2023-04-18 04:50:19', '2023-04-18 04:50:19'),
(34, 6, 'text', 'text', 'full_width', 12, '2023-04-18 04:52:34', '2023-04-18 04:52:34'),
(35, 6, 'subheadline', 'subheadline', 'full_width', 12, '2023-04-18 04:55:21', '2023-04-18 04:55:21'),
(38, 6, 'image', 'image', 'full_width', 12, '2023-04-18 05:00:23', '2023-04-18 05:00:23'),
(39, 6, 'text', 'text', 'full_width', 12, '2023-04-18 05:00:55', '2023-04-18 05:00:55'),
(40, 6, 'subheadline', 'subheadline', 'full_width', 12, '2023-04-18 05:02:07', '2023-04-18 05:02:07'),
(41, 6, 'image', 'image', 'full_width', 12, '2023-04-18 05:02:49', '2023-04-18 05:02:49'),
(42, 6, 'text', 'text', 'full_width', 12, '2023-04-18 05:03:54', '2023-04-18 05:03:54'),
(43, 6, 'subheadline', 'subheadline', 'full_width', 12, '2023-04-18 05:06:39', '2023-04-18 05:06:39'),
(44, 6, 'image', 'image', 'full_width', 12, '2023-04-18 05:07:06', '2023-04-18 05:07:06'),
(45, 6, 'text', 'text', 'full_width', 12, '2023-04-18 05:07:18', '2023-04-18 05:07:18'),
(46, 6, 'subheadline', 'subheadline', 'full_width', 12, '2023-04-18 05:08:31', '2023-04-18 05:08:31'),
(47, 6, 'image', 'image', 'full_width', 12, '2023-04-18 05:08:51', '2023-04-18 05:08:51'),
(48, 6, 'text', 'text', 'full_width', 12, '2023-04-18 05:09:03', '2023-04-18 05:09:03'),
(49, 7, 'Text', 'text', 'full_width', 12, '2023-04-27 00:17:58', '2023-04-27 00:17:58'),
(50, 7, 'Audio', 'audio-content', 'full_width', 12, '2023-04-27 00:19:25', '2023-04-27 00:19:25'),
(51, 7, 'Image', 'image', 'full_width', 12, '2023-04-27 00:20:09', '2023-04-27 00:20:09'),
(52, 7, 'Text', 'text', 'full_width', 12, '2023-04-27 00:21:50', '2023-04-27 00:21:50'),
(53, 7, 'Image', 'image', 'full_width', 12, '2023-04-27 00:26:15', '2023-04-30 00:40:59'),
(54, 7, 'Text', 'text', 'full_width', 12, '2023-04-27 00:27:29', '2023-04-27 00:27:29'),
(55, 7, 'subheadline', 'subheadline', 'full_width', 12, '2023-04-27 00:28:31', '2023-04-27 00:28:31'),
(56, 7, 'text', 'text', 'full_width', 12, '2023-04-27 00:29:20', '2023-04-27 00:29:20'),
(57, 7, 'subheadline', 'subheadline', 'full_width', 12, '2023-04-27 00:32:10', '2023-04-27 00:32:10'),
(58, 7, 'text', 'text', 'full_width', 12, '2023-04-27 00:33:04', '2023-04-27 00:33:04'),
(59, 7, 'subheadline', 'subheadline', 'full_width', 12, '2023-04-27 00:35:21', '2023-04-27 00:35:21'),
(60, 7, 'text', 'text', 'full_width', 12, '2023-04-27 00:36:26', '2023-04-27 00:36:26'),
(61, 7, 'subheadline', 'subheadline', 'full_width', 12, '2023-04-27 00:37:23', '2023-04-27 00:37:23'),
(62, 7, 'text', 'text', 'full_width', 12, '2023-04-27 00:38:33', '2023-04-27 00:38:33'),
(63, 7, 'Subheadline', 'subheadline', 'full_width', 12, '2023-04-27 00:39:20', '2023-04-27 00:39:20'),
(64, 7, 'text', 'text', 'full_width', 12, '2023-04-27 00:40:20', '2023-04-27 00:40:20'),
(65, 7, 'subheadline', 'subheadline', 'full_width', 12, '2023-04-27 00:41:36', '2023-04-27 00:41:36'),
(66, 7, 'text', 'text', 'full_width', 12, '2023-04-27 00:42:05', '2023-04-27 00:42:05'),
(67, 7, 'list -content', 'list-content', 'full_width', 12, '2023-04-27 00:43:01', '2023-04-27 00:43:01'),
(68, 7, 'text', 'text', 'full_width', 12, '2023-04-27 00:44:18', '2023-04-27 00:44:18'),
(69, 8, 'text', 'text', 'full_width', NULL, '2023-04-27 03:16:58', '2023-04-27 03:16:58'),
(70, 8, 'subheadline', 'subheadline', 'full_width', NULL, '2023-04-27 03:21:41', '2023-04-27 03:21:41'),
(71, 8, 'text', 'text', 'full_width', NULL, '2023-04-27 03:34:23', '2023-04-27 03:34:23'),
(72, 8, 'subheadline', 'subheadline', 'full_width', NULL, '2023-04-27 03:36:23', '2023-04-27 03:36:23'),
(73, 8, 'text', 'text', 'full_width', NULL, '2023-04-27 03:37:37', '2023-04-27 03:37:37'),
(74, 8, 'subheadline', 'subheadline', 'full_width', NULL, '2023-04-27 03:38:39', '2023-04-27 03:38:39'),
(75, 8, 'text', 'text', 'full_width', NULL, '2023-04-27 03:39:35', '2023-04-27 03:39:35'),
(76, 8, 'subheadline', 'subheadline', 'full_width', NULL, '2023-04-27 03:42:56', '2023-04-27 03:42:56'),
(77, 8, 'image', 'image', 'full_width', NULL, '2023-04-27 03:44:59', '2023-04-27 03:44:59'),
(78, 8, 'text', 'text', 'full_width', NULL, '2023-04-27 03:45:35', '2023-04-27 03:45:35'),
(79, 8, 'subheadline', 'subheadline', 'full_width', NULL, '2023-04-27 03:46:32', '2023-04-27 03:46:32'),
(80, 8, 'text', 'text', 'full_width', NULL, '2023-04-27 03:47:13', '2023-04-27 03:47:13'),
(81, 8, 'subheadline', 'subheadline', 'full_width', NULL, '2023-04-27 03:48:21', '2023-04-27 03:48:21'),
(82, 8, 'text', 'text', 'full_width', NULL, '2023-04-27 03:48:44', '2023-04-27 03:48:44'),
(83, 8, 'subheadline', 'subheadline', 'full_width', NULL, '2023-04-27 03:49:57', '2023-04-27 03:49:57'),
(84, 8, 'text', 'text', 'full_width', NULL, '2023-04-27 03:50:22', '2023-04-27 03:50:22'),
(85, 8, 'subheadline', 'subheadline', 'full_width', NULL, '2023-04-27 03:51:21', '2023-04-27 03:51:21'),
(86, 8, 'text', 'text', 'full_width', NULL, '2023-04-27 03:51:51', '2023-04-27 03:51:51'),
(87, 9, 'text', 'text', 'full_width', NULL, '2023-04-27 23:16:26', '2023-04-27 23:16:26'),
(88, 9, 'subheadline', 'subheadline', 'full_width', NULL, '2023-04-27 23:17:34', '2023-04-27 23:17:34'),
(89, 9, 'text', 'text', 'full_width', NULL, '2023-04-27 23:18:12', '2023-04-27 23:18:12'),
(90, 9, 'subheadline', 'subheadline', 'full_width', NULL, '2023-04-27 23:19:53', '2023-04-27 23:19:53'),
(91, 9, 'text', 'text', 'full_width', NULL, '2023-04-27 23:21:22', '2023-04-27 23:21:22'),
(92, 9, 'subheadline', 'subheadline', 'full_width', NULL, '2023-04-27 23:23:30', '2023-04-27 23:23:30'),
(93, 9, 'image', 'image', 'full_width', NULL, '2023-04-27 23:24:25', '2023-04-27 23:24:25'),
(94, 9, 'text', 'text', 'full_width', NULL, '2023-04-27 23:27:30', '2023-04-27 23:27:30'),
(95, 9, 'subheadline', 'subheadline', 'full_width', NULL, '2023-04-27 23:29:39', '2023-04-27 23:29:39'),
(97, 9, 'text', 'text', 'full_width', NULL, '2023-04-27 23:34:04', '2023-04-27 23:34:04'),
(98, 10, 'text', 'text', 'full_width', NULL, '2023-04-27 23:55:50', '2023-04-27 23:55:50'),
(99, 10, 'list content', 'list-content', 'full_width', NULL, '2023-04-28 00:00:06', '2023-04-28 00:00:06'),
(100, 10, 'text', 'text', 'full_width', NULL, '2023-04-28 00:01:54', '2023-04-28 00:01:54'),
(101, 10, 'left image', 'image', 'left', NULL, '2023-04-28 00:03:10', '2023-04-28 00:03:10'),
(102, 10, 'right image', 'image', 'right', NULL, '2023-04-28 00:04:19', '2023-04-28 00:04:19'),
(103, 10, 'subheadline', 'subheadline', 'full_width', NULL, '2023-04-28 00:07:58', '2023-04-28 00:07:58'),
(105, 10, 'text', 'text', 'full_width', NULL, '2023-04-28 00:24:05', '2023-04-28 00:24:05'),
(106, 10, 'subheadline', 'subheadline', 'full_width', NULL, '2023-04-28 00:25:53', '2023-04-28 00:25:53'),
(107, 10, 'text', 'text', 'full_width', NULL, '2023-04-28 00:26:39', '2023-04-28 00:26:39'),
(108, 10, 'subheadline', 'subheadline', 'full_width', NULL, '2023-04-28 02:58:58', '2023-04-28 02:58:58'),
(109, 10, 'text', 'text', 'full_width', NULL, '2023-04-28 02:59:27', '2023-04-28 02:59:27'),
(110, 10, 'subheadline', 'subheadline', 'full_width', NULL, '2023-04-28 03:00:44', '2023-04-28 03:00:44'),
(111, 10, 'text', 'text', 'full_width', NULL, '2023-04-28 03:01:27', '2023-04-28 03:01:27'),
(112, 10, 'subheadline', 'subheadline', 'full_width', NULL, '2023-04-28 03:03:06', '2023-04-28 03:03:06'),
(113, 10, 'text', 'text', 'full_width', NULL, '2023-04-28 03:03:39', '2023-04-28 03:03:39'),
(114, 10, 'subheadline', 'subheadline', 'full_width', NULL, '2023-04-28 03:04:22', '2023-04-28 03:04:22'),
(115, 10, 'text', 'text', 'full_width', NULL, '2023-04-28 03:04:54', '2023-04-28 03:04:54'),
(116, 10, 'subheadline', 'subheadline', 'full_width', NULL, '2023-04-28 03:05:45', '2023-04-28 03:05:45'),
(118, 10, 'text', 'text', 'full_width', NULL, '2023-04-28 03:09:22', '2023-04-28 03:09:22'),
(119, 10, 'subheadline', 'subheadline', 'full_width', NULL, '2023-04-28 03:12:41', '2023-04-28 03:12:41'),
(120, 10, 'text', 'text', 'full_width', NULL, '2023-04-28 03:13:11', '2023-04-28 03:13:11'),
(121, 10, 'subheadline', 'subheadline', 'full_width', NULL, '2023-04-28 03:16:18', '2023-04-28 03:16:18'),
(123, 10, 'text', 'text', 'full_width', NULL, '2023-04-28 03:17:31', '2023-04-28 03:17:31'),
(124, 10, 'subheadline', 'subheadline', 'full_width', NULL, '2023-04-28 03:18:24', '2023-04-28 03:18:24'),
(125, 10, 'text', 'text', 'full_width', NULL, '2023-04-28 03:19:00', '2023-04-28 03:19:00');

-- --------------------------------------------------------

--
-- Table structure for table `audio_contents`
--

CREATE TABLE `audio_contents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `article_id` bigint(20) NOT NULL,
  `article_content_id` bigint(20) NOT NULL,
  `audio_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `audio` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `author_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author_speech` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `author_name`, `image`, `author_speech`, `created_at`, `updated_at`) VALUES
(5, 'Moahammad Maruf Firoz', '1678959959.png', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', '2023-03-16 03:45:59', '2023-03-16 03:45:59'),
(6, 'Second Author', '1678960097.png', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', '2023-03-16 03:48:17', '2023-03-16 03:48:17'),
(7, 'Third Author', '1678960121.jpg', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', '2023-03-16 03:48:41', '2023-03-16 03:48:41'),
(8, 'Anika Afrin', NULL, NULL, '2023-04-26 23:59:36', '2023-04-26 23:59:36');

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
  `thumbnail` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `featured_image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cat_name`, `parent_id`, `slug`, `meta_keyword`, `meta_description`, `page_title`, `thumbnail`, `featured_image`, `created_at`, `updated_at`) VALUES
(4, 'Listening', 0, 'listening', 'IELTS Listening', 'About IELTS Listening', 'The IELTS Listening test will take about 30 minutes, and you will have an extra 10 minutes to transfer your answers to the answer sheet.', '1681023109.png', '1681023109.png', '2023-04-09 00:51:50', '2023-04-09 00:51:50'),
(5, 'Online Mock Test', 0, 'online-mock-test', 'Mock Test', 'About Mock Test', 'IELTS Online Mock Test', NULL, NULL, '2023-04-11 04:17:20', '2023-04-17 22:14:18'),
(6, 'IELTS Preparation 2023', 0, 'ielts-preparation-2023', 'IELTS Preparation', 'IELTS Preparation', 'IELTS Preparation 2023', NULL, NULL, '2023-04-17 22:15:31', '2023-04-17 22:15:31'),
(7, 'Writing', 0, 'writing', 'IELTS Writing', 'IELTS Writing', 'IELTS Writing', NULL, NULL, '2023-04-17 22:16:24', '2023-04-17 22:16:24'),
(8, 'Speaking', 0, 'speaking', 'IELTS Speaking', 'IELTS Speaking', 'IELTS Speaking', NULL, NULL, '2023-04-17 22:18:01', '2023-04-17 22:18:01'),
(9, 'Reading', 0, 'reading', 'IELTS Reading', 'IELTS Reading', 'IELTS Reading', NULL, NULL, '2023-04-17 22:19:18', '2023-04-17 22:19:18'),
(10, 'Grammar For IELTS', 0, 'grammar-for-ielts', 'Grammar For IELTS', 'Grammar For IELTS', 'Grammar For IELTS', NULL, NULL, '2023-04-17 22:19:51', '2023-04-17 22:19:51'),
(11, 'Vocabulary For IELTS', 0, 'vocabulary-for-ielts', 'Vocabulary For IELTS', 'Vocabulary For IELTS', 'Vocabulary For IELTS', NULL, NULL, '2023-04-17 22:20:20', '2023-04-17 22:20:20');

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
-- Table structure for table `contact_users`
--

CREATE TABLE `contact_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_users`
--

INSERT INTO `contact_users` (`id`, `name`, `email`, `contact_number`, `address`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Minar Ahmed', 'minar.barc@gmail.com', '01521210037', 'Uttara', 'asdfas', '2023-05-02 02:35:28', '2023-05-02 02:35:28');

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
  `unique_hits` int(11) NOT NULL,
  `raw_hits` int(11) NOT NULL,
  `staying_time` smallint(6) DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hit_counters`
--

INSERT INTO `hit_counters` (`id`, `article_id`, `ip_address`, `unique_hits`, `raw_hits`, `staying_time`, `country`, `city`, `created_at`, `updated_at`) VALUES
(2, 3, '127.0.0.1', 1, 11, NULL, NULL, NULL, '2023-03-26 23:24:27', '2023-04-17 22:21:33'),
(3, 4, '127.0.0.1', 1, 4, NULL, NULL, NULL, '2023-03-27 22:13:44', '2023-04-03 22:07:43'),
(4, 5, '127.0.0.1', 1, 17, NULL, NULL, NULL, '2023-04-09 02:51:12', '2023-04-11 02:24:23'),
(5, 6, '127.0.0.1', 1, 54, NULL, NULL, NULL, '2023-04-11 04:22:54', '2023-04-30 00:24:08'),
(6, 6, '192.168.0.230', 1, 2, NULL, NULL, NULL, '2023-04-18 04:44:00', '2023-04-18 04:46:47'),
(7, 7, '127.0.0.1', 1, 26, NULL, NULL, NULL, '2023-04-27 00:18:59', '2023-04-30 00:44:44'),
(8, 8, '127.0.0.1', 1, 20, NULL, NULL, NULL, '2023-04-27 03:17:58', '2023-04-30 04:51:17'),
(9, 9, '127.0.0.1', 1, 20, NULL, NULL, NULL, '2023-04-27 23:15:16', '2023-04-30 05:00:19'),
(10, 10, '127.0.0.1', 1, 21, NULL, NULL, NULL, '2023-04-27 23:54:55', '2023-04-30 03:52:12');

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
(5, 6, 31, '1681814374.webp', '2023-04-18 04:39:34', '2023-04-18 04:39:34'),
(6, 6, 41, '1681815790.webp', '2023-04-18 05:03:10', '2023-04-18 05:03:10'),
(10, 10, 101, '1682661822.png', '2023-04-28 00:03:42', '2023-04-28 00:03:42'),
(11, 10, 102, '1682661872.png', '2023-04-28 00:04:33', '2023-04-28 00:04:33'),
(12, 7, 53, '1682837080.webp', '2023-04-30 00:44:40', '2023-04-30 00:44:40'),
(13, 8, 77, '1682846988.webp', '2023-04-30 03:29:48', '2023-04-30 03:29:48'),
(14, 9, 93, '1682847793.webp', '2023-04-30 03:43:13', '2023-04-30 03:43:13');

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

-- --------------------------------------------------------

--
-- Table structure for table `like_articles`
--

CREATE TABLE `like_articles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `article_id` int(11) NOT NULL,
  `likes` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(24, '2023_03_12_094726_create_authors_table', 5),
(25, '2023_03_16_113822_create_news_letters_table', 6),
(27, '2023_03_20_130611_create_audio_contents_table', 7),
(28, '2023_03_23_065246_create_like_articles_table', 8),
(32, '2023_03_23_093537_create_comments_table', 9),
(33, '2023_03_24_094743_create_tags_table', 10),
(34, '2023_03_30_041019_create_quiz_true_falses_table', 11),
(35, '2023_03_30_042324_create_quiz_multiple_choices_table', 12),
(36, '2023_03_30_042547_create_quiz_radios_table', 13),
(37, '2023_03_30_042654_create_quiz_drop_downs_table', 14),
(38, '2023_03_30_042840_create_quiz_fill_blanks_table', 15),
(39, '2023_04_03_085501_create_quiz_submission_logs_table', 16),
(40, '2023_04_03_090437_create_quiz_submissions_table', 17),
(41, '2023_05_02_071120_create_contact_users_table', 18);

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
-- Table structure for table `news_letters`
--

CREATE TABLE `news_letters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `newsletter_user_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news_letters`
--

INSERT INTO `news_letters` (`id`, `newsletter_user_email`, `created_at`, `updated_at`) VALUES
(1, 'minar.barc@gmail.com', '2023-03-19 02:41:19', '2023-03-19 02:41:19'),
(2, 'minar.barc@gmail.com', '2023-03-19 02:42:00', '2023-03-19 02:42:00'),
(3, 'test@gmail.com', '2023-03-23 22:21:54', '2023-03-23 22:21:54'),
(4, 'test2@gmail.com', '2023-03-23 22:22:40', '2023-03-23 22:22:40'),
(5, 'categorypage@gmail.com', '2023-03-26 22:00:00', '2023-03-26 22:00:00'),
(6, 'searchpage@gmail.com', '2023-03-27 02:02:12', '2023-03-27 02:02:12'),
(7, 'about@gmail.com', '2023-04-17 03:59:26', '2023-04-17 03:59:26');

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
  `article_id` int(11) NOT NULL,
  `article_content_id` bigint(20) NOT NULL DEFAULT 0,
  `quiz_type` enum('reading','listening','general') COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `question_type` enum('multiple_choice','true_false_not_given','fill_blank','drop_down','radio','re_order','drag_to_fill','drag_drop') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quiz_drop_downs`
--

CREATE TABLE `quiz_drop_downs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quiz_id` bigint(20) NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `option_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_correct` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `marks` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quiz_fill_blanks`
--

CREATE TABLE `quiz_fill_blanks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quiz_id` bigint(20) NOT NULL,
  `text` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_show` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL,
  `blank_answer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `marks` int(11) NOT NULL,
  `instruction` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quiz_multiple_choices`
--

CREATE TABLE `quiz_multiple_choices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quiz_id` bigint(20) NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `option_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_correct` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `marks` int(11) NOT NULL,
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
-- Table structure for table `quiz_radios`
--

CREATE TABLE `quiz_radios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quiz_id` bigint(20) NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `option_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_correct` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `marks` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quiz_submissions`
--

CREATE TABLE `quiz_submissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quiz_submission_log_id` bigint(20) NOT NULL,
  `quiz_content_id` bigint(20) NOT NULL,
  `question_id` bigint(20) NOT NULL,
  `question_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quiz_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answered_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_correct` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `obtained_marks` int(11) DEFAULT NULL,
  `submitted_ans` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quiz_submissions`
--

INSERT INTO `quiz_submissions` (`id`, `quiz_submission_log_id`, `quiz_content_id`, `question_id`, `question_type`, `quiz_type`, `answered_text`, `is_correct`, `obtained_marks`, `submitted_ans`, `created_at`, `updated_at`) VALUES
(9, 3, 2, 4, 'multiple_choice', 'general', NULL, 'yes', 1, '\"1\"', '2023-04-10 03:38:54', '2023-04-10 03:38:54'),
(10, 3, 2, 5, 'multiple_choice', 'general', NULL, 'no', 0, '\"1\"', '2023-04-10 03:38:54', '2023-04-10 03:38:54');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_submission_logs`
--

CREATE TABLE `quiz_submission_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quiz_submission_logs`
--

INSERT INTO `quiz_submission_logs` (`id`, `user_id`, `quiz_id`, `created_at`, `updated_at`) VALUES
(3, 2, 2, '2023-04-10 03:38:54', '2023-04-10 03:38:54');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_true_falses`
--

CREATE TABLE `quiz_true_falses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quiz_id` bigint(20) NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `option_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_correct` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `marks` int(11) NOT NULL,
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
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'Mock Test', '2023-03-24 04:00:13', '2023-03-24 04:00:13'),
(3, 'Listening', '2023-03-24 04:00:21', '2023-03-24 04:00:21'),
(4, 'Reading', '2023-03-24 04:00:29', '2023-03-24 04:00:29');

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
(19, 6, 27, '<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">IELTS preparation can be challenging, but there are several online resources available that can help individuals prepare for the exam, including free online mock tests that use a computer-based system. For the candidates to practice online, we have designed a free IELTS online mock test platform - www.Ielts.live, that exactly simulates the Computer Delivered test - CD IELTS. There are several practice tests, free courses and articles on this site. Particularly, for the candidates who are preparing for the recent exam in 2023, this online test platform helps a lot.&nbsp;</span></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">One of the main benefits of computer-based mock tests is the convenience and flexibility they offer. Test-takers can access these practice tests from anywhere, at any time, and can take them at their own pace. This flexibility is particularly useful for individuals who have busy schedules and cannot commit to a regular study routine.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">Another advantage of computer-based practice tests is that they provide instant feedback and results. After completing a mock test, test-takers can immediately see their scores and identify areas that require improvement. This feedback allows individuals to adjust their study strategies and focus on areas that need improvement.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">Additionally, computer-based mock tests closely simulate the actual IELTS exam, providing test-takers with a realistic exam experience. This experience can help reduce test anxiety and build confidence in test-takers, ensuring they are better prepared for the actual exam. The free online practice tests and the mock tests on the <a href=\"http://www.Ielts.live\">website&nbsp;</a>have been designed to simulate the actual CD IELTS you face at British Council and IDP IELTS testing system.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">When preparing for the IELTS exam using computer-based mock tests, it is important to ensure that the IELTS practice tests are of high quality and provided by reputable organizations. These tests should closely simulate the actual exam, provide a range of difficulty levels, and be timed appropriately to help individuals practice their time-management skills.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">In conclusion, computer-based IELTS practice tests are an essential tool for IELTS preparation. They offer convenience and flexibility, provide instant feedback and results, and closely simulate the actual exam experience. By taking advantage of these online resources, individuals can better prepare themselves for the IELTS exam and increase their chances of success.</span></span></span></p>', NULL, NULL, 'text', '2023-04-18 04:21:21', '2023-04-18 04:45:35'),
(21, 6, 28, 'Why Mock Tests are important', NULL, NULL, 'subheadline', '2023-04-18 04:32:34', '2023-04-18 04:32:34'),
(22, 6, 29, '<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">Before taking the actual exam, it is highly recommended to take IELTS mock tests. Here, we will discuss why IELTS mock exams are important.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">Firstly, </span><span style=\"color:#70ad47\">IELTS mock tests provide individuals with an opportunity to practice and become familiar with the exam format</span><span style=\"color:#000000\">. The test has four sections: reading, writing, listening, and speaking. Mock tests allow individuals to experience the exam&#39;s structure and time limits, which helps them develop strategies for managing their time during the actual test. This helps to alleviate exam stress and anxiety, allowing individuals to perform better in the actual exam.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">Secondly, </span><span style=\"color:#70ad47\">mock exams are an excellent way to evaluate one&#39;s strengths and weaknesses</span><span style=\"color:#000000\">. After taking a mock test, individuals can assess their performance and identify the areas in which they need to improve. For instance, someone may discover that they struggle with the reading section, where they lose valuable points due to time constraints or not understanding the questions. This knowledge allows them to focus their efforts on improving their reading skills.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">Thirdly, </span><span style=\"color:#70ad47\">mock tests enable individuals to receive feedback from experienced examiners. </span><span style=\"color:#000000\">Mock test providers usually have experienced examiners who will evaluate and provide feedback on the test taker&#39;s performance. This feedback can help the individual to understand their mistakes and how to avoid them in the actual exam. This is especially important for the writing and speaking sections, where the examiner&#39;s feedback can help individuals understand how to structure their answers or improve their pronunciation.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">Finally, </span><span style=\"color:#70ad47\">the IELTS mock tests are an excellent way to build confidence</span><span style=\"color:#000000\">. Knowing that one has prepared for the exam, practiced time management strategies, identified their strengths and weaknesses, and received feedback from experienced examiners can significantly increase an individual&#39;s confidence when taking the actual exam. This helps to reduce exam anxiety and allows the test-taker to perform to the best of their ability.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">In conclusion, IELTS mock exams are essential for anyone preparing to take the IELTS exam. They provide an opportunity to practice and become familiar with the exam format, evaluate one&#39;s strengths and weaknesses, receive feedback from experienced examiners, and build confidence. Therefore, individuals preparing to take the IELTS exam should take advantage of mock tests to ensure they are adequately prepared for the actual exam</span></span></span></p>', NULL, NULL, 'text', '2023-04-18 04:36:26', '2023-04-18 04:47:54'),
(23, 6, 30, 'Top 10 reasons how mock tests or the practice materials help', NULL, NULL, 'subheadline', '2023-04-18 04:37:20', '2023-04-18 04:37:20'),
(24, 6, 32, '<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">Practicing with authentic materials is crucial for achieving success. There are hundreds of sources claiming to be the best and authenticated, later proven to have a lot of flaws. So, before taking the mock test, you should check the authenticity of the contents and their sources. Below are the top ten reasons why IELTS practice materials help:</span></span></span></p>', NULL, NULL, 'text', '2023-04-18 04:48:32', '2023-04-18 04:49:23'),
(25, 6, 33, '[\"Reinforces Knowledge: Practice materials help reinforce knowledge learned in class or through self-study. Practicing with material that covers the same topics and concepts helps solidify understanding.\",\"Develops Skills: IELTS practice materials are designed to develop skills, such as critical thinking, problem-solving, and decision-making.\",\"Builds Confidence: Practicing with materials and seeing improvement in skills and knowledge boosts confidence and provides a sense of accomplishment.\",\"Identifies Weaknesses: Practice materials help identify areas where an individual may be struggling, allowing them to focus on those areas and improve.\",\"Increases Speed: Practicing with timed practice tests can help increase speed and efficiency in completing tasks, such as taking exams or completing assignments.\",\"Improves Accuracy: Practicing with materials designed to test accuracy, such as grammar or math problems, helps improve accuracy and reduce errors.\",\"Provides Feedback: Practice materials often come with feedback, allowing individuals to see where they went wrong and learn from their mistakes.\",\"Enhances Test-Taking Skills: Practice materials specific to exams help develop test-taking skills, such as time management, understanding the format, and knowing how to answer questions effectively.\",\"Helps with Retention: Practice materials help with retaining information by providing repeated exposure to the same concepts and information.\",\"Prepares for Real-Life Scenarios: Practice materials that simulate real-life scenarios help individuals prepare for situations they may encounter in their careers or personal lives.\"]', NULL, NULL, 'list-content', '2023-04-18 04:51:55', '2023-04-18 04:51:55'),
(26, 6, 34, '<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">In conclusion, practice materials are an essential component of learning and improving skills. They reinforce knowledge, develop skills, build confidence, identify weaknesses, increase speed and accuracy, provide feedback, enhance test-taking skills, help with retention, and prepare for real-life scenarios. Incorporating practice materials into your study routine can lead to success and achieve your goals.</span></span></span></p>', NULL, NULL, 'text', '2023-04-18 04:52:52', '2023-04-18 04:52:52'),
(27, 6, 35, 'IELTS Reading mock- preparing for the reading test', NULL, NULL, 'subheadline', '2023-04-18 04:55:38', '2023-04-18 04:55:38'),
(29, 6, 39, '<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">The IELTS reading test is one of the four modules in the IELTS exam, and it measures a candidate&#39;s ability to comprehend and interpret written English. Below I will discuss the format of the IELTS reading test, strategies to improve your reading skills, and some tips for success on test day. As the IELTS reading test can be a bit daunting, but don&#39;t worry - with a bit of preparation, you&#39;ll be able to tackle it with ease!</span></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">Now, when it comes to preparing for the IELTS reading test, there are a few things you can do. Firstly, make sure you&#39;re familiar with the types of questions you&#39;ll encounter in the test. These include multiple choice, matching, and true/false/not given questions, among others. You&#39;ll also want to work on your reading speed and comprehension skills, as the test is quite time-limited.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">One great way to prepare for the IELTS reading test is to take a mock test. This will give you a chance to see what the test is really like, and to practice your skills in a realistic environment. There are plenty of IELTS reading mock tests available online, so it shouldn&#39;t be too difficult to find one that suits your needs. There are several reading mock tests you will find <a href=\"http://www.ielts.live\">on</a>.&nbsp;&nbsp;</span></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">When you&#39;re taking the mock test, try to simulate the real testing conditions as closely as possible. Find a quiet place to work, and set yourself a timer for 60 minutes. Try to answer each question as quickly and accurately as possible, and don&#39;t spend too much time on any one question. Remember, the IELTS reading test is designed to test your ability to skim and scan for information, so don&#39;t worry too much about getting every single question right.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">Overall, the IELTS reading mock test is a great way to prepare for the real thing. Just remember to stay calm and focused, and to practice your reading skills as much as possible before the test. Good luck!</span></span></span></p>', NULL, NULL, 'text', '2023-04-18 05:01:37', '2023-04-18 05:01:37'),
(30, 6, 40, 'IELTS Writing mock- preparing for the writing test', NULL, NULL, 'subheadline', '2023-04-18 05:02:25', '2023-04-18 05:02:25'),
(31, 6, 42, '<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">IELTS Writing mock tests provide candidates with the opportunity to practice their writing skills, become familiar with the test format, and identify areas that require improvement. In this essay, we will discuss how to prepare for writing task 1 and 2, the importance of IELTS writing mock tests, and how to make the most of your practice time.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">Writing mock tests are an essential part of preparing for the IELTS writing exam. They simulate the actual test conditions, giving candidates a feel for the pace and pressure of the exam. Mock tests also help candidates to become familiar with the test format and question types. This familiarity can reduce anxiety and increase confidence on test day.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">The IELTS writing test is split into two sections: Task 1 and Task 2. Task 1 requires you to write a short report or letter based on a given prompt, while Task 2 asks you to write an essay on a given topic. You&#39;ll have 60 minutes to complete both tasks, so it&#39;s important to manage your time effectively.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">To prepare for IELTS writing mock tests, candidates should first familiarize themselves with the test format and question types. For Task 1, you might be asked to write a report based on a graph or chart, or to write a letter to a friend or colleague. For Task 2, you&#39;ll be given a topic to write about, and you&#39;ll need to provide your own argument and examples. One great way to practice for Task 2 is by brainstorming a list of topics that might come up on the test. This will help you get comfortable with generating ideas quickly, and will also give you a chance to practice your writing skills on a variety of subjects. You can also try writing outlines or short paragraphs on each topic, so you&#39;re ready to tackle whatever comes up on the test.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">There are a variety of resources available, including Cambridge official IELTS practice materials, Barrons, Collins, etc., and online resources as practice questions and sample answers. Candidates should also aim to read a variety of materials, such as academic papers, news articles, and essays, to improve their writing skills.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">When taking a mock test, candidates should simulate the test conditions as closely as possible. This means finding a quiet, distraction-free environment, setting a timer for the allotted time, and avoiding interruptions or breaks during the test. Candidates should also use the same materials they plan to use on test day, such as a pen or pencil and paper or a computer.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">After completing the mock test, candidates should review their writing and identify areas that require improvement. They should also identify their strengths and weaknesses, and adjust their study plan accordingly. For example, if a candidate struggled with grammar and vocabulary, they should focus on studying these areas in their future practice.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">In addition to taking mock tests, candidates can improve their writing skills by practicing daily. Writing a variety of materials, such as essays, letters, and reports, can help to improve grammar, vocabulary, and coherence. Candidates should also aim to read examples of high-scoring writing, to gain an understanding of what makes a strong piece of writing.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">In conclusion, taking IELTS writing mock tests is an essential part of preparing for the exam. Candidates should prepare for mock tests by familiarizing themselves with the test format and question types, simulating the test conditions as closely as possible, and practicing their writing skills daily. By following these strategies, candidates can increase their chances of success on the IELTS writing exam.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">Link:&nbsp;<a href=\"https://ielts.live/writing-service\">https://ielts.live/writing-service</a></span></span></span></p>', NULL, NULL, 'text', '2023-04-18 05:05:49', '2023-04-18 05:05:49'),
(32, 6, 43, 'IELTS Speaking mock- preparing for speaking test', NULL, NULL, 'subheadline', '2023-04-18 05:06:46', '2023-04-18 05:06:46'),
(33, 6, 45, '<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">One great way to get ready for the test is by taking a mock test. This will give you a chance to practice your speaking skills in a realistic setting, and to get a sense of what the test is like. In this essay, we&#39;ll explore the benefits of taking an IELTS listening mock test and provide some helpful tips and strategies for acing this important part of the exam.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">The IELTS speaking test is made up of three parts, and you&#39;ll have around 11-14 minutes to complete it. In Part 1, you&#39;ll be asked some general questions about yourself and your interests. In Part 2, you&#39;ll be given a topic to talk about for 1-2 minutes, and in Part 3, you&#39;ll have a discussion with the examiner about the topic in more depth.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">When it comes to taking a mock test, there are a few things you should keep in mind. Firstly, make sure you&#39;re comfortable speaking English in a variety of situations. You can practice speaking with friends or language exchange partners, or even record yourself speaking and listen back to it to identify areas for improvement.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">You can also find IELTS speaking mock tests online, which will give you a chance to practice your skills in a more formal setting. Try to simulate the real testing conditions as closely as possible, by finding a quiet place to work and timing yourself.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">When it comes to Part 2 of the test, it&#39;s important to practice giving structured answers. You should aim to provide an introduction, a main point, and some supporting details or examples. Try to keep your answer focused on the topic, and avoid rambling or going off on tangents.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">In Part 3, you&#39;ll have a chance to demonstrate your ability to discuss abstract ideas and concepts. Make sure to listen carefully to the examiner&#39;s questions, and provide thoughtful, well-reasoned answers.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">Overall, the IELTS speaking mock test is a great way to prepare for the real thing. Just remember to stay calm, speak clearly and confidently, and practice your speaking skills as much as possible. Good luck!</span></span></span></p>', NULL, NULL, 'text', '2023-04-18 05:08:01', '2023-04-18 05:08:01'),
(34, 6, 46, 'IELTS listening mock- preparing for listening test', NULL, NULL, 'subheadline', '2023-04-18 05:08:39', '2023-04-18 05:08:39'),
(35, 6, 48, '<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">If you&#39;re getting ready for the IELTS listening test, you might be wondering how to prepare effectively. By taking a sample exam, you can find out what to anticipate on test day, practice listening in a realistic session, and pinpoint your areas of improvement. This post will discuss the advantages of taking an IELTS listening practice test, offer advice for good preparation, and discuss how to remain confident and focused when taking the test.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">The IELTS listening test is made up of four sections, and you&#39;ll have around 30 minutes to complete it. In each section, you&#39;ll listen to a recording and answer some questions based on what you hear. The recordings are played only once, so it&#39;s important to listen carefully and take notes as you go.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">When it comes to taking a mock test, there are a few things you should keep in mind. Firstly, make sure you&#39;re comfortable listening to English in a variety of situations. You can practice listening to podcasts, watching movies or TV shows in English, or even eavesdropping on conversations around you to get a sense of how the language is used in everyday situations.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">You can also find IELTS listening mock tests online, which will give you a chance to practice your skills in a more formal setting. Try to simulate the real testing conditions as closely as possible, by finding a quiet place to work and timing yourself.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">One important thing to keep in mind is that the recordings in the IELTS listening test cover a wide range of accents and dialects. You might hear speakers from different parts of the world, and they might speak at different speeds or use different vocabulary. It&#39;s important to get comfortable with this diversity of accents and dialects, so you&#39;re prepared for whatever comes up on the test.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><strong><span style=\"font-family:Arial\"><span style=\"color:#000000\">Here are some examples of the types of questions you might encounter in the IELTS listening test:</span></span></strong></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\"><strong>Multiple choice:</strong> You&#39;ll be given a question and a set of options, and you&#39;ll need to choose the correct answer based on what you hear in the recording.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\"><strong>Note completion:</strong> You&#39;ll be given a set of notes with missing information, and you&#39;ll need to fill in the blanks based on what you hear in the recording.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\"><strong>Matching:</strong> You&#39;ll be given a set of items and a list of descriptions, and you&#39;ll need to match the items to the correct descriptions based on what you hear in the recording.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">Overall, the IELTS listening mock test is a great way to prepare for the real thing. Just remember to listen carefully, take notes as you go, and practice your listening skills as much as possible. Good luck!</span></span></span></p>', NULL, NULL, 'text', '2023-04-18 05:10:05', '2023-04-18 05:10:05'),
(36, 7, 49, '<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">Struggling with the IELTS Listening Test as a non-native speaker? You&#39;re not alone! As a non-native speaker myself, I understand that the IELTS Listening test can be a daunting experience for us. However, with adequate preparation, you can improve your chances of success on the test. In this blog post, I will share some expert tips and strategies to help you prepare for the IELTS Listening test as a non-native speaker. With these tips and tricks, you&#39;ll be on your way to acing the listening portion of the test in no time. Before getting into that let&rsquo;s get to know a bit more about the IELTS listening test and the question types.&nbsp;</span></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">The IELTS Listening test includes a variety of question types that assess various listening skills. The question types include multiple-choice questions, form completion questions, matching questions, sentence completion questions, short answer questions, diagram and map labeling questions, and summary completion questions. Each question assesses a different ability, such as understanding main ideas, recognizing information relationships, and following directions. Understanding the different types of questions and practicing with sample questions is crucial for acing the IELTS Listening test.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">Here is an audio file and some questions for you to have a better understanding of what the test experience would be like:</span></span></span></p>', NULL, NULL, 'text', '2023-04-27 00:18:50', '2023-04-27 00:18:50'),
(37, 7, 52, '<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">The following is a list of the different types of questions in the IELTS listening test:</span></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\"><strong>Multiple-Choice Questions</strong></span></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">You will hear a recording and select the best answer from a list of options for this type of question. There are usually three or four options to choose from, with only one correct answer. It is important that you remain attentive throughout the MCQ section, as it may be a little tough to catch the correct information.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\"><strong>Form Completion Questions</strong></span></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">You will listen to a recording and then fill out a form with the missing information in the form completion questions. The form may contain blanks for names, addresses, dates, and other information.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\"><strong>Matching Questions</strong></span></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">In matching questions, you will listen to a recording and match items from two lists. The items could be words, phrases, or pictures, and you must correctly match them based on the information in the recording.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\"><strong>Sentence Completion Questions</strong></span></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">You will listen to a recording and then complete a sentence with the missing word or phrase in sentence completion questions. The sentence may be incomplete, and you must listen carefully to determine what words are missing.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\"><strong>Short Answer Questions</strong></span></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">Short-answer questions require listening to a recording before responding to a question with a short answer. The answer could be a single word or a few words, and you&#39;ll need to pay close attention to understand what information is needed.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\"><strong>Labeling Diagrams and Maps</strong></span></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">You will listen to a recording and label a diagram or map with the correct information in the diagram and map labeling questions. Building, street, landmark, or other feature labels may be included in the diagram or map.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\"><strong>Questions on Summary Completion</strong></span></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">You will be asked to listen to a recording and fill in any blanks in the summary with the appropriate words or phrases. You must pay great attention to comprehend what information is required in the summary, which may be presented as a paragraph or a list</span></span></span></p>', NULL, NULL, 'text', '2023-04-27 00:22:32', '2023-04-27 00:22:32'),
(38, 7, 54, '<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">Now let&#39;s look at what strategies to follow to tackle all these question types:</span></span></span></p>', NULL, NULL, 'text', '2023-04-27 00:27:52', '2023-04-27 00:27:52'),
(39, 7, 55, '1. Familiarize Yourself with the Test Format', NULL, NULL, 'subheadline', '2023-04-27 00:28:52', '2023-04-27 00:28:52'),
(40, 7, 56, '<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">One of the first things you should do when preparing for the IELTS Listening test is to familiarize yourself with the test format. This will help you understand the different question types, the length of the test, and the amount of time you have to complete each section. Understanding the test format will help you manage your time effectively and answer the questions more confidently.</span></span></span></p>', NULL, NULL, 'text', '2023-04-27 00:29:36', '2023-04-27 00:29:36'),
(41, 7, 57, '2. Practice Listening to Different English Accents', NULL, NULL, 'subheadline', '2023-04-27 00:32:29', '2023-04-27 00:32:29'),
(42, 7, 58, '<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">The IELTS Listening test includes different English accents, such as British, American, Australian, and New Zealand accents. As a non-native speaker, you may find it challenging to understand different accents. To overcome this challenge, practice listening to different English accents. You can do this by watching TV shows or movies in English, listening to English podcasts or audiobooks, or even talking to native English speakers.</span></span></span></p>', NULL, NULL, 'text', '2023-04-27 00:33:21', '2023-04-27 00:33:21'),
(43, 7, 59, '3. Improve Your Active Vocabulary', NULL, NULL, 'subheadline', '2023-04-27 00:35:52', '2023-04-27 00:35:52'),
(44, 7, 60, '<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">To do well on the IELTS Listening test, you need to have a good understanding of English vocabulary. I have several suggestions for improving your vocabulary for the IELTS exam. First, make it a habit to read English books, newspapers, and articles, and look up the meanings of any unfamiliar words. Second, practice putting new words into sentences or speaking them aloud. Third, use vocabulary-building resources such as flashcards, word lists, and IELTS vocabulary apps. Finally, try to engage in natural conversations with native English speakers to improve your vocabulary. Consistent practice and exposure to English words and phrases can help you significantly improve your IELTS vocabulary skills.</span></span></span></p>', NULL, NULL, 'text', '2023-04-27 00:36:41', '2023-04-27 00:36:41'),
(45, 7, 61, '4. Take Practice Tests', NULL, NULL, 'subheadline', '2023-04-27 00:37:48', '2023-04-27 00:37:48'),
(46, 7, 62, '<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">Taking practice tests is an effective way to prepare for the IELTS listening test. Practicing tests can help you become more familiar with the test format, improve your listening skills, identify areas of weakness, and develop effective test-taking strategies, all of which can help you perform well on the IELTS Listening Test.</span></span></span></p>', NULL, NULL, 'text', '2023-04-27 00:38:47', '2023-04-27 00:38:47'),
(47, 7, 63, '5. Practice Active Listening', NULL, NULL, 'subheadline', '2023-04-27 00:39:51', '2023-04-27 00:39:51'),
(48, 7, 64, '<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">Active listening is a skill that involves focusing on the speaker and understanding the message being conveyed. As a non-native speaker, practicing active listening can help you understand spoken English better. To practice active listening, pay attention to the speaker, take notes, and ask questions to clarify any misunderstandings.</span></span></span></p>', NULL, NULL, 'text', '2023-04-27 00:40:34', '2023-04-27 00:40:34'),
(49, 7, 65, '6. Use Test Strategies', NULL, NULL, 'subheadline', '2023-04-27 00:41:53', '2023-04-27 00:41:53'),
(50, 7, 66, '<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">Using test strategies can help you answer questions more effectively and manage your time during the test. Some test strategies include:</span></span></span></p>', NULL, NULL, 'text', '2023-04-27 00:42:36', '2023-04-27 00:42:36'),
(51, 7, 67, '[\"Reading the questions before listening to the audio recording\",\"Underlining keywords in the questions\",\"Taking notes while listening to the audio recording\",\"Answering the questions as you listen to the audio recording\",\"Checking your answers before moving on to the next section\"]', NULL, NULL, 'list-content', '2023-04-27 00:43:49', '2023-04-27 00:43:49'),
(52, 7, 68, '<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">To summarize, preparing for the IELTS Listening test as a non-native speaker requires commitment, practice, and a positive attitude. You can improve your chances of success on the test by familiarizing yourself with the format, practicing listening to different English accents, improving your vocabulary, taking practice tests, practicing active listening, and using test strategies. Remember to manage your time wisely, stay focused, and remain confident throughout the exam. You can achieve your desired IELTS Listening test score with practice and dedication.&nbsp;</span></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">Best of luck!</span></span></span></p>', NULL, NULL, 'text', '2023-04-27 00:45:16', '2023-04-27 00:45:16'),
(53, 8, 69, '<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">Struggling to Crack MCQs in IELTS Listening test? Make Mistakes No More! To nail the MCQ section, first, you need to select the right plan of action. And to do that you have to develop experience through taking practice tests. However, that would be a rather long route before you figure out what strategy fits you. So to make it easier for you, we put together our best tips to help you master the Multiple-choice section. Without further ado, let&rsquo;s dive in.&nbsp;</span></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">In case you don&rsquo;t know, the IELTS Listening test is an English language test to measure your ability to hear what is said. It is part of a larger test, which will evaluate your overall competence with the language. You&#39;ll be listening to a recorded conversation and answering questions relating to what you hear during the Listening Test. In this blog, we will discuss how Multiple-choice questions from the IELTS LIstening test are to be solved.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">For people who are not used to listening to native English speakers, the IELTS Listening test might be rather challenging. It can be particularly difficult to answer the multiple-choice questions. Nevertheless, don&#39;t give up hope! We&#39;ve gathered some key details in this blog post to assist you in solving the puzzle of the Listening test&#39;s multiple-choice questions. Now let&#39;s get started and investigate how to sail through the MCQ section</span></span></span></p>', NULL, NULL, 'text', '2023-04-27 03:17:41', '2023-04-27 03:17:41'),
(54, 8, 70, 'Read the instructions carefully', NULL, NULL, 'subheadline', '2023-04-27 03:22:03', '2023-04-27 03:22:03'),
(55, 8, 71, '<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">Reading the instructions carefully in the IELTS Listening test is critical because it can make or break your exam score. The instructions give you important information about how to approach the questions, such as the format and type of answers wanted. You may misunderstand the question, answer it poorly, or waste valuable time if you do not follow the instructions carefully.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">Furthermore, the instructions indicate the time restrictions for each section as well as the number of questions in each area. If you don&#39;t keep track of the time, you might not be able to answer all of the questions, resulting in a lower score.</span></span></span></p>', NULL, NULL, 'text', '2023-04-27 03:34:55', '2023-04-27 03:34:55'),
(56, 8, 72, 'Skim the questions', NULL, NULL, 'subheadline', '2023-04-27 03:36:37', '2023-04-27 03:36:37'),
(57, 8, 73, '<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">After you have read the instructions, you should skim through the questions in each section.&nbsp;</span></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">Skimming the question is an important tactic that might boost your chances of success in the IELTS Listening test. When you skim a question, you read it fast in order to gain a general idea of what the question is asking for. This is especially useful for multiple-choice questions, where you must choose the proper answer from a list of possibilities.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">Skimming the question before listening to the audio can help you focus on the essential parts of the recording and identify response possibilities that are unlikely to be right. This can save you time and mental energy by allowing you to concentrate more intently on the answer selections that are most likely to be correct.</span></span></span></p>', NULL, NULL, 'text', '2023-04-27 03:38:05', '2023-04-27 03:38:05'),
(58, 8, 74, 'Listen carefully', NULL, NULL, 'subheadline', '2023-04-27 03:38:59', '2023-04-27 03:38:59'),
(59, 8, 75, '<p><span style=\"font-size:11pt\"><span style=\"font-family:Arial\"><span style=\"color:#000000\"><span style=\"font-size:18px\">When the recording starts, you must remain focused throughout. Missing a piece of information might mean losing a point. Listen carefully to what the speaker is saying. Try to focus on the main ideas, and pay attention to any keywords or phrases that you identified when you skimmed the questions. You should also listen for any signal words, such as &quot;however,&quot; &quot;although,&quot; or &quot;on the other hand,&quot; that indicate that the speaker is about to make a contrasting point. Also, in case you do miss out on an answer, don&rsquo;t linger. If you keep thinking about the one you missed for a few seconds, you might miss the next one as well. This may make you lose track of the test.</span> </span></span></span></p>', NULL, NULL, 'text', '2023-04-27 03:40:07', '2023-04-27 03:40:07'),
(60, 8, 76, 'Take notes', NULL, NULL, 'subheadline', '2023-04-27 03:44:31', '2023-04-27 03:44:31'),
(61, 8, 78, '<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">While you are listening, take notes on the main ideas and any keywords or phrases that you hear. You can use shorthand or abbreviations to save time, but make sure your notes are clear enough that you can understand them later. You should also note any signal words that you hear, as these can help you to identify the correct answer. If you are taking a paper-based test you may as well highlight the key areas.</span></span></span></p>', NULL, NULL, 'text', '2023-04-27 03:45:55', '2023-04-27 03:45:55'),
(62, 8, 79, 'Eliminate options', NULL, NULL, 'subheadline', '2023-04-27 03:46:41', '2023-04-27 03:46:41'),
(63, 8, 80, '<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">After listening to the recording and taking notes, you should begin working on the questions. Read each question carefully before looking at the options. Remove any selections that you are certain are incorrect based on what you heard in the tape or the notes you took. This will assist you in narrowing your options and increasing your chances of selecting the correct answer.</span></span></span></p>', NULL, NULL, 'text', '2023-04-27 03:47:30', '2023-04-27 03:47:30'),
(64, 8, 81, 'Guess if necessary', NULL, NULL, 'subheadline', '2023-04-27 03:48:30', '2023-04-27 03:48:30'),
(65, 8, 82, '<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">If you are unsure about the answer to a question on the IELTS Listening test, it is advisable to guess rather than leave the question unanswered. There are several reasons why guessing can be advantageous:</span></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">For starters, you are not penalized for incorrect answers in the IELTS Listening test. This means that you will not lose points for guessing, even if your guess is incorrect. As a result, guessing is a low-risk method that can perhaps gain you some points.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">Second, by guessing, you give yourself a chance to answer the question correctly. You will not receive any points for that question if you do not attempt to answer it. However, guessing increases your odds of getting the question correct, even if just by chance.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">Finally, if you have no idea what the solution is, you can employ a variety of tactics to make an educated guess. For example, you may rule out obvious incorrect answers or use your common sense and previous information to make an educated judgment.</span></span></span></p>', NULL, NULL, 'text', '2023-04-27 03:49:23', '2023-04-27 03:49:23'),
(66, 8, 83, 'Make sure the spellings are correct', NULL, NULL, 'subheadline', '2023-04-27 03:50:09', '2023-04-27 03:50:09'),
(67, 8, 84, '<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">Incorrect spelling can result in a loss of marks. Spelling mistakes can occur in a variety of question forms, including multiple-choice, form-completion, and sentence-completion questions.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">In multiple-choice questions, for example, if you misspell the correct answer, it will be marked as incorrect even though you choose the correct option. Similarly, if you misspell a word in a form completion question, it will be marked as incorrect, even though the information you gave is correct.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">Therefore, it is vital to practice your spelling skills and ensure that you are confident in spelling common terms correctly. To spell more precisely, you may use tactics such as listening for specific spelling patterns and reducing complex words into smaller components.</span></span></span></p>', NULL, NULL, 'text', '2023-04-27 03:50:51', '2023-04-27 03:50:51'),
(68, 8, 85, 'Check your answers', NULL, NULL, 'subheadline', '2023-04-27 03:51:39', '2023-04-27 03:51:39'),
(69, 8, 86, '<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">Finally, make sure you check your answers before you submit your test. Double-check each answer to make sure you have chosen the correct option, and make sure you have answered all the questions in each section. If you have time, you can also review your notes to make sure you understood everything correctly.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">&quot;Practice makes perfect,&quot; as the old proverb goes, and this is certainly true when it comes to answering the multiple-choice questions in the IELTS Listening test. While these questions can be intimidating, you can boost your chances of success with a little work and the appropriate approach.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">You may conquer these difficult problems by using several key methods, such as carefully reading the directions, skimming the questions, and listening attention to the recording. Taking notes, eliminating choices, and guessing if necessary can also assist you in making intelligent guesses and increasing your chances of getting the correct answer. Also, we&rsquo;re always here for you at the British American Resource Centre.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">Don&#39;t be intimidated by these questions. With some practice and correct methods, you may face the IELTS Listening test with confidence and ace those multiple-choice problems. After all, the sky is the limit, and you can accomplish anything you set your mind to!</span></span></span></p>', NULL, NULL, 'text', '2023-04-27 03:52:39', '2023-04-27 03:52:39');
INSERT INTO `text_contents` (`id`, `article_id`, `article_content_id`, `content`, `font`, `font_size`, `content_type`, `created_at`, `updated_at`) VALUES
(70, 9, 87, '<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">Form completion questions are a type of question commonly found in the IELTS Listening test. In this type of question, you will be given an incomplete form, such as a registration form, application form, or survey form, and you will be asked to complete the missing information by listening to a recording.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">The recording may be a conversation, a monologue, or an interview, and it will provide the information you need to fill in the gaps on the form. The information you need to complete may include personal details such as names, addresses, and dates of birth, or more specific information such as preferences, qualifications, or reasons for a particular choice.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">Form completion questions test your ability to listen for specific details and to understand and follow instructions. They require you to listen carefully to the recording, identify the relevant information, and fill in the gaps accurately on the form within a limited amount of time. Practicing this type of question can help you improve your listening skills and prepare you for the IELTS Listening test.</span></span></span></p>', NULL, NULL, 'text', '2023-04-27 23:16:57', '2023-04-27 23:16:57'),
(71, 9, 88, 'The skills required to answer form completion questions:', NULL, NULL, 'subheadline', '2023-04-27 23:17:46', '2023-04-27 23:17:46'),
(72, 9, 89, '<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">Form completion questions in the IELTS listening test require the development of a specific skill set. Good listening abilities are essential to fully grasp spoken material, while note-taking skills are required to accurately record key data. Furthermore, spelling and grammar skills are required to avoid mistakes when filling in the blanks on the form. Furthermore, strong time management and focus skills are required to finish the form within the time limit while avoiding distractions that could lead to errors.</span></span></span></p>', NULL, NULL, 'text', '2023-04-27 23:18:29', '2023-04-27 23:18:29'),
(73, 9, 90, 'How to answer form completion questions?', NULL, NULL, 'subheadline', '2023-04-27 23:20:54', '2023-04-27 23:20:54'),
(74, 9, 91, '<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\"><strong>Take your time reading the instructions:</strong> It is critical to thoroughly follow the instructions provided before beginning the listening phase. This will assist you in understanding what is expected of you and what information you should pay attention to. Failure to thoroughly understand the instructions may result in confusion or inaccurate replies.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\"><strong>Skim the form: </strong>A brief glance over the form before the listening phase begins can provide you with a rough notion of the type of information you should be listening for. This allows you to concentrate on the key parts of the recording and decreases the possibility of losing important information.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\"><strong>Predict answers:</strong> By using your knowledge of the topic and the form, you can predict the type of information that may be required to complete the form. This helps you focus your listening on the relevant parts of the recording and prepares you for the type of information you may hear.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\"><strong>Listen for keywords:</strong> Keywords are specific pieces of information that match the information on the form, such as numbers, names, dates, or specific details. By listening for these keywords, you can quickly identify the relevant information and fill in the gaps on the form more accurately.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\"><strong>Take note of grammar:</strong> The information on the form may require a specific structure, such as a plural noun or a verb in the past tense. You can verify that the information you fill out on the form is correct and in the proper format by paying attention to grammar and word forms.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\"><strong>Check your spelling:</strong> Because incorrect spelling might lead to incorrect answers, it is critical to spell the terms accurately. Checking your spelling twice will help you prevent losing points due to thoughtless errors.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\"><strong>Use abbreviations:</strong> While abbreviations can save time when filling out forms, it is crucial to use them correctly and ensure that they are widely used and understood. Using inappropriate or unclear abbreviations can result in incorrect answers.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\"><strong>Keep track of time:</strong> It is essential to manage your time properly during the listening test. You must ensure that you have enough time to complete the form and double-check your answers before the time limit expires. By keeping track of time, you can ensure that you finish the form within the time limit and prevent leaving any gaps empty.</span></span></span></p>\r\n\r\n<p><strong><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">Now let&rsquo;s move on to sentence completion questions&nbsp;</span></span></span></strong></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">Sentence completion questions are a common type of question found in the IELTS Listening test. They are designed to test your ability to listen for specific information and fill in the gaps in a sentence. In this blog, we will explore what sentence completion questions are and the best way to answer them in the IELTS Listening test.</span></span></span></p>', NULL, NULL, 'text', '2023-04-27 23:22:57', '2023-04-27 23:22:57'),
(75, 9, 92, 'What are Sentence Completion Questions?', NULL, NULL, 'subheadline', '2023-04-27 23:23:58', '2023-04-27 23:23:58'),
(76, 9, 94, '<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">Sentence completion questions require you to listen to a recording and complete a sentence with a missing word or phrase. The missing information may be a single word, a phrase, or a short sentence. The sentence completion questions can be found in any section of the IELTS Listening test, and they may be related to any topic.</span></span></span></p>\r\n\r\n<p><strong><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">The differences between form completion and sentence completion questions:&nbsp;</span></span></span></strong></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\"><strong>Format:</strong> Sentence completion questions require you to fill in the missing information in a single sentence, while form completion questions require you to fill in multiple pieces of information in different sections of a form.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\"><strong>Information type:</strong> Sentence completion questions involve completing a sentence with missing information, such as a word or phrase. Form completion questions involve filling in missing information on a form, such as personal details, dates, addresses, and other specific information.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\"><strong>Structure:</strong> Sentence completion questions focus on completing a single sentence with missing information. Form completion questions require you to fill in multiple pieces of information, and the missing information can be in different formats and structures.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\"><strong>Time limit: </strong>Both question types have a time limit, but form completion questions can be more time-consuming as you need to fill in multiple pieces of information in different sections of the form.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\"><strong>Context:</strong> Sentence completion questions rely on the context of the recording to fill in the missing information in a sentence. Form completion questions also rely on context, but you need to have a good understanding of the information required to fill in the missing information on the form.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\"><strong>Skills tested:</strong> Sentence completion questions test your ability to listen for and accurately complete a sentence with missing information. Form completion questions test your ability to listen for and accurately fill in missing information in different sections of a form.</span></span></span></p>\r\n\r\n<p><strong><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">How to Answer Sentence Completion Questions in IELTS Listening</span></span></span></strong></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">In conclusion, sentence completion questions in the IELTS Listening test require careful attention to detail and the ability to quickly and accurately process information. By following the tips outlined above, you can improve your chances of accurately completing the questions and achieving a good score on the IELTS Listening test.</span></span></span></p>', NULL, NULL, 'text', '2023-04-27 23:28:50', '2023-04-27 23:28:50'),
(77, 9, 95, 'Should your form completion and sentence completion strategies be similar?', NULL, NULL, 'subheadline', '2023-04-27 23:29:48', '2023-04-27 23:29:48'),
(78, 9, 97, '<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">Sentence completion and form completion questions are two types of IELTS Listening exam questions. While they have some similarities, there are significant distinctions in the skills and tactics required to respond to them.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">Sentence completion questions demand you to listen to a recording and fill in a missing word or phrase in a sentence. You must be able to understand the context and meaning of the sentence, as well as use your grammatical and vocabulary skills to fill in the gaps.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">In contrast, form completion questions demand you to fill out a form based on the information supplied in the audio. This implies you have to understand the form&#39;s structure, the sort of information required, and how the information should be presented.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">While the listening abilities necessary for sentence completion and form completion questions may overlap, the strategies and techniques used to answer these questions may differ. For example, when answering sentence completion questions, you may need to concentrate more on the context and content of the sentence, whereas when answering form completion questions, you may need to concentrate more on the form&#39;s structure and the sort of information requested.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">In terms of preparation, it is crucial to practice both sorts of questions in order to improve your general listening abilities and become acquainted with the many question types that may occur in the IELTS Listening test.</span></span></span></p>', NULL, NULL, 'text', '2023-04-27 23:34:45', '2023-04-27 23:34:45'),
(79, 10, 98, '<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">Ready to conquer the IELTS reading test and show off your English proficiency? Look no further! This blog post is your ultimate guide to acing the test and achieving your dream scores. Whether you&#39;re a non-native speaker or simply looking to improve your reading skills, these valuable tips and strategies will help you succeed. So let&#39;s dive in and get you one step closer to your goals!</span></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">The IELTS reading test is a challenge for non-native speakers who seek to prove their English reading ability. This test, which is part of the International English Language Testing System (IELTS), assesses a candidate&#39;s ability to read written English, including academic and general texts.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">The IELTS reading test is divided into three sections, each of which becomes increasingly challenging as the test progresses. Candidates must answer 40 questions in total within these parts, with each question testing distinct reading skills. The purpose of the reading test is to assess a candidate&#39;s ability to:</span></span></span></p>', NULL, NULL, 'text', '2023-04-27 23:56:36', '2023-04-27 23:56:36'),
(80, 10, 99, '[\"Grasp the key concepts and details of a text\",\"Analyze and interpret information in the text\",\"Find specific information within the text\",\"Understand the structure and organization of the text\",\"Deduce meaning from context\",\"Identify the author\'s purpose, opinions, and attitudes\",\"Understand academic vocabulary and language structures\"]', NULL, NULL, 'list-content', '2023-04-28 00:01:21', '2023-04-28 00:01:21'),
(81, 10, 100, '<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">To assess these various skills, the IELTS reading test employs several types of questions. These include multiple-choice questions, true/false/not given questions, matching headings questions, sentence completion questions, matching information questions, short answer questions, and diagram labeling questions. Each of these question types requires the candidate to approach the text in a unique way and apply different reading strategies. In this blog post, I will share some tips on how to ace the IELTS reading test.</span></span></span></p>', NULL, NULL, 'text', '2023-04-28 00:02:38', '2023-04-28 00:02:38'),
(82, 10, 103, 'Understand the Test Format', NULL, NULL, 'subheadline', '2023-04-28 00:08:14', '2023-04-28 00:08:14'),
(83, 10, 105, '<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">Before you start preparing for the IELTS reading test, it is essential to understand the test format. Familiarize yourself with the types of questions that are asked in the test and the time limit for each section. You can find this information on the official IELTS website or through practice tests available online. You can also visit<strong> <a href=\"https://ielts.live/\">ielts.live</a></strong></span></span></span><span style=\"font-size:11pt\"><span style=\"font-family:Arial\"><span style=\"color:#000000\"><span style=\"font-size:18px\"><a href=\"https://ielts.live/\"> </a>to practice some tests online.</span> </span></span></span></p>', NULL, NULL, 'text', '2023-04-28 00:24:49', '2023-04-28 00:24:49'),
(84, 10, 106, 'Develop Your Reading Skills', NULL, NULL, 'subheadline', '2023-04-28 00:26:08', '2023-04-28 00:26:08'),
(85, 10, 107, '<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">The IELTS reading test is designed to evaluate your reading skills, so it is essential to work on improving them. Building a reading habit helps greatly to develop your reading skills. You can do this by reading a variety of texts, such as newspapers, magazines, academic journals, and online articles. Focus on improving your reading speed, comprehension, and vocabulary.</span></span></span></p>', NULL, NULL, 'text', '2023-04-28 00:27:20', '2023-04-28 00:27:20'),
(86, 10, 108, 'Skimming and Scanning', NULL, NULL, 'subheadline', '2023-04-28 02:59:08', '2023-04-28 02:59:08'),
(87, 10, 109, '<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">Skimming and scanning are essential reading techniques that can help you save time during the test. Skimming involves reading through the text quickly to get a general understanding of the main ideas and the overall structure of the text. This technique is useful for quickly familiarizing yourself with the content and getting a sense of what the text is about.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">Scanning, on the other hand, involves searching the text for specific information such as names, dates, or numbers. This technique is useful for quickly locating the answer to a specific question without having to read the entire text in detail.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">Both skimming and scanning require practice and can be improved with time. By using these techniques, you can quickly identify important information, save time, and improve your chances of getting a high score on the IELTS reading test.</span></span></span></p>', NULL, NULL, 'text', '2023-04-28 02:59:57', '2023-04-28 02:59:57'),
(88, 10, 110, 'Time Management', NULL, NULL, 'subheadline', '2023-04-28 03:00:54', '2023-04-28 03:00:54'),
(89, 10, 111, '<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">The IELTS reading test is timed, and you need to manage your time effectively to complete all the questions in the given time. Allocate a specific amount of time for each section and try to stick to it. If you are struggling with a particular question, move on to the next one and come back to it later. Generally, you will need more time as you move forward from article one to article three. What most candidates do is keep 15 minutes for section 1, 20 for section 2, and lastly, 25 for section 3. This may vary according to the scenario you&rsquo;re in. </span></span></span></p>', NULL, NULL, 'text', '2023-04-28 03:01:52', '2023-04-28 03:01:52'),
(90, 10, 112, 'Understand the Questions', NULL, NULL, 'subheadline', '2023-04-28 03:03:26', '2023-04-28 03:03:26'),
(91, 10, 113, '<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">Before answering the questions, make sure you understand them correctly. Many candidates give the wrong answer due to hurrying and not understating the question properly. Read the instructions carefully and underline any keywords or phrases that can help you identify the relevant information in the text.</span></span></span></p>', NULL, NULL, 'text', '2023-04-28 03:04:01', '2023-04-28 03:04:01'),
(92, 10, 114, 'Predict the Answers', NULL, NULL, 'subheadline', '2023-04-28 03:04:34', '2023-04-28 03:04:34'),
(93, 10, 115, '<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">While reading the text, try to predict the answers to the questions. This can help you focus on the relevant information and save time during the test. Use your skimming and scanning techniques to find the specific information that supports your predictions.</span></span></span></p>', NULL, NULL, 'text', '2023-04-28 03:05:13', '2023-04-28 03:05:13'),
(94, 10, 116, 'Use Context Clues', NULL, NULL, 'subheadline', '2023-04-28 03:06:01', '2023-04-28 03:06:01'),
(95, 10, 118, '<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">When you&#39;re doing a reading test and you come across a word you don&#39;t know, you can use context clues to figure out what it means. Context clues are like little hints that the text gives you to help you understand what a word means. To use context clues in a reading test, start by reading the sentence or passage around the unfamiliar word. Look for clues such as synonyms, antonyms, or descriptive language that can provide insight into the meaning of the word. It&#39;s a pretty handy trick to have up your sleeve!</span></span></span></p>', NULL, NULL, 'text', '2023-04-28 03:09:46', '2023-04-28 03:09:46'),
(96, 10, 119, 'Practice with Sample Tests', NULL, NULL, 'subheadline', '2023-04-28 03:12:58', '2023-04-28 03:12:58'),
(97, 10, 120, '<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">Practice is the key to success in the IELTS reading test. Use sample tests to practice your skills and develop strategies that work for you. Analyze your mistakes and learn from them to improve your performance.</span></span></span></p>', NULL, NULL, 'text', '2023-04-28 03:15:46', '2023-04-28 03:15:46'),
(98, 10, 121, 'Stay Focused', NULL, NULL, 'subheadline', '2023-04-28 03:16:27', '2023-04-28 03:16:27'),
(99, 10, 123, '<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">During the test, try to stay focused and avoid distractions. Because in the IELTS exam, every second counts. Focus on the text and the questions and try not to let your mind wander. If you feel tired or distracted, take a short break of one second to refresh your mind.</span></span></span></p>', NULL, NULL, 'text', '2023-04-28 03:17:52', '2023-04-28 03:17:52'),
(100, 10, 124, 'Manage Your Stress', NULL, NULL, 'subheadline', '2023-04-28 03:18:33', '2023-04-28 03:18:33'),
(101, 10, 125, '<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">The IELTS reading test can be stressful, but it is essential to manage your stress effectively. Practice relaxation techniques, such as deep breathing or visualization, to calm your mind and body. Remind yourself that you have prepared for the test and that you are capable of performing well. You must remain confident throughout the test.&nbsp;</span></span></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">In conclusion, the IELTS reading test is a challenging but essential component of the IELTS exam. When it comes to acing the IELTS reading test, there is no one-size-fits-all approach. Every candidate has their strengths and weaknesses, and it&#39;s up to them to determine the best way to prepare for the test. However, there are some tried-and-true methods that can help non-native speakers improve their reading skills and increase their chances of success.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">One approach is to focus on building vocabulary and enhancing comprehension skills. By reading a variety of materials, such as books, newspapers, and academic journals, candidates can expose themselves to new words and concepts, helping them to better understand the texts they&#39;ll encounter on the IELTS reading test.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">Another strategy is to practice time management skills, as candidates have a limited amount of time to complete the test. This involves learning to quickly scan texts for important information, avoiding getting bogged down by difficult passages, and pacing oneself to ensure that all questions are answered before time runs out.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">Ultimately, success on the IELTS reading test requires dedication, effort, and a willingness to learn and improve. By using a combination of strategies and taking advantage of available resources, such as practice tests and study materials, non-native speakers can confidently approach the test and achieve their desired scores</span></span></span></p>', NULL, NULL, 'text', '2023-04-28 03:19:34', '2023-04-28 03:20:01');

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
(1, 'user', 'user@gmail.com', NULL, '1668753072.png', 2, '$2y$10$u4AgdhvNxARatwyAoKkFHeyL/TL3U5kbjsyKiIyxaoE9f.GcG3k2.', NULL, '2022-11-18 00:31:12', '2022-11-18 00:31:12'),
(2, 'Minar', 'minar@gmail.com', NULL, NULL, 2, '$2y$10$iA7l48ZwaSkF9SM2GyguKeErPth7Qtf/SOGZJJ3eJYGiYHNyE4iU6', NULL, '2023-03-10 05:03:43', '2023-03-10 05:03:43'),
(7, 'Minar Ahmed', 'minar.barc@gmail.com', NULL, NULL, 2, '$2y$10$sTSvx/X.760f0pMY.XBf2Ok23EbxoMS5qCjrJu3yRlpeGVN2Xwx4S', NULL, '2023-03-28 00:44:34', '2023-03-28 00:44:34');

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
-- Indexes for table `audio_contents`
--
ALTER TABLE `audio_contents`
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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_users`
--
ALTER TABLE `contact_users`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `like_articles`
--
ALTER TABLE `like_articles`
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
-- Indexes for table `news_letters`
--
ALTER TABLE `news_letters`
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
-- Indexes for table `quiz_drop_downs`
--
ALTER TABLE `quiz_drop_downs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_fill_blanks`
--
ALTER TABLE `quiz_fill_blanks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_multiple_choices`
--
ALTER TABLE `quiz_multiple_choices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_passages`
--
ALTER TABLE `quiz_passages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_radios`
--
ALTER TABLE `quiz_radios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_submissions`
--
ALTER TABLE `quiz_submissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_submission_logs`
--
ALTER TABLE `quiz_submission_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_true_falses`
--
ALTER TABLE `quiz_true_falses`
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
-- Indexes for table `tags`
--
ALTER TABLE `tags`
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `article_contents`
--
ALTER TABLE `article_contents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `audio_contents`
--
ALTER TABLE `audio_contents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `contact_users`
--
ALTER TABLE `contact_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hit_counters`
--
ALTER TABLE `hit_counters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `image_contents`
--
ALTER TABLE `image_contents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `left_text_videos`
--
ALTER TABLE `left_text_videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `like_articles`
--
ALTER TABLE `like_articles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `news_letters`
--
ALTER TABLE `news_letters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `quiz_drop_downs`
--
ALTER TABLE `quiz_drop_downs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `quiz_fill_blanks`
--
ALTER TABLE `quiz_fill_blanks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `quiz_multiple_choices`
--
ALTER TABLE `quiz_multiple_choices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `quiz_passages`
--
ALTER TABLE `quiz_passages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quiz_radios`
--
ALTER TABLE `quiz_radios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `quiz_submissions`
--
ALTER TABLE `quiz_submissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `quiz_submission_logs`
--
ALTER TABLE `quiz_submission_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `quiz_true_falses`
--
ALTER TABLE `quiz_true_falses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `right_text_videos`
--
ALTER TABLE `right_text_videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `text_contents`
--
ALTER TABLE `text_contents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `video_contents`
--
ALTER TABLE `video_contents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `widget_settings`
--
ALTER TABLE `widget_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
