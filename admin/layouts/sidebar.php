<?php


//The Current Page Filename
$current_page_name = basename($_SERVER['PHP_SELF'], '.php');
// echo $current_page_name;

//Time Zone Sweden
date_default_timezone_set("Europe/Stockholm");
$format = "Y/m/d H:i:s"; //2023/02/07 18:48:54

//START SESSION
// session_start();

//-----------------------------------------------------------
// REQUEST_METHOD GET


//-----------------------------------------------------------
// REQUEST_METHOD POST 


?>


<!-- Sidebar Start -->
<nav class="col-md-3 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
        <ul class="nav nav-pills flex-column">
            <li class="nav-item">
                <a class="nav-link <?= ($current_page_name == 'index' ? 'active' : '') ?> " href="<?= asset('admin/index.php') ?>">
                    <i class="fas fa-home"></i>
                    Dash board
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= ($current_page_name == 'product' ? 'active' : '') ?>" href="<?= asset('admin/product/product.php') ?>">
                    Products
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    Categories
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= asset('admin/order/order.php') ?>">
                    Orders
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    Users
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    CSV files
                </a>
            </li>

        </ul>
    </div>
</nav>
<!-- Sidebar End -->





<!-- --------------------------------------------------------------- -->