<?php include "tpl_functions.php"; ?>
<?php get_top(); ?>
<?php include "top.php";?>

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
<?php include "bottom.php"; ?>
<?php get_bottom(); ?>