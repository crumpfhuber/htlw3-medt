<?php
require_once 'settings.php';

$pdo = new PDO('mysql:host='. $database_host .';dbname='.$database_schema, $database_username, $database_password);


function getNews() {
    global $pdo;
    $statement = $pdo->prepare('SELECT * FROM `news` ORDER BY `timestamp`;');
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

function addNewsArticle($headline, $content, $image) {
    global $pdo;
    $statement = $pdo->prepare('INSERT INTO `news`(`headline`, `content`, `image`, `author`) VALUES (:headline, :content, :image, :author)');
    $statement->bindParam(":headline", $headline);
    $statement->bindParam(":content", $content);
    $statement->bindParam(":image", $image);
    $statement->bindParam(":author", $_SESSION['user_id']);
    return $statement->execute();
}

function deleteNewsArticle($id) {
    global $pdo;
    $statement = $pdo->prepare('DELETE FROM `news` WHERE `id` = :id');
    $statement->bindParam(":id", $id);
    return $statement->execute();
}

function addFile($file_name, $mime_type, $file, $comment) {
    global $pdo;
    $id = '';
    for ($i = 0; $i < 16; $i++) $id .= chr(rand(97, 122));
    $file = base64_encode($file);
    $statement = $pdo->prepare('INSERT INTO `file` (`sid`, `mime_type`, `file`, `name`, `comment`) VALUES (:sid, :mime_type, :file, :name, :comment)');
    $statement->bindParam(":sid", $id);
    $statement->bindParam(":mime_type", $mime_type);
    $statement->bindParam(":file", $file);
    $statement->bindParam(":name", $file_name);
    $statement->bindParam(":comment", $comment);
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

function getAllImages() {
    global $pdo;
    $statement = $pdo->prepare('SELECT `sid`, `mime_type`, `name`, `comment` from `file` WHERE `mime_type` LIKE \'image/%\' AND NOT comment = \'Uploaded via Contact Form\'');
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

function getAllFiles() {
    global $pdo;
    $statement = $pdo->prepare('SELECT `sid`, `mime_type`, `name`, `comment` FROM `file`');
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

function deleteFile($file_id) {
    global $pdo;
    $statement = $pdo->prepare('DELETE FROM `file` WHERE `sid` = :id');
    $statement->bindParam(":id", $file_id);
    return $statement->execute();
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

function getContactRequest($request_id) {
    global $pdo;
    $statement = $pdo->prepare('SELECT * FROM `contact` WHERE `id` = :id');
    $statement->bindParam(":id", $request_id);
    $statement->execute();
    return $statement->fetch(PDO::FETCH_ASSOC);
}

function getContactRequests() {
    global $pdo;
    $statement = $pdo->prepare('SELECT * FROM `contact`');
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

function deleteContactRequest($request_id) {
    global $pdo;
    $request = getContactRequest($request_id);
    if ($request['attachment'] != "") // check if attachment exists
        deleteFile($request['attachment']); // delete file out of database
    $statement = $pdo->prepare('DELETE FROM `contact` WHERE `id` = :id');
    $statement->bindParam(":id", $request_id);
    return $statement->execute();
}

function getUser($email) {
    global $pdo;
    $statement = $pdo->prepare('SELECT * FROM `user` WHERE `email` = :email');
    $statement->bindParam(":email", $email);
    $statement->execute();
    return $statement->fetch(PDO::FETCH_ASSOC);
}

function getUserNameById($id) {
    global $pdo;
    $statement = $pdo->prepare('SELECT `firstname`, `lastname` FROM `user` WHERE `id` = :id');
    $statement->bindParam(":id", $id);
    $statement->execute();
    return $statement->fetch(PDO::FETCH_ASSOC);
}

function getInformationDocuments() {
    global $pdo;
    $statement = $pdo->prepare('SELECT * FROM `infodoc`');
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

function getInformationDocument($doc_id) {
    global $pdo;
    $statement = $pdo->prepare('SELECT * FROM `infodoc` WHERE `id` = :id');
    $statement->bindParam(":id", $doc_id);
    $statement->execute();
    return $statement->fetch(PDO::FETCH_ASSOC);
}

function deleteInformationDocument($doc_id) {
    global $pdo;

    $document = getInformationDocument($doc_id); // get information for file delete

    $statement = $pdo->prepare('DELETE FROM `infodoc` WHERE `id` = :id');
    $statement->bindParam(":id", $doc_id);
    $statement->execute();

    deleteFile($document['file']); // delete file out of database
}

function addInformationDocument($file_id, $description) {
    global $pdo;
    $statement = $pdo->prepare('INSERT INTO `infodoc`(`description`, `file`) VALUES (:description, :file)');
    $statement->bindParam(":description", $description);
    $statement->bindParam(":file", $file_id);
    $statement->execute();
    return $statement->fetch();
}

function getDownloadDocuments() {
    global $pdo;
    $statement = $pdo->prepare('SELECT * FROM `download`');
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

function getDownloadDocument($doc_id) {
    global $pdo;
    $statement = $pdo->prepare('SELECT * FROM `download` WHERE `id` = :id');
    $statement->bindParam(":id", $doc_id);
    $statement->execute();
    return $statement->fetch(PDO::FETCH_ASSOC);
}

function addDownloadDocument($file_id, $description) {
    global $pdo;
    $statement = $pdo->prepare('INSERT INTO `download`(`description`, `file`) VALUES (:description, :file)');
    $statement->bindParam(":description", $description);
    $statement->bindParam(":file", $file_id);
    $statement->execute();
    return $statement->fetch();
}

function deleteDownloadDocument($doc_id) {
    global $pdo;

    $document = getDownloadDocument($doc_id); // get information for file delete

    $statement = $pdo->prepare('DELETE FROM `download` WHERE `id` = :id');
    $statement->bindParam(":id", $doc_id);
    $statement->execute();

    deleteFile($document['file']); // delete file out of database
}