-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 23, 2025 at 07:06 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zoswa`
--

-- --------------------------------------------------------

--
-- Table structure for table `ai_chat_messages`
--

CREATE TABLE `ai_chat_messages` (
  `id` bigint UNSIGNED NOT NULL,
  `session_id` bigint UNSIGNED NOT NULL,
  `role` enum('user','assistant') COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `metadata` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ai_chat_sessions`
--

CREATE TABLE `ai_chat_sessions` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `session_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `context_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `context_id` bigint UNSIGNED DEFAULT NULL,
  `session_data` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `badges`
--

CREATE TABLE `badges` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` enum('achievement','progress','special') COLLATE utf8mb4_unicode_ci NOT NULL,
  `criteria` json NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `certificates`
--

CREATE TABLE `certificates` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `course_id` bigint UNSIGNED NOT NULL,
  `certificate_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `issued_date` date DEFAULT NULL,
  `completion_date` date DEFAULT NULL,
  `completion_percentage` int NOT NULL DEFAULT '100',
  `final_score` decimal(5,2) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `skills_acquired` text COLLATE utf8mb4_unicode_ci,
  `verification_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `certificates`
--

INSERT INTO `certificates` (`id`, `user_id`, `course_id`, `certificate_number`, `title`, `description`, `issued_date`, `completion_date`, `completion_percentage`, `final_score`, `status`, `skills_acquired`, `verification_code`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'CERT-OV6YHK0W', 'Certificate of Completion - Complete Web Development Bootcamp', 'This certifies completion of the course', '2025-09-22', '2025-09-22', 100, 95.50, 'active', '[\"HTML\",\"CSS\",\"JavaScript\"]', 'ieZ7HmrB2WY9EDh7', '2027-09-22 16:43:19', '2025-09-22 16:43:19', '2025-09-22 16:43:19'),
(2, 2, 1, 'CERT-XY6PWACO', 'Certificate of Completion - Complete Web Development Bootcamp', 'This certifies that John Instructor has successfully completed Complete Web Development Bootcamp', '2025-09-19', '2025-09-19', 88, 92.54, 'active', '[\"HTML\",\"CSS\",\"JavaScript\",\"React\",\"Node.js\",\"MongoDB\"]', 'zGUMIZU86ZBzDkL1', '2027-09-22 16:48:33', '2025-09-22 16:48:33', '2025-09-22 16:48:33'),
(3, 3, 1, 'CERT-MQ4HGDPB', 'Certificate of Completion - Complete Web Development Bootcamp', 'This certifies that Jane Student has successfully completed Complete Web Development Bootcamp', '2025-09-19', '2025-09-14', 89, 98.81, 'active', '[\"HTML\",\"CSS\",\"JavaScript\",\"React\",\"Node.js\",\"MongoDB\"]', 'BuleQkD27mVVmY3A', '2027-09-22 16:48:33', '2025-09-22 16:48:33', '2025-09-22 16:48:33'),
(4, 3, 2, 'CERT-PMEGHGBC', 'Certificate of Completion - Advanced Full-Stack Development', 'This certifies that Jane Student has successfully completed Advanced Full-Stack Development', '2025-09-15', '2025-09-13', 92, 95.17, 'active', '[\"React\",\"Node.js\",\"GraphQL\",\"Docker\",\"AWS\",\"TypeScript\"]', 'HpoAGzDvgtGgG3j5', '2027-09-22 16:48:33', '2025-09-22 16:48:33', '2025-09-22 16:48:33');

-- --------------------------------------------------------

--
-- Table structure for table `code_labs`
--

CREATE TABLE `code_labs` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `instructions` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_id` bigint UNSIGNED NOT NULL,
  `programming_language` enum('javascript','python','php','java','cpp','html','css') COLLATE utf8mb4_unicode_ci NOT NULL,
  `starter_code` json DEFAULT NULL,
  `solution_code` json DEFAULT NULL,
  `test_cases` json DEFAULT NULL,
  `files` json DEFAULT NULL,
  `difficulty` enum('beginner','intermediate','advanced') COLLATE utf8mb4_unicode_ci NOT NULL,
  `estimated_time` int NOT NULL DEFAULT '30',
  `max_score` int NOT NULL DEFAULT '100',
  `is_published` tinyint(1) NOT NULL DEFAULT '0',
  `order` int NOT NULL DEFAULT '0',
  `hints` json DEFAULT NULL,
  `resources` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` enum('web_development','data_analysis','ai_ml') COLLATE utf8mb4_unicode_ci NOT NULL,
  `difficulty` enum('beginner','intermediate','advanced') COLLATE utf8mb4_unicode_ci NOT NULL,
  `instructor_id` bigint UNSIGNED NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `technologies` json DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estimated_hours` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `title`, `description`, `category`, `difficulty`, `instructor_id`, `price`, `is_active`, `technologies`, `thumbnail`, `estimated_hours`, `created_at`, `updated_at`) VALUES
