<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
date_default_timezone_set('Asia/Kolkata');

if(isset($_COOKIE['token'])) {
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
        $username = $row['phone'];

        $withdrawQuery = "SELECT IFNULL(SUM(money), 0.0) AS totalWithdraw FROM `withdraw` WHERE phone = '$username' AND status = 1";
        $rechargeQuery = "SELECT IFNULL(SUM(money), 0.0) AS totalRecharge FROM `recharge` WHERE phone = '$username' AND status = 1";
        $userQuery = "SELECT IFNULL(money, 0.00) AS money FROM `users` WHERE phone = '$username'";

        $withdrawResult = $conn->query($withdrawQuery);
        $rechargeResult = $conn->query($rechargeQuery);
        $userResult = $conn->query($userQuery);

        $data = array();

        if ($withdrawResult && $rechargeResult && $userResult) {
            $withdrawRow = $withdrawResult->fetch_assoc();
            $rechargeRow = $rechargeResult->fetch_assoc();
            $userRow = $userResult->fetch_assoc();

            $data = array(
                "thidGameBalanceList" => array(
                    array(
                        "vendorCode" => "Lottery",
                        "balance" => $userRow["money"]
                    )
                ),
               "totalWithdraw" => floatval($withdrawRow["totalWithdraw"]),
                "totalRecharge" => floatval($rechargeRow["totalRecharge"])
            );

            $response = array(
                "data" => $data,
                "code" => 0,
                "msg" => "Succeed",
                "msgCode" => 0,
                "serviceNowTime" => date("Y-m-d H:i:s")
            );
        } else {
            echo "Error executing SQL queries: " . $conn->error;
        }

        $conn->close();
    }
} 

if (!isset($response)) {
    $response = array(
        "code" => 4,
        "msg" => "No operation permission",
        "msgCode" => 2,
        "serviceNowTime" => date("Y-m-d H:i:s")
    );
}

header('Content-Type: application/json');
echo json_encode($response);

?>
