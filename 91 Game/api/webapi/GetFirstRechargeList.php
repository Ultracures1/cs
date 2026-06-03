<?php
header('Content-Type: application/json');
date_default_timezone_set('Asia/Kolkata');
$serviceNowTime = date('Y-m-d H:i:s');

if (!isset($_COOKIE['token'])) {
    exit(json_encode([
        "code" => 4,
        "msg" => "No operation permission",
        "msgCode" => 2,
        "serviceNowTime" => $serviceNowTime
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

// Retrieve the phone number associated with the given token
$sql = "SELECT phone FROM users WHERE token = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $token);
$stmt->execute();
$result = $stmt->get_result();
$phone = "";

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $phone = $row['phone'];
} else {
    exit(json_encode([
        "code" => 4,
        "msg" => "Invalid token",
        "msgCode" => 3,
        "serviceNowTime" => $serviceNowTime
    ]));
}

// Function to determine reward status based on phone and level
function getRewardStatus($phone, $conn, $level) {
    $sql = "SELECT rcvd FROM firstrecharge WHERE phone = ? AND level = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $phone, $level);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $rcvd = $row['rcvd'];
        
        $isFinshed = ($rcvd == 'yes');
        $canReceive = ($rcvd == 'no');
        
        return [
            'isFinshed' => $isFinshed,
            'canReceive' => canReceive
        ];
    }

    return [
        'isFinshed' => false,
        'canReceive' => false
    ];
}

// Define the reward data array
$rewardData = [
    ["id" => 1, "rewardAmount" => 56.00, "rechargeAmount" => 300.00, "order" => 120, "state" => 1, "createTime" => "2024-01-16 16:55:39", "lastUpdateTime" => "2024-03-19 17:33:16", "canReceive" => false, "isFinshed" => false],
    ["id" => 2, "rewardAmount" => 96.00, "rechargeAmount" => 1000.00, "order" => 119, "state" => 1, "createTime" => "2024-01-16 16:55:39", "lastUpdateTime" => "2024-03-19 17:33:17", "canReceive" => false, "isFinshed" => false],
    ["id" => 3, "rewardAmount" => 216.00, "rechargeAmount" => 2000.00, "order" => 118, "state" => 1, "createTime" => "2024-01-16 16:55:39", "lastUpdateTime" => "2024-03-19 17:33:18", "canReceive" => false, "isFinshed" => false],
    ["id" => 4, "rewardAmount" => 376.00, "rechargeAmount" => 5000.00, "order" => 117, "state" => 1, "createTime" => "2024-01-16 16:55:39", "lastUpdateTime" => "2024-03-19 17:33:19", "canReceive" => false, "isFinshed" => false],
    ["id" => 5, "rewardAmount" => 976.00, "rechargeAmount" => 10000.00, "order" => 113, "state" => 1, "createTime" => "2024-01-16 16:55:39", "lastUpdateTime" => "2024-03-19 17:33:20", "canReceive" => false, "isFinshed" => false],
    ["id" => 6, "rewardAmount" => 2776.00, "rechargeAmount" => 24000.00, "order" => 105, "state" => 1, "createTime" => "2024-01-16 16:55:39", "lastUpdateTime" => "2024-03-19 17:33:21", "canReceive" => false, "isFinshed" => false],
    ["id" => 7, "rewardAmount" => 11776.00, "rechargeAmount" => 100000.00, "order" => 90, "state" => 1, "createTime" => "2024-01-16 16:55:39", "lastUpdateTime" => "2024-03-19 17:33:22", "canReceive" => false, "isFinshed" => false]
];

$isFirstRechargeFinshed = false;

foreach ($rewardData as &$reward) {
    $level = $reward['id'];
    $rewardStatus = getRewardStatus($phone, $conn, $level);
    $reward['isFinshed'] = $rewardStatus['isFinshed'];
    $reward['canReceive'] = $rewardStatus['canReceive'];
    
    if ($reward['isFinshed']) {
        $isFirstRechargeFinshed = true;
    }
}

if ($isFirstRechargeFinshed) {
    $response = [
        "data" => [],
        "code" => 0,
        "msg" => "Succeed",
        "msgCode" => 0,
        "serviceNowTime" => $serviceNowTime
    ];
} else {
    $response = [
        "data" => $rewardData,
        "code" => 0,
        "msg" => "Succeed",
        "msgCode" => 0,
        "serviceNowTime" => $serviceNowTime
    ];
}

echo json_encode($response, JSON_PRETTY_PRINT);
$conn->close();
?>
