<?php
//require Files
require_once '../../functions/helpers.php';
require_once '../../database/Product.php';
require_once '../../database/Category.php';

//The Current Page Filename
$current_page_name = basename($_SERVER['PHP_SELF'], 'php');

//Time Zone Sweden
date_default_timezone_set("Europe/Stockholm");
$format = "Y/m/d H:i:s"; //2023/02/07 18:48:54

//START SESSION
session_start();
require_once '../../functions/checkIsAdmin.php';

//-----------------------------------------------------------
// Product Class
$products = Product::getAllProducts();

//-----------------------------------------------------------
// REQUEST_METHOD GET For SWEET ALERT
$createdAlert = false;
$updatedAlert = false;


if ($_SERVER["REQUEST_METHOD"] == "GET") {

    (empty($_GET['created'])) ? $createdAlert  = false : $createdAlert  = true;
    (empty($_GET['updated'])) ? $updatedAlert  = false : $updatedAlert  = true;

}


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
            <main role="main" class="col-10 px-4">
                <div class="d-flex justify-content-between mt-5">
                    <h3></h3>
                    <a href="<?= asset('admin/product/new-product.php') ?>" class="btn btn-outline-success">
                        <i class="fa-solid fa-plus me-2"></i>New Product
                    </a>
                </div>
                <br>
                <!-- Products Table -->
                <div class="">
                    <table class="table table-striped caption-top ">
                        <caption class="fs-2 fw-bold ">List of products</caption>
                        <thead class="">
                            <tr class="">
                                <th>ID</th>
                                <th>Title </th>
                                <th>Category</th>
                                <th>Color</th>
                                <th>Price</th>
                                <th>Created at</th>
                                <th>Updated at</th>
                                <th>Status</th>
                                <th>Settings</th>
                            </tr>
                        </thead>
                        <tbody class="">
                            <!-- Rows Product -->
                            <?php if (count($products) > 0) {
                                foreach ($products as $product) { ?>
                                    <tr class="<?= ($product["status"] == 1) ? '' : 'table-danger' ?>">
                                        <td><?= $product["product_id"] ?></td>
                                        <td><?= $product["title"] ?></td>
                                        <td><?= Category::getCategory($product["category_id"])  ?></td>
                                        <td><?= $product["color"] ?></td>
                                        <td><?= $product["price"] ?></td>
                                        <td><?= $product["created_at"] ?></td>
                                        <td><?= $product["updated_at"] ?></td>
                                        <td>
                                            <div class="row me-1 " style="width: 200px;">

                                                <a href="<?= asset('admin/product/status-product.php?status=1&id=') . $product["product_id"] ?>" class="col-5 text-center me-1 btn btn btn-sm <?= ($product["status"] == 1) ? 'btn-primary disabled' : 'btn-outline-primary' ?> ">Enable</a>
                                                <a href="<?= asset('admin/product/status-product.php?status=0&id=') . $product["product_id"] ?>" class="col-5 btn btn btn-sm <?= ($product["status"] == 1) ? 'btn-outline-danger' : 'btn-danger disabled' ?>">Disable</a>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="<?= asset('admin/product/edit-product.php?id=') . $product["product_id"]  ?>" class="btn btn btn-success btn-sm">Edit</a>
                                        </td>
                                    </tr>
                            <?php }
                            } ?>
                            <?php ?>
                        </tbody>
                    </table>
                </div>

            </main>
            <!-- Main End -->
        </div>
    </div>



    <!-- script src -->
    <?php require_once '../../layouts/script-src.php' ?>

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

        function showCreatedAlert() {
            Toast.fire({
                icon: 'success',
                title: 'The product created'
            })
        }
        function showUpdatedAlert() {
            Toast.fire({
                icon: 'success',
                title: 'The product updated'
            })
        }
    </script>
    <!-- Sweet Alert Control -->
    <?php
    
    if ($createdAlert) echo '<script>showCreatedAlert()</script>';
    if ($updatedAlert) echo '<script>showUpdatedAlert()</script>';
    
    ?>

</body>

</html>