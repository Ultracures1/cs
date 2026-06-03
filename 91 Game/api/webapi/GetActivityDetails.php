<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
header('Content-Type: application/json');

date_default_timezone_set('Asia/Kolkata');

$serviceNowTime = date('Y-m-d H:i:s');

$responseData = array(
    "data" => array(
        "title" => "abgroup Official Channel",
        "img" => "<p><b><span style=\"font-family: &quot;Arial Black&quot;;\">Click here to check </span><a href=\"https://t.me/+dEPAnGpD2NBlODc1\" target=\"_blank\"><span style=\"font-family: &quot;Arial Black&quot;;\">abgroup Official Channel</span></a></b></p>",
        "coverUrl" => "https://abcoders.in/assets/png/Banner_20240204130045ttfe1.png",
        "jumpType" => 1
    ),
    "code" => 0,
    "msg" => "Succeed",
    "msgCode" => 0,
    "serviceNowTime" => $serviceNowTime
);

$jsonResponse = json_encode($responseData, JSON_PRETTY_PRINT);

echo $jsonResponse;
?>
