<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
date_default_timezone_set('Asia/Kolkata');
$serviceNowTimeFormatted = date('Y-m-d H:i:s');

$jsonData = '{
    "data": {
        "isOpenRegisterSMS": "0",
        "isOpenRegisterEmail": "1",
        "registerEmailState": "0",
        "registerMobileState": "1",
        "registerStateMsg": null,
        "isOpenForgetPasswordSMS": "1",
        "isOpenForgetPasswordEmail": "1",
        "isOpenAddWithdrawSMS": "0",
        "isOpenAddWithdrawEmail": "0",
        "isOpenCaptcha": "0",
        "isOpenGoogleVerifySms": "1",
        "isOpenGoogleVerifyEmail": "1",
        "addBankCardOpenEmail": "1",
        "isOpenExternalAccount": "0",
        "isInvitecode": "1"
    },
    "code": 0,
    "msg": "Succeed",
    "msgCode": 0,
    "serviceNowTime": "' . $serviceNowTimeFormatted . '"
}';

$data = json_decode($jsonData, true);

$response = json_encode($data, JSON_PRETTY_PRINT);

header('Content-Type: application/json');
echo $response;
?>
