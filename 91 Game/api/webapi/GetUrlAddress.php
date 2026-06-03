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
    
    $response = [
        "data" => [
            "datacode" => 0,
            "url" => "/#/register?invitationCode=$code"
        ],
        "code" => 0,
        "msg" => "Succeed",
        "msgCode" => 0,
        "serviceNowTime" => date("Y-m-d H:i:s")
    ];
    header('Content-Type: application/json');

    echo json_encode($response);
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
