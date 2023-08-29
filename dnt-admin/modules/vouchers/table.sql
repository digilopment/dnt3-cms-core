-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Hostiteľ: 127.0.0.1
-- Čas generovania: Ne 03.Feb 2019, 10:57
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
-- Štruktúra tabuľky pre tabuľku `dnt_vouchers`
--

CREATE TABLE IF NOT EXISTS`dnt_vouchers` (
  `id` int(11) NOT NULL,
  `id_entity` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `value` varchar(300) NOT NULL,
  `file_name` varchar(300) NOT NULL,
  `datetime_creat` datetime NOT NULL,
  `datetime_update` datetime NOT NULL,
  `show` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Kľúče pre exportované tabuľky
--

--
-- Indexy pre tabuľku `dnt_vouchers`
--
ALTER TABLE `dnt_vouchers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pre exportované tabuľky
--

--
-- AUTO_INCREMENT pre tabuľku `dnt_vouchers`
--
ALTER TABLE `dnt_vouchers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
