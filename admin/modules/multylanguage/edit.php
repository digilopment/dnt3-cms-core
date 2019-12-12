
<?php get_top(); ?>
<?php get_top_html(); 
   $rest = new Rest;
   
   if($rest->get('page')){
	   $page = $rest->get('page');
   }else{
	   $page = 1;
   }
   ?>
<section class="content">
   <div class="row">
      <section class="content-header">
         <ul>
            <li class="post_type" style="text-decoration: underline">
               <a href="index.php?src=multylanguage&action=translates&page=<?php echo $page;?>">
               <span class="label label-primary bg-green" style="padding: 5px;"><big>Späť na zoznam prekladov</big></span>
               </a>
            </li>
         </ul>
      </section>
      <form enctype="multipart/form-data" action="<?php echo WWW_PATH_ADMIN_2."index.php?src=multylanguage&action=update&translate_id=".$rest->get('translate_id')."";?>" method="POST">
         <!-- prava strana-->
         <div class="col-md-12">
            <div class="col">
               <!-- tabs begin here! -->
               <div class="tab-content" style="border: 0px solid; padding: 0px;">
                  <?php
                     /*$query = "SELECT * FROM dnt_translates WHERE 
                     translate_id = '".$rest->get('translate_id')."' AND
                     vendor_id = '".Vendor::getId()."' order by lang_id desc";*/
					 $query = MultyLanguage::getLangs(true);
                     if($db->num_rows($query) > 0){
                     	foreach($db->get_results($query) as $row){
							$data = array("translate_id"=>$rest->get('translate_id'),'lang_id'=>$row['slug'],'type'=>'static');
							$data2 = array("translate_id"=>$rest->get('translate_id'),'lang_id'=>$row['slug'],'type'=>'static');
                     ?>
                  <div class="tab-pane active">
                     <br>
                     <div class="row">
                        <div class="form-group">
                           <div class="form-group">
                              <label class="col-sm-2 control-label">
                                 <p class="lead dnt_bold">
                                    <span class="dnt_lang" style="float: left;"><?php if(MULTY_LANGUAGE == false) echo "Preklad"; else echo "Preklad - " . $row['slug']; ?>:</span>
                                 </p>
                              </label>
                              <div class="col-sm-4">
                                 <input type="text" value="<?php echo MultyLanguage::getTranslateLang($data);?>" name="translate_<?php echo $row['slug']; ?>" class="form-control" placeholder="Názov:">
                                 <br>
                              </div>
							  
                           </div>
                        </div>
                     </div>
                     <br>
                  </div>
                  <?php
                     }
                     }
                     ?>
               </div>
			   <hr/>
			   <label class="col-sm-2 control-label">
				 <p class="lead dnt_bold">
					<span class="dnt_lang" style="float: left;">Kľúč:</span>
				 </p>
			  </label>
			   <div class="col-sm-4">
				 <input type="text" value="<?php echo MultyLanguage::getTranslateLang($data, "translate_id");?>" name="translate_id" class="form-control" placeholder="Názov:">
				 <br>
			  </div>
               <!-- end here -->
               <?php echo Dnt::returnInput();?>
               <input type="submit" name="sent" class="btn btn-primary btn-lg btn-block" value="Upraviť">
            </div>
         </div>
         <!-- end prava strana -->
      </form>
   </div>
</section>
<?php get_bottom_html(); ?>
<?php get_bottom(); ?>