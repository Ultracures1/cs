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
$username_db = "abcoders_db";
$password_db = "abcoders_db";
$dbname = "abcoders_db";

$conn = new mysqli($servername, $username_db, $password_db, $dbname);

if ($conn->connect_error) {
    die(json_encode([
        "code" => 1,
        "msg" => "Database connection failed: " . $conn->connect_error
    ]));
}

$sql = "SELECT phone FROM users WHERE token = '$token'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $username = $row['phone'];

    $postData = file_get_contents("php://input");

    $data = json_decode($postData, true);

    if (!isset($data['pageNo']) || !isset($data['pageSize'])) {
        exit(json_encode([
            "code" => 1,
            "msg" => "Required parameters (pageNo and pageSize) are missing in the payload"
        ]));
    }

    $pageNo = $data['pageNo'];
    $pageSize = $data['pageSize'];

    $startLimit = ($pageNo - 1) * $pageSize;

    $sql = "SELECT * FROM recharge WHERE phone = '$username'";

    if (isset($data['payId'])) {
        $payId = $data['payId'];
        if ($payId == 1 || $payId == 2) {
            $sql .= " AND type = $payId";
        }
    }

    if (isset($data['state'])) {
        $state = $data['state'];
        if ($state == 0 || $state == 1 || $state == 2) {
            $sql .= " AND status = $state";
        }
    }

    if (isset($data['startDate']) && isset($data['endDate'])) {
        $startDate = $data['startDate'];
        $endDate = $data['endDate'];
        if ($startDate != "" && $endDate != "") {
            $sql .= " AND time BETWEEN '$startDate' AND '$endDate'";
        }
    }

    $sql .= " ORDER BY time DESC LIMIT $startLimit, $pageSize";

    $result = $conn->query($sql);

    $response = [];

    if ($result->num_rows > 0) {
        $rechargeList = [];
        while ($row = $result->fetch_assoc()) {
            $payName = ($row['type'] == 1) ? 'UPI-APP' : 'UPI-QR';
            $rechargeList[] = [
                "rechargeNumber" => $row['id_order'],
                "addTime" => date('Y-m-d H:i:s', strtotime($row['time'])),
                "type" => $row['type'],
                "price" => $row['money'],
                "state" => intval($row['status']),
                "uRate" => null,
                "uGold" => 0.00,
                "payID" => $row['type'],
                "payName" => $payName
            ];
        }
        $response = [
            "data" => [
                "list" => $rechargeList,
                "pageNo" => $pageNo,
                "totalPage" => 1,
                "totalCount" => $result->num_rows
            ],
            "code" => 0,
            "msg" => "Succeed",
            "msgCode" => 0,
            "serviceNowTime" => date('Y-m-d H:i:s')
        ];
    } else {
        $response = [
            "data" => [
                "list" => [],
                "pageNo" => $pageNo,
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

} else {
    exit(json_encode([
        "code" => 4,
        "msg" => "No operation permission",
        "msgCode" => 2,
        "serviceNowTime" => date("Y-m-d H:i:s")
    ]));
}


header('Content-Type: application/json');

echo json_encode($response);
?>
