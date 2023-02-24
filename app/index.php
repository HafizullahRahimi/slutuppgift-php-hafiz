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



//-----------------------------------------------------------
// REQUEST_METHOD POST For Find regNum
$findRegNum = false;
$showAlert = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST["regNum"])) {
        $regNum = $_POST["regNum"];
        $showAlert = true;

        // regNum Arr
        $regNumArr = $p->getRegnumInfo($regNum);

        // Found regNum
        if (!empty($regNumArr)) {
            $findRegNum = true;
            $fullNameF = $regNumArr['first_name'] . ' ' . $regNumArr['last_name'];
            $emailF = $regNumArr['email'];
            $vehicleTypeF;
            if ($regNumArr["vehicle_type"] == 1) $vehicleTypeF = 'Car';
            else  $vehicleTypeF = 'MC';
            $arrivalF = $regNumArr["arrival_date"];
            $placeF = $regNumArr["place"];
            $partF = $regNumArr["part"];
        }
    }
}




?>
<?php ?>



<!-- Prague parking HTML-->
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Head  -->
    <?php require_once '../layouts/head.php' ?>
    <title>Home</title>
</head>

<body onload="">

    <!-- Header Start -->
    <header>
        <div class="Header-top col-8 mx-auto">
            <!-- <div class="my-4 w-auto mx-auto "> -->
            <div class="my-4 w-100 text-center ">
                <a class="" href="<?= asset('index.php') ?>">
                    <img src=" <?= asset('assets/images/logo.png'); ?>" alt="" width="210" height="70" class=" " />
                </a>
            </div>
            <div class="d-flex align-items-center mb-5 <?php if (!isset($_SESSION["userName"])) echo 'd-none'; ?>">
                <!-- Search Form -->
                <form class="w-100 me-3 d-flex" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <input name="regNum" type="text" class="form-control" placeholder="Reg number" aria-label="Search">
                    <button type="submit" class="me-4 ms-2 btn btn-success ">Find</button>
                </form>
            </div>
        </div>
        <!-- Navbar -->
        <?php require_once '../layouts/navbar.php' ?>
    </header>
    <!-- Header End -->

    <!-- Main Start -->
    <main>
        <div class=" container">
            <br>
            <!-- dropdown -->
            <div class="dropdown">
                <a class="btn  btn-outline-primary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Dropdown link
                </a>

                <ul class="dropdown-menu">
                    <li><a class="dropdown-item active" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
            </div>

            <h1></h1>
            <section class="d-flex flex-wrap flex-row w-100 mx-auto">

                <section class=" col-lg-3 col-md-4 col-sm-6 "></section>
            </section>
        </div>
    </main>
    <!-- Main End -->


    <!-- SweetAlert -->
    <script>
        function regNumFound() {
            Swal.fire({
                title: '<h2 class="fs-4"><?= $regNum ?></h2>',
                icon: 'success',
                html: '<div class="modal-body text-start col-8 mx-auto">' +
                    '<hr>' +
                    '<h4 class="fs-6">Full name: <?= $fullNameF ?></h4>' +
                    '<h4 class="fs-6">Email: <?= $emailF ?></h4>' +
                    '<hr>' +
                    '<h4 class="fs-6">Vehicle type: <?= $vehicleTypeF ?></h4>' +
                    '<h4 class="fs-6">Arrival date: <?= $arrivalF ?></h4>' +
                    '<h4 class="fs-6">Place: <?= $placeF ?></h4>' +
                    '<h4 class="fs-6">Part: <?= $partF ?></h4>' +
                    '<hr>' +
                    '</div>',
                showCloseButton: true,
                showCancelButton: false,
                focusConfirm: false,
                showConfirmButton: false,
            })
        }
    </script>
    <script>
        function regNumNotFound() {
            Swal.fire({
                icon: 'error',
                title: '<h2 class="fs-3"> Oops...</h2>',
                showCloseButton: true,
                showConfirmButton: false,
                html: '<h4 class="fs-6 text-danger">No Vehicles Found!!</h4>',
                footer: '<a href="">Why do I have this issue?</a>'
            })
        }
    </script>

    <?php
    if ($showAlert && !$findRegNum) echo '<script>regNumNotFound()</script>';
    if ($showAlert && $findRegNum) echo '<script>regNumFound()</script>';
    ?>



    <!-- script src -->
    <?php require_once '../layouts/script-src.php' ?>
</body>

</html>