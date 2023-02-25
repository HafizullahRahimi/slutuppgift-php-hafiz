<?php
require_once '../functions/helpers.php';
require_once 'Connection.php';


class Category extends Connection
{
    // Getter ---------------------------------------------
    public static  function getCategory()
    {
        // Create connection
        $conn = Connection::openConn();

        $sql = "SELECT * FROM categories";
        $result = $conn->query($sql);
        $categoryArr = array();

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                array_push($categoryArr,$row);
            }
        } else {
            $categoryArr = array();;
        }

        $conn->close();
        return $categoryArr;
    }
}



