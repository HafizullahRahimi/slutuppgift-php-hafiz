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



//-----------------------------------------------------------

$productId = '';
$categoryId = '';

// REQUEST_METHOD Get For Category
if (isset($_GET['productId']) && isset($_GET['categoryId'])) {
    $productId = $_GET['productId'];
    $categoryId = $_GET['categoryId'];


    echo $productId . ' : ' . $categoryId;

    // Redirect To product.php
    ($categoryId == '') ? redirect('app/product.php'):redirect('app/product.php?category=' . $categoryId);

} else {
    
}

?>