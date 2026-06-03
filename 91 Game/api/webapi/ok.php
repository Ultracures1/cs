<?php

// Get current date
$currentDate = date("Ymd");

// Generate a random string for the remaining part
$randomPart = mt_rand(0, 9999999999999999); // Max length to fit into 20 characters

// Concatenate the current date with the random part
$randomString = $currentDate . str_pad($randomPart, 20 - strlen($currentDate), "0", STR_PAD_LEFT);

// Output the generated string
echo $randomString;

?>
