<?php
include_once '../../../config/database.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

class Get
{
    public $conn;
    public $response;

    function __construct()
    {
        $db = new Database();
        $this->conn = $db->connect();
    }

    // module:purchase
    public function view_PurchaseDetails()
    {
        // $query = "SELECT * FROM purchase LEFT JOIN purchase_meta ON purchase.purchase_id = purchase_meta.purchase_id";
        $query = "SELECT * FROM purchase";
        $stmt = mysqli_prepare($this->conn, $query);
        // mysqli_stmt_bind_param($stmt, "ss", $topic,$bookmark);   
        mysqli_stmt_execute($stmt);

        if (mysqli_stmt_errno($stmt)) {
            return [];
        }

        $result = mysqli_stmt_get_result($stmt);

        if ($result === false) {
            return [];
        }
        $purchaseDetails = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
        mysqli_stmt_close($stmt);
        return $purchaseDetails;
    }

    // module:purchase payment details
    public function view_PurchasePaymentDetails()
    {
        // $query = "SELECT * FROM purchase LEFT JOIN purchase_meta ON purchase.purchase_id = purchase_meta.purchase_id";
        $query = "SELECT * FROM purchase_payment";
        $stmt = mysqli_prepare($this->conn, $query);
        // mysqli_stmt_bind_param($stmt, "ss", $topic,$bookmark);   
        mysqli_stmt_execute($stmt);

        if (mysqli_stmt_errno($stmt)) {
            return [];
        }

        $result = mysqli_stmt_get_result($stmt);

        if ($result === false) {
            return [];
        }
        $purchaseDetails = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
        mysqli_stmt_close($stmt);
        return $purchaseDetails;
    }
    // module:sales
    public function view_SalesDetails()
    {
        $query = "SELECT * FROM sales";

        $stmt = mysqli_prepare($this->conn, $query);
        // mysqli_stmt_bind_param($stmt, "ss", $topic,$bookmark);    
        mysqli_stmt_execute($stmt);

        if (mysqli_stmt_errno($stmt)) {
            return [];
        }

        $result = mysqli_stmt_get_result($stmt);

        if ($result === false) {
            return [];
        }
        $salesDetails = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
        mysqli_stmt_close($stmt);
        return $salesDetails;
    }
    // module:purchase payment details
    public function view_SalesPaymentDetails()
    {
        // $query = "SELECT * FROM purchase LEFT JOIN purchase_meta ON purchase.purchase_id = purchase_meta.purchase_id";
        $query = "SELECT * FROM sales_payment";
        $stmt = mysqli_prepare($this->conn, $query);
        // mysqli_stmt_bind_param($stmt, "ss", $topic,$bookmark);   
        mysqli_stmt_execute($stmt);

        if (mysqli_stmt_errno($stmt)) {
            return [];
        }

        $result = mysqli_stmt_get_result($stmt);

        if ($result === false) {
            return [];
        }
        $purchaseDetails = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
        mysqli_stmt_close($stmt);
        return $purchaseDetails;
    }

    // module:vehicle
    public function view_VehicleDetails()
    {
        $query = "SELECT * FROM vehicle";

        $stmt = mysqli_prepare($this->conn, $query);
        // mysqli_stmt_bind_param($stmt, "ss", $topic,$bookmark);    
        mysqli_stmt_execute($stmt);

        if (mysqli_stmt_errno($stmt)) {
            return [];
        }

        $result = mysqli_stmt_get_result($stmt);

        if ($result === false) {
            return [];
        }
        $vehicleDetails = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
        mysqli_stmt_close($stmt);
        return $vehicleDetails;
    }

    //view service
    public function view_ServiceDetails()
    {
        $query = "SELECT * FROM service";

        $stmt = mysqli_prepare($this->conn, $query);
        // mysqli_stmt_bind_param($stmt, "ss", $topic,$bookmark);    
        mysqli_stmt_execute($stmt);

        if (mysqli_stmt_errno($stmt)) {
            return [];
        }

        $result = mysqli_stmt_get_result($stmt);

        if ($result === false) {
            return [];
        }
        $vehicleDetails = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
        mysqli_stmt_close($stmt);
        return $vehicleDetails;
    }

    // module:salary
    public function view_SalaryDetails()
    {
        $query = "SELECT * FROM salary";

        $stmt = mysqli_prepare($this->conn, $query);
        // mysqli_stmt_bind_param($stmt, "ss", $topic,$bookmark);    
        mysqli_stmt_execute($stmt);

        if (mysqli_stmt_errno($stmt)) {
            return [];
        }

        $result = mysqli_stmt_get_result($stmt);

        if ($result === false) {
            return [];
        }
        $salaryDetails = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
        mysqli_stmt_close($stmt);
        return $salaryDetails;
    }
    // module:rental
    public function view_RentalDetails()
    {
        $query = "SELECT * FROM rental";

        $stmt = mysqli_prepare($this->conn, $query);
        // mysqli_stmt_bind_param($stmt, "ss", $topic,$bookmark);    
        mysqli_stmt_execute($stmt);

        if (mysqli_stmt_errno($stmt)) {
            return [];
        }

        $result = mysqli_stmt_get_result($stmt);

        if ($result === false) {
            return [];
        }
        $rentalDetails = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
        mysqli_stmt_close($stmt);
        return $rentalDetails;
    }

