<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
date_default_timezone_set('Asia/Kolkata');
$serviceNowTimeFormatted = date('Y-m-d H:i:s');

$jsonData = '{
    "data": {
        "typelist": [
            {
                "payID": 1,
                "payTypeID": 0,
                "payName": "UPI-APP",
                "paySysName": null,
                "payNameUrl": "https://ossimg.91admin123admin.com/91club/payNameIcon/payNameIcon_20230814220354pnun.png",
                "payNameUrl2": "https://ossimg.91admin123admin.com/91club/payNameIcon/payNameIcon2_20230814220354nknu.png",
                "minPrice": 0.0,
                "maxPrice": 0.0,
                "scope": null,
                "typeName": "UPI-APP",
                "typeNameCode": 0,
                "maxRechargeRifts": 0.0000,
                "sort": 100
            },
            {
                "payID": 2,
                "payTypeID": 0,
                "payName": "UPI-QR",
                "paySysName": "UPI-QR",
                "payNameUrl": "https://ossimg.91admin123admin.com/91club/payNameIcon/payNameIcon_20240111184108c4qw.png",
                "payNameUrl2": "https://ossimg.91admin123admin.com/91club/payNameIcon/payNameIcon2_2024011118410923yd.png",
                "minPrice": 0.0,
                "maxPrice": 0.0,
                "scope": null,
                "typeName": "UPI-QR",
                "typeNameCode": 0,
                "maxRechargeRifts": 0.0000,
                "sort": 96
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