-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 03, 2021 at 09:43 PM
-- Server version: 10.2.32-MariaDB-log-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `devshahi_problem`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_sliders`
--

CREATE TABLE `about_sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_sliders`
--

INSERT INTO `about_sliders` (`id`, `title`, `image`, `status`, `created_at`, `updated_at`) VALUES
(10, 'Programming Contest (SEU)', 'uploads/slider/1688479157352498.jpg', 1, '2021-01-10 00:13:26', '2021-01-10 00:14:44'),
(11, 'Teaching C Programming', 'uploads/slider/1688479184771091.jpg', 1, '2021-01-10 00:13:52', '2021-01-10 00:14:43'),
(12, 'Southeast University', 'uploads/slider/1688479230702067.jpg', 1, '2021-01-10 00:14:36', '2021-01-10 06:58:50'),
(13, 'Paradise Coffee House', 'uploads/slider/1693224833199484.png', 1, '2021-03-03 09:23:55', '2021-03-03 09:24:55'),
(14, 'Chandpur Padma River', 'uploads/slider/1693224911990050.jpg', 1, '2021-03-03 09:25:10', '2021-03-03 09:31:04');

-- --------------------------------------------------------

--
-- Table structure for table `about_texts`
--

CREATE TABLE `about_texts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `top_text` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `bottom_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_texts`
--

INSERT INTO `about_texts` (`id`, `top_text`, `bottom_text`, `created_at`, `updated_at`) VALUES
(17, 'Hello. I\'m Shahin. I\'m a tech enthusiast guy. Personally, I’m Optimistic and always in hurry kinda person. I\'m a freelance web developer. I study CSE in South-East university.', 'I started my career as a Web Designer. After one year of consistently working in this field, it helped me a lot in gaining vast knowledge about business, marketing, and user experience too. I\'ve tried a few more things to understand customer satisfaction, Business engagement & marketing including E-commerce business, Portfolio, Blogging, Youtube and etc.', '2021-01-05 22:43:26', '2021-03-03 09:03:25');

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `role` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `phone`, `image`, `status`, `role`) VALUES
(7, 'Shahin', 'shahin@gmail.com', NULL, '$2y$10$HhVnGWE/wVjrLsD2fxXHKuQ/5EH9vR8fa2Exu/p2FCheEyQ52jPwW', NULL, '2021-01-15 06:07:21', '2021-01-15 06:07:21', '852', 'uploads/admin/1688954408906706.png', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(29, 'PSD To HTML', 'psd-to-html', 1, '2021-01-09 05:50:51', '2021-01-09 05:50:51'),
(31, 'Javascript', 'javascript', 1, '2021-01-09 05:51:17', '2021-01-09 05:51:17'),
(32, 'Wordpress', 'wordpress', 1, '2021-01-09 05:51:59', '2021-01-09 05:51:59'),
(33, 'PHP & Ajax', 'php-ajax', 1, '2021-01-09 05:52:14', '2021-01-09 05:52:22'),
(34, 'Laravel', 'laravel', 1, '2021-01-09 05:52:30', '2021-01-09 05:52:30');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `subject`, `status`, `text`, `created_at`, `updated_at`) VALUES
(9, 'Tanzim Hasan', 'tanzim@gmail.com', 'Laravel Puspose', 1, 'As you can see, the original value of the column is passed to the accessor, allowing you to manipulate and return the value. To access the value of the accessor, you may simply access the first_name attribute on a model instance:', '2021-01-17 02:54:13', '2021-01-17 02:55:42'),
(10, 'Farhana Habib Tamanna', 'tamanna@gmail.com', 'PHP purpose', 1, 'class TodoList extends Model\r\n{\r\n    protected $guarded = [];\r\n    public function admin(){\r\n        return $this->belongsTo(Admin::class,\'admin_id\');\r\n    }\r\n    public function getCreatedAtAttribute($value)\r\n    {\r\n        $carbonDate = new Carbon($value);\r\n        return $carbonDate->diffForHumans();\r\n    }\r\n}', '2021-01-18 09:05:20', '2021-01-18 09:05:47');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `title`, `image`, `status`, `created_at`, `updated_at`) VALUES
(10, 'Chandpur -boro station', 'uploads/gallery/1688504724823618.png', 1, '2021-01-10 06:59:49', '2021-01-10 06:59:56'),
(11, 'Programming Contest (SEU)', 'uploads/gallery/1688504742860551.jpg', 1, '2021-01-10 07:00:06', '2021-01-10 07:00:06'),
(12, 'Teaching C Programming', 'uploads/gallery/1688504755813668.jpg', 1, '2021-01-10 07:00:18', '2021-01-10 07:00:32'),
(13, 'Chandpur Padma River', 'uploads/gallery/1693224862568410.jpg', 1, '2021-03-03 09:24:23', '2021-03-03 09:24:23'),
(14, 'Paradise Coffee House', 'uploads/gallery/1693224884174725.jpg', 1, '2021-03-03 09:24:43', '2021-03-03 09:24:43');

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
(4, '2014_10_12_000000_create_admins_table', 2),
(5, '2014_10_12_100000_create_password_resets_table', 2),
(6, '2019_08_19_000000_create_failed_jobs_table', 2),
(7, '2020_12_26_134112_create_categories_table', 2),
(8, '2021_01_04_135936_create_about_texts_table', 3),
(9, '2021_01_05_141724_create_site_identities_table', 4),
(10, '2021_01_06_022648_create_social_links_table', 5),
(11, '2021_01_06_073620_create_programmings_table', 6),
(12, '2021_01_07_044926_create_about_sliders_table', 7),
(13, '2021_01_07_121221_create_galleries_table', 8),
(15, '2021_01_09_120037_create_projects_table', 9),
(17, '2021_01_15_051328_add_new_columns_on_admin_table', 10),
(18, '2021_01_16_064009_create_contacts_table', 11),
(19, '2021_01_18_140209_create_todo_lists_table', 12);

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
-- Table structure for table `programmings`
--

