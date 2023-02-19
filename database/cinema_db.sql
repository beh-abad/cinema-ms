-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2023 at 11:02 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cinema_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `name` varchar(50) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `password` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `city_s`
--

CREATE TABLE `city_s` (
  `city_name` varchar(50) DEFAULT NULL,
  `city_id` int(11) NOT NULL,
  `city_of_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `city_s`
--

INSERT INTO `city_s` (`city_name`, `city_id`, `city_of_id`) VALUES
('رشت', 44311, 1427),
('لاهیجان', 44312, 1427),
('تهران', 44313, 1429),
('ورامین', 44314, 1429);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `user_name` varchar(100) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `body` varchar(1000) DEFAULT NULL,
  `film_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`user_name`, `id`, `body`, `film_id`) VALUES
('بهرنگ', 152, 'من از فیلم شما خوشم نیومد دوست نداشتم', 1317);

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
-- Table structure for table `films`
--

CREATE TABLE `films` (
  `film_name` varchar(50) CHARACTER SET ucs2 COLLATE ucs2_persian_ci DEFAULT NULL,
  `running_time` time DEFAULT NULL,
  `director_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_persian_ci DEFAULT NULL,
  `ex_producer` varchar(50) DEFAULT NULL,
  `day` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `more_about` varchar(1000) CHARACTER SET utf8 COLLATE utf8_persian_ci DEFAULT NULL,
  `country` varchar(30) CHARACTER SET utf8 COLLATE utf8_persian_ci DEFAULT NULL,
  `language` varchar(50) CHARACTER SET utf8 COLLATE utf8_persian_ci DEFAULT NULL,
  `price_of_film` varchar(20) CHARACTER SET utf8 COLLATE utf8_persian_ci DEFAULT NULL,
  `film_iframe` varchar(300) DEFAULT NULL,
  `image_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_persian_ci DEFAULT NULL,
  `salon` varchar(50) DEFAULT NULL,
  `film_of_ids` varchar(255) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `films`
--

INSERT INTO `films` (`film_name`, `running_time`, `director_name`, `ex_producer`, `day`, `time`, `more_about`, `country`, `language`, `price_of_film`, `film_iframe`, `image_name`, `salon`, `film_of_ids`, `id`) VALUES
('گشت ارشاد 1', '01:51:00', 'سعید سهیلی', 'سعید سهیلی', '{\"218\":\"-------------\",\"220\":\"-------------\"}', '{\"218\":null,\"220\":null}', 'https://fa.wikipedia.org/wiki/%DA%AF%D8%B4%D8%AA_%D8%A7%D8%B1%D8%B4%D8%A7%D8%AF_(%D9%81%DB%8C%D9%84%D9%85)', 'ایران', 'فارسی', '300000', '\"https://www.aparat.com/video/video/embed/videohash/v5a4f/vt/frame\"', 'Gashte_Ershad.jpg', '{\"218\":null,\"220\":null}', '{\"218\":\"218\",\"220\":\"220\"}', 1305),
('گشت ارشاد 2', '01:45:00', 'سعید سهیلی', 'سعید سهیلی، حمید فرخ‌نژاد', '{\"218\":\"\\u0634\\u0646\\u0628\\u0647\",\"220\":\"\\u0633\\u0647 \\u0634\\u0646\\u0628\\u0647\"}', '{\"218\":\"7:25\",\"220\":\"7:45\"}', 'https://fa.wikipedia.org/wiki/%DA%AF%D8%B4%D8%AA_%D8%A7%D8%B1%D8%B4%D8%A7%D8%AF_%DB%B2', 'ایران', 'فارسی', '350000', '\"https://www.aparat.com/video/video/embed/videohash/Uc0Ij/vt/frame\"', 'Gasht2.jpg', '{\"218\":\"32\",\"220\":\"34\"}', '{\"218\":\"218\",\"220\":\"220\"}', 1309),
('جدی نادر از سیمین', '02:03:00', 'اصغر فرهادی', 'اصغر فرهادی', '{\"218\":\"\\u06cc\\u06a9\\u0634\\u0646\\u0628\\u0647\",\"220\":\"\\u062f\\u0648\\u0634\\u0646\\u0628\\u0647\"}', '{\"218\":\"7:45\",\"220\":\"7:45\"}', 'https://fa.wikipedia.org/wiki/%D8%AC%D8%AF%D8%A7%DB%8C%DB%8C_%D9%86%D8%A7%D8%AF%D8%B1_%D8%A7%D8%B2_%D8%B3%DB%8C%D9%85%DB%8C%D9%86', 'ایران', 'فارسی', '350000', '\"https://www.aparat.com/video/video/embed/videohash/f4hTz/vt/frame\"', 'Jodaei_poster.jpg', '{\"218\":\"32\",\"220\":\"34\"}', '{\"218\":\"218\",\"220\":\"220\"}', 1317),
('پسر دلفینی', '01:30:00', 'محمد خیر اندیش', 'محمد امین همدانی', '{\"218\":\"\\u0634\\u0646\\u0628\\u0647\",\"220\":\"\\u062f\\u0648\\u0634\\u0646\\u0628\\u0647\",\"222\":\"\\u0686\\u0647\\u0627\\u0631\\u0634\\u0646\\u0628\\u0647\"}', '{\"218\":\"7:45\",\"220\":\"7:45\",\"222\":\"7:45\"}', 'https://fa.wikipedia.org/wiki/%D9%BE%D8%B3%D8%B1_%D8%AF%D9%84%D9%81%DB%8C%D9%86%DB%8C', 'ایران', 'فارسی، روسی، انگلیسی', '350000', '\"https://www.aparat.com/video/video/embed/videohash/cUqvR/vt/frame\"', 'images.jpg', '{\"218\":\"12\",\"220\":\"14\",\"222\":\"15\"}', '{\"218\":\"218\",\"220\":\"220\",\"222\":\"222\"}', 1319),
('لانتوری', '01:45:00', 'رضا درمیشیان', 'رضا درمیشیان', '{\"218\":\"\\u06cc\\u06a9\\u0634\\u0646\\u0628\\u0647\",\"220\":\"\\u0633\\u0647 \\u0634\\u0646\\u0628\\u0647\",\"222\":\"\\u067e\\u0646\\u062c\\u0634\\u0646\\u0628\\u0647\"}', '{\"218\":\"9:30\",\"220\":\"9:30\",\"222\":\"9:30\"}', 'https://fa.wikipedia.org/wiki/%D9%84%D8%A7%D9%86%D8%AA%D9%88%D8%B1%DB%8C', 'ایران', 'فارسی', '400000', '\"https://www.aparat.com/video/video/embed/videohash/Ha4uF/vt/frame\"', 'Lantori_poster.jpg', '{\"218\":\"12\",\"220\":\"13\",\"222\":\"14\"}', '{\"218\":\"218\",\"220\":\"220\",\"222\":\"222\"}', 1325),
('نهنگ عنبر', '01:30:00', 'سعید سهیلی', 'سعید سهیلی', '{\"218\":\"\\u06cc\\u06a9\\u0634\\u0646\\u0628\\u0647\",\"222\":\"\\u067e\\u0646\\u062c\\u0634\\u0646\\u0628\\u0647\"}', '{\"218\":\"9:30\",\"222\":\"9:30\"}', 'https://fa.wikipedia.org/wiki/%D9%84%D8%A7%D9%86%D8%AA%D9%88%D8%B1%DB%8C', 'ایران', 'فارسی', '400000', '\"https://www.aparat.com/video/video/embed/videohash/Ha4uF/vt/frame\"', 'Lantori_poster.jpg', '{\"218\":\"12\",\"222\":\"14\"}', '{\"218\":\"218\",\"222\":\"222\"}', 1327);

-- --------------------------------------------------------

--
-- Table structure for table `film_to_places`
--

CREATE TABLE `film_to_places` (
  `film_id` int(11) NOT NULL,
  `places_id` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `film_to_places`
--

INSERT INTO `film_to_places` (`film_id`, `places_id`, `id`) VALUES
(1041, 1, 5),
(1042, 2, 6),
(1043, 4, 7);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `name` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `date_registered` varchar(12) DEFAULT NULL,
  `day_registered` varchar(20) DEFAULT NULL,
  `time_registered` varchar(8) DEFAULT NULL,
  `date_login` varchar(12) DEFAULT NULL,
  `day_login` varchar(20) DEFAULT NULL,
  `time_login` varchar(8) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`name`, `email`, `password`, `date_registered`, `day_registered`, `time_registered`, `date_login`, `day_login`, `time_login`, `id`) VALUES
('بهرنگ', 'behrang.abad20@gmail.com', 'aaaaa', '۰۱/۱۰/۱۶', 'جمعه', '۲:۱۲:۴۳', '۰۱/۱۱/۰۹', 'یکشنبه', '۳:۰۸:۱۶', 120478),
('بابک', 'a@b.gmail.com', 'sssss', '۰۱/۱۱/۰۸', 'شنبه', '۶:۵۱:۰۰', '۰۱/۱۱/۰۹', 'یکشنبه', '۳:۰۹:۱۶', 120488),
('بابک', 'a@s.gmail.com', '12345', '۰۱/۱۱/۰۸', 'شنبه', '۷:۰۱:۲۴', NULL, NULL, NULL, 120489),
('بابک', 'ab@c.gmail.com', '12345', '۰۱/۱۱/۰۸', 'شنبه', '۷:۱۱:۲۸', '۰۱/۱۱/۰۸', 'شنبه', '۹:۰۲:۲۹', 120490);

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
(5, '2014_10_12_000000_create_users_table', 1),
(6, '2014_10_12_100000_create_password_resets_table', 1),
(7, '2019_08_19_000000_create_failed_jobs_table', 1),
(8, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `news_id` int(11) NOT NULL,
  `news_images` varchar(255) DEFAULT NULL,
  `news` mediumtext DEFAULT NULL,
  `date_registered` varchar(12) DEFAULT NULL,
  `day_registered` varchar(20) DEFAULT NULL,
  `time_registered` varchar(8) DEFAULT NULL,
  `date_edited` varchar(12) DEFAULT NULL,
  `day_edited` varchar(20) DEFAULT NULL,
  `time_edited` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `news_images`, `news`, `date_registered`, `day_registered`, `time_registered`, `date_edited`, `day_edited`, `time_edited`) VALUES
(91, 'p1.png', 'درهای خودکار یا اتوماتیک به درهایی گفته می&zwnj;شود که باز و بسته&zwnj;شدن در آن&zwnj;ها به صورت خودکار انجام می&zwnj;گیرد و نیازی به دخالت انسان نیست.', '۰۱/۱۰/۱۹', 'دوشنبه', '۴:۵۴:۰۱', '۰۱/۱۰/۱۹', 'دوشنبه', '۵:۴۳:۴۷');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `who_ordered_id` int(11) DEFAULT NULL,
  `who_ordered_name` varchar(50) DEFAULT NULL,
  `order_name` varchar(50) DEFAULT NULL,
  `film_id` int(11) DEFAULT NULL,
  `time_of_film` varchar(8) DEFAULT NULL,
  `date_registered` varchar(12) DEFAULT NULL,
  `day_registered` varchar(20) DEFAULT NULL,
  `time_registered` varchar(8) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`who_ordered_id`, `who_ordered_name`, `order_name`, `film_id`, `time_of_film`, `date_registered`, `day_registered`, `time_registered`, `id`) VALUES
