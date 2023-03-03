<?php
//require Files
require_once '../../functions/helpers.php';
require_once '../../database/Product.php';
require_once '../../database/Category.php';
require_once '../../database/Order.php';

//The Current Page Filename
$current_page_name = basename($_SERVER['PHP_SELF'], 'php');

//Time Zone Sweden
date_default_timezone_set("Europe/Stockholm");
$format = "Y/m/d H:i:s"; //2023/02/07 18:48:54

//START SESSION
session_start();
require_once '../../functions/checkIsAdmin.php';

//-----------------------------------------------------------
// Product
$products = Product::getAllProducts();

// Orders Arr
$orders = Order::getAllOrders();



//-----------------------------------------------------------

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Head  -->
    <?php require_once '../../layouts/head.php' ?>
    <title>Order</title>
</head>

<body onload="">

    <!-- Header Start -->
    <header>
        <!-- Navbar -->
        <?php require_once '../layouts/navbar.php' ?>
        <br>
    </header>
    <!-- Header End -->

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar Start -->
            <?php require_once '../layouts/sidebar.php'; ?>
            <!-- Sidebar End -->
            <!-- Main Start -->
            <main role="main" class="col-10 px-4">
                <!-- Orders Table -->
                <div class="">
                    <table class="table table-striped caption-top ">
                        <caption class="fs-2 fw-bold ">List of Order</caption>
                        <thead class="">
                            <tr class="">
                                <th>Order number</th>
                                <th>order date </th>
                                <th>Settings</th>
                            </tr>
                        </thead>
                        <tbody class="">
                            <!-- Rows Product -->
                            <?php if (count($orders) > 0) {
                                foreach ($orders as $order) { ?>
                                    <tr class="">
                                        <td><?= $order["order_id"] ?></td>
                                        <td><?= $order["order_date"] ?></td> 
                                        
                                        <td>
                                            <a href="<?= asset('admin/order/order-detail.php?orderId=') . $order["order_id"] . '&customerId=' .$order["customer_id"]?>" class="btn btn btn-primary btn-sm">Show</a>
                                        </td>
                                    </tr>
                            <?php }
                            } ?>
                            <?php ?>
                        </tbody>
                    </table>
                </div>

            </main>
            <!-- Main End -->
        </div>
    </div>





    <!-- script src -->
    <?php require_once '../../layouts/script-src.php' ?>

</body>

</html>