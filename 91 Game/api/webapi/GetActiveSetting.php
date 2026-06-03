<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
header('Content-Type: application/json'); 

date_default_timezone_set('Asia/Kolkata');
$serviceNowTimeFormatted = date('Y-m-d H:i:s');

$jsonData = '{
    "data": {
        "isTaskState": "0",
        "isOpenJackpotReward": "0",
        "isOpenWashCode": "0",
        "unJackpotCount": 0,
        "isOpenActivityAward": "0",
        "unWeeklyAwardCount": 0,
        "isFinishUserGuidelines": true,
        "isFirstUserDayRequest": true,
        "isOpenChampion": "0",
        "newbieGiftPackCount": 0
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
