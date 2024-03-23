<?php

include_once '../../../config/database.php';
// include_once 'post.php';
// error_reporting(E_ALL & ~E_NOTICE);

class Put
{
    public $conn;
    public $response;
    public $headers = "MIME-Version: 1.0" . "\r\n";
    public $postget;
    public function __construct()
    {
        $this->initializeDatabase();
    }

    private function initializeDatabase()
    {
        // $db = Database::getInstance();
        $db = new Database();
        $this->conn = $db->connect();
        // $this->postget=new Post();
    }

    //module=purchase
    //submodule=update purchase details
    public function update_purchaseDetails(
        $purchase_id,
        $mobile_no,
        $vendor_name,
        $vendor_type,
        $product_name,
        $product_quantity,
        $total_amount,
        $paid_amount,
        $balance_amount,
        $payment_method,
        $payment_type,
        $gst_no,
        $vehicle_no,
        $vehicle_type,
        $driver_name,
        $fuel_liter,
        $fuel_amount,
        $date,
        $wages,
        $wages_amount,
        $other_expenses,
        $expenses_amount,
        $wages_total_amount,
        $rental_amount,
        $balance_amount1
    ) {
        $update = "UPDATE purchase SET mobile_no=?, vendor_name=?, vendor_type=?, product_name=?, product_quantity=?, total_amount=?, paid_amount=?, balance_amount=?, payment_method=?, payment_type=?, gst_no=?, vehicle_no=?, vehicle_type=?, driver_name=?, fuel_liter=?, fuel_amount=?, date=?, wages=?, wages_amount=?, other_expenses=?, expenses_amount=?, wages_total_amount=?, rental_amount=?, balance_amount1=? WHERE purchase_id=?";

        $stmt = mysqli_prepare($this->conn, $update);

        if (!$stmt) {
            return mysqli_error($this->conn);
        }

        mysqli_stmt_bind_param($stmt, "isssiiiissssssiissisiiiii", $mobile_no, $vendor_name, $vendor_type, $product_name, $product_quantity, $total_amount, $paid_amount, $balance_amount, $payment_method, $payment_type, $gst_no, $vehicle_no, $vehicle_type, $driver_name, $fuel_liter, $fuel_amount, $date, $wages, $wages_amount, $other_expenses, $expenses_amount, $wages_total_amount, $rental_amount, $balance_amount1, $purchase_id);
        $updateQuery = mysqli_stmt_execute($stmt);

        mysqli_stmt_close($stmt);

        if ($updateQuery) {
            return ['message' => 'success'];
        } else {
            return ['message' => 'not success'];

        }
    }

    //update purchase payment make payment

    public function update_purchasepaymentDetails(
        $purchase_id,
        $paid_amount,
        $balance_amount
    ) {
        $update = "UPDATE purchase SET paid_amount=?,balance_amount=? WHERE purchase_id=?";

        $stmt = mysqli_prepare($this->conn, $update);

        if (!$stmt) {
            return mysqli_error($this->conn);
        }

        mysqli_stmt_bind_param($stmt, "iii", $paid_amount, $balance_amount ,$purchase_id);
        $updateQuery = mysqli_stmt_execute($stmt);

        mysqli_stmt_close($stmt);

        if ($updateQuery) {
            return ['message' => 'success'];
        } else {
            return ['message' => 'not success'];

        }
    }
    //module=sales
    //submodule=update sales details
    public function update_salesDetails(
        $sales_id,
        $mobile_no,
        $customer_name,
        $customer_type,
        $location,
        $site_name,
        $product_name,
        $product_quantity,
        $total_amount,
        $paid_amount,
        $balance_amount,
        $payment_method,
        $payment_type,
        $gst_no,
        $vehicle_no,
        $vehicle_type,
        $driver_name,
        $fuel_liter,
        $fuel_amount,
        $date,
        $wages,
        $wages_amount,
        $other_expenses,
        $expenses_amount,
        $wages_total_amount,
        $rental_amount,
        $balance_amount1
    ) {
        $update = "UPDATE sales SET mobile_no=?,customer_name=?,customer_type=?, location=?,
        site_name=?,product_name=?, product_quantity=?, total_amount=?, 
        paid_amount=?, balance_amount=?, payment_method=?,
         payment_type=?,gst_no=?,vehicle_no=?, vehicle_type=?, driver_name=?, fuel_liter=?, fuel_amount=?, date=?, wages=?, wages_amount=?, other_expenses=?, expenses_amount=?, wages_total_amount=?, rental_amount=?, balance_amount1=? WHERE sales_id=?";

        $stmt = mysqli_prepare($this->conn, $update);

        if (!$stmt) {
            return mysqli_error($this->conn);
        }

        mysqli_stmt_bind_param($stmt, "isssssiiiissssssiissisiiii", $mobile_no, $customer_name, $customer_type, $location, $site_name, $product_name, $product_quantity, $total_amount, $paid_amount, $balance_amount, $payment_method, $payment_type, $gst_no, $vehicle_no, $vehicle_type, $driver_name, $fuel_liter, $fuel_amount, $date, $wages, $wages_amount, $other_expenses, $expenses_amount, $wages_total_amount, $rental_amount, $balance_amount1, $sales_id);
        $updateQuery = mysqli_stmt_execute($stmt);

        mysqli_stmt_close($stmt);

        if ($updateQuery) {
            return ['message' => 'success'];
        } else {
            return ['message' => 'not success'];
        }
    }

