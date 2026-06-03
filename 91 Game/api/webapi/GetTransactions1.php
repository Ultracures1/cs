<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
$postData = file_get_contents("php://input");
$data = json_decode($postData, true);

$type = isset($data['type']) ? $data['type'] : null;
$pageNo = isset($_GET['pageNo']) ? intval($_GET['pageNo']) : 1; // Assuming pageNo is passed via GET
$pageSize = isset($_GET['pageSize']) ? intval($_GET['pageSize']) : 10; // Assuming pageSize is passed via GET
$offset = ($pageNo - 1) * $pageSize;

date_default_timezone_set('Asia/Kolkata');

$response = array();

if (isset($_COOKIE['token'])) {
    $token = $_COOKIE['token'];

    $servername = "localhost";
    $usernameDB = "abcoders_db";
    $password = "abcoders_db";
    $dbname = "abcoders_db";

    $conn = new mysqli($servername, $usernameDB, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM users WHERE token = '$token'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $phone = $row['phone'];

        if ($type === 0) {
            $sql = "SELECT id_product, time, money, fee FROM minutes_1 WHERE phone = '$phone' LIMIT $pageSize OFFSET $offset";
        } elseif ($type === 2) {
            $sql = "SELECT id_product, time, get FROM minutes_1 WHERE phone = '$phone' AND status = 1 LIMIT $pageSize OFFSET $offset";
        } else {
            $response['code'] = -1;
            $response['msg'] = "Invalid type";
            $response['msgCode'] = -1;
            echo json_encode($response);
            exit; // Terminate execution
        }

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $transactions = array();
            while ($row = $result->fetch_assoc()) {
                $transaction_item = array(
                    "amount" => floatval($row["money"] ?? $row["get"]) + floatval($row["fee"] ?? 0),
                    "type" => $type,
                    "typeName" => $type === 0 ? "Bet amount reduced" : "Jackpot increase",
                    "typeNameCode" => $type === 0 ? "8000" : "8002",
                    "orderNum" => $row["id_product"],
                    "addTime" => $row["time"],
                    "remark" => "0"
                );
                $transactions[] = $transaction_item;
            }
            $response['data']['list'] = $transactions;
            $response['data']['pageNo'] = $pageNo; // Include pageNo in response

            // Calculate total count of records
            $totalCountSql = "SELECT COUNT(*) as total FROM minutes_1 WHERE phone = '$phone'";
            if ($type === 2) {
                $totalCountSql = "SELECT COUNT(*) as total FROM minutes_1 WHERE phone = '$phone' AND status = 1";
            }
            $totalCountResult = $conn->query($totalCountSql);
            $totalCountRow = $totalCountResult->fetch_assoc();
            $totalCount = $totalCountRow['total'];

            // Calculate total number of pages
            $totalPage = ceil($totalCount / $pageSize);
            $response['data']['totalPage'] = $totalPage;
            $response['data']['totalCount'] = $totalCount;

            $response['code'] = 0;
            $response['msg'] = "Succeed";
            $response['msgCode'] = 0;
        } else {
            $response['data']['list'] = [];
            $response['data']['pageNo'] = $pageNo; // Include pageNo in response
            $response['data']['totalPage'] = 1; // Assuming only one page
            $response['data']['totalCount'] = 0;
            $response['code'] = 0;
            $response['msg'] = "Succeed";
            $response['msgCode'] = 0;
        }
    } else {
        $response['code'] = -1;
        $response['msg'] = "No user found with the provided token";
        $response['msgCode'] = -1;
    }

    $conn->close();
} else {
    $response['code'] = -1;
    $response['msg'] = "No token provided";
    $response['msgCode'] = -1;
}

$response['serviceNowTime'] = date('Y-m-d H:i:s');

// Set Content-Type header to application/json
header('Content-Type: application/json');

// Echo JSON-encoded response
echo json_encode($response);
?>
