

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
  `show` int(11) NOT NULL DEFAULT '1',
  `parent_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2082 DEFAULT CHARSET=utf8;


INSERT INTO dnt_admin_menu VALUES
(null,"566","39","menu",""," fa-gears","20","Nastavenia","settings","settings","1","0"),
(null,"567","39","menu","post","fa-laptop","30","Obsah","content","content&incuded=post","1","0"),
(null,"568","39","submenu","","fa-plus","1","Pridať post","content","content&add","1","0"),
(null,"569","39","submenu","","","6","Bleskovky","content&filter=bleskovky","content","1","0"),
(null,"570","39","menu","","fa-user","80","Prístupy","access","access","1","0"),
(null,"572","39","submenu","","","3","Stránky","content","content&filter=pages","1","0"),
(null,"573","39","menu","","fa fa-home","10","Domov","home","","1","0"),
(null,"574","39","menu","","","70","Faktúry","faktura","","0","0"),
(null,"575","39","menu","","fa-envelope","90","Mailer","mailer","mailer","1","0"),
(null,"576","39","submenu","","","5","Všetky prístupy","pristupy","pristupy","1","0"),
(null,"577","39","submenu","","fa-plus","0","Pridať prístup","pristupy","pristupy&pridat","1","0"),
(null,"578","39","submenu","","","4","Podstránky","content","content&filter=pages-sub","1","0"),
(null,"579","39","submenu","","fa-plus","2","Pridať podstránku","content","content&add=pages-sub","1","0"),
(null,"580","39","submenu","","","7","Statický obsah","content","content&filter=static","1","0"),
(null,"582","39","submenu","","","7","Sponzori","content","content&filter=sponzori","1","0"),
(null,"583","39","submenu","","","8","Partneri","content","content&filter=partneri","1","0"),
(null,"584","39","menu","","fa-language","60","Multylanguage","multylanguage","","1","0"),
(null,"585","39","submenu","","","23","Aktívne jazyky","multylanguage","multylanguage&add","1","0"),
(null,"586","39","submenu","","","22","Zoznam prekladov","multylanguage","multylanguage&action=translates","1","0"),
(null,"587","39","menu","sitemap","	fa fa-list","40","Sitemap","content","content&incuded=sitemap","1","0"),
(null,"589","39","menu","","fa-pie-chart","70","Kvízy","polls","polls","1","0"),
(null,"590","39","submenu","","","23","Pridať kvíz","polls","polls&action=add_poll","1","0"),
(null,"591","39","submenu","","","23","Zoznam kvízov","polls","polls","1","0"),
(null,"592","39","menu",""," fa-file","50","Súbory","files","files","1","0"),
(null,"646","39","menu",""," fa-gears","100","Microweb","microweb","microweb","1","0"),
(null,"647","39","submenu",""," fa-gears","20","Zoznam","microweb","microweb","1","0"),
(null,"648","39","submenu",""," fa-gears","20","Pridať","microweb","microweb&action=add","1","0"),
(null,"759","39","menu","","fa-globe","110","Zoznam webov","vendor","","1","0"),
(null,"760","39","submenu","","","22","Zoznam","vendor","vendor","1","0"),
(null,"761","39","submenu","","","22","Pridať web","vendor","vendor&action=add","1","0"),
(null,"1623","39","submenu",""," fa-user","100","Zoznam","user","user","1","0"),
(null,"1624","39","submenu",""," fa-user","100","Pridať používateľa","user","user&action=add","1","0"),
(null,"1625","39","menu",""," fa-user","100","Používatelia","user","user","1","0");




CREATE TABLE IF NOT EXISTS `dnt_api` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_entity` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `name_url` varchar(300) NOT NULL,
  `query` text NOT NULL,
  `parent_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1303 DEFAULT CHARSET=utf8;


INSERT INTO dnt_api VALUES
(null,"1028","39","Test Query","JajsZ5s4","SELECT * FROM dnt_post_type LIMIT 3","0"),
(null,"1029","39","Test Query","JajsZ5s4","SELECT * FROM dnt_post_type LIMIT 3","0");




CREATE TABLE IF NOT EXISTS `dnt_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_entity` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `key` varchar(1000) NOT NULL,
  `value` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=113 DEFAULT CHARSET=utf8;


INSERT INTO dnt_config VALUES
(null,"25","39","default_lang","sk"),
(null,"26","39","default_modul","homepage");




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
  `home_lang` int(11) NOT NULL DEFAULT '0',
  `show` int(11) NOT NULL,
  `img` varchar(300) NOT NULL,
  `parent_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=181 DEFAULT CHARSET=utf8;


INSERT INTO dnt_languages VALUES
(null,"49","39","sk","Slovenský","1","1","flag_sk.jpg","0"),
(null,"50","39","en","English","0","0","flag_en.jpg","0"),
(null,"51","39","de","German\n","0","0","flag_de.jpg","0");




CREATE TABLE IF NOT EXISTS `dnt_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_entity` int(11) NOT NULL,
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
  `parent_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=785 DEFAULT CHARSET=utf8;






CREATE TABLE IF NOT EXISTS `dnt_mailer_mails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_entity` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `surname` varchar(300) NOT NULL,
  `cat_id` varchar(300) CHARACTER SET armscii8 NOT NULL,
  `email` varchar(300) NOT NULL,
  `datetime_creat` datetime NOT NULL,
  `datetime_update` datetime NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=69 DEFAULT CHARSET=utf8;


INSERT INTO dnt_mailer_mails VALUES
(null,"27","39","Tomáš ","Cat Test","47","thomas.doubek@gmail.com","2018-09-19 14:08:01","2018-09-19 14:08:01","0"),
(null,"26","39","Tomáš","Doubek","NULL","thomas.doubek@gmail.com","2018-09-19 13:59:38","2018-09-19 13:59:38","0");




CREATE TABLE IF NOT EXISTS `dnt_mailer_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_entity` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `cat_id` varchar(300) NOT NULL,
  `name_url` varchar(300) NOT NULL,
  `name` varchar(300) NOT NULL,
  `show` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8;


INSERT INTO dnt_mailer_type VALUES
(null,"47","39","","testovacia","Testovacia","1","1","0");




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
  `parent_id` int(11) NOT NULL DEFAULT '0',
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
  `parent_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=92 DEFAULT CHARSET=utf8;


INSERT INTO dnt_polls VALUES
(null,"1","39","Objektovo orientované programovanie","objektovo-orientovane-programovanie","739","<p>OOP dok&aacute;že mnoho ľud&iacute; spoľahlivo odradiť hneď na začiatku v&yacute;razmi ako dedičnosť, polymorfizmus, zapuzdrenie, abstrakcia a in&yacute;mi veľmi m&uacute;dro znej&uacute;cimi slovami. My v&aacute;m norm&aacute;lnou ľudskou rečou veľmi r&yacute;chlo uk&aacute;žeme, že sa za t&yacute;m neskr&yacute;va skutočne nič zložit&eacute;.</p>\n","1","4","2017-02-04 10:50:17","2017-02-04 10:50:17","2017-02-04 10:50:17","1","0"),
(null,"9","39","Na ktorého obľúbeného Markízaka sa ponášate?","na-ktoreho-oblubeneho-markizaka-sa-ponasate","740","<p><span style=\"font-family:roboto,sans-serif,tahoma; font-size:15px\">Pripravili sme pre v&aacute;s hor&uacute;cu novinku - origin&aacute;lne interakt&iacute;vne kv&iacute;zy z na&scaron;ej dieľne.</span><strong>Telev&iacute;zia Mark&iacute;za&nbsp;</strong><span style=\"font-family:roboto,sans-serif,tahoma; font-size:15px\">je s&uacute;časťou v&aacute;&scaron;ho života už dvadsať rokov. Pozn&aacute;te jej moder&aacute;torov a redaktorov? Na ktor&eacute;ho z nich sa pon&aacute;&scaron;ate? Urobte si kv&iacute;z.&nbsp;&nbsp;</span></p>\n","2","5","2017-02-05 10:49:07","2017-02-05 10:49:07","2017-02-05 10:49:07","1","0");




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
) ENGINE=InnoDB AUTO_INCREMENT=3513 DEFAULT CHARSET=utf8;


