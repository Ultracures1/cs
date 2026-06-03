<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "abcoders_db";
$password = "abcoders_db";
$dbname = "abcoders_db";

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
    exit();
}

date_default_timezone_set('Asia/Kolkata');

function redirectForPayment($phone, $amount) {
    $redirectUrl = "https://pay.abcoders.in/?am=$amount&crudentials=$phone";
    header("Location: $redirectUrl");
    exit();
}

$uid = isset($_GET['uid']) ? $_GET['uid'] : null;
$amount = isset($_GET['amount']) ? $_GET['amount'] : null;

if ($uid !== null && $amount !== null) {
    // Retrieve the phone number associated with the user ID
    $stmtUser = $pdo->prepare("SELECT phone FROM users WHERE id_user = :uid");
    $stmtUser->bindParam(':uid', $uid);
    $stmtUser->execute();
    $user = $stmtUser->fetch(PDO::FETCH_ASSOC);
    
    if ($user && isset($user['phone'])) {
        $phone = $user['phone'];
        // Redirect the user for payment
        redirectForPayment($phone, $amount);
    } else {
        echo "User not found.";
    }
} else {
    echo "User ID or amount not specified.";
}

?>
