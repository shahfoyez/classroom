-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2022 at 02:12 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kosai`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

CREATE TABLE `assignments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instruction` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `points` int(255) DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `due_time` time DEFAULT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assignments`
--

INSERT INTO `assignments` (`id`, `title`, `instruction`, `type`, `points`, `due_date`, `due_time`, `post_id`, `user_id`, `created_at`, `updated_at`) VALUES
(6, 'Final Assignment', 'Do it', 'assignment', 100, '2022-02-10', '23:59:00', 30, 3, '2022-02-07 12:05:29', '2022-02-07 12:05:29'),
(7, 'Final Exam', 'FO FO', 'assignment', 100, '2022-02-11', '23:59:00', 31, 1, '2022-02-09 10:36:15', '2022-02-09 10:36:15'),
(8, 'MID TERM', 'DO it', 'assignment', 100, '2022-02-19', '23:59:00', 32, 1, '2022-02-09 10:36:47', '2022-02-09 10:36:47'),
(9, 'Tutorial 01', 'jfvusiw', 'assignment', 100, '2022-02-28', '23:11:00', 34, 1, '2022-02-12 04:32:04', '2022-02-12 04:32:04'),
(10, 'Tutorial 02', 'sfbvsx', 'assignment', 90, NULL, NULL, 36, 1, '2022-03-02 00:37:37', '2022-03-02 00:37:37'),
(11, 'Assignment 01', 'swhr', 'assignment', 20, NULL, NULL, 37, 1, '2022-03-02 04:47:39', '2022-03-02 04:47:39'),
(12, ' Assignment 02', 'tyeh5yte', 'assignment', 80, '2022-03-03', '11:08:00', 38, 1, '2022-03-02 04:48:13', '2022-03-02 04:48:13'),
(13, 'Assignment Test', 'Do it', 'assignment', 40, '2022-03-02', '23:50:00', 39, 1, '2022-03-02 09:58:52', '2022-03-02 09:58:52'),
(14, 'Assignment 1', 'Provide contextual feedback messages for typical user actions with the handful of available and flexible alert messages.', 'assignment', 100, NULL, NULL, 41, 1, '2022-03-09 09:56:49', '2022-03-09 09:56:49'),
(15, 'Friday Task', 'TASK is a not for profit organization created by Government of Telangana for bringing synergy among institutions of Government, Industry & Academia.', 'assignment', 40, '2022-03-12', '11:11:00', 43, 1, '2022-03-11 07:07:42', '2022-03-11 07:07:42');

-- --------------------------------------------------------

--
-- Table structure for table `assignment_attachments`
--

CREATE TABLE `assignment_attachments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `submit_id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assignment_attachments`
--

INSERT INTO `assignment_attachments` (`id`, `submit_id`, `type`, `path`, `created_at`, `updated_at`) VALUES
(19, 20, 'pdf', 'PDF_6769e5105a83b495658657b82811ed47.pdf', '2022-02-16 09:26:19', '2022-02-16 09:26:19'),
(20, 21, 'pdf', 'PDF_6769e5105a83b495658657b82811ed47.pdf', '2022-02-16 09:27:41', '2022-02-16 09:27:41'),
(21, 22, 'pdf', 'PDF_6769e5105a83b495658657b82811ed47.pdf', '2022-02-16 09:28:32', '2022-02-16 09:28:32'),
(22, 23, 'pdf', 'PDF_0e0c6231d6bd9b991a1245358f1bf36f.pdf', '2022-03-02 09:11:45', '2022-03-02 09:11:45'),
(24, 25, 'pdf', 'PDF_0e0c6231d6bd9b991a1245358f1bf36f.pdf', '2022-03-02 09:59:11', '2022-03-02 09:59:11'),
(25, 26, 'pdf', 'PDF_6b0c1647d487ba9f6ca1f05df97b4dc5.pdf', '2022-03-09 12:44:50', '2022-03-09 12:44:50'),
(26, 27, 'pdf', 'PDF_6b0c1647d487ba9f6ca1f05df97b4dc5.pdf', '2022-03-09 13:24:22', '2022-03-09 13:24:22'),
(27, 28, 'pdf', 'PDF_58605e1b31d87d4617f2dc49caf455d0.pdf', '2022-03-10 10:41:30', '2022-03-10 10:41:30'),
(28, 29, 'pdf', 'PDF_55c3c25e2340ccde73b1ff34288e89b0.pdf', '2022-03-11 07:08:44', '2022-03-11 07:08:44');

-- --------------------------------------------------------

--
-- Table structure for table `assignment_submissions`
--

CREATE TABLE `assignment_submissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `assignment_id` bigint(20) UNSIGNED NOT NULL,
  `classroom_id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assignment_submissions`
