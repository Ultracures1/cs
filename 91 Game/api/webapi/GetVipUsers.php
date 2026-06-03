<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
date_default_timezone_set('Asia/Kolkata');

if(isset($_COOKIE['token'])) {
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
        $userId = $row['id_user'];
        $vipLevel = 0;
        $nickName = $row['name_user'];
        $exp = 0;
        $settlementDate = 0;

        $response = [
            "data" => [
                "userId" => $userId,
                "vipLevel" => $vipLevel,
                "nickName" => $nickName,
                "exp" => $exp,
                "settlementDate" => $settlementDate,
            ],
            "code" => 0,
            "msg" => "Succeed",
            "msgCode" => 0,
            "serviceNowTime" => date('Y-m-d H:i:s', time())
        ];

        echo json_encode($response, JSON_PRETTY_PRINT);
    } else {
        $response = [
            "code" => 4,
            "msg" => "Invalid token or session expired",
            "msgCode" => 3,
            "serviceNowTime" => date('Y-m-d H:i:s', time())
        ];

        echo json_encode($response, JSON_PRETTY_PRINT);
    }

    $conn->close();
} else {
    $response = [
        "code" => 4,
        "msg" => "No operation permission",
        "msgCode" => 2,
        "serviceNowTime" => date('Y-m-d H:i:s', time())
    ];

    echo json_encode($response, JSON_PRETTY_PRINT);
}
header('Content-Type: application/json');
?>
