<?php
class Database
{

    //LOCAL CONFIG
    // private $servername = "193.203.184.1";
    // private $username = "u651328475_gvmcons";
    // private $password = "Gvmcons@1";
    // private $dbname = "u651328475_gvmcons";
    // private $conn;
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "u651328475_gvmcons";
    private $conn;

    public function connect()
    {
        $this->conn = null;
        // Create connection
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        // Check connection
        if ($conn->connect_error) {

            die("Connection failed: " . $conn->connect_error);

        } else {
            return $conn;
        
        }

    }
    public function getDbName()
    {
        return $this->dbname;
    }

}



?>