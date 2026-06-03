<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
date_default_timezone_set('Asia/Kolkata');
$serviceNowTimeFormatted = date('Y-m-d H:i:s');

$jsonData = '{
    "data": [
        {
            "type": 5,
            "typeName": "Interval Number",
            "type_Number": 0,
            "number_0": 12,
            "number_1": 7,
            "number_2": 6,
            "number_3": 6,
            "number_4": 7,
            "number_5": 6,
            "number_6": 12,
            "number_7": 14,
            "number_8": 14,
            "number_9": 12
        }
    ],
    "code": 0,
    "msg": "Succeed",
    "msgCode": 0,
    "serviceNowTime": "' . $serviceNowTimeFormatted . '"
}';

$data = json_decode($jsonData, true);

$response = json_encode($data);

header('Content-Type: application/json');
echo $response;

?>
