<?php include "tpl_functions.php"; ?>
<?php get_top(); ?>
<?php include "top.php";
$settings = new Settings
?>
<!-- END CONTENT HEADER -->
<section class="content">
   <div class="row">
      <div class="col-md-12">
         <ul class="nav nav-tabs">
            <li <?php if(isset($_GET[ 'pa']) && $_GET[ 'pa']==1 or !isset($_GET[ 'pa'])){ echo 'class="active"';}?>><a href="index.php?src=settings&pa=1">Nastavenia stránky</a></li>
            <li <?php if(isset($_GET[ 'pa']) && $_GET[ 'pa']==7 ){ echo 'class="active"';}?>><a href="index.php?src=settings&pa=7">Custom nastavenia</a></li>
            <li <?php if(isset($_GET[ 'pa']) && $_GET[ 'pa']==2 ){ echo 'class="active"';}?>><a href="index.php?src=settings&pa=2">Nastavenia vlastníctva</a></li>
            <li <?php if(isset($_GET[ 'pa']) && $_GET[ 'pa']==3 ){ echo 'class="active"';}?>><a href="index.php?src=settings&pa=3">Nastavenia vlastníctva 2</a></li>
            <li <?php if(isset($_GET[ 'pa']) && $_GET[ 'pa']==4 ){ echo 'class="active"';}?>><a href="index.php?src=settings&pa=4">Nastavenie loga</a></li>
            <li <?php if(isset($_GET[ 'pa']) && $_GET[ 'pa']==5 ){ echo 'class="active"';}?>><a href="index.php?src=settings&pa=5">Nastavenia social. siet</a></li>
            <li <?php if(isset($_GET[ 'pa']) && $_GET[ 'pa']==6 ){ echo 'class="active"';}?>><a href="index.php?src=settings&pa=6">Nastavenia účtu (krátke)</a></li>
         </ul>
         <div class="tab-content">
            <?php if(isset($_GET[ 'pa']) && $_GET[ 'pa']==2 ){?>
            <!-- Nastavenia vlastníctva-->
            <p class="lead">Nastavenia vlastníctva</p>
            <div class="grid-body">
               <form id="obchod" action="<?php echo WWW_PATH_ADMIN."index.php?src=settings&pa=2&action=update ";?>" method="post">
                  <p class="lead">Nastavte <b>meno </b> Vašej firmy</p>
                  <p>Tento údaj sa bude zobrazovať všade tam, kde budete prezentovať Vašu firmu</p>
                  <input type="text" class="btn-default btn-lg btn-block" name="vendor_company" value="<?php echo Settings::get("vendor_company"); ?>" />
                  <div class="padding"></div>
                  <p class="lead">Nastavte <b>sídlo</b> Vašej firmy</p>
                  <p>Tento údaj sa bude zobrazovať všade tam, kde budete prezentovať Vašu firmu</p>
                  <input type="text" class="btn-default btn-lg btn-block" name="vendor_street" value="<?php echo  Settings::get("vendor_street"); ?>" />
                  <div class="padding"></div>
                  <p class="lead">Nastavte <b>psč</b> firmy</p>
                  <p>Tento údaj sa bude zobrazovať všade tam, kde budete prezentovať Vašu firmu</p>
                  <input type="text" class="btn-default btn-lg btn-block" name="vendor_psc" value="<?php echo  Settings::get("vendor_psc"); ?>" />
                  <div class="padding"></div>
                  <p class="lead">Nastavte <b>mesto</b> firmy</p>
                  <p>Tento údaj sa bude zobrazovať všade tam, kde budete prezentovať Vašu firmu</p>
                  <input type="text" class="btn-default btn-lg btn-block" name="vendor_city" value="<?php echo  Settings::get("vendor_city"); ?>" />
                  <div class="padding"></div>
                  <p class="lead">Nastavte <b>telefón</b> firmy</p>
                  <p>Tento údaj sa bude zobrazovať všade tam, kde budete prezentovať Vašu firmu</p>
                  <input type="text" class="btn-default btn-lg btn-block" name="vendor_tel" value="<?php echo  Settings::get("vendor_tel"); ?>" />
                  <div class="padding"></div>
                  <p class="lead">Nastavte <b>fax</b> firmy</p>
                  <p>Tento údaj sa bude zobrazovať všade tam, kde budete prezentovať Vašu firmu</p>
                  <input type="text" class="btn-default btn-lg btn-block" name="vendor_fax" value="<?php echo  Settings::get("vendor_fax"); ?>" />
                  <div class="padding"></div>
                  <p class="lead">Nastavte <b>email</b> firmy</p>
                  <p>Sem budú chodiť všetky notifikácie ohľadom firmy</p>
                  <input type="text" class="btn-default btn-lg btn-block" name="vendor_email" value="<?php echo  Settings::get("vendor_email"); ?>" />
                  <div class="padding"></div>
                  <p class="lead">Nastavte <b>ičo</b> firmy</p>
                  <p>Tento údaj sa bude zobrazovať všade tam, kde budete prezentovať Vašu firmu</p>
                  <input type="text" class="btn-default btn-lg btn-block" name="vendor_ico" value="<?php echo  Settings::get("vendor_ico"); ?>" />
                  <div class="padding"></div>
                  <p class="lead">Nastavte <b>dič</b> firmy</p>
                  <p>Tento údaj sa bude zobrazovať všade tam, kde budete prezentovať Vašu firmu</p>
                  <input type="text" class="btn-default btn-lg btn-block" name="vendor_dic" value="<?php echo  Settings::get("vendor_dic"); ?>" />
                  <div class="padding"></div>
                  <p class="lead">Nastavte <b>iban</b> firmy</p>
                  <p>Tento údaj sa bude zobrazovať všade tam, kde budete prezentovať Vašu firmu</p>
                  <input type="text" class="btn-default btn-lg btn-block" name="vendor_iban" value="<?php echo  Settings::get("vendor_iban"); ?>" />
                  <div class="padding"></div>
                  <?php echo Dnt::returnInput();?>
                  <input type="submit" name="sent_3" class="btn btn-danger btn-radius" value="Upraviť nastavenia" />
                  <div class="padding"></div>
               </form>
            </div>
            <!-- Rozšírené nastavenia vlastníctva-->
            <?php }elseif(isset($_GET[ 'pa']) && $_GET[ 'pa']==3 ){?>
            <p class="lead">Rozšírené nastavenia vlastníctva</p>
            <!-- begin is here!-->
            <form id="obchod" action="<?php echo WWW_PATH_ADMIN."index.php?src=settings&update ";?>" method="post">
               <p class="lead">Ste platcom <b>DPH</b>?</p>
               <p>Tento údaj sa bude zobrazovať všade tam, kde budete prezentovať Vašu firmu</p>
               <input type="text" class="btn-default btn-lg btn-block" name="platca_dph">
               <div class="padding"></div>
               <p class="lead">Vyberte znak platobnej <b>meny</b></p>
               <p>Vyberte znak Vašej meny, ktorou sa bude v eshope platiť</p>
              <input type="text"  class="btn-default btn-lg btn-block" name="znak_meny">
               <div class="padding"></div>
               <p class="lead">Vyberte názov platobnej <b>meny</b></p>
               <p>Vyberte názov Vašej meny, ktorou sa bude v eshope platiť</p>
              <input type="text"  class="btn-default btn-lg btn-block" name="nazov_meny">
           
               <div class="padding"></div>
               <p class="lead">Nastavte hodnotu <b>DPH</b></p>
               <p>Aktuálna cena DPH sa bude prepočítavať podľa aktuálnej hodnoty DPH</p>
               <input type="text" name="dph" class="btn-default btn-lg btn-block" value="<?php echo Settings::get("vendor_dph"); ?>" />
               <div class="padding"></div>
               <?php echo Dnt::returnInput();?>
               <input type="submit" name="sent_4" class="btn btn-warning btn-radius" value="Upraviť nastavenia" />
            </form>
            <!-- end is here! -->
            <!-- Rozšírené nastavenia vlastníctva-->
            <?php }elseif(isset($_GET[ 'pa']) && $_GET[ 'pa']==4 ){?>
            <!-- begin is here!-->
            <div class="row">
               <div class="col-md-6">
                  <form id="obchod" enctype='multipart/form-data' action="<?php echo WWW_PATH_ADMIN."index.php?src=settings&pa=4&action=update ";?>" method="post">
                     <p class="lead">Nastavte logo <b>vašej firmy</b></p>
                     <p>Ak máte eshop a vystavíte faktúru, vaše logo bude v hlavičke faktúry</p>
                     <img src="<?php echo Settings::getImage("logo_firmy");?>" style="max-width: 200px; margin: 15px;" alt="" />
                     <input type="file" name="userfile"  class="btn-default btn-lg btn-block" />
                     <div class="padding"></div>
                     <?php echo Dnt::returnInput();?>
                     <input type="submit" name="odoslat_logo" class="btn btn-warning btn-radius" value="Upraviť nastavenia" />
                  </form>
               </div>
               <div class="col-md-6">
                  <form id="obchod" enctype='multipart/form-data' action="<?php echo WWW_PATH_ADMIN."index.php?src=settings&pa=4&action=update";?>" method="post">
                     <p class="lead">Nastavte defaultný <b>obrázok</b></p>
                     <p>Tento obrázok sa zobrazí všade tam, kde nenastavíte vlastný obrázok</p>
                     <img src="<?php echo Settings::getImage("no_img");?>" style="max-width: 200px; margin: 15px;" alt="" />
                     <input type="file" name="userfile"  class="btn-default btn-lg btn-block" />
                     <div class="padding"></div>
                     <?php echo Dnt::returnInput();?>
                     <input type="submit" name="odoslat_noimage" class="btn btn-warning btn-radius" value="Upraviť nastavenia" />
                  </form>
               </div>
            </div>
            <!-- end is here! -->
            <?php }elseif(isset($_GET[ 'pa']) && $_GET[ 'pa']==5 ){?>
            <div class="grid-body">
               <form  id="socialne-siete" action="<?php echo WWW_PATH_ADMIN."index.php?src=settings&pa=5&action=update";?>" method="post">
                  <p class="lead">Nastavte si Váš email</p>
                  <p>Nastavenie emailu: 
                     <b>Tento email bude fungovať ako <br/> notifakčný email a bude Vás kontaktovať, ak to bude potrebné</b>
                  </p>
                  <input type="text" class="btn-default btn-lg btn-block" name="notifikacny_email" value="<?php echo Settings::get("notifikacny_email"); ?>" />
                  <div class="padding"></div>
                  <p class="lead">Máte vlastnú Facebook Stránku? Nastavte si ju</p>
                  <p>Na Vašej stránke sa budeme vždy odvolávať na Vašu zadanú adresu</p>
                  <input type="text" class="btn-default btn-lg btn-block" name="facebook_page" value="<?php echo Settings::get("facebook_page"); ?>" />
                  <div class="padding"></div>
                  <p class="lead">Máte vlastnú Twitter Stránku? Nastavte si ju</p>
                  <p>Na Vašej stránke sa budeme vždy odvolávať na Vašu zadanú adresu</p>
                  <input type="text" class="btn-default btn-lg btn-block" name="twitter" value="<?php echo Settings::get("twitter"); ?>" />
                  <div class="padding"></div>
                  <p class="lead">Máte vlastnú Youtube Stránku? Nastavte si ju</p>
                  <p>Na Vašej stránke sa budeme vždy odvolávať na Vašu zadanú adresu</p>
                  <input type="text" class="btn-default btn-lg btn-block" name="youtube" value="<?php echo Settings::get("youtube"); ?>" />
                  <div class="padding"></div>
                  <p class="lead">Máte vlastnú Flickr Stránku? Nastavte si ju</p>
                  <p>Na Vašej stránke sa budeme vždy odvolávať na Vašu zadanú adresu</p>
                  <input type="text" class="btn-default btn-lg btn-block" name="flickr" value="<?php echo Settings::get("flickr"); ?>" />
                  <div class="padding"></div>
                  <p class="lead">Používate Google mapy? Nastavte si ich</p>
                  <p>Vložením URL adresy z google sa Vám automaticky vygeneruje mapa</p>
                  <input type="text" class="btn-default btn-lg btn-block" name="google_map" value="<?php echo Settings::get("google_map"); ?>" />
                  <div class="padding"></div>
                  <?php echo Dnt::returnInput();?>
                  <input type="submit" name="sent_2" class="btn btn-warning btn-radius" value="Upraviť nastavenia" />
                  <div class="padding"></div>
               </form>
            </div>
            <?php }elseif(isset($_GET[ 'pa']) && $_GET[ 'pa']==6 ){?>
            <div class="grid-body">
               <div class="row">
                  <div class="col-md-6">
                     <form enctype='multipart/form-data' id="pristupy" action="<?php echo WWW_PATH_ADMIN."index.php?src=access&action=update&post_id=".AdminUser::data("admin", "id")."";?>" method="post">
                        <input type="hidden" name="id" value="<?php echo AdminUser::data("admin", "id");?>" />
                        <p class="lead">Nastavte Vaše <b>meno</b></p>
                        <p>Ak máte eshop a vystavíte faktúru, vaše meno tam bude predvyplnené</p>
                        <input type="text" class="btn-default btn-lg btn-block" name="name" value="<?php echo AdminUser::data("admin", "name");?>" />
                        <div class="padding"></div>
                        <p class="lead">Nastavte Vaše <b>priezvisko</b></p>
                        <p>Ak máte eshop a vystavíte faktúru, vaše meno tam bude predvyplnené</p>
                        <input type="text" class="btn-default btn-lg btn-block" name="surname" value="<?php echo AdminUser::data("admin", "surname");?>" />
                        <div class="padding"></div>
						<p>Zadajte heslo na overenie totožnosti:</p>
                        <input type="password" class="btn-default btn-lg btn-block" name="pass" value="" />
                        <div class="padding"></div>
                  </div>
                  <div class="col-md-6">									
                  <p class="lead">Vyberte si jedinečnú <b>fotografiu</b></p>
                  <p>Ak máte eshop a vystavíte faktúru, vaše meno tam bude predvyplnené</p>
                  <img src="<?php echo AdminUser::avatar();?>" style="max-width: 200px; margin: 15px;" alt="" />
                  <input type="file" name="userfile"  class="btn-default btn-lg btn-block" />
                  <div class="padding"></div>
                  
				  <?php echo Dnt::returnInput();?>
				  
                  <input type="submit" name="sent" class="btn btn-primary btn-radius" value="Upraviť nastavenia" />
                  <div class="padding"></div>
                  </form>
                  </div>
               </div>
            </div>
			 <?php }elseif(isset($_GET[ 'pa']) && $_GET[ 'pa']==7 ){?>
			 
			 
			 

      <div class="row" style="background-color: #fff;padding: 5px;margin: 0px;">
         <label class="col-sm-2 control-label"><b>Názov vstupu</b></label>
         <label class="col-sm-3 control-label"><b>Zobraziť na webe?</b></label>
         <label class="col-sm-7 control-label"><b>Nastavenie hodnoty</b></label>
      </div>
      <div class="row">
         <form enctype="multipart/form-data" action="" method="POST">
            <div class="col-md-12">
               <ul class="nav nav-tabs">
                  <li class="active"><a href="#sutaz" data-toggle="tab">Nastavenia</a></li>
               </ul>
               <div class=" tab-content">
                  <!-- base settings -->
                  <div class="tab-pane active" id="sutaz">
       
                      <?php
                     foreach($settings->customMeta() as $row){
                     ?>
                  <div class="row form">
                     <label class="col-sm-2 control-label"><b><?php echo $row['description'] ?></b></label>
                     <label class="col-sm-2 control-label">
                     <?php Dnt::setMetaStatus($row['show'], $row['key']); ?>
                     </label>
                     <div class="col-sm-8 text-left">
                        
                        <input type="text" name="<?php echo $row['key'] ?>" value='<?php echo $row['value'] ?>' class="form-control" placeholder="">

                     </div>
                  </div>
                  <br/>
                  <?php
                     }
                     ?>
					 
					 
                  </div>
               </div>
            </div>
         </form>
      </div>


			 
			 
            <?php }else{ ?>
            <!-- Nastavenia stránky-->
            <div class="grid-body">
               <form  action="<?php echo WWW_PATH_ADMIN."index.php?src=settings&pa=1&action=update";?>" method="post">
                  <p class="lead">Defaultný jazyk</p>
                  <p>Tento jazyk bude ako prednastavený jazyk po načítaní.</p>
                  <?php /*<select name="default_lang" class="btn-default btn-lg btn-block" type="text" size="1">
                     <option value=''>Vybrať jazyk automaticky na základe polohy</option>
                     <?php
                        $query = dnt_query("SELECT * FROM dnt_languages WHERE 
                        `zobrazenie` = '1' AND
                        `vendor` = '".$_SESSION['getVendorId']."'
                        ", $dntDb);
                        if (mysql_num_rows($query) > 0) {
                        	while ($row = mysql_fetch_array($query)) {
                        		if ($row['slug'] == getGlobalSetting("default_lang", $dntDb))
                        			echo "<option value='".$row['slug']."' selected>".$row['nazov']." (".$row['slug'].")</option>";
                        		else
                        			echo "<option value='".$row['slug']."'>".$row['nazov']." (".$row['slug'].")</option>";
                        		}
                        	}
                        ?>
                  </select> */?>
                  <div class="padding"></div>
				  
				  <div class="row">
				  <div class="col-md-4">
					  <p class="lead">Exportovať len moje dáta z databázy</p>
					  <p>Exportujú sa všetky moje dáta, teda dáta zobrazujúce sa na stránke <b><?php echo WWW_PATH; ?></b></p>
					  <a target="_blank" href="<?php echo WWW_PATH;?>dnt-jobs/dbExport.php?vendor_id=<?php echo Vendor::getId();?>&time=<?php echo Dnt::timestamp();?>">
						<span type="submit" name="sent_4" class="btn btn-danger btn-radius" >Exportovať moje dáta</span>
					  </a>
					  <div class="padding"></div>
					</div>
					
					<div class="col-md-4">
					  <p class="lead">Exportovať vetky dáta z databázy</p>
					  <p>Exportujú sa všetky moje dáta, a tak isto aj dáta ostatných používateľov<b><br/><br/></b></p>
					  <a  target="_blank"  href="<?php echo WWW_PATH;?>dnt-jobs/dbExport.php?time=<?php echo Dnt::timestamp();?>">
						<span type="submit" name="sent_4" class="btn btn-danger btn-radius" >Exportovať všetky dáta</span>
					  </a>
					  <div class="padding"></div>
					</div>
					
					<div class="col-md-4">
					  <p class="lead">Exportovať skeleton dáta</p>
					  <p>Exportujú sa všetky aktuálne dáta pre skeleton aplikáciu <b><br/><br/></b></p>
					  <a  target="_blank"  href="<?php echo WWW_PATH;?>dnt-jobs/dbExport.php?vendor_id=1&time=<?php echo Dnt::timestamp();?>">
						<span type="submit" name="sent_4" class="btn btn-danger btn-radius" >Exportovať skeletón dáta</span>
					  </a>
					  <div class="padding"></div>
					</div>
					
					</div>
				  
				  
                  <p class="lead">Cachovanie</p>
                  <p>Zapnite, alebo vypnite cachovanie vašej stránky. <br/>
                     Pri vytvorení novej udalosti v administrácii sa cache automaticky premaže.
                     <br/>Doačasné zrušenie cache je možné vykonať getovým parametrom <b>_rc=-2</b>
                  </p>
                  <select name="cachovanie" class="btn-default btn-lg btn-block" type="text" size="1">
                  <?php
                     if(Settings::get("cachovanie") == "0"){
                     	echo "<option value='0' selected>Cachovanie zapnuté</option>";
                     	echo "<option value='1'>Cachovanie nastavené</option>";
                     }
                     else{
                     	echo "<option value='1' selected>Cachovanie zapnuté</option>";
                     	echo "<option value='0' >Cachovanie vypnuté</option>";
                     	}
                     ?>
                  </select>
                  <div class="padding"></div>
				  
				  <p class="lead">Nadpis stránky</p>
                  <p>Nadpis sa zobrazí v hlavičke vygenerovaného HTML dokumentu</p>
                  <input type="text" class="btn-default btn-lg btn-block" name="title" value="<?php echo Settings::get("title"); ?>" />
                  <div class="padding"></div>
				  
                  <p class="lead">Description webu</p>
                  <p>Zadajte tie krátky popis vášho webu</p>
                  <input type="text" class="btn-default btn-lg btn-block" name="description" value="<?php echo Settings::get("description"); ?>" />
                  <div class="padding"></div>
				  
				  <p class="lead">Kľúčové slová</p>
                  <p>Zadajte tie najkľúčovejšie slová pre vašu stránku (slová oddeľujte čiarkou)</p>
                  <input type="text" class="btn-default btn-lg btn-block" name="keywords" value="<?php echo Settings::get("keywords"); ?>" />
                  <div class="padding"></div>
				  
                 
                  <p class="lead">Štartovací modul</p>
                  <p>Vyberte modul, ktorý sa ako prvý zobrazí pri načítaní Vašej stránky</p>
                  <?php /*<select name="startovaci_modul" class="btn-default btn-lg btn-block" type="text" size="1">
                     <?php
                        $query = dnt_query("SELECT * FROM `dnt_posts` WHERE vendor = '".getVendorId($dntDb)."' ORDER BY `poradie` asc", $dntDb);
                        if (mysql_num_rows($query) > 0) {
                        	while ($row = mysql_fetch_array($query)) {
                        		if ($row['url'] == getStartovaciModul($dntDb))
                        			echo "<option value='".$row['url']."' selected>".$row['nazov']."</option>";
                        		else
                        			echo "<option value='".$row['url']."'>".$row['nazov']."</option>";
                        		}
                        	}
                        ?>
                  </select> */?>
                  <div class="padding"></div>
                  <p class="lead">Targett</p>
                  <p>Nastavte otváranie odkazov netýkajucích sa Vašej stránky</p>
                  <select name="target" class="btn-default btn-lg btn-block" type="text" size="1">
                  <?php
                     if(Settings::get("target") == "_blank"){
                     	echo "<option value='_blank' selected>Otvárať v novom okne</option>";
                     	echo "<option value='_blank'>Otvárať v tom istom okne</option>";
                     }
                     else{
                     	echo "<option value='_blank' selected>Otvárať v tom istom okne</option>";
                     	echo "<option value='_blank' >Otvárať v novom okne</option>";
                     	}
                     ?>
                  </select>
                  <div class="padding"></div>
                  <?php echo Dnt::returnInput();?>
                  <input type="submit" name="sent_1" class="btn btn-success btn-radius" value="Upraviť nastavenia" />
                  <div class="padding"></div>
               </form>
            </div>
            <?php } ?>
         </div>
      </div>
   </div>
</section>
<?php include "bottom.php"; ?>
<?php get_bottom(); ?>