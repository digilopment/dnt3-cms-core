<?php
function frevaCurl($limit, $from, $to){
	$curl = curl_init();
	curl_setopt_array($curl, array(
	  CURLOPT_URL => "https://freya.cms.markiza.sk/api/v1/user/?limit=".$limit."&from=".$from."%2000:00:00&to=".$to."%2023:59:59&order=created_at",
	  CURLOPT_ENCODING => "",
	  CURLOPT_TIMEOUT => 1000,
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_CUSTOMREQUEST => "GET",
	  CURLOPT_POSTFIELDS => "",
	  CURLOPT_HTTPHEADER => array(
		"Postman-Token: f3bbfaac-c712-40c0-97fa-2d77d6ddc6a5",
		"cache-control: no-cache",
		"Authorization: Bearer 896b29a21231976fa79be7a1a3726001240298d80f6ba603cb0c6ad5aa652e8c61878f642202deca"
	  ),
	));

	$response = curl_exec($curl);
	
	$err = curl_error($curl);

	curl_close($curl);

	if ($err) {
	  return "cURL Error #:" . $err;
	} else {
	  return $response;
	}
	
}

$limit 	= 3900;
$from 	= "2019-05-01"; //YYYY-MM-DD
$to 	= "2019-06-01"; //YYYY-MM-DD

$period = new DatePeriod(
     new DateTime($from),
     new DateInterval('P1D'),
     new DateTime($to)
);
$count = 0;
foreach ($period as $key => $value) {
    $data 	= json_decode(frevaCurl($limit,$value->format('Y-m-d'), $value->format('Y-m-d')));
	$pocet 	= count($data->data);
	echo $value->format('Y-m-d') . " - " . $pocet ."<br/>";
	$count = $count+$pocet;
}

echo "<hr/>".$count."";