--

INSERT INTO `assignment_submissions` (`id`, `assignment_id`, `classroom_id`, `post_id`, `user_id`, `created_at`, `updated_at`) VALUES
(20, 9, 1, 34, 3, '2022-02-16 09:26:19', '2022-02-16 09:26:19'),
(21, 9, 1, 34, 6, '2022-02-16 09:27:41', '2022-02-16 09:27:41'),
(22, 9, 1, 34, 2, '2022-02-16 09:28:32', '2022-02-16 09:28:32'),
(23, 12, 1, 38, 8, '2022-03-02 09:11:45', '2022-03-02 09:11:45'),
(25, 13, 1, 39, 8, '2022-03-02 09:59:11', '2022-03-02 09:59:11'),
(26, 6, 2, 30, 2, '2022-03-09 12:44:50', '2022-03-09 12:44:50'),
(27, 9, 1, 34, 8, '2022-03-09 13:24:22', '2022-03-09 13:24:22'),
(28, 6, 2, 30, 1, '2022-03-10 10:41:30', '2022-03-10 10:41:30'),
(29, 15, 1, 43, 2, '2022-03-11 07:08:44', '2022-03-11 07:08:44');

-- --------------------------------------------------------

--
-- Table structure for table `attachments`
--

CREATE TABLE `attachments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attachments`
--

INSERT INTO `attachments` (`id`, `post_id`, `path`, `created_at`, `updated_at`) VALUES
(1, 1, 'IMG_744f9d579f9ffee5dc27212ab3808c77.jpg', '2022-01-16 07:00:49', '2022-01-16 07:00:49'),
(2, 2, 'IMG_ae5c84e2d704e84e3ce028c221a5bd65.jpg', '2022-01-16 07:35:06', '2022-01-16 07:35:06'),
(3, 5, 'IMG_e11d190f25fb298cefd57861e70a8585.jpg', '2022-01-16 09:02:30', '2022-01-16 09:02:30'),
(4, 6, 'IMG_09f8758777bf144bc13a861ef0bfdcc0.jpg', '2022-01-18 09:08:21', '2022-01-18 09:08:21'),
(24, 32, 'IMG_3199062da64c150d14f5b5839c6c7d64.jpg', '2022-02-09 10:36:47', '2022-02-09 10:36:47'),
(25, 34, 'IMG_6b7120d455b95513a32b0be06caab334.jpg', '2022-02-12 04:32:04', '2022-02-12 04:32:04'),
(26, 39, 'IMG_7b972dd5f62b92413524c58927fe6887.jpg', '2022-03-02 09:58:52', '2022-03-02 09:58:52'),
(27, 41, 'IMG_66f48352013c2cd09e4dcd0f51fcaa79.jpg', '2022-03-09 09:56:49', '2022-03-09 09:56:49'),
(28, 42, 'IMG_0dd2fe90926f5151dc44129a9153d16a.jpg', '2022-03-11 07:04:39', '2022-03-11 07:04:39'),
(29, 43, 'IMG_cd79c985411d834e1e755eef59e32268.jpg', '2022-03-11 07:07:42', '2022-03-11 07:07:42');

-- --------------------------------------------------------

--
-- Table structure for table `classrooms`
--

