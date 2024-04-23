<?php
// Required models and headers
include_once '../../../config/database.php';
include_once '../../../config/header.php';
include_once '../../../models/put.php';


// if (file_exists($modelsPath) && file_exists($headersPath)) {
//     require_once $modelsPath;
//     require_once $headersPath;
//     require_once $validationPath;
// } else {
//     // Handle the case where one or both files are missing
//     http_response_code(500);
//     echo json_encode(['error' => 'required files are missing']);
//     exit();
// }
$data = json_decode(file_get_contents('php://input')); 

// Validate the data
//auth   
$obj = new Put();

$result = $obj->update_rentalDetails(
    $data->product_id,
    $data->product_quantity,
    $data->total_amount,
    $data->product_name,
    $data->product_quantity1,
    $data->days,
    $data->date,
    $data->total_amount,
    $data->balance_amount,
    $data->payment_method
);
// Handle errors
if ($result === false) {
    handleResponse(500, 'internal server error');
}

// Send the result
echo json_encode($result);
?> 