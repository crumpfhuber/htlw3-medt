<?php
require_once 'database.php';

$tabs = explode('/', $_GET['page']);

$file = getFile($tabs[0]);

header('Content-Type: ' . $file['mime_type']);

echo base64_decode($file['file']);