
<?php
require_once 'helpers.php';
if (!isset($_SESSION['totalProducts'])) {
    redirect('app/index.php');
}
?>