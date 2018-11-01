<?php include "tpl_functions.php"; ?>
<?php get_top(); ?>
<?php include "top.php";?>
<?php


?>
<section class="content">
   <div class="row">
   <div class="row" style="background-color: #fff;padding: 5px;margin: 0px;">
      <label class="col-sm-2 control-label"><b>Názov vstupu</b></label>
      <label class="col-sm-1 control-label"><b>Zobraziť na webe?</b></label>
      <label class="col-sm-1 control-label"><b>Nastavenie hodnoty</b></label>
   </div>
   <div class="row">
   <?php 
		$actionUrl = "index.php?src=content&included=".$rest->get("services")."&filter=".$rest->get("filter")."&post_id=".$postId."&services=".$rest->get("services")."&action=update";
	?>
   <form enctype='multipart/form-data'action="<?php echo $actionUrl; ?>" method="POST">
         <div class="col-md-12">
            <ul class="nav nav-tabs">
               <li class="active"><a href="#sutaz" data-toggle="tab"><?php echo $serviceName; ?></a></li>
            </ul>
            <div class=" tab-content">
               <!-- base settings -->
               <div class="tab-pane active" id="sutaz">
                  <?php
                     foreach($article->getPostsMeta($postId, $rest->get("services")) as $row){
                     ?>
                  <div class="row form">
                     <label class="col-sm-2 control-label"><b><?php echo $row['description'] ?></b></label>
                     <label class="col-sm-2 control-label">
                     <?php Dnt::setMetaStatus($row['show'], $row['id_entity']); ?>
                     </label>
                     <div class="col-sm-8 text-left">
					 <?php if($row['content_type'] == "image"){ ?>
								<input name="userfile_<?php echo $row['id_entity']; ?>[]" multiple="multipl" type="file" class="form-control">
								<?php galleryChooser($row['id_entity']); ?>
								<?php 
								$image = new Image;
								foreach($image->getFileImages($row['value']) as $image){
									echo '<img src="'.$image.'" style="height: 55px; margin-left:0px; margin:10px;">';
								}
							}elseif($row['content_type'] == "file"){ ?>
								<input name="userfile_<?php echo $row['id_entity']; ?>[]" multiple="multipl" type="file" class="form-control">
								<?php 
								$image = new Image;
								foreach($image->getFileImages($row['value']) as $file){
									echo  "<a target='_blank' href='".$file."'>".$file."</a><br/>";
								}
							}
							elseif($row['content_type'] == "content"){ ?>
								<textarea name="key_<?php echo $row['id_entity'] ?>" class="ckeditor" style="min-height: 195px;"><?php echo $row['value'] ?></textarea>
								<?php
							}else{ ?>
						<input type="text" name="key_<?php echo $row['id_entity'] ?>" value='<?php echo $row['value'] ?>' class="form-control" placeholder="">
					   <?php } ?>
					</div>
                  </div>
				  
                  <br/>
                  <?php
                     }
                     ?>
					 <input type="hidden" name="return" value="<?php echo WWW_FULL_PATH; ?>">
					 <input type="submit" name="sent" class="btn btn-primary btn-lg btn-block" value="Upraviť">
               </div>
            </div>
         </div>
      </form>
   </div>
</section>
		
<?php include "bottom.php"; ?>
<?php get_bottom(); ?>