<?php
include_once '../../../config/database.php';
class Post
{
    public $conn;
    public $response;
    public function __construct()
    {
        $db = new Database();
        $this->conn = $db->connect();
    }
    //module=purchase
    //submodule=add purchase details
    public function insert_purchaseDetails(
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
        $balance_amount1,
        $user_type
    ) {
        // Database connection
        $conn = $this->conn;

        // Insert into purchase_meta table
        $insertPurchaseMeta = "INSERT INTO purchase_meta(purchase_id, user_type) VALUES (?, ?)";
        $stmtInsertPurchaseMeta = mysqli_prepare($conn, $insertPurchaseMeta);

        if (!$stmtInsertPurchaseMeta) {
            http_response_code(500);
            return ["error" => "Failed to prepare purchase_meta statement: " . mysqli_error($conn)];
        }

        mysqli_stmt_bind_param($stmtInsertPurchaseMeta, 'ss', $purchase_id, $user_type);
        $insertMetaQuery = mysqli_stmt_execute($stmtInsertPurchaseMeta);

        if (!$insertMetaQuery) {
            http_response_code(500);
            return ["error" => "Failed to execute purchase_meta query: " . mysqli_error($conn)];
        }

        // Insert into purchase table
        $insertPurchase = "INSERT INTO purchase(purchase_id, mobile_no, vendor_name, vendor_type, product_name, product_quantity, total_amount, paid_amount, balance_amount, payment_method, payment_type, gst_no, vehicle_no, vehicle_type, driver_name, fuel_liter, fuel_amount, date, wages, wages_amount, other_expenses, expenses_amount, wages_total_amount, rental_amount, balance_amount1) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmtInsertPurchase = mysqli_prepare($conn, $insertPurchase);

        if (!$stmtInsertPurchase) {
            http_response_code(500);
            return ["error" => "Failed to prepare purchase statement: " . mysqli_error($conn)];
        }

        mysqli_stmt_bind_param($stmtInsertPurchase, 'sisssiiiissssssiissisiiii', $purchase_id, $mobile_no, $vendor_name, $vendor_type, $product_name, $product_quantity, $total_amount, $paid_amount, $balance_amount, $payment_method, $payment_type, $gst_no, $vehicle_no, $vehicle_type, $driver_name, $fuel_liter, $fuel_amount, $date, $wages, $wages_amount, $other_expenses, $expenses_amount, $wages_total_amount, $rental_amount, $balance_amount1);
        $insertQuery = mysqli_stmt_execute($stmtInsertPurchase);

        if (!$insertQuery) {
            http_response_code(500);
            return ["error" => "Failed to execute purchase query: " . mysqli_error($conn)];
        }

        // If everything succeeded, return success
        http_response_code(200);
        return ["message" => "success"];
    }

    //submodule=add purchase payment details
    public function insert_purchasePaymentDetails(
        $purchase_id,
        $mobile_no,
        $vendor_name,
        $make_payment,
        $date
    ) {
        // Database connection
        $conn = $this->conn;

        // Insert into purchase table
        $insertPurchase = "INSERT INTO purchase_payment(purchase_id, mobile_no, vendor_name,date, make_payment ) VALUES (?, ?, ?, ?, ?)";
        $stmtInsertPurchase = mysqli_prepare($conn, $insertPurchase);

        if (!$stmtInsertPurchase) {
            http_response_code(500);
            return ["error" => "Failed to prepare purchase statement: " . mysqli_error($conn)];
        }

        mysqli_stmt_bind_param($stmtInsertPurchase, 'sissi', $purchase_id, $mobile_no, $vendor_name, $date, $make_payment);
        $insertQuery = mysqli_stmt_execute($stmtInsertPurchase);

        if (!$insertQuery) {
            http_response_code(500);
            return ["error" => "Failed to execute purchase query: " . mysqli_error($conn)];
        }

        // If everything succeeded, return success
        http_response_code(200);
        return ["message" => "success"];
    }

    //module sales details
    public function insert_salesDetails(
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

        $insertSales = "INSERT INTO sales(sales_id,mobile_no,customer_name,customer_type,location,site_name,product_name,product_quantity,total_amount,paid_amount,balance_amount,payment_method,payment_type,gst_no,vehicle_no,vehicle_type,driver_name,fuel_liter,fuel_amount,date,wages,wages_amount,other_expenses,expenses_amount,wages_total_amount,rental_amount,balance_amount1) 
        values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $stmtInsertSales = mysqli_prepare($this->conn, $insertSales);

        if ($stmtInsertSales) {
            mysqli_stmt_bind_param(
                $stmtInsertSales,
                'sisssssiiiissssssiissisiiii',
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
            );
            $insertQuery = mysqli_stmt_execute($stmtInsertSales);
            if (!$insertQuery) {
                http_response_code(400);
                return ["error" => "Error  Purchase: " . mysqli_error($this->conn)];
            }

            http_response_code(200);
            $this->response = ["message" => "success"];

        } else {
            $this->response = ["message" => "not success"];
        }

        // echo $purchase_id;
        // $this->response = 'this function is worked';
        // echo "Data Insert Successfully";
        return $this->response;
    }

    //module vehicle details
    public function insert_vehicleDetails(
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

        $insertVehicle = "INSERT INTO vehicle(vehicle_no, chassis_no, vehicle_model, fc_amount, fc_date, tax, insurance_date, permit, pollution,fuel_type
            ) 
            values(?,?,?,?,?,?,?,?,?,?)";
        $stmtInsertVehicle = mysqli_prepare($this->conn, $insertVehicle);

