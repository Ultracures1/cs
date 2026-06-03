<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
date_default_timezone_set('Asia/Kolkata');

$postData = file_get_contents("php://input");
$data = json_decode($postData, true);

if ($data === null) {
    $response = array(
        "code" => 1,
        "msg" => "Error decoding JSON data.",
        "msgCode" => 400,
        "serviceNowTime" => date("Y-m-d H:i:s")
    );
    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}

if (!isset($_COOKIE['token'])) {
    $response = array(
        "code" => 1,
        "msg" => "Token not provided.",
        "msgCode" => 401,
        "serviceNowTime" => date("Y-m-d H:i:s")
    );
    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}

$token = $_COOKIE['token'];

$servername = "localhost";
$usernameDB = "abcoders_db";
$password = "abcoders_db";
$dbname = "abcoders_db";

$conn = new mysqli($servername, $usernameDB, $password, $dbname);

if ($conn->connect_error) {
    $response = array(
        "code" => 1,
        "msg" => "Connection failed: " . $conn->connect_error,
        "msgCode" => 500,
        "serviceNowTime" => date("Y-m-d H:i:s")
    );
    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}

$userSql = "SELECT phone, invite, code, money FROM users WHERE token = ?";
$stmt = $conn->prepare($userSql);
$stmt->bind_param("s", $token);
$stmt->execute();
$userResult = $stmt->get_result();

if ($userResult === false) {
    $response = array(
        "code" => 1,
        "msg" => "Error executing database query: " . $stmt->error,
        "msgCode" => 500,
        "serviceNowTime" => date("Y-m-d H:i:s")
    );
    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}

if ($userResult->num_rows <= 0) {
    $response = array(
        "code" => 1,
        "msg" => "No user found with the provided token.",
        "msgCode" => 404,
        "serviceNowTime" => date("Y-m-d H:i:s")
    );
    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}

$userRow = $userResult->fetch_assoc();
$phone = $userRow['phone'];
$invite = $userRow['invite'];
$code = $userRow['code'];
$money = $userRow['money'];

$issuenumber = isset($data['issuenumber']) ? $data['issuenumber'] : null;
$amount = isset($data['amount']) ? $data['amount'] : null;
$selectType = isset($data['selectType']) ? $data['selectType'] : null;
$betCount = isset($data['betCount']) ? $data['betCount'] : null;
$typeId = isset($data['typeId']) ? $data['typeId'] : null;
$gameType = '';

$amount = $betCount * $amount; 

switch ($typeId) {
    case 1:
        $gameType = 'wingo';
        break;
    case 2:
        $gameType = 'wingo3';
        break;
    case 3:
        $gameType = 'wingo5';
        break;
    case 4:
        $gameType = 'wingo10';
        break;
    default:
        break;
}

if ($money < $amount) {
    $response = array(
        "code" => 1,
        "msg" => "Balance is not enough",
        "msgCode" => 142,
        "serviceNowTime" => date("Y-m-d H:i:s")
    );
    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}

$newMoney = $money - $amount;
$updateSql = "UPDATE users SET money = ? WHERE token = ?";
$updateStmt = $conn->prepare($updateSql);
$updateStmt->bind_param("ds", $newMoney, $token);
$updateStmt->execute();
$updateStmt->close();

$currentDate = date("Ymd");
$randomPart = mt_rand(0, 9999999999999999);
$id_product = $currentDate . str_pad($randomPart, 20 - strlen($currentDate), "0", STR_PAD_LEFT);

$fee = $amount * 0.02;
$finalAmount = $amount - $fee;
$result = 0;
$more = 0;
$level = 1;
$get = 0;
$status = 0;
$bet = '';

switch ($selectType) {
    case 10:
        $bet = 'd';
        break;
    case 11:
        $bet = 'x';
        break;
    case 12:
        $bet = 't';
        break;
    case 13:
        $bet = 'l';
        break;
    case 14:
        $bet = 'n';
        break;
    default:
        $bet = (string)$selectType;
        break;
}

$insertSql = "INSERT INTO minutes_1 (phone, id_product, code, invite, stage, result, more, level, money, amount, fee, get, bet, status, today, time, game) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$insertStmt = $conn->prepare($insertSql);
$insertStmt->bind_param("sssssssssssssssss", $phone, $id_product, $code, $invite, $issuenumber, $result, $more, $level, $finalAmount, $betCount, $fee, $get, $bet, $status, $todayDate, $time, $gameType);

$todayDate = date("Y-m-d");
$time = time() * 1000;

$insertStmt->execute();

if ($insertStmt->error) {
    $response = array(
        "code" => 1,
        "msg" => "Error inserting into minutes_1 table: " . $insertStmt->error,
        "msgCode" => 500,
        "serviceNowTime" => date("Y-m-d H:i:s")
    );
    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}

$insertStmt->close();

// Construct JSON response array
$response = array(
    "code" => 0,
    "msg" => "Bet success",
    "msgCode" => 402,
    "serviceNowTime" => date("Y-m-d H:i:s")
);

// Return JSON response
header('Content-Type: application/json');
echo json_encode($response);

// Close prepared statements and database connection
$stmt->close();
$conn->close();

?>
