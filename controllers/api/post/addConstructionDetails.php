<?php
include_once '../../../config/header.php';
include_once '../../../models/post.php';

$data = json_decode(file_get_contents('php://input'));
// print_r($data);
$obj = new Post();
$result = $obj->insert_constructionDetails(
            $data->building_name,
            $data->manager_name,
            $data->total_workers,
            $data->total_amount,
            $data->location,
            $data->category,
            $data->type,
            $data->salary_amount,
            $data->payment_method
);
echo json_encode($result);
?>