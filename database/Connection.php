<?php
require_once 'config.php';

class Connection
{
    // Create a now connection
    protected static function openConn()
    {
        // Create connection
        // $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        $conn = new mysqli(SERVERNAME, USERNAME, PASSWORD, DBNAME);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        return $conn;
    }
}
