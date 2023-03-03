
<?php
//require Files
require_once '../../functions/helpers.php';
require_once '../../database/Category.php';
require_once '../../database/Product.php';

//The Current Page Filename
$current_page_name = basename($_SERVER['PHP_SELF'], 'php');


//START SESSION
session_start();
// unset($_SESSION["cart_"]);

//-----------------------------------------------------------
if (isset($_SESSION['products'])) {
    $products = $_SESSION['products'];
}else{
    $products = array();
}


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
            <!-- Products Card -->
            <div class="card">
                <!-- card-header -->
                <?php require_once 'layouts/card-header.php' ?>

                <!-- card-body  -->
                <div class="card-body">
                    <div class="col-11 order-md-last">
                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-primary">Orders</span>
                            <span class="badge bg-primary rounded-pill"><?= (isset($_SESSION['totalProducts']))? $_SESSION['totalProducts']: '0' ?></span>
                        </h4>
                        <ul class="list-group mb-3">
                            <!-- Products -->
                            <?php if (count($products) > 0) {
                            foreach ($products as $product) {?>
                            <li class="list-group-item d-flex justify-content-between lh-sm ">
                                <div>
                                    <h6 class="my-0 "><?= $product['name']?></h6>
                                    <small class="text-muted "><?= $product['price']?>kr</small>
                                </div>
                                <div class="d-flex col-4 justify-content-between">
                                    <div>

                                        <a href="<?= asset('app/cart/cart-controller.php?productId=') . $product["id"]  . '&minus=1' ?>" class="badge bg-secondary rounded-pill p-2"><i class="fa-solid fa-minus "></i></a>
                                        <span class="badge bg-primary  mx-2 fs-6"><?= $product["quantity"]?></span>
                                        <a href="<?= asset('app/cart/cart-controller.php?productId=') . $product["id"]  . '&plus=1' ?>" class="badge bg-secondary rounded-pill p-2"><i class="fa-solid fa-plus "></i></a>

                                    </div>
                                    <span class="text-muted"><?= $product["price"] * $product["quantity"]; ?>kr</span>
                                </div>
                            </li>
                            <?php }} ?>

                            <!-- Total -->
                            <li class="list-group-item d-flex justify-content-between <?= (!isset($_SESSION['totalProducts']) || $_SESSION['totalProducts'] < 1)? 'd-none' : ''?> ">
                                <span>Total (kr)</span>
                                <strong><?= $_SESSION['total']?>kr</strong>
                            </li>
                        </ul>
                    </div>

                    <!-- BTN Next -->
                    <div class="col-12 text-end mt-4 <?= (!isset($_SESSION['totalProducts']) || $_SESSION['totalProducts'] < 1)? 'd-none' : ''?> ">
                        <a href="<?= asset('/app/index.php') ?>" class="btn btn-danger col-1">Cancel</a>
                        <a href="<?= asset('/app/cart/cart-contact.php') ?>" class="btn btn-primary col-1">Next</a>
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