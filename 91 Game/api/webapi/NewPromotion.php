<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

if (!isset($_COOKIE['token'])) {
    exit(json_encode([
        "code" => 4,
        "msg" => "No operation permission",
        "msgCode" => 2,
        "serviceNowTime" => date("Y-m-d H:i:s")
    ]));
}

$token = $_COOKIE['token'];

$servername = "localhost";
$username = "abcoders_db";
$password = "abcoders_db";
$dbname = "abcoders_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

date_default_timezone_set('Asia/Kolkata');

$stmt = $conn->prepare("SELECT code FROM users WHERE token = ?");
$stmt->bind_param("s", $token);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $code = $row["code"];

    $jsonData = '{
        "data": {
            "mylink": "https://abcoders.in/#/register?r_code=' . $code . '",
            "aglink": "MTg5MCY9Jj0mZXlKaFoyVnVkRjlwWkNJNk1qVXpNRGd4ZlE9PSY9Jj0mVFlLUDhY",
            "mycode": "' . $code . '",
            "children_Lv_1_Count": 0,
            "children_Lv_Count_X": 0,
            "children_Lv_1_Count_Add": 0,
            "children_Lv_Count_X_Add": 0,
            "children_Lv_1_Count_Add_Yesterday": 0,
            "children_Lv_Count_X_Add_Yesterday": 0,
            "children_Lv_1_RechargesSumCount": 0,
            "children_Lv_RechargesSumCount": 0,
            "children_Lv_1_FirstRechargesCount": 0,
            "children_Lv_FirstRechargesCount": 0,
            "children_Lv_1_RechargesSumAmount": 0.0,
            "children_Lv_RechargesSumAmount": 0.0,
            "children_Lv_RebateAmount_Yesterday": 0.0,
            "children_Lv_1_RebateAmount_Yesterday": 0.0,
            "children_Lv_RebateAmount_Week": 0.0,
            "children_Lv_1_RebateAmount_X_Yesterday": 0.0,
            "children_Lv_RebateAmount": 0.0
        },
        "code": 0,
        "msg": "Succeed",
        "msgCode": 0,
        "serviceNowTime": "' . date('Y-m-d H:i:s') . '"
    }';

    $data = json_decode($jsonData, true);

    $response = json_encode($data, JSON_PRETTY_PRINT);

    header('Content-Type: application/json');
    echo $response;
} else {
    exit(json_encode([
        "code" => 4,
        "msg" => "Invalid token",
        "msgCode" => 3,
        "serviceNowTime" => date("Y-m-d H:i:s")
    ]));
}

$stmt->close();
$conn->close();
?>