(1, 'Complete Web Development Bootcamp', 'Learn HTML, CSS, JavaScript, and modern web development frameworks. Build real-world projects and deploy them to production.', 'web_development', 'beginner', 2, 299.99, 1, '[\"HTML\", \"CSS\", \"JavaScript\", \"React\", \"Node.js\", \"MongoDB\"]', NULL, 120, '2025-09-22 16:08:25', '2025-09-22 16:08:25'),
(2, 'Advanced Full-Stack Development', 'Master advanced concepts in full-stack development including microservices, GraphQL, and cloud deployment.', 'web_development', 'advanced', 2, 499.99, 1, '[\"React\", \"Node.js\", \"GraphQL\", \"Docker\", \"AWS\", \"TypeScript\"]', NULL, 180, '2025-09-22 16:08:25', '2025-09-22 16:08:25'),
(3, 'Python Data Analysis Fundamentals', 'Learn data analysis with Python, Pandas, NumPy, and visualization libraries. Work with real datasets.', 'data_analysis', 'intermediate', 2, 199.99, 1, '[\"Python\", \"Pandas\", \"NumPy\", \"Matplotlib\", \"Seaborn\", \"Jupyter\"]', NULL, 80, '2025-09-22 16:08:25', '2025-09-22 16:08:25'),
(4, 'Machine Learning with Python', 'Introduction to machine learning algorithms, model training, and deployment using Python and scikit-learn.', 'ai_ml', 'intermediate', 2, 399.99, 1, '[\"Python\", \"scikit-learn\", \"TensorFlow\", \"Keras\", \"Matplotlib\"]', NULL, 150, '2025-09-22 16:08:25', '2025-09-22 16:08:25'),
(5, 'Deep Learning and Neural Networks', 'Advanced course covering deep learning, neural networks, and AI model deployment.', 'ai_ml', 'advanced', 2, 599.99, 1, '[\"Python\", \"TensorFlow\", \"PyTorch\", \"Keras\", \"CUDA\"]', NULL, 200, '2025-09-22 16:08:25', '2025-09-22 16:08:25');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leaderboards`
--

CREATE TABLE `leaderboards` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `total_points` int NOT NULL DEFAULT '0',
  `projects_completed` int NOT NULL DEFAULT '0',
  `courses_completed` int NOT NULL DEFAULT '0',
  `rank` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `marketplace_bids`
--

CREATE TABLE `marketplace_bids` (
  `id` bigint UNSIGNED NOT NULL,
  `project_id` bigint UNSIGNED NOT NULL,
  `freelancer_id` bigint UNSIGNED NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `delivery_days` int NOT NULL,
  `proposal` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('pending','accepted','rejected') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `marketplace_projects`
--

CREATE TABLE `marketplace_projects` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_id` bigint UNSIGNED NOT NULL,
  `freelancer_id` bigint UNSIGNED DEFAULT NULL,
  `budget_min` decimal(8,2) NOT NULL,
  `budget_max` decimal(8,2) NOT NULL,
  `deadline_days` int NOT NULL,
  `status` enum('open','assigned','in_progress','completed','disputed','cancelled') COLLATE utf8mb4_unicode_ci NOT NULL,
  `required_skills` json NOT NULL,
  `attachments` json DEFAULT NULL,
  `requirements` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `escrow_amount` decimal(8,2) DEFAULT NULL,
  `paypal_transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `assigned_at` timestamp NULL DEFAULT NULL,
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_09_22_111851_create_courses_table', 1),
(5, '2025_09_22_111858_create_projects_table', 1),
(6, '2025_09_22_111902_create_subscriptions_table', 1),
(7, '2025_09_22_111906_create_marketplace_projects_table', 1),
(8, '2025_09_22_111914_create_submissions_table', 1),
(9, '2025_09_22_111920_create_gamification_tables', 1),
(10, '2025_09_22_112044_create_ai_chat_tables', 1),
(11, '2025_09_22_112440_create_oauth_auth_codes_table', 1),
(12, '2025_09_22_112441_create_oauth_access_tokens_table', 1),
(13, '2025_09_22_112442_create_oauth_refresh_tokens_table', 1),
(14, '2025_09_22_112443_create_oauth_clients_table', 1),
(15, '2025_09_22_112444_create_oauth_personal_access_clients_table', 1),
(16, '2025_09_22_142920_create_code_labs_table', 1),
(17, '2025_09_22_150349_create_payment_settings_table', 1),
(18, '2025_09_22_182158_update_certificates_table_structure', 2),
(19, '2025_09_23_055230_create_support_requests_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `client_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('173acf9ccb81e8dfa6578b5deaffe38aebe1399fc5579436c0a37291185dc2a4d5e01569ed98faea', 1, 1, 'Personal Access Token', '[\"admin\"]', 0, '2025-09-22 19:13:10', '2025-09-22 19:13:11', '2026-09-22 21:13:10'),
('3a36f4e810a80c5d61884e121e0ef231ec22c739a8d62ca2b4e05fd4e3da796e978013a32ee9464f', 1, 1, 'Personal Access Token', '[\"admin\"]', 0, '2025-09-22 16:15:21', '2025-09-22 16:15:21', '2026-09-22 18:15:21'),
('73d3c9a7032136bc314b230dbffb20a89709fa10fcbb654629c4546f13308c3078a036c1e60bbb6f', 1, 1, 'test', '[]', 0, '2025-09-22 16:40:26', '2025-09-22 16:40:26', '2026-09-22 18:40:26'),
('813603b35388dd15ca373c5787a8e26c06ab576889316ba95a10d83c5ba3c1cbeb7fd7b4a34cb4b2', 3, 1, 'Personal Access Token', '[\"student\"]', 0, '2025-09-22 19:26:04', '2025-09-22 19:26:05', '2026-09-22 21:26:04'),
('926f4f47fee327afb2d24d40f01ce9e36f39d1910f754ed36df65c63316ceb7904535a5164a75e4b', 1, 1, 'admin-test', '[]', 0, '2025-09-22 17:05:58', '2025-09-22 17:05:58', '2026-09-22 19:05:58'),
('ad51b162b5ac419eee0d43722f9ce76d2530cf493cb193e7161515be5b2b96c106e3732fc70bf371', 1, 1, 'Personal Access Token', '[\"admin\"]', 0, '2025-09-22 19:07:25', '2025-09-22 19:07:26', '2026-09-22 21:07:25'),
('efeea4a804b3414557bd9031c35c3181d5d8bca98fb17fdb50c99e826903b32ab46052779b760af5', 1, 1, 'test-token', '[]', 0, '2025-09-22 16:48:50', '2025-09-22 16:48:50', '2026-09-22 18:48:50');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `client_id` bigint UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'zA4Ey8VOCAckVhAwOJlRCcCRAU0q5I6izHtM9hAQ', NULL, 'http://localhost', 1, 0, 0, '2025-09-22 16:13:10', '2025-09-22 16:13:10');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint UNSIGNED NOT NULL,
  `client_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2025-09-22 16:13:10', '2025-09-22 16:13:10');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `payment_settings`
--

CREATE TABLE `payment_settings` (
  `id` bigint UNSIGNED NOT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_id` text COLLATE utf8mb4_unicode_ci,
  `client_secret` text COLLATE utf8mb4_unicode_ci,
  `webhook_secret` text COLLATE utf8mb4_unicode_ci,
  `sandbox_mode` tinyint(1) NOT NULL DEFAULT '1',
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `settings` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `instructions` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_id` bigint UNSIGNED NOT NULL,
  `order` int NOT NULL,
  `difficulty` enum('beginner','intermediate','advanced') COLLATE utf8mb4_unicode_ci NOT NULL,
  `requirements` json NOT NULL,
  `starter_files` json DEFAULT NULL,
  `expected_outputs` json DEFAULT NULL,
  `max_score` int NOT NULL DEFAULT '100',
  `is_published` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('GQ9dYxxeh8VJS0bRz7Bfzc56RFXqKlRFGdYRwf7j', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibGpRbktvODBQd0pESVVGd29nRFdUbFBDc1dINzNkUEJ5NmlUYlkyaCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1758607640),
('ISyJ1zZpV2iY8x0GXqRlszifEKZcJHR82v8lS6Ln', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibEg0UVdmSmhDUlcwaG1FR3VhRGNOd2NpVEM4RmJFVnJxcXhqWElCdyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1758607665),
('PSuE6IPX4rDR5VmwVnJiWdv6df5veOHm3mjIGPtY', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoib2tWdnZWOUd6RVp2QmUyUjBxVFBPN2hXY3lrZG9uc3hUYm15andxMyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1758576514),
('zI5yN3A86u41DYC2ACfzI83cDogHBHT62BHUvzPv', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNkN5dHZwaWJtNk12MTJ2R2NjSTJLeWN6eXVlVUNhVnZkRzVZdjRVeSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1758576122);

-- --------------------------------------------------------

--
-- Table structure for table `submissions`
--

CREATE TABLE `submissions` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `project_id` bigint UNSIGNED NOT NULL,
  `files` json NOT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `status` enum('submitted','reviewing','approved','rejected','needs_revision') COLLATE utf8mb4_unicode_ci NOT NULL,
  `score` int DEFAULT NULL,
  `feedback` text COLLATE utf8mb4_unicode_ci,
  `reviewed_by` bigint UNSIGNED DEFAULT NULL,
  `reviewed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `course_id` bigint UNSIGNED NOT NULL,
  `project_count` int NOT NULL,
  `duration_days` int NOT NULL,
  `amount_paid` decimal(8,2) NOT NULL,
  `paypal_transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','expired','cancelled','pending') COLLATE utf8mb4_unicode_ci NOT NULL,
  `starts_at` datetime NOT NULL,
  `expires_at` datetime NOT NULL,
  `auto_renewal` tinyint(1) NOT NULL DEFAULT '0',
  `metadata` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `user_id`, `course_id`, `project_count`, `duration_days`, `amount_paid`, `paypal_transaction_id`, `status`, `starts_at`, `expires_at`, `auto_renewal`, `metadata`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 5, 365, 99.99, NULL, 'active', '2025-09-22 18:39:19', '2026-09-22 18:39:19', 0, NULL, '2025-09-22 16:39:19', '2025-09-22 16:39:19'),
(2, 1, 1, 5, 365, 299.99, NULL, 'active', '2025-09-10 18:47:08', '2026-09-22 18:47:08', 0, NULL, '2025-09-22 16:47:08', '2025-09-22 16:47:08'),
(3, 1, 2, 5, 365, 499.99, NULL, 'active', '2025-09-10 18:48:33', '2026-09-22 18:48:33', 0, NULL, '2025-09-22 16:48:33', '2025-09-22 16:48:33'),
(4, 2, 1, 5, 365, 299.99, NULL, 'active', '2025-08-25 18:48:33', '2026-09-22 18:48:33', 0, NULL, '2025-09-22 16:48:33', '2025-09-22 16:48:33'),
(5, 2, 2, 5, 365, 499.99, NULL, 'active', '2025-09-04 18:48:33', '2026-09-22 18:48:33', 0, NULL, '2025-09-22 16:48:33', '2025-09-22 16:48:33'),
(6, 3, 1, 5, 365, 299.99, NULL, 'active', '2025-09-16 18:48:33', '2026-09-22 18:48:33', 0, NULL, '2025-09-22 16:48:33', '2025-09-22 16:48:33'),
(7, 3, 2, 5, 365, 499.99, NULL, 'active', '2025-09-07 18:48:33', '2026-09-22 18:48:33', 0, NULL, '2025-09-22 16:48:33', '2025-09-22 16:48:33');

-- --------------------------------------------------------

--
-- Table structure for table `support_requests`
--

CREATE TABLE `support_requests` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_type` enum('web_development','mobile_app','desktop_app','api_development','database_design','bug_fixing','code_review','consulting','other') COLLATE utf8mb4_unicode_ci NOT NULL,
  `urgency` enum('low','medium','high','urgent') COLLATE utf8mb4_unicode_ci NOT NULL,
  `expected_timeframe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_duration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `budget_min` decimal(10,2) DEFAULT NULL,
  `budget_max` decimal(10,2) DEFAULT NULL,
  `technical_requirements` text COLLATE utf8mb4_unicode_ci,
  `attachments` json DEFAULT NULL,
  `status` enum('pending','in_review','assigned','in_progress','completed','cancelled') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `assigned_to` bigint UNSIGNED DEFAULT NULL,
  `admin_notes` text COLLATE utf8mb4_unicode_ci,
  `responded_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('student','instructor','client','admin') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'student',
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci,
  `profile_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `preferences` json DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `phone`, `bio`, `profile_image`, `is_active`, `preferences`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin User', 'admin@zoswa.com', '2025-09-22 16:08:21', '$2y$12$5Dizvari3YnIem2VRhTs5.7ef0p3OgWgVoNN2Jd2AhjZ07QuUoZU.', 'admin', '+1234567890', 'System Administrator', NULL, 1, NULL, NULL, '2025-09-22 16:08:21', '2025-09-22 16:08:21'),
(2, 'John Instructor', 'instructor@zoswa.com', '2025-09-22 16:08:22', '$2y$12$h2yCe1rRqWw/rfF3Rw1bWe82fjd/3VAnBaVRacsmloLNFkLVsFwN.', 'instructor', '+1234567891', 'Experienced web development instructor with 10+ years of teaching experience.', NULL, 1, NULL, NULL, '2025-09-22 16:08:22', '2025-09-22 16:08:22'),
(3, 'Jane Student', 'student@zoswa.com', '2025-09-22 16:08:23', '$2y$12$JXcskQCYTyUCCqlO4rM/XOu22GsK.FBL4t8rkgDA3p.GeGHnEnpV.', 'student', '+1234567892', 'Computer science student passionate about learning new technologies.', NULL, 1, NULL, NULL, '2025-09-22 16:08:23', '2025-09-22 16:08:23'),
(4, 'Bob Client', 'client@zoswa.com', '2025-09-22 16:08:23', '$2y$12$8COeKuW04BbNELRTKqqXz.Gz73q5LFM54tkjwrta.f.5a6p7ThA/W', 'client', '+1234567893', 'Business owner looking for development services.', NULL, 1, NULL, NULL, '2025-09-22 16:08:23', '2025-09-22 16:08:23'),
(5, 'Alice Developer', 'alice@zoswa.com', '2025-09-22 16:08:24', '$2y$12$HjZEg4hKD/4F8aSgp3ctbecwuIx1aW5DkboGTL4RcM9ATYoMslH3q', 'student', '+1234567894', 'Junior developer looking to improve skills.', NULL, 1, NULL, NULL, '2025-09-22 16:08:24', '2025-09-22 16:08:24'),
(6, 'Mike Coder', 'mike@zoswa.com', '2025-09-22 16:08:25', '$2y$12$XgErqrPWGFP7qLtO4QccjOq.K8a.sPtYV5WhOMkb9ujYbiMC3EfSS', 'student', '+1234567895', 'Self-taught programmer seeking structured learning.', NULL, 1, NULL, NULL, '2025-09-22 16:08:25', '2025-09-22 16:08:25');

-- --------------------------------------------------------

--
-- Table structure for table `user_badges`
--

CREATE TABLE `user_badges` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `badge_id` bigint UNSIGNED NOT NULL,
  `earned_at` timestamp NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ai_chat_messages`
