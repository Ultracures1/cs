<?php

date_default_timezone_set('Asia/Kolkata');
$postData = file_get_contents("php://input");
$data = json_decode($postData, true);
header('Content-Type: application/json');

if ($data === null) {
    echo json_encode(["code" => 1, "msg" => "Error decoding JSON data."]);
    exit;
}

if (!isset($_COOKIE['token'])) {
    echo json_encode(["code" => 2, "msg" => "Token not provided."]);
    exit;
}

$token = $_COOKIE['token'];
$issueNumbers = isset($data['issueNumber']) && is_array($data['issueNumber']) ? $data['issueNumber'] : [];

$servername = "localhost";
$usernameDB = "abcoders_db";
$password = "abcoders_db";
$dbname = "abcoders_db";

$conn = new mysqli($servername, $usernameDB, $password, $dbname);

if ($conn->connect_error) {
    echo json_encode(["code" => 3, "msg" => "Connection failed: " . $conn->connect_error]);
    exit;
}

$sqlToken = "SELECT phone FROM users WHERE token = ?";
$stmtToken = $conn->prepare($sqlToken);
$stmtToken->bind_param("s", $token);
$stmtToken->execute();
$resultToken = $stmtToken->get_result();

if ($resultToken->num_rows > 0) {
    $rowToken = $resultToken->fetch_assoc();
    $phone = $rowToken['phone'];
    $response = ["data" => [], "code" => 0, "msg" => "Succeed", "msgCode" => 0, "serviceNowTime" => date("Y-m-d H:i:s")];

    $gameTypeToTypeName = [
        'wingo' => '1 minute',
        'wingo3' => '3 minutes',
        'wingo5' => '5 minutes',
        'wingo10' => '10 minutes'
    ];

    foreach ($issueNumbers as $issueNumber) {
        $sql = "SELECT status, result, SUM(`get`) AS total_get, game FROM minutes_1 WHERE phone = ? AND stage = ? GROUP BY status";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $phone, $issueNumber);
        $stmt->execute();
        $result = $stmt->get_result();

        $defaultEntry = [
            "issueNumber" => $issueNumber,
            "typeID" => 0,
            "state" => 0,
            "premium" => "92461",
            "winAmount" => 0
        ];

        $highestWinEntry = $defaultEntry;
        $statusOneFound = false;

        while ($row = $result->fetch_assoc()) {
            $status = $row['status'];
            $resultValue = $row['result'];
            $totalGet = $row['total_get'];
            $gameType = $row['game'];

            if (isset($gameTypeToTypeName[$gameType])) {
                $gameTypeName = $gameTypeToTypeName[$gameType];
            }

            if ($status == 1) {
                $highestWinEntry = [
                    "issueNumber" => $issueNumber,
                    "typeID" => 1,
                    "state" => $status,
                    "premium" => "92461",
                    "number" => $resultValue,
                    "colour" => ['5' => 'green-violet', '0' => 'red-violet', '2' => 'red', '4' => 'red', '6' => 'red', '8' => 'red'][$resultValue] ?? 'green',
                    "winAmount" => $totalGet,
                    "typeName" => $gameTypeName
                ];
                $statusOneFound = true;
                break;
            }

            if (!$statusOneFound) {
                $highestWinEntry["number"] = $resultValue;
                $highestWinEntry["colour"] = ['5' => 'green-violet', '0' => 'red-violet', '2' => 'red', '4' => 'red', '6' => 'red', '8' => 'red'][$resultValue] ?? 'green';
                $highestWinEntry["typeName"] = $gameTypeName;
            }
        }

        $response["data"][] = $highestWinEntry;
    }

    echo json_encode($response);
} else {
    echo json_encode(["code" => 4, "msg" => "Phone number not found for the given token."]);
}

$stmtToken->close();
$conn->close();

?>