INSERT INTO dnt_polls_composer VALUES
(null,"1","1","0","","winning_combination","","","0","0","5","0","39"),
(null,"2","1","0","","winning_combination","","","0","0","5","0","39"),
(null,"3","1","0","","winning_combination","","","0","0","5","0","39"),
(null,"4","1","1","","question","Na čo slúžia výnimky (exceptions) ?","","0","0","5","0","39"),
(null,"5","1","1","","ans"," na iné","","0","0","0","0","39"),
(null,"6","1","1","","ans","Pre prehľadnosť kódu","","0","0","5","0","39"),
(null,"7","1","1","","ans","na ošetrenie chýb","","1","0","0","0","39"),
(null,"8","1","1","","ans","na zmenu vykonávania","","0","0","0","0","39"),
(null,"9","1","2","","question","Kde nie je možné použiť kľúčové slovo this?","","0","0","4","0","39"),
(null,"10","1","2","","ans","pri preťažených konštruktoroch","","0","0","0","0","39"),
(null,"11","1","2","","ans","v konštruktore","","0","0","0","0","39"),
(null,"12","1","2","","ans","v metódach","","0","0","0","0","39"),
(null,"13","1","2","","ans","v statických metódach","","1","0","0","0","39"),
(null,"14","1","3","","question","Premenná, ktorej predchádza kľúčové slovo private je dostupná","","0","0","3","0","39"),
(null,"15","1","3","","ans"," len v rámci triedy","","1","0","0","0","39"),
(null,"16","1","3","","ans"," v hociktorej triede","","0","0","0","0","39"),
(null,"17","1","3","","ans"," len pri vytváraní","","0","0","0","0","39"),
(null,"18","1","3","","ans","len v rámci hierarchie tried","","0","0","0","0","39"),
(null,"19","1","4","","question","Objekt v OOP predstavuje","","0","0","2","0","39"),
(null,"20","1","4","","ans","inštanciu rozhrania","","0","0","0","0","39"),
(null,"21","1","4","","ans"," triedu","","0","0","0","0","39"),
(null,"22","1","4","","ans","inštanciu triedy","","1","0","0","0","39"),
(null,"23","1","4","","ans","inštanciu triedy alebo rozhrania","","0","0","0","0","39"),
(null,"24","1","5","","question","Ktoré prvky sa dajú volať bez vytvorenia objektu?","","0","0","1","0","39"),
(null,"25","1","5","","ans","nestatické metódy","","0","0","0","0","39"),
(null,"26","1","5","","ans","funkcie","","0","0","0","0","39"),
(null,"27","1","5","","ans"," statické metódy","","1","0","0","0","39"),
(null,"28","1","5","","ans"," všetky metódy","","0","0","0","0","39"),
(null,"29","1","6","","question","Kedy sa volá deštruktor triedy?","","0","0","0","0","39"),
(null,"30","1","6","","ans","pri zániku triedy","","0","0","0","0","39"),
(null,"31","1","6","","ans"," pri inicializácii objektu","","0","0","0","0","39"),
(null,"32","1","6","","ans"," pri inicializácii triedy","","0","0","0","0","39"),
(null,"33","1","6","","ans"," žiadna správna odpoveď","","1","0","0","0","39"),
(null,"34","1","7","","question","Ktoré prvky obsahuje trieda?","","0","0","0","0","39"),
(null,"35","1","7","","ans"," premenné","","0","0","0","0","39"),
(null,"36","1","7","","ans"," funkcie a premenné","","0","0","0","0","39"),
(null,"37","1","7","","ans"," metódy a premenné","","1","0","0","0","39"),
(null,"38","1","7","","ans","konštruktor a deštruktor","","0","0","0","0","39"),
(null,"39","1","8","","question","Prístup protected je vhodné použiť pri prvkoch, ku ktorým chceme pristupovať","","0","0","0","0","39"),
(null,"40","1","8","","ans"," v odvodených triedach","","1","0","0","0","39"),
(null,"41","1","8","","ans"," v danej triede","","0","0","0","0","39"),
(null,"42","1","8","","ans"," len so zabezpečenými objektami","","0","0","0","0","39"),
(null,"43","1","8","","ans"," len so zabezpečeným prístupom","","0","0","0","0","39"),
(null,"257","9","0","Ste štýlová osobnosť , ktorá má vo veciach jasno. Úspešne ste naštartovali svoju kariéru, ktorú zvládate rovnocenne kombinovať s rodinou. Hlučné večierky a masy ľudí nie sú nič pre vás, prednosť dávate rodinnému krbu, aj keď na to nevyzeráte. Na verejnosti sa totiž vždy objavíte dokonalo zladený a hýrite šarmom. Presne ako moderátorka Televíznych novín \n    <b>Zlatica Puškárová\n    </b>. ","winning_combination"," Zlatica Puškárová","741","0","4","5","0","39"),
(null,"258","9","0","Akcia, pohyb, výzva! To je váš svet, v ktorom sa cítite ako ryba vo vode. V kancelárii by ste neobsedeli, musíte neustále niečo robiť. Šplhať sa na vrcholky hôr, brodiť sa rozbúrenou riekou či bicyklovať desiatky kilometrov. Život je pre vás výzva a vy máte výzvy rád. Hodené rukavice prijímate a keď je toho na vás veľa, hlavu si prečistíte v prírode. Napríklad jazdou na koni ako redaktor \n    <b>Ján Tribula\n    </b>.","winning_combination"," Ján Tribula","742","0","8","5","0","39"),
(null,"259","9","0","Váš život je šport, aktivita a zdravý životný štýl. Snažíte sa však aj o súlad s duchom a preto sa neustále rozvíjate. Učíte sa cudzie jazyky, čítate a ste schopný zariadiť množstvo vecí. Pôsobíte nenápadne, nerád na seba strhávate pozornosť. V spoločnosti priateľov sa však meníte na parketového leva. Presne ako športový redaktor \n    <b>Peter Varinský\n    </b>.","winning_combination"," Peter Varinský","743","0","12","5","0","39"),
(null,"260","9","1","","question","Kráčate po ulici a zrazu vidíte sanitky, policajtov, masu ľudí a počujete krik. Čo urobíte?","","0","0","5","0","39"),
(null,"261","9","1","","ans","Okamžite utekám priamo tam, musím vedieť čo sa stalo.","","0","1","0","0","39"),
(null,"262","9","1","","ans","Všetko poctivo zdokumentujem a nezabudnem na selfie.","","0","2","0","0","39"),
(null,"263","9","1","","ans","Zbystrím pozornosť, no zostávam v úzadí.","","0","3","0","0","39"),
(null,"264","9","1","","ans","Bežím na miesto činu bez rozmyslenia, túžim priložiť ruku k dielu a upokojiť situáciu.","","0","4","0","0","39"),
(null,"265","9","1","","ans","Opatrne sa tam priblížim, možno niekto bude potrebovať pomoc.","","0","5","0","0","39"),
(null,"266","9","2","","question","Je leto, teplo, slnko a voda láka. Kde sa vidíte počas prázdnin?","","0","0","4","0","39"),
(null,"267","9","2","","ans","Na skvelej dovolenke all inclusive s rodinou","","0","1","0","0","39"),
(null,"268","9","2","","ans","Niekde v Slovenskom raji, ideálne blízko pri koníkoch","","0","2","0","0","39"),
(null,"269","9","2","","ans","Skoro ráno hodina tenisu a podvečer si zaplávam","","0","3","0","0","39"),
(null,"270","9","2","","ans","Nebudem zaháľať – zorganizujem akciu pre ľudí v núdzi","","0","4","0","0","39"),
(null,"271","9","2","","ans","V nejakej novej destinácii, napríklad na Islande","","0","5","0","0","39"),
(null,"272","9","3","","question","Aký je váš obľúbený styling?","","0","0","3","0","39"),
(null,"273","9","3","","ans","Šik šaty, v ktorých vyzerám top","","0","1","0","0","39"),
(null,"274","9","3","","ans","Športový štýl doplnený o štýlovú bundu","","0","2","0","0","39"),
(null,"275","9","3","","ans","Kombinácia športovej elegancie","","0","3","0","0","39"),
(null,"276","9","3","","ans","Vyžehlená prúžkovaná košeľa s nenápadnými nohavicami ZVOĽ","","0","4","0","0","39"),
(null,"277","9","3","","ans","Hlavne pohodlne – džínsy, tričko a tenisky","","0","5","0","0","39"),
(null,"278","9","4","","question","Čo si vždy rád pozriete v televízii?","","0","0","2","0","39"),
(null,"279","9","4","","ans","Dobrou politickou debatou","","0","1","0","0","39"),
(null,"280","9","4","","ans","Dokument z ríše zvierat","","0","2","0","0","39"),
(null,"281","9","4","","ans","Akčný basketbalový zápas","","0","3","0","0","39"),
(null,"282","9","4","","ans","Akýkoľvek film je pre mňa relaxom","","0","4","0","0","39"),
(null,"283","9","4","","ans","Zmysluplný program s reálnymi príbehmi","","0","5","0","0","39"),
(null,"284","9","5","","question","Po čom siahnete v reštaurácií?","","0","0","1","0","39"),
(null,"285","9","5","","ans","Zvolím vyváženú kombináciu živín a chutí, nepotrebujem sa prepchávať.","","0","1","0","0","39"),
(null,"286","9","5","","ans","Dobré slovenské recepty sú mi vždy po chuti.","","0","2","0","0","39"),
(null,"287","9","5","","ans","Po niečom, čo spĺňa zásady zdravého stravovania.","","0","3","0","0","39"),
(null,"288","9","5","","ans","Po rezni, omáčkach, knedlíkoch. Milujem dobré jedlo.","","0","4","0","0","39"),
(null,"289","9","5","","ans","Vyberiem si jedlo bez mäsa, z presvedčenia.","","0","5","0","0","39"),
(null,"290","9","0","Máte veľké srdce a neustále myslíte na druhých. Preto často zabúdate na seba a na svoj život. Obetujete sa pre dobro veci a najradšej by ste vyriešili každý problém. Robíte zbierky, zúčastňujete sa na benefičných akciách a teší vás každý úsmev blížneho v núdzi. Na svojom chrbte máte naložených akosi priveľa povinností, no vy to zvládate v dobrej nálade. Tak ako moderátor \n    <b>Patrik Herman\n    </b>. ","winning_combination","Patrik Herman","744","0","16","0","0","39"),
(null,"291","9","0",">Ste príjemná osoba so srdcom na správnom mieste. Neúnavne veríte v dobro a každý dotyk s krutou realitou vás nepríjemne zaskočí. Všímate sa prírodu, životné prostredie a s ťažkosťou znášate nespravodlivosť okolo nás. Za jemnou fasádou sa však skrýva bojovník, ktorý si nenechá len tak ľahko skákať po hlave. Taká je aj moderátorka \n    <b>Janka Hospodárová\n    </b>.","winning_combination","Janka Hospodárová","745","0","20","0","0","39");




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
  `parent_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=815 DEFAULT CHARSET=utf8;


INSERT INTO dnt_post_type VALUES
(null,"290","1","0","sitemap","sitemap","Stránky","1","0","39","0"),
(null,"291","1","0","sitemap-sub","sitemap","Podstránky","1","0","39","0"),
(null,"293","3","0","newsletter","post","Newslettre","1","0","39","0"),
(null,"303","3","0","sliders","post","Sliders","1","0","39","0"),
(null,"304","3","0","texty-na-homepage","post","Texty na homepage","1","0","39","0"),
(null,"305","3","0","partneri","post","Partneri","1","0","39","0"),
(null,"306","3","0","kontaktny-formular","post","Správy z kontaktného formulára","1","0","39","0"),
(null,"308","0","0","eshop-product","product","Eshop Product","1","0","39","0"),
(null,"483","3","0","testovacka","post","Testovačka","1","0","39","0");




CREATE TABLE IF NOT EXISTS `dnt_posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_entity` int(11) NOT NULL,
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
  `show` int(11) NOT NULL DEFAULT '1',
  `search` longtext NOT NULL,
  `protected` int(11) NOT NULL DEFAULT '0',
  `vendor_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14382 DEFAULT CHARSET=utf8;


