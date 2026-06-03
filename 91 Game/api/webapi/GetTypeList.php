<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
date_default_timezone_set('Asia/Kolkata');

$response = [
    "data" => [
        [
            "typeID" => 4,
            "typeName" => "10 minute",
            "intervalM" => 10,
            "scope" => "1|10|100|1000",
            "betMultiple" => "1|5|10|20|50|100",
            "sort" => 4
        ],
        [
            "typeID" => 3,
            "typeName" => "5 minute",
            "intervalM" => 5,
            "scope" => "1|10|100|1000",
            "betMultiple" => "1|5|10|20|50|100",
            "sort" => 3
        ],
        [
            "typeID" => 2,
            "typeName" => "3 minute",
            "intervalM" => 3,
            "scope" => "1|10|100|1000",
            "betMultiple" => "1|5|10|20|50|100",
            "sort" => 2
        ],
        [
            "typeID" => 1,
            "typeName" => "1 minute",
            "intervalM" => 1,
            "scope" => "1|10|100|1000",
            "betMultiple" => "1|5|10|20|50|100",
            "sort" => 1
        ]
    ],
    "code" => 0,
    "msg" => "Succeed",
    "msgCode" => 0,
    "serviceNowTime" => date('Y-m-d H:i:s', time())
];

header('Content-Type: application/json');
echo json_encode($response, JSON_PRETTY_PRINT);
?>
