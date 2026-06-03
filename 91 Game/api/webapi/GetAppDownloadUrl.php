<?php

header('Content-Type: application/json');
date_default_timezone_set('Asia/Kolkata');

$response = [
    "data" => [
        "androidUrl" => "https://abcoders.in/api/abgroup.apk",
        "iosUrl" => "https://2gyqm.in/",
        "isAppForceUpdate" => 0,
        "latestAndroidShellVersion" => 0.0,
        "latestIOSShellVersion" => 0.0,
        "latestAndroidVersion" => 0.0,
        "latestIOSVersion" => 0.0
    ],
    "code" => 0,
    "msg" => "Succeed",
    "msgCode" => 0,
    "serviceNowTime" => date('Y-m-d H:i:s')
];

echo json_encode($response);

?>
