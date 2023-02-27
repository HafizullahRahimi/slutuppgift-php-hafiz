<?php
require_once 'Connection.php';


class Category extends Connection
{
    // Getter ---------------------------------------------
    // Get all Category in a Array
    public static  function getAllCategory()
    {
        // Create connection
        $conn = Connection::openConn();

        $sql = "SELECT * FROM categories";
        $result = $conn->query($sql);
        $categoryArr = array();

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                array_push($categoryArr, $row);
            }
        } else {
            $categoryArr = array();;
        }

        $conn->close();
        return $categoryArr;
    }
    // Get a Category by id
    public static  function getCategory($id)
    {
        // Create connection
        $conn = Connection::openConn();

        // prepare and bind
        $stmt = $conn->prepare("SELECT name FROM `categories` WHERE `categorie_id`= ?;");
        //set parameters
        $stmt->bind_param("i", $id);
        // execute
        $stmt->execute();
        $result = $stmt->get_result();

        $nameCategory= '';

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $nameCategory=  $row["name"] ;
            }
        } 

        $conn->close();
        return $nameCategory;
    }
}
