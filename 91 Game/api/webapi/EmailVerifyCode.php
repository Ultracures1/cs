<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
date_default_timezone_set('Asia/Kolkata');

$response = array(
    "code" => 1,
    "msg" => "User not exists",
    "msgCode" => 101,
    "serviceNowTime" => date("Y-m-d H:i:s")
);

header('Content-Type: application/json');
echo json_encode($response);
?>
