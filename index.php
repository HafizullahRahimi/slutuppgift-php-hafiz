<?php
//require Files
require_once './functions/helpers.php';

//The Current Page Filename
$current_page_name = basename($_SERVER['PHP_SELF'], 'php');

?>
<?php ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Animate -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <!-- Font Awesome -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
    <link rel="stylesheet" href="<?= asset('assets/fontawesome-free-6.2.1-web/css/all.css') ?>" />

    <!-- Bootstrap -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="<?= asset('assets/css/bootstrap.css') ?>" />

    <link rel="stylesheet" href="<?= asset('assets/fonts/font.css') ?>" />
    <link rel="stylesheet" href="<?= asset('assets/css/style.css') ?>" />

    <!-- SweetAlert2 -->
    <!-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
    <script src=" <?= asset('assets/js/sweetalert2.all.js') ?>"></script>

    <link rel="icon" href="<?= asset('assets/images/coding.png') ?>" />
    <title>Hafiz is Coding</title>

</head>

<body onload="">

    <!-- Header Start -->
    <header>
        <!-- Navbar -->
        <?php require_once './layouts/navbar.php' ?>
    </header>
    <!-- Header End -->

    <!-- Main Start -->
    <main>
        <div class=" container">
            <br>
            <h1>Users:</h1>
            <section class="d-flex flex-wrap flex-row w-100 mx-auto">
                <!-- User card -->
                <?php for ($row = 1; $row < $arrLength - 1; $row++) { ?>
                    <div class=" col-lg-3 col-md-4 col-sm-6 ">
                        <div class="card mx-1 my-2">
                            <img src="./assets/images/robot.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?= $csvArray[$row][0] ?> </h5>
                                <p class="card-text">
                                    Email:
                                    <br>
                                    <?= $csvArray[$row][1] ?>
                                </p>
                                <a href="<?= 'admin/index.php?user_id=' . $row ?>" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </section>
        </div>
    </main>
    <!-- Main End -->


    <!-- SweetAlert -->
    <script>
        // Swal.fire({
        //         icon: 'question',
        //         iconHtml: '<i class="fa-solid fa-vial-circle-check">',
        //         iconHtml: '<i class="fa-solid fa-road-lock"></i>',
        //         title: 'Are you sure?',
        //         // title: '<h1 class="title">Are you sure?</h1>',
        //         text: 'Something went wrong!',
        //         footer: '<a href="">Why do I have this issue?</a>',
        //         focusConfirm: false,
        //         showCloseButton: true,
        //         showCancelButton: true,
                
        //         confirmButtonText: '<i class="fa-solid fa-floppy-disk"></i> Save',
        //         cancelButtonText: '<i class="fa-solid fa-xmark"></i> Cancel',
                
        //         // Custom Class for Buttons
        //         buttonsStyling: false,
        //         customClass:{
        //             title: 'card-title',
        //             confirmButton:'btn btn-success me-2',
        //             cancelButton: 'btn btn-danger',
        //         }
        //     })
    </script>

    <!-- Bootstrap js -->
    <script src="<?= asset('assets/js/bootstrap.js') ?>"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script> -->

    <script src="<?= asset('assets/js/main.js') ?>"></script>
</body>

</html>