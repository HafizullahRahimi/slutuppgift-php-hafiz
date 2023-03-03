<?php
//require Files
require_once '../functions/helpers.php';
require_once '../database/Product.php';
// require_once '../../database/Category.php';



//The Current Page Filename
$current_page_name = basename($_SERVER['PHP_SELF'], 'php');

//Time Zone Sweden
date_default_timezone_set("Europe/Stockholm");
$format = "Y/m/d H:i:s"; //2023/02/07 18:48:54

//START SESSION
session_start();

// Check IS Admin
require_once '../functions/checkIsAdmin.php';
//-----------------------------------------------------------

// Get category info For Chart
$totalHoodie = count(Product::getProducts(1));
$totalCap = count(Product::getProducts(2));
$totalSkateboard = count(Product::getProducts(3));
$totalTshirt = count(Product::getProducts(4));
$totalWheel = count(Product::getProducts(5));


//-----------------------------------------------------------
// REQUEST_METHOD GET For SWEET ALERT
$signedAlert = false;

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    if (empty($_GET['signed'])) $signedAlert  = false;
    else {
        $signedAlert  = true;
    }

}

?>






<!-- Admin HTML-->
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Head  -->
    <?php require_once '../layouts/head.php' ?>
    <title>Dash board</title>
</head>

<body onload="">

    <!-- Header Start -->
    <header>
        <!-- Navbar -->
        <?php require_once './layouts/navbar.php' ?>
        <br>
    </header>
    <!-- Header End -->

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar Start -->
            <?php require_once './layouts/sidebar.php'; ?>
            <!-- Sidebar End -->
            <!-- Main Start -->
            <main class="col-10 px-4">
                <!-- chart -->
                <div class="col-12 mx-auto" style="height: 480px;">
                    <canvas id="myChart"></canvas>
                </div>
            </main>
            <!-- Main End -->
        </div>
    </div>


    <!-- script src -->
    <?php require_once '../layouts/script-src.php' ?>

    <!-- -------------------------------------------------------- -->
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('myChart');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Hoodie', 'Cap', 'Skateboard', 'Tshirt', 'Wheel'],
                datasets: [{
                    label: 'Total product for sale',
                    data: [<?= $totalHoodie ?>, <?= $totalCap ?>, <?= $totalSkateboard ?>, <?= $totalTshirt ?>, <?= $totalWheel ?>],
                    borderWidth: 1,
                    borderColor: '#36A2EB',
                    backgroundColor: '#0d6efd',
                }]
            },
        });
    </script>


<!-- -------------------------------------------------------- -->
    <!-- Sweet Alert Script -->
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-start',
            showConfirmButton: false,
            timer: 2000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        function showSignedAlert() {
            Toast.fire({
                icon: 'success',
                title: 'Welcome to Admin Panel'
            })
        }

    </script>
    <!-- Sweet Alert Control -->
    <?php
    if ($signedAlert) echo '<script>showSignedAlert()</script>';
    ?>
</body>

</html>