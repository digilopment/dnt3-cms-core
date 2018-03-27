
<?php
$excel_data = false;
if (isset($argv[1])) {
    $Filepath = $argv[1];
} elseif (isset($_GET['File'])) {
    $Filepath = $_GET['File'];
} else {
    if (php_sapi_name() == 'cli') {
        echo 'Please specify filename as the first argument' . PHP_EOL;
    } else {
        echo 'Please specify filename as a HTTP GET parameter "File", e.g., "/test.php?File=test.xlsx"';
    }
    exit;
}
require ('php-excel-reader/excel_reader2.php');
require ('SpreadsheetReader.php');
date_default_timezone_set('Europe/Paris');
$Spreadsheet = new SpreadsheetReader($Filepath);
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
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>Example PHP Excel Reader</title>
<style type="text/css">
#content{
	margin: 0px auto;
	width: 1000px;
}
table {
 border-collapse: collapse;
}        
td {
 border: 1px solid black;
 padding: 0 0.5em;
}     
table {  
    color: #333;
    font-family: Helvetica, Arial, sans-serif;
    width: 640px; 
    border-collapse: 
    collapse; border-spacing: 0; 
	width: 100%;
}

td, th {  
    border: 1px solid transparent; /* No more visible border */
    height: 30px; 
    transition: all 0.3s;  /* Simple transition for hover effect */
}

th {  
    background: #DFDFDF;  /* Darken header a bit */
    font-weight: bold;
}

td {  
    background: #FAFAFA;
    text-align: center;
}

/* Cells in even rows (2,4,6...) are one color */        
tr:nth-child(even) td { background: #F1F1F1; }   

/* Cells in odd rows (1,3,5...) are another (excludes header cells)  */        
tr:nth-child(odd) td { background: #FEFEFE; }  

tr td:hover { background: #666; color: #FFF; }  
/* Hover cell effect! */   
</style>
</head>
<body>
<div id="content">
<?php
// displays tables with excel file data
echo $excel_data;
?>    
</div>
</body>
</html>
