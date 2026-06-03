<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
date_default_timezone_set('Asia/Kolkata');

$servername = "localhost";
$username = "abcoders_db";
$password = "abcoders_db";
$dbname = "abcoders_db";

$postData = file_get_contents("php://input");
$data = json_decode($postData, true);

$pageNo = isset($data['pageNo']) ? intval($data['pageNo']) : 1;
$pageSize = 20;

if (!isset($_COOKIE['token'])) {
    header('Content-Type: application/json');
    exit(json_encode([
        "code" => 1,
        "msg" => "Unauthorized access: Token not found"
    ]));
}

$token = $_COOKIE['token'];

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    header('Content-Type: application/json');
    exit(json_encode([
        "code" => 1,
        "msg" => "Connection failed: " . $conn->connect_error
    ]));
}

$sql = "SELECT phone FROM users WHERE token = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $token);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    header('Content-Type: application/json');
    exit(json_encode([
        "code" => 1,
        "msg" => "Unauthorized access: Invalid token"
    ]));
}

$row = $result->fetch_assoc();
$username = $row['phone'];

$offset = ($pageNo - 1) * $pageSize;

$countSql = "SELECT COUNT(*) AS total FROM minutes_1 WHERE phone = ?";
$countStmt = $conn->prepare($countSql);
$countStmt->bind_param("s", $username);
$countStmt->execute();
$countResult = $countStmt->get_result();
$totalCount = $countResult->fetch_assoc()['total'];

$sql = "SELECT * FROM minutes_1 WHERE phone = ? ORDER BY time DESC LIMIT ?, ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sii", $username, $offset, $pageSize);
$stmt->execute();
$result = $stmt->get_result();

$response = [
    "data" => [
        "list" => [],
        "pageNo" => $pageNo,
        "totalPage" => 0,
        "totalCount" => $totalCount
    ],
    "code" => 0,
    "msg" => "Succeed",
    "msgCode" => 0,
    "serviceNowTime" => date('Y-m-d H:i:s')
];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $addTime = date('Y-m-d H:i:s', $row['time'] / 1000);

        $game = $row['game'];
        switch ($game) {
            case 'wingo':
                $typeID = 1;
                break;
            case 'wingo3':
                $typeID = 2;
                break;
            case 'wingo5':
                $typeID = 3;
                break;
            case 'wingo10':
                $typeID = 4;
                break;
            default:
                $typeID = 1;
        }

        $profitAmount = ($row['status'] == 1) ? $row['get'] : (($row['status'] == 2) ? $row['money'] : null);
        $state = ($row['status'] == 0) ? 2 : (($row['status'] == 2) ? 0 : $row['status']);
        $number = $row['status'] == 1 || $row['status'] == 2 ? strval($row['result']) : "";
        $selectType = is_numeric($row['bet']) ? $row['bet'] : null;

        if ($selectType === null) {
            $bet = strtolower($row['bet']);
            if ($bet == 'x') {
                $selectType = 'green';
            } elseif ($bet == 'd') {
                $selectType = 'red';
            } elseif ($bet == 't') {
                $selectType = 'violet';
            } elseif ($bet == 'l') {
                $selectType = 'big';
            } elseif ($bet == 'n') {
                $selectType = 'small';
            }
        }

        $colour = null;

        if ($row['status'] == 0) {
            $colour = null; 
        } elseif ($row['status'] == 1 && $row['result'] == 0) {
            $colour = "red,violet"; 
        } elseif ($row['status'] == 1 || $row['status'] == 2) {
            $colour = ($row['result'] % 2 == 0) ? "red" : "green";
        } elseif ($row['status'] == 5) {
            $colour = "green,violet";
        }
 
        $premium = ($row['status'] != 2) ? null : "null";
        $gameType = ($row['status'] != 2) ? null : "null";
        $amount = $row['money'] + $row['fee'];
        
        $data = [
            "issueNumber" => $row['stage'],
            "gameType" => $gameType,
            "orderNumber" => $row['id_product'],
            "amount" => $amount,
            "betCount" => $row['amount'],
            "number" => $number,
            "selectType" => $selectType,
            "colour" => $colour,
            "premium" => $premium,
            "realAmount" => $row['money'],
            "fee" => $row['fee'],
            "figure" => null,
            "state" => $state,
            "profitAmount" => $profitAmount,
            "addTime" => $addTime,
            "typeID" => $typeID,
            "serviceCharge" => $row['fee'],
            "winAmount" => $profitAmount
        ];

        $response["data"]["list"][] = $data;
    }

    $totalPages = ceil($totalCount / $pageSize);
    $response["data"]["totalPage"] = $totalPages;
}

header('Content-Type: application/json');
echo json_encode($response, JSON_PRETTY_PRINT);

$stmt->close();
$countStmt->close();
$conn->close();
?>
