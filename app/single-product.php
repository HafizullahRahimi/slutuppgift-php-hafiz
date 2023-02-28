<?php
//require Files
require_once '../functions/helpers.php';
require_once '../database/Category.php';
require_once '../database/Product.php';

//The Current Page Filename
$current_page_name = basename($_SERVER['PHP_SELF'], 'php');




//-----------------------------------------------------------

$product = array();
$categoryId = 3;

// REQUEST_METHOD Get For Category
if (isset($_GET['productId'])) {
    $productId = $_GET['productId'];
    $product = Product::getProduct($productId);
    dd( $product);

    $categoryId=$product["category_id"];

} 


?>




<!-- Home HTML-->
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Head  -->
    <?php require_once '../layouts/head.php' ?>
    <title><?= $product["title"] ?></title>
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
        <?php require_once '../layouts/navbar.php' ?>
    </header>
    <!-- Header End -->

    <!-- Main Start -->
    <main>
        <div class="container mt-5 mb-5">
            <div class="mb-5" >
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative" style="height: 400px;">
                    <div class="col-8 p-4 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2 text-primary"><?= Category::getCategory($product["category_id"])  ?></strong>
                        <h3 class="mb-1"><?= $product["title"] ?></h3>
                        <div class="mb-1 text-muted"> <?= $product["created_at"] ?></div>
                        <strong class="text-success"><?= $product["price"] ?>kr</strong>
                        <div class="card-text mb-auto"><?= $product["body"] ?></div>
                        <a href="<?= asset('app/cart/controller-cart.php?productId=') . $product["product_id"]  . '&categoryId=' . $product["category_id"] ?>" class="card-link btn btn-primary col-4">Buy</a>
                    </div>
                    <div class="d-flex justify-content-center align-items-center bg-body-secondary col-4">
                        <img src="<?= asset('upload/products') . '/' . $product["image"] ?>" class="card-img-top col-12" alt="..." style="height: 200px; width:auto;">
                    </div>
                </div>
            </div>
        </div>


    </main>
    <!-- Main End -->

    <!-- Footer End -->
    <?php require_once '../layouts/footer.php' ?>
    <!-- Footer End -->
    <!-- script src -->
    <?php require_once '../layouts/script-src.php' ?>
</body>

</html>