INSERT INTO dnt_posts VALUES
(null,"13071","","137","post","Výskum a vývoj","slider-vyskum-a-vyvoj","0","0","","","262","2017-03-01 17:24:45","2017-03-01 17:26:24","2017-03-01 17:24:00","0","<p><span style=\"font-size:14px\">Neust&aacute;le hľad&aacute;me lep&scaron;ie rie&scaron;enia...</span></p>\n","","","","","","0","1","","0","39","0"),
(null,"13350","","303","post","HP slider 1","hp-slider-1","0","0","","","1711","2017-04-06 10:48:57","2018-09-30 10:07:45","2017-04-06 10:48:00","0","<p>VYHRAJTE GOLFOV&Yacute; POBYT V RAKOUSK&Eacute;M ZELL AM SEE-KAPRUN!</p>\n","","","","","","0","1","","0","39","0"),
(null,"13351","","303","post","HP slider 2","hp-slider-2","0","0","","","1712","2017-04-06 10:54:30","2018-09-30 09:45:08","2017-04-06 10:54:00","0","<p>VYHRAJTE GOLFOV&Yacute; POBYT V RAKOUSK&Eacute;M ZELL AM SEE-KAPRUN!</p>\n","","","","","","0","1","","0","39","0"),
(null,"13353","","304","post","Dnt3 Library","dnt3-library","0","0","","","","2017-04-06 10:57:05","2018-09-07 18:45:14","2017-04-06 10:57:00","0","<p>Dnt3 - Library je Objektovo orientovan&yacute; MVC framework, ktor&yacute; je na mieru prisp&ocirc;soben&yacute; pre redakčn&yacute; syst&eacute;m Designdnt3.</p>\n","<p>Z&aacute;kladn&yacute; text</p>\n","","","","","0","1","","0","39","0"),
(null,"13359","","305","post","Designdnt3","http://designdnt.query.sk/domov","0","0","","","746","2017-04-10 11:59:04","2017-04-10 12:23:43","2017-04-10 11:59:00","0","","","","","","","0","1","","0","39","0"),
(null,"13360","","305","post","Markíza","http://www.markiza.sk/uvod","0","0","","","747","2017-04-10 12:24:53","2017-04-10 12:25:11","2017-04-10 12:24:00","0","","","","","","","0","1","","0","39","0"),
(null,"13361","","305","post","Tvnoviny","http://www.tvnoviny.sk/","0","0","","","748","2017-04-10 12:26:00","2017-04-10 12:26:18","2017-04-10 12:26:00","0","","","","","","","0","1","","0","39","0"),
(null,"13362","","305","post","Osmos","http://osmos.sk/","0","0","","","749","2017-04-10 12:26:53","2017-04-10 12:27:28","2017-04-10 12:26:00","0","","","","","","","0","1","","0","39","0"),
(null,"13364","","306","post","Test Message, Admin Root","test-message-admin-root","0","0","","","","2017-04-10 12:41:34","2017-04-10 12:41:34","2017-04-10 12:41:34","0","","\n	<h3>Test Message</h3><br/>\n	<b>Meno:</b>Admin Root<br/>\n	<b>Adresa:</b>Neznáma 24, 85101, Bratislava<br/>\n	<b>Telefón:</b>0912345678<br/>\n	<b>Email:</b>admon@root.sk<br/>\n	<b>Firma:</b>Designdnt<br/>\n	<b>Produkt:</b><br/><br/>\n	\n	\n	<b>SPRÁVA</b>:\n	Táto správa bola poslaná cez kontaktný formulár na webe skeletónu. A cez send grid bola odoslaná na mail príjmateľa nastaveného v nastaveniach webu.<br/><br/><b>Kontaktný email odosielateľa: <a href=\"mailto:admon@root.sk\">admon@root.sk</a></b>","","","","","0","0","","0","39","0"),
(null,"13366","","304","post","Redakčný systém","redakcny-system","0","0","","","","2017-04-06 10:57:05","2017-04-13 16:38:27","2017-04-06 10:57:00","0","<p>Redakčn&yacute; syst&eacute;m je syst&eacute;m na spr&aacute;vu webovej str&aacute;nke. V tomto pr&iacute;pade sa jedn&aacute; o skelet&oacute;n aplik&aacute;ciu. Cez CMS Designdnt3 sa daj&uacute; vytv&aacute;rať&nbsp;webov&eacute; str&aacute;nky na platforme &quot;multydomain&quot;. Prvotn&yacute; v&yacute;voj začal v roku 2012, do značky <strong>Designdnt3&nbsp;</strong>sa dostal v roku 2014, odkedy je v&yacute;voj veden&yacute; v objektovo orientovanej platforme design patterne MVC.</p>\n","<p>Z&aacute;kladn&yacute; text</p>\n","","","","","0","1","","0","39","0"),
(null,"13367","","304","post","Skeletón web","skeleton-web","0","0","","","","2017-04-06 10:57:05","2017-04-13 16:25:13","2017-04-06 10:57:00","0","<p>Skelet&oacute;n web je jednoduch&yacute; web, ktor&yacute; sa spust&iacute; po nain&scaron;talovan&iacute; frameworku dnt3. <a href=\"https://github.com/designdnt/cms-designdnt3\" target=\"_blank\">https://github.com/designdnt/cms-designdnt3&nbsp;</a></p>\n","<p>Z&aacute;kladn&yacute; text</p>\n","","","","","0","1","","0","39","0"),
(null,"13369","","294","article","","","0","0","","","","2017-04-25 09:49:05","2017-04-25 09:49:05","2017-04-25 09:49:05","0","","","","","","","0","0","","0","39","0"),
(null,"13370","","308","product","Iphone 5 SE","iphone-5-se","0","0","","","","2017-04-25 09:49:42","2017-04-25 09:50:00","2017-04-25 09:49:00","0","","","","","","","0","1","","0","39","0"),
(null,"13573","14156","291","sitemap","Domáce","domace","0","0","article_list","","","2018-09-07 13:17:09","2018-09-28 15:58:02","2018-09-07 13:17:00","0","","","","","","","0","1","","0","39","0"),
(null,"13663","","483","post","Test 25","test-25","0","0","","","","2018-09-10 15:53:37","2018-09-10 15:53:44","2018-09-10 15:53:00","0","","","","","","","0","1","","0","39","0"),
(null,"14124","","293","post","Prázdna","prazdna","0","0","","","","2018-09-19 14:10:43","2018-09-19 14:10:53","2018-09-19 14:10:00","0","","","","","","","0","0","","0","39","0"),
(null,"14156","","290","sitemap","Intro","intro","0","0","intro","","","2018-09-28 15:48:33","2018-10-04 15:13:06","2018-09-28 15:48:00","0","","<p><span style=\"font-size:20px\"><strong>Nakupujete golfov&eacute; vybaven&iacute; v prodejn&aacute;ch GolfProfi nebo na eshopu <a href=\"http://www.golfprofi.cz/\" target=\"_blank\">www.golfprofi.cz</a>, odeb&iacute;r&aacute;te GolfProfi newsletter nebo jste členem věrnostn&iacute;ho programu <a href=\"https://www.golfprofi.cz/cs/login?back=my-account\" target=\"_blank\">GolfProfi Premium Club</a>? </strong>Pak hrajte o skvěl&yacute; golfov&yacute; pobyt pro dva př&iacute;mo v Alp&aacute;ch v regionu Zell am See-Kaprun!</span></p>\n","","","","","0","1","span style=\"font-size:20px\"><strong>Nakupujete golfov&eacute; vybaven&iacute; v prodejn&aacute;ch GolfProfi nebo na eshopu <a href=\"http://www.golfprofi.cz/\" target=\"_blank\">www.golfprofi.cz</a>, odeb&iacute;r&aacute;te GolfProfi newsletter nebo jste členem věrnostn&iacute;ho programu <a href=\"https://www.golfprofi.cz/cs/login?back=my-account\" target=\"_blank\">GolfProfi Premium Club</a>? </strong>Pak hrajte o skvěl&yacute; golfov&yacute; pobyt pro dva př&iacute;mo v Alp&aacute;ch v regionu Zell am See-Kaprun!</span></p>\n","0","39","0"),
(null,"14157","","290","sitemap","Zell Am See-Kaprun","zell-am-see-kaprun","0","0","region","","","2018-09-28 15:48:49","2018-10-08 16:49:38","2018-09-28 15:48:00","0","","","","","","","0","1","","0","39","0"),
(null,"14158","","290","sitemap","Partnerské hotely","partnerske-hotely","0","0","hotely","","","2018-09-28 15:49:26","2018-10-14 13:03:50","2018-09-28 15:49:00","0","","","","","","","0","1","","0","39","0"),
(null,"14159","14159","290","sitemap","Registrace","registrace","0","0","registracia","","","2018-09-28 15:49:47","2018-10-04 17:33:06","2018-09-28 15:49:00","0","","","","","","","0","1","","0","39","0"),
(null,"14162","","290","sitemap","GolfProfi","golfprofi","0","0","partneri","","","2018-10-07 13:26:19","2018-10-15 20:22:39","2018-10-07 13:26:00","0","","","","","","","0","1","","0","39","0");




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
) ENGINE=InnoDB AUTO_INCREMENT=1475 DEFAULT CHARSET=utf8;


