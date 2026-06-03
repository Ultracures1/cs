<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
if (!isset($_COOKIE['token'])) {
    $response = [
       "code" => 4,
        "msg" => "No operation permission",
        "msgCode" => 2,
        "serviceNowTime" => date("Y-m-d H:i:s")
    ];
    exit(json_encode($response));
}

$token = $_COOKIE['token'];

$servername = "localhost";
$username = "abcoders_db";
$password = "abcoders_db";
$dbname = "abcoders_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    $response = [
        "code" => 1,
        "msg" => "Database connection failed"
    ];
    exit(json_encode($response));
}

$sql = "SELECT phone FROM users WHERE token = '$token'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $username = $row['phone'];

    $sql = "SELECT money FROM users WHERE phone='" . $conn->real_escape_string($username) . "'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $balance = $row['money'];

        date_default_timezone_set('Asia/Kolkata');

        $response = [
            "data" => [
                "amount" => $balance
            ],
            "code" => 0,
            "msg" => "Succeed",
            "msgCode" => 0,
            "serviceNowTime" => date('Y-m-d H:i:s', time())
        ];
    } else {
        $response = [
            "code" => 1,
            "msg" => "User not found",
            "msgCode" => 101,
            "serviceNowTime" => date('Y-m-d H:i:s', time())
        ];
    }
} else {
    $response = [
        "code" => 4,
        "msg" => "No operation permission",
        "msgCode" => 2,
        "serviceNowTime" => date("Y-m-d H:i:s")
    ];
}

$conn->close();
header('Content-Type: application/json');
echo json_encode($response);

?>
