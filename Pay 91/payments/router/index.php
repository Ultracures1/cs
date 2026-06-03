<?php
// Allow access from any origin
header("Access-Control-Allow-Origin: *");

// Allow specific HTTP methods
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

// Allow specific headers
header("Access-Control-Allow-Headers: Content-Type, Authorization");

// Set the Content-Type to application/json
header('Content-Type: application/json');

// Check if the request method is OPTIONS
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    echo json_encode(["status" => "OK"]);
    exit;
}

// Default response if required parameters are missing or invalid
$defaultResponse = [
    "data" => [],
    "is_paymentid_valid" => "true",
    "payment_mode" => "manual",
    "status_code" => "success"
];

// Handle GET and POST requests
if ($_SERVER['REQUEST_METHOD'] === 'POST' || $_SERVER['REQUEST_METHOD'] === 'GET') {
    // Get parameters based on the request method
    $input = ($_SERVER['REQUEST_METHOD'] === 'POST') 
        ? json_decode(file_get_contents('php://input'), true) 
        : $_GET;

    // Log or debug input data to ensure it's being received correctly
    error_log("Received input: " . json_encode($input));

    // Check if `RECHARGE_AMOUNT` and `CREDENTIALS` (or `CRUDENTIALS`) are valid
    if (
        isset($input['RECHARGE_AMOUNT']) && !empty($input['RECHARGE_AMOUNT']) &&
        (isset($input['CREDENTIALS']) || isset($input['CRUDENTIALS'])) && 
        !empty($input['CREDENTIALS'] ?? $input['CRUDENTIALS'])
    ) {
        // If valid values are found, respond with payment details
        $credentials = $input['CREDENTIALS'] ?? $input['CRUDENTIALS']; // Use whichever is set
        $response = [
            "data" => [],
            "payment_id" => "RR" . uniqid(),
            "payment_upi" => "paytmqr5hyn4o@ptys",
            "payment_time_left" => 300,
            "payment_yt_tutorial_id" => "",
            "payment_amount" => $input['RECHARGE_AMOUNT'],
            "status_code" => "success"
        ];
    } else {
        // If required parameters are missing or invalid, return the default response
        $response = $defaultResponse;
    }

    // Output the JSON-encoded response
    echo json_encode($response);
    exit;
}

// Default response for unsupported request methods
echo json_encode(["status" => "error", "message" => "Unsupported request method."]);
exit;
?>
