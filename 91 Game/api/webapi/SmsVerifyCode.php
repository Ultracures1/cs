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

$phone = substr($data['phone'], 2); 
$phone = $conn->real_escape_string($phone);

$sql = "SELECT * FROM users WHERE phone = '$phone'";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
    $response = [
        "code" => 1,
        "msg" => "User not exists",
        "msgCode" => 101,
        "serviceNowTime" => date("Y-m-d H:i:s")
    ];
    echo json_encode($response);
} else {
    $otp = rand(100000, 999999); 

    
    $updateSql = "UPDATE users SET otp = '$otp' WHERE phone = '$phone'";
    $conn->query($updateSql);

    
    $apiKey = "69205493a10f4907bf568aca88c72a77"; 
    $senderName = "STCCCL"; 
    $message = "{$otp} is your OTP for STCC website. STCCCL";

    $url = "http://login.quicksms.info/api/sendsms?apikey=" . $apiKey . "&number=" . $phone . "&sendername=" . $senderName . "&service=TRANS&msg=" . urlencode($message);

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_SSL_VERIFYHOST => 0,
        CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "content-type: application/x-www-form-urlencoded",
            "accept: */*",
        ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if (!$err) {
        $response = [
            "code" => 0,
            "msg" => "SMS sent successfully",
            "msgCode" => 139,
            "serviceNowTime" => date("Y-m-d H:i:s")
        ];
        echo json_encode($response);
    } else {
        $response = [
            "code" => -1,
            "msg" => "Failed to send SMS",
            "msgCode" => 999,
            "serviceNowTime" => date("Y-m-d H:i:s")
        ];
        echo json_encode($response);
    }
}

$conn->close();
?>
