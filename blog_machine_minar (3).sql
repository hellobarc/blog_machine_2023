-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2023 at 01:01 PM
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
(1, 'Minar Ahmed', 'minar.barc@gmail.com', '01521210037', 'Uttara', 'asdIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.fas', '2023-05-02 02:35:28', '2023-05-02 02:35:28');

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
(5, 6, '127.0.0.1', 1, 55, NULL, NULL, NULL, '2023-04-11 04:22:54', '2023-05-04 03:20:10'),
(6, 6, '192.168.0.230', 1, 2, NULL, NULL, NULL, '2023-04-18 04:44:00', '2023-04-18 04:46:47'),
(7, 7, '127.0.0.1', 1, 68, NULL, NULL, NULL, '2023-04-27 00:18:59', '2023-05-22 04:47:47'),
(8, 8, '127.0.0.1', 1, 38, NULL, NULL, NULL, '2023-04-27 03:17:58', '2023-05-22 04:52:19'),
(9, 9, '127.0.0.1', 1, 35, NULL, NULL, NULL, '2023-04-27 23:15:16', '2023-05-22 04:58:24'),
(10, 10, '127.0.0.1', 1, 27, NULL, NULL, NULL, '2023-04-27 23:54:55', '2023-05-22 05:00:30');

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

--
-- Dumping data for table `like_articles`
--

