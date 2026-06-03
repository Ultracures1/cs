<?php
header("Content-Type: application/json");

date_default_timezone_set('Asia/Kolkata');

$postData = file_get_contents("php://input");
$data = json_decode($postData, true);

$servername = "localhost";
$username = "abcoders_db";
$password = "abcoders_db";
$dbname = "abcoders_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    $response = [
        "code" => -1,
        "msg" => "Database connection failed",
        "msgCode" => 999,
        "serviceNowTime" => date("Y-m-d H:i:s")
    ];
    echo json_encode($response);
    exit();
}

$username = substr($data['username'], 2); 
$username = $conn->real_escape_string($username);
$password = $conn->real_escape_string($data['password']);
$smsvcode = $conn->real_escape_string($data['smsvcode']);

$sql = "SELECT * FROM users WHERE phone = '$username' AND otp = '$smsvcode'";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
    $response = [
        "code" => 2,
        "msg" => "Verification code error",
        "msgCode" => 107,
        "serviceNowTime" => date("Y-m-d H:i:s")
    ];
    echo json_encode($response);
} else {
    $updateSql = "UPDATE users SET password = '$password', otp = '1234' WHERE phone = '$username'";
    if ($conn->query($updateSql) === TRUE) {
        $response = [
            "code" => 0,
            "msg" => "Succeed",
            "msgCode" => 0,
            "serviceNowTime" => date("Y-m-d H:i:s")
        ];
        echo json_encode($response);
    } else {
        $response = [
            "code" => -1,
            "msg" => "Failed to update password",
            "msgCode" => 999,
            "serviceNowTime" => date("Y-m-d H:i:s")
        ];
        echo json_encode($response);
    }
}

$conn->close();
?>
