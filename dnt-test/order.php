<?php
function clean($string) {
   $string = strtolower ($string); // Replaces all spaces with hyphens.
   $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
   $string = str_replace('á', 'a', $string);
   $string = str_replace('š', 's', $string);
   $string = str_replace('Š', 'sè', $string);
   $string = str_replace('è', 'cš', $string);
   $string = str_replace('È', 'cš', $string);
   $string = str_replace('', 't', $string);
   $string = str_replace('ò', 'n', $string);
   
   return $string;

}

function arrayOrder($data, $orderby, $sort){
	
	//VYTVOR ZORADOVACI INDEX
	if($sort == "desc" || "DESC"){
		$sortIndex = SORT_DESC;
	}else{
		$sortIndex = SORT_ASC;
	}
	
	//ZORAD PODLA INDEXU
	$sortArray = array(); 
	foreach($data as $array){ 
		foreach($array as $key=>$value){ 
			if(!isset($sortArray[$key])){ 
				$sortArray[$key] = array(); 
			} 
			$sortArray[$key][] = $value; 
		} 
	} 

	 array_multisort($sortArray[$orderby],$sortIndex,$data); 
	 return $data;
}

include "../dnt-library/framework/_Class/Autoload.php";
$autoload		= new Autoload;
$path			= "../";
$autoload->load($path);


//VSTUPNE POLE
$input=array (
	array("meno" => "Maminka"),
	array("meno" => "Tatino"),
	array("meno" => "Tomáš"),
	array("meno" => "Štefka"),
	array("meno" => "Šaòo"),
	array("meno" => "Jakub"),
	array("meno" => "Ferko"),
	array("meno" => "Stará Mama"),
	array("meno" => "Dede"),
	array("meno" => "Cecília"),
	array("meno" => "Èaòo"),
	);
	
	
	var_dump(arrayOrder($input, "meno", "desc"));
	exit;
//VYTVOR ZORADOVACI INDEX
	foreach($input as $value){
		$data[] = array(
			"meno" =>$value['meno'], 
			"order" =>clean($value['meno'])
		);
	}
	
//ZORAD PODLA INDEXU
	$orderby = "order";

	$sortArray = array(); 
	foreach($data as $array){ 
		foreach($array as $key=>$value){ 
			if(!isset($sortArray[$key])){ 
				$sortArray[$key] = array(); 
			} 
			$sortArray[$key][] = $value; 
		} 
	} 

	array_multisort($sortArray[$orderby],SORT_ASC,$data); 
	
	
//EXPORT
	$xlsx = new XMLgenerator;
	$xlsx->creatXlsFileFromArray($data, "export.csv");
	
	echo "EXPORTED - " . time();