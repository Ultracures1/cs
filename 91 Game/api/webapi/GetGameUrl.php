<?php
header("Content-Type: application/json");
date_default_timezone_set('Asia/Kolkata');

$response = array(
    "data" => null,
    "code" => 1,
    "msg" => "The test account cannot be accessed",
    "msgCode" => 304,
    "serviceNowTime" => date("Y-m-d H:i:s")
);

echo json_encode($response, JSON_PRETTY_PRINT);
?>
