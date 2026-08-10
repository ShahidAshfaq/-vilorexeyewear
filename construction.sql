-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2024 at 04:33 PM
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
-- Database: `construction`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_data`
--

CREATE TABLE `add_data` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `location` varchar(255) NOT NULL,
  `user` varchar(225) NOT NULL,
  `paymentType` varchar(255) NOT NULL,
  `expence` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `custom_date` date NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `add_data`
--

INSERT INTO `add_data` (`id`, `location`, `user`, `paymentType`, `expence`, `description`, `amount`, `custom_date`, `created_at`, `updated_at`) VALUES
(2, 'Admin', 'Admin', 'credit', 'tools', 'why', 765, '2024-07-25', '2024-07-22 12:23:01', '2024-07-22 12:45:18'),
(3, 'David', 'Saleem Shah', 'Debit', 'Waqas Kujar', 'why', 765, '2024-07-25', '2024-07-22 12:24:10', '2024-07-27 12:37:46'),
(4, 'Admin', 'Saleem Shah', 'debit', 'Office Acc', '20 cemet', 30000, '2024-07-16', '2024-07-22 12:44:55', '2024-07-25 10:13:27'),
(5, 'David', 'Saheen', 'credit', 'Home', '20 cemet', 20000, '2024-07-25', '2024-07-24 12:09:50', '2024-07-24 12:09:50'),
(6, 'Admin', 'Saleem Shah', 'credit', 'Ch Nawaz Virk', '20 cemet', 675, '2024-07-25', '2024-07-24 13:06:56', '2024-07-24 13:06:56'),
(7, 'Admin', 'Saleem Shah', 'credit', 'Ch Sajid', 'updated description', 100000, '2024-07-25', '2024-07-25 09:30:50', '2024-07-25 09:48:18'),
(8, 'Admin', 'Saleem Shah', 'debit', 'Lhr Home', 'updated description', 9799, '2024-06-30', '2024-07-25 10:08:39', '2024-07-25 10:15:25');

-- --------------------------------------------------------

--
-- Table structure for table `add_sites`
--

CREATE TABLE `add_sites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `siteOwner` varchar(255) NOT NULL,
  `siteIncharge` varchar(255) NOT NULL,
  `superVisor` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `add_sites`
--

INSERT INTO `add_sites` (`id`, `name`, `address`, `siteOwner`, `siteIncharge`, `superVisor`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'lahore', 'Admin', 'David', 'shahid ashfaq', '2024-07-20 17:37:42', '2024-07-22 09:55:59'),
(3, 'David', 'sheikhupura', 'Admin', 'Saleem Shah', 'shahid ashfaq', '2024-07-22 11:54:37', '2024-07-22 11:54:37');

-- --------------------------------------------------------

--
-- Table structure for table `add_users`
--