    //module=vehicle
    //submodule=update vehicle details
    public function update_vehicleDetails(
        $vehicle_no,
        $chassis_no,
        $vehicle_model,
        $fc_amount,
        $fc_date,
        $tax,
        $insurance_date,
        $permit,
        $pollution,
        $fuel_type
    ) {
        $update = "UPDATE vehicle SET chassis_no=?, vehicle_model=?, fc_amount=?, fc_date=?, tax=?, insurance_date=?, permit=?, pollution=?, fuel_type=? WHERE vehicle_no=?";

        $stmt = mysqli_prepare($this->conn, $update);

        if (!$stmt) {
            return mysqli_error($this->conn);
        }

        mysqli_stmt_bind_param($stmt, "ssssisssss", $chassis_no, $vehicle_model, $fc_amount, $fc_date, $tax, $insurance_date, $permit, $pollution, $fuel_type, $vehicle_no);
        $updateQuery = mysqli_stmt_execute($stmt);

        mysqli_stmt_close($stmt);

        if ($updateQuery) {
            return ['message' => 'success'];
        } else {
            return ['message' => 'not success'];
        }
    }

    //module=salary
    //submodule=update salary details
    public function update_salaryDetails(
        $employee_id,
        $mobile_no,
        $employee_name,
        $wages_type,
        $salary_amount,
        $paid_amount,
        $payment_method
    ) {
        $update = "UPDATE salary SET mobile_no=?,employee_name=?, wages_type=?, salary_amount=?, paid_amount=?, payment_method=? WHERE employee_id=?";

        $stmt = mysqli_prepare($this->conn, $update);

        if (!$stmt) {
            return mysqli_error($this->conn);
        }

        mysqli_stmt_bind_param($stmt, "issiiss", $mobile_no, $employee_name, $wages_type, $salary_amount, $paid_amount, $payment_method, $employee_id);
        $updateQuery = mysqli_stmt_execute($stmt);

        mysqli_stmt_close($stmt);

        if ($updateQuery) {
            return ['message' => 'success'];
        } else {
            return ['message' => 'not success'];
        }
    }
    //module=rental
    //submodule=update rental details
    public function update_rentalDetails(
        $product_id,
        $product_quantity,
        $total_amount,
        $product_name,
        $product_quantity1,
        $days,
        $date,
        $total_amount1,
        $balance_amount,
        $payment_method
    ) {
        $update = "UPDATE rental SET product_quantity=?, total_amount=?, product_name=?, product_quantity1=?, days=?, date=?, total_amount1=?,balance_amount=?,payment_method=? WHERE product_id=?";

        $stmt = mysqli_prepare($this->conn, $update);

        if (!$stmt) {
            return mysqli_error($this->conn);
        }

        mysqli_stmt_bind_param($stmt, "issiisiisi", $product_quantity, $total_amount, $product_name, $product_quantity1, $days, $date, $total_amount1, $balance_amount, $payment_method, $product_id);
        $updateQuery = mysqli_stmt_execute($stmt);

        mysqli_stmt_close($stmt);

        if ($updateQuery) {
            return ['message' => 'success'];
        } else {
            return ['message' => 'not success'];
        }
    }

}

?>