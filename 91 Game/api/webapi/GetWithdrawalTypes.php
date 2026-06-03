<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
date_default_timezone_set('Asia/Kolkata');
$serviceNowTimeFormatted = date('Y-m-d H:i:s');

$jsonData = '{
    "data": {
        "withdrawlist": [
            {
                "withdrawID": 1,
                "name": " BANK CARD",
                "isAdd": 0,
                "withBeforeImgUrl": "https://ossimg.91admin123admin.com/91club/payNameIcon/WithBeforeImgIcon_2023091218325895iy.png",
                "withAfterImgUrl": "https://ossimg.91admin123admin.com/91club/payNameIcon/WithBeforeImgIcon2_20230912183258ejvp.png"
            }
        ]
    },
    "code": 0,
    "msg": "Succeed",
    "msgCode": 0,
    "serviceNowTime": "' . $serviceNowTimeFormatted . '"
}';

$data = json_decode($jsonData, true);

$response = json_encode($data, JSON_PRETTY_PRINT);

header('Content-Type: application/json');
echo $response;

?>