    // module:construction
    public function view_ConstructionDetails()
    {
        $query = "SELECT * FROM construction";

        $stmt = mysqli_prepare($this->conn, $query);
        // mysqli_stmt_bind_param($stmt, "ss", $topic,$bookmark);    
        mysqli_stmt_execute($stmt);

        if (mysqli_stmt_errno($stmt)) {
            return [];
        }

        $result = mysqli_stmt_get_result($stmt);

        if ($result === false) {
            return [];
        }
        $constructionDetails = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
        mysqli_stmt_close($stmt);
        return $constructionDetails;
    }

    // module:user
    public function view_UserDetails()
    {
        $query = "SELECT * FROM adduser";

        $stmt = mysqli_prepare($this->conn, $query);
        // mysqli_stmt_bind_param($stmt, "ss", $topic,$bookmark);    
        mysqli_stmt_execute($stmt);

        if (mysqli_stmt_errno($stmt)) {
            return [];
        }

        $result = mysqli_stmt_get_result($stmt);

        if ($result === false) {
            return [];
        }
        $userDetails = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
        mysqli_stmt_close($stmt);
        return $userDetails;
    }
    // module:fetch purchase
    public function fetch_purchaseDetails($purchaseId)
    {
        $query = "SELECT * FROM purchase WHERE  purchase_id=?";
        $stmt = mysqli_prepare($this->conn, $query);
        mysqli_stmt_bind_param($stmt, "s", $purchaseId);
        mysqli_stmt_execute($stmt);

        if (mysqli_stmt_errno($stmt)) {
            return [];
        }

        $result = mysqli_stmt_get_result($stmt);

        if ($result === false) {
            return [];
        }
        $purchaseDetails = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
        mysqli_stmt_close($stmt);
        return $purchaseDetails;
    }

    //purchase fliter
    public function fetch_purchasefliterDetails($start_date, $end_date)
    {
        // Prepare the SQL query with placeholders for parameters
        $query = "SELECT * FROM purchase WHERE date BETWEEN ? AND ?";
        $stmt = mysqli_prepare($this->conn, $query);

        if ($stmt) {
            // Bind parameters to the placeholders
            $stmt->bind_param("ss", $start_date, $end_date);

            // Execute the statement
            $stmt->execute();

            // Get the result set
            $result = $stmt->get_result();

            // Initialize an array to store fetched data
            $data = [];

            // Fetch data from the result set
            while ($row = $result->fetch_assoc()) {
                // Push each row to the data array
                $data[] = $row;
            }

            // Free the result set
            $result->free();

            // Close the statement
            $stmt->close();

            // Return the fetched data
            return $data;
        } else {
            // Handle query preparation error
            echo "Query preparation error: " . mysqli_stmt_close($stmt);
            return []; // Return an empty array if there's an error
        }
    }
    //purchase payment fliter

    public function fetch_purchasepaymentfliterDetails($start_date, $end_date)
    {
        // Prepare the SQL query with placeholders for parameters
        $query = "SELECT * FROM purchase_payment WHERE date BETWEEN ? AND ?";
        $stmt = mysqli_prepare($this->conn, $query);

        if ($stmt) {
            // Bind parameters to the placeholders
            $stmt->bind_param("ss", $start_date, $end_date);

            // Execute the statement
            $stmt->execute();

            // Get the result set
            $result = $stmt->get_result();

            // Initialize an array to store fetched data
            $data = [];

            // Fetch data from the result set
            while ($row = $result->fetch_assoc()) {
                // Push each row to the data array
                $data[] = $row;
            }

            // Free the result set
            $result->free();

            // Close the statement
            $stmt->close();

            // Return the fetched data
            return $data;
        } else {
            // Handle query preparation error
            echo "Query preparation error: " . mysqli_stmt_close($stmt);
            return []; // Return an empty array if there's an error
        }
    }

    // module:fetch sales
    public function fetch_salesDetails($salesId)
    {
        $query = "SELECT * FROM sales WHERE  sales_id=?";
        $stmt = mysqli_prepare($this->conn, $query);
        mysqli_stmt_bind_param($stmt, "s", $salesId);
        mysqli_stmt_execute($stmt);

        if (mysqli_stmt_errno($stmt)) {
            return [];
        }

        $result = mysqli_stmt_get_result($stmt);

        if ($result === false) {
            return [];
        }
        $salesDetails = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
        mysqli_stmt_close($stmt);
        return $salesDetails;
    }

