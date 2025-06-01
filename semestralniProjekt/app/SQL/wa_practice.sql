-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Ned 01. čen 2025, 22:07
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
-- Databáze: `wa_practice`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `fishes`
--

CREATE TABLE `fishes` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `species` varchar(100) DEFAULT NULL,
  `habitat` varchar(100) DEFAULT NULL,
  `size_cm` int(11) DEFAULT NULL,
  `diet` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Vypisuji data pro tabulku `fishes`
--

INSERT INTO `fishes` (`id`, `name`, `species`, `habitat`, `size_cm`, `diet`) VALUES
(1, 'Klaun očkatý', 'Amphiprioninae', 'Korálové útesy', 12, 'Řasy, plankton');

--
-- Indexy pro exportované tabulky
--

--
-- Indexy pro tabulku `fishes`
--
ALTER TABLE `fishes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `fishes`
--
ALTER TABLE `fishes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
