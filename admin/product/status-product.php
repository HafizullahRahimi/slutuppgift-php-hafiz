<?php
//require Files
require_once '../../functions/helpers.php';
require_once '../../database/Product.php';

//START SESSION
session_start();
require_once '../../functions/checkIsAdmin.php';


if (isset($_GET['status']) && isset($_GET['id'])) {

    $status = $_GET['status'];
    $id = $_GET['id'];

    $changeStatus = Product::changeStatus($id, $status);

    if ($changeStatus) {
        redirect('admin/product/product.php?changed=1');
    }

}
?>