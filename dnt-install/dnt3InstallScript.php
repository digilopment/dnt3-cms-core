<?php
function downloadFile($url, $path){
	$file = explode("/", $url);
	$array = $file;
	if (!is_array($array)) 
		return $array; 
	if (!count($array)) 
		return null; 
	end($array); 
	$fotka = $array[key($array)];
	
	$file = $path.$fotka;
	file_put_contents($file, file_get_contents($url));
	return true;
}

function recurse_copy($src,$dst) { 
    $dir = opendir($src); 
    @mkdir($dst); 
    while(false !== ( $file = readdir($dir)) ) { 
        if (( $file != '.' ) && ( $file != '..' )) { 
            if ( is_dir($src . '/' . $file) ) { 
                recurse_copy($src . '/' . $file,$dst . '/' . $file); 
            } 
            else { 
                copy($src . '/' . $file,$dst . '/' . $file); 
            } 
        } 
    } 
    closedir($dir); 
} 

function rrmdir($src) {
    $dir = opendir($src);
    while(false !== ( $file = readdir($dir)) ) {
        if (( $file != '.' ) && ( $file != '..' )) {
            $full = $src . '/' . $file;
            if ( is_dir($full) ) {
                rrmdir($full);
            }
            else {
                unlink($full);
            }
        }
    }
    closedir($dir);
    rmdir($src);
}

$projectFolder = "dnt3/";

if(downloadFile("https://github.com/designdnt/cms-designdnt3/archive/master.zip", "")){
	$zip = new ZipArchive;
	$res = $zip->open('master.zip');
	@file($res);
	$zip->extractTo($projectFolder);
	$zip->close();
	recurse_copy($projectFolder."cms-designdnt3-master",$projectFolder);
	rrmdir($projectFolder.'cms-designdnt3-master');
	unlink('master.zip');
	print ("\nInstalation finished\n");
}
?>