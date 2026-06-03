<?php
error_reporting(E_ALL); // Report all PHP errors
ini_set('display_errors', 1); // Display errors on the screen
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
date_default_timezone_set('Asia/Kolkata');

if (isset($_COOKIE['token'])) {
    $token = $_COOKIE['token'];

    $servername = "localhost";
    $usernameDB = "abcoders_db";
    $password = "abcoders_db";
    $dbname = "abcoders_db";

    $conn = new mysqli($servername, $usernameDB, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM users WHERE token = '$token'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $phone = $row['phone'];
        $money = $row['money'];

        $bankSql = "SELECT * FROM user_bank WHERE phone = '$phone'";
        $bankResult = $conn->query($bankSql);

        if ($bankResult->num_rows > 0) {
            $bankRow = $bankResult->fetch_assoc();
            $name_bank = $bankRow['name_bank'];
            $name_user = $bankRow['name_user'];
            $account = $bankRow['account'];
            $ifsc = $bankRow['ifsc'];
        } else {
            $name_user = null;
            $account = null;
            $ifsc = null;
        }

        // Ensure account is not null before masking
        $maskedAccount = null;
        if (!is_null($account)) {
            $length = strlen($account);
            $maskedAccount = substr($account, 0, 3) . str_repeat('*', max(0, $length - 8)) . substr($account, -3);
        }

        // Ensure phone is not null before masking
        $maskedPhone = null;
        if (!is_null($phone)) {
            $length = strlen($phone);
            $maskedPhone = substr($phone, 0, -5) . str_repeat('*', max(0, $length - 5));
        }

        $withdrawalsList = array();
        if ($name_user !== null) {
            $withdrawalsList[] = array(
                "bid" => 1284069,
                "bankName" => $name_bank,
                "beneficiaryName" => "",
                "accountNo" => $maskedAccount,
                "ifsCode" => $ifsc,
                "withType" => 1,
                "mobileNo" => $maskedPhone,
                "bankProvince" => "",
                "bankCity" => "",
                "bankAddress" => ""
            );
        }

        $response = array(
            "data" => array(
                "lastBandCarkName" => $name_user,
                "withdrawalslist" => $withdrawalsList,
                "withdrawalsrule" => array(
                    "amountofCode" => 0.00,
                    "withdrawCount" => 3,
                    "withdrawRemainingCount" => 3,
                    "startTime" => "00:05",
                    "endTime" => "23:55",
                    "fee" => 0.0,
                    "minPrice" => 110.00,
                    "maxPrice" => 200000.00,
                    "amount" => floatval($money),
                    "canWithdrawAmount" => floatval($money),
                    "c2cUnitAmount" => 0.0,
                    "uRate" => 0.0,
                    "uGold" => 0.0
                )
            ),
            "code" => 0,
            "msg" => "Succeed",
            "msgCode" => 0,
            "serviceNowTime" => date('Y-m-d H:i:s')
        );

        $jsonResponse = json_encode($response);

        header('Content-Type: application/json');
        echo $jsonResponse;

        $conn->close();
    } else {
        echo "No user found with the provided token.";
    }
} else {
    echo "Token not found in cookie.";
}
?>
