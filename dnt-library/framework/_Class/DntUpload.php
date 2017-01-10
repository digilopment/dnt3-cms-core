<?php

class DntUpload{

	public function addDefaultImage($file, $table, $setColumn, $updateColumn, $updateValue, $path){
		
		$dntUpload 	= new Upload(@$_FILES[$file]);
		$db 		= new Db;
		
		if (is_file($_FILES[$file]['tmp_name'])) {	
			 
			if ($dntUpload->uploaded) {
			   $dntUpload->Process($path);
			   if ($dntUpload->processed) {
				 //insert to files table of files
				 $insertedData = array(
					'vendor_id' => Vendor::getId(), 
					'name' => 	$dntUpload->file_dst_name, 
					'type' =>	$dntUpload->file_src_mime, 
					'datetime' => "NOW()"
					);
				 $db->insert('dnt_uploads', $insertedData);
				 //get last ID of this file
				 $imgId = $db->lastid();
				 //update settings columns
				 $db->update(
					$table, //table 
					array( $setColumn => $imgId), //set
					array( $updateColumn => $updateValue, '`vendor_id`' => Vendor::getId())//where
				);
				 //$db->update('dnt_settings', array( 'value' => $imgId), array( '`key`' => 'logo_firmy', '`vendor_id`' => Vendor::getId()));
			   }
			}
		}
	}
	
	
}