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

$sql = "SELECT phone FROM users WHERE token='" . $conn->real_escape_string($token) . "'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $username = $row['phone']; 
    $sql_balance = "SELECT money FROM users WHERE phone='" . $conn->real_escape_string($username) . "'";
    $result_balance = $conn->query($sql_balance);

    if ($result_balance->num_rows > 0) {
        $row_balance = $result_balance->fetch_assoc();
        $balance = $row_balance['money'];

        date_default_timezone_set('Asia/Kolkata');

        $response = [
            "data" => [
                "amount" => $balance
            ],
            "code" => 0,
            "msg" => "Succeed",
            "msgCode" => 0,
            "serviceNowTime" => date("Y-m-d H:i:s")
        ];

        echo json_encode($response);
    } else {
        echo json_encode([
         "code" => 4,
        "msg" => "No operation permission",
        "msgCode" => 2,
        "serviceNowTime" => date("Y-m-d H:i:s")
        ]);
    }
} else {
    echo json_encode([
        "code" => 4,
        "msg" => "No operation permission",
        "msgCode" => 2,
        "serviceNowTime" => date("Y-m-d H:i:s")
    ]);
}

$conn->close();
header('Content-Type: application/json');
?>
