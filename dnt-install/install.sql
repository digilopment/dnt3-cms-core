

CREATE TABLE IF NOT EXISTS `dnt_admin_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_entity` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `type` varchar(30) NOT NULL,
  `included` varchar(300) NOT NULL,
  `ico` varchar(100) NOT NULL,
  `order` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `name_url` varchar(300) NOT NULL,
  `name_url_sub` varchar(300) NOT NULL,
  `show` int(11) NOT NULL DEFAULT 1,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3813 DEFAULT CHARSET=utf8;


INSERT INTO dnt_admin_menu VALUES
(null,"566","67","menu",""," fa-gears","20","Nastavenia","settings","settings","1","0"),
(null,"567","67","menu","post","fa-laptop","30","Obsah","content","content&incuded=post","1","0"),
(null,"568","67","submenu","","fa-plus","1","Pridať post","content","content&add","1","0"),
(null,"569","67","submenu","","","6","Bleskovky","content&filter=bleskovky","content","1","0"),
(null,"570","67","menu","","fa-user","80","Prístupy","access","access","1","0"),
(null,"572","67","submenu","","","3","Stránky","content","content&filter=pages","1","0"),
(null,"573","67","menu","","fa fa-home","10","Domov","home","","1","0"),
(null,"575","67","menu","","fa-envelope","90","Mailer","mailer","mailer","1","0"),
(null,"576","67","submenu","","","5","Všetky prístupy","pristupy","pristupy","1","0"),
(null,"577","67","submenu","","fa-plus","0","Pridať prístup","pristupy","pristupy&pridat","1","0"),
(null,"578","67","submenu","","","4","Podstránky","content","content&filter=pages-sub","1","0"),
(null,"579","67","submenu","","fa-plus","2","Pridať podstránku","content","content&add=pages-sub","1","0"),
(null,"580","67","submenu","","","7","Statický obsah","content","content&filter=static","1","0"),
(null,"582","67","submenu","","","7","Sponzori","content","content&filter=sponzori","1","0"),
(null,"583","67","submenu","","","8","Partneri","content","content&filter=partneri","1","0"),
(null,"584","67","menu","","fa-language","60","Multylanguage","multylanguage","","1","0"),
(null,"585","67","submenu","","","23","Aktívne jazyky","multylanguage","multylanguage&add","1","0"),
(null,"586","67","submenu","","","22","Zoznam prekladov","multylanguage","multylanguage&action=translates","1","0"),
(null,"587","67","menu","sitemap","	fa fa-list","40","Sitemap","content","content&incuded=sitemap","1","0"),
(null,"589","67","menu","","fa-pie-chart","70","Kvízy","polls","polls","1","0"),
(null,"590","67","submenu","","","23","Pridať kvíz","polls","polls&action=add_poll","1","0"),
(null,"591","67","submenu","","","23","Zoznam kvízov","polls","polls","1","0"),
(null,"592","67","menu",""," fa-file","50","Súbory","files","files","1","0"),
(null,"646","67","menu",""," fa-gears","100","Microweb","microweb","microweb","1","0"),
(null,"647","67","submenu",""," fa-gears","20","Zoznam","microweb","microweb","1","0"),
(null,"648","67","submenu",""," fa-gears","20","Pridať","microweb","microweb&action=add","1","0"),
(null,"759","67","menu","","fa-globe","110","Zoznam webov","vendor","","1","0"),
(null,"760","67","submenu","","","22","Zoznam","vendor","vendor","1","0"),
(null,"761","67","submenu","","","22","Pridať web","vendor","vendor&action=add","1","0"),
(null,"1620","67","menu",""," fa-user","100","Používatelia","user","user","1","0"),
(null,"1621","67","submenu",""," fa-user","100","Zoznam","user","user","1","0"),
(null,"1621","67","submenu",""," fa-user","100","Pridať používateľa","user","user&action=add","1","0"),
(null,"1830","67","menu","","fa fa-line-chart","15","Štatistika","statistics","","1","0"),
(null,"1870","67","menu","","fa-file-excel-o","90","Voučre","vouchers","vouchers","1","0"),
(null,"2162","67","submenu","","","22","Importovať web","vendor","vendor&action=import","1","0"),
(null,"3699","67","menu","video","fa fa-video-camera","40","Video","content","content&incuded=video","1","0"),
(null,"3700","67","menu","gallery","fa fa-list","40","Galérie","content","content&incuded=gallery","1","0"),
(null,"3701","67","menu","product","fa fa-product-hunt","40","Produkty","content","content&incuded=product","1","0"),
(null,"3706","67","menu","","fa fa-shopping-cart","70","Eshop","invoices","invoices","1","0"),
(null,"3707","67","submenu","","fa fa-shopping-cart","70","Zoznam objednávok","invoices","invoices","1","0"),
(null,"3708","67","submenu","","fa fa-product-hunt","70","Zoznam produktov","invoices","content&included=product","1","0"),
(null,"3709","67","submenu","","fa fa-file-text-o","70","Nová objednávka","invoices","invoices&action=add","1","0");




CREATE TABLE IF NOT EXISTS `dnt_api` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_entity` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `name_url` varchar(300) NOT NULL,
  `query` text NOT NULL,
  `parent_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1335 DEFAULT CHARSET=utf8;






CREATE TABLE IF NOT EXISTS `dnt_basket` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_entity` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `user_id` varchar(300) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_id_entity` varchar(300) NOT NULL,
  `count` int(11) NOT NULL,
  `datetime_creat` datetime NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;






CREATE TABLE IF NOT EXISTS `dnt_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_entity` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `key` varchar(1000) NOT NULL,
  `value` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=185 DEFAULT CHARSET=utf8;


INSERT INTO dnt_config VALUES
(null,"25","67","default_lang","sk"),
(null,"26","67","default_modul","homepage");