CREATE TABLE `add_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `desigination` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `add_users`
--

INSERT INTO `add_users` (`id`, `name`, `phone`, `desigination`, `comment`, `created_at`, `updated_at`) VALUES
(2, 'Saleem Shah', 322116371, 'Site Incharge', 'hello', '2024-07-20 11:29:07', '2024-07-20 16:28:27'),
(3, 'shahid ashfaq', 322116371, 'Super Visor', 'nice', '2024-07-20 11:41:09', '2024-07-20 16:37:01'),
(4, 'Admin', 322116371, 'Site Owner', 'purchase', '2024-07-20 17:37:16', '2024-07-20 17:37:16'),
(5, 'David', 322116371, 'Super Visor', 'purchase', '2024-07-22 09:19:59', '2024-07-22 09:19:59'),
(6, 'Saheen', 322116371, 'Site Owner', 'nice', '2024-07-24 12:08:57', '2024-07-24 12:08:57');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `name`, `comment`, `created_at`, `updated_at`) VALUES
(1, 'Food Expense', 'illegel work', '2024-07-20 12:41:05', '2024-07-20 12:56:24'),
(3, 'Materials', '500', '2024-07-22 11:32:25', '2024-07-22 11:32:25'),
(4, 'tools', 'hello', '2024-07-22 12:33:26', '2024-07-22 12:33:26'),
(5, 'Home', 'SKP', '2024-07-22 13:00:28', '2024-07-22 13:00:28'),
(6, 'Home', '', NULL, NULL),
(7, 'Lhr Home', '', NULL, NULL),
(8, 'Arslan', '', NULL, NULL),
(9, 'Ch Sajid Ali', '', NULL, NULL),
(10, 'Wedding Acc', '', NULL, NULL),
(11, 'Office Acc', '', NULL, NULL),
(12, 'Loan', '', NULL, NULL),
(13, 'Ch Sajid', '', NULL, NULL),
(14, 'Waqas Kujar', '', NULL, NULL),
(15, 'Uzair Kujar', '', NULL, NULL),
(16, 'Jawad Ali', '', NULL, NULL),
(17, 'AQS Awais Stone Supp', '', NULL, NULL),
(18, 'Faisal Sb Car CHR', '', NULL, NULL),
(19, 'Misc', '', NULL, NULL),
(20, 'Ashraf Khan', '', NULL, NULL),
(21, 'Firm Renewal Acc', '', NULL, NULL),
(22, 'Sadqa', '', NULL, NULL),
(23, 'Salary', '', NULL, NULL),
(24, 'Ch Nawaz Virk', '', NULL, NULL),
(25, 'Farm ACC', '', NULL, NULL),
(26, 'Mistri Rafique', '', NULL, NULL),
(27, 'Iftikhar Dhllion Sialkot', '', NULL, NULL),
(28, 'Tender Acc', '', NULL, NULL),
(29, 'lAnd Acc', '', NULL, NULL),
(30, 'Work World Bank Khairpur', '', NULL, NULL),
(31, 'Work World Bank Pak Pattan', '', NULL, NULL),
(32, 'Qaiser Bhatti', '', NULL, NULL),
(33, 'Insurance Acc', '', NULL, NULL),
(34, 'Machine Acc', '', NULL, NULL),
(35, 'Bank Acc Markup Intrest Quarter', '', NULL, NULL),
(36, 'Bank Acc', '', NULL, NULL),
(37, 'Hafiz Bricks', '', NULL, NULL),
(38, 'Car 218 Installment Acc', '', NULL, NULL),
(39, 'Car/ bike Acc', '', NULL, NULL),
(40, 'Iftikhar Dhillon $ Dhillum', '', NULL, NULL),
(41, 'Awais Acc (Liabilities)', '', NULL, NULL),
(42, 'Shakeel Driver', '', NULL, NULL),
(43, 'Waseem Sand Supp', '', NULL, NULL),
(44, 'Fiaz Supp Clear', '', NULL, NULL),
(45, 'Chohan sb by Arslan Net', '', NULL, NULL),
(46, 'Sheikh Umair', '', NULL, NULL),
(47, 'Shoaib Jutt Clear', '', NULL, NULL),
(48, 'Dilshad Labour', '', NULL, NULL),
(49, 'Minara Pully Jhelum', '', NULL, NULL),
(50, 'HAKEEMPURA KOLO TARAR', '', NULL, NULL),
(51, 'Nazir Luk Asphalt Plant', '', NULL, NULL),
(52, 'Zaman lawyer', '', NULL, NULL),
(53, 'Rana Saad', '', NULL, NULL),
(54, 'Haji Muhammad YaqooB Kujjar Credit', '', NULL, NULL),
(55, 'Work Highway Bahwalpur Jhangi Road', '', NULL, NULL),
(56, 'Chistian bwp', '', NULL, NULL),
(57, 'Khanpur bwp', '', NULL, NULL),
(58, 'Kund Qasim', '', NULL, NULL),
(59, 'Mian Jhanda Minor Manawalla', '', NULL, NULL),
(60, 'Kilchpur Site', '', NULL, NULL),
(61, 'Jawad Ali Acc', '', NULL, NULL),
(62, 'Adil Sb', '', NULL, NULL),
(63, 'Hegar Drain Gujranwala', '', NULL, NULL),
(64, 'LDA Nespak Scoiety', '', NULL, NULL),
(65, 'LDA Lahore paint', '', NULL, NULL),
(66, 'Fazaia Housing', '', NULL, NULL),
(67, 'New Work Highway LLS', '', NULL, NULL),
(68, 'Malik Hakim Stone Supp', '', NULL, NULL),
(69, 'Malik Arslan Plant LLS Highway Clear', '', NULL, NULL),
(70, 'Khanki Work Dohetta Minor', '', NULL, NULL),
(71, 'Work Mojian wala Minor UJC Division Gujrat', '', NULL, NULL),
(72, 'Adnan Bodla', '', NULL, NULL),
(73, 'Saleem Bajwa', '', NULL, NULL),
(74, 'Faizi Gujjer', '', NULL, NULL),
(75, 'Pindi Bhattian Phe', '', NULL, NULL),
(76, 'Car Acc/Bike', '', NULL, NULL),
(77, 'Car Token', '', NULL, NULL),
(78, 'Ikram Joints net', '', NULL, NULL),
(79, 'Abad Driver', '', NULL, NULL),
(80, 'Tractor 385 Installment Acc', '', NULL, NULL),
(81, 'Abbas Driver Tractor', '', NULL, NULL),
(82, 'Ameen Bhatty wala', '', NULL, NULL),
(83, 'Aslam & Co. Cement', '', NULL, NULL),
(84, 'Darazkhel Stone', '', NULL, NULL),
(85, 'Skp Filling Station', '', NULL, NULL),
(86, 'Puppo Gujjer Net', '', NULL, NULL),
(87, 'Asad Virk Dollat Pura', '', NULL, NULL),
(88, 'Dastagheer Net', '', NULL, NULL),
(89, 'Ali Mohsin', '', NULL, NULL),
(90, 'Car Installment Alto', '', NULL, NULL),
(91, 'Car Installment KIA', '', NULL, NULL),
(92, 'KIA CAR', '', NULL, NULL),
(93, 'Maqsood Labour', '', NULL, NULL),
(94, 'Ahsan Majid Gujjer', '', NULL, NULL),
(95, 'Chief Engineer Sadaqat Latif Credit', '', NULL, NULL),
(96, 'Nazir Khan kot sethan', '', NULL, NULL),
(97, 'Rizwan Nomi', '', NULL, NULL),
(98, 'Bilal Khan/ Machine Acc', '', NULL, NULL),
(99, 'Hannan Randhawa', '', NULL, NULL),
(100, 'Attique Rehman Dhillon', '', NULL, NULL),
(101, 'Latif bhatti Credit', '', NULL, NULL),
(102, 'Syed wala Ucc', '', NULL, NULL),
(103, 'Saeed Shah Farooqabad', '', NULL, NULL),
(104, 'Waqas America Nazir Manj', '', NULL, NULL),
(105, 'Rai Amir (Ibrahim Ismail)]', '', NULL, NULL),
(106, 'Ch Jameel Kamboh Contractor', '', NULL, NULL),
(107, 'Bilal Haider Gondal', '', NULL, NULL),
(108, 'Abu Zar Virk Credit by Uzair', '', NULL, NULL),
(109, 'Advocate Safdar Hussain Peerzada', '', NULL, NULL),
(110, 'Amount', '', NULL, NULL);

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
(4, '2024_07_20_144649_create_add_users_table', 2),
(5, '2024_07_20_171741_create_expenses_table', 3),
(6, '2024_07_20_214030_create_add_sites_table', 4),
(7, '2024_07_22_151626_create_add_data_table', 5);

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
('HKNT6bzxniR54Qm9HOG257AjJeQ4qZnVX1e9KRo7', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZUFsVFNidG9xc3JxTTNtTXNBQ3hwY1lFV05ITXVzVm5Vc3FDMHhNQSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9hZG1pbi90cmFuc2FjdGlvbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1722102883);

-- --------------------------------------------------------

--
-- Table structure for table `sheet1`
--

CREATE TABLE `sheet1` (
  `name` varchar(42) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `sheet1`
--

INSERT INTO `sheet1` (`name`) VALUES
('Home'),
('Lhr Home'),
('Arslan'),
('Ch Sajid Ali'),
('Wedding Acc'),
('Office Acc'),
('Loan'),
('Ch Sajid'),
('Waqas Kujar'),
('Uzair Kujar'),
('Jawad Ali'),
('AQS Awais Stone Supp'),
('Faisal Sb Car CHR'),
('Misc'),
('Ashraf Khan'),
('Firm Renewal Acc'),
('Sadqa'),
('Salary'),
('Ch Nawaz Virk'),
('Farm ACC'),
('Mistri Rafique'),
('Iftikhar Dhllion Sialkot'),
('Tender Acc'),
('lAnd Acc'),
('Work World Bank Khairpur'),
('Work World Bank Pak Pattan'),
('Qaiser Bhatti'),
('Insurance Acc'),
('Machine Acc'),
('Bank Acc Markup Intrest Quarter'),
('Bank Acc'),
('Hafiz Bricks'),
('Car 218 Installment Acc'),
('Car/ bike Acc'),
('Iftikhar Dhillon $ Dhillum'),
('Awais Acc (Liabilities)'),
('Shakeel Driver'),
('Waseem Sand Supp'),
('Fiaz Supp Clear'),
('Chohan sb by Arslan Net'),
('Sheikh Umair'),
('Shoaib Jutt Clear'),
('Dilshad Labour'),
('Minara Pully Jhelum'),
('HAKEEMPURA KOLO TARAR'),
('Nazir Luk Asphalt Plant'),
('Zaman lawyer'),
('Rana Saad'),
('Haji Muhammad YaqooB Kujjar Credit'),
('Work Highway Bahwalpur Jhangi Road'),
('Chistian bwp'),
('Khanpur bwp'),
('Kund Qasim'),
('Mian Jhanda Minor Manawalla'),
('Kilchpur Site'),
('Jawad Ali Acc'),
('Adil Sb'),
('Hegar Drain Gujranwala'),
('LDA Nespak Scoiety'),
('LDA Lahore paint'),
('Fazaia Housing'),
('New Work Highway LLS'),
('Malik Hakim Stone Supp'),
('Malik Arslan Plant LLS Highway Clear'),
('Khanki Work Dohetta Minor'),
('Work Mojian wala Minor UJC Division Gujrat'),
('Adnan Bodla'),
('Saleem Bajwa'),
('Faizi Gujjer'),
('Pindi Bhattian Phe'),
('Car Acc/Bike'),
('Car Token'),
('Ikram Joints net'),
('Abad Driver'),
('Tractor 385 Installment Acc'),
('Abbas Driver Tractor'),
('Ameen Bhatty wala'),
('Aslam & Co. Cement'),
('Darazkhel Stone'),
('Skp Filling Station'),
('Puppo Gujjer Net'),
('Asad Virk Dollat Pura'),
('Dastagheer Net'),
('Ali Mohsin'),
('Car Installment Alto'),
('Car Installment KIA'),
('KIA CAR'),
('Maqsood Labour'),
('Ahsan Majid Gujjer'),
('Chief Engineer Sadaqat Latif Credit'),
('Nazir Khan kot sethan'),
('Rizwan Nomi'),
('Bilal Khan/ Machine Acc'),
('Hannan Randhawa'),
('Attique Rehman Dhillon'),
('Latif bhatti Credit'),
('Syed wala Ucc'),
('Saeed Shah Farooqabad'),
('Waqas America Nazir Manj'),
('Rai Amir (Ibrahim Ismail)]'),
('Ch Jameel Kamboh Contractor'),
('Bilal Haider Gondal'),
('Abu Zar Virk Credit by Uzair'),
('Advocate Safdar Hussain Peerzada'),
('Amount'),
('Home'),
('Lhr Home'),
('Arslan'),
('Ch Sajid Ali'),
('Wedding Acc'),
('Office Acc'),
('Loan'),
('Ch Sajid'),
('Waqas Kujar'),
('Uzair Kujar'),
('Jawad Ali'),
('AQS Awais Stone Supp'),
('Faisal Sb Car CHR'),
('Misc'),
('Ashraf Khan'),
('Firm Renewal Acc'),
('Sadqa'),
('Salary'),
('Ch Nawaz Virk'),
('Farm ACC'),
('Mistri Rafique'),
('Iftikhar Dhllion Sialkot'),
('Tender Acc'),
('lAnd Acc'),
('Work World Bank Khairpur'),
('Work World Bank Pak Pattan'),
('Qaiser Bhatti'),
('Insurance Acc'),
('Machine Acc'),
('Bank Acc Markup Intrest Quarter'),
('Bank Acc'),
('Hafiz Bricks'),
('Car 218 Installment Acc'),
('Car/ bike Acc'),
('Iftikhar Dhillon $ Dhillum'),
('Awais Acc (Liabilities)'),
('Shakeel Driver'),
('Waseem Sand Supp'),
('Fiaz Supp Clear'),
('Chohan sb by Arslan Net'),
('Sheikh Umair'),
('Shoaib Jutt Clear'),
('Dilshad Labour'),
('Minara Pully Jhelum'),
('HAKEEMPURA KOLO TARAR'),
('Nazir Luk Asphalt Plant'),
('Zaman lawyer'),
('Rana Saad'),
('Haji Muhammad YaqooB Kujjar Credit'),
('Work Highway Bahwalpur Jhangi Road'),
('Chistian bwp'),
('Khanpur bwp'),
('Kund Qasim'),
('Mian Jhanda Minor Manawalla'),
('Kilchpur Site'),
('Jawad Ali Acc'),
('Adil Sb'),
('Hegar Drain Gujranwala'),
('LDA Nespak Scoiety'),
('LDA Lahore paint'),
('Fazaia Housing'),
('New Work Highway LLS'),
('Malik Hakim Stone Supp'),
('Malik Arslan Plant LLS Highway Clear'),
('Khanki Work Dohetta Minor'),
('Work Mojian wala Minor UJC Division Gujrat'),
('Adnan Bodla'),
('Saleem Bajwa'),
('Faizi Gujjer'),
('Pindi Bhattian Phe'),
('Car Acc/Bike'),
('Car Token'),
('Ikram Joints net'),
('Abad Driver'),
('Tractor 385 Installment Acc'),
('Abbas Driver Tractor'),
('Ameen Bhatty wala'),
('Aslam & Co. Cement'),
('Darazkhel Stone'),
('Skp Filling Station'),
('Puppo Gujjer Net'),
('Asad Virk Dollat Pura'),
('Dastagheer Net'),
('Ali Mohsin'),
('Car Installment Alto'),
('Car Installment KIA'),
('KIA CAR'),
('Maqsood Labour'),
('Ahsan Majid Gujjer'),
('Chief Engineer Sadaqat Latif Credit'),
('Nazir Khan kot sethan'),
('Rizwan Nomi'),
('Bilal Khan/ Machine Acc'),
('Hannan Randhawa'),
('Attique Rehman Dhillon'),
('Latif bhatti Credit'),
('Syed wala Ucc'),
('Saeed Shah Farooqabad'),
('Waqas America Nazir Manj'),
('Rai Amir (Ibrahim Ismail)]'),
('Ch Jameel Kamboh Contractor'),
('Bilal Haider Gondal'),
('Abu Zar Virk Credit by Uzair'),
('Advocate Safdar Hussain Peerzada'),
('Amount');

-- --------------------------------------------------------

--
-- Table structure for table `sheet2`
--

CREATE TABLE `sheet2` (
  `name` varchar(42) DEFAULT NULL,
  `comment` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `sheet2`
--

INSERT INTO `sheet2` (`name`, `comment`) VALUES
('Home', NULL),
('Lhr Home', NULL),
('Arslan', NULL),
('Ch Sajid Ali', NULL),
('Wedding Acc', NULL),
('Office Acc', NULL),
('Loan', NULL),
('Ch Sajid', NULL),
('Waqas Kujar', NULL),
('Uzair Kujar', NULL),
('Jawad Ali', NULL),
('AQS Awais Stone Supp', NULL),
('Faisal Sb Car CHR', NULL),
('Misc', NULL),
('Ashraf Khan', NULL),
('Firm Renewal Acc', NULL),
('Sadqa', NULL),
('Salary', NULL),
('Ch Nawaz Virk', NULL),
('Farm ACC', NULL),
('Mistri Rafique', NULL),
('Iftikhar Dhllion Sialkot', NULL),
('Tender Acc', NULL),
('lAnd Acc', NULL),
('Work World Bank Khairpur', NULL),
('Work World Bank Pak Pattan', NULL),
('Qaiser Bhatti', NULL),
('Insurance Acc', NULL),
('Machine Acc', NULL),
('Bank Acc Markup Intrest Quarter', NULL),
('Bank Acc', NULL),
('Hafiz Bricks', NULL),
('Car 218 Installment Acc', NULL),
('Car/ bike Acc', NULL),
('Iftikhar Dhillon $ Dhillum', NULL),
('Awais Acc (Liabilities)', NULL),
('Shakeel Driver', NULL),
('Waseem Sand Supp', NULL),
('Fiaz Supp Clear', NULL),
('Chohan sb by Arslan Net', NULL),
('Sheikh Umair', NULL),
('Shoaib Jutt Clear', NULL),
('Dilshad Labour', NULL),
('Minara Pully Jhelum', NULL),
('HAKEEMPURA KOLO TARAR', NULL),
('Nazir Luk Asphalt Plant', NULL),
('Zaman lawyer', NULL),
('Rana Saad', NULL),
('Haji Muhammad YaqooB Kujjar Credit', NULL),
('Work Highway Bahwalpur Jhangi Road', NULL),
('Chistian bwp', NULL),
('Khanpur bwp', NULL),
('Kund Qasim', NULL),
('Mian Jhanda Minor Manawalla', NULL),
('Kilchpur Site', NULL),
('Jawad Ali Acc', NULL),
('Adil Sb', NULL),
('Hegar Drain Gujranwala', NULL),
('LDA Nespak Scoiety', NULL),
('LDA Lahore paint', NULL),
('Fazaia Housing', NULL),
('New Work Highway LLS', NULL),
('Malik Hakim Stone Supp', NULL),
('Malik Arslan Plant LLS Highway Clear', NULL),
('Khanki Work Dohetta Minor', NULL),
('Work Mojian wala Minor UJC Division Gujrat', NULL),
('Adnan Bodla', NULL),
('Saleem Bajwa', NULL),
('Faizi Gujjer', NULL),
('Pindi Bhattian Phe', NULL),
('Car Acc/Bike', NULL),
('Car Token', NULL),
('Ikram Joints net', NULL),
('Abad Driver', NULL),
('Tractor 385 Installment Acc', NULL),
('Abbas Driver Tractor', NULL),
('Ameen Bhatty wala', NULL),
('Aslam & Co. Cement', NULL),
('Darazkhel Stone', NULL),
('Skp Filling Station', NULL),
('Puppo Gujjer Net', NULL),
('Asad Virk Dollat Pura', NULL),
('Dastagheer Net', NULL),
('Ali Mohsin', NULL),
('Car Installment Alto', NULL),
('Car Installment KIA', NULL),
('KIA CAR', NULL),
('Maqsood Labour', NULL),
('Ahsan Majid Gujjer', NULL),
('Chief Engineer Sadaqat Latif Credit', NULL),
('Nazir Khan kot sethan', NULL),
('Rizwan Nomi', NULL),
('Bilal Khan/ Machine Acc', NULL),
('Hannan Randhawa', NULL),
('Attique Rehman Dhillon', NULL),
('Latif bhatti Credit', NULL),
('Syed wala Ucc', NULL),
('Saeed Shah Farooqabad', NULL),
('Waqas America Nazir Manj', NULL),
('Rai Amir (Ibrahim Ismail)]', NULL),
('Ch Jameel Kamboh Contractor', NULL),
('Bilal Haider Gondal', NULL),
('Abu Zar Virk Credit by Uzair', NULL),
('Advocate Safdar Hussain Peerzada', NULL),
('Amount', NULL),
('Home', NULL),
('Lhr Home', NULL),
('Arslan', NULL),
('Ch Sajid Ali', NULL),
('Wedding Acc', NULL),
('Office Acc', NULL),
('Loan', NULL),
('Ch Sajid', NULL),
('Waqas Kujar', NULL),
('Uzair Kujar', NULL),
('Jawad Ali', NULL),
('AQS Awais Stone Supp', NULL),
('Faisal Sb Car CHR', NULL),
('Misc', NULL),
('Ashraf Khan', NULL),
('Firm Renewal Acc', NULL),
('Sadqa', NULL),
('Salary', NULL),
('Ch Nawaz Virk', NULL),
('Farm ACC', NULL),
('Mistri Rafique', NULL),
('Iftikhar Dhllion Sialkot', NULL),
('Tender Acc', NULL),
('lAnd Acc', NULL),
('Work World Bank Khairpur', NULL),
('Work World Bank Pak Pattan', NULL),
('Qaiser Bhatti', NULL),
('Insurance Acc', NULL),
('Machine Acc', NULL),
('Bank Acc Markup Intrest Quarter', NULL),
('Bank Acc', NULL),
('Hafiz Bricks', NULL),
('Car 218 Installment Acc', NULL),
('Car/ bike Acc', NULL),
('Iftikhar Dhillon $ Dhillum', NULL),
('Awais Acc (Liabilities)', NULL),
('Shakeel Driver', NULL),
('Waseem Sand Supp', NULL),
('Fiaz Supp Clear', NULL),
('Chohan sb by Arslan Net', NULL),
('Sheikh Umair', NULL),
('Shoaib Jutt Clear', NULL),
('Dilshad Labour', NULL),
('Minara Pully Jhelum', NULL),
('HAKEEMPURA KOLO TARAR', NULL),
('Nazir Luk Asphalt Plant', NULL),
('Zaman lawyer', NULL),
('Rana Saad', NULL),
('Haji Muhammad YaqooB Kujjar Credit', NULL),
('Work Highway Bahwalpur Jhangi Road', NULL),
('Chistian bwp', NULL),
('Khanpur bwp', NULL),
('Kund Qasim', NULL),
('Mian Jhanda Minor Manawalla', NULL),
('Kilchpur Site', NULL),
('Jawad Ali Acc', NULL),
('Adil Sb', NULL),
('Hegar Drain Gujranwala', NULL),
('LDA Nespak Scoiety', NULL),
('LDA Lahore paint', NULL),
('Fazaia Housing', NULL),
('New Work Highway LLS', NULL),
('Malik Hakim Stone Supp', NULL),
('Malik Arslan Plant LLS Highway Clear', NULL),
('Khanki Work Dohetta Minor', NULL),
('Work Mojian wala Minor UJC Division Gujrat', NULL),
('Adnan Bodla', NULL),
('Saleem Bajwa', NULL),
('Faizi Gujjer', NULL),
('Pindi Bhattian Phe', NULL),
('Car Acc/Bike', NULL),
('Car Token', NULL),
('Ikram Joints net', NULL),
('Abad Driver', NULL),
('Tractor 385 Installment Acc', NULL),
('Abbas Driver Tractor', NULL),
('Ameen Bhatty wala', NULL),
('Aslam & Co. Cement', NULL),
('Darazkhel Stone', NULL),
('Skp Filling Station', NULL),
('Puppo Gujjer Net', NULL),
('Asad Virk Dollat Pura', NULL),
('Dastagheer Net', NULL),
('Ali Mohsin', NULL),
('Car Installment Alto', NULL),
('Car Installment KIA', NULL),
('KIA CAR', NULL),
('Maqsood Labour', NULL),
('Ahsan Majid Gujjer', NULL),
('Chief Engineer Sadaqat Latif Credit', NULL),
('Nazir Khan kot sethan', NULL),
('Rizwan Nomi', NULL),
('Bilal Khan/ Machine Acc', NULL),
('Hannan Randhawa', NULL),
('Attique Rehman Dhillon', NULL),
('Latif bhatti Credit', NULL),
('Syed wala Ucc', NULL),
('Saeed Shah Farooqabad', NULL),
('Waqas America Nazir Manj', NULL),
('Rai Amir (Ibrahim Ismail)]', NULL),
('Ch Jameel Kamboh Contractor', NULL),
('Bilal Haider Gondal', NULL),
('Abu Zar Virk Credit by Uzair', NULL),
('Advocate Safdar Hussain Peerzada', NULL),
('Amount', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$12$y9rHA6tUmISkq8O/G2Y/0.MJV70wmSmtcyI0CyNB4mdtmdzzbFCjO', NULL, '2024-07-20 09:36:00', '2024-07-20 09:36:00'),
(2, 'Shahid Ashfaq', 'shahid@gmail.com', NULL, '$2y$12$vbIXcTB2PeR60Gvw3DlOUeUocyljdc/nEceRs0oXRUM0FJFUyf.t6', NULL, '2024-07-26 11:20:13', '2024-07-26 11:20:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_data`
--
ALTER TABLE `add_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `add_sites`
--
ALTER TABLE `add_sites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `add_users`
--
ALTER TABLE `add_users`
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
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_data`
--
ALTER TABLE `add_data`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `add_sites`
--
ALTER TABLE `add_sites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `add_users`
--
ALTER TABLE `add_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
