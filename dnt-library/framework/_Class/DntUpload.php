﻿<?php

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
			   }
			}
		}
	}
	
	public function arrayFiles(&$file_post) {
		$file_ary = array();
		$file_count = count($file_post['name']);
		$file_keys = array_keys($file_post);

		for ($i=0; $i<$file_count; $i++) {
			foreach ($file_keys as $key) {
				$file_ary[$i][$key] = $file_post[$key][$i];
			}
		}

		return $file_ary;
	}
	
	public function multypleUpload($files, $path){
		$db 		= new Db;
		$files_arr = $this->arrayFiles($files); 	
		
		foreach ($files_arr as $file) {
		$dntUpload = new Upload($file); 
		
			if ($dntUpload->uploaded) {
			   $dntUpload->Process($path);
			   if ($dntUpload->processed) {
				 //insert to files table of files
				 $insertedData = array(
					'vendor_id' => Vendor::getId(), 
					'name' => 	$dntUpload->file_dst_name, 
					'type' =>	$dntUpload->file_src_mime, 
					'datetime' => "NOW()",
					);
				 $db->insert('dnt_uploads', $insertedData);
				 //get last ID of this file
				 $imgId = $db->lastid();
				 //update settings columns
				 /*$db->update(
					$table, //table 
					array( $setColumn => $imgId), //set
					array( $updateColumn => $updateValue, '`vendor_id`' => Vendor::getId())//where
				);*/
			   }
			}
		} //end foreach
	}
	
}