<?php
include_once '../../../config/header.php';
include_once '../../../models/post.php';


$data = json_decode(file_get_contents('php://input'));
// print_r($data);
$obj = new Post();
$result = $obj->insert_rentalDetails(
    $data->site_name,
    $data->date1,
    $data->rent,
    $data->subtotal,
    $data->gstAmount,
    $data->total,
    $data->paid,
    $data->balance
);
echo json_encode($result);


// $data = json_decode(file_get_contents('php://input'));
// // print_r($data);
// $obj = new Post();
// $result = $obj->insert_rentalDetails1(
//     $data->id,
//     $data->site_name,
//     $data->date,
//     $data->total,
//     $data->paid,
//     $data->balance
// );
// echo json_encode($result);
?>