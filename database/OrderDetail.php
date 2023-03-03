<?php
require_once 'Connection.php';
$t = 'order_detail_id	order_id	product_id	quantity';


class OrderDetail extends Connection
{
    // Setter ---------------------------------------------
    // Getter ---------------------------------------------
    // Get OrderDetail info by orderID
    public static  function getOrderInfo($orderId)
    {
        // Create connection
        $conn = Connection::openConn();

        // prepare and bind
        $stmt = $conn->prepare("SELECT * FROM `order_details` WHERE `order_id` = ?;");
        //set parameters
        $stmt->bind_param("i", $$orderId);
        // execute
        $stmt->execute();
        $result = $stmt->get_result();

        $OrderDetail = array();

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $OrderDetail =  $row;
            }
        }

        $conn->close();
        return $OrderDetail;
    }
    // Get OrderDetails info by orderID
    public static  function getOrdersInfo($orderId)
    {
        // Create connection
        $conn = Connection::openConn();

        // prepare and bind
        $stmt = $conn->prepare("SELECT order_details.order_id, order_details.product_id, order_details.quantity FROM order_details INNER JOIN orders ON order_details.order_id = orders.order_id WHERE orders.order_id = ?;");
        //set parameters
        $stmt->bind_param("i", $orderId);
        // execute
        $stmt->execute();
        $result = $stmt->get_result();

        $OrderDetailArr = array();

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                // dd($row);
                array_push($OrderDetailArr, $row);
            }
        }

        $conn->close();
        return $OrderDetailArr;
    }
    // Methods ---------------------------------------------
    // insert Customer
    public static  function insetOrderDetail($orderId, $productId, $quantity)
    {
        // Create connection
        $conn = Connection::openConn();

        // prepare and bind
        $stmt = $conn->prepare("INSERT INTO `order_details` (`order_detail_id`, `order_id`, `product_id`, `quantity`) 
                                VALUES (NULL, ?, ?, ?);");
        //set parameters
        $stmt->bind_param("iii", $orderId, $productId, $quantity);
        // execute
        $inserted = $stmt->execute();
        if ($inserted) {
            $conn->close();
            return $inserted;
        }

    }
}

?>