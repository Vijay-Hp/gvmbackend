<?php
// Required models and headers

include_once '../../../config/header.php';
include_once '../../../models/delete.php';

// Include the validation logic
// $validationPath= '../../../../config/validation.php'; 

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
$data = json_decode(file_get_contents('php://input')); //userid
// Check if JSON decoding was successful
if (json_last_error() != JSON_ERROR_NONE) {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid JSON data']);
    exit();
}
// Check if userId is present and not empty

// if (!isset($data->discussionId) ||empty(trim($data->discussionId))) {
//     http_response_code(400);
//     echo json_encode(['error' => 'UserId is required']);
//     exit();
// }
//auth   
$obj = new Delete();

$result = $obj->delete_user($data->email);

// Handle errors
if ($result === false) {
    handleResponse(500, 'internal server error');
}

// Send the result
echo json_encode($result);
?> 