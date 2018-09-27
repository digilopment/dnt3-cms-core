<?php include "tpl_functions.php"; ?>
<?php get_top(); ?>
<?php include "top.php"; 
  $user = new User;
?>
<div class="row">
<!-- BEGIN CUSTOM TABLE -->
<div class="col-md-12">
   <div class="grid no-border">
      <div class="grid-header">
         <i class="fa fa-table"></i>
         <span class="grid-title">Používatelia</span>
         <div class="pull-right grid-tools">
            <a data-widget="collapse" title="Collapse"><i class="fa fa-chevron-up"></i></a>
            <a data-widget="reload" title="Reload"><i class="fa fa-refresh"></i></a>
            <a data-widget="remove" title="Remove"><i class="fa fa-times"></i></a>
         </div>
      </div>
	  <div class="row grid-body" style="    margin: 0px 20px;">
	  		 
		<li class="post_type">
			<a href="index.php?src=user">
				<span class="label label-primary bg-blue" style="padding: 5px;"><big>všetky</big></span>
			</a>
		</li>
	<?php foreach($user->getUserTypes() as $row){?>
		<li class="post_type">
			<a href="index.php?src=user&type=<?php echo $row['type']?>">
				<span class="label label-primary bg-blue" style="padding: 5px;"><big><?php echo $row['type']?></big></span>
			</a>
		</li>
	<?php } ?>
			</div>
		
	  
	  
	  
      <div class="grid-body">
         <table class="table table-hover">
            <thead>
               <tr>
                  <th>#</th>
                  <th>Meno, priezvisko</th>
                  <th>Email</th>
                  <th>Unique</th>
                  <th>Dátum vytvorenia</th>
                  <th>Súhlas s pravidlami</th>
                  <th>Súhlas s news</th>
                  <th>Súhlas s news 2</th>
                  <th>img</th>
                  <th>Akcia</th>
               </tr>
            </thead>
            <tbody>
               <?php
			 
			   foreach($user->getUserByType($rest->get("type")) as $row){
				   $image = $user->getImage($row['img']);
				?>
				<tr>
					<td><b><?php echo $row['id_entity'] ?></b></td>
					<td><b><?php echo $row['name']." ".$row['surname']; ?></b></td>
					<td><?php echo $row['email']; ?></td>
					<td><?php echo $row['session_id']; ?></td>
					<td><b><?php echo $row['datetime_creat']; ?></b></td>
					<td><b><?php echo $row['podmienky']; ?></b></td>
					<td><b><?php echo $row['news']; ?></b></td>
					<td><b><?php echo $row['news_2']; ?></b></td>
					<td><b><?php if($image){echo '<a href="'.$image.'" target="_blank"><i class="fa fa-picture-o bg-green action"></i>';}?></td>
					<td>
						<a href="index.php?src=user&action=edit&post_id=<?php echo $row['id_entity'] ?>"><i class="fa fa-pencil bg-blue action"></i></a>
						<a href="index.php?src=user&vymazat&post_id=<?php echo $row['id_entity'] ?>"><i class="fa fa-times bg-red action"></i></a>
					</td>
				</tr>
               <?php
                  }
                  
                  ?>									
            </tbody>
         </table>
      </div>
   </div>
</div>
<!-- END CUSTOM TABLE -->
<?php include "bottom.php"; ?>
<?php get_bottom(); ?>