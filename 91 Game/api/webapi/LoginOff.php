<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
date_default_timezone_set('Asia/Kolkata');
setcookie('token', '', time() - 3600, '/');
$response = ["code" => 0, "msg" => "Login out", "msgCode" => 129, "serviceNowTime" => date('Y-m-d H:i:s')];
header('Content-Type: application/json');
echo json_encode($response);
?>
