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

$pageSize = isset($data['pageSize']) ? $data['pageSize'] : 10;
$pageNo = isset($data['pageNo']) ? $data['pageNo'] : 1;
$typeId = isset($data['typeId']) ? $data['typeId'] : 1;

$gameValues = [
    1 => 'wingo',
    2 => 'wingo3',
    3 => 'wingo5',
    4 => 'wingo10'
];

$game = isset($gameValues[$typeId]) ? $gameValues[$typeId] : 'wingo';

$offset = ($pageNo - 1) * $pageSize;

$sql = "SELECT id, period, time, amount FROM wingo WHERE status=1 AND game='$game' ORDER BY period DESC LIMIT $pageSize OFFSET $offset";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $list = array();
    while ($row = $result->fetch_assoc()) {
        $amount = $row["amount"];
        $colour = '';

        if (in_array($amount, [1, 3, 7, 9])) {
            $colour = 'green';
        } elseif (in_array($amount, [2, 4, 6, 8])) {
            $colour = 'red';
        } elseif ($amount == 0) {
            $colour = 'red,violet';
        } elseif ($amount == 5) {
            $colour = 'green,violet';
        }

        $list[] = array(
            "issueNumber" => $row["period"],
            "number" => $amount,
            "colour" => $colour,
            "premium" => rand(10000, 99999)
        );
    }

    $sqlTotalCount = "SELECT COUNT(*) AS total FROM wingo WHERE status=1 AND game='$game'";
    $resultTotalCount = $conn->query($sqlTotalCount);
    $totalCount = $resultTotalCount->fetch_assoc()["total"];

    $totalPage = ceil($totalCount / $pageSize);

    $response = [
        "data" => [
            "list" => $list,
            "pageNo" => $pageNo,
            "totalPage" => $totalPage,
            "totalCount" => $totalCount
        ],
        "code" => 0,
        "msg" => "Succeed",
        "msgCode" => 0,
        "serviceNowTime" => date('Y-m-d H:i:s')
    ];
    
    header('Content-Type: application/json');
    echo json_encode($response, JSON_PRETTY_PRINT);
} else {
    $response = [
        "data" => null,
        "code" => 1,
        "msg" => "No records found",
        "msgCode" => 404,
        "serviceNowTime" => date('Y-m-d H:i:s')
    ];
    
    header('Content-Type: application/json');
    echo json_encode($response, JSON_PRETTY_PRINT);
}

$conn->close();
?>
