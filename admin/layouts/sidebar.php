<?php


//The Current Page Filename
$current_page_name = basename($_SERVER['PHP_SELF'], '.php');
// echo $current_page_name;

//Time Zone Sweden
date_default_timezone_set("Europe/Stockholm");
$format = "Y/m/d H:i:s"; //2023/02/07 18:48:54

//START SESSION
// session_start();



?>


<!-- Sidebar Start -->
<nav class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
        <ul class="nav nav-pills flex-column mb-5">
            <li class="nav-item">
                <a class="nav-link <?= ($current_page_name == 'index' ? 'active' : '') ?> " href="<?= asset('admin/index.php') ?>">
                    <i class="fas fa-home"></i>
                    Dash board
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="<?= asset('app/index.php') ?>">
                    <i class="fa-solid fa-globe"></i>
                    Web Site
                </a>
            </li>
            <li class="nav-item  ">
                <a class="nav-link <?= ($current_page_name == 'product' || $current_page_name == 'new-product' || $current_page_name ==  'edit-product' ? 'active' : '') ?>" href="<?= asset('admin/product/product.php') ?>">
                    <i class="fa-brands fa-shopify"></i>
                    Product
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link disabled" href="#">
                    Categories
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= asset('admin/order/order.php') ?>">
                    <i class="fa-solid fa-bag-shopping"></i>
                    Orders
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#">
                    Users
                </a>
            </li>
            <li class="nav-item mb-5">
                <a class="nav-link disabled" href="#">
                    CSV files
                </a>
            </li>

        </ul>
        <!-- User Menu-->
        <hr>
        <div class="d-flex align-items-center ">
            <!-- User Menu -->
            <div class="flex-shrink-0 dropdown me-4">
                <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="<?= asset('assets\images\user.png'); ?>" alt="mdo" width="32" height="32" class="rounded-circle" />
                    <?= $_SESSION["userName"] ?>
                </a>
                <ul class="dropdown-menu text-small">
                    <li>
                        <a class="dropdown-item" href="<?= asset('app/account/profile.php') ?>">Profile</a>
                    </li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li>
                        <a class="dropdown-item" href="<?= asset('app/account/account-setting.php') ?>">Settings</a>
                    </li>

                </ul>
            </div>
        </div>
    </div>
</nav>
<!-- Sidebar End -->





<!-- --------------------------------------------------------------- -->