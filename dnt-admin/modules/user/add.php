
<?php get_top(); ?>
<?php get_top_html(); ?>
<?php 
$rest = new Rest;
$api = new Api;
$admin = new AdminUser;
$user = new User;
$post_id = $rest->get("post_id");
//var_dump($user->getColumns($query));
?>
<section class="content">
   <div class="row">
      <form enctype="multipart/form-data" action="index.php?src=user&action=add_data" method="POST">
         <!-- BEGIN SEARCH RESULT -->
         <div class="col-md-12">
            <div class="grid search">
               <div class="grid-body">
                  <div class="row">
                     <!-- BEGIN FILTERS -->
                     <input type="hidden" name="src" value="pristupy">
                     <div class="col-md-6">
                        <h2 class="grid-title"><i class="fa fa-filter"></i>Administrátor</h2>
                        <hr>
                        <!-- BEGIN FILTER BY CATEGORY -->
						<h5>Typ používateľa:</h5>
					   <div class="checkbox">
						  <select type="" name="type" class="form-control">
						  <?php 
						  foreach($user->getUserTypes() as $row){
							echo '<option value="'.$row['type'].'">'.$row['type'].'</option>';
						  }
						  ?>
						  </select>
					   </div>
						   
                        <span style="font-weight: bold;">
						<?php 
						foreach($api->getColumns($query) as $key => $value){ 
						if(
							$value != "id" &&
							$value != "id_entity" &&
							$value != "type" &&
							$value != "session_id" &&
							$value != "news" &&
							$value != "news_2" &&
							$value != "kliknute" &&
							$value != "vendor_id" &&
							$value != "datetime_creat" &&
							$value != "datetime_update" &&
							$value != "datetime_publish" &&
							$value != "podmienky" &&
							$value != "img" &&
							$value != "ip_adresa" &&
							$value != "parent_id" &&
							$value != "hladam" &&
							$value != "custom_1" &&
							$value != "status" &&
							$value != "sex" &&
							$value != "pass"
						){
						?>
                           <h5><?php echo $value; ?>:</h5>
                           <div class="checkbox">
                              <input type="text" name="<?php echo $value; ?>" value="" class="form-control">
                           </div>
						<?php } ?>  
						<?php } ?>
						<br/>						
						
                        </span>
                     </div>
                     <!-- END FILTERS -->
                     <div class="col-md-6">
                        <h2><i class="fa fa-file-o"></i> Fotografia</h2>
                        <hr>
                        <p class="lead">Vyberte si jedinečnú <b>fotografiu</b></p>
                        <p>Ak máte eshop a vystavíte faktúru, vaše meno tam bude predvyplnené</p>
                        <img src="<?php echo AdminUser::avatarById($post_id);?>" style="max-width: 200px; margin: 15px;" alt="">
                        <input type="file" name="userfile" class="btn-default btn-lg btn-block">
                        <div class="padding"></div>
                        <div class="checkbox">
							<?php echo Dnt::returnInput();?>
							 <input type="submit" name="sent" value="Uložiť" class="btn btn-primary" style="width: 40%;">
                        </div>
                     </div>
                     <!-- END TABLE RESULT -->
                  </div>
               </div>
            </div>
         </div>
         <!-- END SEARCH RESULT -->
      </form>
   </div>
</section>

<?php get_bottom_html(); ?>
<?php get_bottom(); ?>