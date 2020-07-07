<?php
$files = glob('../dnt-cache/plugins/*.{generated}', GLOB_BRACE);
foreach ($files as $file) {
    if (is_file($file)) {
        unlink($file);
    }
} 

$files = glob('../dnt-cache/temp/*.{tmp}', GLOB_BRACE);
foreach ($files as $file) {
    if (is_file($file)) {
        unlink($file);
    }
} 
