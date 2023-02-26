<?php
//require Files
require_once '../../functions/helpers.php';

//The Current Page Filename
$current_page_name = basename($_SERVER['PHP_SELF'], 'php');

//Time Zone Sweden
date_default_timezone_set("Europe/Stockholm");
$format = "Y/m/d H:i:s"; //2023/02/07 18:48:54

//START SESSION
session_start();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Head  -->
    <?php require_once '../../layouts/head.php' ?>
    <title>Product</title>
</head>

<body onload="">

    <!-- Header Start -->
    <header>
        <!-- Navbar -->
        <?php require_once '../layouts/navbar.php' ?>
        <br>
    </header>
    <!-- Header End -->

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar Start -->
            <?php require_once '../layouts/sidebar.php'; ?>
            <!-- Sidebar End -->
            <!-- Main Start -->
            <main role="main" class="col-9 px-4">
                <div class="d-flex justify-content-between mt-5">
                    <h3>Products</h3>
                    <a href="<?= asset('admin/product/new-product.php') ?>" class="btn btn-outline-success">
                        <i class="fa-solid fa-plus me-2"></i>New Product
                    </a>
                </div>
                <br>
                <!-- Products Table -->
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
                                    <a href="<?= asset('admin/product/edit-product.php') . '?id=11' ?>" class="btn btn btn-primary btn-sm">Edit</a>
                                    <a href="<?= asset('admin/product/delete-product.php') . '?id=11' ?>" class="btn btn btn-outline-danger btn-sm">Delete</a>
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

            </main>
            <!-- Main End -->
        </div>
    </div>



    <!-- Toast HTML: The product created-->
    <div class="toast-container  p-2 bottom-0 start-0" id="toastPlacement">
        <div class="toast text-bg-success " id="productCreated" data-bs-delay="2000">
            <div class="toast-header">
                <!-- <img src="..." class="rounded me-2" alt="..."> -->
                <i class="fa-solid fa-square-plus me-1"></i>
                <strong class="me-auto">New product</strong>
                <small>just now</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                The product created.
            </div>
        </div>
    </div>


    <!-- script src -->
    <?php require_once '../../layouts/script-src.php' ?>

    <!-- Toast JS-->
    <script>
        const productCreated = document.getElementById('productCreated');
    </script>

    <?php
    if (isset($_GET['created'])) echo '<script>new bootstrap.Toast(productCreated).show();</script>';

    ?>

</body>

</html>