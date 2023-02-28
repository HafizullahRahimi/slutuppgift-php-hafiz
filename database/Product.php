<?php
require_once 'Connection.php';


class Product extends Connection
{
    // Methods ---------------------------------------------
    // insert Product
    public static  function insetProduct($image, $title, $categoryId, $body, $color, $price)
    {
        // Create connection
        $conn = Connection::openConn();

        // prepare and bind
        $stmt = $conn->prepare("INSERT INTO `products` (`product_id`, `image`, `title`, `category_id`, `body`, `color`, `price`, `status`, `created_at`, `updated_at`) 
                                VALUES (NULL, ?, ?, ?, ?, ?, ?, '1', current_timestamp(), NULL);");
        //set parameters
        $stmt->bind_param("ssissi", $image, $title, $categoryId, $body, $color, $price);
        // execute
        $inserted = $stmt->execute();
        if ($inserted) $conn->close();

        return $inserted;
    }
    // update Product
    public static  function updateProduct($image, $title, $categoryId, $body, $color, $price, $id)
    {
        // Create connection
        $conn = Connection::openConn();

        // prepare and bind
        $stmt = $conn->prepare("UPDATE `products` SET `image`= ?, `title` = ?, `category_id`= ?, `body`=?, `color`=?, `price`=? , `updated_at` = current_timestamp() 
                                WHERE `products`.`product_id` = ?");
        //set parameters
        $stmt->bind_param("ssissii", $image, $title, $categoryId, $body, $color, $price, $id);
        // execute
        $update = $stmt->execute();
        if ($update) $conn->close();

        return $update;
    }

    // change status
    public static  function changeStatus($id, $status)
    {
        // Create connection
        $conn = Connection::openConn();
        // prepare and bind
        $stmt = $conn->prepare("UPDATE `products` SET `status` = ? WHERE `products`.`product_id` = ?;");
        //set parameters
        $stmt->bind_param("ii", $status, $id);
        // execute
        $changed = $stmt->execute();
        if ($changed) $conn->close();

        return $changed;
    }


    // Getter ---------------------------------------------
    // Get All Products
    public static  function getAllProducts()
    {
        // Create connection
        $conn = Connection::openConn();

        $sql = "SELECT * FROM products ORDER BY created_at DESC;";
        $result = $conn->query($sql);
        $productArr = array();

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                array_push($productArr, $row);
            }
        } else {
            $productArr = array();;
        }

        $conn->close();
        return $productArr;
    }
    // Get All Products
    public static  function getAllActiveProducts()
    {
        // Create connection
        $conn = Connection::openConn();

        $sql = "SELECT * FROM products WHERE `status` = 1  ORDER BY created_at DESC;";
        $result = $conn->query($sql);
        $productArr = array();

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                array_push($productArr, $row);
            }
        } else {
            $productArr = array();;
        }

        $conn->close();
        return $productArr;
    }

    // Get Product by ID
    public static  function getProduct($id)
    {
        // Create connection
        $conn = Connection::openConn();

        // prepare and bind
        $stmt = $conn->prepare("SELECT * FROM `products` WHERE `product_id` = ?;");
        //set parameters
        $stmt->bind_param("i", $id);
        // execute
        $stmt->execute();
        $result = $stmt->get_result();

        $product = array();

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $product =  $row;
                // dd($row);
            }
        }

        $conn->close();
        return $product;
    }
    // Get Products By Category ID
    public static  function getProducts($categoryId)
    {
        // Create connection
        $conn = Connection::openConn();

        // prepare and bind
        $stmt = $conn->prepare("SELECT * FROM `products` WHERE `status` = 1 && `category_id` = ?;");
        //set parameters
        $stmt->bind_param("i", $categoryId);
        // execute
        $stmt->execute();
        $result = $stmt->get_result();

        $productArr = array();

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                array_push($productArr, $row);
            }
        } else {
            $productArr = array();;
        }

        $conn->close();
        return $productArr;
    }
}
