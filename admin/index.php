
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
// REQUEST_METHOD POST 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST["regNum"])) {

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
    <title>Admin</title>
</head>

<body onload="">

    <!-- Header Start -->
    <header>
        <div class="Header-top col-8 mx-auto">
            <h1 class="my-4 w-50 mx-auto ">Admin Panel</h1>
            <div class="d-flex align-items-center mb-5 <?php if (!isset($_SESSION["userName"])) echo 'd-none'; ?>">
                <!-- Search Form -->
                <form class="w-100 me-3 d-flex" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <input name="regNum" type="text" class="form-control" placeholder="Reg number" aria-label="Search">
                    <button type="submit" class="me-4 ms-2 btn btn-success ">Find</button>
                </form>
            </div>
        </div>
        <!-- Navbar -->
        <?php require_once './layouts/navbar.php' ?>
    </header>
    <!-- Header End -->

    <!-- Main Start -->
    <main>
        <div class=" container">
            
        </div>
    </main>
    <!-- Main End -->





    <!-- script src -->
    <?php require_once '../layouts/script-src.php' ?>
</body>

</html>