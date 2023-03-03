<?php
//require Files
require_once '../../functions/helpers.php';
require_once '../../database/Product.php';
require_once '../../database/Customer.php';
require_once '../../database/OrderDetail.php';

//The Current Page Filename
$current_page_name = basename($_SERVER['PHP_SELF'], 'php');

//Time Zone Sweden
date_default_timezone_set("Europe/Stockholm");
$format = "Y/m/d H:i:s"; //2023/02/07 18:48:54

//START SESSION
session_start();
require_once '../../functions/checkIsAdmin.php';

//-----------------------------------------------------------
if (isset($_GET['orderId']) && isset($_GET['customerId'])) {
    $orderId = $_GET['orderId'];
    $customerId = $_GET['customerId'];

    $orderDetailArr = OrderDetail::getOrdersInfo($orderId);

    $customerInfo = Customer::getCustomerInfoByID($customerId);

    
} else {

    redirect('admin/order/order.php');
}



//-----------------------------------------------------------

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Head  -->
    <?php require_once '../../layouts/head.php' ?>
    <title>Order Detail</title>
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
                <!-- Breadcrumb -->
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= asset('admin/order/order.php') ?>">Order</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Order Detail</li>
                    </ol>
                </nav>
                <!-- customer info -->
                <div class="bg-light p-3 rounded my-4">
                    <div class="">
                        <h1 class="fs-2 text-info">Customer Info</h1>
                        <hr>
                        <p>
                            Full name: <span class=" text-info"><?= $customerInfo["first_name"]. ' ' .$customerInfo["last_name"]?> </span> <br>
                            Email: <span class=" text-info"><?= $customerInfo["email"]?> </span><br>
                            Phone: <span class=" text-info"><?= $customerInfo["phone"]?> </span><br>
                            Address: <span class=" text-info"><?= $customerInfo["address"]?> </span><br>
                            City: <span class=" text-info"><?= $customerInfo["city"]?> </span><br>
                            Postal code: <span class=" text-info"><?= $customerInfo["postal_code"]?> </span><br>
                        </p>
                    </div>
                </div>
                <!-- Orders card -->
                <div class="card mb-5">
                    <!-- card-body  -->
                    <div class="card-body">
                        <div class="col-11 order-md-last">
                            <h1 class="fs-2 text-info">Order Info</h1>
                            <ul class="list-group mb-3">
                                <!-- Products -->
                                <?php 
                                $total = 0;
                                foreach ($orderDetailArr as $orderDetail) { 
                                    $product = Product::getProduct($orderDetail["product_id"]);
                                    ?>
                                
                                        <li class="list-group-item d-flex justify-content-between lh-sm ">
                                            <div>
                                                <h6 class="my-0 "><?= $orderDetail["product_id"]?></h6>
                                                <small class="text-muted "><?= $product['price']?>kr</small>
                                            </div>
                                            <div class="d-flex col-4 justify-content-between">
                                                <div>

                                                    <span class="badge bg-primary  mx-2 fs-6"><?= $orderDetail["quantity"]?></span>

                                                </div>
                                                <span class="text-muted"><?php echo $t = $product["price"] * $orderDetail["quantity"]; $total += $t?>kr</span>
                                            </div>
                                        </li>
                                <?php }?>

                                <!-- Total -->
                                <li class="list-group-item d-flex justify-content-between  ">
                                    <span>Total (kr)</span>
                                    <strong><?= $total?>kr</strong>
                                </li>
                            </ul>
                        </div>

                        <!-- BTN to back order -->
                        <div class="col-12 text-end mt-4 ">
                            <a href="<?= asset('admin/order/order.php') ?>" class="btn btn-primary col-3">Back to order page</a>
                        </div>
                    </div>
                </div>

            </main>
            <!-- Main End -->
        </div>
    </div>





    <!-- script src -->
    <?php require_once '../../layouts/script-src.php' ?>

</body>

</html>