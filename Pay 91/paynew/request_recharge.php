<?php

$utr = $_GET['utr'];
$user = $_GET['user'];
$am = $_GET['am'];

$url = 'https://upifast.org/cheakall?user_token=d38d90c0cf6e18288ffd34aeddc456uhgf';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);

if ($response === false) {
    echo 'Error: ' . curl_error($ch);
} else {
    $data = json_decode($response, true);
    $transactionFound = false;
    $paymentDetails = [];

    foreach ($data as $transaction) {
        if ($transaction['UTR'] == $utr && $transaction['Status'] == 'COMPLETED') {
            $transactionFound = true;
            $amount = $transaction['Amount'];
            $user1 = $transaction['Customer Name'];

            $paymentDetails[] = [
                "payment_payer_name" => $user1,
                "payment_ref_num" => $utr,
                "payment_amount" => number_format($amount, 2),
                "payment_datetime" => $transaction['Date & Time']
            ];
        }
    }

    if ($transactionFound) {
        $responseArray = [
            "status_code" => "success",
            "payment_details" => $paymentDetails
        ];
        echo json_encode($responseArray);
    } else {
        echo '{"status_code":"pending"}';
    }

    try {
        $dsn = 'mysql';
        $host = 'localhost';
        $dbname = 'abcoders_db';
        $username = 'abcoders_db';
        $password = 'abcoders_db';

        $pdo = new PDO($dsn, $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET time_zone = '+05:30'"));
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if ($transactionFound) {
            $stmt = $pdo->prepare("SELECT * FROM recharge WHERE utr = :utr");
            $stmt->bindParam(':utr', $utr);
            $stmt->execute();
            $recharge = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$recharge) {
                $stmt = $pdo->prepare("INSERT INTO recharge (username, recharge, created_at, utr, status) VALUES (:user, :amount, NOW(), :utr, 'success')");
                $stmt->bindParam(':user', $user);
                $stmt->bindParam(':amount', $amount);
                $stmt->bindParam(':utr', $utr);
                $stmt->execute();

                $stmt = $pdo->prepare("UPDATE users SET balance = balance + :amount WHERE username = :user");
                $stmt->bindParam(':user', $user);
                $stmt->bindParam(':amount', $amount);
                $stmt->execute();
            }
        } else {
            $stmt = $pdo->prepare("SELECT * FROM recharge WHERE utr = :utr");
            $stmt->bindParam(':utr', $utr);
            $stmt->execute();
            $existingRecharge = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$existingRecharge) {
                $stmt = $pdo->prepare("INSERT INTO recharge (username, recharge, created_at, utr, status) VALUES (:user, :amount, NOW(), :utr, 'unpaid')");
                $stmt->bindParam(':user', $user);
                $stmt->bindParam(':amount', $am);
                $stmt->bindParam(':utr', $utr);
                $stmt->execute();
            }
        }
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

curl_close($ch);

?>
