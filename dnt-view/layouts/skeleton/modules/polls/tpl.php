<?php
//include "dnt-view/layouts/markiza/tpl_functions.php";
//include "dnt-view/layouts/markiza/top.php";

include "dnt-view/layouts/".Vendor::getLayout()."/tpl_functions.php";
$data = Frontend::get();
//$data = false;
get_top($data);
include "dnt-view/layouts/".Vendor::getLayout()."/top.php";

$rest 		= new Rest;
$db 		= new Db;
$poll_id 	= $rest->webhook(2);
$question_id= $rest->webhook(4);
$poll_input_name = "poll_".$poll_id."_".$question_id;
?>
<div style="margin-top: 60px;"></div>
<div class="container panel panel-primary dnt-poll">
   <div class="panel-heading">
      <h3 class="panel-title">
         <span class="glyphicon glyphicon-arrow-right"></span><?php echo PollsFrontend::getCurrentQuestions($poll_id, $question_id); ?>
      </h3>
   </div>
   <div class="panel-body">
      <ul class="list-group">
         <?php
            $query = Polls::getQuestions($poll_id, $question_id);
            if($db->num_rows($query)>0){
            	foreach($db->get_results($query) as $row){
            	?>
         <li class="list-group-item">
            <div class="radio">
               <label>
               <input type="radio" name="<?php echo $poll_input_name; ?>" value="<?php echo $row['id_entity']?>">
               <?php echo $row['value']?>
               </label>
            </div>
         </li>
         <?php
            }
            }
            ?>
      </ul>
   </div>
   <div class="panel-footer">
      <nav aria-label="...">
         <ul class="pagination pagination-lg">
            <li class="page-item ">
               <a class="page-link" href="<?php echo PollsFrontend::url("prev", $poll_id, $question_id)?>" tabindex="-1">Predchádzajúca otázka</a>
            </li>
            <li class="page-item">
               <a class="page-link" href="<?php echo PollsFrontend::url("next", $poll_id, $question_id)?>">Ďalšia otázka</a>
            </li>
         </ul>
      </nav>
   </div>
</div>
<div class="margin-bottom-60"></div>
   <script>
	 $( document ).ready(function() {
		 var pollData;
		$("input[name=<?php echo $poll_input_name; ?>]").click(function() {    
			if($("input[name=<?php echo $poll_input_name; ?>]").is(':checked')){
				pollData = $("input[name=<?php echo $poll_input_name; ?>]:checked").val();
				pollSetCookie("<?php echo $poll_input_name; ?>", pollData, 60);
				console.log(pollData);
			}

		});
	});
	</script>
<?php
get_footer($data);
get_bottom($data);