<?php
require_once 'Connection.php';
$t = 'customer_id	first_name	last_name	email	phone	address	city	postal_code	';


class Customer extends Connection
{
    // Setter ---------------------------------------------
    // Getter ---------------------------------------------
    // Get Customer info by Email
    public static  function getCustomerInfo($email)
    {
        // Create connection
        $conn = Connection::openConn();

        // prepare and bind
        $stmt = $conn->prepare("SELECT * FROM `customers` WHERE `email` = ?;");
        //set parameters
        $stmt->bind_param("s", $email);
        // execute
        $stmt->execute();
        $result = $stmt->get_result();

        $customer = array();

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $customer =  $row;
                // dd($row);
            }
        }

        $conn->close();
        return $customer;
    }
    // Methods ---------------------------------------------
    // insert Customer
    public static  function insetCustomer($firstName, $lastName, $email,    $phone,    $address, $city,    $postalCode)
    {
        // Create connection
        $conn = Connection::openConn();

        // prepare and bind
        $stmt = $conn->prepare("INSERT INTO `customers` (`customer_id`, `first_name`, `last_name`, `email`, `phone`, `address`, `city`, `postal_code`) 
                                                    VALUES (NULL, ?, ?, ?, ?, ?, ?, ?);");
        //set parameters
        $stmt->bind_param("sssissi", $firstName, $lastName, $email, $phone, $address, $city,    $postalCode);
        // execute
        $inserted = $stmt->execute();
        if ($inserted) {
            $conn->close();
            // $t = $this->getCustomerInfo($email);
            $customer = Customer::getCustomerInfo($email);
            $customerID = $customer["customer_id"];
            
            return $customerID;
        }

    }
}
