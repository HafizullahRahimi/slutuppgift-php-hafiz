<?php
//require Files
require_once '../../functions/helpers.php';
require_once '../../database/Product.php';


if (isset($_GET['status']) && isset($_GET['id'])) {

    $status = $_GET['status'];
    $id = $_GET['id'];

    $changeStatus = Product::changeStatus($id, $status);

    if ($changeStatus) {
        echo 'changed status';
        redirect('admin/product/product.php?changedStatus=1');
    }

}
?>