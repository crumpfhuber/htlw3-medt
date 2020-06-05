<?php
require_once 'settings.php';

$pdo = new PDO('mysql:host='. $database_host .';dbname='.$database_schema, $database_username, $database_password);


function getAllNews() {
    global $pdo;
    $statement = $pdo->prepare('SELECT * FROM `news` ORDER BY `timestamp`;');
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

function addFile($file_name, $mime_type, $file, $user_id) {
    global $pdo;
    $id = '';
    for ($i = 0; $i < 16; $i++) $id .= chr(rand(97, 122));
    $file = base64_encode($file);
    $statement = $pdo->prepare('INSERT INTO `storage` (`id`, `mime_type`, `file`, `name`, `owner`) VALUES (:id, :mime_type, :file, :name, :owner)');
    $statement->bindParam(":id", $id);
    $statement->bindParam(":mime_type", $mime_type);
    $statement->bindParam(":file", $file);
    $statement->bindParam(":name", $file_name);
    $statement->bindParam(":owner", $user_id);
    $statement->execute();
    return $statement->fetch();
}

function getFile($file_id) {
    global $pdo;
    $statement = $pdo->prepare('SELECT * FROM `storage` WHERE `id` = :id');
    $statement->bindParam(":id", $file_id);
    $statement->execute();
    return $statement->fetch(PDO::FETCH_ASSOC);
}