<?php
require_once '../functions/helpers.php';
echo 'Logout Page';

// (A) START SESSION
session_start();

// (B) LOGOUT REQUEST
if (isset($_POST["logout"])) {
    session_destroy();
    unset($_SESSION);
}

// (C) REDIRECT TO LOGIN PAGE IF NOT SIGNED IN
if (!isset($_SESSION["userName"])) {
    redirect('app/index.php');
}
