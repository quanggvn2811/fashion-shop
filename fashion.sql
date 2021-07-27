-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th7 27, 2021 lúc 02:03 PM
-- Phiên bản máy phục vụ: 5.7.35-0ubuntu0.18.04.1
-- Phiên bản PHP: 7.2.34-23+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `fashion`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_02_08_060127_create_fs_users_table', 1),
(5, '2021_02_08_105730_create_fs_productlines_table', 1),
(6, '2021_02_13_022054_create_fs_brands_table', 1),
(7, '2021_02_14_143329_create_fs_products_table', 1),
(8, '2021_05_09_111234_create_customers_table', 1),
(9, '2021_02_09_150638_edit_productlines_table', 2),
(10, '2021_02_20_152136_edit_fs_products_table', 2),
(11, '2021_02_23_075456_edit2_fs_products_table', 2),
(12, '2021_05_22_181719_edit_create_customers_table', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_fs_brands`
--

CREATE TABLE `tbl_fs_brands` (
  `brand_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_fs_brands`
--

INSERT INTO `tbl_fs_brands` (`brand_id`, `name`, `description`, `display`, `created_at`, `updated_at`) VALUES
(1, 'H&amp;M', 'HM', 1, '2021-07-26 07:12:33', '2021-07-26 07:12:33'),
(2, 'Zara', 'Vintage clothing is all about the old classy looks and exquisiteness. These are fabrics and fashion that came into existence in a bygone era but bygones are not really so bygones.', 1, '2021-07-26 07:13:07', '2021-07-26 07:13:07'),
(3, 'Levi\'s', 'Vintage clothing is all about the old classy looks and exquisiteness. These are fabrics and fashion that came into existence in a bygone era but bygones are not really so bygones.', 1, '2021-07-26 07:15:39', '2021-07-26 07:15:39'),
(4, 'Kway', 'Vintage clothing is all about the old classy looks and exquisiteness. These are fabrics and fashion that came into existence in a bygone era but bygones are not really so bygones.', 1, '2021-07-26 07:16:04', '2021-07-26 07:16:04'),
(5, 'Local branch', 'Local branch VN', 1, '2021-07-26 07:16:43', '2021-07-26 07:16:43'),
(6, 'Brand name', 'Brand description', 1, '2021-07-26 18:40:35', '2021-07-26 18:40:35');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_fs_customers`
--

CREATE TABLE `tbl_fs_customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_fs_customers`
--

INSERT INTO `tbl_fs_customers` (`id`, `username`, `email`, `password`, `avatar`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'QuangGVN', 'giapvanngocquang@gmail.com', 'e6e061838856bf47e1de730719fb2609', NULL, NULL, '2021-07-26 06:47:39', '2021-07-26 06:47:39'),
(2, 'QuangGVN1', 'fashion@gmail.com', '4f4b914d6db35e19101ff003c4e7ea3a', NULL, NULL, '2021-07-26 07:45:08', '2021-07-26 07:45:08'),
(3, 'ngocquang97bg@gmail.com', 'ngocquang97bg@gmail.com', 'e6e061838856bf47e1de730719fb2609', NULL, NULL, '2021-07-26 12:55:00', '2021-07-26 12:55:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_fs_productlines`
--

CREATE TABLE `tbl_fs_productlines` (
  `prodline_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent` int(11) NOT NULL,
  `display` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_fs_productlines`
--

INSERT INTO `tbl_fs_productlines` (`prodline_id`, `name`, `description`, `parent`, `display`, `created_at`, `updated_at`) VALUES
(1, 'T-Shirt', 'T-Shirt description...', 0, 1, '2021-07-26 07:07:03', '2021-07-26 08:29:32'),
(2, 'Jean', 'Jean description', 0, 1, '2021-07-26 07:08:01', '2021-07-26 08:29:31'),
(3, 'Coats', 'Vintage clothing is all about the old classy looks and exquisiteness. These are fabrics and fashion that came into existence in a bygone era but bygones are not really so bygones.', 0, 1, '2021-07-26 07:12:01', '2021-07-26 08:29:30'),
(4, 'Polo', 'Vintage clothing is all about the old classy looks and exquisiteness. These are fabrics and fashion that came into existence in a bygone era but bygones are not really so bygones.', 0, 1, '2021-07-26 07:13:41', '2021-07-26 08:29:29'),
(5, 'Jacket', 'Vintage clothing is all about the old classy looks and exquisiteness. These are fabrics and fashion that came into existence in a bygone era but bygones are not really so bygones.', 0, 1, '2021-07-26 07:13:52', '2021-07-26 08:29:29'),
(6, 'Jean - a', 'Vintage clothing is all about the old classy looks and exquisiteness. These are fabrics and fashion that came into existence in a bygone era but bygones are not really so bygones.', 2, 1, '2021-07-26 07:14:11', '2021-07-26 08:29:29'),
(7, 'Socks', 'Vintage clothing is all about the old classy looks and exquisiteness. These are fabrics and fashion that came into existence in a bygone era but bygones are not really so bygones.', 2, 1, '2021-07-26 07:14:52', '2021-07-26 08:29:28'),
(8, 'Shorts', 'Vintage clothing is all about the old classy looks and exquisiteness. These are fabrics and fashion that came into existence in a bygone era but bygones are not really so bygones.', 0, 1, '2021-07-26 07:15:02', '2021-07-26 08:29:28'),
(9, 'Category name here', 'Category description....', 2, 1, '2021-07-26 18:32:55', '2021-07-26 18:32:55');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_fs_products`
--

CREATE TABLE `tbl_fs_products` (
  `prod_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tags` text COLLATE utf8mb4_unicode_ci,
  `content` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` bigint(20) NOT NULL,
  `images` text COLLATE utf8mb4_unicode_ci,
  `views` int(11) DEFAULT NULL,
  `display` tinyint(4) NOT NULL,
  `quantity` int(11) NOT NULL,
  `brand_id` int(10) UNSIGNED NOT NULL,
  `prodline_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `feature` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_fs_products`
--

INSERT INTO `tbl_fs_products` (`prod_id`, `name`, `tags`, `content`, `description`, `slug`, `price`, `images`, `views`, `display`, `quantity`, `brand_id`, `prodline_id`, `created_at`, `updated_at`, `feature`) VALUES
(1, 'Product 1', NULL, 'Product 1 content', 'Product 1 description', 'product-1', 123123123, '[\"product12.jpg\"]', NULL, 1, 1000, 2, 1, '2021-07-26 07:19:00', '2021-07-26 08:29:32', 1),
(2, 'Product 2', NULL, 'Product 2 content', 'Product 2 description', 'product-2', 11213213, '[\"product11.jpg\"]', NULL, 1, 1000, 3, 1, '2021-07-26 07:21:58', '2021-07-26 08:29:32', 1),
(3, 'Product 3', NULL, 'Product 3 content', 'Product 3 description', 'product-3', 321123, '[\"product7.jpg\"]', NULL, 1, 1000, 4, 7, '2021-07-26 07:24:50', '2021-07-26 08:29:28', 1),
(4, 'Levi\'s Logo Sweatshirt - Gray', NULL, 'Product available with different options', 'Product available with different options', 'levis-logo-sweatshirt-gray', 123456, '[\"levi-s-17895-0079graphic.jpg\"]', NULL, 1, 500, 2, 4, '2021-07-26 07:27:25', '2021-07-26 08:29:29', 1),
(5, 'Product 4', NULL, 'Product 4 content', 'Product 4 description', 'product-4', 21321321, '[\"product8.jpg\"]', NULL, 1, 2123, 5, 1, '2021-07-26 07:30:40', '2021-07-26 08:29:32', 1),
(6, 'T-Shirt 1', NULL, 'Product available with different options', 'Product available with different options', 't-shirt-1', 1321321, '[\"product12.jpg\"]', NULL, 1, 100, 1, 1, '2021-07-26 07:32:22', '2021-07-26 08:29:32', 1),
(7, 'T-Shirt 2', NULL, 'Product available with different options', 'Product available with different options', 't-shirt-2', 13132132, '[\"product12.jpg\"]', NULL, 1, 100, 1, 1, '2021-07-26 07:32:59', '2021-07-26 08:29:32', 1),
(8, 'T-Shirt 3', NULL, 'Product available with different options', 'Product available with different options', 't-shirt-3', 12132154, '[\"product12.jpg\"]', NULL, 1, 132132, 2, 1, '2021-07-26 07:33:25', '2021-07-26 08:29:32', 1),
(9, 'T-Shirt 4', NULL, 'Product available with different options', 'Product available with different options', 't-shirt-4', 31321, '[\"levi-s-17895-0079graphic.jpg\"]', NULL, 1, 1321, 3, 1, '2021-07-26 07:34:20', '2021-07-26 08:36:02', 1),
(10, 'T-Shirt 5', NULL, 'Content here after update', 'Description', 't-shirt-5', 1321546, '[\"product9.jpg\"]', NULL, 1, 1231, 5, 1, '2021-07-26 07:41:25', '2021-07-26 08:29:32', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_fs_users`
--

CREATE TABLE `tbl_fs_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` tinyint(4) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_fs_users`
--

INSERT INTO `tbl_fs_users` (`id`, `email`, `password`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'admin@gmail.com', '$2y$12$Ng0dqNkIE/CsrIoCtWi4veeg4SmnKLExDoAFwuG47omcpt2JANAmi', 1, NULL, '2021-07-26 14:04:04', '2021-07-26 14:04:04');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
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
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `tbl_fs_brands`
--
ALTER TABLE `tbl_fs_brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Chỉ mục cho bảng `tbl_fs_customers`
--
ALTER TABLE `tbl_fs_customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tbl_fs_customers_username_unique` (`username`),
  ADD UNIQUE KEY `tbl_fs_customers_email_unique` (`email`);

--
-- Chỉ mục cho bảng `tbl_fs_productlines`
--
ALTER TABLE `tbl_fs_productlines`
  ADD PRIMARY KEY (`prodline_id`),
  ADD UNIQUE KEY `tbl_fs_productlines_name_unique` (`name`);

--
-- Chỉ mục cho bảng `tbl_fs_products`
--
ALTER TABLE `tbl_fs_products`
  ADD PRIMARY KEY (`prod_id`),
  ADD KEY `tbl_fs_products_brand_id_foreign` (`brand_id`),
  ADD KEY `tbl_fs_products_prodline_id_foreign` (`prodline_id`);

--
-- Chỉ mục cho bảng `tbl_fs_users`
--
ALTER TABLE `tbl_fs_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tbl_fs_users_email_unique` (`email`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT cho bảng `tbl_fs_brands`
--
ALTER TABLE `tbl_fs_brands`
  MODIFY `brand_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT cho bảng `tbl_fs_customers`
--
ALTER TABLE `tbl_fs_customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT cho bảng `tbl_fs_productlines`
--
ALTER TABLE `tbl_fs_productlines`
  MODIFY `prodline_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT cho bảng `tbl_fs_products`
--
ALTER TABLE `tbl_fs_products`
  MODIFY `prod_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT cho bảng `tbl_fs_users`
--
ALTER TABLE `tbl_fs_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tbl_fs_products`
--
ALTER TABLE `tbl_fs_products`
  ADD CONSTRAINT `tbl_fs_products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `tbl_fs_brands` (`brand_id`),
  ADD CONSTRAINT `tbl_fs_products_prodline_id_foreign` FOREIGN KEY (`prodline_id`) REFERENCES `tbl_fs_productlines` (`prodline_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
