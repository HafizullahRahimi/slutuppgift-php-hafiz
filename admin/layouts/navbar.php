<?php
//The Current Page Filename
$current_page_name = basename($_SERVER['PHP_SELF'], '.php');
// echo $current_page_name; // return: index


//START SESSION
// session_start();


$logoutAlert = false;

// REQUEST_METHOD GET
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (empty($_GET['logoutAlert'])) $logoutAlert = false;
    else  $logoutAlert = true;
}

?>

<!-- Navbar Start -->
<nav class="navbar navbar-expand-md navbar-light bg-light">
    <div class="container">
        <!-- LOGO -->
        <a class="navbar-brand" href="<?= asset('index.php') ?>">
            <img src=" <?= asset('assets/images/settings.png'); ?>" alt="" width="34" height="34" class=" " />
        </a>
        <ul class="nav nav-pills me-auto ">
            <li class="nav-item">
                <a class="nav-link <?php if ($current_page_name == 'index') echo 'active' ?>" href="<?= asset('admin/index.php') ?>">Panel</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= asset('index.php') ?>">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if ($current_page_name == 'profile') echo 'active' ?>" aria-current="page" href="<?= asset('admin/users.php') ?>">Users</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if ($current_page_name == 'places') echo 'active' ?> " href="<?= asset('admin/places.php') ?>">Places</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if ($current_page_name == 'bills') echo 'active' ?> ?>" href="<?= asset('admin/bills.php') ?>">Bills</a>
            </li>
        </ul>

        <!-- Search and User Menu-->
        <div>
            <div class="d-flex align-items-center <?php if (isset($_SESSION["userName"])) echo 'd-none' ?>">
                <!-- Search Form -->
                <form class="w-100 me-3 d-flex" role="search">
                    <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
                    <button type="submit" class="me-4 ms-2 btn btn-success ">Search</button>
                </form>

                <!-- User Menu -->
                <div class="flex-shrink-0 dropdown me-5">
                    <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="<?php echo asset('assets\images\user.png'); ?>" alt="mdo" width="32" height="32" class="rounded-circle" />
                        <?= 'Hafiz' //$_SESSION["userName"]   
                        ?>
                    </a>
                    <ul class="dropdown-menu text-small">
                        <li>
                            <a class="dropdown-item " href="<?= asset('account/park.php') ?>">other</a>
                        </li>
                        <li>
                            <button type="button" class="dropdown-item " data-bs-toggle="modal" data-bs-target="#exampleModal">CSV Files</button>
                        </li>

                        <!-- <li>
                            <a class="dropdown-item <?php //if (!isset($_SESSION["regNum"])) echo 'disabled' 
                                                    ?>" href="<?= asset('account/move.php') ?>">Move the vehicle</a>
                        </li> -->
                        <li>
                            <hr class="dropdown-divider" />
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">Settings</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="<?= asset('/account/profile.php') ?>">Profile</a>
                        </li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>
                        <li>
                            <a class="dropdown-item" href="<?= asset('index.php?logoutAlert=1') ?>">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>
<!-- Navbar End -->

<!-- Modal Start -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">CSV Files </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h2 class="fs-5">Users CSV</h2>
                <a href="<?= asset('files/users.csv') ?>" class="btn  btn-outline-dark" data-bs-toggle="tooltip" title="Download users.csv" download="users_<?= date("Y/m/d H:i"); ?>.csv">Download </a>
                <hr>
                <h2 class="fs-5">Parking CSV</h2>
                <a href=" <?= asset('files/parking.csv') ?>" class="btn  btn-outline-dark" data-bs-toggle="tooltip" title="Download parking.csv" download="parking_<?= date("Y/m/d H:i"); ?>.csv">Download </a>

            </div>
            <div class="modal-footer">
                <span class="w-auto me-auto"><?php echo date("Y/m/d H:i"); ?></span>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal End -->


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