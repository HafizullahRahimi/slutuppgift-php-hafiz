<?php
//require Files
require_once '../../functions/helpers.php';
require_once '../../database/Product.php';

//The Current Page Filename
$current_page_name = basename($_SERVER['PHP_SELF'], '.php');

//Time Zone Sweden
date_default_timezone_set("Europe/Stockholm");
$format = "Y/m/d H:i:s"; //2023/02/07 18:48:54

//START SESSION
session_start();


//-----------------------------------------------------------
$productId = '';
$categoryId = '';
$redirectToProduct = false;
$redirectToCart = false;


//-----------------------------------------------------------
// REQUEST_METHOD Get For add to cart
if (isset($_GET['productId']) && isset($_GET['categoryId'])) {
    $productId = $_GET['productId'];
    $categoryId = $_GET['categoryId'];


    $product = Product::getProduct($productId);
    // dd($product);

    // If Set Session
    if (isset($_SESSION["cart_" . $product["product_id"]])) {
        $cart = $_SESSION["cart_" . $product["product_id"]];
        $_SESSION["cart_" . $cart["id"]] = [
            'id' => $cart["id"],
            'name' => $cart["name"],
            'quantity' => $cart["quantity"] + 1,
            'price' => $cart["price"],
        ];
    } else {
        $_SESSION["cart_" . $product["product_id"]] = [
            'id' => $product["product_id"],
            'name' => $product["title"],
            'quantity' => 1,
            'price' => $product["price"],
        ];
    }

    $redirectToProduct = true;
    // Redirect To product.php
    // ($categoryId == '') ? redirect('app/product.php'):redirect('app/product.php?category=' . $categoryId);

} 

//-----------------------------------------------------------
// REQUEST_METHOD Get For plus
if (isset($_GET['productId']) && isset($_GET['plus'])) {
    $productId = $_GET['productId'];

    $product = Product::getProduct($productId);

    $cart = $_SESSION["cart_" . $product["product_id"]];
    $_SESSION["cart_" . $cart["id"]] = [
        'id' => $cart["id"],
        'name' => $cart["name"],
        'quantity' => $cart["quantity"] + 1,
        'price' => $cart["price"],
    ];
    $redirectToCart = true;
}

// REQUEST_METHOD Get For minus
if (isset($_GET['productId']) && isset($_GET['minus'])) {
    $productId = $_GET['productId'];

    $product = Product::getProduct($productId);
    // dd($product);

    $cart = $_SESSION["cart_" . $product["product_id"]];
    if (($cart["quantity"] - 1) == 0) {
        unset($_SESSION["cart_" . $product["product_id"]]);
    } else {
        $_SESSION["cart_" . $cart["id"]] = [
            'id' => $cart["id"],
            'name' => $cart["name"],
            'quantity' => $cart["quantity"] - 1,
            'price' => $cart["price"],
        ];
    }

    $redirectToCart = true;

}



//-----------------------------------------------------------
$session = $_SESSION;
$products = [];
$total = 0;
$totalProducts = 0;

// push to products
foreach ($session as $keySession => $value) {
    if (substr($keySession, 0, 5) == 'cart_') {
        $products[$keySession] = $value;
    }
}

// Set total and totalProducts
foreach ($products as $product) {
    $total += $product["price"] * $product["quantity"];
    $totalProducts +=  $product["quantity"];
}

// Set SESSION for Set products Arr, total and totalProducts
$_SESSION['products'] = $products;
$_SESSION['total'] = $total;
$_SESSION['totalProducts'] = $totalProducts;



// Redirect To Cart
if ($redirectToCart) redirect('app/cart/cart.php');

// Redirect To product.php
if ($redirectToProduct)($categoryId == '') ? redirect('app/product.php'):redirect('app/product.php?category=' . $categoryId);

