<?php
include_once '../../../config/header.php';
include_once '../../../models/post.php';


$data = json_decode(file_get_contents('php://input'));
// print_r($data);
$obj = new Post();
$result = $obj->insert_rentalDetails(
$data->product_quantity,
$data->total_amount,
$data->product_id,
$data->product_name,
$data->product_quantity1,
$data->days,
$data->date,
$data->total_amount1,
$data->balance_amount,
$data->payment_method

);
echo json_encode($result);
?>