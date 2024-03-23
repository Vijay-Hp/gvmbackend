<?php
include_once '../../../config/header.php';
include_once '../../../models/post.php';

$data = json_decode(file_get_contents('php://input'));
// print_r($data);
$obj = new Post();
$result = $obj->insert_purchaseDetails(
    $data->purchase_id,
    $data->mobile_no,
    $data->vendor_name,
    $data->vendor_type,
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
    $data->user_type
);
echo json_encode($result);
?>