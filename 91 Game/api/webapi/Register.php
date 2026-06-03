<?php
header("Content-Type: application/json");

date_default_timezone_set('Asia/Kolkata');

$postData = file_get_contents("php://input");
$data = json_decode($postData, true);

$servername = "localhost";
$username = "abcoders_db";
$password = "abcoders_db";
$dbname = "abcoders_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    $response = [
        "code" => -1,
        "msg" => "Database connection failed",
        "msgCode" => 999,
        "serviceNowTime" => date("Y-m-d H:i:s")
    ];
    echo json_encode($response);
    exit();
}

$username = $conn->real_escape_string(substr($data['username'], 2));
$password = $conn->real_escape_string($data['pwd']);
$inviteCode = $conn->real_escape_string($data['invitecode']);

$sql = "SELECT * FROM users WHERE code = '$inviteCode'";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
    $response = [
        "code" => 8,
        "msg" => "Invitor Not Existed",
        "msgCode" => 110,
        "serviceNowTime" => date("Y-m-d H:i:s")
    ];
    echo json_encode($response);
} else {
    $sql = "SELECT * FROM users WHERE phone = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $response = [
            "code" => 1,
            "msg" => "Phone number have been registered",
            "msgCode" => 111,
            "serviceNowTime" => date("Y-m-d H:i:s")
        ];
        echo json_encode($response);
    } else {
        $newUserId = getNewUserId($conn) + 1;
        $newUserCode = getNewcode($conn);
        
        $memberNNGNITHR = "MemberNNGNITHR";
        $otp = 1234;
        $token = bin2hex(random_bytes(32));
        $ipAddress = $_SERVER['HTTP_AR_REAL_IP'];
        $currentTime = date("Y-m-d H:i:s");
        $expiry = time() + 604800;
        
        $insertSql = "INSERT INTO users (id_user, phone, name_user, password, money, total_money, roses_f1, roses_f, roses_today, level, rank, code, invite, ctv, veri, otp, ip_address, status, time, time_otp, bonus, token)
                      VALUES ('$newUserId', '$username', '$memberNNGNITHR', '$password', '0.00', '0', '0', '0', '0', '1', '0', '$newUserCode', '$inviteCode', '1', '1', '$otp', '$ipAddress', '1', '$currentTime', '0', '0', '$token')";

        if ($conn->query($insertSql) === TRUE) {
            $notificationSql = "INSERT INTO notification (username, title, messages, notification_time, is_read) 
                                VALUES ('$username', 'New Member', 'Thank you for becoming a beloved member of this platform. We provide many industry leading games. This is the world''s leading gaming platform. Try the lottery game developed by us. While enjoying the best gaming experience, you can also join unlimited agents and stay at home to earn money. " . date('Y-m-d H:i:s', time()) . "', '" . date('Y-m-d H:i:s', time()) . "', 'yes')";
            $conn->query($notificationSql);

            $response = [
                "code" => 0,
                "msg" => "Registration successful",
                "msgCode" => 0,
                "serviceNowTime" => date("Y-m-d H:i:s"),
                "data" => [
                    "tokenHeader" => "Bearer ",
                    "token" => $token,
                    "expiresIn" => $expiry,
                    "refreshToken" => $token
                ]
            ];
            echo json_encode($response);
        } else {
            $response = [
                "code" => -1,
                "msg" => "Error occurred during registration",
                "msgCode" => 999,
                "error" => $conn->error,
                "serviceNowTime" => date("Y-m-d H:i:s")
            ];
            echo json_encode($response);
        }
    }
}

$conn->close();

function getNewcode($conn) {
    $prefix = "fhRy"; // Define the prefix
    $sql = "SELECT MAX(code) AS maxCode FROM users WHERE code LIKE '{$prefix}%'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    if ($row && $row["maxCode"]) {
        // Extract the numeric part after the prefix
        $currentNumber = (int)substr($row["maxCode"], strlen($prefix));
        // Increment the numeric part
        $newNumber = $currentNumber + 1;
    } else {
        // Starting number if no existing code is found
        $newNumber = 13734222;
    }

    // Combine the prefix with the incremented number to create the new code
    return $prefix . $newNumber;
}

function getNewUserId($conn) {
    $sql = "SELECT MAX(id_user) AS maxId FROM users";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    return $row["maxId"];
}

setcookie("token", $token, $expiry, "/");
?>