CREATE TABLE `classrooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `section` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `classrooms`
--

INSERT INTO `classrooms` (`id`, `name`, `section`, `subject`, `created_by`, `code`, `created_at`, `updated_at`) VALUES
(1, 'CSE-4221 Artificial Intellegence', 'C', 'CSE', 1, '8qHG1', '2022-01-16 06:12:50', '2022-01-16 06:12:50'),
(2, 'EEE-2424 Microprocessor', 'C', 'EEE', 3, 'JwWik', '2022-01-16 06:17:29', '2022-01-16 06:17:29'),
(3, 'ART-2111 BGS', 'C', 'ART', 1, 'Xyqlr', '2022-01-18 11:44:07', '2022-01-18 11:44:07'),
(4, 'CSE-4245 Human', 'C', 'AI', 3, 'Q4BlG', '2022-02-06 11:10:08', '2022-02-06 11:10:08'),
(5, 'CSE 2121 AI', 'C', 'AI', 1, 'xtXU4', '2022-03-02 02:25:54', '2022-03-02 02:25:54'),
(6, 'CSE 2113 ML', 'C', 'ML', 1, '0bWww', '2022-03-02 02:26:18', '2022-03-02 02:26:18'),
(7, 'EEE-2212', 'c', 'EEE', 1, '36SRG', '2022-03-09 08:23:19', '2022-03-09 08:23:19'),
(8, 'EEE-2212', 'c', 'EEE', 1, 'LEf6A', '2022-03-09 08:23:21', '2022-03-09 08:23:21');

-- --------------------------------------------------------

--
-- Table structure for table `classroom_members`
--

CREATE TABLE `classroom_members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `classroom_id` bigint(20) UNSIGNED NOT NULL,
  `is_teacher` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `classroom_members`
--

