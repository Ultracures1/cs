<?php
date_default_timezone_set('Asia/Kolkata');

header("Content-Type: application/json");

$response = [
    "data" => [
        "list" => [],
        "pageNo" => 1,
        "totalPage" => 0,
        "totalCount" => 0
    ],
    "code" => 0,
    "msg" => "Succeed",
    "msgCode" => 0,
    "serviceNowTime" => date("Y-m-d H:i:s")
];

echo json_encode($response);
?>