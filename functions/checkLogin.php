<?php 
require_once 'helpers.php';
// (C) REDIRECT TO LOGIN PAGE IF NOT SIGNED IN
if (!isset($_SESSION["userName"])) {
    redirect('app/index.php');
}