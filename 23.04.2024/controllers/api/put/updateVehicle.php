<?php
// Required models and headers
include_once '../../../config/database.php';
include_once '../../../config/header.php';
include_once '../../../models/put.php';

$data = json_decode(file_get_contents('php://input'));
 
$obj = new Put();

$result = $obj->update_vehicleDetails(
    $data->vehicle_no,
    $data->chassis_no,
    $data->vehicle_model,
    $data->fc_amount,
    $data->fc_date,
    $data->tax,
    $data->insurance_date,
    $data->permit,
    $data->pollution,
    $data->fuel_type

);
// Handle errors
if ($result === false) {
    handleResponse(500, 'internal server error');
}

// Send the result
echo json_encode($result);
?>