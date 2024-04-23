<?php
include_once '../../../config/header.php';
include_once '../../../models/post.php';

$data = json_decode(file_get_contents('php://input'));
// print_r($data);
$obj = new Post();
$result = $obj->insert_serviceDetails(
    $data->vehicle_no,
    $data->date,
    $data->service,
    $data->subtotal,
    $data->gstAmount,
    $data->total
);
echo json_encode($result);
?>