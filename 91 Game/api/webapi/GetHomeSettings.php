<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
date_default_timezone_set('Asia/Kolkata');
$serviceNowTimeFormatted = date('Y-m-d H:i:s');

$jsonData = '{
    "data": {
        "isShowAppDownloadUp": true,
        "isShowAppDownloadDown": false,
        "isShowLotteryDragon": true,
        "isSplitLocalEWallet": true,
        "jackportMaxReswadAmount": 500.00,
        "projectName": "abgroup",
        "projectLogo": "https://abcoders.in/assets/png/logo1.png",
        "languages": "en|hd",
        "webIco": "https://abcoders.in/21.png",
        "headLogo": "https://abcoders.in/19.png",
        "dollarSign": "₹",
        "upperOrLower": "0",
        "defaultCurrentLanguage": "en",
        "registerMobile": "1",
        "registerEmail": "0",
        "areaPhoneLenList": [
            {
                "area": "+91",
                "len": "10"
            }
        ],
        "registerSms": "0",
        "isOpenLoginChangeLanguage": "1",
        "rewardValidityTime": 1,
        "electronicWinRateExternalLink": "",
        "electronicWinRateImgUrl": "https://ossimg.91admin123admin.com/abcoders_db",
        "isShowElectronicWinRateExternalLink": false,
        "isShowAppHandCodeWashingSwitch": true,
        "isShowHotGameWinOdds": true,
        "ossUrl": "https://ossimg.91admin123admin.com",
        "bigTurntableLink": null,
        "isOpenActivityAward": true
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
