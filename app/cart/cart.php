<?php
//require Files
require_once '../../functions/helpers.php';
require_once '../../database/Category.php';
require_once '../../database/Product.php';

//The Current Page Filename
$current_page_name = basename($_SERVER['PHP_SELF'], 'php');




//-----------------------------------------------------------

$product = array();
$categoryId = 3;

// REQUEST_METHOD Get For Category
if (isset($_GET['productId'])) {
    $productId = $_GET['productId'];
    $product = Product::getProduct($productId);
    dd($product);

    $categoryId = $product["category_id"];
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
            <div class="card">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="true" href="#">Your cart</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="#">Email</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled">Address</a>
                        </li>
                    </ul>
                </div>
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
                            <li class="list-group-item d-flex justify-content-between lh-sm">
                                <div>
                                    <h6 class="my-0">Third item</h6>
                                    <small class="text-muted">Brief description</small>
                                </div>
                                <span class="text-muted">$5</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between bg-light">
                                <div class="text-success">
                                    <h6 class="my-0">Promo code</h6>
                                    <small>EXAMPLECODE</small>
                                </div>
                                <span class="text-success">−$5</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Total (USD)</span>
                                <strong>$20</strong>
                            </li>
                        </ul>

                        <form class="card p-2">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Promo code">
                                <button type="submit" class="btn btn-secondary">Redeem</button>
                            </div>
                        </form>
                    </div>

                    <!-- BTN Next -->
                    <div class="col-12 text-end mt-4">
                        <a href="#" class="btn btn-danger col-2">Cancel</a>
                        <a href="#" class="btn btn-primary col-2">Next</a>
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