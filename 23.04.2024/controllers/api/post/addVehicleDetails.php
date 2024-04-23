<?php
include_once '../../../config/header.php';
include_once '../../../models/post.php';

$data = json_decode(file_get_contents('php://input'));
// print_r($data);
$obj = new Post();
$result = $obj->insert_vehicleDetails(
    $data->vehicle_no,
    $data->chassis_no,
    $data->vehicle_model,
    $data->fc_amount,
    $data->fc_date,
    $data->tax,
    $data->insurance_date,
    $data->permit,
    $data->pollution,
    $data->fuel_type,
);
echo json_encode($result);
?>