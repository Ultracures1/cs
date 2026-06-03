<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
date_default_timezone_set('Asia/Kolkata');

function getUserData($token) {
    $servername = "localhost";
    $usernameDB = "abcoders_db";
    $password = "abcoders_db";
    $dbname = "abcoders_db";

    $conn = new mysqli($servername, $usernameDB, $password, $dbname);

    if ($conn->connect_error) {
        return [
            "code" => 4,
            "msg" => "No operation permission",
            "msgCode" => 2,
            "serviceNowTime" => date('Y-m-d H:i:s')
        ];
    }

    $sql = "SELECT phone FROM users WHERE token = '$token'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $username = $row['phone'];

        $sql = "SELECT money FROM users WHERE phone = '$username'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $money = $row["money"];
            $uRate = 91.15;
            $uGold = 0.0;

            $serviceNowTime = date('Y-m-d H:i:s', time());

            return [
                "data" => [
                    "amount" => $money,
                    "uRate" => $uRate,
                    "uGold" => $uGold
                ],
                "code" => 0,
                "msg" => "Recovery of the balance is begin",
                "msgCode" => 0,
                "serviceNowTime" => $serviceNowTime
            ];
        } else {
            return [
                "code" => 1,
                "msg" => "Failed to retrieve user's amount",
                "msgCode" => 101,
                "serviceNowTime" => date('Y-m-d H:i:s', time())
            ];
        }
    } else {
        return [
            "code" => 4,
            "msg" => "No operation permission",
            "msgCode" => 2,
            "serviceNowTime" => date('Y-m-d H:i:s', time())
        ];
    }

    $conn->close();
}

if (isset($_COOKIE['token'])) {
    $token = $_COOKIE['token'];
    $response = getUserData($token);
} else {
    $response = [
        "code" => 4,
        "msg" => "No operation permission",
        "msgCode" => 2,
        "serviceNowTime" => date('Y-m-d H:i:s', time())
    ];
}

header('Content-Type: application/json');
echo json_encode($response);

?>
