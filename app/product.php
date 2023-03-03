<?php
//require Files
require_once '../functions/helpers.php';
require_once '../database/Category.php';
require_once '../database/Product.php';



//The Current Page Filename
$current_page_name = basename($_SERVER['PHP_SELF'], 'php');

//Time Zone Sweden
date_default_timezone_set("Europe/Stockholm");
$format = "Y/m/d H:i:s"; //2023/02/07 18:48:54

//START SESSION
session_start();


//-----------------------------------------------------------
// Categories
$categories = Category::getAllCategory();


//-----------------------------------------------------------
// REQUEST_METHOD POST For search
$showAlert = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST["search"])) {
        $search = $_POST["search"];
        $showAlert = true;
    }
}

//-----------------------------------------------------------
// Products
$products = array();
$categoryId = '';

// REQUEST_METHOD Get For Category
if (isset($_GET['category'])) {
    $categoryId = $_GET['category'];
    // echo $categoryId;

    $products = Product::getProducts($categoryId);
} else {
    $products = Product::getAllActiveProducts();
    $categoryId = '';
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Head  -->
    <?php require_once '../layouts/head.php' ?>
    <title>Product</title>
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
        <div class="container d-flex mt-4 mb-3">
            <!-- dropdown  Categories-->
            <div class="dropdown col-4">
                <a class="btn  btn-outline-primary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Filter
                </a>
                <ul class="dropdown-menu">
                    <a class="dropdown-item <?= (empty($_GET['category']) && $current_page_name == 'product' ? 'active' : '') ?>" href="<?= asset('app/product.php') ?>">All products</a>
                    <?php
                    foreach ($categories as $category) { ?>
                        <li>
                            <a class="dropdown-item <?php echo (isset($_GET['category']) && $category["categorie_id"] == $_GET['category'] ? 'active' : ''); ?>" href="<?= 'product.php?category=' . $category["categorie_id"] ?>">
                                <?= $category["name"] ?>
                            </a>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
            <!-- Search Form -->
            <div class="d-flex align-items-center col-8">
                <form class="w-100 me-3 d-flex" method="post" action="<?= asset('app/search.php') ?>">
                    <input name="search" type="text" class="form-control" placeholder="Search" aria-label="Search">
                    <button type="submit" class="me-4 ms-2 btn  btn-primary ">Search</button>
                </form>
            </div>
        </div>
        <!-- Products -->
        <div class="container-fluid">
            <section class="d-flex flex-wrap flex-row w-100 mx-auto">
                <!-- Rows Product -->
                <?php if (count($products) > 0) {
                    foreach ($products as $product) {
                        if ($product['status'] ==1) {
                ?>
                        <section class=" col-lg-3 col-md-4 col-sm-6 ">
                            <div class="card mx-2 my-3" style="height: 360px;">
                                <div class="d-flex justify-content-center align-items-center bg-body-secondary">
                                    <img src="<?= asset('upload/products') . '/' . $product["image"] ?>" class="card-img-top col-12" alt="..." style="height: 200px; width:auto;">
                                </div>
                                <div class="card-body col-12">
                                    <h5 class="card-title "><?= $product["title"] ?></h5>
                                    <span class=" text-primary"><?= $product["price"] ?> kr</span>
                                    <!-- <p class="card-text"><?php // substr($product["body"], 0, 60)  
                                                                ?> ...</p> -->
                                    <hr>
                                    <div class="col-12">
                                        <a href="<?= asset('app/single-product.php?productId=') . $product["product_id"] ?>" class="card-link btn  btn-success col-4">Show</a>
                                        <a href="<?= asset('app/cart/cart-controller.php?productId=') . $product["product_id"]  . '&categoryId=' . $categoryId ?>" class="card-link btn btn-primary col-6">Buy</a>
                                    </div>
                                </div>
                            </div>
                        </section>
                    <?php
                    }
                } }else { ?>
                <div class=" container d-flex justify-content-center align-items-center alert alert-warning" style="height: 400px;">
                    <p class="fs-3">Have Not</p>
                </div>
                <?php } ?>


            </section>
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