INSERT INTO `like_articles` (`id`, `article_id`, `likes`, `created_at`, `updated_at`) VALUES
(3, 9, 1, '2023-05-02 23:39:50', '2023-05-02 23:39:50');

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
(35, 6, 48, '<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">If you&#39;re getting ready for the IELTS listening test, you might be wondering how to prepare effectively. By taking a sample exam, you can find out what to anticipate on test day, practice listening in a realistic session, and pinpoint your areas of improvement. This post will discuss the advantages of taking an IELTS listening practice test, offer advice for good preparation, and discuss how to remain confident and focused when taking the test.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">The IELTS listening test is made up of four sections, and you&#39;ll have around 30 minutes to complete it. In each section, you&#39;ll listen to a recording and answer some questions based on what you hear. The recordings are played only once, so it&#39;s important to listen carefully and take notes as you go.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">When it comes to taking a mock test, there are a few things you should keep in mind. Firstly, make sure you&#39;re comfortable listening to English in a variety of situations. You can practice listening to podcasts, watching movies or TV shows in English, or even eavesdropping on conversations around you to get a sense of how the language is used in everyday situations.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">You can also find IELTS listening mock tests online, which will give you a chance to practice your skills in a more formal setting. Try to simulate the real testing conditions as closely as possible, by finding a quiet place to work and timing yourself.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">One important thing to keep in mind is that the recordings in the IELTS listening test cover a wide range of accents and dialects. You might hear speakers from different parts of the world, and they might speak at different speeds or use different vocabulary. It&#39;s important to get comfortable with this diversity of accents and dialects, so you&#39;re prepared for whatever comes up on the test.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><strong><span style=\"font-family:Arial\"><span style=\"color:#000000\">Here are some examples of the types of questions you might encounter in the IELTS listening test:</span></span></strong></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\"><strong>Multiple choice:</strong> You&#39;ll be given a question and a set of options, and you&#39;ll need to choose the correct answer based on what you hear in the recording.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\"><strong>Note completion:</strong> You&#39;ll be given a set of notes with missing information, and you&#39;ll need to fill in the blanks based on what you hear in the recording.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\"><strong>Matching:</strong> You&#39;ll be given a set of items and a list of descriptions, and you&#39;ll need to match the items to the correct descriptions based on what you hear in the recording.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">Overall, the IELTS listening mock test is a great way to prepare for the real thing. Just remember to listen carefully, take notes as you go, and practice your listening skills as much as possible. Good luck!</span></span></span></p>', NULL, NULL, 'text', '2023-04-18 05:10:05', '2023-04-18 05:10:05');
INSERT INTO `text_contents` (`id`, `article_id`, `article_content_id`, `content`, `font`, `font_size`, `content_type`, `created_at`, `updated_at`) VALUES
(36, 7, 49, '<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">Struggling with the IELTS Listening Test as a non-native speaker? You&#39;re not alone! As a non-native speaker myself, I understand that the IELTS Listening test can be a daunting experience for us. However, with adequate preparation, you can improve your chances of success on the test. In this blog post, I will share some expert tips and strategies to help you prepare for the IELTS Listening test as a non-native speaker. With these tips and tricks, you&#39;ll be on your way to acing the listening portion of the test in no time. Before getting into that let&rsquo;s get to know a bit more about the IELTS listening test and the question types.&nbsp;</span></span></span></p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:Arial\"><span style=\"color:#000000\"><span style=\"font-size:18px\">Here&rsquo;s an example of the IELTS listening test question. You&rsquo;ll hear an audio and such a set of questions will be given to you.</span> </span></span></span></p>\r\n\r\n<p style=\"text-align:center\"><img src=\"data:image/png;base64,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\" /></p>', NULL, NULL, 'text', '2023-04-27 00:18:50', '2023-05-22 04:47:42');
INSERT INTO `text_contents` (`id`, `article_id`, `article_content_id`, `content`, `font`, `font_size`, `content_type`, `created_at`, `updated_at`) VALUES
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
(53, 8, 69, '<p><span style=\"font-size:11pt\"><span style=\"font-family:Arial\"><span style=\"color:#000000\"><span style=\"font-size:18px\">Struggling to Crack MCQs in the IELTS Listening test? Make Mistakes No More! To nail the MCQ section, first, you need to select the right plan of action. And to do that you have to develop experience through taking practice tests. However, that would be a rather long route before you figure out what strategy fits you. So to make it easier for you, we put together our best tips to help you master the Multiple-choice section. Without further ado, let&rsquo;s dive in.</span> </span></span></span></p>', NULL, NULL, 'text', '2023-04-27 03:17:41', '2023-05-22 04:52:13'),
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
(69, 8, 86, '<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">Finally, make sure you check your answers before you submit your test. Double-check each answer to make sure you have chosen the correct option, and make sure you have answered all the questions in each section. If you have time, you can also review your notes to make sure you understood everything correctly.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">&quot;Practice makes perfect,&quot; as the old proverb goes, and this is certainly true when it comes to answering the multiple-choice questions in the IELTS Listening test. While these questions can be intimidating, you can boost your chances of success with a little work and the appropriate approach.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">You may conquer these difficult problems by using several key methods, such as carefully reading the directions, skimming the questions, and listening attention to the recording. Taking notes, eliminating choices, and guessing if necessary can also assist you in making intelligent guesses and increasing your chances of getting the correct answer. Also, we&rsquo;re always here for you at the British American Resource Centre.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">Don&#39;t be intimidated by these questions. With some practice and correct methods, you may face the IELTS Listening test with confidence and ace those multiple-choice problems. After all, the sky is the limit, and you can accomplish anything you set your mind to!</span></span></span></p>', NULL, NULL, 'text', '2023-04-27 03:52:39', '2023-04-27 03:52:39'),
(70, 9, 87, '<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">Form completion questions are a type of question commonly found in the IELTS Listening test. In this type of question, you will be given an incomplete form, such as a registration form, application form, or survey form, and you will be asked to complete the missing information by listening to a recording. The recording may be a conversation, a monologue, or an interview, and it will provide the information you need to fill in the gaps on the form. </span></span></span></p>', NULL, NULL, 'text', '2023-04-27 23:16:57', '2023-05-22 04:53:49'),
(71, 9, 88, 'The skills required to answer form completion questions:', NULL, NULL, 'subheadline', '2023-04-27 23:17:46', '2023-04-27 23:17:46'),
(72, 9, 89, '<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">Form completion questions in the IELTS listening test require the development of a specific skill set. Good listening abilities are essential to fully grasp spoken material, while note-taking skills are required to accurately record key data. Furthermore, spelling and grammar skills are required to avoid mistakes when filling in the blanks on the form. Furthermore, strong time management and focus skills are required to finish the form within the time limit while avoiding distractions that could lead to errors.</span></span></span></p>', NULL, NULL, 'text', '2023-04-27 23:18:29', '2023-04-27 23:18:29'),
(73, 9, 90, 'How to answer form completion questions?', NULL, NULL, 'subheadline', '2023-04-27 23:20:54', '2023-04-27 23:20:54'),
(74, 9, 91, '<h3><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\"><strong>Take your time reading the instructions:</strong> It is critical to thoroughly follow the instructions provided before beginning the listening phase. This will assist you in understanding what is expected of you and what information you should pay attention to. Failure to thoroughly understand the instructions may result in confusion or inaccurate replies.</span></span></span></h3>\r\n\r\n<h3><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\"><strong>Skim the form: </strong>A brief glance over the form before the listening phase begins can provide you with a rough notion of the type of information you should be listening for. This allows you to concentrate on the key parts of the recording and decreases the possibility of losing important information.</span></span></span></h3>\r\n\r\n<h3><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\"><strong>Predict answers:</strong> By using your knowledge of the topic and the form, you can predict the type of information that may be required to complete the form. This helps you focus your listening on the relevant parts of the recording and prepares you for the type of information you may hear.</span></span></span></h3>\r\n\r\n<h3><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\"><strong>Listen for keywords:</strong> Keywords are specific pieces of information that match the information on the form, such as numbers, names, dates, or specific details. By listening for these keywords, you can quickly identify the relevant information and fill in the gaps on the form more accurately.</span></span></span></h3>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\"><strong>Take note of grammar:</strong> The information on the form may require a specific structure, such as a plural noun or a verb in the past tense. You can verify that the information you fill out on the form is correct and in the proper format by paying attention to grammar and word forms.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\"><strong>Check your spelling:</strong> Because incorrect spelling might lead to incorrect answers, it is critical to spell the terms accurately. Checking your spelling twice will help you prevent losing points due to thoughtless errors.</span></span></span></p>\r\n\r\n<h3><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\"><strong>Use abbreviations:</strong> While abbreviations can save time when filling out forms, it is crucial to use them correctly and ensure that they are widely used and understood. Using inappropriate or unclear abbreviations can result in incorrect answers.</span></span></span></h3>\r\n\r\n<h3><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\"><strong>Keep track of time:</strong> It is essential to manage your time properly during the listening test. You must ensure that you have enough time to complete the form and double-check your answers before the time limit expires. By keeping track of time, you can ensure that you finish the form within the time limit and prevent leaving any gaps empty.</span></span></span></h3>\r\n\r\n<p><strong><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">Now let&rsquo;s move on to sentence completion questions&nbsp;</span></span></span></strong></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">Sentence completion questions are a common type of question found in the IELTS Listening test. They are designed to test your ability to listen for specific information and fill in the gaps in a sentence. In this blog, we will explore what sentence completion questions are and the best way to answer them in the IELTS Listening test.</span></span></span></p>', NULL, NULL, 'text', '2023-04-27 23:22:57', '2023-05-22 04:58:21'),
(75, 9, 92, 'What are Sentence Completion Questions?', NULL, NULL, 'subheadline', '2023-04-27 23:23:58', '2023-04-27 23:23:58'),
(76, 9, 94, '<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">Sentence completion questions require you to listen to a recording and complete a sentence with a missing word or phrase. The missing information may be a single word, a phrase, or a short sentence. The sentence completion questions can be found in any section of the IELTS Listening test, and they may be related to any topic.</span></span></span></p>\r\n\r\n<p><strong><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">The differences between form completion and sentence completion questions:&nbsp;</span></span></span></strong></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\"><strong>Format:</strong> Sentence completion questions require you to fill in the missing information in a single sentence, while form completion questions require you to fill in multiple pieces of information in different sections of a form.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\"><strong>Information type:</strong> Sentence completion questions involve completing a sentence with missing information, such as a word or phrase. Form completion questions involve filling in missing information on a form, such as personal details, dates, addresses, and other specific information.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\"><strong>Structure:</strong> Sentence completion questions focus on completing a single sentence with missing information. Form completion questions require you to fill in multiple pieces of information, and the missing information can be in different formats and structures.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\"><strong>Time limit: </strong>Both question types have a time limit, but form completion questions can be more time-consuming as you need to fill in multiple pieces of information in different sections of the form.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\"><strong>Context:</strong> Sentence completion questions rely on the context of the recording to fill in the missing information in a sentence. Form completion questions also rely on context, but you need to have a good understanding of the information required to fill in the missing information on the form.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\"><strong>Skills tested:</strong> Sentence completion questions test your ability to listen for and accurately complete a sentence with missing information. Form completion questions test your ability to listen for and accurately fill in missing information in different sections of a form.</span></span></span></p>\r\n\r\n<p><strong><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">How to Answer Sentence Completion Questions in IELTS Listening</span></span></span></strong></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">In conclusion, sentence completion questions in the IELTS Listening test require careful attention to detail and the ability to quickly and accurately process information. By following the tips outlined above, you can improve your chances of accurately completing the questions and achieving a good score on the IELTS Listening test.</span></span></span></p>', NULL, NULL, 'text', '2023-04-27 23:28:50', '2023-04-27 23:28:50'),
(77, 9, 95, 'Should your form completion and sentence completion strategies be similar?', NULL, NULL, 'subheadline', '2023-04-27 23:29:48', '2023-04-27 23:29:48'),
(78, 9, 97, '<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">Sentence completion and form completion questions are two types of IELTS Listening exam questions. While they have some similarities, there are significant distinctions in the skills and tactics required to respond to them.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">Sentence completion questions demand you to listen to a recording and fill in a missing word or phrase in a sentence. You must be able to understand the context and meaning of the sentence, as well as use your grammatical and vocabulary skills to fill in the gaps.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">In contrast, form completion questions demand you to fill out a form based on the information supplied in the audio. This implies you have to understand the form&#39;s structure, the sort of information required, and how the information should be presented.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">While the listening abilities necessary for sentence completion and form completion questions may overlap, the strategies and techniques used to answer these questions may differ. For example, when answering sentence completion questions, you may need to concentrate more on the context and content of the sentence, whereas when answering form completion questions, you may need to concentrate more on the form&#39;s structure and the sort of information requested.</span></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">In terms of preparation, it is crucial to practice both sorts of questions in order to improve your general listening abilities and become acquainted with the many question types that may occur in the IELTS Listening test.</span></span></span></p>', NULL, NULL, 'text', '2023-04-27 23:34:45', '2023-04-27 23:34:45'),
(79, 10, 98, '<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">Ready to conquer the IELTS reading test and show off your English proficiency? Look no further! This blog post is your ultimate guide to acing the test and achieving your dream scores. Whether you&#39;re a non-native speaker or simply looking to improve your reading skills, these valuable tips and strategies will help you succeed. So let&#39;s dive in and get you one step closer to your goals!</span></span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial\"><span style=\"color:#000000\">The IELTS reading test is divided into three sections, each of which becomes increasingly challenging as the test progresses. Candidates must answer 40 questions in total within these parts, with each question testing distinct reading skills. The purpose of the reading test is to assess a candidate&#39;s ability to:</span></span></span></p>', NULL, NULL, 'text', '2023-04-27 23:56:36', '2023-05-22 05:00:27'),
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
(2, 'Minar', 'minar@gmail.com', NULL, NULL, 2, '$2y$10$WlIzmGvLGaI0mc/wW1Wu2eV4uxHBOv7cMSqGQaI8Q5aXOxxQFPD/y', NULL, '2023-03-10 05:03:43', '2023-03-10 05:03:43'),
(7, 'Minar Ahmed', 'minar.barc@gmail.com', NULL, NULL, 2, '$2y$10$sTSvx/X.760f0pMY.XBf2Ok23EbxoMS5qCjrJu3yRlpeGVN2Xwx4S', NULL, '2023-03-28 00:44:34', '2023-03-28 00:44:34'),
(11, 'test today', 'testtoday@gmail.com', NULL, NULL, 2, '$2y$10$JHiIQdiBhrncKVt0IiE0quA1TBsxGMJToqZ.Vjhg0jt2sHMTPkp4u', NULL, '2023-05-03 00:01:07', '2023-05-03 00:01:07');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
