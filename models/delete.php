<?php
include_once '../../../config/database.php';

class Delete
{
    public $conn;
    public $response;

    function __construct()
    {
        $db = new Database();
        $this->conn = $db->connect();
    }
    //module:purchase
    public function delete_purchase($purchaseId)
    {

        $deleteReq = "DELETE FROM purchase WHERE purchase_id=?";
        $stmtDelete = mysqli_prepare($this->conn, $deleteReq);
        mysqli_stmt_bind_param($stmtDelete, 's', $purchaseId);
        $resultDelete = mysqli_stmt_execute($stmtDelete);

        if ($resultDelete) {
            // echo "del";
            $this->response = ["message" => "deleted"];
        } else {
            // echo "not del";
            $this->response = ["message" => "not deleted"];

        }

        mysqli_stmt_close($stmtDelete);


        return $this->response;
    }

    //module:sales
    public function delete_sales($salesId)
    {

        $deleteReq = "DELETE FROM sales WHERE sales_id=?";
        $stmtDelete = mysqli_prepare($this->conn, $deleteReq);
        mysqli_stmt_bind_param($stmtDelete, 's', $salesId);
        $resultDelete = mysqli_stmt_execute($stmtDelete);

        if ($resultDelete) {
            // echo "del";
            $this->response = ["message" => "deleted"];
        } else {
            // echo "not del";
            $this->response = ["message" => "not deleted"];

        }

        mysqli_stmt_close($stmtDelete);


        return $this->response;
    }

    //module:vehicle
    public function delete_vehicle($vehicleNo)
    {

        $deleteReq = "DELETE FROM vehicle WHERE vehicle_no=?";
        $stmtDelete = mysqli_prepare($this->conn, $deleteReq);
        mysqli_stmt_bind_param($stmtDelete, 's', $vehicleNo);
        $resultDelete = mysqli_stmt_execute($stmtDelete);

        if ($resultDelete) {
            // echo "del";
            $this->response = ["message" => "deleted"];
        } else {
            // echo "not del";
            $this->response = ["message" => "not deleted"];

        }
        mysqli_stmt_close($stmtDelete);
        return $this->response;
    }

    //module:user
    public function delete_user($mail)
    {
        $deleteReq = "DELETE FROM adduser WHERE email=?";
        $stmtDelete = mysqli_prepare($this->conn, $deleteReq);
        mysqli_stmt_bind_param($stmtDelete, 's', $mail);
        $resultDelete = mysqli_stmt_execute($stmtDelete);

        if ($resultDelete) {
            // echo "del";
            $this->response = ["message" => "deleted"];
        } else {
            // echo "not del";
            $this->response = ["message" => "not deleted"];
        }

        mysqli_stmt_close($stmtDelete);


        return $this->response;
    }



    //module:salary
    public function delete_salary($employeeId)
    {

        $deleteReq = "DELETE FROM salary WHERE employee_id=?";
        $stmtDelete = mysqli_prepare($this->conn, $deleteReq);
        mysqli_stmt_bind_param($stmtDelete, 's', $employeeId);
        $resultDelete = mysqli_stmt_execute($stmtDelete);

        if ($resultDelete) {
            $this->response = ["message" => "deleted"];
        } else {
            $this->response = ["message" => "not deleted"];
        }
        mysqli_stmt_close($stmtDelete);
        return $this->response;
    }
    //module:construction
    public function delete_construction($buildingName)
    {

        $deleteReq = "DELETE FROM construction WHERE building_name=?";
        $stmtDelete = mysqli_prepare($this->conn, $deleteReq);
        mysqli_stmt_bind_param($stmtDelete, 's', $buildingName);
        $resultDelete = mysqli_stmt_execute($stmtDelete);

        if ($resultDelete) {
            $this->response = ["message" => "deleted"];
        } else {
            $this->response = ["message" => "not deleted"];

        }

        mysqli_stmt_close($stmtDelete);
        return $this->response;
    }

    //module:Rental
    public function delete_rental($productId)
    {

        $deleteReq = "DELETE FROM rental WHERE product_id=?";
        $stmtDelete = mysqli_prepare($this->conn, $deleteReq);
        mysqli_stmt_bind_param($stmtDelete, 's', $productId);
        $resultDelete = mysqli_stmt_execute($stmtDelete);

        if ($resultDelete) {
            $this->response = ["message" => "deleted"];
        } else {
            $this->response = ["message" => "not deleted"];
        }
        mysqli_stmt_close($stmtDelete);
        return $this->response;
    }

}