<?php 
require_once 'helpers.php';
if (!isset($_SESSION["userRole"]) || (isset($_SESSION["userRole"]) &&  $_SESSION["userRole"] != 0)) {
    redirect('app/index.php');
    
}