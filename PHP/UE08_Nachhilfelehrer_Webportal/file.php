<?php
require_once 'database.php';

$file = getFile($_GET['page']); // get file from database

if ($file == NULL) {
    $_GET['error_code'] = 404;
    include 'error.php'; // display 404 - not found
    die();
}

header('Content-Type: ' . $file['mime_type']); // set header with file type

echo base64_decode($file['file']); // decode file and print the file code