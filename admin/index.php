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
                <!-- Products Table -->
                <h3>Products</h3>
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th>Title </th>
                                <th>Name </th>
                                <th>Settings </th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td> <?php echo 'id' ?> </td>
                                <td> <?php echo 'title' ?> </td>
                                <td> <?php echo 'name' ?> </td>
                                <td>
                                    <a href="" class="btn btn btn-primary btn-sm">Edit</a>
                                    <a href="" class="btn btn btn-outline-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                            <tr>
                                <td> <?php echo 'id' ?> </td>
                                <td> <?php echo 'title' ?> </td>
                                <td> <?php echo 'name' ?> </td>

                                <td>
                                    <a href="" class="btn btn-sm  btn-primary">Edit</a>
                                    <a href="" class="btn btn-sm btn-outline-danger">Delete</a>
                                </td>
                            </tr>

                            <!-- Not Found product -->
                            <!-- <div class="alert alert-danger" role="alert"></div> -->


                        </tbody>
                    </table>
                </div>
                <br>
                <!-- Categories Table -->
                <h3>Categories</h3>
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th> Id </th>
                                <th>Name </th>
                                <th>Settings </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td> <?php echo 'id' ?> </td>
                                <td> <?php echo 'name' ?> </td>
                                <td>
                                    <a href="" class="btn btn btn-primary btn-sm">Edit</a>
                                    <a href="" class="btn btn btn-outline-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                            <tr>
                                <td> <?php echo 'id' ?> </td>
                                <td> <?php echo 'name' ?> </td>

                                <td>
                                    <a href="" class="btn btn-sm  btn-primary">Edit</a>
                                    <a href="" class="btn btn-sm btn-outline-danger">Delete</a>
                                </td>
                            </tr>


                            <!-- Not Found Category -->
                            <!-- <div class="alert alert-danger" role="alert"></div> -->



                        </tbody>
                    </table>
                </div>
                <br>
                <!-- Orders Table -->
                <h3>Orders</h3>
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th> Id </th>
                                <th>Name </th>
                                <th>Settings </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td> <?php echo 'id' ?> </td>
                                <td> <?php echo 'name' ?> </td>
                                <td>
                                    <a href="" class="btn btn btn-primary btn-sm">Edit</a>
                                    <a href="" class="btn btn btn-outline-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                            <tr>
                                <td> <?php echo 'id' ?> </td>
                                <td> <?php echo 'name' ?> </td>

                                <td>
                                    <a href="" class="btn btn-sm  btn-primary">Edit</a>
                                    <a href="" class="btn btn-sm btn-outline-danger">Delete</a>
                                </td>
                            </tr>


                            <!-- Not Found Order -->
                            <!-- <div class="alert alert-danger" role="alert"></div> -->



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