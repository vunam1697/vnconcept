-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 14, 2022 lúc 06:21 AM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `laravel_db1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
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

--
-- Đang đổ dữ liệu cho bảng `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 1, 'MyApp', 'cc0954f2bef2cd64bbcf97c7629afc14865091bd384142abb2bd93f5e71e82af', '[\"*\"]', NULL, '2022-03-14 21:19:37', '2022-03-14 21:19:37'),
(2, 'App\\Models\\User', 1, 'MyApp', '801015b4dcdb295b6d2a07312ebc7b4ce7b23e69c1d8dcbcee8cc1638e05fe74', '[\"*\"]', NULL, '2022-03-14 21:22:12', '2022-03-14 21:22:12'),
(3, 'App\\Models\\User', 2, 'MyApp', 'ac1b08600a72f676f1ecd66cb9473c3a35d04812561a0828d347b7a521fc4b67', '[\"*\"]', NULL, '2022-03-15 00:48:55', '2022-03-15 00:48:55'),
(4, 'App\\Models\\User', 2, 'MyApp', 'c9f7c3c62ee5eb0d4d9b0c622b971c7c786afd141adb6fc143849bd6ca0e9741', '[\"*\"]', NULL, '2022-03-15 00:49:56', '2022-03-15 00:49:56'),
(5, 'App\\Models\\User', 2, 'MyApp', '0edd0030204207e1634639300680854a70793ff3c5822f0c60b54042d9d7d2c6', '[\"*\"]', NULL, '2022-03-15 02:06:56', '2022-03-15 02:06:56'),
(6, 'App\\Models\\User', 2, 'MyApp', '81de74644246cb47ab06022c1eba6d38f0ee3f67dae360bcd271b0dd6f006425', '[\"*\"]', NULL, '2022-03-15 02:08:46', '2022-03-15 02:08:46'),
(7, 'App\\Models\\User', 2, 'MyApp', 'a8998f357eab561aa13538f8f26732f4b60bd7dd78cd8d1cf6ead4680b168480', '[\"*\"]', NULL, '2022-03-16 18:46:05', '2022-03-16 18:46:05'),
(8, 'App\\Models\\User', 2, 'MyApp', 'a31464e476b2470d46a92df503879b17ffeeba29ec0750e82fa3f3c8ba22d50b', '[\"*\"]', NULL, '2022-03-16 18:46:17', '2022-03-16 18:46:17'),
(9, 'App\\Models\\User', 2, 'MyApp', 'ef1ed3936a34d8392ca145bc19330792719a1de2f32df99a5513bf587565961b', '[\"*\"]', NULL, '2022-03-16 18:47:23', '2022-03-16 18:47:23'),
(10, 'App\\Models\\User', 2, 'MyApp', 'c7b96a68b637662ffba730403b532a2e47a75119b4146cb25c83bd56beef1755', '[\"*\"]', NULL, '2022-03-16 18:47:48', '2022-03-16 18:47:48'),
(11, 'App\\Models\\User', 2, 'MyApp', '58f04ed45b6b5ffea4c304d9906670b3706f20d92f76323db0fac7fc9409b919', '[\"*\"]', NULL, '2022-03-16 18:48:21', '2022-03-16 18:48:21'),
(12, 'App\\Models\\User', 2, 'MyApp', '2fa199b9f8886ab176f59cf5fed12d24a6bc69609b02563e480340953c38fba5', '[\"*\"]', NULL, '2022-03-16 18:48:34', '2022-03-16 18:48:34'),
(13, 'App\\Models\\User', 2, 'MyApp', '20bcf0e894430dfc044af592020e32c6b27aecb3acd71528fd6576a6c335239a', '[\"*\"]', NULL, '2022-03-16 18:48:53', '2022-03-16 18:48:53'),
(14, 'App\\Models\\User', 2, 'MyApp', 'e8c18b6914e8de5083115ca44fa47843f395c59fa2f9e6c2683aa990e3e96d27', '[\"*\"]', NULL, '2022-03-17 03:18:40', '2022-03-17 03:18:40'),
(15, 'App\\Models\\User', 2, 'MyApp', 'e3a45ba0d78fd7ddcee54c5eb1a8b8ff7aaa16e086f5fdb425b09e0b295dc36e', '[\"*\"]', NULL, '2022-03-17 03:19:14', '2022-03-17 03:19:14'),
(16, 'App\\Models\\User', 2, 'MyApp', 'c4c92f12671f83e40de7cd86dcedd629324e58da362f78e1152dfead54972371', '[\"*\"]', NULL, '2022-03-17 03:19:19', '2022-03-17 03:19:19'),
(17, 'App\\Models\\User', 2, 'MyApp', '094eb33a85299a8be6f7d20f1d1b188ecbd5798c3f0897a1fd5771dacce2706a', '[\"*\"]', NULL, '2022-03-17 03:19:45', '2022-03-17 03:19:45'),
(18, 'App\\Models\\User', 2, 'MyApp', '62845e57fe3d88ad074a9902a670dad80359d3fc4f5d885765f81a96852dd337', '[\"*\"]', NULL, '2022-03-17 03:20:57', '2022-03-17 03:20:57'),
(19, 'App\\Models\\User', 2, 'MyApp', '9da0b0357ff0f379ff425493ea557ed0720898150eecfd6413fb41b254b1a65a', '[\"*\"]', NULL, '2022-03-17 18:13:21', '2022-03-17 18:13:21'),
(20, 'App\\Models\\User', 2, 'MyApp', '4a3a28dc01da3d624127e4ffdae9bf03fa6c15ed7919ead77269aad31af1dfc8', '[\"*\"]', NULL, '2022-03-18 00:23:18', '2022-03-18 00:23:18'),
(21, 'App\\Models\\User', 2, 'MyApp', 'a95298e47c4662b96ff7dcdbb9c18e519b35e67260c3221ec3d45f326793e9e0', '[\"*\"]', NULL, '2022-03-20 18:43:58', '2022-03-20 18:43:58'),
(22, 'App\\Models\\User', 2, 'MyApp', '2c159dea3ebc95463746f9b208e64f909f21a90c561e5672abb5046d11ea6c69', '[\"*\"]', NULL, '2022-03-20 18:53:03', '2022-03-20 18:53:03'),
(23, 'App\\Models\\User', 2, 'MyApp', '693b71791479e1d7cc2bbc6c71013e7449d6085c451c246e69948b7191f6480f', '[\"*\"]', NULL, '2022-03-20 18:53:30', '2022-03-20 18:53:30'),
(24, 'App\\Models\\User', 2, 'MyApp', '3388cd68b5539624c1cf885e8d943cf12fb3e38e2eeb89d0a59b42af506ec3fc', '[\"*\"]', NULL, '2022-03-20 18:54:13', '2022-03-20 18:54:13');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
