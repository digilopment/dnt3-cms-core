

CREATE TABLE `dnt_admin_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
) ENGINE=InnoDB AUTO_INCREMENT=927 DEFAULT CHARSET=utf8;


INSERT INTO dnt_admin_menu VALUES
("566","1","menu",""," fa-gears","20","Nastavenia","settings","settings","1","0"),
("567","1","menu","post","fa-laptop","30","Obsah","content","content&incuded=post","1","0"),
("568","1","submenu","","fa-plus","1","Pridať post","content","content&add","1","0"),
("569","1","submenu","","","6","Bleskovky","content&filter=bleskovky","content","1","0"),
("570","1","menu","","fa-user","40","Prístupy","access","access","1","0"),
("571","1","submenu","","","5","Články","content","content&filter=articles","1","0"),
("572","1","submenu","","","3","Stránky","content","content&filter=pages","1","0"),
("573","1","menu","","fa fa-home","10","Domov","home","","1","0"),
("574","1","menu","","","70","Faktúry","faktura","","0","0"),
("575","1","menu","","fa-envelope","80","Mailer","mailer","mailer","1","0"),
("576","1","submenu","","","5","Všetky prístupy","pristupy","pristupy","1","0"),
("577","1","submenu","","fa-plus","0","Pridať prístup","pristupy","pristupy&pridat","1","0"),
("578","1","submenu","","","4","Podstránky","content","content&filter=pages-sub","1","0"),
("579","1","submenu","","fa-plus","2","Pridať podstránku","content","content&add=pages-sub","1","0"),
("580","1","submenu","","","7","Statický obsah","content","content&filter=static","1","0"),
("582","1","submenu","","","7","Sponzori","content","content&filter=sponzori","1","0"),
("583","1","submenu","","","8","Partneri","content","content&filter=partneri","1","0"),
("584","1","menu","","fa-user","23","Multylanguage","multylanguage","","1","0"),
("585","1","submenu","","","23","Aktívne jazyky","multylanguage","multylanguage&add","1","0"),
("586","1","submenu","","","22","Zoznam prekladov","multylanguage","multylanguage&action=translates","1","0"),
("587","1","menu","sitemap"," fa-gears","30","Sitemap","content","content&incuded=sitemap","1","0"),
("588","1","menu","article","fa-laptop","30","Články","content","content&incuded=article","1","0"),
("589","1","menu","","fa-user","23","Kvízy","polls","polls","1","0"),
("590","1","submenu","","","23","Pridať kvíz","polls","polls&action=add_poll","1","0"),
("591","1","submenu","","","23","Zoznam kvízov","polls","polls","1","0"),
("592","1","menu",""," fa-gears","20","Súbory","files","files","1","0"),
("646","1","menu",""," fa-gears","20","Microweb","microweb","microweb","1","0"),
("647","1","submenu",""," fa-gears","20","Zoznam","microweb","microweb","1","0"),
("648","1","submenu",""," fa-gears","20","Pridať","microweb","microweb&action=add","1","0"),
("702","1","menu",""," fa-gears","20","Messenger","messenger","messenger","1","0"),
("759","1","menu","","fa-globe","23","Zoznam webov","vendor","","1","0"),
("760","1","submenu","","","22","Zoznam","vendor","vendor","1","0"),
("761","1","submenu","","","22","Pridať web","vendor","vendor&action=add","1","0");




CREATE TABLE `dnt_api` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vendor_id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `name_url` varchar(300) NOT NULL,
  `query` varchar(300) NOT NULL,
  `parent_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1048 DEFAULT CHARSET=utf8;


INSERT INTO dnt_api VALUES
("1028","1","Test Query","JajsZ5s4","SELECT * FROM dnt_post_type LIMIT 3","0"),
("1029","1","Test Query","JajsZ5s4","SELECT * FROM dnt_post_type LIMIT 3","0");




CREATE TABLE `dnt_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vendor_id` int(11) NOT NULL,
  `key` varchar(1000) NOT NULL,
  `value` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;


INSERT INTO dnt_config VALUES
("25","1","default_lang","sk"),
("26","1","default_modul","homepage");




CREATE TABLE `dnt_languages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vendor_id` int(11) NOT NULL,
  `slug` varchar(300) NOT NULL,
  `name` varchar(300) NOT NULL,
  `home_lang` int(11) NOT NULL DEFAULT '0',
  `show` int(11) NOT NULL,
  `img` varchar(300) NOT NULL,
  `parent_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=utf8;


INSERT INTO dnt_languages VALUES
("49","1","sk","Slovenský","1","1","flag_sk.jpg","0"),
("50","1","en","English","0","1","flag_en.jpg","0"),
("51","1","de","German\n","0","1","flag_de.jpg","0");




CREATE TABLE `dnt_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
) ENGINE=InnoDB AUTO_INCREMENT=10394 DEFAULT CHARSET=utf8;


INSERT INTO dnt_logs VALUES
("1","200","log","","2017-04-09 10:15:19","1","Default Log","","http://localhost/dnt3/","localhost","keep-alive","Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36","text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8","","gzip, deflate, sdch, br","sk-SK,sk;q=0.8,cs;q=0.6,en-US;q=0.4,en;q=0.2","","","C:Program Files (x86)NVIDIA CorporationPhysXCommon;C:Windowssystem32;C:Windows;C:WindowsSystem32Wbem;C:WindowsSystem32WindowsPowerShellv1.0;C:Program Files (x86)ATI TechnologiesATI.ACECore-Static;C:Program FilesWIDCOMMBluetooth Software;C:Program FilesWIDCOMMBluetooth Softwaresyswow64;C:Program File","C:Windows","C:Windowssystem32cmd.exe",".COM;.EXE;.BAT;.CMD;.VBS;.VBE;.JS;.JSE;.WSF;.WSH;.MSC","C:Windows","<address>Apache/2.4.7 (Win32) OpenSSL/1.0.1e PHP/5.5.9 Server at localhost Port 80</address>\n","Apache/2.4.7 (Win32) OpenSSL/1.0.1e PHP/5.5.9","localhost","::1","80","::1","C:/xampp/htdocs","postmaster@localhost","C:/xampp/htdocs/dnt3/index.php","62361","CGI/1.1","HTTP/1.1","GET","","","/dnt3/","/dnt3/index.php","/dnt3/index.php","1483865562","0");




CREATE TABLE `dnt_mailer_mails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vendor_id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `surname` varchar(300) NOT NULL,
  `cat_id` varchar(300) CHARACTER SET armscii8 NOT NULL,
  `email` varchar(300) NOT NULL,
  `datetime_creat` datetime NOT NULL,
  `datetime_update` datetime NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;






CREATE TABLE `dnt_mailer_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vendor_id` int(11) NOT NULL,
  `cat_id` varchar(300) NOT NULL,
  `name_url` varchar(300) NOT NULL,
  `name` varchar(300) NOT NULL,
  `show` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8;






CREATE TABLE `dnt_microsites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;


INSERT INTO dnt_microsites VALUES
("1","1","zsk-pompocz-05-2016","","0","1","ZSK - PompoCZ","c4ca4238a0b923820dcc509a6f75849b","24","4","2016","0"),
("2","1","ZSK-JohnHarrisAT-06-2016","","0","1","ZSK-JohnHarrisAT-06-2016","c81e728d9d4c2f636f067f89cc14862c","25","5","2016","0"),
("3","1","ATS-IntersportVoswinkelDE-06-2016","http://alpenregion-intersport.eu/","0","1","ATS-IntersportVoswinkelDE-06-2016","eccbc87e4b5ce2fe28308fd9f2a7baf3","30","5","2016","0"),
("4","1","tza-kilpicz-06-2016","http://kilpi-zugspitzarena.eu/","0","1","TZA-KilpiCZ-06-2016","a87ff679a2f3e71d9181a67b7542122c","13","6","2016","0"),
("5","1","bth-bahlsenat-06-2016","http://bahlsen-ballonhotel.eu/","0","1","BTH-BahlsenAT-06-2016","e4da3b7fbbce2345d7772b0674a318d5","17","6","2016","0"),
("6","1","stm-leibnizat-08-2016","http://leibniz-steiermark.eu/","0","1","STM-LeibnizAT-08-2016","1679091c5a880faf6fb5e6087eb1b2dc","26","7","2016","0"),
("7","1","vif-intersportat-08-2016","http://region-villach-intersport.eu/","0","1","VIF-IntersportAT-08-2016","8f14e45fceea167a5a36dedd4bea2543","28","7","2016","0"),
("8","1","uboo-frechefreundede-08-2016","http://bauernhof-frechefreunde.eu/","0","1","UBOÖ-FrecheFreundeDE-08-2016","c9f0f895fb98ab9159f51fd0297e236d","7","8","2016","0"),
("9","1","fas-kornlandat-08-2016","http://kornland-sommerbergbahnen.eu/","0","1","FAS-KornlandAT-08-2016","45c48cce2e2d7fbdea1afc51c7c6ad26","15","8","2016","0"),
("10","1","sbg-morawaat-09-2016","http://morawa-salzburg.eu/","0","1","SBG-MorawaAT-09-2016","d3d9446802a44259755d38e6d163e820","20","8","2016","0"),
("11","1","sbg-corialcz-09-2016","","0","0","SBG-CorialCZ-09-2016","6512bd43d9caa6e02c990b0a82652dca","21","8","2016","0"),
("12","1","harz-fairtoysnl-09-2016","http://fairtoys-harz.eu/","0","1","HARZ-FairToysNL-09-2016","c20ad4d76fe97759aa27a0c99bff6710","6","9","2016","0"),
("13","1","sbg-crosscafecz-09-2016","","0","0","SBG-CrosscafeCZ-09-2016","c51ce410c124a10e0db5e4b97fc2af39","11","9","2016","0"),
("14","1","sdt-kilpicz-10-2016","","0","0","SDT-KilpiCZ-10-2016","aab3238922bcc25a6f606eb525ffdc56","11","10","2016","0"),
("15","1","pil-intersportvoswinkelde-10-2016","http://pillerseetal-intersport-voswinkel.eu/","0","1","PIL-INTERSPORTVoswinkelDE-10-2016","9bf31c7ff062936a96d3c8bd1f8f2ff3","12","10","2016","0"),
("16","1","zsk-j-lindeberg-10-2016","http://zellamsee-kaprun-jlindeberg.eu/","0","1","ZSK-J.LindebergCOM-10-2016","c74d97b01eae257e44aa9d5bade97baf","16","10","2016","0"),
("17","1","hiw-pp-herviscz-11-2016","http://hervis-topof.eu/","0","1","HIW-PP-HervisCZ-11-2016","70efdf2ec9b086079795c442636b55fb","23","10","2016","0"),
("18","1","sjo-bergsportschwandaat-11-2016","","0","1","SJO-BergsportSchwandaAT-11-2016","6f4922f45568161a8cdf4ad2299f6d23","24","10","2016","0"),
("19","1","nas-intersportvoswinkelde-12-2016","http://nassfeld-intersport-voswinkel.eu/","1","1","NAS-INTERSPORTVoswinkelDE-12-2016","1f0e3dad99908345f7439f8ffabdffc4","6","12","2016","0"),
("20","1","fla-intersportat-12-2016","http://flachau-intersport.eu/","1","1","FLA-IntersportAT-12-2016","98f13708210194c475687be6106a3b84","13","12","2016","0"),
("21","1","skiju-sportbittlde-01-2017","http://skijuwel-bittl.com/","1","1","SKIJU-SportBittlDE-01-2017","3c59dc048e8850243be8079a5c74d079","22","12","2016","0"),
("22","1","zsk-intersportsk-01-2017","","0","0","ZSK-IntersportSK-01-2017","b6d767d2f8ed5d21a44b0e5886680cb9","27","12","2016","0"),
("23","1","sbg-corialcz-sk-02-2017","http://corial-salzburg.eu/","1","1","SBG-CorialCZ-SK-02-2017","37693cfc748049e45d87b8c7d8b9aacd","13","2","2017","0"),
("24","1","fwi-intersportvoswinkelde-02-2017","http://winterberg-intersport-voswinkel.eu/","1","1","FWI-IntersportVoswinkelDE-02-2017","1ff1de774005f8da13f42943881c655f","21","2","2017","0"),
("25","1","sdt-kilpicz-03-2017","http://kilpi-schladming-dachstein.eu/","1","1","SDT-KilpiCZ-03-2017","8e296a067a37563370ded05f5a3bf3ec","6","3","2017","0"),
("26","1","sbg-neoluxorcz-03-2017","http://neoluxor-salzburg.eu/","1","1","SBG-NeoluxorCZ-03-2017","4e732ced3463d06de0ca9a15b6153677","10","3","2017","0"),
("27","1","stm-monkiparkat-03-2017","http://monkipark-steiermark.eu/","1","1","STM-MonkiParkAT-03-2017","02e74f10e0327ad868d138f2b4fdd6f0","11","3","2017","0"),
("28","1","zsk-pompocz-03-2017","http://zellamsee-kaprun-pompo.eu/","1","1","ZSK-PompoCZ-03-2017","33e75ff09dd601bbe69f351039152189","11","3","2017","0"),
("29","1","skg-northland-at-de-03-2017","http://salzkammergut-northland.eu/","1","1","SKG-Northland-AT-DE-03-2017","6ea9ab1baa0efb9e19094440c317e21b","19","3","2017","0"),
("30","1","sjo-bergsportschwandaat-03-2017","http://stjohann-schwanda.eu/","1","1","SJO-BergsportSchwandaAT-03-2017","34173cb38f07f89ddbebc2ac9128303f","27","3","2017","0"),
("31","1","isg-polomotorradat-03-2017","http://polo-motorrad-ischgl.com/","1","1","ISG-PoloMotorradAT-03-2017","c16a5320fa475530d9583c34fd356ef5","28","3","2017","0"),
("32","1","zsk-johnharrisat-03-2017","http://zellamsee-kaprun-johnharris.eu/","1","1","ZSK-JohnHarrisAT-03-2017","6364d3f0f495b6ab9dcf8d3b5c6e0b01","28","3","2017","0"),
("33","1","zsk-intersportvoswinkelde-03-2017","http://zellamsee-kaprun-intersport-voswinkel.eu/","1","1","ZSK-IntersportVoswinkelDE-03-2017","182be0c5cdcd5072bb1864cdee4d3d6e","30","3","2017","0"),
("34","1","sdt-meridabikecz-04-2017","http://merida-schladming-dachstein.eu/","1","1","SDT-MeridabikeCZ-04-2017","e369853df766fa44e1ed0ff613f563bd","3","4","2017","0"),
("35","1","inn-evocsportsde-04-2017","http://evoc-bikecity-innsbruck.com/","1","1","INN-EVOCsportsDE-04-2017","1c383cd30b7c298ab50293adfecb7b18","3","4","2017","0"),
("36","1","zsk-intersportsk-04-2017","http://zellamsee-kaprun-intersport.eu/","1","1","ZSK-IntersportSK-04-2017","19ca14e7ea6328a42e0eb13d585e4c22","9","4","2017","0"),
("37","1","sdt-golfproficz-04-2017","http://golfprofi-schladming-dachstein.eu/","1","1","SDT-GolfprofiCZ-04-2017","a5bfc9e07964f8dddeb95fc584cd965d","11","4","2017","0"),
("38","1","sbg-crosscafecz-04-2017","http://crosscafe-salzburg.eu/","1","1","SBG-CrosscafeCZ-04-2017","a5771bce93e200c36f7cd9dfd0e5deaa","11","4","2017","0"),
("39","1","sssu-ktm-bikesat-04-2017","http://ktm-bikes-suedtirols-sueden.com/","1","1","SSSU-KTM-BikesAT-04-2017","d67d8ab4f4c10bf22aa353e27879133c","16","4","2017","0"),
("40","1","saa-j-lindebergcom-04-2017","http://saalfelden-leogang-jlindeberg.eu/","1","1","SAA-J.LindebergCOM-04-2017","d645920e395fedad7bbbed0eca3fe2e0","25","4","2017","0");




CREATE TABLE `dnt_microsites_composer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
) ENGINE=InnoDB AUTO_INCREMENT=5402 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;


INSERT INTO dnt_microsites_composer VALUES
("1","1","1","1","content","Template","layout","dnt_first","1","0","0"),
("2","1","1","15","content","Link partnera","link_partner","http://www.pompo.cz ","1","0","0"),
("3","1","1","3","content","Link regionu","link_region","http://www.zellamsee-kaprun.com","1","0","0"),
("4","1","1","1","content","Zobraziť na URL adrese","real_address","http://www.vyhrat.com/","1","0","0"),
("6","1","1","1","content","Facebook","social_fb","https://www.facebook.com/Pompo.hracky","1","0","0"),
("7","1","1","1","content","Twitter","social_twitter","https://twitter.com/","0","0","0"),
("8","1","1","1","content","Instagram","social_linked_in","https://www.linkedin.com/","0","0","0"),
("9","1","1","1","content","Mapa ","map_location","https://www.google.sk/maps/place/Zell+am+See-Kaprun+Tourismus+GmbH/@47.3221006,12.7943083,17z/data=!3m1!4b1!4m2!3m1!1s0x47771cdf4f490061:0xba82c342ef002324","1","0","0"),
("10","1","1","1","image","Favicon","favicon","619","1","0","0"),
("11","1","1","1","content","Model farby R","_r","75","1","0","0"),
("12","1","1","1","content","Model farby G","_g","115","1","0","0"),
("13","1","1","1","content","Model farby B","_b","175","1","0","0"),
("14","1","1","1","content","Font","_font","Georgia","1","0","0"),
("15","1","1","2","content","Názov hotelu 1","info_hotel_name_1","Familotel - amiamo","1","0","0"),
("16","1","1","2","content","Adresa Hotela 1","info_hotel_addr_1","Salzachtal Bundesstrasse 20   <br/>   A - 5700 Zell am See","1","0","0"),
("17","1","1","2","content","Telefón do hotela 1","info_hotel_tel_c_1","+43 6542 55355","1","0","0"),
("18","1","1","2","content","Email hotelu 1","info_hotel_email_1","hotel@amiamo.at","1","0","0"),
("19","1","1","3","content","Názov regiónu","info_region_name","Zell am See-Kaprun Tourismus","1","0","0"),
("20","1","1","3","content","Adresa regiónu","info_region_addr","Brucker Bundesstr. 1a  <br/>  A-5700 Zell am See","1","0","0"),
("21","1","1","3","content","Telefónne číslo regiónu","info_region_tel_c","+43 6542 770","1","0","0"),
("22","1","1","3","content","Email regiónu","info_region_email","welcome@zellamsee-kaprun.com","1","0","0"),
("23","1","1","1","content","Youtube video","youtube_video","U3WaV52UqDM","1","0","0"),
("24","1","1","15","image","Logo partnera","partner_logo","39","1","0","0"),
("25","1","1","3","image","Logo regiónu","region_logo","3","1","0","0"),
("26","1","1","5","image","Fotka v hlavnom slideri 1","_menu_1_image_1","29","1","0","0"),
("27","1","1","7","image","Fotka modulu pre modul GALÉRIA","_menu_3_image_1","30","1","0","0"),
("28","1","1","7","image","Druhá fotka modulu pre modul GALÉRIA","_menu_3_image_2","31","1","0","0"),
("29","1","1","2","image","Fotka k modulu UBYTOVANIE","_menu_7_image_1_1","384","1","0","0"),
("31","1","1","5","content","Názov modulu pre modul INFO","_menu_name_1","Intro","1","1","0"),
("32","1","1","6","content","Názov modulu pre modul O SÚŤAŽI","_menu_name_2","O soutěži","1","2","0"),
("33","1","1","7","content","Názov modulu pre modul GALÉRIU","_menu_name_3","Galérie","0","0","0"),
("34","1","1","8","content","Názov modulu pre modul FORMULÁRU","_menu_name_4","Registrace","1","3","0"),
("35","1","1","9","content","Názov modulu pre modul O REGIONE","_menu_name_5","O regionu","1","4","0"),
("36","1","1","10","content","Názov modulu pre modul MAPA","_menu_name_6","Mapa","0","0","0"),
("37","1","1","11","content","Názov modulu pre modul UBYTOVANIE","_menu_name_7","Ubytování","1","5","0"),
("38","1","1","5","content","Text k modulu INFO","_menu_1_text_1","<p><strong><span style=\"font-size:20px\">Soutež o 5 rodinn&yacute;ch letn&iacute;ch pobytů v Zell am See-Kaprun!</span></strong></p>\n","1","0","0"),
("39","1","1","6","content","Text k modulu O SÚŤAŽI","_menu_2_text_1","<h3><span style=\"font-size:16px\">Nakupujte v prodejn&aacute;ch POMPO a vyhrajte jeden z 5 letn&iacute;ch pobytů&nbsp;pro 4 člennou rodinu&nbsp;v rakousk&eacute;m regionu Zell am See-Kaprun, nebo jednu&nbsp;dětskou narozeninovou oslavu!</span></h3>\n\n<p>Stač&iacute; když v obdob&iacute; 13.05. - 31.07.&nbsp;2016 nakoup&iacute;te v prodejn&aacute;ch POMPO v ČR, nebo na E-shopu <a href=\"http://www.pompo.cz/\">www.pompo.cz</a>&nbsp;v min. hodnotě 499 Kč a&nbsp;zaregistrujete online svůj doklad o n&aacute;kupu dle podm&iacute;nek uveden&yacute;ch v pravidlech soutěže! Do soutěže se můžete zaregistrovat i v&iacute;cekr&aacute;t, pokud opakovaně nakoup&iacute;te v s&iacute;ti prodejen POMPO nebo na E-shopu. Doklad z n&aacute;kupu si uschovejte pro př&iacute;pad v&yacute;hry.</p>\n\n<p><strong>Soutěž prob&iacute;h&aacute; 13.05. - 31.07. 2016 na &uacute;zem&iacute; ČR. Přejeme V&aacute;m hodně &scaron;těst&iacute; při slosov&aacute;n&iacute;!</strong></p>\n\n<h3>V&yacute;hry v soutěži:</h3>\n\n<p><span style=\"font-size:14px\">5x rodinn&yacute; letn&iacute; pobyt pro 2 dospěl&eacute; a 2 děti, na 5 dn&iacute; / 4 noci ve 4* hotelu, včetně polopenze&nbsp;a animačn&iacute;ho programu pro děti, to v&scaron;e v rakousk&eacute;m regionu Zell am See-Kaprun!</span></p>\n\n<p><span style=\"font-size:14px\">1x dětsk&aacute; narozeninov&aacute; oslava s&nbsp;překvapen&iacute;m kter&aacute; zahrnuje zaji&scaron;těn&iacute; z&aacute;bavn&eacute;ho doprovodn&eacute;ho programu (klaun, malov&aacute;n&iacute; na obličej a&nbsp;dal&scaron;&iacute; překvapen&iacute; ) pro Va&scaron;i narozeninovou oslavu u&nbsp;V&aacute;s doma!</span></p>\n","1","0","0"),
("40","1","1","7","content","Text k modulu GALÉRIA","_menu_3_text_1","","1","0","0"),
("41","1","1","8","content","Text k modulu FORMULÁR","_menu_4_text_1","<p>Registračn&yacute;&nbsp;formul&aacute;r</p>\n","1","0","0"),
("42","1","1","9","content","Text k modulu O REGIÓNE","_menu_5_text_1","<h3>Ledovec, hory, jezero - L&eacute;to v Alp&aacute;ch.</h3>\n\n<p><br />\nLedovec, hory a jezero - rakousk&aacute; celoročn&iacute; destinace Zell am See-Kaprun kombinuje celou řadu možnost&iacute; v Alp&aacute;ch. V unik&aacute;tn&iacute;m př&iacute;rodn&iacute;m r&aacute;ji na okraji n&aacute;rodn&iacute;ho parku Vysok&eacute; Taury najdou sportovci, aktivn&iacute; rekreanti, rodiny a turist&eacute; touž&iacute;c&iacute; po zotaven&iacute; v l&eacute;tě i v zimě pestr&eacute; z&aacute;žitky. Mezi ně patř&iacute; Gipfelwelt 3.000 (Svět vrcholů 3.000) na Kitzsteinhornu, jedin&eacute; ledovcov&eacute; oblasti v r&aacute;mci Salcburska, rodinn&aacute; oblast Maiskogel i vrchol Schmittenh&ouml;he obl&iacute;ben&yacute; m&iacute;stn&iacute;mi obyvateli i kři&scaron;ť&aacute;lově čist&eacute; jezero Zeller See a v&iacute;cekr&aacute;t oceněn&eacute; 36-jamkov&eacute; golfov&eacute; hři&scaron;tě. Tradice a autenticita se odr&aacute;ž&iacute; v akc&iacute;ch a kulin&aacute;řsk&yacute;ch specialit&aacute;ch regionu. Host&eacute; mohou relaxovat v nově otevřen&eacute; l&aacute;zeňsk&eacute; o&aacute;ze TAUERN SPA a mnoha dal&scaron;&iacute;ch luxusn&iacute;ch hotelech v Zell am See-Kaprun.V&iacute;ce o regionu najdete na: <a href=\"http://www.zellamsee-kaprun.com/\">www.zellamsee-kaprun.com</a></p>\n","1","0","0"),
("43","1","1","9","content","Ďalší text k modulu O REGIÓNE","_menu_5_text_2","<h3>Zell am See-Kaprun</h3>\n\n<ul>\n	<li>400 kilometrů turistick&yacute;ch tras</li>\n	<li>100 tras přes sk&aacute;ly a lezeck&eacute; lanov&eacute; centrum</li>\n	<li>nov&yacute; &quot;Run &amp; Walk&quot; park pro běžce a chodce</li>\n	<li>240 kilometrov&aacute; s&iacute;ť cyklostezek</li>\n	<li>3 ofici&aacute;ln&iacute; trasy pro freeridery na Kitzsteinhornu</li>\n	<li>vodn&iacute; lyžov&aacute;n&iacute; a surfov&aacute;n&iacute; na jezeře Zeller See</li>\n	<li>rafting a canyoning na řek&aacute;ch Salzach a Saalach</li>\n	<li>3 pl&aacute;žov&eacute; letovi&scaron;tě kolem jezera Zeller See</li>\n	<li>36 nejkr&aacute;sněj&scaron;&iacute;ch golfov&yacute;ch greenů v Alp&aacute;ch</li>\n	<li>1300 metrů dlouh&aacute; bobov&aacute; dr&aacute;ha na vrcholu Maiskogel</li>\n	<li>z&aacute;věsn&eacute; l&eacute;t&aacute;n&iacute;, seskok pad&aacute;kem nebo z vrcholů Schmittenh&ouml;he a Kitzsteinhorn</li>\n</ul>\n","1","0","0"),
("44","1","1","10","content","Text k modulu MAPA","_menu_6_text_1","<p>Mapa regionu</p>\n","1","0","0"),
("45","1","1","2","content","Text k modulu UBYTOVANIE 1","_menu_7_text_1","<p><strong>amiamo - Familotel Zell am See</strong></p>\n\n<p>Jako prvn&iacute; boutique hotel pro rodiny&nbsp;s dětmi jsme stanovili standardy pro&nbsp;v&yacute;jimečn&eacute; z&aacute;žitky z dovolen&eacute;: mal&yacute;,&nbsp;vybran&yacute; a individu&aacute;ln&iacute;, vyznamenan&yacute;&nbsp;nejvy&scaron;&scaron;&iacute; pečet&iacute; jakosti Q III. Luxusn&iacute;&nbsp;penzion Amiamo v kombinaci s&nbsp;kartou Zell am See-Kaprun zaručuje&nbsp;odpočinkovou, ale i vzru&scaron;uj&iacute;c&iacute;&nbsp;dovolenou pro celou rodinu. S v&iacute;ce&nbsp;než 20-ti letou zku&scaron;enost&iacute; nab&iacute;z&iacute;me&nbsp;<br />\nhl&iacute;d&aacute;n&iacute; dět&iacute; v vnitřn&iacute; sekci o plo&scaron;e&nbsp;500 m&sup2; s velk&yacute;m množstv&iacute;m aktivit.&nbsp;</p>\n\n<p>NOVINKA:&nbsp;Sekce Wellness o plo&scaron;e 300 m&sup2;&nbsp;disponuje 3 baz&eacute;ny, Babynariem&nbsp;a kompletně zrekonstruovanou&nbsp;sekc&iacute; saun&nbsp;s relaxačn&iacute; m&iacute;stnost&iacute;.&nbsp;</p>\n\n<p>Na jezeře Zeller&nbsp;See&nbsp;V&aacute;s&nbsp;oček&aacute;v&aacute;&nbsp;hotelov&aacute; pl&aacute;ž s bohatou nab&iacute;dkou!</p>\n","1","0","0"),
("46","1","1","12","content","Input Meno","form_base_name","Jméno","1","0","0"),
("47","1","1","12","content","Input Priezvisko","form_base_surname","Příjmení","1","0","0"),
("48","1","1","12","content","Input PSČ","form_base_psc","PSČ","1","0","0"),
("49","1","1","12","content","Input Mesto","form_base_city","Město","1","0","0"),
("50","1","1","12","content","Input Email","form_base_email","Email","1","0","0"),
("51","1","1","12","content","Input Doklad","form_extend_v1_doklad","Doklad o Vašem nákupu: (unikátní číslo účtenky  nebo číslo faktury z E-shopu)","1","0","0"),
("52","1","1","12","content","Input otázka","form_extend_v2_otazka","Napíšte farbu vášho PC","0","0","0"),
("53","1","1","12","content","Input Otázka + odpovede","form_extend_v3_otazka","Je toto modré?","0","0","0"),
("54","1","1","12","content","Odpoveď A","form_extend_v3_odpoved_a","áno","0","0","0"),
("55","1","1","12","content","Odpoveď B","form_extend_v3_odpoved_b","neviem","0","0","0"),
("56","1","1","12","content","Odpoveď C","form_extend_v3_odpoved_c","možno","0","0","0"),
("57","1","1","4","content","Názov","field_word_nazov","Názov","0","0","0"),
("58","1","1","4","content","Adresa","field_word_adresa","Adresa","0","0","0"),
("59","1","1","4","content","Kontakt","field_word_kontakt","Kontakt","0","0","0"),
("60","1","1","4","content","Web","field_word_web","Web","0","0","0"),
("61","1","1","4","content","Hláška povinné pole","field_word_err","Toto pole je povinné","1","0","0"),
("62","1","1","4","content","Registrovať","field_word_sent","Registrovat","1","0","0"),
("63","1","1","4","content","Predchádzajúca (fotka)","field_word_previous","Predchádzajúca","1","0","0"),
("64","1","1","4","content","Ďalšia (fotka)","field_word_next","Ďalšia","1","0","0"),
("65","1","1","4","content","Súhlasím s newslettrom","field_word_suhlas_news","Mám zájem o zasílání aktuálních novinek o Zell am See-Kaprun (SOUHLAS ZDE).","1","0","0"),
("66","1","1","4","content","Súhlasím s podmienkami súťaže","field_word_suhlas_podm","Souhlasím s pravidly soutěže (PRAVIDLA ZDE).","1","0","0"),
("67","1","1","1","content","Kľúčové slová pre Google","keywords","soutěž Pompo Zell am See-Kaprun","1","0","0"),
("68","1","1","1","content","Popis pre Google","description","This competition has a first ID","1","0","0"),
("69","1","1","4","content","Súhlasím s podmienkami súťaže","field_word_dakujeme","Děkujeme za Vaši účast a přejeme Vám hodně štěstí v soutěži!","1","0","0"),
("70","1","1","12","image","Podmienky súťaže (PDF)","form_file_podmienky","67","1","0","0"),
("71","1","1","12","image","Newsletter (PDF)","form_file_newsletter","68","1","0","0"),
("74","1","1","4","content","Hláška možnosti novej registrácie","field_word_nova_registracia","Pokud máte další doklad o nákupu můžete přejít k nové registraci ZDE.","1","0","0"),
("75","1","1","13","content","Počet znakov vygenerovaného hashu","_email_conf_char","8","1","0","0"),
("76","1","1","13","content","Hláška, súťažiacemu ktorá mu príde na email po registracii.","_email_conf_sent_text","Děkujeme za registraci do soutěže a přejeme Vám hodně štěstí při slosování!","1","0","0"),
("77","1","1","12","content","Telefónne číslo","form_base_tel_c","Telefonní číslo","1","0","0"),
("287","1","1","4","content","Hláška za hviezdičkou o povinných poliach","field_word_povinne_polia","","1","0","0"),
("288","1","1","2","image","Fotka loga k modulu UBYTOVANIE","_menu_7_image_2_1","382","1","0","0"),
("289","1","1","16","content","Názov hotelu 2","info_hotel_name_2","Sporthotel Falkenstein","1","0","0"),
("290","1","1","16","content","Adresa Hotela 2","info_hotel_addr_2","Nikolaus-Gassner-Str. 79   <br/>   A - 5710 Kaprun","1","0","0"),
("291","1","1","16","content","Telefón do hotela 2","info_hotel_tel_c_2","+43 6547 7122","1","0","0"),
("292","1","1","16","content","Email hotelu 2","info_hotel_email_2","sporthotel@falkenstein.at","1","0","0"),
("293","1","1","16","content","Text k modulu UBYTOVANIE 2","_menu_7_text_2","<p><strong>Das Falkenstein</strong></p>\n\n<p>Tady v Kaprunu a hotelu Falkenstein lze objevit spoustu vzru&scaron;uj&iacute;c&iacute;ch možnost&iacute; a z&aacute;bavy&nbsp;pro rodiny a děti. Každ&yacute; den může b&yacute;t spojen s nov&yacute;mi z&aacute;žitky a dojmy, ať už jde&nbsp;o zvl&aacute;&scaron;tn&iacute; rodinn&eacute; turistick&eacute; v&yacute;lety, čvacht&aacute;n&iacute; a klouz&aacute;n&iacute; v Tauern SPA Kaprun, v&yacute;let&nbsp;k alpsk&eacute; horsk&eacute; bobov&eacute; dr&aacute;ze &quot;Maisfiltzer&quot;, o n&aacute;v&scaron;těvu volnočasov&eacute;ho nebo n&aacute;rodn&iacute;ho&nbsp;parku nebo o mnoh&aacute; dal&scaron;&iacute; dobrodružstv&iacute; - z&aacute;bavě se nekladou ž&aacute;dn&eacute; hranice.</p>\n\n<p>V hotelu Falkenstein&nbsp;se nach&aacute;z&iacute; kromě&nbsp;prostorn&eacute;ho&nbsp;dětsk&eacute;ho hři&scaron;tě&nbsp;a dětsk&eacute; herny tak&eacute;&nbsp;velk&yacute; baz&eacute;n a najdete&nbsp;zde i&nbsp;chutnou&nbsp;Pinzgauerskou&nbsp;kuchyni s pestr&yacute;mi&nbsp;dětsk&yacute;mi menu&nbsp;- n&aacute;&scaron; maskot Falki&nbsp;se na v&aacute;s tě&scaron;&iacute;!</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n","1","0","0"),
("294","1","1","17","content","Text k modulu UBYTOVANIE 3","_menu_7_text_3","<p><strong>Dovolen&aacute; v Zell am See je dovolenou s požitkem - v hotelu Tirolerhof!</strong></p>\n\n<p>Jezero, hory, ledovec a stylov&yacute;, rodinn&yacute; 4-hvězdičkov&yacute; hotel superior v Zell am See &ndash; to je ide&aacute;ln&iacute; kombinace pro va&scaron;i dovolenou v Zell am See, v l&eacute;tě i v zimě. Budete m&iacute;t v&yacute;hled na jezero Zeller See, hory Schmittenh&ouml;he a Kitzsteinhorn se v&scaron;emi rozmanit&yacute;mi sportovn&iacute;mi a rekreačn&iacute;mi možnostmi a budete h&yacute;čk&aacute;ni v b&aacute;ječn&eacute;m a mimoř&aacute;dn&eacute;m hotelu kulin&aacute;řsk&yacute;mi specialitami nejvy&scaron;&scaron;&iacute; kvality. Nebo str&aacute;v&iacute;te dovolenou spojenou s golfem v Salcburku, kde budete m&iacute;t v&yacute;hled na n&aacute;dhern&eacute; hory a jezero oblasti Zell am See-Kaprun. Nebo si užijete ve dvou n&aacute;dhern&eacute; apartm&aacute;ny v r&aacute;mci romantick&eacute; dovolen&eacute;. Nebo si poř&aacute;dně odpočinete s wellness a l&aacute;zeňskou nab&iacute;dkou vy&scaron;&scaron;&iacute; tř&iacute;dy a načerp&aacute;te novou energii. Takto může vypadat va&scaron;e dal&scaron;&iacute; rekreačn&iacute; dovolen&aacute; v hotelu Tirolerhof Zell am See - v srdci Salcburku. Wellness hotel, čtyřhvězdičkov&yacute; hotel superior, hotel pro hosty s pejsky, relaxačn&iacute; hotel - v&scaron;echny tyto př&iacute;vlastky si hotel Tirolerhof plně zaslouž&iacute;.</p>\n\n<p>&nbsp;</p>\n\n<p><strong>Prožijte nezapomenutelnou dovolenou v hotelu Tirolerhof!</strong></p>\n","0","0","0"),
("295","1","1","17","content","Email hotelu 3","info_hotel_email_3","welcome@tirolerhof.co.at","0","0","0"),
("296","1","1","17","content","Telefón do hotela 3","info_hotel_tel_c_3","+43(0)6542/772-0","0","0","0"),
("297","1","1","17","content","Adresa Hotela 3","info_hotel_addr_3","Auerspergstrasse 5   <br/>   A - 5700 Zell am See","0","0","0"),
("298","1","1","17","content","Názov hotelu 3","info_hotel_name_3","Hotel Tirolerhof ****S","0","0","0"),
("299","1","1","16","image","Fotka loga k modulu UBYTOVANIE 2","_menu_7_image_1_2","387","1","0","0"),
("301","1","1","16","image","Fotka k modulu UBYTOVANIE 2","_menu_7_image_2_2","388","1","0","0"),
("302","1","1","17","image","Fotka loga k modulu UBYTOVANIE 3","_menu_7_image_1_3","51","0","0","0"),
("303","1","1","17","image","Fotka k modulu UBYTOVANIE 3","_menu_7_image_2_3","56","0","0","0"),
("304","1","1","2","content","Url adresa hotela 1","link_hotel_1","https://www.amiamo.at","1","0","0"),
("305","1","1","16","content","Url adresa hotela 2","link_hotel_2","http://www.falkenstein.at","1","0","0"),
("306","1","1","17","content","Url adresa hotela 3","link_hotel_3","http://www.tirolerhof.co.at/","0","0","0"),
("307","1","1","9","image","Druhá fotka modulu pre modul GALÉRIA","_menu_5_gallery_1","8","1","0","0"),
("378","1","1","5","image","Fotka v hlavnom slideri 2","_menu_1_image_2","76","0","0","0"),
("379","1","1","4","content","Po ukončení registrácie","field_word_koniec_registracie","<p>SOUTĚŽ BYLA UKONČENA 1.8. 2016</p>\n\n<p>Slosov&aacute;n&iacute; bylo provedeno dne 5.8.&nbsp;2016&nbsp;dle pravidel soutěže.&nbsp;</p>\n\n<p><strong>1x rodinn&yacute; letn&iacute; pobyt, pro 2 dospěl&eacute; a 2 děti , na 5 dn&iacute; / 4 noci ve 4* hotelu, včetně polopenze a animačn&iacute;ho programu pro děti, to v&scaron;e v rakousk&eacute;m Zell am See-Kaprun, z&iacute;sk&aacute;vaj&iacute;:</strong></p>\n\n<p><strong>Petra Kuncova,&nbsp; 46804 Jablonec nad Nisou , ČR</strong></p>\n\n<p><strong>Alice Ertlbauerova,&nbsp; 62100 Brno, ČR</strong></p>\n\n<p><strong>Iveta Pohankova,&nbsp; 28002 Kol&iacute;n, ČR</strong></p>\n\n<p><strong>David Pravec,&nbsp; 53009 Pardubice, ČR</strong></p>\n\n<p><strong>Monika Adamusova,&nbsp; 58764 B&aacute;nov-Str&aacute;žky, ČR</strong></p>\n\n<p><strong>1x dětskou narozeninovou oslavu s překvapen&iacute;m kter&aacute; zahrnuje zaji&scaron;těn&iacute; z&aacute;bavn&eacute;ho doprovodn&eacute;ho programu (klaun, malov&aacute;n&iacute; na obličej a dal&scaron;&iacute; překvapen&iacute; ) pro Va&scaron;i narozeninovou oslavu u V&aacute;s doma, z&iacute;sk&aacute;v&aacute;:</strong></p>\n\n<p><strong>Vlasta Kozov&aacute;, 739 46 Hukvaldy, ČR</strong></p>\n\n<p>V&yacute;hern&iacute; vouchery budou vyercům odesl&aacute;ny mailem nebo po&scaron;tou v&nbsp;nejbliž&scaron;&iacute;ch dnech! Pobyty jsou kromě dopravy. Spr&aacute;vnost a platnost slosov&aacute;n&iacute; potvrzuj&iacute; provozovatel&eacute; soutěže.</p>\n\n<p><strong><u>V&yacute;hercům blahopřejeme a v&scaron;em ostatn&iacute;m děkujeme za &uacute;čast!</u></strong></p>\n\n<p><span style=\"font-size:12px\">Provozovatel&eacute; soutěže:&nbsp;Organiz&aacute;tor: Zell am See-Kaprun Tourismus GmbH, Brucker Bundesstr.1a, 5700 Zell am See, AT a spoluorganiz&aacute;tor : Pompo, spol. s r.o., Lidick&aacute; 481, 273 51&nbsp; Unho&scaron;ť, ČR</span></p>\n","0","0","0"),
("380","1","1","11","content","Názov modulu pre modul O PARTNEROVI","_menu_name_8","O Partnerovi","0","0","0"),
("381","1","1","15","content","Email partnera","info_partner_email","info.eshop@pompo.cz","1","0","0"),
("382","1","1","15","content","Adresa partnera","info_partner_addr","Lidická 481 <br/> 273 51 Unhošť","1","0","0"),
("383","1","1","15","content","Názov partnera","info_partner_name","Pompo spol. s r.o.","1","0","0"),
("384","1","1","15","content","Telefónne číslo na partnera","info_partner_tel_c","737 279 015","1","0","0");
INSERT INTO dnt_microsites_composer VALUES
("385","1","1","11","content","Text k modulu O PARTNEROVI 1","_menu_8_text_1","<p>Pompo - největ&scaron;&iacute; maloobchodn&iacute; s&iacute;ť prodejen hraček a internetov&yacute; obchod s hračkami</p>\n","0","0","0"),
("486","1","2","1","content","Template","layout","dnt_first","1","0","0"),
("487","1","2","15","content","Link partnera","link_partner","http://www.johnharris.at","1","0","0"),
("488","1","2","3","content","Link regionu","link_region","http://www.zellamsee-kaprun.com","1","0","0"),
("489","1","2","1","content","Zobraziť na URL adrese","real_address","http://www.vyhrat.com/","1","0","0"),
("490","1","2","1","content","Facebook","social_fb","https://www.facebook.com/JohnHarrisFitness","1","0","0"),
("491","1","2","1","content","Twitter","social_twitter","https://twitter.com/","0","0","0"),
("492","1","2","1","content","Instagram","social_linked_in","https://www.linkedin.com/","0","0","0"),
("493","1","2","1","content","Mapa ","map_location","https://www.google.sk/maps/place/Zell+am+See-Kaprun+Tourismus+GmbH/@47.3221006,12.7943083,17z/data=!3m1!4b1!4m2!3m1!1s0x47771cdf4f490061:0xba82c342ef002324","1","0","0"),
("494","1","2","1","image","Favicon","favicon","57","1","0","0"),
("495","1","2","1","content","Model farby R","_r","124","0","0","0"),
("496","1","2","1","content","Model farby G","_g","58","1","0","0"),
("497","1","2","1","content","Model farby B","_b","62","1","0","0"),
("498","1","2","1","content","Font","_font","Arial","1","0","0"),
("499","1","2","2","content","Názov hotelu 1","info_hotel_name_1","TAUERN SPA Zell am See-Kaprun","1","0","0"),
("500","1","2","2","content","Adresa Hotela 1","info_hotel_addr_1","Tauern Spa Platz 1   <br/>   A-5710 Kaprun","1","0","0"),
("501","1","2","2","content","Telefón do hotela 1","info_hotel_tel_c_1","+43 (0) 6547 2040-0","1","0","0"),
("502","1","2","2","content","Email hotelu 1","info_hotel_email_1","office@tauernspakaprun.com","1","0","0"),
("503","1","2","3","content","Názov regiónu","info_region_name","Zell am See-Kaprun Tourismus","1","0","0"),
("504","1","2","3","content","Adresa regiónu","info_region_addr","Brucker Bundesstr. 1a  <br/>  A-5700 Zell am See","1","0","0"),
("505","1","2","3","content","Telefónne číslo regiónu","info_region_tel_c","+43 6542 770","1","0","0"),
("506","1","2","3","content","Email regiónu","info_region_email","welcome@zellamsee-kaprun.com","1","0","0"),
("507","1","2","1","content","Youtube video","youtube_video","U3WaV52UqDM","1","0","0"),
("508","1","2","15","image","Logo partnera","partner_logo","81","1","0","0"),
("509","1","2","3","image","Logo regiónu","region_logo","80","1","0","0"),
("510","1","2","5","image","Fotka v hlavnom slideri 1","_menu_1_image_1","83","1","0","0"),
("511","1","2","7","image","Fotka modulu pre modul GALÉRIA","_menu_3_image_1","85","1","0","0"),
("512","1","2","7","image","Druhá fotka modulu pre modul GALÉRIA","_menu_3_image_2","31","1","0","0"),
("513","1","2","2","image","Fotka k modulu UBYTOVANIE","_menu_7_image_1_1","84","1","0","0"),
("514","1","2","5","content","Názov modulu pre modul INFO","_menu_name_1","Intro","1","0","0"),
("515","1","2","6","content","Názov modulu pre modul O SÚŤAŽI","_menu_name_2","Gewinnspiel","1","0","0"),
("516","1","2","7","content","Názov modulu pre modul GALÉRIU","_menu_name_3","Galérie","0","0","0"),
("517","1","2","8","content","Názov modulu pre modul FORMULÁRU","_menu_name_4","Teilnahme","1","0","0"),
("518","1","2","9","content","Názov modulu pre modul O REGIONE","_menu_name_5","Zell am See-Kaprun","1","0","0"),
("519","1","2","10","content","Názov modulu pre modul MAPA","_menu_name_6","Mapa","0","0","0"),
("520","1","2","11","content","Názov modulu pre modul UBYTOVANIE","_menu_name_7","TAUERN SPA","1","0","0"),
("521","1","2","5","content","Text k modulu INFO","_menu_1_text_1","<p><span style=\"color:#336699\"><strong><span style=\"font-size:26px\">Hol dir deinen Urlaub&nbsp;in der Region&nbsp;Zell am See-Kaprun!</span></strong></span></p>\n","1","0","0"),
("522","1","2","6","content","Text k modulu O SÚŤAŽI","_menu_2_text_1","<h3><span style=\"font-size:18px\">Wir verlosen&nbsp;Urlaube im&nbsp;TAUERN SPA&nbsp;Zell am See-Kaprun&nbsp;f&uuml;r 2 Personen&nbsp;&agrave; 2 N&auml;chte&nbsp;inkl. Halbpension!&nbsp;</span></h3>\n\n<h3><span style=\"font-size:18px\">Einfach Teilnahmeformular ausf&uuml;llen, Frage richtig beantworten, und ihr habt die Chance auf den tollen Urlaub.</span></h3>\n\n<h3><span style=\"font-size:16px\">Gewinnspiel l&auml;uft ab 1. Juni&nbsp;2016 bis 30. Juni 2016. Teilnahmeschluss ist der 30. Juni 2016.</span></h3>\n","1","0","0"),
("523","1","2","7","content","Text k modulu GALÉRIA","_menu_3_text_1","","1","0","0"),
("524","1","2","8","content","Text k modulu FORMULÁR","_menu_4_text_1","<p>Ihre Registrierung:</p>\n","1","0","0"),
("525","1","2","9","content","Text k modulu O REGIÓNE","_menu_5_text_1","<p><span style=\"font-size:16px\"><strong>Gletscher, Berge und See &ndash; Sommer in den Alpen</strong></span></p>\n\n<p><span style=\"font-size:16px\">Die Kombination aus Gletscher, Berge und See macht die Region Zell am See-Kaprun im Salzburger Land so einzigartig. Nirgendwo liegen die sch&ouml;nsten Seiten &Ouml;sterreichs so nah beieinander. Das Zusammenspiel dieses alpinen Naturraumes erm&ouml;glicht Sportlern, Familien und Erholungssuchenden abwechslungsreiche Aktivit&auml;ten und Erlebnisse direkt vor der Haust&uuml;r:</span></p>\n","1","0","0"),
("526","1","2","9","content","Ďalší text k modulu O REGIÓNE","_menu_5_text_2","<p>&nbsp;</p>\n\n<p><span style=\"font-size:16px\"><span style=\"font-family:arial,helvetica,sans-serif\">Vom Wandern und Biken auf dem Kitzsteinhorn, der Schmittenh&ouml;he oder dem Maiskogel, &uuml;ber Wassersport im und auf dem glasklaren Zeller See, Paragliden oder Drachenfliegen mit Blick auf die 3000er der Hohe Tauern bis zu einer Runde auf einem der sch&ouml;nsten Golfpl&auml;tze im Alpenraum.</span></span></p>\n\n<p><span style=\"font-size:16px\">Mehr Informationen:&nbsp;<a href=\"http://www.zellamsee-kaprun.com/\">www.zellamsee-kaprun.com</a></span></p>\n","1","0","0"),
("527","1","2","10","content","Text k modulu MAPA","_menu_6_text_1","<p>Mapa regionu</p>\n","1","0","0"),
("528","1","2","2","content","Text k modulu UBYTOVANIE 1","_menu_7_text_1","<p><span style=\"font-size:16px\"><span style=\"font-family:arial,helvetica,sans-serif\"><strong>4*S PREMIUM Alpinresort TAUERN SPA Zell am See-Kaprun</strong></span></span></p>\n\n<p><span style=\"font-size:16px\"><span style=\"font-family:arial,helvetica,sans-serif\">Das TAUERN SPA ist ein exklusives 4-Sterne-Superior Resorthotel samt moderner SPA Wasser- &amp; Saunawelt mit Indoor- und Outdoorbereich auf rund 20.000m&sup2;. Highlight ist der au&szlig;ergew&ouml;hnliche, Hotel Panorama SPA mit gl&auml;sernem Skylinepool &amp; Panorama Saunen im 3. Stock des Hauses. Die SPA Wasserwelt beeindruckt mit vielf&auml;ltig inszenierten Aktiv- und Entspannungsbecken, einem separaten Kinderbereich sowie unterschiedlichen Ruhe- &amp; Liegebereichen. Die SPA Saunawelt umfasst 10 verschiedene Saunen &amp; Dampfb&auml;der, darunter einen Textilsaunabereich. Das Alpin Vital SPA &amp; Kosmetik bietet Body- &amp; Beautytreatments mit hochwertigen Naturprodukten der Region an. Der Fitnessbereich ist mit hochwertigen Cardio- und Kraftger&auml;ten ausgestattet und bietet einen einmaligem Ausblick auf das Bergpanorama. Ein Fitnessprogramm kombiniert t&auml;glich mit unterschiedlichen Kursen Erholung &amp; Aktivit&auml;t.</span></span></p>\n\n<p><span style=\"font-size:16px\"><span style=\"font-family:arial,helvetica,sans-serif\">5 Restaurants &amp; Bars verw&ouml;hnen mit regionalen Gen&uuml;ssen &amp; internationalen kulinarischen Verlockungen.</span></span></p>\n","1","0","0"),
("529","1","2","12","content","Input Meno","form_base_name","Vorname","1","0","0"),
("530","1","2","12","content","Input Priezvisko","form_base_surname","Nachname","1","0","0"),
("531","1","2","12","content","Input PSČ","form_base_psc","PLZ","1","0","0"),
("532","1","2","12","content","Input Mesto","form_base_city","Stadt","1","0","0"),
("533","1","2","12","content","Input Email","form_base_email","E-mail","1","0","0"),
("534","1","2","12","content","Input Doklad","form_extend_v1_doklad","","0","0","0"),
("535","1","2","12","content","Input Otázka + odpovede","form_extend_v3_otazka","Wie heißt die am Kitzsteinhorn höchstgelegene Aussichtsplattform im Salzburger Land, die mit einer Gondelbahn erreichbar ist?","1","0","0"),
("536","1","2","12","content","Odpoveď A","form_extend_v3_odpoved_a","Top of Kitzsteinhorn","1","0","0"),
("537","1","2","12","content","Odpoveď B","form_extend_v3_odpoved_b","Großvenediger","1","0","0"),
("538","1","2","12","content","Odpoveď C","form_extend_v3_odpoved_c","Top of Salzburg","1","0","0"),
("539","1","2","4","content","Názov","field_word_nazov","Názov","0","0","0"),
("540","1","2","4","content","Adresa","field_word_adresa","Adresa","0","0","0"),
("541","1","2","4","content","Kontakt","field_word_kontakt","Kontakt","0","0","0"),
("542","1","2","4","content","Web","field_word_web","Web","0","0","0"),
("543","1","2","4","content","Hláška povinné pole","field_word_err","Pflichtfelder","1","0","0"),
("544","1","2","4","content","Registrovať","field_word_sent","Teilnehmen","1","0","0"),
("545","1","2","4","content","Predchádzajúca (fotka)","field_word_previous","Vorheriges","1","0","0"),
("546","1","2","4","content","Ďalšia (fotka)","field_word_next","Nächstes","1","0","0"),
("547","1","2","4","content","Súhlasím s newslettrom","field_word_suhlas_news","Ja, ich stimme zu den Newsletter von Zell am See-Kaprun zu erhalten und meine Daten für weitere Marketingaktivitäten zur Verfügung zu stellen.","1","0","0"),
("548","1","2","4","content","Súhlasím s podmienkami súťaže","field_word_suhlas_podm","Ja, ich stimme den Teilnahmebedingungen zu. (Teilnahmebedingungen HIER).","1","0","0"),
("549","1","2","1","content","Kľúčové slová pre Google","keywords","Zell am See-Kaprun  Tauern Spa  John Harris","1","0","0"),
("550","1","2","1","content","Popis pre Google","description","This competition has a first ID","1","0","0"),
("551","1","2","4","content","Súhlasím s podmienkami súťaže","field_word_dakujeme","Danke, Sie haben sich erfolgreich für das Gewinnspiel registriert.","1","0","0"),
("552","1","2","12","image","Podmienky súťaže (PDF)","form_file_podmienky","86","1","0","0"),
("553","1","2","12","image","Newsletter (PDF)","form_file_newsletter","68","0","0","0"),
("554","1","2","4","content","Hláška možnosti novej registrácie","field_word_nova_registracia","Jetzt Freunde einladen!","1","0","0"),
("555","1","2","13","content","Počet znakov vygenerovaného hashu","_email_conf_char","8","1","0","0"),
("556","1","2","13","content","Hláška, súťažiacemu ktorá mu príde na email po registracii.","_email_conf_sent_text","Danke, Sie haben sich erfolgreich für das Gewinnspiel registriert. Wir wünschen Ihnen viel Erfolg bei der Verlosung!","1","0","0"),
("557","1","2","12","content","Telefónne číslo","form_base_tel_c","Tel. Nr.","1","0","0"),
("558","1","2","4","content","Hláška za hviezdičkou o povinných poliach","field_word_povinne_polia","","1","0","0"),
("559","1","2","2","image","Fotka loga k modulu UBYTOVANIE","_menu_7_image_2_1","59","0","0","0"),
("560","1","2","16","content","Názov hotelu 2","info_hotel_name_2","Sporthotel Falkenstein","0","0","0"),
("561","1","2","16","content","Adresa Hotela 2","info_hotel_addr_2","Nikolaus-Gassner-Str. 79   <br/>   A - 5710 Kaprun","0","0","0"),
("562","1","2","16","content","Telefón do hotela 2","info_hotel_tel_c_2","+43 6547 7122","0","0","0"),
("563","1","2","16","content","Email hotelu 2","info_hotel_email_2","sporthotel@falkenstein.at","0","0","0"),
("564","1","2","16","content","Text k modulu UBYTOVANIE 2","_menu_7_text_2","<p><strong>Das Falkenstein</strong></p>\n\n<p>Tady v Kaprunu a hotelu Falkenstein lze objevit spoustu vzru&scaron;uj&iacute;c&iacute;ch možnost&iacute; a z&aacute;bavy&nbsp;pro rodiny a děti. Každ&yacute; den může b&yacute;t spojen s nov&yacute;mi z&aacute;žitky a dojmy, ať už jde&nbsp;o zvl&aacute;&scaron;tn&iacute; rodinn&eacute; turistick&eacute; v&yacute;lety, čvacht&aacute;n&iacute; a klouz&aacute;n&iacute; v Tauern SPA Kaprun, v&yacute;let&nbsp;k alpsk&eacute; horsk&eacute; bobov&eacute; dr&aacute;ze &quot;Maisfiltzer&quot;, o n&aacute;v&scaron;těvu volnočasov&eacute;ho nebo n&aacute;rodn&iacute;ho&nbsp;parku nebo o mnoh&aacute; dal&scaron;&iacute; dobrodružstv&iacute; - z&aacute;bavě se nekladou ž&aacute;dn&eacute; hranice.</p>\n\n<p>V hotelu Falkenstein&nbsp;se nach&aacute;z&iacute; kromě&nbsp;prostorn&eacute;ho&nbsp;dětsk&eacute;ho hři&scaron;tě&nbsp;a dětsk&eacute; herny tak&eacute;&nbsp;velk&yacute; baz&eacute;n a najdete&nbsp;zde i&nbsp;chutnou&nbsp;Pinzgauerskou&nbsp;kuchyni s pestr&yacute;mi&nbsp;dětsk&yacute;mi menu&nbsp;- n&aacute;&scaron; maskot Falki&nbsp;se na v&aacute;s tě&scaron;&iacute;!</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n","0","0","0"),
("565","1","2","17","content","Text k modulu UBYTOVANIE 3","_menu_7_text_3","<p><strong>Dovolen&aacute; v Zell am See je dovolenou s požitkem - v hotelu Tirolerhof!</strong></p>\n\n<p>Jezero, hory, ledovec a stylov&yacute;, rodinn&yacute; 4-hvězdičkov&yacute; hotel superior v Zell am See &ndash; to je ide&aacute;ln&iacute; kombinace pro va&scaron;i dovolenou v Zell am See, v l&eacute;tě i v zimě. Budete m&iacute;t v&yacute;hled na jezero Zeller See, hory Schmittenh&ouml;he a Kitzsteinhorn se v&scaron;emi rozmanit&yacute;mi sportovn&iacute;mi a rekreačn&iacute;mi možnostmi a budete h&yacute;čk&aacute;ni v b&aacute;ječn&eacute;m a mimoř&aacute;dn&eacute;m hotelu kulin&aacute;řsk&yacute;mi specialitami nejvy&scaron;&scaron;&iacute; kvality. Nebo str&aacute;v&iacute;te dovolenou spojenou s golfem v Salcburku, kde budete m&iacute;t v&yacute;hled na n&aacute;dhern&eacute; hory a jezero oblasti Zell am See-Kaprun. Nebo si užijete ve dvou n&aacute;dhern&eacute; apartm&aacute;ny v r&aacute;mci romantick&eacute; dovolen&eacute;. Nebo si poř&aacute;dně odpočinete s wellness a l&aacute;zeňskou nab&iacute;dkou vy&scaron;&scaron;&iacute; tř&iacute;dy a načerp&aacute;te novou energii. Takto může vypadat va&scaron;e dal&scaron;&iacute; rekreačn&iacute; dovolen&aacute; v hotelu Tirolerhof Zell am See - v srdci Salcburku. Wellness hotel, čtyřhvězdičkov&yacute; hotel superior, hotel pro hosty s pejsky, relaxačn&iacute; hotel - v&scaron;echny tyto př&iacute;vlastky si hotel Tirolerhof plně zaslouž&iacute;.</p>\n\n<p>&nbsp;</p>\n\n<p><strong>Prožijte nezapomenutelnou dovolenou v hotelu Tirolerhof!</strong></p>\n","0","0","0"),
("566","1","2","17","content","Email hotelu 3","info_hotel_email_3","welcome@tirolerhof.co.at","0","0","0"),
("567","1","2","17","content","Telefón do hotela 3","info_hotel_tel_c_3","+43(0)6542/772-0","0","0","0"),
("568","1","2","17","content","Adresa Hotela 3","info_hotel_addr_3","Auerspergstrasse 5   <br/>   A - 5700 Zell am See","0","0","0"),
("569","1","2","17","content","Názov hotelu 3","info_hotel_name_3","Hotel Tirolerhof ****S","0","0","0"),
("570","1","2","16","image","Fotka loga k modulu UBYTOVANIE 2","_menu_7_image_1_2","66","0","0","0"),
("571","1","2","16","image","Fotka k modulu UBYTOVANIE 2","_menu_7_image_2_2","65","0","0","0"),
("572","1","2","17","image","Fotka loga k modulu UBYTOVANIE 3","_menu_7_image_1_3","51","0","0","0"),
("573","1","2","17","image","Fotka k modulu UBYTOVANIE 3","_menu_7_image_2_3","56","0","0","0"),
("574","1","2","2","content","Url adresa hotela 1","link_hotel_1","http://www.tauernspakaprun.com","1","0","0"),
("575","1","2","16","content","Url adresa hotela 2","link_hotel_2","http://www.falkenstein.at","0","0","0"),
("576","1","2","17","content","Url adresa hotela 3","link_hotel_3","http://www.tirolerhof.co.at/","0","0","0"),
("577","1","2","9","image","Druhá fotka modulu pre modul GALÉRIA","_menu_5_gallery_1","9","1","0","0"),
("578","1","2","5","image","Fotka v hlavnom slideri 2","_menu_1_image_2","82","1","0","0"),
("579","1","2","4","content","Po ukončení registrácie","field_word_koniec_registracie","<p>&nbsp;</p>\n\n<p style=\"text-align:center\">SOUTĚŽ BYLA UKONČENA 1.8. 2016</p>\n\n<p style=\"text-align:center\">Slosov&aacute;n&iacute; bylo provedeno dne 5.8.&nbsp;2016&nbsp;dle pravidel soutěže.&nbsp;</p>\n\n<p style=\"text-align:center\"><strong>1x rodinn&yacute; letn&iacute; pobyt, pro 2 dospěl&eacute; a 2 děti , na 5 dn&iacute; / 4 noci ve 4* hotelu, včetně polopenze a animačn&iacute;ho programu pro děti, to v&scaron;e v rakousk&eacute;m Zell am See-Kaprun, z&iacute;sk&aacute;vaj&iacute;:</strong></p>\n\n<p style=\"text-align:center\"><strong>Petra Kuncova,&nbsp; 46804 Jablonec nad Nisou , ČR</strong></p>\n\n<p style=\"text-align:center\"><strong>Alice Ertlbauerova,&nbsp; 62100 Brno, ČR</strong></p>\n\n<p style=\"text-align:center\"><strong>Iveta Pohankova,&nbsp; 28002 Kol&iacute;n, ČR</strong></p>\n\n<p style=\"text-align:center\"><strong>David Pravec,&nbsp; 53009 Pardubice, ČR</strong></p>\n\n<p style=\"text-align:center\"><strong>Monika Adamusova,&nbsp; 58764 B&aacute;nov-Str&aacute;žky, ČR</strong></p>\n\n<p style=\"text-align:center\"><strong>1x dětskou narozeninovou oslavu s překvapen&iacute;m kter&aacute; zahrnuje zaji&scaron;těn&iacute; z&aacute;bavn&eacute;ho doprovodn&eacute;ho programu (klaun, malov&aacute;n&iacute; na obličej a dal&scaron;&iacute; překvapen&iacute; ) pro Va&scaron;i narozeninovou oslavu u V&aacute;s doma, z&iacute;sk&aacute;v&aacute;:</strong></p>\n\n<p style=\"text-align:center\"><strong>Vlasta Kozov&aacute;, 739 46 Hukvaldy, ČR</strong></p>\n\n<p style=\"text-align:center\">V&yacute;hern&iacute; vouchery budou vyercům odesl&aacute;ny mailem nebo po&scaron;tou v&nbsp;nejbliž&scaron;&iacute;ch dnech! Pobyty jsou kromě dopravy. Spr&aacute;vnost a platnost slosov&aacute;n&iacute; potvrzuj&iacute; provozovatel&eacute; soutěže.</p>\n\n<p style=\"text-align:center\"><strong><u>V&yacute;hercům blahopřejeme a v&scaron;em ostatn&iacute;m děkujeme za &uacute;čast!</u></strong></p>\n\n<p style=\"text-align:center\"><span style=\"font-size:12px\">Provozovatel&eacute; soutěže:&nbsp;Organiz&aacute;tor: Zell am See-Kaprun Tourismus GmbH, Brucker Bundesstr.1a, 5700 Zell am See, AT a spoluorganiz&aacute;tor : Pompo, spol. s r.o., Lidick&aacute; 481, 273 51&nbsp; Unho&scaron;ť, ČR</span></p>\n","0","0","0"),
("580","1","2","11","content","Názov modulu pre modul O PARTNEROVI","_menu_name_8","","0","0","0"),
("581","1","2","15","content","Email partnera","info_partner_email","vienna@johnharris.at","1","0","0"),
("582","1","2","15","content","Adresa partnera","info_partner_addr","Nibelungengasse 7 <br/> 1010 Wien","1","0","0"),
("583","1","2","15","content","Názov partnera","info_partner_name","John Harris Gesellschaft m. b. H.","1","0","0"),
("584","1","2","15","content","Telefónne číslo na partnera","info_partner_tel_c","+43 (1) 587 37 10","1","0","0");
INSERT INTO dnt_microsites_composer VALUES
("585","1","2","11","content","Text k modulu O PARTNEROVI 1","_menu_8_text_1","","0","0","0"),
("586","1","3","1","content","Template","layout","dnt_first","1","0","0"),
("587","1","3","15","content","Link partnera","link_partner","http://www.intersport-voswinkel.de","1","0","0"),
("588","1","3","3","content","Link regionu","link_region","http://www.tegernsee-schliersee.de","1","0","0"),
("589","1","3","1","content","Zobraziť na URL adrese","real_address","http://www.vyhrat.com/","1","0","0"),
("590","1","3","1","content","Facebook","social_fb","https://www.facebook.com/INTERSPORT.Voswinkel","1","0","0"),
("591","1","3","1","content","Twitter","social_twitter","https://twitter.com/","0","0","0"),
("592","1","3","1","content","Instagram","social_linked_in","https://www.linkedin.com/","0","0","0"),
("593","1","3","1","content","Mapa ","map_location","https://www.google.sk/maps/place/Miesbach,+Nemecko/@47.7618701,11.5500579,10z/data=!3m1!4b1!4m5!3m4!1s0x479d8b6ecd7944d9:0x556cea7cd05f5a06!8m2!3d47.7444622!4d11.8579456","1","0","0"),
("594","1","3","1","image","Favicon","favicon","57","1","0","0"),
("595","1","3","1","content","Model farby R","_r","126","1","0","0"),
("596","1","3","1","content","Model farby G","_g","195","1","0","0"),
("597","1","3","1","content","Model farby B","_b","149","1","0","0"),
("598","1","3","1","content","Font","_font","Georgia","1","0","0"),
("599","1","3","2","content","Názov hotelu 1","info_hotel_name_1","4*Hotel Terrassenhof am Tegernsee","1","0","0"),
("600","1","3","2","content","Adresa Hotela 1","info_hotel_addr_1","Adrian-Stoop-Str. 50   <br/>   DE - 83707 Bad Wiessee","1","0","0"),
("601","1","3","2","content","Telefón do hotela 1","info_hotel_tel_c_1","+49 8022 8630","1","0","0"),
("602","1","3","2","content","Email hotelu 1","info_hotel_email_1","info@terrassenhof.de","1","0","0"),
("603","1","3","3","content","Názov regiónu","info_region_name","Alpenregion Tegernsee Schliersee","1","0","0"),
("604","1","3","3","content","Adresa regiónu","info_region_addr","Hauptstr. 2  <br/>  D-83684 Tegernsee","1","0","0"),
("605","1","3","3","content","Telefónne číslo regiónu","info_region_tel_c","+49 (0) 80 22 / 92 73 890 ","1","0","0"),
("606","1","3","3","content","Email regiónu","info_region_email","info‎@‎tegernsee-schliersee.de","1","0","0"),
("607","1","3","1","content","Youtube video","youtube_video","oIOOEOjgB3Q","1","0","0"),
("608","1","3","15","image","Logo partnera","partner_logo","98","1","0","0"),
("609","1","3","3","image","Logo regiónu","region_logo","91","1","0","0"),
("610","1","3","5","image","Fotka v hlavnom slideri 1","_menu_1_image_1","109","1","0","0"),
("611","1","3","7","image","Fotka modulu pre modul GALÉRIA","_menu_3_image_1","96","0","0","0"),
("612","1","3","7","image","Druhá fotka modulu pre modul GALÉRIA","_menu_3_image_2","97","0","0","0"),
("613","1","3","2","image","Fotka k modulu UBYTOVANIE","_menu_7_image_1_1","100","1","0","0"),
("614","1","3","5","content","Názov modulu pre modul INFO","_menu_name_1","Intro","1","0","0"),
("615","1","3","6","content","Názov modulu pre modul O SÚŤAŽI","_menu_name_2","Gewinnspiel","1","0","0"),
("616","1","3","7","content","Názov modulu pre modul GALÉRIU","_menu_name_3","Galérie","0","0","0"),
("617","1","3","8","content","Názov modulu pre modul FORMULÁRU","_menu_name_4","Teilnahme","1","0","0"),
("618","1","3","9","content","Názov modulu pre modul O REGIONE","_menu_name_5","Region","1","0","0"),
("619","1","3","10","content","Názov modulu pre modul MAPA","_menu_name_6","Mapa","0","0","0"),
("620","1","3","11","content","Názov modulu pre modul UBYTOVANIE","_menu_name_7","Teilnehmendes Hotel","1","0","0"),
("621","1","3","5","content","Text k modulu INFO","_menu_1_text_1","<p><span style=\"font-size:16px\"><span style=\"color:#FFFFFF\">GEWINNE JETZT EINEN VON 5 SOMMERURLAUBEN IN DER ALPENREGION TEGERNSEE SCHLIERSEE</span></span></p>\n","1","0","0"),
("622","1","3","6","content","Text k modulu O SÚŤAŽI","_menu_2_text_1","<h3><strong><span style=\"font-size:16px\">Einfach Teilnahmeformular ausf&uuml;llen und schon spielen Sie mit um einen Sommerurlaub in der Alpenregion Tegernsee Schliersee.</span></strong></h3>\n\n<h3><span style=\"font-size:16px\">Das Gewinnspiel l&auml;uft von 06.06.2016 bis 06.07.2016.</span></h3>\n\n<h3><span style=\"font-size:16px\">Das gibt es zu gewinnen:</span></h3>\n\n<p><span style=\"font-size:16px\"><strong>5 Sommerurlaube f&uuml;r 2 Erwachsene &agrave; 4 N&auml;chte im 4* Hotel Terrassenhof inkl. Halbpension.</strong></span></p>\n","1","0","0"),
("623","1","3","7","content","Text k modulu GALÉRIA","_menu_3_text_1","","0","0","0"),
("624","1","3","8","content","Text k modulu FORMULÁR","_menu_4_text_1","<p>Ihre Registrierung:&nbsp;</p>\n","1","0","0"),
("625","1","3","9","content","Text k modulu O REGIÓNE","_menu_5_text_1","<h3><span style=\"font-family:georgia,serif\"><span style=\"font-size:16px\"><strong>Alpenregion Tegernsee Schliersee</strong></span></span></h3>\n\n<p><span style=\"font-size:16px\"><span style=\"font-family:georgia,serif\">Sportlich &ndash; traditionell &ndash; urbayrisch</span></span></p>\n\n<p><span style=\"font-size:16px\"><span style=\"font-family:georgia,serif\">Verbringen Sie Ihren Urlaub inmitten einer der sch&ouml;nsten Wander- und Aktivregionen Deutschlands.&nbsp; Ob Sie auf Berge wandern, um Seen radeln oder einfach nur in herrlicher Alpenkulisse entspannen m&ouml;chten: Ihre sportlichen Tage gestalten sich bei uns ganz einfach und begeistern Sie mit nat&uuml;rlicher Gelassenheit.</span></span></p>\n\n<p><span style=\"font-size:16px\"><span style=\"font-family:georgia,serif\">Runden Sie Ihre Natur-Erlebnisse im Anschluss doch gleich mit einem Besuch auf einem urigen Wald- oder Seefestabend ab. Begr&uuml;&szlig;t mit urbayrischer Lebensfreude sind Sie sogleich mittendrin angekommen und staunen &uuml;ber Schuhplattler, die feschen Dirndl, Blasmusik und bayrische Schmankerl.</span></span></p>\n","1","0","0"),
("626","1","3","9","content","Ďalší text k modulu O REGIÓNE","_menu_5_text_2","<p>&nbsp;</p>\n\n<p><span style=\"font-size:16px\"><span style=\"font-family:georgia,serif\">Bei so vielen Eindr&uuml;cken bietet sich zwischendrin auch mal wieder ein Tag zum Entspannen an. Ganz tief durchatmen, den Alltag beiseite schieben und ein paar genussreiche Wellness-Stunden verbringen &ndash; nichts leichter als das. In der monte mare Seesauna in Tegernsee zum Beispiel oder einfach in einer der zahlreichen Gesundheits- und Wellnessm&ouml;glichkeiten in der Region.</span></span></p>\n\n<p><span style=\"font-size:16px\"><span style=\"font-family:georgia,serif\">Nutzen Sie auch die zentrale Lage der Alpenregion: hier lassen sich an einem Tag unz&auml;hlige Ausflugsm&ouml;glichkeiten, Seen und Berge miteinander verbinden. Mit Bus und Bahn sind Sie auch ohne Auto ganz schnell dort, wo die Musik spielt. Ein besonderer Reiz bietet hier vor allem die N&auml;he zu M&uuml;nchen. In weniger als einer Stunde (Auto oder Bahn) gelingt Ihnen hier der Szenewechsel von der bayerischen Metropole hinein ins herrliche Voralpenland. Wir freuen uns auf Sie!</span></span></p>\n\n<p><span style=\"font-size:16px\"><span style=\"font-family:georgia,serif\">Weitere Informationen:&nbsp;<a href=\"http://www.tegernsee-schliersee.de/\">www.tegernsee-schliersee.de</a></span></span></p>\n","1","0","0"),
("627","1","3","10","content","Text k modulu MAPA","_menu_6_text_1","<p>Mapa regionu</p>\n","0","0","0"),
("628","1","3","2","content","Text k modulu UBYTOVANIE 1","_menu_7_text_1","<p><span style=\"font-size:16px\"><span style=\"font-family:georgia,serif\"><strong>4*Hotel Terrassenhof am Tegernsee</strong></span></span></p>\n\n<p><span style=\"font-size:16px\"><span style=\"font-family:georgia,serif\">Bei uns erwartet Sie bayerische Gastfreundschaft und herzlicher Service. Unsere Zimmer, Suiten und Apartments mit traumhaftem See- oder Bergblick sind komfortabel und bayerisch-modern ausgestattet. Genie&szlig;en Sie in unserem Restaurant oder auf der See-Terrasse feine regionale und bayerische K&ouml;stlichkeiten. Wir haben ein vielf&auml;ltiges Sport- und Freizeitangebot, das vom gem&uuml;tlichen Spazierengehen &uuml;ber Wandern, Mountainbiken, Skifahren, Rodeln oder Baden am eigenen Strand bis zum Segeln reicht.</span></span></p>\n\n<p><span style=\"font-size:16px\"><span style=\"font-family:georgia,serif\">Urlaub im Terrassenhof ist Erholung pur!</span></span></p>\n","1","0","0"),
("629","1","3","12","content","Input Meno","form_base_name","Vorname","1","0","0"),
("630","1","3","12","content","Input Priezvisko","form_base_surname","Nachname","1","0","0"),
("631","1","3","12","content","Input PSČ","form_base_psc","PLZ","1","0","0"),
("632","1","3","12","content","Input Mesto","form_base_city","Stadt","1","0","0"),
("633","1","3","12","content","Input Email","form_base_email","E-mail","1","0","0"),
("634","1","3","12","content","Input Doklad","form_extend_v1_doklad","Einkaufsbeleg Nr:","0","0","0"),
("635","1","3","12","content","Input Otázka + odpovede","form_extend_v3_otazka","Welche Seen befinden sich in der Alpenregion Tegernsee Schliersee?","1","0","0"),
("636","1","3","12","content","Odpoveď A","form_extend_v3_odpoved_a","Tegernsee, Schliersee und Spitzingsee","1","0","0"),
("637","1","3","12","content","Odpoveď B","form_extend_v3_odpoved_b","Ammersee, Starnberger See und Kochelsee","1","0","0"),
("638","1","3","12","content","Odpoveď C","form_extend_v3_odpoved_c","Chiemsee und Simssee","1","0","0"),
("639","1","3","4","content","Názov","field_word_nazov","Názov","0","0","0"),
("640","1","3","4","content","Adresa","field_word_adresa","Adresa","0","0","0"),
("641","1","3","4","content","Kontakt","field_word_kontakt","Kontakt","0","0","0"),
("642","1","3","4","content","Web","field_word_web","Web","0","0","0"),
("643","1","3","4","content","Hláška povinné pole","field_word_err","Pflichtfelder","1","0","0"),
("644","1","3","4","content","Registrovať","field_word_sent","Teilnehmen","1","0","0"),
("645","1","3","4","content","Predchádzajúca (fotka)","field_word_previous","Vorheriges","1","0","0"),
("646","1","3","4","content","Ďalšia (fotka)","field_word_next","Nächstes","1","0","0"),
("647","1","3","4","content","Súhlasím s newslettrom","field_word_suhlas_news","Ja, ich stimme zu den Newsletter von der Alpenregion Tegernsee Schliersee zu erhalten und meine Daten für weitere Marketingaktivitäten zur Verfügung zu stellen.","1","0","0"),
("648","1","3","4","content","Súhlasím s podmienkami súťaže","field_word_suhlas_podm","Ja, ich stimme den Teilnahmebedingungen zu. (Teilnahmebedingungen HIER).","1","0","0"),
("649","1","3","1","content","Kľúčové slová pre Google","keywords","Alpenregion Tegernsee Schliersee ","1","0","0"),
("650","1","3","1","content","Popis pre Google","description","This competition has a first ID","1","0","0"),
("651","1","3","4","content","Súhlasím s podmienkami súťaže","field_word_dakujeme","Danke, Sie haben sich erfolgreich für das Gewinnspiel registriert.","1","0","0"),
("652","1","3","12","image","Podmienky súťaže (PDF)","form_file_podmienky","106","1","0","0"),
("653","1","3","12","image","Newsletter (PDF)","form_file_newsletter","107","0","0","0"),
("654","1","3","4","content","Hláška možnosti novej registrácie","field_word_nova_registracia","Jetzt Freunde einladen!","1","0","0"),
("655","1","3","13","content","Počet znakov vygenerovaného hashu","_email_conf_char","8","1","0","0"),
("656","1","3","13","content","Hláška, súťažiacemu ktorá mu príde na email po registracii.","_email_conf_sent_text","Danke, Sie haben sich erfolgreich für das Gewinnspiel registriert. Wir wünschen Ihnen viel Erfolg bei der Verlosung!","1","0","0"),
("657","1","3","12","content","Telefónne číslo","form_base_tel_c","Tel. Nr.","1","0","0"),
("658","1","3","4","content","Hláška za hviezdičkou o povinných poliach","field_word_povinne_polia","","1","0","0"),
("659","1","3","2","image","Fotka loga k modulu UBYTOVANIE","_menu_7_image_2_1","59","0","0","0"),
("660","1","3","16","content","Názov hotelu 2","info_hotel_name_2","Sporthotel Falkenstein","0","0","0"),
("661","1","3","16","content","Adresa Hotela 2","info_hotel_addr_2","Nikolaus-Gassner-Str. 79   <br/>   A - 5710 Kaprun","1","0","0"),
("662","1","3","16","content","Telefón do hotela 2","info_hotel_tel_c_2","+43 6547 7122","1","0","0"),
("663","1","3","16","content","Email hotelu 2","info_hotel_email_2","sporthotel@falkenstein.at","1","0","0"),
("664","1","3","16","content","Text k modulu UBYTOVANIE 2","_menu_7_text_2","<p><strong>Das Falkenstein</strong></p>\n\n<p>Tady v Kaprunu a hotelu Falkenstein lze objevit spoustu vzru&scaron;uj&iacute;c&iacute;ch možnost&iacute; a z&aacute;bavy&nbsp;pro rodiny a děti. Každ&yacute; den může b&yacute;t spojen s nov&yacute;mi z&aacute;žitky a dojmy, ať už jde&nbsp;o zvl&aacute;&scaron;tn&iacute; rodinn&eacute; turistick&eacute; v&yacute;lety, čvacht&aacute;n&iacute; a klouz&aacute;n&iacute; v Tauern SPA Kaprun, v&yacute;let&nbsp;k alpsk&eacute; horsk&eacute; bobov&eacute; dr&aacute;ze &quot;Maisfiltzer&quot;, o n&aacute;v&scaron;těvu volnočasov&eacute;ho nebo n&aacute;rodn&iacute;ho&nbsp;parku nebo o mnoh&aacute; dal&scaron;&iacute; dobrodružstv&iacute; - z&aacute;bavě se nekladou ž&aacute;dn&eacute; hranice.</p>\n\n<p>V hotelu Falkenstein&nbsp;se nach&aacute;z&iacute; kromě&nbsp;prostorn&eacute;ho&nbsp;dětsk&eacute;ho hři&scaron;tě&nbsp;a dětsk&eacute; herny tak&eacute;&nbsp;velk&yacute; baz&eacute;n a najdete&nbsp;zde i&nbsp;chutnou&nbsp;Pinzgauerskou&nbsp;kuchyni s pestr&yacute;mi&nbsp;dětsk&yacute;mi menu&nbsp;- n&aacute;&scaron; maskot Falki&nbsp;se na v&aacute;s tě&scaron;&iacute;!</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n","1","0","0"),
("665","1","3","17","content","Text k modulu UBYTOVANIE 3","_menu_7_text_3","<p><strong>Dovolen&aacute; v Zell am See je dovolenou s požitkem - v hotelu Tirolerhof!</strong></p>\n\n<p>Jezero, hory, ledovec a stylov&yacute;, rodinn&yacute; 4-hvězdičkov&yacute; hotel superior v Zell am See &ndash; to je ide&aacute;ln&iacute; kombinace pro va&scaron;i dovolenou v Zell am See, v l&eacute;tě i v zimě. Budete m&iacute;t v&yacute;hled na jezero Zeller See, hory Schmittenh&ouml;he a Kitzsteinhorn se v&scaron;emi rozmanit&yacute;mi sportovn&iacute;mi a rekreačn&iacute;mi možnostmi a budete h&yacute;čk&aacute;ni v b&aacute;ječn&eacute;m a mimoř&aacute;dn&eacute;m hotelu kulin&aacute;řsk&yacute;mi specialitami nejvy&scaron;&scaron;&iacute; kvality. Nebo str&aacute;v&iacute;te dovolenou spojenou s golfem v Salcburku, kde budete m&iacute;t v&yacute;hled na n&aacute;dhern&eacute; hory a jezero oblasti Zell am See-Kaprun. Nebo si užijete ve dvou n&aacute;dhern&eacute; apartm&aacute;ny v r&aacute;mci romantick&eacute; dovolen&eacute;. Nebo si poř&aacute;dně odpočinete s wellness a l&aacute;zeňskou nab&iacute;dkou vy&scaron;&scaron;&iacute; tř&iacute;dy a načerp&aacute;te novou energii. Takto může vypadat va&scaron;e dal&scaron;&iacute; rekreačn&iacute; dovolen&aacute; v hotelu Tirolerhof Zell am See - v srdci Salcburku. Wellness hotel, čtyřhvězdičkov&yacute; hotel superior, hotel pro hosty s pejsky, relaxačn&iacute; hotel - v&scaron;echny tyto př&iacute;vlastky si hotel Tirolerhof plně zaslouž&iacute;.</p>\n\n<p>&nbsp;</p>\n\n<p><strong>Prožijte nezapomenutelnou dovolenou v hotelu Tirolerhof!</strong></p>\n","0","0","0"),
("666","1","3","17","content","Email hotelu 3","info_hotel_email_3","welcome@tirolerhof.co.at","0","0","0"),
("667","1","3","17","content","Telefón do hotela 3","info_hotel_tel_c_3","+43(0)6542/772-0","0","0","0"),
("668","1","3","17","content","Adresa Hotela 3","info_hotel_addr_3","Auerspergstrasse 5   <br/>   A - 5700 Zell am See","0","0","0"),
("669","1","3","17","content","Názov hotelu 3","info_hotel_name_3","Hotel Tirolerhof ****S","0","0","0"),
("670","1","3","16","image","Fotka loga k modulu UBYTOVANIE 2","_menu_7_image_1_2","66","1","0","0"),
("671","1","3","16","image","Fotka k modulu UBYTOVANIE 2","_menu_7_image_2_2","65","0","0","0"),
("672","1","3","17","image","Fotka loga k modulu UBYTOVANIE 3","_menu_7_image_1_3","51","0","0","0"),
("673","1","3","17","image","Fotka k modulu UBYTOVANIE 3","_menu_7_image_2_3","56","0","0","0"),
("674","1","3","2","content","Url adresa hotela 1","link_hotel_1","http://www.terrassenhof.de","1","0","0"),
("675","1","3","16","content","Url adresa hotela 2","link_hotel_2","http://www.falkenstein.at","1","0","0"),
("676","1","3","17","content","Url adresa hotela 3","link_hotel_3","http://www.tirolerhof.co.at/","0","0","0"),
("677","1","3","9","image","Druhá fotka modulu pre modul GALÉRIA","_menu_5_gallery_1","11","1","0","0"),
("678","1","3","5","image","Fotka v hlavnom slideri 2","_menu_1_image_2","105","1","0","0"),
("679","1","3","4","content","Po ukončení registrácie","field_word_koniec_registracie","<p><span style=\"color:#FF0000\"><span style=\"font-size:22px\">Ospravedlňujeme sa, ale t&aacute;to s&uacute;ťaž už bola ukončen&aacute;.</span></span></p>\n\n<p><span style=\"font-size:18px\"><span style=\"color:#FF0000\">Gratulujeme v&yacute;hercovi</span></span></p>\n","0","0","0"),
("680","1","3","11","content","Názov modulu pre modul O PARTNEROVI","_menu_name_8","O Partnerovi","0","0","0"),
("681","1","3","15","content","Email partnera","info_partner_email","info.eshop@pompo.cz","0","0","0"),
("682","1","3","15","content","Adresa partnera","info_partner_addr","Lidická 481 <br/> 273 51 Unhošť","0","0","0"),
("683","1","3","15","content","Názov partnera","info_partner_name","Pompo spol. s r.o.","0","0","0"),
("684","1","3","15","content","Telefónne číslo na partnera","info_partner_tel_c","737 279 015","0","0","0");
INSERT INTO dnt_microsites_composer VALUES
("685","1","3","11","content","Text k modulu O PARTNEROVI 1","_menu_8_text_1","","1","0","0"),
("686","1","3","1","content","Jazyková mutácia pre Facebook","_language","de_DE","1","0","0"),
("687","1","2","1","content","Jazyková mutácia pre Facebook","_language","de_DE","1","0","0"),
("688","1","1","1","content","Jazyková mutácia pre Facebook","_language","cs_CZ","1","0","0"),
("689","1","4","1","content","Template","layout","dnt_first","1","0","0"),
("690","1","4","15","content","Link partnera","link_partner","http://www.kilpi.cz","1","0","0"),
("691","1","4","3","content","Link regionu","link_region","http://www.zugspitzarena.com/en","1","0","0"),
("692","1","4","1","content","Zobraziť na URL adrese","real_address","http://www.vyhrat.com/","1","0","0"),
("693","1","4","1","content","Facebook","social_fb","https://www.facebook.com/kilpisport","1","0","0"),
("694","1","4","1","content","Twitter","social_twitter","https://twitter.com/","0","0","0"),
("695","1","4","1","content","Instagram","social_linked_in","https://www.linkedin.com/","0","0","0"),
("696","1","4","1","content","Mapa ","map_location","https://www.google.cz/maps/search/Tourismusregion+Tiroler+Zugspitz+Arena/@47.3946409,10.8868175,13z/data=!3m1!4b1","1","0","0"),
("697","1","4","1","image","Favicon","favicon","57","1","0","0"),
("698","1","4","1","content","Model farby R","_r","249","1","0","0"),
("699","1","4","1","content","Model farby G","_g","178","1","0","0"),
("700","1","4","1","content","Model farby B","_b","0","1","0","0"),
("701","1","4","1","content","Font","_font","Arial","1","0","0"),
("702","1","4","2","content","Názov hotelu 1","info_hotel_name_1","Familotel - amiamo","0","0","0"),
("703","1","4","2","content","Adresa Hotela 1","info_hotel_addr_1","Salzachtal Bundesstrasse 20   <br/>   A - 5700 Zell am See","1","0","0"),
("704","1","4","2","content","Telefón do hotela 1","info_hotel_tel_c_1","+43 6542 55355","1","0","0"),
("705","1","4","2","content","Email hotelu 1","info_hotel_email_1","hotel@amiamo.at","1","0","0"),
("706","1","4","3","content","Názov regiónu","info_region_name","Tiroler Zugspitz Arena","1","0","0"),
("707","1","4","3","content","Adresa regiónu","info_region_addr","Am Rettensee 1 <br/>  A - 6632 Ehrwald","1","0","0"),
("708","1","4","3","content","Telefónne číslo regiónu","info_region_tel_c","+43 (0) 5673 20 000","1","0","0"),
("709","1","4","3","content","Email regiónu","info_region_email","info@zugspitzarena.com","1","0","0"),
("710","1","4","1","content","Youtube video","youtube_video","ufU6HWMBx_8","1","0","0"),
("711","1","4","15","image","Logo partnera","partner_logo","111","1","0","0"),
("712","1","4","3","image","Logo regiónu","region_logo","119","1","0","0"),
("713","1","4","5","image","Fotka v hlavnom slideri 1","_menu_1_image_1","114","1","0","0"),
("714","1","4","7","image","Fotka modulu pre modul GALÉRIA","_menu_3_image_1","124","1","0","0"),
("715","1","4","7","image","Druhá fotka modulu pre modul GALÉRIA","_menu_3_image_2","121","1","0","0"),
("716","1","4","2","image","Fotka k modulu UBYTOVANIE","_menu_7_image_1_1","63","1","0","0"),
("717","1","4","5","content","Názov modulu pre modul INFO","_menu_name_1","Intro","1","0","0"),
("718","1","4","6","content","Názov modulu pre modul O SÚŤAŽI","_menu_name_2","O soutěži","1","0","0"),
("719","1","4","7","content","Názov modulu pre modul GALÉRIU","_menu_name_3","Galérie","0","0","0"),
("720","1","4","8","content","Názov modulu pre modul FORMULÁRU","_menu_name_4","Registrace","1","0","0"),
("721","1","4","9","content","Názov modulu pre modul O REGIONE","_menu_name_5","O regionu","1","0","0"),
("722","1","4","10","content","Názov modulu pre modul MAPA","_menu_name_6","Mapa","0","0","0"),
("723","1","4","11","content","Názov modulu pre modul UBYTOVANIE","_menu_name_7","Ubytování","0","0","0"),
("724","1","4","5","content","Text k modulu INFO","_menu_1_text_1","<p><span style=\"font-size:22px\"><strong>Nakupujte KILPI a vyhrajte jeden ze 3 letn&iacute;ch horsk&yacute;ch pobytů&nbsp;v Tyrolsk&eacute; Zugspitz Areně</strong></span></p>\n","1","0","0"),
("725","1","4","6","content","Text k modulu O SÚŤAŽI","_menu_2_text_1","<h3>Za n&aacute;kup KILPI v hodnotě nad 1000 Kč v ČR / nad 40 &euro; v&nbsp;SR / v kamenn&yacute;ch prodejn&aacute;ch KILPI stores v ČR a SR, nebo na někter&eacute;m z e-shopů: <a href=\"http://www.shopkilpi.cz\">www.shopkilpi.cz</a>&nbsp;, <a href=\"http://www.hs-sport.cz\">www.hs-sport.cz</a> , <a href=\"http://www.envy-shop.cz\">www.envy-shop.cz</a> , <a href=\"http://www.kilpi-shop.sk\">www.kilpi-shop.sk</a> , <a href=\"http://www.envyeshop.com\">www.envyeshop.com</a> , <a href=\"http://www.kilpi4you.com\">www.kilpi4you.com</a> , teď můžete vyhr&aacute;t letn&iacute; pobyt pro dva v&nbsp;Tyrolsk&eacute; Zugspitz Areně!</h3>\n\n<p><span style=\"font-size:18px\"><strong>Soutěž prob&iacute;ha od 15.6. do 15.7.2016.&nbsp;</strong>Přejeme V&aacute;m hodně &scaron;těst&iacute; při slosov&aacute;n&iacute;!</span></p>\n\n<p><span style=\"font-size:18px\">Do soutěže se můžete zaregistrovat i v&iacute;cekr&aacute;t, pokud opakovaně nakoup&iacute;te v s&iacute;ti KILPI. Doklad z n&aacute;kupu si uschovejte pro př&iacute;pad v&yacute;hry.</span></p>\n\n<p><span style=\"font-size:18px\">V&yacute;hry v soutěži:&nbsp;<strong>3x&nbsp;letn&iacute; dovolen&aacute; pro 2 osoby, na 4 dny / 3 noci v 3*** hotelu s polopenz&iacute;, v&nbsp;rakousk&eacute;m regionu Tiroler Zugspitz Arena.</strong></span></p>\n\n<p>&nbsp;</p>\n","1","0","0"),
("726","1","4","7","content","Text k modulu GALÉRIA","_menu_3_text_1","","1","0","0"),
("727","1","4","8","content","Text k modulu FORMULÁR","_menu_4_text_1","","1","0","0"),
("728","1","4","9","content","Text k modulu O REGIÓNE","_menu_5_text_1","<h3>Zugspitze L&eacute;to pod slavnou horou</h3>\n\n<p>Cyklist&eacute;, milovn&iacute;ci turistiky, rodiny &ndash; pro ně se hod&iacute; letn&iacute; dovolen&aacute; na rakousk&eacute; straně velk&eacute; a zn&aacute;m&eacute; hory Zugspitze, v Tiroler Zugspitz Arena.</p>\n\n<p>Nach&aacute;z&iacute; se zde 150 turistick&yacute;ch tras a 100 okruhů pro horsk&aacute; kola o celkov&eacute; d&eacute;lce 4330 kilometrů. Turistům i bikerům se ov&scaron;em nab&iacute;zej&iacute; trasy různě obt&iacute;žn&eacute;, lehk&eacute; i těžk&eacute;. Oblast je vhodn&aacute; i pro zač&aacute;tečn&iacute;ky na horsk&eacute;m kolem, k dispozici jsou speci&aacute;ln&iacute; zač&aacute;tečnick&eacute; kursy techniky. Pohodov&iacute; jezdci si mohou vychutn&aacute;vat př&iacute;rodu při vyj&iacute;žďce k jezeru Heiterwanger See na &uacute;pat&iacute; vrcholů, zat&iacute;mco extr&eacute;mn&iacute; bikeři mohou využ&iacute;t můstků a přek&aacute;žek na &uacute;seku pro freeride v Grubigstein v Lermoos.</p>\n\n<p>Přijet je nejlep&scaron;&iacute; přes Německo &mdash; využ&iacute;t dosud nezpoplatněn&eacute; d&aacute;lnice do Garmisch-Partenkirchen. Dal&scaron;&iacute; informace jsou dostupn&eacute; na: <a href=\"http://www.zugspitzarena.com/en\">www.zugspitzarena.com</a></p>\n","1","0","0"),
("729","1","4","9","content","Ďalší text k modulu O REGIÓNE","_menu_5_text_2","<h4><span style=\"font-size:18px\">Aktivity v Tyrolsk&eacute; Zugspitz Areně</span></h4>\n\n<p>Oblast nab&iacute;z&iacute; i m&iacute;sto pro dal&scaron;&iacute; sporty či odpočinkov&eacute; aktivity. Běžci mohou vyzkou&scaron;et trail runningu; vydat se po různě obt&iacute;žn&yacute;ch tras&aacute;ch v horsk&eacute;m ter&eacute;nu. Možnost zkusit si lukostřelbu dostanou n&aacute;v&scaron;těvn&iacute;ci v Ehrwald. V oblasti je množstv&iacute; koupali&scaron;ť i nejdel&scaron;&iacute; letn&iacute; s&aacute;ňkařsk&aacute; dr&aacute;ha v Tyrolsku. A př&iacute;znivci n&aacute;ročn&eacute; vysokohorsk&eacute; turistiky si mohou v r&aacute;mci organizovan&eacute; v&yacute;pravy v průběhu pěti dnů v červenci nebo v z&aacute;ř&iacute; vyzkou&scaron;et v&yacute;stup na pět nejvy&scaron;&scaron;&iacute;ho hor v oblasti: Zugspitze je &ndash; logicky &ndash; tou posledn&iacute; horou.</p>\n\n<p>Ide&aacute;ln&iacute; pro pl&aacute;nov&aacute;n&iacute; dovolen&eacute; je aktivn&iacute; karta Z-Ticket. S n&iacute; je možn&eacute; zdarma nebo se slevou využ&iacute;t 25 volnočasov&yacute;ch aktivit. Mimo jin&eacute; zahrnuje j&iacute;zdu na Zugspitze a zpět, pět dal&scaron;&iacute;ch lanovek, v&scaron;ech autobusech v regionu, vstupy do mnoha baz&eacute;nů a jezer ke koup&aacute;n&iacute; a j&iacute;zdu koloběžkou monsterroller z Marienberg. <em>(Nab&iacute;dka plat&iacute; od 13.05. do 01.11.2016)</em></p>\n","1","0","0"),
("730","1","4","10","content","Text k modulu MAPA","_menu_6_text_1","<p>Mapa regionu</p>\n","1","0","0"),
("731","1","4","2","content","Text k modulu UBYTOVANIE 1","_menu_7_text_1","<p><strong>amiamo - Familotel Zell am See</strong></p>\n\n<p>Jako prvn&iacute; boutique hotel pro rodiny&nbsp;s dětmi jsme stanovili standardy pro&nbsp;v&yacute;jimečn&eacute; z&aacute;žitky z dovolen&eacute;: mal&yacute;,&nbsp;vybran&yacute; a individu&aacute;ln&iacute;, vyznamenan&yacute;&nbsp;nejvy&scaron;&scaron;&iacute; pečet&iacute; jakosti Q III. Luxusn&iacute;&nbsp;penzion Amiamo v kombinaci s&nbsp;kartou Zell am See-Kaprun zaručuje&nbsp;odpočinkovou, ale i vzru&scaron;uj&iacute;c&iacute;&nbsp;dovolenou pro celou rodinu. S v&iacute;ce&nbsp;než 20-ti letou zku&scaron;enost&iacute; nab&iacute;z&iacute;me&nbsp;<br />\nhl&iacute;d&aacute;n&iacute; dět&iacute; v vnitřn&iacute; sekci o plo&scaron;e&nbsp;500 m&sup2; s velk&yacute;m množstv&iacute;m aktivit.&nbsp;</p>\n\n<p>NOVINKA:&nbsp;Sekce Wellness o plo&scaron;e 300 m&sup2;&nbsp;disponuje 3 baz&eacute;ny, Babynariem&nbsp;a kompletně zrekonstruovanou&nbsp;sekc&iacute; saun&nbsp;s relaxačn&iacute; m&iacute;stnost&iacute;.&nbsp;</p>\n\n<p>Na jezeře Zeller&nbsp;See&nbsp;V&aacute;s&nbsp;oček&aacute;v&aacute;&nbsp;hotelov&aacute; pl&aacute;ž s bohatou nab&iacute;dkou!</p>\n","1","0","0"),
("732","1","4","12","content","Input Meno","form_base_name","Jméno","0","0","0"),
("733","1","4","12","content","Input Priezvisko","form_base_surname","Příjmení","0","0","0"),
("734","1","4","12","content","Input PSČ","form_base_psc","PSČ","0","0","0"),
("735","1","4","12","content","Input Mesto","form_base_city","Město","0","0","0"),
("736","1","4","12","content","Input Email","form_base_email","Email","0","0","0"),
("737","1","4","12","content","Input Doklad","form_extend_v1_doklad","Doklad o Vašem nákupu: (unikátní číslo účtenky  nebo číslo faktury z E-shopu)","0","0","0"),
("738","1","4","12","content","Input Otázka + odpovede","form_extend_v3_otazka","Je toto modré?","0","0","0"),
("739","1","4","12","content","Odpoveď A","form_extend_v3_odpoved_a","áno","0","0","0"),
("740","1","4","12","content","Odpoveď B","form_extend_v3_odpoved_b","neviem","0","0","0"),
("741","1","4","12","content","Odpoveď C","form_extend_v3_odpoved_c","možno","0","0","0"),
("742","1","4","4","content","Názov","field_word_nazov","Názov","0","0","0"),
("743","1","4","4","content","Adresa","field_word_adresa","Adresa","0","0","0"),
("744","1","4","4","content","Kontakt","field_word_kontakt","Kontakt","0","0","0"),
("745","1","4","4","content","Web","field_word_web","Web","0","0","0"),
("746","1","4","4","content","Hláška povinné pole","field_word_err","Toto pole je povinné","0","0","0"),
("747","1","4","4","content","Registrovať","field_word_sent","Registrovat","0","0","0"),
("748","1","4","4","content","Predchádzajúca (fotka)","field_word_previous","Předchozí","1","0","0"),
("749","1","4","4","content","Ďalšia (fotka)","field_word_next","Další","1","0","0"),
("750","1","4","4","content","Súhlasím s newslettrom","field_word_suhlas_news","Mám zájem o zasílání aktuálních novinek o Tiroler Zugspitz Arena (SOUHLAS ZDE).","0","0","0"),
("751","1","4","4","content","Súhlasím s podmienkami súťaže","field_word_suhlas_podm","Souhlasím s pravidly soutěže (PRAVIDLA ZDE).","0","0","0"),
("752","1","4","1","content","Kľúčové slová pre Google","keywords","soutěž Kilpi","1","0","0"),
("753","1","4","1","content","Popis pre Google","description","This competition has a first ID","1","0","0"),
("754","1","4","4","content","Súhlasím s podmienkami súťaže","field_word_dakujeme","Děkujeme za Vaši účast a přejeme Vám hodně štěstí v soutěži!","0","0","0"),
("755","1","4","12","image","Podmienky súťaže (PDF)","form_file_podmienky","122","0","0","0"),
("756","1","4","12","image","Newsletter (PDF)","form_file_newsletter","123","0","0","0"),
("757","1","4","4","content","Hláška možnosti novej registrácie","field_word_nova_registracia","Pokud máte další doklad o nákupu můžete přejít k nové registraci ZDE.","0","0","0"),
("758","1","4","13","content","Počet znakov vygenerovaného hashu","_email_conf_char","8","1","0","0"),
("759","1","4","13","content","Hláška, súťažiacemu ktorá mu príde na email po registracii.","_email_conf_sent_text","Děkujeme za registraci do soutěže a přejeme Vám hodně štěstí při slosování! ","1","0","0"),
("760","1","4","12","content","Telefónne číslo","form_base_tel_c","Telefonní číslo","0","0","0"),
("761","1","4","4","content","Hláška za hviezdičkou o povinných poliach","field_word_povinne_polia","","0","0","0"),
("762","1","4","2","image","Fotka loga k modulu UBYTOVANIE","_menu_7_image_2_1","59","0","0","0"),
("763","1","4","16","content","Názov hotelu 2","info_hotel_name_2","Sporthotel Falkenstein","0","0","0"),
("764","1","4","16","content","Adresa Hotela 2","info_hotel_addr_2","Nikolaus-Gassner-Str. 79   <br/>   A - 5710 Kaprun","1","0","0"),
("765","1","4","16","content","Telefón do hotela 2","info_hotel_tel_c_2","+43 6547 7122","1","0","0"),
("766","1","4","16","content","Email hotelu 2","info_hotel_email_2","sporthotel@falkenstein.at","1","0","0"),
("767","1","4","16","content","Text k modulu UBYTOVANIE 2","_menu_7_text_2","<p><strong>Das Falkenstein</strong></p>\n\n<p>Tady v Kaprunu a hotelu Falkenstein lze objevit spoustu vzru&scaron;uj&iacute;c&iacute;ch možnost&iacute; a z&aacute;bavy&nbsp;pro rodiny a děti. Každ&yacute; den může b&yacute;t spojen s nov&yacute;mi z&aacute;žitky a dojmy, ať už jde&nbsp;o zvl&aacute;&scaron;tn&iacute; rodinn&eacute; turistick&eacute; v&yacute;lety, čvacht&aacute;n&iacute; a klouz&aacute;n&iacute; v Tauern SPA Kaprun, v&yacute;let&nbsp;k alpsk&eacute; horsk&eacute; bobov&eacute; dr&aacute;ze &quot;Maisfiltzer&quot;, o n&aacute;v&scaron;těvu volnočasov&eacute;ho nebo n&aacute;rodn&iacute;ho&nbsp;parku nebo o mnoh&aacute; dal&scaron;&iacute; dobrodružstv&iacute; - z&aacute;bavě se nekladou ž&aacute;dn&eacute; hranice.</p>\n\n<p>V hotelu Falkenstein&nbsp;se nach&aacute;z&iacute; kromě&nbsp;prostorn&eacute;ho&nbsp;dětsk&eacute;ho hři&scaron;tě&nbsp;a dětsk&eacute; herny tak&eacute;&nbsp;velk&yacute; baz&eacute;n a najdete&nbsp;zde i&nbsp;chutnou&nbsp;Pinzgauerskou&nbsp;kuchyni s pestr&yacute;mi&nbsp;dětsk&yacute;mi menu&nbsp;- n&aacute;&scaron; maskot Falki&nbsp;se na v&aacute;s tě&scaron;&iacute;!</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n","1","0","0"),
("768","1","4","17","content","Text k modulu UBYTOVANIE 3","_menu_7_text_3","<p><strong>Dovolen&aacute; v Zell am See je dovolenou s požitkem - v hotelu Tirolerhof!</strong></p>\n\n<p>Jezero, hory, ledovec a stylov&yacute;, rodinn&yacute; 4-hvězdičkov&yacute; hotel superior v Zell am See &ndash; to je ide&aacute;ln&iacute; kombinace pro va&scaron;i dovolenou v Zell am See, v l&eacute;tě i v zimě. Budete m&iacute;t v&yacute;hled na jezero Zeller See, hory Schmittenh&ouml;he a Kitzsteinhorn se v&scaron;emi rozmanit&yacute;mi sportovn&iacute;mi a rekreačn&iacute;mi možnostmi a budete h&yacute;čk&aacute;ni v b&aacute;ječn&eacute;m a mimoř&aacute;dn&eacute;m hotelu kulin&aacute;řsk&yacute;mi specialitami nejvy&scaron;&scaron;&iacute; kvality. Nebo str&aacute;v&iacute;te dovolenou spojenou s golfem v Salcburku, kde budete m&iacute;t v&yacute;hled na n&aacute;dhern&eacute; hory a jezero oblasti Zell am See-Kaprun. Nebo si užijete ve dvou n&aacute;dhern&eacute; apartm&aacute;ny v r&aacute;mci romantick&eacute; dovolen&eacute;. Nebo si poř&aacute;dně odpočinete s wellness a l&aacute;zeňskou nab&iacute;dkou vy&scaron;&scaron;&iacute; tř&iacute;dy a načerp&aacute;te novou energii. Takto může vypadat va&scaron;e dal&scaron;&iacute; rekreačn&iacute; dovolen&aacute; v hotelu Tirolerhof Zell am See - v srdci Salcburku. Wellness hotel, čtyřhvězdičkov&yacute; hotel superior, hotel pro hosty s pejsky, relaxačn&iacute; hotel - v&scaron;echny tyto př&iacute;vlastky si hotel Tirolerhof plně zaslouž&iacute;.</p>\n\n<p>&nbsp;</p>\n\n<p><strong>Prožijte nezapomenutelnou dovolenou v hotelu Tirolerhof!</strong></p>\n","0","0","0"),
("769","1","4","17","content","Email hotelu 3","info_hotel_email_3","welcome@tirolerhof.co.at","0","0","0"),
("770","1","4","17","content","Telefón do hotela 3","info_hotel_tel_c_3","+43(0)6542/772-0","0","0","0"),
("771","1","4","17","content","Adresa Hotela 3","info_hotel_addr_3","Auerspergstrasse 5   <br/>   A - 5700 Zell am See","0","0","0"),
("772","1","4","17","content","Názov hotelu 3","info_hotel_name_3","Hotel Tirolerhof ****S","0","0","0"),
("773","1","4","16","image","Fotka loga k modulu UBYTOVANIE 2","_menu_7_image_1_2","66","1","0","0"),
("774","1","4","16","image","Fotka k modulu UBYTOVANIE 2","_menu_7_image_2_2","65","0","0","0"),
("775","1","4","17","image","Fotka loga k modulu UBYTOVANIE 3","_menu_7_image_1_3","51","0","0","0"),
("776","1","4","17","image","Fotka k modulu UBYTOVANIE 3","_menu_7_image_2_3","56","0","0","0"),
("777","1","4","2","content","Url adresa hotela 1","link_hotel_1","https://www.amiamo.at","1","0","0"),
("778","1","4","16","content","Url adresa hotela 2","link_hotel_2","http://www.falkenstein.at","1","0","0"),
("779","1","4","17","content","Url adresa hotela 3","link_hotel_3","http://www.tirolerhof.co.at/","0","0","0"),
("780","1","4","9","image","Druhá fotka modulu pre modul GALÉRIA","_menu_5_gallery_1","13","1","0","0"),
("781","1","4","5","image","Fotka v hlavnom slideri 2","_menu_1_image_2","115","1","0","0"),
("782","1","4","4","content","Po ukončení registrácie","field_word_koniec_registracie","<p>SOUTĚŽ BYLA UKONČENA 15. 7. 2016</p>\n\n<p>Slosov&aacute;n&iacute; bylo provedeno dne 18.07.2016 a z platn&yacute;ch registrac&iacute; byli vybr&aacute;ni 3 v&yacute;herci, dle pravidel soutěže.&nbsp;Dovolenkov&yacute; pobyt pro 2 osoby na 4 dny /3 noci v 3*** hotelu s polopenz&iacute;, v rakousk&eacute; Tiroler Zugspitz Arena,&nbsp;z&iacute;sk&aacute;vaj&iacute; :</p>\n\n<p><strong>Martin Medvid, 73401 Karvina, ČR</strong></p>\n\n<p><strong>Kateřina Kimlova, 79817 Smržice, ČR</strong></p>\n\n<p><strong>Karel Pekarek, 67923 Belec, ČR</strong></p>\n\n<p>V&yacute;herci budou kontaktov&aacute;ni provozovatelem soutěže ohledně převzet&iacute; pobytov&yacute;ch voucherů v nejbliž&scaron;&iacute;ch dnech.&nbsp;Pobytov&eacute; vouchery jsou platn&eacute; v letn&iacute;/podzimn&iacute; sezoně 2016 a nezahrnuj&iacute; dopravu.</p>\n\n<p><strong>V&Scaron;EM DĚKUJEME ZA &Uacute;ČAST A V&Yacute;HERCŮM SRDEČNE BLAHOPŘEJEME!</strong></p>\n\n<p><span style=\"font-size:11px\">Spr&aacute;vnost a platnost slosov&aacute;n&iacute; potvrzuj&iacute; provozovatel&eacute; soutěže:&nbsp;Turistick&yacute; region Tiroler Zugspitz Arena, Am Rettensee 1, 6632 Ehrwald, Rakousko&nbsp;a spoluorganiz&aacute;tor soutěže: PONATURE s.r.o., Roh&aacute;čova 188/37, 130 00 Praha 3, Česk&aacute; republika</span></p>\n","1","0","0"),
("783","1","4","11","content","Názov modulu pre modul O PARTNEROVI","_menu_name_8","O Partnerovi","0","0","0"),
("784","1","4","15","content","Email partnera","info_partner_email","eshop@kilpi.cz","1","0","0");
INSERT INTO dnt_microsites_composer VALUES
("785","1","4","15","content","Adresa partnera","info_partner_addr","U Hrůbků 251/119 <br/> 709 00 Ostrava","1","0","0"),
("786","1","4","15","content","Názov partnera","info_partner_name","PONATURE, s. r. o.","1","0","0"),
("787","1","4","15","content","Telefónne číslo na partnera","info_partner_tel_c","+420 777 734 330","1","0","0"),
("788","1","4","11","content","Text k modulu O PARTNEROVI 1","_menu_8_text_1","<p>KILPI - TESTOV&Aacute;NO SEVEREM A PROVĚŘENO LIDMI</p>\n\n<p>Outdoorov&eacute; oblečen&iacute; Kilpi je testovan&eacute; severem, jeho nespoutanost&iacute;, hrdost&iacute; a nekompromisn&iacute;mi n&aacute;roky země mytick&yacute;ch hrdinů. Pokud chcete zimu doopravdy prož&iacute;t, mus&iacute;te na ni b&yacute;t připraven&iacute;. Kilpi znamen&aacute; finsky &scaron;t&iacute;t. Tam, kde si př&iacute;roda i domy svou obranu už vybudovaly, potřebujete ji i vy. Spolehněte se na oblečen&iacute; a doplňky Kilpi. Budou va&scaron;&iacute;m &scaron;t&iacute;tem, d&iacute;ky kter&eacute;mu budete v bezpeč&iacute; a ochr&aacute;něni.</p>\n\n<p>V sortimentu Kilpi najdete kompletn&iacute; v&yacute;bavu pro zimu i l&eacute;to, doplňky i maličkosti. Obl&eacute;knete se do př&iacute;rody i do města, na sportov&aacute;n&iacute; i pro okamžiky odpočinku. Vybav&iacute;me v&aacute;s &uacute;čelov&yacute;mi a designov&yacute;mi bundami, skvěle padnouc&iacute;mi kalhotami, funkčn&iacute;m pr&aacute;dlem i stylov&yacute;mi tričky. A když mrazivou zimu vystř&iacute;d&aacute; žhav&eacute; l&eacute;to, vyt&aacute;hnete k vodě na&scaron;e plavky i dal&scaron;&iacute; letn&iacute; v&yacute;bavu.</p>\n","1","0","0"),
("789","1","4","1","content","Jazyková mutácia pre Facebook","_language","cs_CZ","1","0","0"),
("790","1","5","1","content","Template","layout","dnt_first","1","0","0"),
("791","1","5","15","content","Link partnera","link_partner","http://www.bahlsen.at","1","0","0"),
("792","1","5","3","content","Link regionu","link_region","http://ballonhotel.at","1","0","0"),
("793","1","5","1","content","Zobraziť na URL adrese","real_address","http://www.vyhrat.com/","1","0","0"),
("794","1","5","1","content","Facebook","social_fb","https://www.facebook.com/Ballonhotel-Thaller-215081959065/","1","0","0"),
("795","1","5","1","content","Twitter","social_twitter","https://twitter.com/","0","0","0"),
("796","1","5","1","content","Instagram","social_linked_in","https://www.linkedin.com/","0","0","0"),
("797","1","5","1","content","Mapa ","map_location","https://www.google.at/maps/place/Ballonhotel/@47.2307542,15.8639789,17z/data=!3m1!4b1!4m5!3m4!1s0x476e5e858731f7df:0x4f6546c5423fe6d!8m2!3d47.2307506!4d15.8661676","1","0","0"),
("798","1","5","1","image","Favicon","favicon","57","1","0","0"),
("799","1","5","1","content","Model farby R","_r","234","1","0","0"),
("800","1","5","1","content","Model farby G","_g","30","1","0","0"),
("801","1","5","1","content","Model farby B","_b","81","1","0","0"),
("802","1","5","1","content","Font","_font","roboto","1","0","0"),
("803","1","5","2","content","Názov hotelu 1","info_hotel_name_1","Familotel - amiamo","0","0","0"),
("804","1","5","2","content","Adresa Hotela 1","info_hotel_addr_1","Salzachtal Bundesstrasse 20   <br/>   A - 5700 Zell am See","1","0","0"),
("805","1","5","2","content","Telefón do hotela 1","info_hotel_tel_c_1","+43 6542 55355","1","0","0"),
("806","1","5","2","content","Email hotelu 1","info_hotel_email_1","hotel@amiamo.at","1","0","0"),
("807","1","5","3","content","Názov regiónu","info_region_name","BALLONHOTEL THALLER","1","0","0"),
("808","1","5","3","content","Adresa regiónu","info_region_addr","Hofkirchen 51  <br/>  A-8224 Kaindorf","1","0","0"),
("809","1","5","3","content","Telefónne číslo regiónu","info_region_tel_c","+43 (0) 3334 2262","1","0","0"),
("810","1","5","3","content","Email regiónu","info_region_email","office@ballonhotel.at","1","0","0"),
("811","1","5","1","content","Youtube video","youtube_video","https://vimeo.com/115393846","0","0","0"),
("812","1","5","15","image","Logo partnera","partner_logo","136","1","0","0"),
("813","1","5","3","image","Logo regiónu","region_logo","135","1","0","0"),
("814","1","5","5","image","Fotka v hlavnom slideri 1","_menu_1_image_1","131","1","0","0"),
("815","1","5","7","image","Fotka modulu pre modul GALÉRIA","_menu_3_image_1","129","1","0","0"),
("816","1","5","7","image","Druhá fotka modulu pre modul GALÉRIA","_menu_3_image_2","138","1","0","0"),
("817","1","5","2","image","Fotka k modulu UBYTOVANIE","_menu_7_image_1_1","63","1","0","0"),
("818","1","5","5","content","Názov modulu pre modul INFO","_menu_name_1","Intro","1","1","0"),
("819","1","5","6","content","Názov modulu pre modul O SÚŤAŽI","_menu_name_2","Gewinnspiel","0","0","0"),
("820","1","5","7","content","Názov modulu pre modul GALÉRIU","_menu_name_3","Galéria","0","0","0"),
("821","1","5","8","content","Názov modulu pre modul FORMULÁRU","_menu_name_4","Teilnahme","1","3","0"),
("822","1","5","9","content","Názov modulu pre modul O REGIONE","_menu_name_5","Ballonhotel Thaller","1","2","0"),
("823","1","5","10","content","Názov modulu pre modul MAPA","_menu_name_6","Mapa","0","0","0"),
("824","1","5","11","content","Názov modulu pre modul UBYTOVANIE","_menu_name_7","Hotel","0","0","0"),
("825","1","5","5","content","Text k modulu INFO","_menu_1_text_1","<p><span style=\"color:#FFFFFF\"><strong><span style=\"font-size:24px\">Mitspielen &amp; Abheben! Gewinnen Sie mit Bahlsen einen Urlaub inkl. Ballonfahrt im Ballonhotel Thaller</span></strong></span></p>\n","1","0","0"),
("826","1","5","6","content","Text k modulu O SÚŤAŽI","_menu_2_text_1","<h3><strong>Wir verlosen einen Urlaub f&uuml;r 2 Personen im Ballonhotel Thaller f&uuml;r 4 N&auml;chte, inklusive&nbsp;Ballonfahrt und Bahlsen Snacks Paket.</strong></h3>\n\n<p><span style=\"font-size:18px\">Teilnahmeformular ausf&uuml;llen, Frage richtig beantworten, und schon habt ihr die Chance&nbsp;auf diesen tollen Urlaub.</span></p>\n\n<p><span style=\"font-size:18px\">Das Gewinnspiel l&auml;uft von 15. Juli 2016 bis 15. September 2016. Teilnahmeschluss ist der 15. September 2016</span></p>\n\n<p>&nbsp;</p>\n","1","0","0"),
("827","1","5","7","content","Text k modulu GALÉRIA","_menu_3_text_1","<h3>Familienurlaub mit s&uuml;&szlig;en H&ouml;hepunkten</h3>\n\n<p>Im Ballonhotel kommt die S&uuml;&szlig;e auf ganz nat&uuml;rliche Art in Ihre Urlaubstage. Denn das auf Familienferien mit Ballonfahrten spezialisierte Hotel liegt mitten im fruchtbaren oststeirischen Apfelland. Das gesunde Obst ist vom knackigen Snack f&uuml;r zwischendurch bis zum duftenden Entspannen im Apfelbl&uuml;ten-Spa Ihr k&ouml;stlicher Begleiter.</p>\n\n<p>Und weil dieses bl&uuml;hende Urlaubsparadies f&uuml;r Gro&szlig; und Klein auch von oben seinen Reiz hat, ist die Ballonfahrt mit dem hoteleigenen Ballon ein hei&szlig;er Tipp f&uuml;r ein unvergessliches Naturerlebnis. Erleben Sie die s&uuml;&szlig;en H&ouml;hepunkte mit dem Familienzuckerl-Angebot ab &euro; 1.077,- pro Familie (&nbsp;2 Erwachsene und 1 Kind&nbsp;) und Woche mit Halbpension Plus, Familienprogramm, Lufti-Kinderclub mit Betreuung, Spa-Ben&uuml;tzung u.v.m.</p>\n","1","0","0"),
("828","1","5","8","content","Text k modulu FORMULÁR","_menu_4_text_1","","1","0","0"),
("829","1","5","9","content","Text k modulu O REGIÓNE","_menu_5_text_1","<h3>Urlaub mit unvergesslichen H&ouml;hepunkten</h3>\n\n<p>Das auf Ballonfahrten spezialisierte Hotel liegt mitten im fruchtbaren oststeirischen Apfelland und ist ein Geheimtipp f&uuml;r Abenteuerlustige, Bewegungsfreudige, Ruhesuchende und Romantiker. Die G&auml;ste profitieren von einem vielf&auml;ltigen Sportangebot und entspannen im Apfelbl&uuml;ten-Spa auf fruchtig-duftige Art. Die Verw&ouml;hnpension lockt mit kulinarischen H&ouml;hepunkten:</p>\n\n<ul>\n	<li>Willkommensgetr&auml;nk</li>\n	<li>Reichhaltiges Fr&uuml;hst&uuml;cksbuffet</li>\n	<li>Mittags-Snack</li>\n</ul>\n","1","0","0"),
("830","1","5","9","content","Ďalší text k modulu O REGIÓNE","_menu_5_text_2","<p>&nbsp;</p>\n\n<ul>\n	<li>Nachmittagsjause</li>\n	<li>4-g&auml;ngiges Wahlmen&uuml; am Abend und Salatbuffet</li>\n	<li>Ben&uuml;tzung des Wellnessbereiches Apfelbl&uuml;ten-Spa</li>\n	<li>Gratis Fahrradverleih</li>\n	<li>GenussCard &ndash; &uuml;ber 120 Ausflugsziele gratis besuchen (1. M&auml;rz bis 02. November 2016)</li>\n</ul>\n\n<p>Dieses spannende und attraktive Urlaubsparadies hat auch von oben seinen Reiz. Die Ballonfahrt mit dem hoteleigenen Ballon wird zum unvergesslichen Naturerlebnis.</p>\n\n<p>Erleben Sie unvergessliche Urlaubsmomente im Ballonhotel Thaller.</p>\n","1","0","0"),
("831","1","5","10","content","Text k modulu MAPA","_menu_6_text_1","<p>Mapa regionu</p>\n","1","0","0"),
("832","1","5","2","content","Text k modulu UBYTOVANIE 1","_menu_7_text_1","<p><strong>amiamo - Familotel Zell am See</strong></p>\n\n<p>Jako prvn&iacute; boutique hotel pro rodiny&nbsp;s dětmi jsme stanovili standardy pro&nbsp;v&yacute;jimečn&eacute; z&aacute;žitky z dovolen&eacute;: mal&yacute;,&nbsp;vybran&yacute; a individu&aacute;ln&iacute;, vyznamenan&yacute;&nbsp;nejvy&scaron;&scaron;&iacute; pečet&iacute; jakosti Q III. Luxusn&iacute;&nbsp;penzion Amiamo v kombinaci s&nbsp;kartou Zell am See-Kaprun zaručuje&nbsp;odpočinkovou, ale i vzru&scaron;uj&iacute;c&iacute;&nbsp;dovolenou pro celou rodinu. S v&iacute;ce&nbsp;než 20-ti letou zku&scaron;enost&iacute; nab&iacute;z&iacute;me&nbsp;<br />\nhl&iacute;d&aacute;n&iacute; dět&iacute; v vnitřn&iacute; sekci o plo&scaron;e&nbsp;500 m&sup2; s velk&yacute;m množstv&iacute;m aktivit.&nbsp;</p>\n\n<p>NOVINKA:&nbsp;Sekce Wellness o plo&scaron;e 300 m&sup2;&nbsp;disponuje 3 baz&eacute;ny, Babynariem&nbsp;a kompletně zrekonstruovanou&nbsp;sekc&iacute; saun&nbsp;s relaxačn&iacute; m&iacute;stnost&iacute;.&nbsp;</p>\n\n<p>Na jezeře Zeller&nbsp;See&nbsp;V&aacute;s&nbsp;oček&aacute;v&aacute;&nbsp;hotelov&aacute; pl&aacute;ž s bohatou nab&iacute;dkou!</p>\n","1","0","0"),
("833","1","5","12","content","Input Meno","form_base_name","Vorname","1","0","0"),
("834","1","5","12","content","Input Priezvisko","form_base_surname","Nachname","1","0","0"),
("835","1","5","12","content","Input PSČ","form_base_psc","PLZ","0","0","0"),
("836","1","5","12","content","Input Mesto","form_base_city","Stadt","0","0","0"),
("837","1","5","12","content","Input Email","form_base_email","E-mail","1","0","0"),
("838","1","5","12","content","Input Doklad","form_extend_v1_doklad","","0","0","0"),
("839","1","5","12","content","Input Otázka + odpovede","form_extend_v3_otazka","Welches ist die ideale Kombination für einen unvergesslichen Urlaub?","1","0","0"),
("840","1","5","12","content","Odpoveď A","form_extend_v3_odpoved_a","Wanderung mit gesundem Frühstück","1","0","0"),
("841","1","5","12","content","Odpoveď B","form_extend_v3_odpoved_b","Ballonfahrt im Ballonhotel Thaller über das oststeirische Apfelland mit knusprigen Bahlsen Snacks","1","0","0"),
("842","1","5","12","content","Odpoveď C","form_extend_v3_odpoved_c","Entspannung im Spa mit Wellness-Tee","1","0","0"),
("843","1","5","4","content","Názov","field_word_nazov","Názov","0","0","0"),
("844","1","5","4","content","Adresa","field_word_adresa","Adresa","0","0","0"),
("845","1","5","4","content","Kontakt","field_word_kontakt","Kontakt","0","0","0"),
("846","1","5","4","content","Web","field_word_web","Web","0","0","0"),
("847","1","5","4","content","Hláška povinné pole","field_word_err","Pflichtfelder","1","0","0"),
("848","1","5","4","content","Registrovať","field_word_sent","Teilnehmen","1","0","0"),
("849","1","5","4","content","Predchádzajúca (fotka)","field_word_previous","Vorheriges","1","0","0"),
("850","1","5","4","content","Ďalšia (fotka)","field_word_next","Nächstes","1","0","0"),
("851","1","5","4","content","Súhlasím s newslettrom","field_word_suhlas_news","Ja, ich stimme zu den Newsletter von Ballonhotel Thaller zu erhalten und meine Daten für weitere Marketingaktivitäten zur Verfügung zu stellen.","1","0","0"),
("852","1","5","4","content","Súhlasím s podmienkami súťaže","field_word_suhlas_podm","Ja, ich stimme den Teilnahmebedingungen zu. (Teilnahmebedingungen HIER).","1","0","0"),
("853","1","5","1","content","Kľúčové slová pre Google","keywords","gewinnspiel  Ballonhotel Thaller","1","0","0"),
("854","1","5","1","content","Popis pre Google","description","This competition has a first ID","1","0","0"),
("855","1","5","4","content","Súhlasím s podmienkami súťaže","field_word_dakujeme","Danke, Sie haben sich erfolgreich für das Gewinnspiel registriert.","1","0","0"),
("856","1","5","12","image","Podmienky súťaže (PDF)","form_file_podmienky","139","1","0","0"),
("857","1","5","12","image","Newsletter (PDF)","form_file_newsletter","68","0","0","0"),
("858","1","5","4","content","Hláška možnosti novej registrácie","field_word_nova_registracia","Jetzt Freunde einladen!","1","0","0"),
("859","1","5","13","content","Počet znakov vygenerovaného hashu","_email_conf_char","8","1","0","0"),
("860","1","5","13","content","Hláška, súťažiacemu ktorá mu príde na email po registracii.","_email_conf_sent_text","Danke, Sie haben sich erfolgreich für das Gewinnspiel registriert. Wir wünschen Ihnen viel Erfolg bei der Verlosung!","1","0","0"),
("861","1","5","12","content","Telefónne číslo","form_base_tel_c","Telefonní číslo","0","0","0"),
("862","1","5","4","content","Hláška za hviezdičkou o povinných poliach","field_word_povinne_polia","","1","0","0"),
("863","1","5","2","image","Fotka loga k modulu UBYTOVANIE","_menu_7_image_2_1","59","0","0","0"),
("864","1","5","16","content","Názov hotelu 2","info_hotel_name_2","Sporthotel Falkenstein","0","0","0"),
("865","1","5","16","content","Adresa Hotela 2","info_hotel_addr_2","Nikolaus-Gassner-Str. 79   <br/>   A - 5710 Kaprun","1","0","0"),
("866","1","5","16","content","Telefón do hotela 2","info_hotel_tel_c_2","+43 6547 7122","1","0","0"),
("867","1","5","16","content","Email hotelu 2","info_hotel_email_2","sporthotel@falkenstein.at","1","0","0"),
("868","1","5","16","content","Text k modulu UBYTOVANIE 2","_menu_7_text_2","<p><strong>Das Falkenstein</strong></p>\n\n<p>Tady v Kaprunu a hotelu Falkenstein lze objevit spoustu vzru&scaron;uj&iacute;c&iacute;ch možnost&iacute; a z&aacute;bavy&nbsp;pro rodiny a děti. Každ&yacute; den může b&yacute;t spojen s nov&yacute;mi z&aacute;žitky a dojmy, ať už jde&nbsp;o zvl&aacute;&scaron;tn&iacute; rodinn&eacute; turistick&eacute; v&yacute;lety, čvacht&aacute;n&iacute; a klouz&aacute;n&iacute; v Tauern SPA Kaprun, v&yacute;let&nbsp;k alpsk&eacute; horsk&eacute; bobov&eacute; dr&aacute;ze &quot;Maisfiltzer&quot;, o n&aacute;v&scaron;těvu volnočasov&eacute;ho nebo n&aacute;rodn&iacute;ho&nbsp;parku nebo o mnoh&aacute; dal&scaron;&iacute; dobrodružstv&iacute; - z&aacute;bavě se nekladou ž&aacute;dn&eacute; hranice.</p>\n\n<p>V hotelu Falkenstein&nbsp;se nach&aacute;z&iacute; kromě&nbsp;prostorn&eacute;ho&nbsp;dětsk&eacute;ho hři&scaron;tě&nbsp;a dětsk&eacute; herny tak&eacute;&nbsp;velk&yacute; baz&eacute;n a najdete&nbsp;zde i&nbsp;chutnou&nbsp;Pinzgauerskou&nbsp;kuchyni s pestr&yacute;mi&nbsp;dětsk&yacute;mi menu&nbsp;- n&aacute;&scaron; maskot Falki&nbsp;se na v&aacute;s tě&scaron;&iacute;!</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n","1","0","0"),
("869","1","5","17","content","Text k modulu UBYTOVANIE 3","_menu_7_text_3","<p><strong>Dovolen&aacute; v Zell am See je dovolenou s požitkem - v hotelu Tirolerhof!</strong></p>\n\n<p>Jezero, hory, ledovec a stylov&yacute;, rodinn&yacute; 4-hvězdičkov&yacute; hotel superior v Zell am See &ndash; to je ide&aacute;ln&iacute; kombinace pro va&scaron;i dovolenou v Zell am See, v l&eacute;tě i v zimě. Budete m&iacute;t v&yacute;hled na jezero Zeller See, hory Schmittenh&ouml;he a Kitzsteinhorn se v&scaron;emi rozmanit&yacute;mi sportovn&iacute;mi a rekreačn&iacute;mi možnostmi a budete h&yacute;čk&aacute;ni v b&aacute;ječn&eacute;m a mimoř&aacute;dn&eacute;m hotelu kulin&aacute;řsk&yacute;mi specialitami nejvy&scaron;&scaron;&iacute; kvality. Nebo str&aacute;v&iacute;te dovolenou spojenou s golfem v Salcburku, kde budete m&iacute;t v&yacute;hled na n&aacute;dhern&eacute; hory a jezero oblasti Zell am See-Kaprun. Nebo si užijete ve dvou n&aacute;dhern&eacute; apartm&aacute;ny v r&aacute;mci romantick&eacute; dovolen&eacute;. Nebo si poř&aacute;dně odpočinete s wellness a l&aacute;zeňskou nab&iacute;dkou vy&scaron;&scaron;&iacute; tř&iacute;dy a načerp&aacute;te novou energii. Takto může vypadat va&scaron;e dal&scaron;&iacute; rekreačn&iacute; dovolen&aacute; v hotelu Tirolerhof Zell am See - v srdci Salcburku. Wellness hotel, čtyřhvězdičkov&yacute; hotel superior, hotel pro hosty s pejsky, relaxačn&iacute; hotel - v&scaron;echny tyto př&iacute;vlastky si hotel Tirolerhof plně zaslouž&iacute;.</p>\n\n<p>&nbsp;</p>\n\n<p><strong>Prožijte nezapomenutelnou dovolenou v hotelu Tirolerhof!</strong></p>\n","0","0","0"),
("870","1","5","17","content","Email hotelu 3","info_hotel_email_3","welcome@tirolerhof.co.at","0","0","0"),
("871","1","5","17","content","Telefón do hotela 3","info_hotel_tel_c_3","+43(0)6542/772-0","0","0","0"),
("872","1","5","17","content","Adresa Hotela 3","info_hotel_addr_3","Auerspergstrasse 5   <br/>   A - 5700 Zell am See","0","0","0"),
("873","1","5","17","content","Názov hotelu 3","info_hotel_name_3","Hotel Tirolerhof ****S","0","0","0"),
("874","1","5","16","image","Fotka loga k modulu UBYTOVANIE 2","_menu_7_image_1_2","66","1","0","0"),
("875","1","5","16","image","Fotka k modulu UBYTOVANIE 2","_menu_7_image_2_2","65","0","0","0"),
("876","1","5","17","image","Fotka loga k modulu UBYTOVANIE 3","_menu_7_image_1_3","51","0","0","0"),
("877","1","5","17","image","Fotka k modulu UBYTOVANIE 3","_menu_7_image_2_3","56","0","0","0"),
("878","1","5","2","content","Url adresa hotela 1","link_hotel_1","https://www.amiamo.at","0","0","0"),
("879","1","5","16","content","Url adresa hotela 2","link_hotel_2","http://www.falkenstein.at","1","0","0"),
("880","1","5","17","content","Url adresa hotela 3","link_hotel_3","http://www.tirolerhof.co.at/","0","0","0"),
("881","1","5","9","image","Druhá fotka modulu pre modul GALÉRIA","_menu_5_gallery_1","16","1","0","0"),
("882","1","5","5","image","Fotka v hlavnom slideri 2","_menu_1_image_2","76","0","0","0"),
("883","1","5","4","content","Po ukončení registrácie","field_word_koniec_registracie","<p><span style=\"color:#FF0000\"><span style=\"font-size:22px\">Ospravedlňujeme sa, ale t&aacute;to s&uacute;ťaž už bola ukončen&aacute;.</span></span></p>\n\n<p><span style=\"font-size:18px\"><span style=\"color:#FF0000\">Gratulujeme v&yacute;hercovi <strong>Ferko Mrkvička</strong></span></span></p>\n","0","0","0"),
("884","1","5","11","content","Názov modulu pre modul O PARTNEROVI","_menu_name_8","Bahlsen","1","4","0");
INSERT INTO dnt_microsites_composer VALUES
("885","1","5","15","content","Email partnera","info_partner_email","marketing-austria@bahlsen.com","1","0","0"),
("886","1","5","15","content","Adresa partnera","info_partner_addr","Dresdner Straße 38-40 <br/> A - 1200 Wien","1","0","0"),
("887","1","5","15","content","Názov partnera","info_partner_name","Bahlsen GmbH & Co. KG","1","0","0"),
("888","1","5","15","content","Telefónne číslo na partnera","info_partner_tel_c","+43 1 33192-0","1","0","0"),
("889","1","5","11","content","Text k modulu O PARTNEROVI 1","_menu_8_text_1","<p><strong>Genie&szlig;e das hier und jetzt &nbsp;​</strong></p>\n\n<p>Im Leben gibt es viele Situationen in denen man sich gerne verw&ouml;hnt. Egal, ob zu Hause oder unterwegs, allein oder mit Freunden, zur Belohnung oder zum Entspannen. Bahlsen bietet für all diese Momente eine gro&szlig;e Auswahl an leckeren Keksen, Kuchen und seit kurzem auch pikantes Salzgeb&auml;ck.&nbsp;Denn: Es sind gerade die kleinen Auszeiten, die das Leben so sch&ouml;n machen. Genie&szlig;e das Leben in vollen Z&uuml;gen, lebe jetzt!</p>\n\n<p><a href=\"http://www.bahlsen.at\"><strong>Bahlsen. Live now.&nbsp;</strong></a></p>\n\n<p>Jetzt Fan werden: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<a href=\"https://www.facebook.com/bahlsenoesterreich/\">https://www.facebook.com/bahlsenoesterreich/</a>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<a href=\"https://www.instagram.com/bahlsenoesterreich/\">https://www.instagram.com/bahlsenoesterreich/</a></p>\n\n<p>&nbsp;</p>\n","1","0","0"),
("890","1","5","1","content","Jazyková mutácia pre Facebook","_language","de_DE","1","0","0"),
("891","1","1","12","image","Newsletter 2 (PDF)","form_file_newsletter_2","68","0","0","0"),
("892","1","2","12","image","Newsletter 2 (PDF)","form_file_newsletter_2","68","0","0","0"),
("893","1","3","12","image","Newsletter 2 (PDF)","form_file_newsletter_2","68","0","0","0"),
("894","1","4","12","image","Newsletter 2 (PDF)","form_file_newsletter_2","68","0","0","0"),
("895","1","5","12","image","Newsletter 2 (PDF)","form_file_newsletter_2","140","1","0","0"),
("896","1","1","4","content","Súhlasím s newslettrom 2","field_word_suhlas_news_2","News 2","1","0","0"),
("897","1","2","4","content","Súhlasím s newslettrom 2","field_word_suhlas_news_2","News 2","1","0","0"),
("898","1","3","4","content","Súhlasím s newslettrom 2","field_word_suhlas_news_2","News 2","1","0","0"),
("899","1","4","4","content","Súhlasím s newslettrom 2","field_word_suhlas_news_2","News 2","1","0","0"),
("900","1","5","4","content","Súhlasím s newslettrom 2","field_word_suhlas_news_2","Ja, ich stimme zu den Newsletter von der Firma Bahlsen zu erhalten und meine Daten für weitere Marketingaktivitäten zur Verfügung zu stellen.","1","0","0"),
("901","1","6","1","content","Template","layout","dnt_first","1","0","0"),
("902","1","6","15","content","Link partnera","link_partner","http://leibniz.at","1","0","0"),
("903","1","6","3","content","Link regionu","link_region","http://www.steiermark.com/familie","1","0","0"),
("904","1","6","1","content","Zobraziť na URL adrese","real_address","http://www.vyhrat.com/","1","0","0"),
("905","1","6","1","content","Facebook","social_fb","https://www.facebook.com/Leibniz/","1","0","0"),
("906","1","6","1","content","Twitter","social_twitter","https://twitter.com/","0","0","0"),
("907","1","6","1","content","Instagram","social_linked_in","https://www.linkedin.com/","0","0","0"),
("908","1","6","1","content","Mapa ","map_location","https://www.google.com/maps/place/Steiermark+Tourismus/@47.2652018,14.7069775,9z/data=!4m5!3m4!1s0x476e4b2050250b93:0x30c0a55abf550e9c!8m2!3d47.0428792!4d15.4881532?hl=at-AT","1","0","0"),
("909","1","6","1","image","Favicon","favicon","57","1","0","0"),
("910","1","6","1","content","Model farby R","_r","254","1","0","0"),
("911","1","6","1","content","Model farby G","_g","200","1","0","0"),
("912","1","6","1","content","Model farby B","_b","0","1","0","0"),
("913","1","6","1","content","Font","_font","Arial","1","0","0"),
("914","1","6","2","content","Názov hotelu 1","info_hotel_name_1","Familotel - amiamo","0","0","0"),
("915","1","6","2","content","Adresa Hotela 1","info_hotel_addr_1","Salzachtal Bundesstrasse 20   <br/>   A - 5700 Zell am See","1","0","0"),
("916","1","6","2","content","Telefón do hotela 1","info_hotel_tel_c_1","+43 6542 55355","1","0","0"),
("917","1","6","2","content","Email hotelu 1","info_hotel_email_1","hotel@amiamo.at","1","0","0"),
("918","1","6","3","content","Názov regiónu","info_region_name","Steirische Tourismus GmbH","1","0","0"),
("919","1","6","3","content","Adresa regiónu","info_region_addr","St.-Peter-Hauptstrasse 243 <br/> A-8042 Graz","1","0","0"),
("920","1","6","3","content","Telefónne číslo regiónu","info_region_tel_c","+43/(0)316 4003-0","1","0","0"),
("921","1","6","3","content","Email regiónu","info_region_email","info@steiermark.com","1","0","0"),
("922","1","6","1","content","Youtube video","youtube_video","6rbrBBv20GM","1","0","0"),
("923","1","6","15","image","Logo partnera","partner_logo","149","1","0","0"),
("924","1","6","3","image","Logo regiónu","region_logo","142","1","0","0"),
("925","1","6","5","image","Fotka v hlavnom slideri 1","_menu_1_image_1","143","1","0","0"),
("926","1","6","7","image","Fotka modulu pre modul GALÉRIA","_menu_3_image_1","144","1","0","0"),
("927","1","6","7","image","Druhá fotka modulu pre modul GALÉRIA","_menu_3_image_2","145","1","0","0"),
("928","1","6","2","image","Fotka k modulu UBYTOVANIE","_menu_7_image_1_1","63","1","0","0"),
("929","1","6","5","content","Názov modulu pre modul INFO","_menu_name_1","Intro","1","1","0"),
("930","1","6","6","content","Názov modulu pre modul O SÚŤAŽI","_menu_name_2","Gewinnspiel","0","0","0"),
("931","1","6","7","content","Názov modulu pre modul GALÉRIU","_menu_name_3","Galerie","0","0","0"),
("932","1","6","8","content","Názov modulu pre modul FORMULÁRU","_menu_name_4","Teilnahme","1","3","0"),
("933","1","6","9","content","Názov modulu pre modul O REGIONE","_menu_name_5","FamilienUrlaub Steiermark","1","2","0"),
("934","1","6","10","content","Názov modulu pre modul MAPA","_menu_name_6","Mapa","0","0","0"),
("935","1","6","11","content","Názov modulu pre modul UBYTOVANIE","_menu_name_7","Ubytování","0","0","0"),
("936","1","6","5","content","Text k modulu INFO","_menu_1_text_1","<p><span style=\"font-family:lucida sans unicode,lucida grande,sans-serif\"><span style=\"color:#006633\"><span style=\"font-size:24px\">Gewinne jetzt mit Leibniz einen von 3&nbsp;FamilienUrlauben</span></span></span><br />\n<span style=\"font-family:lucida sans unicode,lucida grande,sans-serif\"><span style=\"color:#006633\"><span style=\"font-size:24px\">in der Steiermark</span></span></span></p>\n","1","0","0"),
("937","1","6","6","content","Text k modulu O SÚŤAŽI","_menu_2_text_1","<h3><strong>Leibniz und die Steiermark verlosen 3&nbsp;Urlaubspakete f&uuml;r je 2 Erwachsene und 2 Kinder &agrave; 2&nbsp;N&auml;chte in einem Familienhotel der&nbsp;Steiermark&nbsp;sowie je ein Leibniz Keks&lsquo;n Cream Produkt&nbsp;​Package</strong></h3>\n\n<p><span style=\"font-size:18px\">Teilnahmeformular ausf&uuml;llen, Frage richtig beantworten, und schon habt ihr die Chance&nbsp;auf diesen tollen FamilienUrlaub.</span></p>\n\n<p><span style=\"font-size:18px\">Das Gewinnspiel l&auml;uft von 18. August&nbsp;2016 bis 15. Oktober 2016. Teilnahmeschluss ist der 15. Oktober 2016</span></p>\n","1","0","0"),
("938","1","6","7","content","Text k modulu GALÉRIA","_menu_3_text_1","","1","0","0"),
("939","1","6","8","content","Text k modulu FORMULÁR","_menu_4_text_1","","1","0","0"),
("940","1","6","9","content","Text k modulu O REGIÓNE","_menu_5_text_1","<p><span style=\"font-size:14px\"><strong>FamilienUrlaub Steiermark</strong></span></p>\n\n<p><span style=\"font-size:14px\">Abenteuerliche Felsgipfel, geheimnisvolle W&auml;lder, bl&uuml;hende Almen und kristallklare&nbsp;Seen im Norden. Sanfte Weinberge, bunte Obstg&auml;rten und kinderleichte Radwege&nbsp;im S&uuml;den. Nichts wie raus in die Natur! Zum Toben, Spielen und Baden.</span></p>\n\n<p><span style=\"font-size:14px\">&bdquo;FamilienUrlaub-Steiermark&ldquo;, das sind 19 gepr&uuml;fte Familienhotels und &ndash;pensionen (vom Urlaub-am-Bauernhof bis zum 4*-Hotel) sowie 8 kinderfreundliche Ausflugsziele quer durch die Steiermark verteilt, die qualitativ hochwertige Angebote f&uuml;r einen naturnahen Urlaub anbieten.</span></p>\n\n<p><span style=\"font-size:14px\">Im Mittelpunkt unseres Urlaubsangebots steht das Erleben in der Natur. Unverf&auml;lscht und echt werden Kinder und ihre erwachsenen Begleiter den Urlaub im Gr&uuml;nen Herz &Ouml;sterreichs genie&szlig;en. Jeder Betrieb vermittelt sein individuelles Naturerlebnis.</span></p>\n\n<p><span style=\"font-size:14px\"><strong>Regelm&auml;&szlig;ige Qualit&auml;ts&uuml;berpr&uuml;fung</strong></span></p>\n\n<p><span style=\"font-size:14px\">Einen tierisch-tollen Familienurlaub garantieren die drei bis f&uuml;nf Pantertatzen &ndash; ein au&szlig;ergew&ouml;hnliches G&uuml;tesiegel, das &uuml;ber die familienfreundliche Ausstattung der einzelnen Familienhotels und -pensionen informiert. Kinderbetreuung, Erm&auml;&szlig;igungen und Kinderrestaurants beispielsweise sind ab drei Tatzen selbstverst&auml;ndlich.</span></p>\n","1","0","0"),
("941","1","6","9","content","Ďalší text k modulu O REGIÓNE","_menu_5_text_2","<p>&nbsp;</p>\n\n<p><span style=\"font-size:14px\">In Betrieben mit vier Tatzen warten au&szlig;erdem Babysitter, Themenabende und ein Fahrradverleih auf die Rasselbande. F&uuml;nf Tatzen: Ob Streichelzoo, sicheres Schwimmbad oder S&auml;fte all-inclusive&nbsp;&ndash; kleine Raubkatzen finden hier die ideale Urlaubsmanege.</span></p>\n\n<p><span style=\"font-size:14px\"><strong>ALMSOMMER F&Uuml;R FAMILIEN</strong></span></p>\n\n<p><span style=\"font-size:14px\">G&uuml;ltig: 14.05.2016 - 31.10.2016</span></p>\n\n<ul>\n	<li><span style=\"font-size:14px\">7 N&auml;chte in der ***Unterkunft inklusive Halbpension mit Wanderjausenbuffet &amp; 3 gef&uuml;hrte Wanderungen</span></li>\n	<li><span style=\"font-size:14px\">Grill- und H&uuml;ttenabend, Musik zum Mitsingen</span></li>\n	<li><span style=\"font-size:14px\">Jagd nach dem gr&uuml;nen Panther, Pony reiten, Tiere f&uuml;ttern, Eselwanderung mit Lagerfeuer!</span></li>\n	<li><span style=\"font-size:14px\">Freie Ben&uuml;tzung der Almwellnessanlage</span></li>\n</ul>\n\n<p><span style=\"font-size:14px\"><strong>Preis pro Erwachsenem im Doppelzimmer ab &euro; 680,-</strong></span></p>\n\n<p><span style=\"font-size:14px\">Kinder bis 11 Jahre gratis (2.7. -&nbsp;16.7.&nbsp;und 3.9. -&nbsp;10.9.2016)</span><strong>&nbsp;</strong></p>\n\n<p><span style=\"font-size:14px\"><a href=\"http://www.familienurlaub-steiermark.at\">Weitere Informationen, Angebote und Katalogbestellungen HIER!</a></span></p>\n","1","0","0"),
("942","1","6","10","content","Text k modulu MAPA","_menu_6_text_1","<p>Mapa regionu</p>\n","1","0","0"),
("943","1","6","2","content","Text k modulu UBYTOVANIE 1","_menu_7_text_1","<p><strong>amiamo - Familotel Zell am See</strong></p>\n\n<p>Jako prvn&iacute; boutique hotel pro rodiny&nbsp;s dětmi jsme stanovili standardy pro&nbsp;v&yacute;jimečn&eacute; z&aacute;žitky z dovolen&eacute;: mal&yacute;,&nbsp;vybran&yacute; a individu&aacute;ln&iacute;, vyznamenan&yacute;&nbsp;nejvy&scaron;&scaron;&iacute; pečet&iacute; jakosti Q III. Luxusn&iacute;&nbsp;penzion Amiamo v kombinaci s&nbsp;kartou Zell am See-Kaprun zaručuje&nbsp;odpočinkovou, ale i vzru&scaron;uj&iacute;c&iacute;&nbsp;dovolenou pro celou rodinu. S v&iacute;ce&nbsp;než 20-ti letou zku&scaron;enost&iacute; nab&iacute;z&iacute;me&nbsp;<br />\nhl&iacute;d&aacute;n&iacute; dět&iacute; v vnitřn&iacute; sekci o plo&scaron;e&nbsp;500 m&sup2; s velk&yacute;m množstv&iacute;m aktivit.&nbsp;</p>\n\n<p>NOVINKA:&nbsp;Sekce Wellness o plo&scaron;e 300 m&sup2;&nbsp;disponuje 3 baz&eacute;ny, Babynariem&nbsp;a kompletně zrekonstruovanou&nbsp;sekc&iacute; saun&nbsp;s relaxačn&iacute; m&iacute;stnost&iacute;.&nbsp;</p>\n\n<p>Na jezeře Zeller&nbsp;See&nbsp;V&aacute;s&nbsp;oček&aacute;v&aacute;&nbsp;hotelov&aacute; pl&aacute;ž s bohatou nab&iacute;dkou!</p>\n","1","0","0"),
("944","1","6","12","content","Input Meno","form_base_name","Vorname","1","0","0"),
("945","1","6","12","content","Input Priezvisko","form_base_surname","Nachname","1","0","0"),
("946","1","6","12","content","Input PSČ","form_base_psc","PLZ","0","0","0"),
("947","1","6","12","content","Input Mesto","form_base_city","Stadt","0","0","0"),
("948","1","6","12","content","Input Email","form_base_email","E-mail","1","0","0"),
("949","1","6","12","content","Input Doklad","form_extend_v1_doklad","Einkaufsbeleg Nr.","0","0","0"),
("950","1","6","12","content","Input Otázka + odpovede","form_extend_v3_otazka","Wie viele geprüfte Familienhotels gehören zu „FamilienUrlaub Steiermark“?","1","0","0"),
("951","1","6","12","content","Odpoveď A","form_extend_v3_odpoved_a","9","1","0","0"),
("952","1","6","12","content","Odpoveď B","form_extend_v3_odpoved_b","19","1","0","0"),
("953","1","6","12","content","Odpoveď C","form_extend_v3_odpoved_c","29","1","0","0"),
("954","1","6","4","content","Názov","field_word_nazov","Názov","0","0","0"),
("955","1","6","4","content","Adresa","field_word_adresa","Adresa","0","0","0"),
("956","1","6","4","content","Kontakt","field_word_kontakt","Kontakt","0","0","0"),
("957","1","6","4","content","Web","field_word_web","Web","0","0","0"),
("958","1","6","4","content","Hláška povinné pole","field_word_err","Pflichtfelder","1","0","0"),
("959","1","6","4","content","Registrovať","field_word_sent","Teilnehmen","1","0","0"),
("960","1","6","4","content","Predchádzajúca (fotka)","field_word_previous","Vorheriges","1","0","0"),
("961","1","6","4","content","Ďalšia (fotka)","field_word_next","Nächstes","1","0","0"),
("962","1","6","4","content","Súhlasím s newslettrom","field_word_suhlas_news","Ja, ich stimme zu, den Newsletter von Steiermark Tourismus zu erhalten und meine Daten für weitere Marketingaktivitäten zur Verfügung zu stellen.","1","0","0"),
("963","1","6","4","content","Súhlasím s podmienkami súťaže","field_word_suhlas_podm","Ja, ich stimme den Teilnahmebedingungen zu. (Teilnahmebedingungen HIER).","1","0","0"),
("964","1","6","1","content","Kľúčové slová pre Google","keywords","gewinnspiel Leibniz Steiermark","1","0","0"),
("965","1","6","1","content","Popis pre Google","description","This competition has a first ID","1","0","0"),
("966","1","6","4","content","Súhlasím s podmienkami súťaže","field_word_dakujeme","Danke, Sie haben sich erfolgreich für das Gewinnspiel registriert.","1","0","0"),
("967","1","6","12","image","Podmienky súťaže (PDF)","form_file_podmienky","274","1","0","0"),
("968","1","6","12","image","Newsletter (PDF)","form_file_newsletter","68","0","0","0"),
("969","1","6","4","content","Hláška možnosti novej registrácie","field_word_nova_registracia","Jetzt Freunde einladen!","1","0","0"),
("970","1","6","13","content","Počet znakov vygenerovaného hashu","_email_conf_char","8","1","0","0"),
("971","1","6","13","content","Hláška, súťažiacemu ktorá mu príde na email po registracii.","_email_conf_sent_text","Danke, Sie haben sich erfolgreich für das Gewinnspiel registriert. Wir wünschen Ihnen viel Erfolg bei der Verlosung!","1","0","0"),
("972","1","6","12","content","Telefónne číslo","form_base_tel_c","Telefonní číslo","0","0","0"),
("973","1","6","4","content","Hláška za hviezdičkou o povinných poliach","field_word_povinne_polia","","1","0","0"),
("974","1","6","2","image","Fotka loga k modulu UBYTOVANIE","_menu_7_image_2_1","59","0","0","0"),
("975","1","6","16","content","Názov hotelu 2","info_hotel_name_2","Sporthotel Falkenstein","0","0","0"),
("976","1","6","16","content","Adresa Hotela 2","info_hotel_addr_2","Nikolaus-Gassner-Str. 79   <br/>   A - 5710 Kaprun","1","0","0"),
("977","1","6","16","content","Telefón do hotela 2","info_hotel_tel_c_2","+43 6547 7122","1","0","0"),
("978","1","6","16","content","Email hotelu 2","info_hotel_email_2","sporthotel@falkenstein.at","1","0","0"),
("979","1","6","16","content","Text k modulu UBYTOVANIE 2","_menu_7_text_2","<p><strong>Das Falkenstein</strong></p>\n\n<p>Tady v Kaprunu a hotelu Falkenstein lze objevit spoustu vzru&scaron;uj&iacute;c&iacute;ch možnost&iacute; a z&aacute;bavy&nbsp;pro rodiny a děti. Každ&yacute; den může b&yacute;t spojen s nov&yacute;mi z&aacute;žitky a dojmy, ať už jde&nbsp;o zvl&aacute;&scaron;tn&iacute; rodinn&eacute; turistick&eacute; v&yacute;lety, čvacht&aacute;n&iacute; a klouz&aacute;n&iacute; v Tauern SPA Kaprun, v&yacute;let&nbsp;k alpsk&eacute; horsk&eacute; bobov&eacute; dr&aacute;ze &quot;Maisfiltzer&quot;, o n&aacute;v&scaron;těvu volnočasov&eacute;ho nebo n&aacute;rodn&iacute;ho&nbsp;parku nebo o mnoh&aacute; dal&scaron;&iacute; dobrodružstv&iacute; - z&aacute;bavě se nekladou ž&aacute;dn&eacute; hranice.</p>\n\n<p>V hotelu Falkenstein&nbsp;se nach&aacute;z&iacute; kromě&nbsp;prostorn&eacute;ho&nbsp;dětsk&eacute;ho hři&scaron;tě&nbsp;a dětsk&eacute; herny tak&eacute;&nbsp;velk&yacute; baz&eacute;n a najdete&nbsp;zde i&nbsp;chutnou&nbsp;Pinzgauerskou&nbsp;kuchyni s pestr&yacute;mi&nbsp;dětsk&yacute;mi menu&nbsp;- n&aacute;&scaron; maskot Falki&nbsp;se na v&aacute;s tě&scaron;&iacute;!</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n","1","0","0"),
("980","1","6","17","content","Text k modulu UBYTOVANIE 3","_menu_7_text_3","<p><strong>Dovolen&aacute; v Zell am See je dovolenou s požitkem - v hotelu Tirolerhof!</strong></p>\n\n<p>Jezero, hory, ledovec a stylov&yacute;, rodinn&yacute; 4-hvězdičkov&yacute; hotel superior v Zell am See &ndash; to je ide&aacute;ln&iacute; kombinace pro va&scaron;i dovolenou v Zell am See, v l&eacute;tě i v zimě. Budete m&iacute;t v&yacute;hled na jezero Zeller See, hory Schmittenh&ouml;he a Kitzsteinhorn se v&scaron;emi rozmanit&yacute;mi sportovn&iacute;mi a rekreačn&iacute;mi možnostmi a budete h&yacute;čk&aacute;ni v b&aacute;ječn&eacute;m a mimoř&aacute;dn&eacute;m hotelu kulin&aacute;řsk&yacute;mi specialitami nejvy&scaron;&scaron;&iacute; kvality. Nebo str&aacute;v&iacute;te dovolenou spojenou s golfem v Salcburku, kde budete m&iacute;t v&yacute;hled na n&aacute;dhern&eacute; hory a jezero oblasti Zell am See-Kaprun. Nebo si užijete ve dvou n&aacute;dhern&eacute; apartm&aacute;ny v r&aacute;mci romantick&eacute; dovolen&eacute;. Nebo si poř&aacute;dně odpočinete s wellness a l&aacute;zeňskou nab&iacute;dkou vy&scaron;&scaron;&iacute; tř&iacute;dy a načerp&aacute;te novou energii. Takto může vypadat va&scaron;e dal&scaron;&iacute; rekreačn&iacute; dovolen&aacute; v hotelu Tirolerhof Zell am See - v srdci Salcburku. Wellness hotel, čtyřhvězdičkov&yacute; hotel superior, hotel pro hosty s pejsky, relaxačn&iacute; hotel - v&scaron;echny tyto př&iacute;vlastky si hotel Tirolerhof plně zaslouž&iacute;.</p>\n\n<p>&nbsp;</p>\n\n<p><strong>Prožijte nezapomenutelnou dovolenou v hotelu Tirolerhof!</strong></p>\n","0","0","0"),
("981","1","6","17","content","Email hotelu 3","info_hotel_email_3","welcome@tirolerhof.co.at","0","0","0"),
("982","1","6","17","content","Telefón do hotela 3","info_hotel_tel_c_3","+43(0)6542/772-0","0","0","0"),
("983","1","6","17","content","Adresa Hotela 3","info_hotel_addr_3","Auerspergstrasse 5   <br/>   A - 5700 Zell am See","0","0","0"),
("984","1","6","17","content","Názov hotelu 3","info_hotel_name_3","Hotel Tirolerhof ****S","0","0","0");
INSERT INTO dnt_microsites_composer VALUES
("985","1","6","16","image","Fotka loga k modulu UBYTOVANIE 2","_menu_7_image_1_2","66","1","0","0"),
("986","1","6","16","image","Fotka k modulu UBYTOVANIE 2","_menu_7_image_2_2","65","0","0","0"),
("987","1","6","17","image","Fotka loga k modulu UBYTOVANIE 3","_menu_7_image_1_3","51","0","0","0"),
("988","1","6","17","image","Fotka k modulu UBYTOVANIE 3","_menu_7_image_2_3","56","0","0","0"),
("989","1","6","2","content","Url adresa hotela 1","link_hotel_1","https://www.amiamo.at","1","0","0"),
("990","1","6","16","content","Url adresa hotela 2","link_hotel_2","http://www.falkenstein.at","1","0","0"),
("991","1","6","17","content","Url adresa hotela 3","link_hotel_3","http://www.tirolerhof.co.at/","0","0","0"),
("992","1","6","9","image","Druhá fotka modulu pre modul GALÉRIA","_menu_5_gallery_1","19","1","0","0"),
("993","1","6","5","image","Fotka v hlavnom slideri 2","_menu_1_image_2","190","1","0","0"),
("994","1","6","4","content","Po ukončení registrácie","field_word_koniec_registracie","<p><span style=\"font-size:14px\"><strong>Das Gewinnspiel wurde bereits beendet!</strong></span></p>\n\n<p><span style=\"font-size:14px\">Vielen Dank f&uuml;r die rege Teilnahme!</span></p>\n\n<p><span style=\"font-size:14px\">Wir freuen uns nun unsere f&uuml;nf Gewinner, welchen wir sehr herzlich gratulieren m&ouml;chten, bekanntgeben zu d&uuml;rfen.</span></p>\n\n<p><span style=\"font-size:14px\">Gewonnen haben:</span></p>\n","0","0","0"),
("995","1","6","11","content","Názov modulu pre modul O PARTNEROVI","_menu_name_8","Leibniz","1","4","0"),
("996","1","6","15","content","Email partnera","info_partner_email","marketing-austria@bahlsen.com","0","0","0"),
("997","1","6","15","content","Adresa partnera","info_partner_addr","Dresdner Straße 38-40 <br/> A - 1200 Wien","1","0","0"),
("998","1","6","15","content","Názov partnera","info_partner_name","Bahlsen GmbH & Co. KG","1","0","0"),
("999","1","6","15","content","Telefónne číslo na partnera","info_partner_tel_c","+43 1 33192-0","1","0","0"),
("1000","1","6","11","content","Text k modulu O PARTNEROVI 1","_menu_8_text_1","<p>&nbsp;</p>\n\n<p><span style=\"font-size:18px\"><strong>Jetzt Neu! Leibniz Keks&rsquo;n Cream!</strong></span></p>\n\n<p>Schon probiert?</p>\n\n<p>Ein wahres Dream-Team. Der Original Leibniz Butterkeks mit 52 Z&auml;hnen und die leckere Schokoladencreme. Mit dieser Kombination und der praktischen Verpackung mit Wiederverschluss ist Keks&rsquo;n Cream der perfekte Keksgenuss f&uuml;r die ganze Familie.</p>\n\n<p><a href=\"http://www.leibniz.at\">Hier geht&rsquo;s zu mehr Produktinfos</a></p>\n","1","0","0"),
("1001","1","6","1","content","Jazyková mutácia pre Facebook","_language","de_DE","1","0","0"),
("1002","1","6","12","image","Newsletter 2 (PDF)","form_file_newsletter_2","68","1","0","0"),
("1003","1","6","4","content","Súhlasím s newslettrom 2","field_word_suhlas_news_2","Ja, ich stimme zu, den Newsletter von der Marke Leibniz zu erhalten und meine Daten für weitere Marketingaktivitäten zur Verfügung zu stellen.","1","0","0"),
("1004","1","7","1","content","Template","layout","dnt_first","1","0","0"),
("1005","1","7","15","content","Link partnera","link_partner","http://www.intersport.at","1","0","0"),
("1006","1","7","3","content","Link regionu","link_region","http://www.region-villach.at","1","0","0"),
("1007","1","7","1","content","Zobraziť na URL adrese","real_address","http://www.vyhrat.com/","1","0","0"),
("1008","1","7","1","content","Facebook","social_fb","https://www.facebook.com/intersportAT","1","0","0"),
("1009","1","7","1","content","Twitter","social_twitter","https://twitter.com/","0","0","0"),
("1010","1","7","1","content","Instagram","social_linked_in","https://www.linkedin.com/","0","0","0"),
("1011","1","7","1","content","Mapa ","map_location","https://www.google.at/maps/place/Villach/@46.5721402,13.6139862,10z/data=!4m5!3m4!1s0x477083377b294137:0xad499e6600eff7e4!8m2!3d46.60856!4d13.85062","1","0","0"),
("1012","1","7","1","image","Favicon","favicon","57","1","0","0"),
("1013","1","7","1","content","Model farby R","_r","0","1","0","0"),
("1014","1","7","1","content","Model farby G","_g","112","1","0","0"),
("1015","1","7","1","content","Model farby B","_b","184","1","0","0"),
("1016","1","7","1","content","Font","_font","Arial","1","0","0"),
("1017","1","7","2","content","Názov hotelu 1","info_hotel_name_1","Hotel Karnerhof ****S","1","0","0"),
("1018","1","7","2","content","Adresa Hotela 1","info_hotel_addr_1","Karnerhofweg 10   <br/>   A - 9580 Egg am Faaker See","1","0","0"),
("1019","1","7","2","content","Telefón do hotela 1","info_hotel_tel_c_1","+43 4254 2188","1","0","0"),
("1020","1","7","2","content","Email hotelu 1","info_hotel_email_1","hotel@karnerhof.com","1","0","0"),
("1021","1","7","3","content","Názov regiónu","info_region_name","Region Villach Tourismus GmbH","1","0","0"),
("1022","1","7","3","content","Adresa regiónu","info_region_addr","Töbringer Straße 1 <br/>  A-9523 Villach-Landskron","1","0","0"),
("1023","1","7","3","content","Telefónne číslo regiónu","info_region_tel_c","+43 (0) 4242 42 000","1","0","0"),
("1024","1","7","3","content","Email regiónu","info_region_email","office@region-villach.at","1","0","0"),
("1025","1","7","1","content","Youtube video","youtube_video","QLnkleZTU-E","1","0","0"),
("1026","1","7","15","image","Logo partnera","partner_logo","160","1","0","0"),
("1027","1","7","3","image","Logo regiónu","region_logo","153","1","0","0"),
("1028","1","7","5","image","Fotka v hlavnom slideri 1","_menu_1_image_1","161","1","0","0"),
("1029","1","7","7","image","Fotka modulu pre modul GALÉRIA","_menu_3_image_1","193","1","0","0"),
("1030","1","7","7","image","Druhá fotka modulu pre modul GALÉRIA","_menu_3_image_2","159","1","0","0"),
("1031","1","7","2","image","Fotka k modulu UBYTOVANIE","_menu_7_image_1_1","192","1","0","0"),
("1032","1","7","5","content","Názov modulu pre modul INFO","_menu_name_1","Intro","1","1","0"),
("1033","1","7","6","content","Názov modulu pre modul O SÚŤAŽI","_menu_name_2","Gewinnspiel","0","0","0"),
("1034","1","7","7","content","Názov modulu pre modul GALÉRIU","_menu_name_3","Galérie","0","0","0"),
("1035","1","7","8","content","Názov modulu pre modul FORMULÁRU","_menu_name_4","Gewinnspielteilnahme","1","3","0"),
("1036","1","7","9","content","Názov modulu pre modul O REGIONE","_menu_name_5","Region Villach","1","2","0"),
("1037","1","7","10","content","Názov modulu pre modul MAPA","_menu_name_6","Map","0","0","0"),
("1038","1","7","11","content","Názov modulu pre modul UBYTOVANIE","_menu_name_7","Teilnehmende Hotels","1","4","0"),
("1039","1","7","5","content","Text k modulu INFO","_menu_1_text_1","<p><span style=\"color:#FFFFFF\"><span style=\"font-size:22px\"><strong><span style=\"font-family:arial,helvetica,sans-serif\">GEWINNE UNVERGESSLICHE&nbsp;AKTIVURLAUBE&nbsp;IN DER REGION VILLACH!</span></strong></span></span></p>\n","1","0","0"),
("1040","1","7","6","content","Text k modulu O SÚŤAŽI","_menu_2_text_1","<h3><span style=\"font-size:18px\"><span style=\"font-family:arial,helvetica,sans-serif\"><strong>Einfach Teilnahmeformular ausf&uuml;llen und schon spielen Sie mit um einen&nbsp;Aktivurlaub&nbsp;in der Region Villach!</strong></span></span></h3>\n\n<h3><span style=\"font-size:16px\"><span style=\"font-family:arial,helvetica,sans-serif\">Das Gewinnspiel l&auml;uft von 01.08.2016 bis 20.09.2016.</span></span></h3>\n\n<h3><span style=\"font-size:16px\"><span style=\"font-family:arial,helvetica,sans-serif\">Das gibt es zu gewinnen:</span></span></h3>\n\n<p><span style=\"font-size:16px\"><span style=\"font-family:arial,helvetica,sans-serif\"><strong>4 Aktivurlaube f&uuml;r 2 Erwachsene &agrave; 4 N&auml;chte in der Region Villach inklusive Halbpension und Erlebnis&nbsp;CARD</strong></span></span>&nbsp;</p>\n","1","0","0"),
("1041","1","7","7","content","Text k modulu GALÉRIA","_menu_3_text_1","","1","0","0"),
("1042","1","7","8","content","Text k modulu FORMULÁR","_menu_4_text_1","<p>Ihre Registrierung:</p>\n","1","0","0"),
("1043","1","7","9","content","Text k modulu O REGIÓNE","_menu_5_text_1","<p><span style=\"font-size:14px\"><span style=\"font-family:arial,helvetica,sans-serif\"><strong>Wanderslust</strong><br />\nViel Natur und Zauberlicht.</span></span></p>\n\n<p><span style=\"font-size:14px\"><span style=\"font-family:arial,helvetica,sans-serif\"><strong>Abmarsch!&nbsp;</strong>W&auml;ren Wandertr&auml;ume in der Region Villach sichtbare Gedankenblasen, w&uuml;rden vielen wohl folgendes Bild &uuml;ber dem Haupte schweben: majest&auml;tische Gipfel, markante Felsen, saftig gr&uuml;ne Almen, bunt getupfte Blumenwiesen, pl&auml;tschernde B&auml;chlein und urige Almh&uuml;tten. Einfach perfekt zum Verweilen. Zum Genie&szlig;en. Die Zeit bekommt beim Wandern eine v&ouml;llig neue Dimension, die Natur wird zum einzigartigen Sinneserlebnis. Kurzum: Dieser Wandertraum ist erf&uuml;llbar. Ohne Ablaufdatum. In der faszinierenden Bergwelt der Region Villach.<br />\n<strong>Das Wandern ist des Urlaubers Lust. Wer h&ouml;rt sie rufen?</strong>&nbsp;Die magische Bergwelt:&nbsp;<strong><a href=\"http://www.region-villach.at/de/bergerlebnis/naturpark-dobratsch-ihr-naherholungsberg-2338580.html\">Dobratsch</a>, <a href=\"http://www.region-villach.at/de/bergerlebnis/dreilandereck-grenzenloses-bergvergnugen-2338643.html\">Dreil&auml;ndereck</a>, <a href=\"http://www.region-villach.at/de/bergerlebnis/gerlitzen-alpe-hier-liegt-ihnen-karnten-zu-2339085.html\">Gerlitzen Alpe</a></strong>, und&nbsp;<a href=\"http://www.region-villach.at/de/bergerlebnis/verditz-mittagskogel-almfriede-pur-2339103.html\"><strong>Mittagskogel</strong></a>. Und das Beste: Die sch&ouml;nsten Touren starten in der Region Villach direkt vor der Haus- und Hotelt&uuml;re.</span></span></p>\n","1","0","0"),
("1044","1","7","9","content","Ďalší text k modulu O REGIÓNE","_menu_5_text_2","<p><span style=\"font-size:14px\"><span style=\"font-family:arial,helvetica,sans-serif\">Marschiert wird aber nicht nur bergauf und bergab, sondern auch besonders gem&uuml;tlich um die sch&ouml;nsten Seen im Herzen K&auml;rntens. Der K&ouml;rper l&auml;uft dabei zur Hochform auf. Ebenso die Seele. Die Natur, das Zauberlicht, der Blauhimmel, die Strahlesonne &ndash; all das ist Labsal pur.<br />\n<strong>Vom Berg an den See</strong>. Und wenn die Sohlen zu gl&uuml;hen beginnen, hei&szlig;t es: Raus aus den Wanderschuhen und hinein in die Flip-Flops. Denn einer der neun Badeseen ist immer in Ihrer N&auml;he. F&uuml;r einen herrlichen Sprung ins Wasser.</span></span><br />\n&nbsp;</p>\n\n<p><span style=\"font-size:14px\"><span style=\"font-family:arial,helvetica,sans-serif\">Tipp: Mit der&nbsp;<strong><a href=\"http://www.region-villach.at/de/angebote/card-2492423.html\">kostenlosen Erlebnis-CARD</a>&nbsp;</strong>k&ouml;nnen Urlauber in der Region Villach kostenlose Angebote rund ums Wandern, Radfahren sowie Kulturevents genie&szlig;en.</span></span></p>\n\n<p><br />\n<a href=\"http://www.region-villach.at/\">Mehr Informationen zur Region Villach finden Sie HIER!</a></p>\n","1","0","0"),
("1045","1","7","10","content","Text k modulu MAPA","_menu_6_text_1","<p>Map</p>\n","1","0","0"),
("1046","1","7","2","content","Text k modulu UBYTOVANIE 1","_menu_7_text_1","<p><strong>Hotel Karnerhof ****S</strong></p>\n\n<p>Ankommen und loslassen &ndash; der Blick schweift &uuml;ber das weitl&auml;ufige Grundst&uuml;ck, das t&uuml;rkisblaue Wasser des Faaker Sees und die imposanten Karawanken.</p>\n\n<p>Die Karnerhof-Spalandschaft ist der perfekte Ort zum Wohlf&uuml;hlen mit Innen- und Au&szlig;enpools, Saunen, Dampfbad und der Seesauna mit dem Faaker See als Tauchbecken. Wohltuende Massage- und Kosmetikbehandlungen sowie ein umfangreiches Fitness- und Freizeit-Aktiv-Programm runden das Angebot ab. Kulinarische Gen&uuml;sse bietet die mit 2 Hauben ausgezeichnete K&uuml;che.</p>\n","1","0","0"),
("1047","1","7","12","content","Input Meno","form_base_name","Vorname","1","0","0"),
("1048","1","7","12","content","Input Priezvisko","form_base_surname","Nachname","1","0","0"),
("1049","1","7","12","content","Input PSČ","form_base_psc","PLZ","1","0","0"),
("1050","1","7","12","content","Input Mesto","form_base_city","Stadt","1","0","0"),
("1051","1","7","12","content","Input Email","form_base_email","E-mail","1","0","0"),
("1052","1","7","12","content","Input Doklad","form_extend_v1_doklad","Einkaufsbeleg Nr:","0","0","0"),
("1053","1","7","12","content","Input Otázka + odpovede","form_extend_v3_otazka","Welchen Berg nennen die Villacher liebevoll ihren „Hausberg“ ?","1","0","0"),
("1054","1","7","12","content","Odpoveď A","form_extend_v3_odpoved_a","Dobratsch","1","0","0"),
("1055","1","7","12","content","Odpoveď B","form_extend_v3_odpoved_b","Gerlitzen Alpe","1","0","0"),
("1056","1","7","12","content","Odpoveď C","form_extend_v3_odpoved_c","Mittagskogel","1","0","0"),
("1057","1","7","4","content","Názov","field_word_nazov","Názov","0","0","0"),
("1058","1","7","4","content","Adresa","field_word_adresa","Adresa","0","0","0"),
("1059","1","7","4","content","Kontakt","field_word_kontakt","Kontakt","0","0","0"),
("1060","1","7","4","content","Web","field_word_web","Web","0","0","0"),
("1061","1","7","4","content","Hláška povinné pole","field_word_err","Pflichtfelder","1","0","0"),
("1062","1","7","4","content","Registrovať","field_word_sent","Teilnehmen","1","0","0"),
("1063","1","7","4","content","Predchádzajúca (fotka)","field_word_previous","Vorheriges","1","0","0"),
("1064","1","7","4","content","Ďalšia (fotka)","field_word_next","Nächstes","1","0","0"),
("1065","1","7","4","content","Súhlasím s newslettrom","field_word_suhlas_news","Ja, ich stimme zu den Newsletter der Region Villach zu erhalten und meine Daten für weitere Marketingaktivitäten zur Verfügung zu stellen.","1","0","0"),
("1066","1","7","4","content","Súhlasím s podmienkami súťaže","field_word_suhlas_podm","Ja, ich stimme den Teilnahmebedingungen zu. (Teilnahmebedingungen HIER).","1","0","0"),
("1067","1","7","1","content","Kľúčové slová pre Google","keywords","gewinnspiel Villach Intersport","1","0","0"),
("1068","1","7","1","content","Popis pre Google","description","This competition has a first ID","1","0","0"),
("1069","1","7","4","content","Súhlasím s podmienkami súťaže","field_word_dakujeme","Danke, Sie haben sich erfolgreich für das Gewinnspiel registriert. Wir wünschen Ihnen viel Glück!","1","0","0"),
("1070","1","7","12","image","Podmienky súťaže (PDF)","form_file_podmienky","194","1","0","0"),
("1071","1","7","12","image","Newsletter (PDF)","form_file_newsletter","68","0","0","0"),
("1072","1","7","4","content","Hláška možnosti novej registrácie","field_word_nova_registracia","Jetzt Freunde einladen!","1","0","0"),
("1073","1","7","13","content","Počet znakov vygenerovaného hashu","_email_conf_char","8","1","0","0"),
("1074","1","7","13","content","Hláška, súťažiacemu ktorá mu príde na email po registracii.","_email_conf_sent_text","Danke, Sie haben sich erfolgreich für das Gewinnspiel registriert. Wir wünschen Ihnen viel Erfolg bei der Verlosung! ","1","0","0"),
("1075","1","7","12","content","Telefónne číslo","form_base_tel_c","Wohnadresse","1","0","0"),
("1076","1","7","4","content","Hláška za hviezdičkou o povinných poliach","field_word_povinne_polia","","1","0","0"),
("1077","1","7","2","image","Fotka loga k modulu UBYTOVANIE","_menu_7_image_2_1","162","0","0","0"),
("1078","1","7","16","content","Názov hotelu 2","info_hotel_name_2","Hotel & Cafe Mosser****","1","0","0"),
("1079","1","7","16","content","Adresa Hotela 2","info_hotel_addr_2","Bahnhofstraße 9  <br/>  A - 9500 Villach","1","0","0"),
("1080","1","7","16","content","Telefón do hotela 2","info_hotel_tel_c_2","+43 4242 24 115","1","0","0"),
("1081","1","7","16","content","Email hotelu 2","info_hotel_email_2","info@hotelmosser.at","1","0","0"),
("1082","1","7","16","content","Text k modulu UBYTOVANIE 2","_menu_7_text_2","<p><strong>Hotel Mosser****</strong></p>\n\n<p>Hotel Mosser, Ihr Hotel in der Villacher Altstadt!</p>\n\n<p>F&uuml;r sportliche Urlaube oder gem&uuml;tliche Kurztrips, egal ob alleine oder mit der ganzen Familie,&nbsp;vom Einzelzimmer bis zum Appartement, mit Villachs bestem Fr&uuml;hst&uuml;cksb&uuml;ffet im Wintergarten.</p>\n","1","0","0"),
("1083","1","7","17","content","Text k modulu UBYTOVANIE 3","_menu_7_text_3","<p><strong>Naturel Hotels &amp; Resorts, Faaker See -&nbsp;K&auml;rnten</strong></p>\n\n<p>Urlaub im Hoteldorf<br />\nAnkommen, wohlf&uuml;hlen, umsorgt sein.<br />\nIn den Naturel Hoteld&ouml;rfern SEELEITN &amp; SCH&Ouml;NLEITN am Faaker See finden Sie viel Platz f&uuml;r erinnerungsw&uuml;rdige Erlebnisse.</p>\n\n<p><strong>Naturel Hotels &amp; Resorts</strong><br />\n<strong>Dorf SCH&Ouml;NLEITN ****</strong><br />\nDorfstra&szlig;e 26,&nbsp;9582 Oberaichwald</p>\n\n<p><strong>Naturel Hotels &amp; Resorts</strong><br />\n<strong><strong>Dorf SEELEITN ***</strong></strong><br />\nSeeufer-Landesstra&szlig;e 59,&nbsp;9583 Egg am See</p>\n\n<p>&nbsp;</p>\n","1","0","0"),
("1084","1","7","17","content","Email hotelu 3","info_hotel_email_3","info@naturelhotels.com","1","0","0");
INSERT INTO dnt_microsites_composer VALUES
("1085","1","7","17","content","Telefón do hotela 3","info_hotel_tel_c_3","+43 4254 2384","1","0","0"),
("1086","1","7","17","content","Adresa Hotela 3","info_hotel_addr_3","Dorfstrasse 26   <br/>   A - 9582 Latschach/Oberaichwald","1","0","0"),
("1087","1","7","17","content","Názov hotelu 3","info_hotel_name_3","Naturel Hotels & Resorts GmbH","1","0","0"),
("1088","1","7","16","image","Fotka loga k modulu UBYTOVANIE 2","_menu_7_image_1_2","165","1","0","0"),
("1089","1","7","16","image","Fotka k modulu UBYTOVANIE 2","_menu_7_image_2_2","65","0","0","0"),
("1090","1","7","17","image","Fotka loga k modulu UBYTOVANIE 3","_menu_7_image_1_3","196","1","0","0"),
("1091","1","7","17","image","Fotka k modulu UBYTOVANIE 3","_menu_7_image_2_3","195","0","0","0"),
("1092","1","7","2","content","Url adresa hotela 1","link_hotel_1","http://www.karnerhof.com","1","0","0"),
("1093","1","7","16","content","Url adresa hotela 2","link_hotel_2","http://www.hotelmosser.info","1","0","0"),
("1094","1","7","17","content","Url adresa hotela 3","link_hotel_3","http://www.naturelhotels.com","1","0","0"),
("1095","1","7","9","image","Druhá fotka modulu pre modul GALÉRIA","_menu_5_gallery_1","20","1","0","0"),
("1096","1","7","5","image","Fotka v hlavnom slideri 2","_menu_1_image_2","157","1","0","0"),
("1097","1","7","4","content","Po ukončení registrácie","field_word_koniec_registracie","<p><span style=\"color:#FF0000\"><span style=\"font-size:22px\"><span style=\"font-family:arial,helvetica,sans-serif\"><strong>Das GEWINNSPIEL wurde bereits BEENDET!​</strong></span></span></span></p>\n\n<p><span style=\"color:rgb(255, 0, 0)\"><span style=\"font-size:22px\">Wir danken Ihnen<span style=\"font-family:arial,sans-serif\">&nbsp;f&uuml;r die zahlreiche Beteiligung!</span></span></span></p>\n\n<p><span style=\"color:#FF0000\"><span style=\"font-size:20px\"><span style=\"font-family:arial,helvetica,sans-serif\">Die Gewinner werden in K&uuml;rze per E-Mail benachrichtigt.</span></span></span></p>\n\n<p><strong><span style=\"color:#FF0000\"><span style=\"font-size:22px\"><span style=\"font-family:arial,helvetica,sans-serif\">Wir&nbsp;gratulieren den&nbsp;Gewinnern und&nbsp;w&uuml;nschen ihnen&nbsp;einen sch&ouml;nen Aufenthalt!&nbsp;</span></span></span></strong></p>\n\n<p>&nbsp;</p>\n","0","0","0"),
("1098","1","7","11","content","Názov modulu pre modul O PARTNEROVI","_menu_name_8","Intersport","0","0","0"),
("1099","1","7","15","content","Email partnera","info_partner_email","headoffice@intersport.at","1","0","0"),
("1100","1","7","15","content","Adresa partnera","info_partner_addr","Flugplatzstraße 10 <br/> A-4600 Wels","1","0","0"),
("1101","1","7","15","content","Názov partnera","info_partner_name","INTERSPORT Austria GmbH","1","0","0"),
("1102","1","7","15","content","Telefónne číslo na partnera","info_partner_tel_c","+43 7242 233 - 0","1","0","0"),
("1103","1","7","11","content","Text k modulu O PARTNEROVI 1","_menu_8_text_1","<p>Intersport</p>\n","0","0","0"),
("1104","1","7","1","content","Jazyková mutácia pre Facebook","_language","de_DE","1","0","0"),
("1105","1","7","12","image","Newsletter 2 (PDF)","form_file_newsletter_2","68","0","0","0"),
("1106","1","7","4","content","Súhlasím s newslettrom 2","field_word_suhlas_news_2","News 2","0","0","0"),
("1205","1","1","18","content","Email hotelu 4","info_hotel_email_4","welcome@tirolerhof.co.at","0","0","0"),
("1206","1","1","18","content","Telefón do hotela 4","info_hotel_tel_c_4","+43(0)6542/772-0","0","0","0"),
("1207","1","1","18","content","Adresa Hotela 4","info_hotel_addr_4","Auerspergstrasse 5   <br/>   A - 5700 Zell am See","1","0","0"),
("1208","1","1","18","content","Názov hotelu 4","info_hotel_name_4","Hotel Tirolerhof ****S","0","0","0"),
("1209","1","1","18","image","Fotka loga k modulu UBYTOVANIE 4","_menu_7_image_1_4","","0","0","0"),
("1210","1","1","18","image","Fotka k modulu UBYTOVANIE 4","_menu_7_image_2_4","","1","0","0"),
("1211","1","1","18","content","Url adresa hotela 4","link_hotel_4","http://www.tirolerhof.co.at/","0","0","0"),
("1212","1","1","18","content","Text k modulu UBYTOVANIE 4","_menu_7_text_4","","0","0","0"),
("1213","1","2","18","content","Email hotelu 4","info_hotel_email_4","welcome@tirolerhof.co.at","0","0","0"),
("1214","1","2","18","content","Telefón do hotela 4","info_hotel_tel_c_4","+43(0)6542/772-0","0","0","0"),
("1215","1","2","18","content","Adresa Hotela 4","info_hotel_addr_4","Auerspergstrasse 5   <br/>   A - 5700 Zell am See","1","0","0"),
("1216","1","2","18","content","Názov hotelu 4","info_hotel_name_4","Hotel Tirolerhof ****S","0","0","0"),
("1217","1","2","18","image","Fotka loga k modulu UBYTOVANIE 4","_menu_7_image_1_4","","0","0","0"),
("1218","1","2","18","image","Fotka k modulu UBYTOVANIE 4","_menu_7_image_2_4","","1","0","0"),
("1219","1","2","18","content","Url adresa hotela 4","link_hotel_4","http://www.tirolerhof.co.at/","0","0","0"),
("1220","1","2","18","content","Text k modulu UBYTOVANIE 4","_menu_7_text_4","","0","0","0"),
("1221","1","3","18","content","Email hotelu 4","info_hotel_email_4","welcome@tirolerhof.co.at","0","0","0"),
("1222","1","3","18","content","Telefón do hotela 4","info_hotel_tel_c_4","+43(0)6542/772-0","0","0","0"),
("1223","1","3","18","content","Adresa Hotela 4","info_hotel_addr_4","Auerspergstrasse 5   <br/>   A - 5700 Zell am See","1","0","0"),
("1224","1","3","18","content","Názov hotelu 4","info_hotel_name_4","Hotel Tirolerhof ****S","0","0","0"),
("1225","1","3","18","image","Fotka loga k modulu UBYTOVANIE 4","_menu_7_image_1_4","","0","0","0"),
("1226","1","3","18","image","Fotka k modulu UBYTOVANIE 4","_menu_7_image_2_4","","1","0","0"),
("1227","1","3","18","content","Url adresa hotela 4","link_hotel_4","http://www.tirolerhof.co.at/","0","0","0"),
("1228","1","3","18","content","Text k modulu UBYTOVANIE 4","_menu_7_text_4","","0","0","0"),
("1229","1","4","18","content","Email hotelu 4","info_hotel_email_4","welcome@tirolerhof.co.at","0","0","0"),
("1230","1","4","18","content","Telefón do hotela 4","info_hotel_tel_c_4","+43(0)6542/772-0","0","0","0"),
("1231","1","4","18","content","Adresa Hotela 4","info_hotel_addr_4","Auerspergstrasse 5   <br/>   A - 5700 Zell am See","1","0","0"),
("1232","1","4","18","content","Názov hotelu 4","info_hotel_name_4","Hotel Tirolerhof ****S","0","0","0"),
("1233","1","4","18","image","Fotka loga k modulu UBYTOVANIE 4","_menu_7_image_1_4","","0","0","0"),
("1234","1","4","18","image","Fotka k modulu UBYTOVANIE 4","_menu_7_image_2_4","","1","0","0"),
("1235","1","4","18","content","Url adresa hotela 4","link_hotel_4","http://www.tirolerhof.co.at/","0","0","0"),
("1236","1","4","18","content","Text k modulu UBYTOVANIE 4","_menu_7_text_4","","0","0","0"),
("1237","1","5","18","content","Email hotelu 4","info_hotel_email_4","welcome@tirolerhof.co.at","0","0","0"),
("1238","1","5","18","content","Telefón do hotela 4","info_hotel_tel_c_4","+43(0)6542/772-0","0","0","0"),
("1239","1","5","18","content","Adresa Hotela 4","info_hotel_addr_4","Auerspergstrasse 5   <br/>   A - 5700 Zell am See","1","0","0"),
("1240","1","5","18","content","Názov hotelu 4","info_hotel_name_4","Hotel Tirolerhof ****S","0","0","0"),
("1241","1","5","18","image","Fotka loga k modulu UBYTOVANIE 4","_menu_7_image_1_4","","0","0","0"),
("1242","1","5","18","image","Fotka k modulu UBYTOVANIE 4","_menu_7_image_2_4","","1","0","0"),
("1243","1","5","18","content","Url adresa hotela 4","link_hotel_4","http://www.tirolerhof.co.at/","0","0","0"),
("1244","1","5","18","content","Text k modulu UBYTOVANIE 4","_menu_7_text_4","","0","0","0"),
("1245","1","6","18","content","Email hotelu 4","info_hotel_email_4","welcome@tirolerhof.co.at","0","0","0"),
("1246","1","6","18","content","Telefón do hotela 4","info_hotel_tel_c_4","+43(0)6542/772-0","0","0","0"),
("1247","1","6","18","content","Adresa Hotela 4","info_hotel_addr_4","Auerspergstrasse 5   <br/>   A - 5700 Zell am See","1","0","0"),
("1248","1","6","18","content","Názov hotelu 4","info_hotel_name_4","Hotel Tirolerhof ****S","0","0","0"),
("1249","1","6","18","image","Fotka loga k modulu UBYTOVANIE 4","_menu_7_image_1_4","","0","0","0"),
("1250","1","6","18","image","Fotka k modulu UBYTOVANIE 4","_menu_7_image_2_4","","1","0","0"),
("1251","1","6","18","content","Url adresa hotela 4","link_hotel_4","http://www.tirolerhof.co.at/","0","0","0"),
("1252","1","6","18","content","Text k modulu UBYTOVANIE 4","_menu_7_text_4","","0","0","0"),
("1253","1","7","18","content","Email hotelu 4","info_hotel_email_4","info@pacheiner.at","1","0","0"),
("1254","1","7","18","content","Telefón do hotela 4","info_hotel_tel_c_4","+43 4248 2888","1","0","0"),
("1255","1","7","18","content","Adresa Hotela 4","info_hotel_addr_4","Pölling 20  <br/>   A - 9520 Gerlitzen","1","0","0"),
("1256","1","7","18","content","Názov hotelu 4","info_hotel_name_4","Alpinhotel Hotel Pacheiner****","1","0","0"),
("1257","1","7","18","image","Fotka loga k modulu UBYTOVANIE 4","_menu_7_image_1_4","191","1","0","0"),
("1258","1","7","18","image","Fotka k modulu UBYTOVANIE 4","_menu_7_image_2_4","184","0","0","0"),
("1259","1","7","18","content","Url adresa hotela 4","link_hotel_4","http://www.pacheiner.at","1","0","0"),
("1260","1","7","18","content","Text k modulu UBYTOVANIE 4","_menu_7_text_4","<p><strong>Hotel Pacheiner****</strong></p>\n\n<p>POOL-POSITION IM ALPINHOTEL PACHEINER</p>\n\n<p>Auf 1.900 m auf dem Gipfel der Gerlitzen thront das 2012 neu errichtete Alpinhotel Pacheiner. Ein Platz, an dem anspruchsvolle Individualisten einen unvergesslichen R&uuml;ckzugsort finden.</p>\n","1","0","0"),
("1262","1","5","11","image","Fotka k modulu O PARTNEROVI","_menu_8_image_1","","0","0","0"),
("1263","1","1","11","image","Fotka k modulu O PARTNEROVI","_menu_8_image_1","","0","0","0"),
("1264","1","2","11","image","Fotka k modulu O PARTNEROVI","_menu_8_image_1","","0","0","0"),
("1265","1","3","11","image","Fotka k modulu O PARTNEROVI","_menu_8_image_1","","0","0","0"),
("1266","1","4","11","image","Fotka k modulu O PARTNEROVI","_menu_8_image_1","","0","0","0"),
("1267","1","6","11","image","Fotka k modulu O PARTNEROVI","_menu_8_image_1","210","1","0","0"),
("1268","1","7","11","image","Fotka k modulu O PARTNEROVI","_menu_8_image_1","","0","0","0"),
("1269","1","8","1","content","Template","layout","dnt_first","1","0","0"),
("1270","1","8","15","content","Link partnera","link_partner","https://frechefreunde.de","1","0","0"),
("1271","1","8","3","content","Link regionu","link_region","http://www.urlaubambauernhof.at/bundesverband/oberoesterreich.html?utm_source=frechefreunde&utm_medium=referral&utm_campaign=AT-OOE-Sommer  | http://www.bauernhof.at","1","0","0"),
("1272","1","8","1","content","Zobraziť na URL adrese","real_address","http://www.vyhrat.com/","1","0","0"),
("1273","1","8","1","content","Facebook","social_fb","https://www.facebook.com/frechefreunde","1","0","0"),
("1274","1","8","1","content","Twitter","social_twitter","","0","0","0"),
("1275","1","8","1","content","Instagram","social_linked_in","https://www.instagram.com/frechefreunde/","1","0","0"),
("1276","1","8","1","content","Mapa ","map_location","https://www.google.at/maps/place/Horn%C3%A9+Rak%C3%BAsko/@48.1131896,12.7461246,8z/data=!3m1!4b1!4m5!3m4!1s0x47739785599b0361:0x7c48817c03c39588!8m2!3d48.025854!4d13.9723665","0","0","0"),
("1277","1","8","1","image","Favicon","favicon","57","1","0","0"),
("1278","1","8","1","content","Model farby R","_r","225","1","0","0"),
("1279","1","8","1","content","Model farby G","_g","91","1","0","0"),
("1280","1","8","1","content","Model farby B","_b","28","1","0","0"),
("1281","1","8","1","content","Font","_font","roboto","1","0","0"),
("1282","1","8","2","content","Názov hotelu 1","info_hotel_name_1","Familotel - amiamo","0","0","0"),
("1283","1","8","2","content","Adresa Hotela 1","info_hotel_addr_1","Salzachtal Bundesstrasse 20   <br/>   A - 5700 Zell am See","1","0","0");
INSERT INTO dnt_microsites_composer VALUES
("1284","1","8","2","content","Telefón do hotela 1","info_hotel_tel_c_1","+43 6542 55355","1","0","0"),
("1285","1","8","2","content","Email hotelu 1","info_hotel_email_1","hotel@amiamo.at","1","0","0"),
("1286","1","8","3","content","Názov regiónu","info_region_name","Urlaub am Bauernhof Oberösterreich","1","0","0"),
("1287","1","8","3","content","Adresa regiónu","info_region_addr","Auf der Gugl 3 <br/> A-4021 Linz","1","0","0"),
("1288","1","8","3","content","Telefónne číslo regiónu","info_region_tel_c","+43 (0) 50 6902-1248","1","0","0"),
("1289","1","8","3","content","Email regiónu","info_region_email","uab-ooe@lk-ooe.at","1","0","0"),
("1290","1","8","1","content","Youtube video","youtube_video","uGNyNRL3Oh4","0","0","0"),
("1291","1","8","15","image","Logo partnera","partner_logo","225","1","0","0"),
("1292","1","8","3","image","Logo regiónu","region_logo","226","1","0","0"),
("1293","1","8","5","image","Fotka v hlavnom slideri 1","_menu_1_image_1","207","1","0","0"),
("1294","1","8","7","image","Fotka modulu pre modul GALÉRIA","_menu_3_image_1","229","1","0","0"),
("1295","1","8","7","image","Druhá fotka modulu pre modul GALÉRIA","_menu_3_image_2","228","1","0","0"),
("1296","1","8","2","image","Fotka k modulu UBYTOVANIE","_menu_7_image_1_1","63","1","0","0"),
("1297","1","8","5","content","Názov modulu pre modul INFO","_menu_name_1","Intro","1","1","0"),
("1298","1","8","6","content","Názov modulu pre modul O SÚŤAŽI","_menu_name_2","Gewinnspiel","0","0","0"),
("1299","1","8","7","content","Názov modulu pre modul GALÉRIU","_menu_name_3","Galérie","0","0","0"),
("1300","1","8","8","content","Názov modulu pre modul FORMULÁRU","_menu_name_4","Teilnahme","1","4","0"),
("1301","1","8","9","content","Názov modulu pre modul O REGIONE","_menu_name_5","Urlaub am Bauernhof","1","3","0"),
("1302","1","8","10","content","Názov modulu pre modul MAPA","_menu_name_6","Mapa","0","0","0"),
("1303","1","8","11","content","Názov modulu pre modul UBYTOVANIE","_menu_name_7","Ubytování","0","0","0"),
("1304","1","8","5","content","Text k modulu INFO","_menu_1_text_1","<p><strong><span style=\"font-size:26px\">Gewinnt einen abwechslungsreichen Urlaub am Bauernhof!</span></strong></p>\n","1","0","0"),
("1305","1","8","6","content","Text k modulu O SÚŤAŽI","_menu_2_text_1","<p style=\"text-align:center\"><strong><span style=\"font-size:24px\">Gewinnt einen aufregenden und frechen Urlaub am Bauernhof in Ober&ouml;sterreich!</span></strong></p>\n\n<p style=\"text-align:center\"><span style=\"font-size:18px\">Das Gewinnspiel l&auml;uft von 01.09.2016 bis 30.09.2016.</span></p>\n\n<p style=\"text-align:center\"><span style=\"font-size:18px\">Einfach die Gewinnspielfrage richtig beantworten und das Teilnahmeformular ausf&uuml;llen, und ihr habt die Chance auf einen tollen Urlaub!&nbsp;Das gibt es zu gewinnen:</span></p>\n\n<p style=\"text-align:center\"><span style=\"font-size:20px\"><strong>Ein Urlaub am Bauernhof f&uuml;r 2 Erwachsene und 2 Kinder &agrave; 5 N&auml;chte inklusive Fr&uuml;hst&uuml;ck!</strong></span></p>\n\n<p style=\"text-align:center\"><span style=\"font-size:18px\">Wir w&uuml;nschen Ihnen viel Gl&uuml;ck!</span></p>\n\n<p style=\"text-align:center\">&nbsp;</p>\n","1","0","0"),
("1306","1","8","7","content","Text k modulu GALÉRIA","_menu_3_text_1","","1","0","0"),
("1307","1","8","8","content","Text k modulu FORMULÁR","_menu_4_text_1","","1","0","0"),
("1308","1","8","9","content","Text k modulu O REGIÓNE","_menu_5_text_1","<p><strong>Urlaub am Bauernhof in Ober&ouml;sterreich &nbsp; &nbsp; &nbsp; </strong></p>\n\n<p><strong>&hellip;wo die Welt noch in Ordnung ist</strong></p>\n\n<p>Genussvoll und mit viel Selbstgemachtem von der B&auml;uerin startet man beim Urlaub am Bauernhof mit einem herzhaften Fr&uuml;hst&uuml;ck in den Tag. Und danach? Einmal selbst Bauer auf Zeit sein und Teil haben am Einklang zwischen Mensch, Tier und Natur. Ob beim F&uuml;ttern und Umsorgen der Tiere im Stall und auf der Weide, beim Holen der frischen Eier aus dem H&uuml;hnerstall oder beim Herumtollen mit Spielgef&auml;hrten - hier kommt sicher keine Langeweile auf! Es gibt vieles zu entdecken und zu bestaunen. Strahlende Kinderaugen und Freude inklusive!</p>\n\n<p>Und w&auml;hrend die Kleinen den Hof erkunden, k&ouml;nnen Mama und Papa die Seele baumeln lassen. Ob auf der Sonnenbank vorm Haus, in der H&auml;ngematte zwischen den Apfelb&auml;umen oder unter der alten Linde - am Bauernhof gibt&rsquo;s das passende Platzerl f&uuml;r jeden!</p>\n\n<p>Ein Urlaub am Bauernhof ist auch ein Urlaub f&uuml;r den Gaumen!&nbsp;</p>\n","1","0","0"),
("1309","1","8","9","content","Ďalší text k modulu O REGIÓNE","_menu_5_text_2","<p>Die gepflegten Bauerng&auml;rten, Felder und &Auml;cker sind reich an wertvollen, schmackhaften Lebensmitteln, die mit viel Liebe und Leidenschaft weiterverarbeitet werden. Selbst eingekochte Marmelade, g&acute;schmackiger Speck, herzhafte Pofesen, frischgebackenes Bauernbrot und viele weitere Schmankerl garantieren den puren Genuss.</p>\n\n<p>Ober&ouml;sterreichs Urlaubsh&ouml;fe sind auch ideale Ausgangspunkte um die landschaftliche Vielfalt Ober&ouml;sterreichs zu erkunden - &bdquo;Geheimtipps&ldquo; zu Freizeitaktivit&auml;ten und Ausflugszielen in den Regionen verraten die b&auml;uerlichen Gastgeber nat&uuml;rlich gerne.</p>\n\n<p>Nehmen Sie sich eine echte Auszeit und genie&szlig;en Sie die Gastfreundschaft der B&auml;uerinnen und Bauern auf den rund 270 qualit&auml;tsgepr&uuml;ften Urlaubsbauernh&ouml;fen in Ober&ouml;sterreich. Sie verleiten ihre G&auml;ste dazu, jeden Augenblick des Tages in vollen Z&uuml;gen zu genie&szlig;en. Das ist echtes Urlaubsgl&uuml;ck und l&auml;sst nicht nur Kinderherzen h&ouml;her schlagen!</p>\n\n<p>Mehr Informationen:<strong>&nbsp;<u><a href=\"http://www.urlaubambauernhof.at/bundesverband/oberoesterreich.html?utm_source=frechefreunde&amp;utm_medium=referral&amp;utm_campaign=AT-OOE-Sommer\" target=\"_blank\">www.bauernhof.at</a></u></strong></p>\n\n<p><img alt=\"\" src=\"http://www.land-oberoesterreich.gv.at/Bilder/LWLD%20Abt_LFW/LFW_logo_Bund_Land_EU.jpg\" style=\"height:57px; width:336px\" /></p>\n\n<p>&nbsp;</p>\n","1","0","0"),
("1310","1","8","10","content","Text k modulu MAPA","_menu_6_text_1","<p>Mapa regionu</p>\n","1","0","0"),
("1311","1","8","2","content","Text k modulu UBYTOVANIE 1","_menu_7_text_1","<p><strong>amiamo - Familotel Zell am See</strong></p>\n\n<p>Jako prvn&iacute; boutique hotel pro rodiny&nbsp;s dětmi jsme stanovili standardy pro&nbsp;v&yacute;jimečn&eacute; z&aacute;žitky z dovolen&eacute;: mal&yacute;,&nbsp;vybran&yacute; a individu&aacute;ln&iacute;, vyznamenan&yacute;&nbsp;nejvy&scaron;&scaron;&iacute; pečet&iacute; jakosti Q III. Luxusn&iacute;&nbsp;penzion Amiamo v kombinaci s&nbsp;kartou Zell am See-Kaprun zaručuje&nbsp;odpočinkovou, ale i vzru&scaron;uj&iacute;c&iacute;&nbsp;dovolenou pro celou rodinu. S v&iacute;ce&nbsp;než 20-ti letou zku&scaron;enost&iacute; nab&iacute;z&iacute;me&nbsp;<br />\nhl&iacute;d&aacute;n&iacute; dět&iacute; v vnitřn&iacute; sekci o plo&scaron;e&nbsp;500 m&sup2; s velk&yacute;m množstv&iacute;m aktivit.&nbsp;</p>\n\n<p>NOVINKA:&nbsp;Sekce Wellness o plo&scaron;e 300 m&sup2;&nbsp;disponuje 3 baz&eacute;ny, Babynariem&nbsp;a kompletně zrekonstruovanou&nbsp;sekc&iacute; saun&nbsp;s relaxačn&iacute; m&iacute;stnost&iacute;.&nbsp;</p>\n\n<p>Na jezeře Zeller&nbsp;See&nbsp;V&aacute;s&nbsp;oček&aacute;v&aacute;&nbsp;hotelov&aacute; pl&aacute;ž s bohatou nab&iacute;dkou!</p>\n","1","0","0"),
("1312","1","8","12","content","Input Meno","form_base_name","Vorname","1","0","0"),
("1313","1","8","12","content","Input Priezvisko","form_base_surname","Nachname","1","0","0"),
("1314","1","8","12","content","Input PSČ","form_base_psc","PLZ","0","0","0"),
("1315","1","8","12","content","Input Mesto","form_base_city","Stadt","0","0","0"),
("1316","1","8","12","content","Input Email","form_base_email","E-mail","1","0","0"),
("1317","1","8","12","content","Input Doklad","form_extend_v1_doklad","Die Frechen Freunde wollen Urlaub am Bauernhof machen. Welcher Freche Freunde Snack darf als Urlaubsproviant nicht fehlen?","1","0","0"),
("1318","1","8","12","content","Input Otázka + odpovede","form_extend_v3_otazka","","0","0","0"),
("1319","1","8","12","content","Odpoveď A","form_extend_v3_odpoved_a","","0","0","0"),
("1320","1","8","12","content","Odpoveď B","form_extend_v3_odpoved_b","","0","0","0"),
("1321","1","8","12","content","Odpoveď C","form_extend_v3_odpoved_c","","0","0","0"),
("1322","1","8","4","content","Názov","field_word_nazov","Názov","0","0","0"),
("1323","1","8","4","content","Adresa","field_word_adresa","Adresa","0","0","0"),
("1324","1","8","4","content","Kontakt","field_word_kontakt","Kontakt","0","0","0"),
("1325","1","8","4","content","Web","field_word_web","Web","0","0","0"),
("1326","1","8","4","content","Hláška povinné pole","field_word_err","Pflichtfelder","1","0","0"),
("1327","1","8","4","content","Registrovať","field_word_sent","Teilnehmen","1","0","0"),
("1328","1","8","4","content","Predchádzajúca (fotka)","field_word_previous","Vorheriges","1","0","0"),
("1329","1","8","4","content","Ďalšia (fotka)","field_word_next","Nächstes","1","0","0"),
("1330","1","8","4","content","Súhlasím s newslettrom","field_word_suhlas_news","Ja, ich stimme zu den Newsletter und Informationen zu Urlaub am Bauernhof in Oberösterreich zu erhalten, und meine Daten für weitere Marketingaktivitäten zur Verfügung zu stellen.","1","0","0"),
("1331","1","8","4","content","Súhlasím s podmienkami súťaže","field_word_suhlas_podm","Ja, ich stimme den Teilnahmebedingungen zu. (Teilnahmebedingungen HIER).","1","0","0"),
("1332","1","8","1","content","Kľúčové slová pre Google","keywords","gewinnspiel Urlaub am Bauernhof in Oberösterreich","1","0","0"),
("1333","1","8","1","content","Popis pre Google","description","This competition has a first ID","1","0","0"),
("1334","1","8","4","content","Súhlasím s podmienkami súťaže","field_word_dakujeme","Danke, Sie haben sich erfolgreich für das Gewinnspiel registriert. Wir wünschen Ihnen viel Glück!","1","0","0"),
("1335","1","8","12","image","Podmienky súťaže (PDF)","form_file_podmienky","209","1","0","0"),
("1336","1","8","12","image","Newsletter (PDF)","form_file_newsletter","68","0","0","0"),
("1337","1","8","4","content","Hláška možnosti novej registrácie","field_word_nova_registracia","Jetzt Freunde einladen!","1","0","0"),
("1338","1","8","13","content","Počet znakov vygenerovaného hashu","_email_conf_char","8","1","0","0"),
("1339","1","8","13","content","Hláška, súťažiacemu ktorá mu príde na email po registracii.","_email_conf_sent_text","Danke, Sie haben sich erfolgreich für das Gewinnspiel registriert. Wir wünschen Ihnen viel Erfolg bei der Verlosung! ","1","0","0"),
("1340","1","8","12","content","Telefónne číslo","form_base_tel_c","Telefon","0","0","0"),
("1341","1","8","4","content","Hláška za hviezdičkou o povinných poliach","field_word_povinne_polia","","1","0","0"),
("1342","1","8","2","image","Fotka loga k modulu UBYTOVANIE","_menu_7_image_2_1","59","0","0","0"),
("1343","1","8","16","content","Názov hotelu 2","info_hotel_name_2","Sporthotel Falkenstein","0","0","0"),
("1344","1","8","16","content","Adresa Hotela 2","info_hotel_addr_2","Nikolaus-Gassner-Str. 79   <br/>   A - 5710 Kaprun","1","0","0"),
("1345","1","8","16","content","Telefón do hotela 2","info_hotel_tel_c_2","+43 6547 7122","1","0","0"),
("1346","1","8","16","content","Email hotelu 2","info_hotel_email_2","sporthotel@falkenstein.at","1","0","0"),
("1347","1","8","16","content","Text k modulu UBYTOVANIE 2","_menu_7_text_2","<p><strong>Das Falkenstein</strong></p>\n\n<p>Tady v Kaprunu a hotelu Falkenstein lze objevit spoustu vzru&scaron;uj&iacute;c&iacute;ch možnost&iacute; a z&aacute;bavy&nbsp;pro rodiny a děti. Každ&yacute; den může b&yacute;t spojen s nov&yacute;mi z&aacute;žitky a dojmy, ať už jde&nbsp;o zvl&aacute;&scaron;tn&iacute; rodinn&eacute; turistick&eacute; v&yacute;lety, čvacht&aacute;n&iacute; a klouz&aacute;n&iacute; v Tauern SPA Kaprun, v&yacute;let&nbsp;k alpsk&eacute; horsk&eacute; bobov&eacute; dr&aacute;ze &quot;Maisfiltzer&quot;, o n&aacute;v&scaron;těvu volnočasov&eacute;ho nebo n&aacute;rodn&iacute;ho&nbsp;parku nebo o mnoh&aacute; dal&scaron;&iacute; dobrodružstv&iacute; - z&aacute;bavě se nekladou ž&aacute;dn&eacute; hranice.</p>\n\n<p>V hotelu Falkenstein&nbsp;se nach&aacute;z&iacute; kromě&nbsp;prostorn&eacute;ho&nbsp;dětsk&eacute;ho hři&scaron;tě&nbsp;a dětsk&eacute; herny tak&eacute;&nbsp;velk&yacute; baz&eacute;n a najdete&nbsp;zde i&nbsp;chutnou&nbsp;Pinzgauerskou&nbsp;kuchyni s pestr&yacute;mi&nbsp;dětsk&yacute;mi menu&nbsp;- n&aacute;&scaron; maskot Falki&nbsp;se na v&aacute;s tě&scaron;&iacute;!</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n","1","0","0"),
("1348","1","8","17","content","Text k modulu UBYTOVANIE 3","_menu_7_text_3","<p><strong>Dovolen&aacute; v Zell am See je dovolenou s požitkem - v hotelu Tirolerhof!</strong></p>\n\n<p>Jezero, hory, ledovec a stylov&yacute;, rodinn&yacute; 4-hvězdičkov&yacute; hotel superior v Zell am See &ndash; to je ide&aacute;ln&iacute; kombinace pro va&scaron;i dovolenou v Zell am See, v l&eacute;tě i v zimě. Budete m&iacute;t v&yacute;hled na jezero Zeller See, hory Schmittenh&ouml;he a Kitzsteinhorn se v&scaron;emi rozmanit&yacute;mi sportovn&iacute;mi a rekreačn&iacute;mi možnostmi a budete h&yacute;čk&aacute;ni v b&aacute;ječn&eacute;m a mimoř&aacute;dn&eacute;m hotelu kulin&aacute;řsk&yacute;mi specialitami nejvy&scaron;&scaron;&iacute; kvality. Nebo str&aacute;v&iacute;te dovolenou spojenou s golfem v Salcburku, kde budete m&iacute;t v&yacute;hled na n&aacute;dhern&eacute; hory a jezero oblasti Zell am See-Kaprun. Nebo si užijete ve dvou n&aacute;dhern&eacute; apartm&aacute;ny v r&aacute;mci romantick&eacute; dovolen&eacute;. Nebo si poř&aacute;dně odpočinete s wellness a l&aacute;zeňskou nab&iacute;dkou vy&scaron;&scaron;&iacute; tř&iacute;dy a načerp&aacute;te novou energii. Takto může vypadat va&scaron;e dal&scaron;&iacute; rekreačn&iacute; dovolen&aacute; v hotelu Tirolerhof Zell am See - v srdci Salcburku. Wellness hotel, čtyřhvězdičkov&yacute; hotel superior, hotel pro hosty s pejsky, relaxačn&iacute; hotel - v&scaron;echny tyto př&iacute;vlastky si hotel Tirolerhof plně zaslouž&iacute;.</p>\n\n<p>&nbsp;</p>\n\n<p><strong>Prožijte nezapomenutelnou dovolenou v hotelu Tirolerhof!</strong></p>\n","0","0","0"),
("1349","1","8","17","content","Email hotelu 3","info_hotel_email_3","welcome@tirolerhof.co.at","0","0","0"),
("1350","1","8","17","content","Telefón do hotela 3","info_hotel_tel_c_3","+43(0)6542/772-0","0","0","0"),
("1351","1","8","17","content","Adresa Hotela 3","info_hotel_addr_3","Auerspergstrasse 5   <br/>   A - 5700 Zell am See","0","0","0"),
("1352","1","8","17","content","Názov hotelu 3","info_hotel_name_3","Hotel Tirolerhof ****S","0","0","0"),
("1353","1","8","16","image","Fotka loga k modulu UBYTOVANIE 2","_menu_7_image_1_2","66","1","0","0"),
("1354","1","8","16","image","Fotka k modulu UBYTOVANIE 2","_menu_7_image_2_2","65","0","0","0"),
("1355","1","8","17","image","Fotka loga k modulu UBYTOVANIE 3","_menu_7_image_1_3","51","0","0","0"),
("1356","1","8","17","image","Fotka k modulu UBYTOVANIE 3","_menu_7_image_2_3","56","0","0","0"),
("1357","1","8","2","content","Url adresa hotela 1","link_hotel_1","https://www.amiamo.at","1","0","0"),
("1358","1","8","16","content","Url adresa hotela 2","link_hotel_2","http://www.falkenstein.at","1","0","0"),
("1359","1","8","17","content","Url adresa hotela 3","link_hotel_3","http://www.tirolerhof.co.at/","0","0","0"),
("1360","1","8","9","image","Druhá fotka modulu pre modul GALÉRIA","_menu_5_gallery_1","25","1","0","0"),
("1361","1","8","5","image","Fotka v hlavnom slideri 2","_menu_1_image_2","208","1","0","0"),
("1362","1","8","4","content","Po ukončení registrácie","field_word_koniec_registracie","<p><span style=\"color:rgb(255, 0, 0)\"><span style=\"font-size:22px\"><span style=\"font-family:arial,helvetica,sans-serif\"><strong>Das GEWINNSPIEL wurde bereits BEENDET!​</strong></span></span></span></p>\n\n<p><span style=\"color:rgb(255, 0, 0)\"><span style=\"font-size:22px\">Wir danken Ihnen<span style=\"font-family:arial,sans-serif\">&nbsp;f&uuml;r die zahlreiche Beteiligung!</span></span></span></p>\n\n<p><span style=\"color:rgb(255, 0, 0)\"><span style=\"font-size:20px\"><span style=\"font-family:arial,helvetica,sans-serif\">Die Gewinner werden in K&uuml;rze per E-Mail benachrichtigt.</span></span></span></p>\n\n<p><strong><span style=\"color:rgb(255, 0, 0)\"><span style=\"font-size:22px\"><span style=\"font-family:arial,helvetica,sans-serif\">Wir&nbsp;gratulieren den&nbsp;Gewinnern und&nbsp;w&uuml;nschen ihnen&nbsp;einen sch&ouml;nen Aufenthalt!</span></span></span></strong></p>\n","1","0","0"),
("1363","1","8","11","content","Názov modulu pre modul O PARTNEROVI","_menu_name_8","Freche Freunde","1","5","0"),
("1364","1","8","15","content","Email partnera","info_partner_email","info@erdbaer.de","1","0","0"),
("1365","1","8","15","content","Adresa partnera","info_partner_addr","Marienburger Straße 18/19 <br/> 10405 Berlin - DE","1","0","0"),
("1366","1","8","15","content","Názov partnera","info_partner_name","erdbär GmbH","1","0","0"),
("1367","1","8","15","content","Telefónne číslo na partnera","info_partner_tel_c","030 58 58 27 80","1","0","0"),
("1368","1","8","11","content","Text k modulu O PARTNEROVI 1","_menu_8_text_1","<p>Wir, die Frechen Freunde, wollen Kinder bereits in ihren ersten Jahren mit Obst und Gem&uuml;se anfreunden. Auf spielerische Art und Weise bringen wir durch unsere Snacks, unsere B&uuml;cher, das lustige Freche Freunde TV und unsere freche Spiele App mehr Obst und Gem&uuml;se in das Leben von Kindern und wollen so die Essgewohnheiten zuk&uuml;nftiger Generationen positiv beeinflussen.</p>\n\n<p>Die Frechen Freunde sind Snacks aus Bio-Obst und Gem&uuml;se und kommen alle ohne Zus&auml;tze daher. Warum? Solche Sachen kommen bei uns nicht in die T&uuml;te, ist doch klar!</p>\n","1","0","0"),
("1369","1","8","1","content","Jazyková mutácia pre Facebook","_language","de_DE","1","0","0"),
("1370","1","8","12","image","Newsletter 2 (PDF)","form_file_newsletter_2","68","0","0","0"),
("1371","1","8","4","content","Súhlasím s newslettrom 2","field_word_suhlas_news_2","Ja, ich stimme zu, den Newsletter von Freche Freunde zu erhalten und meine Daten für weitere Marketingaktivitäten zur Verfügung zu stellen.","1","0","0"),
("1372","1","8","18","content","Email hotelu 4","info_hotel_email_4","welcome@tirolerhof.co.at","0","0","0"),
("1373","1","8","18","content","Telefón do hotela 4","info_hotel_tel_c_4","+43(0)6542/772-0","0","0","0"),
("1374","1","8","18","content","Adresa Hotela 4","info_hotel_addr_4","Auerspergstrasse 5   <br/>   A - 5700 Zell am See","1","0","0"),
("1375","1","8","18","content","Názov hotelu 4","info_hotel_name_4","Hotel Tirolerhof ****S","0","0","0"),
("1376","1","8","18","image","Fotka loga k modulu UBYTOVANIE 4","_menu_7_image_1_4","","0","0","0"),
("1377","1","8","18","image","Fotka k modulu UBYTOVANIE 4","_menu_7_image_2_4","","1","0","0"),
("1378","1","8","18","content","Url adresa hotela 4","link_hotel_4","http://www.tirolerhof.co.at/","0","0","0"),
("1379","1","8","18","content","Text k modulu UBYTOVANIE 4","_menu_7_text_4","","0","0","0"),
("1380","1","8","11","image","Fotka k modulu O PARTNEROVI","_menu_8_image_1","199","1","0","0"),
("1381","1","9","1","content","Template","layout","dnt_first","1","0","0"),
("1382","1","9","15","content","Link partnera","link_partner","http://kornland.at","1","0","0"),
("1383","1","9","3","content","Link regionu","link_region","http://www.sommer-bergbahnen.at","1","0","0");
INSERT INTO dnt_microsites_composer VALUES
("1384","1","9","1","content","Zobraziť na URL adrese","real_address","http://www.vyhrat.com/","1","0","0"),
("1385","1","9","1","content","Facebook","social_fb","https://www.facebook.com/kornlandoesterreich","1","0","0"),
("1386","1","9","1","content","Twitter","social_twitter","https://twitter.com/","0","0","0"),
("1387","1","9","1","content","Instagram","social_linked_in","https://www.instagram.com/kornlandoesterreich/","1","0","0"),
("1388","1","9","1","content","Mapa ","map_location","https://www.google.at/maps/@47.635784,13.590088,7z","0","0","0"),
("1389","1","9","1","image","Favicon","favicon","57","1","0","0"),
("1390","1","9","1","content","Model farby R","_r","40","1","0","0"),
("1391","1","9","1","content","Model farby G","_g","145","1","0","0"),
("1392","1","9","1","content","Model farby B","_b","80","1","0","0"),
("1393","1","9","1","content","Font","_font","roboto","1","0","0"),
("1394","1","9","2","content","Názov hotelu 1","info_hotel_name_1","Familotel - amiamo","0","0","0"),
("1395","1","9","2","content","Adresa Hotela 1","info_hotel_addr_1","Salzachtal Bundesstrasse 20   <br/>   A - 5700 Zell am See","1","0","0"),
("1396","1","9","2","content","Telefón do hotela 1","info_hotel_tel_c_1","+43 6542 55355","1","0","0"),
("1397","1","9","2","content","Email hotelu 1","info_hotel_email_1","hotel@amiamo.at","1","0","0"),
("1398","1","9","3","content","Názov regiónu","info_region_name","Fachverband der Seilbahnen Österreichs","1","0","0"),
("1399","1","9","3","content","Adresa regiónu","info_region_addr","Wiedner Hauptstraße 63  <br/>  A-1045 Wien","1","0","0"),
("1400","1","9","3","content","Telefónne číslo regiónu","info_region_tel_c","+43 (0) 5 90 900-3327","1","0","0"),
("1401","1","9","3","content","Email regiónu","info_region_email","marketingforum.seilbahnen@wko.at","1","0","0"),
("1402","1","9","1","content","Youtube video","youtube_video","FrQ4AbgbLX0","1","0","0"),
("1403","1","9","15","image","Logo partnera","partner_logo","224","1","0","0"),
("1404","1","9","3","image","Logo regiónu","region_logo","213","1","0","0"),
("1405","1","9","5","image","Fotka v hlavnom slideri 1","_menu_1_image_1","212","1","0","0"),
("1406","1","9","7","image","Fotka modulu pre modul GALÉRIA","_menu_3_image_1","222","1","0","0"),
("1407","1","9","7","image","Druhá fotka modulu pre modul GALÉRIA","_menu_3_image_2","219","1","0","0"),
("1408","1","9","2","image","Fotka k modulu UBYTOVANIE","_menu_7_image_1_1","63","1","0","0"),
("1409","1","9","5","content","Názov modulu pre modul INFO","_menu_name_1","Intro","1","1","0"),
("1410","1","9","6","content","Názov modulu pre modul O SÚŤAŽI","_menu_name_2","Gewinnspiel","0","0","0"),
("1411","1","9","7","content","Názov modulu pre modul GALÉRIU","_menu_name_3","Galérie","0","0","0"),
("1412","1","9","8","content","Názov modulu pre modul FORMULÁRU","_menu_name_4","Teilnahme","1","3","0"),
("1413","1","9","9","content","Názov modulu pre modul O REGIONE","_menu_name_5","Sommer-Bergbahnen","1","2","0"),
("1414","1","9","10","content","Názov modulu pre modul MAPA","_menu_name_6","Mapa","0","0","0"),
("1415","1","9","11","content","Názov modulu pre modul UBYTOVANIE","_menu_name_7","Ubytování","0","0","0"),
("1416","1","9","5","content","Text k modulu INFO","_menu_1_text_1","<p><span style=\"color:#FFFFFF\"><strong><span style=\"font-size:24px\">GEWINNE MIT KORNLAND UND DEN BESTEN &Ouml;STERREICHISCHEN SOMMER-BERGBAHNEN EIN BERGERLEBNIS</span></strong></span></p>\n","1","0","0"),
("1417","1","9","6","content","Text k modulu O SÚŤAŽI","_menu_2_text_1","<p style=\"text-align:center\"><span style=\"color:#FFFFFF\"><strong><span style=\"font-size:20px\">Kornland und die &bdquo;Besten &Ouml;sterreichischen Sommer-Bergbahnen&ldquo; verlosen 100 Bergerlebnisse an den sch&ouml;nsten Pl&auml;tzen in der heimischen Bergwelt.</span></strong></span></p>\n\n<p style=\"text-align:center\"><span style=\"color:#FFFFFF\"><strong><span style=\"font-size:20px\">T</span></strong><strong><span style=\"font-size:20px\">eilnahmeformular ausf&uuml;llen, Frage richtig beantworten, und schon hast du die Chance auf ein tolles Bergabenteuer.</span></strong></span></p>\n\n<p style=\"text-align:center\"><span style=\"color:#FFFFFF\"><span style=\"font-size:18px\">Das Gewinnspiel l&auml;uft vom 01.September 2016 bis 30. September 2016. Teilnahmeschluss ist der 30. September 2016</span></span></p>\n","1","0","0"),
("1418","1","9","7","content","Text k modulu GALÉRIA","_menu_3_text_1","","1","0","0"),
("1419","1","9","8","content","Text k modulu FORMULÁR","_menu_4_text_1","","1","0","0"),
("1420","1","9","9","content","Text k modulu O REGIÓNE","_menu_5_text_1","<h3>ECHTES BERGERLEBNIS. ECHT GARANTIERT.</h3>\n\n<p>&nbsp;</p>\n\n<p><strong>&Uuml;ber 50 ausgezeichnete Sommerbergbahnen garantieren Erlebnisse auf h&ouml;chstem Niveau. </strong></p>\n\n<p>Lust auf Abenteuer, Genuss, Kunst, Familienidylle oder ein einzigartiges Panorama? &Uuml;ber 50 &ouml;sterreichische Sommer-Bergbahnen garantieren einzigartige Angebote auf h&ouml;chstem Niveau und machen den Berg f&uuml;r den Gast erlebbar.</p>\n","1","0","0"),
("1421","1","9","9","content","Ďalší text k modulu O REGIÓNE","_menu_5_text_2","<p>&nbsp;</p>\n\n<p>Mit&nbsp; dem G&uuml;tezeichen &bdquo;Beste &Ouml;sterreichische Sommer-Bergbahnen&ldquo; vom Fachverband der Seilbahnen der Wirtschaftskammer &Ouml;sterreich werden nur Unternehmen ausgezeichnet, die qualit&auml;tsgepr&uuml;fte Erlebnisangebote bieten und strenge Kontrollen erf&uuml;llen. Regelm&auml;&szlig;ige &Uuml;berpr&uuml;fungen stellen die Einhaltung des Qualit&auml;tsversprechens sicher. Die Palette der Erlebnisse reicht von wundersch&ouml;nen Themenwanderungen &uuml;ber naturbelassene Downhill-Strecken f&uuml;r Mountainbiker bis hin zu traumhaften Panoramarestaurants. Beste Aussichten f&uuml;r ein echtes Bergerlebnis.</p>\n","1","0","0"),
("1422","1","9","10","content","Text k modulu MAPA","_menu_6_text_1","<p>Mapa regionu</p>\n","1","0","0"),
("1423","1","9","2","content","Text k modulu UBYTOVANIE 1","_menu_7_text_1","<p><strong>amiamo - Familotel Zell am See</strong></p>\n\n<p>Jako prvn&iacute; boutique hotel pro rodiny&nbsp;s dětmi jsme stanovili standardy pro&nbsp;v&yacute;jimečn&eacute; z&aacute;žitky z dovolen&eacute;: mal&yacute;,&nbsp;vybran&yacute; a individu&aacute;ln&iacute;, vyznamenan&yacute;&nbsp;nejvy&scaron;&scaron;&iacute; pečet&iacute; jakosti Q III. Luxusn&iacute;&nbsp;penzion Amiamo v kombinaci s&nbsp;kartou Zell am See-Kaprun zaručuje&nbsp;odpočinkovou, ale i vzru&scaron;uj&iacute;c&iacute;&nbsp;dovolenou pro celou rodinu. S v&iacute;ce&nbsp;než 20-ti letou zku&scaron;enost&iacute; nab&iacute;z&iacute;me&nbsp;<br />\nhl&iacute;d&aacute;n&iacute; dět&iacute; v vnitřn&iacute; sekci o plo&scaron;e&nbsp;500 m&sup2; s velk&yacute;m množstv&iacute;m aktivit.&nbsp;</p>\n\n<p>NOVINKA:&nbsp;Sekce Wellness o plo&scaron;e 300 m&sup2;&nbsp;disponuje 3 baz&eacute;ny, Babynariem&nbsp;a kompletně zrekonstruovanou&nbsp;sekc&iacute; saun&nbsp;s relaxačn&iacute; m&iacute;stnost&iacute;.&nbsp;</p>\n\n<p>Na jezeře Zeller&nbsp;See&nbsp;V&aacute;s&nbsp;oček&aacute;v&aacute;&nbsp;hotelov&aacute; pl&aacute;ž s bohatou nab&iacute;dkou!</p>\n","1","0","0"),
("1424","1","9","12","content","Input Meno","form_base_name","Vorname","1","0","0"),
("1425","1","9","12","content","Input Priezvisko","form_base_surname","Nachname","1","0","0"),
("1426","1","9","12","content","Input PSČ","form_base_psc","PLZ","0","0","0"),
("1427","1","9","12","content","Input Mesto","form_base_city","Stadt","0","0","0"),
("1428","1","9","12","content","Input Email","form_base_email","E-mail","1","0","0"),
("1429","1","9","12","content","Input Doklad","form_extend_v1_doklad","Einkaufsbeleg Nr.","0","0","0"),
("1430","1","9","12","content","Input Otázka + odpovede","form_extend_v3_otazka","Wo werden Kornland Müsli-Riegel hergestellt? ","1","0","0"),
("1431","1","9","12","content","Odpoveď A","form_extend_v3_odpoved_a","Österreich","1","0","0"),
("1432","1","9","12","content","Odpoveď B","form_extend_v3_odpoved_b","Italien","1","0","0"),
("1433","1","9","12","content","Odpoveď C","form_extend_v3_odpoved_c","Deutschland","1","0","0"),
("1434","1","9","4","content","Názov","field_word_nazov","Názov","0","0","0"),
("1435","1","9","4","content","Adresa","field_word_adresa","Adresa","0","0","0"),
("1436","1","9","4","content","Kontakt","field_word_kontakt","Kontakt","0","0","0"),
("1437","1","9","4","content","Web","field_word_web","Web","0","0","0"),
("1438","1","9","4","content","Hláška povinné pole","field_word_err","Pflichtfelder","1","0","0"),
("1439","1","9","4","content","Registrovať","field_word_sent","Teilnehmen","1","0","0"),
("1440","1","9","4","content","Predchádzajúca (fotka)","field_word_previous","Vorheriges","1","0","0"),
("1441","1","9","4","content","Ďalšia (fotka)","field_word_next","Nächstes","1","0","0"),
("1442","1","9","4","content","Súhlasím s newslettrom","field_word_suhlas_news","Ja, ich stimme zu meine Daten für weitere Marketingaktivitäten des Fachverbandes Seilbahnen (Wirtschaftskammer Österreich) zur Verfügung zu stellen.","1","0","0"),
("1443","1","9","4","content","Súhlasím s podmienkami súťaže","field_word_suhlas_podm","Ja, ich stimme den Teilnahmebedingungen zu. (Teilnahmebedingungen HIER).","1","0","0"),
("1444","1","9","1","content","Kľúčové slová pre Google","keywords","gewinnspiel Sommer-Bergbahnen Kornland","1","0","0"),
("1445","1","9","1","content","Popis pre Google","description","This competition has a first ID","1","0","0"),
("1446","1","9","4","content","Súhlasím s podmienkami súťaže","field_word_dakujeme","Danke, Sie haben sich erfolgreich für das Gewinnspiel registriert.","1","0","0"),
("1447","1","9","12","image","Podmienky súťaže (PDF)","form_file_podmienky","263","1","0","0"),
("1448","1","9","12","image","Newsletter (PDF)","form_file_newsletter","216","0","0","0"),
("1449","1","9","4","content","Hláška možnosti novej registrácie","field_word_nova_registracia","Jetzt Freunde einladen!","1","0","0"),
("1450","1","9","13","content","Počet znakov vygenerovaného hashu","_email_conf_char","8","1","0","0"),
("1451","1","9","13","content","Hláška, súťažiacemu ktorá mu príde na email po registracii.","_email_conf_sent_text","Danke, Sie haben sich erfolgreich für das Gewinnspiel registriert. Wir wünschen Ihnen viel Erfolg bei der Verlosung! ","1","0","0"),
("1452","1","9","12","content","Telefónne číslo","form_base_tel_c","Telefonní číslo","0","0","0"),
("1453","1","9","4","content","Hláška za hviezdičkou o povinných poliach","field_word_povinne_polia","","1","0","0"),
("1454","1","9","2","image","Fotka loga k modulu UBYTOVANIE","_menu_7_image_2_1","59","0","0","0"),
("1455","1","9","16","content","Názov hotelu 2","info_hotel_name_2","Sporthotel Falkenstein","0","0","0"),
("1456","1","9","16","content","Adresa Hotela 2","info_hotel_addr_2","Nikolaus-Gassner-Str. 79   <br/>   A - 5710 Kaprun","1","0","0"),
("1457","1","9","16","content","Telefón do hotela 2","info_hotel_tel_c_2","+43 6547 7122","1","0","0"),
("1458","1","9","16","content","Email hotelu 2","info_hotel_email_2","sporthotel@falkenstein.at","1","0","0"),
("1459","1","9","16","content","Text k modulu UBYTOVANIE 2","_menu_7_text_2","<p><strong>Das Falkenstein</strong></p>\n\n<p>Tady v Kaprunu a hotelu Falkenstein lze objevit spoustu vzru&scaron;uj&iacute;c&iacute;ch možnost&iacute; a z&aacute;bavy&nbsp;pro rodiny a děti. Každ&yacute; den může b&yacute;t spojen s nov&yacute;mi z&aacute;žitky a dojmy, ať už jde&nbsp;o zvl&aacute;&scaron;tn&iacute; rodinn&eacute; turistick&eacute; v&yacute;lety, čvacht&aacute;n&iacute; a klouz&aacute;n&iacute; v Tauern SPA Kaprun, v&yacute;let&nbsp;k alpsk&eacute; horsk&eacute; bobov&eacute; dr&aacute;ze &quot;Maisfiltzer&quot;, o n&aacute;v&scaron;těvu volnočasov&eacute;ho nebo n&aacute;rodn&iacute;ho&nbsp;parku nebo o mnoh&aacute; dal&scaron;&iacute; dobrodružstv&iacute; - z&aacute;bavě se nekladou ž&aacute;dn&eacute; hranice.</p>\n\n<p>V hotelu Falkenstein&nbsp;se nach&aacute;z&iacute; kromě&nbsp;prostorn&eacute;ho&nbsp;dětsk&eacute;ho hři&scaron;tě&nbsp;a dětsk&eacute; herny tak&eacute;&nbsp;velk&yacute; baz&eacute;n a najdete&nbsp;zde i&nbsp;chutnou&nbsp;Pinzgauerskou&nbsp;kuchyni s pestr&yacute;mi&nbsp;dětsk&yacute;mi menu&nbsp;- n&aacute;&scaron; maskot Falki&nbsp;se na v&aacute;s tě&scaron;&iacute;!</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n","1","0","0"),
("1460","1","9","17","content","Text k modulu UBYTOVANIE 3","_menu_7_text_3","<p><strong>Dovolen&aacute; v Zell am See je dovolenou s požitkem - v hotelu Tirolerhof!</strong></p>\n\n<p>Jezero, hory, ledovec a stylov&yacute;, rodinn&yacute; 4-hvězdičkov&yacute; hotel superior v Zell am See &ndash; to je ide&aacute;ln&iacute; kombinace pro va&scaron;i dovolenou v Zell am See, v l&eacute;tě i v zimě. Budete m&iacute;t v&yacute;hled na jezero Zeller See, hory Schmittenh&ouml;he a Kitzsteinhorn se v&scaron;emi rozmanit&yacute;mi sportovn&iacute;mi a rekreačn&iacute;mi možnostmi a budete h&yacute;čk&aacute;ni v b&aacute;ječn&eacute;m a mimoř&aacute;dn&eacute;m hotelu kulin&aacute;řsk&yacute;mi specialitami nejvy&scaron;&scaron;&iacute; kvality. Nebo str&aacute;v&iacute;te dovolenou spojenou s golfem v Salcburku, kde budete m&iacute;t v&yacute;hled na n&aacute;dhern&eacute; hory a jezero oblasti Zell am See-Kaprun. Nebo si užijete ve dvou n&aacute;dhern&eacute; apartm&aacute;ny v r&aacute;mci romantick&eacute; dovolen&eacute;. Nebo si poř&aacute;dně odpočinete s wellness a l&aacute;zeňskou nab&iacute;dkou vy&scaron;&scaron;&iacute; tř&iacute;dy a načerp&aacute;te novou energii. Takto může vypadat va&scaron;e dal&scaron;&iacute; rekreačn&iacute; dovolen&aacute; v hotelu Tirolerhof Zell am See - v srdci Salcburku. Wellness hotel, čtyřhvězdičkov&yacute; hotel superior, hotel pro hosty s pejsky, relaxačn&iacute; hotel - v&scaron;echny tyto př&iacute;vlastky si hotel Tirolerhof plně zaslouž&iacute;.</p>\n\n<p>&nbsp;</p>\n\n<p><strong>Prožijte nezapomenutelnou dovolenou v hotelu Tirolerhof!</strong></p>\n","0","0","0"),
("1461","1","9","17","content","Email hotelu 3","info_hotel_email_3","welcome@tirolerhof.co.at","0","0","0"),
("1462","1","9","17","content","Telefón do hotela 3","info_hotel_tel_c_3","+43(0)6542/772-0","0","0","0"),
("1463","1","9","17","content","Adresa Hotela 3","info_hotel_addr_3","Auerspergstrasse 5   <br/>   A - 5700 Zell am See","0","0","0"),
("1464","1","9","17","content","Názov hotelu 3","info_hotel_name_3","Hotel Tirolerhof ****S","0","0","0"),
("1465","1","9","16","image","Fotka loga k modulu UBYTOVANIE 2","_menu_7_image_1_2","66","1","0","0"),
("1466","1","9","16","image","Fotka k modulu UBYTOVANIE 2","_menu_7_image_2_2","65","0","0","0"),
("1467","1","9","17","image","Fotka loga k modulu UBYTOVANIE 3","_menu_7_image_1_3","51","0","0","0"),
("1468","1","9","17","image","Fotka k modulu UBYTOVANIE 3","_menu_7_image_2_3","56","0","0","0"),
("1469","1","9","2","content","Url adresa hotela 1","link_hotel_1","https://www.amiamo.at","0","0","0"),
("1470","1","9","16","content","Url adresa hotela 2","link_hotel_2","http://www.falkenstein.at","0","0","0"),
("1471","1","9","17","content","Url adresa hotela 3","link_hotel_3","http://www.tirolerhof.co.at/","0","0","0"),
("1472","1","9","9","image","Druhá fotka modulu pre modul GALÉRIA","_menu_5_gallery_1","22","1","0","0"),
("1473","1","9","5","image","Fotka v hlavnom slideri 2","_menu_1_image_2","214","1","0","0"),
("1474","1","9","4","content","Po ukončení registrácie","field_word_koniec_registracie","<p>SOUTĚŽ BYLA UKONČENA 1.8. 2016</p>\n\n<p>Slosov&aacute;n&iacute; bylo provedeno dne 5.8.&nbsp;2016&nbsp;dle pravidel soutěže.&nbsp;</p>\n\n<p>&nbsp;</p>\n","0","0","0"),
("1475","1","9","11","content","Názov modulu pre modul O PARTNEROVI","_menu_name_8","Kornland","1","4","0"),
("1476","1","9","15","content","Email partnera","info_partner_email","info@kornland.at","1","0","0"),
("1477","1","9","15","content","Adresa partnera","info_partner_addr","Dresdnerstrasse 38-40 <br/> A - 1200 Wien","1","0","0"),
("1478","1","9","15","content","Názov partnera","info_partner_name","Bahlsen GmbH & Co. KG","1","0","0"),
("1479","1","9","15","content","Telefónne číslo na partnera","info_partner_tel_c","+43 (0)1 33 192 0","1","0","0"),
("1480","1","9","11","content","Text k modulu O PARTNEROVI 1","_menu_8_text_1","<p><span style=\"font-size:18px\"><strong>Kornland M&uuml;sli-Riegel:</strong></span></p>\n\n<p><span style=\"font-size:18px\"><strong>Nat&uuml;rlich gut f&uuml;r zwischendurch und unterwegs!</strong></span></p>\n\n<p><span style=\"font-size:16px\">Kornland M&uuml;sli-Riegel sind ideal f&uuml;r zwischendurch und unterwegs. In der Schule, auf der Uni, am Arbeitsplatz, beim Sport oder bei einem Ausflug mit der Familie sind Kornland M&uuml;sli-Riegel die perfekten Begleiter. Sie passen in jede Tasche, geben Energie und sind in vielen k&ouml;stlichen Sorten erh&auml;ltlich.</span></p>\n\n<p><span style=\"font-size:16px\">Kornland M&uuml;sli-Riegel kommen aus &Ouml;sterreich und sind <strong>ohne Zusatz von Konservierungsstoffen</strong> (lt. Europ. Lebensmittelrecht), <strong>geh&auml;rteten Fetten</strong> und <strong>Farbstoffen</strong> hergestellt. <strong>Nur mit nat&uuml;rlichen Aromen</strong>.</span></p>\n\n<p><span style=\"font-size:16px\">Jetzt Fan werden: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<a href=\"http://www.facebook.com/kornlandoesterreich\">www.facebook.com/kornlandoesterreich</a> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<a href=\"http://www.instagram.com/kornlandoesterreich\">www.instagram.com/kornlandoesterreich</a></span></p>\n\n<p>&nbsp;</p>\n","1","0","0"),
("1481","1","9","1","content","Jazyková mutácia pre Facebook","_language","de_DE","1","0","0"),
("1482","1","9","12","image","Newsletter 2 (PDF)","form_file_newsletter_2","217","1","0","0"),
("1483","1","9","4","content","Súhlasím s newslettrom 2","field_word_suhlas_news_2","Ja, ich stimme zu, den Newsletter von der Marke Kornland zu erhalten und meine Daten für weitere Marketingaktivitäten zur Verfügung zu stellen.","1","0","0");
INSERT INTO dnt_microsites_composer VALUES
("1484","1","9","18","content","Email hotelu 4","info_hotel_email_4","welcome@tirolerhof.co.at","0","0","0"),
("1485","1","9","18","content","Telefón do hotela 4","info_hotel_tel_c_4","+43(0)6542/772-0","0","0","0"),
("1486","1","9","18","content","Adresa Hotela 4","info_hotel_addr_4","Auerspergstrasse 5   <br/>   A - 5700 Zell am See","1","0","0"),
("1487","1","9","18","content","Názov hotelu 4","info_hotel_name_4","Hotel Tirolerhof ****S","0","0","0"),
("1488","1","9","18","image","Fotka loga k modulu UBYTOVANIE 4","_menu_7_image_1_4","","0","0","0"),
("1489","1","9","18","image","Fotka k modulu UBYTOVANIE 4","_menu_7_image_2_4","","1","0","0"),
("1490","1","9","18","content","Url adresa hotela 4","link_hotel_4","http://www.tirolerhof.co.at/","0","0","0"),
("1491","1","9","18","content","Text k modulu UBYTOVANIE 4","_menu_7_text_4","","0","0","0"),
("1492","1","9","11","image","Fotka k modulu O PARTNEROVI","_menu_8_image_1","223","1","0","0"),
("1493","1","10","1","content","Template","layout","dnt_first","1","0","0"),
("1494","1","10","15","content","Link partnera","link_partner","http://www.morawa-buch.at","1","0","0"),
("1495","1","10","3","content","Link regionu","link_region","http://www.salzburg.info","1","0","0"),
("1496","1","10","1","content","Zobraziť na URL adrese","real_address","http://www.vyhrat.com/","1","0","0"),
("1497","1","10","1","content","Facebook","social_fb","https://www.facebook.com/Morawa.Buch","1","0","0"),
("1498","1","10","1","content","Twitter","social_twitter","https://twitter.com/salzburg_info","1","0","0"),
("1499","1","10","1","content","Instagram","social_linked_in","https://www.linkedin.com/","0","0","0"),
("1500","1","10","1","content","Mapa ","map_location","https://www.google.at/maps/place/Salzburg/@47.8029038,12.9862175,12z/data=!3m1!4b1!4m5!3m4!1s0x47769adda908d4b1:0xc1e183a1412af73d!8m2!3d47.80949!4d13.05501","1","0","0"),
("1501","1","10","1","image","Favicon","favicon","57","1","0","0"),
("1502","1","10","1","content","Model farby R","_r","170","1","0","0"),
("1503","1","10","1","content","Model farby G","_g","55","1","0","0"),
("1504","1","10","1","content","Model farby B","_b","65","1","0","0"),
("1505","1","10","1","content","Font","_font","Georgia","1","0","0"),
("1506","1","10","2","content","Názov hotelu 1","info_hotel_name_1","Hotel & Villa Auersperg","1","0","0"),
("1507","1","10","2","content","Adresa Hotela 1","info_hotel_addr_1","Auerspergstraße 61  <br/>   A - 5020 Salzburg","1","0","0"),
("1508","1","10","2","content","Telefón do hotela 1","info_hotel_tel_c_1","+43 662 88 9 44","1","0","0"),
("1509","1","10","2","content","Email hotelu 1","info_hotel_email_1","info@auersperg.at","1","0","0"),
("1510","1","10","3","content","Názov regiónu","info_region_name","TSG Tourismus Salzburg GmbH","1","0","0"),
("1511","1","10","3","content","Adresa regiónu","info_region_addr","Auerspergstraße 6  <br/>  A-5020 Salzburg","1","0","0"),
("1512","1","10","3","content","Telefónne číslo regiónu","info_region_tel_c","+43 662 88987 0","1","0","0"),
("1513","1","10","3","content","Email regiónu","info_region_email","tourist@salzburg.info","1","0","0"),
("1514","1","10","1","content","Youtube video","youtube_video","3Jff34rxECY","1","0","0"),
("1515","1","10","15","image","Logo partnera","partner_logo","235","1","0","0"),
("1516","1","10","3","image","Logo regiónu","region_logo","230","1","0","0"),
("1517","1","10","5","image","Fotka v hlavnom slideri 1","_menu_1_image_1","253","1","0","0"),
("1518","1","10","7","image","Fotka modulu pre modul GALÉRIA","_menu_3_image_1","255","1","0","0"),
("1519","1","10","7","image","Druhá fotka modulu pre modul GALÉRIA","_menu_3_image_2","258","1","0","0"),
("1520","1","10","2","image","Fotka k modulu UBYTOVANIE","_menu_7_image_1_1","240","1","0","0"),
("1521","1","10","5","content","Názov modulu pre modul INFO","_menu_name_1","Gewinn","1","1","0"),
("1522","1","10","6","content","Názov modulu pre modul O SÚŤAŽI","_menu_name_2","Gewinnspiel","0","0","0"),
("1523","1","10","7","content","Názov modulu pre modul GALÉRIU","_menu_name_3","Galérie","0","0","0"),
("1524","1","10","8","content","Názov modulu pre modul FORMULÁRU","_menu_name_4","Teilnehmen","1","2","0"),
("1525","1","10","9","content","Názov modulu pre modul O REGIONE","_menu_name_5","Salzburg im Advent","1","3","0"),
("1526","1","10","10","content","Názov modulu pre modul MAPA","_menu_name_6","Mapa","0","0","0"),
("1527","1","10","11","content","Názov modulu pre modul UBYTOVANIE","_menu_name_7","Hotel & Villa Auersperg","1","4","0"),
("1528","1","10","5","content","Text k modulu INFO","_menu_1_text_1","<p><span style=\"color:#F0F8FF\"><span style=\"font-size:26px\"><strong>Mit &bdquo;Gl&uuml;hwein, Mord und Gloria&ldquo; einen Urlaub in&nbsp;Salzburg gewinnen!</strong></span></span></p>\n","1","0","0"),
("1529","1","10","6","content","Text k modulu O SÚŤAŽI","_menu_2_text_1","<h3><strong>Mit &bdquo;Gl&uuml;hwein, Mord und Gloria&ldquo;&nbsp;einen Urlaub in Salzburg gewinnen!</strong></h3>\n\n<p>Ein verschwundener Detektiv-Schn&uuml;ffler aus einem Weihnachtstheaterst&uuml;ck, ein toter Nikolaus in einem Sexshop, ein Weihnachtszauber Happening mit m&ouml;rderischem Ausgang &hellip; Die neuen Weihnachtsgeschichten von Manfred Baumann rund um den Salzburger Kommissar Merana sind schr&auml;g, ber&uuml;hrend und voll von glitzernden &Uuml;berraschungen.<br />\nSie wollen selbst auf Entdeckungsreise durch das winterliche Salzburg gehen? Schr&auml;ge und ber&uuml;hrende Weihnachtsgeschichten am Original-Krimischauplatz erleben? Oder doch ganz in Ruhe und stimmungsvoll &uuml;ber die romantischen Salzburger Weihnachtsm&auml;rkte schlendern und den ein oder anderen Gl&uuml;hwein verkosten?</p>\n\n<p><span style=\"font-size:18px\"><strong>Dann nennen Sie uns mindestens einen Salzburger Weihnachtsmarkt&nbsp;</strong></span><span style=\"font-size:18px\"><strong>und gewinnen Sie einen von 3 Salzburg-Urlauben f&uuml;r 2 Erwachsene &agrave; 2 N&auml;chte inkl. Fr&uuml;hst&uuml;ck und 48h Salzburg Card </strong></span><span style=\"font-size:18px\"><strong>zusammen mit dem neuen Baumann-Krimi &bdquo;Gl&uuml;hwein, Mord und Gloria&ldquo;.</strong></span></p>\n\n<p><span style=\"font-size:18px\">Wir w&uuml;nschen Ihnen viel Gl&uuml;ck!</span></p>\n","1","0","0"),
("1530","1","10","7","content","Text k modulu GALÉRIA","_menu_3_text_1","","1","0","0"),
("1531","1","10","8","content","Text k modulu FORMULÁR","_menu_4_text_1","","1","0","0"),
("1532","1","10","9","content","Text k modulu O REGIÓNE","_menu_5_text_1","<p><strong><span style=\"font-size:16px\">M&auml;rchenhafte Kulissen im Salzburger Advent</span></strong></p>\n\n<p>Nie ist Salzburg romantischer, als wenn seine Gassen und Pl&auml;tze mit Girlanden festlich geschm&uuml;ckt sind und es &uuml;berall nach Weihnachtsleckereien riecht.</p>\n\n<p>Mitten in der Innenstadt befinden sich die romantischen Christkindlm&auml;rkte der Stadt, wie der Adventmarkt am Mirabellplatz, in St. Peter oder auf der Festung Hohensalzburg, sowie der ber&uuml;hmte Salzburger Christkindlmarkt am Dom- und Residenzplatz &ndash; einer der sch&ouml;nsten und &auml;ltesten Christkindlm&auml;rkte der Welt.</p>\n","1","0","0"),
("1533","1","10","9","content","Ďalší text k modulu O REGIÓNE","_menu_5_text_2","<p>&nbsp;</p>\n\n<p>Besonders romantisch und besinnlich ist auch der Hellbrunner Adventzauber vor der Kulisse des pr&auml;chtigen Schlosses Hellbrunn etwas au&szlig;erhalb der Altstadt. Hier bringen ein romantischer Schlosshof, ein fackelges&auml;umter Weg und ein &uuml;berdimensionaler Adventkalender die Besucher in Weihnachtsstimmung.</p>\n\n<p>Weitere Infos zum Advent in Salzburg: <a href=\"http://www.salzburg.info/advent\" target=\"_blank\">www.salzburg.info/advent</a></p>\n\n<p>Salzburg-Urlaub ab &euro; 119 p.P.: <a href=\"http://www.salzburg.info/cardpackages\" target=\"_blank\">www.salzburg.info/cardpackages</a></p>\n","1","0","0"),
("1534","1","10","10","content","Text k modulu MAPA","_menu_6_text_1","<p>Mapa regionu</p>\n","1","0","0"),
("1535","1","10","2","content","Text k modulu UBYTOVANIE 1","_menu_7_text_1","<p>&nbsp;</p>\n\n<p><strong>Ein Haus f&uuml;r die Seele</strong></p>\n\n<p>Ein absoluter Geheimtipp f&uuml;r Genie&szlig;er: Ruhig und dennoch zentral gelegen, bietet das Hotel &amp; Villa Auersperg Entspannung im hektischen Treiben.</p>\n\n<p>55 geschmackvoll renovierte Zimmer im stilsicheren Mix von Klassisch bis Modern vermitteln ein besonderes Lebensgef&uuml;hl.</p>\n\n<p>In dieser Oase im urbanen Andr&auml;viertel scheint die Zeit still zu stehen - der perfekte Ort um Loszulassen: beim biologischen Fr&uuml;hst&uuml;cksbuffet, beim Genie&szlig;en von Auersperg-Klassikern wie getoasteten Sandwiches, &ouml;sterreichischen Antipasti-Tellern oder Apfel-Schoko-Gugelhupf oder beim w&ouml;chentlichen early morning Yoga im Dachterrassen-Spa.</p>\n","1","0","0"),
("1536","1","10","12","content","Input Meno","form_base_name","Vorname","1","0","0"),
("1537","1","10","12","content","Input Priezvisko","form_base_surname","Nachname","1","0","0"),
("1538","1","10","12","content","Input PSČ","form_base_psc","PLZ","1","0","0"),
("1539","1","10","12","content","Input Mesto","form_base_city","Stadt","1","0","0"),
("1540","1","10","12","content","Input Email","form_base_email","E-mail","1","0","0"),
("1541","1","10","12","content","Input Doklad","form_extend_v1_doklad","Nennen Sie mindestens einen der vielen <a href=\"http://www.salzburg.info/de/kunst_kultur/advent_silvester/weihnachtsmaerkte?utm_source=lp&utm_medium=gewinnspiel&utm_campaign=morawa\" target=\"_blank\"> Weihnachtsmärkte in Salzburg </a>","1","0","0"),
("1542","1","10","12","content","Input Otázka + odpovede","form_extend_v3_otazka","Gewinnspielfrage?","0","0","0"),
("1543","1","10","12","content","Odpoveď A","form_extend_v3_odpoved_a","áno","0","0","0"),
("1544","1","10","12","content","Odpoveď B","form_extend_v3_odpoved_b","neviem","0","0","0"),
("1545","1","10","12","content","Odpoveď C","form_extend_v3_odpoved_c","možno","0","0","0"),
("1546","1","10","4","content","Názov","field_word_nazov","Názov","0","0","0"),
("1547","1","10","4","content","Adresa","field_word_adresa","Adresa","0","0","0"),
("1548","1","10","4","content","Kontakt","field_word_kontakt","Kontakt","0","0","0"),
("1549","1","10","4","content","Web","field_word_web","Web","0","0","0"),
("1550","1","10","4","content","Hláška povinné pole","field_word_err","Pflichtfelder","1","0","0"),
("1551","1","10","4","content","Registrovať","field_word_sent","Teilnehmen","1","0","0"),
("1552","1","10","4","content","Predchádzajúca (fotka)","field_word_previous","Vorheriges","1","0","0"),
("1553","1","10","4","content","Ďalšia (fotka)","field_word_next","Nächstes","1","0","0"),
("1554","1","10","4","content","Súhlasím s newslettrom","field_word_suhlas_news","Ja, ich möchte 5 x pro Jahr per Newsletter über aktuelle Veranstaltungen in der Stadt Salzburg informiert werden.","1","0","0"),
("1555","1","10","4","content","Súhlasím s podmienkami súťaže","field_word_suhlas_podm","Ja, ich stimme den Teilnahmebedingungen zu. (Teilnahmebedingungen HIER).","1","0","0"),
("1556","1","10","1","content","Kľúčové slová pre Google","keywords","gewinnspiel Salzburg Morawa","1","0","0"),
("1557","1","10","1","content","Popis pre Google","description","This competition has a first ID","1","0","0"),
("1558","1","10","4","content","Súhlasím s podmienkami súťaže","field_word_dakujeme","Danke, Sie haben sich erfolgreich für das Gewinnspiel registriert. Wir wünschen Ihnen viel Glück!","1","0","0"),
("1559","1","10","12","image","Podmienky súťaže (PDF)","form_file_podmienky","248","1","0","0"),
("1560","1","10","12","image","Newsletter (PDF)","form_file_newsletter","68","0","0","0"),
("1561","1","10","4","content","Hláška možnosti novej registrácie","field_word_nova_registracia","Jetzt Freunde einladen!","1","0","0"),
("1562","1","10","13","content","Počet znakov vygenerovaného hashu","_email_conf_char","8","1","0","0"),
("1563","1","10","13","content","Hláška, súťažiacemu ktorá mu príde na email po registracii.","_email_conf_sent_text","Danke, Sie haben sich erfolgreich für das Gewinnspiel registriert. Wir wünschen Ihnen viel Erfolg bei der Verlosung! ","1","0","0"),
("1564","1","10","12","content","Telefónne číslo","form_base_tel_c","Telefon","0","0","0"),
("1565","1","10","4","content","Hláška za hviezdičkou o povinných poliach","field_word_povinne_polia","","1","0","0"),
("1566","1","10","2","image","Fotka loga k modulu UBYTOVANIE","_menu_7_image_2_1","239","1","0","0"),
("1567","1","10","16","content","Názov hotelu 2","info_hotel_name_2","Sporthotel Falkenstein","0","0","0"),
("1568","1","10","16","content","Adresa Hotela 2","info_hotel_addr_2","Nikolaus-Gassner-Str. 79   <br/>   A - 5710 Kaprun","1","0","0"),
("1569","1","10","16","content","Telefón do hotela 2","info_hotel_tel_c_2","+43 6547 7122","1","0","0"),
("1570","1","10","16","content","Email hotelu 2","info_hotel_email_2","sporthotel@falkenstein.at","1","0","0"),
("1571","1","10","16","content","Text k modulu UBYTOVANIE 2","_menu_7_text_2","<p><strong>Das Falkenstein</strong></p>\n\n<p>Tady v Kaprunu a hotelu Falkenstein lze objevit spoustu vzru&scaron;uj&iacute;c&iacute;ch možnost&iacute; a z&aacute;bavy&nbsp;pro rodiny a děti. Každ&yacute; den může b&yacute;t spojen s nov&yacute;mi z&aacute;žitky a dojmy, ať už jde&nbsp;o zvl&aacute;&scaron;tn&iacute; rodinn&eacute; turistick&eacute; v&yacute;lety, čvacht&aacute;n&iacute; a klouz&aacute;n&iacute; v Tauern SPA Kaprun, v&yacute;let&nbsp;k alpsk&eacute; horsk&eacute; bobov&eacute; dr&aacute;ze &quot;Maisfiltzer&quot;, o n&aacute;v&scaron;těvu volnočasov&eacute;ho nebo n&aacute;rodn&iacute;ho&nbsp;parku nebo o mnoh&aacute; dal&scaron;&iacute; dobrodružstv&iacute; - z&aacute;bavě se nekladou ž&aacute;dn&eacute; hranice.</p>\n\n<p>V hotelu Falkenstein&nbsp;se nach&aacute;z&iacute; kromě&nbsp;prostorn&eacute;ho&nbsp;dětsk&eacute;ho hři&scaron;tě&nbsp;a dětsk&eacute; herny tak&eacute;&nbsp;velk&yacute; baz&eacute;n a najdete&nbsp;zde i&nbsp;chutnou&nbsp;Pinzgauerskou&nbsp;kuchyni s pestr&yacute;mi&nbsp;dětsk&yacute;mi menu&nbsp;- n&aacute;&scaron; maskot Falki&nbsp;se na v&aacute;s tě&scaron;&iacute;!</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n","1","0","0"),
("1572","1","10","17","content","Text k modulu UBYTOVANIE 3","_menu_7_text_3","<p><strong>Dovolen&aacute; v Zell am See je dovolenou s požitkem - v hotelu Tirolerhof!</strong></p>\n\n<p>Jezero, hory, ledovec a stylov&yacute;, rodinn&yacute; 4-hvězdičkov&yacute; hotel superior v Zell am See &ndash; to je ide&aacute;ln&iacute; kombinace pro va&scaron;i dovolenou v Zell am See, v l&eacute;tě i v zimě. Budete m&iacute;t v&yacute;hled na jezero Zeller See, hory Schmittenh&ouml;he a Kitzsteinhorn se v&scaron;emi rozmanit&yacute;mi sportovn&iacute;mi a rekreačn&iacute;mi možnostmi a budete h&yacute;čk&aacute;ni v b&aacute;ječn&eacute;m a mimoř&aacute;dn&eacute;m hotelu kulin&aacute;řsk&yacute;mi specialitami nejvy&scaron;&scaron;&iacute; kvality. Nebo str&aacute;v&iacute;te dovolenou spojenou s golfem v Salcburku, kde budete m&iacute;t v&yacute;hled na n&aacute;dhern&eacute; hory a jezero oblasti Zell am See-Kaprun. Nebo si užijete ve dvou n&aacute;dhern&eacute; apartm&aacute;ny v r&aacute;mci romantick&eacute; dovolen&eacute;. Nebo si poř&aacute;dně odpočinete s wellness a l&aacute;zeňskou nab&iacute;dkou vy&scaron;&scaron;&iacute; tř&iacute;dy a načerp&aacute;te novou energii. Takto může vypadat va&scaron;e dal&scaron;&iacute; rekreačn&iacute; dovolen&aacute; v hotelu Tirolerhof Zell am See - v srdci Salcburku. Wellness hotel, čtyřhvězdičkov&yacute; hotel superior, hotel pro hosty s pejsky, relaxačn&iacute; hotel - v&scaron;echny tyto př&iacute;vlastky si hotel Tirolerhof plně zaslouž&iacute;.</p>\n\n<p>&nbsp;</p>\n\n<p><strong>Prožijte nezapomenutelnou dovolenou v hotelu Tirolerhof!</strong></p>\n","0","0","0"),
("1573","1","10","17","content","Email hotelu 3","info_hotel_email_3","welcome@tirolerhof.co.at","0","0","0"),
("1574","1","10","17","content","Telefón do hotela 3","info_hotel_tel_c_3","+43(0)6542/772-0","0","0","0"),
("1575","1","10","17","content","Adresa Hotela 3","info_hotel_addr_3","Auerspergstrasse 5   <br/>   A - 5700 Zell am See","0","0","0"),
("1576","1","10","17","content","Názov hotelu 3","info_hotel_name_3","Hotel Tirolerhof ****S","0","0","0"),
("1577","1","10","16","image","Fotka loga k modulu UBYTOVANIE 2","_menu_7_image_1_2","66","1","0","0"),
("1578","1","10","16","image","Fotka k modulu UBYTOVANIE 2","_menu_7_image_2_2","65","0","0","0"),
("1579","1","10","17","image","Fotka loga k modulu UBYTOVANIE 3","_menu_7_image_1_3","51","0","0","0"),
("1580","1","10","17","image","Fotka k modulu UBYTOVANIE 3","_menu_7_image_2_3","56","0","0","0"),
("1581","1","10","2","content","Url adresa hotela 1","link_hotel_1","http://www.auersperg.at","1","0","0"),
("1582","1","10","16","content","Url adresa hotela 2","link_hotel_2","http://www.falkenstein.at","1","0","0"),
("1583","1","10","17","content","Url adresa hotela 3","link_hotel_3","http://www.tirolerhof.co.at/","0","0","0");
INSERT INTO dnt_microsites_composer VALUES
("1584","1","10","9","image","Druhá fotka modulu pre modul GALÉRIA","_menu_5_gallery_1","26","1","0","0"),
("1585","1","10","5","image","Fotka v hlavnom slideri 2","_menu_1_image_2","254","1","0","0"),
("1586","1","10","4","content","Po ukončení registrácie","field_word_koniec_registracie","<p><span style=\"color:rgb(255, 0, 0)\"><span style=\"font-size:22px\"><span style=\"font-family:arial,helvetica,sans-serif\"><strong>Das GEWINNSPIEL wurde bereits BEENDET!​</strong></span></span></span></p>\n\n<p><span style=\"color:rgb(255, 0, 0)\"><span style=\"font-size:22px\">Wir danken Ihnen<span style=\"font-family:arial,sans-serif\">&nbsp;f&uuml;r die zahlreiche Beteiligung!</span></span></span></p>\n\n<p><span style=\"color:rgb(255, 0, 0)\"><span style=\"font-size:20px\"><span style=\"font-family:arial,helvetica,sans-serif\">Die Gewinner werden in K&uuml;rze per E-Mail benachrichtigt.</span></span></span></p>\n\n<p><strong><span style=\"color:rgb(255, 0, 0)\"><span style=\"font-size:22px\"><span style=\"font-family:arial,helvetica,sans-serif\">Wir&nbsp;gratulieren den&nbsp;Gewinnern und&nbsp;w&uuml;nschen ihnen&nbsp;einen sch&ouml;nen Aufenthalt!</span></span></span></strong></p>\n","0","0","0"),
("1587","1","10","11","content","Názov modulu pre modul O PARTNEROVI","_menu_name_8","Morawa","0","0","0"),
("1588","1","10","15","content","Email partnera","info_partner_email","buchhandel@morawa-buch.at","1","0","0"),
("1589","1","10","15","content","Adresa partnera","info_partner_addr","Wollzeile 11 <br/> 	A-1010 Wien","1","0","0"),
("1590","1","10","15","content","Názov partnera","info_partner_name","Morawa Buch und Medien GmbH","1","0","0"),
("1591","1","10","15","content","Telefónne číslo na partnera","info_partner_tel_c","+43 01 513 7 513 - 450","1","0","0"),
("1592","1","10","11","content","Text k modulu O PARTNEROVI 1","_menu_8_text_1","<p><strong><span style=\"color:rgb(226, 0, 26)\">Morawa</span></strong>&nbsp;f&uuml;hlt sich dem Grundrecht auf Meinungs- und Pressefreiheit verpflichtet und tr&auml;gt durch seine Aktivit&auml;ten zur F&ouml;rderung geistiger und kultureller Werte in der &ouml;sterreichischen Bev&ouml;lkerung bei.</p>\n\n<p><strong><span style=\"color:rgb(226, 0, 26)\">Morawa</span></strong>&nbsp;verbindet in seiner langj&auml;hrigen Unternehmensgeschichte Tradition und Innovation bei der Verbreitung von Printprodukten.</p>\n\n<p>Die&nbsp;<strong><span style=\"color:rgb(226, 0, 26)\">Morawa Buch und Medien-Gruppe</span></strong>&nbsp;z&auml;hlt mit&nbsp;<strong>Leykam Buchhandel</strong>&nbsp;und&nbsp;<strong>K&auml;rntner Buchhandlungen</strong>&nbsp;mit insgesamt 18 Standorten zu den gr&ouml;&szlig;ten &ouml;sterreichischen Buchhandelsunternehmen.</p>\n","1","0","0"),
("1593","1","10","1","content","Jazyková mutácia pre Facebook","_language","de_DE","1","0","0"),
("1594","1","10","12","image","Newsletter 2 (PDF)","form_file_newsletter_2","68","1","0","0"),
("1595","1","10","4","content","Súhlasím s newslettrom 2","field_word_suhlas_news_2","Ja, ich möchte in Zukunft über Neuigkeiten der Morawa Buch und Medien GmbH informiert werden.","1","0","0"),
("1596","1","10","18","content","Email hotelu 4","info_hotel_email_4","welcome@tirolerhof.co.at","0","0","0"),
("1597","1","10","18","content","Telefón do hotela 4","info_hotel_tel_c_4","+43(0)6542/772-0","0","0","0"),
("1598","1","10","18","content","Adresa Hotela 4","info_hotel_addr_4","Auerspergstrasse 5   <br/>   A - 5700 Zell am See","1","0","0"),
("1599","1","10","18","content","Názov hotelu 4","info_hotel_name_4","Hotel Tirolerhof ****S","0","0","0"),
("1600","1","10","18","image","Fotka loga k modulu UBYTOVANIE 4","_menu_7_image_1_4","","0","0","0"),
("1601","1","10","18","image","Fotka k modulu UBYTOVANIE 4","_menu_7_image_2_4","","1","0","0"),
("1602","1","10","18","content","Url adresa hotela 4","link_hotel_4","http://www.tirolerhof.co.at/","0","0","0"),
("1603","1","10","18","content","Text k modulu UBYTOVANIE 4","_menu_7_text_4","","0","0","0"),
("1604","1","10","11","image","Fotka k modulu O PARTNEROVI","_menu_8_image_1","","1","0","0"),
("1605","1","11","1","content","Template","layout","dnt_first","1","0","0"),
("1606","1","11","15","content","Link partnera","link_partner","http://www.corial.cz","1","0","0"),
("1607","1","11","3","content","Link regionu","link_region","http://www.salzburg.info/cs","1","0","0"),
("1608","1","11","1","content","Zobraziť na URL adrese","real_address","http://www.vyhrat.com/","1","0","0"),
("1609","1","11","1","content","Facebook","social_fb","https://www.facebook.com/CORIAL.CR","1","0","0"),
("1610","1","11","1","content","Twitter","social_twitter","https://twitter.com/salzburg_info","1","0","0"),
("1611","1","11","1","content","Instagram","social_linked_in","https://www.linkedin.com/","0","0","0"),
("1612","1","11","1","content","Mapa ","map_location","https://www.google.cz/maps/place/Salzburg,+Rakousko/@47.802904,12.9863895,12z/data=!3m1!4b1!4m5!3m4!1s0x47769adda908d4b1:0xc1e183a1412af73d!8m2!3d47.80949!4d13.05501","1","0","0"),
("1613","1","11","1","image","Favicon","favicon","57","1","0","0"),
("1614","1","11","1","content","Model farby R","_r","170","1","0","0"),
("1615","1","11","1","content","Model farby G","_g","55","1","0","0"),
("1616","1","11","1","content","Model farby B","_b","65","1","0","0"),
("1617","1","11","1","content","Font","_font","Georgia","1","0","0"),
("1618","1","11","2","content","Názov hotelu 1","info_hotel_name_1","Familotel - amiamo","0","0","0"),
("1619","1","11","2","content","Adresa Hotela 1","info_hotel_addr_1","Salzachtal Bundesstrasse 20   <br/>   A - 5700 Zell am See","1","0","0"),
("1620","1","11","2","content","Telefón do hotela 1","info_hotel_tel_c_1","+43 6542 55355","1","0","0"),
("1621","1","11","2","content","Email hotelu 1","info_hotel_email_1","hotel@amiamo.at","1","0","0"),
("1622","1","11","3","content","Názov regiónu","info_region_name","TSG Tourismus Salzburg GmbH","1","0","0"),
("1623","1","11","3","content","Adresa regiónu","info_region_addr","Auerspergstraße 6  <br/>  A-5020 Salzburg","1","0","0"),
("1624","1","11","3","content","Telefónne číslo regiónu","info_region_tel_c","+43 662 88987 0","1","0","0"),
("1625","1","11","3","content","Email regiónu","info_region_email","tourist@salzburg.info","1","0","0"),
("1626","1","11","1","content","Youtube video","youtube_video","3Jff34rxECY","1","0","0"),
("1627","1","11","15","image","Logo partnera","partner_logo","244","1","0","0"),
("1628","1","11","3","image","Logo regiónu","region_logo","243","1","0","0"),
("1629","1","11","5","image","Fotka v hlavnom slideri 1","_menu_1_image_1","241","1","0","0"),
("1630","1","11","7","image","Fotka modulu pre modul GALÉRIA","_menu_3_image_1","249","1","0","0"),
("1631","1","11","7","image","Druhá fotka modulu pre modul GALÉRIA","_menu_3_image_2","250","1","0","0"),
("1632","1","11","2","image","Fotka k modulu UBYTOVANIE","_menu_7_image_1_1","63","1","0","0"),
("1633","1","11","5","content","Názov modulu pre modul INFO","_menu_name_1","Intro","1","1","0"),
("1634","1","11","6","content","Názov modulu pre modul O SÚŤAŽI","_menu_name_2","O soutěži","0","0","0"),
("1635","1","11","7","content","Názov modulu pre modul GALÉRIU","_menu_name_3","Galérie","0","0","0"),
("1636","1","11","8","content","Názov modulu pre modul FORMULÁRU","_menu_name_4","Registrace","1","3","0"),
("1637","1","11","9","content","Názov modulu pre modul O REGIONE","_menu_name_5","Salzburg","1","2","0"),
("1638","1","11","10","content","Názov modulu pre modul MAPA","_menu_name_6","Mapa","0","0","0"),
("1639","1","11","11","content","Názov modulu pre modul UBYTOVANIE","_menu_name_7","Ubytování","0","0","0"),
("1640","1","11","5","content","Text k modulu INFO","_menu_1_text_1","<div style=\"background:#eee;border:1px solid #ccc;padding:5px 10px;\"><span style=\"font-size:26px\"><span style=\"font-family:georgia,serif\"><strong><span style=\"color:#990000\">Soutěž! Hrajte s n&aacute;mi o 3x v&iacute;kend pro dva v Salzburgu!</span></strong></span></span></div>\n","1","0","0"),
("1641","1","11","6","content","Text k modulu O SÚŤAŽI","_menu_2_text_1","<h3><span style=\"font-family:georgia,serif\"><span style=\"font-size:20px\"><strong>Nakupujte v prodejn&aacute;ch&nbsp;CORIAL v ČR a vyhrajte jeden z&nbsp;3&nbsp;pobytů&nbsp;v rakousk&eacute;m&nbsp;SALZBURGU!</strong></span></span></h3>\n\n<p><span style=\"font-family:georgia,serif\"><span style=\"font-size:18px\">Stač&iacute; když v obdob&iacute; 1.09. - 31.10.&nbsp;2016&nbsp;nakoup&iacute;te&nbsp;<a href=\"http://www.corial.cz/cs/prodejny/\" target=\"_blank\">v&nbsp;prodejn&aacute;ch CORIAL</a>&nbsp;v ČR nad 500 Kč a&nbsp;zaregistrujete online svůj doklad o n&aacute;kupu.&nbsp;Do soutěže se můžete zaregistrovat i v&iacute;cekr&aacute;t, pokud opakovaně nakoup&iacute;te v&nbsp;prodejn&aacute;ch&nbsp;CORIAL v ČR. Doklad z n&aacute;kupu si uschovejte pro př&iacute;pad v&yacute;hry.</span></span></p>\n\n<h3><span style=\"font-family:georgia,serif\"><span style=\"font-size:18px\">V&yacute;hry v soutěži:</span></span></h3>\n\n<p><span style=\"font-family:georgia,serif\"><span style=\"font-size:18px\"><strong>3x pobyt pro 2 osoby&nbsp;na 4 dny&nbsp;/&nbsp;3 noci ve 3-4* hotelu, včetně sn&iacute;daně a&nbsp;3-denn&iacute; slevov&eacute; karty <a href=\"http://www.salzburg.info/cs/sights/kartou_salcburku\" target=\"_blank\">SalzburgCard</a>&nbsp;</strong></span></span></p>\n\n<p><span style=\"font-family:georgia,serif\"><span style=\"font-size:18px\"><strong>Soutěž prob&iacute;h&aacute; 1.09. - 31.10. 2016 na &uacute;zem&iacute; ČR. Přejeme V&aacute;m hodně &scaron;těst&iacute; při slosov&aacute;n&iacute;!</strong></span></span></p>\n\n<p>&nbsp;</p>\n","1","0","0"),
("1642","1","11","7","content","Text k modulu GALÉRIA","_menu_3_text_1","","1","0","0"),
("1643","1","11","8","content","Text k modulu FORMULÁR","_menu_4_text_1","","1","0","0"),
("1644","1","11","9","content","Text k modulu O REGIÓNE","_menu_5_text_1","<p><strong>Salzburg - Jevi&scaron;tě světa</strong></p>\n\n<p>Jako rodi&scaron;tě a působi&scaron;tě Wolfganga Amadea Mozarta a jako ději&scaron;tě Salzbursk&eacute;ho festivalu je Salzburg světově proslul&yacute;. Pod&iacute;v&aacute;te-li se bl&iacute;že, objev&iacute;te dokonalou harmonii př&iacute;rody a architektury zasazen&eacute; v n&aacute;dhern&eacute;m panoramatu okoln&iacute;ch hor a jezer.</p>\n\n<p>Proch&aacute;zka barokn&iacute;m městem na břehu řeky Salzach, kter&eacute; je na seznamu světov&eacute;ho dědictv&iacute; UNESCO, na n&aacute;v&scaron;těvn&iacute;ka d&yacute;chne histori&iacute; a z&aacute;roveň připrav&iacute; překvapivě modern&iacute; pohledy.</p>\n\n<p>Z&aacute;mek Mirabell a okoln&iacute; zahrada nab&iacute;zej&iacute; ohromuj&iacute;c&iacute; pohlednicov&yacute; v&yacute;hled na symbol Salzburgu, mohutnou pevnost Hohensalzburg z 11. stolet&iacute;, trůn&iacute;c&iacute; majest&aacute;tně nad Muzeem moderny na M&ouml;nchsbergu. Srdcem Star&eacute;ho města je středověk&aacute; Getreidegasse, kde se narodil nejslavněj&scaron;&iacute; syn Salzburgu, W.A. Mozart, dnes patř&iacute; k nejkr&aacute;sněj&scaron;&iacute;m a nejnav&scaron;těvovaněj&scaron;&iacute;m n&aacute;kupn&iacute;m ulic&iacute;m světa.</p>\n","1","0","0"),
("1645","1","11","9","content","Ďalší text k modulu O REGIÓNE","_menu_5_text_2","<p>&nbsp;</p>\n\n<p>Lid&eacute; se zde r&aacute;di setk&aacute;vaj&iacute; v tradičn&iacute;ch kav&aacute;rn&aacute;ch, u &bdquo;Melange&ldquo; (k&aacute;va s na&scaron;lehan&yacute;m ml&eacute;kem) nebo &bdquo;Gro&szlig;er Brauner&ldquo; (dvojit&eacute; espresso) v kav&aacute;rně Tomaselli, nejstar&scaron;&iacute; kav&aacute;rně Rakouska, nebo hned naproti v kav&aacute;rně F&uuml;rst, kde můžete ochutnat origin&aacute;ln&iacute; Mozartovy koule, kter&eacute; zde dodnes ručně vyr&aacute;b&iacute; pravnuk jejich vyn&aacute;lezce. Ty jsou ostatně ide&aacute;ln&iacute;m d&aacute;rkem z cest, protože ty prav&eacute;, origin&aacute;ln&iacute; dostanete jen v Salzburgu. Večer si pak můžete vychutnat v nejstar&scaron;&iacute;m restaurantu ve středn&iacute; Evropě, v Kl&aacute;&scaron;tern&iacute;m sklepě Sv. Petra, a nejl&eacute;pe při Mozartovsk&eacute; večeři s nejkr&aacute;sněj&scaron;&iacute;mi &aacute;riemi z Mozartov&yacute;ch oper a pokrmy dle origin&aacute;ln&iacute;ch receptů z Mozartovy doby. Kdo to m&aacute; raději trochu moderněj&scaron;&iacute;, určitě by neměl vynechat Red Bull Hangar 7. Hang&aacute;r č. 7, původně pl&aacute;novan&yacute; pro um&iacute;stěn&iacute; sb&iacute;rky historick&yacute;ch letadel a z&aacute;vodn&iacute;ch automobilů Formule 1, se stal synonymem avantgardn&iacute; architektury, modern&iacute;ho uměn&iacute; a &scaron;pičkov&eacute; gastronomie.</p>\n\n<p>V&iacute;ce o Salzburgu: <a href=\"http://www.salzburg.info/cs\"><strong>www.salzburg.info/cs</strong></a></p>\n\n<p>&nbsp;</p>\n","1","0","0"),
("1646","1","11","10","content","Text k modulu MAPA","_menu_6_text_1","<p>Mapa regionu</p>\n","1","0","0"),
("1647","1","11","2","content","Text k modulu UBYTOVANIE 1","_menu_7_text_1","<p><strong>amiamo - Familotel Zell am See</strong></p>\n\n<p>Jako prvn&iacute; boutique hotel pro rodiny&nbsp;s dětmi jsme stanovili standardy pro&nbsp;v&yacute;jimečn&eacute; z&aacute;žitky z dovolen&eacute;: mal&yacute;,&nbsp;vybran&yacute; a individu&aacute;ln&iacute;, vyznamenan&yacute;&nbsp;nejvy&scaron;&scaron;&iacute; pečet&iacute; jakosti Q III. Luxusn&iacute;&nbsp;penzion Amiamo v kombinaci s&nbsp;kartou Zell am See-Kaprun zaručuje&nbsp;odpočinkovou, ale i vzru&scaron;uj&iacute;c&iacute;&nbsp;dovolenou pro celou rodinu. S v&iacute;ce&nbsp;než 20-ti letou zku&scaron;enost&iacute; nab&iacute;z&iacute;me&nbsp;<br />\nhl&iacute;d&aacute;n&iacute; dět&iacute; v vnitřn&iacute; sekci o plo&scaron;e&nbsp;500 m&sup2; s velk&yacute;m množstv&iacute;m aktivit.&nbsp;</p>\n\n<p>NOVINKA:&nbsp;Sekce Wellness o plo&scaron;e 300 m&sup2;&nbsp;disponuje 3 baz&eacute;ny, Babynariem&nbsp;a kompletně zrekonstruovanou&nbsp;sekc&iacute; saun&nbsp;s relaxačn&iacute; m&iacute;stnost&iacute;.&nbsp;</p>\n\n<p>Na jezeře Zeller&nbsp;See&nbsp;V&aacute;s&nbsp;oček&aacute;v&aacute;&nbsp;hotelov&aacute; pl&aacute;ž s bohatou nab&iacute;dkou!</p>\n","1","0","0"),
("1648","1","11","12","content","Input Meno","form_base_name","Jméno","1","0","0"),
("1649","1","11","12","content","Input Priezvisko","form_base_surname","Příjmení","1","0","0"),
("1650","1","11","12","content","Input PSČ","form_base_psc","PSČ","1","0","0"),
("1651","1","11","12","content","Input Mesto","form_base_city","Město","1","0","0"),
("1652","1","11","12","content","Input Email","form_base_email","Email","1","0","0"),
("1653","1","11","12","content","Input Doklad","form_extend_v1_doklad","Doklad o Vašem nákupu - unikátní číslo účtenky: ","1","0","0"),
("1654","1","11","12","content","Input Otázka + odpovede","form_extend_v3_otazka","Salcburský festival je bezesporu jedním z největších hudebních festivalů všech dob, který výrazně přispěl k rozvoji hudební kultury na celém světě. Tipněte si kolik návštěvníků vidělo letošní Salcburský festival?","1","0","0"),
("1655","1","11","12","content","Odpoveď A","form_extend_v3_odpoved_a","áno","0","0","0"),
("1656","1","11","12","content","Odpoveď B","form_extend_v3_odpoved_b","neviem","0","0","0"),
("1657","1","11","12","content","Odpoveď C","form_extend_v3_odpoved_c","možno","0","0","0"),
("1658","1","11","4","content","Názov","field_word_nazov","Názov","0","0","0"),
("1659","1","11","4","content","Adresa","field_word_adresa","Adresa","0","0","0"),
("1660","1","11","4","content","Kontakt","field_word_kontakt","Kontakt","0","0","0"),
("1661","1","11","4","content","Web","field_word_web","Web","0","0","0"),
("1662","1","11","4","content","Hláška povinné pole","field_word_err","Toto pole je povinné","1","0","0"),
("1663","1","11","4","content","Registrovať","field_word_sent","Registrovat","1","0","0"),
("1664","1","11","4","content","Predchádzajúca (fotka)","field_word_previous","Predchádzajúca","1","0","0"),
("1665","1","11","4","content","Ďalšia (fotka)","field_word_next","Ďalšia","1","0","0"),
("1666","1","11","4","content","Súhlasím s newslettrom","field_word_suhlas_news","Mám zájem o zasílání aktuálních novinek o Salzburgu.","1","0","0"),
("1667","1","11","4","content","Súhlasím s podmienkami súťaže","field_word_suhlas_podm","Souhlasím s pravidly soutěže (PRAVIDLA ZDE).","1","0","0"),
("1668","1","11","1","content","Kľúčové slová pre Google","keywords","soutěž Corial Salzburg","1","0","0"),
("1669","1","11","1","content","Popis pre Google","description","This competition has a first ID","1","0","0"),
("1670","1","11","4","content","Súhlasím s podmienkami súťaže","field_word_dakujeme","Děkujeme za Vaši účast a přejeme Vám hodně štěstí v soutěži!","1","0","0"),
("1671","1","11","12","image","Podmienky súťaže (PDF)","form_file_podmienky","252","1","0","0"),
("1672","1","11","12","image","Newsletter (PDF)","form_file_newsletter","68","0","0","0"),
("1673","1","11","4","content","Hláška možnosti novej registrácie","field_word_nova_registracia","Pokud máte další doklad o nákupu můžete přejít k nové registraci ZDE.","1","0","0"),
("1674","1","11","13","content","Počet znakov vygenerovaného hashu","_email_conf_char","8","1","0","0"),
("1675","1","11","13","content","Hláška, súťažiacemu ktorá mu príde na email po registracii.","_email_conf_sent_text","Děkujeme za registraci do soutěže a přejeme Vám hodně štěstí při slosování! ","1","0","0"),
("1676","1","11","12","content","Telefónne číslo","form_base_tel_c","Telefon","0","0","0"),
("1677","1","11","4","content","Hláška za hviezdičkou o povinných poliach","field_word_povinne_polia","","1","0","0"),
("1678","1","11","2","image","Fotka loga k modulu UBYTOVANIE","_menu_7_image_2_1","59","0","0","0"),
("1679","1","11","16","content","Názov hotelu 2","info_hotel_name_2","Sporthotel Falkenstein","0","0","0"),
("1680","1","11","16","content","Adresa Hotela 2","info_hotel_addr_2","Nikolaus-Gassner-Str. 79   <br/>   A - 5710 Kaprun","1","0","0"),
("1681","1","11","16","content","Telefón do hotela 2","info_hotel_tel_c_2","+43 6547 7122","1","0","0"),
("1682","1","11","16","content","Email hotelu 2","info_hotel_email_2","sporthotel@falkenstein.at","1","0","0"),
("1683","1","11","16","content","Text k modulu UBYTOVANIE 2","_menu_7_text_2","<p><strong>Das Falkenstein</strong></p>\n\n<p>Tady v Kaprunu a hotelu Falkenstein lze objevit spoustu vzru&scaron;uj&iacute;c&iacute;ch možnost&iacute; a z&aacute;bavy&nbsp;pro rodiny a děti. Každ&yacute; den může b&yacute;t spojen s nov&yacute;mi z&aacute;žitky a dojmy, ať už jde&nbsp;o zvl&aacute;&scaron;tn&iacute; rodinn&eacute; turistick&eacute; v&yacute;lety, čvacht&aacute;n&iacute; a klouz&aacute;n&iacute; v Tauern SPA Kaprun, v&yacute;let&nbsp;k alpsk&eacute; horsk&eacute; bobov&eacute; dr&aacute;ze &quot;Maisfiltzer&quot;, o n&aacute;v&scaron;těvu volnočasov&eacute;ho nebo n&aacute;rodn&iacute;ho&nbsp;parku nebo o mnoh&aacute; dal&scaron;&iacute; dobrodružstv&iacute; - z&aacute;bavě se nekladou ž&aacute;dn&eacute; hranice.</p>\n\n<p>V hotelu Falkenstein&nbsp;se nach&aacute;z&iacute; kromě&nbsp;prostorn&eacute;ho&nbsp;dětsk&eacute;ho hři&scaron;tě&nbsp;a dětsk&eacute; herny tak&eacute;&nbsp;velk&yacute; baz&eacute;n a najdete&nbsp;zde i&nbsp;chutnou&nbsp;Pinzgauerskou&nbsp;kuchyni s pestr&yacute;mi&nbsp;dětsk&yacute;mi menu&nbsp;- n&aacute;&scaron; maskot Falki&nbsp;se na v&aacute;s tě&scaron;&iacute;!</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n","1","0","0");
INSERT INTO dnt_microsites_composer VALUES
("1684","1","11","17","content","Text k modulu UBYTOVANIE 3","_menu_7_text_3","<p><strong>Dovolen&aacute; v Zell am See je dovolenou s požitkem - v hotelu Tirolerhof!</strong></p>\n\n<p>Jezero, hory, ledovec a stylov&yacute;, rodinn&yacute; 4-hvězdičkov&yacute; hotel superior v Zell am See &ndash; to je ide&aacute;ln&iacute; kombinace pro va&scaron;i dovolenou v Zell am See, v l&eacute;tě i v zimě. Budete m&iacute;t v&yacute;hled na jezero Zeller See, hory Schmittenh&ouml;he a Kitzsteinhorn se v&scaron;emi rozmanit&yacute;mi sportovn&iacute;mi a rekreačn&iacute;mi možnostmi a budete h&yacute;čk&aacute;ni v b&aacute;ječn&eacute;m a mimoř&aacute;dn&eacute;m hotelu kulin&aacute;řsk&yacute;mi specialitami nejvy&scaron;&scaron;&iacute; kvality. Nebo str&aacute;v&iacute;te dovolenou spojenou s golfem v Salcburku, kde budete m&iacute;t v&yacute;hled na n&aacute;dhern&eacute; hory a jezero oblasti Zell am See-Kaprun. Nebo si užijete ve dvou n&aacute;dhern&eacute; apartm&aacute;ny v r&aacute;mci romantick&eacute; dovolen&eacute;. Nebo si poř&aacute;dně odpočinete s wellness a l&aacute;zeňskou nab&iacute;dkou vy&scaron;&scaron;&iacute; tř&iacute;dy a načerp&aacute;te novou energii. Takto může vypadat va&scaron;e dal&scaron;&iacute; rekreačn&iacute; dovolen&aacute; v hotelu Tirolerhof Zell am See - v srdci Salcburku. Wellness hotel, čtyřhvězdičkov&yacute; hotel superior, hotel pro hosty s pejsky, relaxačn&iacute; hotel - v&scaron;echny tyto př&iacute;vlastky si hotel Tirolerhof plně zaslouž&iacute;.</p>\n\n<p>&nbsp;</p>\n\n<p><strong>Prožijte nezapomenutelnou dovolenou v hotelu Tirolerhof!</strong></p>\n","0","0","0"),
("1685","1","11","17","content","Email hotelu 3","info_hotel_email_3","welcome@tirolerhof.co.at","0","0","0"),
("1686","1","11","17","content","Telefón do hotela 3","info_hotel_tel_c_3","+43(0)6542/772-0","0","0","0"),
("1687","1","11","17","content","Adresa Hotela 3","info_hotel_addr_3","Auerspergstrasse 5   <br/>   A - 5700 Zell am See","0","0","0"),
("1688","1","11","17","content","Názov hotelu 3","info_hotel_name_3","Hotel Tirolerhof ****S","0","0","0"),
("1689","1","11","16","image","Fotka loga k modulu UBYTOVANIE 2","_menu_7_image_1_2","66","1","0","0"),
("1690","1","11","16","image","Fotka k modulu UBYTOVANIE 2","_menu_7_image_2_2","65","0","0","0"),
("1691","1","11","17","image","Fotka loga k modulu UBYTOVANIE 3","_menu_7_image_1_3","51","0","0","0"),
("1692","1","11","17","image","Fotka k modulu UBYTOVANIE 3","_menu_7_image_2_3","56","0","0","0"),
("1693","1","11","2","content","Url adresa hotela 1","link_hotel_1","https://www.amiamo.at","1","0","0"),
("1694","1","11","16","content","Url adresa hotela 2","link_hotel_2","http://www.falkenstein.at","1","0","0"),
("1695","1","11","17","content","Url adresa hotela 3","link_hotel_3","http://www.tirolerhof.co.at/","0","0","0"),
("1696","1","11","9","image","Druhá fotka modulu pre modul GALÉRIA","_menu_5_gallery_1","27","1","0","0"),
("1697","1","11","5","image","Fotka v hlavnom slideri 2","_menu_1_image_2","247","1","0","0"),
("1698","1","11","4","content","Po ukončení registrácie","field_word_koniec_registracie","<p>SOUTĚŽ BYLA UKONČENA DNE 1.11. 2016.</p>\n\n<p>Slosov&aacute;n&iacute; proběhlo dne 04.11.2016, ze v&scaron;ech přijat&yacute;ch platn&yacute;ch registrac&iacute; byli vybr&aacute;ni&nbsp; 3 v&yacute;herci dle pravidel soutěže. Dovolenkov&yacute; pobyt v Salzburgu pro 2 osoby na 4&nbsp;dny (3&nbsp;noci), ubytov&aacute;n&iacute; ve 3-4*hotelu se sn&iacute;dan&iacute;, včetně 3-denn&iacute; slevov&eacute; karty &bdquo;SalzburgCard&ldquo; z&iacute;sk&aacute;vaj&iacute; :</p>\n\n<p><strong>Tereza Seidlov&aacute;, 54701 N&aacute;chod, ČR</strong></p>\n\n<p><strong>Marie Herzogov&aacute;, 53701 Chrudim, ČR</strong></p>\n\n<p><strong>Gabriela Zpěv&aacute;kov&aacute;, 78313 &Scaron;těp&aacute;nov, ČR</strong></p>\n\n<p>V&yacute;herci budou kontaktov&aacute;ni provozovatelem soutěže ohledně převzet&iacute; pobytov&yacute;ch voucherů v nejbliž&scaron;&iacute;ch dnech. Pobytov&eacute; vouchery jsou platn&eacute; 31.10.2017, pobyty nezahrnujou dopravu.</p>\n\n<p><u><strong>V&scaron;em děkujeme za &uacute;čast a v&yacute;hercům srdečne blahopřejeme!</strong></u></p>\n\n<p><span style=\"font-size:12px\">Spr&aacute;vnost a platnost slosov&aacute;n&iacute; potvrzuj&iacute; provozovatel&eacute; soutěže:<br />\nOrganiz&aacute;tor: TSG Tourismus Salzburg GmbH Auerspergstra&szlig;e 6, 5020 Salzburg, Rakousko<br />\na spoluorganiz&aacute;tor soutěže: GOLDTIME a.s., U Libeňsk&eacute;ho pivovaru 10, Praha 8, Česk&aacute; republika</span></p>\n","1","0","0"),
("1699","1","11","11","content","Názov modulu pre modul O PARTNEROVI","_menu_name_8","Corial","1","4","0"),
("1700","1","11","15","content","Email partnera","info_partner_email","info@corial.cz","1","0","0"),
("1701","1","11","15","content","Adresa partnera","info_partner_addr","U Libeňského pivovaru 10 <br/> 180 00 Praha 8 - ČR","1","0","0"),
("1702","1","11","15","content","Názov partnera","info_partner_name","GOLDTIME a.s.","1","0","0"),
("1703","1","11","15","content","Telefónne číslo na partnera","info_partner_tel_c","+420 284 810 957","1","0","0"),
("1704","1","11","11","content","Text k modulu O PARTNEROVI 1","_menu_8_text_1","<p>&nbsp;</p>\n\n<p><span style=\"font-size:14px\"><span style=\"color:rgb(105, 105, 105)\">Hodin&aacute;řsk&eacute; a klenotnick&eacute; obchody CORIAL najdete na v&iacute;ce než patn&aacute;cti m&iacute;stech v Česk&eacute; republice a na Slovensku. Nab&iacute;z&iacute;me hodinky a &scaron;perky renomovan&yacute;ch značek, doplňky k nim a tak&eacute; luxusn&iacute; d&aacute;rkov&eacute; zbož&iacute;. Specializujeme se na značky Citizen, Telstar, Police, Lovelinks a Pandora, jejichž nab&iacute;dka je u n&aacute;s exkluzivně největ&scaron;&iacute;. V nab&iacute;dce najdete i jin&eacute; zvučn&eacute; hodin&aacute;řsk&eacute; značky, např. Edox, Fr&eacute;derique Constant, Emporio Armani, Invicta a mnoho dal&scaron;&iacute;ch. Person&aacute;l V&aacute;m ochotně porad&iacute; nebo pomůže s v&yacute;běrem zbož&iacute; podle Va&scaron;ich představ. </span></span></p>\n\n<p><span style=\"font-size:14px\"><span style=\"color:rgb(105, 105, 105)\"><a href=\"http://www.corial.cz/cs/prodejny/\" target=\"_blank\">Přejeme V&aacute;m př&iacute;jemn&eacute; nakupov&aacute;n&iacute;!</a></span></span></p>\n","1","0","0"),
("1705","1","11","1","content","Jazyková mutácia pre Facebook","_language","cs_CZ","1","0","0"),
("1706","1","11","12","image","Newsletter 2 (PDF)","form_file_newsletter_2","68","0","0","0"),
("1707","1","11","4","content","Súhlasím s newslettrom 2","field_word_suhlas_news_2","News 2","0","0","0"),
("1708","1","11","18","content","Email hotelu 4","info_hotel_email_4","welcome@tirolerhof.co.at","0","0","0"),
("1709","1","11","18","content","Telefón do hotela 4","info_hotel_tel_c_4","+43(0)6542/772-0","0","0","0"),
("1710","1","11","18","content","Adresa Hotela 4","info_hotel_addr_4","Auerspergstrasse 5   <br/>   A - 5700 Zell am See","1","0","0"),
("1711","1","11","18","content","Názov hotelu 4","info_hotel_name_4","Hotel Tirolerhof ****S","0","0","0"),
("1712","1","11","18","image","Fotka loga k modulu UBYTOVANIE 4","_menu_7_image_1_4","","0","0","0"),
("1713","1","11","18","image","Fotka k modulu UBYTOVANIE 4","_menu_7_image_2_4","","1","0","0"),
("1714","1","11","18","content","Url adresa hotela 4","link_hotel_4","http://www.tirolerhof.co.at/","0","0","0"),
("1715","1","11","18","content","Text k modulu UBYTOVANIE 4","_menu_7_text_4","","0","0","0"),
("1716","1","11","11","image","Fotka k modulu O PARTNEROVI","_menu_8_image_1","245","1","0","0"),
("1717","1","12","1","content","Template","layout","dnt_first","1","0","0"),
("1718","1","12","15","content","Link partnera","link_partner","http://www.fairtoys.nl","1","0","0"),
("1719","1","12","3","content","Link regionu","link_region","http://nl.harzinfo.de ","1","0","0"),
("1720","1","12","1","content","Zobraziť na URL adrese","real_address","http://www.vyhrat.com/","1","0","0"),
("1721","1","12","1","content","Facebook","social_fb","https://www.facebook.com/FairToys/","1","0","0"),
("1722","1","12","1","content","Twitter","social_twitter","https://twitter.com/fairtoys/","1","0","0"),
("1723","1","12","1","content","Instagram","social_linked_in","https://twitter.com/HarzPR","1","0","0"),
("1724","1","12","1","content","Mapa ","map_location","https://www.google.de/maps/place/Harzer+Tourismusverband+e.+V./@51.8529373,10.5337228,10z/data=!4m5!3m4!1s0x47a5409be938672d:0xf8ca7f65291f78e4!8m2!3d51.9054817!4d10.4261875","1","0","0"),
("1725","1","12","1","image","Favicon","favicon","57","1","0","0"),
("1726","1","12","1","content","Model farby R","_r","120","1","0","0"),
("1727","1","12","1","content","Model farby G","_g","25","1","0","0"),
("1728","1","12","1","content","Model farby B","_b","45","1","0","0"),
("1729","1","12","1","content","Font","_font","roboto","1","0","0"),
("1730","1","12","2","content","Názov hotelu 1","info_hotel_name_1","Familotel - amiamo","0","0","0"),
("1731","1","12","2","content","Adresa Hotela 1","info_hotel_addr_1","Salzachtal Bundesstrasse 20   <br/>   A - 5700 Zell am See","1","0","0"),
("1732","1","12","2","content","Telefón do hotela 1","info_hotel_tel_c_1","+43 6542 55355","1","0","0"),
("1733","1","12","2","content","Email hotelu 1","info_hotel_email_1","hotel@amiamo.at","1","0","0"),
("1734","1","12","3","content","Názov regiónu","info_region_name","Harzer Tourismusverband e.V.","1","0","0"),
("1735","1","12","3","content","Adresa regiónu","info_region_addr","Marktstraße 45  <br/> 38640 Goslar - D","1","0","0"),
("1736","1","12","3","content","Telefónne číslo regiónu","info_region_tel_c","+49 (0) 5321 34040","1","0","0"),
("1737","1","12","3","content","Email regiónu","info_region_email","info@harzinfo.de","1","0","0"),
("1738","1","12","1","content","Youtube video","youtube_video","cZOal4diqrI","1","0","0"),
("1739","1","12","15","image","Logo partnera","partner_logo","265","1","0","0"),
("1740","1","12","3","image","Logo regiónu","region_logo","266","1","0","0"),
("1741","1","12","5","image","Fotka v hlavnom slideri 1","_menu_1_image_1","264","1","0","0"),
("1742","1","12","7","image","Fotka modulu pre modul GALÉRIA","_menu_3_image_1","267","1","0","0"),
("1743","1","12","7","image","Druhá fotka modulu pre modul GALÉRIA","_menu_3_image_2","268","1","0","0"),
("1744","1","12","2","image","Fotka k modulu UBYTOVANIE","_menu_7_image_1_1","63","1","0","0"),
("1745","1","12","5","content","Názov modulu pre modul INFO","_menu_name_1","Intro","1","1","0"),
("1746","1","12","6","content","Názov modulu pre modul O SÚŤAŽI","_menu_name_2","O soutěži","0","0","0"),
("1747","1","12","7","content","Názov modulu pre modul GALÉRIU","_menu_name_3","Galérie","0","0","0"),
("1748","1","12","8","content","Názov modulu pre modul FORMULÁRU","_menu_name_4","Deelname Formulier","1","2","0"),
("1749","1","12","9","content","Názov modulu pre modul O REGIONE","_menu_name_5","De Harz","1","3","0"),
("1750","1","12","10","content","Názov modulu pre modul MAPA","_menu_name_6","Mapa","0","0","0"),
("1751","1","12","11","content","Názov modulu pre modul UBYTOVANIE","_menu_name_7","Hotel","0","0","0"),
("1752","1","12","5","content","Text k modulu INFO","_menu_1_text_1","<p><span style=\"color:#FFFFFF\"><span style=\"font-size:24px\"><strong>Win een geweldige vakantie voor het hele gezin in de Harz</strong></span></span></p>\n","1","0","0"),
("1753","1","12","6","content","Text k modulu O SÚŤAŽI","_menu_2_text_1","<h3><strong>Vul het deelnameformulier correct in, beantwoord de vragen juist en je maakt kans om een geweldige vakantie in het gezin voor 2 volwassenen en 2 kinderen van 4 nachten in een 3* Hotel te winnen!&nbsp;</strong></h3>\n\n<h3>Het prijzenspel loopt&nbsp;van 15-09-2016 tot 15-10-2016.</h3>\n","1","0","0"),
("1754","1","12","7","content","Text k modulu GALÉRIA","_menu_3_text_1","","1","0","0"),
("1755","1","12","8","content","Text k modulu FORMULÁR","_menu_4_text_1","","1","0","0"),
("1756","1","12","9","content","Text k modulu O REGIÓNE","_menu_5_text_1","<p><span style=\"font-size:16px\"><strong>Magische Bergen -&nbsp;Vakantie met kinderen in adembenemende natuur&nbsp;</strong></span></p>\n\n<p><strong>Pure Pret</strong></p>\n\n<p>Rein in de Harz - de dagelijkse sleur wordt buiten gelaten. Hier regeren heksen en kabouters die uit vrijetijd magische ervaringen toveren. Families gaan gezamelijk op zoektocht naar tovenaars en berggeesten, ontdekken mystieke plaatsen in de diepe Harzer bossen of begeven zich met de Nationaal Park-Ranger op een avontuurlijke speurtocht in de wildernis van de bergen. De Harz biedt ultiem vakantieplezier: Actie tijdens monsterrijden op een scooter of in Downhillpark, het beklimmen van hoge touwenparcours of plezier in de sneeuw.</p>\n\n<p><strong>Pure Natuur&nbsp;</strong></p>\n\n<p>Al uit de verte is het Harzgebergte, het noordelijkste middelgebergte in Duitsland te zien. De magie van de bergen is duidelijk herkenbaar: ruige granieten kliffen en hoge dennen, klaterende beekjes en de heide bedekt met de vlagen van nevel. Wandelen in de Harz is ideaal en ook mountainbikers vinden hier een paradijs. Verschillende bewegwijzerde wandelroutes en mountainbike-parcours zijn een goede reden om een vakantie in de Harz te plannen.</p>\n","1","0","0"),
("1757","1","12","9","content","Ďalší text k modulu O REGIÓNE","_menu_5_text_2","<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n\n<p>Daarbij kunt u ook het hoogste punt in de Harz, de legendarische Brocken met 1141 meter bereiken. Niet alleen in de zomer, maar ook in de winter is een vakantie in de Harz veelbelovend. Een wit winterlandschap voor lange winterwandelingen, langlaufen op de rond 500 km lange loipes en snelle afdalingen.</p>\n\n<p><strong>Pure Cultuur</strong></p>\n\n<p>&lsquo;Meesterwerken van menselijke creativiteit&rsquo;,&lsquo;uniekheid&rsquo;, &lsquo;authenticiteit&rsquo; en &lsquo;universele waarde&rsquo; kenmerken de culturele bezienswaardigheden opgenomen in de lijst van het UNESCO Werelderfgoed. In de Harz zijn drie UNESCO Werelderfgoederen te vinden: het ensemble &lsquo;Bezoekersmijn Rammelsberg, de binnenstad van Goslar en het watermanagement-systeem Oberharzer Wasserwirtschaft&rsquo; de &lsquo;Stiftskerk, het kasteel en de historische binnenstad van Quedlinburg&rsquo; en &lsquo;de Luthergedenkplaatsen in Eisleben&rsquo;. Ze illustreren de romantische stadjes, mysterieuze mijnen, spirituele plaatsen en legendarische bergen.</p>\n\n<p><strong><a href=\"http://nl.harzinfo.de\">nl.harzinfo.de</a></strong></p>\n","1","0","0"),
("1758","1","12","10","content","Text k modulu MAPA","_menu_6_text_1","<p>Mapa regionu</p>\n","1","0","0"),
("1759","1","12","2","content","Text k modulu UBYTOVANIE 1","_menu_7_text_1","<p><strong>amiamo - Familotel Zell am See</strong></p>\n\n<p>Jako prvn&iacute; boutique hotel pro rodiny&nbsp;s dětmi jsme stanovili standardy pro&nbsp;v&yacute;jimečn&eacute; z&aacute;žitky z dovolen&eacute;: mal&yacute;,&nbsp;vybran&yacute; a individu&aacute;ln&iacute;, vyznamenan&yacute;&nbsp;nejvy&scaron;&scaron;&iacute; pečet&iacute; jakosti Q III. Luxusn&iacute;&nbsp;penzion Amiamo v kombinaci s&nbsp;kartou Zell am See-Kaprun zaručuje&nbsp;odpočinkovou, ale i vzru&scaron;uj&iacute;c&iacute;&nbsp;dovolenou pro celou rodinu. S v&iacute;ce&nbsp;než 20-ti letou zku&scaron;enost&iacute; nab&iacute;z&iacute;me&nbsp;<br />\nhl&iacute;d&aacute;n&iacute; dět&iacute; v vnitřn&iacute; sekci o plo&scaron;e&nbsp;500 m&sup2; s velk&yacute;m množstv&iacute;m aktivit.&nbsp;</p>\n\n<p>NOVINKA:&nbsp;Sekce Wellness o plo&scaron;e 300 m&sup2;&nbsp;disponuje 3 baz&eacute;ny, Babynariem&nbsp;a kompletně zrekonstruovanou&nbsp;sekc&iacute; saun&nbsp;s relaxačn&iacute; m&iacute;stnost&iacute;.&nbsp;</p>\n\n<p>Na jezeře Zeller&nbsp;See&nbsp;V&aacute;s&nbsp;oček&aacute;v&aacute;&nbsp;hotelov&aacute; pl&aacute;ž s bohatou nab&iacute;dkou!</p>\n","1","0","0"),
("1760","1","12","12","content","Input Meno","form_base_name","Voornaam","1","0","0"),
("1761","1","12","12","content","Input Priezvisko","form_base_surname","Achternaam","1","0","0"),
("1762","1","12","12","content","Input PSČ","form_base_psc","Postcode","1","0","0"),
("1763","1","12","12","content","Input Mesto","form_base_city","Stad","1","0","0"),
("1764","1","12","12","content","Input Email","form_base_email","E-mailadres","1","0","0"),
("1765","1","12","12","content","Input Doklad","form_extend_v1_doklad","Prijzenspel vraag","0","0","0"),
("1766","1","12","12","content","Input Otázka + odpovede","form_extend_v3_otazka","Hoeveel meter heeft Brocken, de hoogste berg in het noorden van Duitsland, het centrale middelpunt van het Harz National Park ?","1","0","0"),
("1767","1","12","12","content","Odpoveď A","form_extend_v3_odpoved_a","1.011 meter","1","0","0"),
("1768","1","12","12","content","Odpoveď B","form_extend_v3_odpoved_b","1.041 meter","1","0","0"),
("1769","1","12","12","content","Odpoveď C","form_extend_v3_odpoved_c","1.141 meter","1","0","0"),
("1770","1","12","4","content","Názov","field_word_nazov","Názov","0","0","0"),
("1771","1","12","4","content","Adresa","field_word_adresa","Adresa","0","0","0"),
("1772","1","12","4","content","Kontakt","field_word_kontakt","Kontakt","0","0","0"),
("1773","1","12","4","content","Web","field_word_web","Web","0","0","0"),
("1774","1","12","4","content","Hláška povinné pole","field_word_err","Verplicht","1","0","0"),
("1775","1","12","4","content","Registrovať","field_word_sent","deelnemen","1","0","0"),
("1776","1","12","4","content","Predchádzajúca (fotka)","field_word_previous","voorgaand","1","0","0"),
("1777","1","12","4","content","Ďalšia (fotka)","field_word_next","volgende","1","0","0"),
("1778","1","12","4","content","Súhlasím s newslettrom","field_word_suhlas_news","Ja, ik ga akkoord met het ontvangen van de nieuwsbrief van De Harz en stel mijn gegevens beschikbaar voor extra marketingactiviteiten.","1","0","0"),
("1779","1","12","4","content","Súhlasím s podmienkami súťaže","field_word_suhlas_podm","Ja, ik ga akkoord met de Algemene Voorwaarden. (Voorwaarden voor deelname hier!).","1","0","0"),
("1780","1","12","1","content","Kľúčové slová pre Google","keywords","Gewinnspiel Harz FairToys","1","0","0"),
("1781","1","12","1","content","Popis pre Google","description","This competition has a first ID","1","0","0"),
("1782","1","12","4","content","Súhlasím s podmienkami súťaže","field_word_dakujeme","Dank je wel met succes hebben ingeschreven voor de wedstrijd. Wij wensen u veel succes!","1","0","0"),
("1783","1","12","12","image","Podmienky súťaže (PDF)","form_file_podmienky","270","1","0","0");
INSERT INTO dnt_microsites_composer VALUES
("1784","1","12","12","image","Newsletter (PDF)","form_file_newsletter","68","0","0","0"),
("1785","1","12","4","content","Hláška možnosti novej registrácie","field_word_nova_registracia","Nodig je vrienden nu!","1","0","0"),
("1786","1","12","13","content","Počet znakov vygenerovaného hashu","_email_conf_char","8","1","0","0"),
("1787","1","12","13","content","Hláška, súťažiacemu ktorá mu príde na email po registracii.","_email_conf_sent_text","Dank je wel met succes hebben ingeschreven voor de wedstrijd. Wij wensen u veel succes!","1","0","0"),
("1788","1","12","12","content","Telefónne číslo","form_base_tel_c","Telefonní číslo","0","0","0"),
("1789","1","12","4","content","Hláška za hviezdičkou o povinných poliach","field_word_povinne_polia","","1","0","0"),
("1790","1","12","2","image","Fotka loga k modulu UBYTOVANIE","_menu_7_image_2_1","59","0","0","0"),
("1791","1","12","16","content","Názov hotelu 2","info_hotel_name_2","Sporthotel Falkenstein","0","0","0"),
("1792","1","12","16","content","Adresa Hotela 2","info_hotel_addr_2","Nikolaus-Gassner-Str. 79   <br/>   A - 5710 Kaprun","1","0","0"),
("1793","1","12","16","content","Telefón do hotela 2","info_hotel_tel_c_2","+43 6547 7122","1","0","0"),
("1794","1","12","16","content","Email hotelu 2","info_hotel_email_2","sporthotel@falkenstein.at","1","0","0"),
("1795","1","12","16","content","Text k modulu UBYTOVANIE 2","_menu_7_text_2","<p><strong>Das Falkenstein</strong></p>\n\n<p>Tady v Kaprunu a hotelu Falkenstein lze objevit spoustu vzru&scaron;uj&iacute;c&iacute;ch možnost&iacute; a z&aacute;bavy&nbsp;pro rodiny a děti. Každ&yacute; den může b&yacute;t spojen s nov&yacute;mi z&aacute;žitky a dojmy, ať už jde&nbsp;o zvl&aacute;&scaron;tn&iacute; rodinn&eacute; turistick&eacute; v&yacute;lety, čvacht&aacute;n&iacute; a klouz&aacute;n&iacute; v Tauern SPA Kaprun, v&yacute;let&nbsp;k alpsk&eacute; horsk&eacute; bobov&eacute; dr&aacute;ze &quot;Maisfiltzer&quot;, o n&aacute;v&scaron;těvu volnočasov&eacute;ho nebo n&aacute;rodn&iacute;ho&nbsp;parku nebo o mnoh&aacute; dal&scaron;&iacute; dobrodružstv&iacute; - z&aacute;bavě se nekladou ž&aacute;dn&eacute; hranice.</p>\n\n<p>V hotelu Falkenstein&nbsp;se nach&aacute;z&iacute; kromě&nbsp;prostorn&eacute;ho&nbsp;dětsk&eacute;ho hři&scaron;tě&nbsp;a dětsk&eacute; herny tak&eacute;&nbsp;velk&yacute; baz&eacute;n a najdete&nbsp;zde i&nbsp;chutnou&nbsp;Pinzgauerskou&nbsp;kuchyni s pestr&yacute;mi&nbsp;dětsk&yacute;mi menu&nbsp;- n&aacute;&scaron; maskot Falki&nbsp;se na v&aacute;s tě&scaron;&iacute;!</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n","1","0","0"),
("1796","1","12","17","content","Text k modulu UBYTOVANIE 3","_menu_7_text_3","<p><strong>Dovolen&aacute; v Zell am See je dovolenou s požitkem - v hotelu Tirolerhof!</strong></p>\n\n<p>Jezero, hory, ledovec a stylov&yacute;, rodinn&yacute; 4-hvězdičkov&yacute; hotel superior v Zell am See &ndash; to je ide&aacute;ln&iacute; kombinace pro va&scaron;i dovolenou v Zell am See, v l&eacute;tě i v zimě. Budete m&iacute;t v&yacute;hled na jezero Zeller See, hory Schmittenh&ouml;he a Kitzsteinhorn se v&scaron;emi rozmanit&yacute;mi sportovn&iacute;mi a rekreačn&iacute;mi možnostmi a budete h&yacute;čk&aacute;ni v b&aacute;ječn&eacute;m a mimoř&aacute;dn&eacute;m hotelu kulin&aacute;řsk&yacute;mi specialitami nejvy&scaron;&scaron;&iacute; kvality. Nebo str&aacute;v&iacute;te dovolenou spojenou s golfem v Salcburku, kde budete m&iacute;t v&yacute;hled na n&aacute;dhern&eacute; hory a jezero oblasti Zell am See-Kaprun. Nebo si užijete ve dvou n&aacute;dhern&eacute; apartm&aacute;ny v r&aacute;mci romantick&eacute; dovolen&eacute;. Nebo si poř&aacute;dně odpočinete s wellness a l&aacute;zeňskou nab&iacute;dkou vy&scaron;&scaron;&iacute; tř&iacute;dy a načerp&aacute;te novou energii. Takto může vypadat va&scaron;e dal&scaron;&iacute; rekreačn&iacute; dovolen&aacute; v hotelu Tirolerhof Zell am See - v srdci Salcburku. Wellness hotel, čtyřhvězdičkov&yacute; hotel superior, hotel pro hosty s pejsky, relaxačn&iacute; hotel - v&scaron;echny tyto př&iacute;vlastky si hotel Tirolerhof plně zaslouž&iacute;.</p>\n\n<p>&nbsp;</p>\n\n<p><strong>Prožijte nezapomenutelnou dovolenou v hotelu Tirolerhof!</strong></p>\n","0","0","0"),
("1797","1","12","17","content","Email hotelu 3","info_hotel_email_3","welcome@tirolerhof.co.at","0","0","0"),
("1798","1","12","17","content","Telefón do hotela 3","info_hotel_tel_c_3","+43(0)6542/772-0","0","0","0"),
("1799","1","12","17","content","Adresa Hotela 3","info_hotel_addr_3","Auerspergstrasse 5   <br/>   A - 5700 Zell am See","0","0","0"),
("1800","1","12","17","content","Názov hotelu 3","info_hotel_name_3","Hotel Tirolerhof ****S","0","0","0"),
("1801","1","12","16","image","Fotka loga k modulu UBYTOVANIE 2","_menu_7_image_1_2","66","1","0","0"),
("1802","1","12","16","image","Fotka k modulu UBYTOVANIE 2","_menu_7_image_2_2","65","0","0","0"),
("1803","1","12","17","image","Fotka loga k modulu UBYTOVANIE 3","_menu_7_image_1_3","51","0","0","0"),
("1804","1","12","17","image","Fotka k modulu UBYTOVANIE 3","_menu_7_image_2_3","56","0","0","0"),
("1805","1","12","2","content","Url adresa hotela 1","link_hotel_1","https://www.amiamo.at","1","0","0"),
("1806","1","12","16","content","Url adresa hotela 2","link_hotel_2","http://www.falkenstein.at","1","0","0"),
("1807","1","12","17","content","Url adresa hotela 3","link_hotel_3","http://www.tirolerhof.co.at/","0","0","0"),
("1808","1","12","9","image","Druhá fotka modulu pre modul GALÉRIA","_menu_5_gallery_1","28","1","0","0"),
("1809","1","12","5","image","Fotka v hlavnom slideri 2","_menu_1_image_2","76","0","0","0"),
("1810","1","12","4","content","Po ukončení registrácie","field_word_koniec_registracie","<p>Das GEWINNSPIEL wurde bereits BEENDET!​</p>\n\n<p>Wir danken Ihnen f&uuml;r die zahlreiche Beteiligung!</p>\n\n<p>Die Gewinner werden in K&uuml;rze per E-Mail benachrichtigt.</p>\n\n<p>Wir gratulieren den Gewinnern und w&uuml;nschen ihnen einen sch&ouml;nen Aufenthalt!</p>\n","0","0","0"),
("1811","1","12","11","content","Názov modulu pre modul O PARTNEROVI","_menu_name_8","O Partnerovi","0","0","0"),
("1812","1","12","15","content","Email partnera","info_partner_email","info@fairtoys.nl","1","0","0"),
("1813","1","12","15","content","Adresa partnera","info_partner_addr","Stationsplein 32 <br/> 6953 AC Dieren - NL","1","0","0"),
("1814","1","12","15","content","Názov partnera","info_partner_name","Fair Toys","1","0","0"),
("1815","1","12","15","content","Telefónne číslo na partnera","info_partner_tel_c","0313 795 130","1","0","0"),
("1816","1","12","11","content","Text k modulu O PARTNEROVI 1","_menu_8_text_1","<p>Pompo - největ&scaron;&iacute; maloobchodn&iacute; s&iacute;ť prodejen hraček a internetov&yacute; obchod s hračkami</p>\n","0","0","0"),
("1817","1","12","1","content","Jazyková mutácia pre Facebook","_language","de_DE","1","0","0"),
("1818","1","12","12","image","Newsletter 2 (PDF)","form_file_newsletter_2","68","0","0","0"),
("1819","1","12","4","content","Súhlasím s newslettrom 2","field_word_suhlas_news_2","News 2","0","0","0"),
("1820","1","12","18","content","Email hotelu 4","info_hotel_email_4","welcome@tirolerhof.co.at","0","0","0"),
("1821","1","12","18","content","Telefón do hotela 4","info_hotel_tel_c_4","+43(0)6542/772-0","0","0","0"),
("1822","1","12","18","content","Adresa Hotela 4","info_hotel_addr_4","Auerspergstrasse 5   <br/>   A - 5700 Zell am See","1","0","0"),
("1823","1","12","18","content","Názov hotelu 4","info_hotel_name_4","Hotel Tirolerhof ****S","0","0","0"),
("1824","1","12","18","image","Fotka loga k modulu UBYTOVANIE 4","_menu_7_image_1_4","","0","0","0"),
("1825","1","12","18","image","Fotka k modulu UBYTOVANIE 4","_menu_7_image_2_4","","1","0","0"),
("1826","1","12","18","content","Url adresa hotela 4","link_hotel_4","http://www.tirolerhof.co.at/","0","0","0"),
("1827","1","12","18","content","Text k modulu UBYTOVANIE 4","_menu_7_text_4","","0","0","0"),
("1828","1","12","11","image","Fotka k modulu O PARTNEROVI","_menu_8_image_1","","0","0","0"),
("1829","1","13","1","content","Template","layout","dnt_first","1","0","0"),
("1830","1","13","15","content","Link partnera","link_partner","https://www.crosscafe.cz","1","0","0"),
("1831","1","13","3","content","Link regionu","link_region","http://www.salzburg.info/cs","1","0","0"),
("1832","1","13","1","content","Zobraziť na URL adrese","real_address","http://www.vyhrat.com/","1","0","0"),
("1833","1","13","1","content","Facebook","social_fb","https://www.facebook.com/crosscafe","1","0","0"),
("1834","1","13","1","content","Twitter","social_twitter","https://twitter.com/salzburg_info","1","0","0"),
("1835","1","13","1","content","Instagram","social_linked_in","https://www.instagram.com/crosscafeoriginal/","1","0","0"),
("1836","1","13","1","content","Mapa ","map_location","https://www.google.cz/maps/place/Salzburg,+Rakousko/@47.802904,12.9863895,12z/data=!3m1!4b1!4m5!3m4!1s0x47769adda908d4b1:0xc1e183a1412af73d!8m2!3d47.80949!4d13.05501","1","0","0"),
("1837","1","13","1","image","Favicon","favicon","57","1","0","0"),
("1838","1","13","1","content","Model farby R","_r","150","1","0","0"),
("1839","1","13","1","content","Model farby G","_g","35","1","0","0"),
("1840","1","13","1","content","Model farby B","_b","50","1","0","0"),
("1841","1","13","1","content","Font","_font","Georgia","1","0","0"),
("1842","1","13","2","content","Názov hotelu 1","info_hotel_name_1","Familotel - amiamo","0","0","0"),
("1843","1","13","2","content","Adresa Hotela 1","info_hotel_addr_1","Salzachtal Bundesstrasse 20   <br/>   A - 5700 Zell am See","1","0","0"),
("1844","1","13","2","content","Telefón do hotela 1","info_hotel_tel_c_1","+43 6542 55355","1","0","0"),
("1845","1","13","2","content","Email hotelu 1","info_hotel_email_1","hotel@amiamo.at","1","0","0"),
("1846","1","13","3","content","Názov regiónu","info_region_name","TSG Tourismus Salzburg GmbH","1","0","0"),
("1847","1","13","3","content","Adresa regiónu","info_region_addr","Auerspergstraße 6  <br/>  A-5020 Salzburg","1","0","0"),
("1848","1","13","3","content","Telefónne číslo regiónu","info_region_tel_c","+43 662 88987 0","1","0","0"),
("1849","1","13","3","content","Email regiónu","info_region_email","tourist@salzburg.info","1","0","0"),
("1850","1","13","1","content","Youtube video","youtube_video","3Jff34rxECY","1","0","0"),
("1851","1","13","15","image","Logo partnera","partner_logo","284","1","0","0"),
("1852","1","13","3","image","Logo regiónu","region_logo","276","1","0","0"),
("1853","1","13","5","image","Fotka v hlavnom slideri 1","_menu_1_image_1","278","1","0","0"),
("1854","1","13","7","image","Fotka modulu pre modul GALÉRIA","_menu_3_image_1","280","1","0","0"),
("1855","1","13","7","image","Druhá fotka modulu pre modul GALÉRIA","_menu_3_image_2","281","1","0","0"),
("1856","1","13","2","image","Fotka k modulu UBYTOVANIE","_menu_7_image_1_1","272","1","0","0"),
("1857","1","13","5","content","Názov modulu pre modul INFO","_menu_name_1","Intro","1","1","0"),
("1858","1","13","6","content","Názov modulu pre modul O SÚŤAŽI","_menu_name_2","O soutěži","0","0","0"),
("1859","1","13","7","content","Názov modulu pre modul GALÉRIU","_menu_name_3","Galérie","0","0","0"),
("1860","1","13","8","content","Názov modulu pre modul FORMULÁRU","_menu_name_4","Registrace","1","3","0"),
("1861","1","13","9","content","Názov modulu pre modul O REGIONE","_menu_name_5","Salzburg","1","2","0"),
("1862","1","13","10","content","Názov modulu pre modul MAPA","_menu_name_6","Mapa","0","0","0"),
("1863","1","13","11","content","Názov modulu pre modul UBYTOVANIE","_menu_name_7","Ubytování","0","0","0"),
("1864","1","13","5","content","Text k modulu INFO","_menu_1_text_1","<p><strong><span style=\"font-size:24px\"><span style=\"color:#FFFFFF\">Vyhrajte s CROSSCAFE jeden ze 3 v&iacute;kendů v SALZBURGU!</span></span></strong></p>\n","1","0","0"),
("1865","1","13","6","content","Text k modulu O SÚŤAŽI","_menu_2_text_1","<p><span style=\"font-size:18px\"><strong>Za V&aacute;&scaron; n&aacute;kup v CrossCafe&nbsp;se z&aacute;kaznickou kartou CrossCard můžete vyhr&aacute;t jeden ze 3 pobytů pro dva&nbsp;v Salzburgu!</strong></span></p>\n\n<p>Nakupte&nbsp;v obdob&iacute; 1.10. - 31.10.&nbsp;2016 v kav&aacute;rn&aacute;ch <a href=\"https://www.crosscafe.cz/kavarny/\" target=\"_blank\">CrossCafe</a>&nbsp;se z&aacute;kaznickou kartou CrossCard&nbsp;a&nbsp;zaregistrujete online svůj doklad o n&aacute;kupu dle podm&iacute;nek uveden&yacute;ch v pravidlech soutěže.&nbsp;Do soutěže se můžete zaregistrovat i v&iacute;cekr&aacute;t, pokud opakovaně nakoup&iacute;te v s&iacute;ti CrossCafe. Doklad z n&aacute;kupu si uschovejte pro př&iacute;pad v&yacute;hry.&nbsp;Pokud je&scaron;tě nejste členem klubu, můžete si zaž&aacute;dat o kartu CrossCard na nejbliž&scaron;&iacute; kav&aacute;rně a aktivovat ji zde: <a href=\"https://crosskonto.crosscafe.cz/login/\" target=\"_blank\">CrossKonto</a></p>\n\n<p>V&yacute;hry v soutěži:<br />\n<strong>3x pobyt pro 2 osoby na &nbsp;3 dny / 2 noci ve 3-4* hotelu, včetně sn&iacute;daně a 3-denn&iacute; slevov&eacute; karty <a href=\"http://www.salzburg.info/cs/sights/kartou_salcburku\" target=\"_blank\">SalzburgCard</a></strong></p>\n\n<p><strong>Soutěž prob&iacute;h&aacute; 1.10. - 31.10.&nbsp;2016 na &uacute;zem&iacute; ČR. Přejeme V&aacute;m hodně &scaron;těst&iacute; při slosov&aacute;n&iacute;!</strong></p>\n","1","0","0"),
("1866","1","13","7","content","Text k modulu GALÉRIA","_menu_3_text_1","<p>Krasna Galeria!</p>\n","0","0","0"),
("1867","1","13","8","content","Text k modulu FORMULÁR","_menu_4_text_1","","1","0","0"),
("1868","1","13","9","content","Text k modulu O REGIÓNE","_menu_5_text_1","<p><strong>Salzburg - Jevi&scaron;tě světa</strong></p>\n\n<p>Jako rodi&scaron;tě a působi&scaron;tě Wolfganga Amadea Mozarta a jako ději&scaron;tě Salzbursk&eacute;ho festivalu je Salzburg světově proslul&yacute;. Pod&iacute;v&aacute;te-li se bl&iacute;že, objev&iacute;te dokonalou harmonii př&iacute;rody a architektury zasazen&eacute; v n&aacute;dhern&eacute;m panoramatu okoln&iacute;ch hor a jezer.</p>\n\n<p>Proch&aacute;zka barokn&iacute;m městem na břehu řeky Salzach, kter&eacute; je na seznamu světov&eacute;ho dědictv&iacute; UNESCO, na n&aacute;v&scaron;těvn&iacute;ka d&yacute;chne histori&iacute; a z&aacute;roveň připrav&iacute; překvapivě modern&iacute; pohledy.</p>\n\n<p>Z&aacute;mek Mirabell a okoln&iacute; zahrada nab&iacute;zej&iacute; ohromuj&iacute;c&iacute; pohlednicov&yacute; v&yacute;hled na symbol Salzburgu, mohutnou pevnost Hohensalzburg z 11. stolet&iacute;, trůn&iacute;c&iacute; majest&aacute;tně nad Muzeem moderny na M&ouml;nchsbergu. Srdcem Star&eacute;ho města je středověk&aacute; Getreidegasse, kde se narodil nejslavněj&scaron;&iacute; syn Salzburgu, W.A. Mozart, dnes patř&iacute; k nejkr&aacute;sněj&scaron;&iacute;m a nejnav&scaron;těvovaněj&scaron;&iacute;m n&aacute;kupn&iacute;m ulic&iacute;m světa.</p>\n","1","0","0"),
("1869","1","13","9","content","Ďalší text k modulu O REGIÓNE","_menu_5_text_2","<p>Lid&eacute; se zde r&aacute;di setk&aacute;vaj&iacute; v tradičn&iacute;ch kav&aacute;rn&aacute;ch, u &bdquo;Melange&ldquo; (k&aacute;va s na&scaron;lehan&yacute;m ml&eacute;kem) nebo &bdquo;Gro&szlig;er Brauner&ldquo; (dvojit&eacute; espresso) v kav&aacute;rně Tomaselli, nejstar&scaron;&iacute; kav&aacute;rně Rakouska, nebo hned naproti v kav&aacute;rně F&uuml;rst, kde můžete ochutnat origin&aacute;ln&iacute; Mozartovy koule, kter&eacute; zde dodnes ručně vyr&aacute;b&iacute; pravnuk jejich vyn&aacute;lezce. Ty jsou ostatně ide&aacute;ln&iacute;m d&aacute;rkem z cest, protože ty prav&eacute;, origin&aacute;ln&iacute; dostanete jen v Salzburgu. Večer si pak můžete vychutnat v nejstar&scaron;&iacute;m restaurantu ve středn&iacute; Evropě, v Kl&aacute;&scaron;tern&iacute;m sklepě Sv. Petra, a nejl&eacute;pe při Mozartovsk&eacute; večeři s nejkr&aacute;sněj&scaron;&iacute;mi &aacute;riemi z Mozartov&yacute;ch oper a pokrmy dle origin&aacute;ln&iacute;ch receptů z Mozartovy doby. Kdo to m&aacute; raději trochu moderněj&scaron;&iacute;, určitě by neměl vynechat Red Bull Hangar 7. Hang&aacute;r č. 7, původně pl&aacute;novan&yacute; pro um&iacute;stěn&iacute; sb&iacute;rky historick&yacute;ch letadel a z&aacute;vodn&iacute;ch automobilů Formule 1, se stal synonymem avantgardn&iacute; architektury, modern&iacute;ho uměn&iacute; a &scaron;pičkov&eacute; gastronomie.</p>\n\n<p>V&iacute;ce o Salzburgu:&nbsp;<a href=\"http://www.salzburg.info/cs\" style=\"box-sizing: border-box; background-color: transparent; color: rgb(170, 55, 65); text-decoration: none; transition: all 0.35s;\" target=\"_blank\"><strong>www.salzburg.info/cs</strong></a></p>\n","1","0","0"),
("1870","1","13","10","content","Text k modulu MAPA","_menu_6_text_1","<p>Mapa regionu</p>\n","1","0","0"),
("1871","1","13","2","content","Text k modulu UBYTOVANIE 1","_menu_7_text_1","<p><strong>amiamo - Familotel Zell am See</strong></p>\n\n<p>Jako prvn&iacute; boutique hotel pro rodiny&nbsp;s dětmi jsme stanovili standardy pro&nbsp;v&yacute;jimečn&eacute; z&aacute;žitky z dovolen&eacute;: mal&yacute;,&nbsp;vybran&yacute; a individu&aacute;ln&iacute;, vyznamenan&yacute;&nbsp;nejvy&scaron;&scaron;&iacute; pečet&iacute; jakosti Q III. Luxusn&iacute;&nbsp;penzion Amiamo v kombinaci s&nbsp;kartou Zell am See-Kaprun zaručuje&nbsp;odpočinkovou, ale i vzru&scaron;uj&iacute;c&iacute;&nbsp;dovolenou pro celou rodinu. S v&iacute;ce&nbsp;než 20-ti letou zku&scaron;enost&iacute; nab&iacute;z&iacute;me&nbsp;<br />\nhl&iacute;d&aacute;n&iacute; dět&iacute; v vnitřn&iacute; sekci o plo&scaron;e&nbsp;500 m&sup2; s velk&yacute;m množstv&iacute;m aktivit.&nbsp;</p>\n\n<p>NOVINKA:&nbsp;Sekce Wellness o plo&scaron;e 300 m&sup2;&nbsp;disponuje 3 baz&eacute;ny, Babynariem&nbsp;a kompletně zrekonstruovanou&nbsp;sekc&iacute; saun&nbsp;s relaxačn&iacute; m&iacute;stnost&iacute;.&nbsp;</p>\n\n<p>Na jezeře Zeller&nbsp;See&nbsp;V&aacute;s&nbsp;oček&aacute;v&aacute;&nbsp;hotelov&aacute; pl&aacute;ž s bohatou nab&iacute;dkou!</p>\n","1","0","0"),
("1872","1","13","12","content","Input Meno","form_base_name","Jméno","1","0","0"),
("1873","1","13","12","content","Input Priezvisko","form_base_surname","Příjmení","1","0","0"),
("1874","1","13","12","content","Input PSČ","form_base_psc","PSČ","1","0","0"),
("1875","1","13","12","content","Input Mesto","form_base_city","Město","1","0","0"),
("1876","1","13","12","content","Input Email","form_base_email","Email","1","0","0"),
("1877","1","13","12","content","Input Doklad","form_extend_v1_doklad","Doklad o Vašem nákupu: (unikátní číslo účtenky)","1","0","0"),
("1878","1","13","12","content","Input Otázka + odpovede","form_extend_v3_otazka","Je toto modré?","0","0","0"),
("1879","1","13","12","content","Odpoveď A","form_extend_v3_odpoved_a","áno","0","0","0"),
("1880","1","13","12","content","Odpoveď B","form_extend_v3_odpoved_b","neviem","0","0","0"),
("1881","1","13","12","content","Odpoveď C","form_extend_v3_odpoved_c","možno","0","0","0"),
("1882","1","13","4","content","Názov","field_word_nazov","Názov","0","0","0"),
("1883","1","13","4","content","Adresa","field_word_adresa","Adresa","0","0","0");
INSERT INTO dnt_microsites_composer VALUES
("1884","1","13","4","content","Kontakt","field_word_kontakt","Kontakt","0","0","0"),
("1885","1","13","4","content","Web","field_word_web","Web","0","0","0"),
("1886","1","13","4","content","Hláška povinné pole","field_word_err","Toto pole je povinné","1","0","0"),
("1887","1","13","4","content","Registrovať","field_word_sent","Registrovat","1","0","0"),
("1888","1","13","4","content","Predchádzajúca (fotka)","field_word_previous","Predchádzajúca","1","0","0"),
("1889","1","13","4","content","Ďalšia (fotka)","field_word_next","Ďalšia","1","0","0"),
("1890","1","13","4","content","Súhlasím s newslettrom","field_word_suhlas_news","Mám zájem o zasílání aktuálních novinek o Salzburgu.","1","0","0"),
("1891","1","13","4","content","Súhlasím s podmienkami súťaže","field_word_suhlas_podm","Souhlasím s pravidly soutěže (PRAVIDLA ZDE).","1","0","0"),
("1892","1","13","1","content","Kľúčové slová pre Google","keywords","soutěž Crosscafe Salzburg","1","0","0"),
("1893","1","13","1","content","Popis pre Google","description","This competition has a first ID","1","0","0"),
("1894","1","13","4","content","Súhlasím s podmienkami súťaže","field_word_dakujeme","Děkujeme za Vaši účast a přejeme Vám hodně štěstí v soutěži!","1","0","0"),
("1895","1","13","12","image","Podmienky súťaže (PDF)","form_file_podmienky","283","1","0","0"),
("1896","1","13","12","image","Newsletter (PDF)","form_file_newsletter","68","0","0","0"),
("1897","1","13","4","content","Hláška možnosti novej registrácie","field_word_nova_registracia","Pokud máte další doklad o nákupu můžete přejít k nové registraci ZDE.","1","0","0"),
("1898","1","13","13","content","Počet znakov vygenerovaného hashu","_email_conf_char","8","1","0","0"),
("1899","1","13","13","content","Hláška, súťažiacemu ktorá mu príde na email po registracii.","_email_conf_sent_text","Děkujeme za registraci do soutěže a přejeme Vám hodně štěstí při slosování! ","1","0","0"),
("1900","1","13","12","content","Telefónne číslo","form_base_tel_c","Telefónne číslo","0","0","0"),
("1901","1","13","4","content","Hláška za hviezdičkou o povinných poliach","field_word_povinne_polia","","1","0","0"),
("1902","1","13","2","image","Fotka loga k modulu UBYTOVANIE","_menu_7_image_2_1","59","1","0","0"),
("1903","1","13","16","content","Názov hotelu 2","info_hotel_name_2","Sporthotel Falkenstein","0","0","0"),
("1904","1","13","16","content","Adresa Hotela 2","info_hotel_addr_2","Nikolaus-Gassner-Str. 79   <br/>   A - 5710 Kaprun","1","0","0"),
("1905","1","13","16","content","Telefón do hotela 2","info_hotel_tel_c_2","+43 6547 7122","1","0","0"),
("1906","1","13","16","content","Email hotelu 2","info_hotel_email_2","sporthotel@falkenstein.at","1","0","0"),
("1907","1","13","16","content","Text k modulu UBYTOVANIE 2","_menu_7_text_2","<p><strong>Das Falkenstein</strong></p>\n\n<p>Tady v Kaprunu a hotelu Falkenstein lze objevit spoustu vzru&scaron;uj&iacute;c&iacute;ch možnost&iacute; a z&aacute;bavy&nbsp;pro rodiny a děti. Každ&yacute; den může b&yacute;t spojen s nov&yacute;mi z&aacute;žitky a dojmy, ať už jde&nbsp;o zvl&aacute;&scaron;tn&iacute; rodinn&eacute; turistick&eacute; v&yacute;lety, čvacht&aacute;n&iacute; a klouz&aacute;n&iacute; v Tauern SPA Kaprun, v&yacute;let&nbsp;k alpsk&eacute; horsk&eacute; bobov&eacute; dr&aacute;ze &quot;Maisfiltzer&quot;, o n&aacute;v&scaron;těvu volnočasov&eacute;ho nebo n&aacute;rodn&iacute;ho&nbsp;parku nebo o mnoh&aacute; dal&scaron;&iacute; dobrodružstv&iacute; - z&aacute;bavě se nekladou ž&aacute;dn&eacute; hranice.</p>\n\n<p>V hotelu Falkenstein&nbsp;se nach&aacute;z&iacute; kromě&nbsp;prostorn&eacute;ho&nbsp;dětsk&eacute;ho hři&scaron;tě&nbsp;a dětsk&eacute; herny tak&eacute;&nbsp;velk&yacute; baz&eacute;n a najdete&nbsp;zde i&nbsp;chutnou&nbsp;Pinzgauerskou&nbsp;kuchyni s pestr&yacute;mi&nbsp;dětsk&yacute;mi menu&nbsp;- n&aacute;&scaron; maskot Falki&nbsp;se na v&aacute;s tě&scaron;&iacute;!</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n","1","0","0"),
("1908","1","13","17","content","Text k modulu UBYTOVANIE 3","_menu_7_text_3","<p><strong>Dovolen&aacute; v Zell am See je dovolenou s požitkem - v hotelu Tirolerhof!</strong></p>\n\n<p>Jezero, hory, ledovec a stylov&yacute;, rodinn&yacute; 4-hvězdičkov&yacute; hotel superior v Zell am See &ndash; to je ide&aacute;ln&iacute; kombinace pro va&scaron;i dovolenou v Zell am See, v l&eacute;tě i v zimě. Budete m&iacute;t v&yacute;hled na jezero Zeller See, hory Schmittenh&ouml;he a Kitzsteinhorn se v&scaron;emi rozmanit&yacute;mi sportovn&iacute;mi a rekreačn&iacute;mi možnostmi a budete h&yacute;čk&aacute;ni v b&aacute;ječn&eacute;m a mimoř&aacute;dn&eacute;m hotelu kulin&aacute;řsk&yacute;mi specialitami nejvy&scaron;&scaron;&iacute; kvality. Nebo str&aacute;v&iacute;te dovolenou spojenou s golfem v Salcburku, kde budete m&iacute;t v&yacute;hled na n&aacute;dhern&eacute; hory a jezero oblasti Zell am See-Kaprun. Nebo si užijete ve dvou n&aacute;dhern&eacute; apartm&aacute;ny v r&aacute;mci romantick&eacute; dovolen&eacute;. Nebo si poř&aacute;dně odpočinete s wellness a l&aacute;zeňskou nab&iacute;dkou vy&scaron;&scaron;&iacute; tř&iacute;dy a načerp&aacute;te novou energii. Takto může vypadat va&scaron;e dal&scaron;&iacute; rekreačn&iacute; dovolen&aacute; v hotelu Tirolerhof Zell am See - v srdci Salcburku. Wellness hotel, čtyřhvězdičkov&yacute; hotel superior, hotel pro hosty s pejsky, relaxačn&iacute; hotel - v&scaron;echny tyto př&iacute;vlastky si hotel Tirolerhof plně zaslouž&iacute;.</p>\n\n<p>&nbsp;</p>\n\n<p><strong>Prožijte nezapomenutelnou dovolenou v hotelu Tirolerhof!</strong></p>\n","0","0","0"),
("1909","1","13","17","content","Email hotelu 3","info_hotel_email_3","welcome@tirolerhof.co.at","0","0","0"),
("1910","1","13","17","content","Telefón do hotela 3","info_hotel_tel_c_3","+43(0)6542/772-0","0","0","0"),
("1911","1","13","17","content","Adresa Hotela 3","info_hotel_addr_3","Auerspergstrasse 5   <br/>   A - 5700 Zell am See","0","0","0"),
("1912","1","13","17","content","Názov hotelu 3","info_hotel_name_3","Hotel Tirolerhof ****S","0","0","0"),
("1913","1","13","16","image","Fotka loga k modulu UBYTOVANIE 2","_menu_7_image_1_2","66","1","0","0"),
("1914","1","13","16","image","Fotka k modulu UBYTOVANIE 2","_menu_7_image_2_2","65","0","0","0"),
("1915","1","13","17","image","Fotka loga k modulu UBYTOVANIE 3","_menu_7_image_1_3","51","0","0","0"),
("1916","1","13","17","image","Fotka k modulu UBYTOVANIE 3","_menu_7_image_2_3","56","0","0","0"),
("1917","1","13","2","content","Url adresa hotela 1","link_hotel_1","https://www.amiamo.at","1","0","0"),
("1918","1","13","16","content","Url adresa hotela 2","link_hotel_2","http://www.falkenstein.at","1","0","0"),
("1919","1","13","17","content","Url adresa hotela 3","link_hotel_3","http://www.tirolerhof.co.at/","0","0","0"),
("1920","1","13","9","image","Druhá fotka modulu pre modul GALÉRIA","_menu_5_gallery_1","30","1","0","0"),
("1921","1","13","5","image","Fotka v hlavnom slideri 2","_menu_1_image_2","279","1","0","0"),
("1922","1","13","4","content","Po ukončení registrácie","field_word_koniec_registracie","<p>SOUTĚŽ BYLA UKONČENA DNE 1.11. 2016.</p>\n\n<p>Slosov&aacute;n&iacute; proběhlo dne 04.11.2016, ze v&scaron;ech přijat&yacute;ch platn&yacute;ch registrac&iacute; byli vybr&aacute;ni&nbsp; 3 v&yacute;herci dle pravidel soutěže. Dovolenkov&yacute; pobyt v Salzburgu pro 2 osoby na 3 dny (2 noci), ubytov&aacute;n&iacute; ve 3-4*hotelu se sn&iacute;dan&iacute;, včetně 3-denn&iacute; slevov&eacute; karty &bdquo;SalzburgCard&ldquo; z&iacute;sk&aacute;vaj&iacute; :</p>\n\n<p><strong>Anežka Nov&aacute;kov&aacute;,&nbsp; 289 32 Jikev, ČR</strong></p>\n\n<p><strong>Lucie Finkov&aacute;, 19014 Praha, ČR</strong></p>\n\n<p><strong>Nela Storkov&aacute;,&nbsp; 31200 Plzeň, ČR</strong></p>\n\n<p>V&yacute;herci budou kontaktov&aacute;ni provozovatelem soutěže ohledně převzet&iacute; pobytov&yacute;ch voucherů v nejbliž&scaron;&iacute;ch dnech. Pobytov&eacute; vouchery jsou platn&eacute; 31.10.2017, pobyty nezahrnujou dopravu.</p>\n\n<p><u><strong>V&scaron;em děkujeme za &uacute;čast a v&yacute;hercům srdečne blahopřejeme!</strong></u></p>\n\n<p>&nbsp;</p>\n\n<p><span style=\"font-size:12px\">Spr&aacute;vnost a platnost slosov&aacute;n&iacute; potvrzuj&iacute; provozovatel&eacute; soutěže:&nbsp;</span></p>\n\n<p><span style=\"font-size:12px\">Organiz&aacute;tor: TSG Tourismus Salzburg GmbH Auerspergstra&szlig;e 6, 5020 Salzburg, Rakousko<br />\na spoluorganiz&aacute;tor soutěže: CrossCafe original s.r.o., Ledeck&aacute; 2207/19, 323 00 Plzeň, Česk&aacute; republika</span></p>\n\n<p>&nbsp;</p>\n","1","0","0"),
("1923","1","13","11","content","Názov modulu pre modul O PARTNEROVI","_menu_name_8","CrossCafe","1","4","0"),
("1924","1","13","15","content","Email partnera","info_partner_email","crosscafe@crosscafe.cz","1","0","0"),
("1925","1","13","15","content","Adresa partnera","info_partner_addr","Ledecká 2207/19 <br/> 323 00, Plzeň, ČR","1","0","0"),
("1926","1","13","15","content","Názov partnera","info_partner_name","CrossCafe original s.r.o.","1","0","0"),
("1927","1","13","15","content","Telefónne číslo na partnera","info_partner_tel_c","","0","0","0"),
("1928","1","13","11","content","Text k modulu O PARTNEROVI 1","_menu_8_text_1","<p>&bdquo;Pro lep&scaron;&iacute; den&hellip;&ldquo;</p>\n\n<p><a href=\"https://www.crosscafe.cz/\">CrossCafe</a> je česk&aacute; s&iacute;ť kav&aacute;ren původem z Plzně. Chcete se odměnit? Najdete n&aacute;s na dobře dostupn&yacute;ch m&iacute;stech. Stač&iacute; zaskočit do sv&eacute; nejbliž&scaron;&iacute; kav&aacute;rny a vychutnat si pohodl&iacute;, př&iacute;jemnou atmosf&eacute;ru a voňavou k&aacute;vu. Prostě jako doma...</p>\n\n<p>Jste u n&aacute;s pečen&iacute; vařen&iacute;? Pak se v&aacute;m vyplat&iacute; poř&iacute;dit si na&scaron;i věrnostn&iacute; kartu <a href=\"https://www.crosscafe.cz/crosscard/\" target=\"_blank\">CrossCard</a>.&nbsp;Nejen že slouž&iacute; jako elektronick&aacute; peněženka, ale s každ&yacute;m n&aacute;kupem se v&aacute;m na ni nač&iacute;taj&iacute; body, kter&eacute; můžete využ&iacute;t ve formě slevy na dal&scaron;&iacute; n&aacute;kup.&nbsp;Každ&yacute; držitel CrossCard může nav&iacute;c využ&iacute;vat zaj&iacute;mav&yacute;ch slev u na&scaron;ich partnerů.</p>\n","1","0","0"),
("1929","1","13","1","content","Jazyková mutácia pre Facebook","_language","cs_CZ","1","0","0"),
("1930","1","13","12","image","Newsletter 2 (PDF)","form_file_newsletter_2","68","0","0","0"),
("1931","1","13","4","content","Súhlasím s newslettrom 2","field_word_suhlas_news_2","News 2","0","0","0"),
("1932","1","13","18","content","Email hotelu 4","info_hotel_email_4","welcome@tirolerhof.co.at","0","0","0"),
("1933","1","13","18","content","Telefón do hotela 4","info_hotel_tel_c_4","+43(0)6542/772-0","0","0","0"),
("1934","1","13","18","content","Adresa Hotela 4","info_hotel_addr_4","Auerspergstrasse 5   <br/>   A - 5700 Zell am See","1","0","0"),
("1935","1","13","18","content","Názov hotelu 4","info_hotel_name_4","Hotel Tirolerhof ****S","0","0","0"),
("1936","1","13","18","image","Fotka loga k modulu UBYTOVANIE 4","_menu_7_image_1_4","","0","0","0"),
("1937","1","13","18","image","Fotka k modulu UBYTOVANIE 4","_menu_7_image_2_4","","1","0","0"),
("1938","1","13","18","content","Url adresa hotela 4","link_hotel_4","http://www.tirolerhof.co.at/","0","0","0"),
("1939","1","13","18","content","Text k modulu UBYTOVANIE 4","_menu_7_text_4","","0","0","0"),
("1940","1","13","11","image","Fotka k modulu O PARTNEROVI","_menu_8_image_1","282","1","0","0"),
("1983","1","1","1","content","Google Plus","social_google_plus","","0","0","0"),
("1984","1","1","12","content","Input Otázka","form_extend_v2_otazka","Napíšte farbu vášho PC","0","0","0"),
("1985","1","1","13","content","Odoslať potvrdzovací email","sent_confirm_mail","1","1","0","0"),
("1986","1","2","1","content","Google Plus","social_google_plus","https://plus.google.com/u/0/","0","0","0"),
("1987","1","2","12","content","Input Otázka","form_extend_v2_otazka","Napíšte farbu vášho PC","0","0","0"),
("1988","1","2","13","content","Odoslať potvrdzovací email","sent_confirm_mail","1","1","0","0"),
("1989","1","3","1","content","Google Plus","social_google_plus","https://plus.google.com/u/0/","0","0","0"),
("1990","1","3","12","content","Input Otázka","form_extend_v2_otazka","Napíšte farbu vášho PC","0","0","0"),
("1991","1","3","13","content","Odoslať potvrdzovací email","sent_confirm_mail","1","1","0","0"),
("1992","1","4","1","content","Google Plus","social_google_plus","https://plus.google.com/u/0/","0","0","0"),
("1993","1","4","12","content","Input Otázka","form_extend_v2_otazka","Napíšte farbu vášho PC","0","0","0"),
("1994","1","4","13","content","Odoslať potvrdzovací email","sent_confirm_mail","1","1","0","0"),
("1995","1","5","1","content","Google Plus","social_google_plus","https://plus.google.com/u/0/","0","0","0"),
("1996","1","5","12","content","Input Otázka","form_extend_v2_otazka","Napíšte farbu vášho PC","0","0","0"),
("1997","1","5","13","content","Odoslať potvrdzovací email","sent_confirm_mail","1","1","0","0"),
("1998","1","6","1","content","Google Plus","social_google_plus","https://plus.google.com/u/0/","0","0","0"),
("1999","1","6","12","content","Input Otázka","form_extend_v2_otazka","Napíšte farbu vášho PC","0","0","0"),
("2000","1","6","13","content","Odoslať potvrdzovací email","sent_confirm_mail","1","1","0","0"),
("2001","1","7","1","content","Google Plus","social_google_plus","https://plus.google.com/u/0/","0","0","0"),
("2002","1","7","12","content","Input Otázka","form_extend_v2_otazka","Napíšte farbu vášho PC","0","0","0"),
("2003","1","7","13","content","Odoslať potvrdzovací email","sent_confirm_mail","1","1","0","0"),
("2004","1","8","1","content","Google Plus","social_google_plus","https://plus.google.com/u/0/","0","0","0"),
("2005","1","8","12","content","Input Otázka","form_extend_v2_otazka","Napíšte farbu vášho PC","0","0","0"),
("2006","1","8","13","content","Odoslať potvrdzovací email","sent_confirm_mail","1","1","0","0"),
("2007","1","9","1","content","Google Plus","social_google_plus","https://plus.google.com/u/0/","0","0","0"),
("2008","1","9","12","content","Input Otázka","form_extend_v2_otazka","Napíšte farbu vášho PC","0","0","0"),
("2009","1","9","13","content","Odoslať potvrdzovací email","sent_confirm_mail","1","1","0","0"),
("2010","1","10","1","content","Google Plus","social_google_plus","https://plus.google.com/u/0/","0","0","0"),
("2011","1","10","12","content","Input Otázka","form_extend_v2_otazka","Napíšte farbu vášho PC","0","0","0"),
("2012","1","10","13","content","Odoslať potvrdzovací email","sent_confirm_mail","1","1","0","0"),
("2013","1","11","1","content","Google Plus","social_google_plus","https://plus.google.com/u/0/","0","0","0"),
("2014","1","11","12","content","Input Otázka","form_extend_v2_otazka","Napíšte farbu vášho PC","0","0","0"),
("2015","1","11","13","content","Odoslať potvrdzovací email","sent_confirm_mail","1","1","0","0"),
("2016","1","12","1","content","Google Plus","social_google_plus","https://plus.google.com/u/0/","0","0","0"),
("2017","1","12","12","content","Input Otázka","form_extend_v2_otazka","Napíšte farbu vášho PC","0","0","0"),
("2018","1","12","13","content","Odoslať potvrdzovací email","sent_confirm_mail","1","1","0","0"),
("2019","1","13","1","content","Google Plus","social_google_plus","https://plus.google.com/+salzburgtourismus","1","0","0"),
("2020","1","13","12","content","Input Otázka","form_extend_v2_otazka","","0","0","0"),
("2021","1","13","13","content","Odoslať potvrdzovací email","sent_confirm_mail","1","1","0","0"),
("2137","1","1","12","content","Voliteľný parameter 1","form_base_custom_1","Toto pole je voliteľné","0","0","0"),
("2138","1","2","12","content","Voliteľný parameter 1","form_base_custom_1","Toto pole je voliteľné","0","0","0"),
("2139","1","3","12","content","Voliteľný parameter 1","form_base_custom_1","Toto pole je voliteľné","0","0","0"),
("2140","1","4","12","content","Voliteľný parameter 1","form_base_custom_1","Toto pole je voliteľné","0","0","0");
INSERT INTO dnt_microsites_composer VALUES
("2141","1","5","12","content","Voliteľný parameter 1","form_base_custom_1","Toto pole je voliteľné","0","0","0"),
("2142","1","6","12","content","Voliteľný parameter 1","form_base_custom_1","Toto pole je voliteľné","0","0","0"),
("2143","1","7","12","content","Voliteľný parameter 1","form_base_custom_1","Toto pole je voliteľné","0","0","0"),
("2144","1","8","12","content","Voliteľný parameter 1","form_base_custom_1","Toto pole je voliteľné","0","0","0"),
("2145","1","9","12","content","Voliteľný parameter 1","form_base_custom_1","Toto pole je voliteľné","0","0","0"),
("2146","1","10","12","content","Voliteľný parameter 1","form_base_custom_1","Toto pole je voliteľné","0","0","0"),
("2147","1","11","12","content","Voliteľný parameter 1","form_base_custom_1","Toto pole je voliteľné","0","0","0"),
("2148","1","12","12","content","Voliteľný parameter 1","form_base_custom_1","Toto pole je voliteľné","0","0","0"),
("2149","1","13","12","content","Voliteľný parameter 1","form_base_custom_1","Číslo Vaší karty CrossCard","0","0","0"),
("2150","1","14","1","content","Template","layout","dnt_first","1","0","0"),
("2151","1","14","15","content","Link partnera","link_partner","http://www.kilpi.cz","1","0","0"),
("2152","1","14","3","content","Link regionu","link_region","http://www.schladming-dachstein.at","1","0","0"),
("2153","1","14","1","content","Zobraziť na URL adrese","real_address","http://www.vyhrat.com/","1","0","0"),
("2154","1","14","1","content","Facebook","social_fb","https://www.facebook.com/kilpisport","1","0","0"),
("2155","1","14","1","content","Twitter","social_twitter","https://plus.google.com/112406614306736743833","0","0","0"),
("2156","1","14","1","content","Instagram","social_linked_in","https://www.instagram.com/kilpisport/","1","0","0"),
("2157","1","14","1","content","Mapa ","map_location","https://www.google.cz/maps/place/Schladming-Dachstein+Tourismusmarketing+GmbH/@47.4301562,13.5867908,12z/data=!4m8!1m2!2m1!1sSchladming-Dachstein+Tourismus!3m4!1s0x4771256a44c16259:0x22e482ea2c31ff12!8m2!3d47.396843!4d13.684136","1","0","0"),
("2158","1","14","1","image","Favicon","favicon","57","1","0","0"),
("2159","1","14","1","content","Model farby R","_r","92","1","0","0"),
("2160","1","14","1","content","Model farby G","_g","186","1","0","0"),
("2161","1","14","1","content","Model farby B","_b","236","1","0","0"),
("2162","1","14","1","content","Font","_font","Arial","1","0","0"),
("2163","1","14","2","content","Názov hotelu 1","info_hotel_name_1","Stadthotel brunner - městský hotel brunner","1","0","0"),
("2164","1","14","2","content","Adresa Hotela 1","info_hotel_addr_1","Hauptplatz 14   <br/>   A - 8970 Schladming","1","0","0"),
("2165","1","14","2","content","Telefón do hotela 1","info_hotel_tel_c_1","+43 (0) 3687 22513-0","1","0","0"),
("2166","1","14","2","content","Email hotelu 1","info_hotel_email_1","welcome@stadthotel-brunner.at","1","0","0"),
("2167","1","14","3","content","Názov regiónu","info_region_name","Schladming-Dachstein","1","0","0"),
("2168","1","14","3","content","Adresa regiónu","info_region_addr","Ramsauerstraße 756  <br/>  A-8970 Schladming","1","0","0"),
("2169","1","14","3","content","Telefónne číslo regiónu","info_region_tel_c","+43 3687 233 10","1","0","0"),
("2170","1","14","3","content","Email regiónu","info_region_email","info@schladming-dachstein.at","1","0","0"),
("2171","1","14","1","content","Youtube video","youtube_video","CcrP4dHNmxo","1","0","0"),
("2172","1","14","15","image","Logo partnera","partner_logo","111","1","0","0"),
("2173","1","14","3","image","Logo regiónu","region_logo","285","1","0","0"),
("2174","1","14","5","image","Fotka v hlavnom slideri 1","_menu_1_image_1","300","1","0","0"),
("2175","1","14","7","image","Fotka modulu pre modul GALÉRIA","_menu_3_image_1","124","0","0","0"),
("2176","1","14","7","image","Druhá fotka modulu pre modul GALÉRIA","_menu_3_image_2","121","0","0","0"),
("2177","1","14","2","image","Fotka k modulu UBYTOVANIE","_menu_7_image_1_1","289","1","0","0"),
("2178","1","14","5","content","Názov modulu pre modul INFO","_menu_name_1","Intro","1","0","0"),
("2179","1","14","6","content","Názov modulu pre modul O SÚŤAŽI","_menu_name_2","O soutěži","0","0","0"),
("2180","1","14","7","content","Názov modulu pre modul GALÉRIU","_menu_name_3","Galérie","0","0","0"),
("2181","1","14","8","content","Názov modulu pre modul FORMULÁRU","_menu_name_4","Registrace","1","3","0"),
("2182","1","14","9","content","Názov modulu pre modul O REGIONE","_menu_name_5","Schladming-Dachstein","1","2","0"),
("2183","1","14","10","content","Názov modulu pre modul MAPA","_menu_name_6","Mapa","0","0","0"),
("2184","1","14","11","content","Názov modulu pre modul UBYTOVANIE","_menu_name_7","Partnerské hotely","1","4","0"),
("2185","1","14","5","content","Text k modulu INFO","_menu_1_text_1","<p><span style=\"font-size:22px\"><strong>Nakupujte KILPI a vyhrajte jeden ze 3 lyžařsk&yacute;ch&nbsp;pobytů&nbsp;<br />\nv Schladming-Dachstein</strong></span></p>\n","1","0","0"),
("2186","1","14","6","content","Text k modulu O SÚŤAŽI","_menu_2_text_1","<h3>Za n&aacute;kup KILPI v hodnotě nad 1000 Kč v ČR / nad 40 &euro; v&nbsp;SR / v kamenn&yacute;ch prodejn&aacute;ch KILPI stores v ČR a SR, nebo na někter&eacute;m z e-shopů: <a href=\"http://www.shopkilpi.cz\" target=\"_blank\">www.shopkilpi.cz</a>&nbsp;, <a href=\"http://www.hs-sport.cz\" target=\"_blank\">www.hs-sport.cz</a> , <a href=\"http://www.envy-shop.cz\" target=\"_blank\">www.envy-shop.cz</a> , <a href=\"http://www.kilpi-shop.sk\" target=\"_blank\">www.kilpi-shop.sk</a> , <a href=\"http://www.envyeshop.com\" target=\"_blank\">www.envyeshop.com</a> , <a href=\"http://www.kilpi4you.com\" target=\"_blank\">www.kilpi4you.com</a> , teď můžete vyhr&aacute;t zimn&iacute; pobyt pro dva v Schladming-Dachstein!</h3>\n\n<p><span style=\"font-size:20px\"><strong>Soutěž prob&iacute;ha od 20.10. do 30.11.2016.&nbsp;</strong>Přejeme V&aacute;m hodně &scaron;těst&iacute; při slosov&aacute;n&iacute;!</span><br />\n<span style=\"font-size:18px\">Do soutěže se můžete zaregistrovat i v&iacute;cekr&aacute;t, pokud opakovaně nakoup&iacute;te v s&iacute;ti KILPI. Doklad z n&aacute;kupu si uschovejte pro př&iacute;pad v&yacute;hry.<br />\nV&yacute;hry v soutěži:&nbsp;<strong>3x zimn&iacute;&nbsp;dovolen&aacute; pro 2 osoby, na 4 dny / 3 noci v 3*** hotelu s polopenz&iacute;, včetně 2 skipasů,&nbsp;v&nbsp;rakousk&eacute;m regionu Schladming-Dachstein.</strong></span></p>\n","1","0","0"),
("2187","1","14","7","content","Text k modulu GALÉRIA","_menu_3_text_1","","1","0","0"),
("2188","1","14","8","content","Text k modulu FORMULÁR","_menu_4_text_1","","1","0","0"),
("2189","1","14","9","content","Text k modulu O REGIÓNE","_menu_5_text_1","<p><strong>Schladming-Dachstein - živě uprostřed děn&iacute; v Ski amad&eacute;</strong><br />\n&bull; &nbsp;&nbsp;230 km sjezdov&yacute;ch trat&iacute; v&scaron;ech obt&iacute;žnost&iacute;<br />\n&bull; &nbsp;&nbsp;98 &uacute;tuln&yacute;ch lyžařsk&yacute;ch chat<br />\n&bull; &nbsp;&nbsp;lyžařsk&aacute; houpačka mezi 4 vrcholy:<br />\n&nbsp; &nbsp; Hauser Kaibling-Planai-Hochwurzen-Reiteralm<br />\n&bull; &nbsp;&nbsp;760 km lyžařsk&eacute; z&aacute;bavy s jedn&iacute;m skipasem ve Ski amad&eacute;<br />\n&bull; &nbsp;&nbsp;1skipas Ski amad&eacute; zahrnuje: 270 modern&iacute;ch lanovek a vleků,<br />\n&nbsp;&nbsp; &nbsp;&nbsp;356 sjezdov&yacute;ch trat&iacute; a 5 lyžařsk&yacute;ch oblast&iacute;&nbsp;</p>\n\n<p>Svahy stavěn&eacute; pro mistrovstv&iacute; světa, neomezen&aacute; lyžařsk&aacute; z&aacute;bava, kulin&aacute;řsk&eacute; objevn&eacute; v&yacute;lety a osvěžuj&iacute;c&iacute; n&aacute;pady na dovolenou, to v&scaron;e zahrnuje zimn&iacute; dovolen&aacute; v Schladming-Dachsteinu, kter&yacute; se nach&aacute;z&iacute; ve středu Rakouska a je tedy snadno dosažiteln&yacute;.<br />\nA to nejlep&scaron;&iacute;?! Člověk zde na vlastn&iacute; kůži zažije největ&scaron;&iacute; lyžařsk&yacute; požitek oblasti Ski amad&eacute;.</p>\n\n<p>Dal&scaron;&iacute; informace jsou dostupn&eacute; na:&nbsp;<a href=\"http://www.schladming-dachstein.at/cs\" target=\"_blank\"><strong>www.schladming-dachstein.at</strong></a></p>\n","1","0","0"),
("2190","1","14","9","content","Ďalší text k modulu O REGIÓNE","_menu_5_text_2","<p><strong>Vrcholy na&scaron;ich lyžařsk&yacute;ch hor:</strong><br />\nVrchol hory <strong>Hauser Kaibling</strong> je se sv&yacute;mi 2015 m n.m. nejvy&scaron;&scaron;&iacute;m bodem tzv. Schladmingsk&eacute; houpačky mezi 4 horami a zdej&scaron;&iacute; modern&iacute; infrastruktura navod&iacute; pocit životn&iacute;ho stylu na &uacute;rovni. Na hoře <strong>Planai</strong>, kde se každoročně kon&aacute; legend&aacute;rn&iacute; nočn&iacute; slalom, se budete c&iacute;tit jako &scaron;ampion. Sportovn&iacute; lyžaři si mohou zař&aacute;dit na 4 čern&yacute;ch sjezdovk&aacute;ch hory<strong> Reiteralm</strong>.&nbsp;Za m&iacute;sta zvl&aacute;&scaron;tě nevhodn&aacute; pro rodiny jsou považov&aacute;na lyžařsk&aacute; střediska <strong>Ramsau am Dachstein</strong>, <strong>Stoderzinken, Fageralm</strong> a Schneeb&auml;renland (země sněhov&yacute;ch medvědů) s <strong>Riesneralm</strong> a <strong>Planneralm</strong>.</p>\n\n<p><strong>Neomezen&eacute; zimn&iacute; radov&aacute;nky v Ski amad&eacute;</strong><br />\nSki amad&eacute; m&aacute; co nab&iacute;dnout.&nbsp;S pěti lyžařsk&yacute;mi oblastmi je Ski amad&eacute; jednou z nejpestřej&scaron;&iacute;ch oblast&iacute; zimn&iacute;ch sportů v Evropě: 760 km sjezdovek, 356 skvěle upraven&yacute;ch sjezdovek a 270 komfortn&iacute;ch vleků - s jedin&yacute;m skipasem! A s na&scaron;imi speci&aacute;ln&iacute;mi nab&iacute;dkami se přitom svezete za velmi v&yacute;hodn&eacute; ceny. Objevte 4 = 3, Bed &amp; Breakfast (nocleh se sn&iacute;dan&iacute;), &quot;Learn2Ski za 3 dny&quot;, na&scaron;e senzačn&iacute; velikonočn&iacute; akce pro rodiny.</p>\n\n<p>Dal&scaron;&iacute; informace jsou dostupn&eacute; na:&nbsp;<strong><a href=\"http://www.skiamade.com/cs/zima\" target=\"_blank\">www.skiamade.com</a></strong></p>\n","1","0","0"),
("2191","1","14","10","content","Text k modulu MAPA","_menu_6_text_1","<p>Mapa regionu</p>\n","0","0","0"),
("2192","1","14","2","content","Text k modulu UBYTOVANIE 1","_menu_7_text_1","<p><strong>Stadthotel brunner - městsk&yacute; hotel</strong></p>\n\n<p>&bdquo;Můj střed v centru&ldquo;. C&iacute;tit se blaze uprostřed stylov&eacute; architektury a 500 let star&yacute;ch zd&iacute; v centru Schladmingu a nedaleko od lyžařsk&eacute;ho svahu. V př&iacute;jemn&eacute;m a bezbari&eacute;rov&eacute; ​​designov&eacute;m hotelu s 24 pokoji se tradice setk&aacute;v&aacute; s asijsk&yacute;mi vlivy. Uvolněn&iacute; v l&aacute;zn&iacute;ch nad střechami Schladmingu se saunou, &aacute;jurv&eacute;dsk&eacute; a klasick&eacute; mas&aacute;že, čajovna, lekce j&oacute;gy a meditace. Sousedn&iacute; restaurace &agrave; la carte nab&iacute;z&iacute; směs m&iacute;stn&iacute;, &aacute;jurv&eacute;dsk&eacute; a z&aacute;sadit&eacute; (lehce straviteln&eacute;) kuchyně.</p>\n","1","0","0"),
("2193","1","14","12","content","Input Meno","form_base_name","Jméno","1","0","0"),
("2194","1","14","12","content","Input Priezvisko","form_base_surname","Příjmení","1","0","0"),
("2195","1","14","12","content","Input PSČ","form_base_psc","PSČ","1","0","0"),
("2196","1","14","12","content","Input Mesto","form_base_city","Město","1","0","0"),
("2197","1","14","12","content","Input Email","form_base_email","Email","1","0","0"),
("2198","1","14","12","content","Input Doklad","form_extend_v1_doklad","Doklad o Vašem nákupu: (unikátní číslo účtenky  nebo číslo faktury z E-shopu)","1","0","0"),
("2199","1","14","12","content","Input Otázka + odpovede","form_extend_v3_otazka","Je toto modré?","0","0","0"),
("2200","1","14","12","content","Odpoveď A","form_extend_v3_odpoved_a","áno","0","0","0"),
("2201","1","14","12","content","Odpoveď B","form_extend_v3_odpoved_b","neviem","0","0","0"),
("2202","1","14","12","content","Odpoveď C","form_extend_v3_odpoved_c","možno","0","0","0"),
("2203","1","14","4","content","Názov","field_word_nazov","Názov","0","0","0"),
("2204","1","14","4","content","Adresa","field_word_adresa","Adresa","0","0","0"),
("2205","1","14","4","content","Kontakt","field_word_kontakt","Kontakt","0","0","0"),
("2206","1","14","4","content","Web","field_word_web","Web","0","0","0"),
("2207","1","14","4","content","Hláška povinné pole","field_word_err","Toto pole je povinné","1","0","0"),
("2208","1","14","4","content","Registrovať","field_word_sent","Registrovat","1","0","0"),
("2209","1","14","4","content","Predchádzajúca (fotka)","field_word_previous","Předchozí","1","0","0"),
("2210","1","14","4","content","Ďalšia (fotka)","field_word_next","Další","1","0","0"),
("2211","1","14","4","content","Súhlasím s newslettrom","field_word_suhlas_news","Mám zájem o zasílání aktuálních novinek z regionu Schladming- Dachstein.","1","0","0"),
("2212","1","14","4","content","Súhlasím s podmienkami súťaže","field_word_suhlas_podm","Souhlasím s pravidly soutěže (PRAVIDLA ZDE).","1","0","0"),
("2213","1","14","1","content","Kľúčové slová pre Google","keywords","soutěž Kilpi","1","0","0"),
("2214","1","14","1","content","Popis pre Google","description","This competition has a first ID","1","0","0"),
("2215","1","14","4","content","Súhlasím s podmienkami súťaže","field_word_dakujeme","Děkujeme za Vaši účast a přejeme Vám hodně štěstí v soutěži!","1","0","0"),
("2216","1","14","12","image","Podmienky súťaže (PDF)","form_file_podmienky","299","1","0","0"),
("2217","1","14","12","image","Newsletter (PDF)","form_file_newsletter","123","0","0","0"),
("2218","1","14","4","content","Hláška možnosti novej registrácie","field_word_nova_registracia","Pokud máte další doklad o nákupu můžete přejít k nové registraci ZDE.","1","0","0"),
("2219","1","14","13","content","Počet znakov vygenerovaného hashu","_email_conf_char","8","1","0","0"),
("2220","1","14","13","content","Hláška, súťažiacemu ktorá mu príde na email po registracii.","_email_conf_sent_text","Děkujeme za registraci do soutěže a přejeme Vám hodně štěstí při slosování! ","1","0","0"),
("2221","1","14","12","content","Telefónne číslo","form_base_tel_c","Telefonní číslo","0","0","0"),
("2222","1","14","4","content","Hláška za hviezdičkou o povinných poliach","field_word_povinne_polia","","1","0","0"),
("2223","1","14","2","image","Fotka loga k modulu UBYTOVANIE","_menu_7_image_2_1","59","0","0","0"),
("2224","1","14","16","content","Názov hotelu 2","info_hotel_name_2","TUI BLUE PULSE Schladming","1","0","0"),
("2225","1","14","16","content","Adresa Hotela 2","info_hotel_addr_2","Coburgstraße 54   <br/>   A - 8970 Schladming","1","0","0"),
("2226","1","14","16","content","Telefón do hotela 2","info_hotel_tel_c_2","+43 3687 23536","1","0","0"),
("2227","1","14","16","content","Email hotelu 2","info_hotel_email_2","info.schladming@tui-blue.com","1","0","0"),
("2228","1","14","16","content","Text k modulu UBYTOVANIE 2","_menu_7_text_2","<p><strong>TUI BLUE PULSE Schladming &ndash; </strong><strong>prvn&iacute; hotel pro dospěl&eacute; v regionu </strong><strong>Schladming-Dachstein</strong><br />\n<br />\nTUI BLUE PULSE Schladming je ide&aacute;ln&iacute;m hotelem pro aktivn&iacute; lidi na dovolen&eacute;, kteř&iacute; chtěj&iacute; str&aacute;vit svou dovolenou na hor&aacute;ch regionu Schladming-Dachstein, v zimě i&nbsp;v l&eacute;tě. Sportovn&iacute; p&aacute;ry, jednotlivci i skupiny, kteř&iacute; maj&iacute; r&aacute;di př&iacute;rodu, najdou v prvn&iacute;m hotelu pro dospěl&eacute; (15+) tohoto regionu rychl&eacute; sjezdy a nekonečn&eacute; turistick&eacute; stezky. TUI BLUE PULSE Schladming m&aacute; hotelov&yacute; př&iacute;stup ke stanici lanovky v &uacute;dol&iacute; vedouc&iacute; na m&iacute;stn&iacute;mi obl&iacute;benou horu Planai. 126 km sjezdovek a 98 lanovek ček&aacute; lyžaře a snowboardisty - od zač&aacute;tečn&iacute;ků až po pokročil&eacute;. V l&eacute;tě vytv&aacute;ř&iacute; m&iacute;stn&iacute; horsk&aacute; krajina r&aacute;j pro pě&scaron;&iacute; turistiku, cykloturistiku a extr&eacute;mn&iacute;&nbsp;sporty.</p>\n\n<p>&nbsp;</p>\n","1","0","0"),
("2229","1","14","17","content","Text k modulu UBYTOVANIE 3","_menu_7_text_3","<p><strong>Dovolen&aacute; v Zell am See je dovolenou s požitkem - v hotelu Tirolerhof!</strong></p>\n\n<p>Jezero, hory, ledovec a stylov&yacute;, rodinn&yacute; 4-hvězdičkov&yacute; hotel superior v Zell am See &ndash; to je ide&aacute;ln&iacute; kombinace pro va&scaron;i dovolenou v Zell am See, v l&eacute;tě i v zimě. Budete m&iacute;t v&yacute;hled na jezero Zeller See, hory Schmittenh&ouml;he a Kitzsteinhorn se v&scaron;emi rozmanit&yacute;mi sportovn&iacute;mi a rekreačn&iacute;mi možnostmi a budete h&yacute;čk&aacute;ni v b&aacute;ječn&eacute;m a mimoř&aacute;dn&eacute;m hotelu kulin&aacute;řsk&yacute;mi specialitami nejvy&scaron;&scaron;&iacute; kvality. Nebo str&aacute;v&iacute;te dovolenou spojenou s golfem v Salcburku, kde budete m&iacute;t v&yacute;hled na n&aacute;dhern&eacute; hory a jezero oblasti Zell am See-Kaprun. Nebo si užijete ve dvou n&aacute;dhern&eacute; apartm&aacute;ny v r&aacute;mci romantick&eacute; dovolen&eacute;. Nebo si poř&aacute;dně odpočinete s wellness a l&aacute;zeňskou nab&iacute;dkou vy&scaron;&scaron;&iacute; tř&iacute;dy a načerp&aacute;te novou energii. Takto může vypadat va&scaron;e dal&scaron;&iacute; rekreačn&iacute; dovolen&aacute; v hotelu Tirolerhof Zell am See - v srdci Salcburku. Wellness hotel, čtyřhvězdičkov&yacute; hotel superior, hotel pro hosty s pejsky, relaxačn&iacute; hotel - v&scaron;echny tyto př&iacute;vlastky si hotel Tirolerhof plně zaslouž&iacute;.</p>\n\n<p>&nbsp;</p>\n\n<p><strong>Prožijte nezapomenutelnou dovolenou v hotelu Tirolerhof!</strong></p>\n","0","0","0"),
("2230","1","14","17","content","Email hotelu 3","info_hotel_email_3","welcome@tirolerhof.co.at","0","0","0"),
("2231","1","14","17","content","Telefón do hotela 3","info_hotel_tel_c_3","+43(0)6542/772-0","0","0","0"),
("2232","1","14","17","content","Adresa Hotela 3","info_hotel_addr_3","Auerspergstrasse 5   <br/>   A - 5700 Zell am See","0","0","0"),
("2233","1","14","17","content","Názov hotelu 3","info_hotel_name_3","Hotel Tirolerhof ****S","0","0","0"),
("2234","1","14","16","image","Fotka loga k modulu UBYTOVANIE 2","_menu_7_image_1_2","66","0","0","0"),
("2235","1","14","16","image","Fotka k modulu UBYTOVANIE 2","_menu_7_image_2_2","290","1","0","0"),
("2236","1","14","17","image","Fotka loga k modulu UBYTOVANIE 3","_menu_7_image_1_3","51","0","0","0"),
("2237","1","14","17","image","Fotka k modulu UBYTOVANIE 3","_menu_7_image_2_3","56","0","0","0"),
("2238","1","14","2","content","Url adresa hotela 1","link_hotel_1","http://www.stadthotel-brunner.at","1","0","0"),
("2239","1","14","16","content","Url adresa hotela 2","link_hotel_2","https://www.tui-blue.com/hotels/tui-blue-pulse-schladming.html","1","0","0"),
("2240","1","14","17","content","Url adresa hotela 3","link_hotel_3","http://www.tirolerhof.co.at/","0","0","0");
INSERT INTO dnt_microsites_composer VALUES
("2241","1","14","9","image","Druhá fotka modulu pre modul GALÉRIA","_menu_5_gallery_1","34","1","0","0"),
("2242","1","14","5","image","Fotka v hlavnom slideri 2","_menu_1_image_2","288","1","0","0"),
("2243","1","14","4","content","Po ukončení registrácie","field_word_koniec_registracie","<p>SOUTĚŽ BYLA UKONČENA DNE 30.11. 2016</p>\n\n<p>Slosov&aacute;n&iacute; bylo provedeno dne 05.12.2016 a z platn&yacute;ch registrac&iacute; byli vybr&aacute;ni 3 v&yacute;herci, dle pravidel soutěže.&nbsp;<br />\nDovolenkov&yacute; pobyt pro 2 osoby na 4 dny /3 noci v 3*** hotelu s polopenz&iacute;, včetně 2 skipasů,<br />\nv regionu SCHLADMING-DACHSTEIN, z&iacute;sk&aacute;vaj&iacute; :</p>\n\n<p><strong>Matej Chodniček, Ostrava, ČR<br />\nJana Cibulkov&aacute;, Nov&yacute; Přerov, ČR<br />\nPetra Matoskova, Praha, ČR</strong></p>\n\n<p>V&yacute;herci budou kontaktov&aacute;ni provozovatelem soutěže ohledně převzet&iacute; pobytov&yacute;ch voucherů v nejbliž&scaron;&iacute;ch dnech.&nbsp;<br />\nPobytov&eacute; vouchery jsou platn&eacute; v zimn&iacute; sezoně 20161/17 a nezahrnuj&iacute; dopravu.</p>\n\n<p><strong>V&Scaron;EM DĚKUJEME ZA &Uacute;ČAST A V&Yacute;HERCŮM SRDEČNE BLAHOPŘEJEME!</strong></p>\n\n<p><span style=\"font-size:11px\">Spr&aacute;vnost a platnost slosov&aacute;n&iacute; potvrzuj&iacute; provozovatel&eacute; soutěže:<br />\nSchladming-Dachstein Tourism Marketing, Ramsauerstra&szlig;e 756, A-8970 Schladming, Rakousko<br />\na spoluorganiz&aacute;tor soutěže: PONATURE s.r.o., Roh&aacute;čova 188/37, 130 00 Praha 3, Česk&aacute; republika</span></p>\n","1","0","0"),
("2244","1","14","11","content","Názov modulu pre modul O PARTNEROVI","_menu_name_8","Kilpi","0","0","0"),
("2245","1","14","15","content","Email partnera","info_partner_email","eshop@kilpi.cz","1","0","0"),
("2246","1","14","15","content","Adresa partnera","info_partner_addr","U Hrůbků 251/119 <br/> 709 00 Ostrava","1","0","0"),
("2247","1","14","15","content","Názov partnera","info_partner_name","PONATURE, s. r. o.","1","0","0"),
("2248","1","14","15","content","Telefónne číslo na partnera","info_partner_tel_c","+420 777 734 330","1","0","0"),
("2249","1","14","11","content","Text k modulu O PARTNEROVI 1","_menu_8_text_1","<p>KILPI - TESTOV&Aacute;NO SEVEREM A PROVĚŘENO LIDMI</p>\n\n<p>Outdoorov&eacute; oblečen&iacute; Kilpi je testovan&eacute; severem, jeho nespoutanost&iacute;, hrdost&iacute; a nekompromisn&iacute;mi n&aacute;roky země mytick&yacute;ch hrdinů. Pokud chcete zimu doopravdy prož&iacute;t, mus&iacute;te na ni b&yacute;t připraven&iacute;. Kilpi znamen&aacute; finsky &scaron;t&iacute;t. Tam, kde si př&iacute;roda i domy svou obranu už vybudovaly, potřebujete ji i vy. Spolehněte se na oblečen&iacute; a doplňky Kilpi. Budou va&scaron;&iacute;m &scaron;t&iacute;tem, d&iacute;ky kter&eacute;mu budete v bezpeč&iacute; a ochr&aacute;něni.</p>\n\n<p>V sortimentu Kilpi najdete kompletn&iacute; v&yacute;bavu pro zimu i l&eacute;to, doplňky i maličkosti. Obl&eacute;knete se do př&iacute;rody i do města, na sportov&aacute;n&iacute; i pro okamžiky odpočinku. Vybav&iacute;me v&aacute;s &uacute;čelov&yacute;mi a designov&yacute;mi bundami, skvěle padnouc&iacute;mi kalhotami, funkčn&iacute;m pr&aacute;dlem i stylov&yacute;mi tričky. A když mrazivou zimu vystř&iacute;d&aacute; žhav&eacute; l&eacute;to, vyt&aacute;hnete k vodě na&scaron;e plavky i dal&scaron;&iacute; letn&iacute; v&yacute;bavu.</p>\n","1","0","0"),
("2250","1","14","1","content","Jazyková mutácia pre Facebook","_language","cs_CZ","1","0","0"),
("2251","1","14","12","image","Newsletter 2 (PDF)","form_file_newsletter_2","68","0","0","0"),
("2252","1","14","4","content","Súhlasím s newslettrom 2","field_word_suhlas_news_2","News 2","0","0","0"),
("2253","1","14","18","content","Email hotelu 4","info_hotel_email_4","welcome@tirolerhof.co.at","0","0","0"),
("2254","1","14","18","content","Telefón do hotela 4","info_hotel_tel_c_4","+43(0)6542/772-0","0","0","0"),
("2255","1","14","18","content","Adresa Hotela 4","info_hotel_addr_4","Auerspergstrasse 5   <br/>   A - 5700 Zell am See","1","0","0"),
("2256","1","14","18","content","Názov hotelu 4","info_hotel_name_4","Hotel Tirolerhof ****S","0","0","0"),
("2257","1","14","18","image","Fotka loga k modulu UBYTOVANIE 4","_menu_7_image_1_4","","0","0","0"),
("2258","1","14","18","image","Fotka k modulu UBYTOVANIE 4","_menu_7_image_2_4","","1","0","0"),
("2259","1","14","18","content","Url adresa hotela 4","link_hotel_4","http://www.tirolerhof.co.at/","0","0","0"),
("2260","1","14","18","content","Text k modulu UBYTOVANIE 4","_menu_7_text_4","","0","0","0"),
("2261","1","14","11","image","Fotka k modulu O PARTNEROVI","_menu_8_image_1","","0","0","0"),
("2262","1","14","1","content","Google Plus","social_google_plus","https://plus.google.com/112406614306736743833","1","0","0"),
("2263","1","14","12","content","Input Otázka","form_extend_v2_otazka","","0","0","0"),
("2264","1","14","13","content","Odoslať potvrdzovací email","sent_confirm_mail","1","1","0","0"),
("2265","1","14","12","content","Voliteľný parameter 1","form_base_custom_1","Místo Vašeho nákupu (zadejte město)","1","0","0"),
("2266","1","15","1","content","Template","layout","dnt_first","1","0","0"),
("2267","1","15","15","content","Link partnera","link_partner","http://www.intersport-voswinkel.de","1","0","0"),
("2268","1","15","3","content","Link regionu","link_region","http://www.pillerseetal.at","1","0","0"),
("2269","1","15","1","content","Zobraziť na URL adrese","real_address","http://www.vyhrat.com/","1","0","0"),
("2270","1","15","1","content","Facebook","social_fb","https://www.facebook.com/INTERSPORT.Voswinkel","1","0","0"),
("2271","1","15","1","content","Twitter","social_twitter","https://twitter.com/PillerseeTal","1","0","0"),
("2272","1","15","1","content","Instagram","social_linked_in","https://www.linkedin.com/","0","0","0"),
("2273","1","15","1","content","Mapa ","map_location","https://www.google.de/maps/place/Tourismusverband+PillerseeTal/@47.5119486,12.4894141,12z/data=!4m8!1m2!2m1!1sPillersee+Tal!3m4!1s0x477656a5e99de227:0x729cb9209dd44a8b!8m2!3d47.4767457!4d12.5443322","1","0","0"),
("2274","1","15","1","image","Favicon","favicon","57","1","0","0"),
("2275","1","15","1","content","Model farby R","_r","0","1","0","0"),
("2276","1","15","1","content","Model farby G","_g","64","1","0","0"),
("2277","1","15","1","content","Model farby B","_b","112","1","0","0"),
("2278","1","15","1","content","Font","_font","roboto","1","0","0"),
("2279","1","15","2","content","Názov hotelu 1","info_hotel_name_1","Hotel Alte Post","1","0","0"),
("2280","1","15","2","content","Adresa Hotela 1","info_hotel_addr_1","Dorfstraße 21   <br/>   AT - 6391 Fieberbrunn","1","0","0"),
("2281","1","15","2","content","Telefón do hotela 1","info_hotel_tel_c_1","+43 5354-562 57","1","0","0"),
("2282","1","15","2","content","Email hotelu 1","info_hotel_email_1","info@alte-post-fieberbrunn.at","1","0","0"),
("2283","1","15","3","content","Názov regiónu","info_region_name","Tourismusverband PillerseeTal – Kitzbüheler Alpen","1","0","0"),
("2284","1","15","3","content","Adresa regiónu","info_region_addr","Dorfplatz 1  <br/>  A - 6391 Fieberbrunn","1","0","0"),
("2285","1","15","3","content","Telefónne číslo regiónu","info_region_tel_c","+43 5354 56304","1","0","0"),
("2286","1","15","3","content","Email regiónu","info_region_email","info@pillerseetal.at","1","0","0"),
("2287","1","15","1","content","Youtube video","youtube_video","lNw0HCe5kC4","1","0","0"),
("2288","1","15","15","image","Logo partnera","partner_logo","98","1","0","0"),
("2289","1","15","3","image","Logo regiónu","region_logo","297","1","0","0"),
("2290","1","15","5","image","Fotka v hlavnom slideri 1","_menu_1_image_1","291","1","0","0"),
("2291","1","15","7","image","Fotka modulu pre modul GALÉRIA","_menu_3_image_1","96","0","0","0"),
("2292","1","15","7","image","Druhá fotka modulu pre modul GALÉRIA","_menu_3_image_2","97","0","0","0"),
("2293","1","15","2","image","Fotka k modulu UBYTOVANIE","_menu_7_image_1_1","296","1","0","0"),
("2294","1","15","5","content","Názov modulu pre modul INFO","_menu_name_1","Intro","1","0","0"),
("2295","1","15","6","content","Názov modulu pre modul O SÚŤAŽI","_menu_name_2","Gewinnspiel","1","0","0"),
("2296","1","15","7","content","Názov modulu pre modul GALÉRIU","_menu_name_3","Galérie","0","0","0"),
("2297","1","15","8","content","Názov modulu pre modul FORMULÁRU","_menu_name_4","Teilnahme","1","0","0"),
("2298","1","15","9","content","Názov modulu pre modul O REGIONE","_menu_name_5","PillerseeTal - Kitzbüheler Alpen","1","0","0"),
("2299","1","15","10","content","Názov modulu pre modul MAPA","_menu_name_6","Mapa","0","0","0"),
("2300","1","15","11","content","Názov modulu pre modul UBYTOVANIE","_menu_name_7","Teilnehmendes Hotel","1","0","0"),
("2301","1","15","5","content","Text k modulu INFO","_menu_1_text_1","<p><span style=\"color:#F0F8FF\"><span style=\"font-size:20px\"><strong>GEWINNE JETZT EINEN VON 3&nbsp;FAMILIEN-SKIURLAUBEN IM PILLERSEETAL - KITZB&Uuml;HELER ALPEN&nbsp;</strong></span></span></p>\n","1","0","0"),
("2302","1","15","6","content","Text k modulu O SÚŤAŽI","_menu_2_text_1","<p style=\"text-align:center\"><span style=\"font-size:18px\"><strong>Wir verlosen 3 Familienurlaube&nbsp;im&nbsp;PillerseeTal -&nbsp;Kitzb&uuml;heler Alpen, </strong>der schneereichsten Region Tirols!<strong>&nbsp;</strong></span><br />\n<span style=\"font-size:16px\">Einfach Teilnahmeformular ausf&uuml;llen und schon spielen Sie mit um einen&nbsp;Winterurlaub im 7. (Ski)-Himmel!<br />\nDas Gewinnspiel l&auml;uft von 01.11.2016 bis 30.11.2016.</span></p>\n\n<p style=\"text-align:center\"><span style=\"font-size:16px\">Das gibt es zu gewinnen:<br />\n<strong>3 Familien-Skiurlaube f&uuml;r 2 Erwachsene und 2 Kinder &agrave; 3 N&auml;chte im Hotel Alte Post**** inkl. Halbpension und Skip&auml;sse,&nbsp;<br />\nim PillerseeTal - Kitzb&uuml;heler Alpen.</strong></span></p>\n","1","0","0"),
("2303","1","15","7","content","Text k modulu GALÉRIA","_menu_3_text_1","","0","0","0"),
("2304","1","15","8","content","Text k modulu FORMULÁR","_menu_4_text_1","<p>Ihre Registrierung:&nbsp;</p>\n","1","0","0"),
("2305","1","15","9","content","Text k modulu O REGIÓNE","_menu_5_text_1","<p><strong>SKISPA&szlig;&sup3; IN DER SCHNEEREICHSTEN REGION TIROLS</strong></p>\n\n<p>Das <strong>PillerseeTal in den Kitzb&uuml;heler Alpen</strong> ist nicht nur die schneereichsten&nbsp;Region Tirols, sondern bietet auch eine Wintersport-Vielfalt mit gleich drei hochwertigen Skigebieten. Ob klein und famili&auml;r oder weltweite Spitzenklasse: Skispa&szlig; hoch Drei lautet die Devise im PillerseeTal.<br />\n<br />\n<strong>Gro&szlig;raumarena, H&ouml;henskigebiet und Familienskigebiet</strong><br />\nDas PillerseeTal spielt im Winter in der Champions League und setzt auf eine einzigartige Vielfalt f&uuml;r alle Zielgruppen. Neben dem Gro&szlig;raum-Skigebiet <strong>Skicircus Saalbach Hinterglemm Leogang Fieberbrunn</strong> f&uuml;r sportliche Vielfahrer bietet die Ferienregion mit der <strong>Buchensteinwand</strong> ein &uuml;berschaubares Skigebiet f&uuml;r Familien mit Kindern und Genie&szlig;er.. Eine Nummer gr&ouml;&szlig;er und wenige Kilometer entfernt pr&auml;sentiert das <strong>H&ouml;hen-Skiparadies Steinplatte Waidring</strong> im Drei-L&auml;ndereck Tirol-Salzburg-Bayern grenzenloses Ski-Vergn&uuml;gen.&nbsp;</p>\n","1","0","0"),
("2306","1","15","9","content","Ďalší text k modulu O REGIÓNE","_menu_5_text_2","<p>&nbsp;</p>\n\n<p><strong>Die schneereichste Region Tirols</strong></p>\n\n<p>Zur Vielfalt gesellt sich noch die Schneesicherheit. Das aus den f&uuml;nf Orten <strong>Fieberbrunn, Hochfilzen, St. Jakob in Haus, St. Ulrich am Pillersee und Waidring</strong> bestehende Tal bringt es im Durchschnitt der letzten 30 Jahre auf 5,16 Meter Neuschnee w&auml;hrend eines Winters und ist somit die schneereichste Region Tirols. Folgerichtig gilt es schon von jeher als &bdquo;Schneeloch&ldquo; mit Wohlf&uuml;hl-Charakter.</p>\n\n<p><strong>EVENT HIGHLIGHT: </strong>6. M&auml;rz 2017 - <a href=\"https://www.kitzbueheler-alpen.com/de/pillerseetal/winter/swatch-freeride-world-tour.html\" target=\"_blank\">Swatch Freeride World Tour Fieberbrunn Kitzb&uuml;heler Alpen&nbsp;</a></p>\n\n<p><span style=\"font-family:arial,helvetica,sans-serif\">Weitere Informationen:&nbsp;</span><a href=\"http://www.pillerseetal.at\" target=\"_blank\">www.pillerseetal.at</a> &nbsp;</p>\n","1","0","0"),
("2307","1","15","10","content","Text k modulu MAPA","_menu_6_text_1","<p>Mapa regionu</p>\n","0","0","0"),
("2308","1","15","2","content","Text k modulu UBYTOVANIE 1","_menu_7_text_1","<p><strong>Ein Winterurlaub im 7. (Ski)-Himmel!</strong></p>\n\n<p>&nbsp;</p>\n\n<p>Das familiengef&uuml;hrte <strong>Wellnesshotel Alte Post****</strong> <strong>im Herzen von Fieberbrunn</strong> ist idealer Ausganspunkt f&uuml;r aufregende Skiabenteuer in den Kitzb&uuml;heler Alpen. Danach hei&szlig;t es Erholung und Entspannung in den <strong>gem&uuml;tlichen Zimmern &amp; Suiten</strong> und im <strong>800m<sup>2</sup> Latschenkiefer SPA</strong> mit gro&szlig;z&uuml;giger Saunalandschaft, Ruhestube uvm. Absolutes Highlight ist der <strong>beheizte</strong> <strong>Panoramapool am Dach </strong>mit atemberaubenden Blick auf die majest&auml;tische Bergwelt. Hier werden m&uuml;de Skifahrerwadl&rsquo;n garantiert wieder fit! Ein vielf&auml;ltiges <strong>Massageangebot</strong> rundet einen erholsamen Wintertag harmonisch ab.</p>\n\n<p>&nbsp;</p>\n\n<p><strong>Im Hotel Alte Post**** erleben Aktivurlauber und Erholungssuchende herrliche Urlaubstage in traditionell-famili&auml;rer Atmosph&auml;re.</strong></p>\n","1","0","0"),
("2309","1","15","12","content","Input Meno","form_base_name","Vorname","1","0","0"),
("2310","1","15","12","content","Input Priezvisko","form_base_surname","Nachname","1","0","0"),
("2311","1","15","12","content","Input PSČ","form_base_psc","PLZ","1","0","0"),
("2312","1","15","12","content","Input Mesto","form_base_city","Stadt","1","0","0"),
("2313","1","15","12","content","Input Email","form_base_email","E-mail","1","0","0"),
("2314","1","15","12","content","Input Doklad","form_extend_v1_doklad","Einkaufsbeleg Nr:","0","0","0"),
("2315","1","15","12","content","Input Otázka + odpovede","form_extend_v3_otazka","Das PillerseeTal in den Kitzbüheler Alpen ist nachweislich…","1","0","0"),
("2316","1","15","12","content","Odpoveď A","form_extend_v3_odpoved_a","das weltweit größte Skigebiet.","1","0","0"),
("2317","1","15","12","content","Odpoveď B","form_extend_v3_odpoved_b","das höchstgelegene Tal.","1","0","0"),
("2318","1","15","12","content","Odpoveď C","form_extend_v3_odpoved_c","die schneereichste Region Tirols.","1","0","0"),
("2319","1","15","4","content","Názov","field_word_nazov","Názov","0","0","0"),
("2320","1","15","4","content","Adresa","field_word_adresa","Adresa","0","0","0"),
("2321","1","15","4","content","Kontakt","field_word_kontakt","Kontakt","0","0","0"),
("2322","1","15","4","content","Web","field_word_web","Web","0","0","0"),
("2323","1","15","4","content","Hláška povinné pole","field_word_err","Pflichtfelder","1","0","0"),
("2324","1","15","4","content","Registrovať","field_word_sent","Teilnehmen","1","0","0"),
("2325","1","15","4","content","Predchádzajúca (fotka)","field_word_previous","Vorheriges","1","0","0"),
("2326","1","15","4","content","Ďalšia (fotka)","field_word_next","Nächstes","1","0","0"),
("2327","1","15","4","content","Súhlasím s newslettrom","field_word_suhlas_news","Ja, ich stimme zu den Newsletter vom PillerseeTal - Kitzbüheler Alpen und dem Hotel Alte Post ****  zu erhalten und meine Daten für weitere Marketingaktivitäten zur Verfügung zu stellen.","1","0","0"),
("2328","1","15","4","content","Súhlasím s podmienkami súťaže","field_word_suhlas_podm","Ja, ich stimme den Teilnahmebedingungen zu. (Teilnahmebedingungen HIER).","1","0","0"),
("2329","1","15","1","content","Kľúčové slová pre Google","keywords","PillerseeTal","1","0","0"),
("2330","1","15","1","content","Popis pre Google","description","This competition has a first ID","1","0","0"),
("2331","1","15","4","content","Súhlasím s podmienkami súťaže","field_word_dakujeme","Danke, Sie haben sich erfolgreich für das Gewinnspiel registriert.","1","0","0"),
("2332","1","15","12","image","Podmienky súťaže (PDF)","form_file_podmienky","334","1","0","0"),
("2333","1","15","12","image","Newsletter (PDF)","form_file_newsletter","107","0","0","0"),
("2334","1","15","4","content","Hláška možnosti novej registrácie","field_word_nova_registracia","Jetzt Freunde einladen!","1","0","0"),
("2335","1","15","13","content","Počet znakov vygenerovaného hashu","_email_conf_char","8","1","0","0"),
("2336","1","15","13","content","Hláška, súťažiacemu ktorá mu príde na email po registracii.","_email_conf_sent_text","Danke, Sie haben sich erfolgreich für das Gewinnspiel registriert. Wir wünschen Ihnen viel Erfolg bei der Verlosung!","1","0","0"),
("2337","1","15","12","content","Telefónne číslo","form_base_tel_c","Tel. Nr.","1","0","0"),
("2338","1","15","4","content","Hláška za hviezdičkou o povinných poliach","field_word_povinne_polia","","1","0","0"),
("2339","1","15","2","image","Fotka loga k modulu UBYTOVANIE","_menu_7_image_2_1","295","0","0","0"),
("2340","1","15","16","content","Názov hotelu 2","info_hotel_name_2","Sporthotel Falkenstein","0","0","0");
INSERT INTO dnt_microsites_composer VALUES
("2341","1","15","16","content","Adresa Hotela 2","info_hotel_addr_2","Nikolaus-Gassner-Str. 79   <br/>   A - 5710 Kaprun","1","0","0"),
("2342","1","15","16","content","Telefón do hotela 2","info_hotel_tel_c_2","+43 6547 7122","1","0","0"),
("2343","1","15","16","content","Email hotelu 2","info_hotel_email_2","sporthotel@falkenstein.at","1","0","0"),
("2344","1","15","16","content","Text k modulu UBYTOVANIE 2","_menu_7_text_2","<p><strong>Das Falkenstein</strong></p>\n\n<p>Tady v Kaprunu a hotelu Falkenstein lze objevit spoustu vzru&scaron;uj&iacute;c&iacute;ch možnost&iacute; a z&aacute;bavy&nbsp;pro rodiny a děti. Každ&yacute; den může b&yacute;t spojen s nov&yacute;mi z&aacute;žitky a dojmy, ať už jde&nbsp;o zvl&aacute;&scaron;tn&iacute; rodinn&eacute; turistick&eacute; v&yacute;lety, čvacht&aacute;n&iacute; a klouz&aacute;n&iacute; v Tauern SPA Kaprun, v&yacute;let&nbsp;k alpsk&eacute; horsk&eacute; bobov&eacute; dr&aacute;ze &quot;Maisfiltzer&quot;, o n&aacute;v&scaron;těvu volnočasov&eacute;ho nebo n&aacute;rodn&iacute;ho&nbsp;parku nebo o mnoh&aacute; dal&scaron;&iacute; dobrodružstv&iacute; - z&aacute;bavě se nekladou ž&aacute;dn&eacute; hranice.</p>\n\n<p>V hotelu Falkenstein&nbsp;se nach&aacute;z&iacute; kromě&nbsp;prostorn&eacute;ho&nbsp;dětsk&eacute;ho hři&scaron;tě&nbsp;a dětsk&eacute; herny tak&eacute;&nbsp;velk&yacute; baz&eacute;n a najdete&nbsp;zde i&nbsp;chutnou&nbsp;Pinzgauerskou&nbsp;kuchyni s pestr&yacute;mi&nbsp;dětsk&yacute;mi menu&nbsp;- n&aacute;&scaron; maskot Falki&nbsp;se na v&aacute;s tě&scaron;&iacute;!</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n","1","0","0"),
("2345","1","15","17","content","Text k modulu UBYTOVANIE 3","_menu_7_text_3","<p><strong>Dovolen&aacute; v Zell am See je dovolenou s požitkem - v hotelu Tirolerhof!</strong></p>\n\n<p>Jezero, hory, ledovec a stylov&yacute;, rodinn&yacute; 4-hvězdičkov&yacute; hotel superior v Zell am See &ndash; to je ide&aacute;ln&iacute; kombinace pro va&scaron;i dovolenou v Zell am See, v l&eacute;tě i v zimě. Budete m&iacute;t v&yacute;hled na jezero Zeller See, hory Schmittenh&ouml;he a Kitzsteinhorn se v&scaron;emi rozmanit&yacute;mi sportovn&iacute;mi a rekreačn&iacute;mi možnostmi a budete h&yacute;čk&aacute;ni v b&aacute;ječn&eacute;m a mimoř&aacute;dn&eacute;m hotelu kulin&aacute;řsk&yacute;mi specialitami nejvy&scaron;&scaron;&iacute; kvality. Nebo str&aacute;v&iacute;te dovolenou spojenou s golfem v Salcburku, kde budete m&iacute;t v&yacute;hled na n&aacute;dhern&eacute; hory a jezero oblasti Zell am See-Kaprun. Nebo si užijete ve dvou n&aacute;dhern&eacute; apartm&aacute;ny v r&aacute;mci romantick&eacute; dovolen&eacute;. Nebo si poř&aacute;dně odpočinete s wellness a l&aacute;zeňskou nab&iacute;dkou vy&scaron;&scaron;&iacute; tř&iacute;dy a načerp&aacute;te novou energii. Takto může vypadat va&scaron;e dal&scaron;&iacute; rekreačn&iacute; dovolen&aacute; v hotelu Tirolerhof Zell am See - v srdci Salcburku. Wellness hotel, čtyřhvězdičkov&yacute; hotel superior, hotel pro hosty s pejsky, relaxačn&iacute; hotel - v&scaron;echny tyto př&iacute;vlastky si hotel Tirolerhof plně zaslouž&iacute;.</p>\n\n<p>&nbsp;</p>\n\n<p><strong>Prožijte nezapomenutelnou dovolenou v hotelu Tirolerhof!</strong></p>\n","0","0","0"),
("2346","1","15","17","content","Email hotelu 3","info_hotel_email_3","welcome@tirolerhof.co.at","0","0","0"),
("2347","1","15","17","content","Telefón do hotela 3","info_hotel_tel_c_3","+43(0)6542/772-0","0","0","0"),
("2348","1","15","17","content","Adresa Hotela 3","info_hotel_addr_3","Auerspergstrasse 5   <br/>   A - 5700 Zell am See","0","0","0"),
("2349","1","15","17","content","Názov hotelu 3","info_hotel_name_3","Hotel Tirolerhof ****S","0","0","0"),
("2350","1","15","16","image","Fotka loga k modulu UBYTOVANIE 2","_menu_7_image_1_2","66","1","0","0"),
("2351","1","15","16","image","Fotka k modulu UBYTOVANIE 2","_menu_7_image_2_2","65","0","0","0"),
("2352","1","15","17","image","Fotka loga k modulu UBYTOVANIE 3","_menu_7_image_1_3","51","0","0","0"),
("2353","1","15","17","image","Fotka k modulu UBYTOVANIE 3","_menu_7_image_2_3","56","0","0","0"),
("2354","1","15","2","content","Url adresa hotela 1","link_hotel_1","http://www.alte-post-fieberbrunn.at","1","0","0"),
("2355","1","15","16","content","Url adresa hotela 2","link_hotel_2","http://www.falkenstein.at","1","0","0"),
("2356","1","15","17","content","Url adresa hotela 3","link_hotel_3","http://www.tirolerhof.co.at/","0","0","0"),
("2357","1","15","9","image","Druhá fotka modulu pre modul GALÉRIA","_menu_5_gallery_1","32","1","0","0"),
("2358","1","15","5","image","Fotka v hlavnom slideri 2","_menu_1_image_2","292","1","0","0"),
("2359","1","15","4","content","Po ukončení registrácie","field_word_koniec_registracie","<p><span style=\"color:#FF0000\"><span style=\"font-size:22px\">Ospravedlňujeme sa, ale t&aacute;to s&uacute;ťaž už bola ukončen&aacute;.</span></span></p>\n\n<p><span style=\"font-size:18px\"><span style=\"color:#FF0000\">Gratulujeme v&yacute;hercovi</span></span></p>\n","0","0","0"),
("2360","1","15","11","content","Názov modulu pre modul O PARTNEROVI","_menu_name_8","O Partnerovi","0","0","0"),
("2361","1","15","15","content","Email partnera","info_partner_email","","0","0","0"),
("2362","1","15","15","content","Adresa partnera","info_partner_addr","","0","0","0"),
("2363","1","15","15","content","Názov partnera","info_partner_name","","0","0","0"),
("2364","1","15","15","content","Telefónne číslo na partnera","info_partner_tel_c","","0","0","0"),
("2365","1","15","11","content","Text k modulu O PARTNEROVI 1","_menu_8_text_1","","1","0","0"),
("2366","1","15","1","content","Jazyková mutácia pre Facebook","_language","de_DE","1","0","0"),
("2367","1","15","12","image","Newsletter 2 (PDF)","form_file_newsletter_2","68","0","0","0"),
("2368","1","15","4","content","Súhlasím s newslettrom 2","field_word_suhlas_news_2","News 2","1","0","0"),
("2369","1","15","18","content","Email hotelu 4","info_hotel_email_4","welcome@tirolerhof.co.at","0","0","0"),
("2370","1","15","18","content","Telefón do hotela 4","info_hotel_tel_c_4","+43(0)6542/772-0","0","0","0"),
("2371","1","15","18","content","Adresa Hotela 4","info_hotel_addr_4","Auerspergstrasse 5   <br/>   A - 5700 Zell am See","1","0","0"),
("2372","1","15","18","content","Názov hotelu 4","info_hotel_name_4","Hotel Tirolerhof ****S","0","0","0"),
("2373","1","15","18","image","Fotka loga k modulu UBYTOVANIE 4","_menu_7_image_1_4","","0","0","0"),
("2374","1","15","18","image","Fotka k modulu UBYTOVANIE 4","_menu_7_image_2_4","","1","0","0"),
("2375","1","15","18","content","Url adresa hotela 4","link_hotel_4","http://www.tirolerhof.co.at/","0","0","0"),
("2376","1","15","18","content","Text k modulu UBYTOVANIE 4","_menu_7_text_4","","0","0","0"),
("2377","1","15","11","image","Fotka k modulu O PARTNEROVI","_menu_8_image_1","","0","0","0"),
("2378","1","15","1","content","Google Plus","social_google_plus","https://plus.google.com/+PillerseeTal","1","0","0"),
("2379","1","15","12","content","Input Otázka","form_extend_v2_otazka","Napíšte farbu vášho PC","0","0","0"),
("2380","1","15","13","content","Odoslať potvrdzovací email","sent_confirm_mail","1","1","0","0"),
("2381","1","15","12","content","Voliteľný parameter 1","form_base_custom_1","Toto pole je voliteľné","0","0","0"),
("2382","1","16","1","content","Template","layout","dnt_first","1","0","0"),
("2383","1","16","15","content","Link partnera","link_partner","http://www.jlindeberg.com/","1","0","0"),
("2384","1","16","3","content","Link regionu","link_region","http://www.zellamsee-kaprun.com","1","0","0"),
("2385","1","16","1","content","Zobraziť na URL adrese","real_address","http://www.vyhrat.com/","1","0","0"),
("2386","1","16","1","content","Facebook","social_fb","https://www.facebook.com/jlindebergofficial","1","0","0"),
("2387","1","16","1","content","Twitter","social_twitter","https://twitter.com/zellkaprun","1","0","0"),
("2388","1","16","1","content","Instagram","social_linked_in","https://www.instagram.com/jlindebergofficial/","1","0","0"),
("2389","1","16","1","content","Mapa ","map_location","https://www.google.de/maps/place/5700+Zell+am+See,+Rak%C3%BAsko/@47.32368,12.7478896,12z/data=!4m5!3m4!1s0x47771d6d8c2d0ccb:0x453135a3af71ddc2!8m2!3d47.32352!4d12.79685","1","0","0"),
("2390","1","16","1","image","Favicon","favicon","57","1","0","0"),
("2391","1","16","1","content","Model farby R","_r","75","1","0","0"),
("2392","1","16","1","content","Model farby G","_g","115","1","0","0"),
("2393","1","16","1","content","Model farby B","_b","170","1","0","0"),
("2394","1","16","1","content","Font","_font","Arial","1","0","0"),
("2395","1","16","2","content","Názov hotelu 1","info_hotel_name_1","TAUERN SPA Zell am See-Kaprun","0","0","0"),
("2396","1","16","2","content","Adresa Hotela 1","info_hotel_addr_1","Tauern Spa Platz 1   <br/>   A-5710 Kaprun","1","0","0"),
("2397","1","16","2","content","Telefón do hotela 1","info_hotel_tel_c_1","+43 (0) 6547 2040-0","1","0","0"),
("2398","1","16","2","content","Email hotelu 1","info_hotel_email_1","office@tauernspakaprun.com","1","0","0"),
("2399","1","16","3","content","Názov regiónu","info_region_name","Zell am See-Kaprun Tourismus","1","0","0"),
("2400","1","16","3","content","Adresa regiónu","info_region_addr","Brucker Bundesstr. 1a  <br/>  A-5700 Zell am See","1","0","0"),
("2401","1","16","3","content","Telefónne číslo regiónu","info_region_tel_c","+43 6542 770","1","0","0"),
("2402","1","16","3","content","Email regiónu","info_region_email","welcome@zellamsee-kaprun.com","1","0","0"),
("2403","1","16","1","content","Youtube video","youtube_video","vSSOZta8fpg","1","0","0"),
("2404","1","16","15","image","Logo partnera","partner_logo","303","1","0","0"),
("2405","1","16","3","image","Logo regiónu","region_logo","302","1","0","0"),
("2406","1","16","5","image","Fotka v hlavnom slideri 1","_menu_1_image_1","301","1","0","0"),
("2407","1","16","7","image","Fotka modulu pre modul GALÉRIA","_menu_3_image_1","314","1","0","0"),
("2408","1","16","7","image","Druhá fotka modulu pre modul GALÉRIA","_menu_3_image_2","315","1","0","0"),
("2409","1","16","2","image","Fotka k modulu UBYTOVANIE","_menu_7_image_1_1","84","1","0","0"),
("2410","1","16","5","content","Názov modulu pre modul INFO","_menu_name_1","Intro","1","0","0"),
("2411","1","16","6","content","Názov modulu pre modul O SÚŤAŽI","_menu_name_2","Contest","1","0","0"),
("2412","1","16","7","content","Názov modulu pre modul GALÉRIU","_menu_name_3","Galérie","0","0","0"),
("2413","1","16","8","content","Názov modulu pre modul FORMULÁRU","_menu_name_4","Participation","1","0","0"),
("2414","1","16","9","content","Názov modulu pre modul O REGIONE","_menu_name_5","Zell am See-Kaprun","1","0","0"),
("2415","1","16","10","content","Názov modulu pre modul MAPA","_menu_name_6","Mapa","0","0","0"),
("2416","1","16","11","content","Názov modulu pre modul UBYTOVANIE","_menu_name_7","TAUERN SPA","0","0","0"),
("2417","1","16","5","content","Text k modulu INFO","_menu_1_text_1","<p><span style=\"font-size:22px\"><span style=\"color:#F0F8FF\">Win a trip to Zell am See-Kaprun for you and your friend!</span></span></p>\n","1","0","0"),
("2418","1","16","6","content","Text k modulu O SÚŤAŽI","_menu_2_text_1","<p style=\"text-align:center\"><strong><span style=\"font-size:20px\">J.Lindeberg sends you to a winter escape to Zell am See-Kaprun!<br />\nJust answer the question and type in your contact details!</span></strong></p>\n\n<p style=\"text-align:center\"><span style=\"font-size:18px\">The prize game lasts until the 20th of November 2016.</span></p>\n\n<p style=\"text-align:center\"><span style=\"font-size:20px\">You and your friend can win the following:</span><br />\n<strong><span style=\"font-size:20px\">A premium holiday for 2 &agrave; 5 nights in a 4* hotel incl. half-board and skiing passes.</span></strong></p>\n","1","0","0"),
("2419","1","16","7","content","Text k modulu GALÉRIA","_menu_3_text_1","","1","0","0"),
("2420","1","16","8","content","Text k modulu FORMULÁR","_menu_4_text_1","<p><strong>Participation</strong>:</p>\n","1","0","0"),
("2421","1","16","9","content","Text k modulu O REGIÓNE","_menu_5_text_1","<p><span style=\"font-size:16px\"><strong>&ldquo;Keep on rocking&ldquo; &ndash; a winter of superlatives in Zell am See-Kaprun</strong><br />\nBiggest party zone in the Alps | Highest-situated chairlift | New dream piste and Jukeboxx gondolas</span></p>\n\n<p><span style=\"font-size:16px\">Zell am See-Kaprun, in the heart of Austria, is one of the country&rsquo;s most diverse winter sports regions: The three ski resorts Kitzsteinhorn, Schmittenh&ouml;he and Maiskogel boast all together 66 pistes totalling 138 kilometres. State-of-the-art artificial snowmaking facilities guarantee absolute snow-reliability, the proximity to the Hohe Tauern National Park promises a spectacular nature experience.</span></p>\n","1","0","0"),
("2422","1","16","9","content","Ďalší text k modulu O REGIÓNE","_menu_5_text_2","<p>&nbsp;</p>\n\n<p><span style=\"font-size:16px\">Snow parks in all ski resorts, Austria&rsquo;s most attractive Super Pipe and the world&rsquo;s longest fun slope on the Schmittenh&ouml;he provide plenty of extra fun. Salzburg&lsquo;s only glacier ski resort at the &ldquo;Kitz&ldquo; scores with ingenious pistes from October until early summer, high-altitude cross-country ski tracks and &ldquo;Gipfelwelt 3000&ldquo;.</span></p>\n\n<p><span style=\"font-size:16px\">More information:&nbsp;<a href=\"http://www.zellamsee-kaprun.com/\">www.zellamsee-kaprun.com</a></span></p>\n","1","0","0"),
("2423","1","16","10","content","Text k modulu MAPA","_menu_6_text_1","<p>Mapa regionu</p>\n","1","0","0"),
("2424","1","16","2","content","Text k modulu UBYTOVANIE 1","_menu_7_text_1","<p><span style=\"font-size:16px\"><span style=\"font-family:arial,helvetica,sans-serif\"><strong>4*S PREMIUM Alpinresort TAUERN SPA Zell am See-Kaprun</strong></span></span></p>\n\n<p><span style=\"font-size:16px\"><span style=\"font-family:arial,helvetica,sans-serif\">Das TAUERN SPA ist ein exklusives 4-Sterne-Superior Resorthotel samt moderner SPA Wasser- &amp; Saunawelt mit Indoor- und Outdoorbereich auf rund 20.000m&sup2;. Highlight ist der au&szlig;ergew&ouml;hnliche, Hotel Panorama SPA mit gl&auml;sernem Skylinepool &amp; Panorama Saunen im 3. Stock des Hauses. Die SPA Wasserwelt beeindruckt mit vielf&auml;ltig inszenierten Aktiv- und Entspannungsbecken, einem separaten Kinderbereich sowie unterschiedlichen Ruhe- &amp; Liegebereichen. Die SPA Saunawelt umfasst 10 verschiedene Saunen &amp; Dampfb&auml;der, darunter einen Textilsaunabereich. Das Alpin Vital SPA &amp; Kosmetik bietet Body- &amp; Beautytreatments mit hochwertigen Naturprodukten der Region an. Der Fitnessbereich ist mit hochwertigen Cardio- und Kraftger&auml;ten ausgestattet und bietet einen einmaligem Ausblick auf das Bergpanorama. Ein Fitnessprogramm kombiniert t&auml;glich mit unterschiedlichen Kursen Erholung &amp; Aktivit&auml;t.</span></span></p>\n\n<p><span style=\"font-size:16px\"><span style=\"font-family:arial,helvetica,sans-serif\">5 Restaurants &amp; Bars verw&ouml;hnen mit regionalen Gen&uuml;ssen &amp; internationalen kulinarischen Verlockungen.</span></span></p>\n","1","0","0"),
("2425","1","16","12","content","Input Meno","form_base_name","First name","1","0","0"),
("2426","1","16","12","content","Input Priezvisko","form_base_surname","Sur name","1","0","0"),
("2427","1","16","12","content","Input PSČ","form_base_psc","Zip Code","1","0","0"),
("2428","1","16","12","content","Input Mesto","form_base_city","Town","1","0","0"),
("2429","1","16","12","content","Input Email","form_base_email","eMail","1","0","0"),
("2430","1","16","12","content","Input Doklad","form_extend_v1_doklad","","0","0","0"),
("2431","1","16","12","content","Input Otázka + odpovede","form_extend_v3_otazka","In Zell am See-Kaprun 100% snow guarantee is offered on the slopes! What are the names of the three skiing areas?","1","0","0"),
("2432","1","16","12","content","Odpoveď A","form_extend_v3_odpoved_a","Kitzsteinhorn, Schmittenhöhe and Saalbach","1","0","0"),
("2433","1","16","12","content","Odpoveď B","form_extend_v3_odpoved_b","Schmittenhöhe, Maiskogel and Ski Amadé","1","0","0"),
("2434","1","16","12","content","Odpoveď C","form_extend_v3_odpoved_c","Kitzsteinhorn, Schmittenhöhe and Maiskogel","1","0","0"),
("2435","1","16","4","content","Názov","field_word_nazov","Názov","0","0","0"),
("2436","1","16","4","content","Adresa","field_word_adresa","Adresa","0","0","0"),
("2437","1","16","4","content","Kontakt","field_word_kontakt","Kontakt","0","0","0"),
("2438","1","16","4","content","Web","field_word_web","Web","0","0","0"),
("2439","1","16","4","content","Hláška povinné pole","field_word_err","Required fields","1","0","0"),
("2440","1","16","4","content","Registrovať","field_word_sent","Participation","1","0","0");
INSERT INTO dnt_microsites_composer VALUES
("2441","1","16","4","content","Predchádzajúca (fotka)","field_word_previous","Previous","1","0","0"),
("2442","1","16","4","content","Ďalšia (fotka)","field_word_next","Next","1","0","0"),
("2443","1","16","4","content","Súhlasím s newslettrom","field_word_suhlas_news","Yes, I agree to receive the newsletter of Zell am See-Kaprun and J.Lindeberg to provide my data for further marketing activities.","1","0","0"),
("2444","1","16","4","content","Súhlasím s podmienkami súťaže","field_word_suhlas_podm","Yes, I agree to the Terms and Conditions. (Conditions HERE).","1","0","0"),
("2445","1","16","1","content","Kľúčové slová pre Google","keywords","Zell am See-Kaprun   J.Lindeberg","1","0","0"),
("2446","1","16","1","content","Popis pre Google","description","This competition has a first ID","1","0","0"),
("2447","1","16","4","content","Súhlasím s podmienkami súťaže","field_word_dakujeme","Yes, I agree to the Terms and Conditions. (Conditions HERE).","1","0","0"),
("2448","1","16","12","image","Podmienky súťaže (PDF)","form_file_podmienky","313","1","0","0"),
("2449","1","16","12","image","Newsletter (PDF)","form_file_newsletter","68","0","0","0"),
("2450","1","16","4","content","Hláška možnosti novej registrácie","field_word_nova_registracia","Invite friends now!","1","0","0"),
("2451","1","16","13","content","Počet znakov vygenerovaného hashu","_email_conf_char","8","1","0","0"),
("2452","1","16","13","content","Hláška, súťažiacemu ktorá mu príde na email po registracii.","_email_conf_sent_text","Danke, Sie haben sich erfolgreich für das Gewinnspiel registriert. Wir wünschen Ihnen viel Erfolg bei der Verlosung!","1","0","0"),
("2453","1","16","12","content","Telefónne číslo","form_base_tel_c","Telephone number","1","0","0"),
("2454","1","16","4","content","Hláška za hviezdičkou o povinných poliach","field_word_povinne_polia","","1","0","0"),
("2455","1","16","2","image","Fotka loga k modulu UBYTOVANIE","_menu_7_image_2_1","59","0","0","0"),
("2456","1","16","16","content","Názov hotelu 2","info_hotel_name_2","Sporthotel Falkenstein","0","0","0"),
("2457","1","16","16","content","Adresa Hotela 2","info_hotel_addr_2","Nikolaus-Gassner-Str. 79   <br/>   A - 5710 Kaprun","0","0","0"),
("2458","1","16","16","content","Telefón do hotela 2","info_hotel_tel_c_2","+43 6547 7122","0","0","0"),
("2459","1","16","16","content","Email hotelu 2","info_hotel_email_2","sporthotel@falkenstein.at","0","0","0"),
("2460","1","16","16","content","Text k modulu UBYTOVANIE 2","_menu_7_text_2","<p><strong>Das Falkenstein</strong></p>\n\n<p>Tady v Kaprunu a hotelu Falkenstein lze objevit spoustu vzru&scaron;uj&iacute;c&iacute;ch možnost&iacute; a z&aacute;bavy&nbsp;pro rodiny a děti. Každ&yacute; den může b&yacute;t spojen s nov&yacute;mi z&aacute;žitky a dojmy, ať už jde&nbsp;o zvl&aacute;&scaron;tn&iacute; rodinn&eacute; turistick&eacute; v&yacute;lety, čvacht&aacute;n&iacute; a klouz&aacute;n&iacute; v Tauern SPA Kaprun, v&yacute;let&nbsp;k alpsk&eacute; horsk&eacute; bobov&eacute; dr&aacute;ze &quot;Maisfiltzer&quot;, o n&aacute;v&scaron;těvu volnočasov&eacute;ho nebo n&aacute;rodn&iacute;ho&nbsp;parku nebo o mnoh&aacute; dal&scaron;&iacute; dobrodružstv&iacute; - z&aacute;bavě se nekladou ž&aacute;dn&eacute; hranice.</p>\n\n<p>V hotelu Falkenstein&nbsp;se nach&aacute;z&iacute; kromě&nbsp;prostorn&eacute;ho&nbsp;dětsk&eacute;ho hři&scaron;tě&nbsp;a dětsk&eacute; herny tak&eacute;&nbsp;velk&yacute; baz&eacute;n a najdete&nbsp;zde i&nbsp;chutnou&nbsp;Pinzgauerskou&nbsp;kuchyni s pestr&yacute;mi&nbsp;dětsk&yacute;mi menu&nbsp;- n&aacute;&scaron; maskot Falki&nbsp;se na v&aacute;s tě&scaron;&iacute;!</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n","0","0","0"),
("2461","1","16","17","content","Text k modulu UBYTOVANIE 3","_menu_7_text_3","<p><strong>Dovolen&aacute; v Zell am See je dovolenou s požitkem - v hotelu Tirolerhof!</strong></p>\n\n<p>Jezero, hory, ledovec a stylov&yacute;, rodinn&yacute; 4-hvězdičkov&yacute; hotel superior v Zell am See &ndash; to je ide&aacute;ln&iacute; kombinace pro va&scaron;i dovolenou v Zell am See, v l&eacute;tě i v zimě. Budete m&iacute;t v&yacute;hled na jezero Zeller See, hory Schmittenh&ouml;he a Kitzsteinhorn se v&scaron;emi rozmanit&yacute;mi sportovn&iacute;mi a rekreačn&iacute;mi možnostmi a budete h&yacute;čk&aacute;ni v b&aacute;ječn&eacute;m a mimoř&aacute;dn&eacute;m hotelu kulin&aacute;řsk&yacute;mi specialitami nejvy&scaron;&scaron;&iacute; kvality. Nebo str&aacute;v&iacute;te dovolenou spojenou s golfem v Salcburku, kde budete m&iacute;t v&yacute;hled na n&aacute;dhern&eacute; hory a jezero oblasti Zell am See-Kaprun. Nebo si užijete ve dvou n&aacute;dhern&eacute; apartm&aacute;ny v r&aacute;mci romantick&eacute; dovolen&eacute;. Nebo si poř&aacute;dně odpočinete s wellness a l&aacute;zeňskou nab&iacute;dkou vy&scaron;&scaron;&iacute; tř&iacute;dy a načerp&aacute;te novou energii. Takto může vypadat va&scaron;e dal&scaron;&iacute; rekreačn&iacute; dovolen&aacute; v hotelu Tirolerhof Zell am See - v srdci Salcburku. Wellness hotel, čtyřhvězdičkov&yacute; hotel superior, hotel pro hosty s pejsky, relaxačn&iacute; hotel - v&scaron;echny tyto př&iacute;vlastky si hotel Tirolerhof plně zaslouž&iacute;.</p>\n\n<p>&nbsp;</p>\n\n<p><strong>Prožijte nezapomenutelnou dovolenou v hotelu Tirolerhof!</strong></p>\n","0","0","0"),
("2462","1","16","17","content","Email hotelu 3","info_hotel_email_3","welcome@tirolerhof.co.at","0","0","0"),
("2463","1","16","17","content","Telefón do hotela 3","info_hotel_tel_c_3","+43(0)6542/772-0","0","0","0"),
("2464","1","16","17","content","Adresa Hotela 3","info_hotel_addr_3","Auerspergstrasse 5   <br/>   A - 5700 Zell am See","0","0","0"),
("2465","1","16","17","content","Názov hotelu 3","info_hotel_name_3","Hotel Tirolerhof ****S","0","0","0"),
("2466","1","16","16","image","Fotka loga k modulu UBYTOVANIE 2","_menu_7_image_1_2","66","0","0","0"),
("2467","1","16","16","image","Fotka k modulu UBYTOVANIE 2","_menu_7_image_2_2","65","0","0","0"),
("2468","1","16","17","image","Fotka loga k modulu UBYTOVANIE 3","_menu_7_image_1_3","51","0","0","0"),
("2469","1","16","17","image","Fotka k modulu UBYTOVANIE 3","_menu_7_image_2_3","56","0","0","0"),
("2470","1","16","2","content","Url adresa hotela 1","link_hotel_1","http://www.tauernspakaprun.com","1","0","0"),
("2471","1","16","16","content","Url adresa hotela 2","link_hotel_2","http://www.falkenstein.at","0","0","0"),
("2472","1","16","17","content","Url adresa hotela 3","link_hotel_3","http://www.tirolerhof.co.at/","0","0","0"),
("2473","1","16","9","image","Druhá fotka modulu pre modul GALÉRIA","_menu_5_gallery_1","33","1","0","0"),
("2474","1","16","5","image","Fotka v hlavnom slideri 2","_menu_1_image_2","82","0","0","0"),
("2475","1","16","4","content","Po ukončení registrácie","field_word_koniec_registracie","<p>&nbsp;</p>\n\n<p style=\"text-align:center\">&nbsp;</p>\n","0","0","0"),
("2476","1","16","11","content","Názov modulu pre modul O PARTNEROVI","_menu_name_8","","0","0","0"),
("2477","1","16","15","content","Email partnera","info_partner_email","customerservice@bestseller.com","1","0","0"),
("2478","1","16","15","content","Adresa partnera","info_partner_addr","Fredskovvej <br/> DK-7330 Brande","1","0","0"),
("2479","1","16","15","content","Názov partnera","info_partner_name","BESTSELLER A/S ","1","0","0"),
("2480","1","16","15","content","Telefónne číslo na partnera","info_partner_tel_c","+ 45 99 42 32 00","1","0","0"),
("2481","1","16","11","content","Text k modulu O PARTNEROVI 1","_menu_8_text_1","","0","0","0"),
("2482","1","16","1","content","Jazyková mutácia pre Facebook","_language","en_EN","1","0","0"),
("2483","1","16","12","image","Newsletter 2 (PDF)","form_file_newsletter_2","68","0","0","0"),
("2484","1","16","4","content","Súhlasím s newslettrom 2","field_word_suhlas_news_2","News 2","0","0","0"),
("2485","1","16","18","content","Email hotelu 4","info_hotel_email_4","welcome@tirolerhof.co.at","0","0","0"),
("2486","1","16","18","content","Telefón do hotela 4","info_hotel_tel_c_4","+43(0)6542/772-0","0","0","0"),
("2487","1","16","18","content","Adresa Hotela 4","info_hotel_addr_4","Auerspergstrasse 5   <br/>   A - 5700 Zell am See","1","0","0"),
("2488","1","16","18","content","Názov hotelu 4","info_hotel_name_4","Hotel Tirolerhof ****S","0","0","0"),
("2489","1","16","18","image","Fotka loga k modulu UBYTOVANIE 4","_menu_7_image_1_4","","0","0","0"),
("2490","1","16","18","image","Fotka k modulu UBYTOVANIE 4","_menu_7_image_2_4","","1","0","0"),
("2491","1","16","18","content","Url adresa hotela 4","link_hotel_4","http://www.tirolerhof.co.at/","0","0","0"),
("2492","1","16","18","content","Text k modulu UBYTOVANIE 4","_menu_7_text_4","","0","0","0"),
("2493","1","16","11","image","Fotka k modulu O PARTNEROVI","_menu_8_image_1","","0","0","0"),
("2494","1","16","1","content","Google Plus","social_google_plus","https://plus.google.com/+zellamseekaprun","1","0","0"),
("2495","1","16","12","content","Input Otázka","form_extend_v2_otazka","frage2","0","0","0"),
("2496","1","16","13","content","Odoslať potvrdzovací email","sent_confirm_mail","1","1","0","0"),
("2497","1","16","12","content","Voliteľný parameter 1","form_base_custom_1","Country","1","0","0"),
("2498","1","17","1","content","Template","layout","dnt_first","1","0","0"),
("2499","1","17","15","content","Link partnera","link_partner","http://www.hervis.cz","1","0","0"),
("2500","1","17","3","content","Link regionu","link_region","http://www.topof.at","1","0","0"),
("2501","1","17","1","content","Zobraziť na URL adrese","real_address","http://www.vyhrat.com/","1","0","0"),
("2502","1","17","1","content","Facebook","social_fb","https://www.facebook.com/pyhrnpriel/","1","0","0"),
("2503","1","17","1","content","Twitter","social_twitter","https://twitter.com/","0","0","0"),
("2504","1","17","1","content","Instagram","social_linked_in","https://www.instagram.com/pyhrn_priel/","1","0","0"),
("2505","1","17","1","content","Mapa ","map_location","https://www.google.cz/maps/place/Pyhrn-Priel+Tourismus+GmbH/@47.7224492,14.3245569,17z/data=!3m1!4b1!4m5!3m4!1s0x47717b977ad5fe03:0x4557dba6940c5141!8m2!3d47.7224492!4d14.3267509","1","0","0"),
("2506","1","17","1","image","Favicon","favicon","57","1","0","0"),
("2507","1","17","1","content","Model farby R","_r","0","1","0","0"),
("2508","1","17","1","content","Model farby G","_g","96","1","0","0"),
("2509","1","17","1","content","Model farby B","_b","147","1","0","0"),
("2510","1","17","1","content","Font","_font","roboto","1","0","0"),
("2511","1","17","2","content","Názov hotelu 1","info_hotel_name_1","Familotel - amiamo","0","0","0"),
("2512","1","17","2","content","Adresa Hotela 1","info_hotel_addr_1","Salzachtal Bundesstrasse 20   <br/>   A - 5700 Zell am See","1","0","0"),
("2513","1","17","2","content","Telefón do hotela 1","info_hotel_tel_c_1","+43 6542 55355","1","0","0"),
("2514","1","17","2","content","Email hotelu 1","info_hotel_email_1","hotel@amiamo.at","1","0","0"),
("2515","1","17","3","content","Názov regiónu","info_region_name","Pyhrn-Priel Tourismus GmbH","1","0","0"),
("2516","1","17","3","content","Adresa regiónu","info_region_addr","Hauptstrasse 28  <br/>  A-4580 Windischgarsten","1","0","0"),
("2517","1","17","3","content","Telefónne číslo regiónu","info_region_tel_c","+43 7562 5266-99","1","0","0"),
("2518","1","17","3","content","Email regiónu","info_region_email","info@pyhrn-priel.net","1","0","0"),
("2519","1","17","1","content","Youtube video","youtube_video","f7s_Ruee9Hk","1","0","0"),
("2520","1","17","15","image","Logo partnera","partner_logo","316","1","0","0"),
("2521","1","17","3","image","Logo regiónu","region_logo","317","1","0","0"),
("2522","1","17","5","image","Fotka v hlavnom slideri 1","_menu_1_image_1","335","1","0","0"),
("2523","1","17","7","image","Fotka modulu pre modul GALÉRIA","_menu_3_image_1","280","0","0","0"),
("2524","1","17","7","image","Druhá fotka modulu pre modul GALÉRIA","_menu_3_image_2","281","0","0","0"),
("2525","1","17","2","image","Fotka k modulu UBYTOVANIE","_menu_7_image_1_1","272","1","0","0"),
("2526","1","17","5","content","Názov modulu pre modul INFO","_menu_name_1","Intro","1","1","0"),
("2527","1","17","6","content","Názov modulu pre modul O SÚŤAŽI","_menu_name_2","O soutěži","0","0","0"),
("2528","1","17","7","content","Názov modulu pre modul GALÉRIU","_menu_name_3","Galérie","0","0","0"),
("2529","1","17","8","content","Názov modulu pre modul FORMULÁRU","_menu_name_4","Registrace","1","3","0"),
("2530","1","17","9","content","Názov modulu pre modul O REGIONE","_menu_name_5","Pyhrn-Priel","1","2","0"),
("2531","1","17","10","content","Názov modulu pre modul MAPA","_menu_name_6","Mapa","0","0","0"),
("2532","1","17","11","content","Názov modulu pre modul UBYTOVANIE","_menu_name_7","Ubytování","0","0","0"),
("2533","1","17","5","content","Text k modulu INFO","_menu_1_text_1","<p><span style=\"color:#FFFFFF\"><strong><span style=\"font-size:24px\">Vyhrajte s Hervis Sports jeden ze 3 zimn&iacute;ch lyžařsk&yacute;ch pobytů v rakousk&eacute;m TOP dovolenkov&eacute;m regionu Pyhrn-Priel!</span></strong></span></p>\n","1","0","0"),
("2534","1","17","6","content","Text k modulu O SÚŤAŽI","_menu_2_text_1","<p style=\"text-align:center\"><strong><span style=\"font-size:18px\">Vyhrajte s Hervis Sports!</span></strong></p>\n\n<p style=\"text-align:center\">Nen&iacute; nad to, si poř&aacute;dně zalyžovat na par&aacute;dn&iacute; sjezdovce v Alp&aacute;ch. Hervis Sports&nbsp;ve spolupr&aacute;ci s rakousk&yacute;m&nbsp;TOP dovolenkov&yacute;m&nbsp;regionem&nbsp;Pyhrn-Priel&nbsp;poř&aacute;daj&iacute; až do 15.12.2016&nbsp;zimn&iacute; soutěž o 3 lyžařsk&eacute; pobyty!&nbsp;<strong>K &uacute;časti v soutěži V&aacute;m stač&iacute; vyplnit &nbsp;a odeslat registračn&iacute; formul&aacute;ř&nbsp;včetně zodpovězen&iacute; soutěžn&iacute;&nbsp;ot&aacute;zky.</strong></p>\n\n<p style=\"text-align:center\">V&yacute;hry v soutěži:<br />\n<strong>3x zimn&iacute; lyžařsk&yacute;&nbsp;pobyt pro 2 osoby na 4&nbsp;dny /&nbsp;3&nbsp;noci v hotelu včetně polopenze a dvou&nbsp;2-denn&iacute;ch&nbsp;skipasů!</strong></p>\n\n<p style=\"text-align:center\">Soutěž prob&iacute;h&aacute; 15.11. - 15.12. 2016 na &uacute;zem&iacute; ČR.<br />\n<strong>Přejeme V&aacute;m hodně &scaron;těst&iacute; při odpovědi na soutěžn&iacute;&nbsp;ot&aacute;zku!</strong></p>\n","1","0","0"),
("2535","1","17","7","content","Text k modulu GALÉRIA","_menu_3_text_1","<p>Krasna Galeria!</p>\n","0","0","0"),
("2536","1","17","8","content","Text k modulu FORMULÁR","_menu_4_text_1","","1","0","0"),
("2537","1","17","9","content","Text k modulu O REGIÓNE","_menu_5_text_1","<p><strong>Bezkonkurenčn&iacute; kr&aacute;tkodob&aacute; dovolen&aacute;</strong></p>\n\n<p>TOP of Pyhrn-Priel - Profesionalita v rozmanitosti lyžov&aacute;n&iacute;</p>\n\n<p>Lyžařsk&eacute; oblasti s jistotou sněhu, ohromuj&iacute;c&iacute; horsk&eacute; scen&eacute;rie, skvěl&eacute; nab&iacute;dky pro voln&yacute; čas a vydatn&eacute; pochoutky pro labužn&iacute;ky - v relaxačn&iacute;m regionu Pyhrn-Priel v&aacute;s budou h&yacute;čkat partneři &bdquo;TOP of&ldquo;, profesion&aacute;lov&eacute; v rozmanitosti lyžov&aacute;n&iacute;, v r&aacute;mci bezkonkurenčn&iacute; kr&aacute;tkodob&eacute; dovolen&eacute;.</p>\n","1","0","0"),
("2538","1","17","9","content","Ďalší text k modulu O REGIÓNE","_menu_5_text_2","<p><strong>TOP dovolenkov&yacute;&nbsp;region&nbsp;Pyhrn-Priel!</strong></p>\n\n<p>Na&scaron;e plus pro v&aacute;s? Rychl&yacute; a nekomplikovan&yacute; př&iacute;jezd.</p>\n\n<p>Na co čekat? Zamluvte si dovolenou hned dnes!</p>\n\n<p>V&iacute;ce o regionu: <a href=\"http://www.topof.at\" target=\"_blank\"><strong>www.topof.at</strong></a></p>\n","1","0","0"),
("2539","1","17","10","content","Text k modulu MAPA","_menu_6_text_1","<p>Mapa regionu</p>\n","1","0","0"),
("2540","1","17","2","content","Text k modulu UBYTOVANIE 1","_menu_7_text_1","<p><strong>amiamo - Familotel Zell am See</strong></p>\n\n<p>Jako prvn&iacute; boutique hotel pro rodiny&nbsp;s dětmi jsme stanovili standardy pro&nbsp;v&yacute;jimečn&eacute; z&aacute;žitky z dovolen&eacute;: mal&yacute;,&nbsp;vybran&yacute; a individu&aacute;ln&iacute;, vyznamenan&yacute;&nbsp;nejvy&scaron;&scaron;&iacute; pečet&iacute; jakosti Q III. Luxusn&iacute;&nbsp;penzion Amiamo v kombinaci s&nbsp;kartou Zell am See-Kaprun zaručuje&nbsp;odpočinkovou, ale i vzru&scaron;uj&iacute;c&iacute;&nbsp;dovolenou pro celou rodinu. S v&iacute;ce&nbsp;než 20-ti letou zku&scaron;enost&iacute; nab&iacute;z&iacute;me&nbsp;<br />\nhl&iacute;d&aacute;n&iacute; dět&iacute; v vnitřn&iacute; sekci o plo&scaron;e&nbsp;500 m&sup2; s velk&yacute;m množstv&iacute;m aktivit.&nbsp;</p>\n\n<p>NOVINKA:&nbsp;Sekce Wellness o plo&scaron;e 300 m&sup2;&nbsp;disponuje 3 baz&eacute;ny, Babynariem&nbsp;a kompletně zrekonstruovanou&nbsp;sekc&iacute; saun&nbsp;s relaxačn&iacute; m&iacute;stnost&iacute;.&nbsp;</p>\n\n<p>Na jezeře Zeller&nbsp;See&nbsp;V&aacute;s&nbsp;oček&aacute;v&aacute;&nbsp;hotelov&aacute; pl&aacute;ž s bohatou nab&iacute;dkou!</p>\n","1","0","0");
INSERT INTO dnt_microsites_composer VALUES
("2541","1","17","12","content","Input Meno","form_base_name","Jméno","1","0","0"),
("2542","1","17","12","content","Input Priezvisko","form_base_surname","Příjmení","1","0","0"),
("2543","1","17","12","content","Input PSČ","form_base_psc","PSČ","1","0","0"),
("2544","1","17","12","content","Input Mesto","form_base_city","Město","1","0","0"),
("2545","1","17","12","content","Input Email","form_base_email","Email","1","0","0"),
("2546","1","17","12","content","Input Doklad","form_extend_v1_doklad","Doklad o Vašem nákupu: (unikátní číslo účtenky)","0","0","0"),
("2547","1","17","12","content","Input Otázka + odpovede","form_extend_v3_otazka","Je toto modré?","0","0","0"),
("2548","1","17","12","content","Odpoveď A","form_extend_v3_odpoved_a","áno","0","0","0"),
("2549","1","17","12","content","Odpoveď B","form_extend_v3_odpoved_b","neviem","0","0","0"),
("2550","1","17","12","content","Odpoveď C","form_extend_v3_odpoved_c","možno","0","0","0"),
("2551","1","17","4","content","Názov","field_word_nazov","Názov","0","0","0"),
("2552","1","17","4","content","Adresa","field_word_adresa","Adresa","0","0","0"),
("2553","1","17","4","content","Kontakt","field_word_kontakt","Kontakt","0","0","0"),
("2554","1","17","4","content","Web","field_word_web","Web","0","0","0"),
("2555","1","17","4","content","Hláška povinné pole","field_word_err","Toto pole je povinné","1","0","0"),
("2556","1","17","4","content","Registrovať","field_word_sent","Registrovat","1","0","0"),
("2557","1","17","4","content","Predchádzajúca (fotka)","field_word_previous","Předchozí","1","0","0"),
("2558","1","17","4","content","Ďalšia (fotka)","field_word_next","Další","1","0","0"),
("2559","1","17","4","content","Súhlasím s newslettrom","field_word_suhlas_news","Mám zájem o zasílání aktuálních novinek o TOP dovolenkovém regionu Pyhrn-Priel!","1","0","0"),
("2560","1","17","4","content","Súhlasím s podmienkami súťaže","field_word_suhlas_podm","Souhlasím s pravidly soutěže (PRAVIDLA ZDE).","1","0","0"),
("2561","1","17","1","content","Kľúčové slová pre Google","keywords","soutěž Hervis Sports ","1","0","0"),
("2562","1","17","1","content","Popis pre Google","description","This competition has a first ID","1","0","0"),
("2563","1","17","4","content","Súhlasím s podmienkami súťaže","field_word_dakujeme","Děkujeme za Vaši účast a přejeme Vám hodně štěstí v soutěži!","1","0","0"),
("2564","1","17","12","image","Podmienky súťaže (PDF)","form_file_podmienky","337","1","0","0"),
("2565","1","17","12","image","Newsletter (PDF)","form_file_newsletter","68","0","0","0"),
("2566","1","17","4","content","Hláška možnosti novej registrácie","field_word_nova_registracia","Pozvěte do soutěže i své přátele!","1","0","0"),
("2567","1","17","13","content","Počet znakov vygenerovaného hashu","_email_conf_char","8","1","0","0"),
("2568","1","17","13","content","Hláška, súťažiacemu ktorá mu príde na email po registracii.","_email_conf_sent_text","Děkujeme za registraci do soutěže a přejeme Vám hodně štěstí při slosování! ","1","0","0"),
("2569","1","17","12","content","Telefónne číslo","form_base_tel_c","Telefónne číslo","0","0","0"),
("2570","1","17","4","content","Hláška za hviezdičkou o povinných poliach","field_word_povinne_polia","","1","0","0"),
("2571","1","17","2","image","Fotka loga k modulu UBYTOVANIE","_menu_7_image_2_1","59","1","0","0"),
("2572","1","17","16","content","Názov hotelu 2","info_hotel_name_2","Sporthotel Falkenstein","0","0","0"),
("2573","1","17","16","content","Adresa Hotela 2","info_hotel_addr_2","Nikolaus-Gassner-Str. 79   <br/>   A - 5710 Kaprun","1","0","0"),
("2574","1","17","16","content","Telefón do hotela 2","info_hotel_tel_c_2","+43 6547 7122","1","0","0"),
("2575","1","17","16","content","Email hotelu 2","info_hotel_email_2","sporthotel@falkenstein.at","1","0","0"),
("2576","1","17","16","content","Text k modulu UBYTOVANIE 2","_menu_7_text_2","<p><strong>Das Falkenstein</strong></p>\n\n<p>Tady v Kaprunu a hotelu Falkenstein lze objevit spoustu vzru&scaron;uj&iacute;c&iacute;ch možnost&iacute; a z&aacute;bavy&nbsp;pro rodiny a děti. Každ&yacute; den může b&yacute;t spojen s nov&yacute;mi z&aacute;žitky a dojmy, ať už jde&nbsp;o zvl&aacute;&scaron;tn&iacute; rodinn&eacute; turistick&eacute; v&yacute;lety, čvacht&aacute;n&iacute; a klouz&aacute;n&iacute; v Tauern SPA Kaprun, v&yacute;let&nbsp;k alpsk&eacute; horsk&eacute; bobov&eacute; dr&aacute;ze &quot;Maisfiltzer&quot;, o n&aacute;v&scaron;těvu volnočasov&eacute;ho nebo n&aacute;rodn&iacute;ho&nbsp;parku nebo o mnoh&aacute; dal&scaron;&iacute; dobrodružstv&iacute; - z&aacute;bavě se nekladou ž&aacute;dn&eacute; hranice.</p>\n\n<p>V hotelu Falkenstein&nbsp;se nach&aacute;z&iacute; kromě&nbsp;prostorn&eacute;ho&nbsp;dětsk&eacute;ho hři&scaron;tě&nbsp;a dětsk&eacute; herny tak&eacute;&nbsp;velk&yacute; baz&eacute;n a najdete&nbsp;zde i&nbsp;chutnou&nbsp;Pinzgauerskou&nbsp;kuchyni s pestr&yacute;mi&nbsp;dětsk&yacute;mi menu&nbsp;- n&aacute;&scaron; maskot Falki&nbsp;se na v&aacute;s tě&scaron;&iacute;!</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n","1","0","0"),
("2577","1","17","17","content","Text k modulu UBYTOVANIE 3","_menu_7_text_3","<p><strong>Dovolen&aacute; v Zell am See je dovolenou s požitkem - v hotelu Tirolerhof!</strong></p>\n\n<p>Jezero, hory, ledovec a stylov&yacute;, rodinn&yacute; 4-hvězdičkov&yacute; hotel superior v Zell am See &ndash; to je ide&aacute;ln&iacute; kombinace pro va&scaron;i dovolenou v Zell am See, v l&eacute;tě i v zimě. Budete m&iacute;t v&yacute;hled na jezero Zeller See, hory Schmittenh&ouml;he a Kitzsteinhorn se v&scaron;emi rozmanit&yacute;mi sportovn&iacute;mi a rekreačn&iacute;mi možnostmi a budete h&yacute;čk&aacute;ni v b&aacute;ječn&eacute;m a mimoř&aacute;dn&eacute;m hotelu kulin&aacute;řsk&yacute;mi specialitami nejvy&scaron;&scaron;&iacute; kvality. Nebo str&aacute;v&iacute;te dovolenou spojenou s golfem v Salcburku, kde budete m&iacute;t v&yacute;hled na n&aacute;dhern&eacute; hory a jezero oblasti Zell am See-Kaprun. Nebo si užijete ve dvou n&aacute;dhern&eacute; apartm&aacute;ny v r&aacute;mci romantick&eacute; dovolen&eacute;. Nebo si poř&aacute;dně odpočinete s wellness a l&aacute;zeňskou nab&iacute;dkou vy&scaron;&scaron;&iacute; tř&iacute;dy a načerp&aacute;te novou energii. Takto může vypadat va&scaron;e dal&scaron;&iacute; rekreačn&iacute; dovolen&aacute; v hotelu Tirolerhof Zell am See - v srdci Salcburku. Wellness hotel, čtyřhvězdičkov&yacute; hotel superior, hotel pro hosty s pejsky, relaxačn&iacute; hotel - v&scaron;echny tyto př&iacute;vlastky si hotel Tirolerhof plně zaslouž&iacute;.</p>\n\n<p>&nbsp;</p>\n\n<p><strong>Prožijte nezapomenutelnou dovolenou v hotelu Tirolerhof!</strong></p>\n","0","0","0"),
("2578","1","17","17","content","Email hotelu 3","info_hotel_email_3","welcome@tirolerhof.co.at","0","0","0"),
("2579","1","17","17","content","Telefón do hotela 3","info_hotel_tel_c_3","+43(0)6542/772-0","0","0","0"),
("2580","1","17","17","content","Adresa Hotela 3","info_hotel_addr_3","Auerspergstrasse 5   <br/>   A - 5700 Zell am See","0","0","0"),
("2581","1","17","17","content","Názov hotelu 3","info_hotel_name_3","Hotel Tirolerhof ****S","0","0","0"),
("2582","1","17","16","image","Fotka loga k modulu UBYTOVANIE 2","_menu_7_image_1_2","66","1","0","0"),
("2583","1","17","16","image","Fotka k modulu UBYTOVANIE 2","_menu_7_image_2_2","65","0","0","0"),
("2584","1","17","17","image","Fotka loga k modulu UBYTOVANIE 3","_menu_7_image_1_3","51","0","0","0"),
("2585","1","17","17","image","Fotka k modulu UBYTOVANIE 3","_menu_7_image_2_3","56","0","0","0"),
("2586","1","17","2","content","Url adresa hotela 1","link_hotel_1","https://www.amiamo.at","1","0","0"),
("2587","1","17","16","content","Url adresa hotela 2","link_hotel_2","http://www.falkenstein.at","1","0","0"),
("2588","1","17","17","content","Url adresa hotela 3","link_hotel_3","http://www.tirolerhof.co.at/","0","0","0"),
("2589","1","17","9","image","Druhá fotka modulu pre modul GALÉRIA","_menu_5_gallery_1","37","1","0","0"),
("2590","1","17","5","image","Fotka v hlavnom slideri 2","_menu_1_image_2","336","1","0","0"),
("2591","1","17","4","content","Po ukončení registrácie","field_word_koniec_registracie","<p>SOUTĚŽ BYLA UKONČENA 1.8. 2016</p>\n\n<p>Slosov&aacute;n&iacute; bylo provedeno dne 5.8.&nbsp;2016&nbsp;dle pravidel soutěže.&nbsp;</p>\n\n<p><strong>1x rodinn&yacute; letn&iacute; pobyt, pro 2 dospěl&eacute; a 2 děti , na 5 dn&iacute; / 4 noci ve 4* hotelu, včetně polopenze a animačn&iacute;ho programu pro děti, to v&scaron;e v rakousk&eacute;m Zell am See-Kaprun, z&iacute;sk&aacute;vaj&iacute;:</strong></p>\n\n<p><strong>Petra Kuncova,&nbsp; 46804 Jablonec nad Nisou , ČR</strong></p>\n\n<p><strong>Alice Ertlbauerova,&nbsp; 62100 Brno, ČR</strong></p>\n\n<p><strong>Iveta Pohankova,&nbsp; 28002 Kol&iacute;n, ČR</strong></p>\n\n<p><strong>David Pravec,&nbsp; 53009 Pardubice, ČR</strong></p>\n\n<p><strong>Monika Adamusova,&nbsp; 58764 B&aacute;nov-Str&aacute;žky, ČR</strong></p>\n\n<p><strong>1x dětskou narozeninovou oslavu s překvapen&iacute;m kter&aacute; zahrnuje zaji&scaron;těn&iacute; z&aacute;bavn&eacute;ho doprovodn&eacute;ho programu (klaun, malov&aacute;n&iacute; na obličej a dal&scaron;&iacute; překvapen&iacute; ) pro Va&scaron;i narozeninovou oslavu u V&aacute;s doma, z&iacute;sk&aacute;v&aacute;:</strong></p>\n\n<p><strong>Vlasta Kozov&aacute;, 739 46 Hukvaldy, ČR</strong></p>\n\n<p>V&yacute;hern&iacute; vouchery budou vyercům odesl&aacute;ny mailem nebo po&scaron;tou v&nbsp;nejbliž&scaron;&iacute;ch dnech! Pobyty jsou kromě dopravy. Spr&aacute;vnost a platnost slosov&aacute;n&iacute; potvrzuj&iacute; provozovatel&eacute; soutěže.</p>\n\n<p><strong><u>V&yacute;hercům blahopřejeme a v&scaron;em ostatn&iacute;m děkujeme za &uacute;čast!</u></strong></p>\n\n<p><span style=\"font-size:12px\">Provozovatel&eacute; soutěže:&nbsp;Organiz&aacute;tor: Zell am See-Kaprun Tourismus GmbH, Brucker Bundesstr.1a, 5700 Zell am See, AT a spoluorganiz&aacute;tor : Pompo, spol. s r.o., Lidick&aacute; 481, 273 51&nbsp; Unho&scaron;ť, ČR</span></p>\n","0","0","0"),
("2592","1","17","11","content","Názov modulu pre modul O PARTNEROVI","_menu_name_8","Hervis Sports","1","4","0"),
("2593","1","17","15","content","Email partnera","info_partner_email","office@hervis.cz","1","0","0"),
("2594","1","17","15","content","Adresa partnera","info_partner_addr","Nákupní 389/2 <br/> 102 00 Praha 10, ČR","1","0","0"),
("2595","1","17","15","content","Názov partnera","info_partner_name","HERVIS Sport a móda, s.r.o.","1","0","0"),
("2596","1","17","15","content","Telefónne číslo na partnera","info_partner_tel_c","+420 800 200 201","1","0","0"),
("2597","1","17","11","content","Text k modulu O PARTNEROVI 1","_menu_8_text_1","<p>Evropsk&yacute; multi-kan&aacute;lov&yacute; Sport distributor</p>\n\n<p>Volně podle hesla Get movin&#39; symbolizuje HERVIS radost z pohybu a lep&scaron;&iacute; životn&iacute; pocit. Hervis Sports plně s&aacute;z&iacute; na orientaci na značky a spol&eacute;h&aacute; se na zbož&iacute; předn&iacute;ch tuzemsk&yacute;ch a zahraničn&iacute;ch v&yacute;robců. A to za nejlep&scaron;&iacute; cenu.<br />\nHervis se vyznačuje kompletnost&iacute; sortimentu v oblastech sportu a m&oacute;dy, vyv&aacute;ženou nab&iacute;dkou služeb, kvalifikovan&yacute;m poradenstv&iacute;m a agresivn&iacute;mi cenov&yacute;mi nab&iacute;dkami.<br />\n<a href=\"https://www.hervis.cz/store/store-finder?q=&amp;CSRFToken=f9c9f7f2-bd1c-4783-bb89-64ac97880cd2\" target=\"_blank\">Hervis s 25 prodejnami</a> je mezi největ&scaron;&iacute;mi česk&yacute;mi obchody se sportovn&iacute;m zbož&iacute;m. Na&scaron;&iacute;m deklarovan&yacute;m c&iacute;lem je b&yacute;t dosažiteln&yacute; pro v&scaron;echny spotřebitele.</p>\n","1","0","0"),
("2598","1","17","1","content","Jazyková mutácia pre Facebook","_language","cs_CZ","1","0","0"),
("2599","1","17","12","image","Newsletter 2 (PDF)","form_file_newsletter_2","68","0","0","0"),
("2600","1","17","4","content","Súhlasím s newslettrom 2","field_word_suhlas_news_2","News 2","0","0","0"),
("2601","1","17","18","content","Email hotelu 4","info_hotel_email_4","welcome@tirolerhof.co.at","0","0","0"),
("2602","1","17","18","content","Telefón do hotela 4","info_hotel_tel_c_4","+43(0)6542/772-0","0","0","0"),
("2603","1","17","18","content","Adresa Hotela 4","info_hotel_addr_4","Auerspergstrasse 5   <br/>   A - 5700 Zell am See","1","0","0"),
("2604","1","17","18","content","Názov hotelu 4","info_hotel_name_4","Hotel Tirolerhof ****S","0","0","0"),
("2605","1","17","18","image","Fotka loga k modulu UBYTOVANIE 4","_menu_7_image_1_4","","0","0","0"),
("2606","1","17","18","image","Fotka k modulu UBYTOVANIE 4","_menu_7_image_2_4","","1","0","0"),
("2607","1","17","18","content","Url adresa hotela 4","link_hotel_4","http://www.tirolerhof.co.at/","0","0","0"),
("2608","1","17","18","content","Text k modulu UBYTOVANIE 4","_menu_7_text_4","","0","0","0"),
("2609","1","17","11","image","Fotka k modulu O PARTNEROVI","_menu_8_image_1","318","1","0","0"),
("2610","1","17","1","content","Google Plus","social_google_plus","https://plus.google.com/110909503360865337958/videos","1","0","0"),
("2611","1","17","12","content","Input Otázka","form_extend_v2_otazka","Jaký je název jedné ze dvou lyžařských oblastí v regionu Pyhrn-Priel?","1","0","0"),
("2612","1","17","13","content","Odoslať potvrdzovací email","sent_confirm_mail","1","1","0","0"),
("2613","1","17","12","content","Voliteľný parameter 1","form_base_custom_1","Číslo Vaší karty","0","0","0"),
("2614","1","18","1","content","Template","layout","dnt_first","1","0","0"),
("2615","1","18","15","content","Link partnera","link_partner","https://www.schwanda.at","1","0","0"),
("2616","1","18","3","content","Link regionu","link_region","http://www.kitzalps.cc","1","0","0"),
("2617","1","18","1","content","Zobraziť na URL adrese","real_address","http://www.vyhrat.com/","1","0","0"),
("2618","1","18","1","content","Facebook","social_fb","https://www.facebook.com/bergsport.schwanda","1","0","0"),
("2619","1","18","1","content","Twitter","social_twitter","http://www.twitter.com/kitzalpen","1","0","0"),
("2620","1","18","1","content","Instagram","social_linked_in","https://","0","0","0"),
("2621","1","18","1","content","Mapa ","map_location","https://www.google.at/maps/place/St.+Johann+in+Tirol/@47.5115887,12.3730646,12z/data=!3m1!4b1!4m5!3m4!1s0x47764e2d91669135:0x5870ad035eff9063!8m2!3d47.5221901!4d12.4308125","1","0","0"),
("2622","1","18","1","image","Favicon","favicon","57","1","0","0"),
("2623","1","18","1","content","Model farby R","_r","0","1","0","0"),
("2624","1","18","1","content","Model farby G","_g","65","1","0","0"),
("2625","1","18","1","content","Model farby B","_b","110","1","0","0"),
("2626","1","18","1","content","Font","_font","Arial","1","0","0"),
("2627","1","18","2","content","Názov hotelu 1","info_hotel_name_1","Explorer Hotel Kitzbühel","1","0","0"),
("2628","1","18","2","content","Adresa Hotela 1","info_hotel_addr_1","Speckbacherstraße 87 <br/> A - 6380 St. Johann in Tirol ","1","0","0"),
("2629","1","18","2","content","Telefón do hotela 1","info_hotel_tel_c_1","+43 5352 216660","1","0","0"),
("2630","1","18","2","content","Email hotelu 1","info_hotel_email_1","kitzbuehel@explorer-hotels.com","1","0","0"),
("2631","1","18","3","content","Názov regiónu","info_region_name","Kitzbüheler Alpen St. Johann in Tirol ","1","0","0"),
("2632","1","18","3","content","Adresa regiónu","info_region_addr","Poststraße 2 <br/> A-6380 St. Johann in Tirol","1","0","0"),
("2633","1","18","3","content","Telefónne číslo regiónu","info_region_tel_c","+43 5352 633350","1","0","0"),
("2634","1","18","3","content","Email regiónu","info_region_email","info@kitzalps.cc","1","0","0"),
("2635","1","18","1","content","Youtube video","youtube_video","u2KvU6hYw60","1","0","0"),
("2636","1","18","15","image","Logo partnera","partner_logo","322","1","0","0"),
("2637","1","18","3","image","Logo regiónu","region_logo","332","1","0","0"),
("2638","1","18","5","image","Fotka v hlavnom slideri 1","_menu_1_image_1","323","1","0","0"),
("2639","1","18","7","image","Fotka modulu pre modul GALÉRIA","_menu_3_image_1","325","1","0","0"),
("2640","1","18","7","image","Druhá fotka modulu pre modul GALÉRIA","_menu_3_image_2","326","1","0","0");
INSERT INTO dnt_microsites_composer VALUES
("2641","1","18","2","image","Fotka k modulu UBYTOVANIE","_menu_7_image_1_1","327","1","0","0"),
("2642","1","18","5","content","Názov modulu pre modul INFO","_menu_name_1","Intro","1","1","0"),
("2643","1","18","6","content","Názov modulu pre modul O SÚŤAŽI","_menu_name_2","Gewinnspiel","0","0","0"),
("2644","1","18","7","content","Názov modulu pre modul GALÉRIU","_menu_name_3","Galérie","0","0","0"),
("2645","1","18","8","content","Názov modulu pre modul FORMULÁRU","_menu_name_4","Teilnahme","1","3","0"),
("2646","1","18","9","content","Názov modulu pre modul O REGIONE","_menu_name_5","Region St. Johann in Tirol","1","2","0"),
("2647","1","18","10","content","Názov modulu pre modul MAPA","_menu_name_6","Map","0","0","0"),
("2648","1","18","11","content","Názov modulu pre modul UBYTOVANIE","_menu_name_7","Teilnehmendes Hotel","1","4","0"),
("2649","1","18","5","content","Text k modulu INFO","_menu_1_text_1","<p><span style=\"font-size:20px\"><span style=\"color:#FFFFFF\"><strong>Gewinne einen Winterurlaub in den Kitzb&uuml;heler Alpen St. Johann in Tirol!</strong></span></span></p>\n","1","0","0"),
("2650","1","18","6","content","Text k modulu O SÚŤAŽI","_menu_2_text_1","<h3><strong><span style=\"font-size:18px\"><span style=\"font-family:arial,helvetica,sans-serif\">Einfach Teilnahmeformular ausf&uuml;llen,&nbsp;</span>Frage richtig beantworten,&nbsp;<span style=\"font-family:arial,helvetica,sans-serif\">und schon spielen Sie mit um einen tollen Skiurlaub!</span></span></strong></h3>\n\n<h3><span style=\"font-size:16px\"><span style=\"font-family:arial,helvetica,sans-serif\">Das Gewinnspiel l&auml;uft von 01.&nbsp;</span>November&nbsp;<span style=\"font-family:arial,helvetica,sans-serif\">2016 bis 31.&nbsp;</span>Dezember&nbsp;<span style=\"font-family:arial,helvetica,sans-serif\">2016.</span></span></h3>\n\n<h3><span style=\"font-size:16px\"><span style=\"font-family:arial,helvetica,sans-serif\">Das gibt es zu gewinnen:</span></span></h3>\n\n<h3><strong><span style=\"font-size:16px\"><span style=\"font-family:arial,helvetica,sans-serif\">2 Winterurlaube f&uuml;r 2 Erwachsene &agrave; 3&nbsp;N&auml;chte&nbsp;</span>im Explorer Hotel Kitzb&uuml;hel im trendigen Design-Zimmer&nbsp;inkl. Fr&uuml;hst&uuml;ck,&nbsp;Skipass,&nbsp;Nutzung des Sport Spa&nbsp;und gef&uuml;hrter Schneeschuh-Wanderung,&nbsp;in den Kitzb&uuml;heler Alpen St. Johann in Tirol.</span></strong></h3>\n","1","0","0"),
("2651","1","18","7","content","Text k modulu GALÉRIA","_menu_3_text_1","","1","0","0"),
("2652","1","18","8","content","Text k modulu FORMULÁR","_menu_4_text_1","<p>Ihre Registrierung:</p>\n","1","0","0"),
("2653","1","18","9","content","Text k modulu O REGIÓNE","_menu_5_text_1","<p><strong>Die Region St. Johann in Tirol &ndash; zwischen Kitzb&uuml;heler Horn und Kaisergebirge</strong>&nbsp;</p>\n\n<p><strong>Die malerischen Orte St. Johann in Tirol, Oberndorf, Kirchdorf und Erpfendorf pr&auml;sentieren sich als Urlaubs-Destination f&uuml;r Liebhaber des Wintersports. Sport und Erholung sowie authentische Tiroler Gastfreundschaft zwischen den verschneiten Gipfeln der Kitzb&uuml;heler Alpen</strong>.</p>\n\n<p>Der Winter in der Region St. Johann in Tirol bietet im Kaisergebirge und den umgebenden sanften Grasbergen eine Vielzahl an Sport- und Erholungsm&ouml;glichkeiten. Diese reichen vom alpinen Skisport &uuml;ber Langlauf bis Schneeschuh- und Winterwandern. W&ouml;chentlich werden Schneeschuhtouren in der Region, mit G&auml;stekarte teilweise gratis, angeboten.</p>\n","1","0","0"),
("2654","1","18","9","content","Ďalší text k modulu O REGIÓNE","_menu_5_text_2","<p>Wer lieber mit Tourenski aufbricht, begibt sich am besten ins Kaisergebirge. Bereits kurze Anstiege f&uuml;hren in alpines Gel&auml;nde direkt zwischen die markanten Gipfel des Wilden Kaiser. Nutzen Sie das Angebot der lokalen Skiguides. Diese f&uuml;hren Sie zu den besten Tiefschneeh&auml;ngen.<br />\nF&uuml;r das alpine Skivergn&uuml;gen wartet die Region mit M&ouml;glichkeiten f&uuml;r alle K&ouml;nnerstufen auf. Das Skigebiet von St. Johann in Tirol ist gem&uuml;tlich, die Pisten sind weit und vielf&auml;ltig. Heimelige Skih&uuml;tten, Schneebars und Sonnenterrassen laden zu Einkehrschwung und Apr&egrave;s Ski. In n&auml;chster N&auml;he zu den gro&szlig;en Skigebieten der SkiWelt, Kitzb&uuml;hel und Saalbach &ndash; Hinterglemm &ndash; Leogang &ndash; Fieberbrunn gelegen, deckt St. Johann in Tirol die gesamte Leistungspallette ab.</p>\n\n<p><a href=\"https://www.kitzbueheler-alpen.com/de/st-johann/urlaub-in-st-johann-in-tirol-oberndorf-kirchdorf-erpfendorf.html\" target=\"_blank\">Mehr Informationen zur Region St. Johann in Tirol&nbsp;finden Sie HIER!</a></p>\n","1","0","0"),
("2655","1","18","10","content","Text k modulu MAPA","_menu_6_text_1","<p>Map</p>\n","1","0","0"),
("2656","1","18","2","content","Text k modulu UBYTOVANIE 1","_menu_7_text_1","<p><strong>Explorer Hotel Kitzb&uuml;hel ***</strong></p>\n\n<p><strong>Lockere Atmosph&auml;re, modernes Design, entdeckungsfreudige G&auml;ste und die Kitzb&uuml;heler Alpen direkt vor der T&uuml;r &ndash; das ist das Explorer Hotel Kitzb&uuml;hel in St. Johann in Tirol</strong>.<br />\nDas im November neu er&ouml;ffnete Design-Budgethotel &uuml;berzeugt durch Komfort sowie eine Ausstattung, die speziell auf Sportler ausgerichtet ist. Die modernen Design-Zimmer bieten viel Platz und eine gem&uuml;tliche Sitznische am Fenster mit Bergblick. Wer mag, brutzelt sich am Fr&uuml;hst&uuml;cksbuffet sein R&uuml;hrei selbst, informiert sich an den interaktiven Touchwalls &uuml;ber die regionalen Skigebiete und entspannt am Abend im Sport Spa mit Sauna, Dampfbad und&nbsp;Fitnessraum. Allen Wintersportbegeisterten bietet das Explorer Hotel ein Ski-Testcenter inkl. Skiverleih, -kursen und Werkbank. Unkompliziert, trendig und sportlich, das ist Urlaub im Explorer Hotel Kitzb&uuml;hel.</p>\n","1","0","0"),
("2657","1","18","12","content","Input Meno","form_base_name","Vorname","1","0","0"),
("2658","1","18","12","content","Input Priezvisko","form_base_surname","Nachname","1","0","0"),
("2659","1","18","12","content","Input PSČ","form_base_psc","PLZ","1","0","0"),
("2660","1","18","12","content","Input Mesto","form_base_city","Stadt","1","0","0"),
("2661","1","18","12","content","Input Email","form_base_email","E-mail","1","0","0"),
("2662","1","18","12","content","Input Doklad","form_extend_v1_doklad","Einkaufsbeleg Nr:","0","0","0"),
("2663","1","18","12","content","Input Otázka + odpovede","form_extend_v3_otazka","Was macht die Region St. Johann in Tirol so besonders ?","1","0","0"),
("2664","1","18","12","content","Odpoveď A","form_extend_v3_odpoved_a","alpines Gelände und sanfte Grasberge","1","0","0"),
("2665","1","18","12","content","Odpoveď B","form_extend_v3_odpoved_b","tiroler Gastfreundschaft und heimelige Skihütten","1","0","0"),
("2666","1","18","12","content","Odpoveď C","form_extend_v3_odpoved_c","die Kombination dieser Punkte","1","0","0"),
("2667","1","18","4","content","Názov","field_word_nazov","Názov","0","0","0"),
("2668","1","18","4","content","Adresa","field_word_adresa","Adresa","0","0","0"),
("2669","1","18","4","content","Kontakt","field_word_kontakt","Kontakt","0","0","0"),
("2670","1","18","4","content","Web","field_word_web","Web","0","0","0"),
("2671","1","18","4","content","Hláška povinné pole","field_word_err","Pflichtfelder","1","0","0"),
("2672","1","18","4","content","Registrovať","field_word_sent","Teilnehmen","1","0","0"),
("2673","1","18","4","content","Predchádzajúca (fotka)","field_word_previous","Vorheriges","1","0","0"),
("2674","1","18","4","content","Ďalšia (fotka)","field_word_next","Nächstes","1","0","0"),
("2675","1","18","4","content","Súhlasím s newslettrom","field_word_suhlas_news","Ja, ich stimme zu den Newsletter der Kitzbüheler Alpen St. Johann in Tirol zu erhalten und meine Daten für weitere Marketingaktivitäten zur Verfügung zu stellen.","1","0","0"),
("2676","1","18","4","content","Súhlasím s podmienkami súťaže","field_word_suhlas_podm","Ja, ich stimme den Teilnahmebedingungen zu. (Teilnahmebedingungen HIER).","1","0","0"),
("2677","1","18","1","content","Kľúčové slová pre Google","keywords","gewinnspiel Kitzbüheler Alpen St. Johann in Tirol","1","0","0"),
("2678","1","18","1","content","Popis pre Google","description","This competition has a first ID","1","0","0"),
("2679","1","18","4","content","Súhlasím s podmienkami súťaže","field_word_dakujeme","Danke, Sie haben sich erfolgreich für das Gewinnspiel registriert. Wir wünschen Ihnen viel Glück!","1","0","0"),
("2680","1","18","12","image","Podmienky súťaže (PDF)","form_file_podmienky","328","1","0","0"),
("2681","1","18","12","image","Newsletter (PDF)","form_file_newsletter","68","0","0","0"),
("2682","1","18","4","content","Hláška možnosti novej registrácie","field_word_nova_registracia","Jetzt Freunde einladen!","1","0","0"),
("2683","1","18","13","content","Počet znakov vygenerovaného hashu","_email_conf_char","8","1","0","0"),
("2684","1","18","13","content","Hláška, súťažiacemu ktorá mu príde na email po registracii.","_email_conf_sent_text","Danke, Sie haben sich erfolgreich für das Gewinnspiel registriert. Wir wünschen Ihnen viel Erfolg bei der Verlosung! ","1","0","0"),
("2685","1","18","12","content","Telefónne číslo","form_base_tel_c","Tel. Nr. oder Wohnadresse","0","0","0"),
("2686","1","18","4","content","Hláška za hviezdičkou o povinných poliach","field_word_povinne_polia","","1","0","0"),
("2687","1","18","2","image","Fotka loga k modulu UBYTOVANIE","_menu_7_image_2_1","162","0","0","0"),
("2688","1","18","16","content","Názov hotelu 2","info_hotel_name_2","Hotel & Cafe Mosser****","0","0","0"),
("2689","1","18","16","content","Adresa Hotela 2","info_hotel_addr_2","Bahnhofstraße 9  <br/>  A - 9500 Villach","0","0","0"),
("2690","1","18","16","content","Telefón do hotela 2","info_hotel_tel_c_2","+43 4242 24 115","0","0","0"),
("2691","1","18","16","content","Email hotelu 2","info_hotel_email_2","info@hotelmosser.at","0","0","0"),
("2692","1","18","16","content","Text k modulu UBYTOVANIE 2","_menu_7_text_2","<p><strong>Hotel Mosser****</strong></p>\n\n<p>Hotel Mosser, Ihr Hotel in der Villacher Altstadt!</p>\n\n<p>F&uuml;r sportliche Urlaube oder gem&uuml;tliche Kurztrips, egal ob alleine oder mit der ganzen Familie,&nbsp;vom Einzelzimmer bis zum Appartement, mit Villachs bestem Fr&uuml;hst&uuml;cksb&uuml;ffet im Wintergarten.</p>\n","0","0","0"),
("2693","1","18","17","content","Text k modulu UBYTOVANIE 3","_menu_7_text_3","<p><strong>Naturel Hotels &amp; Resorts, Faaker See -&nbsp;K&auml;rnten</strong></p>\n\n<p>Urlaub im Hoteldorf<br />\nAnkommen, wohlf&uuml;hlen, umsorgt sein.<br />\nIn den Naturel Hoteld&ouml;rfern SEELEITN &amp; SCH&Ouml;NLEITN am Faaker See finden Sie viel Platz f&uuml;r erinnerungsw&uuml;rdige Erlebnisse.</p>\n\n<p><strong>Naturel Hotels &amp; Resorts</strong><br />\n<strong>Dorf SCH&Ouml;NLEITN ****</strong><br />\nDorfstra&szlig;e 26,&nbsp;9582 Oberaichwald</p>\n\n<p><strong>Naturel Hotels &amp; Resorts</strong><br />\n<strong><strong>Dorf SEELEITN ***</strong></strong><br />\nSeeufer-Landesstra&szlig;e 59,&nbsp;9583 Egg am See</p>\n\n<p>&nbsp;</p>\n","0","0","0"),
("2694","1","18","17","content","Email hotelu 3","info_hotel_email_3","info@naturelhotels.com","0","0","0"),
("2695","1","18","17","content","Telefón do hotela 3","info_hotel_tel_c_3","+43 4254 2384","0","0","0"),
("2696","1","18","17","content","Adresa Hotela 3","info_hotel_addr_3","Dorfstrasse 26   <br/>   A - 9582 Latschach/Oberaichwald","0","0","0"),
("2697","1","18","17","content","Názov hotelu 3","info_hotel_name_3","Naturel Hotels & Resorts GmbH","0","0","0"),
("2698","1","18","16","image","Fotka loga k modulu UBYTOVANIE 2","_menu_7_image_1_2","165","0","0","0"),
("2699","1","18","16","image","Fotka k modulu UBYTOVANIE 2","_menu_7_image_2_2","65","0","0","0"),
("2700","1","18","17","image","Fotka loga k modulu UBYTOVANIE 3","_menu_7_image_1_3","196","0","0","0"),
("2701","1","18","17","image","Fotka k modulu UBYTOVANIE 3","_menu_7_image_2_3","195","0","0","0"),
("2702","1","18","2","content","Url adresa hotela 1","link_hotel_1","https://www.explorer-hotels.com","1","0","0"),
("2703","1","18","16","content","Url adresa hotela 2","link_hotel_2","www.hotelmosser.info","0","0","0"),
("2704","1","18","17","content","Url adresa hotela 3","link_hotel_3","http://www.naturelhotels.com","0","0","0"),
("2705","1","18","9","image","Druhá fotka modulu pre modul GALÉRIA","_menu_5_gallery_1","36","1","0","0"),
("2706","1","18","5","image","Fotka v hlavnom slideri 2","_menu_1_image_2","324","1","0","0"),
("2707","1","18","4","content","Po ukončení registrácie","field_word_koniec_registracie","<p><span style=\"color:#FF0000\"><span style=\"font-size:22px\"><span style=\"font-family:arial,helvetica,sans-serif\"><strong>Das GEWINNSPIEL wurde bereits BEENDET!​</strong></span></span></span></p>\n\n<p><span style=\"color:rgb(255, 0, 0)\"><span style=\"font-size:22px\">Wir danken Ihnen<span style=\"font-family:arial,sans-serif\">&nbsp;f&uuml;r die zahlreiche Beteiligung!</span></span></span></p>\n\n<p><span style=\"color:#FF0000\"><span style=\"font-size:20px\"><span style=\"font-family:arial,helvetica,sans-serif\">Die Gewinner werden in K&uuml;rze per E-Mail benachrichtigt.</span></span></span></p>\n\n<p><strong><span style=\"color:#FF0000\"><span style=\"font-size:22px\"><span style=\"font-family:arial,helvetica,sans-serif\">Wir&nbsp;gratulieren den&nbsp;Gewinnern und&nbsp;w&uuml;nschen ihnen&nbsp;einen sch&ouml;nen Aufenthalt!&nbsp;</span></span></span></strong></p>\n\n<p>&nbsp;</p>\n","0","0","0"),
("2708","1","18","11","content","Názov modulu pre modul O PARTNEROVI","_menu_name_8","Bergsport Schwanda","1","5","0"),
("2709","1","18","15","content","Email partnera","info_partner_email","office@schwanda.at","1","0","0"),
("2710","1","18","15","content","Adresa partnera","info_partner_addr","Bäckerstrasse 7 <br/> A-1010 Wien","1","0","0"),
("2711","1","18","15","content","Názov partnera","info_partner_name","Bergsport Schwanda","1","0","0"),
("2712","1","18","15","content","Telefónne číslo na partnera","info_partner_tel_c","+43 1 5125320","1","0","0"),
("2713","1","18","11","content","Text k modulu O PARTNEROVI 1","_menu_8_text_1","<p><strong>Bergsport Schwanda ist ein f&uuml;hrendes Fachgesch&auml;ft f&uuml;r den Berg- und Wandersport.</strong></p>\n\n<p>Outdoorbegeisterten Kunden steht seit dem Jahr 1949 eine riesige Auswahl von Bergschuhen, Rucks&auml;cken, Schlafs&auml;cken, funktioneller Bekleidung, Bergzelten, Kletter- und Skitourenausr&uuml;stung sowie 1.000 weitere n&uuml;tzliche Kleinigkeiten wie Kocher, Kompasse, Taschenlampen oder Wasserfilter zur Verf&uuml;gung. Alle Mitarbeiter k&ouml;nnen selber auf eine langj&auml;hrige Outdoor-Erfahrung zur&uuml;ckgreifen.<br />\n&Uuml;berzeugen Sie sich bei einem Besuch in unserem Gesch&auml;ft in der Wiener Innenstadt oder im Internet unter <a href=\"http://www.schwanda.at\" target=\"_blank\">www.schwanda.at</a>&nbsp;</p>\n\n<p><strong><a href=\"https://schwanda.at/content/9-bergsport-schwanda-katalog-zusenden\" target=\"_blank\">Der neue Bergsport Schwanda Katalog HIER!</a></strong></p>\n","1","0","0"),
("2714","1","18","1","content","Jazyková mutácia pre Facebook","_language","de_DE","1","0","0"),
("2715","1","18","12","image","Newsletter 2 (PDF)","form_file_newsletter_2","68","1","0","0"),
("2716","1","18","4","content","Súhlasím s newslettrom 2","field_word_suhlas_news_2","Ja, ich stimme zu den Newsletter der Bergsport Schwanda zu erhalten und meine Daten für weitere Marketingaktivitäten zur Verfügung zu stellen.","1","0","0"),
("2717","1","18","18","content","Email hotelu 4","info_hotel_email_4","info@pacheiner.at","0","0","0"),
("2718","1","18","18","content","Telefón do hotela 4","info_hotel_tel_c_4","+43 4248 2888","0","0","0"),
("2719","1","18","18","content","Adresa Hotela 4","info_hotel_addr_4","Pölling 20  <br/>   A - 9520 Gerlitzen","0","0","0"),
("2720","1","18","18","content","Názov hotelu 4","info_hotel_name_4","Alpinhotel Hotel Pacheiner****","0","0","0"),
("2721","1","18","18","image","Fotka loga k modulu UBYTOVANIE 4","_menu_7_image_1_4","191","0","0","0"),
("2722","1","18","18","image","Fotka k modulu UBYTOVANIE 4","_menu_7_image_2_4","184","0","0","0"),
("2723","1","18","18","content","Url adresa hotela 4","link_hotel_4","http://www.pacheiner.at","0","0","0"),
("2724","1","18","18","content","Text k modulu UBYTOVANIE 4","_menu_7_text_4","<p><strong>Hotel Pacheiner****</strong></p>\n\n<p>POOL-POSITION IM ALPINHOTEL PACHEINER</p>\n\n<p>Auf 1.900 m auf dem Gipfel der Gerlitzen thront das 2012 neu errichtete Alpinhotel Pacheiner. Ein Platz, an dem anspruchsvolle Individualisten einen unvergesslichen R&uuml;ckzugsort finden.</p>\n","0","0","0"),
("2725","1","18","11","image","Fotka k modulu O PARTNEROVI","_menu_8_image_1","329","1","0","0"),
("2726","1","18","1","content","Google Plus","social_google_plus","https://plus.google.com/111302311413391009554","1","0","0"),
("2727","1","18","12","content","Input Otázka","form_extend_v2_otazka","Napíšte farbu vášho PC","0","0","0"),
("2728","1","18","13","content","Odoslať potvrdzovací email","sent_confirm_mail","1","1","0","0"),
("2729","1","18","12","content","Voliteľný parameter 1","form_base_custom_1","Toto pole je voliteľné","0","0","0"),
("2730","1","19","1","content","Template","layout","dnt_first","1","0","0"),
("2731","1","19","15","content","Link partnera","link_partner","http://www.intersport-voswinkel.de","1","0","0"),
("2732","1","19","3","content","Link regionu","link_region","http://www.nassfeld.at","1","0","0"),
("2733","1","19","1","content","Zobraziť na URL adrese","real_address","http://www.vyhrat.com/","1","0","0"),
("2734","1","19","1","content","Facebook","social_fb","https://www.facebook.com/INTERSPORT.Voswinkel","1","0","0"),
("2735","1","19","1","content","Twitter","social_twitter","https://twitter.com/nassfeld","1","0","0"),
("2736","1","19","1","content","Instagram","social_linked_in","https://www.instagram.com/nassfeld/","1","0","0"),
("2737","1","19","1","content","Mapa ","map_location","https://www.google.at/maps/place/Nassfeld+-+Pressegger+See/@46.565443,13.2692913,17z/data=!3m1!4b1!4m5!3m4!1s0x477a0f7a71e7d4cb:0x1b230f20b7085912!8m2!3d46.565443!4d13.27148","1","0","0"),
("2738","1","19","1","image","Favicon","favicon","57","1","0","0"),
("2739","1","19","1","content","Model farby R","_r","30","1","0","0"),
("2740","1","19","1","content","Model farby G","_g","70","1","0","0");
INSERT INTO dnt_microsites_composer VALUES
("2741","1","19","1","content","Model farby B","_b","135","1","0","0"),
("2742","1","19","1","content","Font","_font","roboto","1","0","0"),
("2743","1","19","2","content","Názov hotelu 1","info_hotel_name_1","Biedermeier Schloss Lerchenhof","1","0","0"),
("2744","1","19","2","content","Adresa Hotela 1","info_hotel_addr_1","9620 Untermöschach 8   <br/>   AT - 9620 Hermagor","1","0","0"),
("2745","1","19","2","content","Telefón do hotela 1","info_hotel_tel_c_1","+43 4282 2100","1","0","0"),
("2746","1","19","2","content","Email hotelu 1","info_hotel_email_1","info@lerchenhof.at","1","0","0"),
("2747","1","19","3","content","Názov regiónu","info_region_name","Nassfeld-Pressegger See","1","0","0"),
("2748","1","19","3","content","Adresa regiónu","info_region_addr","Wulfeniaplatz 1  <br/>  A - 9620 Hermagor","1","0","0"),
("2749","1","19","3","content","Telefónne číslo regiónu","info_region_tel_c","+43 4285 8241","1","0","0"),
("2750","1","19","3","content","Email regiónu","info_region_email","info@nassfeld.at","1","0","0"),
("2751","1","19","1","content","Youtube video","youtube_video","13-cA7o0E0Q","1","0","0"),
("2752","1","19","15","image","Logo partnera","partner_logo","98","1","0","0"),
("2753","1","19","3","image","Logo regiónu","region_logo","341","1","0","0"),
("2754","1","19","5","image","Fotka v hlavnom slideri 1","_menu_1_image_1","353","1","0","0"),
("2755","1","19","7","image","Fotka modulu pre modul GALÉRIA","_menu_3_image_1","96","0","0","0"),
("2756","1","19","7","image","Druhá fotka modulu pre modul GALÉRIA","_menu_3_image_2","97","0","0","0"),
("2757","1","19","2","image","Fotka k modulu UBYTOVANIE","_menu_7_image_1_1","342","1","0","0"),
("2758","1","19","5","content","Názov modulu pre modul INFO","_menu_name_1","Intro","1","0","0"),
("2759","1","19","6","content","Názov modulu pre modul O SÚŤAŽI","_menu_name_2","Gewinnspiel","1","0","0"),
("2760","1","19","7","content","Názov modulu pre modul GALÉRIU","_menu_name_3","Galérie","0","0","0"),
("2761","1","19","8","content","Názov modulu pre modul FORMULÁRU","_menu_name_4","Teilnahme","1","0","0"),
("2762","1","19","9","content","Názov modulu pre modul O REGIONE","_menu_name_5","Nassfeld","1","0","0"),
("2763","1","19","10","content","Názov modulu pre modul MAPA","_menu_name_6","Mapa","0","0","0"),
("2764","1","19","11","content","Názov modulu pre modul UBYTOVANIE","_menu_name_7","Teilnehmendes Hotel","1","0","0"),
("2765","1","19","5","content","Text k modulu INFO","_menu_1_text_1","<p><span style=\"font-size:26px\"><span style=\"color:#F0F8FF\"><strong>Gewinne jetzt einen von 5 Winterurlauben<br />\nam Nassfeld in K&auml;rnten!</strong></span></span></p>\n","1","0","0"),
("2766","1","19","6","content","Text k modulu O SÚŤAŽI","_menu_2_text_1","<p style=\"text-align:center\"><span style=\"font-size:20px\"><strong>Wir verlosen 5 Traumurlaube am Nassfeld in K&auml;rnten!</strong><br />\nEinfach Teilnahmeformular ausf&uuml;llen und schon spielen Sie um einen unvergesslichen Winterurlaub mit!</span></p>\n\n<p style=\"text-align:center\"><br />\n<span style=\"font-size:18px\">Die Kampagne l&auml;uft von 05.01.2017 bis 05.02.2017.</span></p>\n\n<p style=\"text-align:center\"><span style=\"font-size:18px\">Das gibt es zu gewinnen:<br />\n5 Traumurlaube f&uuml;r 2 Personen &agrave; 4 N&auml;chte im Biedermeier Schl&ouml;ssl Lerchenhof inkl. Halbpension und TOPSKIPASS,<br />\nim Skigebiet Nassfeld in K&auml;rnten!</span></p>\n","1","0","0"),
("2767","1","19","7","content","Text k modulu GALÉRIA","_menu_3_text_1","","0","0","0"),
("2768","1","19","8","content","Text k modulu FORMULÁR","_menu_4_text_1","<p>Ihre Registrierung:&nbsp;</p>\n","1","0","0"),
("2769","1","19","9","content","Text k modulu O REGIÓNE","_menu_5_text_1","<p><strong>Nassfeld<br />\nGro&szlig;z&uuml;gig. Sportlich. &Uuml;berraschend</strong></p>\n\n<p>&bull;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &bdquo;TOP 10 Skigebiet&ldquo; &Ouml;sterreichs<br />\n&bull;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Atemberaubendes Bergpanorama im alpinen S&uuml;den<br />\n&bull;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 110 km Pisten, 30 moderne Seilbahnen und Lifte<br />\n&bull;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Schneesicherheit &amp; die meisten Sonnenstunden im Alpenraum&nbsp;<br />\n&bull;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 25 Skih&uuml;tten &amp; Pistenrestaurants, gr&ouml;&szlig;te Sonnenterrasse der Alpen<br />\n&bull;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &Ouml;sterreichische Gem&uuml;tlichkeit &amp;&nbsp; s&uuml;dliches Lebensgef&uuml;hl&nbsp;</p>\n","1","0","0"),
("2770","1","19","9","content","Ďalší text k modulu O REGIÓNE","_menu_5_text_2","<p><br />\n<br />\n&bull;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Freeride- &amp; Fun Areas, Snowpark, Funslope. Ski-Movie<br />\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&hellip;. und ? Lasst euch &uuml;berraschen!<br />\n&bull;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Free W-Lan im Skigebiet<br />\n&bull;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 3 Kinder-&Uuml;bungsgel&auml;nde<br />\n&bull;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Rodeln, Langlaufen, Skitouren, Schneeschuhwandern, Nachtskilauf &hellip;</p>\n\n<p>Mehr Infos unter<span style=\"font-family:arial,helvetica,sans-serif\">:&nbsp;</span><strong><a href=\"http://www.nassfeld.at\" target=\"_blank\">www.nassfeld.at&nbsp;</a></strong></p>\n","1","0","0"),
("2771","1","19","10","content","Text k modulu MAPA","_menu_6_text_1","<p>Mapa regionu</p>\n","0","0","0"),
("2772","1","19","2","content","Text k modulu UBYTOVANIE 1","_menu_7_text_1","<p><strong>Winterurlaub in K&auml;rnten &ndash; Lust auf Skifahren am Nassfeld</strong></p>\n\n<p>Das <strong>Biedermeier Schl&ouml;ssl Lerchenhof</strong> wurde 1848 auf dem wundersch&ouml;nen Sonnenplateau &uuml;ber Hermagor als Herrensitz erbaut. Das st&auml;ndig renovierte kleine Schlosshotel liegt im Herzen der Urlaubsdestination Nassfeld-Pressegger See.</p>\n\n<p>Leidenschaftlich und famili&auml;r &ndash; begegnen sich G&auml;ste und Gastgeber. Liebevoll und individuell gestaltete Zimmer mit royalem Schlafkomfort. Duftender Gl&uuml;hmost bei romantischem Lagerfeuer ist ein Vorbote f&uuml;r den Abend bei Tisch.<br />\nGenuss mit Raffinesse aus hofeigener Produktion &ndash; gelebte Handarbeit</p>\n\n<p>Zum Skilift sind es nur 10 Min. mit dem Gratisbus. Langlaufen, Winter- &amp; Schneeschuhwandern oder Naturrodeln - direkt vor dem Schlosstor.<br />\nZum Eislauferlebnis am Wei&szlig;ensee - nur ein Katzensprung.</p>\n\n<p>Mehr Infos unter:&nbsp;<a href=\"http://www.lerchenhof.at\" target=\"_blank\">www.lerchenhof.at</a></p>\n","1","0","0"),
("2773","1","19","12","content","Input Meno","form_base_name","Vorname","1","0","0"),
("2774","1","19","12","content","Input Priezvisko","form_base_surname","Nachname","1","0","0"),
("2775","1","19","12","content","Input PSČ","form_base_psc","PLZ","1","0","0"),
("2776","1","19","12","content","Input Mesto","form_base_city","Stadt","1","0","0"),
("2777","1","19","12","content","Input Email","form_base_email","E-mail","1","0","0"),
("2778","1","19","12","content","Input Doklad","form_extend_v1_doklad","Einkaufsbeleg Nr:","0","0","0"),
("2779","1","19","12","content","Input Otázka + odpovede","form_extend_v3_otazka","Das Nassfeld ist das größte Skigebiet in Kärnten und zählt zu den TOP-10 Skigebieten in Österreich. Wie viele Pistenkilometer bietet das Nassfeld? ","0","0","0"),
("2780","1","19","12","content","Odpoveď A","form_extend_v3_odpoved_a","","0","0","0"),
("2781","1","19","12","content","Odpoveď B","form_extend_v3_odpoved_b","","0","0","0"),
("2782","1","19","12","content","Odpoveď C","form_extend_v3_odpoved_c","","0","0","0"),
("2783","1","19","4","content","Názov","field_word_nazov","Názov","0","0","0"),
("2784","1","19","4","content","Adresa","field_word_adresa","Adresa","0","0","0"),
("2785","1","19","4","content","Kontakt","field_word_kontakt","Kontakt","0","0","0"),
("2786","1","19","4","content","Web","field_word_web","Web","0","0","0"),
("2787","1","19","4","content","Hláška povinné pole","field_word_err","Pflichtfelder","1","0","0"),
("2788","1","19","4","content","Registrovať","field_word_sent","Teilnehmen","1","0","0"),
("2789","1","19","4","content","Predchádzajúca (fotka)","field_word_previous","Vorheriges","1","0","0"),
("2790","1","19","4","content","Ďalšia (fotka)","field_word_next","Nächstes","1","0","0"),
("2791","1","19","4","content","Súhlasím s newslettrom","field_word_suhlas_news","Ja, ich stimme zu den Newsletter vom Nassfeld und dem Biedermeier Schlössl Lerchenhof zu erhalten und meine Daten für weitere Marketingaktivitäten zur Verfügung zu stellen.","1","0","0"),
("2792","1","19","4","content","Súhlasím s podmienkami súťaže","field_word_suhlas_podm","Ja, ich stimme den Teilnahmebedingungen zu. (Teilnahmebedingungen HIER).","1","0","0"),
("2793","1","19","1","content","Kľúčové slová pre Google","keywords","Nassfeld-Pressegger See","1","0","0"),
("2794","1","19","1","content","Popis pre Google","description","This competition has a first ID","1","0","0"),
("2795","1","19","4","content","Súhlasím s podmienkami súťaže","field_word_dakujeme","Danke, Sie haben sich erfolgreich für das Gewinnspiel registriert.","1","0","0"),
("2796","1","19","12","image","Podmienky súťaže (PDF)","form_file_podmienky","340","1","0","0"),
("2797","1","19","12","image","Newsletter (PDF)","form_file_newsletter","107","0","0","0"),
("2798","1","19","4","content","Hláška možnosti novej registrácie","field_word_nova_registracia","Jetzt Freunde einladen!","1","0","0"),
("2799","1","19","13","content","Počet znakov vygenerovaného hashu","_email_conf_char","8","1","0","0"),
("2800","1","19","13","content","Hláška, súťažiacemu ktorá mu príde na email po registracii.","_email_conf_sent_text","Danke, Sie haben sich erfolgreich für das Gewinnspiel registriert. Wir wünschen Ihnen viel Erfolg bei der Verlosung!","1","0","0"),
("2801","1","19","12","content","Telefónne číslo","form_base_tel_c","Tel. Nr.","1","0","0"),
("2802","1","19","4","content","Hláška za hviezdičkou o povinných poliach","field_word_povinne_polia","","1","0","0"),
("2803","1","19","2","image","Fotka loga k modulu UBYTOVANIE","_menu_7_image_2_1","295","0","0","0"),
("2804","1","19","16","content","Názov hotelu 2","info_hotel_name_2","Sporthotel Falkenstein","0","0","0"),
("2805","1","19","16","content","Adresa Hotela 2","info_hotel_addr_2","Nikolaus-Gassner-Str. 79   <br/>   A - 5710 Kaprun","1","0","0"),
("2806","1","19","16","content","Telefón do hotela 2","info_hotel_tel_c_2","+43 6547 7122","1","0","0"),
("2807","1","19","16","content","Email hotelu 2","info_hotel_email_2","sporthotel@falkenstein.at","1","0","0"),
("2808","1","19","16","content","Text k modulu UBYTOVANIE 2","_menu_7_text_2","<p><strong>Das Falkenstein</strong></p>\n\n<p>Tady v Kaprunu a hotelu Falkenstein lze objevit spoustu vzru&scaron;uj&iacute;c&iacute;ch možnost&iacute; a z&aacute;bavy&nbsp;pro rodiny a děti. Každ&yacute; den může b&yacute;t spojen s nov&yacute;mi z&aacute;žitky a dojmy, ať už jde&nbsp;o zvl&aacute;&scaron;tn&iacute; rodinn&eacute; turistick&eacute; v&yacute;lety, čvacht&aacute;n&iacute; a klouz&aacute;n&iacute; v Tauern SPA Kaprun, v&yacute;let&nbsp;k alpsk&eacute; horsk&eacute; bobov&eacute; dr&aacute;ze &quot;Maisfiltzer&quot;, o n&aacute;v&scaron;těvu volnočasov&eacute;ho nebo n&aacute;rodn&iacute;ho&nbsp;parku nebo o mnoh&aacute; dal&scaron;&iacute; dobrodružstv&iacute; - z&aacute;bavě se nekladou ž&aacute;dn&eacute; hranice.</p>\n\n<p>V hotelu Falkenstein&nbsp;se nach&aacute;z&iacute; kromě&nbsp;prostorn&eacute;ho&nbsp;dětsk&eacute;ho hři&scaron;tě&nbsp;a dětsk&eacute; herny tak&eacute;&nbsp;velk&yacute; baz&eacute;n a najdete&nbsp;zde i&nbsp;chutnou&nbsp;Pinzgauerskou&nbsp;kuchyni s pestr&yacute;mi&nbsp;dětsk&yacute;mi menu&nbsp;- n&aacute;&scaron; maskot Falki&nbsp;se na v&aacute;s tě&scaron;&iacute;!</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n","1","0","0"),
("2809","1","19","17","content","Text k modulu UBYTOVANIE 3","_menu_7_text_3","<p><strong>Dovolen&aacute; v Zell am See je dovolenou s požitkem - v hotelu Tirolerhof!</strong></p>\n\n<p>Jezero, hory, ledovec a stylov&yacute;, rodinn&yacute; 4-hvězdičkov&yacute; hotel superior v Zell am See &ndash; to je ide&aacute;ln&iacute; kombinace pro va&scaron;i dovolenou v Zell am See, v l&eacute;tě i v zimě. Budete m&iacute;t v&yacute;hled na jezero Zeller See, hory Schmittenh&ouml;he a Kitzsteinhorn se v&scaron;emi rozmanit&yacute;mi sportovn&iacute;mi a rekreačn&iacute;mi možnostmi a budete h&yacute;čk&aacute;ni v b&aacute;ječn&eacute;m a mimoř&aacute;dn&eacute;m hotelu kulin&aacute;řsk&yacute;mi specialitami nejvy&scaron;&scaron;&iacute; kvality. Nebo str&aacute;v&iacute;te dovolenou spojenou s golfem v Salcburku, kde budete m&iacute;t v&yacute;hled na n&aacute;dhern&eacute; hory a jezero oblasti Zell am See-Kaprun. Nebo si užijete ve dvou n&aacute;dhern&eacute; apartm&aacute;ny v r&aacute;mci romantick&eacute; dovolen&eacute;. Nebo si poř&aacute;dně odpočinete s wellness a l&aacute;zeňskou nab&iacute;dkou vy&scaron;&scaron;&iacute; tř&iacute;dy a načerp&aacute;te novou energii. Takto může vypadat va&scaron;e dal&scaron;&iacute; rekreačn&iacute; dovolen&aacute; v hotelu Tirolerhof Zell am See - v srdci Salcburku. Wellness hotel, čtyřhvězdičkov&yacute; hotel superior, hotel pro hosty s pejsky, relaxačn&iacute; hotel - v&scaron;echny tyto př&iacute;vlastky si hotel Tirolerhof plně zaslouž&iacute;.</p>\n\n<p>&nbsp;</p>\n\n<p><strong>Prožijte nezapomenutelnou dovolenou v hotelu Tirolerhof!</strong></p>\n","0","0","0"),
("2810","1","19","17","content","Email hotelu 3","info_hotel_email_3","welcome@tirolerhof.co.at","0","0","0"),
("2811","1","19","17","content","Telefón do hotela 3","info_hotel_tel_c_3","+43(0)6542/772-0","0","0","0"),
("2812","1","19","17","content","Adresa Hotela 3","info_hotel_addr_3","Auerspergstrasse 5   <br/>   A - 5700 Zell am See","0","0","0"),
("2813","1","19","17","content","Názov hotelu 3","info_hotel_name_3","Hotel Tirolerhof ****S","0","0","0"),
("2814","1","19","16","image","Fotka loga k modulu UBYTOVANIE 2","_menu_7_image_1_2","66","1","0","0"),
("2815","1","19","16","image","Fotka k modulu UBYTOVANIE 2","_menu_7_image_2_2","65","0","0","0"),
("2816","1","19","17","image","Fotka loga k modulu UBYTOVANIE 3","_menu_7_image_1_3","51","0","0","0"),
("2817","1","19","17","image","Fotka k modulu UBYTOVANIE 3","_menu_7_image_2_3","56","0","0","0"),
("2818","1","19","2","content","Url adresa hotela 1","link_hotel_1","http://www.lerchenhof.at","1","0","0"),
("2819","1","19","16","content","Url adresa hotela 2","link_hotel_2","http://www.falkenstein.at","1","0","0"),
("2820","1","19","17","content","Url adresa hotela 3","link_hotel_3","http://www.tirolerhof.co.at/","0","0","0"),
("2821","1","19","9","image","Druhá fotka modulu pre modul GALÉRIA","_menu_5_gallery_1","38","1","0","0"),
("2822","1","19","5","image","Fotka v hlavnom slideri 2","_menu_1_image_2","354","1","0","0"),
("2823","1","19","4","content","Po ukončení registrácie","field_word_koniec_registracie","<p><span style=\"color:#FF0000\"><span style=\"font-size:22px\">Ospravedlňujeme sa, ale t&aacute;to s&uacute;ťaž už bola ukončen&aacute;.</span></span></p>\n\n<p><span style=\"font-size:18px\"><span style=\"color:#FF0000\">Gratulujeme v&yacute;hercovi</span></span></p>\n","0","0","0"),
("2824","1","19","11","content","Názov modulu pre modul O PARTNEROVI","_menu_name_8","O Partnerovi","0","0","0"),
("2825","1","19","15","content","Email partnera","info_partner_email","","0","0","0"),
("2826","1","19","15","content","Adresa partnera","info_partner_addr","","0","0","0"),
("2827","1","19","15","content","Názov partnera","info_partner_name","","0","0","0"),
("2828","1","19","15","content","Telefónne číslo na partnera","info_partner_tel_c","","0","0","0"),
("2829","1","19","11","content","Text k modulu O PARTNEROVI 1","_menu_8_text_1","","1","0","0"),
("2830","1","19","1","content","Jazyková mutácia pre Facebook","_language","de_DE","1","0","0"),
("2831","1","19","12","image","Newsletter 2 (PDF)","form_file_newsletter_2","68","0","0","0"),
("2832","1","19","4","content","Súhlasím s newslettrom 2","field_word_suhlas_news_2","News 2","1","0","0"),
("2833","1","19","18","content","Email hotelu 4","info_hotel_email_4","welcome@tirolerhof.co.at","0","0","0"),
("2834","1","19","18","content","Telefón do hotela 4","info_hotel_tel_c_4","+43(0)6542/772-0","0","0","0"),
("2835","1","19","18","content","Adresa Hotela 4","info_hotel_addr_4","Auerspergstrasse 5   <br/>   A - 5700 Zell am See","1","0","0"),
("2836","1","19","18","content","Názov hotelu 4","info_hotel_name_4","Hotel Tirolerhof ****S","0","0","0"),
("2837","1","19","18","image","Fotka loga k modulu UBYTOVANIE 4","_menu_7_image_1_4","","0","0","0"),
("2838","1","19","18","image","Fotka k modulu UBYTOVANIE 4","_menu_7_image_2_4","","1","0","0"),
("2839","1","19","18","content","Url adresa hotela 4","link_hotel_4","http://www.tirolerhof.co.at/","0","0","0"),
("2840","1","19","18","content","Text k modulu UBYTOVANIE 4","_menu_7_text_4","","0","0","0");
INSERT INTO dnt_microsites_composer VALUES
("2841","1","19","11","image","Fotka k modulu O PARTNEROVI","_menu_8_image_1","","0","0","0"),
("2842","1","19","1","content","Google Plus","social_google_plus","https://plus.google.com/116145647036787364210/about","1","0","0"),
("2843","1","19","12","content","Input Otázka","form_extend_v2_otazka","Das Nassfeld ist das größte Skigebiet in Kärnten und zählt zu den TOP-10 Skigebieten in Österreich. Wie viele Pistenkilometer bietet das Nassfeld? ","1","0","0"),
("2844","1","19","13","content","Odoslať potvrdzovací email","sent_confirm_mail","1","1","0","0"),
("2845","1","19","12","content","Voliteľný parameter 1","form_base_custom_1","","0","0","0"),
("2846","1","20","1","content","Template","layout","dnt_first","1","0","0"),
("2847","1","20","15","content","Link partnera","link_partner","https://www.intersport.at","1","0","0"),
("2848","1","20","3","content","Link regionu","link_region","http://www.flachau.com","1","0","0"),
("2849","1","20","1","content","Zobraziť na URL adrese","real_address","http://www.vyhrat.com/","1","0","0"),
("2850","1","20","1","content","Facebook","social_fb","https://www.facebook.com/intersportAT","1","0","0"),
("2851","1","20","1","content","Twitter","social_twitter","https://twitter.com/intersportAT","1","0","0"),
("2852","1","20","1","content","Instagram","social_linked_in","https://www.instagram.com/visitflachau/","1","0","0"),
("2853","1","20","1","content","Mapa ","map_location","https://www.google.at/maps/place/5542+Flachau/@47.3429728,13.3547395,13z/data=!3m1!4b1!4m5!3m4!1s0x47712ab04865dc3b:0x40097572de661f0!8m2!3d47.3414833!4d13.3909059","1","0","0"),
("2854","1","20","1","image","Favicon","favicon","57","1","0","0"),
("2855","1","20","1","content","Model farby R","_r","40","1","0","0"),
("2856","1","20","1","content","Model farby G","_g","70","1","0","0"),
("2857","1","20","1","content","Model farby B","_b","150","1","0","0"),
("2858","1","20","1","content","Font","_font","roboto","1","0","0"),
("2859","1","20","2","content","Názov hotelu 1","info_hotel_name_1","Biedermeier Schloss Lerchenhof","0","0","0"),
("2860","1","20","2","content","Adresa Hotela 1","info_hotel_addr_1","9620 Untermöschach 8   <br/>   AT - 9620 Hermagor","1","0","0"),
("2861","1","20","2","content","Telefón do hotela 1","info_hotel_tel_c_1","+43 4282 2100","1","0","0"),
("2862","1","20","2","content","Email hotelu 1","info_hotel_email_1","info@lerchenhof.at","1","0","0"),
("2863","1","20","3","content","Názov regiónu","info_region_name","Flachau Tourismus","1","0","0"),
("2864","1","20","3","content","Adresa regiónu","info_region_addr","Hermann-Maier-Platz 1  <br/>  A - 5542 Flachau","1","0","0"),
("2865","1","20","3","content","Telefónne číslo regiónu","info_region_tel_c","+43 (0) 6457 22 14","1","0","0"),
("2866","1","20","3","content","Email regiónu","info_region_email","info@flachau.com","1","0","0"),
("2867","1","20","1","content","Youtube video","youtube_video","IuvjGIDs3Dk","1","0","0"),
("2868","1","20","15","image","Logo partnera","partner_logo","350","1","0","0"),
("2869","1","20","3","image","Logo regiónu","region_logo","347","1","0","0"),
("2870","1","20","5","image","Fotka v hlavnom slideri 1","_menu_1_image_1","345","1","0","0"),
("2871","1","20","7","image","Fotka modulu pre modul GALÉRIA","_menu_3_image_1","351","1","0","0"),
("2872","1","20","7","image","Druhá fotka modulu pre modul GALÉRIA","_menu_3_image_2","352","1","0","0"),
("2873","1","20","2","image","Fotka k modulu UBYTOVANIE","_menu_7_image_1_1","342","1","0","0"),
("2874","1","20","5","content","Názov modulu pre modul INFO","_menu_name_1","Intro","1","0","0"),
("2875","1","20","6","content","Názov modulu pre modul O SÚŤAŽI","_menu_name_2","Gewinnspiel","1","1","0"),
("2876","1","20","7","content","Názov modulu pre modul GALÉRIU","_menu_name_3","Galérie","0","0","0"),
("2877","1","20","8","content","Názov modulu pre modul FORMULÁRU","_menu_name_4","Teilnahme","1","2","0"),
("2878","1","20","9","content","Názov modulu pre modul O REGIONE","_menu_name_5","Flachau","1","3","0"),
("2879","1","20","10","content","Názov modulu pre modul MAPA","_menu_name_6","Mapa","0","0","0"),
("2880","1","20","11","content","Názov modulu pre modul UBYTOVANIE","_menu_name_7","Teilnehmendes Hotel","0","0","0"),
("2881","1","20","5","content","Text k modulu INFO","_menu_1_text_1","<p><span style=\"font-size:26px\"><span style=\"color:#F0F8FF\"><strong>Gewinne jetzt einen von 5 Winterurlauben in&nbsp;Flachau!</strong></span></span></p>\n","1","0","0"),
("2882","1","20","6","content","Text k modulu O SÚŤAŽI","_menu_2_text_1","<p style=\"text-align:center\"><span style=\"font-size:20px\"><strong>Wir verlosen 5 Skiurlaube in&nbsp;Flachau!</strong><br />\nEinfach Teilnahmeformular ausf&uuml;llen und schon spielst Du mit um einen unvergesslichen Winterurlaub!</span></p>\n\n<p style=\"text-align:center\"><br />\n<span style=\"font-size:18px\">Die Kampagne l&auml;uft von 18.01.2017 bis 25.02.2017.</span></p>\n\n<p style=\"text-align:center\"><span style=\"font-size:18px\">Das gibt es zu gewinnen:<br />\n<strong>5 Winterurlaube f&uuml;r 2 Personen im Doppelzimmer &agrave; 3 N&auml;chte in einem 3- oder 4* Hotel inkl. Halbpension und 2-Tages-Skip&auml;ssen</strong></span></p>\n\n<p style=\"text-align:center\"><span style=\"font-size:14px\">G&uuml;ltigkeit der Gutscheine: Februar, M&auml;rz, April 2017 &ndash; auf Anfrage nach Verf&uuml;gbarkeit.</span></p>\n","1","0","0"),
("2883","1","20","7","content","Text k modulu GALÉRIA","_menu_3_text_1","","0","0","0"),
("2884","1","20","8","content","Text k modulu FORMULÁR","_menu_4_text_1","<p>Ihre Registrierung:&nbsp;</p>\n","1","0","0"),
("2885","1","20","9","content","Text k modulu O REGIÓNE","_menu_5_text_1","<p><strong>Flachau &ndash; Am Gipfel der Gaudi</strong><br />\nWer Ski- und Winterurlaub mag, der wird Flachau lieben: Ambitionierte Wintersportler, Genuss-Skifahrer, Freerider, Wiedereinsteiger und Skizwergerl kommen in der Heimat von Doppel-Olympiasieger Hermann Maier voll auf ihre Kosten. Flachau bildet das Herzst&uuml;ck von Ski amad&eacute;, dem gr&ouml;&szlig;ten Skiverbund &Ouml;sterreichs: Mit seinem breiten Pistenangebot f&uuml;r alle K&ouml;nnerstufen, seinen international bekannten Snowparks, sechs Skischulen, zahlreichen Skih&uuml;tten und einem abwechslungsreichen Hotel- und Freizeitangebot erf&uuml;llt der Wintersportort alle Anspr&uuml;che an ein vollkommenes Ski- und Snowboardvergn&uuml;gen. Ebenso legend&auml;r ist das Apr&egrave;s-Ski: Gefeiert werden der Augenblick und das Leben. Die Gaudi kommt dabei nicht zu kurz &ndash; ein Versprechen, das wir geben und halten!</p>\n\n<p><strong>Flachau &ndash; live dabei in Ski amad&eacute;</strong><br />\nFlachau z&auml;hlt seit Jahrzehnten zu den Vorreitern und Top-Skigebieten in den Alpen. Inmitten von Ski amad&eacute;, &Ouml;sterreichs gr&ouml;&szlig;tem Skivergn&uuml;gen mit 760 Pistenkilometern und 270 Liftanlagen, kommen Urlauber in den Genuss von Wintersport auf h&ouml;chstem Niveau: Bestens pr&auml;parierte Pisten, fl&auml;chendeckende Beschneiungsanlagen, modernste Bergbahnen sowie weit &uuml;ber die Grenzen hinaus bekannte Snowparks sind Teil des breiten Angebots von Flachau. Hier wird Wintersport in all seinen Facetten gelebt!</p>\n","1","0","0"),
("2886","1","20","9","content","Ďalší text k modulu O REGIÓNE","_menu_5_text_2","<p><strong>Mit dem Fatbike, im Lucky Flitzer und in der Looping-Rutsche</strong><br />\nNeben dem breiten Ski- und Snowboardangebot er&ouml;ffnen sich in Flachau zahlreiche M&ouml;glichkeiten, auch abseits der Piste Neues auszuprobieren. Viele Funsportarten funktionieren auch auf Schnee: So etwa geht&rsquo;s mit dem Segway oder mit dem Fatbike durch die winterliche Landschaft rund um Flachau. Wem das zu langsam ist, der schwingt sich auf ein Snowbike oder auf einen Schlitten: Vier beleuchtete Rodelbahnen versprechen jede Menge Spa&szlig; auf Kufen. Rasant ins Tal geht&rsquo;s mit der Alpen-Achterbahn &bdquo;Lucky Flitzer&ldquo; &ndash; dank Flutlicht auch am Abend. Ein besonders romantisches Erlebnis ist hingegen eine Schneeschuhwanderung. Wer den ganzen Tag im Freien verbracht hat, der freut sich auf wohlig-warme Genussmomente im Wasser: Die nahe gelegene Therme Amad&eacute; mit elf Becken, weitl&auml;ufigem Saunabereich und zahlreichen Rutschen sorgt f&uuml;r jede Menge Spa&szlig;, aber auch ganzheitliche Entspannung.</p>\n\n<p><strong>Von der Autobahn direkt ins Skigebiet</strong><br />\nDie Anreise nach Flachau ist einfach, denn Flachau liegt direkt an der A10 - sowohl Flachau als auch Flachauwinkl verf&uuml;gen &uuml;ber eigene Autobahnausfahrten!<br />\nMehr Infos unter<span style=\"font-family:arial,helvetica,sans-serif\">:&nbsp;</span><strong><a href=\"http://www.flachau.com\" target=\"_blank\">www.flachau.com</a></strong></p>\n\n<p>&nbsp;</p>\n","1","0","0"),
("2887","1","20","10","content","Text k modulu MAPA","_menu_6_text_1","<p>Mapa regionu</p>\n","0","0","0"),
("2888","1","20","2","content","Text k modulu UBYTOVANIE 1","_menu_7_text_1","<p><strong>Winterurlaub in K&auml;rnten &ndash; Lust auf Skifahren am Nassfeld</strong></p>\n\n<p>Das <strong>Biedermeier Schl&ouml;ssl Lerchenhof</strong> wurde 1848 auf dem wundersch&ouml;nen Sonnenplateau &uuml;ber Hermagor als Herrensitz erbaut. Das st&auml;ndig renovierte kleine Schlosshotel liegt im Herzen der Urlaubsdestination Nassfeld-Pressegger See.</p>\n\n<p>Leidenschaftlich und famili&auml;r &ndash; begegnen sich G&auml;ste und Gastgeber. Liebevoll und individuell gestaltete Zimmer mit royalem Schlafkomfort. Duftender Gl&uuml;hmost bei romantischem Lagerfeuer ist ein Vorbote f&uuml;r den Abend bei Tisch.<br />\nGenuss mit Raffinesse aus hofeigener Produktion &ndash; gelebte Handarbeit</p>\n\n<p>Zum Skilift sind es nur 10 Min. mit dem Gratisbus. Langlaufen, Winter- &amp; Schneeschuhwandern oder Naturrodeln - direkt vor dem Schlosstor.<br />\nZum Eislauferlebnis am Wei&szlig;ensee - nur ein Katzensprung.</p>\n\n<p>Mehr Infos unter:&nbsp;<a href=\"http://www.lerchenhof.at\" target=\"_blank\">www.lerchenhof.at</a></p>\n","1","0","0"),
("2889","1","20","12","content","Input Meno","form_base_name","Vorname","1","0","0"),
("2890","1","20","12","content","Input Priezvisko","form_base_surname","Nachname","1","0","0"),
("2891","1","20","12","content","Input PSČ","form_base_psc","PLZ","1","0","0"),
("2892","1","20","12","content","Input Mesto","form_base_city","Stadt","1","0","0"),
("2893","1","20","12","content","Input Email","form_base_email","E-mail","1","0","0"),
("2894","1","20","12","content","Input Doklad","form_extend_v1_doklad","Rechnungsnummer","0","0","0"),
("2895","1","20","12","content","Input Otázka + odpovede","form_extend_v3_otazka","Wie viele Pistenkilometer gibt es in Ski amadé?","1","0","0"),
("2896","1","20","12","content","Odpoveď A","form_extend_v3_odpoved_a","450 km","1","0","0"),
("2897","1","20","12","content","Odpoveď B","form_extend_v3_odpoved_b","670 km","1","0","0"),
("2898","1","20","12","content","Odpoveď C","form_extend_v3_odpoved_c","760 km","1","0","0"),
("2899","1","20","4","content","Názov","field_word_nazov","Názov","0","0","0"),
("2900","1","20","4","content","Adresa","field_word_adresa","Adresa","0","0","0"),
("2901","1","20","4","content","Kontakt","field_word_kontakt","Kontakt","0","0","0"),
("2902","1","20","4","content","Web","field_word_web","Web","0","0","0"),
("2903","1","20","4","content","Hláška povinné pole","field_word_err","Pflichtfelder","1","0","0"),
("2904","1","20","4","content","Registrovať","field_word_sent","Teilnehmen","1","0","0"),
("2905","1","20","4","content","Predchádzajúca (fotka)","field_word_previous","Vorheriges","1","0","0"),
("2906","1","20","4","content","Ďalšia (fotka)","field_word_next","Nächstes","1","0","0"),
("2907","1","20","4","content","Súhlasím s newslettrom","field_word_suhlas_news","Ja, ich stimme zu den Newsletter von Flachau Tourismus zu erhalten und meine Daten für weitere Marketingaktivitäten zur Verfügung zu stellen.","1","0","0"),
("2908","1","20","4","content","Súhlasím s podmienkami súťaže","field_word_suhlas_podm","Ja, ich stimme den Teilnahmebedingungen zu. (Teilnahmebedingungen HIER).","1","0","0"),
("2909","1","20","1","content","Kľúčové slová pre Google","keywords","Flachau Tourismus","1","0","0"),
("2910","1","20","1","content","Popis pre Google","description","This competition has a first ID","1","0","0"),
("2911","1","20","4","content","Súhlasím s podmienkami súťaže","field_word_dakujeme","Danke, Sie haben sich erfolgreich für das Gewinnspiel registriert.","1","0","0"),
("2912","1","20","12","image","Podmienky súťaže (PDF)","form_file_podmienky","390","1","0","0"),
("2913","1","20","12","image","Newsletter (PDF)","form_file_newsletter","107","0","0","0"),
("2914","1","20","4","content","Hláška možnosti novej registrácie","field_word_nova_registracia","Jetzt Freunde einladen!","1","0","0"),
("2915","1","20","13","content","Počet znakov vygenerovaného hashu","_email_conf_char","8","1","0","0"),
("2916","1","20","13","content","Hláška, súťažiacemu ktorá mu príde na email po registracii.","_email_conf_sent_text","Danke, Sie haben sich erfolgreich für das Gewinnspiel registriert. Wir wünschen Ihnen viel Erfolg bei der Verlosung!","1","0","0"),
("2917","1","20","12","content","Telefónne číslo","form_base_tel_c","Tel. Nr.","1","0","0"),
("2918","1","20","4","content","Hláška za hviezdičkou o povinných poliach","field_word_povinne_polia","","1","0","0"),
("2919","1","20","2","image","Fotka loga k modulu UBYTOVANIE","_menu_7_image_2_1","295","0","0","0"),
("2920","1","20","16","content","Názov hotelu 2","info_hotel_name_2","Sporthotel Falkenstein","0","0","0"),
("2921","1","20","16","content","Adresa Hotela 2","info_hotel_addr_2","Nikolaus-Gassner-Str. 79   <br/>   A - 5710 Kaprun","1","0","0"),
("2922","1","20","16","content","Telefón do hotela 2","info_hotel_tel_c_2","+43 6547 7122","1","0","0"),
("2923","1","20","16","content","Email hotelu 2","info_hotel_email_2","sporthotel@falkenstein.at","1","0","0"),
("2924","1","20","16","content","Text k modulu UBYTOVANIE 2","_menu_7_text_2","<p><strong>Das Falkenstein</strong></p>\n\n<p>Tady v Kaprunu a hotelu Falkenstein lze objevit spoustu vzru&scaron;uj&iacute;c&iacute;ch možnost&iacute; a z&aacute;bavy&nbsp;pro rodiny a děti. Každ&yacute; den může b&yacute;t spojen s nov&yacute;mi z&aacute;žitky a dojmy, ať už jde&nbsp;o zvl&aacute;&scaron;tn&iacute; rodinn&eacute; turistick&eacute; v&yacute;lety, čvacht&aacute;n&iacute; a klouz&aacute;n&iacute; v Tauern SPA Kaprun, v&yacute;let&nbsp;k alpsk&eacute; horsk&eacute; bobov&eacute; dr&aacute;ze &quot;Maisfiltzer&quot;, o n&aacute;v&scaron;těvu volnočasov&eacute;ho nebo n&aacute;rodn&iacute;ho&nbsp;parku nebo o mnoh&aacute; dal&scaron;&iacute; dobrodružstv&iacute; - z&aacute;bavě se nekladou ž&aacute;dn&eacute; hranice.</p>\n\n<p>V hotelu Falkenstein&nbsp;se nach&aacute;z&iacute; kromě&nbsp;prostorn&eacute;ho&nbsp;dětsk&eacute;ho hři&scaron;tě&nbsp;a dětsk&eacute; herny tak&eacute;&nbsp;velk&yacute; baz&eacute;n a najdete&nbsp;zde i&nbsp;chutnou&nbsp;Pinzgauerskou&nbsp;kuchyni s pestr&yacute;mi&nbsp;dětsk&yacute;mi menu&nbsp;- n&aacute;&scaron; maskot Falki&nbsp;se na v&aacute;s tě&scaron;&iacute;!</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n","1","0","0"),
("2925","1","20","17","content","Text k modulu UBYTOVANIE 3","_menu_7_text_3","<p><strong>Dovolen&aacute; v Zell am See je dovolenou s požitkem - v hotelu Tirolerhof!</strong></p>\n\n<p>Jezero, hory, ledovec a stylov&yacute;, rodinn&yacute; 4-hvězdičkov&yacute; hotel superior v Zell am See &ndash; to je ide&aacute;ln&iacute; kombinace pro va&scaron;i dovolenou v Zell am See, v l&eacute;tě i v zimě. Budete m&iacute;t v&yacute;hled na jezero Zeller See, hory Schmittenh&ouml;he a Kitzsteinhorn se v&scaron;emi rozmanit&yacute;mi sportovn&iacute;mi a rekreačn&iacute;mi možnostmi a budete h&yacute;čk&aacute;ni v b&aacute;ječn&eacute;m a mimoř&aacute;dn&eacute;m hotelu kulin&aacute;řsk&yacute;mi specialitami nejvy&scaron;&scaron;&iacute; kvality. Nebo str&aacute;v&iacute;te dovolenou spojenou s golfem v Salcburku, kde budete m&iacute;t v&yacute;hled na n&aacute;dhern&eacute; hory a jezero oblasti Zell am See-Kaprun. Nebo si užijete ve dvou n&aacute;dhern&eacute; apartm&aacute;ny v r&aacute;mci romantick&eacute; dovolen&eacute;. Nebo si poř&aacute;dně odpočinete s wellness a l&aacute;zeňskou nab&iacute;dkou vy&scaron;&scaron;&iacute; tř&iacute;dy a načerp&aacute;te novou energii. Takto může vypadat va&scaron;e dal&scaron;&iacute; rekreačn&iacute; dovolen&aacute; v hotelu Tirolerhof Zell am See - v srdci Salcburku. Wellness hotel, čtyřhvězdičkov&yacute; hotel superior, hotel pro hosty s pejsky, relaxačn&iacute; hotel - v&scaron;echny tyto př&iacute;vlastky si hotel Tirolerhof plně zaslouž&iacute;.</p>\n\n<p>&nbsp;</p>\n\n<p><strong>Prožijte nezapomenutelnou dovolenou v hotelu Tirolerhof!</strong></p>\n","0","0","0"),
("2926","1","20","17","content","Email hotelu 3","info_hotel_email_3","welcome@tirolerhof.co.at","0","0","0"),
("2927","1","20","17","content","Telefón do hotela 3","info_hotel_tel_c_3","+43(0)6542/772-0","0","0","0"),
("2928","1","20","17","content","Adresa Hotela 3","info_hotel_addr_3","Auerspergstrasse 5   <br/>   A - 5700 Zell am See","0","0","0"),
("2929","1","20","17","content","Názov hotelu 3","info_hotel_name_3","Hotel Tirolerhof ****S","0","0","0"),
("2930","1","20","16","image","Fotka loga k modulu UBYTOVANIE 2","_menu_7_image_1_2","66","1","0","0"),
("2931","1","20","16","image","Fotka k modulu UBYTOVANIE 2","_menu_7_image_2_2","65","0","0","0"),
("2932","1","20","17","image","Fotka loga k modulu UBYTOVANIE 3","_menu_7_image_1_3","51","0","0","0"),
("2933","1","20","17","image","Fotka k modulu UBYTOVANIE 3","_menu_7_image_2_3","56","0","0","0"),
("2934","1","20","2","content","Url adresa hotela 1","link_hotel_1","http://www.lerchenhof.at","1","0","0"),
("2935","1","20","16","content","Url adresa hotela 2","link_hotel_2","http://www.falkenstein.at","1","0","0"),
("2936","1","20","17","content","Url adresa hotela 3","link_hotel_3","http://www.tirolerhof.co.at/","0","0","0"),
("2937","1","20","9","image","Druhá fotka modulu pre modul GALÉRIA","_menu_5_gallery_1","39","1","0","0"),
("2938","1","20","5","image","Fotka v hlavnom slideri 2","_menu_1_image_2","346","1","0","0"),
("2939","1","20","4","content","Po ukončení registrácie","field_word_koniec_registracie","<p><span style=\"color:#FF0000\"><span style=\"font-size:22px\">Ospravedlňujeme sa, ale t&aacute;to s&uacute;ťaž už bola ukončen&aacute;.</span></span></p>\n\n<p><span style=\"font-size:18px\"><span style=\"color:#FF0000\">Gratulujeme v&yacute;hercovi</span></span></p>\n","0","0","0"),
("2940","1","20","11","content","Názov modulu pre modul O PARTNEROVI","_menu_name_8","O Partnerovi","0","0","0");
INSERT INTO dnt_microsites_composer VALUES
("2941","1","20","15","content","Email partnera","info_partner_email","","0","0","0"),
("2942","1","20","15","content","Adresa partnera","info_partner_addr","","0","0","0"),
("2943","1","20","15","content","Názov partnera","info_partner_name","","0","0","0"),
("2944","1","20","15","content","Telefónne číslo na partnera","info_partner_tel_c","","0","0","0"),
("2945","1","20","11","content","Text k modulu O PARTNEROVI 1","_menu_8_text_1","","1","0","0"),
("2946","1","20","1","content","Jazyková mutácia pre Facebook","_language","de_DE","1","0","0"),
("2947","1","20","12","image","Newsletter 2 (PDF)","form_file_newsletter_2","68","0","0","0"),
("2948","1","20","4","content","Súhlasím s newslettrom 2","field_word_suhlas_news_2","News 2","1","0","0"),
("2949","1","20","18","content","Email hotelu 4","info_hotel_email_4","welcome@tirolerhof.co.at","0","0","0"),
("2950","1","20","18","content","Telefón do hotela 4","info_hotel_tel_c_4","+43(0)6542/772-0","0","0","0"),
("2951","1","20","18","content","Adresa Hotela 4","info_hotel_addr_4","Auerspergstrasse 5   <br/>   A - 5700 Zell am See","1","0","0"),
("2952","1","20","18","content","Názov hotelu 4","info_hotel_name_4","Hotel Tirolerhof ****S","0","0","0"),
("2953","1","20","18","image","Fotka loga k modulu UBYTOVANIE 4","_menu_7_image_1_4","","0","0","0"),
("2954","1","20","18","image","Fotka k modulu UBYTOVANIE 4","_menu_7_image_2_4","","1","0","0"),
("2955","1","20","18","content","Url adresa hotela 4","link_hotel_4","http://www.tirolerhof.co.at/","0","0","0"),
("2956","1","20","18","content","Text k modulu UBYTOVANIE 4","_menu_7_text_4","","0","0","0"),
("2957","1","20","11","image","Fotka k modulu O PARTNEROVI","_menu_8_image_1","","0","0","0"),
("2958","1","20","1","content","Google Plus","social_google_plus","https://plus.google.com/+flachau","1","0","0"),
("2959","1","20","12","content","Input Otázka","form_extend_v2_otazka","","0","0","0"),
("2960","1","20","13","content","Odoslať potvrdzovací email","sent_confirm_mail","1","1","0","0"),
("2961","1","20","12","content","Voliteľný parameter 1","form_base_custom_1","","0","0","0"),
("2962","1","21","1","content","Template","layout","dnt_first","1","0","0"),
("2963","1","21","15","content","Link partnera","link_partner","https://www.sport-bittl.com/","1","0","0"),
("2964","1","21","3","content","Link regionu","link_region","https://www.skijuwel.com","1","0","0"),
("2965","1","21","1","content","Zobraziť na URL adrese","real_address","http://www.vyhrat.com/","1","0","0"),
("2966","1","21","1","content","Facebook","social_fb","https://www.facebook.com/skijuwel","1","0","0"),
("2967","1","21","1","content","Twitter","social_twitter","https://twitter.com/sport_bittl","1","0","0"),
("2968","1","21","1","content","Instagram","social_linked_in","https://www.instagram.com/sportbittl/","1","0","0"),
("2969","1","21","1","content","Mapa ","map_location","https://www.google.at/maps/search/Ski+Juwel+Alpbachtal+Wildsch%C3%B6nau/@47.3930552,11.9562734,13z/data=!3m1!4b1","1","0","0"),
("2970","1","21","1","image","Favicon","favicon","57","1","0","0"),
("2971","1","21","1","content","Model farby R","_r","0","1","0","0"),
("2972","1","21","1","content","Model farby G","_g","140","1","0","0"),
("2973","1","21","1","content","Model farby B","_b","210","1","0","0"),
("2974","1","21","1","content","Font","_font","roboto","1","0","0"),
("2975","1","21","2","content","Názov hotelu 1","info_hotel_name_1","Biedermeier Schloss Lerchenhof","0","0","0"),
("2976","1","21","2","content","Adresa Hotela 1","info_hotel_addr_1","9620 Untermöschach 8   <br/>   AT - 9620 Hermagor","1","0","0"),
("2977","1","21","2","content","Telefón do hotela 1","info_hotel_tel_c_1","+43 4282 2100","1","0","0"),
("2978","1","21","2","content","Email hotelu 1","info_hotel_email_1","info@lerchenhof.at","1","0","0"),
("2979","1","21","3","content","Názov regiónu","info_region_name","Ski Juwel Alpbachtal Wildschönau","1","0","0"),
("2980","1","21","3","content","Adresa regiónu","info_region_addr","Hnr. 311, A-6236 Alpbach / Tirol  <br/>  Auffach 273, A-6313 Wildschönau/Tirol ","1","0","0"),
("2981","1","21","3","content","Telefónne číslo regiónu","info_region_tel_c","+43 5337 21200 (Alpbachtal)  <br/>  +43 5339 8255 (Wildschönau)","1","0","0"),
("2982","1","21","3","content","Email regiónu","info_region_email","info@skijuwel.com","1","0","0"),
("2983","1","21","1","content","Youtube video","youtube_video","gzlZdK-rqGk","1","0","0"),
("2984","1","21","15","image","Logo partnera","partner_logo","362","1","0","0"),
("2985","1","21","3","image","Logo regiónu","region_logo","359","1","0","0"),
("2986","1","21","5","image","Fotka v hlavnom slideri 1","_menu_1_image_1","355","1","0","0"),
("2987","1","21","7","image","Fotka modulu pre modul GALÉRIA","_menu_3_image_1","368","1","0","0"),
("2988","1","21","7","image","Druhá fotka modulu pre modul GALÉRIA","_menu_3_image_2","369","1","0","0"),
("2989","1","21","2","image","Fotka k modulu UBYTOVANIE","_menu_7_image_1_1","342","1","0","0"),
("2990","1","21","5","content","Názov modulu pre modul INFO","_menu_name_1","Intro","1","0","0"),
("2991","1","21","6","content","Názov modulu pre modul O SÚŤAŽI","_menu_name_2","Wiedereinsteigertage in Tirol","1","1","0"),
("2992","1","21","7","content","Názov modulu pre modul GALÉRIU","_menu_name_3","Galérie","0","0","0"),
("2993","1","21","8","content","Názov modulu pre modul FORMULÁRU","_menu_name_4","Teilnahme","1","2","0"),
("2994","1","21","9","content","Názov modulu pre modul O REGIONE","_menu_name_5","Ski Juwel","1","3","0"),
("2995","1","21","10","content","Názov modulu pre modul MAPA","_menu_name_6","Mapa","0","0","0"),
("2996","1","21","11","content","Názov modulu pre modul UBYTOVANIE","_menu_name_7","Teilnehmendes Hotel","0","0","0"),
("2997","1","21","5","content","Text k modulu INFO","_menu_1_text_1","<p><strong><span style=\"color:#F0F8FF\"><span style=\"font-size:26px\">Wiedereinsteigertage in Tirol - Jetzt anmelden!</span></span></strong></p>\n","1","0","0"),
("2998","1","21","6","content","Text k modulu O SÚŤAŽI","_menu_2_text_1","<p><span style=\"font-size:18px\"><strong>Ski Juwel Alpbachtal Wildsch&ouml;nau in Tirol &ndash; Back in Love with the Mountains!</strong><br />\nStarte jetzt im Skigebiet Ski Juwel Alpbachtal Wildsch&ouml;nau in die Skisaison, frische deine Skikenntnisse auf und erlebe perfekten Pistenspa&szlig;. Breite Pisten und sanfte H&auml;nge sind ideal, um in aller Ruhe Sicherheit zu gewinnen und man hat ausreichend Platz, um die eigene Ideallinie zu finden und zu fahren. Das Ski Juwel Alpbachtal Wildsch&ouml;nau z&auml;hlt mit seinen 109 Pistenkilometern zu den 10 gr&ouml;&szlig;ten Skigebieten Tirols.</span></p>\n\n<p><span style=\"font-size:16px\">&bull;&nbsp; Wiedereinsteigertage: Ein Ski Juwel-Guide zeigt am 21. &amp; 22. J&auml;nner die besten Pisten und gibt Tipps f&uuml;r den perfekten Schwung &amp; eine sichere Technik<br />\n&bull;&nbsp; -10/% auf die Tagesskip&auml;sse an diesem Wochenende f&uuml;r alle Bittl Kunden. Mit dem Codewort &bdquo;Bittl&ldquo; an allen Kassen des Ski Juwel Alpbachtal Wildsch&ouml;nau erh&auml;ltlich</span><br />\n<br />\n<span style=\"font-size:18px\"><strong>Jetzt anmelden!&nbsp;</strong>Anmeldung bis 17. J&auml;nner 2017 m&ouml;glich.</span><br />\n&nbsp;</p>\n","1","0","0"),
("2999","1","21","7","content","Text k modulu GALÉRIA","_menu_3_text_1","","0","0","0"),
("3000","1","21","8","content","Text k modulu FORMULÁR","_menu_4_text_1","<p>Ihre Registrierung:&nbsp;</p>\n","1","0","0"),
("3001","1","21","9","content","Text k modulu O REGIÓNE","_menu_5_text_1","<p><span style=\"font-size:16px\"><strong>Ski Juwel Alpbachtal Wildsch&ouml;nau&nbsp;</strong></span><br />\n<span style=\"font-size:16px\">Schneesicherheit und Komfort in den Tiroler Alpen</span></p>\n\n<p>&bull; 109 Pistenkilometer: 26 km leicht, 54 km mittel, 13 km schwer, 16 km Skirouten</p>\n","1","0","0"),
("3002","1","21","9","content","Ďalší text k modulu O REGIÓNE","_menu_5_text_2","<p>&nbsp;</p>\n\n<p>&bull; 46 Liftanlagen: 8 Gondelbahnen, 7 Sesselbahnen, 31 Schlepplifte, 1 F&ouml;rderband</p>\n\n<p>Mehr Infos unter:&nbsp;<strong><a href=\"http://www.skijuwel.com\" target=\"_blank\">www.skijuwel.com</a></strong></p>\n","1","0","0"),
("3003","1","21","10","content","Text k modulu MAPA","_menu_6_text_1","<p>Mapa regionu</p>\n","0","0","0"),
("3004","1","21","2","content","Text k modulu UBYTOVANIE 1","_menu_7_text_1","<p><strong>Winterurlaub in K&auml;rnten &ndash; Lust auf Skifahren am Nassfeld</strong></p>\n\n<p>Das <strong>Biedermeier Schl&ouml;ssl Lerchenhof</strong> wurde 1848 auf dem wundersch&ouml;nen Sonnenplateau &uuml;ber Hermagor als Herrensitz erbaut. Das st&auml;ndig renovierte kleine Schlosshotel liegt im Herzen der Urlaubsdestination Nassfeld-Pressegger See.</p>\n\n<p>Leidenschaftlich und famili&auml;r &ndash; begegnen sich G&auml;ste und Gastgeber. Liebevoll und individuell gestaltete Zimmer mit royalem Schlafkomfort. Duftender Gl&uuml;hmost bei romantischem Lagerfeuer ist ein Vorbote f&uuml;r den Abend bei Tisch.<br />\nGenuss mit Raffinesse aus hofeigener Produktion &ndash; gelebte Handarbeit</p>\n\n<p>Zum Skilift sind es nur 10 Min. mit dem Gratisbus. Langlaufen, Winter- &amp; Schneeschuhwandern oder Naturrodeln - direkt vor dem Schlosstor.<br />\nZum Eislauferlebnis am Wei&szlig;ensee - nur ein Katzensprung.</p>\n\n<p>Mehr Infos unter:&nbsp;<a href=\"http://www.lerchenhof.at\" target=\"_blank\">www.lerchenhof.at</a></p>\n","1","0","0"),
("3005","1","21","12","content","Input Meno","form_base_name","Vorname","1","0","0"),
("3006","1","21","12","content","Input Priezvisko","form_base_surname","Nachname","1","0","0"),
("3007","1","21","12","content","Input PSČ","form_base_psc","","0","0","0"),
("3008","1","21","12","content","Input Mesto","form_base_city","","0","0","0"),
("3009","1","21","12","content","Input Email","form_base_email","E-mail","1","0","0"),
("3010","1","21","12","content","Input Doklad","form_extend_v1_doklad","","0","0","0"),
("3011","1","21","12","content","Input Otázka + odpovede","form_extend_v3_otazka","Ja, ich möchte mit einem Ski Juwel-Guide gerne die besten Pisten des Ski Juwel Alpbachtal Wildschönau erleben. Ich nehme Teil am: ","1","0","0"),
("3012","1","21","12","content","Odpoveď A","form_extend_v3_odpoved_a","21. Jänner 2017","1","0","0"),
("3013","1","21","12","content","Odpoveď B","form_extend_v3_odpoved_b","22. Jänner 2017","1","0","0"),
("3014","1","21","12","content","Odpoveď C","form_extend_v3_odpoved_c","21. und 22. Jänner 2017","1","0","0"),
("3015","1","21","4","content","Názov","field_word_nazov","Názov","0","0","0"),
("3016","1","21","4","content","Adresa","field_word_adresa","Adresa","0","0","0"),
("3017","1","21","4","content","Kontakt","field_word_kontakt","Kontakt","0","0","0"),
("3018","1","21","4","content","Web","field_word_web","Web","0","0","0"),
("3019","1","21","4","content","Hláška povinné pole","field_word_err","Pflichtfelder","1","0","0"),
("3020","1","21","4","content","Registrovať","field_word_sent","Teilnehmen","1","0","0"),
("3021","1","21","4","content","Predchádzajúca (fotka)","field_word_previous","Vorheriges","1","0","0"),
("3022","1","21","4","content","Ďalšia (fotka)","field_word_next","Nächstes","1","0","0"),
("3023","1","21","4","content","Súhlasím s newslettrom","field_word_suhlas_news","Ja, ich möchte nähere Infos zur Region Ski Juwel Alpbachtal Wildschönau erhalten und meine Daten für weitere Marketingaktivitäten zur Verfügung zu stellen.","1","0","0"),
("3024","1","21","4","content","Súhlasím s podmienkami súťaže","field_word_suhlas_podm","Ja, ich stimme den Teilnahmebedingungen zu. (Teilnahmebedingungen HIER).","1","0","0"),
("3025","1","21","1","content","Kľúčové slová pre Google","keywords","Ski Juwel Alpbachtal Wildschönau","1","0","0"),
("3026","1","21","1","content","Popis pre Google","description","This competition has a first ID","1","0","0"),
("3027","1","21","4","content","Súhlasím s podmienkami súťaže","field_word_dakujeme","Danke, Sie haben sich erfolgreich für das Gewinnspiel registriert.","1","0","0"),
("3028","1","21","12","image","Podmienky súťaže (PDF)","form_file_podmienky","367","1","0","0"),
("3029","1","21","12","image","Newsletter (PDF)","form_file_newsletter","107","0","0","0"),
("3030","1","21","4","content","Hláška možnosti novej registrácie","field_word_nova_registracia","Jetzt Freunde einladen!","1","0","0"),
("3031","1","21","13","content","Počet znakov vygenerovaného hashu","_email_conf_char","8","1","0","0"),
("3032","1","21","13","content","Hláška, súťažiacemu ktorá mu príde na email po registracii.","_email_conf_sent_text","Danke, Sie haben sich erfolgreich für das Gewinnspiel registriert. Wir wünschen Ihnen viel Erfolg bei der Verlosung!","1","0","0"),
("3033","1","21","12","content","Telefónne číslo","form_base_tel_c","","0","0","0"),
("3034","1","21","4","content","Hláška za hviezdičkou o povinných poliach","field_word_povinne_polia","","1","0","0"),
("3035","1","21","2","image","Fotka loga k modulu UBYTOVANIE","_menu_7_image_2_1","295","0","0","0"),
("3036","1","21","16","content","Názov hotelu 2","info_hotel_name_2","Sporthotel Falkenstein","0","0","0"),
("3037","1","21","16","content","Adresa Hotela 2","info_hotel_addr_2","Nikolaus-Gassner-Str. 79   <br/>   A - 5710 Kaprun","1","0","0"),
("3038","1","21","16","content","Telefón do hotela 2","info_hotel_tel_c_2","+43 6547 7122","1","0","0"),
("3039","1","21","16","content","Email hotelu 2","info_hotel_email_2","sporthotel@falkenstein.at","1","0","0"),
("3040","1","21","16","content","Text k modulu UBYTOVANIE 2","_menu_7_text_2","<p><strong>Das Falkenstein</strong></p>\n\n<p>Tady v Kaprunu a hotelu Falkenstein lze objevit spoustu vzru&scaron;uj&iacute;c&iacute;ch možnost&iacute; a z&aacute;bavy&nbsp;pro rodiny a děti. Každ&yacute; den může b&yacute;t spojen s nov&yacute;mi z&aacute;žitky a dojmy, ať už jde&nbsp;o zvl&aacute;&scaron;tn&iacute; rodinn&eacute; turistick&eacute; v&yacute;lety, čvacht&aacute;n&iacute; a klouz&aacute;n&iacute; v Tauern SPA Kaprun, v&yacute;let&nbsp;k alpsk&eacute; horsk&eacute; bobov&eacute; dr&aacute;ze &quot;Maisfiltzer&quot;, o n&aacute;v&scaron;těvu volnočasov&eacute;ho nebo n&aacute;rodn&iacute;ho&nbsp;parku nebo o mnoh&aacute; dal&scaron;&iacute; dobrodružstv&iacute; - z&aacute;bavě se nekladou ž&aacute;dn&eacute; hranice.</p>\n\n<p>V hotelu Falkenstein&nbsp;se nach&aacute;z&iacute; kromě&nbsp;prostorn&eacute;ho&nbsp;dětsk&eacute;ho hři&scaron;tě&nbsp;a dětsk&eacute; herny tak&eacute;&nbsp;velk&yacute; baz&eacute;n a najdete&nbsp;zde i&nbsp;chutnou&nbsp;Pinzgauerskou&nbsp;kuchyni s pestr&yacute;mi&nbsp;dětsk&yacute;mi menu&nbsp;- n&aacute;&scaron; maskot Falki&nbsp;se na v&aacute;s tě&scaron;&iacute;!</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n","1","0","0");
INSERT INTO dnt_microsites_composer VALUES
("3041","1","21","17","content","Text k modulu UBYTOVANIE 3","_menu_7_text_3","<p><strong>Dovolen&aacute; v Zell am See je dovolenou s požitkem - v hotelu Tirolerhof!</strong></p>\n\n<p>Jezero, hory, ledovec a stylov&yacute;, rodinn&yacute; 4-hvězdičkov&yacute; hotel superior v Zell am See &ndash; to je ide&aacute;ln&iacute; kombinace pro va&scaron;i dovolenou v Zell am See, v l&eacute;tě i v zimě. Budete m&iacute;t v&yacute;hled na jezero Zeller See, hory Schmittenh&ouml;he a Kitzsteinhorn se v&scaron;emi rozmanit&yacute;mi sportovn&iacute;mi a rekreačn&iacute;mi možnostmi a budete h&yacute;čk&aacute;ni v b&aacute;ječn&eacute;m a mimoř&aacute;dn&eacute;m hotelu kulin&aacute;řsk&yacute;mi specialitami nejvy&scaron;&scaron;&iacute; kvality. Nebo str&aacute;v&iacute;te dovolenou spojenou s golfem v Salcburku, kde budete m&iacute;t v&yacute;hled na n&aacute;dhern&eacute; hory a jezero oblasti Zell am See-Kaprun. Nebo si užijete ve dvou n&aacute;dhern&eacute; apartm&aacute;ny v r&aacute;mci romantick&eacute; dovolen&eacute;. Nebo si poř&aacute;dně odpočinete s wellness a l&aacute;zeňskou nab&iacute;dkou vy&scaron;&scaron;&iacute; tř&iacute;dy a načerp&aacute;te novou energii. Takto může vypadat va&scaron;e dal&scaron;&iacute; rekreačn&iacute; dovolen&aacute; v hotelu Tirolerhof Zell am See - v srdci Salcburku. Wellness hotel, čtyřhvězdičkov&yacute; hotel superior, hotel pro hosty s pejsky, relaxačn&iacute; hotel - v&scaron;echny tyto př&iacute;vlastky si hotel Tirolerhof plně zaslouž&iacute;.</p>\n\n<p>&nbsp;</p>\n\n<p><strong>Prožijte nezapomenutelnou dovolenou v hotelu Tirolerhof!</strong></p>\n","0","0","0"),
("3042","1","21","17","content","Email hotelu 3","info_hotel_email_3","welcome@tirolerhof.co.at","0","0","0"),
("3043","1","21","17","content","Telefón do hotela 3","info_hotel_tel_c_3","+43(0)6542/772-0","0","0","0"),
("3044","1","21","17","content","Adresa Hotela 3","info_hotel_addr_3","Auerspergstrasse 5   <br/>   A - 5700 Zell am See","0","0","0"),
("3045","1","21","17","content","Názov hotelu 3","info_hotel_name_3","Hotel Tirolerhof ****S","0","0","0"),
("3046","1","21","16","image","Fotka loga k modulu UBYTOVANIE 2","_menu_7_image_1_2","66","1","0","0"),
("3047","1","21","16","image","Fotka k modulu UBYTOVANIE 2","_menu_7_image_2_2","65","0","0","0"),
("3048","1","21","17","image","Fotka loga k modulu UBYTOVANIE 3","_menu_7_image_1_3","51","0","0","0"),
("3049","1","21","17","image","Fotka k modulu UBYTOVANIE 3","_menu_7_image_2_3","56","0","0","0"),
("3050","1","21","2","content","Url adresa hotela 1","link_hotel_1","http://www.lerchenhof.at","1","0","0"),
("3051","1","21","16","content","Url adresa hotela 2","link_hotel_2","http://www.falkenstein.at","1","0","0"),
("3052","1","21","17","content","Url adresa hotela 3","link_hotel_3","http://www.tirolerhof.co.at/","0","0","0"),
("3053","1","21","9","image","Druhá fotka modulu pre modul GALÉRIA","_menu_5_gallery_1","40","1","0","0"),
("3054","1","21","5","image","Fotka v hlavnom slideri 2","_menu_1_image_2","356","0","0","0"),
("3055","1","21","4","content","Po ukončení registrácie","field_word_koniec_registracie","<p><span style=\"color:#FF0000\"><span style=\"font-size:22px\">Ospravedlňujeme sa, ale t&aacute;to s&uacute;ťaž už bola ukončen&aacute;.</span></span></p>\n\n<p><span style=\"font-size:18px\"><span style=\"color:#FF0000\">Gratulujeme v&yacute;hercovi</span></span></p>\n","0","0","0"),
("3056","1","21","11","content","Názov modulu pre modul O PARTNEROVI","_menu_name_8","O Partnerovi","0","0","0"),
("3057","1","21","15","content","Email partnera","info_partner_email","","0","0","0"),
("3058","1","21","15","content","Adresa partnera","info_partner_addr","","0","0","0"),
("3059","1","21","15","content","Názov partnera","info_partner_name","","0","0","0"),
("3060","1","21","15","content","Telefónne číslo na partnera","info_partner_tel_c","","0","0","0"),
("3061","1","21","11","content","Text k modulu O PARTNEROVI 1","_menu_8_text_1","","1","0","0"),
("3062","1","21","1","content","Jazyková mutácia pre Facebook","_language","de_DE","1","0","0"),
("3063","1","21","12","image","Newsletter 2 (PDF)","form_file_newsletter_2","68","0","0","0"),
("3064","1","21","4","content","Súhlasím s newslettrom 2","field_word_suhlas_news_2","News 2","1","0","0"),
("3065","1","21","18","content","Email hotelu 4","info_hotel_email_4","welcome@tirolerhof.co.at","0","0","0"),
("3066","1","21","18","content","Telefón do hotela 4","info_hotel_tel_c_4","+43(0)6542/772-0","0","0","0"),
("3067","1","21","18","content","Adresa Hotela 4","info_hotel_addr_4","Auerspergstrasse 5   <br/>   A - 5700 Zell am See","1","0","0"),
("3068","1","21","18","content","Názov hotelu 4","info_hotel_name_4","Hotel Tirolerhof ****S","0","0","0"),
("3069","1","21","18","image","Fotka loga k modulu UBYTOVANIE 4","_menu_7_image_1_4","","0","0","0"),
("3070","1","21","18","image","Fotka k modulu UBYTOVANIE 4","_menu_7_image_2_4","","1","0","0"),
("3071","1","21","18","content","Url adresa hotela 4","link_hotel_4","http://www.tirolerhof.co.at/","0","0","0"),
("3072","1","21","18","content","Text k modulu UBYTOVANIE 4","_menu_7_text_4","","0","0","0"),
("3073","1","21","11","image","Fotka k modulu O PARTNEROVI","_menu_8_image_1","","0","0","0"),
("3074","1","21","1","content","Google Plus","social_google_plus","https://plus.google.com/+bittl","1","0","0"),
("3075","1","21","12","content","Input Otázka","form_extend_v2_otazka","","0","0","0"),
("3076","1","21","13","content","Odoslať potvrdzovací email","sent_confirm_mail","1","1","0","0"),
("3077","1","21","12","content","Voliteľný parameter 1","form_base_custom_1","Tel. Nr.","1","0","0"),
("3078","1","22","1","content","Template","layout","dnt_first","1","0","0"),
("3079","1","22","15","content","Link partnera","link_partner","http://www.intersport.sk/","1","0","0"),
("3080","1","22","3","content","Link regionu","link_region","http://www.zellamsee-kaprun.com","1","0","0"),
("3081","1","22","1","content","Zobraziť na URL adrese","real_address","http://www.vyhrat.com/","1","0","0"),
("3082","1","22","1","content","Facebook","social_fb","https://www.facebook.com/INTERSPORT.SK/","1","0","0"),
("3083","1","22","1","content","Twitter","social_twitter","https://twitter.com/zellkaprun","1","0","0"),
("3084","1","22","1","content","Instagram","social_linked_in","https://www.instagram.com/zellamseekaprun/","1","0","0"),
("3085","1","22","1","content","Mapa ","map_location","https://www.google.sk/maps/place/Zell+am+See-Kaprun+Tourismus+GmbH/@47.3221006,12.7943083,17z/data=!3m1!4b1!4m2!3m1!1s0x47771cdf4f490061:0xba82c342ef002324","1","0","0"),
("3086","1","22","1","image","Favicon","favicon","57","1","0","0"),
("3087","1","22","1","content","Model farby R","_r","75","1","0","0"),
("3088","1","22","1","content","Model farby G","_g","115","1","0","0"),
("3089","1","22","1","content","Model farby B","_b","170","1","0","0"),
("3090","1","22","1","content","Font","_font","roboto","1","0","0"),
("3091","1","22","2","content","Názov hotelu 1","info_hotel_name_1","Hotel Tauernhof ****","1","0","0"),
("3092","1","22","2","content","Adresa Hotela 1","info_hotel_addr_1","Nikolaus Gassner Str. 9   <br/>   A - 5710 Kaprun","1","0","0"),
("3093","1","22","2","content","Telefón do hotela 1","info_hotel_tel_c_1","+43 6547 8235-0","1","0","0"),
("3094","1","22","2","content","Email hotelu 1","info_hotel_email_1","info@tauernhof-kaprun.at","1","0","0"),
("3095","1","22","3","content","Názov regiónu","info_region_name","Zell am See-Kaprun Tourismus","1","0","0"),
("3096","1","22","3","content","Adresa regiónu","info_region_addr","Brucker Bundesstr. 1a  <br/>  A-5700 Zell am See","1","0","0"),
("3097","1","22","3","content","Telefónne číslo regiónu","info_region_tel_c","+43 6542 770","1","0","0"),
("3098","1","22","3","content","Email regiónu","info_region_email","welcome@zellamsee-kaprun.com","1","0","0"),
("3099","1","22","1","content","Youtube video","youtube_video","6XKFSsSVq38","1","0","0"),
("3100","1","22","15","image","Logo partnera","partner_logo","370","1","0","0"),
("3101","1","22","3","image","Logo regiónu","region_logo","371","1","0","0"),
("3102","1","22","5","image","Fotka v hlavnom slideri 1","_menu_1_image_1","372","1","0","0"),
("3103","1","22","7","image","Fotka modulu pre modul GALÉRIA","_menu_3_image_1","374","1","0","0"),
("3104","1","22","7","image","Druhá fotka modulu pre modul GALÉRIA","_menu_3_image_2","375","1","0","0"),
("3105","1","22","2","image","Fotka k modulu UBYTOVANIE","_menu_7_image_1_1","376","1","0","0"),
("3106","1","22","5","content","Názov modulu pre modul INFO","_menu_name_1","Intro","1","1","0"),
("3107","1","22","6","content","Názov modulu pre modul O SÚŤAŽI","_menu_name_2","O súťaži","1","2","0"),
("3108","1","22","7","content","Názov modulu pre modul GALÉRIU","_menu_name_3","Galéria","0","0","0"),
("3109","1","22","8","content","Názov modulu pre modul FORMULÁRU","_menu_name_4","Registrácia","1","3","0"),
("3110","1","22","9","content","Názov modulu pre modul O REGIONE","_menu_name_5","Zell am See-Kaprun","1","4","0"),
("3111","1","22","10","content","Názov modulu pre modul MAPA","_menu_name_6","Mapa","0","0","0"),
("3112","1","22","11","content","Názov modulu pre modul UBYTOVANIE","_menu_name_7","Ubytovanie","1","5","0"),
("3113","1","22","5","content","Text k modulu INFO","_menu_1_text_1","<p><span style=\"font-size:24px\"><span style=\"color:#F0F8FF\">S&uacute;ťaž o lyžovačku v rak&uacute;skom Zell am See-Kaprun!</span></span></p>\n","1","0","0"),
("3114","1","22","6","content","Text k modulu O SÚŤAŽI","_menu_2_text_1","<h3>Nak&uacute;pte v predajniach INTERSPORT a vyhrajte jeden z 5 lyžiarskych pobytov v Zell am See-Kaprun!</h3>\n\n<p>Stač&iacute; ak&nbsp;počas doby trvania s&uacute;ťaže nak&uacute;pite&nbsp;v predajniach INTERSPORT v&nbsp;SR<strong> </strong>v&nbsp;hodnote nad 100 &euro; (v jednom n&aacute;kupe) a&nbsp;zaregistrujete svoj doklad o n&aacute;kupe v zmysle podmienok&nbsp;uveden&yacute;ch v pravidl&aacute;ch&nbsp;tejto s&uacute;ťaže.&nbsp;Do s&uacute;ťaže&nbsp;sa&nbsp;m&ocirc;žete zaregistrovať aj viackr&aacute;t a to vždy s nov&yacute;m č&iacute;slom pokladničn&eacute;ho dokladu. Opakovan&yacute;m&nbsp; n&aacute;kupom m&aacute;te&nbsp;v&auml;č&scaron;iu &scaron;ancu na v&yacute;hru.</p>\n\n<p>Hlavn&aacute; v&yacute;hra: <strong>1x rodinn&yacute; pobyt (2 dospel&iacute;, 2 deti) na 5 dn&iacute; / 4 noci v 4* hoteli s polopenziou, vr&aacute;tane skipasov v Zell am See-Kaprun</strong><br />\nĎaľ&scaron;ie v&yacute;hry: <strong>4x pobyt pre 2 osoby na 4 dni / 3 noci v 4* hoteli s polopenziou, vr&aacute;tane skipasov v regi&oacute;ne Zell am See-Kaprun</strong></p>\n\n<p><strong>S&uacute;ťaž&nbsp;prebieha&nbsp;4.01. - 15.02. 2017&nbsp;na &uacute;zem&iacute; SR. Žel&aacute;me&nbsp;V&aacute;m veľa &scaron;ťastia pri žrebovan&iacute;!</strong></p>\n","1","0","0"),
("3115","1","22","7","content","Text k modulu GALÉRIA","_menu_3_text_1","","1","0","0"),
("3116","1","22","8","content","Text k modulu FORMULÁR","_menu_4_text_1","","1","0","0"),
("3117","1","22","9","content","Text k modulu O REGIÓNE","_menu_5_text_1","<p><strong><span style=\"font-size:16px\">&bdquo;Keep on rocking&ldquo; - Zima superlat&iacute;vov v Zell am See-Kaprun</span></strong><br />\n100% z&aacute;ruka snehu | Najvy&scaron;&scaron;ia sedačkov&aacute; lanovka | Nov&aacute; zjazdovka snov a Jukeboxx gondoly</p>\n\n<p>Zell am See-Kaprun v srdci Rak&uacute;ska je jedn&yacute;m z najrozmanitej&scaron;&iacute;ch zimn&yacute;ch &scaron;portov&yacute;ch regi&oacute;nov tejto krajiny: Tri lyžiarske are&aacute;ly Kitzsteinhorn, Schmittenh&ouml;he a Maiskogel maj&uacute; celkovo 66 zjazdoviek s dĺžkou 138 kilometrov. Modern&eacute; zasnežovacie zariadenia zaručuj&uacute; absol&uacute;tnu istotu snehu a bl&iacute;zkosť n&aacute;rodn&eacute;ho parku Hohe Tauern grandi&oacute;zny pr&iacute;rodn&yacute; z&aacute;žitok. Snowparky vo v&scaron;etk&yacute;ch lyžiarskych stredisk&aacute;ch, najatrakt&iacute;vnej&scaron;ie Superpipe v Rak&uacute;sku a najdlh&scaron;&iacute; Funslope sveta na Schmittenh&ouml;he, poskytuj&uacute; množstvo z&aacute;bavy naviac. Jedin&aacute; ľadovcov&aacute; lyžiarska oblasť v Salzbursku v &bdquo;Kitz&ldquo; pon&uacute;ka brilantn&eacute; zjazdovky od okt&oacute;bra do začiatku leta, vysokohorsk&eacute; bežk&aacute;rske trate a &bdquo;Svet vrcholov 3000&ldquo;.<br />\nRodinn&yacute; lyžiarsky are&aacute;l Maiskogel z&iacute;skal medzi deťmi najvy&scaron;&scaron;iu popularitu, v neposlednom rade aj vďaka s&aacute;nkarskej atrakcii &bdquo;Alpine Coaster Maisiflitzer&ldquo; priamo na &uacute;p&auml;t&iacute; hory. Prv&aacute; celoročn&aacute; Alpsk&aacute; horsk&aacute; dr&aacute;ha v Salzbursku je akčn&yacute;m z&aacute;žitkom najvy&scaron;&scaron;ej &uacute;rovne. S r&yacute;chlosťou až 40 kilometrov za hodinu svi&scaron;tia dvojmiestne boby na dr&aacute;he o dĺžke 1300 metrov do &uacute;dolia.</p>\n","1","0","0"),
("3118","1","22","9","content","Ďalší text k modulu O REGIÓNE","_menu_5_text_2","<p><span style=\"font-size:16px\"><strong>R&yacute;chlej&scaron;ie, dlh&scaron;ie, ďalej, najsk&ocirc;r - novinky, ktor&eacute; poskytuj&uacute; z&aacute;bavu</strong></span></p>\n\n<p>Absol&uacute;tne superlativy podnecuj&uacute; radosť z očak&aacute;vanej zimy 2016/17 v Zell am See-Kaprun: Na Kitzsteinhorne boli p&ocirc;vodn&eacute; vleky nahraden&eacute; novou 8-sedačkovou lanovkou &ndash; najvy&scaron;&scaron;ej&nbsp; v Salzbursku - vr&aacute;tane vyhrievan&yacute;ch sedačiek a ochrann&yacute;ch &scaron;t&iacute;tov proti poveternostn&yacute;m vplyvom. Ponuku v r&aacute;mci zjazdoviek na ľadovci okrem toho doplňuje nov&yacute; zoznam atrakci&iacute; &bdquo;Eagle Line&ldquo; so zvlnenou dr&aacute;hou, skokmi a ostr&yacute;mi zat&aacute;čkami.<br />\nNa Schmittenh&ouml;he otv&aacute;ra 10-miestna kab&iacute;nkov&aacute; lanovka ZellamseeXpress možnosť lyžovať na zjazdovke o dĺžke 3,5 km smerom na Skicircus Saalbach Hinterglemm Leogang Fieberbrunn: ako predzvesť nadch&aacute;dzaj&uacute;ceho prelomov&eacute;ho napojenia Zell am See-Kaprun na jednu z najv&auml;č&scaron;&iacute;ch lyžiarskych oblast&iacute; v Rak&uacute;sku. ZellamseeXpress m&aacute; &scaron;esť gondol s jukeboxom vr&aacute;tane modern&eacute;ho multimedi&aacute;lneho zvukov&eacute;ho syst&eacute;mu. Novinkou na Schmittenh&ouml;he je ponuka &bdquo;Ski&#39;n&#39;Brunch&ldquo;: V &scaron;tyroch term&iacute;noch s&uacute; svahy od 7 hodiny vyhraden&eacute; pre &bdquo;rann&eacute; vt&aacute;čat&aacute;&ldquo;, ktor&eacute; sa potom stretn&uacute; na slnečnej planine a daj&uacute; si brunch teda neskor&eacute; raňajky.</p>\n\n<p>Viac o regi&oacute;ne na: <strong><a href=\"http://www.zellamsee-kaprun.com\" target=\"_blank\">www.zellamsee-kaprun.com</a></strong></p>\n","1","0","0"),
("3119","1","22","10","content","Text k modulu MAPA","_menu_6_text_1","<p>Mapa regionu</p>\n","1","0","0"),
("3120","1","22","2","content","Text k modulu UBYTOVANIE 1","_menu_7_text_1","<p><strong>Hotel Tauernhof ****&nbsp;<br />\nKde sa hostia st&aacute;vaj&uacute; priateľmi!</strong></p>\n\n<p>Prežite najkraj&scaron;ie dni v roku v Tauernhof v Kaprune. N&aacute;&scaron; tradičn&yacute; rodinn&yacute; 4* hotel v srdci regi&oacute;nu Salzburgsko lež&iacute; na pokojnom mieste, no napriek tomu m&aacute; top-polohu v &uacute;plnom centre strediska. Prav&aacute; rak&uacute;ska pohostinnosť, kvalitn&eacute; služby a nebesk&eacute; kulin&aacute;rske z&aacute;žitky vyčaria &uacute;smev na tv&aacute;ri každ&eacute;ho n&aacute;v&scaron;tevn&iacute;ka.<br />\nPo akt&iacute;vnom dni v stredisku Zell am See-Kaprun v&aacute;m na&scaron;a wellness o&aacute;za &quot;Tauernreich&quot; na viac ako 500 m2 pon&uacute;ka v&scaron;etko na uvoľnenie tela a povzbudenie mysle: od kryt&eacute;ho baz&eacute;na cez saunov&yacute; svet s panoramatickou a il&uacute;ziou odpočiv&aacute;rňou až po mas&aacute;že a kozmetick&eacute; proced&uacute;ry &ndash; wellness hotel v Kaprune V&aacute;m spln&iacute; každ&eacute; želanie!</p>\n","1","0","0"),
("3121","1","22","12","content","Input Meno","form_base_name","Meno","0","0","0"),
("3122","1","22","12","content","Input Priezvisko","form_base_surname","Priezvisko","0","0","0"),
("3123","1","22","12","content","Input PSČ","form_base_psc","PSČ","0","0","0"),
("3124","1","22","12","content","Input Mesto","form_base_city","Mesto","0","0","0"),
("3125","1","22","12","content","Input Email","form_base_email","Email","0","0","0"),
("3126","1","22","12","content","Input Doklad","form_extend_v1_doklad","Doklad o Vašom nákupe: (unikátne číslo účtenky)","0","0","0"),
("3127","1","22","12","content","Input otázka","form_extend_v2_otazka","Napíšte farbu vášho PC","0","0","0"),
("3128","1","22","12","content","Input Otázka + odpovede","form_extend_v3_otazka","Je toto modré?","0","0","0"),
("3129","1","22","12","content","Odpoveď A","form_extend_v3_odpoved_a","áno","0","0","0"),
("3130","1","22","12","content","Odpoveď B","form_extend_v3_odpoved_b","neviem","0","0","0"),
("3131","1","22","12","content","Odpoveď C","form_extend_v3_odpoved_c","možno","0","0","0"),
("3132","1","22","4","content","Názov","field_word_nazov","Názov","0","0","0"),
("3133","1","22","4","content","Adresa","field_word_adresa","Adresa","0","0","0"),
("3134","1","22","4","content","Kontakt","field_word_kontakt","Kontakt","0","0","0"),
("3135","1","22","4","content","Web","field_word_web","Web","0","0","0"),
("3136","1","22","4","content","Hláška povinné pole","field_word_err","Toto pole je povinné","0","0","0"),
("3137","1","22","4","content","Registrovať","field_word_sent","Registrovať","0","0","0"),
("3138","1","22","4","content","Predchádzajúca (fotka)","field_word_previous","Predchádzajúca","1","0","0"),
("3139","1","22","4","content","Ďalšia (fotka)","field_word_next","Ďaľšia","1","0","0"),
("3140","1","22","4","content","Súhlasím s newslettrom","field_word_suhlas_news","Mám záujem o zasielanie aktuálnych noviniek o regione Zell am See-Kaprun.","0","0","0");
INSERT INTO dnt_microsites_composer VALUES
("3141","1","22","4","content","Súhlasím s podmienkami súťaže","field_word_suhlas_podm","Súhlasím s pravidlami súťaže (PRAVIDLÁ TU).","0","0","0"),
("3142","1","22","1","content","Kľúčové slová pre Google","keywords","súťaž Intersport Zell am See-Kaprun","1","0","0"),
("3143","1","22","1","content","Popis pre Google","description","This competition has a first ID","1","0","0"),
("3144","1","22","4","content","Súhlasím s podmienkami súťaže","field_word_dakujeme","Ďakujeme za Vašu registráciu a želáme Vám veľa šťastia v súťaži!","0","0","0"),
("3145","1","22","12","image","Podmienky súťaže (PDF)","form_file_podmienky","380","0","0","0"),
("3146","1","22","12","image","Newsletter (PDF)","form_file_newsletter","68","0","0","0"),
("3147","1","22","4","content","Hláška možnosti novej registrácie","field_word_nova_registracia","Pokiaľ máte ďaľší doklad o nákupe môžete prejsť k novej registrácii TU.","0","0","0"),
("3148","1","22","13","content","Počet znakov vygenerovaného hashu","_email_conf_char","8","1","0","0"),
("3149","1","22","13","content","Hláška, súťažiacemu ktorá mu príde na email po registracii.","_email_conf_sent_text","Ďakujeme za registráciu do súťaže a želáme Vám veľa šťastia pri žrebovaní!","1","0","0"),
("3150","1","22","12","content","Telefónne číslo","form_base_tel_c","Telefónne číslo","0","0","0"),
("3151","1","22","4","content","Hláška za hviezdičkou o povinných poliach","field_word_povinne_polia","Toto pole je povinné. ","0","0","0"),
("3152","1","22","2","image","Fotka loga k modulu UBYTOVANIE","_menu_7_image_2_1","377","0","0","0"),
("3153","1","22","16","content","Názov hotelu 2","info_hotel_name_2","Das Falkenstein ****","1","0","0"),
("3154","1","22","16","content","Adresa Hotela 2","info_hotel_addr_2","Nikolaus-Gassner-Str. 79   <br/>   A - 5710 Kaprun","1","0","0"),
("3155","1","22","16","content","Telefón do hotela 2","info_hotel_tel_c_2","+43 6547 7122","1","0","0"),
("3156","1","22","16","content","Email hotelu 2","info_hotel_email_2","sporthotel@falkenstein.at","1","0","0"),
("3157","1","22","16","content","Text k modulu UBYTOVANIE 2","_menu_7_text_2","<p><strong>Das Falkenstein ****<br />\nPrirodzene. Akt&iacute;vne. Inak.</strong></p>\n\n<p>Hotel Falkenstein, ktor&yacute; sa nach&aacute;dza na &uacute;p&auml;t&iacute; Kitzsteinhornu, sp&aacute;ja rak&uacute;sku trad&iacute;ciu s modern&yacute;m životn&yacute;m &scaron;t&yacute;lom.<br />\nPo dlhom dni str&aacute;venom na zjazdovke, po t&uacute;re na horskom bicykli alebo v&yacute;lete na paraglide so &scaron;&eacute;fom hotela si m&ocirc;žete odpočin&uacute;ť vo vonkaj&scaron;ej saune, pri hodine j&oacute;gy alebo v priestrannom wellness are&aacute;li. Z&aacute;soby energie m&ocirc;žete večer doplniť dom&aacute;cim chlebom z pece na drevo, čerstv&yacute;mi jedlami s bylinkami zo z&aacute;hrady, n&aacute;dherne &scaron;ťavnat&yacute;mi steakmi či rak&uacute;skymi sladk&yacute;mi &scaron;pecialitami.<br />\nPre deti, rodiny alebo priateľov je to n&aacute;dhern&eacute; miesto na relax&aacute;ciu a akt&iacute;vny odpočinok!</p>\n\n<p>&nbsp;</p>\n","1","0","0"),
("3158","1","22","17","content","Text k modulu UBYTOVANIE 3","_menu_7_text_3","<p><strong>Dovolen&aacute; v Zell am See je dovolenou s požitkem - v hotelu Tirolerhof!</strong></p>\n\n<p>Jezero, hory, ledovec a stylov&yacute;, rodinn&yacute; 4-hvězdičkov&yacute; hotel superior v Zell am See &ndash; to je ide&aacute;ln&iacute; kombinace pro va&scaron;i dovolenou v Zell am See, v l&eacute;tě i v zimě. Budete m&iacute;t v&yacute;hled na jezero Zeller See, hory Schmittenh&ouml;he a Kitzsteinhorn se v&scaron;emi rozmanit&yacute;mi sportovn&iacute;mi a rekreačn&iacute;mi možnostmi a budete h&yacute;čk&aacute;ni v b&aacute;ječn&eacute;m a mimoř&aacute;dn&eacute;m hotelu kulin&aacute;řsk&yacute;mi specialitami nejvy&scaron;&scaron;&iacute; kvality. Nebo str&aacute;v&iacute;te dovolenou spojenou s golfem v Salcburku, kde budete m&iacute;t v&yacute;hled na n&aacute;dhern&eacute; hory a jezero oblasti Zell am See-Kaprun. Nebo si užijete ve dvou n&aacute;dhern&eacute; apartm&aacute;ny v r&aacute;mci romantick&eacute; dovolen&eacute;. Nebo si poř&aacute;dně odpočinete s wellness a l&aacute;zeňskou nab&iacute;dkou vy&scaron;&scaron;&iacute; tř&iacute;dy a načerp&aacute;te novou energii. Takto může vypadat va&scaron;e dal&scaron;&iacute; rekreačn&iacute; dovolen&aacute; v hotelu Tirolerhof Zell am See - v srdci Salcburku. Wellness hotel, čtyřhvězdičkov&yacute; hotel superior, hotel pro hosty s pejsky, relaxačn&iacute; hotel - v&scaron;echny tyto př&iacute;vlastky si hotel Tirolerhof plně zaslouž&iacute;.</p>\n\n<p>&nbsp;</p>\n\n<p><strong>Prožijte nezapomenutelnou dovolenou v hotelu Tirolerhof!</strong></p>\n","0","0","0"),
("3159","1","22","17","content","Email hotelu 3","info_hotel_email_3","welcome@tirolerhof.co.at","0","0","0"),
("3160","1","22","17","content","Telefón do hotela 3","info_hotel_tel_c_3","+43(0)6542/772-0","0","0","0"),
("3161","1","22","17","content","Adresa Hotela 3","info_hotel_addr_3","Auerspergstrasse 5   <br/>   A - 5700 Zell am See","0","0","0"),
("3162","1","22","17","content","Názov hotelu 3","info_hotel_name_3","Hotel Tirolerhof ****S","0","0","0"),
("3163","1","22","16","image","Fotka loga k modulu UBYTOVANIE 2","_menu_7_image_1_2","378","1","0","0"),
("3164","1","22","16","image","Fotka k modulu UBYTOVANIE 2","_menu_7_image_2_2","65","0","0","0"),
("3165","1","22","17","image","Fotka loga k modulu UBYTOVANIE 3","_menu_7_image_1_3","51","0","0","0"),
("3166","1","22","17","image","Fotka k modulu UBYTOVANIE 3","_menu_7_image_2_3","56","0","0","0"),
("3167","1","22","2","content","Url adresa hotela 1","link_hotel_1","http://www.tauernhof-kaprun.at","1","0","0"),
("3168","1","22","16","content","Url adresa hotela 2","link_hotel_2","http://www.falkenstein.at","1","0","0"),
("3169","1","22","17","content","Url adresa hotela 3","link_hotel_3","http://www.tirolerhof.co.at/","0","0","0"),
("3170","1","22","9","image","Druhá fotka modulu pre modul GALÉRIA","_menu_5_gallery_1","43","1","0","0"),
("3171","1","22","5","image","Fotka v hlavnom slideri 2","_menu_1_image_2","373","1","0","0"),
("3172","1","22","4","content","Po ukončení registrácie","field_word_koniec_registracie","<p><span style=\"font-size:16px\">S&uacute;ťaž bola ukončen&aacute; 15.2.2017. Žrebovania prebehlo dňa 20.2.2017 podľa pravidiel s&uacute;ťaže.</span></p>\n\n<p><span style=\"font-size:16px\">1x rodinn&yacute; pobyt pre 4 osoby v rak&uacute;skom Zell am See-Kaprun, z&iacute;skava:</span></p>\n\n<p><strong><span style=\"font-size:16px\">Martina Ježikova , 91105 Trenč&iacute;n, SK</span></strong></p>\n\n<p><span style=\"font-size:16px\">1x pobyt pre 2 osoby v rak&uacute;skom Zell am See-Kaprun, z&iacute;skavaj&uacute;:</span></p>\n\n<p><strong><span style=\"font-size:16px\">Toma&scaron; Hazer,&nbsp; 05801 Poprad, SK</span></strong></p>\n\n<p><strong><span style=\"font-size:16px\">Jarmila Harangozoova, 93564 Kuralany, SK</span></strong></p>\n\n<p><strong><span style=\"font-size:16px\">Matej Valjent, 95801 Partiz&aacute;nske,&nbsp; SK&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></strong></p>\n\n<p><strong><span style=\"font-size:16px\">Vladimir Komenda, 85103 Bratislava,&nbsp; SK</span></strong></p>\n\n<p><span style=\"font-size:16px\">V&yacute;hern&eacute; poukazy bud&uacute; v&yacute;hercom odoslan&eacute; mailom resp. po&scaron;tou v najbliž&scaron;&iacute;ch dňoch! Pobyty s&uacute; mimo dopravy.</span></p>\n\n<p><span style=\"font-size:16px\"><strong>V&yacute;hercom blahožel&aacute;me a v&scaron;etk&yacute;m ostatn&yacute;m ďakujeme za &uacute;časť!</strong></span></p>\n\n<p>&nbsp;</p>\n\n<p><span style=\"font-size:14px\">Spr&aacute;vnosť a platnosť žrebovania potvrdzuj&uacute; organiz&iacute;tori s&uacute;ťaže:</span></p>\n\n<p><span style=\"font-size:14px\">Zell am See-Kaprun Tourismus GmbH, Brucker Bundesstr.1a, 5700 Zell am See, AT</span></p>\n\n<p><span style=\"font-size:14px\">a INTERSPORT SK s.r.o., Rožňavsk&aacute; 12, 821 04 Bratislava, SR</span></p>\n","1","0","0"),
("3173","1","22","11","content","Názov modulu pre modul O PARTNEROVI","_menu_name_8","O Partnerovi","0","0","0"),
("3174","1","22","15","content","Email partnera","info_partner_email","intersport@intersport.sk","1","0","0"),
("3175","1","22","15","content","Adresa partnera","info_partner_addr","Rožňavská 12 <br/> 82104 Bratislava","1","0","0"),
("3176","1","22","15","content","Názov partnera","info_partner_name","Intersport SK","1","0","0"),
("3177","1","22","15","content","Telefónne číslo na partnera","info_partner_tel_c","","0","0","0"),
("3178","1","22","11","content","Text k modulu O PARTNEROVI 1","_menu_8_text_1","<p>Pompo - největ&scaron;&iacute; maloobchodn&iacute; s&iacute;ť prodejen hraček a internetov&yacute; obchod s hračkami</p>\n","0","0","0"),
("3179","1","22","1","content","Jazyková mutácia pre Facebook","_language","sk_SK","1","0","0"),
("3180","1","22","12","image","Newsletter 2 (PDF)","form_file_newsletter_2","68","0","0","0"),
("3181","1","22","4","content","Súhlasím s newslettrom 2","field_word_suhlas_news_2","News 2","0","0","0"),
("3182","1","22","18","content","Email hotelu 4","info_hotel_email_4","welcome@tirolerhof.co.at","0","0","0"),
("3183","1","22","18","content","Telefón do hotela 4","info_hotel_tel_c_4","+43(0)6542/772-0","0","0","0"),
("3184","1","22","18","content","Adresa Hotela 4","info_hotel_addr_4","Auerspergstrasse 5   <br/>   A - 5700 Zell am See","1","0","0"),
("3185","1","22","18","content","Názov hotelu 4","info_hotel_name_4","Hotel Tirolerhof ****S","0","0","0"),
("3186","1","22","18","image","Fotka loga k modulu UBYTOVANIE 4","_menu_7_image_1_4","","0","0","0"),
("3187","1","22","18","image","Fotka k modulu UBYTOVANIE 4","_menu_7_image_2_4","","1","0","0"),
("3188","1","22","18","content","Url adresa hotela 4","link_hotel_4","http://www.tirolerhof.co.at/","0","0","0"),
("3189","1","22","18","content","Text k modulu UBYTOVANIE 4","_menu_7_text_4","","0","0","0"),
("3190","1","22","11","image","Fotka k modulu O PARTNEROVI","_menu_8_image_1","","0","0","0"),
("3191","1","22","1","content","Google Plus","social_google_plus","https://plus.google.com/+zellamseekaprun","0","0","0"),
("3192","1","22","12","content","Input Otázka","form_extend_v2_otazka","Napíšte farbu vášho PC","0","0","0"),
("3193","1","22","13","content","Odoslať potvrdzovací email","sent_confirm_mail","1","1","0","0"),
("3194","1","22","12","content","Voliteľný parameter 1","form_base_custom_1","Toto pole je voliteľné","0","0","0"),
("3312","1","23","1","content","Template","layout","dnt_second","1","0","0"),
("3313","1","23","15","content","Link partnera","link_partner","http://www.corial.cz/sk","1","0","0"),
("3314","1","23","3","content","Link regionu","link_region","http://www.salzburg.info/cs","1","0","0"),
("3315","1","23","1","content","Zobraziť na URL adrese","real_address","http://www.vyhrat.com/","1","0","0"),
("3316","1","23","1","content","Facebook","social_fb","https://www.facebook.com/CORIAL.CR","1","0","0"),
("3317","1","23","1","content","Twitter","social_twitter","https://twitter.com/salzburg_info","1","0","0"),
("3318","1","23","1","content","Instagram","social_linked_in","https://www.linkedin.com/","0","0","0"),
("3319","1","23","1","content","Mapa ","map_location","https://www.google.cz/maps/place/Salzburg,+Rakousko/@47.802904,12.9863895,12z/data=!3m1!4b1!4m5!3m4!1s0x47769adda908d4b1:0xc1e183a1412af73d!8m2!3d47.80949!4d13.05501","1","0","0"),
("3320","1","23","1","image","Favicon","favicon","57","1","0","0"),
("3321","1","23","1","content","Model farby R","_r","170","1","0","0"),
("3322","1","23","1","content","Model farby G","_g","55","1","0","0"),
("3323","1","23","1","content","Model farby B","_b","65","1","0","0"),
("3324","1","23","1","content","Font","_font","Georgia","1","0","0"),
("3325","1","23","2","content","Názov hotelu 1","info_hotel_name_1","Familotel - amiamo","0","0","0"),
("3326","1","23","2","content","Adresa Hotela 1","info_hotel_addr_1","Salzachtal Bundesstrasse 20   <br/>   A - 5700 Zell am See","1","0","0"),
("3327","1","23","2","content","Telefón do hotela 1","info_hotel_tel_c_1","+43 6542 55355","1","0","0"),
("3328","1","23","2","content","Email hotelu 1","info_hotel_email_1","hotel@amiamo.at","1","0","0"),
("3329","1","23","3","content","Názov regiónu","info_region_name","TSG Tourismus Salzburg GmbH","1","0","0"),
("3330","1","23","3","content","Adresa regiónu","info_region_addr","Auerspergstraße 6  <br/>  A-5020 Salzburg","1","0","0"),
("3331","1","23","3","content","Telefónne číslo regiónu","info_region_tel_c","+43 662 88987 0","1","0","0"),
("3332","1","23","3","content","Email regiónu","info_region_email","tourist@salzburg.info","1","0","0"),
("3333","1","23","1","content","Youtube video","youtube_video","3Jff34rxECY","1","0","0"),
("3334","1","23","15","image","Logo partnera","partner_logo","244","1","0","0"),
("3335","1","23","3","image","Logo regiónu","region_logo","243","1","0","0"),
("3336","1","23","5","image","Fotka v hlavnom slideri 1","_menu_1_image_1","391","1","0","0"),
("3337","1","23","7","image","Fotka modulu pre modul GALÉRIA","_menu_3_image_1","393","1","0","0"),
("3338","1","23","7","image","Druhá fotka modulu pre modul GALÉRIA","_menu_3_image_2","394","1","0","0"),
("3339","1","23","2","image","Fotka k modulu UBYTOVANIE","_menu_7_image_1_1","63","1","0","0"),
("3340","1","23","5","content","Názov modulu pre modul INFO","_menu_name_1","Intro","1","1","0"),
("3341","1","23","6","content","Názov modulu pre modul O SÚŤAŽI","_menu_name_2","O soutěži","0","0","0"),
("3342","1","23","7","content","Názov modulu pre modul GALÉRIU","_menu_name_3","Galérie","0","0","0"),
("3343","1","23","8","content","Názov modulu pre modul FORMULÁRU","_menu_name_4","Registrace / Registrácia","1","3","0"),
("3344","1","23","9","content","Názov modulu pre modul O REGIONE","_menu_name_5","Salzburg","1","2","0"),
("3345","1","23","10","content","Názov modulu pre modul MAPA","_menu_name_6","Mapa","0","0","0"),
("3346","1","23","11","content","Názov modulu pre modul UBYTOVANIE","_menu_name_7","Ubytování","0","0","0"),
("3347","1","23","5","content","Text k modulu INFO","_menu_1_text_1","<p><strong><span style=\"font-size:20px\"><span style=\"font-family:georgia,serif\"><span style=\"color:#FFFFFF\"><span style=\"background-color:#800000\">Hrajte s n&aacute;mi o 3 v&iacute;kendy pro dva v Salzburgu!</span></span></span></span><br />\n<span style=\"font-size:20px\"><span style=\"font-family:georgia,serif\"><span style=\"color:#A9A9A9\"><span style=\"background-color:#800000\">Hrajte s nami o 3 v&iacute;kendy pre dvoch v Salzburgu!</span></span></span></span></strong></p>\n","1","0","0"),
("3348","1","23","6","content","Text k modulu O SÚŤAŽI","_menu_2_text_1","<h3><span style=\"font-family:georgia,serif\"><span style=\"font-size:20px\"><strong>Nakupujte v prodejn&aacute;ch&nbsp;CORIAL v ČR a vyhrajte jeden z&nbsp;pobytů&nbsp;v rakousk&eacute;m&nbsp;SALZBURGU!<br />\n<span style=\"color:#A9A9A9\">Nakupujte v predajniach&nbsp;CORIAL v SR a vyhrajte jeden z&nbsp;pobytov&nbsp;v rak&uacute;skom&nbsp;SALZBURGU!</span></strong></span></span></h3>\n\n<p>&nbsp;</p>\n\n<p><span style=\"font-family:georgia,serif\"><span style=\"font-size:18px\">Stač&iacute; když v obdob&iacute; 10.3. - 30.4.&nbsp;2017&nbsp;nakoup&iacute;te&nbsp;<a href=\"http://www.corial.cz/cs/prodejny/\" target=\"_blank\">v&nbsp;prodejn&aacute;ch CORIAL</a><a href=\"http://www.corial.cz/cs/prodejny/\">&nbsp;v ČR</a> nad 500 Kč a&nbsp;zaregistrujete online svůj doklad o n&aacute;kupu.&nbsp;</span></span><br />\n<span style=\"color:#A9A9A9\"><span style=\"font-family:georgia,serif; font-size:18px\">Stač&iacute; ak&nbsp;v obdob&iacute; 10.3</span><span style=\"font-family:georgia,serif; font-size:18px\">. - 30</span><span style=\"font-family:georgia,serif; font-size:18px\">.4</span><span style=\"font-family:georgia,serif; font-size:18px\">.&nbsp;2017</span><span style=\"font-family:georgia,serif; font-size:18px\">&nbsp;nak&uacute;pite&nbsp;</span></span><a href=\"http://www.corial.sk/cs/predajne/\" target=\"_blank\"><span style=\"color:#A9A9A9\">v&nbsp;predajniach CORIAL</span></a><span style=\"font-family:georgia,serif; font-size:18px\"><a href=\"http://www.corial.sk/cs/predajne/\" target=\"_blank\"><span style=\"color:#A9A9A9\">&nbsp;v SR</span></a><span style=\"color:#A9A9A9\">&nbsp;nad 20 Eur&nbsp;a&nbsp;zaregistrujete online svoj doklad o n&aacute;kupe.</span></span></p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n","1","0","0"),
("3349","1","23","7","content","Text k modulu GALÉRIA","_menu_3_text_1","","1","0","0"),
("3350","1","23","8","content","Text k modulu FORMULÁR","_menu_4_text_1","<h3><span style=\"font-size:16px\"><strong><span style=\"font-family:georgia,serif\">Soutěž prob&iacute;h&aacute; 10.3. - 30.4. 2017 na &uacute;zem&iacute; ČR. </span></strong><span style=\"font-family:georgia,serif\">Zaregistrovat se můžete i v&iacute;cekr&aacute;t, pokud opakovaně nakoup&iacute;te v prodejn&aacute;ch CORIAL v ČR nad 500 Kč.</span></span></h3>\n\n<h3><span style=\"font-size:16px\"><span style=\"font-family:georgia,serif\"><strong><span style=\"color:#696969\">S&uacute;ťaž prebieha 10.3. - 30.4. 2017 na &uacute;zem&iacute; SR. </span></strong><span style=\"color:#696969\">Zaregistrovať sa m&ocirc;žete aj viackr&aacute;t, pokiaľ opakovane nak&uacute;pite v predajniach CORIAL v SR nad 20 Eur.</span></span></span></h3>\n\n<p><span style=\"font-size:16px\"><u><span style=\"font-family:georgia,serif\">V&yacute;hry (spolu&nbsp;</span><span style=\"font-family:georgia,serif\">ČR/SR)</span></u><span style=\"font-family:georgia,serif\"><u>: <strong>3x pobyt</strong></u></span><br />\n<span style=\"font-family:georgia,serif\"><strong>Každ&yacute; z pobytů zahrňuje ubytov&aacute;n&iacute; pro 2 osoby&nbsp;na 4 dny&nbsp;/&nbsp;3 noci ve 3-4* hotelu, včetně sn&iacute;daně a&nbsp;3-denn&iacute; slevov&eacute; karty&nbsp;<a href=\"http://www.salzburg.info/cs/sights/kartou_salcburku\" target=\"_blank\">SalzburgCard</a>&nbsp;</strong></span><br />\n<span style=\"font-family:georgia,serif\"><strong><span style=\"color:#696969\">Každ&yacute; z pobytov zahŕňa ubytovanie pre&nbsp;2 osoby&nbsp;na 4 dni&nbsp;/&nbsp;3 noci v&nbsp;3-4* hoteli s raňajkami, a 3-denn&uacute; zľavov&uacute;&nbsp;kartu</span><span style=\"color:rgb(169, 169, 169)\">&nbsp;</span><a href=\"http://www.salzburg.info/cs/sights/kartou_salcburku\" target=\"_blank\"><span style=\"color:#A52A2A\">SalzburgCard</span></a><span style=\"color:rgb(128, 0, 0)\">&nbsp;</span></strong></span></span></p>\n\n<p><span style=\"font-size:16px\"><span style=\"font-family:georgia,serif\">Přejeme V&aacute;m hodně &scaron;těst&iacute; při slosov&aacute;n&iacute;!</span></span><br />\n<span style=\"font-size:16px\"><span style=\"font-family:georgia,serif\"><span style=\"color:rgb(105, 105, 105)\">Prajeme V&aacute;m veľa &scaron;ťastia pri žrebovan&iacute;!</span></span></span></p>\n","1","0","0"),
("3351","1","23","9","content","Text k modulu O REGIÓNE","_menu_5_text_1","<p><span style=\"font-size:14px\"><span style=\"font-family:georgia,serif\"><span style=\"color:#000000\"><strong>Salzburg - Jevi&scaron;tě světa</strong><br />\nJako rodi&scaron;tě a působi&scaron;tě Wolfganga Amadea Mozarta a jako ději&scaron;tě Salzbursk&eacute;ho festivalu je Salzburg světově proslul&yacute;. Pod&iacute;v&aacute;te-li se bl&iacute;že, objev&iacute;te dokonalou harmonii př&iacute;rody a architektury zasazen&eacute; v n&aacute;dhern&eacute;m panoramatu okoln&iacute;ch hor a jezer.&nbsp;<br />\nZ&aacute;mek Mirabell a okoln&iacute; zahrada nab&iacute;zej&iacute; ohromuj&iacute;c&iacute; pohlednicov&yacute; v&yacute;hled na symbol Salzburgu, mohutnou pevnost Hohensalzburg z 11. stolet&iacute;, trůn&iacute;c&iacute; majest&aacute;tně nad Muzeem moderny na M&ouml;nchsbergu. Srdcem Star&eacute;ho města je středověk&aacute; Getreidegasse, kde se narodil nejslavněj&scaron;&iacute; syn Salzburgu, W.A. Mozart. Lid&eacute; se zde r&aacute;di setk&aacute;vaj&iacute; v tradičn&iacute;ch kav&aacute;rn&aacute;ch, u &bdquo;Melange&ldquo; (k&aacute;va s na&scaron;lehan&yacute;m ml&eacute;kem) nebo &bdquo;Gro&szlig;er Brauner&ldquo; (dvojit&eacute; espresso) v kav&aacute;rně Tomaselli, nejstar&scaron;&iacute; kav&aacute;rně Rakouska, nebo hned naproti v kav&aacute;rně F&uuml;rst, kde můžete ochutnat origin&aacute;ln&iacute; Mozartovy koule, kter&eacute; zde dodnes ručně vyr&aacute;b&iacute; pravnuk jejich vyn&aacute;lezce. Večer si pak můžete vychutnat v nejstar&scaron;&iacute;m restaurantu ve středn&iacute; Evropě, v Kl&aacute;&scaron;tern&iacute;m sklepě Sv. Petra, a nejl&eacute;pe při Mozartovsk&eacute; večeři. Kdo to m&aacute; raději trochu moderněj&scaron;&iacute;, určitě by neměl vynechat Red Bull Hangar 7. Hang&aacute;r č. 7, synonymum avantgardn&iacute; architektury, modern&iacute;ho uměn&iacute; a &scaron;pičkov&eacute; gastronomie.<br />\nV&iacute;ce o Salzburgu: </span><strong><a href=\"http://www.salzburg.info/cs\" target=\"_blank\"><span style=\"color:#800000\">www.salzburg.info/cs</span></a></strong></span></span></p>\n","1","0","0"),
("3352","1","23","9","content","Ďalší text k modulu O REGIÓNE","_menu_5_text_2","<p><span style=\"color:#696969\"><strong><span style=\"font-size:14px\"><span style=\"font-family:georgia,serif\">Salzburg - Javisko sveta</span></span></strong><br />\n<span style=\"font-size:14px\"><span style=\"font-family:georgia,serif\">Salzburg je svetozn&aacute;my ako rodisko a p&ocirc;sobisko Wolfganga Amadea Mozarta a tiež ako dejisko Salzbursk&eacute;ho festivalu. Ak sa prizriete bliž&scaron;ie, objav&iacute;te dokonal&uacute; harm&oacute;niu pr&iacute;rody a architekt&uacute;ry zasaden&eacute; do okolit&yacute;ch h&ocirc;r a jazier.</span></span><br />\n<span style=\"font-size:14px\"><span style=\"font-family:georgia,serif\">Z&aacute;mok Mirabell a okolit&aacute; z&aacute;hrada pon&uacute;kaj&uacute; ohromuj&uacute;ci pohľadnicov&yacute; v&yacute;hľad na symbol Salzburgu, mohutn&uacute; pevnosť Hohensalzburg z 11. storočia, tr&oacute;niaci majest&aacute;tne nad M&uacute;zeom moderny na M&ouml;nchsbergu. Srdcom Star&eacute;ho mesta je stredovek&aacute; Getreidegasse, kde sa narodil najsl&aacute;vnej&scaron;&iacute; syn Salzburgu, W.A. Mozart.&nbsp;</span></span></span><span style=\"font-size:14px\"><span style=\"font-family:georgia,serif\"><span style=\"color:#696969\">Ľudia sa tu r&aacute;di stret&aacute;vaj&uacute; v tradičn&yacute;ch kaviarňach, v &bdquo;Melange&ldquo; (k&aacute;va s na&scaron;ľahan&yacute;m mliekom) alebo &bdquo;Gro&szlig;er Brauner&ldquo; (dvojit&eacute; espresso) v kaviarni Tomaselli, najstar&scaron;ej kaviarni Rak&uacute;ska, alebo hneď oproti v kaviarni F&uuml;rst, kde m&ocirc;žete ochutnať origin&aacute;lne Mozartove gule, ktor&eacute; tu dodnes ručne vyr&aacute;ba pravnuk ich vyn&aacute;lezcu. Večer si m&ocirc;žete vychutnať v najstar&scaron;ej&nbsp;re&scaron;taur&aacute;cii&nbsp;v strednej Eurpe, v Kl&aacute;&scaron;tornej pivnici Sv. Petra, pri Mozartovskej večeri s &aacute;riami z Mozartov&yacute;ch opier. Kdo to m&aacute; rad&scaron;ej modernej&scaron;ie, určite by nemal vynechať Red Bull Hangar 7. Hang&aacute;r č. 7, synonymum avantgardnej architekt&uacute;ry, modern&eacute;ho umenia a &scaron;pičkovej gastron&oacute;mie.</span></span></span><br />\n<span style=\"font-size:14px\"><span style=\"font-family:georgia,serif\"><span style=\"color:#696969\">Viac o Salzburgu: </span><a href=\"http://www.salzburg.info/cs\" target=\"_blank\"><strong><span style=\"color:#800000\">www.salzburg.info/cs</span></strong></a></span></span></p>\n","1","0","0"),
("3353","1","23","10","content","Text k modulu MAPA","_menu_6_text_1","<p>Mapa regionu</p>\n","1","0","0"),
("3354","1","23","2","content","Text k modulu UBYTOVANIE 1","_menu_7_text_1","<p><strong>amiamo - Familotel Zell am See</strong></p>\n\n<p>Jako prvn&iacute; boutique hotel pro rodiny&nbsp;s dětmi jsme stanovili standardy pro&nbsp;v&yacute;jimečn&eacute; z&aacute;žitky z dovolen&eacute;: mal&yacute;,&nbsp;vybran&yacute; a individu&aacute;ln&iacute;, vyznamenan&yacute;&nbsp;nejvy&scaron;&scaron;&iacute; pečet&iacute; jakosti Q III. Luxusn&iacute;&nbsp;penzion Amiamo v kombinaci s&nbsp;kartou Zell am See-Kaprun zaručuje&nbsp;odpočinkovou, ale i vzru&scaron;uj&iacute;c&iacute;&nbsp;dovolenou pro celou rodinu. S v&iacute;ce&nbsp;než 20-ti letou zku&scaron;enost&iacute; nab&iacute;z&iacute;me&nbsp;<br />\nhl&iacute;d&aacute;n&iacute; dět&iacute; v vnitřn&iacute; sekci o plo&scaron;e&nbsp;500 m&sup2; s velk&yacute;m množstv&iacute;m aktivit.&nbsp;</p>\n\n<p>NOVINKA:&nbsp;Sekce Wellness o plo&scaron;e 300 m&sup2;&nbsp;disponuje 3 baz&eacute;ny, Babynariem&nbsp;a kompletně zrekonstruovanou&nbsp;sekc&iacute; saun&nbsp;s relaxačn&iacute; m&iacute;stnost&iacute;.&nbsp;</p>\n\n<p>Na jezeře Zeller&nbsp;See&nbsp;V&aacute;s&nbsp;oček&aacute;v&aacute;&nbsp;hotelov&aacute; pl&aacute;ž s bohatou nab&iacute;dkou!</p>\n","1","0","0"),
("3355","1","23","12","content","Input Meno","form_base_name","Jméno / Meno","1","0","0"),
("3356","1","23","12","content","Input Priezvisko","form_base_surname","Příjmení / Priezvisko","1","0","0"),
("3357","1","23","12","content","Input PSČ","form_base_psc","PSČ","1","0","0");
INSERT INTO dnt_microsites_composer VALUES
("3358","1","23","12","content","Input Mesto","form_base_city","Město / Mesto","1","0","0"),
("3359","1","23","12","content","Input Email","form_base_email","Email","1","0","0"),
("3360","1","23","12","content","Input Doklad","form_extend_v1_doklad","Doklad o nákupu - unikátní číslo účtenky: /  Doklad o nákupe - unikátne číslo účtenky: ","1","0","0"),
("3361","1","23","12","content","Input Otázka + odpovede","form_extend_v3_otazka","Salcburský festival je bezesporu jedním z největších hudebních festivalů všech dob, který výrazně přispěl k rozvoji hudební kultury na celém světě. Tipněte si kolik návštěvníků vidělo letošní Salcburský festival?","0","0","0"),
("3362","1","23","12","content","Odpoveď A","form_extend_v3_odpoved_a","áno","0","0","0"),
("3363","1","23","12","content","Odpoveď B","form_extend_v3_odpoved_b","neviem","0","0","0"),
("3364","1","23","12","content","Odpoveď C","form_extend_v3_odpoved_c","možno","0","0","0"),
("3365","1","23","4","content","Názov","field_word_nazov","Názov","0","0","0"),
("3366","1","23","4","content","Adresa","field_word_adresa","Adresa","0","0","0"),
("3367","1","23","4","content","Kontakt","field_word_kontakt","Kontakt","0","0","0"),
("3368","1","23","4","content","Web","field_word_web","Web","0","0","0"),
("3369","1","23","4","content","Hláška povinné pole","field_word_err","Toto pole je povinné","1","0","0"),
("3370","1","23","4","content","Registrovať","field_word_sent","Registrovat/Registrovať","1","0","0"),
("3371","1","23","4","content","Predchádzajúca (fotka)","field_word_previous","Předcházející/Predchádzajúca","1","0","0"),
("3372","1","23","4","content","Ďalšia (fotka)","field_word_next","Další/Ďalšia","1","0","0"),
("3373","1","23","4","content","Súhlasím s newslettrom","field_word_suhlas_news","Mám zájem o zasílání aktuálních novinek o Salzburgu. / Mám záujem o zasielanie aktuálnych noviniek o Salzburgu.","1","0","0"),
("3374","1","23","4","content","Súhlasím s podmienkami súťaže","field_word_suhlas_podm","Souhlasím s pravidly soutěže (PRAVIDLA ZDE). / Súhlasím s pravidlami súťaže (PRAVIDLÁ TU).","1","0","0"),
("3375","1","23","1","content","Kľúčové slová pre Google","keywords","soutěž Corial Salzburg","1","0","0"),
("3376","1","23","1","content","Popis pre Google","description","This competition has a first ID","1","0","0"),
("3377","1","23","4","content","Súhlasím s podmienkami súťaže","field_word_dakujeme","Děkujeme za Vaši účast a přejeme Vám hodně štěstí v soutěži! / Ďakujeme za Vašu účasť a prajeme Vám veľa šťstia v súťaži!","1","0","0"),
("3378","1","23","12","image","Podmienky súťaže (PDF)","form_file_podmienky","410","1","0","0"),
("3379","1","23","12","image","Newsletter (PDF)","form_file_newsletter","68","0","0","0"),
("3380","1","23","4","content","Hláška možnosti novej registrácie","field_word_nova_registracia","Pokud máte další doklad o nákupu můžete přejít k nové registraci ZDE. / Pokiaľ máte ďaľší doklad o nákupe môžete pokračovť v novej registrácii TU.","1","0","0"),
("3381","1","23","13","content","Počet znakov vygenerovaného hashu","_email_conf_char","8","1","0","0"),
("3382","1","23","13","content","Hláška, súťažiacemu ktorá mu príde na email po registracii.","_email_conf_sent_text","Děkujeme za registraci do soutěže a přejeme Vám hodně štěstí při slosování! / Ďakujeme za registráciu a želáme Vám veľa šťastia pri žrebovaní!","1","0","0"),
("3383","1","23","12","content","Telefónne číslo","form_base_tel_c","Telefon","0","0","0"),
("3384","1","23","4","content","Hláška za hviezdičkou o povinných poliach","field_word_povinne_polia","","1","0","0"),
("3385","1","23","2","image","Fotka loga k modulu UBYTOVANIE","_menu_7_image_2_1","59","0","0","0"),
("3386","1","23","16","content","Názov hotelu 2","info_hotel_name_2","Sporthotel Falkenstein","0","0","0"),
("3387","1","23","16","content","Adresa Hotela 2","info_hotel_addr_2","Nikolaus-Gassner-Str. 79   <br/>   A - 5710 Kaprun","1","0","0"),
("3388","1","23","16","content","Telefón do hotela 2","info_hotel_tel_c_2","+43 6547 7122","1","0","0"),
("3389","1","23","16","content","Email hotelu 2","info_hotel_email_2","sporthotel@falkenstein.at","1","0","0"),
("3390","1","23","16","content","Text k modulu UBYTOVANIE 2","_menu_7_text_2","<p><strong>Das Falkenstein</strong></p>\n\n<p>Tady v Kaprunu a hotelu Falkenstein lze objevit spoustu vzru&scaron;uj&iacute;c&iacute;ch možnost&iacute; a z&aacute;bavy&nbsp;pro rodiny a děti. Každ&yacute; den může b&yacute;t spojen s nov&yacute;mi z&aacute;žitky a dojmy, ať už jde&nbsp;o zvl&aacute;&scaron;tn&iacute; rodinn&eacute; turistick&eacute; v&yacute;lety, čvacht&aacute;n&iacute; a klouz&aacute;n&iacute; v Tauern SPA Kaprun, v&yacute;let&nbsp;k alpsk&eacute; horsk&eacute; bobov&eacute; dr&aacute;ze &quot;Maisfiltzer&quot;, o n&aacute;v&scaron;těvu volnočasov&eacute;ho nebo n&aacute;rodn&iacute;ho&nbsp;parku nebo o mnoh&aacute; dal&scaron;&iacute; dobrodružstv&iacute; - z&aacute;bavě se nekladou ž&aacute;dn&eacute; hranice.</p>\n\n<p>V hotelu Falkenstein&nbsp;se nach&aacute;z&iacute; kromě&nbsp;prostorn&eacute;ho&nbsp;dětsk&eacute;ho hři&scaron;tě&nbsp;a dětsk&eacute; herny tak&eacute;&nbsp;velk&yacute; baz&eacute;n a najdete&nbsp;zde i&nbsp;chutnou&nbsp;Pinzgauerskou&nbsp;kuchyni s pestr&yacute;mi&nbsp;dětsk&yacute;mi menu&nbsp;- n&aacute;&scaron; maskot Falki&nbsp;se na v&aacute;s tě&scaron;&iacute;!</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n","1","0","0"),
("3391","1","23","17","content","Text k modulu UBYTOVANIE 3","_menu_7_text_3","<p><strong>Dovolen&aacute; v Zell am See je dovolenou s požitkem - v hotelu Tirolerhof!</strong></p>\n\n<p>Jezero, hory, ledovec a stylov&yacute;, rodinn&yacute; 4-hvězdičkov&yacute; hotel superior v Zell am See &ndash; to je ide&aacute;ln&iacute; kombinace pro va&scaron;i dovolenou v Zell am See, v l&eacute;tě i v zimě. Budete m&iacute;t v&yacute;hled na jezero Zeller See, hory Schmittenh&ouml;he a Kitzsteinhorn se v&scaron;emi rozmanit&yacute;mi sportovn&iacute;mi a rekreačn&iacute;mi možnostmi a budete h&yacute;čk&aacute;ni v b&aacute;ječn&eacute;m a mimoř&aacute;dn&eacute;m hotelu kulin&aacute;řsk&yacute;mi specialitami nejvy&scaron;&scaron;&iacute; kvality. Nebo str&aacute;v&iacute;te dovolenou spojenou s golfem v Salcburku, kde budete m&iacute;t v&yacute;hled na n&aacute;dhern&eacute; hory a jezero oblasti Zell am See-Kaprun. Nebo si užijete ve dvou n&aacute;dhern&eacute; apartm&aacute;ny v r&aacute;mci romantick&eacute; dovolen&eacute;. Nebo si poř&aacute;dně odpočinete s wellness a l&aacute;zeňskou nab&iacute;dkou vy&scaron;&scaron;&iacute; tř&iacute;dy a načerp&aacute;te novou energii. Takto může vypadat va&scaron;e dal&scaron;&iacute; rekreačn&iacute; dovolen&aacute; v hotelu Tirolerhof Zell am See - v srdci Salcburku. Wellness hotel, čtyřhvězdičkov&yacute; hotel superior, hotel pro hosty s pejsky, relaxačn&iacute; hotel - v&scaron;echny tyto př&iacute;vlastky si hotel Tirolerhof plně zaslouž&iacute;.</p>\n\n<p>&nbsp;</p>\n\n<p><strong>Prožijte nezapomenutelnou dovolenou v hotelu Tirolerhof!</strong></p>\n","0","0","0"),
("3392","1","23","17","content","Email hotelu 3","info_hotel_email_3","welcome@tirolerhof.co.at","0","0","0"),
("3393","1","23","17","content","Telefón do hotela 3","info_hotel_tel_c_3","+43(0)6542/772-0","0","0","0"),
("3394","1","23","17","content","Adresa Hotela 3","info_hotel_addr_3","Auerspergstrasse 5   <br/>   A - 5700 Zell am See","0","0","0"),
("3395","1","23","17","content","Názov hotelu 3","info_hotel_name_3","Hotel Tirolerhof ****S","0","0","0"),
("3396","1","23","16","image","Fotka loga k modulu UBYTOVANIE 2","_menu_7_image_1_2","66","1","0","0"),
("3397","1","23","16","image","Fotka k modulu UBYTOVANIE 2","_menu_7_image_2_2","65","0","0","0"),
("3398","1","23","17","image","Fotka loga k modulu UBYTOVANIE 3","_menu_7_image_1_3","51","0","0","0"),
("3399","1","23","17","image","Fotka k modulu UBYTOVANIE 3","_menu_7_image_2_3","56","0","0","0"),
("3400","1","23","2","content","Url adresa hotela 1","link_hotel_1","https://www.amiamo.at","1","0","0"),
("3401","1","23","16","content","Url adresa hotela 2","link_hotel_2","http://www.falkenstein.at","1","0","0"),
("3402","1","23","17","content","Url adresa hotela 3","link_hotel_3","http://www.tirolerhof.co.at/","0","0","0"),
("3403","1","23","9","image","Druhá fotka modulu pre modul GALÉRIA","_menu_5_gallery_1","47","1","0","0"),
("3404","1","23","5","image","Fotka v hlavnom slideri 2","_menu_1_image_2","392","1","0","0"),
("3405","1","23","4","content","Po ukončení registrácie","field_word_koniec_registracie","<p>SOUTĚŽ BYLA UKONČENA DNE 1.11. 2016.</p>\n\n<p>Slosov&aacute;n&iacute; proběhlo dne 04.11.2016, ze v&scaron;ech přijat&yacute;ch platn&yacute;ch registrac&iacute; byli vybr&aacute;ni&nbsp; 3 v&yacute;herci dle pravidel soutěže. Dovolenkov&yacute; pobyt v Salzburgu pro 2 osoby na 4&nbsp;dny (3&nbsp;noci), ubytov&aacute;n&iacute; ve 3-4*hotelu se sn&iacute;dan&iacute;, včetně 3-denn&iacute; slevov&eacute; karty &bdquo;SalzburgCard&ldquo; z&iacute;sk&aacute;vaj&iacute; :</p>\n\n<p><strong>Tereza Seidlov&aacute;, 54701 N&aacute;chod, ČR</strong></p>\n\n<p><strong>Marie Herzogov&aacute;, 53701 Chrudim, ČR</strong></p>\n\n<p><strong>Gabriela Zpěv&aacute;kov&aacute;, 78313 &Scaron;těp&aacute;nov, ČR</strong></p>\n\n<p>V&yacute;herci budou kontaktov&aacute;ni provozovatelem soutěže ohledně převzet&iacute; pobytov&yacute;ch voucherů v nejbliž&scaron;&iacute;ch dnech. Pobytov&eacute; vouchery jsou platn&eacute; 31.10.2017, pobyty nezahrnujou dopravu.</p>\n\n<p><u><strong>V&scaron;em děkujeme za &uacute;čast a v&yacute;hercům srdečne blahopřejeme!</strong></u></p>\n\n<p><span style=\"font-size:12px\">Spr&aacute;vnost a platnost slosov&aacute;n&iacute; potvrzuj&iacute; provozovatel&eacute; soutěže:<br />\nOrganiz&aacute;tor: TSG Tourismus Salzburg GmbH Auerspergstra&szlig;e 6, 5020 Salzburg, Rakousko<br />\na spoluorganiz&aacute;tor soutěže: GOLDTIME a.s., U Libeňsk&eacute;ho pivovaru 10, Praha 8, Česk&aacute; republika</span></p>\n","0","0","0"),
("3406","1","23","11","content","Názov modulu pre modul O PARTNEROVI","_menu_name_8","Corial","1","4","0"),
("3407","1","23","15","content","Email partnera","info_partner_email","info@corial.cz <br/> info@goldtime.sk","1","0","0"),
("3408","1","23","15","content","Adresa partnera","info_partner_addr","SK: GOLDTIME - BL spol. s r.o. <br/> Rezedova 5 <br/> 821 01 Bratislava - SK ","1","0","0"),
("3409","1","23","15","content","Názov partnera","info_partner_name","ČR: GOLDTIME a.s. <br/> U Libeňského pivovaru 10 <br/> 180 00 Praha 8 - ČR","1","0","0"),
("3410","1","23","15","content","Telefónne číslo na partnera","info_partner_tel_c","ČR: +420 284 810 957 <br/> SK: +421 2 4342 5168","1","0","0"),
("3411","1","23","11","content","Text k modulu O PARTNEROVI 1","_menu_8_text_1","<p><span style=\"font-size:14px\"><span style=\"color:#000000\">Hodin&aacute;řsk&eacute; a klenotnick&eacute; obchody CORIAL najdete na v&iacute;ce než patn&aacute;cti m&iacute;stech v Česk&eacute; republice a na Slovensku. Nab&iacute;z&iacute;me hodinky a &scaron;perky renomovan&yacute;ch značek, doplňky k nim a tak&eacute; luxusn&iacute; d&aacute;rkov&eacute; zbož&iacute;. Specializujeme se na značky Citizen, Telstar, Police, Lovelinks a Pandora, jejichž nab&iacute;dka je u n&aacute;s exkluzivně největ&scaron;&iacute;. V nab&iacute;dce najdete i jin&eacute; zvučn&eacute; hodin&aacute;řsk&eacute; značky, např. Edox, Fr&eacute;derique Constant, Emporio Armani, Invicta a mnoho dal&scaron;&iacute;ch. Person&aacute;l V&aacute;m ochotně porad&iacute; nebo pomůže s v&yacute;běrem zbož&iacute; podle Va&scaron;ich představ.</span><span style=\"color:rgb(105, 105, 105)\"> </span></span><span style=\"font-size:14px\"><span style=\"color:rgb(105, 105, 105)\"><a href=\"http://www.corial.cz/cs/prodejny/\" target=\"_blank\">Přejeme V&aacute;m př&iacute;jemn&eacute; nakupov&aacute;n&iacute;!</a></span></span></p>\n\n<p><span style=\"font-size:14px\"><span style=\"color:#696969\">Hodin&aacute;rske&nbsp;a klenotn&iacute;cke predajne&nbsp;CORIAL n&aacute;jdete na viac&nbsp;než p&auml;tn&aacute;stich&nbsp;miestach&nbsp;na Slovensku a v Českej republike. Pon&uacute;kame hodinky a &scaron;perky renomovan&yacute;ch značiek, doplnky k nim a tiež luxusn&yacute; darčekov&yacute; tovar. &Scaron;pecializujeme sa&nbsp;na značky&nbsp;Citizen, Telstar, Police, Lovelinks a Pandora, ktor&yacute;ch ponuka&nbsp;je u n&aacute;s exkluz&iacute;vne&nbsp;najv&auml;č&scaron;ia. V ponuke&nbsp;n&aacute;jdete aj in&eacute;&nbsp;zvučn&eacute; hodin&aacute;rsk&eacute; značky, napr. Edox, Fr&eacute;derique Constant, Emporio Armani, Invicta a mnoho ďaľ&scaron;&iacute;ch. Person&aacute;l V&aacute;m ochotne&nbsp;porad&iacute; alebo&nbsp;pom&ocirc;že s v&yacute;berom tovaru podľa&nbsp;Va&scaron;ich predst&aacute;v.</span><span style=\"color:#808080\">&nbsp;</span><a href=\"http://www.corial.sk/cs/predajne/\" target=\"_blank\"><span style=\"color:#800000\">Prajeme V&aacute;m pr&iacute;jemn&eacute; nakupovanie!</span></a></span><span style=\"color:#800000\">&nbsp;</span></p>\n","1","0","0"),
("3412","1","23","1","content","Jazyková mutácia pre Facebook","_language","cs_CZ","1","0","0"),
("3413","1","23","12","image","Newsletter 2 (PDF)","form_file_newsletter_2","68","0","0","0"),
("3414","1","23","4","content","Súhlasím s newslettrom 2","field_word_suhlas_news_2","News 2","0","0","0"),
("3415","1","23","18","content","Email hotelu 4","info_hotel_email_4","welcome@tirolerhof.co.at","0","0","0"),
("3416","1","23","18","content","Telefón do hotela 4","info_hotel_tel_c_4","+43(0)6542/772-0","0","0","0"),
("3417","1","23","18","content","Adresa Hotela 4","info_hotel_addr_4","Auerspergstrasse 5   <br/>   A - 5700 Zell am See","1","0","0"),
("3418","1","23","18","content","Názov hotelu 4","info_hotel_name_4","Hotel Tirolerhof ****S","0","0","0"),
("3419","1","23","18","image","Fotka loga k modulu UBYTOVANIE 4","_menu_7_image_1_4","","0","0","0"),
("3420","1","23","18","image","Fotka k modulu UBYTOVANIE 4","_menu_7_image_2_4","","1","0","0"),
("3421","1","23","18","content","Url adresa hotela 4","link_hotel_4","http://www.tirolerhof.co.at/","0","0","0"),
("3422","1","23","18","content","Text k modulu UBYTOVANIE 4","_menu_7_text_4","","0","0","0"),
("3423","1","23","11","image","Fotka k modulu O PARTNEROVI","_menu_8_image_1","389","1","0","0"),
("3424","1","23","1","content","Google Plus","social_google_plus","https://plus.google.com/u/0/","0","0","0"),
("3425","1","23","12","content","Input Otázka","form_extend_v2_otazka","Napíšte farbu vášho PC","0","0","0"),
("3426","1","23","13","content","Odoslať potvrdzovací email","sent_confirm_mail","1","1","0","0"),
("3427","1","23","12","content","Voliteľný parameter 1","form_base_custom_1","Toto pole je voliteľné","0","0","0"),
("3428","1","24","1","content","Template","layout","dnt_first","1","0","0"),
("3429","1","24","15","content","Link partnera","link_partner","http://www.intersport-voswinkel.de","1","0","0"),
("3430","1","24","3","content","Link regionu","link_region","http://www.winterberg.de","1","0","0"),
("3431","1","24","1","content","Zobraziť na URL adrese","real_address","http://www.vyhrat.com/","1","0","0"),
("3432","1","24","1","content","Facebook","social_fb","https://www.facebook.com/INTERSPORT.Voswinkel","1","0","0"),
("3433","1","24","1","content","Twitter","social_twitter","https://twitter.com/winterberg","1","0","0"),
("3434","1","24","1","content","Instagram","social_linked_in","https://instagram.com/winterberg.de","1","0","0"),
("3435","1","24","1","content","Mapa ","map_location","https://www.google.de/maps/place/59955+Winterberg/@51.2008307,8.3733952,11z/data=!3m1!4b1!4m12!1m6!3m5!1s0x0:0xf607299a05ff2a12!2sLuge+Ferienwelt+Winterberg!8m2!3d51.15611!4d8.57039!3m4!1s0x47bb8d7eb151b87b:0x42760fc4a2a88d0!8m2!3d51.1935456!4d8.5275364","1","0","0"),
("3436","1","24","1","image","Favicon","favicon","57","1","0","0"),
("3437","1","24","1","content","Model farby R","_r","142","1","0","0"),
("3438","1","24","1","content","Model farby G","_g","168","1","0","0"),
("3439","1","24","1","content","Model farby B","_b","85","1","0","0"),
("3440","1","24","1","content","Font","_font","roboto","1","0","0"),
("3441","1","24","2","content","Názov hotelu 1","info_hotel_name_1","Landhaus Liesetal","1","0","0"),
("3442","1","24","2","content","Adresa Hotela 1","info_hotel_addr_1","Liesetal 9   <br/>  59969 Hallenberg-Liesen - DE","1","0","0"),
("3443","1","24","2","content","Telefón do hotela 1","info_hotel_tel_c_1","(02984) 9212-0","1","0","0"),
("3444","1","24","2","content","Email hotelu 1","info_hotel_email_1","info@haus-liesetal.de","1","0","0"),
("3445","1","24","3","content","Názov regiónu","info_region_name","Ferienregion Winterberg","1","0","0"),
("3446","1","24","3","content","Adresa regiónu","info_region_addr","Am Kurpark 4  <br/>  59955 Winterberg - DE","1","0","0"),
("3447","1","24","3","content","Telefónne číslo regiónu","info_region_tel_c","+49 (0) 2981-92500","1","0","0"),
("3448","1","24","3","content","Email regiónu","info_region_email","info@winterberg.de","1","0","0"),
("3449","1","24","1","content","Youtube video","youtube_video","6mNp2HZ2r6I","1","0","0"),
("3450","1","24","15","image","Logo partnera","partner_logo","98","1","0","0"),
("3451","1","24","3","image","Logo regiónu","region_logo","397","1","0","0"),
("3452","1","24","5","image","Fotka v hlavnom slideri 1","_menu_1_image_1","395","1","0","0"),
("3453","1","24","7","image","Fotka modulu pre modul GALÉRIA","_menu_3_image_1","402","1","0","0"),
("3454","1","24","7","image","Druhá fotka modulu pre modul GALÉRIA","_menu_3_image_2","400","1","0","0"),
("3455","1","24","2","image","Fotka k modulu UBYTOVANIE","_menu_7_image_1_1","406","1","0","0"),
("3456","1","24","5","content","Názov modulu pre modul INFO","_menu_name_1","Intro","1","0","0"),
("3457","1","24","6","content","Názov modulu pre modul O SÚŤAŽI","_menu_name_2","Gewinnspiel","0","0","0");
INSERT INTO dnt_microsites_composer VALUES
("3458","1","24","7","content","Názov modulu pre modul GALÉRIU","_menu_name_3","Galérie","0","0","0"),
("3459","1","24","8","content","Názov modulu pre modul FORMULÁRU","_menu_name_4","Teilnahme","1","0","0"),
("3460","1","24","9","content","Názov modulu pre modul O REGIONE","_menu_name_5","Ferienregion Winterberg","1","0","0"),
("3461","1","24","10","content","Názov modulu pre modul MAPA","_menu_name_6","Mapa","0","0","0"),
("3462","1","24","11","content","Názov modulu pre modul UBYTOVANIE","_menu_name_7","Teilnehmende Hotels","1","0","0"),
("3463","1","24","5","content","Text k modulu INFO","_menu_1_text_1","<p><span style=\"color:#FFFFFF\"><span style=\"font-size:20px\"><strong>Jetzt Familienurlaube in die Ferienregion Winterberg gewinnen!</strong></span></span></p>\n","1","0","0"),
("3464","1","24","6","content","Text k modulu O SÚŤAŽI","_menu_2_text_1","<p style=\"text-align:center\"><strong><span style=\"font-size:18px\">Wir verlosen&nbsp;Familienurlaube in die Ferienregion Winterberg&nbsp;inkl. der Sauerland SommerCard!</span></strong><br />\n<span style=\"font-size:18px\">Einfach Teilnahmeformular ausf&uuml;llen und schon spielen Sie um einen unvergesslichen Sommerurlaub mit!</span></p>\n\n<p style=\"text-align:center\"><strong><span style=\"font-size:16px\">Die Kampagne l&auml;uft von 01.03.2017 bis 31.03.2017.</span></strong></p>\n\n<p style=\"text-align:center\"><span style=\"font-size:16px\">Das gibt es zu gewinnen:</span><br />\n<strong><span style=\"font-size:16px\">2 Familienurlaube f&uuml;r 2 Erwachsene und 2 Kinder f&uuml;r 4 N&auml;chte im Hotel Schneider oder Landhotel Liesetal<br />\ninkl. Halbpension und der Sauerland SommerCard!</span></strong></p>\n","1","0","0"),
("3465","1","24","7","content","Text k modulu GALÉRIA","_menu_3_text_1","","0","0","0"),
("3466","1","24","8","content","Text k modulu FORMULÁR","_menu_4_text_1","<p>Ihre Registrierung:&nbsp;</p>\n","1","0","0"),
("3467","1","24","9","content","Text k modulu O REGIÓNE","_menu_5_text_1","<p><strong>Ferienwelt Winterberg - Begegnungen mit der Natur &ndash; und jeden Tag ein neues Abenteuer</strong></p>\n\n<p>Gr&uuml;nde, die Ferienwelt Winterberg zu besuchen, gibt es viele &ndash; zum Beispiel die vier &bdquo;Achthunderter&ldquo;, die gute Bergluft, den Trailpark Winterberg, den Landschaftstherapiepfad und unendlich viele Aktiv- und Freizeitangebote</p>\n\n<p>Kletterwald, Kart fahren, Sommerrodelbahn: Die Kids strahlen. Mountaincart, Planwagenfahrt oder Panorama Erlebnis Br&uuml;cke, die Ferienwelt steckt voller Abenteuer. Mit der Sauerland SommerCard brauchen Eltern den Kids keinen Wunsch mehr abzuschlagen. Mit diesem All-inclusive-Ticket erleben Familien rund 40 der Haupt-Freizeitangebote der Region &ndash; und das ohne einen Cent daf&uuml;r zu zahlen!</p>\n\n<p>Nicht nur in Winterberg, auch dar&uuml;ber hinaus gilt das familienfreundliche Angebot. Ob Freilichtb&uuml;hne Hallenberg, Arnsberger Lichtturm, Fort Fun, Dampfmuseum,&nbsp; Schippern auf den vier Sauerl&auml;nder Seen, ein Abstecher zu den Sauerland-Pyramiden in Lennestadt oder ins Nationalparkzentrum Kellerwald &ndash; die Auswahl ist riesig. Auch im AquaMundo oder dem gr&ouml;&szlig;ten Computermuseum der Welt haben G&auml;ste freien Eintritt.</p>\n\n<p>Bis zu 1000 Euro spart eine vierk&ouml;pfige Familie mit dem All-inclusive-Ticket. Hat &uuml;berdies freie Fahrt mit Bus und Bahn zu vielen Wander- und Ausflugszielen. Die Sauerland.SommerCard ist in rund 80 Beherbergungsbetrieben im Preis ab zwei &Uuml;bernachtungen enthalten Sie ist g&uuml;ltig vom 1. April bis 1. November und ab einer Aufenthaltsdauer von zwei &Uuml;bernachtungen.</p>\n","1","0","0"),
("3468","1","24","9","content","Ďalší text k modulu O REGIÓNE","_menu_5_text_2","<p>&nbsp;</p>\n\n<p>Dar&uuml;ber hinaus bietet die Ferienwelt Winterberg weitere Angebote die zum Entdecken und ausprobieren einladen. Mit 60 Kilometern Gesamtstreckenl&auml;nge, die &uuml;ber die Berge des Skiliftkarussells Winterberg f&uuml;hren, ist der Radon-Trailpark Winterberg einer der gr&ouml;&szlig;ten in Deutschland. Im Angebot sind vorwiegend familientaugliche Runden, doch auch anspruchsvolle Mountainbiker finden Herausforderungen. Die Winterberger Mountainbike-Profis haben 20 Kilometern Single-Trails angelegt und Anliegerkurven, North-Shore-Elemente, Wurzel- oder Steinpassagen eingearbeitet.</p>\n\n<p>Tipp: Mit einem gel&auml;ndeg&auml;ngigen E-Bike bew&auml;ltigen Radfahrer mit etwas weniger Wadenst&auml;rke das abwechslungsreiche Terrain ganz ohne Schwitzen und Schnaufen. Selbst schmale, steile Anstiege und Wurzelpassagen sind kein Problem. Verschiedene Verleiher vor Ort halten E-Mountainbikes bereit.</p>\n\n<p>Die Begegnung mit der Natur erleben Wanderer auf dem Landschaftstherapiepfad als spannende &bdquo;Reise ins eigene Ich&ldquo;. Mitten durch die faszinierende Niedersfelder Hochheide f&uuml;hrt dieser f&uuml;nf Kilometer lange &bdquo;Goldene Pfad&ldquo;. Unterwegs rufen zehn Achtsamkeitsstationen dazu auf, sich zu entspannen, die Natur zu entdecken und allt&auml;gliche Dinge mit neuen Augen zu sehen.</p>\n\n<p>Mehr Infos gibt die Tourist-Information Winterberg unter Telefon 02981/92500 und <a href=\"mailto:info@winterberg.de\">info@winterberg.de</a> oder unter<span style=\"font-family:arial,helvetica,sans-serif\">:&nbsp;</span><a href=\"http://www.winterberg.de\" target=\"_blank\">www.winterberg.de</a></p>\n","1","0","0"),
("3469","1","24","10","content","Text k modulu MAPA","_menu_6_text_1","<p>Mapa regionu</p>\n","0","0","0"),
("3470","1","24","2","content","Text k modulu UBYTOVANIE 1","_menu_7_text_1","<p><strong>Landhaus Liesetal</strong></p>\n\n<p>Das familiengef&uuml;hrte 3 Sterne <strong>Hotel Landhaus Liesetal</strong> hat f&uuml;r jeden Geschmack etwas zu bieten.</p>\n\n<p>Ob Wandern, Kultur, Nordic Walking oder Mountainbiking &ndash; direkt am Zuwanderweg Rothaarsteig, Sauerland H&ouml;henflug und Hallenberger Wanderrausch, zwischen Winterberg und Willingen gelegen, ist das Hotel der ideale Ausgangspunkt f&uuml;r die unterschiedlichsten Aktivit&auml;ten.</p>\n\n<p>Auch die Entspannung kommt im Landhaus nicht zu kurz: Einfach die Seele baumeln lassen - beim genie&szlig;en der regionalen K&uuml;che, in der Sauna oder bei vielf&auml;ltigen Wellnessmassagen.</p>\n\n<p>Mehr Infos unter:&nbsp;<a href=\"http://www.landhaus-liesetal.de\">www.landhaus-liesetal.de</a></p>\n","1","0","0"),
("3471","1","24","12","content","Input Meno","form_base_name","Vorname","1","0","0"),
("3472","1","24","12","content","Input Priezvisko","form_base_surname","Nachname","1","0","0"),
("3473","1","24","12","content","Input PSČ","form_base_psc","Straße","1","0","0"),
("3474","1","24","12","content","Input Mesto","form_base_city","Stadt","1","0","0"),
("3475","1","24","12","content","Input Email","form_base_email","eMail","1","0","0"),
("3476","1","24","12","content","Input Doklad","form_extend_v1_doklad","Einkaufsbeleg Nr.","0","0","0"),
("3477","1","24","12","content","Input Otázka + odpovede","form_extend_v3_otazka","Wie hoch ist der „König der Sauerländer Berge“ der Kahle Asten?","1","0","0"),
("3478","1","24","12","content","Odpoveď A","form_extend_v3_odpoved_a","682 m","1","0","0"),
("3479","1","24","12","content","Odpoveď B","form_extend_v3_odpoved_b","732 m","1","0","0"),
("3480","1","24","12","content","Odpoveď C","form_extend_v3_odpoved_c","842 m","1","0","0"),
("3481","1","24","4","content","Názov","field_word_nazov","Názov","0","0","0"),
("3482","1","24","4","content","Adresa","field_word_adresa","Adresa","0","0","0"),
("3483","1","24","4","content","Kontakt","field_word_kontakt","Kontakt","0","0","0"),
("3484","1","24","4","content","Web","field_word_web","Web","0","0","0"),
("3485","1","24","4","content","Hláška povinné pole","field_word_err","Pflichtfelder","1","0","0"),
("3486","1","24","4","content","Registrovať","field_word_sent","Teilnehmen","1","0","0"),
("3487","1","24","4","content","Predchádzajúca (fotka)","field_word_previous","Vorheriges","1","0","0"),
("3488","1","24","4","content","Ďalšia (fotka)","field_word_next","Nächstes","1","0","0"),
("3489","1","24","4","content","Súhlasím s newslettrom","field_word_suhlas_news","Ja, ich stimme zu den Newsletter der Ferienregion Winterberg, dem Hotel Schneider und dem Landhotel Liesetal zu erhalten und meine Daten für weitere Marketingaktivitäten zur Verfügung zu stellen.","1","0","0"),
("3490","1","24","4","content","Súhlasím s podmienkami súťaže","field_word_suhlas_podm","Ja, ich stimme den Teilnahmebedingungen zu. (Teilnahmebedingungen HIER).","1","0","0"),
("3491","1","24","1","content","Kľúčové slová pre Google","keywords","Ferienregion Winterberg","1","0","0"),
("3492","1","24","1","content","Popis pre Google","description","This competition has a first ID","1","0","0"),
("3493","1","24","4","content","Súhlasím s podmienkami súťaže","field_word_dakujeme","Danke, Sie haben sich erfolgreich für das Gewinnspiel registriert.","1","0","0"),
("3494","1","24","12","image","Podmienky súťaže (PDF)","form_file_podmienky","403","1","0","0"),
("3495","1","24","12","image","Newsletter (PDF)","form_file_newsletter","404","0","0","0"),
("3496","1","24","4","content","Hláška možnosti novej registrácie","field_word_nova_registracia","Jetzt Freunde einladen!","1","0","0"),
("3497","1","24","13","content","Počet znakov vygenerovaného hashu","_email_conf_char","8","1","0","0"),
("3498","1","24","13","content","Hláška, súťažiacemu ktorá mu príde na email po registracii.","_email_conf_sent_text","Danke, Sie haben sich erfolgreich für das Gewinnspiel registriert. Wir wünschen Ihnen viel Erfolg bei der Verlosung!","1","0","0"),
("3499","1","24","12","content","Telefónne číslo","form_base_tel_c","Tel. Nr.","1","0","0"),
("3500","1","24","4","content","Hláška za hviezdičkou o povinných poliach","field_word_povinne_polia","","1","0","0"),
("3501","1","24","2","image","Fotka loga k modulu UBYTOVANIE","_menu_7_image_2_1","407","0","0","0"),
("3502","1","24","16","content","Názov hotelu 2","info_hotel_name_2","Hotel Schneider","1","0","0"),
("3503","1","24","16","content","Adresa Hotela 2","info_hotel_addr_2","Am Waltenberg 58  <br/>   59955 Winterberg -  DE","1","0","0"),
("3504","1","24","16","content","Telefón do hotela 2","info_hotel_tel_c_2","(02981) 899738","1","0","0"),
("3505","1","24","16","content","Email hotelu 2","info_hotel_email_2","info@hotel-schneider-winterberg.de ","1","0","0"),
("3506","1","24","16","content","Text k modulu UBYTOVANIE 2","_menu_7_text_2","<p><strong>Hotel Schneider</strong></p>\n\n<p>Im <strong>Hotel Schneider</strong> ist f&uuml;r jeden etwas dabei.</p>\n\n<p>Gem&uuml;tliche und ger&auml;umige Zimmer laden zum Verweilen ein und auch sonst hat das Hotel viele Annehmlichkeiten zu bieten: Restaurant, Hotelbar, kostenloses WLAN, Kinderspielecke, Sitzgelegenheit an der Rezeption, Bio Sauna, Finnische Sauna, Solarium, Infrarotkabine, Massagesessel, Fitnessger&auml;te, Lift und Kaminecke.</p>\n\n<p>Das Hotel Schneider ist zentral aber tortzdem sehr ruhig gelegen. Das Zentrum von Winterberg mit seinen zahlreichen Freizeit- und Einkaufsm&ouml;glichkeiten ist zu Fu&szlig; erreichbar. Der Einstieg in das Skiliftkarussell Winterberg &nbsp;sowie der Erlebnisberg Kappe liegen ebenfalls in direkter Nachbarschaft.</p>\n\n<p>Mehr Infos unter:&nbsp;<a href=\"http://www.hotel-schneider-winterberg.de\">www.hotel-schneider-winterberg.de</a></p>\n","1","0","0"),
("3507","1","24","17","content","Text k modulu UBYTOVANIE 3","_menu_7_text_3","<p><strong>Dovolen&aacute; v Zell am See je dovolenou s požitkem - v hotelu Tirolerhof!</strong></p>\n\n<p>Jezero, hory, ledovec a stylov&yacute;, rodinn&yacute; 4-hvězdičkov&yacute; hotel superior v Zell am See &ndash; to je ide&aacute;ln&iacute; kombinace pro va&scaron;i dovolenou v Zell am See, v l&eacute;tě i v zimě. Budete m&iacute;t v&yacute;hled na jezero Zeller See, hory Schmittenh&ouml;he a Kitzsteinhorn se v&scaron;emi rozmanit&yacute;mi sportovn&iacute;mi a rekreačn&iacute;mi možnostmi a budete h&yacute;čk&aacute;ni v b&aacute;ječn&eacute;m a mimoř&aacute;dn&eacute;m hotelu kulin&aacute;řsk&yacute;mi specialitami nejvy&scaron;&scaron;&iacute; kvality. Nebo str&aacute;v&iacute;te dovolenou spojenou s golfem v Salcburku, kde budete m&iacute;t v&yacute;hled na n&aacute;dhern&eacute; hory a jezero oblasti Zell am See-Kaprun. Nebo si užijete ve dvou n&aacute;dhern&eacute; apartm&aacute;ny v r&aacute;mci romantick&eacute; dovolen&eacute;. Nebo si poř&aacute;dně odpočinete s wellness a l&aacute;zeňskou nab&iacute;dkou vy&scaron;&scaron;&iacute; tř&iacute;dy a načerp&aacute;te novou energii. Takto může vypadat va&scaron;e dal&scaron;&iacute; rekreačn&iacute; dovolen&aacute; v hotelu Tirolerhof Zell am See - v srdci Salcburku. Wellness hotel, čtyřhvězdičkov&yacute; hotel superior, hotel pro hosty s pejsky, relaxačn&iacute; hotel - v&scaron;echny tyto př&iacute;vlastky si hotel Tirolerhof plně zaslouž&iacute;.</p>\n\n<p>&nbsp;</p>\n\n<p><strong>Prožijte nezapomenutelnou dovolenou v hotelu Tirolerhof!</strong></p>\n","0","0","0"),
("3508","1","24","17","content","Email hotelu 3","info_hotel_email_3","welcome@tirolerhof.co.at","0","0","0"),
("3509","1","24","17","content","Telefón do hotela 3","info_hotel_tel_c_3","+43(0)6542/772-0","0","0","0"),
("3510","1","24","17","content","Adresa Hotela 3","info_hotel_addr_3","Auerspergstrasse 5   <br/>   A - 5700 Zell am See","0","0","0"),
("3511","1","24","17","content","Názov hotelu 3","info_hotel_name_3","Hotel Tirolerhof ****S","0","0","0"),
("3512","1","24","16","image","Fotka loga k modulu UBYTOVANIE 2","_menu_7_image_1_2","409","0","0","0"),
("3513","1","24","16","image","Fotka k modulu UBYTOVANIE 2","_menu_7_image_2_2","408","1","0","0"),
("3514","1","24","17","image","Fotka loga k modulu UBYTOVANIE 3","_menu_7_image_1_3","51","0","0","0"),
("3515","1","24","17","image","Fotka k modulu UBYTOVANIE 3","_menu_7_image_2_3","56","0","0","0"),
("3516","1","24","2","content","Url adresa hotela 1","link_hotel_1","http://www.landhaus-liesetal.de","1","0","0"),
("3517","1","24","16","content","Url adresa hotela 2","link_hotel_2","http://www.hotel-schneider-winterberg.de","1","0","0"),
("3518","1","24","17","content","Url adresa hotela 3","link_hotel_3","http://www.tirolerhof.co.at/","0","0","0"),
("3519","1","24","9","image","Druhá fotka modulu pre modul GALÉRIA","_menu_5_gallery_1","46","1","0","0"),
("3520","1","24","5","image","Fotka v hlavnom slideri 2","_menu_1_image_2","401","1","0","0"),
("3521","1","24","4","content","Po ukončení registrácie","field_word_koniec_registracie","<p><span style=\"color:#FF0000\"><span style=\"font-size:20px\"><strong><span style=\"font-family:arial,sans-serif\">Das&nbsp;</span>Gewinnspiel<span style=\"font-family:arial,sans-serif\">&nbsp;ist&nbsp;</span>bereits beendet<span style=\"font-family:arial,sans-serif\">!</span></strong></span></span></p>\n\n<p><span style=\"color:#FF0000\"><span style=\"font-size:20px\">Wir&nbsp;danken<span style=\"font-family:arial,sans-serif\">&nbsp;euch f&uuml;r die rege&nbsp;</span>Teilnahme<span style=\"font-family:arial,sans-serif\">!</span></span></span></p>\n\n<p><span style=\"font-size:18px\"><span style=\"color:#FF0000\"><span style=\"font-family:arial,sans-serif\">Unsere Gl&uuml;ckw&uuml;nsche an die folgenden&nbsp;</span>Gewinner<span style=\"font-family:arial,sans-serif\">:</span></span></span></p>\n","0","0","0"),
("3522","1","24","11","content","Názov modulu pre modul O PARTNEROVI","_menu_name_8","Intersport Voswinkel","1","0","0"),
("3523","1","24","15","content","Email partnera","info_partner_email","info@intersport-voswinkel.de","1","0","0"),
("3524","1","24","15","content","Adresa partnera","info_partner_addr","Brennaborstrasse 12 <br/>  44149 Dortmund - DE","1","0","0"),
("3525","1","24","15","content","Názov partnera","info_partner_name","Sport Voswinkel GmbH & Co. KG","1","0","0"),
("3526","1","24","15","content","Telefónne číslo na partnera","info_partner_tel_c","+49231999600","1","0","0"),
("3527","1","24","11","content","Text k modulu O PARTNEROVI 1","_menu_8_text_1","<p><strong>INTERSPORT Voswinkel</strong> ist ein Unternehmen mit 110 Jahren Handelserfahrung. Wir sind ein filialisiertes Sportfachhandelsunternehmen mit klarem Fokus auf den Breitensport.</p>\n\n<p>&bull; &nbsp; Wir orientieren uns an unseren Kunden.<br />\n&bull; &nbsp; Wir streben nach Spitzenleistung.<br />\n&bull; &nbsp; Wir betreiben Handel mit Leidenschaft und Liebe zum Detail.<br />\n&bull; &nbsp; Wir f&uuml;hren die Top-Marken des Sporthandels.<br />\n&bull; &nbsp; Wir haben flache Hierarchien und dadurch kurze Entscheidungswege.</p>\n\n<p><strong>Weitere Aktionen von INTERSPORT Voswinkel findest du </strong><a href=\"http://www.intersport-voswinkel.de/\" target=\"_blank\"><strong>hier!</strong></a></p>\n","1","0","0"),
("3528","1","24","1","content","Jazyková mutácia pre Facebook","_language","de_DE","1","0","0"),
("3529","1","24","12","image","Newsletter 2 (PDF)","form_file_newsletter_2","405","0","0","0"),
("3530","1","24","4","content","Súhlasím s newslettrom 2","field_word_suhlas_news_2","News 2","0","0","0"),
("3531","1","24","18","content","Email hotelu 4","info_hotel_email_4","welcome@tirolerhof.co.at","0","0","0"),
("3532","1","24","18","content","Telefón do hotela 4","info_hotel_tel_c_4","+43(0)6542/772-0","0","0","0"),
("3533","1","24","18","content","Adresa Hotela 4","info_hotel_addr_4","Auerspergstrasse 5   <br/>   A - 5700 Zell am See","1","0","0"),
("3534","1","24","18","content","Názov hotelu 4","info_hotel_name_4","Hotel Tirolerhof ****S","0","0","0"),
("3535","1","24","18","image","Fotka loga k modulu UBYTOVANIE 4","_menu_7_image_1_4","","0","0","0"),
("3536","1","24","18","image","Fotka k modulu UBYTOVANIE 4","_menu_7_image_2_4","","1","0","0"),
("3537","1","24","18","content","Url adresa hotela 4","link_hotel_4","http://www.tirolerhof.co.at/","0","0","0"),
("3538","1","24","18","content","Text k modulu UBYTOVANIE 4","_menu_7_text_4","","0","0","0"),
("3539","1","24","11","image","Fotka k modulu O PARTNEROVI","_menu_8_image_1","398","1","0","0"),
("3540","1","24","1","content","Google Plus","social_google_plus","http://plus.google.com/+WinterbergDe842","1","0","0"),
("3541","1","24","12","content","Input Otázka","form_extend_v2_otazka","Wie viele Pistenkilometer bietet ? ","0","0","0"),
("3542","1","24","13","content","Odoslať potvrdzovací email","sent_confirm_mail","1","1","0","0"),
("3543","1","24","12","content","Voliteľný parameter 1","form_base_custom_1","PLZ","1","0","0"),
("3544","1","25","1","content","Template","layout","dnt_first","1","0","0"),
("3545","1","25","15","content","Link partnera","link_partner","http://www.kilpi.cz","1","0","0"),
("3546","1","25","3","content","Link regionu","link_region","http://www.schladming-dachstein.at","1","0","0"),
("3547","1","25","1","content","Zobraziť na URL adrese","real_address","http://www.vyhrat.com/","1","0","0"),
("3548","1","25","1","content","Facebook","social_fb","https://www.facebook.com/kilpisport","1","0","0"),
("3549","1","25","1","content","Twitter","social_twitter","https://twitter.com/SchlaTourism","1","0","0"),
("3550","1","25","1","content","Instagram","social_linked_in","https://www.instagram.com/kilpisport/","1","0","0"),
("3551","1","25","1","content","Mapa ","map_location","https://www.google.cz/maps/place/Schladming-Dachstein+Tourismusmarketing+GmbH/@47.4301562,13.5867908,12z/data=!4m8!1m2!2m1!1sSchladming-Dachstein+Tourismus!3m4!1s0x4771256a44c16259:0x22e482ea2c31ff12!8m2!3d47.396843!4d13.684136","1","0","0"),
("3552","1","25","1","image","Favicon","favicon","57","1","0","0"),
("3553","1","25","1","content","Model farby R","_r","175","1","0","0"),
("3554","1","25","1","content","Model farby G","_g","200","1","0","0"),
("3555","1","25","1","content","Model farby B","_b","20","1","0","0"),
("3556","1","25","1","content","Font","_font","Arial","1","0","0"),
("3557","1","25","2","content","Názov hotelu 1","info_hotel_name_1","Stadthotel brunner","1","0","0");
INSERT INTO dnt_microsites_composer VALUES
("3558","1","25","2","content","Adresa Hotela 1","info_hotel_addr_1","Hauptplatz 14   <br/>   A - 8970 Schladming","1","0","0"),
("3559","1","25","2","content","Telefón do hotela 1","info_hotel_tel_c_1","+43 (0) 3687 22513","1","0","0"),
("3560","1","25","2","content","Email hotelu 1","info_hotel_email_1","welcome@stadthotel-brunner.at","1","0","0"),
("3561","1","25","3","content","Názov regiónu","info_region_name","Schladming-Dachstein","1","0","0"),
("3562","1","25","3","content","Adresa regiónu","info_region_addr","Ramsauerstraße 756  <br/>  A-8970 Schladming","1","0","0"),
("3563","1","25","3","content","Telefónne číslo regiónu","info_region_tel_c","+43 3687 233 10","1","0","0"),
("3564","1","25","3","content","Email regiónu","info_region_email","info@schladming-dachstein.at","1","0","0"),
("3565","1","25","1","content","Youtube video","youtube_video","KyIbL6DRX4k","1","0","0"),
("3566","1","25","15","image","Logo partnera","partner_logo","111","1","0","0"),
("3567","1","25","3","image","Logo regiónu","region_logo","414","1","0","0"),
("3568","1","25","5","image","Fotka v hlavnom slideri 1","_menu_1_image_1","413","1","0","0"),
("3569","1","25","7","image","Fotka modulu pre modul GALÉRIA","_menu_3_image_1","124","0","0","0"),
("3570","1","25","7","image","Druhá fotka modulu pre modul GALÉRIA","_menu_3_image_2","121","0","0","0"),
("3571","1","25","2","image","Fotka k modulu UBYTOVANIE","_menu_7_image_1_1","415","1","0","0"),
("3572","1","25","5","content","Názov modulu pre modul INFO","_menu_name_1","Intro","1","0","0"),
("3573","1","25","6","content","Názov modulu pre modul O SÚŤAŽI","_menu_name_2","O soutěži","0","0","0"),
("3574","1","25","7","content","Názov modulu pre modul GALÉRIU","_menu_name_3","Galérie","0","0","0"),
("3575","1","25","8","content","Názov modulu pre modul FORMULÁRU","_menu_name_4","Registrace","1","3","0"),
("3576","1","25","9","content","Názov modulu pre modul O REGIONE","_menu_name_5","Schladming-Dachstein","1","2","0"),
("3577","1","25","10","content","Názov modulu pre modul MAPA","_menu_name_6","Mapa","0","0","0"),
("3578","1","25","11","content","Názov modulu pre modul UBYTOVANIE","_menu_name_7","Partnerské hotely","1","4","0"),
("3579","1","25","5","content","Text k modulu INFO","_menu_1_text_1","<p><span style=\"font-size:22px\"><strong>Nakupujte KILPI a vyhrajte letn&iacute; pobyt&nbsp;v Schladming-Dachstein!</strong></span></p>\n","1","0","0"),
("3580","1","25","6","content","Text k modulu O SÚŤAŽI","_menu_2_text_1","<h3>Za n&aacute;kup KILPI v hodnotě nad 1000 Kč v ČR / nad 40 &euro; v&nbsp;SR / v kamenn&yacute;ch prodejn&aacute;ch KILPI stores v ČR a SR, nebo na někter&eacute;m z e-shopů: <a href=\"http://www.shopkilpi.cz\" target=\"_blank\">www.shopkilpi.cz</a>&nbsp;, <a href=\"http://www.hs-sport.cz\" target=\"_blank\">www.hs-sport.cz</a> , <a href=\"http://www.envy-shop.cz\" target=\"_blank\">www.envy-shop.cz</a> , <a href=\"http://www.kilpi-shop.sk\" target=\"_blank\">www.kilpi-shop.sk</a> , <a href=\"http://www.envyeshop.com\" target=\"_blank\">www.envyeshop.com</a> , <a href=\"http://www.kilpi4you.com\" target=\"_blank\">www.kilpi4you.com</a> , teď můžete vyhr&aacute;t letn&iacute; pobyt pro dva v Schladming-Dachstein!</h3>\n\n<p><span style=\"font-size:18px\"><strong>Soutěž prob&iacute;ha od 15.03. do 15.05.2017.&nbsp;</strong></span><br />\n<span style=\"font-size:18px\">Do soutěže se můžete zaregistrovat i v&iacute;cekr&aacute;t, pokud opakovaně nakoup&iacute;te v s&iacute;ti KILPI. Doklad z n&aacute;kupu si uschovejte pro př&iacute;pad v&yacute;hry.<br />\nV&yacute;hry v soutěži:&nbsp;<strong>3x letn&iacute;&nbsp;dovolen&aacute; pro 2 osoby, na 4 dny / 3 noci v hotelu s polopenz&iacute;, v&nbsp;rakousk&eacute;m Schladming-Dachstein.</strong></span></p>\n\n<p><span style=\"font-size:20px\">Přejeme V&aacute;m hodně &scaron;těst&iacute; při slosov&aacute;n&iacute;!</span></p>\n","1","0","0"),
("3581","1","25","7","content","Text k modulu GALÉRIA","_menu_3_text_1","","1","0","0"),
("3582","1","25","8","content","Text k modulu FORMULÁR","_menu_4_text_1","","1","0","0"),
("3583","1","25","9","content","Text k modulu O REGIÓNE","_menu_5_text_1","<p><strong>Schladming-Dachstein:<br />\nNedotčen&aacute; př&iacute;roda, divok&eacute; vody a spousta z&aacute;žitků​&nbsp;</strong><br />\nN&aacute;dhern&eacute; v&aacute;pencov&eacute; stěny zaledněn&eacute;ho Dachsteinu, nesčetn&eacute; vrcholy a 300 horsk&yacute;ch jezer Schladmingsk&yacute;ch Taur jsou r&aacute;jem pro aktivn&iacute; dovolenou i klidn&yacute; odpočinek. Sportovn&iacute; rozmanitost dokazuje 1000 km turistick&yacute;ch cest, 930 km cyklistick&yacute;ch a bikersk&yacute;ch tras, 45 běžeck&yacute;ch trat&iacute; a tras pro severskou chůzi a 5 golfov&yacute;ch hři&scaron;ť. Zapomenout nelze ani na bohat&eacute; možnosti lezen&iacute;, raftingu, canyoningu, lukostřelby a paraglidingu.</p>\n\n<p><strong>Vrcholov&eacute; &scaron;těst&iacute; a vrcholn&yacute; z&aacute;žitek z krajiny</strong><br />\nPr&aacute;zdninov&yacute; region Schladming-Dachstein se v l&eacute;tě proměňuje&nbsp;v pr&eacute;miov&yacute; region pě&scaron;&iacute; turistiky. A nez&aacute;lež&iacute; na tom, jestli d&aacute;&scaron; přednost pohodov&yacute;m proch&aacute;zk&aacute;m do př&iacute;rody nebo Tě l&aacute;kaj&iacute; vysok&eacute; vrcholy, tady určitě najde&scaron; svou obl&iacute;benou cestu. Nab&iacute;dka sah&aacute; od rodinn&yacute;ch v&yacute;letů přes vrcholn&eacute; požitky z krajiny až po <a href=\"http://www.schladming-dachstein.at/cs/rekreacni-aktivity/leto\" target=\"_blank\">putov&aacute;n&iacute; za prameny a vodou</a> nebo alpsk&eacute; t&uacute;ry a dob&yacute;v&aacute;n&iacute; vrcholů.</p>\n\n<p><strong>Z&aacute;bava pro bikery</strong><br />\nPr&aacute;zdninov&yacute; region Schladming-Dachstein lze pozn&aacute;vat na horsk&eacute;m kole ve v&scaron;ech &uacute;rovn&iacute;ch obt&iacute;žnosti s celkem 25.000 metry přev&yacute;&scaron;en&iacute; na 930 km značen&yacute;ch tras.</p>\n","1","0","0"),
("3584","1","25","9","content","Ďalší text k modulu O REGIÓNE","_menu_5_text_2","<p>Bikersk&eacute; hotely oblasti Schladming-Dachstein jsou ubytovac&iacute; podniky speci&aacute;lně deklarovan&eacute; jako &bdquo;př&iacute;větiv&eacute; k bikerům&ldquo; a nab&iacute;zej&iacute; jim jedinečn&yacute; servis. V&iacute;ce na:&nbsp;<a href=\"http://www.schladming-dachstein.at/cs/rekreacni-aktivity/leto/cyklo\" target=\"_blank\">www.schladming-dachstein.at/bike</a></p>\n\n<p><strong>&Scaron;t&yacute;rsk&aacute; pohostinnost</strong><br />\nO potřebn&eacute; pos&iacute;len&iacute; po takov&eacute; porci př&iacute;rody a aktivit se postaraj&iacute; obhospodařov&aacute;van&eacute; pastviny a horsk&eacute; chaty regionu Schladming-Dachstein. Svačinky na prk&eacute;nku (Brettljause), restovan&eacute; brambory s&nbsp;hověz&iacute;m masem (Gr&ouml;stl) nebo c&iacute;sařsk&yacute; trhanec (Kaisersmarrn) - pro každ&yacute; jaz&yacute;ček se určitě něco najde.</p>\n\n<p><strong>Letn&iacute; karta Schladming-Dachstein - V T&Eacute; JE V&Iacute;C!</strong><br />\nS <a href=\"http://www.schladming-dachstein.at/cs/rekreacni-aktivity/leto/summercard\" target=\"_blank\">letn&iacute; kartou Schladming-Dachstein</a> dostane&scaron; voln&yacute; vstup na v&iacute;ce než 100 nejlep&scaron;&iacute;ch rekreačn&iacute;ch atrakc&iacute; a až 50 % slevy u v&iacute;ce než 100 partnerů bonusov&eacute;ho programu. A to nejlep&scaron;&iacute;: Letn&iacute; kartu bude&scaron; m&iacute;t zdarma již od prvn&iacute;ho přenocov&aacute;n&iacute;, exkluzivně u někter&eacute;ho z na&scaron;ich v&iacute;ce než 1.000 hostitelů programu letn&iacute; karty. Letn&iacute; kartu plnou v&yacute;hod využije&scaron; od 24. května do 15. ř&iacute;jna 2017.</p>\n\n<p>Dal&scaron;&iacute; informace najdete na:&nbsp;<a href=\"http://www.schladming-dachstein.at/cs/rekreacni-aktivity/leto\" target=\"_blank\">www.schladming-dachstein.at</a></p>\n","1","0","0"),
("3585","1","25","10","content","Text k modulu MAPA","_menu_6_text_1","<p>Mapa regionu</p>\n","0","0","0"),
("3586","1","25","2","content","Text k modulu UBYTOVANIE 1","_menu_7_text_1","<p><strong>Stadthotel brunner</strong></p>\n\n<p>&bdquo;Můj střed v centru&ldquo;. C&iacute;tit se blaze uprostřed stylov&eacute; modern&iacute; architektury a 500 let star&yacute;ch zd&iacute; v centru Schladmingu. Nechte se h&yacute;čkat ve Spa nad střechami Schladmingu, saunou, &aacute;jurv&eacute;dsk&yacute;mi i klasick&yacute;mi mas&aacute;žemi, čajovnou, lekc&iacute; j&oacute;gy a meditac&iacute;. V restauraci, kter&aacute; nab&iacute;z&iacute; rakouskou,&nbsp; &aacute;jurv&eacute;dskou kuchyni i z&aacute;sadit&eacute; (lehce straviteln&eacute;) pokrmy, budete doslova rozmazlov&aacute;ni. Hory prozkoum&aacute;te během pě&scaron;&iacute; t&uacute;ry nebo na vyj&iacute;žďce na horsk&eacute;m kole s na&scaron;&iacute;m hotelov&yacute;m průvodcem.</p>\n","1","0","0"),
("3587","1","25","12","content","Input Meno","form_base_name","Jméno","1","0","0"),
("3588","1","25","12","content","Input Priezvisko","form_base_surname","Příjmení","1","0","0"),
("3589","1","25","12","content","Input PSČ","form_base_psc","PSČ","1","0","0"),
("3590","1","25","12","content","Input Mesto","form_base_city","Město","1","0","0"),
("3591","1","25","12","content","Input Email","form_base_email","Email","1","0","0"),
("3592","1","25","12","content","Input Doklad","form_extend_v1_doklad","Doklad o Vašem nákupu: (unikátní číslo účtenky  nebo číslo faktury z E-shopu)","1","0","0"),
("3593","1","25","12","content","Input Otázka + odpovede","form_extend_v3_otazka","Je toto modré?","0","0","0"),
("3594","1","25","12","content","Odpoveď A","form_extend_v3_odpoved_a","áno","0","0","0"),
("3595","1","25","12","content","Odpoveď B","form_extend_v3_odpoved_b","neviem","0","0","0"),
("3596","1","25","12","content","Odpoveď C","form_extend_v3_odpoved_c","možno","0","0","0"),
("3597","1","25","4","content","Názov","field_word_nazov","Názov","0","0","0"),
("3598","1","25","4","content","Adresa","field_word_adresa","Adresa","0","0","0"),
("3599","1","25","4","content","Kontakt","field_word_kontakt","Kontakt","0","0","0"),
("3600","1","25","4","content","Web","field_word_web","Web","0","0","0"),
("3601","1","25","4","content","Hláška povinné pole","field_word_err","Toto pole je povinné","1","0","0"),
("3602","1","25","4","content","Registrovať","field_word_sent","Registrovat","1","0","0"),
("3603","1","25","4","content","Predchádzajúca (fotka)","field_word_previous","Předchozí","1","0","0"),
("3604","1","25","4","content","Ďalšia (fotka)","field_word_next","Další","1","0","0"),
("3605","1","25","4","content","Súhlasím s newslettrom","field_word_suhlas_news","Mám zájem o zasílání aktuálních novinek z regionu Schladming- Dachstein.","1","0","0"),
("3606","1","25","4","content","Súhlasím s podmienkami súťaže","field_word_suhlas_podm","Souhlasím s pravidly soutěže (PRAVIDLA ZDE).","1","0","0"),
("3607","1","25","1","content","Kľúčové slová pre Google","keywords","soutěž Kilpi","1","0","0"),
("3608","1","25","1","content","Popis pre Google","description","This competition has a first ID","1","0","0"),
("3609","1","25","4","content","Súhlasím s podmienkami súťaže","field_word_dakujeme","Děkujeme za Vaši účast a přejeme Vám hodně štěstí v soutěži!","1","0","0"),
("3610","1","25","12","image","Podmienky súťaže (PDF)","form_file_podmienky","419","1","0","0"),
("3611","1","25","12","image","Newsletter (PDF)","form_file_newsletter","123","0","0","0"),
("3612","1","25","4","content","Hláška možnosti novej registrácie","field_word_nova_registracia","Pokud máte další doklad o nákupu můžete přejít k nové registraci ZDE.","1","0","0"),
("3613","1","25","13","content","Počet znakov vygenerovaného hashu","_email_conf_char","8","1","0","0"),
("3614","1","25","13","content","Hláška, súťažiacemu ktorá mu príde na email po registracii.","_email_conf_sent_text","Děkujeme za registraci do soutěže a přejeme Vám hodně štěstí při slosování! ","1","0","0"),
("3615","1","25","12","content","Telefónne číslo","form_base_tel_c","Telefonní číslo","0","0","0"),
("3616","1","25","4","content","Hláška za hviezdičkou o povinných poliach","field_word_povinne_polia","","1","0","0"),
("3617","1","25","2","image","Fotka loga k modulu UBYTOVANIE","_menu_7_image_2_1","416","0","0","0"),
("3618","1","25","16","content","Názov hotelu 2","info_hotel_name_2","Falkensteiner Hotel Schladming****s","1","0","0"),
("3619","1","25","16","content","Adresa Hotela 2","info_hotel_addr_2","Europaplatz 613   <br/>   A - 8970 Schladming","1","0","0"),
("3620","1","25","16","content","Telefón do hotela 2","info_hotel_tel_c_2","+43 (0) 3687 214-0","1","0","0"),
("3621","1","25","16","content","Email hotelu 2","info_hotel_email_2","reservations.schladming@falkensteiner.com","1","0","0"),
("3622","1","25","16","content","Text k modulu UBYTOVANIE 2","_menu_7_text_2","<p><strong>Hotel Falkensteiner</strong><br />\n<br />\nO př&iacute;jemnou atmosf&eacute;ru pro V&aacute;&scaron; odpočinek se postar&aacute; modern&iacute; architektura kombinovan&aacute; s m&iacute;stn&iacute;mi př&iacute;rodn&iacute;mi materi&aacute;ly, čerstv&aacute; &scaron;t&yacute;rsk&aacute; kuchyně a atraktivn&iacute; vodn&iacute; svět a wellness Acquapura Spa. Snov&aacute; centr&aacute;ln&iacute; poloha na okraji Schladmingu (5 minut pě&scaron;ky od n&aacute;měst&iacute;) mezi pohoř&iacute;m Schladmingsk&eacute; Taury a ledovcem Dachstein nab&iacute;z&iacute; ide&aacute;ln&iacute; v&yacute;choz&iacute; bod pro t&uacute;ry, na kter&yacute;ch můžete objevovat tajemstv&iacute; regionu Schladming-Dachstein.</p>\n\n<p><a href=\"https://www.falkensteiner.com/cs/hotel/schladming?utm_source=&amp;utm_medium=image_text&amp;utm_campaign=20170315-20170415Schladmig_Dachstein_Kilpikilpi.com\" target=\"_blank\">Buďte jako doma v nejlep&scaron;&iacute;m hotelu ve Schladmingu!</a></p>\n\n<p>&nbsp;</p>\n","1","0","0"),
("3623","1","25","17","content","Text k modulu UBYTOVANIE 3","_menu_7_text_3","<p><strong>Dovolen&aacute; v Zell am See je dovolenou s požitkem - v hotelu Tirolerhof!</strong></p>\n\n<p>Jezero, hory, ledovec a stylov&yacute;, rodinn&yacute; 4-hvězdičkov&yacute; hotel superior v Zell am See &ndash; to je ide&aacute;ln&iacute; kombinace pro va&scaron;i dovolenou v Zell am See, v l&eacute;tě i v zimě. Budete m&iacute;t v&yacute;hled na jezero Zeller See, hory Schmittenh&ouml;he a Kitzsteinhorn se v&scaron;emi rozmanit&yacute;mi sportovn&iacute;mi a rekreačn&iacute;mi možnostmi a budete h&yacute;čk&aacute;ni v b&aacute;ječn&eacute;m a mimoř&aacute;dn&eacute;m hotelu kulin&aacute;řsk&yacute;mi specialitami nejvy&scaron;&scaron;&iacute; kvality. Nebo str&aacute;v&iacute;te dovolenou spojenou s golfem v Salcburku, kde budete m&iacute;t v&yacute;hled na n&aacute;dhern&eacute; hory a jezero oblasti Zell am See-Kaprun. Nebo si užijete ve dvou n&aacute;dhern&eacute; apartm&aacute;ny v r&aacute;mci romantick&eacute; dovolen&eacute;. Nebo si poř&aacute;dně odpočinete s wellness a l&aacute;zeňskou nab&iacute;dkou vy&scaron;&scaron;&iacute; tř&iacute;dy a načerp&aacute;te novou energii. Takto může vypadat va&scaron;e dal&scaron;&iacute; rekreačn&iacute; dovolen&aacute; v hotelu Tirolerhof Zell am See - v srdci Salcburku. Wellness hotel, čtyřhvězdičkov&yacute; hotel superior, hotel pro hosty s pejsky, relaxačn&iacute; hotel - v&scaron;echny tyto př&iacute;vlastky si hotel Tirolerhof plně zaslouž&iacute;.</p>\n\n<p>&nbsp;</p>\n\n<p><strong>Prožijte nezapomenutelnou dovolenou v hotelu Tirolerhof!</strong></p>\n","0","0","0"),
("3624","1","25","17","content","Email hotelu 3","info_hotel_email_3","welcome@tirolerhof.co.at","0","0","0"),
("3625","1","25","17","content","Telefón do hotela 3","info_hotel_tel_c_3","+43(0)6542/772-0","0","0","0"),
("3626","1","25","17","content","Adresa Hotela 3","info_hotel_addr_3","Auerspergstrasse 5   <br/>   A - 5700 Zell am See","0","0","0"),
("3627","1","25","17","content","Názov hotelu 3","info_hotel_name_3","Hotel Tirolerhof ****S","0","0","0"),
("3628","1","25","16","image","Fotka loga k modulu UBYTOVANIE 2","_menu_7_image_1_2","418","0","0","0"),
("3629","1","25","16","image","Fotka k modulu UBYTOVANIE 2","_menu_7_image_2_2","417","1","0","0"),
("3630","1","25","17","image","Fotka loga k modulu UBYTOVANIE 3","_menu_7_image_1_3","51","0","0","0"),
("3631","1","25","17","image","Fotka k modulu UBYTOVANIE 3","_menu_7_image_2_3","56","0","0","0"),
("3632","1","25","2","content","Url adresa hotela 1","link_hotel_1","http://www.stadthotel-brunner.at","1","0","0"),
("3633","1","25","16","content","Url adresa hotela 2","link_hotel_2","https://www.falkensteiner.com/cs/hotel/schladming","1","0","0"),
("3634","1","25","17","content","Url adresa hotela 3","link_hotel_3","http://www.tirolerhof.co.at/","0","0","0"),
("3635","1","25","9","image","Druhá fotka modulu pre modul GALÉRIA","_menu_5_gallery_1","48","1","0","0"),
("3636","1","25","5","image","Fotka v hlavnom slideri 2","_menu_1_image_2","412","1","0","0"),
("3637","1","25","4","content","Po ukončení registrácie","field_word_koniec_registracie","<p>SOUTĚŽ BYLA UKONČENA DNE 30.11. 2016</p>\n\n<p>Slosov&aacute;n&iacute; bylo provedeno dne 05.12.2016 a z platn&yacute;ch registrac&iacute; byli vybr&aacute;ni 3 v&yacute;herci, dle pravidel soutěže.&nbsp;<br />\nDovolenkov&yacute; pobyt pro 2 osoby na 4 dny /3 noci v 3*** hotelu s polopenz&iacute;, včetně 2 skipasů,<br />\nv regionu SCHLADMING-DACHSTEIN, z&iacute;sk&aacute;vaj&iacute; :</p>\n\n<p><strong>Matej Chodniček, Ostrava, ČR<br />\nJana Cibulkov&aacute;, Nov&yacute; Přerov, ČR<br />\nPetra Matoskova, Praha, ČR</strong></p>\n\n<p>V&yacute;herci budou kontaktov&aacute;ni provozovatelem soutěže ohledně převzet&iacute; pobytov&yacute;ch voucherů v nejbliž&scaron;&iacute;ch dnech.&nbsp;<br />\nPobytov&eacute; vouchery jsou platn&eacute; v zimn&iacute; sezoně 20161/17 a nezahrnuj&iacute; dopravu.</p>\n\n<p><strong>V&Scaron;EM DĚKUJEME ZA &Uacute;ČAST A V&Yacute;HERCŮM SRDEČNE BLAHOPŘEJEME!</strong></p>\n\n<p><span style=\"font-size:11px\">Spr&aacute;vnost a platnost slosov&aacute;n&iacute; potvrzuj&iacute; provozovatel&eacute; soutěže:<br />\nSchladming-Dachstein Tourism Marketing, Ramsauerstra&szlig;e 756, A-8970 Schladming, Rakousko<br />\na spoluorganiz&aacute;tor soutěže: PONATURE s.r.o., Roh&aacute;čova 188/37, 130 00 Praha 3, Česk&aacute; republika</span></p>\n","1","0","0"),
("3638","1","25","11","content","Názov modulu pre modul O PARTNEROVI","_menu_name_8","Kilpi","0","0","0"),
("3639","1","25","15","content","Email partnera","info_partner_email","eshop@kilpi.cz","1","0","0"),
("3640","1","25","15","content","Adresa partnera","info_partner_addr","U Hrůbků 251/119 <br/> 709 00 Ostrava","1","0","0"),
("3641","1","25","15","content","Názov partnera","info_partner_name","PONATURE, s. r. o.","1","0","0"),
("3642","1","25","15","content","Telefónne číslo na partnera","info_partner_tel_c","+420 777 734 330","1","0","0"),
("3643","1","25","11","content","Text k modulu O PARTNEROVI 1","_menu_8_text_1","<p>KILPI - TESTOV&Aacute;NO SEVEREM A PROVĚŘENO LIDMI</p>\n\n<p>Outdoorov&eacute; oblečen&iacute; Kilpi je testovan&eacute; severem, jeho nespoutanost&iacute;, hrdost&iacute; a nekompromisn&iacute;mi n&aacute;roky země mytick&yacute;ch hrdinů. Pokud chcete zimu doopravdy prož&iacute;t, mus&iacute;te na ni b&yacute;t připraven&iacute;. Kilpi znamen&aacute; finsky &scaron;t&iacute;t. Tam, kde si př&iacute;roda i domy svou obranu už vybudovaly, potřebujete ji i vy. Spolehněte se na oblečen&iacute; a doplňky Kilpi. Budou va&scaron;&iacute;m &scaron;t&iacute;tem, d&iacute;ky kter&eacute;mu budete v bezpeč&iacute; a ochr&aacute;něni.</p>\n\n<p>V sortimentu Kilpi najdete kompletn&iacute; v&yacute;bavu pro zimu i l&eacute;to, doplňky i maličkosti. Obl&eacute;knete se do př&iacute;rody i do města, na sportov&aacute;n&iacute; i pro okamžiky odpočinku. Vybav&iacute;me v&aacute;s &uacute;čelov&yacute;mi a designov&yacute;mi bundami, skvěle padnouc&iacute;mi kalhotami, funkčn&iacute;m pr&aacute;dlem i stylov&yacute;mi tričky. A když mrazivou zimu vystř&iacute;d&aacute; žhav&eacute; l&eacute;to, vyt&aacute;hnete k vodě na&scaron;e plavky i dal&scaron;&iacute; letn&iacute; v&yacute;bavu.</p>\n","1","0","0"),
("3644","1","25","1","content","Jazyková mutácia pre Facebook","_language","cs_CZ","1","0","0"),
("3645","1","25","12","image","Newsletter 2 (PDF)","form_file_newsletter_2","68","0","0","0"),
("3646","1","25","4","content","Súhlasím s newslettrom 2","field_word_suhlas_news_2","News 2","0","0","0"),
("3647","1","25","18","content","Email hotelu 4","info_hotel_email_4","welcome@tirolerhof.co.at","0","0","0"),
("3648","1","25","18","content","Telefón do hotela 4","info_hotel_tel_c_4","+43(0)6542/772-0","0","0","0"),
("3649","1","25","18","content","Adresa Hotela 4","info_hotel_addr_4","Auerspergstrasse 5   <br/>   A - 5700 Zell am See","1","0","0"),
("3650","1","25","18","content","Názov hotelu 4","info_hotel_name_4","Hotel Tirolerhof ****S","0","0","0"),
("3651","1","25","18","image","Fotka loga k modulu UBYTOVANIE 4","_menu_7_image_1_4","","0","0","0"),
("3652","1","25","18","image","Fotka k modulu UBYTOVANIE 4","_menu_7_image_2_4","","1","0","0"),
("3653","1","25","18","content","Url adresa hotela 4","link_hotel_4","http://www.tirolerhof.co.at/","0","0","0"),
("3654","1","25","18","content","Text k modulu UBYTOVANIE 4","_menu_7_text_4","","0","0","0"),
("3655","1","25","11","image","Fotka k modulu O PARTNEROVI","_menu_8_image_1","","0","0","0"),
("3656","1","25","1","content","Google Plus","social_google_plus","https://plus.google.com/112406614306736743833","1","0","0"),
("3657","1","25","12","content","Input Otázka","form_extend_v2_otazka","","0","0","0");
INSERT INTO dnt_microsites_composer VALUES
("3658","1","25","13","content","Odoslať potvrdzovací email","sent_confirm_mail","1","1","0","0"),
("3659","1","25","12","content","Voliteľný parameter 1","form_base_custom_1","Místo Vašeho nákupu (zadejte město)","1","0","0"),
("3660","1","26","1","content","Template","layout","dnt_first","1","0","0"),
("3661","1","26","15","content","Link partnera","link_partner","http://neoluxor.cz","1","0","0"),
("3662","1","26","3","content","Link regionu","link_region","http://www.salzburg.info/cs","1","0","0"),
("3663","1","26","1","content","Zobraziť na URL adrese","real_address","http://www.vyhrat.com/","1","0","0"),
("3664","1","26","1","content","Facebook","social_fb","https://www.facebook.com/Neoluxor.cz","1","0","0"),
("3665","1","26","1","content","Twitter","social_twitter","https://twitter.com/neoluxorcz","1","0","0"),
("3666","1","26","1","content","Instagram","social_linked_in","https://www.instagram.com/neoluxorcz/","1","0","0"),
("3667","1","26","1","content","Mapa ","map_location","https://www.google.cz/maps/place/Salzburg,+Rakousko/@47.802904,12.9863895,12z/data=!3m1!4b1!4m5!3m4!1s0x47769adda908d4b1:0xc1e183a1412af73d!8m2!3d47.80949!4d13.05501","1","0","0"),
("3668","1","26","1","image","Favicon","favicon","57","1","0","0"),
("3669","1","26","1","content","Model farby R","_r","230","1","0","0"),
("3670","1","26","1","content","Model farby G","_g","120","1","0","0"),
("3671","1","26","1","content","Model farby B","_b","23","1","0","0"),
("3672","1","26","1","content","Font","_font","Myriad Pro Regular ","1","0","0"),
("3673","1","26","2","content","Názov hotelu 1","info_hotel_name_1","Familotel - amiamo","0","0","0"),
("3674","1","26","2","content","Adresa Hotela 1","info_hotel_addr_1","Salzachtal Bundesstrasse 20   <br/>   A - 5700 Zell am See","1","0","0"),
("3675","1","26","2","content","Telefón do hotela 1","info_hotel_tel_c_1","+43 6542 55355","1","0","0"),
("3676","1","26","2","content","Email hotelu 1","info_hotel_email_1","hotel@amiamo.at","1","0","0"),
("3677","1","26","3","content","Názov regiónu","info_region_name","TSG Tourismus Salzburg GmbH","1","0","0"),
("3678","1","26","3","content","Adresa regiónu","info_region_addr","Auerspergstraße 6  <br/>  A-5020 Salzburg","1","0","0"),
("3679","1","26","3","content","Telefónne číslo regiónu","info_region_tel_c","+43 662 88987 0","1","0","0"),
("3680","1","26","3","content","Email regiónu","info_region_email","tourist@salzburg.info","1","0","0"),
("3681","1","26","1","content","Youtube video","youtube_video","3Jff34rxECY","1","0","0"),
("3682","1","26","15","image","Logo partnera","partner_logo","421","1","0","0"),
("3683","1","26","3","image","Logo regiónu","region_logo","243","1","0","0"),
("3684","1","26","5","image","Fotka v hlavnom slideri 1","_menu_1_image_1","391","1","0","0"),
("3685","1","26","7","image","Fotka modulu pre modul GALÉRIA","_menu_3_image_1","393","1","0","0"),
("3686","1","26","7","image","Druhá fotka modulu pre modul GALÉRIA","_menu_3_image_2","394","1","0","0"),
("3687","1","26","2","image","Fotka k modulu UBYTOVANIE","_menu_7_image_1_1","63","1","0","0"),
("3688","1","26","5","content","Názov modulu pre modul INFO","_menu_name_1","Intro","1","1","0"),
("3689","1","26","6","content","Názov modulu pre modul O SÚŤAŽI","_menu_name_2","O soutěži","0","0","0"),
("3690","1","26","7","content","Názov modulu pre modul GALÉRIU","_menu_name_3","Galérie","0","0","0"),
("3691","1","26","8","content","Názov modulu pre modul FORMULÁRU","_menu_name_4","Registrace","1","3","0"),
("3692","1","26","9","content","Názov modulu pre modul O REGIONE","_menu_name_5","Salzburg","1","2","0"),
("3693","1","26","10","content","Názov modulu pre modul MAPA","_menu_name_6","Mapa","0","0","0"),
("3694","1","26","11","content","Názov modulu pre modul UBYTOVANIE","_menu_name_7","Ubytování","0","0","0"),
("3695","1","26","5","content","Text k modulu INFO","_menu_1_text_1","<p><span style=\"font-size:20px\"><strong>Hrajte o v&iacute;kend v&nbsp;SALZBURGU za n&aacute;kup v knihkupectv&iacute;ch NEOLUXOR!</strong></span></p>\n","1","0","0"),
("3696","1","26","6","content","Text k modulu O SÚŤAŽI","_menu_2_text_1","<p style=\"text-align:center\"><span style=\"font-size:20px\"><strong>Nav&scaron;tivte knihkupectv&iacute;&nbsp;Neoluxor&nbsp;a vyhrajte jeden ze 3 v&iacute;kendov&yacute;ch pobytů pro dva v rakousk&eacute;m Salzburgu!</strong></span><br />\nPodm&iacute;nkou &uacute;časti v soutěži je jak&yacute;koliv n&aacute;kup v knihkupectv&iacute;ch Neoluxor nebo na e-shopu a n&aacute;sledn&aacute; registrace dokladu z&nbsp;n&aacute;kupu včetně zodpovězen&iacute; soutěžn&iacute; ot&aacute;zky.&nbsp;</p>\n\n<p style=\"text-align:center\">V&yacute;hry v soutěži:&nbsp; 3x pobyt pro 2 osoby, na 4 dny/3 noci ve 3-4* hotelu se sn&iacute;dan&iacute;, včetně tř&iacute;denn&iacute; slevov&eacute; městsk&eacute; karty <a href=\"http://www.salzburg.info/cs/sights/kartou_salcburku\" target=\"_blank\">Salzburg Card</a></p>\n\n<p style=\"text-align:center\"><span style=\"font-size:16px\"><strong>Soutěž prob&iacute;h&aacute;&nbsp;od 15. března do 30. dubna 2017.&nbsp;</strong></span><br />\nDo soutěže se můžete zaregistrovat i v&iacute;cekr&aacute;t, pokud opakovaně nakoup&iacute;te v s&iacute;ti Neoluxor.<br />\n<strong>Přejeme V&aacute;m hodně &scaron;těst&iacute; při slosov&aacute;n&iacute;!</strong></p>\n","1","0","0"),
("3697","1","26","7","content","Text k modulu GALÉRIA","_menu_3_text_1","","1","0","0"),
("3698","1","26","8","content","Text k modulu FORMULÁR","_menu_4_text_1","","1","0","0"),
("3699","1","26","9","content","Text k modulu O REGIÓNE","_menu_5_text_1","<p><strong>Salzburg - Jevi&scaron;tě světa</strong></p>\n\n<p>Jako rodi&scaron;tě a působi&scaron;tě Wolfganga Amadea Mozarta a jako ději&scaron;tě Salzbursk&eacute;ho festivalu je Salzburg světově proslul&yacute;. Pod&iacute;v&aacute;te-li se bl&iacute;že, objev&iacute;te dokonalou harmonii př&iacute;rody a architektury zasazen&eacute; v n&aacute;dhern&eacute;m panoramatu okoln&iacute;ch hor a jezer. Z&aacute;mek Mirabell a okoln&iacute; zahrada nab&iacute;zej&iacute; ohromuj&iacute;c&iacute; pohlednicov&yacute; v&yacute;hled na symbol Salzburgu, mohutnou pevnost Hohensalzburg z 11. stolet&iacute;, trůn&iacute;c&iacute; majest&aacute;tně nad Muzeem moderny na M&ouml;nchsbergu. Srdcem Star&eacute;ho města je středověk&aacute; Getreidegasse, kde se narodil nejslavněj&scaron;&iacute; syn Salzburgu, W.A. Mozart.</p>\n\n<p>V&iacute;ce o Salzburgu: <a href=\"http://www.salzburg.info/cs\" target=\"_blank\">www.salzburg.info</a></p>\n","1","0","0"),
("3700","1","26","9","content","Ďalší text k modulu O REGIÓNE","_menu_5_text_2","<p>Lid&eacute; se zde r&aacute;di setk&aacute;vaj&iacute; v tradičn&iacute;ch kav&aacute;rn&aacute;ch, u &bdquo;Melange&ldquo; (k&aacute;va s na&scaron;lehan&yacute;m ml&eacute;kem) nebo &bdquo;Gro&szlig;er Brauner&ldquo; (dvojit&eacute; espresso) v kav&aacute;rně Tomaselli, nejstar&scaron;&iacute; kav&aacute;rně Rakouska, nebo hned naproti v kav&aacute;rně F&uuml;rst, kde můžete ochutnat origin&aacute;ln&iacute; Mozartovy koule, kter&eacute; zde dodnes ručně vyr&aacute;b&iacute; pravnuk jejich vyn&aacute;lezce. Večer si pak můžete vychutnat v nejstar&scaron;&iacute;m restaurantu ve středn&iacute; Evropě, v Kl&aacute;&scaron;tern&iacute;m sklepě Sv. Petra, a nejl&eacute;pe při Mozartovsk&eacute; večeři. Kdo to m&aacute; raději trochu moderněj&scaron;&iacute;, určitě by neměl vynechat Red Bull Hangar 7. Hang&aacute;r č. 7, synonymum avantgardn&iacute; architektury, modern&iacute;ho uměn&iacute; a &scaron;pičkov&eacute; gastronomie.</p>\n\n<p>Salzburg Card - nejdůležitěj&scaron;&iacute; karta v&yacute;hod pro va&scaron;i n&aacute;v&scaron;těvu Salzburgu. V&iacute;ce o <a href=\"http://www.salzburg.info/cs/sights/kartou_salcburku\" target=\"_blank\">Salzburg Card</a></p>\n","1","0","0"),
("3701","1","26","10","content","Text k modulu MAPA","_menu_6_text_1","<p>Mapa regionu</p>\n","1","0","0"),
("3702","1","26","2","content","Text k modulu UBYTOVANIE 1","_menu_7_text_1","<p><strong>amiamo - Familotel Zell am See</strong></p>\n\n<p>Jako prvn&iacute; boutique hotel pro rodiny&nbsp;s dětmi jsme stanovili standardy pro&nbsp;v&yacute;jimečn&eacute; z&aacute;žitky z dovolen&eacute;: mal&yacute;,&nbsp;vybran&yacute; a individu&aacute;ln&iacute;, vyznamenan&yacute;&nbsp;nejvy&scaron;&scaron;&iacute; pečet&iacute; jakosti Q III. Luxusn&iacute;&nbsp;penzion Amiamo v kombinaci s&nbsp;kartou Zell am See-Kaprun zaručuje&nbsp;odpočinkovou, ale i vzru&scaron;uj&iacute;c&iacute;&nbsp;dovolenou pro celou rodinu. S v&iacute;ce&nbsp;než 20-ti letou zku&scaron;enost&iacute; nab&iacute;z&iacute;me&nbsp;<br />\nhl&iacute;d&aacute;n&iacute; dět&iacute; v vnitřn&iacute; sekci o plo&scaron;e&nbsp;500 m&sup2; s velk&yacute;m množstv&iacute;m aktivit.&nbsp;</p>\n\n<p>NOVINKA:&nbsp;Sekce Wellness o plo&scaron;e 300 m&sup2;&nbsp;disponuje 3 baz&eacute;ny, Babynariem&nbsp;a kompletně zrekonstruovanou&nbsp;sekc&iacute; saun&nbsp;s relaxačn&iacute; m&iacute;stnost&iacute;.&nbsp;</p>\n\n<p>Na jezeře Zeller&nbsp;See&nbsp;V&aacute;s&nbsp;oček&aacute;v&aacute;&nbsp;hotelov&aacute; pl&aacute;ž s bohatou nab&iacute;dkou!</p>\n","1","0","0"),
("3703","1","26","12","content","Input Meno","form_base_name","Jméno","1","0","0"),
("3704","1","26","12","content","Input Priezvisko","form_base_surname","Příjmení","1","0","0"),
("3705","1","26","12","content","Input PSČ","form_base_psc","PSČ","1","0","0"),
("3706","1","26","12","content","Input Mesto","form_base_city","Město","1","0","0"),
("3707","1","26","12","content","Input Email","form_base_email","Email","1","0","0"),
("3708","1","26","12","content","Input Doklad","form_extend_v1_doklad","Doklad o nákupu - unikátní číslo účtenky:","1","0","0"),
("3709","1","26","12","content","Input Otázka + odpovede","form_extend_v3_otazka","Salcburský festival je bezesporu jedním z největších hudebních festivalů všech dob, který výrazně přispěl k rozvoji hudební kultury na celém světě. Tipněte si kolik návštěvníků vidělo letošní Salcburský festival?","0","0","0"),
("3710","1","26","12","content","Odpoveď A","form_extend_v3_odpoved_a","áno","0","0","0"),
("3711","1","26","12","content","Odpoveď B","form_extend_v3_odpoved_b","neviem","0","0","0"),
("3712","1","26","12","content","Odpoveď C","form_extend_v3_odpoved_c","možno","0","0","0"),
("3713","1","26","4","content","Názov","field_word_nazov","Názov","0","0","0"),
("3714","1","26","4","content","Adresa","field_word_adresa","Adresa","0","0","0"),
("3715","1","26","4","content","Kontakt","field_word_kontakt","Kontakt","0","0","0"),
("3716","1","26","4","content","Web","field_word_web","Web","0","0","0"),
("3717","1","26","4","content","Hláška povinné pole","field_word_err","Toto pole je povinné","1","0","0"),
("3718","1","26","4","content","Registrovať","field_word_sent","Registrovat","1","0","0"),
("3719","1","26","4","content","Predchádzajúca (fotka)","field_word_previous","Předcházející","1","0","0"),
("3720","1","26","4","content","Ďalšia (fotka)","field_word_next","Další","1","0","0"),
("3721","1","26","4","content","Súhlasím s newslettrom","field_word_suhlas_news","Mám zájem o zasílání aktuálních novinek o Salzburgu.","1","0","0"),
("3722","1","26","4","content","Súhlasím s podmienkami súťaže","field_word_suhlas_podm","Souhlasím s pravidly soutěže (PRAVIDLA ZDE).","1","0","0"),
("3723","1","26","1","content","Kľúčové slová pre Google","keywords","soutěž Neoluxor Salzburg","1","0","0"),
("3724","1","26","1","content","Popis pre Google","description","This competition has a first ID","1","0","0"),
("3725","1","26","4","content","Súhlasím s podmienkami súťaže","field_word_dakujeme","Děkujeme za Vaši účast a přejeme Vám hodně štěstí v soutěži!","1","0","0"),
("3726","1","26","12","image","Podmienky súťaže (PDF)","form_file_podmienky","423","1","0","0"),
("3727","1","26","12","image","Newsletter (PDF)","form_file_newsletter","424","0","0","0"),
("3728","1","26","4","content","Hláška možnosti novej registrácie","field_word_nova_registracia","Pokud máte další doklad o nákupu můžete přejít k nové registraci ZDE.","1","0","0"),
("3729","1","26","13","content","Počet znakov vygenerovaného hashu","_email_conf_char","8","1","0","0"),
("3730","1","26","13","content","Hláška, súťažiacemu ktorá mu príde na email po registracii.","_email_conf_sent_text","Děkujeme za registraci do soutěže a přejeme Vám hodně štěstí při slosování! ","1","0","0"),
("3731","1","26","12","content","Telefónne číslo","form_base_tel_c","Místo Vašeho nákupu (zadejte město)","1","0","0"),
("3732","1","26","4","content","Hláška za hviezdičkou o povinných poliach","field_word_povinne_polia","","1","0","0"),
("3733","1","26","2","image","Fotka loga k modulu UBYTOVANIE","_menu_7_image_2_1","59","0","0","0"),
("3734","1","26","16","content","Názov hotelu 2","info_hotel_name_2","Sporthotel Falkenstein","0","0","0"),
("3735","1","26","16","content","Adresa Hotela 2","info_hotel_addr_2","Nikolaus-Gassner-Str. 79   <br/>   A - 5710 Kaprun","1","0","0"),
("3736","1","26","16","content","Telefón do hotela 2","info_hotel_tel_c_2","+43 6547 7122","1","0","0"),
("3737","1","26","16","content","Email hotelu 2","info_hotel_email_2","sporthotel@falkenstein.at","1","0","0"),
("3738","1","26","16","content","Text k modulu UBYTOVANIE 2","_menu_7_text_2","<p><strong>Das Falkenstein</strong></p>\n\n<p>Tady v Kaprunu a hotelu Falkenstein lze objevit spoustu vzru&scaron;uj&iacute;c&iacute;ch možnost&iacute; a z&aacute;bavy&nbsp;pro rodiny a děti. Každ&yacute; den může b&yacute;t spojen s nov&yacute;mi z&aacute;žitky a dojmy, ať už jde&nbsp;o zvl&aacute;&scaron;tn&iacute; rodinn&eacute; turistick&eacute; v&yacute;lety, čvacht&aacute;n&iacute; a klouz&aacute;n&iacute; v Tauern SPA Kaprun, v&yacute;let&nbsp;k alpsk&eacute; horsk&eacute; bobov&eacute; dr&aacute;ze &quot;Maisfiltzer&quot;, o n&aacute;v&scaron;těvu volnočasov&eacute;ho nebo n&aacute;rodn&iacute;ho&nbsp;parku nebo o mnoh&aacute; dal&scaron;&iacute; dobrodružstv&iacute; - z&aacute;bavě se nekladou ž&aacute;dn&eacute; hranice.</p>\n\n<p>V hotelu Falkenstein&nbsp;se nach&aacute;z&iacute; kromě&nbsp;prostorn&eacute;ho&nbsp;dětsk&eacute;ho hři&scaron;tě&nbsp;a dětsk&eacute; herny tak&eacute;&nbsp;velk&yacute; baz&eacute;n a najdete&nbsp;zde i&nbsp;chutnou&nbsp;Pinzgauerskou&nbsp;kuchyni s pestr&yacute;mi&nbsp;dětsk&yacute;mi menu&nbsp;- n&aacute;&scaron; maskot Falki&nbsp;se na v&aacute;s tě&scaron;&iacute;!</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n","1","0","0"),
("3739","1","26","17","content","Text k modulu UBYTOVANIE 3","_menu_7_text_3","<p><strong>Dovolen&aacute; v Zell am See je dovolenou s požitkem - v hotelu Tirolerhof!</strong></p>\n\n<p>Jezero, hory, ledovec a stylov&yacute;, rodinn&yacute; 4-hvězdičkov&yacute; hotel superior v Zell am See &ndash; to je ide&aacute;ln&iacute; kombinace pro va&scaron;i dovolenou v Zell am See, v l&eacute;tě i v zimě. Budete m&iacute;t v&yacute;hled na jezero Zeller See, hory Schmittenh&ouml;he a Kitzsteinhorn se v&scaron;emi rozmanit&yacute;mi sportovn&iacute;mi a rekreačn&iacute;mi možnostmi a budete h&yacute;čk&aacute;ni v b&aacute;ječn&eacute;m a mimoř&aacute;dn&eacute;m hotelu kulin&aacute;řsk&yacute;mi specialitami nejvy&scaron;&scaron;&iacute; kvality. Nebo str&aacute;v&iacute;te dovolenou spojenou s golfem v Salcburku, kde budete m&iacute;t v&yacute;hled na n&aacute;dhern&eacute; hory a jezero oblasti Zell am See-Kaprun. Nebo si užijete ve dvou n&aacute;dhern&eacute; apartm&aacute;ny v r&aacute;mci romantick&eacute; dovolen&eacute;. Nebo si poř&aacute;dně odpočinete s wellness a l&aacute;zeňskou nab&iacute;dkou vy&scaron;&scaron;&iacute; tř&iacute;dy a načerp&aacute;te novou energii. Takto může vypadat va&scaron;e dal&scaron;&iacute; rekreačn&iacute; dovolen&aacute; v hotelu Tirolerhof Zell am See - v srdci Salcburku. Wellness hotel, čtyřhvězdičkov&yacute; hotel superior, hotel pro hosty s pejsky, relaxačn&iacute; hotel - v&scaron;echny tyto př&iacute;vlastky si hotel Tirolerhof plně zaslouž&iacute;.</p>\n\n<p>&nbsp;</p>\n\n<p><strong>Prožijte nezapomenutelnou dovolenou v hotelu Tirolerhof!</strong></p>\n","0","0","0"),
("3740","1","26","17","content","Email hotelu 3","info_hotel_email_3","welcome@tirolerhof.co.at","0","0","0"),
("3741","1","26","17","content","Telefón do hotela 3","info_hotel_tel_c_3","+43(0)6542/772-0","0","0","0"),
("3742","1","26","17","content","Adresa Hotela 3","info_hotel_addr_3","Auerspergstrasse 5   <br/>   A - 5700 Zell am See","0","0","0"),
("3743","1","26","17","content","Názov hotelu 3","info_hotel_name_3","Hotel Tirolerhof ****S","0","0","0"),
("3744","1","26","16","image","Fotka loga k modulu UBYTOVANIE 2","_menu_7_image_1_2","66","1","0","0"),
("3745","1","26","16","image","Fotka k modulu UBYTOVANIE 2","_menu_7_image_2_2","65","0","0","0"),
("3746","1","26","17","image","Fotka loga k modulu UBYTOVANIE 3","_menu_7_image_1_3","51","0","0","0"),
("3747","1","26","17","image","Fotka k modulu UBYTOVANIE 3","_menu_7_image_2_3","56","0","0","0"),
("3748","1","26","2","content","Url adresa hotela 1","link_hotel_1","https://www.amiamo.at","1","0","0"),
("3749","1","26","16","content","Url adresa hotela 2","link_hotel_2","http://www.falkenstein.at","1","0","0"),
("3750","1","26","17","content","Url adresa hotela 3","link_hotel_3","http://www.tirolerhof.co.at/","0","0","0"),
("3751","1","26","9","image","Druhá fotka modulu pre modul GALÉRIA","_menu_5_gallery_1","47","1","0","0"),
("3752","1","26","5","image","Fotka v hlavnom slideri 2","_menu_1_image_2","392","1","0","0"),
("3753","1","26","4","content","Po ukončení registrácie","field_word_koniec_registracie","<p>SOUTĚŽ BYLA UKONČENA DNE 1.11. 2016.</p>\n\n<p>Slosov&aacute;n&iacute; proběhlo dne 04.11.2016, ze v&scaron;ech přijat&yacute;ch platn&yacute;ch registrac&iacute; byli vybr&aacute;ni&nbsp; 3 v&yacute;herci dle pravidel soutěže. Dovolenkov&yacute; pobyt v Salzburgu pro 2 osoby na 4&nbsp;dny (3&nbsp;noci), ubytov&aacute;n&iacute; ve 3-4*hotelu se sn&iacute;dan&iacute;, včetně 3-denn&iacute; slevov&eacute; karty &bdquo;SalzburgCard&ldquo; z&iacute;sk&aacute;vaj&iacute; :</p>\n\n<p><strong>Tereza Seidlov&aacute;, 54701 N&aacute;chod, ČR</strong></p>\n\n<p><strong>Marie Herzogov&aacute;, 53701 Chrudim, ČR</strong></p>\n\n<p><strong>Gabriela Zpěv&aacute;kov&aacute;, 78313 &Scaron;těp&aacute;nov, ČR</strong></p>\n\n<p>V&yacute;herci budou kontaktov&aacute;ni provozovatelem soutěže ohledně převzet&iacute; pobytov&yacute;ch voucherů v nejbliž&scaron;&iacute;ch dnech. Pobytov&eacute; vouchery jsou platn&eacute; 31.10.2017, pobyty nezahrnujou dopravu.</p>\n\n<p><u><strong>V&scaron;em děkujeme za &uacute;čast a v&yacute;hercům srdečne blahopřejeme!</strong></u></p>\n\n<p><span style=\"font-size:12px\">Spr&aacute;vnost a platnost slosov&aacute;n&iacute; potvrzuj&iacute; provozovatel&eacute; soutěže:<br />\nOrganiz&aacute;tor: TSG Tourismus Salzburg GmbH Auerspergstra&szlig;e 6, 5020 Salzburg, Rakousko<br />\na spoluorganiz&aacute;tor soutěže: GOLDTIME a.s., U Libeňsk&eacute;ho pivovaru 10, Praha 8, Česk&aacute; republika</span></p>\n","0","0","0"),
("3754","1","26","11","content","Názov modulu pre modul O PARTNEROVI","_menu_name_8","Neoluxor","1","4","0"),
("3755","1","26","15","content","Email partnera","info_partner_email","info@neoluxor.cz","1","0","0"),
("3756","1","26","15","content","Adresa partnera","info_partner_addr","Na Poříčí 1067/25 <br/>  110 00 Praha 1 - ČR","1","0","0"),
("3757","1","26","15","content","Názov partnera","info_partner_name","NEOLUXOR, s.r.o.","1","0","0");
INSERT INTO dnt_microsites_composer VALUES
("3758","1","26","15","content","Telefónne číslo na partnera","info_partner_tel_c","+420 296 110 351","1","0","0"),
("3759","1","26","11","content","Text k modulu O PARTNEROVI 1","_menu_8_text_1","<p>&nbsp;</p>\n\n<p>Neoluxor provozuje 27 knihkupectv&iacute; po cel&eacute; Česk&eacute; republice. M&aacute;me nej&scaron;ir&scaron;&iacute; nab&iacute;dku knih na česk&eacute;m trhu, vybrat si můžete na někter&eacute; z na&scaron;ich poboček nebo na webu, kde nav&iacute;c nab&iacute;z&iacute;me 10% slevu, levn&eacute; po&scaron;tovn&eacute; nebo osobn&iacute; odběr zdarma. Pal&aacute;c knih Luxor v&nbsp;Praze je největ&scaron;&iacute; knihkupectv&iacute; ve středn&iacute; Evropě. V&scaron;echna knihkupectv&iacute; jsou bezbari&eacute;rov&aacute;, najdete u n&aacute;s koutek Knižn&iacute;ho klubu a samozřejmost&iacute; je placen&iacute; kartou či využit&iacute; bezkontaktn&iacute;ch termin&aacute;lů. V knihkupectv&iacute;ch Pal&aacute;c knih Luxor, Hlavn&iacute; n&aacute;draž&iacute; Praha a v Plaza Plzeň najdete nav&iacute;c Caf&eacute; Luxor.</p>\n\n<p><span style=\"font-size:16px\"><span style=\"color:rgb(105, 105, 105)\"><a href=\"http://neoluxor.cz/pobocky/\" target=\"_blank\">Přejeme V&aacute;m př&iacute;jemn&eacute; nakupov&aacute;n&iacute;!</a></span></span></p>\n","1","0","0"),
("3760","1","26","1","content","Jazyková mutácia pre Facebook","_language","cs_CZ","1","0","0"),
("3761","1","26","12","image","Newsletter 2 (PDF)","form_file_newsletter_2","425","0","0","0"),
("3762","1","26","4","content","Súhlasím s newslettrom 2","field_word_suhlas_news_2","News 2","0","0","0"),
("3763","1","26","18","content","Email hotelu 4","info_hotel_email_4","welcome@tirolerhof.co.at","0","0","0"),
("3764","1","26","18","content","Telefón do hotela 4","info_hotel_tel_c_4","+43(0)6542/772-0","0","0","0"),
("3765","1","26","18","content","Adresa Hotela 4","info_hotel_addr_4","Auerspergstrasse 5   <br/>   A - 5700 Zell am See","1","0","0"),
("3766","1","26","18","content","Názov hotelu 4","info_hotel_name_4","Hotel Tirolerhof ****S","0","0","0"),
("3767","1","26","18","image","Fotka loga k modulu UBYTOVANIE 4","_menu_7_image_1_4","","0","0","0"),
("3768","1","26","18","image","Fotka k modulu UBYTOVANIE 4","_menu_7_image_2_4","","1","0","0"),
("3769","1","26","18","content","Url adresa hotela 4","link_hotel_4","http://www.tirolerhof.co.at/","0","0","0"),
("3770","1","26","18","content","Text k modulu UBYTOVANIE 4","_menu_7_text_4","","0","0","0"),
("3771","1","26","11","image","Fotka k modulu O PARTNEROVI","_menu_8_image_1","422","1","0","0"),
("3772","1","26","1","content","Google Plus","social_google_plus","https://plus.google.com/+neoluxorcz","1","0","0"),
("3773","1","26","12","content","Input Otázka","form_extend_v2_otazka","","0","0","0"),
("3774","1","26","13","content","Odoslať potvrdzovací email","sent_confirm_mail","1","1","0","0"),
("3775","1","26","12","content","Voliteľný parameter 1","form_base_custom_1","Tipněte si kolik lidí navštívilo v roce 2016 dominantu Salzburgu, pevnost Hohensalzburg?","1","0","0"),
("3776","1","27","1","content","Template","layout","dnt_first","1","0","0"),
("3777","1","27","15","content","Link partnera","link_partner","http://www.monkipark.at","1","0","0"),
("3778","1","27","3","content","Link regionu","link_region","http://www.steiermark.com/familienurlaub","1","0","0"),
("3779","1","27","1","content","Zobraziť na URL adrese","real_address","http://www.vyhrat.com/","1","0","0"),
("3780","1","27","1","content","Facebook","social_fb","https://www.facebook.com/Steiermark.Urlaub/","1","0","0"),
("3781","1","27","1","content","Twitter","social_twitter","https://twitter.com/steiermark","1","0","0"),
("3782","1","27","1","content","Instagram","social_linked_in","https://www.instagram.com/visitsteiermark/","1","0","0"),
("3783","1","27","1","content","Mapa ","map_location","https://www.google.com/maps/place/Steiermark+Tourismus/@47.2652018,14.7069775,9z/data=!4m5!3m4!1s0x476e4b2050250b93:0x30c0a55abf550e9c!8m2!3d47.0428792!4d15.4881532?hl=at-AT","1","0","0"),
("3784","1","27","1","image","Favicon","favicon","57","1","0","0"),
("3785","1","27","1","content","Model farby R","_r","0","1","0","0"),
("3786","1","27","1","content","Model farby G","_g","130","1","0","0"),
("3787","1","27","1","content","Model farby B","_b","74","1","0","0"),
("3788","1","27","1","content","Font","_font","Calibri","1","0","0"),
("3789","1","27","2","content","Názov hotelu 1","info_hotel_name_1","Familotel - amiamo","0","0","0"),
("3790","1","27","2","content","Adresa Hotela 1","info_hotel_addr_1","Salzachtal Bundesstrasse 20   <br/>   A - 5700 Zell am See","1","0","0"),
("3791","1","27","2","content","Telefón do hotela 1","info_hotel_tel_c_1","+43 6542 55355","1","0","0"),
("3792","1","27","2","content","Email hotelu 1","info_hotel_email_1","hotel@amiamo.at","1","0","0"),
("3793","1","27","3","content","Názov regiónu","info_region_name","Steirische Tourismus GmbH","1","0","0"),
("3794","1","27","3","content","Adresa regiónu","info_region_addr","St.-Peter-Hauptstrasse 243 <br/> A-8042 Graz","1","0","0"),
("3795","1","27","3","content","Telefónne číslo regiónu","info_region_tel_c","+43/(0)316 4003-0","1","0","0"),
("3796","1","27","3","content","Email regiónu","info_region_email","info@steiermark.com","1","0","0"),
("3797","1","27","1","content","Youtube video","youtube_video","6rbrBBv20GM","1","0","0"),
("3798","1","27","15","image","Logo partnera","partner_logo","428","1","0","0"),
("3799","1","27","3","image","Logo regiónu","region_logo","142","1","0","0"),
("3800","1","27","5","image","Fotka v hlavnom slideri 1","_menu_1_image_1","426","1","0","0"),
("3801","1","27","7","image","Fotka modulu pre modul GALÉRIA","_menu_3_image_1","144","1","0","0"),
("3802","1","27","7","image","Druhá fotka modulu pre modul GALÉRIA","_menu_3_image_2","430","1","0","0"),
("3803","1","27","2","image","Fotka k modulu UBYTOVANIE","_menu_7_image_1_1","63","1","0","0"),
("3804","1","27","5","content","Názov modulu pre modul INFO","_menu_name_1","Intro","1","1","0"),
("3805","1","27","6","content","Názov modulu pre modul O SÚŤAŽI","_menu_name_2","Gewinnspiel","0","0","0"),
("3806","1","27","7","content","Názov modulu pre modul GALÉRIU","_menu_name_3","Galerie","0","0","0"),
("3807","1","27","8","content","Názov modulu pre modul FORMULÁRU","_menu_name_4","Teilnahme","1","3","0"),
("3808","1","27","9","content","Názov modulu pre modul O REGIONE","_menu_name_5","FamilienUrlaub Steiermark","1","2","0"),
("3809","1","27","10","content","Názov modulu pre modul MAPA","_menu_name_6","Mapa","0","0","0"),
("3810","1","27","11","content","Názov modulu pre modul UBYTOVANIE","_menu_name_7","Ubytování","0","0","0"),
("3811","1","27","5","content","Text k modulu INFO","_menu_1_text_1","<p><span style=\"color:#FFFFFF\"><span style=\"font-size:18px\"><strong>Gewinnen Sie einen von 2 Urlauben f&uuml;r die Familie in einem der<br />\n19&nbsp;Beherbergungsbetriebe von FamilienUrlaub Steiermark.</strong></span></span></p>\n","1","0","0"),
("3812","1","27","6","content","Text k modulu O SÚŤAŽI","_menu_2_text_1","<p style=\"text-align:center\"><strong><span style=\"font-size:18px\">Monkipark und FamilienUraub Steiermark​<strong>&nbsp;</strong>verlosen 2&nbsp;Urlaubspakete f&uuml;r je 2 Erwachsene und 2 Kinder &agrave; 2 N&auml;chte&nbsp;inklusive Halbpension&nbsp;<br />\nin einem Familienhotel in der Steiermark.</span></strong></p>\n\n<p style=\"text-align:center\"><span style=\"font-size:18px\">Teilnahmeformular ausf&uuml;llen, Frage richtig beantworten, und schon habt ihr die Chance auf diesen tollen FamilienUrlaub.</span></p>\n\n<p style=\"text-align:center\"><span style=\"font-size:18px\">Das Gewinnspiel l&auml;uft vom 01. April bis 30. April 2017. Teilnahmeschluss ist der&nbsp;30. April 2017.</span></p>\n","1","0","0"),
("3813","1","27","7","content","Text k modulu GALÉRIA","_menu_3_text_1","","1","0","0"),
("3814","1","27","8","content","Text k modulu FORMULÁR","_menu_4_text_1","","1","0","0"),
("3815","1","27","9","content","Text k modulu O REGIÓNE","_menu_5_text_1","<p><strong>FamilienUrlaub Steiermark</strong></p>\n\n<p>Quer&nbsp;durch die Steiermark haben sich 19&nbsp;qualit&auml;tsgepr&uuml;fte Familienhotels und 9 kinderfreundliche Ausflugsziele voll und ganz auf die Urlaubsbed&uuml;rfnisse von Familien spezialisiert. Und alle beweisen ein besonderes Herz f&uuml;r Tiere &hellip;</p>\n\n<p><strong>Die FamilienUrlaub Steiermark Betriebe im 4-Pfoten-Check</strong> &hellip;</p>\n\n<p>&bdquo;Denn wo Tier sich wie im Himmel f&uuml;hlt, da ist der Mensch bestens aufgehoben&ldquo;, lautet eine alte steirische Weisheit. Und deshalb haben wir steirische Betriebe und Familienhotels besucht, und die dort lebenden Vierbeiner gefragt: Was ist so besonders an dem Platz, dort wo ihr lebt?</p>\n","1","0","0"),
("3816","1","27","9","content","Ďalší text k modulu O REGIÓNE","_menu_5_text_2","<p>&nbsp;</p>\n\n<p>Ob Eselin Sissy im Ennstal, Luxuskatze Tara in Bad Mitterndorf oder Flori auf der Turracher H&ouml;h&rsquo;&nbsp;&ndash; sie und viele andere tierische Kollegen plaudern munter drauf los und machen so richtig Lust auf Urlaub und einem Besuch bei ihnen. Was wiederum einmal unterstreicht: Urlaubstage im Gr&uuml;nen Herz Osterreichs ist mehr als Landschaft genie&szlig;en. Es ist ein humorvolles, entspanntes Miteinander von Gro&szlig; und Klein von Mensch und Tier zwischen Dachstein und Bad Radkersburg.</p>\n\n<p><strong>Besuchen Sie uns auf <a href=\"http://www.steiermark.com/familienurlaub\" target=\"_blank\">www.steiermark.com/familienurlaub</a>&nbsp;und erfahren Sie wie es unseren &bdquo;tierischen Freunden&ldquo; in den FamilienUrlaub Steiermark Betrieben geht.</strong></p>\n","1","0","0"),
("3817","1","27","10","content","Text k modulu MAPA","_menu_6_text_1","<p>Mapa regionu</p>\n","1","0","0"),
("3818","1","27","2","content","Text k modulu UBYTOVANIE 1","_menu_7_text_1","<p><strong>amiamo - Familotel Zell am See</strong></p>\n\n<p>Jako prvn&iacute; boutique hotel pro rodiny&nbsp;s dětmi jsme stanovili standardy pro&nbsp;v&yacute;jimečn&eacute; z&aacute;žitky z dovolen&eacute;: mal&yacute;,&nbsp;vybran&yacute; a individu&aacute;ln&iacute;, vyznamenan&yacute;&nbsp;nejvy&scaron;&scaron;&iacute; pečet&iacute; jakosti Q III. Luxusn&iacute;&nbsp;penzion Amiamo v kombinaci s&nbsp;kartou Zell am See-Kaprun zaručuje&nbsp;odpočinkovou, ale i vzru&scaron;uj&iacute;c&iacute;&nbsp;dovolenou pro celou rodinu. S v&iacute;ce&nbsp;než 20-ti letou zku&scaron;enost&iacute; nab&iacute;z&iacute;me&nbsp;<br />\nhl&iacute;d&aacute;n&iacute; dět&iacute; v vnitřn&iacute; sekci o plo&scaron;e&nbsp;500 m&sup2; s velk&yacute;m množstv&iacute;m aktivit.&nbsp;</p>\n\n<p>NOVINKA:&nbsp;Sekce Wellness o plo&scaron;e 300 m&sup2;&nbsp;disponuje 3 baz&eacute;ny, Babynariem&nbsp;a kompletně zrekonstruovanou&nbsp;sekc&iacute; saun&nbsp;s relaxačn&iacute; m&iacute;stnost&iacute;.&nbsp;</p>\n\n<p>Na jezeře Zeller&nbsp;See&nbsp;V&aacute;s&nbsp;oček&aacute;v&aacute;&nbsp;hotelov&aacute; pl&aacute;ž s bohatou nab&iacute;dkou!</p>\n","1","0","0"),
("3819","1","27","12","content","Input Meno","form_base_name","Vorname","1","0","0"),
("3820","1","27","12","content","Input Priezvisko","form_base_surname","Nachname","1","0","0"),
("3821","1","27","12","content","Input PSČ","form_base_psc","PLZ","0","0","0"),
("3822","1","27","12","content","Input Mesto","form_base_city","Stadt","0","0","0"),
("3823","1","27","12","content","Input Email","form_base_email","E-mail","1","0","0"),
("3824","1","27","12","content","Input Doklad","form_extend_v1_doklad","Einkaufsbeleg Nr.","0","0","0"),
("3825","1","27","12","content","Input Otázka + odpovede","form_extend_v3_otazka","Wie heißt das Maskottchen (der Affe) im Monki Park? Er kommt immer am Wochenende und tanzt mit den Kindern.","1","0","0"),
("3826","1","27","12","content","Odpoveď A","form_extend_v3_odpoved_a","Monki","1","0","0"),
("3827","1","27","12","content","Odpoveď B","form_extend_v3_odpoved_b","Manki","1","0","0"),
("3828","1","27","12","content","Odpoveď C","form_extend_v3_odpoved_c","Osterhase","1","0","0"),
("3829","1","27","4","content","Názov","field_word_nazov","Názov","0","0","0"),
("3830","1","27","4","content","Adresa","field_word_adresa","Adresa","0","0","0"),
("3831","1","27","4","content","Kontakt","field_word_kontakt","Kontakt","0","0","0"),
("3832","1","27","4","content","Web","field_word_web","Web","0","0","0"),
("3833","1","27","4","content","Hláška povinné pole","field_word_err","Pflichtfelder","1","0","0"),
("3834","1","27","4","content","Registrovať","field_word_sent","Teilnehmen","1","0","0"),
("3835","1","27","4","content","Predchádzajúca (fotka)","field_word_previous","Vorheriges","1","0","0"),
("3836","1","27","4","content","Ďalšia (fotka)","field_word_next","Nächstes","1","0","0"),
("3837","1","27","4","content","Súhlasím s newslettrom","field_word_suhlas_news","Ja, ich stimme zu, den Newsletter von Steiermark Tourismus und von der Monki Park zu erhalten und meine Daten für weitere Marketingaktivitäten zur Verfügung zu stellen.","1","0","0"),
("3838","1","27","4","content","Súhlasím s podmienkami súťaže","field_word_suhlas_podm","Ja, ich stimme den Teilnahmebedingungen zu. (Teilnahmebedingungen HIER).","1","0","0"),
("3839","1","27","1","content","Kľúčové slová pre Google","keywords","gewinnspiel Monkipark Steiermark","1","0","0"),
("3840","1","27","1","content","Popis pre Google","description","This competition has a first ID","1","0","0"),
("3841","1","27","4","content","Súhlasím s podmienkami súťaže","field_word_dakujeme","Danke, Sie haben sich erfolgreich für das Gewinnspiel registriert.","1","0","0"),
("3842","1","27","12","image","Podmienky súťaže (PDF)","form_file_podmienky","433","1","0","0"),
("3843","1","27","12","image","Newsletter (PDF)","form_file_newsletter","68","0","0","0"),
("3844","1","27","4","content","Hláška možnosti novej registrácie","field_word_nova_registracia","Jetzt Freunde einladen!","1","0","0"),
("3845","1","27","13","content","Počet znakov vygenerovaného hashu","_email_conf_char","8","1","0","0"),
("3846","1","27","13","content","Hláška, súťažiacemu ktorá mu príde na email po registracii.","_email_conf_sent_text","Danke, Sie haben sich erfolgreich für das Gewinnspiel registriert. Wir wünschen Ihnen viel Erfolg bei der Verlosung!","1","0","0"),
("3847","1","27","12","content","Telefónne číslo","form_base_tel_c","Telefonní číslo","0","0","0"),
("3848","1","27","4","content","Hláška za hviezdičkou o povinných poliach","field_word_povinne_polia","","1","0","0"),
("3849","1","27","2","image","Fotka loga k modulu UBYTOVANIE","_menu_7_image_2_1","59","0","0","0"),
("3850","1","27","16","content","Názov hotelu 2","info_hotel_name_2","Sporthotel Falkenstein","0","0","0"),
("3851","1","27","16","content","Adresa Hotela 2","info_hotel_addr_2","Nikolaus-Gassner-Str. 79   <br/>   A - 5710 Kaprun","1","0","0"),
("3852","1","27","16","content","Telefón do hotela 2","info_hotel_tel_c_2","+43 6547 7122","1","0","0"),
("3853","1","27","16","content","Email hotelu 2","info_hotel_email_2","sporthotel@falkenstein.at","1","0","0"),
("3854","1","27","16","content","Text k modulu UBYTOVANIE 2","_menu_7_text_2","<p><strong>Das Falkenstein</strong></p>\n\n<p>Tady v Kaprunu a hotelu Falkenstein lze objevit spoustu vzru&scaron;uj&iacute;c&iacute;ch možnost&iacute; a z&aacute;bavy&nbsp;pro rodiny a děti. Každ&yacute; den může b&yacute;t spojen s nov&yacute;mi z&aacute;žitky a dojmy, ať už jde&nbsp;o zvl&aacute;&scaron;tn&iacute; rodinn&eacute; turistick&eacute; v&yacute;lety, čvacht&aacute;n&iacute; a klouz&aacute;n&iacute; v Tauern SPA Kaprun, v&yacute;let&nbsp;k alpsk&eacute; horsk&eacute; bobov&eacute; dr&aacute;ze &quot;Maisfiltzer&quot;, o n&aacute;v&scaron;těvu volnočasov&eacute;ho nebo n&aacute;rodn&iacute;ho&nbsp;parku nebo o mnoh&aacute; dal&scaron;&iacute; dobrodružstv&iacute; - z&aacute;bavě se nekladou ž&aacute;dn&eacute; hranice.</p>\n\n<p>V hotelu Falkenstein&nbsp;se nach&aacute;z&iacute; kromě&nbsp;prostorn&eacute;ho&nbsp;dětsk&eacute;ho hři&scaron;tě&nbsp;a dětsk&eacute; herny tak&eacute;&nbsp;velk&yacute; baz&eacute;n a najdete&nbsp;zde i&nbsp;chutnou&nbsp;Pinzgauerskou&nbsp;kuchyni s pestr&yacute;mi&nbsp;dětsk&yacute;mi menu&nbsp;- n&aacute;&scaron; maskot Falki&nbsp;se na v&aacute;s tě&scaron;&iacute;!</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n","1","0","0"),
("3855","1","27","17","content","Text k modulu UBYTOVANIE 3","_menu_7_text_3","<p><strong>Dovolen&aacute; v Zell am See je dovolenou s požitkem - v hotelu Tirolerhof!</strong></p>\n\n<p>Jezero, hory, ledovec a stylov&yacute;, rodinn&yacute; 4-hvězdičkov&yacute; hotel superior v Zell am See &ndash; to je ide&aacute;ln&iacute; kombinace pro va&scaron;i dovolenou v Zell am See, v l&eacute;tě i v zimě. Budete m&iacute;t v&yacute;hled na jezero Zeller See, hory Schmittenh&ouml;he a Kitzsteinhorn se v&scaron;emi rozmanit&yacute;mi sportovn&iacute;mi a rekreačn&iacute;mi možnostmi a budete h&yacute;čk&aacute;ni v b&aacute;ječn&eacute;m a mimoř&aacute;dn&eacute;m hotelu kulin&aacute;řsk&yacute;mi specialitami nejvy&scaron;&scaron;&iacute; kvality. Nebo str&aacute;v&iacute;te dovolenou spojenou s golfem v Salcburku, kde budete m&iacute;t v&yacute;hled na n&aacute;dhern&eacute; hory a jezero oblasti Zell am See-Kaprun. Nebo si užijete ve dvou n&aacute;dhern&eacute; apartm&aacute;ny v r&aacute;mci romantick&eacute; dovolen&eacute;. Nebo si poř&aacute;dně odpočinete s wellness a l&aacute;zeňskou nab&iacute;dkou vy&scaron;&scaron;&iacute; tř&iacute;dy a načerp&aacute;te novou energii. Takto může vypadat va&scaron;e dal&scaron;&iacute; rekreačn&iacute; dovolen&aacute; v hotelu Tirolerhof Zell am See - v srdci Salcburku. Wellness hotel, čtyřhvězdičkov&yacute; hotel superior, hotel pro hosty s pejsky, relaxačn&iacute; hotel - v&scaron;echny tyto př&iacute;vlastky si hotel Tirolerhof plně zaslouž&iacute;.</p>\n\n<p>&nbsp;</p>\n\n<p><strong>Prožijte nezapomenutelnou dovolenou v hotelu Tirolerhof!</strong></p>\n","0","0","0"),
("3856","1","27","17","content","Email hotelu 3","info_hotel_email_3","welcome@tirolerhof.co.at","0","0","0"),
("3857","1","27","17","content","Telefón do hotela 3","info_hotel_tel_c_3","+43(0)6542/772-0","0","0","0");
INSERT INTO dnt_microsites_composer VALUES
("3858","1","27","17","content","Adresa Hotela 3","info_hotel_addr_3","Auerspergstrasse 5   <br/>   A - 5700 Zell am See","0","0","0"),
("3859","1","27","17","content","Názov hotelu 3","info_hotel_name_3","Hotel Tirolerhof ****S","0","0","0"),
("3860","1","27","16","image","Fotka loga k modulu UBYTOVANIE 2","_menu_7_image_1_2","66","1","0","0"),
("3861","1","27","16","image","Fotka k modulu UBYTOVANIE 2","_menu_7_image_2_2","65","0","0","0"),
("3862","1","27","17","image","Fotka loga k modulu UBYTOVANIE 3","_menu_7_image_1_3","51","0","0","0"),
("3863","1","27","17","image","Fotka k modulu UBYTOVANIE 3","_menu_7_image_2_3","56","0","0","0"),
("3864","1","27","2","content","Url adresa hotela 1","link_hotel_1","https://www.amiamo.at","1","0","0"),
("3865","1","27","16","content","Url adresa hotela 2","link_hotel_2","http://www.falkenstein.at","1","0","0"),
("3866","1","27","17","content","Url adresa hotela 3","link_hotel_3","http://www.tirolerhof.co.at/","0","0","0"),
("3867","1","27","9","image","Druhá fotka modulu pre modul GALÉRIA","_menu_5_gallery_1","19","1","0","0"),
("3868","1","27","5","image","Fotka v hlavnom slideri 2","_menu_1_image_2","427","1","0","0"),
("3869","1","27","4","content","Po ukončení registrácie","field_word_koniec_registracie","<p><span style=\"font-size:14px\"><strong>Das Gewinnspiel wurde bereits beendet!</strong></span></p>\n\n<p><span style=\"font-size:14px\">Vielen Dank f&uuml;r die rege Teilnahme!</span></p>\n\n<p><span style=\"font-size:14px\">Wir freuen uns nun unsere f&uuml;nf Gewinner, welchen wir sehr herzlich gratulieren m&ouml;chten, bekanntgeben zu d&uuml;rfen.</span></p>\n\n<p><span style=\"font-size:14px\">Gewonnen haben:</span></p>\n","0","0","0"),
("3870","1","27","11","content","Názov modulu pre modul O PARTNEROVI","_menu_name_8","Monki Park","1","4","0"),
("3871","1","27","15","content","Email partnera","info_partner_email","info@monkipark.at","1","0","0"),
("3872","1","27","15","content","Adresa partnera","info_partner_addr","Millennium City, Handelskai 94-96 <br/> A - 1200 Wien","1","0","0"),
("3873","1","27","15","content","Názov partnera","info_partner_name","Monki Park","1","0","0"),
("3874","1","27","15","content","Telefónne číslo na partnera","info_partner_tel_c","+43 1 330 18 91","1","0","0"),
("3875","1","27","11","content","Text k modulu O PARTNEROVI 1","_menu_8_text_1","<p>&nbsp;</p>\n\n<p><span style=\"font-size:18px\"><strong>1. PREMIUM INDOOR-FAMILY PARK!&nbsp;</strong><br />\n<span style=\"background-color:rgba(255, 255, 255, 0.8); font-family:lato,sans-serif\">Family Entertainment Park f&uuml;r Kinder, Jugendliche und Erwachsene.</span></span></p>\n\n<p><span style=\"font-size:18px\"><a href=\"http://www.monkipark.at/\" target=\"_blank\">Bei uns gibt es die meisten Gratis-Aktivit&auml;ten!</a></span></p>\n","1","0","0"),
("3876","1","27","1","content","Jazyková mutácia pre Facebook","_language","de_DE","1","0","0"),
("3877","1","27","12","image","Newsletter 2 (PDF)","form_file_newsletter_2","432","0","0","0"),
("3878","1","27","4","content","Súhlasím s newslettrom 2","field_word_suhlas_news_2","Ja, ich stimme zu, den Newsletter von der Monki Park zu erhalten und meine Daten für weitere Marketingaktivitäten zur Verfügung zu stellen.","0","0","0"),
("3879","1","27","18","content","Email hotelu 4","info_hotel_email_4","welcome@tirolerhof.co.at","0","0","0"),
("3880","1","27","18","content","Telefón do hotela 4","info_hotel_tel_c_4","+43(0)6542/772-0","0","0","0"),
("3881","1","27","18","content","Adresa Hotela 4","info_hotel_addr_4","Auerspergstrasse 5   <br/>   A - 5700 Zell am See","1","0","0"),
("3882","1","27","18","content","Názov hotelu 4","info_hotel_name_4","Hotel Tirolerhof ****S","0","0","0"),
("3883","1","27","18","image","Fotka loga k modulu UBYTOVANIE 4","_menu_7_image_1_4","","0","0","0"),
("3884","1","27","18","image","Fotka k modulu UBYTOVANIE 4","_menu_7_image_2_4","","1","0","0"),
("3885","1","27","18","content","Url adresa hotela 4","link_hotel_4","http://www.tirolerhof.co.at/","0","0","0"),
("3886","1","27","18","content","Text k modulu UBYTOVANIE 4","_menu_7_text_4","","0","0","0"),
("3887","1","27","11","image","Fotka k modulu O PARTNEROVI","_menu_8_image_1","431","1","0","0"),
("3888","1","27","1","content","Google Plus","social_google_plus","https://plus.google.com/102090635934340346203","1","0","0"),
("3889","1","27","12","content","Input Otázka","form_extend_v2_otazka","Napíšte farbu vášho PC","0","0","0"),
("3890","1","27","13","content","Odoslať potvrdzovací email","sent_confirm_mail","1","1","0","0"),
("3891","1","27","12","content","Voliteľný parameter 1","form_base_custom_1","Toto pole je voliteľné","0","0","0"),
("3892","1","28","1","content","Template","layout","dnt_second","1","0","0"),
("3893","1","28","15","content","Link partnera","link_partner","http://www.pompo.cz ","1","0","0"),
("3894","1","28","3","content","Link regionu","link_region","http://www.zellamsee-kaprun.com","1","0","0"),
("3895","1","28","1","content","Zobraziť na URL adrese","real_address","http://www.vyhrat.com/","1","0","0"),
("3896","1","28","1","content","Facebook","social_fb","https://www.facebook.com/Pompo.hracky","1","0","0"),
("3897","1","28","1","content","Twitter","social_twitter","https://twitter.com/zellkaprun","1","0","0"),
("3898","1","28","1","content","Instagram","social_linked_in","https://www.instagram.com/zellamseekaprun/","1","0","0"),
("3899","1","28","1","content","Mapa ","map_location","https://www.google.sk/maps/place/Zell+am+See-Kaprun+Tourismus+GmbH/@47.3221006,12.7943083,17z/data=!3m1!4b1!4m2!3m1!1s0x47771cdf4f490061:0xba82c342ef002324","1","0","0"),
("3900","1","28","1","image","Favicon","favicon","57","1","0","0"),
("3901","1","28","1","content","Model farby R","_r","75","1","0","0"),
("3902","1","28","1","content","Model farby G","_g","115","1","0","0"),
("3903","1","28","1","content","Model farby B","_b","175","1","0","0"),
("3904","1","28","1","content","Font","_font","Myriad Pro Regular ","1","0","0"),
("3905","1","28","2","content","Názov hotelu 1","info_hotel_name_1","Hotel Das Falkenstein","1","0","0"),
("3906","1","28","2","content","Adresa Hotela 1","info_hotel_addr_1","Nikolaus-Gassner-Str. 79   <br/>   A - 5710 Kaprun","1","0","0"),
("3907","1","28","2","content","Telefón do hotela 1","info_hotel_tel_c_1","+43 (0) 6547 7122","1","0","0"),
("3908","1","28","2","content","Email hotelu 1","info_hotel_email_1","sporthotel@falkenstein.at ","1","0","0"),
("3909","1","28","3","content","Názov regiónu","info_region_name","Zell am See-Kaprun Tourismus","1","0","0"),
("3910","1","28","3","content","Adresa regiónu","info_region_addr","Brucker Bundesstr. 1a  <br/>  A-5700 Zell am See","1","0","0"),
("3911","1","28","3","content","Telefónne číslo regiónu","info_region_tel_c","+43 6542 770","1","0","0"),
("3912","1","28","3","content","Email regiónu","info_region_email","welcome@zellamsee-kaprun.com","1","0","0"),
("3913","1","28","1","content","Youtube video","youtube_video","U3WaV52UqDM","1","0","0"),
("3914","1","28","15","image","Logo partnera","partner_logo","39","1","0","0"),
("3915","1","28","3","image","Logo regiónu","region_logo","3","1","0","0"),
("3916","1","28","5","image","Fotka v hlavnom slideri 1","_menu_1_image_1","435","1","0","0"),
("3917","1","28","7","image","Fotka modulu pre modul GALÉRIA","_menu_3_image_1","454","1","0","0"),
("3918","1","28","7","image","Druhá fotka modulu pre modul GALÉRIA","_menu_3_image_2","440","1","0","0"),
("3919","1","28","2","image","Fotka k modulu UBYTOVANIE","_menu_7_image_1_1","441","1","0","0"),
("3920","1","28","5","content","Názov modulu pre modul INFO","_menu_name_1","Intro","1","1","0"),
("3921","1","28","6","content","Názov modulu pre modul O SÚŤAŽI","_menu_name_2","O soutěži","0","0","0"),
("3922","1","28","7","content","Názov modulu pre modul GALÉRIU","_menu_name_3","Galérie","0","0","0"),
("3923","1","28","8","content","Názov modulu pre modul FORMULÁRU","_menu_name_4","Registrace","1","3","0"),
("3924","1","28","9","content","Názov modulu pre modul O REGIONE","_menu_name_5","Zell am See-Kaprun","1","4","0"),
("3925","1","28","10","content","Názov modulu pre modul MAPA","_menu_name_6","Mapa","0","0","0"),
("3926","1","28","11","content","Názov modulu pre modul UBYTOVANIE","_menu_name_7","Ubytování","1","5","0"),
("3927","1","28","5","content","Text k modulu INFO","_menu_1_text_1","<p><span style=\"font-size:20px\"><span style=\"color:#FFFFFF\"><span style=\"background-color:#336699\">VYHRAJTE JEDEN ZE 3 RODINN&Yacute;CH LETN&Iacute;CH POBYTŮ DO Zell am See-Kaprun!</span></span></span></p>\n","1","0","0"),
("3928","1","28","6","content","Text k modulu O SÚŤAŽI","_menu_2_text_1","<h3 style=\"text-align:center\"><span style=\"font-size:16px\">Nakupujte v prodejn&aacute;ch POMPO a vyhrajte jeden ze 3 letn&iacute;ch pobytů&nbsp;pro 4 člennou rodinu&nbsp;v rakousk&eacute;m regionu Zell am See-Kaprun!</span></h3>\n\n<p style=\"text-align:center\">Stač&iacute; když v obdob&iacute; 15.03. - 30.04.2017&nbsp;nakoup&iacute;te v prodejn&aacute;ch POMPO v ČR, nebo na E-shopu <a href=\"http://www.pompo.cz/\">www.pompo.cz</a>&nbsp;v min. hodnotě 599 Kč<br />\na&nbsp;zaregistrujete online svůj doklad o n&aacute;kupu dle podm&iacute;nek uveden&yacute;ch v pravidlech soutěže.</p>\n","1","0","0"),
("3929","1","28","7","content","Text k modulu GALÉRIA","_menu_3_text_1","","1","0","0"),
("3930","1","28","8","content","Text k modulu FORMULÁR","_menu_4_text_1","<p>&nbsp;</p>\n\n<p><strong>Soutěž prob&iacute;h&aacute; 15.03. - 30.04.2017&nbsp;na &uacute;zem&iacute; ČR.</strong></p>\n\n<p>Do soutěže se můžete zaregistrovat i v&iacute;cekr&aacute;t, pokud opakovaně nakoup&iacute;te nad 599 Kč v kter&eacute;koliv prodejně Pompo nebo na <a href=\"http://www.pompo.cz/\" target=\"_blank\">E-shopu</a>.</p>\n\n<p>V&yacute;hry v soutěži:<br />\n3x rodinn&yacute; letn&iacute; pobyt pro 2 dospěl&eacute; a 2 děti, na 5 dn&iacute; / 4 noci ve 3-4* hotelu, včetně polopenze a animačn&iacute;ho programu pro děti, v rakousk&eacute;m regionu Zell am See-Kaprun!</p>\n\n<p>&nbsp;</p>\n\n<p><strong>Přejeme V&aacute;m hodně &scaron;těst&iacute; při slosov&aacute;n&iacute;!</strong></p>\n","1","0","0"),
("3931","1","28","9","content","Text k modulu O REGIÓNE","_menu_5_text_1","<p><strong>Relaxovat bez kompromisů mezi ledovci, horami a jezerem</strong></p>\n\n<p>Během letn&iacute; dovolen&eacute; v Zell am See nemus&iacute;te dělat kompromisy. Pr&aacute;vě naopak: Sp&iacute;&scaron;e si budete kl&aacute;st ot&aacute;zku, pro co se rozhodnete. Nab&iacute;z&iacute; se zde mimo jin&eacute; popul&aacute;rn&iacute; dom&aacute;c&iacute; hory v m&iacute;stech Zell am See a Kaprun. Na Schmittenh&ouml;he se dostanete v modern&iacute;ch gondol&aacute;ch v Porsche Designu. Nahoře můžete zaž&iacute;t akčn&iacute; v&yacute;&scaron;lap na trase &bdquo;Schmidolins Feuertaufe&ldquo; (Schmidolinův křest ohněm) - což je ve skutečnosti rodinn&aacute; dobrodružn&aacute; trasa s 15 zast&aacute;vkami. V nejv&yacute;&scaron;e situovan&eacute;m E-Motocross-Parku v Rakousku zvan&eacute;m &quot;&bdquo;Schmidolins Feuerstuhl&ldquo; mohou sv&eacute; řidičsk&eacute; dovednosti prok&aacute;zat mal&iacute; z&aacute;vodn&iacute;ci. Dospěl&iacute; maj&iacute; v centru &bdquo;E-Freeride Center Schmitten&ldquo; možnost zajezdit si na motokrosov&yacute;ch kolech K TM a zvl&aacute;dnout několik rychl&yacute;ch kol na m&iacute;stn&iacute;m parcouru. Na hoře Maiskogel patř&iacute; k TOP z&aacute;žitkům j&iacute;zda na bobov&eacute; dr&aacute;ze &bdquo;Alpen Achterbahn Maisiflitzer&ldquo;. Mezi cyklisty v&scaron;ak patř&iacute; ke &scaron;pičce 2000 čtverečn&iacute;ch metrů velk&yacute; Bikepark: Pro nově př&iacute;choz&iacute; nab&iacute;z&iacute;me průvodce a cyklistick&eacute; a dětsk&eacute; tr&eacute;ninky.&nbsp;<br />\nV&iacute;ce o regionu na: <a href=\"http://www.zellamsee-kaprun.com/cs\" target=\"_blank\">www.zellamsee-kaprun.com</a></p>\n","1","0","0"),
("3932","1","28","9","content","Ďalší text k modulu O REGIÓNE","_menu_5_text_2","<p>Mnohem v&yacute;&scaron;, ale stejně snadno dosažiteln&yacute;, je svět vrcholů 3000 na Kitzsteinhornu: Ve v&yacute;&scaron;ce v&iacute;ce než 3000 metrů nad mořem je možn&eacute; nav&scaron;t&iacute;vit kino, z&uacute;častnit se koulov&aacute;n&iacute;,&nbsp; už&iacute;t si&nbsp; &bdquo;Kitzsteinhorn-Wildburger&ldquo; nebo v&yacute;&scaron;lapu v doprovodu průvodce - skutečn&eacute;ho rangera n&aacute;rodn&iacute;ho parku a pod&iacute;vat se př&iacute;mo na impozantn&iacute; svět ledovců a hor n&aacute;rodn&iacute;ho parku Hohe Tauern. Nejl&eacute;pe značen&yacute; syst&eacute;m turistick&yacute;ch tras v tomto regionu zahrnuje asi 400 km, s&iacute;ť cyklostezek m&aacute; 240 kilometrů a zavede v&aacute;s až nahoru na pastviny. Ať už si vyberete pot&aacute;pěn&iacute; v Tauern SPA v sekci pro děti &quot;Kidstein&quot;, nebo den na farmě, j&oacute;gu při&nbsp; Stand up Paddlingu nebo proch&aacute;zku bylinkovou trasou s průvodcem, rodinn&yacute; treking na lam&aacute;ch nebo letn&iacute; dětsk&yacute; program pro aktivn&iacute; děti - Zell am See-Kaprun je skutečn&yacute;m Eldoradem, pokud jde o to, už&iacute;t si l&eacute;to naplno. Zvl&aacute;&scaron;tě dobře se v&aacute;m to podař&iacute; s letn&iacute; kartou &bdquo;<a href=\"http://www.zellamsee-kaprun.com/cs/zask-card\" target=\"_blank\">Zell am See-Kaprun Sommerkarte</a>&ldquo; pro v&scaron;echny hosty: m&aacute;te s n&iacute; n&aacute;rok na slevy a voln&eacute; vstupy pro až 40 destinac&iacute; - ide&aacute;ln&iacute; pro rodinnou dovolenou.</p>\n","1","0","0"),
("3933","1","28","10","content","Text k modulu MAPA","_menu_6_text_1","<p>Mapa regionu</p>\n","1","0","0"),
("3934","1","28","2","content","Text k modulu UBYTOVANIE 1","_menu_7_text_1","<p><strong>Hotel Das Falkenstein&nbsp; -&nbsp; Aktivně. Přirozeně. Jinak.</strong></p>\n\n<p>Falkenstein, kter&yacute; se nach&aacute;z&iacute; na &uacute;pat&iacute; Kitzsteinhornu, spojuje rakouskou tradici s modern&iacute;m životn&iacute;m stylem. Po dlouh&eacute;m dni str&aacute;ven&eacute;m na horsk&eacute;m kole, po n&aacute;ročn&eacute; t&uacute;ře&nbsp; nebo v&yacute;letu na paraglidu se &scaron;&eacute;fem hotelu si můžete odpočinout ve venkovn&iacute; sauně, při hodině j&oacute;gy nebo ve velkoryse prostorn&eacute;m wellness are&aacute;lu. Z&aacute;soby energie můžete večer doplnit dom&aacute;c&iacute;m chlebem, čerstv&yacute;mi pokrmy s bylinkami z na&scaron;&iacute; zahrady, lahodn&yacute;mi steaky či rakousk&yacute;mi dezerty.<br />\n<strong>Aktivně.</strong> Ať už d&aacute;v&aacute;te přednost poklidn&eacute; proj&iacute;žďce na kole či n&aacute;ročn&eacute; j&iacute;zdě na kole v hor&aacute;ch. Akce a dobrodružstv&iacute; jsou v Kaprunu zaručeny. Využijte mnoha sportovn&iacute;ch a rekreačn&iacute;ch př&iacute;ležitost&iacute; v rekreačn&iacute; oblasti Kaprun-Zell am See.<br />\n<strong>Přirozeně. </strong>Tr&aacute;vit čas s rodinou nebo s př&aacute;teli venku. C&iacute;tit př&iacute;rodu. Sd&iacute;let &uacute;žasn&yacute; z&aacute;žitek. Ponořte se do hor a užijte si pocit svobody vysok&yacute;ch vrcholů.<br />\n<strong>Jinak.</strong> U n&aacute;s se budete c&iacute;tit jako doma. Na&scaron;i host&eacute; jsou na&scaron;i př&aacute;tel&eacute;. Jste srdečně zv&aacute;ni k &uacute;časti na na&scaron;em t&yacute;denn&iacute;m volnočasov&eacute;m programu, kter&yacute; si klade za c&iacute;l sezn&aacute;mit na&scaron;e hosty s na&scaron;im zař&iacute;zen&iacute;m.</p>\n","1","0","0"),
("3935","1","28","12","content","Input Meno","form_base_name","Jméno","1","0","0"),
("3936","1","28","12","content","Input Priezvisko","form_base_surname","Příjmení","1","0","0"),
("3937","1","28","12","content","Input PSČ","form_base_psc","PSČ","1","0","0"),
("3938","1","28","12","content","Input Mesto","form_base_city","Město","1","0","0"),
("3939","1","28","12","content","Input Email","form_base_email","Email","1","0","0"),
("3940","1","28","12","content","Input Doklad","form_extend_v1_doklad","Doklad o Vašem nákupu: (unikátní číslo účtenky  nebo číslo faktury z E-shopu)","1","0","0"),
("3941","1","28","12","content","Input otázka","form_extend_v2_otazka","Napíšte farbu vášho PC","0","0","0"),
("3942","1","28","12","content","Input Otázka + odpovede","form_extend_v3_otazka","Je toto modré?","0","0","0"),
("3943","1","28","12","content","Odpoveď A","form_extend_v3_odpoved_a","áno","0","0","0"),
("3944","1","28","12","content","Odpoveď B","form_extend_v3_odpoved_b","neviem","0","0","0"),
("3945","1","28","12","content","Odpoveď C","form_extend_v3_odpoved_c","možno","0","0","0"),
("3946","1","28","4","content","Názov","field_word_nazov","Názov","0","0","0"),
("3947","1","28","4","content","Adresa","field_word_adresa","Adresa","0","0","0"),
("3948","1","28","4","content","Kontakt","field_word_kontakt","Kontakt","0","0","0"),
("3949","1","28","4","content","Web","field_word_web","Web","0","0","0"),
("3950","1","28","4","content","Hláška povinné pole","field_word_err","Toto pole je povinné","1","0","0"),
("3951","1","28","4","content","Registrovať","field_word_sent","Registrovat","1","0","0"),
("3952","1","28","4","content","Predchádzajúca (fotka)","field_word_previous","Předchozí","1","0","0"),
("3953","1","28","4","content","Ďalšia (fotka)","field_word_next","Další","1","0","0"),
("3954","1","28","4","content","Súhlasím s newslettrom","field_word_suhlas_news","Mám zájem o zasílání aktuálních novinek o Zell am See-Kaprun.","1","0","0"),
("3955","1","28","4","content","Súhlasím s podmienkami súťaže","field_word_suhlas_podm","Souhlasím s pravidly soutěže (PRAVIDLA ZDE).","1","0","0"),
("3956","1","28","1","content","Kľúčové slová pre Google","keywords","soutěž Pompo Zell am See-Kaprun","1","0","0"),
("3957","1","28","1","content","Popis pre Google","description","This competition has a first ID","1","0","0");
INSERT INTO dnt_microsites_composer VALUES
("3958","1","28","4","content","Súhlasím s podmienkami súťaže","field_word_dakujeme","Děkujeme za Vaši účast a přejeme Vám hodně štěstí v soutěži!","1","0","0"),
("3959","1","28","12","image","Podmienky súťaže (PDF)","form_file_podmienky","453","1","0","0"),
("3960","1","28","12","image","Newsletter (PDF)","form_file_newsletter","438","0","0","0"),
("3961","1","28","4","content","Hláška možnosti novej registrácie","field_word_nova_registracia","Pokud máte další doklad o nákupu můžete přejít k nové registraci ZDE.","1","0","0"),
("3962","1","28","13","content","Počet znakov vygenerovaného hashu","_email_conf_char","8","1","0","0"),
("3963","1","28","13","content","Hláška, súťažiacemu ktorá mu príde na email po registracii.","_email_conf_sent_text","Děkujeme za registraci do soutěže a přejeme Vám hodně štěstí při slosování!","1","0","0"),
("3964","1","28","12","content","Telefónne číslo","form_base_tel_c","Telefonní číslo","0","0","0"),
("3965","1","28","4","content","Hláška za hviezdičkou o povinných poliach","field_word_povinne_polia","","1","0","0"),
("3966","1","28","2","image","Fotka loga k modulu UBYTOVANIE","_menu_7_image_2_1","442","0","0","0"),
("3967","1","28","16","content","Názov hotelu 2","info_hotel_name_2","Hotel Latini","1","0","0"),
("3968","1","28","16","content","Adresa Hotela 2","info_hotel_addr_2","Kitzsteinhornstraße 2+4   <br/>  A - 5700 Zell am See","1","0","0"),
("3969","1","28","16","content","Telefón do hotela 2","info_hotel_tel_c_2","+43 (0) 6542 5425","1","0","0"),
("3970","1","28","16","content","Email hotelu 2","info_hotel_email_2","office@latini.at","1","0","0"),
("3971","1","28","16","content","Text k modulu UBYTOVANIE 2","_menu_7_text_2","<p><strong>Hotel Latini</strong></p>\n\n<p>Hotel Latini se nach&aacute;z&iacute; naproti lanov&eacute; dr&aacute;hy Areit a bude v&aacute;s v něm h&yacute;čkat t&yacute;m tohoto 4-hvězdičkov&eacute;ho hotelu v Zell am See. Rozs&aacute;hl&yacute; hotelov&yacute; komplex zahrnuje několik restaurac&iacute; a barů a tak&eacute; l&aacute;zně, což v&aacute;m d&aacute;v&aacute; možnost využit&iacute; mas&aacute;ž&iacute;, manik&uacute;ry a pedik&uacute;ry.</p>\n\n<p>K dispozici je tak&eacute; posilovna, kryt&yacute; baz&eacute;n, konferenčn&iacute; m&iacute;stnosti a podzemn&iacute; gar&aacute;že.</p>\n\n<p>Nechte se okouzlit apartm&aacute;ny a pokoji 4-hvězdičkov&eacute;ho hotelu Latini. Pokoje s n&aacute;zvem Alpsk&aacute; růže, Hořec a Alpsk&aacute; protěž jsou pohodln&eacute; rekreačn&iacute; rezidence po dobu va&scaron;eho pobytu v Rakousku.</p>\n","1","0","0"),
("3972","1","28","17","content","Text k modulu UBYTOVANIE 3","_menu_7_text_3","<p><strong>Dovolen&aacute; v Zell am See je dovolenou s požitkem - v hotelu Tirolerhof!</strong></p>\n\n<p>Jezero, hory, ledovec a stylov&yacute;, rodinn&yacute; 4-hvězdičkov&yacute; hotel superior v Zell am See &ndash; to je ide&aacute;ln&iacute; kombinace pro va&scaron;i dovolenou v Zell am See, v l&eacute;tě i v zimě. Budete m&iacute;t v&yacute;hled na jezero Zeller See, hory Schmittenh&ouml;he a Kitzsteinhorn se v&scaron;emi rozmanit&yacute;mi sportovn&iacute;mi a rekreačn&iacute;mi možnostmi a budete h&yacute;čk&aacute;ni v b&aacute;ječn&eacute;m a mimoř&aacute;dn&eacute;m hotelu kulin&aacute;řsk&yacute;mi specialitami nejvy&scaron;&scaron;&iacute; kvality. Nebo str&aacute;v&iacute;te dovolenou spojenou s golfem v Salcburku, kde budete m&iacute;t v&yacute;hled na n&aacute;dhern&eacute; hory a jezero oblasti Zell am See-Kaprun. Nebo si užijete ve dvou n&aacute;dhern&eacute; apartm&aacute;ny v r&aacute;mci romantick&eacute; dovolen&eacute;. Nebo si poř&aacute;dně odpočinete s wellness a l&aacute;zeňskou nab&iacute;dkou vy&scaron;&scaron;&iacute; tř&iacute;dy a načerp&aacute;te novou energii. Takto může vypadat va&scaron;e dal&scaron;&iacute; rekreačn&iacute; dovolen&aacute; v hotelu Tirolerhof Zell am See - v srdci Salcburku. Wellness hotel, čtyřhvězdičkov&yacute; hotel superior, hotel pro hosty s pejsky, relaxačn&iacute; hotel - v&scaron;echny tyto př&iacute;vlastky si hotel Tirolerhof plně zaslouž&iacute;.</p>\n\n<p>&nbsp;</p>\n\n<p><strong>Prožijte nezapomenutelnou dovolenou v hotelu Tirolerhof!</strong></p>\n","0","0","0"),
("3973","1","28","17","content","Email hotelu 3","info_hotel_email_3","welcome@tirolerhof.co.at","0","0","0"),
("3974","1","28","17","content","Telefón do hotela 3","info_hotel_tel_c_3","+43(0)6542/772-0","0","0","0"),
("3975","1","28","17","content","Adresa Hotela 3","info_hotel_addr_3","Auerspergstrasse 5   <br/>   A - 5700 Zell am See","0","0","0"),
("3976","1","28","17","content","Názov hotelu 3","info_hotel_name_3","Hotel Tirolerhof ****S","0","0","0"),
("3977","1","28","16","image","Fotka loga k modulu UBYTOVANIE 2","_menu_7_image_1_2","452","1","0","0"),
("3978","1","28","16","image","Fotka k modulu UBYTOVANIE 2","_menu_7_image_2_2","451","0","0","0"),
("3979","1","28","17","image","Fotka loga k modulu UBYTOVANIE 3","_menu_7_image_1_3","51","0","0","0"),
("3980","1","28","17","image","Fotka k modulu UBYTOVANIE 3","_menu_7_image_2_3","56","0","0","0"),
("3981","1","28","2","content","Url adresa hotela 1","link_hotel_1","http://www.falkenstein.at","1","0","0"),
("3982","1","28","16","content","Url adresa hotela 2","link_hotel_2","http://www.latini.at","1","0","0"),
("3983","1","28","17","content","Url adresa hotela 3","link_hotel_3","http://www.tirolerhof.co.at/","0","0","0"),
("3984","1","28","9","image","Druhá fotka modulu pre modul GALÉRIA","_menu_5_gallery_1","49","1","0","0"),
("3985","1","28","5","image","Fotka v hlavnom slideri 2","_menu_1_image_2","436","1","0","0"),
("3986","1","28","4","content","Po ukončení registrácie","field_word_koniec_registracie","<p>SOUTĚŽ BYLA UKONČENA 1.8. 2016</p>\n\n<p>Slosov&aacute;n&iacute; bylo provedeno dne 5.8.&nbsp;2016&nbsp;dle pravidel soutěže.&nbsp;</p>\n\n<p><strong>1x rodinn&yacute; letn&iacute; pobyt, pro 2 dospěl&eacute; a 2 děti , na 5 dn&iacute; / 4 noci ve 4* hotelu, včetně polopenze a animačn&iacute;ho programu pro děti, to v&scaron;e v rakousk&eacute;m Zell am See-Kaprun, z&iacute;sk&aacute;vaj&iacute;:</strong></p>\n\n<p><strong>Petra Kuncova,&nbsp; 46804 Jablonec nad Nisou , ČR</strong></p>\n\n<p><strong>Alice Ertlbauerova,&nbsp; 62100 Brno, ČR</strong></p>\n\n<p><strong>Iveta Pohankova,&nbsp; 28002 Kol&iacute;n, ČR</strong></p>\n\n<p><strong>David Pravec,&nbsp; 53009 Pardubice, ČR</strong></p>\n\n<p><strong>Monika Adamusova,&nbsp; 58764 B&aacute;nov-Str&aacute;žky, ČR</strong></p>\n\n<p><strong>1x dětskou narozeninovou oslavu s překvapen&iacute;m kter&aacute; zahrnuje zaji&scaron;těn&iacute; z&aacute;bavn&eacute;ho doprovodn&eacute;ho programu (klaun, malov&aacute;n&iacute; na obličej a dal&scaron;&iacute; překvapen&iacute; ) pro Va&scaron;i narozeninovou oslavu u V&aacute;s doma, z&iacute;sk&aacute;v&aacute;:</strong></p>\n\n<p><strong>Vlasta Kozov&aacute;, 739 46 Hukvaldy, ČR</strong></p>\n\n<p>V&yacute;hern&iacute; vouchery budou vyercům odesl&aacute;ny mailem nebo po&scaron;tou v&nbsp;nejbliž&scaron;&iacute;ch dnech! Pobyty jsou kromě dopravy. Spr&aacute;vnost a platnost slosov&aacute;n&iacute; potvrzuj&iacute; provozovatel&eacute; soutěže.</p>\n\n<p><strong><u>V&yacute;hercům blahopřejeme a v&scaron;em ostatn&iacute;m děkujeme za &uacute;čast!</u></strong></p>\n\n<p><span style=\"font-size:12px\">Provozovatel&eacute; soutěže:&nbsp;Organiz&aacute;tor: Zell am See-Kaprun Tourismus GmbH, Brucker Bundesstr.1a, 5700 Zell am See, AT a spoluorganiz&aacute;tor : Pompo, spol. s r.o., Lidick&aacute; 481, 273 51&nbsp; Unho&scaron;ť, ČR</span></p>\n","0","0","0"),
("3987","1","28","11","content","Názov modulu pre modul O PARTNEROVI","_menu_name_8","O Partnerovi","0","0","0"),
("3988","1","28","15","content","Email partnera","info_partner_email","info.eshop@pompo.cz","1","0","0"),
("3989","1","28","15","content","Adresa partnera","info_partner_addr","Lidická 481 <br/> 273 51 Unhošť","1","0","0"),
("3990","1","28","15","content","Názov partnera","info_partner_name","Pompo spol. s r.o.","1","0","0"),
("3991","1","28","15","content","Telefónne číslo na partnera","info_partner_tel_c","737 279 015","1","0","0"),
("3992","1","28","11","content","Text k modulu O PARTNEROVI 1","_menu_8_text_1","<p>Pompo - největ&scaron;&iacute; maloobchodn&iacute; s&iacute;ť prodejen hraček a internetov&yacute; obchod s hračkami</p>\n","0","0","0"),
("3993","1","28","1","content","Jazyková mutácia pre Facebook","_language","cs_CZ","1","0","0"),
("3994","1","28","12","image","Newsletter 2 (PDF)","form_file_newsletter_2","68","0","0","0"),
("3995","1","28","4","content","Súhlasím s newslettrom 2","field_word_suhlas_news_2","News 2","0","0","0"),
("3996","1","28","18","content","Email hotelu 4","info_hotel_email_4","welcome@tirolerhof.co.at","0","0","0"),
("3997","1","28","18","content","Telefón do hotela 4","info_hotel_tel_c_4","+43(0)6542/772-0","0","0","0"),
("3998","1","28","18","content","Adresa Hotela 4","info_hotel_addr_4","Auerspergstrasse 5   <br/>   A - 5700 Zell am See","1","0","0"),
("3999","1","28","18","content","Názov hotelu 4","info_hotel_name_4","Hotel Tirolerhof ****S","0","0","0"),
("4000","1","28","18","image","Fotka loga k modulu UBYTOVANIE 4","_menu_7_image_1_4","","0","0","0"),
("4001","1","28","18","image","Fotka k modulu UBYTOVANIE 4","_menu_7_image_2_4","","1","0","0"),
("4002","1","28","18","content","Url adresa hotela 4","link_hotel_4","http://www.tirolerhof.co.at/","0","0","0"),
("4003","1","28","18","content","Text k modulu UBYTOVANIE 4","_menu_7_text_4","","0","0","0"),
("4004","1","28","11","image","Fotka k modulu O PARTNEROVI","_menu_8_image_1","","0","0","0"),
("4005","1","28","1","content","Google Plus","social_google_plus","https://plus.google.com/+zellamseekaprun","1","0","0"),
("4006","1","28","12","content","Input Otázka","form_extend_v2_otazka","Napíšte farbu vášho PC","0","0","0"),
("4007","1","28","13","content","Odoslať potvrdzovací email","sent_confirm_mail","1","1","0","0"),
("4008","1","28","12","content","Voliteľný parameter 1","form_base_custom_1","Místo Vašeho nákupu (zadejte město)","1","0","0"),
("4009","1","29","1","content","Template","layout","dnt_first","1","0","0"),
("4010","1","29","15","content","Link partnera","link_partner","http://www.northland-pro.com","1","0","0"),
("4011","1","29","3","content","Link regionu","link_region","http://trail.salzkammergut.at","1","0","0"),
("4012","1","29","1","content","Zobraziť na URL adrese","real_address","http://www.vyhrat.com/","1","0","0"),
("4013","1","29","1","content","Facebook","social_fb","https://www.facebook.com/Northland.Pro","1","0","0"),
("4014","1","29","1","content","Twitter","social_twitter","https://twitter.com/salzkammergut","1","0","0"),
("4015","1","29","1","content","Instagram","social_linked_in","https://www.flickr.com/photos/salzkammergut_austria","1","0","0"),
("4016","1","29","1","content","Mapa ","map_location","https://www.google.at/maps/place/Salzkammergut+Tourismus-Marketing+GmbH/@47.7112848,13.6225279,17z/data=!3m1!4b1!4m5!3m4!1s0x47714d221eaa3a6f:0xb1b83d93f46bcae4!8m2!3d47.7112812!4d13.6247166","0","0","0"),
("4017","1","29","1","image","Favicon","favicon","57","1","0","0"),
("4018","1","29","1","content","Model farby R","_r","251","1","0","0"),
("4019","1","29","1","content","Model farby G","_g","199","1","0","0"),
("4020","1","29","1","content","Model farby B","_b","9","1","0","0"),
("4021","1","29","1","content","Font","_font","Arial","1","0","0"),
("4022","1","29","2","content","Názov hotelu 1","info_hotel_name_1","Landhaus Liesetal","0","0","0"),
("4023","1","29","2","content","Adresa Hotela 1","info_hotel_addr_1","Liesetal 9   <br/>  59969 Hallenberg-Liesen - DE","1","0","0"),
("4024","1","29","2","content","Telefón do hotela 1","info_hotel_tel_c_1","(02984) 9212-0","1","0","0"),
("4025","1","29","2","content","Email hotelu 1","info_hotel_email_1","info@haus-liesetal.de","1","0","0"),
("4026","1","29","3","content","Názov regiónu","info_region_name","Salzkammergut Seen Wandern","1","0","0"),
("4027","1","29","3","content","Adresa regiónu","info_region_addr","Salinenplatz 1  <br/>  A-4820 Bad Ischl","1","0","0"),
("4028","1","29","3","content","Telefónne číslo regiónu","info_region_tel_c","+43 6132 26909","1","0","0"),
("4029","1","29","3","content","Email regiónu","info_region_email","info@salzkammergut.at","1","0","0"),
("4030","1","29","1","content","Youtube video","youtube_video","v-0sWLXxbYc","1","0","0"),
("4031","1","29","15","image","Logo partnera","partner_logo","458","1","0","0"),
("4032","1","29","3","image","Logo regiónu","region_logo","469","1","0","0"),
("4033","1","29","5","image","Fotka v hlavnom slideri 1","_menu_1_image_1","475","1","0","0"),
("4034","1","29","7","image","Fotka modulu pre modul GALÉRIA","_menu_3_image_1","462","1","0","0"),
("4035","1","29","7","image","Druhá fotka modulu pre modul GALÉRIA","_menu_3_image_2","463","1","0","0"),
("4036","1","29","2","image","Fotka k modulu UBYTOVANIE","_menu_7_image_1_1","406","1","0","0"),
("4037","1","29","5","content","Názov modulu pre modul INFO","_menu_name_1","Intro","1","1","0"),
("4038","1","29","6","content","Názov modulu pre modul O SÚŤAŽI","_menu_name_2","Gewinnspiel","0","0","0"),
("4039","1","29","7","content","Názov modulu pre modul GALÉRIU","_menu_name_3","Galérie","0","0","0"),
("4040","1","29","8","content","Názov modulu pre modul FORMULÁRU","_menu_name_4","Teilnahme","1","2","0"),
("4041","1","29","9","content","Názov modulu pre modul O REGIONE","_menu_name_5","Salzkammergut","1","3","0"),
("4042","1","29","10","content","Názov modulu pre modul MAPA","_menu_name_6","Mapa","0","0","0"),
("4043","1","29","11","content","Názov modulu pre modul UBYTOVANIE","_menu_name_7","Teilnehmende Hotels","0","0","0"),
("4044","1","29","5","content","Text k modulu INFO","_menu_1_text_1","<p><span style=\"color:#333333\"><span style=\"font-size:20px\"><strong>Gewinnen Sie einen von 10 Urlauben im&nbsp;Salzkammergut!</strong></span></span></p>\n","1","0","0"),
("4045","1","29","6","content","Text k modulu O SÚŤAŽI","_menu_2_text_1","<p style=\"text-align:center\"><span style=\"color:#333333\"><strong><span style=\"font-size:18px\">Wir verlosen 10 Urlaube f&uuml;r je 2 Personen &agrave; 3 N&auml;chte in einem 3* - 4* Hotel inklusive Verpflegung und einer Wanderkarte.</span></strong></span></p>\n\n<p style=\"text-align:center\"><span style=\"color:#333333\"><span style=\"font-size:18px\">Einfach Teilnahmeformular ausf&uuml;llen, Frage richtig beantworten und ihr habt die Chance auf den tollen Urlaub.</span></span></p>\n\n<p style=\"text-align:center\"><span style=\"color:#333333\"><span style=\"font-size:18px\"><strong>Gewinnspiel l&auml;uft ab 1. April 2017. Teilnahmeschluss ist der 15. Mai 2017.</strong><br />\nG&uuml;ltigkeit der Gutscheine je ein Jahr auf Anfrage und nach Verf&uuml;gbarkeit.</span></span></p>\n","1","0","0"),
("4046","1","29","7","content","Text k modulu GALÉRIA","_menu_3_text_1","","0","0","0"),
("4047","1","29","8","content","Text k modulu FORMULÁR","_menu_4_text_1","<p>Ihre Registrierung:&nbsp;</p>\n","1","0","0"),
("4048","1","29","9","content","Text k modulu O REGIÓNE","_menu_5_text_1","<p><strong>Der Salzkammergut BergeSeen Trail</strong><br />\nEin einzigartiger Weitwanderweg von See zu See und zu Pl&auml;tzen voller Poesie.</p>\n\n<p>Hohe Herrschaften wie Erzherzog Johann oder Kaiserin Elisabeth haben das Salzkammergut bereits durchwandert. Forscher wie Friedrich Simony, Dichter und Schriftsteller wie Nikolaus Lenau und&nbsp; Musiker und Komponisten wie Johannes Brahms. Ob sie jemals daran gedacht haben, mit dem Wandern im Salzkammergut einfach nicht mehr aufzuh&ouml;ren?<br />\nWandern ist im Trend und das Salzkammergut bietet daf&uuml;r optimale Voraussetzungen. Die Kombination aus Berge und kristallklaren Seen, intakte Almenlandschaften mit bewirtschafteten Almen und H&uuml;tten, engagierte Unternehmen die entsprechende Wanderprodukte auf den Markt bringen und einer Hundertschaft von markierten Wanderwegen sind daf&uuml;r die Basis. Das Salzkammergut erweist sich als wanderbares Paradies. Die &bdquo;glitzernden&ldquo; Ziele und Wegbegleiter sorgen dabei immer wieder f&uuml;r eine geh&ouml;rige Portion Frische und Abk&uuml;hlung, denn Wandern am Wasser &ndash; das ist das Besondere am Salzkammergut BergeSeen Trail.</p>\n\n<p>Realisiert wurde der Salzkammergut BergeSeen Trail als Gemeinschaftsprojekt der Tourismusorganisationen des Salzkammergutes und der Salzkammergut Tourismus-Marketing GmbH sowie dem &Ouml;sterreichischen Alpenverein und den Naturfreunden Salzkammergut.</p>\n","1","0","0"),
("4049","1","29","9","content","Ďalší text k modulu O REGIÓNE","_menu_5_text_2","<p>Auf durchgehend mit dem Logo des Salzkammergut BergeSeen Trails gekennzeichneten Wegen verbindet er nicht weniger als 35 Seen, alle zehn Regionen des Salzkammergutes und somit auch die drei Bundesl&auml;nder Ober&ouml;sterreich, Salzburg und Steiermark.<br />\nDie klassische Variante umfasst rund 350 km, die auf 20 Tagesetappen aufgeteilt sind. Mit diversen zus&auml;tzlichen alpinen Varianten sowie seinen regionalen Abschnitten wird die Gesamtzahl der Tagesetappen nahezu verdoppelt. Die meisten Tagesziele enden in Orten mit bester touristischer Infrastruktur und guten N&auml;chtigungsm&ouml;glichkeiten. Einzelne Strecken f&uuml;hren aber auch zu einsam gelegenen Gasth&ouml;fen oder alpinen Schutzh&uuml;tten mit Bergromantik-Garantie. F&uuml;r welche Varianten man sich auch immer entscheidet: das landschaftliche Erlebnis und die kulturellen H&ouml;hepunkte sind in jedem Fall gro&szlig;artig und unvergesslich!</p>\n\n<p>Die offizielle Er&ouml;ffnung des Salzkammergut BergeSeen Trails &ndash; der erste Weitwanderweg im Salzkammergut, der alle drei &bdquo;Salzkammergut Bundesl&auml;nder&ldquo; umfasst - findet am 7. Juni 2017 auf der Katrin, dem Hausberg von Bad Ischl, statt. Mit dabei unter anderen die drei Tourismuslandesr&auml;te aus Ober&ouml;sterreich, Salzburg und der Steiermark.<br />\nDer Kompass Wanderf&uuml;hrer&nbsp;und&nbsp;die Wanderkarte &bdquo;Salzkammergut BergeSeen Trail&ldquo;&nbsp;erscheinen im April 2017 und sind im Buchhandel sowie bei allen Tourismusverb&auml;nden im Salzkammergut und unter <a href=\"http://trail.salzkammergut.at\">trail.salzkammergut.at</a> oder <a href=\"http://www.kompass.de/wanderfuehrer\">www.kompass.de/wanderfuehrer</a> k&auml;uflich erwerbbar.<br />\nDie Wander&uuml;bersichtskarte ist kostenlos bei allen Tourismusverb&auml;nden im Salzkammergut erh&auml;ltlich sowie unter&nbsp; <a href=\"http://www.salzkammergut.at/trail.html\" target=\"_blank\"><strong>trail.salzkammergut.at</strong></a>&nbsp; zu bestellen.</p>\n","1","0","0"),
("4050","1","29","10","content","Text k modulu MAPA","_menu_6_text_1","<p>Mapa regionu</p>\n","0","0","0"),
("4051","1","29","2","content","Text k modulu UBYTOVANIE 1","_menu_7_text_1","<p><strong>Landhaus Liesetal</strong></p>\n\n<p>Das familiengef&uuml;hrte 3 Sterne <strong>Hotel Landhaus Liesetal</strong> hat f&uuml;r jeden Geschmack etwas zu bieten.</p>\n\n<p>Ob Wandern, Kultur, Nordic Walking oder Mountainbiking &ndash; direkt am Zuwanderweg Rothaarsteig, Sauerland H&ouml;henflug und Hallenberger Wanderrausch, zwischen Winterberg und Willingen gelegen, ist das Hotel der ideale Ausgangspunkt f&uuml;r die unterschiedlichsten Aktivit&auml;ten.</p>\n\n<p>Auch die Entspannung kommt im Landhaus nicht zu kurz: Einfach die Seele baumeln lassen - beim genie&szlig;en der regionalen K&uuml;che, in der Sauna oder bei vielf&auml;ltigen Wellnessmassagen.</p>\n\n<p>Mehr Infos unter:&nbsp;<a href=\"http://www.landhaus-liesetal.de\">www.landhaus-liesetal.de</a></p>\n","1","0","0"),
("4052","1","29","12","content","Input Meno","form_base_name","Vorname","1","0","0"),
("4053","1","29","12","content","Input Priezvisko","form_base_surname","Nachname","1","0","0"),
("4054","1","29","12","content","Input PSČ","form_base_psc","Straße","1","0","0"),
("4055","1","29","12","content","Input Mesto","form_base_city","Ort","1","0","0"),
("4056","1","29","12","content","Input Email","form_base_email","eMail","1","0","0"),
("4057","1","29","12","content","Input Doklad","form_extend_v1_doklad","","0","0","0");
INSERT INTO dnt_microsites_composer VALUES
("4058","1","29","12","content","Input Otázka + odpovede","form_extend_v3_otazka","Aus wie vielen Tagesetappen besteht der Salzkammergut BergeSeen Trail?","1","0","0"),
("4059","1","29","12","content","Odpoveď A","form_extend_v3_odpoved_a","14 Tagesetappen","1","0","0"),
("4060","1","29","12","content","Odpoveď B","form_extend_v3_odpoved_b","18 Tagesetappen","1","0","0"),
("4061","1","29","12","content","Odpoveď C","form_extend_v3_odpoved_c","20 Tagesetappen","1","0","0"),
("4062","1","29","4","content","Názov","field_word_nazov","Názov","0","0","0"),
("4063","1","29","4","content","Adresa","field_word_adresa","Adresa","0","0","0"),
("4064","1","29","4","content","Kontakt","field_word_kontakt","Kontakt","0","0","0"),
("4065","1","29","4","content","Web","field_word_web","Web","0","0","0"),
("4066","1","29","4","content","Hláška povinné pole","field_word_err","Pflichtfelder","1","0","0"),
("4067","1","29","4","content","Registrovať","field_word_sent","Teilnehmen","1","0","0"),
("4068","1","29","4","content","Predchádzajúca (fotka)","field_word_previous","Vorheriges","1","0","0"),
("4069","1","29","4","content","Ďalšia (fotka)","field_word_next","Nächstes","1","0","0"),
("4070","1","29","4","content","Súhlasím s newslettrom","field_word_suhlas_news","Ja, ich stimme zu, den Newsletter der Region Salzkammergut und von Northland Professional zu erhalten und meine Daten für weitere Marketingaktivitäten zur Verfügung zu stellen.","1","0","0"),
("4071","1","29","4","content","Súhlasím s podmienkami súťaže","field_word_suhlas_podm","Ja, ich stimme den Teilnahmebedingungen zu. (Teilnahmebedingungen HIER).","1","0","0"),
("4072","1","29","1","content","Kľúčové slová pre Google","keywords","Gewinnspiel  Salzkammergut BergeSeen Trail","1","0","0"),
("4073","1","29","1","content","Popis pre Google","description","This competition has a first ID","1","0","0"),
("4074","1","29","4","content","Súhlasím s podmienkami súťaže","field_word_dakujeme","Danke, Sie haben sich erfolgreich für das Gewinnspiel registriert.","1","0","0"),
("4075","1","29","12","image","Podmienky súťaže (PDF)","form_file_podmienky","550","1","0","0"),
("4076","1","29","12","image","Newsletter (PDF)","form_file_newsletter","473","0","0","0"),
("4077","1","29","4","content","Hláška možnosti novej registrácie","field_word_nova_registracia","Jetzt Freunde einladen!","1","0","0"),
("4078","1","29","13","content","Počet znakov vygenerovaného hashu","_email_conf_char","8","1","0","0"),
("4079","1","29","13","content","Hláška, súťažiacemu ktorá mu príde na email po registracii.","_email_conf_sent_text","Danke, Sie haben sich erfolgreich für das Gewinnspiel registriert. Wir wünschen Ihnen viel Erfolg bei der Verlosung!","1","0","0"),
("4080","1","29","12","content","Telefónne číslo","form_base_tel_c","Tel. Nr.","1","0","0"),
("4081","1","29","4","content","Hláška za hviezdičkou o povinných poliach","field_word_povinne_polia","","1","0","0"),
("4082","1","29","2","image","Fotka loga k modulu UBYTOVANIE","_menu_7_image_2_1","407","0","0","0"),
("4083","1","29","16","content","Názov hotelu 2","info_hotel_name_2","Hotel Schneider","0","0","0"),
("4084","1","29","16","content","Adresa Hotela 2","info_hotel_addr_2","Am Waltenberg 58  <br/>   59955 Winterberg -  DE","1","0","0"),
("4085","1","29","16","content","Telefón do hotela 2","info_hotel_tel_c_2","(02981) 899738","1","0","0"),
("4086","1","29","16","content","Email hotelu 2","info_hotel_email_2","info@hotel-schneider-winterberg.de ","1","0","0"),
("4087","1","29","16","content","Text k modulu UBYTOVANIE 2","_menu_7_text_2","<p><strong>Hotel Schneider</strong></p>\n\n<p>Im <strong>Hotel Schneider</strong> ist f&uuml;r jeden etwas dabei.</p>\n\n<p>Gem&uuml;tliche und ger&auml;umige Zimmer laden zum Verweilen ein und auch sonst hat das Hotel viele Annehmlichkeiten zu bieten: Restaurant, Hotelbar, kostenloses WLAN, Kinderspielecke, Sitzgelegenheit an der Rezeption, Bio Sauna, Finnische Sauna, Solarium, Infrarotkabine, Massagesessel, Fitnessger&auml;te, Lift und Kaminecke.</p>\n\n<p>Das Hotel Schneider ist zentral aber tortzdem sehr ruhig gelegen. Das Zentrum von Winterberg mit seinen zahlreichen Freizeit- und Einkaufsm&ouml;glichkeiten ist zu Fu&szlig; erreichbar. Der Einstieg in das Skiliftkarussell Winterberg &nbsp;sowie der Erlebnisberg Kappe liegen ebenfalls in direkter Nachbarschaft.</p>\n\n<p>Mehr Infos unter:&nbsp;<a href=\"http://www.hotel-schneider-winterberg.de\">www.hotel-schneider-winterberg.de</a></p>\n","1","0","0"),
("4088","1","29","17","content","Text k modulu UBYTOVANIE 3","_menu_7_text_3","<p><strong>Dovolen&aacute; v Zell am See je dovolenou s požitkem - v hotelu Tirolerhof!</strong></p>\n\n<p>Jezero, hory, ledovec a stylov&yacute;, rodinn&yacute; 4-hvězdičkov&yacute; hotel superior v Zell am See &ndash; to je ide&aacute;ln&iacute; kombinace pro va&scaron;i dovolenou v Zell am See, v l&eacute;tě i v zimě. Budete m&iacute;t v&yacute;hled na jezero Zeller See, hory Schmittenh&ouml;he a Kitzsteinhorn se v&scaron;emi rozmanit&yacute;mi sportovn&iacute;mi a rekreačn&iacute;mi možnostmi a budete h&yacute;čk&aacute;ni v b&aacute;ječn&eacute;m a mimoř&aacute;dn&eacute;m hotelu kulin&aacute;řsk&yacute;mi specialitami nejvy&scaron;&scaron;&iacute; kvality. Nebo str&aacute;v&iacute;te dovolenou spojenou s golfem v Salcburku, kde budete m&iacute;t v&yacute;hled na n&aacute;dhern&eacute; hory a jezero oblasti Zell am See-Kaprun. Nebo si užijete ve dvou n&aacute;dhern&eacute; apartm&aacute;ny v r&aacute;mci romantick&eacute; dovolen&eacute;. Nebo si poř&aacute;dně odpočinete s wellness a l&aacute;zeňskou nab&iacute;dkou vy&scaron;&scaron;&iacute; tř&iacute;dy a načerp&aacute;te novou energii. Takto může vypadat va&scaron;e dal&scaron;&iacute; rekreačn&iacute; dovolen&aacute; v hotelu Tirolerhof Zell am See - v srdci Salcburku. Wellness hotel, čtyřhvězdičkov&yacute; hotel superior, hotel pro hosty s pejsky, relaxačn&iacute; hotel - v&scaron;echny tyto př&iacute;vlastky si hotel Tirolerhof plně zaslouž&iacute;.</p>\n\n<p>&nbsp;</p>\n\n<p><strong>Prožijte nezapomenutelnou dovolenou v hotelu Tirolerhof!</strong></p>\n","0","0","0"),
("4089","1","29","17","content","Email hotelu 3","info_hotel_email_3","welcome@tirolerhof.co.at","0","0","0"),
("4090","1","29","17","content","Telefón do hotela 3","info_hotel_tel_c_3","+43(0)6542/772-0","0","0","0"),
("4091","1","29","17","content","Adresa Hotela 3","info_hotel_addr_3","Auerspergstrasse 5   <br/>   A - 5700 Zell am See","0","0","0"),
("4092","1","29","17","content","Názov hotelu 3","info_hotel_name_3","Hotel Tirolerhof ****S","0","0","0"),
("4093","1","29","16","image","Fotka loga k modulu UBYTOVANIE 2","_menu_7_image_1_2","409","0","0","0"),
("4094","1","29","16","image","Fotka k modulu UBYTOVANIE 2","_menu_7_image_2_2","408","1","0","0"),
("4095","1","29","17","image","Fotka loga k modulu UBYTOVANIE 3","_menu_7_image_1_3","51","0","0","0"),
("4096","1","29","17","image","Fotka k modulu UBYTOVANIE 3","_menu_7_image_2_3","56","0","0","0"),
("4097","1","29","2","content","Url adresa hotela 1","link_hotel_1","http://www.landhaus-liesetal.de","1","0","0"),
("4098","1","29","16","content","Url adresa hotela 2","link_hotel_2","http://www.hotel-schneider-winterberg.de","1","0","0"),
("4099","1","29","17","content","Url adresa hotela 3","link_hotel_3","http://www.tirolerhof.co.at/","0","0","0"),
("4100","1","29","9","image","Druhá fotka modulu pre modul GALÉRIA","_menu_5_gallery_1","54","1","0","0"),
("4101","1","29","5","image","Fotka v hlavnom slideri 2","_menu_1_image_2","476","1","0","0"),
("4102","1","29","4","content","Po ukončení registrácie","field_word_koniec_registracie","<p><span style=\"color:#FF0000\"><span style=\"font-size:20px\"><strong><span style=\"font-family:arial,sans-serif\">Das&nbsp;</span>Gewinnspiel<span style=\"font-family:arial,sans-serif\">&nbsp;ist&nbsp;</span>bereits beendet<span style=\"font-family:arial,sans-serif\">!</span></strong></span></span></p>\n\n<p><span style=\"color:#FF0000\"><span style=\"font-size:20px\">Wir&nbsp;danken<span style=\"font-family:arial,sans-serif\">&nbsp;euch f&uuml;r die rege&nbsp;</span>Teilnahme<span style=\"font-family:arial,sans-serif\">!</span></span></span></p>\n\n<p><span style=\"font-size:18px\"><span style=\"color:#FF0000\"><span style=\"font-family:arial,sans-serif\">Unsere Gl&uuml;ckw&uuml;nsche an die folgenden&nbsp;</span>Gewinner<span style=\"font-family:arial,sans-serif\">:</span></span></span></p>\n","0","0","0"),
("4103","1","29","11","content","Názov modulu pre modul O PARTNEROVI","_menu_name_8","Northland","1","5","0"),
("4104","1","29","15","content","Email partnera","info_partner_email","office@northland-pro.com","1","0","0"),
("4105","1","29","15","content","Adresa partnera","info_partner_addr","Grabenstraße 90c <br/>  A - 8010 Graz","1","0","0"),
("4106","1","29","15","content","Názov partnera","info_partner_name","Northland GmbH","1","0","0"),
("4107","1","29","15","content","Telefónne číslo na partnera","info_partner_tel_c","+43 (0) 316 714177","1","0","0"),
("4108","1","29","11","content","Text k modulu O PARTNEROVI 1","_menu_8_text_1","<p>Hinter Northland Professional steht ein &ouml;sterreichisches Familienunternehmen, welches seit 1973 hochwertige Bekleidung &amp; Ausr&uuml;stung f&uuml;r bergsportbegeisterte Menschen entwickelt und produziert.<br />\nIm Laufe der Jahre hat sich der Anspruch unserer Kunden gewandelt. Immer mehr modische Aspekte pr&auml;gen die Outdoorwelt und heute muss hochfunktionelle Bekleidung auch richtig gut aussehen. Northland Professional hat sich bereits fr&uuml;h dieser Entwicklung verschrieben und zeigt in seinen Sportkollektionen einen gelungenen Mix aus Funktion und cooler Sportswear.<br />\nAuch in City &amp; Freizeit will unser Kunde nicht mehr auf Northland verzichten.&nbsp; Die Kollektion zeigt&nbsp; auch hier &ndash; gem&auml;&szlig; unserem Slogan &bdquo;The Spirit of sportive Lifestyle&ldquo;&nbsp; &ndash; eine Welt, in der Funktion und Design wunderbar miteinander harmonieren.</p>\n\n<p>Erfahren Sie als Erster von aktuellen <strong><a href=\"http://www.northland-pro.com/newsletter/\" target=\"_blank\">Trends und Neuheiten HIER!</a></strong></p>\n","1","0","0"),
("4109","1","29","1","content","Jazyková mutácia pre Facebook","_language","de_DE","1","0","0"),
("4110","1","29","12","image","Newsletter 2 (PDF)","form_file_newsletter_2","474","0","0","0"),
("4111","1","29","4","content","Súhlasím s newslettrom 2","field_word_suhlas_news_2","News 2","0","0","0"),
("4112","1","29","18","content","Email hotelu 4","info_hotel_email_4","welcome@tirolerhof.co.at","0","0","0"),
("4113","1","29","18","content","Telefón do hotela 4","info_hotel_tel_c_4","+43(0)6542/772-0","0","0","0"),
("4114","1","29","18","content","Adresa Hotela 4","info_hotel_addr_4","Auerspergstrasse 5   <br/>   A - 5700 Zell am See","1","0","0"),
("4115","1","29","18","content","Názov hotelu 4","info_hotel_name_4","Hotel Tirolerhof ****S","0","0","0"),
("4116","1","29","18","image","Fotka loga k modulu UBYTOVANIE 4","_menu_7_image_1_4","","0","0","0"),
("4117","1","29","18","image","Fotka k modulu UBYTOVANIE 4","_menu_7_image_2_4","","1","0","0"),
("4118","1","29","18","content","Url adresa hotela 4","link_hotel_4","http://www.tirolerhof.co.at/","0","0","0"),
("4119","1","29","18","content","Text k modulu UBYTOVANIE 4","_menu_7_text_4","","0","0","0"),
("4120","1","29","11","image","Fotka k modulu O PARTNEROVI","_menu_8_image_1","459","1","0","0"),
("4121","1","29","1","content","Google Plus","social_google_plus","https://plus.google.com/+salzkammergutAt","1","0","0"),
("4122","1","29","12","content","Input Otázka","form_extend_v2_otazka","Wie viele Pistenkilometer bietet ? ","0","0","0"),
("4123","1","29","13","content","Odoslať potvrdzovací email","sent_confirm_mail","1","1","0","0"),
("4124","1","29","12","content","Voliteľný parameter 1","form_base_custom_1","PLZ","1","0","0"),
("4125","1","30","1","content","Template","layout","dnt_second","1","0","0"),
("4126","1","30","15","content","Link partnera","link_partner","https://www.schwanda.at","1","0","0"),
("4127","1","30","3","content","Link regionu","link_region","http://www.kitzalps.cc","1","0","0"),
("4128","1","30","1","content","Zobraziť na URL adrese","real_address","http://www.vyhrat.com/","1","0","0"),
("4129","1","30","1","content","Facebook","social_fb","https://www.facebook.com/bergsport.schwanda","1","0","0"),
("4130","1","30","1","content","Twitter","social_twitter","http://www.twitter.com/kitzalpen","1","0","0"),
("4131","1","30","1","content","Instagram","social_linked_in","https://www.instagram.com/kitzalpen/","1","0","0"),
("4132","1","30","1","content","Mapa ","map_location","https://www.google.at/maps/place/St.+Johann+in+Tirol/@47.5115887,12.3730646,12z/data=!3m1!4b1!4m5!3m4!1s0x47764e2d91669135:0x5870ad035eff9063!8m2!3d47.5221901!4d12.4308125","1","0","0"),
("4133","1","30","1","image","Favicon","favicon","57","1","0","0"),
("4134","1","30","1","content","Model farby R","_r","0","1","0","0"),
("4135","1","30","1","content","Model farby G","_g","65","1","0","0"),
("4136","1","30","1","content","Model farby B","_b","110","1","0","0"),
("4137","1","30","1","content","Font","_font","Arial","1","0","0"),
("4138","1","30","2","content","Názov hotelu 1","info_hotel_name_1","Explorer Hotel Kitzbühel","1","0","0"),
("4139","1","30","2","content","Adresa Hotela 1","info_hotel_addr_1","Speckbacherstraße 87 <br/> A - 6380 St. Johann in Tirol ","1","0","0"),
("4140","1","30","2","content","Telefón do hotela 1","info_hotel_tel_c_1","+43 5352 216660","1","0","0"),
("4141","1","30","2","content","Email hotelu 1","info_hotel_email_1","kitzbuehel@explorer-hotels.com","1","0","0"),
("4142","1","30","3","content","Názov regiónu","info_region_name","Kitzbüheler Alpen St. Johann in Tirol ","1","0","0"),
("4143","1","30","3","content","Adresa regiónu","info_region_addr","Poststraße 2 <br/> A-6380 St. Johann in Tirol","1","0","0"),
("4144","1","30","3","content","Telefónne číslo regiónu","info_region_tel_c","+43 5352 633350","1","0","0"),
("4145","1","30","3","content","Email regiónu","info_region_email","info@kitzalps.cc","1","0","0"),
("4146","1","30","1","content","Youtube video","youtube_video","fdMg3ygvOns","1","0","0"),
("4147","1","30","15","image","Logo partnera","partner_logo","322","1","0","0"),
("4148","1","30","3","image","Logo regiónu","region_logo","485","1","0","0"),
("4149","1","30","5","image","Fotka v hlavnom slideri 1","_menu_1_image_1","477","1","0","0"),
("4150","1","30","7","image","Fotka modulu pre modul GALÉRIA","_menu_3_image_1","479","1","0","0"),
("4151","1","30","7","image","Druhá fotka modulu pre modul GALÉRIA","_menu_3_image_2","480","1","0","0"),
("4152","1","30","2","image","Fotka k modulu UBYTOVANIE","_menu_7_image_1_1","483","1","0","0"),
("4153","1","30","5","content","Názov modulu pre modul INFO","_menu_name_1","Intro","1","1","0"),
("4154","1","30","6","content","Názov modulu pre modul O SÚŤAŽI","_menu_name_2","Gewinnspiel","0","0","0"),
("4155","1","30","7","content","Názov modulu pre modul GALÉRIU","_menu_name_3","Galérie","0","0","0"),
("4156","1","30","8","content","Názov modulu pre modul FORMULÁRU","_menu_name_4","Teilnahme","1","3","0"),
("4157","1","30","9","content","Názov modulu pre modul O REGIONE","_menu_name_5","Region St. Johann in Tirol","1","2","0");
INSERT INTO dnt_microsites_composer VALUES
("4158","1","30","10","content","Názov modulu pre modul MAPA","_menu_name_6","Map","0","0","0"),
("4159","1","30","11","content","Názov modulu pre modul UBYTOVANIE","_menu_name_7","Teilnehmendes Hotel","1","4","0"),
("4160","1","30","5","content","Text k modulu INFO","_menu_1_text_1","<h3 style=\"color:#aaa; font-style:italic\"><strong><span style=\"font-size:18px\"><span style=\"color:#FFFFFF\"><span style=\"background-color:#FF0000\">Jetzt einen Urlaub in der Region Kitzb&uuml;heler Alpen St. Johann in Tirol gewinnen!&nbsp;</span></span></span></strong></h3>\n","1","0","0"),
("4161","1","30","6","content","Text k modulu O SÚŤAŽI","_menu_2_text_1","<h3><span style=\"font-size:18px\">So einfach geht&rsquo;s:&nbsp;<strong>Frage richtig beantworten und Formular ausf&uuml;llen und schon habt ihr die Chance<br />\nauf einen tollen Wanderurlaub.</strong></span></h3>\n\n<h3><span style=\"font-size:18px\"><strong>Hauptgewinn: </strong>2 Urlaube f&uuml;r 2 Personen &agrave; 3 N&auml;chte im Explorer Hotel Kitzb&uuml;hel in St. Johann in Tirol.</span></h3>\n","1","0","0"),
("4162","1","30","7","content","Text k modulu GALÉRIA","_menu_3_text_1","","1","0","0"),
("4163","1","30","8","content","Text k modulu FORMULÁR","_menu_4_text_1","<p><strong>Das Gewinnspiel l&auml;uft von 1. April 2017 bis 31. Mai 2017.</strong> Teilnahmeschluss ist der 31. Mai 2017.<br />\nDie Benachrichtigung der Gewinner erfolgt bis 15. Juni 2017.&nbsp;</p>\n\n<p><strong>Der Gutschein ist g&uuml;ltig f&uuml;r 2 Erwachsene &agrave; 3 N&auml;chte im Explorer Hotel Kitzb&uuml;hel inkl. Fr&uuml;hst&uuml;ck, in den Kitzb&uuml;heler Alpen St. Johann in Tirol.</strong> Der Gutschein gilt 1 Jahr ab Ausstellungsdatum auf Anfrage und nach Verf&uuml;gbarkeit.</p>\n","1","0","0"),
("4164","1","30","9","content","Text k modulu O REGIÓNE","_menu_5_text_1","<p><strong>Sport und Genuss in der Region St. Johann in Tirol<br />\nEin ganz besonderes Urlaubsgef&uuml;hl zwischen Kitzb&uuml;heler Horn und Kaisergebirge</strong></p>\n\n<p>Zwischen den bedeutendsten Bergen der Kitzb&uuml;heler Alpen, dem Kitzb&uuml;heler Horn auf der einen und dem markanten Kaisergebirge auf der anderen Seite, liegen die malerischen Orte St. Johann in Tirol, Oberndorf, Kirchdorf und Erpfendorf.<br />\nAls Bestandteil der Kitzb&uuml;heler Alpen pr&auml;sentieren sich die vier Tiroler Orte als attraktive Urlaubs-Destination auf hohem Niveau. Sportlich-aktive Urlauber, Natur-Liebhaber und Familien k&ouml;nnen sich in den Kitzb&uuml;heler Alpen auf Genuss pur einstellen: Sport und Erholung in den sanften Grasbergen bis hin zu den steil ansteigenden Gebirgsgipfeln, Abenteuer und Unterhaltung sowie authentische Tiroler Gastfreundschaft und kulinarische Gaumenfreuden.</p>\n","1","0","0"),
("4165","1","30","9","content","Ďalší text k modulu O REGIÓNE","_menu_5_text_2","<p><strong>Kitzb&uuml;heler Alpen machen Lust auf Wandern</strong><br />\nDie vielf&auml;ltige Landschaft in den Kitzb&uuml;heler Alpen l&auml;sst sich zu Fu&szlig; besonders intensiv und naturnah erleben. Auf gut markierten Wander- und Forstwegen k&ouml;nnen Naturliebhaber &uuml;ber Almen wandern, hohe Berggipfel erklimmen, wildromantische Bergseen oder Wasserf&auml;lle entdecken oder durch Schluchten und Kl&auml;mme steigen. Themenwanderungen, Lehrpfade und gef&uuml;hrte Touren mit gepr&uuml;ften Berg- und Wanderf&uuml;hrern versprechen unvergessliche Urlaubsmomente. Viele bekannte Touren oder Gipfel, wie z.B. die Fleischbank, die Teufelskanzel, das Ellmauer-Tor oder die Ackerl- und Mauckspitze lassen das Herz aller Alpinisten h&ouml;herschlagen. So bietet der &bdquo;Kaiser&ldquo; f&uuml;r alpines Wandern, gem&uuml;tliches Genuss-Klettern und atemberaubendes Sportklettern einzigartige Bedingungen.</p>\n\n<p><strong>Der Koasa-Trail &ndash; Weitwandern innerhalb einer Region </strong><br />\nDer Wilde Kaiser ist neben dem Kitzb&uuml;heler Horn das Markenzeichen der Region. Nach ihm benannt ist auch der neu eingef&uuml;hrte Weitwanderweg Koasa Trail. Auf vier Etappen f&uuml;hrt der Weg, immer im Blickwinkel des Wilden Kaisers, durch die sch&ouml;nsten Naturschaupl&auml;tze der Wanderregion.&nbsp;</p>\n\n<p>Bergsommer Opening 2017,&nbsp;<a href=\"http://www.bergsommer-opening.com\" target=\"_blank\">www.bergsommer-opening.com</a><br />\nMehr Informationen zu Kitzb&uuml;heler Alpen St. Johann in Tirol gibt es unter:&nbsp; <strong><a href=\"http://www.kitzalps.cc\" target=\"_blank\">www.kitzalps.cc</a></strong></p>\n","1","0","0"),
("4166","1","30","10","content","Text k modulu MAPA","_menu_6_text_1","<p>Map</p>\n","1","0","0"),
("4167","1","30","2","content","Text k modulu UBYTOVANIE 1","_menu_7_text_1","<p><strong>Explorer Hotel Kitzb&uuml;hel***</strong><br />\nUnkompliziert, trendig und preiswert. Mitten in den Kitzb&uuml;heler Alpen gelegen ist das Explorer.<br />\nHotel Kitzb&uuml;hel in St. Johann in Tirol nicht nur die passende, sondern auch preiswerte Location, um aktiv in die Berge zu starten. Die lockere Atmosph&auml;re, das moderne Design und die sportlich-aktiven G&auml;steversprechen Urlaubsfeeling f&uuml;r Entdecker.<br />\n&Uuml;bernachtet wird im trendigen Design-Zimmer mit jeder Menge Stauraum f&uuml;r das Sport-Equipment und gem&uuml;tlicher Sitznische mit Bergblick. Wer mag, brutzelt sich am Fr&uuml;hst&uuml;cksbuffet sein R&uuml;hrei selbst und informiert sich an den interaktiven Touchwalls &uuml;ber die besten Bike- und Wandertouren. Zur&uuml;ck aus den Bergen entspannt man im Sport Spa mit Sauna, Dampfbad, Infrarotkabine und Fitnessraum.</p>\n","1","0","0"),
("4168","1","30","12","content","Input Meno","form_base_name","Vorname","1","0","0"),
("4169","1","30","12","content","Input Priezvisko","form_base_surname","Nachname","1","0","0"),
("4170","1","30","12","content","Input PSČ","form_base_psc","PLZ","1","0","0"),
("4171","1","30","12","content","Input Mesto","form_base_city","Stadt","1","0","0"),
("4172","1","30","12","content","Input Email","form_base_email","E-mail","1","0","0"),
("4173","1","30","12","content","Input Doklad","form_extend_v1_doklad","Einkaufsbeleg Nr:","0","0","0"),
("4174","1","30","12","content","Input Otázka + odpovede","form_extend_v3_otazka","Wie lautet der Weitwanderweg im Blick des Wilden Kaisers in der Region St. Johann in Tirol?","1","0","0"),
("4175","1","30","12","content","Odpoveď A","form_extend_v3_odpoved_a","Koasa Trail","1","0","0"),
("4176","1","30","12","content","Odpoveď B","form_extend_v3_odpoved_b","Jägersteig","1","0","0"),
("4177","1","30","12","content","Odpoveď C","form_extend_v3_odpoved_c","Hirtenpfad","1","0","0"),
("4178","1","30","4","content","Názov","field_word_nazov","Názov","0","0","0"),
("4179","1","30","4","content","Adresa","field_word_adresa","Adresa","0","0","0"),
("4180","1","30","4","content","Kontakt","field_word_kontakt","Kontakt","0","0","0"),
("4181","1","30","4","content","Web","field_word_web","Web","0","0","0"),
("4182","1","30","4","content","Hláška povinné pole","field_word_err","Pflichtfelder","1","0","0"),
("4183","1","30","4","content","Registrovať","field_word_sent","Teilnehmen","1","0","0"),
("4184","1","30","4","content","Predchádzajúca (fotka)","field_word_previous","Vorheriges","1","0","0"),
("4185","1","30","4","content","Ďalšia (fotka)","field_word_next","Nächstes","1","0","0"),
("4186","1","30","4","content","Súhlasím s newslettrom","field_word_suhlas_news","Ja, ich stimme zu den Newsletter der Kitzbüheler Alpen St. Johann in Tirol zu erhalten und meine Daten für weitere Marketingaktivitäten zur Verfügung zu stellen.","1","0","0"),
("4187","1","30","4","content","Súhlasím s podmienkami súťaže","field_word_suhlas_podm","Ja, ich stimme den Teilnahmebedingungen zu. (Teilnahmebedingungen HIER).","1","0","0"),
("4188","1","30","1","content","Kľúčové slová pre Google","keywords","gewinnspiel Kitzbüheler Alpen St. Johann in Tirol","1","0","0"),
("4189","1","30","1","content","Popis pre Google","description","This competition has a first ID","1","0","0"),
("4190","1","30","4","content","Súhlasím s podmienkami súťaže","field_word_dakujeme","Danke, Sie haben sich erfolgreich für das Gewinnspiel registriert. Wir wünschen Ihnen viel Glück!","1","0","0"),
("4191","1","30","12","image","Podmienky súťaže (PDF)","form_file_podmienky","481","1","0","0"),
("4192","1","30","12","image","Newsletter (PDF)","form_file_newsletter","68","0","0","0"),
("4193","1","30","4","content","Hláška možnosti novej registrácie","field_word_nova_registracia","Jetzt Freunde einladen!","1","0","0"),
("4194","1","30","13","content","Počet znakov vygenerovaného hashu","_email_conf_char","8","1","0","0"),
("4195","1","30","13","content","Hláška, súťažiacemu ktorá mu príde na email po registracii.","_email_conf_sent_text","Danke, Sie haben sich erfolgreich für das Gewinnspiel registriert. Wir wünschen Ihnen viel Erfolg bei der Verlosung! ","1","0","0"),
("4196","1","30","12","content","Telefónne číslo","form_base_tel_c","Tel. Nr. oder Wohnadresse","0","0","0"),
("4197","1","30","4","content","Hláška za hviezdičkou o povinných poliach","field_word_povinne_polia","","1","0","0"),
("4198","1","30","2","image","Fotka loga k modulu UBYTOVANIE","_menu_7_image_2_1","482","0","0","0"),
("4199","1","30","16","content","Názov hotelu 2","info_hotel_name_2","Hotel & Cafe Mosser****","0","0","0"),
("4200","1","30","16","content","Adresa Hotela 2","info_hotel_addr_2","Bahnhofstraße 9  <br/>  A - 9500 Villach","0","0","0"),
("4201","1","30","16","content","Telefón do hotela 2","info_hotel_tel_c_2","+43 4242 24 115","0","0","0"),
("4202","1","30","16","content","Email hotelu 2","info_hotel_email_2","info@hotelmosser.at","0","0","0"),
("4203","1","30","16","content","Text k modulu UBYTOVANIE 2","_menu_7_text_2","<p><strong>Hotel Mosser****</strong></p>\n\n<p>Hotel Mosser, Ihr Hotel in der Villacher Altstadt!</p>\n\n<p>F&uuml;r sportliche Urlaube oder gem&uuml;tliche Kurztrips, egal ob alleine oder mit der ganzen Familie,&nbsp;vom Einzelzimmer bis zum Appartement, mit Villachs bestem Fr&uuml;hst&uuml;cksb&uuml;ffet im Wintergarten.</p>\n","0","0","0"),
("4204","1","30","17","content","Text k modulu UBYTOVANIE 3","_menu_7_text_3","<p><strong>Naturel Hotels &amp; Resorts, Faaker See -&nbsp;K&auml;rnten</strong></p>\n\n<p>Urlaub im Hoteldorf<br />\nAnkommen, wohlf&uuml;hlen, umsorgt sein.<br />\nIn den Naturel Hoteld&ouml;rfern SEELEITN &amp; SCH&Ouml;NLEITN am Faaker See finden Sie viel Platz f&uuml;r erinnerungsw&uuml;rdige Erlebnisse.</p>\n\n<p><strong>Naturel Hotels &amp; Resorts</strong><br />\n<strong>Dorf SCH&Ouml;NLEITN ****</strong><br />\nDorfstra&szlig;e 26,&nbsp;9582 Oberaichwald</p>\n\n<p><strong>Naturel Hotels &amp; Resorts</strong><br />\n<strong><strong>Dorf SEELEITN ***</strong></strong><br />\nSeeufer-Landesstra&szlig;e 59,&nbsp;9583 Egg am See</p>\n\n<p>&nbsp;</p>\n","0","0","0"),
("4205","1","30","17","content","Email hotelu 3","info_hotel_email_3","info@naturelhotels.com","0","0","0"),
("4206","1","30","17","content","Telefón do hotela 3","info_hotel_tel_c_3","+43 4254 2384","0","0","0"),
("4207","1","30","17","content","Adresa Hotela 3","info_hotel_addr_3","Dorfstrasse 26   <br/>   A - 9582 Latschach/Oberaichwald","0","0","0"),
("4208","1","30","17","content","Názov hotelu 3","info_hotel_name_3","Naturel Hotels & Resorts GmbH","0","0","0"),
("4209","1","30","16","image","Fotka loga k modulu UBYTOVANIE 2","_menu_7_image_1_2","165","0","0","0"),
("4210","1","30","16","image","Fotka k modulu UBYTOVANIE 2","_menu_7_image_2_2","65","0","0","0"),
("4211","1","30","17","image","Fotka loga k modulu UBYTOVANIE 3","_menu_7_image_1_3","196","0","0","0"),
("4212","1","30","17","image","Fotka k modulu UBYTOVANIE 3","_menu_7_image_2_3","195","0","0","0"),
("4213","1","30","2","content","Url adresa hotela 1","link_hotel_1","https://www.explorer-hotels.com","1","0","0"),
("4214","1","30","16","content","Url adresa hotela 2","link_hotel_2","www.hotelmosser.info","0","0","0"),
("4215","1","30","17","content","Url adresa hotela 3","link_hotel_3","http://www.naturelhotels.com","0","0","0"),
("4216","1","30","9","image","Druhá fotka modulu pre modul GALÉRIA","_menu_5_gallery_1","52","1","0","0"),
("4217","1","30","5","image","Fotka v hlavnom slideri 2","_menu_1_image_2","478","1","0","0"),
("4218","1","30","4","content","Po ukončení registrácie","field_word_koniec_registracie","<p><span style=\"color:#FF0000\"><span style=\"font-size:22px\"><span style=\"font-family:arial,helvetica,sans-serif\"><strong>Das GEWINNSPIEL wurde bereits BEENDET!​</strong></span></span></span></p>\n\n<p><span style=\"color:rgb(255, 0, 0)\"><span style=\"font-size:22px\">Wir danken Ihnen<span style=\"font-family:arial,sans-serif\">&nbsp;f&uuml;r die zahlreiche Beteiligung!</span></span></span></p>\n\n<p><span style=\"color:#FF0000\"><span style=\"font-size:20px\"><span style=\"font-family:arial,helvetica,sans-serif\">Die Gewinner werden in K&uuml;rze per E-Mail benachrichtigt.</span></span></span></p>\n\n<p><strong><span style=\"color:#FF0000\"><span style=\"font-size:22px\"><span style=\"font-family:arial,helvetica,sans-serif\">Wir&nbsp;gratulieren den&nbsp;Gewinnern und&nbsp;w&uuml;nschen ihnen&nbsp;einen sch&ouml;nen Aufenthalt!&nbsp;</span></span></span></strong></p>\n\n<p>&nbsp;</p>\n","0","0","0"),
("4219","1","30","11","content","Názov modulu pre modul O PARTNEROVI","_menu_name_8","Bergsport Schwanda","1","5","0"),
("4220","1","30","15","content","Email partnera","info_partner_email","office@schwanda.at","1","0","0"),
("4221","1","30","15","content","Adresa partnera","info_partner_addr","Bäckerstrasse 7 <br/> A-1010 Wien","1","0","0"),
("4222","1","30","15","content","Názov partnera","info_partner_name","Bergsport Schwanda","1","0","0"),
("4223","1","30","15","content","Telefónne číslo na partnera","info_partner_tel_c","+43 1 5125320","1","0","0"),
("4224","1","30","11","content","Text k modulu O PARTNEROVI 1","_menu_8_text_1","<p><strong>Bergsport Schwanda ist ein f&uuml;hrendes Fachgesch&auml;ft f&uuml;r den Berg- und Wandersport.</strong></p>\n\n<p>Outdoorbegeisterten Kunden steht seit dem Jahr 1949 eine riesige Auswahl von Bergschuhen, Rucks&auml;cken, Schlafs&auml;cken, funktioneller Bekleidung, Bergzelten, Kletter- und Skitourenausr&uuml;stung sowie 1.000 weitere n&uuml;tzliche Kleinigkeiten wie Kocher, Kompasse, Taschenlampen oder Wasserfilter zur Verf&uuml;gung. Alle Mitarbeiter k&ouml;nnen selber auf eine langj&auml;hrige Outdoor-Erfahrung zur&uuml;ckgreifen.<br />\n&Uuml;berzeugen Sie sich bei einem Besuch in unserem Gesch&auml;ft in der Wiener Innenstadt oder im Internet unter <a href=\"http://www.schwanda.at\" target=\"_blank\">www.schwanda.at</a>&nbsp;</p>\n\n<p><strong><a href=\"https://schwanda.at/content/9-bergsport-schwanda-katalog-zusenden\" target=\"_blank\">Der neue Bergsport Schwanda Katalog HIER!</a></strong></p>\n","1","0","0"),
("4225","1","30","1","content","Jazyková mutácia pre Facebook","_language","de_DE","1","0","0"),
("4226","1","30","12","image","Newsletter 2 (PDF)","form_file_newsletter_2","68","1","0","0"),
("4227","1","30","4","content","Súhlasím s newslettrom 2","field_word_suhlas_news_2","Ja, ich stimme zu den Newsletter der Bergsport Schwanda zu erhalten und meine Daten für weitere Marketingaktivitäten zur Verfügung zu stellen.","1","0","0"),
("4228","1","30","18","content","Email hotelu 4","info_hotel_email_4","info@pacheiner.at","0","0","0"),
("4229","1","30","18","content","Telefón do hotela 4","info_hotel_tel_c_4","+43 4248 2888","0","0","0"),
("4230","1","30","18","content","Adresa Hotela 4","info_hotel_addr_4","Pölling 20  <br/>   A - 9520 Gerlitzen","0","0","0"),
("4231","1","30","18","content","Názov hotelu 4","info_hotel_name_4","Alpinhotel Hotel Pacheiner****","0","0","0"),
("4232","1","30","18","image","Fotka loga k modulu UBYTOVANIE 4","_menu_7_image_1_4","191","0","0","0"),
("4233","1","30","18","image","Fotka k modulu UBYTOVANIE 4","_menu_7_image_2_4","184","0","0","0"),
("4234","1","30","18","content","Url adresa hotela 4","link_hotel_4","http://www.pacheiner.at","0","0","0"),
("4235","1","30","18","content","Text k modulu UBYTOVANIE 4","_menu_7_text_4","<p><strong>Hotel Pacheiner****</strong></p>\n\n<p>POOL-POSITION IM ALPINHOTEL PACHEINER</p>\n\n<p>Auf 1.900 m auf dem Gipfel der Gerlitzen thront das 2012 neu errichtete Alpinhotel Pacheiner. Ein Platz, an dem anspruchsvolle Individualisten einen unvergesslichen R&uuml;ckzugsort finden.</p>\n","0","0","0"),
("4236","1","30","11","image","Fotka k modulu O PARTNEROVI","_menu_8_image_1","553","1","0","0"),
("4237","1","30","1","content","Google Plus","social_google_plus","https://plus.google.com/111302311413391009554","1","0","0"),
("4238","1","30","12","content","Input Otázka","form_extend_v2_otazka","Napíšte farbu vášho PC","0","0","0"),
("4239","1","30","13","content","Odoslať potvrdzovací email","sent_confirm_mail","1","1","0","0"),
("4240","1","30","12","content","Voliteľný parameter 1","form_base_custom_1","Toto pole je voliteľné","0","0","0"),
("4241","1","31","1","content","Template","layout","dnt_first","1","0","0"),
("4242","1","31","15","content","Link partnera","link_partner","https://www.highbike-paznaun.com","1","0","0"),
("4243","1","31","3","content","Link regionu","link_region","http://www.paznaun-ischgl.com","1","0","0"),
("4244","1","31","1","content","Zobraziť na URL adrese","real_address","http://www.vyhrat.com/","1","0","0"),
("4245","1","31","1","content","Facebook","social_fb","https://www.facebook.com/Highbike.Paznaun/","1","0","0"),
("4246","1","31","1","content","Twitter","social_twitter","https://twitter.com/ischgl_insider","1","0","0"),
("4247","1","31","1","content","Instagram","social_linked_in","https://www.instagram.com/ischgl_com/","1","0","0"),
("4248","1","31","1","content","Mapa ","map_location","https://www.google.at/maps/place/Tourism+Association+Paznaun+-+Ischgl/@47.0132003,10.2889674,17z/data=!3m1!4b1!4m5!3m4!1s0x479cb362f0d2afb1:0xe54b48be0be7581b!8m2!3d47.0131967!4d10.2911561","1","0","0"),
("4249","1","31","1","image","Favicon","favicon","57","1","0","0"),
("4250","1","31","1","content","Model farby R","_r","200","1","0","0"),
("4251","1","31","1","content","Model farby G","_g","30","1","0","0"),
("4252","1","31","1","content","Model farby B","_b","65","1","0","0"),
("4253","1","31","1","content","Font","_font","Tahoma","1","0","0"),
("4254","1","31","2","content","Názov hotelu 1","info_hotel_name_1","","0","0","0"),
("4255","1","31","2","content","Adresa Hotela 1","info_hotel_addr_1","Platz 1   <br/>   A-","1","0","0"),
("4256","1","31","2","content","Telefón do hotela 1","info_hotel_tel_c_1","+43 (0)","1","0","0"),
("4257","1","31","2","content","Email hotelu 1","info_hotel_email_1","office@","1","0","0");
INSERT INTO dnt_microsites_composer VALUES
("4258","1","31","3","content","Názov regiónu","info_region_name","Tourismusverband Paznaun – Ischgl","1","0","0"),
("4259","1","31","3","content","Adresa regiónu","info_region_addr","Dorfstr. 43  <br/>  A-6561 Ischgl","1","0","0"),
("4260","1","31","3","content","Telefónne číslo regiónu","info_region_tel_c","+43 6542 770","1","0","0"),
("4261","1","31","3","content","Email regiónu","info_region_email","info@paznaun-ischgl.com","1","0","0"),
("4262","1","31","1","content","Youtube video","youtube_video","HFdYQQWAeLg","1","0","0"),
("4263","1","31","15","image","Logo partnera","partner_logo","579","1","0","0"),
("4264","1","31","3","image","Logo regiónu","region_logo","486","1","0","0"),
("4265","1","31","5","image","Fotka v hlavnom slideri 1","_menu_1_image_1","487","1","0","0"),
("4266","1","31","7","image","Fotka modulu pre modul GALÉRIA","_menu_3_image_1","489","1","0","0"),
("4267","1","31","7","image","Druhá fotka modulu pre modul GALÉRIA","_menu_3_image_2","490","1","0","0"),
("4268","1","31","2","image","Fotka k modulu UBYTOVANIE","_menu_7_image_1_1","84","1","0","0"),
("4269","1","31","5","content","Názov modulu pre modul INFO","_menu_name_1","Intro","1","0","0"),
("4270","1","31","6","content","Názov modulu pre modul O SÚŤAŽI","_menu_name_2","Gewinnspiel","0","0","0"),
("4271","1","31","7","content","Názov modulu pre modul GALÉRIU","_menu_name_3","Galérie","0","0","0"),
("4272","1","31","8","content","Názov modulu pre modul FORMULÁRU","_menu_name_4","Teilnahme","1","0","0"),
("4273","1","31","9","content","Názov modulu pre modul O REGIONE","_menu_name_5","Paznaun – Ischgl","1","0","0"),
("4274","1","31","10","content","Názov modulu pre modul MAPA","_menu_name_6","Mapa","0","0","0"),
("4275","1","31","11","content","Názov modulu pre modul UBYTOVANIE","_menu_name_7","Hotel","0","0","0"),
("4276","1","31","5","content","Text k modulu INFO","_menu_1_text_1","<p><span style=\"font-size:20px\"><strong><span style=\"color:#FFFFFF\">Gewinne mit POLO einen Urlaub f&uuml;r 2 Personen zum Biker Summit in Ischgl.</span></strong></span></p>\n","1","0","0"),
("4277","1","31","6","content","Text k modulu O SÚŤAŽI","_menu_2_text_1","<h3><span style=\"font-size:18px\">Wir verlosen 2 Urlaube f&uuml;r je 2 Personen &agrave; 4 N&auml;chte in einem 4* Hotel inkl. Halbpension, w&auml;hrend dem Ischgl Biker Summit, mit je einem Besuch im Motorrad Testcenter zwischen 21.-23. Juli 2017!&nbsp;</span></h3>\n\n<h3><span style=\"font-size:18px\">Einfach Teilnahmeformular ausf&uuml;llen, Frage richtig beantworten, und ihr habt die Chance auf den tollen Urlaub.</span></h3>\n\n<h3><span style=\"font-size:16px\">Gewinnspiel l&auml;uft ab 15. April&nbsp;2017&nbsp;bis 07. Juli 2017. Teilnahmeschluss ist der 07. Juli 2017.</span></h3>\n","1","0","0"),
("4278","1","31","7","content","Text k modulu GALÉRIA","_menu_3_text_1","","1","0","0"),
("4279","1","31","8","content","Text k modulu FORMULÁR","_menu_4_text_1","<p>Ihre Registrierung:</p>\n","1","0","0"),
("4280","1","31","9","content","Text k modulu O REGIÓNE","_menu_5_text_1","<p><strong>3. Motorrad-Gipfeltreffen in Ischgl<br />\nIschgl l&auml;dt von 21. bis 23. Juli 2017 wieder zum h&ouml;chsten Biker-Treffen der Alpen, auf 2.320m. Ob gef&uuml;hrte Touren, Testfahrten, Sicherheitstrainings oder rockige Live-Sounds &ndash; der f&uuml;r alle Marken offene &bdquo;Top of the Mountain BIKER SUMMIT&ldquo; gilt als einer der H&ouml;hepunkte der Motorradsaison.</strong></p>\n\n<p>Zum dritten Mal geht vom 21. bis 23. Juli 2017 im Tiroler Bergdorf Ischgl der &bdquo;Top of the Mountain BIKER SUMMIT&ldquo; &uuml;ber die B&uuml;hne; nach dem Erfolg der Vorjahre werden etwa 1000 motorradfahrende G&auml;ste erwartet, f&uuml;r die ein buntes Programm vorbereitet wird. H&ouml;hepunkt wird erneut die Motorradparade hinauf zur Idalp (2.320 m) mit BBQ in luftiger H&ouml;he sein. Au&szlig;erdem gibt es ein dreit&auml;giges Programm im &bdquo;Biker Village&ldquo;, unter anderem mit Stunt-Shows und Kurz-Testfahrten mit den Modellen aus 2017 des High-Bike Testcenters Paznaun-Ischgl &ndash; und nicht zu vergessen mit viel Livemusik!&nbsp;</p>\n\n<p><strong>Programm bis auf 2.320 Meter H&ouml;he</strong><br />\nStart zur dreit&auml;gigen Action ist am Freitag, 21. Juli 2017. Ab 8 Uhr &ouml;ffnet das High-Bike Testcenter seine Tore, wo einst&uuml;ndige Testrides mit den neuesten Motorradmodellen aus 2017 angeboten werden. Auch die St&auml;nde auf der Expo Area &ouml;ffnen bereits fr&uuml;h am Morgen. Ge&ouml;ffnet ist dort am Freitag und Samstag bis 18 Uhr, am Sonntag von 9 bis 13 Uhr. Von Freitag bis Sonntagmittag pr&auml;sentieren die Prorider Julien Welsch und Dieter Rudolf im Zweistunden-Rhythmus ihre Stuntshows, dazu gibt es eine FAST&rsquo;n&rsquo;SLOW-Challenge (Geschicklichkeits- und Geschwindigkeitswettbewerb) sowie ein Schr&auml;glagetraining mit Klaus Schwabe. Viel Spa&szlig; verspricht auch das Fahren mit KTM Freeride E-Bikes auf einem speziell angelegten Parcours. Die Welcome-Party mit der Band &bdquo;Milestone&ldquo; beginnt am Freitag um 21 Uhr im Biker Village, direkt vor der High-Bike-Halle gelegen.</p>\n","1","0","0"),
("4281","1","31","9","content","Ďalší text k modulu O REGIÓNE","_menu_5_text_2","<p>Der Samstag erm&ouml;glicht aufgrund der zentralen Lage von Ischgl direkt am Alpenhauptkamm sch&ouml;ne einst&uuml;ndige Testfahrten mit den neuesten Motorr&auml;dern des Jahres 2017 von BMW, KTM und Triumph. Um 11.30 Uhr beginnt die Aufstellung zur Parade im Biker Village, um 12 Uhr startet die einmalige Bergfahrt auf normalerweise gesperrter Asphaltstra&szlig;e hinauf zur Idalp (2.320 m), wo das Top of the Mountain Biker Summit BBQ mit Live-Band lockt. Seine Fortsetzung findet der entspannte Nachmittag am Abend bei der Biker Summit Night mit rockiger Live Band im Biker Village.<br />\nIm Mittelpunkt des Sonntags steht die Bikesegnung, Beginn um 10.45 Uhr. Anschlie&szlig;end steht das beliebte Wei&szlig;wurst-Fr&uuml;hst&uuml;ck im Biker Village auf dem Programm. Die High-Bike-Testfahrten laufen den gesamten Sonntag weiter. Informationen auf <a href=\"http://www.ischgl.com/\" target=\"_blank\">www.ischgl.com</a>.</p>\n\n<p><strong>Mautbefreit &uuml;ber die Silvretta Hochalpenstra&szlig;e</strong><br />\nVorfreude ist die sch&ouml;nste Freude. Deshalb bekommen Paznaun-G&auml;ste, die mit dem Motorrad anreisen, von ihrem Vermieter auf Wunsch bereits vor dem Urlaub einen Silvretta Card Gutschein zugeschickt. So kann die Anreise mit einer eindrucksvollen Panoramafahrt &uuml;ber die Silvretta Hochalpenstra&szlig;e beginnen. Die anfallende Maut &bdquo;&uuml;bernimmt&ldquo; die Silvretta Card all inclusive &ndash; das Beste daran: der Spa&szlig; ist UNLIMITIERT!</p>\n\n<p><strong>Unschlagbare Hotelangebote</strong><br />\nAlle Besucher haben die M&ouml;glichkeit in diversen Partnerhotels die BIKER SUMMIT PAUSCHALE zu buchen. &nbsp;Bereits ab &euro; 89,- stehen Unterk&uuml;nfte f&uuml;r die Veranstaltung zur Verf&uuml;gung. Die Pauschale beinhaltet allerdings nicht nur die &Uuml;bernachtung inkl. Fr&uuml;hst&uuml;ck, sondern auch einen kostenlosen Testride im High-Bike Testcenter, ein exklusives Biker Summit Teilnehmer T-Shirt und eine Fahrt bei der FAST&rsquo;n&rsquo;SLOW Challenge.&nbsp;</p>\n","1","0","0"),
("4282","1","31","10","content","Text k modulu MAPA","_menu_6_text_1","<p>Mapa regionu</p>\n","1","0","0"),
("4283","1","31","2","content","Text k modulu UBYTOVANIE 1","_menu_7_text_1","","1","0","0"),
("4284","1","31","12","content","Input Meno","form_base_name","Vorname","1","0","0"),
("4285","1","31","12","content","Input Priezvisko","form_base_surname","Nachname","1","0","0"),
("4286","1","31","12","content","Input PSČ","form_base_psc","PLZ","1","0","0"),
("4287","1","31","12","content","Input Mesto","form_base_city","Stadt","1","0","0"),
("4288","1","31","12","content","Input Email","form_base_email","E-mail","1","0","0"),
("4289","1","31","12","content","Input Doklad","form_extend_v1_doklad","","0","0","0"),
("4290","1","31","12","content","Input Otázka + odpovede","form_extend_v3_otazka","Das Paznaun ist ein hervorragender Ausgangspunkt für Motorradtouren. Wieviel Alpenpässe umfasst Das „High-Bike-Testrevier“ ?","1","0","0"),
("4291","1","31","12","content","Odpoveď A","form_extend_v3_odpoved_a","15","1","0","0"),
("4292","1","31","12","content","Odpoveď B","form_extend_v3_odpoved_b","22","1","0","0"),
("4293","1","31","12","content","Odpoveď C","form_extend_v3_odpoved_c","30","1","0","0"),
("4294","1","31","4","content","Názov","field_word_nazov","Názov","0","0","0"),
("4295","1","31","4","content","Adresa","field_word_adresa","Adresa","0","0","0"),
("4296","1","31","4","content","Kontakt","field_word_kontakt","Kontakt","0","0","0"),
("4297","1","31","4","content","Web","field_word_web","Web","0","0","0"),
("4298","1","31","4","content","Hláška povinné pole","field_word_err","Pflichtfelder","1","0","0"),
("4299","1","31","4","content","Registrovať","field_word_sent","Teilnehmen","1","0","0"),
("4300","1","31","4","content","Predchádzajúca (fotka)","field_word_previous","Vorheriges","1","0","0"),
("4301","1","31","4","content","Ďalšia (fotka)","field_word_next","Nächstes","1","0","0"),
("4302","1","31","4","content","Súhlasím s newslettrom","field_word_suhlas_news","Ja, ich stimme zu den Newsletter von Tourismusverband Paznaun – Ischgl  und High-Bike Testcenter Paznaun zu erhalten und meine Daten für weitere Marketingaktivitäten zur Verfügung zu stellen.","1","0","0"),
("4303","1","31","4","content","Súhlasím s podmienkami súťaže","field_word_suhlas_podm","Ja, ich stimme den Teilnahmebedingungen zu. (Teilnahmebedingungen HIER).","1","0","0"),
("4304","1","31","1","content","Kľúčové slová pre Google","keywords","Gewinnspiel Paznaun – Ischgl High-Bike Testcenter Paznaun ","1","0","0"),
("4305","1","31","1","content","Popis pre Google","description","This competition has a first ID","1","0","0"),
("4306","1","31","4","content","Súhlasím s podmienkami súťaže","field_word_dakujeme","Danke, Sie haben sich erfolgreich für das Gewinnspiel registriert.","1","0","0"),
("4307","1","31","12","image","Podmienky súťaže (PDF)","form_file_podmienky","554","1","0","0"),
("4308","1","31","12","image","Newsletter (PDF)","form_file_newsletter","68","0","0","0"),
("4309","1","31","4","content","Hláška možnosti novej registrácie","field_word_nova_registracia","Jetzt Freunde einladen!","1","0","0"),
("4310","1","31","13","content","Počet znakov vygenerovaného hashu","_email_conf_char","8","1","0","0"),
("4311","1","31","13","content","Hláška, súťažiacemu ktorá mu príde na email po registracii.","_email_conf_sent_text","Danke, Sie haben sich erfolgreich für das Gewinnspiel registriert. Wir wünschen Ihnen viel Erfolg bei der Verlosung!","1","0","0"),
("4312","1","31","12","content","Telefónne číslo","form_base_tel_c","Tel. Nr.","1","0","0"),
("4313","1","31","4","content","Hláška za hviezdičkou o povinných poliach","field_word_povinne_polia","","1","0","0"),
("4314","1","31","2","image","Fotka loga k modulu UBYTOVANIE","_menu_7_image_2_1","59","0","0","0"),
("4315","1","31","16","content","Názov hotelu 2","info_hotel_name_2","Sporthotel Falkenstein","0","0","0"),
("4316","1","31","16","content","Adresa Hotela 2","info_hotel_addr_2","Nikolaus-Gassner-Str. 79   <br/>   A - 5710 Kaprun","0","0","0"),
("4317","1","31","16","content","Telefón do hotela 2","info_hotel_tel_c_2","+43 6547 7122","0","0","0"),
("4318","1","31","16","content","Email hotelu 2","info_hotel_email_2","sporthotel@falkenstein.at","0","0","0"),
("4319","1","31","16","content","Text k modulu UBYTOVANIE 2","_menu_7_text_2","<p><strong>Das Falkenstein</strong></p>\n\n<p>Tady v Kaprunu a hotelu Falkenstein lze objevit spoustu vzru&scaron;uj&iacute;c&iacute;ch možnost&iacute; a z&aacute;bavy&nbsp;pro rodiny a děti. Každ&yacute; den může b&yacute;t spojen s nov&yacute;mi z&aacute;žitky a dojmy, ať už jde&nbsp;o zvl&aacute;&scaron;tn&iacute; rodinn&eacute; turistick&eacute; v&yacute;lety, čvacht&aacute;n&iacute; a klouz&aacute;n&iacute; v Tauern SPA Kaprun, v&yacute;let&nbsp;k alpsk&eacute; horsk&eacute; bobov&eacute; dr&aacute;ze &quot;Maisfiltzer&quot;, o n&aacute;v&scaron;těvu volnočasov&eacute;ho nebo n&aacute;rodn&iacute;ho&nbsp;parku nebo o mnoh&aacute; dal&scaron;&iacute; dobrodružstv&iacute; - z&aacute;bavě se nekladou ž&aacute;dn&eacute; hranice.</p>\n\n<p>V hotelu Falkenstein&nbsp;se nach&aacute;z&iacute; kromě&nbsp;prostorn&eacute;ho&nbsp;dětsk&eacute;ho hři&scaron;tě&nbsp;a dětsk&eacute; herny tak&eacute;&nbsp;velk&yacute; baz&eacute;n a najdete&nbsp;zde i&nbsp;chutnou&nbsp;Pinzgauerskou&nbsp;kuchyni s pestr&yacute;mi&nbsp;dětsk&yacute;mi menu&nbsp;- n&aacute;&scaron; maskot Falki&nbsp;se na v&aacute;s tě&scaron;&iacute;!</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n","0","0","0"),
("4320","1","31","17","content","Text k modulu UBYTOVANIE 3","_menu_7_text_3","<p><strong>Dovolen&aacute; v Zell am See je dovolenou s požitkem - v hotelu Tirolerhof!</strong></p>\n\n<p>Jezero, hory, ledovec a stylov&yacute;, rodinn&yacute; 4-hvězdičkov&yacute; hotel superior v Zell am See &ndash; to je ide&aacute;ln&iacute; kombinace pro va&scaron;i dovolenou v Zell am See, v l&eacute;tě i v zimě. Budete m&iacute;t v&yacute;hled na jezero Zeller See, hory Schmittenh&ouml;he a Kitzsteinhorn se v&scaron;emi rozmanit&yacute;mi sportovn&iacute;mi a rekreačn&iacute;mi možnostmi a budete h&yacute;čk&aacute;ni v b&aacute;ječn&eacute;m a mimoř&aacute;dn&eacute;m hotelu kulin&aacute;řsk&yacute;mi specialitami nejvy&scaron;&scaron;&iacute; kvality. Nebo str&aacute;v&iacute;te dovolenou spojenou s golfem v Salcburku, kde budete m&iacute;t v&yacute;hled na n&aacute;dhern&eacute; hory a jezero oblasti Zell am See-Kaprun. Nebo si užijete ve dvou n&aacute;dhern&eacute; apartm&aacute;ny v r&aacute;mci romantick&eacute; dovolen&eacute;. Nebo si poř&aacute;dně odpočinete s wellness a l&aacute;zeňskou nab&iacute;dkou vy&scaron;&scaron;&iacute; tř&iacute;dy a načerp&aacute;te novou energii. Takto může vypadat va&scaron;e dal&scaron;&iacute; rekreačn&iacute; dovolen&aacute; v hotelu Tirolerhof Zell am See - v srdci Salcburku. Wellness hotel, čtyřhvězdičkov&yacute; hotel superior, hotel pro hosty s pejsky, relaxačn&iacute; hotel - v&scaron;echny tyto př&iacute;vlastky si hotel Tirolerhof plně zaslouž&iacute;.</p>\n\n<p>&nbsp;</p>\n\n<p><strong>Prožijte nezapomenutelnou dovolenou v hotelu Tirolerhof!</strong></p>\n","0","0","0"),
("4321","1","31","17","content","Email hotelu 3","info_hotel_email_3","welcome@tirolerhof.co.at","0","0","0"),
("4322","1","31","17","content","Telefón do hotela 3","info_hotel_tel_c_3","+43(0)6542/772-0","0","0","0"),
("4323","1","31","17","content","Adresa Hotela 3","info_hotel_addr_3","Auerspergstrasse 5   <br/>   A - 5700 Zell am See","0","0","0"),
("4324","1","31","17","content","Názov hotelu 3","info_hotel_name_3","Hotel Tirolerhof ****S","0","0","0"),
("4325","1","31","16","image","Fotka loga k modulu UBYTOVANIE 2","_menu_7_image_1_2","66","0","0","0"),
("4326","1","31","16","image","Fotka k modulu UBYTOVANIE 2","_menu_7_image_2_2","65","0","0","0"),
("4327","1","31","17","image","Fotka loga k modulu UBYTOVANIE 3","_menu_7_image_1_3","51","0","0","0"),
("4328","1","31","17","image","Fotka k modulu UBYTOVANIE 3","_menu_7_image_2_3","56","0","0","0"),
("4329","1","31","2","content","Url adresa hotela 1","link_hotel_1","http://","1","0","0"),
("4330","1","31","16","content","Url adresa hotela 2","link_hotel_2","http://www.falkenstein.at","0","0","0"),
("4331","1","31","17","content","Url adresa hotela 3","link_hotel_3","http://www.tirolerhof.co.at/","0","0","0"),
("4332","1","31","9","image","Druhá fotka modulu pre modul GALÉRIA","_menu_5_gallery_1","53","1","0","0"),
("4333","1","31","5","image","Fotka v hlavnom slideri 2","_menu_1_image_2","488","1","0","0"),
("4334","1","31","4","content","Po ukončení registrácie","field_word_koniec_registracie","<p>&nbsp;</p>\n\n<p style=\"text-align:center\">Gewinnspiel wurde beendet! Gewinner:&nbsp;</p>\n","0","0","0"),
("4335","1","31","11","content","Názov modulu pre modul O PARTNEROVI","_menu_name_8","High-Bike Testcenter","1","0","0"),
("4336","1","31","15","content","Email partnera","info_partner_email","info@highbike-paznaun.com","1","0","0"),
("4337","1","31","15","content","Adresa partnera","info_partner_addr","am Silvretta Parkplatz <br/> A - 6561 Ischgl","1","0","0"),
("4338","1","31","15","content","Názov partnera","info_partner_name","High-Bike Testcenter Paznaun","1","0","0"),
("4339","1","31","15","content","Telefónne číslo na partnera","info_partner_tel_c","+43 (0) 650 - 381 56 45","1","0","0"),
("4340","1","31","11","content","Text k modulu O PARTNEROVI 1","_menu_8_text_1","<p><strong>&Uuml;ber 4.666 PS unter einem Dach &ndash; Das High-Bike Testcenter Paznaun</strong></p>\n\n<p>Europaweit einzigartig und nur im Paznaun m&ouml;glich: Beim Top of the Mountain Biker Summit, dem h&ouml;chstgelegenen Motorradtreffen der Alpen, kann das eigene Bike in der Garage bleiben. Denn im High-Bike Testcenter Paznaun kann jeder, der einen g&uuml;ltigen F&uuml;hrerschein der Klasse A besitzt, die neuesten 2017er Modelle der f&uuml;hrenden Hersteller Aprilia, BMW, KTM und Triumph exklusiv und stundenweise von 8:00 bis 18:00 Uhr ausleihen und testen. Der Preis f&uuml;r einen Stundentest liegt bei 10 Euro. Motorradkleidung nicht im Gep&auml;ck? &ndash; Gegen eine geringe Geb&uuml;hr verleiht das High-Bike Testcenter Paznaun auch die Komplettausstattung. Das alpenweit einzige marken&uuml;bergreifende Motorrad-Testcenter ist bis Anfang Oktober 2017 ge&ouml;ffnet.</p>\n","1","0","0"),
("4341","1","31","1","content","Jazyková mutácia pre Facebook","_language","de_DE","1","0","0"),
("4342","1","31","12","image","Newsletter 2 (PDF)","form_file_newsletter_2","68","0","0","0"),
("4343","1","31","4","content","Súhlasím s newslettrom 2","field_word_suhlas_news_2","News 2","1","0","0"),
("4344","1","31","18","content","Email hotelu 4","info_hotel_email_4","welcome@tirolerhof.co.at","0","0","0"),
("4345","1","31","18","content","Telefón do hotela 4","info_hotel_tel_c_4","+43(0)6542/772-0","0","0","0"),
("4346","1","31","18","content","Adresa Hotela 4","info_hotel_addr_4","Auerspergstrasse 5   <br/>   A - 5700 Zell am See","1","0","0"),
("4347","1","31","18","content","Názov hotelu 4","info_hotel_name_4","Hotel Tirolerhof ****S","0","0","0"),
("4348","1","31","18","image","Fotka loga k modulu UBYTOVANIE 4","_menu_7_image_1_4","","0","0","0"),
("4349","1","31","18","image","Fotka k modulu UBYTOVANIE 4","_menu_7_image_2_4","","1","0","0"),
("4350","1","31","18","content","Url adresa hotela 4","link_hotel_4","http://www.tirolerhof.co.at/","0","0","0"),
("4351","1","31","18","content","Text k modulu UBYTOVANIE 4","_menu_7_text_4","","0","0","0"),
("4352","1","31","11","image","Fotka k modulu O PARTNEROVI","_menu_8_image_1","492","1","0","0"),
("4353","1","31","1","content","Google Plus","social_google_plus","https://plus.google.com/+Ischgl","1","0","0"),
("4354","1","31","12","content","Input Otázka","form_extend_v2_otazka","Napíšte farbu vášho PC","0","0","0"),
("4355","1","31","13","content","Odoslať potvrdzovací email","sent_confirm_mail","1","1","0","0"),
("4356","1","31","12","content","Voliteľný parameter 1","form_base_custom_1","Toto pole je voliteľné","0","0","0"),
("4357","1","32","1","content","Template","layout","dnt_first","1","0","0");
INSERT INTO dnt_microsites_composer VALUES
("4358","1","32","15","content","Link partnera","link_partner","http://www.johnharris.at","1","0","0"),
("4359","1","32","3","content","Link regionu","link_region","http://www.zellamsee-kaprun.com","1","0","0"),
("4360","1","32","1","content","Zobraziť na URL adrese","real_address","http://www.vyhrat.com/","1","0","0"),
("4361","1","32","1","content","Facebook","social_fb","https://www.facebook.com/JohnHarrisFitness","1","0","0"),
("4362","1","32","1","content","Twitter","social_twitter","https://twitter.com/zellkaprun","1","0","0"),
("4363","1","32","1","content","Instagram","social_linked_in","https://www.instagram.com/zellamseekaprun/","1","0","0"),
("4364","1","32","1","content","Mapa ","map_location","https://www.google.sk/maps/place/Zell+am+See-Kaprun+Tourismus+GmbH/@47.3221006,12.7943083,17z/data=!3m1!4b1!4m2!3m1!1s0x47771cdf4f490061:0xba82c342ef002324","1","0","0"),
("4365","1","32","1","image","Favicon","favicon","57","1","0","0"),
("4366","1","32","1","content","Model farby R","_r","124","0","0","0"),
("4367","1","32","1","content","Model farby G","_g","58","1","0","0"),
("4368","1","32","1","content","Model farby B","_b","62","1","0","0"),
("4369","1","32","1","content","Font","_font","Arial","1","0","0"),
("4370","1","32","2","content","Názov hotelu 1","info_hotel_name_1","Das Alpenhaus Kaprun","1","0","0"),
("4371","1","32","2","content","Adresa Hotela 1","info_hotel_addr_1","Schlossstraße 2  <br/>   A - 5710 Kaprun","1","0","0"),
("4372","1","32","2","content","Telefón do hotela 1","info_hotel_tel_c_1","+43 6547 7647","1","0","0"),
("4373","1","32","2","content","Email hotelu 1","info_hotel_email_1","willkommen@alpenhaus-kaprun.at","1","0","0"),
("4374","1","32","3","content","Názov regiónu","info_region_name","Zell am See-Kaprun Tourismus","1","0","0"),
("4375","1","32","3","content","Adresa regiónu","info_region_addr","Brucker Bundesstr. 1a  <br/>  A-5700 Zell am See","1","0","0"),
("4376","1","32","3","content","Telefónne číslo regiónu","info_region_tel_c","+43 6542 770","1","0","0"),
("4377","1","32","3","content","Email regiónu","info_region_email","welcome@zellamsee-kaprun.com","1","0","0"),
("4378","1","32","1","content","Youtube video","youtube_video","2QfvlHZVLN4","1","0","0"),
("4379","1","32","15","image","Logo partnera","partner_logo","81","1","0","0"),
("4380","1","32","3","image","Logo regiónu","region_logo","500","1","0","0"),
("4381","1","32","5","image","Fotka v hlavnom slideri 1","_menu_1_image_1","495","1","0","0"),
("4382","1","32","7","image","Fotka modulu pre modul GALÉRIA","_menu_3_image_1","497","1","0","0"),
("4383","1","32","7","image","Druhá fotka modulu pre modul GALÉRIA","_menu_3_image_2","498","1","0","0"),
("4384","1","32","2","image","Fotka k modulu UBYTOVANIE","_menu_7_image_1_1","499","1","0","0"),
("4385","1","32","5","content","Názov modulu pre modul INFO","_menu_name_1","Intro","1","0","0"),
("4386","1","32","6","content","Názov modulu pre modul O SÚŤAŽI","_menu_name_2","Gewinnspiel","0","0","0"),
("4387","1","32","7","content","Názov modulu pre modul GALÉRIU","_menu_name_3","Galérie","0","0","0"),
("4388","1","32","8","content","Názov modulu pre modul FORMULÁRU","_menu_name_4","Teilnahme","1","0","0"),
("4389","1","32","9","content","Názov modulu pre modul O REGIONE","_menu_name_5","Zell am See-Kaprun","1","0","0"),
("4390","1","32","10","content","Názov modulu pre modul MAPA","_menu_name_6","Mapa","0","0","0"),
("4391","1","32","11","content","Názov modulu pre modul UBYTOVANIE","_menu_name_7","Das Alpenhaus Kaprun ","1","0","0"),
("4392","1","32","5","content","Text k modulu INFO","_menu_1_text_1","<p><span style=\"font-size:24px\"><span style=\"color:#336699\"><strong>Jetzt einen Urlaub in der Region Zell am See-Kaprun holen!</strong></span></span></p>\n","1","0","0"),
("4393","1","32","6","content","Text k modulu O SÚŤAŽI","_menu_2_text_1","<h3><span style=\"font-size:18px\">Wir verlosen Urlaube im Hotel Das Alpenhaus Kaprun in Zell am See-Kaprun f&uuml;r 2 Personen &agrave; 3 N&auml;chte inkl. Halbpension!</span></h3>\n\n<p><span style=\"font-size:18px\">So einfach geht&rsquo;s: Teilnahmeformular ausf&uuml;llen, Frage richtig beantworten und Daumen halten.</span></p>\n\n<p><span style=\"font-size:16px\">Das Gewinnspiel l&auml;uft von 1. April bis 30. April 2017. Teilnahmeschluss ist der 30. April 2017.</span></p>\n","1","0","0"),
("4394","1","32","7","content","Text k modulu GALÉRIA","_menu_3_text_1","","1","0","0"),
("4395","1","32","8","content","Text k modulu FORMULÁR","_menu_4_text_1","<p>Ihre Registrierung:</p>\n","1","0","0"),
("4396","1","32","9","content","Text k modulu O REGIÓNE","_menu_5_text_1","<p><span style=\"font-size:16px\"><strong>Kompromisslos urlauben zwischen Gletscher, Berge und See</strong></span></p>\n\n<p><span style=\"font-size:16px\">Warum sich f&uuml;r etwas entscheiden, wenn man alles haben kann? Zell am See-Kaprun im Herzen der &ouml;sterreichischen Alpen ist ein Natur- und Urlaubsparadies par excellence: Hier werden W&uuml;nsche wahr &ndash; f&uuml;r Wanderer und Bergsteiger, Radfahrer und Downhiller, Adrenalin-Junkies und Genie&szlig;er, Yogis und Golf-Liebhaber. Wer Vielfalt sch&auml;tzt, wird Zell am See-Kaprun lieben.</span></p>\n","1","0","0"),
("4397","1","32","9","content","Ďalší text k modulu O REGIÓNE","_menu_5_text_2","<p><span style=\"font-size:16px\">Vom ewigen Eis des Kitzsteinhorns geht es in die glitzernden Fluten des glasklaren Zeller Sees, von der erfrischenden Schlucht auf die erlebnisreiche Schmittenh&ouml;he, von &bdquo;Schmidolins Feuertaufe&ldquo; zum &bdquo;Zeller Seenzauber&ldquo;. Alles ist m&ouml;glich und mit der &bdquo;Zell am See-Kaprun Sommerkarte&ldquo; mit 40 Attraktionen noch viel mehr: Es geht allein darum, die richtige Wahl zu treffen.&nbsp;</span></p>\n\n<p><span style=\"font-size:16px\">Mehr Informationen:&nbsp;<a href=\"http://www.zellamsee-kaprun.com/\">www.zellamsee-kaprun.com</a></span></p>\n","1","0","0"),
("4398","1","32","10","content","Text k modulu MAPA","_menu_6_text_1","<p>Mapa regionu</p>\n","1","0","0"),
("4399","1","32","2","content","Text k modulu UBYTOVANIE 1","_menu_7_text_1","<p><strong>Die &bdquo;Lederhosn&ldquo; unter den alpinen Lifestyle Hotels.</strong><br />\nUnter dem Motto &bdquo;&hellip;vom Leben nahe den Bergen&ldquo; bietet Ihnen DAS ALPENHAUS KAPRUN regionale Authentizit&auml;t, zeitgem&auml;&szlig; und unkompliziert interpretiert.</p>\n\n<p>Genie&szlig;en Sie im Zentrum von Kaprun authentischen alpinen Lifestyle in 122 modernen Zimmern &amp; Suiten sowie regionale Alpenhaus.Kulinarik, die auch Veganern ein sinnenfrohes Erlebnis bietet. Entspannung pur bietet der 1.000 m&sup2; gro&szlig;e ALPEN.VEDA.SPA auf zwei Ebenen mit Panorama Innenpool, beheiztem Au&szlig;enpool, Whirlpool, 6 Saunen, 4 Ruher&auml;umen, einem modernen Fitnessraum sowie einem breiten Behandlungsangebot.</p>\n","1","0","0"),
("4400","1","32","12","content","Input Meno","form_base_name","Vorname","1","0","0"),
("4401","1","32","12","content","Input Priezvisko","form_base_surname","Nachname","1","0","0"),
("4402","1","32","12","content","Input PSČ","form_base_psc","PLZ","1","0","0"),
("4403","1","32","12","content","Input Mesto","form_base_city","Stadt","1","0","0"),
("4404","1","32","12","content","Input Email","form_base_email","E-mail","1","0","0"),
("4405","1","32","12","content","Input Doklad","form_extend_v1_doklad","","0","0","0"),
("4406","1","32","12","content","Input Otázka + odpovede","form_extend_v3_otazka","Wie heißt der neue Trailrunning Event in Zell am See-Kaprun für Damen, der von 19.-21.Mai 2017 stattfindet?","1","0","0"),
("4407","1","32","12","content","Odpoveď A","form_extend_v3_odpoved_a","Großglocker Ultra Trail","1","0","0"),
("4408","1","32","12","content","Odpoveď B","form_extend_v3_odpoved_b","Anita Womens Trail","1","0","0"),
("4409","1","32","12","content","Odpoveď C","form_extend_v3_odpoved_c","TriZell","1","0","0"),
("4410","1","32","4","content","Názov","field_word_nazov","Názov","0","0","0"),
("4411","1","32","4","content","Adresa","field_word_adresa","Adresa","0","0","0"),
("4412","1","32","4","content","Kontakt","field_word_kontakt","Kontakt","0","0","0"),
("4413","1","32","4","content","Web","field_word_web","Web","0","0","0"),
("4414","1","32","4","content","Hláška povinné pole","field_word_err","Pflichtfelder","1","0","0"),
("4415","1","32","4","content","Registrovať","field_word_sent","Teilnehmen","1","0","0"),
("4416","1","32","4","content","Predchádzajúca (fotka)","field_word_previous","Vorheriges","1","0","0"),
("4417","1","32","4","content","Ďalšia (fotka)","field_word_next","Nächstes","1","0","0"),
("4418","1","32","4","content","Súhlasím s newslettrom","field_word_suhlas_news","Ja, ich stimme zu den Newsletter von Zell am See-Kaprun und John Harris zu erhalten und meine Daten für weitere Marketingaktivitäten zur Verfügung zu stellen.","1","0","0"),
("4419","1","32","4","content","Súhlasím s podmienkami súťaže","field_word_suhlas_podm","Ja, ich stimme den Teilnahmebedingungen zu. (Teilnahmebedingungen HIER).","1","0","0"),
("4420","1","32","1","content","Kľúčové slová pre Google","keywords","Zell am See-Kaprun  Tauern Spa  John Harris","1","0","0"),
("4421","1","32","1","content","Popis pre Google","description","This competition has a first ID","1","0","0"),
("4422","1","32","4","content","Súhlasím s podmienkami súťaže","field_word_dakujeme","Danke, Sie haben sich erfolgreich für das Gewinnspiel registriert.","1","0","0"),
("4423","1","32","12","image","Podmienky súťaže (PDF)","form_file_podmienky","501","1","0","0"),
("4424","1","32","12","image","Newsletter (PDF)","form_file_newsletter","68","0","0","0"),
("4425","1","32","4","content","Hláška možnosti novej registrácie","field_word_nova_registracia","Jetzt Freunde einladen!","1","0","0"),
("4426","1","32","13","content","Počet znakov vygenerovaného hashu","_email_conf_char","8","1","0","0"),
("4427","1","32","13","content","Hláška, súťažiacemu ktorá mu príde na email po registracii.","_email_conf_sent_text","Danke, Sie haben sich erfolgreich für das Gewinnspiel registriert. Wir wünschen Ihnen viel Erfolg bei der Verlosung!","1","0","0"),
("4428","1","32","12","content","Telefónne číslo","form_base_tel_c","Tel. Nr.","1","0","0"),
("4429","1","32","4","content","Hláška za hviezdičkou o povinných poliach","field_word_povinne_polia","","1","0","0"),
("4430","1","32","2","image","Fotka loga k modulu UBYTOVANIE","_menu_7_image_2_1","59","0","0","0"),
("4431","1","32","16","content","Názov hotelu 2","info_hotel_name_2","Sporthotel Falkenstein","0","0","0"),
("4432","1","32","16","content","Adresa Hotela 2","info_hotel_addr_2","Nikolaus-Gassner-Str. 79   <br/>   A - 5710 Kaprun","0","0","0"),
("4433","1","32","16","content","Telefón do hotela 2","info_hotel_tel_c_2","+43 6547 7122","0","0","0"),
("4434","1","32","16","content","Email hotelu 2","info_hotel_email_2","sporthotel@falkenstein.at","0","0","0"),
("4435","1","32","16","content","Text k modulu UBYTOVANIE 2","_menu_7_text_2","<p><strong>Das Falkenstein</strong></p>\n\n<p>Tady v Kaprunu a hotelu Falkenstein lze objevit spoustu vzru&scaron;uj&iacute;c&iacute;ch možnost&iacute; a z&aacute;bavy&nbsp;pro rodiny a děti. Každ&yacute; den může b&yacute;t spojen s nov&yacute;mi z&aacute;žitky a dojmy, ať už jde&nbsp;o zvl&aacute;&scaron;tn&iacute; rodinn&eacute; turistick&eacute; v&yacute;lety, čvacht&aacute;n&iacute; a klouz&aacute;n&iacute; v Tauern SPA Kaprun, v&yacute;let&nbsp;k alpsk&eacute; horsk&eacute; bobov&eacute; dr&aacute;ze &quot;Maisfiltzer&quot;, o n&aacute;v&scaron;těvu volnočasov&eacute;ho nebo n&aacute;rodn&iacute;ho&nbsp;parku nebo o mnoh&aacute; dal&scaron;&iacute; dobrodružstv&iacute; - z&aacute;bavě se nekladou ž&aacute;dn&eacute; hranice.</p>\n\n<p>V hotelu Falkenstein&nbsp;se nach&aacute;z&iacute; kromě&nbsp;prostorn&eacute;ho&nbsp;dětsk&eacute;ho hři&scaron;tě&nbsp;a dětsk&eacute; herny tak&eacute;&nbsp;velk&yacute; baz&eacute;n a najdete&nbsp;zde i&nbsp;chutnou&nbsp;Pinzgauerskou&nbsp;kuchyni s pestr&yacute;mi&nbsp;dětsk&yacute;mi menu&nbsp;- n&aacute;&scaron; maskot Falki&nbsp;se na v&aacute;s tě&scaron;&iacute;!</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n","0","0","0"),
("4436","1","32","17","content","Text k modulu UBYTOVANIE 3","_menu_7_text_3","<p><strong>Dovolen&aacute; v Zell am See je dovolenou s požitkem - v hotelu Tirolerhof!</strong></p>\n\n<p>Jezero, hory, ledovec a stylov&yacute;, rodinn&yacute; 4-hvězdičkov&yacute; hotel superior v Zell am See &ndash; to je ide&aacute;ln&iacute; kombinace pro va&scaron;i dovolenou v Zell am See, v l&eacute;tě i v zimě. Budete m&iacute;t v&yacute;hled na jezero Zeller See, hory Schmittenh&ouml;he a Kitzsteinhorn se v&scaron;emi rozmanit&yacute;mi sportovn&iacute;mi a rekreačn&iacute;mi možnostmi a budete h&yacute;čk&aacute;ni v b&aacute;ječn&eacute;m a mimoř&aacute;dn&eacute;m hotelu kulin&aacute;řsk&yacute;mi specialitami nejvy&scaron;&scaron;&iacute; kvality. Nebo str&aacute;v&iacute;te dovolenou spojenou s golfem v Salcburku, kde budete m&iacute;t v&yacute;hled na n&aacute;dhern&eacute; hory a jezero oblasti Zell am See-Kaprun. Nebo si užijete ve dvou n&aacute;dhern&eacute; apartm&aacute;ny v r&aacute;mci romantick&eacute; dovolen&eacute;. Nebo si poř&aacute;dně odpočinete s wellness a l&aacute;zeňskou nab&iacute;dkou vy&scaron;&scaron;&iacute; tř&iacute;dy a načerp&aacute;te novou energii. Takto může vypadat va&scaron;e dal&scaron;&iacute; rekreačn&iacute; dovolen&aacute; v hotelu Tirolerhof Zell am See - v srdci Salcburku. Wellness hotel, čtyřhvězdičkov&yacute; hotel superior, hotel pro hosty s pejsky, relaxačn&iacute; hotel - v&scaron;echny tyto př&iacute;vlastky si hotel Tirolerhof plně zaslouž&iacute;.</p>\n\n<p>&nbsp;</p>\n\n<p><strong>Prožijte nezapomenutelnou dovolenou v hotelu Tirolerhof!</strong></p>\n","0","0","0"),
("4437","1","32","17","content","Email hotelu 3","info_hotel_email_3","welcome@tirolerhof.co.at","0","0","0"),
("4438","1","32","17","content","Telefón do hotela 3","info_hotel_tel_c_3","+43(0)6542/772-0","0","0","0"),
("4439","1","32","17","content","Adresa Hotela 3","info_hotel_addr_3","Auerspergstrasse 5   <br/>   A - 5700 Zell am See","0","0","0"),
("4440","1","32","17","content","Názov hotelu 3","info_hotel_name_3","Hotel Tirolerhof ****S","0","0","0"),
("4441","1","32","16","image","Fotka loga k modulu UBYTOVANIE 2","_menu_7_image_1_2","66","0","0","0"),
("4442","1","32","16","image","Fotka k modulu UBYTOVANIE 2","_menu_7_image_2_2","65","0","0","0"),
("4443","1","32","17","image","Fotka loga k modulu UBYTOVANIE 3","_menu_7_image_1_3","51","0","0","0"),
("4444","1","32","17","image","Fotka k modulu UBYTOVANIE 3","_menu_7_image_2_3","56","0","0","0"),
("4445","1","32","2","content","Url adresa hotela 1","link_hotel_1","https://www.alpenhaus-kaprun.at","1","0","0"),
("4446","1","32","16","content","Url adresa hotela 2","link_hotel_2","http://www.falkenstein.at","0","0","0"),
("4447","1","32","17","content","Url adresa hotela 3","link_hotel_3","http://www.tirolerhof.co.at/","0","0","0"),
("4448","1","32","9","image","Druhá fotka modulu pre modul GALÉRIA","_menu_5_gallery_1","56","1","0","0"),
("4449","1","32","5","image","Fotka v hlavnom slideri 2","_menu_1_image_2","496","1","0","0"),
("4450","1","32","4","content","Po ukončení registrácie","field_word_koniec_registracie","<p>&nbsp;</p>\n\n<p style=\"text-align:center\">SOUTĚŽ BYLA UKONČENA 1.8. 2016</p>\n\n<p style=\"text-align:center\">Slosov&aacute;n&iacute; bylo provedeno dne 5.8.&nbsp;2016&nbsp;dle pravidel soutěže.&nbsp;</p>\n\n<p style=\"text-align:center\"><strong>1x rodinn&yacute; letn&iacute; pobyt, pro 2 dospěl&eacute; a 2 děti , na 5 dn&iacute; / 4 noci ve 4* hotelu, včetně polopenze a animačn&iacute;ho programu pro děti, to v&scaron;e v rakousk&eacute;m Zell am See-Kaprun, z&iacute;sk&aacute;vaj&iacute;:</strong></p>\n\n<p style=\"text-align:center\"><strong>Petra Kuncova,&nbsp; 46804 Jablonec nad Nisou , ČR</strong></p>\n\n<p style=\"text-align:center\"><strong>Alice Ertlbauerova,&nbsp; 62100 Brno, ČR</strong></p>\n\n<p style=\"text-align:center\"><strong>Iveta Pohankova,&nbsp; 28002 Kol&iacute;n, ČR</strong></p>\n\n<p style=\"text-align:center\"><strong>David Pravec,&nbsp; 53009 Pardubice, ČR</strong></p>\n\n<p style=\"text-align:center\"><strong>Monika Adamusova,&nbsp; 58764 B&aacute;nov-Str&aacute;žky, ČR</strong></p>\n\n<p style=\"text-align:center\"><strong>1x dětskou narozeninovou oslavu s překvapen&iacute;m kter&aacute; zahrnuje zaji&scaron;těn&iacute; z&aacute;bavn&eacute;ho doprovodn&eacute;ho programu (klaun, malov&aacute;n&iacute; na obličej a dal&scaron;&iacute; překvapen&iacute; ) pro Va&scaron;i narozeninovou oslavu u V&aacute;s doma, z&iacute;sk&aacute;v&aacute;:</strong></p>\n\n<p style=\"text-align:center\"><strong>Vlasta Kozov&aacute;, 739 46 Hukvaldy, ČR</strong></p>\n\n<p style=\"text-align:center\">V&yacute;hern&iacute; vouchery budou vyercům odesl&aacute;ny mailem nebo po&scaron;tou v&nbsp;nejbliž&scaron;&iacute;ch dnech! Pobyty jsou kromě dopravy. Spr&aacute;vnost a platnost slosov&aacute;n&iacute; potvrzuj&iacute; provozovatel&eacute; soutěže.</p>\n\n<p style=\"text-align:center\"><strong><u>V&yacute;hercům blahopřejeme a v&scaron;em ostatn&iacute;m děkujeme za &uacute;čast!</u></strong></p>\n\n<p style=\"text-align:center\"><span style=\"font-size:12px\">Provozovatel&eacute; soutěže:&nbsp;Organiz&aacute;tor: Zell am See-Kaprun Tourismus GmbH, Brucker Bundesstr.1a, 5700 Zell am See, AT a spoluorganiz&aacute;tor : Pompo, spol. s r.o., Lidick&aacute; 481, 273 51&nbsp; Unho&scaron;ť, ČR</span></p>\n","0","0","0"),
("4451","1","32","11","content","Názov modulu pre modul O PARTNEROVI","_menu_name_8","","0","0","0"),
("4452","1","32","15","content","Email partnera","info_partner_email","vienna@johnharris.at","1","0","0"),
("4453","1","32","15","content","Adresa partnera","info_partner_addr","Nibelungengasse 7 <br/> 1010 Wien","1","0","0"),
("4454","1","32","15","content","Názov partnera","info_partner_name","John Harris Gesellschaft m. b. H.","1","0","0"),
("4455","1","32","15","content","Telefónne číslo na partnera","info_partner_tel_c","+43 (1) 587 37 10","1","0","0"),
("4456","1","32","11","content","Text k modulu O PARTNEROVI 1","_menu_8_text_1","","0","0","0"),
("4457","1","32","1","content","Jazyková mutácia pre Facebook","_language","de_DE","1","0","0");
INSERT INTO dnt_microsites_composer VALUES
("4458","1","32","12","image","Newsletter 2 (PDF)","form_file_newsletter_2","68","0","0","0"),
("4459","1","32","4","content","Súhlasím s newslettrom 2","field_word_suhlas_news_2","News 2","1","0","0"),
("4460","1","32","18","content","Email hotelu 4","info_hotel_email_4","welcome@tirolerhof.co.at","0","0","0"),
("4461","1","32","18","content","Telefón do hotela 4","info_hotel_tel_c_4","+43(0)6542/772-0","0","0","0"),
("4462","1","32","18","content","Adresa Hotela 4","info_hotel_addr_4","Auerspergstrasse 5   <br/>   A - 5700 Zell am See","1","0","0"),
("4463","1","32","18","content","Názov hotelu 4","info_hotel_name_4","Hotel Tirolerhof ****S","0","0","0"),
("4464","1","32","18","image","Fotka loga k modulu UBYTOVANIE 4","_menu_7_image_1_4","","0","0","0"),
("4465","1","32","18","image","Fotka k modulu UBYTOVANIE 4","_menu_7_image_2_4","","1","0","0"),
("4466","1","32","18","content","Url adresa hotela 4","link_hotel_4","http://www.tirolerhof.co.at/","0","0","0"),
("4467","1","32","18","content","Text k modulu UBYTOVANIE 4","_menu_7_text_4","","0","0","0"),
("4468","1","32","11","image","Fotka k modulu O PARTNEROVI","_menu_8_image_1","","0","0","0"),
("4469","1","32","1","content","Google Plus","social_google_plus","https://plus.google.com/+zellamseekaprun","1","0","0"),
("4470","1","32","12","content","Input Otázka","form_extend_v2_otazka","Napíšte farbu vášho PC","0","0","0"),
("4471","1","32","13","content","Odoslať potvrdzovací email","sent_confirm_mail","1","1","0","0"),
("4472","1","32","12","content","Voliteľný parameter 1","form_base_custom_1","Toto pole je voliteľné","0","0","0"),
("4473","1","33","1","content","Template","layout","dnt_second","1","0","0"),
("4474","1","33","15","content","Link partnera","link_partner","http://www.intersport-voswinkel.de","1","0","0"),
("4475","1","33","3","content","Link regionu","link_region","http://www.zellamsee-kaprun.com","1","0","0"),
("4476","1","33","1","content","Zobraziť na URL adrese","real_address","http://www.vyhrat.com/","1","0","0"),
("4477","1","33","1","content","Facebook","social_fb","https://www.facebook.com/INTERSPORT.Voswinkel","1","0","0"),
("4478","1","33","1","content","Twitter","social_twitter","https://twitter.com/zellkaprun","1","0","0"),
("4479","1","33","1","content","Instagram","social_linked_in","https://www.instagram.com/zellamseekaprun/","1","0","0"),
("4480","1","33","1","content","Mapa ","map_location","https://www.google.sk/maps/place/Zell+am+See-Kaprun+Tourismus+GmbH/@47.3221006,12.7943083,17z/data=!3m1!4b1!4m2!3m1!1s0x47771cdf4f490061:0xba82c342ef002324","1","0","0"),
("4481","1","33","1","image","Favicon","favicon","57","1","0","0"),
("4482","1","33","1","content","Model farby R","_r","77","1","0","0"),
("4483","1","33","1","content","Model farby G","_g","113","1","0","0"),
("4484","1","33","1","content","Model farby B","_b","174","1","0","0"),
("4485","1","33","1","content","Font","_font","roboto","1","0","0"),
("4486","1","33","2","content","Názov hotelu 1","info_hotel_name_1","Das Alpenhaus Kaprun","1","0","0"),
("4487","1","33","2","content","Adresa Hotela 1","info_hotel_addr_1","Schlossstraße 2  <br/>  A - 5710 Kaprun","1","0","0"),
("4488","1","33","2","content","Telefón do hotela 1","info_hotel_tel_c_1","+43 6547 7647","1","0","0"),
("4489","1","33","2","content","Email hotelu 1","info_hotel_email_1","willkommen@alpenhaus-kaprun.at","1","0","0"),
("4490","1","33","3","content","Názov regiónu","info_region_name","Zell am See-Kaprun Tourismus","1","0","0"),
("4491","1","33","3","content","Adresa regiónu","info_region_addr","Brucker Bundesstr. 1a  <br/>  A - 5700 Zell am See","1","0","0"),
("4492","1","33","3","content","Telefónne číslo regiónu","info_region_tel_c","+43 6542 770","1","0","0"),
("4493","1","33","3","content","Email regiónu","info_region_email","welcome@zellamsee-kaprun.com","1","0","0"),
("4494","1","33","1","content","Youtube video","youtube_video","2QfvlHZVLN4","1","0","0"),
("4495","1","33","15","image","Logo partnera","partner_logo","510","1","0","0"),
("4496","1","33","3","image","Logo regiónu","region_logo","502","1","0","0"),
("4497","1","33","5","image","Fotka v hlavnom slideri 1","_menu_1_image_1","507","1","0","0"),
("4498","1","33","7","image","Fotka modulu pre modul GALÉRIA","_menu_3_image_1","505","1","0","0"),
("4499","1","33","7","image","Druhá fotka modulu pre modul GALÉRIA","_menu_3_image_2","506","1","0","0"),
("4500","1","33","2","image","Fotka k modulu UBYTOVANIE","_menu_7_image_1_1","512","1","0","0"),
("4501","1","33","5","content","Názov modulu pre modul INFO","_menu_name_1","Intro","1","0","0"),
("4502","1","33","6","content","Názov modulu pre modul O SÚŤAŽI","_menu_name_2","Gewinnspiel","0","0","0"),
("4503","1","33","7","content","Názov modulu pre modul GALÉRIU","_menu_name_3","Galérie","0","0","0"),
("4504","1","33","8","content","Názov modulu pre modul FORMULÁRU","_menu_name_4","Teilnahme","1","0","0"),
("4505","1","33","9","content","Názov modulu pre modul O REGIONE","_menu_name_5","Zell am See-Kaprun","1","0","0"),
("4506","1","33","10","content","Názov modulu pre modul MAPA","_menu_name_6","Mapa","0","0","0"),
("4507","1","33","11","content","Názov modulu pre modul UBYTOVANIE","_menu_name_7","Teilnehmende Hotels","1","0","0"),
("4508","1","33","5","content","Text k modulu INFO","_menu_1_text_1","<p><span style=\"font-size:22px\"><span style=\"color:#FFFFFF\"><strong><span style=\"background-color:#336699\">Jetzt Sommerurlaube in Zell am See-Kaprun gewinnen!</span></strong></span></span></p>\n","1","0","0"),
("4509","1","33","6","content","Text k modulu O SÚŤAŽI","_menu_2_text_1","<p style=\"text-align:center\"><span style=\"font-size:20px\"><strong>Wir verlosen Sommerurlaube in Zell am See-Kaprun!</strong></span><br />\n<span style=\"font-size:18px\">Einfach Teilnahmeformular ausf&uuml;llen und schon spielen Sie um einen unvergesslichen Sommerurlaub mit!</span></p>\n\n<p style=\"text-align:center\"><span style=\"font-size:18px\"><strong>Die Aktion l&auml;uft von 01. April 2017 bis 30. April 2017.</strong></span></p>\n","1","0","0"),
("4510","1","33","7","content","Text k modulu GALÉRIA","_menu_3_text_1","","0","0","0"),
("4511","1","33","8","content","Text k modulu FORMULÁR","_menu_4_text_1","<p><span style=\"font-size:16px\"><span style=\"color:rgb(38, 38, 38); font-family:arial,sans-serif\"><strong>Gewinnspiel l&auml;uft ab 01. April 2017 bis 30. April 2017.</strong> Teilnahmeschluss ist der 30. April 2017.&nbsp;</span></span><span style=\"color:rgb(38, 38, 38); font-family:arial,sans-serif; font-size:11pt\">Die Benachrichtigung der Gewinner erfolgt bis 15. Mai 2017 schriftlich.</span></p>\n\n<p><span style=\"font-size:16px\">Das gibt es zu gewinnen:<br />\n<strong>4 Sommerurlaube f&uuml;r 2 Personen &agrave; 4 N&auml;chte in einem 4* Hotel inkl. Halbpension und Zell am See-Kaprun Card!&nbsp;</strong>Der Gutschein gilt 1 Jahr ab Ausstellungsdatum nach Anfrage und Verf&uuml;gbarkeit.</span></p>\n","1","0","0"),
("4512","1","33","9","content","Text k modulu O REGIÓNE","_menu_5_text_1","<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n\n<p><span style=\"font-size:16px\"><strong>Kompromisslos urlauben zwischen Gletscher, Berge und See</strong></span></p>\n\n<p><span style=\"font-size:16px\">Warum sich f&uuml;r etwas entscheiden, wenn man alles haben kann?<br />\nZell am See-Kaprun im Herzen der &ouml;sterreichischen Alpen ist ein Natur- und Urlaubsparadies par excellence: Hier werden W&uuml;nsche wahr &ndash; f&uuml;r Wanderer und Bergsteiger, Radfahrer und Downhiller, Adrenalin-Junkies und Genie&szlig;er, Yogis und Golf-Liebhaber. Wer Vielfalt sch&auml;tzt, wird Zell am See-Kaprun lieben.</span></p>\n","1","0","0"),
("4513","1","33","9","content","Ďalší text k modulu O REGIÓNE","_menu_5_text_2","<p><span style=\"font-size:16px\">Vom ewigen Eis des Kitzsteinhorns geht es in die glitzernden Fluten des glasklaren Zeller Sees, von der erfrischenden Schlucht auf die erlebnisreiche Schmittenh&ouml;he, von &bdquo;Schmidolins Feuertaufe&ldquo; zum &bdquo;Zeller Seenzauber&ldquo;. Alles ist m&ouml;glich und mit der &bdquo;Zell am See-Kaprun Sommerkarte&ldquo; mit 40 Attraktionen noch viel mehr: Es geht allein darum, die richtige Wahl zu treffen.&nbsp;</span></p>\n\n<p>&nbsp;</p>\n\n<p><span style=\"font-size:16px\">Mehr Informationen:&nbsp;<u><a href=\"http://www.zellamsee-kaprun.com/\" style=\"box-sizing: border-box; background-color: transparent; color: rgb(70, 100, 150); text-decoration: none; transition: all 0.35s;\" target=\"_blank\">www.zellamsee-kaprun.com</a></u></span></p>\n","1","0","0"),
("4514","1","33","10","content","Text k modulu MAPA","_menu_6_text_1","<p>Mapa regionu</p>\n","0","0","0"),
("4515","1","33","2","content","Text k modulu UBYTOVANIE 1","_menu_7_text_1","<p><strong>DAS ALPENHAUS KAPRUN</strong><br />\nDie &bdquo;Lederhosn&ldquo; unter den alpinen Lifestyle Hotels.</p>\n\n<p>Unter dem Motto &bdquo;&hellip;vom Leben nahe den Bergen&ldquo; bietet Ihnen DAS ALPENHAUS KAPRUN regionale Authentizit&auml;t, zeitgem&auml;&szlig; und unkompliziert interpretiert.<br />\nGenie&szlig;en Sie im Zentrum von Kaprun authentischen alpinen Lifestyle in 122 modernen Zimmern &amp; Suiten sowie regionale Alpenhaus.Kulinarik, die auch Veganern ein sinnenfrohes Erlebnis bietet. Entspannung pur bietet der 1.000 m&sup2; gro&szlig;e ALPEN.VEDA.SPA auf zwei Ebenen mit Panorama Innenpool, beheiztem Au&szlig;enpool, Whirlpool, 6 Saunen, 4 Ruher&auml;umen, einem modernen Fitnessraum sowie einem breiten Behandlungsangebot.</p>\n","1","0","0"),
("4516","1","33","12","content","Input Meno","form_base_name","Vorname","1","0","0"),
("4517","1","33","12","content","Input Priezvisko","form_base_surname","Nachname","1","0","0"),
("4518","1","33","12","content","Input PSČ","form_base_psc","PLZ","1","0","0"),
("4519","1","33","12","content","Input Mesto","form_base_city","Stadt","1","0","0"),
("4520","1","33","12","content","Input Email","form_base_email","eMail","1","0","0"),
("4521","1","33","12","content","Input Doklad","form_extend_v1_doklad","Einkaufsbeleg Nr.","0","0","0"),
("4522","1","33","12","content","Input Otázka + odpovede","form_extend_v3_otazka","Wie heißt der neue Trailrunning Event in Zell am See-Kaprun für Damen, der von 19.-21.Mai 2017 stattfindet?","1","0","0"),
("4523","1","33","12","content","Odpoveď A","form_extend_v3_odpoved_a","Großglocker Ultra Trail","1","0","0"),
("4524","1","33","12","content","Odpoveď B","form_extend_v3_odpoved_b","Anita Womens Trail   ","1","0","0"),
("4525","1","33","12","content","Odpoveď C","form_extend_v3_odpoved_c","TriZell","1","0","0"),
("4526","1","33","4","content","Názov","field_word_nazov","Názov","0","0","0"),
("4527","1","33","4","content","Adresa","field_word_adresa","Adresa","0","0","0"),
("4528","1","33","4","content","Kontakt","field_word_kontakt","Kontakt","0","0","0"),
("4529","1","33","4","content","Web","field_word_web","Web","0","0","0"),
("4530","1","33","4","content","Hláška povinné pole","field_word_err","Pflichtfelder","1","0","0"),
("4531","1","33","4","content","Registrovať","field_word_sent","Teilnehmen","1","0","0"),
("4532","1","33","4","content","Predchádzajúca (fotka)","field_word_previous","Vorheriges","1","0","0"),
("4533","1","33","4","content","Ďalšia (fotka)","field_word_next","Nächstes","1","0","0"),
("4534","1","33","4","content","Súhlasím s newslettrom","field_word_suhlas_news","Ja, ich stimme zu den Newsletter von Zell am See-Kaprun und Teilnehmende Hotels zu erhalten und meine Daten für weitere Marketingaktivitäten zur Verfügung zu stellen.","1","0","0"),
("4535","1","33","4","content","Súhlasím s podmienkami súťaže","field_word_suhlas_podm","Ja, ich stimme den Teilnahmebedingungen zu. (Teilnahmebedingungen HIER).","1","0","0"),
("4536","1","33","1","content","Kľúčové slová pre Google","keywords","Zell am See-Kaprun  Intersport Voswinkel","1","0","0"),
("4537","1","33","1","content","Popis pre Google","description","This competition has a first ID","1","0","0"),
("4538","1","33","4","content","Súhlasím s podmienkami súťaže","field_word_dakujeme","Danke, Sie haben sich erfolgreich für das Gewinnspiel registriert.","1","0","0"),
("4539","1","33","12","image","Podmienky súťaže (PDF)","form_file_podmienky","508","1","0","0"),
("4540","1","33","12","image","Newsletter (PDF)","form_file_newsletter","509","0","0","0"),
("4541","1","33","4","content","Hláška možnosti novej registrácie","field_word_nova_registracia","Jetzt Freunde einladen!","1","0","0"),
("4542","1","33","13","content","Počet znakov vygenerovaného hashu","_email_conf_char","8","1","0","0"),
("4543","1","33","13","content","Hláška, súťažiacemu ktorá mu príde na email po registracii.","_email_conf_sent_text","Danke, Sie haben sich erfolgreich für das Gewinnspiel registriert. Wir wünschen Ihnen viel Erfolg bei der Verlosung!","1","0","0"),
("4544","1","33","12","content","Telefónne číslo","form_base_tel_c","Tel. Nr.","1","0","0"),
("4545","1","33","4","content","Hláška za hviezdičkou o povinných poliach","field_word_povinne_polia","","1","0","0"),
("4546","1","33","2","image","Fotka loga k modulu UBYTOVANIE","_menu_7_image_2_1","407","0","0","0"),
("4547","1","33","16","content","Názov hotelu 2","info_hotel_name_2","Alpen Wellness Hotel  Barbarahof **** Superior","1","0","0"),
("4548","1","33","16","content","Adresa Hotela 2","info_hotel_addr_2","Nikolaus-Gassner-Strasse 11  <br/>   A - 5710 Kaprun","1","0","0"),
("4549","1","33","16","content","Telefón do hotela 2","info_hotel_tel_c_2","+43 6547 7248","1","0","0"),
("4550","1","33","16","content","Email hotelu 2","info_hotel_email_2","info@hotel-barbarahof.at","1","0","0"),
("4551","1","33","16","content","Text k modulu UBYTOVANIE 2","_menu_7_text_2","<p><strong>Alpen-Wellnesshotel Barbarahof**** <span style=\"font-size:11px\">Superior</span></strong></p>\n\n<p>Sympathischer Luxus, famili&auml;res Ambiente, verf&uuml;hrerische Gen&uuml;sse, wohltuende Entspannung: Im 4 Sterne Superior-Hotel Barbarahof erleben Sie Urlaub mit allen Sinnen. G&ouml;nnen Sie sich eine genussvolle Auszeit in perfekter Lage.&nbsp;</p>\n","1","0","0"),
("4552","1","33","17","content","Text k modulu UBYTOVANIE 3","_menu_7_text_3","<p><strong>DAS FALKENSTEIN.</strong><br />\nNat&uuml;rlich. Aktiv. Anders.<br />\nDies sind einige Grundz&uuml;ge des Falkenstein Hotels mit Blick auf das Kitzsteinhorn.</p>\n\n<p>Der Falkenstein, direkt am Fu&szlig;e des Kitzsteinhorns gelegen, verbindet &ouml;sterreichische Tradition mit modernem Lebensstil. Nach einer anstrengenden Session auf dem Mountainbike oder einem Gleitschirmausflug mit dem Hotelier k&ouml;nnen Sie sich in der Au&szlig;ensauna, mit Yoga-Session oder im gro&szlig;z&uuml;gigen Wellnessbereich entspannen.</p>\n","1","0","0"),
("4553","1","33","17","content","Email hotelu 3","info_hotel_email_3","sporthotel@falkenstein.at","1","0","0"),
("4554","1","33","17","content","Telefón do hotela 3","info_hotel_tel_c_3","+43  6547 7122","1","0","0"),
("4555","1","33","17","content","Adresa Hotela 3","info_hotel_addr_3","Nikolaus-Gassner-Strasse 79   <br/>  A - 5710 Kaprun","1","0","0"),
("4556","1","33","17","content","Názov hotelu 3","info_hotel_name_3","Das Falkenstein","1","0","0"),
("4557","1","33","16","image","Fotka loga k modulu UBYTOVANIE 2","_menu_7_image_1_2","514","1","0","0");
INSERT INTO dnt_microsites_composer VALUES
("4558","1","33","16","image","Fotka k modulu UBYTOVANIE 2","_menu_7_image_2_2","513","0","0","0"),
("4559","1","33","17","image","Fotka loga k modulu UBYTOVANIE 3","_menu_7_image_1_3","516","1","0","0"),
("4560","1","33","17","image","Fotka k modulu UBYTOVANIE 3","_menu_7_image_2_3","515","0","0","0"),
("4561","1","33","2","content","Url adresa hotela 1","link_hotel_1","https://www.alpenhaus-kaprun.at","1","0","0"),
("4562","1","33","16","content","Url adresa hotela 2","link_hotel_2","https://www.hotel-barbarahof.at","1","0","0"),
("4563","1","33","17","content","Url adresa hotela 3","link_hotel_3","http://www.falkenstein.at","1","0","0"),
("4564","1","33","9","image","Druhá fotka modulu pre modul GALÉRIA","_menu_5_gallery_1","57","1","0","0"),
("4565","1","33","5","image","Fotka v hlavnom slideri 2","_menu_1_image_2","504","1","0","0"),
("4566","1","33","4","content","Po ukončení registrácie","field_word_koniec_registracie","<p><span style=\"color:#FF0000\"><span style=\"font-size:20px\"><strong><span style=\"font-family:arial,sans-serif\">Das&nbsp;</span>Gewinnspiel<span style=\"font-family:arial,sans-serif\">&nbsp;ist&nbsp;</span>bereits beendet<span style=\"font-family:arial,sans-serif\">!</span></strong></span></span></p>\n\n<p><span style=\"color:#FF0000\"><span style=\"font-size:20px\">Wir&nbsp;danken<span style=\"font-family:arial,sans-serif\">&nbsp;euch f&uuml;r die rege&nbsp;</span>Teilnahme<span style=\"font-family:arial,sans-serif\">!</span></span></span></p>\n\n<p><span style=\"font-size:18px\"><span style=\"color:#FF0000\"><span style=\"font-family:arial,sans-serif\">Unsere Gl&uuml;ckw&uuml;nsche an die folgenden&nbsp;</span>Gewinner<span style=\"font-family:arial,sans-serif\">:</span></span></span></p>\n","0","0","0"),
("4567","1","33","11","content","Názov modulu pre modul O PARTNEROVI","_menu_name_8","Intersport Voswinkel","1","0","0"),
("4568","1","33","15","content","Email partnera","info_partner_email","info@intersport-voswinkel.de","1","0","0"),
("4569","1","33","15","content","Adresa partnera","info_partner_addr","Brennaborstrasse 12 <br/>  44149 Dortmund - DE","1","0","0"),
("4570","1","33","15","content","Názov partnera","info_partner_name","Sport Voswinkel GmbH & Co. KG","1","0","0"),
("4571","1","33","15","content","Telefónne číslo na partnera","info_partner_tel_c","+49231999600","1","0","0"),
("4572","1","33","11","content","Text k modulu O PARTNEROVI 1","_menu_8_text_1","<p><strong>INTERSPORT Voswinkel</strong> ist ein Unternehmen mit 110 Jahren Handelserfahrung. Wir sind ein filialisiertes Sportfachhandelsunternehmen mit klarem Fokus auf den Breitensport.</p>\n\n<p>&bull; &nbsp; Wir orientieren uns an unseren Kunden.<br />\n&bull; &nbsp; Wir streben nach Spitzenleistung.<br />\n&bull; &nbsp; Wir betreiben Handel mit Leidenschaft und Liebe zum Detail.<br />\n&bull; &nbsp; Wir f&uuml;hren die Top-Marken des Sporthandels.<br />\n&bull; &nbsp; Wir haben flache Hierarchien und dadurch kurze Entscheidungswege.</p>\n\n<p><strong>Weitere Aktionen von INTERSPORT Voswinkel findest du </strong><a href=\"http://www.intersport-voswinkel.de/\" target=\"_blank\"><strong>hier!</strong></a></p>\n","1","0","0"),
("4573","1","33","1","content","Jazyková mutácia pre Facebook","_language","de_DE","1","0","0"),
("4574","1","33","12","image","Newsletter 2 (PDF)","form_file_newsletter_2","405","0","0","0"),
("4575","1","33","4","content","Súhlasím s newslettrom 2","field_word_suhlas_news_2","News 2","0","0","0"),
("4576","1","33","18","content","Email hotelu 4","info_hotel_email_4"," info@romantik-hotel.at","1","0","0"),
("4577","1","33","18","content","Telefón do hotela 4","info_hotel_tel_c_4","+43 6542 72 520","1","0","0"),
("4578","1","33","18","content","Adresa Hotela 4","info_hotel_addr_4","Sebastian-Hörl-Straße 11  <br/>   A - 5700 Zell am See","1","0","0"),
("4579","1","33","18","content","Názov hotelu 4","info_hotel_name_4","Romantikhotel Zell am See","1","0","0"),
("4580","1","33","18","image","Fotka loga k modulu UBYTOVANIE 4","_menu_7_image_1_4","517","1","0","0"),
("4581","1","33","18","image","Fotka k modulu UBYTOVANIE 4","_menu_7_image_2_4","518","0","0","0"),
("4582","1","33","18","content","Url adresa hotela 4","link_hotel_4","https://www.romantik-hotel.at","1","0","0"),
("4583","1","33","18","content","Text k modulu UBYTOVANIE 4","_menu_7_text_4","<p><strong>Romantikhotel Zell am See</strong></p>\n\n<p>Urlaub f&uuml;r Zwei im Romantikhotel Zell am See. Im Zentrum der Bergstadt Zell am See, aber absolut ruhig finden Paare Erholung vom Alltag! Gediegene Zimmer, ehrliche Kulinarik und ein kleines aber feines Wellnessangebot erfreuen und helfen beim Abschalten! Das Extra plus &ndash; &uuml;berraschen Sie Ihre/n Partner/in mit dem besonderen Etwas. Sei es ein Gondelfr&uuml;hst&uuml;ck, ein Dinner im historischen Weinkeller oder aber das Butlerservice im Strandkorb auf der Schmittenh&ouml;he beim Speicherteich. Ihre W&uuml;nsche sind unsere Verpflichtung &ndash; wir freuen uns auf Sie!</p>\n","1","0","0"),
("4584","1","33","11","image","Fotka k modulu O PARTNEROVI","_menu_8_image_1","398","1","0","0"),
("4585","1","33","1","content","Google Plus","social_google_plus","https://plus.google.com/+zellamseekaprun","1","0","0"),
("4586","1","33","12","content","Input Otázka","form_extend_v2_otazka","Wie viele Pistenkilometer bietet ......? ","0","0","0"),
("4587","1","33","13","content","Odoslať potvrdzovací email","sent_confirm_mail","1","1","0","0"),
("4588","1","33","12","content","Voliteľný parameter 1","form_base_custom_1","Strasse","0","0","0"),
("4589","1","34","1","content","Template","layout","dnt_second","1","0","0"),
("4590","1","34","15","content","Link partnera","link_partner","http://www.merida-bike.cz","1","0","0"),
("4591","1","34","3","content","Link regionu","link_region","http://www.schladming-dachstein.at/cyklo","1","0","0"),
("4592","1","34","1","content","Zobraziť na URL adrese","real_address","http://www.vyhrat.com/","1","0","0"),
("4593","1","34","1","content","Facebook","social_fb","https://www.facebook.com/MeridaCzech","1","0","0"),
("4594","1","34","1","content","Twitter","social_twitter","https://twitter.com/SchlaTourism","1","0","0"),
("4595","1","34","1","content","Instagram","social_linked_in","https://twitter.com/lampre_merida","1","0","0"),
("4596","1","34","1","content","Mapa ","map_location","https://www.google.cz/maps/place/Schladming-Dachstein+Tourismusmarketing+GmbH/@47.4301562,13.5867908,12z/data=!4m8!1m2!2m1!1sSchladming-Dachstein+Tourismus!3m4!1s0x4771256a44c16259:0x22e482ea2c31ff12!8m2!3d47.396843!4d13.684136","1","0","0"),
("4597","1","34","1","image","Favicon","favicon","57","1","0","0"),
("4598","1","34","1","content","Model farby R","_r","175","1","0","0"),
("4599","1","34","1","content","Model farby G","_g","200","1","0","0"),
("4600","1","34","1","content","Model farby B","_b","20","1","0","0"),
("4601","1","34","1","content","Font","_font","Arial","1","0","0"),
("4602","1","34","2","content","Názov hotelu 1","info_hotel_name_1","Stadthotel brunner","0","0","0"),
("4603","1","34","2","content","Adresa Hotela 1","info_hotel_addr_1","Hauptplatz 14   <br/>   A - 8970 Schladming","1","0","0"),
("4604","1","34","2","content","Telefón do hotela 1","info_hotel_tel_c_1","+43 (0) 3687 22513","1","0","0"),
("4605","1","34","2","content","Email hotelu 1","info_hotel_email_1","welcome@stadthotel-brunner.at","1","0","0"),
("4606","1","34","3","content","Názov regiónu","info_region_name","Schladming-Dachstein","1","0","0"),
("4607","1","34","3","content","Adresa regiónu","info_region_addr","Ramsauerstraße 756  <br/>  A-8970 Schladming","1","0","0"),
("4608","1","34","3","content","Telefónne číslo regiónu","info_region_tel_c","+43 3687 233 10","1","0","0"),
("4609","1","34","3","content","Email regiónu","info_region_email","info@schladming-dachstein.at","1","0","0"),
("4610","1","34","1","content","Youtube video","youtube_video","KyIbL6DRX4k","1","0","0"),
("4611","1","34","15","image","Logo partnera","partner_logo","530","1","0","0"),
("4612","1","34","3","image","Logo regiónu","region_logo","527","1","0","0"),
("4613","1","34","5","image","Fotka v hlavnom slideri 1","_menu_1_image_1","525","1","0","0"),
("4614","1","34","7","image","Fotka modulu pre modul GALÉRIA","_menu_3_image_1","532","1","0","0"),
("4615","1","34","7","image","Druhá fotka modulu pre modul GALÉRIA","_menu_3_image_2","533","1","0","0"),
("4616","1","34","2","image","Fotka k modulu UBYTOVANIE","_menu_7_image_1_1","415","1","0","0"),
("4617","1","34","5","content","Názov modulu pre modul INFO","_menu_name_1","Intro","1","0","0"),
("4618","1","34","6","content","Názov modulu pre modul O SÚŤAŽI","_menu_name_2","O soutěži","0","0","0"),
("4619","1","34","7","content","Názov modulu pre modul GALÉRIU","_menu_name_3","Galérie","0","0","0"),
("4620","1","34","8","content","Názov modulu pre modul FORMULÁRU","_menu_name_4","Registrace","1","1","0"),
("4621","1","34","9","content","Názov modulu pre modul O REGIONE","_menu_name_5","Schladming-Dachstein","1","2","0"),
("4622","1","34","10","content","Názov modulu pre modul MAPA","_menu_name_6","Mapa","0","0","0"),
("4623","1","34","11","content","Názov modulu pre modul UBYTOVANIE","_menu_name_7","Partnerské hotely","0","0","0"),
("4624","1","34","5","content","Text k modulu INFO","_menu_1_text_1","<p><span style=\"font-size:18px\"><span style=\"color:#FFFFFF\"><strong><span style=\"background-color:#66cc33\">&nbsp;</span></strong></span><span style=\"color:#000000\"><strong><span style=\"background-color:#66cc33\">Kupujte v&yacute;robky zn. Merida&nbsp;a vyhrajte cyklopobyt v Schladming-Dachstein!</span></strong></span><span style=\"color:#FFFFFF\"><strong><span style=\"background-color:#66cc33\">&nbsp;</span></strong></span></span></p>\n","1","0","0"),
("4625","1","34","6","content","Text k modulu O SÚŤAŽI","_menu_2_text_1","<h3 style=\"text-align:center\"><span style=\"font-size:18px\">Za n&aacute;kup jak&eacute;hokoliv v&yacute;robku značky MERIDA u partnersk&yacute;ch prodejců Meridy v ČR můžete vyhr&aacute;t<br />\nletn&iacute; cyklopobyt pro dva v rakousk&eacute;m&nbsp;Schladming-Dachstein!</span></h3>\n\n<p style=\"text-align:center\"><span style=\"font-size:18px\"><strong>Soutěž prob&iacute;ha od 07.04. do 31.05.2017.</strong></span></p>\n","1","0","0"),
("4626","1","34","7","content","Text k modulu GALÉRIA","_menu_3_text_1","","1","0","0"),
("4627","1","34","8","content","Text k modulu FORMULÁR","_menu_4_text_1","<p><span style=\"font-size:16px\">Nakupte v obdob&iacute; 7.4. - 31.5. 2017 jak&yacute;koliv v&yacute;robek značky MERIDA u partnersk&yacute;ch prodejců Meridy<br />\nv ČR a&nbsp;vyhrajte letn&iacute; dovolenou!&nbsp;</span><span style=\"font-size:18px\"><span style=\"font-size:16px\">Nav&iacute;c, kolikr&aacute;t nakoup&iacute;te, tolikr&aacute;t se můžete do soutěže registrovat a zv&yacute;&scaron;it tak Va&scaron;i &scaron;anci na v&yacute;hru!</span></span></p>\n\n<p><span style=\"font-size:16px\">V&yacute;hry v soutěži:&nbsp;<br />\n<strong>3x letn&iacute; dovolen&aacute; pro 2 osoby, na 4 dny / 3 noci<br />\nv 3* hotelu se sn&iacute;dan&iacute;, včetně letn&iacute; slevov&eacute; karty&nbsp;regionu Schladming-Dachstein</strong></span></p>\n\n<p><span style=\"font-size:16px\">Přejeme V&aacute;m hodně &scaron;těst&iacute; při slosov&aacute;n&iacute;!</span></p>\n","1","0","0"),
("4628","1","34","9","content","Text k modulu O REGIÓNE","_menu_5_text_1","<p><strong>Z&aacute;bava na dvou kolech v oblasti Schladming-Dachstein</strong><br />\nTuristick&yacute; region Schladming-Dachstein je možn&eacute; objevovat na horsk&eacute;m kole na 930 km značen&yacute;ch stezek v&scaron;ech &uacute;rovn&iacute; obt&iacute;žnosti s 25 000 metry přev&yacute;&scaron;en&iacute;. &Scaron;irok&aacute; &scaron;k&aacute;la stezek v různ&yacute;ch nadmořsk&yacute;ch v&yacute;&scaron;k&aacute;ch a rozmanit&eacute; v&yacute;lety k půvabn&yacute;m m&iacute;stům zaručuj&iacute; v&yacute;jimečn&eacute; z&aacute;žitky pro cyklisty na horsk&yacute;ch kolech a elektrokolech. K dispozici je 20 značen&yacute;ch stezek, připraven&yacute;ch od bikerů pro bikery. V nab&iacute;dce je velk&yacute; v&yacute;běr tras, kter&eacute; lze zobrazit prostřednictv&iacute;m GPS.&nbsp;</p>\n\n<p><strong>Cyklohotely v Schladming-Dachstein</strong><br />\nBikersk&eacute; hotely oblasti Schladming-Dachstein označen&eacute; jako &bdquo;př&iacute;větiv&eacute; k bikerům&ldquo; nab&iacute;zej&iacute; jedinečn&yacute; servis pro bikery. Ubytov&aacute;n&iacute;, kter&eacute; je označeno jako &bdquo;bike-friendly&ldquo;, m&aacute; jednotn&aacute; krit&eacute;ria - kol&aacute;rnu pro bezpečn&eacute; uschov&aacute;n&iacute; kol, m&iacute;sto pro myt&iacute; kol, n&aacute;stroje na opravu, pračku a su&scaron;ičku na oblečen&iacute;, kompetentn&iacute; kontaktn&iacute; osobu, infokoutek pro bikery a na př&aacute;n&iacute; i vyj&iacute;žďky s průvodcem. Pokud se ubytujete v jednom z cyklohotelů, budete m&iacute;t tu v&yacute;hodu, že si můžete v testovac&iacute;m centru hotelu aQi zdarma vyzkou&scaron;et nejnověj&scaron;&iacute; modely horsk&yacute;ch kol ROSE. Využijte tuto př&iacute;ležitost a objevte region a jeho nejkr&aacute;sněj&scaron;&iacute; m&iacute;sta na pr&eacute;miov&eacute;m horsk&eacute;m kole.<br />\nV&iacute;ce o regionu: <a href=\"http://www.schladming-dachstein.at/cyklo\" target=\"_blank\">www.schladming-dachstein.at/cyklo</a></p>\n","1","0","0"),
("4629","1","34","9","content","Ďalší text k modulu O REGIÓNE","_menu_5_text_2","<p><strong>Bikepark Planai a downhillov&aacute; trasa</strong><br />\nBikepark Planai nab&iacute;z&iacute; ten spr&aacute;vn&yacute; ter&eacute;n pro zač&aacute;tečn&iacute;ky i profesion&aacute;ly. Ke startu ve v&yacute;&scaron;ce 1830 m pohodlně dojedete lanovou dr&aacute;hou Planai. Odtud si můžete vybrat několik různ&yacute;ch variant sjezdu na v&iacute;ce než 10 různ&yacute;ch tras&aacute;ch a stezk&aacute;ch různ&yacute;ch &uacute;rovn&iacute; obt&iacute;žnosti. Zku&scaron;en&iacute; bikeři tu maj&iacute; nav&iacute;c k dispozici nejdel&scaron;&iacute; downhillovou trasu v Rakousku se sklonem až 45&deg;. Ale i zač&aacute;tečn&iacute;ci mohou na modr&yacute;ch tras&aacute;ch, jako např&iacute;klad Rookie Trail a Flowline, zdolat v&yacute;&scaron;kov&yacute; rozd&iacute;l 1000 metrů vedouc&iacute; až do &uacute;dol&iacute;.<br />\nSpecialitou pro bikery v turistick&eacute;m regionu Schladming-Dachstein je 3D RealityMap, na kter&eacute; je každ&aacute; cyklotrasa zobrazen&aacute; jako interaktivn&iacute; 3D mapa.</p>\n\n<p>V&iacute;ce o regionu:&nbsp;<a href=\"http://www.schladming-dachstein.at/cyklo\" target=\"_blank\">www.schladming-dachstein.at/cyklo</a></p>\n\n<p>&nbsp;</p>\n","1","0","0"),
("4630","1","34","10","content","Text k modulu MAPA","_menu_6_text_1","<p>Mapa regionu</p>\n","0","0","0"),
("4631","1","34","2","content","Text k modulu UBYTOVANIE 1","_menu_7_text_1","<p><strong>Stadthotel brunner</strong></p>\n\n<p>&bdquo;Můj střed v centru&ldquo;. C&iacute;tit se blaze uprostřed stylov&eacute; modern&iacute; architektury a 500 let star&yacute;ch zd&iacute; v centru Schladmingu. Nechte se h&yacute;čkat ve Spa nad střechami Schladmingu, saunou, &aacute;jurv&eacute;dsk&yacute;mi i klasick&yacute;mi mas&aacute;žemi, čajovnou, lekc&iacute; j&oacute;gy a meditac&iacute;. V restauraci, kter&aacute; nab&iacute;z&iacute; rakouskou,&nbsp; &aacute;jurv&eacute;dskou kuchyni i z&aacute;sadit&eacute; (lehce straviteln&eacute;) pokrmy, budete doslova rozmazlov&aacute;ni. Hory prozkoum&aacute;te během pě&scaron;&iacute; t&uacute;ry nebo na vyj&iacute;žďce na horsk&eacute;m kole s na&scaron;&iacute;m hotelov&yacute;m průvodcem.</p>\n","1","0","0"),
("4632","1","34","12","content","Input Meno","form_base_name","Jméno","1","0","0"),
("4633","1","34","12","content","Input Priezvisko","form_base_surname","Příjmení","1","0","0"),
("4634","1","34","12","content","Input PSČ","form_base_psc","PSČ","1","0","0"),
("4635","1","34","12","content","Input Mesto","form_base_city","Město","1","0","0"),
("4636","1","34","12","content","Input Email","form_base_email","Email","1","0","0"),
("4637","1","34","12","content","Input Doklad","form_extend_v1_doklad","Doklad o Vašem nákupu: (unikátní číslo účtenky)","1","0","0"),
("4638","1","34","12","content","Input Otázka + odpovede","form_extend_v3_otazka","Je toto modré?","0","0","0"),
("4639","1","34","12","content","Odpoveď A","form_extend_v3_odpoved_a","1","0","0","0"),
("4640","1","34","12","content","Odpoveď B","form_extend_v3_odpoved_b","2","0","0","0"),
("4641","1","34","12","content","Odpoveď C","form_extend_v3_odpoved_c","3","0","0","0"),
("4642","1","34","4","content","Názov","field_word_nazov","Názov","0","0","0"),
("4643","1","34","4","content","Adresa","field_word_adresa","Adresa","0","0","0"),
("4644","1","34","4","content","Kontakt","field_word_kontakt","Kontakt","0","0","0"),
("4645","1","34","4","content","Web","field_word_web","Web","0","0","0"),
("4646","1","34","4","content","Hláška povinné pole","field_word_err","Toto pole je povinné","1","0","0"),
("4647","1","34","4","content","Registrovať","field_word_sent","Registrovat","1","0","0"),
("4648","1","34","4","content","Predchádzajúca (fotka)","field_word_previous","Předchozí","1","0","0"),
("4649","1","34","4","content","Ďalšia (fotka)","field_word_next","Další","1","0","0"),
("4650","1","34","4","content","Súhlasím s newslettrom","field_word_suhlas_news","Mám zájem o zasílání aktuálních novinek z regionu Schladming- Dachstein.","1","0","0"),
("4651","1","34","4","content","Súhlasím s podmienkami súťaže","field_word_suhlas_podm","Souhlasím s pravidly soutěže (PRAVIDLA ZDE).","1","0","0"),
("4652","1","34","1","content","Kľúčové slová pre Google","keywords","soutěž Merida Schaldming-Dachstein","1","0","0"),
("4653","1","34","1","content","Popis pre Google","description","This competition has a first ID","1","0","0"),
("4654","1","34","4","content","Súhlasím s podmienkami súťaže","field_word_dakujeme","Děkujeme za Vaši účast a přejeme Vám hodně štěstí v soutěži!","1","0","0"),
("4655","1","34","12","image","Podmienky súťaže (PDF)","form_file_podmienky","544","1","0","0"),
("4656","1","34","12","image","Newsletter (PDF)","form_file_newsletter","123","0","0","0"),
("4657","1","34","4","content","Hláška možnosti novej registrácie","field_word_nova_registracia","Pokud máte další doklad o nákupu můžete přejít k nové registraci ZDE.","1","0","0");
INSERT INTO dnt_microsites_composer VALUES
("4658","1","34","13","content","Počet znakov vygenerovaného hashu","_email_conf_char","8","1","0","0"),
("4659","1","34","13","content","Hláška, súťažiacemu ktorá mu príde na email po registracii.","_email_conf_sent_text","Děkujeme za registraci do soutěže a přejeme Vám hodně štěstí při slosování! ","1","0","0"),
("4660","1","34","12","content","Telefónne číslo","form_base_tel_c","Telefonní číslo","0","0","0"),
("4661","1","34","4","content","Hláška za hviezdičkou o povinných poliach","field_word_povinne_polia","","1","0","0"),
("4662","1","34","2","image","Fotka loga k modulu UBYTOVANIE","_menu_7_image_2_1","416","0","0","0"),
("4663","1","34","16","content","Názov hotelu 2","info_hotel_name_2","Falkensteiner Hotel Schladming****s","0","0","0"),
("4664","1","34","16","content","Adresa Hotela 2","info_hotel_addr_2","Europaplatz 613   <br/>   A - 8970 Schladming","1","0","0"),
("4665","1","34","16","content","Telefón do hotela 2","info_hotel_tel_c_2","+43 (0) 3687 214-0","1","0","0"),
("4666","1","34","16","content","Email hotelu 2","info_hotel_email_2","reservations.schladming@falkensteiner.com","1","0","0"),
("4667","1","34","16","content","Text k modulu UBYTOVANIE 2","_menu_7_text_2","<p><strong>Hotel Falkensteiner</strong><br />\n<br />\nO př&iacute;jemnou atmosf&eacute;ru pro V&aacute;&scaron; odpočinek se postar&aacute; modern&iacute; architektura kombinovan&aacute; s m&iacute;stn&iacute;mi př&iacute;rodn&iacute;mi materi&aacute;ly, čerstv&aacute; &scaron;t&yacute;rsk&aacute; kuchyně a atraktivn&iacute; vodn&iacute; svět a wellness Acquapura Spa. Snov&aacute; centr&aacute;ln&iacute; poloha na okraji Schladmingu (5 minut pě&scaron;ky od n&aacute;měst&iacute;) mezi pohoř&iacute;m Schladmingsk&eacute; Taury a ledovcem Dachstein nab&iacute;z&iacute; ide&aacute;ln&iacute; v&yacute;choz&iacute; bod pro t&uacute;ry, na kter&yacute;ch můžete objevovat tajemstv&iacute; regionu Schladming-Dachstein.</p>\n\n<p><a href=\"https://www.falkensteiner.com/cs/hotel/schladming?utm_source=&amp;utm_medium=image_text&amp;utm_campaign=20170315-20170415Schladmig_Dachstein_Kilpikilpi.com\" target=\"_blank\">Buďte jako doma v nejlep&scaron;&iacute;m hotelu ve Schladmingu!</a></p>\n\n<p>&nbsp;</p>\n","1","0","0"),
("4668","1","34","17","content","Text k modulu UBYTOVANIE 3","_menu_7_text_3","<p><strong>Dovolen&aacute; v Zell am See je dovolenou s požitkem - v hotelu Tirolerhof!</strong></p>\n\n<p>Jezero, hory, ledovec a stylov&yacute;, rodinn&yacute; 4-hvězdičkov&yacute; hotel superior v Zell am See &ndash; to je ide&aacute;ln&iacute; kombinace pro va&scaron;i dovolenou v Zell am See, v l&eacute;tě i v zimě. Budete m&iacute;t v&yacute;hled na jezero Zeller See, hory Schmittenh&ouml;he a Kitzsteinhorn se v&scaron;emi rozmanit&yacute;mi sportovn&iacute;mi a rekreačn&iacute;mi možnostmi a budete h&yacute;čk&aacute;ni v b&aacute;ječn&eacute;m a mimoř&aacute;dn&eacute;m hotelu kulin&aacute;řsk&yacute;mi specialitami nejvy&scaron;&scaron;&iacute; kvality. Nebo str&aacute;v&iacute;te dovolenou spojenou s golfem v Salcburku, kde budete m&iacute;t v&yacute;hled na n&aacute;dhern&eacute; hory a jezero oblasti Zell am See-Kaprun. Nebo si užijete ve dvou n&aacute;dhern&eacute; apartm&aacute;ny v r&aacute;mci romantick&eacute; dovolen&eacute;. Nebo si poř&aacute;dně odpočinete s wellness a l&aacute;zeňskou nab&iacute;dkou vy&scaron;&scaron;&iacute; tř&iacute;dy a načerp&aacute;te novou energii. Takto může vypadat va&scaron;e dal&scaron;&iacute; rekreačn&iacute; dovolen&aacute; v hotelu Tirolerhof Zell am See - v srdci Salcburku. Wellness hotel, čtyřhvězdičkov&yacute; hotel superior, hotel pro hosty s pejsky, relaxačn&iacute; hotel - v&scaron;echny tyto př&iacute;vlastky si hotel Tirolerhof plně zaslouž&iacute;.</p>\n\n<p>&nbsp;</p>\n\n<p><strong>Prožijte nezapomenutelnou dovolenou v hotelu Tirolerhof!</strong></p>\n","0","0","0"),
("4669","1","34","17","content","Email hotelu 3","info_hotel_email_3","welcome@tirolerhof.co.at","0","0","0"),
("4670","1","34","17","content","Telefón do hotela 3","info_hotel_tel_c_3","+43(0)6542/772-0","0","0","0"),
("4671","1","34","17","content","Adresa Hotela 3","info_hotel_addr_3","Auerspergstrasse 5   <br/>   A - 5700 Zell am See","0","0","0"),
("4672","1","34","17","content","Názov hotelu 3","info_hotel_name_3","Hotel Tirolerhof ****S","0","0","0"),
("4673","1","34","16","image","Fotka loga k modulu UBYTOVANIE 2","_menu_7_image_1_2","418","0","0","0"),
("4674","1","34","16","image","Fotka k modulu UBYTOVANIE 2","_menu_7_image_2_2","417","1","0","0"),
("4675","1","34","17","image","Fotka loga k modulu UBYTOVANIE 3","_menu_7_image_1_3","51","0","0","0"),
("4676","1","34","17","image","Fotka k modulu UBYTOVANIE 3","_menu_7_image_2_3","56","0","0","0"),
("4677","1","34","2","content","Url adresa hotela 1","link_hotel_1","http://www.stadthotel-brunner.at","1","0","0"),
("4678","1","34","16","content","Url adresa hotela 2","link_hotel_2","https://www.falkensteiner.com/cs/hotel/schladming","1","0","0"),
("4679","1","34","17","content","Url adresa hotela 3","link_hotel_3","http://www.tirolerhof.co.at/","0","0","0"),
("4680","1","34","9","image","Druhá fotka modulu pre modul GALÉRIA","_menu_5_gallery_1","60","1","0","0"),
("4681","1","34","5","image","Fotka v hlavnom slideri 2","_menu_1_image_2","552","1","0","0"),
("4682","1","34","4","content","Po ukončení registrácie","field_word_koniec_registracie","<p>SOUTĚŽ BYLA UKONČENA DNE 30.11. 2016</p>\n\n<p>Slosov&aacute;n&iacute; bylo provedeno dne 05.12.2016 a z platn&yacute;ch registrac&iacute; byli vybr&aacute;ni 3 v&yacute;herci, dle pravidel soutěže.&nbsp;<br />\nDovolenkov&yacute; pobyt pro 2 osoby na 4 dny /3 noci v 3*** hotelu s polopenz&iacute;, včetně 2 skipasů,<br />\nv regionu SCHLADMING-DACHSTEIN, z&iacute;sk&aacute;vaj&iacute; :</p>\n\n<p><strong>Matej Chodniček, Ostrava, ČR<br />\nJana Cibulkov&aacute;, Nov&yacute; Přerov, ČR<br />\nPetra Matoskova, Praha, ČR</strong></p>\n\n<p>V&yacute;herci budou kontaktov&aacute;ni provozovatelem soutěže ohledně převzet&iacute; pobytov&yacute;ch voucherů v nejbliž&scaron;&iacute;ch dnech.&nbsp;<br />\nPobytov&eacute; vouchery jsou platn&eacute; v zimn&iacute; sezoně 20161/17 a nezahrnuj&iacute; dopravu.</p>\n\n<p><strong>V&Scaron;EM DĚKUJEME ZA &Uacute;ČAST A V&Yacute;HERCŮM SRDEČNE BLAHOPŘEJEME!</strong></p>\n\n<p><span style=\"font-size:11px\">Spr&aacute;vnost a platnost slosov&aacute;n&iacute; potvrzuj&iacute; provozovatel&eacute; soutěže:<br />\nSchladming-Dachstein Tourism Marketing, Ramsauerstra&szlig;e 756, A-8970 Schladming, Rakousko<br />\na spoluorganiz&aacute;tor soutěže: PONATURE s.r.o., Roh&aacute;čova 188/37, 130 00 Praha 3, Česk&aacute; republika</span></p>\n","1","0","0"),
("4683","1","34","11","content","Názov modulu pre modul O PARTNEROVI","_menu_name_8","Merida","1","3","0"),
("4684","1","34","15","content","Email partnera","info_partner_email","info@merida-bike.cz","1","0","0"),
("4685","1","34","15","content","Adresa partnera","info_partner_addr","Brněnská 1739 <br/> 664 51 Šlapanice","1","0","0"),
("4686","1","34","15","content","Názov partnera","info_partner_name","Merida Czech, s.r.o.","1","0","0"),
("4687","1","34","15","content","Telefónne číslo na partnera","info_partner_tel_c","+420 544 228 494","1","0","0"),
("4688","1","34","11","content","Text k modulu O PARTNEROVI 1","_menu_8_text_1","<p><span style=\"font-size:14px\">MORE PASSION. MORE BIKE.<br />\nV MERIDĚ směřujeme v&scaron;echno na&scaron;e &uacute;sil&iacute; k jednotliv&yacute;m detailům. Experti na&scaron;eho v&yacute;vojov&eacute;ho t&yacute;mu věnuj&iacute; detailům velkou pozornost. V&yacute;sledkem&nbsp;jsou kompletně nov&aacute; a sofistikovan&aacute; ře&scaron;en&iacute;, kter&aacute; se objevuj&iacute; v na&scaron;ich upraven&yacute;ch celoodpružen&yacute;ch MTB, v č&aacute;sti na&scaron;eho silničn&iacute;ho programu nebo v cel&eacute; rodině dětsk&yacute;ch juniorsk&yacute;ch kol.</span></p>\n\n<p><span style=\"font-size:14px\">MORE INNOVATION. MORE BIKE.<br />\nMy v MERIDĚ jsme přesvědčeni, že charakter kola by měl odpov&iacute;dat temperamentu jeho majitele. Proto vyr&aacute;b&iacute;me obrovsk&eacute; množstv&iacute; různ&yacute;ch kol, dař&iacute; se n&aacute;m vyv&iacute;jet nov&eacute; modely a posouv&aacute;me tak cyklistiku na vy&scaron;&scaron;&iacute; &uacute;roveň, nez&aacute;lež&iacute; na tom, zda se jedn&aacute; o hardtail nebo celoodpružen&eacute; kolo, silničn&iacute; či krosov&eacute;, fitness nebo dětsk&eacute; kolo.</span></p>\n\n<p><span style=\"font-size:14px\">MORE SUCCESS. MORE BIKE.<br />\nSnaha o &uacute;spěch ve sportu nen&iacute; pro MERIDU nič&iacute;m nov&yacute;m &ndash; pr&aacute;vě naopak. Začalo to dlouho před na&scaron;&iacute;m vstupem do UCI WorldTour s t&yacute;mem LAMPRE MERIDA. Zn&aacute;m&yacute; je tak&eacute; MULTIVAN MERIDA BIKING TEAM a jeho vědom&iacute;, že cesta na vrchol je otevřen&aacute; jen tehdy, když si svoji pr&aacute;ci skutečně už&iacute;v&aacute;te. U n&aacute;s v MERIDĚ se touto z&aacute;kladn&iacute; my&scaron;lenkou tak&eacute; ř&iacute;d&iacute;me.</span></p>\n","1","0","0"),
("4689","1","34","1","content","Jazyková mutácia pre Facebook","_language","cs_CZ","1","0","0"),
("4690","1","34","12","image","Newsletter 2 (PDF)","form_file_newsletter_2","68","0","0","0"),
("4691","1","34","4","content","Súhlasím s newslettrom 2","field_word_suhlas_news_2","News 2","0","0","0"),
("4692","1","34","18","content","Email hotelu 4","info_hotel_email_4","welcome@tirolerhof.co.at","0","0","0"),
("4693","1","34","18","content","Telefón do hotela 4","info_hotel_tel_c_4","+43(0)6542/772-0","0","0","0"),
("4694","1","34","18","content","Adresa Hotela 4","info_hotel_addr_4","Auerspergstrasse 5   <br/>   A - 5700 Zell am See","1","0","0"),
("4695","1","34","18","content","Názov hotelu 4","info_hotel_name_4","Hotel Tirolerhof ****S","0","0","0"),
("4696","1","34","18","image","Fotka loga k modulu UBYTOVANIE 4","_menu_7_image_1_4","","0","0","0"),
("4697","1","34","18","image","Fotka k modulu UBYTOVANIE 4","_menu_7_image_2_4","","1","0","0"),
("4698","1","34","18","content","Url adresa hotela 4","link_hotel_4","http://www.tirolerhof.co.at/","0","0","0"),
("4699","1","34","18","content","Text k modulu UBYTOVANIE 4","_menu_7_text_4","","0","0","0"),
("4700","1","34","11","image","Fotka k modulu O PARTNEROVI","_menu_8_image_1","531","1","0","0"),
("4701","1","34","1","content","Google Plus","social_google_plus","https://plus.google.com/112406614306736743833","1","0","0"),
("4702","1","34","12","content","Input Otázka","form_extend_v2_otazka","","0","0","0"),
("4703","1","34","13","content","Odoslať potvrdzovací email","sent_confirm_mail","1","1","0","0"),
("4704","1","34","12","content","Voliteľný parameter 1","form_base_custom_1","Místo Vašeho nákupu (zadejte město nebo název prodejce)","1","0","0"),
("4705","1","35","1","content","Template","layout","dnt_first","1","0","0"),
("4706","1","35","15","content","Link partnera","link_partner","http://www.evocsports.com","1","0","0"),
("4707","1","35","3","content","Link regionu","link_region","http://www.bikecity-innsbruck.com","1","0","0"),
("4708","1","35","1","content","Zobraziť na URL adrese","real_address","http://www.vyhrat.com/","1","0","0"),
("4709","1","35","1","content","Facebook","social_fb","https://de-de.facebook.com/evocsports","1","0","0"),
("4710","1","35","1","content","Twitter","social_twitter","https://twitter.com/evocsports","1","0","0"),
("4711","1","35","1","content","Instagram","social_linked_in","https://www.instagram.com/innsbrucktourism/","1","0","0"),
("4712","1","35","1","content","Mapa ","map_location","https://www.google.at/maps/place/Innsbruck/@47.2853697,11.2387036,11z/data=!3m1!4b1!4m5!3m4!1s0x479d6ecfe1f8ca73:0x9d201c7d281d9b0d!8m2!3d47.2692124!4d11.4041024","1","0","0"),
("4713","1","35","1","image","Favicon","favicon","57","1","0","0"),
("4714","1","35","1","content","Model farby R","_r","226","1","0","0"),
("4715","1","35","1","content","Model farby G","_g","0","1","0","0"),
("4716","1","35","1","content","Model farby B","_b","26","1","0","0"),
("4717","1","35","1","content","Font","_font","Lucida Sans Unicode","1","0","0"),
("4718","1","35","2","content","Názov hotelu 1","info_hotel_name_1","Landhaus Liesetal","0","0","0"),
("4719","1","35","2","content","Adresa Hotela 1","info_hotel_addr_1","Liesetal 9   <br/>  59969 Hallenberg-Liesen - DE","1","0","0"),
("4720","1","35","2","content","Telefón do hotela 1","info_hotel_tel_c_1","(02984) 9212-0","1","0","0"),
("4721","1","35","2","content","Email hotelu 1","info_hotel_email_1","info@haus-liesetal.de","1","0","0"),
("4722","1","35","3","content","Názov regiónu","info_region_name","Innsbruck Tourismus","1","0","0"),
("4723","1","35","3","content","Adresa regiónu","info_region_addr","Burggraben 3  <br/>  A - 6021 Innsbruck","1","0","0"),
("4724","1","35","3","content","Telefónne číslo regiónu","info_region_tel_c","+43 512 59850","1","0","0"),
("4725","1","35","3","content","Email regiónu","info_region_email","office@innsbruck.info","1","0","0"),
("4726","1","35","1","content","Youtube video","youtube_video","76SCMKdp4nw","1","0","0"),
("4727","1","35","15","image","Logo partnera","partner_logo","543","1","0","0"),
("4728","1","35","3","image","Logo regiónu","region_logo","535","1","0","0"),
("4729","1","35","5","image","Fotka v hlavnom slideri 1","_menu_1_image_1","540","1","0","0"),
("4730","1","35","7","image","Fotka modulu pre modul GALÉRIA","_menu_3_image_1","545","1","0","0"),
("4731","1","35","7","image","Druhá fotka modulu pre modul GALÉRIA","_menu_3_image_2","546","1","0","0"),
("4732","1","35","2","image","Fotka k modulu UBYTOVANIE","_menu_7_image_1_1","406","1","0","0"),
("4733","1","35","5","content","Názov modulu pre modul INFO","_menu_name_1","Intro","1","1","0"),
("4734","1","35","6","content","Názov modulu pre modul O SÚŤAŽI","_menu_name_2","Gewinnspiel","0","0","0"),
("4735","1","35","7","content","Názov modulu pre modul GALÉRIU","_menu_name_3","Galérie","0","0","0"),
("4736","1","35","8","content","Názov modulu pre modul FORMULÁRU","_menu_name_4","Teilnahme","1","2","0"),
("4737","1","35","9","content","Názov modulu pre modul O REGIONE","_menu_name_5","Innsbruck","1","3","0"),
("4738","1","35","10","content","Názov modulu pre modul MAPA","_menu_name_6","Mapa","0","0","0"),
("4739","1","35","11","content","Názov modulu pre modul UBYTOVANIE","_menu_name_7","Teilnehmende Hotels","0","0","0"),
("4740","1","35","5","content","Text k modulu INFO","_menu_1_text_1","<p><span style=\"color:#FFFFFF\"><strong><span style=\"font-size:20px\">Kommt mit Evoc zu Crankworx in die Bike City Innsbruck</span></strong></span></p>\n","1","0","0"),
("4741","1","35","6","content","Text k modulu O SÚŤAŽI","_menu_2_text_1","<p style=\"text-align:center\"><span style=\"color:#FFFFFF\"><span style=\"font-size:20px\"><strong>Gewinne 4 N&auml;chte f&uuml;r 2 Personen in der Bike City Innsbruck </strong><br />\n<strong>plus 2x&nbsp;EVOC Protector Backpacks&nbsp;und seid dabei<br />\nbeim Mountainbike-Freeride-Event des Jahres&nbsp; Crankworx!</strong></span></span></p>\n\n<p style=\"text-align:center\"><span style=\"font-size:18px\"><span style=\"color:#FFFFFF\">Einfach Teilnahmeformular ausf&uuml;llen, Frage richtig beantworten und ihr habt die Chance auf den tollen Event.<br />\n( Infos zur L&ouml;sung der Gewinnfrage gibt es unter: </span><a href=\"http://www.bikecity-innsbruck.com\" target=\"_blank\"><span style=\"color:#FFFFFF\">www.bikecity-innsbruck.com</span></a><span style=\"color:#FFFFFF\"> )</span></span></p>\n\n<p style=\"text-align:center\"><span style=\"color:#FFFFFF\"><span style=\"font-size:18px\"><strong>Gewinnspiel l&auml;uft ab 15. April 2017. Teilnahmeschluss ist der 15. Mai 2017.</strong></span></span></p>\n","1","0","0"),
("4742","1","35","7","content","Text k modulu GALÉRIA","_menu_3_text_1","","0","0","0"),
("4743","1","35","8","content","Text k modulu FORMULÁR","_menu_4_text_1","<p>Ihre Registrierung:&nbsp;</p>\n","1","0","0"),
("4744","1","35","9","content","Text k modulu O REGIÓNE","_menu_5_text_1","<p><strong>Bike City Innsbruck</strong><br />\nSpektakul&auml;re Trails, die Biker direkt von den beeindruckenden Bergen rings um Innsbruck in die Stadt bringen, der neue Bikepark Innsbruck mit Angeboten f&uuml;r alle Kenner- und K&ouml;nnerstufen und Crankworx, das gr&ouml;&szlig;te Mountainbike Gravity Festival der Welt, bei denen sich die lokale Bikerszene mit internationalen Stars trifft: Die Bike City Innsbruck wird ihrem Namen gerecht und begeistert Mountainbiker. Die Bike City bietet neben dem Bikepark Innsbruck noch weitere Trails: Nordketten Singletrail, Arzler Alm Trail, Hungerburg Trail und in Planung f&uuml;r 2017 sind weitere Trails in der Axamer Lizum.</p>\n\n<p>Mehr Informationen unter: <a href=\"http://www.bikecity-innsbruck.com\" target=\"_blank\">www.bikecity-innsbruck.com</a></p>\n","1","0","0"),
("4745","1","35","9","content","Ďalší text k modulu O REGIÓNE","_menu_5_text_2","<p><strong>Crankworx in Innsbruck</strong><br />\nCrankworx, das bedeutet <a href=\"https://www.youtube.com/watch?v=_P-ID4oHH68\" target=\"_blank\">&bdquo;Action pur&ldquo;</a> mit den besten Bikern der Welt, ein Rahmenprogramm mit Festivalcharakter und eine Expo-Area, auf der namhafte Aussteller die neuesten Produkte und Trends pr&auml;sentieren. 5 Bewerbe stehen auf dem Programm: Neben dem Downhillbewerb sind ein Slopestyle, ein Dual Speed &amp; Style Bewerb sowie ein Whip Off und ein Pumptrack-Contest geplant. F&uuml;r alle Besucher, die im Rahmen des Events Tirol als Bikedestination erstmals kennenlernen, gibt es organisierte Shuttles in weitere Bikespots: Bike Park Tirol in Steinach am Brenner, Elferlifte im Stubaital und sogar&nbsp; Bike Republic S&ouml;lden oder den Bikepark Serfaus-Fiss-Ladis.<br />\nMehr Informationen unter: <a href=\"http://www.crankworx.com/\" target=\"_blank\">www.crankworx.com</a>&nbsp;&nbsp;</p>\n","1","0","0"),
("4746","1","35","10","content","Text k modulu MAPA","_menu_6_text_1","<p>Mapa regionu</p>\n","0","0","0"),
("4747","1","35","2","content","Text k modulu UBYTOVANIE 1","_menu_7_text_1","<p><strong>Landhaus Liesetal</strong></p>\n\n<p>Das familiengef&uuml;hrte 3 Sterne <strong>Hotel Landhaus Liesetal</strong> hat f&uuml;r jeden Geschmack etwas zu bieten.</p>\n\n<p>Ob Wandern, Kultur, Nordic Walking oder Mountainbiking &ndash; direkt am Zuwanderweg Rothaarsteig, Sauerland H&ouml;henflug und Hallenberger Wanderrausch, zwischen Winterberg und Willingen gelegen, ist das Hotel der ideale Ausgangspunkt f&uuml;r die unterschiedlichsten Aktivit&auml;ten.</p>\n\n<p>Auch die Entspannung kommt im Landhaus nicht zu kurz: Einfach die Seele baumeln lassen - beim genie&szlig;en der regionalen K&uuml;che, in der Sauna oder bei vielf&auml;ltigen Wellnessmassagen.</p>\n\n<p>Mehr Infos unter:&nbsp;<a href=\"http://www.landhaus-liesetal.de\">www.landhaus-liesetal.de</a></p>\n","1","0","0"),
("4748","1","35","12","content","Input Meno","form_base_name","Vorname","1","0","0"),
("4749","1","35","12","content","Input Priezvisko","form_base_surname","Nachname","1","0","0"),
("4750","1","35","12","content","Input PSČ","form_base_psc","PLZ","1","0","0"),
("4751","1","35","12","content","Input Mesto","form_base_city","Ort/Stadt","1","0","0"),
("4752","1","35","12","content","Input Email","form_base_email","eMail","1","0","0"),
("4753","1","35","12","content","Input Doklad","form_extend_v1_doklad","","0","0","0"),
("4754","1","35","12","content","Input Otázka + odpovede","form_extend_v3_otazka","In welchem Bikepark findet Crankworx 2017 statt? ","0","0","0"),
("4755","1","35","12","content","Odpoveď A","form_extend_v3_odpoved_a","1","1","0","0"),
("4756","1","35","12","content","Odpoveď B","form_extend_v3_odpoved_b","2","0","0","0"),
("4757","1","35","12","content","Odpoveď C","form_extend_v3_odpoved_c","3","0","0","0");
INSERT INTO dnt_microsites_composer VALUES
("4758","1","35","4","content","Názov","field_word_nazov","Názov","0","0","0"),
("4759","1","35","4","content","Adresa","field_word_adresa","Adresa","0","0","0"),
("4760","1","35","4","content","Kontakt","field_word_kontakt","Kontakt","0","0","0"),
("4761","1","35","4","content","Web","field_word_web","Web","0","0","0"),
("4762","1","35","4","content","Hláška povinné pole","field_word_err","Pflichtfelder","1","0","0"),
("4763","1","35","4","content","Registrovať","field_word_sent","Teilnehmen","1","0","0"),
("4764","1","35","4","content","Predchádzajúca (fotka)","field_word_previous","Vorheriges","1","0","0"),
("4765","1","35","4","content","Ďalšia (fotka)","field_word_next","Nächstes","1","0","0"),
("4766","1","35","4","content","Súhlasím s newslettrom","field_word_suhlas_news","Ja, ich stimme zu, den Newsletter der Innsbruck Tourismus und von EVOC Sports zu erhalten und meine Daten für weitere Marketingaktivitäten zur Verfügung zu stellen.","1","0","0"),
("4767","1","35","4","content","Súhlasím s podmienkami súťaže","field_word_suhlas_podm","Ja, ich stimme den Teilnahmebedingungen zu. (Teilnahmebedingungen HIER).","1","0","0"),
("4768","1","35","1","content","Kľúčové slová pre Google","keywords","Gewinnspiel  Evoc Sports  Innsbruck Bike City","1","0","0"),
("4769","1","35","1","content","Popis pre Google","description","This competition has a first ID","1","0","0"),
("4770","1","35","4","content","Súhlasím s podmienkami súťaže","field_word_dakujeme","Danke, Sie haben sich erfolgreich für das Gewinnspiel registriert.","1","0","0"),
("4771","1","35","12","image","Podmienky súťaže (PDF)","form_file_podmienky","547","1","0","0"),
("4772","1","35","12","image","Newsletter (PDF)","form_file_newsletter","548","0","0","0"),
("4773","1","35","4","content","Hláška možnosti novej registrácie","field_word_nova_registracia","Jetzt Freunde einladen!","1","0","0"),
("4774","1","35","13","content","Počet znakov vygenerovaného hashu","_email_conf_char","8","1","0","0"),
("4775","1","35","13","content","Hláška, súťažiacemu ktorá mu príde na email po registracii.","_email_conf_sent_text","Danke, Sie haben sich erfolgreich für das Gewinnspiel registriert. Wir wünschen Ihnen viel Erfolg bei der Verlosung!","1","0","0"),
("4776","1","35","12","content","Telefónne číslo","form_base_tel_c","Tel. Nr.","1","0","0"),
("4777","1","35","4","content","Hláška za hviezdičkou o povinných poliach","field_word_povinne_polia","","1","0","0"),
("4778","1","35","2","image","Fotka loga k modulu UBYTOVANIE","_menu_7_image_2_1","407","0","0","0"),
("4779","1","35","16","content","Názov hotelu 2","info_hotel_name_2","Hotel Schneider","0","0","0"),
("4780","1","35","16","content","Adresa Hotela 2","info_hotel_addr_2","Am Waltenberg 58  <br/>   59955 Winterberg -  DE","1","0","0"),
("4781","1","35","16","content","Telefón do hotela 2","info_hotel_tel_c_2","(02981) 899738","1","0","0"),
("4782","1","35","16","content","Email hotelu 2","info_hotel_email_2","info@hotel-schneider-winterberg.de ","1","0","0"),
("4783","1","35","16","content","Text k modulu UBYTOVANIE 2","_menu_7_text_2","<p><strong>Hotel Schneider</strong></p>\n\n<p>Im <strong>Hotel Schneider</strong> ist f&uuml;r jeden etwas dabei.</p>\n\n<p>Gem&uuml;tliche und ger&auml;umige Zimmer laden zum Verweilen ein und auch sonst hat das Hotel viele Annehmlichkeiten zu bieten: Restaurant, Hotelbar, kostenloses WLAN, Kinderspielecke, Sitzgelegenheit an der Rezeption, Bio Sauna, Finnische Sauna, Solarium, Infrarotkabine, Massagesessel, Fitnessger&auml;te, Lift und Kaminecke.</p>\n\n<p>Das Hotel Schneider ist zentral aber tortzdem sehr ruhig gelegen. Das Zentrum von Winterberg mit seinen zahlreichen Freizeit- und Einkaufsm&ouml;glichkeiten ist zu Fu&szlig; erreichbar. Der Einstieg in das Skiliftkarussell Winterberg &nbsp;sowie der Erlebnisberg Kappe liegen ebenfalls in direkter Nachbarschaft.</p>\n\n<p>Mehr Infos unter:&nbsp;<a href=\"http://www.hotel-schneider-winterberg.de\">www.hotel-schneider-winterberg.de</a></p>\n","1","0","0"),
("4784","1","35","17","content","Text k modulu UBYTOVANIE 3","_menu_7_text_3","<p><strong>Dovolen&aacute; v Zell am See je dovolenou s požitkem - v hotelu Tirolerhof!</strong></p>\n\n<p>Jezero, hory, ledovec a stylov&yacute;, rodinn&yacute; 4-hvězdičkov&yacute; hotel superior v Zell am See &ndash; to je ide&aacute;ln&iacute; kombinace pro va&scaron;i dovolenou v Zell am See, v l&eacute;tě i v zimě. Budete m&iacute;t v&yacute;hled na jezero Zeller See, hory Schmittenh&ouml;he a Kitzsteinhorn se v&scaron;emi rozmanit&yacute;mi sportovn&iacute;mi a rekreačn&iacute;mi možnostmi a budete h&yacute;čk&aacute;ni v b&aacute;ječn&eacute;m a mimoř&aacute;dn&eacute;m hotelu kulin&aacute;řsk&yacute;mi specialitami nejvy&scaron;&scaron;&iacute; kvality. Nebo str&aacute;v&iacute;te dovolenou spojenou s golfem v Salcburku, kde budete m&iacute;t v&yacute;hled na n&aacute;dhern&eacute; hory a jezero oblasti Zell am See-Kaprun. Nebo si užijete ve dvou n&aacute;dhern&eacute; apartm&aacute;ny v r&aacute;mci romantick&eacute; dovolen&eacute;. Nebo si poř&aacute;dně odpočinete s wellness a l&aacute;zeňskou nab&iacute;dkou vy&scaron;&scaron;&iacute; tř&iacute;dy a načerp&aacute;te novou energii. Takto může vypadat va&scaron;e dal&scaron;&iacute; rekreačn&iacute; dovolen&aacute; v hotelu Tirolerhof Zell am See - v srdci Salcburku. Wellness hotel, čtyřhvězdičkov&yacute; hotel superior, hotel pro hosty s pejsky, relaxačn&iacute; hotel - v&scaron;echny tyto př&iacute;vlastky si hotel Tirolerhof plně zaslouž&iacute;.</p>\n\n<p>&nbsp;</p>\n\n<p><strong>Prožijte nezapomenutelnou dovolenou v hotelu Tirolerhof!</strong></p>\n","0","0","0"),
("4785","1","35","17","content","Email hotelu 3","info_hotel_email_3","welcome@tirolerhof.co.at","0","0","0"),
("4786","1","35","17","content","Telefón do hotela 3","info_hotel_tel_c_3","+43(0)6542/772-0","0","0","0"),
("4787","1","35","17","content","Adresa Hotela 3","info_hotel_addr_3","Auerspergstrasse 5   <br/>   A - 5700 Zell am See","0","0","0"),
("4788","1","35","17","content","Názov hotelu 3","info_hotel_name_3","Hotel Tirolerhof ****S","0","0","0"),
("4789","1","35","16","image","Fotka loga k modulu UBYTOVANIE 2","_menu_7_image_1_2","409","0","0","0"),
("4790","1","35","16","image","Fotka k modulu UBYTOVANIE 2","_menu_7_image_2_2","408","1","0","0"),
("4791","1","35","17","image","Fotka loga k modulu UBYTOVANIE 3","_menu_7_image_1_3","51","0","0","0"),
("4792","1","35","17","image","Fotka k modulu UBYTOVANIE 3","_menu_7_image_2_3","56","0","0","0"),
("4793","1","35","2","content","Url adresa hotela 1","link_hotel_1","http://www.landhaus-liesetal.de","1","0","0"),
("4794","1","35","16","content","Url adresa hotela 2","link_hotel_2","http://www.hotel-schneider-winterberg.de","1","0","0"),
("4795","1","35","17","content","Url adresa hotela 3","link_hotel_3","http://www.tirolerhof.co.at/","0","0","0"),
("4796","1","35","9","image","Druhá fotka modulu pre modul GALÉRIA","_menu_5_gallery_1","59","1","0","0"),
("4797","1","35","5","image","Fotka v hlavnom slideri 2","_menu_1_image_2","541","1","0","0"),
("4798","1","35","4","content","Po ukončení registrácie","field_word_koniec_registracie","<p><span style=\"color:#FF0000\"><span style=\"font-size:20px\"><strong><span style=\"font-family:arial,sans-serif\">Das&nbsp;</span>Gewinnspiel<span style=\"font-family:arial,sans-serif\">&nbsp;ist&nbsp;</span>bereits beendet<span style=\"font-family:arial,sans-serif\">!</span></strong></span></span></p>\n\n<p><span style=\"color:#FF0000\"><span style=\"font-size:20px\">Wir&nbsp;danken<span style=\"font-family:arial,sans-serif\">&nbsp;euch f&uuml;r die rege&nbsp;</span>Teilnahme<span style=\"font-family:arial,sans-serif\">!</span></span></span></p>\n\n<p><span style=\"font-size:18px\"><span style=\"color:#FF0000\"><span style=\"font-family:arial,sans-serif\">Unsere Gl&uuml;ckw&uuml;nsche an die folgenden&nbsp;</span>Gewinner<span style=\"font-family:arial,sans-serif\">:</span></span></span></p>\n","0","0","0"),
("4799","1","35","11","content","Názov modulu pre modul O PARTNEROVI","_menu_name_8","EVOC Sports","1","5","0"),
("4800","1","35","15","content","Email partnera","info_partner_email","info@evocsports.com","1","0","0"),
("4801","1","35","15","content","Adresa partnera","info_partner_addr","Tegernseer Landstr. 37a <br/>  DE - 81541 München","1","0","0"),
("4802","1","35","15","content","Názov partnera","info_partner_name","EVOC Sports GmbH","1","0","0"),
("4803","1","35","15","content","Telefónne číslo na partnera","info_partner_tel_c","+49 89 540 41 14 0","1","0","0"),
("4804","1","35","11","content","Text k modulu O PARTNEROVI 1","_menu_8_text_1","<p>&nbsp;</p>\n\n<p>In den letzten 15 Jahren haben wir &uuml;ber 40 L&auml;nder bereist. Mit dem Mountainbike oder Snowboard, immer auf der Suche nach den besten Trails und sch&ouml;nsten Powder-Abfahrten, f&uuml;r Magazine und Fotoshootings mit professionellen Fotografen.</p>\n\n<p>Mehr &uuml;ber EVOC Sports erfahren Sie&nbsp;<strong><a href=\"http://www.evocsports.com\" target=\"_blank\">HIER!</a></strong></p>\n","1","0","0"),
("4805","1","35","1","content","Jazyková mutácia pre Facebook","_language","de_DE","1","0","0"),
("4806","1","35","12","image","Newsletter 2 (PDF)","form_file_newsletter_2","549","0","0","0"),
("4807","1","35","4","content","Súhlasím s newslettrom 2","field_word_suhlas_news_2","News 2","0","0","0"),
("4808","1","35","18","content","Email hotelu 4","info_hotel_email_4","welcome@tirolerhof.co.at","0","0","0"),
("4809","1","35","18","content","Telefón do hotela 4","info_hotel_tel_c_4","+43(0)6542/772-0","0","0","0"),
("4810","1","35","18","content","Adresa Hotela 4","info_hotel_addr_4","Auerspergstrasse 5   <br/>   A - 5700 Zell am See","1","0","0"),
("4811","1","35","18","content","Názov hotelu 4","info_hotel_name_4","Hotel Tirolerhof ****S","0","0","0"),
("4812","1","35","18","image","Fotka loga k modulu UBYTOVANIE 4","_menu_7_image_1_4","","0","0","0"),
("4813","1","35","18","image","Fotka k modulu UBYTOVANIE 4","_menu_7_image_2_4","","1","0","0"),
("4814","1","35","18","content","Url adresa hotela 4","link_hotel_4","http://www.tirolerhof.co.at/","0","0","0"),
("4815","1","35","18","content","Text k modulu UBYTOVANIE 4","_menu_7_text_4","","0","0","0"),
("4816","1","35","11","image","Fotka k modulu O PARTNEROVI","_menu_8_image_1","542","1","0","0"),
("4817","1","35","1","content","Google Plus","social_google_plus","https://plus.google.com/107326173630410805118","1","0","0"),
("4818","1","35","12","content","Input Otázka","form_extend_v2_otazka","In welchem Bikepark findet Crankworx 2017 statt? ","1","0","0"),
("4819","1","35","13","content","Odoslať potvrdzovací email","sent_confirm_mail","1","1","0","0"),
("4820","1","35","12","content","Voliteľný parameter 1","form_base_custom_1","PLZ","0","0","0"),
("4821","1","36","1","content","Template","layout","dnt_first","1","0","0"),
("4822","1","36","15","content","Link partnera","link_partner","http://www.intersport.sk/","1","0","0"),
("4823","1","36","3","content","Link regionu","link_region","http://www.zellamsee-kaprun.com","1","0","0"),
("4824","1","36","1","content","Zobraziť na URL adrese","real_address","http://www.vyhrat.com/","1","0","0"),
("4825","1","36","1","content","Facebook","social_fb","https://www.facebook.com/INTERSPORT.SK/","1","0","0"),
("4826","1","36","1","content","Twitter","social_twitter","https://twitter.com/zellkaprun","1","0","0"),
("4827","1","36","1","content","Instagram","social_linked_in","https://www.instagram.com/zellamseekaprun/","1","0","0"),
("4828","1","36","1","content","Mapa ","map_location","https://www.google.sk/maps/place/Zell+am+See-Kaprun+Tourismus+GmbH/@47.3221006,12.7943083,17z/data=!3m1!4b1!4m2!3m1!1s0x47771cdf4f490061:0xba82c342ef002324","1","0","0"),
("4829","1","36","1","image","Favicon","favicon","57","1","0","0"),
("4830","1","36","1","content","Model farby R","_r","75","1","0","0"),
("4831","1","36","1","content","Model farby G","_g","115","1","0","0"),
("4832","1","36","1","content","Model farby B","_b","170","1","0","0"),
("4833","1","36","1","content","Font","_font","roboto","1","0","0"),
("4834","1","36","2","content","Názov hotelu 1","info_hotel_name_1","Hotel Tauernhof ****","0","0","0"),
("4835","1","36","2","content","Adresa Hotela 1","info_hotel_addr_1","Nikolaus Gassner Str. 9   <br/>   A - 5710 Kaprun","0","0","0"),
("4836","1","36","2","content","Telefón do hotela 1","info_hotel_tel_c_1","+43 6547 8235-0","0","0","0"),
("4837","1","36","2","content","Email hotelu 1","info_hotel_email_1","info@tauernhof-kaprun.at","0","0","0"),
("4838","1","36","3","content","Názov regiónu","info_region_name","Zell am See-Kaprun Tourismus","1","0","0"),
("4839","1","36","3","content","Adresa regiónu","info_region_addr","Brucker Bundesstr. 1a  <br/>  A-5700 Zell am See","1","0","0"),
("4840","1","36","3","content","Telefónne číslo regiónu","info_region_tel_c","+43 6542 770","1","0","0"),
("4841","1","36","3","content","Email regiónu","info_region_email","welcome@zellamsee-kaprun.com","1","0","0"),
("4842","1","36","1","content","Youtube video","youtube_video","U3WaV52UqDM","1","0","0"),
("4843","1","36","15","image","Logo partnera","partner_logo","370","1","0","0"),
("4844","1","36","3","image","Logo regiónu","region_logo","371","1","0","0"),
("4845","1","36","5","image","Fotka v hlavnom slideri 1","_menu_1_image_1","580","1","0","0"),
("4846","1","36","7","image","Fotka modulu pre modul GALÉRIA","_menu_3_image_1","557","1","0","0"),
("4847","1","36","7","image","Druhá fotka modulu pre modul GALÉRIA","_menu_3_image_2","558","1","0","0"),
("4848","1","36","2","image","Fotka k modulu UBYTOVANIE","_menu_7_image_1_1","376","0","0","0"),
("4849","1","36","5","content","Názov modulu pre modul INFO","_menu_name_1","Intro","1","1","0"),
("4850","1","36","6","content","Názov modulu pre modul O SÚŤAŽI","_menu_name_2","O súťaži","1","2","0"),
("4851","1","36","7","content","Názov modulu pre modul GALÉRIU","_menu_name_3","Galéria","0","0","0"),
("4852","1","36","8","content","Názov modulu pre modul FORMULÁRU","_menu_name_4","Registrácia","1","3","0"),
("4853","1","36","9","content","Názov modulu pre modul O REGIONE","_menu_name_5","Zell am See-Kaprun","1","4","0"),
("4854","1","36","10","content","Názov modulu pre modul MAPA","_menu_name_6","Mapa","0","0","0"),
("4855","1","36","11","content","Názov modulu pre modul UBYTOVANIE","_menu_name_7","Ubytovanie","1","5","0"),
("4856","1","36","5","content","Text k modulu INFO","_menu_1_text_1","<p><span style=\"color:#F0F8FF\"><span style=\"font-size:24px\">S&uacute;ťaž o rodinn&uacute; dovolenku v rak&uacute;skom Zell am See-Kaprun!</span></span></p>\n","1","0","0"),
("4857","1","36","6","content","Text k modulu O SÚŤAŽI","_menu_2_text_1","<h3>Nak&uacute;pte v predajniach INTERSPORT a vyhrajte jeden z 3 rodinn&yacute;ch pobytov v Zell am See-Kaprun!</h3>\n\n<p>Stač&iacute; ak&nbsp;počas doby trvania s&uacute;ťaže nak&uacute;pite&nbsp;v predajniach INTERSPORT v&nbsp;SR<strong> </strong>v&nbsp;hodnote nad 50 &euro; (v jednom n&aacute;kupe) a&nbsp;zaregistrujete svoj doklad o n&aacute;kupe v zmysle podmienok&nbsp;uveden&yacute;ch v pravidl&aacute;ch&nbsp;tejto s&uacute;ťaže.&nbsp;Do s&uacute;ťaže&nbsp;sa&nbsp;m&ocirc;žete zaregistrovať aj viackr&aacute;t a to vždy s nov&yacute;m č&iacute;slom pokladničn&eacute;ho dokladu. Opakovan&yacute;m&nbsp; n&aacute;kupom m&aacute;te&nbsp;v&auml;č&scaron;iu &scaron;ancu na v&yacute;hru.</p>\n\n<p>V&yacute;hry v s&uacute;ťaži : <strong>3x rodinn&yacute; pobyt (2 dospel&iacute;, 2 deti) na 4 dni / 3 noci&nbsp; v 4* hoteli Das Falkenstein s polopenziou, v regi&oacute;ne Zell am See-Kaprun.</strong></p>\n\n<p><strong>S&uacute;ťaž&nbsp;prebieha 18.04. - 31.05. 2017&nbsp;na &uacute;zem&iacute; SR. Žel&aacute;me&nbsp;V&aacute;m veľa &scaron;ťastia pri žrebovan&iacute;!</strong></p>\n","1","0","0");
INSERT INTO dnt_microsites_composer VALUES
("4858","1","36","7","content","Text k modulu GALÉRIA","_menu_3_text_1","","1","0","0"),
("4859","1","36","8","content","Text k modulu FORMULÁR","_menu_4_text_1","","1","0","0"),
("4860","1","36","9","content","Text k modulu O REGIÓNE","_menu_5_text_1","<p><strong>Dovolenka medzi ľadovcami, horami a jazerami bez kompromisov</strong><br />\nPrečo sa pre niečo rozhodovať, keď m&ocirc;žete mať v&scaron;etko? Zell am See-Kaprun v srdci rak&uacute;skych &Aacute;lp je pr&iacute;rodn&yacute; a doolenkov&yacute; raj par excellence: Tu sa sny st&aacute;vaj&uacute; skutočnosťou - pre turistov a horolezcov, rodiny a p&aacute;ry, cyklistov, milovn&iacute;kov adrenal&iacute;novej z&aacute;bavy aj milovn&iacute;kov pohody, vyznavačov j&oacute;gy a golfov&yacute;ch nad&scaron;encov. Kto oceňuje rozmanitosť, zamiluje si Zell am See-Kaprun.<br />\nZ večn&eacute;ho ľadu na Kitzsteinhorne je možn&eacute; presun&uacute;ť sa do trblietav&yacute;ch v&ocirc;d kři&scaron;t&aacute;lovo čist&eacute;ho jazera Zell, z osviežuj&uacute;ceho kaňona na z&aacute;žitkov&uacute; Schmittenh&ouml;he, zo &bdquo;Schmidolinovho krstu ohňom&quot; (&bdquo;Schmidolins Feuertaufe&ldquo;) k &bdquo;Zellskej jazernej m&aacute;gii&quot; (&bdquo;Zeller Seenzauber&ldquo;). V&scaron;etko je možn&eacute; a s letnou kartou &bdquo;Zell am See-Kaprun Sommerkarte&quot; zahrňuj&uacute;cu 40 atrakci&iacute; e&scaron;te omnoho viac: Ide len o to, urobiť spr&aacute;vne rozhodnutie.</p>\n\n<p><strong>Tipy pre rodiny</strong><br />\nDobrodružn&aacute; trasa &bdquo;Schmidolinov krst ohňom&quot; (&bdquo;Schmidolins Feuertaufe&ldquo;) bola roz&scaron;&iacute;ren&aacute; o jednu nov&uacute; atrakciu, a s&iacute;ce hern&uacute; vežu &bdquo;Schmidolins DragonFire&quot;. A tiež na Kitzsteinhorne je nov&eacute; dobrodružn&eacute; ihrisko pri centre Alpincenter. N&aacute;jdete tu takisto aj ľadovcov&yacute; deň&nbsp; &bdquo;Gletschertag Ice &amp; Snow&ldquo; pre rodiny s deťmi.</p>\n\n<p>Viac o regi&oacute;ne na:&nbsp;<strong><a href=\"http://www.zellamsee-kaprun.com\" target=\"_blank\">www.zellamsee-kaprun.com</a></strong></p>\n","1","0","0"),
("4861","1","36","9","content","Ďalší text k modulu O REGIÓNE","_menu_5_text_2","<p><strong>Odv&aacute;žiť sa urobiť niečo nov&eacute;, zažiť viac</strong><br />\n- Od začiatku j&uacute;la m&ocirc;žu horolezci v pr&iacute;pade z&aacute;ujmu dobyť Kitzsteinhorn zvl&aacute;&scaron;tnym sp&ocirc;sobom: Spolu s rangerom N&aacute;rodn&eacute;ho parku Hohe Tauern m&ocirc;žete vyraziť na v&yacute;stup &bdquo;Kitzsteinhorn Explorer Tour&quot; naprieč &scaron;tyrmi klimatick&yacute;mi z&oacute;nami, až na&nbsp;panoramatick&uacute;&nbsp;platformu&nbsp;&bdquo;Top of Salzburg&quot; vo v&yacute;&scaron;ke 3029 metrov n.m.<br />\n- Nezvyčajn&yacute; z&aacute;žitok pon&uacute;ka lezeck&aacute; trasa na stene vysokohorskej priehrady v Kaprune: Je to svetovo najvy&scaron;&scaron;ie umiestnen&aacute; lezeck&aacute; trasa na stene priehrady. V bl&iacute;zkom susedstve je lezeck&aacute; ar&eacute;na Hohenburg (&bdquo;Kletterarena H&ouml;henburg&ldquo;) s daľ&scaron;&iacute;mi trasami a možnosťami pre &scaron;portov&eacute; lezenie.<br />\n- J&oacute;dlovanie na kopci, j&oacute;ga a p&aacute;dlovanie na doske (Stand-up-Paddleboard) alebo stretnutie s bylink&aacute;rkami na Schmittenh&ouml;he: V Zell am See-Kaprun je počas letn&yacute;ch mesiacov mnoho&nbsp;pr&iacute;ležitost&iacute; pre vysk&uacute;&scaron;anie nov&yacute;ch vec&iacute;.</p>\n\n<p><strong>Top akcie počas leta 2017:</strong><br />\n- 16.5. až 15.10.2017 &ndash; M&aacute;gia Zellersk&eacute;ho jazera &bdquo;Zeller Seenzauber&ldquo;: vodn&aacute;, sveteln&aacute;, hudobn&aacute; a laserov&aacute; show sa kon&aacute; v priebehu troch večerov v t&yacute;ždni v parku Elisabethpark. Vstup je zdarma.<br />\n- &nbsp;D&aacute;mska Anita Women&acute;s Trail od 19.-21.5.2017<br />\n-&nbsp; J&uacute;l a august 2017 - &bdquo;Povestn&aacute; noc vody&quot;, každ&yacute; pondelok o 20:15, Sigmund-Thun-Klamm<br />\n-&nbsp; 27. augusta 2017 &ndash; Ironman 70.3<br />\n- &nbsp;Festival letn&yacute;ch noc&iacute; v Zell - každ&uacute; stredu v j&uacute;li a auguste od 19:00</p>\n","1","0","0"),
("4862","1","36","10","content","Text k modulu MAPA","_menu_6_text_1","<p>Mapa regionu</p>\n","1","0","0"),
("4863","1","36","2","content","Text k modulu UBYTOVANIE 1","_menu_7_text_1","<p><strong>Hotel Tauernhof ****&nbsp;<br />\nKde sa hostia st&aacute;vaj&uacute; priateľmi!</strong></p>\n\n<p>Prežite najkraj&scaron;ie dni v roku v Tauernhof v Kaprune. N&aacute;&scaron; tradičn&yacute; rodinn&yacute; 4* hotel v srdci regi&oacute;nu Salzburgsko lež&iacute; na pokojnom mieste, no napriek tomu m&aacute; top-polohu v &uacute;plnom centre strediska. Prav&aacute; rak&uacute;ska pohostinnosť, kvalitn&eacute; služby a nebesk&eacute; kulin&aacute;rske z&aacute;žitky vyčaria &uacute;smev na tv&aacute;ri každ&eacute;ho n&aacute;v&scaron;tevn&iacute;ka.<br />\nPo akt&iacute;vnom dni v stredisku Zell am See-Kaprun v&aacute;m na&scaron;a wellness o&aacute;za &quot;Tauernreich&quot; na viac ako 500 m2 pon&uacute;ka v&scaron;etko na uvoľnenie tela a povzbudenie mysle: od kryt&eacute;ho baz&eacute;na cez saunov&yacute; svet s panoramatickou a il&uacute;ziou odpočiv&aacute;rňou až po mas&aacute;že a kozmetick&eacute; proced&uacute;ry &ndash; wellness hotel v Kaprune V&aacute;m spln&iacute; každ&eacute; želanie!</p>\n","0","0","0"),
("4864","1","36","12","content","Input Meno","form_base_name","Meno","1","0","0"),
("4865","1","36","12","content","Input Priezvisko","form_base_surname","Priezvisko","1","0","0"),
("4866","1","36","12","content","Input PSČ","form_base_psc","PSČ","1","0","0"),
("4867","1","36","12","content","Input Mesto","form_base_city","Mesto","1","0","0"),
("4868","1","36","12","content","Input Email","form_base_email","Email","1","0","0"),
("4869","1","36","12","content","Input Doklad","form_extend_v1_doklad","Doklad o Vašom nákupe: (unikátne číslo účtenky)","1","0","0"),
("4870","1","36","12","content","Input otázka","form_extend_v2_otazka","Napíšte farbu vášho PC","0","0","0"),
("4871","1","36","12","content","Input Otázka + odpovede","form_extend_v3_otazka","Je toto modré?","0","0","0"),
("4872","1","36","12","content","Odpoveď A","form_extend_v3_odpoved_a","áno","0","0","0"),
("4873","1","36","12","content","Odpoveď B","form_extend_v3_odpoved_b","neviem","0","0","0"),
("4874","1","36","12","content","Odpoveď C","form_extend_v3_odpoved_c","možno","0","0","0"),
("4875","1","36","4","content","Názov","field_word_nazov","Názov","0","0","0"),
("4876","1","36","4","content","Adresa","field_word_adresa","Adresa","0","0","0"),
("4877","1","36","4","content","Kontakt","field_word_kontakt","Kontakt","0","0","0"),
("4878","1","36","4","content","Web","field_word_web","Web","0","0","0"),
("4879","1","36","4","content","Hláška povinné pole","field_word_err","Toto pole je povinné","1","0","0"),
("4880","1","36","4","content","Registrovať","field_word_sent","Registrovať","1","0","0"),
("4881","1","36","4","content","Predchádzajúca (fotka)","field_word_previous","Predchádzajúca","1","0","0"),
("4882","1","36","4","content","Ďalšia (fotka)","field_word_next","Ďaľšia","1","0","0"),
("4883","1","36","4","content","Súhlasím s newslettrom","field_word_suhlas_news","Mám záujem o zasielanie aktuálnych noviniek o regione Zell am See-Kaprun.","1","0","0"),
("4884","1","36","4","content","Súhlasím s podmienkami súťaže","field_word_suhlas_podm","Súhlasím s pravidlami súťaže (PRAVIDLÁ TU).","1","0","0"),
("4885","1","36","1","content","Kľúčové slová pre Google","keywords","súťaž Intersport Zell am See-Kaprun","1","0","0"),
("4886","1","36","1","content","Popis pre Google","description","This competition has a first ID","1","0","0"),
("4887","1","36","4","content","Súhlasím s podmienkami súťaže","field_word_dakujeme","Ďakujeme za Vašu registráciu a želáme Vám veľa šťastia v súťaži!","1","0","0"),
("4888","1","36","12","image","Podmienky súťaže (PDF)","form_file_podmienky","559","1","0","0"),
("4889","1","36","12","image","Newsletter (PDF)","form_file_newsletter","68","0","0","0"),
("4890","1","36","4","content","Hláška možnosti novej registrácie","field_word_nova_registracia","Pokiaľ máte ďaľší doklad o nákupe môžete prejsť k novej registrácii TU.","1","0","0"),
("4891","1","36","13","content","Počet znakov vygenerovaného hashu","_email_conf_char","8","1","0","0"),
("4892","1","36","13","content","Hláška, súťažiacemu ktorá mu príde na email po registracii.","_email_conf_sent_text","Ďakujeme za registráciu do súťaže a želáme Vám veľa šťastia pri žrebovaní!","1","0","0"),
("4893","1","36","12","content","Telefónne číslo","form_base_tel_c","Telefónne číslo","1","0","0"),
("4894","1","36","4","content","Hláška za hviezdičkou o povinných poliach","field_word_povinne_polia","Toto pole je povinné. ","1","0","0"),
("4895","1","36","2","image","Fotka loga k modulu UBYTOVANIE","_menu_7_image_2_1","377","0","0","0"),
("4896","1","36","16","content","Názov hotelu 2","info_hotel_name_2","Das Falkenstein ****","1","0","0"),
("4897","1","36","16","content","Adresa Hotela 2","info_hotel_addr_2","Nikolaus-Gassner-Str. 79   <br/>   A - 5710 Kaprun","1","0","0"),
("4898","1","36","16","content","Telefón do hotela 2","info_hotel_tel_c_2","+43 6547 7122","1","0","0"),
("4899","1","36","16","content","Email hotelu 2","info_hotel_email_2","sporthotel@falkenstein.at","1","0","0"),
("4900","1","36","16","content","Text k modulu UBYTOVANIE 2","_menu_7_text_2","<p><strong>Hotel Das Falkenstein****</strong><br />\nFalkenstein, ktor&yacute; sa nach&aacute;dza na &uacute;p&auml;t&iacute; Kitzsteinhornu, sp&aacute;ja rak&uacute;sku trad&iacute;ciu s modern&yacute;m životn&yacute;m &scaron;t&yacute;lom. Po dlhom dni str&aacute;venom v hor&aacute;ch, po n&aacute;ročnej t&uacute;re na horskom bicykli alebo v&yacute;lete na paraglide so &scaron;&eacute;fom hotela si m&ocirc;žete odpočin&uacute;ť vo vonkaj&scaron;ej saune, pri hodine j&oacute;gy alebo vo veľkorysom priestrannom wellness are&aacute;li. Z&aacute;soby energie m&ocirc;žete večer doplniť dom&aacute;cim chlebom, čerstv&yacute;mi jedlami s bylinkami z na&scaron;ej z&aacute;hrady, lahodn&yacute;mi steakami či rak&uacute;sk&yacute;mi dezertami.</p>\n\n<p><strong>Akt&iacute;vne. Prirodzene. Inak.</strong>&nbsp;Z&aacute;kladn&eacute; rysy hotela Falkenstein s v&yacute;hľadom na Kitzsteinhorn.<br />\nAkt&iacute;vne. Či už d&aacute;vate prednosť kľudnej&scaron;ej prech&aacute;dzke v hor&aacute;ch alebo n&aacute;ročnej jazde na bicykli. Akčnosť, dobrodružstv&aacute; a množstvo&nbsp;rekreačn&yacute;ch pr&iacute;ležitost&iacute;&nbsp;s&uacute; tu zaručen&eacute;.<br />\nPrirodzene. Tr&aacute;viť čas s rodinou alebo s priateľmi vonku. C&iacute;tiť pr&iacute;rodu. Zdieľať &uacute;žasn&yacute; z&aacute;žitok. Ponorte sa do h&ocirc;r a užite si pocit slobody.<br />\nInak. U n&aacute;s se budete c&iacute;tiť ako doma. Na&scaron;i hostia s&uacute; na&scaron;imi priateľmi. Ste srdečne pozvan&iacute; k &uacute;časti na na&scaron;om t&yacute;ždennom voľnočasovom programe, ktor&yacute; si kladie za cieľ zozn&aacute;miť na&scaron;ich host&iacute; s na&scaron;im regi&oacute;nom.</p>\n","1","0","0"),
("4901","1","36","17","content","Text k modulu UBYTOVANIE 3","_menu_7_text_3","<p><strong>Dovolen&aacute; v Zell am See je dovolenou s požitkem - v hotelu Tirolerhof!</strong></p>\n\n<p>Jezero, hory, ledovec a stylov&yacute;, rodinn&yacute; 4-hvězdičkov&yacute; hotel superior v Zell am See &ndash; to je ide&aacute;ln&iacute; kombinace pro va&scaron;i dovolenou v Zell am See, v l&eacute;tě i v zimě. Budete m&iacute;t v&yacute;hled na jezero Zeller See, hory Schmittenh&ouml;he a Kitzsteinhorn se v&scaron;emi rozmanit&yacute;mi sportovn&iacute;mi a rekreačn&iacute;mi možnostmi a budete h&yacute;čk&aacute;ni v b&aacute;ječn&eacute;m a mimoř&aacute;dn&eacute;m hotelu kulin&aacute;řsk&yacute;mi specialitami nejvy&scaron;&scaron;&iacute; kvality. Nebo str&aacute;v&iacute;te dovolenou spojenou s golfem v Salcburku, kde budete m&iacute;t v&yacute;hled na n&aacute;dhern&eacute; hory a jezero oblasti Zell am See-Kaprun. Nebo si užijete ve dvou n&aacute;dhern&eacute; apartm&aacute;ny v r&aacute;mci romantick&eacute; dovolen&eacute;. Nebo si poř&aacute;dně odpočinete s wellness a l&aacute;zeňskou nab&iacute;dkou vy&scaron;&scaron;&iacute; tř&iacute;dy a načerp&aacute;te novou energii. Takto může vypadat va&scaron;e dal&scaron;&iacute; rekreačn&iacute; dovolen&aacute; v hotelu Tirolerhof Zell am See - v srdci Salcburku. Wellness hotel, čtyřhvězdičkov&yacute; hotel superior, hotel pro hosty s pejsky, relaxačn&iacute; hotel - v&scaron;echny tyto př&iacute;vlastky si hotel Tirolerhof plně zaslouž&iacute;.</p>\n\n<p>&nbsp;</p>\n\n<p><strong>Prožijte nezapomenutelnou dovolenou v hotelu Tirolerhof!</strong></p>\n","0","0","0"),
("4902","1","36","17","content","Email hotelu 3","info_hotel_email_3","welcome@tirolerhof.co.at","0","0","0"),
("4903","1","36","17","content","Telefón do hotela 3","info_hotel_tel_c_3","+43(0)6542/772-0","0","0","0"),
("4904","1","36","17","content","Adresa Hotela 3","info_hotel_addr_3","Auerspergstrasse 5   <br/>   A - 5700 Zell am See","0","0","0"),
("4905","1","36","17","content","Názov hotelu 3","info_hotel_name_3","Hotel Tirolerhof ****S","0","0","0"),
("4906","1","36","16","image","Fotka loga k modulu UBYTOVANIE 2","_menu_7_image_1_2","560","1","0","0"),
("4907","1","36","16","image","Fotka k modulu UBYTOVANIE 2","_menu_7_image_2_2","65","0","0","0"),
("4908","1","36","17","image","Fotka loga k modulu UBYTOVANIE 3","_menu_7_image_1_3","51","0","0","0"),
("4909","1","36","17","image","Fotka k modulu UBYTOVANIE 3","_menu_7_image_2_3","56","0","0","0"),
("4910","1","36","2","content","Url adresa hotela 1","link_hotel_1","http://www.tauernhof-kaprun.at","0","0","0"),
("4911","1","36","16","content","Url adresa hotela 2","link_hotel_2","http://www.falkenstein.at","1","0","0"),
("4912","1","36","17","content","Url adresa hotela 3","link_hotel_3","http://www.tirolerhof.co.at/","0","0","0"),
("4913","1","36","9","image","Druhá fotka modulu pre modul GALÉRIA","_menu_5_gallery_1","61","1","0","0"),
("4914","1","36","5","image","Fotka v hlavnom slideri 2","_menu_1_image_2","556","1","0","0"),
("4915","1","36","4","content","Po ukončení registrácie","field_word_koniec_registracie","<p><span style=\"font-size:16px\">S&uacute;ťaž bola ukončen&aacute; 15.2.2017. Žrebovania prebehlo dňa 20.2.2017 podľa pravidiel s&uacute;ťaže.</span></p>\n\n<p><span style=\"font-size:16px\">1x rodinn&yacute; pobyt pre 4 osoby v rak&uacute;skom Zell am See-Kaprun, z&iacute;skava:</span></p>\n\n<p><strong><span style=\"font-size:16px\">Martina Ježikova , 91105 Trenč&iacute;n, SK</span></strong></p>\n\n<p><span style=\"font-size:16px\">1x pobyt pre 2 osoby v rak&uacute;skom Zell am See-Kaprun, z&iacute;skavaj&uacute;:</span></p>\n\n<p><strong><span style=\"font-size:16px\">Toma&scaron; Hazer,&nbsp; 05801 Poprad, SK</span></strong></p>\n\n<p><strong><span style=\"font-size:16px\">Jarmila Harangozoova, 93564 Kuralany, SK</span></strong></p>\n\n<p><strong><span style=\"font-size:16px\">Matej Valjent, 95801 Partiz&aacute;nske,&nbsp; SK&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></strong></p>\n\n<p><strong><span style=\"font-size:16px\">Vladimir Komenda, 85103 Bratislava,&nbsp; SK</span></strong></p>\n\n<p><span style=\"font-size:16px\">V&yacute;hern&eacute; poukazy bud&uacute; v&yacute;hercom odoslan&eacute; mailom resp. po&scaron;tou v najbliž&scaron;&iacute;ch dňoch! Pobyty s&uacute; mimo dopravy.</span></p>\n\n<p><span style=\"font-size:16px\"><strong>V&yacute;hercom blahožel&aacute;me a v&scaron;etk&yacute;m ostatn&yacute;m ďakujeme za &uacute;časť!</strong></span></p>\n\n<p>&nbsp;</p>\n\n<p><span style=\"font-size:14px\">Spr&aacute;vnosť a platnosť žrebovania potvrdzuj&uacute; organiz&iacute;tori s&uacute;ťaže:</span></p>\n\n<p><span style=\"font-size:14px\">Zell am See-Kaprun Tourismus GmbH, Brucker Bundesstr.1a, 5700 Zell am See, AT</span></p>\n\n<p><span style=\"font-size:14px\">a INTERSPORT SK s.r.o., Rožňavsk&aacute; 12, 821 04 Bratislava, SR</span></p>\n","0","0","0"),
("4916","1","36","11","content","Názov modulu pre modul O PARTNEROVI","_menu_name_8","O Partnerovi","0","0","0"),
("4917","1","36","15","content","Email partnera","info_partner_email","intersport@intersport.sk","1","0","0"),
("4918","1","36","15","content","Adresa partnera","info_partner_addr","Rožňavská 12 <br/> 82104 Bratislava","1","0","0"),
("4919","1","36","15","content","Názov partnera","info_partner_name","Intersport SK","1","0","0"),
("4920","1","36","15","content","Telefónne číslo na partnera","info_partner_tel_c","","0","0","0"),
("4921","1","36","11","content","Text k modulu O PARTNEROVI 1","_menu_8_text_1","<p>Pompo - největ&scaron;&iacute; maloobchodn&iacute; s&iacute;ť prodejen hraček a internetov&yacute; obchod s hračkami</p>\n","0","0","0"),
("4922","1","36","1","content","Jazyková mutácia pre Facebook","_language","sk_SK","1","0","0"),
("4923","1","36","12","image","Newsletter 2 (PDF)","form_file_newsletter_2","68","0","0","0"),
("4924","1","36","4","content","Súhlasím s newslettrom 2","field_word_suhlas_news_2","News 2","0","0","0"),
("4925","1","36","18","content","Email hotelu 4","info_hotel_email_4","welcome@tirolerhof.co.at","0","0","0"),
("4926","1","36","18","content","Telefón do hotela 4","info_hotel_tel_c_4","+43(0)6542/772-0","0","0","0"),
("4927","1","36","18","content","Adresa Hotela 4","info_hotel_addr_4","Auerspergstrasse 5   <br/>   A - 5700 Zell am See","1","0","0"),
("4928","1","36","18","content","Názov hotelu 4","info_hotel_name_4","Hotel Tirolerhof ****S","0","0","0"),
("4929","1","36","18","image","Fotka loga k modulu UBYTOVANIE 4","_menu_7_image_1_4","","0","0","0"),
("4930","1","36","18","image","Fotka k modulu UBYTOVANIE 4","_menu_7_image_2_4","","1","0","0"),
("4931","1","36","18","content","Url adresa hotela 4","link_hotel_4","http://www.tirolerhof.co.at/","0","0","0"),
("4932","1","36","18","content","Text k modulu UBYTOVANIE 4","_menu_7_text_4","","0","0","0"),
("4933","1","36","11","image","Fotka k modulu O PARTNEROVI","_menu_8_image_1","","0","0","0"),
("4934","1","36","1","content","Google Plus","social_google_plus","https://plus.google.com/+zellamseekaprun","1","0","0"),
("4935","1","36","12","content","Input Otázka","form_extend_v2_otazka","Napíšte farbu vášho PC","0","0","0"),
("4936","1","36","13","content","Odoslať potvrdzovací email","sent_confirm_mail","1","1","0","0"),
("4937","1","36","12","content","Voliteľný parameter 1","form_base_custom_1","Toto pole je voliteľné","0","0","0"),
("4938","1","37","1","content","Template","layout","dnt_first","1","0","0"),
("4939","1","37","15","content","Link partnera","link_partner","http://www.golfprofi.cz","1","0","0"),
("4940","1","37","3","content","Link regionu","link_region","http://www.schladming-dachstein.at","1","0","0"),
("4941","1","37","1","content","Zobraziť na URL adrese","real_address","http://www.vyhrat.com/","1","0","0"),
("4942","1","37","1","content","Facebook","social_fb","https://www.facebook.com/golfprofi.cz","1","0","0"),
("4943","1","37","1","content","Twitter","social_twitter","https://twitter.com/SchlaTourism","1","0","0"),
("4944","1","37","1","content","Instagram","social_linked_in","https://www.instagram.com/schladmingdachstein/","1","0","0"),
("4945","1","37","1","content","Mapa ","map_location","https://www.google.cz/maps/place/Schladming-Dachstein+Tourismusmarketing+GmbH/@47.4301562,13.5867908,12z/data=!4m8!1m2!2m1!1sSchladming-Dachstein+Tourismus!3m4!1s0x4771256a44c16259:0x22e482ea2c31ff12!8m2!3d47.396843!4d13.684136","1","0","0"),
("4946","1","37","1","image","Favicon","favicon","57","1","0","0"),
("4947","1","37","1","content","Model farby R","_r","175","1","0","0"),
("4948","1","37","1","content","Model farby G","_g","200","1","0","0"),
("4949","1","37","1","content","Model farby B","_b","20","1","0","0"),
("4950","1","37","1","content","Font","_font","Calibri","1","0","0"),
("4951","1","37","2","content","Názov hotelu 1","info_hotel_name_1","Stadthotel brunner","0","0","0"),
("4952","1","37","2","content","Adresa Hotela 1","info_hotel_addr_1","Hauptplatz 14   <br/>   A - 8970 Schladming","0","0","0"),
("4953","1","37","2","content","Telefón do hotela 1","info_hotel_tel_c_1","+43 (0) 3687 22513","0","0","0"),
("4954","1","37","2","content","Email hotelu 1","info_hotel_email_1","welcome@stadthotel-brunner.at","0","0","0"),
("4955","1","37","3","content","Názov regiónu","info_region_name","Schladming-Dachstein","1","0","0"),
("4956","1","37","3","content","Adresa regiónu","info_region_addr","Ramsauerstraße 756  <br/>  A-8970 Schladming","1","0","0"),
("4957","1","37","3","content","Telefónne číslo regiónu","info_region_tel_c","+43 3687 233 10","1","0","0");
INSERT INTO dnt_microsites_composer VALUES
("4958","1","37","3","content","Email regiónu","info_region_email","info@schladming-dachstein.at","1","0","0"),
("4959","1","37","1","content","Youtube video","youtube_video","KyIbL6DRX4k","1","0","0"),
("4960","1","37","15","image","Logo partnera","partner_logo","562","1","0","0"),
("4961","1","37","3","image","Logo regiónu","region_logo","561","1","0","0"),
("4962","1","37","5","image","Fotka v hlavnom slideri 1","_menu_1_image_1","563","1","0","0"),
("4963","1","37","7","image","Fotka modulu pre modul GALÉRIA","_menu_3_image_1","124","0","0","0"),
("4964","1","37","7","image","Druhá fotka modulu pre modul GALÉRIA","_menu_3_image_2","121","0","0","0"),
("4965","1","37","2","image","Fotka k modulu UBYTOVANIE","_menu_7_image_1_1","415","0","0","0"),
("4966","1","37","5","content","Názov modulu pre modul INFO","_menu_name_1","Intro","1","0","0"),
("4967","1","37","6","content","Názov modulu pre modul O SÚŤAŽI","_menu_name_2","O soutěži","0","0","0"),
("4968","1","37","7","content","Názov modulu pre modul GALÉRIU","_menu_name_3","Galérie","0","0","0"),
("4969","1","37","8","content","Názov modulu pre modul FORMULÁRU","_menu_name_4","Registrace","1","3","0"),
("4970","1","37","9","content","Názov modulu pre modul O REGIONE","_menu_name_5","Schladming-Dachstein","1","1","0"),
("4971","1","37","10","content","Názov modulu pre modul MAPA","_menu_name_6","Mapa","0","0","0"),
("4972","1","37","11","content","Názov modulu pre modul UBYTOVANIE","_menu_name_7","Partnerské hotely","1","2","0"),
("4973","1","37","5","content","Text k modulu INFO","_menu_1_text_1","<p><strong><span style=\"font-size:22px\">VYHRAJTE GOLFOV&Yacute; POBYT V RAKOUSK&Eacute;M SCHLADMING-DACHSTEIN!</span></strong></p>\n","1","0","0"),
("4974","1","37","6","content","Text k modulu O SÚŤAŽI","_menu_2_text_1","<p><span style=\"font-size:20px\"><strong>Nakupujete golfov&eacute; vybaven&iacute; v prodejn&aacute;ch GolfProfi nebo na eshopu <a href=\"http://www.golfprofi.cz/\" target=\"_blank\">www.golfprofi.cz</a>, odeb&iacute;r&aacute;te GolfProfi newsletter nebo jste členem věrnostn&iacute;ho programu <a href=\"http://www.golfprofi.cz/registrace-noveho-uzivatele.html\" target=\"_blank\">GolfProfi Premium Club</a>? </strong>Pak hrajte o skvěl&yacute; golfov&yacute; pobyt pro dva př&iacute;mo v Alp&aacute;ch v Schladming-Dachstein!</span></p>\n\n<p><span style=\"font-size:20px\"><strong>Soutěž prob&iacute;ha od 15.04. do 15.06.2017.</strong></span></p>\n\n<p><span style=\"font-size:20px\">Podm&iacute;nkou &uacute;časti v soutěži, pro neregistrovan&eacute; z&aacute;kazn&iacute;ky je n&aacute;kup v prodejn&aacute;ch nebo na eshopu GolfProfi, registrovan&iacute; z&aacute;kazn&iacute;ci se můžou z&uacute;častnit soutěže bez podm&iacute;nky n&aacute;kupu! Do soutěže se můžete zaregistrovat i v&iacute;cekr&aacute;t, pokud opakovaně nakoup&iacute;te v prodejn&aacute;ch nebo na eshopu GolfProfi.</span></p>\n\n<p><span style=\"font-size:20px\">V&yacute;hry v soutěži: <strong>2x luxusn&iacute; golfov&yacute; pobyt pro 2 osoby, na 4 dny / 3 noci s polopenz&iacute; v jednom z nejlep&scaron;&iacute;ch&nbsp;hotelů regionu, včetně greenfee, v regionu Schladming-Dachstein.</strong>&nbsp;Přejeme V&aacute;m hodně &scaron;těst&iacute; při slosov&aacute;n&iacute;!</span></p>\n","1","0","0"),
("4975","1","37","7","content","Text k modulu GALÉRIA","_menu_3_text_1","","1","0","0"),
("4976","1","37","8","content","Text k modulu FORMULÁR","_menu_4_text_1","","1","0","0"),
("4977","1","37","9","content","Text k modulu O REGIÓNE","_menu_5_text_1","<p><strong>Golfov&eacute; safari v regionu Schladming-Dachstein</strong></p>\n\n<p>Alpy =&gt; Rakousko =&gt; a uprostřed: čtyři top připraven&aacute; golfov&aacute; hři&scaron;tě v r&aacute;mci pouh&yacute;ch 50 kilometrů. Každ&eacute; z nich je v&yacute;jimečn&eacute;. Dohromady nab&iacute;z&iacute; ten nejdelik&aacute;tněj&scaron;&iacute; alpsk&yacute; golfov&yacute; z&aacute;žitek &ndash; v průzračn&eacute;m vzduchu a v obklopen&iacute; fantastickou kulisou hor. Tak&eacute; mimo greeny a fairwaye toho můžete hodně zaž&iacute;t. Letn&iacute; karta pln&aacute; v&yacute;hod Schladming-Dachstein Sommercard obsahuje v&iacute;ce než 100 atrakc&iacute;: od mimoř&aacute;dn&eacute;ho ledovce Dachstein až k baz&eacute;nu na vrcholku hory Riesneralm. Kartu z&iacute;sk&aacute;te ve v&iacute;ce než 25 partnersk&yacute;ch golfov&yacute;ch hotel&iacute;ch. Tam, kde se Va&scaron;i hostitel&eacute; postaraj&iacute; o perfektn&iacute; golfovou dovolenou &ndash; s poctivou m&iacute;stn&iacute; kuchyn&iacute; a srdečnou pohostinnost&iacute;.</p>\n\n<p>&nbsp;</p>\n\n<p><strong>GCC Dachstein-Tauern</strong><br />\n18jamkov&eacute; hři&scaron;tě, kter&eacute; je zasazeno do n&aacute;dhern&eacute; krajiny mezi obcemi Schladming a Haus im Ennstal, je považov&aacute;no za sportovn&iacute; v&yacute;zvu. Přesto umožn&iacute; zaž&iacute;t &uacute;spěch hr&aacute;čům v&scaron;ech handicapů. Hři&scaron;tě navrhla sama golfov&aacute; legenda Bernhard Langer a z&iacute;skalo pečeť kvality &bdquo;Leading Golf Courses Austria&ldquo;.</p>\n","1","0","0"),
("4978","1","37","9","content","Ďalší text k modulu O REGIÓNE","_menu_5_text_2","<p><strong>GCC Schloss Pichlarn</strong><br />\nL&aacute;zeňsk&yacute; a golfov&yacute; resort Schloss Pichlarn Spa &amp; Golf se sv&yacute;m idylick&yacute;m 18jamkov&yacute;m hři&scaron;těm řad&iacute; mezi nejkr&aacute;sněj&scaron;&iacute; resorty na světe. Are&aacute;l na &uacute;pat&iacute; impozantn&iacute; hory Grimmings se vyznačuje eleganc&iacute; a exkluzivitou. Hři&scaron;tě V&aacute;s okouzl&iacute; přirozenou strukturou s kopečky, &uacute;dol&iacute;mi a lesy.</p>\n\n<p><strong>GLC Ennstal-Wei&szlig;enbach</strong><br />\nDruhov&aacute; pestrost na golfov&eacute;m hři&scaron;ti! Golfov&eacute; hři&scaron;tě ve Wei&szlig;enbachu je jedin&eacute; v Evropě, kter&eacute; se nach&aacute;z&iacute; v chr&aacute;něn&eacute;m &uacute;zem&iacute; evropsk&eacute;ho v&yacute;znamu v r&aacute;mci soustavy Natura 2000. 18 jamek uprostřed Alp je lemov&aacute;no chr&aacute;něn&yacute;mi biotopy a habitaty, kter&eacute; poskytuj&iacute; domov vz&aacute;cn&yacute;m druhům zv&iacute;řat a rostlin.</p>\n\n<p><strong>GC Radstadtenbach</strong><br />\nPř&aacute;telskost, srdečnost a pohostinnost &ndash; tyto hodnoty zast&aacute;v&aacute; t&yacute;m golfov&eacute;ho hři&scaron;tě v Radstadtu. 18jamkov&eacute; hři&scaron;tě nab&iacute;z&iacute; n&aacute;dhern&eacute; v&yacute;hledy na okouzluj&iacute;c&iacute; vrcholky. Celosvětově jedinečn&yacute;m prvkem je gondolov&aacute; lanovka, kter&aacute; doprav&iacute; golfisty k 12. odpalu, odkud odehraj&iacute; m&iacute;ček do hloubky v&iacute;ce než 100 metrů.</p>\n\n<p><strong><a href=\"http://www.schladming-dachstein.at/cs/rekreacni-aktivity/leto/golf\">Golfov&yacute; z&aacute;žitek nejvy&scaron;&scaron;&iacute; kvality v srdci Rakouska</a>.</strong></p>\n","1","0","0"),
("4979","1","37","10","content","Text k modulu MAPA","_menu_6_text_1","<p>Mapa regionu</p>\n","0","0","0"),
("4980","1","37","2","content","Text k modulu UBYTOVANIE 1","_menu_7_text_1","<p><strong>Stadthotel brunner</strong></p>\n\n<p>&bdquo;Můj střed v centru&ldquo;. C&iacute;tit se blaze uprostřed stylov&eacute; modern&iacute; architektury a 500 let star&yacute;ch zd&iacute; v centru Schladmingu. Nechte se h&yacute;čkat ve Spa nad střechami Schladmingu, saunou, &aacute;jurv&eacute;dsk&yacute;mi i klasick&yacute;mi mas&aacute;žemi, čajovnou, lekc&iacute; j&oacute;gy a meditac&iacute;. V restauraci, kter&aacute; nab&iacute;z&iacute; rakouskou,&nbsp; &aacute;jurv&eacute;dskou kuchyni i z&aacute;sadit&eacute; (lehce straviteln&eacute;) pokrmy, budete doslova rozmazlov&aacute;ni. Hory prozkoum&aacute;te během pě&scaron;&iacute; t&uacute;ry nebo na vyj&iacute;žďce na horsk&eacute;m kole s na&scaron;&iacute;m hotelov&yacute;m průvodcem.</p>\n","0","0","0"),
("4981","1","37","12","content","Input Meno","form_base_name","Jméno","1","0","0"),
("4982","1","37","12","content","Input Priezvisko","form_base_surname","Příjmení","1","0","0"),
("4983","1","37","12","content","Input PSČ","form_base_psc","PSČ","1","0","0"),
("4984","1","37","12","content","Input Mesto","form_base_city","Město","1","0","0"),
("4985","1","37","12","content","Input Email","form_base_email","Email","1","0","0"),
("4986","1","37","12","content","Input Doklad","form_extend_v1_doklad","Váš doklad o nákupu v GolfProfi, nebo E-mail pod kterým jste registrováni v systému GolfProfi: (unikátní číslo účtenky z nákupu, nebo číslo objednávky z eshopu, registrovaným zákazníkům zde stačí uvést E-mail pod kterým jsou v systému GolfProfi).","1","0","0"),
("4987","1","37","12","content","Input Otázka + odpovede","form_extend_v3_otazka","Je toto modré?","0","0","0"),
("4988","1","37","12","content","Odpoveď A","form_extend_v3_odpoved_a","áno","0","0","0"),
("4989","1","37","12","content","Odpoveď B","form_extend_v3_odpoved_b","neviem","0","0","0"),
("4990","1","37","12","content","Odpoveď C","form_extend_v3_odpoved_c","možno","0","0","0"),
("4991","1","37","4","content","Názov","field_word_nazov","Názov","0","0","0"),
("4992","1","37","4","content","Adresa","field_word_adresa","Adresa","0","0","0"),
("4993","1","37","4","content","Kontakt","field_word_kontakt","Kontakt","0","0","0"),
("4994","1","37","4","content","Web","field_word_web","Web","0","0","0"),
("4995","1","37","4","content","Hláška povinné pole","field_word_err","Toto pole je povinné","1","0","0"),
("4996","1","37","4","content","Registrovať","field_word_sent","Registrovat","1","0","0"),
("4997","1","37","4","content","Predchádzajúca (fotka)","field_word_previous","Předchozí","1","0","0"),
("4998","1","37","4","content","Ďalšia (fotka)","field_word_next","Další","1","0","0"),
("4999","1","37","4","content","Súhlasím s newslettrom","field_word_suhlas_news","Mám zájem o zasílání aktuálních novinek z regionu Schladming- Dachstein.","1","0","0"),
("5000","1","37","4","content","Súhlasím s podmienkami súťaže","field_word_suhlas_podm","Souhlasím s pravidly soutěže (PRAVIDLA ZDE).","1","0","0"),
("5001","1","37","1","content","Kľúčové slová pre Google","keywords","soutěž Gofprofi Schladming Dachstein","1","0","0"),
("5002","1","37","1","content","Popis pre Google","description","This competition has a first ID","1","0","0"),
("5003","1","37","4","content","Súhlasím s podmienkami súťaže","field_word_dakujeme","Děkujeme za Vaši účast a přejeme Vám hodně štěstí v soutěži!","1","0","0"),
("5004","1","37","12","image","Podmienky súťaže (PDF)","form_file_podmienky","578","1","0","0"),
("5005","1","37","12","image","Newsletter (PDF)","form_file_newsletter","568","0","0","0"),
("5006","1","37","4","content","Hláška možnosti novej registrácie","field_word_nova_registracia","Pokud máte další doklad o nákupu můžete přejít k nové registraci ZDE.","1","0","0"),
("5007","1","37","13","content","Počet znakov vygenerovaného hashu","_email_conf_char","8","1","0","0"),
("5008","1","37","13","content","Hláška, súťažiacemu ktorá mu príde na email po registracii.","_email_conf_sent_text","Děkujeme za registraci do soutěže a přejeme Vám hodně štěstí při slosování! ","1","0","0"),
("5009","1","37","12","content","Telefónne číslo","form_base_tel_c","Telefonní číslo","1","0","0"),
("5010","1","37","4","content","Hláška za hviezdičkou o povinných poliach","field_word_povinne_polia","","1","0","0"),
("5011","1","37","2","image","Fotka loga k modulu UBYTOVANIE","_menu_7_image_2_1","416","0","0","0"),
("5012","1","37","16","content","Názov hotelu 2","info_hotel_name_2","Falkensteiner Hotel Schladming****s","1","0","0"),
("5013","1","37","16","content","Adresa Hotela 2","info_hotel_addr_2","Europaplatz 613   <br/>   A - 8970 Schladming","1","0","0"),
("5014","1","37","16","content","Telefón do hotela 2","info_hotel_tel_c_2","+43 (0) 3687 214-0","1","0","0"),
("5015","1","37","16","content","Email hotelu 2","info_hotel_email_2","reservations.schladming@falkensteiner.com","1","0","0"),
("5016","1","37","16","content","Text k modulu UBYTOVANIE 2","_menu_7_text_2","<p><strong>Falkensteiner Hotel Schladming</strong></p>\n\n<p>O př&iacute;jemnou atmosf&eacute;ru pro V&aacute;&scaron; odpočinek se postar&aacute; modern&iacute; architektura kombinovan&aacute; s m&iacute;stn&iacute;mi př&iacute;rodn&iacute;mi materi&aacute;ly, čerstv&aacute; &scaron;t&yacute;rsk&aacute; kuchyně a atraktivn&iacute; vodn&iacute; svět a wellness Acquapura Spa. Snov&aacute; centr&aacute;ln&iacute; poloha na okraji Schladmingu (5 minut pě&scaron;ky od n&aacute;měst&iacute;) mezi pohoř&iacute;m Schladmingsk&eacute; Taury a ledovcem Dachsteingletscher nab&iacute;z&iacute; ide&aacute;ln&iacute; v&yacute;choz&iacute; bod pro t&uacute;ry, na kter&yacute;ch můžete objevovat tajemstv&iacute; regionu Schladming-Dachstein. Buďte jako doma v nejlep&scaron;&iacute;m hotelu ve Schladmingu!<br />\nHotel nab&iacute;z&iacute; v&iacute;ce než 130 pokojů a wellness o rozloze 1.500 m2. Host&eacute; maj&iacute; z dispozici zdarma WLAN i parkovac&iacute; m&iacute;sta. Golfist&eacute; z&iacute;skaj&iacute; 20% slevu na green fee.</p>\n\n<p><a href=\"https://www.falkensteiner.com/cs/hotel/schladming?utm_source=portal&amp;utm_medium=image_text&amp;utm_campaign=20170415-20170615Schladmig_Dachstein_Golfgolfprofi.cz\" target=\"_blank\">Buďte jako doma v nejlep&scaron;&iacute;m hotelu ve Schladmingu!</a></p>\n\n<p>&nbsp;</p>\n","1","0","0"),
("5017","1","37","17","content","Text k modulu UBYTOVANIE 3","_menu_7_text_3","<p><strong>Romantik Hotel Schloss Pichlarn</strong></p>\n\n<p>Romantick&yacute; Hotel Schloss Pichlarn lež&iacute; na vyv&yacute;&scaron;enině v malebn&eacute;m &scaron;t&yacute;rsk&eacute;m městečku Ennstal a v&iacute;t&aacute; sv&eacute; hosty jako dokonal&eacute; m&iacute;sto pro načerp&aacute;n&iacute; sil pro zdrav&iacute;, golf nebo kulin&aacute;řsk&eacute; z&aacute;žitky. Hotel nab&iacute;z&iacute; v&iacute;ce než 96 nově zrenovovan&yacute;ch pokojů a suit. Host&eacute; si mohou pochutnat na kulin&aacute;řsk&yacute;ch lahůdk&aacute;ch v restaurac&iacute;ch a už&iacute;t si 18 jamek na př&iacute;rodn&iacute;m golfov&eacute;m hři&scaron;ti.<br />\nRomantick&yacute; hotel Schloss Pichlarn nab&iacute;z&iacute; wellness a spa o rozloze 4.500 m2 i prostor pro ajurv&eacute;du, kde si můžete v klidu odpočinou a načerpat nov&eacute; s&iacute;ly.</p>\n","1","0","0"),
("5018","1","37","17","content","Email hotelu 3","info_hotel_email_3","romantikhotel@schlosspichlarn.at","1","0","0"),
("5019","1","37","17","content","Telefón do hotela 3","info_hotel_tel_c_3","+43 (0) 3682 24 440-0","0","0","0"),
("5020","1","37","17","content","Adresa Hotela 3","info_hotel_addr_3","Zur Linde 1  <br/>   A - 8943 Aigen im Ennstal","1","0","0"),
("5021","1","37","17","content","Názov hotelu 3","info_hotel_name_3","Romantik Hotel Schloss Pichlarn","1","0","0"),
("5022","1","37","16","image","Fotka loga k modulu UBYTOVANIE 2","_menu_7_image_1_2","418","0","0","0"),
("5023","1","37","16","image","Fotka k modulu UBYTOVANIE 2","_menu_7_image_2_2","417","1","0","0"),
("5024","1","37","17","image","Fotka loga k modulu UBYTOVANIE 3","_menu_7_image_1_3","566","0","0","0"),
("5025","1","37","17","image","Fotka k modulu UBYTOVANIE 3","_menu_7_image_2_3","565","1","0","0"),
("5026","1","37","2","content","Url adresa hotela 1","link_hotel_1","http://www.stadthotel-brunner.at","0","0","0"),
("5027","1","37","16","content","Url adresa hotela 2","link_hotel_2","https://www.falkensteiner.com/cs/hotel/schladming","1","0","0"),
("5028","1","37","17","content","Url adresa hotela 3","link_hotel_3","http://www.schlosspichlarn.at","1","0","0"),
("5029","1","37","9","image","Druhá fotka modulu pre modul GALÉRIA","_menu_5_gallery_1","64","1","0","0"),
("5030","1","37","5","image","Fotka v hlavnom slideri 2","_menu_1_image_2","577","1","0","0"),
("5031","1","37","4","content","Po ukončení registrácie","field_word_koniec_registracie","<p>SOUTĚŽ BYLA UKONČENA DNE 30.11. 2016</p>\n\n<p>Slosov&aacute;n&iacute; bylo provedeno dne 05.12.2016 a z platn&yacute;ch registrac&iacute; byli vybr&aacute;ni 3 v&yacute;herci, dle pravidel soutěže.&nbsp;<br />\nDovolenkov&yacute; pobyt pro 2 osoby na 4 dny /3 noci v 3*** hotelu s polopenz&iacute;, včetně 2 skipasů,<br />\nv regionu SCHLADMING-DACHSTEIN, z&iacute;sk&aacute;vaj&iacute; :</p>\n\n<p><strong>Matej Chodniček, Ostrava, ČR<br />\nJana Cibulkov&aacute;, Nov&yacute; Přerov, ČR<br />\nPetra Matoskova, Praha, ČR</strong></p>\n\n<p>V&yacute;herci budou kontaktov&aacute;ni provozovatelem soutěže ohledně převzet&iacute; pobytov&yacute;ch voucherů v nejbliž&scaron;&iacute;ch dnech.&nbsp;<br />\nPobytov&eacute; vouchery jsou platn&eacute; v zimn&iacute; sezoně 20161/17 a nezahrnuj&iacute; dopravu.</p>\n\n<p><strong>V&Scaron;EM DĚKUJEME ZA &Uacute;ČAST A V&Yacute;HERCŮM SRDEČNE BLAHOPŘEJEME!</strong></p>\n\n<p><span style=\"font-size:11px\">Spr&aacute;vnost a platnost slosov&aacute;n&iacute; potvrzuj&iacute; provozovatel&eacute; soutěže:<br />\nSchladming-Dachstein Tourism Marketing, Ramsauerstra&szlig;e 756, A-8970 Schladming, Rakousko<br />\na spoluorganiz&aacute;tor soutěže: PONATURE s.r.o., Roh&aacute;čova 188/37, 130 00 Praha 3, Česk&aacute; republika</span></p>\n","1","0","0"),
("5032","1","37","11","content","Názov modulu pre modul O PARTNEROVI","_menu_name_8","Kilpi","0","0","0"),
("5033","1","37","15","content","Email partnera","info_partner_email","info@golfprofi.cz","1","0","0"),
("5034","1","37","15","content","Adresa partnera","info_partner_addr","Michelská 1552/58 <br/> 141 00 Praha 4","1","0","0"),
("5035","1","37","15","content","Názov partnera","info_partner_name","GolfProfi Store Praha","1","0","0"),
("5036","1","37","15","content","Telefónne číslo na partnera","info_partner_tel_c","+420 606 130 130","1","0","0"),
("5037","1","37","11","content","Text k modulu O PARTNEROVI 1","_menu_8_text_1","<p>KILPI - TESTOV&Aacute;NO SEVEREM A PROVĚŘENO LIDMI</p>\n\n<p>Outdoorov&eacute; oblečen&iacute; Kilpi je testovan&eacute; severem, jeho nespoutanost&iacute;, hrdost&iacute; a nekompromisn&iacute;mi n&aacute;roky země mytick&yacute;ch hrdinů. Pokud chcete zimu doopravdy prož&iacute;t, mus&iacute;te na ni b&yacute;t připraven&iacute;. Kilpi znamen&aacute; finsky &scaron;t&iacute;t. Tam, kde si př&iacute;roda i domy svou obranu už vybudovaly, potřebujete ji i vy. Spolehněte se na oblečen&iacute; a doplňky Kilpi. Budou va&scaron;&iacute;m &scaron;t&iacute;tem, d&iacute;ky kter&eacute;mu budete v bezpeč&iacute; a ochr&aacute;něni.</p>\n\n<p>V sortimentu Kilpi najdete kompletn&iacute; v&yacute;bavu pro zimu i l&eacute;to, doplňky i maličkosti. Obl&eacute;knete se do př&iacute;rody i do města, na sportov&aacute;n&iacute; i pro okamžiky odpočinku. Vybav&iacute;me v&aacute;s &uacute;čelov&yacute;mi a designov&yacute;mi bundami, skvěle padnouc&iacute;mi kalhotami, funkčn&iacute;m pr&aacute;dlem i stylov&yacute;mi tričky. A když mrazivou zimu vystř&iacute;d&aacute; žhav&eacute; l&eacute;to, vyt&aacute;hnete k vodě na&scaron;e plavky i dal&scaron;&iacute; letn&iacute; v&yacute;bavu.</p>\n","1","0","0"),
("5038","1","37","1","content","Jazyková mutácia pre Facebook","_language","cs_CZ","1","0","0"),
("5039","1","37","12","image","Newsletter 2 (PDF)","form_file_newsletter_2","68","0","0","0"),
("5040","1","37","4","content","Súhlasím s newslettrom 2","field_word_suhlas_news_2","News 2","0","0","0"),
("5041","1","37","18","content","Email hotelu 4","info_hotel_email_4","welcome@tirolerhof.co.at","0","0","0"),
("5042","1","37","18","content","Telefón do hotela 4","info_hotel_tel_c_4","+43(0)6542/772-0","0","0","0"),
("5043","1","37","18","content","Adresa Hotela 4","info_hotel_addr_4","Auerspergstrasse 5   <br/>   A - 5700 Zell am See","1","0","0"),
("5044","1","37","18","content","Názov hotelu 4","info_hotel_name_4","Hotel Tirolerhof ****S","0","0","0"),
("5045","1","37","18","image","Fotka loga k modulu UBYTOVANIE 4","_menu_7_image_1_4","","0","0","0"),
("5046","1","37","18","image","Fotka k modulu UBYTOVANIE 4","_menu_7_image_2_4","","1","0","0"),
("5047","1","37","18","content","Url adresa hotela 4","link_hotel_4","http://www.tirolerhof.co.at/","0","0","0"),
("5048","1","37","18","content","Text k modulu UBYTOVANIE 4","_menu_7_text_4","","0","0","0"),
("5049","1","37","11","image","Fotka k modulu O PARTNEROVI","_menu_8_image_1","","0","0","0"),
("5050","1","37","1","content","Google Plus","social_google_plus","https://plus.google.com/112406614306736743833","1","0","0"),
("5051","1","37","12","content","Input Otázka","form_extend_v2_otazka","","0","0","0"),
("5052","1","37","13","content","Odoslať potvrdzovací email","sent_confirm_mail","1","1","0","0"),
("5053","1","37","12","content","Voliteľný parameter 1","form_base_custom_1","Místo Vašeho nákupu (zadejte město)","0","0","0"),
("5054","1","38","1","content","Template","layout","dnt_first","1","0","0"),
("5055","1","38","15","content","Link partnera","link_partner","https://www.crosscafe.cz","1","0","0"),
("5056","1","38","3","content","Link regionu","link_region","http://www.salzburg.info/cs","1","0","0"),
("5057","1","38","1","content","Zobraziť na URL adrese","real_address","http://www.vyhrat.com/","1","0","0");
INSERT INTO dnt_microsites_composer VALUES
("5058","1","38","1","content","Facebook","social_fb","https://www.facebook.com/crosscafe","1","0","0"),
("5059","1","38","1","content","Twitter","social_twitter","https://twitter.com/salzburg_info","1","0","0"),
("5060","1","38","1","content","Instagram","social_linked_in","https://www.instagram.com/crosscafeoriginal/","1","0","0"),
("5061","1","38","1","content","Mapa ","map_location","https://www.google.cz/maps/place/Salzburg,+Rakousko/@47.802904,12.9863895,12z/data=!3m1!4b1!4m5!3m4!1s0x47769adda908d4b1:0xc1e183a1412af73d!8m2!3d47.80949!4d13.05501","1","0","0"),
("5062","1","38","1","image","Favicon","favicon","57","1","0","0"),
("5063","1","38","1","content","Model farby R","_r","150","1","0","0"),
("5064","1","38","1","content","Model farby G","_g","35","1","0","0"),
("5065","1","38","1","content","Model farby B","_b","50","1","0","0"),
("5066","1","38","1","content","Font","_font","Georgia","1","0","0"),
("5067","1","38","2","content","Názov hotelu 1","info_hotel_name_1","Familotel - amiamo","0","0","0"),
("5068","1","38","2","content","Adresa Hotela 1","info_hotel_addr_1","Salzachtal Bundesstrasse 20   <br/>   A - 5700 Zell am See","1","0","0"),
("5069","1","38","2","content","Telefón do hotela 1","info_hotel_tel_c_1","+43 6542 55355","1","0","0"),
("5070","1","38","2","content","Email hotelu 1","info_hotel_email_1","hotel@amiamo.at","1","0","0"),
("5071","1","38","3","content","Názov regiónu","info_region_name","TSG Tourismus Salzburg GmbH","1","0","0"),
("5072","1","38","3","content","Adresa regiónu","info_region_addr","Auerspergstraße 6  <br/>  A-5020 Salzburg","1","0","0"),
("5073","1","38","3","content","Telefónne číslo regiónu","info_region_tel_c","+43 662 88987 0","1","0","0"),
("5074","1","38","3","content","Email regiónu","info_region_email","tourist@salzburg.info","1","0","0"),
("5075","1","38","1","content","Youtube video","youtube_video","3Jff34rxECY","1","0","0"),
("5076","1","38","15","image","Logo partnera","partner_logo","284","1","0","0"),
("5077","1","38","3","image","Logo regiónu","region_logo","276","1","0","0"),
("5078","1","38","5","image","Fotka v hlavnom slideri 1","_menu_1_image_1","569","1","0","0"),
("5079","1","38","7","image","Fotka modulu pre modul GALÉRIA","_menu_3_image_1","571","1","0","0"),
("5080","1","38","7","image","Druhá fotka modulu pre modul GALÉRIA","_menu_3_image_2","572","1","0","0"),
("5081","1","38","2","image","Fotka k modulu UBYTOVANIE","_menu_7_image_1_1","272","1","0","0"),
("5082","1","38","5","content","Názov modulu pre modul INFO","_menu_name_1","Intro","1","1","0"),
("5083","1","38","6","content","Názov modulu pre modul O SÚŤAŽI","_menu_name_2","O soutěži","0","0","0"),
("5084","1","38","7","content","Názov modulu pre modul GALÉRIU","_menu_name_3","Galérie","0","0","0"),
("5085","1","38","8","content","Názov modulu pre modul FORMULÁRU","_menu_name_4","Registrace","1","3","0"),
("5086","1","38","9","content","Názov modulu pre modul O REGIONE","_menu_name_5","Salzburg","1","2","0"),
("5087","1","38","10","content","Názov modulu pre modul MAPA","_menu_name_6","Mapa","0","0","0"),
("5088","1","38","11","content","Názov modulu pre modul UBYTOVANIE","_menu_name_7","Ubytování","0","0","0"),
("5089","1","38","5","content","Text k modulu INFO","_menu_1_text_1","<p><strong><span style=\"font-size:24px\"><span style=\"color:#FFFFFF\">Vyhrajte s CROSSCAFE jeden ze 3 v&iacute;kendů v SALZBURGU!</span></span></strong></p>\n","1","0","0"),
("5090","1","38","6","content","Text k modulu O SÚŤAŽI","_menu_2_text_1","<p><span style=\"font-size:18px\"><strong>Za V&aacute;&scaron; n&aacute;kup v CrossCafe&nbsp;se z&aacute;kaznickou kartou CrossCard můžete vyhr&aacute;t jeden ze 3 pobytů pro dva&nbsp;v Salzburgu!</strong></span></p>\n\n<p>Nakupte&nbsp;v obdob&iacute; 1.5. - 31.5.&nbsp;2017&nbsp;v kav&aacute;rn&aacute;ch <a href=\"https://www.crosscafe.cz/kavarny/\" target=\"_blank\">CrossCafe</a>&nbsp;se z&aacute;kaznickou kartou CrossCard&nbsp;a&nbsp;zaregistrujete online svůj doklad o n&aacute;kupu dle podm&iacute;nek uveden&yacute;ch v pravidlech soutěže.&nbsp;Do soutěže se můžete zaregistrovat i v&iacute;cekr&aacute;t, pokud opakovaně nakoup&iacute;te v s&iacute;ti CrossCafe.<br />\nPokud je&scaron;tě nejste členem klubu, můžete si zaž&aacute;dat o kartu CrossCard na nejbliž&scaron;&iacute; kav&aacute;rně a aktivovat ji zde: <a href=\"https://crosskonto.crosscafe.cz/login/\" target=\"_blank\">CrossKonto</a></p>\n\n<p>V&yacute;hry v soutěži:&nbsp;<strong>3x pobyt pro 2 osoby na &nbsp;3 dny / 2 noci ve 3-4* hotelu, včetně sn&iacute;daně a 3-denn&iacute;&nbsp;karty v&yacute;hod&nbsp;<a href=\"http://www.salzburg.info/cs/sights/kartou_salcburku\" target=\"_blank\">SalzburgCard</a></strong></p>\n\n<p><strong>Soutěž prob&iacute;h&aacute; 1.5. - 31.5.&nbsp;2017&nbsp;na &uacute;zem&iacute; ČR. Přejeme V&aacute;m hodně &scaron;těst&iacute; při slosov&aacute;n&iacute;!</strong></p>\n","1","0","0"),
("5091","1","38","7","content","Text k modulu GALÉRIA","_menu_3_text_1","<p>Krasna Galeria!</p>\n","0","0","0"),
("5092","1","38","8","content","Text k modulu FORMULÁR","_menu_4_text_1","","1","0","0"),
("5093","1","38","9","content","Text k modulu O REGIÓNE","_menu_5_text_1","<p><strong>Salzburg - Jevi&scaron;tě světa</strong></p>\n\n<p>Jako rodi&scaron;tě a působi&scaron;tě Wolfganga Amadea Mozarta a jako ději&scaron;tě Salzbursk&eacute;ho festivalu je Salzburg světově proslul&yacute;. Pod&iacute;v&aacute;te-li se bl&iacute;že, objev&iacute;te dokonalou harmonii př&iacute;rody a architektury zasazen&eacute; v n&aacute;dhern&eacute;m panoramatu okoln&iacute;ch hor a jezer. Z&aacute;mek Mirabell a okoln&iacute; zahrada nab&iacute;zej&iacute; ohromuj&iacute;c&iacute; pohlednicov&yacute; v&yacute;hled na symbol Salzburgu, mohutnou pevnost Hohensalzburg z 11. stolet&iacute;, trůn&iacute;c&iacute; majest&aacute;tně nad Muzeem moderny na M&ouml;nchsbergu. Srdcem Star&eacute;ho města je středověk&aacute; Getreidegasse, kde se narodil nejslavněj&scaron;&iacute; syn Salzburgu, W.A. Mozart.</p>\n\n<p>V&iacute;ce o Salzburgu:&nbsp;<a href=\"http://www.salzburg.info/cs\" style=\"box-sizing: border-box; background-color: transparent; color: rgb(230, 120, 23); text-decoration-line: none; transition: all 0.35s;\" target=\"_blank\"><span style=\"color:#800000\">www.salzburg.info</span></a></p>\n","1","0","0"),
("5094","1","38","9","content","Ďalší text k modulu O REGIÓNE","_menu_5_text_2","<p>Lid&eacute; se zde r&aacute;di setk&aacute;vaj&iacute; v tradičn&iacute;ch kav&aacute;rn&aacute;ch, u &bdquo;Melange&ldquo; (k&aacute;va s na&scaron;lehan&yacute;m ml&eacute;kem) nebo &bdquo;Gro&szlig;er Brauner&ldquo; (dvojit&eacute; espresso) v kav&aacute;rně Tomaselli, nejstar&scaron;&iacute; kav&aacute;rně Rakouska, nebo hned naproti v kav&aacute;rně F&uuml;rst, kde můžete ochutnat origin&aacute;ln&iacute; Mozartovy koule, kter&eacute; zde dodnes ručně vyr&aacute;b&iacute; pravnuk jejich vyn&aacute;lezce. Večer si pak můžete vychutnat v nejstar&scaron;&iacute;m restaurantu ve středn&iacute; Evropě, v Kl&aacute;&scaron;tern&iacute;m sklepě Sv. Petra, a nejl&eacute;pe při Mozartovsk&eacute; večeři. Kdo to m&aacute; raději trochu moderněj&scaron;&iacute;, určitě by neměl vynechat Red Bull Hangar 7. Hang&aacute;r č. 7, synonymum avantgardn&iacute; architektury, modern&iacute;ho uměn&iacute; a &scaron;pičkov&eacute; gastronomie.</p>\n\n<p>Salzburg Card - nejdůležitěj&scaron;&iacute; karta v&yacute;hod pro va&scaron;i n&aacute;v&scaron;těvu Salzburgu.<br />\nV&iacute;ce o&nbsp;<a href=\"http://www.salzburg.info/cs/sights/kartou_salcburku\" style=\"box-sizing: border-box; background-color: transparent; color: rgb(230, 120, 23); text-decoration-line: none; transition: all 0.35s;\" target=\"_blank\"><span style=\"color:#800000\">Salzburg Card</span></a></p>\n","1","0","0"),
("5095","1","38","10","content","Text k modulu MAPA","_menu_6_text_1","<p>Mapa regionu</p>\n","1","0","0"),
("5096","1","38","2","content","Text k modulu UBYTOVANIE 1","_menu_7_text_1","<p><strong>amiamo - Familotel Zell am See</strong></p>\n\n<p>Jako prvn&iacute; boutique hotel pro rodiny&nbsp;s dětmi jsme stanovili standardy pro&nbsp;v&yacute;jimečn&eacute; z&aacute;žitky z dovolen&eacute;: mal&yacute;,&nbsp;vybran&yacute; a individu&aacute;ln&iacute;, vyznamenan&yacute;&nbsp;nejvy&scaron;&scaron;&iacute; pečet&iacute; jakosti Q III. Luxusn&iacute;&nbsp;penzion Amiamo v kombinaci s&nbsp;kartou Zell am See-Kaprun zaručuje&nbsp;odpočinkovou, ale i vzru&scaron;uj&iacute;c&iacute;&nbsp;dovolenou pro celou rodinu. S v&iacute;ce&nbsp;než 20-ti letou zku&scaron;enost&iacute; nab&iacute;z&iacute;me&nbsp;<br />\nhl&iacute;d&aacute;n&iacute; dět&iacute; v vnitřn&iacute; sekci o plo&scaron;e&nbsp;500 m&sup2; s velk&yacute;m množstv&iacute;m aktivit.&nbsp;</p>\n\n<p>NOVINKA:&nbsp;Sekce Wellness o plo&scaron;e 300 m&sup2;&nbsp;disponuje 3 baz&eacute;ny, Babynariem&nbsp;a kompletně zrekonstruovanou&nbsp;sekc&iacute; saun&nbsp;s relaxačn&iacute; m&iacute;stnost&iacute;.&nbsp;</p>\n\n<p>Na jezeře Zeller&nbsp;See&nbsp;V&aacute;s&nbsp;oček&aacute;v&aacute;&nbsp;hotelov&aacute; pl&aacute;ž s bohatou nab&iacute;dkou!</p>\n","1","0","0"),
("5097","1","38","12","content","Input Meno","form_base_name","Jméno","1","0","0"),
("5098","1","38","12","content","Input Priezvisko","form_base_surname","Příjmení","1","0","0"),
("5099","1","38","12","content","Input PSČ","form_base_psc","PSČ","1","0","0"),
("5100","1","38","12","content","Input Mesto","form_base_city","Město","1","0","0"),
("5101","1","38","12","content","Input Email","form_base_email","Email","1","0","0"),
("5102","1","38","12","content","Input Doklad","form_extend_v1_doklad","Doklad o Vašem nákupu: (unikátní číslo účtenky)","1","0","0"),
("5103","1","38","12","content","Input Otázka + odpovede","form_extend_v3_otazka","Je toto modré?","0","0","0"),
("5104","1","38","12","content","Odpoveď A","form_extend_v3_odpoved_a","áno","0","0","0"),
("5105","1","38","12","content","Odpoveď B","form_extend_v3_odpoved_b","neviem","0","0","0"),
("5106","1","38","12","content","Odpoveď C","form_extend_v3_odpoved_c","možno","0","0","0"),
("5107","1","38","4","content","Názov","field_word_nazov","Názov","0","0","0"),
("5108","1","38","4","content","Adresa","field_word_adresa","Adresa","0","0","0"),
("5109","1","38","4","content","Kontakt","field_word_kontakt","Kontakt","0","0","0"),
("5110","1","38","4","content","Web","field_word_web","Web","0","0","0"),
("5111","1","38","4","content","Hláška povinné pole","field_word_err","Toto pole je povinné","1","0","0"),
("5112","1","38","4","content","Registrovať","field_word_sent","Registrovat","1","0","0"),
("5113","1","38","4","content","Predchádzajúca (fotka)","field_word_previous","Predchádzajúca","1","0","0"),
("5114","1","38","4","content","Ďalšia (fotka)","field_word_next","Ďalšia","1","0","0"),
("5115","1","38","4","content","Súhlasím s newslettrom","field_word_suhlas_news","Mám zájem o zasílání aktuálních novinek o Salzburgu.","1","0","0"),
("5116","1","38","4","content","Súhlasím s podmienkami súťaže","field_word_suhlas_podm","Souhlasím s pravidly soutěže (PRAVIDLA ZDE).","1","0","0"),
("5117","1","38","1","content","Kľúčové slová pre Google","keywords","soutěž Crosscafe Salzburg","1","0","0"),
("5118","1","38","1","content","Popis pre Google","description","This competition has a first ID","1","0","0"),
("5119","1","38","4","content","Súhlasím s podmienkami súťaže","field_word_dakujeme","Děkujeme za Vaši účast a přejeme Vám hodně štěstí v soutěži!","1","0","0"),
("5120","1","38","12","image","Podmienky súťaže (PDF)","form_file_podmienky","573","1","0","0"),
("5121","1","38","12","image","Newsletter (PDF)","form_file_newsletter","574","0","0","0"),
("5122","1","38","4","content","Hláška možnosti novej registrácie","field_word_nova_registracia","Pokud máte další doklad o nákupu můžete přejít k nové registraci ZDE.","1","0","0"),
("5123","1","38","13","content","Počet znakov vygenerovaného hashu","_email_conf_char","8","1","0","0"),
("5124","1","38","13","content","Hláška, súťažiacemu ktorá mu príde na email po registracii.","_email_conf_sent_text","Děkujeme za registraci do soutěže a přejeme Vám hodně štěstí při slosování! ","1","0","0"),
("5125","1","38","12","content","Telefónne číslo","form_base_tel_c","Telefónne číslo","0","0","0"),
("5126","1","38","4","content","Hláška za hviezdičkou o povinných poliach","field_word_povinne_polia","","1","0","0"),
("5127","1","38","2","image","Fotka loga k modulu UBYTOVANIE","_menu_7_image_2_1","59","1","0","0"),
("5128","1","38","16","content","Názov hotelu 2","info_hotel_name_2","Sporthotel Falkenstein","0","0","0"),
("5129","1","38","16","content","Adresa Hotela 2","info_hotel_addr_2","Nikolaus-Gassner-Str. 79   <br/>   A - 5710 Kaprun","1","0","0"),
("5130","1","38","16","content","Telefón do hotela 2","info_hotel_tel_c_2","+43 6547 7122","1","0","0"),
("5131","1","38","16","content","Email hotelu 2","info_hotel_email_2","sporthotel@falkenstein.at","1","0","0"),
("5132","1","38","16","content","Text k modulu UBYTOVANIE 2","_menu_7_text_2","<p><strong>Das Falkenstein</strong></p>\n\n<p>Tady v Kaprunu a hotelu Falkenstein lze objevit spoustu vzru&scaron;uj&iacute;c&iacute;ch možnost&iacute; a z&aacute;bavy&nbsp;pro rodiny a děti. Každ&yacute; den může b&yacute;t spojen s nov&yacute;mi z&aacute;žitky a dojmy, ať už jde&nbsp;o zvl&aacute;&scaron;tn&iacute; rodinn&eacute; turistick&eacute; v&yacute;lety, čvacht&aacute;n&iacute; a klouz&aacute;n&iacute; v Tauern SPA Kaprun, v&yacute;let&nbsp;k alpsk&eacute; horsk&eacute; bobov&eacute; dr&aacute;ze &quot;Maisfiltzer&quot;, o n&aacute;v&scaron;těvu volnočasov&eacute;ho nebo n&aacute;rodn&iacute;ho&nbsp;parku nebo o mnoh&aacute; dal&scaron;&iacute; dobrodružstv&iacute; - z&aacute;bavě se nekladou ž&aacute;dn&eacute; hranice.</p>\n\n<p>V hotelu Falkenstein&nbsp;se nach&aacute;z&iacute; kromě&nbsp;prostorn&eacute;ho&nbsp;dětsk&eacute;ho hři&scaron;tě&nbsp;a dětsk&eacute; herny tak&eacute;&nbsp;velk&yacute; baz&eacute;n a najdete&nbsp;zde i&nbsp;chutnou&nbsp;Pinzgauerskou&nbsp;kuchyni s pestr&yacute;mi&nbsp;dětsk&yacute;mi menu&nbsp;- n&aacute;&scaron; maskot Falki&nbsp;se na v&aacute;s tě&scaron;&iacute;!</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n","1","0","0"),
("5133","1","38","17","content","Text k modulu UBYTOVANIE 3","_menu_7_text_3","<p><strong>Dovolen&aacute; v Zell am See je dovolenou s požitkem - v hotelu Tirolerhof!</strong></p>\n\n<p>Jezero, hory, ledovec a stylov&yacute;, rodinn&yacute; 4-hvězdičkov&yacute; hotel superior v Zell am See &ndash; to je ide&aacute;ln&iacute; kombinace pro va&scaron;i dovolenou v Zell am See, v l&eacute;tě i v zimě. Budete m&iacute;t v&yacute;hled na jezero Zeller See, hory Schmittenh&ouml;he a Kitzsteinhorn se v&scaron;emi rozmanit&yacute;mi sportovn&iacute;mi a rekreačn&iacute;mi možnostmi a budete h&yacute;čk&aacute;ni v b&aacute;ječn&eacute;m a mimoř&aacute;dn&eacute;m hotelu kulin&aacute;řsk&yacute;mi specialitami nejvy&scaron;&scaron;&iacute; kvality. Nebo str&aacute;v&iacute;te dovolenou spojenou s golfem v Salcburku, kde budete m&iacute;t v&yacute;hled na n&aacute;dhern&eacute; hory a jezero oblasti Zell am See-Kaprun. Nebo si užijete ve dvou n&aacute;dhern&eacute; apartm&aacute;ny v r&aacute;mci romantick&eacute; dovolen&eacute;. Nebo si poř&aacute;dně odpočinete s wellness a l&aacute;zeňskou nab&iacute;dkou vy&scaron;&scaron;&iacute; tř&iacute;dy a načerp&aacute;te novou energii. Takto může vypadat va&scaron;e dal&scaron;&iacute; rekreačn&iacute; dovolen&aacute; v hotelu Tirolerhof Zell am See - v srdci Salcburku. Wellness hotel, čtyřhvězdičkov&yacute; hotel superior, hotel pro hosty s pejsky, relaxačn&iacute; hotel - v&scaron;echny tyto př&iacute;vlastky si hotel Tirolerhof plně zaslouž&iacute;.</p>\n\n<p>&nbsp;</p>\n\n<p><strong>Prožijte nezapomenutelnou dovolenou v hotelu Tirolerhof!</strong></p>\n","0","0","0"),
("5134","1","38","17","content","Email hotelu 3","info_hotel_email_3","welcome@tirolerhof.co.at","0","0","0"),
("5135","1","38","17","content","Telefón do hotela 3","info_hotel_tel_c_3","+43(0)6542/772-0","0","0","0"),
("5136","1","38","17","content","Adresa Hotela 3","info_hotel_addr_3","Auerspergstrasse 5   <br/>   A - 5700 Zell am See","0","0","0"),
("5137","1","38","17","content","Názov hotelu 3","info_hotel_name_3","Hotel Tirolerhof ****S","0","0","0"),
("5138","1","38","16","image","Fotka loga k modulu UBYTOVANIE 2","_menu_7_image_1_2","66","1","0","0"),
("5139","1","38","16","image","Fotka k modulu UBYTOVANIE 2","_menu_7_image_2_2","65","0","0","0"),
("5140","1","38","17","image","Fotka loga k modulu UBYTOVANIE 3","_menu_7_image_1_3","51","0","0","0"),
("5141","1","38","17","image","Fotka k modulu UBYTOVANIE 3","_menu_7_image_2_3","56","0","0","0"),
("5142","1","38","2","content","Url adresa hotela 1","link_hotel_1","https://www.amiamo.at","1","0","0"),
("5143","1","38","16","content","Url adresa hotela 2","link_hotel_2","http://www.falkenstein.at","1","0","0"),
("5144","1","38","17","content","Url adresa hotela 3","link_hotel_3","http://www.tirolerhof.co.at/","0","0","0"),
("5145","1","38","9","image","Druhá fotka modulu pre modul GALÉRIA","_menu_5_gallery_1","63","1","0","0"),
("5146","1","38","5","image","Fotka v hlavnom slideri 2","_menu_1_image_2","570","1","0","0"),
("5147","1","38","4","content","Po ukončení registrácie","field_word_koniec_registracie","<p>SOUTĚŽ BYLA UKONČENA DNE 1.11. 2016.</p>\n\n<p>Slosov&aacute;n&iacute; proběhlo dne 04.11.2016, ze v&scaron;ech přijat&yacute;ch platn&yacute;ch registrac&iacute; byli vybr&aacute;ni&nbsp; 3 v&yacute;herci dle pravidel soutěže. Dovolenkov&yacute; pobyt v Salzburgu pro 2 osoby na 3 dny (2 noci), ubytov&aacute;n&iacute; ve 3-4*hotelu se sn&iacute;dan&iacute;, včetně 3-denn&iacute; slevov&eacute; karty &bdquo;SalzburgCard&ldquo; z&iacute;sk&aacute;vaj&iacute; :</p>\n\n<p><strong>Anežka Nov&aacute;kov&aacute;,&nbsp; 289 32 Jikev, ČR</strong></p>\n\n<p><strong>Lucie Finkov&aacute;, 19014 Praha, ČR</strong></p>\n\n<p><strong>Nela Storkov&aacute;,&nbsp; 31200 Plzeň, ČR</strong></p>\n\n<p>V&yacute;herci budou kontaktov&aacute;ni provozovatelem soutěže ohledně převzet&iacute; pobytov&yacute;ch voucherů v nejbliž&scaron;&iacute;ch dnech. Pobytov&eacute; vouchery jsou platn&eacute; 31.10.2017, pobyty nezahrnujou dopravu.</p>\n\n<p><u><strong>V&scaron;em děkujeme za &uacute;čast a v&yacute;hercům srdečne blahopřejeme!</strong></u></p>\n\n<p>&nbsp;</p>\n\n<p><span style=\"font-size:12px\">Spr&aacute;vnost a platnost slosov&aacute;n&iacute; potvrzuj&iacute; provozovatel&eacute; soutěže:&nbsp;</span></p>\n\n<p><span style=\"font-size:12px\">Organiz&aacute;tor: TSG Tourismus Salzburg GmbH Auerspergstra&szlig;e 6, 5020 Salzburg, Rakousko<br />\na spoluorganiz&aacute;tor soutěže: CrossCafe original s.r.o., Ledeck&aacute; 2207/19, 323 00 Plzeň, Česk&aacute; republika</span></p>\n\n<p>&nbsp;</p>\n","1","0","0"),
("5148","1","38","11","content","Názov modulu pre modul O PARTNEROVI","_menu_name_8","CrossCafe","1","4","0"),
("5149","1","38","15","content","Email partnera","info_partner_email","crosscafe@crosscafe.cz","1","0","0"),
("5150","1","38","15","content","Adresa partnera","info_partner_addr","Ledecká 2207/19 <br/> 323 00, Plzeň, ČR","1","0","0"),
("5151","1","38","15","content","Názov partnera","info_partner_name","CrossCafe original s.r.o.","1","0","0"),
("5152","1","38","15","content","Telefónne číslo na partnera","info_partner_tel_c","","0","0","0"),
("5153","1","38","11","content","Text k modulu O PARTNEROVI 1","_menu_8_text_1","<p>&bdquo;Pro lep&scaron;&iacute; den&hellip;&ldquo;</p>\n\n<p><a href=\"https://www.crosscafe.cz/\">CrossCafe</a> je česk&aacute; s&iacute;ť kav&aacute;ren původem z Plzně. Chcete se odměnit? Najdete n&aacute;s na dobře dostupn&yacute;ch m&iacute;stech. Stač&iacute; zaskočit do sv&eacute; nejbliž&scaron;&iacute; kav&aacute;rny a vychutnat si pohodl&iacute;, př&iacute;jemnou atmosf&eacute;ru a voňavou k&aacute;vu. Prostě jako doma...</p>\n\n<p>Jste u n&aacute;s pečen&iacute; vařen&iacute;? Pak se v&aacute;m vyplat&iacute; poř&iacute;dit si na&scaron;i věrnostn&iacute; kartu <a href=\"https://www.crosscafe.cz/crosscard/\" target=\"_blank\">CrossCard</a>.&nbsp;Nejen že slouž&iacute; jako elektronick&aacute; peněženka, ale s každ&yacute;m n&aacute;kupem se v&aacute;m na ni nač&iacute;taj&iacute; body, kter&eacute; můžete využ&iacute;t ve formě slevy na dal&scaron;&iacute; n&aacute;kup.&nbsp;Každ&yacute; držitel CrossCard může nav&iacute;c využ&iacute;vat zaj&iacute;mav&yacute;ch slev u na&scaron;ich partnerů.</p>\n","1","0","0"),
("5154","1","38","1","content","Jazyková mutácia pre Facebook","_language","cs_CZ","1","0","0"),
("5155","1","38","12","image","Newsletter 2 (PDF)","form_file_newsletter_2","575","0","0","0"),
("5156","1","38","4","content","Súhlasím s newslettrom 2","field_word_suhlas_news_2","News 2","0","0","0"),
("5157","1","38","18","content","Email hotelu 4","info_hotel_email_4","welcome@tirolerhof.co.at","0","0","0");
INSERT INTO dnt_microsites_composer VALUES
("5158","1","38","18","content","Telefón do hotela 4","info_hotel_tel_c_4","+43(0)6542/772-0","0","0","0"),
("5159","1","38","18","content","Adresa Hotela 4","info_hotel_addr_4","Auerspergstrasse 5   <br/>   A - 5700 Zell am See","1","0","0"),
("5160","1","38","18","content","Názov hotelu 4","info_hotel_name_4","Hotel Tirolerhof ****S","0","0","0"),
("5161","1","38","18","image","Fotka loga k modulu UBYTOVANIE 4","_menu_7_image_1_4","","0","0","0"),
("5162","1","38","18","image","Fotka k modulu UBYTOVANIE 4","_menu_7_image_2_4","","1","0","0"),
("5163","1","38","18","content","Url adresa hotela 4","link_hotel_4","http://www.tirolerhof.co.at/","0","0","0"),
("5164","1","38","18","content","Text k modulu UBYTOVANIE 4","_menu_7_text_4","","0","0","0"),
("5165","1","38","11","image","Fotka k modulu O PARTNEROVI","_menu_8_image_1","282","1","0","0"),
("5166","1","38","1","content","Google Plus","social_google_plus","https://plus.google.com/+salzburgtourismus","1","0","0"),
("5167","1","38","12","content","Input Otázka","form_extend_v2_otazka","","0","0","0"),
("5168","1","38","13","content","Odoslať potvrdzovací email","sent_confirm_mail","1","1","0","0"),
("5169","1","38","12","content","Voliteľný parameter 1","form_base_custom_1","Číslo Vaší karty CrossCard:","1","0","0"),
("5170","1","39","1","content","Template","layout","dnt_first","1","0","0"),
("5171","1","39","15","content","Link partnera","link_partner","http://www.ktm-bikes.at","1","0","0"),
("5172","1","39","3","content","Link regionu","link_region","http://www.suedtirols-sueden.info","1","0","0"),
("5173","1","39","1","content","Zobraziť na URL adrese","real_address","http://www.vyhrat.com/","1","0","0"),
("5174","1","39","1","content","Facebook","social_fb","https://www.facebook.com/KtmBicycles/","1","0","0"),
("5175","1","39","1","content","Twitter","social_twitter","https://twitter.com/","0","0","0"),
("5176","1","39","1","content","Instagram","social_linked_in","https://www.facebook.com/Bolzanodintorni.SuedtirolsSueden","1","0","0"),
("5177","1","39","1","content","Mapa ","map_location","https://www.google.at/maps/place/Tridentsko-Horn%C3%A1+Adi%C5%BEa,+Taliansko/@46.3788454,10.3084431,8z/data=!3m1!4b1!4m5!3m4!1s0x4778799167e9b4e5:0x107098715907c60!8m2!3d46.4336662!4d11.1693296","1","0","0"),
("5178","1","39","1","image","Favicon","favicon","57","1","0","0"),
("5179","1","39","1","content","Model farby R","_r","193","1","0","0"),
("5180","1","39","1","content","Model farby G","_g","202","1","0","0"),
("5181","1","39","1","content","Model farby B","_b","1","1","0","0"),
("5182","1","39","1","content","Font","_font","Arial","1","0","0"),
("5183","1","39","2","content","Názov hotelu 1","info_hotel_name_1","Hotel Traminer Hof","1","0","0"),
("5184","1","39","2","content","Adresa Hotela 1","info_hotel_addr_1","Weinstraße 43  <br/>   I - 39040 Tramin a. d. Weinstraße","1","0","0"),
("5185","1","39","2","content","Telefón do hotela 1","info_hotel_tel_c_1","+39 0471 860384","1","0","0"),
("5186","1","39","2","content","Email hotelu 1","info_hotel_email_1","info@traminerhof.it","1","0","0"),
("5187","1","39","3","content","Názov regiónu","info_region_name","Ferienregion Südtirols Süden","1","0","0"),
("5188","1","39","3","content","Adresa regiónu","info_region_addr","Pillhofstr. 1 <br/>  39057 Frangart (Bozen) - IT","1","0","0"),
("5189","1","39","3","content","Telefónne číslo regiónu","info_region_tel_c","+39 0471 633488","1","0","0"),
("5190","1","39","3","content","Email regiónu","info_region_email","info@suedtirols-sueden.info","1","0","0"),
("5191","1","39","1","content","Youtube video","youtube_video","1eUSDIcMrxI","1","0","0"),
("5192","1","39","15","image","Logo partnera","partner_logo","585","1","0","0"),
("5193","1","39","3","image","Logo regiónu","region_logo","581","1","0","0"),
("5194","1","39","5","image","Fotka v hlavnom slideri 1","_menu_1_image_1","582","1","0","0"),
("5195","1","39","7","image","Fotka modulu pre modul GALÉRIA","_menu_3_image_1","497","0","0","0"),
("5196","1","39","7","image","Druhá fotka modulu pre modul GALÉRIA","_menu_3_image_2","498","0","0","0"),
("5197","1","39","2","image","Fotka k modulu UBYTOVANIE","_menu_7_image_1_1","586","1","0","0"),
("5198","1","39","5","content","Názov modulu pre modul INFO","_menu_name_1","Intro","1","1","0"),
("5199","1","39","6","content","Názov modulu pre modul O SÚŤAŽI","_menu_name_2","Gewinnspiel","0","0","0"),
("5200","1","39","7","content","Názov modulu pre modul GALÉRIU","_menu_name_3","Galérie","0","0","0"),
("5201","1","39","8","content","Názov modulu pre modul FORMULÁRU","_menu_name_4","Teilnahme","1","3","0"),
("5202","1","39","9","content","Názov modulu pre modul O REGIONE","_menu_name_5","Südtirols Süden","1","2","0"),
("5203","1","39","10","content","Názov modulu pre modul MAPA","_menu_name_6","Mapa","0","0","0"),
("5204","1","39","11","content","Názov modulu pre modul UBYTOVANIE","_menu_name_7","Hotel Traminer Hof","1","4","0"),
("5205","1","39","5","content","Text k modulu INFO","_menu_1_text_1","<p><span style=\"font-size:18px\"><span style=\"color:#000000\"><strong>Gewinne mit KTM 2 E-Bike-Reisen f&uuml;r 2 Personen in die Region S&uuml;dtirols S&uuml;den</strong></span></span></p>\n","1","0","0"),
("5206","1","39","6","content","Text k modulu O SÚŤAŽI","_menu_2_text_1","<h3 style=\"text-align:center\"><strong><span style=\"color:#000000\"><span style=\"font-size:18px\">Wir verlosen Urlaube im ****Bikehotel Traminer Hof in Tramin am Kalterer See&nbsp;f&uuml;r 2 Personen &agrave; 3 N&auml;chte,<br />\ninklusive Halbpension und KTM E-Bikes zum Testen!</span></span></strong></h3>\n\n<p style=\"text-align:center\"><span style=\"color:#000000\"><span style=\"font-size:18px\">So einfach geht&rsquo;s: Teilnahmeformular ausf&uuml;llen, Frage richtig beantworten und Daumen halten.</span></span></p>\n\n<p style=\"text-align:center\"><span style=\"color:#000000\"><span style=\"font-size:16px\">Das Gewinnspiel l&auml;uft von 2. Mai&nbsp;bis 30. Juni 2017. Teilnahmeschluss ist der 30. Juni&nbsp;2017.</span></span></p>\n","1","0","0"),
("5207","1","39","7","content","Text k modulu GALÉRIA","_menu_3_text_1","","1","0","0"),
("5208","1","39","8","content","Text k modulu FORMULÁR","_menu_4_text_1","<p>Ihre Registrierung:</p>\n","1","0","0"),
("5209","1","39","9","content","Text k modulu O REGIÓNE","_menu_5_text_1","<p><strong>Voller Genuss auf zwei R&auml;dern</strong></p>\n\n<p>S&uuml;dtirols S&uuml;den ist eine Region der Gegens&auml;tze: alpiner Lifestyle trifft auf mediterranes Dolce Vita, Almwiesen auf Weinberge und Fr&uuml;hling auf Winter. Nirgends in den Alpen ist die Bike-Saison so lang wie hier. Bereits ab Ende M&auml;rz bis Anfang November k&ouml;nnen die vielf&auml;ltigen Strecken rund um Bozen mit Blick auf Burgen, Berge, Seen und Weinlandschaften beradelt werden. Neue Ma&szlig;st&auml;be in puncto Genuss und Komfort setzt der neue 270 Kilometer lange S&uuml;dtirol-Radweg, der auf f&uuml;nf Etappen sieben S&uuml;dtiroler St&auml;dte miteinander verbindet. Von Sterzing geht es &uuml;ber Bruneck, Brixen, Bozen und Meran nach Glurns. Oder lieber in die andere Richtung?&nbsp;</p>\n","1","0","0"),
("5210","1","39","9","content","Ďalší text k modulu O REGIÓNE","_menu_5_text_2","<p>Auch in Sachen E-Bike ist S&uuml;dtirols S&uuml;den vorbildlich. So existieren sogar ausgewiesene E-Bike-Touren wie die landesweit erste E-Bike-Genusstour entlang der S&uuml;dtiroler Weinstra&szlig;e. Wer genussvolles Radeln mit genussvollem Trinken verbinden m&ouml;chte, ist bei der gef&uuml;hrten Halbtagestour &bdquo;Wine&amp;Bike&ldquo; richtig, auf der die Teilnehmer nicht nur die sch&ouml;nsten Landschaften kennenlernen, sondern auch an einer Kellereibesichtigung mit Verkostung teilnehmen.</p>\n\n<p>Abgerundet wird das Bike-Angebot der Region mit einer Auswahl spezialisierter Unterk&uuml;nfte, die ihre G&auml;ste mit Tipps, Tricks und Service rund ums Thema Fahrrad verw&ouml;hnen.</p>\n","1","0","0"),
("5211","1","39","10","content","Text k modulu MAPA","_menu_6_text_1","<p>Mapa regionu</p>\n","1","0","0"),
("5212","1","39","2","content","Text k modulu UBYTOVANIE 1","_menu_7_text_1","<p><strong>2016 ist Bikeguide und Chef des Hotels Traminer Hof&nbsp;Armin Pomella mehr als 120 Touren mit seinen G&auml;sten gefahren. Schauen wir mal, wie viele es 2017 werden.</strong></p>\n\n<p>Im Bikehotel Traminer Hof wird der Urlaub zu einem unvergesslichen Bike-Abenteuer. Weinberge, bunte W&auml;lder, ruhige Seen, schroffe Felslandschaften, weite Hochalmen; Heute ist Radfahren vom Hotel Traminer Hof nicht mehr wegzudenken.</p>\n\n<p>Das Hotel, allen voran der Chef und Bikeguide Armin Pomella, tut&nbsp;alles, damit der Bikeurlaub zu einem echten Erlebnis wird. Egal ob man es auf eigene Faust versucht oder eine gef&uuml;hrte Tour mitmacht. S&uuml;dtiroler K&ouml;stlichkeiten gepaart mit der mediterranen cucina italiana runden den Urlaub perfekt ab.</p>\n","1","0","0"),
("5213","1","39","12","content","Input Meno","form_base_name","Vorname","1","0","0"),
("5214","1","39","12","content","Input Priezvisko","form_base_surname","Nachname","1","0","0"),
("5215","1","39","12","content","Input PSČ","form_base_psc","PLZ","1","0","0"),
("5216","1","39","12","content","Input Mesto","form_base_city","Stadt","1","0","0"),
("5217","1","39","12","content","Input Email","form_base_email","E-mail","1","0","0"),
("5218","1","39","12","content","Input Doklad","form_extend_v1_doklad","","0","0","0"),
("5219","1","39","12","content","Input Otázka + odpovede","form_extend_v3_otazka","In welcher Urlaubsregion erfreuen sich Radfreunde der längsten Bike-Saison der Alpen?","1","0","0"),
("5220","1","39","12","content","Odpoveď A","form_extend_v3_odpoved_a","Südtirols Süden","1","0","0"),
("5221","1","39","12","content","Odpoveď B","form_extend_v3_odpoved_b","Ötztal","1","0","0"),
("5222","1","39","12","content","Odpoveď C","form_extend_v3_odpoved_c","Pitztal","1","0","0"),
("5223","1","39","4","content","Názov","field_word_nazov","Názov","0","0","0"),
("5224","1","39","4","content","Adresa","field_word_adresa","Adresa","0","0","0"),
("5225","1","39","4","content","Kontakt","field_word_kontakt","Kontakt","0","0","0"),
("5226","1","39","4","content","Web","field_word_web","Web","0","0","0"),
("5227","1","39","4","content","Hláška povinné pole","field_word_err","Pflichtfelder","1","0","0"),
("5228","1","39","4","content","Registrovať","field_word_sent","Teilnehmen","1","0","0"),
("5229","1","39","4","content","Predchádzajúca (fotka)","field_word_previous","Vorheriges","1","0","0"),
("5230","1","39","4","content","Ďalšia (fotka)","field_word_next","Nächstes","1","0","0"),
("5231","1","39","4","content","Súhlasím s newslettrom","field_word_suhlas_news","Ja, ich stimme zu den Newsletter von Ferienregion Südtirols Süden zu erhalten und meine Daten für weitere Marketingaktivitäten zur Verfügung zu stellen.","1","0","0"),
("5232","1","39","4","content","Súhlasím s podmienkami súťaže","field_word_suhlas_podm","Ja, ich stimme den Teilnahmebedingungen zu. (Teilnahmebedingungen HIER).","1","0","0"),
("5233","1","39","1","content","Kľúčové slová pre Google","keywords","Ferienregion Südtirols Süden KTM Bikes Gewinnspiel","1","0","0"),
("5234","1","39","1","content","Popis pre Google","description","This competition has a first ID","1","0","0"),
("5235","1","39","4","content","Súhlasím s podmienkami súťaže","field_word_dakujeme","Danke, Sie haben sich erfolgreich für das Gewinnspiel registriert.","1","0","0"),
("5236","1","39","12","image","Podmienky súťaže (PDF)","form_file_podmienky","594","1","0","0"),
("5237","1","39","12","image","Newsletter (PDF)","form_file_newsletter","593","0","0","0"),
("5238","1","39","4","content","Hláška možnosti novej registrácie","field_word_nova_registracia","Jetzt Freunde einladen!","1","0","0"),
("5239","1","39","13","content","Počet znakov vygenerovaného hashu","_email_conf_char","8","1","0","0"),
("5240","1","39","13","content","Hláška, súťažiacemu ktorá mu príde na email po registracii.","_email_conf_sent_text","Danke, Sie haben sich erfolgreich für das Gewinnspiel registriert. Wir wünschen Ihnen viel Erfolg bei der Verlosung!","1","0","0"),
("5241","1","39","12","content","Telefónne číslo","form_base_tel_c","Tel. Nr.","1","0","0"),
("5242","1","39","4","content","Hláška za hviezdičkou o povinných poliach","field_word_povinne_polia","","1","0","0"),
("5243","1","39","2","image","Fotka loga k modulu UBYTOVANIE","_menu_7_image_2_1","59","0","0","0"),
("5244","1","39","16","content","Názov hotelu 2","info_hotel_name_2","Sporthotel Falkenstein","0","0","0"),
("5245","1","39","16","content","Adresa Hotela 2","info_hotel_addr_2","Nikolaus-Gassner-Str. 79   <br/>   A - 5710 Kaprun","0","0","0"),
("5246","1","39","16","content","Telefón do hotela 2","info_hotel_tel_c_2","+43 6547 7122","0","0","0"),
("5247","1","39","16","content","Email hotelu 2","info_hotel_email_2","sporthotel@falkenstein.at","0","0","0"),
("5248","1","39","16","content","Text k modulu UBYTOVANIE 2","_menu_7_text_2","<p><strong>Das Falkenstein</strong></p>\n\n<p>Tady v Kaprunu a hotelu Falkenstein lze objevit spoustu vzru&scaron;uj&iacute;c&iacute;ch možnost&iacute; a z&aacute;bavy&nbsp;pro rodiny a děti. Každ&yacute; den může b&yacute;t spojen s nov&yacute;mi z&aacute;žitky a dojmy, ať už jde&nbsp;o zvl&aacute;&scaron;tn&iacute; rodinn&eacute; turistick&eacute; v&yacute;lety, čvacht&aacute;n&iacute; a klouz&aacute;n&iacute; v Tauern SPA Kaprun, v&yacute;let&nbsp;k alpsk&eacute; horsk&eacute; bobov&eacute; dr&aacute;ze &quot;Maisfiltzer&quot;, o n&aacute;v&scaron;těvu volnočasov&eacute;ho nebo n&aacute;rodn&iacute;ho&nbsp;parku nebo o mnoh&aacute; dal&scaron;&iacute; dobrodružstv&iacute; - z&aacute;bavě se nekladou ž&aacute;dn&eacute; hranice.</p>\n\n<p>V hotelu Falkenstein&nbsp;se nach&aacute;z&iacute; kromě&nbsp;prostorn&eacute;ho&nbsp;dětsk&eacute;ho hři&scaron;tě&nbsp;a dětsk&eacute; herny tak&eacute;&nbsp;velk&yacute; baz&eacute;n a najdete&nbsp;zde i&nbsp;chutnou&nbsp;Pinzgauerskou&nbsp;kuchyni s pestr&yacute;mi&nbsp;dětsk&yacute;mi menu&nbsp;- n&aacute;&scaron; maskot Falki&nbsp;se na v&aacute;s tě&scaron;&iacute;!</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n","0","0","0"),
("5249","1","39","17","content","Text k modulu UBYTOVANIE 3","_menu_7_text_3","<p><strong>Dovolen&aacute; v Zell am See je dovolenou s požitkem - v hotelu Tirolerhof!</strong></p>\n\n<p>Jezero, hory, ledovec a stylov&yacute;, rodinn&yacute; 4-hvězdičkov&yacute; hotel superior v Zell am See &ndash; to je ide&aacute;ln&iacute; kombinace pro va&scaron;i dovolenou v Zell am See, v l&eacute;tě i v zimě. Budete m&iacute;t v&yacute;hled na jezero Zeller See, hory Schmittenh&ouml;he a Kitzsteinhorn se v&scaron;emi rozmanit&yacute;mi sportovn&iacute;mi a rekreačn&iacute;mi možnostmi a budete h&yacute;čk&aacute;ni v b&aacute;ječn&eacute;m a mimoř&aacute;dn&eacute;m hotelu kulin&aacute;řsk&yacute;mi specialitami nejvy&scaron;&scaron;&iacute; kvality. Nebo str&aacute;v&iacute;te dovolenou spojenou s golfem v Salcburku, kde budete m&iacute;t v&yacute;hled na n&aacute;dhern&eacute; hory a jezero oblasti Zell am See-Kaprun. Nebo si užijete ve dvou n&aacute;dhern&eacute; apartm&aacute;ny v r&aacute;mci romantick&eacute; dovolen&eacute;. Nebo si poř&aacute;dně odpočinete s wellness a l&aacute;zeňskou nab&iacute;dkou vy&scaron;&scaron;&iacute; tř&iacute;dy a načerp&aacute;te novou energii. Takto může vypadat va&scaron;e dal&scaron;&iacute; rekreačn&iacute; dovolen&aacute; v hotelu Tirolerhof Zell am See - v srdci Salcburku. Wellness hotel, čtyřhvězdičkov&yacute; hotel superior, hotel pro hosty s pejsky, relaxačn&iacute; hotel - v&scaron;echny tyto př&iacute;vlastky si hotel Tirolerhof plně zaslouž&iacute;.</p>\n\n<p>&nbsp;</p>\n\n<p><strong>Prožijte nezapomenutelnou dovolenou v hotelu Tirolerhof!</strong></p>\n","0","0","0"),
("5250","1","39","17","content","Email hotelu 3","info_hotel_email_3","welcome@tirolerhof.co.at","0","0","0"),
("5251","1","39","17","content","Telefón do hotela 3","info_hotel_tel_c_3","+43(0)6542/772-0","0","0","0"),
("5252","1","39","17","content","Adresa Hotela 3","info_hotel_addr_3","Auerspergstrasse 5   <br/>   A - 5700 Zell am See","0","0","0"),
("5253","1","39","17","content","Názov hotelu 3","info_hotel_name_3","Hotel Tirolerhof ****S","0","0","0"),
("5254","1","39","16","image","Fotka loga k modulu UBYTOVANIE 2","_menu_7_image_1_2","66","0","0","0"),
("5255","1","39","16","image","Fotka k modulu UBYTOVANIE 2","_menu_7_image_2_2","65","0","0","0"),
("5256","1","39","17","image","Fotka loga k modulu UBYTOVANIE 3","_menu_7_image_1_3","51","0","0","0"),
("5257","1","39","17","image","Fotka k modulu UBYTOVANIE 3","_menu_7_image_2_3","56","0","0","0");
INSERT INTO dnt_microsites_composer VALUES
("5258","1","39","2","content","Url adresa hotela 1","link_hotel_1","http://www.traminerhof.it","1","0","0"),
("5259","1","39","16","content","Url adresa hotela 2","link_hotel_2","http://www.falkenstein.at","0","0","0"),
("5260","1","39","17","content","Url adresa hotela 3","link_hotel_3","http://www.tirolerhof.co.at/","0","0","0"),
("5261","1","39","9","image","Druhá fotka modulu pre modul GALÉRIA","_menu_5_gallery_1","65","1","0","0"),
("5262","1","39","5","image","Fotka v hlavnom slideri 2","_menu_1_image_2","583","1","0","0"),
("5263","1","39","4","content","Po ukončení registrácie","field_word_koniec_registracie","<p>&nbsp;</p>\n\n<p style=\"text-align:center\">SPIEL WURDE BEREITS BEENDET.</p>\n\n<p style=\"text-align:center\"><strong>GEWINNER:</strong></p>\n\n<p style=\"text-align:center\"><strong>Petra Kuncova,&nbsp; 46804 Jablonec nad Nisou , ČR</strong></p>\n\n<p style=\"text-align:center\"><strong>Alice Ertlbauerova,&nbsp; 62100 Brno, ČR</strong></p>\n\n<p style=\"text-align:center\"><strong>Iveta Pohankova,&nbsp; 28002 Kol&iacute;n, ČR</strong></p>\n\n<p style=\"text-align:center\"><strong>David Pravec,&nbsp; 53009 Pardubice, ČR</strong></p>\n\n<p style=\"text-align:center\"><strong>Monika Adamusova,&nbsp; 58764 B&aacute;nov-Str&aacute;žky, ČR</strong></p>\n\n<p style=\"text-align:center\">&nbsp;</p>\n","0","0","0"),
("5264","1","39","11","content","Názov modulu pre modul O PARTNEROVI","_menu_name_8","KTM-Bikes","1","5","0"),
("5265","1","39","15","content","Email partnera","info_partner_email","office@ktm-bikes.at","1","0","0"),
("5266","1","39","15","content","Adresa partnera","info_partner_addr","Harlochner Str. 13 <br/> A - 5230 Mattighofen","1","0","0"),
("5267","1","39","15","content","Názov partnera","info_partner_name","KTM Fahrrad GmbH","1","0","0"),
("5268","1","39","15","content","Telefónne číslo na partnera","info_partner_tel_c","+43 (0) 7742 4091-0","1","0","0"),
("5269","1","39","11","content","Text k modulu O PARTNEROVI 1","_menu_8_text_1","<p>MADE IN AUSTRIA</p>\n\n<p>Seit Jahrzehnten beweist KTM, welche Kompetenz im Fahrradbau in der Marke steckt. Die Fahrradtechnik hat sich vielfach ver&auml;ndert und enorme Fortschritte gemacht. Im Laufe dieser Zeit hat sich KTM zu einem der letzten verbliebenen Vollsortimenter entwickelt. Eines jedoch ist immer gleich geblieben: KTM baut nach wie vor Bikes - Made in Austria. Bereits das erste KTM Fahrrad Fleetwing trug 1964 das G&uuml;tesiegel Made in Austria. Mehr als 50 Jahre sp&auml;ter ist KTM stolz darauf, seine Fahrr&auml;der wieder mit diesem Siegel zu versehen, das f&uuml;r h&ouml;chste Qualit&auml;t und modernste Technologien steht. Mittlerweile wird in mehr als 50 L&auml;ndern weltweit auf KTM Bikes - Made in Austria vertraut.</p>\n","1","0","0"),
("5270","1","39","1","content","Jazyková mutácia pre Facebook","_language","de_DE","1","0","0"),
("5271","1","39","12","image","Newsletter 2 (PDF)","form_file_newsletter_2","595","0","0","0"),
("5272","1","39","4","content","Súhlasím s newslettrom 2","field_word_suhlas_news_2","News 2","0","0","0"),
("5273","1","39","18","content","Email hotelu 4","info_hotel_email_4","welcome@tirolerhof.co.at","0","0","0"),
("5274","1","39","18","content","Telefón do hotela 4","info_hotel_tel_c_4","+43(0)6542/772-0","0","0","0"),
("5275","1","39","18","content","Adresa Hotela 4","info_hotel_addr_4","Auerspergstrasse 5   <br/>   A - 5700 Zell am See","1","0","0"),
("5276","1","39","18","content","Názov hotelu 4","info_hotel_name_4","Hotel Tirolerhof ****S","0","0","0"),
("5277","1","39","18","image","Fotka loga k modulu UBYTOVANIE 4","_menu_7_image_1_4","","0","0","0"),
("5278","1","39","18","image","Fotka k modulu UBYTOVANIE 4","_menu_7_image_2_4","","1","0","0"),
("5279","1","39","18","content","Url adresa hotela 4","link_hotel_4","http://www.tirolerhof.co.at/","0","0","0"),
("5280","1","39","18","content","Text k modulu UBYTOVANIE 4","_menu_7_text_4","","0","0","0"),
("5281","1","39","11","image","Fotka k modulu O PARTNEROVI","_menu_8_image_1","589","1","0","0"),
("5282","1","39","1","content","Google Plus","social_google_plus","https://plus.google.com/+HotelTraminerHof","1","0","0"),
("5283","1","39","12","content","Input Otázka","form_extend_v2_otazka","Napíšte farbu vášho PC","0","0","0"),
("5284","1","39","13","content","Odoslať potvrdzovací email","sent_confirm_mail","1","1","0","0"),
("5285","1","39","12","content","Voliteľný parameter 1","form_base_custom_1","Toto pole je voliteľné","0","0","0"),
("5286","1","40","1","content","Template","layout","dnt_first","1","0","0"),
("5287","1","40","15","content","Link partnera","link_partner","http://www.jlindeberg.com/","1","0","0"),
("5288","1","40","3","content","Link regionu","link_region","http://www.saalfelden-leogang.com","1","0","0"),
("5289","1","40","1","content","Zobraziť na URL adrese","real_address","http://www.vyhrat.com/","1","0","0"),
("5290","1","40","1","content","Facebook","social_fb","https://www.facebook.com/jlindebergofficial","1","0","0"),
("5291","1","40","1","content","Twitter","social_twitter","https://twitter.com/saalf_leogang","1","0","0"),
("5292","1","40","1","content","Instagram","social_linked_in","https://www.instagram.com/jlindebergofficial/","1","0","0"),
("5293","1","40","1","content","Mapa ","map_location","https://www.google.at/maps/place/Golfclub+Urslautal/@47.4278165,12.8107416,13z/data=!4m8!1m2!2m1!1sSaalfelden+Leogang++Golfclub+Urslautal!3m4!1s0x4776e397b105d2a7:0x8c2f1b5bb5d237c6!8m2!3d47.413951!4d12.885547","1","0","0"),
("5294","1","40","1","image","Favicon","favicon","57","1","0","0"),
("5295","1","40","1","content","Model farby R","_r","90","1","0","0"),
("5296","1","40","1","content","Model farby G","_g","165","1","0","0"),
("5297","1","40","1","content","Model farby B","_b","60","1","0","0"),
("5298","1","40","1","content","Font","_font","Arial","1","0","0"),
("5299","1","40","2","content","Názov hotelu 1","info_hotel_name_1","Hotel & Golfclub Gut Brandlhof","1","0","0"),
("5300","1","40","2","content","Adresa Hotela 1","info_hotel_addr_1","Hohlwegen 4   <br/>   A-5760 Saalfelden","1","0","0"),
("5301","1","40","2","content","Telefón do hotela 1","info_hotel_tel_c_1","+43 6582 74 875","1","0","0"),
("5302","1","40","2","content","Email hotelu 1","info_hotel_email_1","golfclub@brandlhof.com","1","0","0"),
("5303","1","40","3","content","Názov regiónu","info_region_name","Saalfelden Leogang Touristik","1","0","0"),
("5304","1","40","3","content","Adresa regiónu","info_region_addr"," Mittergasse 21 <br/>  A-5760 Saalfelden","1","0","0"),
("5305","1","40","3","content","Telefónne číslo regiónu","info_region_tel_c","+43-6582-70660","1","0","0"),
("5306","1","40","3","content","Email regiónu","info_region_email","info@saalfelden-leogang.at","1","0","0"),
("5307","1","40","1","content","Youtube video","youtube_video","KSviwdweelg","1","0","0"),
("5308","1","40","15","image","Logo partnera","partner_logo","303","0","0","0"),
("5309","1","40","3","image","Logo regiónu","region_logo","607","1","0","0"),
("5310","1","40","5","image","Fotka v hlavnom slideri 1","_menu_1_image_1","596","1","0","0"),
("5311","1","40","7","image","Fotka modulu pre modul GALÉRIA","_menu_3_image_1","598","1","0","0"),
("5312","1","40","7","image","Druhá fotka modulu pre modul GALÉRIA","_menu_3_image_2","599","1","0","0"),
("5313","1","40","2","image","Fotka k modulu UBYTOVANIE","_menu_7_image_1_1","622","1","0","0"),
("5314","1","40","5","content","Názov modulu pre modul INFO","_menu_name_1","Intro","1","1","0"),
("5315","1","40","6","content","Názov modulu pre modul O SÚŤAŽI","_menu_name_2","Contest","0","0","0"),
("5316","1","40","7","content","Názov modulu pre modul GALÉRIU","_menu_name_3","Galérie","0","0","0"),
("5317","1","40","8","content","Názov modulu pre modul FORMULÁRU","_menu_name_4","Participation","1","3","0"),
("5318","1","40","9","content","Názov modulu pre modul O REGIONE","_menu_name_5","Saalfelden Leogang","1","2","0"),
("5319","1","40","10","content","Názov modulu pre modul MAPA","_menu_name_6","Mapa","0","0","0"),
("5320","1","40","11","content","Názov modulu pre modul UBYTOVANIE","_menu_name_7","Hotel & Golfclub Gut Brandlhof & GC Urslautal","1","4","0"),
("5321","1","40","5","content","Text k modulu INFO","_menu_1_text_1","<p style=\"text-align:center\"><span style=\"font-size:22px\"><strong>GOING FOR THE GAME</strong><br />\nWin a golf trip to Saalfelden Leogang</span></p>\n","1","0","0"),
("5322","1","40","6","content","Text k modulu O SÚŤAŽI","_menu_2_text_1","<p style=\"text-align:center\"><strong><span style=\"font-size:20px\">J.Lindeberg sends you to a summer escape to Saalfelden Leogang&nbsp;!<br />\nJust answer the question and type in your contact details!</span></strong></p>\n\n<p style=\"text-align:center\"><span style=\"font-size:18px\">The prize game lasts until the 31st of May 2017.</span></p>\n\n<p style=\"text-align:center\"><span style=\"font-size:20px\">You and your friend can win the following:</span><br />\n<strong><span style=\"font-size:20px\">A premium&nbsp;golf holiday for 2 people for 4 nights in the 4*S Hotel Gut Brandlhof incl. half board and Greenfees for Golfclub Gut Brandlhof and Urslautal.</span></strong></p>\n","1","0","0"),
("5323","1","40","7","content","Text k modulu GALÉRIA","_menu_3_text_1","","1","0","0"),
("5324","1","40","8","content","Text k modulu FORMULÁR","_menu_4_text_1","<p><strong>Participation</strong>:</p>\n","1","0","0"),
("5325","1","40","9","content","Text k modulu O REGIÓNE","_menu_5_text_1","<p><span style=\"font-size:14px\"><strong>Where a golf player&rsquo;s heart skips a beat: The pleasure of alpine golf in the Steinernen Meer</strong><br />\nNestled in the midst of the alps, amongst the gentle rolling grass mountains and the imposing &lsquo;Kalkriesen&rsquo; and between the small town of Saalfelden and holiday village of Leogang, golfers will find a lovely surprise at an altitude of 748 metres above sea level: Here one can enjoy golf at the highest level. Within this rural idyllic scenery, dominated by meadows and hiking trails there is a subtle blend where urban meets tradition. World-renowned jazz beats mix with alpine flair. The beauty of nature is at one with a strong sense of innovation. This mixture is topped off with a mixture of 36 (+ 9) of the most beautiful and best-kept greens. This golfer&#39;s Eldorado in the holiday region of Saalfelden Leogang, as well as the GC Urslautals and GC Gut Brandlhof, are waiting for you. The two unique golf courses complement each other like Yin and Yang.</span></p>\n\n<p><span style=\"font-size:14px\">More information: <a href=\"http://www.saalfelden-leogang.com\">www.saalfelden-leogang.com</a></span></p>\n","1","0","0"),
("5326","1","40","9","content","Ďalší text k modulu O REGIÓNE","_menu_5_text_2","<p><span style=\"font-size:14px\"><strong>GC Gut Brandlhof &ndash; size that inspires!&nbsp;</strong><br />\nSet amongst the giant rugged mountains a spectacular 18-hole course is at the disposal of golfers. The perfectly manicured Brandlhof golf course offers that little bit extra. The setting includes many beautiful old trees and the river Saalach. For further info: <a href=\"https://www.brandlhof.com/en/golf-course/information-contact-pinzgau.html\" target=\"_blank\">www.brandlhof.com</a></span></p>\n\n<p><span style=\"font-size:14px\"><strong>GC Urslautal &ndash; a real golfing feast!</strong><br />\nBefore a round of the &quot;Beautiful Game&quot; warm yourself up at the GC Urslautal on one of the best driving ranges in Austria. The Urslautal golf course does not only offer a breathtaking 360 &deg; mountain panorama, but also a 5,000 m2 large driving range set amongst the high plateau. More Info: <a href=\"http://www.golf-urslautal.at\" target=\"_blank\">www.golf-urslautal.at</a></span></p>\n\n<p>&nbsp;</p>\n","1","0","0"),
("5327","1","40","10","content","Text k modulu MAPA","_menu_6_text_1","<p>Mapa regionu</p>\n","1","0","0"),
("5328","1","40","2","content","Text k modulu UBYTOVANIE 1","_menu_7_text_1","<p><strong>Enjoy golfing at Brandlhof!</strong><br />\nThe Brandlhof Estate&rsquo;s 18-hole championship course, the 6-hole short course, the driving range as well as the practice range fit perfectly into the fantastic landscape of the Saalach Valley in the Pinzgau region. It has turned a four-star superior hotel into a club house that provides all of the creature comforts golfers can imagine and as an additional bonus, hotel guests receive a 50 percent discount on the green fee and have access to their own caddy room. Culinary delights are served at the proverbial 19th hole, the &ldquo;Zur Einkehr&rdquo; golf restaurant, where you can enjoy a splendid view from the sun terrace. Advanced Fellow PGA Professional John Seymour offers his training workshops at Brandlhof Golf Club to a broad range of players - from beginners to semi-professionals. And finally, what really makes Brandlhof stand out, is that dogs are not only allowed but very welcome on the golf course and with the especially repurposed dog-friendly electric golf cart nothing will stand in the way of enjoying a round of golf with the four-legged friend.&nbsp;</p>\n","1","0","0"),
("5329","1","40","12","content","Input Meno","form_base_name","First name","1","0","0"),
("5330","1","40","12","content","Input Priezvisko","form_base_surname","Sur name","1","0","0"),
("5331","1","40","12","content","Input PSČ","form_base_psc","Zip Code","1","0","0"),
("5332","1","40","12","content","Input Mesto","form_base_city","Town","1","0","0"),
("5333","1","40","12","content","Input Email","form_base_email","eMail","1","0","0"),
("5334","1","40","12","content","Input Doklad","form_extend_v1_doklad","","0","0","0"),
("5335","1","40","12","content","Input Otázka + odpovede","form_extend_v3_otazka","Saalfelden Leogang ?","0","0","0"),
("5336","1","40","12","content","Odpoveď A","form_extend_v3_odpoved_a","aaa","0","0","0"),
("5337","1","40","12","content","Odpoveď B","form_extend_v3_odpoved_b","bbb","0","0","0"),
("5338","1","40","12","content","Odpoveď C","form_extend_v3_odpoved_c","ccc","0","0","0"),
("5339","1","40","4","content","Názov","field_word_nazov","Názov","0","0","0"),
("5340","1","40","4","content","Adresa","field_word_adresa","Adresa","0","0","0"),
("5341","1","40","4","content","Kontakt","field_word_kontakt","Kontakt","0","0","0"),
("5342","1","40","4","content","Web","field_word_web","Web","0","0","0"),
("5343","1","40","4","content","Hláška povinné pole","field_word_err","Required fields","1","0","0"),
("5344","1","40","4","content","Registrovať","field_word_sent","Participation","1","0","0"),
("5345","1","40","4","content","Predchádzajúca (fotka)","field_word_previous","Previous","1","0","0"),
("5346","1","40","4","content","Ďalšia (fotka)","field_word_next","Next","1","0","0"),
("5347","1","40","4","content","Súhlasím s newslettrom","field_word_suhlas_news","Yes, I agree to receive the newsletter of Saalfelden Leogang and J.Lindeberg to provide my data for further marketing activities.","1","0","0"),
("5348","1","40","4","content","Súhlasím s podmienkami súťaže","field_word_suhlas_podm","Yes, I agree to the Terms and Conditions. (Conditions HERE).","1","0","0"),
("5349","1","40","1","content","Kľúčové slová pre Google","keywords","Saalfelden Leogang   J.Lindeberg","1","0","0"),
("5350","1","40","1","content","Popis pre Google","description","This competition has a first ID","1","0","0"),
("5351","1","40","4","content","Súhlasím s podmienkami súťaže","field_word_dakujeme","Thank you, you have successfully registered for the contest. We wish you lots of success!","1","0","0"),
("5352","1","40","12","image","Podmienky súťaže (PDF)","form_file_podmienky","613","1","0","0"),
("5353","1","40","12","image","Newsletter (PDF)","form_file_newsletter","614","0","0","0"),
("5354","1","40","4","content","Hláška možnosti novej registrácie","field_word_nova_registracia","Invite friends now!","1","0","0"),
("5355","1","40","13","content","Počet znakov vygenerovaného hashu","_email_conf_char","8","1","0","0"),
("5356","1","40","13","content","Hláška, súťažiacemu ktorá mu príde na email po registracii.","_email_conf_sent_text","Thank you, you have successfully registered for the raffle. We wish you lots of success!","1","0","0"),
("5357","1","40","12","content","Telefónne číslo","form_base_tel_c","Telephone number","1","0","0");
INSERT INTO dnt_microsites_composer VALUES
("5358","1","40","4","content","Hláška za hviezdičkou o povinných poliach","field_word_povinne_polia","Required fields","1","0","0"),
("5359","1","40","2","image","Fotka loga k modulu UBYTOVANIE","_menu_7_image_2_1","602","0","0","0"),
("5360","1","40","16","content","Názov hotelu 2","info_hotel_name_2","Golfplatz Urslautal","1","0","0"),
("5361","1","40","16","content","Adresa Hotela 2","info_hotel_addr_2","Schinking 81  <br/>  A-5760  Saalfelden","1","0","0"),
("5362","1","40","16","content","Telefón do hotela 2","info_hotel_tel_c_2","+43 6584 2000","1","0","0"),
("5363","1","40","16","content","Email hotelu 2","info_hotel_email_2","info@golf-urslautal.at","1","0","0"),
("5364","1","40","16","content","Text k modulu UBYTOVANIE 2","_menu_7_text_2","<p><strong>GC Urslautal &ndash; a real golfing feast!</strong><br />\nBefore a round of the &quot;Beautiful Game&quot; warm yourself up at the GC Urslautal on one of the best driving ranges in Austria. The Urslautal golf course does not only offer a breathtaking 360 &deg; mountain panorama, but also a 5,000 m2 large driving range set amongst the high plateau. Here it makes sense to learn to play golf, train and really have fun. Once players have found their rhythm, they will really enjoy playing a full round. This Championship course provides a real challenge for the long game. Water hazards, biotopes and strategically placed bunkers allow golfers to reach into their bag of tricks and to choose the right club. On the other hand, there are a few trees on the way as well as time to take in the panoramic views of the mountains. For the 19th hole, you had best have your sunglasses at hand as the terrace entices one to linger and stay a while. Your taste buds will be treated as well as your eyes. Those who have simply not had their fill, can indulge in a Golfer&#39;s dessert in the form of three additional practice holes.</p>\n","1","0","0"),
("5365","1","40","17","content","Text k modulu UBYTOVANIE 3","_menu_7_text_3","<p><strong>Dovolen&aacute; v Zell am See je dovolenou s požitkem - v hotelu Tirolerhof!</strong></p>\n\n<p>Jezero, hory, ledovec a stylov&yacute;, rodinn&yacute; 4-hvězdičkov&yacute; hotel superior v Zell am See &ndash; to je ide&aacute;ln&iacute; kombinace pro va&scaron;i dovolenou v Zell am See, v l&eacute;tě i v zimě. Budete m&iacute;t v&yacute;hled na jezero Zeller See, hory Schmittenh&ouml;he a Kitzsteinhorn se v&scaron;emi rozmanit&yacute;mi sportovn&iacute;mi a rekreačn&iacute;mi možnostmi a budete h&yacute;čk&aacute;ni v b&aacute;ječn&eacute;m a mimoř&aacute;dn&eacute;m hotelu kulin&aacute;řsk&yacute;mi specialitami nejvy&scaron;&scaron;&iacute; kvality. Nebo str&aacute;v&iacute;te dovolenou spojenou s golfem v Salcburku, kde budete m&iacute;t v&yacute;hled na n&aacute;dhern&eacute; hory a jezero oblasti Zell am See-Kaprun. Nebo si užijete ve dvou n&aacute;dhern&eacute; apartm&aacute;ny v r&aacute;mci romantick&eacute; dovolen&eacute;. Nebo si poř&aacute;dně odpočinete s wellness a l&aacute;zeňskou nab&iacute;dkou vy&scaron;&scaron;&iacute; tř&iacute;dy a načerp&aacute;te novou energii. Takto může vypadat va&scaron;e dal&scaron;&iacute; rekreačn&iacute; dovolen&aacute; v hotelu Tirolerhof Zell am See - v srdci Salcburku. Wellness hotel, čtyřhvězdičkov&yacute; hotel superior, hotel pro hosty s pejsky, relaxačn&iacute; hotel - v&scaron;echny tyto př&iacute;vlastky si hotel Tirolerhof plně zaslouž&iacute;.</p>\n\n<p>&nbsp;</p>\n\n<p><strong>Prožijte nezapomenutelnou dovolenou v hotelu Tirolerhof!</strong></p>\n","0","0","0"),
("5366","1","40","17","content","Email hotelu 3","info_hotel_email_3","welcome@tirolerhof.co.at","0","0","0"),
("5367","1","40","17","content","Telefón do hotela 3","info_hotel_tel_c_3","+43(0)6542/772-0","0","0","0"),
("5368","1","40","17","content","Adresa Hotela 3","info_hotel_addr_3","Auerspergstrasse 5   <br/>   A - 5700 Zell am See","0","0","0"),
("5369","1","40","17","content","Názov hotelu 3","info_hotel_name_3","Hotel Tirolerhof ****S","0","0","0"),
("5370","1","40","16","image","Fotka loga k modulu UBYTOVANIE 2","_menu_7_image_1_2","604","1","0","0"),
("5371","1","40","16","image","Fotka k modulu UBYTOVANIE 2","_menu_7_image_2_2","605","1","0","0"),
("5372","1","40","17","image","Fotka loga k modulu UBYTOVANIE 3","_menu_7_image_1_3","51","0","0","0"),
("5373","1","40","17","image","Fotka k modulu UBYTOVANIE 3","_menu_7_image_2_3","56","0","0","0"),
("5374","1","40","2","content","Url adresa hotela 1","link_hotel_1","https://www.brandlhof.com","1","0","0"),
("5375","1","40","16","content","Url adresa hotela 2","link_hotel_2","http://www.golf-urslautal.at","1","0","0"),
("5376","1","40","17","content","Url adresa hotela 3","link_hotel_3","http://www.tirolerhof.co.at/","0","0","0"),
("5377","1","40","9","image","Druhá fotka modulu pre modul GALÉRIA","_menu_5_gallery_1","67","1","0","0"),
("5378","1","40","5","image","Fotka v hlavnom slideri 2","_menu_1_image_2","621","1","0","0"),
("5379","1","40","4","content","Po ukončení registrácie","field_word_koniec_registracie","<p>&nbsp;</p>\n\n<p style=\"text-align:center\">&nbsp;</p>\n","0","0","0"),
("5380","1","40","11","content","Názov modulu pre modul O PARTNEROVI","_menu_name_8","J.Lindeberg","1","5","0"),
("5381","1","40","15","content","Email partnera","info_partner_email","info@jlindeberg.com","1","0","0"),
("5382","1","40","15","content","Adresa partnera","info_partner_addr","Stadsgårdshamnen 24 <br/> 116 45 STOCKHOLM - SWEDEN","1","0","0"),
("5383","1","40","15","content","Názov partnera","info_partner_name","J.Lindeberg","1","0","0"),
("5384","1","40","15","content","Telefónne číslo na partnera","info_partner_tel_c","+46 8 506 850 00","1","0","0"),
("5385","1","40","11","content","Text k modulu O PARTNEROVI 1","_menu_8_text_1","<p>The Scandinavian Fashion House J. Lindeberg was founded in Stockholm 1996 with the vision to build an international brand for modern and aware consumers. The company bridges fashion and function, offering outstanding products for a modern active lifestyle. The collection consists of menswear and womenswear offering fashion, tailoring, active, golf and skiwear. The fashion collections are presented at the international fashion weeks, in e.g. New York, Beijing, London and Stockholm - the sportswear collections are worn by some of the world&rsquo;s best athletes. Today distribution covers more than 35 countries and there are close to 90 J.Lindeberg stores and 35 shop-in-shops in e.g. Stockholm, Copenhagen, Oslo, Munich, New York, Miami, Tokyo, Hong Kong, Beijing, and Shanghai. J. Lindeberg is sold in over 900 stores, including the leading high-end department and specialty stores around the world. The company is headquartered in Stockholm, Sweden.</p>\n","1","0","0"),
("5386","1","40","1","content","Jazyková mutácia pre Facebook","_language","en_EN","1","0","0"),
("5387","1","40","12","image","Newsletter 2 (PDF)","form_file_newsletter_2","615","0","0","0"),
("5388","1","40","4","content","Súhlasím s newslettrom 2","field_word_suhlas_news_2","News 2","0","0","0"),
("5389","1","40","18","content","Email hotelu 4","info_hotel_email_4","welcome@tirolerhof.co.at","0","0","0"),
("5390","1","40","18","content","Telefón do hotela 4","info_hotel_tel_c_4","+43(0)6542/772-0","0","0","0"),
("5391","1","40","18","content","Adresa Hotela 4","info_hotel_addr_4","Auerspergstrasse 5   <br/>   A - 5700 Zell am See","1","0","0"),
("5392","1","40","18","content","Názov hotelu 4","info_hotel_name_4","Hotel Tirolerhof ****S","0","0","0"),
("5393","1","40","18","image","Fotka loga k modulu UBYTOVANIE 4","_menu_7_image_1_4","","0","0","0"),
("5394","1","40","18","image","Fotka k modulu UBYTOVANIE 4","_menu_7_image_2_4","","1","0","0"),
("5395","1","40","18","content","Url adresa hotela 4","link_hotel_4","http://www.tirolerhof.co.at/","0","0","0"),
("5396","1","40","18","content","Text k modulu UBYTOVANIE 4","_menu_7_text_4","","0","0","0"),
("5397","1","40","11","image","Fotka k modulu O PARTNEROVI","_menu_8_image_1","620","1","0","0"),
("5398","1","40","1","content","Google Plus","social_google_plus","https://www.instagram.com/saalfelden_leogang/","1","0","0"),
("5399","1","40","12","content","Input Otázka","form_extend_v2_otazka","frage2","0","0","0"),
("5400","1","40","13","content","Odoslať potvrdzovací email","sent_confirm_mail","1","1","0","0"),
("5401","1","40","12","content","Voliteľný parameter 1","form_base_custom_1","Country","1","0","0");




CREATE TABLE `dnt_polls` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;


INSERT INTO dnt_polls VALUES
("1","1","Objektovo orientované programovanie","objektovo-orientovane-programovanie","739","<p>OOP dok&aacute;že mnoho ľud&iacute; spoľahlivo odradiť hneď na začiatku v&yacute;razmi ako dedičnosť, polymorfizmus, zapuzdrenie, abstrakcia a in&yacute;mi veľmi m&uacute;dro znej&uacute;cimi slovami. My v&aacute;m norm&aacute;lnou ľudskou rečou veľmi r&yacute;chlo uk&aacute;žeme, že sa za t&yacute;m neskr&yacute;va skutočne nič zložit&eacute;.</p>\n","1","4","2017-02-04 10:50:17","2017-02-04 10:50:17","2017-02-04 10:50:17","1","0"),
("9","1","Na ktorého obľúbeného Markízaka sa ponášate?","na-ktoreho-oblubeneho-markizaka-sa-ponasate","740","<p><span style=\"font-family:roboto,sans-serif,tahoma; font-size:15px\">Pripravili sme pre v&aacute;s hor&uacute;cu novinku - origin&aacute;lne interakt&iacute;vne kv&iacute;zy z na&scaron;ej dieľne.</span><strong>Telev&iacute;zia Mark&iacute;za&nbsp;</strong><span style=\"font-family:roboto,sans-serif,tahoma; font-size:15px\">je s&uacute;časťou v&aacute;&scaron;ho života už dvadsať rokov. Pozn&aacute;te jej moder&aacute;torov a redaktorov? Na ktor&eacute;ho z nich sa pon&aacute;&scaron;ate? Urobte si kv&iacute;z.&nbsp;&nbsp;</span></p>\n","2","5","2017-02-05 10:49:07","2017-02-05 10:49:07","2017-02-05 10:49:07","1","0");




CREATE TABLE `dnt_polls_composer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
) ENGINE=InnoDB AUTO_INCREMENT=690 DEFAULT CHARSET=utf8;


INSERT INTO dnt_polls_composer VALUES
("1","1","0","","winning_combination","","","0","0","5","0","1"),
("2","1","0","","winning_combination","","","0","0","5","0","1"),
("3","1","0","","winning_combination","","","0","0","5","0","1"),
("4","1","1","","question","Na čo slúžia výnimky (exceptions) ?","","0","0","5","0","1"),
("5","1","1","","ans"," na iné","","0","0","0","0","1"),
("6","1","1","","ans","Pre prehľadnosť kódu","","0","0","5","0","1"),
("7","1","1","","ans","na ošetrenie chýb","","1","0","0","0","1"),
("8","1","1","","ans","na zmenu vykonávania","","0","0","0","0","1"),
("9","1","2","","question","Kde nie je možné použiť kľúčové slovo this?","","0","0","4","0","1"),
("10","1","2","","ans","pri preťažených konštruktoroch","","0","0","0","0","1"),
("11","1","2","","ans","v konštruktore","","0","0","0","0","1"),
("12","1","2","","ans","v metódach","","0","0","0","0","1"),
("13","1","2","","ans","v statických metódach","","1","0","0","0","1"),
("14","1","3","","question","Premenná, ktorej predchádza kľúčové slovo private je dostupná","","0","0","3","0","1"),
("15","1","3","","ans"," len v rámci triedy","","1","0","0","0","1"),
("16","1","3","","ans"," v hociktorej triede","","0","0","0","0","1"),
("17","1","3","","ans"," len pri vytváraní","","0","0","0","0","1"),
("18","1","3","","ans","len v rámci hierarchie tried","","0","0","0","0","1"),
("19","1","4","","question","Objekt v OOP predstavuje","","0","0","2","0","1"),
("20","1","4","","ans","inštanciu rozhrania","","0","0","0","0","1"),
("21","1","4","","ans"," triedu","","0","0","0","0","1"),
("22","1","4","","ans","inštanciu triedy","","1","0","0","0","1"),
("23","1","4","","ans","inštanciu triedy alebo rozhrania","","0","0","0","0","1"),
("24","1","5","","question","Ktoré prvky sa dajú volať bez vytvorenia objektu?","","0","0","1","0","1"),
("25","1","5","","ans","nestatické metódy","","0","0","0","0","1"),
("26","1","5","","ans","funkcie","","0","0","0","0","1"),
("27","1","5","","ans"," statické metódy","","1","0","0","0","1"),
("28","1","5","","ans"," všetky metódy","","0","0","0","0","1"),
("29","1","6","","question","Kedy sa volá deštruktor triedy?","","0","0","0","0","1"),
("30","1","6","","ans","pri zániku triedy","","0","0","0","0","1"),
("31","1","6","","ans"," pri inicializácii objektu","","0","0","0","0","1"),
("32","1","6","","ans"," pri inicializácii triedy","","0","0","0","0","1"),
("33","1","6","","ans"," žiadna správna odpoveď","","1","0","0","0","1"),
("34","1","7","","question","Ktoré prvky obsahuje trieda?","","0","0","0","0","1"),
("35","1","7","","ans"," premenné","","0","0","0","0","1"),
("36","1","7","","ans"," funkcie a premenné","","0","0","0","0","1"),
("37","1","7","","ans"," metódy a premenné","","1","0","0","0","1"),
("38","1","7","","ans","konštruktor a deštruktor","","0","0","0","0","1"),
("39","1","8","","question","Prístup protected je vhodné použiť pri prvkoch, ku ktorým chceme pristupovať","","0","0","0","0","1"),
("40","1","8","","ans"," v odvodených triedach","","1","0","0","0","1"),
("41","1","8","","ans"," v danej triede","","0","0","0","0","1"),
("42","1","8","","ans"," len so zabezpečenými objektami","","0","0","0","0","1"),
("43","1","8","","ans"," len so zabezpečeným prístupom","","0","0","0","0","1"),
("257","9","0","Ste štýlová osobnosť , ktorá má vo veciach jasno. Úspešne ste naštartovali svoju kariéru, ktorú zvládate rovnocenne kombinovať s rodinou. Hlučné večierky a masy ľudí nie sú nič pre vás, prednosť dávate rodinnému krbu, aj keď na to nevyzeráte. Na verejnosti sa totiž vždy objavíte dokonalo zladený a hýrite šarmom. Presne ako moderátorka Televíznych novín \n    <b>Zlatica Puškárová\n    </b>. ","winning_combination"," Zlatica Puškárová","741","0","4","5","0","1"),
("258","9","0","Akcia, pohyb, výzva! To je váš svet, v ktorom sa cítite ako ryba vo vode. V kancelárii by ste neobsedeli, musíte neustále niečo robiť. Šplhať sa na vrcholky hôr, brodiť sa rozbúrenou riekou či bicyklovať desiatky kilometrov. Život je pre vás výzva a vy máte výzvy rád. Hodené rukavice prijímate a keď je toho na vás veľa, hlavu si prečistíte v prírode. Napríklad jazdou na koni ako redaktor \n    <b>Ján Tribula\n    </b>.","winning_combination"," Ján Tribula","742","0","8","5","0","1"),
("259","9","0","Váš život je šport, aktivita a zdravý životný štýl. Snažíte sa však aj o súlad s duchom a preto sa neustále rozvíjate. Učíte sa cudzie jazyky, čítate a ste schopný zariadiť množstvo vecí. Pôsobíte nenápadne, nerád na seba strhávate pozornosť. V spoločnosti priateľov sa však meníte na parketového leva. Presne ako športový redaktor \n    <b>Peter Varinský\n    </b>.","winning_combination"," Peter Varinský","743","0","12","5","0","1"),
("260","9","1","","question","Kráčate po ulici a zrazu vidíte sanitky, policajtov, masu ľudí a počujete krik. Čo urobíte?","","0","0","5","0","1"),
("261","9","1","","ans","Okamžite utekám priamo tam, musím vedieť čo sa stalo.","","0","1","0","0","1"),
("262","9","1","","ans","Všetko poctivo zdokumentujem a nezabudnem na selfie.","","0","2","0","0","1"),
("263","9","1","","ans","Zbystrím pozornosť, no zostávam v úzadí.","","0","3","0","0","1"),
("264","9","1","","ans","Bežím na miesto činu bez rozmyslenia, túžim priložiť ruku k dielu a upokojiť situáciu.","","0","4","0","0","1"),
("265","9","1","","ans","Opatrne sa tam priblížim, možno niekto bude potrebovať pomoc.","","0","5","0","0","1"),
("266","9","2","","question","Je leto, teplo, slnko a voda láka. Kde sa vidíte počas prázdnin?","","0","0","4","0","1"),
("267","9","2","","ans","Na skvelej dovolenke all inclusive s rodinou","","0","1","0","0","1"),
("268","9","2","","ans","Niekde v Slovenskom raji, ideálne blízko pri koníkoch","","0","2","0","0","1"),
("269","9","2","","ans","Skoro ráno hodina tenisu a podvečer si zaplávam","","0","3","0","0","1"),
("270","9","2","","ans","Nebudem zaháľať – zorganizujem akciu pre ľudí v núdzi","","0","4","0","0","1"),
("271","9","2","","ans","V nejakej novej destinácii, napríklad na Islande","","0","5","0","0","1"),
("272","9","3","","question","Aký je váš obľúbený styling?","","0","0","3","0","1"),
("273","9","3","","ans","Šik šaty, v ktorých vyzerám top","","0","1","0","0","1"),
("274","9","3","","ans","Športový štýl doplnený o štýlovú bundu","","0","2","0","0","1"),
("275","9","3","","ans","Kombinácia športovej elegancie","","0","3","0","0","1"),
("276","9","3","","ans","Vyžehlená prúžkovaná košeľa s nenápadnými nohavicami ZVOĽ","","0","4","0","0","1"),
("277","9","3","","ans","Hlavne pohodlne – džínsy, tričko a tenisky","","0","5","0","0","1"),
("278","9","4","","question","Čo si vždy rád pozriete v televízii?","","0","0","2","0","1"),
("279","9","4","","ans","Dobrou politickou debatou","","0","1","0","0","1"),
("280","9","4","","ans","Dokument z ríše zvierat","","0","2","0","0","1"),
("281","9","4","","ans","Akčný basketbalový zápas","","0","3","0","0","1"),
("282","9","4","","ans","Akýkoľvek film je pre mňa relaxom","","0","4","0","0","1"),
("283","9","4","","ans","Zmysluplný program s reálnymi príbehmi","","0","5","0","0","1"),
("284","9","5","","question","Po čom siahnete v reštaurácií?","","0","0","1","0","1"),
("285","9","5","","ans","Zvolím vyváženú kombináciu živín a chutí, nepotrebujem sa prepchávať.","","0","1","0","0","1"),
("286","9","5","","ans","Dobré slovenské recepty sú mi vždy po chuti.","","0","2","0","0","1"),
("287","9","5","","ans","Po niečom, čo spĺňa zásady zdravého stravovania.","","0","3","0","0","1"),
("288","9","5","","ans","Po rezni, omáčkach, knedlíkoch. Milujem dobré jedlo.","","0","4","0","0","1"),
("289","9","5","","ans","Vyberiem si jedlo bez mäsa, z presvedčenia.","","0","5","0","0","1"),
("290","9","0","Máte veľké srdce a neustále myslíte na druhých. Preto často zabúdate na seba a na svoj život. Obetujete sa pre dobro veci a najradšej by ste vyriešili každý problém. Robíte zbierky, zúčastňujete sa na benefičných akciách a teší vás každý úsmev blížneho v núdzi. Na svojom chrbte máte naložených akosi priveľa povinností, no vy to zvládate v dobrej nálade. Tak ako moderátor \n    <b>Patrik Herman\n    </b>. ","winning_combination","Patrik Herman","744","0","16","0","0","1"),
("291","9","0",">Ste príjemná osoba so srdcom na správnom mieste. Neúnavne veríte v dobro a každý dotyk s krutou realitou vás nepríjemne zaskočí. Všímate sa prírodu, životné prostredie a s ťažkosťou znášate nespravodlivosť okolo nás. Za jemnou fasádou sa však skrýva bojovník, ktorý si nenechá len tak ľahko skákať po hlave. Taká je aj moderátorka \n    <b>Janka Hospodárová\n    </b>.","winning_combination","Janka Hospodárová","745","0","20","0","0","1");




CREATE TABLE `dnt_post_type` (
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
) ENGINE=InnoDB AUTO_INCREMENT=449 DEFAULT CHARSET=utf8;


INSERT INTO dnt_post_type VALUES
("290","290","1","0","sitemap","sitemap","Stránky","1","0","1","0"),
("291","291","1","0","sitemap-sub","sitemap","Podstránky","1","0","1","0"),
("292","292","1","0","article","sitemap","Články","1","0","1","0"),
("293","293","3","0","newsletter","post","Newslettre","1","0","1","0"),
("294","294","2","0","domace","article","Domáce","1","0","1","0"),
("303","303","3","0","sliders","post","Sliders","1","0","1","0"),
("304","304","3","0","texty-na-homepage","post","Texty na homepage","1","0","1","0"),
("305","305","3","0","partneri","post","Partneri","1","0","1","0"),
("306","306","3","0","kontaktny-formular","post","Správy z kontaktného formulára","1","0","1","0"),
("307","307","2","0","zaujimavosti","article","Zaujímavosti","1","0","1","0"),
("308","308","0","0","eshop-product","product","Eshop Product","1","0","1","0");




CREATE TABLE `dnt_posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `search` varchar(1000) NOT NULL,
  `protected` int(11) NOT NULL DEFAULT '0',
  `vendor_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13574 DEFAULT CHARSET=utf8;


INSERT INTO dnt_posts VALUES
("13071","","137","post","Výskum a vývoj","slider-vyskum-a-vyvoj","0","0","","","262","2017-03-01 17:24:45","2017-03-01 17:26:24","2017-03-01 17:24:00","0","<p><span style=\"font-size:14px\">Neust&aacute;le hľad&aacute;me lep&scaron;ie rie&scaron;enia...</span></p>\n","","","","","","0","1","","0","1","0"),
("13289","","290","sitemap","Domov","domov","0","0","homepage","","976","2017-03-06 17:47:59","2018-09-07 12:44:37","2017-03-06 17:47:00","0","","","","","","","6","1","","0","1","0"),
("13349","","290","sitemap","O nás","o-nas","0","0","contact","","750","2017-04-06 10:40:47","2018-07-30 13:21:19","2017-04-06 10:40:00","0","<p>sdfvsdf</p>\n","<p>Vo firme Design.dnt pracujeme s r&ocirc;znymi modern&yacute;mi technol&oacute;giami, ktor&eacute; s&uacute; použ&iacute;van&eacute; vo webovom priemysle. Za t&yacute;mto &uacute;čelom sme vyvinuli vlastn&yacute; redakčn&yacute; syst&eacute;m pod n&aacute;zvom <a href=\"/technologie/redakcny-system\">Designdnt</a>&nbsp;Z&aacute;kladom syst&eacute;mu bola použ&iacute;vateľsk&aacute; jednoduchosť, finančn&aacute; dostupnosť a v neposlednom rade intuit&iacute;vnosť. Vďaka dlhodob&eacute;mu v&yacute;voju sa n&aacute;m podarilo vypracovať presne to, čo je perfektn&yacute;m z&aacute;kladom pre bežn&eacute; weby za finančne nen&aacute;ročn&eacute; požiadavky. V roz&scaron;&iacute;ren&iacute; o moduly eshopu, alebo o moduly sprac&uacute;vaj&uacute;ce hromadn&eacute; d&aacute;ta, vieme poskytn&uacute;ť perfektn&eacute; z&aacute;zemie pre <strong>informačn&yacute; syst&eacute;m</strong>.</p>\n\n<ol>\n	<li>vysok&aacute; r&yacute;chlosť jadra <strong>dnt3</strong></li>\n	<li>&quot;inteligentn&eacute;&quot; URL adresy s chronologickou postupnosťou</li>\n	<li>multydom&eacute;nov&aacute;&nbsp;platforma</li>\n	<li>multyvendor platforma</li>\n	<li>facebook - messenger platforma</li>\n	<li>automatick&aacute; gener&aacute;cia robots.txt, google sitemaps</li>\n	<li>jednoduch&aacute; in&scaron;tal&aacute;cia a z&aacute;loha datab&aacute;zy</li>\n	<li>Prepracovan&yacute; cache engine</li>\n	<li>multylanguage podpora</li>\n	<li>Modul kv&iacute;zov pre kv&iacute;zy s percentu&aacute;lnou &uacute;spe&scaron;nosťou</li>\n	<li>Modul kv&iacute;zov s v&yacute;sledkom kategoriz&aacute;cie</li>\n	<li>Modul obsahu</li>\n	<li>Modul sitemapy</li>\n	<li>Modul emailov&eacute;ho klienta</li>\n	<li>Modul spr&aacute;vy s&uacute;borov</li>\n	<li>Modul eshopu a &uacute;čtovn&iacute;ctva</li>\n	<li>Modul ACL (users)</li>\n	<li>Modul restov&eacute;ho JSON / XML api pre zdielanie informacii s tret&iacute;mi stranami</li>\n</ol>\n\n<p>Za zmienku stoj&iacute; poznamenať, že redakčn&yacute; syst&eacute;m Design.dnt z&iacute;skal <strong>3. miesto</strong> v Celo&scaron;t&aacute;tnej prehliadke Stredo&scaron;kolskej odbornej činnosti, kde pod t&yacute;mto syst&eacute;mom bol naprogramovan&yacute; modul eshopu s fakturačn&yacute;m, objedn&aacute;vkov&yacute;m a registračn&yacute;m syst&eacute;mom.</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n","","","","","5","1","","0","1","0"),
("13350","","303","post","HP slider 1","hp-slider-1","0","0","","","734","2017-04-06 10:48:57","2017-04-06 10:54:15","2017-04-06 10:48:00","0","","","","","","","0","1","","0","1","0"),
("13351","","303","post","HP slider 2","hp-slider-2","0","0","","","736","2017-04-06 10:54:30","2017-04-06 10:54:44","2017-04-06 10:54:00","0","","","","","","","0","1","","0","1","0"),
("13352","","303","post","HP slider 3","hp-slider-3","0","0","","","737","2017-04-06 10:54:55","2017-04-06 10:55:08","2017-04-06 10:54:00","0","","","","","","","0","1","","0","1","0"),
("13353","","304","post","Dnt3 Library","dnt3-library","0","0","","","","2017-04-06 10:57:05","2017-04-13 16:23:42","2017-04-06 10:57:00","0","<p>Dnt3 - Library je Objektovo orientovan&yacute; MVC framework, ktor&yacute; je na mieru prisp&ocirc;soben&yacute; pre redakčn&yacute; syst&eacute;m Designdnt3.</p>\n","<p>Z&aacute;kladn&yacute; text</p>\n","","","","","0","1","","0","1","0"),
("13354","","290","sitemap","Kvízy","kvizy","0","0","polls","","","2017-04-09 09:45:42","2018-09-07 12:42:02","2017-04-09 09:45:00","0","","","","","","","3","1","","0","1","0"),
("13355","","290","sitemap","Kontakt","kontakt","0","0","contact","","","2017-04-10 11:25:19","2018-07-30 14:48:59","2017-04-10 11:25:00","0","","","","","","","1","1","","0","1","0"),
("13356","","290","sitemap","Kontaktný formulár","form","0","0","partners","","","2017-04-10 11:27:16","2018-07-30 14:41:33","2017-04-10 11:27:00","0","","","","","","","2","1","","0","1","0"),
("13357","","290","sitemap","partneri","partneri","0","0","partners","","","2017-04-10 11:29:31","2018-09-07 12:45:39","2017-04-10 11:29:00","0","","","","","","","4","1","","0","1","0"),
("13359","","305","post","Designdnt3","http://designdnt.query.sk/domov","0","0","","","746","2017-04-10 11:59:04","2017-04-10 12:23:43","2017-04-10 11:59:00","0","","","","","","","0","1","","0","1","0"),
("13360","","305","post","Markíza","http://www.markiza.sk/uvod","0","0","","","747","2017-04-10 12:24:53","2017-04-10 12:25:11","2017-04-10 12:24:00","0","","","","","","","0","1","","0","1","0"),
("13361","","305","post","Tvnoviny","http://www.tvnoviny.sk/","0","0","","","748","2017-04-10 12:26:00","2017-04-10 12:26:18","2017-04-10 12:26:00","0","","","","","","","0","1","","0","1","0"),
("13362","","305","post","Osmos","http://osmos.sk/","0","0","","","749","2017-04-10 12:26:53","2017-04-10 12:27:28","2017-04-10 12:26:00","0","","","","","","","0","1","","0","1","0"),
("13364","","306","post","Test Message, Admin Root","test-message-admin-root","0","0","","","","2017-04-10 12:41:34","2017-04-10 12:41:34","2017-04-10 12:41:34","0","","\n	<h3>Test Message</h3><br/>\n	<b>Meno:</b>Admin Root<br/>\n	<b>Adresa:</b>Neznáma 24, 85101, Bratislava<br/>\n	<b>Telefón:</b>0912345678<br/>\n	<b>Email:</b>admon@root.sk<br/>\n	<b>Firma:</b>Designdnt<br/>\n	<b>Produkt:</b><br/><br/>\n	\n	\n	<b>SPRÁVA</b>:\n	Táto správa bola poslaná cez kontaktný formulár na webe skeletónu. A cez send grid bola odoslaná na mail príjmateľa nastaveného v nastaveniach webu.<br/><br/><b>Kontaktný email odosielateľa: <a href=\"mailto:admon@root.sk\">admon@root.sk</a></b>","","","","","0","0","","0","1","0"),
("13365","","290","sitemap","Články","clanky","0","0","article_list","303,305","","2017-04-10 12:43:40","2018-09-07 17:01:25","2017-04-10 12:43:00","0","","","","","","","0","1","","0","1","0"),
("13366","","304","post","Redakčný systém","redakcny-system","0","0","","","","2017-04-06 10:57:05","2017-04-13 16:38:27","2017-04-06 10:57:00","0","<p>Redakčn&yacute; syst&eacute;m je syst&eacute;m na spr&aacute;vu webovej str&aacute;nke. V tomto pr&iacute;pade sa jedn&aacute; o skelet&oacute;n aplik&aacute;ciu. Cez CMS Designdnt3 sa daj&uacute; vytv&aacute;rať&nbsp;webov&eacute; str&aacute;nky na platforme &quot;multydomain&quot;. Prvotn&yacute; v&yacute;voj začal v roku 2012, do značky <strong>Designdnt3&nbsp;</strong>sa dostal v roku 2014, odkedy je v&yacute;voj veden&yacute; v objektovo orientovanej platforme design patterne MVC.</p>\n","<p>Z&aacute;kladn&yacute; text</p>\n","","","","","0","1","","0","1","0"),
("13367","","304","post","Skeletón web","skeleton-web","0","0","","","","2017-04-06 10:57:05","2017-04-13 16:25:13","2017-04-06 10:57:00","0","<p>Skelet&oacute;n web je jednoduch&yacute; web, ktor&yacute; sa spust&iacute; po nain&scaron;talovan&iacute; frameworku dnt3. <a href=\"https://github.com/designdnt/cms-designdnt3\" target=\"_blank\">https://github.com/designdnt/cms-designdnt3&nbsp;</a></p>\n","<p>Z&aacute;kladn&yacute; text</p>\n","","","","","0","1","","0","1","0"),
("13368","","290","sitemap","Eshop","produkty","0","0","eshop","","","2017-04-25 09:39:04","2018-09-07 12:49:33","2017-04-25 09:39:00","0","","","","","","","0","1","","0","1","0"),
("13369","","294","article","","","0","0","","","","2017-04-25 09:49:05","2017-04-25 09:49:05","2017-04-25 09:49:05","0","","","","","","","0","0","","0","1","0"),
("13370","","308","product","Iphone 5 SE","iphone-5-se","0","0","","","","2017-04-25 09:49:42","2017-04-25 09:50:00","2017-04-25 09:49:00","0","","","","","","","0","1","","0","1","0"),
("13392","","290","sitemap","Microsites","microsites","0","0","microsites","","","2017-05-01 11:44:03","2018-09-07 12:51:24","2017-05-01 11:44:00","0","","","","","","","0","0","","0","1","0"),
("13573","","291","sitemap","Domáce","domace","0","0","article_list","","","2018-09-07 13:17:09","2018-09-07 13:17:23","2018-09-07 13:17:00","0","","","","","","","0","1","","0","1","0");




CREATE TABLE `dnt_posts_meta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_entity` int(11) NOT NULL,
  `service` varchar(300) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `key` varchar(300) NOT NULL,
  `value` text NOT NULL,
  `description` varchar(1000) NOT NULL,
  `show` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=290 DEFAULT CHARSET=utf8;


INSERT INTO dnt_posts_meta VALUES
("1","13289","homepage","1","name","uvod","Url adresa","1"),
("2","13289","homepage","1","name_url","Úvod","Nazov sekcie","1"),
("3","13289","homepage","1","info","Toto je info","Informácie","1"),
("16","13349","contact","1","info","Toto je info","Informácie","1"),
("17","13349","contact","1","info_url","Toto je info url","Informácie url","1"),
("52","13354","about-us","1","about-us","Toto je about-us","about-us","1"),
("98","13357","homepage","1","name","uvod","Url adresa","1"),
("99","13357","homepage","1","name_url","Úvod","Nazov sekcie","1"),
("100","13357","homepage","1","info","Toto je info","Informácie","1"),
("101","13357","homepage","1","test","Toto je test","Testovacia zóna","0"),
("196","13289","homepage","1","test","Toto je test","Testovacia zóna","0"),
("211","13349","contact","1","test","Toto je test","Testovacia zóna","0"),
("225","13354","about-us","1","test","Toto je about-us","about-us zóna","0"),
("244","13289","homepage","1","add","Toto je info","Informácie","1"),
("262","13349","contact","1","new","Toto je info url","Informácie url","1"),
("285","13357","homepage","1","add","Toto je info","Informácie","1"),
("286","13355","contact","1","info","Toto je info","Informácie","1"),
("287","13355","contact","1","info_url","Toto je info url","Informácie url","1"),
("288","13355","contact","1","new","Toto je info url","Informácie url","1"),
("289","13355","contact","1","test","Toto je test","Testovacia zóna","0");




CREATE TABLE `dnt_registred_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vendor_id` int(11) NOT NULL,
  `competition_id` int(11) NOT NULL,
  `uniq_id` varchar(300) NOT NULL,
  `typ` varchar(100) NOT NULL,
  `id_generovane` int(11) NOT NULL,
  `meno` varchar(300) NOT NULL,
  `priezvisko` varchar(300) NOT NULL,
  `login` varchar(300) NOT NULL,
  `ulica` varchar(300) NOT NULL,
  `c_domu` varchar(300) NOT NULL,
  `mesto` varchar(300) NOT NULL,
  `okres` int(11) NOT NULL,
  `krajina` varchar(300) NOT NULL,
  `psc` varchar(100) NOT NULL,
  `heslo` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `url` varchar(300) NOT NULL,
  `tel_c` varchar(300) NOT NULL,
  `custom_1` varchar(300) NOT NULL,
  `cas` varchar(100) NOT NULL,
  `hladam` int(11) NOT NULL,
  `sex` int(11) NOT NULL,
  `vaha` int(11) NOT NULL,
  `vyska` int(11) NOT NULL,
  `datum_den` int(11) NOT NULL,
  `datum_mesiac` int(11) NOT NULL,
  `datum_rok` int(11) NOT NULL,
  `podmienky` varchar(300) NOT NULL,
  `news` varchar(300) NOT NULL,
  `news_2` varchar(300) NOT NULL DEFAULT '0',
  `abcdef` int(11) NOT NULL,
  `odpoved` varchar(300) NOT NULL,
  `about` text NOT NULL,
  `url_fotka` varchar(300) NOT NULL,
  `fotka_pripona` varchar(300) NOT NULL,
  `zobrazenie` int(11) NOT NULL,
  `kliknute` int(11) NOT NULL DEFAULT '0',
  `ip_adresa` varchar(300) NOT NULL,
  `parent_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;


INSERT INTO dnt_registred_users VALUES
("1","1","1","5908cfebc4a65","1","0","tomas","doubek","","","","Bratislava","0","","84101","","thomas.doubek@gmail.com","","+421944243444","","20:28:59","0","0","0","0","2","5","2017","1","1","0","0","test","","","","0","0","::1","0"),
("2","1","1","5908d06757c78","1","0","tomas","doubek","","","","Bratislava","0","","84101","","thomas.doubek@gmail.com","","+421944243444","","20:31:03","0","0","0","0","2","5","2017","1","1","0","0","test","","","","0","0","::1","0");




CREATE TABLE `dnt_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_entity` int(11) NOT NULL,
  `type` varchar(300) NOT NULL,
  `key` varchar(300) NOT NULL,
  `value` varchar(300) NOT NULL,
  `description` varchar(300) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `show` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1742 DEFAULT CHARSET=utf8;


INSERT INTO dnt_settings VALUES
("1314","0","","description","Designdnt corporation","","1","0"),
("1313","0","","google_map","https://www.google.sk/maps/@48.2091661,17.0034239,13z?hl=sk","","1","0"),
("1311","0","","default_lang","","","1","0"),
("1312","0","","default_stat_user","","","1","0"),
("1310","0","","no_comment","no_comment.png","","1","0"),
("1309","0","","no_img","259","","1","0"),
("1308","0","","logo_firmy","733","","1","0"),
("1307","0","","vendor_currency_nazov","Eur","","1","0"),
("1306","0","","platca_dph","1","","1","0"),
("1305","0","","instagram","https://instagram.com/dnt-system/","","1","0"),
("1304","0","","facebook","https://www.facebook.com","","1","0"),
("1303","0","","vendor_currency","€","","1","0"),
("1300","0","","vendor_dic","","","1","0"),
("1301","0","","vendor_iban","","","1","0"),
("1302","0","","vendor_dph","20","","1","0"),
("1299","0","","vendor_ico","","","1","0"),
("1295","0","","vendor_city","Bratislava","","1","0"),
("1296","0","","vendor_tel","","","1","0"),
("1297","0","","vendor_fax","","","1","0"),
("1298","0","","vendor_email","thomas.doubek@gmail.com","","1","0"),
("1294","0","","vendor_psc","","","1","0"),
("1291","0","","blokvane_ip","","","1","0"),
("1292","0","","vendor_street","Koprivnická 13","","1","0"),
("1293","0","","vendor_company","Skeleton","","1","0"),
("1290","0","","notifikacny_email","info@query.sk","","1","0"),
("1289","0","","sirka_fotky_sponzori_modul","200","","1","0"),
("1287","0","","web","","","1","0"),
("1288","0","","google_plus","https://plus.google.com/","","1","0"),
("1286","0","","linked_in","https://www.linkedin.com/","","1","0"),
("1285","0","","flickr","","","1","0"),
("1284","0","","youtube","https://www.youtube.com/watch?v=Hlq5gMC-1is","","1","0"),
("1283","0","","twitter","","","1","0"),
("1282","0","","facebook_page","https://www.facebook.com/designdnt","","1","0"),
("1280","0","","startovaci_modul","","","1","0"),
("1281","0","","target","","","1","0"),
("1276","0","","title","Skeletón","","1","0"),
("1277","0","","keywords","skeleton, dnt3, designdnt, application","","1","0"),
("1278","0","","cachovanie","1","","1","0"),
("1279","0","","server","http://prvedentalnecentrum.sk/","","1","0"),
("1433","0","","msg_access_token","EAAZAep9FZCRqUBANOenKZCRAUcyUOhbfKHOWJ5ci35AyGdIcUrQsHGZCZA9ycIASGmZCEwhjLqKyF98ViEErTtcrKn5GbB2UfLkBtJMLrbT5Cnzi3YFVsLV4g298yE1xoS1Lzq0FWmCmz234MboDFYKjcc2p1tYhmO2Oaokj44ZBAZDZD","","1","0"),
("1432","0","","msg_hub_verify_token","TOKEN_dnt_bot_partak_2016_heroku","","1","0"),
("1719","1","custom","layout","dnt_first","Template","1","1"),
("1720","1","custom","real_address","http://www.vyhrat.com/","Zobraziť na URL adrese","1","1"),
("1721","1","custom","social_fb","https://www.facebook.com/Pompo.hracky","Facebook","1","1"),
("1722","1","custom","social_twitter","https://twitter.com/","Twitter","1","0"),
("1723","1","custom","social_linked_in","https://www.linkedin.com/","Instagram","1","0"),
("1724","1","custom","map_location","https://www.google.sk/maps/place/Zell+am+See-Kaprun+Tourismus+GmbH/@47.3221006,12.7943083,17z/data=!3m1!4b1!4m2!3m1!1s0x47771cdf4f490061:0xba82c342ef002324","Mapa ","1","1"),
("1725","1","custom","favicon","619","Favicon","1","1"),
("1726","1","custom","_r","75","Model farby R","1","1"),
("1727","1","custom","_g","115","Model farby G","1","1"),
("1728","1","custom","_b","175","Model farby B","1","1"),
("1729","1","custom","_font","Georgia","Font","1","1"),
("1730","1","custom","youtube_video","U3WaV52UqDM","Youtube video","1","1"),
("1731","1","custom","keywords","soutěž Pompo Zell am See-Kaprun","Kľúčové slová pre Google","1","1"),
("1732","1","custom","description","This competition has a first ID","Popis pre Google","1","1"),
("1733","1","custom","_language","cs_CZ","Jazyková mutácia pre Facebook","1","1"),
("1734","1","custom","social_google_plus","","Google Plus","1","0"),
("1735","1","custom","impressum","","Impressum","1","0"),
("1736","1","custom","footer_color_r","","Footer model farby R","1","0"),
("1737","1","custom","footer_color_g","","Footer model farby G","1","0"),
("1738","1","custom","footer_color_b","","Footer model farby B","1","0"),
("1739","1","custom","pixel_retargeting","","Pixel Retargeting","1","0"),
("1740","1","custom","ga_key","UA-83689446-1","Google Analytics key","1","1"),
("1741","1","custom","data_protection","","Data Protection","1","0");




CREATE TABLE `dnt_translates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vendor_id` int(11) NOT NULL,
  `lang_id` varchar(100) NOT NULL,
  `translate_id` varchar(300) NOT NULL,
  `type` varchar(300) NOT NULL,
  `table` varchar(300) NOT NULL,
  `translate` text NOT NULL,
  `show` int(11) NOT NULL DEFAULT '1',
  `parent_id` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=88848 DEFAULT CHARSET=utf8;


INSERT INTO dnt_translates VALUES
("75433","1","sk","home","static","","Domov","1","0"),
("75434","1","en","home","static","","Home","1","0"),
("75435","1","sk","home","static","","Domov","1","0"),
("75436","1","en","home","static","","Home","1","0"),
("75437","1","en","4589","name","dnt_posts","About us","1","0"),
("75438","1","en","4592","name","dnt_posts","About us 2","1","0"),
("75439","1","en","8972","name","dnt_posts","Test Article","1","0"),
("75440","1","en","8972","name_url","dnt_posts","test-article","1","0"),
("75441","1","en","8972","perex","dnt_posts","<p>I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account</p>\n","1","0"),
("75442","1","en","8972","content","dnt_posts","<p>I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account</p>\n","1","0"),
("75443","1","en","8972","tags","dnt_posts","car,test","1","0"),
("75444","1","de","8972","name","dnt_posts","Ta test","1","0"),
("75445","1","de","8972","name_url","dnt_posts","ta-test","1","0"),
("75446","1","de","8972","perex","dnt_posts","<p>I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account</p>\n","1","0"),
("75447","1","de","8972","content","dnt_posts","<p>I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account</p>\n","1","0"),
("75448","1","de","8972","tags","dnt_posts","das auto, das test","1","0"),
("75449","1","en","10498","name","dnt_posts","","1","0"),
("75450","1","en","10498","name_url","dnt_posts","","1","0"),
("75451","1","en","10498","perex","dnt_posts","","1","0"),
("75452","1","en","10498","content","dnt_posts","","1","0"),
("75453","1","en","10498","tags","dnt_posts","","1","0"),
("75454","1","de","10498","name","dnt_posts","","1","0"),
("75455","1","de","10498","name_url","dnt_posts","","1","0"),
("75456","1","de","10498","perex","dnt_posts","","1","0"),
("75457","1","de","10498","content","dnt_posts","","1","0"),
("75458","1","de","10498","tags","dnt_posts","","1","0"),
("75459","1","en","13064","name","dnt_posts","","1","0"),
("75460","1","en","13064","name_url","dnt_posts","","1","0"),
("75461","1","en","13064","perex","dnt_posts","","1","0"),
("75462","1","en","13064","content","dnt_posts","","1","0"),
("75463","1","en","13064","tags","dnt_posts","","1","0"),
("75464","1","de","13064","name","dnt_posts","","1","0"),
("75465","1","de","13064","name_url","dnt_posts","","1","0"),
("75466","1","de","13064","perex","dnt_posts","","1","0"),
("75467","1","de","13064","content","dnt_posts","","1","0"),
("75468","1","de","13064","tags","dnt_posts","","1","0"),
("75469","1","en","13065","name","dnt_posts","cfhfghg","1","0"),
("75470","1","en","13065","name_url","dnt_posts","","1","0"),
("75471","1","en","13065","perex","dnt_posts","","1","0"),
("75472","1","en","13065","content","dnt_posts","","1","0"),
("75473","1","en","13065","tags","dnt_posts","","1","0"),
("75474","1","de","13065","name","dnt_posts","","1","0"),
("75475","1","de","13065","name_url","dnt_posts","","1","0"),
("75476","1","de","13065","perex","dnt_posts","","1","0"),
("75477","1","de","13065","content","dnt_posts","","1","0"),
("75478","1","de","13065","tags","dnt_posts","","1","0"),
("75479","1","en","13066","name","dnt_posts","","1","0"),
("75480","1","en","13066","name_url","dnt_posts","","1","0"),
("75481","1","en","13066","perex","dnt_posts","","1","0"),
("75482","1","en","13066","content","dnt_posts","","1","0"),
("75483","1","en","13066","tags","dnt_posts","","1","0"),
("75484","1","de","13066","name","dnt_posts","","1","0"),
("75485","1","de","13066","name_url","dnt_posts","","1","0"),
("75486","1","de","13066","perex","dnt_posts","","1","0"),
("75487","1","de","13066","content","dnt_posts","","1","0"),
("75488","1","de","13066","tags","dnt_posts","","1","0"),
("75489","1","en","13063","name","dnt_posts","","1","0"),
("75490","1","en","13063","name_url","dnt_posts","","1","0"),
("75491","1","en","13063","perex","dnt_posts","","1","0"),
("75492","1","en","13063","content","dnt_posts","","1","0"),
("75493","1","en","13063","tags","dnt_posts","","1","0"),
("75494","1","de","13063","name","dnt_posts","","1","0"),
("75495","1","de","13063","name_url","dnt_posts","","1","0"),
("75496","1","de","13063","perex","dnt_posts","","1","0"),
("75497","1","de","13063","content","dnt_posts","","1","0"),
("75498","1","de","13063","tags","dnt_posts","","1","0"),
("75499","1","en","13067","name","dnt_posts","Tooling & Molding<br/> ","1","0"),
("75500","1","en","13067","name_url","dnt_posts","","1","0"),
("75501","1","en","13067","perex","dnt_posts","<p>In 2016 we decided to expand the scope of the company in Bytča, we opened a new technology center for the production and treatment of injection molds for plastics.</p>\n","1","0"),
("75502","1","en","13067","content","dnt_posts","","1","0"),
("75503","1","en","13067","tags","dnt_posts","","1","0"),
("75504","1","de","13067","name","dnt_posts","Werkzeug- und Vorrichtungsbau","1","0"),
("75505","1","de","13067","name_url","dnt_posts","","1","0"),
("75506","1","de","13067","perex","dnt_posts","<p>Dieser Beitrag hat keine Vorschau Artikel, weil ihr Inhalt ist wahrscheinlich von multymedi&aacute;lneho Inhalt bestehen. Bitte klicken um mehr zu lesen und Sie k&ouml;nnen den gew&auml;hlten Inhalt zu sehen.</p>\n","1","0"),
("75507","1","de","13067","content","dnt_posts","","1","0"),
("75508","1","de","13067","tags","dnt_posts","","1","0"),
("75509","1","en","13068","name","dnt_posts","","1","0"),
("75510","1","en","13068","name_url","dnt_posts","","1","0"),
("75511","1","en","13068","perex","dnt_posts","","1","0"),
("75512","1","en","13068","content","dnt_posts","","1","0"),
("75513","1","en","13068","tags","dnt_posts","","1","0"),
("75514","1","de","13068","name","dnt_posts","","1","0"),
("75515","1","de","13068","name_url","dnt_posts","","1","0"),
("75516","1","de","13068","perex","dnt_posts","","1","0"),
("75517","1","de","13068","content","dnt_posts","","1","0"),
("75518","1","de","13068","tags","dnt_posts","","1","0"),
("75519","1","en","13069","name","dnt_posts","Research & Development<br/> ","1","0"),
("75520","1","en","13069","name_url","dnt_posts","","1","0"),
("75521","1","en","13069","perex","dnt_posts","<p>Today s full-time startups and new technologies have increasingly higher demands on the functionality and efficiency of the solutions available on the market.</p>\n","1","0"),
("75522","1","en","13069","content","dnt_posts","","1","0"),
("75523","1","en","13069","tags","dnt_posts","","1","0"),
("75524","1","de","13069","name","dnt_posts","Forschung und Entwicklung","1","0"),
("75525","1","de","13069","name_url","dnt_posts","","1","0"),
("75526","1","de","13069","perex","dnt_posts","<p>Die heutige Vollzeit Start-ups und neue Technologien haben immer h&ouml;here Anforderungen an die Funktionalit&auml;t und Effizienz der verf&uuml;gbaren L&ouml;sungen auf dem Markt.</p>\n","1","0"),
("75527","1","de","13069","content","dnt_posts","","1","0"),
("75528","1","de","13069","tags","dnt_posts","","1","0"),
("75529","1","en","13071","name","dnt_posts","Research & Development","1","0"),
("75530","1","en","13071","name_url","dnt_posts","","1","0"),
("75531","1","en","13071","perex","dnt_posts","<p>We are constantly looking for better solutions...</p>\n","1","0"),
("75532","1","en","13071","content","dnt_posts","","1","0");
INSERT INTO dnt_translates VALUES
("75533","1","en","13071","tags","dnt_posts","","1","0"),
("75534","1","de","13071","name","dnt_posts","Forschung und Entwicklung","1","0"),
("75535","1","de","13071","name_url","dnt_posts","","1","0"),
("75536","1","de","13071","perex","dnt_posts","<p>Wir sind st&auml;ndig auf der Suche nach besseren L&ouml;sungen...</p>\n","1","0"),
("75537","1","de","13071","content","dnt_posts","","1","0"),
("75538","1","de","13071","tags","dnt_posts","","1","0"),
("75539","1","en","13072","name","dnt_posts","PDC","1","0"),
("75540","1","en","13072","name_url","dnt_posts","","1","0"),
("75541","1","en","13072","perex","dnt_posts","<p><strong>Plan-de-Campagne</strong><span style=\"font-family:tahoma,geneva,sans-serif; font-size:15.4px\">&nbsp;</span><strong>(PdC)</strong><span style=\"font-family:tahoma,geneva,sans-serif; font-size:15.4px\">&nbsp;is&nbsp;....</span></p>\n","1","0"),
("75542","1","en","13072","content","dnt_posts","","1","0"),
("75543","1","en","13072","tags","dnt_posts","","1","0"),
("75544","1","de","13072","name","dnt_posts","PDC","1","0"),
("75545","1","de","13072","name_url","dnt_posts","","1","0"),
("75546","1","de","13072","perex","dnt_posts","","1","0"),
("75547","1","de","13072","content","dnt_posts","","1","0"),
("75548","1","de","13072","tags","dnt_posts","","1","0"),
("75549","1","en","13073","name","dnt_posts","Free production capacities","1","0"),
("75550","1","en","13073","name_url","dnt_posts","","1","0"),
("75551","1","en","13073","perex","dnt_posts","<p>Free production capacities for continuouse 5 axis milling</p>\n","1","0"),
("75552","1","en","13073","content","dnt_posts","","1","0"),
("75553","1","en","13073","tags","dnt_posts","","1","0"),
("75554","1","de","13073","name","dnt_posts","","1","0"),
("75555","1","de","13073","name_url","dnt_posts","","1","0"),
("75556","1","de","13073","perex","dnt_posts","","1","0"),
("75557","1","de","13073","content","dnt_posts","","1","0"),
("75558","1","de","13073","tags","dnt_posts","","1","0"),
("75559","1","en","header_top_vitajte_1","static","","Welcome visitor can you","1","0"),
("75560","1","en","alebo","static","","or","1","0"),
("75561","1","sk","header_top_vitajte_1","static","","Vitajte zákazník! Chcete sa","1","0"),
("75562","1","sk","alebo","static","","alebo","1","0"),
("75563","1","en","prihlasit","static","","Login to client zone","1","0"),
("75564","1","sk","prihlasit","static","","Prihlásenie do klientskej zóny","1","0"),
("75565","1","en","registrovat","static","","Create an Account","1","0"),
("75566","1","sk","registrovat","static","","Vytvoriť nový účet","1","0"),
("75567","1","en","moj_ucet","static","","My Account","1","0"),
("75568","1","sk","moj_ucet","static","","Môj účet","1","0"),
("75569","1","en","nakupny_kosik","static","","Orders List","1","0"),
("75570","1","sk","nakupny_kosik","static","","Nákupný košík","1","0"),
("75571","1","en","pridat_do_kosika","static","","+ add to cart","1","0"),
("75572","1","sk","pridat_do_kosika","static","","+ do košíka","1","0"),
("75573","1","en","zobrazit_ako","static","","View as","1","0"),
("75574","1","sk","zobrazit_ako","static","","Zobraziť ako","1","0"),
("75575","1","en","kategorie","static","","Categories","1","0"),
("75576","1","sk","kategorie","static","","Kategórie","1","0"),
("75577","1","en","zdielat","static","","+ share","1","0"),
("75578","1","sk","zdielat","static","","+ zdielať","1","0"),
("75579","1","en","prejst_na_produkt","static","","Go to the product","1","0"),
("75580","1","sk","prejst_na_produkt","static","","Prejsť na produkt","1","0"),
("75581","1","en","pridane","static","","Posted","1","0"),
("75582","1","sk","pridane","static","","Pridané","1","0"),
("75583","1","en","vysledky","static","","Results","1","0"),
("75584","1","sk","vysledky","static","","Výsledky","1","0"),
("75585","1","en","z","static","","of","1","0"),
("75586","1","sk","z","static","","z","1","0"),
("75587","1","en","stran","static","","pages","1","0"),
("75588","1","sk","stran","static","","strán","1","0"),
("75589","1","en","order_by_news","static","","Sort by latest","1","0"),
("75590","1","sk","order_by_news","static","","Zoradiť podľa najnovších","1","0"),
("75591","1","en","order_by_ship_asc","static","","Sort by cheapest","1","0"),
("75592","1","sk","order_by_ship_asc","static","","Zoradiť od najlacnejších","1","0"),
("75593","1","en","order_by_ship_desc","static","","Sort by most expensive","1","0"),
("75594","1","sk","order_by_ship_desc","static","","Zoradiť od najdrahších","1","0"),
("75595","1","en","order_by_name_a_z","static","","Sort by name (A - Z)","1","0"),
("75596","1","sk","order_by_name_a_z","static","","Podľa názvu (A - Z)","1","0"),
("75597","1","en","order_by_name_z_a","static","","Sort by name (Z - A)","1","0"),
("75598","1","sk","order_by_name_z_a","static","","Podľa názvu (Z - A)","1","0"),
("75599","1","en","vyber_znacku","static","","Choose a brand","1","0"),
("75600","1","sk","vyber_znacku","static","","Vyberte značku","1","0"),
("75601","1","en","nakupny_kosik_je_prazdny","static","","Your cart is empty!","1","0"),
("75602","1","sk","nakupny_kosik_je_prazdny","static","","Váš nákupný košík je prázdny!","1","0"),
("75603","1","en","nazov_produktu","static","","Product Image &amp; Name","1","0"),
("75604","1","sk","nazov_produktu","static","","Názov produktu a fotka","1","0"),
("75605","1","en","cena","static","","Price","1","0"),
("75606","1","sk","cena","static","","Cena","1","0"),
("75607","1","en","pocet_kusov","static","","Quantity","1","0"),
("75608","1","sk","pocet_kusov","static","","Počet kusov","1","0"),
("75609","1","en","sub_total","static","","Overal / items","1","0"),
("75610","1","sk","sub_total","static","","Spolu / počet kusov","1","0"),
("75611","1","en","vymazat","static","","Remove","1","0"),
("75612","1","sk","vymazat","static","","Vymazať","1","0"),
("75613","1","en","upravit","static","","Update","1","0"),
("75614","1","sk","upravit","static","","Upraviť","1","0"),
("75615","1","en","suma","static","","Resulting amount","1","0"),
("75616","1","sk","suma","static","","Výsledná suma","1","0"),
("75617","1","en","suma_bez_dph","static","","Amount vat","1","0"),
("75618","1","sk","suma_bez_dph","static","","Suma bez DPH","1","0"),
("75619","1","en","dan","static","","Tax","1","0"),
("75620","1","sk","dan","static","","Daň","1","0"),
("75621","1","en","dph","static","","VAT","1","0"),
("75622","1","sk","dph","static","","DPH","1","0"),
("75623","1","en","dodacie_udaje","static","","Shipping information","1","0"),
("75624","1","sk","dodacie_udaje","static","","Dodacie údaje","1","0"),
("75625","1","en","prosim_vyplnte_dodacie_udaje","static","","Please fill shipping information","1","0"),
("75626","1","sk","prosim_vyplnte_dodacie_udaje","static","","Prosím vyplnte dodacie údaje","1","0"),
("75627","1","en","meno","static","","Name","1","0"),
("75628","1","sk","meno","static","","Meno","1","0"),
("75629","1","en","priezvisko","static","","Surname","1","0"),
("75630","1","sk","priezvisko","static","","Priezvisko","1","0"),
("75631","1","en","email","static","","Email","1","0"),
("75632","1","sk","email","static","","Email","1","0");
INSERT INTO dnt_translates VALUES
("75633","1","en","tel_c","static","","Telephone number","1","0"),
("75634","1","sk","tel_c","static","","Telefónne číslo","1","0"),
("75635","1","en","ulica","static","","Street","1","0"),
("75636","1","sk","ulica","static","","Ulica","1","0"),
("75637","1","en","c_domu","static","","House number","1","0"),
("75638","1","sk","c_domu","static","","Číslo domu","1","0"),
("75639","1","en","psc","static","","Postcode","1","0"),
("75640","1","sk","psc","static","","Smerovacie číslo (PSČ)","1","0"),
("75641","1","en","sposob_platby","static","","Payment method","1","0"),
("75642","1","sk","sposob_platby","static","","Spôsob platby","1","0"),
("75643","1","en","sposob_dopravy","static","","Transport method / pickup goods","1","0"),
("75644","1","sk","sposob_dopravy","static","","Spôsob dopravy / vyzdvihnutie tovaru","1","0"),
("75645","1","en","poznamka","static","","Note","1","0"),
("75646","1","sk","poznamka","static","","Poznámka","1","0"),
("75647","1","en","pole_je_volitelne","static","","The field is optional","1","0"),
("75648","1","sk","pole_je_volitelne","static","","Toto pole je voliteľné","1","0"),
("75649","1","en","pole_je_povinne","static","","The field is required","1","0"),
("75650","1","sk","pole_je_povinne","static","","Toto pole je povinné","1","0"),
("75651","1","en","mesto","static","","City","1","0"),
("75652","1","sk","mesto","static","","Mesto","1","0"),
("75653","1","en","krajina","static","","Country","1","0"),
("75654","1","sk","krajina","static","","Štát","1","0"),
("75655","1","en","prosim_vyberte_si","static","","Please select","1","0"),
("75656","1","sk","prosim_vyberte_si","static","","Prosím vyberte si","1","0"),
("75657","1","en","potvrdit_objednavku","static","","Confirm order","1","0"),
("75658","1","sk","potvrdit_objednavku","static","","Potvrdiť objednávku","1","0"),
("75659","1","en","registracia","static","","Registration","1","0"),
("75660","1","sk","registracia","static","","Registrácia","1","0"),
("75661","1","en","chcem_sa_zaregistrovat","static","","I want to register for better comfort","1","0"),
("75662","1","sk","chcem_sa_zaregistrovat","static","","Chcem sa zaregistrovať a tak nakupovať z pohodlia domova","1","0"),
("75663","1","en","heslo","static","","Password","1","0"),
("75664","1","sk","heslo","static","","Heslo","1","0"),
("75665","1","en","heslo_overenie","static","dnt_translates","Copy password","1","0"),
("75666","1","sk","heslo_overenie","static","dnt_translates","Overenie hesla","1","0"),
("75667","1","en","zaregistruj_ma","static","","Register me","1","0"),
("75668","1","sk","zaregistruj_ma","static","","Zaregistruj ma","1","0"),
("75669","1","en","filter","static","","Filter","1","0"),
("75670","1","sk","filter","static","","Filter","1","0"),
("75671","1","en","rok","static","","Year","1","0"),
("75672","1","sk","rok","static","","Rok","1","0"),
("75673","1","en","galeria","static","","Gallery","1","0"),
("75674","1","sk","galeria","static","","Galéria","1","0"),
("75675","1","en","vsetky_albumy","static","","All albums","1","0"),
("75676","1","sk","vsetky_albumy","static","","Všetky albumy","1","0"),
("75677","1","en","kontakt","static","","Contact","1","0"),
("75678","1","sk","kontakt","static","","Kontakt","1","0"),
("75679","1","en","kontakt_info","static","","Contact Info","1","0"),
("75680","1","sk","kontakt_info","static","","Kontaktné informácie","1","0"),
("75681","1","en","kontaktny_formular","static","","Contact Form","1","0"),
("75682","1","sk","kontaktny_formular","static","","Kontaktný formulár","1","0"),
("75683","1","en","predmet","static","","Subject","1","0"),
("75684","1","sk","predmet","static","","Predmet","1","0"),
("75685","1","en","sprava","static","","Message","1","0"),
("75686","1","sk","sprava","static","","Správa","1","0"),
("75687","1","en","odoslat","static","","Submit","1","0"),
("75688","1","sk","odoslat","static","","Odoslať","1","0"),
("75689","1","en","pondelok","static","","Monday","1","0"),
("75690","1","sk","pondelok","static","","Pondelok","1","0"),
("75691","1","en","utorok","static","","Tuesday","1","0"),
("75692","1","sk","utorok","static","","Utorok","1","0"),
("75693","1","en","streda","static","","Wednesday","1","0"),
("75694","1","sk","streda","static","","Streda","1","0"),
("75695","1","en","stvrtok","static","","Thursday","1","0"),
("75696","1","sk","stvrtok","static","","Štvrtok","1","0"),
("75697","1","en","piatok","static","","Friday","1","0"),
("75698","1","sk","piatok","static","","Piatok","1","0"),
("75699","1","en","sobota","static","","Saturday","1","0"),
("75700","1","sk","sobota","static","","Sobota","1","0"),
("75701","1","en","nedela","static","","Sunday","1","0"),
("75702","1","sk","nedela","static","","Nedeľa","1","0"),
("75703","1","en","clanky","static","","Blog","1","0"),
("75704","1","sk","clanky","static","","Články","1","0"),
("75705","1","en","pridane","static","","Posted","1","0"),
("75706","1","sk","pridane","static","","Pridané","1","0"),
("75707","1","en","hlaska_pocet_komentarov","static","","comment(s) in this post","1","0"),
("75708","1","sk","hlaska_pocet_komentarov","static","","komentárov v tomto príspevku","1","0"),
("75709","1","en","hodnotenie_postu_hlaska","static","","Automatic post assessment","1","0"),
("75710","1","sk","hodnotenie_postu_hlaska","static","","Automatické hodnotenie príspevku","1","0"),
("75711","1","en","ziaden_obsah_k_zobrazeniu","static","","Sorry, no posts to show","1","0"),
("75712","1","sk","ziaden_obsah_k_zobrazeniu","static","","Ľutujeme, ale žiaden obsah nie je k zobrazeniu","1","0"),
("75713","1","en","citat_viac","static","","Read more","1","0"),
("75714","1","sk","citat_viac","static","","Čítať viac","1","0"),
("75715","1","en","vitajte","static","","Welcome","1","0"),
("75716","1","sk","vitajte","static","","Vitajte","1","0"),
("75717","1","en","objednavok","static","","Orders","1","0"),
("75718","1","sk","objednavok","static","","Objednávok","1","0"),
("75719","1","en","zaplatene","static","","Total paid","1","0"),
("75720","1","sk","zaplatene","static","","Spolu zaplatené","1","0"),
("75721","1","en","komentarov","static","","Comments","1","0"),
("75722","1","sk","komentarov","static","","Komentárov","1","0"),
("75723","1","en","priemerna_cena_za_nakup","static","","Average price <br/>per shopping","1","0"),
("75724","1","sk","priemerna_cena_za_nakup","static","","Priemerná cena <br/>za nákup","1","0"),
("75725","1","en","informacie","static","","Informations","1","0"),
("75726","1","sk","informacie","static","","Informácie","1","0"),
("75727","1","en","moj_profil","static","","My profile ","1","0"),
("75728","1","sk","moj_profil","static","","Môj profil","1","0"),
("75729","1","en","moje_udaje","static","","My data ","1","0"),
("75730","1","sk","moje_udaje","static","","Moje údaje","1","0"),
("75731","1","en","upravit_udaje","static","","Edit my data","1","0"),
("75732","1","sk","upravit_udaje","static","","Upraviť údaje","1","0");
INSERT INTO dnt_translates VALUES
("75733","1","en","moje_objednavky","static","","My orders","1","0"),
("75734","1","sk","moje_objednavky","static","","Moje objednávky","1","0"),
("75735","1","en","zmenit_heslo","static","","Change password","1","0"),
("75736","1","sk","zmenit_heslo","static","","Zmeniť heslo","1","0"),
("75737","1","en","nepotvrdena_objednavka","static","","Order not confirmed","1","0"),
("75738","1","sk","nepotvrdena_objednavka","static","","Objednávka nepotvrdená","1","0"),
("75739","1","en","potvrdena_objednavka","static","","Order confirmed, waiting for progress","1","0"),
("75740","1","sk","potvrdena_objednavka","static","","Objednávka potvrdená, čaká na vybavenie","1","0"),
("75741","1","en","objednavka_sa_spracuva","static","","Order in progress","1","0"),
("75742","1","sk","objednavka_sa_spracuva","static","","Objednávka sa vybavuje","1","0"),
("75743","1","en","vybavena_objednavka","static","","Order equipped","1","0"),
("75744","1","sk","vybavena_objednavka","static","","Objednávka vybavená","1","0"),
("75745","1","en","anulovana_objednavka","static","","Order canceled","1","0"),
("75746","1","sk","anulovana_objednavka","static","","Objednávka zrušená","1","0"),
("75747","1","en","odhlasit","static","","Log out","1","0"),
("75748","1","sk","odhlasit","static","","Odhlásiť sa","1","0"),
("75749","1","en","prosim_prihlaste_sa","static","","Please Log in firstly","1","0"),
("75750","1","sk","prosim_prihlaste_sa","static","","Prosím najprv sa prihláste","1","0"),
("75751","1","en","nacitam","static","","loading","1","0"),
("75752","1","sk","nacitam","static","","načítam","1","0"),
("75753","1","en","nove_heslo","static","","New password","1","0"),
("75754","1","sk","nove_heslo","static","","Nové heslo","1","0"),
("75755","1","en","nove_heslo_overenie","static","","Copy new password","1","0"),
("75756","1","sk","nove_heslo_overenie","static","","Overenie nového hesla","1","0"),
("75757","1","en","prihlaseny","static","","Logged user","1","0"),
("75758","1","sk","prihlaseny","static","","Prihlásený používateľ","1","0"),
("75759","1","en","cislo_objednavky","static","","Order Number","1","0"),
("75760","1","sk","cislo_objednavky","static","","Číslo objednávky","1","0"),
("75761","1","en","datum_objednavky","static","","Order Date","1","0"),
("75762","1","sk","datum_objednavky","static","","Dátum objednávky","1","0"),
("75763","1","en","stav_objednavky","static","","Order Status","1","0"),
("75764","1","sk","stav_objednavky","static","","Stav objednávky","1","0"),
("75765","1","en","ziadne_objednavky_na_show","static","","No Orders to show","1","0"),
("75766","1","sk","ziadne_objednavky_na_show","static","","Žiadne objednávky na show","1","0"),
("75767","1","en","zle_vyplnene_pole","static","","Wrong data in field","1","0"),
("75768","1","sk","zle_vyplnene_pole","static","","Zle vyplnené pole ","1","0"),
("75769","1","en","error_box","static","","Oops, something s wrong","1","0"),
("75770","1","sk","error_box","static","","Hups, niečo je zle","1","0"),
("75771","1","en","opravit","static","","Repair","1","0"),
("75772","1","sk","opravit","static","","Opraviť","1","0"),
("75773","1","en","prazdne_pole_hlaska","static","","Field name is probably empty","1","0"),
("75774","1","sk","prazdne_pole_hlaska","static","","Pole pravdepodobne nie je vyplnené","1","0"),
("75775","1","en","slide_show","static","","Slide show of cover photos album","1","0"),
("75776","1","sk","slide_show","static","","Prehľad titulných fotiek albumov","1","0"),
("75777","1","en","zly_tvar_emailu","static","","Wrong form of email","1","0"),
("75778","1","sk","zly_tvar_emailu","static","","Email je v nesprávnom tvare","1","0"),
("75779","1","en","email_exists","static","","This email already exists","1","0"),
("75780","1","sk","email_exists","static","","Tento email už existuje","1","0"),
("75781","1","en","heslo_kratke","static","","Password is too short","1","0"),
("75782","1","sk","heslo_kratke","static","","Heslo je príliš krátke","1","0"),
("75783","1","en","heslo_overenie_kratke","static","","Copy of password is too short","1","0"),
("75784","1","sk","heslo_overenie_kratke","static","","Overenie hesla je príliš krátke","1","0"),
("75785","1","en","hesla_sa_nezhoduju","static","","Passwords do not matcht","1","0"),
("75786","1","sk","hesla_sa_nezhoduju","static","","Heslá sa nezhodujú","1","0"),
("75787","1","en","uspesna_registracia","static","","Registration was successful","1","0"),
("75788","1","sk","uspesna_registracia","static","","Registrácia prebehla úspešne","1","0"),
("75789","1","en","gratulujeme","static","","Congratulations","1","0"),
("75790","1","sk","gratulujeme","static","","Gratulujeme","1","0"),
("75791","1","en","zlava","static","","Discount","1","0"),
("75792","1","sk","zlava","static","","Zľava","1","0"),
("75793","1","en","novinka","static","","News","1","0"),
("75794","1","sk","novinka","static","","Novinka","1","0"),
("75795","1","en","vypredaj","static","","Sale","1","0"),
("75796","1","sk","vypredaj","static","","Výpredaj","1","0"),
("75797","1","en","no_stav","static","","Not set","1","0"),
("75798","1","sk","no_stav","static","","Bez stavu 2","1","0"),
("75799","1","en","komentare","static","","Comments","1","0"),
("75800","1","sk","komentare","static","","Komentáre","1","0"),
("75801","1","en","komentar","static","","Comment","1","0"),
("75802","1","sk","komentar","static","","Komentár","1","0"),
("75803","1","en","komentarov","static","","Comments","1","0"),
("75804","1","sk","komentarov","static","","Komentárov","1","0"),
("75805","1","en","pridat_komentar","static","","Add comment","1","0"),
("75806","1","sk","pridat_komentar","static","","Pridať komentár","1","0"),
("75807","1","en","vas_komentar","static","","Your comment","1","0"),
("75808","1","sk","vas_komentar","static","","Váš komentár","1","0"),
("75809","1","en","ziadne_komentare","static","","This post has no comments","1","0"),
("75810","1","sk","ziadne_komentare","static","","Tento príspevok neobsahuje žiadne komentáre","1","0"),
("75811","1","en","ziadne_produkty","static","","No products to show","1","0"),
("75812","1","sk","ziadne_produkty","static","","Žiadne produkty k zobrazeniu","1","0"),
("75813","1","en","popis","static","","Description","1","0"),
("75814","1","sk","popis","static","","Popis","1","0"),
("75815","1","en","nazov","static","","Name","1","0"),
("75816","1","sk","nazov","static","","Názov","1","0"),
("75817","1","en","stav","static","","Status","1","0"),
("75818","1","sk","stav","static","","Stav","1","0"),
("75819","1","en","znacka","static","","Brand","1","0"),
("75820","1","sk","znacka","static","","Značka","1","0"),
("75821","1","en","pridajte_sa_facebook","static","","Join Us on Facebook","1","0"),
("75822","1","sk","pridajte_sa_facebook","static","","Pridajte sa na Facebooku","1","0"),
("75823","1","en","kontaktujte_nas_hlaska","static","","For more information please contact us","1","0"),
("75824","1","sk","kontaktujte_nas_hlaska","static","","Pre získanie viac informacii nás prosím kontaktujte","1","0"),
("75825","1","en","najnovsie_produkty","static","","News products","1","0"),
("75826","1","sk","najnovsie_produkty","static","","Najnovšie produkty","1","0"),
("75827","1","en","znacky","static","","Brands","1","0"),
("75828","1","sk","znacky","static","","Značky","1","0"),
("75829","1","en","najpredavanejsie","static","","Bestsellers","1","0"),
("75830","1","sk","najpredavanejsie","static","","Najpredávanejšie","1","0"),
("75831","1","en","produkty_v_zlave","static","","In discount","1","0"),
("75832","1","sk","produkty_v_zlave","static","","V zľave","1","0");
INSERT INTO dnt_translates VALUES
("75833","1","en","obsah_kosika","static","","Your cart","1","0"),
("75834","1","sk","obsah_kosika","static","","Váš obsah košíka","1","0"),
("75835","1","en","zobrazit_kosik","static","","View cart","1","0"),
("75836","1","sk","zobrazit_kosik","static","","Zobraziť košík","1","0"),
("75837","1","en","ziadne_produkty_kat","static","","In this category there are no products","1","0"),
("75838","1","sk","ziadne_produkty_kat","static","","V tejto kategorii nie sú žiadne produkty","1","0"),
("75839","1","en","nespravne_povodne_heslo","static","","Default password is incorrect","1","0"),
("75840","1","sk","nespravne_povodne_heslo","static","","Pôvodné heslo je nesprávne","1","0"),
("75841","1","en","uspesna_objednavka","static","","Your order has been successfully sent","1","0"),
("75842","1","sk","uspesna_objednavka","static","","Vaša objednávka bola úspešne odoslaná","1","0"),
("75843","1","en","zly_email_heslo","static","","Wrong email or password","1","0"),
("75844","1","sk","zly_email_heslo","static","","Nesprávny email, alebo heslo","1","0"),
("75845","1","en","sprava_odoslana","static","","Your message was successfully sent","1","0"),
("75846","1","sk","sprava_odoslana","static","","Vaša správa bola úspešne odoslaná","1","0"),
("75847","1","en","domov","static","","Home","1","0"),
("75848","1","sk","domov","static","","Domov","1","0"),
("75849","1","en","fail_action","static","","The requested action can not be carried out!","1","0"),
("75850","1","sk","fail_action","static","","Požadovanú akciu nie je možné vykonať!","1","0"),
("75851","1","sk","januar","static","","January","1","0"),
("75852","1","sk","januar","static","","Január","1","0"),
("75853","1","en","februar","static","","February","1","0"),
("75854","1","sk","februar","static","","Február","1","0"),
("75855","1","en","marec","static","","Marec","1","0"),
("75856","1","sk","marec","static","","Marec","1","0"),
("75857","1","en","april","static","","April","1","0"),
("75858","1","sk","april","static","","Apríl","1","0"),
("75859","1","en","maj","static","","May","1","0"),
("75860","1","sk","maj","static","","Máj","1","0"),
("75861","1","en","jun","static","","Juny","1","0"),
("75862","1","sk","jun","static","","Jún","1","0"),
("75863","1","en","jul","static","","July","1","0"),
("75864","1","sk","jul","static","","Júl","1","0"),
("75865","1","en","august","static","","August","1","0"),
("75866","1","sk","august","static","","August","1","0"),
("75867","1","en","september","static","","September","1","0"),
("75868","1","sk","september","static","","September","1","0"),
("75869","1","en","oktober","static","","October","1","0"),
("75870","1","sk","oktober","static","","Október","1","0"),
("75871","1","en","november","static","","November","1","0"),
("75872","1","sk","november","static","","November","1","0"),
("75873","1","en","december","static","","December","1","0"),
("75874","1","sk","december","static","","December","1","0"),
("75875","1","en","zobrazit","static","","View","1","0"),
("75876","1","sk","zobrazit","static","","Zobraziť","1","0"),
("75877","1","en","partneri","static","","Partners","1","0"),
("75878","1","sk","partneri","static","","Partneri","1","0"),
("75879","1","en","archiv","static","","Archive","1","0"),
("75880","1","sk","archiv","static","","Archív","1","0"),
("75881","1","en","najnovsie_komentare","static","","Recent Comments","1","0"),
("75882","1","sk","najnovsie_komentare","static","","Posledné komentáre","1","0"),
("75883","1","en","najnovsie_clanky","static","","Recent posts","1","0"),
("75884","1","sk","najnovsie_clanky","static","","Posledné články","1","0"),
("75885","1","en","main_menu","static","","Main menu","1","0"),
("75886","1","sk","main_menu","static","","Hlavné menu","1","0"),
("75887","1","en","hladat","static","","Search","1","0"),
("75888","1","sk","hladat","static","","Hľadať","1","0"),
("75889","1","en","socialne_siete","static","","Social networks","1","0"),
("75890","1","sk","socialne_siete","static","","Sociálne siete","1","0"),
("75891","1","en","poloha","static","","Location","1","0"),
("75892","1","sk","poloha","static","","Poloha","1","0"),
("75893","1","en","type","static","","typee","1","0"),
("75894","1","sk","type","static","","type","1","0"),
("75895","1","en","all","static","","All","1","0"),
("75896","1","sk","all","static","","Všetko","1","0"),
("75897","1","en","hlaska_najdi_dom","static","","Find Your Home","1","0"),
("75898","1","sk","hlaska_najdi_dom","static","","Nájdite si svoj dom","1","0"),
("75899","1","en","min_izieb","static","","Min Rooms","1","0"),
("75900","1","sk","min_izieb","static","","Min. izieb","1","0"),
("75901","1","en","min_kupelni","static","","Min Baths","1","0"),
("75902","1","sk","min_kupelni","static","","Min. kúpeľní","1","0"),
("75903","1","en","min_cena","static","","Min Price","1","0"),
("75904","1","sk","min_cena","static","","Min. cena","1","0"),
("75905","1","en","max_cena","static","","Max Price","1","0"),
("75906","1","sk","max_cena","static","","Max. cena","1","0"),
("75907","1","en","min_area","static","","Min Area","1","0"),
("75908","1","sk","min_area","static","","Min. roz.","1","0"),
("75909","1","en","max_area","static","","Max Area","1","0"),
("75910","1","sk","max_area","static","","Max roz.","1","0"),
("75911","1","en","area","static","","Area","1","0"),
("75912","1","sk","area","static","","Rozloha","1","0"),
("75913","1","en","m2","static","","Sq m","1","0"),
("75914","1","sk","m2","static","","m2","1","0"),
("75915","1","en","izieb","static","","Rooms","1","0"),
("75916","1","sk","izieb","static","","Izieb","1","0"),
("75917","1","en","kupelni","static","","Bathrooms","1","0"),
("75918","1","sk","kupelni","static","","Kúpeľní","1","0"),
("75919","1","en","tlacit","static","","Print","1","0"),
("75920","1","sk","tlacit","static","","Tlačiť","1","0"),
("75921","1","en","nazov","static","","Name","1","0"),
("75922","1","sk","nazov","static","","Meno","1","0"),
("75923","1","en","zoznam_nehnutelnosti","static","","List of properties","1","0"),
("75924","1","sk","zoznam_nehnutelnosti","static","","Zoznam nehnuteľností","1","0"),
("75925","1","en","no_content","static","","Please try using top navigation OR search for what you are looking for.","1","0"),
("75926","1","sk","no_content","static","","Ľutujeme, ale pre tento výber neexistuje žiaden obsah","1","0"),
("75927","1","en","go_back","static","","Go back","1","0"),
("75928","1","sk","go_back","static","","Naspäť","1","0"),
("75929","1","en","vybrane_nehnutelnosti","static","","Featured Properties","1","0"),
("75930","1","sk","vybrane_nehnutelnosti","static","","Vybrané nehnuteľnosti","1","0"),
("75931","1","en","najnovsie_ponuky_hlaska","static","","Latest offers property","1","0"),
("75932","1","sk","najnovsie_ponuky_hlaska","static","","Najnovšie ponuky nehnuteľností","1","0");
INSERT INTO dnt_translates VALUES
("75933","1","en","about_us_footer","static","","Our company operates in the real estate market. We offer a broad spectrum range of activities related to the negotiation of purchase, sale and rental nehnuteľností.Pre most of you, our clients, the sale, purchase, or rental property important step, which made only a few times in my life. Our real estate agents will gladly help you with the implementation of your requirements and provide complete service with our offer.","1","0"),
("75934","1","sk","about_us_footer","static","","Naša spoločnosť pôsobí v oblasti realitného trhu. Ponúkame širokospektrálny záber činností spojených so sprostredkovaním kúpy, predaja a prenájmu nehnuteľností.Pre väčšinu Vás, našich klientov je predaj, kúpa, alebo prenájom nehnuteľnosti dôležitý krok, ktorý realizujete len niekoľkokrát v živote. Naši realitní makléri Vám ochotne a radi poradia pri realizácii Vašich požiadaviek a zabezpečia kompletný servis spojený s našou ponukou.","1","0"),
("75935","1","en","about","static","","About company","1","0"),
("75936","1","sk","about","static","","O firme","1","0"),
("75937","1","en","vyberte_si_region","static","","Choose your region","1","0"),
("75938","1","sk","vyberte_si_region","static","","Vyberte si región","1","0"),
("75939","1","en","bratislavsky_kraj","static","","Region of Bratislava","1","0"),
("75940","1","sk","bratislavsky_kraj","static","","Bratislavský kraj","1","0"),
("75941","1","en","trnavsky_kraj","static","","Region of Trnava","1","0"),
("75942","1","sk","trnavsky_kraj","static","","Trnavský kraj","1","0"),
("75943","1","en","trenciansky_kraj","static","","Region of Trencin","1","0"),
("75944","1","sk","trenciansky_kraj","static","","Trenčiansky kraj","1","0"),
("75945","1","en","nitriansky_kraj","static","","Region of Nitra","1","0"),
("75946","1","sk","nitriansky_kraj","static","","Nitriansky kraj","1","0"),
("75947","1","en","zilinsky_kraj","static","","Region of Zilina","1","0"),
("75948","1","sk","zilinsky_kraj","static","","Žilinský kraj","1","0"),
("75949","1","en","banskobystricky_kraj","static","","Region of Banska Bystrica","1","0"),
("75950","1","sk","banskobystricky_kraj","static","","Bansko Bstrický kraj","1","0"),
("75951","1","en","presovsky_kraj","static","","Region of Presov","1","0"),
("75952","1","sk","presovsky_kraj","static","","Prešovský kraj","1","0"),
("75953","1","en","kosicky_kraj","static","","Region of Kosice","1","0"),
("75954","1","sk","kosicky_kraj","static","","Košický kraj","1","0"),
("75955","1","en","kategorie_clankov","static","","Caregory of blog","1","0"),
("75956","1","sk","kategorie_clankov","static","","Kategórie článkov","1","0"),
("75957","1","en","realitny_partneri","static","","Realit partners","1","0"),
("75958","1","sk","realitny_partneri","static","","Realitní partneri","1","0"),
("75959","1","en","nespravne_heslo","static","","Password is incorrect","1","0"),
("75960","1","sk","nespravne_heslo","static","","Heslo je nesprávne","1","0"),
("75961","1","sk","ustredie","static","","Ústredie","1","0"),
("75962","1","en","ustredie","static","","Headquarters","1","0"),
("75963","1","de","ustredie","static","","Zentrale","1","0"),
("75964","1","sk","dalsie_informacie","static","","Rýchla navigácia","1","0"),
("75965","1","en","dalsie_informacie","static",""," Quick navigation","1","0"),
("75966","1","de","dalsie_informacie","static","","Schnellnavigation","1","0"),
("75967","1","sk","technicka_podpora","static","","Technická podpora","1","0"),
("75968","1","en","technicka_podpora","static","","Technical support","1","0"),
("75969","1","de","technicka_podpora","static","","Technische Unterstützung","1","0"),
("75970","1","sk","systemove_poziadavky","static","","Systémové požiadavky","1","0"),
("75971","1","en","systemove_poziadavky","static","","System requirements","1","0"),
("75972","1","de","systemove_poziadavky","static","","Systemanforderungen","1","0"),
("75973","1","sk","3d_tlac","static","","3d tlač","1","0"),
("75974","1","en","3d_tlac","static","","3D printing","1","0"),
("75975","1","de","3d_tlac","static","","3D-Druck","1","0"),
("75976","1","sk","lisovanie_plastov","static","","Lisovanie plastov","1","0"),
("75977","1","en","lisovanie_plastov","static","","Molding","1","0"),
("75978","1","de","lisovanie_plastov","static","","Gießen","1","0"),
("75979","1","sk","nastrojaren","static","","Nástrojáreň","1","0"),
("75980","1","en","nastrojaren","static","","Toolroom","1","0"),
("75981","1","de","nastrojaren","static","","Werkzeug- und Vorrichtungsbau","1","0"),
("75982","1","sk","fakturacne_udaje","static","","Fakturačné údaje","1","0"),
("75983","1","en","fakturacne_udaje","static","","Billing information","1","0"),
("75984","1","de","fakturacne_udaje","static","","Abrechnungsinformationen","1","0"),
("75985","1","sk","poziadat_o_ponuku_solidcam","static","","Požiadať o ponuku Solidcam","1","0"),
("75986","1","en","poziadat_o_ponuku_solidcam","static","","Request quote Solidcam","1","0"),
("75987","1","de","poziadat_o_ponuku_solidcam","static","","Angebot anfordern Solidcam","1","0"),
("75988","1","sk","poziadat_o_prezentaciu_solidcam","static","","Požiadať o prezentáciu Solidcam","1","0"),
("75989","1","en","poziadat_o_prezentaciu_solidcam","static","","Request Solidcam Presentation","1","0"),
("75990","1","de","poziadat_o_prezentaciu_solidcam","static","","Anfrage Solidcam-Präsentation","1","0"),
("75991","1","sk","poziadat_o_ponuku_pdc","static","","Požiadať o ponuku PDC","1","0"),
("75992","1","en","poziadat_o_ponuku_pdc","static","","Request quote PDC","1","0"),
("75993","1","de","poziadat_o_ponuku_pdc","static","","Angebot anfordern PDC","1","0"),
("75994","1","sk","poziadat_o_prezentaciu_pdc","static","","Požiadať o prezentáciu PDC","1","0"),
("75995","1","en","poziadat_o_prezentaciu_pdc","static","","Request PDC Presentation","1","0"),
("75996","1","de","poziadat_o_prezentaciu_pdc","static","","Anfrage PDC-Präsentation","1","0"),
("75997","1","sk","poziadat_o_ponuku","static","","Požiadať o ponuku","1","0"),
("75998","1","en","poziadat_o_ponuku","static","","Request for Quotation","1","0"),
("75999","1","de","poziadat_o_ponuku","static","","Angebotsanfrage","1","0"),
("76000","1","sk","poziadat_o_prezentaciu","static","","Požiadať o prezentáciu","1","0"),
("76001","1","en","poziadat_o_prezentaciu","static","","Request a presentation","1","0"),
("76002","1","de","poziadat_o_prezentaciu","static","","Fordern Sie eine Präsentation","1","0"),
("76003","1","sk","skusobna_verzia","static","","Skúšobná verzia","1","0"),
("76004","1","en","skusobna_verzia","static","","Trial","1","0"),
("76005","1","de","skusobna_verzia","static","","Versuch","1","0"),
("76006","1","sk","firma","static","","Firma","1","0"),
("76007","1","en","firma","static","","Company","1","0"),
("76008","1","de","firma","static","","Unternehmen","1","0"),
("76009","1","sk","produkt","static","","Produkt","1","0"),
("76010","1","en","produkt","static","","Product","1","0"),
("76011","1","de","produkt","static","","Produkt","1","0"),
("76012","1","sk","dalsie_moznosti","static","","Viac z ponuky","1","0"),
("76013","1","en","dalsie_moznosti","static","","More of offer","1","0"),
("76014","1","de","dalsie_moznosti","static","","Mehr von Angebot","1","0"),
("76015","1","de","meno","static","","Name","1","0"),
("76019","1","de","priezvisko","static","","Nachname","1","0"),
("76020","1","de","predmet","static","","Thema","1","0"),
("76021","1","de","email","static","","Emaille","1","0"),
("76022","1","de","tel_c","static","","Telefonnummer","1","0"),
("76023","1","de","ulica","static","","Straße","1","0"),
("76024","1","de","psc","static","","Postleitzahl","1","0"),
("76025","1","de","mesto","static","","Stadt","1","0"),
("76026","1","de","sprava","static","","Management","1","0"),
("76027","1","de","odoslat","static","","Einreichen","1","0"),
("76028","1","de","heslo","static","","Kennwort","1","0"),
("76029","1","de","kontakt","static","","Kontakt","1","0"),
("76030","1","de","socialne_siete","static","","Soziales Netzwerk","1","0"),
("76031","1","sk","sidlo","static","","Sídlo.","1","0"),
("76032","1","en","sidlo","static","","Headquarters.","1","0"),
("76033","1","de","sidlo","static","","Hauptsitz.","1","0"),
("76034","1","sk","pobocka","static","","Pobočka.","1","0"),
("76035","1","en","pobocka","static","","Branch office.","1","0");
INSERT INTO dnt_translates VALUES
("76036","1","de","pobocka","static","","Zweigstelle.","1","0"),
("76037","1","en","13074","name","dnt_posts","","1","0"),
("76038","1","en","13074","name_url","dnt_posts","","1","0"),
("76039","1","en","13074","perex","dnt_posts","","1","0"),
("76040","1","en","13074","content","dnt_posts","","1","0"),
("76041","1","en","13074","tags","dnt_posts","","1","0"),
("76042","1","de","13074","name","dnt_posts","","1","0"),
("76043","1","de","13074","name_url","dnt_posts","","1","0"),
("76044","1","de","13074","perex","dnt_posts","","1","0"),
("76045","1","de","13074","content","dnt_posts","","1","0"),
("76046","1","de","13074","tags","dnt_posts","","1","0"),
("76047","1","en","13056","name","dnt_posts","Partners","1","0"),
("76048","1","en","13056","name_url","dnt_posts","partners","1","0"),
("76049","1","en","13056","perex","dnt_posts","","1","0"),
("76050","1","en","13056","content","dnt_posts","","1","0"),
("76051","1","en","13056","tags","dnt_posts","","1","0"),
("76052","1","de","13056","name","dnt_posts","Partner","1","0"),
("76053","1","de","13056","name_url","dnt_posts","partner","1","0"),
("76054","1","de","13056","perex","dnt_posts","","1","0"),
("76055","1","de","13056","content","dnt_posts","","1","0"),
("76056","1","de","13056","tags","dnt_posts","","1","0"),
("76057","1","en","13058","name","dnt_posts","Contact","1","0"),
("76058","1","en","13058","name_url","dnt_posts","contact","1","0"),
("76059","1","en","13058","perex","dnt_posts","","1","0"),
("76060","1","en","13058","content","dnt_posts","","1","0"),
("76061","1","en","13058","tags","dnt_posts","","1","0"),
("76062","1","de","13058","name","dnt_posts","Kontakt","1","0"),
("76063","1","de","13058","name_url","dnt_posts","kontakt","1","0"),
("76064","1","de","13058","perex","dnt_posts","","1","0"),
("76065","1","de","13058","content","dnt_posts","","1","0"),
("76066","1","de","13058","tags","dnt_posts","","1","0"),
("76077","1","en","13055","name","dnt_posts","Research and development","1","0"),
("76078","1","en","13055","name_url","dnt_posts","research-and-development","1","0"),
("76079","1","en","13055","perex","dnt_posts","","1","0"),
("76080","1","en","13055","content","dnt_posts","","1","0"),
("76081","1","en","13055","tags","dnt_posts","","1","0"),
("76082","1","de","13055","name","dnt_posts","Forschung und Entwicklung","1","0"),
("76083","1","de","13055","name_url","dnt_posts","forschung-und-entwicklung","1","0"),
("76084","1","de","13055","perex","dnt_posts","","1","0"),
("76085","1","de","13055","content","dnt_posts","","1","0"),
("76086","1","de","13055","tags","dnt_posts","","1","0"),
("76087","1","en","13054","name","dnt_posts","Products","1","0"),
("76088","1","en","13054","name_url","dnt_posts","","1","0"),
("76089","1","en","13054","perex","dnt_posts","","1","0"),
("76090","1","en","13054","content","dnt_posts","","1","0"),
("76091","1","en","13054","tags","dnt_posts","","1","0"),
("76092","1","de","13054","name","dnt_posts","Produkte","1","0"),
("76093","1","de","13054","name_url","dnt_posts","","1","0"),
("76094","1","de","13054","perex","dnt_posts","","1","0"),
("76095","1","de","13054","content","dnt_posts","","1","0"),
("76096","1","de","13054","tags","dnt_posts","","1","0"),
("76097","1","en","13059","name","dnt_posts","Staff","1","0"),
("76098","1","en","13059","name_url","dnt_posts","staff","1","0"),
("76099","1","en","13059","perex","dnt_posts","","1","0"),
("76100","1","en","13059","content","dnt_posts","","1","0"),
("76101","1","en","13059","tags","dnt_posts","","1","0"),
("76102","1","de","13059","name","dnt_posts","Personal","1","0"),
("76103","1","de","13059","name_url","dnt_posts","personal","1","0"),
("76104","1","de","13059","perex","dnt_posts","","1","0"),
("76105","1","de","13059","content","dnt_posts","","1","0"),
("76106","1","de","13059","tags","dnt_posts","","1","0"),
("76107","1","en","13060","name","dnt_posts","Software for planning of production","1","0"),
("76108","1","en","13060","name_url","dnt_posts","","1","0"),
("76109","1","en","13060","perex","dnt_posts","","1","0"),
("76110","1","en","13060","content","dnt_posts","","1","0"),
("76111","1","en","13060","tags","dnt_posts","","1","0"),
("76112","1","de","13060","name","dnt_posts","Software für die Planung der Produktion","1","0"),
("76113","1","de","13060","name_url","dnt_posts","","1","0"),
("76114","1","de","13060","perex","dnt_posts","","1","0"),
("76115","1","de","13060","content","dnt_posts","","1","0"),
("76116","1","de","13060","tags","dnt_posts","","1","0"),
("76117","1","en","13075","name","dnt_posts","Tooling & Molding","1","0"),
("76118","1","en","13075","name_url","dnt_posts","","1","0"),
("76119","1","en","13075","perex","dnt_posts","","1","0"),
("76120","1","en","13075","content","dnt_posts","","1","0"),
("76121","1","en","13075","tags","dnt_posts","","1","0"),
("76122","1","de","13075","name","dnt_posts","Werkzeug- und Vorrichtungsbau","1","0"),
("76123","1","de","13075","name_url","dnt_posts","","1","0"),
("76124","1","de","13075","perex","dnt_posts","","1","0"),
("76125","1","de","13075","content","dnt_posts","","1","0"),
("76126","1","de","13075","tags","dnt_posts","","1","0"),
("76127","1","en","13076","name","dnt_posts","Why choose CAM","1","0"),
("76128","1","en","13076","name_url","dnt_posts","why-choose-cam","1","0"),
("76129","1","en","13076","perex","dnt_posts","","1","0"),
("76130","1","en","13076","content","dnt_posts","","1","0"),
("76131","1","en","13076","tags","dnt_posts","","1","0"),
("76132","1","de","13076","name","dnt_posts","","1","0"),
("76133","1","de","13076","name_url","dnt_posts","","1","0"),
("76134","1","de","13076","perex","dnt_posts","","1","0"),
("76135","1","de","13076","content","dnt_posts","","1","0"),
("76136","1","de","13076","tags","dnt_posts","","1","0"),
("76137","1","en","13077","name","dnt_posts","Services","1","0"),
("76138","1","en","13077","name_url","dnt_posts","services","1","0"),
("76139","1","en","13077","perex","dnt_posts","","1","0"),
("76140","1","en","13077","content","dnt_posts","","1","0"),
("76141","1","en","13077","tags","dnt_posts","","1","0"),
("76142","1","de","13077","name","dnt_posts","Service","1","0"),
("76143","1","de","13077","name_url","dnt_posts","service","1","0"),
("76144","1","de","13077","perex","dnt_posts","","1","0"),
("76145","1","de","13077","content","dnt_posts","","1","0");
INSERT INTO dnt_translates VALUES
("76146","1","de","13077","tags","dnt_posts","","1","0"),
("76147","1","en","13078","name","dnt_posts","Why choose CAM","1","0"),
("76148","1","en","13078","name_url","dnt_posts","why-choose-cam","1","0"),
("76149","1","en","13078","perex","dnt_posts","","1","0"),
("76150","1","en","13078","content","dnt_posts","","1","0"),
("76151","1","en","13078","tags","dnt_posts","","1","0"),
("76152","1","de","13078","name","dnt_posts","","1","0"),
("76153","1","de","13078","name_url","dnt_posts","","1","0"),
("76154","1","de","13078","perex","dnt_posts","","1","0"),
("76155","1","de","13078","content","dnt_posts","","1","0"),
("76156","1","de","13078","tags","dnt_posts","","1","0"),
("76157","1","en","13079","name","dnt_posts","","1","0"),
("76158","1","en","13079","name_url","dnt_posts","","1","0"),
("76159","1","en","13079","perex","dnt_posts","","1","0"),
("76160","1","en","13079","content","dnt_posts","","1","0"),
("76161","1","en","13079","tags","dnt_posts","","1","0"),
("76162","1","de","13079","name","dnt_posts","","1","0"),
("76163","1","de","13079","name_url","dnt_posts","","1","0"),
("76164","1","de","13079","perex","dnt_posts","","1","0"),
("76165","1","de","13079","content","dnt_posts","","1","0"),
("76166","1","de","13079","tags","dnt_posts","","1","0"),
("76167","1","en","13080","name","dnt_posts","","1","0"),
("76168","1","en","13080","name_url","dnt_posts","","1","0"),
("76169","1","en","13080","perex","dnt_posts","","1","0"),
("76170","1","en","13080","content","dnt_posts","","1","0"),
("76171","1","en","13080","tags","dnt_posts","","1","0"),
("76172","1","de","13080","name","dnt_posts","","1","0"),
("76173","1","de","13080","name_url","dnt_posts","","1","0"),
("76174","1","de","13080","perex","dnt_posts","","1","0"),
("76175","1","de","13080","content","dnt_posts","","1","0"),
("76176","1","de","13080","tags","dnt_posts","","1","0"),
("76177","1","en","13081","name","dnt_posts","","1","0"),
("76178","1","en","13081","name_url","dnt_posts","","1","0"),
("76179","1","en","13081","perex","dnt_posts","","1","0"),
("76180","1","en","13081","content","dnt_posts","","1","0"),
("76181","1","en","13081","tags","dnt_posts","","1","0"),
("76182","1","de","13081","name","dnt_posts","","1","0"),
("76183","1","de","13081","name_url","dnt_posts","","1","0"),
("76184","1","de","13081","perex","dnt_posts","","1","0"),
("76185","1","de","13081","content","dnt_posts","","1","0"),
("76186","1","de","13081","tags","dnt_posts","","1","0"),
("76187","1","en","13082","name","dnt_posts","","1","0"),
("76188","1","en","13082","name_url","dnt_posts","","1","0"),
("76189","1","en","13082","perex","dnt_posts","","1","0"),
("76190","1","en","13082","content","dnt_posts","","1","0"),
("76191","1","en","13082","tags","dnt_posts","","1","0"),
("76192","1","de","13082","name","dnt_posts","","1","0"),
("76193","1","de","13082","name_url","dnt_posts","","1","0"),
("76194","1","de","13082","perex","dnt_posts","","1","0"),
("76195","1","de","13082","content","dnt_posts","","1","0"),
("76196","1","de","13082","tags","dnt_posts","","1","0"),
("76197","1","en","13083","name","dnt_posts","","1","0"),
("76198","1","en","13083","name_url","dnt_posts","","1","0"),
("76199","1","en","13083","perex","dnt_posts","","1","0"),
("76200","1","en","13083","content","dnt_posts","","1","0"),
("76201","1","en","13083","tags","dnt_posts","","1","0"),
("76202","1","de","13083","name","dnt_posts","","1","0"),
("76203","1","de","13083","name_url","dnt_posts","","1","0"),
("76204","1","de","13083","perex","dnt_posts","","1","0"),
("76205","1","de","13083","content","dnt_posts","","1","0"),
("76206","1","de","13083","tags","dnt_posts","","1","0"),
("76207","1","en","13084","name","dnt_posts","","1","0"),
("76208","1","en","13084","name_url","dnt_posts","","1","0"),
("76209","1","en","13084","perex","dnt_posts","","1","0"),
("76210","1","en","13084","content","dnt_posts","","1","0"),
("76211","1","en","13084","tags","dnt_posts","","1","0"),
("76212","1","de","13084","name","dnt_posts","","1","0"),
("76213","1","de","13084","name_url","dnt_posts","","1","0"),
("76214","1","de","13084","perex","dnt_posts","","1","0"),
("76215","1","de","13084","content","dnt_posts","","1","0"),
("76216","1","de","13084","tags","dnt_posts","","1","0"),
("76217","1","en","13085","name","dnt_posts","","1","0"),
("76218","1","en","13085","name_url","dnt_posts","","1","0"),
("76219","1","en","13085","perex","dnt_posts","","1","0"),
("76220","1","en","13085","content","dnt_posts","","1","0"),
("76221","1","en","13085","tags","dnt_posts","","1","0"),
("76222","1","de","13085","name","dnt_posts","","1","0"),
("76223","1","de","13085","name_url","dnt_posts","","1","0"),
("76224","1","de","13085","perex","dnt_posts","","1","0"),
("76225","1","de","13085","content","dnt_posts","","1","0"),
("76226","1","de","13085","tags","dnt_posts","","1","0"),
("76237","1","en","13086","name","dnt_posts","","1","0"),
("76238","1","en","13086","name_url","dnt_posts","","1","0"),
("76239","1","en","13086","perex","dnt_posts","","1","0"),
("76240","1","en","13086","content","dnt_posts","","1","0"),
("76241","1","en","13086","tags","dnt_posts","","1","0"),
("76242","1","de","13086","name","dnt_posts","","1","0"),
("76243","1","de","13086","name_url","dnt_posts","","1","0"),
("76244","1","de","13086","perex","dnt_posts","","1","0"),
("76245","1","de","13086","content","dnt_posts","","1","0"),
("76246","1","de","13086","tags","dnt_posts","","1","0"),
("76247","1","en","13087","name","dnt_posts","","1","0"),
("76248","1","en","13087","name_url","dnt_posts","","1","0"),
("76249","1","en","13087","perex","dnt_posts","","1","0"),
("76250","1","en","13087","content","dnt_posts","","1","0"),
("76251","1","en","13087","tags","dnt_posts","","1","0"),
("76252","1","de","13087","name","dnt_posts","","1","0"),
("76253","1","de","13087","name_url","dnt_posts","","1","0"),
("76254","1","de","13087","perex","dnt_posts","","1","0"),
("76255","1","de","13087","content","dnt_posts","","1","0");
INSERT INTO dnt_translates VALUES
("76256","1","de","13087","tags","dnt_posts","","1","0"),
("76257","1","en","13088","name","dnt_posts","","1","0"),
("76258","1","en","13088","name_url","dnt_posts","","1","0"),
("76259","1","en","13088","perex","dnt_posts","","1","0"),
("76260","1","en","13088","content","dnt_posts","","1","0"),
("76261","1","en","13088","tags","dnt_posts","","1","0"),
("76262","1","de","13088","name","dnt_posts","","1","0"),
("76263","1","de","13088","name_url","dnt_posts","","1","0"),
("76264","1","de","13088","perex","dnt_posts","","1","0"),
("76265","1","de","13088","content","dnt_posts","","1","0"),
("76266","1","de","13088","tags","dnt_posts","","1","0"),
("76267","1","en","13089","name","dnt_posts","","1","0"),
("76268","1","en","13089","name_url","dnt_posts","","1","0"),
("76269","1","en","13089","perex","dnt_posts","","1","0"),
("76270","1","en","13089","content","dnt_posts","","1","0"),
("76271","1","en","13089","tags","dnt_posts","","1","0"),
("76272","1","de","13089","name","dnt_posts","","1","0"),
("76273","1","de","13089","name_url","dnt_posts","","1","0"),
("76274","1","de","13089","perex","dnt_posts","","1","0"),
("76275","1","de","13089","content","dnt_posts","","1","0"),
("76276","1","de","13089","tags","dnt_posts","","1","0"),
("76277","1","en","13090","name","dnt_posts","","1","0"),
("76278","1","en","13090","name_url","dnt_posts","","1","0"),
("76279","1","en","13090","perex","dnt_posts","","1","0"),
("76280","1","en","13090","content","dnt_posts","","1","0"),
("76281","1","en","13090","tags","dnt_posts","","1","0"),
("76282","1","de","13090","name","dnt_posts","","1","0"),
("76283","1","de","13090","name_url","dnt_posts","","1","0"),
("76284","1","de","13090","perex","dnt_posts","","1","0"),
("76285","1","de","13090","content","dnt_posts","","1","0"),
("76286","1","de","13090","tags","dnt_posts","","1","0"),
("76287","1","en","13091","name","dnt_posts","","1","0"),
("76288","1","en","13091","name_url","dnt_posts","","1","0"),
("76289","1","en","13091","perex","dnt_posts","","1","0"),
("76290","1","en","13091","content","dnt_posts","","1","0"),
("76291","1","en","13091","tags","dnt_posts","","1","0"),
("76292","1","de","13091","name","dnt_posts","","1","0"),
("76293","1","de","13091","name_url","dnt_posts","","1","0"),
("76294","1","de","13091","perex","dnt_posts","","1","0"),
("76295","1","de","13091","content","dnt_posts","","1","0"),
("76296","1","de","13091","tags","dnt_posts","","1","0"),
("76297","1","en","13092","name","dnt_posts","","1","0"),
("76298","1","en","13092","name_url","dnt_posts","","1","0"),
("76299","1","en","13092","perex","dnt_posts","","1","0"),
("76300","1","en","13092","content","dnt_posts","","1","0"),
("76301","1","en","13092","tags","dnt_posts","","1","0"),
("76302","1","de","13092","name","dnt_posts","","1","0"),
("76303","1","de","13092","name_url","dnt_posts","","1","0"),
("76304","1","de","13092","perex","dnt_posts","","1","0"),
("76305","1","de","13092","content","dnt_posts","","1","0"),
("76306","1","de","13092","tags","dnt_posts","","1","0"),
("76307","1","en","13093","name","dnt_posts","Billing information","1","0"),
("76308","1","en","13093","name_url","dnt_posts","","1","0"),
("76309","1","en","13093","perex","dnt_posts","","1","0"),
("76310","1","en","13093","content","dnt_posts","","1","0"),
("76311","1","en","13093","tags","dnt_posts","","1","0"),
("76312","1","de","13093","name","dnt_posts","Abrechnungsinformationen","1","0"),
("76313","1","de","13093","name_url","dnt_posts","","1","0"),
("76314","1","de","13093","perex","dnt_posts","","1","0"),
("76315","1","de","13093","content","dnt_posts","","1","0"),
("76316","1","de","13093","tags","dnt_posts","","1","0"),
("76317","1","en","13094","name","dnt_posts","Free production capacities","1","0"),
("76318","1","en","13094","name_url","dnt_posts","","1","0"),
("76319","1","en","13094","perex","dnt_posts","","1","0"),
("76320","1","en","13094","content","dnt_posts","<p>Free production capacities for continuouse 5 axis milling</p>\n","1","0"),
("76321","1","en","13094","tags","dnt_posts","","1","0"),
("76322","1","de","13094","name","dnt_posts","","1","0"),
("76323","1","de","13094","name_url","dnt_posts","","1","0"),
("76324","1","de","13094","perex","dnt_posts","","1","0"),
("76325","1","de","13094","content","dnt_posts","","1","0"),
("76326","1","de","13094","tags","dnt_posts","","1","0"),
("77643","1","en","13350","name","dnt_posts","","1","0"),
("77644","1","en","13350","name_url","dnt_posts","","1","0"),
("77645","1","en","13350","perex","dnt_posts","","1","0"),
("77646","1","en","13350","content","dnt_posts","","1","0"),
("77647","1","en","13350","tags","dnt_posts","","1","0"),
("77648","1","de","13350","name","dnt_posts","","1","0"),
("77649","1","de","13350","name_url","dnt_posts","","1","0"),
("77650","1","de","13350","perex","dnt_posts","","1","0"),
("77651","1","de","13350","content","dnt_posts","","1","0"),
("77652","1","de","13350","tags","dnt_posts","","1","0"),
("77663","1","en","13351","name","dnt_posts","","1","0"),
("77664","1","en","13351","name_url","dnt_posts","","1","0"),
("77665","1","en","13351","perex","dnt_posts","","1","0"),
("77666","1","en","13351","content","dnt_posts","","1","0"),
("77667","1","en","13351","tags","dnt_posts","","1","0"),
("77668","1","de","13351","name","dnt_posts","","1","0"),
("77669","1","de","13351","name_url","dnt_posts","","1","0"),
("77670","1","de","13351","perex","dnt_posts","","1","0"),
("77671","1","de","13351","content","dnt_posts","","1","0"),
("77672","1","de","13351","tags","dnt_posts","","1","0"),
("77673","1","en","13352","name","dnt_posts","","1","0"),
("77674","1","en","13352","name_url","dnt_posts","","1","0"),
("77675","1","en","13352","perex","dnt_posts","","1","0"),
("77676","1","en","13352","content","dnt_posts","","1","0"),
("77677","1","en","13352","tags","dnt_posts","","1","0"),
("77678","1","de","13352","name","dnt_posts","","1","0"),
("77679","1","de","13352","name_url","dnt_posts","","1","0"),
("77680","1","de","13352","perex","dnt_posts","","1","0"),
("77681","1","de","13352","content","dnt_posts","","1","0");
INSERT INTO dnt_translates VALUES
("77682","1","de","13352","tags","dnt_posts","","1","0"),
("77913","1","en","13359","name","dnt_posts","","1","0"),
("77914","1","en","13359","name_url","dnt_posts","","1","0"),
("77915","1","en","13359","perex","dnt_posts","","1","0"),
("77916","1","en","13359","content","dnt_posts","","1","0"),
("77917","1","en","13359","tags","dnt_posts","","1","0"),
("77918","1","de","13359","name","dnt_posts","","1","0"),
("77919","1","de","13359","name_url","dnt_posts","","1","0"),
("77920","1","de","13359","perex","dnt_posts","","1","0"),
("77921","1","de","13359","content","dnt_posts","","1","0"),
("77922","1","de","13359","tags","dnt_posts","","1","0"),
("77923","1","en","13360","name","dnt_posts","","1","0"),
("77924","1","en","13360","name_url","dnt_posts","","1","0"),
("77925","1","en","13360","perex","dnt_posts","","1","0"),
("77926","1","en","13360","content","dnt_posts","","1","0"),
("77927","1","en","13360","tags","dnt_posts","","1","0"),
("77928","1","de","13360","name","dnt_posts","","1","0"),
("77929","1","de","13360","name_url","dnt_posts","","1","0"),
("77930","1","de","13360","perex","dnt_posts","","1","0"),
("77931","1","de","13360","content","dnt_posts","","1","0"),
("77932","1","de","13360","tags","dnt_posts","","1","0"),
("77933","1","en","13361","name","dnt_posts","","1","0"),
("77934","1","en","13361","name_url","dnt_posts","","1","0"),
("77935","1","en","13361","perex","dnt_posts","","1","0"),
("77936","1","en","13361","content","dnt_posts","","1","0"),
("77937","1","en","13361","tags","dnt_posts","","1","0"),
("77938","1","de","13361","name","dnt_posts","","1","0"),
("77939","1","de","13361","name_url","dnt_posts","","1","0"),
("77940","1","de","13361","perex","dnt_posts","","1","0"),
("77941","1","de","13361","content","dnt_posts","","1","0"),
("77942","1","de","13361","tags","dnt_posts","","1","0"),
("77953","1","en","13362","name","dnt_posts","","1","0"),
("77954","1","en","13362","name_url","dnt_posts","","1","0"),
("77955","1","en","13362","perex","dnt_posts","","1","0"),
("77956","1","en","13362","content","dnt_posts","","1","0"),
("77957","1","en","13362","tags","dnt_posts","","1","0"),
("77958","1","de","13362","name","dnt_posts","","1","0"),
("77959","1","de","13362","name_url","dnt_posts","","1","0"),
("77960","1","de","13362","perex","dnt_posts","","1","0"),
("77961","1","de","13362","content","dnt_posts","","1","0"),
("77962","1","de","13362","tags","dnt_posts","","1","0"),
("78003","1","en","13353","name","dnt_posts","Default text","1","0"),
("78004","1","en","13353","name_url","dnt_posts","","1","0"),
("78005","1","en","13353","perex","dnt_posts","<p>Default text</p>\n","1","0"),
("78006","1","en","13353","content","dnt_posts","<p>Default text</p>\n","1","0"),
("78007","1","en","13353","tags","dnt_posts","","1","0"),
("78008","1","de","13353","name","dnt_posts","","1","0"),
("78009","1","de","13353","name_url","dnt_posts","","1","0"),
("78010","1","de","13353","perex","dnt_posts","","1","0"),
("78011","1","de","13353","content","dnt_posts","","1","0"),
("78012","1","de","13353","tags","dnt_posts","","1","0"),
("78013","1","en","13367","name","dnt_posts","","1","0"),
("78014","1","en","13367","name_url","dnt_posts","","1","0"),
("78015","1","en","13367","perex","dnt_posts","","1","0"),
("78016","1","en","13367","content","dnt_posts","","1","0"),
("78017","1","en","13367","tags","dnt_posts","","1","0"),
("78018","1","de","13367","name","dnt_posts","","1","0"),
("78019","1","de","13367","name_url","dnt_posts","","1","0"),
("78020","1","de","13367","perex","dnt_posts","","1","0"),
("78021","1","de","13367","content","dnt_posts","","1","0"),
("78022","1","de","13367","tags","dnt_posts","","1","0"),
("78043","1","en","13366","name","dnt_posts","","1","0"),
("78044","1","en","13366","name_url","dnt_posts","","1","0"),
("78045","1","en","13366","perex","dnt_posts","","1","0"),
("78046","1","en","13366","content","dnt_posts","","1","0"),
("78047","1","en","13366","tags","dnt_posts","","1","0"),
("78048","1","de","13366","name","dnt_posts","","1","0"),
("78049","1","de","13366","name_url","dnt_posts","","1","0"),
("78050","1","de","13366","perex","dnt_posts","","1","0"),
("78051","1","de","13366","content","dnt_posts","","1","0"),
("78052","1","de","13366","tags","dnt_posts","","1","0"),
("78073","1","en","13370","name","dnt_posts","","1","0"),
("78074","1","en","13370","name_url","dnt_posts","","1","0"),
("78075","1","en","13370","perex","dnt_posts","","1","0"),
("78076","1","en","13370","content","dnt_posts","","1","0"),
("78077","1","en","13370","tags","dnt_posts","","1","0"),
("78078","1","de","13370","name","dnt_posts","","1","0"),
("78079","1","de","13370","name_url","dnt_posts","","1","0"),
("78080","1","de","13370","perex","dnt_posts","","1","0"),
("78081","1","de","13370","content","dnt_posts","","1","0"),
("78082","1","de","13370","tags","dnt_posts","","1","0"),
("88558","1","en","13349","name","dnt_posts","About us","1","0"),
("88559","1","en","13349","name_url","dnt_posts","about-us","1","0"),
("88560","1","en","13349","perex","dnt_posts","","1","0"),
("88561","1","en","13349","content","dnt_posts","","1","0"),
("88562","1","en","13349","tags","dnt_posts","","1","0"),
("88563","1","de","13349","name","dnt_posts","über uns","1","0"),
("88564","1","de","13349","name_url","dnt_posts","uber-uns","1","0"),
("88565","1","de","13349","perex","dnt_posts","","1","0"),
("88566","1","de","13349","content","dnt_posts","","1","0"),
("88567","1","de","13349","tags","dnt_posts","","1","0"),
("88588","1","en","13356","name","dnt_posts","Contact form","1","0"),
("88589","1","en","13356","name_url","dnt_posts","form","1","0"),
("88590","1","en","13356","perex","dnt_posts","","1","0"),
("88591","1","en","13356","content","dnt_posts","","1","0"),
("88592","1","en","13356","tags","dnt_posts","","1","0"),
("88593","1","de","13356","name","dnt_posts","Kontact form","1","0"),
("88594","1","de","13356","name_url","dnt_posts","kontakt-form","1","0"),
("88595","1","de","13356","perex","dnt_posts","","1","0"),
("88596","1","de","13356","content","dnt_posts","","1","0");
INSERT INTO dnt_translates VALUES
("88597","1","de","13356","tags","dnt_posts","","1","0"),
("88598","1","en","13355","name","dnt_posts","Contact","1","0"),
("88599","1","en","13355","name_url","dnt_posts","contact","1","0"),
("88600","1","en","13355","perex","dnt_posts","","1","0"),
("88601","1","en","13355","content","dnt_posts","","1","0"),
("88602","1","en","13355","tags","dnt_posts","","1","0"),
("88603","1","de","13355","name","dnt_posts","Contact","1","0"),
("88604","1","de","13355","name_url","dnt_posts","contact","1","0"),
("88605","1","de","13355","perex","dnt_posts","","1","0"),
("88606","1","de","13355","content","dnt_posts","","1","0"),
("88607","1","de","13355","tags","dnt_posts","","1","0"),
("88678","1","en","13572","name","dnt_posts","","1","0"),
("88679","1","en","13572","name_url","dnt_posts","","1","0"),
("88680","1","en","13572","perex","dnt_posts","","1","0"),
("88681","1","en","13572","content","dnt_posts","","1","0"),
("88682","1","en","13572","tags","dnt_posts","","1","0"),
("88683","1","de","13572","name","dnt_posts","","1","0"),
("88684","1","de","13572","name_url","dnt_posts","","1","0"),
("88685","1","de","13572","perex","dnt_posts","","1","0"),
("88686","1","de","13572","content","dnt_posts","","1","0"),
("88687","1","de","13572","tags","dnt_posts","","1","0"),
("88688","1","en","13354","name","dnt_posts","Polls","1","0"),
("88689","1","en","13354","name_url","dnt_posts","polls","1","0"),
("88690","1","en","13354","perex","dnt_posts","","1","0"),
("88691","1","en","13354","content","dnt_posts","","1","0"),
("88692","1","en","13354","tags","dnt_posts","","1","0"),
("88693","1","de","13354","name","dnt_posts","Polls","1","0"),
("88694","1","de","13354","name_url","dnt_posts","polls","1","0"),
("88695","1","de","13354","perex","dnt_posts","","1","0"),
("88696","1","de","13354","content","dnt_posts","","1","0"),
("88697","1","de","13354","tags","dnt_posts","","1","0"),
("88698","1","en","13289","name","dnt_posts","Home","1","0"),
("88699","1","en","13289","name_url","dnt_posts","home","1","0"),
("88700","1","en","13289","perex","dnt_posts","","1","0"),
("88701","1","en","13289","content","dnt_posts","","1","0"),
("88702","1","en","13289","tags","dnt_posts","","1","0"),
("88703","1","de","13289","name","dnt_posts","Home","1","0"),
("88704","1","de","13289","name_url","dnt_posts","home","1","0"),
("88705","1","de","13289","perex","dnt_posts","","1","0"),
("88706","1","de","13289","content","dnt_posts","","1","0"),
("88707","1","de","13289","tags","dnt_posts","","1","0"),
("88708","1","en","13357","name","dnt_posts","Partners","1","0"),
("88709","1","en","13357","name_url","dnt_posts","partners","1","0"),
("88710","1","en","13357","perex","dnt_posts","","1","0"),
("88711","1","en","13357","content","dnt_posts","","1","0"),
("88712","1","en","13357","tags","dnt_posts","","1","0"),
("88713","1","de","13357","name","dnt_posts","","1","0"),
("88714","1","de","13357","name_url","dnt_posts","","1","0"),
("88715","1","de","13357","perex","dnt_posts","","1","0"),
("88716","1","de","13357","content","dnt_posts","","1","0"),
("88717","1","de","13357","tags","dnt_posts","","1","0"),
("88718","1","en","13368","name","dnt_posts","","1","0"),
("88719","1","en","13368","name_url","dnt_posts","","1","0"),
("88720","1","en","13368","perex","dnt_posts","","1","0"),
("88721","1","en","13368","content","dnt_posts","","1","0"),
("88722","1","en","13368","tags","dnt_posts","","1","0"),
("88723","1","de","13368","name","dnt_posts","","1","0"),
("88724","1","de","13368","name_url","dnt_posts","","1","0"),
("88725","1","de","13368","perex","dnt_posts","","1","0"),
("88726","1","de","13368","content","dnt_posts","","1","0"),
("88727","1","de","13368","tags","dnt_posts","","1","0"),
("88728","1","en","13392","name","dnt_posts","","1","0"),
("88729","1","en","13392","name_url","dnt_posts","","1","0"),
("88730","1","en","13392","perex","dnt_posts","","1","0"),
("88731","1","en","13392","content","dnt_posts","","1","0"),
("88732","1","en","13392","tags","dnt_posts","","1","0"),
("88733","1","de","13392","name","dnt_posts","","1","0"),
("88734","1","de","13392","name_url","dnt_posts","","1","0"),
("88735","1","de","13392","perex","dnt_posts","","1","0"),
("88736","1","de","13392","content","dnt_posts","","1","0"),
("88737","1","de","13392","tags","dnt_posts","","1","0"),
("88738","1","en","13573","name","dnt_posts","","1","0"),
("88739","1","en","13573","name_url","dnt_posts","","1","0"),
("88740","1","en","13573","perex","dnt_posts","","1","0"),
("88741","1","en","13573","content","dnt_posts","","1","0"),
("88742","1","en","13573","tags","dnt_posts","","1","0"),
("88743","1","de","13573","name","dnt_posts","","1","0"),
("88744","1","de","13573","name_url","dnt_posts","","1","0"),
("88745","1","de","13573","perex","dnt_posts","","1","0"),
("88746","1","de","13573","content","dnt_posts","","1","0"),
("88747","1","de","13573","tags","dnt_posts","","1","0"),
("88838","1","en","13365","name","dnt_posts","Posts","1","0"),
("88839","1","en","13365","name_url","dnt_posts","posts","1","0"),
("88840","1","en","13365","perex","dnt_posts","","1","0"),
("88841","1","en","13365","content","dnt_posts","","1","0"),
("88842","1","en","13365","tags","dnt_posts","","1","0"),
("88843","1","de","13365","name","dnt_posts","Posts","1","0"),
("88844","1","de","13365","name_url","dnt_posts","posts","1","0"),
("88845","1","de","13365","perex","dnt_posts","","1","0"),
("88846","1","de","13365","content","dnt_posts","","1","0"),
("88847","1","de","13365","tags","dnt_posts","","1","0");




CREATE TABLE `dnt_uploads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vendor_id` int(11) NOT NULL,
  `name` varchar(300) CHARACTER SET utf8 NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `type` varchar(300) CHARACTER SET utf8 NOT NULL,
  `show` int(11) NOT NULL DEFAULT '1',
  `parent_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=977 DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;


INSERT INTO dnt_uploads VALUES
("671","1","dnt3.png","2017-03-07 22:47:11","image/png","1","0"),
("731","1","logo.png","2017-04-06 10:44:09","image/png","1","0"),
("732","1","tomandjarry.png","2017-04-06 10:49:21","image/png","1","0"),
("733","1","logo-1.png","2017-04-06 10:51:16","image/png","1","0"),
("734","1","29-awesome-black-themed-abstract-wallpapers-1dut.com-28-1024x576.jpg","2017-04-06 10:54:15","image/jpeg","1","0"),
("735","1","abstract-1011_4.jpg","2017-04-06 10:54:43","image/jpeg","1","0"),
("736","1","abstract-1011_4_1.jpg","2017-04-06 10:54:44","image/jpeg","1","0"),
("737","1","logo-1.jpg","2017-04-06 10:55:08","image/jpeg","1","0"),
("738","1","f83920aff7155a9eccf31262549f6d3b.jpg","2017-04-08 09:16:58","image/jpeg","1","0"),
("739","1","dnt3-oop.jpg","2017-04-09 08:50:33","image/jpeg","1","0"),
("740","1","x1B8.janka_hospodarova_zlatica_puskarova_patrik_herman_jan_tribula_alebo_peter_varinsky.jpg","2017-04-09 09:02:05","image/jpeg","1","0"),
("741","1","7mUF.zlatica_puskarova.jpg","2017-04-09 09:02:05","image/jpeg","1","0"),
("742","1","dqNx.jan_tribula.jpg","2017-04-09 09:02:05","image/jpeg","1","0"),
("743","1","bq3q.peter_varinsky.jpg","2017-04-09 09:02:05","image/jpeg","1","0"),
("744","1","ZpjH.patrik_herman_tabor.jpg","2017-04-09 09:02:06","image/jpeg","1","0"),
("745","1","3qHu.janka_hospodarova.jpg","2017-04-09 09:02:06","image/jpeg","1","0"),
("746","1","1d9b904.png","2017-04-10 12:00:01","image/png","1","0"),
("747","1","markiza.gif","2017-04-10 12:25:12","image/gif","1","0"),
("748","1","tvn_logo.png","2017-04-10 12:26:18","image/png","1","0"),
("749","1","osmos_logo_1.jpg","2017-04-10 12:27:28","image/jpeg","1","0"),
("750","1","dnt3-about.jpg","2017-04-13 16:44:28","image/jpeg","1","0"),
("776","1","Pompo-logo-obrys.png","2017-05-01 19:32:34","image/png","1","0"),
("775","1","larsson-zara-543a46058a47f_2.jpg","2017-05-01 19:27:55","image/jpeg","1","0"),
("976","1","28f6e6c6eee81a6d4014d894541a875a.jpg","2018-07-27 11:00:18","image/jpeg","1","0");




CREATE TABLE `dnt_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;


INSERT INTO dnt_users VALUES
("14","1","","admin","Tomáš","Doubek","osmos","","","","0","","","b69a84481c97f320c80020b01d5620b5","thomas.doubek@gmail.com","","","","0","0","0","0","0000-00-00 00:00:00","0000-00-00 00:00:00","0000-00-00 00:00:00","","","0","","","738","1","0","","0"),
("20","1","","admin","Admin","Root","skeleton","","","","0","","","21232f297a57a5a743894a0e4a801fc3","admin@root.sk","","","","0","0","0","0","0000-00-00 00:00:00","0000-00-00 00:00:00","0000-00-00 00:00:00","","","0","","","738","1","0","","0");




CREATE TABLE `dnt_vendors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(300) NOT NULL,
  `name_url` varchar(300) NOT NULL,
  `real_url` varchar(300) NOT NULL,
  `show_real_url` int(11) NOT NULL,
  `layout` varchar(300) NOT NULL,
  `is_default` int(11) NOT NULL,
  `show` int(11) NOT NULL,
  `in_progress` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;




