<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
date_default_timezone_set('Asia/Kolkata');

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
$username = "abcoders_db";
$password = "abcoders_db";
$dbname = "abcoders_db";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$conn->query("SET time_zone = '+05:30'");

$sql = "SELECT phone, password, money FROM users WHERE token = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $token);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $phone = $row['phone'];
    $current_password = $row['password'];
    $current_balance = $row['money'];

    $postData = file_get_contents("php://input");
    $data = json_decode($postData, true);

    if ($data === null || !isset($data['amount']) || !isset($data['pwd'])) {
        $response = array(
            "code" => 1,
            "msg" => "Invalid or missing payload data.",
            "msgCode" => 400,
            "serviceNowTime" => date("Y-m-d H:i:s")
        );
        header('Content-Type: application/json');
        echo json_encode($response);
        exit;
    }

    $amount = $data['amount'];
    $pwd = $data['pwd'];

    if ($pwd != $current_password) {
        $response = array(
            "code" => 1,
            "msg" => "Invalid password.",
            "msgCode" => 401,
            "serviceNowTime" => date("Y-m-d H:i:s")
        );
        header('Content-Type: application/json');
        echo json_encode($response);
        exit;
    }

    if ($current_balance < $amount) {
        $response = array(
            "code" => 1,
            "msg" => "Insufficient balance.",
            "msgCode" => 402,
            "serviceNowTime" => date("Y-m-d H:i:s")
        );
        header('Content-Type: application/json');
        echo json_encode($response);
        exit;
    }

    $new_balance = $current_balance - $amount;

    $sql = "UPDATE users SET money = ? WHERE phone = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ds", $new_balance, $phone);
    $stmt->execute();

    $sql = "SELECT * FROM user_bank WHERE phone = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $phone);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        $response = array(
            "code" => 1,
            "msg" => "User bank details not found.",
            "msgCode" => 404,
            "serviceNowTime" => date("Y-m-d H:i:s")
        );
        header('Content-Type: application/json');
        echo json_encode($response);
        exit;
    }

    $row = $result->fetch_assoc();

    $id_order = "20" . date("ymdHis") . substr((string)microtime(), 2, 4);

    $sql = "INSERT INTO withdraw (id_order, phone, money, account, ifsc, name_bank, name_user, status, today, time) VALUES (?, ?, ?, ?, ?, ?, ?, 0, CURDATE(), NOW())";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssss", $id_order, $phone, $amount, $row['account'], $row['ifsc'], $row['name_bank'], $row['name_user']);
    $stmt->execute();

    $sql = "INSERT INTO notification (username, title, messages, notification_time, is_read) 
        VALUES (?, 'Apply for withdrawal', 'Your withdrawal request has been sent.', ?, 'yes')";

$stmt = $conn->prepare($sql);
if ($stmt) {
    $notification_time = date('Y-m-d H:i:s');
    $stmt->bind_param("ss", $phone, $notification_time);
    $stmt->execute();
    
    if ($stmt !== false) {
        $stmt->close();
    }
} else {
    $error_message = $conn->error;
    echo "Error preparing SQL statement for notification insertion: $error_message";
    exit;
}

    $response = array(
        "code" => 0,
        "msg" => "Withdrawal request successful.",
        "msgCode" => 200,
        "serviceNowTime" => date("Y-m-d H:i:s")
    );
} else {
    $response = array(
        "code" => 1,
        "msg" => "Invalid token.",
        "msgCode" => 401,
        "serviceNowTime" => date("Y-m-d H:i:s")
    );
}

$conn->close();

header('Content-Type: application/json');
echo json_encode($response, JSON_PRETTY_PRINT);
?>