--
ALTER TABLE `ai_chat_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ai_chat_messages_session_id_foreign` (`session_id`);

--
-- Indexes for table `ai_chat_sessions`
--
ALTER TABLE `ai_chat_sessions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ai_chat_sessions_session_id_unique` (`session_id`),
  ADD KEY `ai_chat_sessions_user_id_foreign` (`user_id`);

--
-- Indexes for table `badges`
--
ALTER TABLE `badges`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `certificates`
--
ALTER TABLE `certificates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `certificates_certificate_number_unique` (`certificate_number`),
  ADD UNIQUE KEY `certificates_verification_code_unique` (`verification_code`),
  ADD KEY `certificates_course_id_foreign` (`course_id`),
  ADD KEY `certificates_user_id_course_id_index` (`user_id`,`course_id`),
  ADD KEY `certificates_verification_code_index` (`verification_code`);

--
-- Indexes for table `code_labs`
--
ALTER TABLE `code_labs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `code_labs_course_id_foreign` (`course_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `courses_instructor_id_foreign` (`instructor_id`);

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
-- Indexes for table `leaderboards`
--
ALTER TABLE `leaderboards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `leaderboards_user_id_foreign` (`user_id`);

--
-- Indexes for table `marketplace_bids`
--
ALTER TABLE `marketplace_bids`
  ADD PRIMARY KEY (`id`),
  ADD KEY `marketplace_bids_project_id_foreign` (`project_id`),
  ADD KEY `marketplace_bids_freelancer_id_foreign` (`freelancer_id`);

--
-- Indexes for table `marketplace_projects`
--
ALTER TABLE `marketplace_projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `marketplace_projects_client_id_foreign` (`client_id`),
  ADD KEY `marketplace_projects_freelancer_id_foreign` (`freelancer_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payment_settings`
--
ALTER TABLE `payment_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `projects_course_id_foreign` (`course_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `submissions`
--
ALTER TABLE `submissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `submissions_user_id_foreign` (`user_id`),
  ADD KEY `submissions_project_id_foreign` (`project_id`),
  ADD KEY `submissions_reviewed_by_foreign` (`reviewed_by`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subscriptions_user_id_foreign` (`user_id`),
  ADD KEY `subscriptions_course_id_foreign` (`course_id`);

--
-- Indexes for table `support_requests`
--
ALTER TABLE `support_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `support_requests_assigned_to_foreign` (`assigned_to`),
  ADD KEY `support_requests_status_created_at_index` (`status`,`created_at`),
  ADD KEY `support_requests_country_index` (`country`),
  ADD KEY `support_requests_urgency_index` (`urgency`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_badges`
--
ALTER TABLE `user_badges`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_badges_user_id_foreign` (`user_id`),
  ADD KEY `user_badges_badge_id_foreign` (`badge_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ai_chat_messages`
--
ALTER TABLE `ai_chat_messages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ai_chat_sessions`
--
ALTER TABLE `ai_chat_sessions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `badges`
--
ALTER TABLE `badges`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `certificates`
--
ALTER TABLE `certificates`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `code_labs`
--
ALTER TABLE `code_labs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leaderboards`
--
ALTER TABLE `leaderboards`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `marketplace_bids`
--
ALTER TABLE `marketplace_bids`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `marketplace_projects`
--
ALTER TABLE `marketplace_projects`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payment_settings`
--
ALTER TABLE `payment_settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `submissions`
--
ALTER TABLE `submissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `support_requests`
--
ALTER TABLE `support_requests`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_badges`
--
ALTER TABLE `user_badges`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ai_chat_messages`
--
ALTER TABLE `ai_chat_messages`
  ADD CONSTRAINT `ai_chat_messages_session_id_foreign` FOREIGN KEY (`session_id`) REFERENCES `ai_chat_sessions` (`id`);

--
-- Constraints for table `ai_chat_sessions`
--
ALTER TABLE `ai_chat_sessions`
  ADD CONSTRAINT `ai_chat_sessions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `certificates`
--
ALTER TABLE `certificates`
  ADD CONSTRAINT `certificates_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`),
  ADD CONSTRAINT `certificates_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `code_labs`
--
ALTER TABLE `code_labs`
  ADD CONSTRAINT `code_labs_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_instructor_id_foreign` FOREIGN KEY (`instructor_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `leaderboards`
--
ALTER TABLE `leaderboards`
  ADD CONSTRAINT `leaderboards_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `marketplace_bids`
--
ALTER TABLE `marketplace_bids`
  ADD CONSTRAINT `marketplace_bids_freelancer_id_foreign` FOREIGN KEY (`freelancer_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `marketplace_bids_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `marketplace_projects` (`id`);

--
-- Constraints for table `marketplace_projects`
--
ALTER TABLE `marketplace_projects`
  ADD CONSTRAINT `marketplace_projects_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `marketplace_projects_freelancer_id_foreign` FOREIGN KEY (`freelancer_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`);

--
-- Constraints for table `submissions`
--
ALTER TABLE `submissions`
  ADD CONSTRAINT `submissions_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`),
  ADD CONSTRAINT `submissions_reviewed_by_foreign` FOREIGN KEY (`reviewed_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `submissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD CONSTRAINT `subscriptions_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`),
  ADD CONSTRAINT `subscriptions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `support_requests`
--
ALTER TABLE `support_requests`
  ADD CONSTRAINT `support_requests_assigned_to_foreign` FOREIGN KEY (`assigned_to`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `user_badges`
--
ALTER TABLE `user_badges`
  ADD CONSTRAINT `user_badges_badge_id_foreign` FOREIGN KEY (`badge_id`) REFERENCES `badges` (`id`),
  ADD CONSTRAINT `user_badges_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
