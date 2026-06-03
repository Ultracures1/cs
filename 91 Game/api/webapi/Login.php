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

$postData = file_get_contents("php://input");
$data = json_decode($postData, true);

date_default_timezone_set('Asia/Kolkata');

if ($data !== null) {
    $username = isset($data['username']) ? $data['username'] : '';
    $pwd = isset($data['pwd']) ? $data['pwd'] : '';

    $usernameWithoutFirstTwoNumbers = substr($username, 2);
    $username = $usernameWithoutFirstTwoNumbers;

    $sql = "SELECT * FROM users WHERE phone = '" . $conn->real_escape_string($username) . "'";
    $result = $conn->query($sql);

    if ($result->num_rows == 0) {
        $response = [
            "data" => null,
            "code" => 1,
            "msg" => "User does not exist",
            "msgCode" => 101,
            "serviceNowTime" => date('Y-m-d H:i:s', time())
        ];
    } else {
        $row = $result->fetch_assoc();

        if ($row['status'] == 2) {
            $response = [
                "data" => null,
                "code" => 1,
                "msg" => "Account has been forbidden",
                "msgCode" => 116,
                "serviceNowTime" => date('Y-m-d H:i:s', time())
            ];
        } else {
            $storedPassword = $row['password'];

            if ($pwd === $storedPassword) {
                $token = bin2hex(random_bytes(32));
                $expiry = time() + 604800;

                $updateTokenSql = "UPDATE users SET token = '$token', time = '" . date('Y-m-d H:i:s', time()) . "' WHERE phone = '" . $conn->real_escape_string($username) . "'";
                $conn->query($updateTokenSql);

                $notificationSql = "INSERT INTO notification (username, title, messages, notification_time, is_read) 
                        VALUES ('" . $conn->real_escape_string($username) . "', 'Login Notification', 'Your account is logged in " . date('Y-m-d H:i:s', time()) . "', '" . date('Y-m-d H:i:s', time()) . "', 'yes')";
                $conn->query($notificationSql);

                setcookie("token", $token, $expiry, "/");

                $response = [
                    "data" => [
                        "tokenHeader" => "Bearer ",
                        "token" => $token,
                        "expiresIn" => 604800,
                        "refreshToken" => null,
                        "passwordErrorNum" => 1,
                        "passwordErrorMaxNum" => 50
                    ],
                    "code" => 0,
                    "msg" => "Login successful",
                    "msgCode" => 200,
                    "serviceNowTime" => date('Y-m-d H:i:s', time())
                ];
            } else {
                $response = [
                    "data" => [
                        "tokenHeader" => null,
                        "token" => null,
                        "expiresIn" => 0,
                        "refreshToken" => null,
                        "passwordErrorNum" => 1,
                        "passwordErrorMaxNum" => 50
                    ],
                    "code" => 1,
                    "msg" => "Incorrect password",
                    "msgCode" => 117,
                    "serviceNowTime" => date('Y-m-d H:i:s', time())
                ];
            }
        }
    }
} else {
    echo json_encode([
        "data" => null,
        "code" => 1,
        "msg" => "Failed to decode JSON payload",
        "msgCode" => 500,
        "serviceNowTime" => date('Y-m-d H:i:s', time())
    ]);
}

$conn->close();
header('Content-Type: application/json');
echo json_encode($response);
?>
