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
            <main role="main" class="col-9 px-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Dash board</h1>
                </div>

                <h3>Products</h3>
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th> <button class="btn fw-bold">#</button> </th>
                                <th><button class="btn fw-bold">Title</button> </th>
                                <th><button class="btn fw-bold">Name</button> </th>
                                <th><button class="btn fw-bold">Settings</button> </th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td > <button class="btn"><?php echo 'id' ?> </button></td>
                                <td > <button class="btn"> <?php echo 'title'?> </button></td>
                                <td > <button class="btn"> <?php echo 'name' ?> </button></td>
                                <td>
                                    <a href="" class="btn btn btn-outline-info">Edit</a>
                                    <a href="" class="btn btn btn-outline-danger">Delete</a>
                                </td>
                            </tr>
                            <tr>
                                <td> <?php echo 'id' ?> </td>
                                <td> <?php echo 'title' ?> </td>
                                <td> <?php echo 'name' ?> </td>

                                <td>
                                    <a href="" class="btn btn-sm btn-outline-info">Edit</a>
                                    <a href="" class="btn btn-sm btn-outline-danger">Delete</a>
                                </td>
                            </tr>



                            <div class="alert alert-danger" role="alert">
                               
                            </div>


                        </tbody>
                    </table>
                </div>
            </main>
            <!-- Main End -->
        </div>
    </div>





    <!-- script src -->
    <?php require_once '../layouts/script-src.php' ?>
</body>

</html>