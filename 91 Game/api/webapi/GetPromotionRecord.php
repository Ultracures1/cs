<?php
header("Content-Type: application/json");

date_default_timezone_set('Asia/Kolkata');

$currentDateTime = date("Y-m-d H:i:s");

$responseData = [
    "data" => [
        "list" => [],
        "pageNo" => 1,
        "totalPage" => 0,
        "totalCount" => 0
    ],
    "code" => 0,
    "msg" => "Succeed",
    "msgCode" => 0,
    "serviceNowTime" => $currentDateTime
];

$responseJson = json_encode($responseData, JSON_PRETTY_PRINT);

echo $responseJson;
?>
