<?php include "tpl_functions.php"; ?>
<?php get_top(); ?>
<?php include "top.php";
   $settings = new Settings;
   $webhook = new Webhook;
   ?>
<!-- END CONTENT HEADER -->
<section class="content">
   <div class="row">
      <div class="col-md-12">
         <ul class="nav nav-tabs">
            <li <?php if(isset($_GET[ 'pa']) && $_GET[ 'pa']==1 or !isset($_GET[ 'pa'])){ echo 'class="active"';}?>><a href="index.php?src=settings&pa=1">Nastavenia stránky</a></li>
            <li <?php if(isset($_GET[ 'pa']) && $_GET[ 'pa']==7 && $_GET[ 'category']== "default"){ echo 'class="active"';}?>><a href="index.php?src=settings&pa=7&category=default">Základné nastavenia</a></li>
            <li <?php if(isset($_GET[ 'pa']) && $_GET[ 'pa']==7 && $_GET[ 'category']== "logo"){ echo 'class="active"';}?>><a href="index.php?src=settings&pa=7&category=logo">Nastavenie loga</a></li>
            <li <?php if(isset($_GET[ 'pa']) && $_GET[ 'pa']==7 && $_GET[ 'category']== "default_images"){ echo 'class="active"';}?>><a href="index.php?src=settings&pa=7&category=default_images">Nastavenie defaultných obrázkov</a></li>
            <li <?php if(isset($_GET[ 'pa']) && $_GET[ 'pa']==7 && $_GET[ 'category']== "social"){ echo 'class="active"';}?>><a href="index.php?src=settings&pa=7&category=social">Nastavenia social. siet</a></li>
            <li <?php if(isset($_GET[ 'pa']) && $_GET[ 'pa']==7 && $_GET[ 'category']== "social_wall"){ echo 'class="active"';}?>><a href="index.php?src=settings&pa=7&category=social_wall">Social Wall</a></li>
            <li <?php if(isset($_GET[ 'pa']) && $_GET[ 'pa']==7 && $_GET[ 'category']== "keys"){ echo 'class="active"';}?>><a href="index.php?src=settings&pa=7&category=keys">Nastavenia kľúčov</a></li>
            <li <?php if(isset($_GET[ 'pa']) && $_GET[ 'pa']==7 && $_GET[ 'category']== "extends"){ echo 'class="active"';}?>><a href="index.php?src=settings&pa=7&category=extends">Rozšírené nastavenia</a></li>
            <li <?php if(isset($_GET[ 'pa']) && $_GET[ 'pa']==7 && $_GET[ 'category']== "vendor"){ echo 'class="active"';}?>><a href="index.php?src=settings&pa=7&category=vendor">Nastavenia firmy</a></li>
            <li <?php if(isset($_GET[ 'pa']) && $_GET[ 'pa']==6 ){ echo 'class="active"';}?>><a href="index.php?src=settings&pa=6">Nastavenia účtu (krátke)</a></li>
         </ul>
         <div class="tab-content">
            <?php if(isset($_GET[ 'pa']) && $_GET[ 'pa']==6 ){?>
            <div class="grid-body">
               <div class="row">
                  <div class="col-md-6">
                     <form enctype='multipart/form-data' id="pristupy" action="<?php echo WWW_PATH_ADMIN."index.php?src=access&action=update&post_id=".AdminUser::data("admin", "id_entity")."";?>" method="post">
                        <input type="hidden" name="id" value="<?php echo AdminUser::data("admin", "id_entity");?>" />
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
                  <?php galleryChooser("user_avatar"); ?>
                  <div class="padding"></div>
                  <?php echo Dnt::returnInput();?>
                  <input type="submit" name="sent" class="btn btn-primary btn-radius" value="Upraviť nastavenia" />
                  <div class="padding"></div>
                  </form>
                  </div>
               </div>
            </div>
            <?php }elseif(isset($_GET[ 'pa']) && $_GET[ 'pa']==7 ){
               $type = $rest->get("category");
               ?>
            <div class="row" style="background-color: #fff;padding: 5px;margin: 0px;">
               <label class="col-sm-2 control-label"><b>Názov vstupu</b></label>
               <label class="col-sm-3 control-label"><b>Zobraziť na webe?</b></label>
               <label class="col-sm-7 control-label"><b>Nastavenie hodnoty</b></label>
            </div>
            <div class="row">
               <form enctype="multipart/form-data" action="index.php?src=settings&pa=7&category=<?php echo  $type; ?>&action=update" method="POST">
                  <div class="col-md-12">
                     <ul class="nav nav-tabs">
                        <li class="active"><a href="#sutaz" data-toggle="tab">Nastavenia</a></li>
                     </ul>
                     <div class=" tab-content">
                        <!-- base settings -->
                        <div class="tab-pane active" id="sutaz">
                           <?php
                              foreach($settings->customMeta($type) as $row){
                              ?>
                           <div class="row form">
                              <label class="col-sm-2 control-label"><b><?php echo $row['description'] ?></b></label>
                              <label class="col-sm-2 control-label">
                              <?php Dnt::setMetaStatus($row['show'], $row['id_entity']); ?>
                              </label>
                              <div class="col-sm-8 text-left">
                                 <!--
                                    <img class="img-thumb" src="" alt="" />
                                    <iframe src=""  scrolling="yes" frameBorder="0" id="info" class="iframe" name="info" width="1000px" height="30px" seamless=""></iframe>	
                                    -->
                                 <?php if($row['content_type'] == "image"){ ?>
                                 <input name="userfile_<?php echo $row['id_entity']; ?>[]" multiple="multipl" type="file" class="form-control">
                                 <?php 
                                    galleryChooser($row['id_entity']);
                                    $image = new Image;
                                    foreach($image->getFileImages($row['value'], true, Image::THUMB) as $image){
                                    	
                                    	echo '<img src="'.$image.'" style="height: 55px; margin-left:0px; margin:10px;">';
                                    }
                                    }elseif($row['content_type'] == "file"){ ?>
                                 <input name="userfile_<?php echo $row['id_entity']; ?>[]" multiple="multipl" type="file" class="form-control">
                                 <?php 
                                    $image = new Image;
                                    foreach($image->getFileImages($row['value'], true, Image::THUMB) as $file){
                                    	echo  "<a target='_blank' href='".$file."'>".$file."</a><br/>";
                                    }
                                    }elseif($row['content_type'] == "color"){ ?>
                                 <input type="color" name="key_<?php echo $row['id_entity'] ?>" value="<?php echo $row['value'] ?>">
                                 <?php 
                                    }elseif($row['content_type'] == "bool"){ 
                                        //EMPTY, ONLZ BOOL VALUE
                                    }elseif($row['content_type'] == "font"){ ?>
                                 <select name="key_<?php echo $row['id_entity'] ?>" class="btn-default btn-lg btn-block" type="text" size="1">
                                 <?php
                                    $myFonts = fonts();
                                    echo  '<option value="" >Vyberte font</option>';
                                    foreach($myFonts as $key => $font){
                                    	if($font == $row['value']){
                                    		echo  '<option value="'.$font.'" selected >'.$font.'</option>';
                                    	}else{
                                    		echo  '<option value="'.$font.'">'.$font.'</option>';
                                    	}
                                    	
                                    }
                                    ?>
                                 </select>
                                 <?php 
                                    }
                                    else{ ?>
                                 <input type="text" name="key_<?php echo $row['id_entity'] ?>" value='<?php echo $row['value'] ?>' class="form-control" placeholder="">
                                 <?php } ?>
                              </div>
                           </div>
                           <br/>
                           <?php
                              }
                              ?>
                           <input type="hidden" name="return" value="<?php echo WWW_FULL_PATH; ?>">
                           <input type="submit" name="sent_7" class="btn btn-primary btn-lg btn-block" value="Upraviť">
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
				  
				  <div class="col-md-3">
                     <p class="lead">Vymazať cache</p>
                     <p>Vymaže celú cache pre web: <br/><b><?php echo WWW_PATH; ?></b></p>
                     <a target="_self" href="index.php?src=settings&action=del_cache">
                     <span name="sent_4" class="btn btn-danger btn-radius" >Vymazať cache</span>
                     </a>
                     <div class="padding"></div>
                  </div>
				  
                     <div class="col-md-3">
                        <p class="lead">Exportovať len moje dáta z databázy</p>
                        <p>Exportujú sa všetky moje dáta, teda dáta zobrazujúce sa na stránke <b><?php echo WWW_PATH; ?></b></p>
                        <a target="_blank" href="<?php echo WWW_PATH;?>dnt-jobs/dbExport.php?vendor_id=<?php echo Vendor::getId();?>&time=<?php echo Dnt::timestamp();?>">
                        <span type="submit" name="sent_4" class="btn btn-danger btn-radius" >Exportovať moje dáta</span>
                        </a>
                        <div class="padding"></div>
                     </div>
                     <div class="col-md-3">
                        <p class="lead">Exportovať vetky dáta z databázy</p>
                        <p>Exportujú sa všetky moje dáta, a tak isto aj dáta ostatných používateľov<b><br/><br/></b></p>
                        <a  target="_blank"  href="<?php echo WWW_PATH;?>dnt-jobs/dbExport.php?time=<?php echo Dnt::timestamp();?>">
                        <span type="submit" name="sent_4" class="btn btn-danger btn-radius" >Exportovať všetky dáta</span>
                        </a>
                        <div class="padding"></div>
                     </div>
                     <?php /*<div class="col-md-4">
                        <p class="lead">Exportovať skeleton dáta</p>
                        <p>Exportujú sa všetky aktuálne dáta pre skeleton aplikáciu <b><br/><br/></b></p>
                        <a  target="_blank"  href="<?php echo WWW_PATH;?>dnt-jobs/dbExport.php?vendor_id=1&time=<?php echo Dnt::timestamp();?>">
                     <span type="submit" name="sent_4" class="btn btn-danger btn-radius" >Exportovať skeletón dáta</span>
                     </a>
                     <div class="padding"></div>
                  </div>
                  */?>
                  <div class="col-md-3">
                     <p class="lead">Exportovať tento web</p>
                     <p>Exportujú sa všetky dáta s databázou pre web: <br/><b><?php echo WWW_PATH; ?></b></p>
                     <a target="_blank" href="<?php echo WWW_PATH;?>dnt-jobs/dataExport.php?vendor_id=<?php echo Vendor::getId();?>&time=<?php echo Dnt::timestamp();?>">
                     <span type="submit" name="sent_4" class="btn btn-danger btn-radius" >Exportovať moje dáta</span>
                     </a>
                     <div class="padding"></div>
                  </div>
            </div>
            <p class="lead">Nadpis stránky</p>
            <p>Nadpis sa zobrazí v hlavičke vygenerovaného HTML dokumentu</p>
            <input type="text" class="btn-default btn-lg btn-block" name="title" value="<?php echo Settings::get("title"); ?>" />
            <div class="padding"></div>
            <p class="lead">Description webu</p>
            <p>Zadajte krátky popis vášho webu</p>
            <input type="text" class="btn-default btn-lg btn-block" name="description" value="<?php echo Settings::get("description"); ?>" />
            <div class="padding"></div>
            <p class="lead">Kľúčové slová</p>
            <p>Zadajte kľúčové slová pre vašu stránku (slová oddeľujte čiarkou)</p>
            <input type="text" class="btn-default btn-lg btn-block" name="keywords" value="<?php echo Settings::get("keywords"); ?>" />
            <div class="padding"></div>
            <p class="lead">Štartovací modul</p>
            <p>Vyberte modul, ktorý sa ako prvý zobrazí pri načítaní Vašej stránky</p>
            <select name="startovaci_modul" class="btn-default btn-lg btn-block" type="text" size="1">
            <?php 
               $service = Settings::get("startovaci_modul");
               echo '<option selected value="">Default (z konfigu)</option>';
               
               foreach($webhook->services() as $key => $serviceIndex){
               	if($key == $service){
               		echo '<option selected value="'.$key.'">'.$serviceIndex['service_name'].'</option>';
               	}else{
               		echo '<option value="'.$key.'">'.$serviceIndex['service_name'].'</option>';
               
               	}
               }
               ?>
            </select>
            <div class="padding"></div>
            <p class="lead">Jazyková mutácia</p>
            <p>Nastavená jazyková mutácia sa zobrazí v zdrojom kóde. Pri načítavaní externých pluginov alebo pri indexacii napríklad Google bude jasné, o aku lokalizíciu sa jedná.
                <br/>V tomto nastavení sa definuje, ak jazyk bude používať konkrétne tento web.</p>
            <select name="language" class="btn-default btn-lg btn-block" type="text" size="1">
            <?php 
               $currentLang = Settings::get("language");
               foreach(MultyLanguage::getLanguages() as $row){
               $value = $row['slug'];
               $name = $row['name'];
               if ($currentLang == $value) {
               	echo '<option selected value="'.$value.'">'.$name.'</option>';
               }else{
               	echo '<option value="'.$value.'">'.$name.'</option>';
               
               }
               }
               
               ?>
            </select>
            <div class="padding"></div>
            <p class="lead">Cachovanie</p>
            <p>Zapnite, alebo vypnite cachovanie vašej stránky. <br/>
            Pri vytvorení novej udalosti v administrácii sa cache automaticky premaže.
            <br/>Doačasné zrušenie cache je možné vykonať getovým parametrom <b>_rc=-2</b>
            </p>
            <select name="cachovanie" class="btn-default btn-lg btn-block" type="text" size="1">
            <?php
               if(Settings::get("cachovanie") == "0"){
               	echo "<option value='0' selected>Cachovanie vypnuté</option>";
               	echo "<option value='1'>Cachovanie zapnuté</option>";
               }
               else{
               	echo "<option value='1' selected>Cachovanie zapnuté</option>";
               	echo "<option value='0' >Cachovanie vypnuté</option>";
               	}
               ?>
            </select>
            <div class="padding"></div>
            <p class="lead">Presmerovať, prepísať doménu, na reálnu</p>
            <p>Vždy presmerovať web na reálnu doménu (ktorá je nastavená v sekcii 
            <b>(Zoznam webov</b> / <b>Zoznam</b> / <b>Globálne vlastnosti</b> / <b>Vlastná URL adresa</b>), a to aj vtedy, ak sa url nachádza v testovacom móde.
            <br/>
            <b>Príklad:</b> Klientovi pošlete testovaciu url adresu ale on ju vyzdiela na socialnych sieťach. On aj vy potrebujete, aby skončil na doméne, ktorú si zaplatil. V tomto prípade viete použiť túto funkcionalitu.
            </p>
            <select name="still_redirect_to_domain" class="btn-default btn-lg btn-block" type="text" size="1">
            <?php
               if(Settings::get("still_redirect_to_domain") == "0"){
               	echo "<option value='0' selected>Nepresmerovať</option>";
               	echo "<option value='1'>Presmerovať</option>";
               }
               else{
               	echo "<option value='1' selected>Presmerovať</option>";
               	echo "<option value='0' >Nepresmerovať</option>";
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