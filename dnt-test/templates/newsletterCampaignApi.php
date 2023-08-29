<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
$json = [
    'seenLogs' => $data['seenLogs'],
    'clickLogs' => $data['clickLogs'],
    'logs' => $data['logs'],
    'sentEmails' => $data['sentEmails'],
    'countSentEmails' => $data['countSentEmails'],
];

$response = json_encode($json);
file_put_contents('../dnt-view/data/json/' . $data['campaignId'] . '.json', $response);
//print($response);
print('OK');
