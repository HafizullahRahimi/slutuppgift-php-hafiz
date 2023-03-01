<?php
//require Files
require_once '../../functions/helpers.php';
require_once '../../database/Category.php';
require_once '../../database/Product.php';

//The Current Page Filename
$current_page_name = basename($_SERVER['PHP_SELF'], 'php');


//START SESSION
session_start();

//-----------------------------------------------------------

?>



<!-- Home HTML-->
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Head  -->
    <?php require_once '../../layouts/head.php' ?>
    <title>Cart | Address</title>
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
                <!-- card-header -->
                <?php require_once 'layouts/card-header.php' ?>
                <div class="card-body">
                    <div class="col-11 order-md-last">
                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-primary">Address</span>
                        </h4>
                        

                    </div>

                    <!-- BTN Next -->
                    <div class="card p-2 col-11 text-success">
                            <div class="list-group-item d-flex justify-content-between">
                                <span>Total (kr)</span>
                                <strong>20 kr</strong>
                            </div>
                    </div>
                    <div class="col-12 text-end mt-4">
                        <a href="<?= asset('/app/index.php') ?>" class="btn btn-danger col-1">Cancel</a>
                        <a href="<?= asset('/app/cart/cart-checkout.php') ?>" class="btn btn-success col-2">Checkout</a>
                    </div>
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