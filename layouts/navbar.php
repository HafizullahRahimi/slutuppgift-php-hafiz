<?php
//The Current Page Filename
$current_page_name = basename($_SERVER['PHP_SELF'], '.php');
// echo $current_page_name; // return: index
// echo '<hr>';


?>

<!-- Navbar Start -->
<nav class="navbar navbar-expand-md navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="<?php
                        if ($current_page_name == 'login') echo asset('assets/images/password.png');
                        elseif ($current_page_name == 'register') echo asset('assets/images/registration.png');
                        else echo asset('assets/images/house.png');
                        ?>" alt="" width="34" height="34" class=" " />
        </a>
        <button class="navbar-toggler ms-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link <?php if ($current_page_name == 'index') echo 'active'; ?>" aria-current="page" href="<?= asset('index.php') ?>">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Features</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Pricing</a>
                </li>
                <!-- <li class="nav-item">
                        <a class="nav-link disabled">Disabled</a>
                    </li>  -->
            </ul>
        </div>
        <div class="dropdown text-end ms-auto d-none">
            <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle" />
                Hafizullah Rahimi
            </a>
            <ul class="dropdown-menu text-small">
                <li>
                    <a class="dropdown-item" href="#">New project...</a>
                </li>
                <li>
                    <a class="dropdown-item" href="#">Settings</a>
                </li>
                <li>
                    <a class="dropdown-item" href="#">Profile</a>
                </li>
                <li>
                    <hr class="dropdown-divider" />
                </li>
                <li>
                    <a class="dropdown-item" href="#">Sign out</a>
                </li>
            </ul>
        </div>
        <div class="col-md-3 text-end ms-auto ">
            <a class="btn btn-outline-primary me-2 <?php if ($current_page_name == 'login') echo 'active'; ?>" href="<?= asset('/auth/login.php') ?>">
                Login
            </a>
            <a class="btn btn-outline-primary <?php if ($current_page_name == 'register') echo 'active'; ?>" href="<?= asset('/auth/register.php') ?>">
                Sign-up
            </a>
        </div>
    </div>
</nav>
<!-- Navbar End -->