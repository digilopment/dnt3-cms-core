<?php include "tpl_functions.php"; ?>
<?php get_top(); ?>
<?php include "top.php"; ?>
<div class="row">
<!-- BEGIN CUSTOM TABLE -->
<div class="col-md-12">
   <div class="grid no-border">
      <div class="grid-header">
         <i class="fa fa-table"></i>
         <span class="grid-title">Prístupy</span>
         <div class="pull-right grid-tools">
            <a data-widget="collapse" title="Collapse"><i class="fa fa-chevron-up"></i></a>
            <a data-widget="reload" title="Reload"><i class="fa fa-refresh"></i></a>
            <a data-widget="remove" title="Remove"><i class="fa fa-times"></i></a>
         </div>
      </div>
      <div class="grid-body">
         <table class="table table-hover">
            <thead>
               <tr>
                  <th>#</th>
                  <th>Login</th>
                  <th>Meno, priezvisko</th>
                  <th>Email</th>
                  <th>Stav konta</th>
                  <th>Akcia</th>
               </tr>
            </thead>
            <tbody>
               <?php
                  $query = "SELECT * FROM `dnt_users` 
                   WHERE `status` = '1' AND
                   vendor_id = '".Vendor::getId()."'";
                   $pocet_aktivne = $db->num_rows($query);
                  
                   
                   //$query = dnt_query("SELECT * FROM obchod_objednavky WHERE  parent_id = '0' $typ ORDER BY poradie", $dntDb);
                   $query = "SELECT * FROM `dnt_users` WHERE 
                   parent_id = '0' AND
                   type = 'admin' AND
                   vendor_id = '".Vendor::getId()."' ORDER BY id desc"; 
                    if($db->num_rows($query)>0){
                   	foreach($db->get_results($query) as $row){
                   ?>
               <tr>
                  <td><?php echo $row['id']; ?></td>
                  <td><?php echo $row['login']; ?></td>
                  <td><b><?php echo $row['name']." ".$row['surname']; ?></b></td>
                  <td>
                     <span class="">
                     <?php echo $row['email']; ?>
                     </span>
                  </td>
                  <td>
                     <?php
                        if (($pocet_aktivne > 1) || ($row['status'] == 0)){
                        ?>
                     <a href="<?php echo WWW_PATH_ADMIN."index.php?src=".$rest->get('src')."&nastav_zobrazenie=".$row['status']."&id=".$row['id']; ?>">
                     <i class="<?php echo admin_zobrazenie_stav($row['status']);?>"></i>
                     </a>
                     <?php
                        }
                        else{
                        	echo '<a href="#" title="PAP - Posledný Aktívny Prístup (Toto je posledný aktívny prístup a tento prístup nie je možné deaktivovať)"><i class="fa fa-minus-square bg-green action"></i></a>';
                        	}
                        	?>
                  </td>
                  <td>
                     <a href="<?php echo WWW_PATH_ADMIN."index.php?src=".$rest->get('src')."&upravit&id=".$row['id']; ?>"><i class="fa fa-pencil bg-blue action"></i></a>
                     <?php
                        if (($pocet_aktivne > 1) || ($row['status'] == 0)){
                        ?>
                     <a href="<?php echo WWW_PATH_ADMIN."index.php?src=".$rest->get('src')."&vymazat&id=".$row['id']; ?>"><i class="fa fa-times bg-red action"></i></a>
                     <?php
                        }
                        else{
                        	echo '<a href="#" title="PAP - Posledný Aktívny Prístup (Toto je posledný aktívny prístup a tento prístup nie je možné deaktivovať)"><i class="fa fa-minus-square bg-green action"></i></a>';
                        	}
                        	?>
                  </td>
               </tr>
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
   </div>
</div>
<!-- END CUSTOM TABLE -->
<?php include "bottom.php"; ?>
<?php get_bottom(); ?>