        if ($stmtInsertVehicle) {
            mysqli_stmt_bind_param(
                $stmtInsertVehicle,
                'ssssssssss',
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
            );
            $insertQuery = mysqli_stmt_execute($stmtInsertVehicle);
            if (!$insertQuery) {
                http_response_code(400);
                return ["error" => "Error  Purchase: " . mysqli_error($this->conn)];
            }

            http_response_code(200);
            $this->response = ["message" => "success"];

        } else {
            $this->response = ["message" => "not success"];
        }

        // echo $purchase_id;
        // $this->response = 'this function is worked';
        // echo "Data Insert Successfully";
        return $this->response;
    }

    //module salary details
    public function insert_salaryDetails(
        $employee_id,
        $mobile_no,
        $employee_name,
        $wages_type,
        $salary_amount,
        $paid_amount,
        $payment_method
    ) {

        $insertSalary = "INSERT INTO salary(employee_id,mobile_no, employee_name, wages_type, salary_amount, paid_amount, payment_method
            ) 
            values(?,?,?,?,?,?,?)";
        $stmtInsertSalary = mysqli_prepare($this->conn, $insertSalary);

        if ($stmtInsertSalary) {
            mysqli_stmt_bind_param(
                $stmtInsertSalary,
                'sissiis',
                $employee_id,
                $mobile_no,
                $employee_name,
                $wages_type,
                $salary_amount,
                $paid_amount,
                $payment_method
            );
            $insertQuery = mysqli_stmt_execute($stmtInsertSalary);
            if (!$insertQuery) {
                http_response_code(400);
                return ["error" => "Error  Purchase: " . mysqli_error($this->conn)];
            }

            http_response_code(200);
            $this->response = ["message" => "success"];

        } else {
            $this->response = ["message" => "not success"];
        }

        // echo $purchase_id;
        // $this->response = 'this function is worked';
        // echo "Data Insert Successfully";
        return $this->response;
    }
    //module rental product details
    public function insert_rentalDetails(
        $product_quantity,
        $total_amount,
        $product_id,
        $product_name,
        $product_quantity1,
        $days,
        $date,
        $total_amount1,
        $balance_amount,
        $payment_method
    ) {

        $insertRental = "INSERT INTO rental(product_quantity, total_amount, product_id, product_name, product_quantity1, days, date, total_amount1, balance_amount, payment_method
            ) 
            values(?,?,?,?,?,?,?,?,?,?)";
        $stmtInsertRental = mysqli_prepare($this->conn, $insertRental);

        if ($stmtInsertRental) {
            mysqli_stmt_bind_param(
                $stmtInsertRental,
                'iissiisiis',
                $product_quantity,
                $total_amount,
                $product_id,
                $product_name,
                $product_quantity1,
                $days,
                $date,
                $total_amount1,
                $balance_amount,
                $payment_method
            );
            $insertQuery = mysqli_stmt_execute($stmtInsertRental);
            if (!$insertQuery) {
                http_response_code(400);
                return ["error" => "Error  Purchase: " . mysqli_error($this->conn)];
            }

            http_response_code(200);
            $this->response = ["message" => "success"];

        } else {
            $this->response = ["message" => "not success"];
        }

        // echo $purchase_id;
        // $this->response = 'this function is worked';
        // echo "Data Insert Successfully";
        return $this->response;
    }

    //module consturction details
    public function insert_constructionDetails(
        $building_name,
        $manager_name,
        $total_workers,
        $total_amount,
        $location,
        $category,
        $type,
        $salary_amount,
        $payment_method
    ) {

        $insertConstruction = "INSERT INTO construction(building_name,
            manager_name,
            total_workers,
            total_amount,
            location,
            category,
            type,
            salary_amount,
            payment_method
            ) 
            values(?,?,?,?,?,?,?,?,?)";
        $stmtInsertConstruction = mysqli_prepare($this->conn, $insertConstruction);

        if ($stmtInsertConstruction) {
            mysqli_stmt_bind_param(
                $stmtInsertConstruction,
                'ssiisssis',
                $building_name,
                $manager_name,
                $total_workers,
                $total_amount,
                $location,
                $category,
                $type,
                $salary_amount,
                $payment_method
            );
            $insertQuery = mysqli_stmt_execute($stmtInsertConstruction);
            if (!$insertQuery) {
                http_response_code(400);
                return ["error" => "Error  Purchase: " . mysqli_error($this->conn)];
            }

            http_response_code(200);
            $this->response = ["message" => "success"];

        } else {
            $this->response = ["message" => "not success"];
        }

        // echo $purchase_id;
        // $this->response = 'this function is worked';
        // echo "Data Insert Successfully";
        return $this->response;
    }

    //module consturction details
    public function insert_userDetails($email)
    {
        $account_type = "user";
        $insertUser = "INSERT INTO adduser(email,account_type) values(?,?)";
        $stmtInsertConstruction = mysqli_prepare($this->conn, $insertUser);

        if ($stmtInsertConstruction) {
            mysqli_stmt_bind_param(
                $stmtInsertConstruction,
                'ss',
                $email,
                $account_type
            );
            $insertQuery = mysqli_stmt_execute($stmtInsertConstruction);
            if (!$insertQuery) {
                http_response_code(400);
                return ["error" => "Error  Purchase: " . mysqli_error($this->conn)];
            }

            http_response_code(200);
            $this->response = ["message" => "success"];

        } else {
            $this->response = ["message" => "not success"];
        }

        // echo $purchase_id;
        // $this->response = 'this function is worked';
        // echo "Data Insert Successfully";
        return $this->response;
    }
}