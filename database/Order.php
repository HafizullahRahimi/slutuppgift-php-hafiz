<?php
require_once 'Connection.php';
$t = 'order_id	order_number	customer_id	order_date';


class Order extends Connection
{
    // Setter ---------------------------------------------
    // Getter ---------------------------------------------
    // Get Order info by customerId
    public static  function getOrderInfo($customerId)
    {
        // Create connection
        $conn = Connection::openConn();

        // prepare and bind
        $stmt = $conn->prepare("SELECT * FROM `orders` WHERE `customer_id` = ?;");
        //set parameters
        $stmt->bind_param("i", $customerId);
        // execute
        $stmt->execute();
        $result = $stmt->get_result();

        $order = array();

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $order =  $row;
                // dd($row);
            }
        }

        $conn->close();
        return $order;
    }

    // Get All Order
    public static  function getAllOrders()
    {
        // Create connection
        $conn = Connection::openConn();

        $sql = "SELECT * FROM orders ORDER BY order_date DESC;";
        $result = $conn->query($sql);
        $OrderArr = array();

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                array_push($OrderArr, $row);
            }
        } else {
            $OrderArr = array();;
        }

        $conn->close();
        return $OrderArr;
    }
    // Methods ---------------------------------------------
    // insert Order
    public static  function insetOrder($customerId)
    {
        // Create connection
        $conn = Connection::openConn();

        // prepare and bind
        $stmt = $conn->prepare("INSERT INTO `orders` (`order_id`, `customer_id`, `order_date`)
                    VALUES (NULL, ?, current_timestamp());");
        //set parameter
        $stmt->bind_param("i", $customerId);
        // execute
        $inserted = $stmt->execute();

        if ($inserted) {
            $conn->close();
            $order = Order::getOrderInfo($customerId);
            $orderID = $order["order_id"];
            
            return $orderID;
        }
    }
}
