<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
date_default_timezone_set('Asia/Kolkata');
$current_time = date('Y-m-d H:i:s');
$response_data = array(
    "data" => array(
        array(
            "typeID" => 5,
            "name" => "ANUSHKA",
            "url" => "https://t.me/Anushka_abgroup",
            "sort" => 5
        )
    ),
    "code" => 0,
    "msg" => "Succeed",
    "msgCode" => 0,
    "serviceNowTime" => $current_time
);
$json_response = json_encode($response_data);
header('Content-Type: application/json');
echo $json_response;
?>
