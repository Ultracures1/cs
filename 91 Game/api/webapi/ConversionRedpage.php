<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
header("Content-Type: application/json");

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
        "code" => 500,
        "msg" => "Database connection failed: " . $conn->connect_error
    ]));
}

date_default_timezone_set('Asia/Kolkata');
$current_time = date('Y-m-d H:i:s');

$postData = file_get_contents("php://input");
$data = json_decode($postData, true);
$giftCode = $data['giftCode'] ?? '';

$sql = "SELECT `use`, amount, code, used FROM gift WHERE code = ?";
$stmt = $conn->prepare($sql);
if (!$stmt) {
    exit(json_encode([
        "code" => 500,
        "msg" => "Failed to prepare statement: " . $conn->error
    ]));
}
$stmt->bind_param("s", $giftCode);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if (!$row) {
    exit(json_encode([
        "data" => null,
        "code" => 1,
        "msg" => "Redemption code error",
        "msgCode" => 230,
        "serviceNowTime" => date("Y-m-d H:i:s")
    ]));
}

$use = $row['use'];
$used = $row['used'];
$code = $row['code'];
$amount = $row['amount'];

if ($used > $use) {
    exit(json_encode([
        "data" => null,
        "code" => 1,
        "msg" => "This red envelope has run out.",
        "msgCode" => 235,
        "serviceNowTime" => date("Y-m-d H:i:s")
    ]));
}

$sql = "SELECT phone FROM users WHERE token = ?";
$stmt = $conn->prepare($sql);
if (!$stmt) {
    exit(json_encode([
        "code" => 500,
        "msg" => "Failed to prepare statement: " . $conn->error
    ]));
}
$stmt->bind_param("s", $token);
$stmt->execute();
$result = $stmt->get_result();
$userRow = $result->fetch_assoc();

$phoneNumber = $userRow['phone'];

$todayDate = date("Y-m-d");
$checkGiftUsedSql = "SELECT * FROM giftused WHERE phone = ? AND DATE(time) = ?";
$stmt = $conn->prepare($checkGiftUsedSql);
if (!$stmt) {
    exit(json_encode([
        "code" => 500,
        "msg" => "Failed to prepare statement: " . $conn->error
    ]));
}
$stmt->bind_param("ss", $phoneNumber, $todayDate);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    exit(json_encode([
        "data" => null,
        "code" => 1,
        "msg" => "This red envelope has run out.",
        "msgCode" => 235,
        "serviceNowTime" => date("Y-m-d H:i:s")
    ]));
}

$conn->begin_transaction();

$updateGiftSql = "UPDATE gift SET used = used + 1 WHERE code = ?";
$stmt = $conn->prepare($updateGiftSql);
if (!$stmt) {
    $conn->rollback();
    exit(json_encode([
        "code" => 500,
        "msg" => "Failed to prepare statement: " . $conn->error
    ]));
}
$stmt->bind_param("s", $code);
$stmt->execute();
$stmt->close();

$insertGiftUsedSql = "INSERT INTO giftused (phone, amount, time) VALUES (?, ?, ?)";
$stmt = $conn->prepare($insertGiftUsedSql);
if (!$stmt) {
    $conn->rollback();
    exit(json_encode([
        "code" => 500,
        "msg" => "Failed to prepare statement: " . $conn->error
    ]));
}

$stmt->bind_param("sds", $phoneNumber, $amount, $current_time);
$stmt->execute();
$stmt->close();


$updateUsersSql = "UPDATE users SET money = money + ? WHERE phone = ?";
$stmt = $conn->prepare($updateUsersSql);
if (!$stmt) {
    $conn->rollback(); 
    exit(json_encode([
        "code" => 500,
        "msg" => "Failed to prepare statement: " . $conn->error
    ]));
}
$stmt->bind_param("ds", $amount, $phoneNumber);
$stmt->execute();
$stmt->close();

$conn->commit();


echo json_encode([
    "data" => [
        "amount" => number_format($amount, 2),
    ],
    "code" => 0,
    "msg" => "Exchange successful",
    "msgCode" => 233,
    "serviceNowTime" => date("Y-m-d H:i:s")
]);

$conn->close();
?>
