<?php

define( 'DEAFULT_MODUL', 'homepage' ); // set system name
define( 'DEAFULT_LANG', 'sk' ); // set system lang
define( 'SRC', 'src' ); // ser $_GET['{eny}']

//SYSTEM INFO
define( 'GET_SYSTEM_NAME', 'Designdnt 3' );
define( 'GET_SYSTEM_VERSION', 'dnt_4.03, December' );
define( 'GET_SYSTEM_COMPOSER', 'dnt_1.13' );
define( 'GET_SYSTEM_ENGINE_PATTERN', 'Model-View-Controller (MVC)' );
define( 'GET_SYSTEM_SEARCH_ENGINE', 'Dnt-SE-keys, zostava 1200' );
define( 'GET_SYSTEM_COMPONENTS', 'DntJson, DntSoap, DntXml, DntRss, DntXSSLoader' );

//CACHE DEFINE
define( 'IS_CACHING', true );
define( 'IS_LOGSYSTEM_ON', true );
define( 'CACHE_HTTP_STATUS', '201' );
define( 'CACHE_TIME_SEC', '86400' );
define( 'CACHE_URL', '0' );

//DB CONNECT
define( 'DB_HOST', 'mariadb55.websupport.sk:3310' ); // set database host
define( 'DB_USER', '4tourism' ); // set database user
define( 'DB_PASS', '77ccMUnjrb' ); // set database password
define( 'DB_NAME', '4tourism' ); // set database name
define( 'SEND_ERRORS_TO', 'info@vyhrat.com' ); //set email notification email address
define( 'DISPLAY_DEBUG', true ); //display db errors?

//DEFAULT EMAIL
define( 'DEFAULT_EMAIL', "info@vyhrat.com" ); //display db errors?

//DEFAULT VENDOR NAME
define( 'DEFAULT_NAME', "Vyhrat" ); //display db errors?

//LANG
define( 'LANG', "sk/" ); //folder or folders in root host folder

//OTHERS
define( 'WWW_FOLDERS', "" ); //folder or folders in root host folder
define( 'HTTP_PROTOCOL', "http://" ); //protocol

//SERVER NAME
define( 'SERVER_NAME', "vyhrat.com" ); //server path too root file usualy index.php

//VENDOR URL
define( 'SERVER_VENDOR', "vyhrat" ); 

//VENDOR ID
define( 'VENDOR_ID', "30" ); 

//LAYOUT ID
define( 'LAYOUT_ID', "13" ); //server path too root file usualy index.php

//SYSTEM PATHS
define( 'LIBRARY_NAME', 'dnt-library' ); // set library name
define( 'SYSTEM_NAME', 'dnt-system' ); // set system name
//URL PATH
define( 'WWW_PATH', HTTP_PROTOCOL.$_SERVER['SERVER_NAME'].WWW_FOLDERS."/" ); //server path too root file usualy index.php or home.php

//SERver path
define( 'SERVER_PATH', HTTP_PROTOCOL.SERVER_NAME.WWW_FOLDERS."/" ); //server without subdomain path too root file usualy index.php or home.php

//CDN PATH
define( 'WWW_CDN_PATH', HTTP_PROTOCOL."dnt.static-cdn.".SERVER_NAME.WWW_FOLDERS."/" ); //server path too root file usualy index.php

//FULL PATH
define( 'WWW_FULL_PATH', HTTP_PROTOCOL.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'] ); //full virtual path of actual address

//socket-brick01-static-cdn.

