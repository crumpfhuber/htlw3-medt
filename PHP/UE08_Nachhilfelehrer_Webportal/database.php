<?php
require_once 'settings.php';

$pdo = new PDO('mysql:host='. $database_host .';dbname='.$database_schema, $database_username, $database_password);


function getAllNews() {
    global $pdo;
    $statement = $pdo->prepare('SELECT * FROM `news` ORDER BY `timestamp`;');
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

function addFile($file_name, $mime_type, $file) {
    global $pdo;
    $id = '';
    for ($i = 0; $i < 16; $i++) $id .= chr(rand(97, 122));
    $file = base64_encode($file);
    $statement = $pdo->prepare('INSERT INTO `file` (`sid`, `mime_type`, `file`, `name`) VALUES (:sid, :mime_type, :file, :name)');
    $statement->bindParam(":sid", $id);
    $statement->bindParam(":mime_type", $mime_type);
    $statement->bindParam(":file", $file);
    $statement->bindParam(":name", $file_name);
    $statement->execute();
    return getFileId($pdo->lastInsertId())['sid'];
}

function getFileId($file_id) {
    global $pdo;
    $statement = $pdo->prepare('SELECT `sid` FROM `file` WHERE `id` = :id');
    $statement->bindParam(":id", $file_id);
    $statement->execute();
    return $statement->fetch(PDO::FETCH_ASSOC);
}

function getFile($file_id) {
    global $pdo;
    $statement = $pdo->prepare('SELECT * FROM `file` WHERE `sid` = :id');
    $statement->bindParam(":id", $file_id);
    $statement->execute();
    return $statement->fetch(PDO::FETCH_ASSOC);
}

function addContactRequest($firstname, $lastname, $email, $content, $file_id=NULL) {
    global $pdo;
    $statement = $pdo->prepare('INSERT INTO `contact`(`firstname`, `lastname`, `email`, `content`, `attachment`) VALUES (:firstname, :lastname, :email, :content, :attachment)');
    $statement->bindParam(":firstname", $firstname);
    $statement->bindParam(":lastname", $lastname);
    $statement->bindParam(":email", $email);
    $statement->bindParam(":content", $content);
    $statement->bindParam(":attachment", $file_id);
    $statement->execute();
    return $statement->fetch();
}