<?php include "tpl_functions.php"; ?>
<?php get_top(); ?>
<?php include "top.php"; ?>
<?php 
$rest = new Rest;
$user = new User;

$id_entity = $rest->get("post_id");
foreach($user->getUser($id_entity) as $row){

	$img = $user->getImage($row['img']);
?>
<div class="col-md-12">
<div class="grid search">
   <div class="grid-body">
      <div class="row">
         <form enctype='multipart/form-data' action="<?php echo "index.php?src=user&action=update&post_id=".$id_entity.""; ?>" method="POST">
            <!-- BEGIN FILTERS -->
            <div class="row">
			
               <div class="col-md-4">
                  <h2 class="grid-title"><i class="fa fa-filter"></i>Základné údaje</h2>
                  <hr/>
                  <!-- BEGIN FILTER BY CATEGORY -->
                  <span style="font-weight: bold;">
                     <h5>Meno (Názov spoločnosti):</h5>
                     <div class="checkbox">
                        <input type="text" name="name" value="<?php echo $row['name']; ?>" class="form-control">
                     </div>
                     <h5>Priezvisko:</h5>
                     <div class="checkbox">
                        <input type="text" name="surname" value="<?php echo $row['surname']; ?>" class="form-control">
                     </div>
					 
					 <h5>Login:</h5>
                     <div class="checkbox">
                        <input type="text" name="login" value="<?php echo $row['login']; ?>" class="form-control">
                     </div>
					 
					 <h5>Email:</h5>
                     <div class="checkbox">
                        <input type="email" name="email" value="<?php echo $row['email']; ?>" class="form-control">
                     </div>
					 <h5>Tel.č:</h5>
                     <div class="checkbox">
                        <input type="text" name="tel_c" value="<?php echo $row['tel_c']; ?>" class="form-control">
                     </div>
					 
                     <h5>Ulica:</h5>
                     <div class="checkbox">
                        <input type="text" name="ulica" value="<?php echo $row['ulica']; ?>" class="form-control">
                     </div>
                     <h5>č. domu:</h5>
                     <div class="checkbox">
                        <input type="number" name="c_domu" value="<?php echo $row['c_domu']; ?>" class="form-control">
                     </div>
                     <h5>Psč:</h5>
                     <div class="checkbox">
                        <input type="number" name="psc" value="<?php echo $row['psc']; ?>" class="form-control">
                     </div>
                     <h5>Mesto:</h5>
                     <input type="text" name="mesto" value="<?php echo $row['mesto']; ?>" class="form-control">
                     <h5>Krajina:</h5>
                     <div class="checkbox">
                        <input type="text" name="krajina" value="<?php echo $row['krajina']; ?>" class="form-control">
                     </div>
					 
                  </span>
               </div>
               <div class="col-md-4">
                  <h2><i class="fa fa-file-o"></i> Dalšie údaje</h2>
                  <hr>
                  <h5>Typ používateľa:</h5>
                  <div class="checkbox">
                     <select class="form-control" name="type" />
                     <?php 
					foreach($user->getUserTypes() as $user){
						 if($user['type'] == $row['type']){
							 echo '<option selected value="'.$user['type'].'">'.$user['type'].'</option>"';
						 }else{
							  echo '<option value="'.$user['type'].'">'.$user['type'].'</option>"';
						 }
					 }
					 ?>
                     </select>
                  </div>
                  <h5>Dátum:</h5>
                 <div class="input-group date" id="datetimepicker1">
					<input type="text" name="datetime_publish" class="form-control">
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-calendar"></span>
					</span>
				</div>
				<?php
					$datetime_publish = $row['datetime_publish'];
					 if($datetime_publish == "0000-00-00 00:00:00"){
					   $datetime_publish = Dnt::datetime();
					 }
				?>
				<script type="text/javascript">
					$(function () {
						$('#datetimepicker1').datetimepicker({
							defaultDate: "<?php echo $datetime_publish; ?>",
							locale: 'sk'
						});
					});
				</script>

							
                  <h5>Pohlavie:</h5>
                  <div class="checkbox">
                     <select class="form-control" name="sex" style=""/>
                     <?php 
						if($row['sex'] == 1){
							 echo '<option selected value="1">muž</option>"';
							 echo '<option value="2">žena</option>"';
						}else{
							echo '<option selected value="2">žena</option>"';
							echo '<option value="1">muž</option>"';
						}
					 ?>
                     </select>
                  </div>
                  <h5>Výška:</h5>
                  <div class="checkbox">
                     <input type="number" name="vyska" value="<?php echo $row['vyska']; ?>" class="form-control">
                  </div>
                  <h5>Váha:</h5>
                  <div class="checkbox">
                     <input type="number" name="vaha" value="<?php echo $row['vaha']; ?>" class="form-control">
                  </div>
                  <h5>Info:</h5>
				  <br/><small>Ak sa jedná o url adresy, pridávajte ich pod seba. Automaticky sa zobrazia v novom odkaze.</small>
                  <div class="checkbox">
                     <textarea name="content" style="width: 100%; height: 100px;"><?php echo $row['content']; ?></textarea>
                  </div>
               </div>
               <div class="col-md-4">
                  <h2><i class="fa fa-file-o"></i> Ostatné</h2>
                  <hr>
                  <h5>Fotka:</h5>
                  <img class="img-responsive" src="<?php echo $img;?>" alt="" />
				  <input name="userfile" type="file" class="form-control">
				  <?php echo Dnt::returnInput();?>
				   <br/><br/>

                  
               </div>
			 </div>
			 <div class="row">
			 <br/>
			   <div class="col-md-4">
				<input type="submit" name="sent" class="btn btn-primary btn-lg btn-block" value="Upraviť údaje" />
			   </div>
			 </div>
         </form>
         <!-- END RESULT -->
         </div>
      </div>
   </div>
</div>

<?php } ?>
<?php include "bottom.php"; ?>
<?php get_bottom(); ?>