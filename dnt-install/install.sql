-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Hostiteľ: 127.0.0.1
-- Čas generovania: Po 06.Mar 2017, 12:12
-- Verzia serveru: 5.6.16
-- Verzia PHP: 7.1.1


--
-- Databáza: `dnt3_install`
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
(296, 3, 'menu', '', ' fa-gears', 20, 'Nastavenia', 'settings', 'settings', 1, 0),
(297, 3, 'menu', 'post', 'fa-laptop', 30, 'Obsah', 'content', 'content&incuded=post', 1, 0),
(298, 3, 'submenu', '', 'fa-plus', 1, 'Pridať post', 'content', 'content&add', 1, 0),
(299, 3, 'submenu', '', '', 6, 'Bleskovky', 'content&filter=bleskovky', 'content', 1, 0),
(300, 3, 'menu', '', 'fa-user', 40, 'Prístupy', 'access', 'access', 1, 0),
(301, 3, 'submenu', '', '', 5, 'Články', 'content', 'content&filter=articles', 1, 0),
(302, 3, 'submenu', '', '', 3, 'Stránky', 'content', 'content&filter=pages', 1, 0),
(303, 3, 'menu', '', 'fa fa-home', 10, 'Domov', 'home', '', 1, 0),
(304, 3, 'menu', '', '', 70, 'Faktúry', 'faktura', '', 0, 0),
(305, 3, 'menu', '', 'fa-envelope', 80, 'Mailer', 'mailer', 'mailer', 1, 0),
(306, 3, 'submenu', '', '', 5, 'Všetky prístupy', 'pristupy', 'pristupy', 1, 0),
(307, 3, 'submenu', '', 'fa-plus', 0, 'Pridať prístup', 'pristupy', 'pristupy&pridat', 1, 0),
(308, 3, 'submenu', '', '', 4, 'Podstránky', 'content', 'content&filter=pages-sub', 1, 0),
(309, 3, 'submenu', '', 'fa-plus', 2, 'Pridať podstránku', 'content', 'content&add=pages-sub', 1, 0),
(310, 3, 'submenu', '', '', 7, 'Statický obsah', 'content', 'content&filter=static', 1, 0),
(311, 3, 'menu', '', 'fa-sliders', 31, 'Slajdre', 'content&filter=slider-home', 'content&filter=slider-home', 1, 0),
(312, 3, 'submenu', '', '', 7, 'Sponzori', 'content', 'content&filter=sponzori', 1, 0),
(313, 3, 'submenu', '', '', 8, 'Partneri', 'content', 'content&filter=partneri', 1, 0),
(314, 3, 'menu', '', 'fa-user', 23, 'Multylanguage', 'multylanguage', '', 1, 0),
(315, 3, 'submenu', '', '', 23, 'Aktívne jazyky', 'multylanguage', 'multylanguage&add', 1, 0),
(316, 3, 'submenu', '', '', 22, 'Zoznam prekladov', 'multylanguage', 'multylanguage', 1, 0),
(317, 3, 'menu', 'sitemap', ' fa-gears', 30, 'Sitemap', 'content', 'content&incuded=sitemap', 1, 0),
(318, 3, 'menu', 'article', 'fa-laptop', 30, 'Články', 'content', 'content&incuded=article', 1, 0),
(319, 3, 'menu', '', 'fa-user', 23, 'Kvízy', 'polls', 'polls', 1, 0),
(320, 3, 'submenu', '', '', 23, 'Pridať kvíz', 'polls', 'polls&action=add_poll', 1, 0),
(321, 3, 'submenu', '', '', 23, 'Zoznam kvízov', 'polls', 'polls', 1, 0),
(322, 3, 'menu', '', ' fa-gears', 20, 'Súbory', 'files', 'files', 1, 0);

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
(1008, 3, 'Test Query', 'JajsZ5s4', 'SELECT * FROM dnt_post_type LIMIT 3', 0),
(1009, 3, 'Test Query', 'JajsZ5s4', 'SELECT * FROM dnt_post_type LIMIT 3', 0);

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
(5, 3, 'default_lang', 'sk'),
(6, 3, 'default_modul', 'homepage');

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
(19, 3, 'sk', 'Slovenský', 1, 1, 'flag_sk.jpg', 0),
(20, 3, 'en', 'English', 0, 1, 'flag_en.jpg', 0),
(21, 3, 'de', 'German\r\n', 0, 1, 'flag_de.jpg', 0);

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
(13132, '', '153', 'sitemap', 'O nás', 'o-nas', 0, 0, '', '2017-03-05 10:08:18', '2017-03-05 10:08:57', '2017-03-05 10:08:00', 0, '', '', '', '', '', '', 0, 1, '', 0, 3, 0),
(13133, '', '153', 'sitemap', 'Nástrojáreň a výroba', 'nastrojaren', 0, 0, '393', '2017-03-05 20:15:26', '2017-03-05 20:16:30', '2017-03-05 20:15:00', 0, '', '<p>Spoločnosť OSMOS, s.r.o. bola založen&aacute; ako spoločnosť s ručen&iacute;m obmedzen&yacute;m. Pr&aacute;vnu subjektivitu sme nadobudli 06.10.2005.</p>\r\n\r\n<p>V roku 2016 sme sa rozhodli roz&scaron;&iacute;riť p&ocirc;sobnosť firmy a v Bytči sme <strong>otvorili nov&eacute; technologick&eacute; centrum</strong> zameran&eacute; na <strong>v&yacute;robu a &uacute;pravy foriem</strong>. Pokr&yacute;vame oblasť v&yacute;roby <strong>od n&aacute;vrhu až po realiz&aacute;ciu a implement&aacute;ciu vo v&yacute;robe</strong>, vr&aacute;tane komplexn&yacute;ch dod&aacute;vok. Zameriavama sa aj na presn&uacute; kusov&uacute; a s&eacute;riov&uacute; CNC v&yacute;robu.</p>\r\n\r\n<p>Spoločnosť OSMOS, s.r.o obhospod&aacute;ruje viac ako 60 vstrekovac&iacute;ch foriem a neust&aacute;le zabezpečujeme ich funkčnosť v prev&aacute;dzke.</p>\r\n', '', '', '', '', 0, 1, '', 0, 3, 0),
(13134, '', '158', 'post', 'Softwarové vybavenie', 'softwarove-vybavenie', 0, 0, '', '2017-03-05 20:26:40', '2017-03-05 20:27:27', '2017-03-05 20:26:00', 0, '', '<p>Pri kon&scaron;trukčnej časti využ&iacute;vam&eacute; softwarov&eacute; rie&scaron;enia SolidWorksu a&nbsp;SolidCAMu s modulom&nbsp;iMachining&nbsp;pre programovanie CNC strojov.</p>\r\n', '', '', 'fa-desktop', '', 0, 1, '', 0, 3, 0),
(13135, '', '158', 'post', 'Strojové zariadenie', 'strojove-zariadenie', 0, 0, '', '2017-03-05 20:26:40', '2017-03-05 20:27:27', '2017-03-05 20:26:00', 0, '', '<p>Použ&iacute;vame tie najmodernej&scaron;ie techn&oacute;lgie, ktor&eacute; s&uacute; na trhu dostupn&eacute;. Neust&aacute;le vylep&scaron;ujeme technol&oacute;gick&eacute; možnosti.</p>\r\n', '', '', 'fa-anchor', '', 0, 1, '', 0, 3, 0),
(13136, '', '158', 'post', 'Kvalita', 'kvalita', 0, 0, '', '2017-03-05 20:26:40', '2017-03-05 20:27:27', '2017-03-05 20:26:00', 0, '', '<p>Pre kontrolu rozmerov využ&iacute;vame 3D&nbsp;meracie zariadenie od spoločnosti Hexagon Metrology.</p>\n', '', '', 'fa-check', '', 0, 1, '', 0, 3, 0),
(13137, '', '158', 'post', 'Požiadajte o ponuku', 'poziadajte-o-ponuku', 0, 0, '', '2017-03-05 20:26:40', '2017-03-05 20:27:27', '2017-03-05 20:26:00', 0, '', '<p>Po&scaron;lite n&aacute;m dopyt na <a href=\"mailto: info@osmos.sk \"><strong>info@osmos.sk</strong></a> a my v&aacute;m vypracujeme to najlep&scaron;ie rie&scaron;enie pre va&scaron;e potreby.</p>\r\n', '', '', 'fa-paper-plane', '', 0, 1, '', 0, 3, 0),
(13138, '', '158', 'post', 'Kontakt', 'kontakt', 0, 0, '', '2017-03-05 20:26:40', '2017-03-05 20:27:27', '2017-03-05 20:26:00', 0, '', '<p>Kontaktn&aacute; osoba Ing. Luk&aacute;&scaron; Korenko, tel. č. 0918 938 276.</p>\r\n', '', '', 'fa-comments', '', 0, 1, '', 0, 3, 0),
(13139, '', '158', 'post', 'Ponuka voľných vyrobných kapacít', 'ponuka-volnych-vyrobnych-kapacit', 0, 0, '', '2017-03-05 20:26:40', '2017-03-05 20:27:27', '2017-03-05 20:26:00', 0, '', '<p>Pon&uacute;kame voľn&eacute; v&yacute;robn&eacute; kapacity&nbsp;pre 5 os&eacute; fr&eacute;zovanie plynul&eacute;, 3 os&eacute; fr&eacute;zovanie.&nbsp;</p>\r\n', '', '', 'fa-search', '', 0, 1, '', 0, 3, 0),
(13140, '', '159', 'post', 'OSMOS Agie', 'img-osmos-agie', 0, 0, '394', '2017-03-05 20:57:27', '2017-03-05 21:00:02', '2017-03-05 20:57:00', 0, '', '', '', '', '', '', 0, 1, '', 0, 3, 0),
(13141, '', '159', 'post', 'OSMOS Grob', 'img-osmos-grob', 0, 0, '395', '2017-03-05 21:00:19', '2017-03-05 21:01:04', '2017-03-05 21:00:00', 0, '', '', '', '', '', '', 0, 1, '', 0, 3, 0),
(13142, '', '159', 'post', 'OSMOS 01', 'img-osmos-01', 0, 0, '396', '2017-03-05 21:01:10', '2017-03-05 21:01:51', '2017-03-05 21:01:00', 0, '', '', '', '', '', '', 0, 1, '', 0, 3, 0),
(13143, '', '159', 'post', 'OSMOS 02', 'img-osmos-02', 0, 0, '397', '2017-03-05 21:01:56', '2017-03-05 21:02:35', '2017-03-05 21:01:00', 0, '', '', '', '', '', '', 0, 1, '', 0, 3, 0),
(13144, '', '160', 'post', '5 osé CNC obrábacie centrum', 'stroj-1', 0, 0, '398', '2017-03-05 21:08:58', '2017-03-05 21:09:32', '2017-03-05 21:08:00', 0, '', '<table border=\"1\" cellpadding=\"0\" cellspacing=\"0\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"width:245px\">\r\n			<p>Pracovn&eacute; dr&aacute;hy v ose X/Y/Z [mm]</p>\r\n			</td>\r\n			<td style=\"width:227px\">\r\n			<p>800 / 1.020 / 1.020</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"width:245px\">\r\n			<p>Priemer stola &Oslash; [mm]</p>\r\n			</td>\r\n			<td style=\"width:227px\">\r\n			<p>770</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"width:245px\">\r\n			<p>Kol&iacute;zny priemer &Oslash; [mm]</p>\r\n			</td>\r\n			<td style=\"width:227px\">\r\n			<p>900</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"width:245px\">\r\n			<p>Hmotnosť n&aacute;stroja max. [kg]</p>\r\n			</td>\r\n			<td style=\"width:227px\">\r\n			<p>8</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"width:245px\">\r\n			<p>Počet miest&nbsp;v z&aacute;sobn&iacute;ku</p>\r\n			</td>\r\n			<td style=\"width:227px\">\r\n			<p>60</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"width:245px\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"width:227px\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', '', '', '', '', 0, 1, '', 0, 3, 0),
(13145, '', '160', 'post', '3 osé CNC obrábacie centrum', 'stroj-2', 0, 0, '399', '2017-03-05 21:10:58', '2017-03-05 21:11:23', '2017-03-05 21:10:00', 0, '', '<table border=\"1\" cellpadding=\"0\" cellspacing=\"0\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"width:246px\">\r\n			<p>Pracovn&yacute; rozsah [mm]</p>\r\n			</td>\r\n			<td style=\"width:227px\">\r\n			<p>610 / 430 / 570 &nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"width:246px\">\r\n			<p>Veľkosť stola [mm]</p>\r\n			</td>\r\n			<td style=\"width:227px\">\r\n			<p>650 x 450</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"width:246px\">\r\n			<p>Maxim&aacute;lna nosnosť [kg]</p>\r\n			</td>\r\n			<td style=\"width:227px\">\r\n			<p>2 x 300</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', '', '', '', '', 0, 1, '', 0, 3, 0),
(13146, '', '160', 'post', 'Brúska na plocho', 'stroj-3', 0, 0, '400', '2017-03-05 21:11:29', '2017-03-05 21:12:15', '2017-03-05 21:11:00', 0, '', '<table border=\"1\" cellpadding=\"0\" cellspacing=\"0\" style=\"-webkit-font-smoothing:antialiased; border-collapse:collapse; border-spacing:0px; box-sizing:border-box; font-family:montserrat,sans-serif; font-size:14px; line-height:22.4px; margin:0px; padding:0px\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"width:246px\">\r\n			<p style=\"text-align:justify\">&Scaron;&iacute;rka br&uacute;senia [mm]</p>\r\n			</td>\r\n			<td style=\"width:227px\">&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"width:246px\">\r\n			<p style=\"text-align:justify\">Max. posuv [mm]</p>\r\n			</td>\r\n			<td style=\"width:227px\">\r\n			<p style=\"text-align:justify\">&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"width:246px\">\r\n			<p style=\"text-align:justify\">Ot&aacute;čky br&uacute;sneho kot&uacute;ča&nbsp;[min.1]</p>\r\n			</td>\r\n			<td style=\"width:227px\">\r\n			<p style=\"text-align:justify\">&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n', '', '', '', '', 0, 1, '', 0, 3, 0),
(13147, '', '160', 'post', 'Radiálna vŕtačka', 'stroj-4', 0, 0, '401', '2017-03-05 21:12:31', '2017-03-05 21:13:15', '2017-03-05 21:12:00', 0, '', '<table border=\"1\" cellpadding=\"0\" cellspacing=\"0\" style=\"-webkit-font-smoothing:antialiased; border-collapse:collapse; border-spacing:0px; box-sizing:border-box; font-family:montserrat,sans-serif; font-size:14px; line-height:22.4px; margin:0px; padding:0px\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"width:246px\">\r\n			<p style=\"text-align:justify\">x [mm]</p>\r\n			</td>\r\n			<td style=\"width:227px\">&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"width:246px\">\r\n			<p style=\"text-align:justify\">x [mm]</p>\r\n			</td>\r\n			<td style=\"width:227px\">\r\n			<p style=\"text-align:justify\">&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"width:246px\">\r\n			<p style=\"text-align:justify\">x&nbsp;[min.1]</p>\r\n			</td>\r\n			<td style=\"width:227px\">\r\n			<p style=\"text-align:justify\">&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', '', '', '', '', 0, 1, '', 0, 3, 0),
(13148, '', '160', 'post', 'Pásová píla', 'stroj-5', 0, 0, '402', '2017-03-05 21:13:22', '2017-03-05 21:14:13', '2017-03-05 21:13:00', 0, '', '<table border=\"1\" cellpadding=\"0\" cellspacing=\"0\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"width:245px\">\r\n			<p>R&yacute;chlosť p&iacute;lov&eacute;ho p&aacute;su <span style=\"color:rgb(111, 111, 111); font-family:montserrat,sans-serif; font-size:14px\">[</span>m/min<span style=\"color:rgb(111, 111, 111); font-family:montserrat,sans-serif; font-size:14px\">]&nbsp;</span>:</p>\r\n			</td>\r\n			<td style=\"width:227px\">\r\n			<p>40 / 80&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"width:245px\">\r\n			<p>Najmen&scaron;&iacute; rezan&yacute; priemer&nbsp;<span style=\"color:rgb(111, 111, 111); font-family:montserrat,sans-serif; font-size:14px\">[</span>mm<span style=\"color:rgb(111, 111, 111); font-family:montserrat,sans-serif; font-size:14px\">]&nbsp;</span>:</p>\r\n			</td>\r\n			<td style=\"width:227px\">\r\n			<p>5</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"width:245px\">\r\n			<p>Dĺžka najkrat&scaron;ieho zbytku <span style=\"color:rgb(111, 111, 111); font-family:montserrat,sans-serif; font-size:14px\">[</span>mm<span style=\"color:rgb(111, 111, 111); font-family:montserrat,sans-serif; font-size:14px\">]&nbsp;</span>:</p>\r\n			</td>\r\n			<td style=\"width:227px\">\r\n			<p>40</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"width:245px\">\r\n			<p>Priemer materi&aacute;lu max&nbsp;<span style=\"color:rgb(111, 111, 111); font-family:montserrat,sans-serif; font-size:14px\">[</span>mm<span style=\"color:rgb(111, 111, 111); font-family:montserrat,sans-serif; font-size:14px\">]&nbsp;</span>:</p>\r\n			</td>\r\n			<td style=\"width:227px\">\r\n			<p>230</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', '', '', '', '', 0, 1, '', 0, 3, 0),
(13149, '', '160', 'post', 'Vstrekolis', 'stroj-6', 0, 0, '403', '2017-03-05 21:14:27', '2017-03-05 21:14:58', '2017-03-05 21:14:00', 0, '', '<table border=\"1\" cellpadding=\"0\" cellspacing=\"0\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"width:246px\">\r\n			<p>Max. uzatvaracia sila&nbsp;[t]</p>\r\n			</td>\r\n			<td style=\"width:227px\">\r\n			<p>130 Max</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"width:246px\">\r\n			<p>Otvorenie&nbsp;[mm]</p>\r\n			</td>\r\n			<td style=\"width:227px\">\r\n			<p>430 Min</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"width:246px\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"width:246px\">\r\n			<p>V&yacute;&scaron;ka formy&nbsp;[mm]</p>\r\n			</td>\r\n			<td style=\"width:227px\">\r\n			<p>460 Max</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"width:246px\">\r\n			<p>Rozmer medzi stĺpami&nbsp;[mm]</p>\r\n			</td>\r\n			<td style=\"width:227px\">\r\n			<p>420 x 420Max</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"width:246px\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"width:246px\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', '', '', '', '', 0, 0, '', 0, 3, 0),
(13150, '', '160', 'post', '3D meracie zariadenie', '3d-meracie-zariadenie', 0, 0, '404', '2017-03-05 21:15:11', '2017-03-05 21:15:42', '2017-03-05 21:15:00', 0, '', '<table border=\"1\" cellpadding=\"0\" cellspacing=\"0\" style=\"-webkit-font-smoothing:antialiased; border-collapse:collapse; border-spacing:0px; box-sizing:border-box; font-family:montserrat,sans-serif; font-size:14px; line-height:22.4px; margin:0px; padding:0px\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"width:246px\">\r\n			<p style=\"text-align:justify\">Rozsahy merania v ose X/Y/Z&nbsp;[mm]</p>\r\n			</td>\r\n			<td style=\"width:227px\">500 / 500-700 / 500</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"width:246px\">\r\n			<p style=\"text-align:justify\">Presnosť MPEE</p>\r\n			</td>\r\n			<td style=\"width:227px\">\r\n			<p style=\"text-align:justify\"><span style=\"color:rgb(0, 0, 0); font-family:verdana,sans-serif; font-size:11px\">1,9 + l/300 &mu;m</span></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"width:246px\">\r\n			<p style=\"text-align:justify\">&nbsp;</p>\r\n			</td>\r\n			<td style=\"width:227px\">\r\n			<p style=\"text-align:justify\">&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', '', '', '', '', 0, 1, '', 0, 3, 0),
(13151, '161', '', 'post', '', '', 0, 0, '', '2017-03-05 21:17:18', '2017-03-05 21:17:18', '2017-03-05 21:17:18', 0, '', '', '', '', '', '', 0, 0, '', 0, 3, 0),
(13152, '', '161', 'post', 'cimco', 'http://www.cimco.com/', 0, 0, '405', '2017-03-02 15:17:03', '2017-03-05 21:24:29', '2017-03-02 15:17:00', 0, '', '', '', '', '', '', 0, 1, '', 0, 3, 0),
(13153, '', '161', 'post', 'lph', 'http://www.lph.sk', 0, 0, '406', '2017-03-02 15:16:03', '2017-03-05 21:25:49', '2017-03-02 15:16:00', 0, '', '', '', '', '', '', 0, 1, '', 0, 3, 0),
(13154, '', '161', 'post', 'inventive', 'http://www.inventive.sk/', 0, 0, '407', '2017-03-02 15:13:56', '2017-03-05 21:26:08', '2017-03-02 15:13:00', 0, '', '', '', '', '', '', 0, 1, '', 0, 3, 0),
(13155, '', '161', 'post', 'J P Plast', 'http://jpplast.eu/sk/', 0, 0, '408', '2017-03-02 15:12:21', '2017-03-05 21:26:31', '2017-03-02 15:12:00', 0, '', '', '', '', '', '', 0, 1, '', 0, 3, 0),
(13156, '', '161', 'post', 'solidCAM', 'http://solidcam.cz/', 0, 0, '409', '2017-03-02 15:07:49', '2017-03-05 21:26:44', '2017-03-02 15:07:00', 0, '', '', '', '', '', '', 0, 1, '', 0, 3, 0),
(13157, '', '161', 'post', 'ISCAR', 'http://www.iscar.sk/index.aspx/countryid/12', 0, 0, '410', '2017-03-02 15:03:02', '2017-03-05 21:27:04', '2017-03-02 15:03:00', 0, '', '', '', '', '', '', 0, 1, '', 0, 3, 0),
(13158, '', '161', 'post', 'metsa tissue', 'http://www.metsatissue.com/en/Pages/default.aspx', 0, 0, '411', '2017-03-02 14:59:36', '2017-03-05 21:27:20', '2017-03-02 14:59:00', 0, '', '', '', '', '', '', 0, 1, '', 0, 3, 0),
(13159, '', '153', 'sitemap', 'Partneri', 'partneri', 0, 0, '', '2017-03-05 21:28:16', '2017-03-05 21:28:34', '2017-03-05 21:28:00', 0, '', '', '', '', '', '', 0, 1, '', 0, 3, 0),
(13160, '', '153', 'sitemap', 'Kariéra', 'kariera', 0, 0, '412', '2017-03-05 21:28:39', '2017-03-05 21:29:45', '2017-03-05 21:28:00', 0, '', '<h3>Pridajte sa k n&aacute;&scaron;mu t&iacute;mu!</h3>\r\n\r\n<p>Na tejto str&aacute;nke sa m&ocirc;žete uch&aacute;dzať o pr&aacute;cu v&nbsp;oblastiach, ktor&eacute; firma OSMOS pon&uacute;ka &ndash; oblasť obchodu, služieb, v&yacute;voja, kon&scaron;truovania, IT spr&aacute;vy, riadenia projektov, pl&aacute;novania, logistiky, v&yacute;roby so zameran&iacute;m na stroj&aacute;rstvo a v&yacute;robu plastov.</p>\r\n\r\n<p>Ak m&aacute;te z&aacute;ujem pracovať u n&aacute;s vo firme OSMOS a poz&iacute;cia ktor&uacute; chcete vykon&aacute;vať moment&aacute;lne nie je inzerovan&aacute;, m&ocirc;žete n&aacute;m poslať otvoren&uacute; žiadosť o zamestnanie. V pr&iacute;pade uvoľnenia poz&iacute;cie&nbsp;ktor&uacute; chcete vykon&aacute;vať, budeme v&aacute;s kontaktovať.&nbsp;</p>\r\n\r\n<p>Svoje otvoren&eacute; žiadosti o zamestnanie n&aacute;m za&scaron;lite spolu so životopisom na info@osmos.sk</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<div class=\"row\" style=\"width: 91%;\"><iframe src=\"https://tech.interspeedia.com/jobs/show.php?id=36416.cl0000373&amp;tf=1\" style=\"        width: 115%;\r\n    overflow-x: hidden;\r\n    border: 0px;\r\n    height: 900px;\r\n    overflow-y: hidden;\r\n    margin-left: -10px;\"></iframe></div>\r\n', '', '', '', '', 0, 1, '', 0, 3, 0),
(13161, '', '153', 'sitemap', 'Kontakt', '', 0, 0, '', '2017-03-05 21:30:00', '2017-03-05 21:30:17', '2017-03-05 21:30:00', 0, '', '', '', '', '', '', 0, 1, '', 0, 3, 0);

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
(153, 1, 0, 'sitemap', 'sitemap', 'Stránky', 1, 0, 3, 0),
(154, 1, 0, 'sitemap-sub', 'sitemap', 'Podstránky', 1, 0, 3, 0),
(155, 1, 0, 'article', 'sitemap', 'Články', 1, 0, 3, 0),
(156, 3, 0, 'newsletter', 'post', 'Newslettre', 1, 0, 3, 0),
(157, 2, 0, 'domace', 'article', 'Domáce', 1, 0, 3, 0),
(158, 2, 0, 'sluzby', 'post', 'Služby', 1, 0, 3, 0),
(159, 2, 0, 'obrazky', 'post', 'Obrázky', 1, 0, 3, 0),
(160, 2, 0, 'stroje', 'post', 'Stroje', 1, 0, 3, 0),
(161, 2, 0, 'partneri', 'post', 'Partneri', 1, 0, 3, 0);

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
(886, 'title', 'Osmos', 3),
(887, 'keywords', 'osmos, pdc', 3),
(888, 'cachovanie', '0', 3),
(889, 'server', 'http://prvedentalnecentrum.sk/', 3),
(890, 'startovaci_modul', '', 3),
(891, 'target', '', 3),
(892, 'facebook_page', 'https://www.facebook.com/osmosbratislava', 3),
(893, 'twitter', 'https://twitter.com/', 3),
(894, 'youtube', 'https://www.youtube.com/', 3),
(895, 'flickr', 'https://www.flickr.com/', 3),
(896, 'linked_in', 'https://www.linkedin.com/', 3),
(897, 'web', '', 3),
(898, 'google_plus', 'https://plus.google.com/', 3),
(899, 'sirka_fotky_sponzori_modul', '200', 3),
(900, 'notifikacny_email', 'thomas.doubek@gmail.com', 3),
(901, 'blokvane_ip', '', 3),
(902, 'vendor_street', '', 3),
(903, 'vendor_company', 'Osmos', 3),
(904, 'vendor_psc', '', 3),
(905, 'vendor_city', '', 3),
(906, 'vendor_tel', '+421 2 6381 3478', 3),
(907, 'vendor_fax', '', 3),
(908, 'vendor_email', 'info@osmos.sk', 3),
(909, 'vendor_ico', '', 3),
(910, 'vendor_dic', '', 3),
(911, 'vendor_iban', '', 3),
(912, 'vendor_dph', '20', 3),
(913, 'vendor_currency', '€', 3),
(914, 'facebook', 'https://www.facebook.com', 3),
(915, 'instagram', 'https://instagram.com/dnt-system/', 3),
(916, 'platca_dph', '1', 3),
(917, 'vendor_currency_nazov', 'Eur', 3),
(918, 'logo_firmy', '392', 3),
(919, 'no_img', '259', 3),
(920, 'no_comment', 'no_comment.png', 3),
(921, 'default_lang', '', 3),
(922, 'default_stat_user', '', 3),
(923, 'google_map', 'https://www.google.sk/maps/@48.2091661,17.0034239,13z?hl=sk', 3),
(924, 'description', 'Osmos s.r.o. - CAD/CAM v oblasti strojárskej výroby. PLM/PDM riešenia pre Vašu výrobu. Kooperácia výroby a vytažovanie výrobných kapacít. Konštrukcia vstrekovacích foriem.', 3);

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
(64172, 3, 'sk', 'home', 'static', '', 'Domov', 1, 0),
(64173, 3, 'en', 'home', 'static', '', 'Home', 1, 0),
(64174, 3, 'sk', 'home', 'static', '', 'Domov', 1, 0),
(64175, 3, 'en', 'home', 'static', '', 'Home', 1, 0),
(64176, 3, 'en', '4589', 'name', 'dnt_posts', 'About us', 1, 0),
(64177, 3, 'en', '4592', 'name', 'dnt_posts', 'About us 2', 1, 0),
(64178, 3, 'en', '8972', 'name', 'dnt_posts', 'Test Article', 1, 0),
(64179, 3, 'en', '8972', 'name_url', 'dnt_posts', 'test-article', 1, 0),
(64180, 3, 'en', '8972', 'perex', 'dnt_posts', '<p>I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account</p>\r\n', 1, 0),
(64181, 3, 'en', '8972', 'content', 'dnt_posts', '<p>I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account</p>\r\n', 1, 0),
(64182, 3, 'en', '8972', 'tags', 'dnt_posts', 'car,test', 1, 0),
(64183, 3, 'de', '8972', 'name', 'dnt_posts', 'Ta test', 1, 0),
(64184, 3, 'de', '8972', 'name_url', 'dnt_posts', 'ta-test', 1, 0),
(64185, 3, 'de', '8972', 'perex', 'dnt_posts', '<p>I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account</p>\r\n', 1, 0),
(64186, 3, 'de', '8972', 'content', 'dnt_posts', '<p>I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account</p>\r\n', 1, 0),
(64187, 3, 'de', '8972', 'tags', 'dnt_posts', 'das auto, das test', 1, 0),
(64188, 3, 'en', '10498', 'name', 'dnt_posts', '', 1, 0),
(64189, 3, 'en', '10498', 'name_url', 'dnt_posts', '', 1, 0),
(64190, 3, 'en', '10498', 'perex', 'dnt_posts', '', 1, 0),
(64191, 3, 'en', '10498', 'content', 'dnt_posts', '', 1, 0),
(64192, 3, 'en', '10498', 'tags', 'dnt_posts', '', 1, 0),
(64193, 3, 'de', '10498', 'name', 'dnt_posts', '', 1, 0),
(64194, 3, 'de', '10498', 'name_url', 'dnt_posts', '', 1, 0),
(64195, 3, 'de', '10498', 'perex', 'dnt_posts', '', 1, 0),
(64196, 3, 'de', '10498', 'content', 'dnt_posts', '', 1, 0),
(64197, 3, 'de', '10498', 'tags', 'dnt_posts', '', 1, 0),
(64198, 3, 'en', '13064', 'name', 'dnt_posts', '', 1, 0),
(64199, 3, 'en', '13064', 'name_url', 'dnt_posts', '', 1, 0),
(64200, 3, 'en', '13064', 'perex', 'dnt_posts', '', 1, 0),
(64201, 3, 'en', '13064', 'content', 'dnt_posts', '', 1, 0),
(64202, 3, 'en', '13064', 'tags', 'dnt_posts', '', 1, 0),
(64203, 3, 'de', '13064', 'name', 'dnt_posts', '', 1, 0),
(64204, 3, 'de', '13064', 'name_url', 'dnt_posts', '', 1, 0),
(64205, 3, 'de', '13064', 'perex', 'dnt_posts', '', 1, 0),
(64206, 3, 'de', '13064', 'content', 'dnt_posts', '', 1, 0),
(64207, 3, 'de', '13064', 'tags', 'dnt_posts', '', 1, 0),
(64208, 3, 'en', '13065', 'name', 'dnt_posts', 'cfhfghg', 1, 0),
(64209, 3, 'en', '13065', 'name_url', 'dnt_posts', '', 1, 0),
(64210, 3, 'en', '13065', 'perex', 'dnt_posts', '', 1, 0),
(64211, 3, 'en', '13065', 'content', 'dnt_posts', '', 1, 0),
(64212, 3, 'en', '13065', 'tags', 'dnt_posts', '', 1, 0),
(64213, 3, 'de', '13065', 'name', 'dnt_posts', '', 1, 0),
(64214, 3, 'de', '13065', 'name_url', 'dnt_posts', '', 1, 0),
(64215, 3, 'de', '13065', 'perex', 'dnt_posts', '', 1, 0),
(64216, 3, 'de', '13065', 'content', 'dnt_posts', '', 1, 0),
(64217, 3, 'de', '13065', 'tags', 'dnt_posts', '', 1, 0),
(64218, 3, 'en', '13066', 'name', 'dnt_posts', '', 1, 0),
(64219, 3, 'en', '13066', 'name_url', 'dnt_posts', '', 1, 0),
(64220, 3, 'en', '13066', 'perex', 'dnt_posts', '', 1, 0),
(64221, 3, 'en', '13066', 'content', 'dnt_posts', '', 1, 0),
(64222, 3, 'en', '13066', 'tags', 'dnt_posts', '', 1, 0),
(64223, 3, 'de', '13066', 'name', 'dnt_posts', '', 1, 0),
(64224, 3, 'de', '13066', 'name_url', 'dnt_posts', '', 1, 0),
(64225, 3, 'de', '13066', 'perex', 'dnt_posts', '', 1, 0),
(64226, 3, 'de', '13066', 'content', 'dnt_posts', '', 1, 0),
(64227, 3, 'de', '13066', 'tags', 'dnt_posts', '', 1, 0),
(64228, 3, 'en', '13063', 'name', 'dnt_posts', '', 1, 0),
(64229, 3, 'en', '13063', 'name_url', 'dnt_posts', '', 1, 0),
(64230, 3, 'en', '13063', 'perex', 'dnt_posts', '', 1, 0),
(64231, 3, 'en', '13063', 'content', 'dnt_posts', '', 1, 0),
(64232, 3, 'en', '13063', 'tags', 'dnt_posts', '', 1, 0),
(64233, 3, 'de', '13063', 'name', 'dnt_posts', '', 1, 0),
(64234, 3, 'de', '13063', 'name_url', 'dnt_posts', '', 1, 0),
(64235, 3, 'de', '13063', 'perex', 'dnt_posts', '', 1, 0),
(64236, 3, 'de', '13063', 'content', 'dnt_posts', '', 1, 0),
(64237, 3, 'de', '13063', 'tags', 'dnt_posts', '', 1, 0),
(64238, 3, 'en', '13067', 'name', 'dnt_posts', 'Tooling & Molding<br/> ', 1, 0),
(64239, 3, 'en', '13067', 'name_url', 'dnt_posts', '', 1, 0),
(64240, 3, 'en', '13067', 'perex', 'dnt_posts', '<p>In 2016 we decided to expand the scope of the company in Bytča, we opened a new technology center for the production and treatment of injection molds for plastics.</p>\r\n', 1, 0),
(64241, 3, 'en', '13067', 'content', 'dnt_posts', '', 1, 0),
(64242, 3, 'en', '13067', 'tags', 'dnt_posts', '', 1, 0),
(64243, 3, 'de', '13067', 'name', 'dnt_posts', 'Werkzeug- und Vorrichtungsbau', 1, 0),
(64244, 3, 'de', '13067', 'name_url', 'dnt_posts', '', 1, 0),
(64245, 3, 'de', '13067', 'perex', 'dnt_posts', '<p>Dieser Beitrag hat keine Vorschau Artikel, weil ihr Inhalt ist wahrscheinlich von multymedi&aacute;lneho Inhalt bestehen. Bitte klicken um mehr zu lesen und Sie k&ouml;nnen den gew&auml;hlten Inhalt zu sehen.</p>\r\n', 1, 0),
(64246, 3, 'de', '13067', 'content', 'dnt_posts', '', 1, 0),
(64247, 3, 'de', '13067', 'tags', 'dnt_posts', '', 1, 0),
(64248, 3, 'en', '13068', 'name', 'dnt_posts', '', 1, 0),
(64249, 3, 'en', '13068', 'name_url', 'dnt_posts', '', 1, 0),
(64250, 3, 'en', '13068', 'perex', 'dnt_posts', '', 1, 0),
(64251, 3, 'en', '13068', 'content', 'dnt_posts', '', 1, 0),
(64252, 3, 'en', '13068', 'tags', 'dnt_posts', '', 1, 0),
(64253, 3, 'de', '13068', 'name', 'dnt_posts', '', 1, 0),
(64254, 3, 'de', '13068', 'name_url', 'dnt_posts', '', 1, 0),
(64255, 3, 'de', '13068', 'perex', 'dnt_posts', '', 1, 0),
(64256, 3, 'de', '13068', 'content', 'dnt_posts', '', 1, 0),
(64257, 3, 'de', '13068', 'tags', 'dnt_posts', '', 1, 0),
(64258, 3, 'en', '13069', 'name', 'dnt_posts', 'Research & Development<br/> ', 1, 0),
(64259, 3, 'en', '13069', 'name_url', 'dnt_posts', '', 1, 0),
(64260, 3, 'en', '13069', 'perex', 'dnt_posts', '<p>Today s full-time startups and new technologies have increasingly higher demands on the functionality and efficiency of the solutions available on the market.</p>\r\n', 1, 0),
(64261, 3, 'en', '13069', 'content', 'dnt_posts', '', 1, 0),
(64262, 3, 'en', '13069', 'tags', 'dnt_posts', '', 1, 0),
(64263, 3, 'de', '13069', 'name', 'dnt_posts', 'Forschung und Entwicklung', 1, 0),
(64264, 3, 'de', '13069', 'name_url', 'dnt_posts', '', 1, 0),
(64265, 3, 'de', '13069', 'perex', 'dnt_posts', '<p>Die heutige Vollzeit Start-ups und neue Technologien haben immer h&ouml;here Anforderungen an die Funktionalit&auml;t und Effizienz der verf&uuml;gbaren L&ouml;sungen auf dem Markt.</p>\r\n', 1, 0),
(64266, 3, 'de', '13069', 'content', 'dnt_posts', '', 1, 0),
(64267, 3, 'de', '13069', 'tags', 'dnt_posts', '', 1, 0),
(64268, 3, 'en', '13071', 'name', 'dnt_posts', 'Research & Development', 1, 0),
(64269, 3, 'en', '13071', 'name_url', 'dnt_posts', '', 1, 0),
(64270, 3, 'en', '13071', 'perex', 'dnt_posts', '<p>We are constantly looking for better solutions...</p>\r\n', 1, 0),
(64271, 3, 'en', '13071', 'content', 'dnt_posts', '', 1, 0),
(64272, 3, 'en', '13071', 'tags', 'dnt_posts', '', 1, 0),
(64273, 3, 'de', '13071', 'name', 'dnt_posts', 'Forschung und Entwicklung', 1, 0),
(64274, 3, 'de', '13071', 'name_url', 'dnt_posts', '', 1, 0),
(64275, 3, 'de', '13071', 'perex', 'dnt_posts', '<p>Wir sind st&auml;ndig auf der Suche nach besseren L&ouml;sungen...</p>\r\n', 1, 0),
(64276, 3, 'de', '13071', 'content', 'dnt_posts', '', 1, 0),
(64277, 3, 'de', '13071', 'tags', 'dnt_posts', '', 1, 0),
(64278, 3, 'en', '13072', 'name', 'dnt_posts', 'PDC', 1, 0),
(64279, 3, 'en', '13072', 'name_url', 'dnt_posts', '', 1, 0),
(64280, 3, 'en', '13072', 'perex', 'dnt_posts', '<p><strong>Plan-de-Campagne</strong><span style=\"font-family:tahoma,geneva,sans-serif; font-size:15.4px\">&nbsp;</span><strong>(PdC)</strong><span style=\"font-family:tahoma,geneva,sans-serif; font-size:15.4px\">&nbsp;is&nbsp;....</span></p>\r\n', 1, 0),
(64281, 3, 'en', '13072', 'content', 'dnt_posts', '', 1, 0),
(64282, 3, 'en', '13072', 'tags', 'dnt_posts', '', 1, 0),
(64283, 3, 'de', '13072', 'name', 'dnt_posts', 'PDC', 1, 0),
(64284, 3, 'de', '13072', 'name_url', 'dnt_posts', '', 1, 0),
(64285, 3, 'de', '13072', 'perex', 'dnt_posts', '', 1, 0),
(64286, 3, 'de', '13072', 'content', 'dnt_posts', '', 1, 0),
(64287, 3, 'de', '13072', 'tags', 'dnt_posts', '', 1, 0),
(64288, 3, 'en', '13073', 'name', 'dnt_posts', 'Free production capacities', 1, 0),
(64289, 3, 'en', '13073', 'name_url', 'dnt_posts', '', 1, 0),
(64290, 3, 'en', '13073', 'perex', 'dnt_posts', '<p>Free production capacities for continuouse 5 axis milling</p>\r\n', 1, 0),
(64291, 3, 'en', '13073', 'content', 'dnt_posts', '', 1, 0),
(64292, 3, 'en', '13073', 'tags', 'dnt_posts', '', 1, 0),
(64293, 3, 'de', '13073', 'name', 'dnt_posts', '', 1, 0),
(64294, 3, 'de', '13073', 'name_url', 'dnt_posts', '', 1, 0),
(64295, 3, 'de', '13073', 'perex', 'dnt_posts', '', 1, 0),
(64296, 3, 'de', '13073', 'content', 'dnt_posts', '', 1, 0),
(64297, 3, 'de', '13073', 'tags', 'dnt_posts', '', 1, 0),
(64298, 3, 'en', 'header_top_vitajte_1', 'static', '', 'Welcome visitor can you', 1, 0),
(64299, 3, 'en', 'alebo', 'static', '', 'or', 1, 0),
(64300, 3, 'sk', 'header_top_vitajte_1', 'static', '', 'Vitajte zákazník! Chcete sa', 1, 0),
(64301, 3, 'sk', 'alebo', 'static', '', 'alebo', 1, 0),
(64302, 3, 'en', 'prihlasit', 'static', '', 'Login to client zone', 1, 0),
(64303, 3, 'sk', 'prihlasit', 'static', '', 'Prihlásenie do klientskej zóny', 1, 0),
(64304, 3, 'en', 'registrovat', 'static', '', 'Create an Account', 1, 0),
(64305, 3, 'sk', 'registrovat', 'static', '', 'Vytvoriť nový účet', 1, 0),
(64306, 3, 'en', 'moj_ucet', 'static', '', 'My Account', 1, 0),
(64307, 3, 'sk', 'moj_ucet', 'static', '', 'Môj účet', 1, 0),
(64308, 3, 'en', 'nakupny_kosik', 'static', '', 'Orders List', 1, 0),
(64309, 3, 'sk', 'nakupny_kosik', 'static', '', 'Nákupný košík', 1, 0),
(64310, 3, 'en', 'pridat_do_kosika', 'static', '', '+ add to cart', 1, 0),
(64311, 3, 'sk', 'pridat_do_kosika', 'static', '', '+ do košíka', 1, 0),
(64312, 3, 'en', 'zobrazit_ako', 'static', '', 'View as', 1, 0),
(64313, 3, 'sk', 'zobrazit_ako', 'static', '', 'Zobraziť ako', 1, 0),
(64314, 3, 'en', 'kategorie', 'static', '', 'Categories', 1, 0),
(64315, 3, 'sk', 'kategorie', 'static', '', 'Kategórie', 1, 0),
(64316, 3, 'en', 'zdielat', 'static', '', '+ share', 1, 0),
(64317, 3, 'sk', 'zdielat', 'static', '', '+ zdielať', 1, 0),
(64318, 3, 'en', 'prejst_na_produkt', 'static', '', 'Go to the product', 1, 0),
(64319, 3, 'sk', 'prejst_na_produkt', 'static', '', 'Prejsť na produkt', 1, 0),
(64320, 3, 'en', 'pridane', 'static', '', 'Posted', 1, 0),
(64321, 3, 'sk', 'pridane', 'static', '', 'Pridané', 1, 0),
(64322, 3, 'en', 'vysledky', 'static', '', 'Results', 1, 0),
(64323, 3, 'sk', 'vysledky', 'static', '', 'Výsledky', 1, 0),
(64324, 3, 'en', 'z', 'static', '', 'of', 1, 0),
(64325, 3, 'sk', 'z', 'static', '', 'z', 1, 0),
(64326, 3, 'en', 'stran', 'static', '', 'pages', 1, 0),
(64327, 3, 'sk', 'stran', 'static', '', 'strán', 1, 0),
(64328, 3, 'en', 'order_by_news', 'static', '', 'Sort by latest', 1, 0),
(64329, 3, 'sk', 'order_by_news', 'static', '', 'Zoradiť podľa najnovších', 1, 0),
(64330, 3, 'en', 'order_by_ship_asc', 'static', '', 'Sort by cheapest', 1, 0),
(64331, 3, 'sk', 'order_by_ship_asc', 'static', '', 'Zoradiť od najlacnejších', 1, 0),
(64332, 3, 'en', 'order_by_ship_desc', 'static', '', 'Sort by most expensive', 1, 0),
(64333, 3, 'sk', 'order_by_ship_desc', 'static', '', 'Zoradiť od najdrahších', 1, 0),
(64334, 3, 'en', 'order_by_name_a_z', 'static', '', 'Sort by name (A - Z)', 1, 0),
(64335, 3, 'sk', 'order_by_name_a_z', 'static', '', 'Podľa názvu (A - Z)', 1, 0),
(64336, 3, 'en', 'order_by_name_z_a', 'static', '', 'Sort by name (Z - A)', 1, 0),
(64337, 3, 'sk', 'order_by_name_z_a', 'static', '', 'Podľa názvu (Z - A)', 1, 0),
(64338, 3, 'en', 'vyber_znacku', 'static', '', 'Choose a brand', 1, 0),
(64339, 3, 'sk', 'vyber_znacku', 'static', '', 'Vyberte značku', 1, 0),
(64340, 3, 'en', 'nakupny_kosik_je_prazdny', 'static', '', 'Your cart is empty!', 1, 0),
(64341, 3, 'sk', 'nakupny_kosik_je_prazdny', 'static', '', 'Váš nákupný košík je prázdny!', 1, 0),
(64342, 3, 'en', 'nazov_produktu', 'static', '', 'Product Image &amp; Name', 1, 0),
(64343, 3, 'sk', 'nazov_produktu', 'static', '', 'Názov produktu a fotka', 1, 0),
(64344, 3, 'en', 'cena', 'static', '', 'Price', 1, 0),
(64345, 3, 'sk', 'cena', 'static', '', 'Cena', 1, 0),
(64346, 3, 'en', 'pocet_kusov', 'static', '', 'Quantity', 1, 0),
(64347, 3, 'sk', 'pocet_kusov', 'static', '', 'Počet kusov', 1, 0),
(64348, 3, 'en', 'sub_total', 'static', '', 'Overal / items', 1, 0),
(64349, 3, 'sk', 'sub_total', 'static', '', 'Spolu / počet kusov', 1, 0),
(64350, 3, 'en', 'vymazat', 'static', '', 'Remove', 1, 0),
(64351, 3, 'sk', 'vymazat', 'static', '', 'Vymazať', 1, 0),
(64352, 3, 'en', 'upravit', 'static', '', 'Update', 1, 0),
(64353, 3, 'sk', 'upravit', 'static', '', 'Upraviť', 1, 0),
(64354, 3, 'en', 'suma', 'static', '', 'Resulting amount', 1, 0),
(64355, 3, 'sk', 'suma', 'static', '', 'Výsledná suma', 1, 0),
(64356, 3, 'en', 'suma_bez_dph', 'static', '', 'Amount vat', 1, 0),
(64357, 3, 'sk', 'suma_bez_dph', 'static', '', 'Suma bez DPH', 1, 0),
(64358, 3, 'en', 'dan', 'static', '', 'Tax', 1, 0),
(64359, 3, 'sk', 'dan', 'static', '', 'Daň', 1, 0),
(64360, 3, 'en', 'dph', 'static', '', 'VAT', 1, 0),
(64361, 3, 'sk', 'dph', 'static', '', 'DPH', 1, 0),
(64362, 3, 'en', 'dodacie_udaje', 'static', '', 'Shipping information', 1, 0),
(64363, 3, 'sk', 'dodacie_udaje', 'static', '', 'Dodacie údaje', 1, 0),
(64364, 3, 'en', 'prosim_vyplnte_dodacie_udaje', 'static', '', 'Please fill shipping information', 1, 0),
(64365, 3, 'sk', 'prosim_vyplnte_dodacie_udaje', 'static', '', 'Prosím vyplnte dodacie údaje', 1, 0),
(64366, 3, 'en', 'meno', 'static', '', 'Name', 1, 0),
(64367, 3, 'sk', 'meno', 'static', '', 'Meno', 1, 0),
(64368, 3, 'en', 'priezvisko', 'static', '', 'Surname', 1, 0),
(64369, 3, 'sk', 'priezvisko', 'static', '', 'Priezvisko', 1, 0),
(64370, 3, 'en', 'email', 'static', '', 'Email', 1, 0),
(64371, 3, 'sk', 'email', 'static', '', 'Email', 1, 0),
(64372, 3, 'en', 'tel_c', 'static', '', 'Telephone number', 1, 0),
(64373, 3, 'sk', 'tel_c', 'static', '', 'Telefónne číslo', 1, 0),
(64374, 3, 'en', 'ulica', 'static', '', 'Street', 1, 0),
(64375, 3, 'sk', 'ulica', 'static', '', 'Ulica', 1, 0),
(64376, 3, 'en', 'c_domu', 'static', '', 'House number', 1, 0),
(64377, 3, 'sk', 'c_domu', 'static', '', 'Číslo domu', 1, 0),
(64378, 3, 'en', 'psc', 'static', '', 'Postcode', 1, 0),
(64379, 3, 'sk', 'psc', 'static', '', 'Smerovacie číslo (PSČ)', 1, 0),
(64380, 3, 'en', 'sposob_platby', 'static', '', 'Payment method', 1, 0),
(64381, 3, 'sk', 'sposob_platby', 'static', '', 'Spôsob platby', 1, 0),
(64382, 3, 'en', 'sposob_dopravy', 'static', '', 'Transport method / pickup goods', 1, 0),
(64383, 3, 'sk', 'sposob_dopravy', 'static', '', 'Spôsob dopravy / vyzdvihnutie tovaru', 1, 0),
(64384, 3, 'en', 'poznamka', 'static', '', 'Note', 1, 0),
(64385, 3, 'sk', 'poznamka', 'static', '', 'Poznámka', 1, 0),
(64386, 3, 'en', 'pole_je_volitelne', 'static', '', 'The field is optional', 1, 0),
(64387, 3, 'sk', 'pole_je_volitelne', 'static', '', 'Toto pole je voliteľné', 1, 0),
(64388, 3, 'en', 'pole_je_povinne', 'static', '', 'The field is required', 1, 0),
(64389, 3, 'sk', 'pole_je_povinne', 'static', '', 'Toto pole je povinné', 1, 0),
(64390, 3, 'en', 'mesto', 'static', '', 'City', 1, 0),
(64391, 3, 'sk', 'mesto', 'static', '', 'Mesto', 1, 0),
(64392, 3, 'en', 'krajina', 'static', '', 'Country', 1, 0),
(64393, 3, 'sk', 'krajina', 'static', '', 'Štát', 1, 0),
(64394, 3, 'en', 'prosim_vyberte_si', 'static', '', 'Please select', 1, 0),
(64395, 3, 'sk', 'prosim_vyberte_si', 'static', '', 'Prosím vyberte si', 1, 0),
(64396, 3, 'en', 'potvrdit_objednavku', 'static', '', 'Confirm order', 1, 0),
(64397, 3, 'sk', 'potvrdit_objednavku', 'static', '', 'Potvrdiť objednávku', 1, 0),
(64398, 3, 'en', 'registracia', 'static', '', 'Registration', 1, 0),
(64399, 3, 'sk', 'registracia', 'static', '', 'Registrácia', 1, 0),
(64400, 3, 'en', 'chcem_sa_zaregistrovat', 'static', '', 'I want to register for better comfort', 1, 0),
(64401, 3, 'sk', 'chcem_sa_zaregistrovat', 'static', '', 'Chcem sa zaregistrovať a tak nakupovať z pohodlia domova', 1, 0),
(64402, 3, 'en', 'heslo', 'static', '', 'Password', 1, 0),
(64403, 3, 'sk', 'heslo', 'static', '', 'Heslo', 1, 0),
(64404, 3, 'en', 'heslo_overenie', 'static', 'dnt_translates', 'Copy password', 1, 0),
(64405, 3, 'sk', 'heslo_overenie', 'static', 'dnt_translates', 'Overenie hesla', 1, 0),
(64406, 3, 'en', 'zaregistruj_ma', 'static', '', 'Register me', 1, 0),
(64407, 3, 'sk', 'zaregistruj_ma', 'static', '', 'Zaregistruj ma', 1, 0),
(64408, 3, 'en', 'filter', 'static', '', 'Filter', 1, 0),
(64409, 3, 'sk', 'filter', 'static', '', 'Filter', 1, 0),
(64410, 3, 'en', 'rok', 'static', '', 'Year', 1, 0),
(64411, 3, 'sk', 'rok', 'static', '', 'Rok', 1, 0),
(64412, 3, 'en', 'galeria', 'static', '', 'Gallery', 1, 0),
(64413, 3, 'sk', 'galeria', 'static', '', 'Galéria', 1, 0),
(64414, 3, 'en', 'vsetky_albumy', 'static', '', 'All albums', 1, 0),
(64415, 3, 'sk', 'vsetky_albumy', 'static', '', 'Všetky albumy', 1, 0),
(64416, 3, 'en', 'kontakt', 'static', '', 'Contact', 1, 0),
(64417, 3, 'sk', 'kontakt', 'static', '', 'Kontakt', 1, 0),
(64418, 3, 'en', 'kontakt_info', 'static', '', 'Contact Info', 1, 0),
(64419, 3, 'sk', 'kontakt_info', 'static', '', 'Kontaktné informácie', 1, 0),
(64420, 3, 'en', 'kontaktny_formular', 'static', '', 'Contact Form', 1, 0),
(64421, 3, 'sk', 'kontaktny_formular', 'static', '', 'Kontaktný formulár', 1, 0),
(64422, 3, 'en', 'predmet', 'static', '', 'Subject', 1, 0),
(64423, 3, 'sk', 'predmet', 'static', '', 'Predmet', 1, 0),
(64424, 3, 'en', 'sprava', 'static', '', 'Message', 1, 0),
(64425, 3, 'sk', 'sprava', 'static', '', 'Správa', 1, 0),
(64426, 3, 'en', 'odoslat', 'static', '', 'Submit', 1, 0),
(64427, 3, 'sk', 'odoslat', 'static', '', 'Odoslať', 1, 0),
(64428, 3, 'en', 'pondelok', 'static', '', 'Monday', 1, 0),
(64429, 3, 'sk', 'pondelok', 'static', '', 'Pondelok', 1, 0),
(64430, 3, 'en', 'utorok', 'static', '', 'Tuesday', 1, 0),
(64431, 3, 'sk', 'utorok', 'static', '', 'Utorok', 1, 0),
(64432, 3, 'en', 'streda', 'static', '', 'Wednesday', 1, 0),
(64433, 3, 'sk', 'streda', 'static', '', 'Streda', 1, 0),
(64434, 3, 'en', 'stvrtok', 'static', '', 'Thursday', 1, 0),
(64435, 3, 'sk', 'stvrtok', 'static', '', 'Štvrtok', 1, 0),
(64436, 3, 'en', 'piatok', 'static', '', 'Friday', 1, 0),
(64437, 3, 'sk', 'piatok', 'static', '', 'Piatok', 1, 0),
(64438, 3, 'en', 'sobota', 'static', '', 'Saturday', 1, 0),
(64439, 3, 'sk', 'sobota', 'static', '', 'Sobota', 1, 0),
(64440, 3, 'en', 'nedela', 'static', '', 'Sunday', 1, 0),
(64441, 3, 'sk', 'nedela', 'static', '', 'Nedeľa', 1, 0),
(64442, 3, 'en', 'clanky', 'static', '', 'Blog', 1, 0),
(64443, 3, 'sk', 'clanky', 'static', '', 'Články', 1, 0),
(64444, 3, 'en', 'pridane', 'static', '', 'Posted', 1, 0),
(64445, 3, 'sk', 'pridane', 'static', '', 'Pridané', 1, 0),
(64446, 3, 'en', 'hlaska_pocet_komentarov', 'static', '', 'comment(s) in this post', 1, 0),
(64447, 3, 'sk', 'hlaska_pocet_komentarov', 'static', '', 'komentárov v tomto príspevku', 1, 0),
(64448, 3, 'en', 'hodnotenie_postu_hlaska', 'static', '', 'Automatic post assessment', 1, 0),
(64449, 3, 'sk', 'hodnotenie_postu_hlaska', 'static', '', 'Automatické hodnotenie príspevku', 1, 0),
(64450, 3, 'en', 'ziaden_obsah_k_zobrazeniu', 'static', '', 'Sorry, no posts to show', 1, 0),
(64451, 3, 'sk', 'ziaden_obsah_k_zobrazeniu', 'static', '', 'Ľutujeme, ale žiaden obsah nie je k zobrazeniu', 1, 0),
(64452, 3, 'en', 'citat_viac', 'static', '', 'Read more', 1, 0),
(64453, 3, 'sk', 'citat_viac', 'static', '', 'Čítať viac', 1, 0),
(64454, 3, 'en', 'vitajte', 'static', '', 'Welcome', 1, 0),
(64455, 3, 'sk', 'vitajte', 'static', '', 'Vitajte', 1, 0),
(64456, 3, 'en', 'objednavok', 'static', '', 'Orders', 1, 0),
(64457, 3, 'sk', 'objednavok', 'static', '', 'Objednávok', 1, 0),
(64458, 3, 'en', 'zaplatene', 'static', '', 'Total paid', 1, 0),
(64459, 3, 'sk', 'zaplatene', 'static', '', 'Spolu zaplatené', 1, 0),
(64460, 3, 'en', 'komentarov', 'static', '', 'Comments', 1, 0),
(64461, 3, 'sk', 'komentarov', 'static', '', 'Komentárov', 1, 0),
(64462, 3, 'en', 'priemerna_cena_za_nakup', 'static', '', 'Average price <br/>per shopping', 1, 0),
(64463, 3, 'sk', 'priemerna_cena_za_nakup', 'static', '', 'Priemerná cena <br/>za nákup', 1, 0),
(64464, 3, 'en', 'informacie', 'static', '', 'Informations', 1, 0),
(64465, 3, 'sk', 'informacie', 'static', '', 'Informácie', 1, 0),
(64466, 3, 'en', 'moj_profil', 'static', '', 'My profile ', 1, 0),
(64467, 3, 'sk', 'moj_profil', 'static', '', 'Môj profil', 1, 0),
(64468, 3, 'en', 'moje_udaje', 'static', '', 'My data ', 1, 0),
(64469, 3, 'sk', 'moje_udaje', 'static', '', 'Moje údaje', 1, 0),
(64470, 3, 'en', 'upravit_udaje', 'static', '', 'Edit my data', 1, 0),
(64471, 3, 'sk', 'upravit_udaje', 'static', '', 'Upraviť údaje', 1, 0),
(64472, 3, 'en', 'moje_objednavky', 'static', '', 'My orders', 1, 0),
(64473, 3, 'sk', 'moje_objednavky', 'static', '', 'Moje objednávky', 1, 0),
(64474, 3, 'en', 'zmenit_heslo', 'static', '', 'Change password', 1, 0),
(64475, 3, 'sk', 'zmenit_heslo', 'static', '', 'Zmeniť heslo', 1, 0),
(64476, 3, 'en', 'nepotvrdena_objednavka', 'static', '', 'Order not confirmed', 1, 0),
(64477, 3, 'sk', 'nepotvrdena_objednavka', 'static', '', 'Objednávka nepotvrdená', 1, 0),
(64478, 3, 'en', 'potvrdena_objednavka', 'static', '', 'Order confirmed, waiting for progress', 1, 0),
(64479, 3, 'sk', 'potvrdena_objednavka', 'static', '', 'Objednávka potvrdená, čaká na vybavenie', 1, 0),
(64480, 3, 'en', 'objednavka_sa_spracuva', 'static', '', 'Order in progress', 1, 0),
(64481, 3, 'sk', 'objednavka_sa_spracuva', 'static', '', 'Objednávka sa vybavuje', 1, 0),
(64482, 3, 'en', 'vybavena_objednavka', 'static', '', 'Order equipped', 1, 0),
(64483, 3, 'sk', 'vybavena_objednavka', 'static', '', 'Objednávka vybavená', 1, 0),
(64484, 3, 'en', 'anulovana_objednavka', 'static', '', 'Order canceled', 1, 0),
(64485, 3, 'sk', 'anulovana_objednavka', 'static', '', 'Objednávka zrušená', 1, 0),
(64486, 3, 'en', 'odhlasit', 'static', '', 'Log out', 1, 0),
(64487, 3, 'sk', 'odhlasit', 'static', '', 'Odhlásiť sa', 1, 0),
(64488, 3, 'en', 'prosim_prihlaste_sa', 'static', '', 'Please Log in firstly', 1, 0),
(64489, 3, 'sk', 'prosim_prihlaste_sa', 'static', '', 'Prosím najprv sa prihláste', 1, 0),
(64490, 3, 'en', 'nacitam', 'static', '', 'loading', 1, 0),
(64491, 3, 'sk', 'nacitam', 'static', '', 'načítam', 1, 0),
(64492, 3, 'en', 'nove_heslo', 'static', '', 'New password', 1, 0),
(64493, 3, 'sk', 'nove_heslo', 'static', '', 'Nové heslo', 1, 0),
(64494, 3, 'en', 'nove_heslo_overenie', 'static', '', 'Copy new password', 1, 0),
(64495, 3, 'sk', 'nove_heslo_overenie', 'static', '', 'Overenie nového hesla', 1, 0),
(64496, 3, 'en', 'prihlaseny', 'static', '', 'Logged user', 1, 0),
(64497, 3, 'sk', 'prihlaseny', 'static', '', 'Prihlásený používateľ', 1, 0),
(64498, 3, 'en', 'cislo_objednavky', 'static', '', 'Order Number', 1, 0),
(64499, 3, 'sk', 'cislo_objednavky', 'static', '', 'Číslo objednávky', 1, 0),
(64500, 3, 'en', 'datum_objednavky', 'static', '', 'Order Date', 1, 0),
(64501, 3, 'sk', 'datum_objednavky', 'static', '', 'Dátum objednávky', 1, 0),
(64502, 3, 'en', 'stav_objednavky', 'static', '', 'Order Status', 1, 0),
(64503, 3, 'sk', 'stav_objednavky', 'static', '', 'Stav objednávky', 1, 0),
(64504, 3, 'en', 'ziadne_objednavky_na_show', 'static', '', 'No Orders to show', 1, 0),
(64505, 3, 'sk', 'ziadne_objednavky_na_show', 'static', '', 'Žiadne objednávky na show', 1, 0),
(64506, 3, 'en', 'zle_vyplnene_pole', 'static', '', 'Wrong data in field', 1, 0),
(64507, 3, 'sk', 'zle_vyplnene_pole', 'static', '', 'Zle vyplnené pole ', 1, 0),
(64508, 3, 'en', 'error_box', 'static', '', 'Oops, something s wrong', 1, 0),
(64509, 3, 'sk', 'error_box', 'static', '', 'Hups, niečo je zle', 1, 0),
(64510, 3, 'en', 'opravit', 'static', '', 'Repair', 1, 0),
(64511, 3, 'sk', 'opravit', 'static', '', 'Opraviť', 1, 0),
(64512, 3, 'en', 'prazdne_pole_hlaska', 'static', '', 'Field name is probably empty', 1, 0),
(64513, 3, 'sk', 'prazdne_pole_hlaska', 'static', '', 'Pole pravdepodobne nie je vyplnené', 1, 0),
(64514, 3, 'en', 'slide_show', 'static', '', 'Slide show of cover photos album', 1, 0),
(64515, 3, 'sk', 'slide_show', 'static', '', 'Prehľad titulných fotiek albumov', 1, 0),
(64516, 3, 'en', 'zly_tvar_emailu', 'static', '', 'Wrong form of email', 1, 0),
(64517, 3, 'sk', 'zly_tvar_emailu', 'static', '', 'Email je v nesprávnom tvare', 1, 0),
(64518, 3, 'en', 'email_exists', 'static', '', 'This email already exists', 1, 0),
(64519, 3, 'sk', 'email_exists', 'static', '', 'Tento email už existuje', 1, 0),
(64520, 3, 'en', 'heslo_kratke', 'static', '', 'Password is too short', 1, 0),
(64521, 3, 'sk', 'heslo_kratke', 'static', '', 'Heslo je príliš krátke', 1, 0),
(64522, 3, 'en', 'heslo_overenie_kratke', 'static', '', 'Copy of password is too short', 1, 0),
(64523, 3, 'sk', 'heslo_overenie_kratke', 'static', '', 'Overenie hesla je príliš krátke', 1, 0),
(64524, 3, 'en', 'hesla_sa_nezhoduju', 'static', '', 'Passwords do not matcht', 1, 0),
(64525, 3, 'sk', 'hesla_sa_nezhoduju', 'static', '', 'Heslá sa nezhodujú', 1, 0),
(64526, 3, 'en', 'uspesna_registracia', 'static', '', 'Registration was successful', 1, 0),
(64527, 3, 'sk', 'uspesna_registracia', 'static', '', 'Registrácia prebehla úspešne', 1, 0),
(64528, 3, 'en', 'gratulujeme', 'static', '', 'Congratulations', 1, 0),
(64529, 3, 'sk', 'gratulujeme', 'static', '', 'Gratulujeme', 1, 0),
(64530, 3, 'en', 'zlava', 'static', '', 'Discount', 1, 0),
(64531, 3, 'sk', 'zlava', 'static', '', 'Zľava', 1, 0),
(64532, 3, 'en', 'novinka', 'static', '', 'News', 1, 0),
(64533, 3, 'sk', 'novinka', 'static', '', 'Novinka', 1, 0),
(64534, 3, 'en', 'vypredaj', 'static', '', 'Sale', 1, 0),
(64535, 3, 'sk', 'vypredaj', 'static', '', 'Výpredaj', 1, 0),
(64536, 3, 'en', 'no_stav', 'static', '', 'Not set', 1, 0),
(64537, 3, 'sk', 'no_stav', 'static', '', 'Bez stavu 2', 1, 0),
(64538, 3, 'en', 'komentare', 'static', '', 'Comments', 1, 0),
(64539, 3, 'sk', 'komentare', 'static', '', 'Komentáre', 1, 0),
(64540, 3, 'en', 'komentar', 'static', '', 'Comment', 1, 0),
(64541, 3, 'sk', 'komentar', 'static', '', 'Komentár', 1, 0),
(64542, 3, 'en', 'komentarov', 'static', '', 'Comments', 1, 0),
(64543, 3, 'sk', 'komentarov', 'static', '', 'Komentárov', 1, 0),
(64544, 3, 'en', 'pridat_komentar', 'static', '', 'Add comment', 1, 0),
(64545, 3, 'sk', 'pridat_komentar', 'static', '', 'Pridať komentár', 1, 0),
(64546, 3, 'en', 'vas_komentar', 'static', '', 'Your comment', 1, 0),
(64547, 3, 'sk', 'vas_komentar', 'static', '', 'Váš komentár', 1, 0),
(64548, 3, 'en', 'ziadne_komentare', 'static', '', 'This post has no comments', 1, 0),
(64549, 3, 'sk', 'ziadne_komentare', 'static', '', 'Tento príspevok neobsahuje žiadne komentáre', 1, 0),
(64550, 3, 'en', 'ziadne_produkty', 'static', '', 'No products to show', 1, 0),
(64551, 3, 'sk', 'ziadne_produkty', 'static', '', 'Žiadne produkty k zobrazeniu', 1, 0),
(64552, 3, 'en', 'popis', 'static', '', 'Description', 1, 0),
(64553, 3, 'sk', 'popis', 'static', '', 'Popis', 1, 0),
(64554, 3, 'en', 'nazov', 'static', '', 'Name', 1, 0),
(64555, 3, 'sk', 'nazov', 'static', '', 'Názov', 1, 0),
(64556, 3, 'en', 'stav', 'static', '', 'Status', 1, 0),
(64557, 3, 'sk', 'stav', 'static', '', 'Stav', 1, 0),
(64558, 3, 'en', 'znacka', 'static', '', 'Brand', 1, 0),
(64559, 3, 'sk', 'znacka', 'static', '', 'Značka', 1, 0),
(64560, 3, 'en', 'pridajte_sa_facebook', 'static', '', 'Join Us on Facebook', 1, 0),
(64561, 3, 'sk', 'pridajte_sa_facebook', 'static', '', 'Pridajte sa na Facebooku', 1, 0),
(64562, 3, 'en', 'kontaktujte_nas_hlaska', 'static', '', 'For more information please contact us', 1, 0),
(64563, 3, 'sk', 'kontaktujte_nas_hlaska', 'static', '', 'Pre získanie viac informacii nás prosím kontaktujte', 1, 0),
(64564, 3, 'en', 'najnovsie_produkty', 'static', '', 'News products', 1, 0),
(64565, 3, 'sk', 'najnovsie_produkty', 'static', '', 'Najnovšie produkty', 1, 0),
(64566, 3, 'en', 'znacky', 'static', '', 'Brands', 1, 0),
(64567, 3, 'sk', 'znacky', 'static', '', 'Značky', 1, 0),
(64568, 3, 'en', 'najpredavanejsie', 'static', '', 'Bestsellers', 1, 0),
(64569, 3, 'sk', 'najpredavanejsie', 'static', '', 'Najpredávanejšie', 1, 0),
(64570, 3, 'en', 'produkty_v_zlave', 'static', '', 'In discount', 1, 0),
(64571, 3, 'sk', 'produkty_v_zlave', 'static', '', 'V zľave', 1, 0),
(64572, 3, 'en', 'obsah_kosika', 'static', '', 'Your cart', 1, 0),
(64573, 3, 'sk', 'obsah_kosika', 'static', '', 'Váš obsah košíka', 1, 0),
(64574, 3, 'en', 'zobrazit_kosik', 'static', '', 'View cart', 1, 0),
(64575, 3, 'sk', 'zobrazit_kosik', 'static', '', 'Zobraziť košík', 1, 0),
(64576, 3, 'en', 'ziadne_produkty_kat', 'static', '', 'In this category there are no products', 1, 0),
(64577, 3, 'sk', 'ziadne_produkty_kat', 'static', '', 'V tejto kategorii nie sú žiadne produkty', 1, 0),
(64578, 3, 'en', 'nespravne_povodne_heslo', 'static', '', 'Default password is incorrect', 1, 0),
(64579, 3, 'sk', 'nespravne_povodne_heslo', 'static', '', 'Pôvodné heslo je nesprávne', 1, 0),
(64580, 3, 'en', 'uspesna_objednavka', 'static', '', 'Your order has been successfully sent', 1, 0),
(64581, 3, 'sk', 'uspesna_objednavka', 'static', '', 'Vaša objednávka bola úspešne odoslaná', 1, 0),
(64582, 3, 'en', 'zly_email_heslo', 'static', '', 'Wrong email or password', 1, 0),
(64583, 3, 'sk', 'zly_email_heslo', 'static', '', 'Nesprávny email, alebo heslo', 1, 0),
(64584, 3, 'en', 'sprava_odoslana', 'static', '', 'Your message was successfully sent', 1, 0),
(64585, 3, 'sk', 'sprava_odoslana', 'static', '', 'Vaša správa bola úspešne odoslaná', 1, 0),
(64586, 3, 'en', 'domov', 'static', '', 'Home', 1, 0),
(64587, 3, 'sk', 'domov', 'static', '', 'Domov', 1, 0),
(64588, 3, 'en', 'fail_action', 'static', '', 'The requested action can not be carried out!', 1, 0),
(64589, 3, 'sk', 'fail_action', 'static', '', 'Požadovanú akciu nie je možné vykonať!', 1, 0),
(64590, 3, 'sk', 'januar', 'static', '', 'January', 1, 0),
(64591, 3, 'sk', 'januar', 'static', '', 'Január', 1, 0),
(64592, 3, 'en', 'februar', 'static', '', 'February', 1, 0),
(64593, 3, 'sk', 'februar', 'static', '', 'Február', 1, 0),
(64594, 3, 'en', 'marec', 'static', '', 'Marec', 1, 0),
(64595, 3, 'sk', 'marec', 'static', '', 'Marec', 1, 0),
(64596, 3, 'en', 'april', 'static', '', 'April', 1, 0),
(64597, 3, 'sk', 'april', 'static', '', 'Apríl', 1, 0),
(64598, 3, 'en', 'maj', 'static', '', 'May', 1, 0),
(64599, 3, 'sk', 'maj', 'static', '', 'Máj', 1, 0),
(64600, 3, 'en', 'jun', 'static', '', 'Juny', 1, 0),
(64601, 3, 'sk', 'jun', 'static', '', 'Jún', 1, 0),
(64602, 3, 'en', 'jul', 'static', '', 'July', 1, 0),
(64603, 3, 'sk', 'jul', 'static', '', 'Júl', 1, 0),
(64604, 3, 'en', 'august', 'static', '', 'August', 1, 0),
(64605, 3, 'sk', 'august', 'static', '', 'August', 1, 0),
(64606, 3, 'en', 'september', 'static', '', 'September', 1, 0),
(64607, 3, 'sk', 'september', 'static', '', 'September', 1, 0),
(64608, 3, 'en', 'oktober', 'static', '', 'October', 1, 0),
(64609, 3, 'sk', 'oktober', 'static', '', 'Október', 1, 0),
(64610, 3, 'en', 'november', 'static', '', 'November', 1, 0),
(64611, 3, 'sk', 'november', 'static', '', 'November', 1, 0),
(64612, 3, 'en', 'december', 'static', '', 'December', 1, 0),
(64613, 3, 'sk', 'december', 'static', '', 'December', 1, 0),
(64614, 3, 'en', 'zobrazit', 'static', '', 'View', 1, 0),
(64615, 3, 'sk', 'zobrazit', 'static', '', 'Zobraziť', 1, 0),
(64616, 3, 'en', 'partneri', 'static', '', 'Partners', 1, 0),
(64617, 3, 'sk', 'partneri', 'static', '', 'Partneri', 1, 0),
(64618, 3, 'en', 'archiv', 'static', '', 'Archive', 1, 0),
(64619, 3, 'sk', 'archiv', 'static', '', 'Archív', 1, 0),
(64620, 3, 'en', 'najnovsie_komentare', 'static', '', 'Recent Comments', 1, 0),
(64621, 3, 'sk', 'najnovsie_komentare', 'static', '', 'Posledné komentáre', 1, 0),
(64622, 3, 'en', 'najnovsie_clanky', 'static', '', 'Recent posts', 1, 0),
(64623, 3, 'sk', 'najnovsie_clanky', 'static', '', 'Posledné články', 1, 0),
(64624, 3, 'en', 'main_menu', 'static', '', 'Main menu', 1, 0),
(64625, 3, 'sk', 'main_menu', 'static', '', 'Hlavné menu', 1, 0),
(64626, 3, 'en', 'hladat', 'static', '', 'Search', 1, 0),
(64627, 3, 'sk', 'hladat', 'static', '', 'Hľadať', 1, 0),
(64628, 3, 'en', 'socialne_siete', 'static', '', 'Social networks', 1, 0),
(64629, 3, 'sk', 'socialne_siete', 'static', '', 'Sociálne siete', 1, 0),
(64630, 3, 'en', 'poloha', 'static', '', 'Location', 1, 0),
(64631, 3, 'sk', 'poloha', 'static', '', 'Poloha', 1, 0),
(64632, 3, 'en', 'type', 'static', '', 'typee', 1, 0),
(64633, 3, 'sk', 'type', 'static', '', 'type', 1, 0),
(64634, 3, 'en', 'all', 'static', '', 'All', 1, 0),
(64635, 3, 'sk', 'all', 'static', '', 'Všetko', 1, 0),
(64636, 3, 'en', 'hlaska_najdi_dom', 'static', '', 'Find Your Home', 1, 0),
(64637, 3, 'sk', 'hlaska_najdi_dom', 'static', '', 'Nájdite si svoj dom', 1, 0),
(64638, 3, 'en', 'min_izieb', 'static', '', 'Min Rooms', 1, 0),
(64639, 3, 'sk', 'min_izieb', 'static', '', 'Min. izieb', 1, 0),
(64640, 3, 'en', 'min_kupelni', 'static', '', 'Min Baths', 1, 0),
(64641, 3, 'sk', 'min_kupelni', 'static', '', 'Min. kúpeľní', 1, 0),
(64642, 3, 'en', 'min_cena', 'static', '', 'Min Price', 1, 0),
(64643, 3, 'sk', 'min_cena', 'static', '', 'Min. cena', 1, 0),
(64644, 3, 'en', 'max_cena', 'static', '', 'Max Price', 1, 0),
(64645, 3, 'sk', 'max_cena', 'static', '', 'Max. cena', 1, 0),
(64646, 3, 'en', 'min_area', 'static', '', 'Min Area', 1, 0),
(64647, 3, 'sk', 'min_area', 'static', '', 'Min. roz.', 1, 0),
(64648, 3, 'en', 'max_area', 'static', '', 'Max Area', 1, 0),
(64649, 3, 'sk', 'max_area', 'static', '', 'Max roz.', 1, 0),
(64650, 3, 'en', 'area', 'static', '', 'Area', 1, 0),
(64651, 3, 'sk', 'area', 'static', '', 'Rozloha', 1, 0),
(64652, 3, 'en', 'm2', 'static', '', 'Sq m', 1, 0),
(64653, 3, 'sk', 'm2', 'static', '', 'm2', 1, 0),
(64654, 3, 'en', 'izieb', 'static', '', 'Rooms', 1, 0),
(64655, 3, 'sk', 'izieb', 'static', '', 'Izieb', 1, 0),
(64656, 3, 'en', 'kupelni', 'static', '', 'Bathrooms', 1, 0),
(64657, 3, 'sk', 'kupelni', 'static', '', 'Kúpeľní', 1, 0),
(64658, 3, 'en', 'tlacit', 'static', '', 'Print', 1, 0),
(64659, 3, 'sk', 'tlacit', 'static', '', 'Tlačiť', 1, 0),
(64660, 3, 'en', 'nazov', 'static', '', 'Name', 1, 0),
(64661, 3, 'sk', 'nazov', 'static', '', 'Meno', 1, 0),
(64662, 3, 'en', 'zoznam_nehnutelnosti', 'static', '', 'List of properties', 1, 0),
(64663, 3, 'sk', 'zoznam_nehnutelnosti', 'static', '', 'Zoznam nehnuteľností', 1, 0),
(64664, 3, 'en', 'no_content', 'static', '', 'Please try using top navigation OR search for what you are looking for.', 1, 0),
(64665, 3, 'sk', 'no_content', 'static', '', 'Ľutujeme, ale pre tento výber neexistuje žiaden obsah', 1, 0),
(64666, 3, 'en', 'go_back', 'static', '', 'Go back', 1, 0),
(64667, 3, 'sk', 'go_back', 'static', '', 'Naspäť', 1, 0),
(64668, 3, 'en', 'vybrane_nehnutelnosti', 'static', '', 'Featured Properties', 1, 0),
(64669, 3, 'sk', 'vybrane_nehnutelnosti', 'static', '', 'Vybrané nehnuteľnosti', 1, 0),
(64670, 3, 'en', 'najnovsie_ponuky_hlaska', 'static', '', 'Latest offers property', 1, 0),
(64671, 3, 'sk', 'najnovsie_ponuky_hlaska', 'static', '', 'Najnovšie ponuky nehnuteľností', 1, 0),
(64672, 3, 'en', 'about_us_footer', 'static', '', 'Our company operates in the real estate market. We offer a broad spectrum range of activities related to the negotiation of purchase, sale and rental nehnuteľností.Pre most of you, our clients, the sale, purchase, or rental property important step, which made only a few times in my life. Our real estate agents will gladly help you with the implementation of your requirements and provide complete service with our offer.', 1, 0),
(64673, 3, 'sk', 'about_us_footer', 'static', '', 'Naša spoločnosť pôsobí v oblasti realitného trhu. Ponúkame širokospektrálny záber činností spojených so sprostredkovaním kúpy, predaja a prenájmu nehnuteľností.Pre väčšinu Vás, našich klientov je predaj, kúpa, alebo prenájom nehnuteľnosti dôležitý krok, ktorý realizujete len niekoľkokrát v živote. Naši realitní makléri Vám ochotne a radi poradia pri realizácii Vašich požiadaviek a zabezpečia kompletný servis spojený s našou ponukou.', 1, 0),
(64674, 3, 'en', 'about', 'static', '', 'About company', 1, 0),
(64675, 3, 'sk', 'about', 'static', '', 'O firme', 1, 0),
(64676, 3, 'en', 'vyberte_si_region', 'static', '', 'Choose your region', 1, 0),
(64677, 3, 'sk', 'vyberte_si_region', 'static', '', 'Vyberte si región', 1, 0),
(64678, 3, 'en', 'bratislavsky_kraj', 'static', '', 'Region of Bratislava', 1, 0),
(64679, 3, 'sk', 'bratislavsky_kraj', 'static', '', 'Bratislavský kraj', 1, 0),
(64680, 3, 'en', 'trnavsky_kraj', 'static', '', 'Region of Trnava', 1, 0),
(64681, 3, 'sk', 'trnavsky_kraj', 'static', '', 'Trnavský kraj', 1, 0),
(64682, 3, 'en', 'trenciansky_kraj', 'static', '', 'Region of Trencin', 1, 0),
(64683, 3, 'sk', 'trenciansky_kraj', 'static', '', 'Trenčiansky kraj', 1, 0),
(64684, 3, 'en', 'nitriansky_kraj', 'static', '', 'Region of Nitra', 1, 0),
(64685, 3, 'sk', 'nitriansky_kraj', 'static', '', 'Nitriansky kraj', 1, 0),
(64686, 3, 'en', 'zilinsky_kraj', 'static', '', 'Region of Zilina', 1, 0),
(64687, 3, 'sk', 'zilinsky_kraj', 'static', '', 'Žilinský kraj', 1, 0),
(64688, 3, 'en', 'banskobystricky_kraj', 'static', '', 'Region of Banska Bystrica', 1, 0),
(64689, 3, 'sk', 'banskobystricky_kraj', 'static', '', 'Bansko Bstrický kraj', 1, 0),
(64690, 3, 'en', 'presovsky_kraj', 'static', '', 'Region of Presov', 1, 0),
(64691, 3, 'sk', 'presovsky_kraj', 'static', '', 'Prešovský kraj', 1, 0),
(64692, 3, 'en', 'kosicky_kraj', 'static', '', 'Region of Kosice', 1, 0),
(64693, 3, 'sk', 'kosicky_kraj', 'static', '', 'Košický kraj', 1, 0),
(64694, 3, 'en', 'kategorie_clankov', 'static', '', 'Caregory of blog', 1, 0),
(64695, 3, 'sk', 'kategorie_clankov', 'static', '', 'Kategórie článkov', 1, 0),
(64696, 3, 'en', 'realitny_partneri', 'static', '', 'Realit partners', 1, 0),
(64697, 3, 'sk', 'realitny_partneri', 'static', '', 'Realitní partneri', 1, 0),
(64698, 3, 'en', 'nespravne_heslo', 'static', '', 'Password is incorrect', 1, 0),
(64699, 3, 'sk', 'nespravne_heslo', 'static', '', 'Heslo je nesprávne', 1, 0),
(64700, 3, 'sk', 'ustredie', 'static', '', 'Ústredie', 1, 0),
(64701, 3, 'en', 'ustredie', 'static', '', 'Headquarters', 1, 0),
(64702, 3, 'de', 'ustredie', 'static', '', 'Zentrale', 1, 0),
(64703, 3, 'sk', 'dalsie_informacie', 'static', '', 'Rýchla navigácia', 1, 0),
(64704, 3, 'en', 'dalsie_informacie', 'static', '', ' Quick navigation', 1, 0),
(64705, 3, 'de', 'dalsie_informacie', 'static', '', 'Schnellnavigation', 1, 0),
(64706, 3, 'sk', 'technicka_podpora', 'static', '', 'Technická podpora', 1, 0),
(64707, 3, 'en', 'technicka_podpora', 'static', '', 'Technical support', 1, 0),
(64708, 3, 'de', 'technicka_podpora', 'static', '', 'Technische Unterstützung', 1, 0),
(64709, 3, 'sk', 'systemove_poziadavky', 'static', '', 'Systémové požiadavky', 1, 0),
(64710, 3, 'en', 'systemove_poziadavky', 'static', '', 'System requirements', 1, 0),
(64711, 3, 'de', 'systemove_poziadavky', 'static', '', 'Systemanforderungen', 1, 0),
(64712, 3, 'sk', '3d_tlac', 'static', '', '3d tlač', 1, 0),
(64713, 3, 'en', '3d_tlac', 'static', '', '3D printing', 1, 0),
(64714, 3, 'de', '3d_tlac', 'static', '', '3D-Druck', 1, 0),
(64715, 3, 'sk', 'lisovanie_plastov', 'static', '', 'Lisovanie plastov', 1, 0),
(64716, 3, 'en', 'lisovanie_plastov', 'static', '', 'Molding', 1, 0),
(64717, 3, 'de', 'lisovanie_plastov', 'static', '', 'Gießen', 1, 0),
(64718, 3, 'sk', 'nastrojaren', 'static', '', 'Nástrojáreň', 1, 0),
(64719, 3, 'en', 'nastrojaren', 'static', '', 'Toolroom', 1, 0),
(64720, 3, 'de', 'nastrojaren', 'static', '', 'Werkzeug- und Vorrichtungsbau', 1, 0),
(64721, 3, 'sk', 'fakturacne_udaje', 'static', '', 'Fakturačné údaje', 1, 0),
(64722, 3, 'en', 'fakturacne_udaje', 'static', '', 'Billing information', 1, 0),
(64723, 3, 'de', 'fakturacne_udaje', 'static', '', 'Abrechnungsinformationen', 1, 0),
(64724, 3, 'sk', 'poziadat_o_ponuku_solidcam', 'static', '', 'Požiadať o ponuku Solidcam', 1, 0),
(64725, 3, 'en', 'poziadat_o_ponuku_solidcam', 'static', '', 'Request quote Solidcam', 1, 0),
(64726, 3, 'de', 'poziadat_o_ponuku_solidcam', 'static', '', 'Angebot anfordern Solidcam', 1, 0),
(64727, 3, 'sk', 'poziadat_o_prezentaciu_solidcam', 'static', '', 'Požiadať o prezentáciu Solidcam', 1, 0),
(64728, 3, 'en', 'poziadat_o_prezentaciu_solidcam', 'static', '', 'Request Solidcam Presentation', 1, 0),
(64729, 3, 'de', 'poziadat_o_prezentaciu_solidcam', 'static', '', 'Anfrage Solidcam-Präsentation', 1, 0),
(64730, 3, 'sk', 'poziadat_o_ponuku_pdc', 'static', '', 'Požiadať o ponuku PDC', 1, 0),
(64731, 3, 'en', 'poziadat_o_ponuku_pdc', 'static', '', 'Request quote PDC', 1, 0),
(64732, 3, 'de', 'poziadat_o_ponuku_pdc', 'static', '', 'Angebot anfordern PDC', 1, 0),
(64733, 3, 'sk', 'poziadat_o_prezentaciu_pdc', 'static', '', 'Požiadať o prezentáciu PDC', 1, 0),
(64734, 3, 'en', 'poziadat_o_prezentaciu_pdc', 'static', '', 'Request PDC Presentation', 1, 0),
(64735, 3, 'de', 'poziadat_o_prezentaciu_pdc', 'static', '', 'Anfrage PDC-Präsentation', 1, 0),
(64736, 3, 'sk', 'poziadat_o_ponuku', 'static', '', 'Požiadať o ponuku', 1, 0),
(64737, 3, 'en', 'poziadat_o_ponuku', 'static', '', 'Request for Quotation', 1, 0),
(64738, 3, 'de', 'poziadat_o_ponuku', 'static', '', 'Angebotsanfrage', 1, 0),
(64739, 3, 'sk', 'poziadat_o_prezentaciu', 'static', '', 'Požiadať o prezentáciu', 1, 0),
(64740, 3, 'en', 'poziadat_o_prezentaciu', 'static', '', 'Request a presentation', 1, 0),
(64741, 3, 'de', 'poziadat_o_prezentaciu', 'static', '', 'Fordern Sie eine Präsentation', 1, 0),
(64742, 3, 'sk', 'skusobna_verzia', 'static', '', 'Skúšobná verzia', 1, 0),
(64743, 3, 'en', 'skusobna_verzia', 'static', '', 'Trial', 1, 0),
(64744, 3, 'de', 'skusobna_verzia', 'static', '', 'Versuch', 1, 0),
(64745, 3, 'sk', 'firma', 'static', '', 'Firma', 1, 0),
(64746, 3, 'en', 'firma', 'static', '', 'Company', 1, 0),
(64747, 3, 'de', 'firma', 'static', '', 'Unternehmen', 1, 0),
(64748, 3, 'sk', 'produkt', 'static', '', 'Produkt', 1, 0),
(64749, 3, 'en', 'produkt', 'static', '', 'Product', 1, 0),
(64750, 3, 'de', 'produkt', 'static', '', 'Produkt', 1, 0),
(64751, 3, 'sk', 'dalsie_moznosti', 'static', '', 'Viac z ponuky', 1, 0),
(64752, 3, 'en', 'dalsie_moznosti', 'static', '', 'More of offer', 1, 0),
(64753, 3, 'de', 'dalsie_moznosti', 'static', '', 'Mehr von Angebot', 1, 0),
(64754, 3, 'de', 'meno', 'static', '', 'Name', 1, 0),
(64755, 3, 'sk', '', 'static', '', '', 1, 0),
(64756, 3, 'en', '', 'static', '', '', 1, 0),
(64757, 3, 'de', '', 'static', '', 'Name', 1, 0),
(64758, 3, 'de', 'priezvisko', 'static', '', 'Nachname', 1, 0),
(64759, 3, 'de', 'predmet', 'static', '', 'Thema', 1, 0),
(64760, 3, 'de', 'email', 'static', '', 'Emaille', 1, 0),
(64761, 3, 'de', 'tel_c', 'static', '', 'Telefonnummer', 1, 0),
(64762, 3, 'de', 'ulica', 'static', '', 'Straße', 1, 0),
(64763, 3, 'de', 'psc', 'static', '', 'Postleitzahl', 1, 0),
(64764, 3, 'de', 'mesto', 'static', '', 'Stadt', 1, 0),
(64765, 3, 'de', 'sprava', 'static', '', 'Management', 1, 0),
(64766, 3, 'de', 'odoslat', 'static', '', 'Einreichen', 1, 0),
(64767, 3, 'de', 'heslo', 'static', '', 'Kennwort', 1, 0),
(64768, 3, 'de', 'kontakt', 'static', '', 'Kontakt', 1, 0),
(64769, 3, 'de', 'socialne_siete', 'static', '', 'Soziales Netzwerk', 1, 0),
(64770, 3, 'sk', 'sidlo', 'static', '', 'Sídlo.', 1, 0),
(64771, 3, 'en', 'sidlo', 'static', '', 'Headquarters.', 1, 0),
(64772, 3, 'de', 'sidlo', 'static', '', 'Hauptsitz.', 1, 0),
(64773, 3, 'sk', 'pobocka', 'static', '', 'Pobočka.', 1, 0),
(64774, 3, 'en', 'pobocka', 'static', '', 'Branch office.', 1, 0),
(64775, 3, 'de', 'pobocka', 'static', '', 'Zweigstelle.', 1, 0),
(64776, 3, 'en', '13074', 'name', 'dnt_posts', '', 1, 0),
(64777, 3, 'en', '13074', 'name_url', 'dnt_posts', '', 1, 0),
(64778, 3, 'en', '13074', 'perex', 'dnt_posts', '', 1, 0),
(64779, 3, 'en', '13074', 'content', 'dnt_posts', '', 1, 0),
(64780, 3, 'en', '13074', 'tags', 'dnt_posts', '', 1, 0),
(64781, 3, 'de', '13074', 'name', 'dnt_posts', '', 1, 0),
(64782, 3, 'de', '13074', 'name_url', 'dnt_posts', '', 1, 0),
(64783, 3, 'de', '13074', 'perex', 'dnt_posts', '', 1, 0),
(64784, 3, 'de', '13074', 'content', 'dnt_posts', '', 1, 0),
(64785, 3, 'de', '13074', 'tags', 'dnt_posts', '', 1, 0),
(64786, 3, 'en', '13056', 'name', 'dnt_posts', 'Partners', 1, 0),
(64787, 3, 'en', '13056', 'name_url', 'dnt_posts', 'partners', 1, 0),
(64788, 3, 'en', '13056', 'perex', 'dnt_posts', '', 1, 0),
(64789, 3, 'en', '13056', 'content', 'dnt_posts', '', 1, 0),
(64790, 3, 'en', '13056', 'tags', 'dnt_posts', '', 1, 0),
(64791, 3, 'de', '13056', 'name', 'dnt_posts', 'Partner', 1, 0),
(64792, 3, 'de', '13056', 'name_url', 'dnt_posts', 'partner', 1, 0),
(64793, 3, 'de', '13056', 'perex', 'dnt_posts', '', 1, 0),
(64794, 3, 'de', '13056', 'content', 'dnt_posts', '', 1, 0),
(64795, 3, 'de', '13056', 'tags', 'dnt_posts', '', 1, 0),
(64796, 3, 'en', '13058', 'name', 'dnt_posts', 'Contact', 1, 0),
(64797, 3, 'en', '13058', 'name_url', 'dnt_posts', 'contact', 1, 0),
(64798, 3, 'en', '13058', 'perex', 'dnt_posts', '', 1, 0),
(64799, 3, 'en', '13058', 'content', 'dnt_posts', '', 1, 0),
(64800, 3, 'en', '13058', 'tags', 'dnt_posts', '', 1, 0),
(64801, 3, 'de', '13058', 'name', 'dnt_posts', 'Kontakt', 1, 0),
(64802, 3, 'de', '13058', 'name_url', 'dnt_posts', 'kontakt', 1, 0),
(64803, 3, 'de', '13058', 'perex', 'dnt_posts', '', 1, 0),
(64804, 3, 'de', '13058', 'content', 'dnt_posts', '', 1, 0),
(64805, 3, 'de', '13058', 'tags', 'dnt_posts', '', 1, 0),
(64806, 3, 'en', '13053', 'name', 'dnt_posts', 'About us', 1, 0),
(64807, 3, 'en', '13053', 'name_url', 'dnt_posts', 'about-us', 1, 0),
(64808, 3, 'en', '13053', 'perex', 'dnt_posts', '', 1, 0),
(64809, 3, 'en', '13053', 'content', 'dnt_posts', '', 1, 0),
(64810, 3, 'en', '13053', 'tags', 'dnt_posts', '', 1, 0),
(64811, 3, 'de', '13053', 'name', 'dnt_posts', 'Home', 1, 0),
(64812, 3, 'de', '13053', 'name_url', 'dnt_posts', 'home', 1, 0),
(64813, 3, 'de', '13053', 'perex', 'dnt_posts', '', 1, 0),
(64814, 3, 'de', '13053', 'content', 'dnt_posts', '', 1, 0),
(64815, 3, 'de', '13053', 'tags', 'dnt_posts', '', 1, 0),
(64816, 3, 'en', '13055', 'name', 'dnt_posts', 'Research and development', 1, 0),
(64817, 3, 'en', '13055', 'name_url', 'dnt_posts', 'research-and-development', 1, 0),
(64818, 3, 'en', '13055', 'perex', 'dnt_posts', '', 1, 0),
(64819, 3, 'en', '13055', 'content', 'dnt_posts', '', 1, 0),
(64820, 3, 'en', '13055', 'tags', 'dnt_posts', '', 1, 0),
(64821, 3, 'de', '13055', 'name', 'dnt_posts', 'Forschung und Entwicklung', 1, 0),
(64822, 3, 'de', '13055', 'name_url', 'dnt_posts', 'forschung-und-entwicklung', 1, 0),
(64823, 3, 'de', '13055', 'perex', 'dnt_posts', '', 1, 0),
(64824, 3, 'de', '13055', 'content', 'dnt_posts', '', 1, 0),
(64825, 3, 'de', '13055', 'tags', 'dnt_posts', '', 1, 0),
(64826, 3, 'en', '13054', 'name', 'dnt_posts', 'Products', 1, 0),
(64827, 3, 'en', '13054', 'name_url', 'dnt_posts', '', 1, 0),
(64828, 3, 'en', '13054', 'perex', 'dnt_posts', '', 1, 0),
(64829, 3, 'en', '13054', 'content', 'dnt_posts', '', 1, 0),
(64830, 3, 'en', '13054', 'tags', 'dnt_posts', '', 1, 0),
(64831, 3, 'de', '13054', 'name', 'dnt_posts', 'Produkte', 1, 0),
(64832, 3, 'de', '13054', 'name_url', 'dnt_posts', '', 1, 0),
(64833, 3, 'de', '13054', 'perex', 'dnt_posts', '', 1, 0),
(64834, 3, 'de', '13054', 'content', 'dnt_posts', '', 1, 0),
(64835, 3, 'de', '13054', 'tags', 'dnt_posts', '', 1, 0),
(64836, 3, 'en', '13059', 'name', 'dnt_posts', 'Staff', 1, 0),
(64837, 3, 'en', '13059', 'name_url', 'dnt_posts', 'staff', 1, 0),
(64838, 3, 'en', '13059', 'perex', 'dnt_posts', '', 1, 0),
(64839, 3, 'en', '13059', 'content', 'dnt_posts', '', 1, 0),
(64840, 3, 'en', '13059', 'tags', 'dnt_posts', '', 1, 0),
(64841, 3, 'de', '13059', 'name', 'dnt_posts', 'Personal', 1, 0),
(64842, 3, 'de', '13059', 'name_url', 'dnt_posts', 'personal', 1, 0),
(64843, 3, 'de', '13059', 'perex', 'dnt_posts', '', 1, 0),
(64844, 3, 'de', '13059', 'content', 'dnt_posts', '', 1, 0),
(64845, 3, 'de', '13059', 'tags', 'dnt_posts', '', 1, 0),
(64846, 3, 'en', '13060', 'name', 'dnt_posts', 'Software for planning of production', 1, 0),
(64847, 3, 'en', '13060', 'name_url', 'dnt_posts', '', 1, 0),
(64848, 3, 'en', '13060', 'perex', 'dnt_posts', '', 1, 0),
(64849, 3, 'en', '13060', 'content', 'dnt_posts', '', 1, 0),
(64850, 3, 'en', '13060', 'tags', 'dnt_posts', '', 1, 0),
(64851, 3, 'de', '13060', 'name', 'dnt_posts', 'Software für die Planung der Produktion', 1, 0),
(64852, 3, 'de', '13060', 'name_url', 'dnt_posts', '', 1, 0),
(64853, 3, 'de', '13060', 'perex', 'dnt_posts', '', 1, 0),
(64854, 3, 'de', '13060', 'content', 'dnt_posts', '', 1, 0),
(64855, 3, 'de', '13060', 'tags', 'dnt_posts', '', 1, 0),
(64856, 3, 'en', '13075', 'name', 'dnt_posts', 'Tooling & Molding', 1, 0),
(64857, 3, 'en', '13075', 'name_url', 'dnt_posts', '', 1, 0),
(64858, 3, 'en', '13075', 'perex', 'dnt_posts', '', 1, 0),
(64859, 3, 'en', '13075', 'content', 'dnt_posts', '', 1, 0),
(64860, 3, 'en', '13075', 'tags', 'dnt_posts', '', 1, 0),
(64861, 3, 'de', '13075', 'name', 'dnt_posts', 'Werkzeug- und Vorrichtungsbau', 1, 0),
(64862, 3, 'de', '13075', 'name_url', 'dnt_posts', '', 1, 0),
(64863, 3, 'de', '13075', 'perex', 'dnt_posts', '', 1, 0),
(64864, 3, 'de', '13075', 'content', 'dnt_posts', '', 1, 0),
(64865, 3, 'de', '13075', 'tags', 'dnt_posts', '', 1, 0),
(64866, 3, 'en', '13076', 'name', 'dnt_posts', 'Why choose CAM', 1, 0),
(64867, 3, 'en', '13076', 'name_url', 'dnt_posts', 'why-choose-cam', 1, 0),
(64868, 3, 'en', '13076', 'perex', 'dnt_posts', '', 1, 0),
(64869, 3, 'en', '13076', 'content', 'dnt_posts', '', 1, 0),
(64870, 3, 'en', '13076', 'tags', 'dnt_posts', '', 1, 0),
(64871, 3, 'de', '13076', 'name', 'dnt_posts', '', 1, 0),
(64872, 3, 'de', '13076', 'name_url', 'dnt_posts', '', 1, 0),
(64873, 3, 'de', '13076', 'perex', 'dnt_posts', '', 1, 0),
(64874, 3, 'de', '13076', 'content', 'dnt_posts', '', 1, 0),
(64875, 3, 'de', '13076', 'tags', 'dnt_posts', '', 1, 0),
(64876, 3, 'en', '13077', 'name', 'dnt_posts', 'Services', 1, 0),
(64877, 3, 'en', '13077', 'name_url', 'dnt_posts', 'services', 1, 0),
(64878, 3, 'en', '13077', 'perex', 'dnt_posts', '', 1, 0),
(64879, 3, 'en', '13077', 'content', 'dnt_posts', '', 1, 0),
(64880, 3, 'en', '13077', 'tags', 'dnt_posts', '', 1, 0);
INSERT INTO `dnt_translates` (`id`, `vendor_id`, `lang_id`, `translate_id`, `type`, `table`, `translate`, `show`, `parent_id`) VALUES
(64881, 3, 'de', '13077', 'name', 'dnt_posts', 'Service', 1, 0),
(64882, 3, 'de', '13077', 'name_url', 'dnt_posts', 'service', 1, 0),
(64883, 3, 'de', '13077', 'perex', 'dnt_posts', '', 1, 0),
(64884, 3, 'de', '13077', 'content', 'dnt_posts', '', 1, 0),
(64885, 3, 'de', '13077', 'tags', 'dnt_posts', '', 1, 0),
(64886, 3, 'en', '13078', 'name', 'dnt_posts', 'Why choose CAM', 1, 0),
(64887, 3, 'en', '13078', 'name_url', 'dnt_posts', 'why-choose-cam', 1, 0),
(64888, 3, 'en', '13078', 'perex', 'dnt_posts', '', 1, 0),
(64889, 3, 'en', '13078', 'content', 'dnt_posts', '', 1, 0),
(64890, 3, 'en', '13078', 'tags', 'dnt_posts', '', 1, 0),
(64891, 3, 'de', '13078', 'name', 'dnt_posts', '', 1, 0),
(64892, 3, 'de', '13078', 'name_url', 'dnt_posts', '', 1, 0),
(64893, 3, 'de', '13078', 'perex', 'dnt_posts', '', 1, 0),
(64894, 3, 'de', '13078', 'content', 'dnt_posts', '', 1, 0),
(64895, 3, 'de', '13078', 'tags', 'dnt_posts', '', 1, 0),
(64896, 3, 'en', '13079', 'name', 'dnt_posts', '', 1, 0),
(64897, 3, 'en', '13079', 'name_url', 'dnt_posts', '', 1, 0),
(64898, 3, 'en', '13079', 'perex', 'dnt_posts', '', 1, 0),
(64899, 3, 'en', '13079', 'content', 'dnt_posts', '', 1, 0),
(64900, 3, 'en', '13079', 'tags', 'dnt_posts', '', 1, 0),
(64901, 3, 'de', '13079', 'name', 'dnt_posts', '', 1, 0),
(64902, 3, 'de', '13079', 'name_url', 'dnt_posts', '', 1, 0),
(64903, 3, 'de', '13079', 'perex', 'dnt_posts', '', 1, 0),
(64904, 3, 'de', '13079', 'content', 'dnt_posts', '', 1, 0),
(64905, 3, 'de', '13079', 'tags', 'dnt_posts', '', 1, 0),
(64906, 3, 'en', '13080', 'name', 'dnt_posts', '', 1, 0),
(64907, 3, 'en', '13080', 'name_url', 'dnt_posts', '', 1, 0),
(64908, 3, 'en', '13080', 'perex', 'dnt_posts', '', 1, 0),
(64909, 3, 'en', '13080', 'content', 'dnt_posts', '', 1, 0),
(64910, 3, 'en', '13080', 'tags', 'dnt_posts', '', 1, 0),
(64911, 3, 'de', '13080', 'name', 'dnt_posts', '', 1, 0),
(64912, 3, 'de', '13080', 'name_url', 'dnt_posts', '', 1, 0),
(64913, 3, 'de', '13080', 'perex', 'dnt_posts', '', 1, 0),
(64914, 3, 'de', '13080', 'content', 'dnt_posts', '', 1, 0),
(64915, 3, 'de', '13080', 'tags', 'dnt_posts', '', 1, 0),
(64916, 3, 'en', '13081', 'name', 'dnt_posts', '', 1, 0),
(64917, 3, 'en', '13081', 'name_url', 'dnt_posts', '', 1, 0),
(64918, 3, 'en', '13081', 'perex', 'dnt_posts', '', 1, 0),
(64919, 3, 'en', '13081', 'content', 'dnt_posts', '', 1, 0),
(64920, 3, 'en', '13081', 'tags', 'dnt_posts', '', 1, 0),
(64921, 3, 'de', '13081', 'name', 'dnt_posts', '', 1, 0),
(64922, 3, 'de', '13081', 'name_url', 'dnt_posts', '', 1, 0),
(64923, 3, 'de', '13081', 'perex', 'dnt_posts', '', 1, 0),
(64924, 3, 'de', '13081', 'content', 'dnt_posts', '', 1, 0),
(64925, 3, 'de', '13081', 'tags', 'dnt_posts', '', 1, 0),
(64926, 3, 'en', '13082', 'name', 'dnt_posts', '', 1, 0),
(64927, 3, 'en', '13082', 'name_url', 'dnt_posts', '', 1, 0),
(64928, 3, 'en', '13082', 'perex', 'dnt_posts', '', 1, 0),
(64929, 3, 'en', '13082', 'content', 'dnt_posts', '', 1, 0),
(64930, 3, 'en', '13082', 'tags', 'dnt_posts', '', 1, 0),
(64931, 3, 'de', '13082', 'name', 'dnt_posts', '', 1, 0),
(64932, 3, 'de', '13082', 'name_url', 'dnt_posts', '', 1, 0),
(64933, 3, 'de', '13082', 'perex', 'dnt_posts', '', 1, 0),
(64934, 3, 'de', '13082', 'content', 'dnt_posts', '', 1, 0),
(64935, 3, 'de', '13082', 'tags', 'dnt_posts', '', 1, 0),
(64936, 3, 'en', '13083', 'name', 'dnt_posts', '', 1, 0),
(64937, 3, 'en', '13083', 'name_url', 'dnt_posts', '', 1, 0),
(64938, 3, 'en', '13083', 'perex', 'dnt_posts', '', 1, 0),
(64939, 3, 'en', '13083', 'content', 'dnt_posts', '', 1, 0),
(64940, 3, 'en', '13083', 'tags', 'dnt_posts', '', 1, 0),
(64941, 3, 'de', '13083', 'name', 'dnt_posts', '', 1, 0),
(64942, 3, 'de', '13083', 'name_url', 'dnt_posts', '', 1, 0),
(64943, 3, 'de', '13083', 'perex', 'dnt_posts', '', 1, 0),
(64944, 3, 'de', '13083', 'content', 'dnt_posts', '', 1, 0),
(64945, 3, 'de', '13083', 'tags', 'dnt_posts', '', 1, 0),
(64946, 3, 'en', '13084', 'name', 'dnt_posts', '', 1, 0),
(64947, 3, 'en', '13084', 'name_url', 'dnt_posts', '', 1, 0),
(64948, 3, 'en', '13084', 'perex', 'dnt_posts', '', 1, 0),
(64949, 3, 'en', '13084', 'content', 'dnt_posts', '', 1, 0),
(64950, 3, 'en', '13084', 'tags', 'dnt_posts', '', 1, 0),
(64951, 3, 'de', '13084', 'name', 'dnt_posts', '', 1, 0),
(64952, 3, 'de', '13084', 'name_url', 'dnt_posts', '', 1, 0),
(64953, 3, 'de', '13084', 'perex', 'dnt_posts', '', 1, 0),
(64954, 3, 'de', '13084', 'content', 'dnt_posts', '', 1, 0),
(64955, 3, 'de', '13084', 'tags', 'dnt_posts', '', 1, 0),
(64956, 3, 'en', '13085', 'name', 'dnt_posts', '', 1, 0),
(64957, 3, 'en', '13085', 'name_url', 'dnt_posts', '', 1, 0),
(64958, 3, 'en', '13085', 'perex', 'dnt_posts', '', 1, 0),
(64959, 3, 'en', '13085', 'content', 'dnt_posts', '', 1, 0),
(64960, 3, 'en', '13085', 'tags', 'dnt_posts', '', 1, 0),
(64961, 3, 'de', '13085', 'name', 'dnt_posts', '', 1, 0),
(64962, 3, 'de', '13085', 'name_url', 'dnt_posts', '', 1, 0),
(64963, 3, 'de', '13085', 'perex', 'dnt_posts', '', 1, 0),
(64964, 3, 'de', '13085', 'content', 'dnt_posts', '', 1, 0),
(64965, 3, 'de', '13085', 'tags', 'dnt_posts', '', 1, 0),
(64966, 3, 'en', '13057', 'name', 'dnt_posts', 'Career', 1, 0),
(64967, 3, 'en', '13057', 'name_url', 'dnt_posts', 'career', 1, 0),
(64968, 3, 'en', '13057', 'perex', 'dnt_posts', '', 1, 0),
(64969, 3, 'en', '13057', 'content', 'dnt_posts', '', 1, 0),
(64970, 3, 'en', '13057', 'tags', 'dnt_posts', '', 1, 0),
(64971, 3, 'de', '13057', 'name', 'dnt_posts', 'Karriere', 1, 0),
(64972, 3, 'de', '13057', 'name_url', 'dnt_posts', 'karriere', 1, 0),
(64973, 3, 'de', '13057', 'perex', 'dnt_posts', '', 1, 0),
(64974, 3, 'de', '13057', 'content', 'dnt_posts', '<h3>Pridajte sa k n&aacute;&scaron;mu t&iacute;mu!</h3>\r\n\r\n<p>Na tejto str&aacute;nke sa m&ocirc;žete uch&aacute;dzať o pr&aacute;cu v&nbsp;oblastiach, ktor&eacute; firma OSMOS pon&uacute;ka &ndash; oblasť obchodu, služieb, v&yacute;voja, kon&scaron;truovania, IT spr&aacute;vy, riadenia projektov, pl&aacute;novania, logistiky, v&yacute;roby so zameran&iacute;m na stroj&aacute;rstvo a v&yacute;robu plastov.</p>\r\n\r\n<p>Ak m&aacute;te z&aacute;ujem pracovať u n&aacute;s vo firme OSMOS a poz&iacute;cia ktor&uacute; chcete vykon&aacute;vať moment&aacute;lne nie je inzerovan&aacute;, m&ocirc;žete n&aacute;m poslať otvoren&uacute; žiadosť o zamestnanie. V pr&iacute;pade uvoľnenia poz&iacute;cie&nbsp;ktor&uacute; chcete vykon&aacute;vať, budeme v&aacute;s kontaktovať.&nbsp;</p>\r\n\r\n<p>Svoje otvoren&eacute; žiadosti o zamestnanie n&aacute;m za&scaron;lite spolu so životopisom na info@osmos.sk</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<div class=\"row\" style=\"width: 91%;\"><iframe src=\"https://tech.interspeedia.com/jobs/show.php?id=36416.cl0000373&amp;tf=1\" style=\"        width: 115%;\r\n    overflow-x: hidden;\r\n    border: 0px;\r\n    height: 900px;\r\n    overflow-y: hidden;\r\n    margin-left: -10px;\"></iframe></div>\r\n', 1, 0),
(64975, 3, 'de', '13057', 'tags', 'dnt_posts', '', 1, 0),
(64976, 3, 'en', '13086', 'name', 'dnt_posts', '', 1, 0),
(64977, 3, 'en', '13086', 'name_url', 'dnt_posts', '', 1, 0),
(64978, 3, 'en', '13086', 'perex', 'dnt_posts', '', 1, 0),
(64979, 3, 'en', '13086', 'content', 'dnt_posts', '', 1, 0),
(64980, 3, 'en', '13086', 'tags', 'dnt_posts', '', 1, 0),
(64981, 3, 'de', '13086', 'name', 'dnt_posts', '', 1, 0),
(64982, 3, 'de', '13086', 'name_url', 'dnt_posts', '', 1, 0),
(64983, 3, 'de', '13086', 'perex', 'dnt_posts', '', 1, 0),
(64984, 3, 'de', '13086', 'content', 'dnt_posts', '', 1, 0),
(64985, 3, 'de', '13086', 'tags', 'dnt_posts', '', 1, 0),
(64986, 3, 'en', '13087', 'name', 'dnt_posts', '', 1, 0),
(64987, 3, 'en', '13087', 'name_url', 'dnt_posts', '', 1, 0),
(64988, 3, 'en', '13087', 'perex', 'dnt_posts', '', 1, 0),
(64989, 3, 'en', '13087', 'content', 'dnt_posts', '', 1, 0),
(64990, 3, 'en', '13087', 'tags', 'dnt_posts', '', 1, 0),
(64991, 3, 'de', '13087', 'name', 'dnt_posts', '', 1, 0),
(64992, 3, 'de', '13087', 'name_url', 'dnt_posts', '', 1, 0),
(64993, 3, 'de', '13087', 'perex', 'dnt_posts', '', 1, 0),
(64994, 3, 'de', '13087', 'content', 'dnt_posts', '', 1, 0),
(64995, 3, 'de', '13087', 'tags', 'dnt_posts', '', 1, 0),
(64996, 3, 'en', '13088', 'name', 'dnt_posts', '', 1, 0),
(64997, 3, 'en', '13088', 'name_url', 'dnt_posts', '', 1, 0),
(64998, 3, 'en', '13088', 'perex', 'dnt_posts', '', 1, 0),
(64999, 3, 'en', '13088', 'content', 'dnt_posts', '', 1, 0),
(65000, 3, 'en', '13088', 'tags', 'dnt_posts', '', 1, 0),
(65001, 3, 'de', '13088', 'name', 'dnt_posts', '', 1, 0),
(65002, 3, 'de', '13088', 'name_url', 'dnt_posts', '', 1, 0),
(65003, 3, 'de', '13088', 'perex', 'dnt_posts', '', 1, 0),
(65004, 3, 'de', '13088', 'content', 'dnt_posts', '', 1, 0),
(65005, 3, 'de', '13088', 'tags', 'dnt_posts', '', 1, 0),
(65006, 3, 'en', '13089', 'name', 'dnt_posts', '', 1, 0),
(65007, 3, 'en', '13089', 'name_url', 'dnt_posts', '', 1, 0),
(65008, 3, 'en', '13089', 'perex', 'dnt_posts', '', 1, 0),
(65009, 3, 'en', '13089', 'content', 'dnt_posts', '', 1, 0),
(65010, 3, 'en', '13089', 'tags', 'dnt_posts', '', 1, 0),
(65011, 3, 'de', '13089', 'name', 'dnt_posts', '', 1, 0),
(65012, 3, 'de', '13089', 'name_url', 'dnt_posts', '', 1, 0),
(65013, 3, 'de', '13089', 'perex', 'dnt_posts', '', 1, 0),
(65014, 3, 'de', '13089', 'content', 'dnt_posts', '', 1, 0),
(65015, 3, 'de', '13089', 'tags', 'dnt_posts', '', 1, 0),
(65016, 3, 'en', '13090', 'name', 'dnt_posts', '', 1, 0),
(65017, 3, 'en', '13090', 'name_url', 'dnt_posts', '', 1, 0),
(65018, 3, 'en', '13090', 'perex', 'dnt_posts', '', 1, 0),
(65019, 3, 'en', '13090', 'content', 'dnt_posts', '', 1, 0),
(65020, 3, 'en', '13090', 'tags', 'dnt_posts', '', 1, 0),
(65021, 3, 'de', '13090', 'name', 'dnt_posts', '', 1, 0),
(65022, 3, 'de', '13090', 'name_url', 'dnt_posts', '', 1, 0),
(65023, 3, 'de', '13090', 'perex', 'dnt_posts', '', 1, 0),
(65024, 3, 'de', '13090', 'content', 'dnt_posts', '', 1, 0),
(65025, 3, 'de', '13090', 'tags', 'dnt_posts', '', 1, 0),
(65026, 3, 'en', '13091', 'name', 'dnt_posts', '', 1, 0),
(65027, 3, 'en', '13091', 'name_url', 'dnt_posts', '', 1, 0),
(65028, 3, 'en', '13091', 'perex', 'dnt_posts', '', 1, 0),
(65029, 3, 'en', '13091', 'content', 'dnt_posts', '', 1, 0),
(65030, 3, 'en', '13091', 'tags', 'dnt_posts', '', 1, 0),
(65031, 3, 'de', '13091', 'name', 'dnt_posts', '', 1, 0),
(65032, 3, 'de', '13091', 'name_url', 'dnt_posts', '', 1, 0),
(65033, 3, 'de', '13091', 'perex', 'dnt_posts', '', 1, 0),
(65034, 3, 'de', '13091', 'content', 'dnt_posts', '', 1, 0),
(65035, 3, 'de', '13091', 'tags', 'dnt_posts', '', 1, 0),
(65036, 3, 'en', '13092', 'name', 'dnt_posts', '', 1, 0),
(65037, 3, 'en', '13092', 'name_url', 'dnt_posts', '', 1, 0),
(65038, 3, 'en', '13092', 'perex', 'dnt_posts', '', 1, 0),
(65039, 3, 'en', '13092', 'content', 'dnt_posts', '', 1, 0),
(65040, 3, 'en', '13092', 'tags', 'dnt_posts', '', 1, 0),
(65041, 3, 'de', '13092', 'name', 'dnt_posts', '', 1, 0),
(65042, 3, 'de', '13092', 'name_url', 'dnt_posts', '', 1, 0),
(65043, 3, 'de', '13092', 'perex', 'dnt_posts', '', 1, 0),
(65044, 3, 'de', '13092', 'content', 'dnt_posts', '', 1, 0),
(65045, 3, 'de', '13092', 'tags', 'dnt_posts', '', 1, 0),
(65046, 3, 'en', '13093', 'name', 'dnt_posts', 'Billing information', 1, 0),
(65047, 3, 'en', '13093', 'name_url', 'dnt_posts', '', 1, 0),
(65048, 3, 'en', '13093', 'perex', 'dnt_posts', '', 1, 0),
(65049, 3, 'en', '13093', 'content', 'dnt_posts', '', 1, 0),
(65050, 3, 'en', '13093', 'tags', 'dnt_posts', '', 1, 0),
(65051, 3, 'de', '13093', 'name', 'dnt_posts', 'Abrechnungsinformationen', 1, 0),
(65052, 3, 'de', '13093', 'name_url', 'dnt_posts', '', 1, 0),
(65053, 3, 'de', '13093', 'perex', 'dnt_posts', '', 1, 0),
(65054, 3, 'de', '13093', 'content', 'dnt_posts', '', 1, 0),
(65055, 3, 'de', '13093', 'tags', 'dnt_posts', '', 1, 0),
(65056, 3, 'en', '13094', 'name', 'dnt_posts', 'Free production capacities', 1, 0),
(65057, 3, 'en', '13094', 'name_url', 'dnt_posts', '', 1, 0),
(65058, 3, 'en', '13094', 'perex', 'dnt_posts', '', 1, 0),
(65059, 3, 'en', '13094', 'content', 'dnt_posts', '<p>Free production capacities for continuouse 5 axis milling</p>\r\n', 1, 0),
(65060, 3, 'en', '13094', 'tags', 'dnt_posts', '', 1, 0),
(65061, 3, 'de', '13094', 'name', 'dnt_posts', '', 1, 0),
(65062, 3, 'de', '13094', 'name_url', 'dnt_posts', '', 1, 0),
(65063, 3, 'de', '13094', 'perex', 'dnt_posts', '', 1, 0),
(65064, 3, 'de', '13094', 'content', 'dnt_posts', '', 1, 0),
(65065, 3, 'de', '13094', 'tags', 'dnt_posts', '', 1, 0),
(65066, 3, 'en', '13132', 'name', 'dnt_posts', 'About us', 1, 0),
(65067, 3, 'en', '13132', 'name_url', 'dnt_posts', 'about-us', 1, 0),
(65068, 3, 'en', '13132', 'perex', 'dnt_posts', '', 1, 0),
(65069, 3, 'en', '13132', 'content', 'dnt_posts', '', 1, 0),
(65070, 3, 'en', '13132', 'tags', 'dnt_posts', '', 1, 0),
(65071, 3, 'de', '13132', 'name', 'dnt_posts', '', 1, 0),
(65072, 3, 'de', '13132', 'name_url', 'dnt_posts', '', 1, 0),
(65073, 3, 'de', '13132', 'perex', 'dnt_posts', '', 1, 0),
(65074, 3, 'de', '13132', 'content', 'dnt_posts', '', 1, 0),
(65075, 3, 'de', '13132', 'tags', 'dnt_posts', '', 1, 0),
(65076, 3, 'en', '13133', 'name', 'dnt_posts', '', 1, 0),
(65077, 3, 'en', '13133', 'name_url', 'dnt_posts', '', 1, 0),
(65078, 3, 'en', '13133', 'perex', 'dnt_posts', '', 1, 0),
(65079, 3, 'en', '13133', 'content', 'dnt_posts', '', 1, 0),
(65080, 3, 'en', '13133', 'tags', 'dnt_posts', '', 1, 0),
(65081, 3, 'de', '13133', 'name', 'dnt_posts', '', 1, 0),
(65082, 3, 'de', '13133', 'name_url', 'dnt_posts', '', 1, 0),
(65083, 3, 'de', '13133', 'perex', 'dnt_posts', '', 1, 0),
(65084, 3, 'de', '13133', 'content', 'dnt_posts', '', 1, 0),
(65085, 3, 'de', '13133', 'tags', 'dnt_posts', '', 1, 0),
(65086, 3, 'en', '13134', 'name', 'dnt_posts', '', 1, 0),
(65087, 3, 'en', '13134', 'name_url', 'dnt_posts', '', 1, 0),
(65088, 3, 'en', '13134', 'perex', 'dnt_posts', '', 1, 0),
(65089, 3, 'en', '13134', 'content', 'dnt_posts', '', 1, 0),
(65090, 3, 'en', '13134', 'tags', 'dnt_posts', '', 1, 0),
(65091, 3, 'de', '13134', 'name', 'dnt_posts', '', 1, 0),
(65092, 3, 'de', '13134', 'name_url', 'dnt_posts', '', 1, 0),
(65093, 3, 'de', '13134', 'perex', 'dnt_posts', '', 1, 0),
(65094, 3, 'de', '13134', 'content', 'dnt_posts', '', 1, 0),
(65095, 3, 'de', '13134', 'tags', 'dnt_posts', '', 1, 0),
(65116, 3, 'en', '13140', 'name', 'dnt_posts', '', 1, 0),
(65117, 3, 'en', '13140', 'name_url', 'dnt_posts', '', 1, 0),
(65118, 3, 'en', '13140', 'perex', 'dnt_posts', '', 1, 0),
(65119, 3, 'en', '13140', 'content', 'dnt_posts', '', 1, 0),
(65120, 3, 'en', '13140', 'tags', 'dnt_posts', '', 1, 0),
(65121, 3, 'de', '13140', 'name', 'dnt_posts', '', 1, 0),
(65122, 3, 'de', '13140', 'name_url', 'dnt_posts', '', 1, 0),
(65123, 3, 'de', '13140', 'perex', 'dnt_posts', '', 1, 0),
(65124, 3, 'de', '13140', 'content', 'dnt_posts', '', 1, 0),
(65125, 3, 'de', '13140', 'tags', 'dnt_posts', '', 1, 0),
(65126, 3, 'en', '13141', 'name', 'dnt_posts', '', 1, 0),
(65127, 3, 'en', '13141', 'name_url', 'dnt_posts', '', 1, 0),
(65128, 3, 'en', '13141', 'perex', 'dnt_posts', '', 1, 0),
(65129, 3, 'en', '13141', 'content', 'dnt_posts', '', 1, 0),
(65130, 3, 'en', '13141', 'tags', 'dnt_posts', '', 1, 0),
(65131, 3, 'de', '13141', 'name', 'dnt_posts', '', 1, 0),
(65132, 3, 'de', '13141', 'name_url', 'dnt_posts', '', 1, 0),
(65133, 3, 'de', '13141', 'perex', 'dnt_posts', '', 1, 0),
(65134, 3, 'de', '13141', 'content', 'dnt_posts', '', 1, 0),
(65135, 3, 'de', '13141', 'tags', 'dnt_posts', '', 1, 0),
(65136, 3, 'en', '13142', 'name', 'dnt_posts', '', 1, 0),
(65137, 3, 'en', '13142', 'name_url', 'dnt_posts', '', 1, 0),
(65138, 3, 'en', '13142', 'perex', 'dnt_posts', '', 1, 0),
(65139, 3, 'en', '13142', 'content', 'dnt_posts', '', 1, 0),
(65140, 3, 'en', '13142', 'tags', 'dnt_posts', '', 1, 0),
(65141, 3, 'de', '13142', 'name', 'dnt_posts', '', 1, 0),
(65142, 3, 'de', '13142', 'name_url', 'dnt_posts', '', 1, 0),
(65143, 3, 'de', '13142', 'perex', 'dnt_posts', '', 1, 0),
(65144, 3, 'de', '13142', 'content', 'dnt_posts', '', 1, 0),
(65145, 3, 'de', '13142', 'tags', 'dnt_posts', '', 1, 0),
(65146, 3, 'en', '13143', 'name', 'dnt_posts', '', 1, 0),
(65147, 3, 'en', '13143', 'name_url', 'dnt_posts', '', 1, 0),
(65148, 3, 'en', '13143', 'perex', 'dnt_posts', '', 1, 0),
(65149, 3, 'en', '13143', 'content', 'dnt_posts', '', 1, 0),
(65150, 3, 'en', '13143', 'tags', 'dnt_posts', '', 1, 0),
(65151, 3, 'de', '13143', 'name', 'dnt_posts', '', 1, 0),
(65152, 3, 'de', '13143', 'name_url', 'dnt_posts', '', 1, 0),
(65153, 3, 'de', '13143', 'perex', 'dnt_posts', '', 1, 0),
(65154, 3, 'de', '13143', 'content', 'dnt_posts', '', 1, 0),
(65155, 3, 'de', '13143', 'tags', 'dnt_posts', '', 1, 0),
(65156, 3, 'en', '13144', 'name', 'dnt_posts', '', 1, 0),
(65157, 3, 'en', '13144', 'name_url', 'dnt_posts', '', 1, 0),
(65158, 3, 'en', '13144', 'perex', 'dnt_posts', '', 1, 0),
(65159, 3, 'en', '13144', 'content', 'dnt_posts', '', 1, 0),
(65160, 3, 'en', '13144', 'tags', 'dnt_posts', '', 1, 0),
(65161, 3, 'de', '13144', 'name', 'dnt_posts', '', 1, 0),
(65162, 3, 'de', '13144', 'name_url', 'dnt_posts', '', 1, 0),
(65163, 3, 'de', '13144', 'perex', 'dnt_posts', '', 1, 0),
(65164, 3, 'de', '13144', 'content', 'dnt_posts', '', 1, 0),
(65165, 3, 'de', '13144', 'tags', 'dnt_posts', '', 1, 0),
(65166, 3, 'en', '13145', 'name', 'dnt_posts', '', 1, 0),
(65167, 3, 'en', '13145', 'name_url', 'dnt_posts', '', 1, 0),
(65168, 3, 'en', '13145', 'perex', 'dnt_posts', '', 1, 0),
(65169, 3, 'en', '13145', 'content', 'dnt_posts', '', 1, 0),
(65170, 3, 'en', '13145', 'tags', 'dnt_posts', '', 1, 0),
(65171, 3, 'de', '13145', 'name', 'dnt_posts', '', 1, 0),
(65172, 3, 'de', '13145', 'name_url', 'dnt_posts', '', 1, 0),
(65173, 3, 'de', '13145', 'perex', 'dnt_posts', '', 1, 0),
(65174, 3, 'de', '13145', 'content', 'dnt_posts', '', 1, 0),
(65175, 3, 'de', '13145', 'tags', 'dnt_posts', '', 1, 0),
(65176, 3, 'en', '13146', 'name', 'dnt_posts', '', 1, 0),
(65177, 3, 'en', '13146', 'name_url', 'dnt_posts', '', 1, 0),
(65178, 3, 'en', '13146', 'perex', 'dnt_posts', '', 1, 0),
(65179, 3, 'en', '13146', 'content', 'dnt_posts', '', 1, 0),
(65180, 3, 'en', '13146', 'tags', 'dnt_posts', '', 1, 0),
(65181, 3, 'de', '13146', 'name', 'dnt_posts', '', 1, 0),
(65182, 3, 'de', '13146', 'name_url', 'dnt_posts', '', 1, 0),
(65183, 3, 'de', '13146', 'perex', 'dnt_posts', '', 1, 0),
(65184, 3, 'de', '13146', 'content', 'dnt_posts', '', 1, 0),
(65185, 3, 'de', '13146', 'tags', 'dnt_posts', '', 1, 0),
(65186, 3, 'en', '13147', 'name', 'dnt_posts', '', 1, 0),
(65187, 3, 'en', '13147', 'name_url', 'dnt_posts', '', 1, 0),
(65188, 3, 'en', '13147', 'perex', 'dnt_posts', '', 1, 0),
(65189, 3, 'en', '13147', 'content', 'dnt_posts', '', 1, 0),
(65190, 3, 'en', '13147', 'tags', 'dnt_posts', '', 1, 0),
(65191, 3, 'de', '13147', 'name', 'dnt_posts', '', 1, 0),
(65192, 3, 'de', '13147', 'name_url', 'dnt_posts', '', 1, 0),
(65193, 3, 'de', '13147', 'perex', 'dnt_posts', '', 1, 0),
(65194, 3, 'de', '13147', 'content', 'dnt_posts', '', 1, 0),
(65195, 3, 'de', '13147', 'tags', 'dnt_posts', '', 1, 0),
(65196, 3, 'en', '13148', 'name', 'dnt_posts', '', 1, 0),
(65197, 3, 'en', '13148', 'name_url', 'dnt_posts', '', 1, 0),
(65198, 3, 'en', '13148', 'perex', 'dnt_posts', '', 1, 0),
(65199, 3, 'en', '13148', 'content', 'dnt_posts', '', 1, 0),
(65200, 3, 'en', '13148', 'tags', 'dnt_posts', '', 1, 0),
(65201, 3, 'de', '13148', 'name', 'dnt_posts', '', 1, 0),
(65202, 3, 'de', '13148', 'name_url', 'dnt_posts', '', 1, 0),
(65203, 3, 'de', '13148', 'perex', 'dnt_posts', '', 1, 0),
(65204, 3, 'de', '13148', 'content', 'dnt_posts', '', 1, 0),
(65205, 3, 'de', '13148', 'tags', 'dnt_posts', '', 1, 0),
(65206, 3, 'en', '13149', 'name', 'dnt_posts', '', 1, 0),
(65207, 3, 'en', '13149', 'name_url', 'dnt_posts', '', 1, 0),
(65208, 3, 'en', '13149', 'perex', 'dnt_posts', '', 1, 0),
(65209, 3, 'en', '13149', 'content', 'dnt_posts', '', 1, 0),
(65210, 3, 'en', '13149', 'tags', 'dnt_posts', '', 1, 0),
(65211, 3, 'de', '13149', 'name', 'dnt_posts', '', 1, 0),
(65212, 3, 'de', '13149', 'name_url', 'dnt_posts', '', 1, 0),
(65213, 3, 'de', '13149', 'perex', 'dnt_posts', '', 1, 0),
(65214, 3, 'de', '13149', 'content', 'dnt_posts', '', 1, 0),
(65215, 3, 'de', '13149', 'tags', 'dnt_posts', '', 1, 0),
(65216, 3, 'en', '13150', 'name', 'dnt_posts', '', 1, 0),
(65217, 3, 'en', '13150', 'name_url', 'dnt_posts', '', 1, 0),
(65218, 3, 'en', '13150', 'perex', 'dnt_posts', '', 1, 0),
(65219, 3, 'en', '13150', 'content', 'dnt_posts', '', 1, 0),
(65220, 3, 'en', '13150', 'tags', 'dnt_posts', '', 1, 0),
(65221, 3, 'de', '13150', 'name', 'dnt_posts', '', 1, 0),
(65222, 3, 'de', '13150', 'name_url', 'dnt_posts', '', 1, 0),
(65223, 3, 'de', '13150', 'perex', 'dnt_posts', '', 1, 0),
(65224, 3, 'de', '13150', 'content', 'dnt_posts', '', 1, 0),
(65225, 3, 'de', '13150', 'tags', 'dnt_posts', '', 1, 0),
(65226, 3, 'en', '13152', 'name', 'dnt_posts', '', 1, 0),
(65227, 3, 'en', '13152', 'name_url', 'dnt_posts', '', 1, 0),
(65228, 3, 'en', '13152', 'perex', 'dnt_posts', '', 1, 0),
(65229, 3, 'en', '13152', 'content', 'dnt_posts', '', 1, 0),
(65230, 3, 'en', '13152', 'tags', 'dnt_posts', '', 1, 0),
(65231, 3, 'de', '13152', 'name', 'dnt_posts', '', 1, 0),
(65232, 3, 'de', '13152', 'name_url', 'dnt_posts', '', 1, 0),
(65233, 3, 'de', '13152', 'perex', 'dnt_posts', '', 1, 0),
(65234, 3, 'de', '13152', 'content', 'dnt_posts', '', 1, 0),
(65235, 3, 'de', '13152', 'tags', 'dnt_posts', '', 1, 0),
(65236, 3, 'en', '13153', 'name', 'dnt_posts', '', 1, 0),
(65237, 3, 'en', '13153', 'name_url', 'dnt_posts', '', 1, 0),
(65238, 3, 'en', '13153', 'perex', 'dnt_posts', '', 1, 0),
(65239, 3, 'en', '13153', 'content', 'dnt_posts', '', 1, 0),
(65240, 3, 'en', '13153', 'tags', 'dnt_posts', '', 1, 0),
(65241, 3, 'de', '13153', 'name', 'dnt_posts', '', 1, 0),
(65242, 3, 'de', '13153', 'name_url', 'dnt_posts', '', 1, 0),
(65243, 3, 'de', '13153', 'perex', 'dnt_posts', '', 1, 0),
(65244, 3, 'de', '13153', 'content', 'dnt_posts', '', 1, 0),
(65245, 3, 'de', '13153', 'tags', 'dnt_posts', '', 1, 0),
(65246, 3, 'en', '13154', 'name', 'dnt_posts', '', 1, 0),
(65247, 3, 'en', '13154', 'name_url', 'dnt_posts', '', 1, 0),
(65248, 3, 'en', '13154', 'perex', 'dnt_posts', '', 1, 0),
(65249, 3, 'en', '13154', 'content', 'dnt_posts', '', 1, 0),
(65250, 3, 'en', '13154', 'tags', 'dnt_posts', '', 1, 0),
(65251, 3, 'de', '13154', 'name', 'dnt_posts', '', 1, 0),
(65252, 3, 'de', '13154', 'name_url', 'dnt_posts', '', 1, 0),
(65253, 3, 'de', '13154', 'perex', 'dnt_posts', '', 1, 0),
(65254, 3, 'de', '13154', 'content', 'dnt_posts', '', 1, 0),
(65255, 3, 'de', '13154', 'tags', 'dnt_posts', '', 1, 0),
(65256, 3, 'en', '13155', 'name', 'dnt_posts', '', 1, 0),
(65257, 3, 'en', '13155', 'name_url', 'dnt_posts', '', 1, 0),
(65258, 3, 'en', '13155', 'perex', 'dnt_posts', '', 1, 0),
(65259, 3, 'en', '13155', 'content', 'dnt_posts', '', 1, 0),
(65260, 3, 'en', '13155', 'tags', 'dnt_posts', '', 1, 0),
(65261, 3, 'de', '13155', 'name', 'dnt_posts', '', 1, 0),
(65262, 3, 'de', '13155', 'name_url', 'dnt_posts', '', 1, 0),
(65263, 3, 'de', '13155', 'perex', 'dnt_posts', '', 1, 0),
(65264, 3, 'de', '13155', 'content', 'dnt_posts', '', 1, 0),
(65265, 3, 'de', '13155', 'tags', 'dnt_posts', '', 1, 0),
(65266, 3, 'en', '13156', 'name', 'dnt_posts', '', 1, 0),
(65267, 3, 'en', '13156', 'name_url', 'dnt_posts', '', 1, 0),
(65268, 3, 'en', '13156', 'perex', 'dnt_posts', '', 1, 0),
(65269, 3, 'en', '13156', 'content', 'dnt_posts', '', 1, 0),
(65270, 3, 'en', '13156', 'tags', 'dnt_posts', '', 1, 0),
(65271, 3, 'de', '13156', 'name', 'dnt_posts', '', 1, 0),
(65272, 3, 'de', '13156', 'name_url', 'dnt_posts', '', 1, 0),
(65273, 3, 'de', '13156', 'perex', 'dnt_posts', '', 1, 0),
(65274, 3, 'de', '13156', 'content', 'dnt_posts', '', 1, 0),
(65275, 3, 'de', '13156', 'tags', 'dnt_posts', '', 1, 0),
(65276, 3, 'en', '13157', 'name', 'dnt_posts', '', 1, 0),
(65277, 3, 'en', '13157', 'name_url', 'dnt_posts', '', 1, 0),
(65278, 3, 'en', '13157', 'perex', 'dnt_posts', '', 1, 0),
(65279, 3, 'en', '13157', 'content', 'dnt_posts', '', 1, 0),
(65280, 3, 'en', '13157', 'tags', 'dnt_posts', '', 1, 0),
(65281, 3, 'de', '13157', 'name', 'dnt_posts', '', 1, 0),
(65282, 3, 'de', '13157', 'name_url', 'dnt_posts', '', 1, 0),
(65283, 3, 'de', '13157', 'perex', 'dnt_posts', '', 1, 0),
(65284, 3, 'de', '13157', 'content', 'dnt_posts', '', 1, 0),
(65285, 3, 'de', '13157', 'tags', 'dnt_posts', '', 1, 0),
(65286, 3, 'en', '13158', 'name', 'dnt_posts', '', 1, 0),
(65287, 3, 'en', '13158', 'name_url', 'dnt_posts', '', 1, 0),
(65288, 3, 'en', '13158', 'perex', 'dnt_posts', '', 1, 0),
(65289, 3, 'en', '13158', 'content', 'dnt_posts', '', 1, 0),
(65290, 3, 'en', '13158', 'tags', 'dnt_posts', '', 1, 0),
(65291, 3, 'de', '13158', 'name', 'dnt_posts', '', 1, 0),
(65292, 3, 'de', '13158', 'name_url', 'dnt_posts', '', 1, 0),
(65293, 3, 'de', '13158', 'perex', 'dnt_posts', '', 1, 0),
(65294, 3, 'de', '13158', 'content', 'dnt_posts', '', 1, 0),
(65295, 3, 'de', '13158', 'tags', 'dnt_posts', '', 1, 0),
(65296, 3, 'en', '13159', 'name', 'dnt_posts', '', 1, 0),
(65297, 3, 'en', '13159', 'name_url', 'dnt_posts', '', 1, 0),
(65298, 3, 'en', '13159', 'perex', 'dnt_posts', '', 1, 0),
(65299, 3, 'en', '13159', 'content', 'dnt_posts', '', 1, 0),
(65300, 3, 'en', '13159', 'tags', 'dnt_posts', '', 1, 0),
(65301, 3, 'de', '13159', 'name', 'dnt_posts', '', 1, 0),
(65302, 3, 'de', '13159', 'name_url', 'dnt_posts', '', 1, 0),
(65303, 3, 'de', '13159', 'perex', 'dnt_posts', '', 1, 0),
(65304, 3, 'de', '13159', 'content', 'dnt_posts', '', 1, 0),
(65305, 3, 'de', '13159', 'tags', 'dnt_posts', '', 1, 0),
(65306, 3, 'en', '13160', 'name', 'dnt_posts', '', 1, 0),
(65307, 3, 'en', '13160', 'name_url', 'dnt_posts', '', 1, 0),
(65308, 3, 'en', '13160', 'perex', 'dnt_posts', '', 1, 0),
(65309, 3, 'en', '13160', 'content', 'dnt_posts', '', 1, 0),
(65310, 3, 'en', '13160', 'tags', 'dnt_posts', '', 1, 0),
(65311, 3, 'de', '13160', 'name', 'dnt_posts', '', 1, 0),
(65312, 3, 'de', '13160', 'name_url', 'dnt_posts', '', 1, 0),
(65313, 3, 'de', '13160', 'perex', 'dnt_posts', '', 1, 0),
(65314, 3, 'de', '13160', 'content', 'dnt_posts', '', 1, 0),
(65315, 3, 'de', '13160', 'tags', 'dnt_posts', '', 1, 0),
(65316, 3, 'en', '13161', 'name', 'dnt_posts', '', 1, 0),
(65317, 3, 'en', '13161', 'name_url', 'dnt_posts', '', 1, 0),
(65318, 3, 'en', '13161', 'perex', 'dnt_posts', '', 1, 0),
(65319, 3, 'en', '13161', 'content', 'dnt_posts', '', 1, 0),
(65320, 3, 'en', '13161', 'tags', 'dnt_posts', '', 1, 0),
(65321, 3, 'de', '13161', 'name', 'dnt_posts', '', 1, 0),
(65322, 3, 'de', '13161', 'name_url', 'dnt_posts', '', 1, 0),
(65323, 3, 'de', '13161', 'perex', 'dnt_posts', '', 1, 0),
(65324, 3, 'de', '13161', 'content', 'dnt_posts', '', 1, 0),
(65325, 3, 'de', '13161', 'tags', 'dnt_posts', '', 1, 0);

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
  `parent_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Sťahujem dáta pre tabuľku `dnt_uploads`
--

INSERT INTO `dnt_uploads` (`id`, `vendor_id`, `name`, `datetime`, `type`, `parent_id`) VALUES
(411, 3, 'metsa_tissue.png', '2017-03-05 20:27:20', 'image/png', 0),
(412, 3, 'kariera.jpg', '2017-03-05 20:29:45', 'image/jpeg', 0),
(410, 3, 'images.jpg', '2017-03-05 20:27:05', 'image/jpeg', 0),
(409, 3, 'SolidCAM_logo_header.png', '2017-03-05 20:26:45', 'image/png', 0),
(408, 3, 'jpplast.png', '2017-03-05 20:26:31', 'image/png', 0),
(407, 3, 'inventive.png', '2017-03-05 20:26:08', 'image/png', 0),
(406, 3, 'LPH_Vranov_n_T.png', '2017-03-05 20:25:49', 'image/png', 0),
(405, 3, 'cimco.jpg', '2017-03-05 20:24:29', 'image/jpeg', 0),
(404, 3, 'osmosZ3D.jpg', '2017-03-05 20:15:42', 'image/jpeg', 0),
(403, 3, 'osmos-engine-6.png', '2017-03-05 20:14:58', 'image/png', 0),
(402, 3, '2687_osmosZpila.jpg', '2017-03-05 20:14:13', 'image/jpeg', 0),
(401, 3, 'rd1600h-radialdrill.jpg', '2017-03-05 20:13:15', 'image/jpeg', 0),
(400, 3, 'osmos-engine-3.png', '2017-03-05 20:12:15', 'image/png', 0),
(399, 3, 'osmos-engine-2.png', '2017-03-05 20:11:23', 'image/png', 0),
(398, 3, 'osmos-engine-1.png', '2017-03-05 20:09:32', 'image/png', 0),
(397, 3, '20161103_210947.jpg', '2017-03-05 20:02:35', 'image/jpeg', 0),
(396, 3, '20161103_210824.jpg', '2017-03-05 20:01:51', 'image/jpeg', 0),
(395, 3, '20161103_210120.jpg', '2017-03-05 20:01:04', 'image/jpeg', 0),
(394, 3, '20161103_205932.jpg', '2017-03-05 20:00:02', 'image/jpeg', 0),
(393, 3, '8829_20160816_161337.jpg', '2017-03-05 19:16:30', 'image/jpeg', 0),
(392, 3, 'logo_nastrojaren_podklad.png', '2017-03-05 09:21:12', 'image/png', 0);

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
(5, 3, '', 'admin', 'Tomáš', 'Doubek', 'nastrojaren', '', '', '', 0, '', '', 'b69a84481c97f320c80020b01d5620b5', 'thomas.doubek@gmail.com', '', '', '', 0, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '0', '', '', 'profile.jpg', 1, 0, '', 0);

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
(3, 'Nástrojáreň\r\n', 'nastrojaren', 'nastrojaren', 1);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=485;
--
-- AUTO_INCREMENT pre tabuľku `dnt_api`
--
ALTER TABLE `dnt_api`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1022;
--
-- AUTO_INCREMENT pre tabuľku `dnt_config`
--
ALTER TABLE `dnt_config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT pre tabuľku `dnt_languages`
--
ALTER TABLE `dnt_languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT pre tabuľku `dnt_logs`
--
ALTER TABLE `dnt_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pre tabuľku `dnt_mailer_mails`
--
ALTER TABLE `dnt_mailer_mails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13312;
--
-- AUTO_INCREMENT pre tabuľku `dnt_posts_meta`
--
ALTER TABLE `dnt_posts_meta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pre tabuľku `dnt_post_type`
--
ALTER TABLE `dnt_post_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=242;
--
-- AUTO_INCREMENT pre tabuľku `dnt_settings`
--
ALTER TABLE `dnt_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1159;
--
-- AUTO_INCREMENT pre tabuľku `dnt_translates`
--
ALTER TABLE `dnt_translates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72130;
--
-- AUTO_INCREMENT pre tabuľku `dnt_uploads`
--
ALTER TABLE `dnt_uploads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=518;
--
-- AUTO_INCREMENT pre tabuľku `dnt_users`
--
ALTER TABLE `dnt_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pre tabuľku `dnt_vendors`
--
ALTER TABLE `dnt_vendors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
