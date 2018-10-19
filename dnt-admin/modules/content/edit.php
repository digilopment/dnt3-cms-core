<?php include "tpl_functions.php"; ?>
<?php get_top(); ?>
<?php include "top.php";?>
<?php
   $rest 		= new Rest;
   $webhook 	= new Webhook;
   $dnt  		= new Dnt;
   $post_id   		= $rest->get("post_id");
   $page 			= $rest->get("page");
   
   $cat_id 			= AdminContent::getPostParam("cat_id", $post_id);
   $sub_cat_id 		= AdminContent::getPostParam("sub_cat_id", $post_id);
   $type 			= AdminContent::getPostParam("type", $post_id);
   $show 			= AdminContent::getPostParam("show", $post_id);
   $protected 		= AdminContent::getPostParam("protected", $post_id);
   $name 			= AdminContent::getPostParam("name", $post_id);
   $name_url 		= AdminContent::getPostParam("name_url", $post_id);
   $datetime_creat 	= AdminContent::getPostParam("datetime_creat", $post_id);
   $datetime_update = AdminContent::getPostParam("datetime_update", $post_id);
   $datetime_publish= AdminContent::getPostParam("datetime_publish", $post_id);
   $perex 			= AdminContent::getPostParam("perex", $post_id);
   $content 		= AdminContent::getPostParam("content", $post_id);
   $embed 			= AdminContent::getPostParam("embed", $post_id);
   $tags 			= AdminContent::getPostParam("tags", $post_id);
   $service 		= AdminContent::getPostParam("service", $post_id);
   $service_id 		= AdminContent::getPostParam("service_id", $post_id);
   
   //osetrenie vstupov
   if($datetime_publish == "0000-00-00 00:00:00"){
	   $datetime_publish = Dnt::datetime();
   }
?>
   
  		
<section class="content">
   <div class="row">
      <!-- BEGIN LEFT TABS -->
      <div style="clear: both;"></div>
      <form enctype='multipart/form-data' action="<?php echo AdminContent::url("edit_action", $cat_id, $sub_cat_id, $type, $post_id, $page) ?>" method="POST">
         <div class="row">
            <!-- lava strana-->
            <div class="col-md-4">
               <div class="col" style="text-align: left;">
                  <h3>Nastavenia postu pre defaultný jazyk</h3>
                  <hr/>
                  <?php get_typ_zaradenie($cat_id, $sub_cat_id, $type); ?>
				  <div class="row">
				  <div class="col-xs-8">
				  	<h5>Typ služby:<br/></h5>
					<select name="service" id="service" class="form-control">
						<?php 
						echo '<option value="">Default</option>';
						foreach($webhook->services() as $key => $serviceIndex){
							if($key == $service){
								echo '<option selected value="'.$key.'">'.$serviceIndex['service_name'].'</option>';
							}else{
								echo '<option value="'.$key.'">'.$serviceIndex['service_name'].'</option>';
					
							}
						}
						?>
					</select>
					</div>
					 <div class="col-xs-4">
					
					<h5>Id kategórie:<br/></h5>
					<input type='text' name="service_id" value="<?php echo  $service_id; ?>" class="form-control" />
					</div>
				</div>
                  <br/>
				  <?php galleryChooser($post_id); ?>
				  <input name="userfile" type="file" class="form-control">
				  <br/>
				  <br/>
                  <h5>Current image</h5>
                  <img src="<?php echo Image::getPostImage($post_id);?>" style="width: 100%" />
                  <hr/>
                  <?php /*
                     <h5>Externý odkaz - <u>nepovinné</u>:<br/></h5>
                              <input cat_id="text" name="hyperlink" class="form-control" placeholder="externý hyperlink: http://">
                              */?>
                  <h5><b>Date:</b> dd.mm.rrrr<br/></h5>
                  <table style="width: 100%;">
                     <tr>
                        <td>
							<div class="form-group">
								<div class='input-group date' id='datetimepicker1'>
									<input type='text' name="datetime_publish" class="form-control" />
									<span class="input-group-addon">
										<span class="glyphicon glyphicon-calendar"></span>
									</span>
								</div>
							</div>
							<script type="text/javascript">
								$(function () {
									$('#datetimepicker1').datetimepicker({
										defaultDate: "<?php echo $datetime_publish; ?>",
										locale: 'sk'
									});
								});
							</script>
                        </td>
                     </tr>
                  </table>
                  <h5>Vykonať akciu:<br/></h5>
                  <select name="show" id="cname" class="form-control" minlength="2" required style="">
                  <?php getZobrazenie($show);?>
                  </select>
				  				  <br/>
				  <a href="index.php?src=pdfgen&post_id=<?php echo $post_id; ?>" target="_blank">
					<span class="btn btn-primary bg-orange btn-lg btn-block">Exportovať Content do PDF</span>
				</a>
               </div>
            </div>
            <!-- prava strana-->
            <div class="col-md-8">
               <div class="col">
			   
			   
				<?php echo getLangNavigation(); ?>
   
                  <!-- tabs begin here! -->
                  <?php /*navBarLang($dntDb);*/?>
                  <div class="tab-content" style="border: 0px solid; padding: 0px;">
                     <div class="tab-pane active" id="home-lang">
                        <p class="lead dnt_bold">
                           <span class="dnt_lang">Default lang</span>
                        </p>
                        <br/>
                        <div class="row">
                           <div class="form-group">
                              <div class="form-group">
                                 <label class="col-sm-2 control-label text-left"><b>Post Name:</b></label>
                                 <div class="col-sm-10">
                                    <input type="text" name="name" value="<?php echo $name;?>" class="form-control" placeholder="Názov:" minlength="2" required >
                                    <br/>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label class="col-sm-2 control-label text-left"><b>URL Address:</b></label>
                                 <div class="col-sm-10">
                                    <input type="text"  value="<?php echo $name_url;?>" name="name_url" class="form-control" placeholder="Url:" <?php if($protected == 1)echo 'disabled';?>>
                                    <br/>
                                 </div>
                              </div>
                             
								 <div style="text-align: left;">
                                    <h3>Prílohy</h3>
									 <input type="text" name="embed" value="<?php echo $embed;?>" class="form-control" placeholder="Prílohy:">
                                     </div>
                                 <div style="text-align: left;">
                                    <h3>Tags</h3>
									<input type="text" name="tags" value="<?php echo AdminContent::showTagName($tags);?>" class="form-control" placeholder="Tags">
                                 </div>
								 
								<div id="click2edit" style="min-height: 495px;" >
                                 <div style="text-align: left;">
                                    <h3>Perex</h3>
                                 </div>
                                 <textarea name="perex" class="ckeditor" style="width: 100%; min-height: 200px;"><?php echo $perex;?></textarea>
                                 <div style="text-align: left;">
                                    <h3>Content</h3>
                                 </div>
                                 <textarea name="content" class="ckeditor" style="min-height: 495px;"><?php echo $content;?></textarea>
                              </div>
                              <br/>
                           </div>
                        </div>
                        <br/>
                     </div>
					 
                     <?php contentLanguagesVariations(); /*getTabLanguages(true, true, true, $post['id'], "dnt_posts", $dntDb);*/?>
                  </div>
                  <!-- end here -->
				  <?php echo Dnt::returnInput();?>
                  <input type="submit" name="sent" class="btn btn-primary btn-lg btn-block" value="Upraviť" />

               </div>
			   
            </div>
            <!-- end prava strana -->
         </div>
      </form>
   </div>
</section>
<?php include "bottom.php"; ?>
<?php get_bottom(); ?>