<?php

use DntLibrary\Base\DB;

$db = new DB();
$table = 'dnt_translates';
$translate_id = $rest->get('translate_id');

$where = array('translate_id' => $translate_id, 'vendor_id' => $vendor->getId());
$db->delete($table, $where);
$dnt->redirect('index.php?src=multylanguage&action=translates');
