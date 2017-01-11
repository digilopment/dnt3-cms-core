<?php include "tpl_functions.php"; ?>
<?php get_top(); ?>
<?php include "top.php";?>
<?php
$rest = new Rest;
$dnt  = new Dnt;
$type = $rest->get("filter");
$id   = $rest->get("id");
$page = $rest->get("page");


?>
<form enctype='multipart/form-data' action="<?php echo AdminContent::url("edit_action", $type, $id, $page) ?>" method="POST">
   <div class="row">
      <!-- lava strana-->
      <div class="col-md-4">
         <div class="col" style="text-align: left;">
            <h3>Nastavenia postu pre defaultný jazyk</h3>
            <hr/>
            <h5>Post type:<br/></h5>
            <?php 
               if(isset($_GET['upravit']) && $_GET['upravit'] == "pages-podmenu"){
               	get_typ_zaradenie_pages_podmenu($dntDb);
               	get_typ_Rs($post['typ_zaradenie'], $dntDb);
               }
               else{
               	get_typ_zaradenie($post['typ'], $dntDb);
               ?>
            <input type="hidden" name="typ_zaradenie" value="<?php echo $post['typ_zaradenie'];?>" />
            <?php
               }
               ?>
            <br/>
            <?php /*  
               <h5>Zadajte názov:<br/></h5>
               <input type="text" name="nazov" class="form-control" placeholder="zadajte názov">
               <h5>Zadajte url adresu - <u>nepovinné</u>:<br/></h5>
               <input type="text" name="url_adresa" class="form-control" placeholder="url adresa (nepovinne)">
               <hr/>
               */?>
            <h5>Current image</h5>
            <img src="<?php echo setPostImage($post['url_fotka'], $post['fotka_pripona'], $post['typ'], $dntDb);?>" style="width: 100%" />
            <hr/>
            <?php /*
               <h5>Externý odkaz - <u>nepovinné</u>:<br/></h5>
                        <input type="text" name="hyperlink" class="form-control" placeholder="externý hyperlink: http://">
                        */?>
            <h5><b>Date:</b> dd.mm.rrrr<br/></h5>
            <table style="width: 100%;">
               <tr>
                  <td>
                     <select name="datum_den" id="cname" class="form-control" style="">>
                     <?php get_cisla($post['datum_den'], 31); ?>
                     </select>
                  </td>
                  <td>
                     <select name="datum_mesiac" id="cname" class="form-control" style="">>
                     <?php get_cisla($post['datum_mesiac'], 12); ?>
                     </select>
                  </td>
                  <td>
                     <select name="datum_rok" id="cname" class="form-control" style="">>
                     <?php get_cisla_limit($post['datum_rok'], 1900, 2100); ?>
                     </select>
               </tr>
            </table>
            <h5>Post showing:<br/></h5>
            <select name="zobrazenie" id="cname" class="form-control" minlength="2" required style="">>
            <?php getZobrazenie($post['zobrazenie'], $dntDb);?>
            </select>
         </div>
      </div>
      <!-- prava strana-->
      <div class="col-md-8">
         <div class="col">
            <!-- tabs begin here! -->
            <?php navBarLang($dntDb) ;?>
            <div class="tab-content" style="border: 0px solid; padding: 0px;">
               <div class="tab-pane active" id="home-lang">
                  <p class="lead dnt_bold">
                     <span class="dnt_lang">Default lang</span>
                  </p>
                  <br/>
                  <div class="row">
                     <div class="form-group">
                        <div class="form-group">
                           <label class="col-sm-3 control-label"><b>Post Name:</b></label>
                           <div class="col-sm-9">
                              <input type="text" name="nazov" value="<?php echo $post['nazov'];?>" class="form-control" placeholder="Názov:">
                              <br/>
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="col-sm-3 control-label"><b>URL Address:</b></label>
                           <div class="col-sm-9">
                              <?php 
                                 if($post['chranene'] == 1){
                                 ?>
                              <input type="text"  value="<?php echo $post['url'];?>" name="url" class="form-control" placeholder="Url:" disabled>
                              <?php
                                 }else{?>	
                              <input type="text"  value="<?php echo $post['url'];?>" name="url" class="form-control" placeholder="Url:">
                              <?php } ?>
                              <br/>
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="col-sm-3 control-label"><b>Prílohy:</b></label>
                           <div class="col-sm-9">
                              <input type="text" name="perex" value="<?php echo $post['prilohy'];?>" class="form-control" placeholder="Prílohy:">
                              <br/>
                           </div>
                        </div>
                        <div id="click2edit" style="min-height: 495px;" >
                           <iframe src="<?php echo getMyServerRs($dntDb)."includes/signle-file-upload.php";?>"  scrolling="yes" frameBorder="0" id="info" class="iframe" name="info" width="1000px" height="30px" seamless=""></iframe>
                           <div style="text-align: left;">
                              <h3>Tags</h3>
                           </div>
                           <input type="text" name="tags" value="<?php echo showTagName($post['tags']);?>" class="form-control" placeholder="Tags">
                           <div style="text-align: left;">
                              <h3>Perex</h3>
                           </div>
                           <textarea name="perex" class="ckeditor" id="" style="width: 100%; min-height: 200px;"><?php echo $post['perex'];?></textarea>
                           <div style="text-align: left;">
                              <h3>Content</h3>
                           </div>
                           <textarea name="obsah" class="ckeditor" id="editor7" style="min-height: 495px;"><?php echo $post['obsah'];?></textarea>
                        </div>
                        <br/>
                     </div>
                  </div>
                  <br/>
               </div>
               <?php getTabLanguages(true, true, true, $post['id'], "dnt_posts", $dntDb);?>
               <input type="hidden" name="kat" value="<?php echo $post['typ'];?>" />
            </div>
            <!-- end here -->
            <input type="hidden" name="povodna_kat1" value="<?php echo $post['kat1'];?>" />
            <input type="hidden" name="povodna_kat2" value="<?php echo $post['kat2'];?>" />
            <input type="hidden" name="povodna_kat3" value="<?php echo $post['kat3'];?>" />
            <input type="submit" name="odoslat" class="btn btn-primary btn-lg btn-block" value="Upraviť" />
         </div>
      </div>
      <!-- end prava strana -->
   </div>
</form>
<?php include "bottom.php"; ?>
<?php get_bottom(); ?>