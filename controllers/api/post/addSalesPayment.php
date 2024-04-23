<?php
include_once '../../../config/header.php';
include_once '../../../models/post.php';

$data = json_decode(file_get_contents('php://input'));
// print_r($data);
$obj = new Post();
$result = $obj->insert_salesPaymentDetails(
    $data->sales_id,
    $data->mobile_no,
    $data->customer_name,
    $data->make_payment,
    $data->date,
);
echo json_encode($result);
?>