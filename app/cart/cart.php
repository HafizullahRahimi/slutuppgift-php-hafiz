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
    <title>Cart</title>
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
                    <!-- <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> -->

                    <div class="col-11 order-md-last">
                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-primary">Orders</span>
                            <span class="badge bg-primary rounded-pill">3</span>
                        </h4>
                        <ul class="list-group mb-3">
                            <li class="list-group-item d-flex justify-content-between lh-sm">
                                <div>
                                    <h6 class="my-0">Product name</h6>
                                    <small class="text-muted">Brief description</small>
                                </div>
                                <span class="text-muted">$12</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between lh-sm">
                                <div>
                                    <h6 class="my-0">Second product</h6>
                                    <small class="text-muted">Brief description</small>
                                </div>
                                <span class="text-muted">$8</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between lh-sm ">
                                <div>
                                    <h6 class="my-0 ">Third item</h6>
                                    <small class="text-muted ">Brief description</small>
                                </div>
                                <div class="d-flex col-4 justify-content-between">
                                    <div>
                                        
                                        <a href="#"class="badge bg-secondary rounded-pill p-2" ><i class="fa-solid fa-plus "></i></a>
                                        <span class="badge bg-primary  mx-2 fs-6">3</span>
                                        <a href="#"class="badge bg-secondary rounded-pill p-2" ><i class="fa-solid fa-minus "></i></a>

                                    </div>
                                    <span class="text-muted">$5</span>
                                </div>
                            </li>
                            <li class="list-group-item d-flex justify-content-between bg-light">
                                <div class="text-success">
                                    <h6 class="my-0">Promo code</h6>
                                    <small>EXAMPLECODE</small>
                                </div>
                                <span class="text-success">−$5</span>
                            </li>
                            <!-- Total -->
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Total (kr)</span>
                                <strong>20kr</strong>
                            </li>
                        </ul>
                    </div>

                    <!-- BTN Next -->
                    <div class="col-12 text-end mt-4">
                        <a href="<?= asset('/app/index.php') ?>" class="btn btn-danger col-1">Cancel</a>
                        <a href="<?= asset('/app/cart/cart-email.php') ?>" class="btn btn-primary col-1">Next</a>
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