    //sales fliter
    public function fetch_salesfliterDetails($start_date, $end_date)
    {
        // Prepare the SQL query with placeholders for parameters
        $query = "SELECT * FROM sales WHERE date BETWEEN ? AND ?";
        $stmt = mysqli_prepare($this->conn, $query);

        if ($stmt) {
            // Bind parameters to the placeholders
            $stmt->bind_param("ss", $start_date, $end_date);

            // Execute the statement
            $stmt->execute();

            // Get the result set
            $result = $stmt->get_result();

            // Initialize an array to store fetched data
            $data = [];

            // Fetch data from the result set
            while ($row = $result->fetch_assoc()) {
                // Push each row to the data array
                $data[] = $row;
            }

            // Free the result set
            $result->free();

            // Close the statement
            $stmt->close();

            // Return the fetched data
            return $data;
        } else {
            // Handle query preparation error
            echo "Query preparation error: " . mysqli_stmt_close($stmt);
            return []; // Return an empty array if there's an error
        }
    }

    // module:fetch vehicle
    public function fetch_vehicleDetails($vehicleNo)
    {
        $query = "SELECT * FROM vehicle WHERE  vehicle_no=?";
        $stmt = mysqli_prepare($this->conn, $query);
        mysqli_stmt_bind_param($stmt, "s", $vehicleNo);
        mysqli_stmt_execute($stmt);

        if (mysqli_stmt_errno($stmt)) {
            return [];
        }

        $result = mysqli_stmt_get_result($stmt);

        if ($result === false) {
            return [];
        }
        $vehicleDetails = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
        mysqli_stmt_close($stmt);
        return $vehicleDetails;
    }
    //vehicle fliter
    public function fetch_vehiclefliterDetails($start_date, $end_date)
    {
        // Prepare the SQL query with placeholders for parameters
        $query = "SELECT * FROM vehicle WHERE fc_date BETWEEN ? AND ?";
        $stmt = mysqli_prepare($this->conn, $query);

        if ($stmt) {
            // Bind parameters to the placeholders
            $stmt->bind_param("ss", $start_date, $end_date);

            // Execute the statement
            $stmt->execute();

            // Get the result set
            $result = $stmt->get_result();

            // Initialize an array to store fetched data
            $data = [];

            // Fetch data from the result set
            while ($row = $result->fetch_assoc()) {
                // Push each row to the data array
                $data[] = $row;
            }

            // Free the result set
            $result->free();

            // Close the statement
            $stmt->close();

            // Return the fetched data
            return $data;
        } else {
            // Handle query preparation error
            echo "Query preparation error: " . mysqli_stmt_close($stmt);
            return []; // Return an empty array if there's an error
        }
    }
    // module:fetch salary
    public function fetch_salaryDetails($employeeId)
    {
        $query = "SELECT * FROM salary WHERE  employee_id=?";
        $stmt = mysqli_prepare($this->conn, $query);
        mysqli_stmt_bind_param($stmt, "s", $employeeId);
        mysqli_stmt_execute($stmt);

        if (mysqli_stmt_errno($stmt)) {
            return [];
        }

        $result = mysqli_stmt_get_result($stmt);

        if ($result === false) {
            return [];
        }
        $salaryDetails = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
        mysqli_stmt_close($stmt);
        return $salaryDetails;
    }
    // module:fetch rental
    public function fetch_rentalDetails($productId)
    {
        $query = "SELECT * FROM rental WHERE  product_id=?";
        $stmt = mysqli_prepare($this->conn, $query);
        mysqli_stmt_bind_param($stmt, "s", $productId);
        mysqli_stmt_execute($stmt);

        if (mysqli_stmt_errno($stmt)) {
            return [];
        }

        $result = mysqli_stmt_get_result($stmt);

        if ($result === false) {
            return [];
        }
        $rentalDetails = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
        mysqli_stmt_close($stmt);
        return $rentalDetails;
    }


    // Module:user
    // submodule:login user
    public function LoginDetails($gmail)
    {
        $select = "SELECT account_type FROM adduser WHERE email='$gmail'";
        $selectQuery = mysqli_query($this->conn, $select);

        if (!$selectQuery) {
            // Query execution failed
            $error = mysqli_error($this->conn);
            error_log("MySQL Error: $error"); // Log the error for debugging
            http_response_code(500); // Internal Server Error
            return 'error'; // Return an error message
        }

        if (mysqli_num_rows($selectQuery) > 0) {
            while ($row = mysqli_fetch_assoc($selectQuery)) {
                $account_type = $row['account_type'];
            }
            if ($account_type == 'user') {
                $message = ['message' => 'success'];
            } else {
                $message = ['message' => 'not success'];
            }
        } else {
            http_response_code(400);
            $message = ['message' => 'not success'];
        }

        return $message;
    }
}
?>