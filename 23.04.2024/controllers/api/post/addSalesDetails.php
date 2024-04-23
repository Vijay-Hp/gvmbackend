<?php
include_once '../../../config/header.php';
include_once '../../../models/post.php';

$data = json_decode(file_get_contents('php://input'));
// print_r($data);
$obj = new Post();
$result = $obj->insert_salesDetails(
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
echo json_encode($result);
?>