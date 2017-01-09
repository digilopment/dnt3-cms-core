<?php
include "../dnt-library/framework/_Class/Autoload.php";
$autoload		= new Autoload;
$path			= "../";
$autoload->load($path);
?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <!--[if IE]>
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
      <![endif]-->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="author" content="">
      <title>Systém | Designdnt</title>
      <link rel="icon" href="<?php echo WWW_PATH_ADMIN; ?>img/favicon.ico">
      <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
      <!-- BEGIN CSS FRAMEWORK -->
      <link rel="stylesheet" href="<?php echo WWW_PATH_ADMIN; ?>css/bootstrap.min.css">
      <link rel="stylesheet" href="<?php echo WWW_PATH_ADMIN; ?>css/font-awesome.min.css">
      <!-- END CSS FRAMEWORK -->
      <!-- BEGIN CSS PLUGIN -->
      <link rel="stylesheet" href="<?php echo WWW_PATH_ADMIN; ?>css/pace-theme-minimal.css">
      <link rel="stylesheet" href="<?php echo WWW_PATH_ADMIN; ?>css/jquery.gritter.css">
      <link rel="stylesheet" href="<?php echo WWW_PATH_ADMIN; ?>css/bootstrap-datetimepicker.min.css">
      <link rel="stylesheet" href="<?php echo WWW_PATH_ADMIN; ?>css/jquery-jvectormap-1.2.2.css">
      <link rel="stylesheet" href="<?php echo WWW_PATH_ADMIN; ?>css/blue.css">
      <!-- END CSS PLUGIN -->
      <!-- BEGIN CSS TEMPLATE -->
      <link rel="stylesheet" href="<?php echo WWW_PATH_ADMIN; ?>css/main.css">
      <link rel="stylesheet" href="<?php echo WWW_PATH_ADMIN; ?>css/skins.css">
      <link rel="stylesheet" href="<?php echo WWW_PATH_ADMIN; ?>css/designdnt.css">
      <!-- END CSS TEMPLATE -->
      <!-- CK EDITOR -->
      <!-- this editor is saved in designdnt library as included module -->
      <script src="../dnt-library/ckeditor/ckeditor.js"></script>
      <!-- END CK EDITOR -->
   </head>
   <body class="skin-dark">
      <!-- BEGIN HEADER -->
      <header class="header">
         <!-- BEGIN LOGO -->
         <a href="<?php echo WWW_PATH_ADMIN; ?>" class="logo">
            <!--<img src="<?php echo WWW_PATH_ADMIN; ?>img/logo.png" alt="Kertas" height="20">-->
            <h3 style="text-align: left; margin-left: 10px;"><span class="designdnt_a">Design</span><span class="designdnt_b">dnt<big><strong>3</strong></big></span></h3>
         </a>
         <!-- END LOGO -->
         <!-- BEGIN NAVBAR -->
         <nav class="navbar navbar-static-top" role="navigation">
            <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="fa fa-bars fa-lg"></span>
            </a>
            <!-- BEGIN NEWS TICKER -->
            <div class="ticker">
               <strong>Novinky:</strong>
               <ul>
                  <li>Designdnt 3 - nový Redakčný systém, ktorý komunikuje</li>
                  <li><a target="_blank" href="http://query.sk/">TheQuery</a></li>
                  <li><a target="_blank" href="http://designdnt.query.sk/kontakt/">Pomoc s ovládaním Designdnt3</a></li>
                  <!--<li>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                     <li>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </li>
                     <li>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</li>-->
               </ul>
            </div>
            <!-- END NEWS TICKER -->
            <div class="navbar-right">
               <ul class="nav navbar-nav">
                  <!-- NOTIFIKACIE KOMENTAROV -->
                  <li class="dropdown navbar-menu">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                     <i class="fa fa-comments fa-lg"></i>
                     </a>
                     <ul class="dropdown-menu box inbox">
                        <li>
                           <div class="up-arrow"></div>
                        </li>
                        <li>
                           <p>Žiadne nové komentáre</p>
                        </li>
                     </ul>
                  </li>
                  <!-- END NOTIFIKACIE KOMENTAROV -->
                  <li class="dropdown navbar-menu">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                     <i class="fa fa-paper-plane-o fa-lg"></i>
                     </a>
                     <ul class="dropdown-menu box inbox">
                        <li>
                           <div class="up-arrow"></div>
                        </li>
                        <li>
                           <p>Žiadne nové správy</p>
                        </li>
                     </ul>
                  </li>
                  <!-- NOTIFIKACIA USERS-->
                  <li class="dropdown navbar-menu">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                     <i class="fa fa-user fa-lg"></i>
                     </a>
                     <ul class="dropdown-menu box inbox">
                        <li>
                           <div class="up-arrow"></div>
                        </li>
                        <li>
                           <p>Žiadni noví používatelia / zákazníci</p>
                        </li>
                     </ul>
                  </li>
                  <!-- NOTIFIKACIA OBJEDNAVKY-->
                  <li class="dropdown navbar-menu">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                     <i class="fa fa fa-dollar fa-lg"></i>
                     <span class="badge">29</span>
                     </a>
                     <ul class="dropdown-menu box inbox">
                        <li>
                           <div class="up-arrow"></div>
                        </li>
                        <li>
                           <p>Počet nových objednávok: 29</p>
                        </li>
                        <li>
                           <a href="index.php?src=obsah&upravit=comments&id=8&return=index.php?src=obsah&filtruj=msg">
                           <span class="photo"><img src="http://socket-brick01-static-cdn.query.sk/dnt-system/data/0/uploads/" alt="User Image"></span>
                           <span class="subject">
                           <span class="from">MARKÍZA - SLOVAKIA, spol. s.r.o. </span>
                           <span class="time">28.9.2015 - </span>
                           <span class="message"></span>
                           </span>
                           </a>
                        </li>
                        <li>
                           <a href="index.php?src=obsah&upravit=comments&id=9&return=index.php?src=obsah&filtruj=msg">
                           <span class="photo"><img src="http://socket-brick01-static-cdn.query.sk/dnt-system/data/0/uploads/" alt="User Image"></span>
                           <span class="subject">
                           <span class="from"> </span>
                           <span class="time">8.8.2015 - </span>
                           <span class="message"></span>
                           </span>
                           </a>
                        </li>
                        <li>
                           <a href="index.php?src=obsah&upravit=comments&id=10&return=index.php?src=obsah&filtruj=msg">
                           <span class="photo"><img src="http://socket-brick01-static-cdn.query.sk/dnt-system/data/0/uploads/" alt="User Image"></span>
                           <span class="subject">
                           <span class="from"> </span>
                           <span class="time">8.8.2015 - </span>
                           <span class="message"></span>
                           </span>
                           </a>
                        </li>
                        <li>
                           <a href="index.php?src=obsah&upravit=comments&id=11&return=index.php?src=obsah&filtruj=msg">
                           <span class="photo"><img src="http://socket-brick01-static-cdn.query.sk/dnt-system/data/0/uploads/" alt="User Image"></span>
                           <span class="subject">
                           <span class="from">MARKÍZA - SLOVAKIA, spol. s.r.o. </span>
                           <span class="time">3.9.2015 - </span>
                           <span class="message"></span>
                           </span>
                           </a>
                        </li>
                        <li>
                           <a href="index.php?src=obsah&upravit=comments&id=12&return=index.php?src=obsah&filtruj=msg">
                           <span class="photo"><img src="http://socket-brick01-static-cdn.query.sk/dnt-system/data/0/uploads/" alt="User Image"></span>
                           <span class="subject">
                           <span class="from">Kinecom s.r.o. </span>
                           <span class="time">18.9.2015 - </span>
                           <span class="message">kostkova.katarina@gmail.com</span>
                           </span>
                           </a>
                        </li>
                        <li>
                           <a href="index.php?src=obsah&upravit=comments&id=14&return=index.php?src=obsah&filtruj=msg">
                           <span class="photo"><img src="http://socket-brick01-static-cdn.query.sk/dnt-system/data/0/uploads/" alt="User Image"></span>
                           <span class="subject">
                           <span class="from">MARKÍZA - SLOVAKIA, spol. s.r.o. </span>
                           <span class="time">30.10.2015 - </span>
                           <span class="message"></span>
                           </span>
                           </a>
                        </li>
                        <li>
                           <a href="index.php?src=obsah&upravit=comments&id=15&return=index.php?src=obsah&filtruj=msg">
                           <span class="photo"><img src="http://socket-brick01-static-cdn.query.sk/dnt-system/data/0/uploads/" alt="User Image"></span>
                           <span class="subject">
                           <span class="from">MARKÍZA - SLOVAKIA, spol. s.r.o. </span>
                           <span class="time">27.11.2015 - </span>
                           <span class="message"></span>
                           </span>
                           </a>
                        </li>
                        <li>
                           <a href="index.php?src=obsah&upravit=comments&id=16&return=index.php?src=obsah&filtruj=msg">
                           <span class="photo"><img src="http://socket-brick01-static-cdn.query.sk/dnt-system/data/0/uploads/" alt="User Image"></span>
                           <span class="subject">
                           <span class="from">MARKÍZA - SLOVAKIA, spol. s.r.o. </span>
                           <span class="time">11.12.2015 - </span>
                           <span class="message"></span>
                           </span>
                           </a>
                        </li>
                        <li>
                           <a href="index.php?src=obsah&upravit=comments&id=17&return=index.php?src=obsah&filtruj=msg">
                           <span class="photo"><img src="http://socket-brick01-static-cdn.query.sk/dnt-system/data/0/uploads/" alt="User Image"></span>
                           <span class="subject">
                           <span class="from">MARKÍZA - SLOVAKIA, spol. s.r.o. </span>
                           <span class="time">28.12.2015 - </span>
                           <span class="message"></span>
                           </span>
                           </a>
                        </li>
                        <li>
                           <a href="index.php?src=obsah&upravit=comments&id=18&return=index.php?src=obsah&filtruj=msg">
                           <span class="photo"><img src="http://socket-brick01-static-cdn.query.sk/dnt-system/data/0/uploads/" alt="User Image"></span>
                           <span class="subject">
                           <span class="from">MARKÍZA - SLOVAKIA, spol. s.r.o. </span>
                           <span class="time">29.1.2016 - </span>
                           <span class="message"></span>
                           </span>
                           </a>
                        </li>
                        <li>
                           <a href="index.php?src=obsah&upravit=comments&id=19&return=index.php?src=obsah&filtruj=msg">
                           <span class="photo"><img src="http://socket-brick01-static-cdn.query.sk/dnt-system/data/0/uploads/" alt="User Image"></span>
                           <span class="subject">
                           <span class="from">MARKÍZA - SLOVAKIA, spol. s.r.o. </span>
                           <span class="time">28.2.2016 - </span>
                           <span class="message"></span>
                           </span>
                           </a>
                        </li>
                        <li>
                           <a href="index.php?src=obsah&upravit=comments&id=20&return=index.php?src=obsah&filtruj=msg">
                           <span class="photo"><img src="http://socket-brick01-static-cdn.query.sk/dnt-system/data/0/uploads/" alt="User Image"></span>
                           <span class="subject">
                           <span class="from">MARKÍZA - SLOVAKIA, spol. s.r.o. </span>
                           <span class="time">28.3.2016 - </span>
                           <span class="message"></span>
                           </span>
                           </a>
                        </li>
                        <li>
                           <a href="index.php?src=obsah&upravit=comments&id=22&return=index.php?src=obsah&filtruj=msg">
                           <span class="photo"><img src="http://socket-brick01-static-cdn.query.sk/dnt-system/data/0/uploads/" alt="User Image"></span>
                           <span class="subject">
                           <span class="from">MARKÍZA - SLOVAKIA, spol. s.r.o. </span>
                           <span class="time">28.4.2016 - </span>
                           <span class="message"></span>
                           </span>
                           </a>
                        </li>
                        <li>
                           <a href="index.php?src=obsah&upravit=comments&id=23&return=index.php?src=obsah&filtruj=msg">
                           <span class="photo"><img src="http://socket-brick01-static-cdn.query.sk/dnt-system/data/0/uploads/" alt="User Image"></span>
                           <span class="subject">
                           <span class="from">MARKÍZA - SLOVAKIA, spol. s.r.o. </span>
                           <span class="time">31.5.2016 - </span>
                           <span class="message"></span>
                           </span>
                           </a>
                        </li>
                        <li>
                           <a href="index.php?src=obsah&upravit=comments&id=25&return=index.php?src=obsah&filtruj=msg">
                           <span class="photo"><img src="http://socket-brick01-static-cdn.query.sk/dnt-system/data/0/uploads/" alt="User Image"></span>
                           <span class="subject">
                           <span class="from">MARKÍZA - SLOVAKIA, spol. s.r.o. </span>
                           <span class="time">30.6.2016 - </span>
                           <span class="message"></span>
                           </span>
                           </a>
                        </li>
                        <li>
                           <a href="index.php?src=obsah&upravit=comments&id=26&return=index.php?src=obsah&filtruj=msg">
                           <span class="photo"><img src="http://socket-brick01-static-cdn.query.sk/dnt-system/data/0/uploads/" alt="User Image"></span>
                           <span class="subject">
                           <span class="from">MARKÍZA - SLOVAKIA, spol. s.r.o. </span>
                           <span class="time">30.6.2016 - </span>
                           <span class="message"></span>
                           </span>
                           </a>
                        </li>
                        <li>
                           <a href="index.php?src=obsah&upravit=comments&id=27&return=index.php?src=obsah&filtruj=msg">
                           <span class="photo"><img src="http://socket-brick01-static-cdn.query.sk/dnt-system/data/0/uploads/" alt="User Image"></span>
                           <span class="subject">
                           <span class="from">team4tourism s.r.o. </span>
                           <span class="time">8.7.2016 - </span>
                           <span class="message"></span>
                           </span>
                           </a>
                        </li>
                        <li>
                           <a href="index.php?src=obsah&upravit=comments&id=28&return=index.php?src=obsah&filtruj=msg">
                           <span class="photo"><img src="http://socket-brick01-static-cdn.query.sk/dnt-system/data/0/uploads/" alt="User Image"></span>
                           <span class="subject">
                           <span class="from">MARKÍZA - SLOVAKIA, spol. s.r.o. </span>
                           <span class="time">30.7.2016 - </span>
                           <span class="message"></span>
                           </span>
                           </a>
                        </li>
                        <li>
                           <a href="index.php?src=obsah&upravit=comments&id=29&return=index.php?src=obsah&filtruj=msg">
                           <span class="photo"><img src="http://socket-brick01-static-cdn.query.sk/dnt-system/data/0/uploads/" alt="User Image"></span>
                           <span class="subject">
                           <span class="from">Osmos s.r.o. </span>
                           <span class="time">8.8.2016 - </span>
                           <span class="message"></span>
                           </span>
                           </a>
                        </li>
                        <li>
                           <a href="index.php?src=obsah&upravit=comments&id=30&return=index.php?src=obsah&filtruj=msg">
                           <span class="photo"><img src="http://socket-brick01-static-cdn.query.sk/dnt-system/data/0/uploads/" alt="User Image"></span>
                           <span class="subject">
                           <span class="from">MARKÍZA - SLOVAKIA, spol. s.r.o. </span>
                           <span class="time">30.8.2016 - </span>
                           <span class="message"></span>
                           </span>
                           </a>
                        </li>
                        <li>
                           <a href="index.php?src=obsah&upravit=comments&id=31&return=index.php?src=obsah&filtruj=msg">
                           <span class="photo"><img src="http://socket-brick01-static-cdn.query.sk/dnt-system/data/0/uploads/" alt="User Image"></span>
                           <span class="subject">
                           <span class="from">MARKÍZA - SLOVAKIA, spol. s.r.o. </span>
                           <span class="time">30.8.2016 - </span>
                           <span class="message"></span>
                           </span>
                           </a>
                        </li>
                        <li>
                           <a href="index.php?src=obsah&upravit=comments&id=32&return=index.php?src=obsah&filtruj=msg">
                           <span class="photo"><img src="http://socket-brick01-static-cdn.query.sk/dnt-system/data/0/uploads/" alt="User Image"></span>
                           <span class="subject">
                           <span class="from">MARKÍZA - SLOVAKIA, spol. s.r.o. </span>
                           <span class="time">30.9.2016 - </span>
                           <span class="message"></span>
                           </span>
                           </a>
                        </li>
                        <li>
                           <a href="index.php?src=obsah&upravit=comments&id=33&return=index.php?src=obsah&filtruj=msg">
                           <span class="photo"><img src="http://socket-brick01-static-cdn.query.sk/dnt-system/data/0/uploads/" alt="User Image"></span>
                           <span class="subject">
                           <span class="from">MARKÍZA - SLOVAKIA, spol. s.r.o. </span>
                           <span class="time">30.10.2016 - </span>
                           <span class="message"></span>
                           </span>
                           </a>
                        </li>
                        <li>
                           <a href="index.php?src=obsah&upravit=comments&id=34&return=index.php?src=obsah&filtruj=msg">
                           <span class="photo"><img src="http://socket-brick01-static-cdn.query.sk/dnt-system/data/0/uploads/" alt="User Image"></span>
                           <span class="subject">
                           <span class="from">MARKÍZA - SLOVAKIA, spol. s.r.o. </span>
                           <span class="time">30.10.2016 - </span>
                           <span class="message"></span>
                           </span>
                           </a>
                        </li>
                        <li>
                           <a href="index.php?src=obsah&upravit=comments&id=35&return=index.php?src=obsah&filtruj=msg">
                           <span class="photo"><img src="http://socket-brick01-static-cdn.query.sk/dnt-system/data/0/uploads/" alt="User Image"></span>
                           <span class="subject">
                           <span class="from">Osmos s.r.o. </span>
                           <span class="time">13.11.2016 - </span>
                           <span class="message"></span>
                           </span>
                           </a>
                        </li>
                        <li>
                           <a href="index.php?src=obsah&upravit=comments&id=36&return=index.php?src=obsah&filtruj=msg">
                           <span class="photo"><img src="http://socket-brick01-static-cdn.query.sk/dnt-system/data/0/uploads/" alt="User Image"></span>
                           <span class="subject">
                           <span class="from">MARKÍZA - SLOVAKIA, spol. s.r.o. </span>
                           <span class="time">30.11.2016 - </span>
                           <span class="message"></span>
                           </span>
                           </a>
                        </li>
                        <li>
                           <a href="index.php?src=obsah&upravit=comments&id=37&return=index.php?src=obsah&filtruj=msg">
                           <span class="photo"><img src="http://socket-brick01-static-cdn.query.sk/dnt-system/data/0/uploads/" alt="User Image"></span>
                           <span class="subject">
                           <span class="from">MARKÍZA - SLOVAKIA, spol. s.r.o. </span>
                           <span class="time">30.11.2016 - </span>
                           <span class="message"></span>
                           </span>
                           </a>
                        </li>
                        <li>
                           <a href="index.php?src=obsah&upravit=comments&id=38&return=index.php?src=obsah&filtruj=msg">
                           <span class="photo"><img src="http://socket-brick01-static-cdn.query.sk/dnt-system/data/0/uploads/" alt="User Image"></span>
                           <span class="subject">
                           <span class="from">MARKÍZA - SLOVAKIA, spol. s.r.o. </span>
                           <span class="time">30.11.2016 - </span>
                           <span class="message"></span>
                           </span>
                           </a>
                        </li>
                        <li>
                           <a href="index.php?src=obsah&upravit=comments&id=39&return=index.php?src=obsah&filtruj=msg">
                           <span class="photo"><img src="http://socket-brick01-static-cdn.query.sk/dnt-system/data/0/uploads/" alt="User Image"></span>
                           <span class="subject">
                           <span class="from">team4tourism s.r.o. </span>
                           <span class="time">1.12.2016 - </span>
                           <span class="message"></span>
                           </span>
                           </a>
                        </li>
                     </ul>
                  </li>
                  <li class="dropdown profile-menu">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                     <i class="fa fa-cog fa-lg"></i>
                     <span class="username">Tomáš Doubek  - Designdnt</span>
                     <i class="caret"></i>
                     </a>
                     <ul class="dropdown-menu box profile">
                        <li>
                           <div class="up-arrow"></div>
                        </li>
                        <li class="border-top">
                           <a href="index.php?src=pristupy&upravit&id=1"><i class="fa fa-user"></i>Môj účet</a>
                        </li>
                        <li>
                           <a href="index.php?src=obsah&pridat"><i class="fa fa-laptop"></i>Pridať post</a>
                        </li>
                        <li >
                           <a href="index.php?src=nastavenia&pa=1"><i class="fa fa-gears"></i>Nastavenia stránky</a>
                        </li>
                        <li >
                           <a href="index.php?src=nastavenia&pa=2"><i class="fa fa-gears"></i>Nastavenia vlastníctva</a>
                        </li>
                        <li >
                           <a href="index.php?src=nastavenia&pa=4"><i class="fa fa-gears"></i>Nastavenia loga</a>
                        </li>
                        <li>
                           <a href="index.php?src=mailer">
                              <i class="fa fa-inbox"></i>Napísať email<!--<span class="badge">3</span>-->
                           </a>
                        </li>
                        <!--<li>
                           <a href="lockscreen.html"><i class="fa fa-lock"></i>Lock Screen</a>
                           </li>-->
                        <li>
                           <a href="<?php echo WWW_PATH_ADMIN; ?>index.php?src=logout"><i class="fa fa-power-off"></i>Odhlásiť sa</a>
                        </li>
                     </ul>
                  </li>
               </ul>
            </div>
         </nav>
         <!-- END NAVBAR -->
      </header>
      <!-- END HEADER -->
      <div class="wrapper row-offcanvas row-offcanvas-left">
         <!-- BEGIN SIDEBAR -->
         <aside class="left-side sidebar-offcanvas">
            <section class="sidebar">
               <div class="user-panel">
                  <div class="pull-left image">
                     <img src="http://socket-brick01-static-cdn.query.sk/dnt-system/data/0/uploads/no_image.jpg" class="img-circle" alt="User Image">
                  </div>
                  <div class="pull-left info">
                     <p><strong>Tomáš Doubek  - Designdnt</strong></p>
                     <a href="#"><i class="fa fa-circle text-green"></i> Online</a>
                  </div>
               </div>
               <form action="<?php echo WWW_PATH_ADMIN; ?>index.php?src=;" method="GET" class="sidebar-form">
                  <div class="input-group">
                     <input type="hidden" name="src" value="" placeholder="Hľadať...">
                     <input type="text" name="hladaj" class="form-control" placeholder="Hľadať...">
                     <span class="input-group-btn">
                     <button type="submit" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
                     </span>
                  </div>
               </form>
               <ul class="sidebar-menu">
                  <!--<li class="menu">-->
                  <li class="">
                     <a href="<?php echo WWW_PATH_ADMIN; ?>index.php?src=domov">
                     <i class="fa fa fa-home"></i>
                     <span>Domov</span>
                     </a>
                  </li>
                  <!--<li class="menu">-->
                  <li class="">
                     <a href="<?php echo WWW_PATH_ADMIN; ?>index.php?src=nastavenia">
                     <i class="fa  fa-gears"></i>
                     <span>Nastavenia</span>
                     </a>
                  </li>
                  <!--<li class="menu">-->
                  <li class="menu">
                     <a href="">
                     <i class="fa fa-user"></i>
                     <span>Multylanguage</span>
                     <i class="fa fa-angle-left pull-right"></i>
                     </a>
                     <ul class="sub-menu">
                        <li>
                           <a href="<?php echo WWW_PATH_ADMIN; ?>index.php?src=multylanguage">
                           <span>Zoznam prekladov</span>
                           &nbsp;&nbsp;<i style="text-align: right;" class="fa "></i>
                           </a>
                        </li>
                        <li>
                           <a href="<?php echo WWW_PATH_ADMIN; ?>index.php?src=multylanguage&pridat">
                           <span>Aktívne jazyky</span>
                           &nbsp;&nbsp;<i style="text-align: right;" class="fa "></i>
                           </a>
                        </li>
                     </ul>
                  </li>
                  <li class="menu">
                     <a href="">
                     <i class="fa fa-laptop"></i>
                     <span>Obsah</span>
                     <i class="fa fa-angle-left pull-right"></i>
                     </a>
                     <ul class="sub-menu">
                        <li>
                           <a href="<?php echo WWW_PATH_ADMIN; ?>index.php?src=obsah&filtruj=static">
                           <span>Static (len programátor)</span>
                           &nbsp;&nbsp;<i style="text-align: right;" class="fa <br />
                              <b>Notice</b>:  Undefined index: zobraz_ikonu in <b>/nfsmnt/hosting1_1/9/e/9e6265f6-b658-4f7f-b316-0781f3ea5f28/query.sk/web/dnt-library/framework/_dnt3/just-admin.php</b> on line <b>361</b><br />
                              "></i>
                           </a>
                        </li>
                        <li>
                           <a href="<?php echo WWW_PATH_ADMIN; ?>index.php?src=obsah&filtruj=pages">
                           <span>Stránka</span>
                           &nbsp;&nbsp;<i style="text-align: right;" class="fa "></i>
                           </a>
                        </li>
                        <li>
                           <a href="<?php echo WWW_PATH_ADMIN; ?>index.php?src=obsah&filtruj=clanky">
                           <span>Článok</span>
                           &nbsp;&nbsp;<i style="text-align: right;" class="fa "></i>
                           </a>
                        </li>
                        <li>
                           <a href="<?php echo WWW_PATH_ADMIN; ?>index.php?src=obsah&filtruj=reklama3">
                           <span>Reklama 3</span>
                           &nbsp;&nbsp;<i style="text-align: right;" class="fa "></i>
                           </a>
                        </li>
                        <li>
                           <a href="<?php echo WWW_PATH_ADMIN; ?>index.php?src=obsah&filtruj=partneri">
                           <span>Partneri</span>
                           &nbsp;&nbsp;<i style="text-align: right;" class="fa "></i>
                           </a>
                        </li>
                        <li>
                           <a href="<?php echo WWW_PATH_ADMIN; ?>index.php?src=obsah&filtruj=slider-home">
                           <span>Slajdre na home page</span>
                           &nbsp;&nbsp;<i style="text-align: right;" class="fa "></i>
                           </a>
                        </li>
                        <li>
                           <a href="<?php echo WWW_PATH_ADMIN; ?>index.php?src=obsah&filtruj=newsletters">
                           <span>Newslettre</span>
                           &nbsp;&nbsp;<i style="text-align: right;" class="fa "></i>
                           </a>
                        </li>
                        <li>
                           <a href="<?php echo WWW_PATH_ADMIN; ?>index.php?src=obsah&filtruj=reklama1">
                           <span>Reklama 1</span>
                           &nbsp;&nbsp;<i style="text-align: right;" class="fa "></i>
                           </a>
                        </li>
                        <li>
                           <a href="<?php echo WWW_PATH_ADMIN; ?>index.php?src=obsah&filtruj=reklama2">
                           <span>Reklama 2</span>
                           &nbsp;&nbsp;<i style="text-align: right;" class="fa "></i>
                           </a>
                        </li>
                        <li>
                           <a href="<?php echo WWW_PATH_ADMIN; ?>index.php?src=obsah&filtruj=layouts_theme">
                           <span>Grafické témy</span>
                           &nbsp;&nbsp;<i style="text-align: right;" class="fa "></i>
                           </a>
                        </li>
                        <li>
                           <a href="<?php echo WWW_PATH_ADMIN; ?>index.php?src=obsah&filtruj=produkty">
                           <span>Produkty</span>
                           &nbsp;&nbsp;<i style="text-align: right;" class="fa "></i>
                           </a>
                        </li>
                     </ul>
                  </li>
                  <!--<li class="menu">-->
                  <li class="">
                     <a href="<?php echo WWW_PATH_ADMIN; ?>index.php?src=obsah&filtruj=slider-home">
                     <i class="fa fa-sliders"></i>
                     <span>Slajdre</span>
                     </a>
                  </li>
                  <!--<li class="menu">-->
                  <li class="menu">
                     <a href="">
                     <i class="fa fa-camera-retro"></i>
                     <span>Galéria</span>
                     <i class="fa fa-angle-left pull-right"></i>
                     </a>
                     <ul class="sub-menu">
                        <li>
                           <a href="<?php echo WWW_PATH_ADMIN; ?>index.php?src=galeria&pridat">
                           <span>Pridať fotografie</span>
                           &nbsp;&nbsp;<i style="text-align: right;" class="fa fa-plus"></i>
                           </a>
                        </li>
                        <li>
                           <a href="<?php echo WWW_PATH_ADMIN; ?>index.php?src=galeria">
                           <span>Zoznam albumov</span>
                           &nbsp;&nbsp;<i style="text-align: right;" class="fa "></i>
                           </a>
                        </li>
                     </ul>
                  </li>
                  <!--<li class="menu">-->
                  <li class="menu">
                     <a href="">
                     <i class="fa fa-user"></i>
                     <span>Prístupy</span>
                     <i class="fa fa-angle-left pull-right"></i>
                     </a>
                     <ul class="sub-menu">
                        <li>
                           <a href="<?php echo WWW_PATH_ADMIN; ?>index.php?src=pristupy&pridat">
                           <span>Pridať prístup</span>
                           &nbsp;&nbsp;<i style="text-align: right;" class="fa fa-plus"></i>
                           </a>
                        </li>
                        <li>
                           <a href="<?php echo WWW_PATH_ADMIN; ?>index.php?src=pristupy">
                           <span>Všetky prístupy</span>
                           &nbsp;&nbsp;<i style="text-align: right;" class="fa "></i>
                           </a>
                        </li>
                     </ul>
                  </li>
                  <!--<li class="menu">-->
                  <li class="">
                     <a href="<?php echo WWW_PATH_ADMIN; ?>index.php?src=objednavky">
                     <i class="fa fa-dollar"></i>
                     <span>Objednávky</span>
                     </a>
                  </li>
                  <!--<li class="menu">-->
                  <li class="">
                     <a href="<?php echo WWW_PATH_ADMIN; ?>index.php?src=kategorie">
                     <i class="fa fa-plus"></i>
                     <span>Kategórie produktov</span>
                     </a>
                  </li>
                  <!--<li class="menu">-->
                  <li class="menu">
                     <a href="">
                     <i class="fa fa-folder"></i>
                     <span>Produkty</span>
                     <i class="fa fa-angle-left pull-right"></i>
                     </a>
                     <ul class="sub-menu">
                        <li>
                           <a href="<?php echo WWW_PATH_ADMIN; ?>index.php?src=produkty&pridat">
                           <span>Pridať produkt</span>
                           &nbsp;&nbsp;<i style="text-align: right;" class="fa fa-plus"></i>
                           </a>
                        </li>
                        <li>
                           <a href="<?php echo WWW_PATH_ADMIN; ?>index.php?src=produkty">
                           <span>Zobraziť produkty</span>
                           &nbsp;&nbsp;<i style="text-align: right;" class="fa "></i>
                           </a>
                        </li>
                     </ul>
                  </li>
                  <!--<li class="menu">-->
                  <li class="">
                     <a href="<?php echo WWW_PATH_ADMIN; ?>index.php?src=mailer">
                     <i class="fa fa-envelope"></i>
                     <span>Mailer</span>
                     </a>
                  </li>
               </ul>
               <!--
                  <ul class="sidebar-menu">
                  	<li class="active">
                  		<a href="index.html">
                  			<i class="fa fa-home"></i><span>Dashboard</span>
                  		</a>
                  	</li>
                  	<li class="menu">
                  		<a href="#">
                  			<i class="fa fa-laptop"></i><span>UI Elements</span>
                  			<i class="fa fa-angle-left pull-right"></i>
                  		</a>
                  		<ul class="sub-menu">
                  			<li><a href="ui-general.html">General</a></li>
                  			<li><a href="ui-buttons.html">Buttons</a></li>							
                  			<li><a href="ui-grid.html">Grid</a></li>
                  			<li><a href="ui-group-list.html">Group List</a></li>
                  			<li><a href="ui-icons.html">Icons</a></li>
                  			<li><a href="ui-messages.html">Messages & Notifications</a></li>
                  			<li><a href="ui-modals.html">Modals</a></li>
                  			<li><a href="ui-tabs.html">Tabs & Accordions</a></li>
                  			<li><a href="ui-typography.html">Typography</a></li>
                  		</ul>
                  	</li>
                  	<li class="menu">
                  		<a href="#">
                  			<i class="fa fa-align-left"></i><span>Forms</span>
                  			<i class="fa fa-angle-left pull-right"></i>
                  		</a>
                  		<ul class="sub-menu">
                  			<li><a href="forms-components.html">Components</a></li>
                  			<li><a href="forms-masks.html">Input Masks</a></li>
                  			<li><a href="forms-validation.html">Validation</a></li>
                  			<li><a href="forms-wizard.html">Wizard</a></li>
                  			<li><a href="forms-wysiwyg.html">WYSIWYG Editor</a></li>
                  			<li><a href="forms-upload.html">Multi Upload</a></li>
                  		</ul>
                  	</li>
                  	<li class="menu">
                  		<a href="#">
                  			<i class="fa fa-table"></i><span>Tables</span>
                  			<i class="fa fa-angle-left pull-right"></i>
                  		</a>
                  		<ul class="sub-menu">
                  			<li><a href="tables-basic.html">Basic Tables</a></li>
                  			<li><a href="tables-datatables.html">Data Tables</a></li>
                  		</ul>
                  	</li>
                  	<li class="menu">
                  		<a href="#">
                  			<i class="fa fa-map-marker"></i><span>Maps</span>
                  			<i class="fa fa-angle-left pull-right"></i>
                  		</a>
                  		<ul class="sub-menu">
                  			<li><a href="maps-google.html">Google Map</a></li>
                  			<li><a href="maps-vector.html">Vector Map</a></li>
                  		</ul>
                  	</li>
                  	<li>
                  		<a href="charts.html">
                  			<i class="fa fa-bar-chart-o"></i><span>Charts</span>
                  		</a>
                  	</li>
                  	<li class="menu">
                  		<a href="#">
                  			<i class="fa fa-archive"></i><span>Pages</span>
                  			<i class="fa fa-angle-left pull-right"></i>
                  		</a>
                  		<ul class="sub-menu">
                  			<li><a href="404.html">404 Page</a></li>
                  			<li><a href="500.html">500 Page</a></li>
                  			<li><a href="pages-blank.html">Blank Page</a></li>
                  			<li><a href="pages-blank-header.html">Blank Page Header</a></li>
                  			<li><a href="pages-calendar.html">Calendar</a></li>
                  			<li><a href="pages-code.html">Code Editor</a></li>
                  			<li><a href="pages-gallery.html">Gallery</a></li>
                  			<li><a href="pages-invoice.html">Invoice</a></li>
                  			<li><a href="lockscreen.html">Lock Screen</a></li>
                  			<li><a href="login.html">Login</a></li>
                  			<li><a href="register.html">Register</a></li>
                  			<li><a href="pages-search.html">Search Result</a></li>
                  			<li><a href="pages-support.html">Support Ticket</a></li>
                  			<li><a href="pages-timeline.html">Timeline</a></li>
                  			<li><a href="pages-user.html">User Profile</a></li>
                  		</ul>
                  	</li>
                  	<li>
                  		<a href="email.html">
                  			<i class="fa fa-envelope"></i><span>Email</span><small class="badge pull-right bg-blue">12</small>
                  		</a>
                  	</li>
                  	<li>
                  		<a href="../frontend/index.html">
                  			<i class="fa fa-flag"></i><span>Frontend</span>
                  		</a>
                  	</li>
                  	<li class="menu">
                  		<a href="#">
                  			<i class="fa fa-folder-open"></i><span>Menu Levels</span>
                  			<i class="fa fa-angle-left pull-right"></i>
                  		</a>
                  		<ul class="sub-menu">
                  			<li><a href="#">Level 1</a></li>
                  			<li class="menu">
                  				<a href="#">
                  					<span>Level 2</span>
                  					<i class="fa fa-angle-left pull-right"></i>
                  				</a>
                  				<ul class="sub-menu">
                  					<li><a href="#">Sub Menu</a></li>
                  					<li><a href="#">Sub Menu</a></li>
                  				</ul>
                  			</li>
                  		</ul>
                  	</li>
                  </ul>
                  -->
            </section>
         </aside>
         <!-- END SIDEBAR -->
         <!-- BEGIN CONTENT -->
         <aside class="right-side">
            <!-- BEGIN CONTENT HEADER -->
            <section class="content-header">
            </section>
            <!-- END CONTENT HEADER -->
            <section class="content">
               <div class="row">
                  <div class="col-md-12">
                     <ul class="nav nav-tabs">
                        <li class="active"><a href="index.php?src=nastavenia&pa=1">Nastavenia stránky</a></li>
                        <li ><a href="index.php?src=nastavenia&pa=2">Nastavenia vlastníctva</a></li>
                        <li ><a href="index.php?src=nastavenia&pa=3">Nastavenia vlastníctva 2</a></li>
                        <li ><a href="index.php?src=nastavenia&pa=4">Nastavenie loga</a></li>
                        <li ><a href="index.php?src=nastavenia&pa=5">Nastavenia social. siet</a></li>
                        <li ><a href="index.php?src=nastavenia&pa=6">Nastavenia účtu (krátke)</a></li>
                     </ul>
                     <div class="tab-content">
                        <!-- Nastavenia stránky-->
                        <div class="grid-body">
                           <form  action="<?php echo WWW_PATH_ADMIN; ?>index.php?src=nastavenia&upravit-akcia" method="post">
                              <p class="lead">Defaultný jazyk</p>
                              <p>Tento jazyk bude ako prednastavený jazyk po načítaní.</p>
                              <select name="default_lang" class="btn-default btn-lg btn-block" type="text" size="1">
                                 <option value=''>Vybrať jazyk automaticky na základe polohy</option>
                                 <option value='sk' selected>Slovenský (sk)</option>
                                 <option value='en'>English (en)</option>
                              </select>
                              <div class="padding"></div>
                              <p class="lead">Kľúčové slová</p>
                              <p>Zadajte tie najkľúčovejšie slová pre vašu stránku (slová oddeľujte čiarkou)</p>
                              <input type="text" class="btn-default btn-lg btn-block" name="keywords" value="tvorba, web, stránok, vyvoj, Tvorba web stránok, optimalizacia, webovych, aplikacii, a informacnych, systemov, cloud, designdnt, thequery, query, querysk, query sk, designdnt, designdnt3, 3" />
                              <div class="padding"></div>
                              <p class="lead">Nadpis stránky</p>
                              <p>Nadpis sa zobrazí v hlavičke vygenerovaného HTML dokumentu</p>
                              <input type="text" class="btn-default btn-lg btn-block" name="nadpis_stranky" value="The Query - Online Claud Developer" />
                              <div class="padding"></div>
                              <p class="lead">Štartovací modul</p>
                              <p>Vyberte modul, ktorý sa ako prvý zobrazí pri načítaní Vašej stránky</p>
                              <select name="startovaci_modul" class="btn-default btn-lg btn-block" type="text" size="1">
                                 <option value='slider-3'>Slider 3</option>
                                 <option value='slider-4'>Slider 4</option>
                                 <option value='default-4579'>Defaultná (červeno - čierna)</option>
                                 <option value='blue-black-9638'>Custom 1 (modro - čierna)</option>
                                 <option value='green-black-3954'>Custom 2 (zeleno - čierna)</option>
                                 <option value='pink-black-8674'>Custom 3 (rúžovo- čierna)</option>
                                 <option value='http://www.o2.sk/'>O2</option>
                                 <option value='http://designdnt.query.sk/'>Designdnt Banner</option>
                                 <option value='http://akozbalit.sk/magnet-na-zeny'>Magnet na ženy</option>
                                 <option value='https://dennikn.sk/'>Dennik N</option>
                                 <option value='http://www.martinus.sk/'>Martinus sk</option>
                                 <option value='http://www.green-bike.sk/'>Greenbike sk</option>
                                 <option value='http://nabicyklidetom.query.sk/'>Na bicykli deťom</option>
                                 <option value='http://zupnypohar.query.sk/'>Župný pohár</option>
                                 <option value='http://partak.query.sk/'>Parťák</option>
                                 <option value='http://designdnt.query.sk/'>Designdnt</option>
                                 <option value='http://query.sk'>Query</option>
                                 <option value='http://query.sk/dnt-admin' selected>Designdnt - The Query</option>
                                 <option value=''></option>
                              </select>
                              <div class="padding"></div>
                              <p class="lead">Targett</p>
                              <p>Nastavte otváranie odkazov netýkajucích sa Vašej stránky</p>
                              <select name="target" class="btn-default btn-lg btn-block" type="text" size="1">
                                 <option value='_blank' selected>Otvárať v novom okne</option>
                                 <option value='_blank'>Otvárať v tom istom okne</option>
                              </select>
                              <div class="padding"></div>
                              <p class="lead">Registrácia používateľa</p>
                              <p>Toto nastavenie umožňuje meniť stav nového používateľa. Buď to bude musieť byť schválený vlastníkom (Vami) stránky, alebo sa vykoná aktivácia automaticky pomocou kliknutia používateľa na vygenerovaný email.</p>
                              <select name="default_stat_user" class="btn-default btn-lg btn-block" type="text" size="1">
                                 <option value='1' selected>Používateľ sa aktivuje automaticky po kliknutí na email.</option>
                                 <option value='0'>Používateľa je nutné aktivovať cez administráciu</option>
                              </select>
                              <div class="padding"></div>
                              <input type='hidden' name='return' value='<?php echo WWW_PATH_ADMIN; ?>' />								<input type="submit" name="odoslat_1" class="btn btn-success btn-radius" value="Upraviť nastavenia" />
                              <div class="padding"></div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
         </aside>
         <!-- END CONTENT -->
         <!-- BEGIN SCROLL TO TOP -->
         <div class="scroll-to-top"></div>
         <!-- END SCROLL TO TOP -->
      </div>
      <script type="text/javascript">
         /* MAGNIFIC POPUP */
         $('.popup-gallery').magnificPopup({
         	delegate: 'a',
         	type: 'image',
         	tLoading: 'Loading image #%curr%...',
         	mainClass: 'mfp-img-mobile',
         	gallery: {
         		enabled: true,
         		navigateByImgClick: true,
         		preload: [0,1] // Will preload 0 - before current, and 1 after the current image
         	},
         	image: {
         		tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
         		titleSrc: function(item) {
         			return item.el.attr('title') + '<small>by Ryan McGuire</small>';
         		}
         	}
         });
      </script>
      <!-- BEGIN JS FRAMEWORK -->
      <script src="<?php echo WWW_PATH_ADMIN; ?>js/jquery-2.1.0.min.js"></script>
      <script src="<?php echo WWW_PATH_ADMIN; ?>js/bootstrap.min.js"></script>
      <!-- END JS FRAMEWORK -->
      <!-- BEGIN JS PLUGIN -->
      <script src="<?php echo WWW_PATH_ADMIN; ?>js/pace.min.js"></script>
      <script src="<?php echo WWW_PATH_ADMIN; ?>js/jquery.totemticker.min.js"></script>
      <script src="<?php echo WWW_PATH_ADMIN; ?>js/jquery.ba-resize.min.js"></script>
      <script src="<?php echo WWW_PATH_ADMIN; ?>js/jquery.blockUI.min.js"></script>
      <script src="<?php echo WWW_PATH_ADMIN; ?>js/jquery.gritter.min.js"></script>
      <script src="<?php echo WWW_PATH_ADMIN; ?>js/jquery.sparkline.min.js"></script>
      <script src="<?php echo WWW_PATH_ADMIN; ?>js/icheck.min.js"></script>
      <script src="<?php echo WWW_PATH_ADMIN; ?>summernote.min.js"></script>
      <script src="<?php echo WWW_PATH_ADMIN; ?>js/dnt_custom.js"></script>
      <!--[if lte IE 8]>
      <script language="javascript" type="text/javascript" src="<?php echo WWW_PATH_ADMIN; ?>js/excanvas.min.js"></script>
      <![endif]-->
      <!-- END JS PLUGIN -->
      <!-- BEGIN JS TEMPLATE -->
      <script src="<?php echo WWW_PATH_ADMIN; ?>js/main_system.js"></script>
      <script src="<?php echo WWW_PATH_ADMIN; ?>js/skin-selector.js"></script>
   </body>
</html>
<!-- END JS TEMPLATE -->