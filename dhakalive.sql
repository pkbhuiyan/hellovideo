-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2020 at 06:37 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dhakalive`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookmarks`
--

CREATE TABLE `bookmarks` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `video_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookmarks`
--

INSERT INTO `bookmarks` (`id`, `user_id`, `video_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2019-03-22 03:30:17', '2019-03-22 03:30:17'),
(7, 1, 14, '2019-07-16 12:09:20', '2019-07-16 12:09:20');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(1, 'Regular', NULL, '2019-07-16 10:03:14'),
(3, 'new', '2019-03-22 10:41:10', '2019-03-22 10:41:10'),
(5, 'Tutorial', '2019-07-16 10:03:58', '2019-07-16 10:03:58'),
(6, 'Mix', '2019-07-16 10:12:42', '2019-07-16 11:33:13');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(10) UNSIGNED NOT NULL,
  `video_id` int(10) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `video_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `user_id`, `video_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2019-03-22 03:30:06', '2019-03-22 03:30:06'),
(4, 1, 14, '2019-07-16 12:09:17', '2019-07-16 12:09:17');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_02_25_073507_create_categories_table', 2),
(4, '2019_02_27_071107_create_videos_table', 2),
(5, '2019_03_10_114345_create_play_lists_table', 3),
(6, '2019_03_11_110344_create_playlist_items_table', 4),
(7, '2019_03_14_083002_add_new_column', 4),
(8, '2019_03_20_121653_delete_again_featured_from_videos', 4),
(9, '2019_03_20_121830_add_again_featured_to_videos', 4),
(10, '2019_03_21_051506_create_likes_table', 4),
(11, '2019_03_21_122204_create_bookmarks_table', 4),
(12, '2019_04_10_090209_create_images_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `playlist_items`
--

CREATE TABLE `playlist_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `play_list_id` int(10) UNSIGNED NOT NULL,
  `video_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `playlist_items`
--

INSERT INTO `playlist_items` (`id`, `play_list_id`, `video_id`, `created_at`, `updated_at`) VALUES
(3, 8, 13, '2019-07-16 11:34:11', '2019-07-16 11:34:11'),
(4, 8, 14, '2019-07-16 11:34:11', '2019-07-16 11:34:11'),
(5, 8, 15, '2019-07-16 11:34:12', '2019-07-16 11:34:12'),
(6, 9, 9, '2019-07-16 11:34:48', '2019-07-16 11:34:48'),
(7, 9, 16, '2019-07-16 11:34:48', '2019-07-16 11:34:48'),
(8, 10, 10, '2019-07-16 11:35:22', '2019-07-16 11:35:22'),
(9, 10, 11, '2019-07-16 11:35:22', '2019-07-16 11:35:22'),
(10, 11, 7, '2019-07-16 11:35:57', '2019-07-16 11:35:57'),
(11, 11, 8, '2019-07-16 11:35:57', '2019-07-16 11:35:57'),
(12, 12, 1, '2019-07-16 11:36:39', '2019-07-16 11:36:39'),
(13, 12, 6, '2019-07-16 11:36:39', '2019-07-16 11:36:39');

-- --------------------------------------------------------

--
-- Table structure for table `play_lists`
--

CREATE TABLE `play_lists` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'test desc',
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.jpg',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `play_lists`
--

INSERT INTO `play_lists` (`id`, `title`, `description`, `image`, `created_at`, `updated_at`) VALUES
(8, 'Story', 'test desc', 'default.jpg', '2019-07-16 11:33:37', '2019-07-16 11:33:37'),
(9, 'Music', 'test desc', 'default.jpg', '2019-07-16 11:34:28', '2019-07-16 11:34:28'),
(10, 'Tuts-Series', 'test desc', 'default.jpg', '2019-07-16 11:35:06', '2019-07-16 11:35:06'),
(11, 'Python', 'test desc', 'default.jpg', '2019-07-16 11:35:39', '2019-07-16 11:35:39'),
(12, 'Exclusive', 'test desc', 'default.jpg', '2019-07-16 11:36:16', '2019-07-16 11:36:16');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Chelsie Jerde', 'rkoelpin@example.org', '2019-02-21 11:40:45', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'admin', 'M8FqOfaPvuyZ0ChEexOqS5FgcuGZIguJps2qjZBsNsQl18TV6NzA5rz3nAmq', '2019-02-21 11:40:45', '2019-02-21 11:40:45'),
(2, 'Minnie Greenfelder III', 'jermaine12@example.org', '2019-02-21 11:49:11', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'user', 'srRuI7jrE1cskXv8vrSh810KzfsnQgfO9mhu7mefdSEm5W8sVjw3CpSFXGKN', '2019-02-21 11:49:11', '2019-02-21 11:49:11');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `videolink` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `title`, `category_id`, `user_id`, `videolink`, `description`, `featured`, `created_at`, `updated_at`) VALUES
(1, 'Equal Minds, Equal Rights: The Youth for Gender Equality', 5, 1, '8NF9Wc6hG50', 'test test testtest test testtest test testtest test testtest test testtest test testtest test testtest test testtest test testtest test testtest test test', 1, '2019-03-22 03:24:06', '2019-07-16 10:14:04'),
(6, 'England vs New Zealand - Match Highlights | ICC Cricket World Cup 2019', 6, 1, 'Kwu1yIC-ssg', 'Watch full highlights of the England vs New Zealand match at Lord\'s, the Final of the 2019 Cricket World Cup.', 1, '2019-07-16 10:13:26', '2019-07-16 10:13:26'),
(7, 'Try DJANGO TUTORIAL Series (v2.2) // PYTHON Web Development with Django version 2.2', 5, 1, '-oQvMHpKkms', 'Lorem ipsum loren dolonLorem ipsum loren dolonLorem ipsum loren dolonLorem ipsum loren dolonLorem ipsum loren dolonLorem ipsum loren dolonLorem ipsum .', 1, '2019-07-16 11:15:24', '2019-07-16 11:15:24'),
(8, 'What Can You Do with Python? - The 3 Main Applications', 3, 1, 'kLZuut1fYzQ', 'lorem ipsum lorenlorem ipsum lorenlorem ipsum lorenlorem ipsum lorenlorem ipsum lorenlorem ipsum lorenlorem ipsum lorenlorem ipsum lorenlorem ipsum lorenlorem ipsum loren', 0, '2019-07-16 11:16:25', '2019-07-16 11:16:25'),
(9, 'Monsoon Heartbreak Mashup 2019 | Aftermorning', 3, 1, 'eNoCOLKmqnU', 'Monsoon Heartbreak Mashup 2019 | Aftermorning', 0, '2019-07-16 11:17:54', '2019-07-16 11:17:54'),
(10, 'How To Stop / Prevent A Plugin Or Theme Update With Version Bumping For WordPress', 5, 1, 'jn-LzubWL5w', 'How To Stop / Prevent A Plugin Or Theme Update With Version Bumping For WordPress', 0, '2019-07-16 11:20:54', '2019-07-16 11:20:54'),
(11, 'Solving Responsive Web Design Challenges With Elementor - Monday Masterclass', 5, 1, 'QfjI0ILFUVA', 'In this tutorial, we examine several responsive web design challenges and explore various ways to solve them elegantly using Elementor.', 0, '2019-07-16 11:21:33', '2019-07-16 11:21:33'),
(12, 'Creating Awesome UI\'s that Animate Only On Scroll', 5, 1, 'S18Wh9IELo0', 'Creating Awesome UI\'s that Animate Only On Scroll', 1, '2019-07-16 11:23:09', '2019-07-16 11:23:09'),
(13, 'Fun at work | A Frustrated Software Engineer Moments 8', 6, 1, 'pY6bVr3iHRo', 'Fun at work | A Frustrated Software Engineer Moments 8', 0, '2019-07-16 11:24:58', '2019-07-16 11:24:58'),
(14, 'BYN : The Mass Cheating', 6, 1, 'pAGHYnoKyY8', 'BYN : The Mass Cheating', 0, '2019-07-16 11:25:37', '2019-07-16 11:25:37'),
(15, 'Two Feet - Lost The Game', 6, 1, 'R2ZW_94DyYM', 'Two Feet - Lost The Game', 0, '2019-07-16 11:26:36', '2019-07-16 11:38:15'),
(16, 'PLS&TY - Run Wild', 6, 1, 'dFYYImRNR6U', 'PLS&TY - Run Wild', 1, '2019-07-16 11:30:24', '2019-07-16 11:30:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookmarks`
--
ALTER TABLE `bookmarks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookmarks_user_id_foreign` (`user_id`),
  ADD KEY `bookmarks_video_id_foreign` (`video_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `images_video_id_foreign` (`video_id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `likes_user_id_foreign` (`user_id`),
  ADD KEY `likes_video_id_foreign` (`video_id`);

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
-- Indexes for table `playlist_items`
--
ALTER TABLE `playlist_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `playlist_items_play_list_id_foreign` (`play_list_id`),
  ADD KEY `playlist_items_video_id_foreign` (`video_id`);

--
-- Indexes for table `play_lists`
--
ALTER TABLE `play_lists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `videos_category_id_foreign` (`category_id`),
  ADD KEY `videos_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookmarks`
--
ALTER TABLE `bookmarks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `playlist_items`
--
ALTER TABLE `playlist_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `play_lists`
--
ALTER TABLE `play_lists`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookmarks`
--
ALTER TABLE `bookmarks`
  ADD CONSTRAINT `bookmarks_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bookmarks_video_id_foreign` FOREIGN KEY (`video_id`) REFERENCES `videos` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_video_id_foreign` FOREIGN KEY (`video_id`) REFERENCES `videos` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `likes_video_id_foreign` FOREIGN KEY (`video_id`) REFERENCES `videos` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `playlist_items`
--
ALTER TABLE `playlist_items`
  ADD CONSTRAINT `playlist_items_play_list_id_foreign` FOREIGN KEY (`play_list_id`) REFERENCES `play_lists` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `playlist_items_video_id_foreign` FOREIGN KEY (`video_id`) REFERENCES `videos` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `videos`
--
ALTER TABLE `videos`
  ADD CONSTRAINT `videos_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `videos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
