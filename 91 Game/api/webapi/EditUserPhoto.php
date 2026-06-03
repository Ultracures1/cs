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

if ($data !== null && isset($data['userPhoto'])) {
    $sql = "SELECT phone FROM users WHERE token = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $username = $row['phone'];
        $userPhoto = $data['userPhoto'];

        $sql = "UPDATE users SET ctv=? WHERE phone=? AND token=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $userPhoto, $username, $token);

        if ($stmt->execute()) {
            $response = [
                "code" => 0,
                "msg" => "User photo updated successfully",
                "serviceNowTime" => date('Y-m-d H:i:s', time())
            ];
        } else {
            $response = [
                "code" => 1,
                "msg" => "Error updating user photo: " . $conn->error
            ];
        }

        echo json_encode($response, JSON_PRETTY_PRINT);
    } else {
        echo json_encode([
            "code" => 4,
        "msg" => "No operation permission",
        "msgCode" => 2,
        "serviceNowTime" => date("Y-m-d H:i:s")
        ], JSON_PRETTY_PRINT);
    }
} else {
    echo json_encode([
         "code" => 4,
        "msg" => "No operation permission",
        "msgCode" => 2,
        "serviceNowTime" => date("Y-m-d H:i:s")
    ], JSON_PRETTY_PRINT);
}

$conn->close();
header('Content-Type: application/json');
?>
