<?php
//require Files
require_once '../../functions/helpers.php';



//The Current Page Filename
$current_page_name = basename($_SERVER['PHP_SELF'], '.php');


// START SESSION
session_start();
require_once '../../functions/checkLogin.php';

// echo $_SESSION["dRegNum"];


$signedAlert = false;
$registeredAlert = false;
$deliveredAlert = false;
$parkedAlert = false;



// REQUEST_METHOD GET
if ($_SERVER["REQUEST_METHOD"] == "GET") {

    if (empty($_GET['signed'])) $signedAlert  = false;
    else {
        $signedAlert  = true;
    }

    if (empty($_GET['registered'])) $registeredAlert = false;
    else {
        $registeredAlert = true;
    }

    if (empty($_GET['delivered'])) $deliveredAlert = false;
    else  $deliveredAlert = true;

    if (empty($_GET['parked'])) $parkedAlert = false;
    else  $parkedAlert = true;
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
        
        <!--  Order -->
        <div class=" mt-5">
            <div class="col-10 mx-auto">
                <h1 class="mb-3">Orders</h1>
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button " type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <a type="button" class="btn btn-primary position-relative">
                                    Order 1
                                </a>
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="bg-light p-5 rounded mt-1">
                                    <div class="col-10 mx-auto">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed position-relative" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                <a type="button" class="btn btn-primary position-relative">
                                    Order 2
                                    
                                </a>
                            </button>

                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="bg-light p-5 rounded mt-1">
                                    <div class="col-10 mx-auto">
                                    

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item ">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                <a type="button" class="btn btn-primary position-relative">
                                    Order 3
                                    
                                </a>
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="bg-light p-5 rounded mt-1">
                                    <div class="col-10 mx-auto">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>






    <!-- script src -->
    <?php require_once '../../layouts/script-src.php' ?>
</body>

</html>