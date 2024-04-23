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

    //submodule=add sales payment details
    public function insert_salesPaymentDetails(
        $sales_id,
        $mobile_no,
        $customer_name,
        $make_payment,
        $date
    ) {
        // Database connection
        $conn = $this->conn;

        // Insert into purchase table
        $insertPurchase = "INSERT INTO sales_payment(sales_id, mobile_no, customer_name,date, make_payment ) VALUES (?, ?, ?, ?, ?)";
        $stmtInsertPurchase = mysqli_prepare($conn, $insertPurchase);

        if (!$stmtInsertPurchase) {
            http_response_code(500);
            return ["error" => "Failed to prepare purchase statement: " . mysqli_error($conn)];
        }

        mysqli_stmt_bind_param($stmtInsertPurchase, 'sissi', $sales_id, $mobile_no, $customer_name, $date, $make_payment);
        $insertQuery = mysqli_stmt_execute($stmtInsertPurchase);

        if (!$insertQuery) {
            http_response_code(500);
            return ["error" => "Failed to execute purchase query: " . mysqli_error($conn)];
        }

        // If everything succeeded, return success
        http_response_code(200);
        return ["message" => "success"];
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

    //module vehicle service details
    public function insert_serviceDetails($vehicle_no, $date, $descArray, $subtotal, $gstAmount, $total)
    {
        $descValuesArray = [];

        foreach ($descArray as $desc) {
            $descArray = (array) $desc;

            $descValuesArray[] = [
                'service_data' => $descArray['service_data'],
                'qty' => $descArray['qty'],
                'unit' => $descArray['unit'],
                'service' => $descArray['service'],
                'labor' => $descArray['labor'],
                'price' => $descArray['price']
            ];
        }
        // Call the insert_serviceDetails function passing the stored array of values
        $response = $this->insert_serviceData($vehicle_no, $date, $descValuesArray, $subtotal, $gstAmount, $total);

        // Output the response
        return $response;
    }

    public function insert_serviceData($vehicle_no, $date, $descArray, $subtotal, $gstAmount, $total)
    {
        // Prepare the INSERT statement
        $insertVehicle = "INSERT INTO service(vehicle_no, date, `desc`, labor, price, qty, service, subtotal, gstAmount, total) 
                          VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmtInsertVehicle = mysqli_prepare($this->conn, $insertVehicle);

        // Check if the statement is prepared successfully
        if ($stmtInsertVehicle) {
            // Iterate over each stdClass object in $descArray
            foreach ($descArray as $desc) {
                // Extract values from the array
                $descVal = $desc['service_data'];
                $labor = $desc['labor'];
                $price = $desc['price'];
                $qty = $desc['qty'];
                $service = $desc['service'];

                // Bind parameters
                mysqli_stmt_bind_param(
                    $stmtInsertVehicle,
                    'ssssssssss',
                    $vehicle_no,
                    $date,
                    $descVal,
                    $labor,
                    $price,
                    $qty,
                    $service,
                    $subtotal,
                    $gstAmount,
                    $total
                );
                // Execute the statement
                $insertQuery = mysqli_stmt_execute($stmtInsertVehicle);

                // Check if the insertion was successful
                if (!$insertQuery) {
                    http_response_code(400);
                    return ["error" => "Error in Purchase: " . mysqli_error($this->conn)];
                }
            }
            http_response_code(200);
            return ["message" => "success"];
        } else {

            http_response_code(400);
            return ["error" => "Failed to prepare statement: " . mysqli_error($this->conn)];
        }
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
    public function insert_rentalDetails($site_name, $date1, $descArray, $subtotal, $gstAmount, $total, $paid, $balance)
    {
        $descValuesArray = [];
        foreach ($descArray as $desc) {
            $descArray = (array) $desc;

            $descValuesArray[] = [
                'rent_data' => $descArray['rent_data'],
                'qty' => $descArray['qty'],
                'unit' => $descArray['unit'],
                'service' => $descArray['service'],
                'labor' => $descArray['labor'],
                'price' => $descArray['price'],
                'date' => $descArray['date'],
                'todate' => $descArray['todate']
            ];
        }
        // Call the insert_serviceDetails function passing the stored array of values
        $response = $this->insert_rentalData($site_name, $date1, $descValuesArray, $subtotal, $gstAmount, $total, $paid, $balance);

        // Output the response
        return $response;
    }

    public function insert_rentalData($site_name, $date1, $descArray, $subtotal, $gstAmount, $total, $paid, $balance)
    {
        // Prepare the INSERT statement
        $insertVehicle = "INSERT INTO rental(site_name, date1, `desc`, labor, price, qty, service,date,todate,subtotal, gstAmount, total,paid,balance) 
                          VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?,?,?,?)";
        $stmtInsertVehicle = mysqli_prepare($this->conn, $insertVehicle);

        // Check if the statement is prepared successfully
        if ($stmtInsertVehicle) {
            // Iterate over each stdClass object in $descArray
            foreach ($descArray as $desc) {
                // Extract values from the array
                $descVal = $desc['rent_data'];
                $labor = $desc['labor'];
                $price = $desc['price'];
                $qty = $desc['qty'];
                $service = $desc['service'];
                $date = $desc['date'];
                $todate = $desc['todate'];


                // Bind parameters
                mysqli_stmt_bind_param(
                    $stmtInsertVehicle,
                    'ssssssssssssss',
                    $site_name,
                    $date1,
                    $descVal,
                    $labor,
                    $price,
                    $qty,
                    $service,
                    $date,
                    $todate,
                    $subtotal,
                    $gstAmount,
                    $total,
                    $paid,
                    $balance
                );
                // Execute the statement
                $insertQuery = mysqli_stmt_execute($stmtInsertVehicle);

                // Check if the insertion was successful
                if (!$insertQuery) {
                    http_response_code(400);
                    return ["error" => "Error in Purchase: " . mysqli_error($this->conn)];
                }
            }
            http_response_code(200);
            return ["message" => "success"];
        } else {

            http_response_code(400);
            return ["error" => "Failed to prepare statement: " . mysqli_error($this->conn)];
        }
    }

    //insert rental demo

    // public function insert_rentalDetails1(
    //     $id,
    //     $site_name,
    //     $date,
    //     $total,
    //     $paid,
    //     $balance
    // ) {

    //     $insertSalary = "INSERT INTO rental_meta(id,site_name, date, total, paid, balance
    //         ) 
    //         values(?,?,?,?,?,?)";
    //     $stmtInsertSalary = mysqli_prepare($this->conn, $insertSalary);

    //     if ($stmtInsertSalary) {
    //         mysqli_stmt_bind_param(
    //             $stmtInsertSalary,
    //             'ssssss',
    //             $id,
    //             $site_name,
    //             $date,
    //             $total,
    //             $paid,
    //             $balance
    //         );
    //         $insertQuery = mysqli_stmt_execute($stmtInsertSalary);
    //         if (!$insertQuery) {
    //             http_response_code(400);
    //             return ["error" => "Error  Purchase: " . mysqli_error($this->conn)];
    //         }

    //         http_response_code(200);
    //         $this->response = ["message" => "success"];

    //     } else {
    //         $this->response = ["message" => "not success"];
    //     }

    //     // echo $purchase_id;
    //     // $this->response = 'this function is worked';
    //     // echo "Data Insert Successfully";
    //     return $this->response;
    // }

    //submodule=add rental payment details
    public function insert_rentalPaymentDetails(
        $site_name,
        $date,
        $make_payment,
        $payment_method
    ) {
        // Database connection
        $conn = $this->conn;

        // Insert into purchase table
        $insertPurchase = "INSERT INTO rental_payment(site_name,make_payment,date,payment_method ) VALUES (?, ?, ?, ?)";
        $stmtInsertPurchase = mysqli_prepare($conn, $insertPurchase);

        if (!$stmtInsertPurchase) {
            http_response_code(500);
            return ["error" => "Failed to prepare purchase statement: " . mysqli_error($conn)];
        }

        mysqli_stmt_bind_param($stmtInsertPurchase, 'ssss', $site_name, $make_payment, $date, $payment_method);
        $insertQuery = mysqli_stmt_execute($stmtInsertPurchase);

        if (!$insertQuery) {
            http_response_code(500);
            return ["error" => "Failed to execute purchase query: " . mysqli_error($conn)];
        }

        // If everything succeeded, return success
        http_response_code(200);
        return ["message" => "success"];
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