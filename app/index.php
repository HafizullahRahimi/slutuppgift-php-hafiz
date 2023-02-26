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


$text = 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Praesentium, vel id, qui nostrum eos distinctio sit harum a velit aliquam officia. Magni laudantium tenetur, a fugiat praesentium consequuntur modi, dolorum voluptates quia ipsam tempore aut! Soluta ex facere quasi fuga magnam officiis libero rem. Dolores expedita distinctio nesciunt vel eius?';
// echo substr($text , 0, 30) . "..." ;



//-----------------------------------------------------------
// REQUEST_METHOD POST For search

$showAlert = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST["search"])) {
        $search = $_POST["search"];
        $showAlert = true;
    }
}

//-----------------------------------------------------------
// REQUEST_METHOD Get For Category
if (isset($_GET['category'])) {
    $categoryId = $_GET['category'];

    // $products = $db->prepare('SELECT * FROM products WHERE category_id = :id');
    // $products->execute(['id' => $categoryId]);
} else {
    // $queryProducts = "SELECT * FROM products";
    // $products = $db->query($queryProducts);
}


?>
<?php ?>



<!-- Home HTML-->
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
            <!-- Logo TOP -->
            <div class="my-4 w-100 text-center ">
                <a class="" href="<?= asset('index.php') ?>">
                    <img src=" <?= asset('assets/images/logo.png'); ?>" alt="" width="210" height="70" class=" " />
                </a>
            </div>
            <!-- Search Form -->
            <div class="d-flex align-items-center mb-5">
                <form class="w-100 me-3 d-flex" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <input name="search" type="text" class="form-control" placeholder="Search" aria-label="Search">
                    <button type="submit" class="me-4 ms-2 btn  btn-primary ">Search</button>
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


            <h1></h1>
            <section class="d-flex flex-wrap flex-row w-100 mx-auto">

                <section class=" col-lg-3 col-md-4 col-sm-6 "></section>
            </section>
        </div>
    </main>
    <!-- Main End -->


    <!-- SweetAlert -->
    <script>
        function searchFound() {
            Swal.fire({
                title: '<h2 class="fs-4"><?= $search ?></h2>',
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
        function searchNotFound() {
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
    if ($showAlert && !$findsearch) echo '<script>searchNotFound()</script>';
    if ($showAlert && $findsearch) echo '<script>searchFound()</script>';
    ?>



    <!-- script src -->
    <?php require_once '../layouts/script-src.php' ?>
</body>

</html>