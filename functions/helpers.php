<?php

# config
define('BASE_URL', 'http://localhost/php-project');


# Helper functions --------------------------------------

# header website
function redirect($url)
{
    header('Location: ' . trim(BASE_URL, '/ ') . '/' . trim($url, '/ '));
    exit;
}
//redirect('admin/index.php'); //redirect to http://localhost/php-project/admin/index.php


# url for css js imgs files
function asset($file)
{
    return trim(BASE_URL, '/ ') . '/' . trim($file, '/ ');
}
//echo asset('assets/css/main.css'); //http://localhost/php-project/assets/css/main.css



# url for tag a
function url($url)
{
    return trim(BASE_URL, '/ ') . '/' . trim($url, '/ ');
}
// echo url('admin/index.php'); //Click to go to page: http://localhost/php-project/admin/index.php


# For Debugging (dd stands for "Dump and Die.") 
function dd($var)
{
    echo '<pre>';
    var_dump($var);
    exit;
}
// $users = ['Ali', 'Hassan', 'Wille', 'Sara'];
// dd($users);


// PHP function to read CSV to array
function csvToArray($csv)
{
    // create file handle to read CSV file
    $csvToRead = fopen($csv, 'r');

    // read CSV file using comma as delimiter
    while (!feof($csvToRead)) {
        $csvArray[] = fgetcsv($csvToRead, 1000, ';');
    }

    fclose($csvToRead);
    return $csvArray;
}

// CSV file to read into an Array
// $csvFile = 'testcsv.csv';
$csvFile = asset('/files/users.csv');
// $csvFile = './server/users.csv';
$csvArray = csvToArray($csvFile);
$arrLength = count($csvArray);


//Test input
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}