<?php
// Required models and headers
include_once '../../../config/database.php';
include_once '../../../models/get.php';
include_once '../../../config/header.php';
//why these code is here
// if (file_exists($modelsPath) && file_exists($headersPath)) {
//     require_once $modelsPath;
//     require_once $headersPath;
//     // require_once $validationPath;
// } else {
//     // Handle the case where one or both files are missing
//     http_response_code(500);
//     echo json_encode(['error' => 'required files are missing']);
//     exit();
// }
$data = json_decode(file_get_contents('php://input'));

// Check if JSON decoding was successful
// if (json_last_error() != JSON_ERROR_NONE) {
//     http_response_code(400);
//     echo json_encode(['error' => 'Invalid JSON data']);
//     exit();
// }
//why these code is here

//auth   
$obj = new Get();


$result = $obj->fetch_salesfliterDetails($data->start_date, $data->end_date);

// Handle errors
// Function to handle errors and send response
function handleResponse($statusCode, $message)
{
    http_response_code($statusCode);
    echo json_encode(['error' => $message]);
    exit();
}
if ($result === false) {
    handleResponse(500, 'internal server error');
}

// Send the result
echo json_encode($result);
?>