INSERT INTO `classroom_members` (`id`, `user_id`, `classroom_id`, `is_teacher`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '2022-01-16 06:12:50', '2022-01-16 06:12:50'),
(2, 3, 2, 1, '2022-01-16 06:17:29', '2022-01-16 06:17:29'),
(3, 2, 2, 0, '2022-01-16 06:18:25', '2022-01-16 06:18:25'),
(4, 1, 2, 0, '2022-01-16 06:19:24', '2022-01-16 06:19:24'),
(5, 3, 1, 0, '2022-01-16 06:38:01', '2022-01-16 06:38:01'),
(6, 2, 1, 0, '2022-01-16 06:38:35', '2022-01-16 06:38:35'),
(7, 1, 3, 1, '2022-01-18 11:44:07', '2022-01-18 11:44:07'),
(8, 3, 4, 1, '2022-02-06 11:10:08', '2022-02-06 11:10:08'),
(9, 5, 2, 0, '2022-02-09 09:51:51', '2022-02-09 09:51:51'),
(10, 6, 1, 0, '2022-02-12 14:08:02', '2022-02-12 14:08:02'),
(11, 1, 5, 1, '2022-03-02 02:25:54', '2022-03-02 02:25:54'),
(12, 1, 6, 1, '2022-03-02 02:26:18', '2022-03-02 02:26:18'),
(13, 8, 1, 0, '2022-03-02 09:11:19', '2022-03-02 09:11:19'),
(14, 1, 7, 1, '2022-03-09 08:23:19', '2022-03-09 08:23:19'),
(15, 1, 8, 1, '2022-03-09 08:23:21', '2022-03-09 08:23:21'),
(16, 2, 8, 0, '2022-03-09 08:25:40', '2022-03-09 08:25:40'),
(17, 10, 1, 0, '2022-03-09 09:30:38', '2022-03-09 09:30:38'),
(18, 11, 1, 0, '2022-03-09 09:31:43', '2022-03-09 09:31:43'),
(19, 12, 1, 0, '2022-03-09 09:32:33', '2022-03-09 09:32:33'),
(20, 13, 1, 0, '2022-03-09 09:33:21', '2022-03-09 09:33:21'),
(21, 14, 1, 0, '2022-03-09 09:34:11', '2022-03-09 09:34:11'),
(22, 15, 1, 0, '2022-03-09 09:34:58', '2022-03-09 09:34:58'),
(23, 16, 1, 0, '2022-03-09 09:36:03', '2022-03-09 09:36:03'),
(24, 17, 1, 0, '2022-03-09 09:36:57', '2022-03-09 09:36:57'),
(25, 18, 1, 0, '2022-03-09 09:38:40', '2022-03-09 09:38:40');

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
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `points` int(11) NOT NULL,
  `as_id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`id`, `points`, `as_id`, `type`, `created_at`, `updated_at`) VALUES
(24, 30, 25, 'assignment', '2022-03-02 09:59:41', '2022-03-02 09:59:41'),
(26, 98, 21, 'assignment', '2022-03-09 13:05:06', '2022-03-09 13:20:19'),
(27, 22, 22, 'assignment', '2022-03-09 13:14:09', '2022-03-09 13:14:09'),
(28, 55, 20, 'assignment', '2022-03-09 13:19:08', '2022-03-09 13:19:50'),
(29, 22, 29, 'assignment', '2022-03-11 07:10:04', '2022-03-11 07:10:04');

-- --------------------------------------------------------

--
-- Table structure for table `industry_works`
--

CREATE TABLE `industry_works` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instruction` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `points` int(11) DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `due_time` time DEFAULT NULL,
  `classroom_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `industry_works`
--

INSERT INTO `industry_works` (`id`, `title`, `instruction`, `type`, `subject`, `image`, `points`, `due_date`, `due_time`, `classroom_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Work 1 CSE', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using.', 'work', 'CSE', NULL, 40, '2022-03-02', '01:21:00', NULL, 7, '2022-03-02 01:24:55', '2022-03-09 11:07:31'),
(2, 'Work 2', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using', 'work', 'CSE', NULL, 40, NULL, NULL, 1, 7, '2022-03-02 01:26:18', '2022-03-11 07:11:09'),
(3, 'Work 3', 'Do it', 'work', 'EEE', NULL, 10, NULL, NULL, NULL, 7, '2022-03-02 02:01:13', '2022-03-02 02:01:13'),
(4, 'Work 4', 'Do it', 'work', 'CSE', NULL, 100, NULL, NULL, 1, 7, '2022-03-02 02:01:40', '2022-03-10 10:38:19'),
(5, 'Work 4', 'DO it', 'work', 'CSE', 'IMG_fd7f868c57433fd6419cf37f4ab21865.jpg', 40, NULL, NULL, 1, 7, '2022-03-02 02:07:31', '2022-03-10 10:38:42'),
(6, 'Web Project', 'Do it', 'work', 'CSE', 'IMG_b7c5409375f56f7e42b32f60d06010ac.jpg', 100, NULL, NULL, 1, 7, '2022-03-02 10:02:43', '2022-03-10 10:37:45'),
(7, 'New Job', 'Do it', 'work', 'CSE', 'IMG_ed71460c594d8d0584d48f43b97278fe.jpg', 30, NULL, NULL, 1, 7, '2022-03-02 23:05:20', '2022-03-09 14:00:56'),
(8, 'Job !', 'Do it', 'work', 'EEE', NULL, 100, NULL, NULL, 2, 9, '2022-03-02 23:09:57', '2022-03-09 10:47:27'),
(9, 'Art Job', 'Do it', 'work', 'AI', NULL, 100, NULL, NULL, NULL, 9, '2022-03-02 23:11:47', '2022-03-02 23:11:47'),
(11, 'Web for ecommerce', 'I\'m interested in knowing how this works behind the scenes. It strikes me as though sorting the collection with happens inside the Laravel Engine (in PHP).', 'work', 'CSE', 'IMG_2d97cc022b18fce747b6f2f79d55e725.jpg', 30, '2022-03-12', '11:11:00', 1, 7, '2022-03-09 11:02:14', '2022-03-09 11:08:07');

-- --------------------------------------------------------

--
-- Table structure for table `industry_work_submits`
--

CREATE TABLE `industry_work_submits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `iw_id` bigint(20) UNSIGNED NOT NULL,
  `classroom_id` bigint(20) UNSIGNED NOT NULL,
  `attachment_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `industry_work_submits`
--

INSERT INTO `industry_work_submits` (`id`, `iw_id`, `classroom_id`, `attachment_path`, `user_id`, `created_at`, `updated_at`) VALUES
(6, 8, 2, 'PDF_58605e1b31d87d4617f2dc49caf455d0.pdf', 1, '2022-03-10 10:39:32', '2022-03-10 10:39:32');

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
(5, '2022_01_05_204734_create_classrooms_table', 1),
(6, '2022_01_06_191237_create_classroom_members_table', 1),
(7, '2022_01_16_091841_create_posts_table', 1),
(8, '2022_01_16_092835_create_attachments_table', 1),
(15, '2022_01_18_162311_create_assignments_table', 2),
(16, '2022_02_07_140532_create_assignment_submissions_table', 2),
(17, '2022_02_07_140856_create_assignment_attachments_table', 2),
(18, '2022_02_10_185533_create_grades_table', 3),
(23, '2022_02_22_144453_create_industry_works_table', 4),
(24, '2022_03_10_145817_create_industry_work_submits_table', 5);

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
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `classroom_id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `classroom_id`, `type`, `title`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'general', 'Welcome Class', 1, '2022-01-16 07:00:49', '2022-01-16 07:00:49'),
(2, 1, 'general', 'Tommorow is your exam everyone. Get prepare.', 1, '2022-01-16 07:35:06', '2022-01-16 07:35:06'),
(3, 2, 'general', 'Hello Class', 3, '2022-01-16 08:11:31', '2022-01-16 08:11:31'),
(4, 1, 'general', 'Hello Batija', 1, '2022-01-16 08:47:51', '2022-01-16 08:47:51'),
(5, 1, 'general', 'Batija Ashraf', 1, '2022-01-16 09:02:30', '2022-01-16 09:02:30'),
(6, 2, 'general', 'Hi guys', 3, '2022-01-18 09:08:21', '2022-01-18 09:08:21'),
(12, 1, 'general', 'dheh', 1, '2022-01-19 10:43:43', '2022-01-19 10:43:43'),
(13, 1, 'general', 'etheh', 1, '2022-01-19 10:48:37', '2022-01-19 10:48:37'),
(30, 2, 'assignment', 'Final', 3, '2022-02-07 12:05:29', '2022-02-07 12:05:29'),
(31, 1, 'assignment', 'Final Exam', 1, '2022-02-09 10:36:15', '2022-02-09 10:36:15'),
(32, 1, 'assignment', 'MID TERM', 1, '2022-02-09 10:36:47', '2022-02-09 10:36:47'),
(33, 1, 'general', 'hello', 1, '2022-02-12 04:31:24', '2022-02-12 04:31:24'),
(34, 1, 'assignment', 'khfbv', 1, '2022-02-12 04:32:03', '2022-02-12 04:32:03'),
(35, 1, 'general', 'efvs', 1, '2022-02-13 06:00:48', '2022-02-13 06:00:48'),
(36, 1, 'assignment', 'jkhsvb', 1, '2022-03-02 00:37:37', '2022-03-02 00:37:37'),
(37, 1, 'assignment', 'gbdgh', 1, '2022-03-02 04:47:39', '2022-03-02 04:47:39'),
(38, 1, 'assignment', 'fgentth', 1, '2022-03-02 04:48:13', '2022-03-02 04:48:13'),
(39, 1, 'assignment', 'Assignment Test', 1, '2022-03-02 09:58:52', '2022-03-02 09:58:52'),
(40, 3, 'general', 'Hey class!', 1, '2022-03-09 09:49:02', '2022-03-09 09:49:02'),
(41, 3, 'assignment', 'Assignment 1', 1, '2022-03-09 09:56:49', '2022-03-09 09:56:49'),
(42, 1, 'general', 'Happy Friday', 1, '2022-03-11 07:04:38', '2022-03-11 07:04:38'),
(43, 1, 'assignment', 'Friday Task', 1, '2022-03-11 07:07:42', '2022-03-11 07:07:42');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `username`, `email`, `image`, `password`, `role`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Shah', 'Fayez', 'foyez', 'foyez@gmail.com', 'IMG_8069824a461d21597ef408400bfe15bd.jpg', '$2y$10$Nn6MN/qrMULbekxlMaLPSuceXfRhoD3IHflOH3GU3BP8/XOsMWVf2', 2, NULL, NULL, '2022-01-16 06:12:36', '2022-01-16 06:12:36'),
(2, 'Ashraf', 'Muhammed', 'ashraf', 'ashraf@gmail.com', 'IMG_e6a7070ffd72d065e4ceea5f722325a1.jpg', '$2y$10$bVwvnd91DPDZrJ5X8QdfCeI5gF4BCvqpYvjUuBgWhBGmK2wxF8kCq', 1, NULL, NULL, '2022-01-16 06:16:01', '2022-01-16 06:16:01'),
(3, 'Ibrahim', 'Ahmed', 'ib1', 'ib1@gmail.com', 'IMG_5f73d67381bab181328e60f4a333257e.jpg', '$2y$10$JVJRNoBQ0kzpSyUKAuH3nuYrpxRQCeNg0CScmAv7wUCXa/E7z61XG', 2, NULL, NULL, '2022-01-16 06:17:02', '2022-01-16 06:17:02'),
(4, 'shah', 'fayez', 'foyez01', 'ali001@gmail.com', 'IMG_b72403484afdaf8a0eeeb9ba3a833dc5.jpg', '$2y$10$XcGb/QeuM28BCWQNYbepFO5lfOal4om0CObtegDu29R5WpFqcLxfG', 2, NULL, NULL, '2022-01-22 16:17:16', '2022-01-22 16:17:16'),
(5, 'Nilashish', 'Roy', 'nila', 'nila@gmail.com', 'IMG_69e591fa48bf0817e2da00fa2484b59a.jpg', '$2y$10$cAwpXDneh2rbyfw7vHihq.NXX6z3HPciX6deXErP5s3ptCGfEJJh2', 1, NULL, NULL, '2022-02-09 09:51:19', '2022-02-09 09:51:19'),
(6, 'Rahim', 'Miah', 'rahim', 'rahim@gmail.com', 'IMG_e2b6a9a76ed8d75fc8f060c415c94190.jpg', '$2y$10$QLYmOXfsFSPCNtxoAfyIFem4tzFSQIKCoOZgZOYpnssyy6BfYHgNO', 1, NULL, NULL, '2022-02-12 14:07:55', '2022-02-12 14:07:55'),
(7, 'Apex', 'limited', 'apex', 'apex@gmail.com', 'IMG_bafce419e5b8fe211a17fefcd2111b00.jpg', '$2y$10$ocDuEwv4s8xB6KTb6VgMlO6RbKqfwnkKAhl1iFtb5R94d0FPXKara', 3, NULL, NULL, '2022-02-22 08:33:35', '2022-02-22 08:33:35'),
(8, 'Naim', 'Sheikh', 'naim', 'naim@gmail.com', 'IMG_9fea271526fa4bde7ad848e8adad5797.jpg', '$2y$10$uF1nUr3QkIDRBGmMF/UvrO59JHxiKTrowYipSMoCtXhzoNSNyCa.G', 1, NULL, NULL, '2022-03-02 09:10:03', '2022-03-02 09:10:03'),
(9, 'Bata', 'Limited', 'bata', 'bata@gmail.com', 'IMG_d2d1e322c13d0f6ed4344dbd22dac58c.jpg', '$2y$10$UHOlojKehc7KDN2ZmDkODuvD3D0wP/9c31wGNeU2QR5BojbXxdrTC', 3, NULL, NULL, '2022-03-02 23:09:39', '2022-03-02 23:09:39'),
(10, 'Mansur', 'Islam', 'mansur', 'mansur@gmail.com', 'IMG_3cf0d7a3fd3138287e5757ae7edab05e.jpg', '$2y$10$XGKOtx83ub96KyTaiSwCNeC9LiVlh1xVjjQPn/xMZztfuhnVzPJNW', 1, NULL, NULL, '2022-03-09 09:18:02', '2022-03-09 09:18:02'),
(11, 'Abdullah', 'Wasim', 'abdullah', 'abdullah@gmail.com', 'IMG_978a32145b3116050bb318f459d9d8d5.jpg', '$2y$10$c/xnOm.FVOsNuoeDNqUUcuVS4prILg3dM8p4SbfsuxXUsOxdPS.tC', 1, NULL, NULL, '2022-03-09 09:31:36', '2022-03-09 09:31:36'),
(12, 'Sultana', 'Islan', 'sulthana', 'sulthana@gmail.com', 'IMG_4759fde96427ee1a33fe8ac7df2103fd.jpg', '$2y$10$qjxhxKDDNYu8T06h6Ui1gOs4tK0EqLLKSGM5QWMQu1Eu2LynxfNoy', 1, NULL, NULL, '2022-03-09 09:32:26', '2022-03-09 09:32:26'),
(13, 'Farid', 'Muhammed', 'farid', 'farid@gmail.com', 'IMG_c6eb9e2c049a7132852fb68f1a0246d8.jpg', '$2y$10$mU0Mm5bIyQjZsE9twiThxerPm2hgATyzTm2m9xFfmX41pS4.3QYmq', 1, NULL, NULL, '2022-03-09 09:33:09', '2022-03-09 09:33:09'),
(14, 'Enamul', 'Islam', 'enam', 'enam@gmail.com', 'IMG_9473252d071c03fecfdae7093603eb60.jpg', '$2y$10$53Ouozuwb0SKVpFnmPi8X.CcaIbdfzPxG5bMG.RpmnDKdPpgkds0S', 1, NULL, NULL, '2022-03-09 09:34:00', '2022-03-09 09:34:00'),
(15, 'Habibur', 'Rahman', 'habibur', 'habibur@gmail.com', 'IMG_d41449bac8953f870d3cda6f7392a9b0.jpg', '$2y$10$lP2pGztECz.GJ0vaBE9xI.q6URFhAT7eog0YDLFZ.aJVajz8IPrxa', 1, NULL, NULL, '2022-03-09 09:34:50', '2022-03-09 09:34:50'),
(16, 'Suhel', 'Miah', 'suhel', 'suhel@gmail.com', 'IMG_cc393ccac32076f08d2beafdac0828e2.jpg', '$2y$10$LrCxhTMjfZPBzePJJF073.houDPQ51/jJ/5N.VIM56lvBTMePV9Tu', 1, NULL, NULL, '2022-03-09 09:35:52', '2022-03-09 09:35:52'),
(17, 'Yasmin', 'Chowdhuri', 'yasmin', 'yasmin@gmail.com', 'IMG_b385f9379d357183b74a930c5a55d54c.jpg', '$2y$10$yRNs0j.tkLAibwX5Y0UbWe91sUMeZwRWNvliJJr6TUf6lAG8ys9vG', 1, NULL, NULL, '2022-03-09 09:36:46', '2022-03-09 09:36:46'),
(18, 'Naim', 'Ahmed', 'ahmed', 'ahmed@gmail.com', 'IMG_95a5ea128113733e47e0ff9a61a89634.jpg', '$2y$10$Ko9lrWySDUdR7iWQTeMV0ePrc64CDLpS073u8WVX3j.0H8MOV4Mfe', 1, NULL, NULL, '2022-03-09 09:38:29', '2022-03-09 09:38:29'),
(19, 'Square', 'Limited', 'square', 'square@gmail.com', 'IMG_0983b023dc44d761e1567f5b9943a4d4.jpg', '$2y$10$L6u56debozPatBSO4dmI/ulh5Cqjch3aVIxRDkZXaApHNCg4xjbmy', 3, NULL, NULL, '2022-03-09 10:04:48', '2022-03-09 10:04:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignments`
--
ALTER TABLE `assignments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `assignments_post_id_index` (`post_id`),
  ADD KEY `assignments_user_id_index` (`user_id`);

--
-- Indexes for table `assignment_attachments`
--
ALTER TABLE `assignment_attachments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `assignment_attachments_submit_id_index` (`submit_id`);

--
-- Indexes for table `assignment_submissions`
--
ALTER TABLE `assignment_submissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `assignment_submissions_assignment_id_index` (`assignment_id`),
  ADD KEY `assignment_submissions_classroom_id_index` (`classroom_id`),
  ADD KEY `assignment_submissions_post_id_index` (`post_id`),
  ADD KEY `assignment_submissions_user_id_index` (`user_id`);

--
-- Indexes for table `attachments`
--
ALTER TABLE `attachments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attachments_post_id_index` (`post_id`);

--
-- Indexes for table `classrooms`
--
ALTER TABLE `classrooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `classrooms_created_by_index` (`created_by`);

--
-- Indexes for table `classroom_members`
--
ALTER TABLE `classroom_members`
  ADD PRIMARY KEY (`id`),
  ADD KEY `classroom_members_user_id_index` (`user_id`),
  ADD KEY `classroom_members_classroom_id_index` (`classroom_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `grades_as_id_index` (`as_id`);

--
-- Indexes for table `industry_works`
--
ALTER TABLE `industry_works`
  ADD PRIMARY KEY (`id`),
  ADD KEY `industry_works_classroom_id_index` (`classroom_id`),
  ADD KEY `industry_works_user_id_index` (`user_id`);

--
-- Indexes for table `industry_work_submits`
--
ALTER TABLE `industry_work_submits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `industry_work_submits_iw_id_index` (`iw_id`),
  ADD KEY `industry_work_submits_classroom_id_index` (`classroom_id`),
  ADD KEY `industry_work_submits_user_id_index` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
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
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_classroom_id_index` (`classroom_id`),
  ADD KEY `posts_user_id_index` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignments`
--
ALTER TABLE `assignments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `assignment_attachments`
--
ALTER TABLE `assignment_attachments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `assignment_submissions`
--
ALTER TABLE `assignment_submissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `attachments`
--
ALTER TABLE `attachments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `classrooms`
--
ALTER TABLE `classrooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `classroom_members`
--
ALTER TABLE `classroom_members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `industry_works`
--
ALTER TABLE `industry_works`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `industry_work_submits`
--
ALTER TABLE `industry_work_submits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assignments`
--
ALTER TABLE `assignments`
  ADD CONSTRAINT `assignments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `assignments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `assignment_attachments`
--
ALTER TABLE `assignment_attachments`
  ADD CONSTRAINT `assignment_attachments_submit_id_foreign` FOREIGN KEY (`submit_id`) REFERENCES `assignment_submissions` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `assignment_submissions`
--
ALTER TABLE `assignment_submissions`
  ADD CONSTRAINT `assignment_submissions_assignment_id_foreign` FOREIGN KEY (`assignment_id`) REFERENCES `assignments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `assignment_submissions_classroom_id_foreign` FOREIGN KEY (`classroom_id`) REFERENCES `classrooms` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `assignment_submissions_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `assignment_submissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `attachments`
--
ALTER TABLE `attachments`
  ADD CONSTRAINT `attachments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `classrooms`
--
ALTER TABLE `classrooms`
  ADD CONSTRAINT `classrooms_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `classroom_members`
--
ALTER TABLE `classroom_members`
  ADD CONSTRAINT `classroom_members_classroom_id_foreign` FOREIGN KEY (`classroom_id`) REFERENCES `classrooms` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `classroom_members_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `grades`
--
ALTER TABLE `grades`
  ADD CONSTRAINT `grades_as_id_foreign` FOREIGN KEY (`as_id`) REFERENCES `assignment_submissions` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `industry_works`
--
ALTER TABLE `industry_works`
  ADD CONSTRAINT `industry_works_classroom_id_foreign` FOREIGN KEY (`classroom_id`) REFERENCES `classrooms` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `industry_works_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `industry_work_submits`
--
ALTER TABLE `industry_work_submits`
  ADD CONSTRAINT `industry_work_submits_classroom_id_foreign` FOREIGN KEY (`classroom_id`) REFERENCES `classrooms` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `industry_work_submits_iw_id_foreign` FOREIGN KEY (`iw_id`) REFERENCES `industry_works` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `industry_work_submits_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_classroom_id_foreign` FOREIGN KEY (`classroom_id`) REFERENCES `classrooms` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
