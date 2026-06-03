<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
date_default_timezone_set('Asia/Kolkata');

$response = [
    "data" => [
        [
            "typeID" => 12,
            "typeName" => "K3 10 Minute",
            "intervalM" => 10,
            "scope" => "1|10|100|1000",
            "betMultiple" => "1|5|10|20|50|100",
            "sort" => 4
        ],
        [
            "typeID" => 11,
            "typeName" => "K3 5 Minute",
            "intervalM" => 5,
            "scope" => "1|10|100|1000",
            "betMultiple" => "1|5|10|20|50|100",
            "sort" => 3
        ],
        [
            "typeID" => 10,
            "typeName" => "K3 3 Minute",
            "intervalM" => 3,
            "scope" => "1|10|100|1000",
            "betMultiple" => "1|5|10|20|50|100",
            "sort" => 2
        ],
        [
            "typeID" => 9,
            "typeName" => "K3 1 Minute",
            "intervalM" => 1,
            "scope" => "1|10|100|1000",
            "betMultiple" => "1|5|10|20|50|100",
            "sort" => 1
        ]
    ],
    "code" => 0,
    "msg" => "Succeed",
    "msgCode" => 0,
    "serviceNowTime" => date('Y-m-d H:i:s')
];

header('Content-Type: application/json');
echo json_encode($response, JSON_PRETTY_PRINT);
?>
