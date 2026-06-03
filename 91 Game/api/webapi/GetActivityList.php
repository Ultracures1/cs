<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
header('Content-Type: application/json'); 

date_default_timezone_set('Asia/Kolkata');
$serviceNowTimeFormatted = date('Y-m-d H:i:s');

$jsonData = '{
    "data": {
        "list": [
            {
                "bannerTitle": "New Member First Deposit Bonus",
                "bannerID": 56,
                "bannerUrl": "https://abcoders.in/assets/png/Banner_20240131164516hwsn.jpg",
                "jumpType": 2,
                "contents": "/activity/FirstRecharge"
            }
        ],
        "pageNo": 1,
        "totalPage": 1,
        "totalCount": 20
    },
    "code": 0,
    "msg": "Succeed",
    "msgCode": 0,
    "serviceNowTime": "' . $serviceNowTimeFormatted . '"
}';

$data = json_decode($jsonData, true);

$response = json_encode($data, JSON_PRETTY_PRINT);

echo $response;
?>
