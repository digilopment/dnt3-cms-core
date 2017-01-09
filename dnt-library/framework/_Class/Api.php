<?php
class Api{
	
	public	function getColumns($query){
		$db = new DB();
		$i = 1;
		if ($db->num_rows($query) > 0){
				foreach($db->get_results($query) as $childArr){
					if($i == 1){
					foreach($childArr as $key => $value){
						$arr[]=$key;
					}
					$i++;
				}
			}
			return $arr;
		}
		else{
			return false;
		}
	}
	
	public function getXmlData($query){
		$xml = new SimpleXMLElement('<xml/>');
		$db = new Db;
		
		if ($db->num_rows($query) > 0){
			foreach($db->get_results($query) as $row){
			$track = $xml->addChild('item');
				foreach($this->getColumns($query) as $column){
					$track->addChild($column, $row[$column]);
				}
			}
			Header('Content-type: text/xml');
			print($xml->asXML());
		}
	}
	
	public function getJsonData($query){
		$xml = new SimpleXMLElement('<xml/>');
		$db = new Db;
		
		if ($db->num_rows($query) > 0){
			echo '{ "items": [';	
			foreach($db->get_results($query) as $row){	
				echo '{';
				foreach($this->getColumns($query) as $column){
					if ($column === end($this->getColumns($query))){
						echo '"'.$column.'":"'. $row[$column].'"';
					}else{
						echo '"'.$column.'":"'. $row[$column].'",';
					}
				}
				if ($row === end($db->get_results($query))){
					echo '}';
				}else{
					echo '},';
				}
			}
			echo ' ] }';
		}
	}
}