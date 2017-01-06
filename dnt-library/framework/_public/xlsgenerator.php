<?php

function getColumn($array){
	/*while (current($array)) {
		$newArr[] = UcFirst(key($array));
		next($array);
	}*/
	return array_keys($array);
}


function getTableColumns($table, $columns){
	
	
	
	$query = mysql_query("SELECT $columns FROM $table");
	if(mysql_num_rows($query)>0){
		$array = mysql_fetch_assoc($query);
		//return $array; 
		return getColumn($array); 
	}
	else{
		return false;
	}
}

function getSQLData($table, $andWhere){
	
		
	if($andWhere){
		$andWhere;
	}else{
		$andWhere = false;
	}
	
	$query = mysql_query("SELECT id FROM $table WHERE parent_id = 0 $andWhere ");
	if(mysql_num_rows($query)>0){
		while($row = mysql_fetch_array($query)){
			$id[] = $row['id'];
		}
	}
	else{
		$id = false;
	}
	
	return $id;
}

function getTableRows($table, $columns, $id){

	$query = mysql_query("SELECT $columns FROM $table WHERE id = $id");
	if(mysql_num_rows($query)>0){
		while($row = mysql_fetch_array($query)){
			foreach(getTableColumns($table, $columns) as $index => $value){
				$arr[] = odstran_diakritiku($row[$index]);
			}
		}
		return $arr;
	}
	else{
		return false;
	}
}


function arrayToXls($input) {
    // BoF
    $ret = pack('ssssss', 0x809, 0x8, 0x0, 0x10, 0x0, 0x0);
    
    // array_values is used to ensure that the array is numerically indexed
    foreach (array_values($input) as $lineNumber => $row) {
        foreach (array_values($row) as $colNumber => $data) {
            if (is_numeric($data)) {
                // number, store as such
                $ret .= pack('sssssd', 0x203, 14, $lineNumber, $colNumber, 0x0, $data); 
            } else {
                // everything else store as string
                $len = strlen($data);
                $ret .= pack('ssssss', 0x204, 8 + $len, $lineNumber, $colNumber, 0x0, $len) . $data;
            }
        }
    }
	
    $ret .= pack('ss', 0x0A, 0x00);
    
    return $ret;
}



function prepareData($table, $columns, $where){
	$allId = getSQLData($table, $where);
	$input[] = getTableColumns($table, $columns);
	foreach($allId as $id){
		$input[] = getTableRows($table, $columns, $id);
	}
	return $input;
}


function creatXlsFile($table, $columns, $where, $fileName){
	$input = prepareData($table, $columns, $where);
	file_put_contents($fileName, arrayToXls($input));
}


function creatCsvFile($table, $columns, $where, $fileName){
	$data = false;
	$query = mysql_query("SELECT $columns FROM $table WHERE parent_id = 0 $where");
	if(mysql_num_rows($query)>0){
		$pocetStlpcov = count(getTableColumns($table, $columns));
		$data .= implode(";", getTableColumns($table, $columns))."\n";
		while($row = mysql_fetch_array($query)){
			$i = 1;
			foreach(getTableColumns($table, $columns) as $column){
				$data .= $row[$column];
				if($i == $pocetStlpcov){
					$data .= "\n";
				}else{
					$data .= ";";
				}
				$i++;
			}
		}
	}
	file_put_contents($fileName, $data);
}

function creatCsvFileVyhrat($table, $columns, $where, $fileName){
	$data = false;
	$query = mysql_query("SELECT $columns FROM $table WHERE parent_id = 0 $where");
	if(mysql_num_rows($query)>0){
		$data .= str_replace(" ", ";", $columns);
		$data .= "\n";
		while($row = mysql_fetch_array($query)){
			$data .= $row['id'].";".$row['competition_id'].";".$row['meno'].";".$row['priezvisko'].";".$row['uniq_id'].";".$row['mesto'].";".$row['psc'].";".$row['email'].";".$row['odpoved'].";".$row['news'].";".$row['news_2'].";".$row['custom_1']."\n";
		}
	}
	file_put_contents($fileName, odstran_diakritiku($data));
}


function creatXlsFileFromArray($input, $fileName){
	file_put_contents($fileName, arrayToXls($input));
}


