<?php

namespace App\Database\Config\Database;

use mysqli;

class database
{
    private $hostname = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'raitotechSales';
    private $conn;

    function __construct()
    {
        // connection
        $this->conn = new mysqli($this->hostname, $this->username, $this->password, $this->database);
        if ($this->conn->connect_errno) {
            die('connection failed: ' . $this->conn->connect_errno);
        } else {
            echo 'ok';
        }
    }
    // insert - update - delete
    public function runDML($query)
    {
        $result = $this->conn->query($query);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    // select
    public function runDQL($query)
    {
        $result = $this->conn->query($query);
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return [];
        }
    }
}
