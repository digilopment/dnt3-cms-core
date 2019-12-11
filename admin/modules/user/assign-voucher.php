<?php
$post_id = $rest->get("post_id");
if(Voucher::assignLastVoucher($post_id)){
	$url = "index.php?src=".$rest->get("src")."&type=".$rest->get("type")."";
	Dnt::redirect($url);
}else{
	include "tpl_functions.php";
	get_top();
	include "top.php";
	error_message_default("Nie je možné pridať voucher. <br/>Pre pridanie vouchera, potrebujete mať naimportovaný zoznam voucherov.");
	include "bottom.php";
	get_bottom();
}
