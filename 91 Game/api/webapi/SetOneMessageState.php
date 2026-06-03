<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
$servername = "localhost";
$username = "abcoders_db";
$password = "abcoders_db";
$dbname = "abcoders_db";

if (!isset($_COOKIE['token'])) {
    exit(json_encode([
        "code" => 1,
        "msg" => "Unauthorized access: Token not found"
    ]));
}

$token = $_COOKIE['token'];

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$postData = file_get_contents("php://input");
$data = json_decode($postData, true);

date_default_timezone_set('Asia/Kolkata');

$sql = "SELECT phone FROM users WHERE token = '" . $conn->real_escape_string($token) . "'";
$result = $conn->query($sql);

$row = $result->fetch_assoc();
$username = $row['phone'];

if ($result->num_rows == 0) {
    exit(json_encode([
        "code" => 1,
        "msg" => "Unauthorized access: Invalid token"
    ]));
}

if ($data !== null && isset($data['messageID'])) {
    $messageID = $data['messageID'];

    $sql = "DELETE FROM notification WHERE id = '" . $conn->real_escape_string($messageID) . "' AND username = '" . $conn->real_escape_string($username) . "'";

    if ($conn->query($sql) === TRUE) {
        $response = [
            "data" => 1,
            "code" => 0,
            "msg" => "Succeed",
            "msgCode" => 0,
            "serviceNowTime" => date('Y-m-d H:i:s', time())
        ];
    } else {
        $response = [
            "code" => 1,
            "msg" => "Failed to delete message: " . $conn->error,
            "serviceNowTime" => date('Y-m-d H:i:s', time())
        ];
    }
} else {
    $response = [
        "code" => 1,
        "msg" => "Invalid or missing messageID parameter",
        "serviceNowTime" => date('Y-m-d H:i:s', time())
    ];
}

$conn->close();
header('Content-Type: application/json');
echo json_encode($response);
?>
