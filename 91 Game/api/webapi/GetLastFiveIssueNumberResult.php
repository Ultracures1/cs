<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
$servername = "localhost";
$usernameDB = "abcoders_db";
$password = "abcoders_db";
$dbname = "abcoders_db";

$connection = mysqli_connect($servername, $usernameDB, $password, $dbname);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

date_default_timezone_set('Asia/Kolkata');

$postData = file_get_contents("php://input");
$data = json_decode($postData, true);

if ($data && isset($data['typeId'])) {
    $typeId = $data['typeId'];

    
    switch ($typeId) {
        case 1:
            $game = "wingo";
            break;
        case 2:
            $game = "wingo3";
            break;
        case 3:
            $game = "wingo5";
            break;
        case 4:
            $game = "wingo10";
            break;
        default:
            $game = ""; 
    }

    $query = "SELECT * FROM `wingo` WHERE `game` = '$game' AND `status` = 1 ORDER BY `id` DESC LIMIT 5";
    $result = mysqli_query($connection, $query);

    $issueNumbers = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $issueNumbers[] = $row['amount'];
    }

    $response = array(
        "data" => array(
            "number" => implode(",", $issueNumbers)
        ),
        "code" => 0,
        "msg" => "Succeed",
        "msgCode" => 0,
        "serviceNowTime" => date("Y-m-d H:i:s")
    );

    $jsonResponse = json_encode($response);

    header('Content-Type: application/json');
    echo $jsonResponse;

    mysqli_close($connection);
} else {
    
    http_response_code(400);
    echo json_encode(array("error" => "Invalid request data"));
}
?>
