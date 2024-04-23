<?php
//fetch cors error
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH,OPTIONS');
header('Access-Control-Allow-Headers: token, Content-Type');
header('Access-Control-Max-Age: 1728000');
header('Content-Length: 0');
header('Content-Type: text/plain');
// die();

// header('Access-Control-Allow-Origin: *');
// header('Content-Type: application/json');
?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    //insert cors error
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH, OPTIONS');
    header('Access-Control-Allow-Headers: token, Content-Type');
    header('Access-Control-Max-Age: 1728000');
    header('Content-Length: 0');
    header('Content-Type: text/plain');
    die();
}
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
?>

<?php
// Allow requests from any origin
header('Access-Control-Allow-Origin: *');

// Allow specified HTTP methods
header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH, OPTIONS');

// Allow specified headers
header('Access-Control-Allow-Headers: Content-Type, token');

// Allow the preflight request to be cached for 20 days
header('Access-Control-Max-Age: 1728000');

// Respond to preflight requests immediately and terminate script execution
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    header('Content-Length: 0');
    header('Content-Type: text/plain');
    http_response_code(204);
    exit();
}

// Set the content type for regular responses
header('Content-Type: application/json');
?>