CREATE TABLE `programmings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `programmings`
--

INSERT INTO `programmings` (`id`, `title`, `link`, `type`, `created_at`, `updated_at`) VALUES
(7, 'Stack', '#', 1, '2021-01-07 06:09:06', '2021-01-07 06:09:06'),
(8, 'Queue', '#', 1, '2021-01-09 05:53:33', '2021-01-09 05:53:33'),
(9, 'URI', '#', 2, '2021-01-10 08:03:28', '2021-01-10 08:03:28'),
(10, 'Link List', 'https://github.com/AR-Shahin/Data_Structure_and_Algorithm/tree/main/Link_list', 1, '2021-03-03 09:08:13', '2021-03-03 09:08:13'),
(11, 'Tree', 'https://github.com/AR-Shahin/Data_Structure_and_Algorithm/tree/main/Tree', 1, '2021-03-03 09:12:05', '2021-03-03 09:12:05');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumb_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `github` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `live` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `category_id`, `title`, `image`, `thumb_image`, `status`, `youtube`, `github`, `live`, `created_at`, `updated_at`) VALUES
(7, 32, 'Organic Ecommerce Website', 'uploads/project/1688479083885688.jpg', 'uploads/project/1688479083885691.jpg', 1, '#', '#', '#', '2021-01-10 00:12:16', '2021-01-10 08:26:50'),
(8, 29, 'Dental Hospital', 'uploads/project/1688510236827503.jpg', 'uploads/project/1688510236827506.jpg', 1, '#', '#', '#', '2021-01-10 08:27:25', '2021-01-10 08:27:25'),
(9, 32, 'E-commerce Website', 'uploads/project/1688514611654056.jpg', 'uploads/project/1688514611654061.jpg', 1, '#', '#', '#', '2021-01-10 09:36:58', '2021-03-03 09:13:24'),
(10, 34, 'E-commerce Website', 'uploads/project/1693224308162562.png', 'uploads/project/1693224308162575.png', 1, 'https://www.youtube.com/watch?v=MQPnWv4mx1A&list=PLnhrpn1DBwx7Hn2C6nChGRS14T24qVybY&index=3', '#', '#', '2021-03-03 09:15:34', '2021-03-03 09:15:34'),
(11, 34, 'Blog Website', 'uploads/project/1693224534667820.png', 'uploads/project/1693224534667834.png', 1, 'https://www.youtube.com/watch?v=CbpI76_onFw&list=PLnhrpn1DBwx7Hn2C6nChGRS14T24qVybY&index=4', '#', '#', '2021-03-03 09:19:10', '2021-03-03 09:19:10'),
(12, 34, 'Blog Website', 'uploads/project/1693224536143837.png', 'uploads/project/1693224536143864.png', 1, 'https://www.youtube.com/watch?v=CbpI76_onFw&list=PLnhrpn1DBwx7Hn2C6nChGRS14T24qVybY&index=4', '#', '#', '2021-03-03 09:19:12', '2021-03-03 09:19:12');

-- --------------------------------------------------------

--
-- Table structure for table `site_identities`
--

CREATE TABLE `site_identities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resume` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `site_identities`
--

INSERT INTO `site_identities` (`id`, `logo`, `phone`, `email`, `address`, `resume`, `created_at`, `updated_at`) VALUES
(14, 'uploads/site/1688509342286321.png', '+8801754100439', 'mdshahinmije96@gmail.com', 'Mohakhali,Dhaka,Bangladesh', 'https://drive.google.com/file/d/1xnePZOWiFQOj2EXroNYVC87T3WWVAb2K/view?usp=sharing', '2021-01-09 04:04:17', '2021-03-03 09:06:23');

-- --------------------------------------------------------

--
-- Table structure for table `social_links`
--

CREATE TABLE `social_links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `github` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `social_links`
--

