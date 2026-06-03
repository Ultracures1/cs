<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
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

$typeId = isset($data['typeId']) ? $data['typeId'] : null;

$gameValues = [
    1 => 'wingo',
    2 => 'wingo3',
    3 => 'wingo5',
    4 => 'wingo10'
];

$intervalMValues = [
    1 => 1,
    2 => 3,
    3 => 5,
    4 => 10
];

$game = isset($gameValues[$typeId]) ? $gameValues[$typeId] : '';
$intervalM = isset($intervalMValues[$typeId]) ? $intervalMValues[$typeId] : '';

$sql = "SELECT id, period, time FROM wingo WHERE status=0 AND game='$game'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $formattedTime = date("Y-m-d H:i:s", $row["time"] / 1000);
    $endTime = date("Y-m-d H:i:s", strtotime($formattedTime . "+1 minute"));

    $response = [
        "data" => [
            "issueNumber" => $row["period"],
            "startTime" => $formattedTime,
            "endTime" => $endTime,
            "serviceTime" => date('Y-m-d H:i:s'),
            "intervalM" => $intervalM
        ],
        "code" => 0,
        "msg" => "Succeed",
        "msgCode" => 0,
        "serviceNowTime" => date('Y-m-d H:i:s')
    ];
} else {
    $response = [
        "data" => null,
        "code" => 1,
        "msg" => "No records found",
        "msgCode" => 404,
        "serviceNowTime" => date('Y-m-d H:i:s')
    ];
}

$conn->close();
header('Content-Type: application/json');
echo json_encode($response);

?>
