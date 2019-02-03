<?php include "tpl_functions.php"; ?>
<?php get_top(); ?>
<?php include "top.php";?>
<?php 
	$db 	= new Db;
	$rest 	= new Rest;
	$image 	= new Image;
?>
<!-- BEGIN CUSTOM TABLE -->
<section class="row content-header">

	<ul>
		<li class="post_type" style="text-decoration: underline">
			<form enctype='multipart/form-data' action="index.php?src=vouchers&action=add" method="POST" style="    display: flex;">
				<input name="userfile[]" multiple="multipl" type="file" class="form-control">
				<input type="submit" name="sent" value="Upload">
			</form>
		</li>
		<li class="post_type" style="display:block;margin-top: 7px;">
			<span class="bg-blue action text-center padding"><a href="#" style="color:#fff;" data-toggle="modal" data-target="#addVoucherManualy"><b>Pridať ručne</b></a></span>
		</li>
		<li class="post_type" style="display:block;margin-top: 7px;">
			<span class="bg-red action text-center padding"><a <?php echo Dnt::confirmMsg("Naozaj chcete vymazať všetky vouchre, ktoré nie sú priradené používateľovi?"); ?> style="color:#fff;" href="index.php?src=vouchers&post_id=0&action=del-all"><b>Zmazať všetky</b></a></span>
		</li>
	</ul>
	
<!-- START MODAL -->								
<div class="modal fade" id="addVoucherManualy" tabindex="-1" role="dialog" aria-labelledby="myModalLabel8" aria-hidden="true">
   <div class="modal-wrapper">
      <div class="modal-dialog">
         <form action="index.php?src=vouchers&action=add-manualy" method="POST">
            <div class="modal-content">
               <div class="col-md-12">
                  <div class="modal-header bg-blue">
                     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                     <h4 class="modal-title" id="myModalLabel8">Pridať Voucher ručne &nbsp;</h4>
                  </div>
                  <div class="col">
                     <div class="row tab-content" style="border: 0px solid; padding: 0px;">
                       <div class="form-group">
						   <label class="col-sm-3 control-label"><b>Kód voucheru:</b></label>
						   <div class="col-sm-9">
							  <input type="text" value="" name="voucher" class="form-control" placeholder="Kód voucheru:">
							  <br>
						   </div>
						</div>
                     </div>
						<input type="submit" name="sent" class="btn btn-primary btn-lg btn-block" value="Pridať voucher" />
                  </div>
               </div>
            </div>
         </form>
      </div>
   </div>
</div>
<!-- END MODAL -->
	
</section>
<div style="clear: both;"></div>

<div class="col-md-12">
   <div class="grid no-border">
      <div class="grid-header">
         <i class="fa fa-table"></i>
         <span class="grid-title">Zoznam kupónov</span>
      </div>
      <form action="index.php?src=files&action=del" method="POST">
      <div class="grid-body">
         <table class="table table-hover">
            <thead>
               <tr>
                  <th>#</th>
                  <th>post ID</th>
                  <th>User ID</th>
                  <th>Kupon ID</th>
                  <th>File Import</th>
                  <th>Datetime Import<br>Datetime Use</th>
                  <th>Vymazať</th>
                  <th>Status</th>
               </tr>
            </thead>
            <tbody>
               <?php
                  $query = "SELECT * FROM dnt_vouchers order by `order`";
                  if($db->num_rows($query)>0){
                  	foreach($db->get_results($query) as $row){
						$postId 	= $row['id_entity'];
						$order 		= $row['order'];
						$userId 	= $row['user_id'];
						$value 		= $row['value'];
						$fileName 	= $row['file_name'];
						$imported 	= $row['datetime_creat'];
						$used 		= $row['datetime_update'];
						$delUrl		= "index.php?src=vouchers&post_id=".$postId."&action=del";
						$userUrl	= "index.php?src=user&action=edit&post_id=$userId";
                  ?>
				   <tr>
					  <td><?php echo $order; ?></td>
					  <td><?php echo $postId ?></td>
					  <td><?php if($userId){echo '<a href="'.$userUrl.'"><u>'.$userId.'</u></a>';}else{echo $userId;} ?></td>
					  <td><?php echo $value ?></td>
					  <td><a href="../dnt-view/data/uploads/<?php echo $fileName ?>"><?php echo $fileName ?></a></td>
					  <td><?php echo $imported ?><br/><b><?php echo $used ?></b></td>
					  <td><a <?php echo Dnt::confirmMsg("Naozaj chcete vymazať tento voucher?"); ?> href="<?php echo $delUrl ?>"><i class="fa fa-times bg-red action"></i></a></td>
					  <td>
						<?php if($userId){?>
							<i title="Voucher je priradený" class="fa fa-check bg-green action"></i></td>
						<?php }else{?>
							<i title="Voucher čaká na priradenie" class="fa fa-times bg-blue action"></i>
						<?php }?>
					</td>
				   </tr>
				   <thead>
 
            </thead>
               <?php
                  }
			  }
			  else{
				no_results();
			  }
			  ?>			  
            </tbody>
         </table>
      </div>
      </form>
   </div>
</div>

<?php /*echo Xlsx::read("../", "39_b50072fbe38c292d4f0cfdf59246fcaa_o.csv")*/ ?>
<!-- BEGIN PAGINATION -->
<!-- END CUSTOM TABLE -->
<?php include "bottom.php"; ?>
<?php get_bottom(); ?>