INSERT INTO dnt_posts_meta VALUES
(null,"15","14156","intro","39","intro_name","Intro","text","2","Názov","0","1"),
(null,"16","14156","intro","39","intro_perex","","content","2","Perex","0","1"),
(null,"17","14156","intro","39","intro_content","<p><span style=\"font-size:16px\"><strong>Nakupujete golfov&eacute; vybaven&iacute; v prodejn&aacute;ch GolfProfi nebo na eshopu <a href=\"http://www.golfprofi.cz/\" target=\"_blank\">www.golfprofi.cz</a>, odeb&iacute;r&aacute;te GolfProfi newsletter nebo jste členem věrnostn&iacute;ho programu <a href=\"https://www.golfprofi.cz/cs/login?back=my-account\" target=\"_blank\">GolfProfi Premium Club</a>? </strong>Pak hrajte o skvěl&yacute; golfov&yacute; pobyt pro dva př&iacute;mo v Alp&aacute;ch v regionu Zell am See-Kaprun!</span></p>\n\n<p><span style=\"font-size:16px\"><strong>Soutěž prob&iacute;ha od 10.04. do 10.06.2018.</strong></span></p>\n\n<p><span style=\"font-size:16px\">Podm&iacute;nkou &uacute;časti v soutěži, pro neregistrovan&eacute; z&aacute;kazn&iacute;ky je n&aacute;kup v prodejn&aacute;ch nebo na eshopu GolfProfi, registrovan&iacute; z&aacute;kazn&iacute;ci se můžou z&uacute;častnit soutěže bez podm&iacute;nky n&aacute;kupu! Do soutěže se můžete zaregistrovat i v&iacute;cekr&aacute;t, pokud opakovaně nakoup&iacute;te v prodejn&aacute;ch nebo na eshopu GolfProfi.</span></p>\n\n<p><span style=\"font-size:16px\">V&yacute;hry v soutěži: <strong>2x luxusn&iacute; golfov&yacute; pobyt pro 2 osoby, na 5 dn&iacute; / 4noci&nbsp;</strong></span><span style=\"font-size:16px\"><strong>ubytov&aacute;n&iacute; v 4* hotelu&nbsp;s polopenz&iacute;, včetně greenfee,<br />\nv regionu Zell am See-Kaprun&nbsp;.</strong>&nbsp;Přejeme V&aacute;m hodně &scaron;těst&iacute; při slosov&aacute;n&iacute;!</span></p>\n","content","2","Content","0","1"),
(null,"18","14156","intro","39","intro_image","1735","image","2","Fotka","0","1"),
(null,"19","14156","intro","39","intro_progress_1","Hotel","text","2","Progres1","0","1"),
(null,"20","14156","intro","39","intro_progress_2","Región","text","2","Progres2","0","1"),
(null,"21","14156","intro","39","intro_progress_3","Zážitky","text","2","Progres3","0","1"),
(null,"22","14156","intro","39","intro_progress_4","Komfort","text","2","Progres4","0","1"),
(null,"23","14156","intro","39","intro_bg_image","1736","image","2","BackgroundFotka","0","1"),
(null,"24","14159","registracia","39","form_base_name","Meno","text","3","Input Meno","0","1"),
(null,"25","14159","registracia","39","form_base_surname","Priezvisko","text","3","Input Priezvisko","0","1"),
(null,"26","14159","registracia","39","form_base_psc","PSČ","text","3","Input PSČ","0","1"),
(null,"27","14159","registracia","39","form_base_city","Mesto","text","3","Input Mesto","0","1"),
(null,"28","14159","registracia","39","form_base_email","Email","text","3","Input Email","0","1"),
(null,"29","14159","registracia","39","form_base_tel_c","Telefónne číslo","text","3","Input Tel. číslo","0","1"),
(null,"30","14159","registracia","39","form_extend_v1_doklad","Doklad","text","3","Input Doklad","0","0"),
(null,"31","14159","registracia","39","form_extend_v2_otazka","Napíšte farbu vášho PC","text","3","Input otázka","0","1"),
(null,"32","14159","registracia","39","form_extend_v3_otazka","Je toto modré?","text","3","Input Otázka + odpovede","0","0"),
(null,"33","14159","registracia","39","form_extend_v3_odpoved_a","áno","text","3","Odpoveď A","0","0"),
(null,"34","14159","registracia","39","form_extend_v3_odpoved_b","nie","text","3","Odpoveď B","0","0"),
(null,"35","14159","registracia","39","form_extend_v3_odpoved_c","možno","text","3","Odpoveď C","0","0"),
(null,"36","14159","registracia","39","form_base_custom_1","Místo nákupu (zadejte)","text","3","Voliteľný parameter","0","1"),
(null,"37","14159","registracia","39","form_user_image_1","JAK PRÁZDNINY? (foto)","text","3","Upload obrázku","0","1"),
(null,"38","14159","registracia","39","sent_confirm_mail","1","bool","3","Odoslať potvrdzovací email","0","1"),
(null,"39","14159","registracia","39","email_conf_sent_text","odoslané","text","3","Hláška, súťažiacemu ktorá mu príde na email po registracii.","0","1"),
(null,"40","14159","registracia","39","field_word_povinne_polia","Povinné polia","text","3","Hláška za hviezdičkou o povinných poliach","0","1"),
(null,"41","14159","registracia","39","email_conf_char","8","text","3","Počet znakov vygenerovaného hashu","0","1"),
(null,"42","14159","registracia","39","form_file_podmienky_1","","file","3","Podmienky súťaže (PDF)","0","1"),
(null,"43","14159","registracia","39","form_file_newsletter_1","","file","3","Newsletter 1 (PDF)","0","1"),
(null,"44","14159","registracia","39","form_file_newsletter_2","","file","3","Newsletter 2 (PDF)","0","1"),
(null,"45","14159","registracia","39","form_embed_newsletter_1","","text","3","Newsletter 1 (Embed)","0","1"),
(null,"46","14159","registracia","39","form_embed_newsletter_2","","text","3","Newsletter 2 (Embed)","0","1"),
(null,"47","14159","registracia","39","form_embed_newsletter_3","","text","3","Newsletter 3 (Embed)","0","1"),
(null,"52","14159","registracia","39","email_sender","info@vyhrat.com","text","3","Email odosielateľa pod ktorým príde thankyou mail","0","1"),
(null,"56","14159","registracia","39","email_subject","Registrace do souteže","text","3","Predmet emailu pod ktorým príde thankyou mail","0","1"),
(null,"57","14159","registracia","39","koniec_registracie","<p>SOUTĚŽ BYLA UKONČENA DNE 1.11. 2016.</p>\n\n<p>Slosov&aacute;n&iacute; proběhlo dne 04.11.2016, ze v&scaron;ech přijat&yacute;ch platn&yacute;ch registrac&iacute; byli vybr&aacute;ni&nbsp; 3 v&yacute;herci dle pravidel soutěže. Dovolenkov&yacute; pobyt v Salzburgu pro 2 osoby na 4&nbsp;dny (3&nbsp;noci), ubytov&aacute;n&iacute; ve 3-4*hotelu se sn&iacute;dan&iacute;, včetně 3-denn&iacute; slevov&eacute; karty &bdquo;SalzburgCard&ldquo; z&iacute;sk&aacute;vaj&iacute; :</p>\n\n<p><strong>Tereza Seidlov&aacute;, 54701 N&aacute;chod, ČR</strong></p>\n\n<p><strong>Marie Herzogov&aacute;, 53701 Chrudim, ČR</strong></p>\n\n<p><strong>Gabriela Zpěv&aacute;kov&aacute;, 78313 &Scaron;těp&aacute;nov, ČR</strong></p>\n\n<p>V&yacute;herci budou kontaktov&aacute;ni provozovatelem soutěže ohledně převzet&iacute; pobytov&yacute;ch voucherů v nejbliž&scaron;&iacute;ch dnech. Pobytov&eacute; vouchery jsou platn&eacute; 31.10.2017, pobyty nezahrnujou dopravu.</p>\n\n<p><u><strong>V&scaron;em děkujeme za &uacute;čast a v&yacute;hercům srdečne blahopřejeme!</strong></u></p>\n\n<p><span style=\"font-size:12px\">Spr&aacute;vnost a platnost slosov&aacute;n&iacute; potvrzuj&iacute; provozovatel&eacute; soutěže:<br />\nOrganiz&aacute;tor: TSG Tourismus Salzburg GmbH Auerspergstra&szlig;e 6, 5020 Salzburg, Rakousko<br />\na spoluorganiz&aacute;tor soutěže: GOLDTIME a.s., U Libeňsk&eacute;ho pivovaru 10, Praha 8, Česk&aacute; republika</span></p>\n","content","3","Text po ukončení registrácie","0","1"),
(null,"58","14157","region","39","name","Zell Am See","text","2","Názov v rámci stránky","0","1"),
(null,"59","14157","region","39","text_1","<p><strong>ZELL AM SEE-KAPRUN - UŽIJ SI RADOST NAPLNO!<br />\nDovolen&aacute; mezi ledovcem, horami a jezerem&nbsp;</strong><br />\nZell am See-Kaprun v sam&eacute;m srdci rakousk&yacute;ch Alp je př&iacute;rodn&iacute; a rekreačn&iacute; r&aacute;j par excellence. Na &uacute;pat&iacute; hory Kitzsteinhorn vysok&eacute; 3203 metrů a zellsk&eacute; m&iacute;stn&iacute; obl&iacute;ben&eacute; hory Schmittenh&ouml;he se kolem kři&scaron;ť&aacute;lově čist&eacute;ho jezera Zeller See pln&iacute; př&aacute;n&iacute; a požadavky na rekreaci v&scaron;eho druhu: Turistům a milovn&iacute;kům vodn&iacute;ch sportů, rodin&aacute;m s dětmi a milovn&iacute;kům př&iacute;rody, cyklistům a běžcům, milovn&iacute;kům adrenalinov&eacute; z&aacute;bavy a požitk&aacute;řům, vyznavačům j&oacute;gy a golfov&yacute;m nad&scaron;encům.</p>\n\n<p><strong>Nejlep&scaron;&iacute; tipy na nezapomenutelnou letn&iacute; dovolenou:</strong></p>\n\n<ul>\n	<li>Tři m&iacute;stn&iacute; hory Schmittenh&ouml;he, Kitzsteinhorn a Maiskogel jsou považov&aacute;ny za skutečně rekreačn&iacute; oblasti a nab&iacute;z&iacute; turistům, cyklistům a rodin&aacute;m &scaron;irokou &scaron;k&aacute;lu různ&yacute;ch aktivit</li>\n	<li>&bdquo;Kitzsteinhorn Explorer Tour&quot;. Prohl&iacute;dka s průvodcem do čtyř klimatick&yacute;ch z&oacute;n s n&aacute;slednou n&aacute;v&scaron;těvou nejvy&scaron;&scaron;&iacute; vyhl&iacute;dkov&eacute; platformy v Salcburku &bdquo;Top of Salzburg&ldquo;</li>\n	<li>Vysokohorsk&eacute; přehrady v Kaprunu nab&iacute;zej&iacute; lezeckou stezku na jedn&eacute; přehradn&iacute; zdi, kter&aacute; je celosvětově v nejvy&scaron;&scaron;&iacute; nadmořsk&eacute; v&yacute;&scaron;ce, k nab&iacute;dce tak&eacute; patř&iacute; lezeck&aacute; ar&eacute;na H&ouml;henburg</li>\n	<li>J&oacute;dlov&aacute;n&iacute; na hoře, j&oacute;ga na stand-up-boardu nebo setk&aacute;n&iacute; s bylink&aacute;řsk&yacute;mi čarodějnicemi na Schmittenh&ouml;he</li>\n	<li>&bdquo;Zellsk&eacute; jezern&iacute; kouzlo&ldquo; (&bdquo;Zeller Seezauber&ldquo;)- velkolep&aacute; vodn&iacute;, světeln&aacute;, hudebn&iacute; a laserov&aacute; show a pocta světově proslul&eacute;mu jezeru v Zell am See</li>\n</ul>\n\n<p>S praktickou letn&iacute; kartou <a href=\"https://www.zellamsee-kaprun.com/cs/summercard\" target=\"_blank\">Zell am See-Kaprun SommerCard</a>&nbsp;lze nav&scaron;t&iacute;vit až 40 atrakc&iacute; -v&yacute;letn&iacute; c&iacute;le, pam&aacute;tky a muzea v tomto regionu a v cel&eacute; zemi Salcbursko. Kromě toho opravňuje k mnoha dal&scaron;&iacute;m slev&aacute;m. Plat&iacute; v obdob&iacute; od 15. května do 15. ř&iacute;jna a z&iacute;skat ji lze ve z&uacute;častněn&yacute;ch ubytovac&iacute;ch&nbsp;zař&iacute;zen&iacute;ch.<br />\nV&iacute;ce se dozv&iacute;te zde: <a href=\"https://www.zellamsee-kaprun.com/cs\" target=\"_blank\">www.zellamsee-kaprun.com</a></p>\n","content","2","Text 1","0","1"),
(null,"60","14157","region","39","text_2","<p><strong>ZELL AM SEE-KAPRUN - UŽI SI RADOSŤ NAPLNO!</strong><br />\n<strong>Dovolenka medzi ľadovcom, horami a jazerom</strong><br />\nZell am See-Kaprun v srdci rak&uacute;skych &Aacute;lp je pr&iacute;rodn&yacute; a dovolenkov&yacute; raj par excellence. Na &uacute;p&auml;t&iacute; hory Kitzsteinhorn vysokej 3203 metrov a zellskej miestne obľ&uacute;benej hory Schmittenh&ouml;he sa v okol&iacute; kři&scaron;t&aacute;lovo čist&eacute;ho jazera Zeller See plnia priania a požiadavky na rekre&aacute;ciu v&scaron;etk&eacute;ho druhu: pre turistov a milovn&iacute;kov vodn&yacute;ch &scaron;portov, rodiny s deťmi a milovn&iacute;kov pr&iacute;rody , cyklistov a bežcov, milovn&iacute;kov adrenal&iacute;novej z&aacute;bavy aj milovn&iacute;kov pohody, vyznavačov j&oacute;gy a golfov&yacute;ch nad&scaron;encov.</p>\n\n<p><strong>Najlep&scaron;ie tipy na nezabudnuteľn&uacute; letn&uacute; dovolenku:</strong></p>\n\n<ul>\n	<li>Tri miestne hory Schmittenh&ouml;he, Kitzsteinhorn a Maiskogel s&uacute; považovan&eacute; za skutočne rekreačn&eacute; oblasti a pon&uacute;kaj&uacute; turistom, cyklistom a rodin&aacute;m &scaron;irok&uacute; &scaron;k&aacute;lu r&ocirc;znych aktiv&iacute;t</li>\n	<li>&bdquo;Kitzsteinhorn Explorer Tour&quot;. Prehliadka so sprievodcom cez &scaron;tyri klimatick&eacute; z&oacute;ny a n&aacute;slednou n&aacute;v&scaron;tevou najvy&scaron;&scaron;ej vyhliadkovej platformy v Salzburgsku &bdquo;Top of Salzburg&ldquo;</li>\n	<li>Vysokohorsk&eacute; priehrady v Kaprune pon&uacute;kaj&uacute; lezeck&uacute; trasu na priehradnom m&uacute;re, ktor&aacute; je celosvetovo v najvy&scaron;&scaron;ej nadmorskej v&yacute;&scaron;ke, ponuku dopĺňa lezeck&aacute; ar&eacute;na H&ouml;henburg</li>\n	<li>J&oacute;dlovanie na hore, j&oacute;ga na stand-up-boarde alebo stretnutie s bylink&aacute;rkami čarodejnicami na Schmittenh&ouml;he</li>\n	<li>&bdquo;Zellsk&eacute; jazern&eacute; k&uacute;zlo&ldquo; (&bdquo;Zeller Seezauber&ldquo;)- veľkolep&aacute; vodn&aacute;, sveteln&aacute;, hudobn&aacute; a laserov&aacute; show a pocta svetovo presl&aacute;ven&eacute;mu jazeru v Zell am See</li>\n</ul>\n\n<p>S praktickou letnou kartou <a href=\"https://www.zellamsee-kaprun.com/cs/summercard\" target=\"_blank\">Zell am See-Kaprun SommerCard</a>&nbsp;m&ocirc;žete nav&scaron;t&iacute;viť až 40 atrakci&iacute; -v&yacute;letn&eacute; ciele, pamiatky a muze&aacute; v tomto regi&oacute;ne a v celom Salzburgsku. Okrem toho opr&aacute;vňuje na množstvo ďaľ&scaron;&iacute;ch zliav. Plat&iacute; v obdob&iacute; od 15. m&aacute;ja do 15. okt&oacute;bra a z&iacute;skať ju m&ocirc;žete v partnersk&yacute;ch ubytovac&iacute;ch zariadeniach.&nbsp;<br />\nViac sa dozviete tu: <a href=\"https://www.zellamsee-kaprun.com/sk\" target=\"_blank\">www.zellamsee-kaprun.com</a></p>\n","content","2","Text 2","0","1"),
(null,"61","14157","region","39","galeria_1","1744,1745,1746,1747,1748,1749","image","2","Galéria fotografii","0","1"),
(null,"62","14157","region","39","mapa","Mapa","text","2","Sekcia Mapa - názov sekcie","0","1"),
(null,"63","14157","region","39","youtube_embed","https://www.youtube.com/embed/ULlWLMGDTGg","youtube_embed","2","Youtube video","0","1"),
(null,"92","14158","hotely","39","id_1_hotel_name","BERGHOTEL JAGA-ALM****","text","3","Názov hotelu","10","1"),
(null,"93","14158","hotely","39","id_1_text","<p><strong>ALPENHAUS KAPRUN&nbsp;</strong>nab&iacute;z&iacute; v r&aacute;mci dovolen&eacute; na nejvy&scaron;&scaron;&iacute; &uacute;rovni vydařen&yacute; mix radost&iacute; sest&aacute;vaj&iacute;c&iacute; z alpsk&eacute;ho životn&iacute;ho stylu, kulin&aacute;řstv&iacute;, sportu a wellness. V osobit&eacute; atmosf&eacute;ře 4-hvězdičkov&eacute;ho hotelu v centru Kaprunu v salcbursk&eacute;m Pinzgau host&eacute; zažij&iacute; nejvy&scaron;&scaron;&iacute; kulturu bydlen&iacute; , kterou poskytuje 122 moderně zař&iacute;zen&yacute;ch pokojů a apartm&aacute;nů. Do tohoto modern&iacute;ho alpsk&eacute;ho r&aacute;mce zapad&aacute; i vybran&aacute; hotelov&aacute; kuchyně, kter&aacute; poskytuje potě&scaron;uj&iacute;c&iacute; z&aacute;žitek pro smysly gurm&aacute;nů. Kulin&aacute;řskou nab&iacute;dku doplňuj&iacute; vegetari&aacute;nsk&aacute; a vegansk&aacute; j&iacute;dla. Okamžiky radosti pro tělo i du&scaron;i nab&iacute;z&iacute; l&aacute;zně ALPEN.VEDA.SPA na plo&scaron;e o 1000 m&sup2; na 2 podlaž&iacute;ch s 6 saunami, solnou parn&iacute; l&aacute;zn&iacute;, relaxačn&iacute;mi m&iacute;stnostmi s vodn&iacute;mi lůžky, whirlpoolem, kryt&yacute;m baz&eacute;nem a s &scaron;irokou &scaron;k&aacute;lou procedur.</p>\n","content","3","Text k hotelu","20","1"),
(null,"94","14158","hotely","39","id_1_adresa","ČR: GOLDTIME a.s. <br> U Libeňského pivovaru 10 <br> 180 00 Praha 8 - ČR","text","3","Adresa","30","1"),
(null,"95","14158","hotely","39","id_1_tel_c","ČR: +420 284 810 957 <br> SK: +421 2 4342 5168","text","3","Telefónne číslo","40","1"),
(null,"96","14158","hotely","39","id_1_email","Content","text","3","Email 1","50","1"),
(null,"97","14158","hotely","39","id_1_image_1","1750","image","3","Fotka, alebo fotky - max 2","60","1"),
(null,"98","14158","hotely","39","id_2_hotel_name","BERGHOTEL JAGA-ALM****","text","3","Názov hotelu","70","1"),
(null,"99","14158","hotely","39","id_2_text","<p><strong>ALPENHAUS KAPRUN&nbsp;</strong>nab&iacute;z&iacute; v r&aacute;mci dovolen&eacute; na nejvy&scaron;&scaron;&iacute; &uacute;rovni vydařen&yacute; mix radost&iacute; sest&aacute;vaj&iacute;c&iacute; z alpsk&eacute;ho životn&iacute;ho stylu, kulin&aacute;řstv&iacute;, sportu a wellness. V osobit&eacute; atmosf&eacute;ře 4-hvězdičkov&eacute;ho hotelu v centru Kaprunu v salcbursk&eacute;m Pinzgau host&eacute; zažij&iacute; nejvy&scaron;&scaron;&iacute; kulturu bydlen&iacute; , kterou poskytuje 122 moderně zař&iacute;zen&yacute;ch pokojů a apartm&aacute;nů. Do tohoto modern&iacute;ho alpsk&eacute;ho r&aacute;mce zapad&aacute; i vybran&aacute; hotelov&aacute; kuchyně, kter&aacute; poskytuje potě&scaron;uj&iacute;c&iacute; z&aacute;žitek pro smysly gurm&aacute;nů. Kulin&aacute;řskou nab&iacute;dku doplňuj&iacute; vegetari&aacute;nsk&aacute; a vegansk&aacute; j&iacute;dla. Okamžiky radosti pro tělo i du&scaron;i nab&iacute;z&iacute; l&aacute;zně ALPEN.VEDA.SPA na plo&scaron;e o 1000 m&sup2; na 2 podlaž&iacute;ch s 6 saunami, solnou parn&iacute; l&aacute;zn&iacute;, relaxačn&iacute;mi m&iacute;stnostmi s vodn&iacute;mi lůžky, whirlpoolem, kryt&yacute;m baz&eacute;nem a s &scaron;irokou &scaron;k&aacute;lou procedur.</p>\n","content","3","Text k hotelu","80","1"),
(null,"100","14158","hotely","39","id_2_adresa","ČR: GOLDTIME a.s. <br> U Libeňského pivovaru 10 <br> 180 00 Praha 8 - ČR","text","3","Adresa","90","1"),
(null,"101","14158","hotely","39","id_2_tel_c","ČR: +420 284 810 957 <br> SK: +421 2 4342 5168","text","3","Telefónne číslo","100","1"),
(null,"102","14158","hotely","39","id_2_email","Content","text","3","Email 1","110","1"),
(null,"103","14158","hotely","39","id_2_image_1","1751","image","3","Fotka, alebo fotky - max 2","120","1"),
(null,"104","14158","hotely","39","id_3_hotel_name","Hotel Tirolerhof ****S","text","3","Názov hotelu","130","1"),
(null,"105","14158","hotely","39","id_3_text","<p><strong>ALPENHAUS KAPRUN&nbsp;</strong>nab&iacute;z&iacute; v r&aacute;mci dovolen&eacute; na nejvy&scaron;&scaron;&iacute; &uacute;rovni vydařen&yacute; mix radost&iacute; sest&aacute;vaj&iacute;c&iacute; z alpsk&eacute;ho životn&iacute;ho stylu, kulin&aacute;řstv&iacute;, sportu a wellness. V osobit&eacute; atmosf&eacute;ře 4-hvězdičkov&eacute;ho hotelu v centru Kaprunu v salcbursk&eacute;m Pinzgau host&eacute; zažij&iacute; nejvy&scaron;&scaron;&iacute; kulturu bydlen&iacute; , kterou poskytuje 122 moderně zař&iacute;zen&yacute;ch pokojů a apartm&aacute;nů. Do tohoto modern&iacute;ho alpsk&eacute;ho r&aacute;mce zapad&aacute; i vybran&aacute; hotelov&aacute; kuchyně, kter&aacute; poskytuje potě&scaron;uj&iacute;c&iacute; z&aacute;žitek pro smysly gurm&aacute;nů. Kulin&aacute;řskou nab&iacute;dku doplňuj&iacute; vegetari&aacute;nsk&aacute; a vegansk&aacute; j&iacute;dla. Okamžiky radosti pro tělo i du&scaron;i nab&iacute;z&iacute; l&aacute;zně ALPEN.VEDA.SPA na plo&scaron;e o 1000 m&sup2; na 2 podlaž&iacute;ch s 6 saunami, solnou parn&iacute; l&aacute;zn&iacute;, relaxačn&iacute;mi m&iacute;stnostmi s vodn&iacute;mi lůžky, whirlpoolem, kryt&yacute;m baz&eacute;nem a s &scaron;irokou &scaron;k&aacute;lou procedur.</p>\n","content","3","Text k hotelu","140","1"),
(null,"106","14158","hotely","39","id_3_adresa","ČR: GOLDTIME a.s. <br> U Libeňského pivovaru 10 <br> 180 00 Praha 8 - ČR","text","3","Adresa","150","1"),
(null,"107","14158","hotely","39","id_3_tel_c","ČR: +420 284 810 957 <br> SK: +421 2 4342 5168","text","3","Telefónne číslo","160","1"),
(null,"108","14158","hotely","39","id_3_email","Content","text","3","Email 1","170","1"),
(null,"109","14158","hotely","39","id_3_image_1","1752","image","3","Fotka, alebo fotky - max 2","180","1"),
(null,"110","14158","hotely","39","id_4_hotel_name","Hotel Tirolerhof ****S","text","3","Názov hotelu","190","1"),
(null,"111","14158","hotely","39","id_4_text","<p><strong>ALPENHAUS KAPRUN&nbsp;</strong>nab&iacute;z&iacute; v r&aacute;mci dovolen&eacute; na nejvy&scaron;&scaron;&iacute; &uacute;rovni vydařen&yacute; mix radost&iacute; sest&aacute;vaj&iacute;c&iacute; z alpsk&eacute;ho životn&iacute;ho stylu, kulin&aacute;řstv&iacute;, sportu a wellness. V osobit&eacute; atmosf&eacute;ře 4-hvězdičkov&eacute;ho hotelu v centru Kaprunu v salcbursk&eacute;m Pinzgau host&eacute; zažij&iacute; nejvy&scaron;&scaron;&iacute; kulturu bydlen&iacute; , kterou poskytuje 122 moderně zař&iacute;zen&yacute;ch pokojů a apartm&aacute;nů. Do tohoto modern&iacute;ho alpsk&eacute;ho r&aacute;mce zapad&aacute; i vybran&aacute; hotelov&aacute; kuchyně, kter&aacute; poskytuje potě&scaron;uj&iacute;c&iacute; z&aacute;žitek pro smysly gurm&aacute;nů. Kulin&aacute;řskou nab&iacute;dku doplňuj&iacute; vegetari&aacute;nsk&aacute; a vegansk&aacute; j&iacute;dla. Okamžiky radosti pro tělo i du&scaron;i nab&iacute;z&iacute; l&aacute;zně ALPEN.VEDA.SPA na plo&scaron;e o 1000 m&sup2; na 2 podlaž&iacute;ch s 6 saunami, solnou parn&iacute; l&aacute;zn&iacute;, relaxačn&iacute;mi m&iacute;stnostmi s vodn&iacute;mi lůžky, whirlpoolem, kryt&yacute;m baz&eacute;nem a s &scaron;irokou &scaron;k&aacute;lou procedur.</p>\n","content","3","Text k hotelu","200","1"),
(null,"112","14158","hotely","39","id_4_adresa","ČR: GOLDTIME a.s. <br> U Libeňského pivovaru 10 <br> 180 00 Praha 8 - ČR","text","3","Adresa","210","1"),
(null,"113","14158","hotely","39","id_4_tel_c","ČR: +420 284 810 957 <br> SK: +421 2 4342 5168","text","3","Telefónne číslo","220","1"),
(null,"114","14158","hotely","39","id_4_email","Content","text","3","Email 1","230","1"),
(null,"115","14158","hotely","39","id_4_image_1","1753","image","3","Fotka, alebo fotky - max 2","240","1"),
(null,"116","14158","hotely","39","id_1_web","https://www.google.sk","text","3","Webová adresa","41","1"),
(null,"117","14158","hotely","39","id_2_web","https://www.google.sk","text","3","Webová adresa","101","1"),
(null,"118","14158","hotely","39","id_3_web","https://www.google.sk","text","3","Webová adresa","161","1"),
(null,"119","14158","hotely","39","id_4_web","https://www.google.sk","text","3","Webová adresa","221","1"),
(null,"120","14158","hotely","39","id_1_text_2","","content","3","Text k hotelu 2","21","0"),
(null,"121","14158","hotely","39","id_2_text_2","","content","3","Text k hotelu 2","81","0"),
(null,"122","14158","hotely","39","id_3_text_2","","content","3","Text k hotelu 2","141","0"),
(null,"123","14158","hotely","39","id_4_text_2","","content","3","Text k hotelu 2","221","0"),
(null,"198","14162","partneri","39","id_1_hotel_name","Intersport","text","3","Názov partnera","0","1"),
(null,"199","14162","partneri","39","id_1_text","<p><strong><a href=\"http://www.intersport.cz/\" target=\"_blank\">INTERSPORT</a>&nbsp;je největ&scaron;&iacute;m prodejcem sportovn&iacute;ho oblečen&iacute; a vybaven&iacute; na světě.</strong><br />\nNab&iacute;z&iacute; oblečen&iacute; a obuv na sport i pro voln&yacute; čas. S v&yacute;běrem sportovn&iacute;ho vybaven&iacute; vždy pomohou odborn&iacute; poradci, kteř&iacute; jsou často sami nad&scaron;en&yacute;mi sportovci. Prodejny nav&iacute;c nab&iacute;z&iacute; službu servisu sportovn&iacute;ho vybaven&iacute;, od opravy v&yacute;pletů tenisov&yacute;ch raket, přes opravu kol, o&scaron;etřen&iacute; inline brusl&iacute; a skateboardů<br />\naž po seř&iacute;zen&iacute; lyž&iacute;.</p>\n","content","3","Hlavný text k partnerovi","0","1"),
(null,"200","14162","partneri","39","id_1_text_2","<p>Content</p>\n","content","3","Text k partnerovi 2","0","0"),
(null,"201","14162","partneri","39","id_1_adresa","Na Strži 65, 142 00 Praha 4 -CZ ","text","3","Adresa","0","1"),
(null,"202","14162","partneri","39","id_1_tel_c","0904123456","text","3","Telefónne číslo","0","1"),
(null,"203","14162","partneri","39","id_1_email","intersport@intersport.cz ","text","3","Email 1","0","1"),
(null,"204","14162","partneri","39","id_1_web","http://www.intersport.cz ","text","3","Webová adresa 1","0","1"),
(null,"205","14162","partneri","39","id_1_image_1","1778","image","3","Fotka, alebo fotky - max 2","0","1"),
(null,"370","14159","registracia","39","enable_registration","","no_input","3","Povoliť alebo zakázať registráciu","0","1");




