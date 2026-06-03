<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
date_default_timezone_set('Asia/Kolkata');

$current_time = new DateTime('now');
$current_time_formatted = $current_time->format('Y-m-d H:i:s');

$json_response = '{
    "data": {
        "typeList": [
            {
                "type": 0,
                "typeName": "Bet amount reduced",
                "typeNameCode": "8000"
            },
            {
                "type": 1,
                "typeName": "Agency commission",
                "typeNameCode": "8001"
            },
            {
                "type": 2,
                "typeName": "Jackpot increase",
                "typeNameCode": "8002"
            },
            {
                "type": 3,
                "typeName": "Red envelope",
                "typeNameCode": "8003"
            },
            {
                "type": 4,
                "typeName": "Recharge increase",
                "typeNameCode": "8004"
            },
            {
                "type": 5,
                "typeName": "Withdrawal reduction",
                "typeNameCode": "8005"
            },
            {
                "type": 6,
                "typeName": "Cash back",
                "typeNameCode": "8006"
            },
            {
                "type": 7,
                "typeName": "Daily check-in",
                "typeNameCode": "8007"
            },
            {
                "type": 8,
                "typeName": "Agent red envelope recharge",
                "typeNameCode": "8008"
            },
            {
                "type": 9,
                "typeName": "Withdrawal rejected",
                "typeNameCode": "8009"
            },
            {
                "type": 10,
                "typeName": "Recharge gift",
                "typeNameCode": "8010"
            },
            {
                "type": 11,
                "typeName": "Manual recharge",
                "typeNameCode": "8011"
            },
            {
                "type": 12,
                "typeName": "Sign up to send money",
                "typeNameCode": "8012"
            },
            {
                "type": 13,
                "typeName": "Bonus recharge",
                "typeNameCode": "8013"
            },
            {
                "type": 14,
                "typeName": "First full gift",
                "typeNameCode": "8014"
            }
        ]
    },
    "code": 0,
    "msg": "Succeed",
    "msgCode": 0,
    "serviceNowTime": "' . $current_time_formatted . '"
}';

header('Content-Type: application/json');


echo $json_response;
