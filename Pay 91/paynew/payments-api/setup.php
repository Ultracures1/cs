<?php
$host = 'localhost';
$dbname = 'abcoders_db';
$username = 'abcoders_db';
$password = 'abcoders_db';
$connection = new mysqli($host, $username, $password, $dbname);
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
$response = array(
    "pg_status" => "ON",
    "rand_index" => 0,
    "pg_payee_id" => ""
);
$query = "SELECT upi_id FROM upi_ids LIMIT 1";
$result = $connection->query($query);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $response["pg_payee_id"] = $row["upi_id"];
}
$connection->close();
header('Content-Type: application/json');
echo json_encode($response);
?>
