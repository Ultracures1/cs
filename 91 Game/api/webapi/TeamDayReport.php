<?php
header("Content-Type: application/json");

date_default_timezone_set('Asia/Kolkata');

$data = [
    "data" => [
        "data" => [
            "rebateAmountSum" => 0.0,
            "recahrgeCount" => 0,
            "recahrgeAmountSum" => 0.0,
            "firstRecahrgeCount" => 0,
            "firstRecahrgeAmountSum" => 0.0,
            "betCountSum" => 0,
            "betAmountSum" => 0.0
        ]
    ],
    "code" => 0,
    "msg" => "Succeed",
    "msgCode" => 0,
    "serviceNowTime" => date("Y-m-d H:i:s")
];

echo json_encode($data, JSON_PRETTY_PRINT);
?>
