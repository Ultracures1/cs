<?php

date_default_timezone_set('Asia/Kolkata');


$serviceNowTime = date('Y-m-d H:i:s');

$response = [
    'data' => null,
    'code' => 1,
    'msg' => 'The recharge amount is not up to the standard',
    'msgCode' => 502,
    'serviceNowTime' => $serviceNowTime,
];

$json_response = json_encode($response);

header('Content-Type: application/json');
echo $json_response;
?>
