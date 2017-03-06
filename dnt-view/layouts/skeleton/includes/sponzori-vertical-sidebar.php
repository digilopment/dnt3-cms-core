														<div>
                                <h4>Skúste vyhľadávanie</h4>
                                <form class="search" action="<?php echo getMyServerVendor($dntDb)."hladaj/?";?>" method="GET">
                                    <div class="input-group">
                                        <input class="form-control" placeholder="Zadajte frázu..." name="s"  type="text" required="required">
                                        <span class="input-group-btn">
                                            <input type="submit" class="btn btn-primary"  value="Hľadaj" />
                                        </span>
                                    </div>
                                </form>   
                            </div>
                            
                            <div class="panel-box">
                                <div class="titles">
                                    <h4><i class="fa fa-calendar"></i>Partneri</h4>
                                </div>
                                <!-- Carousel Events -->
                                <ul class="single-carousel">
                                    <!-- Item  Event  -->
                                    <li>
                                        <div class="content-counter">
                                            <div id="" class="counter">Partneri Bratislava Region Cup</div>
    
                                            <ul class="list-diary">
                                                <!-- Item List Diary --> 
                                                <li>
                                                    <ul class="club-logo">
                                                    			<?php
                                                    			$partneri = dnt_multiple_posts_query("sponzori", "rand() LIMIT 15", $dntDb);
                                                    			if (mysql_num_rows($partneri) > 0) {
                                                    				while ($partner = mysql_fetch_array($partneri)) {
                                                    					?>
                                                        <li style="width: 30%; margin: 0 25px;">
                                                        	<a href="<?php echo $partner['url'];?>" target="_blank" class="">
                                                        	<img  src="<?php echo setPostImage($partner['url_fotka'], $partner['fotka_pripona'], $partner['typ'], $dntDb);?>" alt="">
                                                        	</a>
                                                        	<h6><?php echo $partner['nazov'];?></h6>
                                                        </li>
                                                        	<?php
                                                        		}
                                                        	}
                                                        	?>
                                                    </ul>
                              
                                                </li>
                                                <!-- End Item List Diary --> 
                                            </ul>
                                            <a class="btn btn-primary" href="">
                                                PARTNERI
                                                <i class="fa fa-trophy"></i>
                                            </a>
                                        </div>
                                    </li>
                                    <!-- End Item  Event  -->

                                    <!-- Item  Event -->
                                     <li>
                                        <div class="content-counter">
                                            <div id="" class="counter">Partneri Charitatívnej cyklojazdy</div>
    
                                            <ul class="list-diary">
                                                <!-- Item List Diary --> 
                                                <li>
                                                    <ul class="club-logo">
                                                    			<?php
                                                    			$partneri = dnt_multiple_posts_query("partneri", "rand() LIMIT 15", $dntDb);
                                                    			if (mysql_num_rows($partneri) > 0) {
                                                    				while ($partner = mysql_fetch_array($partneri)) {
                                                    					?>
                                                        <li style="width: 50%;">
                                                        	<a href="<?php echo $partner['url'];?>" target="_blank" class="">
                                                        	<img  src="<?php echo setPostImage($partner['url_fotka'], $partner['fotka_pripona'], $partner['typ'], $dntDb);?>" alt="">
                                                        	</a>
                                                        	<h6><?php echo $partner['nazov'];?></h6>
                                                        </li>
                                                        	<?php
                                                        		}
                                                        	}
                                                        	?>
                                                    </ul>
                              
                                                </li>
                                                <!-- End Item List Diary --> 
                                            </ul>
                                            <a class="btn btn-primary" href="#">
                                                VIEW EVENT PAGE
                                                <i class="fa fa-trophy"></i>
                                            </a>
                                        </div>
                                    </li>
                                    <!-- End Item  Event -->

                                </ul>
                                <!-- End Carousel Events --> 
                            </div>  
                            <!-- End Info-->
                            
                            <!-- Locations -->
                            
                            <div class="panel-box">
                            
                                <div class="titles">
                                    <h4>Najnovšie články</h4>
                                </div>
                                <!-- Locations Carousel --> 
                                <ul class="single-carousel">
                                	 <?php
                                	 $query = dnt_query("SELECT * FROM `dnt_posts` WHERE 
									 parent_id = '0' AND 
									 typ='clanky' AND 
									 zobrazenie = '1' AND
									 vendor = '".getVendorId($dntDb)."' 
									 ORDER BY datum_rok DESC, datum_mesiac DESC, poradie desc LIMIT 4", $dntDb);
                                	 if(mysql_num_rows($query)>0){
                                	 	while($row = mysql_fetch_array($query)){
                                	 		?>    
                                    <li>
                                    	<a href="<?php echo getMyServer($dntDb)."clanky/".$row['datum_rok']."/".$row['datum_mesiac']."/".$row['datum_den']."/".$row['url']."";?>">
                                        <img src="<?php echo setPostImage($row['url_fotka'], $row['fotka_pripona'], $row['typ'], $dntDb);?>" alt="" class="img-responsive">
                                       </a>
                                        <div class="info-single-carousel">
                                            <a href="<?php echo getMyServer($dntDb)."clanky/".$row['datum_rok']."/".$row['datum_mesiac']."/".$row['datum_den']."/".$row['url']."";?>">
                                            	<h4><?php echo $row['nazov'];?></h4>
                                            </a>
                                            <p><?php echo obsah_uvod(not_html($row['obsah']), 300);?></p>
                                        </div>
                                    </li>
                                     <?php
                                     		}
                                     }
                                     ?>                                
                                </ul>
                                <!-- Locations Carousel --> 
                               </div>
                                
                               <?php /* <!-- Locations Video --> 
                                <div class="row">
                                    <iframe src="//www.youtube.com/embed/v-Jn63TxKXQ" class="video"></iframe>
                                    <div class="col-md-12">
                                        <h4>Na bicykli deťom. 9. etapa TN - BA</h4>
                                        <p>V sobotu (14. 6. 2014) sme aj s pelotónom charitatívnej cyklojazdy Na bicykli deťom 2014 vyrazili na poslednú etapu z Trenčína do Bratislavy. Po dnešných 160 km ukončili celú jazdu po cca 1100 km. Pelotón sa nám oproti predchádzajúcim etapám značne rozrástol. Ospravedlňujem sa za dlhé pasáže, ale chcel som nafilmovať podľa možnosti všetkých.
Ďakujem všetkým, ktorí sa akokoľvek podieľali na úspešnom zvládnutí celej cyklojazdy.</p>
                                    </div>
                                </div> */?>
								
								<?php
								$video_links = array("VW8eCe2n6K8", "s-bLXLRe0Sk", "uu7FImVs3_g", "v-Jn63TxKXQ");
								foreach ($video_links as $video_link){
								?>
								  <div class="row">
                                    <iframe src="//www.youtube.com/embed/<?php echo $video_link;?>" class="video"></iframe>
                                    <div class="col-md-12">
                                        <h4>Na bicykli deťom</h4>
                                        <p></p>
                                    </div>
                                </div>
								<?php
									}
								?>
                                <!-- End Locations Video --> 
