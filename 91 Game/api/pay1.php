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

// Function to generate a unique order ID
function generateOrderId() {
    $date = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
    $formattedDate = $date->format('YmdHis');
    $uniqueId = uniqid();
    return "p$formattedDate$uniqueId";
}

// Function to insert a recharge record into the database
function insertRecharge($pdo, $tyid, $amount) {
    // Generate a new order ID
    $id_order = generateOrderId();
    
    // Get the current date and time
    $today = date('Y-m-d');
    $time = date('Y-m-d H:i:s');

    // Prepare the SQL query
    $sql = "INSERT INTO recharge (id_order, transaction_id, phone, money, type, status, today, url, time, utr) 
            VALUES (:id_order, 0, :phone, :amount, :tyid, 0, :today, 0, :time, '')";

    // Prepare and execute the statement
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id_order', $id_order);

    $uid = isset($_GET['uid']) ? $_GET['uid'] : null;
    $stmtUser = $pdo->prepare("SELECT phone FROM users WHERE id_user = :uid");
    $stmtUser->bindParam(':uid', $uid);
    $stmtUser->execute();
    $user = $stmtUser->fetch(PDO::FETCH_ASSOC);
    $phone = $user['phone'];

    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':amount', $amount);
    $stmt->bindParam(':tyid', $tyid);
    $stmt->bindParam(':today', $today);
    $stmt->bindParam(':time', $time);

    $stmt->execute();

    // Check if the row was inserted successfully
    if ($stmt->rowCount() > 0) {
        // Redirect to the specified URL with query parameters
        $redirectUrl = "https://abcoders.in/pay/utrpay-58745/?amount=$amount&user_id=$phone";
        header("Location: $redirectUrl");
        exit();
    } else {
        echo "Failed to insert a new row in the recharge table.";
    }
}

// Get parameters from the request
$tyid = isset($_GET['tyid']) ? $_GET['tyid'] : null;
$amount = isset($_GET['amount']) ? $_GET['amount'] : null;

// Call the insertRecharge function with the provided parameters
insertRecharge($pdo, $tyid, $amount);

?>