CREATE TABLE IF NOT EXISTS `dnt_gallery` (
  `id` int(11) NOT NULL,
  `id_entity` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `nam_url` varchar(300) NOT NULL,
  `content` varchar(300) NOT NULL,
  `images` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;






CREATE TABLE IF NOT EXISTS `dnt_languages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_entity` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `slug` varchar(300) NOT NULL,
  `name` varchar(300) NOT NULL,
  `home_lang` int(11) NOT NULL DEFAULT 0,
  `show` int(11) NOT NULL,
  `img` varchar(300) NOT NULL,
  `parent_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=386 DEFAULT CHARSET=utf8;


INSERT INTO dnt_languages VALUES
(null,"1","67","sk","Slovenský (sk)","0","1","flag_sk","0"),
(null,"2","67","cz","Český (cz)","0","0","flag_cz","0"),
(null,"3","67","pl","Polsky (pl)","0","0","flag_pl","0"),
(null,"4","67","en","English (en)","0","0","flag_en","0"),
(null,"5","67","de","Deutsch (de)","0","0","flag_de","0"),
(null,"6","67","nl","Dutch (nl)","0","0","flag_nl","0"),
(null,"7","67","dk","Danish (dk)","0","0","flag_dk","0");




CREATE TABLE IF NOT EXISTS `dnt_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_entity` int(11) NOT NULL,
  `http_response` varchar(300) NOT NULL,
  `system_status` varchar(300) NOT NULL,
  `log_id` varchar(300) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
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
  `parent_id` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6156 DEFAULT CHARSET=utf8;






CREATE TABLE IF NOT EXISTS `dnt_mailer_mails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_entity` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `title` varchar(1000) NOT NULL,
  `name` varchar(300) NOT NULL,
  `surname` varchar(300) NOT NULL,
  `cat_id` varchar(300) CHARACTER SET armscii8 NOT NULL,
  `email` varchar(300) NOT NULL,
  `datetime_creat` datetime NOT NULL,
  `datetime_update` datetime NOT NULL,
  `show` int(11) NOT NULL,
  `imported_id` varchar(300) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `sender_email` varchar(300) DEFAULT NULL,
  `sender_name` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=165883 DEFAULT CHARSET=utf8;






CREATE TABLE IF NOT EXISTS `dnt_mailer_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_entity` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `cat_id` varchar(300) NOT NULL,
  `name_url` varchar(300) NOT NULL,
  `name` varchar(300) NOT NULL,
  `show` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=92 DEFAULT CHARSET=utf8;






CREATE TABLE IF NOT EXISTS `dnt_microsites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_entity` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `url` varchar(300) NOT NULL,
  `real_url` varchar(300) NOT NULL,
  `active` int(11) NOT NULL,
  `in_progress` int(11) NOT NULL,
  `nazov` varchar(300) NOT NULL,
  `hash` varchar(300) NOT NULL,
  `datum_den` int(11) NOT NULL,
  `datum_mesiac` int(11) NOT NULL,
  `datum_rok` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;






CREATE TABLE IF NOT EXISTS `dnt_microsites_composer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_entity` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `competition_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `content_type` varchar(300) NOT NULL,
  `description` varchar(300) NOT NULL,
  `meta` varchar(300) NOT NULL,
  `value` text NOT NULL,
  `zobrazenie` int(11) NOT NULL,
  `poradie` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5519 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;






CREATE TABLE IF NOT EXISTS `dnt_orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_entity` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `user_id` varchar(300) NOT NULL,
  `order_id` varchar(300) NOT NULL,
  `datetime_creat` datetime NOT NULL,
  `datetime_update` datetime NOT NULL,
  `datetime_publish` datetime NOT NULL,
  `name` varchar(300) NOT NULL,
  `surname` varchar(300) NOT NULL,
  `street` varchar(300) NOT NULL,
  `gate_number` varchar(300) NOT NULL,
  `country` varchar(300) NOT NULL,
  `city` varchar(300) NOT NULL,
  `psc` varchar(300) NOT NULL,
  `phone_number` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `amount` float NOT NULL,
  `payment_type` varchar(300) NOT NULL,
  `transportation` float NOT NULL,
  `is_paid` int(11) NOT NULL,
  `from_account` float NOT NULL,
  `from_cash` float NOT NULL,
  `percentage_discount` float NOT NULL,
  `search` varchar(1000) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `company_name` varchar(1000) NOT NULL,
  `company_street` varchar(1000) NOT NULL,
  `company_gate_number` varchar(1000) NOT NULL,
  `company_city` varchar(1000) NOT NULL,
  `company_country` varchar(1000) NOT NULL,
  `company_psc` varchar(1000) NOT NULL,
  `company_email` varchar(1000) NOT NULL,
  `company_phone_number` varchar(1000) NOT NULL,
  `ico` varchar(300) NOT NULL,
  `dic` varchar(300) NOT NULL,
  `status` int(11) NOT NULL,
  `is_seen` int(11) NOT NULL,
  `show` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;






CREATE TABLE IF NOT EXISTS `dnt_polls` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_entity` int(11) NOT NULL,
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
  `parent_id` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=128 DEFAULT CHARSET=utf8;






CREATE TABLE IF NOT EXISTS `dnt_polls_composer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_entity` int(11) NOT NULL,
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
  `vendor_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4878 DEFAULT CHARSET=utf8;






CREATE TABLE IF NOT EXISTS `dnt_post_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_entity` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `sub_cat_id` int(11) NOT NULL,
  `name_url` varchar(300) NOT NULL,
  `admin_cat` varchar(300) NOT NULL,
  `name` varchar(300) NOT NULL,
  `show` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1332 DEFAULT CHARSET=utf8;


INSERT INTO dnt_post_type VALUES
(null,"290","1","0","sitemap","sitemap","Stránky","1","0","67","0"),
(null,"291","1","0","sitemap-sub","sitemap","Podstránky","1","0","67","0"),
(null,"293","3","0","newsletter","post","Newslettre","1","0","67","0"),
(null,"303","3","0","sliders","post","Sliders","1","0","67","0"),
(null,"304","3","0","texty-na-homepage","post","Texty na homepage","1","0","67","0"),
(null,"305","3","0","partneri","post","Partneri","1","0","67","0"),
(null,"306","3","0","kontaktny-formular","post","Správy z kontaktného formulára","1","0","67","0"),
(null,"308","0","0","eshop-product","product","Eshop Product","1","0","67","0"),
(null,"483","3","0","testovacka","post","Testovačka","1","0","67","0"),
(null,"1298","3","0","test","post","Test","1","0","67","0"),
(null,"1309","0","0","development","product","Development","1","0","67","0");




CREATE TABLE IF NOT EXISTS `dnt_posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_entity` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `post_category_id` varchar(300) NOT NULL,
  `sub_cat_id` varchar(100) NOT NULL,
  `cat_id` varchar(100) NOT NULL,
  `type` varchar(300) NOT NULL,
  `name` varchar(300) NOT NULL,
  `name_url` text NOT NULL,
  `position` int(11) NOT NULL,
  `priority` int(11) NOT NULL,
  `service` varchar(300) NOT NULL,
  `service_id` varchar(500) NOT NULL,
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
  `show` int(11) NOT NULL DEFAULT 1,
  `search` longtext NOT NULL,
  `protected` int(11) NOT NULL DEFAULT 0,
  `vendor_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51001 DEFAULT CHARSET=utf8;


INSERT INTO dnt_posts VALUES
(null,"13071","13071","","","137","post","Výskum a vývoj","slider-vyskum-a-vyvoj","0","0","","","262","2017-03-01 17:24:45","2017-03-01 17:26:24","2017-03-01 17:24:00","0","<p><span style=\"font-size:14px\">Neust&aacute;le hľad&aacute;me lep&scaron;ie rie&scaron;enia...</span></p>\n","","","","","","0","1","","0","67","0"),
(null,"13289","13289","","","290","sitemap","Domov","domov","0","0","homepage","","976","2017-03-06 17:47:59","2018-09-13 16:19:23","2017-03-06 17:47:00","0","<p>xydcvysdvysv</p>\n","","","","","","8","1","","0","67","0"),
(null,"13349","13349","","","290","sitemap","O nás","o-nas","0","0","","","1684","2017-04-06 10:40:47","2018-09-20 13:57:07","2017-04-06 10:40:00","0","<p>sdfvsdf</p>\n","<p>Vo firme Design.dnt pracujeme s r&ocirc;znymi modern&yacute;mi technol&oacute;giami, ktor&eacute; s&uacute; použ&iacute;van&eacute; vo webovom priemysle. Za t&yacute;mto &uacute;čelom sme vyvinuli vlastn&yacute; redakčn&yacute; syst&eacute;m pod n&aacute;zvom <a href=\"/technologie/redakcny-system\">Designdnt</a>&nbsp;Z&aacute;kladom syst&eacute;mu bola použ&iacute;vateľsk&aacute; jednoduchosť, finančn&aacute; dostupnosť a v neposlednom rade intuit&iacute;vnosť. Vďaka dlhodob&eacute;mu v&yacute;voju sa n&aacute;m podarilo vypracovať presne to, čo je perfektn&yacute;m z&aacute;kladom pre bežn&eacute; weby za finančne nen&aacute;ročn&eacute; požiadavky. V roz&scaron;&iacute;ren&iacute; o moduly eshopu, alebo o moduly sprac&uacute;vaj&uacute;ce hromadn&eacute; d&aacute;ta, vieme poskytn&uacute;ť perfektn&eacute; z&aacute;zemie pre <strong>informačn&yacute; syst&eacute;m</strong>.</p>\n\n<ol>\n	<li>vysok&aacute; r&yacute;chlosť jadra <strong>dnt3</strong></li>\n	<li>&quot;inteligentn&eacute;&quot; URL adresy s chronologickou postupnosťou</li>\n	<li>multydom&eacute;nov&aacute;&nbsp;platforma</li>\n	<li>multyvendor platforma</li>\n	<li>facebook - messenger platforma</li>\n	<li>automatick&aacute; gener&aacute;cia robots.txt, google sitemaps</li>\n	<li>jednoduch&aacute; in&scaron;tal&aacute;cia a z&aacute;loha datab&aacute;zy</li>\n	<li>Prepracovan&yacute; cache engine</li>\n	<li>multylanguage podpora</li>\n	<li>Modul kv&iacute;zov pre kv&iacute;zy s percentu&aacute;lnou &uacute;spe&scaron;nosťou</li>\n	<li>Modul kv&iacute;zov s v&yacute;sledkom kategoriz&aacute;cie</li>\n	<li>Modul obsahu</li>\n	<li>Modul sitemapy</li>\n	<li>Modul emailov&eacute;ho klienta</li>\n	<li>Modul spr&aacute;vy s&uacute;borov</li>\n	<li>Modul eshopu a &uacute;čtovn&iacute;ctva</li>\n	<li>Modul ACL (users)</li>\n	<li>Modul restov&eacute;ho JSON / XML api pre zdielanie informacii s tret&iacute;mi stranami</li>\n</ol>\n\n<p>Za zmienku stoj&iacute; poznamenať, že redakčn&yacute; syst&eacute;m Design.dnt z&iacute;skal <strong>3. miesto</strong> v Celo&scaron;t&aacute;tnej prehliadke Stredo&scaron;kolskej odbornej činnosti, kde pod t&yacute;mto syst&eacute;mom bol naprogramovan&yacute; modul eshopu s fakturačn&yacute;m, objedn&aacute;vkov&yacute;m a registračn&yacute;m syst&eacute;mom.</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n","","","","","7","1","","0","67","0"),
(null,"13350","13350","","","303","post","HP slider 1","hp-slider-1","0","0","","","1677","2017-04-06 10:48:57","2018-09-20 13:53:43","2017-04-06 10:48:00","0","","","","","","","0","1","","0","67","0"),
(null,"13351","13351","","","303","post","HP slider 2","hp-slider-2","0","0","","","1678","2017-04-06 10:54:30","2018-09-20 13:54:16","2017-04-06 10:54:00","0","","","","","","","0","1","","0","67","0"),
(null,"13352","13352","","","303","post","HP slider 3","hp-slider-3","0","0","","","1679","2017-04-06 10:54:55","2018-09-20 13:55:01","2017-04-06 10:54:00","0","","","","","","","0","1","","0","67","0"),
(null,"13353","13353","","","304","post","Dnt3 Library","dnt3-library","0","0","","","","2017-04-06 10:57:05","2018-09-07 18:45:14","2017-04-06 10:57:00","0","<p>Dnt3 - Library je Objektovo orientovan&yacute; MVC framework, ktor&yacute; je na mieru prisp&ocirc;soben&yacute; pre redakčn&yacute; syst&eacute;m Designdnt3.</p>\n","<p>Z&aacute;kladn&yacute; text</p>\n","","","","","0","1","","0","67","0"),
(null,"13354","13354","","","290","sitemap","Kvízy","kvizy","0","0","polls","","","2017-04-09 09:45:42","2018-09-07 12:42:02","2017-04-09 09:45:00","0","","","","","","","5","1","","0","67","0"),
(null,"13357","13357","","","290","sitemap","partneri","partneri","0","0","partners","","","2017-04-10 11:29:31","2018-09-07 12:45:39","2017-04-10 11:29:00","0","","","","","","","6","1","","0","67","0"),
(null,"13359","13359","","","305","post","Designdnt3","http://designdnt.query.sk/domov","0","0","","","1680","2017-04-10 11:59:04","2018-09-20 13:55:29","2017-04-10 11:59:00","0","","","","","","","0","1","","0","67","0"),
(null,"13360","13360","","","305","post","Markíza","http://www.markiza.sk/uvod","0","0","","","1681","2017-04-10 12:24:53","2018-09-20 13:55:39","2017-04-10 12:24:00","0","","","","","","","0","1","","0","67","0"),
(null,"13361","13361","","","305","post","Tvnoviny","http://www.tvnoviny.sk/","0","0","","","1682","2017-04-10 12:26:00","2018-09-20 13:55:49","2017-04-10 12:26:00","0","","","","","","","0","1","","0","67","0"),
(null,"13362","13362","","","305","post","Osmos","http://osmos.sk/","0","0","","","1683","2017-04-10 12:26:53","2018-09-20 13:56:27","2017-04-10 12:26:00","0","","","","","","","0","1","","0","67","0"),
(null,"13364","13364","","","306","post","Test Message, Admin Root","test-message-admin-root","0","0","","","","2017-04-10 12:41:34","2017-04-10 12:41:34","2017-04-10 12:41:34","0","","\n	<h3>Test Message</h3><br/>\n	<b>Meno:</b>Admin Root<br/>\n	<b>Adresa:</b>Neznáma 24, 85101, Bratislava<br/>\n	<b>Telefón:</b>0912345678<br/>\n	<b>Email:</b>admon@root.sk<br/>\n	<b>Firma:</b>Designdnt<br/>\n	<b>Produkt:</b><br/><br/>\n	\n	\n	<b>SPRÁVA</b>:\n	Táto správa bola poslaná cez kontaktný formulár na webe skeletónu. A cez send grid bola odoslaná na mail príjmateľa nastaveného v nastaveniach webu.<br/><br/><b>Kontaktný email odosielateľa: <a href=\"mailto:admon@root.sk\">admon@root.sk</a></b>","","","","","0","0","","0","67","0"),
(null,"13365","13365","","","290","sitemap","Články","clanky","0","0","article_list","303,305","","2017-04-10 12:43:40","2018-09-07 17:01:25","2017-04-10 12:43:00","0","","","","","","","3","1","","0","67","0"),
(null,"13366","13366","","","304","post","Redakčný systém","redakcny-system","0","0","","","","2017-04-06 10:57:05","2017-04-13 16:38:27","2017-04-06 10:57:00","0","<p>Redakčn&yacute; syst&eacute;m je syst&eacute;m na spr&aacute;vu webovej str&aacute;nke. V tomto pr&iacute;pade sa jedn&aacute; o skelet&oacute;n aplik&aacute;ciu. Cez CMS Designdnt3 sa daj&uacute; vytv&aacute;rať&nbsp;webov&eacute; str&aacute;nky na platforme &quot;multydomain&quot;. Prvotn&yacute; v&yacute;voj začal v roku 2012, do značky <strong>Designdnt3&nbsp;</strong>sa dostal v roku 2014, odkedy je v&yacute;voj veden&yacute; v objektovo orientovanej platforme design patterne MVC.</p>\n","<p>Z&aacute;kladn&yacute; text</p>\n","","","","","0","1","","0","67","0"),
(null,"13367","13367","","","304","post","Skeletón web","skeleton-web","0","0","","","","2017-04-06 10:57:05","2017-04-13 16:25:13","2017-04-06 10:57:00","0","<p>Skelet&oacute;n web je jednoduch&yacute; web, ktor&yacute; sa spust&iacute; po nain&scaron;talovan&iacute; frameworku dnt3. <a href=\"https://github.com/designdnt/cms-designdnt3\" target=\"_blank\">https://github.com/designdnt/cms-designdnt3&nbsp;</a></p>\n","<p>Z&aacute;kladn&yacute; text</p>\n","","","","","0","1","","0","67","0"),
(null,"13368","13368","","","290","sitemap","Eshop","produkty","0","0","eshop","","","2017-04-25 09:39:04","2018-09-07 12:49:33","2017-04-25 09:39:00","0","","","","","","","2","1","","0","67","0"),
(null,"13369","13369","","","294","article","","","0","0","","","","2017-04-25 09:49:05","2017-04-25 09:49:05","2017-04-25 09:49:05","0","","","","","","","0","0","","0","67","0"),
(null,"13370","13370","","","308","product","Iphone 5 SE","iphone-5-se","0","0","product_detail","","5225","2017-04-25 09:49:42","2020-01-17 08:19:31","2017-04-25 09:49:00","0","","","","","","","0","1","iphone5seiphone5se450jghj","0","67","0"),
(null,"13392","13392","","","290","sitemap","Microsites","microsites","0","0","microsites","","","2017-05-01 11:44:03","2018-09-07 12:51:24","2017-05-01 11:44:00","0","","","","","","","0","0","","0","67","0"),
(null,"13573","13573","","13289","291","sitemap","Domáce","domace","0","0","polls","","","2018-09-07 13:17:09","2018-09-22 09:49:23","2018-09-07 13:17:00","0","","","","","","","0","0","","0","67","0"),
(null,"13575","13575","","","290","sitemap","Hotely","hotely","0","0","wp_hotely","","977","2018-09-07 23:33:43","2018-09-07 23:54:56","2018-09-07 23:33:00","0","","","","","","","4","1","","0","67","0"),
(null,"13663","13663","","","483","post","Test 25","test-25","0","0","","","","2018-09-10 15:53:37","2018-09-10 15:53:44","2018-09-10 15:53:00","0","","","","","","","0","1","","0","67","0"),
(null,"14124","14124","","","293","post","Prázdna","prazdna","0","0","","","","2018-09-19 14:10:43","2019-12-07 22:56:03","2018-09-19 14:10:00","0","","","","","","","0","1","prazdnaprazdna","0","67","0"),
(null,"14154","14154","","","294","article","Článok Domáce","clanok-domace","0","0","","","","2018-09-22 08:57:04","2018-09-22 08:57:23","2018-09-22 08:57:00","0","","","","","","","0","0","","0","67","0"),
(null,"14155","14155","","","290","sitemap","Kontakt","kontakt","0","0","contact","","","2018-09-22 09:51:19","2018-09-22 09:51:32","2018-09-22 09:51:00","0","","","","","","","1","1","","0","67","0"),
(null,"19010","19010","","","1309","product","Programátorské práce","programatorske-prace","0","0","product_detail","","1681","2020-01-15 13:11:42","2020-01-18 12:13:05","2020-01-15 13:11:00","0","","","","","","","0","1","programatorskepraceprogramatorskeprace150gfh","0","67","0");




CREATE TABLE IF NOT EXISTS `dnt_posts_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_entity` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `type` varchar(300) NOT NULL,
  `name` varchar(300) NOT NULL,
  `name_url` varchar(300) NOT NULL,
  `char_index` varchar(300) NOT NULL,
  `order` int(11) NOT NULL,
  `show` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=200 DEFAULT CHARSET=utf8;






CREATE TABLE IF NOT EXISTS `dnt_posts_meta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_entity` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `service` varchar(300) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `key` varchar(300) NOT NULL,
  `value` text NOT NULL,
  `content_type` varchar(300) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `order` int(11) NOT NULL,
  `show` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=228693 DEFAULT CHARSET=utf8;


INSERT INTO dnt_posts_meta VALUES
(null,"1","13575","wp_hotely","67","info_hotel_name_1","Content","text","2","Názov hotelu 1","0","1"),
(null,"2","13575","wp_hotely","67","info_hotel_addr_1","Content","text","2","Url adresa hotelu 1","0","1"),
(null,"3","13575","wp_hotely","67","info_hotel_tel_c_1","Content","text","2","Telefón do hotela 1","0","1"),
(null,"4","13575","wp_hotely","67","info_hotel_email_1","Content","text","2","Email hotelu 1","0","1"),
(null,"5","13575","wp_hotely","67","_menu_7_image_1_1","Content","image","2","Fotka k modulu UBYTOVANIE","0","1"),
(null,"6","13575","wp_hotely","67","_menu_7_text_1","<p>Content</p>\n","content","2","Text k modulu UBYTOVANIE 1","0","1"),
(null,"7","13575","wp_hotely","67","_menu_7_image_2_1","Content","image","2","Fotka loga k modulu UBYTOVANIE","0","1"),
(null,"8","13575","wp_hotely","67","_menu_7_file1","Content","file","2","Súbor 1 default","0","1"),
(null,"9","13575","wp_hotely","67","_menu_7_file2","Content","file","2","Súbor 2 default","0","1"),
(null,"10","13575","wp_hotely","67","link_hotel_1","Content","text","2","Url adresa hotela 1","0","1"),
(null,"9247","13370","product_detail","67","price","450","text","2","Cena produktu","100","1"),
(null,"9248","13370","product_detail","67","category","jghj","text","2","Kategória","100","1"),
(null,"9249","19010","product_detail","67","price","150","text","2","Cena produktu","100","1"),
(null,"9250","19010","product_detail","67","category","gfh","text","2","Kategória","100","1");




CREATE TABLE IF NOT EXISTS `dnt_registred_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_entity` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `voucher` varchar(300) NOT NULL,
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
  `kliknute` int(11) NOT NULL DEFAULT 0,
  `ip_adresa` varchar(300) NOT NULL,
  `parent_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=72291 DEFAULT CHARSET=utf8;






CREATE TABLE IF NOT EXISTS `dnt_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_entity` int(11) NOT NULL,
  `type` varchar(300) NOT NULL,
  `key` varchar(300) NOT NULL,
  `value` varchar(300) NOT NULL,
  `content_type` varchar(300) NOT NULL,
  `description` varchar(300) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  `show` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7340 DEFAULT CHARSET=utf8;


INSERT INTO dnt_settings VALUES
(null,"7208","default","hide_registration_info","","bool","Skryť informácie a preklik na registráciu v pravom stĺpci","67","70","0"),
(null,"7207","keys","automatic_voucher","","text","Automatické odosielanie voucherov","67","10","0"),
(null,"7206","social","google_map","","content","Google Mapy","67","0","0"),
(null,"7205","","default_lang","","content","Jayzk","67","0","1"),
(null,"7204","logo","logo_firmy","1680","image","Logo firmy 1","67","10","1"),
(null,"7203","default_images","no_img","2253","image","Defaulntý obrázok na webe","67","0","0"),
(null,"7201","vendor","vendor_currency_nazov","Eur","content","Platobná mena slovom","67","0","1"),
(null,"7202","default_images","no_user","2253","image","Defaulntý obrázok pre používateľa","67","0","0"),
(null,"7200","social","instagram","","content","Instagram","67","0","0"),
(null,"7199","vendor","platca_dph","0","content","Platca DPH","67","0","0"),
(null,"7198","vendor","vendor_currency","€","content","Platobná mena znak","67","0","1"),
(null,"7197","vendor","vendor_dic","","content","DIČ","67","0","1"),
(null,"7196","vendor","vendor_ico","48272205","content","IČO","67","0","1"),
(null,"7195","vendor","vendor_iban","SK7383605207004205294565","content","IBAN","67","0","1"),
(null,"7194","vendor","vendor_tel","0904700823","content","Telefónne číslo","67","0","1"),
(null,"7193","vendor","vendor_dph","20","content","DPH (%)","67","0","1"),
(null,"7190","vendor","vendor_city","Bratislava","content","Mesto","67","0","1"),
(null,"7189","vendor","vendor_email","thomas.doubek@gmail.com","content","Email","67","0","1"),
(null,"7188","logo","logo_url_3","https://www.hornirakousko.cz/","content","Odkaz na logo firmy 3","67","31","0"),
(null,"7187","default_images","favicon","2075","image","Favicon","67","0","1"),
(null,"7186","extends","font","Roboto","font","Font","67","30","1"),
(null,"7185","social","google_plus","","content","Google Plus","67","0","0"),
(null,"7183","keys","pixel_retargeting","","content","Pixel Retargeting","67","60","0"),
(null,"7191","vendor","vendor_psc","84101","content","PSČ","67","0","1"),
(null,"7192","vendor","vendor_fax","","content","Fax","67","0","0"),
(null,"7184","extends","color","#a41d23","color","Farba","67","10","1"),
(null,"7182","extends","impressum","","content","Impressum","67","40","1"),
(null,"7181","logo","logo_url","https://www.digilopment.com","content","Odkaz na logo firmy 1","67","11","1"),
(null,"7180","logo","logo_url_2","https://www.salzburg.info/cs","content","Odkaz na logo firmy 2","67","21","0"),
(null,"7179","logo","logo_firmy_3","2081","image","Logo firmy 3","67","30","0"),
(null,"7178","keys","msg_hub_verify_token","","content","Messenger Bot - verifikačný token","67","0","0"),
(null,"7177","default","keywords","skeleton, web","content","Kľúčové slová","67","30","1"),
(null,"7176","keys","msg_access_token","","content","Messenger Bot - prístupvý token","67","0","0"),
(null,"7175","social","facebook_page","","content","Facebook Page","67","0","0"),
(null,"7174","default","title","Skeletón","content","Názov webu","67","10","1"),
(null,"7173","social","linked_in","","content","Linked In","67","0","0"),
(null,"7172","social","youtube_channel","","content","Youtube Kanál","67","0","0"),
(null,"7171","social","twitter","","content","Twitter","67","0","0"),
(null,"7170","logo","logo_firmy_2","3159","image","Logo firmy 2","67","20","0"),
(null,"7169","default","notifikacny_email","thomas.doubek@gmail.com","content","Notifikačný email","67","0","1"),
(null,"7168","","sirka_fotky_sponzori_modul","200","content","","67","0","0"),
(null,"7167","keys","gc_site_key","6LcyUcAUAAAAAFPuRjihdOr9PnipfaDNE7KXuC4j","text","Google Captcha Site key","67","0","1"),
(null,"7166","social","flickr","","content","Flickr","67","0","0"),
(null,"7165","","blokvane_ip","","content","","67","0","0"),
(null,"7164","default","language","sk","content","Jayzková mutácia na webe","67","60","1"),
(null,"7162","keys","gc_secret_key","6LcyUcAUAAAAACVad9sdL0dji996f9pnAVrFIcxd","text","Google Captcha Secret key","67","0","1"),
(null,"7163","default","description","Skeletón Test Web","content","Description webu","67","20","1"),
(null,"7161","extends","data_protection","","content","Data Protection","67","50","1"),
(null,"7160","","still_redirect_to_domain","0","bool","Vždy presmerovať web na reálnu url adresu, a to aj vtedy, ak sa nachádza v testovacom móde.","67","0","1"),
(null,"7159","keys","ga_key","UA-119752505-11","content","Google Analytics key","67","0","1"),
(null,"7158","","startovaci_modul","homepage","content","Po načítaní webu redirectovať na:","67","50","0"),
(null,"7156","social_wall","twitter_sw","","text","Twitter Social Wall","67","10","0"),
(null,"7157","keys","send_grid_api_key","","text","Api key pre Send grid","67","10","1"),
(null,"7155","social_wall","youtube_sw","","text","Youtube Social Wall","67","10","0"),
(null,"7154","social_wall","instagram_sw","","text","Instagram Post Social Wall","67","10","0"),
(null,"7153","social_wall","facebook_post_sw","","text","Facebook Post Social Wall","67","10","0"),
(null,"7209","logo","invoice_logo","5226","image","Logo na faktúre","67","10","1"),
(null,"7152","social_wall","facebook_page_sw","","text","Facebook Page Social Wall","67","10","0"),
(null,"7151","vendor","vendor_street","Koprivnická 13","content","Ulica","67","0","1"),
(null,"7150","vendor","vendor_company","Tomáš Doubek - Designdnt","content","Názov firmy","67","0","1"),
(null,"7149","","cachovanie","0","content","Cahovanie webu na frontende v minutách","67","70","0"),
(null,"7148","keys","send_grid_api_template_id","b9b5da64-4467-401e-bece-31b0e375fe69","text","Template ID pre Send grid","67","10","1"),
(null,"7339","default","test","","text","Testovacie nastavenie, meta nastavení zbehli úspešne","67","10","0");




CREATE TABLE IF NOT EXISTS `dnt_translates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_entity` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `lang_id` varchar(100) NOT NULL,
  `translate_id` varchar(300) NOT NULL,
  `type` varchar(300) NOT NULL,
  `table` varchar(300) NOT NULL,
  `translate` text NOT NULL,
  `show` int(11) NOT NULL DEFAULT 1,
  `parent_id` int(11) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=129696 DEFAULT CHARSET=utf8;


INSERT INTO dnt_translates VALUES
(null,"75433","67","sk","home","static","","Domov","1","0"),
(null,"75434","67","en","home","static","","Home","1","0"),
(null,"75435","67","sk","home","static","","Domov","1","0"),
(null,"75436","67","en","home","static","","Home","1","0"),
(null,"75437","67","en","4589","name","dnt_posts","About us","1","0"),
(null,"75438","67","en","4592","name","dnt_posts","About us 2","1","0"),
(null,"75439","67","en","8972","name","dnt_posts","Test Article","1","0"),
(null,"75440","67","en","8972","name_url","dnt_posts","test-article","1","0"),
(null,"75441","67","en","8972","perex","dnt_posts","<p>I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account</p>\n","1","0"),
(null,"75442","67","en","8972","content","dnt_posts","<p>I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account</p>\n","1","0"),
(null,"75443","67","en","8972","tags","dnt_posts","car,test","1","0"),
(null,"75444","67","de","8972","name","dnt_posts","Ta test","1","0"),
(null,"75445","67","de","8972","name_url","dnt_posts","ta-test","1","0"),
(null,"75446","67","de","8972","perex","dnt_posts","<p>I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account</p>\n","1","0"),
(null,"75447","67","de","8972","content","dnt_posts","<p>I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account</p>\n","1","0"),
(null,"75448","67","de","8972","tags","dnt_posts","das auto, das test","1","0"),
(null,"75469","67","en","13065","name","dnt_posts","cfhfghg","1","0"),
(null,"75499","67","en","13067","name","dnt_posts","Tooling & Molding<br/> ","1","0"),
(null,"75501","67","en","13067","perex","dnt_posts","<p>In 2016 we decided to expand the scope of the company in Bytča, we opened a new technology center for the production and treatment of injection molds for plastics.</p>\n","1","0"),
(null,"75504","67","de","13067","name","dnt_posts","Werkzeug- und Vorrichtungsbau","1","0"),
(null,"75506","67","de","13067","perex","dnt_posts","<p>Dieser Beitrag hat keine Vorschau Artikel, weil ihr Inhalt ist wahrscheinlich von multymedi&aacute;lneho Inhalt bestehen. Bitte klicken um mehr zu lesen und Sie k&ouml;nnen den gew&auml;hlten Inhalt zu sehen.</p>\n","1","0"),
(null,"75519","67","en","13069","name","dnt_posts","Research & Development<br/> ","1","0"),
(null,"75521","67","en","13069","perex","dnt_posts","<p>Today s full-time startups and new technologies have increasingly higher demands on the functionality and efficiency of the solutions available on the market.</p>\n","1","0"),
(null,"75524","67","de","13069","name","dnt_posts","Forschung und Entwicklung","1","0"),
(null,"75526","67","de","13069","perex","dnt_posts","<p>Die heutige Vollzeit Start-ups und neue Technologien haben immer h&ouml;here Anforderungen an die Funktionalit&auml;t und Effizienz der verf&uuml;gbaren L&ouml;sungen auf dem Markt.</p>\n","1","0"),
(null,"75529","67","en","13071","name","dnt_posts","Research & Development","1","0"),
(null,"75531","67","en","13071","perex","dnt_posts","<p>We are constantly looking for better solutions...</p>\n","1","0"),
(null,"75534","67","de","13071","name","dnt_posts","Forschung und Entwicklung","1","0"),
(null,"75536","67","de","13071","perex","dnt_posts","<p>Wir sind st&auml;ndig auf der Suche nach besseren L&ouml;sungen...</p>\n","1","0"),
(null,"75539","67","en","13072","name","dnt_posts","PDC","1","0"),
(null,"75541","67","en","13072","perex","dnt_posts","<p><strong>Plan-de-Campagne</strong><span style=\"font-family:tahoma,geneva,sans-serif; font-size:15.4px\">&nbsp;</span><strong>(PdC)</strong><span style=\"font-family:tahoma,geneva,sans-serif; font-size:15.4px\">&nbsp;is&nbsp;....</span></p>\n","1","0"),
(null,"75544","67","de","13072","name","dnt_posts","PDC","1","0"),
(null,"75549","67","en","13073","name","dnt_posts","Free production capacities","1","0"),
(null,"75551","67","en","13073","perex","dnt_posts","<p>Free production capacities for continuouse 5 axis milling</p>\n","1","0"),
(null,"75559","67","en","header_top_vitajte_1","static","","Welcome visitor can you","1","0"),
(null,"75560","67","en","alebo","static","","or","1","0"),
(null,"75561","67","sk","header_top_vitajte_1","static","","Vitajte zákazník! Chcete sa","1","0"),
(null,"75562","67","sk","alebo","static","","alebo","1","0"),
(null,"75563","67","en","prihlasit","static","","Login to client zone","1","0"),
(null,"75564","67","sk","prihlasit","static","","Prihlásenie do klientskej zóny","1","0"),
(null,"75565","67","en","registrovat","static","","Create an Account","1","0"),
(null,"75566","67","sk","registrovat","static","","Vytvoriť nový účet","1","0"),
(null,"75567","67","en","moj_ucet","static","","My Account","1","0"),
(null,"75568","67","sk","moj_ucet","static","","Môj účet","1","0"),
(null,"75569","67","en","nakupny_kosik","static","","Orders List","1","0"),
(null,"75570","67","sk","nakupny_kosik","static","","Nákupný košík","1","0"),
(null,"75571","67","en","pridat_do_kosika","static","","+ add to cart","1","0"),
(null,"75572","67","sk","pridat_do_kosika","static","","+ do košíka","1","0"),
(null,"75573","67","en","zobrazit_ako","static","","View as","1","0"),
(null,"75574","67","sk","zobrazit_ako","static","","Zobraziť ako","1","0"),
(null,"75575","67","en","kategorie","static","","Categories","1","0"),
(null,"75576","67","sk","kategorie","static","","Kategórie","1","0"),
(null,"75577","67","en","zdielat","static","","+ share","1","0"),
(null,"75578","67","sk","zdielat","static","","+ zdielať","1","0"),
(null,"75579","67","en","prejst_na_produkt","static","","Go to the product","1","0"),
(null,"75580","67","sk","prejst_na_produkt","static","","Prejsť na produkt","1","0"),
(null,"75581","67","en","pridane","static","","Posted","1","0"),
(null,"75582","67","sk","pridane","static","","Pridané","1","0"),
(null,"75583","67","en","vysledky","static","","Results","1","0"),
(null,"75584","67","sk","vysledky","static","","Výsledky","1","0"),
(null,"75585","67","en","z","static","","of","1","0"),
(null,"75586","67","sk","z","static","","z","1","0"),
(null,"75587","67","en","stran","static","","pages","1","0"),
(null,"75588","67","sk","stran","static","","strán","1","0"),
(null,"75589","67","en","order_by_news","static","","Sort by latest","1","0"),
(null,"75590","67","sk","order_by_news","static","","Zoradiť podľa najnovších","1","0"),
(null,"75591","67","en","order_by_ship_asc","static","","Sort by cheapest","1","0"),
(null,"75592","67","sk","order_by_ship_asc","static","","Zoradiť od najlacnejších","1","0"),
(null,"75593","67","en","order_by_ship_desc","static","","Sort by most expensive","1","0"),
(null,"75594","67","sk","order_by_ship_desc","static","","Zoradiť od najdrahších","1","0"),
(null,"75595","67","en","order_by_name_a_z","static","","Sort by name (A - Z)","1","0"),
(null,"75596","67","sk","order_by_name_a_z","static","","Podľa názvu (A - Z)","1","0"),
(null,"75597","67","en","order_by_name_z_a","static","","Sort by name (Z - A)","1","0"),
(null,"75598","67","sk","order_by_name_z_a","static","","Podľa názvu (Z - A)","1","0"),
(null,"75599","67","en","vyber_znacku","static","","Choose a brand","1","0"),
(null,"75600","67","sk","vyber_znacku","static","","Vyberte značku","1","0"),
(null,"75601","67","en","nakupny_kosik_je_prazdny","static","","Your cart is empty!","1","0"),
(null,"75602","67","sk","nakupny_kosik_je_prazdny","static","","Váš nákupný košík je prázdny!","1","0"),
(null,"75603","67","en","nazov_produktu","static","","Product Image &amp; Name","1","0"),
(null,"75604","67","sk","nazov_produktu","static","","Názov produktu a fotka","1","0"),
(null,"75605","67","en","cena","static","","Price","1","0"),
(null,"75606","67","sk","cena","static","","Cena","1","0"),
(null,"75607","67","en","pocet_kusov","static","","Quantity","1","0"),
(null,"75608","67","sk","pocet_kusov","static","","Počet kusov","1","0"),
(null,"75609","67","en","sub_total","static","","Overal / items","1","0"),
(null,"75610","67","sk","sub_total","static","","Spolu / počet kusov","1","0"),
(null,"75611","67","en","vymazat","static","","Remove","1","0"),
(null,"75612","67","sk","vymazat","static","","Vymazať","1","0"),
(null,"75613","67","en","upravit","static","","Update","1","0"),
(null,"75614","67","sk","upravit","static","","Upraviť","1","0"),
(null,"75615","67","en","suma","static","","Resulting amount","1","0"),
(null,"75616","67","sk","suma","static","","Výsledná suma","1","0"),
(null,"75617","67","en","suma_bez_dph","static","","Amount vat","1","0"),
(null,"75618","67","sk","suma_bez_dph","static","","Suma bez DPH","1","0"),
(null,"75619","67","en","dan","static","","Tax","1","0"),
(null,"75620","67","sk","dan","static","","Daň","1","0"),
(null,"75621","67","en","dph","static","","VAT","1","0"),
(null,"75622","67","sk","dph","static","","DPH","1","0"),
(null,"75623","67","en","dodacie_udaje","static","","Shipping information","1","0"),
(null,"75624","67","sk","dodacie_udaje","static","","Dodacie údaje","1","0");
INSERT INTO dnt_translates VALUES
(null,"75625","67","en","prosim_vyplnte_dodacie_udaje","static","","Please fill shipping information","1","0"),
(null,"75626","67","sk","prosim_vyplnte_dodacie_udaje","static","","Prosím vyplnte dodacie údaje","1","0"),
(null,"75627","67","en","meno","static","","Name","1","0"),
(null,"75628","67","sk","meno","static","","Meno","1","0"),
(null,"75629","67","en","priezvisko","static","","Surname","1","0"),
(null,"75630","67","sk","priezvisko","static","","Priezvisko","1","0"),
(null,"75631","67","en","email","static","","Email","1","0"),
(null,"75632","67","sk","email","static","","Email","1","0"),
(null,"75633","67","en","tel_c","static","","Telephone number","1","0"),
(null,"75634","67","sk","tel_c","static","","Telefónne číslo","1","0"),
(null,"75635","67","en","ulica","static","","Street","1","0"),
(null,"75636","67","sk","ulica","static","","Ulica","1","0"),
(null,"75637","67","en","c_domu","static","","House number","1","0"),
(null,"75638","67","sk","c_domu","static","","Číslo domu","1","0"),
(null,"75639","67","en","psc","static","","Postcode","1","0"),
(null,"75640","67","sk","psc","static","","Smerovacie číslo (PSČ)","1","0"),
(null,"75641","67","en","sposob_platby","static","","Payment method","1","0"),
(null,"75642","67","sk","sposob_platby","static","","Spôsob platby","1","0"),
(null,"75643","67","en","sposob_dopravy","static","","Transport method / pickup goods","1","0"),
(null,"75644","67","sk","sposob_dopravy","static","","Spôsob dopravy / vyzdvihnutie tovaru","1","0"),
(null,"75645","67","en","poznamka","static","","Note","1","0"),
(null,"75646","67","sk","poznamka","static","","Poznámka","1","0"),
(null,"75647","67","en","pole_je_volitelne","static","","The field is optional","1","0"),
(null,"75648","67","sk","pole_je_volitelne","static","","Toto pole je voliteľné","1","0"),
(null,"75649","67","en","pole_je_povinne","static","","The field is required","1","0"),
(null,"75650","67","sk","pole_je_povinne","static","","Toto pole je povinné","1","0"),
(null,"75651","67","en","mesto","static","","City","1","0"),
(null,"75652","67","sk","mesto","static","","Mesto","1","0"),
(null,"75653","67","en","krajina","static","","Country","1","0"),
(null,"75654","67","sk","krajina","static","","Štát","1","0"),
(null,"75655","67","en","prosim_vyberte_si","static","","Please select","1","0"),
(null,"75656","67","sk","prosim_vyberte_si","static","","Prosím vyberte si","1","0"),
(null,"75657","67","en","potvrdit_objednavku","static","","Confirm order","1","0"),
(null,"75658","67","sk","potvrdit_objednavku","static","","Potvrdiť objednávku","1","0"),
(null,"75659","67","en","registracia","static","","Registration","1","0"),
(null,"75660","67","sk","registracia","static","","Registrácia","1","0"),
(null,"75661","67","en","chcem_sa_zaregistrovat","static","","I want to register for better comfort","1","0"),
(null,"75662","67","sk","chcem_sa_zaregistrovat","static","","Chcem sa zaregistrovať a tak nakupovať z pohodlia domova","1","0"),
(null,"75663","67","en","heslo","static","","Password","1","0"),
(null,"75664","67","sk","heslo","static","","Heslo","1","0"),
(null,"75665","67","en","heslo_overenie","static","dnt_translates","Copy password","1","0"),
(null,"75666","67","sk","heslo_overenie","static","dnt_translates","Overenie hesla","1","0"),
(null,"75667","67","en","zaregistruj_ma","static","","Register me","1","0"),
(null,"75668","67","sk","zaregistruj_ma","static","","Zaregistruj ma","1","0"),
(null,"75669","67","en","filter","static","","Filter","1","0"),
(null,"75670","67","sk","filter","static","","Filter","1","0"),
(null,"75671","67","en","rok","static","","Year","1","0"),
(null,"75672","67","sk","rok","static","","Rok","1","0"),
(null,"75673","67","en","galeria","static","","Gallery","1","0"),
(null,"75674","67","sk","galeria","static","","Galéria","1","0"),
(null,"75675","67","en","vsetky_albumy","static","","All albums","1","0"),
(null,"75676","67","sk","vsetky_albumy","static","","Všetky albumy","1","0"),
(null,"75677","67","en","kontakt","static","","Contact","1","0"),
(null,"75678","67","sk","kontakt","static","","Kontakt","1","0"),
(null,"75679","67","en","kontakt_info","static","","Contact Info","1","0"),
(null,"75680","67","sk","kontakt_info","static","","Kontaktné informácie","1","0"),
(null,"75681","67","en","kontaktny_formular","static","","Contact Form","1","0"),
(null,"75682","67","sk","kontaktny_formular","static","","Kontaktný formulár","1","0"),
(null,"75683","67","en","predmet","static","","Subject","1","0"),
(null,"75684","67","sk","predmet","static","","Predmet","1","0"),
(null,"75685","67","en","sprava","static","","Message","1","0"),
(null,"75686","67","sk","sprava","static","","Správa","1","0"),
(null,"75687","67","en","odoslat","static","","Submit","1","0"),
(null,"75688","67","sk","odoslat","static","","Odoslať","1","0"),
(null,"75689","67","en","pondelok","static","","Monday","1","0"),
(null,"75690","67","sk","pondelok","static","","Pondelok","1","0"),
(null,"75691","67","en","utorok","static","","Tuesday","1","0"),
(null,"75692","67","sk","utorok","static","","Utorok","1","0"),
(null,"75693","67","en","streda","static","","Wednesday","1","0"),
(null,"75694","67","sk","streda","static","","Streda","1","0"),
(null,"75695","67","en","stvrtok","static","","Thursday","1","0"),
(null,"75696","67","sk","stvrtok","static","","Štvrtok","1","0"),
(null,"75697","67","en","piatok","static","","Friday","1","0"),
(null,"75698","67","sk","piatok","static","","Piatok","1","0"),
(null,"75699","67","en","sobota","static","","Saturday","1","0"),
(null,"75700","67","sk","sobota","static","","Sobota","1","0"),
(null,"75701","67","en","nedela","static","","Sunday","1","0"),
(null,"75702","67","sk","nedela","static","","Nedeľa","1","0"),
(null,"75703","67","en","clanky","static","","Blog","1","0"),
(null,"75704","67","sk","clanky","static","","Články","1","0"),
(null,"75705","67","en","pridane","static","","Posted","1","0"),
(null,"75706","67","sk","pridane","static","","Pridané","1","0"),
(null,"75707","67","en","hlaska_pocet_komentarov","static","","comment(s) in this post","1","0"),
(null,"75708","67","sk","hlaska_pocet_komentarov","static","","komentárov v tomto príspevku","1","0"),
(null,"75709","67","en","hodnotenie_postu_hlaska","static","","Automatic post assessment","1","0"),
(null,"75710","67","sk","hodnotenie_postu_hlaska","static","","Automatické hodnotenie príspevku","1","0"),
(null,"75711","67","en","ziaden_obsah_k_zobrazeniu","static","","Sorry, no posts to show","1","0"),
(null,"75712","67","sk","ziaden_obsah_k_zobrazeniu","static","","Ľutujeme, ale žiaden obsah nie je k zobrazeniu","1","0"),
(null,"75713","67","en","citat_viac","static","","Read more","1","0"),
(null,"75714","67","sk","citat_viac","static","","Čítať viac","1","0"),
(null,"75715","67","en","vitajte","static","","Welcome","1","0"),
(null,"75716","67","sk","vitajte","static","","Vitajte","1","0"),
(null,"75717","67","en","objednavok","static","","Orders","1","0"),
(null,"75718","67","sk","objednavok","static","","Objednávok","1","0"),
(null,"75719","67","en","zaplatene","static","","Total paid","1","0"),
(null,"75720","67","sk","zaplatene","static","","Spolu zaplatené","1","0"),
(null,"75721","67","en","komentarov","static","","Comments","1","0"),
(null,"75722","67","sk","komentarov","static","","Komentárov","1","0"),
(null,"75723","67","en","priemerna_cena_za_nakup","static","","Average price <br/>per shopping","1","0"),
(null,"75724","67","sk","priemerna_cena_za_nakup","static","","Priemerná cena <br/>za nákup","1","0");
INSERT INTO dnt_translates VALUES
(null,"75725","67","en","informacie","static","","Informations","1","0"),
(null,"75726","67","sk","informacie","static","","Informácie","1","0"),
(null,"75727","67","en","moj_profil","static","","My profile ","1","0"),
(null,"75728","67","sk","moj_profil","static","","Môj profil","1","0"),
(null,"75729","67","en","moje_udaje","static","","My data ","1","0"),
(null,"75730","67","sk","moje_udaje","static","","Moje údaje","1","0"),
(null,"75731","67","en","upravit_udaje","static","","Edit my data","1","0"),
(null,"75732","67","sk","upravit_udaje","static","","Upraviť údaje","1","0"),
(null,"75733","67","en","moje_objednavky","static","","My orders","1","0"),
(null,"75734","67","sk","moje_objednavky","static","","Moje objednávky","1","0"),
(null,"75735","67","en","zmenit_heslo","static","","Change password","1","0"),
(null,"75736","67","sk","zmenit_heslo","static","","Zmeniť heslo","1","0"),
(null,"75737","67","en","nepotvrdena_objednavka","static","","Order not confirmed","1","0"),
(null,"75738","67","sk","nepotvrdena_objednavka","static","","Objednávka nepotvrdená","1","0"),
(null,"75739","67","en","potvrdena_objednavka","static","","Order confirmed, waiting for progress","1","0"),
(null,"75740","67","sk","potvrdena_objednavka","static","","Objednávka potvrdená, čaká na vybavenie","1","0"),
(null,"75741","67","en","objednavka_sa_spracuva","static","","Order in progress","1","0"),
(null,"75742","67","sk","objednavka_sa_spracuva","static","","Objednávka sa vybavuje","1","0"),
(null,"75743","67","en","vybavena_objednavka","static","","Order equipped","1","0"),
(null,"75744","67","sk","vybavena_objednavka","static","","Objednávka vybavená","1","0"),
(null,"75745","67","en","anulovana_objednavka","static","","Order canceled","1","0"),
(null,"75746","67","sk","anulovana_objednavka","static","","Objednávka zrušená","1","0"),
(null,"75747","67","en","odhlasit","static","","Log out","1","0"),
(null,"75748","67","sk","odhlasit","static","","Odhlásiť sa","1","0"),
(null,"75749","67","en","prosim_prihlaste_sa","static","","Please Log in firstly","1","0"),
(null,"75750","67","sk","prosim_prihlaste_sa","static","","Prosím najprv sa prihláste","1","0"),
(null,"75751","67","en","nacitam","static","","loading","1","0"),
(null,"75752","67","sk","nacitam","static","","načítam","1","0"),
(null,"75753","67","en","nove_heslo","static","","New password","1","0"),
(null,"75754","67","sk","nove_heslo","static","","Nové heslo","1","0"),
(null,"75755","67","en","nove_heslo_overenie","static","","Copy new password","1","0"),
(null,"75756","67","sk","nove_heslo_overenie","static","","Overenie nového hesla","1","0"),
(null,"75757","67","en","prihlaseny","static","","Logged user","1","0"),
(null,"75758","67","sk","prihlaseny","static","","Prihlásený používateľ","1","0"),
(null,"75759","67","en","cislo_objednavky","static","","Order Number","1","0"),
(null,"75760","67","sk","cislo_objednavky","static","","Číslo objednávky","1","0"),
(null,"75761","67","en","datum_objednavky","static","","Order Date","1","0"),
(null,"75762","67","sk","datum_objednavky","static","","Dátum objednávky","1","0"),
(null,"75763","67","en","stav_objednavky","static","","Order Status","1","0"),
(null,"75764","67","sk","stav_objednavky","static","","Stav objednávky","1","0"),
(null,"75765","67","en","ziadne_objednavky_na_show","static","","No Orders to show","1","0"),
(null,"75766","67","sk","ziadne_objednavky_na_show","static","","Žiadne objednávky na show","1","0"),
(null,"75767","67","en","zle_vyplnene_pole","static","","Wrong data in field","1","0"),
(null,"75768","67","sk","zle_vyplnene_pole","static","","Zle vyplnené pole ","1","0"),
(null,"75769","67","en","error_box","static","","Oops, something s wrong","1","0"),
(null,"75770","67","sk","error_box","static","","Hups, niečo je zle","1","0"),
(null,"75771","67","en","opravit","static","","Repair","1","0"),
(null,"75772","67","sk","opravit","static","","Opraviť","1","0"),
(null,"75773","67","en","prazdne_pole_hlaska","static","","Field name is probably empty","1","0"),
(null,"75774","67","sk","prazdne_pole_hlaska","static","","Pole pravdepodobne nie je vyplnené","1","0"),
(null,"75775","67","en","slide_show","static","","Slide show of cover photos album","1","0"),
(null,"75776","67","sk","slide_show","static","","Prehľad titulných fotiek albumov","1","0"),
(null,"75777","67","en","zly_tvar_emailu","static","","Wrong form of email","1","0"),
(null,"75778","67","sk","zly_tvar_emailu","static","","Email je v nesprávnom tvare","1","0"),
(null,"75779","67","en","email_exists","static","","This email already exists","1","0"),
(null,"75780","67","sk","email_exists","static","","Tento email už existuje","1","0"),
(null,"75781","67","en","heslo_kratke","static","","Password is too short","1","0"),
(null,"75782","67","sk","heslo_kratke","static","","Heslo je príliš krátke","1","0"),
(null,"75783","67","en","heslo_overenie_kratke","static","","Copy of password is too short","1","0"),
(null,"75784","67","sk","heslo_overenie_kratke","static","","Overenie hesla je príliš krátke","1","0"),
(null,"75785","67","en","hesla_sa_nezhoduju","static","","Passwords do not matcht","1","0"),
(null,"75786","67","sk","hesla_sa_nezhoduju","static","","Heslá sa nezhodujú","1","0"),
(null,"75787","67","en","uspesna_registracia","static","","Registration was successful","1","0"),
(null,"75788","67","sk","uspesna_registracia","static","","Registrácia prebehla úspešne","1","0"),
(null,"75789","67","en","gratulujeme","static","","Congratulations","1","0"),
(null,"75790","67","sk","gratulujeme","static","","Gratulujeme","1","0"),
(null,"75791","67","en","zlava","static","","Discount","1","0"),
(null,"75792","67","sk","zlava","static","","Zľava","1","0"),
(null,"75793","67","en","novinka","static","","News","1","0"),
(null,"75794","67","sk","novinka","static","","Novinka","1","0"),
(null,"75795","67","en","vypredaj","static","","Sale","1","0"),
(null,"75796","67","sk","vypredaj","static","","Výpredaj","1","0"),
(null,"75797","67","en","no_stav","static","","Not set","1","0"),
(null,"75798","67","sk","no_stav","static","","Bez stavu 2","1","0"),
(null,"75799","67","en","komentare","static","","Comments","1","0"),
(null,"75800","67","sk","komentare","static","","Komentáre","1","0"),
(null,"75801","67","en","komentar","static","","Comment","1","0"),
(null,"75802","67","sk","komentar","static","","Komentár","1","0"),
(null,"75803","67","en","komentarov","static","","Comments","1","0"),
(null,"75804","67","sk","komentarov","static","","Komentárov","1","0"),
(null,"75805","67","en","pridat_komentar","static","","Add comment","1","0"),
(null,"75806","67","sk","pridat_komentar","static","","Pridať komentár","1","0"),
(null,"75807","67","en","vas_komentar","static","","Your comment","1","0"),
(null,"75808","67","sk","vas_komentar","static","","Váš komentár","1","0"),
(null,"75809","67","en","ziadne_komentare","static","","This post has no comments","1","0"),
(null,"75810","67","sk","ziadne_komentare","static","","Tento príspevok neobsahuje žiadne komentáre","1","0"),
(null,"75811","67","en","ziadne_produkty","static","","No products to show","1","0"),
(null,"75812","67","sk","ziadne_produkty","static","","Žiadne produkty k zobrazeniu","1","0"),
(null,"75813","67","en","popis","static","","Description","1","0"),
(null,"75814","67","sk","popis","static","","Popis","1","0"),
(null,"75815","67","en","nazov","static","","Name","1","0"),
(null,"75816","67","sk","nazov","static","","Názov","1","0"),
(null,"75817","67","en","stav","static","","Status","1","0"),
(null,"75818","67","sk","stav","static","","Stav","1","0"),
(null,"75819","67","en","znacka","static","","Brand","1","0"),
(null,"75820","67","sk","znacka","static","","Značka","1","0"),
(null,"75821","67","en","pridajte_sa_facebook","static","","Join Us on Facebook","1","0"),
(null,"75822","67","sk","pridajte_sa_facebook","static","","Pridajte sa na Facebooku","1","0"),
(null,"75823","67","en","kontaktujte_nas_hlaska","static","","For more information please contact us","1","0"),
(null,"75824","67","sk","kontaktujte_nas_hlaska","static","","Pre získanie viac informacii nás prosím kontaktujte","1","0");
INSERT INTO dnt_translates VALUES
(null,"75825","67","en","najnovsie_produkty","static","","News products","1","0"),
(null,"75826","67","sk","najnovsie_produkty","static","","Najnovšie produkty","1","0"),
(null,"75827","67","en","znacky","static","","Brands","1","0"),
(null,"75828","67","sk","znacky","static","","Značky","1","0"),
(null,"75829","67","en","najpredavanejsie","static","","Bestsellers","1","0"),
(null,"75830","67","sk","najpredavanejsie","static","","Najpredávanejšie","1","0"),
(null,"75831","67","en","produkty_v_zlave","static","","In discount","1","0"),
(null,"75832","67","sk","produkty_v_zlave","static","","V zľave","1","0"),
(null,"75833","67","en","obsah_kosika","static","","Your cart","1","0"),
(null,"75834","67","sk","obsah_kosika","static","","Váš obsah košíka","1","0"),
(null,"75835","67","en","zobrazit_kosik","static","","View cart","1","0"),
(null,"75836","67","sk","zobrazit_kosik","static","","Zobraziť košík","1","0"),
(null,"75837","67","en","ziadne_produkty_kat","static","","In this category there are no products","1","0"),
(null,"75838","67","sk","ziadne_produkty_kat","static","","V tejto kategorii nie sú žiadne produkty","1","0"),
(null,"75839","67","en","nespravne_povodne_heslo","static","","Default password is incorrect","1","0"),
(null,"75840","67","sk","nespravne_povodne_heslo","static","","Pôvodné heslo je nesprávne","1","0"),
(null,"75841","67","en","uspesna_objednavka","static","","Your order has been successfully sent","1","0"),
(null,"75842","67","sk","uspesna_objednavka","static","","Vaša objednávka bola úspešne odoslaná","1","0"),
(null,"75843","67","en","zly_email_heslo","static","","Wrong email or password","1","0"),
(null,"75844","67","sk","zly_email_heslo","static","","Nesprávny email, alebo heslo","1","0"),
(null,"75845","67","en","sprava_odoslana","static","","Your message was successfully sent","1","0"),
(null,"75846","67","sk","sprava_odoslana","static","","Vaša správa bola úspešne odoslaná","1","0"),
(null,"75847","67","en","domov","static","","Home","1","0"),
(null,"75848","67","sk","domov","static","","Domov","1","0"),
(null,"75849","67","en","fail_action","static","","The requested action can not be carried out!","1","0"),
(null,"75850","67","sk","fail_action","static","","Požadovanú akciu nie je možné vykonať!","1","0"),
(null,"75851","67","sk","januar","static","","January","1","0"),
(null,"75852","67","sk","januar","static","","Január","1","0"),
(null,"75853","67","en","februar","static","","February","1","0"),
(null,"75854","67","sk","februar","static","","Február","1","0"),
(null,"75855","67","en","marec","static","","Marec","1","0"),
(null,"75856","67","sk","marec","static","","Marec","1","0"),
(null,"75857","67","en","april","static","","April","1","0"),
(null,"75858","67","sk","april","static","","Apríl","1","0"),
(null,"75859","67","en","maj","static","","May","1","0"),
(null,"75860","67","sk","maj","static","","Máj","1","0"),
(null,"75861","67","en","jun","static","","Juny","1","0"),
(null,"75862","67","sk","jun","static","","Jún","1","0"),
(null,"75863","67","en","jul","static","","July","1","0"),
(null,"75864","67","sk","jul","static","","Júl","1","0"),
(null,"75865","67","en","august","static","","August","1","0"),
(null,"75866","67","sk","august","static","","August","1","0"),
(null,"75867","67","en","september","static","","September","1","0"),
(null,"75868","67","sk","september","static","","September","1","0"),
(null,"75869","67","en","oktober","static","","October","1","0"),
(null,"75870","67","sk","oktober","static","","Október","1","0"),
(null,"75871","67","en","november","static","","November","1","0"),
(null,"75872","67","sk","november","static","","November","1","0"),
(null,"75873","67","en","december","static","","December","1","0"),
(null,"75874","67","sk","december","static","","December","1","0"),
(null,"75875","67","en","zobrazit","static","","View","1","0"),
(null,"75876","67","sk","zobrazit","static","","Zobraziť","1","0"),
(null,"75877","67","en","partneri","static","","Partners","1","0"),
(null,"75878","67","sk","partneri","static","","Partneri","1","0"),
(null,"75879","67","en","archiv","static","","Archive","1","0"),
(null,"75880","67","sk","archiv","static","","Archív","1","0"),
(null,"75881","67","en","najnovsie_komentare","static","","Recent Comments","1","0"),
(null,"75882","67","sk","najnovsie_komentare","static","","Posledné komentáre","1","0"),
(null,"75883","67","en","najnovsie_clanky","static","","Recent posts","1","0"),
(null,"75884","67","sk","najnovsie_clanky","static","","Posledné články","1","0"),
(null,"75885","67","en","main_menu","static","","Main menu","1","0"),
(null,"75886","67","sk","main_menu","static","","Hlavné menu","1","0"),
(null,"75887","67","en","hladat","static","","Search","1","0"),
(null,"75888","67","sk","hladat","static","","Hľadať","1","0"),
(null,"75889","67","en","socialne_siete","static","","Social networks","1","0"),
(null,"75890","67","sk","socialne_siete","static","","Sociálne siete","1","0"),
(null,"75891","67","en","poloha","static","","Location","1","0"),
(null,"75892","67","sk","poloha","static","","Poloha","1","0"),
(null,"75893","67","en","type","static","","typee","1","0"),
(null,"75894","67","sk","type","static","","type","1","0"),
(null,"75895","67","en","all","static","","All","1","0"),
(null,"75896","67","sk","all","static","","Všetko","1","0"),
(null,"75897","67","en","hlaska_najdi_dom","static","","Find Your Home","1","0"),
(null,"75898","67","sk","hlaska_najdi_dom","static","","Nájdite si svoj dom","1","0"),
(null,"75899","67","en","min_izieb","static","","Min Rooms","1","0"),
(null,"75900","67","sk","min_izieb","static","","Min. izieb","1","0"),
(null,"75901","67","en","min_kupelni","static","","Min Baths","1","0"),
(null,"75902","67","sk","min_kupelni","static","","Min. kúpeľní","1","0"),
(null,"75903","67","en","min_cena","static","","Min Price","1","0"),
(null,"75904","67","sk","min_cena","static","","Min. cena","1","0"),
(null,"75905","67","en","max_cena","static","","Max Price","1","0"),
(null,"75906","67","sk","max_cena","static","","Max. cena","1","0"),
(null,"75907","67","en","min_area","static","","Min Area","1","0"),
(null,"75908","67","sk","min_area","static","","Min. roz.","1","0"),
(null,"75909","67","en","max_area","static","","Max Area","1","0"),
(null,"75910","67","sk","max_area","static","","Max roz.","1","0"),
(null,"75911","67","en","area","static","","Area","1","0"),
(null,"75912","67","sk","area","static","","Rozloha","1","0"),
(null,"75913","67","en","m2","static","","Sq m","1","0"),
(null,"75914","67","sk","m2","static","","m2","1","0"),
(null,"75915","67","en","izieb","static","","Rooms","1","0"),
(null,"75916","67","sk","izieb","static","","Izieb","1","0"),
(null,"75917","67","en","kupelni","static","","Bathrooms","1","0"),
(null,"75918","67","sk","kupelni","static","","Kúpeľní","1","0"),
(null,"75919","67","en","tlacit","static","","Print","1","0"),
(null,"75920","67","sk","tlacit","static","","Tlačiť","1","0"),
(null,"75921","67","en","nazov","static","","Name","1","0"),
(null,"75922","67","sk","nazov","static","","Meno","1","0"),
(null,"75923","67","en","zoznam_nehnutelnosti","static","","List of properties","1","0"),
(null,"75924","67","sk","zoznam_nehnutelnosti","static","","Zoznam nehnuteľností","1","0");
INSERT INTO dnt_translates VALUES
(null,"75925","67","en","no_content","static","","Please try using top navigation OR search for what you are looking for.","1","0"),
(null,"75926","67","sk","no_content","static","","Ľutujeme, ale pre tento výber neexistuje žiaden obsah","1","0"),
(null,"75927","67","en","go_back","static","","Go back","1","0"),
(null,"75928","67","sk","go_back","static","","Naspäť","1","0"),
(null,"75929","67","en","vybrane_nehnutelnosti","static","","Featured Properties","1","0"),
(null,"75930","67","sk","vybrane_nehnutelnosti","static","","Vybrané nehnuteľnosti","1","0"),
(null,"75931","67","en","najnovsie_ponuky_hlaska","static","","Latest offers property","1","0"),
(null,"75932","67","sk","najnovsie_ponuky_hlaska","static","","Najnovšie ponuky nehnuteľností","1","0"),
(null,"75933","67","en","about_us_footer","static","","Our company operates in the real estate market. We offer a broad spectrum range of activities related to the negotiation of purchase, sale and rental nehnuteľností.Pre most of you, our clients, the sale, purchase, or rental property important step, which made only a few times in my life. Our real estate agents will gladly help you with the implementation of your requirements and provide complete service with our offer.","1","0"),
(null,"75934","67","sk","about_us_footer","static","","Naša spoločnosť pôsobí v oblasti realitného trhu. Ponúkame širokospektrálny záber činností spojených so sprostredkovaním kúpy, predaja a prenájmu nehnuteľností.Pre väčšinu Vás, našich klientov je predaj, kúpa, alebo prenájom nehnuteľnosti dôležitý krok, ktorý realizujete len niekoľkokrát v živote. Naši realitní makléri Vám ochotne a radi poradia pri realizácii Vašich požiadaviek a zabezpečia kompletný servis spojený s našou ponukou.","1","0"),
(null,"75935","67","en","about","static","","About company","1","0"),
(null,"75936","67","sk","about","static","","O firme","1","0"),
(null,"75937","67","en","vyberte_si_region","static","","Choose your region","1","0"),
(null,"75938","67","sk","vyberte_si_region","static","","Vyberte si región","1","0"),
(null,"75939","67","en","bratislavsky_kraj","static","","Region of Bratislava","1","0"),
(null,"75940","67","sk","bratislavsky_kraj","static","","Bratislavský kraj","1","0"),
(null,"75941","67","en","trnavsky_kraj","static","","Region of Trnava","1","0"),
(null,"75942","67","sk","trnavsky_kraj","static","","Trnavský kraj","1","0"),
(null,"75943","67","en","trenciansky_kraj","static","","Region of Trencin","1","0"),
(null,"75944","67","sk","trenciansky_kraj","static","","Trenčiansky kraj","1","0"),
(null,"75945","67","en","nitriansky_kraj","static","","Region of Nitra","1","0"),
(null,"75946","67","sk","nitriansky_kraj","static","","Nitriansky kraj","1","0"),
(null,"75947","67","en","zilinsky_kraj","static","","Region of Zilina","1","0"),
(null,"75948","67","sk","zilinsky_kraj","static","","Žilinský kraj","1","0"),
(null,"75949","67","en","banskobystricky_kraj","static","","Region of Banska Bystrica","1","0"),
(null,"75950","67","sk","banskobystricky_kraj","static","","Bansko Bstrický kraj","1","0"),
(null,"75951","67","en","presovsky_kraj","static","","Region of Presov","1","0"),
(null,"75952","67","sk","presovsky_kraj","static","","Prešovský kraj","1","0"),
(null,"75953","67","en","kosicky_kraj","static","","Region of Kosice","1","0"),
(null,"75954","67","sk","kosicky_kraj","static","","Košický kraj","1","0"),
(null,"75955","67","en","kategorie_clankov","static","","Caregory of blog","1","0"),
(null,"75956","67","sk","kategorie_clankov","static","","Kategórie článkov","1","0"),
(null,"75957","67","en","realitny_partneri","static","","Realit partners","1","0"),
(null,"75958","67","sk","realitny_partneri","static","","Realitní partneri","1","0"),
(null,"75959","67","en","nespravne_heslo","static","","Password is incorrect","1","0"),
(null,"75960","67","sk","nespravne_heslo","static","","Heslo je nesprávne","1","0"),
(null,"75961","67","sk","ustredie","static","","Ústredie","1","0"),
(null,"75962","67","en","ustredie","static","","Headquarters","1","0"),
(null,"75963","67","de","ustredie","static","","Zentrale","1","0"),
(null,"75964","67","sk","dalsie_informacie","static","","Rýchla navigácia","1","0"),
(null,"75965","67","en","dalsie_informacie","static",""," Quick navigation","1","0"),
(null,"75966","67","de","dalsie_informacie","static","","Schnellnavigation","1","0"),
(null,"75967","67","sk","technicka_podpora","static","","Technická podpora","1","0"),
(null,"75968","67","en","technicka_podpora","static","","Technical support","1","0"),
(null,"75969","67","de","technicka_podpora","static","","Technische Unterstützung","1","0"),
(null,"75970","67","sk","systemove_poziadavky","static","","Systémové požiadavky","1","0"),
(null,"75971","67","en","systemove_poziadavky","static","","System requirements","1","0"),
(null,"75972","67","de","systemove_poziadavky","static","","Systemanforderungen","1","0"),
(null,"75973","67","sk","3d_tlac","static","","3d tlač","1","0"),
(null,"75974","67","en","3d_tlac","static","","3D printing","1","0"),
(null,"75975","67","de","3d_tlac","static","","3D-Druck","1","0"),
(null,"75976","67","sk","lisovanie_plastov","static","","Lisovanie plastov","1","0"),
(null,"75977","67","en","lisovanie_plastov","static","","Molding","1","0"),
(null,"75978","67","de","lisovanie_plastov","static","","Gießen","1","0"),
(null,"75979","67","sk","nastrojaren","static","","Nástrojáreň","1","0"),
(null,"75980","67","en","nastrojaren","static","","Toolroom","1","0"),
(null,"75981","67","de","nastrojaren","static","","Werkzeug- und Vorrichtungsbau","1","0"),
(null,"75982","67","sk","fakturacne_udaje","static","","Fakturačné údaje","1","0"),
(null,"75983","67","en","fakturacne_udaje","static","","Billing information","1","0"),
(null,"75984","67","de","fakturacne_udaje","static","","Abrechnungsinformationen","1","0"),
(null,"75985","67","sk","poziadat_o_ponuku_solidcam","static","","Požiadať o ponuku Solidcam","1","0"),
(null,"75986","67","en","poziadat_o_ponuku_solidcam","static","","Request quote Solidcam","1","0"),
(null,"75987","67","de","poziadat_o_ponuku_solidcam","static","","Angebot anfordern Solidcam","1","0"),
(null,"75988","67","sk","poziadat_o_prezentaciu_solidcam","static","","Požiadať o prezentáciu Solidcam","1","0"),
(null,"75989","67","en","poziadat_o_prezentaciu_solidcam","static","","Request Solidcam Presentation","1","0"),
(null,"75990","67","de","poziadat_o_prezentaciu_solidcam","static","","Anfrage Solidcam-Präsentation","1","0"),
(null,"75991","67","sk","poziadat_o_ponuku_pdc","static","","Požiadať o ponuku PDC","1","0"),
(null,"75992","67","en","poziadat_o_ponuku_pdc","static","","Request quote PDC","1","0"),
(null,"75993","67","de","poziadat_o_ponuku_pdc","static","","Angebot anfordern PDC","1","0"),
(null,"75994","67","sk","poziadat_o_prezentaciu_pdc","static","","Požiadať o prezentáciu PDC","1","0"),
(null,"75995","67","en","poziadat_o_prezentaciu_pdc","static","","Request PDC Presentation","1","0"),
(null,"75996","67","de","poziadat_o_prezentaciu_pdc","static","","Anfrage PDC-Präsentation","1","0"),
(null,"75997","67","sk","poziadat_o_ponuku","static","","Požiadať o ponuku","1","0"),
(null,"75998","67","en","poziadat_o_ponuku","static","","Request for Quotation","1","0"),
(null,"75999","67","de","poziadat_o_ponuku","static","","Angebotsanfrage","1","0"),
(null,"76000","67","sk","poziadat_o_prezentaciu","static","","Požiadať o prezentáciu","1","0"),
(null,"76001","67","en","poziadat_o_prezentaciu","static","","Request a presentation","1","0"),
(null,"76002","67","de","poziadat_o_prezentaciu","static","","Fordern Sie eine Präsentation","1","0"),
(null,"76003","67","sk","skusobna_verzia","static","","Skúšobná verzia","1","0"),
(null,"76004","67","en","skusobna_verzia","static","","Trial","1","0"),
(null,"76005","67","de","skusobna_verzia","static","","Versuch","1","0"),
(null,"76006","67","sk","firma","static","","Firma","1","0"),
(null,"76007","67","en","firma","static","","Company","1","0"),
(null,"76008","67","de","firma","static","","Unternehmen","1","0"),
(null,"76009","67","sk","produkt","static","","Produkt","1","0"),
(null,"76010","67","en","produkt","static","","Product","1","0"),
(null,"76011","67","de","produkt","static","","Produkt","1","0"),
(null,"76012","67","sk","dalsie_moznosti","static","","Viac z ponuky","1","0"),
(null,"76013","67","en","dalsie_moznosti","static","","More of offer","1","0"),
(null,"76014","67","de","dalsie_moznosti","static","","Mehr von Angebot","1","0"),
(null,"76015","67","de","meno","static","","Name","1","0"),
(null,"76019","67","de","priezvisko","static","","Nachname","1","0"),
(null,"76020","67","de","predmet","static","","Thema","1","0"),
(null,"76021","67","de","email","static","","Emaille","1","0"),
(null,"76022","67","de","tel_c","static","","Telefonnummer","1","0"),
(null,"76023","67","de","ulica","static","","Straße","1","0"),
(null,"76024","67","de","psc","static","","Postleitzahl","1","0"),
(null,"76025","67","de","mesto","static","","Stadt","1","0"),
(null,"76026","67","de","sprava","static","","Management","1","0"),
(null,"76027","67","de","odoslat","static","","Einreichen","1","0");
INSERT INTO dnt_translates VALUES
(null,"76028","67","de","heslo","static","","Kennwort","1","0"),
(null,"76029","67","de","kontakt","static","","Kontakt","1","0"),
(null,"76030","67","de","socialne_siete","static","","Soziales Netzwerk","1","0"),
(null,"76031","67","sk","sidlo","static","","Sídlo.","1","0"),
(null,"76032","67","en","sidlo","static","","Headquarters.","1","0"),
(null,"76033","67","de","sidlo","static","","Hauptsitz.","1","0"),
(null,"76034","67","sk","pobocka","static","","Pobočka.","1","0"),
(null,"76035","67","en","pobocka","static","","Branch office.","1","0"),
(null,"76036","67","de","pobocka","static","","Zweigstelle.","1","0"),
(null,"76047","67","en","13056","name","dnt_posts","Partners","1","0"),
(null,"76048","67","en","13056","name_url","dnt_posts","partners","1","0"),
(null,"76052","67","de","13056","name","dnt_posts","Partner","1","0"),
(null,"76053","67","de","13056","name_url","dnt_posts","partner","1","0"),
(null,"76057","67","en","13058","name","dnt_posts","Contact","1","0"),
(null,"76058","67","en","13058","name_url","dnt_posts","contact","1","0"),
(null,"76062","67","de","13058","name","dnt_posts","Kontakt","1","0"),
(null,"76063","67","de","13058","name_url","dnt_posts","kontakt","1","0"),
(null,"76077","67","en","13055","name","dnt_posts","Research and development","1","0"),
(null,"76078","67","en","13055","name_url","dnt_posts","research-and-development","1","0"),
(null,"76082","67","de","13055","name","dnt_posts","Forschung und Entwicklung","1","0"),
(null,"76083","67","de","13055","name_url","dnt_posts","forschung-und-entwicklung","1","0"),
(null,"76087","67","en","13054","name","dnt_posts","Products","1","0"),
(null,"76092","67","de","13054","name","dnt_posts","Produkte","1","0"),
(null,"76097","67","en","13059","name","dnt_posts","Staff","1","0"),
(null,"76098","67","en","13059","name_url","dnt_posts","staff","1","0"),
(null,"76102","67","de","13059","name","dnt_posts","Personal","1","0"),
(null,"76103","67","de","13059","name_url","dnt_posts","personal","1","0"),
(null,"76107","67","en","13060","name","dnt_posts","Software for planning of production","1","0"),
(null,"76112","67","de","13060","name","dnt_posts","Software für die Planung der Produktion","1","0"),
(null,"76117","67","en","13075","name","dnt_posts","Tooling & Molding","1","0"),
(null,"76122","67","de","13075","name","dnt_posts","Werkzeug- und Vorrichtungsbau","1","0"),
(null,"76127","67","en","13076","name","dnt_posts","Why choose CAM","1","0"),
(null,"76128","67","en","13076","name_url","dnt_posts","why-choose-cam","1","0"),
(null,"76137","67","en","13077","name","dnt_posts","Services","1","0"),
(null,"76138","67","en","13077","name_url","dnt_posts","services","1","0"),
(null,"76142","67","de","13077","name","dnt_posts","Service","1","0"),
(null,"76143","67","de","13077","name_url","dnt_posts","service","1","0"),
(null,"76147","67","en","13078","name","dnt_posts","Why choose CAM","1","0"),
(null,"76148","67","en","13078","name_url","dnt_posts","why-choose-cam","1","0"),
(null,"76307","67","en","13093","name","dnt_posts","Billing information","1","0"),
(null,"76312","67","de","13093","name","dnt_posts","Abrechnungsinformationen","1","0"),
(null,"76317","67","en","13094","name","dnt_posts","Free production capacities","1","0"),
(null,"76320","67","en","13094","content","dnt_posts","<p>Free production capacities for continuouse 5 axis milling</p>\n","1","0"),
(null,"88588","67","en","13356","name","dnt_posts","Contact form","1","0"),
(null,"88589","67","en","13356","name_url","dnt_posts","form","1","0"),
(null,"88593","67","de","13356","name","dnt_posts","Kontact form","1","0"),
(null,"88594","67","de","13356","name_url","dnt_posts","kontakt-form","1","0"),
(null,"88688","67","en","13354","name","dnt_posts","Polls","1","0"),
(null,"88689","67","en","13354","name_url","dnt_posts","polls","1","0"),
(null,"88693","67","de","13354","name","dnt_posts","Polls","1","0"),
(null,"88694","67","de","13354","name_url","dnt_posts","polls","1","0"),
(null,"88708","67","en","13357","name","dnt_posts","Partners","1","0"),
(null,"88709","67","en","13357","name_url","dnt_posts","partners","1","0"),
(null,"88838","67","en","13365","name","dnt_posts","Posts","1","0"),
(null,"88839","67","en","13365","name_url","dnt_posts","posts","1","0"),
(null,"88843","67","de","13365","name","dnt_posts","Posts","1","0"),
(null,"88844","67","de","13365","name_url","dnt_posts","posts","1","0"),
(null,"88988","67","en","13575","name","dnt_posts","Hotels","1","0"),
(null,"88989","67","en","13575","name_url","dnt_posts","hotels","1","0"),
(null,"106984","67","en","13289","name","dnt_posts","Home","1","0"),
(null,"106985","67","en","13289","name_url","dnt_posts","home","1","0"),
(null,"106989","67","de","13289","name","dnt_posts","Home","1","0"),
(null,"106990","67","de","13289","name_url","dnt_posts","home","1","0"),
(null,"112789","67","en","13349","name","dnt_posts","About us","1","0"),
(null,"112790","67","en","13349","name_url","dnt_posts","about-us","1","0"),
(null,"112791","67","en","13349","perex","dnt_posts","","1","0"),
(null,"112792","67","en","13349","content","dnt_posts","","1","0"),
(null,"112793","67","en","13349","tags","dnt_posts","","1","0"),
(null,"112794","67","de","13349","name","dnt_posts","über uns","1","0"),
(null,"112795","67","de","13349","name_url","dnt_posts","uber-uns","1","0"),
(null,"112796","67","de","13349","perex","dnt_posts","","1","0"),
(null,"112797","67","de","13349","content","dnt_posts","","1","0"),
(null,"112798","67","de","13349","tags","dnt_posts","","1","0"),
(null,"112799","67","en","14154","name","dnt_posts","","1","0"),
(null,"112800","67","en","14154","name_url","dnt_posts","","1","0"),
(null,"112801","67","en","14154","perex","dnt_posts","","1","0"),
(null,"112802","67","en","14154","content","dnt_posts","","1","0"),
(null,"112803","67","en","14154","tags","dnt_posts","","1","0"),
(null,"112804","67","de","14154","name","dnt_posts","","1","0"),
(null,"112805","67","de","14154","name_url","dnt_posts","","1","0"),
(null,"112806","67","de","14154","perex","dnt_posts","","1","0"),
(null,"112807","67","de","14154","content","dnt_posts","","1","0"),
(null,"112808","67","de","14154","tags","dnt_posts","","1","0"),
(null,"112809","67","en","13355","name","dnt_posts","","1","0"),
(null,"112810","67","en","13355","name_url","dnt_posts","","1","0"),
(null,"112811","67","en","13355","perex","dnt_posts","","1","0"),
(null,"112812","67","en","13355","content","dnt_posts","","1","0"),
(null,"112813","67","en","13355","tags","dnt_posts","","1","0"),
(null,"112814","67","de","13355","name","dnt_posts","","1","0"),
(null,"112815","67","de","13355","name_url","dnt_posts","","1","0"),
(null,"112816","67","de","13355","perex","dnt_posts","","1","0"),
(null,"112817","67","de","13355","content","dnt_posts","","1","0"),
(null,"112818","67","de","13355","tags","dnt_posts","","1","0"),
(null,"112839","67","en","14155","name","dnt_posts","Contact","1","0"),
(null,"112840","67","en","14155","name_url","dnt_posts","","1","0"),
(null,"112841","67","en","14155","perex","dnt_posts","","1","0"),
(null,"112842","67","en","14155","content","dnt_posts","","1","0"),
(null,"112843","67","en","14155","tags","dnt_posts","","1","0"),
(null,"112844","67","de","14155","name","dnt_posts","","1","0"),
(null,"112845","67","de","14155","name_url","dnt_posts","","1","0");
INSERT INTO dnt_translates VALUES
(null,"112846","67","de","14155","perex","dnt_posts","","1","0"),
(null,"112847","67","de","14155","content","dnt_posts","","1","0"),
(null,"112848","67","de","14155","tags","dnt_posts","","1","0"),
(null,"113304","67","sk","text_to_search","static","","Zadajte text pre vyhľadávanie","1","0"),
(null,"113430","67","sk","partneri","static","","Partneri","1","0"),
(null,"113434","67","sk","pravidla_sutaze","static","","Pravidlá súťaže","1","0"),
(null,"113437","67","sk","socialne_siete","static","","Sociálne siete","1","0"),
(null,"127687","67","sk","19010","name","dnt_posts","","1","0"),
(null,"127688","67","sk","19010","name_url","dnt_posts","","1","0"),
(null,"127689","67","sk","19010","perex","dnt_posts","","1","0"),
(null,"127690","67","sk","19010","content","dnt_posts","","1","0"),
(null,"127691","67","sk","19010","tags","dnt_posts","","1","0");




CREATE TABLE IF NOT EXISTS `dnt_uploads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_entity` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `name` varchar(300) CHARACTER SET utf8 NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `type` varchar(300) CHARACTER SET utf8 NOT NULL,
  `show` int(11) NOT NULL DEFAULT 1,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17219 DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;


INSERT INTO dnt_uploads VALUES
(null,"1692","67","40056624_2128252747185991_4397570555713159168_n.jpg","2019-03-21 09:45:50","image/jpeg","1","0"),
(null,"1675","67","logo-1.png","2019-03-21 09:45:50","image/png","1","0"),
(null,"1676","67","logo-1_1.png","2019-03-21 09:45:50","image/png","1","0"),
(null,"1677","67","29-awesome-black-themed-abstract-wallpapers-1dut.com-28-1024x576.jpg","2019-03-21 09:45:50","image/jpeg","1","0"),
(null,"2253","67","1_a42cf8f14feb09e3238d036d683e42e3_o.png","2019-03-21 09:45:50","image/png","1","0"),
(null,"1691","67","3qHu.janka_hospodarova.jpg","2019-03-21 09:45:50","image/jpeg","1","0"),
(null,"1690","67","ZpjH.patrik_herman_tabor.jpg","2019-03-21 09:45:50","image/jpeg","1","0"),
(null,"1689","67","bq3q.peter_varinsky.jpg","2019-03-21 09:45:50","image/jpeg","1","0"),
(null,"1688","67","dqNx.jan_tribula.jpg","2019-03-21 09:45:50","image/jpeg","1","0"),
(null,"1687","67","7mUF.zlatica_puskarova.jpg","2019-03-21 09:45:50","image/jpeg","1","0"),
(null,"1686","67","x1B8.janka_hospodarova_zlatica_puskarova_patrik_herman_jan_tribula_alebo_peter_varinsky.jpg","2019-03-21 09:45:50","image/jpeg","1","0"),
(null,"1685","67","dnt3-oop.jpg","2019-03-21 09:45:50","image/jpeg","1","0"),
(null,"1684","67","564343_395442117160705_203518898_n_2.jpg","2019-03-21 09:45:50","image/jpeg","1","0"),
(null,"1682","67","tvn_logo.png","2019-03-21 09:45:50","image/png","1","0"),
(null,"1683","67","osmos_logo.jpg","2019-03-21 09:45:50","image/jpeg","1","0"),
(null,"1681","67","markiza.gif","2019-03-21 09:45:50","image/gif","1","0"),
(null,"1679","67","logo-1.jpg","2019-03-21 09:45:50","image/jpeg","1","0"),
(null,"1680","67","1d9b904.png","2019-03-21 09:45:50","image/png","1","0"),
(null,"1678","67","abstract-1011_4.jpg","2019-03-21 09:45:50","image/jpeg","1","0"),
(null,"5225","67","2_9057a3001530c7abd614a10a96593e2d_o.jpg","2020-01-17 08:03:41","image/jpeg","1","0"),
(null,"5202","67","2_7087f7cc3b7862986068e4b75bc6ef49_o.jpg","2019-12-05 15:03:17","image/jpeg","1","0"),
(null,"5199","67","2_6c46d51cdb732642fb957ff6fdb1e7e1_o.jpg","2019-12-05 14:55:36","image/jpeg","1","0");




CREATE TABLE IF NOT EXISTS `dnt_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_entity` int(11) NOT NULL,
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
  `kliknute` int(11) NOT NULL DEFAULT 0,
  `ip_adresa` varchar(300) NOT NULL,
  `parent_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=238 DEFAULT CHARSET=utf8;


INSERT INTO dnt_users VALUES
(null,"14","67","","admin","Tomáš","Doubek","osmos","","","","0","","","b69a84481c97f320c80020b01d5620b5","thomas.doubek@gmail.com","","","","0","0","0","0","0000-00-00 00:00:00","2020-12-18 09:06:19","0000-00-00 00:00:00","","","0","","","1692","1","0","","0"),
(null,"20","67","","admin","Admin","Root","skeleton","","","","0","","","21232f297a57a5a743894a0e4a801fc3","admin@root.sk","","","","0","0","0","0","0000-00-00 00:00:00","2020-01-17 13:44:29","0000-00-00 00:00:00","","","0","","","2253","1","0","","0");




CREATE TABLE IF NOT EXISTS `dnt_vendors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_entity` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `name_url` varchar(300) NOT NULL,
  `real_url` varchar(300) NOT NULL,
  `show_real_url` int(11) NOT NULL,
  `layout` varchar(300) NOT NULL,
  `is_default` int(11) NOT NULL,
  `show` int(11) NOT NULL,
  `in_progress` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8;






CREATE TABLE IF NOT EXISTS `dnt_vouchers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_entity` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `value` varchar(300) NOT NULL,
  `file_name` varchar(300) NOT NULL,
  `datetime_creat` datetime NOT NULL,
  `datetime_update` datetime NOT NULL,
  `order` int(11) NOT NULL,
  `show` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;





INSERT INTO dnt_vendors VALUES
(67,"67","Testík","testik","","0","default","0","0","0");