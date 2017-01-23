<?php include "tpl_functions.php"; ?>
<?php get_top(); ?>
<?php include "top.php"; ?>
<section class="content">
      <!-- BEGIN LEFT TABS -->
      <div class="row">
         <div class="col-md-10">
            <div class="col">
               <div class="row form-group text-left ">
                  <div class="col-sm-8">
                     <h3>Po zadaní názvu vytvoríte novú anketu, ktorú v ďalšom kroku prispôsobíte.</h3>
                     <br>
                  </div>
               </div>
               <form enctype="multipart/form-data" action="index.php?src=polls&action=add_poll_action" method="POST">
                  <div class="row form-group ">
                     <label class="col-sm-2 control-label"><b>Názov ankety</b></label>
                     <div class="col-sm-6">
                        <input type="text" name="name" value="" class="form-control" placeholder="Názov ankety">
                        <br>
                     </div>
                  </div>
				   <div class="row form-group ">
                     <label class="col-sm-2 control-label"><b>Typ ankety</b></label>
                     <div class="col-sm-6">
                        <select class="form-control" name="poll_type" style="">
                           <?php Polls::currentType(Polls::getParam("type", $poll_id));?>
                           </select>
                        <br>
                     </div>
                  </div>
                  <div class="row form-group ">
                     <label class="col-sm-2 control-label"><b>Vztvoriť kópiu už z existujúcej ankety:</b></label>
                     <div class="col-sm-6">
                        <select class="form-control" name="poll_id">
                           <option value="0">(nekopírovať, ale použiť základné nastavenie ankety)</option>
						   <?php 
						   $query = Polls::getPollsAdmin();
						   if($db->num_rows($query)>0){
							 foreach($db->get_results($query) as $row){
								 echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
							 }
						   }
						   ?>
                        </select>
                        <br>
                     </div>
                  </div>
                  <div class="row form-group">
                     <label class="col-sm-2 control-label"><b>&nbsp;</b></label>
                     <div class="col-sm-6">
                        <input type="submit" name="odoslat" class="btn btn-primary btn-lg btn-block" value="Vytvoriť novú anketu">
                        <br>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
</section>
<!-- END CUSTOM TABLE -->
<?php include "bottom.php"; ?>
<?php get_bottom(); ?>