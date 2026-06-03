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

$postData = file_get_contents("php://input");
$data = json_decode($postData, true);

if ($data !== null && isset($data['nikeName'])) {
    $sql = "SELECT phone FROM users WHERE token = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $username = $row['phone'];
        $nikeName = $data['nikeName'];

        $sql = "UPDATE users SET name_user=? WHERE phone=? AND token=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $nikeName, $username, $token);

        if ($stmt->execute()) {
            $response = [
                "code" => 0,
                "msg" => "Nickname updated successfully",
                "serviceNowTime" => date('Y-m-d H:i:s', time())
            ];
        } else {
            $response = [
                "code" => 1,
                "msg" => "Failed to update nickname: " . $conn->error,
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
} else {
    $response = [
        "code" => 4,
        "msg" => "No operation permission",
        "msgCode" => 2,
        "serviceNowTime" => date("Y-m-d H:i:s")
    ];
}

echo json_encode($response);
$conn->close();
header('Content-Type: application/json');
?>
