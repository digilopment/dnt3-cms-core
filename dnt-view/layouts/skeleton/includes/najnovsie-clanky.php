<div class="wtrSht wtrStandardRow wtrNoAboveMenuRow wtrShtFullWidthSection wtrShtFullWidthSectionNoInner wtrNoAutoHeightColumns  ">
   <div class="wtrSht">
      <div class=" clearfix">
         <div class="wtrPageContent vcRow wtrMargin clearfix">
            <div class="wtrStandardColumn vc_col-sm-12 wtrNoRoundedCornersColumn wpb_column vc_column_container ">
               <div class="wpb_wrapper  ">
                  <div class="wtrShtLastNewsMetroStream">
                     <div class="wtrSht wtrShtLastNewsMetro  clearfix">
                        <?php
                        $query = dnt_query("SELECT * FROM `dnt_posts` WHERE parent_id = '0' AND typ='clanky' AND zobrazenie = '1' ORDER BY datum_rok DESC, datum_mesiac DESC, poradie desc LIMIT 4", $dntDb);
                        if(mysql_num_rows($query)>0){
                        	while($row = mysql_fetch_array($query)){
                        ?>
                        <article class="wtrColOneFourth wtrShtLastNewsBoxedItem">
                           <div class="wtrShtLastNewsBoxedItemHolder">
                              <div class="wtrShtLastNewsBoxedDate wtrShtLastNewsMetroAnimation">
                                 <div><?php echo $row['datum_den'].".".$row['datum_mesiac'].".".$row['datum_rok'] ;?></div>
                              </div>
                              <a href="<?php echo getMyServer($dntDb)."clanky/".$row['datum_rok']."/".$row['datum_mesiac']."/".$row['datum_den']."/".$row['url']."";?>">
                              	<span class="wtrShtLastNewsBoxedOverlay wtrShtLastNewsMetroAnimation"></span>
                              	<img class="wtrShtLastNewsBoxedZoom wtrShtLastNewsMetroAnimation" <?php /*style="width: 345px; height: 345px;"*/?> alt="<?php echo $row['nazov'];?>" src="<?php echo set_img_post_square($row['url_fotka'], $row['fotka_pripona'], $dntDb);?>">
                              </a>
                              <a href="<?php echo getMyServer($dntDb)."clanky/".$row['datum_rok']."/".$row['datum_mesiac']."/".$row['datum_den']."/".$row['url']."";?>">
                                 <h2 class="wtrShtLastNewsBoxedHedline wtrShtLastNewsMetroAnimation">
                                 	<?php echo $row['nazov'];?>
                                 </h2>
                              </a>
                              <div class="wtrShtLastNewsBoxedAuthor wtrShtLastNewsMetroAnimation">author: <a class="" href="<?php echo getMyServer($dntDb)."clanky/".$row['datum_rok']."/".$row['datum_mesiac']."/".$row['datum_den']."/".$row['url']."";?>"> ssnkf.sk </a></div>
                           </div>
                        </article>
                        <?php
                        	}
                        }
                        ?>
                     
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>