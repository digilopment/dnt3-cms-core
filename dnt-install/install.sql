-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Hostiteľ: 127.0.0.1
-- Čas generovania: Pi 10.Mar 2017, 18:26
-- Verzia serveru: 5.6.16
-- Verzia PHP: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáza: `dnt3_skeleton`
--

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `dnt_admin_menu`
--

CREATE TABLE `dnt_admin_menu` (
  `id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `type` varchar(30) NOT NULL,
  `included` varchar(300) NOT NULL,
  `ico` varchar(100) NOT NULL,
  `order` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `name_url` varchar(300) NOT NULL,
  `name_url_sub` varchar(300) NOT NULL,
  `show` int(11) NOT NULL DEFAULT '1',
  `parent_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sťahujem dáta pre tabuľku `dnt_admin_menu`
--

INSERT INTO `dnt_admin_menu` (`id`, `vendor_id`, `type`, `included`, `ico`, `order`, `name`, `name_url`, `name_url_sub`, `show`, `parent_id`) VALUES
(269, 1, 'menu', '', ' fa-gears', 20, 'Nastavenia', 'settings', 'settings', 1, 0),
(270, 1, 'menu', 'post', 'fa-laptop', 30, 'Obsah', 'content', 'content&incuded=post', 1, 0),
(271, 1, 'submenu', '', 'fa-plus', 1, 'Pridať post', 'content', 'content&add', 1, 0),
(272, 1, 'submenu', '', '', 6, 'Bleskovky', 'content&filter=bleskovky', 'content', 1, 0),
(273, 1, 'menu', '', 'fa-user', 40, 'Používatelia', 'access', 'access', 1, 0),
(274, 1, 'submenu', '', '', 5, 'Články', 'content', 'content&filter=articles', 1, 0),
(275, 1, 'submenu', '', '', 3, 'Stránky', 'content', 'content&filter=pages', 1, 0),
(276, 1, 'menu', '', 'fa fa-home', 10, 'Domov', 'home', '', 1, 0),
(277, 1, 'menu', '', '', 70, 'Faktúry', 'faktura', '', 0, 0),
(278, 1, 'menu', '', 'fa-envelope', 80, 'Mailer', 'mailer', 'mailer', 1, 0),
(279, 1, 'submenu', '', '', 5, 'Používatelia', 'access', 'access', 1, 0),
(280, 1, 'submenu', '', 'fa-plus', 0, 'Administrátori', 'access', 'access&type=admin', 1, 0),
(281, 1, 'submenu', '', '', 4, 'Podstránky', 'content', 'content&filter=pages-sub', 1, 0),
(282, 1, 'submenu', '', 'fa-plus', 2, 'Pridať podstránku', 'content', 'content&add=pages-sub', 1, 0),
(283, 1, 'submenu', '', '', 7, 'Statický obsah', 'content', 'content&filter=static', 1, 0),
(285, 1, 'submenu', '', '', 7, 'Sponzori', 'content', 'content&filter=sponzori', 1, 0),
(286, 1, 'submenu', '', '', 8, 'Partneri', 'content', 'content&filter=partneri', 1, 0),
(287, 1, 'menu', '', 'fa-user', 23, 'Multylanguage', 'multylanguage', '', 1, 0),
(288, 1, 'submenu', '', '', 23, 'Aktívne jazyky', 'multylanguage', 'multylanguage&add', 1, 0),
(289, 1, 'submenu', '', '', 22, 'Zoznam prekladov', 'multylanguage', 'multylanguage', 1, 0),
(290, 1, 'menu', 'sitemap', ' fa-gears', 30, 'Sitemap', 'content', 'content&incuded=sitemap', 1, 0),
(291, 1, 'menu', 'article', 'fa-laptop', 30, 'Články', 'content', 'content&incuded=article', 1, 0),
(292, 1, 'menu', '', 'fa-user', 23, 'Kvízy', 'polls', 'polls', 1, 0),
(293, 1, 'submenu', '', '', 23, 'Pridať kvíz', 'polls', 'polls&action=add_poll', 1, 0),
(294, 1, 'submenu', '', '', 23, 'Zoznam kvízov', 'polls', 'polls', 1, 0),
(295, 1, 'menu', '', ' fa-gears', 20, 'Súbory', 'files', 'files', 1, 0),
(593, 1, 'submenu', '', 'fa-plus', 0, 'Pridať používateľa', 'access', 'access&action=add', 1, 0);

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `dnt_api`
--

CREATE TABLE `dnt_api` (
  `id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `name_url` varchar(300) NOT NULL,
  `query` varchar(300) NOT NULL,
  `parent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sťahujem dáta pre tabuľku `dnt_api`
--

INSERT INTO `dnt_api` (`id`, `vendor_id`, `name`, `name_url`, `query`, `parent_id`) VALUES
(1005, 1, 'Test Query', 'JajsZ5s4', 'SELECT * FROM dnt_post_type LIMIT 3', 0),
(1007, 1, 'Test Query', 'JajsZ5s4', 'SELECT * FROM dnt_post_type LIMIT 3', 0);

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `dnt_config`
--

CREATE TABLE `dnt_config` (
  `id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `key` varchar(1000) NOT NULL,
  `value` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sťahujem dáta pre tabuľku `dnt_config`
--

INSERT INTO `dnt_config` (`id`, `vendor_id`, `key`, `value`) VALUES
(3, 1, 'default_lang', 'sk'),
(4, 1, 'default_modul', 'homepage');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `dnt_languages`
--

CREATE TABLE `dnt_languages` (
  `id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `slug` varchar(300) NOT NULL,
  `name` varchar(300) NOT NULL,
  `home_lang` int(11) NOT NULL DEFAULT '0',
  `show` int(11) NOT NULL,
  `img` varchar(300) NOT NULL,
  `parent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sťahujem dáta pre tabuľku `dnt_languages`
--

INSERT INTO `dnt_languages` (`id`, `vendor_id`, `slug`, `name`, `home_lang`, `show`, `img`, `parent_id`) VALUES
(16, 1, 'sk', 'Slovenský', 1, 1, 'flag_sk.jpg', 0),
(17, 1, 'en', 'English', 0, 1, 'flag_en.jpg', 0),
(18, 1, 'de', 'German\r\n', 0, 1, 'flag_de.jpg', 0);

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `dnt_logs`
--

CREATE TABLE `dnt_logs` (
  `id` int(11) NOT NULL,
  `http_response` varchar(300) NOT NULL,
  `system_status` varchar(300) NOT NULL,
  `log_id` varchar(300) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `vendor_id` varchar(300) NOT NULL,
  `msg` varchar(1000) NOT NULL,
  `err_msg` text NOT NULL,
  `THIS_URL` varchar(1000) NOT NULL,
  `HTTP_HOST` varchar(300) NOT NULL,
  `HTTP_CONNECTION` varchar(300) NOT NULL,
  `HTTP_USER_AGENT` varchar(300) NOT NULL,
  `HTTP_ACCEPT` varchar(300) NOT NULL,
  `HTTP_REFERER` varchar(300) NOT NULL,
  `HTTP_ACCEPT_ENCODING` varchar(300) NOT NULL,
  `HTTP_ACCEPT_LANGUAGE` varchar(300) NOT NULL,
  `HTTP_ACCEPT_CHARSET` varchar(300) NOT NULL,
  `HTTP_COOKIE` varchar(300) NOT NULL,
  `PATH` varchar(300) NOT NULL,
  `SystemRoot` varchar(300) NOT NULL,
  `COMSPEC` varchar(300) NOT NULL,
  `PATHEXT` varchar(300) NOT NULL,
  `WINDIR` varchar(300) NOT NULL,
  `SERVER_SIGNATURE` varchar(300) NOT NULL,
  `SERVER_SOFTWARE` varchar(300) NOT NULL,
  `SERVER_NAME` varchar(300) NOT NULL,
  `SERVER_ADDR` varchar(300) NOT NULL,
  `SERVER_PORT` varchar(300) NOT NULL,
  `REMOTE_ADDR` varchar(300) NOT NULL,
  `DOCUMENT_ROOT` varchar(300) NOT NULL,
  `SERVER_ADMIN` varchar(300) NOT NULL,
  `SCRIPT_FILENAME` varchar(300) NOT NULL,
  `REMOTE_PORT` varchar(300) NOT NULL,
  `GATEWAY_INTERFACE` varchar(300) NOT NULL,
  `SERVER_PROTOCOL` varchar(300) NOT NULL,
  `REQUEST_METHOD` varchar(300) NOT NULL,
  `GET` varchar(300) NOT NULL,
  `QUERY_STRING` varchar(300) NOT NULL,
  `REQUEST_URI` varchar(300) NOT NULL,
  `SCRIPT_NAME` varchar(300) NOT NULL,
  `PHP_SELF` varchar(300) NOT NULL,
  `REQUEST_TIME` varchar(300) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `dnt_mailer_mails`
--

CREATE TABLE `dnt_mailer_mails` (
  `id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `surname` varchar(300) NOT NULL,
  `cat_id` varchar(300) CHARACTER SET armscii8 NOT NULL,
  `email` varchar(300) NOT NULL,
  `datetime_creat` datetime NOT NULL,
  `datetime_update` datetime NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Sťahujem dáta pre tabuľku `dnt_mailer_mails`
--

INSERT INTO `dnt_mailer_mails` (`id`, `vendor_id`, `name`, `surname`, `cat_id`, `email`, `datetime_creat`, `datetime_update`, `parent_id`) VALUES
(11, 1, 'Tomáš', 'Doubek', '2', 'thomas.doubek@gmail.com', '0000-00-00 00:00:00', '2017-01-18 00:13:17', 0),
(12, 1, 'tomasko', 'Doubecek', '2', 'thomas.doubek@gmail.com', '0000-00-00 00:00:00', '2017-01-18 07:45:03', 0),
(13, 1, 'tomasko', 'Doubecek', '2', 'thomas.doubek@gmail.comsd', '0000-00-00 00:00:00', '2017-01-18 07:45:03', 0),
(14, 1, 'tomasko', 'Doubecek', '2', 'thomas.doubek@gmail.comsd', '0000-00-00 00:00:00', '2017-01-18 07:45:03', 0),
(15, 1, 'Tomáš', 'Doubek', '42', 'thomas.doubek@gmail.com', '2017-01-18 17:49:47', '2017-03-01 14:05:29', 0);

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `dnt_mailer_type`
--

CREATE TABLE `dnt_mailer_type` (
  `id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `cat_id` varchar(300) NOT NULL,
  `name_url` varchar(300) NOT NULL,
  `name` varchar(300) NOT NULL,
  `show` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sťahujem dáta pre tabuľku `dnt_mailer_type`
--

INSERT INTO `dnt_mailer_type` (`id`, `vendor_id`, `cat_id`, `name_url`, `name`, `show`, `order`, `parent_id`) VALUES
(42, 1, 'news', 'news', 'Newsletters', 1, 1, 0),
(43, 1, 'page', 'joke', 'Jokes', 1, 1, 0),
(44, 1, 'page', 'tim', 'Team', 1, 1, 0),
(45, 1, '', 'asdad', 'asdad', 1, 1, 0),
(46, 1, '', 'rodina', 'Rodina', 1, 1, 0);

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `dnt_polls`
--

CREATE TABLE `dnt_polls` (
  `id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `name_url` varchar(300) NOT NULL,
  `img` varchar(300) NOT NULL,
  `content` text NOT NULL,
  `type` int(11) NOT NULL,
  `count_questions` int(11) NOT NULL,
  `datetime_creat` datetime NOT NULL,
  `datetime_update` datetime NOT NULL,
  `datetime_publish` datetime NOT NULL,
  `show` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `dnt_polls_composer`
--

CREATE TABLE `dnt_polls_composer` (
  `id` int(11) NOT NULL,
  `poll_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `key` varchar(300) NOT NULL,
  `value` text NOT NULL,
  `img` varchar(300) NOT NULL,
  `is_correct` int(11) NOT NULL,
  `points` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  `show` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `dnt_posts`
--

CREATE TABLE `dnt_posts` (
  `id` int(11) NOT NULL,
  `sub_cat_id` varchar(100) NOT NULL,
  `cat_id` varchar(100) NOT NULL,
  `type` varchar(300) NOT NULL,
  `name` varchar(300) NOT NULL,
  `name_url` text NOT NULL,
  `position` int(11) NOT NULL,
  `priority` int(11) NOT NULL,
  `img` varchar(300) NOT NULL,
  `datetime_creat` datetime NOT NULL,
  `datetime_update` datetime NOT NULL,
  `datetime_publish` datetime NOT NULL,
  `microtime` bigint(20) NOT NULL,
  `perex` text NOT NULL,
  `content` longtext NOT NULL,
  `tags` varchar(3000) NOT NULL,
  `embed` text NOT NULL,
  `custom` text NOT NULL,
  `prilohy` text NOT NULL,
  `order` int(11) NOT NULL,
  `show` int(11) NOT NULL DEFAULT '1',
  `search` varchar(1000) NOT NULL,
  `protected` int(11) NOT NULL DEFAULT '0',
  `vendor_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sťahujem dáta pre tabuľku `dnt_posts`
--

INSERT INTO `dnt_posts` (`id`, `sub_cat_id`, `cat_id`, `type`, `name`, `name_url`, `position`, `priority`, `img`, `datetime_creat`, `datetime_update`, `datetime_publish`, `microtime`, `perex`, `content`, `tags`, `embed`, `custom`, `prilohy`, `order`, `show`, `search`, `protected`, `vendor_id`, `parent_id`) VALUES
(13053, '', '131', 'sitemap', 'O nás', 'o-nas', 0, 0, '268', '2017-03-01 10:26:35', '2017-03-02 09:43:12', '2017-03-01 10:26:00', 0, '', '<p dir=\"ltr\" style=\"text-align:justify\"><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:arial; font-size:14px\">Spoločnosť OSMOS, s.r.o. bola založen&aacute; ako spoločnosť s&nbsp;ručen&iacute;m obmedzen&yacute;m. Pr&aacute;vnu subjektivitu sme nadobudli&nbsp;06.10.2005.&nbsp;</span></p>\r\n\r\n<p dir=\"ltr\" style=\"text-align:justify\"><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:arial; font-size:14px\">V na&scaron;ej spoločnosti&nbsp;uplatňujeme z&aacute;sady syst&eacute;mu manaž&eacute;rstva kvality certifikovan&eacute;ho podľa&nbsp;</span><strong>ISO 9001<span style=\"font-size:14px\">:2015</span></strong></p>\r\n\r\n<p dir=\"ltr\" style=\"text-align:justify\"><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:arial; font-size:14px\">Firma od svojho vzniku pre&scaron;la postupn&yacute;m v&yacute;vojom a vysokou kvalitou svojich služieb uspela na tuzemskom ako aj na n&aacute;ročnom zahraničnom trhu. Dnes firma patr&iacute; medzi veľmi &uacute;spe&scaron;n&eacute; slovensk&eacute; firmy&nbsp;a zhruba 90% svojej produkcie exportuje do kraj&iacute;n&nbsp;EU.</span></p>\r\n\r\n<h3 dir=\"ltr\" style=\"text-align:justify\"><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:times new roman; font-size:16px\">&nbsp;</span><strong>V&yacute;voj a&nbsp;kon&scaron;trukcia:</strong></h3>\r\n\r\n<p dir=\"ltr\" style=\"text-align:justify\"><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:arial; font-size:14px\">Podporujeme&nbsp;</span><strong>v&yacute;voj produktov</strong><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:arial; font-size:14px\">&nbsp;a&nbsp;pokr&yacute;vame oblasť v&yacute;roby&nbsp;</span><strong>od n&aacute;vrhu až po realiz&aacute;ciu a&nbsp;implement&aacute;ciu vo v&yacute;robe</strong><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:arial; font-size:14px\">, vr&aacute;tane komplexn&yacute;ch dod&aacute;vok a&nbsp;s&eacute;riovej produkcie. &nbsp;Sme partnerom v&nbsp;oblasti n&aacute;vrhu, v&yacute;roby, technologick&yacute;ch rie&scaron;en&iacute; a&nbsp;kooper&aacute;cie v&yacute;roby</span></p>\r\n\r\n<ul>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\" style=\"text-align:justify\"><span style=\"background-color:transparent; font-size:14px\">N&aacute;vrh a&nbsp;optimaliz&aacute;cia </span><strong>plastov&yacute;ch v&yacute;robkov vr&aacute;tane Mold flow analysis a&nbsp;v&yacute;roby plne funkčn&yacute;ch prototypov</strong></p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\" style=\"text-align:justify\"><strong><span style=\"background-color:transparent; font-size:14px\">Testovanie navrhovan&yacute;ch v&yacute;robkov z&nbsp;hľadiska </span><strong>funkčnosti a životnosti</strong></strong></p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\" style=\"text-align:justify\"><span style=\"background-color:transparent; font-size:14px\">Kon&scaron;trukcie&nbsp;</span><strong>vstrekovac&iacute;ch foriem</strong><span style=\"background-color:transparent; font-size:14px\">&nbsp;&ndash; komplexn&aacute; realiz&aacute;cia v&yacute;roby formy od jej n&aacute;vrhu až po jej odsk&uacute;&scaron;anie, dodanie a&nbsp;spustenie v s&eacute;riovej produkcie</span></p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\" style=\"text-align:justify\"><span style=\"background-color:transparent; font-size:14px\">N&aacute;vrh a&nbsp;v&yacute;roba up&iacute;nac&iacute;ch, obr&aacute;bac&iacute;ch, kontroln&yacute;ch a&nbsp;merac&iacute;ch </span><strong>pr&iacute;pravkov</strong></p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\" style=\"text-align:justify\"><span style=\"background-color:transparent; font-size:14px\">Kon&scaron;trukcie&nbsp;</span><strong>n&aacute;strojov</strong></p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\" style=\"text-align:justify\"><span style=\"background-color:transparent; font-size:14px\">V&yacute;voj a&nbsp;kon&scaron;trukcia jedno&uacute;čelov&yacute;ch strojov a zariaden&iacute;</span></p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\" style=\"text-align:justify\"><span style=\"background-color:transparent; font-size:14px\">Kon&scaron;trukčn&aacute;&nbsp;</span><strong>dokument&aacute;cia</strong></p>\r\n	</li>\r\n</ul>\r\n\r\n<h3><strong>V&yacute;roba:</strong></h3>\r\n\r\n<p dir=\"ltr\" style=\"text-align:justify\"><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:arial; font-size:14px\">V&yacute;roba prebieha čiastočne na na&scaron;ich v&yacute;robn&yacute;ch rie&scaron;eniach a&nbsp;taktiež u&nbsp;na&scaron;ich kooperačn&yacute;ch partnerov, ktor&iacute; pokr&yacute;vaj&uacute; aj tie najn&aacute;ročnej&scaron;ie v&yacute;robn&eacute; oper&aacute;cie. Dod&aacute;vka v&yacute;robkov priamo z&nbsp;v&yacute;roby, pr&iacute;padne z&nbsp;konsignačn&yacute;ch skladov vr&aacute;tane balenia a&nbsp;zabezpečenia dopravy.</span></p>\r\n\r\n<ul>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\" style=\"text-align:justify\"><span style=\"background-color:transparent; font-size:14px\">V&yacute;roba&nbsp;</span><strong>foriem, n&aacute;strojov a&nbsp;pr&iacute;pravkov</strong></p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\" style=\"text-align:justify\"><span style=\"background-color:transparent; font-size:14px\">V&yacute;roba </span><strong>plastov&yacute;ch v&yacute;robkov a&nbsp;zost&aacute;v, veľkos&eacute;riov&aacute; produkcia</strong></p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\" style=\"text-align:justify\"><span style=\"background-color:transparent; font-size:14px\">Stroj&aacute;rensk&aacute; malos&eacute;riov&aacute; a&nbsp;prototypov&aacute; v&yacute;roba</span></p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\" style=\"text-align:justify\"><span style=\"background-color:transparent; font-size:14px\">Stroj&aacute;rensk&eacute;&nbsp;</span><strong>v&yacute;robn&eacute; kooper&aacute;cie</strong></p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\" style=\"text-align:justify\"><span style=\"background-color:transparent; font-size:14px\">Vyťažovanie </span><strong>voľn&yacute;ch v&yacute;robn&yacute;ch kapac&iacute;t</strong></p>\r\n	</li>\r\n</ul>\r\n\r\n<h3><strong>PDM/PLM:</strong></h3>\r\n\r\n<p dir=\"ltr\" style=\"text-align:justify\"><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:arial; font-size:14px\">Dod&aacute;vame komplexn&eacute; rie&scaron;enia pre </span><strong>riadenie v&yacute;roby</strong><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:arial; font-size:14px\"> a&nbsp;</span><strong>zberu</strong><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:arial; font-size:14px\"> </span><strong>&uacute;dajov o&nbsp;v&yacute;robku</strong><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:arial; font-size:14px\"> v&nbsp;priebehu jeho v&yacute;robn&eacute;ho a životn&eacute;ho cyklu. </span><strong>Sledovanie a efekt&iacute;vne riadenie v&yacute;roby </strong><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:arial; font-size:14px\">pom&aacute;ha optimalizovať v&yacute;robn&eacute; činnosti a oper&aacute;cie, zn&iacute;žiť n&aacute;klady a&nbsp;zv&yacute;&scaron;iť efektivitu produkcie.</span></p>\r\n\r\n<ul>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\" style=\"text-align:justify\"><span style=\"background-color:transparent\">Automatizovan&eacute; kalkul&aacute;cie a&nbsp;cenov&eacute; ponuky</span></p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\" style=\"text-align:justify\"><span style=\"background-color:transparent\">On-line zber a&nbsp;vyhodnocovanie v&yacute;robn&yacute;ch d&aacute;t priamo z&nbsp;v&yacute;roby</span></p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\" style=\"text-align:justify\"><span style=\"background-color:transparent\">Priame prepojenie na skladov&eacute; hospod&aacute;rstvo a&nbsp;MRP syst&eacute;my</span></p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\" style=\"text-align:justify\"><span style=\"background-color:transparent\">Detailn&eacute; pl&aacute;novanie v&yacute;roby</span></p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\" style=\"text-align:justify\"><span style=\"background-color:transparent\">Nastaviteľn&eacute; reporty pre r&ocirc;zne pracovn&eacute; poz&iacute;cie s&nbsp;okamžit&yacute;m aktu&aacute;lnym prehľadom o v&yacute;robe</span></p>\r\n	</li>\r\n</ul>\r\n', '', '', '', '', 0, 1, '', 0, 1, 0),
(13054, '', '131', 'sitemap', 'Produkty', 'no_url', 0, 0, '', '2017-03-01 10:35:37', '2017-03-02 09:47:26', '2017-03-01 10:35:00', 0, '', '', '', '', '', '', 0, 1, '', 0, 1, 0),
(13055, '', '131', 'sitemap', 'Výskum a vývoj', 'vyskum-a-vyvoj', 0, 0, '269', '2017-03-01 11:01:18', '2017-03-02 09:46:01', '2017-03-01 11:01:00', 0, '', '<p>Dne&scaron;n&aacute; doba pln&aacute; start-upov a nov&yacute;ch technol&oacute;gi&iacute; kladie čoraz vač&scaron;ie n&aacute;roky na funkčnosť a efektivitu rie&scaron;en&iacute; dod&aacute;van&yacute;ch na trh.</p>\r\n\r\n<p>Na&scaron;e v&yacute;skumno-v&yacute;vojov&eacute; oddelenie sa zaober&aacute; n&aacute;vrhmi v&nbsp;oblasti zlep&scaron;ovania funkčnosti, inov&aacute;ciou a v&yacute;vojom nov&yacute;ch v&yacute;robkov v&nbsp;stroj&aacute;rskej oblasti a oblasti v&yacute;roby termoplastov.</p>\r\n\r\n<p>Neust&aacute;le sledujeme nov&eacute; svetov&eacute; trendy vo v&yacute;voji pre zlep&scaron;ovanie konkurencieschopnosti a odl&iacute;&scaron;iteľnosti.</p>\r\n\r\n<p>Pri v&yacute;voji nov&yacute;ch produktov využ&iacute;vame v&scaron;etky dostupn&eacute; technol&oacute;gie vr&aacute;tane:</p>\r\n\r\n<ul>\r\n	<li>3D CAD-CAM software /SolidWorks/SolidCam/</li>\r\n	<li>Prototypovanie (3D tlač, CNC)</li>\r\n	<li>Komplexn&eacute; testovanie prototypov</li>\r\n</ul>\r\n', '', '', '', '', 0, 1, '', 0, 1, 0),
(13056, '', '131', 'sitemap', 'Partneri', 'partneri', 0, 0, '266', '2017-03-01 11:01:45', '2017-03-02 09:41:21', '2017-03-01 11:01:00', 0, '', '', '', '', '', '', 0, 1, '', 0, 1, 0),
(13057, '', '131', 'sitemap', 'Kariéra', 'kariera', 0, 0, '265', '2017-03-01 11:02:06', '2017-03-02 10:54:42', '2017-03-01 11:02:00', 0, '', '<h3>Pridajte sa k n&aacute;&scaron;mu t&iacute;mu!</h3>\r\n\r\n<p>Na tejto str&aacute;nke sa m&ocirc;žete uch&aacute;dzať o pr&aacute;cu v&nbsp;oblastiach, ktor&eacute; firma OSMOS pon&uacute;ka &ndash; oblasť obchodu, služieb, v&yacute;voja, kon&scaron;truovania, IT spr&aacute;vy, riadenia projektov, pl&aacute;novania, logistiky, v&yacute;roby so zameran&iacute;m na stroj&aacute;rstvo a v&yacute;robu plastov.</p>\r\n\r\n<p>Ak m&aacute;te z&aacute;ujem pracovať u n&aacute;s vo firme OSMOS a poz&iacute;cia ktor&uacute; chcete vykon&aacute;vať moment&aacute;lne nie je inzerovan&aacute;, m&ocirc;žete n&aacute;m poslať otvoren&uacute; žiadosť o zamestnanie. V pr&iacute;pade uvoľnenia poz&iacute;cie&nbsp;ktor&uacute; chcete vykon&aacute;vať, budeme v&aacute;s kontaktovať.&nbsp;</p>\r\n\r\n<p>Svoje otvoren&eacute; žiadosti o zamestnanie n&aacute;m za&scaron;lite spolu so životopisom na info@osmos.sk</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<div class=\"row\" style=\"width: 91%;\"><iframe src=\"https://tech.interspeedia.com/jobs/show.php?id=36416.cl0000373&amp;tf=1\" style=\"        width: 115%;\r\n    overflow-x: hidden;\r\n    border: 0px;\r\n    height: 900px;\r\n    overflow-y: hidden;\r\n    margin-left: -10px;\"></iframe></div>\r\n', '', '', '', '', 0, 1, '', 0, 1, 0),
(13058, '', '131', 'sitemap', 'Kontakt', 'kontakt', 0, 0, '267', '2017-03-01 11:02:32', '2017-03-02 09:42:23', '2017-03-01 11:02:00', 0, '', '', '', '', '', '', 0, 1, '', 0, 1, 0),
(13059, '13053', '132', 'sitemap', 'Personál', 'personal', 0, 0, '', '2017-03-01 11:04:01', '2017-03-02 09:49:19', '2017-03-01 11:04:00', 0, '', '', '', '', '', '', 0, 1, '', 0, 1, 0),
(13060, '13054', '132', 'sitemap', 'Software pre plánovanie výroby', 'software-pre-planovanie-vyroby', 0, 0, '270', '2017-03-01 12:39:06', '2017-03-02 09:50:41', '2017-03-01 12:39:00', 0, '', '<p style=\"text-align:justify\"><span style=\"font-family:tahoma,geneva,sans-serif; font-size:14px\">ERP syst&eacute;m Plan-de-Campagne (PdC) je produktom spoločnosti BEMET International BV, Holandsko a m&aacute; v Eur&oacute;pe viac než 1000 spokojn&yacute;ch z&aacute;kazn&iacute;kov. Na&scaron;a spoločnosť - OSMOS&nbsp;s.r.o. - sa zaober&aacute; predajom a implement&aacute;ciou syst&eacute;mu PdC pre z&aacute;kazn&iacute;kov zo Slovenska a z Českej republiky. V spolupr&aacute;ci s firmou B met&nbsp;s.r.o. zabezpečujeme kompletn&uacute; technick&uacute; podporu pre tento program.&nbsp;</span></p>\r\n\r\n<p style=\"text-align:justify\"><strong>Plan-de-Campagne</strong>&nbsp;<strong>(PdC)</strong>&nbsp;je modern&yacute; informačn&yacute; syst&eacute;m&nbsp;pre sledovanie, riadenie a pl&aacute;novanie v&yacute;roby v&nbsp;mal&yacute;ch a&nbsp;stredn&yacute;ch v&yacute;robn&yacute;ch prev&aacute;dzkach.</p>\r\n\r\n<p style=\"text-align:justify\"><strong>Plan-de-Campagne</strong>&nbsp;je modulovo zostaven&yacute;, okrem samotnej v&yacute;roby umožňuje riadiť logistick&eacute; procesy, vzťahy so z&aacute;kazn&iacute;kmi, samotn&yacute;ch pracovn&iacute;kov, ako aj z&iacute;skavať podklady pre rozhodovanie a pl&aacute;novanie.</p>\r\n\r\n<p style=\"text-align:justify\"><strong>Plan-de-Campagne</strong>&nbsp; sa použ&iacute;va v nasleduj&uacute;cich v&yacute;robn&yacute;ch odvetviach: kovospracuj&uacute;ci priemysel, v&yacute;roba oceľov&yacute;ch kon&scaron;trukci&iacute;, strojov a zariaden&iacute;, n&aacute;bytk&aacute;rska v&yacute;roba, spracovanie gumy a plastov. Vďaka svojej modul&aacute;rnej kon&scaron;trukcii a jednoduchej konfigur&aacute;cii je&nbsp;<strong>Plan-de-Campagne</strong>&nbsp;vhodn&yacute; pre kusov&uacute;, malos&eacute;riov&uacute; i&nbsp;hromadn&uacute; v&yacute;robu. Hlavn&yacute;mi v&yacute;hodami s&uacute; jednoduch&eacute; a&nbsp;intuit&iacute;vne ovl&aacute;danie, orient&aacute;cia na prax a&nbsp;v&nbsp;neposlednom rade v&yacute;hodn&yacute; pomer cena/&uacute;žitkov&eacute; vlastnosti.</p>\r\n\r\n<div class=\"embed-container\"><iframe frameborder=\"0\" src=\"https://www.youtube.com/embed/LJ_WegJkgic\"></iframe></div>\r\n', '', '', '', '', 0, 1, '', 0, 1, 0),
(13064, '135', '133', 'article', 'Takmer dve tretiny Slovákov sú za zrušenie Mečiarových amnestií', '', 0, 0, '', '2017-03-01 13:37:41', '2017-03-01 13:50:03', '2017-03-01 13:37:00', 0, '', '', '', '', '', '', 0, 1, '', 0, 1, 0),
(13065, '136', '133', 'article', 'Samozvané republiky Donbasu znárodnili ukrajinské firmy. Reagujú tak na blokádu', 'samozvane-republiky-donbasu-znarodnili-ukrajinske-firmy-reaguju-tak-na-blokadu', 0, 0, '', '2017-03-01 13:50:54', '2017-03-01 13:52:23', '2017-03-01 13:50:00', 0, '', '', '', '', '', '', 0, 1, '', 0, 1, 0),
(13066, '', '137', 'post', 'Nástrojáreň a výroba', '', 0, 0, '260', '2017-03-01 16:09:04', '2017-03-01 16:10:22', '2017-03-01 16:09:00', 0, '', '', '', '', '', '', 0, 1, '', 0, 1, 0),
(13067, '', '138', 'post', 'Nástrojáreň a výroba<br/> ', 'http://nastrojaren.osmos.sk/', 0, 0, '', '2017-03-01 16:58:33', '2017-03-01 16:59:50', '2017-03-01 16:58:00', 0, '<p>V roku 2016 sme sa rozhodli roz&scaron;&iacute;riť p&ocirc;sobnosť firmy a v Bytči sme otvorili nov&eacute; technologick&eacute; centrum zameran&eacute; na v&yacute;robu a &uacute;pravy vstrekovac&iacute;ch&nbsp;foriem pre plasty.</p>\r\n', '', '', '', '', '', 0, 1, '', 0, 1, 0),
(13068, '', '138', 'post', 'Software Plan-de-Campagne', 'http://bmet.sk', 0, 0, '', '2017-03-01 17:01:08', '2017-03-01 17:01:50', '2017-03-01 17:01:00', 0, '<p>Plan-de-Campagne (PdC) je modern&yacute; informačn&yacute; syst&eacute;m pre sledovanie, riadenie a pl&aacute;novanie v&yacute;roby. Prečo využ&iacute;vať PdC a ak&eacute; možnosti pon&uacute;ka?</p>\r\n', '', '', '', '', '', 0, 1, '', 0, 1, 0),
(13069, '', '138', 'post', 'Divízia výskumu a vývoja<br/> ', 'vyskum-a-vyvoj', 0, 0, '', '2017-03-01 17:04:17', '2017-03-01 17:05:35', '2017-03-01 17:04:00', 0, '<p><span style=\"font-family:roboto slab,sans-serif; font-size:14px\">Neust&aacute;le sledujeme nov&eacute; svetov&eacute; trendy vo v&yacute;voji pre zlep&scaron;ovanie konkurencieschopnosti a odl&iacute;&scaron;iteľnosti.</span></p>\r\n', '', '', '', '', '', 0, 1, '', 0, 1, 0),
(13071, '', '137', 'post', 'Výskum a vývoj', 'slider-vyskum-a-vyvoj', 0, 0, '262', '2017-03-01 17:24:45', '2017-03-01 17:26:24', '2017-03-01 17:24:00', 0, '<p><span style=\"font-size:14px\">Neust&aacute;le hľad&aacute;me lep&scaron;ie rie&scaron;enia...</span></p>\r\n', '', '', '', '', '', 0, 1, '', 0, 1, 0),
(13072, '', '137', 'post', 'PDC', 'pdc', 0, 0, '263', '2017-03-01 17:26:48', '2017-03-01 17:27:56', '2017-03-01 17:26:00', 0, '<p><strong>Plan-de-Campagne</strong><span style=\"font-family:tahoma,geneva,sans-serif; font-size:15.4px\">&nbsp;</span><strong>(PdC)</strong><span style=\"font-family:tahoma,geneva,sans-serif; font-size:15.4px\">&nbsp;je&nbsp;....</span></p>\r\n', '', '', 'http://bmet.sk/', '', '', 0, 1, '', 0, 1, 0),
(13073, '', '134', 'post', 'Voľné výrobné kapacity', 'nastrojaren-osmos-sk', 0, 0, '264', '2017-03-01 17:28:17', '2017-03-01 17:29:22', '2017-03-01 17:28:00', 0, '<p>Voľn&eacute; v&yacute;robn&eacute; kapacity pre&nbsp;5 os&eacute; fr&eacute;zovanie plynul&eacute;</p>\r\n', '', '', '', '', '', 0, 1, '', 0, 1, 0),
(13074, '', '140', 'post', 'Výkonný riaditeľ ', 'vykonny-riaditel', 0, 0, '', '2017-03-01 23:06:12', '2017-03-01 23:07:10', '2017-03-01 23:06:00', 0, '', '<p><strong>meno</strong>: Ivan Uhliar<br />\r\n<strong>tel. c.:</strong>&nbsp;+421&nbsp;905 320 175<br />\r\n<strong>email:</strong> ivan.uhliar@osmos.sk</p>\r\n', '', '', '', '', 0, 1, '', 0, 1, 0),
(13075, '13054', '132', 'sitemap', 'Nástrojáreň a výroba', 'http://nastrojaren.osmos.sk/', 0, 0, '', '2017-03-02 09:52:12', '2017-03-02 09:53:08', '2017-03-02 09:52:00', 0, '', '<p>V roku 2016 sme sa rozhodli roz&scaron;&iacute;riť p&ocirc;sobnosť firmy a v Bytči sme otvorili nov&eacute; technologick&eacute; centrum zameran&eacute; na v&yacute;robu a &uacute;pravy foriem.</p>\r\n', '', '', '', '', 0, 1, '', 0, 1, 0),
(13077, '', '131', 'sitemap', 'Služby', 'sluzby', 0, 0, '', '2017-03-02 10:05:21', '2017-03-02 10:07:06', '2017-03-02 10:05:00', 0, '', '<div class=\"csc-header csc-header-n1\" style=\"margin: 0px; padding: 0px; color: rgb(89, 89, 89); font-family: \">\r\n<h2><span style=\"color:#B22222\"><strong><span style=\"font-family:arial,helvetica,sans-serif\"><span style=\"font-size:26px\">Generovanie&nbsp;NC programu so&nbsp;SolidCAMom: rychlo, jednoducho, spoľahlivo</span></span></strong></span></h2>\r\n</div>\r\n\r\n<div class=\"csc-textpic csc-textpic-intext-right\" style=\"margin: 0px; padding: 0px; color: rgb(89, 89, 89); font-family: \">\r\n<div class=\"csc-textpic-imagewrap csc-textpic-single-image\" style=\"margin-top: 0px; margin-right: 0px; margin-bottom: 0px; padding: 0px; float: right; margin-left: 10px !important;\"><img alt=\"\" src=\"http://www.solidcam.cz/uploads/pics/gcode_350_03.jpg\" style=\"border:none; height:281px; margin-bottom:0px !important; width:350px\" /></div>\r\n\r\n<div class=\"csc-textpic-text\" style=\"margin: 0px; padding: 0px;\">\r\n<p><span style=\"font-size:20px\"><strong>Postprocesory - CNC v&yacute;stup, pripraven&yacute; k použitiu</strong></span></p>\r\n\r\n<p>Na kvalitě NC programu, produkovan&eacute;ho CAM syst&eacute;mem, z&aacute;lež&iacute; mnoh&eacute;. Každ&yacute; postprocesor SolidCAMu&nbsp;je nastaven podle individu&aacute;ln&iacute;ch potřeb stroje i jeho obsluhy a generuje př&iacute;mo spustiteln&eacute; CNC programy bez potřeby n&aacute;sledn&eacute; n&aacute;kladn&eacute; &quot;ručn&iacute;&quot; &uacute;pravy. SolidCAM podporuje v&scaron;echny standardn&iacute; řezn&eacute; cykly a nastaven&iacute; stroje obvykl&yacute;ch CNC ř&iacute;zen&iacute;. Možnost generovat volateln&eacute; opakuj&iacute;c&iacute; se procedury v r&aacute;mci CNC programu umožňuje vytvořit kr&aacute;tk&yacute;, efektivn&iacute; a kvalitně strukturovan&yacute; NC program.</p>\r\n\r\n<p>Z rozs&aacute;hl&eacute; knihovny postprocesorů jsou vybr&aacute;ny ty požadovan&eacute; va&scaron;&iacute;m strojem a jsou dod&aacute;ny spolu se syst&eacute;mem. Postprocesory jsou programov&aacute;ny v jazyce BASIC a mohou b&yacute;t snadno upravov&aacute;ny dodavatelem SolidCAMu, nebo samotn&yacute;m z&aacute;kazn&iacute;kem.</p>\r\n\r\n<p>Když je v postprocesoru vygenerov&aacute;n NC program, nen&iacute; zapotřeb&iacute; jak&eacute;koliv dal&scaron;&iacute; &uacute;pravy předt&iacute;m, než je odesl&aacute;n stroji. Na rozd&iacute;l od vět&scaron;iny CAM syst&eacute;mů nen&iacute; CL soubor generov&aacute;n př&iacute;mo SolidCAMem. Může b&yacute;t generov&aacute;n v postprocesoru. Nam&iacute;sto toho použ&iacute;v&aacute; SolidCAM svůj vlastn&iacute;, unik&aacute;tn&iacute; k&oacute;d. Je označov&aacute;n jako parametr nebo P-k&oacute;d a jeho použit&iacute; je efektivněj&scaron;&iacute; než u CL souboru.</p>\r\n\r\n<p>Procedury jsou zabudov&aacute;ny v P-k&oacute;du. M&aacute;-li b&yacute;t operace provedena několikr&aacute;t na různ&yacute;ch &uacute;rovn&iacute;ch, jsou př&iacute;kazy vytvořeny pouze jednou a přizpůsobov&aacute;ny pro každou &uacute;roveň. V&yacute;stup SolidCAMu je velmi efektivn&iacute;.&nbsp; Je-li jedna obr&aacute;běc&iacute; operace prov&aacute;děna několikr&aacute;t, př&iacute;kazy jsou ve v&yacute;stupu zaznamen&aacute;ny pouze jednou, č&iacute;mž se minimalizuje d&eacute;lka programu. V jin&yacute;ch CAM syst&eacute;mech se př&iacute;kazy často vypisuj&iacute; opakovaně, což vede k dlouh&eacute;mu a nestrukturovan&eacute;mu CNC programu.</p>\r\n\r\n<p>Dal&scaron;&iacute; v&yacute;znamnou v&yacute;hodou je srozumitelnost NC programu, generovan&eacute;ho SolidCAMem, protože m&aacute; stejnou strukturu, jako NC program programovan&yacute; manu&aacute;lně obsluhou CNC stroje.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<div class=\"csc-header csc-header-n1\" style=\"margin: 0px; padding: 0px; color: rgb(89, 89, 89); font-family: \">\r\n<h2><span style=\"color:#B22222\"><strong><span style=\"font-family:arial,helvetica,sans-serif\"><span style=\"font-size:26px\">Technick&aacute; podpora SolidCAMu</span></span></strong></span></h2>\r\n</div>\r\n\r\n<p><span style=\"font-family:arial,helvetica,sans-serif\">Bez ohľadu nato, ako&nbsp;je CAM syst&eacute;m kvalitn&yacute;, k&nbsp;&uacute;spě&scaron;n&eacute;mu už&iacute;vaniu potrebujete&nbsp;podporu a z&aacute;zemie odborn&eacute;ho t&iacute;mu techniov. K&nbsp;prioritn&iacute;mu čerp&aacute;n&iacute; technick&eacute; podpory v&aacute;s opravňuje tzv. předplacen&aacute; &uacute;držba software (subscription service), kterou si můžete objednat u sv&eacute;ho dodavatele SolidCAMu. Předplacen&aacute; &uacute;držba je časově omezen&aacute; služba, jej&iacute;ž trv&aacute;n&iacute; je standardně dvan&aacute;ct měs&iacute;ců.</span></p>\r\n\r\n<p><br />\r\n<span style=\"font-family:arial,helvetica,sans-serif\">Uživateľ&nbsp;s&nbsp;predplatenou podporou m&aacute; n&aacute;rok na:</span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-family:arial,helvetica,sans-serif\">Registr&aacute;ciu na str&aacute;nkach&nbsp;<a href=\"http://www.solidcam.cz/\" style=\"color: rgb(51, 102, 153); text-decoration: none;\"><strong>www.solidcam.cz</strong></a></span></li>\r\n	<li><span style=\"font-family:arial,helvetica,sans-serif\">Sťahovanie&nbsp;aktualiz&aacute;ci&iacute; (nov&yacute;ch verz&iacute; alebo servisn&yacute;ch bal&iacute;čkov) SolidCAMu</span></li>\r\n	<li><span style=\"font-family:arial,helvetica,sans-serif\">Hot-line telefonickou podporu&nbsp;</span></li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<div class=\"csc-default csc-content csc-layout-0 csc-frame-0 csc-type-header\" id=\"c56720\" style=\"margin: 0px 0px 20px; padding: 0px; color: rgb(89, 89, 89); font-family: \">\r\n<div class=\"csc-header csc-header-n1\" style=\"margin: 0px; padding: 0px;\">\r\n<h2><strong><span style=\"color:#B22222\"><span style=\"font-family:arial,helvetica,sans-serif\"><span style=\"font-size:26px\">Syst&eacute;mov&eacute; požiadavky</span></span></span></strong></h2>\r\n</div>\r\n</div>\r\n\r\n<div class=\"csc-default csc-content csc-layout-0 csc-frame-0 csc-type-html\" id=\"c56721\" style=\"margin: 0px 0px 20px; padding: 0px; color: rgb(89, 89, 89); font-family: \">\r\n<ul>\r\n	<li><span style=\"font-family:arial,helvetica,sans-serif\">Microsoft &reg; Windows 8.1 (s posledn&yacute;m Service packom); Microsoft&reg; Windows 7 (s posledn&yacute;m Service packom)</span></li>\r\n	<li><span style=\"font-family:arial,helvetica,sans-serif\">Intel&reg; Xeon &trade;, Intel&reg; Core &trade;, Intel&reg; Core &trade; 2 Duo, Intel&reg; Core &trade; 2 Quad alebo vy&scaron;&scaron;&iacute; (Akon&aacute;hle použ&iacute;vate in&yacute; procesor, tak nenesieme žiadnu zodpovednosť a neposkytujeme podporu)</span></li>\r\n	<li><span style=\"font-family:arial,helvetica,sans-serif\">4 GB RAM (pre spracovanie veľk&yacute;ch s&uacute;čast&iacute; doporučujeme 8 GB RAM (alebo viac)</span></li>\r\n	<li><span style=\"font-family:arial,helvetica,sans-serif\">15 GB voľn&eacute;ho miesta na disku pre in&scaron;tal&aacute;ciu</span></li>\r\n	<li><span style=\"font-family:arial,helvetica,sans-serif\">Pevn&yacute; disk s minim&aacute;lne 100 GB</span></li>\r\n	<li><span style=\"font-family:arial,helvetica,sans-serif\">Grafickou kartu NVIDIA&reg; aktu&aacute;lna s&eacute;ria Quadro s min. 512 MB (1024 MB doporučujeme) a aktu&aacute;lny certifikovan&yacute; ovl&aacute;dač (Pri použit&iacute; in&yacute;ch grafick&yacute;ch kariet nenesieme žiadnu zodpovednosť a neposkytujeme žiadnu podporu)</span></li>\r\n	<li><span style=\"font-family:arial,helvetica,sans-serif\">Rozl&iacute;&scaron;enie obrazovky 1,280 x 1,024 alebo vy&scaron;&scaron;ie</span></li>\r\n	<li><span style=\"font-family:arial,helvetica,sans-serif\">Microsoft&reg; Direct3D 9&reg; alebo kompatibiln&uacute; grafick&uacute; kartu (Microsoft&reg; Direct3D 11&reg; alebo vy&scaron;&scaron;iu)</span></li>\r\n	<li><span style=\"font-family:arial,helvetica,sans-serif\">USB 2.0</span></li>\r\n	<li><span style=\"font-family:arial,helvetica,sans-serif\">DVD mechaniku</span></li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<div class=\"csc-default  container\" id=\"c24827\" style=\"box-sizing: border-box; margin-right: auto; margin-left: auto; padding-left: 15px; padding-right: 15px; width: 1170px; clear: both; padding-bottom: 30px; color: rgb(34, 34, 34); font-family: \">\r\n<div class=\"csc-header csc-header-n1\" style=\"box-sizing: border-box; margin: 0px;\">\r\n<h1><strong><span style=\"color:#B22222\"><span style=\"font-family:arial,helvetica,sans-serif\"><span style=\"font-size:26px\">Predplatn&eacute; SolidCAMu</span></span></span></strong></h1>\r\n</div>\r\n</div>\r\n\r\n<div class=\"csc-default  container\" id=\"c24837\" style=\"box-sizing: border-box; margin-right: auto; margin-left: auto; padding-left: 15px; padding-right: 15px; width: 1170px; clear: both; padding-bottom: 30px; color: rgb(34, 34, 34); font-family: \">\r\n<div class=\"row webt-column-row webt-fade-start\" style=\"box-sizing: border-box; margin-left: -15px; margin-right: -15px;\">\r\n<div class=\"col-sm-7      first\" style=\"box-sizing: border-box; position: relative; min-height: 1px; padding-left: 15px; padding-right: 15px; float: left; width: 682.5px;\">\r\n<div class=\"webt-column\" style=\"box-sizing: border-box; margin-bottom: 30px;\">\r\n<div class=\"csc-default csc-space-after-50\" id=\"c24828\" style=\"box-sizing: border-box; margin-bottom: 50px !important; clear: both;\">\r\n<div class=\"csc-header csc-header-n1\" style=\"box-sizing: border-box; margin: 0px;\">\r\n<h2><span style=\"font-size:20px\"><strong><span style=\"font-family:arial,helvetica,sans-serif\">Předplatn&eacute; - cesta k podpoře a aktu&aacute;ln&iacute;m updatům</span></strong></span></h2>\r\n</div>\r\n\r\n<p><span style=\"font-family:arial,helvetica,sans-serif\">&Uacute;spě&scaron;n&iacute; z&aacute;kazn&iacute;ci SolidCAMu obnovuj&iacute; každ&yacute; rok sv&eacute; předplatn&eacute;, aby dos&aacute;hli nejvy&scaron;&scaron;&iacute; efektivity sv&yacute;ch investic do softwaru.</span></p>\r\n\r\n<p><span style=\"font-size:14px\"><span style=\"font-family:arial,helvetica,sans-serif\"><strong>Profitujte z těchto skvěl&yacute;ch v&yacute;hod předplatn&eacute;ho:</strong></span></span></p>\r\n\r\n<ul>\r\n	<li>\r\n	<h4><span style=\"font-size:20px\"><span style=\"color:#B22222\"><span style=\"font-family:arial,helvetica,sans-serif\">Funkce v nejnověj&scaron;&iacute;ch verz&iacute;ch (SolidCAM 2015)</span></span></span></h4>\r\n	</li>\r\n</ul>\r\n\r\n<p style=\"margin-left:40px\"><span style=\"font-size:12px\"><span style=\"font-family:arial,helvetica,sans-serif\">T&iacute;m že m&aacute;te na&scaron;i nejnověj&scaron;&iacute; verzi, tak těž&iacute;te z přidan&yacute;ch vlastnost&iacute; a funkc&iacute;, kter&eacute; přid&aacute;v&aacute;me na z&aacute;kladě pokroku CNC obr&aacute;běn&iacute; a podle zpětn&eacute; vazby od na&scaron;ich uživatelů.​</span></span></p>\r\n\r\n<ul>\r\n	<li>\r\n	<h4><span style=\"font-size:20px\"><span style=\"color:#B22222\"><span style=\"font-family:arial,helvetica,sans-serif\">M&aacute;te možnost přid&aacute;vat nov&eacute; moduly (např. revolučn&iacute; iMachining)</span></span></span></h4>\r\n	</li>\r\n</ul>\r\n\r\n<p style=\"margin-left:40px\"><span style=\"font-family:arial,helvetica,sans-serif\">Možnost dokoupit si nov&eacute; moduly, např&iacute;klad iMachining SolidCAMu, kter&yacute; funguje pouze v nejnověj&scaron;&iacute; verzi.</span></p>\r\n\r\n<ul>\r\n	<li>\r\n	<h4><span style=\"font-size:20px\"><span style=\"color:#B22222\"><span style=\"font-family:arial,helvetica,sans-serif\">Siln&aacute; technick&aacute; podpora</span></span></span></h4>\r\n	</li>\r\n</ul>\r\n\r\n<p style=\"margin-left:40px\"><span style=\"font-family:arial,helvetica,sans-serif\">Př&iacute;stup na&scaron;&iacute; živ&eacute; online podpoře a na&scaron;&iacute; mezin&aacute;rodn&iacute; asistenčn&iacute; službě</span></p>\r\n\r\n<ul>\r\n	<li>\r\n	<h4><span style=\"font-size:20px\"><span style=\"color:#B22222\"><span style=\"font-family:arial,helvetica,sans-serif\">Podrobn&aacute; technick&aacute; dokumentace a nahr&aacute;vky vide&iacute;</span></span></span></h4>\r\n	</li>\r\n</ul>\r\n\r\n<p style=\"margin-left:40px\"><span style=\"font-family:arial,helvetica,sans-serif\">Př&iacute;stup na&scaron;&iacute; podrobn&eacute; v&yacute;ukov&eacute; dokumentaci a nahr&aacute;vk&aacute;m Profesora SolidCAMu a webin&aacute;řům.</span></p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n', '', '', '', '', 0, 2, '', 0, 1, 0),
(13078, '', '131', 'sitemap', 'Prečo SolidCAM?', 'preco-solidcam', 0, 0, '272', '2017-03-02 10:19:24', '2017-03-02 10:26:50', '2017-03-02 10:19:00', 0, '', '<p><span style=\"color:#800000\"><span style=\"font-size:28px\"><span style=\"font-family:arial,helvetica,sans-serif\"><strong>SolidCAM je &scaron;pičkov&eacute; integrovan&eacute; rie&scaron;enie CAM s &uacute;žasnou technol&oacute;giou iMachining</strong></span></span></span></p>\r\n\r\n<p><span style=\"font-size:20px\"><span style=\"font-family:arial,helvetica,sans-serif\">Z&iacute;skajte prvotriedne rie&scaron;enie CAM pre efekt&iacute;vne a ziskov&eacute; CNC programovanie, ktor&eacute; je priamo v CAD softv&eacute;ri</span></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"font-size:24px\"><strong><span style=\"font-family:arial,helvetica,sans-serif\">&Uacute;žasn&aacute; technol&oacute;gia iMachining ..</span></strong></span></p>\r\n\r\n<p><span style=\"font-size:16px\"><span style=\"font-family:arial,helvetica,sans-serif\">SolidCAM poskytuje veľmi hodnotn&uacute;, revolučn&uacute;&nbsp;a &uacute;žasn&uacute; technol&oacute;giu <span style=\"color:#FF0000\">iMachining</span></span></span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:16px\"><span style=\"font-family:arial,helvetica,sans-serif\">iMachining &scaron;etr&iacute; <strong>70% a&nbsp;viac času CNC obr&aacute;bania</strong></span></span></li>\r\n</ul>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:16px\"><span style=\"font-family:arial,helvetica,sans-serif\">iMachining <strong>v&yacute;razne predlžuje životnosť n&aacute;stroja</strong></span></span></li>\r\n</ul>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:16px\"><span style=\"font-family:arial,helvetica,sans-serif\"><span style=\"font-family:arial,helvetica,sans-serif\">Jedinečn&yacute; <span style=\"color:#FF0000\">Sprievodca technol&oacute;gi&iacute;</span>, iMachining posyktuje<strong> optim&aacute;lne rezn&eacute; podmienky</strong>, kde berie do &uacute;vahy<strong> tvar dr&aacute;hy n&aacute;stroja, materi&aacute;l n&aacute;stroja&nbsp;a polotovaru&nbsp;a &scaron;pecifik&aacute; CNC stroja</strong></span></span></span></li>\r\n</ul>\r\n\r\n<p><span style=\"font-size:16px\"><span style=\"font-family:arial,helvetica,sans-serif\">S iMachiningom&nbsp;bud&uacute; va&scaron;e CNC stroje ziskovej&scaron;ie a konkurencie schopnej&scaron;ie než kedykoľvek predt&yacute;m. Patentovan&yacute; iMachining je &uacute;plne jedinečn&yacute; ako v dr&aacute;he n&aacute;stroja tak v sp&ocirc;sobe programovania pomocou patentovan&eacute;ho Sprievodca technol&oacute;gi&iacute;.</span></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"font-size:24px\"><span style=\"font-family:arial,helvetica,sans-serif\"><strong>Kompletn&eacute; rie&scaron;enie CAM, ktor&eacute; je hladko integrovan&eacute; v SolidWorks a Autodesk Inventore</strong></span></span></p>\r\n\r\n<p><span style=\"font-size:16px\"><span style=\"font-family:arial,helvetica,sans-serif\">SolidCAM pracuje priamo vo vn&uacute;tri v&aacute;&scaron;ho už existuj&uacute;ceho CAD syst&eacute;mu <strong>SolidWorks </strong>alebo <strong>Autodesk Inventor</strong> a je tam <strong>hladko integrovan&yacute;</strong> s <strong>plnou asociativita dr&aacute;hy n&aacute;stroja</strong> - zmeny v kon&scaron;trukcii spustia automatick&uacute; aktualiz&aacute;ciu dr&aacute;hy n&aacute;stroja podľa modelu CAD.</span></span></p>\r\n\r\n<p><span style=\"font-size:16px\"><span style=\"font-family:arial,helvetica,sans-serif\">Pomocou<strong> integr&aacute;cie v jednom okne</strong> s&uacute; v&scaron;etky oper&aacute;cie obr&aacute;bania definovan&eacute; a verifikovan&eacute; bez toho, aby ste opustili prostredie parametrickej&nbsp;zostavy CAD, ktor&eacute; ste už použ&iacute;vali.</span></span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:16px\"><span style=\"font-family:arial,helvetica,sans-serif\">Poskytuje <span style=\"color:#FF0000\">kompletn&eacute; rie&scaron;enie CAM</span> pre v&scaron;etky CNC aplik&aacute;cie</span></span></li>\r\n</ul>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:16px\"><span style=\"font-family:arial,helvetica,sans-serif\"><strong>Pracujete priamo vo vn&uacute;tri v&aacute;&scaron;ho už existuj&uacute;ceho CAD syst&eacute;mu</strong>: Hladk&aacute; integr&aacute;cia ako v SolidWorks tak Autodesk Inventore</span></span></li>\r\n</ul>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:16px\"><span style=\"font-family:arial,helvetica,sans-serif\">&Scaron;etr&iacute; čas a nepodarky: <strong>Eliminuje probl&eacute;my pri importe / exporte</strong></span></span></li>\r\n</ul>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:16px\"><span style=\"font-family:arial,helvetica,sans-serif\"><strong>R&yacute;chlo sa nauč&iacute;te programovať</strong>: Extr&eacute;mne ľahk&eacute; naučenie sa, pretože ste už obozn&aacute;men&iacute; s rozhran&iacute;m SolidCAMu, pretože ten bež&iacute; priamo vo vn&uacute;tri v&aacute;&scaron;ho zn&aacute;meho CAD syst&eacute;mu</span></span></li>\r\n</ul>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:16px\"><span style=\"font-family:arial,helvetica,sans-serif\"><strong>Z&iacute;skajte &uacute;pln&yacute; prehľad</strong>: SolidCAM pracuje v zostave CAD, kde v grafike vid&iacute;te simul&aacute;ciu up&iacute;načov, držiakov a zver&aacute;kov</span></span></li>\r\n</ul>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:16px\"><span style=\"font-family:arial,helvetica,sans-serif\"><strong>SolidCAM rastie s vami</strong>: SolidCAM jr možn&eacute; roz&scaron;&iacute;riť pomocou modulov pre v&scaron;etky aplik&aacute;cie a typy CNC strojov</span></span></li>\r\n</ul>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:16px\"><span style=\"font-family:arial,helvetica,sans-serif\"><strong>Zo SolidCAMom&nbsp;z&iacute;skate za svoje peniaze čo najviac</strong>: Integrovan&eacute; CAD / CAM rie&scaron;enie SOLIDWORKS + SolidCAM m&ocirc;žete mať za bezkonkurenčn&uacute; cenu v jednom balen&iacute;</span></span></li>\r\n</ul>\r\n', '', '', '', '', 0, 2, '', 0, 1, 0),
(13079, '', '140', 'post', 'Asistent výkonného riaditeľa', 'asistentka', 0, 0, '', '2017-03-02 10:47:41', '2017-03-02 10:48:12', '2017-03-02 10:47:00', 0, '', '<p><strong>meno</strong>: Ing. Zuzana Honzov&aacute;<br />\r\n<strong>tel. c.:</strong> +421 2/638 134 78<br />\r\n<strong>email:</strong> zuzana.honzova@osmos.sk</p>\r\n', '', '', '', '', 0, 1, '', 0, 1, 0),
(13080, '', '140', 'post', 'Projektový manažér', 'projekt-manazer', 0, 0, '', '2017-03-02 10:48:23', '2017-03-02 10:48:53', '2017-03-02 10:48:00', 0, '', '<p><strong>meno</strong>: Ing. Marian Zimmermann<br />\r\n<strong>tel. c.:</strong> +421 917 445 100<br />\r\n<strong>email:</strong>&nbsp;marian.zimmermann@osmos.sk</p>\r\n', '', '', '', '', 0, 1, '', 0, 1, 0),
(13081, '', '140', 'post', 'Manažérka pre výrobu', 'manazerka-pre-kooperacie', 0, 0, '', '2017-03-02 10:49:05', '2017-03-02 10:49:32', '2017-03-02 10:49:00', 0, '', '<p><strong>meno</strong>: Monika Blahov&aacute;<br />\r\n<strong>tel. c.:</strong>&nbsp;+421 918 618 075<br />\r\n<strong>email:</strong>&nbsp;monika.horvayova@osmos.sk</p>\r\n', '', '', '', '', 0, 1, '', 0, 1, 0),
(13082, '', '140', 'post', 'Manažér kvality', 'obchodny-manazer', 0, 0, '', '2017-03-02 10:49:49', '2017-03-02 10:50:31', '2017-03-02 10:49:00', 0, '', '<p><strong>meno</strong>: Ing. Luk&aacute;&scaron; Korenko<br />\r\n<strong>tel. c.:</strong> +421 918 938 276<br />\r\n<strong>email:</strong>&nbsp;lukas.korenko@osmos.sk</p>\r\n', '', '', '', '', 0, 1, '', 0, 1, 0),
(13083, '', '140', 'post', 'Technik CAD/CAM', 'technik-cad-cam', 0, 0, '', '2017-03-02 10:50:51', '2017-03-02 10:51:09', '2017-03-02 10:50:00', 0, '', '<p><strong>meno</strong>: Ing. J&aacute;n Koll&aacute;r<br />\r\n<strong>tel. c.:</strong>&nbsp;+421 917 445 101<br />\r\n<strong>email:</strong>&nbsp;jan.kollar@osmos.sk</p>\r\n', '', '', '', '', 0, 1, '', 0, 1, 0),
(13084, '', '140', 'post', 'Obchodný manažér PDC', 'obchodny-manazer-pdc', 0, 0, '', '2017-03-02 10:51:23', '2017-03-02 10:51:45', '2017-03-02 10:51:00', 0, '', '<p><strong>meno</strong><span style=\"color:rgb(136, 136, 136); font-family:roboto slab,sans-serif; font-size:14px\">: Bc. Roman Furo</span><br />\r\n<strong>tel. c.:</strong><span style=\"color:rgb(136, 136, 136); font-family:roboto slab,sans-serif; font-size:14px\">&nbsp;+421 918 963 811</span><br />\r\n<strong>email:</strong><span style=\"color:rgb(136, 136, 136); font-family:roboto slab,sans-serif; font-size:14px\">&nbsp;roman.furo@osmos.sk</span></p>\r\n', '', '', '', '', 0, 1, '', 0, 1, 0),
(13085, '', '140', 'post', 'Konzultant PDC', 'konzultant-pdc', 0, 0, '', '2017-03-02 10:52:01', '2017-03-02 10:52:18', '2017-03-02 10:52:00', 0, '', '<p><strong>meno</strong><span style=\"color:rgb(136, 136, 136); font-family:roboto slab,sans-serif; font-size:14px\">: Ing.Juraj Goljer</span><br />\r\n<strong>tel. c.:</strong><span style=\"color:rgb(136, 136, 136); font-family:roboto slab,sans-serif; font-size:14px\">&nbsp;+421 918 829 990</span><br />\r\n<strong>email:</strong><span style=\"color:rgb(136, 136, 136); font-family:roboto slab,sans-serif; font-size:14px\">&nbsp;juraj.goljer@osmos.sk</span></p>\r\n', '', '', '', '', 0, 1, '', 0, 1, 0),
(13086, '', '141', 'post', 'metsa tissue', 'http://www.metsatissue.com/en/Pages/default.aspx', 0, 0, '273', '2017-03-02 14:59:36', '2017-03-02 15:00:08', '2017-03-02 14:59:00', 0, '', '', '', '', '', '', 0, 1, '', 0, 1, 0),
(13087, '', '141', 'post', 'ISCAR', 'http://www.iscar.sk/index.aspx/countryid/12', 0, 0, '274', '2017-03-02 15:03:02', '2017-03-02 15:03:31', '2017-03-02 15:03:00', 0, '', '', '', '', '', '', 0, 1, '', 0, 1, 0),
(13088, '', '141', 'post', 'solidCAM', 'http://solidcam.cz/', 0, 0, '275', '2017-03-02 15:07:49', '2017-03-02 15:08:15', '2017-03-02 15:07:00', 0, '', '', '', '', '', '', 0, 1, '', 0, 1, 0),
(13089, '', '141', 'post', 'J P Plast', 'http://jpplast.eu/sk/', 0, 0, '276', '2017-03-02 15:12:21', '2017-03-02 15:13:01', '2017-03-02 15:12:00', 0, '', '', '', '', '', '', 0, 1, '', 0, 1, 0),
(13090, '', '141', 'post', 'inventive', 'http://www.inventive.sk/', 0, 0, '277', '2017-03-02 15:13:56', '2017-03-02 15:14:46', '2017-03-02 15:13:00', 0, '', '', '', '', '', '', 0, 1, '', 0, 1, 0),
(13091, '', '141', 'post', 'lph', 'http-www-lph-sk', 0, 0, '278', '2017-03-02 15:16:03', '2017-03-02 15:16:28', '2017-03-02 15:16:00', 0, '', '', '', '', '', '', 0, 1, '', 0, 1, 0),
(13092, '', '141', 'post', 'cimco', 'http://www.cimco.com/', 0, 0, '279', '2017-03-02 15:17:03', '2017-03-02 15:17:36', '2017-03-02 15:17:00', 0, '', '', '', '', '', '', 0, 1, '', 0, 1, 0),
(13093, '', '131', 'sitemap', 'Fakturačné údaje', 'fakturacne-udaje', 0, 0, '', '2017-03-03 08:36:12', '2017-03-03 08:37:02', '2017-03-03 08:36:00', 0, '', '<p><span style=\"font-size:14px\"><span style=\"font-family:arial,helvetica,sans-serif\"><strong>S&iacute;dlo spoločnosti, fakturačn&aacute; adresa:</strong></span></span></p>\r\n\r\n<p><br />\r\n<span style=\"font-size:14px\"><span style=\"font-family:arial,helvetica,sans-serif\"><strong>OSMOS s.r.o.</strong><br />\r\nPečnianska 31<br />\r\n851 01 Bratislava<br />\r\nSlovensk&aacute; republika</span></span><br />\r\n&nbsp;</p>\r\n\r\n<p><span style=\"font-size:14px\"><span style=\"font-family:arial,helvetica,sans-serif\"><strong>Kancel&aacute;rie, po&scaron;tov&eacute; adresy:</strong></span></span></p>\r\n\r\n<p><span style=\"font-size:14px\"><span style=\"font-family:arial,helvetica,sans-serif\">Gogoľova 18<br />\r\n852 02 Bratislava 5</span></span><br />\r\n<span style=\"font-size:14px\"><span style=\"font-family:arial,helvetica,sans-serif\">Slovensk&aacute; republika<br />\r\n<br />\r\nAndreja Hlinku 20<br />\r\n971 01 Prievidza<br />\r\nSlovensk&aacute; republika<br />\r\n<br />\r\n<strong>IČO:</strong> 35957522<br />\r\n<strong>IČ DPH:</strong> SK2022096252<br />\r\n<br />\r\n<strong>Bankov&eacute; spojenie:</strong>&nbsp;Tatrabanka a.s.<br />\r\n<br />\r\n<strong>Č&iacute;slo &uacute;čtu:</strong> 2623803263 / 1100</span></span></p>\r\n', '', '', '', '', 0, 2, '', 0, 1, 0),
(13094, '', '137', 'post', 'Voľné výrobné kapacity', 'nastrojaren-osmos-sk', 0, 0, '280', '2017-03-03 12:46:59', '2017-03-03 12:48:20', '2017-03-03 12:46:00', 0, '', '<p>Voľn&eacute; v&yacute;robn&eacute; kapacity pre&nbsp;5 os&eacute; fr&eacute;zovanie plynul&eacute;</p>\r\n\r\n<p>&nbsp;</p>\r\n', '', '', '', '', 0, 1, '', 0, 1, 0);

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `dnt_posts_meta`
--

CREATE TABLE `dnt_posts_meta` (
  `id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `key` varchar(300) NOT NULL,
  `value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `dnt_post_type`
--

CREATE TABLE `dnt_post_type` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `sub_cat_id` int(11) NOT NULL,
  `name_url` varchar(300) NOT NULL,
  `admin_cat` varchar(300) NOT NULL,
  `name` varchar(300) NOT NULL,
  `show` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sťahujem dáta pre tabuľku `dnt_post_type`
--

INSERT INTO `dnt_post_type` (`id`, `cat_id`, `sub_cat_id`, `name_url`, `admin_cat`, `name`, `show`, `order`, `vendor_id`, `parent_id`) VALUES
(131, 1, 0, 'sitemap', 'sitemap', 'Stránky', 1, 0, 1, 0),
(132, 1, 0, 'sitemap-sub', 'sitemap', 'Podstránky', 1, 0, 1, 0),
(133, 1, 0, 'article', 'sitemap', 'Články', 1, 0, 1, 0),
(134, 3, 0, 'newsletter', 'post', 'Newslettre', 1, 0, 1, 0),
(135, 2, 0, 'domace', 'article', 'Domáce', 1, 0, 1, 0),
(136, 2, 0, 'zahranicne', 'article', 'Zahraničné', 1, 0, 1, 0),
(137, 3, 0, 'sliders', 'post', 'Sliders', 1, 0, 1, 0),
(138, 3, 0, 'texty-na-homepage', 'post', 'Texty na homepage', 1, 0, 1, 0),
(139, 3, 0, 'slider-page', 'post', 'Sliders na stránke', 1, 0, 1, 0),
(140, 3, 0, 'personal', 'post', 'Personál', 1, 0, 1, 0),
(141, 3, 0, 'partneri', 'post', 'Partneri', 1, 0, 1, 0),
(295, 1, 0, 'admin', 'user', 'Administratori', 1, 0, 1, 0);

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `dnt_settings`
--

CREATE TABLE `dnt_settings` (
  `id` int(11) NOT NULL,
  `key` varchar(300) NOT NULL,
  `value` varchar(300) NOT NULL,
  `vendor_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Sťahujem dáta pre tabuľku `dnt_settings`
--

INSERT INTO `dnt_settings` (`id`, `key`, `value`, `vendor_id`) VALUES
(846, 'title', 'Osmos', 1),
(847, 'keywords', 'osmos, pdc', 1),
(848, 'cachovanie', '0', 1),
(849, 'server', 'http://prvedentalnecentrum.sk/', 1),
(850, 'startovaci_modul', '', 1),
(851, 'target', '', 1),
(852, 'facebook_page', 'https://www.facebook.com/osmosbratislava', 1),
(853, 'twitter', 'https://twitter.com/', 1),
(854, 'youtube', 'https://www.youtube.com/', 1),
(855, 'flickr', 'https://www.flickr.com/', 1),
(856, 'linked_in', 'https://www.linkedin.com/', 1),
(857, 'web', '', 1),
(858, 'google_plus', 'https://plus.google.com/', 1),
(859, 'sirka_fotky_sponzori_modul', '200', 1),
(860, 'notifikacny_email', 'thomas.doubek@gmail.com', 1),
(861, 'blokvane_ip', '', 1),
(862, 'vendor_street', '', 1),
(863, 'vendor_company', 'Osmos', 1),
(864, 'vendor_psc', '', 1),
(865, 'vendor_city', '', 1),
(866, 'vendor_tel', '+421 2 6381 3478', 1),
(867, 'vendor_fax', '', 1),
(868, 'vendor_email', 'info@osmos.sk', 1),
(869, 'vendor_ico', '', 1),
(870, 'vendor_dic', '', 1),
(871, 'vendor_iban', '', 1),
(872, 'vendor_dph', '20', 1),
(873, 'vendor_currency', '€', 1),
(874, 'facebook', 'https://www.facebook.com', 1),
(875, 'instagram', 'https://instagram.com/dnt-system/', 1),
(876, 'platca_dph', '1', 1),
(877, 'vendor_currency_nazov', 'Eur', 1),
(878, 'logo_firmy', '257', 1),
(879, 'no_img', '690', 1),
(880, 'no_comment', 'no_comment.png', 1),
(881, 'default_lang', '', 1),
(882, 'default_stat_user', '', 1),
(883, 'google_map', 'https://www.google.sk/maps/@48.2091661,17.0034239,13z?hl=sk', 1),
(884, 'description', 'Osmos s.r.o. - CAD/CAM v oblasti strojárskej výroby. PLM/PDM riešenia pre Vašu výrobu. Kooperácia výroby a vytažovanie výrobných kapacít. Konštrukcia vstrekovacích foriem.', 1);

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `dnt_translates`
--

CREATE TABLE `dnt_translates` (
  `id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `lang_id` varchar(100) NOT NULL,
  `translate_id` varchar(300) NOT NULL,
  `type` varchar(300) NOT NULL,
  `table` varchar(300) NOT NULL,
  `translate` text NOT NULL,
  `show` int(11) NOT NULL DEFAULT '1',
  `parent_id` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sťahujem dáta pre tabuľku `dnt_translates`
--

INSERT INTO `dnt_translates` (`id`, `vendor_id`, `lang_id`, `translate_id`, `type`, `table`, `translate`, `show`, `parent_id`) VALUES
(1, 1, 'sk', 'home', 'static', '', 'Domov', 1, 0),
(2, 1, 'en', 'home', 'static', '', 'Home', 1, 0),
(131, 1, 'sk', 'home', 'static', '', 'Domov', 1, 0),
(132, 1, 'en', 'home', 'static', '', 'Home', 1, 0),
(133, 1, 'en', '4589', 'name', 'dnt_posts', 'About us', 1, 0),
(134, 1, 'en', '4592', 'name', 'dnt_posts', 'About us 2', 1, 0),
(135, 1, 'en', '8972', 'name', 'dnt_posts', 'Test Article', 1, 0),
(136, 1, 'en', '8972', 'name_url', 'dnt_posts', 'test-article', 1, 0),
(137, 1, 'en', '8972', 'perex', 'dnt_posts', '<p>I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account</p>\r\n', 1, 0),
(138, 1, 'en', '8972', 'content', 'dnt_posts', '<p>I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account</p>\r\n', 1, 0),
(139, 1, 'en', '8972', 'tags', 'dnt_posts', 'car,test', 1, 0),
(140, 1, 'de', '8972', 'name', 'dnt_posts', 'Ta test', 1, 0),
(141, 1, 'de', '8972', 'name_url', 'dnt_posts', 'ta-test', 1, 0),
(142, 1, 'de', '8972', 'perex', 'dnt_posts', '<p>I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account</p>\r\n', 1, 0),
(143, 1, 'de', '8972', 'content', 'dnt_posts', '<p>I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account</p>\r\n', 1, 0),
(144, 1, 'de', '8972', 'tags', 'dnt_posts', 'das auto, das test', 1, 0),
(145, 1, 'en', '10498', 'name', 'dnt_posts', '', 1, 0),
(146, 1, 'en', '10498', 'name_url', 'dnt_posts', '', 1, 0),
(147, 1, 'en', '10498', 'perex', 'dnt_posts', '', 1, 0),
(148, 1, 'en', '10498', 'content', 'dnt_posts', '', 1, 0),
(149, 1, 'en', '10498', 'tags', 'dnt_posts', '', 1, 0),
(150, 1, 'de', '10498', 'name', 'dnt_posts', '', 1, 0),
(151, 1, 'de', '10498', 'name_url', 'dnt_posts', '', 1, 0),
(152, 1, 'de', '10498', 'perex', 'dnt_posts', '', 1, 0),
(153, 1, 'de', '10498', 'content', 'dnt_posts', '', 1, 0),
(154, 1, 'de', '10498', 'tags', 'dnt_posts', '', 1, 0),
(415, 1, 'en', '13064', 'name', 'dnt_posts', '', 1, 0),
(416, 1, 'en', '13064', 'name_url', 'dnt_posts', '', 1, 0),
(417, 1, 'en', '13064', 'perex', 'dnt_posts', '', 1, 0),
(418, 1, 'en', '13064', 'content', 'dnt_posts', '', 1, 0),
(419, 1, 'en', '13064', 'tags', 'dnt_posts', '', 1, 0),
(420, 1, 'de', '13064', 'name', 'dnt_posts', '', 1, 0),
(421, 1, 'de', '13064', 'name_url', 'dnt_posts', '', 1, 0),
(422, 1, 'de', '13064', 'perex', 'dnt_posts', '', 1, 0),
(423, 1, 'de', '13064', 'content', 'dnt_posts', '', 1, 0),
(424, 1, 'de', '13064', 'tags', 'dnt_posts', '', 1, 0),
(435, 1, 'en', '13065', 'name', 'dnt_posts', 'cfhfghg', 1, 0),
(436, 1, 'en', '13065', 'name_url', 'dnt_posts', '', 1, 0),
(437, 1, 'en', '13065', 'perex', 'dnt_posts', '', 1, 0),
(438, 1, 'en', '13065', 'content', 'dnt_posts', '', 1, 0),
(439, 1, 'en', '13065', 'tags', 'dnt_posts', '', 1, 0),
(440, 1, 'de', '13065', 'name', 'dnt_posts', '', 1, 0),
(441, 1, 'de', '13065', 'name_url', 'dnt_posts', '', 1, 0),
(442, 1, 'de', '13065', 'perex', 'dnt_posts', '', 1, 0),
(443, 1, 'de', '13065', 'content', 'dnt_posts', '', 1, 0),
(444, 1, 'de', '13065', 'tags', 'dnt_posts', '', 1, 0),
(455, 1, 'en', '13066', 'name', 'dnt_posts', '', 1, 0),
(456, 1, 'en', '13066', 'name_url', 'dnt_posts', '', 1, 0),
(457, 1, 'en', '13066', 'perex', 'dnt_posts', '', 1, 0),
(458, 1, 'en', '13066', 'content', 'dnt_posts', '', 1, 0),
(459, 1, 'en', '13066', 'tags', 'dnt_posts', '', 1, 0),
(460, 1, 'de', '13066', 'name', 'dnt_posts', '', 1, 0),
(461, 1, 'de', '13066', 'name_url', 'dnt_posts', '', 1, 0),
(462, 1, 'de', '13066', 'perex', 'dnt_posts', '', 1, 0),
(463, 1, 'de', '13066', 'content', 'dnt_posts', '', 1, 0),
(464, 1, 'de', '13066', 'tags', 'dnt_posts', '', 1, 0),
(475, 1, 'en', '13063', 'name', 'dnt_posts', '', 1, 0),
(476, 1, 'en', '13063', 'name_url', 'dnt_posts', '', 1, 0),
(477, 1, 'en', '13063', 'perex', 'dnt_posts', '', 1, 0),
(478, 1, 'en', '13063', 'content', 'dnt_posts', '', 1, 0),
(479, 1, 'en', '13063', 'tags', 'dnt_posts', '', 1, 0),
(480, 1, 'de', '13063', 'name', 'dnt_posts', '', 1, 0),
(481, 1, 'de', '13063', 'name_url', 'dnt_posts', '', 1, 0),
(482, 1, 'de', '13063', 'perex', 'dnt_posts', '', 1, 0),
(483, 1, 'de', '13063', 'content', 'dnt_posts', '', 1, 0),
(484, 1, 'de', '13063', 'tags', 'dnt_posts', '', 1, 0),
(485, 1, 'en', '13067', 'name', 'dnt_posts', 'Tooling & Molding<br/> ', 1, 0),
(486, 1, 'en', '13067', 'name_url', 'dnt_posts', '', 1, 0),
(487, 1, 'en', '13067', 'perex', 'dnt_posts', '<p>In 2016 we decided to expand the scope of the company in Bytča, we opened a new technology center for the production and treatment of injection molds for plastics.</p>\r\n', 1, 0),
(488, 1, 'en', '13067', 'content', 'dnt_posts', '', 1, 0),
(489, 1, 'en', '13067', 'tags', 'dnt_posts', '', 1, 0),
(490, 1, 'de', '13067', 'name', 'dnt_posts', 'Werkzeug- und Vorrichtungsbau', 1, 0),
(491, 1, 'de', '13067', 'name_url', 'dnt_posts', '', 1, 0),
(492, 1, 'de', '13067', 'perex', 'dnt_posts', '<p>Dieser Beitrag hat keine Vorschau Artikel, weil ihr Inhalt ist wahrscheinlich von multymedi&aacute;lneho Inhalt bestehen. Bitte klicken um mehr zu lesen und Sie k&ouml;nnen den gew&auml;hlten Inhalt zu sehen.</p>\r\n', 1, 0),
(493, 1, 'de', '13067', 'content', 'dnt_posts', '', 1, 0),
(494, 1, 'de', '13067', 'tags', 'dnt_posts', '', 1, 0),
(495, 1, 'en', '13068', 'name', 'dnt_posts', '', 1, 0),
(496, 1, 'en', '13068', 'name_url', 'dnt_posts', '', 1, 0),
(497, 1, 'en', '13068', 'perex', 'dnt_posts', '', 1, 0),
(498, 1, 'en', '13068', 'content', 'dnt_posts', '', 1, 0),
(499, 1, 'en', '13068', 'tags', 'dnt_posts', '', 1, 0),
(500, 1, 'de', '13068', 'name', 'dnt_posts', '', 1, 0),
(501, 1, 'de', '13068', 'name_url', 'dnt_posts', '', 1, 0),
(502, 1, 'de', '13068', 'perex', 'dnt_posts', '', 1, 0),
(503, 1, 'de', '13068', 'content', 'dnt_posts', '', 1, 0),
(504, 1, 'de', '13068', 'tags', 'dnt_posts', '', 1, 0),
(505, 1, 'en', '13069', 'name', 'dnt_posts', 'Research & Development<br/> ', 1, 0),
(506, 1, 'en', '13069', 'name_url', 'dnt_posts', '', 1, 0),
(507, 1, 'en', '13069', 'perex', 'dnt_posts', '<p>Today s full-time startups and new technologies have increasingly higher demands on the functionality and efficiency of the solutions available on the market.</p>\r\n', 1, 0),
(508, 1, 'en', '13069', 'content', 'dnt_posts', '', 1, 0),
(509, 1, 'en', '13069', 'tags', 'dnt_posts', '', 1, 0),
(510, 1, 'de', '13069', 'name', 'dnt_posts', 'Forschung und Entwicklung', 1, 0),
(511, 1, 'de', '13069', 'name_url', 'dnt_posts', '', 1, 0),
(512, 1, 'de', '13069', 'perex', 'dnt_posts', '<p>Die heutige Vollzeit Start-ups und neue Technologien haben immer h&ouml;here Anforderungen an die Funktionalit&auml;t und Effizienz der verf&uuml;gbaren L&ouml;sungen auf dem Markt.</p>\r\n', 1, 0),
(513, 1, 'de', '13069', 'content', 'dnt_posts', '', 1, 0),
(514, 1, 'de', '13069', 'tags', 'dnt_posts', '', 1, 0),
(515, 1, 'en', '13071', 'name', 'dnt_posts', 'Research & Development', 1, 0),
(516, 1, 'en', '13071', 'name_url', 'dnt_posts', '', 1, 0),
(517, 1, 'en', '13071', 'perex', 'dnt_posts', '<p>We are constantly looking for better solutions...</p>\r\n', 1, 0),
(518, 1, 'en', '13071', 'content', 'dnt_posts', '', 1, 0),
(519, 1, 'en', '13071', 'tags', 'dnt_posts', '', 1, 0),
(520, 1, 'de', '13071', 'name', 'dnt_posts', 'Forschung und Entwicklung', 1, 0),
(521, 1, 'de', '13071', 'name_url', 'dnt_posts', '', 1, 0),
(522, 1, 'de', '13071', 'perex', 'dnt_posts', '<p>Wir sind st&auml;ndig auf der Suche nach besseren L&ouml;sungen...</p>\r\n', 1, 0),
(523, 1, 'de', '13071', 'content', 'dnt_posts', '', 1, 0),
(524, 1, 'de', '13071', 'tags', 'dnt_posts', '', 1, 0),
(525, 1, 'en', '13072', 'name', 'dnt_posts', 'PDC', 1, 0),
(526, 1, 'en', '13072', 'name_url', 'dnt_posts', '', 1, 0),
(527, 1, 'en', '13072', 'perex', 'dnt_posts', '<p><strong>Plan-de-Campagne</strong><span style=\"font-family:tahoma,geneva,sans-serif; font-size:15.4px\">&nbsp;</span><strong>(PdC)</strong><span style=\"font-family:tahoma,geneva,sans-serif; font-size:15.4px\">&nbsp;is&nbsp;....</span></p>\r\n', 1, 0),
(528, 1, 'en', '13072', 'content', 'dnt_posts', '', 1, 0),
(529, 1, 'en', '13072', 'tags', 'dnt_posts', '', 1, 0),
(530, 1, 'de', '13072', 'name', 'dnt_posts', 'PDC', 1, 0),
(531, 1, 'de', '13072', 'name_url', 'dnt_posts', '', 1, 0),
(532, 1, 'de', '13072', 'perex', 'dnt_posts', '', 1, 0),
(533, 1, 'de', '13072', 'content', 'dnt_posts', '', 1, 0),
(534, 1, 'de', '13072', 'tags', 'dnt_posts', '', 1, 0),
(535, 1, 'en', '13073', 'name', 'dnt_posts', 'Free production capacities', 1, 0),
(536, 1, 'en', '13073', 'name_url', 'dnt_posts', '', 1, 0),
(537, 1, 'en', '13073', 'perex', 'dnt_posts', '<p>Free production capacities for continuouse 5 axis milling</p>\r\n', 1, 0),
(538, 1, 'en', '13073', 'content', 'dnt_posts', '', 1, 0),
(539, 1, 'en', '13073', 'tags', 'dnt_posts', '', 1, 0),
(540, 1, 'de', '13073', 'name', 'dnt_posts', '', 1, 0),
(541, 1, 'de', '13073', 'name_url', 'dnt_posts', '', 1, 0),
(542, 1, 'de', '13073', 'perex', 'dnt_posts', '', 1, 0),
(543, 1, 'de', '13073', 'content', 'dnt_posts', '', 1, 0),
(544, 1, 'de', '13073', 'tags', 'dnt_posts', '', 1, 0),
(19110, 1, 'en', 'header_top_vitajte_1', 'static', '', 'Welcome visitor can you', 1, 0),
(19111, 1, 'en', 'alebo', 'static', '', 'or', 1, 0),
(19112, 1, 'sk', 'header_top_vitajte_1', 'static', '', 'Vitajte zákazník! Chcete sa', 1, 0),
(19113, 1, 'sk', 'alebo', 'static', '', 'alebo', 1, 0),
(19114, 1, 'en', 'prihlasit', 'static', '', 'Login to client zone', 1, 0),
(19115, 1, 'sk', 'prihlasit', 'static', '', 'Prihlásenie do klientskej zóny', 1, 0),
(19116, 1, 'en', 'registrovat', 'static', '', 'Create an Account', 1, 0),
(19117, 1, 'sk', 'registrovat', 'static', '', 'Vytvoriť nový účet', 1, 0),
(19118, 1, 'en', 'moj_ucet', 'static', '', 'My Account', 1, 0),
(19119, 1, 'sk', 'moj_ucet', 'static', '', 'Môj účet', 1, 0),
(19120, 1, 'en', 'nakupny_kosik', 'static', '', 'Orders List', 1, 0),
(19121, 1, 'sk', 'nakupny_kosik', 'static', '', 'Nákupný košík', 1, 0),
(19122, 1, 'en', 'pridat_do_kosika', 'static', '', '+ add to cart', 1, 0),
(19123, 1, 'sk', 'pridat_do_kosika', 'static', '', '+ do košíka', 1, 0),
(19124, 1, 'en', 'zobrazit_ako', 'static', '', 'View as', 1, 0),
(19125, 1, 'sk', 'zobrazit_ako', 'static', '', 'Zobraziť ako', 1, 0),
(19126, 1, 'en', 'kategorie', 'static', '', 'Categories', 1, 0),
(19127, 1, 'sk', 'kategorie', 'static', '', 'Kategórie', 1, 0),
(19128, 1, 'en', 'zdielat', 'static', '', '+ share', 1, 0),
(19129, 1, 'sk', 'zdielat', 'static', '', '+ zdielať', 1, 0),
(19130, 1, 'en', 'prejst_na_produkt', 'static', '', 'Go to the product', 1, 0),
(19131, 1, 'sk', 'prejst_na_produkt', 'static', '', 'Prejsť na produkt', 1, 0),
(19132, 1, 'en', 'pridane', 'static', '', 'Posted', 1, 0),
(19133, 1, 'sk', 'pridane', 'static', '', 'Pridané', 1, 0),
(19134, 1, 'en', 'vysledky', 'static', '', 'Results', 1, 0),
(19135, 1, 'sk', 'vysledky', 'static', '', 'Výsledky', 1, 0),
(19136, 1, 'en', 'z', 'static', '', 'of', 1, 0),
(19137, 1, 'sk', 'z', 'static', '', 'z', 1, 0),
(19138, 1, 'en', 'stran', 'static', '', 'pages', 1, 0),
(19139, 1, 'sk', 'stran', 'static', '', 'strán', 1, 0),
(19140, 1, 'en', 'order_by_news', 'static', '', 'Sort by latest', 1, 0),
(19141, 1, 'sk', 'order_by_news', 'static', '', 'Zoradiť podľa najnovších', 1, 0),
(19142, 1, 'en', 'order_by_ship_asc', 'static', '', 'Sort by cheapest', 1, 0),
(19143, 1, 'sk', 'order_by_ship_asc', 'static', '', 'Zoradiť od najlacnejších', 1, 0),
(19144, 1, 'en', 'order_by_ship_desc', 'static', '', 'Sort by most expensive', 1, 0),
(19145, 1, 'sk', 'order_by_ship_desc', 'static', '', 'Zoradiť od najdrahších', 1, 0),
(19146, 1, 'en', 'order_by_name_a_z', 'static', '', 'Sort by name (A - Z)', 1, 0),
(19147, 1, 'sk', 'order_by_name_a_z', 'static', '', 'Podľa názvu (A - Z)', 1, 0),
(19148, 1, 'en', 'order_by_name_z_a', 'static', '', 'Sort by name (Z - A)', 1, 0),
(19149, 1, 'sk', 'order_by_name_z_a', 'static', '', 'Podľa názvu (Z - A)', 1, 0),
(19150, 1, 'en', 'vyber_znacku', 'static', '', 'Choose a brand', 1, 0),
(19151, 1, 'sk', 'vyber_znacku', 'static', '', 'Vyberte značku', 1, 0),
(19152, 1, 'en', 'nakupny_kosik_je_prazdny', 'static', '', 'Your cart is empty!', 1, 0),
(19153, 1, 'sk', 'nakupny_kosik_je_prazdny', 'static', '', 'Váš nákupný košík je prázdny!', 1, 0),
(19154, 1, 'en', 'nazov_produktu', 'static', '', 'Product Image &amp; Name', 1, 0),
(19155, 1, 'sk', 'nazov_produktu', 'static', '', 'Názov produktu a fotka', 1, 0),
(19156, 1, 'en', 'cena', 'static', '', 'Price', 1, 0),
(19157, 1, 'sk', 'cena', 'static', '', 'Cena', 1, 0),
(19158, 1, 'en', 'pocet_kusov', 'static', '', 'Quantity', 1, 0),
(19159, 1, 'sk', 'pocet_kusov', 'static', '', 'Počet kusov', 1, 0),
(19160, 1, 'en', 'sub_total', 'static', '', 'Overal / items', 1, 0),
(19161, 1, 'sk', 'sub_total', 'static', '', 'Spolu / počet kusov', 1, 0),
(19162, 1, 'en', 'vymazat', 'static', '', 'Remove', 1, 0),
(19163, 1, 'sk', 'vymazat', 'static', '', 'Vymazať', 1, 0),
(19164, 1, 'en', 'upravit', 'static', '', 'Update', 1, 0),
(19165, 1, 'sk', 'upravit', 'static', '', 'Upraviť', 1, 0),
(19166, 1, 'en', 'suma', 'static', '', 'Resulting amount', 1, 0),
(19167, 1, 'sk', 'suma', 'static', '', 'Výsledná suma', 1, 0),
(19168, 1, 'en', 'suma_bez_dph', 'static', '', 'Amount vat', 1, 0),
(19169, 1, 'sk', 'suma_bez_dph', 'static', '', 'Suma bez DPH', 1, 0),
(19170, 1, 'en', 'dan', 'static', '', 'Tax', 1, 0),
(19171, 1, 'sk', 'dan', 'static', '', 'Daň', 1, 0),
(19172, 1, 'en', 'dph', 'static', '', 'VAT', 1, 0),
(19173, 1, 'sk', 'dph', 'static', '', 'DPH', 1, 0),
(19174, 1, 'en', 'dodacie_udaje', 'static', '', 'Shipping information', 1, 0),
(19175, 1, 'sk', 'dodacie_udaje', 'static', '', 'Dodacie údaje', 1, 0),
(19176, 1, 'en', 'prosim_vyplnte_dodacie_udaje', 'static', '', 'Please fill shipping information', 1, 0),
(19177, 1, 'sk', 'prosim_vyplnte_dodacie_udaje', 'static', '', 'Prosím vyplnte dodacie údaje', 1, 0),
(19178, 1, 'en', 'meno', 'static', '', 'Name', 1, 0),
(19179, 1, 'sk', 'meno', 'static', '', 'Meno', 1, 0),
(19180, 1, 'en', 'priezvisko', 'static', '', 'Surname', 1, 0),
(19181, 1, 'sk', 'priezvisko', 'static', '', 'Priezvisko', 1, 0),
(19182, 1, 'en', 'email', 'static', '', 'Email', 1, 0),
(19183, 1, 'sk', 'email', 'static', '', 'Email', 1, 0),
(19184, 1, 'en', 'tel_c', 'static', '', 'Telephone number', 1, 0),
(19185, 1, 'sk', 'tel_c', 'static', '', 'Telefónne číslo', 1, 0),
(19186, 1, 'en', 'ulica', 'static', '', 'Street', 1, 0),
(19187, 1, 'sk', 'ulica', 'static', '', 'Ulica', 1, 0),
(19188, 1, 'en', 'c_domu', 'static', '', 'House number', 1, 0),
(19189, 1, 'sk', 'c_domu', 'static', '', 'Číslo domu', 1, 0),
(19190, 1, 'en', 'psc', 'static', '', 'Postcode', 1, 0),
(19191, 1, 'sk', 'psc', 'static', '', 'Smerovacie číslo (PSČ)', 1, 0),
(19192, 1, 'en', 'sposob_platby', 'static', '', 'Payment method', 1, 0),
(19193, 1, 'sk', 'sposob_platby', 'static', '', 'Spôsob platby', 1, 0),
(19194, 1, 'en', 'sposob_dopravy', 'static', '', 'Transport method / pickup goods', 1, 0),
(19195, 1, 'sk', 'sposob_dopravy', 'static', '', 'Spôsob dopravy / vyzdvihnutie tovaru', 1, 0),
(19196, 1, 'en', 'poznamka', 'static', '', 'Note', 1, 0),
(19197, 1, 'sk', 'poznamka', 'static', '', 'Poznámka', 1, 0),
(19198, 1, 'en', 'pole_je_volitelne', 'static', '', 'The field is optional', 1, 0),
(19199, 1, 'sk', 'pole_je_volitelne', 'static', '', 'Toto pole je voliteľné', 1, 0),
(19200, 1, 'en', 'pole_je_povinne', 'static', '', 'The field is required', 1, 0),
(19201, 1, 'sk', 'pole_je_povinne', 'static', '', 'Toto pole je povinné', 1, 0),
(19202, 1, 'en', 'mesto', 'static', '', 'City', 1, 0),
(19203, 1, 'sk', 'mesto', 'static', '', 'Mesto', 1, 0),
(19204, 1, 'en', 'krajina', 'static', '', 'Country', 1, 0),
(19205, 1, 'sk', 'krajina', 'static', '', 'Štát', 1, 0),
(19206, 1, 'en', 'prosim_vyberte_si', 'static', '', 'Please select', 1, 0),
(19207, 1, 'sk', 'prosim_vyberte_si', 'static', '', 'Prosím vyberte si', 1, 0),
(19208, 1, 'en', 'potvrdit_objednavku', 'static', '', 'Confirm order', 1, 0),
(19209, 1, 'sk', 'potvrdit_objednavku', 'static', '', 'Potvrdiť objednávku', 1, 0),
(19210, 1, 'en', 'registracia', 'static', '', 'Registration', 1, 0),
(19211, 1, 'sk', 'registracia', 'static', '', 'Registrácia', 1, 0),
(19212, 1, 'en', 'chcem_sa_zaregistrovat', 'static', '', 'I want to register for better comfort', 1, 0),
(19213, 1, 'sk', 'chcem_sa_zaregistrovat', 'static', '', 'Chcem sa zaregistrovať a tak nakupovať z pohodlia domova', 1, 0),
(19214, 1, 'en', 'heslo', 'static', '', 'Password', 1, 0),
(19215, 1, 'sk', 'heslo', 'static', '', 'Heslo', 1, 0),
(19216, 1, 'en', 'heslo_overenie', 'static', 'dnt_translates', 'Copy password', 1, 0),
(19217, 1, 'sk', 'heslo_overenie', 'static', 'dnt_translates', 'Overenie hesla', 1, 0),
(19218, 1, 'en', 'zaregistruj_ma', 'static', '', 'Register me', 1, 0),
(19219, 1, 'sk', 'zaregistruj_ma', 'static', '', 'Zaregistruj ma', 1, 0),
(19220, 1, 'en', 'filter', 'static', '', 'Filter', 1, 0),
(19221, 1, 'sk', 'filter', 'static', '', 'Filter', 1, 0),
(19222, 1, 'en', 'rok', 'static', '', 'Year', 1, 0),
(19223, 1, 'sk', 'rok', 'static', '', 'Rok', 1, 0),
(19224, 1, 'en', 'galeria', 'static', '', 'Gallery', 1, 0),
(19225, 1, 'sk', 'galeria', 'static', '', 'Galéria', 1, 0),
(19226, 1, 'en', 'vsetky_albumy', 'static', '', 'All albums', 1, 0),
(19227, 1, 'sk', 'vsetky_albumy', 'static', '', 'Všetky albumy', 1, 0),
(19228, 1, 'en', 'kontakt', 'static', '', 'Contact', 1, 0),
(19229, 1, 'sk', 'kontakt', 'static', '', 'Kontakt', 1, 0),
(19230, 1, 'en', 'kontakt_info', 'static', '', 'Contact Info', 1, 0),
(19231, 1, 'sk', 'kontakt_info', 'static', '', 'Kontaktné informácie', 1, 0),
(19232, 1, 'en', 'kontaktny_formular', 'static', '', 'Contact Form', 1, 0),
(19233, 1, 'sk', 'kontaktny_formular', 'static', '', 'Kontaktný formulár', 1, 0),
(19234, 1, 'en', 'predmet', 'static', '', 'Subject', 1, 0),
(19235, 1, 'sk', 'predmet', 'static', '', 'Predmet', 1, 0),
(19236, 1, 'en', 'sprava', 'static', '', 'Message', 1, 0),
(19237, 1, 'sk', 'sprava', 'static', '', 'Správa', 1, 0),
(19238, 1, 'en', 'odoslat', 'static', '', 'Submit', 1, 0),
(19239, 1, 'sk', 'odoslat', 'static', '', 'Odoslať', 1, 0),
(19240, 1, 'en', 'pondelok', 'static', '', 'Monday', 1, 0),
(19241, 1, 'sk', 'pondelok', 'static', '', 'Pondelok', 1, 0),
(19242, 1, 'en', 'utorok', 'static', '', 'Tuesday', 1, 0),
(19243, 1, 'sk', 'utorok', 'static', '', 'Utorok', 1, 0),
(19244, 1, 'en', 'streda', 'static', '', 'Wednesday', 1, 0),
(19245, 1, 'sk', 'streda', 'static', '', 'Streda', 1, 0),
(19246, 1, 'en', 'stvrtok', 'static', '', 'Thursday', 1, 0),
(19247, 1, 'sk', 'stvrtok', 'static', '', 'Štvrtok', 1, 0),
(19248, 1, 'en', 'piatok', 'static', '', 'Friday', 1, 0),
(19249, 1, 'sk', 'piatok', 'static', '', 'Piatok', 1, 0),
(19250, 1, 'en', 'sobota', 'static', '', 'Saturday', 1, 0),
(19251, 1, 'sk', 'sobota', 'static', '', 'Sobota', 1, 0),
(19252, 1, 'en', 'nedela', 'static', '', 'Sunday', 1, 0),
(19253, 1, 'sk', 'nedela', 'static', '', 'Nedeľa', 1, 0),
(19254, 1, 'en', 'clanky', 'static', '', 'Blog', 1, 0),
(19255, 1, 'sk', 'clanky', 'static', '', 'Články', 1, 0),
(19256, 1, 'en', 'pridane', 'static', '', 'Posted', 1, 0),
(19257, 1, 'sk', 'pridane', 'static', '', 'Pridané', 1, 0),
(19258, 1, 'en', 'hlaska_pocet_komentarov', 'static', '', 'comment(s) in this post', 1, 0),
(19259, 1, 'sk', 'hlaska_pocet_komentarov', 'static', '', 'komentárov v tomto príspevku', 1, 0),
(19260, 1, 'en', 'hodnotenie_postu_hlaska', 'static', '', 'Automatic post assessment', 1, 0),
(19261, 1, 'sk', 'hodnotenie_postu_hlaska', 'static', '', 'Automatické hodnotenie príspevku', 1, 0),
(19262, 1, 'en', 'ziaden_obsah_k_zobrazeniu', 'static', '', 'Sorry, no posts to show', 1, 0),
(19263, 1, 'sk', 'ziaden_obsah_k_zobrazeniu', 'static', '', 'Ľutujeme, ale žiaden obsah nie je k zobrazeniu', 1, 0),
(19264, 1, 'en', 'citat_viac', 'static', '', 'Read more', 1, 0),
(19265, 1, 'sk', 'citat_viac', 'static', '', 'Čítať viac', 1, 0),
(19266, 1, 'en', 'vitajte', 'static', '', 'Welcome', 1, 0),
(19267, 1, 'sk', 'vitajte', 'static', '', 'Vitajte', 1, 0),
(19268, 1, 'en', 'objednavok', 'static', '', 'Orders', 1, 0),
(19269, 1, 'sk', 'objednavok', 'static', '', 'Objednávok', 1, 0),
(19270, 1, 'en', 'zaplatene', 'static', '', 'Total paid', 1, 0),
(19271, 1, 'sk', 'zaplatene', 'static', '', 'Spolu zaplatené', 1, 0),
(19272, 1, 'en', 'komentarov', 'static', '', 'Comments', 1, 0),
(19273, 1, 'sk', 'komentarov', 'static', '', 'Komentárov', 1, 0),
(19274, 1, 'en', 'priemerna_cena_za_nakup', 'static', '', 'Average price <br/>per shopping', 1, 0),
(19275, 1, 'sk', 'priemerna_cena_za_nakup', 'static', '', 'Priemerná cena <br/>za nákup', 1, 0),
(19276, 1, 'en', 'informacie', 'static', '', 'Informations', 1, 0),
(19277, 1, 'sk', 'informacie', 'static', '', 'Informácie', 1, 0),
(19278, 1, 'en', 'moj_profil', 'static', '', 'My profile ', 1, 0),
(19279, 1, 'sk', 'moj_profil', 'static', '', 'Môj profil', 1, 0),
(19280, 1, 'en', 'moje_udaje', 'static', '', 'My data ', 1, 0),
(19281, 1, 'sk', 'moje_udaje', 'static', '', 'Moje údaje', 1, 0),
(19282, 1, 'en', 'upravit_udaje', 'static', '', 'Edit my data', 1, 0),
(19283, 1, 'sk', 'upravit_udaje', 'static', '', 'Upraviť údaje', 1, 0),
(19284, 1, 'en', 'moje_objednavky', 'static', '', 'My orders', 1, 0),
(19285, 1, 'sk', 'moje_objednavky', 'static', '', 'Moje objednávky', 1, 0),
(19286, 1, 'en', 'zmenit_heslo', 'static', '', 'Change password', 1, 0),
(19287, 1, 'sk', 'zmenit_heslo', 'static', '', 'Zmeniť heslo', 1, 0),
(19288, 1, 'en', 'nepotvrdena_objednavka', 'static', '', 'Order not confirmed', 1, 0),
(19289, 1, 'sk', 'nepotvrdena_objednavka', 'static', '', 'Objednávka nepotvrdená', 1, 0),
(19290, 1, 'en', 'potvrdena_objednavka', 'static', '', 'Order confirmed, waiting for progress', 1, 0),
(19291, 1, 'sk', 'potvrdena_objednavka', 'static', '', 'Objednávka potvrdená, čaká na vybavenie', 1, 0),
(19292, 1, 'en', 'objednavka_sa_spracuva', 'static', '', 'Order in progress', 1, 0),
(19293, 1, 'sk', 'objednavka_sa_spracuva', 'static', '', 'Objednávka sa vybavuje', 1, 0),
(19294, 1, 'en', 'vybavena_objednavka', 'static', '', 'Order equipped', 1, 0),
(19295, 1, 'sk', 'vybavena_objednavka', 'static', '', 'Objednávka vybavená', 1, 0),
(19296, 1, 'en', 'anulovana_objednavka', 'static', '', 'Order canceled', 1, 0),
(19297, 1, 'sk', 'anulovana_objednavka', 'static', '', 'Objednávka zrušená', 1, 0),
(19298, 1, 'en', 'odhlasit', 'static', '', 'Log out', 1, 0),
(19299, 1, 'sk', 'odhlasit', 'static', '', 'Odhlásiť sa', 1, 0),
(19300, 1, 'en', 'prosim_prihlaste_sa', 'static', '', 'Please Log in firstly', 1, 0),
(19301, 1, 'sk', 'prosim_prihlaste_sa', 'static', '', 'Prosím najprv sa prihláste', 1, 0),
(19302, 1, 'en', 'nacitam', 'static', '', 'loading', 1, 0),
(19303, 1, 'sk', 'nacitam', 'static', '', 'načítam', 1, 0),
(19304, 1, 'en', 'nove_heslo', 'static', '', 'New password', 1, 0),
(19305, 1, 'sk', 'nove_heslo', 'static', '', 'Nové heslo', 1, 0),
(19306, 1, 'en', 'nove_heslo_overenie', 'static', '', 'Copy new password', 1, 0),
(19307, 1, 'sk', 'nove_heslo_overenie', 'static', '', 'Overenie nového hesla', 1, 0),
(19308, 1, 'en', 'prihlaseny', 'static', '', 'Logged user', 1, 0),
(19309, 1, 'sk', 'prihlaseny', 'static', '', 'Prihlásený používateľ', 1, 0),
(19310, 1, 'en', 'cislo_objednavky', 'static', '', 'Order Number', 1, 0),
(19311, 1, 'sk', 'cislo_objednavky', 'static', '', 'Číslo objednávky', 1, 0),
(19312, 1, 'en', 'datum_objednavky', 'static', '', 'Order Date', 1, 0),
(19313, 1, 'sk', 'datum_objednavky', 'static', '', 'Dátum objednávky', 1, 0),
(19314, 1, 'en', 'stav_objednavky', 'static', '', 'Order Status', 1, 0),
(19315, 1, 'sk', 'stav_objednavky', 'static', '', 'Stav objednávky', 1, 0),
(19316, 1, 'en', 'ziadne_objednavky_na_show', 'static', '', 'No Orders to show', 1, 0),
(19317, 1, 'sk', 'ziadne_objednavky_na_show', 'static', '', 'Žiadne objednávky na show', 1, 0),
(19318, 1, 'en', 'zle_vyplnene_pole', 'static', '', 'Wrong data in field', 1, 0),
(19319, 1, 'sk', 'zle_vyplnene_pole', 'static', '', 'Zle vyplnené pole ', 1, 0),
(19320, 1, 'en', 'error_box', 'static', '', 'Oops, something s wrong', 1, 0),
(19321, 1, 'sk', 'error_box', 'static', '', 'Hups, niečo je zle', 1, 0),
(19322, 1, 'en', 'opravit', 'static', '', 'Repair', 1, 0),
(19323, 1, 'sk', 'opravit', 'static', '', 'Opraviť', 1, 0),
(19324, 1, 'en', 'prazdne_pole_hlaska', 'static', '', 'Field name is probably empty', 1, 0),
(19325, 1, 'sk', 'prazdne_pole_hlaska', 'static', '', 'Pole pravdepodobne nie je vyplnené', 1, 0),
(19326, 1, 'en', 'slide_show', 'static', '', 'Slide show of cover photos album', 1, 0),
(19327, 1, 'sk', 'slide_show', 'static', '', 'Prehľad titulných fotiek albumov', 1, 0),
(19328, 1, 'en', 'zly_tvar_emailu', 'static', '', 'Wrong form of email', 1, 0),
(19329, 1, 'sk', 'zly_tvar_emailu', 'static', '', 'Email je v nesprávnom tvare', 1, 0),
(19330, 1, 'en', 'email_exists', 'static', '', 'This email already exists', 1, 0),
(19331, 1, 'sk', 'email_exists', 'static', '', 'Tento email už existuje', 1, 0),
(19332, 1, 'en', 'heslo_kratke', 'static', '', 'Password is too short', 1, 0),
(19333, 1, 'sk', 'heslo_kratke', 'static', '', 'Heslo je príliš krátke', 1, 0),
(19334, 1, 'en', 'heslo_overenie_kratke', 'static', '', 'Copy of password is too short', 1, 0),
(19335, 1, 'sk', 'heslo_overenie_kratke', 'static', '', 'Overenie hesla je príliš krátke', 1, 0),
(19336, 1, 'en', 'hesla_sa_nezhoduju', 'static', '', 'Passwords do not matcht', 1, 0),
(19337, 1, 'sk', 'hesla_sa_nezhoduju', 'static', '', 'Heslá sa nezhodujú', 1, 0),
(19338, 1, 'en', 'uspesna_registracia', 'static', '', 'Registration was successful', 1, 0),
(19339, 1, 'sk', 'uspesna_registracia', 'static', '', 'Registrácia prebehla úspešne', 1, 0),
(19340, 1, 'en', 'gratulujeme', 'static', '', 'Congratulations', 1, 0),
(19341, 1, 'sk', 'gratulujeme', 'static', '', 'Gratulujeme', 1, 0),
(19342, 1, 'en', 'zlava', 'static', '', 'Discount', 1, 0),
(19343, 1, 'sk', 'zlava', 'static', '', 'Zľava', 1, 0),
(19344, 1, 'en', 'novinka', 'static', '', 'News', 1, 0),
(19345, 1, 'sk', 'novinka', 'static', '', 'Novinka', 1, 0),
(19346, 1, 'en', 'vypredaj', 'static', '', 'Sale', 1, 0),
(19347, 1, 'sk', 'vypredaj', 'static', '', 'Výpredaj', 1, 0),
(19348, 1, 'en', 'no_stav', 'static', '', 'Not set', 1, 0),
(19349, 1, 'sk', 'no_stav', 'static', '', 'Bez stavu 2', 1, 0),
(19350, 1, 'en', 'komentare', 'static', '', 'Comments', 1, 0),
(19351, 1, 'sk', 'komentare', 'static', '', 'Komentáre', 1, 0),
(19352, 1, 'en', 'komentar', 'static', '', 'Comment', 1, 0),
(19353, 1, 'sk', 'komentar', 'static', '', 'Komentár', 1, 0),
(19354, 1, 'en', 'komentarov', 'static', '', 'Comments', 1, 0),
(19355, 1, 'sk', 'komentarov', 'static', '', 'Komentárov', 1, 0),
(19356, 1, 'en', 'pridat_komentar', 'static', '', 'Add comment', 1, 0),
(19357, 1, 'sk', 'pridat_komentar', 'static', '', 'Pridať komentár', 1, 0),
(19358, 1, 'en', 'vas_komentar', 'static', '', 'Your comment', 1, 0),
(19359, 1, 'sk', 'vas_komentar', 'static', '', 'Váš komentár', 1, 0),
(19360, 1, 'en', 'ziadne_komentare', 'static', '', 'This post has no comments', 1, 0),
(19361, 1, 'sk', 'ziadne_komentare', 'static', '', 'Tento príspevok neobsahuje žiadne komentáre', 1, 0),
(19362, 1, 'en', 'ziadne_produkty', 'static', '', 'No products to show', 1, 0),
(19363, 1, 'sk', 'ziadne_produkty', 'static', '', 'Žiadne produkty k zobrazeniu', 1, 0),
(19364, 1, 'en', 'popis', 'static', '', 'Description', 1, 0),
(19365, 1, 'sk', 'popis', 'static', '', 'Popis', 1, 0),
(19366, 1, 'en', 'nazov', 'static', '', 'Name', 1, 0),
(19367, 1, 'sk', 'nazov', 'static', '', 'Názov', 1, 0),
(19368, 1, 'en', 'stav', 'static', '', 'Status', 1, 0),
(19369, 1, 'sk', 'stav', 'static', '', 'Stav', 1, 0),
(19370, 1, 'en', 'znacka', 'static', '', 'Brand', 1, 0),
(19371, 1, 'sk', 'znacka', 'static', '', 'Značka', 1, 0),
(19372, 1, 'en', 'pridajte_sa_facebook', 'static', '', 'Join Us on Facebook', 1, 0),
(19373, 1, 'sk', 'pridajte_sa_facebook', 'static', '', 'Pridajte sa na Facebooku', 1, 0),
(19374, 1, 'en', 'kontaktujte_nas_hlaska', 'static', '', 'For more information please contact us', 1, 0),
(19375, 1, 'sk', 'kontaktujte_nas_hlaska', 'static', '', 'Pre získanie viac informacii nás prosím kontaktujte', 1, 0),
(19376, 1, 'en', 'najnovsie_produkty', 'static', '', 'News products', 1, 0),
(19377, 1, 'sk', 'najnovsie_produkty', 'static', '', 'Najnovšie produkty', 1, 0),
(19378, 1, 'en', 'znacky', 'static', '', 'Brands', 1, 0),
(19379, 1, 'sk', 'znacky', 'static', '', 'Značky', 1, 0),
(19380, 1, 'en', 'najpredavanejsie', 'static', '', 'Bestsellers', 1, 0),
(19381, 1, 'sk', 'najpredavanejsie', 'static', '', 'Najpredávanejšie', 1, 0),
(19382, 1, 'en', 'produkty_v_zlave', 'static', '', 'In discount', 1, 0),
(19383, 1, 'sk', 'produkty_v_zlave', 'static', '', 'V zľave', 1, 0),
(19384, 1, 'en', 'obsah_kosika', 'static', '', 'Your cart', 1, 0),
(19385, 1, 'sk', 'obsah_kosika', 'static', '', 'Váš obsah košíka', 1, 0),
(19386, 1, 'en', 'zobrazit_kosik', 'static', '', 'View cart', 1, 0),
(19387, 1, 'sk', 'zobrazit_kosik', 'static', '', 'Zobraziť košík', 1, 0),
(19388, 1, 'en', 'ziadne_produkty_kat', 'static', '', 'In this category there are no products', 1, 0),
(19389, 1, 'sk', 'ziadne_produkty_kat', 'static', '', 'V tejto kategorii nie sú žiadne produkty', 1, 0),
(19390, 1, 'en', 'nespravne_povodne_heslo', 'static', '', 'Default password is incorrect', 1, 0),
(19391, 1, 'sk', 'nespravne_povodne_heslo', 'static', '', 'Pôvodné heslo je nesprávne', 1, 0),
(19392, 1, 'en', 'uspesna_objednavka', 'static', '', 'Your order has been successfully sent', 1, 0),
(19393, 1, 'sk', 'uspesna_objednavka', 'static', '', 'Vaša objednávka bola úspešne odoslaná', 1, 0),
(19394, 1, 'en', 'zly_email_heslo', 'static', '', 'Wrong email or password', 1, 0),
(19395, 1, 'sk', 'zly_email_heslo', 'static', '', 'Nesprávny email, alebo heslo', 1, 0),
(19396, 1, 'en', 'sprava_odoslana', 'static', '', 'Your message was successfully sent', 1, 0),
(19397, 1, 'sk', 'sprava_odoslana', 'static', '', 'Vaša správa bola úspešne odoslaná', 1, 0),
(19398, 1, 'en', 'domov', 'static', '', 'Home', 1, 0),
(19399, 1, 'sk', 'domov', 'static', '', 'Domov', 1, 0),
(19400, 1, 'en', 'fail_action', 'static', '', 'The requested action can not be carried out!', 1, 0),
(19401, 1, 'sk', 'fail_action', 'static', '', 'Požadovanú akciu nie je možné vykonať!', 1, 0),
(19402, 1, 'sk', 'januar', 'static', '', 'January', 1, 0),
(19403, 1, 'sk', 'januar', 'static', '', 'Január', 1, 0),
(19404, 1, 'en', 'februar', 'static', '', 'February', 1, 0),
(19405, 1, 'sk', 'februar', 'static', '', 'Február', 1, 0),
(19406, 1, 'en', 'marec', 'static', '', 'Marec', 1, 0),
(19407, 1, 'sk', 'marec', 'static', '', 'Marec', 1, 0),
(19408, 1, 'en', 'april', 'static', '', 'April', 1, 0),
(19409, 1, 'sk', 'april', 'static', '', 'Apríl', 1, 0),
(19410, 1, 'en', 'maj', 'static', '', 'May', 1, 0),
(19411, 1, 'sk', 'maj', 'static', '', 'Máj', 1, 0),
(19412, 1, 'en', 'jun', 'static', '', 'Juny', 1, 0),
(19413, 1, 'sk', 'jun', 'static', '', 'Jún', 1, 0),
(19414, 1, 'en', 'jul', 'static', '', 'July', 1, 0),
(19415, 1, 'sk', 'jul', 'static', '', 'Júl', 1, 0),
(19416, 1, 'en', 'august', 'static', '', 'August', 1, 0),
(19417, 1, 'sk', 'august', 'static', '', 'August', 1, 0),
(19418, 1, 'en', 'september', 'static', '', 'September', 1, 0),
(19419, 1, 'sk', 'september', 'static', '', 'September', 1, 0),
(19420, 1, 'en', 'oktober', 'static', '', 'October', 1, 0),
(19421, 1, 'sk', 'oktober', 'static', '', 'Október', 1, 0),
(19422, 1, 'en', 'november', 'static', '', 'November', 1, 0),
(19423, 1, 'sk', 'november', 'static', '', 'November', 1, 0),
(19424, 1, 'en', 'december', 'static', '', 'December', 1, 0),
(19425, 1, 'sk', 'december', 'static', '', 'December', 1, 0),
(19426, 1, 'en', 'zobrazit', 'static', '', 'View', 1, 0),
(19427, 1, 'sk', 'zobrazit', 'static', '', 'Zobraziť', 1, 0),
(19428, 1, 'en', 'partneri', 'static', '', 'Partners', 1, 0),
(19429, 1, 'sk', 'partneri', 'static', '', 'Partneri', 1, 0),
(19430, 1, 'en', 'archiv', 'static', '', 'Archive', 1, 0),
(19431, 1, 'sk', 'archiv', 'static', '', 'Archív', 1, 0),
(19432, 1, 'en', 'najnovsie_komentare', 'static', '', 'Recent Comments', 1, 0),
(19433, 1, 'sk', 'najnovsie_komentare', 'static', '', 'Posledné komentáre', 1, 0),
(19434, 1, 'en', 'najnovsie_clanky', 'static', '', 'Recent posts', 1, 0),
(19435, 1, 'sk', 'najnovsie_clanky', 'static', '', 'Posledné články', 1, 0),
(19436, 1, 'en', 'main_menu', 'static', '', 'Main menu', 1, 0),
(19437, 1, 'sk', 'main_menu', 'static', '', 'Hlavné menu', 1, 0),
(19440, 1, 'en', 'hladat', 'static', '', 'Search', 1, 0),
(19441, 1, 'sk', 'hladat', 'static', '', 'Hľadať', 1, 0),
(19442, 1, 'en', 'socialne_siete', 'static', '', 'Social networks', 1, 0),
(19443, 1, 'sk', 'socialne_siete', 'static', '', 'Sociálne siete', 1, 0),
(19444, 1, 'en', 'poloha', 'static', '', 'Location', 1, 0),
(19445, 1, 'sk', 'poloha', 'static', '', 'Poloha', 1, 0),
(19446, 1, 'en', 'type', 'static', '', 'typee', 1, 0),
(19447, 1, 'sk', 'type', 'static', '', 'type', 1, 0),
(19448, 1, 'en', 'all', 'static', '', 'All', 1, 0),
(19449, 1, 'sk', 'all', 'static', '', 'Všetko', 1, 0),
(19450, 1, 'en', 'hlaska_najdi_dom', 'static', '', 'Find Your Home', 1, 0),
(19451, 1, 'sk', 'hlaska_najdi_dom', 'static', '', 'Nájdite si svoj dom', 1, 0),
(19452, 1, 'en', 'min_izieb', 'static', '', 'Min Rooms', 1, 0),
(19453, 1, 'sk', 'min_izieb', 'static', '', 'Min. izieb', 1, 0),
(19454, 1, 'en', 'min_kupelni', 'static', '', 'Min Baths', 1, 0),
(19455, 1, 'sk', 'min_kupelni', 'static', '', 'Min. kúpeľní', 1, 0),
(19456, 1, 'en', 'min_cena', 'static', '', 'Min Price', 1, 0),
(19457, 1, 'sk', 'min_cena', 'static', '', 'Min. cena', 1, 0),
(19458, 1, 'en', 'max_cena', 'static', '', 'Max Price', 1, 0),
(19459, 1, 'sk', 'max_cena', 'static', '', 'Max. cena', 1, 0),
(19460, 1, 'en', 'min_area', 'static', '', 'Min Area', 1, 0),
(19461, 1, 'sk', 'min_area', 'static', '', 'Min. roz.', 1, 0),
(19462, 1, 'en', 'max_area', 'static', '', 'Max Area', 1, 0),
(19463, 1, 'sk', 'max_area', 'static', '', 'Max roz.', 1, 0),
(19464, 1, 'en', 'area', 'static', '', 'Area', 1, 0),
(19465, 1, 'sk', 'area', 'static', '', 'Rozloha', 1, 0),
(19466, 1, 'en', 'm2', 'static', '', 'Sq m', 1, 0),
(19467, 1, 'sk', 'm2', 'static', '', 'm2', 1, 0),
(19468, 1, 'en', 'izieb', 'static', '', 'Rooms', 1, 0),
(19469, 1, 'sk', 'izieb', 'static', '', 'Izieb', 1, 0),
(19470, 1, 'en', 'kupelni', 'static', '', 'Bathrooms', 1, 0),
(19471, 1, 'sk', 'kupelni', 'static', '', 'Kúpeľní', 1, 0),
(19472, 1, 'en', 'tlacit', 'static', '', 'Print', 1, 0),
(19473, 1, 'sk', 'tlacit', 'static', '', 'Tlačiť', 1, 0),
(19474, 1, 'en', 'nazov', 'static', '', 'Name', 1, 0),
(19475, 1, 'sk', 'nazov', 'static', '', 'Meno', 1, 0),
(19476, 1, 'en', 'zoznam_nehnutelnosti', 'static', '', 'List of properties', 1, 0),
(19477, 1, 'sk', 'zoznam_nehnutelnosti', 'static', '', 'Zoznam nehnuteľností', 1, 0),
(19478, 1, 'en', 'no_content', 'static', '', 'Please try using top navigation OR search for what you are looking for.', 1, 0),
(19479, 1, 'sk', 'no_content', 'static', '', 'Ľutujeme, ale pre tento výber neexistuje žiaden obsah', 1, 0),
(19480, 1, 'en', 'go_back', 'static', '', 'Go back', 1, 0),
(19481, 1, 'sk', 'go_back', 'static', '', 'Naspäť', 1, 0),
(19482, 1, 'en', 'vybrane_nehnutelnosti', 'static', '', 'Featured Properties', 1, 0),
(19483, 1, 'sk', 'vybrane_nehnutelnosti', 'static', '', 'Vybrané nehnuteľnosti', 1, 0),
(19484, 1, 'en', 'najnovsie_ponuky_hlaska', 'static', '', 'Latest offers property', 1, 0),
(19485, 1, 'sk', 'najnovsie_ponuky_hlaska', 'static', '', 'Najnovšie ponuky nehnuteľností', 1, 0),
(19486, 1, 'en', 'about_us_footer', 'static', '', 'Our company operates in the real estate market. We offer a broad spectrum range of activities related to the negotiation of purchase, sale and rental nehnuteľností.Pre most of you, our clients, the sale, purchase, or rental property important step, which made only a few times in my life. Our real estate agents will gladly help you with the implementation of your requirements and provide complete service with our offer.', 1, 0),
(19487, 1, 'sk', 'about_us_footer', 'static', '', 'Naša spoločnosť pôsobí v oblasti realitného trhu. Ponúkame širokospektrálny záber činností spojených so sprostredkovaním kúpy, predaja a prenájmu nehnuteľností.Pre väčšinu Vás, našich klientov je predaj, kúpa, alebo prenájom nehnuteľnosti dôležitý krok, ktorý realizujete len niekoľkokrát v živote. Naši realitní makléri Vám ochotne a radi poradia pri realizácii Vašich požiadaviek a zabezpečia kompletný servis spojený s našou ponukou.', 1, 0),
(19488, 1, 'en', 'about', 'static', '', 'About company', 1, 0),
(19489, 1, 'sk', 'about', 'static', '', 'O firme', 1, 0),
(19490, 1, 'en', 'vyberte_si_region', 'static', '', 'Choose your region', 1, 0),
(19491, 1, 'sk', 'vyberte_si_region', 'static', '', 'Vyberte si región', 1, 0),
(19492, 1, 'en', 'bratislavsky_kraj', 'static', '', 'Region of Bratislava', 1, 0),
(19493, 1, 'sk', 'bratislavsky_kraj', 'static', '', 'Bratislavský kraj', 1, 0),
(19494, 1, 'en', 'trnavsky_kraj', 'static', '', 'Region of Trnava', 1, 0),
(19495, 1, 'sk', 'trnavsky_kraj', 'static', '', 'Trnavský kraj', 1, 0),
(19496, 1, 'en', 'trenciansky_kraj', 'static', '', 'Region of Trencin', 1, 0),
(19497, 1, 'sk', 'trenciansky_kraj', 'static', '', 'Trenčiansky kraj', 1, 0),
(19498, 1, 'en', 'nitriansky_kraj', 'static', '', 'Region of Nitra', 1, 0),
(19499, 1, 'sk', 'nitriansky_kraj', 'static', '', 'Nitriansky kraj', 1, 0),
(19500, 1, 'en', 'zilinsky_kraj', 'static', '', 'Region of Zilina', 1, 0),
(19501, 1, 'sk', 'zilinsky_kraj', 'static', '', 'Žilinský kraj', 1, 0),
(19502, 1, 'en', 'banskobystricky_kraj', 'static', '', 'Region of Banska Bystrica', 1, 0),
(19503, 1, 'sk', 'banskobystricky_kraj', 'static', '', 'Bansko Bstrický kraj', 1, 0),
(19504, 1, 'en', 'presovsky_kraj', 'static', '', 'Region of Presov', 1, 0),
(19505, 1, 'sk', 'presovsky_kraj', 'static', '', 'Prešovský kraj', 1, 0),
(19506, 1, 'en', 'kosicky_kraj', 'static', '', 'Region of Kosice', 1, 0),
(19507, 1, 'sk', 'kosicky_kraj', 'static', '', 'Košický kraj', 1, 0),
(19508, 1, 'en', 'kategorie_clankov', 'static', '', 'Caregory of blog', 1, 0),
(19509, 1, 'sk', 'kategorie_clankov', 'static', '', 'Kategórie článkov', 1, 0),
(19510, 1, 'en', 'realitny_partneri', 'static', '', 'Realit partners', 1, 0),
(19511, 1, 'sk', 'realitny_partneri', 'static', '', 'Realitní partneri', 1, 0),
(60474, 1, 'en', 'nespravne_heslo', 'static', '', 'Password is incorrect', 1, 0),
(60475, 1, 'sk', 'nespravne_heslo', 'static', '', 'Heslo je nesprávne', 1, 0),
(61739, 1, 'sk', 'ustredie', 'static', '', 'Ústredie', 1, 0),
(61740, 1, 'en', 'ustredie', 'static', '', 'Headquarters', 1, 0),
(61741, 1, 'de', 'ustredie', 'static', '', 'Zentrale', 1, 0),
(61742, 1, 'sk', 'dalsie_informacie', 'static', '', 'Rýchla navigácia', 1, 0),
(61743, 1, 'en', 'dalsie_informacie', 'static', '', ' Quick navigation', 1, 0),
(61744, 1, 'de', 'dalsie_informacie', 'static', '', 'Schnellnavigation', 1, 0),
(61745, 1, 'sk', 'technicka_podpora', 'static', '', 'Technická podpora', 1, 0),
(61746, 1, 'en', 'technicka_podpora', 'static', '', 'Technical support', 1, 0),
(61747, 1, 'de', 'technicka_podpora', 'static', '', 'Technische Unterstützung', 1, 0),
(61748, 1, 'sk', 'systemove_poziadavky', 'static', '', 'Systémové požiadavky', 1, 0),
(61749, 1, 'en', 'systemove_poziadavky', 'static', '', 'System requirements', 1, 0),
(61750, 1, 'de', 'systemove_poziadavky', 'static', '', 'Systemanforderungen', 1, 0),
(61751, 1, 'sk', '3d_tlac', 'static', '', '3d tlač', 1, 0),
(61752, 1, 'en', '3d_tlac', 'static', '', '3D printing', 1, 0),
(61753, 1, 'de', '3d_tlac', 'static', '', '3D-Druck', 1, 0),
(61754, 1, 'sk', 'lisovanie_plastov', 'static', '', 'Lisovanie plastov', 1, 0),
(61755, 1, 'en', 'lisovanie_plastov', 'static', '', 'Molding', 1, 0),
(61756, 1, 'de', 'lisovanie_plastov', 'static', '', 'Gießen', 1, 0),
(61757, 1, 'sk', 'nastrojaren', 'static', '', 'Nástrojáreň', 1, 0),
(61758, 1, 'en', 'nastrojaren', 'static', '', 'Toolroom', 1, 0),
(61759, 1, 'de', 'nastrojaren', 'static', '', 'Werkzeug- und Vorrichtungsbau', 1, 0),
(61760, 1, 'sk', 'fakturacne_udaje', 'static', '', 'Fakturačné údaje', 1, 0),
(61761, 1, 'en', 'fakturacne_udaje', 'static', '', 'Billing information', 1, 0),
(61762, 1, 'de', 'fakturacne_udaje', 'static', '', 'Abrechnungsinformationen', 1, 0),
(61869, 1, 'sk', 'poziadat_o_ponuku_solidcam', 'static', '', 'Požiadať o ponuku Solidcam', 1, 0),
(61870, 1, 'en', 'poziadat_o_ponuku_solidcam', 'static', '', 'Request quote Solidcam', 1, 0),
(61871, 1, 'de', 'poziadat_o_ponuku_solidcam', 'static', '', 'Angebot anfordern Solidcam', 1, 0),
(61872, 1, 'sk', 'poziadat_o_prezentaciu_solidcam', 'static', '', 'Požiadať o prezentáciu Solidcam', 1, 0),
(61873, 1, 'en', 'poziadat_o_prezentaciu_solidcam', 'static', '', 'Request Solidcam Presentation', 1, 0),
(61874, 1, 'de', 'poziadat_o_prezentaciu_solidcam', 'static', '', 'Anfrage Solidcam-Präsentation', 1, 0),
(61875, 1, 'sk', 'poziadat_o_ponuku_pdc', 'static', '', 'Požiadať o ponuku PDC', 1, 0),
(61876, 1, 'en', 'poziadat_o_ponuku_pdc', 'static', '', 'Request quote PDC', 1, 0),
(61877, 1, 'de', 'poziadat_o_ponuku_pdc', 'static', '', 'Angebot anfordern PDC', 1, 0),
(61878, 1, 'sk', 'poziadat_o_prezentaciu_pdc', 'static', '', 'Požiadať o prezentáciu PDC', 1, 0),
(61879, 1, 'en', 'poziadat_o_prezentaciu_pdc', 'static', '', 'Request PDC Presentation', 1, 0),
(61880, 1, 'de', 'poziadat_o_prezentaciu_pdc', 'static', '', 'Anfrage PDC-Präsentation', 1, 0),
(61881, 1, 'sk', 'poziadat_o_ponuku', 'static', '', 'Požiadať o ponuku', 1, 0),
(61882, 1, 'en', 'poziadat_o_ponuku', 'static', '', 'Request for Quotation', 1, 0),
(61883, 1, 'de', 'poziadat_o_ponuku', 'static', '', 'Angebotsanfrage', 1, 0),
(61884, 1, 'sk', 'poziadat_o_prezentaciu', 'static', '', 'Požiadať o prezentáciu', 1, 0),
(61885, 1, 'en', 'poziadat_o_prezentaciu', 'static', '', 'Request a presentation', 1, 0),
(61886, 1, 'de', 'poziadat_o_prezentaciu', 'static', '', 'Fordern Sie eine Präsentation', 1, 0),
(61887, 1, 'sk', 'skusobna_verzia', 'static', '', 'Skúšobná verzia', 1, 0),
(61888, 1, 'en', 'skusobna_verzia', 'static', '', 'Trial', 1, 0),
(61889, 1, 'de', 'skusobna_verzia', 'static', '', 'Versuch', 1, 0),
(61890, 1, 'sk', 'firma', 'static', '', 'Firma', 1, 0),
(61891, 1, 'en', 'firma', 'static', '', 'Company', 1, 0),
(61892, 1, 'de', 'firma', 'static', '', 'Unternehmen', 1, 0),
(61893, 1, 'sk', 'produkt', 'static', '', 'Produkt', 1, 0),
(61894, 1, 'en', 'produkt', 'static', '', 'Product', 1, 0),
(61895, 1, 'de', 'produkt', 'static', '', 'Produkt', 1, 0),
(61896, 1, 'sk', 'dalsie_moznosti', 'static', '', 'Viac z ponuky', 1, 0),
(61897, 1, 'en', 'dalsie_moznosti', 'static', '', 'More of offer', 1, 0),
(61898, 1, 'de', 'dalsie_moznosti', 'static', '', 'Mehr von Angebot', 1, 0),
(62006, 1, 'de', 'meno', 'static', '', 'Name', 1, 0),
(62007, 1, 'sk', '', 'static', '', '', 1, 0),
(62008, 1, 'en', '', 'static', '', '', 1, 0),
(62009, 1, 'de', '', 'static', '', 'Name', 1, 0),
(62010, 1, 'de', 'priezvisko', 'static', '', 'Nachname', 1, 0),
(62011, 1, 'de', 'predmet', 'static', '', 'Thema', 1, 0),
(62012, 1, 'de', 'email', 'static', '', 'Emaille', 1, 0),
(62013, 1, 'de', 'tel_c', 'static', '', 'Telefonnummer', 1, 0),
(62014, 1, 'de', 'ulica', 'static', '', 'Straße', 1, 0),
(62015, 1, 'de', 'psc', 'static', '', 'Postleitzahl', 1, 0),
(62016, 1, 'de', 'mesto', 'static', '', 'Stadt', 1, 0),
(62017, 1, 'de', 'sprava', 'static', '', 'Management', 1, 0),
(62018, 1, 'de', 'odoslat', 'static', '', 'Einreichen', 1, 0),
(62019, 1, 'de', 'heslo', 'static', '', 'Kennwort', 1, 0),
(62020, 1, 'de', 'kontakt', 'static', '', 'Kontakt', 1, 0),
(62021, 1, 'de', 'socialne_siete', 'static', '', 'Soziales Netzwerk', 1, 0),
(62280, 1, 'sk', 'sidlo', 'static', '', 'Sídlo.', 1, 0),
(62281, 1, 'en', 'sidlo', 'static', '', 'Headquarters.', 1, 0),
(62282, 1, 'de', 'sidlo', 'static', '', 'Hauptsitz.', 1, 0),
(62283, 1, 'sk', 'pobocka', 'static', '', 'Pobočka.', 1, 0),
(62284, 1, 'en', 'pobocka', 'static', '', 'Branch office.', 1, 0),
(62285, 1, 'de', 'pobocka', 'static', '', 'Zweigstelle.', 1, 0),
(63792, 1, 'en', '13074', 'name', 'dnt_posts', '', 1, 0),
(63793, 1, 'en', '13074', 'name_url', 'dnt_posts', '', 1, 0),
(63794, 1, 'en', '13074', 'perex', 'dnt_posts', '', 1, 0),
(63795, 1, 'en', '13074', 'content', 'dnt_posts', '', 1, 0),
(63796, 1, 'en', '13074', 'tags', 'dnt_posts', '', 1, 0),
(63797, 1, 'de', '13074', 'name', 'dnt_posts', '', 1, 0),
(63798, 1, 'de', '13074', 'name_url', 'dnt_posts', '', 1, 0),
(63799, 1, 'de', '13074', 'perex', 'dnt_posts', '', 1, 0),
(63800, 1, 'de', '13074', 'content', 'dnt_posts', '', 1, 0),
(63801, 1, 'de', '13074', 'tags', 'dnt_posts', '', 1, 0),
(63832, 1, 'en', '13056', 'name', 'dnt_posts', 'Partners', 1, 0),
(63833, 1, 'en', '13056', 'name_url', 'dnt_posts', 'partners', 1, 0),
(63834, 1, 'en', '13056', 'perex', 'dnt_posts', '', 1, 0),
(63835, 1, 'en', '13056', 'content', 'dnt_posts', '', 1, 0),
(63836, 1, 'en', '13056', 'tags', 'dnt_posts', '', 1, 0),
(63837, 1, 'de', '13056', 'name', 'dnt_posts', 'Partner', 1, 0),
(63838, 1, 'de', '13056', 'name_url', 'dnt_posts', 'partner', 1, 0),
(63839, 1, 'de', '13056', 'perex', 'dnt_posts', '', 1, 0),
(63840, 1, 'de', '13056', 'content', 'dnt_posts', '', 1, 0),
(63841, 1, 'de', '13056', 'tags', 'dnt_posts', '', 1, 0),
(63842, 1, 'en', '13058', 'name', 'dnt_posts', 'Contact', 1, 0),
(63843, 1, 'en', '13058', 'name_url', 'dnt_posts', 'contact', 1, 0),
(63844, 1, 'en', '13058', 'perex', 'dnt_posts', '', 1, 0),
(63845, 1, 'en', '13058', 'content', 'dnt_posts', '', 1, 0),
(63846, 1, 'en', '13058', 'tags', 'dnt_posts', '', 1, 0),
(63847, 1, 'de', '13058', 'name', 'dnt_posts', 'Kontakt', 1, 0),
(63848, 1, 'de', '13058', 'name_url', 'dnt_posts', 'kontakt', 1, 0),
(63849, 1, 'de', '13058', 'perex', 'dnt_posts', '', 1, 0),
(63850, 1, 'de', '13058', 'content', 'dnt_posts', '', 1, 0),
(63851, 1, 'de', '13058', 'tags', 'dnt_posts', '', 1, 0),
(63852, 1, 'en', '13053', 'name', 'dnt_posts', 'About us', 1, 0),
(63853, 1, 'en', '13053', 'name_url', 'dnt_posts', 'about-us', 1, 0),
(63854, 1, 'en', '13053', 'perex', 'dnt_posts', '', 1, 0),
(63855, 1, 'en', '13053', 'content', 'dnt_posts', '', 1, 0),
(63856, 1, 'en', '13053', 'tags', 'dnt_posts', '', 1, 0),
(63857, 1, 'de', '13053', 'name', 'dnt_posts', 'Home', 1, 0),
(63858, 1, 'de', '13053', 'name_url', 'dnt_posts', 'home', 1, 0),
(63859, 1, 'de', '13053', 'perex', 'dnt_posts', '', 1, 0),
(63860, 1, 'de', '13053', 'content', 'dnt_posts', '', 1, 0),
(63861, 1, 'de', '13053', 'tags', 'dnt_posts', '', 1, 0),
(63872, 1, 'en', '13055', 'name', 'dnt_posts', 'Research and development', 1, 0),
(63873, 1, 'en', '13055', 'name_url', 'dnt_posts', 'research-and-development', 1, 0),
(63874, 1, 'en', '13055', 'perex', 'dnt_posts', '', 1, 0),
(63875, 1, 'en', '13055', 'content', 'dnt_posts', '', 1, 0),
(63876, 1, 'en', '13055', 'tags', 'dnt_posts', '', 1, 0),
(63877, 1, 'de', '13055', 'name', 'dnt_posts', 'Forschung und Entwicklung', 1, 0),
(63878, 1, 'de', '13055', 'name_url', 'dnt_posts', 'forschung-und-entwicklung', 1, 0),
(63879, 1, 'de', '13055', 'perex', 'dnt_posts', '', 1, 0),
(63880, 1, 'de', '13055', 'content', 'dnt_posts', '', 1, 0),
(63881, 1, 'de', '13055', 'tags', 'dnt_posts', '', 1, 0),
(63882, 1, 'en', '13054', 'name', 'dnt_posts', 'Products', 1, 0),
(63883, 1, 'en', '13054', 'name_url', 'dnt_posts', '', 1, 0),
(63884, 1, 'en', '13054', 'perex', 'dnt_posts', '', 1, 0),
(63885, 1, 'en', '13054', 'content', 'dnt_posts', '', 1, 0),
(63886, 1, 'en', '13054', 'tags', 'dnt_posts', '', 1, 0),
(63887, 1, 'de', '13054', 'name', 'dnt_posts', 'Produkte', 1, 0),
(63888, 1, 'de', '13054', 'name_url', 'dnt_posts', '', 1, 0),
(63889, 1, 'de', '13054', 'perex', 'dnt_posts', '', 1, 0),
(63890, 1, 'de', '13054', 'content', 'dnt_posts', '', 1, 0),
(63891, 1, 'de', '13054', 'tags', 'dnt_posts', '', 1, 0),
(63892, 1, 'en', '13059', 'name', 'dnt_posts', 'Staff', 1, 0),
(63893, 1, 'en', '13059', 'name_url', 'dnt_posts', 'staff', 1, 0),
(63894, 1, 'en', '13059', 'perex', 'dnt_posts', '', 1, 0),
(63895, 1, 'en', '13059', 'content', 'dnt_posts', '', 1, 0),
(63896, 1, 'en', '13059', 'tags', 'dnt_posts', '', 1, 0),
(63897, 1, 'de', '13059', 'name', 'dnt_posts', 'Personal', 1, 0),
(63898, 1, 'de', '13059', 'name_url', 'dnt_posts', 'personal', 1, 0),
(63899, 1, 'de', '13059', 'perex', 'dnt_posts', '', 1, 0),
(63900, 1, 'de', '13059', 'content', 'dnt_posts', '', 1, 0),
(63901, 1, 'de', '13059', 'tags', 'dnt_posts', '', 1, 0),
(63902, 1, 'en', '13060', 'name', 'dnt_posts', 'Software for planning of production', 1, 0),
(63903, 1, 'en', '13060', 'name_url', 'dnt_posts', '', 1, 0),
(63904, 1, 'en', '13060', 'perex', 'dnt_posts', '', 1, 0),
(63905, 1, 'en', '13060', 'content', 'dnt_posts', '', 1, 0),
(63906, 1, 'en', '13060', 'tags', 'dnt_posts', '', 1, 0),
(63907, 1, 'de', '13060', 'name', 'dnt_posts', 'Software für die Planung der Produktion', 1, 0),
(63908, 1, 'de', '13060', 'name_url', 'dnt_posts', '', 1, 0),
(63909, 1, 'de', '13060', 'perex', 'dnt_posts', '', 1, 0),
(63910, 1, 'de', '13060', 'content', 'dnt_posts', '', 1, 0),
(63911, 1, 'de', '13060', 'tags', 'dnt_posts', '', 1, 0),
(63912, 1, 'en', '13075', 'name', 'dnt_posts', 'Tooling & Molding', 1, 0),
(63913, 1, 'en', '13075', 'name_url', 'dnt_posts', '', 1, 0),
(63914, 1, 'en', '13075', 'perex', 'dnt_posts', '', 1, 0),
(63915, 1, 'en', '13075', 'content', 'dnt_posts', '', 1, 0),
(63916, 1, 'en', '13075', 'tags', 'dnt_posts', '', 1, 0),
(63917, 1, 'de', '13075', 'name', 'dnt_posts', 'Werkzeug- und Vorrichtungsbau', 1, 0),
(63918, 1, 'de', '13075', 'name_url', 'dnt_posts', '', 1, 0),
(63919, 1, 'de', '13075', 'perex', 'dnt_posts', '', 1, 0),
(63920, 1, 'de', '13075', 'content', 'dnt_posts', '', 1, 0),
(63921, 1, 'de', '13075', 'tags', 'dnt_posts', '', 1, 0),
(63922, 1, 'en', '13076', 'name', 'dnt_posts', 'Why choose CAM', 1, 0),
(63923, 1, 'en', '13076', 'name_url', 'dnt_posts', 'why-choose-cam', 1, 0),
(63924, 1, 'en', '13076', 'perex', 'dnt_posts', '', 1, 0),
(63925, 1, 'en', '13076', 'content', 'dnt_posts', '', 1, 0),
(63926, 1, 'en', '13076', 'tags', 'dnt_posts', '', 1, 0),
(63927, 1, 'de', '13076', 'name', 'dnt_posts', '', 1, 0),
(63928, 1, 'de', '13076', 'name_url', 'dnt_posts', '', 1, 0),
(63929, 1, 'de', '13076', 'perex', 'dnt_posts', '', 1, 0),
(63930, 1, 'de', '13076', 'content', 'dnt_posts', '', 1, 0),
(63931, 1, 'de', '13076', 'tags', 'dnt_posts', '', 1, 0),
(63942, 1, 'en', '13077', 'name', 'dnt_posts', 'Services', 1, 0),
(63943, 1, 'en', '13077', 'name_url', 'dnt_posts', 'services', 1, 0),
(63944, 1, 'en', '13077', 'perex', 'dnt_posts', '', 1, 0),
(63945, 1, 'en', '13077', 'content', 'dnt_posts', '', 1, 0),
(63946, 1, 'en', '13077', 'tags', 'dnt_posts', '', 1, 0),
(63947, 1, 'de', '13077', 'name', 'dnt_posts', 'Service', 1, 0),
(63948, 1, 'de', '13077', 'name_url', 'dnt_posts', 'service', 1, 0),
(63949, 1, 'de', '13077', 'perex', 'dnt_posts', '', 1, 0),
(63950, 1, 'de', '13077', 'content', 'dnt_posts', '', 1, 0),
(63951, 1, 'de', '13077', 'tags', 'dnt_posts', '', 1, 0);
INSERT INTO `dnt_translates` (`id`, `vendor_id`, `lang_id`, `translate_id`, `type`, `table`, `translate`, `show`, `parent_id`) VALUES
(63982, 1, 'en', '13078', 'name', 'dnt_posts', 'Why choose CAM', 1, 0),
(63983, 1, 'en', '13078', 'name_url', 'dnt_posts', 'why-choose-cam', 1, 0),
(63984, 1, 'en', '13078', 'perex', 'dnt_posts', '', 1, 0),
(63985, 1, 'en', '13078', 'content', 'dnt_posts', '', 1, 0),
(63986, 1, 'en', '13078', 'tags', 'dnt_posts', '', 1, 0),
(63987, 1, 'de', '13078', 'name', 'dnt_posts', '', 1, 0),
(63988, 1, 'de', '13078', 'name_url', 'dnt_posts', '', 1, 0),
(63989, 1, 'de', '13078', 'perex', 'dnt_posts', '', 1, 0),
(63990, 1, 'de', '13078', 'content', 'dnt_posts', '', 1, 0),
(63991, 1, 'de', '13078', 'tags', 'dnt_posts', '', 1, 0),
(63992, 1, 'en', '13079', 'name', 'dnt_posts', '', 1, 0),
(63993, 1, 'en', '13079', 'name_url', 'dnt_posts', '', 1, 0),
(63994, 1, 'en', '13079', 'perex', 'dnt_posts', '', 1, 0),
(63995, 1, 'en', '13079', 'content', 'dnt_posts', '', 1, 0),
(63996, 1, 'en', '13079', 'tags', 'dnt_posts', '', 1, 0),
(63997, 1, 'de', '13079', 'name', 'dnt_posts', '', 1, 0),
(63998, 1, 'de', '13079', 'name_url', 'dnt_posts', '', 1, 0),
(63999, 1, 'de', '13079', 'perex', 'dnt_posts', '', 1, 0),
(64000, 1, 'de', '13079', 'content', 'dnt_posts', '', 1, 0),
(64001, 1, 'de', '13079', 'tags', 'dnt_posts', '', 1, 0),
(64002, 1, 'en', '13080', 'name', 'dnt_posts', '', 1, 0),
(64003, 1, 'en', '13080', 'name_url', 'dnt_posts', '', 1, 0),
(64004, 1, 'en', '13080', 'perex', 'dnt_posts', '', 1, 0),
(64005, 1, 'en', '13080', 'content', 'dnt_posts', '', 1, 0),
(64006, 1, 'en', '13080', 'tags', 'dnt_posts', '', 1, 0),
(64007, 1, 'de', '13080', 'name', 'dnt_posts', '', 1, 0),
(64008, 1, 'de', '13080', 'name_url', 'dnt_posts', '', 1, 0),
(64009, 1, 'de', '13080', 'perex', 'dnt_posts', '', 1, 0),
(64010, 1, 'de', '13080', 'content', 'dnt_posts', '', 1, 0),
(64011, 1, 'de', '13080', 'tags', 'dnt_posts', '', 1, 0),
(64012, 1, 'en', '13081', 'name', 'dnt_posts', '', 1, 0),
(64013, 1, 'en', '13081', 'name_url', 'dnt_posts', '', 1, 0),
(64014, 1, 'en', '13081', 'perex', 'dnt_posts', '', 1, 0),
(64015, 1, 'en', '13081', 'content', 'dnt_posts', '', 1, 0),
(64016, 1, 'en', '13081', 'tags', 'dnt_posts', '', 1, 0),
(64017, 1, 'de', '13081', 'name', 'dnt_posts', '', 1, 0),
(64018, 1, 'de', '13081', 'name_url', 'dnt_posts', '', 1, 0),
(64019, 1, 'de', '13081', 'perex', 'dnt_posts', '', 1, 0),
(64020, 1, 'de', '13081', 'content', 'dnt_posts', '', 1, 0),
(64021, 1, 'de', '13081', 'tags', 'dnt_posts', '', 1, 0),
(64022, 1, 'en', '13082', 'name', 'dnt_posts', '', 1, 0),
(64023, 1, 'en', '13082', 'name_url', 'dnt_posts', '', 1, 0),
(64024, 1, 'en', '13082', 'perex', 'dnt_posts', '', 1, 0),
(64025, 1, 'en', '13082', 'content', 'dnt_posts', '', 1, 0),
(64026, 1, 'en', '13082', 'tags', 'dnt_posts', '', 1, 0),
(64027, 1, 'de', '13082', 'name', 'dnt_posts', '', 1, 0),
(64028, 1, 'de', '13082', 'name_url', 'dnt_posts', '', 1, 0),
(64029, 1, 'de', '13082', 'perex', 'dnt_posts', '', 1, 0),
(64030, 1, 'de', '13082', 'content', 'dnt_posts', '', 1, 0),
(64031, 1, 'de', '13082', 'tags', 'dnt_posts', '', 1, 0),
(64032, 1, 'en', '13083', 'name', 'dnt_posts', '', 1, 0),
(64033, 1, 'en', '13083', 'name_url', 'dnt_posts', '', 1, 0),
(64034, 1, 'en', '13083', 'perex', 'dnt_posts', '', 1, 0),
(64035, 1, 'en', '13083', 'content', 'dnt_posts', '', 1, 0),
(64036, 1, 'en', '13083', 'tags', 'dnt_posts', '', 1, 0),
(64037, 1, 'de', '13083', 'name', 'dnt_posts', '', 1, 0),
(64038, 1, 'de', '13083', 'name_url', 'dnt_posts', '', 1, 0),
(64039, 1, 'de', '13083', 'perex', 'dnt_posts', '', 1, 0),
(64040, 1, 'de', '13083', 'content', 'dnt_posts', '', 1, 0),
(64041, 1, 'de', '13083', 'tags', 'dnt_posts', '', 1, 0),
(64042, 1, 'en', '13084', 'name', 'dnt_posts', '', 1, 0),
(64043, 1, 'en', '13084', 'name_url', 'dnt_posts', '', 1, 0),
(64044, 1, 'en', '13084', 'perex', 'dnt_posts', '', 1, 0),
(64045, 1, 'en', '13084', 'content', 'dnt_posts', '', 1, 0),
(64046, 1, 'en', '13084', 'tags', 'dnt_posts', '', 1, 0),
(64047, 1, 'de', '13084', 'name', 'dnt_posts', '', 1, 0),
(64048, 1, 'de', '13084', 'name_url', 'dnt_posts', '', 1, 0),
(64049, 1, 'de', '13084', 'perex', 'dnt_posts', '', 1, 0),
(64050, 1, 'de', '13084', 'content', 'dnt_posts', '', 1, 0),
(64051, 1, 'de', '13084', 'tags', 'dnt_posts', '', 1, 0),
(64052, 1, 'en', '13085', 'name', 'dnt_posts', '', 1, 0),
(64053, 1, 'en', '13085', 'name_url', 'dnt_posts', '', 1, 0),
(64054, 1, 'en', '13085', 'perex', 'dnt_posts', '', 1, 0),
(64055, 1, 'en', '13085', 'content', 'dnt_posts', '', 1, 0),
(64056, 1, 'en', '13085', 'tags', 'dnt_posts', '', 1, 0),
(64057, 1, 'de', '13085', 'name', 'dnt_posts', '', 1, 0),
(64058, 1, 'de', '13085', 'name_url', 'dnt_posts', '', 1, 0),
(64059, 1, 'de', '13085', 'perex', 'dnt_posts', '', 1, 0),
(64060, 1, 'de', '13085', 'content', 'dnt_posts', '', 1, 0),
(64061, 1, 'de', '13085', 'tags', 'dnt_posts', '', 1, 0),
(64062, 1, 'en', '13057', 'name', 'dnt_posts', 'Career', 1, 0),
(64063, 1, 'en', '13057', 'name_url', 'dnt_posts', 'career', 1, 0),
(64064, 1, 'en', '13057', 'perex', 'dnt_posts', '', 1, 0),
(64065, 1, 'en', '13057', 'content', 'dnt_posts', '', 1, 0),
(64066, 1, 'en', '13057', 'tags', 'dnt_posts', '', 1, 0),
(64067, 1, 'de', '13057', 'name', 'dnt_posts', 'Karriere', 1, 0),
(64068, 1, 'de', '13057', 'name_url', 'dnt_posts', 'karriere', 1, 0),
(64069, 1, 'de', '13057', 'perex', 'dnt_posts', '', 1, 0),
(64070, 1, 'de', '13057', 'content', 'dnt_posts', '<h3>Pridajte sa k n&aacute;&scaron;mu t&iacute;mu!</h3>\r\n\r\n<p>Na tejto str&aacute;nke sa m&ocirc;žete uch&aacute;dzať o pr&aacute;cu v&nbsp;oblastiach, ktor&eacute; firma OSMOS pon&uacute;ka &ndash; oblasť obchodu, služieb, v&yacute;voja, kon&scaron;truovania, IT spr&aacute;vy, riadenia projektov, pl&aacute;novania, logistiky, v&yacute;roby so zameran&iacute;m na stroj&aacute;rstvo a v&yacute;robu plastov.</p>\r\n\r\n<p>Ak m&aacute;te z&aacute;ujem pracovať u n&aacute;s vo firme OSMOS a poz&iacute;cia ktor&uacute; chcete vykon&aacute;vať moment&aacute;lne nie je inzerovan&aacute;, m&ocirc;žete n&aacute;m poslať otvoren&uacute; žiadosť o zamestnanie. V pr&iacute;pade uvoľnenia poz&iacute;cie&nbsp;ktor&uacute; chcete vykon&aacute;vať, budeme v&aacute;s kontaktovať.&nbsp;</p>\r\n\r\n<p>Svoje otvoren&eacute; žiadosti o zamestnanie n&aacute;m za&scaron;lite spolu so životopisom na info@osmos.sk</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<div class=\"row\" style=\"width: 91%;\"><iframe src=\"https://tech.interspeedia.com/jobs/show.php?id=36416.cl0000373&amp;tf=1\" style=\"        width: 115%;\r\n    overflow-x: hidden;\r\n    border: 0px;\r\n    height: 900px;\r\n    overflow-y: hidden;\r\n    margin-left: -10px;\"></iframe></div>\r\n', 1, 0),
(64071, 1, 'de', '13057', 'tags', 'dnt_posts', '', 1, 0),
(64072, 1, 'en', '13086', 'name', 'dnt_posts', '', 1, 0),
(64073, 1, 'en', '13086', 'name_url', 'dnt_posts', '', 1, 0),
(64074, 1, 'en', '13086', 'perex', 'dnt_posts', '', 1, 0),
(64075, 1, 'en', '13086', 'content', 'dnt_posts', '', 1, 0),
(64076, 1, 'en', '13086', 'tags', 'dnt_posts', '', 1, 0),
(64077, 1, 'de', '13086', 'name', 'dnt_posts', '', 1, 0),
(64078, 1, 'de', '13086', 'name_url', 'dnt_posts', '', 1, 0),
(64079, 1, 'de', '13086', 'perex', 'dnt_posts', '', 1, 0),
(64080, 1, 'de', '13086', 'content', 'dnt_posts', '', 1, 0),
(64081, 1, 'de', '13086', 'tags', 'dnt_posts', '', 1, 0),
(64082, 1, 'en', '13087', 'name', 'dnt_posts', '', 1, 0),
(64083, 1, 'en', '13087', 'name_url', 'dnt_posts', '', 1, 0),
(64084, 1, 'en', '13087', 'perex', 'dnt_posts', '', 1, 0),
(64085, 1, 'en', '13087', 'content', 'dnt_posts', '', 1, 0),
(64086, 1, 'en', '13087', 'tags', 'dnt_posts', '', 1, 0),
(64087, 1, 'de', '13087', 'name', 'dnt_posts', '', 1, 0),
(64088, 1, 'de', '13087', 'name_url', 'dnt_posts', '', 1, 0),
(64089, 1, 'de', '13087', 'perex', 'dnt_posts', '', 1, 0),
(64090, 1, 'de', '13087', 'content', 'dnt_posts', '', 1, 0),
(64091, 1, 'de', '13087', 'tags', 'dnt_posts', '', 1, 0),
(64092, 1, 'en', '13088', 'name', 'dnt_posts', '', 1, 0),
(64093, 1, 'en', '13088', 'name_url', 'dnt_posts', '', 1, 0),
(64094, 1, 'en', '13088', 'perex', 'dnt_posts', '', 1, 0),
(64095, 1, 'en', '13088', 'content', 'dnt_posts', '', 1, 0),
(64096, 1, 'en', '13088', 'tags', 'dnt_posts', '', 1, 0),
(64097, 1, 'de', '13088', 'name', 'dnt_posts', '', 1, 0),
(64098, 1, 'de', '13088', 'name_url', 'dnt_posts', '', 1, 0),
(64099, 1, 'de', '13088', 'perex', 'dnt_posts', '', 1, 0),
(64100, 1, 'de', '13088', 'content', 'dnt_posts', '', 1, 0),
(64101, 1, 'de', '13088', 'tags', 'dnt_posts', '', 1, 0),
(64102, 1, 'en', '13089', 'name', 'dnt_posts', '', 1, 0),
(64103, 1, 'en', '13089', 'name_url', 'dnt_posts', '', 1, 0),
(64104, 1, 'en', '13089', 'perex', 'dnt_posts', '', 1, 0),
(64105, 1, 'en', '13089', 'content', 'dnt_posts', '', 1, 0),
(64106, 1, 'en', '13089', 'tags', 'dnt_posts', '', 1, 0),
(64107, 1, 'de', '13089', 'name', 'dnt_posts', '', 1, 0),
(64108, 1, 'de', '13089', 'name_url', 'dnt_posts', '', 1, 0),
(64109, 1, 'de', '13089', 'perex', 'dnt_posts', '', 1, 0),
(64110, 1, 'de', '13089', 'content', 'dnt_posts', '', 1, 0),
(64111, 1, 'de', '13089', 'tags', 'dnt_posts', '', 1, 0),
(64112, 1, 'en', '13090', 'name', 'dnt_posts', '', 1, 0),
(64113, 1, 'en', '13090', 'name_url', 'dnt_posts', '', 1, 0),
(64114, 1, 'en', '13090', 'perex', 'dnt_posts', '', 1, 0),
(64115, 1, 'en', '13090', 'content', 'dnt_posts', '', 1, 0),
(64116, 1, 'en', '13090', 'tags', 'dnt_posts', '', 1, 0),
(64117, 1, 'de', '13090', 'name', 'dnt_posts', '', 1, 0),
(64118, 1, 'de', '13090', 'name_url', 'dnt_posts', '', 1, 0),
(64119, 1, 'de', '13090', 'perex', 'dnt_posts', '', 1, 0),
(64120, 1, 'de', '13090', 'content', 'dnt_posts', '', 1, 0),
(64121, 1, 'de', '13090', 'tags', 'dnt_posts', '', 1, 0),
(64122, 1, 'en', '13091', 'name', 'dnt_posts', '', 1, 0),
(64123, 1, 'en', '13091', 'name_url', 'dnt_posts', '', 1, 0),
(64124, 1, 'en', '13091', 'perex', 'dnt_posts', '', 1, 0),
(64125, 1, 'en', '13091', 'content', 'dnt_posts', '', 1, 0),
(64126, 1, 'en', '13091', 'tags', 'dnt_posts', '', 1, 0),
(64127, 1, 'de', '13091', 'name', 'dnt_posts', '', 1, 0),
(64128, 1, 'de', '13091', 'name_url', 'dnt_posts', '', 1, 0),
(64129, 1, 'de', '13091', 'perex', 'dnt_posts', '', 1, 0),
(64130, 1, 'de', '13091', 'content', 'dnt_posts', '', 1, 0),
(64131, 1, 'de', '13091', 'tags', 'dnt_posts', '', 1, 0),
(64132, 1, 'en', '13092', 'name', 'dnt_posts', '', 1, 0),
(64133, 1, 'en', '13092', 'name_url', 'dnt_posts', '', 1, 0),
(64134, 1, 'en', '13092', 'perex', 'dnt_posts', '', 1, 0),
(64135, 1, 'en', '13092', 'content', 'dnt_posts', '', 1, 0),
(64136, 1, 'en', '13092', 'tags', 'dnt_posts', '', 1, 0),
(64137, 1, 'de', '13092', 'name', 'dnt_posts', '', 1, 0),
(64138, 1, 'de', '13092', 'name_url', 'dnt_posts', '', 1, 0),
(64139, 1, 'de', '13092', 'perex', 'dnt_posts', '', 1, 0),
(64140, 1, 'de', '13092', 'content', 'dnt_posts', '', 1, 0),
(64141, 1, 'de', '13092', 'tags', 'dnt_posts', '', 1, 0),
(64142, 1, 'en', '13093', 'name', 'dnt_posts', 'Billing information', 1, 0),
(64143, 1, 'en', '13093', 'name_url', 'dnt_posts', '', 1, 0),
(64144, 1, 'en', '13093', 'perex', 'dnt_posts', '', 1, 0),
(64145, 1, 'en', '13093', 'content', 'dnt_posts', '', 1, 0),
(64146, 1, 'en', '13093', 'tags', 'dnt_posts', '', 1, 0),
(64147, 1, 'de', '13093', 'name', 'dnt_posts', 'Abrechnungsinformationen', 1, 0),
(64148, 1, 'de', '13093', 'name_url', 'dnt_posts', '', 1, 0),
(64149, 1, 'de', '13093', 'perex', 'dnt_posts', '', 1, 0),
(64150, 1, 'de', '13093', 'content', 'dnt_posts', '', 1, 0),
(64151, 1, 'de', '13093', 'tags', 'dnt_posts', '', 1, 0),
(64162, 1, 'en', '13094', 'name', 'dnt_posts', 'Free production capacities', 1, 0),
(64163, 1, 'en', '13094', 'name_url', 'dnt_posts', '', 1, 0),
(64164, 1, 'en', '13094', 'perex', 'dnt_posts', '', 1, 0),
(64165, 1, 'en', '13094', 'content', 'dnt_posts', '<p>Free production capacities for continuouse 5 axis milling</p>\r\n', 1, 0),
(64166, 1, 'en', '13094', 'tags', 'dnt_posts', '', 1, 0),
(64167, 1, 'de', '13094', 'name', 'dnt_posts', '', 1, 0),
(64168, 1, 'de', '13094', 'name_url', 'dnt_posts', '', 1, 0),
(64169, 1, 'de', '13094', 'perex', 'dnt_posts', '', 1, 0),
(64170, 1, 'de', '13094', 'content', 'dnt_posts', '', 1, 0),
(64171, 1, 'de', '13094', 'tags', 'dnt_posts', '', 1, 0);

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

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `dnt_users`
--

CREATE TABLE `dnt_users` (
  `id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `session_id` varchar(300) NOT NULL,
  `type` varchar(100) NOT NULL,
  `name` varchar(300) NOT NULL,
  `surname` varchar(300) NOT NULL,
  `login` varchar(300) NOT NULL,
  `ulica` varchar(300) NOT NULL,
  `c_domu` varchar(300) NOT NULL,
  `mesto` varchar(300) NOT NULL,
  `okres` int(11) NOT NULL,
  `krajina` varchar(300) NOT NULL,
  `psc` varchar(100) NOT NULL,
  `pass` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `name_url` varchar(300) NOT NULL,
  `tel_c` varchar(300) NOT NULL,
  `custom_1` varchar(300) NOT NULL,
  `hladam` int(11) NOT NULL,
  `sex` int(11) NOT NULL,
  `vaha` int(11) NOT NULL,
  `vyska` int(11) NOT NULL,
  `datetime_creat` datetime NOT NULL,
  `datetime_update` datetime NOT NULL,
  `datetime_publish` datetime NOT NULL,
  `podmienky` varchar(300) NOT NULL,
  `news` varchar(300) NOT NULL,
  `news_2` varchar(300) NOT NULL DEFAULT '0',
  `perex` varchar(300) NOT NULL,
  `content` text NOT NULL,
  `img` varchar(300) NOT NULL,
  `status` int(11) NOT NULL,
  `kliknute` int(11) NOT NULL DEFAULT '0',
  `ip_adresa` varchar(300) NOT NULL,
  `parent_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Sťahujem dáta pre tabuľku `dnt_users`
--

INSERT INTO `dnt_users` (`id`, `vendor_id`, `session_id`, `type`, `name`, `surname`, `login`, `ulica`, `c_domu`, `mesto`, `okres`, `krajina`, `psc`, `pass`, `email`, `name_url`, `tel_c`, `custom_1`, `hladam`, `sex`, `vaha`, `vyska`, `datetime_creat`, `datetime_update`, `datetime_publish`, `podmienky`, `news`, `news_2`, `perex`, `content`, `img`, `status`, `kliknute`, `ip_adresa`, `parent_id`) VALUES
(19, 1, '', 'admin', 'Admin', 'Root', 'skeleton', '', '', '', 0, '', '', '21232f297a57a5a743894a0e4a801fc3', 'admin@root.sk', '', '', '', 0, 0, 0, 0, '0000-00-00 00:00:00', '2017-03-09 20:25:40', '0000-00-00 00:00:00', '', '', '0', '', '', '691', 1, 0, '', 0);

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `dnt_vendors`
--

CREATE TABLE `dnt_vendors` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `name_url` varchar(300) NOT NULL,
  `layout` varchar(300) NOT NULL,
  `is_default` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sťahujem dáta pre tabuľku `dnt_vendors`
--

INSERT INTO `dnt_vendors` (`id`, `name`, `name_url`, `layout`, `is_default`) VALUES
(1, 'Skeleton', 'skeleton', 'skeleton', 1);

--
-- Kľúče pre exportované tabuľky
--

--
-- Indexy pre tabuľku `dnt_admin_menu`
--
ALTER TABLE `dnt_admin_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `dnt_api`
--
ALTER TABLE `dnt_api`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `dnt_config`
--
ALTER TABLE `dnt_config`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `dnt_languages`
--
ALTER TABLE `dnt_languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `dnt_logs`
--
ALTER TABLE `dnt_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `dnt_mailer_mails`
--
ALTER TABLE `dnt_mailer_mails`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `dnt_mailer_type`
--
ALTER TABLE `dnt_mailer_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `dnt_polls`
--
ALTER TABLE `dnt_polls`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `dnt_polls_composer`
--
ALTER TABLE `dnt_polls_composer`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `dnt_posts`
--
ALTER TABLE `dnt_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `dnt_posts_meta`
--
ALTER TABLE `dnt_posts_meta`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `dnt_post_type`
--
ALTER TABLE `dnt_post_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `dnt_settings`
--
ALTER TABLE `dnt_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `dnt_translates`
--
ALTER TABLE `dnt_translates`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `dnt_uploads`
--
ALTER TABLE `dnt_uploads`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `dnt_users`
--
ALTER TABLE `dnt_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `dnt_vendors`
--
ALTER TABLE `dnt_vendors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pre exportované tabuľky
--

--
-- AUTO_INCREMENT pre tabuľku `dnt_admin_menu`
--
ALTER TABLE `dnt_admin_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=594;
--
-- AUTO_INCREMENT pre tabuľku `dnt_api`
--
ALTER TABLE `dnt_api`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1030;
--
-- AUTO_INCREMENT pre tabuľku `dnt_config`
--
ALTER TABLE `dnt_config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT pre tabuľku `dnt_languages`
--
ALTER TABLE `dnt_languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT pre tabuľku `dnt_logs`
--
ALTER TABLE `dnt_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3387;
--
-- AUTO_INCREMENT pre tabuľku `dnt_mailer_mails`
--
ALTER TABLE `dnt_mailer_mails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT pre tabuľku `dnt_mailer_type`
--
ALTER TABLE `dnt_mailer_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT pre tabuľku `dnt_polls`
--
ALTER TABLE `dnt_polls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pre tabuľku `dnt_polls_composer`
--
ALTER TABLE `dnt_polls_composer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=292;
--
-- AUTO_INCREMENT pre tabuľku `dnt_posts`
--
ALTER TABLE `dnt_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13293;
--
-- AUTO_INCREMENT pre tabuľku `dnt_posts_meta`
--
ALTER TABLE `dnt_posts_meta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pre tabuľku `dnt_post_type`
--
ALTER TABLE `dnt_post_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=296;
--
-- AUTO_INCREMENT pre tabuľku `dnt_settings`
--
ALTER TABLE `dnt_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1315;
--
-- AUTO_INCREMENT pre tabuľku `dnt_translates`
--
ALTER TABLE `dnt_translates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76337;
--
-- AUTO_INCREMENT pre tabuľku `dnt_uploads`
--
ALTER TABLE `dnt_uploads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=692;
--
-- AUTO_INCREMENT pre tabuľku `dnt_users`
--
ALTER TABLE `dnt_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT pre tabuľku `dnt_vendors`
--
ALTER TABLE `dnt_vendors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
