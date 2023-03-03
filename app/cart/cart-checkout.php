<?php
//require Files
require_once '../../functions/helpers.php';
require_once '../../database/Product.php';
require_once '../../database/Customer.php';
require_once '../../database/Order.php';
require_once '../../database/OrderDetail.php';

//The Current Page Filename
$current_page_name = basename($_SERVER['PHP_SELF'], '.php');


//START SESSION
session_start();


//-----------------------------------------------------------


//-----------------------------------------------------------

$payIsSuccessful = false;

// REQUEST_METHOD POST FORM
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_SESSION['customerFName'];
    $lastName = $_SESSION['customerLName'];
    $email = $_SESSION['customerEmail'];
    $phone = $_SESSION['customerPhone'];
    $address = $_SESSION['customerAddress'];
    $city = $_SESSION['customerCity'];
    $postalCode = $_SESSION['customerPostalCode'];


    // // insert a new Customer
    // $customerID = Customer::insetCustomer($firstName, $lastName, $email, $phone, $address, $city, $postalCode);

    // // insert a new order
    // $orderId = Order::insetOrder($customerID);

    // // insert all products
    // $products = $_SESSION['products'];
    // if (count($products) > 0) {
    //     foreach ($products as $product) {
    //         // insert a new OrderDetail
    //         OrderDetail::insetOrderDetail($orderId, $product["id"], $product["quantity"]);
    //     }
    // }


    $payIsSuccessful = true;

    session_destroy();
    unset($_SESSION);

}

?>



<!-- Home HTML-->
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Head  -->
    <?php require_once '../../layouts/head.php' ?>
    <title>Checkout</title>
</head>

<body onload="">

    <!-- Header Start -->
    <header>
        <div class="Header-top col-8 mx-auto">
            <!-- Logo TOP -->
            <div class="my-4 w-100 text-center ">
                <a class="" href="<?= asset('index.php') ?>">
                    <img src=" <?= asset('assets/images/logo.png'); ?>" alt="" width="210" height="70" class=" " />
                </a>
            </div>
        </div>
        <!-- Navbar -->
        <?php require_once '../../layouts/navbar.php' ?>
    </header>
    <!-- Header End -->

    <!-- Main Start -->
    <main>
        <div class="container mt-5 mb-5">
            <div class="card">
                <!-- Pay is successful -->
                <?php if ($payIsSuccessful) { ?>
                    <div class="col-12 alert alert-success text-center mt-5 mb-5">
                        <h3>Pay is successful <i class="fa-regular fa-circle-check text-success fs-2"></i></h3>
                        <h4>Thanks for shopping</h4>
                    </div>
                <?php } else { ?>
                    <!-- card-header -->
                    <?php require_once 'layouts/card-header.php' ?>
                    <div class="card-body">
                        <div class="col-11 order-md-last">
                            <h4 class="d-flex justify-content-between align-items-center mb-3">
                                <span class="text-primary">Checkout</span>
                            </h4>
                            <ul class="list-group mb-3">
                                <li class="list-group-item d-flex justify-content-between lh-sm ">
                                    <div class="d-flex">
                                        <h6 class="my-0 ">Orders</h6>
                                        <span class="badge bg-primary text-center ms-3"><?= $_SESSION['totalProducts'] ?></span>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <i class="fa-regular fa-circle-check text-success fs-4"></i>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between lh-sm ">
                                    <div class="d-flex">
                                        <h6 class="my-0 ">Contact info</h6>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <i class="fa-regular fa-circle-check text-success fs-4"></i>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between lh-sm ">
                                    <div class="d-flex">
                                        <h6 class="my-0 ">Address</h6>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <i class="fa-regular fa-circle-check text-success fs-4"></i>
                                    </div>
                                </li>
                                <!-- Total -->
                                <li class="list-group-item d-flex justify-content-between <?= (!isset($_SESSION['totalProducts']) || $_SESSION['totalProducts'] < 1) ? 'd-none' : '' ?> ">
                                    <span>Total (kr)</span>
                                    <strong><?= $_SESSION['total'] ?>kr</strong>
                                </li>
                            </ul>
                        </div>
                        <form method="post" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                            <input type="text" name="pay" value="1" hidden />
                            <div class="col-12 text-end mt-5">
                                <a href="<?= asset('/app/cart/cart-address.php') ?>" class="btn btn-secondary col-1">Back</a>
                                <a href="<?= asset('/app/index.php') ?>" class="btn btn-danger col-1">Cancel</a>
                                <!-- BTN Next -->
                                <button for='form' type="submit" class="btn btn-success col-2">Pay</button>
                            </div>
                        </form>
                    </div>
                <?php } ?>
            </div>
        </div>
        </div>


    </main>
    <!-- Main End -->

    <!-- Footer End -->
    <?php require_once '../../layouts/footer.php' ?>
    <!-- Footer End -->
    <!-- script src -->
    <?php require_once '../../layouts/script-src.php' ?>
</body>

</html>