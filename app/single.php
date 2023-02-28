<?php 

echo 'single product';
echo '<br>';



// REQUEST_METHOD Get For Category
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    echo $id;
} 



?>