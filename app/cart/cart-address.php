<?php
//require Files
require_once '../../functions/helpers.php';
require_once '../../database/Product.php';
require_once '../../database/Customer.php';

//The Current Page Filename
$current_page_name = basename($_SERVER['PHP_SELF'], '.php');


//START SESSION
session_start();

//-----------------------------------------------------------
require_once '../../functions/checkHaveOrder.php';

//-----------------------------------------------------------
// REQUEST_METHOD POST FORM
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Set SESSION for customer info
    $_SESSION['customerFName'] = testInput($_POST["firstName"]);
    $_SESSION['customerLName']  = testInput($_POST["lastName"]);
    $_SESSION['customerAddress'] = testInput($_POST["address"]);
    $_SESSION['customerCity'] = testInput($_POST["city"]);
    $_SESSION['customerPostalCode'] = testInput($_POST["postalCode"]);


    // Redirect To checkout page
    redirect('app/cart/cart-checkout.php');
}


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

                    <!-- Form -->
                    <form method="post" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="row g-3 needs-validation " novalidate>
                        <!-- First name -->
                        <div class="col-md-6">
                            <label for="validationCustom03" class="form-label">First name</label>
                            <input type="text" name="firstName" class="form-control" id="validationCustom03" value="<?= (isset($_SESSION['customerFName']) )? $_SESSION['customerFName'] : '' ?>" required />
                        </div>
                        <!-- First name -->
                        <div class="col-md-6">
                            <label for="validationCustom04" class="form-label">Last name</label>
                            <input type="text" name="lastName" class="form-control" id="validationCustom04" value="<?= (isset($_SESSION['customerLName']) )? $_SESSION['customerLName'] : '' ?>" required />
                        </div>
                        <!-- city -->
                        <div class="col-md-5">
                            <label for="validationCustom05" class="form-label">City</label>
                            <input type="text" name="city" class="form-control" id="validationCustom05" value="<?= (isset($_SESSION['customerCity']) )? $_SESSION['customerCity'] : '' ?>" required />
                        </div>
                        <!-- postalCode -->
                        <div class="col-md-5">
                            <label for="validationCustom06" class="form-label">Postal code</label>
                            <input type="number" name="postalCode" class="form-control" id="validationCustom06" value="<?= (isset($_SESSION['customerPostalCode']) )? $_SESSION['customerPostalCode'] : '' ?>" required />
                        </div>
                        <!-- Address -->
                        <div class="col-md-12">
                            <label for="validationCustom05" class="form-label">Address</label>
                            <input type="text" name="address" class="form-control" id="validationCustom05" value="<?= (isset($_SESSION['customerAddress']) )? $_SESSION['customerAddress'] : '' ?>" required />
                        </div>

                        <!-- BTN Next -->
                        <div class="col-12 text-end mt-5">
                            <a href="<?= asset('app/cart/cart-contact.php') ?>" class="btn btn-secondary col-1">Back</a>
                            <button for='form' type="submit" class="btn btn-success col-2">Checkout</button>

                        </div>
                    </form>


                    <div class="col-12 text-end mt-4">
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