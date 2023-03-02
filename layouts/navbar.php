<?php

//The Current Page Filename
$current_page_name = basename($_SERVER['PHP_SELF'], '.php');
// echo $current_page_name; // return: index


//START SESSION
// session_start();


//-----------------------------------------------------------
//logout
$logoutAlert = false;

// REQUEST_METHOD GET
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (empty($_GET['logoutAlert'])) $logoutAlert = false;
    else  $logoutAlert = true;
}
//-----------------------------------------------------------

?>

<!-- Navbar Start -->
<nav class="navbar navbar-expand-md bg-body-tertiary">
    <div class="container">
        <!-- LOGO -->
        <a class="navbar-brand" href="<?= asset('index.php') ?>">
            <img src=" <?= asset('assets/images/logo.png'); ?>" alt="" width="110" height="40" class=" " />
        </a>

        <!-- Navbar -->
        <ul class="nav nav-pills">
            <li class="nav-item">
                <a class="nav-link <?= ($current_page_name == 'index' ? 'active' : '') ?>" aria-current="page" href="<?= asset('app/index.php') ?>">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= ($current_page_name == 'product' || $current_page_name == 'search' ? 'active' : '') ?>" href="<?= asset('app/product.php') ?>">Product</a>

            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Contact us</a>
            </li>
            <li class="nav-item">
                <!-- <a class="nav-link disabled">Disabled</a> -->
            </li>
        </ul>

        <div class="ms-auto d-flex">
            <!-- User Menu-->
            <div class="d-flex align-items-center <?php if (!isset($_SESSION["userName"])) echo 'd-none' ?>">
                <!-- User Menu -->
                <div class="flex-shrink-0 dropdown me-4">
                    <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="<?= asset('assets\images\user.png'); ?>" alt="mdo" width="32" height="32" class="rounded-circle" />
                        <?= $_SESSION["userName"] ?>
                    </a>
                    <ul class="dropdown-menu text-small">
                        
                        <li>
                            <a class="dropdown-item <?= ($_SESSION["userRole"] == 0) ? 'd-none' : ''?>" href="<?= asset('app/account/order.php') ?>">Order</a>
                        </li>
                        <li>
                            <a class="dropdown-item text-success <?= ($_SESSION["userRole"] == 1) ? 'd-none' : ''?>" href="<?= asset('admin/index.php') ?>">Admin Panel </a>
                        </li>

                        <li>
                            <hr class="dropdown-divider" />
                        </li>
                        <li>
                            <a class="dropdown-item" href="<?= asset('app/account/account-setting.php') ?>">Settings</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="<?= asset('app/account/profile.php') ?>">Profile</a>
                        </li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>
                        <li>
                            <a class="dropdown-item" href="<?= asset('app/index.php?logoutAlert=1') ?>">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Login -->
            <div class="text-end <?php if (isset($_SESSION["userName"])) echo 'd-none' ?>">
                <!-- login -->
                <a class="btn btn-outline-primary me-2 <?php if ($current_page_name == 'login') echo 'active'; ?>" href="<?= asset('/auth/login.php') ?>">
                    Login
                </a>
            </div>
            <!-- Cart -->
            <div class="text-end me-5  <?= (isset($_SESSION["userRole"]) && $_SESSION["userRole"] == 0) ? 'd-none' : ''?>">
                <a class="btn position-relative <?= ($current_page_name == 'cart' ? 'btn-primary' : 'btn-outline-primary') ?>" href="<?= asset('/app/cart/cart.php') ?>">
                    Cart
                    <i class="fa-solid fa-cart-shopping "></i>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill  bg-primary <?= (!isset($_SESSION['totalProducts']) || $_SESSION['totalProducts'] < 1)? 'd-none' : ''?> ">
                    <?= $_SESSION['totalProducts']?>
                    </span>
                </a>
            </div>
        </div>

    </div>
</nav>
<!-- Navbar End -->


<!-- Logout question Alert-->
<script>
    function ShowAlert() {
        Swal.fire({
            title: '<h2 class="fw-semibold">Are you sure to logout?</h2>',
            showDenyButton: true,
            focusConfirm: false,
            confirmButtonText: '<form method="post" action="<?php echo asset('auth/logout.php') ?>"><input type="hidden" name="logout" value="1"><input class="btn btn-sm text-light" type="submit" value="Yes" > </form>',
            denyButtonText: '<a href="<?php echo asset('index.php') ?>"class="btn btn-sm text-light">No</a>',
        })
    }
</script>
<?php
if ($logoutAlert) {
    echo '<script>ShowAlert()</script>';
}
?>