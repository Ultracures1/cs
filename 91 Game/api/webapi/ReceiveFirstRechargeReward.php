<?php
ini_set('display_errors', 1);

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
    exit(json_encode([
        "code" => 5,
        "msg" => "Connection failed: " . $conn->connect_error,
        "msgCode" => 3,
        "serviceNowTime" => date("Y-m-d H:i:s")
    ]));
}

$sql = "SELECT phone FROM users WHERE token = ?";
$stmt = $conn->prepare($sql);
if (!$stmt) {
    exit(json_encode([
        "code" => 9,
        "msg" => "Failed to prepare statement: " . $conn->error,
        "msgCode" => 7,
        "serviceNowTime" => date("Y-m-d H:i:s")
    ]));
}
$stmt->bind_param("s", $token);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    exit(json_encode([
        "code" => 6,
        "msg" => "Token not found",
        "msgCode" => 4,
        "serviceNowTime" => date("Y-m-d H:i:s")
    ]));
}

$row = $result->fetch_assoc();
$phone = $row['phone'];

$sql = "SELECT level FROM firstrecharge WHERE phone = ? AND rcvd = 'no'";
$stmt = $conn->prepare($sql);
if (!$stmt) {
    exit(json_encode([
        "code" => 9,
        "msg" => "Failed to prepare statement: " . $conn->error,
        "msgCode" => 7,
        "serviceNowTime" => date("Y-m-d H:i:s")
    ]));
}
$stmt->bind_param("s", $phone);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    exit(json_encode([
        "code" => 7,
        "msg" => "First recharge not found",
        "msgCode" => 5,
        "serviceNowTime" => date("Y-m-d H:i:s")
    ]));
}

$rechargeRow = $result->fetch_assoc();
$level = $rechargeRow['level'];

$rewardAmounts = [
    1 => 56,
    2 => 96,
    3 => 216,
    4 => 376,
    5 => 976,
    6 => 2776,
    7 => 11776
];

$conn->begin_transaction();

try {
    $rewardAmount = $rewardAmounts[$level];
    $sql = "UPDATE users SET money = ROUND(money + ?, 2) WHERE phone = ?";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        throw new Exception("Failed to prepare statement: " . $conn->error);
    }
    $stmt->bind_param("ds", $rewardAmount, $phone);
    $stmt->execute();
    
    $sql = "UPDATE firstrecharge SET rcvd = 'yes' WHERE phone = ? AND level = ?";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        throw new Exception("Failed to prepare statement: " . $conn->error);
    }
    $stmt->bind_param("si", $phone, $level);
    $stmt->execute();
    
    $conn->commit();
    
    exit(json_encode([
        "code" => 0,
        "msg" => "Succeed",
        "msgCode" => 0,
        "serviceNowTime" => date("Y-m-d H:i:s")
    ]));
} catch (Exception $e) {
    $conn->rollback();
    exit(json_encode([
        "code" => 8,
        "msg" => "Failed to update data: " . $e->getMessage(),
        "msgCode" => 6,
        "serviceNowTime" => date("Y-m-d H:i:s")
    ]));
}

?>
