-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 21, 2022 at 08:40 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blocks`
--

-- --------------------------------------------------------

--
-- Table structure for table `businesses`
--

CREATE TABLE `businesses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `slug` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `businesses`
--

INSERT INTO `businesses` (`id`, `name`, `phone`, `email`, `location`, `description`, `created_by`, `slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Blocks Company Limited', '123456789', 'mail@mail.com', 'Mombasa kenya', 'just a description', 2, 'blocks-company-limited', '2022-03-17 11:30:17', '2022-03-17 11:30:17', NULL),
(2, 'Next Block Africa', '0798272066', 'hello@blocks.co.ke', 'Mombasa', 'Blocks is a property management platform provider based in Mombasa Kenya.', 4, 'next-block-africa', '2022-03-21 19:52:34', '2022-03-21 19:52:34', NULL),
(3, 'CALYDIAN INVESTMENTS LTD', '+254722504028', 'calydian@hotmail.com', 'Bamburi, Kenya', 'Real Estate Agent', 26, NULL, '2022-02-21 15:24:21', NULL, NULL),
(4, 'Appettea', '0114478272', 'collincebecky@gmail.com', 'Nyali Mombasa', 'Bamburi', 18, NULL, '2022-02-07 09:44:52', NULL, NULL),
(5, 'MEDZAM ENTERPRISES', '0707064650', 'emedzam@gmail.com', 'KISIMANI', 'Rent collection and letting', 36, NULL, '2022-02-16 13:11:48', NULL, NULL),
(6, 'KISIMANI PAINTS ', '0707075713', 'joelkilonzojp@gmail.com', 'kisimani', 'RENTAL BS', 39, NULL, '2022-02-21 12:00:31', NULL, NULL),
(7, 'Next Block Africa Ltd', '0789456123', 'hello@mail.com', 'Nyali, Mombasa -Kenya', 'Blocks is a digital property management agency operating across', 19, NULL, '2022-02-20 17:14:51', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `inventories`
--

CREATE TABLE `inventories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vehicle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `engine_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transmission` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `interior_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exterior_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `collection_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conversions_disk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` bigint(20) UNSIGNED NOT NULL,
  `manipulations` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`manipulations`)),
  `custom_properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`custom_properties`)),
  `responsive_images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`responsive_images`)),
  `order_column` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `model_type`, `model_id`, `uuid`, `collection_name`, `name`, `file_name`, `mime_type`, `disk`, `conversions_disk`, `size`, `manipulations`, `custom_properties`, `responsive_images`, `order_column`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\Business', 1, '91a7aa21-6c5b-4e22-945b-10524ecaa2de', 'logo', '6232f197a9ae6_8ae26d52be75a7f61869f46a932454f0 (1)', '6232f197a9ae6_8ae26d52be75a7f61869f46a932454f0-(1).png', 'image/png', 'public', 'public', 38789, '[]', '{\"generated_conversions\":{\"thumb\":true,\"preview\":true}}', '[]', 1, '2022-03-17 11:30:17', '2022-03-17 11:30:17'),
(2, 'App\\Models\\Business', 2, '551436e1-55e3-415a-b634-5c1c988d903c', 'logo', '6238ad50a73a5_blocks', '6238ad50a73a5_blocks.png', 'image/png', 'public', 'public', 61932, '[]', '{\"generated_conversions\":{\"thumb\":true,\"preview\":true}}', '[]', 2, '2022-03-21 19:52:34', '2022-03-21 19:52:34');

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
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2022_01_07_000001_create_media_table', 1),
(3, '2022_01_07_000002_create_permissions_table', 1),
(4, '2022_01_07_000003_create_roles_table', 1),
(5, '2022_01_07_000004_create_users_table', 1),
(6, '2022_01_07_000005_create_inventories_table', 1),
(7, '2022_01_07_000006_create_permission_role_pivot_table', 1),
(8, '2022_01_07_000007_create_role_user_pivot_table', 1),
(9, '2022_02_20_101123_create_businesses_table', 1),
(10, '2022_02_22_160052_create_properties_table', 1),
(11, '2022_02_23_092803_create_units_table', 1),
(12, '2022_02_23_162902_create_tenants_table', 1),
(13, '2022_02_28_191839_create_tenant_payments_table', 1);

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'user_management_access', NULL, NULL, NULL),
(2, 'permission_create', NULL, NULL, NULL),
(3, 'permission_edit', NULL, NULL, NULL),
(4, 'permission_show', NULL, NULL, NULL),
(5, 'permission_delete', NULL, NULL, NULL),
(6, 'permission_access', NULL, NULL, NULL),
(7, 'role_create', NULL, NULL, NULL),
(8, 'role_edit', NULL, NULL, NULL),
(9, 'role_show', NULL, NULL, NULL),
(10, 'role_delete', NULL, NULL, NULL),
(11, 'role_access', NULL, NULL, NULL),
(12, 'user_create', NULL, NULL, NULL),
(13, 'user_edit', NULL, NULL, NULL),
(14, 'user_show', NULL, NULL, NULL),
(15, 'user_delete', NULL, NULL, NULL),
(16, 'user_access', NULL, NULL, NULL),
(17, 'account_create', NULL, NULL, NULL),
(18, 'account_edit', NULL, NULL, NULL),
(19, 'account_show', NULL, NULL, NULL),
(20, 'account_delete', NULL, NULL, NULL),
(21, 'account_access', NULL, NULL, NULL),
(22, 'profile_password_edit', NULL, NULL, NULL),
(23, 'property_create', NULL, NULL, NULL),
(24, 'property_edit', NULL, NULL, NULL),
(25, 'property_show', NULL, NULL, NULL),
(26, 'property_delete', NULL, NULL, NULL),
(27, 'property_access', NULL, NULL, NULL),
(28, 'business_create', NULL, NULL, NULL),
(29, 'business_edit', NULL, NULL, NULL),
(30, 'business_show', NULL, NULL, NULL),
(31, 'business_delete', NULL, NULL, NULL),
(32, 'business_access', NULL, NULL, NULL),
(33, 'tenant_create', NULL, NULL, NULL),
(34, 'tenant_edit', NULL, NULL, NULL),
(35, 'tenant_show', NULL, NULL, NULL),
(36, 'tenant_delete', NULL, NULL, NULL),
(37, 'tenant_access', NULL, NULL, NULL),
(38, 'records_list', NULL, NULL, NULL),
(39, 'record_payment', NULL, NULL, NULL),
(40, 'overdue_payment', NULL, NULL, NULL),
(41, 'record_management_access', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(1, 15),
(1, 16),
(1, 17),
(1, 18),
(1, 19),
(1, 20),
(1, 21),
(1, 22),
(1, 23),
(1, 24),
(1, 25),
(1, 26),
(1, 27),
(1, 28),
(1, 29),
(1, 30),
(1, 31),
(1, 32),
(1, 33),
(1, 34),
(1, 35),
(1, 36),
(1, 37),
(1, 38),
(1, 39),
(1, 40),
(1, 41),
(2, 17),
(2, 18),
(2, 19),
(2, 20),
(2, 21),
(2, 22),
(2, 23),
(2, 24),
(2, 25),
(2, 26),
(2, 27),
(2, 28),
(2, 29),
(2, 30),
(2, 31),
(2, 32),
(2, 33),
(2, 34),
(2, 35),
(2, 36),
(2, 37),
(2, 38),
(2, 39),
(2, 40),
(2, 41);

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `business_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_of_units` int(11) DEFAULT NULL,
  `management_since` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `due_date` int(11) NOT NULL DEFAULT 5,
  `landlord_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `landlord_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `manager_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `manager_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `caretaker_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `caretaker_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `business_id`, `name`, `location`, `no_of_units`, `management_since`, `due_date`, `landlord_name`, `landlord_phone`, `manager_name`, `manager_phone`, `caretaker_name`, `caretaker_phone`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'ABC', 'xyz', 12, '2022-03-09', 5, 'Qwerty', '123', 'ABC', '123', 'Abcd', '123', '2022-03-21 09:46:31', '2022-03-21 09:46:31', NULL),
(2, 1, 'Kisimani Heights', 'Kisimani, Mombasa', 0, NULL, 5, 'Timo', '070698542', 'Sam', '07962541251', 'Tom', '07142536', NULL, NULL, NULL),
(3, 1, 'Nyali Apartments', 'Nyali Reef', 0, NULL, 5, 'Mohamed Ali', '07458624132', 'John Mwalinu', '074521390', 'Fred Fumbo', '071245780', NULL, NULL, NULL),
(4, 1, 'Bamburi Apartments', 'Bamburi Mwisho', 0, NULL, 5, 'Arafat ', '0796770664', 'James Wizo', '0796770664', 'James Wizo', '0799022200', NULL, NULL, NULL),
(5, 1, 'HSE-106', 'Majaoni', 0, NULL, 5, 'James Juma', '0798272011', 'Ziri salim', '0734234565', 'Billy Tom', '071235455', NULL, NULL, NULL),
(6, 1, 'creek', 'tudor', 0, NULL, 5, 'jacy', '0612345', 'jacky', '0823456', 'nancy', '091456', NULL, NULL, NULL),
(7, 1, 'wss', 'ss', 0, NULL, 5, 'ddd', 'ddd', 'd', 'd', 'd', 'ddd', NULL, NULL, NULL),
(8, 1, 'Kiembeni Blue Estate', 'Kiembeni', 0, NULL, 5, 'janet and Russell', '0722103486', 'Lydia Lucky', '0722504028', 'N/A', 'N/A', NULL, NULL, NULL),
(12, 1, 'HOUSE 45', 'MGONGENI', 0, NULL, 5, 'MR ALI', '0720116769', 'MR KENNEDY MATOI', '0723840945', 'NONE', 'NONE', NULL, NULL, NULL),
(13, 1, 'Keja Yetu', 'Hapa tu', 0, NULL, 5, 'Tom', '071234567', 'Alex', '0798765432', 'Steve', '0110442328', NULL, NULL, NULL),
(14, 1, 'WHITE HOUSE', 'BOMBILULU', 0, NULL, 5, 'H', '2', 'H', '2', 'H', '3', NULL, NULL, NULL),
(15, 1, 'ACACIA FLATS', 'BAMBURI FISHERIES', 0, NULL, 5, 'SALIM SULTAN DAGHAR', '+61 450 630 435', 'N/A', 'N/A', 'N/A', 'N/A', NULL, NULL, NULL),
(16, 1, 'PAVANSUT APARTMENTS', 'KISAUNI LEISURE', 0, NULL, 5, 'SALIM SULTAN DAGHAR', '+61 450 630 435', 'Pavansut management Ltd', '+254 753 941941', 'N/A', 'N/A', NULL, NULL, NULL),
(17, 1, 'HSE NO. 03', 'BAMBURI STAGE YA PAKA', 0, NULL, 5, 'FAHMI KHAMIS ABOUD', '0780 141222', 'N/A', 'N/A', 'N/A', 'N/A', NULL, NULL, NULL),
(18, 1, 'HSE NO. 04', 'MWEMBENI KWA BULLO', 0, NULL, 5, 'MBAABU M. ANARI', '0775 662377', 'N/A', 'N/A', 'N/A', 'N/A', NULL, NULL, NULL),
(19, 1, 'HSE NO. 06', 'KISIMANI', 0, NULL, 5, 'SALIM SULTAN DAGHAR', '+61 450 630 435', 'N/A', 'N/A', 'N/A', 'N/A', NULL, NULL, NULL),
(20, 1, 'HSE NO. 08', 'BAMBURI KADZANDANI', 0, NULL, 5, 'STANLEY M. MWAILOGHO', '0722 276407', 'MAURINE MKIWA', '0720 909483', 'N/A', 'N/A', NULL, NULL, NULL),
(21, 1, 'HSE NO. 09', 'KIEMBENI SHILLA', 0, NULL, 5, 'BABU KHAMIS MWANGO', '0721627156', 'N/A', 'N/A', 'N/A', 'N/A', NULL, NULL, NULL),
(22, 1, 'HSE NO. 11', 'BAMBURI KIDARAJANI', 0, NULL, 5, 'KHAMISI MOHAMED KHAMISI', '0722 854112', 'N/A', 'N/A', 'N/A', 'N/A', NULL, NULL, NULL),
(23, 1, 'HSE NO. 12', 'BAMBURI KAZANDANI', 0, NULL, 5, 'STANLEY M. MWAILOGH', '0722276407', 'MAURINE MKIWA ', '0720 909483', 'N/A', 'N/A', NULL, NULL, NULL),
(24, 1, 'HSE NO. 13', 'KISAUNI BAKARANI', 0, NULL, 5, 'FAHMI KHAMIS ABOUD', '0780 141222', 'N/A', 'N/A', 'N/A', 'N/A', NULL, NULL, NULL),
(25, 1, 'HSE NO. 14', 'MTOPANGA MAFISINI', 0, NULL, 5, 'STANLEY M. MWAILOGHO', 'O722 276407', 'MAURINE MKIWA', '0720 909483', 'N/A', 'N/A', NULL, NULL, NULL),
(26, 1, 'HSE NO. 15', 'KISAUNI MLALEO', 0, NULL, 5, 'SAHALE ASHUR', '0732 287146', 'AHLAM MAHFUDH', '0712 969554', 'N/A', 'N/A', NULL, NULL, NULL),
(27, 1, 'HSE NO. 16', 'BAMBURI FISHERIES', 0, NULL, 5, 'STANLEY M. MWAILOGHO', '0722 276407', 'MAURINE  MKIWA', '0720 909483', 'N/A', 'N/A', NULL, NULL, NULL),
(28, 1, 'HSE NO. 17', 'KISAUNI MLALEO', 0, NULL, 5, 'MBARAK KHAMIS ABUD', '0728 996646', 'N/A', 'N/A', 'N/A', 'N/A', NULL, NULL, NULL),
(29, 1, 'HSE NO. 18', 'KIEMBENI', 0, NULL, 5, 'LAWRENCE MWANIA', 'NIL', 'VICTORIA KATITU', '0723 780701', 'N/A', 'N/A', NULL, NULL, NULL),
(30, 1, 'HSE NO. 19', 'BAMBURI KIDARAJANI', 0, NULL, 5, 'ZEN SALIM', '0724 815944', 'Daughter', '0725 893390', 'N/A', 'N/A', NULL, NULL, NULL),
(31, 1, 'HSE NO. 21', 'BAMBURI MWEMBELEGEZA', 0, NULL, 5, 'KHAMISI MOHAMED KHAMIS', '0722 854112', 'N/A', 'N/A', 'N/A', 'N/A', NULL, NULL, NULL),
(32, 1, 'HSE NO. 22', 'BAMBURI ', 0, NULL, 5, 'STANLEYM. MWAILOGHO', '0722 276407', 'N/A', 'N/A', 'N/A', 'N/A', NULL, NULL, NULL),
(33, 1, 'HSE NO. 24', 'MWANDONI KATISHA', 0, NULL, 5, 'MUNIRA & AISHA KHAMIS MOHAMED', '0720 553213', 'KHAMISI MWANGO', '0721 627156', 'N/A', 'N/A', NULL, NULL, NULL),
(34, 1, 'HSE NO. 25', 'MTOPANGA MAFISINI', 0, NULL, 5, 'ABDULAZIZ RAMADHAN', '+14168 717 884', 'WALEED AZIZ', '0713 652565', 'N/A', 'N/A', NULL, NULL, NULL),
(35, 1, 'HSE NO. 26', 'MTOPANGA MAFISINI', 0, NULL, 5, 'AHMED SALIM', '0728 838010', 'N/A', 'N/A', 'N/A', 'N/A', NULL, NULL, NULL),
(36, 1, 'HSE NO. 27', 'KISAUNI BAKARANI', 0, NULL, 5, 'AHMED SALIM', '0728 838010', 'N/A', 'N/A', 'N/A', 'N/A', NULL, NULL, NULL),
(37, 1, 'HSE NO. 28', 'BARSHEBA KAGUJO', 0, NULL, 5, 'AHMED SALIM', '0728 838010', 'N/A', 'N/A', 'N/A', 'N/A', NULL, NULL, NULL),
(38, 1, 'HOUSE 49', 'MBUNGONI', 0, NULL, 5, 'MR ANGORE', '0720116769', 'SOLOMON', '0770346622', 'CHARO', '07201145423', NULL, NULL, NULL),
(39, 1, 'HSE NO. 20', 'BAMBURI PALESTINE', 0, NULL, 5, 'LEWIS MAJALE', '0716 394424', 'N/A', 'N/A', 'N/A', 'N/A', NULL, NULL, NULL),
(40, 1, 'Hanna Flores', 'Lorem nostrud aut fu', 0, NULL, 5, 'Velit explicabo Dol', '+1 (276) 361-9569', 'Saepe porro est arc', '+1 (947) 109-41', 'Odit numquam in aut ', '+1 (226) 146-22', NULL, NULL, NULL),
(41, 1, 'White House', 'Bombolulu', 0, NULL, 5, 'John Doe', '078953241', 'Joel Kilonzo', '071452751', 'John Kim', '0754125845', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Super Admin', NULL, NULL, NULL),
(2, 'Admin', NULL, NULL, NULL),
(3, 'User', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tenants`
--

