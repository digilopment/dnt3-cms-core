<?php include "tpl_functions.php"; ?>
<?php get_top(); ?>
<?php include "top.php";?>

<section class="content">
   <div class="row">
   <div class="row" style="background-color: #fff;padding: 5px;margin: 0px;">
      <label class="col-sm-2 control-label"><b>Názov vstupu</b></label>
      <label class="col-sm-1 control-label"><b>Zobraziť na webe?</b></label>
      <label class="col-sm-1 control-label"><b>Nastavenie hodnoty</b></label>
   </div>
   <div class="row">
      <form enctype='multipart/form-data' action="" method="POST">
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
                     <?php Dnt::setMetaStatus($row['show'], $row['key']); ?>
                     </label>
                     <div class="col-sm-8 text-left">
                        <?php if(strpos($row['key'], "avico") >0){ ?>
                        <img class="img-thumb" src="" alt="" />
                        <iframe src=""  scrolling="yes" frameBorder="0" id="info" class="iframe" name="info" width="1000px" height="30px" seamless=""></iframe>	
                        <?php } elseif(strpos($row['key'], "ayou") >0){ ?>
                        <?php getCompetitionLayout($row['value']); ?>
                        <?php } elseif(strpos($row['key'], "language") >0){ ?>
                        <?php getCompetitionLanguage($row['value']); ?>
                        <?php } elseif(strpos($row['key'], "font") >0){ ?>
                        <?php getCompetitionFont($row['value']); ?>
                        <?php } else { ?>
                        <input type="text" name="<?php echo $row['key'] ?>" value='<?php echo $row['value'] ?>' class="form-control" placeholder="">
                        <?php } ?>
                     </div>
                  </div>
                  <br/>
                  <?php
                     }
                     ?>
               </div>
            </div>
         </div>
      </form>
   </div>
</section>
		
<?php include "bottom.php"; ?>
<?php get_bottom(); ?>