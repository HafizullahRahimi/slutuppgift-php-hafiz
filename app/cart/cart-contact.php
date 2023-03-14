<?php
//require Files
require_once '../../functions/helpers.php';
require_once '../../database/Category.php';
require_once '../../database/Product.php';

//The Current Page Filename
$current_page_name = basename($_SERVER['PHP_SELF'], '.php');


//START SESSION
session_start();

//-----------------------------------------------------------
require_once '../../functions/checkHaveOrder.php';

// -------------------------------------------------------
$email = $phone = $err = "";
$status = false;


// REQUEST_METHOD POST FORM
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["email"]) || empty($_POST["phone"])) {
        $err = 'Email or Phone is empty!!';
    }else{
        $email = testInput($_POST["email"]);
        $phone = testInput($_POST["phone"]);
    
        $_SESSION['customerEmail'] = $email;
        $_SESSION['customerPhone'] = $phone;
    
        // Redirect To Cart Address
        redirect('app/cart/cart-address.php');
    }
}

?>



<!-- Home HTML-->
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Head  -->
    <?php require_once '../../layouts/head.php' ?>
    <title>Cart | Contact info</title>
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
                            <span class="text-primary">Contact info</span>
                        </h4>


                    </div>
                    <!-- Form -->
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="row g-3 needs-validation " novalidate>
                        <!-- Email -->
                        <span class=" text-danger "><?= $err ?></span>
                        <div class="col-md-6">
                            <label for="validationCustom03" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" id="validationCustom03" value="<?= (isset($_SESSION['customerEmail'])) ? $_SESSION['customerEmail'] : '' ?>" required />
                            <div class="invalid-feedback">
                                Please provide a valid Email.
                            </div>
                        </div>
                        <!-- phone -->
                        <div class="col-md-5">
                            <label for="validationCustom07" class="form-label">phone</label>
                            <input type="tel" name="phone" class="form-control" id="validationCustom07" value="<?= (isset($_SESSION['customerPhone'])) ? $_SESSION['customerPhone'] : '' ?>" required />
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">
                                Please provide a valid phone.
                            </div>
                        </div>

                        <!-- BTN Next -->
                        <div class="col-12 text-end mt-5">
                            <a href="<?= asset('app/cart/cart.php') ?>" class="btn btn-secondary col-1">Back</a>
                            <button for='form' type="submit" class="btn btn-primary col-1">Next</button>
                        </div>
                    </form>

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