<?php
//The Current Page Filename
$current_page_name = basename($_SERVER['PHP_SELF'], '.php');
// echo $current_page_name; // return: index


$logoutAlert = false;
// REQUEST_METHOD GET
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (empty($_GET['logoutAlert'])) $logoutAlert = false;
    else  $logoutAlert = true;
}

// (A) START SESSION
// session_start();


?>

<!-- Navbar Start -->
<nav class="navbar navbar-expand-md navbar-light bg-light">
    <div class="container">
        <!-- LOGO -->
        <a class="navbar-brand" href="<?= asset('account/profile.php') ?>">
            <img src=" <?= asset('assets/images/administrator.png'); ?>" alt="" width="34" height="34" class=" " />
        </a>

        <ul class="nav nav-pills me-auto">
            <li class="nav-item">
                <a class="nav-link" href="<?= asset('index.php') ?>">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= ($current_page_name == 'profile') ? 'active' : '' ?>" aria-current="page" href="<?= asset('app/account/profile.php') ?>">Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= ($current_page_name == 'order') ? 'active' : '' ?> <?= ($_SESSION["userRole"] == 0) ? 'd-none' : ''?>" href="<?= asset('app/account/order.php') ?>">Order</a>
            </li>
        </ul>


        <!-- User Menu-->
        <div>
            <div class="d-flex align-items-center <?php if (!isset($_SESSION["userName"])) echo 'd-none' ?>">
                <div class="flex-shrink-0 dropdown">
                    <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="<?= asset('upload/users/user.png');?>" alt="mdo" width="32" height="32" class="rounded-circle" />
                        <?= $_SESSION["userName"] ?>
                    </a>
                    <ul class="dropdown-menu text-small">
                        <li>
                            <a class="dropdown-item text-success <?= ($_SESSION["userRole"] == 1) ? 'd-none' : ''?>" href="<?= asset('admin/index.php') ?>">Admin Panel</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="<?= asset('app/account/account-setting.php') ?>">Settings</a>
                        </li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>
                        <li>
                            <a class="dropdown-item" href="<?= asset('app/account/profile.php?logoutAlert=1') ?>">Logout</a>
                        </li>
                    </ul>
                </div>
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
            denyButtonText: '<a href="<?php echo asset('account/profile.php') ?>"class="btn btn-sm text-light">No</a>',
        })
    }
</script>
<?php
if ($logoutAlert) {
    echo '<script>ShowAlert()</script>';
}
?>

