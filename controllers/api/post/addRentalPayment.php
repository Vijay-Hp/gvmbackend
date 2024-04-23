<?php
include_once '../../../config/header.php';
include_once '../../../models/post.php';

$data = json_decode(file_get_contents('php://input'));
// print_r($data);
$obj = new Post();
$result = $obj->insert_rentalPaymentDetails(
    $data->site_name,
    $data->date,
    $data->make_payment,
    $data->payment_method
);
echo json_encode($result);
?>