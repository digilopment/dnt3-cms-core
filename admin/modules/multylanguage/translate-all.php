<?php include "plugins/webhook/tpl_functions.php"; ?>
<?php get_top(); ?>
<?php include "plugins/webhook/top.php"; 
   $rest = new Rest;
   
   if($rest->get('page')){
	   $page = $rest->get('page');
   }else{
	   $page = 1;
   }
   
	$langs = array();
	$query = MultyLanguage::getLangs(true);
	if($db->num_rows($query) > 0){
		foreach($db->get_results($query) as $row){			
		 $langs[] = $row['slug'];
		}
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
      <form enctype="multipart/form-data" action="<?php echo WWW_PATH_ADMIN_2."index.php?src=multylanguage&action=update-all";?>" method="POST">
         <!-- prava strana-->
         <div class="col-md-12">
            <div class="col">
               <!-- tabs begin here! -->
               <div class="tab-content" style="border: 0px solid; padding: 0px;">
                  <?php
				  
				  foreach(MultyLanguage::getTranslates() as $item) {
				  if(in_array($item['lang_id'], $langs)){
					  ?>
					<div class="row" style="border-bottom:1px solid #cccccc;padding-top:15px;">
					   <div class="form-group">
						  <label class="col-sm-4 control-label">
							 <p class="lead dnt_bold">
								<span class="dnt_lang" style="float: left; font-size:14px"><?php echo $item['translate_id']; ?>:</span>
								<br/><span class="dnt_lang" style="float: left; font-size:11px"><?php echo $item['translate']; ?></span>
							 </p>
						  </label>
						  <div class="col-sm-8">
							 <input type="text" value="<?php echo $item['translate']; ?>" name="translate_<?php echo $item['id_entity']; ?>" class="form-control" placeholder="">
							 <br>
						  </div>
					   </div>
					</div>
					  <?php
				  }
				  }
				  ?>
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
<?php include "plugins/webhook/bottom.php"; ?>
<?php get_bottom(); ?>