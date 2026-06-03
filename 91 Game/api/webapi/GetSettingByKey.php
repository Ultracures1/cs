<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
date_default_timezone_set('Asia/Kolkata');

$response = array(
    "data" => array(
        "settingID" => 55,
        "value1" => "0.01",
        "value2" => "",
        "settingKey" => "C2CWithdrawRewardRate",
        "settingName" => "C2C提现奖励比例(小数，如：1% 就填 0.01)"
    ),
    "code" => 0,
    "msg" => "Succeed",
    "msgCode" => 0,
    "serviceNowTime" => date("Y-m-d H:i:s")
);

header('Content-Type: application/json');
echo json_encode($response, JSON_PRETTY_PRINT);
?>
