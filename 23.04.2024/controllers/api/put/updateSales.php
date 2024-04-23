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

$result = $obj->update_salesDetails(
    $data->sales_id,
    $data->mobile_no,
    $data->customer_name,
    $data->customer_type,
    $data->location,
    $data->site_name,
    $data->product_name,
    $data->product_quantity,
    $data->total_amount,
    $data->paid_amount,
    $data->balance_amount,
    $data->payment_method,
    $data->payment_type,
    $data->gst_no,
    $data->vehicle_no,
    $data->vehicle_type,
    $data->driver_name,
    $data->fuel_liter,
    $data->fuel_amount,
    $data->date,
    $data->wages,
    $data->wages_amount,
    $data->other_expenses,
    $data->expenses_amount,
    $data->wages_total_amount,
    $data->rental_amount,
    $data->balance_amount1,

);
// Handle errors
if ($result === false) {
    handleResponse(500, 'internal server error');
}

// Send the result
echo json_encode($result);
?>