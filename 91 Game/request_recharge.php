<?php
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
    $formattedDate = $date->format('YmdHis');
    $uniqueId = uniqid();
    return "p$formattedDate$uniqueId";
}

function insertRecharge($pdo, $tyid, $amount, $utr, $user) {
    
    $stmtCheck = $pdo->prepare("SELECT COUNT(*) FROM recharge WHERE transaction_id = :utr");
    $stmtCheck->bindParam(':utr', $utr);
    $stmtCheck->execute();
    $transactionCount = $stmtCheck->fetchColumn();

    
    if ($transactionCount > 0) {
        
        return true;
    }

    
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

$tyid = 2;
$amount = isset($_GET['am']) ? $_GET['am'] : null;
$user = isset($_GET['user']) ? $_GET['user'] : null;
$utr = isset($_GET['utr']) ? $_GET['utr'] : null;

if (!$user || !$amount || !$utr) {
    echo json_encode(['error' => 'Missing parameters.']);
    exit();
}

$success = insertRecharge($pdo, $tyid, $amount, $utr, $user);

if ($success) {
    echo json_encode(["status_code" => "pending"]);
} else {
    echo json_encode(['error' => 'Failed to insert recharge record.']);
}
?>
