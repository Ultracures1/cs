<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
date_default_timezone_set('Asia/Kolkata');

$postData = file_get_contents("php://input");
$data = json_decode($postData, true);

$response = array(
    "data" => array(
        "gameStatis" => [],
        "sumBetAmount" => 0.0
    ),
    "code" => 0,
    "msg" => "Succeed",
    "msgCode" => 0,
    "serviceNowTime" => date("Y-m-d H:i:s")
);

if ($data && isset($data['startDate']) && isset($data['endDate'])) {
    $startDate = $data['startDate'];
    $endDate = $data['endDate'];

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

        $stmt = $conn->prepare("SELECT phone FROM users WHERE token = ?");
        $stmt->bind_param("s", $token);

        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $phone = $row['phone'];

            $stmt2 = $conn->prepare("SELECT SUM(get) AS total_get, SUM(fee) AS total_fee, SUM(money) AS total_money, COUNT(*) AS total_rows FROM minutes_1 WHERE phone = ? AND DATE(today) BETWEEN ? AND ?");
            $stmt2->bind_param("sss", $phone, $startDate, $endDate);

            $stmt2->execute();

            $result2 = $stmt2->get_result();

            if ($result2->num_rows > 0) {
                $row2 = $result2->fetch_assoc();
                $total_get = $row2['total_get'];
                $total_fee = $row2['total_fee'];
                $total_money = $row2['total_money'];
                $total_rows = $row2['total_rows'];

                $betAmount = $total_fee + $total_money;
                $betCount = $total_rows;
                $betWinLossAmount = $total_get;
                $sumBetAmount = $total_fee + $total_money;

                if ($betWinLossAmount === null) {
                    $response = array(
                        "data" => array(
                            "gameStatis" => [],
                            "sumBetAmount" => 0.0
                        ),
                        "code" => 0,
                        "msg" => "Succeed",
                        "msgCode" => 0,
                        "serviceNowTime" => date("Y-m-d H:i:s")
                    );
                } else {
                    $response["data"]["gameStatis"][] = array(
                        "gameType" => 0,
                        "gameTypeName" => "lottery",
                        "betAmount" => $betAmount,
                        "betCount" => $betCount,
                        "betWinLossAmount" => $betWinLossAmount
                    );

                    $response["data"]["sumBetAmount"] = $sumBetAmount;
                }
            }

            $stmt2->close();
        }

        $stmt->close();

        $conn->close();
    }
} else {
    $response = array(
        "code" => -1,
        "msg" => "Invalid JSON data or missing startDate and/or endDate.",
        "msgCode" => -1,
        "serviceNowTime" => date("Y-m-d H:i:s")
    );
}

header('Content-Type: application/json');
echo json_encode($response);

?>
