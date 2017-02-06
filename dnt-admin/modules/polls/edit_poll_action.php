<?php
$dntUpload = new DntUpload;
if($rest->post("sent")){
	$poll_id = $rest->get("post_id");
	
	//update static inputs => dnt_polls
	$poll_show 		= $rest->post("poll_show");
	$poll_content 	= $rest->post("poll_content");
	$poll_type 		= $rest->post("poll_type");
	$poll_name 		= $rest->post("poll_name");
	$poll_name_url 	= Dnt::name_url($poll_name);
	$table	 = "dnt_polls";
	$db->update(
		$table,	//table
		array(	//set
			'name' 			=> $poll_name,
			'name_url' 		=> $poll_name_url,
			'type' 			=> $poll_type,
			'show' 			=> $poll_show,
			'content' 		=> $poll_content,
			), 
		array( 	//where
			'id' 			=> $poll_id, 
			'`vendor_id`' 	=> Vendor::getId())
	);
	$dntUpload->addDefaultImage(
		"poll_image", 							//input type file
		"dnt_polls", 							//update table
		"img", 									//update table column
		"`id`", 								//where column
		$poll_id, 								//where value
		"../dnt-view/data/".Vendor::getId() 	//path
	);
	
	
	//update all generated inputs dnt_polls_composer
	$return  = $rest->post("return");
	$table	 = "dnt_polls_composer";
	//update data 
	//for($i=1;$i<=Polls::getNumberOfQuestions($poll_id);$i++){
	$k = 1;
	foreach(PollsFrontend::getPollsIds($poll_id) as $i){
	$query = Polls::getPollData($poll_id);
	  if($db->num_rows($query)>0){
		foreach($db->get_results($query) as $row){
			 $poll_name_show 	= $rest->post(Polls::inputName("show", $row['id'], $row['show']));
             $poll_name_key 	= $rest->post(Polls::inputName("key", $row['id'], $row['key']));
             $poll_name_points 	= $rest->post(Polls::inputName("points", $row['id'], $row['key']));
             $poll_name_content = $rest->post(Polls::inputName("content", $row['id'], $row['key']));
			 $dnt_polls_meta_id = explode("_", Polls::inputName("key", $row['id'], $row['key']));
			 $poll_name_img   	= Polls::inputName("img", $row['id'], $row['img']);
			 $meta_id = $dnt_polls_meta_id[0];
			 
			if($row['key'] == "winning_combination" && $k == 1 && Polls::getParam("type", $poll_id) == 2){
				$dntUpload->addDefaultImage(
					$poll_name_img, 						//input type file
					"dnt_polls_composer", 					//update table
					"img", 									//update table column
					"`id`", 								//where column
					$meta_id, 								//where value
					"../dnt-view/data/".Vendor::getId() 	//path
				);
			}
			 
			 $db->update(
				$table,	//table
				array(	//set
					'value' 		=> $poll_name_key,
					'show' 			=> $poll_name_show,
					'points' 		=> $poll_name_points,
					'description' 	=> $poll_name_content,
					), 
				array( 	//where
					'id' 			=> $meta_id, 
					//'poll_id' 		=> $poll_id, 
					'`vendor_id`' 	=> Vendor::getId())
			);
			//echo $poll_name_key ." ".$meta_id."<br/>";
			
		}
		$k++;
	  }
	  
	  $is_correct = explode("_", $rest->post("is_correct_".$i));
	  $is_correct = $is_correct[0];
	  $db->update(
				$table,	//table
				array(	//set
					'is_correct' 	=> 1,
					), 
				array( 	//where
					'id' 			=> $is_correct, 
					'`vendor_id`' 	=> Vendor::getId())
			);
			
    }
	Dnt::redirect($return);
}

