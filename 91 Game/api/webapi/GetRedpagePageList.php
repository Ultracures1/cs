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

if (!$userRow) {
    exit(json_encode([
        "code" => 3,
        "msg" => "User not found",
        "msgCode" => 404,
        "serviceNowTime" => date("Y-m-d H:i:s")
    ]));
}

$phone = $userRow['phone'];

$sql = "SELECT id, amount, time FROM giftused WHERE phone = ?";
$stmt = $conn->prepare($sql);
if (!$stmt) {
    exit(json_encode([
        "code" => 500,
        "msg" => "Failed to prepare statement: " . $conn->error
    ]));
}
$stmt->bind_param("s", $phone);
$stmt->execute();
$result = $stmt->get_result();

$giftUsedList = [];
while ($row = $result->fetch_assoc()) {
    $giftUsedList[] = [
        "finanID" => $row['id'],
        "issueNumber" => "0",
        "amount" => number_format($row['amount'], 2),
        "addTime" => date("Y-m-d H:i:s", strtotime($row['time'])),
        "type" => 3,
        "userID" => $phone,
        "reserved" => "4019",
        "remark" => "1",
        "backAmount" => 5.00, // Default backAmount as required
        "orderNum" => date("YmdHis") . rand(1000000, 9999999)
    ];
}

$response = [
    "data" => [
        "list" => $giftUsedList,
        "pageNo" => 1,
        "totalPage" => 1,
        "totalCount" => count($giftUsedList)
    ],
    "code" => 0,
    "msg" => "Succeed",
    "msgCode" => 0,
    "serviceNowTime" => date("Y-m-d H:i:s")
];

echo json_encode($response);

$stmt->close();
$conn->close();
?>