INSERT INTO `social_links` (`id`, `facebook`, `twitter`, `github`, `youtube`, `instagram`, `linkedin`, `created_at`, `updated_at`) VALUES
(9, 'https://www.facebook.com/arshahin.111', 'https://twitter.com/Shahin85080084', 'https://github.com/AR-Shahin', 'https://www.youtube.com/channel/UCYxtDC_GVan9l1NFNthS3aQ', 'https://www.instagram.com/anisur_rahaman_shahin/', 'https://www.linkedin.com/in/anisur-rahman-shahin-31295b186/', '2021-01-05 23:09:16', '2021-03-03 09:00:14');

-- --------------------------------------------------------

--
-- Table structure for table `todo_lists`
--

CREATE TABLE `todo_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `todo_lists`
--

INSERT INTO `todo_lists` (`id`, `title`, `admin_id`, `text`, `created_at`, `updated_at`) VALUES
(6, 'Varsity Java Code', 7, 'class TodoList extends Model\r\n{\r\n    protected $guarded = [];\r\n    public function admin(){\r\n        return $this->belongsTo(Admin::class,\'admin_id\');\r\n    }\r\n    public function getCreatedAtAttribute($value)\r\n    {\r\n        $carbonDate = new Carbon($value);\r\n        return $carbonDate->diffForHumans();\r\n    }\r\n}', '2021-01-18 09:01:43', '2021-01-18 09:01:43');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
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
-- Indexes for dumped tables
--

--
-- Indexes for table `about_sliders`
--
ALTER TABLE `about_sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `about_texts`
--
ALTER TABLE `about_texts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `programmings`
--
ALTER TABLE `programmings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `projects_category_id_index` (`category_id`);

--
-- Indexes for table `site_identities`
--
ALTER TABLE `site_identities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_links`
--
ALTER TABLE `social_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `todo_lists`
--
ALTER TABLE `todo_lists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `todo_lists_admin_id_index` (`admin_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_sliders`
--
ALTER TABLE `about_sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `about_texts`
--
ALTER TABLE `about_texts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `programmings`
--
ALTER TABLE `programmings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `site_identities`
--
ALTER TABLE `site_identities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `social_links`
--
ALTER TABLE `social_links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `todo_lists`
--
ALTER TABLE `todo_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `todo_lists`
--
ALTER TABLE `todo_lists`
  ADD CONSTRAINT `todo_lists_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
