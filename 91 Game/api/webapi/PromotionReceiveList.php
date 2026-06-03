<?php
header("Content-Type: application/json");

date_default_timezone_set('Asia/Kolkata');

$data = [
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

echo json_encode($data, JSON_PRETTY_PRINT);
?>
