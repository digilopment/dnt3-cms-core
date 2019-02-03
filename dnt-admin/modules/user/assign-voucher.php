<?php
$post_id = $rest->get("post_id");
if(Voucher::assignLastVoucher($post_id)){
	$url = "index.php?src=".$rest->get("src")."&type=".$rest->get("type")."";
	Dnt::redirect($url);
}else{
	echo "nie je mozne pridat voucher";
}
