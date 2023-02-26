<?php
require_once 'Connection.php';


class Product extends Connection
{
    public static  function insetProduct($image,$title,$categoryId, $body,$color,$price){
        // Create connection
        $conn = Connection::openConn();


        // prepare and bind
        $stmt = $conn->prepare("INSERT INTO `products` (`product_id`, `image`, `title`, `category_id`, `body`, `color`, `price`, `status`, `created_at`, `updated_at`) 
                                VALUES (NULL, ?, ?, ?, ?, ?, ?, '1', current_timestamp(), NULL);");
        //set parameters
        $stmt->bind_param("ssissi", $image,$title,$categoryId, $body,$color,$price);
        // execute
        $inserted = $stmt->execute();


        if ($inserted) $conn->close();
        
        return $inserted;

    }


    // Getter ---------------------------------------------
    public static  function getProduct()
    {
        // Create connection
        $conn = Connection::openConn();

        $sql = "SELECT * FROM products";
        $result = $conn->query($sql);
        $productArr = array();

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                array_push($productArr,$row);
            }
        } else {
            $productArr = array();;
        }

        $conn->close();
        return $productArr;
    }
}



