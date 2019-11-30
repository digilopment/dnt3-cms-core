<?php
include "../dnt-library/framework/_Class/Autoload.php";
$autoload = new Autoload;
$path = "../";
$autoload->load($path);

/**
 *
 * READ FROM XLSX
 *
 *
 * */
$xlsx = new Xlsx;
$fileName = "test.xlsx";
$excel_data = $xlsx->read($path, $fileName);
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
