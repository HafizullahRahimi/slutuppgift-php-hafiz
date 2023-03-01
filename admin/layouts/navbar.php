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
        <a class="navbar-brand" href="<?= asset('admin/index.php') ?>">
            <img src=" <?= asset('assets/images/settings.png'); ?>" alt="" width="34" height="34" class=" " />
            Admin Panel
        </a>

        <div>
            <a class="btn btn-outline-danger" href="<?= asset('admin/index.php?logoutAlert=1') ?>">Logout</a>
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
            denyButtonText: '<a href="<?php echo asset('admin/index.php') ?>"class="btn btn-sm text-light">No</a>',
        })
    }
</script>
<?php
if ($logoutAlert) {
    echo '<script>ShowAlert()</script>';
}
?>