-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 01 Feb 2021 pada 11.49
-- Versi Server: 10.0.38-MariaDB-0ubuntu0.16.04.1
-- PHP Version: 7.3.25-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mobile-apps`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `uid` char(36) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `body` text,
  `event_uid` char(36) DEFAULT NULL,
  `user_uid` char(36) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `articles`
--

INSERT INTO `articles` (`id`, `uid`, `title`, `slug`, `body`, `event_uid`, `user_uid`, `created_at`, `updated_at`) VALUES
(14, '826c402f-8c8f-444f-b56f-db60fafafcc6', 'judul artikel pertama', 'judul-artikel-pertama', 'body pertama', '97404f1b-a63a-4004-be4e-10db5e1b22cc', 'ffeab53d-a1c4-405b-b114-95afce4eb8e9', '2021-01-29 07:43:08', '2021-01-29 07:43:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `article_events`
--

CREATE TABLE `article_events` (
  `id` int(11) NOT NULL,
  `uid` char(36) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `article_events`
--

INSERT INTO `article_events` (`id`, `uid`, `name`, `created_at`, `updated_at`) VALUES
(3, '97404f1b-a63a-4004-be4e-10db5e1b22cc', 'news', '2021-01-25 09:45:18', '2021-01-25 09:45:18'),
(4, '8dc1dadb-95c8-44a9-8dbd-0efd6bc60de8', 'event', '2021-01-25 09:45:19', '2021-01-25 09:45:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `article_images`
--

CREATE TABLE `article_images` (
  `id` int(11) NOT NULL,
  `uid` varchar(36) DEFAULT NULL,
  `article_uid` varchar(36) DEFAULT NULL,
  `imageurl` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `article_images`
--

INSERT INTO `article_images` (`id`, `uid`, `article_uid`, `imageurl`, `created_at`, `updated_at`) VALUES
(1, '4485e26a-f5f8-4647-b660-601484d64ccc', '53583336-db65-4d53-9c59-c7a6167215be', 'assets/images/gambar5.png', '2021-01-29 02:58:08', '2021-01-29 02:58:08'),
(2, 'ee468017-9b85-4fb1-a23b-5dca5930e92e', '53583336-db65-4d53-9c59-c7a6167215be', 'assets/images/spiderman.png', '2021-01-29 03:31:21', '2021-01-29 03:31:21'),
(3, '0b8be847-83b9-4f45-90f9-38402a3b3f6a', '826c402f-8c8f-444f-b56f-db60fafafcc6', 'assets/images/news.png', '2021-02-01 02:20:07', '2021-02-01 02:20:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `article_tags`
--

CREATE TABLE `article_tags` (
  `id` int(11) NOT NULL,
  `tag_uid` char(36) DEFAULT NULL,
  `article_uid` char(36) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `article_tags`
--

INSERT INTO `article_tags` (`id`, `tag_uid`, `article_uid`, `created_at`, `updated_at`) VALUES
(11, 'dde26d8b-f67d-4f78-9293-950f35f7de2e', '826c402f-8c8f-444f-b56f-db60fafafcc6', '2021-01-29 07:43:08', '2021-01-29 07:43:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tag_articles`
--

CREATE TABLE `tag_articles` (
  `id` int(11) NOT NULL,
  `uid` char(36) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tag_articles`
--

INSERT INTO `tag_articles` (`id`, `uid`, `name`, `created_at`, `updated_at`) VALUES
(1, 'ee7bf590-094a-49b8-8c26-4b3c31a758a6', 'sport', '2021-01-25 09:50:51', '2021-01-25 09:50:51'),
(2, 'dde26d8b-f67d-4f78-9293-950f35f7de2e', 'fun', '2021-01-25 09:50:51', '2021-01-25 09:50:51'),
(3, 'aa47a3e2-95d9-4b74-a75a-4aecc8ea89ec', 'fashion', '2021-01-25 09:50:51', '2021-01-25 09:50:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `uid` char(36) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `uid`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'ffeab53d-a1c4-405b-b114-95afce4eb8e9', 'Reihan Agam', 'reihanagam7@gmail.com', '123456', '2021-01-25 11:08:46', '2021-01-25 11:08:46'),
(2, 'e0d4e4bf-530e-4c98-82ac-9fb19a6e1497', 'Jack', 'jack@gmail.com', '123456', '2021-01-26 00:27:27', '2021-01-26 00:27:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `NewTable_UN` (`uid`);

--
-- Indexes for table `article_events`
--
ALTER TABLE `article_events`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `article_events_UN` (`uid`);

--
-- Indexes for table `article_images`
--
ALTER TABLE `article_images`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `article_images_UN` (`uid`);

--
-- Indexes for table `article_tags`
--
ALTER TABLE `article_tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tag_articles`
--
ALTER TABLE `tag_articles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `article_tags_UN` (`uid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_UN` (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `article_events`
--
ALTER TABLE `article_events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `article_images`
--
ALTER TABLE `article_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `article_tags`
--
ALTER TABLE `article_tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tag_articles`
--
ALTER TABLE `tag_articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
