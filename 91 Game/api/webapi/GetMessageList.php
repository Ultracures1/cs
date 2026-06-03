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
        "code" => 4,
        "msg" => "No operation permission",
        "msgCode" => 2,
        "serviceNowTime" => date("Y-m-d H:i:s")
    ]));
}

$token = $_COOKIE['token'];

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

date_default_timezone_set('Asia/Kolkata');

$sql = "SELECT * FROM users WHERE token = '" . $conn->real_escape_string($token) . "'";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
    exit(json_encode([
       "code" => 4,
        "msg" => "No operation permission",
        "msgCode" => 2,
        "serviceNowTime" => date("Y-m-d H:i:s")
    ]));
}

$row = $result->fetch_assoc();
$username = $row['phone'];

$sql = "SELECT * FROM notification WHERE username = '" . $conn->real_escape_string($username) . "'";
$result = $conn->query($sql);

$response = [];

if ($result->num_rows > 0) {
    $notificationList = [];
    while ($row = $result->fetch_assoc()) {
        $notification = [
            "messageID" => $row['id'],
            "addTime" => $row['notification_time'],
            "state" => 1,
            "stateName" => ($row['is_read'] == 'yes') ? 'have read' : 'not read',
            "title" => $row['title'],
            "messages" => $row['messages']
        ];
        $notificationList[] = $notification;
    }
    
    usort($notificationList, function($a, $b) {
        return strtotime($b['addTime']) - strtotime($a['addTime']);
    });

    $response = [
        "data" => [
            "list" => $notificationList
        ],
        "code" => 0,
        "msg" => "Succeed",
        "msgCode" => 0,
        "serviceNowTime" => date('Y-m-d H:i:s')
    ];

   
    $updateSql = "UPDATE notification SET is_read = 'no' WHERE username = '" . $conn->real_escape_string($username) . "'";
    $conn->query($updateSql);
} else {
    $response = [
        "data" => [
            "list" => [],
            "pageNo" => 1,
            "totalPage" => 0,
            "totalCount" => 0
        ],
        "code" => 0,
        "msg" => "Succeed",
        "msgCode" => 0,
        "serviceNowTime" => date('Y-m-d H:i:s')
    ];
}

$conn->close();
header('Content-Type: application/json');
echo json_encode($response);
?>
