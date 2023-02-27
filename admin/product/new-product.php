<?php
//require Files
require_once '../../functions/helpers.php';
require_once '../../database/Category.php';
require_once '../../database/Product.php';

//The Current Page Filename
$current_page_name = basename($_SERVER['PHP_SELF'], 'php');

//Time Zone Sweden
date_default_timezone_set("Europe/Stockholm");
$format = "Y-m-d H:i:s"; //2023-02-07 18:48:54

//START SESSION
session_start();

//-----------------------------------------------------------
// Categories
$categories = Category::getAllCategory();




//-----------------------------------------------------------
if (isset($_POST['addProduct'])) {
    echo 'AddED';
    if (trim($_POST['title']) != ""  && trim($_POST['categoryId']) != "" && trim($_POST['body']) != "" && trim($_FILES['image']['name']) != "") {

        $title = $_POST['title'];
        $categoryId = $_POST['categoryId'];
        $body = $_POST['body'];
        $color = $_POST['color'];
        $price = $_POST['price'];

        $nameImage = $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];
        if (move_uploaded_file($tmp_name, "../../upload/products/$nameImage")) {
            echo "Upload Success";
        } else {
            echo "Upload Error";
        }

        //Insert Product
        $insertProduct = Product::insetProduct($nameImage,$title,$categoryId, $body,$color,$price);

        if ($insertProduct) {
            echo 'inserted Product';
            redirect('admin/product/product.php?created=1');
        }

    }
}






//-----------------------------------------------------------
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Head  -->
    <?php require_once '../../layouts/head.php' ?>
    <title>New product</title>
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
                <!-- Breadcrumb -->
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= asset('admin/product/product.php') ?>">Products</a></li>
                        <li class="breadcrumb-item active" aria-current="page">New product</li>
                    </ol>
                </nav>
                <!-- header -->
                <div class="d-flex justify-content-between mt-4">
                    <h3>New Product</h3>
                </div>

                <!-- Form Start -->
                <form method="post" class="mb-5 row" enctype="multipart/form-data">
                    <div class="form-group mt-3">
                        <label for="title" class=" mb-2">Title</label>
                        <input type="text" class="form-control" name="title" id="title">
                        <!-- <small class="form-text text-muted">Write product name</small> -->
                    </div>
                    <div class="form-group mt-3 col-6">
                        <label for="price" class="mb-2">Price : </label>
                        <input type="number" class="form-control" name="price" id="price">
                        <!-- <small class="form-text text-muted">Write product price </small> -->
                    </div>
                    <div class="form-group mt-3 col-6">
                        <label for="color" class="mb-2">Color : </label>
                        <input type="text" class="form-control" name="color" id="color">
                        <!-- <small class="form-text text-muted">Write product color </small> -->
                    </div>
                    <div class="form-group mt-3 col-6">
                        <label for="categoryId" class=" mb-2">Category:</label>
                        <select class="form-control " name="categoryId" id="categoryId">
                            <?php
                            if (count($categories) > 0) {
                                foreach ($categories as $category) {
                            ?>
                                    <option value="<?php echo $category["categorie_id"] ?>"> <?php echo $category["name"] ?> </option>

                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group mt-3 col-6">
                        <label for="image" class=" mb-2">Image : </label>
                        <input type="file" class="form-control" name="image" id="image">
                        <small class="form-text text-muted"></small>
                    </div>
                    <div class="form-group mt-3">
                        <label for="body" class=" mb-2">Body: </label>
                        <textarea class="form-control" name="body" id="body" rows="3"></textarea>
                        <small class="form-text text-muted"></small>
                    </div>


                    <div class="col-12 w-100 mt-4 ">
                        <div class=" ms-auto" style="width:25.9%;">
                            <!-- <button type="submit" name="editProduct" class="btn btn-danger   ">Cancel</button> -->
                            <a  href="<?= asset('admin/product/product.php') ?>" class="btn  btn-danger col-5">Cancel</a>
                            <button type="submit" name="addProduct" class="btn btn-success me-2 col-6">Create</button>

                        </div>
                    </div>
                </form>
                <!-- Form End -->


            </main>
            <!-- Main End -->
        </div>
    </div>





    <!-- ckeditor -->
    <script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('body');
    </script>
    <!-- script src -->
    <?php require_once '../../layouts/script-src.php' ?>
</body>

</html>