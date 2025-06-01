-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Ned 01. čen 2025, 22:06
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
-- Databáze: `wa_2025_lm_02`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `category` varchar(100) DEFAULT NULL,
  `subcategory` varchar(100) DEFAULT NULL,
  `year` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `isbn` varchar(20) NOT NULL,
  `description` text DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`images`)),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Vypisuji data pro tabulku `books`
--

INSERT INTO `books` (`id`, `title`, `author`, `category`, `subcategory`, `year`, `price`, `isbn`, `description`, `link`, `images`, `created_at`, `updated_at`, `user_id`) VALUES
(3, 'Java 21 – Kompletní příručka jazyka', 'Rudolf Pecinovský', '', NULL, 2025, 599.00, ' 978-80-251-5678-9', '', '', '[]', '2025-05-30 23:55:49', '2025-05-30 23:55:49', 5),
(4, 'Python – knihovny pro práci s daty pro verzi 3.11', 'Rudolf Pecinovský', '', NULL, 2025, 438.00, '978-80-251-5680-2', '', '', '[]', '2025-05-31 00:00:00', '2025-05-31 00:00:00', 3),
(5, 'Programování v C# od základů k profesionálnímu použití', 'Miroslav Virius', '', NULL, 2025, 402.00, '978-80-251-5685-7', '', '', '[]', '2025-05-31 00:00:39', '2025-05-31 00:00:39', 3);

-- --------------------------------------------------------

--
-- Struktura tabulky `books_backup`
--

CREATE TABLE `books_backup` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `category` varchar(100) DEFAULT NULL,
  `subcategory` varchar(100) DEFAULT NULL,
  `year` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `isbn` varchar(20) NOT NULL,
  `description` text DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`images`)),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Vypisuji data pro tabulku `books_backup`
--

INSERT INTO `books_backup` (`id`, `title`, `author`, `category`, `subcategory`, `year`, `price`, `isbn`, `description`, `link`, `images`, `created_at`, `updated_at`) VALUES
(1, 'Kniha 25', 'asdfaeg', '', NULL, 2017, 2000.00, '111', '', '', '[]', '2025-03-20 14:37:31', '2025-04-10 13:12:29'),
(2, 'Začínáme programovat v jazyku Python 1', 'Rudolf Pecinovxký', '', NULL, 2024, 399.00, '978-80-271-5467-8', '', '', '[]', '2025-03-27 13:36:01', '2025-04-10 13:12:18'),
(3, 'E-kniha Stáhnout ukázku Programujeme hry v jazyce C#', 'Petr Roudenský', '', NULL, 2011, 249.00, '657465129', '', '', '[]', '2025-03-27 14:08:43', '2025-03-27 14:08:43'),
(4, 'dgagr', 'dgarga', '', NULL, 2024, 200.00, '657549', '', '', '[]', '2025-03-27 14:11:22', '2025-03-27 14:11:22');

-- --------------------------------------------------------

--
-- Struktura tabulky `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `book_id` int(11) DEFAULT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Vypisuji data pro tabulku `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `book_id`, `content`, `created_at`, `updated_at`) VALUES
(1, 3, 5, 'krjgůkejruthůjwnůtrjkhnzrlktjhuwzůkjtůkwtlzw', '2025-05-31 13:28:53', NULL),
(3, 5, 5, 'rigoúwiehtprwuo', '2025-05-31 14:04:28', NULL),
(5, 3, 5, 'erjouiqhruqwhirughqwriuh', '2025-06-01 00:24:02', NULL);

-- --------------------------------------------------------

--
-- Struktura tabulky `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
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
(3, 'lm1', NULL, '$2y$10$V/4E4OkuC1yPJXUkCBVQpurElfHoGpoQ1KFCNr9WyukK1kAmPOO.S', 'admin', NULL, NULL, '2025-04-24 12:53:42', NULL),
(4, 'lm2', NULL, '$2y$10$Y2tWhLKiMFYKF9vuRIvhc.ZbbXzF5ZWKp.9pm7T3FKjO7ojkUwIIO', 'user', NULL, NULL, '2025-04-25 13:26:09', NULL),
(5, 'lm3', NULL, '$2y$10$w6uTRIlHQN7cuohnKshDruNjSsT72AFGwid4PrjQADQVLxtxkc4TK', 'user', NULL, NULL, '2025-05-30 10:04:41', NULL),
(6, 'lm4', NULL, '$2y$10$814rHIYDt7bO/YMSqv/ZT.RRD7i3agf6cwE1q5vuCLa9OXXtcu.aC', 'user', NULL, NULL, '2025-05-31 15:35:31', NULL);

--
-- Indexy pro exportované tabulky
--

--
-- Indexy pro tabulku `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `isbn` (`isbn`),
  ADD KEY `fk_books_user` (`user_id`);

--
-- Indexy pro tabulku `books_backup`
--
ALTER TABLE `books_backup`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `isbn` (`isbn`);

--
-- Indexy pro tabulku `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexy pro tabulku `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pro tabulku `books_backup`
--
ALTER TABLE `books_backup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pro tabulku `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pro tabulku `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Omezení pro exportované tabulky
--

--
-- Omezení pro tabulku `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `fk_books_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Omezení pro tabulku `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
