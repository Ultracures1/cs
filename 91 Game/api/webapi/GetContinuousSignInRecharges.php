<?php

header('Content-Type: application/json');

date_default_timezone_set('Asia/Kolkata');

$response = [
    "data" => [
        "signIn" => [
            "signCount" => 0,
            "isCycle" => 0,
            "signInSum" => "0"
        ],
        "signInRechargesList" => [
            [
                "rechargesID" => 1,
                "amount" => 200.00,
                "day" => 1,
                "bouns" => 5.00,
                "isReceive" => 0
            ],
            [
                "rechargesID" => 2,
                "amount" => 1000.00,
                "day" => 2,
                "bouns" => 18.00,
                "isReceive" => 0
            ],
            [
                "rechargesID" => 3,
                "amount" => 3000.00,
                "day" => 3,
                "bouns" => 100.00,
                "isReceive" => 0
            ],
            [
                "rechargesID" => 4,
                "amount" => 10000.00,
                "day" => 4,
                "bouns" => 200.00,
                "isReceive" => 0
            ],
            [
                "rechargesID" => 5,
                "amount" => 20000.00,
                "day" => 5,
                "bouns" => 400.00,
                "isReceive" => 0
            ],
            [
                "rechargesID" => 6,
                "amount" => 100000.00,
                "day" => 6,
                "bouns" => 3000.00,
                "isReceive" => 0
            ],
            [
                "rechargesID" => 7,
                "amount" => 200000.00,
                "day" => 7,
                "bouns" => 7000.00,
                "isReceive" => 0
            ]
        ]
    ],
    "code" => 0,
    "msg" => "Succeed",
    "msgCode" => 0,
    
    "serviceNowTime" => date('Y-m-d H:i:s')
];


echo json_encode($response);

?>
