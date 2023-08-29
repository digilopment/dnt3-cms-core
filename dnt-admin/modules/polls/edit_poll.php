<?php


get_top(); ?>
<?php get_top_html(); ?>
<?php
   $poll_id = $rest->get('post_id');
   $last_question_id = 1;
?>
<form enctype='multipart/form-data' action="index.php?src=polls&action=edit_poll_action&post_id=<?php echo $poll_id; ?>" method="POST" >
   <section class="content">
      <div class="col-md-12">
         <div class="grid no-border">
            <div class="grid-header">
               <span class="grid-title"> <b>Základné nastavenia</b> - <?php echo $polls->getParam('name', $poll_id);?></span>
               <div class="pull-right grid-tools">
                  <a data-widget="collapse" title="Collapse"><i class="fa fa-chevron-up"></i></a>
                  <a data-widget="reload" title="Reload"><i class="fa fa-refresh"></i></a>
                  <a data-widget="remove" title="Remove"><i class="fa fa-times"></i></a>
               </div>
            </div>
            <!--template pre zakladne nastavenie -->
            <div class="grid-body">
               <table class="table table-hover">
                  <thead>
                     <tr>
                        <th>#id</th>
                        <th>Názov ankety</th>
                        <th>Publikovať anketu?</th>
                        <th>Typ ankety</th>
                        <th>Zobrazenie na pracovnej adrese</th>
                        <th>Zobrazenie na produkcii</th>
                        <th>Obrázok</th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr>
                        <td><?php echo $polls->getParam('id', $poll_id);?></td>
                        <td style="width: 400px;">
                           <input type="text" name="poll_name" value="<?php echo $polls->getParam('name', $poll_id);?>" class="form-control" placeholder="">
                        </td>
                        <td>
                           <select class="form-control" name="poll_show" style="border: 2px #3C763D solid;width:150px">
                           <?php getZobrazenie($polls->getParam('show', $poll_id)); ?>
                           </select>
                        </td>
                        <td>
                           <select class="form-control" name="poll_type" style="border: 2px #3C763D solid;">
                           <?php $polls->currentType($polls->getParam('type', $poll_id));?>
                           </select>
                        </td>
                        <td style="text-align: center;">
                           <a href="<?php echo WWW_PATH . 'ankety/' . $polls->getParam('id', $poll_id) . '/' . $polls->getParam('name_url', $poll_id) . '' ?>" target="_blank"><i class="fa fa-arrow-right bg-blue action"></i></a>
                        </td>
                        <td style="text-align: center;">
                           <a href="<?php echo WWW_PATH . 'ankety/' . $polls->getParam('id', $poll_id) . '/' . $polls->getParam('name_url', $poll_id) . '' ?>" target="_blank"><i class="fa fa-arrow-right bg-blue action"></i></a>
                        </td>
                         <td style="width:200px">
                            
                            <img src="<?php echo $image->getPostImage($poll_id, 'dnt_polls');?>" style="max-height: 80px" />
                            <br/>
                            <br/>
                            <input type="file" name="poll_image"  class="btn-default btn-block" />
                        </td>
                     </tr>
                  </tbody>
               </table>
            </div>
            <div class="grid-body">
                <textarea name="poll_content" class="ckeditor"><?php echo $polls->getParam('content', $poll_id); ?></textarea>
            </div>
            <div class="dnt-devider"></div>
           
            <!-- nastavenie v pripade že sa ma anketa spravať ako typ 2 -->
             <?php if ($polls->getParam('type', $poll_id) == 2) {?>
            <div class="grid-header">
               <span class="grid-title"><b>Rozšírené nastavenia pre</b> Anketu s predpokladaným výsledkom kategorizácie</span>
               <br/>
               <br/>
               <span class="grid-title">Maximálny možný počet bodov k získaniu: <b><?php echo $polls->getMaxPoint($poll_id); ?></b>
               Berie sa najvyššia bodová hodnota z danej otázky .</span>
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
                        <!--<th>#id</th>-->
                        <!--<th>Názov vstupu</th>-->
                        <!--<th>Zadajte maximálny počet bodov (alebo hornú hranicu rozsahu), ktorý je potrebné získať pre dosiahnutie tejto odpovede.</th>-->
                        <th>Dolná hranica rozsahu</th>
                        <th>Horná hranica rozsahu</th>
                        <th>Výsledok</th>
                        <th>Description</th>
                        <th>Fotka</th>
                        <th>Vymazať</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                        $query = $polls->getWinningCombinationData($poll_id);
                        if ($db->num_rows($query) > 0) {
                            foreach ($db->get_results($query) as $row) {
                                $poll_name_points = $polls->inputName('points', $row['id_entity'], $row['key']);
                                $poll_name_key = $polls->inputName('key', $row['id_entity'], $row['key']);
                                $poll_name_img = $polls->inputName('img', $row['id_entity'], $row['img']);
                                $poll_name_content = $polls->inputName('content', $row['id_entity'], $row['key']);
                                $poll_min = false;
                                ?>
                     <tr>
                        <!--<td style="width:50px"><?php echo $polls->getParam('id', $poll_id);?></td>-->
                        <!--<td style="width:100px"><?php echo $row['description'];?></td>-->
                        <td style="width:50px">
                            <input type="number" name="" value="<?php echo $poll_min ;?>" class="form-control" placeholder="" disabled> - 
                        </td>
                        <td style="width:80px">
                            <input type="number" name="<?php echo $poll_name_points; ?>" value="<?php echo $row['points'];?>" class="form-control" placeholder="">
                        </td>
                        <td style="width:400px">
                            <input type="text" name="<?php echo $poll_name_key; ?>" value="<?php echo $row['value'];?>" class="form-control" placeholder="">
                        </td>
                        <td style="width:auto" colspan="">
                            <textarea name="<?php echo $poll_name_content; ?>" class="" style="min-height: 100px;width:100%"><?php echo $row['description'];?></textarea>
                        </td>
                         <td style="width:200px">
                            
                            <img src="<?php echo $image->getPostImage($row['id_entity'], 'dnt_polls_composer');?>" style="height: 80px" />
                            <br/>
                            <br/>
                            <input type="file" name="<?php echo $poll_name_img; ?>"  class="btn-default btn-block" />
                        </td>
                        <td style="text-align: right;width: 50px;">
                                <?php echo '<a ' . $dnt->confirmMsg('Naozaj chcete zmazať túto kombináciu?') . " href='index.php?src=polls&action=del_winning_combination&post_id=" . $poll_id . '&composer_id=' . $row['id_entity'] . "'>";?>
                            <i class="fa fa-times bg-red action"></i>
                            </a>
                        </td>
                        
                     </tr>
                     <!--<tr>
                     <td style="width:100%" colspan="12">
                       <textarea name="content" class="" style="min-height: 200px;"><?php echo $row['description'];?></textarea>
                      </td>
                     </tr>-->
                     
                                <?php
                            }
                        }
                        ?>
                  </tbody>
               </table>
               <div class="row form"> 
                   <label class="col-sm-3 control-label">
                    <a <?php echo $dnt->confirmMsg('Pridať ďalšiu možnosť? Pozor, ak ste vykonali nejaké zmeny, po vykonaní tejto akcie sa neuložia. Preto si prosím najprv uložte všetki zmeny.'); ?>href="index.php?src=polls&action=winning_combination&post_id=<?php echo $poll_id;?>&question_id=0">
                        <span type="button" class="btn btn-success btn-block">Pridať ďalšiu možnosť</span>
                    </a>
                   </label>
                   <label class="col-sm-9 control-label"></label>
                </div>
            </div>
             <?php } ?>
        </div>
      </div>
      <div class="col-md-12">
         <div class="row" style="background-color: #fff;padding: 5px;margin: 0px;">
            <label class="col-sm-2 control-label"><b>Názov vstupu</b></label>
            <label class="col-sm-2 control-label"><b>Zobraziť na webe?</b></label>
            <label class="col-sm-4 control-label"><b>Nastavenie hodnoty</b></label>
            <?php if ($polls->getParam('type', $poll_id) == 2) {?>
                <label class="col-sm-1 control-label"><b>Počet bodov</b></label>
            <?php } ?>
            <?php if ($polls->getParam('type', $poll_id) == 1) {?>
                <label class="col-sm-1 control-label"><b>Definujte správnu odpoveď</b></label>
            <?php } ?>
            <label class="col-sm-1 control-label"><b>Vzmazať pole</b></label>
         </div>
         <div class="dnt-devider"></div>
         <div class=" tab-content">
            <!-- base settings -->
            <div class="tab-pane active" id="sutaz">
               <?php
                  //for($i=1;$i<=$polls->getNumberOfQuestions($poll_id);$i++){
                  $i = 1;
                foreach ($pollsFrontend->getPollsIds($poll_id) as $thisId) {
                    $query = $polls->getCurrentAnsewerData($poll_id, $thisId);
                    if ($db->num_rows($query) > 0) {
                        $j = 1;
                        foreach ($db->get_results($query) as $row) {
                            $poll_name_show = $polls->inputName('show', $row['id_entity'], $row['show']);
                            $poll_name_key = $polls->inputName('key', $row['id_entity'], $row['key']);
                            $poll_name_points = $polls->inputName('points', $row['id_entity'], $row['key']);
                            $poll_name_is_correct = $polls->inputName('is_correct', $row['id_entity'], $row['is_correct']);
                            $last_question_id = $row['question_id'];
                            ?>
                  <div class="row form">
                  <label class="col-sm-2 control-label"><b><?php
                    if ($row['key'] == 'question') {
                        echo "<big><big>Otázka č. $i</big></big>";
                    } else {
                        echo "Odpoveď pre otázku č $i, možnosť č. $j";
                    }
                    ?>
                  </b></label>
                  <label class="col-sm-2 control-label">
                  <select class="form-control" name="<?php echo $poll_name_show ?>" style="border: 2px #3C763D solid;" disabled>
                            <?php getZobrazenie($row['show']);?>
                  </select>
                  </label>
                  <div class="col-sm-4 text-left">
                     <input type="text" name="<?php echo $poll_name_key?>" value="<?php echo $row['value']?>" class="form-control" placeholder="">
                  </div>
                            <?php if ($polls->getParam('type', $poll_id) == 2 && $row['key'] != 'question') {?>
                  <div class="col-sm-1 text-left">
                     <input type="number" name="<?php echo $poll_name_points?>" value="<?php echo $row['points']?>" class="form-control" placeholder="">
                  </div>
                            <?php } ?>
                 <!-- len ak je typ 1 -->
                            <?php if ($row['key'] != 'question') {?>
                                <?php if ($polls->getParam('type', $poll_id) == 1) {?>
                      <div class="col-sm-1 text-left">
                                    <?php if ($row['is_correct'] == 1) { ?>
                         <input type="radio" name="is_correct_<?php echo $thisId?>" value="<?php echo $poll_name_is_correct; ?>" checked="checked">
                                    <?php } else { ?>
                         <input type="radio" name="is_correct_<?php echo $thisId?>" value="<?php echo $poll_name_is_correct?>">
                                    <?php } ?>
                      </div>
                                <?php } ?>
                            <?php } else {
                                echo ' <div class="col-sm-1 text-left"></div>';
                            } ?>
                  
                  <label class="col-sm-2 control-label"><b>
                            <?php
                            if ($row['key'] == 'question') {
                                echo '<big><a ' . $dnt->confirmMsg('Naozaj chcete zmazať túto otázku?') . " href='index.php?src=polls&action=del_question&post_id=" . $poll_id . '&question_id=' . $row['question_id'] . "'><span style='color: #ff0000'>Vymazať celú otázku</span></a></big>";
                            }
                         /*else{
                          echo "Vymazať tento field";
                         }*/
                            ?></b></label>
               </div>
               <br>
                            <?php
                            $j++;
                        }
                    }
                    echo '<div class="dnt-devider"></div>';
                    $i++;
                }
                ?>
            <!-- base settings -->
                  <div class="row form"> 
                   <label class="col-sm-3 control-label">
                    <a <?php echo $dnt->confirmMsg('Pridať ďalšiu otázku? Pozor, ak ste vykonali nejaké zmeny, po vykonaní tejto akcie sa neuložia. Preto si prosím najprv uložte všetki zmeny.'); ?>href="index.php?src=polls&action=add_question&post_id=<?php echo $poll_id;?>&question_id=<?php echo $last_question_id;?>">
                        <span type="button" class="btn btn-success btn-block">Pridať ďalšiu otázku?</span>
                    </a>
                   </label>
                   <label class="col-sm-5 control-label">
                    <?php echo $dnt->returnInput();?>
                    <input type="submit" name="sent" class="btn btn-primary btn-block" value="Uložiť všetky údaje">
                   </label>
                   <label class="col-sm-3 control-label"></label>
                   <label class="col-sm-1 control-label"></label>
                </div>
                 
            </div>
         </div>
         <!-- nastavenia partnera -->
      </div>
      </div>
   </section>
</form>
<!-- END CUSTOM TABLE -->
<?php get_bottom_html(); ?>
<?php get_bottom(); ?>