<div class="col-md-12">
    <ul class="nav nav-tabs">
        <li <?php if(isset($_GET[ 'pa']) && $_GET[ 'pa']==1 or !isset($_GET[ 'pa'])){ echo 'class="active"';}?>><a href="index.php?src=nastavenia&pa=1">Nastavenia stránky</a></li>
        <li <?php if(isset($_GET[ 'pa']) && $_GET[ 'pa']==2 ){ echo 'class="active"';}?>><a href="index.php?src=nastavenia&pa=2">Nastavenia vlastníctva</a></li>
		<li <?php if(isset($_GET[ 'pa']) && $_GET[ 'pa']==3 ){ echo 'class="active"';}?>><a href="index.php?src=nastavenia&pa=3">Nastavenia vlastníctva 2</a></li>
        <li <?php if(isset($_GET[ 'pa']) && $_GET[ 'pa']==4 ){ echo 'class="active"';}?>><a href="index.php?src=nastavenia&pa=4">Nastavenie loga</a></li>
        <li <?php if(isset($_GET[ 'pa']) && $_GET[ 'pa']==5 ){ echo 'class="active"';}?>><a href="index.php?src=nastavenia&pa=5">Nastavenia social. siet</a></li>
        <li <?php if(isset($_GET[ 'pa']) && $_GET[ 'pa']==6 ){ echo 'class="active"';}?>><a href="index.php?src=nastavenia&pa=6">Nastavenia účtu (krátke)</a></li>
    </ul>
    <div class="tab-content">
	
		
        <?php if(isset($_GET[ 'pa']) && $_GET[ 'pa']==2 ){?>
		<!-- Nastavenia vlastníctva-->
		
        <p class="lead">Nastavenia vlastníctva</p>
        <div class="grid-body">
            <form id="obchod" action="<?php echo getMyServerRs($dntDb)."index.php?src=nastavenia&upravit-akcia ";?>" method="post">
                
				<p class="lead">Nastavte <b>meno </b> Vašej firmy</p>
                <p>Tento údaj sa bude zobrazovať všade tam, kde budete prezentovať Vašu firmu</p>
                <input type="text" class="btn-default btn-lg btn-block" name="vendor_company" value="<?php echo getVendorCompany($dntDb); ?>" />
                <div class="padding"></div>
				
                <p class="lead">Nastavte <b>sídlo</b> Vašej firmy</p>
                <p>Tento údaj sa bude zobrazovať všade tam, kde budete prezentovať Vašu firmu</p>
                <input type="text" class="btn-default btn-lg btn-block" name="vendor_street" value="<?php echo getVendorStreet($dntDb); ?>" />
                <div class="padding"></div>
                
				<p class="lead">Nastavte <b>psč</b> firmy</p>
                <p>Tento údaj sa bude zobrazovať všade tam, kde budete prezentovať Vašu firmu</p>
                <input type="text" class="btn-default btn-lg btn-block" name="vendor_psc" value="<?php echo getVendorPsc($dntDb); ?>" />
                <div class="padding"></div>
               
			    <p class="lead">Nastavte <b>mesto</b> firmy</p>
                <p>Tento údaj sa bude zobrazovať všade tam, kde budete prezentovať Vašu firmu</p>
                <input type="text" class="btn-default btn-lg btn-block" name="vendor_city" value="<?php echo getVendorCity($dntDb); ?>" />
                <div class="padding"></div>
				
                <p class="lead">Nastavte <b>telefón</b> firmy</p>
                <p>Tento údaj sa bude zobrazovať všade tam, kde budete prezentovať Vašu firmu</p>
                <input type="text" class="btn-default btn-lg btn-block" name="vendor_tel" value="<?php echo getVendorTel($dntDb); ?>" />
                <div class="padding"></div>
				
                <p class="lead">Nastavte <b>fax</b> firmy</p>
                <p>Tento údaj sa bude zobrazovať všade tam, kde budete prezentovať Vašu firmu</p>
                <input type="text" class="btn-default btn-lg btn-block" name="vendor_fax" value="<?php echo getVendorFax($dntDb); ?>" />
                <div class="padding"></div>
				
                <p class="lead">Nastavte <b>email</b> firmy</p>
                <p>Sem budú chodiť všetky notifikácie ohľadom firmy</p>
                <input type="text" class="btn-default btn-lg btn-block" name="vendor_email" value="<?php echo getVendorEmail($dntDb); ?>" />
                <div class="padding"></div>
				
                <p class="lead">Nastavte <b>ičo</b> firmy</p>
                <p>Tento údaj sa bude zobrazovať všade tam, kde budete prezentovať Vašu firmu</p>
                <input type="text" class="btn-default btn-lg btn-block" name="vendor_ico" value="<?php echo getVendorIco($dntDb); ?>" />
                <div class="padding"></div>
				
                <p class="lead">Nastavte <b>dič</b> firmy</p>
                <p>Tento údaj sa bude zobrazovať všade tam, kde budete prezentovať Vašu firmu</p>
                <input type="text" class="btn-default btn-lg btn-block" name="vendor_dic" value="<?php echo getVendorDic($dntDb); ?>" />
                <div class="padding"></div>
				
                <p class="lead">Nastavte <b>iban</b> firmy</p>
                <p>Tento údaj sa bude zobrazovať všade tam, kde budete prezentovať Vašu firmu</p>
                <input type="text" class="btn-default btn-lg btn-block" name="vendor_iban" value="<?php echo getVendorIban($dntDb); ?>" />
                <div class="padding"></div>
				
                <?php echo getReturnInput($dntDb);?>
                <input type="submit" name="odoslat_3" class="btn btn-danger btn-radius" value="Upraviť nastavenia" />
                <div class="padding"></div>
            </form>
        </div>
		
		
	<!-- Rozšírené nastavenia vlastníctva-->
        <?php }elseif(isset($_GET[ 'pa']) && $_GET[ 'pa']==3 ){?>
        <p class="lead">Rozšírené nastavenia vlastníctva</p>
        <!-- begin is here!-->
        <form id="obchod" action="<?php echo getMyServerRs($dntDb)."index.php?src=nastavenia&upravit-akcia ";?>" method="post">
            <p class="lead">Ste platcom <b>DPH</b>?</p>
            <p>Tento údaj sa bude zobrazovať všade tam, kde budete prezentovať Vašu firmu</p>
            <select class="btn-default btn-lg btn-block" name="platca_dph">
                <?php getZobrazenie(isVendorPlatcaDph($dntDb), $dntDb);?>
            </select>
            <div class="padding"></div>
            <p class="lead">Vyberte znak platobnej <b>meny</b></p>
            <p>Vyberte znak Vašej meny, ktorou sa bude v eshope platiť</p>
            <select class="btn-default btn-lg btn-block" name="znak_meny">
                <?php getMenaZnak(get_currency($dntDb), $dntDb); ?>
            </select>
            <div class="padding"></div>
            <p class="lead">Vyberte názov platobnej <b>meny</b></p>
            <p>Vyberte názov Vašej meny, ktorou sa bude v eshope platiť</p>
            <select class="btn-default btn-lg btn-block" name="nazov_meny">
                <?php getMenaNazov(getCurrencyNazov($dntDb), $dntDb); ?>
            </select>
			
			<div class="padding"></div>
            <p class="lead">Nastavte hodnotu <b>DPH</b></p>
            <p>Aktuálna cena DPH sa bude prepočítavať podľa aktuálnej hodnoty DPH</p>
			 <input type="text" name="dph" class="btn-default btn-lg btn-block" value="<?php echo getVendorDph($dntDb); ?>" />
			
			
            <div class="padding"></div>
            <?php echo getReturnInput($dntDb);?>
            <input type="submit" name="odoslat_4" class="btn btn-warning btn-radius" value="Upraviť nastavenia" />
        </form>
        <!-- end is here! -->
	
	<!-- Rozšírené nastavenia vlastníctva-->
        <?php }elseif(isset($_GET[ 'pa']) && $_GET[ 'pa']==4 ){?>
        <!-- begin is here!-->
		<div class="row">
			<div class="col-md-6">
				<form id="obchod" enctype='multipart/form-data' action="<?php echo getMyServerRs($dntDb)."index.php?src=nastavenia&upravit-akcia ";?>" method="post">
					<p class="lead">Nastavte logo <b>vašej firmy</b></p>
					<p>Ak máte eshop a vystavíte faktúru, vaše logo bude v hlavičke faktúry</p>
					<img src="<?php echo getDefaultImg("logo_firmy", $dntDb);?>" style="max-width: 200px; margin: 15px;" alt="" />
					<input type="file" name="userfile"  class="btn-default btn-lg btn-block" />
					<div class="padding"></div>
					<?php echo getReturnInput($dntDb);?>
					<input type="submit" name="odoslat_logo" class="btn btn-warning btn-radius" value="Upraviť nastavenia" />
				</form>
			</div>
			
			<div class="col-md-6">
				<form id="obchod" enctype='multipart/form-data' action="<?php echo getMyServerRs($dntDb)."index.php?src=nastavenia&upravit-akcia ";?>" method="post">
					<p class="lead">Nastavte defaultný <b>obrázok</b></p>
					<p>Tento obrázok sa zobrazí všade tam, kde nenastavíte vlastný obrázok</p>
					<img src="<?php echo getDefaultImg("no_img", $dntDb);?>" style="max-width: 200px; margin: 15px;" alt="" />
					<input type="file" name="userfile"  class="btn-default btn-lg btn-block" />
					<div class="padding"></div>
					<?php echo getReturnInput($dntDb);?>
					<input type="submit" name="odoslat_noimage" class="btn btn-warning btn-radius" value="Upraviť nastavenia" />
				</form>
			</div>
		</div>
        <!-- end is here! -->
        <?php }elseif(isset($_GET[ 'pa']) && $_GET[ 'pa']==5 ){?>
		
		<div class="grid-body">
								<form  id="socialne-siete" action="<?php echo getMyServerRs($dntDb)."index.php?src=nastavenia&upravit-akcia";?>" method="post">
									<p class="lead">Nastavte si Váš email</p>
									<p>Nastavenie emailu: 
									<b>Tento email bude fungovať ako <br/> notifakčný email a bude Vás kontaktovať, ak to bude potrebné</b></p>
										<input type="text" class="btn-default btn-lg btn-block" name="notifikacny_email" value="<?php echo getMyNotifikacnyEmail($dntDb); ?>" />
									<div class="padding"></div>
									
									<p class="lead">Máte vlastnú Facebook Stránku? Nastavte si ju</p>
									<p>Na Vašej stránke sa budeme vždy odvolávať na Vašu zadanú adresu</p>
									<input type="text" class="btn-default btn-lg btn-block" name="facebook_page" value="<?php echo getMyFacebookPage($dntDb); ?>" />
									<div class="padding"></div>
									
									<p class="lead">Máte vlastnú Twitter Stránku? Nastavte si ju</p>
									<p>Na Vašej stránke sa budeme vždy odvolávať na Vašu zadanú adresu</p>
									<input type="text" class="btn-default btn-lg btn-block" name="twitter" value="<?php echo getMyTwitter($dntDb); ?>" />
									<div class="padding"></div>
									
									<p class="lead">Máte vlastnú Youtube Stránku? Nastavte si ju</p>
									<p>Na Vašej stránke sa budeme vždy odvolávať na Vašu zadanú adresu</p>
									<input type="text" class="btn-default btn-lg btn-block" name="youtube" value="<?php echo getMyYoutube($dntDb); ?>" />
									<div class="padding"></div>
									
									<p class="lead">Máte vlastnú Flickr Stránku? Nastavte si ju</p>
									<p>Na Vašej stránke sa budeme vždy odvolávať na Vašu zadanú adresu</p>
									<input type="text" class="btn-default btn-lg btn-block" name="flickr" value="<?php echo getMyFlickr($dntDb); ?>" />
									<div class="padding"></div>
									
									<p class="lead">Používate Google mapy? Nastavte si ich</p>
									<p>Vložením URL adresy z google sa Vám automaticky vygeneruje mapa</p>
									<input type="text" class="btn-default btn-lg btn-block" name="google_map" value="<?php echo getMyGoogleMap($dntDb); ?>" />
									<div class="padding"></div>
									
									<?php echo getReturnInput($dntDb);?>
									<input type="submit" name="odoslat_2" class="btn btn-warning btn-radius" value="Upraviť nastavenia" />
								<div class="padding"></div>
							</form>
							</div>
		
		 <?php }elseif(isset($_GET[ 'pa']) && $_GET[ 'pa']==6 ){?>
		 <div class="grid-body">
								<?php
								$query = this_admin_query($dntDb);
								if(mysql_num_rows($query)>0){
									while($row = mysql_fetch_array($query)){
									?>
								<div class="row">
									<div class="col-md-6">
										<form enctype='multipart/form-data' id="pristupy" action="<?php echo getMyServerRs($dntDb)."index.php?src=pristupy&upravit-akcia";?>" method="post">
										<input type="hidden" name="id" value="<?php echo $row['id'];?>" />
										
										<p class="lead">Nastavte Vaše <b>meno</b></p>
										<p>Ak máte eshop a vystavíte faktúru, vaše meno tam bude predvyplnené</p>
											<input type="text" class="btn-default btn-lg btn-block" name="meno" value="<?php echo $row['meno']; ?>" />
										<div class="padding"></div>
										
										<p class="lead">Nastavte Vaše <b>priezvisko</b></p>
										<p>Ak máte eshop a vystavíte faktúru, vaše meno tam bude predvyplnené</p>
											<input type="text" class="btn-default btn-lg btn-block" name="priezvisko" value="<?php echo $row['priezvisko']; ?>" />
										<div class="padding"></div>
									</div>
									
									<div class="col-md-6">									
										<p class="lead">Vyberte si jedinečnú <b>fotografiu</b></p>
										<p>Ak máte eshop a vystavíte faktúru, vaše meno tam bude predvyplnené</p>
										<img src="<?php echo admin_avatar($_SESSION['admin'], $dntDb);?>" style="max-width: 200px; margin: 15px;" alt="" />
											<input type="file" name="userfile"  class="btn-default btn-lg btn-block" />
										<div class="padding"></div>
									
									<?php echo getReturnInput($dntDb);?>
									
									<input type="hidden" name="url_fotka" value="<?php echo $row['url_fotka'].".".$row['fotka_pripona'];?>" />
									<input type="submit" name="odoslat_short" class="btn btn-primary btn-radius" value="Upraviť nastavenia" />
								<div class="padding"></div>
								
							</form>
							</div>
							</div>
							<?php
								} //end of while
							} //end of if
							?>
							</div>
							<?php }else{ ?>
							
							
		<!-- Nastavenia stránky-->
		
        <div class="grid-body">
           <form  action="<?php echo getMyServerRs($dntDb)."index.php?src=nastavenia&upravit-akcia";?>" method="post">

								
								<p class="lead">Defaultný jazyk</p>
								<p>Tento jazyk bude ako prednastavený jazyk po načítaní.</p>
								<select name="default_lang" class="btn-default btn-lg btn-block" type="text" size="1">
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
								</select>
								<div class="padding"></div>
								
								
								
								<p class="lead">Cachovanie</p>
								<p>Zapnite, alebo vypnite cachovanie vašej stránky. <br/>
								Pri vytvorení novej udalosti v administrácii sa cache automaticky premaže.
								<br/>Doačasné zrušenie cache je možné vykonať getovým parametrom <b>_rc=-2</b>
								</p>
								<select name="cachovanie" class="btn-default btn-lg btn-block" type="text" size="1">
									<?php
										if(getCachovanie($dntDb) == "0"){
											echo "<option value='0' selected>Cachovanie vypnuté</option>";
											echo "<option value='1'>Cachovanie nastavené</option>";
										}
										else{
											echo "<option value='1' selected>Cachovanie nastavené</option>";
											echo "<option value='0' >Cachovanie vypnuté</option>";
											}
									?>
								</select>
								<div class="padding"></div>

									
								<p class="lead">Kľúčové slová</p>
								<p>Zadajte tie najkľúčovejšie slová pre vašu stránku (slová oddeľujte čiarkou)</p>
								<input type="text" class="btn-default btn-lg btn-block" name="keywords" value="<?php echo getMyKeywords($dntDb); ?>" />
									<div class="padding"></div>
								
								<p class="lead">Nadpis stránky</p>
								<p>Nadpis sa zobrazí v hlavičke vygenerovaného HTML dokumentu</p>
								<input type="text" class="btn-default btn-lg btn-block" name="nadpis_stranky" value="<?php echo getMyTitle($dntDb); ?>" />
									<div class="padding"></div>
								
								
								<p class="lead">Štartovací modul</p>
								<p>Vyberte modul, ktorý sa ako prvý zobrazí pri načítaní Vašej stránky</p>
								<select name="startovaci_modul" class="btn-default btn-lg btn-block" type="text" size="1">
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
								</select>
								<div class="padding"></div>
								
								<p class="lead">Targett</p>
								<p>Nastavte otváranie odkazov netýkajucích sa Vašej stránky</p>
								<select name="target" class="btn-default btn-lg btn-block" type="text" size="1">
									<?php
										if(getTarget($dntDb) == "_blank"){
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
								
								<p class="lead">Registrácia používateľa</p>
								<p>Toto nastavenie umožňuje meniť stav nového používateľa. Buď to bude musieť byť schválený vlastníkom (Vami) stránky, alebo sa vykoná aktivácia automaticky pomocou kliknutia používateľa na vygenerovaný email.</p>
								<select name="default_stat_user" class="btn-default btn-lg btn-block" type="text" size="1">
									<?php
										if(getGlobalSetting("default_stat_user", $dntDb) == "1"){
											echo "<option value='1' selected>Používateľ sa aktivuje automaticky po kliknutí na email.</option>";
											echo "<option value='0'>Používateľa je nutné aktivovať cez administráciu</option>";
										}
										else{
											echo "<option value='1' >Používateľ sa aktivuje automaticky po kliknutí na email.</option>";
											echo "<option value='0' selected>Používateľa je nutné aktivovať cez administráciu</option>";
											}
									?>
								</select>
								<div class="padding"></div>
								
								<?php echo getReturnInput($dntDb);?>
								<input type="submit" name="odoslat_1" class="btn btn-success btn-radius" value="Upraviť nastavenia" />
								<div class="padding"></div>
							</form>
        </div>
		
									<?php } ?>
		
    </div>
</div>
















<?php /*

<!-- BEGIN BASIC BUTTONS -->
					<div class="col-md-6">
						<div class="grid">
							<div class="grid-header">
								<i class="fa fa-laptop"></i>
								<span class="grid-title">Nastavenia stránky</span>
								<div class="pull-right grid-tools">
									<a data-widget="collapse" title="Collapse"><i class="fa fa-chevron-up"></i></a>
									<a data-widget="reload" title="Reload"><i class="fa fa-refresh"></i></a>
									<a data-widget="remove" title="Remove"><i class="fa fa-times"></i></a>
								</div>
							</div>
							<div class="grid-body">
							<form  action="<?php echo getMyServerRs($dntDb)."index.php?src=nastavenia&upravit-akcia";?>" method="post">
								
	
								
								<p class="lead">Defaultný jazyk</p>
								<p>Tento jazyk bude ako prednastavený jazyk po načítaní.</p>
								<select name="default_lang" class="btn-default btn-lg btn-block" type="text" size="1">
									<?php
									$query = dnt_query("SELECT * FROM dnt_languages WHERE 
									`zobrazenie` = '1' AND
									`vendor` = '".$_SESSION['getVendorId']."'
									", $dntDb);
									if (mysql_num_rows($query) > 0) {
										while ($row = mysql_fetch_array($query)) {
											if ($row['slug'] == getGlobalSetting("default_lang", $dntDb))
												echo "<option value='".$row['slug']."' selected>".$row['nazov']."</option>";
											else
												echo "<option value='".$row['slug']."'>".$row['nazov']."</option>";
											}
										}
									?>
								</select>
								<div class="padding"></div>
									
								<p class="lead">Kľúčové slová</p>
								<p>Zadajte tie najkľúčovejšie slová pre vašu stránku (slová oddeľujte čiarkou)</p>
								<input type="text" class="btn-default btn-lg btn-block" name="keywords" value="<?php echo getMyKeywords($dntDb); ?>" />
									<div class="padding"></div>
								
								<p class="lead">Nadpis stránky</p>
								<p>Nadpis sa zobrazí v hlavičke vygenerovaného HTML dokumentu</p>
								<input type="text" class="btn-default btn-lg btn-block" name="nadpis_stranky" value="<?php echo getMyTitle($dntDb); ?>" />
									<div class="padding"></div>
								
								
								<p class="lead">Štartovací modul</p>
								<p>Vyberte modul, ktorý sa ako prvý zobrazí pri načítaní Vašej stránky</p>
								<select name="startovaci_modul" class="btn-default btn-lg btn-block" type="text" size="1">
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
								</select>
								<div class="padding"></div>
								
								<p class="lead">Targett</p>
								<p>Nastavte otváranie odkazov netýkajucích sa Vašej stránky</p>
								<select name="target" class="btn-default btn-lg btn-block" type="text" size="1">
									<?php
										if(getTarget($dntDb) == "_blank"){
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
								<?php echo getReturnInput($dntDb);?>
								<input type="submit" name="odoslat_1" class="btn btn-success btn-radius" value="Upraviť nastavenia" />
								<div class="padding"></div>
							</form>
							</div>
						</div>
					</div>
					<!-- END BASIC BUTTON -->
					
					
					<!-- BEGIN ICON BUTTONS -->
					<div class="col-md-6">
						<div class="grid">
							<div class="grid-header">
								<i class="fa fa-laptop"></i>
								<span class="grid-title">Nastavenia socialnych sietí</span>
								<div class="pull-right grid-tools">
									<a data-widget="collapse" title="Collapse"><i class="fa fa-chevron-up"></i></a>
									<a data-widget="reload" title="Reload"><i class="fa fa-refresh"></i></a>
									<a data-widget="remove" title="Remove"><i class="fa fa-times"></i></a>
								</div>
							</div>
							<div class="grid-body">
								<form  id="socialne-siete" action="<?php echo getMyServerRs($dntDb)."index.php?src=nastavenia&upravit-akcia";?>" method="post">
									<p class="lead">Nastavte si Váš email</p>
									<p>Nastavenie emailu: 
									<b>Tento email bude fungovať ako <br/> notifakčný email a bude Vás kontaktovať, ak to bude potrebné</b></p>
										<input type="text" class="btn-default btn-lg btn-block" name="notifikacny_email" value="<?php echo getMyNotifikacnyEmail($dntDb); ?>" />
									<div class="padding"></div>
									
									<p class="lead">Máte vlastnú Facebook Stránku? Nastavte si ju</p>
									<p>Na Vašej stránke sa budeme vždy odvolávať na Vašu zadanú adresu</p>
									<input type="text" class="btn-default btn-lg btn-block" name="facebook_page" value="<?php echo getMyFacebookPage($dntDb); ?>" />
									<div class="padding"></div>
									
									<p class="lead">Máte vlastnú Twitter Stránku? Nastavte si ju</p>
									<p>Na Vašej stránke sa budeme vždy odvolávať na Vašu zadanú adresu</p>
									<input type="text" class="btn-default btn-lg btn-block" name="twitter" value="<?php echo getMyTwitter($dntDb); ?>" />
									<div class="padding"></div>
									
									<p class="lead">Máte vlastnú Youtube Stránku? Nastavte si ju</p>
									<p>Na Vašej stránke sa budeme vždy odvolávať na Vašu zadanú adresu</p>
									<input type="text" class="btn-default btn-lg btn-block" name="youtube" value="<?php echo getMyYoutube($dntDb); ?>" />
									<div class="padding"></div>
									
									<p class="lead">Máte vlastnú Flickr Stránku? Nastavte si ju</p>
									<p>Na Vašej stránke sa budeme vždy odvolávať na Vašu zadanú adresu</p>
									<input type="text" class="btn-default btn-lg btn-block" name="flickr" value="<?php echo getMyFlickr($dntDb); ?>" />
									<div class="padding"></div>
									<?php echo getReturnInput($dntDb);?>
									<input type="submit" name="odoslat_2" class="btn btn-warning btn-radius" value="Upraviť nastavenia" />
								<div class="padding"></div>
							</form>
							</div>
						</div>
					</div>
					<!-- END ICON BUTTONS -->
				</div>
				<div class="row">
					<!-- BEGIN BUTTONS SIZE -->
					<div class="col-md-6">
						<div class="grid">
							<div class="grid-header">
								<i class="fa fa-laptop"></i>
								<span class="grid-title">Nastavenia vlastníctva webu / eshopu</span>
								<div class="pull-right grid-tools">
									<a data-widget="collapse" title="Collapse"><i class="fa fa-chevron-up"></i></a>
									<a data-widget="reload" title="Reload"><i class="fa fa-refresh"></i></a>
									<a data-widget="remove" title="Remove"><i class="fa fa-times"></i></a>
								</div>
							</div>
							<div class="grid-body">
								<form  id="obchod" action="<?php echo getMyServerRs($dntDb)."index.php?src=nastavenia&upravit-akcia";?>" method="post">
									<p class="lead">Nastavte <b>meno </b> Vašej firmy</p>
									<p>Tento údaj sa bude zobrazovať všade tam, kde budete prezentovať Vašu firmu</p>
										<input type="text" class="btn-default btn-lg btn-block" name="vendor_company" value="<?php echo getVendorCompany($dntDb); ?>" />
									<div class="padding"></div>
									
									<p class="lead">Nastavte <b>sídlo</b> Vašej firmy</p>
									<p>Tento údaj sa bude zobrazovať všade tam, kde budete prezentovať Vašu firmu</p>
									<input type="text" class="btn-default btn-lg btn-block" name="vendor_street" value="<?php echo getVendorStreet($dntDb); ?>" />
									<div class="padding"></div>
									
									<p class="lead">Nastavte <b>psč</b> firmy</p>
									<p>Tento údaj sa bude zobrazovať všade tam, kde budete prezentovať Vašu firmu</p>
									<input type="text" class="btn-default btn-lg btn-block" name="vendor_psc" value="<?php echo getVendorPsc($dntDb); ?>" />
									<div class="padding"></div>
									
									<p class="lead">Nastavte <b>mesto</b> firmy</p>
									<p>Tento údaj sa bude zobrazovať všade tam, kde budete prezentovať Vašu firmu</p>
									<input type="text" class="btn-default btn-lg btn-block" name="vendor_city" value="<?php echo getVendorCity($dntDb); ?>" />
									<div class="padding"></div>
									
									<p class="lead">Nastavte <b>telefón</b> firmy</p>
									<p>Tento údaj sa bude zobrazovať všade tam, kde budete prezentovať Vašu firmu</p>
									<input type="text" class="btn-default btn-lg btn-block" name="vendor_tel" value="<?php echo getVendorTel($dntDb); ?>" />
									<div class="padding"></div>
									
									<p class="lead">Nastavte <b>fax</b> firmy</p>
									<p>Tento údaj sa bude zobrazovať všade tam, kde budete prezentovať Vašu firmu</p>
									<input type="text" class="btn-default btn-lg btn-block" name="vendor_fax" value="<?php echo getVendorFax($dntDb); ?>" />
									<div class="padding"></div>
									
									<p class="lead">Nastavte <b>email</b> firmy</p>
									<p>Sem budú chodiť všetky notifikácie ohľadom firmy</p>
									<input type="text" class="btn-default btn-lg btn-block" name="vendor_email" value="<?php echo getVendorEmail($dntDb); ?>" />
									<div class="padding"></div>
									
									<p class="lead">Nastavte <b>ičo</b> firmy</p>
									<p>Tento údaj sa bude zobrazovať všade tam, kde budete prezentovať Vašu firmu</p>
									<input type="text" class="btn-default btn-lg btn-block" name="vendor_ico" value="<?php echo getVendorIco($dntDb); ?>" />
									<div class="padding"></div>
									
									<p class="lead">Nastavte <b>dič</b> firmy</p>
									<p>Tento údaj sa bude zobrazovať všade tam, kde budete prezentovať Vašu firmu</p>
									<input type="text" class="btn-default btn-lg btn-block" name="vendor_dic" value="<?php echo getVendorDic($dntDb); ?>" />
									<div class="padding"></div>
									
									<p class="lead">Nastavte <b>iban</b> firmy</p>
									<p>Tento údaj sa bude zobrazovať všade tam, kde budete prezentovať Vašu firmu</p>
									<input type="text" class="btn-default btn-lg btn-block" name="vendor_iban" value="<?php echo getVendorIban($dntDb); ?>" />
									<div class="padding"></div>
									<?php echo getReturnInput($dntDb);?>
									<input type="submit" name="odoslat_3" class="btn btn-danger btn-radius" value="Upraviť nastavenia" />
								<div class="padding"></div>
							</form>
							</div>
						</div>
					</div>
					<!-- END BUTTONS SIZE -->
					<!-- BEGIN BUTTONS BLOCK -->
					<div class="col-md-6">
						<div class="grid">
							<div class="grid-header">
								<i class="fa fa-laptop"></i>
								<span class="grid-title">Nastavenia môjho účtu</span>
								<div class="pull-right grid-tools">
									<a data-widget="collapse" title="Collapse"><i class="fa fa-chevron-up"></i></a>
									<a data-widget="reload" title="Reload"><i class="fa fa-refresh"></i></a>
									<a data-widget="remove" title="Remove"><i class="fa fa-times"></i></a>
								</div>
							</div>
							<div class="grid-body">
								<?php
								$query = this_admin_query($dntDb);
								if(mysql_num_rows($query)>0){
									while($row = mysql_fetch_array($query)){
									?>
								
									<form enctype='multipart/form-data' id="pristupy" action="<?php echo getMyServerRs($dntDb)."index.php?src=pristupy&upravit-akcia";?>" method="post">
										<input type="hidden" name="id" value="<?php echo $row['id'];?>" />
										
										<p class="lead">Nastavte Vaše <b>meno</b></p>
										<p>Ak máte eshop a vystavíte faktúru, vaše meno tam bude predvyplnené</p>
											<input type="text" class="btn-default btn-lg btn-block" name="meno" value="<?php echo $row['meno']; ?>" />
										<div class="padding"></div>
										
										<p class="lead">Nastavte Vaše <b>priezvisko</b></p>
										<p>Ak máte eshop a vystavíte faktúru, vaše meno tam bude predvyplnené</p>
											<input type="text" class="btn-default btn-lg btn-block" name="priezvisko" value="<?php echo $row['priezvisko']; ?>" />
										<div class="padding"></div>
										
										
										<p class="lead">Vyberte si jedinečnú <b>fotografiu</b></p>
										<p>Ak máte eshop a vystavíte faktúru, vaše meno tam bude predvyplnené</p>
										<img src="<?php echo admin_avatar($_SESSION['admin'], $dntDb);?>" style="max-width: 200px; margin: 15px;" alt="" />
											<input type="file" name="userfile"  class="btn-default btn-lg btn-block" />
										<div class="padding"></div>
									<?php echo getReturnInput($dntDb);?>
									
									<input type="hidden" name="url_fotka" value="<?php echo $row['url_fotka'].".".$row['fotka_pripona'];?>" />
									<input type="submit" name="odoslat_short" class="btn btn-primary btn-radius" value="Upraviť nastavenia" />
								<div class="padding"></div>
							</form>
							<?php
								} //end of while
							} //end of if
							?>
							</div>
						</div>
					</div>
					<!-- END BUTTONS BLOCK -->
					*/?>