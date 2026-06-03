<?php
// Allow access from any origin
header("Access-Control-Allow-Origin: *");

// Allow specific HTTP methods
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

// Allow specific headers
header("Access-Control-Allow-Headers: Content-Type, Authorization");

// Set the Content-Type to application/json
header('Content-Type: application/json');

// Check if the request method is GET
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Define the response for GET requests
    $response = [
        "data" => [],
        "is_paymentid_valid" => "true",
        "payment_mode" => "manual",
        "status_code" => "success"
    ];
    // Output the JSON-encoded response
    echo json_encode($response);
    exit;
}

// Check if the request method is OPTIONS (for CORS preflight)
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    // Send a 200 OK response for the preflight OPTIONS request
    http_response_code(200);
    echo json_encode(["status" => "OPTIONS OK"]);
    exit;
}

// Optional: Handle other request methods (e.g., POST) if needed
?>
