<?php
include_once '../../../config/header.php';
include_once '../../../models/post.php';

$data = json_decode(file_get_contents('php://input'));
// print_r($data);
$obj = new Post();
$result = $obj->insert_salaryDetails(
    $data->employee_id,
    $data->mobile_no,
    $data->employee_name,
    $data->wages_type,
    $data->salary_amount,
    $data->paid_amount,
    $data->payment_method,
);
echo json_encode($result);
?>