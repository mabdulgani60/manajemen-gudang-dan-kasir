-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Sep 2021 pada 08.19
-- Versi server: 10.1.39-MariaDB
-- Versi PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `expenses`
--

CREATE TABLE `expenses` (
  `id` int(10) UNSIGNED NOT NULL,
  `expenses_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `party_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `totalamount` double NOT NULL,
  `paidamount` double NOT NULL,
  `dueamount` double NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modified_by` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `expenses`
--

INSERT INTO `expenses` (`id`, `expenses_name`, `party_name`, `totalamount`, `paidamount`, `dueamount`, `product_name`, `created_by`, `modified_by`, `created_at`, `updated_at`) VALUES
(1, 'Rent Expenses', 'House Owner', 50000, 5000, 45000, 'home', 'admin', 'admin', '2017-07-20 09:01:44', '2017-07-20 09:01:57'),
(2, 'Bill payment', 'Subusu', 4000, 4000, 0, 'Internet', 'admin', 'admin', '2017-10-28 14:52:48', '2017-10-28 15:43:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `expensestitles`
--

CREATE TABLE `expensestitles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `expensestitles`
--

INSERT INTO `expensestitles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Consumable Expenses', '2017-07-20 09:00:46', '2017-07-20 09:00:46'),
(2, 'Rent Expenses', '2017-07-20 09:00:58', '2017-07-20 09:00:58'),
(3, 'Bill payment', '2017-10-28 14:52:16', '2017-10-28 14:52:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 2),
(3, '2017_05_28_124228_create_roles_table', 3),
(4, '2017_05_28_124417_create_user_roles_table', 4),
(5, '2017_05_28_124654_create_permissions_table', 5),
(6, '2017_05_28_124806_create_role_permissions_table', 6),
(7, '2017_05_28_125406_create_modules_table', 7),
(8, '2017_05_28_125428_create_role_modules_table', 8),
(9, '2017_06_07_103849_create_productcategories_table', 9),
(10, '2017_06_07_103917_create_products_table', 10),
(11, '2017_06_09_071114_create_sales_table', 11),
(12, '2017_06_26_093722_create_expenses_table', 12),
(13, '2017_07_06_132245_create_salescarts_table', 13),
(14, '2017_07_06_141913_create_expensestitles_table', 14),
(15, '2017_07_07_125933_create_purchases_table', 15),
(17, '2017_07_17_084213_create_transactions_table', 16);

-- --------------------------------------------------------

--
-- Struktur dari tabel `modules`
--

CREATE TABLE `modules` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `module_key` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `module_url` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `module_icon` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `module_rank` int(11) NOT NULL,
  `view_sidebar` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `modules`
--

INSERT INTO `modules` (`id`, `name`, `module_key`, `module_url`, `module_icon`, `module_rank`, `view_sidebar`, `created_at`, `updated_at`) VALUES
(1, 'Kasir', 'dashboard', 'dashboard-panel', 'fa fa-home', 1, 1, '2017-06-21 12:30:00', NULL),
(4, 'Jenis Akun', 'role_management', 'role-list', 'fa fa-eye', 4, 0, '2017-06-06 19:55:09', '2017-06-06 19:55:09'),
(6, 'Kategori Barang', 'productcategory_mgmt', 'productcategory-list', 'fa fa-flag', 3, 1, '2017-06-07 18:09:49', '2017-06-07 18:09:49'),
(7, 'Manajemen Barang', 'product_management', 'product-list', 'fa fa-product-hunt', 2, 1, '2017-06-07 18:11:25', '2017-06-07 18:11:25'),
(8, 'Buat Akun', 'user_management', 'user-register', 'fa fa-user', 12, 1, '2017-06-05 22:44:05', '2017-06-05 22:44:05'),
(16, 'Riwayat Penjualan', 'history', 'history', 'fa fa-history', 5, 1, '2021-09-23 11:08:56', '2021-09-23 11:08:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permission_key` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `permission_key`, `created_at`, `updated_at`) VALUES
(1, 'Create New User', 'user-register', '2017-06-06 21:12:20', '2017-06-06 21:12:20'),
(2, 'Module Create', 'module-create', '2017-06-07 23:18:50', '2017-06-07 23:18:50'),
(3, 'Module View', 'module-list', '2017-06-07 23:19:11', '2017-06-07 23:19:11'),
(4, 'Module Delete', 'module-delete', '2017-06-07 23:19:26', '2017-06-07 23:19:26'),
(5, 'Module Edit', 'module-edit', '2017-06-07 23:19:43', '2017-06-07 23:19:43'),
(6, 'Role View', 'role-list', '2017-06-07 23:20:39', '2017-06-07 23:20:39'),
(7, 'Role Create', 'role-create', '2017-06-07 23:20:52', '2017-06-07 23:20:52'),
(8, 'Permission Asign', 'permission-asign', '2017-06-07 23:21:16', '2017-06-07 23:32:14'),
(9, 'Permission Create', 'permission-create', '2017-06-07 23:21:48', '2017-06-07 23:21:48'),
(10, 'Permission Views', 'permission-list', '2017-06-07 23:22:07', '2017-06-07 23:22:07'),
(11, 'Permission Edit', 'permission-edit', '2017-06-07 23:22:46', '2017-06-07 23:22:46'),
(12, 'Permission Delete', 'permission-delete', '2017-06-07 23:23:18', '2017-06-07 23:23:18'),
(13, 'Productcategory View', 'productcategory-list', '2017-06-07 23:33:40', '2017-06-07 23:33:40'),
(14, 'Product Category Create', 'productcategory-create', '2017-06-07 23:34:38', '2017-06-07 23:34:38'),
(15, 'Product Category Edit', 'productcategory-edit', '2017-06-07 23:35:00', '2017-06-07 23:35:00'),
(16, 'Product Category Delete', 'productcategory-delete', '2017-06-07 23:35:21', '2017-06-07 23:35:21'),
(17, 'Product View', 'product-list', '2017-06-07 23:39:33', '2017-06-07 23:39:33'),
(18, 'Product Create', 'product-create', '2017-06-07 23:39:50', '2017-06-07 23:39:50'),
(19, 'Product Edit', 'product-edit', '2017-06-07 23:40:06', '2017-06-07 23:40:06'),
(20, 'Product Delete', 'product-delete', '2017-06-07 23:40:45', '2017-06-07 23:40:45'),
(25, 'Sales view', 'sales-list', '2017-07-16 23:57:39', '2017-07-16 23:57:39'),
(26, 'Make/Create Sales', 'sales-create', '2017-07-16 23:59:43', '2017-07-16 23:59:43'),
(30, 'Purchase view', 'purchase-list', '2017-07-17 00:24:38', '2017-07-17 00:24:38'),
(31, 'Make new Purchase', 'purchase-create', '2017-07-17 00:25:03', '2017-07-17 00:25:03'),
(32, 'purchase Update/Confirm Dueamount', 'purchase-update', '2017-07-17 00:25:41', '2017-07-17 00:25:41'),
(33, 'Expenses View', 'expenses-list', '2017-07-17 00:30:32', '2017-07-17 00:30:32'),
(34, 'Expenses Create', 'expenses-create', '2017-07-17 00:31:24', '2017-07-17 00:31:24'),
(35, 'Expenses Edit', 'expenses-edit', '2017-07-17 00:31:43', '2017-07-17 00:31:43'),
(36, 'Expenses Delete', 'expenses-delete', '2017-07-17 00:32:04', '2017-07-17 00:32:04'),
(37, 'Expenses Heading Create', 'expenses-heading', '2017-07-17 00:33:34', '2017-07-17 00:33:34'),
(45, 'User Password Change', 'password-change', '2017-07-17 00:54:08', '2017-07-17 00:54:08'),
(46, 'Transcation/Bank view', 'transaction-list', '2017-07-17 22:30:39', '2017-07-17 22:30:39'),
(47, 'Transaction remaining Deposite update', 'transaction-update', '2017-07-17 22:31:56', '2017-07-17 22:31:56'),
(48, 'Transaction Entry', 'transaction-create', '2017-07-17 22:32:23', '2017-07-17 22:32:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `productcategories`
--

CREATE TABLE `productcategories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_by` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modified_by` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `productcategories`
--

INSERT INTO `productcategories` (`id`, `name`, `slug`, `status`, `created_by`, `modified_by`, `created_at`, `updated_at`) VALUES
(3, 'Food Items', 'food-items', 1, 'admin', NULL, '2017-10-28 12:15:46', '2017-10-28 12:15:46'),
(4, 'Beverages', 'beverages', 1, 'user', NULL, '2017-10-28 15:06:02', '2017-10-28 15:06:02'),
(5, 'Personal Care', 'personal-care', 1, 'admin', 'admin', '2017-10-28 15:25:40', '2017-10-28 15:32:48'),
(6, 'Bread and Bakery', 'bread-and-bakery', 1, 'admin', NULL, '2017-10-28 15:25:54', '2017-10-28 15:25:54'),
(7, 'Baby Product', 'baby-product', 1, 'admin', NULL, '2017-10-28 15:26:52', '2017-10-28 15:26:52'),
(8, 'cvsdfsdf', 'cvsdfsdf', 1, 'admin', NULL, '2017-12-21 15:38:54', '2017-12-21 15:38:54'),
(9, 'cair', 'cair', 1, 'superadmin', 'superadmin', '2021-09-18 05:15:30', '2021-09-18 05:17:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `productcategory_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` double NOT NULL,
  `stock` int(11) DEFAULT NULL,
  `price` double NOT NULL,
  `status` double NOT NULL,
  `created_by` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modified_by` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id`, `productcategory_id`, `name`, `code`, `quantity`, `stock`, `price`, `status`, `created_by`, `modified_by`, `created_at`, `updated_at`) VALUES
(1, 3, 'Rice 50 kg', 'R50', 480000, 49, 530000, 500000, 'admin', 'superadmin', '2017-10-28 15:27:48', '2021-09-30 01:28:25'),
(2, 3, 'Rice 10 kg', 'R10', 100000, 5, 150000, 120000, 'admin', NULL, '2017-10-28 15:28:24', '2021-09-30 06:09:17'),
(4, 4, 'Hard Soda 1 Litter', 'HS1', 10000, 34, 16000, 13000, 'admin', NULL, '2017-10-28 15:31:10', '2021-09-30 06:17:32'),
(6, 5, 'Toothpaste', 'TP', 30000, 12, 40000, 35000, 'admin', NULL, '2017-10-28 15:34:41', '2021-09-30 05:57:27'),
(7, 5, 'Coconut Oil', 'CO', 70000, 80, 80000, 75000, 'admin', NULL, '2017-10-28 15:36:13', '2021-09-12 11:49:21'),
(8, 6, 'Black Forest Full', 'BFF', 180000, 39, 250000, 210000, 'admin', NULL, '2017-10-28 15:36:46', '2021-09-27 05:15:11'),
(9, 6, 'Black Forest Half', 'BFH', 170000, 40, 200000, 190000, 'admin', NULL, '2017-10-28 15:37:14', '2021-09-28 10:56:50'),
(10, 6, 'French Bread', 'FB', 60, 60, 60, 1, 'admin', NULL, '2017-10-28 15:37:54', '2017-10-28 15:37:54'),
(11, 7, 'Johndon Powder', 'JP', 100, 87, 600, 1, 'admin', NULL, '2017-10-28 15:39:19', '2021-09-30 06:17:34'),
(12, 5, 'Pampers', 'PMRS', 34000, 29, 71000, 50000, 'admin', NULL, '2017-10-28 15:40:13', '2021-09-30 05:37:13'),
(14, 5, 'Tisu Basah', 'TSB', 15000, 97, 20000, 17000, 'superadmin', 'superadmin', '2021-09-12 11:05:44', '2021-09-30 03:55:10'),
(15, 5, 'Tisu', 'TS', 11000, 59, 16000, 13000, 'superadmin', 'superadmin', '2021-09-12 11:09:57', '2021-09-30 03:28:40'),
(16, 9, 'susu', 'bls', 16000, 258, 20000, 18000, 'superadmin', NULL, '2021-09-18 05:18:11', '2021-09-28 12:25:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `purchases`
--

CREATE TABLE `purchases` (
  `id` int(10) UNSIGNED NOT NULL,
  `goods_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `party_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `totalamount` double NOT NULL,
  `paidamount` double NOT NULL,
  `dueamount` double NOT NULL,
  `status` enum('vat','pan','normal') COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchase_date` date NOT NULL,
  `created_by` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modified_by` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `purchases`
--

INSERT INTO `purchases` (`id`, `goods_name`, `party_name`, `totalamount`, `paidamount`, `dueamount`, `status`, `purchase_date`, `created_by`, `modified_by`, `created_at`, `updated_at`) VALUES
(1, 'Software', 'Cheetahwebtech', 500000, 500000, 0, 'vat', '2017-07-20', 'admin', NULL, '2017-07-20 09:03:02', '2017-07-20 09:03:02'),
(2, 'Other Purchase', 'Some Other', 50000, 50000, 0, 'pan', '2017-07-20', 'admin', NULL, '2017-07-20 09:03:41', '2017-10-28 14:46:18'),
(3, 'Furniture', 'Thapa furniture', 4000, 30000, -26000, 'pan', '2017-10-28', 'admin', NULL, '2017-10-28 14:50:57', '2017-10-28 14:50:57'),
(4, 'Baby Product 1 Bundel', 'Gupta wholeSell', 5000, 5000, 0, 'pan', '2017-10-28', 'admin', NULL, '2017-10-28 15:46:07', '2017-10-28 15:46:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', '2017-07-19 18:15:00', '2017-07-20 18:15:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_modules`
--

CREATE TABLE `role_modules` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `module_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `role_modules`
--

INSERT INTO `role_modules` (`id`, `role_id`, `module_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2017-06-06 12:30:00', NULL),
(3, 1, 8, '2017-06-05 22:44:05', '2017-06-05 22:44:05'),
(5, 1, 4, '2017-06-06 19:55:09', '2017-06-06 19:55:09'),
(7, 1, 6, '2017-06-07 18:09:49', '2017-06-07 18:09:49'),
(9, 1, 7, '2017-06-07 18:11:25', '2017-06-07 18:11:25'),
(10, 1, 16, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_permissions`
--

CREATE TABLE `role_permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `role_permissions`
--

INSERT INTO `role_permissions` (`id`, `role_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(817, 1, 1, '2017-07-17 22:32:41', '2017-07-17 22:32:41'),
(818, 1, 2, '2017-07-17 22:32:41', '2017-07-17 22:32:41'),
(819, 1, 3, '2017-07-17 22:32:41', '2017-07-17 22:32:41'),
(820, 1, 4, '2017-07-17 22:32:41', '2017-07-17 22:32:41'),
(821, 1, 5, '2017-07-17 22:32:41', '2017-07-17 22:32:41'),
(822, 1, 6, '2017-07-17 22:32:41', '2017-07-17 22:32:41'),
(823, 1, 7, '2017-07-17 22:32:41', '2017-07-17 22:32:41'),
(824, 1, 8, '2017-07-17 22:32:41', '2017-07-17 22:32:41'),
(825, 1, 9, '2017-07-17 22:32:41', '2017-07-17 22:32:41'),
(826, 1, 10, '2017-07-17 22:32:41', '2017-07-17 22:32:41'),
(827, 1, 11, '2017-07-17 22:32:41', '2017-07-17 22:32:41'),
(828, 1, 12, '2017-07-17 22:32:41', '2017-07-17 22:32:41'),
(829, 1, 13, '2017-07-17 22:32:42', '2017-07-17 22:32:42'),
(830, 1, 14, '2017-07-17 22:32:42', '2017-07-17 22:32:42'),
(831, 1, 15, '2017-07-17 22:32:42', '2017-07-17 22:32:42'),
(832, 1, 16, '2017-07-17 22:32:42', '2017-07-17 22:32:42'),
(833, 1, 17, '2017-07-17 22:32:42', '2017-07-17 22:32:42'),
(834, 1, 18, '2017-07-17 22:32:42', '2017-07-17 22:32:42'),
(835, 1, 19, '2017-07-17 22:32:42', '2017-07-17 22:32:42'),
(836, 1, 20, '2017-07-17 22:32:42', '2017-07-17 22:32:42'),
(841, 1, 25, '2017-07-17 22:32:42', '2017-07-17 22:32:42'),
(842, 1, 26, '2017-07-17 22:32:42', '2017-07-17 22:32:42'),
(846, 1, 30, '2017-07-17 22:32:42', '2017-07-17 22:32:42'),
(847, 1, 31, '2017-07-17 22:32:42', '2017-07-17 22:32:42'),
(848, 1, 32, '2017-07-17 22:32:42', '2017-07-17 22:32:42'),
(849, 1, 33, '2017-07-17 22:32:42', '2017-07-17 22:32:42'),
(850, 1, 34, '2017-07-17 22:32:42', '2017-07-17 22:32:42'),
(851, 1, 35, '2017-07-17 22:32:42', '2017-07-17 22:32:42'),
(852, 1, 36, '2017-07-17 22:32:42', '2017-07-17 22:32:42'),
(853, 1, 37, '2017-07-17 22:32:42', '2017-07-17 22:32:42'),
(861, 1, 45, '2017-07-17 22:32:42', '2017-07-17 22:32:42'),
(862, 1, 46, '2017-07-17 22:32:42', '2017-07-17 22:32:42'),
(863, 1, 47, '2017-07-17 22:32:42', '2017-07-17 22:32:42'),
(864, 1, 48, '2017-07-17 22:32:42', '2017-07-17 22:32:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sales`
--

CREATE TABLE `sales` (
  `id` int(10) UNSIGNED NOT NULL,
  `history_id` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double NOT NULL,
  `saller_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sales_status` tinyint(1) NOT NULL DEFAULT '0',
  `sales_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sales`
--

INSERT INTO `sales` (`id`, `history_id`, `product_id`, `quantity`, `price`, `saller_name`, `sales_status`, `sales_date`, `created_at`, `updated_at`) VALUES
(85, '1632831290', 2, 1, 150000, 'superadmin', 0, '2021-09-28', '2021-09-28 10:59:50', '2021-09-30 06:15:28'),
(86, '1632831789', 4, 1, 16000, 'superadmin', 0, '2021-09-28', '2021-09-28 11:08:09', '2021-09-30 06:15:28'),
(87, '1632831789', 12, 1, 71000, 'superadmin', 0, '2021-09-28', '2021-09-28 11:08:09', '2021-09-30 06:15:28'),
(88, '1632831789', 14, 1, 20000, 'superadmin', 0, '2021-09-28', '2021-09-28 11:08:09', '2021-09-30 06:15:28'),
(89, '1632831844', 4, 1, 16000, 'superadmin', 0, '2021-09-28', '2021-09-28 11:09:04', '2021-09-30 06:15:28'),
(90, '1632831844', 4, 1, 16000, 'superadmin', 0, '2021-09-28', '2021-09-28 11:09:04', '2021-09-30 06:15:28'),
(91, '1632831892', 1, 1, 530000, 'superadmin', 0, '2021-09-28', '2021-09-28 11:09:52', '2021-09-30 06:15:28'),
(92, '1632831892', 12, 1, 71000, 'superadmin', 0, '2021-09-28', '2021-09-28 11:09:52', '2021-09-30 06:15:28'),
(93, '1632833268', 4, 1, 16000, 'superadmin', 0, '2021-09-28', '2021-09-28 11:32:48', '2021-09-30 06:15:28'),
(94, '1632833398', 4, 1, 16000, 'superadmin', 0, '2021-09-28', '2021-09-28 11:34:58', '2021-09-30 06:15:28'),
(95, '1632836435', 16, 1, 20000, 'superadmin', 0, '2021-09-28', '2021-09-28 12:25:35', '2021-09-30 06:15:28'),
(96, '1632895950', 4, 1, 16000, 'superadmin', 1, '2021-09-29', '2021-09-29 04:57:30', '2021-09-30 06:18:18'),
(97, '1632895950', 6, 1, 40000, 'superadmin', 1, '2021-09-29', '2021-09-29 04:57:30', '2021-09-30 06:18:18'),
(98, '1632963651', 2, 1, 150000, 'superadmin', 0, '2021-09-30', '2021-09-29 23:45:51', '2021-09-30 06:18:23'),
(99, '1632963651', 4, 1, 16000, 'superadmin', 0, '2021-09-30', '2021-09-29 23:45:51', '2021-09-30 06:18:23'),
(100, '1632963747', 6, 1, 40000, 'superadmin', 0, '2021-09-30', '2021-09-29 23:47:27', '2021-09-30 06:18:23'),
(101, '1632976987', 2, 1, 150000, 'superadmin', 0, '2021-09-30', '2021-09-30 03:28:07', '2021-09-30 06:18:24'),
(102, '1632977023', 15, 20, 320000, 'superadmin', 0, '2021-09-30', '2021-09-30 03:28:43', '2021-09-30 06:18:24'),
(103, '1632977171', 4, 1, 16000, 'superadmin', 0, '2021-09-30', '2021-09-30 03:31:11', '2021-09-30 06:18:24'),
(104, '2021', 12, 1, 71000, 'superadmin', 0, '2021-09-30', '2021-09-30 03:54:02', '2021-09-30 06:18:24'),
(105, '2021', 6, 1, 40000, 'superadmin', 0, '2021-09-30', '2021-09-30 03:54:43', '2021-09-30 06:18:24'),
(106, '0', 14, 1, 20000, 'superadmin', 0, '2021-09-30', '2021-09-30 03:55:13', '2021-09-30 06:18:24'),
(107, '2147483647', 4, 1, 16000, 'superadmin', 0, '2021-09-30', '2021-09-30 05:29:18', '2021-09-30 06:18:24'),
(108, '2147483647', 4, 1, 16000, 'superadmin', 0, '2021-09-30', '2021-09-30 05:30:52', '2021-09-30 06:18:24'),
(109, '2147483647', 6, 1, 40000, 'superadmin', 0, '2021-09-30', '2021-09-30 05:31:52', '2021-09-30 06:18:24'),
(110, '0', 6, 1, 40000, 'superadmin', 0, '2021-09-30', '2021-09-30 05:32:22', '2021-09-30 06:18:24'),
(111, '0', 6, 1, 40000, 'superadmin', 0, '2021-09-30', '2021-09-30 05:33:57', '2021-09-30 06:18:24'),
(112, '2147483647', 12, 1, 71000, 'superadmin', 0, '2021-09-30', '2021-09-30 05:38:44', '2021-09-30 06:18:24'),
(113, '2147483647', 6, 1, 40000, 'superadmin', 0, '2021-09-30', '2021-09-30 05:57:30', '2021-09-30 06:18:24'),
(114, '125830092021', 2, 1, 150000, 'superadmin', 0, '2021-09-30', '2021-09-30 05:58:25', '2021-09-30 06:18:24'),
(115, '130930092021', 2, 1, 150000, 'superadmin', 0, '2021-09-30', '2021-09-30 06:09:21', '2021-09-30 06:18:24'),
(116, '131730092021', 4, 1, 16000, 'superadmin', 0, '2021-09-30', '2021-09-30 06:17:46', '2021-09-30 06:18:24'),
(117, '131730092021', 4, 1, 16000, 'superadmin', 0, '2021-09-30', '2021-09-30 06:17:46', '2021-09-30 06:18:24'),
(118, '131730092021', 11, 1, 600, 'superadmin', 0, '2021-09-30', '2021-09-30 06:17:46', '2021-09-30 06:18:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `salescarts`
--

CREATE TABLE `salescarts` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double NOT NULL,
  `saller_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sales_status` tinyint(1) NOT NULL DEFAULT '1',
  `sales_date` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transactions`
--

CREATE TABLE `transactions` (
  `id` int(10) UNSIGNED NOT NULL,
  `totalamount` double NOT NULL,
  `depositeamount` double NOT NULL,
  `remainingamount` double NOT NULL,
  `deposite_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deposite_date` date NOT NULL,
  `bank_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modified_by` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `last_login`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Grocery System', 'admin', 'nagarikbazar@gmail.com', '$2y$10$lIKCIfwU/4/PMkUDOQYXdOv5TNZBfFGl5XnD/N.PIOF8Tu/ChAAc2', '2021-09-12 12:19:36', 1, 'cLRvTHgkG8nXG9Z0QQvBWCcIbG06mVnQMBDFmXoBcE0Ax6TwSHlPf8MOI6Jm', '2017-06-05 21:35:29', '2021-09-12 05:19:36'),
(2, 'User Admin', 'user', 'nagarikbazar1@testtest.com', '$2y$10$RJobR0XNPlyFr0XL5ENkg./R.lw2yRmxQoU6EW9nntGASaZ89xzQe', '2017-10-29 09:27:32', 1, 't4d8hhkDCOcbq3ASUlkwEHtPb69jZoq16Kl53SpfR9CkHxQd8HW8NwcyghQu', '2017-06-06 19:47:19', '2017-10-29 03:42:32'),
(3, 'superadmin', 'superadmin', 'superadmin@gmail.com', '$2y$10$igBKyqapZyIX81Qsd.lt5Oko5HuSNxAXB865oObBTJb2ZovjuKpne', '2021-09-30 06:44:12', 1, 'TLoS3JxCUgADkRRFnHoTztunCvpMu2cDS9kaS0BJZ5q13zUjvhyNEuh4GyKz', '2021-09-12 05:28:11', '2021-09-29 23:44:12'),
(4, 'Herry', 'herry', 'herry@gmail.com', '$2y$10$fEd5nOfGZLjvi4MG514Lt.PrllcB3UEsjlBZt1PsL27NPWz4.L.6i', NULL, 1, NULL, '2021-09-17 02:09:05', '2021-09-17 02:09:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_roles`
--

CREATE TABLE `user_roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `user_roles`
--

INSERT INTO `user_roles` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2017-06-05 21:35:29', '2017-06-05 21:35:29'),
(3, 1, 3, '2021-09-12 05:28:11', '2021-09-12 05:28:11'),
(4, 1, 4, '2021-09-17 02:09:05', '2021-09-17 02:09:05');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `expenses_created_by_foreign` (`created_by`),
  ADD KEY `expenses_modified_by_foreign` (`modified_by`);

--
-- Indeks untuk tabel `expensestitles`
--
ALTER TABLE `expensestitles`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `modules_name_unique` (`name`),
  ADD UNIQUE KEY `modules_module_key_unique` (`module_key`),
  ADD UNIQUE KEY `modules_module_url_unique` (`module_url`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`(191));

--
-- Indeks untuk tabel `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`),
  ADD UNIQUE KEY `permissions_permission_key_unique` (`permission_key`);

--
-- Indeks untuk tabel `productcategories`
--
ALTER TABLE `productcategories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `productcategories_slug_unique` (`slug`),
  ADD KEY `productcategories_created_by_foreign` (`created_by`),
  ADD KEY `productcategories_modified_by_foreign` (`modified_by`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_code_unique` (`code`),
  ADD KEY `products_productcategory_id_foreign` (`productcategory_id`),
  ADD KEY `products_created_by_foreign` (`created_by`),
  ADD KEY `products_modified_by_foreign` (`modified_by`);

--
-- Indeks untuk tabel `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchases_created_by_foreign` (`created_by`),
  ADD KEY `purchases_modified_by_foreign` (`modified_by`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `role_modules`
--
ALTER TABLE `role_modules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_modules_role_id_foreign` (`role_id`),
  ADD KEY `role_modules_module_id_foreign` (`module_id`);

--
-- Indeks untuk tabel `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_permissions_role_id_foreign` (`role_id`),
  ADD KEY `role_permissions_permission_id_foreign` (`permission_id`);

--
-- Indeks untuk tabel `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sales_product_id_foreign` (`product_id`);

--
-- Indeks untuk tabel `salescarts`
--
ALTER TABLE `salescarts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `salescarts_product_id_foreign` (`product_id`);

--
-- Indeks untuk tabel `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_created_by_foreign` (`created_by`),
  ADD KEY `transactions_modified_by_foreign` (`modified_by`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeks untuk tabel `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_roles_role_id_foreign` (`role_id`),
  ADD KEY `user_roles_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `expensestitles`
--
ALTER TABLE `expensestitles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `modules`
--
ALTER TABLE `modules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT untuk tabel `productcategories`
--
ALTER TABLE `productcategories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `role_modules`
--
ALTER TABLE `role_modules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `role_permissions`
--
ALTER TABLE `role_permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=865;

--
-- AUTO_INCREMENT untuk tabel `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT untuk tabel `salescarts`
--
ALTER TABLE `salescarts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `expenses`
--
ALTER TABLE `expenses`
  ADD CONSTRAINT `expenses_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`username`) ON UPDATE CASCADE,
  ADD CONSTRAINT `expenses_modified_by_foreign` FOREIGN KEY (`modified_by`) REFERENCES `users` (`username`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `productcategories`
--
ALTER TABLE `productcategories`
  ADD CONSTRAINT `productcategories_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`username`) ON UPDATE CASCADE,
  ADD CONSTRAINT `productcategories_modified_by_foreign` FOREIGN KEY (`modified_by`) REFERENCES `users` (`username`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`username`) ON UPDATE CASCADE,
  ADD CONSTRAINT `products_modified_by_foreign` FOREIGN KEY (`modified_by`) REFERENCES `users` (`username`) ON UPDATE CASCADE,
  ADD CONSTRAINT `products_productcategory_id_foreign` FOREIGN KEY (`productcategory_id`) REFERENCES `productcategories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `purchases`
--
ALTER TABLE `purchases`
  ADD CONSTRAINT `purchases_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`username`) ON UPDATE CASCADE,
  ADD CONSTRAINT `purchases_modified_by_foreign` FOREIGN KEY (`modified_by`) REFERENCES `users` (`username`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `role_modules`
--
ALTER TABLE `role_modules`
  ADD CONSTRAINT `role_modules_module_id_foreign` FOREIGN KEY (`module_id`) REFERENCES `modules` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_modules_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD CONSTRAINT `role_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `salescarts`
--
ALTER TABLE `salescarts`
  ADD CONSTRAINT `salescarts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`username`) ON UPDATE CASCADE,
  ADD CONSTRAINT `transactions_modified_by_foreign` FOREIGN KEY (`modified_by`) REFERENCES `users` (`username`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user_roles`
--
ALTER TABLE `user_roles`
  ADD CONSTRAINT `user_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
