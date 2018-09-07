<?php include "tpl_functions.php"; ?>
<?php get_top(); ?>
<?php include "top.php"; ?>
<?php 
$rest = new Rest;
$user = new Api;
$vendor = new Vendor;
$post_id = $rest->get("post_id");
$query = "SELECT * FROM dnt_users";
//var_dump($user->getColumns($query));
?>

<div class="row">
   <div class="col-md-10">
      <div class="col">
         <div class="row form-group text-left ">
            <div class="col-sm-8">
               <h3>Po zadaní názvu vytvoríte novú súťaž, ktorú v ďalšom kroku prispôsobíte.</h3>
               <br>
            </div>
         </div>
         <form enctype='multipart/form-data' action="index.php?src=vendor&action=add_data" method="POST">
            <div class="row form-group ">
               <label class="col-sm-2 control-label"><b>Názov súťaže</b></label>
               <div class="col-sm-6">
                  <input type="text" name="name" value="" class="form-control" placeholder="názov">
                  <br>
               </div>
            </div>
            <div class="row form-group ">
               <label class="col-sm-2 control-label"><b>Layout:</b></label>
               <div class="col-sm-6"><select class="form-control" name="layout">
                  <?php 
                     foreach($vendor->getlayouts() as $layout){
                     	echo '<option value="'.$layout.'">'.$layout.'</option>';
                     }
                     	?>
                  </select>
                  <br>
               </div>
            </div>
            <div class="row form-group ">
               <label class="col-sm-2 control-label"><b>Vytvoriť kópiu súťaže:</b></label>
               <div class="col-sm-6"><select class="form-control" name="vendor_id">
                  <?php 
                     foreach($vendor->getAll() as $row){
                     	echo '<option value="'.$row['id'].'">'.$row['id'].' - '.$row['name'].' / '.$row['real_url'].'</option>';
                     }
                     	?>
                  </select>
                  <br>
               </div>
            </div>
            <div class="row form-group">
               <label class="col-sm-2 control-label"><b>&nbsp;</b></label>
               <div class="col-sm-6">
                  <input type="submit" name="odoslat" class="btn btn-primary btn-lg btn-block" value="Vytvoriť novú súťaž" />
                  <br>
               </div>
            </div>
         </form>
      </div>
   </div>
</div>

<?php include "bottom.php"; ?>
<?php get_bottom(); ?>