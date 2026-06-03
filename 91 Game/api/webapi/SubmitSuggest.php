<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
$servername = "localhost";
$username = "abcoders_db";
$password = "abcoders_db";
$dbname = "abcoders_db";

if (!isset($_COOKIE['token'])) {
    exit(json_encode([
        "code" => 1,
        "msg" => "Unauthorized access: Token not found"
    ]));
}

$token = $_COOKIE['token'];

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

date_default_timezone_set('Asia/Kolkata');

$sql = "SELECT phone FROM users WHERE token = '" . $conn->real_escape_string($token) . "'";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
    exit(json_encode([
        "code" => 1,
        "msg" => "Unauthorized access: Invalid token"
    ]));
}

$row = $result->fetch_assoc();
$username = $row['phone'];

$postData = file_get_contents("php://input");
$data = json_decode($postData, true);

if ($data !== null && isset($data['content'])) {
    $content = $data['content'];
    
    date_default_timezone_set('Asia/Kolkata');
    $submission_time = (new DateTime('now', new DateTimeZone('Asia/Kolkata')))->format('Y-m-d H:i:s');

    if (strlen($content) < 8 || strlen($content) > 2000) {
        echo json_encode([
            "code" => 7,
            "msg" => "Content length should be between 8 and 2000 characters"
        ]);
    } else {
       
        $sql = "INSERT INTO feedback (username, content, submission_time) VALUES ('$username', '$content', '$submission_time')";

        if ($conn->query($sql) === TRUE) {
            $response = [
                "code" => 0,
                "msg" => "Succeed",
                "msgCode" => 0,
                "serviceNowTime" => date('Y-m-d H:i:s', time())
            ];
        } else {
            $response = [
                "code" => 1,
                "msg" => "Failed to insert feedback into database: " . $conn->error
            ];
        }
    }
} else {
    $response = [
        "code" => 1,
        "msg" => "Invalid or missing content parameter"
    ];
}

$conn->close();

header('Content-Type: application/json');
echo json_encode($response);
?>
