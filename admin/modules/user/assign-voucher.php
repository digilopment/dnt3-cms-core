<?php
$post_id = $rest->get("post_id");
if(Voucher::assignLastVoucher($post_id)){
	$url = "index.php?src=".$rest->get("src")."&type=".$rest->get("type")."";
	Dnt::redirect($url);
}else{
	include "plugins/webhook/tpl_functions.php";
	get_top();
	include "plugins/webhook/top.php";
	error_message_default("Nie je možné pridať voucher. <br/>Pre pridanie vouchera, potrebujete mať naimportovaný zoznam voucherov.");
	include "plugins/webhook/bottom.php";
	get_bottom();
}