CREATE TABLE `tenants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `property_id` bigint(20) UNSIGNED DEFAULT NULL,
  `business_id` bigint(20) UNSIGNED NOT NULL,
  `unit_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_number` int(11) NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rent` decimal(60,2) NOT NULL,
  `deposit` decimal(60,2) NOT NULL,
  `due_date` int(11) DEFAULT NULL,
  `emergency_contact_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emergency_contact_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tenants`
--

INSERT INTO `tenants` (`id`, `property_id`, `business_id`, `unit_id`, `name`, `email`, `id_number`, `phone`, `rent`, `deposit`, `due_date`, `emergency_contact_name`, `emergency_contact_phone`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 1, 'John Doe', 'mail@mail.com', 12345678, '25423456789', '1000.00', '2000.00', NULL, 'N/A', 'N/A', 1, '2022-03-21 09:48:49', '2022-03-21 09:48:49', NULL),
(2, 1, 1, 1, 'Collins Becky ', 'becky@brancetech.com', 36367730, '0796770664', '10000.00', '20000.00', NULL, 'Dan Becky', '0785425842', 1, NULL, NULL, NULL),
(3, 3, 1, 1, 'Man Paul', 'bair@brancetech.com', 23457869, '0757644414', '45000.00', '90000.00', NULL, 'Sally Njeri', '07985421362', 1, NULL, NULL, NULL),
(4, 4, 1, 1, 'collince becky', 'collincebecky@gmail.com', 34511758, '0796770664', '12000.00', '24000.00', NULL, '0710021105', '0796770664', 1, NULL, NULL, NULL),
(5, 3, 1, 1, 'John Paul', 'johnp@gmail.com', 34456787, '071234567', '27000.00', '55000.00', NULL, 'Julia Wetu', '071234566', 1, NULL, NULL, NULL),
(6, 2, 1, 1, 'Julia Lizzy', 'julia@test.com', 5349875, '072345670', '15000.00', '33000.00', NULL, 'Jack Oscar', '0723456756', 1, NULL, NULL, NULL),
(7, 2, 1, 1, 'LYDIAH demo', 'test@gmail.com', 1234567, '0722504028', '25000.00', '25000.00', NULL, 'John', '071123456', 1, NULL, NULL, NULL),
(8, 5, 1, 1, 'Lilian', 'lilian@gmail.com', 2345678, '0798214811', '12000.00', '24000.00', NULL, 'James', '0711223340', 1, NULL, NULL, NULL),
(9, 6, 1, 1, 'john', 'jamescarel966@gmail.com', 123456765, '07123563', '11000.00', '1000.00', NULL, 'jane', '0912345', 1, NULL, NULL, NULL),
(10, 6, 1, 1, 'john', 'jamescarel966@gmail.com', 37123456, '0719742512', '12000.00', '10000.00', NULL, 'joy', '0718052608', 1, NULL, NULL, NULL),
(13, 8, 1, 1, 'LYDIAH LUCKY', 'lmkungo71@gmail.com', 23687308, '+254739235548', '20000.00', '40000.00', NULL, 'N/A', 'N/A', 1, NULL, NULL, NULL),
(14, 5, 1, 1, 'Tevin Jack', 'tevin@gmail.com', 34567898, '0743082150', '12500.00', '25000.00', NULL, 'Jack Daniels', '0798345654', 1, NULL, NULL, NULL),
(15, 2, 1, 1, 'Solomon Solomon', 'solomon@blocks.com', 12345678, '0707064650', '23000.00', '4700.00', NULL, 'N/A', 'N/A', 1, NULL, NULL, NULL),
(16, 12, 1, 1, 'Walfer Khai', 'n/a', 26559421, '0713 508585', '3000.00', '3000.00', NULL, 'n/a', '0716561455', 1, NULL, NULL, NULL),
(24, 13, 1, 1, 'Wilson Ke', 'null@blocks.co.ke', 34251670, '0717255460', '12000.00', '25000.00', NULL, 'Baba', '072345679', 1, NULL, NULL, NULL),
(25, 14, 1, 1, 'Ngaruiya Faith', 'ngaruiya053@gmail.com', 5654256, '0724052735', '8500.00', '17000.00', NULL, 'N/A', 'N/A', 1, NULL, NULL, NULL),
(26, 8, 1, 1, 'MERCY KARISA MUTSEMBI', 'mercykarisa@gmail.com', 26368059, '0702339954', '20000.00', '40000.00', NULL, 'N/A', 'N/A', 1, NULL, NULL, NULL),
(27, 16, 1, 1, 'ALICE WAGAKI', 'null@blocks.co.ke', 2300000, '0723783578', '25500.00', '52500.00', NULL, 'N/A', 'N/A', 1, NULL, NULL, NULL),
(28, 17, 1, 1, 'PRICILLA  WANGUI MUSHIRI', 'null@blocks.co.ke', 230000, '0750933999', '7000.00', '7000.00', NULL, 'N/A', 'N/A', 1, NULL, NULL, NULL),
(29, 17, 1, 1, 'PATRICK KEYO BOGE', 'null@blocks.co.ke', 23000000, '0732 554921', '3000.00', '3000.00', NULL, 'N/A', 'N/A', 1, NULL, NULL, NULL),
(30, 17, 1, 1, 'BRIAN OCHIENG\'JUMA', 'null@blocks.co.ke', 2300000, '0799 104601', '3000.00', '3000.00', NULL, 'N/A', 'N/A', 1, NULL, NULL, NULL),
(31, 17, 1, 1, 'JOSEPH ODODA OTIENO', 'null@blocks.co.ke', 23000, '0783 113123', '8000.00', '8000.00', NULL, 'N/A', 'N/A', 1, NULL, NULL, NULL),
(32, 18, 1, 1, 'PURITY HAPPY AKINYI', 'null@blocks.co.ke', 2300000, '0725 560124', '6500.00', '6500.00', NULL, 'SAFARI THOYA ', '0733 215099', 1, NULL, NULL, NULL),
(33, 18, 1, 1, 'YUSSUFOKASH', 'null@blocks.co.ke', 2300000, '0734 227112', '6500.00', '6500.00', NULL, 'N/A', 'N/A', 1, NULL, NULL, NULL),
(34, 18, 1, 1, 'SAMUEL MUYE', 'null@blocks.co.ke', 2300000, '0728 803567', '6500.00', '6500.00', NULL, 'N/A', 'N/A', 1, NULL, NULL, NULL),
(35, 18, 1, 1, 'ANASTANCIA MUSYOKI', 'null@blocks.co.ke', 23000000, '0780 682684', '7000.00', '7000.00', NULL, 'N/A', 'N/A', 1, NULL, NULL, NULL),
(36, 18, 1, 1, 'ALVIN IMBUKA', 'null@blocks.co.ke', 2300000, '0708 555480', '6500.00', '6500.00', NULL, 'N/A', 'N/A', 1, NULL, NULL, NULL),
(37, 18, 1, 1, 'ISMAIL MGANA MWAZUMA', 'null@blocks.co.ke', 23000000, '0715 59995', '6500.00', '6500.00', NULL, 'N/A', 'N/A', 1, NULL, NULL, NULL),
(38, 19, 1, 1, 'RISPER BENSON SHUKURANI', 'null@blocks.co.ke', 23000000, '0728 773902', '10000.00', '10000.00', NULL, 'N/A', 'N/A', 1, NULL, NULL, NULL),
(39, 19, 1, 1, 'PHANUEL JABIYA OCHIENG\'', 'null@blocks.co.ke', 2300000, '0707 245071', '10000.00', '10000.00', NULL, 'N/A', 'N/A', 1, NULL, NULL, NULL),
(40, 18, 1, 1, 'ABIGAEL MKUNGO', 'null@blocks.co.ke', 23680000, '0780 241878', '10000.00', '10000.00', NULL, 'JAMES OBERI', '0704 533290', 1, NULL, NULL, NULL),
(41, 19, 1, 1, 'EVA AKINYI', 'null@blocks.co.ke', 23000000, '0733 878197', '10000.00', '10000.00', NULL, 'DAWN', '0748 173563', 1, NULL, NULL, NULL),
(42, 15, 1, 1, 'WYCLIFF OTIENO', 'null@blocks.co.ke', 26000000, '0723 914195', '8500.00', '8500.00', NULL, 'FAITH', '0781 015033', 1, NULL, NULL, NULL),
(43, 15, 1, 1, 'EUNITA WAVINYA MWENDWA', 'null@blocks.co.ke', 2300000, '0729 872931', '8500.00', '8500.00', NULL, 'N/A', 'N/A', 1, NULL, NULL, NULL),
(44, 15, 1, 1, 'WASHINGTON KIPKORIR BOSUBEN', 'null@blocks.co.ke', 23000000, '0725 815494', '8500.00', '8500.00', NULL, 'N/A', 'N/A', 1, NULL, NULL, NULL),
(45, 15, 1, 1, 'MONICA KAMAU', 'null@blocks.co.ke', 2300000, '0723 614333', '8500.00', '8500.00', NULL, 'N/A', 'N/A', 1, NULL, NULL, NULL),
(46, 15, 1, 1, 'MZEE YUSSUF GORRO', 'null@blocks.co.ke', 23000000, '0722 506925', '8500.00', '8500.00', NULL, 'N/A', 'N/A', 1, NULL, NULL, NULL),
(47, 15, 1, 1, 'DORIS KENDI', 'null@blocks.co.ke', 2300000, '0707 395719', '8500.00', '8500.00', NULL, 'N/A', 'N/A', 1, NULL, NULL, NULL),
(48, 15, 1, 1, 'SAMUEL ODUOR', 'null@blocks.co.ke', 2300000, '0718 545928', '8500.00', '8500.00', NULL, 'N/A', 'N/A', 1, NULL, NULL, NULL),
(49, 20, 1, 1, 'ABERT MWALIMU MENZA', 'null@blocks.co.ke', 2300000, '0754 517727', '2500.00', '2500.00', NULL, 'N/A', 'N/A', 1, NULL, NULL, NULL),
(50, 20, 1, 1, 'CLEOPHAS OUMA OTIENO', 'null@blocks.co.ke', 2300000, '0738 458409', '2500.00', '2500.00', NULL, 'N/A', 'N/A', 1, NULL, NULL, NULL),
(51, 20, 1, 1, 'SULEIMAN TUKU MWATUNDO', 'null@blocks.co.ke', 2300000, '0105 093950', '2500.00', '2500.00', NULL, 'N/A', 'N/A', 1, NULL, NULL, NULL),
(52, 20, 1, 1, 'CHRISPIN KITIRO', 'null@blocks.co.ke', 2300000, '0741 117680', '2500.00', '2500.00', NULL, 'N/A', 'N/A', 1, NULL, NULL, NULL),
(53, 20, 1, 1, 'DICKEN OMONDI OMOLLO', 'null@blocks.co.ke', 2300000, '0701 674809', '2500.00', '2500.00', NULL, 'SYLVIA', '0740 748072', 1, NULL, NULL, NULL),
(54, 20, 1, 1, 'MONICA MWANGI', 'null@blocks.co.ke', 2300000, '0722 520145', '2500.00', '2500.00', NULL, 'N/A', 'N/A', 1, NULL, NULL, NULL),
(55, 21, 1, 1, 'BILLAH NAVALAYO MULEFU', 'null@blocks.co.ke', 2300000, '0740 163478', '4500.00', '4500.00', NULL, 'OMARI MAKHOLO', '0710 718092', 1, NULL, NULL, NULL),
(56, 21, 1, 1, 'DOLPHINE ODHIAMBO', 'null@blocks.co.ke', 23000000, '0718 297473', '3000.00', '3000.00', NULL, 'N/A', 'N/A', 1, NULL, NULL, NULL),
(57, 21, 1, 1, 'DOLPHINE ADHIAMBO', 'null@blocks.co.ke', 2300000, '0718 297473', '3000.00', '3000.00', NULL, 'N/A', 'N/A', 1, NULL, NULL, NULL),
(58, 22, 1, 1, 'WINNIE TUMAINI KAZUNGU', 'null@blocks.co.ke', 2300000, '0701 079661', '5500.00', '5500.00', NULL, 'N/A', 'N/A', 1, NULL, NULL, NULL),
(59, 22, 1, 1, 'EVANCE OBUNGA', 'null@blocks.co.ke', 2300000, '0725 611101', '5500.00', '5500.00', NULL, 'N/A', 'N/A', 1, NULL, NULL, NULL),
(60, 22, 1, 1, 'JOSEPHAT MUTISO', 'null@blocks.co.ke', 34584789, '0706 354632', '5500.00', '5500.00', NULL, 'N/A', 'N/A', 1, NULL, NULL, NULL),
(61, 22, 1, 1, 'DERRICK GITUMA', 'null@blocks.co.ke', 23000000, '0795 704640', '5500.00', '5500.00', NULL, 'N/A', 'N/A', 1, NULL, NULL, NULL),
(62, 22, 1, 1, 'BEVERY KANAIZA SABUA', 'null@blocks.co.ke', 2300000, '0746 438518', '5500.00', '5500.00', NULL, 'N/A', 'N/A', 1, NULL, NULL, NULL),
(63, 22, 1, 1, 'JEFF KUNGU', 'null@blocks.co.ke', 230000, '0739 186796', '5500.00', '5500.00', NULL, 'N/A', 'N/A', 1, NULL, NULL, NULL),
(64, 22, 1, 1, 'SALIM MAINA WANGUI', 'null@blocks.co.ke', 2300000, '0795 600162', '5500.00', '5500.00', NULL, 'N/A', 'N/A', 1, NULL, NULL, NULL),
(65, 22, 1, 1, 'ANGELLA MUKAI MALUSI', 'null@blocks.co.ke', 28875586, '0700 127299', '5000.00', '5000.00', NULL, 'N/A', 'N/A', 1, NULL, NULL, NULL),
(66, 23, 1, 1, 'DEBORA MURUGAMI', 'null@blocks.co.ke', 230000, '0746 277884', '2000.00', '2000.00', NULL, 'N/A', 'N/A', 1, NULL, NULL, NULL),
(67, 23, 1, 1, 'AMOS MAKHANU', 'null@blocks.co.ke', 2300000, '0711 520721', '2500.00', '2500.00', NULL, 'N/A', 'N/A', 1, NULL, NULL, NULL),
(68, 23, 1, 1, 'LIVINGSTONE WAKALO', 'null@blocks.co.ke', 2300000, '0758 428104', '4500.00', '4500.00', NULL, 'MAMA', '0739 583293', 1, NULL, NULL, NULL),
(69, 23, 1, 1, 'KAHINDI PEKECHE', 'null@blocks.co.ke', 2300000, '0723 156951', '4000.00', '4000.00', NULL, 'N/A', 'N/A', 1, NULL, NULL, NULL),
(70, 24, 1, 1, 'MOHAMED KHAMISI', 'null@blocks.co.ke', 230000, '0701 987918', '4500.00', '4500.00', NULL, 'N/A', 'N/A', 1, NULL, NULL, NULL),
(71, 24, 1, 1, 'ANN VIVI WANGARI', 'null@blocks.co.ke', 2300000, '0795 761909', '4500.00', '4500.00', NULL, 'SWALEH AHMED', '0791 262565', 1, NULL, NULL, NULL),
(72, 24, 1, 1, 'MARYLILY GITHAIGA', 'null@blocks.co.ke', 230000, '0742 356555', '4500.00', '4500.00', NULL, 'N/A', 'N/A', 1, NULL, NULL, NULL),
(73, 24, 1, 1, 'IBRAHIM MUSA SEIFU', 'null@blocks.co.ke', 2300000, '0721 81966', '4500.00', '4500.00', NULL, 'N/A', 'N/A', 1, NULL, NULL, NULL),
(74, 24, 1, 1, 'HARUN MUSTAFA MOHAMED', 'null@blocks.co.ke', 230000, '0716 397414', '4500.00', '4500.00', NULL, 'N/A', 'N/A', 1, NULL, NULL, NULL),
(75, 25, 1, 1, 'AMANI JEMBE NZIVO', 'null@blocks.co.ke', 230000, '0718 880979', '2500.00', '2500.00', NULL, 'N/A', 'N/A', 1, NULL, NULL, NULL),
(76, 25, 1, 1, 'GEOFREY OKUMU', 'null@blocks.co.ke', 230000, '0701 116294', '2500.00', '2500.00', NULL, 'N/A', 'N/A', 1, NULL, NULL, NULL),
(77, 25, 1, 1, 'JOEL MAE', 'null@blocks.co.ke', 2300000, '0705 710564', '2500.00', '2500.00', NULL, 'N/A', 'N/A', 1, NULL, NULL, NULL),
(78, 25, 1, 1, 'TEDDYSON CHAI ALI', 'null@blocks.co.ke', 2300000, '0783 498240', '2500.00', '2500.00', NULL, 'N/A', 'N/A', 1, NULL, NULL, NULL),
(79, 25, 1, 1, 'JAPHETH KYALO', 'null@blocks.co.ke', 2300000, '0715 689386', '2500.00', '2500.00', NULL, 'N/A', 'N/A', 1, NULL, NULL, NULL),
(80, 25, 1, 1, 'SUBSTONE DIMBU MANERA', 'null@blocks.co.ke', 2300000, '0726 752619', '2500.00', '2500.00', NULL, 'N/A', 'N/A', 1, NULL, NULL, NULL),
(81, 26, 1, 1, 'DAVID LUSAMBO MASITZA', 'null@blocks.co.ke', 230000, '0741 399974', '5500.00', '11000.00', NULL, 'N/A', 'N/A', 1, NULL, NULL, NULL),
(82, 26, 1, 1, 'MWANAMISI KHAMISI', 'null@blocks.co.ke', 234661696, '0717 755309', '2300.00', '2300.00', NULL, 'N/A', 'N/A', 1, NULL, NULL, NULL),
(83, 27, 1, 1, 'HALIMA MOHAMED', 'null@blocks.co.ke', 2300000, '0727 027301', '13000.00', '13000.00', NULL, 'N/A', 'N/A', 1, NULL, NULL, NULL),
(84, 27, 1, 1, 'CLIFF OCHIENG\'', 'null@blocks.co.ke', 23000000, '0723 112690', '14000.00', '14000.00', NULL, 'N/A', 'N/A', 1, NULL, NULL, NULL),
(85, 27, 1, 1, 'TOM MWAKULE', 'null@blocks.co.ke', 23000000, '0740 921017', '13000.00', '13000.00', NULL, 'N/A', 'N/A', 1, NULL, NULL, NULL),
(86, 27, 1, 1, 'VALENTINE MUSYOKA', 'null@blocks.co.ke', 23000000, '0716 628954', '15000.00', '15000.00', NULL, 'N/A', 'N/A', 1, NULL, NULL, NULL),
(87, 27, 1, 1, 'SAMUEL NDICHU', 'null@blocks.co.ke', 23000000, '0725 157463', '15000.00', '15000.00', NULL, 'N/A', 'N/A', 1, NULL, NULL, NULL),
(88, 27, 1, 1, 'PIUS BETT ', 'null@blocks.co.ke', 33019756, '0113346198', '15000.00', '15000.00', NULL, 'N/A', 'N/A', 1, NULL, NULL, NULL),
(89, 28, 1, 1, 'ELIZABETH WANJIRU', 'null@blocks.co.ke', 23000000, '0726 605253', '3000.00', '3000.00', NULL, 'N/A', 'N/A', 1, NULL, NULL, NULL),
(90, 28, 1, 1, 'ESHA MOHAMED', 'null@blocks.co.ke', 23000000, '0723 655680', '3000.00', '3000.00', NULL, 'N/A', 'N/A', 1, NULL, NULL, NULL),
(91, 28, 1, 1, 'THABU KITSAO RUWA', 'null@blocks.co.ke', 23000000, '0714 652205', '3000.00', '3000.00', NULL, 'BRAMUEL WERABU', '0717 7080684', 1, NULL, NULL, NULL),
(92, 28, 1, 1, 'JEFA NZARO', 'null@blocks.co.ke', 2300000, '0707 292527', '2000.00', '2000.00', NULL, 'N/A', '0101 376708', 1, NULL, NULL, NULL),
(93, 28, 1, 1, 'IRENE GUSOLO NAKAYENZE', 'null@blocks.co.ke', 23000000, '0790 089129', '3000.00', '3000.00', NULL, 'N/A', 'N/A', 1, NULL, NULL, NULL),
(94, 28, 1, 1, 'ESHA MOHAMED', 'null@blocks.co.ke', 23000000, '0723 655680', '3000.00', '3000.00', NULL, 'N/A', 'N/A', 1, NULL, NULL, NULL),
(95, 28, 1, 1, 'SHABAN MDZOMBA', 'null@blocks.co.ke', 23000000, '0723 655680', '3000.00', '3000.00', NULL, 'N/A', 'N/A', 1, NULL, NULL, NULL),
(96, 28, 1, 1, 'TYSON WANYAMA', 'null@blocks.co.ke', 23000000, '0725 112469', '800.00', '800.00', NULL, 'ALLAN', '0702 808942', 1, NULL, NULL, NULL),
(97, 29, 1, 1, 'PRUDENCE NGELE', 'pmkungo@yahoo.com', 23000000, '0726493374', '11000.00', '11000.00', NULL, 'N/A', 'N/A', 1, NULL, NULL, NULL),
(98, 30, 1, 1, 'JOHN KAMAU NJERU', 'null@blocks.co.ke', 23000000, '0712 809893', '2500.00', '2500.00', NULL, 'N/A', 'N/A', 1, NULL, NULL, NULL),
(99, 31, 1, 1, 'MICHAEL MUTISO', 'null@blocks.co.ke', 230000, '0716 564453', '15000.00', '15000.00', NULL, 'CHRISTINE ', '0716 615780', 1, NULL, NULL, NULL),
(100, 31, 1, 1, 'GABRIELLA MUSYOKA', 'null@blocks.co.ke', 23000000, '0719 464920', '13000.00', '13000.00', NULL, 'N/A', 'N/A', 1, NULL, NULL, NULL),
(101, 31, 1, 1, 'PAULINE YAMO', 'null@blocks.co.ke', 23000000, '0710 86937', '5500.00', '5500.00', NULL, 'N/A', 'N/A', 1, NULL, NULL, NULL),
(102, 31, 1, 1, 'LUKAGALANA', 'null@blocks.co.ke', 30421548, '0704 331451', '5500.00', '5500.00', NULL, 'N/A', 'N/A', 1, NULL, NULL, NULL),
(103, 31, 1, 1, 'BEATRICE AJIAMBO', 'null@blocks.co.ke', 23000000, '0720 901245', '6000.00', '6000.00', NULL, 'N/A', 'N/A', 1, NULL, NULL, NULL),
(104, 31, 1, 1, 'JOHN NJOROGE MUIGAI', 'null@blocks.co.ke', 23000000, '0721 572761', '6000.00', '6000.00', NULL, 'N/A', 'N/A', 1, NULL, NULL, NULL),
(105, 31, 1, 1, 'MUHSIN ALI ATHUMAN', 'null@blocks.co.ke', 23000000, '0720 116165', '6000.00', '6000.00', NULL, 'N/A', 'N/A', 1, NULL, NULL, NULL),
(106, 31, 1, 1, 'TRIAL ON BLUNDER', 'null@blocks.co.ke', 23687308, '0720 317750', '16.00', '16.00', NULL, 'N/A', 'N/A', 1, NULL, NULL, NULL),
(107, 32, 1, 1, 'MICHAEL MUTISO', 'null@blocks.co.ke', 23000000, '0716 564453', '8000.00', '8000.00', NULL, 'N/A', 'N/A', 1, NULL, NULL, NULL),
(108, 32, 1, 1, 'BENARD OMONDI HAWALA', 'null@blocks.co.ke', 23000000, '0720 885612', '8000.00', '8000.00', NULL, 'N/A', 'N/A', 1, NULL, NULL, NULL),
(109, 32, 1, 1, 'FLORENCE MBATHYA MUNYOKI', 'null@blocks.co.ke', 23000000, '0740 570565', '8000.00', '8000.00', NULL, 'N/A', '0750 429433', 1, NULL, NULL, NULL),
(110, 32, 1, 1, 'NANCY MBALA', 'null@blocks.co.ke', 23000000, '0707 500011', '8000.00', '8000.00', NULL, 'N/A', 'N/A', 1, NULL, NULL, NULL),
(111, 32, 1, 1, 'ALEX BANDE OKIKI', 'null@blocks.co.ke', 23000000, '0780 647144', '8000.00', '8000.00', NULL, 'N/A', 'N/A', 1, NULL, NULL, NULL),
(112, 33, 1, 1, 'ADAM ABASS SWALEH', 'null@blocks.co.ke', 23000000, '0711 264834', '2000.00', '2000.00', NULL, 'N/A', 'N/A', 1, NULL, NULL, NULL),
(113, 33, 1, 1, 'SAMUEL KATANA', 'null@blocks.co.ke', 23000000, '0726 279575', '3000.00', '3000.00', NULL, 'N/A', 'N/A', 1, NULL, NULL, NULL),
(114, 33, 1, 1, 'JOHN CHARO', 'null@blocks.co.ke', 23000000, '0721 291547', '2500.00', '2500.00', NULL, 'N/A', 'N/A', 1, NULL, NULL, NULL),
(115, 33, 1, 1, 'MOHAMED KOMBO TSUMA', 'null@blocks.co.ke', 230000000, '0115578111', '2500.00', '2500.00', NULL, 'N/A', 'N/A', 1, NULL, NULL, NULL),
(116, 33, 1, 1, 'JOSEPH BIDII', 'null@blocks.co.ke', 23000000, '0725 473120', '2500.00', '2500.00', NULL, 'N/A', 'N/A', 1, NULL, NULL, NULL),
(117, 33, 1, 1, 'SAMUEL ODHIAMBO', 'null@blocks.co.ke', 23000000, '0743 973008', '2500.00', '2500.00', NULL, '0752 046790', '0711 930550', 1, NULL, NULL, NULL),
(118, 33, 1, 1, 'ALEX MJOMBA', 'null@blocks.co.ke', 23000000, '0717 076310', '2500.00', '2500.00', NULL, 'N/A', 'N/A', 1, NULL, NULL, NULL),
(119, 33, 1, 1, 'PETER MARIAUNI KAMULI', 'null@blocks.co.ke', 23000000, '0706 224540', '3000.00', '3000.00', NULL, 'N/A', 'N/A', 1, NULL, NULL, NULL),
(120, 33, 1, 1, 'MICHAEL CHIVATSI', 'null@blocks.co.ke', 23000000, '0757 576698', '3000.00', '3000.00', NULL, 'N/A', 'N/A', 1, NULL, NULL, NULL),
(121, 34, 1, 1, 'HAMILTON NDERITU', 'null@blocks.co.ke', 23000000, '0701 3333499', '5000.00', '5000.00', NULL, 'N/A', 'N/A', 1, NULL, NULL, NULL),
(122, 34, 1, 1, 'EVERLYNE ANYANGO OSORO', 'null@blocks.co.ke', 23000000, '0723 738406', '5000.00', '5000.00', NULL, 'OSORO', '0780 712879', 1, NULL, NULL, NULL),
(123, 35, 1, 1, 'MIRAH SAKINA', 'null@blocks.co.ke', 23000000, '0702 514040', '8000.00', '8000.00', NULL, 'MOHAMED SAID HASSAN', '0712 595520', 1, NULL, NULL, NULL),
(124, 35, 1, 1, 'GRACE MWIKALI', 'null@blocks.co.ke', 23000000, '0704 888743', '7000.00', '7000.00', NULL, 'N/A', 'N/A', 1, NULL, NULL, NULL),
(125, 35, 1, 1, 'CLEMENCE MWAMBII', 'null@blocks.co.ke', 23000000, '0707 264488', '8000.00', '8000.00', NULL, 'N/A', '0757 155841', 1, NULL, NULL, NULL),
(126, 35, 1, 1, 'ROSE AKINYI WASONGA', 'null@blocks.co.ke', 23000000, '0723 141173', '7000.00', '7000.00', NULL, 'N/A', 'N/A', 1, NULL, NULL, NULL),
(127, 36, 1, 1, 'MARIAM HUSSEIN ABDALLA', 'null@blocks.co.ke', 23000000, '0708 569844', '5000.00', '5000.00', NULL, 'N/A', 'N/A', 1, NULL, NULL, NULL),
(128, 37, 1, 1, 'YONA MBIRHA', 'null@blocks.co.ke', 25000000, '0726 528126', '5000.00', '5000.00', NULL, 'N/A', 'N/A', 1, NULL, NULL, NULL),
(129, 37, 1, 1, 'ERICK ODHIAMBO', 'null@blocks.co.ke', 25000000, '0720 496465', '4500.00', '4500.00', NULL, 'N/A', 'N/A', 1, NULL, NULL, NULL),
(130, 1, 1, 1, 'Patrick', 'patrick@gmail.com', 123456, '0798272066', '13500.00', '27000.00', NULL, 'Sam', '072013456', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tenant_payments`
--

CREATE TABLE `tenant_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tenant_id` bigint(20) UNSIGNED DEFAULT NULL,
  `property_id` bigint(20) UNSIGNED DEFAULT NULL,
  `business_id` bigint(20) UNSIGNED NOT NULL,
  `unit_id` bigint(20) UNSIGNED DEFAULT NULL,
  `amount_paid` decimal(60,2) NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cash_receipt_number` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mpesa_code` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_receipt_number` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_payment_description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tenant_payments`
--

INSERT INTO `tenant_payments` (`id`, `tenant_id`, `property_id`, `business_id`, `unit_id`, `amount_paid`, `payment_method`, `cash_receipt_number`, `mpesa_code`, `bank_receipt_number`, `other_payment_description`, `payment_date`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 1, 1, '500.00', 'mpesa', NULL, 'QXYZ123', NULL, NULL, '2022-03-10', '2022-03-21 09:50:42', '2022-03-21 09:50:42', NULL),
(2, 1, 1, 1, 1, '500.00', 'cash', 'R2022032100277', NULL, NULL, NULL, '2022-03-21', '2022-03-21 09:51:15', '2022-03-21 09:51:15', NULL),
(3, 1, 1, 1, 1, '500.00', 'cash', 'R2022032100277', NULL, NULL, NULL, '2022-04-01', '2022-03-21 09:51:15', '2022-03-21 09:51:15', NULL),
(4, 1, 1, 1, 1, '2000.00', 'cash', NULL, NULL, NULL, NULL, '06-02-2022', NULL, NULL, NULL),
(6, 4, 4, 1, 1, '8000.00', 'cash', NULL, NULL, NULL, NULL, '07-02-2022', NULL, NULL, NULL),
(7, 4, 4, 1, 1, '4000.00', 'cash', NULL, NULL, NULL, NULL, '07-02-2022', NULL, NULL, NULL),
(8, 4, 4, 1, 1, '2000.00', 'cash', NULL, NULL, NULL, NULL, '07-02-2022', NULL, NULL, NULL),
(9, 2, 1, 1, 1, '3000.00', 'cash', NULL, NULL, NULL, NULL, '08-02-2022', NULL, NULL, NULL),
(11, 14, 5, 1, 1, '9000.00', 'cash', NULL, NULL, NULL, NULL, '11-02-2022', NULL, NULL, NULL),
(12, 14, 5, 1, 1, '1000.00', 'cash', NULL, NULL, NULL, NULL, '11-02-2022', NULL, NULL, NULL),
(25, 24, 13, 1, 1, '9000.00', 'cash', NULL, NULL, NULL, NULL, '17-02-2022', NULL, NULL, NULL),
(26, 14, 5, 1, 1, '500.00', 'cash', NULL, NULL, NULL, NULL, '20-02-2022', NULL, NULL, NULL),
(27, 25, 14, 1, 1, '3000.00', 'cash', NULL, NULL, NULL, NULL, '21-02-2022', NULL, NULL, NULL),
(29, 24, 13, 1, 1, '1000.00', 'cash', NULL, NULL, NULL, NULL, '22-02-2022', NULL, NULL, NULL),
(30, 16, 12, 1, 1, '3000.00', 'cash', NULL, NULL, NULL, NULL, '23-02-2022', NULL, NULL, NULL),
(34, 14, 12, 1, 1, '550.00', 'cash', NULL, NULL, NULL, NULL, '26-02-2022', NULL, NULL, NULL),
(35, 14, 31, 1, 1, '15500.00', 'cash', NULL, NULL, NULL, NULL, '27-02-2022', NULL, NULL, NULL),
(37, 14, 37, 1, 1, '7000.00', 'cash', NULL, NULL, NULL, NULL, '05-12-2021', NULL, NULL, NULL),
(38, 14, 37, 1, 1, '2000.00', 'cash', NULL, NULL, NULL, NULL, '05-03-2022', NULL, NULL, NULL),
(39, 14, 13, 1, 1, '4000.00', 'cash', NULL, NULL, NULL, NULL, '07-03-2022', NULL, NULL, NULL),
(40, 14, 12, 1, 1, '3000.00', 'cash', NULL, NULL, NULL, NULL, '11-03-2022', NULL, NULL, NULL),
(41, 14, 12, 1, 1, '3000.00', 'cash', NULL, NULL, NULL, NULL, '11-03-2022', NULL, NULL, NULL),
(42, 14, 1, 1, 1, '13500.00', 'cash', NULL, NULL, NULL, NULL, '14-03-2022', NULL, NULL, NULL),
(43, 14, 1, 1, 1, '0.00', 'cash', NULL, NULL, NULL, NULL, '14-03-2022', NULL, NULL, NULL),
(44, 14, 5, 1, 1, '500.00', 'cash', NULL, NULL, NULL, NULL, '17-03-2022', NULL, NULL, NULL),
(45, 14, 12, 1, 1, '3000.00', 'cash', NULL, NULL, NULL, NULL, '18-03-2022', NULL, NULL, NULL),
(46, 14, 12, 1, 1, '2300.00', 'cash', NULL, NULL, NULL, NULL, '20-03-2022', NULL, NULL, NULL),
(47, 1, 1, 1, 1, '10500.00', 'cash', NULL, NULL, NULL, NULL, '06-02-2022', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `property_id` bigint(20) UNSIGNED DEFAULT NULL,
  `business_id` bigint(20) UNSIGNED NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `name`, `property_id`, `business_id`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'X1', 1, 1, 1, '2022-03-21 09:46:31', '2022-03-21 09:48:49', NULL),
(2, 'X2', 1, 1, 0, '2022-03-21 09:46:31', '2022-03-21 09:46:31', NULL),
(3, 'X3', 1, 1, 0, '2022-03-21 09:46:31', '2022-03-21 09:46:31', NULL),
(4, 'X4', 1, 1, 0, '2022-03-21 09:46:31', '2022-03-21 09:46:31', NULL),
(5, 'X5', 1, 1, 0, '2022-03-21 09:46:31', '2022-03-21 09:46:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `business_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` datetime DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_of_properties` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `business_id`, `name`, `email`, `gender`, `phone`, `location`, `email_verified_at`, `password`, `remember_token`, `no_of_properties`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, NULL, 'Wilson Kinyua', 'wilsonkinyuam@gmail.com', NULL, NULL, NULL, NULL, '$2y$10$1S2m9/Oef858dfIzR0zhkuJxd4KKn4vbAUqZ/senPS/KG87sjnWU.', NULL, 0, NULL, NULL, NULL),
(2, 1, 'Patrick Oginga', 'admin@blocks.co.ke', NULL, NULL, NULL, NULL, '$2y$10$1a8f7C8DHIDZmwG/zbzPnuZmTGLsYhYG83GP8AB5Q.SARDmj6SDJe', NULL, 0, NULL, '2022-03-17 11:30:17', NULL),
(3, NULL, 'John Doe', 'user@blocks.co.ke', NULL, NULL, NULL, NULL, '$2y$10$i9PGlMFaOCMUz8Qz0HmXLehhJX6bPpLd9QJ/dYYE.kaOT/yE/xtMS', NULL, 0, NULL, NULL, NULL),
(4, 2, 'Blocks', 'demo@blocks.co.ke', NULL, '0798272066', 'Mombasa', NULL, '$2y$10$v3chAUCriU/nFgas/SC2cO8FfBFzrQc.VlrkvllRB0BlR86PupiV2', NULL, 10, '2022-03-21 19:48:41', '2022-03-21 19:52:34', NULL),
(17, 1, 'Patrick Oginga', 'patrick@blocks.co.ke', NULL, '0798272066', 'Mombasa', NULL, 'cbb7353e6d953ef360baf960c122346276c6e320', NULL, 0, '2022-01-24 02:57:09', NULL, NULL),
(18, 1, 'collins becky', 'collincebecky@gmail.com', NULL, '0796770664', 'Nyali Mombasa', NULL, '0e0903ada7dbf22f75faff05aad4070370e46cdb', NULL, 0, '2022-01-24 09:03:29', NULL, NULL),
(19, 1, 'Block Demo', 'demo@demo.com', NULL, '0798272066', 'Mombasa, Kenya ', NULL, '89e495e7941cf9e40e6980d14a16bf023ccd4c91', NULL, 0, '2022-01-25 09:18:09', NULL, NULL),
(20, 1, 'jay', 'jamescarel966@gmail.com', NULL, '45677675', 'msa', NULL, '8cb2237d0679ca88db6464eac60da96345513964', NULL, 0, '2022-01-26 12:18:26', NULL, NULL),
(22, 1, 'ALLAN OTIENO ', 'otienoallan7@gmail.com', NULL, '0788666838', 'Nairobi ', NULL, '16a39312733e794ed45c2271a902ef44a15c7d69', NULL, 0, '2022-01-26 20:10:51', NULL, NULL),
(23, 1, 'user', 'owner@example.com', NULL, '0723456780', 'Bamburi', NULL, '66f171d88474476cb4933b33b39cceba825e24f1', NULL, 0, '2022-01-27 12:25:20', NULL, NULL),
(24, 1, 'Zelda Davidson', 'muzo@mailinator.com', NULL, '+1 (854) 163-41', 'Et alias ullam ducim', NULL, NULL, NULL, 0, '2022-01-27 22:40:23', NULL, NULL),
(25, 1, 'Kibe John', 'kibejohn@cladfy.com', NULL, '+254790819096', 'Mombasa Kenya', NULL, '6ef34e08190b13e0aae4cd700395702bd3d0aa33', NULL, 0, '2022-01-28 09:51:01', NULL, NULL),
(26, 1, 'LYDIAH LUCKY', 'lmkungo71@gmail.com', NULL, '+254722504028', 'Bamburi, Kenya', NULL, '46ac4c4ceed4569b70f24fccfe89e3ef7a1022aa', NULL, 0, '2022-01-31 11:09:15', NULL, NULL),
(32, 1, 'NYALLANI INVESTMENTS LIMITED', 'nyallani.inv@gmail.com', NULL, '0792561688', 'MAJAONI  SHANZU -MOMBASA', NULL, '21d25517c9b5289bcf1b1b86e142e522e7f5abe5', NULL, 0, '2022-01-31 13:42:39', NULL, NULL),
(33, 1, 'tsofa', 'tsofa@gmail.com', NULL, '0736767677', 'kilimo', NULL, '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', NULL, 0, '2022-02-02 23:56:50', NULL, NULL),
(34, 1, 'Maigua Maina', 'maiguamaina@gmail.com', NULL, '0202332262', 'Ruiru', NULL, '373cc5f62c7aa238ff872ffe5716bf724cfd8f1e', NULL, 0, '2022-02-05 07:12:46', NULL, NULL),
(35, 1, 'Arafat', 'araphatarafat@gmail.com', NULL, '0792585959', 'Bamburi ', NULL, 'de0edbb7a0ede132b89525c0d1ff9c9db47215f6', NULL, 0, '2022-02-13 12:16:13', NULL, NULL),
(36, 1, 'SOLOMON', 'emedzam@gmail.com', NULL, '+254707064650', 'KISIMANI', NULL, '729a52a466ebfdc0477e3934ecafc27bae9f6fba', NULL, 0, '2022-02-16 15:47:59', NULL, NULL),
(37, 1, 'Aubrey Brady', 'landlord@tester.com', NULL, '+1 (362) 307-4707', 'Nairobi Kenya', NULL, '89e495e7941cf9e40e6980d14a16bf023ccd4c91', NULL, 0, '2022-02-17 13:53:06', NULL, NULL),
(38, 1, 'Cleo Hopper', 'kygizovawe@mailinator.com', NULL, '+1 (685) 921-8759', 'Et labore molestiae ', NULL, NULL, NULL, 0, '2022-02-20 16:55:04', NULL, NULL),
(39, 1, 'joel', 'joelkilonzojp@gmail.com', NULL, '0707075713', 'kisimani', NULL, '52639ad616042b89d486e9ca4951d5aa82ca873d', NULL, 0, '2022-02-21 11:50:56', NULL, NULL),
(40, 1, 'anok', 'kibetanok@gmail.com', NULL, '0713702246', 'Eldoret', NULL, '01b307acba4f54f55aafc33bb06bbbf6ca803e9a', NULL, 0, '2022-02-28 18:13:25', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `businesses`
--
ALTER TABLE `businesses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `businesses_created_by_index` (`created_by`);

--
-- Indexes for table `inventories`
--
ALTER TABLE `inventories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `media_model_type_model_id_index` (`model_type`,`model_id`);

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
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD KEY `role_id_fk_5754692` (`role_id`),
  ADD KEY `permission_id_fk_5754692` (`permission_id`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`),
  ADD KEY `properties_business_id_index` (`business_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD KEY `user_id_fk_5754701` (`user_id`),
  ADD KEY `role_id_fk_5754701` (`role_id`);

--
-- Indexes for table `tenants`
--
ALTER TABLE `tenants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tenants_property_id_index` (`property_id`),
  ADD KEY `tenants_business_id_index` (`business_id`),
  ADD KEY `tenants_unit_id_index` (`unit_id`);

--
-- Indexes for table `tenant_payments`
--
ALTER TABLE `tenant_payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tenant_payments_tenant_id_index` (`tenant_id`),
  ADD KEY `tenant_payments_property_id_index` (`property_id`),
  ADD KEY `tenant_payments_business_id_index` (`business_id`),
  ADD KEY `tenant_payments_unit_id_index` (`unit_id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`),
  ADD KEY `units_property_id_index` (`property_id`),
  ADD KEY `units_business_id_index` (`business_id`);

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
-- AUTO_INCREMENT for table `businesses`
--
ALTER TABLE `businesses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `inventories`
--
ALTER TABLE `inventories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tenants`
--
ALTER TABLE `tenants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `tenant_payments`
--
ALTER TABLE `tenant_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `businesses`
--
ALTER TABLE `businesses`
  ADD CONSTRAINT `businesses_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_id_fk_5754692` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_id_fk_5754692` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `properties`
--
ALTER TABLE `properties`
  ADD CONSTRAINT `properties_business_id_foreign` FOREIGN KEY (`business_id`) REFERENCES `businesses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_id_fk_5754701` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_id_fk_5754701` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tenants`
--
ALTER TABLE `tenants`
  ADD CONSTRAINT `tenants_business_id_foreign` FOREIGN KEY (`business_id`) REFERENCES `businesses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tenants_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tenants_unit_id_foreign` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tenant_payments`
--
ALTER TABLE `tenant_payments`
  ADD CONSTRAINT `tenant_payments_business_id_foreign` FOREIGN KEY (`business_id`) REFERENCES `businesses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tenant_payments_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tenant_payments_tenant_id_foreign` FOREIGN KEY (`tenant_id`) REFERENCES `tenants` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tenant_payments_unit_id_foreign` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `units`
--
ALTER TABLE `units`
  ADD CONSTRAINT `units_business_id_foreign` FOREIGN KEY (`business_id`) REFERENCES `businesses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `units_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