CREATE TABLE IF NOT EXISTS `dnt_registred_users` (
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
  `kliknute` int(11) NOT NULL DEFAULT '0',
  `ip_adresa` varchar(300) NOT NULL,
  `parent_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=72108 DEFAULT CHARSET=utf8;


INSERT INTO dnt_registred_users VALUES
(null,"72077","39","","competitor-user","","","","","","Bratislava","0","","Doubek","","thomas.doubek@gmail.com","","0904700823","84101","0","0","0","0","2018-10-07 11:11:17","0000-00-00 00:00:00","0000-00-00 00:00:00","1","","0","","sdfdsf","","0","0","::1","0"),
(null,"72078","39","","competitor-user","tomas","Doubek","","","","Bratislava","0","","Doubek","","thomas.doubek@gmail.com","","0904700823","84101","0","0","0","0","2018-10-07 11:11:36","0000-00-00 00:00:00","0000-00-00 00:00:00","1","","0","","sdfdsf","","0","0","::1","0"),
(null,"72079","39","5bb9cdd7c0913","competitor-user","tomas","Doubek","","","","Bratislava","0","","Doubek","","thomas.doubek@gmail.com","","0904700823","84101","0","0","0","0","2018-10-07 11:11:51","0000-00-00 00:00:00","0000-00-00 00:00:00","1","","0","","sdfdsf","","0","0","::1","0"),
(null,"72080","39","5bb9ce0eeefdf","competitor-user","tomas","Doubek","","","","Bratislava","0","","Doubek","","thomas.doubek@gmail.com","","0904700823","84101","0","0","0","0","2018-10-07 11:12:46","0000-00-00 00:00:00","0000-00-00 00:00:00","1","","0","","sdfdsf","http://zsk-pompocz.localhost/dnt3/dnt-view/data/external-uploads/white_background_6.jpg","0","0","::1","0"),
(null,"72081","39","5bb9ce513d34e","competitor-user","tomas","Doubek","","","","Bratislava","0","","Doubek","","thomas.doubek@gmail.com","","0904700823","84101","0","0","0","0","2018-10-07 11:13:53","0000-00-00 00:00:00","0000-00-00 00:00:00","1","1","0","","sdfdsf","http://zsk-pompocz.localhost/dnt3/dnt-view/data/external-uploads/white_background_7.jpg","0","0","::1","0"),
(null,"72082","39","5bb9ce54381f0","competitor-user","tomas","Doubek","","","","Bratislava","0","","Doubek","","thomas.doubek@gmail.com","","0904700823","84101","0","0","0","0","2018-10-07 11:13:56","0000-00-00 00:00:00","0000-00-00 00:00:00","1","1","1","","sdfdsf","http://zsk-pompocz.localhost/dnt3/dnt-view/data/external-uploads/white_background_8.jpg","0","0","::1","0"),
(null,"72083","39","5bb9ce60dfc76","competitor-user","tomas","Doubek","","","","Bratislava","0","","Doubek","","thomas.doubek@gmail.com","","0904700823","84101","0","0","0","0","2018-10-07 11:14:08","0000-00-00 00:00:00","0000-00-00 00:00:00","1","1","0","","sdfdsf","http://zsk-pompocz.localhost/dnt3/dnt-view/data/external-uploads/white_background_9.jpg","0","0","::1","0"),
(null,"72084","39","5bb9ce6a70958","competitor-user","tomas","Doubek","","","","Bratislava","0","","Doubek","","thomas.doubek@gmail.com","","0904700823","84101","0","0","0","0","2018-10-07 11:14:18","0000-00-00 00:00:00","0000-00-00 00:00:00","1","1","1","","sdfdsf","http://zsk-pompocz.localhost/dnt3/dnt-view/data/external-uploads/white_background_10.jpg","0","0","::1","0"),
(null,"72085","39","5bb9ce7a53054","competitor-user","tomas","Doubek","","","","Bratislava","0","","Doubek","","thomas.doubek@gmail.com","","0904700823","84101","0","0","0","0","2018-10-07 11:14:34","0000-00-00 00:00:00","0000-00-00 00:00:00","1","1","1","","sdfdsf","http://zsk-pompocz.localhost/dnt3/dnt-view/data/external-uploads/white_background_11.jpg","0","0","::1","0"),
(null,"72086","39","5bb9d566df7ee","competitor-user","tomas","Doubek","","","","Bratislava","0","","Doubek","","thomas.doubek@gmail.com","","0904700823","84101","0","0","0","0","2018-10-07 11:44:06","0000-00-00 00:00:00","0000-00-00 00:00:00","1","1","1","","sdfdsf","http://zsk-pompocz.localhost/dnt3/dnt-view/data/external-uploads/white_background_12.jpg","0","0","::1","0"),
(null,"72087","39","5bb9e358b6c4c","competitor-user","tomas","Doubek","","","","Bratislava","0","","Doubek","","thomas.doubek@gmail.com","","0904700823","84101","0","0","0","0","2018-10-07 12:43:36","0000-00-00 00:00:00","0000-00-00 00:00:00","1","1","1","","sdfdsf","http://zsk-pompocz.localhost/dnt3/dnt-view/data/external-uploads/white_background_13.jpg","0","0","::1","0"),
(null,"72088","39","5bb9e3dad7978","competitor-user","tomas","Doubek","","","","Bratislava","0","","Doubek","","thomas.doubek@gmail.com","","0904700823","84101","0","0","0","0","2018-10-07 12:45:46","0000-00-00 00:00:00","0000-00-00 00:00:00","1","1","1","","sdfdsf","http://zsk-pompocz.localhost/dnt3/dnt-view/data/external-uploads/white_background_14.jpg","0","0","::1","0"),
(null,"72089","39","5bb9e4986fcb3","competitor-user","tomas","Doubek","","","","Bratislava","0","","Doubek","","thomas.doubek@gmail.com","","0904700823","84101","0","0","0","0","2018-10-07 12:48:56","0000-00-00 00:00:00","0000-00-00 00:00:00","1","1","1","","sdfdsf","http://zsk-pompocz.localhost/dnt3/dnt-view/data/external-uploads/white_background_15.jpg","0","0","::1","0"),
(null,"72090","39","5bb9e4efbb3b4","competitor-user","tomas","Doubek","","","","Bratislava","0","","Doubek","","thomas.doubek@gmail.com","","0904700823","84101","0","0","0","0","2018-10-07 12:50:23","0000-00-00 00:00:00","0000-00-00 00:00:00","1","1","1","","sdfdsf","http://zsk-pompocz.localhost/dnt3/dnt-view/data/external-uploads/white_background_16.jpg","0","0","::1","0"),
(null,"72091","39","5bb9e527c1a11","competitor-user","tomas","Doubek","","","","Bratislava","0","","Doubek","","thomas.doubek@gmail.com","","0904700823","84101","0","0","0","0","2018-10-07 12:51:19","0000-00-00 00:00:00","0000-00-00 00:00:00","1","1","1","","sdfdsf","http://zsk-pompocz.localhost/dnt3/dnt-view/data/external-uploads/white_background_17.jpg","0","0","::1","0"),
(null,"72092","39","5bb9e80673056","competitor-user","tomas","Doubek","","","","Bratislava","0","","Doubek","","thomas.doubek@gmail.com","","0904700823","84101","0","0","0","0","2018-10-07 13:03:34","0000-00-00 00:00:00","0000-00-00 00:00:00","1","1","0","","sdfdsf","http://zsk-pompocz.localhost/dnt3/dnt-view/data/external-uploads/7484_male-karpaty_59d50d65d0ea5.jpg","0","0","::1","0"),
(null,"72093","39","5bb9e824d49d1","competitor-user","tomas","Doubek","","","","Bratislava","0","","Doubek","","thomas.doubek@gmail.com","","0904700823","84101","0","0","0","0","2018-10-07 13:04:04","0000-00-00 00:00:00","0000-00-00 00:00:00","1","1","0","","sdfdsf","http://zsk-pompocz.localhost/dnt3/dnt-view/data/external-uploads/7484_male-karpaty_59d50d65d0ea5_1.jpg","0","0","::1","0"),
(null,"72098","39","5bb9f125c3f8b","competitor-user","tomas","Doubek","","","","Bratislava","0","","Doubek","","thomas.doubek@gmail.com","","0904700823","84101","0","0","0","0","2018-10-07 13:42:29","0000-00-00 00:00:00","0000-00-00 00:00:00","1","1","1","","sdfdsf","http://zsk-pompocz.localhost/dnt3/dnt-view/data/external-uploads/img1_1350x600pix_1.jpg","1","0","::1","0"),
(null,"72097","39","5bb9f11a514f3","competitor-user","tomas","Doubek","","","","Bratislava","0","","Doubek","","thomas.doubek@gmail.com","","0904700823","84101","0","0","0","0","2018-10-07 13:42:18","0000-00-00 00:00:00","0000-00-00 00:00:00","1","1","1","","sdfdsf","http://zsk-pompocz.localhost/dnt3/dnt-view/data/external-uploads/img1_1350x600pix.jpg","1","0","::1","0"),
(null,"72099","39","5bc755faa5e1a","competitor-user","Tomáš","Doubek","","","","Bratislava","0","","Doubek","","thomas.doubek@gmail.com","","0904700823","84101","0","0","0","0","2018-10-17 17:32:10","0000-00-00 00:00:00","0000-00-00 00:00:00","1","0","0","","sdfdsf","http://zsk-pompocz.localhost/dnt3/dnt-view/data/external-uploads/spravy-landing.jpg","1","0","::1","0"),
(null,"72100","39","5bc75604cf0a0","competitor-user","Tomáš","Doubek","","","","Bratislava","0","","Doubek","","thomas.doubek@gmail.com","","0904700823","84101","0","0","0","0","2018-10-17 17:32:20","0000-00-00 00:00:00","0000-00-00 00:00:00","1","0","0","","sdfdsf","http://zsk-pompocz.localhost/dnt3/dnt-view/data/external-uploads/spravy-landing_1.jpg","1","0","::1","0");




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
) ENGINE=MyISAM AUTO_INCREMENT=3750 DEFAULT CHARSET=utf8;


INSERT INTO dnt_settings VALUES
(null,"1278","","cachovanie","0","content","Cahovanie webu na frontende v minutách","39","70","0"),
(null,"1280","","startovaci_modul","intro","content","Po načítaní webu redirectovať na:","39","50","0"),
(null,"1292","vendor","vendor_street","","content","Ulica","39","0","0"),
(null,"1293","vendor","vendor_company","Team 4 Tourism","content","Názov firmy","39","0","0"),
(null,"1313","social","google_map","https://www.google.sk/maps/@48.2091661,17.0034239,13z?hl=sk","content","Google Mapy","39","0","1"),
(null,"1311","","default_lang","","content","Jayzk","39","0","1"),
(null,"1310","default_images","no_user","","image","Defaulntý obrázok pre používateľa","39","0","0"),
(null,"1309","default_images","no_img","259","image","Defaulntý obrázok na webe","39","0","0"),
(null,"1308","logo","logo_firmy","1732","image","Logo firmy 1","39","10","1"),
(null,"1307","vendor","vendor_currency_nazov","Eur","content","Platobná mena slovom","39","0","0"),
(null,"1306","vendor","platca_dph","1","content","Platca DPH","39","0","0"),
(null,"1305","custom","instagram","https://www.instagram.com/gczellamsee/?hl=de","content","Instagram","39","0","1"),
(null,"1303","vendor","vendor_currency","€","content","Platobná mena znak","39","0","0"),
(null,"1300","vendor","vendor_dic","","content","DIČ","39","0","0"),
(null,"1301","vendor","vendor_iban","","content","IBAN","39","0","0"),
(null,"1302","vendor","vendor_dph","20","content","DPH (%)","39","0","0"),
(null,"1299","vendor","vendor_ico","","content","IČO","39","0","0"),
(null,"1295","vendor","vendor_city","Bratislava","content","Mesto","39","0","0"),
(null,"1296","vendor","vendor_tel","","content","Telefónne číslo","39","0","0"),
(null,"1297","vendor","vendor_fax","","content","Fax","39","0","0"),
(null,"1298","vendor","vendor_email","jozef.fabian@team4tourism.at","content","Email","39","0","0"),
(null,"1294","vendor","vendor_psc","","content","PSČ","39","0","0"),
(null,"3092","logo","logo_url_3","","content","Odkaz na logo firmy 3","39","31","0"),
(null,"1725","default_images","favicon","1715","image","Favicon","39","0","1"),
(null,"1726","extends","color","#4d71ae","color","Farba","39","10","1"),
(null,"1729","extends","font","EMPTY","font","Font","39","30","1"),
(null,"1730","social","youtube_video","https://www.youtube.com/watch?v=Hlq5gMC-1is","content","Youtube video","39","0","1"),
(null,"1734","social","google_plus","https://plus.google.com/","content","Google Plus","39","0","1"),
(null,"1735","extends","impressum","https://www.golfprofi.cz/103-obchodni-podminky.html","content","Impressum","39","40","1"),
(null,"1736","extends","footer_color","#800040","color","Farba Footra","39","20","1"),
(null,"1739","keys","pixel_retargeting","EMPTY","content","Pixel Retargeting","39","60","0"),
(null,"3083","logo","logo_firmy_3","1731","image","Logo firmy 3","39","30","0"),
(null,"3084","logo","logo_url","http://www.golfprofi.cz/","content","Odkaz na logo firmy 1","39","11","1"),
(null,"3090","logo","logo_url_2","https://www.zellamsee-kaprun.com/sk","content","Odkaz na logo firmy 2","39","21","1"),
(null,"1432","keys","msg_hub_verify_token","TOKEN_dnt_bot_partak_2016_heroku","content","Messenger Bot - verifikačný token","39","0","0"),
(null,"1433","keys","msg_access_token","EAAZAep9FZCRqUBANOenKZCRAUcyUOhbfKHOWJ5ci35AyGdIcUrQsHGZCZA9ycIASGmZCEwhjLqKyF98ViEErTtcrKn5GbB2UfLkBtJMLrbT5Cnzi3YFVsLV4g298yE1xoS1Lzq0FWmCmz234MboDFYKjcc2p1tYhmO2Oaokj44ZBAZDZD","content","Messenger Bot - prístupvý token","39","0","0"),
(null,"1277","default","keywords","ZSK, Pomposoutez , sutaz , gewinnspiel ,  competition , vyhrat , vyhrajte , spielen , gewinnen , winn","content","Kľúčové slová","39","30","1"),
(null,"1276","default","title","ZSK Pompo","content","Názov webu","39","10","1"),
(null,"1282","social","facebook_page","https://www.facebook.com/golfprofi.cz","content","Facebook Page","39","0","1"),
(null,"1283","social","twitter","https://twitter.com/zellkaprun","content","Twitter","39","0","1"),
(null,"1284","social","youtube_channel","https://www.youtube.com/channel/UCucyYBZK92N79N1xT1hlEXQ","content","Youtube Kanál","39","0","1"),
(null,"1285","social","flickr","https://www.flickr.com/","content","Flickr","39","0","0"),
(null,"1286","social","linked_in","https://www.linkedin.com/","content","Linked In","39","0","1"),
(null,"3082","logo","logo_firmy_2","1734","image","Logo firmy 2","39","20","1"),
(null,"1289","","sirka_fotky_sponzori_modul","200","content","","39","0","0"),
(null,"1290","default","notifikacny_email","jozef.fabian@team4tourism.at","content","Notifikačný email","39","0","1"),
(null,"1291","","blokvane_ip","","content","","39","0","0"),
(null,"1314","default","description","ZSK Pompo promo web ","content","Description webu","39","20","1"),
(null,"3097","default","language","sk","content","Jayzková mutácia na webe","39","60","1"),
(null,"3095","keys","gc_secret_key","6LeFPlYUAAAAAJQXDhIIIWeTcS9ptHy89ddGu0N2","text","Google Captcha Secret key","39","0","1"),
(null,"3093","keys","gc_site_key","6LeFPlYUAAAAAGwI3mM7loYDQeP5SGZV8zZv_gD0","text","Google Captcha Site key","39","0","1"),
(null,"1741","extends","data_protection","https://www.golfprofi.cz/103-obchodni-podminky.html","content","Data Protection","39","50","1"),
(null,"1740","keys","ga_key","EMPTY","content","Google Analytics key","39","0","0"),
(null,"3262","","still_redirect_to_domain","","bool","Vždy presmerovať web na reálnu url adresu, a to aj vtedy, ak sa nachádza v testovacom móde.","39","0","1");




CREATE TABLE IF NOT EXISTS `dnt_translates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_entity` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `lang_id` varchar(100) NOT NULL,
  `translate_id` varchar(300) NOT NULL,
  `type` varchar(300) NOT NULL,
  `table` varchar(300) NOT NULL,
  `translate` text NOT NULL,
  `show` int(11) NOT NULL DEFAULT '1',
  `parent_id` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=113674 DEFAULT CHARSET=utf8;


INSERT INTO dnt_translates VALUES
(null,"112909","39","en","13573","name","dnt_posts","","1","0"),
(null,"112910","39","en","13573","name_url","dnt_posts","","1","0"),
(null,"112911","39","en","13573","perex","dnt_posts","","1","0"),
(null,"112912","39","en","13573","content","dnt_posts","","1","0"),
(null,"112913","39","en","13573","tags","dnt_posts","","1","0"),
(null,"112914","39","de","13573","name","dnt_posts","","1","0"),
(null,"112915","39","de","13573","name_url","dnt_posts","","1","0"),
(null,"112916","39","de","13573","perex","dnt_posts","","1","0"),
(null,"112917","39","de","13573","content","dnt_posts","","1","0"),
(null,"112918","39","de","13573","tags","dnt_posts","","1","0"),
(null,"112939","39","en","13352","name","dnt_posts","","1","0"),
(null,"112940","39","en","13352","name_url","dnt_posts","","1","0"),
(null,"112941","39","en","13352","perex","dnt_posts","","1","0"),
(null,"112942","39","en","13352","content","dnt_posts","","1","0"),
(null,"112943","39","en","13352","tags","dnt_posts","","1","0"),
(null,"112944","39","de","13352","name","dnt_posts","","1","0"),
(null,"112945","39","de","13352","name_url","dnt_posts","","1","0"),
(null,"112946","39","de","13352","perex","dnt_posts","","1","0"),
(null,"112947","39","de","13352","content","dnt_posts","","1","0"),
(null,"112948","39","de","13352","tags","dnt_posts","","1","0"),
(null,"112993","39","sk","domov","static","","Domov","1","0"),
(null,"112997","39","de","registracia","static","","","1","0"),
(null,"113007","39","en","registracia","static","","Res","1","0"),
(null,"113018","39","sk","registracia","static","","Registrace","1","0"),
(null,"113020","39","sk","impressum","static","","Impressum","1","0"),
(null,"113022","39","sk","data_protection","static","","Data Protection","1","0"),
(null,"113025","39","sk","footer_signature","static","","All Rights Reserved &copy;","1","0"),
(null,"113027","39","sk","field_word_err","static","","Toto pole je povinné","1","0"),
(null,"113029","39","sk","suhlas_s_podmienkami_1","static","","Souhlasím s pravidly soutěže (PRAVIDLA ZDE).","1","0"),
(null,"113031","39","sk","dakujeme_za_registraciu","static","","Děkujeme za Vaši účast a přejeme Vám hodně štěstí v soutěži!","1","0"),
(null,"113033","39","sk","nova_registracia","static","","Pokud máte další doklad o nákupu můžete přejít k nové registraci ZDE.","1","0"),
(null,"113035","39","sk","suhlas_s_newslettrom_1","static","","Súhlasím so zasielaním newslettrov 1","1","0"),
(null,"113038","39","sk","suhlas_s_newslettrom_2","static","","Súhlasím so zasielaním newslettrov 2","1","0"),
(null,"113041","39","sk","text_newsletter_embed_1","static","","Odkaz na tento externý newsletter 1","1","0"),
(null,"113043","39","sk","text_newsletter_embed_2","static","","Odkaz na tento externý newsletter 2","1","0"),
(null,"113045","39","sk","text_newsletter_embed_3","static","","Odkaz na tento externý newsletter 3","1","0"),
(null,"113047","39","sk","captcha","static","","Captcha","1","0"),
(null,"113049","39","sk","odoslat_btn","static","","Odoslať","1","0"),
(null,"113051","39","sk","next","static","","Ďalšia","1","0"),
(null,"113053","39","sk","previous","static","","Predošlá","1","0"),
(null,"113237","39","sk","nova_registracia","static","","Pokud máte další doklad o nákupu můžete přejít k nové registraci ZDE. / Pokiaľ máte ďaľší doklad o nákupe môžete pokračovť v novej registrácii TU.","1","0"),
(null,"113238","39","sk","thankyou_for_registration","static","","Děkujeme za Vaši registraci a přejeme Vám hodně štěstí v soutěži!","1","0"),
(null,"113303","39","sk","text_to_search","static","","Zadajte text pre vyhľadávanie","1","0");




CREATE TABLE IF NOT EXISTS `dnt_uploads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_entity` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `name` varchar(300) CHARACTER SET utf8 NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `type` varchar(300) CHARACTER SET utf8 NOT NULL,
  `show` int(11) NOT NULL DEFAULT '1',
  `parent_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2048 DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;


INSERT INTO dnt_uploads VALUES
(null,"1747","39","img4_600x350.jpg","2018-10-11 00:26:57","image/jpeg","1","0"),
(null,"1745","39","img2_600x350.jpg","2018-10-11 00:26:57","image/jpeg","1","0"),
(null,"1746","39","img3_600x350.jpg","2018-10-11 00:26:57","image/jpeg","1","0"),
(null,"1744","39","img1_600x350.jpg","2018-10-11 00:26:57","image/jpeg","1","0"),
(null,"1743","39","9713_Barbarahof-foto1.jpg","2018-10-09 21:37:33","image/jpeg","1","0"),
(null,"1740","39","1176_Alpenblick-foto1.jpg","2018-10-09 21:37:33","image/jpeg","1","0"),
(null,"1741","39","3446_Barbarahof-foto2.jpg","2018-10-09 21:37:33","image/jpeg","1","0"),
(null,"1742","39","9616_img2_1350x600pix_1.jpg","2018-10-09 21:37:33","image/jpeg","1","0"),
(null,"1715","39","favicon.ico","2018-09-30 12:09:31","image/x-icon","1","0"),
(null,"1737","39","white_background_1.jpg","2018-10-07 13:17:00","image/jpeg","1","0"),
(null,"1734","39","ZSK-Golf_logo.png","2018-09-30 13:08:56","image/png","1","0"),
(null,"1735","39","img1_1350x600pix_1.jpg","2018-10-04 15:54:02","image/jpeg","1","0"),
(null,"1736","39","white_background.jpg","2018-10-04 16:03:48","image/jpeg","1","0"),
(null,"1778","39","imgISP_600x350.jpg","2018-10-15 20:31:30","image/jpeg","1","0"),
(null,"1753","39","img3_600x350_2.jpg","2018-10-14 14:10:52","image/jpeg","1","0"),
(null,"1752","39","img7_600x350_1.jpg","2018-10-14 14:10:52","image/jpeg","1","0"),
(null,"1751","39","img3_600x350_1.jpg","2018-10-14 14:10:52","image/jpeg","1","0"),
(null,"1750","39","img6_600x350_1.jpg","2018-10-14 14:10:52","image/jpeg","1","0"),
(null,"1749","39","img7_600x350.jpg","2018-10-11 00:26:57","image/jpeg","1","0"),
(null,"1748","39","img6_600x350.jpg","2018-10-11 00:26:57","image/jpeg","1","0"),
(null,"1732","39","GP-logo-min_1.png","2018-09-30 12:37:24","image/png","1","0"),
(null,"1738","39","7484_male-karpaty_59d50d65d0ea5.jpg","2018-10-08 15:23:53","image/jpeg","1","0"),
(null,"1739","39","1139_Alpenblick-foto2.jpg","2018-10-09 21:37:33","image/jpeg","1","0"),
(null,"1712","39","img1_1350x600pix.jpg","2018-09-30 09:33:50","image/jpeg","1","0"),
(null,"1711","39","9616_img2_1350x600pix.jpg","2018-09-30 09:33:27","image/jpeg","1","0");




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
  `kliknute` int(11) NOT NULL DEFAULT '0',
  `ip_adresa` varchar(300) NOT NULL,
  `parent_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=138 DEFAULT CHARSET=utf8;


INSERT INTO dnt_users VALUES
(null,"97","39","","admin","Tomáš","Doubek","osmos","","","","0","","","b69a84481c97f320c80020b01d5620b5","thomas.doubek@gmail.com","","","","0","0","0","0","0000-00-00 00:00:00","0000-00-00 00:00:00","0000-00-00 00:00:00","","","0","","","1692","1","0","","0"),
(null,"20","39","","admin","Admin","Root","skeleton","","","","0","","","21232f297a57a5a743894a0e4a801fc3","admin@root.sk","","","","0","0","0","0","0000-00-00 00:00:00","0000-00-00 00:00:00","0000-00-00 00:00:00","","","0","","","1739","1","0","","0");




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
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;





INSERT INTO dnt_vendors VALUES
(39,"39","ZSK - PompoCZ","zsk-pompocz","http://test.tomas.localhost/dnt3/","1","wp_tpl_1","0","0","1");