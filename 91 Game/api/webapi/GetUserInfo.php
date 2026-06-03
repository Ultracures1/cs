<?php
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

    $sql = "SELECT * FROM users WHERE token = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $username = $row['phone'];
        $dbToken = $row['token'];

        if ($token === $dbToken) {
            $sql_unread = "SELECT COUNT(*) as unread_count FROM notification WHERE username = ? AND is_read = 'yes'";
            $stmt_unread = $conn->prepare($sql_unread);
            $stmt_unread->bind_param("s", $username);
            $stmt_unread->execute();
            $result_unread = $stmt_unread->get_result();
            $unread_row = $result_unread->fetch_assoc();
            $unread_count = $unread_row['unread_count'];

            $response = [
                "data" => [
                    "sign" => "8A1CEB9A3913D2558E78CBF5F9C9755B202F86D16838AE0D53A388FD27C3715B",
                    "userId" => $row['id_user'],
                    "userPhoto" => $row['ctv'],
                    "userName" => "91$username",
                    "nickName" => $row['name_user'],
                    "amount" => $row['money'],
                    "amountofCode" => 0.00,
                    "isWithdraw" => 0,
                    "message" => 0,
                    "withdrawCount" => 0,
                    "addTime" => "",
                    "userLoginDate" => $row['time'],
                    "startTime" => 0,
                    "endTime" => 0,
                    "fee" => 0.0,
                    "unRead" => $unread_count, 
                    "facebookAppID" => 0,
                    "googleAppID" => 0,
                    "twitterAppID" => 0,
                    "keyCode" => 0,
                    "uRate" => 91.15,
                    "trxRate" => 10.39,
                    "uGold" => 0.0,
                    "googleVerify" => 0,
                    "isvalidator" => 0,
                    "isRePwd" => "1",
                    "integral" => 0,
                    "isOpenPointMall" => "0",
                    "isOpenAmountOfCode" => "1",
                    "isOpenOfficialRechargeInputDialog" => "1",
                    "isAllowUserAddUSDT" => "1",
                    "isShowWalletTotalCT" => "1",
                    "isShowRechargeBankList" => "0",
                    "isPopupCommissionSwitch" => "0",
                    "groupDataShowAuth" => [
                        ["id" => 11, "isShow" => true],
                        ["id" => 12, "isShow" => true],
                        ["id" => 15, "isShow" => true],
                        ["id" => 16, "isShow" => true],
                        ["id" => 17, "isShow" => true],
                        ["id" => 18, "isShow" => true],
                        ["id" => 19, "isShow" => false],
                        ["id" => 20, "isShow" => true]
                    ],
                    "verifyMethods" => ["mobile" => "91$username", "email" => "", "google" => "0"],
                    "regType" => 1,
                    "userGroupAuth" => ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9"]
                ],
                "code" => 0,
                "msg" => "Succeed",
                "msgCode" => 0,
                "serviceNowTime" => date('Y-m-d H:i:s', time()) 
            ];

            echo json_encode($response, JSON_PRETTY_PRINT);
        } else {
            echo json_encode([
                "code" => 4,
                "msg" => "Invalid session token",
                "msgCode" => 3,
                "serviceNowTime" => date('Y-m-d H:i:s', time()) 
            ], JSON_PRETTY_PRINT);
        }
    } else {
        echo json_encode([
            "code" => 4,
            "msg" => "Invalid token",
            "msgCode" => 3,
            "serviceNowTime" => date('Y-m-d H:i:s', time()) 
        ], JSON_PRETTY_PRINT);
    }

    $stmt->close();
    $conn->close();
} else {
    echo json_encode([
       "code" => 4,
       "msg" => "Invalid token, session might be hijacked",
            "msgCode" => 3,
            "serviceNowTime" => date('Y-m-d H:i:s', time()) 
    ], JSON_PRETTY_PRINT);
}
header('Content-Type: application/json');
?>