(120478, 'بهرنگ', 'سینمای شماره 2', 1309, NULL, '۰۱/۱۱/۰۵', 'چهارشنبه', '۱۲:۰۰:۴۰', 1278371),
(120478, 'بهرنگ', 'گشت ارشاد 1', 1305, NULL, '۰۱/۱۱/۰۵', 'چهارشنبه', '۱۲:۳۲:۳۱', 1278372),
(120490, 'بابک', 'جدی نادر از سیمین', 1317, NULL, '۰۱/۱۱/۰۸', 'شنبه', '۹:۰۲:۴۵', 1278375);

-- --------------------------------------------------------

--
-- Table structure for table `pafrelations`
--

CREATE TABLE `pafrelations` (
  `item_of_id` int(11) DEFAULT NULL,
  `type_of_item` int(1) NOT NULL,
  `place_has_item` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `places`
--

CREATE TABLE `places` (
  `place_name` varchar(50) DEFAULT NULL,
  `address` varchar(300) DEFAULT NULL,
  `google_map_iframe` varchar(500) DEFAULT NULL,
  `capacity` varchar(10) DEFAULT NULL,
  `place_image_name` varchar(50) DEFAULT NULL,
  `id_of_id_as_city` int(11) NOT NULL,
  `place_of_id` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `places`
--

INSERT INTO `places` (`place_name`, `address`, `google_map_iframe`, `capacity`, `place_image_name`, `id_of_id_as_city`, `place_of_id`, `id`) VALUES
('سینمای شماره 1', 'تست 1، تست 1،  تست 1', NULL, '333', 'download.jpg', 1427, 44311, 218),
('سینمای شماره 3', 'تست 2، تست 2، تست 2', NULL, '200', 'S.jpg', 1427, 44311, 220),
('سینمای شماره 6', 'تست 4، تست 4، تست 4', NULL, '674', 'download2.jpg', 1427, 44311, 222);

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `province_name` varchar(50) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`province_name`, `id`) VALUES
('گیلان', 1427),
('تهران', 1429);

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
-- Indexes for table `city_s`
--
ALTER TABLE `city_s`
  ADD PRIMARY KEY (`city_id`),
  ADD KEY `city_of_id` (`city_of_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `film_id` (`film_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `films`
--
ALTER TABLE `films`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `film_to_places`
--
ALTER TABLE `film_to_places`
  ADD PRIMARY KEY (`id`),
  ADD KEY `film_id` (`film_id`),
  ADD KEY `places_id` (`places_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `who_ordered_id` (`who_ordered_id`),
  ADD KEY `film_id` (`film_id`);

--
-- Indexes for table `pafrelations`
--
ALTER TABLE `pafrelations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_of_id` (`item_of_id`),
  ADD KEY `place_has_item` (`place_has_item`);

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
-- Indexes for table `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`id`),
  ADD KEY `place_of_id` (`place_of_id`),
  ADD KEY `id_of_id_as_city` (`id_of_id_as_city`);

--
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `city_s`
--
ALTER TABLE `city_s`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44315;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `films`
--
ALTER TABLE `films`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1328;

--
-- AUTO_INCREMENT for table `film_to_places`
--
ALTER TABLE `film_to_places`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120491;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1278376;

--
-- AUTO_INCREMENT for table `pafrelations`
--
ALTER TABLE `pafrelations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `places`
--
ALTER TABLE `places`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=238;

--
-- AUTO_INCREMENT for table `provinces`
--
ALTER TABLE `provinces`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1431;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `city_s`
--
ALTER TABLE `city_s`
  ADD CONSTRAINT `city_s_ibfk_1` FOREIGN KEY (`city_of_id`) REFERENCES `provinces` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`who_ordered_id`) REFERENCES `members` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`film_id`) REFERENCES `films` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pafrelations`
--
ALTER TABLE `pafrelations`
  ADD CONSTRAINT `pafrelations_ibfk_1` FOREIGN KEY (`item_of_id`) REFERENCES `places` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pafrelations_ibfk_2` FOREIGN KEY (`place_has_item`) REFERENCES `films` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `places`
--
ALTER TABLE `places`
  ADD CONSTRAINT `places_ibfk_1` FOREIGN KEY (`place_of_id`) REFERENCES `city_s` (`city_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
