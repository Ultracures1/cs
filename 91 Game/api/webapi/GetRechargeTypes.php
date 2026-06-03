<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
$postData = file_get_contents("php://input");

$data = json_decode($postData, true);

if (!isset($data['payid'])) {
    exit(json_encode([
        "code" => 1,
        "msg" => "payID not found in payload"
    ]));
}

$payID = $data['payid'];

$responseData = [];

if ($payID == 1) {
    $responseData = [
        "rechargetypelist" => [
            [
                "payTypeID" => 1,
                "payID" => 1,
                "payName" => "UPI-SUPERPAY",
                "paySysName" => "IcePayIndia",
                "miniPrice" => 100.00,
                "maxPrice" => 50000.00,
                "scope" => "100|300|500|1000|5000|10000",
                "paySendUrl" => "https://abcoders.in/api/pay",
                "parameters" => "",
                "startTime" => "00:00",
                "endTime" => "24:00",
                "rechargeRifts" => 0.0000,
                "c2cUnitAmount" => null
            ]
        ]
    ];
} elseif ($payID == 2) {
    $responseData = [
        "rechargetypelist" => [
            [
                "payTypeID" => 2,
                "payID" => 2,
                "payName" => "UPI-Quick",
                "paySysName" => null,
                "miniPrice" => 100.00,
                "maxPrice" => 50000.00,
                "scope" => "100|500|1000|3000|5000|20000",
                "paySendUrl" => "https://abcoders.in/api/pay",
                "parameters" => "",
                "startTime" => "00:00",
                "endTime" => "24:00",
                "rechargeRifts" => 0.0000,
                "c2cUnitAmount" => null
            ]
        ]
    ];
} else {
    exit(json_encode([
        "code" => 1,
        "msg" => "Invalid payID"
    ]));
}

$response = [
    "data" => $responseData,
    "code" => 0,
    "msg" => "Succeed",
    "msgCode" => 0,
    "serviceNowTime" => date('Y-m-d H:i:s')
];

header('Content-Type: application/json');

echo json_encode($response);
?>
