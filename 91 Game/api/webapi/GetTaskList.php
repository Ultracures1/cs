<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
date_default_timezone_set('Asia/Kolkata');
$serviceNowTimeFormatted = date('Y-m-d H:i:s');

$jsonData = '{
    "data": {
        "totalPeople": 5000,
        "totalAmount": null,
        "taskList": [
            {
                "taskID": 1,
                "taskAmount": 55.00,
                "rechargeAmount": 300.00,
                "rechargeAmount_All": null,
                "taskPeople": 1,
                "rechargePeople": 0,
                "taskRechargePeople": 1,
                "efficientPeople": 0,
                "title": null,
                "title2": null,
                "isReceive": 1,
                "isFinshed": true,
                "beginDate": "2000-01-01",
                "endDate": "2099-01-01"
            },
            {
                "taskID": 2,
                "taskAmount": 155.00,
                "rechargeAmount": 300.00,
                "rechargeAmount_All": null,
                "taskPeople": 3,
                "rechargePeople": 0,
                "taskRechargePeople": 3,
                "efficientPeople": 0,
                "title": null,
                "title2": null,
                "isReceive": 0,
                "isFinshed": false,
                "beginDate": "2000-01-01",
                "endDate": "2099-01-01"
            },
            {
                "taskID": 3,
                "taskAmount": 555.00,
                "rechargeAmount": 500.00,
                "rechargeAmount_All": null,
                "taskPeople": 10,
                "rechargePeople": 0,
                "taskRechargePeople": 10,
                "efficientPeople": 0,
                "title": null,
                "title2": null,
                "isReceive": 0,
                "isFinshed": false,
                "beginDate": "2000-01-01",
                "endDate": "2099-01-01"
            },
            {
                "taskID": 4,
                "taskAmount": 1555.00,
                "rechargeAmount": 800.00,
                "rechargeAmount_All": null,
                "taskPeople": 30,
                "rechargePeople": 0,
                "taskRechargePeople": 30,
                "efficientPeople": 0,
                "title": null,
                "title2": null,
                "isReceive": 0,
                "isFinshed": false,
                "beginDate": "2000-01-01",
                "endDate": "2099-01-01"
            },
            {
                "taskID": 5,
                "taskAmount": 2775.00,
                "rechargeAmount": 1200.00,
                "rechargeAmount_All": null,
                "taskPeople": 50,
                "rechargePeople": 0,
                "taskRechargePeople": 50,
                "efficientPeople": 0,
                "title": null,
                "title2": null,
                "isReceive": 0,
                "isFinshed": false,
                "beginDate": "2000-01-01",
                "endDate": "2099-01-01"
            },
            {
                "taskID": 6,
                "taskAmount": 4165.00,
                "rechargeAmount": 1200.00,
                "rechargeAmount_All": null,
                "taskPeople": 75,
                "rechargePeople": 0,
                "taskRechargePeople": 75,
                "efficientPeople": 0,
                "title": null,
                "title2": null,
                "isReceive": 0,
                "isFinshed": false,
                "beginDate": "2000-01-01",
                "endDate": "2099-01-01"
            },
            {
                "taskID": 7,
                "taskAmount": 5555.00,
                "rechargeAmount": 1200.00,
                "rechargeAmount_All": null,
                "taskPeople": 100,
                "rechargePeople": 0,
                "taskRechargePeople": 100,
                "efficientPeople": 0,
                "title": null,
                "title2": null,
                "isReceive": 0,
                "isFinshed": false,
                "beginDate": "2000-01-01",
                "endDate": "2099-01-01"
            },
            {
                "taskID": 8,
                "taskAmount": 11111.00,
                "rechargeAmount": 1200.00,
                "rechargeAmount_All": null,
                "taskPeople": 200,
                "rechargePeople": 0,
                "taskRechargePeople": 200,
                "efficientPeople": 0,
                "title": null,
                "title2": null,
                "isReceive": 0,
                "isFinshed": false,
                "beginDate": "2000-01-01",
                "endDate": "2099-01-01"
            },
            {
                "taskID": 9,
                "taskAmount": 27777.00,
                "rechargeAmount": 1200.00,
                "rechargeAmount_All": null,
                "taskPeople": 500,
                "rechargePeople": 0,
                "taskRechargePeople": 500,
                "efficientPeople": 0,
                "title": null,
                "title2": null,
                "isReceive": 0,
                "isFinshed": false,
                "beginDate": "2000-01-01",
                "endDate": "2099-01-01"
            },
            {
                "taskID": 10,
                "taskAmount": 55555.00,
                "rechargeAmount": 1200.00,
                "rechargeAmount_All": null,
                "taskPeople": 1000,
                "rechargePeople": 0,
                "taskRechargePeople": 1000,
                "efficientPeople": 0,
                "title": null,
                "title2": null,
                "isReceive": 0,
                "isFinshed": false,
                "beginDate": "2000-01-01",
                "endDate": "2099-01-01"
            },
            {
                "taskID": 11,
                "taskAmount": 111111.00,
                "rechargeAmount": 1200.00,
                "rechargeAmount_All": null,
                "taskPeople": 2000,
                "rechargePeople": 0,
                "taskRechargePeople": 2000,
                "efficientPeople": 0,
                "title": null,
                "title2": null,
                "isReceive": 0,
                "isFinshed": false,
                "beginDate": "2000-01-01",
                "endDate": "2099-01-01"
            },
            {
                "taskID": 12,
                "taskAmount": 277777.00,
                "rechargeAmount": 1200.00,
                "rechargeAmount_All": null,
                "taskPeople": 5000,
                "rechargePeople": 0,
                "taskRechargePeople": 5000,
                "efficientPeople": 0,
                "title": null,
                "title2": null,
                "isReceive": 0,
                "isFinshed": false,
                "beginDate": "2000-01-01",
                "endDate": "2099-01-01"
            }
        ],
        "chirldrenListDataList": null
    },
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