<?php
//require Files
require_once '../../functions/helpers.php';

//The Current Page Filename
$current_page_name = basename($_SERVER['PHP_SELF'], '.php');

// START SESSION
session_start();

//-----------------------------------------------------------
// check to Login
require_once '../../functions/checkLogin.php';

//-----------------------------------------------------------
//  REQUEST_METHOD GET For Sweet Alert
$signedAlert = false;
$registeredAlert = false;


if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (empty($_GET['signed'])) $signedAlert  = false;
    else {
        $signedAlert  = true;
    }

    if (empty($_GET['registered'])) $registeredAlert = false;
    else {
        $registeredAlert = true;
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Head  -->
    <?php require_once '../../layouts/head.php' ?>
    <title>Profile</title>
</head>

<body>
    <!-- Header Start -->
    <header>
        <?php if ($signedAlert || $registeredAlert || $deliveredAlert) {
            echo '<div class="Header-top col-8 mx-auto"><h1 class="my-4 w-25 mx-auto ">Profile</h1></div>';
        } ?>

        <?php ?>
        <!-- Navbar -->
        <?php require_once './layouts/navbar.php' ?>
    </header>
    <!-- Header End -->
    <div class=" container">
        <div class="bg-light p-5 rounded mt-5 col-8 mx-auto">
            <div class="">
                <h1 class="text-info">User Info</h1>
                <hr>
                <p>
                    Full name: <?= $_SESSION["userName"]; ?> <br>
                    Email: <?= $_SESSION["userEmail"] ?> <br>
                    Password: <?= $_SESSION["userPassword"] ?> <br>
                    Gender: <?php
                            if ($_SESSION["userGender"] == 0) {
                                echo 'Female';
                            } elseif ($_SESSION["userGender"] == 1) {
                                echo 'Male';
                            } else {
                                echo 'Other';
                            }
                            ?>
                </p>
            </div>
        </div>
    </div>

    <!-- script src -->
    <?php require_once '../../layouts/script-src.php' ?>

    <!-- Sweet Alert Script -->
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-start',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
        function showSignedAlert() {
            Toast.fire({
                icon: 'success',
                title: 'Welcome to profile'
            })
        }
        function showRegisteredAlert() {
            Toast.fire({
                icon: 'success',
                title: 'Registered in successfully'
            })
        }
    </script>
    <!-- Sweet Alert Control -->
    <?php
    if ($signedAlert) {
        echo '<script>showSignedAlert()</script>';
    }
    if ($registeredAlert) {
        echo '<script>showRegisteredAlert()</script>';
    }
    ?>
</body>

</html>