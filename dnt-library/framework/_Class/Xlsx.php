<?php
/**
 *  class       Pdf
 *  author      Tomas Doubek
 *  framework   DntLibrary
 *  package     dnt3
 *  date        2017
 */
Class Xlsx {

   

    /**
     * 
     * @param type $path
     * @param type $fileName
     * @param type $pdfName
     * @param type $html
     */
    public function read($path, $fileName) {
		$vendor = new Vendor;
		$filePath = $path."dnt-view/data/uploads/".$fileName;
		$excel_data = false;
		date_default_timezone_set('Europe/Paris');
		$Spreadsheet = new SpreadsheetReader($filePath);
		$Sheets = $Spreadsheet->Sheets();
		foreach ($Sheets as $Index => $Name) {
			$excel_data.= "<h3>" . $Name . "</h3>";
			$excel_data.= "<table>";
			foreach ($Spreadsheet as $Key => $Row) {
				foreach ($Row as $value) {
					$excel_data.= "<td>" . $value . "</td>";
				}
				$excel_data.= "</tr><tr>";
			}
			$excel_data.= "</table>";
		}
		return $excel_data;
    }
	
	 /**
     * 
     * @param type $path
     * @param type $fileName
     * @param type $fullPath
     */
    public function toArray($path, $fileName, $fullPath = false) {
		$vendor = new Vendor;
		if($fullPath != false){
			$filePath = $fullPath;
		}else{
			$filePath = $path."dnt-view/data/uploads/".$fileName;
		}
		$excel_data = false;
		date_default_timezone_set('Europe/Paris');
		$Spreadsheet = new SpreadsheetReader($filePath);
		$Sheets = $Spreadsheet->Sheets();
		foreach ($Sheets as $Index => $Name) {
			foreach ($Spreadsheet as $Key => $Row) {
				foreach ($Row as $value) {
					$excel_data[] = $value;
				}
			}
		}
		return $excel_data;
    }

   
}
