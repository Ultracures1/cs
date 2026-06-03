<?php
// Database connection details
$host = 'localhost';
$dbname = 'abcoders_db';
$username = 'abcoders_db';
$password = 'abcoders_db';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die(json_encode(['error' => 'Database connection failed: ' . $e->getMessage()]));
}

date_default_timezone_set('Asia/Kolkata');

function generateOrderId() {
    $date = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
    return "p" . $date->format('YmdHis') . uniqid();
}

function insertRecharge($pdo, $tyid, $amount, $utr, $user) {
    // Check if transaction ID already exists
    $stmtCheck = $pdo->prepare("SELECT COUNT(*) FROM recharge WHERE transaction_id = :utr");
    $stmtCheck->bindParam(':utr', $utr);
    $stmtCheck->execute();
    if ($stmtCheck->fetchColumn() > 0) {
        return true; // Transaction already exists
    }

    // Insert the new recharge record
    $id_order = generateOrderId();
    $today = date('Y-m-d');
    $time = date('Y-m-d H:i:s');
    $sql = "INSERT INTO recharge (id_order, type, utr, phone, money, today, time) 
            VALUES (:id_order, :tyid, :utr, :user, :amount, :today, :time)";
    
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id_order', $id_order);
    $stmt->bindParam(':tyid', $tyid);
    $stmt->bindParam(':utr', $utr);
    $stmt->bindParam(':user', $user);
    $stmt->bindParam(':amount', $amount);
    $stmt->bindParam(':today', $today);
    $stmt->bindParam(':time', $time);

    try {
        return $stmt->execute();
    } catch (Exception $e) {
        error_log('Failed to insert recharge record: ' . $e->getMessage());
        echo json_encode(['error' => 'Failed to insert recharge record: ' . $e->getMessage()]);
        return false;
    }
}

// Retrieve required parameters from the GET request
$amount = $_GET['PAYEE_AMOUNT'] ?? null;
$user = $_GET['CRUDENTIALS'] ?? null;
$utr = $_GET['REFERENCE_NUM'] ?? null;

if (!$user || !$amount || !$utr) {
    echo json_encode(['error' => 'Missing parameters.']);
    exit();
}

// Insert the recharge record and set the response code accordingly
$success = insertRecharge($pdo, 1, $amount, $utr, $user);

if ($success) {
    echo json_encode(["response_code" => "true"]);
} else {
    echo json_encode(['error' => 'Failed to insert recharge record.']);
}
?>
