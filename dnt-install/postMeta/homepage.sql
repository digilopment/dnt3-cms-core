-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Hostiteľ: 127.0.0.1
-- Čas generovania: Po 30.Júl 2018, 13:03
-- Verzia serveru: 5.6.16
-- Verzia PHP: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáza: `dnt3`
--

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `dnt_posts_meta`
--

CREATE TABLE `dnt_posts_meta` (
  `id` int(11) NOT NULL,
  `id_entity` int(11) NOT NULL,
  `service` varchar(300) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `key` varchar(300) NOT NULL,
  `value` text NOT NULL,
  `description` varchar(1000) NOT NULL,
  `show` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sťahujem dáta pre tabuľku `dnt_posts_meta`
--

INSERT INTO `dnt_posts_meta` (`id`, `id_entity`, `service`, `vendor_id`, `key`, `value`, `description`, `show`) VALUES
(1, 13289, 'homepage', 1, 'info', 'Toto je info', 'Informácie', 1),
(2, 13289, 'homepage', 1, 'test', 'Toto je test', 'Testovacia zóna', 0);

--
-- Kľúče pre exportované tabuľky
--

--
-- Indexy pre tabuľku `dnt_posts_meta`
--
ALTER TABLE `dnt_posts_meta`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pre exportované tabuľky
--

--
-- AUTO_INCREMENT pre tabuľku `dnt_posts_meta`
--
ALTER TABLE `dnt_posts_meta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
