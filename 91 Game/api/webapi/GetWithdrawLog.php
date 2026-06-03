<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
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

date_default_timezone_set('Asia/Kolkata');

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

        $pageNo = isset($data['pageNo']) ? $data['pageNo'] : 1;
        $pageSize = isset($data['pageSize']) ? $data['pageSize'] : 10;
        $startDate = isset($data['startDate']) ? $data['startDate'] : null;
        $endDate = isset($data['endDate']) ? $data['endDate'] : null;
        $state = isset($data['state']) ? $data['state'] : -1;

        $stateFilter = "";
        if ($state != -1) {
            $stateFilter = " AND status = $state";
        }

        $dateFilter = "";
        if ($startDate !== null && $endDate !== null && $startDate !== "" && $endDate !== "") {
            $dateFilter = " AND time BETWEEN '$startDate' AND '$endDate'";
        }
        
        $pageNo = isset($data['pageNo']) ? $data['pageNo'] : 1;
        $recordsPerPage = $pageSize;

        $startIndex = ($pageNo - 1) * $recordsPerPage;

        $withdrawQuery = "SELECT id_order, money, status, today, time FROM withdraw WHERE phone='$phone' $stateFilter $dateFilter ORDER BY time DESC LIMIT $startIndex, $recordsPerPage";

        $withdrawResult = $conn->query($withdrawQuery);

        if ($withdrawResult) {
            $withdrawData = array();
            while ($withdrawRow = $withdrawResult->fetch_assoc()) {
                $withdrawID = $withdrawRow['id_order'];
                $money = $withdrawRow['money'];
                $status = $withdrawRow['status'];
                $today = $withdrawRow['today'];
                $time = $withdrawRow['time'];

                $formattedWithdrawData = array(
                    "withdrawID" => $withdrawID,
                    "type" => 1,
                    "withdrawNumber" => "WD$withdrawID",
                    "withdrawName" => "BANK CARD",
                    "price" => number_format((float)$money, 2, '.', ''),
                    "addTime" => $time,
                    "realityAmount" => number_format((float)$money, 4, '.', ''),
                    "state" => (int)$status,
                    "uRate" => 0.00,
                    "uGold" => 0.00
                );

                if ($status == 2) {
                    $formattedWithdrawData["remark"] = "Due to your account security, please contact customer service. Thank you.";
                } else {
                    $formattedWithdrawData["remark"] = "";
                }

                $withdrawData[] = $formattedWithdrawData;
            }

           $countQuery = "SELECT COUNT(*) AS total FROM withdraw WHERE phone='$phone' $stateFilter $dateFilter";
$countResult = $conn->query($countQuery);

if ($countResult && $countResult->num_rows > 0) {
    $totalCount = $countResult->fetch_assoc()['total'];
} else {
    $totalCount = 0;
}

            if (empty($withdrawData)) {
        $response = array(
            "data" => array(
                "list" => [],
                "pageNo" => $pageNo,
                "pageSize" => 0, 
                "totalPage" => 0,
                "totalCount" => 0
            ),
            "code" => 0,
            "msg" => "Succeed",
            "msgCode" => 0,
            "serviceNowTime" => date("Y-m-d H:i:s"),
        );
    } else {
        $response = array(
            "data" => array(
                "list" => $withdrawData,
                "pageNo" => $pageNo,
                "pageSize" => 10,
                "totalPage" => ceil($totalCount / 10),
                "totalCount" => $totalCount
            ),
            "code" => 0,
            "msg" => "Succeed",
            "msgCode" => 0,
            "serviceNowTime" => date("Y-m-d H:i:s"),
        );
    }
} else {
    $response = array(
        "data" => array(
            "list" => [],
            "pageNo" => $pageNo,
            "pageSize" => 0, 
            "totalPage" => 0,
            "totalCount" => 0
        ),
        "code" => 0,
        "msg" => "Succeed",
        "msgCode" => 0,
        "serviceNowTime" => date("Y-m-d H:i:s"),
    );
}

        $withdrawResult->close();
    } else {
        $response = array(
            "code" => 1,
            "msg" => "Invalid token",
            "msgCode" => 401,
            "serviceNowTime" => date("Y-m-d H:i:s")
        );
    }
} else {
    $response = array(
        "code" => 1,
        "msg" => "Token not provided",
        "msgCode" => 401,
        "serviceNowTime" => date("Y-m-d H:i:s")
    );
}

$conn->close();

header('Content-Type: application/json');
echo json_encode($response, JSON_PRETTY_PRINT);
?>
