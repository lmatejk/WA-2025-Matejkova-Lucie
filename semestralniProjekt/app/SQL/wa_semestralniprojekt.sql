-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Ned 01. čen 2025, 22:05
-- Verze serveru: 10.4.32-MariaDB
-- Verze PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `wa_semestralniprojekt`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `blog_posts`
--

CREATE TABLE `blog_posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Vypisuji data pro tabulku `blog_posts`
--

INSERT INTO `blog_posts` (`id`, `user_id`, `category_id`, `title`, `content`, `created_at`, `updated_at`) VALUES
(15, 1, 1, 'Merge ', 'Merge znamená spojení dvou tabulek na základě společného sloupce (např. ID zákazníka).\r\n\r\ntakto vypadá M:\r\n\r\n\r\nlet\r\n    // Načtení první tabulky (např. objednávky)\r\n    Zakaznici = Excel.CurrentWorkbook(){[Name=&quot;Zakaznici&quot;]}[Content],\r\n\r\n    // Načtení druhé tabulky (např. detaily zákazníků)\r\n    DetailyZakazniku = Excel.CurrentWorkbook(){[Name=&quot;DetailyZakazniku&quot;]}[Content],\r\n\r\n    // Sloučení tabulek na základě sloupce CustomerID\r\n    SpojeneTabulky = Table.NestedJoin(\r\n        Zakaznici, \r\n        {&quot;CustomerID&quot;}, \r\n        DetailyZakazniku, \r\n        {&quot;CustomerID&quot;}, \r\n        &quot;Detaily&quot;, \r\n        JoinKind.LeftOuter\r\n    ),\r\n\r\n    // Rozbalení sloučených dat\r\n    RozbaleneDetaily = Table.ExpandTableColumn(\r\n        SpojeneTabulky, \r\n        &quot;Detaily&quot;, \r\n        {&quot;Jmeno&quot;, &quot;Email&quot;, &quot;Telefon&quot;}, \r\n        {&quot;Jmeno&quot;, &quot;Email&quot;, &quot;Telefon&quot;}\r\n    )\r\nin\r\n    RozbaleneDetaily\r\n', '2025-06-01 16:02:08', NULL);

-- --------------------------------------------------------

--
-- Struktura tabulky `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `slug` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Vypisuji data pro tabulku `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`) VALUES
(1, 'Power BI', 'powerbi'),
(2, 'Power Apps', 'powerapps'),
(3, 'Power Automate', 'powerautomate'),
(4, 'Power Pages', 'powerpages'),
(5, 'Copilot Studio', 'copilotstudio');

-- --------------------------------------------------------

--
-- Struktura tabulky `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Vypisuji data pro tabulku `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `post_id`, `category_id`, `content`, `created_at`, `updated_at`) VALUES
(15, 1, 15, 1, 'Jde udělat merge i mezi více sloupci?', '2025-06-01 16:11:31', NULL);

-- --------------------------------------------------------

--
-- Struktura tabulky `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `role` enum('user','admin') NOT NULL DEFAULT 'user',
  `name` varchar(100) DEFAULT NULL,
  `surname` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Vypisuji data pro tabulku `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password_hash`, `role`, `name`, `surname`, `created_at`, `updated_at`) VALUES
(1, 'lm1', 'lm1@example.com', '$2y$10$PTMzs3v0yQwgqqb7j/lbIOgQv9vmBBZsU3FWXkQDT.PkFHhy6omUi', 'admin', NULL, NULL, '2025-05-29 12:29:29', NULL),
(2, 'lm2', 'lm2@example.com', '$2y$10$inIzEbO6xy4sFklJ0yU9H.RiBDZFlqOb38KQmMWQxjbt5S.ZxYUka', 'user', NULL, NULL, '2025-05-29 14:12:06', NULL);

--
-- Indexy pro exportované tabulky
--

--
-- Indexy pro tabulku `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexy pro tabulku `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexy pro tabulku `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexy pro tabulku `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `blog_posts`
--
ALTER TABLE `blog_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pro tabulku `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pro tabulku `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT pro tabulku `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Omezení pro exportované tabulky
--

--
-- Omezení pro tabulku `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD CONSTRAINT `blog_posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `blog_posts_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Omezení pro tabulku `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `comments_ibfk_3` FOREIGN KEY (`post_id`) REFERENCES `blog_posts` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
