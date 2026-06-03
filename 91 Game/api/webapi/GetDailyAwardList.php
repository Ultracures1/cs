<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
date_default_timezone_set('Asia/Kolkata');
$serviceNowTimeFormatted = date('Y-m-d H:i:s');

// Define the current date
$currentDate = date('Y-m-d');

$jsonData = '{
    "data": [
        {
            "userId": 253081,
            "configId": 378,
            "schedule": 0.00,
            "status": 2,
            "taskTitle": "Recharge rewards",
            "taskDescribe": "abcoders_db daily recharge rewards",
            "taskId": "A1",
            "taskTarget": 500.00,
            "taskAwardAmount": 18.00,
            "createDate": "' . $currentDate . ' 00:00:01"
        },
        {
            "userId": 253081,
            "configId": 379,
            "schedule": 0.00,
            "status": 1,
            "taskTitle": "Recharge rewards",
            "taskDescribe": "abcoders_db daily recharge rewards",
            "taskId": "A1",
            "taskTarget": 1000.00,
            "taskAwardAmount": 28.00,
            "createDate": "' . $currentDate . ' 00:00:47"
        },
        {
            "userId": 253081,
            "configId": 380,
            "schedule": 0.00,
            "status": 1,
            "taskTitle": "Recharge rewards",
            "taskDescribe": "abcoders_db daily recharge rewards",
            "taskId": "A1",
            "taskTarget": 5000.00,
            "taskAwardAmount": 91.00,
            "createDate": "' . $currentDate . ' 00:01:42"
        },
        {
            "userId": 253081,
            "configId": 381,
            "schedule": 0.00,
            "status": 1,
            "taskTitle": "Recharge rewards",
            "taskDescribe": "abcoders_db daily recharge rewards",
            "taskId": "A1",
            "taskTarget": 10000.00,
            "taskAwardAmount": 158.00,
            "createDate": "' . $currentDate . ' 00:03:06"
        },
        {
            "userId": 253081,
            "configId": 382,
            "schedule": 0.00,
            "status": 1,
            "taskTitle": "Recharge rewards",
            "taskDescribe": "abcoders_db daily recharge rewards",
            "taskId": "A1",
            "taskTarget": 50000.00,
            "taskAwardAmount": 288.00,
            "createDate": "' . $currentDate . ' 00:04:20"
        }
    ],
    "code": 0,
    "msg": "Succeed",
    "msgCode": 0,
    "serviceNowTime": "' . $serviceNowTimeFormatted . '"
}';

$data = json_decode($jsonData, true);

$response = json_encode($data, JSON_PRETTY_PRINT);

echo $response;
header('Content-Type: application/json');
echo json_encode($response);

?>
