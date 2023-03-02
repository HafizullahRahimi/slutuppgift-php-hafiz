<?php
//require Files
require_once '../functions/helpers.php';



//The Current Page Filename
$current_page_name = basename($_SERVER['PHP_SELF'], 'php');

//Time Zone Sweden
date_default_timezone_set("Europe/Stockholm");
$format = "Y/m/d H:i:s"; //2023/02/07 18:48:54

//START SESSION
session_start();

require_once '../functions/checkIsAdmin.php';
//-----------------------------------------------------------
// REQUEST_METHOD GET


//-----------------------------------------------------------
// REQUEST_METHOD POST 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST["regNum"])) {
    }
}


?>
<?php ?>


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

    <!-- chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const ctx = document.getElementById('myChart');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Hoodie', 'Cap', 'Skateboard', 'Tshirt', 'Wheel'],
                datasets: [{
                    label: 'Total product',
                    data: [12, 16, 3, 5, 2],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>

</html>