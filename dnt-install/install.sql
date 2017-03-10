-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Hostiteľ: 127.0.0.1
-- Čas generovania: Pi 10.Mar 2017, 18:10
-- Verzia serveru: 5.6.16
-- Verzia PHP: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Databáza: `dnt3_skeleton`
--

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `dnt_uploads`
--

CREATE TABLE `dnt_uploads` (
  `id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `name` varchar(300) CHARACTER SET utf8 NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `type` varchar(300) CHARACTER SET utf8 NOT NULL,
  `show` int(11) NOT NULL DEFAULT '1',
  `parent_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Sťahujem dáta pre tabuľku `dnt_uploads`
--

INSERT INTO `dnt_uploads` (`id`, `vendor_id`, `name`, `datetime`, `type`, `show`, `parent_id`) VALUES
(257, 1, 'osmos_logo.jpg', '2017-03-10 17:09:44', 'image/jpeg', 1, 0),
(258, 1, 'no-image-available.jpg', '2017-03-10 17:09:44', 'image/jpeg', 1, 0),
(260, 1, 'nas.jpg', '2017-03-10 17:09:44', 'image/jpeg', 1, 0),
(261, 1, 'nas_1.jpg', '2017-03-10 17:09:44', 'image/jpeg', 1, 0),
(262, 1, 'developmend-2.jpg', '2017-03-10 17:09:44', 'image/jpeg', 1, 0),
(263, 1, '6246_pdc.jpg', '2017-03-10 17:09:44', 'image/jpeg', 1, 0),
(264, 1, 'OSMOSZ5ZoseZfrezovanieZplynule.jpg', '2017-03-10 17:09:44', 'image/jpeg', 1, 0),
(265, 1, 'kariera.jpg', '2017-03-10 17:09:44', 'image/jpeg', 1, 0),
(266, 1, 'partners.jpg', '2017-03-10 17:09:44', 'image/jpeg', 1, 0),
(267, 1, 'contact.jpg', '2017-03-10 17:09:44', 'image/jpeg', 1, 0),
(268, 1, 'people-at-horizon-abstract-591591.jpg', '2017-03-10 17:09:44', 'image/jpeg', 1, 0),
(269, 1, 'developmend-2_1.jpg', '2017-03-10 17:09:44', 'image/jpeg', 1, 0),
(270, 1, 'solid-works.jpg', '2017-03-10 17:09:44', 'image/jpeg', 1, 0),
(271, 1, 'BezZnzvu.jpg', '2017-03-10 17:09:44', 'image/jpeg', 1, 0),
(272, 1, 'BezZnzvu_1.jpg', '2017-03-10 17:09:44', 'image/jpeg', 1, 0),
(273, 1, 'metsa_tissue.png', '2017-03-10 17:09:44', 'image/png', 1, 0),
(274, 1, 'images.jpg', '2017-03-10 17:09:44', 'image/jpeg', 1, 0),
(275, 1, 'SolidCAM_logo_header.png', '2017-03-10 17:09:44', 'image/png', 1, 0),
(276, 1, 'jpplast.png', '2017-03-10 17:09:44', 'image/png', 1, 0),
(277, 1, 'inventive.png', '2017-03-10 17:09:44', 'image/png', 1, 0),
(278, 1, 'LPH_Vranov_n_T.png', '2017-03-10 17:09:44', 'image/png', 1, 0),
(279, 1, 'cimco.jpg', '2017-03-10 17:09:44', 'image/jpeg', 1, 0),
(280, 1, 'OSMOSZ5ZoseZfrezovanieZplynule_1.jpg', '2017-03-10 17:09:44', 'image/jpeg', 1, 0),
(678, 1, '15380662_1210587339008725_3686530554139881953_n.jpg', '2017-03-10 17:09:44', 'image/jpeg', 1, 0),
(691, 1, 'dnt3-admin.png', '2017-03-10 17:09:44', 'image/png', 1, 0);

--
-- Kľúče pre exportované tabuľky
--

--
-- Indexy pre tabuľku `dnt_uploads`
--
ALTER TABLE `dnt_uploads`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pre exportované tabuľky
--

--
-- AUTO_INCREMENT pre tabuľku `dnt_uploads`
--
ALTER TABLE `dnt_uploads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=692;